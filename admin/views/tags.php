<?php
/** @var array $tags @var array|null $editing */

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
        <div class="card-head"><h2>Tags</h2><span class="spacer"></span><span class="muted small"><?= count($tags) ?> total</span></div>
        <div class="table-wrap">
            <table class="data">
                <thead><tr><th>Name</th><th>Slug</th><th class="num">Posts</th><th>Description</th><th class="actions">Actions</th></tr></thead>
                <tbody>
                <?php if ($tags === []): ?>
                    <tr><td colspan="5"><div class="empty"><h3>No tags</h3><p class="small">Tags group posts, e.g. “how-to”.</p></div></td></tr>
                <?php endif; ?>
                <?php foreach ($tags as $tag): ?>
                    <tr>
                        <td class="primary"><?= e((string) $tag['name']) ?></td>
                        <td class="mono small"><?= e((string) $tag['slug']) ?></td>
                        <td class="num"><a href="<?= e(site_link('blog?tag=' . (string) $tag['slug'])) ?>" target="_blank" rel="noopener"><?= (int) $tag['posts'] ?></a></td>
                        <td class="small muted"><?= e(str_limit((string) $tag['description'], 70)) ?></td>
                        <td class="actions">
                            <a class="btn btn-sm btn-ghost" href="<?= e(admin_url('tags', ['edit' => (int) $tag['id']])) ?>" title="Edit"><?= admin_icon('edit', 15) ?></a>
                            <form method="post" action="<?= e(admin_url('tags')) ?>" style="display:inline"
                                  data-confirm="Delete the tag “<?= e((string) $tag['name']) ?>”? Posts stay, only the label is removed.">
                                <?= Csrf::field() ?>
                                <input type="hidden" name="do" value="tag_delete">
                                <input type="hidden" name="id" value="<?= (int) $tag['id'] ?>">
                                <button class="btn btn-sm btn-ghost" type="submit" title="Delete"><?= admin_icon('trash', 15) ?></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card">
        <div class="card-head"><h2><?= $editing === null ? 'New tag' : 'Edit tag' ?></h2></div>
        <form method="post" action="<?= e(admin_url('tags')) ?>">
            <?= Csrf::field() ?>
            <input type="hidden" name="do" value="tag_save">
            <input type="hidden" name="id" value="<?= (int) ($editing['id'] ?? 0) ?>">
            <div class="card-body stack">
                <div class="field">
                    <label for="name">Name</label>
                    <input id="name" name="name" value="<?= e((string) ($editing['name'] ?? '')) ?>" required data-slug-source data-slug-target="slug">
                </div>
                <div class="field">
                    <label for="slug">Slug</label>
                    <input id="slug" name="slug" value="<?= e((string) ($editing['slug'] ?? '')) ?>" class="mono">
                </div>
                <div class="field">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" rows="3" maxlength="320"><?= e((string) ($editing['description'] ?? '')) ?></textarea>
                </div>
            </div>
            <div class="card-foot">
                <button class="btn btn-primary" type="submit"><?= $editing === null ? 'Create tag' : 'Save tag' ?></button>
                <?php if ($editing !== null): ?><a class="btn" href="<?= e(admin_url('tags')) ?>">Cancel</a><?php endif; ?>
            </div>
        </form>
    </div>
</div>
