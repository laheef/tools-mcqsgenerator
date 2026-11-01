<?php
/**
 * Two or three linear equations in as many unknowns.
 *
 * The 2×2 case is solved with Cramer's rule on a x + b y = c; the 3×3 case with
 * full Gaussian elimination and partial pivoting, which also reports the
 * "no unique solution" cases honestly instead of returning a wrong vector.
 */
return [
    'vars' => [
        'sol_x' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
        'sol_y' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
        'sol_z' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
        'det' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'sol_x', 'vt' => 'dependent', 'l' => 'x']]]],
            ['FR1', [[['t' => 'v', 'n' => 'sol_y', 'vt' => 'dependent', 'l' => 'y']]]],
            ['FR1', [[['t' => 'v', 'n' => 'sol_z', 'vt' => 'dependent', 'l' => 'z (three unknowns only)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'det', 'vt' => 'dependent', 'l' => 'Determinant']]]],
        ],
    ]],
    'showIf' => [
        'd1' => 'noOfVars == 3', 'd2' => 'noOfVars == 3',
        'a3' => 'noOfVars == 3', 'b3' => 'noOfVars == 3',
        'c3' => 'noOfVars == 3', 'd3' => 'noOfVars == 3',
    ],
    'js' => <<<'JS'
omni.onResult([], function (ctx, v) {
  var three = Number(v.noOfVars) === 3;
  var keys = three ? ['a1','b1','c1','d1','a2','b2','c2','d2','a3','b3','c3','d3']
                   : ['a1','b1','c1','a2','b2','c2'];
  for (var i = 0; i < keys.length; i++) {
    if (v[keys[i]] === '' || v[keys[i]] === undefined || !isFinite(Number(v[keys[i]]))) {
      ctx.addUnmetCondition('Every coefficient has to be filled in — including the right-hand sides.');
      return;
    }
  }
  var A = [], b = [];
  if (!three) {
    A = [[Number(v.a1), Number(v.b1)], [Number(v.a2), Number(v.b2)]];
    b = [Number(v.c1), Number(v.c2)];
  } else {
    A = [[Number(v.a1), Number(v.b1), Number(v.c1)],
         [Number(v.a2), Number(v.b2), Number(v.c2)],
         [Number(v.a3), Number(v.b3), Number(v.c3)]];
    b = [Number(v.d1), Number(v.d2), Number(v.d3)];
  }
  var det = three
    ? A[0][0] * (A[1][1] * A[2][2] - A[1][2] * A[2][1])
      - A[0][1] * (A[1][0] * A[2][2] - A[1][2] * A[2][0])
      + A[0][2] * (A[1][0] * A[2][1] - A[1][1] * A[2][0])
    : A[0][0] * A[1][1] - A[0][1] * A[1][0];

  if (Math.abs(det) < 1e-12) {
    ctx.exportValue('det', sround(det, 6));
    ctx.addHtml('<p><strong>The determinant is zero, so this system has no single solution.</strong> '
      + 'The equations are either parallel (no solution at all) or one of them is a multiple of '
      + 'another (infinitely many solutions).</p>');
    return;
  }

  /* Gaussian elimination with partial pivoting */
  var n = b.length;
  var M = A.map(function (row, r) { return row.concat([b[r]]); });
  for (var c = 0; c < n; c++) {
    var piv = c;
    for (var r = c + 1; r < n; r++) {
      if (Math.abs(M[r][c]) > Math.abs(M[piv][c])) piv = r;
    }
    var tmp = M[c]; M[c] = M[piv]; M[piv] = tmp;
    for (var r2 = c + 1; r2 < n; r2++) {
      var f = M[r2][c] / M[c][c];
      for (var k = c; k <= n; k++) M[r2][k] -= f * M[c][k];
    }
  }
  var x = new Array(n).fill(0);
  for (var r3 = n - 1; r3 >= 0; r3--) {
    var sum = M[r3][n];
    for (var k2 = r3 + 1; k2 < n; k2++) sum -= M[r3][k2] * x[k2];
    x[r3] = sum / M[r3][r3];
  }

  ctx.exportValue('det', sround(det, 6));
  ctx.exportValue('sol_x', sround(x[0], 6));
  ctx.exportValue('sol_y', sround(x[1], 6));
  var text = 'x = ' + snum(x[0], 6) + ', y = ' + snum(x[1], 6);
  if (three) {
    ctx.exportValue('sol_z', sround(x[2], 6));
    text += ', z = ' + snum(x[2], 6);
  }

  ctx.addHtml('<p><strong>' + text + '</strong></p>');
  var rows = [['Determinant', snum(det, 6)], ['x', snum(x[0], 6)], ['y', snum(x[1], 6)]];
  if (three) rows.push(['z', snum(x[2], 6)]);
  /* substituting back is the only real check that the answer is right */
  for (var eq = 0; eq < n; eq++) {
    var lhs = 0;
    for (var j = 0; j < n; j++) lhs += A[eq][j] * x[j];
    rows.push(['Equation ' + (eq + 1) + ', left side', snum(lhs, 6) + ' (should be ' + snum(b[eq], 6) + ')']);
  }
  ctx.addHtml(stable(['Quantity', 'Value'], rows));
});
JS,
];
