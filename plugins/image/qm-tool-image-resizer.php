<?php
/**
 * Tool Name: Image Resizer
 * Shortcode: tool_image_resizer
 * Category: image-optimizers
 * Version: 1.0.0
 * Description: Resize an image to a width, a height or a percentage, keeping its proportions, and download it.
 * Language: en
 */

/*
 * Resizing is the part of "optimising" that actually removes pixels, and it is
 * the part most compressors leave out: they re-encode at the same dimensions and
 * then report a saving that was never going to be big.
 *
 * Three ways in — width, height, or a percentage — and whichever is typed, the
 * other is computed from the aspect ratio and shown, so nobody exports a
 * squashed picture by accident. Backing paper is optional (a photo printed
 * square), and it is off by default because a resize should not silently pad.
 *
 * The canvas is scaled with smoothing on, which is what makes a downscale look
 * sharp rather than aliased.
 */

declare(strict_types=1);

if (!defined('ONIM_TOOLKIT')) {
    http_response_code(403);
    exit('This file is a tool definition, not a page.');
}

use Onim\Toolkit;

Toolkit::addShortcode('tool_image_resizer', static function (array $atts, ?string $inner, array $ctx): string {
    $uid = (string) $ctx['uid'];
    $t   = static fn (string $key, string $default): string => Toolkit::t($key, $default);

    /* The arithmetic every resize does, printed on the server for the reader
       who has not chosen a file yet: 4032 × 3024 at 1200 wide is 1200 × 900. */
    $sampleW = 4032;
    $sampleH = 3024;
    $targetW = 1200;
    $targetH = (int) round($sampleH * $targetW / $sampleW);

    ob_start();
    ?>
    <div class="rstool" id="<?= Toolkit::e($uid) ?>">
        <style>
            #<?= Toolkit::e($uid) ?> .rstool-drop {
                display: grid; gap: 8px; padding: 16px 14px; border-radius: 10px; text-align: center;
                border: 1px dashed var(--border-strong, #C9CEDB); background: var(--surface-2, #F8F9FB);
            }
            #<?= Toolkit::e($uid) ?> .rstool-drop input[type="file"] { width: 100%; font-size: 13px; }
            #<?= Toolkit::e($uid) ?> .rstool-row { display: grid; grid-template-columns: minmax(0,1fr) minmax(0,1fr); gap: 10px; margin-top: 12px; }
            #<?= Toolkit::e($uid) ?> .rstool-preview {
                margin-top: 12px; border-radius: 10px; overflow: hidden; background: #EEF1F7;
                display: grid; place-items: center; min-height: 110px;
            }
            #<?= Toolkit::e($uid) ?> .rstool-preview img { display: block; max-width: 100%; height: auto; }
            #<?= Toolkit::e($uid) ?> .rstool-preview p { margin: 0; padding: 26px 14px; font-size: 12.8px; color: var(--ink-4, #66717F); text-align: center; }
            #<?= Toolkit::e($uid) ?> .rstool-facts {
                margin: 12px 0 0; padding: 0; list-style: none; display: grid; gap: 1px;
                border: 1px solid var(--border, #DFE2EB); border-radius: 10px; overflow: hidden;
            }
            #<?= Toolkit::e($uid) ?> .rstool-facts li { display: flex; justify-content: space-between; gap: 10px; padding: 8px 11px; background: var(--surface-2, #F8F9FB); font-size: 13px; }
            #<?= Toolkit::e($uid) ?> .rstool-facts span:first-child { color: var(--ink-3, #4B5259); }
            #<?= Toolkit::e($uid) ?> .rstool-facts span:last-child { font-weight: 600; font-variant-numeric: tabular-nums; }
            #<?= Toolkit::e($uid) ?> .rstool-note { margin: 10px 0 0; font-size: 12.4px; color: var(--ink-4, #66717F); line-height: 1.5; }
            #<?= Toolkit::e($uid) ?> .rstool-check { display: flex; align-items: center; gap: 8px; margin-top: 10px; font-size: 13px; }
            #<?= Toolkit::e($uid) ?> .rstool-check input { width: auto; }
        </style>

        <div class="rstool-drop">
            <label for="<?= Toolkit::e($uid) ?>-file" style="margin:0"><?= Toolkit::e($t('Choose an image', 'Choose an image')) ?></label>
            <input type="file" id="<?= Toolkit::e($uid) ?>-file" accept="image/*" data-rsz="file">
            <p style="margin:0;font-size:12.4px;color:var(--ink-4,#66717F)"><?= Toolkit::e($t('Read in this page — nothing is uploaded.', 'Read in this page — nothing is uploaded.')) ?></p>
        </div>

        <div class="rstool-row">
            <div>
                <label for="<?= Toolkit::e($uid) ?>-w"><?= Toolkit::e($t('Width (px)', 'Width (px)')) ?></label>
                <input type="text" inputmode="numeric" id="<?= Toolkit::e($uid) ?>-w" value="1200" data-rsz="w">
            </div>
            <div>
                <label for="<?= Toolkit::e($uid) ?>-h"><?= Toolkit::e($t('Height (px)', 'Height (px)')) ?></label>
                <input type="text" inputmode="numeric" id="<?= Toolkit::e($uid) ?>-h" placeholder="<?= Toolkit::e($t('auto', 'auto')) ?>" data-rsz="h">
            </div>
        </div>

        <div class="rstool-row" style="grid-template-columns:minmax(0,1fr) minmax(0,1fr)">
            <div>
                <label for="<?= Toolkit::e($uid) ?>-pct"><?= Toolkit::e($t('Or percentage', 'Or percentage')) ?></label>
                <input type="text" inputmode="numeric" id="<?= Toolkit::e($uid) ?>-pct" placeholder="%" data-rsz="pct">
            </div>
            <div>
                <label for="<?= Toolkit::e($uid) ?>-q"><?= Toolkit::e($t('Quality', 'Quality')) ?></label>
                <input type="range" id="<?= Toolkit::e($uid) ?>-q" min="50" max="100" step="1" value="88" data-rsz="q" style="padding:0">
            </div>
        </div>

        <label class="rstool-check" for="<?= Toolkit::e($uid) ?>-keep">
            <input type="checkbox" id="<?= Toolkit::e($uid) ?>-keep" checked data-rsz="keep">
            <?= Toolkit::e($t('Keep the proportions', 'Keep the proportions')) ?>
        </label>

        <div class="rstool-preview" data-rsz="preview">
            <p><?= Toolkit::e($t('The resized picture appears here.', 'The resized picture appears here.')) ?></p>
        </div>

        <ul class="rstool-facts">
            <li><span><?= Toolkit::e($t('Original', 'Original')) ?></span><span data-rsz="before">—</span></li>
            <li><span><?= Toolkit::e($t('New size', 'New size')) ?></span><span data-rsz="after">—</span></li>
            <li><span><?= Toolkit::e($t('File size', 'File size')) ?></span><span data-rsz="bytes">—</span></li>
        </ul>

        <button type="button" class="tool-btn" style="margin-top:12px" data-rsz="save" disabled><?= Toolkit::e($t('Download the resized image', 'Download the resized image')) ?></button>

        <p class="rstool-note">
            <?= Toolkit::e(strtr(
                $t('For example: {ow} × {oh} resized to {w} px wide becomes {w} × {h} px, and keeps {pct}% of its pixels.',
                   'For example: {ow} × {oh} resized to {w} px wide becomes {w} × {h} px, and keeps {pct}% of its pixels.'),
                [
                    '{ow}'  => (string) $sampleW,
                    '{oh}'  => (string) $sampleH,
                    '{w}'   => (string) $targetW,
                    '{h}'   => (string) $targetH,
                    '{pct}' => number_format($targetW * $targetH / ($sampleW * $sampleH) * 100, 1, '.', ' '),
                ]
            )) ?>
        </p>

        <script>
        (function () {
            var root = document.getElementById(<?= json_encode($uid) ?>);
            if (!root) return;
            var fileIn = root.querySelector('[data-rsz="file"]');
            var wIn = root.querySelector('[data-rsz="w"]');
            var hIn = root.querySelector('[data-rsz="h"]');
            var pctIn = root.querySelector('[data-rsz="pct"]');
            var qIn = root.querySelector('[data-rsz="q"]');
            var keep = root.querySelector('[data-rsz="keep"]');
            var preview = root.querySelector('[data-rsz="preview"]');
            var before = root.querySelector('[data-rsz="before"]');
            var after = root.querySelector('[data-rsz="after"]');
            var bytes = root.querySelector('[data-rsz="bytes"]');
            var saveBtn = root.querySelector('[data-rsz="save"]');
            var img = new Image();
            var blobOut = null;
            var baseName = 'image';
            var lock = false;

            function num(value) {
                var n = parseInt(String(value).replace(/[^\d]/g, ''), 10);
                return isFinite(n) && n > 0 ? n : 0;
            }
            function size(b) {
                if (b >= 1048576) return (b / 1048576).toFixed(2) + ' MB';
                return Math.max(1, Math.round(b / 1024)) + ' KB';
            }

            /* Which box was typed in decides what the other one becomes. */
            function sync(from) {
                if (!img.naturalWidth || lock) return;
                var ow = img.naturalWidth, oh = img.naturalHeight;
                lock = true;
                if (from === 'pct') {
                    var pct = num(pctIn.value);
                    if (pct > 0) {
                        wIn.value = Math.max(1, Math.round(ow * pct / 100));
                        hIn.value = Math.max(1, Math.round(oh * pct / 100));
                    }
                } else if (from === 'h') {
                    var h = num(hIn.value);
                    if (h > 0 && keep.checked) wIn.value = Math.max(1, Math.round(ow * h / oh));
                } else {
                    var w = num(wIn.value);
                    if (w > 0 && keep.checked) hIn.value = Math.max(1, Math.round(oh * w / ow));
                }
                lock = false;
                run();
            }

            function run() {
                if (!img.naturalWidth) return;
                var ow = img.naturalWidth, oh = img.naturalHeight;
                var w = num(wIn.value), h = num(hIn.value);
                if (!w && !h) return;
                if (!h) h = Math.max(1, Math.round(oh * w / ow));
                if (!w) w = Math.max(1, Math.round(ow * h / oh));
                var canvas = document.createElement('canvas');
                canvas.width = w;
                canvas.height = h;
                var ctx = canvas.getContext('2d');
                ctx.imageSmoothingEnabled = true;
                ctx.imageSmoothingQuality = 'high';
                ctx.fillStyle = '#fff';
                ctx.fillRect(0, 0, w, h);
                ctx.drawImage(img, 0, 0, w, h);
                canvas.toBlob(function (blob) {
                    if (!blob) return;
                    blobOut = blob;
                    var url = URL.createObjectURL(blob);
                    preview.innerHTML = '';
                    var shown = new Image();
                    shown.src = url;
                    shown.alt = 'Resized preview';
                    preview.appendChild(shown);
                    after.textContent = w + ' × ' + h + ' px';
                    bytes.textContent = size(blob.size);
                    saveBtn.disabled = false;
                }, 'image/jpeg', Number(qIn.value) / 100);
            }

            fileIn.addEventListener('change', function () {
                var file = fileIn.files && fileIn.files[0];
                if (!file) return;
                baseName = (file.name || 'image').replace(/\.[^.]+$/, '');
                var reader = new FileReader();
                reader.onload = function () {
                    img.onload = function () {
                        before.textContent = img.naturalWidth + ' × ' + img.naturalHeight + ' px';
                        wIn.value = img.naturalWidth;
                        hIn.value = img.naturalHeight;
                        saveBtn.disabled = true;
                        run();
                    };
                    img.src = reader.result;
                };
                reader.readAsDataURL(file);
            });

            ['input', 'change'].forEach(function (evt) {
                wIn.addEventListener(evt, function () { sync('w'); });
                hIn.addEventListener(evt, function () { sync('h'); });
                pctIn.addEventListener(evt, function () { sync('pct'); });
                qIn.addEventListener(evt, run);
            });

            saveBtn.addEventListener('click', function () {
                if (!blobOut) return;
                var a = document.createElement('a');
                a.href = URL.createObjectURL(blobOut);
                a.download = baseName + '-' + wIn.value + 'w.jpg';
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
                setTimeout(function () { URL.revokeObjectURL(a.href); }, 4000);
            });

            preview.querySelector('p').textContent = 'The resized picture appears here — ' +
                <?= json_encode('1200 × 900 px from a 4032 × 3024 original, for example.') ?>;
        })();
        </script>
    </div>
    <?php
    return (string) ob_get_clean();
});
