<?php
/**
 * Tool Name: Text Compressor
 * Shortcode: tool_text_compressor
 * Category: compressors
 * Version: 1.0.0
 * Description: See how far gzip or deflate shrinks a block of text, and download the compressed file.
 * Language: en
 */

/*
 * Compression is the one thing on this site that can be done identically on both
 * sides: PHP has gzencode(), and every current browser has CompressionStream().
 * So the no-script path is real here — the text is posted to the page, gzencoded
 * on the server and the byte counts printed — and the script path simply does the
 * same thing without a round trip.
 *
 * The number people are actually after is the ratio, and it depends mostly on
 * repetition: this paragraph of English compresses to about a third, a JSON blob
 * with repeated keys considerably less, and a random hex string not at all. The
 * tool prints both sizes and says which case it is looking at.
 */

declare(strict_types=1);

if (!defined('ONIM_TOOLKIT')) {
    http_response_code(403);
    exit('This file is a tool definition, not a page.');
}

use Onim\Toolkit;

Toolkit::addShortcode('tool_text_compressor', static function (array $atts, ?string $inner, array $ctx): string {
    $uid = (string) $ctx['uid'];
    $t   = static fn (string $key, string $default): string => Toolkit::t($key, $default);

    $text = (string) ($_POST['t_text'] ?? $_GET['t_text'] ?? '');
    $isSample = trim($text) === '';
    if ($isSample) {
        /* The sample is the explanation as well: it compresses well because it
           repeats, which is the point the tool is making. */
        $text = $t('Compression finds repetition. This sentence repeats itself: compression finds repetition, compression finds repetition.', 'Compression finds repetition. This sentence repeats itself: compression finds repetition, compression finds repetition.')
            . "\n"
            . $t('gzip looks back over the last 32 KB for a sequence it has already seen and stores a pointer instead of the text.', 'gzip looks back over the last 32 KB for a sequence it has already seen and stores a pointer instead of the text.')
            . "\n"
            . $t('That is why prose shrinks to about a third and a random hex string does not shrink at all.', 'That is why prose shrinks to about a third and a random hex string does not shrink at all.');
    }
    /* A hard cap: the tool is for a paragraph or a page of JSON, not a database
       dump, and gzencode() on 8 MB inside a page request is a way to time out. */
    if (strlen($text) > 512 * 1024) {
        $text = substr($text, 0, 512 * 1024);
    }

    $original = strlen($text);
    $gz       = function_exists('gzencode') ? (string) gzencode($text, 9) : '';
    $deflate  = function_exists('gzdeflate') ? (string) gzdeflate($text, 9) : '';
    $gzSize   = strlen($gz);
    $dfSize   = strlen($deflate);
    $ratio    = $original > 0 && $gzSize > 0 ? round($gzSize / $original * 100, 1) : 0;
    $saving   = $original > 0 && $gzSize > 0 ? max(0, round((1 - $gzSize / $original) * 100)) : 0;

    $bytes = static function (int $n): string {
        return $n >= 1024 ? number_format($n / 1024, 1, '.', ' ') . ' KB' : $n . ' bytes';
    };

    ob_start();
    ?>
    <div class="gztool" id="<?= Toolkit::e($uid) ?>">
        <style>
            #<?= Toolkit::e($uid) ?> .gztool-form { display: grid; gap: 10px; }
            #<?= Toolkit::e($uid) ?> .gztool-form textarea { min-height: 130px; resize: vertical; font-size: 13px; line-height: 1.6; }
            #<?= Toolkit::e($uid) ?> .gztool-answer {
                margin: 14px 0 0; padding: 12px 14px; border-radius: 10px;
                background: var(--brand-soft, #EBEFFF); border: 1px solid #D7DEFF; font-size: 13px; color: var(--ink-2, #212427);
            }
            #<?= Toolkit::e($uid) ?> .gztool-answer strong {
                display: block; font-size: 28px; line-height: 1.1; letter-spacing: -.015em;
                color: var(--brand-ink, #294CC2); font-variant-numeric: tabular-nums;
            }
            #<?= Toolkit::e($uid) ?> .gztool-answer small { display: block; margin-top: 3px; color: var(--ink-3, #4B5259); font-size: 12.4px; }
            #<?= Toolkit::e($uid) ?> .gztool-facts {
                margin: 12px 0 0; padding: 0; list-style: none; display: grid; gap: 1px;
                border: 1px solid var(--border, #DFE2EB); border-radius: 10px; overflow: hidden;
            }
            #<?= Toolkit::e($uid) ?> .gztool-facts li { display: flex; justify-content: space-between; gap: 10px; padding: 8px 11px; background: var(--surface-2, #F8F9FB); font-size: 13px; }
            #<?= Toolkit::e($uid) ?> .gztool-facts span:first-child { color: var(--ink-3, #4B5259); }
            #<?= Toolkit::e($uid) ?> .gztool-facts span:last-child { font-weight: 600; font-variant-numeric: tabular-nums; }
            #<?= Toolkit::e($uid) ?> .gztool-buttons { display: grid; grid-template-columns: 1fr 1fr; gap: 8px; margin-top: 12px; }
            #<?= Toolkit::e($uid) ?> .gztool-note { margin: 10px 0 0; font-size: 12.4px; color: var(--ink-4, #66717F); line-height: 1.5; }
        </style>

        <form class="gztool-form" method="post" action="<?= Toolkit::e((string) ($ctx['calc']['path'] ?? '/')) ?>" data-gz-form>
            <label for="<?= Toolkit::e($uid) ?>-text"><?= Toolkit::e($t('Text to compress', 'Text to compress')) ?></label>
            <textarea id="<?= Toolkit::e($uid) ?>-text" name="t_text" data-gz="text"><?= Toolkit::e($text) ?></textarea>
            <button type="submit" class="tool-btn"><?= Toolkit::e($t('Compress it', 'Compress it')) ?></button>
        </form>

        <p class="gztool-answer" role="status" aria-live="polite">
            <?= Toolkit::e($t('gzip keeps', 'gzip keeps')) ?>
            <strong data-gz="ratio"><?= Toolkit::e(number_format($ratio, 1, '.', ' ')) ?>%</strong>
            <small data-gz="saving"><?= Toolkit::e(strtr($t('{in} → {out}, {pct}% smaller.', '{in} → {out}, {pct}% smaller.'), ['{in}' => $bytes($original), '{out}' => $bytes($gzSize), '{pct}' => (string) $saving])) ?></small>
        </p>

        <ul class="gztool-facts">
            <li><span><?= Toolkit::e($t('Original', 'Original')) ?></span><span data-gz="original"><?= Toolkit::e($bytes($original)) ?></span></li>
            <li><span><?= Toolkit::e($t('gzip (level 9)', 'gzip (level 9)')) ?></span><span data-gz="gz"><?= Toolkit::e($bytes($gzSize)) ?></span></li>
            <li><span><?= Toolkit::e($t('deflate (raw)', 'deflate (raw)')) ?></span><span data-gz="deflate"><?= Toolkit::e($bytes($dfSize)) ?></span></li>
            <li><span><?= Toolkit::e($t('Characters', 'Characters')) ?></span><span data-gz="chars"><?= Toolkit::e((string) mb_strlen($text)) ?></span></li>
        </ul>

        <div class="gztool-buttons">
            <button type="button" class="tool-btn" data-gz="download-gz"<?= $gzSize === 0 ? ' disabled' : '' ?>><?= Toolkit::e($t('Download .gz', 'Download .gz')) ?></button>
            <button type="button" class="tool-btn tool-btn--ghost" data-gz="download-raw"<?= $gzSize === 0 ? ' disabled' : '' ?>><?= Toolkit::e($t('Download .txt', 'Download .txt')) ?></button>
        </div>

        <p class="gztool-note">
            <?= Toolkit::e($t('gzip is deflate plus a header, so the two sizes are always within a few bytes of each other. Repetitive text (prose, JSON, HTML) shrinks to a quarter or a third; already-compressed data (base64, a random hash) grows by a few bytes and nothing more can be done about it.', 'gzip is deflate plus a header, so the two sizes are always within a few bytes of each other. Repetitive text (prose, JSON, HTML) shrinks to a quarter or a third; already-compressed data (base64, a random hash) grows by a few bytes and nothing more can be done about it.')) ?>
        </p>

        <script>
        (function () {
            var L = {
                saving:    <?= json_encode($t('{in} → {out}, {pct}% smaller.', '{in} → {out}, {pct}% smaller.'), JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>,
                noBrowser: <?= json_encode($t('This browser cannot compress locally; the server answer above still stands.', 'This browser cannot compress locally; the server answer above still stands.'), JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>
            };
            var root = document.getElementById(<?= json_encode($uid) ?>);
            if (!root) return;
            var text = root.querySelector('[data-gz="text"]');
            var ratio = root.querySelector('[data-gz="ratio"]');
            var saving = root.querySelector('[data-gz="saving"]');
            var originalOut = root.querySelector('[data-gz="original"]');
            var gzOut = root.querySelector('[data-gz="gz"]');
            var deflateOut = root.querySelector('[data-gz="deflate"]');
            var charsOut = root.querySelector('[data-gz="chars"]');
            var gzBtn = root.querySelector('[data-gz="download-gz"]');
            var txtBtn = root.querySelector('[data-gz="download-raw"]');
            var lastGz = null;
            var timer = null;

            function bytes(n) {
                return n >= 1024 ? (n / 1024).toFixed(1) + ' KB' : n + ' bytes';
            }

            function compress(data, format) {
                if (typeof CompressionStream !== 'function') return Promise.resolve(null);
                var stream = new Blob([data]).stream().pipeThrough(new CompressionStream(format));
                return new Response(stream).arrayBuffer().then(function (buffer) {
                    return new Uint8Array(buffer);
                });
            }

            function run() {
                var value = text.value;
                var size = new Blob([value]).size;
                originalOut.textContent = bytes(size);
                charsOut.textContent = String(Array.from(value).length);
                Promise.all([compress(value, 'gzip'), compress(value, 'deflate-raw')]).then(function (results) {
                    var gz = results[0], raw = results[1];
                    if (!gz) {
                        ratio.textContent = '—';
                        saving.textContent = L.noBrowser;
                        return;
                    }
                    lastGz = gz;
                    gzOut.textContent = bytes(gz.length);
                    deflateOut.textContent = bytes(raw.length);
                    var pct = size === 0 ? 0 : Math.round(gz.length / size * 1000) / 10;
                    ratio.textContent = pct + '%';
                    saving.textContent = L.saving
                        .replace('{in}', bytes(size))
                        .replace('{out}', bytes(gz.length))
                        .replace('{pct}', Math.max(0, Math.round((1 - gz.length / size) * 100)));
                    gzBtn.disabled = false;
                    txtBtn.disabled = false;
                });
            }

            function later() {
                clearTimeout(timer);
                timer = setTimeout(run, 250);
            }

            function download(blob, name) {
                var a = document.createElement('a');
                a.href = URL.createObjectURL(blob);
                a.download = name;
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
                setTimeout(function () { URL.revokeObjectURL(a.href); }, 4000);
            }

            gzBtn.addEventListener('click', function () {
                if (lastGz) download(new Blob([lastGz], { type: 'application/gzip' }), 'text.txt.gz');
            });
            txtBtn.addEventListener('click', function () {
                download(new Blob([text.value], { type: 'text/plain' }), 'text.txt');
            });

            text.addEventListener('input', later);
            root.querySelector('[data-gz-form]').addEventListener('submit', function (event) {
                event.preventDefault();
                run();
            });
            run();
        })();
        </script>
    </div>
    <?php
    return (string) ob_get_clean();
});
