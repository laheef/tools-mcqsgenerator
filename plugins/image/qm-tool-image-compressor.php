<?php
/**
 * Tool Name: Image Compressor
 * Shortcode: tool_image_compressor
 * Category: image-compressors
 * Version: 1.0.0
 * Description: Shrink a JPG, PNG or WebP in this page, see exactly what it saved, and download it.
 * Language: en
 */

/*
 * The compression is done by the browser's own encoder: the picture is drawn
 * into a canvas and exported at a chosen quality. Canvas encoders are the same
 * ones the browser uses to save a page, so a JPEG at 0.8 here is a normal JPEG
 * at 0.8 — not a re-invented one.
 *
 * Two things the tool deliberately shows, because the reader cannot otherwise
 * judge the result: the exact byte counts before and after, and the dimensions
 * (an image shrunk by resizing is a very different bargain from one shrunk by
 * quality, and the slider only does the second).
 *
 * PNG has no quality knob. Asking for PNG at 0.5 returns a PNG of the same size,
 * so the tool switches the output format to WebP or JPEG and says so rather than
 * pretending a number changed.
 */

declare(strict_types=1);

if (!defined('ONIM_TOOLKIT')) {
    http_response_code(403);
    exit('This file is a tool definition, not a page.');
}

use Onim\Toolkit;

