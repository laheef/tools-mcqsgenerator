<?php
/**
 * Critical values for the four distributions a test statistic is compared with.
 *
 * The CDFs are evaluated from the standard formulas — the error function for the
 * normal, the incomplete beta function for t and F, the incomplete gamma for
 * χ² — and each critical value is found by bisection on that CDF. Bisection is
 * used deliberately: it needs no derivative and it cannot run away, and forty
 * halvings give twelve significant figures on any of these tails.
 */
return [
    'hideTexts' => true,
    'vars' => [
        'crit_low' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
        'crit_high' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
        'crit_abs' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'crit_low', 'vt' => 'dependent', 'l' => 'Lower critical value']]]],
            ['FR1', [[['t' => 'v', 'n' => 'crit_high', 'vt' => 'dependent', 'l' => 'Upper critical value']]]],
            ['FR1', [[['t' => 'v', 'n' => 'crit_abs', 'vt' => 'dependent',
                       'l' => 'Distance from zero (the value you compare |statistic| with)']]]],
        ],
    ]],
    'showIf' => [
        'tdf' => 'which_test == 2', 'chidf' => 'which_test == 3',
        'Fdf1' => 'which_test == 4', 'Fdf2' => 'which_test == 4',
    ],
    'js' => <<<'JS'
/* ---- normal ------------------------------------------------------------- */
function erf(x) {
  var sign = x < 0 ? -1 : 1;
  x = Math.abs(x);
  var t = 1 / (1 + 0.5 * x);
  var y = t * Math.exp(-x * x - 1.26551223 + t * (1.00002368 + t * (0.37409196 +
    t * (0.09678418 + t * (-0.18628806 + t * (0.27886807 + t * (-1.13520398 +
    t * (1.48851587 + t * (-0.82215223 + t * 0.17087277)))))))));
  return sign * (1 - y);
}
function normCdf(x) { return 0.5 * (1 + erf(x / Math.SQRT2)); }

/* ---- incomplete beta (Numerical Recipes) -------------------------------- */
function betacf(a, b, x) {
  var MAXIT = 300, EPS = 3e-14, FPMIN = 1e-300;
  var qab = a + b, qap = a + 1, qam = a - 1;
  var c = 1, d = 1 - qab * x / qap;
  if (Math.abs(d) < FPMIN) d = FPMIN;
  d = 1 / d;
  var h = d;
  for (var m = 1; m <= MAXIT; m++) {
    var m2 = 2 * m;
    var aa = m * (b - m) * x / ((qam + m2) * (a + m2));
    d = 1 + aa * d; if (Math.abs(d) < FPMIN) d = FPMIN;
    c = 1 + aa / c; if (Math.abs(c) < FPMIN) c = FPMIN;
    d = 1 / d; h *= d * c;
    aa = -(a + m) * (qab + m) * x / ((a + m2) * (qap + m2));
    d = 1 + aa * d; if (Math.abs(d) < FPMIN) d = FPMIN;
    c = 1 + aa / c; if (Math.abs(c) < FPMIN) c = FPMIN;
    d = 1 / d;
    var del = d * c;
    h *= del;
    if (Math.abs(del - 1) < EPS) break;
  }
  return h;
}
function logGamma(x) {
  var c = [76.18009172947146, -86.50532032941677, 24.01409824083091,
           -1.231739572450155, 0.1208650973866179e-2, -0.5395239384953e-5];
  var y = x, tmp = x + 5.5;
  tmp -= (x + 0.5) * Math.log(tmp);
  var ser = 1.000000000190015;
  for (var j = 0; j < 6; j++) ser += c[j] / ++y;
  return -tmp + Math.log(2.5066282746310005 * ser / x);
}
function betai(a, b, x) {
  if (x <= 0) return 0;
  if (x >= 1) return 1;
  var bt = Math.exp(logGamma(a + b) - logGamma(a) - logGamma(b)
    + a * Math.log(x) + b * Math.log(1 - x));
  if (x < (a + 1) / (a + b + 2)) return bt * betacf(a, b, x) / a;
  return 1 - bt * betacf(b, a, 1 - x) / b;
}

