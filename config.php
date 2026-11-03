<?php
/**
 * Site configuration.
 *
 * SITE_URL is auto-detected so the clone works from any host/port (php -S,
 * Apache, a subdirectory) without touching code. Set ONIM_SITE_URL in the
 * environment to pin it — important for canonical URLs in production and for
 * the sitemap.
 */

declare(strict_types=1);

const SITE_NAME        = 'Onim';
const SITE_TAGLINE     = '4 041 free calculators, each one with its formula spelled out';
const SITE_DESCRIPTION = 'Onim is a free calculator library: 4 041 tools for maths, money, health, physics and the everyday problems in between. Every page shows the formula, the units and a worked example, and every answer is calculated in full — no rounded guesswork.';

/** Data extracted from the reference site (see tools/extract.py). */
define('DATA_PATH', __DIR__ . '/data');

/**
 * Optional per-install overrides, loaded from `config.local.php` when present.
 *
 * This file is the one thing a deployment is expected to create next to
 * config.php; it never travels in the release zip. Everything in it is
 * optional — the site detects its own base path when the key is absent.
 *
 *   return [
 *       'site_url'  => 'https://mcqsgenerator.com/tool',
 *       'base_path' => '/tool',
 *   ];
 *
 * Pinning both is the safe choice on shared hosting: canonical URLs, the
 * sitemap, robots.txt, every asset and every link then use exactly the prefix
 * the site is really served from, whatever SCRIPT_NAME the rewrite leaves behind.
 */
function onim_local_config(): array
{
    static $cfg = null;
    if ($cfg !== null) {
        return $cfg;
    }
    $file = __DIR__ . '/config.local.php';
    if (is_file($file)) {
        $loaded = @include $file;
        if (is_array($loaded)) {
            return $cfg = $loaded;
        }
    }
    return $cfg = [];
}

/**
 * Work out the URL prefix the site is served from ('' at a domain root,
 * '/tool' in a subdirectory).
 *
 * Two independent sources are cross-checked against REQUEST_URI, because
 * neither is reliable on its own: SCRIPT_NAME is what PHP thinks it ran, and
 * DOCUMENT_ROOT + SCRIPT_FILENAME is where the file really lives. A rewrite
 * that forgets to reset SCRIPT_NAME can make the first one point at
 * /tool/math instead of /tool — the prefix test rejects that and the second
 * source wins.
 */
