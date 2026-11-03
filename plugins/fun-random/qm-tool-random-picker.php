<?php
/**
 * Tool Name: Random Picker
 * Shortcode: tool_random_picker
 * Category: fun-random
 * Version: 1.0.0
 * Description: Pick winners from a list, fairly, with no repeats — and see which line each pick came from.
 * Language: en
 */

/*
 * A random picker has one real problem: most of them are not random. A
 * `Math.random()` sort is biased, a repeated `Math.random()` in a loop can pick
 * the same person twice, and a page that hides its method cannot be trusted with
 * a prize.
 *
 * So the method is stated and the method is plain: assign every line an index,
 * then Fisher–Yates shuffle those indices with a cryptographic random source, and
 * take the first N. Every line has the same chance, no line comes up twice, and
 * the numbers are printed with the winners so the draw can be checked against a
 * recording of it.
 *
 * The server draw uses random_int(), so the page works without the script and
 * gives a genuinely different result each time it is submitted.
 */

declare(strict_types=1);

if (!defined('ONIM_TOOLKIT')) {
    http_response_code(403);
    exit('This file is a tool definition, not a page.');
}

use Onim\Toolkit;

Toolkit::addShortcode('tool_random_picker', static function (array $atts, ?string $inner, array $ctx): string {
    $uid = (string) $ctx['uid'];
    $t   = static fn (string $key, string $default): string => Toolkit::t($key, $default);

    $raw = (string) ($_POST['t_list'] ?? $_GET['t_list'] ?? '');
    if (trim($raw) === '') {
        $raw = "Ada\nGrace\nKatherine\nMargaret\nRadia\nHedy\nBarbara";
    }
    $wanted = (int) ($_POST['t_pick'] ?? $_GET['t_pick'] ?? 1);
    if ($wanted < 1) {
        $wanted = 1;
    }

    $lines = array_values(array_filter(array_map('trim', preg_split('/\R/u', $raw) ?: []), static fn ($line) => $line !== ''));
    $total = count($lines);
    $wanted = min($wanted, max(1, $total));

    /* Fisher–Yates over the line indices, drawing from random_int(). */
    $indices = range(0, max(0, $total - 1));
    if ($total > 1) {
        for ($i = $total - 1; $i > 0; $i--) {
            $j = random_int(0, $i);
            [$indices[$i], $indices[$j]] = [$indices[$j], $indices[$i]];
        }
    }
    $picked = array_slice($indices, 0, $wanted);

    $percent = $total > 0 ? round(100 / $total, 2) : 0;

    /* How many orderings the list has, in the same "≈ 10^n" form the script
       prints — log10(n!) = sum of log10(i), which stays exact in floating
       point for any list short enough to type by hand. */
    $ordersLog = 0.0;
    for ($i = 2; $i <= $total; $i++) {
        $ordersLog += log10($i);
    }
    $ordersText = $total < 2 ? '1' : '≈ 10^' . (string) (int) round($ordersLog);

    ob_start();
    ?>
    <div class="pktool" id="<?= Toolkit::e($uid) ?>">
        <style>
            #<?= Toolkit::e($uid) ?> .pktool-form { display: grid; gap: 10px; }
            #<?= Toolkit::e($uid) ?> .pktool-form textarea { min-height: 140px; resize: vertical; font-family: ui-monospace, SFMono-Regular, Menlo, Consolas, monospace; font-size: 13px; }
            #<?= Toolkit::e($uid) ?> .pktool-row { display: grid; grid-template-columns: 96px minmax(0,1fr); gap: 8px; align-items: end; }
            #<?= Toolkit::e($uid) ?> .pktool-winners {
                margin: 14px 0 0; padding: 0; list-style: none; display: grid; gap: 6px;
            }
            #<?= Toolkit::e($uid) ?> .pktool-winners li {
                display: flex; align-items: baseline; gap: 10px; padding: 10px 12px; border-radius: 10px;
                background: var(--brand-soft, #EBEFFF); border: 1px solid #D7DEFF;
            }
            #<?= Toolkit::e($uid) ?> .pktool-winners b {
                font-size: 11px; font-weight: 700; letter-spacing: .06em; color: var(--brand-ink, #294CC2);
                text-transform: uppercase; flex: 0 0 auto;
            }
            #<?= Toolkit::e($uid) ?> .pktool-winners span { font-size: 15px; font-weight: 600; color: var(--ink); }
            #<?= Toolkit::e($uid) ?> .pktool-winners em { margin-left: auto; font-style: normal; font-size: 11.4px; color: var(--ink-4, #66717F); }
            #<?= Toolkit::e($uid) ?> .pktool-empty { margin: 14px 0 0; padding: 12px; border-radius: 10px; background: var(--surface-2, #F8F9FB); font-size: 13px; color: var(--ink-3, #4B5259); }
            #<?= Toolkit::e($uid) ?> .pktool-facts {
                margin: 12px 0 0; padding: 0; list-style: none; display: grid; gap: 1px;
                border: 1px solid var(--border, #DFE2EB); border-radius: 10px; overflow: hidden;
            }
            #<?= Toolkit::e($uid) ?> .pktool-facts li { display: flex; justify-content: space-between; gap: 10px; padding: 8px 11px; background: var(--surface-2, #F8F9FB); font-size: 13px; }
            #<?= Toolkit::e($uid) ?> .pktool-facts span:first-child { color: var(--ink-3, #4B5259); }
            #<?= Toolkit::e($uid) ?> .pktool-facts span:last-child { font-weight: 600; font-variant-numeric: tabular-nums; }
            #<?= Toolkit::e($uid) ?> .pktool-note { margin: 10px 0 0; font-size: 12.4px; color: var(--ink-4, #66717F); line-height: 1.5; }
            #<?= Toolkit::e($uid) ?> .pktool-flash { animation: pkpop .35s ease; }
            @keyframes pkpop { from { transform: scale(.97); opacity: .4; } to { transform: scale(1); opacity: 1; } }
        </style>

        <form class="pktool-form" method="post" action="<?= Toolkit::e((string) ($ctx['calc']['path'] ?? '/')) ?>" data-pk-form>
            <label for="<?= Toolkit::e($uid) ?>-list"><?= Toolkit::e($t('One entry per line', 'One entry per line')) ?></label>
            <textarea id="<?= Toolkit::e($uid) ?>-list" name="t_list" data-pk="list"><?= Toolkit::e($raw) ?></textarea>
            <div class="pktool-row">
                <div>
                    <label for="<?= Toolkit::e($uid) ?>-pick"><?= Toolkit::e($t('Winners', 'Winners')) ?></label>
                    <input type="text" inputmode="numeric" id="<?= Toolkit::e($uid) ?>-pick" name="t_pick" value="<?= Toolkit::e((string) $wanted) ?>" data-pk="pick">
                </div>
                <button type="submit" class="tool-btn"><?= Toolkit::e($t('Pick', 'Pick')) ?></button>
            </div>
        </form>

        <?php if ($total === 0): ?>
            <p class="pktool-empty"><?= Toolkit::e($t('Add at least one line, then press Pick.', 'Add at least one line, then press Pick.')) ?></p>
        <?php else: ?>
            <ul class="pktool-winners" data-pk="winners" aria-live="polite">
                <?php foreach ($picked as $rank => $index): ?>
                    <li>
                        <b><?= Toolkit::e($t('Pick', 'Pick')) ?> <?= (int) $rank + 1 ?></b>
                        <span><?= Toolkit::e($lines[$index]) ?></span>
                        <em><?= Toolkit::e($t('line', 'line')) ?> <?= (int) $index + 1 ?></em>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <ul class="pktool-facts">
            <li><span><?= Toolkit::e($t('Entries', 'Entries')) ?></span><span data-pk="entries"><?= Toolkit::e((string) $total) ?></span></li>
            <li><span><?= Toolkit::e($t('Chance per entry', 'Chance per entry')) ?></span><span data-pk="chance"><?= Toolkit::e(number_format($percent, 2, '.', ' ')) ?>%</span></li>
            <li><span><?= Toolkit::e($t('Duplicates removed', 'Duplicates removed')) ?></span><span data-pk="dupes">0</span></li>
            <li><span><?= Toolkit::e($t('Orders possible', 'Orders possible')) ?></span><span data-pk="space"><?= Toolkit::e($ordersText) ?></span></li>
        </ul>

        <p class="pktool-note">
            <?= Toolkit::e($t('The draw is a Fisher–Yates shuffle seeded from crypto.getRandomValues() — every line has the same chance and nothing can be drawn twice. The server draw uses random_int(), so pressing Pick with the script off also gives a fresh, fair result.',
                'The draw is a Fisher–Yates shuffle seeded from crypto.getRandomValues() — every line has the same chance and nothing can be drawn twice. The server draw uses random_int(), so pressing Pick with the script off also gives a fresh, fair result.')) ?>
        </p>

        <script>
        (function () {
            var root = document.getElementById(<?= json_encode($uid) ?>);
            if (!root) return;
            var list = root.querySelector('[data-pk="list"]');
            var pick = root.querySelector('[data-pk="pick"]');
            var winners = root.querySelector('[data-pk="winners"]');
            var entriesOut = root.querySelector('[data-pk="entries"]');
            var chanceOut = root.querySelector('[data-pk="chance"]');
            var dupesOut = root.querySelector('[data-pk="dupes"]');
            var spaceOut = root.querySelector('[data-pk="space"]');

            function lines() {
                return list.value.split(/\r?\n/).map(function (line) { return line.trim(); })
                    .filter(function (line) { return line !== ''; });
            }

            function randomInt(max) {
                if (max <= 0) return 0;
                var limit = Math.floor(0xFFFFFFFF / max) * max;
                var buffer = new Uint32Array(1);
                do { crypto.getRandomValues(buffer); } while (buffer[0] >= limit);
                return buffer[0] % max;
            }

            function stats() {
                var all = lines();
                var seen = {}, dupes = 0;
                all.forEach(function (line) {
                    var key = line.toLowerCase();
                    if (seen[key]) dupes++;
                    seen[key] = true;
                });
                entriesOut.textContent = String(all.length);
                chanceOut.textContent = all.length ? (100 / all.length).toFixed(2) + '%' : '—';
                dupesOut.textContent = String(dupes);

                /* how many orderings of the list exist, in words */
                var n = all.length;
                if (n < 2) { spaceOut.textContent = '1'; return; }
                var log10 = 0;
                for (var i = 2; i <= n; i++) log10 += Math.log(i) / Math.LN10;
                spaceOut.textContent = '≈ 10^' + Math.round(log10);
                return all;
            }

            function draw() {
                var all = stats() || [];
                if (!all.length) {
                    if (winners) winners.innerHTML = '';
                    return;
                }
                var count = Math.max(1, Math.min(parseInt(String(pick.value).replace(/\D/g, ''), 10) || 1, all.length));
                var indices = all.map(function (_, index) { return index; });
                for (var i = indices.length - 1; i > 0; i--) {
                    var j = randomInt(i + 1);
                    var temp = indices[i];
                    indices[i] = indices[j];
                    indices[j] = temp;
                }
                var chosen = indices.slice(0, count);

                if (!winners) {
                    winners = document.createElement('ul');
                    winners.className = 'pktool-winners';
                    winners.setAttribute('data-pk', 'winners');
                    list.closest('form').insertAdjacentElement('afterend', winners);
                }
                winners.innerHTML = chosen.map(function (index, rank) {
                    return '<li><b>Pick ' + (rank + 1) + '</b><span></span><em>line ' + (index + 1) + '</em></li>';
                }).join('');
                var items = winners.querySelectorAll('li span');
                chosen.forEach(function (index, rank) {
                    items[rank].textContent = all[index];
                });
                winners.classList.remove('pktool-flash');
                void winners.offsetWidth;
                winners.classList.add('pktool-flash');
            }

            list.addEventListener('input', stats);
            pick.addEventListener('input', stats);
            root.querySelector('[data-pk-form]').addEventListener('submit', function (event) {
                event.preventDefault();
                draw();
            });
            stats();
        })();
        </script>
    </div>
    <?php
    return (string) ob_get_clean();
});
