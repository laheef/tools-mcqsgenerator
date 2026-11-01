<?php
/**
 * Baby percentile — where a baby sits on the growth charts.
 *
 * The harvested page took the age, weight, height, head circumference, sex and
 * the weights' units, and answered nothing: the six "percentile" boxes were
 * blank presentation fields and the surviving helpers expected a full growth
 * table that was never shipped with the page.
 *
 * This repair carries the shape of the WHO charts as medians and spreads at a
 * handful of ages, interpolates them for the age given, and turns the
 * measurement into a z-score and a percentile:
 *
 *   z = (measurement − median for that age) / spread for that age
 *   percentile = the share of babies below that z (normal curve)
 *
 * Everything is converted to centimetres and kilograms first, whatever units
 * the visitor used.
 */
return [
    'hideTexts' => true,
    'remove' => ['circumferencePercentile', 'circumferencePercentile2',
                 'heightPercentile', 'heightPercentile2',
                 'weightPercentile', 'weightPercentile2',
                 'lengthUnits', 'weightUnits', 'length_units_symbol', 'weight_units_symbol'],
    'vars' => [
        'weight_pct' => ['type' => 'dependent', 'rnd' => ['standard', '1']],
        'height_pct' => ['type' => 'dependent', 'rnd' => ['standard', '1']],
        'head_pct' => ['type' => 'dependent', 'rnd' => ['standard', '1']],
        'weight_z' => ['type' => 'dependent', 'rnd' => ['standard', '2']],
        'height_z' => ['type' => 'dependent', 'rnd' => ['standard', '2']],
        'head_z' => ['type' => 'dependent', 'rnd' => ['standard', '2']],
        'age_months' => ['type' => 'dependent', 'rnd' => ['standard', '1']],
    ],
    'groups' => [[
        'uid' => 'supp-percentile-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'weight_pct', 'vt' => 'dependent', 'l' => 'Weight percentile']]]],
            ['FR1', [[['t' => 'v', 'n' => 'height_pct', 'vt' => 'dependent', 'l' => 'Height percentile']]]],
            ['FR1', [[['t' => 'v', 'n' => 'head_pct', 'vt' => 'dependent', 'l' => 'Head circumference percentile']]]],
            ['FR1', [[['t' => 'v', 'n' => 'weight_z', 'vt' => 'dependent', 'l' => 'Weight z-score']]]],
            ['FR1', [[['t' => 'v', 'n' => 'height_z', 'vt' => 'dependent', 'l' => 'Height z-score']]]],
            ['FR1', [[['t' => 'v', 'n' => 'head_z', 'vt' => 'dependent', 'l' => 'Head circumference z-score']]]],
            ['FR1', [[['t' => 'v', 'n' => 'age_months', 'vt' => 'dependent', 'l' => 'Age used, in months (years × 12)']]]],
        ],
    ]],
    'js' => <<<'JS'
/*
 * The WHO growth standards, in months: for each age a median and the standard
 * deviation of the reference population. The chart is smooth between the points,
 * so the values are interpolated linearly for the age asked about.
 */
