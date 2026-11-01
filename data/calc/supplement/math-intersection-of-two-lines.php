<?php
/**
 * Where two lines meet.
 *
 * In 2D the two forms are turned into the same pair of coefficients
 * (Ax + By + C = 0): slope-intercept y = ax + b becomes −a·x + y − b = 0. The
 * determinant of the coefficient matrix then says whether the answer is a single
 * point, no point (parallel) or every point (the same line).
 */
return [
    'hideTexts' => true,
    'vars' => [
        'sol_x' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
        'sol_y' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
        'sol_z' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
        'determinant' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'sol_x', 'vt' => 'dependent', 'l' => 'x']]]],
            ['FR1', [[['t' => 'v', 'n' => 'sol_y', 'vt' => 'dependent', 'l' => 'y']]]],
            ['FR1', [[['t' => 'v', 'n' => 'sol_z', 'vt' => 'dependent', 'l' => 'z (3D only)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'determinant', 'vt' => 'dependent', 'l' => 'Determinant']]]],
        ],
    ]],
    'showIf' => [
        'form1' => 'dim == 2', 'form2' => 'dim == 2',
        'B1' => 'dim == 2 and form1 == 2', 'B2' => 'dim == 2 and form2 == 2',
        'A1' => 'dim == 2', 'C1' => 'dim == 2', 'A2' => 'dim == 2', 'C2' => 'dim == 2',
        'x1' => 'dim == 3', 'x2' => 'dim == 3', 'x3' => 'dim == 3',
        'r1' => 'dim == 3', 'r2' => 'dim == 3', 'r3' => 'dim == 3',
        'y1' => 'dim == 3', 'y2' => 'dim == 3', 'y3' => 'dim == 3',
        's1' => 'dim == 3', 's2' => 'dim == 3', 's3' => 'dim == 3',
    ],
    'js' => <<<'JS'
function num(v, key, what) {
  var raw = v[key];
  var n = Number(raw);
  if (raw === '' || raw === undefined || !isFinite(n)) return { error: 'Enter ' + what + '.' };
  return { value: n };
}

omni.onResult([], function (ctx, v) {
  var dim = Math.round(Number(v.dim));
  if (!isFinite(dim)) { ctx.addUnmetCondition('Choose 2D or 3D.'); return; }

  /* -------------------------------------------------------------------- 2D */
  if (dim === 2) {
    var form1 = Math.round(Number(v.form1)), form2 = Math.round(Number(v.form2));
    var A1, B1, C1, A2, B2, C2;
    var a1 = num(v, 'A1', 'A₁'); if (a1.error) { ctx.addUnmetCondition(a1.error); return; }
    var c1 = num(v, 'C1', 'C₁'); if (c1.error) { ctx.addUnmetCondition(c1.error); return; }
    var a2 = num(v, 'A2', 'A₂'); if (a2.error) { ctx.addUnmetCondition(a2.error); return; }
    var c2 = num(v, 'C2', 'C₂'); if (c2.error) { ctx.addUnmetCondition(c2.error); return; }

    if (form1 === 1) {                 /* y = ax + b  →  −a·x + y − b = 0 */
      A1 = -a1.value; B1 = 1; C1 = -c1.value;
    } else {
      var b1 = num(v, 'B1', 'B₁'); if (b1.error) { ctx.addUnmetCondition(b1.error); return; }
      A1 = a1.value; B1 = b1.value; C1 = c1.value;
    }
    if (form2 === 1) {
      A2 = -a2.value; B2 = 1; C2 = -c2.value;
    } else {
      var b2 = num(v, 'B2', 'B₂'); if (b2.error) { ctx.addUnmetCondition(b2.error); return; }
      A2 = a2.value; B2 = b2.value; C2 = c2.value;
    }

    var det = A1 * B2 - A2 * B1;
    ctx.exportValue('determinant', sround(det, 6));
    if (Math.abs(det) < 1e-12) {
      var same = Math.abs(A1 * C2 - A2 * C1) < 1e-9 && Math.abs(B1 * C2 - B2 * C1) < 1e-9;
      ctx.addHtml('<p><strong>' + (same ? 'The two lines coincide' : 'The lines are parallel and never meet')
        + '</strong> — the determinant is zero, so there is no single point of intersection.</p>');
      return;
    }
    /* Cramer's rule on A1x + B1y = −C1, A2x + B2y = −C2 */
    var x = (B1 * C2 - B2 * C1) / det;
    var y = (A2 * C1 - A1 * C2) / det;

    ctx.exportValue('sol_x', sround(x, 6));
    ctx.exportValue('sol_y', sround(y, 6));
    ctx.addHtml('<p><strong>The lines meet at (' + snum(x, 6) + ', ' + snum(y, 6) + ').</strong></p>');
    ctx.addHtml(stable(['Line', 'A', 'B', 'C'], [
      ['First', snum(A1, 6), snum(B1, 6), snum(C1, 6)],
      ['Second', snum(A2, 6), snum(B2, 6), snum(C2, 6)],
    ]));
    ctx.addHtml('<p class="calc-unmet">Both lines were written as Ax + By + C = 0, so a slope-intercept '
      + 'equation y = ax + b enters as −a·x + y − b = 0. Substituting the point back: '
      + snum(A1 * x + B1 * y + C1, 6) + ' and ' + snum(A2 * x + B2 * y + C2, 6) + ' (both should be zero).</p>');
    return;
  }

  /* -------------------------------------------------------------------- 3D */
  var p = [num(v, 'x1', 'x₁'), num(v, 'x2', 'y₁'), num(v, 'x3', 'z₁')];
  var r = [num(v, 'r1', 'a₁'), num(v, 'r2', 'b₁'), num(v, 'r3', 'c₁')];
  var q = [num(v, 'y1', 'x₂'), num(v, 'y2', 'y₂'), num(v, 'y3', 'z₂')];
  var s = [num(v, 's1', 'a₂'), num(v, 's2', 'b₂'), num(v, 's3', 'c₂')];
  var all = p.concat(r, q, s);
  for (var i = 0; i < all.length; i++) {
    if (all[i].error) { ctx.addUnmetCondition(all[i].error); return; }
  }
  var P = p.map(function (o) { return o.value; });
  var R = r.map(function (o) { return o.value; });
  var Q = q.map(function (o) { return o.value; });
  var S = s.map(function (o) { return o.value; });

  /* least squares for P + tR = Q + uS, then check the residual is zero */
  var w0 = Q[0] - P[0], w1 = Q[1] - P[1], w2 = Q[2] - P[2];
  var a11 = R[0] * R[0] + R[1] * R[1] + R[2] * R[2];
  var a12 = -(R[0] * S[0] + R[1] * S[1] + R[2] * S[2]);
  var a22 = S[0] * S[0] + S[1] * S[1] + S[2] * S[2];
  var b1v = w0 * R[0] + w1 * R[1] + w2 * R[2];
  var b2v = -(w0 * S[0] + w1 * S[1] + w2 * S[2]);
  var det3 = a11 * a22 - a12 * a12;
  if (Math.abs(a11) < 1e-12 || Math.abs(a22) < 1e-12) {
    ctx.addUnmetCondition('A direction vector is zero — a line needs a direction.');
    return;
  }
  if (Math.abs(det3) < 1e-12) {
    ctx.exportValue('determinant', sround(det3, 6));
    ctx.addHtml('<p><strong>The two lines are parallel</strong> (their direction vectors are multiples), '
      + 'so they either never meet or lie on one another.</p>');
    return;
  }
  var t = (b1v * a22 - b2v * a12) / det3;
  var u = (a11 * b2v - a12 * b1v) / det3;
  var hit = [P[0] + t * R[0], P[1] + t * R[1], P[2] + t * R[2]];
  var other = [Q[0] + u * S[0], Q[1] + u * S[1], Q[2] + u * S[2]];
  var gap = Math.sqrt(Math.pow(hit[0] - other[0], 2) + Math.pow(hit[1] - other[1], 2)
    + Math.pow(hit[2] - other[2], 2));

  ctx.exportValue('determinant', sround(det3, 6));
  if (gap > 1e-6) {
    ctx.addHtml('<p><strong>The lines do not meet</strong> — they are skew, and the closest approach between '
      + 'them is ' + snum(gap, 6) + '.</p>');
    ctx.addHtml(stable(['Quantity', 'Value'], [
      ['Point on the first line', '(' + hit.map(function (n) { return snum(n, 6); }).join(', ') + ')'],
      ['Point on the second line', '(' + other.map(function (n) { return snum(n, 6); }).join(', ') + ')'],
      ['Gap', snum(gap, 6)]
    ]));
    return;
  }
  ctx.exportValue('sol_x', sround(hit[0], 6));
  ctx.exportValue('sol_y', sround(hit[1], 6));
  ctx.exportValue('sol_z', sround(hit[2], 6));
  ctx.addHtml('<p><strong>The lines meet at (' + hit.map(function (n) { return snum(n, 6); }).join(', ')
    + ').</strong></p>');
  ctx.addHtml(stable(['Quantity', 'Value'], [
    ['Parameter on the first line (t)', snum(t, 6)],
    ['Parameter on the second line (u)', snum(u, 6)],
    ['Point', '(' + hit.map(function (n) { return snum(n, 6); }).join(', ') + ')']
  ]));
});
JS,
];
