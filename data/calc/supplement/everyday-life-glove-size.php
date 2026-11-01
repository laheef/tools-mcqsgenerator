<?php
/**
 * Glove size from the circumference of the hand.
 *
 * A glove size is the hand circumference in inches, measured around the palm
 * below the knuckles; the page offers the circumference itself, so the size is
 * the number on the tape. The letter sizes are the customary men's and women's
 * bands around it.
 */
return [
    'hideTexts' => true,
    'vars' => [
        'glove_size' => ['type' => 'dependent', 'rnd' => ['standard', '1']],
        'hand_cm' => ['type' => 'dependent', 'rnd' => ['standard', '1']],
        'letter_size' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'glove_size', 'vt' => 'dependent', 'l' => 'Glove size']]]],
            ['FR1', [[['t' => 'v', 'n' => 'hand_cm', 'vt' => 'dependent', 'l' => 'Hand circumference (cm)']]]],
        ],
    ]],
    'showIf' => [
        'chooseSize_men' => 'gender == 0', 'chooseSize_women' => 'gender == 1',
    ],
    'js' => <<<'JS'
/* the picker's option id (1 … 8) maps to a circumference in inches */
var INCHES = { '1': 6.0, '2': 6.5, '3': 7.0, '4': 7.5, '5': 8.0, '6': 8.5, '7': 9.0, '8': 9.5 };

var MEN = [
  { from: 0, to: 7.75, name: 'XS' },
  { from: 7.75, to: 8.75, name: 'S' },
  { from: 8.75, to: 9.75, name: 'M' },
  { from: 9.75, to: 10.75, name: 'L' },
  { from: 10.75, to: 11.75, name: 'XL' },
  { from: 11.75, to: 99, name: 'XXL' }
];
var WOMEN = [
  { from: 0, to: 6.6, name: 'XS' },
  { from: 6.6, to: 7.2, name: 'S' },
  { from: 7.2, to: 7.9, name: 'M' },
  { from: 7.9, to: 8.6, name: 'L' },
  { from: 8.6, to: 99, name: 'XL' }
];

function band(list, value) {
  for (var i = 0; i < list.length; i++) {
    if (value < list[i].to) return list[i];
  }
  return list[list.length - 1];
}

omni.onResult([], function (ctx, v) {
  var men = Math.round(Number(v.gender)) === 0;
  var raw = v.hand_circumference;
  if (raw === '' || raw === undefined) {
    ctx.addUnmetCondition('Pick your hand circumference from the list.');
    return;
  }
  var inches = INCHES[String(Math.round(Number(raw)))];
  if (inches === undefined) {
    ctx.addUnmetCondition('That circumference is not one of the choices.');
    return;
  }
  var table = men ? MEN : WOMEN;
  var hit = band(table, inches);

  ctx.exportValue('glove_size', sround(inches, 1));
  ctx.exportValue('hand_cm', sround(inches * 2.54, 1));
  ctx.exportValue('letter_size', hit.name);

  ctx.addHtml('<p><strong>' + (men ? "Men's" : "Women's") + ' glove size ' + snum(inches, 1)
    + ' — ' + hit.name + '</strong>, for a hand of ' + snum(inches, 1) + ' in ('
    + snum(inches * 2.54, 1) + ' cm) around the palm.</p>');
  var rows = table.map(function (b) {
    return [b.name, (b.from ? snum(b.from, 2) : 'below ' + snum(b.to, 2)) + (b.to < 99 ? ' to ' + snum(b.to, 2) : ' and up'),
            b.name === hit.name ? '← you' : ''];
  });
  ctx.addHtml(stable(['Letter size', 'Hand circumference (in)', ''], rows));
  ctx.addHtml('<p class="calc-unmet">Glove sizing is not standardised: a size 8 from one maker can fit like a '
    + '7.5 from another, and a leather glove should be bought snug while a lined winter glove needs a little '
    + 'room.</p>');
});
JS,
];
