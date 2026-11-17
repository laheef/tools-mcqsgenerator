<?php
/**
 * Opt-in integration test for password-reset persistence.
 *
 * This test refuses to connect unless explicitly enabled and the configured
 * database name starts with `test_`. It creates two throwaway users, resets
 * one via a one-use token, verifies the hash immediately, and removes both.
 *
 * Run only against a disposable test database:
 *   ONIM_RUN_DB_INTEGRATION_TESTS=1 php tests/password_reset_persistence.php
 */
declare(strict_types=1);

if (getenv('ONIM_RUN_DB_INTEGRATION_TESTS') !== '1') {
    echo "SKIP password reset DB integration test (explicit opt-in required)\n";
    exit(0);
}

require_once __DIR__ . '/../admin/bootstrap.php';

use Onim\Admin\Auth;
use Onim\Admin\Reset;
use Onim\Db;

$dbName = (string) (onim_db_config()['name'] ?? '');
if (preg_match('/^test[_-]/i', $dbName) !== 1) {
    fwrite(STDERR, "REFUSED: integration test requires a database named test_*\n");
    exit(2);
}
if (!Db::available() || !Db::hasTable('users') || !Db::hasTable('password_resets')) {
    fwrite(STDERR, "FAIL: test database is unavailable or missing the required schema\n");
    exit(1);
}

$nonce = bin2hex(random_bytes(8));
$emails = ["reset-a-{$nonce}@example.invalid", "reset-b-{$nonce}@example.invalid"];
$ids = [];
$pass = 0;
$fail = 0;
$check = static function (bool $ok, string $label) use (&$pass, &$fail): void {
    if ($ok) {
        $pass++;
        echo "PASS {$label}\n";
    } else {
        $fail++;
        fwrite(STDERR, "FAIL {$label}\n");
    }
};

try {
    foreach ($emails as $email) {
        $id = Db::insert('users', [
            'name' => 'Password Reset Integration Test',
            'email' => $email,
            'password_hash' => Auth::hash('Temporary-original-password-47!'),
            'role' => 'administrator',
            'status' => 'active',
        ]);
        if ($id < 1) {
            throw new RuntimeException('could not create a disposable test user');
        }
        $ids[] = $id;
    }

    $otherBefore = Db::one('SELECT password_hash FROM users WHERE id = ?', [$ids[1]]);
    $token = bin2hex(random_bytes(32));
    $stored = Db::exec(
        'INSERT INTO password_resets (user_id, token_hash, expires_at, requested_ip)
         VALUES (?, ?, DATE_ADD(NOW(), INTERVAL 1 HOUR), ?)',
        [$ids[0], hash('sha256', $token), '127.0.0.1']
    );
    if ($stored !== 1) {
        throw new RuntimeException('could not create the disposable reset token');
    }

    // The reset page passes validate()'s row to consume(). That row's `id` is
    // the password_resets id, so the account must come from `user_id`.
    $live = Reset::validate($token);
    $check(is_array($live) && (int) $live['user_id'] === $ids[0], 'validate() exposes the account as user_id');

    $newPassword = 'Reset-test-password-92!';
    $changed = Reset::consume($token, $newPassword, (int) ($live['user_id'] ?? 0));
    $after = Db::one('SELECT email, password_hash, must_change FROM users WHERE id = ?', [$ids[0]]);
    $otherAfter = Db::one('SELECT password_hash FROM users WHERE id = ?', [$ids[1]]);
    $resetRow = Db::one('SELECT used_at FROM password_resets WHERE token_hash = ?', [hash('sha256', $token)]);

    $check($changed, 'reset reports success only after database commit');
    $check(is_array($after) && $after['email'] === $emails[0], 'the token updates the account bound to its email');
    $check(is_array($after) && password_verify($newPassword, (string) $after['password_hash']), 'new password hash is persisted immediately');
    $check(is_array($after) && (int) $after['must_change'] === 0, 'must_change is cleared with the password update');
    $check(is_array($otherBefore) && is_array($otherAfter) && hash_equals((string) $otherBefore['password_hash'], (string) $otherAfter['password_hash']), 'another email account is unchanged');
    $check(is_array($resetRow) && $resetRow['used_at'] !== null, 'the reset token is consumed in the same transaction');
    $check(Reset::consume($token, 'Another-test-password-83!', $ids[0]) === false, 'a reset token cannot be reused');

} catch (\Throwable $e) {
    $fail++;
    fwrite(STDERR, 'FAIL integration setup/execution: ' . $e->getMessage() . "\n");
} finally {
    foreach ($ids as $id) {
        if (Db::hasTable('activity_log')) {
            Db::delete('activity_log', "action = 'password_reset' AND entity_id = :id", [':id' => (string) $id]);
        }
        Db::delete('users', 'id = :id', [':id' => $id]);
    }
}

printf("Password reset persistence: %d passed, %d failed\n", $pass, $fail);
exit($fail === 0 ? 0 : 1);
