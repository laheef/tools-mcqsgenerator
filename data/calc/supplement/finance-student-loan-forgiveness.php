<?php
/**
 * Student loan forgiveness — how long an income-driven plan takes to clear the
 * balance, and what is left to forgive.
 *
 * The harvested page asked for income, filing status, whether you had a Pell
 * grant and the balance outstanding, then answered nothing at all. The rules
 * that answer it are the SAVE (income-driven) ones:
 *
 *   discretionary income = AGI − 225 % of the federal poverty guideline for the
 *                          household size
 *   monthly payment      = 5 % of discretionary income ÷ 12   (undergraduate)
 *                        = 10 %                                (any graduate loans)
 *   forgiveness          = after 120 payments when the original balance was
 *                          $12,000 or less, plus 12 payments for every $1,000
 *                          above that, and never longer than 20 years.
 *
 * The poverty guidelines used are the 2025 figures for the 48 contiguous states.
 */
return [
    'hideTexts' => true,
    /* the two harvested presentation boxes carried no label of their own */
    'remove' => ['debt10', 'debt20'],
    'vars' => [
        'monthly_payment' => ['type' => 'dependent', 'rnd' => ['standard', '2']],
        'forgiveness_months' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'total_paid' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'amount_forgiven' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'debt_after_10' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'debt_after_20' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
    ],
    'groups' => [[
        'uid' => 'supp-forgiveness-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'monthly_payment', 'vt' => 'dependent', 'l' => 'Monthly payment on an income-driven plan']]]],
            ['FR1', [[['t' => 'v', 'n' => 'forgiveness_months', 'vt' => 'dependent', 'l' => 'Payments before the rest is forgiven']]]],
            ['FR1', [[['t' => 'v', 'n' => 'total_paid', 'vt' => 'dependent', 'l' => 'Paid out of your own pocket over that time']]]],
            ['FR1', [[['t' => 'v', 'n' => 'amount_forgiven', 'vt' => 'dependent', 'l' => 'Amount forgiven at the end']]]],
            ['FR1', [[['t' => 'v', 'n' => 'debt_after_10', 'vt' => 'dependent', 'l' => 'Balance left after 10 years']]]],
            ['FR1', [[['t' => 'v', 'n' => 'debt_after_20', 'vt' => 'dependent', 'l' => 'Balance left after 20 years']]]],
        ],
    ]],
    'js' => <<<'JS'
/* 2025 federal poverty guidelines, 48 contiguous states, by household size */
var FPL = { 1: 15650, 2: 21150 };

