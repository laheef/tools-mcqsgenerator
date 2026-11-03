<?php
/**
 * The widget a tool file prints, run here and now.
 *
 * @var array  $tool
 * @var string $html     what the shortcode returned
 * @var string $error    why it returned nothing
 * @var float  $seconds  how long it took
 * @var array<int,string> $declared
 */

declare(strict_types=1);
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('ONIM_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}

?>
<div class="stack" style="gap:18px">

    <div class="card">
        <div class="card-head">
            <h2><?= e((string) $tool['name']) ?></h2>
            <span class="spacer"></span>
            <span class="badge <?= $tool['valid'] ? 'badge-ok' : 'badge-err' ?>"><?= $tool['valid'] ? 'renders' : 'cannot run' ?></span>
        </div>
        <div class="card-body preview-meta">
            <div><span class="muted small">Shortcode</span><code><?= e((string) $tool['shortcode']) ?></code></div>
            <div><span class="muted small">File</span><code>plugins/<?= e((string) $tool['file']) ?></code></div>
            <div><span class="muted small">Version</span><code><?= e((string) ($tool['version'] !== '' ? $tool['version'] : '—')) ?></code></div>
            <div><span class="muted small">Size</span><code><?= number_format((int) $tool['bytes']) ?> bytes</code></div>
            <?php if ($error === ''): ?>
                <div><span class="muted small">Rendered in</span><code><?= e((string) $seconds) ?> ms</code></div>
            <?php endif; ?>
            <?php if ($declared !== []): ?>
                <div><span class="muted small">Libraries</span><code><?= e(implode(', ', $declared)) ?></code></div>
            <?php endif; ?>
        </div>
    </div>

    <?php if ($error !== ''): ?>
        <div class="card">
            <div class="card-head"><h2><?= admin_icon('warning', 15) ?> The file did not render</h2></div>
            <div class="card-body small" style="line-height:1.6">
                <p style="margin:0"><?= e($error) ?></p>
            </div>
        </div>
    <?php else: ?>
        <div class="card">
            <div class="card-head">
                <h2><?= admin_icon('eye', 15) ?> The widget</h2>
                <span class="spacer"></span>
                <span class="muted small">exactly what the page will show in its calculator column</span>
            </div>
            <div class="card-body">
                <?php /* The widget markup comes from the file itself, which is panel
                         content — run it inside a scoped box so a tool's own
                         stylesheet cannot repaint the admin behind it. */ ?>
                <div class="tool-preview-frame"><?= $html ?></div>
            </div>
        </div>
    <?php endif; ?>

    <div class="card">
        <div class="card-body" style="display:flex;gap:10px;flex-wrap:wrap">
            <a class="btn btn-primary" href="<?= e(admin_url('tool-new', ['file' => (string) $tool['file']])) ?>">
                <?= admin_icon('plus', 15) ?> Make a page from this file
            </a>
            <a class="btn" href="<?= e(admin_url('tool-plugins')) ?>">Back to tool files</a>
            <span class="spacer"></span>
            <form method="post" action="<?= e(admin_url('tool-plugins')) ?>" data-confirm="Download this file to your computer?">
                <?= \Onim\Admin\Csrf::field() ?>
                <a class="btn" href="<?= e(admin_url('tool-plugins', ['do' => 'download', 'tool_file' => (string) $tool['file']])) ?>">
                    <?= admin_icon('download', 15) ?> Download the file
                </a>
            </form>
        </div>
    </div>
</div>