var BOYS = {
  weight: [[0, 3.3, 0.45], [1, 4.5, 0.56], [2, 5.6, 0.65], [3, 6.4, 0.72], [6, 7.9, 0.85],
           [9, 8.9, 0.95], [12, 9.6, 1.02], [18, 10.9, 1.15], [24, 12.2, 1.30],
           [36, 14.3, 1.55], [48, 16.3, 1.80], [60, 18.3, 2.10]],
  height: [[0, 49.9, 1.9], [1, 54.7, 2.0], [2, 58.4, 2.1], [3, 61.4, 2.2], [6, 67.6, 2.4],
           [9, 72.0, 2.6], [12, 75.7, 2.8], [18, 82.3, 3.0], [24, 87.1, 3.2],
           [36, 96.1, 3.6], [48, 103.3, 4.0], [60, 110.0, 4.4]],
  head:   [[0, 34.5, 1.3], [1, 37.3, 1.3], [2, 39.1, 1.3], [3, 40.5, 1.3], [6, 43.3, 1.4],
           [9, 45.0, 1.4], [12, 46.1, 1.4], [18, 47.4, 1.5], [24, 48.3, 1.5],
           [36, 49.5, 1.6], [48, 50.3, 1.7], [60, 51.0, 1.8]]
};
var GIRLS = {
  weight: [[0, 3.2, 0.42], [1, 4.2, 0.52], [2, 5.1, 0.60], [3, 5.8, 0.67], [6, 7.3, 0.80],
           [9, 8.2, 0.90], [12, 8.9, 1.00], [18, 10.2, 1.15], [24, 11.5, 1.30],
           [36, 13.9, 1.60], [48, 16.1, 1.90], [60, 18.2, 2.20]],
  height: [[0, 49.1, 1.9], [1, 53.7, 2.0], [2, 57.1, 2.1], [3, 59.8, 2.2], [6, 65.7, 2.4],
           [9, 70.1, 2.6], [12, 74.0, 2.8], [18, 80.7, 3.0], [24, 85.7, 3.2],
           [36, 95.1, 3.6], [48, 102.7, 4.0], [60, 109.4, 4.4]],
  head:   [[0, 33.9, 1.2], [1, 36.5, 1.2], [2, 38.3, 1.2], [3, 39.5, 1.3], [6, 42.2, 1.3],
           [9, 43.8, 1.3], [12, 44.9, 1.4], [18, 46.2, 1.4], [24, 47.2, 1.5],
           [36, 48.3, 1.6], [48, 49.1, 1.7], [60, 49.9, 1.8]]
};

/* the median and the spread at any age, interpolated between the table's points */
function at(series, months) {
  if (months <= series[0][0]) { return [series[0][1], series[0][2]]; }
  var last = series[series.length - 1];
  if (months >= last[0]) { return [last[1], last[2]]; }
  for (var i = 1; i < series.length; i++) {
    if (months <= series[i][0]) {
      var a = series[i - 1], b = series[i];
      var t = (months - a[0]) / (b[0] - a[0]);
      return [a[1] + (b[1] - a[1]) * t, a[2] + (b[2] - a[2]) * t];
    }
  }
  return [last[1], last[2]];
}

/* the share of a normal curve below z, to four decimal places */
function normalCdf(z) {
  /* Abramowitz and Stegun 7.1.26, good to 1.5e-7 */
  var t = 1 / (1 + 0.2316419 * Math.abs(z));
  var d = 0.3989423 * Math.exp(-z * z / 2);
  var p = d * t * (0.3193815 + t * (-0.3565638 + t * (1.781478 + t * (-1.821256 + t * 1.330274))));
  return z > 0 ? 1 - p : p;
}

function labelOf(name) {
  var sel = document.querySelector('select[data-var="' + name + '"]');
  if (sel) { return sel.options[sel.selectedIndex].text.replace(/\s+/g, ' ').trim(); }
  var checked = document.querySelector('input[type="radio"][name="' + name + '"]:checked');
  if (!checked) { return null; }
  var span = checked.parentNode && checked.parentNode.querySelector('span');
  return (span ? span.textContent : checked.parentNode.textContent || '').replace(/\s+/g, ' ').trim();
}

function num(name) {
  var el = document.querySelector('input[data-var="' + name + '"]');
  if (!el || String(el.value).trim() === '') { return null; }
  var n = Number(el.value);
  return isFinite(n) ? n : null;
}

/* centimetres from whatever the length picker says */
function toCm(value, unitText) {
  if (!unitText) { return value; }
  /* centimetres first: the word contains "meter" and would otherwise be multiplied by 100 */
  if (/centimet|^cm$/i.test(unitText)) { return value; }
  if (/inch/i.test(unitText)) { return value * 2.54; }
  if (/feet|foot/i.test(unitText)) { return value * 30.48; }
  if (/^(metre|meter)s?$/i.test(unitText.trim())) { return value * 100; }
  return value;
}

