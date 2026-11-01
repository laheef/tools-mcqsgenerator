<?php
/**
 * @var array $rows
 * @var array|null $editing
 * @var int $editId
 */

declare(strict_types=1);
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('ONIM_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}


use Onim\Admin\Csrf;

$showForm = request('edit') !== null;
$isNew = $editing === null;
$form = $editing ?? [
    'id' => 0, 'slug' => '', 'name' => '', 'title' => '', 'description' => '', 'icon' => '',
    'meta_title' => '', 'meta_description' => '', 'sort_order' => (count($rows) + 1) * 10,
    'status' => 'published', 'noindex' => 0,
];
?>
<div class="grid <?= $showForm ? 'grid-sidebar' : '' ?>">
    <div class="card">
        <div class="card-head">
            <h2>All categories</h2>
            <span class="spacer"></span>
            <a class="btn btn-sm btn-primary" href="<?= e(admin_url('categories', ['edit' => 'new'])) ?>"><?= admin_icon('plus', 14) ?> New</a>
        </div>
        <div class="table-wrap">
            <table class="data">
                <thead>
                <tr><th>Category</th><th>Slug</th><th class="num">Calculators</th><th>Order</th><th>Status</th><th class="actions">Actions</th></tr>
                </thead>
                <tbody>
                <?php foreach ($rows as $row): ?>
                    <tr class="<?= $editId > 0 && (int) $row['id'] === $editId ? 'is-selected' : '' ?>">
                        <td class="primary">
                            <?= e((string) $row['name']) ?>
                            <?php if (!$row['managed']): ?><span class="badge badge-muted">catalogue only</span><?php endif; ?>
                            <span class="sub"><?= e(str_limit((string) $row['description'], 90)) ?></span>
                        </td>
                        <td class="mono small"><?= e((string) $row['slug']) ?></td>
                        <td class="num"><?= number_format((int) $row['count']) ?></td>
                        <td class="small"><?= (int) $row['sort_order'] ?></td>
                        <td><span class="badge <?= $row['status'] === 'published' ? 'badge-ok' : 'badge-warn' ?>"><?= e((string) $row['status']) ?></span></td>
                        <td class="actions">
                            <a class="btn btn-sm btn-ghost" href="<?= e(admin_url('categories', ['edit' => (int) $row['id']])) ?>" title="Edit"><?= admin_icon('edit', 15) ?></a>
                            <a class="btn btn-sm btn-ghost" href="<?= e(site_link((string) $row['slug'])) ?>" target="_blank" rel="noopener" title="Open"><?= admin_icon('external', 15) ?></a>
                            <?php if ((int) $row['id'] > 0): ?>
                                <form method="post" action="<?= e(admin_url('categories')) ?>" style="display:inline"
                                      data-confirm="Delete the category “<?= e((string) $row['name']) ?>”? Calculators must be moved first.">
                                    <?= Csrf::field() ?>
                                    <input type="hidden" name="do" value="delete">
                                    <input type="hidden" name="id" value="<?= (int) $row['id'] ?>">
                                    <button class="btn btn-sm btn-ghost" type="submit" title="Delete"><?= admin_icon('trash', 15) ?></button>
                                </form>
                            <?php endif; ?>
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
                <h2><?= $isNew ? 'New category' : 'Edit category' ?></h2>
                <span class="spacer"></span>
                <a class="btn btn-sm btn-ghost" href="<?= e(admin_url('categories')) ?>" aria-label="Close"><?= admin_icon('x', 15) ?></a>
            </div>
            <form method="post" action="<?= e(admin_url('categories')) ?>">
                <?= Csrf::field() ?>
                <input type="hidden" name="do" value="save">
                <input type="hidden" name="id" value="<?= (int) $form['id'] ?>">
                <div class="card-body stack">
                    <div class="field">
                        <label for="name">Name</label>
                        <input id="name" name="name" value="<?= e((string) $form['name']) ?>" required data-slug-source data-slug-target="slug">
                    </div>
                    <div class="field">
                        <div class="label-row">
                            <label for="slug">Slug</label>
                            <button class="hint" type="button" data-slugify="name" data-slug-target="slug">generate</button>
                        </div>
                        <input id="slug" name="slug" value="<?= e((string) $form['slug']) ?>" class="mono" required>
                        <div class="hint">Public URL: <code>/<?= e((string) $form['slug']) ?></code></div>
                    </div>
                    <div class="field">
                        <label for="title">Page title (H1)</label>
                        <input id="title" name="title" value="<?= e((string) $form['title']) ?>" placeholder="Math Calculators">
                    </div>
                    <div class="field">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" rows="4"><?= e((string) $form['description']) ?></textarea>
                        <div class="hint">Shown under the heading and used as the default meta description.</div>
                    </div>
                    <div class="field-row">
                        <div class="field">
                            <label for="icon">Icon key</label>
                            <input id="icon" name="icon" value="<?= e((string) $form['icon']) ?>" class="mono" placeholder="math">
                        </div>
                        <div class="field">
                            <label for="sort_order">Order</label>
                            <input id="sort_order" name="sort_order" type="number" value="<?= (int) $form['sort_order'] ?>">
                        </div>
                    </div>
                    <div class="field">
                        <label for="meta_title">SEO title</label>
                        <input id="meta_title" name="meta_title" value="<?= e((string) $form['meta_title']) ?>" maxlength="190">
                    </div>
                    <div class="field">
                        <label for="meta_description">Meta description</label>
                        <textarea id="meta_description" name="meta_description" rows="2" maxlength="320"><?= e((string) $form['meta_description']) ?></textarea>
                    </div>
                    <div class="field-row">
                        <div class="field">
                            <label for="status">Status</label>
                            <select id="status" name="status">
                                <option value="published" <?= $form['status'] === 'published' ? 'selected' : '' ?>>Published</option>
                                <option value="draft" <?= $form['status'] === 'draft' ? 'selected' : '' ?>>Hidden</option>
                            </select>
                        </div>
                        <div class="field">
                            <label>&nbsp;</label>
                            <label class="check"><input type="checkbox" name="noindex" value="1" <?= !empty($form['noindex']) ? 'checked' : '' ?>> <span>noindex</span></label>
                        </div>
                    </div>
                </div>
                <div class="card-foot">
                    <button class="btn btn-primary" type="submit">Save category</button>
                    <a class="btn" href="<?= e(admin_url('categories')) ?>">Cancel</a>
                </div>
            </form>
        </div>
    <?php else: ?>
        <div class="card">
            <div class="card-head"><h2>How categories work</h2></div>
            <div class="card-body">
                <p class="small">A category is the first segment of a calculator URL: <code>/math/percentage</code>. Renaming it
                    changes the heading, breadcrumbs, cards and footer links on the public site.</p>
                <p class="small">Moving a calculator between categories is done in the calculator editor — the old URL is
                    kept alive with an automatic redirect.</p>
                <p class="small muted">A category with no calculators is hidden from the site, even when published. That keeps
                    empty pages out of the sitemap.</p>
            </div>
        </div>
    <?php endif; ?>
</div>
