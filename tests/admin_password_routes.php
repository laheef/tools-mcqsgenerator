<?php
declare(strict_types=1);

$_SERVER['SCRIPT_NAME'] = '/tool/admin/index.php';
$_SERVER['REQUEST_URI'] = '/tool/admin/index.php';
require_once __DIR__ . '/../admin/bootstrap.php';

$cases = [
    ['/tool/admin/forgot', [], 'forgot'],
    ['/tool/admin/forgot-password', [], 'forgot'],
    ['/tool/admin/reset', [], 'reset'],
    ['/tool/admin/reset-password', [], 'reset'],
    ['/tool/admin/change-password', [], 'account'],
    ['/tool/admin/index.php?p=forgot', ['p' => 'forgot'], 'forgot'],
    ['/tool/admin/index.php?p=reset&token=abc', ['p' => 'reset', 'token' => 'abc'], 'reset'],
    ['/tool/admin/index.php', [], 'dashboard'],
];
$failed = 0;
foreach ($cases as [$uri, $query, $expected]) {
    $_SERVER['REQUEST_URI'] = $uri;
    $_GET = $query;
    $actual = admin_route_page();
    if ($actual !== $expected) {
        fwrite(STDERR, "FAIL {$uri}: expected {$expected}, got {$actual}\n");
        $failed++;
    } else {
        echo "PASS {$uri} -> {$actual}\n";
    }
}
putenv('ONIM_SITE_URL=https://example.test/tool');
$_SERVER['REQUEST_URI'] = '/tool/admin/index.php?p=forgot';
$_GET = [];
$resetUrl = admin_absolute_url('reset', ['token' => 'reset-token']);
$expectedUrl = 'https://example.test/tool/admin/index.php?p=reset&token=reset-token';
if ($resetUrl !== $expectedUrl) {
    fwrite(STDERR, "FAIL reset email URL: expected {$expectedUrl}, got {$resetUrl}\n");
    $failed++;
} else {
    echo "PASS reset email URL uses the configured host and only one admin base path\n";
}

printf("Admin password routes: %d passed, %d failed\n", count($cases) + 1 - $failed, $failed);
exit($failed === 0 ? 0 : 1);
