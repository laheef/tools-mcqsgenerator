<?php
/**
 * Tool Name: Percentage of a Number
 * Shortcode: tool_percentage_of
 * Category: math
 * Version: 1.0.0
 * Description: What one number is as a percentage of another, with the working shown.
 * Language: en
 */

/*
 * A tool file is a calculator's widget, start to finish.
 *
 *   1. It declares itself in the header block above: name, shortcode,
 *      category, version. Nothing else in the project needs editing — the
 *      panel scans plugins/ and offers this file for binding to a page.
 *   2. It refuses to run when fetched over HTTP (the guard below).
 *   3. It registers one shortcode whose callback returns the widget's HTML.
 *
 * The rules it follows, which every tool here should follow:
 *
 *   * the answer is rendered on the server, so a crawler and a visitor with
 *     JavaScript off see the same number as everyone else;
 *   * every id is built from $ctx['uid'], so the same tool can appear twice
 *     on one page without its two scripts fighting;
 *   * styles and script are inline and scoped to that uid — no CDN, no
 *     build step, nothing to enqueue;
 *   * every visitor-visible string goes through Toolkit::t(), so the tool
 *     can be translated without touching this file.
 */

declare(strict_types=1);

if (!defined('ONIM_TOOLKIT')) {
    http_response_code(403);
    exit('This file is a tool definition, not a page.');
}

use Onim\Toolkit;

