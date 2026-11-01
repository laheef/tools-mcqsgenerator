<?php
/**
 * Scatter plot — the line of best fit and how well the points follow it.
 *
 * The page carried thirty-seven number boxes (how many points, then x and y for
 * up to eighteen) and no group to place them in, so it rendered "nothing to
 * calculate here" — and even with the boxes visible it would have been a wall of
 * fields, most of them irrelevant. The repair asks for the number of points and
 * shows exactly that many x/y pairs, then fits the least-squares line:
 *
 *   slope     = Σ((x−x̄)(y−ȳ)) / Σ((x−x̄)²)
 *   intercept = ȳ − slope·x̄
 *   r         = Σ((x−x̄)(y−ȳ)) / √(Σ(x−x̄)² · Σ(y−ȳ)²)
 */
require_once __DIR__ . '/_builder.php';

/*
 * The page carries thirty x/y pairs, which is thirty boxes of nothing when the
 * visitor has five points. Eighteen are kept — the number the page's own
 * "how many points" box was built around — and the rest are removed rather than
 * left to clutter the form. Every remaining pair is hidden until the point count
 * reaches it.
 */
$drop = [];
for ($i = 19; $i <= 30; $i++) {
    $drop[] = 'x' . $i;
    $drop[] = 'y' . $i;
}
$showIf = [];
for ($i = 1; $i <= 18; $i++) {
    $showIf['x' . $i] = 'points >= ' . $i;
    $showIf['y' . $i] = 'points >= ' . $i;
}

$pairs = [];
for ($i = 1; $i <= 18; $i++) {
    $pairs[] = sup_row(
        sup_num('x' . $i, 'Point ' . $i . ' — x'),
        sup_num('y' . $i, 'Point ' . $i . ' — y')
    );
}

