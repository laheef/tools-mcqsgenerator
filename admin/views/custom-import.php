<?php
/**
 * @var string     $text
 * @var string     $mode
 * @var array|null $report       CustomImport::preview() result
 * @var array|null $result       CustomImport::run() result
 * @var array      $parseErrors
 * @var array      $categories
 * @var string     $example
 * @var int        $maxRows
 */

declare(strict_types=1);
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('OMNI_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}


use Omni\Admin\Csrf;

$badge = static function (string $action): string {
    return match ($action) {
        'create'    => 'badge-ok',
        'update'    => 'badge-brand',
        'skip'      => 'badge-muted',
        'duplicate' => 'badge-err',
        default     => 'badge-muted',
    };
};
$label = static function (string $action): string {
    return match ($action) {
        'create'    => 'Create',
        'update'    => 'Update',
        'skip'      => 'Leave alone',
        'duplicate' => 'Duplicate row',
        default     => $action,
    };
};
?>
<div class="grid grid-sidebar">
    <div class="stack" style="gap:18px">

        <?php if ($parseErrors !== []): ?>
            <div class="card">
                <div class="card-body">
                    <strong style="color:var(--err)">The document could not be read.</strong>
                    <ul style="list-style:none;padding:0;margin:8px 0 0">
                        <?php foreach ($parseErrors as $error): ?>
                            <li><?= admin_icon('warning', 14) ?> <?= e($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($result !== null): ?>
            <div class="card">
                <div class="card-head">
                    <h2>Import finished</h2>
                    <span class="spacer"></span>
                    <span class="badge <?= $result['failed'] === [] ? 'badge-ok' : 'badge-warn' ?>">
                        <?= count($result['created']) + count($result['updated']) ?> written
                    </span>
                </div>
                <div class="card-body">
                    <div class="grid grid-4" style="margin-bottom:12px">
                        <div class="stat">
                            <div class="label">Created</div>
                            <div class="value"><?= count($result['created']) ?></div>
                        </div>
                        <div class="stat">
                            <div class="label">Updated</div>
                            <div class="value"><?= count($result['updated']) ?></div>
                        </div>
                        <div class="stat">
                            <div class="label">Left alone</div>
                            <div class="value"><?= count($result['skipped']) ?></div>
                        </div>
                        <div class="stat <?= $result['failed'] !== [] ? 'is-brand' : '' ?>">
                            <div class="label">Refused</div>
                            <div class="value"><?= count($result['failed']) ?></div>
                        </div>
                    </div>

                    <?php if ($result['created'] !== [] || $result['updated'] !== []): ?>
                        <p class="small" style="margin:0 0 8px">Live now:</p>
                        <ul style="list-style:none;padding:0;margin:0 0 10px">
                            <?php foreach (array_merge($result['created'], $result['updated']) as $path): ?>
                                <li style="padding:2px 0">
                                    <?= admin_icon('check', 13) ?>
                                    <a href="<?= e(site_link($path)) ?>" target="_blank" rel="noopener"><code><?= e($path) ?></code></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <p class="muted small" style="margin:0">
                            Drafts appear only through their signed preview link; published ones are searchable and
                            in the sitemap immediately.
                        </p>
                    <?php endif; ?>

                    <?php if ($result['failed'] !== []): ?>
                        <div class="table-wrap" style="margin-top:12px">
                            <table class="data">
                                <thead><tr><th>Line</th><th>Name</th><th>Why it was refused</th></tr></thead>
                                <tbody>
                                <?php foreach ($result['failed'] as $failure): ?>
                                    <tr>
                                        <td class="muted"><?= (int) $failure['line'] ?></td>
                                        <td><?= e($failure['name']) ?><br><code class="muted"><?= e($failure['path']) ?></code></td>
                                        <td>
                                            <?php foreach ($failure['errors'] as $error): ?>
                                                <div class="small"><?= admin_icon('warning', 12) ?> <?= e($error) ?></div>
                                            <?php endforeach; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($report !== null && $result === null): ?>
            <div class="card">
                <div class="card-head">
                    <h2>Dry run</h2>
                    <span class="spacer"></span>
                    <span class="badge badge-ok"><?= (int) $report['ok'] ?> ready</span>
                    <?php if ($report['failed'] > 0): ?>
                        <span class="badge badge-err"><?= (int) $report['failed'] ?> refused</span>
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <p class="muted small" style="margin-top:0">
                        Nothing has been written yet. This is the same validation the import runs — the
                        <em>Calculated</em> column is the real solver working through each row's default values.
                    </p>
                    <div class="table-wrap">
                        <table class="data">
                            <thead>
                            <tr><th>Line</th><th>Calculator</th><th>Action</th><th>Calculated</th><th>Notes</th></tr>
                            </thead>
                            <tbody>
                            <?php foreach ($report['rows'] as $row): ?>
                                <tr>
                                    <td class="muted"><?= (int) $row['line'] ?></td>
                                    <td>
                                        <strong><?= e($row['name']) ?></strong><br>
                                        <code class="muted"><?= e($row['path']) ?></code>
                                    </td>
                                    <td><span class="badge <?= $badge($row['action']) ?>"><?= e($label($row['action'])) ?></span></td>
                                    <td class="small">
                                        <?php if ($row['calculated'] === []): ?>
                                            <span class="muted">—</span>
                                        <?php else: ?>
                                            <?php foreach ($row['calculated'] as $line): ?>
                                                <div><?= e($line) ?></div>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </td>
                                    <td class="small">
                                        <?php foreach ($row['errors'] as $error): ?>
                                            <div style="color:var(--err)"><?= admin_icon('warning', 12) ?> <?= e($error) ?></div>
                                        <?php endforeach; ?>
                                        <?php foreach ($row['warnings'] as $warning): ?>
                                            <div style="color:var(--warn)"><?= admin_icon('info', 12) ?> <?= e($warning) ?></div>
                                        <?php endforeach; ?>
                                        <?php if ($row['errors'] === [] && $row['warnings'] === []): ?>
                                            <span class="muted">—</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <form method="post" action="<?= e(admin_url('custom-import')) ?>" enctype="multipart/form-data"
              id="import-form" data-allow-repeat="1">
            <?= Csrf::field() ?>
            <div class="card">
                <div class="card-head">
                    <h2><?= $report === null ? 'The document' : 'Run it again' ?></h2>
                    <span class="spacer"></span>
                    <span class="muted small">JSON or CSV · up to <?= (int) $maxRows ?> calculators</span>
                </div>
                <div class="card-body stack">
                    <div class="field">
                        <div class="label-row">
                            <label for="document">Paste JSON or CSV</label>
                            <span class="hint">A JSON array of calculators, a single object, or CSV with a header row</span>
                        </div>
                        <textarea id="document" name="document" rows="14" class="mono"
                                  placeholder='[{"name":"…","slug":"…","category_slug":"…","fields":[…],"directions":[…]}]'><?= e($text) ?></textarea>
                    </div>

                    <div class="grid grid-2">
                        <div class="field" style="margin:0">
                            <div class="label-row">
                                <label for="document_file">…or upload a file</label>
                                <span class="hint">.json, .csv or .txt</span>
                            </div>
                            <input type="file" id="document_file" name="document_file" accept=".json,.csv,.txt">
                        </div>
                        <div class="field" style="margin:0">
                            <label for="mode">When a calculator already exists</label>
                            <select id="mode" name="mode">
                                <option value="skip" <?= $mode === 'skip' ? 'selected' : '' ?>>Leave it alone (skip)</option>
                                <option value="update" <?= $mode === 'update' ? 'selected' : '' ?>>Update it with this row</option>
                            </select>
                            <div class="hint">Updating keeps the previous state in the version history.</div>
                        </div>
                        <label class="check small" style="display:block;grid-column:1/-1">
                            <input type="checkbox" name="draft_articles" value="1" <?= !empty($draftArticles) ? 'checked' : '' ?>>
                            <span>Write an article draft for rows that arrive without prose</span>
                            <span class="hint" style="display:block">The draft is built from the row's own fields and formulas, so the page is never thin. You can edit every word afterwards in the editor.</span>
                        </label>
                    </div>

                    <div class="row-actions" style="display:flex;gap:10px;flex-wrap:wrap">
                        <button class="btn" type="submit" name="do" value="preview">
                            <?= admin_icon('eye', 14) ?> Dry run — show me what would happen
                        </button>
                        <button class="btn btn-primary" type="submit" name="do" value="import">
                            <?= admin_icon('upload', 14) ?> Import
                        </button>
                    </div>
                    <p class="muted small" style="margin:0">
                        The import writes every row that validates and reports the rest; a single bad row never
                        blocks the file. Nothing is written until you press <strong>Import</strong>.
                    </p>
                </div>
            </div>
        </form>
    </div>

    <div class="stack" style="gap:18px">
        <div class="card">
            <div class="card-head"><h2>Format</h2></div>
            <div class="card-body stack">
                <p class="small" style="margin:0">
                    Each calculator needs <code>name</code>, <code>slug</code> and <code>category_slug</code>, a list of
                    <code>fields</code>, and at least one row in <code>directions</code>. Everything else — summary,
                    sections, FAQ, SEO — is optional but makes the page worth indexing.
                </p>
                <p class="small" style="margin:0">
                    The category does not have to exist yet: importing into a new slug creates it.
                </p>
                <details>
                    <summary class="small"><strong>Engine records are accepted too</strong></summary>
                    <p class="small" style="margin:8px 0 0">
                        A record shaped like the harvested catalogue (<code>vars</code>, <code>groups</code>,
                        <code>datasets</code>, <code>eq</code>) is converted into editor fields and formula rows
                        automatically, so a definition produced offline can be imported unchanged.
                    </p>
                </details>
                <details>
                    <summary class="small"><strong>Compact CSV cells</strong></summary>
                    <p class="small" style="margin:8px 0 0">
                        In CSV, <code>fields</code> can be <code>key:Label:type:default:1</code> separated by
                        <code>;</code> (the trailing <code>1</code> marks an answer) and <code>directions</code> can be
                        <code>target=expression::Family</code>.
                    </p>
                </details>
            </div>
        </div>

        <div class="card">
            <div class="card-head">
                <h2>Example</h2>
                <span class="spacer"></span>
                <button class="btn btn-sm" type="button" id="fill-example"><?= admin_icon('copy', 14) ?> Use this</button>
            </div>
            <div class="card-body">
                <textarea id="example-doc" rows="12" readonly class="mono" style="font-size:11.5px"
                          aria-label="Example document"><?= e($example) ?></textarea>
                <div class="hint">Press “Use this” to load it into the box, then press Dry run.</div>
            </div>
        </div>
    </div>
</div>

<script>
(function () {
    'use strict';
    var fill = document.getElementById('fill-example');
    var source = document.getElementById('example-doc');
    var target = document.getElementById('document');
    if (fill && source && target) {
        fill.addEventListener('click', function () {
            target.value = source.value;
            target.focus();
            target.scrollIntoView({ block: 'center', behavior: 'smooth' });
        });
    }
})();
</script>
