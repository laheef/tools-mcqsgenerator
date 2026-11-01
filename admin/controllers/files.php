<?php
/**
 * Source files — browse, open, edit, create, restore and delete.
 *
 * "Calculator files" are the definitions and prose the calculators are built
 * from, plus the templates that render them. Editing here is deliberately
 * separate from editing content: metadata (who, when, versions) is shown next to
 * the code, and the code area itself is a plain editor with a real syntax check.
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
use Onim\Admin\FileRepo;
use Onim\Admin\Flash;
use Onim\Cms;

$action = (string) (request('action') ?? '');
$path = (string) (request('path') ?? '');

/*
 * `?p=file-edit&path=lib/Data.php` has always been the link the file list and the
 * redirects after a save produce. Treat a path on its own as "open this file" so
 * those links land in the editor instead of falling back to the list.
 */
if ($action === '') {
    $action = $path !== '' ? 'edit' : 'list';
}

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    Csrf::requirePost();
    Csrf::assert();
    $do = post('do', '') ?? '';
    $target = (string) (post('path', '') ?? '');

    if ($do === 'save') {
        $content = (string) ($_POST['content'] ?? '');
        if (!Csrf::valid()) {
            Flash::error('The form expired.');
            redirect_to(admin_url('file-edit', ['path' => $target]));
        }
        $result = FileRepo::write($target, $content, Auth::id(), (string) (post('note', '') ?? ''));
        if ($result['ok']) {
            Flash::success('Saved ' . $target . '. A copy of the previous version is stored as version ' . $result['version'] . '.');
            foreach ($result['warnings'] as $warning) {
                Flash::info($warning);
            }
            redirect_to(admin_url('file-edit', ['path' => $target]));
        }
        Flash::error($result['error']);
        // fell through: re-render the editor with the rejected content so nothing is lost
        $file = ['path' => $target, 'content' => $content, 'read_only' => false];
        $versions = FileRepo::versions($target);
        $draft = $content;
        $pageTitle = basename($target);
        $title = 'Edit file';
        render('file-edit', compact('file', 'versions', 'draft', 'pageTitle', 'title'));
        exit;
    }

    if ($do === 'create') {
        $newPath = (string) (post('new_path', '') ?? '');
        $resolved = FileRepo::resolve(ltrim($newPath, '/'), false);
        if (!$resolved['ok']) {
            Flash::error($resolved['error']);
        } elseif (is_file(FileRepo::root() . '/' . $resolved['path'])) {
            Flash::error('That file already exists. Open it to edit it.');
        } else {
            $scaffold = (string) (post('content', '') ?? '');
            $result = FileRepo::write($resolved['path'], $scaffold, Auth::id(), 'Created in the panel');
            if ($result['ok']) {
                Flash::success('Created ' . $resolved['path'] . '.');
                redirect_to(admin_url('file-edit', ['path' => $resolved['path']]));
            }
            Flash::error($result['error']);
        }
        redirect_to(admin_url('files', ['action' => 'new']));
    }

    if ($do === 'delete') {
        $result = FileRepo::delete($target, Auth::id());
        if ($result['ok']) {
            Flash::success('Deleted ' . $target . '.');
        } else {
            Flash::error($result['error'] . ($result['usage'] !== [] ? ' Used by: ' . implode(', ', $result['usage']) : ''));
        }
        redirect_to(admin_url('files'));
    }

    if ($do === 'restore') {
        $result = FileRepo::restore($target, post_int('version_id'), Auth::id());
        if ($result['ok']) {
            Flash::success('Restored. The body you replaced is still in the history.');
        } else {
            Flash::error($result['error']);
        }
        redirect_to(admin_url('file-edit', ['path' => $target, 'tab' => 'history']));
    }

    redirect_to(admin_url('files'));
}

/* --------------------------------------------------------------- editing */

if ($action === 'edit' && $path !== '') {
    $resolved = FileRepo::resolve($path);
    if (!$resolved['ok']) {
        Flash::error($resolved['error']);
        redirect_to(admin_url('files'));
    }
    $content = FileRepo::read($path);
    if ($content === null) {
        Flash::error('That file is too large to edit in the browser (over 2 MB).');
        redirect_to(admin_url('files'));
    }
    $file = [
        'path'      => $path,
        'content'   => $content,
        'read_only' => FileRepo::isReadOnly($path),
        'language'  => FileRepo::language($path),
        'size'      => strlen($content),
        'lines'     => substr_count($content, "\n") + 1,
        'modified'  => (int) @filemtime($resolved['absolute']),
    ];
    $versions = FileRepo::versions($path);
    $draft = $content;
    $check = FileRepo::syntaxCheck($path, $content);
    $pageTitle = basename($path);
    $title = 'Edit file';
    $breadcrumbs = [
        ['label' => 'Source files', 'url' => admin_url('files')],
        ['label' => $path],
    ];
    $wide = true;
    render('file-edit', compact('file', 'versions', 'draft', 'check', 'pageTitle', 'title', 'breadcrumbs', 'wide'));
    exit;
}

/* ------------------------------------------------------------------ list */

$tree = FileRepo::tree();
$counts = ['files' => 0, 'versions' => 0, 'lines' => 0];
foreach ($tree as $files) {
    foreach ($files as $file) {
        $counts['files']++;
        $counts['versions'] += $file['versions'];
        $counts['lines'] += $file['lines'];
    }
}

$pageTitle = 'Source files';
$title = $pageTitle;
$wide = true;
$topbarActions = [['label' => 'New file', 'url' => admin_url('files', ['action' => 'new']), 'icon' => 'plus', 'class' => 'btn-primary']];

render('files', compact('tree', 'counts', 'pageTitle', 'title', 'wide', 'topbarActions'));
