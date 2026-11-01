<?php
/**
 * @var array $rows
 * @var \Omni\Admin\Pagination $pagination
 * @var array $filters
 * @var array $stats
 * @var array $categories   slug => ['slug','name',…] entries from the catalogue
 */

declare(strict_types=1);
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('OMNI_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}


use Omni\Admin\Csrf;

$base = ['p' => 'calculators'];
$keep = array_filter($filters, static fn ($v) => $v !== '' && $v !== 'name');
?>
<div class="grid grid-4" style="margin-bottom:18px">
    <div class="stat">
        <div class="label">Catalogue</div>
        <div class="value"><?= number_format($stats['total']) ?></div>
        <div class="hint"><?= number_format($stats['published']) ?> published</div>
    </div>
    <div class="stat">
        <div class="label">Edited in the panel</div>
        <div class="value"><?= number_format($stats['overrides']) ?></div>
        <div class="hint">overrides on top of the harvested text</div>
    </div>
    <div class="stat">
        <div class="label">Featured</div>
        <div class="value"><?= number_format($stats['featured']) ?></div>
        <div class="hint">pinned to the homepage list</div>
    </div>
    <div class="stat <?= $stats['missing'] > 0 ? 'is-brand' : '' ?>">
        <div class="label">Missing article file</div>
        <div class="value"><?= number_format($stats['missing']) ?></div>
        <div class="hint"><?= $stats['missing'] === 0 ? 'every page has its prose' : 'needs attention' ?></div>
    </div>
</div>

<div class="card">
    <form method="get" action="<?= e(admin_base() . '/index.php') ?>" class="filters" data-auto-submit>
        <input type="hidden" name="p" value="calculators">
        <div class="field grow">
            <label for="q">Search</label>
            <input id="q" name="q" type="search" value="<?= e($filters['q']) ?>" placeholder="Name, slug or path…">
        </div>
        <div class="field">
            <label for="cat">Category</label>
            <select id="cat" name="cat">
                <option value="">All categories</option>
                <?php foreach ($categories as $cat): ?>
                    <option value="<?= e((string) $cat['slug']) ?>" <?= $filters['cat'] === $cat['slug'] ? 'selected' : '' ?>>
                        <?= e((string) $cat['name']) ?> (<?= (int) $cat['count'] ?>)
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="field">
            <label for="status">Status</label>
            <select id="status" name="status">
                <option value="">Any status</option>
                <?php foreach (['published' => 'Published', 'draft' => 'Draft', 'archived' => 'Archived'] as $key => $label): ?>
                    <option value="<?= $key ?>" <?= $filters['status'] === $key ? 'selected' : '' ?>><?= $label ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="field">
            <label for="flag">Flag</label>
            <select id="flag" name="flag">
                <option value="">None</option>
                <option value="featured" <?= $filters['flag'] === 'featured' ? 'selected' : '' ?>>Featured</option>
                <option value="edited" <?= $filters['flag'] === 'edited' ? 'selected' : '' ?>>Edited in the panel</option>
                <option value="missing" <?= $filters['flag'] === 'missing' ? 'selected' : '' ?>>Missing article file</option>
            </select>
        </div>
        <div class="field">
            <label for="sort">Sort</label>
            <select id="sort" name="sort">
                <?php foreach (['name' => 'Name', 'slug' => 'Slug', 'cat' => 'Category', 'status' => 'Status', 'updated' => 'Recently edited'] as $key => $label): ?>
                    <option value="<?= $key ?>" <?= $filters['sort'] === $key ? 'selected' : '' ?>><?= $label ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="field">
            <button class="btn btn-primary" type="submit">Filter</button>
        </div>
        <?php if ($keep !== []): ?>
            <div class="field">
                <a class="btn btn-ghost" href="<?= e(admin_url('calculators')) ?>">Reset</a>
            </div>
        <?php endif; ?>
    </form>

    <?php
/* Category slug → human name, so the table reads "Math" instead of "math". */
$categoryNames = [];
foreach ($categories as $categoryRow) {
    $categoryNames[(string) $categoryRow['slug']] = (string) $categoryRow['name'];
}
?>
<form method="post" action="<?= e(admin_url('calculators')) ?>" data-bulk-form>
        <?= Csrf::field() ?>
        <?php foreach (['q', 'cat', 'status', 'flag', 'sort'] as $key): ?>
            <input type="hidden" name="<?= $key ?>_back" value="<?= e($filters[$key]) ?>">
        <?php endforeach; ?>
        <input type="hidden" name="pg_back" value="<?= (int) $pagination->page ?>">

        <div class="row" style="padding:12px 18px;border-bottom:1px solid var(--border)">
            <select name="bulk_action" aria-label="Bulk action" style="width:auto">
                <option value="">Bulk action…</option>
                <option value="publish">Publish</option>
                <option value="draft">Move to draft</option>
                <option value="archived">Archive</option>
                <option value="feature">Feature</option>
                <option value="unfeature">Remove from featured</option>
                <option value="revert">Revert to harvested text</option>
            </select>
            <button class="btn" type="submit">Apply to selected</button>
            <span class="spacer"></span>
            <span class="muted small"><?= e($pagination->summary()) ?></span>
        </div>

        <div class="table-wrap">
            <table class="data">
                <thead>
                <tr>
                    <th style="width:36px"><input type="checkbox" data-select-all aria-label="Select all on this page"></th>
                    <th>Calculator</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Article</th>
                    <th>Edited</th>
                    <th class="actions">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php if ($rows === []): ?>
                    <tr>
                        <td colspan="7">
                            <div class="empty">
                                <h3>No calculators match those filters</h3>
                                <p class="small">Try clearing the search or choosing another category.</p>
                                <a class="btn" href="<?= e(admin_url('calculators')) ?>">Reset filters</a>
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>
                <?php foreach ($rows as $row): ?>
                    <tr>
                        <td><input type="checkbox" name="ids[]" value="<?= e($row['sourcePath']) ?>"
                                   aria-label="Select <?= e(\Omni\Data::cleanName((string) $row['name'])) ?>"></td>
                        <td>
                            <a class="primary" href="<?= e(admin_url('calculator-edit', ['path' => $row['sourcePath']])) ?>"><?= e(\Omni\Data::cleanName((string) $row['name'])) ?></a>
                            <span class="sub mono"><?= e($row['path']) ?></span>
                        </td>
                        <td class="small"><?= e($categoryNames[$row['cat']] ?? $row['cat']) ?></td>
                        <td>
                            <span class="badge <?= $row['status'] === 'published' ? 'badge-ok' : ($row['status'] === 'draft' ? 'badge-warn' : 'badge-muted') ?>">
                                <?= e($row['status']) ?>
                            </span>
                            <?php if ($row['featured']): ?><span class="badge badge-brand">featured</span><?php endif; ?>
                            <?php if ($row['hasOverride']): ?><span class="badge badge-muted">edited</span><?php endif; ?>
                        </td>
                        <td>
                            <?php if ($row['hasContent']): ?>
                                <span class="badge badge-ok" title="<?= number_format($row['contentBytes'] / 1024, 1) ?> KB">file ok</span>
                            <?php else: ?>
                                <span class="badge badge-err">missing</span>
                            <?php endif; ?>
                        </td>
                        <td class="small muted nowrap">
                            <?= $row['updatedAt'] ? e(date('j M Y', strtotime((string) $row['updatedAt']))) : '—' ?>
                        </td>
                        <td class="actions">
                            <a class="btn btn-sm btn-ghost" href="<?= e(admin_url('calculator-edit', ['path' => $row['sourcePath']])) ?>" title="Edit"><?= admin_icon('edit', 15) ?></a>
                            <?php if (($row['status'] ?? 'published') === 'published'): ?>
                                <a class="btn btn-sm btn-ghost" href="<?= e(site_link((string) $row['path'])) ?>" target="_blank" rel="noopener" title="Open the public page"><?= admin_icon('external', 15) ?></a>
                            <?php else: ?>
                                <a class="btn btn-sm btn-ghost" href="<?= e(site_link(\Omni\Cms::previewUrl((string) $row['path']))) ?>" target="_blank" rel="noopener" title="Preview this unpublished calculator (signed link)"><?= admin_icon('eye', 15) ?></a>
                            <?php endif; ?>
                            <button class="btn btn-sm btn-ghost" type="submit" name="path" value="<?= e($row['sourcePath']) ?>"
                                    formnovalidate title="<?= $row['status'] === 'published' ? 'Unpublish' : 'Publish' ?>"
                                    onclick="this.form.querySelector('[name=bulk_action]').value='<?= $row['status'] === 'published' ? 'draft' : 'publish' ?>';">
                                <?= admin_icon($row['status'] === 'published' ? 'eye' : 'check', 15) ?>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </form>
    <?= $pagination->render() ?>
</div>

<p class="small muted" style="margin-top:14px">
    Formulas are never edited from this screen — the catalogue shards stay untouched. Everything here is an
    override: name, slug, category, status, SEO, article text, FAQs, related links and ordering.
</p>
