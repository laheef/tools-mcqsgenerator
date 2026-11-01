<?php
/**
 * Backups — database dumps, content archives, download, restore, prune.
 */

declare(strict_types=1);
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('ONIM_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}


use Onim\Admin\Activity;
use Onim\Admin\Auth;
use Onim\Admin\BackupService;
use Onim\Admin\Csrf;
use Onim\Admin\Flash;

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    Csrf::requirePost();
    Csrf::assert();
    $do = post('do', '') ?? '';

    if ($do === 'dump') {
        $result = BackupService::dumpDatabase(Auth::id(), (string) (post('note', '') ?? ''));
        $result['ok']
            ? Flash::success('Database backup created: ' . $result['file'] . ' (' . BackupService::humanSize($result['size']) . ').')
            : Flash::error($result['error']);
        redirect_to(admin_url('backups'));
    }

    if ($do === 'archive') {
        $result = BackupService::archiveContent(Auth::id(), post_bool('include_media'));
        $result['ok']
            ? Flash::success('Content archive created: ' . $result['file'] . ' (' . BackupService::humanSize($result['size']) . ').')
            : Flash::error($result['error']);
        redirect_to(admin_url('backups'));
    }

    if ($do === 'delete') {
        $ok = BackupService::delete(post_int('id'));
        $ok ? Flash::success('Backup deleted.') : Flash::error('That backup does not exist.');
        redirect_to(admin_url('backups'));
    }

    if ($do === 'restore') {
        $id = post_int('id');
        $result = BackupService::restoreDatabase($id, Auth::id());
        if ($result['ok']) {
            Flash::success('Database restored: ' . $result['statements'] . ' statements applied. A snapshot of the previous state was saved as backup #' . $result['safety'] . '.');
        } else {
            Flash::error($result['error']);
            if ($result['safety'] > 0) {
                Flash::info('A snapshot of the state before the attempt is backup #' . $result['safety'] . '.');
            }
        }
        redirect_to(admin_url('backups'));
    }

    redirect_to(admin_url('backups'));
}

if (($_GET['action'] ?? '') === 'download') {
    BackupService::download(request_int('id'));
}

$backups = BackupService::all();
$dir = BackupService::dir();
$writable = is_dir($dir) ? is_writable($dir) : is_writable(dirname($dir));
$total = 0;
foreach ($backups as $backup) {
    $total += (int) $backup['size'];
}
$zip = class_exists('ZipArchive');
$disk = @disk_free_space(dirname(ADMIN_ROOT));

$pageTitle = 'Backups';
$title = $pageTitle;
$wide = true;
render('backups', compact('backups', 'dir', 'writable', 'total', 'zip', 'disk', 'pageTitle', 'title', 'wide'));
