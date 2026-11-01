<?php
/**
 * @var array<string,array<int,array<string,mixed>>> $tree
 * @var array $counts
 */

declare(strict_types=1);
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('ONIM_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}


use Onim\Admin\FileRepo;
?>
<div class="grid grid-4" style="margin-bottom:18px">
    <div class="stat">
        <div class="label">Editable files</div>
        <div class="value"><?= number_format($counts['files']) ?></div>
        <div class="hint">templates, libraries, scripts, styles</div>
    </div>
    <div class="stat">
        <div class="label">Stored versions</div>
        <div class="value"><?= number_format($counts['versions']) ?></div>
        <div class="hint">one per save, restorable</div>
    </div>
    <div class="stat">
        <div class="label">Lines of code</div>
        <div class="value"><?= number_format($counts['lines']) ?></div>
        <div class="hint">across the editable tree</div>
    </div>
    <div class="stat">
        <div class="label">Syntax checking</div>
        <div class="value">PHP</div>
        <div class="hint">parsed before every save</div>
    </div>
</div>

<div class="notice info">
    <div>
        <strong>What this screen is for</strong>
        Changing a template, a library or a script without an FTP client. Saves are versioned, the previous body is kept,
        and PHP is parsed before the write happens. Formula changes still belong in the catalogue shards, and routine
        content changes belong in the calculator editor — not here.
    </div>
</div>

<div class="card">
    <div class="card-head">
        <h2>Files</h2>
        <span class="spacer"></span>
        <span class="muted small">Click a file to open it</span>
    </div>
    <div class="card-body is-flush">
        <?php foreach ($tree as $group => $files): ?>
            <div style="padding:12px 18px 6px;border-top:1px solid var(--border)">
                <h3 style="font-size:12px;text-transform:uppercase;letter-spacing:.07em;color:var(--muted);margin:0">
                    <?= e($group) ?> <span class="muted">(<?= count($files) ?>)</span>
                </h3>
            </div>
            <div class="table-wrap">
                <table class="data">
                    <tbody>
                    <?php foreach ($files as $file): ?>
                        <tr>
                            <td class="primary" style="width:38%">
                                <a href="<?= e(admin_url('file-edit', ['path' => $file['path']])) ?>"><?= e($file['path']) ?></a>
                                <?php if ($file['read_only']): ?><span class="badge badge-muted">read-only</span><?php endif; ?>
                            </td>
                            <td><span class="badge badge-muted"><?= e($file['ext']) ?></span></td>
                            <td class="num small"><?= number_format($file['lines']) ?> lines</td>
                            <td class="num small"><?= e(number_format($file['size'] / 1024, 1)) ?> KB</td>
                            <td class="small muted nowrap"><?= e(date('j M Y H:i', $file['modified'])) ?></td>
                            <td class="small">
                                <?php if ($file['versions'] > 0): ?>
                                    <span class="badge badge-brand"><?= (int) $file['versions'] ?> version<?= $file['versions'] === 1 ? '' : 's' ?></span>
                                <?php else: ?>
                                    <span class="muted">—</span>
                                <?php endif; ?>
                            </td>
                            <td class="actions">
                                <a class="btn btn-sm" href="<?= e(admin_url('file-edit', ['path' => $file['path']])) ?>">Open</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php
/*
 * New file. The form posts `do=create`; the controller resolves the path against
 * the same allow-list the editor uses (editable folders only, no ../ escapes, no
 * config.db.php), refuses to overwrite, and stores the first version.
 */
$showCreate = (($_GET['action'] ?? '') === 'new');
?>
<div class="card" id="new-file" style="margin-top:18px">
    <div class="card-head">
        <h2>New file</h2>
        <span class="spacer"></span>
        <button class="btn btn-sm" type="button" data-toggle-target="#new-file-body" aria-expanded="<?= $showCreate ? 'true' : 'false' ?>">
            <?= $showCreate ? 'Hide' : 'Show' ?>
        </button>
    </div>
    <div class="card-body" id="new-file-body"<?= $showCreate ? '' : ' hidden' ?>>
        <p class="small muted" style="margin-top:0">
            Only inside <?= e(implode(', ', array_map(static fn ($r) => $r . '/', FileRepo::roots()))) ?>.
            PHP files are parsed before they are written, so a broken file is refused rather than saved.
        </p>
        <form method="post" action="<?= e(admin_url('files')) ?>" data-track-dirty>
            <?= \Onim\Admin\Csrf::field() ?>
            <input type="hidden" name="do" value="create">
            <div class="field-row">
                <div class="field">
                    <label for="new_path">Path</label>
                    <input id="new_path" name="new_path" type="text" required
                           placeholder="templates/partials/example.php" autocomplete="off" spellcheck="false">
                    <p class="hint">Relative to the site root. The folder must already exist.</p>
                </div>
            </div>
            <div class="field">
                <label for="new_content">Starting contents</label>
                <textarea id="new_content" name="content" rows="8" class="mono" spellcheck="false"
                          placeholder="<?= e("<?php\n// new file\n") ?>"></textarea>
            </div>
            <div class="row">
                <button class="btn btn-primary" type="submit"><?= admin_icon('plus', 16) ?> Create file</button>
                <a class="btn btn-ghost" href="<?= e(admin_url('files')) ?>">Cancel</a>
            </div>
        </form>
    </div>
</div>
