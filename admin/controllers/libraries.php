<?php
/**
 * Tool libraries — the third-party scripts and stylesheets a tool can load.
 *
 * One row is one address the panel is allowed to print into <head>: Chart.js,
 * KaTeX, a self-hosted copy of either. The list exists for three reasons:
 *
 *   - the same address stops being retyped into every tool file;
 *   - an address is auditable — you can see every script the site loads;
 *   - swapping a CDN for a local copy is one edit, not a search-and-replace
 *     across plugins/.
 *
 * A tool file may declare what it needs in its header (`Libraries: chart-js`),
 * and uploading it creates the row here if it does not exist. Pages choose
 * their libraries on the tool screen; this screen only owns the list.
 */

declare(strict_types=1);

$toolsTab = 'libraries';
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('ONIM_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}

use Onim\Admin\Activity;
use Onim\Admin\Csrf;
use Onim\Admin\Flash;
use Onim\Db;
use Onim\ToolLibraries;

$missingMigration = !ToolLibraries::enabled();

/* ------------------------------------------------------------------ post */

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    Csrf::requirePost();
    Csrf::assert();
    $action = post('do', 'save') ?? 'save';
    $id     = post_int('id');

    if ($action === 'delete') {
        $row = ToolLibraries::find($id);
        if ($row !== null && ToolLibraries::delete($id)) {
            Activity::log('library_deleted', 'library', (string) $id, 'Deleted library ' . $row['slug']);
            Flash::success('“' . $row['name'] . '” was removed. Pages that loaded it stop loading it.');
        } else {
            Flash::error('That library no longer exists.');
        }
        redirect_to(admin_url('libraries'));
    }

    /*
     * A library can arrive as a file instead of an address: the owner uploads
     * the .js/.css, it is stored under assets/libraries/, and the row points at
     * that path. An address that was typed in still wins over nothing, so the
     * form accepts either.
     */
    $kind = (string) (post('kind', 'js') ?? 'js');
    $url  = trim((string) (post('url', '') ?? ''));
    $upload = $_FILES['library_file'] ?? null;
    if (is_array($upload) && (int) ($upload['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_NO_FILE) {
        $uploadError = '';
        $stored = ToolLibraries::storeUpload($upload, $kind, $uploadError);
        if ($stored === '') {
            Flash::error($uploadError !== '' ? $uploadError : 'The file could not be stored.');
            redirect_to(admin_url('libraries', $id > 0 ? ['edit' => $id] : []));
        }
        $url  = $stored;
        $kind = strtolower(pathinfo($stored, PATHINFO_EXTENSION)) === 'css' ? 'css' : 'js';
    }

    $result = ToolLibraries::save([
        'name'        => (string) (post('name', '') ?? ''),
        'slug'        => (string) (post('slug', '') ?? ''),
        'kind'        => $kind,
        'url'         => $url,
        'integrity'   => (string) (post('integrity', '') ?? ''),
        'crossorigin' => (string) (post('crossorigin', '') ?? ''),
        'notes'       => (string) (post('notes', '') ?? ''),
    ], $id);

    if (!$result['ok']) {
        foreach ($result['errors'] as $error) {
            Flash::error($error);
        }
        redirect_to(admin_url('libraries', $id > 0 ? ['edit' => $id] : []));
    }

    $savedId = (int) $result['id'];

    /*
     * Which pages load it. The checkboxes are the pages the owner ticked, so a
     * page that was ticked before and is not ticked now loses the library —
     * that is the point of the list: one place to put a script on a page, and
     * one place to take it off again.
     */
    $assign = array_map('intval', array_keys((array) ($_POST['assign'] ?? [])));
    $moved  = 0;
    if (Db::hasTable('custom_calculators') && Db::hasColumn('custom_calculators', 'libraries')) {
        $slug = (string) (ToolLibraries::find($savedId)['slug'] ?? '');
        if ($slug !== '') {
            foreach (Db::all('SELECT id, libraries FROM custom_calculators') as $page) {
                $now  = ToolLibraries::split((string) $page['libraries']);
                $wants = in_array((int) $page['id'], $assign, true);
                $has   = in_array($slug, $now, true);
                if ($wants === $has) {
                    continue;
                }
                if ($wants) {
                    $now[] = $slug;
                } else {
                    $now = array_values(array_filter($now, static fn (string $one): bool => $one !== $slug));
                }
                Db::update('custom_calculators', ['libraries' => implode(',', array_values(array_unique($now)))], 'id = :id', [':id' => (int) $page['id']]);
                $moved++;
            }
        }
        if ($moved > 0) {
            Activity::log('library_assigned', 'library', (string) $savedId, 'Changed the pages that load a library');
        }
    }

    Activity::log($id > 0 ? 'library_updated' : 'library_created', 'library', (string) $savedId, 'Saved library');
    $flash = $id > 0 ? 'Library updated.' : 'Library added. It can be picked on any tool page.';
    if ($moved > 0) {
        $flash .= ' ' . $moved . ' page' . ($moved === 1 ? '' : 's') . ' changed.';
    }
    Flash::success($flash);
    /* Land on the row, so the list of pages it loads is right there. */
    redirect_to(admin_url('libraries', ['edit' => $savedId]));
}

/* ------------------------------------------------------------------ view */

$rows = ToolLibraries::rows(true);

/* How many pages load each one — the reason to keep a row, or to delete it. */
$usage = [];
if (Db::hasTable('custom_calculators') && Db::hasColumn('custom_calculators', 'libraries')) {
    foreach (Db::all('SELECT libraries FROM custom_calculators WHERE libraries <> ""') as $page) {
        foreach (ToolLibraries::split((string) $page['libraries']) as $slug) {
            $usage[$slug] = ($usage[$slug] ?? 0) + 1;
        }
    }
}

$editId = post_int('edit', 0) ?: (int) (request('edit', '0') ?? 0);
$editing = $editId > 0 ? ToolLibraries::find($editId) : null;
$form = $editing ?? ['name' => '', 'slug' => '', 'kind' => 'js', 'url' => '', 'integrity' => '', 'crossorigin' => '', 'notes' => ''];
$form['slug'] = (string) ($form['slug'] ?? '');

$pageTitle = 'Tools · Libraries';
$title = $pageTitle;
$breadcrumbs = [['label' => 'Tools', 'url' => admin_url('custom-calculators')], ['label' => 'Libraries']];

/* Every page a library can be attached to: tools first, then calculators. */
$assignable = [];
if (Db::hasTable('custom_calculators') && Db::hasColumn('custom_calculators', 'libraries')) {
    foreach (Db::all('SELECT id, name, slug, category_slug, kind, status, libraries FROM custom_calculators
                       ORDER BY kind = "builder", name') as $page) {
        $assignable[] = $page;
    }
}

render('libraries', compact(
    'rows', 'usage', 'editing', 'form', 'pageTitle', 'title', 'breadcrumbs',
    'toolsTab', 'missingMigration', 'assignable'
));
