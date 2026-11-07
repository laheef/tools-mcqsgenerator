<?php

declare(strict_types=1);

/**
 * Calculator files — the list, the upload, and the health of each page.
 *
 * @var array<int,array>  $rows    one per file: path, file record, metadata
 * @var array<string,int> $byCat   category => how many files
 * @var string            $filter  the search box
 * @var string            $edit    path to highlight after an upload
 * @var int               $total   files on disk
 */

// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('ONIM_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}

use Onim\Admin\Csrf;

require __DIR__ . '/partials/tools-tabs.php';

$edit = $edit ?? '';
?>

<?php if ($edit !== ''): ?>
    <div class="card" style="border-left:3px solid var(--accent);margin-bottom:18px">
        <div class="card-body">
            <strong><?= e($edit) ?></strong> is in place.
            <a class="btn btn-sm" href="<?= e(admin_url('file-edit', ['path' => $edit])) ?>">Open the file</a>
            <?php $path = '/' . trim((string) preg_replace('~^plugins/calc/[^/]+/qm-calc-~', '', $edit), '.php'); ?>
            <a class="btn btn-sm btn-ghost" href="<?= e(site_url(ltrim($path, '/'))) ?>" target="_blank" rel="noopener">View the page</a>
        </div>
    </div>
<?php endif; ?>

<div class="grid-2" style="display:grid;grid-template-columns:minmax(0,1.15fr) minmax(0,.85fr);gap:18px;align-items:start">

    <div class="card">
        <div class="card-head">
            <h2>Calculator files</h2>
            <span class="muted"><?= (int) $total ?> on disk</span>
        </div>
        <div class="card-body">
            <p class="hint" style="margin-top:0">
                One PHP file per calculator. A page with a file is built from that file — its form,
                its formulas and its article — and nothing else. A page without one still uses the
                harvested catalogue record.
            </p>

            <form method="get" action="<?= e(admin_url('calc-files')) ?>" class="toolbar" style="display:flex;gap:8px;margin:0 0 14px">
                <input type="hidden" name="p" value="calc-files">
                <input type="search" name="q" value="<?= e($filter) ?>" placeholder="Filter by path or name" style="flex:1">
                <button class="btn btn-sm" type="submit">Filter</button>
            </form>

            <?php if ($byCat !== []): ?>
                <div class="chips" style="display:flex;flex-wrap:wrap;gap:6px;margin-bottom:12px">
                    <?php foreach ($byCat as $cat => $count): ?>
                        <span class="chip chip-static"><?= e($cat) ?> · <?= (int) $count ?></span>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <div class="table-wrap" style="max-height:640px;overflow:auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Page</th>
                            <th style="width:74px">Words</th>
                            <th style="width:110px">SEO</th>
                            <th style="width:150px"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($rows as $row): ?>
                        <?php
                        $f = $row['file'];
                        $titleLen = mb_strlen($row['title'], 'UTF-8') + 7;
                        $descLen  = mb_strlen($row['desc'], 'UTF-8');
                        $titleOk  = $titleLen >= 50 && $titleLen <= 60;
                        $descOk   = $descLen >= 150 && $descLen <= 160;
                        ?>
                        <tr<?= $f['file'] === $edit ? ' style="background:var(--tint)"' : '' ?>>
                            <td>
                                <strong><?= e($f['name']) ?></strong><br>
                                <span class="muted" style="font-size:12px"><?= e($row['path']) ?></span>
                                <?php if ($f['error'] !== ''): ?>
                                    <br><span class="badge badge-warn"><?= e($f['error']) ?></span>
                                <?php endif; ?>
                            </td>
                            <td><?= (int) $f['words'] ?></td>
                            <td>
                                <span class="badge <?= $titleOk ? 'badge-ok' : 'badge-warn' ?>" title="&#60;title&#62; length including the brand"><?= (int) $titleLen ?> t</span>
                                <span class="badge <?= $descOk ? 'badge-ok' : 'badge-warn' ?>" title="meta description length"><?= (int) $descLen ?> d</span>
                            </td>
                            <td style="text-align:right;white-space:nowrap">
                                <a class="btn btn-sm" href="<?= e(admin_url('file-edit', ['path' => $f['file']])) ?>">Edit</a>
                                <a class="btn btn-sm btn-ghost" href="<?= e(admin_url('calc-files', ['do' => 'download', 'file' => $f['file']])) ?>">Get</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if ($rows === []): ?>
                        <tr><td colspan="4" class="muted">No files<?= $filter !== '' ? ' match “' . e($filter) . '”' : ' yet' ?>.</td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div>
        <div class="card">
            <div class="card-head"><h2>Upload a calculator file</h2></div>
            <div class="card-body">
                <p class="hint" style="margin-top:0">
                    The file is parsed before it is stored, and the definition is checked: a formula
                    that reads a box which is not on the form is refused, with the reason.
                </p>
                <form method="post" action="<?= e(admin_url('calc-files')) ?>" enctype="multipart/form-data">
                    <?= Csrf::field() ?>
                    <input type="hidden" name="do" value="upload">
                    <label class="field">
                        <span>Category (the folder, and the first half of the address)</span>
                        <input type="text" name="category" value="biology" required>
                    </label>
                    <label class="field">
                        <span>Slug (the second half: /biology/<em>this</em>)</span>
                        <input type="text" name="slug" placeholder="punnett-square" required>
                    </label>
                    <label class="field">
                        <span>File</span>
                        <input type="file" name="file" accept=".php" required>
                    </label>
                    <p class="hint">
                        Uploading over an existing slug replaces that calculator. The previous
                        body is kept in the file history, so Replace can be undone.
                    </p>
                    <button class="btn" type="submit">Upload</button>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-head"><h2>The format, in one glance</h2></div>
            <div class="card-body">
<pre style="overflow:auto;font-size:12px;line-height:1.5"><code>return [
    'name'  =&gt; 'Punnett Square Calculator',
    'meta'  =&gt; ['title' =&gt; '…', 'description' =&gt; '…'],
    'sections' =&gt; [[
        'title'  =&gt; 'Parents',
        'fields' =&gt; [
            ['name' =&gt; 'mother', 'label' =&gt; "Mother's genotype",
             'type' =&gt; 'select', 'options' =&gt; ['AA' =&gt; 1, 'Aa' =&gt; 2]],
            ['name' =&gt; 'AA', 'label' =&gt; 'AA offspring',
             'type' =&gt; 'result'],
        ],
    ]],
    'formula' =&gt; ['AA' =&gt; 'get_chance_a(mother, father)'],
    'article' =&gt; ['intro' =&gt; '…', 'sections' =&gt; […], 'faq' =&gt; […]],
];</code></pre>
                <p class="hint">
                    Full reference: <code>docs/calc-files.md</code>. Anything the shorthand cannot
                    say can be carried verbatim in a <code>'raw'</code> block.
                </p>
            </div>
        </div>
    </div>
</div>
