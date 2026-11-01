<?php
/**
 * Key signatures and keys.
 *
 * Keys run round the circle of fifths: each step clockwise adds a sharp (C, G,
 * D, A, E, B, F♯, C♯) and each step anticlockwise adds a flat (F, B♭, E♭, A♭,
 * D♭, G♭, C♭). The same cycle, read the other way, turns a count of
 * accidentals back into a key name, and the relative minor sits three semitones
 * below the major.
 */
return [
    'vars' => [
        'accidental_count' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'sharps_or_flats' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'accidental_count', 'vt' => 'dependent', 'l' => 'Accidentals in the signature']]]],
            ['FR1', [[['t' => 'v', 'n' => 'sharps_or_flats', 'vt' => 'dependent',
                       'l' => 'Sharps = 1, flats = 2, none = 0']]]],
        ],
    ]],
    'showIf' => [
        'accidentals_type' => 'option == 1',
        'accidentals' => 'option == 1',
        'major_keys' => 'option == 0',
        'minor_keys' => 'option == 0',
    ],
    'js' => <<<'JS'
/* the two name lists are the option ids of the page, in order */
var MAJOR_NAMES = ['C', 'C♯', 'D♭', 'D', 'E♭', 'E', 'F', 'F♯', 'G♭', 'G', 'A♭', 'A', 'B♭', 'B', 'C♭'];
var MAJOR_PCS   = [0, 1, 1, 2, 3, 4, 5, 6, 6, 7, 8, 9, 10, 11, 11];
var MINOR_NAMES = ['C', 'C♯', 'D', 'D♯', 'E♭', 'E', 'F', 'F♯', 'G', 'G♯', 'A♭', 'A', 'A♯', 'B♭', 'B'];
var MINOR_PCS   = [0, 1, 2, 3, 3, 4, 5, 6, 7, 8, 8, 9, 10, 10, 11];

var SHARP_ORDER = ['F', 'C', 'G', 'D', 'A', 'E', 'B'];
var FLAT_ORDER = ['B', 'E', 'A', 'D', 'G', 'C', 'F'];

/* major key on a pitch class -> signed count of accidentals (+ sharps, − flats) */
function majorAccidentals(pc) {
  var n = ((pc * 7) % 12 + 12) % 12;
  return n <= 6 ? n : n - 12;
}
function noteName(pc) {
  return ['C', 'C♯', 'D', 'D♯', 'E', 'F', 'F♯', 'G', 'G♯', 'A', 'A♯', 'B'][((pc % 12) + 12) % 12];
}

omni.onResult([], function (ctx, v) {
  var wantSignature = Math.round(Number(v.option)) === 1;
  var major = Math.round(Number(v.key_quality)) === 1;

  if (wantSignature) {
    var type = Math.round(Number(v.accidentals_type));
    var count = Math.round(Number(v.accidentals));
    if (v.accidentals_type === '' || v.accidentals_type === undefined) {
      ctx.addUnmetCondition('Choose sharps, flats, or neither.');
      return;
    }
    if (type === 0) count = 0;
    if (type !== 0 && (v.accidentals === '' || !isFinite(count))) {
      ctx.addUnmetCondition('Say how many ' + (type === 2 ? 'sharps' : 'flats') + ' there are.');
      return;
    }
    if (type === 0) {
      ctx.exportValue('accidental_count', 0);
      ctx.exportValue('sharps_or_flats', 0);
      ctx.addHtml('<p><strong>C major and A minor both have a signature with no accidentals.</strong></p>');
      return;
    }
    if (count < 1 || count > 7) {
      ctx.addUnmetCondition('A key signature has between one and seven ' + (type === 2 ? 'sharps' : 'flats')
        + ' — every key beyond that is written with the other sign.');
      return;
    }
    /* sharps: the major tonic is a fifth above the last sharp; flats: a fourth below the last flat */
    var tonicPc = type === 2 ? ((count * 7) % 12) : ((12 - count * 7 % 12) % 12);
    if (type === 2) tonicPc = ((count * 7) % 12);
    else tonicPc = ((5 * count) % 12);
    var minorPc = ((tonicPc + 9) % 12);

    ctx.exportValue('accidental_count', count);
    ctx.exportValue('sharps_or_flats', type);

    var order = (type === 2 ? SHARP_ORDER : FLAT_ORDER).slice(0, count)
      .map(function (n) { return n + (type === 2 ? '♯' : '♭'); });
    var majorName = noteName(tonicPc), minorName = noteName(minorPc);
    ctx.addHtml('<p><strong>' + count + ' ' + (type === 2 ? 'sharp' : 'flat') + (count > 1 ? 's' : '')
      + ': ' + order.join(', ') + '.</strong> That is ' + majorName + ' major, or ' + minorName
      + ' minor as its relative.</p>');
    ctx.addHtml(stable(['Quantity', 'Value'], [
      ['Accidentals, in the order they are written', order.join(', ')],
      ['Major key', majorName + ' major'],
      ['Relative minor', minorName + ' minor']
    ]));
    return;
  }

  /* the other direction: a named tonic, and what signature it carries */
  var list = major ? MAJOR_NAMES : MINOR_NAMES;
  var pcs = major ? MAJOR_PCS : MINOR_PCS;
  var raw = v[major ? 'major_keys' : 'minor_keys'];
  if (raw === '' || raw === undefined) {
    ctx.addUnmetCondition('Pick the root note of the key.');
    return;
  }
  var idx = Math.round(Number(raw));
  if (!isFinite(idx) || idx < 0 || idx >= list.length) {
    ctx.addUnmetCondition('That root note is not one of the choices.');
    return;
  }
  var pc = pcs[idx];
  var signed = majorAccidentals(major ? pc : ((pc + 3) % 12));
  var isSharp = signed >= 0, n = Math.abs(signed);

  ctx.exportValue('accidental_count', n);
  ctx.exportValue('sharps_or_flats', n === 0 ? 0 : (isSharp ? 2 : 1));

  var written = n === 0 ? [] : (isSharp ? SHARP_ORDER : FLAT_ORDER).slice(0, n)
    .map(function (x) { return x + (isSharp ? '♯' : '♭'); });
  ctx.addHtml('<p><strong>' + list[idx] + ' ' + (major ? 'major' : 'minor') + ' has '
    + (n === 0 ? 'no accidentals' : n + ' ' + (isSharp ? 'sharp' : 'flat') + (n > 1 ? 's' : ''))
    + '</strong>' + (n ? ': ' + written.join(', ') : '') + '.</p>');
  ctx.addHtml(stable(['Key', 'Signature', 'Relative key'], [
    [list[idx] + (major ? ' major' : ' minor'),
     n === 0 ? 'none' : n + (isSharp ? ' ♯' : ' ♭'),
     major ? noteName((pc + 9) % 12) + ' minor' : noteName((pc + 3) % 12) + ' major']
  ]));
});
JS,
];
