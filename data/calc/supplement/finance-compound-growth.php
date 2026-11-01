<?php
/**
 * Compound growth — the balance after compounding, and what the rate added.
 *
 * The page shipped 22 KB of script that walked a month-by-month table and then
 * published its answers under names the definition does not have — `finalBal`,
 * `balanceIntTotal_exp`, `initial_cg`, `dep_cg` … — every one of them a
 * *formatted string* ("5,000.00") rather than a number. Nothing landed in a box,
 * the panel stayed empty, and the sentence that would have said "The final
 * balance is ." lost its number in the harvest.
 *
 * Rather than reintroduce that whole table, the repair computes the same figure
 * from the definition that is on the page:
 *
 *     per-period rate  i = (1 + r/m)^(m/q) − 1        (continuous: e^(r/q) − 1)
 *     number of periods n = q × t
 *     balance          FV = P(1+i)^n + PMT·((1+i)^n − 1)/i · (1 + i·type)
 *     deposits growing at g per year replace PMT·(…)/i with the growing annuity
 *
 * and it reports the balance in today's money, the money you actually paid in,
 * and the difference — the interest — which is what the page was for.
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideTexts' => true,
    'outputs' => [
        'final_balance'    => ['label' => 'Final balance', 'precision' => '2'],
        'real_balance'     => ['label' => 'Final balance in today\'s money', 'precision' => '2'],
        'total_deposited'  => ['label' => 'Total paid in (initial + deposits)', 'precision' => '2'],
        'interest_earned'  => ['label' => 'Interest earned', 'precision' => '2'],
        'periods'          => ['label' => 'Number of compounding periods', 'precision' => '0'],
        'effective_rate'   => ['label' => 'Effective annual rate, %', 'precision' => '4'],
    ],
    'js' => <<<'JS'
/* The compound-frequency list is coded 21…33; the deposit list carries the
   number of deposits a year directly. */
var CG_COMPOUNDS = { 21: 1, 22: 2, 23: 4, 24: 6, 25: 12, 26: 26.0893, 27: 26,
                     28: 52.1786, 29: 52, 30: 365.25, 31: 360, 32: 365, 33: 0 };

omni.onResult(['InitialDep', 'r', 't'], function (ctx, values) {
  var P = Number(values.InitialDep || 0);
  var rate = Number(values.r || 0) / 100;
  var years = Number(values.t || 0);
  var PMT = Number(values.PeriodicDep || 0);
  var growth = Number(values.g || 0) / 100;
  var infl = Number(values.infl || 0) / 100;
  var when = Number(values.type || 0);            /* 0 end, 1 beginning */
  var code = Number(values.compound_frequency || 0);
  var q = Number(values.q || 0);

  var clear = function () {
    ['final_balance', 'real_balance', 'total_deposited', 'interest_earned',
     'periods', 'effective_rate'].forEach(function (n) { ctx.exportValue(n, null); });
  };

  if (!code) {
    clear();
    ctx.addUnmetCondition('Choose a compound frequency — yearly, monthly, daily or continuous.');
    return;
  }
  if (!q) {
    clear();
    ctx.addUnmetCondition('Choose how often you add to the balance ("Never" if you do not).');
    return;
  }
  if (!(years > 0)) {
    clear();
    ctx.addUnmetCondition('Enter a term in years — the balance is compounded over that time.');
    return;
  }
  if (q === 1000) { PMT = 0; }                    /* "Never": no deposits at all */

  var m = CG_COMPOUNDS[code];
  var continuous = code === 33 || m === 0;
  var i, effective;
  if (q === 1000) {
    /* no deposit schedule: compound and report over the whole term */
    q = m || 1;
  }
  if (continuous) {
    i = Math.exp(rate / q) - 1;
    effective = Math.exp(rate) - 1;
  } else {
    i = Math.pow(1 + rate / m, m / q) - 1;
    effective = Math.pow(1 + rate / m, m) - 1;
  }
  var n = Math.round(q * years);
  if (n < 1) {
    clear();
    ctx.addUnmetCondition('That term is shorter than one compounding period.');
    return;
  }

  var factor = Math.pow(1 + i, n);
  var principalPart = P * factor;
  var depositPart;
  var gp = q === 1000 || q === 0 ? 0 : growth / q;
  if (PMT === 0) {
    depositPart = 0;
  } else if (Math.abs(growth - (i * q)) < 1e-12 || Math.abs(gp - i) < 1e-12) {
    depositPart = PMT * n * Math.pow(1 + i, n - 1) * (1 + i * when);
  } else {
    depositPart = PMT * (factor - Math.pow(1 + gp, n)) / (i - gp) * (1 + i * when);
  }
  var total = principalPart + depositPart;
  var paidIn = P + PMT * n;
  var real = total / Math.pow(1 + infl, years);

  ctx.exportValue('final_balance', sround(total, 2));
  ctx.exportValue('real_balance', sround(real, 2));
  ctx.exportValue('total_deposited', sround(paidIn, 2));
  ctx.exportValue('interest_earned', sround(total - paidIn, 2));
  ctx.exportValue('periods', n);
  ctx.exportValue('effective_rate', sround(effective * 100, 4));

  ctx.addHtml('<p><strong>The balance reaches ' + snum(total, 2) + '</strong> after ' + snum(years, 4)
    + ' years — ' + snum(paidIn, 2) + ' paid in and ' + snum(total - paidIn, 2) + ' of interest.</p>');
  ctx.addHtml(stable(['Item', 'Value'], [
    ['Initial balance', snum(P, 2)],
    ['Deposit each period', snum(PMT, 2)],
    ['Periods', String(n)],
    ['Rate per period, %', snum(i * 100, 6)],
    ['Growth of the balance alone', snum(principalPart, 2)],
    ['Growth of the deposits', snum(depositPart, 2)],
    ['Final balance', snum(total, 2)],
    ['Total paid in', snum(paidIn, 2)],
    ['Interest earned', snum(total - paidIn, 2)],
    ['In today\'s money at ' + snum(infl * 100, 2) + '% inflation', snum(real, 2)],
    ['Effective annual rate, %', snum(effective * 100, 4)]
  ]));
  ctx.addHtml('<p class="calc-note">Compound growth multiplies the balance by the per-period rate once for '
    + 'each period, so the last period earns on the interest of every period before it — which is why the '
    + 'balance is not simply the rate times the years. A deposit made at the beginning of a period earns for '
    + 'that whole period, one made at the end earns for none of it; the choice is the "When" field. Deposit '
    + 'growth compounds the deposit itself, and inflation is divided out at the end to give the figure in '
    + 'today\'s money. Continuous compounding uses e^(r/q) per period rather than (1+r/m)^(m/q), and both give '
    + 'the same effective annual rate in the limit.</p>');
});
JS,
];