omni.onResult(['annual_income', 'student_debt_outstanding', 'filing_status', 'pell_grant'],
  function (ctx, v) {
  var income = Number(v.annual_income);
  var debt = Number(v.student_debt_outstanding);
  if (!isFinite(income) || income < 0) {
    ctx.addUnmetCondition('Enter your annual income.');
    return;
  }
  if (!isFinite(debt) || debt <= 0) {
    ctx.addUnmetCondition('Enter the balance you still owe.');
    return;
  }
  if (debt > 1000000) {
    ctx.addUnmetCondition('That is ' + snum(debt, 0) + ' — check the figure (no thousands separators, please).');
    return;
  }
  if (income > 2000000) {
    ctx.addUnmetCondition('That income is outside the range this rule covers — check the figure.');
    return;
  }

  var married = Math.round(Number(v.filing_status)) === 1;
  var pell = String(v.pell_grant) === '1' || Number(v.pell_grant) === 1;
  var household = married ? 2 : 1;

  /* discretionary income: what is left above 225 % of the poverty guideline */
  var protectedIncome = 2.25 * FPL[household];
  var discretionary = Math.max(0, income - protectedIncome);

  /* SAVE charges 5 % of discretionary income for undergraduate loans; the older
     plans (and any graduate loans) charge 10 % */
  var pay5 = discretionary * 0.05 / 12;
  var pay10 = discretionary * 0.10 / 12;
  var payment = pay5;

  /*
   * How long forgiveness takes. The 12 000 rule is on the *original* principal;
   * the balance entered here is used as the best available stand-in.
   */
  var months = 120;
  if (debt > 12000) {
    months = 120 + Math.ceil((debt - 12000) / 1000) * 12;
  }
  months = Math.min(months, 240);

  /* a Pell grant earned at least 12 months of credit toward forgiveness */
  if (pell) { months = Math.max(120, months - 12); }

  var years = months / 12;
  var totalPaid = payment * months;
  var forgiven = Math.max(0, debt - totalPaid);

  /* the balance at the 10- and 20-year marks, interest ignored for simplicity */
  var at10 = Math.max(0, debt - payment * 120);
  var at20 = Math.max(0, debt - payment * 240);

  ctx.exportValue('monthly_payment', sround(payment, 2));
  ctx.exportValue('forgiveness_months', months);
  ctx.exportValue('total_paid', sround(totalPaid, 0));
  ctx.exportValue('amount_forgiven', sround(forgiven, 0));
  ctx.exportValue('debt_after_10', sround(at10, 0));
  ctx.exportValue('debt_after_20', sround(at20, 0));

  var money = function (x) { return '$' + snum(x, 0).replace(/\B(?=(\d{3})+(?!\d))/g, ','); };
  var date = new Date();
  date.setMonth(date.getMonth() + Math.round(months));
  var when = date.toLocaleDateString('en-GB', { month: 'long', year: 'numeric' });

  ctx.addHtml('<p><strong>On ' + money(payment) + ' a month, ' + snum(months, 0)
    + ' payments (' + snum(years, 1) + ' years, ending around ' + when + ') clear the rest: you pay '
    + money(totalPaid) + ' of the ' + money(debt) + ' and ' + money(forgiven) + ' is forgiven.</strong></p>');

  var rows = [
    ['Household size used', household + (married ? ' (married)' : ' (single)')],
    ['Income protected (225 % of the guideline)', money(protectedIncome)],
    ['Discretionary income', money(discretionary)],
    ['Monthly payment at 5 % (SAVE, undergraduate)', money(pay5)],
    ['Monthly payment at 10 % (older plans, graduate loans)', money(pay10)],
    ['Payments before forgiveness', snum(months, 0) + ' (' + snum(years, 1) + ' years)'],
    ['Total paid', money(totalPaid)],
    ['Forgiven at the end', money(forgiven)],
    ['Balance after 10 years', money(at10)],
    ['Balance after 20 years', money(at20)],
    ['Pell grant credit applied', pell ? 'yes — 12 months off the timeline' : 'no']
  ];
  ctx.addHtml(stable(['Item', 'Value'], rows));

  /* the same balance at a few incomes, so the shape of the rule is visible */
  var bands = [0.5, 0.75, 1, 1.25, 1.5].map(function (k) {
    var inc = Math.round(income * k);
    var disc = Math.max(0, inc - protectedIncome);
    var m = disc * 0.05 / 12;
    var cover = m * months;
    return [money(inc), money(m), money(cover), money(Math.max(0, debt - cover))];
  });
  ctx.addHtml('<p>What this plan would cost at other incomes, with the same balance:</p>');
  ctx.addHtml(stable(['Income', 'Monthly payment', 'Paid before forgiveness', 'Forgiven'], bands));

  var taxable = forgiven > 0
    ? 'Whether the forgiven amount is taxed depends on the programme: the federal exemption for '
      + 'income-driven repayment forgiveness ran to the end of 2025, Public Service Loan Forgiveness '
      + 'has never been taxed federally, and a handful of states tax discharged debt.'
    : 'Nothing is left to forgive at this payment level — the balance is clear before the plan ends.';
  ctx.addHtml('<p>' + taxable + '</p>');

  ctx.addHtml('<p class="calc-unmet">This is the SAVE and income-driven arithmetic, not an offer. '
    + 'Three things move the answer in real life: the poverty guideline is updated every January, each '
    + 'year\'s payment is recalculated from that year\'s income (so a raise shortens the timeline), and '
    + 'interest is charged on the balance while you pay — SAVE waives unpaid interest, older plans do not, '
    + 'which is why a balance can grow even while you are making every payment. Working for a qualifying '
    + 'public-service employer clears the balance after 120 payments whatever it is, and that route '
    + 'requires the right employer and the right plan from the first payment. Married filing separately '
    + 'can lower the payment; it usually raises the tax bill. Check your own numbers in the '
    + 'Loan Simulator on studentaid.gov before relying on any of this.</p>');
});
JS,
];
