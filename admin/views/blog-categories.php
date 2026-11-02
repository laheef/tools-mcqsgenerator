<?php
/**
 * @var array $categories
 * @var array|null $editing
 * @var int $unfiled
 */

declare(strict_types=1);
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('ONIM_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}


use Onim\Admin\Csrf;
?>
<div class="grid grid-sidebar">
    <div class="card">
        <div class="card-head">
            <h2>Categories</h2>
            <span class="spacer"></span>
            <span class="muted small"><?= count($categories) ?> total</span>
        </div>
        <div class="table-wrap">
            <table class="data">
                <thead>
                <tr><th style="width:60px" class="num">Order</th><th>Name</th><th>Slug</th><th class="num">Posts</th><th>Description</th><th class="actions">Actions</th></tr>
                </thead>
                <tbody>
                <?php if ($categories === []): ?>
                    <tr><td colspan="6">
                        <div class="empty">
                            <h3>No categories yet</h3>
                            <p class="small">A category is what a reader clicks to browse: Money, Health, Home &amp; DIY. Create the first one on the right.</p>
                        </div>
                    </td></tr>
                <?php endif; ?>
                <?php foreach ($categories as $cat): ?>
                    <tr>
                        <td class="num mono small"><?= (int) $cat['sort_order'] ?></td>
                        <td class="primary"><?= e((string) $cat['name']) ?></td>
                        <td class="mono small">/category/<?= e((string) $cat['slug']) ?></td>
                        <td class="num">
                            <a href="<?= e(admin_url('blog', ['category' => (string) $cat['slug']])) ?>" title="Posts in this category">
                                <?= (int) $cat['posts'] ?>
                            </a>
                        </td>
                        <td class="small muted"><?= e(str_limit((string) $cat['description'], 70)) ?></td>
                        <td class="actions">
                            <a class="btn btn-sm btn-ghost" href="<?= e(site_link('/category/' . (string) $cat['slug'])) ?>"
                               target="_blank" rel="noopener" title="View on the site"><?= admin_icon('external', 15) ?></a>
                            <a class="btn btn-sm btn-ghost" href="<?= e(admin_url('blog-categories', ['edit' => (int) $cat['id']])) ?>" title="Edit"><?= admin_icon('edit', 15) ?></a>
                            <form method="post" action="<?= e(admin_url('blog-categories')) ?>" style="display:inline"
                                  data-confirm="Delete “<?= e((string) $cat['name']) ?>”? <?= (int) $cat['posts'] ?> post(s) keep existing and become unfiled.">
                                <?= Csrf::field() ?>
                                <input type="hidden" name="do" value="delete">
                                <input type="hidden" name="id" value="<?= (int) $cat['id'] ?>">
                                <button class="btn btn-sm btn-ghost" type="submit" title="Delete"><?= admin_icon('trash', 15) ?></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php if ($unfiled > 0): ?>
            <div class="card-body">
                <p class="small muted" style="margin:0">
                    <?= $unfiled ?> post<?= $unfiled === 1 ? ' is' : 's are' ?> not filed under any category.
                    They still appear on <a href="<?= e(site_link('/blog')) ?>" target="_blank" rel="noopener">the index</a>,
                    just without a label.
                </p>
            </div>
        <?php endif; ?>
    </div>

    <div class="card">
        <div class="card-head"><h2><?= $editing === null ? 'New category' : 'Edit category' ?></h2></div>
        <form method="post" action="<?= e(admin_url('blog-categories')) ?>">
            <?= Csrf::field() ?>
            <input type="hidden" name="do" value="save">
            <input type="hidden" name="id" value="<?= (int) ($editing['id'] ?? 0) ?>">
            <div class="card-body stack">
                <div class="field">
                    <label for="name">Name</label>
                    <input id="name" name="name" value="<?= e((string) ($editing['name'] ?? '')) ?>" required
                           maxlength="120" data-slug-source data-slug-target="slug" placeholder="Money">
                </div>
                <div class="field">
                    <label for="slug">Slug</label>
                    <input id="slug" name="slug" value="<?= e((string) ($editing['slug'] ?? '')) ?>" class="mono" maxlength="120"
                           placeholder="money">
                    <div class="hint">The category's page is <code>/category/&lt;slug&gt;</code>.</div>
                </div>
                <div class="field">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" rows="3" maxlength="320"
                              placeholder="What belongs in this category, in one sentence."><?= e((string) ($editing['description'] ?? '')) ?></textarea>
                    <div class="hint">Printed under the heading of the category page.</div>
                </div>
                <div class="field" style="margin-bottom:0">
                    <label for="sort_order">Order</label>
                    <input id="sort_order" name="sort_order" type="number" step="10" min="-999" max="9999"
                           value="<?= (int) ($editing['sort_order'] ?? 10) ?>">
                    <div class="hint">Low numbers first. Categories with the same order sort by name.</div>
                </div>
            </div>
            <div class="card-foot">
                <button class="btn btn-primary" type="submit"><?= $editing === null ? 'Create category' : 'Save category' ?></button>
                <?php if ($editing !== null): ?><a class="btn" href="<?= e(admin_url('blog-categories')) ?>">Cancel</a><?php endif; ?>
            </div>
        </form>
    </div>
</div>