Toolkit::addShortcode('tool_percentage_of', static function (array $atts, ?string $inner, array $ctx): string {
    $uid = (string) $ctx['uid'];
    $t   = static fn (string $key, string $default): string => Toolkit::t($key, $default);

    /* Defaults are the example the article works through. */
    $percent = isset($_GET['t_pct']) ? (string) $_GET['t_pct'] : '15';
    $of      = isset($_GET['t_of']) ? (string) $_GET['t_of'] : '200';

    $percentValue = is_numeric(trim($percent)) ? (float) $percent : null;
    $ofValue      = is_numeric(trim($of)) ? (float) $of : null;

    /* The form posts back to the page itself, so pressing Calculate works
       with the script blocked; the script only makes it live. */
    $action = (string) ($ctx['calc']['path'] ?? '');
    $action = $action !== '' ? $action : '/';

    /**
     * Six decimals, no trailing zeros, thin grouping — the same way the rest
     * of the site prints a number.
     */
    $fmt = static function (?float $value, int $decimals = 4): string {
        if ($value === null) {
            return '—';
        }
        $rounded = round($value, $decimals);
        $out = number_format($rounded, $decimals, '.', ' ');
        $out = rtrim(rtrim($out, '0'), '.');
        return $out === '-0' ? '0' : $out;
    };

    $answer = ($percentValue !== null && $ofValue !== null) ? $percentValue / 100 * $ofValue : null;

    ob_start();
    ?>
    <div class="ptool" id="<?= Toolkit::e($uid) ?>">
        <style>
            #<?= Toolkit::e($uid) ?> .ptool-form { display: grid; gap: 12px; }
            #<?= Toolkit::e($uid) ?> .ptool-sentence {
                display: grid; grid-template-columns: minmax(0, 1fr) auto minmax(0, 1fr);
                align-items: end; gap: 8px;
            }
            #<?= Toolkit::e($uid) ?> .ptool-of {
                display: flex; align-items: center; justify-content: center;
                height: 43px; font-size: 14px; font-weight: 600; color: var(--ink-3, #4B5259);
            }
            #<?= Toolkit::e($uid) ?> .ptool-input { position: relative; }
            #<?= Toolkit::e($uid) ?> .ptool-input input { padding-right: 34px; }
            #<?= Toolkit::e($uid) ?> .ptool-suffix {
                position: absolute; right: 12px; top: 50%; transform: translateY(-50%);
                font-size: 14px; font-weight: 600; color: var(--ink-4, #66717F); pointer-events: none;
            }
            #<?= Toolkit::e($uid) ?> .ptool-answer {
                margin: 16px 0 0; padding: 14px 16px; border-radius: 10px;
                background: var(--brand-soft, #EBEFFF); border: 1px solid #D7DEFF;
                font-size: 15px; line-height: 1.5; color: var(--ink-2, #212427);
            }
            #<?= Toolkit::e($uid) ?> .ptool-answer strong {
                display: block; margin-top: 2px; font-size: 26px; line-height: 1.15;
                letter-spacing: -.01em; color: var(--brand-ink, #294CC2);
                font-variant-numeric: tabular-nums;
            }
            #<?= Toolkit::e($uid) ?> .ptool-work {
                margin: 12px 0 0; padding: 0; list-style: none; display: grid; gap: 1px;
                border: 1px solid var(--border, #DFE2EB); border-radius: 10px; overflow: hidden;
            }
            #<?= Toolkit::e($uid) ?> .ptool-work li {
                display: flex; justify-content: space-between; gap: 12px;
                padding: 8px 12px; background: var(--surface-2, #F8F9FB); font-size: 13.4px;
            }
            #<?= Toolkit::e($uid) ?> .ptool-work span:first-child { color: var(--ink-3, #4B5259); }
            #<?= Toolkit::e($uid) ?> .ptool-work span:last-child { font-variant-numeric: tabular-nums; font-weight: 600; }
            #<?= Toolkit::e($uid) ?> .ptool-hint { margin: 10px 0 0; font-size: 12.4px; color: var(--ink-4, #66717F); }
        </style>

        <form class="ptool-form" method="get" action="<?= Toolkit::e($action) ?>" data-tool-form>
            <div class="ptool-sentence">
                <div>
                    <label for="<?= Toolkit::e($uid) ?>-pct"><?= Toolkit::e($t('Percentage', 'Percentage')) ?></label>
                    <div class="ptool-input">
                        <input type="text" inputmode="decimal" id="<?= Toolkit::e($uid) ?>-pct"
                               name="t_pct" value="<?= Toolkit::e($percent) ?>" autocomplete="off"
                               data-tool="pct" aria-describedby="<?= Toolkit::e($uid) ?>-answer">
                        <span class="ptool-suffix">%</span>
                    </div>
                </div>
                <div class="ptool-of"><?= Toolkit::e($t('of', 'of')) ?></div>
                <div>
                    <label for="<?= Toolkit::e($uid) ?>-of"><?= Toolkit::e($t('Number', 'Number')) ?></label>
                    <input type="text" inputmode="decimal" id="<?= Toolkit::e($uid) ?>-of"
                           name="t_of" value="<?= Toolkit::e($of) ?>" autocomplete="off" data-tool="of">
                </div>
            </div>
            <button type="submit" class="tool-btn"><?= Toolkit::e($t('Calculate', 'Calculate')) ?></button>
        </form>

        <p class="ptool-answer" id="<?= Toolkit::e($uid) ?>-answer" role="status" aria-live="polite" data-tool-answer>
            <?= Toolkit::e($t('Answer', 'Answer')) ?>
            <strong><?= Toolkit::e($fmt($answer)) ?></strong>
        </p>

        <ul class="ptool-work" data-tool-work>
            <?php foreach ([10, 5, 1] as $slice): ?>
                <li>
                    <span><?= Toolkit::e($fmt((float) $slice)) ?>% <?= Toolkit::e($t('of it', 'of it')) ?></span>
                    <span><?= Toolkit::e($fmt($ofValue === null ? null : $ofValue * $slice / 100)) ?></span>
                </li>
            <?php endforeach; ?>
        </ul>

        <p class="ptool-hint"><?= Toolkit::e($t('Tip: the answer updates as you type.', 'Tip: the answer updates as you type.')) ?></p>

        <script>
        (function () {
            var root = document.getElementById(<?= json_encode($uid) ?>);
            if (!root) return;
            var pct = root.querySelector('[data-tool="pct"]');
            var of  = root.querySelector('[data-tool="of"]');
            var answer = root.querySelector('[data-tool-answer] strong');
            var work = root.querySelectorAll('[data-tool-work] li span:last-child');
            var slices = [10, 5, 1];

            function num(value) {
                var cleaned = String(value).replace(/[\s,]/g, '').replace(',', '.');
                if (cleaned === '' || isNaN(Number(cleaned))) return null;
                return Number(cleaned);
            }
            function fmt(value) {
                if (value === null) return '—';
                var rounded = Math.round(value * 10000) / 10000;
                return String(rounded).replace(/\B(?=(\d{3})+(?!\d))/g, ' ');
            }
            function run() {
                var p = num(pct.value), o = num(of.value);
                answer.textContent = (p === null || o === null) ? '—' : fmt(p / 100 * o);
                for (var i = 0; i < work.length; i++) {
                    work[i].textContent = o === null ? '—' : fmt(o * slices[i] / 100);
                }
            }
            [pct, of].forEach(function (el) {
                el.addEventListener('input', run);
                el.addEventListener('change', run);
            });
            /* The form still submits without the script; this only stops the
               round trip when the script is there. */
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
