<?php
/**
 * Inbox — messages from the contact form.
 *
 * Supports read/unread/resolved/spam states, internal notes, search, filters,
 * CSV export and re-sending the notification email when delivery failed.
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
use Omni\Admin\Pagination;
use Omni\Cms;
use Omni\Db;
use Omni\Mailer;

$action = (string) (request('action') ?? 'list');

/** Reusable: the notification body for one message. */
function inbox_notify(array $message): array
{
    $rows = '';
    foreach (['name' => 'Name', 'email' => 'Email', 'phone' => 'Phone', 'subject' => 'Subject'] as $key => $label) {
        if (trim((string) ($message[$key] ?? '')) !== '') {
            $rows .= '<tr><td style="padding:4px 10px 4px 0;color:#666">' . $label . '</td><td>' . e((string) $message[$key]) . '</td></tr>';
        }
    }
    return Mailer::send([
        'to'         => (string) (Cms::setting('mail_to') ?: Cms::setting('contact_email') ?: ''),
        'subject'    => 'New message: ' . ($message['subject'] !== '' ? (string) $message['subject'] : 'contact form'),
        'reply_to'   => (string) $message['email'],
        'reply_name' => (string) $message['name'],
        'html'       => '<h2 style="font:600 16px system-ui">New message from the contact form</h2>'
                      . '<table style="font:14px system-ui">' . $rows . '</table>'
                      . '<p style="font:14px system-ui;white-space:pre-wrap">' . nl2br(e((string) $message['body'])) . '</p>'
                      . '<p style="font:12px system-ui;color:#666">Received ' . e((string) $message['created_at']) . ' from ' . e((string) $message['ip']) . '</p>',
    ]);
}

/* ---------------------------------------------------------------- actions */

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    Csrf::requirePost();
    Csrf::assert();
    $do = post('do', '') ?? '';
    $id = post_int('id');

    if ($do === 'status') {
        $status = (string) (post('status', 'read') ?? 'read');
        if (!in_array($status, ['unread', 'read', 'resolved', 'spam'], true)) {
            $status = 'read';
        }
        $data = ['status' => $status];
        if ($status === 'read') {
            $data['read_at'] = date('Y-m-d H:i:s');
        }
        if ($status === 'resolved') {
            $data['resolved_at'] = date('Y-m-d H:i:s');
        }
        Db::update('messages', $data, 'id = :id', [':id' => $id]);
        Activity::log('message_status', 'message', (string) $id, 'Message marked ' . $status);
        Flash::success('Message marked ' . $status . '.');
        $back = post('back', 'inbox') ?? 'inbox';
        redirect_to(admin_url($back === 'view' ? 'inbox' : 'inbox', $back === 'view' ? ['action' => 'view', 'id' => $id] : []));
    }

    if ($do === 'bulk') {
        $ids = array_map('intval', post_array('ids'));
        $status = (string) (post('bulk_status', '') ?? '');
        $deleted = 0;
        foreach ($ids as $messageId) {
            if ($status === 'delete') {
                $deleted += Db::delete('messages', 'id = ?', [$messageId]);
            } elseif (in_array($status, ['read', 'unread', 'resolved', 'spam'], true)) {
                Db::update('messages', ['status' => $status], 'id = :id', [':id' => $messageId]);
            }
        }
        Activity::log('messages_bulk', 'message', implode(',', array_slice($ids, 0, 5)), 'Bulk ' . $status . ' on ' . count($ids) . ' message(s)');
        Flash::success($status === 'delete'
            ? $deleted . ' message(s) deleted.'
            : count($ids) . ' message(s) marked ' . $status . '.');
        redirect_to(admin_url('inbox'));
    }

    if ($do === 'delete') {
        Db::delete('messages', 'id = ?', [$id]);
        Activity::log('message_deleted', 'message', (string) $id, 'Deleted a message');
        Flash::success('Message deleted.');
        redirect_to(admin_url('inbox'));
    }

    if ($do === 'note') {
        $note = trim((string) (post('note', '') ?? ''));
        if ($note !== '') {
            Db::insert('message_notes', ['message_id' => $id, 'user_id' => Auth::id(), 'note' => mb_substr($note, 0, 2000)]);
            Activity::log('message_note', 'message', (string) $id, 'Added an internal note');
            Flash::success('Note saved.');
        }
        redirect_to(admin_url('inbox', ['action' => 'view', 'id' => $id]));
    }

    if ($do === 'resend') {
        $message = Db::one('SELECT * FROM messages WHERE id = ?', [$id]);
        if ($message !== null) {
            $result = inbox_notify($message);
            Db::update('messages', [
                'mail_status' => $result['ok'] ? 'sent' : 'failed',
                'mail_error'  => mb_substr($result['error'], 0, 500),
            ], 'id = :id', [':id' => $id]);
            $result['ok']
                ? Flash::success('Notification email sent via ' . $result['transport'] . '.')
                : Flash::error('Still could not send: ' . $result['error']);
        }
        redirect_to(admin_url('inbox', ['action' => 'view', 'id' => $id]));
    }

    redirect_to(admin_url('inbox'));
}

