<?php
/** Account — the signed-in user's own profile and password. */

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
use Onim\Db;

$user = Auth::user();
if ($user === null) {
    redirect_to(admin_url('login'));
}

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    Csrf::requirePost();
    Csrf::assert();
    $do = post('do', 'profile') ?? 'profile';

    if ($do === 'profile') {
        $name = trim((string) (post('name', '') ?? ''));
        $bio = mb_substr(trim((string) (post('bio', '') ?? '')), 0, 500);
        if ($name === '') {
            Flash::error('Your name cannot be empty.');
        } else {
            Db::update('users', ['name' => mb_substr($name, 0, 120), 'bio' => $bio, 'updated_at' => date('Y-m-d H:i:s')],
                'id = :id', [':id' => (int) $user['id']]);
            Activity::log('profile_updated', 'user', (string) $user['id'], 'Updated their own profile');
            Flash::success('Profile saved.');
        }
        redirect_to(admin_url('account'));
    }

    if ($do === 'password') {
        $current = (string) ($_POST['current'] ?? '');
        $new = (string) ($_POST['password'] ?? '');
        $again = (string) ($_POST['password2'] ?? '');
        if (!password_verify($current, (string) $user['password_hash'])) {
            Activity::log('password_change_failed', 'auth', (string) $user['id'], 'Wrong current password');
            Flash::error('The current password is not correct.');
        } elseif ($problem = Auth::passwordProblem($new, $again)) {
            Flash::error($problem);
        } elseif (hash_equals($current, $new)) {
            Flash::error('The new password must differ from the current one.');
        } else {
            Db::update('users', ['password_hash' => Auth::hash($new), 'updated_at' => date('Y-m-d H:i:s')],
                'id = :id', [':id' => (int) $user['id']]);
            Db::exec('UPDATE password_resets SET used_at = NOW() WHERE user_id = ?', [(int) $user['id']]);
            Activity::log('password_changed', 'auth', (string) $user['id'], 'Changed their own password');
            session_regenerate_id(true);
            Flash::success('Password changed. Other sessions of this account stay signed in until they expire.');
        }
        redirect_to(admin_url('account'));
    }

    redirect_to(admin_url('account'));
}

$sessions = Db::all('SELECT * FROM activity_log WHERE user_id = ? AND action IN (\'login\',\'logout\') ORDER BY id DESC LIMIT 8', [(int) $user['id']]);
$myPosts = Db::all('SELECT id, title, status, updated_at FROM posts WHERE author_id = ? ORDER BY updated_at DESC LIMIT 5', [(int) $user['id']]);

$pageTitle = 'Your account';
$title = $pageTitle;
$wide = true;
render('account', compact('user', 'sessions', 'myPosts', 'pageTitle', 'title', 'wide'));
