<?php
/**
 * Chord transposer — the same chord, moved to a new interval or a new key.
 *
 * The harvested page had the dropdowns and twelve blank presentation boxes where
 * the transposed notes should appear; nothing was computed on Calculate. This
 * repair removes those boxes and works the notes out from the chord's own
 * intervals, spelling them with the letters the new key actually uses
 * (a transposed B♭ chord is B♭-D-F, never A♯-D-F).
 */
return [
    'hideTexts' => true,
    'remove' => ['note1', 'note2', 'note3', 'note4',
                 'transposed_name1', 'transposed_name2',
                 'transposed_note0', 'transposed_note02',
                 'transposed_note1', 'transposed_note12',
                 'transposed_note2', 'transposed_note22',
                 'transposed_note3', 'transposed_note32',
                 'transposed_note4', 'transposed_note42'],
    'showIf' => [
        'interval' => 'transpose_method == 0',
        'original_key' => 'transpose_method == 1',
        'new_key' => 'transpose_method == 1',
    ],
    'vars' => [
        'transposed_root' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'semitones_moved' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'chord_tones' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'interval_size' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
    ],
    'groups' => [[
        'uid' => 'supp-chord-transposer-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'transposed_root', 'vt' => 'dependent', 'l' => 'Root of the transposed chord (0 = C ... 11 = B)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'semitones_moved', 'vt' => 'dependent', 'l' => 'Signed distance moved, in semitones (+ up, − down)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'interval_size', 'vt' => 'dependent', 'l' => 'Size of the move, in semitones (0–12)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'chord_tones', 'vt' => 'dependent', 'l' => 'Notes in the chord']]]],
        ],
    ]],
    'js' => <<<'JS'
/* the note choices on the root picker, in the order the page lists them */
var ROOT_LABELS = ['C', 'C♭', 'C♯', 'D', 'D♭', 'D♯', 'E', 'E♭', 'E♯', 'F', 'F♭',
                   'F♯', 'G', 'G♭', 'G♯', 'A', 'A♭', 'A♯', 'B', 'B♭', 'B♯'];

var LETTER_PC = { C: 0, D: 2, E: 4, F: 5, G: 7, A: 9, B: 11 };
var LETTERS = ['C', 'D', 'E', 'F', 'G', 'A', 'B'];

/* the chord vocabulary, indexed exactly as the shape dropdown lists it */
var SHAPES = [
  { n: 'major',                iv: [0, 4, 7] },
  { n: 'minor',                iv: [0, 3, 7] },
  { n: 'augmented',            iv: [0, 4, 8] },
  { n: 'diminished',           iv: [0, 3, 6] },
  { n: 'suspended second',     iv: [0, 2, 7] },
  { n: 'suspended fourth',     iv: [0, 5, 7] },
  { n: 'dominant seventh',     iv: [0, 4, 7, 10] },
  { n: 'major seventh',        iv: [0, 4, 7, 11] },
  { n: 'minor seventh',        iv: [0, 3, 7, 10] },
  { n: 'diminished seventh',   iv: [0, 3, 6, 9] },
  { n: 'half-diminished seventh', iv: [0, 3, 6, 10] },
  { n: 'major sixth',          iv: [0, 4, 7, 9] },
  { n: 'minor sixth',          iv: [0, 3, 7, 9] },
  { n: 'dominant ninth',       iv: [0, 4, 7, 10, 14] },
  { n: 'major ninth',          iv: [0, 4, 7, 11, 14] },
  { n: 'minor ninth',          iv: [0, 3, 7, 10, 14] },
  { n: 'dominant minor ninth', iv: [0, 4, 7, 10, 13] }
];

var SHORTS = ['maj', 'min', 'aug', 'dim', 'sus2', 'sus4', '7', 'maj7', 'min7', 'dim7',
              'm7♭5', '6', 'min6', '9', 'maj9', 'min9', '7♭9'];

/* how many letter names each chromatic interval covers (C to E is two letters) */
var LETTER_STEPS = [0, 1, 1, 2, 2, 3, 3, 4, 5, 5, 6, 6, 7];

var KEY_PC = { C: 0, G: 7, D: 2, A: 9, E: 4, B: 11, 'F♯': 6, 'C♯': 1, F: 5,
               'B♭': 10, 'E♭': 3, 'A♭': 8, 'D♭': 1, 'G♭': 6, 'C♭': 11 };

/* the accidentals a major key uses, letter by letter (C major has none) */
var KEY_ACC = {
  C: 0, G: 1, D: 2, A: 3, E: 4, B: 5, 'F♯': 6, 'C♯': 7,
  F: -1, 'B♭': -2, 'E♭': -3, 'A♭': -4, 'D♭': -5, 'G♭': -6, 'C♭': -7
};
var SHARP_ORDER = ['F', 'C', 'G', 'D', 'A', 'E', 'B'];
var FLAT_ORDER = ['B', 'E', 'A', 'D', 'G', 'C', 'F'];

