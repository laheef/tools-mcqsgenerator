<?php
/** Standalone error page (no panel chrome): 403, 404, 405, 419, 500. */

declare(strict_types=1);
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('OMNI_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex, nofollow">
<title><?= (int) $code ?> · Admin</title>
<link rel="stylesheet" href="<?= e(admin_asset('admin.css')) ?>">
</head>
<body>
<div class="auth-shell">
    <div class="auth-card">
        <div class="mark" aria-hidden="true">!</div>
        <h1><?= (int) $code ?></h1>
        <p class="muted"><?= e($message) ?></p>
        <div class="row" style="margin-top:18px">
            <a class="btn btn-primary" href="<?= e(admin_url('dashboard')) ?>">Back to dashboard</a>
            <a class="btn" href="<?= e(admin_url('login')) ?>">Sign in</a>
        </div>
    </div>
</div>
</body>
</html>
