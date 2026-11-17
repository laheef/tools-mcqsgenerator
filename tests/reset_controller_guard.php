<?php
/**
 * Offline guard for the password-reset page (no database needed).
 *
 * Reset::validate() returns the password_resets row, so $row['id'] is the id of
 * the *token*, not of the user. The reset page once passed that id to
 * Reset::consume(), which updated the wrong account (or none) while the page
 * still said "Password updated". This test keeps that from coming back.
 */
declare(strict_types=1);

$root = dirname(__DIR__);
$index = (string) file_get_contents($root . '/admin/index.php');
$reset = (string) file_get_contents($root . '/admin/lib/Reset.php');
$pass = 0;
$fail = 0;
$check = static function (bool $ok, string $label) use (&$pass, &$fail): void {
    if ($ok) { $pass++; echo "PASS {$label}\n"; } else { $fail++; fwrite(STDERR, "FAIL {$label}\n"); }
};

$check(strpos($index, "\$resetUser['id']") === false, "reset page never uses the token row's id as a user id");
$check(strpos($index, "(int) \$resetUser['user_id']") !== false, 'reset page passes user_id to Reset::consume()');
$check((bool) preg_match('/if \(Reset::consume\(/', $index), 'reset page only reports success when consume() returns true');
$check(strpos($reset, 'DATE_ADD(NOW(), INTERVAL 1 HOUR)') !== false, 'token expiry is computed on the database clock');
$check(strpos($reset, 'FOR UPDATE') !== false && strpos($reset, 'Db::commit()') !== false, 'consume() locks the token and commits atomically');

printf("Reset controller guard: %d passed, %d failed\n", $pass, $fail);
exit($fail === 0 ? 0 : 1);
