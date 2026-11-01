<?php
/** Activity log — the append-only audit trail, filterable and paginated. */

declare(strict_types=1);
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('OMNI_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}


use Omni\Admin\Activity as Log;
use Omni\Admin\Csrf;
use Omni\Admin\Flash;
use Omni\Admin\Pagination;
use Omni\Db;

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    Csrf::requirePost();
    Csrf::assert();
    if (post('do') === 'prune') {
        $days = max(7, post_int('days', 90));
        $removed = Db::exec('DELETE FROM activity_log WHERE created_at < DATE_SUB(NOW(), INTERVAL ? DAY)', [$days]);
        Db::exec('DELETE FROM rate_limits WHERE window_start < DATE_SUB(NOW(), INTERVAL 2 DAY)');
        Log::log('activity_pruned', 'system', '', 'Deleted ' . $removed . ' log entries older than ' . $days . ' days');
        Flash::success($removed . ' entries older than ' . $days . ' days deleted.');
        redirect_to(admin_url('activity'));
    }
    redirect_to(admin_url('activity'));
}

$q = (string) (request('q') ?? '');
$action = (string) (request('action_filter') ?? '');
$user = (string) (request('user') ?? '');
$where = '1 = 1';
$params = [];
if ($q !== '') {
    $where .= ' AND (summary LIKE ? OR entity_id LIKE ?)';
    $params[] = '%' . $q . '%';
    $params[] = '%' . $q . '%';
}
if ($action !== '') {
    $where .= ' AND action = ?';
    $params[] = $action;
}
if ($user !== '') {
    $where .= ' AND user_name = ?';
    $params[] = $user;
}

$total = (int) Db::value('SELECT COUNT(*) FROM activity_log WHERE ' . $where, $params, 0);
$paginator = new Pagination($total, 40, request_int('pg', 1));
$rows = Db::all('SELECT * FROM activity_log WHERE ' . $where . ' ORDER BY id DESC LIMIT ' . $paginator->perPage . ' OFFSET ' . $paginator->offset(), $params);
$actions = Db::all('SELECT action, COUNT(*) AS c FROM activity_log GROUP BY action ORDER BY action');
$users = Db::all('SELECT user_name, COUNT(*) AS c FROM activity_log GROUP BY user_name ORDER BY user_name');

$pageTitle = 'Activity log';
$title = $pageTitle;
$wide = true;
render('activity', compact('rows', 'paginator', 'actions', 'users', 'q', 'action', 'user', 'total', 'pageTitle', 'title', 'wide'));
