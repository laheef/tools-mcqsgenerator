<?php
/**
 * Cms — the bridge between MySQL and the public site.
 *
 * Design rule: **the database is an override layer, never a replacement.**
 * The 3,831 calculator definitions stay in data/calc/*.ndjson and the generated
 * articles stay in data/content/**. MySQL holds only what an administrator
 * changed: settings, menus, pages, posts, media, inbox messages, and the
 * per-calculator overrides (slug, status, SEO, prose edits, FAQs, ordering).
 *
 * Consequences:
 *   * Nothing has to be imported to bring the site up — it renders from files.
 *   * If MySQL is unreachable, every method here returns its file/default
 *     fallback and public pages keep working (only the admin panel refuses).
 *   * A calculator edit never risks the formulas.
 */

declare(strict_types=1);

namespace Onim;

final class Cms
{
    private static ?array $settings = null;
    private static ?array $overrides = null;
    private static ?array $overridesByRoute = null;
    private static array $cache = [];

    /* --------------------------------------------------------------- core */

    public static function enabled(): bool
    {
        return Db::available() && Db::hasTable('settings');
    }

    public static function flush(): void
    {
        self::$settings = null;
        self::$overrides = null;
        self::$overridesByRoute = null;
        self::$cache = [];
    }

    /* ----------------------------------------------------------- settings */

    /** @return array<string,string> */
    public static function settings(): array
    {
        if (self::$settings !== null) {
            return self::$settings;
        }
        $rows = self::enabled() ? Db::all('SELECT skey, svalue FROM settings') : [];
        $out = [];
        foreach ($rows as $r) {
            $out[(string) $r['skey']] = (string) ($r['svalue'] ?? '');
        }
        return self::$settings = $out;
    }

    public static function setting(string $key, ?string $default = null): ?string
    {
        $s = self::settings();
        if (array_key_exists($key, $s) && $s[$key] !== '') {
            return $s[$key];
        }
        return $default;
    }

    public static function settingBool(string $key, bool $default = false): bool
    {
        $v = self::setting($key);
        return $v === null ? $default : in_array($v, ['1', 'true', 'yes', 'on'], true);
    }

    public static function siteName(): string
    {
        return self::setting('site_name', SITE_NAME) ?? SITE_NAME;
    }

    public static function tagline(): string
    {
        return self::setting('site_tagline', SITE_TAGLINE) ?? SITE_TAGLINE;
    }

    public static function description(): string
    {
        return self::setting('site_description', SITE_DESCRIPTION) ?? SITE_DESCRIPTION;
    }

    public static function logoUrl(): string
    {
        $logo = self::setting('logo_path', '');
        return $logo !== null && $logo !== '' ? self::mediaUrl($logo) : View::asset('img/logo.svg');
    }

    public static function faviconUrl(): string
    {
        $icon = self::setting('favicon_path', '');
        return $icon !== null && $icon !== '' ? self::mediaUrl($icon) : View::asset('img/favicon.svg');
    }

    /**
     * Absolute-or-site-relative media URL.
     *
     * Settings store paths the way an editor typed them ("/uploads/media/x.png"
     * or a full https:// URL). Site-relative paths must carry the install
     * prefix, otherwise a logo on mcqsgenerator.com/tool would be requested
     * from mcqsgenerator.com/uploads/... and show up broken.
     */
    public static function mediaUrl(string $path): string
    {
        $path = trim($path);
        if ($path === '') {
            return '';
        }
        if (preg_match('~^([a-z][a-z0-9+.-]*:)?//~i', $path) === 1) {
            return $path;                       // absolute URL or protocol-relative
        }
        return View::url($path);
    }

    /* ----------------------------------------------- calculator overrides */

    /**
     * Every calculator override, keyed by catalogue path.
     *
     * @return array<string,array<string,mixed>>
     */
    public static function overrides(): array
    {
        if (self::$overrides !== null) {
            return self::$overrides;
        }
        $rows = self::enabled() && Db::hasTable('calculators')
            ? Db::all('SELECT * FROM calculators')
            : [];
        $out = [];
        foreach ($rows as $r) {
            $out[(string) $r['source_path']] = $r;
        }
        return self::$overrides = $out;
    }