/* ------------------------------------------------------------------- CSV */

if ($action === 'export') {
    $rows = Db::all('SELECT id, created_at, name, email, phone, subject, body, status, ip FROM messages ORDER BY id DESC');
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename="inbox-' . date('Y-m-d') . '.csv"');
    header('X-Content-Type-Options: nosniff');
    $out = fopen('php://output', 'w');
    fwrite($out, "\xEF\xBB\xBF"); // Excel reads UTF-8 with a BOM
    fputcsv($out, ['ID', 'Received', 'Name', 'Email', 'Phone', 'Subject', 'Message', 'Status', 'IP']);
    foreach ($rows as $row) {
        fputcsv($out, array_values($row));
    }
    fclose($out);
    Activity::log('messages_export', 'message', '', 'Exported ' . count($rows) . ' messages to CSV');
    exit;
}

/* ------------------------------------------------------------------- view */

if ($action === 'view') {
    $id = request_int('id', 0);
    $message = Db::one('SELECT * FROM messages WHERE id = ?', [$id]);
    if ($message === null) {
        Flash::error('That message no longer exists.');
        redirect_to(admin_url('inbox'));
    }
    if ($message['status'] === 'unread') {
        Db::update('messages', ['status' => 'read', 'read_at' => date('Y-m-d H:i:s')], 'id = :id', [':id' => $id]);
        $message['status'] = 'read';
    }
    $notes = Db::all('SELECT n.*, u.name AS author FROM message_notes n LEFT JOIN users u ON u.id = n.user_id
                      WHERE n.message_id = ? ORDER BY n.id', [$id]);
    $extra = Cms::decode((string) ($message['extra'] ?? ''), []);
    $pageTitle = 'Message from ' . ($message['name'] !== '' ? (string) $message['name'] : (string) $message['email']);
    $title = $pageTitle;
    $wide = true;
    $breadcrumbs = [['label' => 'Inbox', 'url' => admin_url('inbox')], ['label' => '#' . $id]];
    render('inbox-view', compact('message', 'notes', 'extra', 'pageTitle', 'title', 'wide', 'breadcrumbs'));
    exit;
}

/* ------------------------------------------------------------------- list */

$status = (string) (request('status') ?? '');
$q = (string) (request('q') ?? '');
$where = '1 = 1';
$params = [];
if ($status === 'failed') {
    $where .= " AND mail_status = 'failed'";
} elseif ($status !== '') {
    $where .= ' AND status = ?';
    $params[] = $status;
}
if ($q !== '') {
    $where .= ' AND (name LIKE ? OR email LIKE ? OR subject LIKE ? OR body LIKE ?)';
    $like = '%' . $q . '%';
    array_push($params, $like, $like, $like, $like);
}
$total = (int) Db::value('SELECT COUNT(*) FROM messages WHERE ' . $where, $params, 0);
$paginator = new Pagination($total, 25, request_int('pg', 1));
$rows = Db::all('SELECT * FROM messages WHERE ' . $where . ' ORDER BY id DESC LIMIT ' . $paginator->perPage . ' OFFSET ' . $paginator->offset(), $params);

$counts = [
    'unread'   => (int) Db::value("SELECT COUNT(*) FROM messages WHERE status = 'unread'", [], 0),
    'read'     => (int) Db::value("SELECT COUNT(*) FROM messages WHERE status = 'read'", [], 0),
    'resolved' => (int) Db::value("SELECT COUNT(*) FROM messages WHERE status = 'resolved'", [], 0),
    'spam'     => (int) Db::value("SELECT COUNT(*) FROM messages WHERE status = 'spam'", [], 0),
    'failed'   => (int) Db::value("SELECT COUNT(*) FROM messages WHERE mail_status = 'failed'", [], 0),
    'total'    => (int) Db::value('SELECT COUNT(*) FROM messages', [], 0),
];

$pageTitle = 'Inbox';
$title = $pageTitle;
$wide = true;
$topbarActions = [['label' => 'Export CSV', 'url' => admin_url('inbox', ['action' => 'export']), 'icon' => 'download']];

render('inbox', compact('rows', 'paginator', 'counts', 'q', 'status', 'pageTitle', 'title', 'wide', 'topbarActions'));
