<?php
/**
 * Which voice type a range belongs to.
 *
 * Notes are numbered in semitones from C1 = 0. Each voice type has a customary
 * range; the visitor's range is compared with each one and the largest overlap
 * wins, so a low alto is not called a soprano just because it reaches C5.
 */
return [
    'vars' => [
        'range_semitones' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'match_percent' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'range_semitones', 'vt' => 'dependent', 'l' => 'Your range in semitones']]]],
            ['FR1', [[['t' => 'v', 'n' => 'match_percent', 'vt' => 'dependent',
                       'l' => 'How much of your range the best-fitting type covers', 'suf' => '%']]]],
        ],
    ]],
    'js' => <<<'JS'
var NAMES = ['C', 'C♯', 'D', 'D♯', 'E', 'F', 'F♯', 'G', 'G♯', 'A', 'A♯', 'B'];
function noteName(n) {
  return NAMES[((n % 12) + 12) % 12] + (Math.floor(n / 12) + 1);
}
/* customary ranges, in semitones above C1 */
var VOICES = [
  { name: 'Bass',     low: 16, high: 40 },   /* E2 – E4 */
  { name: 'Baritone', low: 19, high: 43 },   /* G2 – G4 */
  { name: 'Tenor',    low: 24, high: 48 },   /* C3 – C5 */
  { name: 'Alto',     low: 29, high: 53 },   /* F3 – F5 */
  { name: 'Mezzo-soprano', low: 33, high: 57 }, /* A3 – A5 */
  { name: 'Soprano',  low: 36, high: 60 }    /* C4 – C6 */
];

omni.onResult([], function (ctx, v) {
  var low = Number(v.low_note), high = Number(v.high_note);
  if (v.low_note === '' || v.high_note === '' || !isFinite(low) || !isFinite(high)) {
    ctx.addUnmetCondition('Pick your lowest and your highest comfortable note.');
    return;
  }
  if (high < low) {
    ctx.addUnmetCondition('The highest note has to be above the lowest one.');
    return;
  }
  var span = high - low;
  if (span < 6) {
    ctx.addUnmetCondition('A range of ' + span + ' semitones is below an octave — pick the outer notes of '
      + 'what you can actually sing.');
    return;
  }

  /* A type that contains the whole range beats one that only overlaps most of it;
     among those, the tightest fit wins. */
  var best = null, bestScore = -1, bestOverlap = 0;
  var rows = VOICES.map(function (vc) {
    var overlap = Math.max(0, Math.min(high, vc.high) - Math.max(low, vc.low) + 1) / (span + 1);
    var contains = vc.low <= low && vc.high >= high;
    var score = (contains ? 2 : 1) * overlap - (contains ? (vc.high - vc.low) / 1000 : 0);
    if (score > bestScore) { bestScore = score; best = vc; bestOverlap = overlap; }
    return [vc.name, noteName(vc.low) + ' – ' + noteName(vc.high), snum(overlap * 100, 1) + ' %'];
  });

  var remark;
  if (span >= 24) {
    remark = 'A range of ' + span + ' semitones is more than two octaves — unusual, and worth double-checking '
      + 'that both ends are usable notes rather than squeaks and growls.';
  } else if (high > best.high) {
    remark = 'You reach above the usual ' + best.name + ' top (' + noteName(best.high) + '), which points at the '
      + 'voice type above if the high notes are comfortable.';
  } else if (low < best.low) {
    remark = 'You reach below the usual ' + best.name + ' bottom (' + noteName(best.low) + '), so you may be a '
      + 'heavier voice than this test suggests.';
  } else {
    remark = 'Both ends sit inside the usual ' + best.name + ' range.';
  }

  ctx.exportValue('range_semitones', span);
  ctx.exportValue('match_percent', sround(bestOverlap * 100, 1));

  ctx.addHtml('<p><strong>' + best.name + '</strong> — your range ' + noteName(low) + ' to ' + noteName(high)
    + ' matches it best (' + snum(bestOverlap * 100, 0) + ' % of your range).</p>');
  ctx.addHtml('<p>' + remark + '</p>');
  ctx.addHtml(stable(['Voice type', 'Usual range', 'Overlap with yours'], rows));
});
JS,
];
