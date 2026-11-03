<?php
/**
 * Tool Name: Tone & Frequency Generator
 * Shortcode: tool_tone_generator
 * Category: audio
 * Version: 1.0.0
 * Description: Play a sine, square, triangle or sawtooth tone at any frequency, and download it as a WAV.
 * Language: en
 */

/*
 * The first tool in the Audio section, and the one that had to be a program
 * rather than a formula: it makes a sound. Everything happens in the browser —
 * the oscillator is a WebAudio node and the WAV file is assembled here from the
 * same samples — so nothing is uploaded and nothing is stored.
 *
 * The server still answers, because a page that only works with the script on
 * is a page a crawler reads as empty: the frequency typed into the box is
 * resolved to the nearest piano note and the offset in cents is printed with
 * it. That is also the one piece of arithmetic a musician actually wants next
 * to a frequency box.
 */

declare(strict_types=1);

if (!defined('ONIM_TOOLKIT')) {
    http_response_code(403);
    exit('This file is a tool definition, not a page.');
}

use Onim\Toolkit;

Toolkit::addShortcode('tool_tone_generator', static function (array $atts, ?string $inner, array $ctx): string {
    $uid = (string) $ctx['uid'];
    $t   = static fn (string $key, string $default): string => Toolkit::t($key, $default);

    $hzRaw = isset($_GET['t_hz']) ? (string) $_GET['t_hz'] : '440';
    $hzRaw = trim(str_replace(',', '.', $hzRaw));
    $hz    = is_numeric($hzRaw) ? (float) $hzRaw : 440.0;
    if ($hz <= 0 || $hz > 20000) {
        $hz = 440.0;
    }

    $wave = isset($_GET['t_wave']) ? (string) $_GET['t_wave'] : 'sine';
    if (!in_array($wave, ['sine', 'square', 'triangle', 'sawtooth'], true)) {
        $wave = 'sine';
    }

    /* The names are looked up here rather than at the point of printing: a key
       written as a variable is invisible to the test that checks every tool
       string has a translation, and that is how four untranslated labels
       survived a green test for a whole round. */
    $waves = [
        'sine'     => $t('Sine', 'Sine'),
        'square'   => $t('Square', 'Square'),
        'triangle' => $t('Triangle', 'Triangle'),
        'sawtooth' => $t('Sawtooth', 'Sawtooth'),
    ];

    $action = (string) ($ctx['calc']['path'] ?? '/');

    /*
     * 440 Hz = A4. Everything else is measured from A4 in semitones:
     *     n = 12 * log2(f / 440)
     * The nearest integer is the note, the remainder is the tuning error in
     * cents, which is what a tuner shows.
     */
    $names = ['C', 'C#', 'D', 'D#', 'E', 'F', 'F#', 'G', 'G#', 'A', 'A#', 'B'];
    $semitones = 12 * log($hz / 440.0, 2);
    $nearest   = (int) round($semitones);
    $cents     = (int) round(($semitones - $nearest) * 100);
    /* A4 is MIDI 69, so the note index is 69 + semitones. */
    $midi   = 69 + $nearest;
    $octave = (int) floor($midi / 12) - 1;
    $name   = $names[(($midi % 12) + 12) % 12] . $octave;

    $hzFmt = rtrim(rtrim(number_format($hz, 2, '.', ' '), '0'), '.');
    /* The note's own frequency, so the sentence can say how far off it is
       relative to a real pitch rather than to an abstract name. */
    $noteHz    = 440 * pow(2, $nearest / 12);
    $noteHzFmt = rtrim(rtrim(number_format($noteHz, 2, '.', ''), '0'), '.');
    /* Three whole sentences rather than stitched fragments: German puts the
       note name in a different place, and a fragment-based build cannot move
       it. Each sentence takes the numbers as placeholders. */
    $centsTpl = $cents === 0
        ? $t('{hz} Hz is exactly on {name} — {name} sits at {noteHz} Hz.', '{hz} Hz is exactly on {name} — {name} sits at {noteHz} Hz.')
        : ($cents > 0
            ? $t('{hz} Hz is {cents} cents above {name} — {name} sits at {noteHz} Hz.', '{hz} Hz is {cents} cents above {name} — {name} sits at {noteHz} Hz.')
            : $t('{hz} Hz is {cents} cents below {name} — {name} sits at {noteHz} Hz.', '{hz} Hz is {cents} cents below {name} — {name} sits at {noteHz} Hz.'));
    $centsText = strtr($centsTpl, [
        '{hz}'     => $hzFmt,
        '{cents}'  => (string) abs($cents),
        '{name}'   => $name,
        '{noteHz}' => $noteHzFmt,
    ]);

    ob_start();
    ?>
    <div class="tonetool" id="<?= Toolkit::e($uid) ?>">
        <style>
            #<?= Toolkit::e($uid) ?> .tonetool-form { display: grid; gap: 12px; }
            #<?= Toolkit::e($uid) ?> .tonetool-row { display: grid; grid-template-columns: minmax(0,1fr) minmax(0,1fr); gap: 10px; }
            #<?= Toolkit::e($uid) ?> .tonetool-answer {
                margin: 14px 0 0; padding: 12px 14px; border-radius: 10px;
                background: var(--brand-soft, #EBEFFF); border: 1px solid #D7DEFF;
                font-size: 14px; line-height: 1.5; color: var(--ink-2, #212427);
            }
            #<?= Toolkit::e($uid) ?> .tonetool-answer strong {
                display: block; font-size: 22px; line-height: 1.2; letter-spacing: -.01em;
                color: var(--brand-ink, #294CC2); font-variant-numeric: tabular-nums;
            }
            #<?= Toolkit::e($uid) ?> .tonetool-answer small { display: block; color: var(--ink-3, #4B5259); font-size: 12.8px; margin-top: 4px; }
            #<?= Toolkit::e($uid) ?> .tonetool-actions { display: grid; grid-template-columns: 1fr 1fr; gap: 8px; margin-top: 12px; }
            #<?= Toolkit::e($uid) ?> .tonetool-status { margin: 10px 0 0; font-size: 12.6px; color: var(--ink-4, #66717F); }
            #<?= Toolkit::e($uid) ?> .tonetool-wave { width: 100%; height: 74px; display: block; margin-top: 12px; border-radius: 8px; background: var(--surface-2, #F8F9FB); }
            #<?= Toolkit::e($uid) ?> .tonetool-scale { display: flex; flex-wrap: wrap; gap: 6px; margin-top: 10px; }
            #<?= Toolkit::e($uid) ?> .tonetool-scale button {
                font: inherit; font-size: 12.4px; padding: 5px 9px; border-radius: 99px; cursor: pointer;
                background: var(--surface-2, #F8F9FB); border: 1px solid var(--border, #DFE2EB); color: var(--ink-3, #4B5259);
            }
            #<?= Toolkit::e($uid) ?> .tonetool-scale button:hover { border-color: var(--brand, #3B68FC); color: var(--brand-ink, #294CC2); }
        </style>

        <form class="tonetool-form" method="get" action="<?= Toolkit::e($action) ?>" data-tone-form>
            <div class="tonetool-row">
                <div>
                    <label for="<?= Toolkit::e($uid) ?>-hz"><?= Toolkit::e($t('Frequency', 'Frequency')) ?></label>
                    <input type="text" inputmode="decimal" id="<?= Toolkit::e($uid) ?>-hz" name="t_hz"
                           value="<?= Toolkit::e($hzFmt) ?>" autocomplete="off" data-tone="hz">
                </div>
                <div>
                    <label for="<?= Toolkit::e($uid) ?>-wave"><?= Toolkit::e($t('Waveform', 'Waveform')) ?></label>
                    <select id="<?= Toolkit::e($uid) ?>-wave" name="t_wave" data-tone="wave">
                        <?php foreach ($waves as $value => $label): ?>
                            <option value="<?= Toolkit::e($value) ?>"<?= $wave === $value ? ' selected' : '' ?>><?= Toolkit::e($label) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <button type="submit" class="tool-btn"><?= Toolkit::e($t('Show the note', 'Show the note')) ?></button>
        </form>

        <p class="tonetool-answer" id="<?= Toolkit::e($uid) ?>-answer" role="status" aria-live="polite">
            <?= Toolkit::e(strtr($t('{hz} Hz is', '{hz} Hz is'), ['{hz}' => $hzFmt])) ?>
            <strong data-tone="note"><?= Toolkit::e($name) ?></strong>
            <small data-tone="cents"><?= Toolkit::e($centsText) ?></small>
        </p>

        <canvas class="tonetool-wave" width="600" height="148" data-tone="canvas" aria-hidden="true"></canvas>

        <div class="tonetool-scale">
            <?php foreach ([432, 440, 528, 1000] as $preset): ?>
                <button type="button" data-preset="<?= Toolkit::e((string) $preset) ?>"><?= Toolkit::e((string) $preset) ?> Hz</button>
            <?php endforeach; ?>
        </div>

        <div class="tonetool-actions">
            <button type="button" class="tool-btn" data-tone="play"><?= Toolkit::e($t('Play 2 seconds', 'Play 2 seconds')) ?></button>
            <button type="button" class="tool-btn tool-btn--ghost" data-tone="save"><?= Toolkit::e($t('Download WAV', 'Download WAV')) ?></button>
        </div>
        <p class="tonetool-status" data-tone="status"><?= Toolkit::e($t('Plays in this page. Nothing is uploaded, nothing is recorded.', 'Plays in this page. Nothing is uploaded, nothing is recorded.')) ?></p>

        <script>
        (function () {
            /* The sentences live in PHP once and travel to the script as data,
               so a German page does not switch back to English on a keypress. */
            var L = {
                on:    <?= json_encode($t('{hz} Hz is exactly on {name} — {name} sits at {noteHz} Hz.', '{hz} Hz is exactly on {name} — {name} sits at {noteHz} Hz.'), JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>,
                above: <?= json_encode($t('{hz} Hz is {cents} cents above {name} — {name} sits at {noteHz} Hz.', '{hz} Hz is {cents} cents above {name} — {name} sits at {noteHz} Hz.'), JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>,
                below: <?= json_encode($t('{hz} Hz is {cents} cents below {name} — {name} sits at {noteHz} Hz.', '{hz} Hz is {cents} cents below {name} — {name} sits at {noteHz} Hz.'), JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>,
                range: <?= json_encode($t('Type a frequency between 1 and 20 000 Hz.', 'Type a frequency between 1 and 20 000 Hz.'), JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>
            };
            var root = document.getElementById(<?= json_encode($uid) ?>);
            if (!root) return;
            var hzInput = root.querySelector('[data-tone="hz"]');
            var waveSel = root.querySelector('[data-tone="wave"]');
            var noteOut = root.querySelector('[data-tone="note"]');
            var centsOut = root.querySelector('[data-tone="cents"]');
            var canvas = root.querySelector('[data-tone="canvas"]');
            var status = root.querySelector('[data-tone="status"]');
            var names = ['C','C#','D','D#','E','F','F#','G','G#','A','A#','B'];

            function readHz() {
                var v = String(hzInput.value).replace(/[\s,]/g, '');
                var n = Number(v);
                if (!isFinite(n) || n <= 0) return null;
                return n;
            }

            /* The same arithmetic the server did, so the two never disagree. */
            function describe(hz) {
                var semis = 12 * Math.log(hz / 440) / Math.LN2;
                var near = Math.round(semis);
                var cents = Math.round((semis - near) * 100);
                var midi = 69 + near;
                var name = names[((midi % 12) + 12) % 12] + (Math.floor(midi / 12) - 1);
                return { name: name, cents: cents, hz: 440 * Math.pow(2, near / 12) };
            }

            function fmt(v) {
                return String(Math.round(v * 100) / 100);
            }

            function draw(hz, wave) {
                var ctx = canvas.getContext('2d');
                if (!ctx) return;
                var w = canvas.width, h = canvas.height;
                ctx.clearRect(0, 0, w, h);
                ctx.strokeStyle = '#C9D2F5';
                ctx.lineWidth = 1;
                ctx.beginPath();
                ctx.moveTo(0, h / 2);
                ctx.lineTo(w, h / 2);
                ctx.stroke();
                ctx.strokeStyle = '#3B68FC';
                ctx.lineWidth = 2.2;
                ctx.beginPath();
                var cycles = hz >= 400 ? 4 : (hz >= 120 ? 2 : 1);
                for (var x = 0; x <= w; x++) {
                    var phase = (x / w) * cycles * Math.PI * 2;
                    var y;
                    if (wave === 'square') y = Math.sin(phase) >= 0 ? 1 : -1;
                    else if (wave === 'triangle') y = (2 / Math.PI) * Math.asin(Math.sin(phase));
                    else if (wave === 'sawtooth') y = 2 * ((phase / (Math.PI * 2)) % 1) - 1;
                    else y = Math.sin(phase);
                    var py = h / 2 - y * (h / 2 - 12);
                    if (x === 0) ctx.moveTo(x, py); else ctx.lineTo(x, py);
                }
                ctx.stroke();
            }

            function run() {
                var hz = readHz();
                if (hz === null) {
                    noteOut.textContent = '—';
                    centsOut.textContent = L.range;
                    return;
                }
                var d = describe(hz);
                noteOut.textContent = d.name;
                centsOut.textContent = L.on.replace('{hz}', fmt(hz)).replace('{name}', d.name).replace('{noteHz}', fmt(d.hz)).replace('{name}', d.name);
                draw(hz, waveSel.value);
            }

            function ctxAudio() {
                var AC = window.AudioContext || window.webkitAudioContext;
                return AC ? new AC() : null;
            }

            root.querySelector('[data-tone="play"]').addEventListener('click', function () {
                var hz = readHz();
                if (hz === null) { status.textContent = 'That is not a frequency.'; return; }
                var ac = ctxAudio();
                if (!ac) { status.textContent = 'This browser cannot play audio.'; return; }
                var osc = ac.createOscillator();
                var gain = ac.createGain();
                osc.type = waveSel.value;
                osc.frequency.value = hz;
                gain.gain.setValueAtTime(0.0001, ac.currentTime);
                gain.gain.exponentialRampToValueAtTime(0.22, ac.currentTime + 0.02);
                gain.gain.exponentialRampToValueAtTime(0.0001, ac.currentTime + 2);
                osc.connect(gain).connect(ac.destination);
                osc.start();
                osc.stop(ac.currentTime + 2.05);
                status.textContent = 'Playing ' + fmt(hz) + ' Hz for 2 seconds.';
                setTimeout(function () { if (ac.close) ac.close(); }, 2400);
            });

            /* A 16-bit mono WAV is a 44-byte header and then the samples. */
            function wav(hz, wave, seconds, rate) {
                var total = Math.floor(rate * seconds);
                var buffer = new ArrayBuffer(44 + total * 2);
                var view = new DataView(buffer);
                var write = function (offset, text) {
                    for (var i = 0; i < text.length; i++) view.setUint8(offset + i, text.charCodeAt(i));
                };
                write(0, 'RIFF');
                view.setUint32(4, 36 + total * 2, true);
                write(8, 'WAVE');
                write(12, 'fmt ');
                view.setUint32(16, 16, true);
                view.setUint16(20, 1, true);
                view.setUint16(22, 1, true);
                view.setUint32(24, rate, true);
                view.setUint32(28, rate * 2, true);
                view.setUint16(32, 2, true);
                view.setUint16(34, 16, true);
                write(36, 'data');
                view.setUint32(40, total * 2, true);
                var fade = Math.floor(rate * 0.02);
                for (var i = 0; i < total; i++) {
                    var phase = 2 * Math.PI * hz * (i / rate);
                    var v;
                    if (wave === 'square') v = Math.sin(phase) >= 0 ? 1 : -1;
                    else if (wave === 'triangle') v = (2 / Math.PI) * Math.asin(Math.sin(phase));
                    else if (wave === 'sawtooth') v = 2 * ((hz * i / rate) % 1) - 1;
                    else v = Math.sin(phase);
                    var env = 1;
                    if (i < fade) env = i / fade;
                    else if (i > total - fade) env = (total - i) / fade;
                    view.setInt16(44 + i * 2, Math.max(-1, Math.min(1, v * env * 0.7)) * 32767, true);
                }
                return new Blob([buffer], { type: 'audio/wav' });
            }

            root.querySelector('[data-tone="save"]').addEventListener('click', function () {
                var hz = readHz();
                if (hz === null) { status.textContent = 'That is not a frequency.'; return; }
                var blob = wav(hz, waveSel.value, 2, 44100);
                var a = document.createElement('a');
                a.href = URL.createObjectURL(blob);
                a.download = 'tone-' + Math.round(hz) + 'hz-' + waveSel.value + '.wav';
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
                setTimeout(function () { URL.revokeObjectURL(a.href); }, 4000);
                status.textContent = 'Downloaded a 2-second ' + Math.round(blob.size / 1024) + ' KB WAV.';
            });

            root.querySelectorAll('[data-preset]').forEach(function (button) {
                button.addEventListener('click', function () {
                    hzInput.value = button.getAttribute('data-preset');
                    run();
                });
            });

            hzInput.addEventListener('input', run);
            waveSel.addEventListener('change', run);
            root.querySelector('[data-tone-form]').addEventListener('submit', function (event) {
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