/* ---- chi-square via the incomplete gamma --------------------------------- */
function gammp(a, x) {
  if (x <= 0) return 0;
  if (x < a + 1) {                        /* series */
    var ap = a, sum = 1 / a, del = sum;
    for (var n = 0; n < 300; n++) {
      ap += 1; del *= x / ap; sum += del;
      if (Math.abs(del) < Math.abs(sum) * 1e-15) break;
    }
    return sum * Math.exp(-x + a * Math.log(x) - logGamma(a));
  }
  /* continued fraction, then 1 − Q */
  var FPMIN = 1e-300, b = x + 1 - a, c = 1 / FPMIN, d = 1 / b, h = d;
  for (var i = 1; i <= 300; i++) {
    var an = -i * (i - a);
    b += 2;
    d = an * d + b; if (Math.abs(d) < FPMIN) d = FPMIN;
    c = b + an / c; if (Math.abs(c) < FPMIN) c = FPMIN;
    d = 1 / d;
    var del2 = d * c;
    h *= del2;
    if (Math.abs(del2 - 1) < 1e-15) break;
  }
  return 1 - Math.exp(-x + a * Math.log(x) - logGamma(a)) * h;
}

/* ---- the four CDFs ------------------------------------------------------- */
function cdfT(t, df) {
  if (t === 0) return 0.5;
  var x = df / (df + t * t);
  var tail = 0.5 * betai(df / 2, 0.5, x);
  return t > 0 ? 1 - tail : tail;
}
function cdfChi(x, df) { return gammp(df / 2, x / 2); }
function cdfF(x, d1, d2) {
  if (x <= 0) return 0;
  return betai(d1 / 2, d2 / 2, d1 * x / (d1 * x + d2));
}

/* smallest x with cdf(x) ≥ p, by bisection on a bracket that grows */
function invert(cdf, p, lo, hi) {
  while (cdf(hi) < p && hi < 1e9) hi *= 2;
  for (var i = 0; i < 220; i++) {
    var mid = (lo + hi) / 2;
    if (cdf(mid) < p) lo = mid; else hi = mid;
  }
  return (lo + hi) / 2;
}

