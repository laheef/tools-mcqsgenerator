<?php
/**
 * Sign-in screen. Also renders "forgot password" and "reset password" modes.
 *
 * @var string $mode  login|forgot|reset
 * @var string $error
 * @var string $notice
 * @var array|null $resetUser
 */

declare(strict_types=1);
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('ONIM_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}


use Onim\Admin\Csrf;
use Onim\Cms;

$mode = $mode ?? 'login';
?>
<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex, nofollow">
<title>Sign in · <?= e(Cms::siteName()) ?> admin</title>
<link rel="stylesheet" href="<?= e(admin_asset('admin.css')) ?>">
<link rel="icon" href="<?= e(Cms::faviconUrl()) ?>">
</head>
<body>
<div class="auth-shell">
    <div class="auth-card">
        <div class="mark" aria-hidden="true">O</div>

        <?php if ($mode === 'forgot'): ?>
            <h1>Reset your password</h1>
            <p class="muted small">Enter the email address on your account. A single-use reset link is sent to it.</p>
        <?php elseif ($mode === 'reset'): ?>
            <h1>Choose a new password</h1>
            <p class="muted small">Setting a password for <?= e((string) ($resetUser['email'] ?? '')) ?>.</p>
        <?php else: ?>
            <h1>Sign in to the admin panel</h1>
            <p class="muted small"><?= e(Cms::siteName()) ?> · content, layout and settings.</p>
        <?php endif; ?>

        <?php if (!empty($error)): ?>
            <div class="notice err" role="alert"><div><strong>Not so fast</strong><?= e($error) ?></div></div>
        <?php endif; ?>
        <?php if (!empty($notice)): ?>
            <div class="notice ok" role="status"><div><?= e($notice) ?></div></div>
        <?php endif; ?>

        <form method="post" action="<?= e(admin_url($mode === 'login' ? 'login' : ($mode === 'forgot' ? 'forgot' : 'reset'))) ?>" autocomplete="off">
            <?= Csrf::field() ?>
            <?php if ($mode === 'login'): ?>
                <div class="field">
                    <label for="email">Email address</label>
                    <input id="email" name="email" type="email" required autofocus autocomplete="username"
                           value="<?= e((string) ($email ?? '')) ?>">
                </div>
                <div class="field">
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" required autocomplete="current-password">
                </div>
                <input type="hidden" name="redirect" value="<?= e((string) ($redirect ?? '')) ?>">
                <button class="btn btn-primary" type="submit" style="width:100%">Sign in</button>
                <div class="auth-links">
                    <a href="<?= e(admin_url('forgot')) ?>">Forgot your password?</a>
                    <a href="<?= e(site_link('/')) ?>">Back to the site</a>
                </div>
            <?php elseif ($mode === 'forgot'): ?>
                <div class="field">
                    <label for="email">Email address</label>
                    <input id="email" name="email" type="email" required autofocus autocomplete="username">
                </div>
                <button class="btn btn-primary" type="submit" style="width:100%">Send reset link</button>
                <div class="auth-links"><a href="<?= e(admin_url('login')) ?>">Back to sign in</a></div>
            <?php else: ?>
                <input type="hidden" name="token" value="<?= e((string) ($token ?? '')) ?>">
                <div class="field">
                    <label for="password">New password</label>
                    <input id="password" name="password" type="password" required autofocus autocomplete="new-password">
                    <div class="hint">At least 10 characters.</div>
                </div>
                <div class="field">
                    <label for="password2">Repeat the password</label>
                    <input id="password2" name="password2" type="password" required autocomplete="new-password">
                </div>
                <button class="btn btn-primary" type="submit" style="width:100%">Save the new password</button>
            <?php endif; ?>
        </form>

        <p class="auth-foot">
            Protected area. Sessions expire after 2 hours of inactivity, failed attempts are rate limited,
            and every action is written to the activity log.
        </p>
    </div>
</div>
</body>
</html>
