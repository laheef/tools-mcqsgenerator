<?php
/**
 * Tool Name: Number Base Converter
 * Shortcode: tool_number_base
 * Category: converters
 * Version: 1.0.0
 * Description: Convert between decimal, hexadecimal, octal, binary and any base from 2 to 36, with the bit pattern shown.
 * Language: en
 */

/*
 * One number, every base at once — which is how a developer actually uses this:
 * they paste a hex value and want to know what else it is, not to convert it
 * twice through two forms.
 *
 * Arbitrary precision, because 0xFFFFFFFFFF is a perfectly ordinary 40-bit
 * counter and it overflows a JavaScript float. PHP has GMP-free big-integer
 * handling through its own routines only if the extension is there, so the
 * arithmetic is done digit by digit here: multiply the accumulator by the base
 * and add the digit, on a string. That works past 64 bits without a dependency.
 *
 * In the browser the same thing is done with BigInt, which every current browser
 * has.
 */

declare(strict_types=1);

if (!defined('ONIM_TOOLKIT')) {
    http_response_code(403);
    exit('This file is a tool definition, not a page.');
}

use Onim\Toolkit;

Toolkit::addShortcode('tool_number_base', static function (array $atts, ?string $inner, array $ctx): string {
    $uid = (string) $ctx['uid'];
    $t   = static fn (string $key, string $default): string => Toolkit::t($key, $default);

    $input = trim((string) ($_GET['t_num'] ?? 'FF'));
    if ($input === '') {
        $input = 'FF';
    }
    $base = (int) ($_GET['t_base'] ?? 16);
    if ($base < 2 || $base > 36) {
        $base = 16;
    }

    /* ---- big-integer helpers, string in, string out ---------------------- */
    $digits = '0123456789abcdefghijklmnopqrstuvwxyz';

    /** decimal string → base-N string, by repeated division */
    $fromDecimal = static function (string $dec, int $toBase) use ($digits): string {
        $dec = ltrim($dec, '0');
        if ($dec === '') {
            return '0';
        }
        $out = '';
        while ($dec !== '0' && $dec !== '') {
            $remainder = 0;
            $next = '';
            $length = strlen($dec);
            for ($i = 0; $i < $length; $i++) {
                $cur = $remainder * 10 + (int) $dec[$i];
                $q = intdiv($cur, $toBase);
                $remainder = $cur % $toBase;
                if ($next !== '' || $q > 0) {
                    $next .= (string) $q;
                }
            }
            $out = $digits[$remainder] . $out;
            $dec = $next === '' ? '0' : $next;
        }
        return $out === '' ? '0' : $out;
    };

    /** base-N string → decimal string */
    $toDecimal = static function (string $value, int $fromBase) use ($digits): ?string {
        $value = strtolower(preg_replace('/[\s_]/', '', $value) ?? '');
        if ($value === '') {
            return '0';
        }
        $acc = '0';
        $length = strlen($value);
        for ($i = 0; $i < $length; $i++) {
            $digit = strpos($digits, $value[$i]);
            if ($digit === false || $digit >= $fromBase) {
                return null;
            }
            /* acc = acc * base + digit, on a decimal string */
            $carry = $digit;
            $result = '';
            for ($j = strlen($acc) - 1; $j >= 0; $j--) {
                $cur = (int) $acc[$j] * $fromBase + $carry;
                $result = ($cur % 10) . $result;
                $carry = intdiv($cur, 10);
            }
            while ($carry > 0) {
                $result = ($carry % 10) . $result;
                $carry = intdiv($carry, 10);
            }
            $acc = ltrim($result, '0');
            if ($acc === '') {
                $acc = '0';
            }
        }
        return $acc;
    };

    $decimal = $toDecimal($input, $base);
    $valid   = $decimal !== null;

    if (!$valid) {
        $input = 'FF';
        $base = 16;
        $decimal = '255';
    }

    $grouped = static function (string $value, int $size = 4): string {
        return trim(chunk_split($value, $size, ' '));
    };

    $bin = $fromDecimal($decimal, 2);
    /* The row names travel to the script as data: it rewrites these rows on
       every keypress, and an English rebuild of a German page would undo the
       translation one label at a time. */
    $L = [
        'decimal' => $t('Decimal', 'Decimal'),
        'hex'     => $t('Hexadecimal', 'Hexadecimal'),
        'octal'   => $t('Octal', 'Octal'),
        'binary'  => $t('Binary', 'Binary'),
        'base36'  => $t('Base 36', 'Base 36'),
        'bits'    => $t('Bits', 'Bits'),
        'bytes'   => $t('Bytes', 'Bytes'),
    ];
    $rows = [
        [$L['decimal'], $fromDecimal($decimal, 10)],
        [$L['hex'], strtoupper($fromDecimal($decimal, 16))],
        [$L['octal'], $fromDecimal($decimal, 8)],
        [$L['binary'], $grouped($bin)],
        [$L['base36'], strtoupper($fromDecimal($decimal, 36))],
        [$L['bits'], (string) strlen($bin)],
        [$L['bytes'], number_format((int) ceil(strlen($bin) / 8), 0, '.', ' ')],
    ];

    ob_start();
    ?>
    <div class="basetool" id="<?= Toolkit::e($uid) ?>">
        <style>
            #<?= Toolkit::e($uid) ?> .basetool-form { display: grid; gap: 10px; }
            #<?= Toolkit::e($uid) ?> .basetool-row { display: grid; grid-template-columns: 88px minmax(0,1fr); gap: 8px; align-items: end; }
            #<?= Toolkit::e($uid) ?> .basetool-form input { font-family: ui-monospace, SFMono-Regular, Menlo, Consolas, monospace; }
            #<?= Toolkit::e($uid) ?> .basetool-answer {
                margin: 14px 0 0; padding: 12px 14px; border-radius: 10px;
                background: var(--brand-soft, #EBEFFF); border: 1px solid #D7DEFF; font-size: 13px; color: var(--ink-2, #212427);
            }
            #<?= Toolkit::e($uid) ?> .basetool-answer strong {
                display: block; font-size: 22px; line-height: 1.2; color: var(--brand-ink, #294CC2);
                font-family: ui-monospace, SFMono-Regular, Menlo, Consolas, monospace; word-break: break-all;
            }
            #<?= Toolkit::e($uid) ?> .basetool-facts {
                margin: 12px 0 0; padding: 0; list-style: none; display: grid; gap: 1px;
                border: 1px solid var(--border, #DFE2EB); border-radius: 10px; overflow: hidden;
            }
            #<?= Toolkit::e($uid) ?> .basetool-facts li { display: flex; justify-content: space-between; gap: 12px; padding: 8px 11px; background: var(--surface-2, #F8F9FB); font-size: 13px; }
            #<?= Toolkit::e($uid) ?> .basetool-facts span:first-child { color: var(--ink-3, #4B5259); flex: 0 0 auto; }
            #<?= Toolkit::e($uid) ?> .basetool-facts span:last-child {
                font-weight: 600; text-align: right; word-break: break-all;
                font-family: ui-monospace, SFMono-Regular, Menlo, Consolas, monospace;
            }
            #<?= Toolkit::e($uid) ?> .basetool-any { margin-top: 12px; }
            #<?= Toolkit::e($uid) ?> .basetool-note { margin: 10px 0 0; font-size: 12.4px; color: var(--ink-4, #66717F); line-height: 1.5; }
            #<?= Toolkit::e($uid) ?> .basetool-error { margin: 10px 0 0; font-size: 12.6px; color: #B3261E; font-weight: 600; }
        </style>

        <form class="basetool-form" method="get" action="<?= Toolkit::e((string) ($ctx['calc']['path'] ?? '/')) ?>" data-base-form>
            <div class="basetool-row">
                <div>
                    <label for="<?= Toolkit::e($uid) ?>-base"><?= Toolkit::e($t('Base', 'Base')) ?></label>
                    <input type="text" inputmode="numeric" id="<?= Toolkit::e($uid) ?>-base" name="t_base" value="<?= Toolkit::e((string) $base) ?>" data-base="base" maxlength="2">
                </div>
                <div>
                    <label for="<?= Toolkit::e($uid) ?>-num"><?= Toolkit::e($t('Number', 'Number')) ?></label>
                    <input type="text" id="<?= Toolkit::e($uid) ?>-num" name="t_num" value="<?= Toolkit::e($input) ?>" data-base="num" autocomplete="off" spellcheck="false">
                </div>
            </div>
            <button type="submit" class="tool-btn"><?= Toolkit::e($t('Convert', 'Convert')) ?></button>
        </form>

        <p class="basetool-error" data-base="error"<?= $valid ? ' hidden' : '' ?>>
            <?= $valid ? '' : Toolkit::e('That is not a valid base-' . $base . ' number. Digits go up to ' . strtoupper($digits[$base - 1]) . '.') ?>
        </p>

        <p class="basetool-answer" role="status" aria-live="polite">
            <?= Toolkit::e($t('In decimal', 'In decimal')) ?>
            <strong data-base="out-dec"><?= Toolkit::e($rows[0][1]) ?></strong>
        </p>

        <ul class="basetool-facts" data-base="facts">
            <?php foreach ($rows as $row): ?>
                <li><span><?= Toolkit::e($row[0]) ?></span><span><?= Toolkit::e($row[1]) ?></span></li>
            <?php endforeach; ?>
        </ul>

        <div class="basetool-any">
            <label for="<?= Toolkit::e($uid) ?>-any"><?= Toolkit::e($t('Same number in another base (2–36)', 'Same number in another base (2–36)')) ?></label>
            <input type="text" id="<?= Toolkit::e($uid) ?>-any" data-base="any" inputmode="numeric" placeholder="36">
        </div>

        <p class="basetool-note">
            <?= Toolkit::e($t('A byte is 8 bits, so 255 is the largest value one byte holds and 0xFF is the same number written in hex. Bases above 10 use the letters A–Z for the digits after 9.', 'A byte is 8 bits, so 255 is the largest value one byte holds and 0xFF is the same number written in hex. Bases above 10 use the letters A–Z for the digits after 9.')) ?>
        </p>

        <script>
        (function () {
            var L = <?= json_encode($L, JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>;
            var root = document.getElementById(<?= json_encode($uid) ?>);
            if (!root) return;
            var DIGITS = '0123456789abcdefghijklmnopqrstuvwxyz';
            var numIn = root.querySelector('[data-base="num"]');
            var baseIn = root.querySelector('[data-base="base"]');
            var anyIn = root.querySelector('[data-base="any"]');
            var outDec = root.querySelector('[data-base="out-dec"]');
            var facts = root.querySelector('[data-base="facts"]');
            var error = root.querySelector('[data-base="error"]');

            function parseBase(value) {
                var n = parseInt(String(value), 10);
                return isFinite(n) && n >= 2 && n <= 36 ? n : null;
            }

            /* string → BigInt, digit by digit, so 40-bit counters are exact */
            function toBig(value, base) {
                var text = String(value).toLowerCase().replace(/[\s_]/g, '');
                if (text === '') return null;
                var acc = BigInt(0);
                var b = BigInt(base);
                for (var i = 0; i < text.length; i++) {
                    var digit = DIGITS.indexOf(text[i]);
                    if (digit < 0 || digit >= base) return null;
                    acc = acc * b + BigInt(digit);
                }
                return acc;
            }

            function fromBig(value, base) {
                if (value === BigInt(0)) return '0';
                var out = '';
                var b = BigInt(base);
                while (value > BigInt(0)) {
                    out = DIGITS[Number(value % b)] + out;
                    value = value / b;
                }
                return out;
            }

            function group4(value) {
                return value.replace(/(.{4})(?=.)/g, '$1 ');
            }

            function run() {
                var base = parseBase(baseIn.value);
                var value = base === null ? null : toBig(numIn.value, base);
                if (base === null || value === null) {
                    error.hidden = false;
                    error.textContent = base === null
                        ? 'The base has to be a number from 2 to 36.'
                        : 'That is not a valid base-' + baseIn.value + ' number. Digits go up to ' + DIGITS[Math.max(0, base - 1)].toUpperCase() + '.';
                    return;
                }
                error.hidden = true;

                var dec = fromBig(value, 10);
                var bin = fromBig(value, 2);
                outDec.textContent = dec.replace(/\B(?=(\d{3})+(?!\d))/g, ' ');

                var rows = [
                    [L.decimal, dec.replace(/\B(?=(\d{3})+(?!\d))/g, ' ')],
                    [L.hex, fromBig(value, 16).toUpperCase()],
                    [L.octal, fromBig(value, 8)],
                    [L.binary, group4(bin)],
                    [L.base36, fromBig(value, 36).toUpperCase()],
                    [L.bits, String(bin.length)],
                    [L.bytes, String(Math.ceil(bin.length / 8))]
                ];
                var items = facts.querySelectorAll('li');
                if (items.length !== rows.length) {
                    facts.innerHTML = rows.map(function () { return '<li><span></span><span></span></li>'; }).join('');
                    items = facts.querySelectorAll('li');
                }
                rows.forEach(function (row, index) {
                    items[index].children[0].textContent = row[0];
                    items[index].children[1].textContent = row[1];
                });

                var anyBase = parseBase(anyIn.value);
                if (anyBase !== null) {
                    anyIn.setAttribute('placeholder', fromBig(value, anyBase).toUpperCase());
                }
            }

            numIn.addEventListener('input', run);
            baseIn.addEventListener('input', run);
            anyIn.addEventListener('input', run);
            root.querySelector('[data-base-form]').addEventListener('submit', function (event) {
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
