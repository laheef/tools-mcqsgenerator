<?php
/**
 * Tool plugins — the PHP files that can back a calculator page.
 *
 * This screen is the whole lifecycle of a tool file:
 *
 *   upload  → the file is parsed, syntax-checked and written to plugins/<cat>/
 *   create  → one click turns the file into a draft calculator page
 *   edit    → the page's article, FAQ, related and SEO are edited as usual
 *   replace → upload a new version under the same shortcode; every page that
 *             uses it updates, with no page edit
 *   delete  → refused while a published page still points at it
 *
 * A calculator page whose widget is a file is still an ordinary page in
 * custom_calculators: it is routed, listed, searched, sitemapped and counted by
 * exactly the same code as a formula calculator. The only difference is the
 * `kind` column and what the tool column renders.
 */

declare(strict_types=1);
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('ONIM_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}

use Onim\Admin\Activity;
use Onim\Admin\Auth;
use Onim\Admin\Csrf;
use Onim\Admin\Flash;
use Onim\CustomCalc;
use Onim\Data;
use Onim\Toolkit;

/* ------------------------------------------------------------ download */
/*
 * Served from here rather than from the folder, because the folder is blocked
 * over HTTP on purpose. The path is checked twice — it must resolve inside
 * plugins/ — before a byte is read.
 */
if (($_GET['do'] ?? '') === 'download') {
    $file = (string) ($_GET['tool_file'] ?? '');
    if (!Toolkit::isToolPath($file) || !is_file(Toolkit::absolute($file))) {
        http_response_code(404);
        render_plain('error', ['code' => 404, 'message' => 'That tool file does not exist.']);
        exit;
    }
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($file) . '"');
    header('Content-Length: ' . (string) filesize(Toolkit::absolute($file)));
    header('X-Content-Type-Options: nosniff');
    readfile(Toolkit::absolute($file));
    exit;
}

/* ---------------------------------------------------------------- post */
if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    Csrf::requirePost();
    Csrf::assert();
    $action = post('do', 'upload') ?? 'upload';

    /* ------------------------------------------------------------ upload */
    if ($action === 'upload') {
        $category  = (string) (post('category', '') ?? '');
        $replace   = post_bool('replace');
        $upload    = $_FILES['file'] ?? [];
        $error     = '';

        $stored = is_array($upload)
            ? Toolkit::install($upload, $category, $replace, $error)
            : null;

        if ($stored === null) {
            Flash::error($error !== '' ? $error : 'The upload failed.');
            redirect_to(admin_url('tool-plugins'));
        }

        /* The fresh scan is the only way to learn the shortcode of a file that
           was not on disk a moment ago. */
        $tool = null;
        foreach (Toolkit::scan(true) as $candidate) {
            if ($candidate['file'] === $stored) {
                $tool = $candidate;
                break;
            }
        }

        Activity::log('tool_uploaded', 'tool', $stored, 'Uploaded tool file ' . $stored);
        Flash::success('Uploaded ' . $stored . ($tool !== null ? ' — [' . $tool['shortcode'] . '] is ready to bind to a page.' : '.'));
        redirect_to(admin_url('tool-plugins', $tool !== null ? ['highlight' => $tool['shortcode']] : []));
    }

    /* ------------------------------------------------------------ create */
    if ($action === 'create') {
        $shortcode = trim((string) (post('shortcode', '') ?? ''));
        $tool      = Toolkit::find($shortcode);
        if ($tool === null || !$tool['valid']) {
            Flash::error('That tool cannot be used: ' . ($tool['error'] ?? 'it is not in the folder.'));
            redirect_to(admin_url('tool-plugins'));
        }
        $category = (string) (post('category', '') ?? '');
        $result   = CustomCalc::createFromTool($tool, $category, (int) Auth::id());
        if (!$result['ok']) {
            foreach ($result['errors'] as $problem) {
                Flash::error($problem);
            }
            redirect_to(admin_url('tool-plugins'));
        }
        Activity::log('tool_page_created', 'calculator', (string) $result['id'], 'Created a page for [' . $shortcode . ']');
        Flash::success('Draft page created. Write the article, then publish it.');
        redirect_to(admin_url('custom-calculator-edit', ['id' => $result['id'], 'tab' => 'basics']));
    }

    /* ------------------------------------------------------------ delete */
    if ($action === 'delete') {
        $file = (string) (post('tool_file', '') ?? '');
        $tool = null;
        foreach (Toolkit::scan() as $candidate) {
            if ($candidate['file'] === $file) {
                $tool = $candidate;
                break;
            }
        }

        if ($tool !== null) {
            $used = CustomCalc::toolUsage($tool['shortcode']);
            if ($used !== [] && !post_bool('force')) {
                $names = array_map(static fn (array $row): string => '“' . $row['name'] . '”', $used);
                Flash::error(
                    '[' . $tool['shortcode'] . '] is still used by ' . implode(', ', $names)
                    . '. Point those pages somewhere else first, or tick “delete anyway” — they will then show '
                    . '“this tool could not run” until they are fixed.'
                );
                redirect_to(admin_url('tool-plugins'));
            }
        }

        $error = '';
        if (!Toolkit::remove($file, $error)) {
            Flash::error($error);
            redirect_to(admin_url('tool-plugins'));
        }

        Activity::log('tool_deleted', 'tool', $file, 'Deleted tool file ' . $file . ' (a copy is in data/backups/tools)');
        Flash::success('Deleted ' . $file . '. A copy is kept in data/backups/tools.');
        redirect_to(admin_url('tool-plugins'));
    }

    /* ------------------------------------------------------------ rescan */
    Toolkit::forget();
    Flash::info('Folder re-scanned.');
    redirect_to(admin_url('tool-plugins'));
}

/* ---------------------------------------------------------------- view */
$tools      = Toolkit::scan(true);
$byCategory = Toolkit::byCategory();
$errors     = Toolkit::errors();

/* Which pages use which shortcode, and which are stale or broken. */
$usage = [];
foreach ($tools as $tool) {
    $usage[$tool['shortcode']] = CustomCalc::toolUsage($tool['shortcode']);
}

$stats = ['tools' => 0, 'valid' => 0, 'bound' => 0, 'problems' => 0];
foreach ($tools as $tool) {
    $stats['tools']++;
    if ($tool['valid']) {
        $stats['valid']++;
    } else {
        $stats['problems']++;
    }
    if (($usage[$tool['shortcode']] ?? []) !== []) {
        $stats['bound']++;
    }
}

/* Categories a tool can be filed under: the catalogue's, plus any folder that
   already exists on disk (so an unusual folder is not silently unusable). */
$categoryOptions = [];
foreach (Data::categories() as $cat) {
    $categoryOptions[(string) $cat['slug']] = (string) $cat['name'];
}
foreach (Toolkit::categoryNames() as $slug => $label) {
    $categoryOptions[$slug] = $categoryOptions[$slug] ?? $label . ' (folder only)';
}

$highlight = (string) (request('highlight', '') ?? '');
$missingMigration = !CustomCalc::enabled() || !CustomCalc::tracksTools();

$pageTitle = 'Tool plugins';
$title = 'Tool plugins';
$breadcrumbs = [['label' => 'Tool plugins']];
$topbarActions = [];

render('tool-plugins', compact(
    'tools', 'byCategory', 'usage', 'stats', 'errors', 'categoryOptions',
    'highlight', 'missingMigration', 'pageTitle', 'title', 'breadcrumbs', 'topbarActions'
));