    /** @return array<string,string> "cat/slug" (override route) => source path */
    public static function overrideRoutes(): array
    {
        if (self::$overridesByRoute !== null) {
            return self::$overridesByRoute;
        }
        $map = [];
        foreach (self::overrides() as $path => $o) {
            $cat  = trim((string) $o['category_slug']);
            $slug = trim((string) $o['slug']);
            if ($slug === '') {
                continue;
            }
            if ($cat === '') {
                $cat = ltrim(dirname($path), '/');
            }
            $map[$cat . '/' . $slug] = $path;
        }
        return self::$overridesByRoute = $map;
    }

    public static function overrideFor(string $sourcePath): ?array
    {
        return self::overrides()[$sourcePath] ?? null;
    }

    public static function calcIsPublished(?array $override): bool
    {
        if ($override === null) {
            return true;
        }
        return ($override['status'] ?? 'published') === 'published';
    }

    /** Decode one of the JSON columns of an override row. */
    public static function decode(?string $json, array $fallback = []): array
    {
        if ($json === null || trim($json) === '') {
            return $fallback;
        }
        $data = json_decode($json, true);
        return is_array($data) ? $data : $fallback;
    }

    /* ------------------------------------------------------------ preview */

    /**
     * A signed link that lets an editor look at an unpublished record.
     *
     * The public site has no session, so a preview cannot rely on being logged
     * in. Instead the panel hands out a URL carrying an HMAC of the record path,
     * keyed with the installation's app key: unguessable, checkable with no
     * database write, and revoked by simply changing the key.
     */
    public static function previewToken(string $path): string
    {
        return substr(hash_hmac('sha256', 'preview|' . $path, self::appKey()), 0, 32);
    }

    public static function previewValid(string $path, ?string $token): bool
    {
        if ($token === null || $token === '' || !self::enabled()) {
            return false;
        }
        return hash_equals(self::previewToken($path), $token);
    }

    /** The URL an editor should open to preview a record. */
    public static function previewUrl(string $path): string
    {
        return $path . (str_contains($path, '?') ? '&' : '?') . 'preview=' . self::previewToken($path);
    }

    /* ------------------------------------------------------------ menus */

    /** @return array<int,array<string,mixed>> flat rows for a location */
    public static function menu(string $location): array
    {
        $key = 'menu:' . $location;
        if (isset(self::$cache[$key])) {
            return self::$cache[$key];
        }
        $rows = self::enabled() && Db::hasTable('menu_items')
            ? Db::all('SELECT * FROM menu_items WHERE location = ? AND enabled = 1 ORDER BY sort_order, id', [$location])
            : [];
        return self::$cache[$key] = $rows;
    }

    /** @return array<int,array<string,mixed>> rows with a `children` array */
    public static function menuTree(string $location): array
    {
        $rows = self::menu($location);
        $byId = [];
        foreach ($rows as $r) {
            $r['children'] = [];
            $byId[(int) $r['id']] = $r;
        }
        $tree = [];
        foreach ($byId as $id => $row) {
            $parent = (int) ($row['parent_id'] ?? 0);
            if ($parent !== 0 && isset($byId[$parent])) {
                $byId[$parent]['children'][] = &$byId[$id];
            } else {
                $tree[] = &$byId[$id];
            }
        }
        return $tree;
    }

    /** @return array<int,array<string,mixed>> footer columns with their links */
    public static function footerColumns(): array
    {
        if (!self::enabled() || !Db::hasTable('footer_columns')) {
            return [];
        }
        $cols = Db::all('SELECT * FROM footer_columns WHERE enabled = 1 ORDER BY sort_order, id');
        $links = Db::all("SELECT * FROM menu_items WHERE location = 'footer_column' AND enabled = 1 ORDER BY sort_order, id");
        $byCol = [];
        foreach ($links as $l) {
            $byCol[(int) $l['footer_column_id']][] = $l;
        }
        foreach ($cols as &$col) {
            $col['links'] = $byCol[(int) $col['id']] ?? [];
        }
        return $cols;
    }