return [
    'hideTexts' => true,
    'remove' => $drop,
    'showIf' => $showIf,
    'vars' => [
        'fit_slope' => sup_dep('4'),
        'fit_intercept' => sup_dep('4'),
        'fit_r' => sup_dep('4'),
        'fit_r2' => sup_dep('4'),
        'fit_points' => sup_dep('0'),
        'fit_mean_x' => sup_dep('3'),
        'fit_mean_y' => sup_dep('3'),
    ],
    'groups' => [
        sup_group('supp-scatter-inputs', 'Your points', array_merge(
            [sup_field(sup_num('points', 'How many points? (2 to 18)'))],
            $pairs
        )),
        sup_group('supp-scatter-results', 'Results', [
            sup_field(sup_out('fit_slope', 'Slope of the line of best fit')),
            sup_field(sup_out('fit_intercept', 'Intercept of the line of best fit')),
            sup_field(sup_out('fit_r', 'Correlation coefficient r (−1 to 1)')),
            sup_field(sup_out('fit_r2', 'R² — the share of the variation the line explains')),
            sup_field(sup_out('fit_points', 'Points used')),
            sup_field(sup_out('fit_mean_x', 'Average x')),
            sup_field(sup_out('fit_mean_y', 'Average y')),
        ]),
    ],
    'js' => <<<'JS'
function num(name) {
  var el = document.querySelector('input[data-var="' + name + '"]');
  if (!el || String(el.value).trim() === '') { return null; }
  var n = Number(el.value);
  return isFinite(n) ? n : null;
}

omni.onResult(['points'], function (ctx, v) {
  var count = num('points');
  if (count === null) {
    ctx.addUnmetCondition('Enter how many points you have.');
    return;
  }
  if (count < 2) {
    ctx.addUnmetCondition('A regression needs at least two points.');
    return;
  }
  if (Math.round(count) !== count || count > 18) {
    ctx.addUnmetCondition('This page fits up to 18 points, as a whole number.');
    return;
  }

  var xs = [], ys = [];
  for (var i = 1; i <= count; i++) {
    var x = num('x' + i), y = num('y' + i);
    if (x === null || y === null) {
      ctx.addUnmetCondition('Fill in both x and y for point ' + i + '.');
      return;
    }
    xs.push(x);
    ys.push(y);
  }

  var n = xs.length;
  var mx = xs.reduce(function (a, b) { return a + b; }, 0) / n;
  var my = ys.reduce(function (a, b) { return a + b; }, 0) / n;

  var sxy = 0, sxx = 0, syy = 0;
  for (var k = 0; k < n; k++) {
    var dx = xs[k] - mx, dy = ys[k] - my;
    sxy += dx * dy;
    sxx += dx * dx;
    syy += dy * dy;
  }

  ctx.exportValue('fit_points', n);
  ctx.exportValue('fit_mean_x', sround(mx, 3));
  ctx.exportValue('fit_mean_y', sround(my, 3));

  if (sxx === 0 || syy === 0) {
    ctx.addUnmetCondition('Every point has the same '
      + (sxx === 0 ? 'x' : 'y') + ', so there is no line to fit — the correlation is undefined.');
    return;
  }

  var slope = sxy / sxx;
  var intercept = my - slope * mx;
  var r = sxy / Math.sqrt(sxx * syy);

  ctx.exportValue('fit_slope', sround(slope, 4));
  ctx.exportValue('fit_intercept', sround(intercept, 4));
  ctx.exportValue('fit_r', sround(r, 4));
  ctx.exportValue('fit_r2', sround(r * r, 4));

  var strength = Math.abs(r) >= 0.9 ? 'very strong' : Math.abs(r) >= 0.7 ? 'strong'
    : Math.abs(r) >= 0.5 ? 'moderate' : Math.abs(r) >= 0.3 ? 'weak' : 'very weak or none';
  var direction = r > 0 ? 'rises' : 'falls';

  ctx.addHtml('<p><strong>y = ' + snum(slope, 4) + 'x ' + (intercept < 0 ? '− ' : '+ ')
    + snum(Math.abs(intercept), 4) + ' — as x goes up by one, y ' + direction + ' by '
    + snum(Math.abs(slope), 4) + '. The correlation is r = ' + snum(r, 4) + ' (' + strength + ', '
    + (r > 0 ? 'positive' : 'negative') + '), so the line explains ' + snum(r * r * 100, 1)
    + ' % of the variation in y.</strong></p>');

  /* the residuals, so a bad fit is visible rather than asserted */
  var rows = xs.map(function (x, idx) {
    var predicted = slope * x + intercept;
    return [String(idx + 1), snum(x, 3), snum(ys[idx], 3), snum(predicted, 3),
      snum(ys[idx] - predicted, 3)];
  });
  ctx.addHtml(stable(['#', 'x', 'y', 'Line says', 'Residual'], rows));

  var residuals = xs.map(function (x, idx) { return ys[idx] - (slope * x + intercept); });
  var ss = residuals.reduce(function (a, b) { return a + b * b; }, 0);

  ctx.addHtml(stable(['Item', 'Value'], [
    ['Points', String(n)],
    ['Average x', snum(mx, 4)],
    ['Average y', snum(my, 4)],
    ['Slope', snum(slope, 4)],
    ['Intercept', snum(intercept, 4)],
    ['Correlation r', snum(r, 4)],
    ['R²', snum(r * r, 4)],
    ['Sum of squared residuals', snum(ss, 4)],
    ['The line passes through', '(x̄, ȳ) = (' + snum(mx, 3) + ', ' + snum(my, 3) + ')']
  ]));

  ctx.addHtml('<p class="calc-unmet">The line of least squares is the one that makes the sum of the squared '
    + 'vertical gaps as small as possible — it is the "closest" straight line in that one specific sense, and '
    + 'it always passes through the average point. A high R² is not proof that x causes y: two trends that both '
    + 'rise over time correlate almost perfectly with no connection between them, and a single outlier can lift '
    + 'r from 0.2 to 0.9. Read the residuals in the middle table; if they wander in a curve, a straight line is '
    + 'the wrong model however high r is. Extrapolating past the range of your x values is the other common '
    + 'mistake: the line has no idea what happens outside the data.</p>');
});
JS,
];
