<?php
/**
 * Tool Name: Word and Character Counter
 * Shortcode: tool_word_counter
 * Category: everyday-life
 * Version: 1.0.0
 * Description: Count words, characters, sentences and reading time, and see which words you lean on.
 * Language: en
 */

/*
 * The third shape of tool: one that works on text you paste in.
 *
 * A text box's contents cannot travel in a URL, so this one posts back to its
 * own page. The count is then worked out on the server and printed — which
 * means the number is there before any script runs. The script only makes the
 * count live; with JavaScript off, the "Count" button inside <noscript> does
 * the same job with one round trip.
 *
 * Nothing a visitor types is stored anywhere. The text is read from the
 * request, counted, and thrown away with the request.
 */

declare(strict_types=1);

if (!defined('ONIM_TOOLKIT')) {
    http_response_code(403);
    exit('This file is a tool definition, not a page.');
}

use Onim\Toolkit;

Toolkit::addShortcode('tool_word_counter', static function (array $atts, ?string $inner, array $ctx): string {
    $uid = (string) $ctx['uid'];
    $t   = static fn (string $key, string $default): string => Toolkit::t($key, $default);

    /* Cap what one request may carry: a pasted novel is not the use case and
       would make the page enormous to re-render. */
    $text = isset($_POST['t_text']) && is_string($_POST['t_text'])
        ? mb_substr($_POST['t_text'], 0, 200000)
        : '';

    $words = preg_split('~[\s\x{00A0}]+~u', trim($text), -1, PREG_SPLIT_NO_EMPTY) ?: [];
    $stats = [
        'words'      => count($words),
        'characters' => mb_strlen($text),
        'letters'    => mb_strlen(preg_replace('~\s~u', '', $text) ?? ''),
        'sentences'  => $text === '' ? 0 : max(1, (int) preg_match_all('~[.!?]+(?=\s|$)~u', $text)),
        'paragraphs' => $text === '' ? 0 : count(preg_split('~\n\s*\n~u', trim($text)) ?: []),
    ];
    $stats['minutes'] = $stats['words'] > 0 ? max(1, (int) ceil($stats['words'] / 225)) : 0;

    /* The words used most often, ignoring the words every sentence has. */
    $stop = array_flip([
        'the', 'and', 'for', 'that', 'this', 'with', 'from', 'have', 'has', 'had', 'was', 'were',
        'are', 'but', 'not', 'you', 'your', 'his', 'her', 'its', 'they', 'them', 'their', 'there',
        'what', 'when', 'which', 'who', 'will', 'would', 'can', 'could', 'should', 'about', 'into',
        'than', 'then', 'them', 'these', 'those', 'been', 'being', 'does', 'did', 'doing', 'how',
        'all', 'any', 'each', 'more', 'most', 'some', 'such', 'only', 'own', 'same', 'too', 'very',
        'just', 'now', 'also', 'out', 'over', 'under', 'again', 'because', 'while', 'where', 'here',
        'is', 'it', 'in', 'of', 'to', 'a', 'an', 'on', 'at', 'as', 'by', 'be', 'or', 'if', 'we', 'he',
        'she', 'i', 'me', 'my', 'our', 'us', 'no', 'so', 'up', 'do', 'get', 'one', 'two', 'how',
    ]);
    $counts = [];
    foreach ($words as $word) {
        $clean = mb_strtolower(preg_replace('~[^\p{L}\p{N}\'-]~u', '', $word) ?? '');
        if (mb_strlen($clean) < 3 || isset($stop[$clean])) {
            continue;
        }
        $counts[$clean] = ($counts[$clean] ?? 0) + 1;
    }
    /* "Words you lean on" means words used more than once: a list of words that
       each appear once is just the text again, in a different order. */
    $counts = array_filter($counts, static fn (int $n): bool => $n >= 2);
    arsort($counts);
    $frequent = array_slice($counts, 0, 6, true);

    $num = static fn (int $value): string => number_format($value, 0, '.', ' ');

    ob_start();
    ?>
    <div class="wctool" id="<?= Toolkit::e($uid) ?>">
        <style>
            #<?= Toolkit::e($uid) ?> .wc-form { display: grid; gap: 10px; }
            #<?= Toolkit::e($uid) ?> textarea {
                min-height: 132px; resize: vertical; line-height: 1.55; font-size: 14.4px;
            }
            #<?= Toolkit::e($uid) ?> .wc-counts {
                display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 1px;
                margin-top: 14px; overflow: hidden; border: 1px solid var(--border, #DFE2EB);
                border-radius: 10px; background: var(--border, #DFE2EB);
            }
            #<?= Toolkit::e($uid) ?> .wc-count { padding: 10px 12px; background: var(--surface-2, #F8F9FB); }
            #<?= Toolkit::e($uid) ?> .wc-count b {
                display: block; font-size: 19px; line-height: 1.2; color: var(--ink, #0A0A0A);
                font-variant-numeric: tabular-nums;
            }
            #<?= Toolkit::e($uid) ?> .wc-count span { font-size: 11.6px; color: var(--ink-4, #66717F); }
            #<?= Toolkit::e($uid) ?> .wc-freq { margin-top: 14px; }
            #<?= Toolkit::e($uid) ?> .wc-freq h4 {
                margin: 0 0 8px; font-size: 12px; font-weight: 700; letter-spacing: .04em;
                text-transform: uppercase; color: var(--ink-4, #66717F);
            }
            #<?= Toolkit::e($uid) ?> .wc-tags { display: flex; flex-wrap: wrap; gap: 6px; margin: 0; padding: 0; list-style: none; }
            #<?= Toolkit::e($uid) ?> .wc-tag {
                display: inline-flex; align-items: baseline; gap: 6px; padding: 5px 10px;
                background: var(--brand-soft, #EBEFFF); border-radius: 999px;
                font-size: 12.6px; color: var(--brand-ink, #294CC2);
            }
            #<?= Toolkit::e($uid) ?> .wc-tag b { font-weight: 700; font-variant-numeric: tabular-nums; }
            #<?= Toolkit::e($uid) ?> .wc-empty { margin: 14px 0 0; font-size: 12.8px; color: var(--ink-4, #66717F); }
        </style>

        <form class="wc-form" method="post" action="<?= Toolkit::e((string) ($ctx['calc']['path'] ?? '/')) ?>" data-tool-form>
            <label for="<?= Toolkit::e($uid) ?>-text"><?= Toolkit::e($t('Your text', 'Your text')) ?></label>
            <textarea id="<?= Toolkit::e($uid) ?>-text" name="t_text" data-tool="text"
                      spellcheck="false" placeholder="<?= Toolkit::e($t('Paste or type here…', 'Paste or type here…')) ?>"><?= Toolkit::e($text) ?></textarea>

            <noscript>
                <button type="submit" class="tool-btn"><?= Toolkit::e($t('Count', 'Count')) ?></button>
            </noscript>
        </form>

        <div class="wc-counts" role="status" aria-live="polite">
            <?php
            $cells = [
                ['words',      $t('Words', 'Words')],
                ['characters', $t('Characters', 'Characters')],
                ['letters',    $t('Without spaces', 'Without spaces')],
                ['sentences',  $t('Sentences', 'Sentences')],
                ['paragraphs', $t('Paragraphs', 'Paragraphs')],
                ['minutes',    $t('Minute read', 'Minute read')],
            ];
            foreach ($cells as [$key, $label]): ?>
                <div class="wc-count">
                    <b data-count="<?= Toolkit::e($key) ?>"><?= $num((int) $stats[$key]) ?></b>
                    <span><?= Toolkit::e($label) ?></span>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="wc-freq">
            <h4><?= Toolkit::e($t('Words you lean on', 'Words you lean on')) ?></h4>
            <ul class="wc-tags" data-freq>
                <?php if ($frequent === []): ?>
                    <li class="wc-empty"><?= Toolkit::e($t('No word is repeated yet.', 'No word is repeated yet.')) ?></li>
                <?php else: ?>
                    <?php foreach ($frequent as $word => $count): ?>
                        <li class="wc-tag"><span><?= Toolkit::e((string) $word) ?></span><b><?= (int) $count ?></b></li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>

        <script>
        (function () {
            var root = document.getElementById(<?= json_encode($uid) ?>);
            if (!root) return;
            var box = root.querySelector('[data-tool="text"]');
            var cells = root.querySelectorAll('[data-count]');
            var freq = root.querySelector('[data-freq]');
            var stop = <?= json_encode(array_keys($stop)) ?>;
            /* Labels the script prints come from the same translation map as
               the ones the server printed. */
            var emptyLabel = <?= json_encode($t('No word is repeated yet.', 'No word is repeated yet.'), JSON_UNESCAPED_UNICODE) ?>;

            function escapeHtml(value) {
                return String(value).replace(/[&<>"']/g, function (c) {
                    return ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' })[c];
                });
            }
            function set(name, value) {
                for (var i = 0; i < cells.length; i++) {
                    if (cells[i].getAttribute('data-count') === name) {
                        cells[i].textContent = String(value).replace(/\B(?=(\d{3})+(?!\d))/g, ' ');
                    }
                }
            }
            function run() {
                var text = box.value || '';
                var words = text.trim() === '' ? [] : text.trim().split(/[\s\u00a0]+/);
                set('words', words.length);
                set('characters', text.length);
                set('letters', text.replace(/\s/g, '').length);
                set('sentences', text.trim() === '' ? 0 : Math.max(1, (text.match(/[.!?]+(?=\s|$)/g) || []).length));
                set('paragraphs', text.trim() === '' ? 0 : text.trim().split(/\n\s*\n/).length);
                set('minutes', words.length === 0 ? 0 : Math.max(1, Math.ceil(words.length / 225)));

                var counts = {};
                var stopSet = {};
                stop.forEach(function (w) { stopSet[w] = true; });
                words.forEach(function (raw) {
                    var clean = raw.toLowerCase().replace(/[^\p{L}\p{N}'-]/gu, '');
                    if (clean.length < 3 || stopSet[clean]) return;
                    counts[clean] = (counts[clean] || 0) + 1;
                });
                var top = Object.keys(counts).filter(function (w) { return counts[w] > 1; })
                    .sort(function (a, b) { return counts[b] - counts[a]; }).slice(0, 6);
                if (!top.length) {
                    freq.innerHTML = '<li class="wc-empty">' + escapeHtml(emptyLabel) + '</li>';
                    return;
                }
                freq.innerHTML = top.map(function (w) {
                    return '<li class="wc-tag"><span>' + escapeHtml(w) + '</span><b>' + counts[w] + '</b></li>';
                }).join('');
            }
            box.addEventListener('input', run);
            /* As-you-type is the point of this tool, so the server round trip
               is only kept as the no-script path. */
            root.querySelector('[data-tool-form]').addEventListener('submit', function (event) {
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