    /* ------------------------------------------------- homepage sections */

    /** @return array<int,array<string,mixed>> enabled sections, in order */
    public static function homepageSections(): array
    {
        if (!self::enabled() || !Db::hasTable('homepage_sections')) {
            return [['skey' => 'hero', 'stype' => 'hero', 'title' => '', 'subtitle' => '', 'config' => '{}'],
                   ['skey' => 'categories', 'stype' => 'category_grid', 'title' => '', 'subtitle' => '', 'config' => '{}'],
                   ['skey' => 'directory', 'stype' => 'calc_directory', 'title' => 'All calculators, by category', 'subtitle' => '', 'config' => '{"per_category":6}'],
                   ['skey' => 'popular', 'stype' => 'popular', 'title' => 'Most popular', 'subtitle' => '', 'config' => '{}'],
                   ['skey' => 'howitworks', 'stype' => 'howto', 'title' => 'What every calculator on this site actually does', 'subtitle' => '', 'config' => '{}']];
        }
        $rows = Db::all('SELECT * FROM homepage_sections WHERE enabled = 1 ORDER BY sort_order, id');
        foreach ($rows as &$r) {
            $r['config'] = self::decode((string) ($r['config'] ?? ''), []);
        }
        return $rows;
    }

    /* ------------------------------------------------------------ pages */

    /**
     * The pages the site ships with, as files.
     *
     * MySQL is an override layer in this build, so pages that the installer seeds
     * also exist in data/pages/*.json. That is what keeps about/privacy/terms/
     * contact/disclaimer/faq reachable on a fresh upload before the database is
     * configured, and it is the safety net if the connection ever drops.
     *
     * @return array<int,array<string,mixed>>
     */
    public static function filePageRows(): array
    {
        static $rows = null;
        if ($rows !== null) {
            return $rows;
        }
        $rows = [];
        $dir  = dirname(__DIR__) . '/data/pages';
        foreach (is_dir($dir) ? (glob($dir . '/*.json') ?: []) : [] as $file) {
            $raw = json_decode((string) file_get_contents($file), true);
            if (!is_array($raw) || ($raw['status'] ?? 'published') !== 'published') {
                continue;
            }
            $raw['slug']  = $raw['slug'] ?? basename($file, '.json');
            $raw['id']    = 0;
            $raw['fromFile'] = true;
            $rows[] = $raw;
        }
        usort($rows, static fn ($a, $b) => strcmp((string) $a['slug'], (string) $b['slug']));
        return $rows;
    }

    public static function page(string $slug): ?array
    {
        $slug = trim($slug, '/');
        if (self::enabled() && Db::hasTable('pages')) {
            $row = Db::one("SELECT * FROM pages WHERE slug = ? AND status = 'published' LIMIT 1", [$slug]);
            if ($row !== null) {
                return $row;
            }
        }
        foreach (self::filePageRows() as $row) {
            if ((string) $row['slug'] === $slug) {
                return $row;
            }
        }
        return null;
    }

    /** @return array<int,array<string,mixed>> */
    public static function pagesInNav(string $where): array
    {
        $col = $where === 'header' ? 'show_in_header' : 'show_in_footer';
        $rows = (self::enabled() && Db::hasTable('pages'))
            ? Db::all("SELECT * FROM pages WHERE {$col} = 1 AND status = 'published' ORDER BY title")
            : [];
        if ($rows === []) {
            foreach (self::filePageRows() as $row) {
                if (!empty($row[$col])) {
                    $rows[] = $row;
                }
            }
            usort($rows, static fn ($a, $b) => strcmp((string) $a['title'], (string) $b['title']));
        }
        return $rows;
    }

    /** Every page the panel can manage (database rows only; files are fallback). */
    public static function allPages(): array
    {
        if (!self::enabled() || !Db::hasTable('pages')) {
            return [];
        }
        return Db::all('SELECT * FROM pages ORDER BY title');
    }

