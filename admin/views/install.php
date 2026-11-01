<?php
/**
 * Installer screen.
 *
 * @var string $step
 * @var array<int,string> $errors
 * @var array<int,array{label:string,ok:bool,detail:string}> $requirements
 * @var bool $done
 * @var array|null $seedReport
 * @var bool $alreadyInstalled
 */

declare(strict_types=1);
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('OMNI_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}


use Omni\Admin\Csrf;
use Omni\Cms;

$blocking = array_values(array_filter($requirements, static fn (array $r): bool => !$r['ok']));
$hardBlockers = array_filter($blocking, static fn (array $r): bool => in_array($r['label'], ['PHP 8.1 or newer', 'pdo_mysql extension'], true));
?>
<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex, nofollow">
<title>Install the admin panel</title>
<link rel="stylesheet" href="<?= e(admin_asset('admin.css')) ?>">
</head>
<body>
<div class="auth-shell" style="align-items:start; padding-top:40px">
<div style="width:min(760px,100%)">

    <div class="auth-card" style="width:100%">
        <div class="mark" aria-hidden="true">O</div>
        <h1>Install the admin panel</h1>

        <?php if (($step ?? '') === 'locked'): ?>
            <div class="notice warn"><div><strong>Already installed</strong>
                An administrator account exists, so this installer is locked. Sign in to the panel instead.
            </div></div>
            <a class="btn btn-primary" href="<?= e(admin_url('login')) ?>">Go to sign-in</a>
        <?php elseif ($done): ?>
            <div class="notice ok"><div><strong>Installed</strong>
                The database schema is in place and the defaults are seeded.
                Delete <code>admin/install.php</code> now if your host lets you.
            </div></div>
            <?php if (!empty($seedReport['created'])): ?>
                <p class="small muted">Created: <?= e(implode(', ', $seedReport['created'])) ?></p>
            <?php endif; ?>
            <div class="row" style="margin-top:16px">
                <a class="btn btn-primary" href="<?= e(admin_url('login')) ?>">Sign in</a>
                <a class="btn" href="<?= e(site_link('/')) ?>">Open the site</a>
            </div>
        <?php else: ?>
            <?php if ($errors !== []): ?>
                <div class="notice err"><div><strong>Could not install</strong>
                    <?php foreach ($errors as $error): ?>
                        <div><?= e($error) ?></div>
                    <?php endforeach; ?>
                </div></div>
            <?php endif; ?>

            <h2 style="font-size:15px;margin-top:22px">1. Server check</h2>
            <table class="data" style="margin-bottom:18px">
                <tbody>
                <?php foreach ($requirements as $req): ?>
                    <tr>
                        <td style="width:24px"><?= $req['ok'] ? '✓' : '!' ?></td>
                        <td class="primary"><?= e($req['label']) ?></td>
                        <td class="muted small"><?= e($req['detail']) ?></td>
                        <td style="width:70px"><span class="badge <?= $req['ok'] ? 'badge-ok' : 'badge-warn' ?>"><?= $req['ok'] ? 'ok' : 'check' ?></span></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

            <?php if ($hardBlockers !== []): ?>
                <div class="notice warn"><div><strong>Fix the server first</strong>
                    PHP 8.1 and the pdo_mysql extension are required. On Hostinger: hPanel → Advanced → PHP Configuration →
                    PHP extensions, enable <code>pdo_mysql</code>, then choose PHP 8.2 or 8.3.
                </div></div>
            <?php endif; ?>

            <h2 style="font-size:15px;margin-top:22px">2. Database and first administrator</h2>
            <p class="small muted">Use the MySQL details from hPanel → Databases → MySQL Databases. The database must already exist.</p>

            <form method="post" action="<?= e(admin_base() . '/install.php') ?>" autocomplete="off">
                <?= Csrf::field() ?>
                <div class="field-row-3">
                    <div class="field">
                        <label for="db_host">MySQL host</label>
                        <input id="db_host" name="db_host" value="<?= e($_POST['db_host'] ?? 'localhost') ?>" required>
                    </div>
                    <div class="field">
                        <label for="db_port">Port</label>
                        <input id="db_port" name="db_port" type="number" value="<?= e((string) ($_POST['db_port'] ?? '3306')) ?>" required>
                    </div>
                    <div class="field">
                        <label for="db_name">Database name</label>
                        <input id="db_name" name="db_name" value="<?= e($_POST['db_name'] ?? '') ?>" required>
                    </div>
                </div>
                <div class="field-row">
                    <div class="field">
                        <label for="db_user">Database user</label>
                        <input id="db_user" name="db_user" value="<?= e($_POST['db_user'] ?? '') ?>" required>
                    </div>
                    <div class="field">
                        <label for="db_pass">Database password</label>
                        <input id="db_pass" name="db_pass" type="password" autocomplete="new-password">
                    </div>
                </div>

                <hr>

                <div class="field-row">
                    <div class="field">
                        <label for="admin_name">Your name</label>
                        <input id="admin_name" name="admin_name" value="<?= e($_POST['admin_name'] ?? '') ?>" required>
                    </div>
                    <div class="field">
                        <label for="admin_email">Your email (this is your login)</label>
                        <input id="admin_email" name="admin_email" type="email" value="<?= e($_POST['admin_email'] ?? '') ?>" required>
                    </div>
                </div>
                <div class="field-row">
                    <div class="field">
                        <label for="admin_pass">Password</label>
                        <input id="admin_pass" name="admin_pass" type="password" required minlength="10" autocomplete="new-password">
                        <div class="hint">At least 10 characters. Stored as a bcrypt/argon hash — never in plain text.</div>
                    </div>
                    <div class="field">
                        <label for="admin_pass2">Repeat the password</label>
                        <input id="admin_pass2" name="admin_pass2" type="password" required minlength="10" autocomplete="new-password">
                    </div>
                </div>

                <button class="btn btn-primary" type="submit" <?= $hardBlockers !== [] ? 'disabled' : '' ?>>Install</button>
            </form>

            <p class="auth-foot">
                The installer writes <code>config.db.php</code> (chmod 640) with the credentials and a random
                application key, then applies <code>admin/migrations/*.sql</code>.
            </p>
        <?php endif; ?>
    </div>

    <p class="small" style="color:#8fa2bb;text-align:center;margin-top:16px">
        Prefer the command line? <code>php admin/install.php</code> reads OMNI_DB_* and OMNI_ADMIN_* environment variables.
    </p>
</div>
</div>
</body>
</html>
