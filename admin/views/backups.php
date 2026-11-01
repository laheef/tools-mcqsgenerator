<?php
/**
 * @var array $backups @var string $dir @var bool $writable @var int $total @var bool $zip @var float|false $disk
 */

declare(strict_types=1);
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('ONIM_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}


use Onim\Admin\BackupService;
use Onim\Admin\Csrf;
?>
<div class="grid grid-4" style="margin-bottom:18px">
    <div class="stat"><div class="label">Backups</div><div class="value"><?= count($backups) ?></div><div class="hint">database dumps and archives</div></div>
    <div class="stat"><div class="label">Stored size</div><div class="value"><?= e(BackupService::humanSize($total)) ?></div><div class="hint">data/backups</div></div>
    <div class="stat"><div class="label">Folder</div><div class="value" style="font-size:13px;word-break:break-all"><?= $writable ? 'writable' : 'not writable' ?></div><div class="hint"><?= e($dir) ?></div></div>
    <div class="stat"><div class="label">Free disk</div><div class="value"><?= $disk === false ? '—' : e(BackupService::humanSize((int) $disk)) ?></div><div class="hint">on the hosting account</div></div>
</div>

<?php if (!$writable): ?>
    <div class="notice err"><div><strong>The backup folder is not writable</strong>
        Create <code>data/backups</code> with permissions 755, or run backups from hPanel → Files → Backups.</div></div>
<?php endif; ?>

<div class="grid grid-2">
    <div class="card">
        <div class="card-head"><h2>Database backup</h2></div>
        <div class="card-body">
            <p class="small">Dumps every table (schema + data) to a <code>.sql</code> file you can download, restore here, or
                import with phpMyAdmin. Content in <code>data/</code> is not in the database, so a dump does not include the
                calculator catalogue.</p>
            <form method="post" action="<?= e(admin_url('backups')) ?>">
                <?= Csrf::field() ?>
                <input type="hidden" name="do" value="dump">
                <div class="field">
                    <label for="note">Note (optional)</label>
                    <input id="note" name="note" placeholder="Before the September content update">
                </div>
                <button class="btn btn-primary" type="submit"><?= admin_icon('database', 16) ?> Create database backup</button>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-head"><h2>Content archive</h2></div>
        <div class="card-body">
            <p class="small">Zips <code>data/content</code> (the 3,831 article files) and, if you want, the media library.
                Use this before regenerating content.</p>
            <?php if (!$zip): ?>
                <div class="notice warn"><div>The <code>zip</code> extension is not enabled on this server, so archives cannot be created. Copy <code>data/content</code> with the file manager instead.</div></div>
            <?php endif; ?>
            <form method="post" action="<?= e(admin_url('backups')) ?>">
                <?= Csrf::field() ?>
                <input type="hidden" name="do" value="archive">
                <label class="check" style="margin-bottom:12px">
                    <input type="checkbox" name="include_media" value="1" checked> <span>Include the media library</span>
                </label>
                <button class="btn" type="submit" <?= $zip ? '' : 'disabled' ?>><?= admin_icon('folder', 16) ?> Create content archive</button>
            </form>
        </div>
    </div>
</div>

<div class="card" style="margin-top:18px">
    <div class="card-head"><h2>Stored backups</h2><span class="spacer"></span><span class="muted small">downloads go through the panel, never a public URL</span></div>
    <div class="table-wrap">
        <table class="data">
            <thead><tr><th>File</th><th>Type</th><th class="num">Size</th><th>By</th><th>Created</th><th class="actions">Actions</th></tr></thead>
            <tbody>
            <?php if ($backups === []): ?>
                <tr><td colspan="6"><div class="empty"><h3>No backups yet</h3>
                    <p class="small">Create one before you make large content changes — it takes a second and it is the difference between a mistake and a disaster.</p></div></td></tr>
            <?php endif; ?>
            <?php foreach ($backups as $backup): ?>
                <tr>
                    <td class="primary mono small"><?= e((string) $backup['filename']) ?>
                        <?php if ($backup['note'] !== ''): ?><span class="sub"><?= e((string) $backup['note']) ?></span><?php endif; ?>
                    </td>
                    <td><span class="badge badge-muted"><?= e((string) $backup['btype']) ?></span></td>
                    <td class="num small"><?= e(BackupService::humanSize((int) $backup['size'])) ?></td>
                    <td class="small"><?= e((string) ($backup['author'] ?? 'system')) ?></td>
                    <td class="small muted nowrap"><?= e(date('j M Y H:i', strtotime((string) $backup['created_at']))) ?></td>
                    <td class="actions">
                        <a class="btn btn-sm" href="<?= e(admin_url('backups', ['action' => 'download', 'id' => (int) $backup['id']])) ?>"><?= admin_icon('download', 14) ?> Download</a>
                        <?php if ($backup['btype'] === 'database'): ?>
                            <form method="post" action="<?= e(admin_url('backups')) ?>" style="display:inline"
                                  data-confirm="Restore this dump over the live database? A snapshot of the current state is taken first, and everything saved since this backup will be replaced.">
                                <?= Csrf::field() ?>
                                <input type="hidden" name="do" value="restore">
                                <input type="hidden" name="id" value="<?= (int) $backup['id'] ?>">
                                <button class="btn btn-sm" type="submit">Restore</button>
                            </form>
                        <?php endif; ?>
                        <form method="post" action="<?= e(admin_url('backups')) ?>" style="display:inline" data-confirm="Delete this backup file?">
                            <?= Csrf::field() ?>
                            <input type="hidden" name="do" value="delete">
                            <input type="hidden" name="id" value="<?= (int) $backup['id'] ?>">
                            <button class="btn btn-sm btn-ghost" type="submit"><?= admin_icon('trash', 14) ?></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="notice info" style="margin-top:18px">
    <div>
        <strong>What a backup does not cover</strong>
        The calculator catalogue (<code>data/calc</code>, 37 MB) and the article files are on disk, not in MySQL. Hostinger runs
        its own daily account backups from hPanel → Files → Backups — keep those on, and use the content archive here for
        point-in-time copies before regenerating anything.
    </div>
</div>
