<?php
/**
 * Media library — upload, preview, search, copy URL, edit alt text, delete.
 *
 * Also serves the JSON feed used by the media picker in the editors.
 */

declare(strict_types=1);
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('OMNI_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}


use Omni\Admin\Activity;
use Omni\Admin\Auth;
use Omni\Admin\Csrf;
use Omni\Admin\Flash;
use Omni\Admin\MediaRepo;
use Omni\Admin\Pagination;
use Omni\Db;

$action = (string) (request('action') ?? 'list');

/* ------------------------------------------------------- JSON for pickers */

if ($action === 'json') {
    header('Content-Type: application/json; charset=utf-8');
    header('X-Content-Type-Options: nosniff');
    $items = [];
    foreach (MediaRepo::query((string) (request('q') ?? ''), 'image', 60) as $row) {
        $items[] = [
            'id'         => (int) $row['id'],
            'name'       => (string) $row['filename'],
            'path'       => (string) $row['path'],
            'url'        => MediaRepo::url((string) $row['path']),
            'dimensions' => (int) $row['width'] > 0 ? $row['width'] . '×' . $row['height'] : MediaRepo::humanSize((int) $row['size']),
        ];
    }
    echo json_encode(['items' => $items], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    exit;
}

/* --------------------------------------------------------------- uploads */

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    Csrf::requirePost();
    Csrf::assert();
    $do = post('do', '') ?? '';

    if ($do === 'upload') {
        $files = $_FILES['files'] ?? null;
        if ($files === null) {
            Flash::error('No files were selected.');
            redirect_to(admin_url('media'));
        }
        $names = is_array($files['name']) ? $files['name'] : [$files['name']];
        $ok = 0;
        $problems = [];
        foreach (array_keys($names) as $i) {
            $file = [
                'name'     => is_array($files['name']) ? $files['name'][$i] : $files['name'],
                'type'     => is_array($files['type']) ? $files['type'][$i] : $files['type'],
                'tmp_name' => is_array($files['tmp_name']) ? $files['tmp_name'][$i] : $files['tmp_name'],
                'error'    => is_array($files['error']) ? $files['error'][$i] : $files['error'],
                'size'     => is_array($files['size']) ? $files['size'][$i] : $files['size'],
            ];
            $result = MediaRepo::upload($file, Auth::id());
            if ($result['ok']) {
                $ok++;
            } else {
                $problems[] = $file['name'] . ': ' . $result['error'];
            }
        }
        if ($ok > 0) {
            Flash::success($ok . ' file' . ($ok === 1 ? '' : 's') . ' uploaded.');
        }
        foreach ($problems as $problem) {
            Flash::error($problem);
        }
        redirect_to(admin_url('media'));
    }

    if ($do === 'update') {
        $id = post_int('id');
        Db::update('media', [
            'alt'     => mb_substr(trim((string) (post('alt', '') ?? '')), 0, 255),
            'caption' => mb_substr(trim((string) (post('caption', '') ?? '')), 0, 255),
        ], 'id = :id', [':id' => $id]);
        Activity::log('media_updated', 'media', (string) $id, 'Updated alt text');
        Flash::success('Details saved.');
        redirect_to(admin_url('media', ['edit' => $id]));
    }

    if ($do === 'delete') {
        $id = post_int('id');
        $force = post_bool('force');
        $result = MediaRepo::delete($id, $force);
        if ($result['ok']) {
            Flash::success('File deleted.');
        } else {
            Flash::error($result['error']);
            if ($result['usage'] !== []) {
                Flash::info('Used in: ' . implode(' · ', array_map(
                    static fn (array $u): string => $u['type'] . ' — ' . $u['label'],
                    $result['usage']
                )));
            }
        }
        redirect_to(admin_url('media'));
    }

    redirect_to(admin_url('media'));
}

$q = (string) (request('q') ?? '');
$type = (string) (request('type') ?? '');
$paginator = new Pagination(MediaRepo::count($q, $type), 48, request_int('pg', 1));
$items = MediaRepo::query($q, $type, $paginator->perPage, $paginator->offset());
$stats = MediaRepo::stats();

$editId = request_int('edit', 0);
$editing = $editId > 0 ? Db::one('SELECT * FROM media WHERE id = ?', [$editId]) : null;
$editingUsage = $editing === null ? [] : MediaRepo::usage((int) $editing['id']);

$pageTitle = 'Media';
$title = $pageTitle;
$wide = true;
$maxUpload = (string) ini_get('upload_max_filesize');

render('media', compact('items', 'paginator', 'stats', 'q', 'type', 'editing', 'editingUsage', 'maxUpload', 'pageTitle', 'title', 'wide'));
