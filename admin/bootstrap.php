<?php

/**
 * Admin panel bootstrap.
 *
 * Loads the site configuration (same constants, same lib classes), starts a
 * hardened session, and exposes the small set of helpers every controller uses.
 * Nothing here echoes output; controllers decide what to render.
 *
 * On a Hostinger shared host the panel runs from /admin as a plain PHP app: no
 * build step, no framework, no Node, no composer.
 */

declare(strict_types=1);

/** Marks a request that came through the panel's own front controller. */
if (!defined('ONIM_PANEL')) {
    define('ONIM_PANEL', true);
}

require_once dirname(__DIR__) . '/config.php';

use Onim\Admin\Auth;
use Onim\Admin\Flash;
use Onim\Cms;
use Onim\Db;

const ADMIN_VERSION = '1.0.0';

if (!defined('ADMIN_ROOT')) {
    define('ADMIN_ROOT', __DIR__);
}
if (!defined('ADMIN_UPLOADS')) {
    define('ADMIN_UPLOADS', dirname(__DIR__) . '/uploads');
}

/*
 * The panel lives at /admin, so PHP sees SCRIPT_NAME=/admin/index.php and
 * config.php computes BASE_PATH=/admin. Front-end URLs (assets, links, the
 * "view site" target) must stay relative to the real site root, so the /admin
 * suffix is stripped here, once.
 */
if (BASE_PATH !== '' && (BASE_PATH === '/admin' || str_ends_with(BASE_PATH, '/admin'))) {
    $GLOBALS['ONIM_BASE_PATH'] = substr(BASE_PATH, 0, -strlen('/admin'));
} elseif (BASE_PATH === '') {
    $GLOBALS['ONIM_BASE_PATH'] = '';
}

spl_autoload_register(static function (string $class): void {
    $prefix = 'Onim\\Admin\\';
    if (!str_starts_with($class, $prefix)) {
        return;
    }
    $file = ADMIN_ROOT . '/lib/' . str_replace('\\', '/', substr($class, strlen($prefix))) . '.php';
    if (is_file($file)) {
        require_once $file;
    }
});

/* ------------------------------------------------------------------ session */

/** Absolute URL of the panel, honouring a subdirectory install. */
function admin_base(): string
{
    static $base = null;
    if ($base !== null) {
        return $base;
    }
    $script = str_replace('\\', '/', (string) ($_SERVER['SCRIPT_NAME'] ?? '/admin/index.php'));
    $dir    = rtrim(dirname($script), '/');
    return $base = ($dir === '' || $dir === '.') ? '/admin' : $dir;
}

function admin_url(string $page = 'dashboard', array $params = []): string
{
    $query = array_merge(['p' => $page], $params);
    return admin_base() . '/index.php?' . http_build_query($query);
}

function admin_asset(string $path): string
{
    return admin_base() . '/assets/' . ltrim($path, '/') . '?v=' . ADMIN_VERSION;
}

/**
 * Public URL for a stored upload (media library, logos): relative to the site
 * root, so it survives the site moving between hostnames.
 *
 * The site root is the install directory, not the domain root — under
 * mcqsgenerator.com/tool an upload really lives at /tool/uploads/..., and a
 * bare /uploads/... would 404 on the domain root.
 */
function upload_url(string $relative): string
{
    $rel  = (string) preg_replace('~^/+~', '', $relative);
    $base = (string) ($GLOBALS['ONIM_BASE_PATH'] ?? '');
    return $base . '/' . $rel;
}

/**
 * Link to a front-end path from inside the panel ("view on the site", the
 * preview buttons, robots.txt / sitemap.xml shortcuts).
 *
 * Same reasoning as upload_url(): always prefix the install directory so the
 * link stays inside /tool instead of jumping to the domain root.
 */
function site_link(string $path = '/'): string
{
    $base = (string) ($GLOBALS['ONIM_BASE_PATH'] ?? '');
    $path = '/' . ltrim($path, '/');
    return $path === '/' ? ($base === '' ? '/' : $base . '/') : $base . rtrim($path, '/');
}

