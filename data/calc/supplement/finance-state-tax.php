<?php
/**
 * State tax — the top marginal rate, and what it would cost on your income.
 *
 * The page rendered one drop-down and a Calculate button that did nothing. The
 * repair adds the arithmetic that sits behind it. Each state's top marginal rate
 * for a single filer is carried in the table below, and the estimate is that rate
 * applied to the whole income:
 *
 *   tax = income × top rate
 *
 * For a flat-rate state that is close to the real figure (before deductions and
 * credits); for a progressive state it is a ceiling, because only the top slice
 * of the income is charged at the top rate. The page says so, twice.
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideTexts' => true,
    'vars' => [
        'income' => ['type' => 'numerical'],
        'st_rate' => sup_dep('2'),
        'st_tax' => sup_dep('0'),
        'st_share' => sup_dep('2'),
        'st_take_home' => sup_dep('0'),
        'st_rank' => sup_dep('0'),
        'st_taxes' => sup_dep('0'),
    ],
    'groups' => [
        sup_group('supp-state-income', 'Your income', [
            sup_field(sup_num('income', 'Taxable income for the year ($)')),
        ]),
        sup_group('supp-state-results', 'Results', [
            sup_field(sup_out('st_rate', 'Top marginal state rate (%)')),
            sup_field(sup_out('st_tax', 'State tax at that rate ($)')),
            sup_field(sup_out('st_share', 'Share of income (%)')),
            sup_field(sup_out('st_take_home', 'Left after state tax ($)')),
            sup_field(sup_out('st_rank', 'Rank of the rate among the 51 (1 = highest)')),
            sup_field(sup_out('st_taxes', 'State taxes wage income (1 = yes, 0 = no)')),
        ]),
    ],
    'js' => <<<'JS'
/* top marginal rate for a single filer, 2024 tax year; 0 = no tax on wages */
var STATES = {
  'Alabama': 5.00, 'Alaska': 0, 'Arizona': 2.50, 'Arkansas': 4.40, 'California': 13.30,
  'Colorado': 4.40, 'Connecticut': 6.99, 'Delaware': 6.60, 'District of Columbia': 10.75,
  'Florida': 0, 'Georgia': 5.39, 'Hawaii': 11.00, 'Idaho': 5.695, 'Illinois': 4.95,
  'Indiana': 3.05, 'Iowa': 5.70, 'Kansas': 5.70, 'Kentucky': 4.00, 'Louisiana': 4.25,
  'Maine': 7.15, 'Maryland': 5.75, 'Massachusetts': 5.00, 'Michigan': 4.25, 'Minnesota': 9.85,
  'Mississippi': 4.70, 'Missouri': 4.80, 'Montana': 5.90, 'Nebraska': 5.84, 'Nevada': 0,
  'New Hampshire': 0, 'New Jersey': 10.75, 'New Mexico': 5.90, 'New York': 10.90,
  'North Carolina': 4.50, 'North Dakota': 2.50, 'Ohio': 3.50, 'Oklahoma': 4.75, 'Oregon': 9.90,
  'Pennsylvania': 3.07, 'Rhode Island': 5.99, 'South Carolina': 6.20, 'South Dakota': 0,
  'Tennessee': 0, 'Texas': 0, 'Utah': 4.55, 'Vermont': 8.75, 'Virginia': 5.75,
  'Washington': 0, 'West Virginia': 4.82, 'Wisconsin': 7.65, 'Wyoming': 0
};

function num(name) {
  var el = document.querySelector('input[data-var="' + name + '"]');
  if (!el || String(el.value).trim() === '') { return null; }
  var n = Number(el.value);
  return isFinite(n) ? n : null;
}

function chosenState() {
  var sel = document.querySelector('select[data-var="state"]');
  if (!sel || sel.selectedIndex < 0) { return ''; }
  var opt = sel.options[sel.selectedIndex];
  if (!opt || !opt.value) { return ''; }
  return (opt.text || '').replace(/\s+/g, ' ').trim();
}

function money(x) { return '$' + Math.round(x).toLocaleString(); }

