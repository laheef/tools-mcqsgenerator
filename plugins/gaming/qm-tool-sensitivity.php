<?php
/**
 * Tool Name: Sensitivity Converter
 * Shortcode: tool_sensitivity
 * Category: gaming
 * Version: 1.0.0
 * Description: Convert mouse sensitivity between games through cm per 360°, the one number that is comparable.
 * Language: en
 */

/*
 * eDPI — DPI × in-game sensitivity — is the number people quote and it is not
 * comparable across games, because every game multiplies the count by a different
 * amount. The comparable number is cm/360: how many centimetres of mouse pad it
 * takes to turn all the way round. One number, any game.
 *
 *     counts per turn = 360 / (sensitivity × yaw)
 *     cm per turn     = counts × 2.54 / DPI
 *
 * yaw is degrees of rotation per mouse count, and it is a fact about the game's
 * engine, not about the player. The values below are the ones each game's own
 * config uses; they are printed on the page so the reader can check them.
 *
 * The tool converts *both* ways: pick the game you play and the game you want,
 * and it gives the sensitivity to type into the second one.
 */

declare(strict_types=1);

if (!defined('ONIM_TOOLKIT')) {
    http_response_code(403);
    exit('This file is a tool definition, not a page.');
}

use Onim\Toolkit;

