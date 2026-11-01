<?php
/**
 * Music transposition — move notes by an interval, or into another key.
 *
 * The harvested page offered the notes, the two keys, a quality and an interval
 * and then answered nothing: the surviving `getNote()` helper took thirteen
 * arguments including the mode and the direction and nothing ever called it, and
 * the six "transposed note" boxes it should have filled were blank presentation
 * fields.
 *
 * The repair does the transposition itself, spelled the way a musician would:
 *
 *   by interval   each note moves by the chosen number of semitones, up or down
 *   to key        every note moves by the interval between the two keys, and the
 *                 result is spelled with sharps or flats to match the new key
 *
 * The pitch class of every note is reported as a number (0 = C, 11 = B) as well
 * as a name, so the answer is checkable either way.
 */
return [
    'hideTexts' => true,
    'remove' => ['transposed_note1', 'transposed_note2', 'transposed_note3',
                 'transposed_note4', 'transposed_note5', 'transposed_note6'],
    'vars' => [
        'shift' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'pc1' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'pc2' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'pc3' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'pc4' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'pc5' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'pc6' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
    ],
    'groups' => [[
        'uid' => 'supp-transpose-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'shift', 'vt' => 'dependent', 'l' => 'Semitones moved (negative = down)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'pc1', 'vt' => 'dependent', 'l' => 'Note 1 after transposition (0 = C ... 11 = B)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'pc2', 'vt' => 'dependent', 'l' => 'Note 2 after transposition']]]],
            ['FR1', [[['t' => 'v', 'n' => 'pc3', 'vt' => 'dependent', 'l' => 'Note 3 after transposition']]]],
            ['FR1', [[['t' => 'v', 'n' => 'pc4', 'vt' => 'dependent', 'l' => 'Note 4 after transposition']]]],
            ['FR1', [[['t' => 'v', 'n' => 'pc5', 'vt' => 'dependent', 'l' => 'Note 5 after transposition']]]],
            ['FR1', [[['t' => 'v', 'n' => 'pc6', 'vt' => 'dependent', 'l' => 'Note 6 after transposition']]]],
        ],
    ]],
    'js' => <<<'JS'
/*
 * The seventeen options of every note picker, in the order they are listed, with
 * the pitch class each one means. C♯ and D♭ are the same key on a piano but
 * different notes on a page, which is why both are in the list.
 */
var NOTE_PC = [0, 1, 1, 2, 3, 3, 4, 5, 6, 6, 7, 8, 8, 9, 10, 10, 11];
var SHARP = ['C', 'C♯', 'D', 'D♯', 'E', 'F', 'F♯', 'G', 'G♯', 'A', 'A♯', 'B'];
var FLAT  = ['C', 'D♭', 'D', 'E♭', 'E', 'F', 'G♭', 'G', 'A♭', 'A', 'B♭', 'B'];

/*
 * Key signatures by pitch class: positive is sharps, negative is flats. The
 * black keys are written as flats here (D♭ major has five flats, not seven
 * sharps), which is how a musician would write them.
 */
var MAJOR_SIGNATURE = {
  0: 0,     /* C   */
  1: -5,    /* D♭  */
  2: 2,     /* D   */
  3: -3,    /* E♭  */
  4: 4,     /* E   */
  5: -1,    /* F   */
  6: 6,     /* F♯  */
  7: 1,     /* G   */
  8: -4,    /* A♭  */
  9: 3,     /* A   */
  10: -2,   /* B♭  */
  11: 5     /* B   */
};
var MINOR_SIGNATURE = {
  0: -3,    /* C minor    */
  1: 4,     /* C♯ minor   */
  2: -1,    /* D minor    */
  3: -6,    /* E♭ minor   */
  4: 1,     /* E minor    */
  5: -4,    /* F minor    */
  6: 3,     /* F♯ minor   */
  7: -2,    /* G minor    */
  8: -5,    /* A♭ minor   */
  9: 0,     /* A minor    */
  10: -5,   /* B♭ minor   */
  11: 2     /* B minor    */
};

/* the pitch class of the option chosen in a picker */
function pitchOf(name) {
  var sel = document.querySelector('select[data-var="' + name + '"]');
  if (!sel || sel.selectedIndex < 0) { return null; }
  return NOTE_PC[sel.selectedIndex];
}

/* a choice made of radio buttons, by label */
function radioLabel(name) {
  var radios = document.querySelectorAll('input[type="radio"][name="' + name + '"]');
  for (var i = 0; i < radios.length; i++) {
    if (radios[i].checked) {
      var host = radios[i].closest('label') || radios[i].parentNode;
      return (host.innerText || '').trim();
    }
  }
  return '';
}

/* the count in a picker whose options read 1, 2, 3, ... , however it is drawn */
function count(name, max) {
  var position = null;
  var sel = document.querySelector('select[data-var="' + name + '"]');
  if (sel && sel.selectedIndex >= 0) {
    position = sel.selectedIndex;
    var n = Number((sel.options[sel.selectedIndex].text || '').replace(/\D+/g, ''));
    if (isFinite(n) && n >= 1) { return Math.min(n, max); }
  }
  var radios = document.querySelectorAll('input[type="radio"][name="' + name + '"]');
  for (var i = 0; i < radios.length; i++) {
    if (radios[i].checked) {
      var host = radios[i].closest('label') || radios[i].parentNode;
      var m = (host.innerText || '').match(/(\d+)/);
      if (m) { return Math.min(Number(m[1]), max); }
      position = i;
    }
  }
  return position === null ? 1 : Math.min(position + 1, max);
}

