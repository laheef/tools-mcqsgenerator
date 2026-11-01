<?php
/**
 * Glycemic index — what the foods you picked add up to.
 *
 * The page rendered six drop-downs and a Calculate button that did nothing: the
 * record had the option lists but no script. The choices are already on the
 * page, so the repair adds only the answers:
 *
 *   average GI = mean of the foods chosen
 *   load       = GI × 50 ÷ 100, the load of 50 g of carbohydrate from that food
 *
 * The bands are the usual ones: 55 and under is low, 56–69 medium, 70 and over
 * high. Glucose is the reference at 100.
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideTexts' => true,
    'vars' => [
        'gi_average' => sup_dep('1'),
        'gi_lowest' => sup_dep('0'),
        'gi_highest' => sup_dep('0'),
        'gi_count' => sup_dep('0'),
        'gi_band' => sup_dep('0'),
        'gi_load' => sup_dep('1'),
        'gi_spread' => sup_dep('0'),
    ],
    'groups' => [
        sup_group('supp-gi-results', 'Results', [
            sup_field(sup_out('gi_average', 'Average glycemic index of your picks')),
            sup_field(sup_out('gi_lowest', 'Lowest of them')),
            sup_field(sup_out('gi_highest', 'Highest of them')),
            sup_field(sup_out('gi_spread', 'Spread between the two')),
            sup_field(sup_out('gi_count', 'Foods counted')),
            sup_field(sup_out('gi_load', 'Glycemic load of 50 g of carbohydrate')),
            sup_field(sup_out('gi_band', 'Band (1 = low, 2 = medium, 3 = high)')),
        ]),
    ],
    'js' => <<<'JS'
var CATS = [
  ['sweets_snacks_GI', 'Sweet treats and snacks'],
  ['dairy_GI', 'Dairy'],
  ['fruits_GI', 'Fruit'],
  ['cereal_GI', 'Cereal and grains'],
  ['vegetables_GI', 'Vegetables and pulses'],
  ['beverages_GI', 'Beverages']
];

function chosen(name) {
  var sel = document.querySelector('select[data-var="' + name + '"]');
  if (!sel || sel.selectedIndex < 0) { return null; }
  var opt = sel.options[sel.selectedIndex];
  if (!opt || !opt.value) { return null; }
  return (opt.text || '').replace(/\s+/g, ' ').trim();
}

omni.onResult([], function (ctx, v) {
  /* ctx.getInput gives the number behind the chosen option — the GI itself */
  var picks = [], missing = 0;
  for (var i = 0; i < CATS.length; i++) {
    var name = CATS[i][0];
    var gi = ctx.getInput(name);
    var label = chosen(name);
    if (label === null) { missing++; continue; }
    if (gi === null || gi === undefined || !isFinite(Number(gi))) { continue; }
    picks.push({ label: label, gi: Number(gi), group: CATS[i][1] });
  }

  if (picks.length === 0) {
    ctx.addUnmetCondition('Choose at least one food from the lists above.');
    return;
  }

  var total = 0, low = picks[0].gi, high = picks[0].gi;
  for (var j = 0; j < picks.length; j++) {
    total += picks[j].gi;
    if (picks[j].gi < low) { low = picks[j].gi; }
    if (picks[j].gi > high) { high = picks[j].gi; }
  }
  var average = total / picks.length;
  var band = average <= 55 ? 1 : (average <= 69 ? 2 : 3);
  var load = average * 50 / 100;

  ctx.exportValue('gi_average', sround(average, 1));
  ctx.exportValue('gi_lowest', low);
  ctx.exportValue('gi_highest', high);
  ctx.exportValue('gi_spread', high - low);
  ctx.exportValue('gi_count', picks.length);
  ctx.exportValue('gi_load', sround(load, 1));
  ctx.exportValue('gi_band', band);

  var bandName = band === 1 ? 'low' : (band === 2 ? 'medium' : 'high');

  ctx.addHtml('<p><strong>' + picks.length + ' food' + (picks.length === 1 ? '' : 's')
    + ' with an average glycemic index of ' + snum(average, 1) + ' — the ' + bandName
    + ' band — and a glycemic load of ' + snum(load, 1) + ' for 50 g of carbohydrate.</strong></p>');

  var rows = picks.map(function (p) {
    var b = p.gi <= 55 ? 'low' : (p.gi <= 69 ? 'medium' : 'high');
    return [p.label, p.group, String(p.gi), b];
  });
  ctx.addHtml('<p>What you picked:</p>');
  ctx.addHtml(stable(['Food', 'List', 'Glycemic index', 'Band'], rows));

  ctx.addHtml(stable(['Item', 'Value'], [
    ['Foods counted', String(picks.length)],
    ['Lists left unset', String(missing)],
    ['Average', snum(average, 1)],
    ['Lowest', String(low)],
    ['Highest', String(high)],
    ['Spread', String(high - low)],
    ['Glycemic load, 50 g of carbohydrate', snum(load, 1)],
    ['Band', bandName],
    ['Reference, glucose', '100'],
    ['Reference, white bread', 'about 75']
  ]));

  ctx.addHtml('<p class="calc-unmet">The glycemic index measures how fast 50 g of available carbohydrate '
    + 'from a food raises blood glucose compared with the same amount of glucose (or, in the older '
    + 'convention, white bread). It says nothing about how much carbohydrate a portion actually holds — a '
    + 'watermelon has a high index and a low load per slice, a bagel the opposite. That is what the load '
    + 'figure is for: GI × grams of carbohydrate ÷ 100, and 50 g is the standard test portion rather than '
    + 'anyone’s serving. Averaging the picks is a rough summary: eating three foods at once does not give '
    + 'you the average index, because the amount of each matters, and fat, fibre and protein alongside '
    + 'them slow absorption. Cooking changes the numbers too — pasta cooked a minute past al dente has a '
    + 'measurably higher index than the same pasta cooked to the minute. The values come from published '
    + 'tables and are typical figures, not measurements of the food in your kitchen.</p>');
});
JS,
];
