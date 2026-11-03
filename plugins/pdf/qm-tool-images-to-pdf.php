<?php
/**
 * Tool Name: Images to PDF
 * Shortcode: tool_images_to_pdf
 * Category: pdf-converters
 * Version: 1.0.0
 * Description: Put photos or scans into one PDF, one per page, without uploading them.
 * Language: en
 */

/*
 * A PDF is an ordered list of objects and a table saying where each one starts.
 * That is the whole of it — the 700-page specification is about everything a PDF
 * *may* contain, not everything it must. This file writes the smallest correct
 * one: a catalogue, a page tree, and for each page a content stream that draws
 * one image.
 *
 * The image is embedded with /DCTDecode, which is the format a JPEG is already
 * in — the browser hands over the JPEG bytes and the PDF carries them verbatim,
 * so nothing is re-encoded a second time. Everything that is not a JPEG (PNG,
 * WebP, screenshots) is drawn into a canvas and exported as JPEG first, which is
 * also where transparency is flattened to white.
 *
 * Sizes: A4 is 595.28 × 841.89 points (210 × 297 mm at 72 points per inch), and
 * the page box is that minus the margin on each side. The image is scaled to fit
 * inside it and centred, never stretched.
 */

declare(strict_types=1);

if (!defined('ONIM_TOOLKIT')) {
    http_response_code(403);
    exit('This file is a tool definition, not a page.');
}

use Onim\Toolkit;