function pcOf(label) {
  var letter = label.charAt(0);
  var rest = label.slice(1);
  var pc = LETTER_PC[letter];
  for (var i = 0; i < rest.length; i++) {
    if (rest.charAt(i) === '♯') { pc += 1; }
    if (rest.charAt(i) === '♭') { pc -= 1; }
  }
  return ((pc % 12) + 12) % 12;
}

function letterOf(label) {
  return label.charAt(0);
}

/* "F♯" for a letter and an accidental in semitones, e.g. ('F', 2) -> "F♯♯" */
function spell(letter, acc) {
  var sign = '';
  if (acc > 0) { sign = acc === 2 ? '♯♯' : acc === 1 ? '♯' : ''; }
  if (acc < 0) { sign = acc === -2 ? '♭♭' : acc === -1 ? '♭' : ''; }
  return letter + sign;
}

/* the pitch class a key's own scale gives a letter, accidentals included */
function keyLetterPc(keyLabel, letter) {
  var acc = 0;
  var sig = KEY_ACC[keyLabel] || 0;
  if (sig > 0) {
    for (var i = 0; i < sig; i++) { if (SHARP_ORDER[i] === letter) { acc = 1; } }
  } else if (sig < 0) {
    for (var j = 0; j < -sig; j++) { if (FLAT_ORDER[j] === letter) { acc = -1; } }
  }
  return ((LETTER_PC[letter] + acc) % 12 + 12) % 12;
}

/* the seven letters of a key scale, in order from its tonic */
function keyScale(keyLabel) {
  var tonicLetter = letterOf(keyLabel);
  var start = LETTERS.indexOf(tonicLetter);
  var out = [];
  for (var i = 0; i < 7; i++) {
    var letter = LETTERS[(start + i) % 7];
    out.push({ letter: letter, pc: keyLetterPc(keyLabel, letter) });
  }
  return out;
}

/* the tone of the chord whose interval above the root is `iv` semitones */
function chordToneName(rootLabel, iv) {
  var rootLetterIdx = LETTERS.indexOf(letterOf(rootLabel));
  var rootPc = pcOf(rootLabel);
  var steps = iv <= 14 && iv > 12 ? 4 : 0;
  /* stack thirds: the 3rd is two letters up, the 5th four, the 7th six, the 9th eight */
  var letterShift = iv === 0 ? 0
    : iv === 2 || iv === 3 || iv === 4 ? 2
    : iv === 5 || iv === 6 || iv === 7 || iv === 8 ? 4
    : iv === 9 || iv === 10 || iv === 11 ? 6
    : 8;                                   /* 13, 14 and the flat ninth */
  var letter = LETTERS[(rootLetterIdx + letterShift) % 7];
  var want = (rootPc + iv) % 12;
  var acc = ((want - LETTER_PC[letter]) % 12 + 12) % 12;
  if (acc > 6) { acc -= 12; }
  if (acc > 2) { acc = 2; }
  if (acc < -2) { acc = -2; }
  return spell(letter, acc);
}

function labelOf(name) {
  var sel = document.querySelector('select[data-var="' + name + '"]');
  if (!sel || sel.selectedIndex < 0) { return null; }
  return sel.options[sel.selectedIndex].text.replace(/\s+/g, ' ').trim();
}

function radioOn(name) {
  var r = document.querySelector('input[type="radio"][name="' + name + '"]:checked');
  if (!r) { return null; }
  var span = r.parentNode && r.parentNode.querySelector('span');
  return span ? span.textContent.replace(/\s+/g, ' ').trim() : r.value;
}

/* how far up the chosen interval sits, taken from the label's bracketed number */
function intervalSemitones(text) {
  var m = /\((-?\d+)\)/.exec(text || '');
  return m ? Number(m[1]) : null;
}

