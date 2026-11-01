<?php
/**
 * How much water a day.
 *
 * The figures are the Institute of Medicine adequate intakes: 3.7 L a day for
 * men and 2.7 L for women (total water, food included), scaled for children by
 * age, plus the pregnancy and lactation additions. Beverages are about 80 % of
 * the total, which is where the "cups" figure comes from.
 */
return [
    'vars' => [
        'total_water_l' => ['type' => 'dependent', 'rnd' => ['standard', '2']],
        'beverage_l' => ['type' => 'dependent', 'rnd' => ['standard', '2']],
        'cups' => ['type' => 'dependent', 'rnd' => ['standard', '1']],
        'glasses_8oz' => ['type' => 'dependent', 'rnd' => ['standard', '1']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'total_water_l', 'vt' => 'dependent', 'l' => 'Total water a day (L, food included)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'beverage_l', 'vt' => 'dependent', 'l' => 'From drinks (L)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'cups', 'vt' => 'dependent', 'l' => 'From drinks (cups of 240 ml)']]]],
        ],
    ]],
    'showIf' => [
        'gender' => 'child_adult == 0',
        'pregnant_lactation' => 'child_adult == 0 and gender == 1',
        'children_intake' => 'child_adult == 1',
        'boy_girl' => 'child_adult == 1',
    ],
    'js' => <<<'JS'
/* adequate intake, litres of total water a day (IOM 2005) */
var CHILD = [
  { age: '0–6 months',  total: 0.7 },
  { age: '7–12 months', total: 0.8 },
  { age: '1–3 years',   total: 1.3 },
  { age: '4–8 years',   total: 1.7 },
  { age: '9–13 years',  total: 2.4 },
  { age: '14–18 years', total: 3.3 }
];

omni.onResult([], function (ctx, v) {
  var child = Math.round(Number(v.child_adult)) === 1;
  var total, note;

  if (child) {
    var idx = Math.round(Number(v.children_intake));
    if (v.children_intake === '' || !isFinite(idx) || !CHILD[idx]) {
      ctx.addUnmetCondition('Choose the age band.');
      return;
    }
    total = CHILD[idx].total;
    if (idx >= 4) {
      /* the teen figures differ by sex */
      var girl = Math.round(Number(v.boy_girl)) === 1;
      total = idx === 4 ? (girl ? 2.1 : 2.4) : (girl ? 2.3 : 3.3);
    }
    note = CHILD[idx].age;
  } else {
    var female = Math.round(Number(v.gender)) === 1;
    total = female ? 2.7 : 3.7;
    note = female ? 'woman' : 'man';
    if (female) {
      var state = Math.round(Number(v.pregnant_lactation));
      if (state === 1) { total = 3.0; note = 'pregnant woman'; }
      else if (state === 2) { total = 3.8; note = 'breastfeeding woman'; }
    }
  }

  var beverage = total * 0.8;                  /* roughly 80 % comes from drinks */
  var cups = beverage / 0.24;                  /* a cup is 240 ml */

  ctx.exportValue('total_water_l', sround(total, 2));
  ctx.exportValue('beverage_l', sround(beverage, 2));
  ctx.exportValue('cups', sround(cups, 1));
  ctx.exportValue('glasses_8oz', sround(cups / 1.0, 1));

  ctx.addHtml('<p><strong>' + snum(total, 2) + ' L of water a day</strong> in total for a ' + note
    + ' — about ' + snum(beverage, 2) + ' L of it from drinks, or ' + snum(cups, 1)
    + ' cups of 240 ml.</p>');
  ctx.addHtml(stable(['Quantity', 'Value'], [
    ['Total water, food included', snum(total, 2) + ' L'],
    ['From drinks', snum(beverage, 2) + ' L'],
    ['Cups (240 ml)', snum(cups, 1)],
    ['Water in food', snum(total - beverage, 2) + ' L']
  ]));
  ctx.addHtml('<p class="calc-unmet">These are adequate intakes for a sedentary person in a temperate climate. '
    + 'Heat, exercise, fever and a high-protein diet all raise them; coffee and tea count towards the drinks.</p>');
});
JS,
];
