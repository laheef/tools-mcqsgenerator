<?php
/**
 * Reset — password recovery.
 *
 * A single-use token is emailed; only its SHA-256 hash is stored, so a database
 * dump cannot be used to reset an account. Tokens expire after one hour and are
 * invalidated as soon as they are used.
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
use Onim\Mailer;

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

        if (!Db::available()) {
            return null;
        }

        $token = bin2hex(random_bytes(32));
        try {
            Db::begin();
            Db::exec('UPDATE password_resets SET used_at = NOW() WHERE user_id = ? AND used_at IS NULL', [(int) $user['id']]);
            // Use the database clock for both creation and expiry validation. A
            // PHP/DB timezone mismatch must not make a fresh link look expired.
            $inserted = Db::exec(
                'INSERT INTO password_resets (user_id, token_hash, expires_at, requested_ip)
                 VALUES (?, ?, DATE_ADD(NOW(), INTERVAL 1 HOUR), ?)',
                [(int) $user['id'], hash('sha256', $token), client_ip()]
            );
            if ($inserted !== 1) {
                Db::rollback();
                error_log('[admin-password-reset] could not store a reset token');
                return null;
            }
            Db::commit();
        } catch (\Throwable $e) {
            Db::rollback();
            error_log('[admin-password-reset] could not create reset token: ' . $e->getMessage());
            return null;
        }

        $url = admin_absolute_url('reset', ['token' => $token]);
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

    /**
     * Look up a live reset token.
     *
     * Careful: `id` in the returned row is the id of the password_resets row, not
     * the user. Callers must use `user_id` for the account.
     *
     * @return array<string,mixed>|null
     */
    public static function validate(string $token): ?array
    {
        if (strlen($token) !== 64) {
            return null;
        }
        $row = Db::one(
            'SELECT r.*, r.user_id AS user_id, u.email, u.name, u.status FROM password_resets r
             JOIN users u ON u.id = r.user_id
             WHERE r.token_hash = ? AND r.used_at IS NULL AND r.expires_at > NOW() LIMIT 1',
            [hash('sha256', $token)]
        );
        if ($row === null || ($row['status'] ?? '') !== 'active') {
            return null;
        }
        return $row;
    }

    /**
     * Save the new password and consume the reset token atomically.
     *
     * Db's convenience methods return 0 on a failed statement. Treat anything
     * other than exactly one updated user row and at least one consumed token
     * as failure, and roll back so the page never reports a change that was not
     * persisted.
     */
    public static function consume(string $token, string $password, int $userId): bool
    {
        if ($userId < 1 || strlen($token) !== 64 || !Db::available()) {
            return false;
        }

        try {
            Db::begin();
            $reset = Db::one(
                "SELECT r.id, r.user_id FROM password_resets r
                 JOIN users u ON u.id = r.user_id
                 WHERE r.token_hash = ? AND r.user_id = ? AND r.used_at IS NULL
                   AND r.expires_at > NOW() AND u.status = 'active'
                 LIMIT 1 FOR UPDATE",
                [hash('sha256', $token), $userId]
            );
            if ($reset === null || (int) ($reset['user_id'] ?? 0) !== $userId) {
                Db::rollback();
                return false;
            }

            $updated = Db::update('users', [
                'password_hash' => Auth::hash($password),
                'must_change'   => 0,
                'updated_at'    => date('Y-m-d H:i:s'),
            ], "id = :id AND status = 'active'", [':id' => $userId]);
            if ($updated !== 1) {
                Db::rollback();
                error_log('[admin-password-reset] password update affected no user row');
                return false;
            }

            // Invalidate every outstanding link for this account, including
            // this one, only after the password update has succeeded.
            $used = Db::exec(
                'UPDATE password_resets SET used_at = NOW() WHERE user_id = ? AND used_at IS NULL',
                [$userId]
            );
            if ($used < 1) {
                Db::rollback();
                error_log('[admin-password-reset] password reset token could not be consumed');
                return false;
            }

            Db::commit();
        } catch (\Throwable $e) {
            Db::rollback();
            error_log('[admin-password-reset] transaction failed: ' . $e->getMessage());
            return false;
        }

        // A logging problem must not turn a committed password change into a
        // reported failure; the password and token are already durable.
        try {
            Activity::log('password_reset', 'auth', (string) $userId, 'Password changed through a reset link');
        } catch (\Throwable $e) {
            error_log('[admin-password-reset] audit log failed after password change');
        }
        return true;
    }
}
