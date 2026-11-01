<?php
/**
 * RateLimit — a MySQL-backed counter used for login throttling and the public
 * contact form. File-based limits do not survive across workers reliably, and
 * shared hosting has no Redis, so the database is the honest option.
 */

declare(strict_types=1);


namespace Omni\Admin;

// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('OMNI_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}

use Omni\Db;

final class RateLimit
{
    /**
     * Count one attempt inside a sliding window.
     *
     * @return int the number of hits in the current window
     */
    public static function hit(string $key, int $max = 5, int $windowMinutes = 15, int $blockMinutes = 15): int
    {
        if (!Db::available()) {
            return 0;
        }
        $key = mb_substr($key, 0, 190);
        $row = Db::one('SELECT * FROM rate_limits WHERE rkey = ?', [$key]);
        $now = time();

        if ($row === null) {
            Db::insert('rate_limits', ['rkey' => $key, 'hits' => 1, 'window_start' => date('Y-m-d H:i:s', $now)]);
            return 1;
        }

        $start = strtotime((string) $row['window_start']) ?: $now;
        if ($now - $start > $windowMinutes * 60) {
            Db::exec('UPDATE rate_limits SET hits = 1, window_start = ?, blocked_until = NULL WHERE rkey = ?', [date('Y-m-d H:i:s', $now), $key]);
            return 1;
        }

        $hits = (int) $row['hits'] + 1;
        $blockedUntil = $row['blocked_until'] ?: null;
        if ($hits > $max && $blockedUntil === null) {
            $blockedUntil = date('Y-m-d H:i:s', $now + $blockMinutes * 60);
        }
        Db::exec('UPDATE rate_limits SET hits = ?, blocked_until = ? WHERE rkey = ?', [$hits, $blockedUntil, $key]);
        return $hits;
    }

    public static function blocked(string $key): bool
    {
        if (!Db::available()) {
            return false;
        }
        $row = Db::one('SELECT blocked_until FROM rate_limits WHERE rkey = ?', [mb_substr($key, 0, 190)]);
        if ($row === null || empty($row['blocked_until'])) {
            return false;
        }
        return strtotime((string) $row['blocked_until']) > time();
    }

    /** Minutes until the block lifts (minimum 1). */
    public static function retryAfter(string $key): int
    {
        $row = Db::one('SELECT blocked_until FROM rate_limits WHERE rkey = ?', [mb_substr($key, 0, 190)]);
        if ($row === null || empty($row['blocked_until'])) {
            return 1;
        }
        return max(1, (int) ceil((strtotime((string) $row['blocked_until']) - time()) / 60));
    }

    public static function clear(string $key): void
    {
        if (!Db::available()) {
            return;
        }
        Db::exec('DELETE FROM rate_limits WHERE rkey = ?', [mb_substr($key, 0, 190)]);
    }

    /** Housekeeping: drop rows whose window is long past. */
    public static function prune(): int
    {
        return Db::exec('DELETE FROM rate_limits WHERE window_start < DATE_SUB(NOW(), INTERVAL 2 DAY)');
    }
}
