<?php
/**
 * Tool Name: Tip and Bill Splitter
 * Shortcode: tool_tip_split
 * Category: finance
 * Version: 1.0.0
 * Description: The tip, the total and what each person owes, with the working shown.
 * Language: en
 */

/*
 * This tool shows the second half of the pattern: attributes.
 *
 * A shortcode can carry settings the page supplies, and the tool reads them
 * from $atts — so one file serves several pages without being copied:
 *
 *   [tool_tip_split]                      → $
 *   [tool_tip_split currency="€"]         → €
 *   [tool_tip_split currency="£" max="6"] → £ , six people maximum
 *
 * Everything else is the same as any other tool: server-rendered answer,
 * scoped ids, inline styles, translated labels.
 */

declare(strict_types=1);

if (!defined('ONIM_TOOLKIT')) {
    http_response_code(403);
    exit('This file is a tool definition, not a page.');
}

use Onim\Toolkit;

Toolkit::addShortcode('tool_tip_split', static function (array $atts, ?string $inner, array $ctx): string {
    $uid = (string) $ctx['uid'];
    $t   = static fn (string $key, string $default): string => Toolkit::t($key, $default);

    $currency = trim((string) ($atts['currency'] ?? '$')) ?: '$';
    $maxPeople = max(2, min(50, (int) ($atts['max'] ?? 20)));

    $bill   = isset($_GET['t_bill'])   ? (string) $_GET['t_bill']   : '84.50';
    $tip    = isset($_GET['t_tip'])    ? (string) $_GET['t_tip']    : '18';
    $people = isset($_GET['t_people']) ? (string) $_GET['t_people'] : '4';

    $billValue   = is_numeric(trim($bill)) ? max(0.0, (float) $bill) : null;
    $tipValue    = is_numeric(trim($tip)) ? max(0.0, min(100.0, (float) $tip)) : null;
    $peopleValue = is_numeric(trim($people)) ? (int) round((float) $people) : null;
    $peopleValue = $peopleValue !== null ? max(1, min($maxPeople, $peopleValue)) : null;

    $action = (string) ($ctx['calc']['path'] ?? '');
    $action = $action !== '' ? $action : '/';

    $money = static function (?float $value) use ($currency): string {
        if ($value === null) {
            return '—';
        }
        return $currency . number_format(round($value, 2), 2, '.', ',');
    };

    $tipAmount = ($billValue !== null && $tipValue !== null) ? $billValue * $tipValue / 100 : null;
    $total     = ($billValue !== null && $tipAmount !== null) ? $billValue + $tipAmount : null;
    $each      = ($total !== null && $peopleValue !== null && $peopleValue > 0) ? $total / $peopleValue : null;
    $tipEach   = ($tipAmount !== null && $peopleValue !== null && $peopleValue > 0) ? $tipAmount / $peopleValue : null;

    ob_start();
    ?>
    <div class="tiptool" id="<?= Toolkit::e($uid) ?>">
        <style>
            #<?= Toolkit::e($uid) ?> .tip-grid { display: grid; gap: 12px; }
            #<?= Toolkit::e($uid) ?> .tip-row { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; }
            #<?= Toolkit::e($uid) ?> .tip-input { position: relative; }
            #<?= Toolkit::e($uid) ?> .tip-input input { padding-left: 30px; }
            #<?= Toolkit::e($uid) ?> .tip-prefix {
                position: absolute; left: 12px; top: 50%; transform: translateY(-50%);
                font-size: 14px; font-weight: 600; color: var(--ink-4, #66717F); pointer-events: none;
            }
            #<?= Toolkit::e($uid) ?> .tip-chips { display: flex; gap: 6px; flex-wrap: wrap; margin-top: 7px; }
            #<?= Toolkit::e($uid) ?> .tip-chip {
                padding: 5px 11px; font: inherit; font-size: 12.6px; font-weight: 600;
                color: var(--ink-3, #4B5259); background: var(--surface-2, #F8F9FB);
                border: 1px solid var(--border, #DFE2EB); border-radius: 999px; cursor: pointer;
                transition: border-color .15s ease, color .15s ease;
            }
            #<?= Toolkit::e($uid) ?> .tip-chip:hover,
            #<?= Toolkit::e($uid) ?> .tip-chip[aria-pressed="true"] {
                color: var(--brand-ink, #294CC2); border-color: var(--brand, #3B68FC); background: var(--brand-soft, #EBEFFF);
            }
            #<?= Toolkit::e($uid) ?> .tip-out {
                margin-top: 16px; display: grid; gap: 1px; overflow: hidden;
                border: 1px solid var(--border, #DFE2EB); border-radius: 10px;
            }
            #<?= Toolkit::e($uid) ?> .tip-line {
                display: flex; align-items: baseline; justify-content: space-between; gap: 12px;
                padding: 10px 14px; background: var(--surface-2, #F8F9FB); font-size: 14px;
            }
            #<?= Toolkit::e($uid) ?> .tip-line span:first-child { color: var(--ink-3, #4B5259); }
            #<?= Toolkit::e($uid) ?> .tip-line span:last-child { font-weight: 700; font-variant-numeric: tabular-nums; }
            #<?= Toolkit::e($uid) ?> .tip-line--total {
                background: var(--brand-soft, #EBEFFF); border-block: 1px solid #D7DEFF;
            }
            #<?= Toolkit::e($uid) ?> .tip-line--total span:last-child { font-size: 20px; color: var(--brand-ink, #294CC2); }
            #<?= Toolkit::e($uid) ?> .tip-note { margin: 10px 0 0; font-size: 12.4px; color: var(--ink-4, #66717F); }
        </style>

        <form class="tip-grid" method="get" action="<?= Toolkit::e($action) ?>" data-tool-form>
            <div>
                <label for="<?= Toolkit::e($uid) ?>-bill"><?= Toolkit::e($t('Bill', 'Bill')) ?></label>
                <div class="tip-input">
                    <span class="tip-prefix"><?= Toolkit::e($currency) ?></span>
                    <input type="text" inputmode="decimal" id="<?= Toolkit::e($uid) ?>-bill"
                           name="t_bill" value="<?= Toolkit::e($bill) ?>" autocomplete="off" data-tool="bill">
                </div>
            </div>

            <div>
                <label for="<?= Toolkit::e($uid) ?>-tip"><?= Toolkit::e($t('Tip', 'Tip')) ?> (%)</label>
                <input type="text" inputmode="decimal" id="<?= Toolkit::e($uid) ?>-tip"
                       name="t_tip" value="<?= Toolkit::e($tip) ?>" autocomplete="off" data-tool="tip">
                <div class="tip-chips" role="group" aria-label="<?= Toolkit::e($t('Common tip rates', 'Common tip rates')) ?>">
                    <?php foreach ([10, 15, 18, 20] as $rate): ?>
                        <button type="button" class="tip-chip" data-tip-rate="<?= $rate ?>"
                                aria-pressed="<?= (string) $tip === (string) $rate ? 'true' : 'false' ?>"><?= $rate ?>%</button>
                    <?php endforeach; ?>
                </div>
            </div>

            <div>
                <label for="<?= Toolkit::e($uid) ?>-people"><?= Toolkit::e($t('Split between', 'Split between')) ?></label>
                <input type="text" inputmode="numeric" id="<?= Toolkit::e($uid) ?>-people"
                       name="t_people" value="<?= Toolkit::e($people) ?>" autocomplete="off" data-tool="people">
            </div>

            <button type="submit" class="tool-btn"><?= Toolkit::e($t('Calculate', 'Calculate')) ?></button>
        </form>

        <div class="tip-out" role="status" aria-live="polite">
            <div class="tip-line">
                <span><?= Toolkit::e($t('Tip', 'Tip')) ?></span>
                <span data-out="tip"><?= Toolkit::e($money($tipAmount)) ?></span>
            </div>
            <div class="tip-line tip-line--total">
                <span><?= Toolkit::e($t('Total', 'Total')) ?></span>
                <span data-out="total"><?= Toolkit::e($money($total)) ?></span>
            </div>
            <div class="tip-line">
                <span><?= Toolkit::e($t('Each person pays', 'Each person pays')) ?></span>
                <span data-out="each"><?= Toolkit::e($money($each)) ?></span>
            </div>
            <div class="tip-line">
                <span><?= Toolkit::e($t('Of which tip, per person', 'Of which tip, per person')) ?></span>
                <span data-out="tipEach"><?= Toolkit::e($money($tipEach)) ?></span>
            </div>
        </div>

        <p class="tip-note"><?= Toolkit::e($t('Amounts are rounded to the nearest cent; the total is not re-split to hide the remainder.', 'Amounts are rounded to the nearest cent; the total is not re-split to hide the remainder.')) ?></p>

        <script>
        (function () {
            var root = document.getElementById(<?= json_encode($uid) ?>);
            if (!root) return;
            var currency = <?= json_encode($currency) ?>;
            var maxPeople = <?= json_encode($maxPeople) ?>;
            var bill = root.querySelector('[data-tool="bill"]');
            var tip = root.querySelector('[data-tool="tip"]');
            var people = root.querySelector('[data-tool="people"]');
            var out = {
                tip: root.querySelector('[data-out="tip"]'),
                total: root.querySelector('[data-out="total"]'),
                each: root.querySelector('[data-out="each"]'),
                tipEach: root.querySelector('[data-out="tipEach"]')
            };
            var chips = root.querySelectorAll('[data-tip-rate]');

            function num(el) {
                var cleaned = String(el.value).replace(/[\s,]/g, '').replace(',', '.');
                if (cleaned === '' || isNaN(Number(cleaned))) return null;
                return Number(cleaned);
            }
            function money(value) {
                if (value === null || !isFinite(value)) return '—';
                return currency + value.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
            }
            function run() {
                var b = num(bill);
                var p = num(tip);
                var n = num(people);
                if (b !== null) b = Math.max(0, b);
                if (p !== null) p = Math.max(0, Math.min(100, p));
                if (n !== null) n = Math.max(1, Math.min(maxPeople, Math.round(n)));

                var tipAmount = (b === null || p === null) ? null : b * p / 100;
                var total = (b === null || tipAmount === null) ? null : b + tipAmount;
                out.tip.textContent = money(tipAmount);
                out.total.textContent = money(total);
                out.each.textContent = (total === null || !n) ? '—' : money(total / n);
                out.tipEach.textContent = (tipAmount === null || !n) ? '—' : money(tipAmount / n);

                if (p !== null) {
                    for (var i = 0; i < chips.length; i++) {
                        var active = Number(chips[i].getAttribute('data-tip-rate')) === p;
                        chips[i].setAttribute('aria-pressed', active ? 'true' : 'false');
                    }
                }
            }
            [bill, tip, people].forEach(function (el) {
                el.addEventListener('input', run);
                el.addEventListener('change', run);
            });
            for (var i = 0; i < chips.length; i++) {
                chips[i].addEventListener('click', function (event) {
                    tip.value = event.currentTarget.getAttribute('data-tip-rate');
                    run();
                });
            }
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
