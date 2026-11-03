<?php
/**
 * New tool — the whole job on one page.
 *
 * Order matters and it is the order the owner described: the file first
 * (because everything below is filled from it), then where the page lives, then
 * the article, then the FAQ, then SEO and the libraries the widget needs.
 *
 * There are no tabs here on purpose. The tabbed editor it replaces is for
 * formula calculators, and half of its tabs — Fields, Formulas — are empty for
 * a page whose maths lives in a .php file.
 *
 * @var array<int,array>  $files           valid tool files already on disk
 * @var array<string,string> $folders      folder slug => label
 * @var array<int,array>  $libraries       library rows
 * @var array             $form            values to paint
 * @var array|null        $preset          the file chosen with ?file=
 * @var array<int,string> $declared        libraries the preset declares
 * @var array<string,string> $sectionOptions
 * @var array<string,string> $categoryOptions
 */

declare(strict_types=1);
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('ONIM_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}

use Onim\Admin\Csrf;

?>
<?php require ADMIN_ROOT . '/views/partials/tools-tabs.php'; ?>

<form method="post" action="<?= e(admin_url('tool-new')) ?>" enctype="multipart/form-data" class="tool-new" id="tool-new-form">
    <?= Csrf::field() ?>

    <div class="tool-new-grid">
        <div class="stack" style="gap:18px">

            <!-- 1 --------------------------------------------------- the file -->
            <div class="card">
                <div class="card-head">
                    <h2><span class="step-dot">1</span> The tool file</h2>
                    <span class="spacer"></span>
                    <span class="muted small">the .php that prints the widget</span>
                </div>
                <div class="card-body stack">
                    <?php if ($files === []): ?>
                        <p class="small muted" style="margin:0">No tool files yet — this will be the first one.</p>
                    <?php else: ?>
                        <div class="field">
                            <div class="label-row">
                                <label for="shortcode">Use a file already uploaded</label>
                                <span class="hint"><?= count($files) ?> on disk</span>
                            </div>
                            <select id="shortcode" name="shortcode">
                                <option value="">— upload a new one below —</option>
                                <?php foreach ($files as $file): ?>
                                    <option value="<?= e((string) $file['shortcode']) ?>"
                                            data-name="<?= e((string) $file['name']) ?>"
                                            data-folder="<?= e((string) dirname((string) $file['file'])) ?>"
                                            data-section="<?= e((string) ($file['category'] ?? '')) ?>"
                                            <?= $form['shortcode'] === (string) $file['shortcode'] ? 'selected' : '' ?>>
                                        <?= e((string) $file['name']) ?> · [<?= e((string) $file['shortcode']) ?>] · plugins/<?= e((string) $file['file']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php endif; ?>

                    <div class="field">
                        <div class="label-row">
                            <label for="file">…or upload a new file</label>
                            <span class="hint">.php, up to 2 MB</span>
                        </div>
                        <input type="file" id="file" name="file" accept=".php">
                        <div class="hint">
                            It has to start with a header block naming its shortcode and contain
                            <code>if (!defined('ONIM_TOOLKIT')) exit;</code> — the upload refuses anything that does not.
                        </div>
                    </div>

                    <div class="field">
                        <div class="label-row">
                            <label for="folder">Store it in</label>
                            <span class="hint">the folder on disk, not the page's address</span>
                        </div>
                        <select id="folder" name="folder">
                            <?php foreach ($folders as $slug => $label): ?>
                                <option value="<?= e((string) $slug) ?>">plugins/<?= e((string) $slug) ?>/</option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <?php if ($preset !== null): ?>
                        <div class="tool-file-summary">
                            <div>
                                <strong><?= e((string) $preset['name']) ?></strong>
                                <span class="mono small muted">plugins/<?= e((string) $preset['file']) ?> · <?= number_format((int) $preset['bytes']) ?> bytes<?= (string) $preset['version'] !== '' ? ' · v' . e((string) $preset['version']) : '' ?></span>
                            </div>
                            <a class="btn btn-sm" href="<?= e(admin_url('tool-preview', ['file' => (string) $preset['file']])) ?>" target="_blank" rel="noopener">
                                <?= admin_icon('eye', 14) ?> Preview the widget
                            </a>
                        </div>
                        <?php if ($declared !== []): ?>
                            <p class="small muted" style="margin:0">
                                The file declares <?= count($declared) ?> librar<?= count($declared) === 1 ? 'y' : 'ies' ?>:
                                <?php foreach ($declared as $slug): ?>
                                    <code><?= e($slug) ?></code>
                                <?php endforeach; ?>
                                — attached on save.
                            </p>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>

            <!-- 2 --------------------------------------------------- the page -->
            <div class="card">
                <div class="card-head">
                    <h2><span class="step-dot">2</span> The page</h2>
                    <span class="spacer"></span>
                    <span class="muted small">where it lives and what it is called</span>
                </div>
                <div class="card-body stack">
                    <div class="field-row">
                        <div class="field">
                            <label for="name">Name</label>
                            <input id="name" name="name" value="<?= e((string) $form['name']) ?>" required placeholder="Tip and Bill Splitter">
                            <div class="hint">The heading on the page and the title in every listing.</div>
                        </div>
                        <div class="field">
                            <label for="slug">Address</label>
                            <input id="slug" name="slug" value="<?= e((string) $form['slug']) ?>" placeholder="tip-and-bill-splitter">
                            <div class="hint">Empty means it is built from the name. Becomes <code>/{section}/{slug}</code>.</div>
                        </div>
                    </div>

                    <div class="field-row">
                        <div class="field">
                            <div class="label-row"><label for="section">Section</label><span class="hint">where it is listed</span></div>
                            <select id="section" name="section" required>
                                <option value="">— choose —</option>
                                <?php foreach ($sectionOptions as $slug => $label): ?>
                                    <option value="<?= e((string) $slug) ?>" <?= (string) $form['section'] === (string) $slug ? 'selected' : '' ?>>
                                        <?= e((string) $label) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <div class="hint">A section, a sub-category, or a calculator category.</div>
                        </div>
                        <div class="field">
                            <label for="status">Status</label>
                            <select id="status" name="status">
                                <option value="draft" selected>Draft — nobody can see it yet</option>
                                <option value="published">Published — live as soon as it is saved</option>
                            </select>
                        </div>
                    </div>

                    <div class="field">
                        <label for="summary">One-line summary</label>
                        <input id="summary" name="summary" value="<?= e((string) $form['summary']) ?>" maxlength="300"
                               placeholder="Split a bill and a tip between any number of people.">
                        <div class="hint">Shown under the name in listings and used for the search result.</div>
                    </div>
                </div>
            </div>

            <!-- 3 ------------------------------------------------- the article -->
            <div class="card">
                <div class="card-head">
                    <h2><span class="step-dot">3</span> The article</h2>
                    <span class="spacer"></span>
                    <span class="muted small">one box · HTML is allowed and renders as written</span>
                </div>
                <div class="card-body">
                    <div class="editor" data-editor>
                        <?php $editorLabel = 'Article'; require ADMIN_ROOT . '/views/partials/editor-toolbar.php'; ?>
                        <div class="editor-area" contenteditable="true" role="textbox" aria-multiline="true"
                             aria-label="Article"><?= (string) $form['article'] ?></div>
                        <textarea class="editor-source" hidden aria-label="Article HTML"></textarea>
                        <input type="hidden" class="editor-media" aria-hidden="true" tabindex="-1" value="">
                        <input type="hidden" name="article" value="<?= e((string) $form['article']) ?>" data-editor-value>
                        <div class="editor-foot">
                            <span data-editor-count></span>
                            <span class="muted small" style="margin-left:auto">Each &lt;h2&gt; becomes a section and a table-of-contents entry.</span>
                        </div>
                    </div>
                    <p class="small muted" style="margin:12px 0 0">
                        Write it like a page: a lead paragraph, then <code>H2</code> sections. The editor stores HTML —
                        <code>&lt;table&gt;</code>, <code>&lt;figure&gt;</code>, inline SVG — and the page prints it as it is.
                        The <code>HTML</code> button in the toolbar switches to the source when you need to paste markup.
                    </p>
                </div>
            </div>

            <!-- 4 ----------------------------------------------------- the FAQ -->
            <div class="card">
                <div class="card-head">
                    <h2><span class="step-dot">4</span> FAQ</h2>
                    <span class="spacer"></span>
                    <span class="muted small">optional · becomes FAQ structured data</span>
                </div>
                <div class="card-body">
                    <div class="repeat" id="faq" data-repeat-next="2">
                        <?php for ($i = 0; $i < 2; $i++): ?>
                            <div class="repeat-item">
                                <div class="repeat-head">
                                    <span class="handle" data-repeat-number>#<?= $i + 1 ?></span>
                                    <div class="repeat-actions">
                                        <button class="btn btn-sm btn-ghost" type="button" data-move-up title="Move up"><?= admin_icon('up', 14) ?></button>
                                        <button class="btn btn-sm btn-ghost" type="button" data-move-down title="Move down"><?= admin_icon('down', 14) ?></button>
                                        <button class="btn btn-sm btn-ghost" type="button" data-repeat-remove title="Remove question"><?= admin_icon('trash', 14) ?></button>
                                    </div>
                                </div>
                                <div class="repeat-body">
                                    <div class="field" style="margin:0">
                                        <label for="q<?= $i ?>">Question</label>
                                        <input type="text" id="q<?= $i ?>" name="faq[<?= $i ?>][q]" maxlength="190">
                                    </div>
                                    <div class="field" style="margin:0">
                                        <label for="a<?= $i ?>">Answer</label>
                                        <textarea id="a<?= $i ?>" name="faq[<?= $i ?>][a]" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        <?php endfor; ?>
                        <template data-repeat-template>
                            <div class="repeat-item">
                                <div class="repeat-head">
                                    <span class="handle" data-repeat-number></span>
                                    <div class="repeat-actions">
                                        <button class="btn btn-sm btn-ghost" type="button" data-move-up title="Move up"><?= admin_icon('up', 14) ?></button>
                                        <button class="btn btn-sm btn-ghost" type="button" data-move-down title="Move down"><?= admin_icon('down', 14) ?></button>
                                        <button class="btn btn-sm btn-ghost" type="button" data-repeat-remove title="Remove question"><?= admin_icon('trash', 14) ?></button>
                                    </div>
                                </div>
                                <div class="repeat-body">
                                    <div class="field" style="margin:0">
                                        <label for="q__INDEX__">Question</label>
                                        <input type="text" id="q__INDEX__" name="faq[__INDEX__][q]" maxlength="190">
                                    </div>
                                    <div class="field" style="margin:0">
                                        <label for="a__INDEX__">Answer</label>
                                        <textarea id="a__INDEX__" name="faq[__INDEX__][a]" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                    <button class="btn btn-sm" type="button" data-repeat-add="faq" style="margin-top:12px">
                        <?= admin_icon('plus', 14) ?> Add a question
                    </button>
                </div>
            </div>

            <!-- 5 ----------------------------------------------------- the SEO -->
            <div class="card">
                <div class="card-head">
                    <h2><span class="step-dot">5</span> SEO</h2>
                    <span class="spacer"></span>
                    <span class="muted small">optional · empty means “use the name and summary”</span>
                </div>
                <div class="card-body stack">
                    <div class="field">
                        <label for="meta_title">Search title</label>
                        <input id="meta_title" name="meta_title" value="<?= e((string) $form['meta_title']) ?>" maxlength="190">
                    </div>
                    <div class="field">
                        <label for="meta_description">Search description</label>
                        <textarea id="meta_description" name="meta_description" rows="2" maxlength="320"><?= e((string) $form['meta_description']) ?></textarea>
                    </div>
                    <label class="check" style="display:flex;gap:8px;align-items:center">
                        <input type="checkbox" name="noindex" value="1">
                        <span class="small">Keep this page out of search engines and the sitemap</span>
                    </label>
                </div>
            </div>
        </div>

        <!-- ------------------------------------------------------- the rail -->
        <div class="stack" style="gap:18px">
            <div class="card">
                <div class="card-head"><h2><?= admin_icon('check', 15) ?> Save</h2></div>
                <div class="card-body stack">
                    <p class="small muted" style="margin:0">
                        The page is created with its widget already bound to the shortcode in the file —
                        no second step, nothing to connect afterwards.
                    </p>
                    <button type="submit" class="btn btn-primary" style="justify-content:center">
                        <?= admin_icon('check', 15) ?> Create the tool page
                    </button>
                    <a class="btn" href="<?= e(admin_url('custom-calculators')) ?>" style="justify-content:center">Cancel</a>
                </div>
            </div>

            <div class="card">
                <div class="card-head">
                    <h2><?= admin_icon('download', 15) ?> Libraries</h2>
                    <span class="spacer"></span>
                    <a class="small" href="<?= e(admin_url('libraries')) ?>">Manage</a>
                </div>
                <div class="card-body stack">
                    <?php if ($libraries === []): ?>
                        <p class="small muted" style="margin:0">
                            No libraries yet. A file that declares <code>Libraries: chart-js</code> gets one
                            created automatically on upload.
                        </p>
                    <?php else: ?>
                        <p class="small muted" style="margin:0">Tick what this widget needs. They load in &lt;head&gt; on this page only.</p>
                        <div class="library-picks">
                            <?php foreach ($libraries as $library): ?>
                                <label class="check" style="display:flex;gap:8px;align-items:flex-start">
                                    <input type="checkbox" name="libraries[<?= e((string) $library['slug']) ?>]" value="1"
                                        <?= in_array((string) $library['slug'], $declared, true) ? 'checked' : '' ?>>
                                    <span class="small">
                                        <?= e((string) $library['name']) ?>
                                        <span class="badge <?= (string) $library['kind'] === 'css' ? 'badge-warn' : 'badge-ok' ?>"><?= e((string) $library['kind']) ?></span>
                                        <span class="mono muted" style="display:block;font-size:11px;word-break:break-all"><?= e((string) $library['url']) ?></span>
                                    </span>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <details class="card tools-help">
                <summary><?= admin_icon('info', 15) ?> What happens when you save</summary>
                <div class="card-body stack small" style="line-height:1.6">
                    <p style="margin:0">The file is checked (<code>php -l</code>, header, guard) and stored in <code>plugins/</code>.</p>
                    <p style="margin:0">The page is created at <code>/{section}/{address}</code> with the shortcode bound to it.</p>
                    <p style="margin:0">Each <code>&lt;h2&gt;</code> in the article becomes a section and a table-of-contents entry.</p>
                    <p style="margin:0">Libraries the file declares are attached and printed in &lt;head&gt;.</p>
                </div>
            </details>
        </div>
    </div>
</form>

<script>
/* Picking a file fills the page in: its name becomes the heading, the address
   follows the name, and its folder is preselected for a later upload. Nothing
   is forced — a field the owner has already typed in is left alone. */
(function () {
    var name = document.getElementById('name');
    var slug = document.getElementById('slug');
    var pick = document.getElementById('shortcode');
    var folder = document.getElementById('folder');
    var section = document.getElementById('section');
    var article = document.querySelector('[data-editor] input[name="article"]');
    if (!name || !slug) { return; }

    var slugify = function (text) {
        return text.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-|-$/g, '');
    };
    /* A slug that already equals the name's own slug is still "following" it —
       that is the one the server pre-filled from the chosen file. */
    var slugMine = slug.value.trim() !== '' && slug.value.trim() !== slugify(name.value);
    slug.addEventListener('input', function () { slugMine = slug.value.trim() !== '' && slug.value.trim() !== slugify(name.value); });

    var setSlug = function () {
        if (slugMine) { return; }
        slug.value = slugify(name.value);
    };
    name.addEventListener('input', setSlug);

    if (pick) {
        var lastAuto = '';
        pick.addEventListener('change', function () {
            var option = pick.options[pick.selectedIndex];
            if (!option || !option.value) { return; }
            var text = option.getAttribute('data-name') || '';
            /* Only overwrite a name that is empty or was filled from a file. */
            if (name.value.trim() === '' || name.value.trim() === lastAuto) {
                name.value = text;
                lastAuto = text;
                slugMine = false;
                setSlug();
            }
            var dir = option.getAttribute('data-folder') || '';
            if (folder && dir) {
                for (var i = 0; i < folder.options.length; i++) {
                    if (folder.options[i].value === dir) { folder.selectedIndex = i; break; }
                }
            }
            var sec = option.getAttribute('data-section') || '';
            if (section && sec && section.value === '') {
                for (var j = 0; j < section.options.length; j++) {
                    if (section.options[j].value === sec) { section.selectedIndex = j; break; }
                }
            }
            if (article && article.value === '' && name.value.trim() !== '') {
                var lead = document.querySelector('.editor-area[data-placeholder]');
                if (lead && lead.classList.contains('is-empty')) { lead.setAttribute('aria-label', 'Article'); }
            }
        });
    }
})();
</script>
