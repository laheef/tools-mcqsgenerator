<?php
/**
 * Student loan repayment — the standard plan, and what an extra payment saves.
 *
 * The page had no form. The repair takes the balance, the rate and the term the
 * servicer quotes and works out the fixed instalment:
 *
 *   monthly = P · i ÷ (1 − (1 + i)^−n)      i = rate ÷ 12, n = years × 12
 *
 * then runs the schedule again with any extra paid each month, so the months
 * saved and the interest avoided are real numbers rather than a rule of thumb.
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideTexts' => true,
    'vars' => [
        'loan_balance' => ['type' => 'numerical'],
        'loan_rate' => ['type' => 'numerical'],
        'loan_years' => ['type' => 'numerical'],
        'loan_extra' => ['type' => 'numerical'],
        'sloan_payment' => sup_dep('2'),
        'sloan_interest' => sup_dep('0'),
        'sloan_total' => sup_dep('0'),
        'sloan_months' => sup_dep('0'),
        'sloan_saved' => sup_dep('0'),
        'sloan_payoff' => ['type' => 'date'],
    ],
    'groups' => [
        sup_group('supp-sloan-loan', 'The loan', [
            sup_field(sup_num('loan_balance', 'Balance owed ($)')),
            sup_field(sup_num('loan_rate', 'Interest rate (% a year)')),
            sup_field(sup_num('loan_years', 'Term of the plan (years)')),
            sup_field(sup_num('loan_extra', 'Extra paid each month ($, 0 for none)')),
        ]),
        sup_group('supp-sloan-results', 'Results', [
            sup_field(sup_out('sloan_payment', 'Scheduled monthly payment ($)')),
            sup_field(sup_out('sloan_interest', 'Interest over the plan ($)')),
            sup_field(sup_out('sloan_total', 'Total paid over the plan ($)')),
            sup_field(sup_out('sloan_months', 'Months to clear the balance with the extra')),
            sup_field(sup_out('sloan_saved', 'Interest saved by the extra ($)')),
            sup_field(['t' => 'v', 'n' => 'sloan_payoff', 'vt' => 'date', 'l' => 'Date the balance clears']),
        ]),
    ],
    'js' => <<<'JS'
function num(name) {
  var el = document.querySelector('input[data-var="' + name + '"]');
  if (!el || String(el.value).trim() === '') { return null; }
  var n = Number(el.value);
  return isFinite(n) ? n : null;
}

function money(x) { return '$' + Math.round(x).toLocaleString(); }

/* total interest when paying `payment` a month, paying off exactly at the end */
function schedule(balance, monthlyRate, payment, cap) {
  var b = balance, interest = 0, months = 0;
  while (b > 0 && months < cap) {
    var due = b * monthlyRate;
    interest += due;
    b = b + due - payment;
    months++;
    if (b < 0) { b = 0; }
  }
  return { months: months, interest: interest, cleared: b <= 0 };
}

