<?php
/**
 * Auth — sessions, roles and the permission matrix.
 *
 * Roles are fixed and deliberately few:
 *   administrator  everything, including users, settings, files, backups
 *   editor         all content (calculators, pages, posts, media, menus, SEO, inbox)
 *   author         only their own posts plus media and their own account
 *
 * Every check happens on the server: the sidebar hides what a role cannot use,
 * but the router refuses the request anyway if the role is wrong.
 */

declare(strict_types=1);


namespace Onim\Admin;

// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('ONIM_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}

use Onim\Cms;
use Onim\Db;

final class Auth
{
    private const MAX_ATTEMPTS = 5;
    private const WINDOW_MIN   = 15;

    /** page key => roles allowed */
    public const MATRIX = [
        'dashboard'        => ['administrator', 'editor', 'author'],
        'account'          => ['administrator', 'editor', 'author'],
        'calculators'      => ['administrator', 'editor'],
        'calculator-edit'  => ['administrator', 'editor'],
        'custom-calculators'     => ['administrator', 'editor'],
        'custom-calculator-edit' => ['administrator', 'editor'],
        'custom-import'          => ['administrator', 'editor'],
        'tool-plugins'           => ['administrator'],
        'modules'                => ['administrator'],
        'categories'       => ['administrator', 'editor'],
        'files'            => ['administrator', 'editor'],
        'file-edit'        => ['administrator', 'editor'],
        'homepage'         => ['administrator', 'editor'],
        'ads'              => ['administrator', 'editor'],
        'navigation'       => ['administrator', 'editor'],
        'footer'           => ['administrator', 'editor'],
        'pages'            => ['administrator', 'editor'],
        'blog'             => ['administrator', 'editor', 'author'],
        'blog-categories'  => ['administrator', 'editor'],
        'tags'             => ['administrator', 'editor'],
        'blog-edit'        => ['administrator', 'editor', 'author'],
        'tags'             => ['administrator', 'editor'],
        'media'            => ['administrator', 'editor', 'author'],
        'inbox'            => ['administrator', 'editor'],
        'seo'              => ['administrator', 'editor'],
        'appearance'       => ['administrator'],
        'settings'         => ['administrator'],
        'forms'            => ['administrator', 'editor'],
        'users'            => ['administrator'],
        'backups'          => ['administrator'],
        'activity'         => ['administrator', 'editor'],
    ];

    public static function user(): ?array
    {
        static $user = false;
        if ($user !== false) {
            return $user;
        }
        $id = (int) ($_SESSION['uid'] ?? 0);
        if ($id <= 0 || !Db::available()) {
            return $user = null;
        }
        $row = Db::one('SELECT * FROM users WHERE id = ? AND status = \'active\' LIMIT 1', [$id]);
        if ($row === null) {
            return $user = null;
        }
        // Session hijack guard: the browser fingerprint is stored at login.
        $fp = (string) ($_SESSION['fp'] ?? '');
        if ($fp !== '' && !hash_equals($fp, self::fingerprint())) {
            self::logout();
            return $user = null;
        }
        return $user = $row;
    }

    public static function id(): int
    {
        return (int) (self::user()['id'] ?? 0);
    }

    public static function check(): bool
    {
        return self::user() !== null;
    }

    public static function role(): string
    {
        return (string) (self::user()['role'] ?? '');
    }

    public static function isAdmin(): bool
    {
        return self::role() === 'administrator';
    }

    /** May the current user open this panel page? */
    public static function can(string $page): bool
    {
        $roles = self::MATRIX[$page] ?? ['administrator'];
        $role  = self::role();
        return $role !== '' && in_array($role, $roles, true);
    }

    public static function fingerprint(): string
    {
        return hash('sha256', mb_substr((string) ($_SERVER['HTTP_USER_AGENT'] ?? ''), 0, 250) . '|omni-admin');
    }