omni.onResult(['transposition_mode', 'interval', 'up_down', 'key1', 'key2', 'key_quality',
               'numb_of_notes'], function (ctx, v) {
  var toKey = /to key/i.test(radioLabel('transposition_mode'));
  var up = !/down/i.test(radioLabel('up_down'));

  var shift;
  var modeText;
  if (toKey) {
    var from = pitchOf('key1');
    var to = pitchOf('key2');
    if (from === null || to === null) {
      ctx.addUnmetCondition('Choose both keys: the key you are in, and the key you want.');
      return;
    }
    /* the interval between the two keys, in the direction the visitor chose */
    shift = up ? ((to - from) % 12 + 12) % 12 : -(((from - to) % 12 + 12) % 12);
    var quality = /minor/i.test(radioLabel('key_quality')) ? 'minor' : 'major';
    modeText = 'into ' + SHARP[to] + ' ' + quality;
  } else {
    var sel = document.querySelector('select[data-var="interval"]');
    if (!sel || sel.selectedIndex < 0) {
      ctx.addUnmetCondition('Choose the interval to transpose by.');
      return;
    }
    shift = sel.selectedIndex;                      /* the options run 0 to 12 in order */
    if (!up) { shift = -shift; }
    modeText = Math.abs(shift) + ' semitone' + (Math.abs(shift) === 1 ? '' : 's') + (shift < 0 ? ' down' : ' up');
  }

  /* which spelling the answer should use: the one that keeps the key tidy */
  var keyPc = toKey ? pitchOf('key2') : pitchOf('key1');
  var signature = toKey
    ? (/minor/i.test(radioLabel('key_quality')) ? MINOR_SIGNATURE : MAJOR_SIGNATURE)[keyPc]
    : null;
  var useFlats = toKey
    ? (signature !== null && signature < 0)
    : /♭/.test(chosenLabel('note1'));

  var names = useFlats ? FLAT : SHARP;

  var howMany = count('numb_of_notes', 6);
  var results = [];
  var exported = ['pc1', 'pc2', 'pc3', 'pc4', 'pc5', 'pc6'];

  for (var i = 1; i <= 6; i++) {
    var pc = pitchOf('note' + i);
    if (i > howMany || pc === null) {
      /* blank the note that is not in use, so a second press cannot show an old one */
      results.push(null);
      if (i <= 6) { ctx.exportValue(exported[i - 1], ''); }
      continue;
    }
    var moved = ((pc + shift) % 12 + 12) % 12;
    results.push({ from: pc, to: moved, name: names[moved] });
    ctx.exportValue(exported[i - 1], moved);
  }
  ctx.exportValue('shift', shift);

  var used = results.filter(function (r) { return r !== null; });
  if (used.length === 0) {
    ctx.addUnmetCondition('Choose at least one note to transpose.');
    return;
  }

  var pairs = used.map(function (r, idx) {
    return [String(idx + 1), names[r.from], r.name, String(r.to)];
  });

  ctx.addHtml('<p><strong>' + used.map(function (r) { return names[r.from] + ' &rarr; ' + r.name; }).join(', ')
    + '</strong> — every note moved ' + modeText + '.</p>');
  ctx.addHtml(stable(['#', 'Original', 'Transposed', 'Pitch class'], pairs));

  if (toKey && signature !== null) {
    var sigText = signature === 0
      ? 'no sharps or flats'
      : Math.abs(signature) + (Math.abs(signature) === 1 ? ' ' + (signature > 0 ? 'sharp' : 'flat')
        : ' ' + (signature > 0 ? 'sharps' : 'flats'));
    ctx.addHtml('<p>The key you are moving into has ' + sigText + ', which is why the transposed notes '
      + 'are written with ' + (useFlats ? 'flats' : 'sharps') + '.</p>');

    /* the scale of the new key, so the answer can be checked against it */
    var majorSteps = [0, 2, 4, 5, 7, 9, 11];
    var minorSteps = [0, 2, 3, 5, 7, 8, 10];
    var steps = /minor/i.test(radioLabel('key_quality')) ? minorSteps : majorSteps;
    var scale = steps.map(function (s) { return names[(keyPc + s) % 12]; });
    ctx.addHtml('<p>The scale of the new key: ' + scale.join(' &ndash; ') + '.</p>');
  }

  ctx.addHtml('<p class="calc-unmet">Transposition is done in semitones on a twelve-note circle, which '
    + 'is why the pitch class of every note is printed above: two notes are the same pitch class when '
    + 'they differ by a whole number of octaves. The spelling follows the key — F♯ major is written with '
    + 'six sharps and G♭ major with six flats, and the same key on a piano is a different page of music. '
    + 'When the interval is not a multiple of twelve the notes change octave; this page moves only the '
    + 'letter and the accidental, so a melody played along with the transposed part needs the octave '
    + 'adjusted by hand.</p>');
});

/* the text of the chosen option in a drop-down */
function chosenLabel(name) {
  var sel = document.querySelector('select[data-var="' + name + '"]');
  return sel && sel.selectedIndex >= 0 ? (sel.options[sel.selectedIndex].text || '') : '';
}
JS,
];
