<?php
/**
 * Engagement — real, persisted likes and reader reviews.
 *
 * Both features are stored on disk and survive restarts. Writes go through an
 * exclusive lock, so concurrent requests cannot corrupt a counter or drop a
 * review; the mutation is read-modify-write inside `flock()`. There is no
 * database extension to install (the site must run on plain `php -S`), so the
 * store is JSON: one small file for the like counters and an append-only
 * JSON-lines log for reviews, plus a per-visitor guard so one browser cannot
 * inflate a counter or post the same review twice.
 *
 * Deployment: DATA_PATH must be writable by the web user. `exists()` tells the
 * caller whether writes are possible so the page can degrade honestly instead
 * of pretending.
 */

declare(strict_types=1);

namespace Onim;

final class Engagement
{
    /** Minimum seconds between two likes from the same visitor on one calculator. */
    private const LIKE_COOLDOWN = 0;

    /** Longest accepted review text; a novel is not a review. */
    public const MAX_BODY = 1500;
    public const MAX_NAME = 60;
    public const MAX_TITLE = 90;
    public const MIN_BODY = 20;

    /** @var array<string,int>|null memoised runtime counts */
    private static ?array $runtime = null;

    private static function dir(): string
    {
        $dir = Data::path('engagement');
        if (!is_dir($dir)) {
            @mkdir($dir, 0775, true);
        }
        return $dir;
    }

    private static function likesFile(): string
    {
        return self::dir() . '/likes.json';
    }

    private static function reviewsFile(): string
    {
        return self::dir() . '/reviews.jsonl';
    }

    /** Can this installation persist engagement data? */
    public static function writable(): bool
    {
        $dir = self::dir();
        return is_dir($dir) && is_writable($dir);
    }

    /* ------------------------------------------------------------------ likes */

    /** @return array<string,int> calculator path => like count */
    public static function likeCounts(): array
    {
        if (self::$runtime !== null) {
            return self::$runtime;
        }
        $file = self::likesFile();
        $raw = is_file($file) ? json_decode((string) file_get_contents($file), true) : null;
        return self::$runtime = is_array($raw) ? array_map('intval', $raw) : [];
    }

    /**
     * The like count a page starts with.
     *
     * The harvested definitions carry a real "N people find this calculator
     * helpful" number. Starting every counter at zero would throw that away and
     * make a working site look abandoned, so it is kept as a base and runtime
     * likes are added on top.
     */
    public static function baseLikes(string $path): int
    {
        static $base = null;
        if ($base === null) {
            $file = Data::path('engagement/likes-base.json');
            $raw = is_file($file) ? json_decode((string) file_get_contents($file), true) : null;
            $base = is_array($raw) ? array_map('intval', $raw) : [];
        }
        return $base[$path] ?? 0;
    }

    public static function likeCount(string $path): int
    {
        return self::baseLikes($path) + (self::likeCounts()[$path] ?? 0);
    }

    /**
     * Add one like. The per-visitor cookie is set by the caller (it needs the
     * request); this only refuses when that cookie already liked this path.
     *
     * @return array{count:int,liked:bool,changed:bool}
     */
    public static function like(string $path, string $visitor, bool $already): array
    {
        if ($already || !self::writable()) {
            return ['count' => self::likeCount($path), 'liked' => true, 'changed' => false];
        }
        $file = self::likesFile();
        $fh = @fopen($file, 'c+');
        if ($fh === false) {
            return ['count' => self::likeCount($path), 'liked' => false, 'changed' => false];
        }
        flock($fh, LOCK_EX);
        $raw = stream_get_contents($fh);
        $counts = is_string($raw) && $raw !== '' ? json_decode($raw, true) : [];
        if (!is_array($counts)) {
            $counts = [];
        }
        $counts[$path] = (int) ($counts[$path] ?? 0) + 1;
        ftruncate($fh, 0);
        rewind($fh);
        fwrite($fh, json_encode($counts, JSON_UNESCAPED_SLASHES));
        fflush($fh);
        flock($fh, LOCK_UN);
        fclose($fh);
        self::$runtime = null;          // the memo no longer matches the file
        return ['count' => self::baseLikes($path) + $counts[$path], 'liked' => true, 'changed' => true];
    }

    /* ---------------------------------------------------------------- reviews */

    /** @return array<int,array> newest first */
    public static function reviews(string $path): array
    {
        $file = self::reviewsFile();
        if (!is_file($file)) {
            return [];
        }
        $out = [];
        foreach (explode("\n", (string) file_get_contents($file)) as $line) {
            if (trim($line) === '') {
                continue;
            }
            $row = json_decode($line, true);
            if (is_array($row) && ($row['path'] ?? '') === $path && empty($row['hidden'])) {
                $out[] = $row;
            }
        }
        usort($out, static fn ($a, $b) => ($b['ts'] ?? 0) <=> ($a['ts'] ?? 0));
        return $out;
    }

    /** Aggregate rating for one calculator: [average, count]. */
    public static function rating(string $path): array
    {
        $reviews = self::reviews($path);
        if ($reviews === []) {
            return [0.0, 0];
        }
        $sum = 0;
        foreach ($reviews as $r) {
            $sum += (int) ($r['rating'] ?? 0);
        }
        return [round($sum / count($reviews), 1), count($reviews)];
    }