function is_https(): bool
{
    return (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
        || (($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '') === 'https')
        || (($_SERVER['SERVER_PORT'] ?? '') === '443');
}

/** Start the admin session exactly once, with hardened cookies. */
function admin_session_start(): void
{
    if (session_status() === PHP_SESSION_ACTIVE) {
        return;
    }
    // Command-line callers (cron.php, maintenance tools) have no cookies and no
    // headers; starting a session there only produces warnings.
    if (PHP_SAPI === 'cli') {
        $_SESSION = $_SESSION ?? [];
        return;
    }
    $dir = admin_base();
    session_name('onim_sid');
    session_set_cookie_params([
        'lifetime' => 0,
        'path'     => $dir === '' ? '/' : $dir,
        'domain'   => '',
        'secure'   => is_https(),
        'httponly' => true,
        'samesite' => 'Lax',
    ]);
    ini_set('session.use_strict_mode', '1');
    ini_set('session.use_only_cookies', '1');
    ini_set('session.gc_maxlifetime', '28800');
    session_start();

    // Idle timeout (2 h) and absolute timeout (12 h) — shared hosting keeps
    // session files for a long time, and an abandoned panel tab must not stay
    // logged in forever.
    $now = time();
    $idle = (int) ($_SESSION['_last_seen'] ?? $now);
    $born = (int) ($_SESSION['_born'] ?? $now);
    if (!isset($_SESSION['uid'])) {
        $_SESSION['_born'] = $_SESSION['_born'] ?? $now;
    } elseif ($now - $idle > 7200 || $now - $born > 43200) {
        Auth::logout();
    }
    $_SESSION['_last_seen'] = $now;

    // Rotate the session id periodically to limit fixation windows.
    if (!isset($_SESSION['_rotated']) || $now - (int) $_SESSION['_rotated'] > 900) {
        if (isset($_SESSION['uid'])) {
            session_regenerate_id(true);
        }
        $_SESSION['_rotated'] = $now;
    }
}

admin_session_start();

require_once ADMIN_ROOT . '/views/partials/icons.php';

/* ----------------------------------------------------------------- helpers */

function e(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function request(string $key, ?string $default = null): ?string
{
    $v = $_GET[$key] ?? $_POST[$key] ?? null;
    return is_string($v) ? trim($v) : $default;
}

function post(string $key, ?string $default = null): ?string
{
    $v = $_POST[$key] ?? null;
    return is_string($v) ? trim($v) : $default;
}

function post_int(string $key, int $default = 0): int
{
    $v = $_POST[$key] ?? null;
    return is_numeric($v) ? (int) $v : $default;
}

function request_int(string $key, int $default = 0): int
{
    $v = $_GET[$key] ?? null;
    return is_numeric($v) ? (int) $v : $default;
}

function post_bool(string $key): bool
{
    $v = $_POST[$key] ?? null;
    return is_string($v) && in_array($v, ['1', 'on', 'true', 'yes'], true);
}

function request_bool(string $key): bool
{
    $v = $_GET[$key] ?? null;
    return is_string($v) && in_array($v, ['1', 'on', 'true', 'yes'], true);
}

/** @return array<int,string> */
function post_array(string $key): array
{
    $v = $_POST[$key] ?? null;
    if (!is_array($v)) {
        return [];
    }
    $out = [];
    foreach ($v as $item) {
        if (is_scalar($item)) {
            $out[] = trim((string) $item);
        }
    }
    return $out;
}

function redirect_to(string $url, int $code = 303): never
{
    header('Location: ' . $url, true, $code);
    exit;
}

function back_to(string $fallback = 'dashboard', array $params = []): never
{
    $ref = (string) ($_SERVER['HTTP_REFERER'] ?? '');
    $host = (string) ($_SERVER['HTTP_HOST'] ?? '');
    if ($ref !== '' && $host !== '' && str_contains($ref, $host)) {
        redirect_to($ref);
    }
    redirect_to(admin_url($fallback, $params));
}

function client_ip(): string
{
    foreach (['HTTP_CF_CONNECTING_IP', 'HTTP_X_FORWARDED_FOR', 'REMOTE_ADDR'] as $key) {
        $raw = (string) ($_SERVER[$key] ?? '');
        if ($raw === '') {
            continue;
        }
        $ip = trim(explode(',', $raw)[0]);
        if (filter_var($ip, FILTER_VALIDATE_IP) !== false) {
            return $ip;
        }
    }
    return '';
}

function str_limit(string $text, int $limit): string
{
    $text = trim(preg_replace('~\s+~', ' ', strip_tags($text)) ?? '');
    if (mb_strlen($text) <= $limit) {
        return $text;
    }
    return rtrim(mb_substr($text, 0, $limit - 1)) . '…';
}

/**
 * Sanitise editor HTML.
 *
 * The panel lets editors write real HTML (headings, lists, links, tables,
 * emphasis) because the calculator articles are built from it. Everything else
 * is stripped: scripts, event handlers, iframes, forms, style attributes and
 * javascript:/data: URLs. This is the only place HTML from the panel is trusted,
 * so the whitelist is enforced here and nowhere else.
 */
function clean_html(string $html): string
{
    $html = str_replace(["\r\n", "\r"], "\n", $html);
    if (trim($html) === '') {
        return '';
    }
    if (class_exists('DOMDocument')) {
        $doc = new DOMDocument('1.0', 'UTF-8');
        $previous = libxml_use_internal_errors(true);
        $doc->loadHTML('<?xml encoding="UTF-8"><div id="omni-root">' . $html . '</div>', LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();
        libxml_use_internal_errors($previous);

        $allowed = ['p', 'br', 'strong', 'b', 'em', 'i', 'u', 's', 'h2', 'h3', 'h4', 'ul', 'ol', 'li',
                    'blockquote', 'a', 'code', 'pre', 'table', 'thead', 'tbody', 'tr', 'th', 'td',
                    'hr', 'figure', 'figcaption', 'img', 'sup', 'sub', 'span', 'div'];
        $root = $doc->getElementById('omni-root');
        if ($root !== null) {
            clean_html_walk($root, $allowed);
            $out = '';
            foreach ($root->childNodes as $child) {
                $out .= $doc->saveHTML($child);
            }
            return trim($out);
        }
    }
    // Fallback: no DOM extension — fall back to aggressive tag stripping.
    return trim(strip_tags($html, '<p><br><strong><b><em><i><u><s><h2><h3><h4><ul><ol><li><blockquote><a><code><pre><table><thead><tbody><tr><th><td><hr><figure><figcaption><img><sup><sub><span><div>'));
}

/** @param array<int,string> $allowed */
function clean_html_walk(DOMNode $node, array $allowed): void
{
    $children = [];
    foreach ($node->childNodes as $child) {
        $children[] = $child;
    }
    foreach ($children as $child) {
        if ($child instanceof DOMText) {
            continue;
        }
        if (!$child instanceof DOMElement) {
            $node->removeChild($child);
            continue;
        }
        $tag = strtolower($child->tagName);
        if (!in_array($tag, $allowed, true)) {
            // keep the text of unknown inline wrappers, drop their markup
            if (in_array($tag, ['script', 'style', 'iframe', 'object', 'embed', 'form', 'input', 'button', 'svg', 'math'], true)) {
                $node->removeChild($child);
                continue;
            }
            $fragment = $child->ownerDocument->createDocumentFragment();
            while ($child->firstChild !== null) {
                $fragment->appendChild($child->firstChild);
            }
            $node->replaceChild($fragment, $child);
            continue;
        }
        // strip every attribute except a safe few
        $attrs = [];
        foreach ($child->attributes as $attr) {
            $attrs[$attr->name] = $attr->value;
        }
        foreach (array_keys($attrs) as $name) {
            $child->removeAttribute($name);
        }
        if ($tag === 'a') {
            $href = trim((string) ($attrs['href'] ?? ''));
            $safe = $href !== '' && !preg_match('~^\s*(javascript|data|vbscript):~i', $href);
            if ($safe) {
                $child->setAttribute('href', $href);
                if (!empty($attrs['target']) && $attrs['target'] === '_blank') {
                    $child->setAttribute('target', '_blank');
                    $child->setAttribute('rel', 'noopener noreferrer');
                }
            }
        }
        if ($tag === 'img') {
            $src = trim((string) ($attrs['src'] ?? ''));
            if ($src === '' || preg_match('~^\s*(javascript|vbscript):~i', $src)) {
                $node->removeChild($child);
                continue;
            }
            $child->setAttribute('src', $src);
            $child->setAttribute('alt', (string) ($attrs['alt'] ?? ''));
            $child->setAttribute('loading', 'lazy');
            $child->setAttribute('decoding', 'async');
            foreach (['width', 'height'] as $dim) {
                if (!empty($attrs[$dim]) && ctype_digit((string) $attrs[$dim])) {
                    $child->setAttribute($dim, (string) $attrs[$dim]);
                }
            }
        }
        clean_html_walk($child, $allowed);
    }
}

/** Read a possibly-nested $_POST value as a flat array of strings. */
function post_deep(string $key): array
{
    $raw = $_POST[$key] ?? [];
    if (!is_array($raw)) {
        return [];
    }
    $out = [];
    foreach ($raw as $k => $v) {
        if (is_array($v)) {
            $out[$k] = post_deep_array($v);
        } else {
            $out[$k] = trim((string) $v);
        }
    }
    return $out;
}

function post_deep_array(array $raw): array
{
    $out = [];
    foreach ($raw as $k => $v) {
        $out[$k] = is_array($v) ? post_deep_array($v) : trim((string) $v);
    }
    return $out;
}

/* ------------------------------------------------------------- view layer */

/**
 * Render a view inside the panel layout.
 *
 * @param array<string,mixed> $data
 */
function render(string $view, array $data = []): void
{
    $data['currentUser'] = Auth::user();
    $data['flashes'] = Flash::pull();
    $data['page'] = $data['page'] ?? ($_GET['p'] ?? 'dashboard');
    extract($data, EXTR_SKIP);

    ob_start();
    require ADMIN_ROOT . '/views/' . $view . '.php';
    $content = (string) ob_get_clean();

    require ADMIN_ROOT . '/views/layout.php';
}

/** Render without the panel chrome (login, installer). */
function render_plain(string $view, array $data = []): void
{
    extract($data, EXTR_SKIP);
    require ADMIN_ROOT . '/views/' . $view . '.php';
}

function is_installed(): bool
{
    return Db::available() && Db::hasTable('users') && Db::hasTable('schema_migrations');
}

function installed_at_all(): bool
{
    return Db::available();
}