omni.onResult(['chord_root', 'chord_shape', 'transpose_method', 'updown'], function (ctx, v) {
  var rootText = labelOf('chord_root');
  if (!rootText) {
    ctx.addUnmetCondition('Choose the chord’s root note.');
    return;
  }
  var sel = document.querySelector('select[data-var="chord_root"]');
  /* the dropdown's own labels are the source of truth for spelling */
  if (sel) { rootText = sel.options[sel.selectedIndex].text.trim(); }

  var shapeSel = document.querySelector('select[data-var="chord_shape"]');
  var shapeIdx = shapeSel ? shapeSel.selectedIndex : 0;
  var shape = SHAPES[shapeIdx] || SHAPES[0];

  var method = radioOn('transpose_method') || 'Interval (semitones)';
  var direction = (radioOn('updown') || 'Up').indexOf('Down') >= 0 ? -1 : 1;

  var shift = null;           /* signed, in semitones */
  var spelledRoot = null;     /* the transposed root, as a name */

  if (method.indexOf('Key') >= 0) {
    var fromKey = labelOf('original_key');
    var toKey = labelOf('new_key');
    if (!fromKey || !toKey) {
      ctx.addUnmetCondition('Choose both the key you are in and the key you are going to.');
      return;
    }
    var fromPc = KEY_PC[fromKey];
    var toPc = KEY_PC[toKey];
    if (fromPc === undefined || toPc === undefined) {
      ctx.addUnmetCondition('That key pair is not on the list.');
      return;
    }
    var step = ((toPc - fromPc) % 12 + 12) % 12;
    shift = direction < 0 ? -(step === 0 ? 0 : step) : step;

    /* put the chord's root on the same scale degree in the new key */
    var fromScale = keyScale(fromKey);
    var rootPc = pcOf(rootText);
    var degree = -1;
    for (var d = 0; d < 7; d++) { if (fromScale[d].pc === rootPc) { degree = d; break; } }
    if (degree >= 0) {
      var toScale = keyScale(toKey);
      spelledRoot = spell(toScale[degree].letter, 0);
      var wantPc = toScale[degree].pc;
      var natPc = LETTER_PC[toScale[degree].letter];
      var acc = ((wantPc - natPc) % 12 + 12) % 12;
      if (acc > 6) { acc -= 12; }
      spelledRoot = spell(toScale[degree].letter, acc);
    }
  } else {
    var ival = intervalSemitones(labelOf('interval'));
    if (ival === null) {
      ctx.addUnmetCondition('Choose the interval to transpose by.');
      return;
    }
    shift = direction * ival;
  }

  var newPc = ((pcOf(rootText) + shift) % 12 + 12) % 12;

  if (spelledRoot === null) {
    /* by interval: keep the letter of the original root and move it diatonically */
    var steps = LETTER_STEPS[Math.abs(shift) % 12];
    if (Math.abs(shift) === 12) { steps = 7; }
    var rootLetterIdx = LETTERS.indexOf(letterOf(rootText));
    var letter = LETTERS[(rootLetterIdx + direction * steps % 7 + 7) % 7];
    var acc2 = ((newPc - LETTER_PC[letter]) % 12 + 12) % 12;
    if (acc2 > 6) { acc2 -= 12; }
    if (acc2 > 2) { acc2 = 2; }
    if (acc2 < -2) { acc2 = -2; }
    spelledRoot = spell(letter, acc2);
  }

  var names = shape.iv.map(function (iv) { return chordToneName(spelledRoot, iv); });
  var chordName = spelledRoot + ' ' + shape.n;
  var shortName = spelledRoot + SHORTS[shapeIdx];

  ctx.exportValue('transposed_root', newPc);
  ctx.exportValue('semitones_moved', shift);
  ctx.exportValue('interval_size', Math.abs(shift));
  ctx.exportValue('chord_tones', shape.iv.length);

  ctx.addHtml('<p><strong>' + chordName + '</strong></p>');
  ctx.addHtml('<p>Written in short: <strong>' + shortName + '</strong></p>');

  var directionWord = shift === 0 ? 'not moved at all'
    : (shift > 0 ? 'moved up ' + shift + ' semitone' + (Math.abs(shift) === 1 ? '' : 's')
                 : 'moved down ' + Math.abs(shift) + ' semitone' + (Math.abs(shift) === 1 ? '' : 's'));
  var methodNote = method.indexOf('Key') >= 0
    ? 'From the key of ' + labelOf('original_key') + ' to the key of ' + labelOf('new_key')
    : 'By the interval “' + labelOf('interval') + '”';

  ctx.addHtml(stable(['Item', 'Value'], [
    ['Original chord', rootText + ' ' + shape.n + ' (' + rootText + SHORTS[shapeIdx] + ')'],
    ['Short name of the new chord', shortName],
    ['How it was moved', methodNote],
    ['Distance', directionWord + ' (' + (shift >= 0 ? '+' : '−') + Math.abs(shift) + ')'],
    ['New root', spelledRoot],
    ['New chord', chordName],
    ['Notes', names.join(' – ')],
    ['Pitch classes', shape.iv.map(function (iv) { return (newPc + iv) % 12; }).join(', ') + ' (0 = C … 11 = B)']
  ]));

  ctx.addHtml('<p class="calc-unmet">Every note of the chord moves by the same number of semitones — '
    + 'that is what keeps the chord a chord. This page spells the new notes with the letters the new key '
    + 'uses, so a C major chord moved up three semitones comes out as E♭ major (E♭-G-B♭), never as D♯ major '
    + '(D♯-F𝄪-A♯). A move of six semitones (a tritone) is written as an augmented fourth, which suits keys with '
    + 'sharps; in a flat key the same move is a diminished fifth and the spelling would differ. Other chords '
    + 'in the progression have to be moved by the same distance — this page transposes one chord at a time.</p>');
});
JS,
];