omni.onResult(['loan_balance', 'loan_rate', 'loan_years', 'loan_extra'], function (ctx, v) {
  var balance = num('loan_balance');
  var rate = num('loan_rate');
  var years = num('loan_years');
  var extra = num('loan_extra');

  if (balance === null || balance <= 0) {
    ctx.addUnmetCondition('Enter the balance you owe.');
    return;
  }
  if (rate === null || rate < 0) {
    ctx.addUnmetCondition('Enter the interest rate — 0 is allowed for a subsidised loan.');
    return;
  }
  if (years === null || years <= 0 || years > 40) {
    ctx.addUnmetCondition('Enter the term in years — the standard plan is 10.');
    return;
  }
  if (extra === null) { extra = 0; }
  if (extra < 0) {
    ctx.addUnmetCondition('An extra payment cannot be negative.');
    return;
  }

  var i = rate / 100 / 12;
  var n = Math.round(years * 12);
  var payment = i > 0 ? balance * i / (1 - Math.pow(1 + i, -n)) : balance / n;
  var baseTotal = payment * n;
  var baseInterest = baseTotal - balance;

  var withExtra = schedule(balance, i, payment + extra, 1200);
  /*
   * The first payment falls a month from today, so the walk starts there and
   * steps one calendar month at a time — more honest than multiplying by an
   * average month, which drifts about a week over a ten-year term.
   */
  var now = new Date();
  var pd = new Date(Date.UTC(now.getUTCFullYear(), now.getUTCMonth() + 1, 1));
  pd.setUTCMonth(pd.getUTCMonth() + withExtra.months);
  var payoff = pd.getTime();

  ctx.exportValue('sloan_payment', sround(payment, 2));
  ctx.exportValue('sloan_interest', Math.round(baseInterest));
  ctx.exportValue('sloan_total', Math.round(baseTotal));
  ctx.exportValue('sloan_months', withExtra.months);
  ctx.exportValue('sloan_saved', Math.round(baseInterest - withExtra.interest));
  ctx.exportValue('sloan_payoff', payoff);

  var saved = baseInterest - withExtra.interest;
  var monthsSaved = n - withExtra.months;

  ctx.addHtml('<p><strong>' + money(payment) + ' a month clears ' + money(balance) + ' at '
    + snum(rate, 2) + ' % in ' + n + ' payments, costing ' + money(baseInterest) + ' of interest. '
    + (extra > 0
        ? 'Paying ' + money(extra) + ' extra clears it in ' + withExtra.months + ' months — '
          + monthsSaved + ' sooner — and saves ' + money(Math.max(0, saved)) + '.'
        : 'Add an extra payment to see what it would save.')
    + '</strong></p>');

  ctx.addHtml(stable(['Item', 'Value'], [
    ['Balance', money(balance)],
    ['Rate', snum(rate, 2) + ' % a year (' + snum(i * 100, 4) + ' % a month)'],
    ['Term', years + ' years (' + n + ' payments)'],
    ['Scheduled payment', money(payment)],
    ['Interest over the plan', money(baseInterest)],
    ['Total paid', money(baseTotal)],
    ['Extra each month', money(extra)],
    ['Paid each month in all', money(payment + extra)],
    ['Months to clear with the extra', String(withExtra.months)],
    ['Interest with the extra', money(withExtra.interest)],
    ['Interest saved', money(Math.max(0, saved))],
    ['Months saved', String(Math.max(0, monthsSaved))],
    ['First payment interest share', snum(i * balance / payment * 100, 1) + ' % of the first payment']
  ]));

  /* the same balance at other extra payments */
  var rows = [0, 25, 50, 100, 200, 500].map(function (x) {
    var s = schedule(balance, i, payment + x, 1200);
    return [money(x), String(s.months), money(Math.max(0, baseInterest - s.interest))];
  });
  ctx.addHtml('<p>What different extra payments would do:</p>');
  ctx.addHtml(stable(['Extra a month', 'Months to clear', 'Interest saved'], rows));

  ctx.addHtml('<p class="calc-unmet">This is the standard fixed-payment plan: one instalment, every month, '
    + 'for the whole term. It is not an income-driven plan, which recalculates the payment from your income '
    + 'each year and can end in forgiveness rather than a zero balance, and it is not the graduated plan, '
    + 'whose payment steps up in stages. Interest is charged monthly on the balance at rate ÷ 12, which is '
    + 'how federal servicers do it, and the schedule assumes the first payment falls one month from today '
    + 'with no grace period and no fees. During the pandemic payment pause interest was set to zero and '
    + 'months of non-payment still counted towards forgiveness; a loan that sat through it behaves as '
    + 'though those months never happened, which is why the payoff date above is a projection from today '
    + 'rather than a fact about your account. Check the balance and rate on your servicer’s statement — '
    + 'the one on the plan page is often a year old.</p>');
});
JS,
];