/* kilograms from whatever the weight picker says */
function toKg(value, unitText) {
  if (!unitText) { return value; }
  if (/gram/i.test(unitText)) { return value / 1000; }
  if (/ounce/i.test(unitText)) { return value / 35.274; }
  if (/pound/i.test(unitText)) { return value / 2.2046; }
  return value;
}

omni.onResult(['Age', 'Weight', 'Height', 'Sex', 'chart_type'], function (ctx, v) {
  var ageYears = num('Age');
  var weight = num('Weight');
  var height = num('Height');
  var head = num('head_circumference');

  if (ageYears === null || ageYears < 0) {
    ctx.addUnmetCondition('Enter the baby’s age in years (half a year can be written as 0.5).');
    return;
  }
  if (weight === null && height === null && head === null) {
    ctx.addUnmetCondition('Enter at least one measurement: weight, height or head circumference.');
    return;
  }

  var months = ageYears * 12;
  if (months > 60) {
    ctx.addUnmetCondition('These charts cover the first five years — the age given is '
      + snum(months, 0) + ' months.');
    return;
  }

  var girl = /girl/i.test(labelOf('Sex') || '');
  var table = girl ? GIRLS : BOYS;

  var unitNote = '';
  var weightUnit = labelOf('weight_units');
  var weightKg = weight === null ? null : toKg(weight, weightUnit);
  /*
   * A baby weighs a few kilos, so a "7.9" in the grams box is a misfiled kilogram,
   * not an eight-gram baby. The mismatch is corrected once and said out loud
   * rather than silently producing a percentile of zero.
   */
  if (weightKg !== null && weightUnit && /gram/i.test(weightUnit) && weightKg < 0.4 && weight > 4) {
    weightKg = weight;
    unitNote = ' The weight was read as kilograms: ' + snum(weight, 2)
      + ' kg, because the unit box was set to grams and no baby weighs ' + snum(weight, 2) + ' g.';
  }
  var heightCm = height === null ? null : toCm(height, labelOf('length_units'));
  var headCm = head === null ? null : toCm(head, labelOf('length_units'));

  /* implausible values are a typo, not a percentile */
  if (weightKg !== null && (weightKg <= 0.4 || weightKg > 40)) {
    ctx.addUnmetCondition('A weight of ' + snum(weight, 2) + ' is outside what a child under five can be — '
      + 'check the units.');
    return;
  }
  if (heightCm !== null && (heightCm <= 20 || heightCm > 140)) {
    ctx.addUnmetCondition('A height of ' + snum(height, 2) + ' is outside what a child under five can be — '
      + 'check the units.');
    return;
  }
  if (headCm !== null && (headCm <= 20 || headCm > 70)) {
    ctx.addUnmetCondition('A head circumference of ' + snum(head, 2) + ' is outside what a child under five '
      + 'can have — check the units.');
    return;
  }

  function measure(value, series) {
    if (value === null) { return null; }
    var ref = at(series, months);
    var z = (value - ref[0]) / ref[1];
    return { z: z, pct: normalCdf(z) * 100, median: ref[0], sd: ref[1] };
  }

  var w = measure(weightKg, table.weight);
  var h = measure(heightCm, table.height);
  var hc = measure(headCm, table.head);

  ctx.exportValue('age_months', sround(months, 1));
  ['weight', 'height', 'head'].forEach(function (key) {
    var m = key === 'weight' ? w : key === 'height' ? h : hc;
    var pctName = key + '_pct';
    var zName = key + '_z';
    ctx.exportValue(pctName, m === null ? '' : sround(m.pct, 1));
    ctx.exportValue(zName, m === null ? '' : sround(m.z, 2));
  });

  function phrase(m) {
    if (m === null) { return null; }
    var p = m.pct;
    var word = p < 1 ? 'far below average' : p < 3 ? 'well below average' : p < 15 ? 'below average'
      : p <= 85 ? 'around the middle' : p <= 97 ? 'above average' : p <= 99 ? 'well above average'
      : 'far above average';
    return 'percentile ' + snum(p, 1) + ' — ' + word;
  }

  var bits = [];
  if (w) { bits.push('weight ' + phrase(w)); }
  if (h) { bits.push('height ' + phrase(h)); }
  if (hc) { bits.push('head circumference ' + phrase(hc)); }

  ctx.addHtml('<p><strong>At ' + snum(months, 1) + ' months (' + (girl ? 'a girl' : 'a boy') + '): '
    + bits.join('; ') + '.</strong>' + unitNote + '</p>');

  var rows = [];
  if (w) {
    rows.push(['Weight', snum(weightKg, 2) + ' kg', snum(w.median, 1) + ' kg',
      snum(w.z, 2), snum(w.pct, 1) + ' %']);
  }
  if (h) {
    rows.push(['Height', snum(heightCm, 1) + ' cm', snum(h.median, 1) + ' cm',
      snum(h.z, 2), snum(h.pct, 1) + ' %']);
  }
  if (hc) {
    rows.push(['Head circumference', snum(headCm, 1) + ' cm', snum(hc.median, 1) + ' cm',
      snum(hc.z, 2), snum(hc.pct, 1) + ' %']);
  }
  ctx.addHtml(stable(['Measurement', 'Your baby', 'Average for the age', 'z-score', 'Percentile'], rows));

  /* the percentile band at this age, so the number has something to sit against */
  function band(series, unit) {
    var ref = at(series, months);
    return [
      ['3rd percentile', snum(ref[0] - 1.881 * ref[1], 1) + ' ' + unit],
      ['15th percentile', snum(ref[0] - 1.036 * ref[1], 1) + ' ' + unit],
      ['50th percentile (average)', snum(ref[0], 1) + ' ' + unit],
      ['85th percentile', snum(ref[0] + 1.036 * ref[1], 1) + ' ' + unit],
      ['97th percentile', snum(ref[0] + 1.881 * ref[1], 1) + ' ' + unit]
    ];
  }
  var chosen = labelOf('chart_type') || 'Weight chart';
  ctx.addHtml('<p>The bands the charts would draw for a ' + (girl ? 'girl' : 'boy') + ' of this age:</p>');
  if (/head/i.test(chosen)) {
    ctx.addHtml(stable(['Head circumference line', 'Value'], band(table.head, 'cm')));
  } else if (/height/i.test(chosen)) {
    ctx.addHtml(stable(['Height line', 'Value'], band(table.height, 'cm')));
  } else {
    ctx.addHtml(stable(['Weight line', 'Value'], band(table.weight, 'kg')));
  }
  ctx.addHtml('<p>All three measurements are shown whichever chart is selected — the chart picker only '
    + 'decides which set of lines is printed below. Percentiles are read from a normal curve, so the '
    + 'third percentile sits 1.88 standard deviations below the average and the ninety-seventh as far '
    + 'above it.</p>');

  ctx.addHtml('<p class="calc-unmet">A percentile is not a mark out of a hundred: it says what share of '
    + 'children the same age and sex weigh less. The 25th percentile means three in four children are '
    + 'heavier, and it is entirely normal — roughly one child in four is below it. What matters is the '
    + 'line, not the point: a baby who stays on the same percentile for months is growing well even if '
    + 'that percentile is low, and a baby who drops two bands is worth asking the doctor about even if '
    + 'the percentile is still average. Breastfed and formula-fed babies follow slightly different '
    + 'curves in the first year, and the values above are the WHO standards, which are the ones most '
    + 'countries use up to two years. This is an approximation of those charts built from their '
    + 'published medians and spreads, not a printed chart, so for anything that worries you use the '
    + 'baby’s own record book and ask a health visitor.</p>');
});
JS,
];
