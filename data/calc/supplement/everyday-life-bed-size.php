<?php
/**
 * Bed size — which mattress the sleeper actually fits on.
 *
 * The harvested page asked for a height and a continent and then answered
 * nothing: the equation list never made the crossing. The rule the trade uses
 * is simple — the mattress has to be longer than the person by a comfortable
 * margin (15 cm / 6 in is the usual allowance) — so the page now measures the
 * sleeper against every standard size in the chosen system and names the
 * smallest one that clears it.
 */
return [
    'hideTexts' => true,
    'vars' => [
        'bed_length' => ['type' => 'dependent', 'rnd' => ['standard', '1']],
        'bed_width' => ['type' => 'dependent', 'rnd' => ['standard', '1']],
        'bed_name' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'head_room' => ['type' => 'dependent', 'rnd' => ['standard', '1']],
    ],
    'groups' => [[
        'uid' => 'supp-bed-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'bed_length', 'vt' => 'dependent', 'l' => 'Recommended mattress length (cm)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'bed_width', 'vt' => 'dependent', 'l' => 'Recommended mattress width (cm)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'head_room', 'vt' => 'dependent', 'l' => 'Room left beyond your head and feet (cm)']]]],
        ],
    ]],
    'js' => <<<'JS'
/* the height box carries a unit picker; the formulas work in centimetres */
var UNITS = { cm: 1, m: 100, inch: 2.54, ft: 30.48 };

/* length x width in cm, and the name the shop uses */
var US = [
  ['Twin', 99, 190], ['Twin XL', 99, 203], ['Full', 137, 190],
  ['Queen', 152, 203], ['King', 193, 203], ['California King', 183, 213]
];
var EU = [
  ['Single', 90, 190], ['Small double', 120, 190], ['Double', 140, 200],
  ['King', 160, 200], ['Super king', 180, 200], ['Grand king', 200, 210]
];

omni.onResult(['height'], function (ctx, v) {
  var unitSel = document.querySelector('select[data-unit-select="height"]');
  var unit = unitSel && UNITS[unitSel.value] ? unitSel.value : 'cm';
  var height = Number(v.height);
  if (!isFinite(height) || height <= 0) {
    ctx.addUnmetCondition('Enter the height of the person who will sleep in the bed.');
    return;
  }
  var cm = height * UNITS[unit];
  if (cm < 60 || cm > 260) {
    ctx.addUnmetCondition('That is ' + snum(cm, 1) + ' cm tall — check the unit next to the height box.');
    return;
  }

  var region = Number(v.us_eu);
  var system = region === 2 ? EU : US;
  var label  = region === 2 ? 'Europe (cm)' : 'North America / Australia (inches)';

  /* the sleeper needs 15 cm beyond their height, or 6 in in the imperial system */
  var need = cm + 15;
  var pick = null;
  var rows = [];
  system.forEach(function (b) {
    var fits = b[2] >= need;
    rows.push([b[0], snum(b[1], 0) + ' x ' + snum(b[2], 0),
      snum(b[1] / 2.54, 1) + '" x ' + snum(b[2] / 2.54, 1) + '"',
      fits ? 'fits' : 'too short']);
    if (fits && pick === null) pick = b;
  });

  if (pick === null) {
    pick = system[system.length - 1];
  }

  ctx.exportValue('bed_length', sround(pick[2], 1));
  ctx.exportValue('bed_width', sround(pick[1], 1));
  ctx.exportValue('head_room', sround(pick[2] - cm, 1));

  var fitsFully = pick[2] >= need;
  ctx.addHtml('<p><strong>' + snum(cm, 1) + ' cm tall ('
    + snum(cm / 2.54, 1) + ' in) — the smallest ' + label + ' bed that leaves you '
    + 'room is a ' + pick[0] + '.</strong> It gives you ' + snum(pick[2] - cm, 1)
    + ' cm (about ' + snum((pick[2] - cm) / 2.54, 1) + ' in) more than your height. Allowing for a '
    + 'pillow and a duvet tucked in at the foot takes roughly 15 cm (6 in), which is the margin used here.'
    + (fitsFully ? '' : ' Nothing on this list leaves the full margin — you are at the top of the '
      + 'standard range, so take the longest bed you can find, or have one made.')
    + '</p>');
  ctx.addHtml(stable(['Mattress', 'Size (cm)', 'Size (in)', 'For you'], rows));
  ctx.addHtml('<p>Length matters more than width: the mattress has to be longer '
    + 'than the tallest person in it. A width of 90 cm (35 in) is a single, 140 cm (55 in) sleeps two '
    + 'averagely, and 160 cm (63 in) and up is what most couples end up buying. The sizes above are the '
    + 'ones stocked in the region you picked; furniture shops within one country still differ by a '
    + 'centimetre or two. Feet and metres are converted to centimetres before the comparison.</p>');
});
JS,
];