Toolkit::addShortcode('tool_sensitivity', static function (array $atts, ?string $inner, array $ctx): string {
    $uid = (string) $ctx['uid'];
    $t   = static fn (string $key, string $default): string => Toolkit::t($key, $default);

    /* degrees per count, straight from each game's input code */
    $games = [
        'cs2'      => ['name' => 'Counter-Strike 2', 'yaw' => 0.022],
        'valorant' => ['name' => 'Valorant', 'yaw' => 0.07],
        'apex'     => ['name' => 'Apex Legends', 'yaw' => 0.022],
        'ow2'      => ['name' => 'Overwatch 2', 'yaw' => 0.0066],
        'r6'       => ['name' => 'Rainbow Six Siege', 'yaw' => 0.00573],
        'rust'     => ['name' => 'Rust', 'yaw' => 0.022],
    ];

    $dpi   = (float) ($_GET['t_dpi'] ?? 800);
    $sens  = (float) ($_GET['t_sens'] ?? 1.0);
    $from  = (string) ($_GET['t_from'] ?? 'cs2');
    $to    = (string) ($_GET['t_to'] ?? 'valorant');
    if ($dpi <= 0 || $dpi > 32000) {
        $dpi = 800.0;
    }
    if ($sens <= 0 || $sens > 100) {
        $sens = 1.0;
    }
    if (!isset($games[$from])) {
        $from = 'cs2';
    }
    if (!isset($games[$to])) {
        $to = 'valorant';
    }

    $yawFrom = $games[$from]['yaw'];
    $yawTo   = $games[$to]['yaw'];

    /* the arithmetic, once */
    $counts = 360 / ($sens * $yawFrom);
    $cm360  = $counts * 2.54 / $dpi;
    $sensTo = 360 / ($cm360 * $dpi / 2.54) / $yawTo;
    $edpi   = $dpi * $sens;

    /* Trailing zeros are dropped only after a decimal point: trimming "800"
       with zeros would print "8", which is how a 800 DPI default became an
       8 DPI one and made every cm/360 figure a hundred times too large. */
    $fmt = static function (float $value, int $dp = 3): string {
        $out = number_format($value, $dp, '.', '');
        if (str_contains($out, '.')) {
            $out = rtrim(rtrim($out, '0'), '.');
        }
        return $out === '-0' ? '0' : $out;
    };

    ob_start();
    ?>
    <div class="senstool" id="<?= Toolkit::e($uid) ?>">
        <style>
            #<?= Toolkit::e($uid) ?> .senstool-form { display: grid; gap: 10px; }
            #<?= Toolkit::e($uid) ?> .senstool-pair { display: grid; grid-template-columns: minmax(0,1fr) minmax(0,1fr); gap: 8px; }
            #<?= Toolkit::e($uid) ?> .senstool-answer {
                margin: 14px 0 0; padding: 12px 14px; border-radius: 10px;
                background: var(--brand-soft, #EBEFFF); border: 1px solid #D7DEFF; font-size: 13px; color: var(--ink-2, #212427);
            }
            #<?= Toolkit::e($uid) ?> .senstool-answer strong {
                display: block; font-size: 26px; line-height: 1.15; letter-spacing: -.01em;
                color: var(--brand-ink, #294CC2); font-variant-numeric: tabular-nums;
            }
            #<?= Toolkit::e($uid) ?> .senstool-answer small { display: block; margin-top: 3px; color: var(--ink-3, #4B5259); font-size: 12.4px; }
            #<?= Toolkit::e($uid) ?> .senstool-facts {
                margin: 12px 0 0; padding: 0; list-style: none; display: grid; gap: 1px;
                border: 1px solid var(--border, #DFE2EB); border-radius: 10px; overflow: hidden;
            }
            #<?= Toolkit::e($uid) ?> .senstool-facts li { display: flex; justify-content: space-between; gap: 10px; padding: 8px 11px; background: var(--surface-2, #F8F9FB); font-size: 13px; }
            #<?= Toolkit::e($uid) ?> .senstool-facts span:first-child { color: var(--ink-3, #4B5259); }
            #<?= Toolkit::e($uid) ?> .senstool-facts span:last-child { font-weight: 600; font-variant-numeric: tabular-nums; }
            #<?= Toolkit::e($uid) ?> .senstool-table { width: 100%; border-collapse: collapse; margin-top: 12px; font-size: 12.8px; }
            #<?= Toolkit::e($uid) ?> .senstool-table th,
            #<?= Toolkit::e($uid) ?> .senstool-table td { text-align: left; padding: 7px 9px; border-bottom: 1px solid var(--border, #DFE2EB); }
            #<?= Toolkit::e($uid) ?> .senstool-table th { color: var(--ink-4, #66717F); font-weight: 600; font-size: 11.6px; text-transform: uppercase; letter-spacing: .04em; }
            #<?= Toolkit::e($uid) ?> .senstool-table td:last-child { text-align: right; font-variant-numeric: tabular-nums; font-weight: 600; }
            #<?= Toolkit::e($uid) ?> .senstool-note { margin: 10px 0 0; font-size: 12.4px; color: var(--ink-4, #66717F); line-height: 1.5; }
        </style>

        <form class="senstool-form" method="get" action="<?= Toolkit::e((string) ($ctx['calc']['path'] ?? '/')) ?>" data-sens-form>
            <div class="senstool-pair">
                <div>
                    <label for="<?= Toolkit::e($uid) ?>-dpi"><?= Toolkit::e($t('Mouse DPI', 'Mouse DPI')) ?></label>
                    <input type="text" inputmode="numeric" id="<?= Toolkit::e($uid) ?>-dpi" name="t_dpi" value="<?= Toolkit::e($fmt($dpi, 0)) ?>" data-sens="dpi">
                </div>
                <div>
                    <label for="<?= Toolkit::e($uid) ?>-sens"><?= Toolkit::e($t('In-game sensitivity', 'In-game sensitivity')) ?></label>
                    <input type="text" inputmode="decimal" id="<?= Toolkit::e($uid) ?>-sens" name="t_sens" value="<?= Toolkit::e($fmt($sens, 4)) ?>" data-sens="sens">
                </div>
            </div>
            <div class="senstool-pair">
                <div>
                    <label for="<?= Toolkit::e($uid) ?>-from"><?= Toolkit::e($t('You play', 'You play')) ?></label>
                    <select id="<?= Toolkit::e($uid) ?>-from" name="t_from" data-sens="from">
                        <?php foreach ($games as $key => $game): ?>
                            <option value="<?= Toolkit::e($key) ?>" data-yaw="<?= Toolkit::e((string) $game['yaw']) ?>"<?= $from === $key ? ' selected' : '' ?>><?= Toolkit::e($game['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="<?= Toolkit::e($uid) ?>-to"><?= Toolkit::e($t('You want', 'You want')) ?></label>
                    <select id="<?= Toolkit::e($uid) ?>-to" name="t_to" data-sens="to">
                        <?php foreach ($games as $key => $game): ?>
                            <option value="<?= Toolkit::e($key) ?>" data-yaw="<?= Toolkit::e((string) $game['yaw']) ?>"<?= $to === $key ? ' selected' : '' ?>><?= Toolkit::e($game['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <button type="submit" class="tool-btn"><?= Toolkit::e($t('Convert', 'Convert')) ?></button>
        </form>

        <p class="senstool-answer" role="status" aria-live="polite">
            <?= Toolkit::e($t('Type this into', 'Type this into')) ?> <?= Toolkit::e($games[$to]['name']) ?>
            <strong data-sens="out"><?= Toolkit::e($fmt($sensTo, 4)) ?></strong>
            <small data-sens="out-note"><?= Toolkit::e(strtr($t('{sens} in {game} is {cm} cm per 360°.', '{sens} in {game} is {cm} cm per 360°.'), ['{sens}' => $fmt($sens, 3), '{game}' => $games[$from]['name'], '{cm}' => $fmt($cm360, 2)])) ?></small>
        </p>

        <ul class="senstool-facts">
            <li><span><?= Toolkit::e($t('cm per 360°', 'cm per 360°')) ?></span><span data-sens="cm"><?= Toolkit::e($fmt($cm360, 2)) ?> cm</span></li>
            <li><span><?= Toolkit::e($t('eDPI', 'eDPI')) ?></span><span data-sens="edpi"><?= Toolkit::e($fmt($edpi, 0)) ?></span></li>
            <li><span><?= Toolkit::e($t('Counts per turn', 'Counts per turn')) ?></span><span data-sens="counts"><?= Toolkit::e($fmt($counts, 0)) ?></span></li>
            <li><span><?= Toolkit::e($t('Mouse pad needed', 'Mouse pad needed')) ?></span><span data-sens="pad"><?= Toolkit::e($fmt($cm360, 1)) ?> cm</span></li>
        </ul>

        <table class="senstool-table">
            <thead>
                <tr><th><?= Toolkit::e($t('Game', 'Game')) ?></th><th style="text-align:right"><?= Toolkit::e($t('Sensitivity', 'Sensitivity')) ?></th></tr>
            </thead>
            <tbody data-sens="table">
                <?php foreach ($games as $key => $game): ?>
                    <tr>
                        <td><?= Toolkit::e($game['name']) ?></td>
                        <td><?= Toolkit::e($fmt(360 / ($cm360 * $dpi / 2.54) / $game['yaw'], 4)) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <p class="senstool-note">
            <?= Toolkit::e($t('Yaw values used: CS2, Apex and Rust 0.022° per count · Valorant 0.07° · Overwatch 2 0.0066° · Rainbow Six Siege 0.00573°. Every game scales the same mouse count differently, which is exactly why sensitivity numbers do not travel between them and cm/360 does.', 'Yaw values used: CS2, Apex and Rust 0.022° per count · Valorant 0.07° · Overwatch 2 0.0066° · Rainbow Six Siege 0.00573°. Every game scales the same mouse count differently, which is exactly why sensitivity numbers do not travel between them and cm/360 does.')) ?>
        </p>

        <script>
        (function () {
            var L = {
                note: <?= json_encode($t('{sens} in {game} is {cm} cm per 360°.', '{sens} in {game} is {cm} cm per 360°.'), JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>
            };
            var root = document.getElementById(<?= json_encode($uid) ?>);
            if (!root) return;
            var dpiIn = root.querySelector('[data-sens="dpi"]');
            var sensIn = root.querySelector('[data-sens="sens"]');
            var fromSel = root.querySelector('[data-sens="from"]');
            var toSel = root.querySelector('[data-sens="to"]');
            var out = root.querySelector('[data-sens="out"]');
            var outNote = root.querySelector('[data-sens="out-note"]');
            var cmOut = root.querySelector('[data-sens="cm"]');
            var edpiOut = root.querySelector('[data-sens="edpi"]');
            var countsOut = root.querySelector('[data-sens="counts"]');
            var padOut = root.querySelector('[data-sens="pad"]');
            var table = root.querySelector('[data-sens="table"]');

            function num(value) {
                var cleaned = String(value).replace(/\s/g, '').replace(',', '.');
                var n = Number(cleaned);
                return isFinite(n) && n > 0 ? n : null;
            }
            function yawOf(select) {
                var option = select.options[select.selectedIndex];
                return Number(option.getAttribute('data-yaw'));
            }
            function fmt(value, dp) {
                if (!isFinite(value)) return '—';
                return String(Number(value.toFixed(dp)));
            }

            function run() {
                var dpi = num(dpiIn.value), sens = num(sensIn.value);
                if (dpi === null || sens === null) {
                    out.textContent = '—';
                    outNote.textContent = 'Type a DPI and a sensitivity above zero.';
                    return;
                }
                var yawFrom = yawOf(fromSel), yawTo = yawOf(toSel);
                var counts = 360 / (sens * yawFrom);
                var cm360 = counts * 2.54 / dpi;
                var sensTo = 360 / (cm360 * dpi / 2.54) / yawTo;

                out.textContent = fmt(sensTo, 4);
                outNote.textContent = L.note
                    .replace('{sens}', fmt(sens, 3))
                    .replace('{game}', fromSel.options[fromSel.selectedIndex].text)
                    .replace('{cm}', fmt(cm360, 2));
                cmOut.textContent = fmt(cm360, 2) + ' cm';
                edpiOut.textContent = fmt(dpi * sens, 0);
                countsOut.textContent = fmt(counts, 0);
                padOut.textContent = fmt(cm360, 1) + ' cm';

                var rows = table.querySelectorAll('tr');
                for (var i = 0; i < rows.length; i++) {
                    var option = root.querySelector('[data-sens="from"]').options[i];
                    var yaw = Number(option.getAttribute('data-yaw'));
                    rows[i].lastElementChild.textContent = fmt(360 / (cm360 * dpi / 2.54) / yaw, 4);
                }
            }

            [dpiIn, sensIn].forEach(function (el) { el.addEventListener('input', run); });
            [fromSel, toSel].forEach(function (el) { el.addEventListener('change', run); });
            root.querySelector('[data-sens-form]').addEventListener('submit', function (event) {
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