    /* ------------------------------------------------------------- blog */

    /** @return array{pages:int,total:int} */
    public static function blogCount(): array
    {
        if (!self::enabled() || !Db::hasTable('posts')) {
            return ['pages' => 0, 'total' => 0];
        }
        $total = (int) Db::value("SELECT COUNT(*) FROM posts WHERE status = 'published' AND published_at <= NOW()", [], 0);
        return ['pages' => $total, 'total' => $total];
    }

    /** @return array<int,array<string,mixed>> */
    public static function posts(int $limit = 12, int $offset = 0, string $tag = ''): array
    {
        if (!self::enabled() || !Db::hasTable('posts')) {
            return [];
        }
        $sql = "SELECT p.*, u.name AS author_name FROM posts p
                LEFT JOIN users u ON u.id = p.author_id
                WHERE p.status = 'published' AND p.published_at <= NOW()";
        $params = [];
        if ($tag !== '') {
            $sql .= ' AND EXISTS (SELECT 1 FROM post_tags pt JOIN tags t ON t.id = pt.tag_id WHERE pt.post_id = p.id AND t.slug = ?)';
            $params[] = $tag;
        }
        $sql .= ' ORDER BY p.published_at DESC LIMIT ' . max(1, min(200, $limit)) . ' OFFSET ' . max(0, $offset);
        return Db::all($sql, $params);
    }

    public static function post(string $slug): ?array
    {
        if (!self::enabled() || !Db::hasTable('posts')) {
            return null;
        }
        return Db::one(
            "SELECT p.*, u.name AS author_name, u.bio AS author_bio, u.avatar AS author_avatar
             FROM posts p LEFT JOIN users u ON u.id = p.author_id
             WHERE p.slug = ? AND p.status = 'published' AND p.published_at <= NOW() LIMIT 1",
            [trim($slug, '/')]
        );
    }

    /**
     * A post in any status. Only reachable through a signed preview link
     * (Cms::previewValid), never from the public router directly.
     */
    public static function postAny(string $slug): ?array
    {
        if (!self::enabled() || !Db::hasTable('posts')) {
            return null;
        }
        return Db::one(
            "SELECT p.*, u.name AS author_name, u.bio AS author_bio, u.avatar AS author_avatar
             FROM posts p LEFT JOIN users u ON u.id = p.author_id
             WHERE p.slug = ? LIMIT 1",
            [trim($slug, '/')]
        );
    }

    /** @return array<int,array<string,mixed>> */
    public static function postTags(int $postId): array
    {
        return Db::all('SELECT t.* FROM tags t JOIN post_tags pt ON pt.tag_id = t.id WHERE pt.post_id = ? ORDER BY t.name', [$postId]);
    }

