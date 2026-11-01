<?php
/**
 * Two linear equations in two unknowns.
 *
 * Cramer's rule: with determinant D = a₁b₂ − a₂b₁, the solution is
 * x = (c₁b₂ − c₂b₁)/D and y = (a₁c₂ − a₂c₁)/D. A zero determinant means the
 * lines are parallel or the same line, which is a different answer.
 */
return [
    'vars' => [
        'x' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
        'y' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
        'det' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'x', 'vt' => 'dependent', 'l' => 'x']]]],
            ['FR1', [[['t' => 'v', 'n' => 'y', 'vt' => 'dependent', 'l' => 'y']]]],
            ['FR1', [[['t' => 'v', 'n' => 'det', 'vt' => 'dependent', 'l' => 'Determinant']]]],
        ],
    ]],
    'js' => <<<'JS'
omni.onResult([], function (ctx, v) {
  var a1 = Number(v.a1), b1 = Number(v.b1), c1 = Number(v.c1);
  var a2 = Number(v.a2), b2 = Number(v.b2), c2 = Number(v.c2);
  var given = ['a1', 'b1', 'c1', 'a2', 'b2', 'c2'].filter(function (k) {
    return v[k] !== undefined && v[k] !== '' && isFinite(Number(v[k]));
  });
  if (given.length < 6) {
    ctx.addUnmetCondition('Enter all six coefficients — both equations need a, b and the constant.');
    return;
  }
  var det = a1 * b2 - a2 * b1;
  ctx.exportValue('det', sround(det, 6));
  if (Math.abs(det) < 1e-12) {
    /* parallel or identical: decide with the constant terms */
    var same = Math.abs(a1 * c2 - a2 * c1) < 1e-12 && Math.abs(b1 * c2 - b2 * c1) < 1e-12;
    ctx.addHtml('<p class="calc-unmet"><strong>'
      + (same ? 'The two equations describe the same line: infinitely many solutions.'
              : 'The two equations describe parallel lines: no solution.')
      + '</strong> The determinant is zero, so Cramer\u2019s rule cannot give one point.</p>');
    return;
  }
  var x = (c1 * b2 - c2 * b1) / det;
  var y = (a1 * c2 - a2 * c1) / det;
  ctx.exportValue('x', sround(x, 6));
  ctx.exportValue('y', sround(y, 6));
  ctx.addHtml('<p><strong>x = ' + snum(x, 6) + ', y = ' + snum(y, 6) + '.</strong> Both equations '
    + 'are satisfied: ' + snum(a1 * x + b1 * y, 4) + ' = ' + snum(c1, 4) + ' and '
    + snum(a2 * x + b2 * y, 4) + ' = ' + snum(c2, 4) + '.</p>');
});
JS,
];
