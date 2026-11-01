<?php
/**
 * The equation of the line through two points.
 *
 * In 2D that is a slope and an intercept (with the vertical line as its own
 * case). In 3D a single equation is not enough — the answer is the direction
 * vector and the symmetric form built from it.
 */
return [
    'vars' => [
        'line_slope' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
        'line_intercept' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
        'line_distance' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'line_slope', 'vt' => 'dependent', 'l' => 'Slope (2D) / dx (3D)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'line_intercept', 'vt' => 'dependent', 'l' => 'Intercept (2D)' ]]]],
            ['FR1', [[['t' => 'v', 'n' => 'line_distance', 'vt' => 'dependent',
                       'l' => 'Distance between the points']]]],
        ],
    ]],
    'showIf' => [
        'z1' => 'model == 3', 'z2' => 'model == 3',
    ],
    'js' => <<<'JS'
omni.onResult([], function (ctx, v) {
  var threeD = Number(v.model) === 3;
  var x1 = Number(v.x1), y1 = Number(v.y1), x2 = Number(v.x2), y2 = Number(v.y2);
  if ([x1, y1, x2, y2].some(function (n) { return !isFinite(n); })
      || v.x1 === '' || v.y1 === '' || v.x2 === '' || v.y2 === '') {
    ctx.addUnmetCondition('Enter both points: x₁, y₁, x₂ and y₂.');
    return;
  }
  var z1 = 0, z2 = 0;
  if (threeD) {
    z1 = Number(v.z1); z2 = Number(v.z2);
    if (v.z1 === '' || v.z2 === '' || !isFinite(z1) || !isFinite(z2)) {
      ctx.addUnmetCondition('In 3D both points need a z coordinate too.');
      return;
    }
  }

  var dx = x2 - x1, dy = y2 - y1, dz = z2 - z1;
  var distance = Math.sqrt(dx * dx + dy * dy + dz * dz);
  ctx.exportValue('line_distance', sround(distance, 6));

  if (!threeD) {
    ctx.exportValue('line_slope', sround(dy / dx === Infinity ? NaN : dy / dx, 6));
    if (Math.abs(dx) < 1e-12) {
      ctx.addHtml('<p><strong>The line is vertical:</strong> x = ' + snum(x1, 6)
        + '. A vertical line has no slope and no y-intercept.</p>');
      return;
    }
    var m = dy / dx;
    var b = y1 - m * x1;
    ctx.exportValue('line_slope', sround(m, 6));
    ctx.exportValue('line_intercept', sround(b, 6));
    ctx.addHtml('<p><strong>y = ' + snum(m, 6) + 'x ' + (b < 0 ? '− ' : '+ ') + snum(Math.abs(b), 6)
      + '</strong>, through (' + snum(x1, 6) + ', ' + snum(y1, 6) + ') and ('
      + snum(x2, 6) + ', ' + snum(y2, 6) + ').</p>');
    ctx.addHtml(stable(['Quantity', 'Working', 'Value'], [
      ['Slope', '(y₂ − y₁)/(x₂ − x₁)', snum(m, 6)],
      ['Intercept', 'y₁ − m·x₁', snum(b, 6)],
      ['Distance', '√(Δx² + Δy²)', snum(distance, 6)],
    ]));
    return;
  }

  ctx.exportValue('line_slope', sround(dx, 6));
  ctx.exportValue('line_intercept', sround(dy, 6));
  var parts = [];
  if (Math.abs(dx) > 1e-12) parts.push('(x − ' + snum(x1, 6) + ')/' + snum(dx, 6));
  if (Math.abs(dy) > 1e-12) parts.push('(y − ' + snum(y1, 6) + ')/' + snum(dy, 6));
  if (Math.abs(dz) > 1e-12) parts.push('(z − ' + snum(z1, 6) + ')/' + snum(dz, 6));
  ctx.addHtml('<p><strong>Direction (' + snum(dx, 6) + ', ' + snum(dy, 6) + ', ' + snum(dz, 6)
    + ')</strong> — symmetric form: ' + parts.join(' = ') + '</p>');
  ctx.addHtml(stable(['Quantity', 'Value'], [
    ['Δx, Δy, Δz', snum(dx, 6) + ', ' + snum(dy, 6) + ', ' + snum(dz, 6)],
    ['Distance', snum(distance, 6)],
    ['Direction cosines', snum(dx / distance, 6) + ', ' + snum(dy / distance, 6) + ', '
      + snum(dz / distance, 6)],
  ]));
});
JS,
];
