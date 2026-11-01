<?php
/**
 * Income tax Australia — resident rates, the low income offset and the levy.
 *
 * The page had no form. The repair walks the taxable income through the resident
 * scale that has applied since 1 July 2024, then applies the low income tax
 * offset and the Medicare levy:
 *
 *   0 – 18,200         nothing
 *   18,201 – 45,000    16c for every dollar over 18,200
 *   45,001 – 135,000   4,288 + 30c over 45,000
 *   135,001 – 190,000  31,288 + 37c over 135,000
 *   190,001 and up     51,638 + 45c over 190,000
 *
 * The offset is $700, fading by 5c a dollar past 37,500 and 1.5c a dollar past
 * 45,000. The levy is 2 %, shaded in over 26,000 to 32,574.
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideTexts' => true,
    'vars' => [
        'taxable_income' => ['type' => 'numerical'],
        'au_gross' => sup_dep('0'),
        'au_tax' => sup_dep('0'),
        'au_lito' => sup_dep('0'),
        'au_medicare' => sup_dep('0'),
        'au_total_tax' => sup_dep('0'),
        'au_net' => sup_dep('0'),
        'au_weekly' => sup_dep('2'),
        'au_effective' => sup_dep('2'),
        'au_marginal' => sup_dep('0'),
    ],
    'groups' => [
        sup_group('supp-au-tax-income', 'Your income', [
            sup_field(sup_num('taxable_income', 'Taxable income for the year (A$)')),
        ]),
        sup_group('supp-au-tax-results', 'Results', [
            sup_field(sup_out('au_gross', 'Income tax on the scale (A$)')),
            sup_field(sup_out('au_lito', 'Low income tax offset (A$)')),
            sup_field(sup_out('au_medicare', 'Medicare levy (A$)')),
            sup_field(sup_out('au_total_tax', 'Total tax and levy (A$)')),
            sup_field(sup_out('au_net', 'Take-home pay for the year (A$)')),
            sup_field(sup_out('au_weekly', 'Take-home pay a week (A$)')),
            sup_field(sup_out('au_effective', 'Effective tax rate (%)')),
            sup_field(sup_out('au_marginal', 'Marginal rate (% — the rate on the next dollar)')),
        ]),
    ],
    'js' => <<<'JS'
function num(name) {
  var el = document.querySelector('input[data-var="' + name + '"]');
  if (!el || String(el.value).trim() === '') { return null; }
  var n = Number(el.value);
  return isFinite(n) ? n : null;
}

function money(x) { return 'A$' + Math.round(x).toLocaleString(); }

function scaleTax(income) {
  if (income <= 18200) { return 0; }
  if (income <= 45000) { return (income - 18200) * 0.16; }
  if (income <= 135000) { return 4288 + (income - 45000) * 0.30; }
  if (income <= 190000) { return 31288 + (income - 135000) * 0.37; }
  return 51638 + (income - 190000) * 0.45;
}

function marginalRate(income) {
  if (income <= 18200) { return 0; }
  if (income <= 45000) { return 16; }
  if (income <= 135000) { return 30; }
  if (income <= 190000) { return 37; }
  return 45;
}

function lito(income) {
  if (income <= 37500) { return 700; }
  if (income <= 45000) { return 700 - (income - 37500) * 0.05; }
  if (income <= 66667) { return Math.max(0, 325 - (income - 45000) * 0.015); }
  return 0;
}

function medicare(income) {
  if (income <= 26000) { return 0; }
  if (income <= 32574) { return (income - 26000) * 0.10; }
  return income * 0.02;
}

omni.onResult(['taxable_income'], function (ctx, v) {
  var income = num('taxable_income');
  if (income === null || income < 0) {
    ctx.addUnmetCondition('Enter your taxable income for the year.');
    return;
  }

  var tax = scaleTax(income);
  var offset = Math.min(lito(income), tax);
  var levy = medicare(income);
  var total = tax - offset + levy;
  var net = income - total;
  var effective = income > 0 ? total / income * 100 : 0;

  ctx.exportValue('au_gross', Math.round(tax));
  ctx.exportValue('au_lito', Math.round(offset));
  ctx.exportValue('au_medicare', Math.round(levy));
  ctx.exportValue('au_total_tax', Math.round(total));
  ctx.exportValue('au_net', Math.round(net));
  ctx.exportValue('au_weekly', sround(net / 52, 2));
  ctx.exportValue('au_effective', sround(effective, 2));
  ctx.exportValue('au_marginal', marginalRate(income));

  ctx.addHtml('<p><strong>On ' + money(income) + ' the income tax is ' + money(tax) + ', less the '
    + money(offset) + ' low income offset, plus ' + money(levy) + ' of Medicare levy — '
    + money(total) + ' in all, leaving ' + money(net) + '.</strong></p>');

  /* the band the income falls in, with what the band itself costs */
  var band, bandTax;
  if (income <= 18200) { band = 'Tax-free threshold (0 – 18,200)'; bandTax = 0; }
  else if (income <= 45000) { band = '18,201 – 45,000 at 16 %'; bandTax = tax; }
  else if (income <= 135000) { band = '45,001 – 135,000 at 30 %'; bandTax = tax - 4288; }
  else if (income <= 190000) { band = '135,001 – 190,000 at 37 %'; bandTax = tax - 31288; }
  else { band = 'Over 190,000 at 45 %'; bandTax = tax - 51638; }

  ctx.addHtml(stable(['Item', 'Value'], [
    ['Taxable income', money(income)],
    ['Tax before offsets', money(tax)],
    ['Low income tax offset', '−' + money(offset)],
    ['Medicare levy', money(levy)],
    ['Total tax', money(total)],
    ['Take-home for the year', money(net)],
    ['Take-home a month', money(net / 12)],
    ['Take-home a fortnight', money(net / 26)],
    ['Take-home a week', money(net / 52)],
    ['Effective rate', snum(effective, 2) + ' %'],
    ['Marginal rate', marginalRate(income) + ' %'],
    ['Band you are in', band],
    ['Tax charged inside that band', money(bandTax)],
    ['Tax-free threshold', 'A$18,200']
  ]));

  /* the tax at round incomes either side, to show the shape of the scale */
  var rows = [0, 18200, 30000, 45000, 60000, 90000, 120000, 135000, 180000, 200000, 250000]
    .map(function (x) {
      var t = scaleTax(x);
      var o = Math.min(lito(x), t);
      var m = medicare(x);
      return [money(x), money(t), '−' + money(o), money(m), money(t - o + m)];
    });
  ctx.addHtml('<p>Resident scale at other incomes:</p>');
  ctx.addHtml(stable(['Taxable income', 'Tax', 'Offset', 'Levy', 'Total tax'], rows));

  ctx.addHtml('<p class="calc-unmet">These are the resident rates from 1 July 2024 and they assume the '
    + 'tax-free threshold is claimed in full and that the income is ordinary taxable income — salary, '
    + 'wages, interest — with no deductions to subtract first and no HELP, student or private health '
    + 'adjustments. Enter the income after deductions. The Medicare levy is the standard 2 %, shaded in '
    + 'between A$26,000 and A$32,574 for a single person with no dependants; the low income offset is the '
    + 'A$700 version, and it can only reduce tax to zero, never pay anything back. A foreign resident is '
    + 'taxed from the first dollar at 30 %, with no threshold, no offset and no levy — those figures are '
    + 'not this scale. The Medicare levy surcharge, if you have no private hospital cover and earn above '
    + 'the surcharge threshold, is a further 1 – 1.5 % and is not included.</p>');
});
JS,
];
