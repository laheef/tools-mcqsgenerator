<?php
/**
 * Benadryl (diphenhydramine) dosing by age and product.
 *
 * Every product on the page is the same drug in a different form, so the age
 * band decides the dose and the product decides how it is measured out — a 25 mg
 * tablet, a 12.5 mg chewable, or 5 ml of the children's liquid at 12.5 mg/5 ml.
 */
return [
    'hideTexts' => true,
    'vars' => [
        'dose_mg_low' => ['type' => 'dependent', 'rnd' => ['standard', '2']],
        'dose_mg_high' => ['type' => 'dependent', 'rnd' => ['standard', '2']],
        'max_daily_mg' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'units_low' => ['type' => 'dependent', 'rnd' => ['standard', '2']],
        'units_high' => ['type' => 'dependent', 'rnd' => ['standard', '2']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'dose_mg_low', 'vt' => 'dependent', 'l' => 'Dose, lower end (mg)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'dose_mg_high', 'vt' => 'dependent', 'l' => 'Dose, upper end (mg)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'max_daily_mg', 'vt' => 'dependent', 'l' => 'Maximum in 24 hours (mg)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'units_low', 'vt' => 'dependent', 'l' => 'Lower dose in tablets / spoonfuls']]]],
            ['FR1', [[['t' => 'v', 'n' => 'units_high', 'vt' => 'dependent', 'l' => 'Upper dose in tablets / spoonfuls']]]],
        ],
    ]],
    'js' => <<<'JS'
/* product: [mg per unit, unit name] */
var PRODUCTS = {
  '0': [25, 'tablet', 'Benadryl Allergy ULTRATAB'],
  '1': [25, 'capsule', 'Benadryl Allergy LIQUI-GELS'],
  '2': [25, 'tablet', 'Benadryl Allergy Plus Congestion'],
  '3': [12.5, 'spoonful (5 ml)', "Children's Benadryl Allergy Liquid"],
  '4': [12.5, 'spoonful (5 ml)', "Children's Benadryl Allergy Plus Congestion"],
  '5': [12.5, 'chewable', "Children's Benadryl Chewables"],
  '7': [50, 'tablet', 'Benadryl Extra Strength Allergy ULTRATAB']
};

omni.onResult([], function (ctx, v) {
  var age = Number(v.age);
  if (v.age === '' || !isFinite(age) || age < 0 || age > 120) {
    ctx.addUnmetCondition('Enter the age in years.');
    return;
  }
  var productIdx = String(Math.round(Number(v.type)));
  var product = PRODUCTS[productIdx];
  if (!product) {
    ctx.addUnmetCondition('Choose the product you have.');
    return;
  }
  var childrens = productIdx >= '3' && productIdx <= '5';
  if (childrens && age >= 12) {
    ctx.addUnmetCondition('That is a children\'s product — at 12 and over use the adult ULTRATAB strength.');
    return;
  }
  if (!childrens && age < 12) {
    ctx.addUnmetCondition('Adult tablets are not for anyone under 12. Choose a children\'s product.');
    return;
  }
  if (productIdx === '2' && age < 12) {
    ctx.addUnmetCondition('Ask a doctor before giving Benadryl Allergy Plus Congestion to a child under 12.');
    return;
  }
  if (age < 2) {
    ctx.addUnmetCondition('Under 2 years, diphenhydramine is only given on a doctor\'s instruction — '
      + 'do not dose from a table.');
    return;
  }

  var low, high, maxDaily;
  if (age >= 12) { low = 25; high = 50; maxDaily = 300; }
  else if (age >= 6) { low = 12.5; high = 25; maxDaily = 150; }
  else { low = 6.25; high = 12.5; maxDaily = 37.5; }

  /* a single tablet may be more than the low dose: never split below the unit */
  var per = product[0];
  var unitsLow = low / per;
  var unitsHigh = high / per;

  ctx.exportValue('dose_mg_low', sround(low, 2));
  ctx.exportValue('dose_mg_high', sround(high, 2));
  ctx.exportValue('max_daily_mg', maxDaily);
  ctx.exportValue('units_low', sround(unitsLow, 2));
  ctx.exportValue('units_high', sround(unitsHigh, 2));

  var unit = product[1];
  ctx.addHtml('<p><strong>' + snum(low, 2) + '–' + snum(high, 2) + ' mg every 4 to 6 hours</strong> — '
    + snum(unitsLow, 2) + (unitsLow === unitsHigh ? '' : '–' + snum(unitsHigh, 2)) + ' ' + unit
    + (unitsHigh > 1 ? 's' : '') + ' of ' + product[2] + '. No more than ' + snum(maxDaily, 0)
    + ' mg in 24 hours.</p>');
  ctx.addHtml(stable(['Quantity', 'Value'], [
    ['Age band', age >= 12 ? '12 and over' : (age >= 6 ? '6 to 11' : '2 to 5')],
    ['Dose', snum(low, 2) + '–' + snum(high, 2) + ' mg'],
    ['Each ' + unit + ' contains', snum(per, 2) + ' mg'],
    ['So take', snum(unitsLow, 2) + (unitsLow === unitsHigh ? '' : '–' + snum(unitsHigh, 2)) + ' ' + unit + (unitsHigh > 1 ? 's' : '')],
    ['Maximum in 24 hours', snum(maxDaily, 0) + ' mg']
  ]));
  ctx.addHtml('<p class="calc-unmet">Diphenhydramine causes drowsiness and is not recommended for children '
    + 'under 6, and never for a child under 2 without a doctor. Do not combine with alcohol, sleeping aids '
    + 'or other antihistamines, and do not drive after taking it.</p>');
});
JS,
];
