<?php
/**
 * Standard form ↔ slope-intercept form.
 *
 * Ax + By + C = 0 solves to y = −(A/B)x − C/B, so the slope is −A/B and the
 * intercept −C/B; going the other way, y = mx + b is −mx + y − b = 0.
 */
return [
    'vars' => [
        'line_slope' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
        'line_intercept' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'line_slope', 'vt' => 'dependent', 'l' => 'Slope m']]]],
            ['FR1', [[['t' => 'v', 'n' => 'line_intercept', 'vt' => 'dependent', 'l' => 'Intercept b']]]],
        ],
    ]],
    'showIf' => [
        'coefficient_A' => 'calculation_mode == 1',
        'coefficient_B' => 'calculation_mode == 1',
        'coefficient_C' => 'calculation_mode == 1',
        'slope' => 'calculation_mode == 2',
        'intercept' => 'calculation_mode == 2',
    ],
    'js' => <<<'JS'
omni.onResult([], function (ctx, v) {
  var toSlope = Number(v.calculation_mode) === 1;

  if (toSlope) {
    var A = Number(v.coefficient_A), B = Number(v.coefficient_B), C = Number(v.coefficient_C);
    if ([A, B, C].some(function (x) { return !isFinite(x); })
        || v.coefficient_A === '' || v.coefficient_B === '' || v.coefficient_C === '') {
      ctx.addUnmetCondition('Enter A, B and C for Ax + By + C = 0.');
      return;
    }
    if (B === 0) {
      ctx.addUnmetCondition('B is zero, so this is the vertical line x = ' + snum(-C / A, 6)
        + ' — it has no slope and cannot be written as y = mx + b.');
      return;
    }
    var m = -A / B, b = -C / B;
    ctx.exportValue('line_slope', sround(m, 6));
    ctx.exportValue('line_intercept', sround(b, 6));
    ctx.exportValue('result_slope', sround(m, 6));
    ctx.exportValue('result_intercept', sround(b, 6));
    ctx.addHtml('<p><strong>' + line(A, B, C) + ' = 0 &nbsp;→&nbsp; y = ' + snum(m, 6) + 'x '
      + (b < 0 ? '− ' : '+ ') + snum(Math.abs(b), 6) + '</strong></p>');
    ctx.addHtml(stable(['Quantity', 'Working', 'Value'], [
      ['Slope', '−A/B = −(' + snum(A, 6) + ')/(' + snum(B, 6) + ')', snum(m, 6)],
      ['Intercept', '−C/B = −(' + snum(C, 6) + ')/(' + snum(B, 6) + ')', snum(b, 6)],
    ]));
    return;
  }

  var m2 = Number(v.slope), b2 = Number(v.intercept);
  if (v.slope === '' || v.intercept === '' || !isFinite(m2) || !isFinite(b2)) {
    ctx.addUnmetCondition('Enter the slope m and the intercept b.');
    return;
  }
  ctx.exportValue('line_slope', sround(m2, 6));
  ctx.exportValue('line_intercept', sround(b2, 6));
  ctx.exportValue('result_a', sround(-m2, 6));
  ctx.exportValue('result_b', 1);
  ctx.exportValue('result_c', sround(-b2, 6));
  ctx.addHtml('<p><strong>y = ' + snum(m2, 6) + 'x ' + (b2 < 0 ? '− ' : '+ ') + snum(Math.abs(b2), 6)
    + ' &nbsp;→&nbsp; ' + line(-m2, 1, -b2) + ' = 0</strong></p>');
  ctx.addHtml(stable(['Standard form', 'Value'], [
    ['A', snum(-m2, 6)],
    ['B', '1'],
    ['C', snum(-b2, 6)],
  ]));
});

function line(A, B, C) {
  var parts = [];
  if (Math.abs(A) > 1e-12) parts.push((A < 0 ? '−' : '') + (Math.abs(A - 1) < 1e-12 ? '' : snum(Math.abs(A), 6)) + 'x');
  if (Math.abs(B) > 1e-12) {
    var sign = parts.length ? (B < 0 ? ' − ' : ' + ') : (B < 0 ? '−' : '');
    parts.push(sign + (Math.abs(B - 1) < 1e-12 ? '' : snum(Math.abs(B), 6)) + 'y');
  }
  if (Math.abs(C) > 1e-12) {
    var sign2 = parts.length ? (C < 0 ? ' − ' : ' + ') : (C < 0 ? '−' : '');
    parts.push(sign2 + snum(Math.abs(C), 6));
  }
  return parts.join('') || '0';
}
JS,
];
