<?php
/**
 * @var array $file
 * @var array $versions
 * @var string $draft
 * @var array|null $check
 */

declare(strict_types=1);
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('ONIM_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}


use Onim\Admin\Csrf;
use Onim\Admin\FileRepo;

$tab = (string) (request('tab') ?? 'code');
$language = (string) ($file['language'] ?? FileRepo::language((string) $file['path']));
$readOnly = (bool) ($file['read_only'] ?? false);
$sizeWarning = strlen($draft) > 200000;
?>
<div class="grid grid-sidebar">
    <div class="stack" style="gap:18px">
        <div class="tabs" data-tabs="file-panels">
            <button type="button" data-tab="code">Code</button>
            <button type="button" data-tab="history">History (<?= count($versions) ?>)</button>
        </div>

        <div id="file-panels">
            <div data-tab-panel="code">
                <form method="post" action="<?= e(admin_url('files')) ?>" data-track-dirty data-primary-form id="file-form">
                    <?= Csrf::field() ?>
                    <input type="hidden" name="do" value="save">
                    <input type="hidden" name="path" value="<?= e((string) $file['path']) ?>">

                    <div class="card">
                        <div class="card-head">
                            <h2><?= e((string) $file['path']) ?></h2>
                            <span class="spacer"></span>
                            <span class="badge badge-muted"><?= e($language) ?></span>
                            <?php if ($readOnly): ?><span class="badge badge-warn">read-only</span><?php endif; ?>
                        </div>
                        <div class="card-body" style="padding:0">
                            <?php if ($sizeWarning): ?>
                                <div class="notice warn" style="margin:14px 14px 0">
                                    <div>This file is large (<?= e(number_format(strlen($draft) / 1024, 1)) ?> KB). Editing it in the browser is possible but slow — consider a shorter file.</div>
                                </div>
                            <?php endif; ?>
                            <textarea name="content" class="code" spellcheck="false" rows="30" style="border:0;border-radius:0;min-height:60vh"
                                      aria-label="File contents" <?= $readOnly ? 'readonly' : '' ?>><?= e($draft) ?></textarea>
                        </div>
                        <div class="card-foot">
                            <?php if (!$readOnly): ?>
                                <input name="note" placeholder="What changed? (stored with the version)" style="max-width:320px">
                                <button class="btn btn-primary" type="submit">Save file</button>
                            <?php else: ?>
                                <span class="muted small">Read-only in the panel: this file is an entry point or holds credentials.</span>
                            <?php endif; ?>
                            <span class="spacer"></span>
                            <span class="muted small"><?= number_format((int) ($file['lines'] ?? 0)) ?> lines ·
                                <?= e(number_format((int) ($file['size'] ?? 0) / 1024, 1)) ?> KB</span>
                        </div>
                    </div>
                </form>

                <?php if ($check !== null && empty($check['ok'])): ?>
                    <div class="notice err" style="margin-top:18px">
                        <div><strong>The current file does not parse</strong><?= e($check['error']) ?></div>
                    </div>
                <?php elseif ($check !== null && !empty($check['warnings'])): ?>
                    <div class="notice info" style="margin-top:18px">
                        <div><?= e(implode(' ', $check['warnings'])) ?></div>
                    </div>
                <?php endif; ?>
            </div>

            <div data-tab-panel="history" hidden>
                <div class="card">
                    <div class="card-head">
                        <h2>Version history</h2>
                        <span class="spacer"></span>
                        <span class="muted small">The body before each save</span>
                    </div>
                    <div class="card-body is-flush">
                        <?php if ($versions === []): ?>
                            <div class="empty">
                                <h3>No versions yet</h3>
                                <p class="small">The first save from this panel stores the current body as version 1.</p>
                            </div>
                        <?php else: ?>
                            <div class="table-wrap">
                                <table class="data">
                                    <thead><tr><th>Version</th><th>When</th><th>By</th><th>Note</th><th class="num">Size</th><th class="actions"></th></tr></thead>
                                    <tbody>
                                    <?php foreach ($versions as $version): ?>
                                        <tr>
                                            <td class="primary">v<?= (int) $version['version'] ?></td>
                                            <td class="small nowrap"><?= e(date('j M Y H:i', strtotime((string) $version['created_at']))) ?></td>
                                            <td class="small"><?= e((string) ($version['author'] ?? 'unknown')) ?></td>
                                            <td class="small"><?= e((string) $version['note']) ?></td>
                                            <td class="num small"><?= e(number_format((int) $version['size'] / 1024, 1)) ?> KB</td>
                                            <td class="actions">
                                                <details style="display:inline-block;text-align:left">
                                                    <summary class="btn btn-sm btn-ghost" style="display:inline-flex">View</summary>
                                                    <div style="max-width:520px;max-height:220px;overflow:auto;background:var(--surface-2);border:1px solid var(--border);border-radius:8px;padding:10px;margin-top:6px">
                                                        <pre class="small" style="margin:0;white-space:pre-wrap"><?= e(str_limit((string) $version['content'], 3000)) ?></pre>
                                                    </div>
                                                </details>
                                                <form method="post" action="<?= e(admin_url('files')) ?>" style="display:inline"
                                                      data-confirm="Restore version <?= (int) $version['version'] ?>? The current body is kept in the history.">
                                                    <?= Csrf::field() ?>
                                                    <input type="hidden" name="do" value="restore">
                                                    <input type="hidden" name="path" value="<?= e((string) $file['path']) ?>">
                                                    <input type="hidden" name="version_id" value="<?= (int) $version['id'] ?>">
                                                    <button class="btn btn-sm" type="submit">Restore</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="stack" style="gap:18px">
        <div class="card">
            <div class="card-head"><h2>File</h2></div>
            <div class="card-body">
                <dl class="kv">
                    <dt>Path</dt><dd class="mono small"><?= e((string) $file['path']) ?></dd>
                    <dt>Language</dt><dd><?= e($language) ?></dd>
                    <dt>Size</dt><dd><?= e(number_format((int) $file['size'] / 1024, 1)) ?> KB</dd>
                    <dt>Lines</dt><dd><?= number_format((int) $file['lines']) ?></dd>
                    <dt>Modified</dt><dd class="small"><?= e(date('j M Y H:i', (int) $file['modified'])) ?></dd>
                </dl>
            </div>
        </div>

        <div class="card">
            <div class="card-head"><h2>Safety</h2></div>
            <div class="card-body">
                <ul class="small" style="padding-left:16px;margin:0;line-height:1.7">
                    <li>PHP is parsed before writing — a syntax error blocks the save.</li>
                    <li>Every save stores the previous body; nothing is overwritten blindly.</li>
                    <li>Files still referenced by <code>require</code> cannot be deleted.</li>
                    <li>The panel never writes into <code>uploads/</code>, and PHP execution is disabled there.</li>
                </ul>
            </div>
        </div>

        <?php if (!$readOnly): ?>
            <div class="card">
                <div class="card-head"><h2>Danger zone</h2></div>
                <div class="card-body">
                    <form method="post" action="<?= e(admin_url('files')) ?>"
                          data-confirm="Delete <?= e((string) $file['path']) ?>? This is refused if the file is still in use.">
                        <?= Csrf::field() ?>
                        <input type="hidden" name="do" value="delete">
                        <input type="hidden" name="path" value="<?= e((string) $file['path']) ?>">
                        <button class="btn btn-danger" type="submit"><?= admin_icon('trash', 15) ?> Delete this file</button>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
