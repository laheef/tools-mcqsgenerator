<?php
/**
 * The latus rectum of a parabola, an ellipse or a hyperbola.
 *
 * It is the chord through the focus, perpendicular to the axis, and its length is
 * 4a for a parabola (a = the focal distance), 2b²/a for an ellipse and 2b²/a for a
 * hyperbola — the last two differ only in which of the two axes is called a.
 */
return [
    'hideTexts' => true,
    'vars' => [
        'latus_rectum' => ['type' => 'dependent', 'rnd' => ['standard', '4']],
        'semi_latus' => ['type' => 'dependent', 'rnd' => ['standard', '4']],
        'focal_distance' => ['type' => 'dependent', 'rnd' => ['standard', '4']],
        'eccentricity' => ['type' => 'dependent', 'rnd' => ['standard', '4']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'latus_rectum', 'vt' => 'dependent', 'l' => 'Latus rectum length']]]],
            ['FR1', [[['t' => 'v', 'n' => 'semi_latus', 'vt' => 'dependent', 'l' => 'Half of it (focus to curve)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'focal_distance', 'vt' => 'dependent', 'l' => 'Focal distance from the centre']]]],
            ['FR1', [[['t' => 'v', 'n' => 'eccentricity', 'vt' => 'dependent', 'l' => 'Eccentricity']]]],
        ],
    ]],
    'showIf' => [
        'vParA' => 'Shape == 0 and axis == 0',
        'vParB' => 'Shape == 0 and axis == 0',
        'vParC' => 'Shape == 0 and axis == 0',
        'hParA' => 'Shape == 0 and axis == 1',
        'hParB' => 'Shape == 0 and axis == 1',
        'hParC' => 'Shape == 0 and axis == 1',
        'vHypA' => 'Shape == 1 and axis == 0', 'vHypB' => 'Shape == 1 and axis == 0',
        'vHypH' => 'Shape == 1 and axis == 0', 'vHypK' => 'Shape == 1 and axis == 0',
        'hHypA' => 'Shape == 1 and axis == 1', 'hHypB' => 'Shape == 1 and axis == 1',
        'hHypH' => 'Shape == 1 and axis == 1', 'hHypK' => 'Shape == 1 and axis == 1',
        'ellA' => 'Shape == 2', 'ellB' => 'Shape == 2', 'ellH' => 'Shape == 2', 'ellK' => 'Shape == 2',
    ],
    'js' => <<<'JS'
omni.onResult([], function (ctx, v) {
  var shape = Math.round(Number(v.Shape));
  var axis = Math.round(Number(v.axis));
  if (!isFinite(shape)) { ctx.addUnmetCondition('Choose the shape.'); return; }

  var lr, a, c, ecc, name, extra = [];

  if (shape === 0) {
    /* parabola written as y = Ax² + Bx + C (or x = Ay² + By + C when horizontal) */
    var pref = axis === 1 ? 'hPar' : 'vPar';
    var A = Number(v[pref + 'A']), B = Number(v[pref + 'B']), C = Number(v[pref + 'C']);
    if (['A', 'B', 'C'].some(function (k) { return v[pref + k] === '' || !isFinite(Number(v[pref + k])); })) {
      ctx.addUnmetCondition('Enter A, B and C from the equation.');
      return;
    }
    if (A === 0) {
      ctx.addUnmetCondition('A cannot be zero — without it the equation is a straight line.');
      return;
    }
    /* standard form a = 1/(4A); the vertex is at −B/2A */
    a = Math.abs(1 / (4 * A));
    lr = 4 * a;
    c = a;
    ecc = 1;
    name = 'Parabola';
    extra.push(['Vertex', '(' + snum(-B / (2 * A), 4) + ', ' + snum(C - B * B / (4 * A), 4) + ')']);
  } else if (shape === 1) {
    var pre = axis === 1 ? 'hHyp' : 'vHyp';
    var ta = Number(v[pre + 'A']), tb = Number(v[pre + 'B']);
    if (!isFinite(ta) || !isFinite(tb) || ta <= 0 || tb <= 0) {
      ctx.addUnmetCondition('Enter the transverse and the conjugate axis (both positive).');
      return;
    }
    var centre = '(' + snum(v[pre + 'H'] === '' ? 0 : Number(v[pre + 'H']), 4) + ', '
      + snum(v[pre + 'K'] === '' ? 0 : Number(v[pre + 'K']), 4) + ')';
    lr = 2 * tb * tb / ta;
    a = ta;
    c = Math.sqrt(ta * ta + tb * tb);
    ecc = c / ta;
    name = 'Hyperbola';
    extra.push(['Centre', centre]);
    extra.push(['Foci at distance c', snum(c, 4) + ' from the centre']);
  } else {
    var ea = Number(v.ellA), eb = Number(v.ellB);
    if (!isFinite(ea) || !isFinite(eb) || ea <= 0 || eb <= 0) {
      ctx.addUnmetCondition('Enter the semi-axes a and b (both positive).');
      return;
    }
    /* the latus rectum is 2b²/a with a the semi-major axis */
    var major = Math.max(ea, eb), minor = Math.min(ea, eb);
    lr = 2 * minor * minor / major;
    a = major;
    c = Math.sqrt(major * major - minor * minor);
    ecc = c / major;
    name = 'Ellipse';
    extra.push(['Semi-major axis', snum(major, 4)]);
    extra.push(['Semi-minor axis', snum(minor, 4)]);
  }

  ctx.exportValue('latus_rectum', sround(lr, 4));
  ctx.exportValue('semi_latus', sround(lr / 2, 4));
  ctx.exportValue('focal_distance', sround(c, 4));
  ctx.exportValue('eccentricity', sround(ecc, 4));

  ctx.addHtml('<p><strong>The latus rectum is ' + snum(lr, 4) + ' long</strong> — ' + snum(lr / 2, 4)
    + ' on each side of the axis, through the focus.</p>');
  var rows = [['Shape', name], ['Focal distance', snum(c, 4)], ['Eccentricity', snum(ecc, 4)]];
  rows = rows.concat(extra);
  rows.push(['Latus rectum', snum(lr, 4)]);
  ctx.addHtml(stable(['Quantity', 'Value'], rows));
  ctx.addHtml('<p class="calc-unmet">' + (shape === 0
    ? 'For a parabola the latus rectum is always 4a, four times the distance from the vertex to the focus.'
    : 'For both the ellipse and the hyperbola the chord is 2b²/a, where a is the axis the foci lie on. '
      + 'An ellipse has e < 1, a parabola e = 1 and a hyperbola e > 1.') + '</p>');
});
JS,
];