Toolkit::addShortcode('tool_image_compressor', static function (array $atts, ?string $inner, array $ctx): string {
    $uid = (string) $ctx['uid'];
    $t   = static fn (string $key, string $default): string => Toolkit::t($key, $default);

    /* A worked example on the server, so the page says something before a file
       is chosen: 3.2 MB at quality 80 typically lands near a third of that. */
    $exampleIn  = 3.2 * 1024 * 1024;
    $exampleOut = 0.95 * 1024 * 1024;

    $kb = static function (int $bytes): string {
        if ($bytes >= 1024 * 1024) {
            return number_format($bytes / 1048576, 2, '.', ' ') . ' MB';
        }
        return number_format($bytes / 1024, 0, '.', ' ') . ' KB';
    };

    ob_start();
    ?>
    <div class="imgtool" id="<?= Toolkit::e($uid) ?>">
        <style>
            #<?= Toolkit::e($uid) ?> .imgtool-drop {
                display: grid; gap: 8px; padding: 16px 14px; border-radius: 10px; text-align: center;
                border: 1px dashed var(--border-strong, #C9CEDB); background: var(--surface-2, #F8F9FB);
            }
            #<?= Toolkit::e($uid) ?> .imgtool-drop input[type="file"] { width: 100%; font-size: 13px; }
            #<?= Toolkit::e($uid) ?> .imgtool-row { display: grid; gap: 10px; margin-top: 12px; }
            #<?= Toolkit::e($uid) ?> .imgtool-quality { display: flex; align-items: center; gap: 10px; }
            #<?= Toolkit::e($uid) ?> .imgtool-quality input[type="range"] { flex: 1 1 auto; }
            #<?= Toolkit::e($uid) ?> .imgtool-quality output {
                min-width: 62px; text-align: right; font-weight: 700; font-variant-numeric: tabular-nums;
                color: var(--brand-ink, #294CC2);
            }
            #<?= Toolkit::e($uid) ?> .imgtool-preview {
                margin-top: 12px; border-radius: 10px; overflow: hidden; background: #EEF1F7;
                display: grid; place-items: center; min-height: 110px;
            }
            #<?= Toolkit::e($uid) ?> .imgtool-preview img { display: block; max-width: 100%; height: auto; }
            #<?= Toolkit::e($uid) ?> .imgtool-preview p { margin: 0; padding: 28px 14px; font-size: 12.8px; color: var(--ink-4, #66717F); text-align: center; }
            #<?= Toolkit::e($uid) ?> .imgtool-facts {
                margin: 12px 0 0; padding: 0; list-style: none; display: grid; gap: 1px;
                border: 1px solid var(--border, #DFE2EB); border-radius: 10px; overflow: hidden;
            }
            #<?= Toolkit::e($uid) ?> .imgtool-facts li { display: flex; justify-content: space-between; gap: 10px; padding: 8px 11px; background: var(--surface-2, #F8F9FB); font-size: 13px; }
            #<?= Toolkit::e($uid) ?> .imgtool-facts span:first-child { color: var(--ink-3, #4B5259); }
            #<?= Toolkit::e($uid) ?> .imgtool-facts span:last-child { font-weight: 600; font-variant-numeric: tabular-nums; }
            #<?= Toolkit::e($uid) ?> .imgtool-facts li[data-good] span:last-child { color: #0F7B4F; }
            #<?= Toolkit::e($uid) ?> .imgtool-note { margin: 10px 0 0; font-size: 12.4px; color: var(--ink-4, #66717F); line-height: 1.5; }
        </style>

        <div class="imgtool-drop">
            <label for="<?= Toolkit::e($uid) ?>-file" style="margin:0"><?= Toolkit::e($t('Choose an image', 'Choose an image')) ?></label>
            <input type="file" id="<?= Toolkit::e($uid) ?>-file" accept="image/*" data-img="file">
            <p style="margin:0;font-size:12.4px;color:var(--ink-4,#66717F)"><?= Toolkit::e($t('JPG, PNG, WebP, GIF or AVIF. Read in this page — nothing is uploaded.', 'JPG, PNG, WebP, GIF or AVIF. Read in this page — nothing is uploaded.')) ?></p>
        </div>

        <div class="imgtool-row">
            <div>
                <label for="<?= Toolkit::e($uid) ?>-q"><?= Toolkit::e($t('Quality', 'Quality')) ?></label>
                <div class="imgtool-quality">
                    <input type="range" id="<?= Toolkit::e($uid) ?>-q" min="30" max="95" step="1" value="78" data-img="quality">
                    <output data-img="quality-out">78</output>
                </div>
            </div>
            <div>
                <label for="<?= Toolkit::e($uid) ?>-format"><?= Toolkit::e($t('Save as', 'Save as')) ?></label>
                <select id="<?= Toolkit::e($uid) ?>-format" data-img="format">
                    <option value="auto"><?= Toolkit::e($t('Same as the original', 'Same as the original')) ?></option>
                    <option value="image/jpeg">JPEG</option>
                    <option value="image/webp">WebP</option>
                </select>
            </div>
        </div>

        <div class="imgtool-preview" data-img="preview">
            <p><?= Toolkit::e($t('The compressed picture appears here with its new size.', 'The compressed picture appears here with its new size.')) ?></p>
        </div>

        <ul class="imgtool-facts">
            <li><span><?= Toolkit::e($t('Original', 'Original')) ?></span><span data-img="before">—</span></li>
            <li><span><?= Toolkit::e($t('Compressed', 'Compressed')) ?></span><span data-img="after">—</span></li>
            <li data-img="saved-row"><span><?= Toolkit::e($t('Saved', 'Saved')) ?></span><span data-img="saved">—</span></li>
            <li><span><?= Toolkit::e($t('Dimensions', 'Dimensions')) ?></span><span data-img="dims">—</span></li>
        </ul>

        <button type="button" class="tool-btn" style="margin-top:12px" data-img="save" disabled><?= Toolkit::e($t('Download the compressed image', 'Download the compressed image')) ?></button>

        <p class="imgtool-note">
            <?= Toolkit::e(strtr(
                $t('Rule of thumb: {in} → {out} at quality 80, about {pct}% smaller. A PNG has no quality setting — it is lossless — so this tool saves PNGs as WebP and tells you.',
                   'Rule of thumb: {in} → {out} at quality 80, about {pct}% smaller. A PNG has no quality setting — it is lossless — so this tool saves PNGs as WebP and tells you.'),
                [
                    '{in}'  => $kb((int) $exampleIn),
                    '{out}' => $kb((int) $exampleOut),
                    '{pct}' => (string) (int) round((1 - $exampleOut / $exampleIn) * 100),
                ]
            )) ?>
        </p>

        <script>
        (function () {
            var root = document.getElementById(<?= json_encode($uid) ?>);
            if (!root) return;
            var fileIn = root.querySelector('[data-img="file"]');
            var quality = root.querySelector('[data-img="quality"]');
            var qualityOut = root.querySelector('[data-img="quality-out"]');
            var format = root.querySelector('[data-img="format"]');
            var preview = root.querySelector('[data-img="preview"]');
            var before = root.querySelector('[data-img="before"]');
            var after = root.querySelector('[data-img="after"]');
            var saved = root.querySelector('[data-img="saved"]');
            var savedRow = root.querySelector('[data-img="saved-row"]');
            var dims = root.querySelector('[data-img="dims"]');
            var saveBtn = root.querySelector('[data-img="save"]');
            var img = new Image();
            var blobOut = null;
            var originalType = '';
            var name = 'image';

            function size(bytes) {
                if (bytes >= 1048576) return (bytes / 1048576).toFixed(2) + ' MB';
                return Math.max(1, Math.round(bytes / 1024)) + ' KB';
            }

            function note(text) {
                var p = preview.querySelector('p');
                if (p) p.textContent = text;
                else {
                    p = document.createElement('p');
                    p.textContent = text;
                    preview.appendChild(p);
                }
            }

            function targetType() {
                var chosen = format.value;
                if (chosen !== 'auto') return chosen;
                /* PNG and GIF cannot be made smaller by a quality setting. */
                if (originalType === 'image/png' || originalType === 'image/gif' || originalType === '') return 'image/webp';
                return originalType === 'image/webp' ? 'image/webp' : 'image/jpeg';
            }

            function run() {
                if (!img.naturalWidth) return;
                var type = targetType();
                var q = Number(quality.value) / 100;
                var canvas = document.createElement('canvas');
                canvas.width = img.naturalWidth;
                canvas.height = img.naturalHeight;
                var ctx = canvas.getContext('2d');
                /* JPEG has no alpha: paint white first so a PNG's transparency
                   does not turn black. */
                if (type === 'image/jpeg') {
                    ctx.fillStyle = '#fff';
                    ctx.fillRect(0, 0, canvas.width, canvas.height);
                }
                ctx.drawImage(img, 0, 0);

                canvas.toBlob(function (blob) {
                    if (!blob) { note('This browser cannot encode that format. Try WebP or JPEG.'); return; }
                    blobOut = blob;
                    var url = URL.createObjectURL(blob);
                    preview.innerHTML = '';
                    var shown = new Image();
                    shown.src = url;
                    shown.alt = 'Compressed preview';
                    preview.appendChild(shown);
                    after.textContent = size(blob.size);
                    dims.textContent = canvas.width + ' × ' + canvas.height + ' px';
                    var originalSize = fileIn.files && fileIn.files[0] ? fileIn.files[0].size : 0;
                    if (originalSize > 0) {
                        var change = Math.round((1 - blob.size / originalSize) * 100);
                        saved.textContent = (change >= 0 ? change + '% smaller' : Math.abs(change) + '% bigger');
                        if (change > 0) savedRow.setAttribute('data-good', '1');
                        else savedRow.removeAttribute('data-good');
                    }
                    saveBtn.disabled = false;
                    saveBtn.setAttribute('data-type', type);
                }, type, q);
            }

            fileIn.addEventListener('change', function () {
                var file = fileIn.files && fileIn.files[0];
                if (!file) return;
                originalType = file.type;
                name = (file.name || 'image').replace(/\.[^.]+$/, '');
                before.textContent = size(file.size);
                saved.textContent = '—';
                saveBtn.disabled = true;
                var reader = new FileReader();
                reader.onload = function () {
                    img.onload = run;
                    img.src = reader.result;
                };
                reader.readAsDataURL(file);
            });

            quality.addEventListener('input', function () {
                qualityOut.textContent = quality.value;
            });
            quality.addEventListener('change', run);
            format.addEventListener('change', run);

            saveBtn.addEventListener('click', function () {
                if (!blobOut) return;
                var ext = { 'image/jpeg': 'jpg', 'image/webp': 'webp', 'image/png': 'png' }[saveBtn.getAttribute('data-type')] || 'jpg';
                var a = document.createElement('a');
                a.href = URL.createObjectURL(blobOut);
                a.download = name + '-compressed.' + ext;
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
                setTimeout(function () { URL.revokeObjectURL(a.href); }, 4000);
            });
        })();
        </script>
    </div>
    <?php
    return (string) ob_get_clean();
});
