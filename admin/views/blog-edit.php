<?php
/**
 * @var array $form
 * @var array|null $post
 * @var array $allTags
 * @var array $authors
 * @var bool $canManageOthers
 */

declare(strict_types=1);
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('ONIM_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}


use Onim\Admin\Csrf;

$isNew = $post === null;
$publishedValue = $form['published_at'] ? date('Y-m-d\TH:i', strtotime((string) $form['published_at'])) : '';
?>
<form method="post" action="<?= e(admin_url('blog-edit')) ?>" data-track-dirty data-primary-form>
    <?= Csrf::field() ?>
    <input type="hidden" name="do" value="save">
    <input type="hidden" name="id" value="<?= (int) $form['id'] ?>">

    <div class="grid grid-sidebar">
        <div class="stack" style="gap:18px">
            <div class="card">
                <div class="card-body stack">
                    <div class="field">
                        <label for="title">Title</label>
                        <input id="title" name="title" value="<?= e((string) $form['title']) ?>" required
                               data-slug-source data-slug-target="slug" style="font-size:17px;font-weight:600">
                    </div>
                    <div class="field">
                        <div class="label-row">
                            <label for="slug">Slug</label>
                            <span class="hint">/blog/<span id="slug-echo"><?= e((string) $form['slug']) ?></span></span>
                            <button class="hint" type="button" data-slugify="title" data-slug-target="slug">generate</button>
                        </div>
                        <input id="slug" name="slug" value="<?= e((string) $form['slug']) ?>" class="mono">
                    </div>
                    <div class="field">
                        <label for="excerpt">Excerpt</label>
                        <textarea id="excerpt" name="excerpt" rows="2" maxlength="400" data-counter="ex-count"><?= e((string) $form['excerpt']) ?></textarea>
                        <div class="hint" id="ex-count"></div>
                    </div>

                    <div class="editor" data-editor>
                        <div class="editor-toolbar">
                            <button type="button" data-cmd="bold" title="Bold"><strong>B</strong></button>
                            <button type="button" data-cmd="italic" title="Italic"><em>I</em></button>
                            <button type="button" data-cmd="formatBlock" data-value="h2" title="Heading 2">H2</button>
                            <button type="button" data-cmd="formatBlock" data-value="h3" title="Heading 3">H3</button>
                            <button type="button" data-cmd="formatBlock" data-value="p" title="Paragraph">P</button>
                            <button type="button" data-cmd="formatBlock" data-value="blockquote" title="Quote">❝</button>
                            <span class="sep"></span>
                            <button type="button" data-cmd="insertUnorderedList" title="Bulleted list">• List</button>
                            <button type="button" data-cmd="insertOrderedList" title="Numbered list">1. List</button>
                            <button type="button" data-cmd="createLink" title="Link">Link</button>
                            <span class="sep"></span>
                            <button type="button" data-cmd="removeFormat" title="Clear formatting">Clear</button>
                            <button type="button" data-toggle-source title="Edit HTML">HTML</button>
                        </div>
                        <div class="editor-area" contenteditable="true" role="textbox" aria-multiline="true" aria-label="Post content"><?= (string) $form['content'] ?></div>
                        <textarea class="editor-source" hidden aria-label="Post HTML"></textarea>
                        <input type="hidden" name="content" value="<?= e((string) $form['content']) ?>" data-editor-value>
                        <div class="editor-foot"><span data-editor-count></span></div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-head"><h2>Social &amp; search preview</h2></div>
                <div class="card-body stack">
                    <div class="field">
                        <label for="meta_title">SEO title</label>
                        <input id="meta_title" name="meta_title" value="<?= e((string) $form['meta_title']) ?>" maxlength="190" data-counter="mt-count">
                        <div class="hint" id="mt-count"></div>
                    </div>
                    <div class="field">
                        <label for="meta_description">Meta description</label>
                        <textarea id="meta_description" name="meta_description" rows="2" maxlength="320"><?= e((string) $form['meta_description']) ?></textarea>
                    </div>
                    <div class="field">
                        <label for="canonical_url">Canonical override</label>
                        <input id="canonical_url" name="canonical_url" value="<?= e((string) $form['canonical_url']) ?>" placeholder="https://…">
                    </div>
                    <div class="field-row">
                        <div class="field">
                            <label for="og_title">Social title</label>
                            <input id="og_title" name="og_title" value="<?= e((string) $form['og_title']) ?>" maxlength="190" placeholder="Defaults to the SEO title">
                        </div>
                        <div class="field">
                            <label for="og_image">Social image</label>
                            <div class="row tight">
                                <input id="og_image" name="og_image" value="<?= e((string) $form['og_image']) ?>" placeholder="uploads/media/…">
                                <button class="btn btn-sm" type="button" data-media-pick="og_image">Pick</button>
                            </div>
                        </div>
                    </div>
                    <label class="check"><input type="checkbox" name="noindex" value="1" <?= !empty($form['noindex']) ? 'checked' : '' ?>> <span>noindex this post</span></label>
                </div>
            </div>
        </div>

        <div class="stack" style="gap:18px">
            <div class="card">
                <div class="card-head"><h2>Publish</h2></div>
                <div class="card-body stack" style="gap:12px">
                    <button class="btn btn-primary" type="submit"><?= admin_icon('check', 16) ?> Save post</button>
                    <?php if (!$isNew): ?>
                        <?php if (($form['status'] ?? 'draft') === 'published'): ?>
                            <a class="btn" href="<?= e(site_link('blog/' . (string) $form['slug'])) ?>" target="_blank" rel="noopener"><?= admin_icon('eye', 16) ?> View on the site</a>
                        <?php else: ?>
                            <a class="btn" href="<?= e(site_link(\Onim\Cms::previewUrl('/blog/' . (string) $form['slug']))) ?>" target="_blank" rel="noopener"><?= admin_icon('eye', 16) ?> Preview draft (signed link)</a>
                        <?php endif; ?>
                    <?php endif; ?>
                    <div class="field" style="margin:0">
                        <label for="status">Status</label>
                        <select id="status" name="status">
                            <?php foreach (['draft' => 'Draft', 'published' => 'Published', 'scheduled' => 'Scheduled', 'archived' => 'Archived'] as $key => $label): ?>
                                <option value="<?= $key ?>" <?= $form['status'] === $key ? 'selected' : '' ?>><?= $label ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="field" style="margin:0">
                        <label for="published_at">Publish date &amp; time</label>
                        <input id="published_at" name="published_at" type="datetime-local" value="<?= e($publishedValue) ?>">
                        <div class="hint">A future time turns the post into a scheduled one.</div>
                    </div>
                    <?php if ($canManageOthers): ?>
                        <div class="field" style="margin:0">
                            <label for="author_id">Author</label>
                            <select id="author_id" name="author_id">
                                <?php foreach ($authors as $author): ?>
                                    <option value="<?= (int) $author['id'] ?>" <?= (int) $form['author_id'] === (int) $author['id'] ? 'selected' : '' ?>>
                                        <?= e((string) $author['name']) ?> (<?= e((string) $author['role']) ?>)
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="card">
                <div class="card-head"><h2>Cover image</h2></div>
                <div class="card-body stack" style="gap:10px">
                    <div class="row tight">
                        <input id="cover_image" name="cover_image" value="<?= e((string) $form['cover_image']) ?>" placeholder="uploads/media/…">
                        <button class="btn btn-sm" type="button" data-media-pick="cover_image">Pick</button>
                    </div>
                    <?php if (!empty($form['cover_image'])): ?>
                        <img src="<?= e(\Onim\Cms::mediaUrl((string) $form['cover_image'])) ?>" alt="" class="thumbnail" style="width:100%;height:auto" data-preview-for="cover_image">
                    <?php else: ?>
                        <img alt="" class="thumbnail" style="width:100%;height:auto" hidden data-preview-for="cover_image">
                    <?php endif; ?>
                    <div class="field" style="margin:0">
                        <label for="cover_alt">Alt text</label>
                        <input id="cover_alt" name="cover_alt" value="<?= e((string) $form['cover_alt']) ?>" maxlength="255">
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-head"><h2>Tags</h2></div>
                <div class="card-body stack" style="gap:8px">
                    <?php if ($allTags === []): ?>
                        <p class="small muted" style="margin:0">No tags yet — add some below, comma separated.</p>
                    <?php else: ?>
                        <div class="pill-list">
                            <?php foreach ($allTags as $tag): ?>
                                <label class="check" style="font-weight:500">
                                    <input type="checkbox" name="tags[]" value="<?= (int) $tag['id'] ?>"
                                           <?= in_array((int) $tag['id'], $form['tags'] ?? [], true) ? 'checked' : '' ?>>
                                    <span><?= e((string) $tag['name']) ?></span>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <div class="field" style="margin:6px 0 0">
                        <label for="new_tags">Add tags</label>
                        <input id="new_tags" name="new_tags" placeholder="mortgage, how-to, units">
                        <div class="hint">Comma separated; new ones are created.</div>
                    </div>
                </div>
            </div>

            <?php if (!$isNew): ?>
                <div class="card">
                    <div class="card-head"><h2>Details</h2></div>
                    <div class="card-body">
                        <dl class="kv">
                            <dt>Created</dt><dd class="small"><?= e(date('j M Y H:i', strtotime((string) $form['created_at']))) ?></dd>
                            <dt>Updated</dt><dd class="small"><?= e(date('j M Y H:i', strtotime((string) $form['updated_at']))) ?></dd>
                            <dt>Views</dt><dd><?= number_format((int) $form['views']) ?></dd>
                        </dl>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</form>
<script>
(function () {
    var slug = document.getElementById('slug'), echo = document.getElementById('slug-echo');
    if (slug && echo) { slug.addEventListener('input', function () { echo.textContent = slug.value; }); }
})();
</script>
