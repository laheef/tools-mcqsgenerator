<?php
/**
 * Pearson correlation — r, and what r means.
 *
 * The script computed everything: the coefficient, the number of points, both
 * means and the three sums. Then it published every one of them through
 * `ctx.exportValue` under a name the definition does not declare — `pearson`,
 * `n`, `xMean`, `sumXY` … — and a value exported into a name with no variable
 * behind it is computed and dropped. Calculate ended in silence.
 *
 * The repair declares the names the script already uses. The interpretation is
 * written here instead of being copied from the drop-down the script read it
 * from: that drop-down hands back an option *uid*, not the sentence, so the
 * page's own "interpretation_string" was a string of letters and digits.
 */
require_once __DIR__ . '/_corr.php';

return [
    'hideTexts' => true,
    'outputs' => [
        'pearson'       => ['label' => 'Pearson correlation coefficient r', 'precision' => '4'],
        'n'             => ['label' => 'Points used', 'precision' => '0'],
        'xMean'         => ['label' => 'Mean of x', 'precision' => '4'],
        'yMean'         => ['label' => 'Mean of y', 'precision' => '4'],
        'sumX'          => ['label' => 'Σx²', 'precision' => '4'],
        'sumY'          => ['label' => 'Σy²', 'precision' => '4'],
        'sumXY'         => ['label' => 'Σxy', 'precision' => '4'],
        'r_squared'     => ['label' => 'Coefficient of determination r²', 'precision' => '4'],
    ],
    'js' => corr_js() . <<<'JS'

omni.onResult([], function (ctx, values) {
  var p = corrPairs();
  if (p.n < 3) {
    ['pearson', 'n', 'xMean', 'yMean', 'sumX', 'sumY', 'sumXY', 'r_squared']
      .forEach(function (n) { ctx.exportValue(n, null); });
    ctx.addUnmetCondition('Enter at least three pairs — a correlation needs three points to mean anything.');
    return;
  }
  var r = corrPearson(p);
  if (!isFinite(r)) {
    ['pearson', 'r_squared'].forEach(function (n) { ctx.exportValue(n, null); });
    ctx.addUnmetCondition('Every x or every y is the same number, so one of the standard deviations is zero and r is undefined.');
    return;
  }
  var m = corrMeans(p), sxx = 0, syy = 0, sxy = 0;
  for (var i = 0; i < p.n; i++) {
    sxx += p.xs[i] * p.xs[i];
    syy += p.ys[i] * p.ys[i];
    sxy += p.xs[i] * p.ys[i];
  }
  ctx.exportValue('pearson', sround(r, 8));
  ctx.exportValue('n', p.n);
  ctx.exportValue('xMean', sround(m.x, 6));
  ctx.exportValue('yMean', sround(m.y, 6));
  ctx.exportValue('sumX', sround(sxx, 6));
  ctx.exportValue('sumY', sround(syy, 6));
  ctx.exportValue('sumXY', sround(sxy, 6));
  ctx.exportValue('r_squared', sround(r * r, 8));

  ctx.addHtml('<p><strong>r = ' + snum(r, 4) + ' — ' + corrWord(r) + '.</strong> '
    + snum(r * r * 100, 2) + '% of the variation in y is accounted for by a straight line in x.</p>');
  ctx.addHtml(stable(['Quantity', 'Value'], [
    ['Points used', String(p.n)],
    ['Mean of x', snum(m.x, 4)],
    ['Mean of y', snum(m.y, 4)],
    ['Σx²', snum(sxx, 4)],
    ['Σy²', snum(syy, 4)],
    ['Σxy', snum(sxy, 4)],
    ['r', snum(r, 6)],
    ['r²', snum(r * r, 6)]
  ]));
  ctx.addHtml('<p class="calc-note">r measures how close the points lie to a straight line, from −1 through 0 '
    + 'to 1; it says nothing about the slope, and a strong r does not mean x causes y. The formula divides the '
    + 'covariance by the product of the standard deviations, which is the same as '
    + '(Σxy − nx̄ȳ) / √((Σx² − nx̄²)(Σy² − nȳ²)). Pairs with a blank half are left out rather than counted as '
    + 'zero — a zero would drag the line towards the origin and invent a correlation that is not there.</p>');
});
JS,
];
