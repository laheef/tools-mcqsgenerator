<?php
/**
 * Router for PHP's built-in server:
 *   php -S 0.0.0.0:8000 router.php
 * Serves real files from disk (assets, data) and sends everything else to the
 * front controller so pretty URLs like /math/percentage work without rewrite
 * rules.
 */

declare(strict_types=1);

$path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$file = __DIR__ . $path;

/*
 * Admin internals are never served directly — the same folders .htaccess blocks
 * on Apache. The PHP files inside also refuse a direct hit on their own.
 */
if (preg_match('~^/(plugins|data|tests|tools|docs|install)/~', $path)) {
    http_response_code(404);
    header('Content-Type: text/plain; charset=utf-8');
    echo "404 Not found\n";
    return true;
}

if (preg_match('~^/admin/(lib|views|controllers|migrations)/~', $path)) {
    http_response_code(403);
    header('Content-Type: text/plain; charset=utf-8');
    echo "403 Forbidden — this file is only used by the panel.\n";
    return true;
}

if ($path !== '/' && is_file($file) && !str_ends_with($file, '.php')) {
    return false; // let the built-in server stream it
}

/*
 * The admin panel is a separate application with its own front controller, the
 * same way a real Apache/LiteSpeed host serves /admin/ from its own directory.
 * Only its public files (css, js, uploads) are streamed; every .php file goes
 * through admin/index.php so the auth guard always runs.
 */
if ($path === '/admin' || str_starts_with($path, '/admin/')) {
    if (str_starts_with($path, '/admin/assets/') && is_file($file)) {
        return false;
    }
    $_SERVER['SCRIPT_NAME'] = '/admin/index.php';
    $_SERVER['PHP_SELF']    = '/admin/index.php';
    require __DIR__ . '/admin/index.php';
    return true;
}

// Real files at the site root that are entry points of their own.
if ($path !== '/' && is_file($file) && in_array($path, ['/cron.php'], true)) {
    return false;
}

// Uploaded media (logos, post images) is served from disk, never executed.
if (str_starts_with($path, '/uploads/') && is_file($file) && !str_ends_with($file, '.php')) {
    return false;
}

require __DIR__ . '/index.php';
