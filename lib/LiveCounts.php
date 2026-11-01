<?php
/**
 * Live counters.
 *
 * Every number the site shows ("3 985 calculators", the count on a category
 * tile, the count in the admin dashboard) is derived from `Data::all()`, which
 * merges the harvested catalogue with the rows in MySQL. Deriving them per
 * request keeps them correct, but it does not make an *already open* page
 * correct: an editor who publishes a calculator in one tab still sees the old
 * number in another.
 *
 * This class does three things:
 *
 *   1. `snapshot()` — one array with the total, the per-category counts and the
 *      CMS stamp that produced them.
 *   2. `json()` — the `/api/counts` payload, never cached by a proxy or a
 *      browser (that is the whole point).
 *   3. `invalidate()` — called by every mutating admin action, so any cache that
 *      a deployment adds later (CDN, page cache, opcache of a rendered page)
 *      is dropped at the moment of the change rather than on the next TTL.
 *
 * The stamp is included so the browser can tell "the number changed" from "the
 * response arrived".
 */

declare(strict_types=1);

namespace Onim;

final class LiveCounts
{
    /** @var array<string,mixed>|null */
    private static ?array $snapshot = null;

    /** @return array{stamp:string,total:int,categories:array<string,int>,version:int} */
    public static function snapshot(): array
    {
        if (self::$snapshot !== null) {
            return self::$snapshot;
        }
        $categories = [];
        $total = 0;
        foreach (Data::all() as $row) {
            $cat = (string) ($row['cat'] ?? '');
            if ($cat === '') {
                continue;
            }
            $categories[$cat] = ($categories[$cat] ?? 0) + 1;
            $total++;
        }
        ksort($categories);

        return self::$snapshot = [
            'stamp' => Cms::stamp(),
            'total' => $total,
            'categories' => $categories,
            'version' => (int) (self::cacheVersion()),
        ];
    }

    public static function total(): int
    {
        return self::snapshot()['total'];
    }

    public static function forCategory(string $cat): int
    {
        return (int) (self::snapshot()['categories'][$cat] ?? 0);
    }

    /** JSON body for GET /api/counts. */
    public static function json(): string
    {
        $data = self::snapshot();
        // A CDN or a browser must not serve a stale count: this endpoint exists
        // precisely so a page can ask again after a change.
        header('Content-Type: application/json; charset=utf-8');
        header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
        header('Pragma: no-cache');
        header('X-Counters-Stamp: ' . $data['stamp']);
        return json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?: '{}';
    }

    /**
     * Drop everything derived from the catalogue.
     *
     * Called after a create/update/delete/status change in the panel. The
     * sitemap and the internal-link index already key themselves on
     * `Cms::stamp()`, so they are only pruned here for tidiness; the counters
     * are the reason this method exists.
     */
    public static function invalidate(): void
    {
        self::$snapshot = null;
        Data::flush();
        self::bumpCacheVersion();
    }

    /* ------------------------------------------------------- cache buster */

    private static function cacheVersionFile(): string
    {
        return __DIR__ . '/../data/cache/counts-version.txt';
    }

    public static function cacheVersion(): int
    {
        $file = self::cacheVersionFile();
        if (!is_file($file)) {
            return 0;
        }
        return (int) trim((string) @file_get_contents($file));
    }

    private static function bumpCacheVersion(): void
    {
        $file = self::cacheVersionFile();
        $dir = dirname($file);
        if (!is_dir($dir)) {
            @mkdir($dir, 0775, true);
        }
        @file_put_contents($file, (string) (self::cacheVersion() + 1), LOCK_EX);
    }
}