Toolkit::addShortcode('tool_images_to_pdf', static function (array $atts, ?string $inner, array $ctx): string {
    $uid = (string) $ctx['uid'];
    $t   = static fn (string $key, string $default): string => Toolkit::t($key, $default);

    $a4w = 595.28;
    $a4h = 841.89;

    ob_start();
    ?>
    <div class="pdftool" id="<?= Toolkit::e($uid) ?>">
        <style>
            #<?= Toolkit::e($uid) ?> .pdftool-drop {
                display: grid; gap: 8px; padding: 16px 14px; border-radius: 10px; text-align: center;
                border: 1px dashed var(--border-strong, #C9CEDB); background: var(--surface-2, #F8F9FB);
            }
            #<?= Toolkit::e($uid) ?> .pdftool-drop input[type="file"] { width: 100%; font-size: 13px; }
            #<?= Toolkit::e($uid) ?> .pdftool-row { display: grid; grid-template-columns: minmax(0,1fr) minmax(0,1fr); gap: 10px; margin-top: 12px; }
            #<?= Toolkit::e($uid) ?> .pdftool-list { margin: 12px 0 0; padding: 0; list-style: none; display: grid; gap: 6px; }
            #<?= Toolkit::e($uid) ?> .pdftool-list li {
                display: flex; align-items: center; gap: 9px; padding: 7px 9px; border-radius: 8px;
                background: var(--surface-2, #F8F9FB); border: 1px solid var(--border, #DFE2EB); font-size: 13px;
            }
            #<?= Toolkit::e($uid) ?> .pdftool-list img { width: 34px; height: 34px; object-fit: cover; border-radius: 5px; flex: 0 0 auto; }
            #<?= Toolkit::e($uid) ?> .pdftool-list span { flex: 1 1 auto; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
            #<?= Toolkit::e($uid) ?> .pdftool-list small { color: var(--ink-4, #66717F); font-variant-numeric: tabular-nums; }
            #<?= Toolkit::e($uid) ?> .pdftool-facts {
                margin: 12px 0 0; padding: 0; list-style: none; display: grid; gap: 1px;
                border: 1px solid var(--border, #DFE2EB); border-radius: 10px; overflow: hidden;
            }
            #<?= Toolkit::e($uid) ?> .pdftool-facts li { display: flex; justify-content: space-between; gap: 10px; padding: 8px 11px; background: var(--surface-2, #F8F9FB); font-size: 13px; }
            #<?= Toolkit::e($uid) ?> .pdftool-facts span:first-child { color: var(--ink-3, #4B5259); }
            #<?= Toolkit::e($uid) ?> .pdftool-facts span:last-child { font-weight: 600; font-variant-numeric: tabular-nums; }
            #<?= Toolkit::e($uid) ?> .pdftool-note { margin: 10px 0 0; font-size: 12.4px; color: var(--ink-4, #66717F); line-height: 1.5; }
        </style>

        <div class="pdftool-drop">
            <label for="<?= Toolkit::e($uid) ?>-file" style="margin:0"><?= Toolkit::e($t('Choose images, in the order you want them', 'Choose images, in the order you want them')) ?></label>
            <input type="file" id="<?= Toolkit::e($uid) ?>-file" accept="image/*" multiple data-pdf="file">
            <p style="margin:0;font-size:12.4px;color:var(--ink-4,#66717F)"><?= Toolkit::e($t('JPG, PNG, WebP or screenshots. Read in this page — nothing is uploaded.', 'JPG, PNG, WebP or screenshots. Read in this page — nothing is uploaded.')) ?></p>
        </div>

        <div class="pdftool-row">
            <div>
                <label for="<?= Toolkit::e($uid) ?>-size"><?= Toolkit::e($t('Page size', 'Page size')) ?></label>
                <select id="<?= Toolkit::e($uid) ?>-size" data-pdf="size">
                    <option value="a4"><?= Toolkit::e($t('A4 portrait', 'A4 portrait')) ?></option>
                    <option value="a4l"><?= Toolkit::e($t('A4 landscape', 'A4 landscape')) ?></option>
                    <option value="fit"><?= Toolkit::e($t('Fit the image', 'Fit the image')) ?></option>
                </select>
            </div>
            <div>
                <label for="<?= Toolkit::e($uid) ?>-margin"><?= Toolkit::e($t('Margin', 'Margin')) ?></label>
                <select id="<?= Toolkit::e($uid) ?>-margin" data-pdf="margin">
                    <option value="0"><?= Toolkit::e($t('None', 'None')) ?></option>
                    <option value="36"><?= Toolkit::e($t('12 mm', '12 mm')) ?></option>
                    <option value="54" selected><?= Toolkit::e($t('19 mm', '19 mm')) ?></option>
                </select>
            </div>
        </div>

        <ul class="pdftool-list" data-pdf="list"></ul>

        <ul class="pdftool-facts">
            <li><span><?= Toolkit::e($t('Images', 'Images')) ?></span><span data-pdf="count">0</span></li>
            <li><span><?= Toolkit::e($t('Page', 'Page')) ?></span><span data-pdf="pagesize">A4 · 595 × 842 pt</span></li>
            <li><span><?= Toolkit::e($t('PDF size', 'PDF size')) ?></span><span data-pdf="bytes">—</span></li>
        </ul>

        <button type="button" class="tool-btn" style="margin-top:12px" data-pdf="save" disabled><?= Toolkit::e($t('Download the PDF', 'Download the PDF')) ?></button>

        <p class="pdftool-note" data-pdf="note">
            <?= Toolkit::e(strtr(
                $t('One image per page, scaled to fit and centred. A4 is {w} × {h} points — 210 × 297 mm at 72 points per inch.',
                   'One image per page, scaled to fit and centred. A4 is {w} × {h} points — 210 × 297 mm at 72 points per inch.'),
                ['{w}' => number_format($a4w, 2, '.', ' '), '{h}' => number_format($a4h, 2, '.', ' ')]
            )) ?>
        </p>

        <script>
        (function () {
            var root = document.getElementById(<?= json_encode($uid) ?>);
            if (!root) return;
            var fileIn = root.querySelector('[data-pdf="file"]');
            var sizeSel = root.querySelector('[data-pdf="size"]');
            var marginSel = root.querySelector('[data-pdf="margin"]');
            var list = root.querySelector('[data-pdf="list"]');
            var countOut = root.querySelector('[data-pdf="count"]');
            var pageOut = root.querySelector('[data-pdf="pagesize"]');
            var bytesOut = root.querySelector('[data-pdf="bytes"]');
            var saveBtn = root.querySelector('[data-pdf="save"]');
            var note = root.querySelector('[data-pdf="note"]');
            var files = [];
            var jpegs = [];
            var outBlob = null;

            var A4 = [595.28, 841.89];

            function kb(b) {
                return b >= 1048576 ? (b / 1048576).toFixed(2) + ' MB' : Math.max(1, Math.round(b / 1024)) + ' KB';
            }
            function say(text) { note.textContent = text; }

            /* ---- the PDF writer -------------------------------------------
               bytes: Latin-1 for the syntax, raw for the JPEG payload. Offsets
               are counted as we go, which is the only thing PDF really needs. */
            function Writer() {
                this.parts = [];
                this.length = 0;
            }
            Writer.prototype.bytes = function (data) {
                this.parts.push(data);
                this.length += data.length;
            };
            Writer.prototype.text = function (string) {
                var out = new Uint8Array(string.length);
                for (var i = 0; i < string.length; i++) out[i] = string.charCodeAt(i) & 0xff;
                this.bytes(out);
            };
            Writer.prototype.blob = function () {
                return new Blob(this.parts, { type: 'application/pdf' });
            };

            function buildPdf(pages, meta) {
                var w = new Writer();
                var offsets = [];
                var objCount = 2 + pages.length * 3;

                function start(id) {
                    offsets[id] = w.length;
                    w.text(id + ' 0 obj\n');
                }
                function end() { w.text('endobj\n'); }

                w.text('%PDF-1.4\n%\xe2\xe3\xcf\xd3\n');

                /* 1: catalogue */
                start(1);
                w.text('<< /Type /Catalog /Pages 2 0 R >>\n');
                end();

                /* 2: page tree */
                var kids = [];
                for (var p = 0; p < pages.length; p++) kids.push((3 + p * 3) + ' 0 R');
                start(2);
                w.text('<< /Type /Pages /Kids [' + kids.join(' ') + '] /Count ' + pages.length + ' >>\n');
                end();

                for (var i = 0; i < pages.length; i++) {
                    var page = pages[i];
                    var pageId = 3 + i * 3, streamId = pageId + 1, imageId = pageId + 2;
                    var pw = page.pageW, ph = page.pageH;
                    var inner = [pw - page.margin * 2, ph - page.margin * 2];
                    var scale = Math.min(inner[0] / page.w, inner[1] / page.h);
                    var dw = page.w * scale, dh = page.h * scale;
                    var x = (pw - dw) / 2, y = (ph - dh) / 2;

                    start(pageId);
                    w.text('<< /Type /Page /Parent 2 0 R /MediaBox [0 0 ' + f2(pw) + ' ' + f2(ph) + ']'
                        + ' /Resources << /XObject << /Im0 ' + imageId + ' 0 R >> >>'
                        + ' /Contents ' + streamId + ' 0 R >>\n');
                    end();

                    var content = 'q\n' + f2(dw) + ' 0 0 ' + f2(dh) + ' ' + f2(x) + ' ' + f2(y) + ' cm\n/Im0 Do\nQ\n';
                    start(streamId);
                    w.text('<< /Length ' + content.length + ' >>\nstream\n');
                    w.text(content);
                    w.text('endstream\n');
                    end();

                    start(imageId);
                    w.text('<< /Type /XObject /Subtype /Image /Width ' + page.w + ' /Height ' + page.h
                        + ' /ColorSpace /DeviceRGB /BitsPerComponent 8 /Filter /DCTDecode'
                        + ' /Length ' + page.jpeg.length + ' >>\nstream\n');
                    w.bytes(page.jpeg);
                    w.text('\nendstream\n');
                    end();
                }

                /* cross-reference table */
                var xref = w.length;
                w.text('xref\n0 ' + (objCount + 1) + '\n');
                w.text('0000000000 65535 f \n');
                for (var o = 1; o <= objCount; o++) {
                    var off = offsets[o] === undefined ? 0 : offsets[o];
                    w.text(('0000000000' + off).slice(-10) + ' 00000 n \n');
                }
                w.text('trailer\n<< /Size ' + (objCount + 1) + ' /Root 1 0 R'
                    + (meta.title ? ' /Info << /Title (' + meta.title.replace(/[()\\]/g, '') + ') /Producer (Onim tools) >>' : '')
                    + ' >>\nstartxref\n' + xref + '\n%%EOF\n');
                return w.blob();
            }

            /* two decimals, no exponent, no trailing noise */
            function f2(n) {
                return (Math.round(n * 100) / 100).toString();
            }

            /* ---- turning whatever was chosen into JPEG bytes --------------- */
            function toJpeg(file) {
                return new Promise(function (resolve, reject) {
                    var img = new Image();
                    var url = URL.createObjectURL(file);
                    img.onload = function () {
                        var canvas = document.createElement('canvas');
                        canvas.width = img.naturalWidth;
                        canvas.height = img.naturalHeight;
                        var ctx = canvas.getContext('2d');
                        ctx.fillStyle = '#fff';
                        ctx.fillRect(0, 0, canvas.width, canvas.height);
                        ctx.drawImage(img, 0, 0);
                        canvas.toBlob(function (blob) {
                            URL.revokeObjectURL(url);
                            if (!blob) { reject(new Error('encode failed')); return; }
                            var reader = new FileReader();
                            reader.onload = function () {
                                resolve({
                                    jpeg: new Uint8Array(reader.result),
                                    w: canvas.width,
                                    h: canvas.height,
                                    name: file.name || 'image'
                                });
                            };
                            reader.readAsArrayBuffer(blob);
                        }, 'image/jpeg', 0.86);
                    };
                    img.onerror = function () {
                        URL.revokeObjectURL(url);
                        reject(new Error('decode failed'));
                    };
                    img.src = url;
                });
            }

            function render() {
                countOut.textContent = String(jpegs.length);
                list.innerHTML = '';
                jpegs.forEach(function (page, index) {
                    var li = document.createElement('li');
                    var thumb = document.createElement('img');
                    thumb.src = page.thumb;
                    thumb.alt = '';
                    var name = document.createElement('span');
                    name.textContent = (index + 1) + '. ' + page.name;
                    var dims = document.createElement('small');
                    dims.textContent = page.w + '×' + page.h;
                    li.appendChild(thumb);
                    li.appendChild(name);
                    li.appendChild(dims);
                    list.appendChild(li);
                });

                if (!jpegs.length) {
                    saveBtn.disabled = true;
                    bytesOut.textContent = '—';
                    return;
                }

                var mode = sizeSel.value;
                var margin = Number(marginSel.value);
                var pages = jpegs.map(function (page) {
                    var pageW, pageH;
                    if (mode === 'fit') {
                        /* 96 dpi pixels → 72 dpi points, so a screenshot keeps
                           its natural size on paper. */
                        pageW = page.w * 72 / 96 + margin * 2;
                        pageH = page.h * 72 / 96 + margin * 2;
                    } else if (mode === 'a4l') {
                        pageW = A4[1]; pageH = A4[0];
                    } else {
                        pageW = A4[0]; pageH = A4[1];
                    }
                    return { jpeg: page.jpeg, w: page.w, h: page.h, pageW: pageW, pageH: pageH, margin: margin };
                });

                outBlob = buildPdf(pages, { title: 'Images' });
                bytesOut.textContent = kb(outBlob.size);
                pageOut.textContent = mode === 'fit' ? 'Each image sized to fit' :
                    (mode === 'a4l' ? 'A4 landscape · 842 × 595 pt' : 'A4 · 595 × 842 pt');
                saveBtn.disabled = false;
            }

            fileIn.addEventListener('change', function () {
                var chosen = Array.prototype.slice.call(fileIn.files || []);
                if (!chosen.length) return;
                saveBtn.disabled = true;
                say('Reading ' + chosen.length + (chosen.length === 1 ? ' image…' : ' images…'));
                var tasks = chosen.slice(0, 60).map(toJpeg);
                Promise.all(tasks).then(function (results) {
                    jpegs = results;
                    return Promise.all(results.map(function (page, index) {
                        return new Promise(function (resolve) {
                            var blob = new Blob([page.jpeg], { type: 'image/jpeg' });
                            var reader = new FileReader();
                            reader.onload = function () { page.thumb = reader.result; resolve(); };
                            reader.readAsDataURL(blob);
                        });
                    }));
                }).then(function () {
                    render();
                    say('Nothing left this page. The PDF is assembled in your browser.');
                }).catch(function () {
                    say('One of those files could not be read as an image. Try JPG or PNG.');
                });
            });

            sizeSel.addEventListener('change', render);
            marginSel.addEventListener('change', render);

            saveBtn.addEventListener('click', function () {
                if (!outBlob) return;
                var a = document.createElement('a');
                a.href = URL.createObjectURL(outBlob);
                a.download = 'images-' + jpegs.length + 'p.pdf';
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
