<?php
/**
 * Harmonic series of a note.
 *
 * Equal temperament: A4 is 440 Hz and every semitone multiplies the frequency
 * by 2^(1/12). The nth partial of a note is simply n times its fundamental,
 * which is what gives a violin and a flute their different colours.
 */
return [
    'vars' => [
        'fundamental' => ['type' => 'dependent', 'rnd' => ['standard', '2'], 'du' => 'hz'],
        'partial_count' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'highest_partial' => ['type' => 'dependent', 'rnd' => ['standard', '2'], 'du' => 'hz'],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'fundamental', 'vt' => 'dependent',
                       'l' => 'Fundamental frequency (1st harmonic)', 'du' => 'hz']]]],
            ['FR1', [[['t' => 'v', 'n' => 'partial_count', 'vt' => 'dependent',
                       'l' => 'Partials listed']]]],
            ['FR1', [[['t' => 'v', 'n' => 'highest_partial', 'vt' => 'dependent',
                       'l' => 'Frequency of the highest partial', 'du' => 'hz']]]],
        ],
    ]],
    'js' => <<<'JS'
omni.onResult([], function (ctx, v) {
  var note = Number(v.note_name);
  var octave = Number(String(v.octave).trim());
  var count = Number(v.number);
  if (!isFinite(note) || v.note_name === undefined) {
    ctx.addUnmetCondition('Choose the note.');
    return;
  }
  if (!isFinite(octave)) {
    ctx.addUnmetCondition('Choose the octave.');
    return;
  }
  if (!isFinite(count) || count < 1) {
    ctx.addUnmetCondition('Enter how many partials you want (1 or more).');
    return;
  }
  count = Math.min(Math.round(count), 64);
  /* MIDI numbers: C-1 is 0, so C4 (middle C) is 60 and A4 is 69 = 440 Hz. */
  var midi = (octave + 1) * 12 + note;
  var f0 = 440 * Math.pow(2, (midi - 69) / 12);
  ctx.exportValue('fundamental', sround(f0, 2));
  ctx.exportValue('partial_count', count);
  ctx.exportValue('highest_partial', sround(f0 * count, 2));

  var rows = [];
  for (var n = 1; n <= count; n++) {
    var f = f0 * n;
    rows.push([String(n), snum(f, 2) + ' Hz', snum(343 / f * 100, 2) + ' cm']);
  }
  ctx.addHtml(stable(['Partial', 'Frequency', 'Wavelength in air (20 °C)'], rows));
  ctx.addHtml('<p class="calc-unmet">The fundamental of this note is ' + snum(f0, 2)
    + ' Hz. Partial n is n × ' + snum(f0, 2) + ' Hz, so the series runs ' 
    + snum(f0, 2) + ', ' + snum(f0 * 2, 2) + ', ' + snum(f0 * 3, 2) + ' Hz …</p>');
});
JS,
];
