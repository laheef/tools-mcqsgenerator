<?php
/** @var array $users @var array|null $editing @var array $postCounts */

declare(strict_types=1);
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('OMNI_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}


use Omni\Admin\Csrf;

$showForm = request('edit') !== null;
$row = $editing ?? ['id' => 0, 'name' => '', 'email' => '', 'role' => 'author', 'status' => 'active', 'bio' => '', 'last_login_at' => null];
?>
<div class="grid <?= $showForm ? 'grid-sidebar' : '' ?>">
    <div class="card">
        <div class="card-head"><h2>Accounts</h2><span class="spacer"></span><span class="muted small"><?= count($users) ?> total</span></div>
        <div class="table-wrap">
            <table class="data">
                <thead><tr><th>User</th><th>Role</th><th>Status</th><th class="num">Posts</th><th>Last sign-in</th><th class="actions">Actions</th></tr></thead>
                <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td class="primary">
                            <?= e((string) $user['name']) ?>
                            <?php if ((int) $user['id'] === \Omni\Admin\Auth::id()): ?><span class="badge badge-brand">you</span><?php endif; ?>
                            <span class="sub"><?= e((string) $user['email']) ?></span>
                        </td>
                        <td><span class="badge badge-muted"><?= e((string) $user['role']) ?></span></td>
                        <td><span class="badge <?= $user['status'] === 'active' ? 'badge-ok' : 'badge-err' ?>"><?= e((string) $user['status']) ?></span></td>
                        <td class="num small"><?= (int) ($postCounts[(int) $user['id']] ?? 0) ?></td>
                        <td class="small muted nowrap">
                            <?= $user['last_login_at'] ? e(date('j M Y H:i', strtotime((string) $user['last_login_at']))) : 'never' ?>
                        </td>
                        <td class="actions">
                            <a class="btn btn-sm btn-ghost" href="<?= e(admin_url('users', ['edit' => (int) $user['id']])) ?>" title="Edit"><?= admin_icon('edit', 15) ?></a>
                            <form method="post" action="<?= e(admin_url('users')) ?>" style="display:inline">
                                <?= Csrf::field() ?>
                                <input type="hidden" name="do" value="toggle">
                                <input type="hidden" name="id" value="<?= (int) $user['id'] ?>">
                                <button class="btn btn-sm btn-ghost" type="submit" title="<?= $user['status'] === 'active' ? 'Deactivate' : 'Reactivate' ?>">
                                    <?= admin_icon($user['status'] === 'active' ? 'x' : 'check', 15) ?>
                                </button>
                            </form>
                            <form method="post" action="<?= e(admin_url('users')) ?>" style="display:inline"
                                  data-confirm="Delete <?= e((string) $user['name']) ?>? Their posts are kept.">
                                <?= Csrf::field() ?>
                                <input type="hidden" name="do" value="delete">
                                <input type="hidden" name="id" value="<?= (int) $user['id'] ?>">
                                <button class="btn btn-sm btn-ghost" type="submit" title="Delete"><?= admin_icon('trash', 15) ?></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php if ($showForm): ?>
        <div class="card">
            <div class="card-head">
                <h2><?= $editing === null ? 'New user' : 'Edit user' ?></h2>
                <span class="spacer"></span>
                <a class="btn btn-sm btn-ghost" href="<?= e(admin_url('users')) ?>" aria-label="Close"><?= admin_icon('x', 15) ?></a>
            </div>
            <form method="post" action="<?= e(admin_url('users')) ?>">
                <?= Csrf::field() ?>
                <input type="hidden" name="do" value="save">
                <input type="hidden" name="id" value="<?= (int) $row['id'] ?>">
                <div class="card-body stack">
                    <div class="field">
                        <label for="name">Name</label>
                        <input id="name" name="name" value="<?= e((string) $row['name']) ?>" required>
                    </div>
                    <div class="field">
                        <label for="email">Email (the sign-in name)</label>
                        <input id="email" name="email" type="email" value="<?= e((string) $row['email']) ?>" required>
                    </div>
                    <div class="field-row">
                        <div class="field">
                            <label for="role">Role</label>
                            <select id="role" name="role">
                                <option value="administrator" <?= $row['role'] === 'administrator' ? 'selected' : '' ?>>Administrator — everything</option>
                                <option value="editor" <?= $row['role'] === 'editor' ? 'selected' : '' ?>>Editor — all content</option>
                                <option value="author" <?= $row['role'] === 'author' ? 'selected' : '' ?>>Author — own posts</option>
                            </select>
                        </div>
                        <div class="field">
                            <label for="status">Status</label>
                            <select id="status" name="status">
                                <option value="active" <?= $row['status'] === 'active' ? 'selected' : '' ?>>Active</option>
                                <option value="inactive" <?= $row['status'] === 'inactive' ? 'selected' : '' ?>>Deactivated</option>
                            </select>
                        </div>
                    </div>
                    <div class="field">
                        <label for="bio">Bio (shown on blog posts)</label>
                        <textarea id="bio" name="bio" rows="2" maxlength="500"><?= e((string) $row['bio']) ?></textarea>
                    </div>
                    <div class="field-row">
                        <div class="field">
                            <label for="password"><?= $editing === null ? 'Password' : 'New password' ?></label>
                            <input id="password" name="password" type="password" autocomplete="new-password" <?= $editing === null ? 'required' : '' ?>>
                            <div class="hint"><?= $editing === null ? 'At least 10 characters.' : 'Leave blank to keep the current password.' ?></div>
                        </div>
                        <div class="field">
                            <label for="password2">Repeat</label>
                            <input id="password2" name="password2" type="password" autocomplete="new-password">
                        </div>
                    </div>
                </div>
                <div class="card-foot"><button class="btn btn-primary" type="submit">Save user</button></div>
            </form>
        </div>
    <?php endif; ?>
</div>

<div class="card" style="margin-top:18px">
    <div class="card-head"><h2>What each role can do</h2></div>
    <div class="card-body">
        <table class="data">
            <thead><tr><th>Area</th><th>Administrator</th><th>Editor</th><th>Author</th></tr></thead>
            <tbody>
            <tr><td>Dashboard, own account</td><td>yes</td><td>yes</td><td>yes</td></tr>
            <tr><td>Calculators, categories, source files</td><td>yes</td><td>yes</td><td>no</td></tr>
            <tr><td>Pages, homepage, header, footer, SEO</td><td>yes</td><td>yes</td><td>no</td></tr>
            <tr><td>Blog</td><td>all posts</td><td>all posts</td><td>own posts only</td></tr>
            <tr><td>Media</td><td>yes</td><td>yes</td><td>yes</td></tr>
            <tr><td>Inbox</td><td>yes</td><td>yes</td><td>no</td></tr>
            <tr><td>Appearance, settings, users, backups</td><td>yes</td><td>no</td><td>no</td></tr>
            </tbody>
        </table>
        <p class="small muted" style="margin:12px 0 0">The router enforces this on every request, not just in the sidebar.</p>
    </div>
</div>
