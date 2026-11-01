<?php
/**
 * Savings plan — a target, a timetable and the deposit that fills it.
 *
 * The page's working lived in a helper that takes sixteen arguments, three of
 * which (`VarMode`, `VarPlan`, `VarRep`) are `dependent` rows the harvest never
 * filled — they are seeded with a zero and nothing ever computes them, so the
 * helper ran in "mode 0", returned nothing usable, and none of `finalBalance`,
 * `periodicDeposit` or `initialDeposit` appeared anywhere.
 *
 * A savings plan with no interest rate is arithmetic, so the repair does it here:
 *
 *     number of deposits  n  =  the planning period ÷ the deposit period
 *     fixed deposit          →  final balance = n × deposit (+ growth)
 *     given final balance    →  deposit      = (final balance − growth) ÷ n
 *
 * "Repeatedly increased by" raises the deposit by that amount every period, so
 * the k-th deposit is `deposit + k × increase` and n deposits total
 * `n × deposit + increase × n(n−1)/2`.
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideTexts' => true,
    'outputs' => [
        'finalBalance'     => ['label' => 'Final balance', 'precision' => '2'],
        'periodicDeposit'  => ['label' => 'Deposit in each period', 'precision' => '2'],
        'deposit_count'    => ['label' => 'Number of deposits', 'precision' => '0'],
        'total_deposited'  => ['label' => 'Total put aside', 'precision' => '2'],
        'plan_length'      => ['label' => 'Planning period, days', 'precision' => '0'],
    ],
    'js' => <<<'JS'
omni.onResult(['myPlan', 'Mode'], function (ctx, values) {
  var plan = Number(values.myPlan);          /* 1 daily … 4 monthly */
  var mode = Number(values.Mode);            /* 1 fixed/growing, 2 given balance */
  var days = Number(values.Days || 0), weeks = Number(values.Weeks || 0);
  var months = Number(values.Months || 0), years = Number(values.Years || 0);
  var target = Number(values.FinBal || 0), deposit = Number(values.PerDep || 0);
  var rise = Number(values.DepAdd || 0);

  if (!plan) {
    ctx.addUnmetCondition('Choose a savings plan: daily, weekly, bi-weekly or monthly.');
    return;
  }
  if (!mode) {
    ctx.addUnmetCondition('Choose how you want to plan: with a fixed deposit, or towards a given final balance.');
    return;
  }
  var totalDays = days + weeks * 7 + months * 30.4375 + years * 365.25;
  if (!(totalDays > 0)) {
    ctx.addUnmetCondition('Say how long you are planning for — days, weeks, months or years.');
    return;
  }
  var per = plan === 1 ? 1 : plan === 2 ? 7 : plan === 3 ? 14 : 30.4375;
  var n = Math.floor(totalDays / per);
  if (n < 1) {
    ctx.addUnmetCondition('That planning period is shorter than one deposit period.');
    return;
  }
  var growth = rise * n * (n - 1) / 2;
  var final, each;
  if (mode === 1) {
    if (!(deposit > 0)) {
      ctx.addUnmetCondition('Enter how much you are putting aside in each period.');
      return;
    }
    final = n * deposit + growth;
    each = deposit;
  } else {
    if (!(target > 0)) {
      ctx.addUnmetCondition('Enter the final balance you are aiming for.');
      return;
    }
    each = (target - growth) / n;
    if (!(each > 0)) {
      ctx.addUnmetCondition('The deposit growth alone overshoots that final balance — lower the increase or raise the target.');
      return;
    }
    final = target;
  }
  ctx.exportValue('finalBalance', sround(final, 2));
  ctx.exportValue('periodicDeposit', sround(each, 2));
  ctx.exportValue('deposit_count', n);
  ctx.exportValue('total_deposited', sround(n * each + growth, 2));
  ctx.exportValue('plan_length', Math.round(totalDays));

  var unit = plan === 1 ? 'day' : plan === 2 ? 'week' : plan === 3 ? 'two weeks' : 'month';
  ctx.addHtml('<p><strong>' + (mode === 1
    ? snum(each, 2) + ' every ' + unit + ' for ' + n + ' deposits comes to ' + snum(final, 2) + '.'
    : 'To have ' + snum(target, 2) + ' you need ' + snum(each, 2) + ' every ' + unit + ' for ' + n + ' deposits.')
    + '</strong></p>');
  ctx.addHtml(stable(['Item', 'Value'], [
    ['Planning period', Math.round(totalDays) + ' days'],
    ['Deposit period', 'every ' + unit],
    ['Number of deposits', String(n)],
    ['Deposit in the first period', snum(each, 2)],
    ['Deposit in the last period', snum(each + rise * (n - 1), 2)],
    ['Increase per period', snum(rise, 2)],
    ['Total put aside', snum(n * each + growth, 2)],
    ['Final balance', snum(final, 2)]
  ]));
  ctx.addHtml('<p class="calc-note">This is a plan, not a savings account: there is no interest rate on the page, '
    + 'so nothing here is compounded and the final balance is simply what you put in. The period you plan in '
    + '(daily, weekly, bi-weekly, monthly) decides how many deposits there are — a month counts as 30.4375 days, '
    + 'the average over the Gregorian year, and a part-period at the end is dropped because you cannot make '
    + 'half a deposit. "Repeatedly increased by" raises each deposit by that amount over the one before it.</p>');
});
JS,
];
