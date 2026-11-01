<?php
/** @var array $user @var array $sessions @var array $myPosts */

declare(strict_types=1);
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('ONIM_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}


use Onim\Admin\Csrf;
?>
<div class="grid grid-2">
    <div class="card">
        <div class="card-head"><h2>Profile</h2></div>
        <form method="post" action="<?= e(admin_url('account')) ?>">
            <?= Csrf::field() ?>
            <input type="hidden" name="do" value="profile">
            <div class="card-body stack">
                <div class="field">
                    <label for="name">Name</label>
                    <input id="name" name="name" value="<?= e((string) $user['name']) ?>" required>
                </div>
                <div class="field">
                    <label for="email">Email</label>
                    <input id="email" value="<?= e((string) $user['email']) ?>" disabled>
                    <div class="hint">An administrator can change your email address.</div>
                </div>
                <div class="field">
                    <label for="bio">Bio</label>
                    <textarea id="bio" name="bio" rows="3" maxlength="500"><?= e((string) $user['bio']) ?></textarea>
                    <div class="hint">Shown under your blog posts.</div>
                </div>
                <dl class="kv">
                    <dt>Role</dt><dd><span class="badge badge-brand"><?= e((string) $user['role']) ?></span></dd>
                    <dt>Last sign-in</dt><dd class="small"><?= $user['last_login_at'] ? e(date('j M Y H:i', strtotime((string) $user['last_login_at']))) : 'never' ?></dd>
                    <dt>IP</dt><dd class="mono small"><?= e((string) $user['last_login_ip']) ?></dd>
                </dl>
            </div>
            <div class="card-foot"><button class="btn btn-primary" type="submit">Save profile</button></div>
        </form>
    </div>

    <div class="card">
        <div class="card-head"><h2>Password</h2></div>
        <form method="post" action="<?= e(admin_url('account')) ?>">
            <?= Csrf::field() ?>
            <input type="hidden" name="do" value="password">
            <div class="card-body stack">
                <div class="field">
                    <label for="current">Current password</label>
                    <input id="current" name="current" type="password" autocomplete="current-password" required>
                </div>
                <div class="field">
                    <label for="password">New password</label>
                    <input id="password" name="password" type="password" autocomplete="new-password" required>
                    <div class="hint">At least 10 characters. A passphrase beats a complicated word.</div>
                </div>
                <div class="field">
                    <label for="password2">Repeat the new password</label>
                    <input id="password2" name="password2" type="password" autocomplete="new-password" required>
                </div>
            </div>
            <div class="card-foot"><button class="btn btn-primary" type="submit">Change password</button></div>
        </form>
    </div>
</div>

<div class="grid grid-2" style="margin-top:18px">
    <div class="card">
        <div class="card-head"><h2>Recent sign-ins</h2></div>
        <div class="card-body is-flush">
            <?php if ($sessions === []): ?>
                <div class="empty"><p class="small">No sign-in history recorded yet.</p></div>
            <?php else: ?>
                <table class="data">
                    <tbody>
                    <?php foreach ($sessions as $row): ?>
                        <tr>
                            <td><span class="badge badge-muted"><?= e((string) $row['action']) ?></span></td>
                            <td class="small"><?= e((string) $row['summary']) ?></td>
                            <td class="mono small muted"><?= e((string) $row['ip']) ?></td>
                            <td class="small muted nowrap"><?= e(date('j M Y H:i', strtotime((string) $row['created_at']))) ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>

    <div class="card">
        <div class="card-head"><h2>Your posts</h2></div>
        <div class="card-body">
            <?php if ($myPosts === []): ?>
                <p class="small muted" style="margin:0">Nothing yet. <a href="<?= e(admin_url('blog-edit')) ?>">Write a post</a>.</p>
            <?php else: ?>
                <ul class="small" style="padding-left:16px;margin:0">
                    <?php foreach ($myPosts as $post): ?>
                        <li style="margin-bottom:6px">
                            <a href="<?= e(admin_url('blog-edit', ['id' => (int) $post['id']])) ?>"><?= e(str_limit((string) $post['title'], 44)) ?></a>
                            <span class="badge badge-muted"><?= e((string) $post['status']) ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</div>
