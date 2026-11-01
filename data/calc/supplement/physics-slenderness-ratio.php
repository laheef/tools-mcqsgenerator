<?php
/**
 * Slenderness ratio of a column, λ = K·L / r.
 *
 * The effective length factor K depends on how the ends are held, and the radius
 * of gyration r = √(I/A) on the section. Only the sections whose second moment
 * is a closed formula are offered here, and each one is worked out rather than
 * looked up.
 */
return [
    'hideTexts' => true,
    'vars' => [
        'eff_length' => ['type' => 'dependent', 'rnd' => ['standard', '2']],
        'radius_gyration' => ['type' => 'dependent', 'rnd' => ['standard', '2']],
        'slenderness' => ['type' => 'dependent', 'rnd' => ['standard', '2']],
        'area' => ['type' => 'dependent', 'rnd' => ['standard', '2']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'eff_length', 'vt' => 'dependent', 'l' => 'Effective length K·L']]]],
            ['FR1', [[['t' => 'v', 'n' => 'radius_gyration', 'vt' => 'dependent', 'l' => 'Radius of gyration r']]]],
            ['FR1', [[['t' => 'v', 'n' => 'slenderness', 'vt' => 'dependent', 'l' => 'Slenderness ratio λ']]]],
            ['FR1', [[['t' => 'v', 'n' => 'area', 'vt' => 'dependent', 'l' => 'Cross-sectional area']]]],
        ],
    ]],
    'showIf' => [
        'b_rectangle' => 'inertia_select == 1', 'h_rectangle' => 'inertia_select == 1',
        't1_hollowrec' => 'inertia_select == 2', 't2_hollowrec' => 'inertia_select == 2',
        'D_circle' => 'inertia_select == 3',
        'D_circle == 4' => 'false',
        'b_isection' => 'inertia_select == 5', 'h_isection' => 'inertia_select == 5',
        'tf_isection' => 'inertia_select == 5', 'tw_isection' => 'inertia_select == 5',
    ],
    'js' => <<<'JS'
omni.onResult([], function (ctx, v) {
  var L = Number(v.L), K = Number(v.end_condition);
  if (v.L === '' || !isFinite(L) || L <= 0) {
    ctx.addUnmetCondition('Enter the length of the column.');
    return;
  }
  if (!isFinite(K) || K <= 0) { ctx.addUnmetCondition('Choose how the ends are held.'); return; }
  K = Math.round(K * 1e6) / 1e6;               /* the menu pads its values with 1e-10 noise */

  var shape = Math.round(Number(v.inertia_select));
  var A, I, shapeName;

  if (shape === 1) {
    var b = Number(v.b_rectangle), h = Number(v.h_rectangle);
    if (!isFinite(b) || !isFinite(h) || b <= 0 || h <= 0) {
      ctx.addUnmetCondition('Enter the base and the height of the rectangle.');
      return;
    }
    A = b * h; I = b * h * h * h / 12; shapeName = 'Rectangle ' + snum(b, 2) + ' × ' + snum(h, 2);
  } else if (shape === 3) {
    var D = Number(v.D_circle);
    if (!isFinite(D) || D <= 0) { ctx.addUnmetCondition('Enter the diameter of the circle.'); return; }
    A = Math.PI * D * D / 4; I = Math.PI * Math.pow(D, 4) / 64; shapeName = 'Circle Ø' + snum(D, 2);
  } else if (shape === 5) {
    var bb = Number(v.b_isection), hh = Number(v.h_isection);
    var tf = Number(v.tf_isection), tw = Number(v.tw_isection);
    if (![bb, hh, tf, tw].every(function (x) { return isFinite(x) && x > 0; }) || 2 * tf >= hh || tw >= bb) {
      ctx.addUnmetCondition('Enter the flange width, the depth, and the flange and web thicknesses '
        + '(the flanges cannot be thicker than half the depth).');
      return;
    }
    /* two flanges plus the web: I = (b·h³ − (b − tw)(h − 2tf)³) / 12 */
    A = 2 * bb * tf + tw * (hh - 2 * tf);
    I = (bb * Math.pow(hh, 3) - (bb - tw) * Math.pow(hh - 2 * tf, 3)) / 12;
    shapeName = 'I section ' + snum(bb, 2) + ' × ' + snum(hh, 2) + ', tf ' + snum(tf, 2) + ', tw ' + snum(tw, 2);
  } else {
    ctx.addUnmetCondition('Choose a section shape: rectangle, circle or I section. The hollow and '
      + 'L-shaped sections need more than one second moment, so they are not offered here.');
    return;
  }

  var r = Math.sqrt(I / A);
  var leff = K * L;
  var lambda = leff / r;

  ctx.exportValue('area', sround(A, 2));
  ctx.exportValue('eff_length', sround(leff, 2));
  ctx.exportValue('radius_gyration', sround(r, 2));
  ctx.exportValue('slenderness', sround(lambda, 2));

  var kind = lambda < 50 ? 'short and stocky — it will crush before it buckles'
           : (lambda < 120 ? 'intermediate — buckling and crushing both matter'
                           : 'slender — it will buckle long before it crushes');

  ctx.addHtml('<p><strong>λ = K·L / r = ' + snum(K, 4) + ' × ' + snum(L, 2) + ' / ' + snum(r, 4)
    + ' = ' + snum(lambda, 2) + '</strong> — a ' + kind + ' column.</p>');
  ctx.addHtml(stable(['Quantity', 'Value'], [
    ['Section', shapeName],
    ['Area A', snum(A, 2)],
    ['Second moment I', snum(I, 2)],
    ['Radius of gyration r = √(I/A)', snum(r, 4)],
    ['Effective length factor K', snum(K, 4)],
    ['Effective length K·L', snum(leff, 2)],
    ['Slenderness ratio λ', snum(lambda, 2)]
  ]));
  ctx.addHtml('<p class="calc-unmet">The ratio is compared with the limit in the design code (often 200, and '
    + '180 or 120 for members carrying compression in a building). Uniform units everywhere: the answer is '
    + 'dimensionless, so millimetres and metres give the same number.</p>');
});
JS,
];
