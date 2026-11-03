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

if (!ToolLibraries::enabled()) {
    $missingMigration = true;
}

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

    $result = ToolLibraries::save([
        'name'        => (string) (post('name', '') ?? ''),
        'slug'        => (string) (post('slug', '') ?? ''),
        'kind'        => (string) (post('kind', 'js') ?? 'js'),
        'url'         => (string) (post('url', '') ?? ''),
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

    Activity::log($id > 0 ? 'library_updated' : 'library_created', 'library', (string) $result['id'], 'Saved library');
    Flash::success($id > 0 ? 'Library updated.' : 'Library added. It can be picked on any tool page.');
    redirect_to(admin_url('libraries'));
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

render('libraries', compact('rows', 'usage', 'editing', 'form', 'pageTitle', 'title', 'breadcrumbs', 'toolsTab', 'missingMigration'));
