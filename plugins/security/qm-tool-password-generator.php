<?php
/**
 * Tool Name: Password Generator
 * Shortcode: tool_password_generator
 * Category: security
 * Version: 1.0.0
 * Description: Generate a strong random password in this page, with the entropy it actually carries.
 * Language: en
 */

/*
 * The password is made by the browser's cryptographic random source —
 * crypto.getRandomValues, not Math.random — and it never leaves the page: there
 * is no form post, no request, no clipboard call unless the reader presses copy.
 *
 * The number next to it is the point. "16 characters" says nothing; "104 bits of
 * entropy" says the search space is 2^104, which is the only claim that means
 * anything. Entropy is length × log2(pool size), and the pool is counted from
 * the boxes that are ticked.
 *
 * The server also generates one, so a visitor without JavaScript still gets a
 * password — from random_int(), the CSPRNG — and the entropy arithmetic is
 * printed either way.
 */

declare(strict_types=1);

if (!defined('ONIM_TOOLKIT')) {
    http_response_code(403);
    exit('This file is a tool definition, not a page.');
}

use Onim\Toolkit;

Toolkit::addShortcode('tool_password_generator', static function (array $atts, ?string $inner, array $ctx): string {
    $uid = (string) $ctx['uid'];
    $t   = static fn (string $key, string $default): string => Toolkit::t($key, $default);

    $lower   = 'abcdefghijkmnopqrstuvwxyz';      // no l
    $upper   = 'ABCDEFGHJKLMNPQRSTUVWXYZ';       // no I, O
    $numbers = '23456789';                       // no 0, 1
    $symbols = '!@#$%^&*()-_=+[]{};:,.?';
    $all     = $lower . $upper . $numbers;

    $length = 16;
    $pool   = $all;
    $bitsPool = strlen($pool);
    $entropy = (int) floor($length * log($bitsPool, 2));

    /* One password on the server, from the CSPRNG, so the page is useful with
     * the script blocked. It is deliberately not reproducible. */
    $example = '';
    $max = strlen($all) - 1;
    for ($i = 0; $i < $length; $i++) {
        $example .= $all[random_int(0, $max)];
    }

    /* The same estimate the script prints, worked out here so the page says
       something useful before a button is pressed: 2^bits guesses at ten
       billion a second, in years. */
    $seconds = pow(2, $entropy) / 1e10;
    $years   = $seconds / 31557600;
    /* One row per unit, each a whole phrase with {n} where the number goes.
       The script gets the same map, so pressing "Generate another" cannot
       print "31 billion years" on a German page. */
    $u = [
        'sec'  => $t('under a second', 'under a second'),
        'min'  => $t('{n} minutes', '{n} minutes'),
        'yr'   => $t('{n} years', '{n} years'),
        'kyr'  => $t('{n} thousand years', '{n} thousand years'),
        'myr'  => $t('{n} million years', '{n} million years'),
        'byr'  => $t('{n} billion years', '{n} billion years'),
        'univ' => $t('longer than the universe has existed', 'longer than the universe has existed'),
        'tick' => $t('Tick at least one kind of character.', 'Tick at least one kind of character.'),
    ];
    if ($seconds < 1) {
        $guessTime = $u['sec'];
    } elseif ($years < 1) {
        $guessTime = strtr($u['min'], ['{n}' => (string) round($seconds / 60)]);
    } elseif ($years < 1000) {
        $guessTime = strtr($u['yr'], ['{n}' => (string) round($years)]);
    } elseif ($years < 1e6) {
        $guessTime = strtr($u['kyr'], ['{n}' => (string) round($years / 1000)]);
    } elseif ($years < 1e9) {
        $guessTime = strtr($u['myr'], ['{n}' => (string) round($years / 1e6)]);
    } elseif ($years < 1e12) {
        $guessTime = strtr($u['byr'], ['{n}' => (string) round($years / 1e9)]);
    } else {
        $guessTime = $u['univ'];
    }

    $poolRow = [
        'Lower-case letters' => $lower,
        'Capital letters'    => $upper,
        'Digits'             => $numbers,
        'Symbols'            => $symbols,
    ];

    /* Literal keys, so the "every tool string is translated" test can see
       them. The second column is how many characters that class contributes
       to the pool. */
    $optSets = [
        'lower'   => [$t('Lower-case letters (no l)', 'Lower-case letters (no l)'), 26],
        'upper'   => [$t('Capital letters (no I or O)', 'Capital letters (no I or O)'), 24],
        'digits'  => [$t('Digits (no 0 or 1)', 'Digits (no 0 or 1)'), 8],
        'symbols' => [$t('Symbols', 'Symbols'), 24],
    ];

    ob_start();
    ?>
    <div class="pwtool" id="<?= Toolkit::e($uid) ?>">
        <style>
            #<?= Toolkit::e($uid) ?> .pwtool-out {
                display: flex; align-items: center; gap: 8px; padding: 12px 14px; border-radius: 10px;
                background: #0E1116; color: #EAF0FF; font-family: ui-monospace, SFMono-Regular, Menlo, Consolas, monospace;
                font-size: 15.5px; letter-spacing: .02em; word-break: break-all; min-height: 48px;
            }
            #<?= Toolkit::e($uid) ?> .pwtool-out span { flex: 1 1 auto; }
            #<?= Toolkit::e($uid) ?> .pwtool-out button {
                flex: 0 0 auto; font: inherit; font-size: 12px; font-weight: 700; cursor: pointer;
                background: #1D2430; color: #C9D6F5; border: 1px solid #2B3546; border-radius: 7px; padding: 7px 10px;
            }
            #<?= Toolkit::e($uid) ?> .pwtool-out button:hover { background: #263140; }
            #<?= Toolkit::e($uid) ?> .pwtool-meter { display: grid; gap: 6px; margin-top: 12px; }
            #<?= Toolkit::e($uid) ?> .pwtool-bar { height: 8px; border-radius: 99px; background: var(--surface-3, #EDEFF4); overflow: hidden; }
            #<?= Toolkit::e($uid) ?> .pwtool-bar i { display: block; height: 100%; width: 60%; border-radius: 99px; background: var(--brand, #3B68FC); transition: width .2s ease, background .2s ease; }
            #<?= Toolkit::e($uid) ?> .pwtool-strength { display: flex; justify-content: space-between; font-size: 12.4px; color: var(--ink-4, #66717F); font-variant-numeric: tabular-nums; }
            #<?= Toolkit::e($uid) ?> .pwtool-strength b { color: var(--ink-2, #212427); }
            #<?= Toolkit::e($uid) ?> .pwtool-opts { display: grid; gap: 8px; margin-top: 12px; }
            #<?= Toolkit::e($uid) ?> .pwtool-opt { display: flex; align-items: center; gap: 9px; font-size: 13.4px; }
            #<?= Toolkit::e($uid) ?> .pwtool-opt input[type="checkbox"] { width: auto; }
            #<?= Toolkit::e($uid) ?> .pwtool-len { display: flex; align-items: center; gap: 10px; }
            #<?= Toolkit::e($uid) ?> .pwtool-len input[type="range"] { flex: 1 1 auto; }
            #<?= Toolkit::e($uid) ?> .pwtool-len output { min-width: 40px; text-align: right; font-weight: 700; font-variant-numeric: tabular-nums; color: var(--brand-ink, #294CC2); }
            #<?= Toolkit::e($uid) ?> .pwtool-facts {
                margin: 12px 0 0; padding: 0; list-style: none; display: grid; gap: 1px;
                border: 1px solid var(--border, #DFE2EB); border-radius: 10px; overflow: hidden;
            }
            #<?= Toolkit::e($uid) ?> .pwtool-facts li { display: flex; justify-content: space-between; gap: 10px; padding: 8px 11px; background: var(--surface-2, #F8F9FB); font-size: 13px; }
            #<?= Toolkit::e($uid) ?> .pwtool-facts span:first-child { color: var(--ink-3, #4B5259); }
            #<?= Toolkit::e($uid) ?> .pwtool-facts span:last-child { font-weight: 600; font-variant-numeric: tabular-nums; }
            #<?= Toolkit::e($uid) ?> .pwtool-note { margin: 10px 0 0; font-size: 12.4px; color: var(--ink-4, #66717F); line-height: 1.5; }
        </style>

        <div class="pwtool-out">
            <span data-pw="out" aria-live="polite"><?= Toolkit::e($example) ?></span>
            <button type="button" data-pw="copy"><?= Toolkit::e($t('Copy', 'Copy')) ?></button>
        </div>

        <div class="pwtool-meter">
            <div class="pwtool-bar"><i data-pw="bar"></i></div>
            <div class="pwtool-strength">
                <span data-pw="label"><?= Toolkit::e($t('Strong', 'Strong')) ?></span>
                <span><b data-pw="bits"><?= Toolkit::e((string) $entropy) ?></b> <?= Toolkit::e($t('bits of entropy', 'bits of entropy')) ?></span>
            </div>
        </div>

        <div class="pwtool-len" style="margin-top:12px">
            <label for="<?= Toolkit::e($uid) ?>-len" style="margin:0"><?= Toolkit::e($t('Length', 'Length')) ?></label>
            <input type="range" id="<?= Toolkit::e($uid) ?>-len" min="8" max="48" step="1" value="16" data-pw="len">
            <output data-pw="len-out">16</output>
        </div>

        <div class="pwtool-opts">
            <?php foreach ($optSets as $key => $opt): ?>
                <label class="pwtool-opt" for="<?= Toolkit::e($uid) ?>-<?= Toolkit::e($key) ?>">
                    <input type="checkbox" id="<?= Toolkit::e($uid) ?>-<?= Toolkit::e($key) ?>" data-pw="<?= Toolkit::e($key) ?>"<?= $key === 'symbols' ? '' : ' checked' ?>>
                    <?= Toolkit::e($opt[0]) ?>
                </label>
            <?php endforeach; ?>
        </div>

        <button type="button" class="tool-btn" style="margin-top:12px" data-pw="again"><?= Toolkit::e($t('Generate another', 'Generate another')) ?></button>

        <ul class="pwtool-facts">
            <li><span><?= Toolkit::e($t('Characters in the pool', 'Characters in the pool')) ?></span><span data-pw="pool"><?= Toolkit::e((string) $bitsPool) ?></span></li>
            <li><span><?= Toolkit::e($t('Combinations', 'Combinations')) ?></span><span data-pw="space">≈ 2^<?= Toolkit::e((string) $entropy) ?></span></li>
            <li><span><?= Toolkit::e($t('At 10 billion guesses a second', 'At 10 billion guesses a second')) ?></span><span data-pw="time"><?= Toolkit::e($guessTime) ?></span></li>
        </ul>

        <p class="pwtool-note">
            <?= Toolkit::e($t('Made with crypto.getRandomValues() — a cryptographic random source, not a seeded PRNG. It is generated in this page and never sent anywhere. The look-alike characters l, I, O, 0 and 1 are left out so a password can be read aloud and typed once.',
                'Made with crypto.getRandomValues() — a cryptographic random source, not a seeded PRNG. It is generated in this page and never sent anywhere. The look-alike characters l, I, O, 0 and 1 are left out so a password can be read aloud and typed once.')) ?>
        </p>

        <script>
        (function () {
            var U = <?= json_encode($u, JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>;
            var root = document.getElementById(<?= json_encode($uid) ?>);
            if (!root) return;
            var LOWER = 'abcdefghijkmnopqrstuvwxyz';
            var UPPER = 'ABCDEFGHJKLMNPQRSTUVWXYZ';
            var DIGITS = '23456789';
            var SYMBOLS = '!@#$%^&*()-_=+[]{};:,.?';
            var out = root.querySelector('[data-pw="out"]');
            var copyBtn = root.querySelector('[data-pw="copy"]');
            var againBtn = root.querySelector('[data-pw="again"]');
            var len = root.querySelector('[data-pw="len"]');
            var lenOut = root.querySelector('[data-pw="len-out"]');
            var bar = root.querySelector('[data-pw="bar"]');
            var label = root.querySelector('[data-pw="label"]');
            var bitsOut = root.querySelector('[data-pw="bits"]');
            var poolOut = root.querySelector('[data-pw="pool"]');
            var spaceOut = root.querySelector('[data-pw="space"]');
            var timeOut = root.querySelector('[data-pw="time"]');
            var boxes = ['lower', 'upper', 'digits', 'symbols'].map(function (key) {
                return root.querySelector('[data-pw="' + key + '"]');
            });

            function pool() {
                var chars = '';
                if (boxes[0].checked) chars += LOWER;
                if (boxes[1].checked) chars += UPPER;
                if (boxes[2].checked) chars += DIGITS;
                if (boxes[3].checked) chars += SYMBOLS;
                return chars;
            }

            function random(n) {
                var buffer = new Uint32Array(1);
                crypto.getRandomValues(buffer);
                return buffer[0] % n;
            }

            function make(chars, length) {
                var value = '';
                for (var i = 0; i < length; i++) value += chars[random(chars.length)];
                return value;
            }

            function human(bits) {
                /* 10^10 guesses a second; 2^bits / 1e10 seconds */
                var seconds = Math.pow(2, bits) / 1e10;
                if (seconds < 1) return U.sec;
                var years = seconds / 31557600;
                if (years < 1) return U.min.replace('{n}', Math.round(seconds / 60));
                if (years < 1000) return U.yr.replace('{n}', Math.round(years));
                if (years < 1e6) return U.kyr.replace('{n}', Math.round(years / 1000));
                if (years < 1e9) return U.myr.replace('{n}', Math.round(years / 1e6));
                if (years < 1e12) return U.byr.replace('{n}', Math.round(years / 1e9));
                return U.univ;
            }

            function run(regenerate) {
                var chars = pool();
                var length = Number(len.value);
                lenOut.textContent = String(length);
                if (chars === '') {
                    out.textContent = U.tick;
                    bitsOut.textContent = '0';
                    bar.style.width = '0%';
                    return;
                }
                if (regenerate) out.textContent = make(chars, length);

                var bits = Math.floor(length * Math.log(chars.length) / Math.LN2);
                poolOut.textContent = String(chars.length);
                bitsOut.textContent = String(bits);
                spaceOut.textContent = '≈ 2^' + bits;
                timeOut.textContent = human(bits);
                bar.style.width = Math.min(100, Math.round(bits / 128 * 100)) + '%';
                bar.style.background = bits < 50 ? '#C2410C' : (bits < 80 ? '#B45309' : (bits < 100 ? '#3B68FC' : '#0F7B4F'));
                label.textContent = bits < 50 ? 'Weak' : (bits < 80 ? 'Fair' : (bits < 100 ? 'Strong' : 'Very strong'));
            }

            copyBtn.addEventListener('click', function () {
                var text = out.textContent;
                var done = function () {
                    var old = copyBtn.textContent;
                    copyBtn.textContent = 'Copied';
                    setTimeout(function () { copyBtn.textContent = old; }, 1400);
                };
                if (navigator.clipboard && navigator.clipboard.writeText) {
                    navigator.clipboard.writeText(text).then(done, done);
                } else {
                    var area = document.createElement('textarea');
                    area.value = text;
                    document.body.appendChild(area);
                    area.select();
                    try { document.execCommand('copy'); } catch (e) {}
                    document.body.removeChild(area);
                    done();
                }
            });

            againBtn.addEventListener('click', function () { run(true); });
            len.addEventListener('input', function () { run(true); });
            boxes.forEach(function (box) { box.addEventListener('change', function () { run(true); }); });
            run(false);
        })();
        </script>
    </div>
    <?php
    return (string) ob_get_clean();
});
