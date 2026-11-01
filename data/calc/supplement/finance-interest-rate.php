<?php
/**
 * Interest rate — what rate is hidden in a loan or a deposit.
 *
 * The harvested page carried thirteen kilobytes of helpers — an IRR bisection for
 * deposits, a payment solver for loans, an APR — and nothing called any of them,
 * while the ten boxes they should have filled were blank presentation fields.
 *
 * Both directions are solved here:
 *
 *   deposit   the balance grows from P₀ to FV over t years compounded m times a
 *             year, so the periodic rate is  i = (FV/P₀)^(1/(m·t)) − 1
 *   loan      a balance of P plus any rolled-in fees is repaid by n payments of
 *             A, so i solves  P = A · (1 − (1+i)^−n) / i  — found by bisection,
 *             because there is no closed form for i
 *
 * From the periodic rate the page reports the nominal rate (i × periods a year)
 * and the effective annual rate ((1+i)^periods − 1), which is the number that
 * makes two offers comparable.
 */
return [
    'hideTexts' => true,
    'remove' => ['additional_fees_loan', 'annual_nominal_interest_rate_deposit',
                 'annual_nominal_interest_rate_loan', 'annual_percentage_rate_loan',
                 'effective_annual_rate_deposit', 'effective_annual_rate_loan',
                 'isInterestRateDeposit', 'isInterestRateLoan', 'periodic_payment_loan',
                 'periodic_rate_deposit', 'periodic_rate_loan', 'total_interest_deposit',
                 'total_interest_loan', 'total_payments_loan'],
    'showIf' => [
        'loan_amount' => 'payment_subject_VS == 1',
        'periodic_payment' => 'payment_subject_VS == 1',
        'fee_prepaid' => 'payment_subject_VS == 1',
        'fee_loaned' => 'payment_subject_VS == 1',
        'payment_frequency_VS' => 'payment_subject_VS == 1',
        'initial_deposit' => 'payment_subject_VS == 2',
        'current_balance' => 'payment_subject_VS == 2',
        'compound_frequency_VS' => 'payment_subject_VS == 2',
    ],
    'vars' => [
        'periodic_rate' => ['type' => 'dependent', 'rnd' => ['standard', '4']],
        'nominal_rate' => ['type' => 'dependent', 'rnd' => ['standard', '4']],
        'effective_rate' => ['type' => 'dependent', 'rnd' => ['standard', '4']],
        'total_interest' => ['type' => 'dependent', 'rnd' => ['standard', '2']],
        'total_payments' => ['type' => 'dependent', 'rnd' => ['standard', '2']],
        'periods' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
    ],
    'groups' => [[
        'uid' => 'supp-rate-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'periodic_rate', 'vt' => 'dependent', 'l' => 'Rate for one period (%)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'nominal_rate', 'vt' => 'dependent', 'l' => 'Nominal annual rate — the headline rate (%)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'effective_rate', 'vt' => 'dependent', 'l' => 'Effective annual rate — the one to compare (%)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'total_interest', 'vt' => 'dependent', 'l' => 'Total interest over the term']]]],
            ['FR1', [[['t' => 'v', 'n' => 'total_payments', 'vt' => 'dependent', 'l' => 'Total paid over the term (loan only)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'periods', 'vt' => 'dependent', 'l' => 'Number of payments or compounding periods']]]],
        ],
    ]],
    'js' => <<<'JS'
/* periods per year for each frequency picker, read from the chosen label */
var FREQ_WORDS = [
  { test: /year/i, per: 1 },
  { test: /semi/i, per: 2 },
  { test: /quarter/i, per: 4 },
  { test: /month/i, per: 12 },
  { test: /bi-?week/i, per: 26.08875 },
  { test: /week/i, per: 52.1775 },
  { test: /daily/i, per: 365.242 },
  { test: /continuous/i, per: 0 }
];

function chosenLabel(name) {
  var sel = document.querySelector('select[data-var="' + name + '"]');
  if (sel && sel.selectedIndex >= 0) { return (sel.options[sel.selectedIndex].text || '').trim(); }
  var radios = document.querySelectorAll('input[type="radio"][name="' + name + '"]');
  for (var i = 0; i < radios.length; i++) {
    if (radios[i].checked) {
      var host = radios[i].closest('label') || radios[i].parentNode;
      return (host.innerText || '').trim();
    }
  }
  return '';
}

function perYear(name, fallback) {
  var text = chosenLabel(name);
  for (var i = 0; i < FREQ_WORDS.length; i++) {
    if (FREQ_WORDS[i].test.test(text)) { return FREQ_WORDS[i].per; }
  }
  return fallback;
}

/* the periodic rate that repays a balance of P with n payments of A */
function solveLoanRate(P, A, n) {
  if (P <= 0 || A <= 0 || n <= 0) { return null; }
  /* the payment must at least cover the interest, or no rate exists */
  var lo = -0.999, hi = 1.0;
  var f = function (i) {
    if (Math.abs(i) < 1e-12) { return P - A * n; }
    return P - A * (1 - Math.pow(1 + i, -n)) / i;
  };
  var flo = f(lo), fhi = f(hi);
  if (flo * fhi > 0) { return null; }
  for (var k = 0; k < 200; k++) {
    var mid = (lo + hi) / 2;
    var fm = f(mid);
    if (Math.abs(fm) < 1e-10) { return mid; }
    if (flo * fm <= 0) { hi = mid; fhi = fm; } else { lo = mid; flo = fm; }
  }
  return (lo + hi) / 2;
}

function money(x) {
  return snum(x, 2).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
}

/*
 * A hook only fires when every field it depends on is on the page, and half of
 * these fields are hidden by the other mode's choice — so the hook depends on
 * the two fields that are always there and reads the rest from the form.
 */
function inputNum(name, fallback) {
  var el = document.querySelector('input[data-var="' + name + '"]');
  if (!el) { return fallback; }
  var value = Number(el.value);
  return el.value !== '' && isFinite(value) ? value : fallback;
}

omni.onResult(['payment_subject_VS', 'payment_term'], function (ctx, v) {
  var mode = /deposit/i.test(chosenLabel('payment_subject_VS')) ? 'deposit' : 'loan';
  var term = inputNum('payment_term', NaN);
  if (!isFinite(term) || term <= 0) {
    ctx.addUnmetCondition('Enter the term in years.');
    return;
  }
  if (term > 60) {
    ctx.addUnmetCondition('A term of ' + snum(term, 0) + ' years is longer than this page covers (60).');
    return;
  }

  if (mode === 'deposit') {
    var start = inputNum('initial_deposit', NaN);
    var end = inputNum('current_balance', NaN);
    if (!isFinite(start) || start <= 0) {
      ctx.addUnmetCondition('Enter the amount you started with.');
      return;
    }
    if (!isFinite(end) || end <= 0) {
      ctx.addUnmetCondition('Enter the balance you have now.');
      return;
    }
    var m = perYear('compound_frequency_VS', 1);
    if (m === 0) {
      /* continuous compounding: FV = P·e^(rt) */
      var rCont = Math.log(end / start) / term;
      ctx.exportValue('periodic_rate', sround(rCont * 100, 4));
      ctx.exportValue('nominal_rate', sround(rCont * 100, 4));
      ctx.exportValue('effective_rate', sround((Math.exp(rCont) - 1) * 100, 4));
      ctx.exportValue('total_interest', sround(end - start, 2));
      ctx.exportValue('total_payments', 0);
      ctx.exportValue('periods', Math.round(term));
      ctx.addHtml('<p><strong>A deposit that grew from ' + money(start) + ' to ' + money(end) + ' in '
        + snum(term, 2) + ' years earned a continuous rate of ' + snum(rCont * 100, 4) + ' % a year, '
        + 'which is ' + snum((Math.exp(rCont) - 1) * 100, 4) + ' % as an effective annual rate.</strong></p>');
      ctx.addHtml('<p class="calc-unmet">Continuous compounding is the limit of compounding more and more '
        + 'often, so it is the highest effective rate for a given nominal one. Interest of ' + money(end - start)
        + ' on ' + money(start) + ' over ' + snum(term, 2) + ' years.</p>');
      return;
    }
    var nPeriods = m * term;
    var i = Math.pow(end / start, 1 / nPeriods) - 1;
    var nominal = i * m * 100;
    var effective = (Math.pow(1 + i, m) - 1) * 100;

    ctx.exportValue('periodic_rate', sround(i * 100, 4));
    ctx.exportValue('nominal_rate', sround(nominal, 4));
    ctx.exportValue('effective_rate', sround(effective, 4));
    ctx.exportValue('total_interest', sround(end - start, 2));
    ctx.exportValue('total_payments', 0);
    ctx.exportValue('periods', Math.round(nPeriods));

    ctx.addHtml('<p><strong>The rate is ' + snum(nominal, 4) + ' % a year nominal — '
      + snum(effective, 4) + ' % effective, once the compounding is taken into account.</strong> '
      + money(end - start) + ' of interest was earned on ' + money(start) + ' over ' + snum(term, 2)
      + ' years.</p>');

    var rows = [
      ['Starting amount', money(start)],
      ['Balance now', money(end)],
      ['Term', snum(term, 2) + ' years'],
      ['Compounding', chosenLabel('compound_frequency_VS')],
      ['Periods', snum(nPeriods, 2)],
      ['Rate per period', snum(i * 100, 4) + ' %'],
      ['Nominal annual rate', snum(nominal, 4) + ' %'],
      ['Effective annual rate', snum(effective, 4) + ' %'],
      ['Interest earned', money(end - start)]
    ];
    ctx.addHtml(stable(['Item', 'Value'], rows));

    /* the same money at other compounding frequencies, so the gap is visible */
    var freqRows = [[1, 'Yearly'], [2, 'Semi-annually'], [4, 'Quarterly'], [12, 'Monthly'],
                    [365.242, 'Daily']].map(function (f) {
      var per = Math.pow(1 + i, m / f[0]) - 1;
      return [f[1], snum(per * f[0] * 100, 4) + ' %', snum((Math.pow(1 + per, f[0]) - 1) * 100, 4) + ' %'];
    });
    ctx.addHtml('<p>The same return expressed at other compounding frequencies:</p>');
    ctx.addHtml(stable(['Compounded', 'Nominal', 'Effective'], freqRows));

    ctx.addHtml('<p class="calc-unmet">The nominal rate is what a bank advertises and the effective rate is '
      + 'what your money actually does — 5 % nominal compounded monthly is 5.116 % effective. The formula '
      + 'above assumes the interest stayed in the account and nothing was added or withdrawn; any deposit '
      + 'or withdrawal in the middle changes the answer and needs a money-weighted calculation instead '
      + '(that is what an IRR does). Tax on the interest is not included.</p>');
    return;
  }

  /* ---- loan ------------------------------------------------------------- */
  var principal = inputNum('loan_amount', NaN);
  var payment = inputNum('periodic_payment', NaN);
  if (!isFinite(principal) || principal <= 0) {
    ctx.addUnmetCondition('Enter the amount borrowed.');
    return;
  }
  if (!isFinite(payment) || payment <= 0) {
    ctx.addUnmetCondition('Enter the payment you make each period.');
    return;
  }
  var prepaid = inputNum('fee_prepaid', 0);
  var loaned = inputNum('fee_loaned', 0);
  var per = perYear('payment_frequency_VS', 12);
  if (per === 0) { per = 12; }
  var n = Math.round(per * term);
  if (n < 1) {
    ctx.addUnmetCondition('That term is shorter than one payment period.');
    return;
  }

  /* the balance that has to be repaid is the loan plus any fees rolled into it */
  var balance = principal + loaned;
  var iLoan = solveLoanRate(balance, payment, n);
  if (iLoan === null) {
    var totalIfNoInterest = principal / n;
    ctx.addUnmetCondition('A payment of ' + money(payment) + ' does not repay ' + money(balance) + ' in '
      + n + ' payments at any positive rate — the payment would have to be at least about '
      + money(totalIfNoInterest) + ' a period even with no interest at all.');
    return;
  }

  var nominalLoan = iLoan * per * 100;
  var effectiveLoan = (Math.pow(1 + iLoan, per) - 1) * 100;
  var totalPaid = payment * n;
  var totalInterest = totalPaid - balance;

  /* the APR folds the prepaid fees into the rate: the money you actually received */
  var aprRate = solveLoanRate(principal - prepaid, payment, n);
  var apr = aprRate === null ? nominalLoan : aprRate * per * 100;

  ctx.exportValue('periodic_rate', sround(iLoan * 100, 4));
  ctx.exportValue('nominal_rate', sround(nominalLoan, 4));
  ctx.exportValue('effective_rate', sround(effectiveLoan, 4));
  ctx.exportValue('total_interest', sround(totalInterest, 2));
  ctx.exportValue('total_payments', sround(totalPaid, 2));
  ctx.exportValue('periods', n);

  ctx.addHtml('<p><strong>Paying ' + money(payment) + ' ' + chosenLabel('payment_frequency_VS').toLowerCase()
    + ' for ' + snum(term, 2) + ' years on ' + money(balance) + ' works out at a nominal '
    + snum(nominalLoan, 4) + ' % a year — ' + snum(effectiveLoan, 4) + ' % effective.</strong> You pay '
    + money(totalPaid) + ' in total, of which ' + money(totalInterest) + ' is interest.</p>');

  var rows = [
    ['Amount borrowed', money(principal)],
    ['Fees rolled into the loan', money(loaned)],
    ['Balance being repaid', money(balance)],
    ['Prepaid fees', money(prepaid)],
    ['Payment', money(payment) + ' ' + chosenLabel('payment_frequency_VS').toLowerCase()],
    ['Payments', String(n)],
    ['Rate per payment period', snum(iLoan * 100, 4) + ' %'],
    ['Nominal annual rate', snum(nominalLoan, 4) + ' %'],
    ['Effective annual rate', snum(effectiveLoan, 4) + ' %'],
    ['APR, with the prepaid fee counted', snum(apr, 4) + ' %'],
    ['Total paid', money(totalPaid)],
    ['Total interest', money(totalInterest)]
  ];
  ctx.addHtml(stable(['Item', 'Value'], rows));

  ctx.addHtml('<p>The APR is higher than the nominal rate whenever there are prepaid fees, because you '
    + 'received ' + money(principal - prepaid) + ' and are paying back as if you had received '
    + money(principal) + '. That is exactly what the APR is for: it is the number that lets you compare '
    + 'two offers with different fees.</p>');

  ctx.addHtml('<p class="calc-unmet">The rate is solved, not assumed: no closed formula gives the interest '
    + 'rate from a payment schedule, so the page bisects until the present value of the payments equals '
    + 'the balance. Two things to keep in mind. First, the answer assumes every payment is made on time and '
    + 'the rate never changes — a variable-rate loan drifts. Second, the effective rate here compounds the '
    + 'periodic rate a whole number of times a year, which is right for a mortgage or a car loan and '
    + 'slightly generous for daily payments. Arrangement fees paid in cash, insurance sold with the loan '
    + 'and early-repayment charges are not included unless you type them into the fee boxes.</p>');
});
JS,
];
