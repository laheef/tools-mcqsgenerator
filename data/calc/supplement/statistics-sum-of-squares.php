<?php
/**
 * Sum of squares — the spread of a data set, Σ(x − x̄)².
 *
 * The page's script took all fifty slots from the `_ref` bag whether or not a
 * number had been typed into them, so a sample of three was read as a sample
 * of fifty and the answer was not the one the visitor asked for. The result was
 * published as `result`, a name the definition does not declare, and every one
 * of the fifty boxes was marked required, so filling three and pressing
 * Calculate answered "50 fields still need a value".
 *
 * The repair adds the values that were actually entered and reports the sum of
 * squared deviations (SS), the raw Σx², the mean and the count.
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideTexts' => true,
    'outputs' => [
        'result'     => ['label' => 'Sum of squares, Σ(x − x̄)²', 'precision' => '4'],
        'sum_sq_raw' => ['label' => 'Σx²', 'precision' => '4'],
        'mean'       => ['label' => 'Mean', 'precision' => '4'],
        'count'      => ['label' => 'Values used', 'precision' => '0'],
        'variance'   => ['label' => 'Population variance (SS / n)', 'precision' => '4'],
    ],
    'js' => <<<'JS'
omni.onResult([], function (ctx, values) {
  var sample = [];
  for (var i = 0; i <= 60; i++) {
    var raw = String(ctx.getRawInput('a' + i) || '').trim();
    if (raw === '') { continue; }
    var n = Number(raw.replace(/\s/g, '').replace(',', '.'));
    if (isFinite(n)) { sample.push(n); }
  }
  if (!sample.length) {
    ['result', 'sum_sq_raw', 'mean', 'count', 'variance'].forEach(function (n) { ctx.exportValue(n, null); });
    ctx.addUnmetCondition('Enter the values of your data set — one per box, and only the boxes you need.');
    return;
  }
  var n = sample.length;
  var sum = 0;
  sample.forEach(function (v) { sum += v; });
  var mean = sum / n;
  var ss = 0, raw2 = 0;
  sample.forEach(function (v) {
    ss += (v - mean) * (v - mean);
    raw2 += v * v;
  });

  ctx.exportValue('result', sround(ss, 6));
  ctx.exportValue('sum_sq_raw', sround(raw2, 6));
  ctx.exportValue('mean', sround(mean, 6));
  ctx.exportValue('count', n);
  ctx.exportValue('variance', sround(ss / n, 6));

  ctx.addHtml('<p><strong>SS = ' + snum(ss, 4) + '</strong> over ' + n + ' value' + (n === 1 ? '' : 's')
    + ' with a mean of ' + snum(mean, 4) + '.</p>');
  ctx.addHtml(stable(['Quantity', 'Value'], [
    ['Values used', String(n)],
    ['Sum', snum(sum, 4)],
    ['Mean', snum(mean, 4)],
    ['Σx² (squares of the values)', snum(raw2, 4)],
    ['Σ(x − x̄)² (sum of squares)', snum(ss, 4)],
    ['Population variance, SS / n', snum(ss / n, 4)],
    ['Sample variance, SS / (n − 1)', n > 1 ? snum(ss / (n - 1), 4) : 'undefined for one value']
  ]));
  ctx.addHtml('<p class="calc-note">Two quantities share the name. The sum of squares of a data set is '
    + 'Σ(x − x̄)² — how far the values sit from their own mean, squared and added — and it is the numerator of '
    + 'the variance. The sum of the squared values, Σx², is a different number and is what a regression needs. '
    + 'Both are reported so the label is never ambiguous. Dividing SS by n gives the population variance; by '
    + 'n − 1, the sample variance, which is larger and is the usual choice when the data are a sample.</p>');
});
JS,
];
