<?php
/**
 * Tool libraries — the list of scripts and stylesheets a tool page may load.
 *
 * @var array<int,array> $rows     every library
 * @var array<string,int> $usage   slug => how many pages load it
 * @var array|null       $editing  the row being edited, or null
 * @var array            $form     values to paint into the form
 * @var bool             $missingMigration
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

<?php if (!empty($missingMigration)): ?>
    <div class="card">
        <div class="empty">
            <h3>Libraries need one more migration</h3>
            <p class="small">Run the installer, or paste <code>admin/migrations/015_tool_libraries.sql</code> into phpMyAdmin.</p>
        </div>
    </div>
<?php else: ?>

<div class="library-grid">
    <div class="stack" style="gap:18px">
        <div class="card">
            <div class="card-head">
                <h2>Libraries</h2>
                <span class="spacer"></span>
                <span class="muted small"><?= count($rows) ?> row<?= count($rows) === 1 ? '' : 's' ?> · printed in &lt;head&gt; for the pages that pick them</span>
            </div>

            <?php if ($rows === []): ?>
                <div class="empty">
                    <h3>No libraries yet</h3>
                    <p class="small">
                        Add Chart.js, KaTeX or your own script on the right. A tool file can also
                        declare them — <code>* Libraries: chart-js</code> — and they appear here on upload.
                    </p>
                </div>
            <?php else: ?>
                <div class="table-wrap">
                    <table class="data libraries-table">
                        <thead>
                        <tr>
                            <th>Library</th>
                            <th>Address</th>
                            <th>Type</th>
                            <th class="num">Pages</th>
                            <th class="actions">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($rows as $row): ?>
                            <tr>
                                <td class="primary">
                                    <?= e((string) $row['name']) ?>
                                    <?php if ((int) $row['auto'] === 1): ?>
                                        <span class="badge badge-muted">found in a tool</span>
                                    <?php endif; ?>
                                    <span class="sub"><code><?= e((string) $row['slug']) ?></code><?php if ((string) $row['notes'] !== ''): ?> · <?= e((string) $row['notes']) ?><?php endif; ?></span>
                                </td>
                                <td class="mono small" style="max-width:320px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap">
                                    <a href="<?= e((string) $row['url']) ?>" target="_blank" rel="noopener"><?= e((string) $row['url']) ?></a>
                                </td>
                                <td><span class="badge <?= (string) $row['kind'] === 'css' ? 'badge-warn' : 'badge-ok' ?>"><?= e((string) $row['kind']) ?></span></td>
                                <td class="num"><?= (int) ($usage[(string) $row['slug']] ?? 0) ?></td>
                                <td class="actions">
                                    <a class="btn btn-sm btn-ghost" href="<?= e(admin_url('libraries', ['edit' => (int) $row['id']])) ?>" title="Edit"><?= admin_icon('edit', 15) ?></a>
                                    <form method="post" action="<?= e(admin_url('libraries')) ?>" style="display:inline"
                                          data-confirm="Delete “<?= e((string) $row['name']) ?>”? Pages that load it will stop loading it.">
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
            <?php endif; ?>
        </div>

        <details class="card tools-help"<?= $editing === null && $rows === [] ? ' open' : '' ?>>
            <summary><?= admin_icon('info', 15) ?> How a tool asks for a library</summary>
            <div class="card-body stack small" style="line-height:1.65">
                <p style="margin:0">
                    Put the names in the tool file's header block, one line, comma separated:
                </p>
                <pre class="mono" style="margin:0;white-space:pre-wrap;font-size:12px">/**
 * Tool Name: Mortgage Payoff Chart
 * Shortcode: tool_mortgage_chart
 * Libraries: chart-js
 */</pre>
                <p style="margin:0">
                    Uploading that file creates the Chart.js row here (if it is missing) and
                    ticks it on the page the file becomes. A full address works too —
                    <code>* Libraries: https://cdn.example.com/lib.min.js</code> — and so does any
                    <code>.js</code>/<code>.css</code> address found in the file's opening comment.
                </p>
                <p style="margin:0" class="muted">
                    Libraries print in &lt;head&gt;: stylesheets first, then scripts with <code>defer</code>,
                    so a widget never runs before the library that renders it.
                </p>
            </div>
        </details>
    </div>

    <div class="stack" style="gap:18px">
        <div class="card">
            <div class="card-head">
                <h2><?= $editing !== null ? 'Edit library' : 'Add a library' ?></h2>
                <?php if ($editing !== null): ?>
                    <span class="spacer"></span>
                    <a class="btn btn-sm btn-ghost" href="<?= e(admin_url('libraries')) ?>" aria-label="Close"><?= admin_icon('x', 15) ?></a>
                <?php endif; ?>
            </div>
            <form method="post" action="<?= e(admin_url('libraries')) ?>" class="card-body stack" id="library-form"
                  enctype="multipart/form-data">
                <?= Csrf::field() ?>
                <input type="hidden" name="do" value="save">
                <input type="hidden" name="id" value="<?= (int) ($editing['id'] ?? 0) ?>">

                <div class="field">
                    <div class="label-row"><label for="lib-name">Name</label><span class="hint">as you will see it</span></div>
                    <input id="lib-name" name="name" value="<?= e((string) $form['name']) ?>" required placeholder="Chart.js">
                </div>

                <div class="field">
                    <div class="label-row"><label for="lib-slug">Key</label><span class="hint">what a tool file names</span></div>
                    <input id="lib-slug" name="slug" value="<?= e((string) $form['slug']) ?>" placeholder="chart-js">
                    <div class="hint">Leave empty to build it from the name. This is the word after <code>Libraries:</code>.</div>
                </div>

                <div class="field">
                    <div class="label-row"><label for="lib-url">Address</label></div>
                    <input id="lib-url" name="url" value="<?= e((string) $form['url']) ?>"
                           placeholder="https://cdn.jsdelivr.net/npm/chart.js@4/chart.umd.min.js">
                    <div class="hint">
                        A CDN address, or <code>/assets/js/…</code> for a file you host yourself.
                        Leave it empty if you upload the file below.
                    </div>
                </div>

                <div class="field">
                    <div class="label-row">
                        <label for="library_file">…or upload the file</label>
                        <span class="hint">.js or .css, up to 4 MB</span>
                    </div>
                    <input type="file" id="library_file" name="library_file" accept=".js,.css">
                    <div class="hint">
                        Stored in <code>assets/libraries/</code> and used as the address above — for a library
                        you host yourself instead of one from a CDN.
                    </div>
                </div>

                <div class="field">
                    <label for="lib-kind">Type</label>
                    <select id="lib-kind" name="kind">
                        <option value="js" <?= (string) $form['kind'] === 'js' ? 'selected' : '' ?>>Script (.js)</option>
                        <option value="css" <?= (string) $form['kind'] === 'css' ? 'selected' : '' ?>>Stylesheet (.css)</option>
                    </select>
                </div>

                <div class="field">
                    <div class="label-row"><label for="lib-integrity">SRI hash</label><span class="hint">optional</span></div>
                    <input id="lib-integrity" name="integrity" value="<?= e((string) $form['integrity']) ?>" placeholder="sha384-…">
                    <div class="hint">Copied from the CDN. The browser refuses a file that does not match.</div>
                </div>

                <div class="field">
                    <label for="lib-notes">Note</label>
                    <input id="lib-notes" name="notes" value="<?= e((string) $form['notes']) ?>" placeholder="Pinned to 4.4 — 5.x changes the API">
                </div>

                <button type="submit" class="btn btn-primary" style="justify-content:center">
                    <?= admin_icon('check', 15) ?> <?= $editing !== null ? 'Save library' : 'Add library' ?>
                </button>
            </form>
        </div>

        <?php if ($editing !== null): ?>
        <?php $slugNow = (string) $editing['slug']; ?>
        <div class="card">
            <div class="card-head">
                <h2>Where it loads</h2>
                <span class="spacer"></span>
                <span class="muted small"><?= count($assignable) ?> pages</span>
            </div>
            <div class="card-body stack">
                <p class="small muted" style="margin:0">
                    Tick the tools and calculators that need <strong><?= e((string) $editing['name']) ?></strong>.
                    It is added to their <code>&lt;head&gt;</code> and nowhere else. Untick to stop loading it there.
                </p>
                <?php if ($assignable === []): ?>
                    <p class="small muted" style="margin:0">No pages yet.</p>
                <?php else: ?>
                    <input type="text" id="assign-filter" placeholder="Filter pages by name or address…"
                           autocomplete="off" style="width:100%">
                    <div class="library-assign" id="assign-list">
                        <?php foreach ($assignable as $libPage): ?>
                            <?php
                            /* Not `$page`: the layout reads that name for the current screen. */
                            $libPath    = '/' . (string) $libPage['category_slug'] . '/' . (string) $libPage['slug'];
                            $libKinds   = (string) ($libPage['kind'] ?? 'builder');
                            $selected   = in_array($slugNow, \Onim\ToolLibraries::split((string) $libPage['libraries']), true);
                            ?>
                            <label class="check">
                                <input type="checkbox" form="library-form" name="assign[<?= (int) $libPage['id'] ?>]" value="1"
                                       <?= $selected ? 'checked' : '' ?>>
                                <span class="small">
                                    <?= e((string) $libPage['name']) ?>
                                    <span class="badge <?= $libKinds === 'tool' ? 'badge-brand' : 'badge-muted' ?>">
                                        <?= $libKinds === 'tool' ? 'Tool' : 'Calculator' ?>
                                    </span>
                                    <span class="mono muted" style="display:block;font-size:11px"><?= e($libPath) ?></span>
                                </span>
                            </label>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <button type="submit" form="library-form" class="btn btn-primary" style="justify-content:center">
                    <?= admin_icon('check', 15) ?> Save this library and its pages
                </button>
                <script>
                /* Two hundred pages is a list, four thousand is a haystack. */
                (function () {
                    var box = document.getElementById('assign-filter');
                    var list = document.getElementById('assign-list');
                    if (!box || !list) { return; }
                    var labels = [].slice.call(list.querySelectorAll('label.check'));
                    box.addEventListener('input', function () {
                        var q = box.value.trim().toLowerCase();
                        labels.forEach(function (label) {
                            label.hidden = q !== '' && label.textContent.toLowerCase().indexOf(q) === -1;
                        });
                    });
                })();
                </script>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php endif; ?>
