<?php
/**
 * Tylenol dosage — how much acetaminophen is in the product you picked, and how
 * much of it a day allows.
 *
 * The harvested page asked which symptom you have and which box you are holding
 * and then computed nothing. The number that actually matters on a Tylenol
 * label is the acetaminophen in one dose unit, because that is what every other
 * product — cold remedies, night-time aids, prescription painkillers — is also
 * counting towards the same daily ceiling.
 *
 * The amounts below are the US Tylenol label figures. Formulations differ
 * between countries and change over time, so the label in your hand always wins.
 */
return [
    'hideTexts' => true,
    'vars' => [
        'per_dose_mg' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'units_per_dose' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'doses_a_day' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'daily_mg' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'night_aid' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
    ],
    'groups' => [[
        'uid' => 'supp-tylenol-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'per_dose_mg', 'vt' => 'dependent', 'l' => 'Acetaminophen in one tablet / caplet / dose (mg)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'units_per_dose', 'vt' => 'dependent', 'l' => 'Units in one dose']]]],
            ['FR1', [[['t' => 'v', 'n' => 'doses_a_day', 'vt' => 'dependent', 'l' => 'Doses the label allows in 24 hours']]]],
            ['FR1', [[['t' => 'v', 'n' => 'daily_mg', 'vt' => 'dependent', 'l' => 'Most acetaminophen that product can give you in 24 hours (mg)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'night_aid', 'vt' => 'dependent', 'l' => 'Contains a sleep-aid antihistamine (1 = yes)']]]],
        ],
    ]],
    'js' => <<<'JS'
/*
 * One row per option on the form, in the order the pickers list them.
 *   mg      acetaminophen per unit (tablet, caplet, or 15 mL of liquid)
 *   units   units the label calls a dose
 *   doses   doses the label allows in 24 hours
 *   other   the second active ingredient, when there is one
 *   night   the second ingredient is a sedating antihistamine
 */
var COLD = [
  { name: 'Cold + Flu Severe Day/Night',        mg: 325, units: 2, doses: 5, other: 'dextromethorphan, phenylephrine (day) / doxylamine (night)', night: 1 },
  { name: 'Cold + Flu Severe Caplets',          mg: 325, units: 2, doses: 5, other: 'dextromethorphan, phenylephrine', night: 0 },
  { name: 'Cold Max Daytime Caplets',           mg: 325, units: 2, doses: 5, other: 'dextromethorphan, phenylephrine', night: 0 },
  { name: 'Cold + Head Severe Caplets',         mg: 325, units: 2, doses: 5, other: 'dextromethorphan, phenylephrine', night: 0 },
  { name: 'Cold + Flu + Cough Nighttime',       mg: 325, units: 2, doses: 5, other: 'dextromethorphan, doxylamine', night: 1 },
  { name: 'Cold + Flu Severe Warming Honey Lemon Liquid', mg: 325, units: 1, doses: 6, other: 'dextromethorphan, phenylephrine (per 15 mL)', night: 0 },
  { name: 'Cold + Mucus Severe COOL BURST Liquid', mg: 325, units: 1, doses: 6, other: 'guaifenesin, phenylephrine (per 15 mL)', night: 0 },
  { name: 'Cold Max Daytime Citrus Burst Liquid', mg: 325, units: 1, doses: 6, other: 'dextromethorphan, phenylephrine (per 15 mL)', night: 0 }
];

var HEADACHE = [
  { name: 'Regular strength',              mg: 325, units: 2, doses: 5, other: '', night: 0 },
  { name: 'Regular strength liquid gels',  mg: 325, units: 2, doses: 5, other: '', night: 0 },
  { name: 'Extra strength',                mg: 500, units: 2, doses: 3, other: '', night: 0 },
  { name: 'Coated tablets',                mg: 500, units: 2, doses: 3, other: '', night: 0 },
  { name: 'Rapid release gels',            mg: 500, units: 2, doses: 3, other: '', night: 0 },
  { name: '8 hr arthritis',                mg: 650, units: 2, doses: 3, other: 'extended release', night: 0 },
  { name: '8 hr muscle aches & pain',      mg: 650, units: 2, doses: 3, other: 'extended release', night: 0 },
  { name: 'Dissolve packs',                mg: 500, units: 1, doses: 3, other: 'powder', night: 0 }
];

var SINUS = [
  { name: 'Sinus + Headache Daytime Caplets', mg: 325, units: 2, doses: 5, other: 'phenylephrine', night: 0 },
  { name: 'Sinus Severe Daytime Caplets',     mg: 325, units: 2, doses: 5, other: 'guaifenesin, phenylephrine', night: 0 }
];

var SLEEP = [
  { name: 'Simply Sleep Nighttime Sleep Aid', mg: 0,   units: 2, doses: 1, other: 'diphenhydramine 25 mg — no acetaminophen at all', night: 1 },
  { name: 'PM Extra Strength Caplets',        mg: 500, units: 2, doses: 3, other: 'diphenhydramine 25 mg', night: 1 },
  { name: 'PM Extra Strength Liquid',         mg: 500, units: 1, doses: 3, other: 'diphenhydramine 12.5 mg per 15 mL', night: 1 }
];

var LISTS = { 0: HEADACHE, 1: SINUS, 2: COLD, 3: SLEEP };
var PICKERS = { 0: 'headache_symptoms', 1: 'sinus_symptoms', 2: 'cold_symptoms', 3: 'sleep_symptoms' };
var USAGE = ['Headache and muscle pain', 'Sinus problems', 'Cold and flu', 'Sleep and pain'];

omni.onResult(['usage', 'headache_symptoms', 'sinus_symptoms', 'cold_symptoms', 'sleep_symptoms'],
  function (ctx, v) {
  var usage = Math.round(Number(v.usage));
  if (!isFinite(usage) || !LISTS[usage]) {
    ctx.addUnmetCondition('Choose what you are treating.');
    return;
  }

  /*
   * Which product is chosen. A long list renders as a drop-down and a short one
   * as a row of radio buttons, so the chosen option is found either way — and
   * the option ids are random, so the position is what identifies it.
   */
  var key = PICKERS[usage];
  var list = LISTS[usage];
  var index = -1;
  var sel = document.querySelector('select[data-var="' + key + '"]');
  if (sel) {
    index = sel.selectedIndex;
  } else {
    var radios = document.querySelectorAll('input[type="radio"][name="' + key + '"]');
    for (var i = 0; i < radios.length; i++) {
      if (radios[i].checked) { index = i; }
    }
  }
  if (index < 0 || index >= list.length) {
    ctx.addUnmetCondition('Choose the product you are holding.');
    return;
  }
  var product = list[index];

  var perDose = product.mg * product.units;
  var daily = product.mg * product.units * product.doses;

  ctx.exportValue('per_dose_mg', product.mg);
  ctx.exportValue('units_per_dose', product.units);
  ctx.exportValue('doses_a_day', product.doses);
  ctx.exportValue('daily_mg', daily);
  ctx.exportValue('night_aid', product.night);

  if (product.mg === 0) {
    ctx.addHtml('<p><strong>' + sesc(product.name) + ' contains no acetaminophen at all — it is '
      + 'diphenhydramine, a sedating antihistamine.</strong> That matters: because there is no '
      + 'acetaminophen in it, you can take a normal painkiller alongside it. It also means it will '
      + 'make you drowsy, so do not drive after taking it.</p>');
  } else {
    ctx.addHtml('<p><strong>' + sesc(product.name) + ': ' + product.mg + ' mg of acetaminophen per '
      + (product.units === 1 ? 'dose' : 'unit') + ', ' + product.units + ' '
      + (product.units === 1 ? 'dose' : 'units') + ' at a time, at most ' + product.doses + ' doses in '
      + '24 hours — ' + snum(daily, 0) + ' mg (' + snum(daily / 1000, 2) + ' g).</strong>'
      + (product.other ? ' It also contains ' + sesc(product.other)
        + ', so check nothing else you take has the same ingredient.' : '') + '</p>');
  }

  var rows = [
    ['Product', sesc(product.name)],
    ['Acetaminophen per unit', product.mg === 0 ? 'none' : product.mg + ' mg'],
    ['Units in a dose', String(product.units)],
    ['Doses per 24 hours', String(product.doses)],
    ['Most acetaminophen in 24 hours', product.mg === 0 ? '0 mg' : snum(daily, 0) + ' mg = ' + snum(daily / 1000, 2) + ' g'],
    ['Other active ingredient', product.other ? sesc(product.other) : 'none'],
    ['Time between doses', product.mg === 0 ? 'once, at bedtime'
      : (product.other === 'extended release' ? '8 hours'
        : (product.mg >= 500 ? '6 hours' : '4 to 6 hours'))]
  ];
  ctx.addHtml(stable(['Item', 'Value'], rows));

  /* every product in the same group, so the difference is visible */
  var mateRows = list.map(function (p, i) {
    var mark = p === product ? ' &larr; yours' : '';
    return [sesc(p.name) + mark, p.mg === 0 ? 'none' : p.mg + ' mg',
      p.units === 1 ? '1' : String(p.units),
      String(p.doses),
      p.mg === 0 ? '0 mg' : snum(p.mg * p.units * p.doses, 0) + ' mg'];
  });
  ctx.addHtml('<p>Every ' + USAGE[usage].toLowerCase() + ' product on this page, for comparison:</p>');
  ctx.addHtml(stable(['Product', 'Per unit', 'Units a dose', 'Doses a day', 'Daily maximum'], mateRows));

  /*
   * The ceiling is what most people get wrong: 4 000 mg a day is the absolute
   * maximum for a healthy adult, and the labels themselves stay under it.
   */
  var ceiling = 4000;
  if (product.mg > 0) {
    var room = ceiling - daily;
    ctx.addHtml('<p>The hard ceiling for a healthy adult is 4 000 mg (4 g) of acetaminophen in 24 hours. This '
      + 'product, used exactly as its label says, keeps you ' + snum(room, 0) + ' mg below it — '
      + 'but that margin disappears the moment a second product with acetaminophen in it is added. '
      + (product.night
          ? 'This one also contains a sedating antihistamine. '
          : '')
      + 'Read the "active ingredients" panel on every box, including cold and flu remedies, night-time aids, '
      + 'and prescription painkillers such as co-codamol or Vicodin.</p>');
  }

  ctx.addHtml('<p class="calc-unmet">Acetaminophen (paracetamol) overdose damages the liver and can do it '
    + 'without much warning. Do not take more than one product containing it at the same time, do not '
    + 'drink heavily while taking it, and ask a pharmacist before taking it if you have liver disease or '
    + 'weigh under 50 kg. For a child the dose is by weight, not by age, and children under 12 should not '
    + 'be given the adult "extra strength" products at all. If you think you have taken too much, call '
    + 'poison control straight away even if you feel fine. The figures above are the US Tylenol labels; '
    + 'formulations differ between countries and change over time, so the box in your hand is the '
    + 'authority.</p>');
});
JS,
];
