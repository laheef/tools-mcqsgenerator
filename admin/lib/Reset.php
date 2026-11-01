<?php
/**
 * Reset — password recovery.
 *
 * A single-use token is emailed; only its SHA-256 hash is stored, so a database
 * dump cannot be used to reset an account. Tokens expire after one hour and are
 * invalidated as soon as they are used.
 */

declare(strict_types=1);


namespace Omni\Admin;

// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('OMNI_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}

use Omni\Cms;
use Omni\Db;
use Omni\Mailer;

final class Reset
{
    /**
     * Create a reset token for an email address.
     *
     * Returns the reset URL when the account exists and mail could not be sent
     * (only used in development, gated by the mail_debug_links setting),
     * otherwise null. The caller shows the same message either way.
     */
    public static function request(string $email): ?string
    {
        $email = mb_strtolower(trim($email));
        $user = Db::one('SELECT * FROM users WHERE email = ? AND status = \'active\' LIMIT 1', [$email]);
        if ($user === null) {
            return null;
        }

        $token = bin2hex(random_bytes(32));
        Db::exec('UPDATE password_resets SET used_at = NOW() WHERE user_id = ? AND used_at IS NULL', [(int) $user['id']]);
        Db::insert('password_resets', [
            'user_id'      => (int) $user['id'],
            'token_hash'   => hash('sha256', $token),
            'expires_at'   => date('Y-m-d H:i:s', time() + 3600),
            'requested_ip' => client_ip(),
        ]);

        $url = site_url() . admin_base() . '/index.php?p=reset&token=' . $token;
        $result = Mailer::send([
            'to'      => (string) $user['email'],
            'subject' => 'Reset your ' . Cms::siteName() . ' admin password',
            'html'    => '<p>Hello ' . htmlspecialchars((string) $user['name']) . ',</p>'
                       . '<p>A password reset was requested for your admin account. The link below works once and expires in one hour.</p>'
                       . '<p><a href="' . htmlspecialchars($url) . '">Choose a new password</a></p>'
                       . '<p class="muted">If you did not ask for this, ignore the email — your password is unchanged.</p>',
        ]);
        Activity::log('password_reset_requested', 'auth', (string) $user['id'], 'Reset link ' . ($result['ok'] ? 'emailed' : 'not emailed: ' . $result['error']));

        if (!$result['ok'] && Cms::settingBool('mail_debug_links')) {
            return $url;
        }
        return null;
    }

    /** @return array<string,mixed>|null */
    public static function validate(string $token): ?array
    {
        if (strlen($token) !== 64) {
            return null;
        }
        $row = Db::one(
            'SELECT r.*, u.email, u.name, u.status FROM password_resets r
             JOIN users u ON u.id = r.user_id
             WHERE r.token_hash = ? AND r.used_at IS NULL AND r.expires_at > NOW() LIMIT 1',
            [hash('sha256', $token)]
        );
        if ($row === null || ($row['status'] ?? '') !== 'active') {
            return null;
        }
        return $row;
    }

    public static function consume(string $token, string $password, int $userId): void
    {
        Db::update('users', [
            'password_hash' => Auth::hash($password),
            'must_change'   => 0,
            'updated_at'    => date('Y-m-d H:i:s'),
        ], 'id = :id', [':id' => $userId]);

        Db::exec('UPDATE password_resets SET used_at = NOW() WHERE token_hash = ?', [hash('sha256', $token)]);
        Db::exec('UPDATE password_resets SET used_at = NOW() WHERE user_id = ? AND used_at IS NULL', [$userId]);
        Activity::log('password_reset', 'auth', (string) $userId, 'Password changed through a reset link');
    }
}
