<?php
/**
 * Tool Name: Colour Converter & Shades
 * Shortcode: tool_color_converter
 * Category: art-color
 * Version: 1.0.0
 * Description: Convert a hex colour to RGB and HSL, see its tints and shades, and check its contrast.
 * Language: en
 */

/*
 * One colour in every notation it is ever written in, plus the two things a
 * designer needs next: a tint/shade ladder from it, and the WCAG contrast ratio
 * against white and black text.
 *
 * The conversions are the standard ones, and they are printed with their working
 * because HSL is where implementations drift:
 *
 *     max = max(R,G,B) / 255, min = min(R,G,B) / 255
 *     L = (max + min) / 2
 *     S = (max - min) / (1 - |2L - 1|)
 *
 * Contrast uses the WCAG relative luminance formula with the sRGB gamma curve,
 * not a naive brightness average — which is why two colours that "look" equally
 * bright can score very differently.
 */

declare(strict_types=1);

if (!defined('ONIM_TOOLKIT')) {
    http_response_code(403);
    exit('This file is a tool definition, not a page.');
}

use Onim\Toolkit;

Toolkit::addShortcode('tool_color_converter', static function (array $atts, ?string $inner, array $ctx): string {
    $uid = (string) $ctx['uid'];
    $t   = static fn (string $key, string $default): string => Toolkit::t($key, $default);

    $hexIn = strtolower(trim((string) ($_GET['t_hex'] ?? '#3b68fc')));
    if (preg_match('/^#?([0-9a-f]{3})$/', $hexIn, $m)) {
        $hexIn = '#' . $m[1][0] . $m[1][0] . $m[1][1] . $m[1][1] . $m[1][2] . $m[1][2];
    }
    if (preg_match('/^#?([0-9a-f]{6})$/', $hexIn, $m) !== 1) {
        $hexIn = '#3b68fc';
        $m = [1 => '3b68fc'];
    }
    $hex = '#' . $m[1];

    [$r, $g, $b] = [hexdec(substr($m[1], 0, 2)), hexdec(substr($m[1], 2, 2)), hexdec(substr($m[1], 4, 2))];

    $rn = $r / 255;
    $gn = $g / 255;
    $bn = $b / 255;
    $max = max($rn, $gn, $bn);
    $min = min($rn, $gn, $bn);
    $d = $max - $min;
    $l = ($max + $min) / 2;
    $s = $d === 0.0 ? 0.0 : $d / (1 - abs(2 * $l - 1));
    if ($d === 0.0) {
        $h = 0.0;
    } elseif ($max === $rn) {
        $h = fmod(($gn - $bn) / $d, 6);
    } elseif ($max === $gn) {
        $h = ($bn - $rn) / $d + 2;
    } else {
        $h = ($rn - $gn) / $d + 4;
    }
    $h = ($h * 60 + 360) % 360;

    /* WCAG relative luminance */
    $lin = static function (float $c): float {
        return $c <= 0.03928 ? $c / 12.92 : pow(($c + 0.055) / 1.055, 2.4);
    };
    $lum = 0.2126 * $lin($rn) + 0.7152 * $lin($gn) + 0.0722 * $lin($bn);
    $vsWhite = (1.05) / ($lum + 0.05);
    $vsBlack = ($lum + 0.05) / 0.05;

    $mix = static function (array $rgb, float $target, float $amount): string {
        $out = '#';
        foreach ($rgb as $channel) {
            $value = (int) round($channel + ($target - $channel) * $amount);
            $out .= str_pad(dechex(max(0, min(255, $value))), 2, '0', STR_PAD_LEFT);
        }
        return $out;
    };

    $shades = [];
    foreach ([0.9, 0.7, 0.5, 0.3, 0.15] as $amount) {
        $shades['Tint ' . (int) round($amount * 100) . '%'] = $mix([$r, $g, $b], 255, $amount);
    }
    foreach ([0.15, 0.3, 0.5, 0.7, 0.9] as $amount) {
        $shades['Shade ' . (int) round($amount * 100) . '%'] = $mix([$r, $g, $b], 0, $amount);
    }

    $hsl = 'hsl(' . round($h) . ' ' . round($s * 100) . '% ' . round($l * 100) . '%)';

    ob_start();
    ?>
    <div class="coltool" id="<?= Toolkit::e($uid) ?>">
        <style>
            #<?= Toolkit::e($uid) ?> .coltool-form { display: grid; gap: 8px; }
            #<?= Toolkit::e($uid) ?> .coltool-form input { font-family: ui-monospace, SFMono-Regular, Menlo, Consolas, monospace; }
            #<?= Toolkit::e($uid) ?> .coltool-swatch {
                height: 76px; border-radius: 12px; margin-top: 12px; border: 1px solid rgba(10,10,10,.08);
                display: grid; place-items: center; font-family: ui-monospace, SFMono-Regular, Menlo, Consolas, monospace;
                font-size: 14px; font-weight: 700;
            }
            #<?= Toolkit::e($uid) ?> .coltool-facts {
                margin: 12px 0 0; padding: 0; list-style: none; display: grid; gap: 1px;
                border: 1px solid var(--border, #DFE2EB); border-radius: 10px; overflow: hidden;
            }
            #<?= Toolkit::e($uid) ?> .coltool-facts li { display: flex; justify-content: space-between; gap: 10px; padding: 8px 11px; background: var(--surface-2, #F8F9FB); font-size: 13px; }
            #<?= Toolkit::e($uid) ?> .coltool-facts span:first-child { color: var(--ink-3, #4B5259); }
            #<?= Toolkit::e($uid) ?> .coltool-facts span:last-child { font-weight: 600; font-family: ui-monospace, SFMono-Regular, Menlo, Consolas, monospace; }
            #<?= Toolkit::e($uid) ?> .coltool-ladder { display: grid; grid-template-columns: repeat(5, minmax(0,1fr)); gap: 4px; margin-top: 12px; }
            #<?= Toolkit::e($uid) ?> .coltool-ladder button {
                border: 0; border-radius: 7px; height: 42px; cursor: pointer; font-size: 9.6px;
                font-family: ui-monospace, SFMono-Regular, Menlo, Consolas, monospace; color: #fff; text-shadow: 0 1px 2px rgba(0,0,0,.35);
            }
            #<?= Toolkit::e($uid) ?> .coltool-label { margin: 12px 0 0; font-size: 11.4px; letter-spacing: .06em; text-transform: uppercase; color: var(--ink-4, #66717F); font-weight: 700; }
            #<?= Toolkit::e($uid) ?> .coltool-note { margin: 10px 0 0; font-size: 12.4px; color: var(--ink-4, #66717F); line-height: 1.5; }
        </style>

        <form class="coltool-form" method="get" action="<?= Toolkit::e((string) ($ctx['calc']['path'] ?? '/')) ?>" data-col-form>
            <label for="<?= Toolkit::e($uid) ?>-hex"><?= Toolkit::e($t('Hex colour', 'Hex colour')) ?></label>
            <input type="text" id="<?= Toolkit::e($uid) ?>-hex" name="t_hex" value="<?= Toolkit::e($hex) ?>" data-col="hex" autocomplete="off" spellcheck="false" maxlength="7">
            <button type="submit" class="tool-btn"><?= Toolkit::e($t('Convert', 'Convert')) ?></button>
        </form>

        <div class="coltool-swatch" data-col="swatch" style="background: <?= Toolkit::e($hex) ?>; color: <?= $lum > 0.4 ? '#0A0A0A' : '#FFFFFF' ?>">
            <?= Toolkit::e(strtoupper($hex)) ?>
        </div>

        <ul class="coltool-facts">
            <li><span>HEX</span><span data-col="hex-out"><?= Toolkit::e(strtoupper($hex)) ?></span></li>
            <li><span>RGB</span><span data-col="rgb">rgb(<?= $r ?>, <?= $g ?>, <?= $b ?>)</span></li>
            <li><span>HSL</span><span data-col="hsl"><?= Toolkit::e($hsl) ?></span></li>
            <li><span><?= Toolkit::e($t('Contrast on white', 'Contrast on white')) ?></span><span data-col="on-white"><?= Toolkit::e(number_format($vsWhite, 2, '.', '')) ?>:1</span></li>
            <li><span><?= Toolkit::e($t('Contrast on black', 'Contrast on black')) ?></span><span data-col="on-black"><?= Toolkit::e(number_format($vsBlack, 2, '.', '')) ?>:1</span></li>
            <li><span>WCAG AA</span><span data-col="wcag"><?= $vsWhite >= 4.5 || $vsBlack >= 4.5 ? Toolkit::e($t('Passes for text', 'Passes for text')) : Toolkit::e($t('Fails for body text', 'Fails for body text')) ?></span></li>
        </ul>

        <p class="coltool-label"><?= Toolkit::e($t('Tints (towards white)', 'Tints (towards white)')) ?></p>
        <div class="coltool-ladder" data-col="tints">
            <?php foreach (array_slice($shades, 0, 5, true) as $name => $value): ?>
                <button type="button" data-hex="<?= Toolkit::e($value) ?>" style="background: <?= Toolkit::e($value) ?>"><?= Toolkit::e(strtoupper($value)) ?></button>
            <?php endforeach; ?>
        </div>

        <p class="coltool-label"><?= Toolkit::e($t('Shades (towards black)', 'Shades (towards black)')) ?></p>
        <div class="coltool-ladder" data-col="shades">
            <?php foreach (array_slice($shades, 5, 5, true) as $name => $value): ?>
                <button type="button" data-hex="<?= Toolkit::e($value) ?>" style="background: <?= Toolkit::e($value) ?>"><?= Toolkit::e(strtoupper($value)) ?></button>
            <?php endforeach; ?>
        </div>

        <p class="coltool-note">
            <?= Toolkit::e($t('Luminance is not the average of the channels: each one is un-gamma-corrected first, so pure green is far brighter than pure blue. A ratio of 4.5:1 is the WCAG AA floor for body text, 3:1 for large text, and 7:1 is AAA. Tap a swatch to load it into the box.', 'Luminance is not the average of the channels: each one is un-gamma-corrected first, so pure green is far brighter than pure blue. A ratio of 4.5:1 is the WCAG AA floor for body text, 3:1 for large text, and 7:1 is AAA. Tap a swatch to load it into the box.')) ?>
        </p>

        <script>
        (function () {
            var L = {
                pass: <?= json_encode($t('Passes for text', 'Passes for text'), JSON_UNESCAPED_UNICODE) ?>,
                fail: <?= json_encode($t('Fails for body text', 'Fails for body text'), JSON_UNESCAPED_UNICODE) ?>
            };
            var root = document.getElementById(<?= json_encode($uid) ?>);
            if (!root) return;
            var hexIn = root.querySelector('[data-col="hex"]');
            var swatch = root.querySelector('[data-col="swatch"]');
            var outHex = root.querySelector('[data-col="hex-out"]');
            var outRgb = root.querySelector('[data-col="rgb"]');
            var outHsl = root.querySelector('[data-col="hsl"]');
            var onWhite = root.querySelector('[data-col="on-white"]');
            var onBlack = root.querySelector('[data-col="on-black"]');
            var wcag = root.querySelector('[data-col="wcag"]');

            function parse(value) {
                var text = String(value).trim().replace(/^#/, '');
                if (/^[0-9a-f]{3}$/i.test(text)) {
                    text = text[0] + text[0] + text[1] + text[1] + text[2] + text[2];
                }
                if (!/^[0-9a-f]{6}$/i.test(text)) return null;
                return {
                    hex: '#' + text.toLowerCase(),
                    r: parseInt(text.slice(0, 2), 16),
                    g: parseInt(text.slice(2, 4), 16),
                    b: parseInt(text.slice(4, 6), 16)
                };
            }
            function lin(c) {
                c = c / 255;
                return c <= 0.03928 ? c / 12.92 : Math.pow((c + 0.055) / 1.055, 2.4);
            }
            function hsl(c) {
                var r = c.r / 255, g = c.g / 255, b = c.b / 255;
                var max = Math.max(r, g, b), min = Math.min(r, g, b);
                var d = max - min, l = (max + min) / 2;
                var s = d === 0 ? 0 : d / (1 - Math.abs(2 * l - 1));
                var h;
                if (d === 0) h = 0;
                else if (max === r) h = ((g - b) / d) % 6;
                else if (max === g) h = (b - r) / d + 2;
                else h = (r - g) / d + 4;
                h = (h * 60 + 360) % 360;
                return { h: h, s: s, l: l };
            }
            function mix(c, target, amount) {
                var out = '#';
                [c.r, c.g, c.b].forEach(function (channel) {
                    var value = Math.max(0, Math.min(255, Math.round(channel + (target - channel) * amount)));
                    out += ('0' + value.toString(16)).slice(-2);
                });
                return out;
            }

            function run() {
                var c = parse(hexIn.value);
                if (!c) return;
                var lum = 0.2126 * lin(c.r) + 0.7152 * lin(c.g) + 0.0722 * lin(c.b);
                var w = 1.05 / (lum + 0.05);
                var k = (lum + 0.05) / 0.05;
                var to = hsl(c);

                swatch.style.background = c.hex;
                swatch.style.color = lum > 0.4 ? '#0A0A0A' : '#FFFFFF';
                swatch.textContent = c.hex.toUpperCase();
                outHex.textContent = c.hex.toUpperCase();
                outRgb.textContent = 'rgb(' + c.r + ', ' + c.g + ', ' + c.b + ')';
                outHsl.textContent = 'hsl(' + Math.round(to.h) + ' ' + Math.round(to.s * 100) + '% ' + Math.round(to.l * 100) + '%)';
                onWhite.textContent = w.toFixed(2) + ':1';
                onBlack.textContent = k.toFixed(2) + ':1';
                wcag.textContent = (w >= 4.5 || k >= 4.5) ? L.pass : L.fail;

                var tints = root.querySelector('[data-col="tints"]').children;
                [0.9, 0.7, 0.5, 0.3, 0.15].forEach(function (amount, index) {
                    var value = mix(c, 255, amount);
                    tints[index].style.background = value;
                    tints[index].textContent = value.toUpperCase();
                    tints[index].setAttribute('data-hex', value);
                });
                var shades = root.querySelector('[data-col="shades"]').children;
                [0.15, 0.3, 0.5, 0.7, 0.9].forEach(function (amount, index) {
                    var value = mix(c, 0, amount);
                    shades[index].style.background = value;
                    shades[index].textContent = value.toUpperCase();
                    shades[index].setAttribute('data-hex', value);
                });
            }

            root.addEventListener('click', function (event) {
                var button = event.target.closest('[data-hex]');
                if (!button) return;
                hexIn.value = button.getAttribute('data-hex');
                run();
            });
            hexIn.addEventListener('input', run);
            root.querySelector('[data-col-form]').addEventListener('submit', function (event) {
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
