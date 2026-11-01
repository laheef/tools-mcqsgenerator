<?php
/**
 * Economic Injury Disaster Loan (EIDL) — the size of the loan and what it costs.
 *
 * The page had a heading and an empty group. The repair adds the two limits the
 * programme actually used, side by side, so the borrower can see which one binds:
 *
 *   payroll route  = 2.5 × average monthly payroll          (capped at $2,000,000)
 *   revenue route  = 2 × (gross receipts − cost of goods sold)  (capped at $2,000,000)
 *
 * The emergency advance is the smaller of $10,000 and $1,000 a employee. The
 * monthly payment is the ordinary amortising instalment at the loan's own rate.
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideTexts' => true,
    'vars' => [
        'monthly_payroll' => ['type' => 'numerical'],
        'gross_receipts' => ['type' => 'numerical'],
        'cogs' => ['type' => 'numerical'],
        'employees' => ['type' => 'numerical'],
        'rate' => ['type' => 'numerical'],
        'years' => ['type' => 'numerical'],
        'eidl_payroll_max' => sup_dep('0'),
        'eidl_revenue_max' => sup_dep('0'),
        'eidl_max' => sup_dep('0'),
        'eidl_advance' => sup_dep('0'),
        'eidl_monthly' => sup_dep('2'),
        'eidl_interest' => sup_dep('0'),
        'eidl_total' => sup_dep('0'),
        'eidl_binding' => sup_dep('0'),
    ],
    'groups' => [
        sup_group('supp-eidl-business', 'The business', [
            sup_field(sup_num('monthly_payroll', 'Average monthly payroll ($)')),
            sup_field(sup_num('gross_receipts', 'Gross receipts for the reference year ($)')),
            sup_field(sup_num('cogs', 'Cost of goods sold for that year ($, 0 if none)')),
            sup_field(sup_num('employees', 'Employees on the payroll')),
        ]),
        sup_group('supp-eidl-loan', 'The loan you are testing', [
            sup_field(sup_num('rate', 'Interest rate (% a year — 3.75 for most small businesses)')),
            sup_field(sup_num('years', 'Term in years (30 is the programme standard)')),
        ]),
        sup_group('supp-eidl-results', 'Results', [
            sup_field(sup_out('eidl_payroll_max', 'Limit by payroll (2.5 × monthly payroll)')),
            sup_field(sup_out('eidl_revenue_max', 'Limit by revenue (2 × receipts minus costs)')),
            sup_field(sup_out('eidl_max', 'Loan you can ask for')),
            sup_field(sup_out('eidl_binding', 'Which limit decided it (1 = payroll, 2 = revenue)')),
            sup_field(sup_out('eidl_advance', 'Emergency advance ($10,000 cap, $1,000 a employee)')),
            sup_field(sup_out('eidl_monthly', 'Monthly payment')),
            sup_field(sup_out('eidl_interest', 'Interest over the whole term')),
            sup_field(sup_out('eidl_total', 'Total repaid')),
        ]),
    ],
    'js' => <<<'JS'
var CAP = 2000000;

function num(name) {
  var el = document.querySelector('input[data-var="' + name + '"]');
  if (!el || String(el.value).trim() === '') { return null; }
  var n = Number(el.value);
  return isFinite(n) ? n : null;
}

function money(x) {
  return '$' + Math.round(x).toLocaleString();
}

omni.onResult(['monthly_payroll', 'gross_receipts', 'cogs', 'employees', 'rate', 'years'], function (ctx, v) {
  var payroll = num('monthly_payroll');
  var receipts = num('gross_receipts');
  var cogs = num('cogs');
  var employees = num('employees');
  var rate = num('rate');
  var years = num('years');

  if (payroll === null || payroll < 0) {
    ctx.addUnmetCondition('Enter the average monthly payroll.');
    return;
  }
  if (receipts === null || receipts < 0) {
    ctx.addUnmetCondition('Enter gross receipts for the reference year.');
    return;
  }
  if (cogs === null) { cogs = 0; }
  if (cogs < 0 || cogs > receipts) {
    ctx.addUnmetCondition('Cost of goods sold cannot be negative or greater than receipts.');
    return;
  }
  if (employees === null || employees < 0) {
    ctx.addUnmetCondition('Enter how many employees there are.');
    return;
  }
  if (rate === null || rate < 0) {
    ctx.addUnmetCondition('Enter the interest rate.');
    return;
  }
  if (years === null || years <= 0) {
    ctx.addUnmetCondition('Enter the term in years.');
    return;
  }

  var payrollMax = Math.min(CAP, 2.5 * payroll);
  var revenueMax = Math.min(CAP, 2 * (receipts - cogs));
  var max = Math.min(payrollMax, revenueMax);
  var binding = payrollMax <= revenueMax ? 1 : 2;
  var advance = Math.min(10000, 1000 * employees);

  var i = rate / 100 / 12;
  var n = Math.round(years * 12);
  var monthly = i > 0 ? max * i / (1 - Math.pow(1 + i, -n)) : max / n;
  var total = monthly * n;

  ctx.exportValue('eidl_payroll_max', Math.round(payrollMax));
  ctx.exportValue('eidl_revenue_max', Math.round(revenueMax));
  ctx.exportValue('eidl_max', Math.round(max));
  ctx.exportValue('eidl_binding', binding);
  ctx.exportValue('eidl_advance', Math.round(advance));
  ctx.exportValue('eidl_monthly', sround(monthly, 2));
  ctx.exportValue('eidl_interest', Math.round(total - max));
  ctx.exportValue('eidl_total', Math.round(total));

  var why = binding === 1
    ? 'The payroll route is the tighter one: 2.5 × ' + money(payroll) + ' = ' + money(2.5 * payroll)
    : 'The revenue route is the tighter one: 2 × (' + money(receipts) + ' − ' + money(cogs) + ') = '
      + money(2 * (receipts - cogs));

  ctx.addHtml('<p><strong>You could ask for ' + money(max) + ', repayable at ' + money(monthly)
    + ' a month for ' + n + ' months. ' + why + '.</strong></p>');

  ctx.addHtml(stable(['Item', 'Value'], [
    ['Average monthly payroll', money(payroll)],
    ['2.5 × monthly payroll', money(2.5 * payroll)],
    ['Gross receipts', money(receipts)],
    ['Cost of goods sold', money(cogs)],
    ['Gross profit', money(receipts - cogs)],
    ['2 × gross profit', money(2 * (receipts - cogs))],
    ['Statutory cap', money(CAP)],
    ['Limit by payroll', money(payrollMax)],
    ['Limit by revenue', money(revenueMax)],
    ['Loan you can ask for', money(max)],
    ['Employees', String(Math.round(employees))],
    ['Emergency advance ($1,000 a employee, $10,000 cap)', money(advance)],
    ['Interest rate', snum(rate, 2) + ' % a year'],
    ['Term', snum(years, 0) + ' years (' + n + ' payments)'],
    ['Monthly payment', money(monthly)],
    ['Total interest', money(total - max)],
    ['Total repaid', money(total)],
    ['Interest as a share of the loan', snum((total - max) / max * 100, 1) + ' %']
  ]));

  /* what the same loan looks like over other terms */
  var terms = [10, 15, 20, 30].map(function (y) {
    var k = y * 12;
    var m = i > 0 ? max * i / (1 - Math.pow(1 + i, -k)) : max / k;
    return [y + ' years', money(m), money(m * k - max), money(m * k)];
  });
  ctx.addHtml('<p>The same ' + money(max) + ' at ' + snum(rate, 2) + ' % over other terms:</p>');
  ctx.addHtml(stable(['Term', 'Monthly payment', 'Interest', 'Total repaid'], terms));

  ctx.addHtml('<p class="calc-unmet">The two limits are the ones the programme published: 2.5 × average '
    + 'monthly payroll, and 2 × gross receipts less cost of goods sold, both under a $2,000,000 ceiling, '
    + 'with the lower figure governing. Whether a particular business qualifies, and whether it is the '
    + 'payroll figure or the revenue figure that its paperwork supports, is a question for the lender — '
    + 'this is the arithmetic the form behind the application uses. The emergency advance is a grant, not '
    + 'part of the loan, and was only open while funds lasted. Interest accrues from the date of '
    + 'disbursement; the payment above assumes the first instalment falls a month after the money arrives '
    + 'and that every payment is made on time. A deferral, if one is granted, lowers nothing — it moves the '
    + 'same interest to the end.</p>');
});
JS,
];
