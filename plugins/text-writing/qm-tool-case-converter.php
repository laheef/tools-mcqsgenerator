<?php
/**
 * Tool Name: Case Converter
 * Shortcode: tool_case_converter
 * Category: text-writing
 * Version: 1.0.0
 * Description: Turn a sentence into title case, upper case, lower case, camelCase, snake_case or kebab-case.
 * Language: en
 */

/*
 * Six cases off one string, all computed on the server as well as in the script,
 * so the page is fully usable with JavaScript off — press the button, the page
 * comes back with every version printed.
 *
 * The interesting ones are the identifiers. Title case is not "capitalise every
 * word": a, an, the, of, and, or, to, in, for and on stay lower-case unless they
 * open or close the string. camelCase and snake_case start from words split on
 * spaces, punctuation, existing underscores and the boundary between a lower-case
 * letter and a capital one, which is what makes "userIDNumber" become
 * "user_id_number" rather than "useridnumber".
 */

declare(strict_types=1);

if (!defined('ONIM_TOOLKIT')) {
    http_response_code(403);
    exit('This file is a tool definition, not a page.');
}

use Onim\Toolkit;

Toolkit::addShortcode('tool_case_converter', static function (array $atts, ?string $inner, array $ctx): string {
    $uid = (string) $ctx['uid'];
    $t   = static fn (string $key, string $default): string => Toolkit::t($key, $default);

    $text = (string) ($_POST['t_case'] ?? $_GET['t_case'] ?? '');
    if (trim($text) === '') {
        $text = 'the quick brown fox jumps over the lazy dog';
    }

    /* ---- word split: punctuation, underscores, and lower→Upper boundaries --- */
    $words = static function (string $value): array {
        $value = preg_replace('/([a-z0-9])([A-Z])/', '$1 $2', $value) ?? $value;
        $value = preg_replace('/[^A-Za-z0-9\x{00C0}-\x{024F}]+/u', ' ', $value) ?? $value;
        $parts = preg_split('/\s+/u', trim($value)) ?: [];
        return array_values(array_filter($parts, static fn ($p) => $p !== ''));
    };

    $w = $words($text);

    $title  = '';
    $small  = ['a', 'an', 'the', 'of', 'and', 'or', 'to', 'in', 'for', 'on', 'at', 'by', 'with', 'as', 'but', 'nor', 'per', 'via'];
    $count  = count($w);
    foreach ($w as $i => $word) {
        /* $wordLower, not $lower: the whole-text lower-case result is computed
           below this loop, and a loop variable that shadows it silently printed
           the last word as "lower case". */
        $wordLower = mb_strtolower($word);
        $keep      = ($i !== 0 && $i !== $count - 1 && in_array($wordLower, $small, true));
        $title .= ($keep ? $wordLower : mb_strtoupper(mb_substr($wordLower, 0, 1)) . mb_substr($wordLower, 1)) . ' ';
    }
    $title = trim($title);

    $upper = mb_strtoupper($text);
    $lower = mb_strtolower($text);

    /* Sentence case: lower everything, then capitalise after . ! ? and at the start. */
    $sentence = mb_strtolower($text);
    $sentence = preg_replace_callback('/(^|[.!?]\s+)([a-z\x{00E0}-\x{00FF}])/u',
        static fn (array $m): string => $m[1] . mb_strtoupper($m[2]), $sentence) ?? $sentence;
    $sentence = mb_strtoupper(mb_substr($sentence, 0, 1)) . mb_substr($sentence, 1);

    $camel = '';
    foreach ($w as $i => $word) {
        $part = mb_strtolower($word);
        $camel .= $i === 0 ? $part : mb_strtoupper(mb_substr($part, 0, 1)) . mb_substr($part, 1);
    }
    $pascal = '';
    foreach ($w as $word) {
        $part = mb_strtolower($word);
        $pascal .= mb_strtoupper(mb_substr($part, 0, 1)) . mb_substr($part, 1);
    }
    $snake = implode('_', array_map(static fn ($x) => mb_strtolower($x), $w));
    $kebab = implode('-', array_map(static fn ($x) => mb_strtolower($x), $w));
    $constant = implode('_', array_map(static fn ($x) => mb_strtoupper($x), $w));

    $alternating = '';
    $flip = false;
    foreach (mb_str_split($text) as $char) {
        if (preg_match('/\p{L}/u', $char) === 1) {
            $alternating .= $flip ? mb_strtoupper($char) : mb_strtolower($char);
            $flip = !$flip;
        } else {
            $alternating .= $char;
        }
    }

    $rows = [
        'Title Case'      => $title,
        'Sentence case'   => $sentence,
        'UPPER CASE'      => $upper,
        'lower case'      => $lower,
        'camelCase'       => $camel,
        'PascalCase'      => $pascal,
        'snake_case'      => $snake,
        'kebab-case'      => $kebab,
        'CONSTANT_CASE'   => $constant,
        'aLtErNaTiNg'     => $alternating,
    ];

    ob_start();
    ?>
    <div class="casetool" id="<?= Toolkit::e($uid) ?>">
        <style>
            #<?= Toolkit::e($uid) ?> .casetool-form { display: grid; gap: 10px; }
            #<?= Toolkit::e($uid) ?> .casetool-form textarea { min-height: 96px; resize: vertical; }
            #<?= Toolkit::e($uid) ?> .casetool-list { margin: 14px 0 0; padding: 0; list-style: none; display: grid; gap: 6px; }
            #<?= Toolkit::e($uid) ?> .casetool-list li {
                display: grid; grid-template-columns: 96px minmax(0,1fr) auto; align-items: center; gap: 8px;
                padding: 8px 10px; border-radius: 9px; background: var(--surface-2, #F8F9FB); border: 1px solid var(--border, #DFE2EB);
            }
            #<?= Toolkit::e($uid) ?> .casetool-list small { font-size: 10.8px; text-transform: uppercase; letter-spacing: .05em; color: var(--ink-4, #66717F); font-weight: 700; }
            #<?= Toolkit::e($uid) ?> .casetool-list span {
                font-family: ui-monospace, SFMono-Regular, Menlo, Consolas, monospace; font-size: 12.6px;
                overflow: hidden; text-overflow: ellipsis; white-space: nowrap;
            }
            #<?= Toolkit::e($uid) ?> .casetool-list button {
                font: inherit; font-size: 11.4px; font-weight: 600; cursor: pointer; padding: 5px 8px;
                border-radius: 6px; border: 1px solid var(--border-strong, #C9CEDB); background: #fff; color: var(--ink-3, #4B5259);
            }
            #<?= Toolkit::e($uid) ?> .casetool-list button:hover { border-color: var(--brand, #3B68FC); color: var(--brand-ink, #294CC2); }
            #<?= Toolkit::e($uid) ?> .casetool-facts {
                margin: 12px 0 0; padding: 0; list-style: none; display: grid; gap: 1px;
                border: 1px solid var(--border, #DFE2EB); border-radius: 10px; overflow: hidden;
            }
            #<?= Toolkit::e($uid) ?> .casetool-facts li { display: flex; justify-content: space-between; gap: 10px; padding: 8px 11px; background: var(--surface-2, #F8F9FB); font-size: 13px; }
            #<?= Toolkit::e($uid) ?> .casetool-facts span:first-child { color: var(--ink-3, #4B5259); }
            #<?= Toolkit::e($uid) ?> .casetool-facts span:last-child { font-weight: 600; font-variant-numeric: tabular-nums; }
            #<?= Toolkit::e($uid) ?> .casetool-note { margin: 10px 0 0; font-size: 12.4px; color: var(--ink-4, #66717F); line-height: 1.5; }
        </style>

        <form class="casetool-form" method="post" action="<?= Toolkit::e((string) ($ctx['calc']['path'] ?? '/')) ?>" data-case-form>
            <label for="<?= Toolkit::e($uid) ?>-text"><?= Toolkit::e($t('Your text', 'Your text')) ?></label>
            <textarea id="<?= Toolkit::e($uid) ?>-text" name="t_case" data-case="text"><?= Toolkit::e($text) ?></textarea>
            <button type="submit" class="tool-btn"><?= Toolkit::e($t('Convert', 'Convert')) ?></button>
        </form>

        <ul class="casetool-list" data-case="list">
            <?php foreach ($rows as $label => $value): ?>
                <li>
                    <small><?= Toolkit::e($label) ?></small>
                    <span data-case-value="<?= Toolkit::e($label) ?>" title="<?= Toolkit::e($value) ?>"><?= Toolkit::e($value) ?></span>
                    <button type="button" data-copy="<?= Toolkit::e($label) ?>"><?= Toolkit::e($t('Copy', 'Copy')) ?></button>
                </li>
            <?php endforeach; ?>
        </ul>

        <ul class="casetool-facts">
            <li><span><?= Toolkit::e($t('Words', 'Words')) ?></span><span data-case="words"><?= Toolkit::e((string) count($w)) ?></span></li>
            <li><span><?= Toolkit::e($t('Characters', 'Characters')) ?></span><span data-case="chars"><?= Toolkit::e((string) mb_strlen($text)) ?></span></li>
            <li><span><?= Toolkit::e($t('Without spaces', 'Without spaces')) ?></span><span data-case="nospace"><?= Toolkit::e((string) mb_strlen(preg_replace('/\s+/u', '', $text) ?? '')) ?></span></li>
        </ul>

        <p class="casetool-note">
            <?= Toolkit::e($t('Small words — a, an, the, of, and, or, to, in, for, on — stay lower-case in Title Case unless they open or close the string. Identifiers are built from words split on spaces, punctuation, underscores and the seam between a lower-case letter and a capital.', 'Small words — a, an, the, of, and, or, to, in, for, on — stay lower-case in Title Case unless they open or close the string. Identifiers are built from words split on spaces, punctuation, underscores and the seam between a lower-case letter and a capital.')) ?>
        </p>

        <script>
        (function () {
            var root = document.getElementById(<?= json_encode($uid) ?>);
            if (!root) return;
            var text = root.querySelector('[data-case="text"]');
            var list = root.querySelector('[data-case="list"]');
            var wordsOut = root.querySelector('[data-case="words"]');
            var charsOut = root.querySelector('[data-case="chars"]');
            var nospaceOut = root.querySelector('[data-case="nospace"]');
            var SMALL = ['a','an','the','of','and','or','to','in','for','on','at','by','with','as','but','nor','per','via'];

            function split(value) {
                return String(value)
                    .replace(/([a-z0-9])([A-Z])/g, '$1 $2')
                    .split(/[^\p{L}\p{N}]+/u)
                    .filter(function (part) { return part !== ''; });
            }
            function cap(word) {
                return word.charAt(0).toUpperCase() + word.slice(1).toLowerCase();
            }

            function run() {
                var value = text.value;
                var w = split(value);
                var title = w.map(function (word, index) {
                    var lower = word.toLowerCase();
                    if (index !== 0 && index !== w.length - 1 && SMALL.indexOf(lower) !== -1) return lower;
                    return cap(word);
                }).join(' ');

                var sentence = value.toLowerCase().replace(/(^|[.!?]\s+)(\p{Ll})/gu, function (m, prefix, letter) {
                    return prefix + letter.toUpperCase();
                });
                sentence = sentence.charAt(0).toUpperCase() + sentence.slice(1);

                var camel = w.map(function (word, index) {
                    var lower = word.toLowerCase();
                    return index === 0 ? lower : cap(lower);
                }).join('');
                var pascal = w.map(function (word) { return cap(word); }).join('');
                var snake = w.map(function (word) { return word.toLowerCase(); }).join('_');
                var kebab = w.map(function (word) { return word.toLowerCase(); }).join('-');
                var constant = w.map(function (word) { return word.toUpperCase(); }).join('_');
                var flip = false, alternating = '';
                Array.from(value).forEach(function (char) {
                    if (/\p{L}/u.test(char)) {
                        alternating += flip ? char.toUpperCase() : char.toLowerCase();
                        flip = !flip;
                    } else {
                        alternating += char;
                    }
                });

                var rows = {
                    'Title Case': title,
                    'Sentence case': sentence,
                    'UPPER CASE': value.toUpperCase(),
                    'lower case': value.toLowerCase(),
                    'camelCase': camel,
                    'PascalCase': pascal,
                    'snake_case': snake,
                    'kebab-case': kebab,
                    'CONSTANT_CASE': constant,
                    'aLtErNaTiNg': alternating
                };

                list.querySelectorAll('[data-case-value]').forEach(function (cell) {
                    var key = cell.getAttribute('data-case-value');
                    if (rows[key] !== undefined) {
                        cell.textContent = rows[key];
                        cell.title = rows[key];
                    }
                });

                wordsOut.textContent = String(w.length);
                charsOut.textContent = String(Array.from(value).length);
                nospaceOut.textContent = String(Array.from(value.replace(/\s+/g, '')).length);
            }

            list.addEventListener('click', function (event) {
                var button = event.target.closest('[data-copy]');
                if (!button) return;
                var key = button.getAttribute('data-copy');
                var cell = list.querySelector('[data-case-value="' + key + '"]');
                if (!cell) return;
                var text2 = cell.textContent;
                var done = function () {
                    var old = button.textContent;
                    button.textContent = 'Copied';
                    setTimeout(function () { button.textContent = old; }, 1200);
                };
                if (navigator.clipboard && navigator.clipboard.writeText) {
                    navigator.clipboard.writeText(text2).then(done, done);
                } else {
                    var area = document.createElement('textarea');
                    area.value = text2;
                    document.body.appendChild(area);
                    area.select();
                    try { document.execCommand('copy'); } catch (e) {}
                    document.body.removeChild(area);
                    done();
                }
            });

            text.addEventListener('input', run);
            root.querySelector('[data-case-form]').addEventListener('submit', function (event) {
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
