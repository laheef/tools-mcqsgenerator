<?php
/**
 * @var array $items @var \Omni\Admin\Pagination $paginator @var array $stats
 * @var string $q @var string $type @var array|null $editing @var array $editingUsage @var string $maxUpload
 */

declare(strict_types=1);
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('OMNI_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}


use Omni\Admin\Csrf;
use Omni\Admin\MediaRepo;
?>
<div class="grid grid-4" style="margin-bottom:18px">
    <div class="stat"><div class="label">Files</div><div class="value"><?= number_format($stats['count']) ?></div><div class="hint">images, documents, video</div></div>
    <div class="stat"><div class="label">Disk used</div><div class="value"><?= e($stats['human_size']) ?></div><div class="hint">uploads/media</div></div>
    <div class="stat"><div class="label">Upload limit</div><div class="value"><?= e($maxUpload) ?></div><div class="hint">per file, from php.ini</div></div>
    <div class="stat"><div class="label">Folder</div><div class="value" style="font-size:15px;word-break:break-all">/uploads/media</div><div class="hint">publicly readable, never executable</div></div>
</div>

<div class="grid grid-sidebar">
    <div class="card">
        <form method="get" action="<?= e(admin_base() . '/index.php') ?>" class="filters" data-auto-submit>
            <input type="hidden" name="p" value="media">
            <div class="field grow">
                <label for="q">Search</label>
                <input id="q" name="q" type="search" value="<?= e($q) ?>" placeholder="Filename, alt text or caption…">
            </div>
            <div class="field">
                <label for="type">Type</label>
                <select id="type" name="type">
                    <option value="">Everything</option>
                    <option value="image" <?= $type === 'image' ? 'selected' : '' ?>>Images</option>
                    <option value="other" <?= $type === 'other' ? 'selected' : '' ?>>Documents &amp; video</option>
                </select>
            </div>
            <div class="field"><button class="btn btn-primary" type="submit">Filter</button></div>
        </form>

        <div class="card-body">
            <?php if ($items === []): ?>
                <div class="empty">
                    <h3>No media yet</h3>
                    <p class="small">Upload a logo, a post cover or a calculator thumbnail. Files are stored with a random name and served from <code>/uploads/media/</code>.</p>
                </div>
            <?php else: ?>
                <div class="media-grid">
                    <?php foreach ($items as $item): ?>
                        <?php $isImage = str_starts_with((string) $item['mime'], 'image/'); ?>
                        <div class="media-card">
                            <div class="thumb">
                                <?php if ($isImage): ?>
                                    <img src="<?= e(MediaRepo::url((string) $item['path'])) ?>" alt="<?= e((string) $item['alt']) ?>" loading="lazy">
                                <?php else: ?>
                                    <span class="muted small"><?= e(strtoupper(pathinfo((string) $item['filename'], PATHINFO_EXTENSION))) ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="tools">
                                <a class="btn btn-sm btn-icon" href="<?= e(admin_url('media', ['edit' => (int) $item['id']])) ?>" title="Edit details"><?= admin_icon('edit', 14) ?></a>
                                <button class="btn btn-sm btn-icon" type="button" data-copy="<?= e(MediaRepo::url((string) $item['path'])) ?>" title="Copy URL"><?= admin_icon('copy', 14) ?></button>
                            </div>
                            <div class="meta">
                                <div class="name" title="<?= e((string) $item['filename']) ?>"><?= e((string) $item['filename']) ?></div>
                                <div class="muted">
                                    <?= (int) $item['width'] > 0 ? (int) $item['width'] . '×' . (int) $item['height'] . ' · ' : '' ?>
                                    <?= e(MediaRepo::humanSize((int) $item['size'])) ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
        <?= $paginator->render() ?>
    </div>

    <div class="stack" style="gap:18px">
        <div class="card">
            <div class="card-head"><h2>Upload</h2></div>
            <div class="card-body">
                <form method="post" action="<?= e(admin_url('media')) ?>" enctype="multipart/form-data">
                    <?= Csrf::field() ?>
                    <input type="hidden" name="do" value="upload">
                    <label class="dropzone" for="files" data-dropzone style="display:block">
                        <strong>Choose files</strong>
                        <div class="small">or drop them here</div>
                        <input id="files" name="files[]" type="file" multiple style="display:none"
                               accept=".jpg,.jpeg,.png,.gif,.webp,.avif,.svg,.pdf,.txt,.csv,.zip,.mp4">
                    </label>
                    <p class="small muted" style="margin:10px 0 0">
                        Images (jpg, png, gif, webp, avif, svg), PDF, txt, csv, zip, mp4 — up to <?= e(MediaRepo::humanSize(MediaRepo::MAX_BYTES)) ?> each.
                        SVG files containing script are rejected.
                    </p>
                    <button class="btn btn-primary" type="submit" style="margin-top:10px">Upload</button>
                </form>
            </div>
        </div>

        <?php if ($editing !== null): ?>
            <div class="card">
                <div class="card-head">
                    <h2>File details</h2>
                    <span class="spacer"></span>
                    <a class="btn btn-sm btn-ghost" href="<?= e(admin_url('media')) ?>" aria-label="Close"><?= admin_icon('x', 14) ?></a>
                </div>
                <div class="card-body stack">
                    <?php if (str_starts_with((string) $editing['mime'], 'image/')): ?>
                        <img src="<?= e(MediaRepo::url((string) $editing['path'])) ?>" alt="" style="width:100%;height:auto;border-radius:8px;border:1px solid var(--border)">
                    <?php endif; ?>
                    <div class="field">
                        <label>URL</label>
                        <div class="row tight">
                            <input value="<?= e(MediaRepo::url((string) $editing['path'])) ?>" readonly class="mono">
                            <button class="btn btn-sm" type="button" data-copy="<?= e(MediaRepo::url((string) $editing['path'])) ?>">Copy</button>
                        </div>
                    </div>
                    <form method="post" action="<?= e(admin_url('media')) ?>">
                        <?= Csrf::field() ?>
                        <input type="hidden" name="do" value="update">
                        <input type="hidden" name="id" value="<?= (int) $editing['id'] ?>">
                        <div class="field">
                            <label for="alt">Alt text</label>
                            <input id="alt" name="alt" value="<?= e((string) $editing['alt']) ?>" maxlength="255">
                            <div class="hint">Describe the image for screen readers and search engines.</div>
                        </div>
                        <div class="field">
                            <label for="caption">Caption</label>
                            <input id="caption" name="caption" value="<?= e((string) $editing['caption']) ?>" maxlength="255">
                        </div>
                        <button class="btn btn-primary" type="submit">Save details</button>
                    </form>

                    <hr>
                    <dl class="kv">
                        <dt>Original name</dt><dd class="small"><?= e((string) $editing['filename']) ?></dd>
                        <dt>Type</dt><dd class="mono small"><?= e((string) $editing['mime']) ?></dd>
                        <dt>Size</dt><dd><?= e(MediaRepo::humanSize((int) $editing['size'])) ?></dd>
                        <dt>Uploaded</dt><dd class="small"><?= e(date('j M Y H:i', strtotime((string) $editing['created_at']))) ?></dd>
                    </dl>

                    <div>
                        <strong class="small">Used in</strong>
                        <?php if ($editingUsage === []): ?>
                            <p class="small muted" style="margin:4px 0 0">Nothing links to this file.</p>
                        <?php else: ?>
                            <ul class="small" style="margin:6px 0 0;padding-left:16px">
                                <?php foreach ($editingUsage as $use): ?>
                                    <li><a href="<?= e($use['url']) ?>"><?= e($use['type']) ?></a>: <?= e($use['label']) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>

                    <form method="post" action="<?= e(admin_url('media')) ?>"
                          data-confirm="Delete this file? It is still referenced somewhere — the pages using it will break.">
                        <?= Csrf::field() ?>
                        <input type="hidden" name="do" value="delete">
                        <input type="hidden" name="id" value="<?= (int) $editing['id'] ?>">
                        <?php if ($editingUsage !== []): ?><input type="hidden" name="force" value="1"><?php endif; ?>
                        <button class="btn btn-danger" type="submit"><?= admin_icon('trash', 15) ?> Delete file</button>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<script>
// drop zone: show the chosen filenames and submit on drop
(function () {
    var zone = document.querySelector('[data-dropzone]');
    if (!zone) { return; }
    var input = zone.querySelector('input[type=file]');
    var label = zone.querySelector('strong');
    input.addEventListener('change', function () {
        label.textContent = input.files.length + ' file' + (input.files.length === 1 ? '' : 's') + ' selected';
    });
    ['dragenter', 'dragover'].forEach(function (evt) {
        zone.addEventListener(evt, function (e) { e.preventDefault(); zone.classList.add('is-over'); });
    });
    ['dragleave', 'drop'].forEach(function (evt) {
        zone.addEventListener(evt, function (e) { e.preventDefault(); zone.classList.remove('is-over'); });
    });
    zone.addEventListener('drop', function (e) {
        if (e.dataTransfer && e.dataTransfer.files.length) {
            input.files = e.dataTransfer.files;
            label.textContent = input.files.length + ' file(s) selected';
        }
    });
})();
</script>
