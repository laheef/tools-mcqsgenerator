<?php
/**
 * Admin panel front controller.
 *
 * Routing is a query parameter (`index.php?p=calculators&action=edit&id=12`)
 * rather than pretty URLs: it works on every shared host, needs no mod_rewrite,
 * and cannot be broken by a host that rewrites /admin/* oddly. An optional
 * .htaccess maps /admin/calculators to the same place for humans who type URLs.
 *
 * Security headers are set here, before anything renders.
 */

declare(strict_types=1);

header('X-Frame-Options: DENY');
header('X-Content-Type-Options: nosniff');
header('Referrer-Policy: strict-origin-when-cross-origin');
header('X-Robots-Tag: noindex, nofollow');
header('Permissions-Policy: geolocation=(), microphone=(), camera=()');
header("Content-Security-Policy: default-src 'self'; base-uri 'none'; frame-ancestors 'none'; img-src 'self' data: blob:; style-src 'self' 'unsafe-inline'; script-src 'self' 'unsafe-inline'; form-action 'self'; object-src 'none'");
header('Cache-Control: no-store, max-age=0');

require_once __DIR__ . '/bootstrap.php';

use Onim\Admin\Activity;
use Onim\Admin\Auth;
use Onim\Admin\Csrf;
use Onim\Admin\Flash;
use Onim\Admin\RateLimit;
use Onim\Admin\Reset;
use Onim\Cms;
use Onim\Db;

$page = (string) ($_GET['p'] ?? 'dashboard');
$page = preg_replace('~[^a-z0-9-]~', '', strtolower($page)) ?: 'dashboard';

/* --------------------------------------------------------- not installed */

if (!is_installed()) {
    if (Db::available() === false && onim_db_configured() && Db::error() !== null) {
        // credentials exist but the server refused them
        http_response_code(500);
        render_plain('error', ['code' => 500, 'message' => 'The database is unreachable: ' . (Db::error() ?? '')]);
        exit;
    }
    if ($page !== 'install') {
        redirect_to(admin_base() . '/install.php');
    }
    require __DIR__ . '/install.php';
    exit;
}

/* ------------------------------------------------------------ public pages */

if ($page === 'login') {
    if (Auth::check()) {
        redirect_to(admin_url('dashboard'));
    }
    $error = '';
    $email = '';
    if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
        Csrf::assert();
        $email = (string) ($_POST['email'] ?? '');
        $result = Auth::attempt($email, (string) ($_POST['password'] ?? ''));
        if ($result['ok']) {
            $target = (string) ($_SESSION['intended'] ?? '');
            unset($_SESSION['intended']);
            if ($target === '' || !str_contains($target, '/admin')) {
                $target = admin_url('dashboard');
            }
            Flash::success('Signed in as ' . $result['user']['name'] . '.');
            redirect_to($target);
        }
        $error = $result['error'];
    }
    render_plain('login', ['mode' => 'login', 'error' => $error, 'email' => $email]);
    exit;
}

if ($page === 'forgot') {
    $error = '';
    $notice = '';
    if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
        Csrf::assert();
        $email = (string) ($_POST['email'] ?? '');
        if (RateLimit::blocked('forgot:' . client_ip())) {
            $error = 'Too many reset requests from this address. Try again later.';
        } elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $error = 'Enter a valid email address.';
        } else {
            RateLimit::hit('forgot:' . client_ip(), 4, 30, 30);
            $sent = Reset::request($email);
            // The same message either way: never reveal whether the account exists.
            $notice = 'If that address belongs to an account, a reset link is on its way. The link expires in one hour.';
            if ($sent !== null && Cms::settingBool('mail_debug_links')) {
                $notice .= ' Development link: ' . $sent;
            }
        }
    }
    render_plain('login', ['mode' => 'forgot', 'error' => $error, 'notice' => $notice]);
    exit;
}

