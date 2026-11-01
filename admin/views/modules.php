<?php
/**
 * @var array $rows   installed modules, prepared by the controller
 * @var array $slots  slot names in page order
 */

declare(strict_types=1);
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('ONIM_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}


use Onim\Admin\Csrf;

$enabled = 0;
$broken = 0;
foreach ($rows as $row) {
    if ($row['errors'] !== []) {
        $broken++;
    } elseif ($row['is_enabled']) {
        $enabled++;
    }
}
?>
<div class="grid grid-3" style="margin-bottom:18px">
    <div class="stat">
        <div class="label">Installed</div>
        <div class="value"><?= count($rows) ?></div>
        <div class="hint">folders under <code>modules/</code></div>
    </div>
    <div class="stat">
        <div class="label">Switched on</div>
        <div class="value"><?= $enabled ?></div>
        <div class="hint">rendering on their pages</div>
    </div>
    <div class="stat <?= $broken > 0 ? 'is-brand' : '' ?>">
        <div class="label">Need attention</div>
        <div class="value"><?= $broken ?></div>
        <div class="hint"><?= $broken === 0 ? 'every manifest is valid' : 'a manifest or partial is missing' ?></div>
    </div>
</div>

<div class="card">
    <div class="card-head">
        <h2>Installed modules</h2>
        <span class="spacer"></span>
        <a class="btn btn-sm" href="<?= e(admin_url('files', ['path' => 'modules'])) ?>">
            <?= admin_icon('folder', 14) ?> Browse the folder
        </a>
    </div>

    <?php if ($rows === []): ?>
        <div class="card-body">
            <p class="muted" style="margin:0 0 10px">
                No modules are installed. Modules are the escape hatch for the handful of calculators whose page
                needs something a list of fields cannot express — a chart, a slider, a benchmark table.
            </p>
            <p class="muted small" style="margin:0 0 6px">Create a folder next to the site:</p>
<pre class="mono" style="background:var(--surface-3);padding:12px;border-radius:10px;overflow:auto;margin:0 0 10px">modules/my-module/module.json
modules/my-module/partials/extra.php</pre>
            <p class="muted small" style="margin:0">
                <code>module.json</code> names the page(s) it applies to, the slot it draws into and the partial
                that draws it. The partial is ordinary PHP and sees the same variables the calculator template has.
            </p>
        </div>
    <?php else: ?>
        <div class="table-wrap">
            <table class="data">
                <thead>
                <tr>
                    <th>Module</th>
                    <th>Pages</th>
                    <th>Slot</th>
                    <th>Status</th>
                    <th class="actions">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($rows as $row): ?>
                    <tr>
                        <td>
                            <strong><?= e($row['name']) ?></strong>
                            <?php if ($row['version'] !== ''): ?>
                                <span class="muted small">v<?= e($row['version']) ?></span>
                            <?php endif; ?>
                            <br>
                            <code class="muted">modules/<?= e($row['slug']) ?>/</code>
                            <?php if ($row['description'] !== ''): ?>
                                <div class="muted small" style="margin-top:4px"><?= e($row['description']) ?></div>
                            <?php endif; ?>
                            <?php foreach ($row['errors'] as $error): ?>
                                <div class="small" style="color:var(--err)"><?= admin_icon('warning', 12) ?> <?= e($error) ?></div>
                            <?php endforeach; ?>
                            <?php foreach ($row['warnings'] as $warning): ?>
                                <div class="small" style="color:var(--warn)"><?= admin_icon('info', 12) ?> <?= e($warning) ?></div>
                            <?php endforeach; ?>
                        </td>
                        <td class="small">
                            <?php if ($row['errors'] !== []): ?>
                                <span class="muted">—</span>
                            <?php else: ?>
                                <strong><?= (int) $row['pages'] ?></strong> page<?= (int) $row['pages'] === 1 ? '' : 's' ?>
                                <?php if ($row['paths'] !== [] && count($row['paths']) <= 3): ?>
                                    <div class="muted">
                                        <?php foreach ($row['paths'] as $path): ?>
                                            <div><code><?= e($path) ?></code></div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php elseif ($row['categories'] !== []): ?>
                                    <div class="muted">all of: <?= e(implode(', ', $row['categories'])) ?></div>
                                <?php endif; ?>
                            <?php endif; ?>
                        </td>
                        <td class="small">
                            <?php foreach (array_keys($row['slots']) as $slot): ?>
                                <div><code><?= e((string) $slot) ?></code></div>
                            <?php endforeach; ?>
                            <?php if ($row['slots'] === []): ?><span class="muted">—</span><?php endif; ?>
                        </td>
                        <td>
                            <?php if ($row['errors'] !== []): ?>
                                <span class="badge badge-err">Broken — not rendered</span>
                            <?php elseif ($row['is_enabled']): ?>
                                <span class="badge badge-ok">On</span>
                            <?php else: ?>
                                <span class="badge badge-muted">Off</span>
                            <?php endif; ?>
                        </td>
                        <td class="actions">
                            <?php if ($row['errors'] === []): ?>
                                <form method="post" action="<?= e(admin_url('modules')) ?>" style="display:inline">
                                    <?= Csrf::field() ?>
                                    <input type="hidden" name="do" value="toggle">
                                    <input type="hidden" name="slug" value="<?= e($row['slug']) ?>">
                                    <button class="btn btn-sm" type="submit">
                                        <?= $row['is_enabled'] ? admin_icon('x', 14) . ' Switch off' : admin_icon('check', 14) . ' Switch on' ?>
                                    </button>
                                </form>
                                <?php if ($row['paths'] !== []): ?>
                                    <a class="btn btn-sm btn-ghost" target="_blank" rel="noopener"
                                       href="<?= e(site_link((string) $row['paths'][0])) ?>"><?= admin_icon('external', 14) ?> Page</a>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php foreach ($row['relative'] as $file): ?>
                                <a class="btn btn-sm btn-ghost" href="<?= e(admin_url('file-edit', ['path' => $file])) ?>">
                                    <?= admin_icon('code', 14) ?> <?= e(basename($file)) ?>
                                </a>
                            <?php endforeach; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>

<div class="card" style="margin-top:18px">
    <div class="card-head"><h2>Where a module can draw</h2></div>
    <div class="card-body">
        <div class="table-wrap">
            <table class="data">
                <thead><tr><th>Slot</th><th>Position on the page</th><th>Typical use</th></tr></thead>
                <tbody>
                <tr><td><code>widget_top</code></td><td>inside the calculator card, above the first field group</td><td>a mode switch, a persistent notice, a chart of the inputs</td></tr>
                <tr><td><code>widget_bottom</code></td><td>inside the calculator card, below the hint line</td><td>a benchmark strip, a second result panel, a slider that feeds the form</td></tr>
                <tr><td><code>article_head</code></td><td>in the article, under the title and byline</td><td>a summary card, a key-takeaways list</td></tr>
                <tr><td><code>article_foot</code></td><td>after the article body, before the FAQ</td><td>a table of reference values, a worked example</td></tr>
                <tr><td><code>page_foot</code></td><td>the very end of the page</td><td>a related tool, an embed, a callout</td></tr>
                </tbody>
            </table>
        </div>
        <p class="muted small" style="margin:12px 0 0">
            A partial sees everything the calculator template sees — <code>$calc</code>, <code>$inputs</code>,
            <code>$solver</code>, <code>$groups</code> — and uses the site's own helpers. It runs on the server, so
            there is no client sandbox and no eval. The panel switches modules on and off and edits their files
            through Source files; it never uploads code.
        </p>
    </div>
</div>
