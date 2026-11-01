<?php
/**
 * Csrf — stateless form tokens for the public site.
 *
 * The public pages are served without a PHP session (that keeps them cacheable
 * and avoids a session file per visitor), so the token cannot be stored in
 * $_SESSION. Instead it is an HMAC over the current two-hour window and the
 * visitor's IP, keyed with the installation's app key:
 *
 *   * a token is valid for the rest of its two-hour window (a long form stays
 *     usable), and stale tokens expire on their own;
 *   * a token minted for one visitor is useless to another;
 *   * nothing is written server-side, so the contact form still works when the
 *     session save path on shared hosting is full or read-only.
 *
 * Replay is handled by the caller (the contact handler rate-limits by IP and
 * ignores identical submissions within a minute).
 */

declare(strict_types=1);

namespace Onim;

final class Csrf
{
    private const WINDOW = 7200; // seconds a token stays valid

    public static function token(): string
    {
        $window = (int) floor(time() / self::WINDOW);
        return $window . '.' . self::sign($window);
    }

    public static function field(): string
    {
        return '<input type="hidden" name="_token" value="' . htmlspecialchars(self::token(), ENT_QUOTES) . '">';
    }

    /** Check a submitted token against this window and the previous one. */
    public static function valid(?string $token = null): bool
    {
        $token ??= isset($_POST['_token']) && is_string($_POST['_token']) ? $_POST['_token'] : '';
        if ($token === '' || !str_contains($token, '.')) {
            return false;
        }
        [$window, $signature] = explode('.', $token, 2);
        if (!ctype_digit($window)) {
            return false;
        }
        $window = (int) $window;
        $now = (int) floor(time() / self::WINDOW);
        if ($window > $now || $now - $window > 1) {
            return false;
        }
        return hash_equals(self::sign($window), $signature);
    }

    private static function sign(int $window): string
    {
        $ip = (string) ($_SERVER['REMOTE_ADDR'] ?? '');
        return substr(hash_hmac('sha256', $window . '|' . $ip . '|contact', self::key()), 0, 40);
    }

    private static function key(): string
    {
        $cfg = onim_db_config();
        $key = (string) ($cfg['app_key'] ?? '');
        if ($key === '') {
            // Deterministic fallback so a site without credentials still has
            // working tokens (they are only as secret as the install path).
            $key = hash('sha256', __DIR__ . '|' . ($cfg['name'] ?? '') . '|omni-csrf');
        }
        return $key;
    }
}
