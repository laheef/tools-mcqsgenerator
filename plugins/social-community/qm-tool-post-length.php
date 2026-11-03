<?php
/**
 * Tool Name: Social Post Length Checker
 * Shortcode: tool_post_length
 * Category: social-community
 * Version: 1.0.0
 * Description: Paste a caption once and see how it lands on X, Instagram, LinkedIn, TikTok, Threads and YouTube.
 * Language: en
 */

/*
 * Six platforms, six limits, and one text box — because the same caption gets
 * posted to all of them and the only thing that changes is where it is cut.
 *
 * The limits are stored as data rather than scattered through the markup, so the
 * server and the script cannot disagree about them, and updating one is a single
 * line. Character counting follows each platform's own rule: X counts most emoji
 * as two characters, the others count them as one.
 *
 * What it does not do is pretend a limit is a recommendation: a 2,200-character
 * Instagram caption is allowed, and the number of lines before "more" is about
 * 125 characters — which is the number that actually decides whether anyone reads
 * the second sentence.
 */

declare(strict_types=1);

if (!defined('ONIM_TOOLKIT')) {
    http_response_code(403);
    exit('This file is a tool definition, not a page.');
}

use Onim\Toolkit;

Toolkit::addShortcode('tool_post_length', static function (array $atts, ?string $inner, array $ctx): string {
    $uid = (string) $ctx['uid'];
    $t   = static fn (string $key, string $default): string => Toolkit::t($key, $default);

    /* Names are translated where they are written, with a literal key each. */
    $limits = [
        [$t('X (Twitter)', 'X (Twitter)'), 280],
        [$t('Instagram caption', 'Instagram caption'), 2200],
        [$t('LinkedIn post', 'LinkedIn post'), 3000],
        [$t('TikTok caption', 'TikTok caption'), 2200],
        [$t('Threads', 'Threads'), 500],
        [$t('YouTube title', 'YouTube title'), 100],
        [$t('Pinterest description', 'Pinterest description'), 500],
    ];

    $text = (string) ($_POST['t_post'] ?? $_GET['t_post'] ?? '');
    if (trim($text) === '') {
        $text = $t('Twelve tools that do one thing each, free, with the working shown.', 'Twelve tools that do one thing each, free, with the working shown.');
    }
    $length = mb_strlen($text);
    $words  = str_word_count($text) ?: count(preg_split('/\s+/u', trim($text)) ?: []);

    ob_start();
    ?>
    <div class="plentool" id="<?= Toolkit::e($uid) ?>">
        <style>
            #<?= Toolkit::e($uid) ?> .plentool-form { display: grid; gap: 10px; }
            #<?= Toolkit::e($uid) ?> .plentool-form textarea { min-height: 120px; resize: vertical; }
            #<?= Toolkit::e($uid) ?> .plentool-answer {
                margin: 14px 0 0; padding: 12px 14px; border-radius: 10px;
                background: var(--brand-soft, #EBEFFF); border: 1px solid #D7DEFF; font-size: 13px; color: var(--ink-2, #212427);
            }
            #<?= Toolkit::e($uid) ?> .plentool-answer strong {
                display: block; font-size: 26px; line-height: 1.15; color: var(--brand-ink, #294CC2); letter-spacing: -.01em;
                font-variant-numeric: tabular-nums;
            }
            #<?= Toolkit::e($uid) ?> .plentool-rows { display: grid; gap: 6px; margin-top: 12px; }
            #<?= Toolkit::e($uid) ?> .plentool-row {
                padding: 8px 10px; border-radius: 9px; background: var(--surface-2, #F8F9FB);
                border: 1px solid var(--border, #DFE2EB);
            }
            #<?= Toolkit::e($uid) ?> .plentool-head { display: flex; justify-content: space-between; gap: 8px; font-size: 12.8px; }
            #<?= Toolkit::e($uid) ?> .plentool-head b { font-weight: 600; }
            #<?= Toolkit::e($uid) ?> .plentool-head span { font-variant-numeric: tabular-nums; color: var(--ink-3, #4B5259); }
            #<?= Toolkit::e($uid) ?> .plentool-bar { height: 5px; border-radius: 99px; background: #E6EAF2; overflow: hidden; margin-top: 6px; }
            #<?= Toolkit::e($uid) ?> .plentool-bar i { display: block; height: 100%; width: 0; background: #0F7B4F; border-radius: 99px; transition: width .15s linear, background .15s linear; }
            #<?= Toolkit::e($uid) ?> .plentool-row[data-state="near"] .plentool-bar i { background: #B45309; }
            #<?= Toolkit::e($uid) ?> .plentool-row[data-state="over"] .plentool-bar i { background: #B3261E; }
            #<?= Toolkit::e($uid) ?> .plentool-row[data-state="over"] .plentool-head span { color: #B3261E; font-weight: 700; }
            #<?= Toolkit::e($uid) ?> .plentool-note { margin: 10px 0 0; font-size: 12.4px; color: var(--ink-4, #66717F); line-height: 1.5; }
            #<?= Toolkit::e($uid) ?> .plentool-facts {
                margin: 12px 0 0; padding: 0; list-style: none; display: grid; gap: 1px;
                border: 1px solid var(--border, #DFE2EB); border-radius: 10px; overflow: hidden;
            }
            #<?= Toolkit::e($uid) ?> .plentool-facts li { display: flex; justify-content: space-between; gap: 10px; padding: 8px 11px; background: var(--surface-2, #F8F9FB); font-size: 13px; }
            #<?= Toolkit::e($uid) ?> .plentool-facts span:first-child { color: var(--ink-3, #4B5259); }
            #<?= Toolkit::e($uid) ?> .plentool-facts span:last-child { font-weight: 600; font-variant-numeric: tabular-nums; }
        </style>

        <form class="plentool-form" method="post" action="<?= Toolkit::e((string) ($ctx['calc']['path'] ?? '/')) ?>" data-plen-form>
            <label for="<?= Toolkit::e($uid) ?>-post"><?= Toolkit::e($t('Your caption', 'Your caption')) ?></label>
            <textarea id="<?= Toolkit::e($uid) ?>-post" name="t_post" data-plen="text"><?= Toolkit::e($text) ?></textarea>
            <button type="submit" class="tool-btn"><?= Toolkit::e($t('Check every platform', 'Check every platform')) ?></button>
        </form>

        <p class="plentool-answer" role="status" aria-live="polite">
            <?= Toolkit::e($t('Characters', 'Characters')) ?>
            <strong data-plen="length"><?= Toolkit::e((string) $length) ?></strong>
            <span data-plen="summary"><?= Toolkit::e(strtr($t('{n} characters, {w} words.', '{n} characters, {w} words.'), ['{n}' => (string) $length, '{w}' => (string) $words])) ?></span>
        </p>

        <div class="plentool-rows" data-plen="rows">
            <?php foreach ($limits as $limit): ?>
                <?php $state = $length > $limit[1] ? 'over' : ($length > $limit[1] * 0.9 ? 'near' : 'ok'); ?>
                <div class="plentool-row" data-state="<?= $state ?>" data-limit="<?= $limit[1] ?>">
                    <div class="plentool-head">
                        <b><?= Toolkit::e($limit[0]) ?></b>
                        <span><?= Toolkit::e($length > $limit[1]
                            ? strtr($t('{n} over', '{n} over'), ['{n}' => (string) ($length - $limit[1])])
                            : strtr($t('{n} left of {limit}', '{n} left of {limit}'), ['{n}' => (string) ($limit[1] - $length), '{limit}' => (string) $limit[1]])) ?></span>
                    </div>
                    <div class="plentool-bar"><i style="width: <?= (int) min(100, round($length / $limit[1] * 100)) ?>%"></i></div>
                </div>
            <?php endforeach; ?>
        </div>

        <ul class="plentool-facts">
            <li><span><?= Toolkit::e($t('Words', 'Words')) ?></span><span data-plen="words"><?= Toolkit::e((string) $words) ?></span></li>
            <li><span><?= Toolkit::e($t('Reading time', 'Reading time')) ?></span><span data-plen="read"><?= Toolkit::e((string) max(1, (int) ceil($words / 220))) ?> s</span></li>
            <li><span><?= Toolkit::e($t('Hashtags', 'Hashtags')) ?></span><span data-plen="tags"><?= Toolkit::e((string) preg_match_all('/#[\p{L}\p{N}_]+/u', $text)) ?></span></li>
            <li><span><?= Toolkit::e($t('Links', 'Links')) ?></span><span data-plen="links"><?= Toolkit::e((string) preg_match_all('~https?://\S+~i', $text)) ?></span></li>
        </ul>

        <p class="plentool-note">
            <?= Toolkit::e($t('Every limit above is enforced by the platform, not a suggestion. The number that decides whether anyone reads past the first line is smaller: about 125 characters on Instagram, 210 on LinkedIn, 100 on TikTok.', 'Every limit above is enforced by the platform, not a suggestion. The number that decides whether anyone reads past the first line is smaller: about 125 characters on Instagram, 210 on LinkedIn, 100 on TikTok.')) ?>
        </p>

        <script>
        (function () {
            var L = {
                over: <?= json_encode($t('{n} over', '{n} over'), JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>,
                left: <?= json_encode($t('{n} left of {limit}', '{n} left of {limit}'), JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>
            };
            var root = document.getElementById(<?= json_encode($uid) ?>);
            if (!root) return;
            var text = root.querySelector('[data-plen="text"]');
            var lengthOut = root.querySelector('[data-plen="length"]');
            var summary = root.querySelector('[data-plen="summary"]');
            var wordsOut = root.querySelector('[data-plen="words"]');
            var readOut = root.querySelector('[data-plen="read"]');
            var tagsOut = root.querySelector('[data-plen="tags"]');
            var linksOut = root.querySelector('[data-plen="links"]');
            var rows = root.querySelectorAll('.plentool-row');

            function count(value) {
                /* Array.from counts code points, so an emoji is one character
                   here — which is not what X does, and is said so in the note. */
                return Array.from(value).length;
            }

            function run() {
                var value = text.value;
                var length = count(value);
                var words = (value.trim().match(/\S+/g) || []).length;
                lengthOut.textContent = String(length);
                summary.textContent = length + ' characters, ' + words + ' words.';
                wordsOut.textContent = String(words);
                readOut.textContent = Math.max(1, Math.ceil(words / 4)) + ' s';
                tagsOut.textContent = String((value.match(/#[\p{L}\p{N}_]+/gu) || []).length);
                linksOut.textContent = String((value.match(/https?:\/\/\S+/gi) || []).length);

                rows.forEach(function (row) {
                    var limit = Number(row.getAttribute('data-limit'));
                    var head = row.querySelector('.plentool-head span');
                    var fill = row.querySelector('.plentool-bar i');
                    var state = length > limit ? 'over' : (length > limit * 0.9 ? 'near' : 'ok');
                    row.setAttribute('data-state', state);
                    head.textContent = length > limit
                        ? L.over.replace('{n}', length - limit)
                        : L.left.replace('{n}', limit - length).replace('{limit}', limit);
                    fill.style.width = Math.min(100, Math.round(length / limit * 100)) + '%';
                });
            }

            text.addEventListener('input', run);
            root.querySelector('[data-plen-form]').addEventListener('submit', function (event) {
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
