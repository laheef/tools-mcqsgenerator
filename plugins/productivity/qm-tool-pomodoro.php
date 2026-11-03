<?php
/**
 * Tool Name: Pomodoro Timer
 * Shortcode: tool_pomodoro
 * Category: productivity
 * Version: 1.0.0
 * Description: A focus-and-break timer that shows how many rounds fit in the time you have.
 * Language: en
 */

/*
 * A timer is the simplest thing on this site and the one most likely to be
 * written badly: a setInterval that drifts, a tab that throttles it to once a
 * second when it is in the background, and a "25:00" that is really 24:37.
 *
 * So the countdown is measured from a timestamp, not from the number of ticks:
 * every repaint asks how many milliseconds are left against the end time that was
 * fixed when the round started, which stays correct when the browser throttles
 * the interval or the machine sleeps.
 *
 * The arithmetic the server does is the part people actually plan with: how many
 * rounds and breaks fit into the time you have before your next meeting.
 */

declare(strict_types=1);

if (!defined('ONIM_TOOLKIT')) {
    http_response_code(403);
    exit('This file is a tool definition, not a page.');
}

use Onim\Toolkit;

Toolkit::addShortcode('tool_pomodoro', static function (array $atts, ?string $inner, array $ctx): string {
    $uid = (string) $ctx['uid'];
    $t   = static fn (string $key, string $default): string => Toolkit::t($key, $default);

    $focus = (int) ($_GET['t_focus'] ?? 25);
    $break = (int) ($_GET['t_break'] ?? 5);
    $block = (int) ($_GET['t_block'] ?? 120);
    if ($focus < 5 || $focus > 90) {
        $focus = 25;
    }
    if ($break < 1 || $break > 45) {
        $break = 5;
    }
    if ($block < 15 || $block > 600) {
        $block = 120;
    }

    /* How many whole rounds fit: n * focus + (n - 1) * break <= block —
       the break only counts if there is another round on the other side of
       it, which is what makes the spare minutes honest. */
    $rounds = 0;
    $used   = 0;
    while ($used + $focus <= $block) {
        $used += $focus;
        $rounds++;
        if ($used + $break + $focus <= $block) {
            $used += $break;
        }
    }
    $leftover = $block - $used;

    /* One sentence per plural form. Gluing "round" onto a count is how a
       translated page ends up saying "1 Runde" on some pages and "1 Runden"
       on others. */
    $planTpl = $rounds === 1
        ? $t('{focus} min focus + {break} min break in {block} minutes = 1 round, {spare} minutes spare.', '{focus} min focus + {break} min break in {block} minutes = 1 round, {spare} minutes spare.')
        : $t('{focus} min focus + {break} min break in {block} minutes = {rounds} rounds, {spare} minutes spare.', '{focus} min focus + {break} min break in {block} minutes = {rounds} rounds, {spare} minutes spare.');
    $planText = strtr($planTpl, [
        '{focus}'  => (string) $focus,
        '{break}'  => (string) $break,
        '{block}'  => (string) $block,
        '{rounds}' => (string) $rounds,
        '{spare}'  => (string) $leftover,
    ]);

    ob_start();
    ?>
    <div class="pomtool" id="<?= Toolkit::e($uid) ?>">
        <style>
            #<?= Toolkit::e($uid) ?> .pomtool-clock {
                display: grid; place-items: center; gap: 4px; padding: 18px 14px 16px;
                border-radius: 14px; background: linear-gradient(160deg, #EEF2FF 0%, #F7F9FF 100%);
                border: 1px solid #DDE4FB;
            }
            #<?= Toolkit::e($uid) ?> .pomtool-time {
                font-size: 46px; line-height: 1; letter-spacing: -.02em; font-weight: 700;
                color: var(--brand-ink, #294CC2); font-variant-numeric: tabular-nums;
            }
            #<?= Toolkit::e($uid) ?> .pomtool-phase {
                font-size: 12px; font-weight: 700; letter-spacing: .1em; text-transform: uppercase; color: var(--ink-4, #66717F);
            }
            #<?= Toolkit::e($uid) ?> .pomtool-progress { width: 100%; height: 6px; border-radius: 99px; background: #DDE4FB; overflow: hidden; margin-top: 6px; }
            #<?= Toolkit::e($uid) ?> .pomtool-progress i { display: block; height: 100%; width: 100%; background: var(--brand, #3B68FC); transition: width .3s linear; }
            #<?= Toolkit::e($uid) ?> .pomtool-buttons { display: grid; grid-template-columns: 1fr 1fr; gap: 8px; margin-top: 12px; }
            #<?= Toolkit::e($uid) ?> .pomtool-row { display: grid; grid-template-columns: repeat(3, minmax(0,1fr)); gap: 8px; margin-top: 12px; }
            #<?= Toolkit::e($uid) ?> .pomtool-row label { font-size: 12px; }
            #<?= Toolkit::e($uid) ?> .pomtool-row input { padding: 8px 9px; font-size: 14px; }
            #<?= Toolkit::e($uid) ?> .pomtool-answer {
                margin: 14px 0 0; padding: 12px 14px; border-radius: 10px;
                background: var(--brand-soft, #EBEFFF); border: 1px solid #D7DEFF; font-size: 13px; color: var(--ink-2, #212427);
            }
            #<?= Toolkit::e($uid) ?> .pomtool-answer strong {
                display: block; font-size: 24px; line-height: 1.15; color: var(--brand-ink, #294CC2); letter-spacing: -.01em;
            }
            #<?= Toolkit::e($uid) ?> .pomtool-facts {
                margin: 12px 0 0; padding: 0; list-style: none; display: grid; gap: 1px;
                border: 1px solid var(--border, #DFE2EB); border-radius: 10px; overflow: hidden;
            }
            #<?= Toolkit::e($uid) ?> .pomtool-facts li { display: flex; justify-content: space-between; gap: 10px; padding: 8px 11px; background: var(--surface-2, #F8F9FB); font-size: 13px; }
            #<?= Toolkit::e($uid) ?> .pomtool-facts span:first-child { color: var(--ink-3, #4B5259); }
            #<?= Toolkit::e($uid) ?> .pomtool-facts span:last-child { font-weight: 600; font-variant-numeric: tabular-nums; }
            #<?= Toolkit::e($uid) ?> .pomtool-done { margin: 10px 0 0; font-size: 13px; color: var(--ink-3, #4B5259); }
            #<?= Toolkit::e($uid) ?> .pomtool-note { margin: 10px 0 0; font-size: 12.4px; color: var(--ink-4, #66717F); line-height: 1.5; }
        </style>

        <div class="pomtool-clock">
            <span class="pomtool-phase" data-pom="phase"><?= Toolkit::e($t('Focus', 'Focus')) ?></span>
            <span class="pomtool-time" data-pom="time" role="timer" aria-live="off"><?= Toolkit::e(sprintf('%02d:00', $focus)) ?></span>
            <div class="pomtool-progress"><i data-pom="progress"></i></div>
        </div>

        <div class="pomtool-buttons">
            <button type="button" class="tool-btn" data-pom="start"><?= Toolkit::e($t('Start', 'Start')) ?></button>
            <button type="button" class="tool-btn tool-btn--ghost" data-pom="reset"><?= Toolkit::e($t('Reset', 'Reset')) ?></button>
        </div>

        <div class="pomtool-row">
            <div>
                <label for="<?= Toolkit::e($uid) ?>-focus"><?= Toolkit::e($t('Focus', 'Focus')) ?></label>
                <input type="text" inputmode="numeric" id="<?= Toolkit::e($uid) ?>-focus" value="<?= Toolkit::e((string) $focus) ?>" data-pom="focus">
            </div>
            <div>
                <label for="<?= Toolkit::e($uid) ?>-break"><?= Toolkit::e($t('Break', 'Break')) ?></label>
                <input type="text" inputmode="numeric" id="<?= Toolkit::e($uid) ?>-break" value="<?= Toolkit::e((string) $break) ?>" data-pom="break">
            </div>
            <div>
                <label for="<?= Toolkit::e($uid) ?>-block"><?= Toolkit::e($t('Time left', 'Time left')) ?></label>
                <input type="text" inputmode="numeric" id="<?= Toolkit::e($uid) ?>-block" value="<?= Toolkit::e((string) $block) ?>" data-pom="block">
            </div>
        </div>

        <p class="pomtool-answer" role="status" aria-live="polite">
            <?= Toolkit::e($t('Rounds that fit', 'Rounds that fit')) ?>
            <strong data-pom="rounds"><?= Toolkit::e((string) $rounds) ?></strong>
            <span data-pom="plan"><?= Toolkit::e($planText) ?></span>
        </p>

        <ul class="pomtool-facts">
            <li><span><?= Toolkit::e($t('Focus time', 'Focus time')) ?></span><span data-pom="focus-total"><?= Toolkit::e((string) ($rounds * $focus)) ?> min</span></li>
            <li><span><?= Toolkit::e($t('Break time', 'Break time')) ?></span><span data-pom="break-total"><?= Toolkit::e((string) (max(0, $rounds - 1) * $break)) ?> min</span></li>
            <li><span><?= Toolkit::e($t('Best round length here', 'Best round length here')) ?></span><span data-pom="best"><?= Toolkit::e((string) $focus) ?> min</span></li>
            <li><span><?= Toolkit::e($t('Completed this visit', 'Completed this visit')) ?></span><span data-pom="done">0</span></li>
        </ul>

        <p class="pomtool-done" data-pom="message"><?= Toolkit::e($t('Press start. The tab can go in the background — the timer counts real seconds, not ticks.', 'Press start. The tab can go in the background — the timer counts real seconds, not ticks.')) ?></p>

        <p class="pomtool-note">
            <?= Toolkit::e($t('A 25-minute round is not magic — it is long enough to get into a task and short enough that starting one is not intimidating. The break is the part people skip, and it is the part that makes the next round possible.', 'A 25-minute round is not magic — it is long enough to get into a task and short enough that starting one is not intimidating. The break is the part people skip, and it is the part that makes the next round possible.')) ?>
        </p>

        <script>
        (function () {
            var L = {
                one:  <?= json_encode($t('{focus} min focus + {break} min break in {block} minutes = 1 round, {spare} minutes spare.', '{focus} min focus + {break} min break in {block} minutes = 1 round, {spare} minutes spare.'), JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>,
                many: <?= json_encode($t('{focus} min focus + {break} min break in {block} minutes = {rounds} rounds, {spare} minutes spare.', '{focus} min focus + {break} min break in {block} minutes = {rounds} rounds, {spare} minutes spare.'), JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>,
                start: <?= json_encode($t('Start', 'Start'), JSON_UNESCAPED_UNICODE) ?>,
                pause: <?= json_encode($t('Pause', 'Pause'), JSON_UNESCAPED_UNICODE) ?>
            };
            var root = document.getElementById(<?= json_encode($uid) ?>);
            if (!root) return;
            var timeOut = root.querySelector('[data-pom="time"]');
            var phaseOut = root.querySelector('[data-pom="phase"]');
            var progress = root.querySelector('[data-pom="progress"]');
            var startBtn = root.querySelector('[data-pom="start"]');
            var resetBtn = root.querySelector('[data-pom="reset"]');
            var focusIn = root.querySelector('[data-pom="focus"]');
            var breakIn = root.querySelector('[data-pom="break"]');
            var blockIn = root.querySelector('[data-pom="block"]');
            var roundsOut = root.querySelector('[data-pom="rounds"]');
            var planOut = root.querySelector('[data-pom="plan"]');
            var focusTotal = root.querySelector('[data-pom="focus-total"]');
            var breakTotal = root.querySelector('[data-pom="break-total"]');
            var bestOut = root.querySelector('[data-pom="best"]');
            var doneOut = root.querySelector('[data-pom="done"]');
            var message = root.querySelector('[data-pom="message"]');

            var phase = 'focus';
            var running = false;
            var endsAt = 0;
            var remaining = 0;
            var done = 0;
            var ticker = null;

            function minutes(value, fallback, min, max) {
                var n = parseInt(String(value).replace(/[^\d]/g, ''), 10);
                if (!isFinite(n) || n < min || n > max) return fallback;
                return n;
            }
            function focusMinutes() { return minutes(focusIn.value, 25, 5, 90); }
            function breakMinutes() { return minutes(breakIn.value, 5, 1, 45); }
            function blockMinutes() { return minutes(blockIn.value, 120, 15, 600); }

            function plan() {
                var focus = focusMinutes(), rest = breakMinutes(), block = blockMinutes();
                var rounds = 0, used = 0;
                while (used + focus <= block) {
                    used += focus;
                    rounds++;
                    /* a break only counts when another round follows it */
                    if (used + rest + focus <= block) used += rest;
                }
                roundsOut.textContent = String(rounds);
                planOut.textContent = (rounds === 1 ? L.one : L.many)
                    .replace('{focus}', focus).replace('{break}', rest).replace('{block}', block)
                    .replace('{rounds}', rounds).replace('{spare}', block - used);
                focusTotal.textContent = (rounds * focus) + ' min';
                breakTotal.textContent = (Math.max(0, rounds - 1) * rest) + ' min';
                bestOut.textContent = focus + ' min';
            }

            function paint() {
                var total = (phase === 'focus' ? focusMinutes() : breakMinutes()) * 60;
                var left = Math.max(0, Math.ceil(remaining / 1000));
                var mm = Math.floor(left / 60), ss = left % 60;
                timeOut.textContent = (mm < 10 ? '0' : '') + mm + ':' + (ss < 10 ? '0' : '') + ss;
                phaseOut.textContent = phase === 'focus' ? 'Focus' : 'Break';
                progress.style.width = Math.max(0, Math.min(100, (1 - remaining / (total * 1000)) * 100)) + '%';
            }

            function stop() {
                running = false;
                if (ticker) clearInterval(ticker);
                ticker = null;
                startBtn.textContent = L.start;
            }

            function finish() {
                if (phase === 'focus') {
                    done++;
                    doneOut.textContent = String(done);
                    phase = 'break';
                    message.textContent = 'Round done — take ' + breakMinutes() + ' minutes.';
                } else {
                    phase = 'focus';
                    message.textContent = 'Break over — back to it.';
                }
                remaining = (phase === 'focus' ? focusMinutes() : breakMinutes()) * 60 * 1000;
                endsAt = Date.now() + remaining;
                paint();
                beep();
            }

            function tick() {
                remaining = endsAt - Date.now();
                if (remaining <= 0) {
                    finish();
                    if (!running) return;
                }
                paint();
            }

            function start() {
                if (running) {
                    stop();
                    return;
                }
                if (!remaining || remaining <= 0) {
                    remaining = (phase === 'focus' ? focusMinutes() : breakMinutes()) * 60 * 1000;
                }
                endsAt = Date.now() + remaining;
                running = true;
                startBtn.textContent = L.pause;
                message.textContent = phase === 'focus' ? 'Focusing.' : 'On a break.';
                ticker = setInterval(tick, 250);
                paint();
            }

            function beep() {
                var AC = window.AudioContext || window.webkitAudioContext;
                if (!AC) return;
                var ac = new AC();
                var osc = ac.createOscillator();
                var gain = ac.createGain();
                osc.type = 'sine';
                osc.frequency.value = phase === 'focus' ? 880 : 520;
                gain.gain.setValueAtTime(0.001, ac.currentTime);
                gain.gain.exponentialRampToValueAtTime(0.2, ac.currentTime + 0.02);
                gain.gain.exponentialRampToValueAtTime(0.001, ac.currentTime + 0.6);
                osc.connect(gain).connect(ac.destination);
                osc.start();
                osc.stop(ac.currentTime + 0.65);
                setTimeout(function () { if (ac.close) ac.close(); }, 900);
            }

            startBtn.addEventListener('click', start);
            resetBtn.addEventListener('click', function () {
                stop();
                phase = 'focus';
                remaining = focusMinutes() * 60 * 1000;
                message.textContent = 'Reset. Press start when you are ready.';
                paint();
            });
            [focusIn, breakIn, blockIn].forEach(function (input) {
                input.addEventListener('input', function () {
                    plan();
                    if (!running) {
                        remaining = (phase === 'focus' ? focusMinutes() : breakMinutes()) * 60 * 1000;
                        paint();
                    }
                });
            });

            plan();
            remaining = focusMinutes() * 60 * 1000;
            paint();
        })();
        </script>
    </div>
    <?php
    return (string) ob_get_clean();
});
