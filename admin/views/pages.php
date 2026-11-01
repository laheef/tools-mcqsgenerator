<?php
/**
 * @var array $rows
 * @var array|null $editing
 * @var string $search
 */

declare(strict_types=1);
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('OMNI_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}


use Omni\Admin\Csrf;

$isNew = $editing === null;
$form = $editing ?? [
    'id' => 0, 'slug' => '', 'title' => '', 'excerpt' => '', 'content' => '', 'template' => 'default',
    'status' => 'draft', 'meta_title' => '', 'meta_description' => '', 'canonical_url' => '',
    'noindex' => 0, 'show_in_header' => 0, 'show_in_footer' => 1,
];
?>
<div class="grid <?= $editing !== null || request('edit') !== null ? 'grid-sidebar' : '' ?>">
    <div class="card">
        <div class="card-head">
            <h2>All pages</h2>
            <span class="spacer"></span>
            <form method="get" action="<?= e(admin_base() . '/index.php') ?>" class="row tight">
                <input type="hidden" name="p" value="pages">
                <input name="q" type="search" value="<?= e($search) ?>" placeholder="Search pages…" style="max-width:200px">
                <button class="btn btn-sm" type="submit">Search</button>
            </form>
        </div>
        <div class="table-wrap">
            <table class="data">
                <thead><tr><th>Title</th><th>URL</th><th>Status</th><th>In menus</th><th>Updated</th><th class="actions">Actions</th></tr></thead>
                <tbody>
                <?php if ($rows === []): ?>
                    <tr><td colspan="6"><div class="empty">
                        <h3>No pages yet</h3>
                        <p class="small">About, contact, privacy and terms pages ship with the installer — create more here.</p>
                        <a class="btn btn-primary" href="<?= e(admin_url('pages', ['edit' => 'new'])) ?>">Create a page</a>
                    </div></td></tr>
                <?php endif; ?>
                <?php foreach ($rows as $row): ?>
                    <tr>
                        <td class="primary">
                            <a href="<?= e(admin_url('pages', ['edit' => (int) $row['id']])) ?>"><?= e((string) $row['title']) ?></a>
                            <span class="sub"><?= e(str_limit((string) $row['excerpt'], 90)) ?></span>
                        </td>
                        <td class="mono small">/<?= e((string) $row['slug']) ?></td>
                        <td><span class="badge <?= $row['status'] === 'published' ? 'badge-ok' : 'badge-warn' ?>"><?= e((string) $row['status']) ?></span></td>
                        <td class="small">
                            <?= $row['show_in_header'] ? '<span class="badge badge-muted">header</span>' : '' ?>
                            <?= $row['show_in_footer'] ? '<span class="badge badge-muted">footer</span>' : '' ?>
                        </td>
                        <td class="small muted nowrap"><?= e(date('j M Y', strtotime((string) $row['updated_at']))) ?></td>
                        <td class="actions">
                            <a class="btn btn-sm btn-ghost" href="<?= e(site_link((string) $row['slug'])) ?>" target="_blank" rel="noopener" title="View"><?= admin_icon('external', 15) ?></a>
                            <form method="post" action="<?= e(admin_url('pages')) ?>" style="display:inline"
                                  data-confirm="Delete the page “<?= e((string) $row['title']) ?>” permanently?">
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

    <?php if (request('edit') !== null): ?>
        <div class="card">
            <div class="card-head">
                <h2><?= $isNew ? 'New page' : 'Edit page' ?></h2>
                <span class="spacer"></span>
                <a class="btn btn-sm btn-ghost" href="<?= e(admin_url('pages')) ?>" aria-label="Close"><?= admin_icon('x', 15) ?></a>
            </div>
            <form method="post" action="<?= e(admin_url('pages')) ?>" data-track-dirty data-primary-form>
                <?= Csrf::field() ?>
                <input type="hidden" name="do" value="save">
                <input type="hidden" name="id" value="<?= (int) $form['id'] ?>">
                <div class="card-body stack">
                    <div class="field">
                        <label for="title">Title</label>
                        <input id="title" name="title" value="<?= e((string) $form['title']) ?>" required data-slug-source data-slug-target="slug">
                    </div>
                    <div class="field">
                        <div class="label-row">
                            <label for="slug">Slug</label>
                            <button class="hint" type="button" data-slugify="title" data-slug-target="slug">generate</button>
                        </div>
                        <input id="slug" name="slug" value="<?= e((string) $form['slug']) ?>" class="mono" required>
                        <div class="hint">Public URL: <code>/<?= e((string) $form['slug']) ?></code></div>
                    </div>
                    <div class="field">
                        <label for="excerpt">Summary</label>
                        <textarea id="excerpt" name="excerpt" rows="2" maxlength="320"><?= e((string) $form['excerpt']) ?></textarea>
                    </div>

                    <div class="editor" data-editor>
                        <div class="editor-toolbar">
                            <button type="button" data-cmd="bold" title="Bold"><strong>B</strong></button>
                            <button type="button" data-cmd="italic" title="Italic"><em>I</em></button>
                            <button type="button" data-cmd="formatBlock" data-value="h2" title="Heading 2">H2</button>
                            <button type="button" data-cmd="formatBlock" data-value="h3" title="Heading 3">H3</button>
                            <button type="button" data-cmd="formatBlock" data-value="p" title="Paragraph">P</button>
                            <span class="sep"></span>
                            <button type="button" data-cmd="insertUnorderedList" title="Bulleted list">• List</button>
                            <button type="button" data-cmd="insertOrderedList" title="Numbered list">1. List</button>
                            <button type="button" data-cmd="createLink" title="Link">Link</button>
                            <button type="button" data-cmd="unlink" title="Remove link">Unlink</button>
                            <span class="sep"></span>
                            <button type="button" data-cmd="removeFormat" title="Clear formatting">Clear</button>
                            <button type="button" data-toggle-source title="Edit HTML">HTML</button>
                        </div>
                        <div class="editor-area" contenteditable="true" role="textbox" aria-multiline="true" aria-label="Page content"><?= (string) $form['content'] ?></div>
                        <textarea class="editor-source" hidden aria-label="Page HTML"></textarea>
                        <input type="hidden" name="content" value="<?= e((string) $form['content']) ?>" data-editor-value>
                        <div class="editor-foot"><span data-editor-count></span></div>
                    </div>

                    <div class="field-row">
                        <div class="field">
                            <label for="template">Template</label>
                            <select id="template" name="template">
                                <?php foreach (['default' => 'Default', 'contact' => 'Contact form', 'wide' => 'Wide', 'faq' => 'FAQ accordion'] as $key => $label): ?>
                                    <option value="<?= $key ?>" <?= $form['template'] === $key ? 'selected' : '' ?>><?= $label ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="field">
                            <label for="status">Status</label>
                            <select id="status" name="status">
                                <option value="published" <?= $form['status'] === 'published' ? 'selected' : '' ?>>Published</option>
                                <option value="draft" <?= $form['status'] === 'draft' ? 'selected' : '' ?>>Draft</option>
                            </select>
                        </div>
                    </div>

                    <div class="field-row">
                        <div class="field">
                            <label for="meta_title">SEO title</label>
                            <input id="meta_title" name="meta_title" value="<?= e((string) $form['meta_title']) ?>" maxlength="190" data-counter="mt">
                            <div class="hint" id="mt"></div>
                        </div>
                        <div class="field">
                            <label for="canonical_url">Canonical override</label>
                            <input id="canonical_url" name="canonical_url" value="<?= e((string) $form['canonical_url']) ?>" placeholder="https://…">
                        </div>
                    </div>
                    <div class="field">
                        <label for="meta_description">Meta description</label>
                        <textarea id="meta_description" name="meta_description" rows="2" maxlength="320" data-counter="md"><?= e((string) $form['meta_description']) ?></textarea>
                        <div class="hint" id="md"></div>
                    </div>

                    <div class="field-row-3">
                        <label class="check"><input type="checkbox" name="show_in_header" value="1" <?= !empty($form['show_in_header']) ? 'checked' : '' ?>> <span>Link in the header</span></label>
                        <label class="check"><input type="checkbox" name="show_in_footer" value="1" <?= !empty($form['show_in_footer']) ? 'checked' : '' ?>> <span>Link in the footer</span></label>
                        <label class="check"><input type="checkbox" name="noindex" value="1" <?= !empty($form['noindex']) ? 'checked' : '' ?>> <span>noindex</span></label>
                    </div>
                </div>
                <div class="card-foot">
                    <button class="btn btn-primary" type="submit">Save page</button>
                    <?php if (!$isNew): ?>
                        <a class="btn" href="<?= e(site_link((string) $form['slug'])) ?>" target="_blank" rel="noopener">View page</a>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    <?php else: ?>
        <div class="card">
            <div class="card-head"><h2>About pages</h2></div>
            <div class="card-body">
                <p class="small">A page URL is a single segment: <code>/about</code>, <code>/privacy</code>. Slugs are checked
                    against the categories and the router's own paths, so a page cannot take over <code>/math</code> or
                    <code>/search</code>.</p>
                <p class="small">Choose the <strong>Contact form</strong> template on the contact page to get the form wired to
                    the inbox and its field list.</p>
                <p class="small muted">Changing a slug keeps the old address alive with a 301 redirect, created automatically.</p>
            </div>
        </div>
    <?php endif; ?>
</div>
