<?php
/**
 * @var array $row
 * @var array $values
 * @var array<string,string> $errors
 * @var array $categories
 * @var string $publicUrl
 * @var int $words
 * @var array $relatedRows
 */

declare(strict_types=1);
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('OMNI_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}


use Omni\Admin\CalcRepo;
use Omni\Admin\Csrf;

$err = static fn (string $key): string => isset($errors[$key]) ? ' has-error' : '';
$errText = static fn (string $key): string => isset($errors[$key])
    ? '<div class="error">' . e($errors[$key]) . '</div>' : '';

$sections = $values['sections'] ?? [];
$faqs = $values['faq'] ?? [];
$related = $values['related'] ?? [];
$tab = (string) (request('tab') ?? 'content');
?>
<form method="post" action="<?= e(admin_url('calculator-edit', ['path' => $row['sourcePath']])) ?>"
      id="calc-form" data-track-dirty data-primary-form>
    <?= Csrf::field() ?>
    <input type="hidden" name="do" value="save">
    <input type="hidden" name="tab" id="tab-field" value="<?= e($tab) ?>">

    <div class="grid grid-sidebar">
        <div class="stack" style="gap:18px">

            <div class="tabs" data-tabs="calc-panels">
                <button type="button" data-tab="content">Content</button>
                <button type="button" data-tab="faq">FAQ (<?= count($faqs) ?>)</button>
                <button type="button" data-tab="related">Related</button>
                <button type="button" data-tab="seo">SEO</button>
                <button type="button" data-tab="settings">Settings</button>
            </div>

            <div id="calc-panels">
                <!-- ------------------------------------------------ content -->
                <div data-tab-panel="content" class="stack" style="gap:18px">
                    <div class="card">
                        <div class="card-head">
                            <h2>Article</h2>
                            <span class="spacer"></span>
                            <span class="muted small"><?= number_format($words) ?> words in the harvested file</span>
                        </div>
                        <div class="card-body stack">
                            <div class="field">
                                <div class="label-row">
                                    <label for="summary">Introduction</label>
                                    <span class="hint">The first paragraph under the H1</span>
                                </div>
                                <textarea id="summary" name="summary" rows="3"><?= e((string) ($values['summary'] ?? '')) ?></textarea>
                                <div class="hint">Plain prose. Basic tags such as &lt;strong&gt; and &lt;a&gt; are kept.</div>
                            </div>

                            <div class="field">
                                <div class="label-row">
                                    <label>Sections</label>
                                    <span class="hint">Each section becomes an H2 and an entry in the table of contents</span>
                                </div>
                                <div class="repeat" id="sections" data-repeat-next="<?= count($sections) ?>">
                                    <!-- Tells the controller the repeater was on screen, so emptying it
                                         on purpose clears the sections instead of reading as "not posted". -->
                                    <input type="hidden" name="sections_submitted" value="1">
                                    <?php foreach ($sections as $i => $section): ?>
                                        <div class="repeat-item">
                                            <div class="repeat-head">
                                                <span class="handle" data-repeat-number>#<?= $i + 1 ?></span>
                                                <div class="repeat-actions">
                                                    <button class="btn btn-sm btn-ghost" type="button" data-move-up title="Move up"><?= admin_icon('up', 14) ?></button>
                                                    <button class="btn btn-sm btn-ghost" type="button" data-move-down title="Move down"><?= admin_icon('down', 14) ?></button>
                                                    <button class="btn btn-sm btn-ghost" type="button" data-repeat-remove title="Remove section"><?= admin_icon('trash', 14) ?></button>
                                                </div>
                                            </div>
                                            <div class="repeat-body">
                                                <div class="field" style="margin:0">
                                                    <label for="sec-<?= $i ?>-title">Heading</label>
                                                    <input id="sec-<?= $i ?>-title" name="sections[<?= $i ?>][title]" value="<?= e((string) $section['title']) ?>" maxlength="190">
                                                </div>
                                                <div class="editor" data-editor>
                                                    <div class="editor-toolbar">
                                                        <button type="button" data-cmd="bold" title="Bold"><strong>B</strong></button>
                                                        <button type="button" data-cmd="italic" title="Italic"><em>I</em></button>
                                                        <button type="button" data-cmd="formatBlock" data-value="h3" title="Subheading">H3</button>
                                                        <span class="sep"></span>
                                                        <button type="button" data-cmd="insertUnorderedList" title="Bulleted list">• List</button>
                                                        <button type="button" data-cmd="insertOrderedList" title="Numbered list">1. List</button>
                                                        <button type="button" data-cmd="createLink" title="Link">Link</button>
                                                        <span class="sep"></span>
                                                        <button type="button" data-cmd="removeFormat" title="Clear formatting">Clear</button>
                                                        <button type="button" data-toggle-source title="Edit HTML">HTML</button>
                                                    </div>
                                                    <div class="editor-area" contenteditable="true" role="textbox" aria-multiline="true"
                                                         aria-label="Section body <?= $i + 1 ?>"><?= (string) $section['html'] ?></div>
                                                    <textarea class="editor-source" hidden aria-label="Section HTML"></textarea>
                                                    <input type="hidden" name="sections[<?= $i ?>][html]" value="<?= e((string) $section['html']) ?>">
                                                    <div class="editor-foot"><span data-editor-count></span></div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                    <template data-repeat-template>
                                        <div class="repeat-item">
                                            <div class="repeat-head">
                                                <span class="handle" data-repeat-number></span>
                                                <div class="repeat-actions">
                                                    <button class="btn btn-sm btn-ghost" type="button" data-move-up title="Move up"><?= admin_icon('up', 14) ?></button>
                                                    <button class="btn btn-sm btn-ghost" type="button" data-move-down title="Move down"><?= admin_icon('down', 14) ?></button>
                                                    <button class="btn btn-sm btn-ghost" type="button" data-repeat-remove title="Remove section"><?= admin_icon('trash', 14) ?></button>
                                                </div>
                                            </div>
                                            <div class="repeat-body">
                                                <div class="field" style="margin:0">
                                                    <label>Heading</label>
                                                    <input name="sections[__INDEX__][title]" maxlength="190">
                                                </div>
                                                <div class="editor" data-editor>
                                                    <div class="editor-toolbar">
                                                        <button type="button" data-cmd="bold" title="Bold"><strong>B</strong></button>
                                                        <button type="button" data-cmd="italic" title="Italic"><em>I</em></button>
                                                        <button type="button" data-cmd="formatBlock" data-value="h3" title="Subheading">H3</button>
                                                        <span class="sep"></span>
                                                        <button type="button" data-cmd="insertUnorderedList" title="Bulleted list">• List</button>
                                                        <button type="button" data-cmd="insertOrderedList" title="Numbered list">1. List</button>
                                                        <button type="button" data-cmd="createLink" title="Link">Link</button>
                                                        <span class="sep"></span>
                                                        <button type="button" data-cmd="removeFormat" title="Clear formatting">Clear</button>
                                                        <button type="button" data-toggle-source title="Edit HTML">HTML</button>
                                                    </div>
                                                    <div class="editor-area" contenteditable="true" role="textbox" aria-multiline="true"></div>
                                                    <textarea class="editor-source" hidden aria-label="Section HTML"></textarea>
                                                    <input type="hidden" name="sections[__INDEX__][html]" value="">
                                                    <div class="editor-foot"><span data-editor-count></span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                                <div class="row" style="margin-top:10px">
                                    <button class="btn btn-sm" type="button" data-repeat-add="sections"><?= admin_icon('plus', 14) ?> Add a section</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ---------------------------------------------------- faq -->
                <div data-tab-panel="faq" hidden>
                    <div class="card">
                        <div class="card-head">
                            <h2>Frequently asked questions</h2>
                            <span class="spacer"></span>
                            <span class="muted small">Rendered as an accordion and as FAQPage structured data</span>
                        </div>
                        <div class="card-body">
                            <div class="repeat" id="faq" data-repeat-next="<?= count($faqs) ?>">
                                <input type="hidden" name="faq_submitted" value="1">
                                <?php foreach ($faqs as $i => $pair): ?>
                                    <div class="repeat-item">
                                        <div class="repeat-head">
                                            <span class="handle" data-repeat-number>#<?= $i + 1 ?></span>
                                            <div class="repeat-actions">
                                                <button class="btn btn-sm btn-ghost" type="button" data-move-up title="Move up"><?= admin_icon('up', 14) ?></button>
                                                <button class="btn btn-sm btn-ghost" type="button" data-move-down title="Move down"><?= admin_icon('down', 14) ?></button>
                                                <button class="btn btn-sm btn-ghost" type="button" data-repeat-remove title="Remove"><?= admin_icon('trash', 14) ?></button>
                                            </div>
                                        </div>
                                        <div class="repeat-body">
                                            <div class="field" style="margin:0">
                                                <label>Question</label>
                                                <input name="faq[<?= $i ?>][q]" value="<?= e((string) $pair['q']) ?>" maxlength="190">
                                            </div>
                                            <div class="field" style="margin:0">
                                                <label>Answer</label>
                                                <textarea name="faq[<?= $i ?>][a]" rows="3"><?= e((string) $pair['a']) ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <template data-repeat-template>
                                    <div class="repeat-item">
                                        <div class="repeat-head">
                                            <span class="handle" data-repeat-number></span>
                                            <div class="repeat-actions">
                                                <button class="btn btn-sm btn-ghost" type="button" data-move-up>Move up</button>
                                                <button class="btn btn-sm btn-ghost" type="button" data-repeat-remove>Remove</button>
                                            </div>
                                        </div>
                                        <div class="repeat-body">
                                            <div class="field" style="margin:0">
                                                <label>Question</label>
                                                <input name="faq[__INDEX__][q]" maxlength="190">
                                            </div>
                                            <div class="field" style="margin:0">
                                                <label>Answer</label>
                                                <textarea name="faq[__INDEX__][a]" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                            <div class="row" style="margin-top:10px">
                                <button class="btn btn-sm" type="button" data-repeat-add="faq"><?= admin_icon('plus', 14) ?> Add a question</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ------------------------------------------------ related -->
                <div data-tab-panel="related" hidden>
                    <div class="card">
                        <div class="card-head">
                            <h2>Related calculators</h2>
                            <span class="spacer"></span>
                            <span class="muted small">Leave empty to keep the automatic similarity picks</span>
                        </div>
                        <div class="card-body">
                            <?php if ($relatedRows !== []): ?>
                                <p class="small muted">Currently overridden with:</p>
                                <ul class="small">
                                    <?php foreach ($relatedRows as $rel): ?>
                                        <li><a href="<?= e(admin_url('calculator-edit', ['path' => $rel['sourcePath']])) ?>"><?= e($rel['name']) ?></a>
                                            <span class="mono muted"><?= e($rel['path']) ?></span></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                            <div class="repeat" id="related" data-repeat-next="<?= max(3, count($related)) ?>">
                                <input type="hidden" name="related_submitted" value="1">
                                <?php foreach (array_pad($related, 3, '') as $i => $relPath): ?>
                                    <div class="repeat-item">
                                        <div class="repeat-head">
                                            <span class="handle" data-repeat-number>#<?= $i + 1 ?></span>
                                            <div class="repeat-actions">
                                                <button class="btn btn-sm btn-ghost" type="button" data-move-up title="Move up"><?= admin_icon('up', 14) ?></button>
                                                <button class="btn btn-sm btn-ghost" type="button" data-move-down title="Move down"><?= admin_icon('down', 14) ?></button>
                                            </div>
                                        </div>
                                        <div class="repeat-body">
                                            <div class="field" style="margin:0">
                                                <label>Calculator path</label>
                                                <input name="related[<?= $i ?>]" value="<?= e($relPath) ?>" placeholder="/math/percentage" class="mono">
                                                <div class="hint">Copy the path from the calculator list. Up to 8 links.</div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <template data-repeat-template>
                                    <div class="repeat-item">
                                        <div class="repeat-head">
                                            <span class="handle" data-repeat-number></span>
                                            <div class="repeat-actions">
                                                <button class="btn btn-sm btn-ghost" type="button" data-move-up>Move up</button>
                                            </div>
                                        </div>
                                        <div class="repeat-body">
                                            <div class="field" style="margin:0">
                                                <label>Calculator path</label>
                                                <input name="related[__INDEX__]" placeholder="/math/percentage" class="mono">
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                            <div class="row" style="margin-top:10px">
                                <button class="btn btn-sm" type="button" data-repeat-add="related"><?= admin_icon('plus', 14) ?> Add a link</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ---------------------------------------------------- seo -->
                <div data-tab-panel="seo" hidden>
                    <div class="card">
                        <div class="card-head"><h2>Search engine listing</h2></div>
                        <div class="card-body stack">
                            <div class="field<?= $err('meta_title') ?>">
                                <div class="label-row">
                                    <label for="meta_title">SEO title</label>
                                    <span class="hint" id="title-count"></span>
                                </div>
                                <input id="meta_title" name="meta_title" value="<?= e((string) ($values['meta_title'] ?? '')) ?>"
                                       maxlength="190" data-counter="title-count">
                                <?= $errText('meta_title') ?>
                                <div class="hint">Aim for 50–60 characters. The brand suffix is added automatically.</div>
                            </div>
                            <div class="field<?= $err('meta_description') ?>">
                                <div class="label-row">
                                    <label for="meta_description">Meta description</label>
                                    <span class="hint" id="desc-count"></span>
                                </div>
                                <textarea id="meta_description" name="meta_description" rows="3" maxlength="320"
                                          data-counter="desc-count"><?= e((string) ($values['meta_description'] ?? '')) ?></textarea>
                                <?= $errText('meta_description') ?>
                                <div class="hint">Aim for 140–158 characters; the site truncates at 158.</div>
                            </div>
                            <div class="field<?= $err('canonical_url') ?>">
                                <label for="canonical_url">Canonical URL override</label>
                                <input id="canonical_url" name="canonical_url" value="<?= e((string) ($values['canonical_url'] ?? '')) ?>"
                                       placeholder="https://example.com/math/percentage">
                                <?= $errText('canonical_url') ?>
                                <div class="hint">Leave blank for the self-referencing canonical. Use only for genuine duplicates.</div>
                            </div>
                            <label class="check">
                                <input type="checkbox" name="noindex" value="1" <?= !empty($values['noindex']) ? 'checked' : '' ?>>
                                <span>Hide from search engines (<code>noindex, follow</code>)
                                    <span class="muted small" style="display:block">Canonical and sitemap entries are removed as well.</span>
                                </span>
                            </label>
                            <div class="field">
                                <label for="h1">On-page heading (H1)</label>
                                <input id="h1" name="h1" value="<?= e((string) ($values['h1'] ?? '')) ?>" maxlength="190">
                                <div class="hint">Shown at the top of the page. The SEO title above is what Google shows.</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ----------------------------------------------- settings -->
                <div data-tab-panel="settings" hidden>
                    <div class="card">
                        <div class="card-head"><h2>Identity and placement</h2></div>
                        <div class="card-body">
                            <div class="field-row">
                                <div class="field<?= $err('name') ?>">
                                    <label for="name">Name</label>
                                    <input id="name" name="name" value="<?= e((string) ($values['name'] ?? '')) ?>"
                                           data-slug-source data-slug-target="slug" maxlength="190">
                                    <?= $errText('name') ?>
                                </div>
                                <div class="field<?= $err('slug') ?>">
                                    <div class="label-row">
                                        <label for="slug">Slug</label>
                                        <button class="hint" type="button" data-slugify="name" data-slug-target="slug">generate</button>
                                    </div>
                                    <input id="slug" name="slug" value="<?= e((string) ($values['slug'] ?? '')) ?>"
                                           data-initial="<?= e((string) ($values['slug'] ?? '')) ?>" maxlength="120" class="mono">
                                    <?= $errText('slug') ?>
                                    <div class="hint">Public URL: <code>/<?= e((string) ($values['category_slug'] ?? '')) ?>/<span id="slug-echo"><?= e((string) ($values['slug'] ?? '')) ?></span></code></div>
                                </div>
                            </div>
                            <div class="field-row">
                                <div class="field<?= $err('category_slug') ?>">
                                    <label for="category_slug">Category</label>
                                    <select id="category_slug" name="category_slug">
                                        <?php foreach ($categories as $cat): ?>
                                            <option value="<?= e((string) $cat['slug']) ?>" <?= ($values['category_slug'] ?? '') === $cat['slug'] ? 'selected' : '' ?>>
                                                <?= e((string) $cat['name']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= $errText('category_slug') ?>
                                </div>
                                <div class="field">
                                    <label for="status">Status</label>
                                    <select id="status" name="status">
                                        <?php foreach (['published' => 'Published', 'draft' => 'Draft', 'archived' => 'Archived'] as $key => $label): ?>
                                            <option value="<?= $key ?>" <?= ($values['status'] ?? 'published') === $key ? 'selected' : '' ?>><?= $label ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="hint">Draft and archived pages return 404 to visitors and leave the sitemap.</div>
                                </div>
                            </div>
                            <div class="field-row">
                                <div class="field">
                                    <label for="sort_order">Sort order</label>
                                    <input id="sort_order" name="sort_order" type="number" value="<?= e((string) ($values['sort_order'] ?? '0')) ?>">
                                    <div class="hint">Lower numbers come first in category listings.</div>
                                </div>
                                <div class="field">
                                    <label for="icon">Icon key</label>
                                    <input id="icon" name="icon" value="<?= e((string) ($values['icon'] ?? '')) ?>" maxlength="80" class="mono">
                                    <div class="hint">Optional. Blank keeps the category icon.</div>
                                </div>
                            </div>
                            <label class="check" style="margin-bottom:14px">
                                <input type="checkbox" name="is_featured" value="1" <?= !empty($values['is_featured']) ? 'checked' : '' ?>>
                                <span>Feature this calculator on the homepage</span>
                            </label>

                            <div class="field">
                                <label for="thumbnail">Thumbnail / social image</label>
                                <div class="row">
                                    <input id="thumbnail" name="thumbnail" value="<?= e((string) ($values['thumbnail'] ?? '')) ?>" placeholder="uploads/media/2026/10/example.jpg">
                                    <button class="btn" type="button" data-media-pick="thumbnail">Choose from media</button>
                                </div>
                                <?php if (!empty($values['thumbnail'])): ?>
                                    <img src="<?= e(\Omni\Cms::mediaUrl((string) $values['thumbnail'])) ?>" alt="" class="thumbnail" style="width:120px;height:auto;margin-top:10px"
                                         data-preview-for="thumbnail">
                                <?php else: ?>
                                    <img alt="" class="thumbnail" style="width:120px;height:auto;margin-top:10px" hidden data-preview-for="thumbnail">
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="stack" style="gap:18px">
            <div class="card">
                <div class="card-head"><h2>Publish</h2></div>
                <div class="card-body stack" style="gap:10px">
                    <button class="btn btn-primary" type="submit"><?= admin_icon('check', 16) ?> Save changes</button>
                    <?php if (($values['status'] ?? 'published') === 'published'): ?>
                        <a class="btn" href="<?= e(site_link($publicUrl)) ?>" target="_blank" rel="noopener">
                            <?= admin_icon('external', 16) ?> Open live page
                        </a>
                    <?php else: ?>
                        <a class="btn" href="<?= e(site_link(\Omni\Cms::previewUrl('/' . ltrim($publicUrl, '/')))) ?>" target="_blank" rel="noopener">
                            <?= admin_icon('eye', 16) ?> Preview unpublished (signed link)
                        </a>
                    <?php endif; ?>
                    <p class="small muted" style="margin:0">⌘/Ctrl + S saves too.</p>
                    <?php if (!empty($values['is_override'])): ?>
                        <hr style="margin:8px 0">
                        <button class="btn btn-danger" type="submit" name="do" value="reset"
                                formnovalidate data-confirm="Discard every panel edit for this calculator and go back to the harvested text?">
                            <?= admin_icon('trash', 16) ?> Revert to harvested text
                        </button>
                        <p class="small muted" style="margin:0">Removes the override row. Formulas, URL and the article file stay exactly as they are.</p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="card">
                <div class="card-head"><h2>Details</h2></div>
                <div class="card-body">
                    <dl class="kv">
                        <dt>Catalogue path</dt><dd class="mono small"><?= e($row['sourcePath']) ?></dd>
                        <dt>Public URL</dt><dd class="mono small">/<?= e($publicUrl) ?></dd>
                        <dt>Catalogue name</dt><dd class="small"><?= e($row['name']) ?></dd>
                        <dt>Article file</dt>
                        <dd>
                            <?php if ($row['hasContent']): ?>
                                <span class="badge badge-ok">present</span>
                                <span class="muted small"><?= number_format($row['contentBytes'] / 1024, 1) ?> KB</span>
                            <?php else: ?>
                                <span class="badge badge-err">missing</span>
                            <?php endif; ?>
                        </dd>
                        <dt>Status</dt><dd><span class="badge <?= ($values['status'] ?? '') === 'published' ? 'badge-ok' : 'badge-warn' ?>"><?= e((string) ($values['status'] ?? '')) ?></span></dd>
                        <dt>Last edit</dt><dd class="small"><?= $row['updatedAt'] ? e(date('j M Y H:i', strtotime((string) $row['updatedAt']))) : 'never (harvested text)' ?></dd>
                    </dl>
                </div>
            </div>

            <div class="card">
                <div class="card-head"><h2>Interesting neighbours</h2></div>
                <div class="card-body">
                    <p class="small muted">The automatic similarity picks, for inspiration when choosing related links.</p>
                    <ul class="small" style="padding-left:16px;margin:0">
                        <?php
                        $auto = \Omni\Data::related($row['sourcePath'], $row['cat'], 5);
                        foreach ($auto as $item): ?>
                            <li style="margin-bottom:4px">
                                <a href="<?= e(admin_url('calculator-edit', ['path' => (string) ($item['sourcePath'] ?? $item['path'] ?? '')])) ?>"><?= e((string) $item['name']) ?></a>
                                <button class="btn btn-sm btn-ghost" type="button"
                                        onclick="var i=document.querySelector('[name^=related]');if(i){i.value='<?= e((string) ($item['path'] ?? '')) ?>';}">
                                    use
                                </button>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
// keep the URL preview in the settings tab in sync with the slug field
(function () {
    var slug = document.getElementById('slug');
    var echo = document.getElementById('slug-echo');
    if (slug && echo) {
        slug.addEventListener('input', function () { echo.textContent = slug.value; });
    }
})();
</script>
