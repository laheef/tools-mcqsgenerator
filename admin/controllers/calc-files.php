<?php

declare(strict_types=1);

/**
 * Calculator files — one PHP file per calculator.
 *
 * The list is every definition in plugins/calc, with the three things that
 * decide whether the page is healthy: does the file still parse, is its SEO in
 * the window, and does it compute. Uploading a file replaces the calculator at
 * that category and slug on the next request; the page's address, its section
 * listing and its sitemap entry all follow from the file name.
 *
 * Editing is not a second editor. The panel's source editor already opens PHP
 * with a real parser behind it, so Edit hands the file to that screen and comes
 * back here.
 */

/** Which tab of the tools area this screen is. */
$toolsTab = 'calc-files';
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('ONIM_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}

use Onim\Admin\Activity;
use Onim\Admin\Csrf;
use Onim\Admin\Flash;
use Onim\Admin\FileRepo;
use Onim\CalcFile;
use Onim\Data;

/* ------------------------------------------------------------------ download */
if (($_GET['do'] ?? '') === 'download') {
    $rel = (string) ($_GET['file'] ?? '');
    $abs = CalcFile::absolute($rel);
    if (!str_starts_with(realpath($abs) ?: '', realpath(CalcFile::dir()) ?: '~')
        || !is_file($abs)) {
        http_response_code(404);
        render_plain('error', ['code' => 404, 'message' => 'That calculator file does not exist.']);
        exit;
    }
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($abs) . '"');
    header('Content-Length: ' . (string) filesize($abs));
    header('X-Content-Type-Options: nosniff');
    readfile($abs);
    exit;
}

/* --------------------------------------------------------------------- post */
if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    Csrf::requirePost();
    Csrf::assert();
    $do = (string) (post('do', '') ?? '');

    if ($do === 'upload') {
        $cat  = CalcFile::clean((string) (post('category', '') ?? ''));
        $slug = CalcFile::clean((string) (post('slug', '') ?? ''));
        $file = $_FILES['file'] ?? null;

        if ($cat === '' || $slug === '') {
            Flash::error('A calculator file needs a category and a slug: they decide the address.');
            redirect_to(admin_url('calc-files'));
        }
        if (!is_array($file) || ($file['error'] ?? 1) !== UPLOAD_ERR_OK) {
            Flash::error('The upload failed.');
            redirect_to(admin_url('calc-files'));
        }
        if (!str_ends_with(strtolower((string) ($file['name'] ?? '')), '.php')) {
            Flash::error('A calculator file is a .php file.');
            redirect_to(admin_url('calc-files'));
        }
        $source = (string) file_get_contents((string) $file['tmp_name']);
        if ($source === '') {
            Flash::error('The file is empty.');
            redirect_to(admin_url('calc-files'));
        }
        $syntax = FileRepo::syntaxCheck('calc.php', $source);
        if (!$syntax['ok']) {
            Flash::error($syntax['error']);
            redirect_to(admin_url('calc-files'));
        }

        /* Check the definition before it goes anywhere near the live path: a
           file that does not return an array, or whose formulas read boxes that
           are not on the form, is refused here with the reason. */
        $tmp = tempnam(sys_get_temp_dir(), 'calfile');
        file_put_contents((string) $tmp, $source);
        $probe = CalcFile::DIR . '/upload-probe.php';
        $probeAbs = CalcFile::absolute($probe);
        if (!is_dir(dirname($probeAbs))) {
            @mkdir(dirname($probeAbs), 0775, true);
        }
        @copy((string) $tmp, $probeAbs);
        $read = CalcFile::read($probe);
        @unlink($probeAbs);
        if (!$read['ok']) {
            @unlink((string) $tmp);
            Flash::error('That file is not a calculator: ' . $read['error']);
            redirect_to(admin_url('calc-files'));
        }
        @unlink((string) $tmp);

        $rel = CalcFile::path($cat, $slug);
        $abs = CalcFile::absolute($rel);
        if (!is_dir(dirname($abs)) && !mkdir(dirname($abs), 0775, true) && !is_dir(dirname($abs))) {
            Flash::error('The folder could not be created.');
            redirect_to(admin_url('calc-files'));
        }
        $existed = is_file($abs);
        $written = FileRepo::write($rel, $source, (int) \Onim\Admin\Auth::id(), $existed ? 'Replaced by an upload' : 'Uploaded');
        if (!$written['ok']) {
            Flash::error($written['error']);
            redirect_to(admin_url('calc-files'));
        }
        CalcFile::flush();
        Data::flush();

        Activity::log($existed ? 'calc_file_replaced' : 'calc_file_uploaded', 'calc', $rel, 'Uploaded ' . $rel);
        Flash::success(($existed ? 'Replaced ' : 'Uploaded ') . $rel . ' — /' . $cat . '/' . $slug . ' now uses it.');
        redirect_to(admin_url('calc-files', ['edit' => $rel]));
    }

    if ($do === 'delete') {
        $rel = (string) (post('file', '') ?? '');
        $abs = CalcFile::absolute($rel);
        if (is_file($abs) && str_starts_with(realpath($abs) ?: '', realpath(CalcFile::dir()) ?: '~')) {
            $deleted = FileRepo::delete($rel, (int) \Onim\Admin\Auth::id());
            CalcFile::flush();
            Data::flush();
            Activity::log('calc_file_deleted', 'calc', $rel, 'Deleted ' . $rel);
            Flash::success('Deleted ' . $rel . '. The catalogue record is used again for that page.');
        }
        redirect_to(admin_url('calc-files'));
    }
}

/* --------------------------------------------------------------------- list */
$all = CalcFile::manifest(true);
$filter = strtolower(trim((string) (request('q') ?? '')));
$rows = [];
foreach ($all as $path => $file) {
    if ($filter !== '' && !str_contains(strtolower($path . ' ' . $file['name']), $filter)) {
        continue;
    }
    $calc = $file['error'] === '' ? Data::calculator($path) : null;
    $rows[] = [
        'path'     => $path,
        'file'     => $file,
        'title'    => (string) ($calc['seoTitle'] ?? $file['title']),
        'desc'     => (string) ($calc['description'] ?? ''),
        'faq'      => is_array($calc['faq'] ?? null) ? count($calc['faq']) : 0,
        'blocks'   => is_array($calc['article'] ?? null) ? count($calc['article']) : 0,
        'routes'   => $calc !== null,
    ];
}
usort($rows, static fn (array $a, array $b): int => strcmp($a['path'], $b['path']));

$byCat = [];
foreach ($rows as $row) {
    $byCat[$row['file']['cat']] = ($byCat[$row['file']['cat']] ?? 0) + 1;
}
ksort($byCat);

$edit = (string) (request('edit') ?? '');
$pageTitle = 'Tools · Calculator files';
$title = $pageTitle;
$breadcrumbs = [['label' => 'Tools', 'url' => admin_url('custom-calculators')], ['label' => 'Calculator files']];

render('calc-files', [
    'rows'        => $rows,
    'byCat'       => $byCat,
    'filter'      => $filter,
    'edit'        => $edit,
    'toolsTab'    => 'calc-files',
    'total'       => count($all),
    'pageTitle'   => $pageTitle,
    'title'       => $title,
    'breadcrumbs' => $breadcrumbs,
    'topbarActions' => [],
]);
