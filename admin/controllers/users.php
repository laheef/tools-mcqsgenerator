<?php
/**
 * Users, roles and access — administrators only.
 *
 * Guards: nobody can demote or deactivate themselves, the last active
 * administrator cannot be removed, and passwords are only ever written as hashes.
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
use Omni\Db;

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    Csrf::requirePost();
    Csrf::assert();
    $do = post('do', 'save') ?? 'save';
    $id = post_int('id');

    if ($do === 'delete') {
        $user = Db::one('SELECT * FROM users WHERE id = ?', [$id]);
        if ($user === null) {
            Flash::error('That user no longer exists.');
        } elseif ($id === Auth::id()) {
            Flash::error('You cannot delete your own account.');
        } elseif ($user['role'] === 'administrator'
            && (int) Db::value("SELECT COUNT(*) FROM users WHERE role = 'administrator' AND status = 'active'", [], 0) <= 1) {
            Flash::error('That is the last active administrator — create another one first.');
        } else {
            Db::delete('users', 'id = ?', [$id]);
            Activity::log('user_deleted', 'user', (string) $id, 'Deleted ' . $user['email']);
            Flash::success('User deleted. Their posts stay, without an author link.');
        }
        redirect_to(admin_url('users'));
    }

    if ($do === 'toggle') {
        $user = Db::one('SELECT * FROM users WHERE id = ?', [$id]);
        if ($user === null) {
            Flash::error('That user no longer exists.');
        } elseif ($id === Auth::id()) {
            Flash::error('You cannot deactivate your own account.');
        } else {
            $new = $user['status'] === 'active' ? 'inactive' : 'active';
            Db::update('users', ['status' => $new, 'updated_at' => date('Y-m-d H:i:s')], 'id = :id', [':id' => $id]);
            Activity::log('user_status', 'user', (string) $id, $user['email'] . ' → ' . $new);
            Flash::success($user['name'] . ' is now ' . $new . '.');
        }
        redirect_to(admin_url('users'));
    }

    $name = trim((string) (post('name', '') ?? ''));
    $email = mb_strtolower(trim((string) (post('email', '') ?? '')));
    $role = (string) (post('role', 'author') ?? 'author');
    $status = post('status') === 'inactive' ? 'inactive' : 'active';
    $password = (string) ($_POST['password'] ?? '');
    $password2 = (string) ($_POST['password2'] ?? '');
    $bio = mb_substr(trim((string) (post('bio', '') ?? '')), 0, 500);

    if (!in_array($role, ['administrator', 'editor', 'author'], true)) {
        $role = 'author';
    }

    $errors = [];
    if ($name === '') {
        $errors[] = 'The name is required.';
    }
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        $errors[] = 'Enter a valid email address.';
    }
    if (Db::one('SELECT id FROM users WHERE email = ? AND id <> ?', [$email, $id]) !== null) {
        $errors[] = 'Another account already uses that email address.';
    }
    if ($id === 0 || $password !== '') {
        if ($problem = Auth::passwordProblem($password, $password2)) {
            $errors[] = $problem;
        }
    }
    if ($id === Auth::id() && $role !== 'administrator') {
        $errors[] = 'You cannot remove your own administrator role.';
    }
    if ($id === Auth::id() && $status === 'inactive') {
        $errors[] = 'You cannot deactivate your own account.';
    }
    $user = $id > 0 ? Db::one('SELECT * FROM users WHERE id = ?', [$id]) : null;
    if ($user !== null && $user['role'] === 'administrator' && $role !== 'administrator'
        && (int) Db::value("SELECT COUNT(*) FROM users WHERE role = 'administrator' AND status = 'active'", [], 0) <= 1) {
        $errors[] = 'That is the last active administrator.';
    }

    if ($errors !== []) {
        foreach ($errors as $error) {
            Flash::error($error);
        }
        redirect_to(admin_url('users', $id > 0 ? ['edit' => $id] : ['edit' => 'new']));
    }

    $data = ['name' => mb_substr($name, 0, 120), 'email' => $email, 'role' => $role, 'status' => $status,
             'bio' => $bio, 'updated_at' => date('Y-m-d H:i:s')];
    if ($password !== '') {
        $data['password_hash'] = Auth::hash($password);
        $data['must_change'] = 0;
    }

    if ($user === null) {
        $data['created_at'] = date('Y-m-d H:i:s');
        $id = Db::insert('users', $data);
        Activity::log('user_created', 'user', (string) $id, 'Created ' . $email . ' as ' . $role);
        Flash::success('User created. Send them the email address and the password you set.');
    } else {
        Db::update('users', $data, 'id = :id', [':id' => $id]);
        Activity::log('user_updated', 'user', (string) $id, 'Saved ' . $email . ' as ' . $role);
        Flash::success('User saved.');
    }
    redirect_to(admin_url('users'));
}

$editParam = request('edit');
$editing = null;
if ($editParam !== null && $editParam !== 'new') {
    $editing = Db::one('SELECT * FROM users WHERE id = ?', [(int) $editParam]);
}
$users = Db::all('SELECT id, name, email, role, status, last_login_at, last_login_ip, created_at FROM users ORDER BY name');
$postCounts = [];
foreach (Db::all('SELECT author_id, COUNT(*) AS c FROM posts GROUP BY author_id') as $row) {
    $postCounts[(int) $row['author_id']] = (int) $row['c'];
}

$pageTitle = 'Users';
$title = $pageTitle;
$wide = true;
$topbarActions = [['label' => 'New user', 'url' => admin_url('users', ['edit' => 'new']), 'icon' => 'plus', 'class' => 'btn-primary']];

render('users', compact('users', 'editing', 'postCounts', 'pageTitle', 'title', 'wide', 'topbarActions'));
