<?php
/**
 * Tool Name: Image Converter
 * Shortcode: tool_image_converter
 * Category: img-converters
 * Version: 1.0.0
 * Description: Convert a JPG, PNG, WebP or GIF to another format in the browser, with the byte count shown.
 * Language: en
 */

/*
 * Format conversion is a canvas round trip: decode the source, draw it, encode
 * it again in the format asked for. The browser decides which formats it can
 * encode, so the tool asks before it offers a button — a WebP button in an old
 * Safari that silently writes a PNG is worse than no button.
 *
 * The one case worth spelling out: JPEG has no transparency. A transparent PNG
 * converted to JPEG gets white behind the see-through pixels, and the tool says
 * so in place rather than leaving a black box where the alpha was.
 */

declare(strict_types=1);

if (!defined('ONIM_TOOLKIT')) {
    http_response_code(403);
    exit('This file is a tool definition, not a page.');
}

use Onim\Toolkit;

Toolkit::addShortcode('tool_image_converter', static function (array $atts, ?string $inner, array $ctx): string {
    $uid = (string) $ctx['uid'];
    $t   = static fn (string $key, string $default): string => Toolkit::t($key, $default);

    ob_start();
    ?>
    <div class="cvttool" id="<?= Toolkit::e($uid) ?>">
        <style>
            #<?= Toolkit::e($uid) ?> .cvttool-drop {
                display: grid; gap: 8px; padding: 16px 14px; border-radius: 10px; text-align: center;
                border: 1px dashed var(--border-strong, #C9CEDB); background: var(--surface-2, #F8F9FB);
            }
            #<?= Toolkit::e($uid) ?> .cvttool-drop input[type="file"] { width: 100%; font-size: 13px; }
            #<?= Toolkit::e($uid) ?> .cvttool-preview {
                margin-top: 12px; border-radius: 10px; overflow: hidden; min-height: 110px;
                display: grid; place-items: center;
                background-color: #fff;
                background-image: linear-gradient(45deg,#EDEFF4 25%,transparent 25%),linear-gradient(-45deg,#EDEFF4 25%,transparent 25%),linear-gradient(45deg,transparent 75%,#EDEFF4 75%),linear-gradient(-45deg,transparent 75%,#EDEFF4 75%);
                background-size: 16px 16px; background-position: 0 0,0 8px,8px -8px,-8px 0;
                border: 1px solid var(--border, #DFE2EB);
            }
            #<?= Toolkit::e($uid) ?> .cvttool-preview img { display: block; max-width: 100%; height: auto; }
            #<?= Toolkit::e($uid) ?> .cvttool-preview p { margin: 0; padding: 26px 14px; font-size: 12.8px; color: var(--ink-4, #66717F); text-align: center; background: #fff; }
            #<?= Toolkit::e($uid) ?> .cvttool-facts {
                margin: 12px 0 0; padding: 0; list-style: none; display: grid; gap: 1px;
                border: 1px solid var(--border, #DFE2EB); border-radius: 10px; overflow: hidden;
            }
            #<?= Toolkit::e($uid) ?> .cvttool-facts li { display: flex; justify-content: space-between; gap: 10px; padding: 8px 11px; background: var(--surface-2, #F8F9FB); font-size: 13px; }
            #<?= Toolkit::e($uid) ?> .cvttool-facts span:first-child { color: var(--ink-3, #4B5259); }
            #<?= Toolkit::e($uid) ?> .cvttool-facts span:last-child { font-weight: 600; font-variant-numeric: tabular-nums; }
            #<?= Toolkit::e($uid) ?> .cvttool-note { margin: 10px 0 0; font-size: 12.4px; color: var(--ink-4, #66717F); line-height: 1.5; }
            #<?= Toolkit::e($uid) ?> .cvttool-note[data-warn] { color: #8A5A00; }
        </style>

        <div class="cvttool-drop">
            <label for="<?= Toolkit::e($uid) ?>-file" style="margin:0"><?= Toolkit::e($t('Choose an image', 'Choose an image')) ?></label>
            <input type="file" id="<?= Toolkit::e($uid) ?>-file" accept="image/*" data-cvt="file">
            <p style="margin:0;font-size:12.4px;color:var(--ink-4,#66717F)"><?= Toolkit::e($t('Read in this page — nothing is uploaded.', 'Read in this page — nothing is uploaded.')) ?></p>
        </div>

        <div class="cvttool-row" style="margin-top:12px;display:grid;gap:10px">
            <div>
                <label for="<?= Toolkit::e($uid) ?>-to"><?= Toolkit::e($t('Convert to', 'Convert to')) ?></label>
                <select id="<?= Toolkit::e($uid) ?>-to" data-cvt="to">
                    <option value="image/png">PNG</option>
                    <option value="image/jpeg">JPEG</option>
                    <option value="image/webp">WebP</option>
                </select>
            </div>
            <div>
                <label for="<?= Toolkit::e($uid) ?>-q"><?= Toolkit::e($t('Quality for lossy formats', 'Quality for lossy formats')) ?></label>
                <div style="display:flex;align-items:center;gap:10px">
                    <input type="range" id="<?= Toolkit::e($uid) ?>-q" min="40" max="100" step="1" value="90" data-cvt="quality" style="flex:1 1 auto">
                    <output data-cvt="quality-out" style="min-width:44px;text-align:right;font-weight:700;font-variant-numeric:tabular-nums;color:var(--brand-ink,#294CC2)">90</output>
                </div>
            </div>
        </div>

        <div class="cvttool-preview" data-cvt="preview">
            <p><?= Toolkit::e($t('The converted picture appears here.', 'The converted picture appears here.')) ?></p>
        </div>

        <ul class="cvttool-facts">
            <li><span><?= Toolkit::e($t('From', 'From')) ?></span><span data-cvt="from">—</span></li>
            <li><span><?= Toolkit::e($t('To', 'To')) ?></span><span data-cvt="to-label">—</span></li>
            <li><span><?= Toolkit::e($t('Size', 'Size')) ?></span><span data-cvt="size">—</span></li>
            <li><span><?= Toolkit::e($t('Dimensions', 'Dimensions')) ?></span><span data-cvt="dims">—</span></li>
        </ul>

        <button type="button" class="tool-btn" style="margin-top:12px" data-cvt="save" disabled><?= Toolkit::e($t('Download the converted image', 'Download the converted image')) ?></button>

        <p class="cvttool-note" data-cvt="note">
            <?= Toolkit::e($t('Formats are encoded by this browser. If it cannot write the one you pick, it says so instead of quietly saving a different file.', 'Formats are encoded by this browser. If it cannot write the one you pick, it says so instead of quietly saving a different file.')) ?>
        </p>

        <script>
        (function () {
            var root = document.getElementById(<?= json_encode($uid) ?>);
            if (!root) return;
            var fileIn = root.querySelector('[data-cvt="file"]');
            var to = root.querySelector('[data-cvt="to"]');
            var quality = root.querySelector('[data-cvt="quality"]');
            var qualityOut = root.querySelector('[data-cvt="quality-out"]');
            var preview = root.querySelector('[data-cvt="preview"]');
            var from = root.querySelector('[data-cvt="from"]');
            var toLabel = root.querySelector('[data-cvt="to-label"]');
            var sizeOut = root.querySelector('[data-cvt="size"]');
            var dims = root.querySelector('[data-cvt="dims"]');
            var saveBtn = root.querySelector('[data-cvt="save"]');
            var note = root.querySelector('[data-cvt="note"]');
            var img = new Image();
            var blobOut = null;
            var baseName = 'image';

            function size(bytes) {
                if (bytes >= 1048576) return (bytes / 1048576).toFixed(2) + ' MB';
                return Math.max(1, Math.round(bytes / 1024)) + ' KB';
            }
            function label(type) {
                return { 'image/png': 'PNG', 'image/jpeg': 'JPEG', 'image/webp': 'WebP', 'image/gif': 'GIF', 'image/avif': 'AVIF' }[type] || (type || 'unknown');
            }
            function say(text, warn) {
                note.textContent = text;
                if (warn) note.setAttribute('data-warn', '1'); else note.removeAttribute('data-warn');
            }

            /* Ask the browser which formats it can actually write. */
            var canWrite = {};
            ['image/png', 'image/jpeg', 'image/webp'].forEach(function (type) {
                var c = document.createElement('canvas');
                c.width = c.height = 1;
                var data = c.toDataURL(type);
                canWrite[type] = data.indexOf('data:' + type) === 0;
                if (!canWrite[type]) {
                    var option = to.querySelector('option[value="' + type + '"]');
                    if (option) { option.disabled = true; option.textContent += ' (not in this browser)'; }
                }
            });

            function run() {
                if (!img.naturalWidth) return;
                var type = to.value;
                var canvas = document.createElement('canvas');
                canvas.width = img.naturalWidth;
                canvas.height = img.naturalHeight;
                var ctx = canvas.getContext('2d');
                var warning = '';
                if (type === 'image/jpeg') {
                    ctx.fillStyle = '#fff';
                    ctx.fillRect(0, 0, canvas.width, canvas.height);
                    if (img.src.indexOf('image/jpeg') === -1) {
                        warning = 'Transparent pixels were filled with white — JPEG has no alpha channel.';
                    }
                }
                ctx.drawImage(img, 0, 0);
                canvas.toBlob(function (blob) {
                    if (!blob || (blob.type && blob.type !== type)) {
                        say('This browser cannot write ' + label(type) + '. Pick another format.', true);
                        return;
                    }
                    blobOut = blob;
                    var url = URL.createObjectURL(blob);
                    preview.innerHTML = '';
                    var shown = new Image();
                    shown.src = url;
                    shown.alt = label(type) + ' conversion';
                    preview.appendChild(shown);
                    sizeOut.textContent = size(blob.size);
                    dims.textContent = canvas.width + ' × ' + canvas.height + ' px';
                    toLabel.textContent = label(type) + (type === 'image/png' ? '' : ' at ' + quality.value + '%');
                    saveBtn.disabled = false;
                    say(warning !== '' ? warning : 'Converted in this page. Nothing was uploaded.', warning !== '');
                }, type, Number(quality.value) / 100);
            }

            fileIn.addEventListener('change', function () {
                var file = fileIn.files && fileIn.files[0];
                if (!file) return;
                baseName = (file.name || 'image').replace(/\.[^.]+$/, '');
                from.textContent = label(file.type) + ' · ' + size(file.size);
                saveBtn.disabled = true;
                var reader = new FileReader();
                reader.onload = function () {
                    img.onload = run;
                    img.src = reader.result;
                };
                reader.readAsDataURL(file);
            });

            quality.addEventListener('input', function () { qualityOut.textContent = quality.value; });
            quality.addEventListener('change', run);
            to.addEventListener('change', run);

            saveBtn.addEventListener('click', function () {
                if (!blobOut) return;
                var ext = { 'image/png': 'png', 'image/jpeg': 'jpg', 'image/webp': 'webp' }[blobOut.type] || 'img';
                var a = document.createElement('a');
                a.href = URL.createObjectURL(blobOut);
                a.download = baseName + '.' + ext;
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
