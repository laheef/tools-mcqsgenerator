<?php
/**
 * Tool Name: Image to Base64
 * Shortcode: tool_image_base64
 * Category: image-utilities
 * Version: 1.0.0
 * Description: Turn an image into a data URI for CSS or HTML, or turn a data URI back into a file.
 * Language: en
 */

/*
 * Two directions, because the same person needs both. Inlining a small icon in
 * CSS is a data URI; getting the picture back out of a stylesheet someone else
 * wrote is the same conversion read backwards.
 *
 * The size penalty is the thing nobody warns about: base64 is 4 characters for
 * every 3 bytes, so a file grows by a third before any markup around it. The
 * tool prints both numbers next to each other instead of leaving the reader to
 * discover it in a bundle report.
 */

declare(strict_types=1);

if (!defined('ONIM_TOOLKIT')) {
    http_response_code(403);
    exit('This file is a tool definition, not a page.');
}

use Onim\Toolkit;

Toolkit::addShortcode('tool_image_base64', static function (array $atts, ?string $inner, array $ctx): string {
    $uid = (string) $ctx['uid'];
    $t   = static fn (string $key, string $default): string => Toolkit::t($key, $default);

    /* 4 characters per 3 bytes, plus the "data:image/png;base64," prefix. */
    $sampleBytes = 12 * 1024;
    $sampleChars = (int) (ceil($sampleBytes / 3) * 4);

    ob_start();
    ?>
    <div class="b64tool" id="<?= Toolkit::e($uid) ?>">
        <style>
            #<?= Toolkit::e($uid) ?> .b64tool-drop {
                display: grid; gap: 8px; padding: 16px 14px; border-radius: 10px; text-align: center;
                border: 1px dashed var(--border-strong, #C9CEDB); background: var(--surface-2, #F8F9FB);
            }
            #<?= Toolkit::e($uid) ?> .b64tool-drop input[type="file"] { width: 100%; font-size: 13px; }
            #<?= Toolkit::e($uid) ?> .b64tool-tabs { display: flex; gap: 6px; margin-bottom: 12px; }
            #<?= Toolkit::e($uid) ?> .b64tool-tabs button {
                flex: 1 1 0; font: inherit; font-size: 13px; font-weight: 600; padding: 8px 10px; cursor: pointer;
                background: var(--surface-2, #F8F9FB); border: 1px solid var(--border, #DFE2EB);
                color: var(--ink-3, #4B5259); border-radius: 8px;
            }
            #<?= Toolkit::e($uid) ?> .b64tool-tabs button[aria-selected="true"] {
                background: var(--brand-soft, #EBEFFF); border-color: #C4CFFB; color: var(--brand-ink, #294CC2);
            }
            #<?= Toolkit::e($uid) ?> textarea { font-family: ui-monospace, SFMono-Regular, Menlo, Consolas, monospace; font-size: 12px; line-height: 1.5; }
            #<?= Toolkit::e($uid) ?> .b64tool-out { min-height: 110px; }
            #<?= Toolkit::e($uid) ?> .b64tool-facts {
                margin: 12px 0 0; padding: 0; list-style: none; display: grid; gap: 1px;
                border: 1px solid var(--border, #DFE2EB); border-radius: 10px; overflow: hidden;
            }
            #<?= Toolkit::e($uid) ?> .b64tool-facts li { display: flex; justify-content: space-between; gap: 10px; padding: 8px 11px; background: var(--surface-2, #F8F9FB); font-size: 13px; }
            #<?= Toolkit::e($uid) ?> .b64tool-facts span:first-child { color: var(--ink-3, #4B5259); }
            #<?= Toolkit::e($uid) ?> .b64tool-facts span:last-child { font-weight: 600; font-variant-numeric: tabular-nums; }
            #<?= Toolkit::e($uid) ?> .b64tool-note { margin: 10px 0 0; font-size: 12.4px; color: var(--ink-4, #66717F); line-height: 1.5; }
            #<?= Toolkit::e($uid) ?> .b64tool-buttons { display: grid; grid-template-columns: 1fr 1fr; gap: 8px; margin-top: 10px; }
        </style>

        <div class="b64tool-tabs" role="tablist">
            <button type="button" role="tab" aria-selected="true" data-b64="tab-encode"><?= Toolkit::e($t('Image → Base64', 'Image → Base64')) ?></button>
            <button type="button" role="tab" aria-selected="false" data-b64="tab-decode"><?= Toolkit::e($t('Base64 → image', 'Base64 → image')) ?></button>
        </div>

        <div data-b64="pane-encode">
            <div class="b64tool-drop">
                <label for="<?= Toolkit::e($uid) ?>-file" style="margin:0"><?= Toolkit::e($t('Choose an image', 'Choose an image')) ?></label>
                <input type="file" id="<?= Toolkit::e($uid) ?>-file" accept="image/*" data-b64="file">
                <p style="margin:0;font-size:12.4px;color:var(--ink-4,#66717F)"><?= Toolkit::e($t('Read in this page — nothing is uploaded.', 'Read in this page — nothing is uploaded.')) ?></p>
            </div>
            <label for="<?= Toolkit::e($uid) ?>-uri" style="margin-top:12px"><?= Toolkit::e($t('Data URI', 'Data URI')) ?></label>
            <textarea id="<?= Toolkit::e($uid) ?>-uri" class="b64tool-out" readonly data-b64="uri" placeholder="<?= Toolkit::e($t('The data URI appears here.', 'The data URI appears here.')) ?>"></textarea>
            <div class="b64tool-buttons">
                <button type="button" class="tool-btn" data-b64="copy"><?= Toolkit::e($t('Copy', 'Copy')) ?></button>
                <button type="button" class="tool-btn tool-btn--ghost" data-b64="css"><?= Toolkit::e($t('Copy as CSS', 'Copy as CSS')) ?></button>
            </div>
        </div>

        <div data-b64="pane-decode" hidden>
            <label for="<?= Toolkit::e($uid) ?>-paste"><?= Toolkit::e($t('Paste a data URI or bare base64', 'Paste a data URI or bare base64')) ?></label>
            <textarea id="<?= Toolkit::e($uid) ?>-paste" data-b64="paste" placeholder="data:image/png;base64,iVBORw0KGgo…"></textarea>
            <div class="b64tool-buttons" style="grid-template-columns:1fr">
                <button type="button" class="tool-btn" data-b64="decode" disabled><?= Toolkit::e($t('Show the image and download it', 'Show the image and download it')) ?></button>
            </div>
            <div style="margin-top:12px;border-radius:10px;overflow:hidden;background:#EEF1F7;display:grid;place-items:center;min-height:90px">
                <img alt="" data-b64="decoded" style="display:none;max-width:100%;height:auto">
            </div>
        </div>

        <ul class="b64tool-facts">
            <li><span><?= Toolkit::e($t('File size', 'File size')) ?></span><span data-b64="size">—</span></li>
            <li><span><?= Toolkit::e($t('Base64 length', 'Base64 length')) ?></span><span data-b64="chars">—</span></li>
            <li><span><?= Toolkit::e($t('Overhead', 'Overhead')) ?></span><span data-b64="overhead">—</span></li>
        </ul>

        <p class="b64tool-note">
            <?= Toolkit::e(strtr(
                $t('Every 3 bytes become 4 characters, so a {kb} KB image is about {b64} KB of text — worth it for a 2 KB icon, not for a hero image.',
                   'Every 3 bytes become 4 characters, so a {kb} KB image is about {b64} KB of text — worth it for a 2 KB icon, not for a hero image.'),
                ['{kb}' => number_format($sampleBytes / 1024, 0, '.', ' '), '{b64}' => number_format($sampleChars / 1024, 1, '.', ' ')]
            )) ?>
        </p>

        <script>
        (function () {
            var root = document.getElementById(<?= json_encode($uid) ?>);
            if (!root) return;
            var tabs = root.querySelectorAll('[data-b64^="tab-"]');
            var panes = {
                encode: root.querySelector('[data-b64="pane-encode"]'),
                decode: root.querySelector('[data-b64="pane-decode"]')
            };
            var fileIn = root.querySelector('[data-b64="file"]');
            var uri = root.querySelector('[data-b64="uri"]');
            var paste = root.querySelector('[data-b64="paste"]');
            var decoded = root.querySelector('[data-b64="decoded"]');
            var sizeOut = root.querySelector('[data-b64="size"]');
            var charsOut = root.querySelector('[data-b64="chars"]');
            var overheadOut = root.querySelector('[data-b64="overhead"]');
            var decodeBtn = root.querySelector('[data-b64="decode"]');
            var current = 'encode';

            function show(which) {
                current = which;
                panes.encode.hidden = which !== 'encode';
                panes.decode.hidden = which !== 'decode';
                tabs.forEach(function (tab) {
                    tab.setAttribute('aria-selected', tab.getAttribute('data-b64') === 'tab-' + which ? 'true' : 'false');
                });
            }
            tabs.forEach(function (tab) {
                tab.addEventListener('click', function () { show(tab.getAttribute('data-b64').replace('tab-', '')); });
            });

            function kb(b) {
                return b >= 1048576 ? (b / 1048576).toFixed(2) + ' MB' : (b / 1024).toFixed(1) + ' KB';
            }

            fileIn.addEventListener('change', function () {
                var file = fileIn.files && fileIn.files[0];
                if (!file) return;
                var reader = new FileReader();
                reader.onload = function () {
                    uri.value = String(reader.result);
                    sizeOut.textContent = kb(file.size);
                    charsOut.textContent = uri.value.length.toLocaleString('en-US').replace(/,/g, ' ');
                    var ratio = Math.round((uri.value.length / file.size - 1) * 100);
                    overheadOut.textContent = '+' + ratio + '%';
                };
                reader.readAsDataURL(file);
            });

            function copy(text, label) {
                var done = function () {
                    var old = label.textContent;
                    label.textContent = 'Copied';
                    setTimeout(function () { label.textContent = old; }, 1400);
                };
                if (navigator.clipboard && navigator.clipboard.writeText) {
                    navigator.clipboard.writeText(text).then(done, function () { uri.select(); });
                } else {
                    uri.select();
                    try { document.execCommand('copy'); done(); } catch (e) {}
                }
            }

            root.querySelector('[data-b64="copy"]').addEventListener('click', function () {
                if (uri.value) copy(uri.value, this);
            });
            root.querySelector('[data-b64="css"]').addEventListener('click', function () {
                if (uri.value) copy('background-image: url("' + uri.value + '");', this);
            });

            paste.addEventListener('input', function () {
                decodeBtn.disabled = paste.value.trim() === '';
            });

            decodeBtn.addEventListener('click', function () {
                var value = paste.value.trim();
                if (value.indexOf('data:') !== 0) {
                    /* Bare base64: assume PNG, which is what a copy-pasted
                       snippet almost always is. */
                    value = 'data:image/png;base64,' + value.replace(/\s+/g, '');
                }
                decoded.src = value;
                decoded.style.display = 'block';
                var comma = value.indexOf(',');
                var payload = comma >= 0 ? value.slice(comma + 1) : value;
                var bytes = Math.floor(payload.length * 3 / 4);
                sizeOut.textContent = kb(bytes);
                charsOut.textContent = String(value.length);
                overheadOut.textContent = '+' + Math.round((value.length / bytes - 1) * 100) + '%';
                var a = document.createElement('a');
                a.href = value;
                var type = (value.match(/^data:([^;]+)/) || [])[1] || 'image/png';
                a.download = 'decoded.' + (type.split('/')[1] || 'png').replace('jpeg', 'jpg');
                a.textContent = 'Download';
                a.className = 'tool-btn tool-btn--ghost';
                a.style.marginTop = '10px';
                var old = root.querySelector('[data-b64="download"]');
                if (old) old.remove();
                a.setAttribute('data-b64', 'download');
                decodeBtn.parentNode.appendChild(a);
            });
        })();
        </script>
    </div>
    <?php
    return (string) ob_get_clean();
});
