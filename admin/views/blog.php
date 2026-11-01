<?php
/** @var array $rows @var array $counts @var string $q @var string $status */

declare(strict_types=1);
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('OMNI_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}


use Omni\Admin\Csrf;
?>
<div class="grid grid-4" style="margin-bottom:18px">
    <div class="stat"><div class="label">Published</div><div class="value"><?= number_format($counts['published']) ?></div><div class="hint">live on /blog</div></div>
    <div class="stat"><div class="label">Scheduled</div><div class="value"><?= number_format($counts['scheduled']) ?></div><div class="hint">hidden until their publish time</div></div>
    <div class="stat"><div class="label">Drafts</div><div class="value"><?= number_format($counts['draft']) ?></div><div class="hint">visible only here</div></div>
    <div class="stat"><div class="label">Tags</div><div class="value"><?= number_format((int) \Omni\Db::value('SELECT COUNT(*) FROM tags', [], 0)) ?></div><div class="hint"><a href="<?= e(admin_url('tags')) ?>">manage tags</a></div></div>
</div>

<div class="card">
    <form method="get" action="<?= e(admin_base() . '/index.php') ?>" class="filters" data-auto-submit>
        <input type="hidden" name="p" value="blog">
        <div class="field grow">
            <label for="q">Search</label>
            <input id="q" name="q" type="search" value="<?= e($q) ?>" placeholder="Title or excerpt…">
        </div>
        <div class="field">
            <label for="status">Status</label>
            <select id="status" name="status">
                <option value="">Any</option>
                <?php foreach (['draft' => 'Draft', 'scheduled' => 'Scheduled', 'published' => 'Published', 'archived' => 'Archived'] as $key => $label): ?>
                    <option value="<?= $key ?>" <?= $status === $key ? 'selected' : '' ?>><?= $label ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="field"><button class="btn btn-primary" type="submit">Filter</button></div>
    </form>
    <div class="table-wrap">
        <table class="data">
            <thead><tr><th>Title</th><th>Author</th><th>Status</th><th>Publish date</th><th class="num">Tags</th><th class="actions">Actions</th></tr></thead>
            <tbody>
            <?php if ($rows === []): ?>
                <tr><td colspan="6"><div class="empty">
                    <h3>No posts yet</h3>
                    <p class="small">Publish an article about how one of the calculators works — that is the content that earns links.</p>
                    <a class="btn btn-primary" href="<?= e(admin_url('blog-edit')) ?>">Write the first post</a>
                </div></td></tr>
            <?php endif; ?>
            <?php foreach ($rows as $row): ?>
                <tr>
                    <td class="primary">
                        <a href="<?= e(admin_url('blog-edit', ['id' => (int) $row['id']])) ?>"><?= e((string) $row['title']) ?></a>
                        <span class="sub"><?= e(str_limit((string) $row['excerpt'], 100)) ?></span>
                    </td>
                    <td class="small"><?= e((string) ($row['author'] ?? 'unknown')) ?></td>
                    <td>
                        <?php
                        $badge = match ($row['status']) {
                            'published' => strtotime((string) $row['published_at']) > time() ? 'badge-warn' : 'badge-ok',
                            'draft' => 'badge-warn',
                            default => 'badge-muted',
                        };
                        $label = strtotime((string) $row['published_at']) > time() && $row['status'] === 'published' ? 'scheduled' : (string) $row['status'];
                        ?>
                        <span class="badge <?= $badge ?>"><?= e($label) ?></span>
                    </td>
                    <td class="small muted nowrap"><?= $row['published_at'] ? e(date('j M Y H:i', strtotime((string) $row['published_at']))) : '—' ?></td>
                    <td class="num small"><?= (int) $row['tag_count'] ?></td>
                    <td class="actions">
                        <?php if ($row['status'] === 'published' && strtotime((string) $row['published_at']) <= time()): ?>
                            <a class="btn btn-sm btn-ghost" href="<?= e(site_link('blog/' . (string) $row['slug'])) ?>" target="_blank" rel="noopener" title="Open the live post"><?= admin_icon('eye', 15) ?></a>
                        <?php else: ?>
                            <a class="btn btn-sm btn-ghost" href="<?= e(site_link(\Omni\Cms::previewUrl('/blog/' . (string) $row['slug']))) ?>" target="_blank" rel="noopener" title="Preview this <?= e($label) ?> post (signed link, noindex)"><?= admin_icon('eye', 15) ?></a>
                        <?php endif; ?>
                        <a class="btn btn-sm btn-ghost" href="<?= e(admin_url('blog-edit', ['id' => (int) $row['id']])) ?>" title="Edit"><?= admin_icon('edit', 15) ?></a>
                        <form method="post" action="<?= e(admin_url('blog')) ?>" style="display:inline"
                              data-confirm="Delete “<?= e((string) $row['title']) ?>” permanently?">
                            <?= Csrf::field() ?>
                            <input type="hidden" name="do" value="delete">
                            <input type="hidden" name="id" value="<?= (int) $row['id'] ?>">
                            <button class="btn btn-sm btn-ghost" type="submit" title="Delete"><?= admin_icon('trash', 15) ?></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