omni.onResult([], function (ctx, v) {
  var test = Math.round(Number(v.which_test));
  var alpha = Number(v.alpha);
  var tails = Math.round(Number(v.alt));
  if (!isFinite(test)) { ctx.addUnmetCondition('Choose which distribution the test statistic follows.'); return; }
  if (v.alpha === '' || !isFinite(alpha) || alpha <= 0 || alpha >= 1) {
    ctx.addUnmetCondition('The significance level has to be between 0 and 1 — 0.05 for the usual 95 % test.');
    return;
  }
  var name, rows = [], low, high, note;
  /* a two-tailed test splits the significance level between the two tails */
  var tailA = tails === 0 ? alpha / 2 : alpha;

  if (test === 1) {
    name = 'Z (standard normal)';
    high = invert(normCdf, 1 - tailA, -12, 12);
    low = tails === 0 ? invert(normCdf, tailA, -12, 12) : (tails === -1 ? high : NaN);
    if (tails === 1) high = invert(normCdf, 1 - alpha, -12, 12), low = NaN;
    ctx.exportValue('crit_high', sround(high, 6));
    if (isFinite(low)) ctx.exportValue('crit_low', sround(low, 6));
    ctx.exportValue('crit_abs', sround(Math.abs(isFinite(low) ? low : high), 6));
    note = 'z = ' + snum(Math.abs(isFinite(low) ? low : high), 6) + ' cuts off '
      + snum(tails === 0 ? alpha / 2 : alpha, 4) + ' of the distribution in each tail you use.';
  } else if (test === 2) {
    var df = Number(v.tdf);
    if (v.tdf === '' || !isFinite(df) || df < 1) {
      ctx.addUnmetCondition('Enter the degrees of freedom (a whole number, at least 1).');
      return;
    }
    df = Math.round(df);
    name = 't-Student with ' + df + ' degrees of freedom';
    high = invert(function (x) { return cdfT(x, df); }, 1 - tailA, -200, 200);
    low = tails === 0 ? invert(function (x) { return cdfT(x, df); }, tailA, -200, 200)
        : (tails === -1 ? high : NaN);
    if (tails === 1) high = invert(function (x) { return cdfT(x, df); }, 1 - alpha, -200, 200), low = NaN;
    ctx.exportValue('crit_high', sround(high, 6));
    if (isFinite(low)) ctx.exportValue('crit_low', sround(low, 6));
    ctx.exportValue('crit_abs', sround(Math.abs(isFinite(low) ? low : high), 6));
    note = 'The t distribution is symmetric, so the two cut-offs are ±t.';
  } else if (test === 3) {
    var cdfree = Number(v.chidf);
    if (v.chidf === '' || !isFinite(cdfree) || cdfree < 1) {
      ctx.addUnmetCondition('Enter the degrees of freedom for the χ² test.');
      return;
    }
    cdfree = Math.round(cdfree);
    name = 'χ² with ' + cdfree + ' degrees of freedom';
    var chiP = function (x) { return cdfChi(x, cdfree); };
    if (tails === -1) {
      low = invert(chiP, tailA, 0, 1e4);
      ctx.exportValue('crit_low', sround(low, 6));
      ctx.exportValue('crit_abs', sround(low, 6));
    } else if (tails === 0) {
      high = invert(chiP, 1 - tailA, 0, 1e4);
      low = invert(chiP, tailA, 0, 1e4);
      ctx.exportValue('crit_high', sround(high, 6));
      ctx.exportValue('crit_low', sround(low, 6));
      ctx.exportValue('crit_abs', sround(high, 6));
    } else {
      high = invert(chiP, 1 - alpha, 0, 1e4);
      ctx.exportValue('crit_high', sround(high, 6));
      ctx.exportValue('crit_abs', sround(high, 6));
    }
    note = 'χ² is not symmetric and never negative, so the tail you pick decides the cut-off.';
  } else {
    var d1 = Number(v.Fdf1), d2 = Number(v.Fdf2);
    if (v.Fdf1 === '' || v.Fdf2 === '' || !isFinite(d1) || !isFinite(d2) || d1 < 1 || d2 < 1) {
      ctx.addUnmetCondition('Enter both degrees of freedom for the F test.');
      return;
    }
    d1 = Math.round(d1); d2 = Math.round(d2);
    name = 'F with (' + d1 + ', ' + d2 + ') degrees of freedom';
    var fP = function (x) { return cdfF(x, d1, d2); };
    if (tails === -1) {
      low = invert(fP, tailA, 0, 1e6);
      ctx.exportValue('crit_low', sround(low, 6));
      ctx.exportValue('crit_abs', sround(low, 6));
    } else if (tails === 0) {
      high = invert(fP, 1 - tailA, 0, 1e6);
      low = invert(fP, tailA, 0, 1e6);
      ctx.exportValue('crit_high', sround(high, 6));
      ctx.exportValue('crit_low', sround(low, 6));
      ctx.exportValue('crit_abs', sround(high, 6));
    } else {
      high = invert(fP, 1 - alpha, 0, 1e6);
      ctx.exportValue('crit_high', sround(high, 6));
      ctx.exportValue('crit_abs', sround(high, 6));
    }
    note = 'An F statistic is compared with the upper cut-off; the lower one is the mirror image through 1/F.';
  }

  var tailName = tails === 0 ? 'two-tailed' : (tails === 1 ? 'right-tailed' : 'left-tailed');
  ctx.addHtml('<p><strong>' + name + ', α = ' + snum(alpha, 4) + ' (' + tailName + '): critical value '
    + snum(Math.abs(isFinite(low) ? low : high), 6) + '</strong>' + (tails === 0 ? ' on both sides' : '')
    + '.</p>');
  rows.push(['Distribution', name]);
  rows.push(['Significance level', snum(alpha, 4)]);
  if (isFinite(low)) rows.push(['Lower critical value', snum(low, 6)]);
  if (isFinite(high)) rows.push(['Upper critical value', snum(high, 6)]);
  ctx.addHtml(stable(['Quantity', 'Value'], rows));
  ctx.addHtml('<p class="calc-unmet">' + note + ' Reject the null hypothesis when the statistic falls beyond '
    + 'the critical value' + (tails === 0 ? ' in either direction' : '') + '.</p>');
});
JS,
];
