<?php
/**
 * Correlation — Pearson, Spearman or Kendall, whichever the visitor asked for.
 *
 * The script here is a small statistics library: ranks for Spearman, concordant
 * and discordant pair counts for Kendall, means and sums for Pearson. It
 * published all of it through `ctx.exportValue` into names the definition does
 * not have, so none of it survived the press, and the page ended silent.
 *
 * The repair declares those names and shows the coefficient that matches the
 * method chosen, dropping the others: three r values side by side would suggest
 * the visitor asked for all three.
 */
require_once __DIR__ . '/_corr.php';

return [
    'hideTexts' => true,
    'outputs' => [
        'pearson'       => ['label' => 'Pearson r', 'precision' => '4'],
        'spearman'      => ['label' => 'Spearman ρ', 'precision' => '4'],
        'kendall'       => ['label' => 'Kendall τ', 'precision' => '4'],
        'n'             => ['label' => 'Points used', 'precision' => '0'],
        'xMean'         => ['label' => 'Mean of x', 'precision' => '4'],
        'yMean'         => ['label' => 'Mean of y', 'precision' => '4'],
        'sumX'          => ['label' => 'Σx²', 'precision' => '4'],
        'sumY'          => ['label' => 'Σy²', 'precision' => '4'],
        'sumXY'         => ['label' => 'Σxy', 'precision' => '4'],
        'pairs_concordant' => ['label' => 'Concordant pairs', 'precision' => '0'],
        'pairs_discordant' => ['label' => 'Discordant pairs', 'precision' => '0'],
    ],
    'js' => corr_js() . <<<'JS'

omni.onResult(['corr_method'], function (ctx, values) {
  var all = ['pearson', 'spearman', 'kendall', 'n', 'xMean', 'yMean',
             'sumX', 'sumY', 'sumXY', 'pairs_concordant', 'pairs_discordant'];
  var method = Number(values.corr_method || 0);
  if (!method) {
    all.forEach(function (n) { ctx.exportValue(n, null); });
    ctx.addUnmetCondition('Choose a coefficient: Pearson, Spearman or Kendall.');
    return;
  }
  var p = corrPairs();
  if (p.n < 3) {
    all.forEach(function (n) { ctx.exportValue(n, null); });
    ctx.addUnmetCondition('Enter at least three pairs — a correlation needs three points to mean anything.');
    return;
  }
  var m = corrMeans(p), sxx = 0, syy = 0, sxy = 0;
  for (var i = 0; i < p.n; i++) {
    sxx += p.xs[i] * p.xs[i];
    syy += p.ys[i] * p.ys[i];
    sxy += p.xs[i] * p.ys[i];
  }
  var r, label, name;
  if (method === 2) { r = corrSpearman(p); label = 'ρ'; name = 'spearman'; }
  else if (method === 3) { r = corrKendall(p).tau; label = 'τ'; name = 'kendall'; }
  else { r = corrPearson(p); label = 'r'; name = 'pearson'; }

  if (!isFinite(r)) {
    all.forEach(function (n) { ctx.exportValue(n, null); });
    ctx.addUnmetCondition('Every x or every y is the same number, so the coefficient is undefined.');
    return;
  }

  ['pearson', 'spearman', 'kendall'].forEach(function (n) {
    if (n !== name) { ctx.exportValue(n, null); }
  });
  ctx.exportValue(name, sround(r, 8));
  ctx.exportValue('n', p.n);
  ctx.exportValue('xMean', sround(m.x, 6));
  ctx.exportValue('yMean', sround(m.y, 6));
  ctx.exportValue('sumX', sround(sxx, 6));
  ctx.exportValue('sumY', sround(syy, 6));
  ctx.exportValue('sumXY', sround(sxy, 6));

  var extra = [];
  if (method === 3) {
    var kd = corrKendall(p);
    ctx.exportValue('pairs_concordant', kd.concordant);
    ctx.exportValue('pairs_discordant', kd.discordant);
    extra = [['Concordant pairs', String(kd.concordant)],
             ['Discordant pairs', String(kd.discordant)],
             ['Pairs tied in x only', String(kd.tiedX)],
             ['Pairs tied in y only', String(kd.tiedY)],
             ['τ-b', snum(kd.tau, 6)]];
  } else {
    ctx.exportValue('pairs_concordant', null);
    ctx.exportValue('pairs_discordant', null);
  }

  ctx.addHtml('<p><strong>' + label + ' = ' + snum(r, 4) + ' — ' + corrWord(r) + '.</strong></p>');
  var rows = [
    ['Method', method === 2 ? 'Spearman (ranks)' : method === 3 ? 'Kendall (pair concordance)' : 'Pearson'],
    ['Points used', String(p.n)],
    ['Mean of x', snum(m.x, 4)],
    ['Mean of y', snum(m.y, 4)],
    ['Σx²', snum(sxx, 4)],
    ['Σy²', snum(syy, 4)],
    ['Σxy', snum(sxy, 4)],
    ['Coefficient ' + label, snum(r, 6)]
  ].concat(extra);
  ctx.addHtml(stable(['Quantity', 'Value'], rows));
  ctx.addHtml('<p class="calc-note">Pearson measures a straight-line relationship between the values themselves; '
    + 'Spearman does the same after replacing every value by its rank, so it survives a curve that is monotone '
    + 'but not straight and moves far less when an outlier appears; Kendall counts pairs that agree in order '
    + 'against pairs that disagree, which is the most robust of the three and the slowest for long lists. '
    + 'All three run from −1 to 1 and none of them implies cause — only a shared tendency to rise or fall '
    + 'together. Pairs with a blank half are left out of the count.</p>');
});
JS,
];
