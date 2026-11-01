<?php
/**
 * Roots of a cubic.
 *
 * After dividing through by the leading coefficient the cubic goes to depressed
 * form t³ + pt + q, whose discriminant 4p³ + 27q² separates one real root from
 * three. One real root is found with Cardano (or the trigonometric form when
 * there are three) and the remaining two come from dividing it out — exactly,
 * so the complex pair is reported as a conjugate.
 */
return [
    'vars' => [
        'root_1_real' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
        'root_2_real' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
        'root_2_imag' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
        'root_3_real' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
        'root_3_imag' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
        'discriminant' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'root_1_real', 'vt' => 'dependent', 'l' => 'Root 1 (real part)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'root_2_real', 'vt' => 'dependent', 'l' => 'Root 2 (real part)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'root_2_imag', 'vt' => 'dependent', 'l' => 'Root 2 (imaginary part)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'root_3_real', 'vt' => 'dependent', 'l' => 'Root 3 (real part)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'root_3_imag', 'vt' => 'dependent', 'l' => 'Root 3 (imaginary part)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'discriminant', 'vt' => 'dependent', 'l' => 'Discriminant 4p³ + 27q²']]]],
        ],
    ]],
    'js' => <<<'JS'
omni.onResult([], function (ctx, v) {
  var A = Number(v.a3), B = Number(v.a2), C = Number(v.a1), D = Number(v.a0);
  if (['a3', 'a2', 'a1', 'a0'].some(function (k) {
    return v[k] === '' || v[k] === undefined || !isFinite(Number(v[k]));
  })) {
    ctx.addUnmetCondition('Enter all four coefficients of ax³ + bx² + cx + d.');
    return;
  }
  if (A === 0) {
    ctx.addUnmetCondition('a cannot be zero — without it the equation is quadratic. Use the quadratic '
      + 'calculator for that.');
    return;
  }
  var p = Number(v.precision);
  if (!isFinite(p) || p < 0) p = 4;
  p = Math.min(Math.round(p), 10);

  /* depressed cubic t³ + pt + q, with x = t − b/3a */
  var b = B / A, c = C / A, d = D / A;
  var shift = -b / 3;
  var pp = c - b * b / 3;
  var qq = 2 * b * b * b / 27 - b * c / 3 + d;
  var disc = 4 * pp * pp * pp + 27 * qq * qq;

  ctx.exportValue('discriminant', sround(disc, p));

  var roots;
  if (Math.abs(disc) < 1e-9) {
    /* repeated roots */
    var u = Math.cbrt(-qq);
    var r1 = 2 * u + shift, r23 = -u + shift;
    roots = [[r1, 0], [r23, 0], [r23, 0]];
  } else if (disc > 0) {
    var sq = Math.sqrt(disc / 27);
    var u2 = Math.cbrt(-qq / 2 + sq);
    var v2 = Math.cbrt(-qq / 2 - sq);
    var real = u2 + v2 + shift;
    var re = -(u2 + v2) / 2 + shift;
    var im = Math.sqrt(3) / 2 * (u2 - v2);
    roots = [[real, 0], [re, im], [re, -im]];
  } else {
    /* three distinct real roots: trigonometric form, no complex arithmetic */
    var m = 2 * Math.sqrt(-pp / 3);
    var arg = 3 * qq / (pp * m);
    arg = Math.max(-1, Math.min(1, arg));
    var theta = Math.acos(arg) / 3;
    roots = [0, 1, 2].map(function (k) {
      return [m * Math.cos(theta - 2 * Math.PI * k / 3) + shift, 0];
    });
    roots.sort(function (x, y) { return x[0] - y[0]; });
  }

  /* polish every real root with Newton so it agrees with the coefficients */
  roots = roots.map(function (r) {
    if (Math.abs(r[1]) > 1e-12) return r;
    var x0 = r[0];
    for (var it = 0; it < 40; it++) {
      var fx = ((A * x0 + B) * x0 + C) * x0 + D;
      var dfx = (3 * A * x0 + 2 * B) * x0 + C;
      if (Math.abs(dfx) < 1e-14) break;
      var next = x0 - fx / dfx;
      if (!isFinite(next)) break;
      x0 = next;
    }
    return [x0, 0];
  });

  var realOnly = roots.filter(function (r) { return Math.abs(r[1]) < 1e-9; })
                       .map(function (r) { return r[0]; })
                       .sort(function (x, y) { return x - y; });

  ctx.exportValue('root_1_real', sround(roots[0][0], p));
  ctx.exportValue('root_2_real', sround(roots[1][0], p));
  ctx.exportValue('root_2_imag', sround(roots[1][1], p));
  ctx.exportValue('root_3_real', sround(roots[2][0], p));
  ctx.exportValue('root_3_imag', sround(roots[2][1], p));

  var describe = function (r) {
    if (Math.abs(r[1]) < 1e-9) return snum(r[0], p);
    return snum(r[0], p) + (r[1] < 0 ? ' − ' : ' + ') + snum(Math.abs(r[1]), p) + 'i';
  };
  var summary = roots.map(describe).join(',  ');
  ctx.addHtml('<p><strong>Roots: ' + summary + '</strong>'
    + (disc > 1e-9 ? ' — one real root and a conjugate pair.' :
       (disc < -1e-9 ? ' — three distinct real roots.' : ' — a repeated root.')) + '</p>');
  ctx.addHtml(stable(['Quantity', 'Value'], [
    ['Depressed form', 't³ ' + (pp < 0 ? '− ' : '+ ') + snum(Math.abs(pp), p) + 't '
      + (qq < 0 ? '− ' : '+ ') + snum(Math.abs(qq), p)],
    ['Shift x = t ' + (shift < 0 ? '− ' : '+ ') + snum(Math.abs(shift), p), snum(shift, p)],
    ['p', snum(pp, p)],
    ['q', snum(qq, p)],
    ['Discriminant', snum(disc, p)],
    ['Real roots', realOnly.length ? realOnly.map(function (r) { return snum(r, p); }).join(', ')
      : 'none']
  ]));
});
JS,
];