if ($page === 'reset') {
    $error = '';
    $notice = '';
    $token = (string) ($_GET['token'] ?? $_POST['token'] ?? '');
    $resetUser = Reset::validate($token);
    if ($resetUser === null) {
        $error = 'That reset link is invalid or has expired. Request a new one.';
        $token = '';
    }
    if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST' && $resetUser !== null) {
        Csrf::assert();
        $pass = (string) ($_POST['password'] ?? '');
        $pass2 = (string) ($_POST['password2'] ?? '');
        $problem = Auth::passwordProblem($pass, $pass2);
        if ($problem !== null) {
            $error = $problem;
        } else {
            Reset::consume($token, $pass, (int) $resetUser['id']);
            Flash::success('Password updated. Sign in with the new one.');
            redirect_to(admin_url('login'));
        }
    }
    render_plain('login', ['mode' => 'reset', 'error' => $error, 'token' => $token, 'resetUser' => $resetUser]);
    exit;
}

if ($page === 'logout') {
    Csrf::requirePost();
    Csrf::assert();
    Activity::log('logout', 'auth', (string) Auth::id(), 'Signed out');
    Auth::logout();
    Flash::info('You are signed out.');
    redirect_to(admin_url('login'));
}

/* ------------------------------------------------------------ private pages */

Auth::requireLogin();

$controllers = [
    'dashboard'       => 'dashboard.php',
    'account'         => 'account.php',
    'calculators'     => 'calculators.php',
    'calculator-edit' => 'calculator-edit.php',
    'custom-calculators' => 'custom-calculators.php',
    'custom-calculator-edit' => 'custom-calculator-edit.php',
    'custom-import'          => 'custom-import.php',
    'tool-plugins'           => 'tool-plugins.php',
    'tool-groups'            => 'tool-groups.php',
    'tool-new'               => 'tool-new.php',
    'tool-preview'           => 'tool-preview.php',
    'libraries'              => 'libraries.php',
    'calculator-builder'     => 'custom-calculators.php',
    'modules'                => 'modules.php',
    'categories'      => 'categories.php',
    'files'           => 'files.php',
    'file-edit'       => 'files.php',
    'homepage'        => 'homepage.php',
    'navigation'      => 'navigation.php',
    'footer'          => 'navigation.php',
    'pages'           => 'pages.php',
    'blog'            => 'blog.php',
    'blog-edit'       => 'blog.php',
    'tags'            => 'blog.php',
    'blog-categories' => 'blog-categories.php',
    'media'           => 'media.php',
    'inbox'           => 'inbox.php',
    'seo'             => 'seo.php',
    'appearance'      => 'appearance.php',
    'settings'        => 'settings.php',
    'ads'             => 'ads.php',
    'forms'           => 'forms.php',
    'users'           => 'users.php',
    'backups'         => 'backups.php',
    'activity'        => 'activity.php',
];

if (!isset($controllers[$page])) {
    http_response_code(404);
    render_plain('error', ['code' => 404, 'message' => 'There is no panel page called “' . $page . '”.']);
    exit;
}

/*
 * A few pages are editors for a list page and share its permission, so an
 * author who may open the blog also may edit a post.
 */
$roleFor = [
    'file-edit'              => 'file-edit',
    'blog-edit'              => 'blog-edit',
    'calculator-edit'        => 'calculator-edit',
    'custom-calculator-edit' => 'custom-calculators',
    'custom-import'          => 'custom-calculators',
    'tool-plugins'           => 'custom-calculators',
    'tool-groups'            => 'tool-groups',
    'tool-new'               => 'custom-calculators',
    'tool-preview'           => 'custom-calculators',
    'libraries'              => 'custom-calculators',
];
Auth::requireRole($roleFor[$page] ?? $page);

$file = __DIR__ . '/controllers/' . $controllers[$page];
if (!is_file($file)) {
    http_response_code(500);
    render_plain('error', ['code' => 500, 'message' => 'The controller for “' . $page . '” is missing.']);
    exit;
}

require $file;