function onim_detect_base_path(): string
{
    $request = (string) (parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/');
    $script  = str_replace('\\', '/', (string) ($_SERVER['SCRIPT_NAME'] ?? '/index.php'));

    $candidates = [];
    if (str_ends_with($script, '.php') || str_ends_with($script, '/')) {
        $dir = rtrim(str_replace('\\', '/', dirname($script)), '/');
        if ($dir !== '' && $dir !== '.' && $dir !== '/') {
            $candidates[] = $dir;
        }
    }

    $docroot = rtrim(str_replace('\\', '/', (string) ($_SERVER['DOCUMENT_ROOT'] ?? '')), '/');
    $file    = str_replace('\\', '/', (string) ($_SERVER['SCRIPT_FILENAME'] ?? ''));
    if ($docroot !== '' && $file !== '' && str_starts_with($file, $docroot . '/')) {
        $rel = substr($file, strlen($docroot));
        $dir = rtrim(str_replace('\\', '/', dirname($rel)), '/');
        if ($dir !== '' && $dir !== '.' && $dir !== '/') {
            $candidates[] = $dir;
        }
    }

    foreach ($candidates as $dir) {
        if ($request === $dir || str_starts_with($request, $dir . '/')) {
            return $dir;
        }
    }

    return '';
}

/**
 * Database (MySQL / MariaDB) — used by the admin panel and the CMS content
 * that overrides the harvested defaults.
 *
 * Credentials are never committed: they come from `config.db.php` (which you
 * create on the server and keep out of version control) or from environment
 * variables. When no credentials are configured the site falls back to the
 * original file-based data and the admin panel simply reports that it is not
 * installed yet.
 */
function onim_db_config(): array
{
    static $cfg = null;
    if ($cfg !== null) {
        return $cfg;
    }
    $file = __DIR__ . '/config.db.php';
    if (is_file($file)) {
        $loaded = require $file;
        if (is_array($loaded)) {
            return $cfg = $loaded + ['host' => 'localhost', 'port' => 3306, 'name' => '', 'user' => '', 'pass' => '', 'charset' => 'utf8mb4'];
        }
    }
    return $cfg = [
        'host'    => getenv('ONIM_DB_HOST') ?: 'localhost',
        'port'    => (int) (getenv('ONIM_DB_PORT') ?: 3306),
        'name'    => getenv('ONIM_DB_NAME') ?: '',
        'user'    => getenv('ONIM_DB_USER') ?: '',
        'pass'    => getenv('ONIM_DB_PASS') ?: '',
        'charset' => 'utf8mb4',
    ];
}

/** True when database credentials exist (the panel can run). */
function onim_db_configured(): bool
{
    $c = onim_db_config();
    return $c['name'] !== '' && $c['user'] !== '';
}

/** Bump to bust asset caches after editing css/js. */
const ASSET_VERSION = '1.2.36';

/** Unit/category reference data lives under data/calc/ (see tools/harvest_all.py). */
const RATES_CAPTURED = '2026-10-23';

/** Footer notice line. Off: a live site does not advertise how it was built. */
const SHOW_CLONE_NOTICE = false;

/** Absolute site URL, no trailing slash. */
function site_url(): string
{
    $local = onim_local_config();
    if (isset($local['site_url']) && is_string($local['site_url']) && $local['site_url'] !== '') {
        return rtrim($local['site_url'], '/');
    }
    $env = getenv('ONIM_SITE_URL');
    if (is_string($env) && $env !== '') {
        return rtrim($env, '/');
    }
    $https  = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
        || (($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '') === 'https')
        || (($_SERVER['SERVER_PORT'] ?? '') === '443');
    $scheme = $https ? 'https' : 'http';
    $host   = $_SERVER['HTTP_HOST'] ?? $_SERVER['SERVER_NAME'] ?? 'localhost';
    return $scheme . '://' . $host . onim_detect_base_path();
}

define('SITE_URL', site_url());

/** Base path ('' or '/subdir') used by the router and asset URLs. */
define('BASE_PATH', (static function (): string {
    $local = onim_local_config();
    if (isset($local['base_path']) && is_string($local['base_path'])) {
        return rtrim($local['base_path'], '/');
    }
    $env = getenv('ONIM_BASE_PATH');
    if (is_string($env)) {
        return rtrim($env, '/');
    }
    return onim_detect_base_path();
})());

/**
 * Error display, off by default.
 *
 * On a live site a PHP notice must never break the page, so display_errors
 * stays off; when something does break, set 'debug' => true in
 * config.local.php (or ONIM_DEBUG=1 in the environment) and the real message
 * appears instead of a blank page. Turn it off again afterwards.
 */
function onim_debug(): bool
{
    static $on = null;
    if ($on !== null) {
        return $on;
    }
    $local = onim_local_config();
    return $on = (bool) ($local['debug'] ?? (getenv('ONIM_DEBUG') === '1'));
}

if (onim_debug()) {
    @ini_set('display_errors', '1');
    @ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
}

/**
 * Site base path for URLs.
 *
 * Normally BASE_PATH, but the admin panel runs from /admin and computes
 * BASE_PATH from its own script name, which would make every front-end asset
 * URL point inside /admin. The panel therefore overrides it (see
 * admin/bootstrap.php) and the front end keeps the original constant.
 */
function site_base(): string
{
    $override = $GLOBALS['ONIM_BASE_PATH'] ?? null;
    return is_string($override) ? $override : BASE_PATH;
}

date_default_timezone_set('UTC');

/* mbstring is used for search/excerpts; provide minimal fallbacks so the site
   still runs on a bare PHP install (shared hosting sometimes omits it). */
if (!function_exists('mb_strtolower')) {
    function mb_strtolower(string $s, ?string $enc = null): string { return strtolower($s); }
    function mb_strtoupper(string $s, ?string $enc = null): string { return strtoupper($s); }
    function mb_substr(string $s, int $start, ?int $len = null, ?string $enc = null): string
    {
        return $len === null ? substr($s, $start) : substr($s, $start, $len);
    }
    function mb_strlen(string $s, ?string $enc = null): int { return strlen($s); }
    function mb_strrpos(string $h, string $n, int $o = 0, ?string $enc = null) { return strrpos($h, $n); }
}

require_once __DIR__ . '/lib/Expr.php';
require_once __DIR__ . '/lib/Units.php';
require_once __DIR__ . '/lib/Format.php';
require_once __DIR__ . '/lib/Conditions.php';
require_once __DIR__ . '/lib/Supplement.php';
require_once __DIR__ . '/lib/Solver.php';
require_once __DIR__ . '/lib/Data.php';
require_once __DIR__ . '/lib/Groups.php';
require_once __DIR__ . '/lib/Seo.php';
require_once __DIR__ . '/lib/Widget.php';
require_once __DIR__ . '/lib/Icons.php';
require_once __DIR__ . '/lib/Figures.php';
require_once __DIR__ . '/lib/Shape.php';
require_once __DIR__ . '/lib/Browse.php';
require_once __DIR__ . '/lib/View.php';
require_once __DIR__ . '/lib/Engagement.php';
require_once __DIR__ . '/lib/InternalLinks.php';
require_once __DIR__ . '/lib/Db.php';
require_once __DIR__ . '/lib/Cms.php';
require_once __DIR__ . '/lib/CustomCalc.php';
require_once __DIR__ . '/lib/Toolkit.php';
require_once __DIR__ . '/lib/ToolLibraries.php';
require_once __DIR__ . '/lib/CustomImport.php';
require_once __DIR__ . '/lib/Modules.php';
require_once __DIR__ . '/lib/Ads.php';
require_once __DIR__ . '/lib/CustomArticle.php';
require_once __DIR__ . '/lib/LiveCounts.php';
require_once __DIR__ . '/lib/Csrf.php';
require_once __DIR__ . '/lib/Contact.php';
require_once __DIR__ . '/lib/Mailer.php';
