<?php
/**
 * @var array  $rows           custom_calculators rows to show (filtered)
 * @var array  $allRows        every row, for the counters
 * @var array  $stats          ['total','published','draft','archived','review']
 * @var array  $categoryNames  slug => display name
 * @var string $filter         'all' | 'review'
 */

declare(strict_types=1);
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('OMNI_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}


use Omni\Admin\Csrf;

?>
<div class="grid grid-5" style="margin-bottom:18px">
    <div class="stat">
        <div class="label">Custom calculators</div>
        <div class="value"><?= number_format((int) $stats['total']) ?></div>
        <div class="hint">built in the panel, not harvested</div>
    </div>
    <div class="stat">
        <div class="label">Published</div>
        <div class="value"><?= number_format((int) ($stats['published'] ?? 0)) ?></div>
        <div class="hint">live, searchable, in the sitemap</div>
    </div>
    <div class="stat">
        <div class="label">Drafts</div>
        <div class="value"><?= number_format((int) ($stats['draft'] ?? 0)) ?></div>
        <div class="hint">visible only through a signed preview link</div>
    </div>
    <div class="stat">
        <div class="label">Archived</div>
        <div class="value"><?= number_format((int) ($stats['archived'] ?? 0)) ?></div>
        <div class="hint">kept for reference, off the site</div>
    </div>
    <div class="stat">
        <div class="label">Needs review</div>
        <div class="value"><?= number_format((int) ($stats['review'] ?? 0)) ?></div>
        <div class="hint">
            <?php if ((int) ($stats['review'] ?? 0) > 0): ?>
                <a href="<?= e(admin_url('custom-calculators', ['prose' => 'review'])) ?>">article drafted, not yet read</a>
            <?php else: ?>
                every article has been read by a person
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-head">
        <h2><?= $filter === 'review' ? 'Articles waiting to be reviewed' : 'All custom calculators' ?></h2>
        <span class="spacer"></span>
        <?php if ((int) ($stats['review'] ?? 0) > 0 || $filter === 'review'): ?>
            <a class="btn btn-sm <?= $filter === 'review' ? 'btn-primary' : '' ?>"
               href="<?= e(admin_url('custom-calculators', ['prose' => 'review'])) ?>">
                <?= admin_icon('blog', 14) ?> Needs review (<?= (int) ($stats['review'] ?? 0) ?>)
            </a>
        <?php endif; ?>
        <?php if ($filter === 'review'): ?>
            <a class="btn btn-sm btn-ghost" href="<?= e(admin_url('custom-calculators')) ?>">
                Show all (<?= (int) ($stats['total'] ?? 0) ?>)
            </a>
        <?php endif; ?>
        <a class="btn btn-sm" href="<?= e(admin_url('custom-import')) ?>">
            <?= admin_icon('upload', 14) ?> Bulk import
        </a>
        <a class="btn btn-sm btn-primary" href="<?= e(admin_url('custom-calculator-edit', ['id' => 'new'])) ?>">
            <?= admin_icon('plus', 14) ?> New calculator
        </a>
    </div>

    <?php if ($rows === [] && ($filter ?? 'all') === 'review'): ?>
        <div class="card-body">
            <p class="muted" style="margin:0 0 10px">
                Nothing is waiting for review. Every custom article has been opened, read and saved by a person.
            </p>
            <a class="btn btn-sm" href="<?= e(admin_url('custom-calculators')) ?>">Back to all custom calculators</a>
        </div>
    <?php elseif ($rows === []): ?>
        <div class="card-body">
            <p class="muted" style="margin:0 0 10px">
                Nothing here yet. Custom calculators are for tools the harvested catalogue does not cover —
                a new social platform, a game, a niche the site has never had a category for.
            </p>
            <p class="muted small" style="margin:0">
                A finished one behaves exactly like a catalogue calculator: it gets a page, a form, working
                formulas in both directions, an article, FAQ structured data, a sitemap entry and search results.
            </p>
        </div>
    <?php else: ?>
        <div class="table-wrap">
            <table class="data">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Updated</th>
                    <th class="actions">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($rows as $row): ?>
                    <?php
                    $path = '/' . $row['category_slug'] . '/' . $row['slug'];
                    $statusClass = $row['status'] === 'published' ? 'badge-ok' : ($row['status'] === 'draft' ? 'badge-warn' : 'badge-muted');
                    ?>
                    <tr>
                        <td>
                            <a href="<?= e(admin_url('custom-calculator-edit', ['id' => (int) $row['id']])) ?>">
                                <strong><?= e((string) $row['name']) ?></strong>
                            </a>
                            <?php if ((int) $row['is_featured'] === 1): ?>
                                <span class="badge badge-brand"><?= admin_icon('star', 10) ?> Featured</span>
                            <?php endif; ?>
                            <?php if (\Omni\CustomCalc::needsReview($row)): ?>
                                <span class="badge badge-warn"
                                      title="The article was drafted from the definition and has not been read yet">Draft article · unread</span>
                            <?php elseif (trim((string) $row['summary']) === ''): ?>
                                <span class="badge badge-warn" title="No introduction paragraph">No intro</span>
                            <?php endif; ?>
                            <?php if ((int) $row['noindex'] === 1): ?>
                                <span class="badge badge-muted">noindex</span>
                            <?php endif; ?>
                        </td>
                        <td><code><?= e($path) ?></code></td>
                        <td><?= e($categoryNames[(string) $row['category_slug']] ?? (string) $row['category_slug']) ?></td>
                        <td><span class="badge <?= $statusClass ?>"><?= e(ucfirst((string) $row['status'])) ?></span></td>
                        <td class="muted small"><?= e((string) $row['updated_at']) ?></td>
                        <td class="actions">
                            <a class="btn btn-sm <?= \Omni\CustomCalc::needsReview($row) ? 'btn-primary' : '' ?>"
                               href="<?= e(admin_url('custom-calculator-edit', ['id' => (int) $row['id'], 'tab' => 'article'])) ?>">
                                <?= admin_icon('edit', 14) ?> <?= \Omni\CustomCalc::needsReview($row) ? 'Review' : 'Edit' ?>
                            </a>
                            <a class="btn btn-sm btn-ghost" target="_blank" rel="noopener"
                               href="<?= e(site_link($row['status'] === 'published' ? $path : \Omni\Cms::previewUrl($path))) ?>">
                                <?= admin_icon('eye', 14) ?> <?= $row['status'] === 'published' ? 'View' : 'Preview' ?>
                            </a>
                            <form method="post" action="<?= e(admin_url('custom-calculators')) ?>" style="display:inline">
                                <?= Csrf::field() ?>
                                <input type="hidden" name="do" value="duplicate">
                                <input type="hidden" name="id" value="<?= (int) $row['id'] ?>">
                                <button class="btn btn-sm btn-ghost" type="submit" title="Copy as a new draft">
                                    <?= admin_icon('copy', 14) ?>
                                </button>
                            </form>
                            <form method="post" action="<?= e(admin_url('custom-calculators')) ?>" style="display:inline"
                                  data-confirm="<?= $row['status'] === 'published' ? 'This calculator is live. Deleting it removes the page, its sitemap entry and its search result.' : 'Delete' ?> “<?= e((string) $row['name']) ?>” and its version history? This cannot be undone.">
                                <?= Csrf::field() ?>
                                <input type="hidden" name="do" value="delete">
                                <input type="hidden" name="id" value="<?= (int) $row['id'] ?>">
                                <button class="btn btn-sm btn-ghost" type="submit" title="Delete">
                                    <?= admin_icon('trash', 14) ?>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php if ((int) ($stats['published'] ?? 0) > 0): ?>
            <div class="card-body muted small">
                Published entries appear in search, the category page and <code>/sitemap.xml</code> automatically.
                A draft is reachable only through its signed preview link.
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>
