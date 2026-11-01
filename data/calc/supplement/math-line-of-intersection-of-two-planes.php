<?php
/**
 * The line where two planes meet.
 *
 * Each plane a x + b y + c z = d has normal (a, b, c); the line of intersection
 * runs along the cross product of the two normals. A point on the line is found
 * by setting the coordinate with the largest direction component to zero and
 * solving the remaining 2×2 system.
 */
return [
    'vars' => [
        'direction_x' => ['type' => 'dependent', 'rnd' => ['standard', '4']],
        'direction_y' => ['type' => 'dependent', 'rnd' => ['standard', '4']],
        'direction_z' => ['type' => 'dependent', 'rnd' => ['standard', '4']],
        'angle_between' => ['type' => 'dependent', 'rnd' => ['standard', '4']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'direction_x', 'vt' => 'dependent', 'l' => 'Direction x']]]],
            ['FR1', [[['t' => 'v', 'n' => 'direction_y', 'vt' => 'dependent', 'l' => 'Direction y']]]],
            ['FR1', [[['t' => 'v', 'n' => 'direction_z', 'vt' => 'dependent', 'l' => 'Direction z']]]],
            ['FR1', [[['t' => 'v', 'n' => 'angle_between', 'vt' => 'dependent', 'l' => 'Angle between the planes']]]],
        ],
    ]],
    'js' => <<<'JS'
omni.onResult([], function (ctx, v) {
  var a1 = Number(v.a1), b1 = Number(v.b1), c1 = Number(v.c1), d1 = Number(v.d1);
  var a2 = Number(v.a2), b2 = Number(v.b2), c2 = Number(v.c2), d2 = Number(v.d2);
  if (['a1', 'b1', 'c1', 'd1', 'a2', 'b2', 'c2', 'd2'].some(function (k) {
    return v[k] === '' || v[k] === undefined || !isFinite(Number(v[k]));
  })) {
    ctx.addUnmetCondition('Enter all four coefficients of both planes.');
    return;
  }

  var dx = b1 * c2 - c1 * b2;
  var dy = c1 * a2 - a1 * c2;
  var dz = a1 * b2 - b1 * a2;
  var norm = Math.sqrt(dx * dx + dy * dy + dz * dz);

  if (norm < 1e-12) {
    var same = (a1 * a2 + b1 * b2 + c1 * c2) > 0;
    var ratio = Math.abs(a1) > 1e-12 ? a2 / a1 : (Math.abs(b1) > 1e-12 ? b2 / b1 : c2 / c1);
    var parallelDistance = Math.abs(d2 / ratio - d1) / Math.sqrt(a1 * a1 + b1 * b1 + c1 * c1);
    ctx.addHtml('<p><strong>The planes are parallel' + (same ? '' : ' (opposite orientation)')
      + '</strong> — their normals are multiples of each other, so there is no line of intersection.</p>');
    if (parallelDistance < 1e-9) {
      ctx.addHtml('<p>They are in fact the same plane: every point of one satisfies the other.</p>');
    } else {
      ctx.addHtml('<p>They are ' + snum(parallelDistance, 4) + ' apart and never meet.</p>');
    }
    return;
  }

  /* pick the coordinate to set to zero: drop the equation it dominates */
  var zeroAxis = Math.abs(dx) >= Math.abs(dy) && Math.abs(dx) >= Math.abs(dz) ? 0
               : (Math.abs(dy) >= Math.abs(dz) ? 1 : 2);
  var x = 0, y = 0, z = 0;
  if (zeroAxis === 0) {
    var det = b1 * c2 - b2 * c1;
    y = (d1 * c2 - d2 * c1) / det;
    z = (b1 * d2 - b2 * d1) / det;
  } else if (zeroAxis === 1) {
    var det2 = a1 * c2 - a2 * c1;
    x = (d1 * c2 - d2 * c1) / det2;
    z = (a1 * d2 - a2 * d1) / det2;
  } else {
    var det3 = a1 * b2 - a2 * b1;
    x = (d1 * b2 - d2 * b1) / det3;
    y = (a1 * d2 - a2 * d1) / det3;
  }

  var cosAngle = Math.abs(a1 * a2 + b1 * b2 + c1 * c2)
    / (Math.sqrt(a1 * a1 + b1 * b1 + c1 * c1) * Math.sqrt(a2 * a2 + b2 * b2 + c2 * c2));

  ctx.exportValue('direction_x', sround(dx, 4));
  ctx.exportValue('direction_y', sround(dy, 4));
  ctx.exportValue('direction_z', sround(dz, 4));
  ctx.exportValue('angle_between', sround(Math.acos(Math.min(1, cosAngle)) * 180 / Math.PI, 4));

  ctx.addHtml('<p><strong>The line runs along (' + snum(dx, 4) + ', ' + snum(dy, 4) + ', '
    + snum(dz, 4) + ') through (' + snum(x, 4) + ', ' + snum(y, 4) + ', ' + snum(z, 4) + ').</strong></p>');
  ctx.addHtml(stable(['Quantity', 'Value'], [
    ['Normal of plane 1', '(' + snum(a1, 4) + ', ' + snum(b1, 4) + ', ' + snum(c1, 4) + ')'],
    ['Normal of plane 2', '(' + snum(a2, 4) + ', ' + snum(b2, 4) + ', ' + snum(c2, 4) + ')'],
    ['Direction (cross product)', '(' + snum(dx, 4) + ', ' + snum(dy, 4) + ', ' + snum(dz, 4) + ')'],
    ['Set to zero to place the point', ['x', 'y', 'z'][zeroAxis] + ' = 0'],
    ['Angle between the planes', snum(Math.acos(Math.min(1, cosAngle)) * 180 / Math.PI, 4) + '°'],
  ]));
});
JS,
];