    /** @return array<int,array<string,mixed>> */
    public static function tags(): array
    {
        if (!self::enabled() || !Db::hasTable('tags')) {
            return [];
        }
        return Db::all('SELECT t.*, COUNT(pt.post_id) AS post_count FROM tags t
                        LEFT JOIN post_tags pt ON pt.tag_id = t.id
                        LEFT JOIN posts p ON p.id = pt.post_id AND p.status = \'published\'
                        GROUP BY t.id ORDER BY t.name');
    }

    /* ------------------------------------------------------- contact form */

    /** @return array<int,array<string,mixed>> enabled custom fields */
    public static function contactFields(): array
    {
        if (!self::enabled() || !Db::hasTable('contact_fields')) {
            return [];
        }
        $rows = Db::all('SELECT * FROM contact_fields WHERE enabled = 1 ORDER BY sort_order, id');
        foreach ($rows as &$r) {
            $r['options'] = self::decode((string) ($r['options'] ?? ''), []);
        }
        return $rows;
    }

    /* --------------------------------------------------------- redirects */

    /** Custom redirect (admin-managed), 301/302, counted. */
    /**
     * Legacy addresses the reference site used for the same page.
     *
     * These are site-level aliases (not calculator aliases, which live in
     * data/calc/redirects.json). They answer with a 301 so a visitor arriving on
     * an old bookmarked URL from a search result does not hit a 404. Anything an
     * administrator adds in SEO → Redirects takes precedence over this map.
     */
    private const LEGACY_ALIASES = [
        '/privacy-policy'    => '/privacy',
        '/privacy.php'       => '/privacy',
        '/terms-of-service'  => '/terms',
        '/terms-of-use'      => '/terms',
        '/terms-and-conditions' => '/terms',
        '/contact-us'        => '/contact',
        '/about-us'          => '/about',
        '/frequently-asked-questions' => '/faq',
    ];

    /** A built-in alias row, shaped like a `redirects` record. */
    public static function legacyRedirect(string $path): ?array
    {
        $to = self::LEGACY_ALIASES[rtrim($path, '/')] ?? null;
        if ($to === null) {
            return null;
        }
        return [
            'id'          => 0,
            'from_path'   => $path,
            'to_path'     => $to,
            'status_code' => 301,
            'enabled'     => 1,
            'builtin'     => 1,
        ];
    }

    public static function redirect(string $path): ?array
    {
        if (!self::enabled() || !Db::hasTable('redirects')) {
            return self::legacyRedirect($path);
        }
        $row = Db::one('SELECT * FROM redirects WHERE from_path = ? AND enabled = 1 LIMIT 1', [$path]);
        if ($row !== null) {
            Db::exec('UPDATE redirects SET hits = hits + 1 WHERE id = ?', [(int) $row['id']]);
            return $row;
        }
        return self::legacyRedirect($path);
    }

    /* ------------------------------------------------------ view counter */

    /**
     * Daily bucket counter. One row per path per day, incremented with
     * INSERT ... ON DUPLICATE KEY UPDATE, so a page view costs a single
     * statement and the table stays small (cron prunes it).
     */
    public static function trackView(string $path): void
    {
        static $done = false;
        if ($done || !self::enabled()) {
            return;
        }
        $done = true;
        if (self::settingBool('analytics_internal_tracking', true) === false) {
            return;
        }
        if (preg_match('~^/(admin|api|assets|uploads|favicon|robots|sitemap)~', $path)) {
            return;
        }
        Db::exec(
            'INSERT INTO page_views (path, day, hits) VALUES (?, CURDATE(), 1)
             ON DUPLICATE KEY UPDATE hits = hits + 1',
            [mb_substr($path, 0, 190)]
        );
    }

    /**
     * The most-visited calculator paths of the last N days, from the real
     * counter. Returns an empty array until visitors arrive, so callers fall
     * back to the catalogue instead of inventing a ranking.
     *
     * @return array<string,int> path => hits
     */
    public static function topPaths(int $limit = 12, int $days = 30): array
    {
        if (!self::enabled() || !Db::hasTable('page_views')) {
            return [];
        }
        $limit = max(1, min(50, $limit));
        $days = max(1, min(365, $days));
        $rows = Db::all(
            'SELECT path, SUM(hits) AS hits FROM page_views
             WHERE day >= DATE_SUB(CURDATE(), INTERVAL ' . $days . ' DAY)
             GROUP BY path ORDER BY SUM(hits) DESC LIMIT 200'
        );
        $out = [];
        foreach ($rows as $row) {
            $path = (string) $row['path'];
            if (substr_count(trim($path, '/'), '/') !== 1) {
                continue;
            }
            $out[$path] = (int) $row['hits'];
            if (count($out) >= $limit) {
                break;
            }
        }
        return $out;
    }

    /** Total page views in the last N days (dashboard card). */
    public static function viewsSince(int $days = 7): int
    {
        if (!self::enabled() || !Db::hasTable('page_views')) {
            return 0;
        }
        return (int) Db::value(
            'SELECT COALESCE(SUM(hits), 0) FROM page_views WHERE day >= DATE_SUB(CURDATE(), INTERVAL ' . max(1, $days) . ' DAY)',
            [],
            0
        );
    }

    /* ------------------------------------------------------------ secret */

    /** Encrypt a value that must be stored (SMTP password, API keys). */
    public static function encryptSecret(string $plain): string
    {
        $key = self::appKey();
        $iv  = random_bytes(12);
        $tag = '';
        $ct  = openssl_encrypt($plain, 'aes-256-gcm', $key, OPENSSL_RAW_DATA, $iv, $tag);
        if ($ct === false) {
            return '';
        }
        return 'v1:' . base64_encode($iv . $tag . $ct);
    }

    public static function decryptSecret(string $stored): string
    {
        if (!str_starts_with($stored, 'v1:')) {
            return '';
        }
        $raw = base64_decode(substr($stored, 3), true);
        if ($raw === false || strlen($raw) < 29) {
            return '';
        }
        $iv  = substr($raw, 0, 12);
        $tag = substr($raw, 12, 16);
        $ct  = substr($raw, 28);
        $out = openssl_decrypt($ct, 'aes-256-gcm', self::appKey(), OPENSSL_RAW_DATA, $iv, $tag);
        return $out === false ? '' : $out;
    }

    private static function appKey(): string
    {
        $cfg = onim_db_config();
        $key = (string) ($cfg['app_key'] ?? '');
        if ($key === '') {
            // Deterministic fallback so a missing key degrades to obfuscation
            // rather than a hard failure; the installer always writes one.
            $key = hash('sha256', __DIR__ . '|' . ($cfg['name'] ?? '') . '|omni', true);
        } else {
            $key = hash('sha256', $key, true);
        }
        return $key;
    }

    /**
     * A short fingerprint of everything the CMS can change.
     *
     * Cached artefacts (the sitemap, the search index) key off this so an edit in
     * the panel invalidates them immediately instead of waiting for a file mtime.
     */
    public static function stamp(): string
    {
        if (!self::enabled()) {
            return 'nocms';
        }
        /*
         * A fingerprint per table rather than count + newest timestamp.
         *
         * Those two miss real edits: archiving a row changes neither, and a
         * delete that leaves the newest row intact changes neither. Everything
         * derived and cached — the sitemap, the internal-link index, page
         * caches keyed on this stamp — depends on the *content*, so the stamp is
         * built from a checksum of the identity, status and timestamp of every
         * row, which moves for any insert, delete, rename or status change.
         *
         * The tables are small (a few hundred rows at most); the harvested
         * catalogue is in files, not here.
         */
        $parts = [];
        foreach (['calculators', 'custom_calculators', 'pages', 'posts', 'homepage_sections', 'menu_items', 'settings', 'categories'] as $table) {
            if (!Db::hasTable($table)) {
                continue;
            }
            $cols = [];
            foreach (['id', 'slug', 'status', 'updated_at'] as $col) {
                if (Db::hasColumn($table, $col)) {
                    $cols[] = $col;
                }
            }
            if ($cols === []) {
                continue;
            }
            $sum   = "COALESCE(SUM(CRC32(CONCAT_WS('#', " . implode(', ', $cols) . "))), 0)";
            $row   = Db::one('SELECT COUNT(*) AS c, ' . $sum . ' AS h FROM ' . Db::ident($table));
            $part  = $table . ':' . (int) ($row['c'] ?? 0) . ':' . (string) ($row['h'] ?? '0');
            if (Db::hasColumn($table, 'status')) {
                $pub  = Db::one('SELECT COUNT(*) AS c FROM ' . Db::ident($table) . " WHERE status = 'published'");
                $part .= ':' . (int) ($pub['c'] ?? 0);
            }
            $parts[] = $part;
        }
        return substr(md5(implode('|', $parts)), 0, 12);
    }

    /* --------------------------------------------------------- utilities */

    /** Slugify a title the same way everywhere in the panel. */
    public static function slugify(string $text): string
    {
        $text = trim($text);
        if ($text === '') {
            return '';
        }
        if (function_exists('iconv')) {
            $conv = @iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $text);
            if (is_string($conv) && $conv !== '') {
                $text = $conv;
            }
        }
        $text = mb_strtolower($text);
        $text = preg_replace('~[^a-z0-9]+~', '-', $text) ?? '';
        return trim($text, '-');
    }
}