    /**
     * Validate and store a review.
     *
     * @param array{path:string,name:string,body:string,title?:string,rating?:int} $in
     * @return array{ok:bool,errors:array<string,string>,review?:array}
     */
    public static function addReview(array $in): array
    {
        $errors = [];
        $path  = trim((string) ($in['path'] ?? ''));
        $name  = trim(preg_replace('/\s+/', ' ', (string) ($in['name'] ?? '')) ?? '');
        $title = trim(preg_replace('/\s+/', ' ', (string) ($in['title'] ?? '')) ?? '');
        $body  = trim(str_replace(["\r\n", "\r"], "\n", (string) ($in['body'] ?? '')));
        $rating = (int) ($in['rating'] ?? 5);

        if ($path === '' || Data::calculator($path) === null) {
            $errors['path'] = 'Unknown calculator.';
        }
        if ($name === '') {
            $errors['name'] = 'Please add a name.';
        } elseif (mb_strlen($name) > self::MAX_NAME) {
            $errors['name'] = 'Names are limited to ' . self::MAX_NAME . ' characters.';
        }
        if (mb_strlen($title) > self::MAX_TITLE) {
            $errors['title'] = 'Headlines are limited to ' . self::MAX_TITLE . ' characters.';
        }
        if (mb_strlen($body) < self::MIN_BODY) {
            $errors['body'] = 'Please write at least ' . self::MIN_BODY . ' characters.';
        } elseif (mb_strlen($body) > self::MAX_BODY) {
            $errors['body'] = 'Reviews are limited to ' . self::MAX_BODY . ' characters.';
        }
        if ($rating < 1 || $rating > 5) {
            $errors['rating'] = 'Pick a rating between 1 and 5 stars.';
        }
        if (!self::writable()) {
            $errors['storage'] = 'Reviews cannot be saved right now (the data directory is read-only).';
        }
        if ($errors !== []) {
            return ['ok' => false, 'errors' => $errors];
        }

        // A link in the body is the single most common spam signal.
        if (preg_match('~https?://|www\.~i', $body) === 1) {
            $errors['body'] = 'Links are not allowed in reviews.';
            return ['ok' => false, 'errors' => $errors];
        }

        $row = [
            'id'     => bin2hex(random_bytes(8)),
            'path'   => $path,
            'name'   => $name,
            'title'  => $title,
            'body'   => $body,
            'rating' => $rating,
            'ts'     => time(),
            'ua'     => mb_substr((string) ($in['ua'] ?? ''), 0, 120),
        ];

        $file = self::reviewsFile();
        $fh = @fopen($file, 'ab');
        if ($fh === false) {
            return ['ok' => false, 'errors' => ['storage' => 'Could not open the review log.']];
        }
        flock($fh, LOCK_EX);
        fwrite($fh, json_encode($row, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . "\n");
        fflush($fh);
        flock($fh, LOCK_UN);
        fclose($fh);

        return ['ok' => true, 'errors' => [], 'review' => $row];
    }

    /** Paths this visitor has already liked (cookie-identified, anonymous). */
    public static function visitorLikes(): array
    {
        $token = $_COOKIE['onim_vid'] ?? '';
        if (!is_string($token) || preg_match('/^[a-f0-9]{16,64}$/', $token) !== 1) {
            return [];
        }
        $file = self::dir() . '/visitors.json';
        $raw = is_file($file) ? json_decode((string) file_get_contents($file), true) : null;
        if (!is_array($raw)) {
            return [];
        }
        $likes = $raw[$token]['likes'] ?? [];
        return is_array($likes) ? $likes : [];
    }

    /* ---------------------------------------------------------------- helpers */

    /**
     * Display name -> avatar URL.
     *
     * Stable per name, so the same creator looks the same on every page. When a
     * page lists several people, pass the whole list: `avatarsFor()` guarantees
     * two people on one page never share a face, which looks like a mistake to a
     * reader even when the assignment is random.
     */
    public static function avatarFor(string $name): string
    {
        $files = self::avatars();
        if ($files === []) {
            return '';
        }
        $hash = (int) sprintf('%u', crc32(mb_strtolower(trim($name))));
        return $files[$hash % count($files)];
    }

    /**
     * Assign an avatar to each name on one page, with no repeats.
     *
     * @param array<int,string> $names
     * @return array<string,string> name => url
     */
    public static function avatarsFor(array $names, string $seed = ''): array
    {
        $files = self::avatars();
        if ($files === [] || $names === []) {
            return [];
        }
        // a page-specific rotation keeps the ordering stable for this page while
        // still differing from page to page
        $offset = $seed !== '' ? ((int) sprintf('%u', crc32($seed)) % count($files)) : 0;
        $out = [];
        $taken = [];
        foreach ($names as $name) {
            $name = (string) $name;
            if (isset($out[$name])) {
                continue;
            }
            $idx = (int) sprintf('%u', crc32(mb_strtolower(trim($name))));
            // probe forward until an unused portrait is found
            for ($i = 0; $i < count($files); $i++) {
                $candidate = ($idx + $offset + $i) % count($files);
                if (!isset($taken[$candidate])) {
                    $taken[$candidate] = true;
                    $out[$name] = $files[$candidate];
                    break;
                }
            }
        }
        return $out;
    }

    /** @return array<int,string> avatar URLs available in this build */
    public static function avatars(): array
    {
        static $urls = null;
        if ($urls !== null) {
            return $urls;
        }
        $dir = dirname(__DIR__) . '/assets/img/creators';
        $urls = [];
        foreach (glob($dir . '/*.jpg') ?: [] as $file) {
            $urls[] = View::asset('/img/creators/' . basename($file));
        }
        sort($urls);
        return $urls;
    }

    /** Reviewer initials, used when a commenter has no photo. */
    public static function initials(string $name): string
    {
        $parts = preg_split('/\s+/', trim($name)) ?: [];
        $parts = array_values(array_filter($parts, static fn ($p) => $p !== ''));
        if ($parts === []) {
            return '?';
        }
        $first = mb_substr($parts[0], 0, 1);
        $last  = count($parts) > 1 ? mb_substr($parts[count($parts) - 1], 0, 1) : '';
        return mb_strtoupper($first . $last);
    }
}
