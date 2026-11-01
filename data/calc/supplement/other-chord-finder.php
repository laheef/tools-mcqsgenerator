<?php
/**
 * Chord finder — which chord the notes you are holding make.
 *
 * The harvested page offered five note pickers, a key root and a "the root is
 * known" checkbox, then answered nothing: the surviving `checkCondition()` takes
 * five notes plus a root plus a mode and nothing called it, and the box that
 * should have printed the chord name was a blank presentation field.
 *
 * The repair names the chord from first principles rather than from a list of
 * chords: the notes are stacked into intervals above the root, and the interval
 * set is matched against the chord vocabulary — third, fifth, seventh, sixth,
 * suspensions and the common added-note chords. Inversion is reported too, since
 * C-E-G and E-G-C are the same chord in two positions.
 */
return [
    'hideTexts' => true,
    'remove' => ['noChords', 'note1', 'note2', 'note3', 'note4', 'note5',
                 'root_note', 'text_to_display', 'tooFewNotes'],
    'showIf' => [
        'root_note_VS' => 'root_note_checkbox == 1',
    ],
    'vars' => [
        'chord_root' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'chord_notes' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'chord_bass' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'chord_quality' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
    ],
    'groups' => [[
        'uid' => 'supp-chord-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'chord_root', 'vt' => 'dependent', 'l' => 'Root of the chord (0 = C ... 11 = B)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'chord_notes', 'vt' => 'dependent', 'l' => 'Distinct notes in the chord']]]],
            ['FR1', [[['t' => 'v', 'n' => 'chord_bass', 'vt' => 'dependent', 'l' => 'Lowest note (0 = C ... 11 = B)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'chord_quality', 'vt' => 'dependent', 'l' => 'Chord type (see the table)']]]],
        ],
    ]],
    'js' => <<<'JS'
/*
 * The harvested page opens with C, E and G already chosen and the root box
 * ticked. Nothing on this site may arrive filled in, so the pickers are set
 * back to "None" as the page loads — twice, in case the widget re-renders them.
 */
function clearChordFields() {
  ['note1_VS', 'note2_VS', 'note3_VS', 'note4_VS', 'note5_VS', 'root_note_VS'].forEach(function (n) {
    var s = document.querySelector('select[data-var="' + n + '"]');
    if (s && s.selectedIndex !== 0) { s.selectedIndex = 0; }
  });
  var box = document.querySelector('input[data-var-check="root_note_checkbox"]');
  if (box && box.checked) {
    box.checked = false;
    box.dispatchEvent(new Event('change', { bubbles: true }));
  }
}
clearChordFields();
if (document.readyState === 'loading') { document.addEventListener('DOMContentLoaded', clearChordFields); }
setTimeout(clearChordFields, 0);
setTimeout(clearChordFields, 120);

var NAMES = ['C', 'C♯/D♭', 'D', 'D♯/E♭', 'E', 'F', 'F♯/G♭', 'G', 'G♯/A♭', 'A', 'A♯/B♭', 'B'];

/*
 * The chord vocabulary: the intervals above the root, and the name suffix. The
 * order matters — the first match wins, so the most specific shapes come first
 * (a thirteenth chord also contains a major triad, and the page should say
 * thirteenth, not major).
 */
var SHAPES = [
  { iv: [0, 4, 7, 11, 14, 17, 21], name: 'major thirteenth' },
  { iv: [0, 4, 7, 10, 14, 17, 21], name: 'dominant thirteenth' },
  { iv: [0, 3, 7, 10, 14, 17],     name: 'minor eleventh' },
  { iv: [0, 4, 7, 10, 14, 17],     name: 'dominant eleventh' },
  { iv: [0, 4, 7, 11, 14, 17],     name: 'major eleventh' },
  { iv: [0, 4, 7, 11, 14],         name: 'major ninth' },
  { iv: [0, 4, 7, 10, 14],         name: 'dominant ninth' },
  { iv: [0, 3, 7, 10, 14],         name: 'minor ninth' },
  { iv: [0, 4, 7, 11, 18],         name: 'major ninth, sharp eleventh' },
  { iv: [0, 4, 7, 10, 21],         name: 'dominant thirteenth (no ninth)' },
  { iv: [0, 4, 7, 11],            name: 'major seventh' },
  { iv: [0, 4, 7, 10],            name: 'dominant seventh' },
  { iv: [0, 3, 7, 10],            name: 'minor seventh' },
  { iv: [0, 3, 6, 10],            name: 'half-diminished seventh' },
  { iv: [0, 3, 6, 9],             name: 'diminished seventh' },
  { iv: [0, 3, 6],                name: 'diminished' },
  { iv: [0, 4, 8],                name: 'augmented' },
  { iv: [0, 5, 7],                name: 'suspended fourth' },
  { iv: [0, 2, 7],                name: 'suspended second' },
  { iv: [0, 4, 7, 14],            name: 'added ninth' },
  { iv: [0, 4, 7, 9],             name: 'sixth' },
  { iv: [0, 3, 7, 9],             name: 'minor sixth' },
  { iv: [0, 5, 9],                name: 'six-nine (no third)' },
  { iv: [0, 4, 9],                name: 'sixth, no fifth' },
  { iv: [0, 5, 7, 10],            name: 'seventh, suspended fourth' },
  { iv: [0, 2, 7, 10],            name: 'seventh, suspended second' },
  { iv: [0, 4, 7],                name: 'major' },
  { iv: [0, 3, 7],                name: 'minor' },
  { iv: [0, 4],                   name: 'major third (dyad)' },
  { iv: [0, 3],                   name: 'minor third (dyad)' },
  { iv: [0, 5],                   name: 'perfect fourth (dyad)' },
  { iv: [0, 7],                   name: 'perfect fifth (dyad)' }
];

/* the chord types, numbered for the numeric output */
var QUALITY_INDEX = {};
SHAPES.forEach(function (s, i) { QUALITY_INDEX[s.name] = i + 1; });

/* the pitch class of the chosen option in note picker i (0 means "None") */
function noteAt(i) {
  var name = 'note' + i + '_VS';
  var sel = document.querySelector('select[data-var="' + name + '"]');
  if (!sel || sel.selectedIndex <= 0) { return null; }
  return sel.selectedIndex - 1;          /* option 0 is "None" */
}

/* the note the visitor says is the root, if they said one */
function chosenRoot(v) {
  if (Number(v['root_note_checkbox']) !== 1) { return null; }
  var sel = document.querySelector('select[data-var="root_note_VS"]');
  if (!sel || sel.selectedIndex <= 0) { return null; }
  return sel.selectedIndex - 1;
}

/* the root picker hides when the box is unticked, so it is read locally, not listed */
omni.onResult(['note1_VS', 'note2_VS', 'note3_VS', 'note4_VS', 'note5_VS',
               'root_note_checkbox'], function (ctx, v) {
  var notes = [];
  for (var i = 1; i <= 5; i++) {
    var pc = noteAt(i);
    if (pc !== null && notes.indexOf(pc) < 0) { notes.push(pc); }
  }
  if (notes.length < 2) {
    ctx.addUnmetCondition('Choose at least two notes and the chord can be named.');
    return;
  }
  if (notes.length > 5) { notes = notes.slice(0, 5); }

  var bass = noteAt(1);
  if (bass === null) { bass = notes[0]; }

  /* the interval set above a candidate root, without octaves */
  function intervalsAbove(root) {
    var out = [];
    notes.forEach(function (pc) {
      var d = ((pc - root) % 12 + 12) % 12;
      if (out.indexOf(d) < 0) { out.push(d); }
    });
    return out.sort(function (a, b) { return a - b; });
  }

  var claimed = chosenRoot(v);

  /*
   * Which note is the root? Not the first one played — C-E-G and G-C-E are the
   * same chord. Every note in the set is tried as the root and scored by what it
   * leaves above itself: a third and a perfect fifth together say "this is the
   * root", a seventh adds weight, a fourth or a second says "suspended", and a
   * minor sixth or a flattened fifth is nearly worthless as evidence.
   */
  var WEIGHT = { 1: 0, 2: 2, 3: 3, 4: 3, 5: 2, 6: 1, 7: 3, 8: 1, 9: 1, 10: 2, 11: 2 };
  function rootedness(root) {
    var iv = intervalsAbove(root), total = 0;
    iv.forEach(function (d) { if (d !== 0) { total += (WEIGHT[d] || 0); } });
    /* a third and a fifth above the root is the strongest evidence there is */
    if (iv.indexOf(3) >= 0 || iv.indexOf(4) >= 0) { total += 2; }
    if (iv.indexOf(7) >= 0) { total += 2; }
    return total;
  }

  var candidates = claimed !== null ? [claimed] : notes.slice();
  var bestRoot = candidates[0], bestScore = -1;
  candidates.forEach(function (r) {
    var sc = rootedness(r);
    if (sc > bestScore) { bestScore = sc; bestRoot = r; }
  });

  var found = null;
  var root = bestRoot;
  var iv = intervalsAbove(root);
  var pcs = iv;
  for (var s = 0; s < SHAPES.length; s++) {
    var shape = SHAPES[s];
    var shapePcs = [];
    shape.iv.forEach(function (d) {
      var pc2 = d % 12;
      if (shapePcs.indexOf(pc2) < 0) { shapePcs.push(pc2); }
    });
    shapePcs.sort(function (a, b) { return a - b; });
    if (shapePcs.length === pcs.length && shapePcs.every(function (d, k) { return d === pcs[k]; })) {
      found = { root: root, shape: shape, intervals: iv };
      break;
    }
  }

  if (!found) {
    /* nothing in the vocabulary fits: report the intervals and say so */
    var rootGuess = bestRoot;
    var ivs = intervalsAbove(rootGuess);
    ctx.exportValue('chord_root', rootGuess);
    ctx.exportValue('chord_notes', notes.length);
    ctx.exportValue('chord_bass', bass);
    ctx.exportValue('chord_quality', 0);
    ctx.addHtml('<p><strong>These notes do not make any chord in the usual vocabulary: '
      + notes.map(function (n) { return NAMES[n]; }).join(', ') + '.</strong> Above '
      + NAMES[rootGuess] + ' the intervals are ' + ivs.join(', ')
      + ' semitones, which is not a triad, seventh or extended chord this page knows. Two of the notes '
      + 'may simply belong to different chords, or the voicing may be missing a note the chord needs.</p>');
    ctx.addHtml(stable(['Item', 'Value'], [
      ['Notes', notes.map(function (n) { return NAMES[n]; }).join(', ')],
      ['Intervals above ' + NAMES[rootGuess], ivs.join(', ') + ' semitones'],
      ['Lowest note', NAMES[bass]]
    ]));
    ctx.addHtml('<p class="calc-unmet">The name of a chord is decided by the intervals between its '
      + 'notes, not by the order they are played in. Two notes alone can always be read two ways — C and E '
      + 'is a major third above C and a minor sixth above E — which is why the page also asks which note '
      + 'you consider the root when you know it.</p>');
    return;
  }

  var rootName = NAMES[found.root];
  var bassName = NAMES[bass];
  var bassDegree = ((bass - found.root) % 12 + 12) % 12;
  var DEGREE = { 0: 'root', 3: 'third', 4: 'third', 7: 'fifth', 10: 'seventh',
                 11: 'seventh', 2: 'ninth', 14: 'ninth', 9: 'sixth', 5: 'fourth' };
  var DEGREE_NAME = { root: 'root', third: 'first', fifth: 'second', seventh: 'third',
                      ninth: 'fourth', sixth: 'third', fourth: 'second' };
  var inversion = 'root position (the root is in the bass)';
  var slash = '';
  if (bass !== found.root) {
    var degreeWord = DEGREE[bassDegree] || 'note';
    inversion = (DEGREE_NAME[degreeWord] || 'further') + ' inversion — the ' + degreeWord
      + ' (' + bassName + ') is in the bass';
    slash = ' / ' + bassName;
  }

  var fullName = rootName + ' ' + found.shape.name + slash;

  ctx.exportValue('chord_root', found.root);
  ctx.exportValue('chord_notes', notes.length);
  ctx.exportValue('chord_bass', bass);
  ctx.exportValue('chord_quality', QUALITY_INDEX[found.shape.name] || 0);

  ctx.addHtml('<p><strong>' + fullName + '</strong></p>');

  var rows = [
    ['Notes', notes.map(function (n) { return NAMES[n]; }).join(', ')],
    ['Root', rootName],
    ['Chord type', found.shape.name],
    ['Intervals above the root', found.intervals.join(', ') + ' semitones'],
    ['Lowest note', NAMES[bass] + (bass === found.root ? ' (the root)' : '')],
    ['Inversion', inversion]
  ];
  ctx.addHtml(stable(['Item', 'Value'], rows));

  /* the same notes read from each note in turn, so the choice of root is visible */
  var readings = notes.map(function (r) {
    var iv = intervalsAbove(r);
    var label = '—';
    for (var s = 0; s < SHAPES.length; s++) {
      var shapePcs = [];
      SHAPES[s].iv.forEach(function (d) { var pc2 = d % 12; if (shapePcs.indexOf(pc2) < 0) { shapePcs.push(pc2); } });
      shapePcs.sort(function (a, b) { return a - b; });
      if (shapePcs.length === iv.length && shapePcs.every(function (d, k) { return d === iv[k]; })) {
        label = SHAPES[s].name;
        break;
      }
    }
    return [NAMES[r], iv.join(', '), label];
  });
  ctx.addHtml('<p>The same notes read from each of them as the root:</p>');
  ctx.addHtml(stable(['If the root is', 'Intervals', 'The chord would be'], readings));

  ctx.addHtml('<p class="calc-unmet">A chord is named from the bottom of its stacked intervals, not '
    + 'from the order the notes are played: C-E-G, E-G-C and G-C-E are all C major, in root position, '
    + 'first inversion and second inversion. This page names triads, sixths, sevenths, ninths, elevenths '
    + 'and thirteenths, and the common suspensions and added notes; it does not know altered chords '
    + '(♭9, ♯5, alt), polychords, or a voicing whose notes are spread over more than an octave in a way '
    + 'that changes which note is heard as the root. Two notes are always ambiguous, so treat a "dyad" '
    + 'answer as a hint rather than a name.</p>');
});
JS,
];