    /**
     * Verify credentials and open a session.
     *
     * @return array{ok:bool,error:string,user?:array}
     */
    public static function attempt(string $email, string $password): array
    {
        if (!Db::available()) {
            return ['ok' => false, 'error' => 'The database is not configured yet.'];
        }
        $email = mb_strtolower(trim($email));
        if ($email === '' || $password === '') {
            return ['ok' => false, 'error' => 'Enter your email address and password.'];
        }

        $key = 'login:' . client_ip() . ':' . $email;
        if (RateLimit::blocked($key)) {
            $minutes = RateLimit::retryAfter($key);
            return ['ok' => false, 'error' => sprintf('Too many attempts. Try again in %d minute%s.', $minutes, $minutes === 1 ? '' : 's')];
        }

        $row = Db::one('SELECT * FROM users WHERE email = ? LIMIT 1', [$email]);
        if ($row === null || !password_verify($password, (string) $row['password_hash'])) {
            RateLimit::hit($key, self::MAX_ATTEMPTS, self::WINDOW_MIN, self::WINDOW_MIN);
            Activity::log('login_failed', 'auth', $email, 'Failed sign-in for ' . $email);
            return ['ok' => false, 'error' => 'That email and password combination is not in our records.'];
        }
        if (($row['status'] ?? 'active') !== 'active') {
            return ['ok' => false, 'error' => 'This account has been deactivated. Ask an administrator to re-enable it.'];
        }

        RateLimit::clear($key);
        self::establish($row);

        // Transparent hash upgrade when the server's cost factor moved on.
        if (password_needs_rehash((string) $row['password_hash'], PASSWORD_DEFAULT)) {
            Db::update('users', ['password_hash' => self::hash($password)], 'id = :id', [':id' => (int) $row['id']]);
        }

        Db::update('users', [
            'last_login_at' => date('Y-m-d H:i:s'),
            'last_login_ip' => mb_substr(client_ip(), 0, 45),
            'updated_at'    => date('Y-m-d H:i:s'),
        ], 'id = :id', [':id' => (int) $row['id']]);

        Activity::log('login', 'auth', (string) $row['id'], 'Signed in');
        return ['ok' => true, 'error' => '', 'user' => $row];
    }

    public static function establish(array $row): void
    {
        session_regenerate_id(true);
        $_SESSION['uid']  = (int) $row['id'];
        $_SESSION['role'] = (string) $row['role'];
        $_SESSION['fp']   = self::fingerprint();
        $_SESSION['_born'] = time();
        $_SESSION['_last_seen'] = time();
        $_SESSION['csrf'] = bin2hex(random_bytes(32));
    }

    public static function logout(): void
    {
        $_SESSION = [];
        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', [
                'expires'  => time() - 42000,
                'path'     => $params['path'],
                'domain'   => $params['domain'],
                'secure'   => (bool) $params['secure'],
                'httponly' => (bool) $params['httponly'],
                'samesite' => 'Lax',
            ]);
        }
        session_destroy();
    }

    public static function hash(string $password): string
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    /** Password policy: 10+ characters, not a known-bad pattern. */
    public static function passwordProblem(string $password, string $confirm = ''): ?string
    {
        if (mb_strlen($password) < 10) {
            return 'Use at least 10 characters.';
        }
        if (preg_match('~^(password|1234567890|qwertyuiop|letmein|admin12345)~i', $password) === 1) {
            return 'That password is too easy to guess.';
        }
        if ($confirm !== '' && !hash_equals($password, $confirm)) {
            return 'The two passwords do not match.';
        }
        return null;
    }

    /** Guard for a controller: bounce guests to the login screen. */
    public static function requireLogin(): void
    {
        if (self::check()) {
            return;
        }
        if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'GET') {
            http_response_code(401);
            render_plain('error', ['code' => 401, 'message' => 'Your session expired. Sign in again in a new tab.']);
            exit;
        }
        $target = (string) ($_SERVER['REQUEST_URI'] ?? admin_url());
        $_SESSION['intended'] = $target;
        Flash::add('info', 'Please sign in to continue.');
        redirect_to(admin_url('login'));
    }

    public static function requireRole(string $page): void
    {
        self::requireLogin();
        if (!self::can($page)) {
            http_response_code(403);
            render_plain('error', ['code' => 403, 'message' => 'Your role (' . self::role() . ') does not include this part of the panel.']);
            exit;
        }
    }
}