omni.onResult(['income'], function (ctx, v) {
  var income = num('income');
  var state = chosenState();

  if (income === null || income < 0) {
    ctx.addUnmetCondition('Enter your income for the year.');
    return;
  }
  if (state === '') {
    ctx.addUnmetCondition('Choose the state you live in.');
    return;
  }
  var rate = STATES[state];
  if (rate === undefined) {
    ctx.addUnmetCondition('That state is not in the table — pick one of the fifty.');
    return;
  }

  var tax = income * rate / 100;
  var names = Object.keys(STATES);
  var higher = 0;
  for (var i = 0; i < names.length; i++) {
    if (STATES[names[i]] > rate) { higher++; }
  }
  var rank = higher + 1;

  ctx.exportValue('st_rate', sround(rate, 2));
  ctx.exportValue('st_tax', Math.round(tax));
  ctx.exportValue('st_share', sround(income > 0 ? tax / income * 100 : 0, 2));
  ctx.exportValue('st_take_home', Math.round(income - tax));
  ctx.exportValue('st_rank', rank);
  ctx.exportValue('st_taxes', rate > 0 ? 1 : 0);

  if (rate === 0) {
    ctx.addHtml('<p><strong>' + state + ' does not tax wage income, so a salary of ' + money(income)
      + ' pays no state income tax. Federal tax, sales tax and property tax still apply.</strong></p>');
  } else {
    ctx.addHtml('<p><strong>' + state + '’s top rate is ' + snum(rate, 2) + ' %. Charged on the whole of '
      + money(income) + ' that would be ' + money(tax) + ' — ' + snum(tax / income * 100, 2)
      + ' % of the income. For a progressive state that figure is a ceiling, not a bill.</strong></p>');
  }

  ctx.addHtml(stable(['Item', 'Value'], [
    ['State', state],
    ['Income', money(income)],
    ['Top marginal rate', snum(rate, 2) + ' %'],
    ['Rank of that rate (1 = highest)', String(rank) + ' of ' + names.length],
    ['Tax if the whole income were taxed at the top rate', money(tax)],
    ['Share of income', (income > 0 ? snum(tax / income * 100, 2) : '0') + ' %'],
    ['Left after that', money(income - tax)],
    ['States that charge nothing', '9 (Alaska, Florida, Nevada, New Hampshire, South Dakota, '
      + 'Tennessee, Texas, Washington, Wyoming)'],
    ['Highest top rate', 'California, 13.30 %'],
    ['Lowest non-zero top rate', 'North Dakota, 2.50 %']
  ]));

  /* the same income in the states at either end of the table */
  var sorted = names.slice().sort(function (a, b) { return STATES[b] - STATES[a]; });
  var picks = sorted.slice(0, 3).concat([state], sorted.slice(-3));
  var rows = [], seen = {};
  for (var k = 0; k < picks.length; k++) {
    var nm = picks[k];
    if (seen[nm]) { continue; }
    seen[nm] = true;
    rows.push([nm, snum(STATES[nm], 2) + ' %', money(income * STATES[nm] / 100)]);
  }
  ctx.addHtml('<p>The highest, the lowest and yours, on ' + money(income) + ':</p>');
  ctx.addHtml(stable(['State', 'Top rate', 'At that rate'], rows));

  ctx.addHtml('<p class="calc-unmet">One number per state cannot be a tax return. The figure above is the '
    + 'top marginal rate — the rate charged on the last slice of a large income — applied to the whole '
    + 'income, which overstates the bill in every state that uses brackets: New York charges 10.9 % only '
    + 'above roughly $25 million of taxable income, and a New Yorker on $100,000 pays an effective rate '
    + 'nearer 5 %. Flat-rate states are much closer, but even they subtract a standard deduction and grant '
    + 'credits before the rate applies. Nine states charge nothing on wages, though New Hampshire taxed '
    + 'interest and dividends until 2025 and Washington has a capital-gains tax. Rates are set yearly by '
    + 'each legislature, so treat the table as the 2024 position and check the state’s own instructions '
    + 'before relying on a number. Local income taxes — city and county, which matter in New York City, '
    + 'Philadelphia and Ohio — are not in the table at all.</p>');
});
JS,
];
