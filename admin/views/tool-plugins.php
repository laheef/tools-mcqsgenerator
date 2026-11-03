<?php
/**
 * @var array  $tools           shortcode => tool record
 * @var array  $byCategory      category => tool records
 * @var array  $usage           shortcode => calculator pages using it
 * @var array  $stats           tools, valid, bound, problems
 * @var array  $errors          shortcode => last render error
 * @var array  $categoryOptions slug => label
 * @var string $highlight       shortcode just uploaded
 * @var bool   $missingMigration
 */

declare(strict_types=1);
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('ONIM_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}

use Onim\Admin\Csrf;

/** 4 096 → 4.0 KB */
$size = static function (int $bytes): string {
    if ($bytes < 1024) {
        return $bytes . ' B';
    }
    if ($bytes < 1048576) {
        return number_format($bytes / 1024, 1) . ' KB';
    }
    return number_format($bytes / 1048576, 1) . ' MB';
};
?>
<?php require ADMIN_ROOT . '/views/partials/tools-tabs.php'; ?>

<?php if ($missingMigration): ?>
    <div class="card" style="border-color:var(--warn,#d97706);margin-bottom:18px">
        <div class="card-body">
            <strong>Database not upgraded.</strong>
            <p class="small" style="margin:6px 0 0">
                The tool columns (migration 009) are not applied yet, so a page cannot be bound to a file.
                Run the upgrade on the <a href="<?= e(admin_url('dashboard')) ?>">dashboard</a> first.
            </p>
        </div>
    </div>
<?php endif; ?>

<div class="grid grid-5" style="margin-bottom:18px">
    <div class="stat">
        <div class="label">Tool files</div>
        <div class="value"><?= number_format((int) $stats['tools']) ?></div>
        <div class="hint">in <code>plugins/</code></div>
    </div>
    <div class="stat">
        <div class="label">Ready to use</div>
        <div class="value"><?= number_format((int) $stats['valid']) ?></div>
        <div class="hint">header + syntax check passed</div>
    </div>
    <div class="stat">
        <div class="label">On a page</div>
        <div class="value"><?= number_format((int) $stats['bound']) ?></div>
        <div class="hint">bound to at least one calculator</div>
    </div>
    <div class="stat">
        <div class="label">Waiting</div>
        <div class="value"><?= number_format(max(0, (int) $stats['valid'] - (int) $stats['bound'])) ?></div>
        <div class="hint">uploaded, no page yet</div>
    </div>
    <div class="stat">
        <div class="label">Problems</div>
        <div class="value"><?= number_format((int) $stats['problems']) ?></div>
        <div class="hint">will not render until fixed</div>
    </div>
</div>

<?php foreach ($errors as $shortcode => $message): ?>
    <div class="card" style="border-color:var(--err);margin-bottom:18px">
        <div class="card-body small">
            <strong>Last error in [<?= e((string) $shortcode) ?>]:</strong> <?= e($message) ?>
        </div>
    </div>
<?php endforeach; ?>

<div class="grid grid-sidebar">

    <div class="stack" style="gap:18px">
            <div class="card">
                <div class="card-head"><h2><?= admin_icon('upload', 15) ?> Add a tool file</h2>
                    <span class="spacer"></span>
                    <span class="muted small">uploads and creates nothing else</span></div>
                <form method="post" action="<?= e(admin_url('tool-plugins')) ?>" enctype="multipart/form-data" class="card-body stack">
                    <?= Csrf::field() ?>
                    <input type="hidden" name="do" value="upload">

                    <div class="field">
                        <div class="label-row"><label for="file">PHP file</label></div>
                        <input type="file" id="file" name="file" accept=".php" required>
                        <div class="hint">One self-contained file, up to 2 MB, with a header block naming its shortcode.</div>
                    </div>

                    <div class="field">
                        <div class="label-row">
                            <label for="folder">Folder</label>
                            <span class="hint">where the file is stored</span>
                        </div>
                        <select id="folder" name="folder" required data-folder-select>
                            <option value="">— choose a folder —</option>
                            <?php foreach ($folderOptions as $slug): ?>
                                <option value="<?= e((string) $slug) ?>">plugins/<?= e((string) $slug) ?>/</option>
                            <?php endforeach; ?>
                            <option value="new">＋ New folder…</option>
                        </select>
                        <input id="folder_new" name="folder_new" placeholder="new-folder-name" data-folder-new hidden
                               pattern="[a-z0-9][a-z0-9-]*" title="Lowercase letters, digits and dashes">
                        <div class="hint">
                            Storage only. Pick an existing folder or create one here — a new folder is made on
                            upload, no FTP needed.
                        </div>
                    </div>

                    <div class="field">
                        <div class="label-row">
                            <label for="section">Section</label>
                            <span class="hint">where the tool appears</span>
                        </div>
                        <select id="section" name="section">
                            <?php foreach ($sectionOptions as $slug => $label): ?>
                                <option value="<?= e((string) $slug) ?>" <?= $pickedSection === (string) $slug ? 'selected' : '' ?>>
                                    <?= e((string) $label) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="hint">
                            A group (Audio Tools), one of its subgroups, or a calculator category. The page created
                            from this tool is addressed <code>/{section}/{tool}</code> and listed on that section’s page.
                        </div>
                    </div>

                    <label class="check" style="display:flex;gap:8px;align-items:flex-start">
                        <input type="checkbox" name="replace" value="1">
                        <span class="small">Replace the file if it already exists (the previous version is backed up)</span>
                    </label>

                    <button type="submit" class="btn btn-primary" style="justify-content:center">
                        <?= admin_icon('upload', 15) ?> Upload
                    </button>
                </form>
            </div>

        <?php if ($tools === []): ?>
            <div class="card">
                <div class="empty">
                    <h3>No tool files yet</h3>
                    <p class="small">
                        A tool file is one self-contained PHP file that prints a calculator and registers a
                        shortcode. Upload the first one on the right, or read the header format in
                        <code>plugins/README.md</code>.
                    </p>
                </div>
            </div>
        <?php endif; ?>

        <?php foreach ($byCategory as $category => $group): ?>
            <?php $categoryLabel = $categoryOptions[$category] ?? ucfirst(str_replace('-', ' ', (string) $category)); ?>
            <div class="card">
                <div class="card-head">
                    <h2><?= e($categoryLabel) ?></h2>
                    <span class="spacer"></span>
                    <span class="muted small"><?= count($group) ?> file<?= count($group) === 1 ? '' : 's' ?> · <code>plugins/<?= e((string) $category) ?>/</code></span>
                </div>
                <div class="table-wrap">
                    <table class="data">
                        <thead>
                        <tr>
                            <th>Tool</th>
                            <th>Shortcode</th>
                            <th class="num">Size</th>
                            <th>On a page</th>
                            <th class="actions">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($group as $tool): ?>
                            <?php
                            $shortcode = (string) $tool['shortcode'];
                            $pages     = $usage[$shortcode] ?? [];
                            $isNew     = $highlight !== '' && $highlight === $shortcode;
                            ?>
                            <tr<?= $isNew ? ' style="background:var(--brand-soft,#EBEFFF)"' : '' ?>>
                                <td>
                                    <strong><?= e((string) $tool['name']) ?></strong>
                                    <?php if ($tool['version'] !== ''): ?>
                                        <span class="badge badge-muted">v<?= e((string) $tool['version']) ?></span>
                                    <?php endif; ?>
                                    <?php if (!$tool['valid']): ?>
                                        <span class="badge badge-err">Cannot render</span>
                                    <?php endif; ?>
                                    <?php if ($isNew): ?>
                                        <span class="badge badge-brand">Just uploaded</span>
                                    <?php endif; ?>
                                    <div class="mono small muted"><?= e((string) $tool['file']) ?></div>
                                    <?php if (!$tool['valid']): ?>
                                        <div class="small" style="color:var(--err);margin-top:4px"><?= e((string) $tool['error']) ?></div>
                                    <?php elseif ((string) $tool['description'] !== ''): ?>
                                        <div class="small muted" style="margin-top:4px"><?= e((string) $tool['description']) ?></div>
                                    <?php endif; ?>
                                </td>
                                <td class="mono small" style="white-space:nowrap">[<?= e($shortcode) ?>]</td>
                                <td class="num mono small" style="white-space:nowrap"><?= e($size((int) $tool['bytes'])) ?></td>
                                <td>
                                    <?php if ($pages === []): ?>
                                        <span class="muted small">—</span>
                                    <?php else: ?>
                                        <?php /* Named $boundPage, not $page: the layout is
                                                 rendered after this view in the same scope, and
                                                 it reads $page to highlight the nav item. */ ?>
                                        <?php foreach ($pages as $boundPage): ?>
                                            <?php
                                            $statusClass = (string) $boundPage['status'] === 'published' ? 'badge-ok'
                                                : ((string) $boundPage['status'] === 'draft' ? 'badge-warn' : 'badge-muted');
                                            ?>
                                            <a class="badge <?= $statusClass ?>" style="text-decoration:none"
                                               href="<?= e(admin_url('custom-calculator-edit', ['id' => (int) $boundPage['id']])) ?>"
                                               title="<?= e(ucfirst((string) $boundPage['status'])) ?> — edit this page">
                                                <?= e((string) $boundPage['name']) ?>
                                            </a>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </td>
                                <td class="actions">
                                    <?php if ($tool['valid'] && $pages === []): ?>
                                        <form method="post" action="<?= e(admin_url('tool-plugins')) ?>" style="display:inline">
                                            <?= Csrf::field() ?>
                                            <input type="hidden" name="do" value="create">
                                            <input type="hidden" name="shortcode" value="<?= e($shortcode) ?>">
                                            <input type="hidden" name="category" value="<?= e((string) $category) ?>">
                                            <input type="hidden" name="section" value="<?= e((string) ($pickedSection !== '' ? $pickedSection : $category)) ?>">
                                            <button type="submit" class="btn btn-sm btn-primary" title="Create a draft calculator page for this tool">
                                                <?= admin_icon('plus', 14) ?> Create page
                                            </button>
                                        </form>
                                    <?php endif; ?>
                                    <?php if ($pages !== []): ?>
                                        <a class="btn btn-sm btn-ghost" href="<?= e(admin_url('custom-calculator-edit', ['id' => (int) $pages[0]['id']])) ?>" title="Edit the page">
                                            <?= admin_icon('edit', 15) ?>
                                        </a>
                                    <?php endif; ?>
                                    <a class="btn btn-sm btn-ghost" href="<?= e(admin_url('tool-plugins', ['do' => 'download', 'tool_file' => (string) $tool['file']])) ?>" title="Download the file">
                                        <?= admin_icon('download', 15) ?>
                                    </a>
                                    <form method="post" action="<?= e(admin_url('tool-plugins')) ?>" style="display:inline"
                                          data-confirm="Delete <?= e((string) $tool['file']) ?>? A copy is kept in data/backups/tools.">
                                        <?= Csrf::field() ?>
                                        <input type="hidden" name="do" value="delete">
                                        <input type="hidden" name="tool_file" value="<?= e((string) $tool['file']) ?>">
                                        <?php if ($pages !== []): ?>
                                            <input type="hidden" name="force" value="1">
                                        <?php endif; ?>
                                        <button type="submit" class="btn btn-sm btn-ghost" title="Delete the file">
                                            <?= admin_icon('trash', 15) ?>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endforeach; ?>

        <?php /* Five dense paragraphs of explanation under a list of files is
                 the "too much ambiguity" this screen was reported for. It is
                 still here, in a details block that is closed until asked —
                 the three steps, one line each. */ ?>
        <details class="card tools-help">
            <summary><?= admin_icon('activity', 15) ?> How a file becomes a page — the three steps</summary>
            <div class="card-body stack small" style="line-height:1.6">
                <p style="margin:0"><strong>1. Add the file</strong> above. The panel parses its header, runs
                    <code>php -l</code>, and stores it as <code>plugins/&lt;folder&gt;/qm-tool-&lt;slug&gt;.php</code>.
                    A file that fails either check never reaches disk.</p>
                <p style="margin:0"><strong>2. Create the page</strong> — the button on the file’s row makes a
                    draft with its name, address and section taken from the file.</p>
                <p style="margin:0"><strong>3. Write and publish</strong> it like any other page: summary,
                    sections, FAQ, SEO, sitemap, ad slots.</p>
                <p style="margin:0" class="muted">Replacing a file: upload it again with the same shortcode and
                    tick “replace”. Every page using it updates at once; the old copy stays in
                    <code>data/backups/tools/</code>. A file that a published page still uses cannot be deleted
                    unless you insist.</p>
            </div>
        </details>
    </div>

    <div class="stack" style="gap:18px">
        <div class="card">
            <div class="card-head"><h2><?= admin_icon('code', 15) ?> The file, in short</h2></div>
            <div class="card-body small" style="line-height:1.7">
                <pre class="mono" style="margin:0;white-space:pre-wrap;font-size:11.5px;line-height:1.6">/**
 * Tool Name: Tip and Bill Splitter
 * Shortcode: tool_tip_split
 * Category: finance
 * Version: 1.0.0
 */

if (!defined('ONIM_TOOLKIT')) exit;

Toolkit::addShortcode('tool_tip_split',
  function (array $atts, ?string $inner, array $ctx) {
    return '&lt;div id="' . $ctx['uid'] . '"&gt;…&lt;/div&gt;';
  });</pre>
                <p style="margin:10px 0 0" class="muted">
                    Every id comes from <code>$ctx['uid']</code>, so the same tool can appear twice on a page.
                    Labels go through <code>Toolkit::t()</code> so the tool can be translated later.
                </p>
            </div>
        </div>

        <div class="card">
            <div class="card-head"><h2><?= admin_icon('activity', 15) ?> Folder</h2></div>
            <div class="card-body small">
                <p style="margin:0 0 10px" class="muted">
                    Files added over FTP or by a deployment are picked up automatically. Rescan if a file was
                    changed outside the panel and the list looks stale.
                </p>
                <form method="post" action="<?= e(admin_url('tool-plugins')) ?>">
                    <?= Csrf::field() ?>
                    <input type="hidden" name="do" value="rescan">
                    <button type="submit" class="btn btn-sm" style="width:100%;justify-content:center">
                        <?= admin_icon('activity', 14) ?> Re-scan plugins/
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
/* Show the folder name box only when "New folder" is chosen. */
(function () {
    var select = document.querySelector('[data-folder-select]');
    var input = document.querySelector('[data-folder-new]');
    if (!select || !input) { return; }
    function sync() {
        var isNew = select.value === 'new';
        input.hidden = !isNew;
        input.required = isNew;
        if (isNew) { input.focus(); }
    }
    select.addEventListener('change', sync);
    sync();
})();
</script>
