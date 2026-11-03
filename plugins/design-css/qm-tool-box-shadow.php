<?php
/**
 * Tool Name: CSS Box Shadow Generator
 * Shortcode: tool_box_shadow
 * Category: design-css
 * Version: 1.0.0
 * Description: Build a box-shadow with sliders, see it on a card, and copy the CSS.
 * Language: en
 */

/*
 * The four numbers in a box-shadow are offset-x, offset-y, blur and spread, and
 * in that order — which is the one thing people get wrong when they write it by
 * hand, because the blur radius is not the length of the shadow's edge and the
 * spread is not the size of the box.
 *
 * So the preview is not decoration: it is the answer. The CSS string under it is
 * generated from the same numbers, and both are printed on the server for the
 * default values, so the page says something before a slider is touched.
 */

declare(strict_types=1);

if (!defined('ONIM_TOOLKIT')) {
    http_response_code(403);
    exit('This file is a tool definition, not a page.');
}

use Onim\Toolkit;

Toolkit::addShortcode('tool_box_shadow', static function (array $atts, ?string $inner, array $ctx): string {
    $uid = (string) $ctx['uid'];
    $t   = static fn (string $key, string $default): string => Toolkit::t($key, $default);

    $x      = (int) ($_GET['t_x'] ?? 0);
    $y      = (int) ($_GET['t_y'] ?? 12);
    $blur   = (int) ($_GET['t_blur'] ?? 28);
    $spread = (int) ($_GET['t_spread'] ?? -6);
    $opacity = (float) ($_GET['t_alpha'] ?? 0.18);
    $inset  = !empty($_GET['t_inset']);

    $x      = max(-60, min(60, $x));
    $y      = max(-60, min(60, $y));
    $blur   = max(0, min(120, $blur));
    $spread = max(-40, min(60, $spread));
    $opacity = max(0.02, min(1, $opacity));

    $hex = static function (float $alpha): string {
        $value = (int) round($alpha * 255);
        return str_pad(dechex($value), 2, '0', STR_PAD_LEFT);
    };
    /* #0A0A0A at the chosen alpha — one shadow colour, not a picker, because a
       shadow in another hue is a design decision the reader can make in CSS. */
    $shadow = ($inset ? 'inset ' : '') . $x . 'px ' . $y . 'px ' . $blur . 'px ' . $spread . 'px rgba(10, 10, 10, ' . rtrim(rtrim(number_format($opacity, 2, '.', ''), '0'), '.') . ')';
    $css = 'box-shadow: ' . $shadow . ';';

    ob_start();
    ?>
    <div class="shtool" id="<?= Toolkit::e($uid) ?>">
        <style>
            #<?= Toolkit::e($uid) ?> .shtool-stage {
                display: grid; place-items: center; padding: 30px 16px; border-radius: 12px;
                background: var(--surface-2, #F8F9FB); border: 1px solid var(--border, #DFE2EB);
            }
            #<?= Toolkit::e($uid) ?> .shtool-card {
                width: min(240px, 100%); height: 132px; border-radius: 14px; background: #fff;
                display: grid; place-items: center; color: var(--ink-4, #66717F); font-size: 12.6px;
                border: 1px solid rgba(10,10,10,.04);
            }
            #<?= Toolkit::e($uid) ?> .shtool-controls { display: grid; gap: 9px; margin-top: 14px; }
            #<?= Toolkit::e($uid) ?> .shtool-control { display: grid; grid-template-columns: 64px minmax(0,1fr) 46px; align-items: center; gap: 8px; }
            #<?= Toolkit::e($uid) ?> .shtool-control label { font-size: 12.4px; font-weight: 600; color: var(--ink-3, #4B5259); margin: 0; }
            #<?= Toolkit::e($uid) ?> .shtool-control input[type="range"] { width: 100%; }
            #<?= Toolkit::e($uid) ?> .shtool-control output { font-size: 12.4px; text-align: right; font-variant-numeric: tabular-nums; color: var(--ink-2, #212427); }
            #<?= Toolkit::e($uid) ?> .shtool-inset { display: flex; align-items: center; gap: 8px; font-size: 13px; margin-top: 4px; }
            #<?= Toolkit::e($uid) ?> .shtool-inset input { width: auto; }
            #<?= Toolkit::e($uid) ?> .shtool-code {
                margin-top: 12px; padding: 11px 12px; border-radius: 9px; background: #0E1116; color: #D7E2F7;
                font-family: ui-monospace, SFMono-Regular, Menlo, Consolas, monospace; font-size: 12.2px;
                line-height: 1.6; overflow-x: auto; white-space: pre-wrap; word-break: break-word;
            }
            #<?= Toolkit::e($uid) ?> .shtool-note { margin: 10px 0 0; font-size: 12.4px; color: var(--ink-4, #66717F); line-height: 1.5; }
        </style>

        <div class="shtool-stage">
            <div class="shtool-card" data-sh="card" style="box-shadow: <?= Toolkit::e($shadow) ?>"><?= Toolkit::e($t('Your card', 'Your card')) ?></div>
        </div>

        <div class="shtool-controls">
            <div class="shtool-control">
                <label for="<?= Toolkit::e($uid) ?>-x"><?= Toolkit::e($t('Offset X', 'Offset X')) ?></label>
                <input type="range" id="<?= Toolkit::e($uid) ?>-x" min="-60" max="60" value="<?= $x ?>" data-sh="x">
                <output data-sh="x-out"><?= $x ?>px</output>
            </div>
            <div class="shtool-control">
                <label for="<?= Toolkit::e($uid) ?>-y"><?= Toolkit::e($t('Offset Y', 'Offset Y')) ?></label>
                <input type="range" id="<?= Toolkit::e($uid) ?>-y" min="-60" max="60" value="<?= $y ?>" data-sh="y">
                <output data-sh="y-out"><?= $y ?>px</output>
            </div>
            <div class="shtool-control">
                <label for="<?= Toolkit::e($uid) ?>-blur"><?= Toolkit::e($t('Blur', 'Blur')) ?></label>
                <input type="range" id="<?= Toolkit::e($uid) ?>-blur" min="0" max="120" value="<?= $blur ?>" data-sh="blur">
                <output data-sh="blur-out"><?= $blur ?>px</output>
            </div>
            <div class="shtool-control">
                <label for="<?= Toolkit::e($uid) ?>-spread"><?= Toolkit::e($t('Spread', 'Spread')) ?></label>
                <input type="range" id="<?= Toolkit::e($uid) ?>-spread" min="-40" max="60" value="<?= $spread ?>" data-sh="spread">
                <output data-sh="spread-out"><?= $spread ?>px</output>
            </div>
            <div class="shtool-control">
                <label for="<?= Toolkit::e($uid) ?>-alpha"><?= Toolkit::e($t('Opacity', 'Opacity')) ?></label>
                <input type="range" id="<?= Toolkit::e($uid) ?>-alpha" min="2" max="100" value="<?= (int) round($opacity * 100) ?>" data-sh="alpha">
                <output data-sh="alpha-out"><?= (int) round($opacity * 100) ?>%</output>
            </div>
            <label class="shtool-inset" for="<?= Toolkit::e($uid) ?>-inset">
                <input type="checkbox" id="<?= Toolkit::e($uid) ?>-inset" data-sh="inset"<?= $inset ? ' checked' : '' ?>>
                <?= Toolkit::e($t('Inset (a shadow inside the edge)', 'Inset (a shadow inside the edge)')) ?>
            </label>
        </div>

        <div class="shtool-code" data-sh="code"><?= Toolkit::e($css) ?></div>
        <button type="button" class="tool-btn" style="margin-top:10px" data-sh="copy"><?= Toolkit::e($t('Copy the CSS', 'Copy the CSS')) ?></button>

        <p class="shtool-note">
            <?= Toolkit::e($t('The order is offset-x, offset-y, blur, spread. A negative spread shrinks the shadow; a large blur with no offset is a glow rather than a shadow. Two layers — a tight one and a wide one — is what makes a card look lifted rather than blurred.', 'The order is offset-x, offset-y, blur, spread. A negative spread shrinks the shadow; a large blur with no offset is a glow rather than a shadow. Two layers — a tight one and a wide one — is what makes a card look lifted rather than blurred.')) ?>
        </p>

        <script>
        (function () {
            var root = document.getElementById(<?= json_encode($uid) ?>);
            if (!root) return;
            var card = root.querySelector('[data-sh="card"]');
            var code = root.querySelector('[data-sh="code"]');
            var copy = root.querySelector('[data-sh="copy"]');
            var els = {
                x: root.querySelector('[data-sh="x"]'),
                y: root.querySelector('[data-sh="y"]'),
                blur: root.querySelector('[data-sh="blur"]'),
                spread: root.querySelector('[data-sh="spread"]'),
                alpha: root.querySelector('[data-sh="alpha"]'),
                inset: root.querySelector('[data-sh="inset"]')
            };

            function run() {
                var alpha = Number(els.alpha.value) / 100;
                var shadow = (els.inset.checked ? 'inset ' : '') +
                    els.x.value + 'px ' + els.y.value + 'px ' + els.blur.value + 'px ' + els.spread.value + 'px ' +
                    'rgba(10, 10, 10, ' + String(Math.round(alpha * 100) / 100) + ')';
                card.style.boxShadow = shadow;
                code.textContent = 'box-shadow: ' + shadow + ';';
                root.querySelector('[data-sh="x-out"]').textContent = els.x.value + 'px';
                root.querySelector('[data-sh="y-out"]').textContent = els.y.value + 'px';
                root.querySelector('[data-sh="blur-out"]').textContent = els.blur.value + 'px';
                root.querySelector('[data-sh="spread-out"]').textContent = els.spread.value + 'px';
                root.querySelector('[data-sh="alpha-out"]').textContent = els.alpha.value + '%';
            }

            Object.keys(els).forEach(function (key) {
                els[key].addEventListener('input', run);
                els[key].addEventListener('change', run);
            });

            copy.addEventListener('click', function () {
                var text = code.textContent;
                var done = function () {
                    var old = copy.textContent;
                    copy.textContent = 'Copied';
                    setTimeout(function () { copy.textContent = old; }, 1400);
                };
                if (navigator.clipboard && navigator.clipboard.writeText) {
                    navigator.clipboard.writeText(text).then(done, done);
                } else {
                    done();
                }
            });

            run();
        })();
        </script>
    </div>
    <?php
    return (string) ob_get_clean();
});
