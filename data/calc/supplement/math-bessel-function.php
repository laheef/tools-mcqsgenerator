<?php
/**
 * Bessel function of the first kind, J_v(x).
 *
 * The power series
 *
 *   J_v(x) = Σ_{k≥0} (−1)^k / (k! Γ(k+v+1)) · (x/2)^(2k+v)
 *
 * converges quickly for the x values a calculator is asked about, and it works
 * for non-integer order as long as Γ is available — so Γ is implemented too.
 */
return [
    'vars' => [
        'jv' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
        'iv' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
        'y_note' => ['type' => 'dependent', 'rnd' => ['standard', '4']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'jv', 'vt' => 'dependent',
                       'l' => 'J_v(x), Bessel function of the first kind']]]],
            ['FR1', [[['t' => 'v', 'n' => 'iv', 'vt' => 'dependent',
                       'l' => 'I_v(x), modified Bessel function']]]],
            ['FR1', [[['t' => 'v', 'n' => 'y_note', 'vt' => 'dependent',
                       'l' => 'J_−v(x)']]]],
        ],
    ]],
    'js' => <<<'JS'
/* Lanczos approximation — Γ(z) for the orders a visitor can type. */
function sgamma(z) {
  var g = 7;
  var c = [0.99999999999980993, 676.5203681218851, -1259.1392167224028,
    771.32342877765313, -176.61502916214059, 12.507343278686905,
    -0.13857109526572012, 9.9843695780195716e-6, 1.5056327351493116e-7];
  if (z < 0.5) return Math.PI / (Math.sin(Math.PI * z) * sgamma(1 - z));
  z -= 1;
  var x = c[0];
  for (var i = 1; i < g + 2; i++) x += c[i] / (z + i);
  var t = z + g + 0.5;
  return Math.sqrt(2 * Math.PI) * Math.pow(t, z + 0.5) * Math.exp(-t) * x;
}

/* The series, with the sign flipped for the modified function. */
function sbessel(v, x, modified) {
  var sum = 0, term = Math.pow(x / 2, v) / sgamma(v + 1);
  for (var k = 0; k < 200; k++) {
    if (k > 0) {
      term *= (modified ? 1 : -1) * (x * x / 4) / (k * (k + v));
    }
    sum += term;
    if (Math.abs(term) < 1e-14 * Math.max(1, Math.abs(sum))) break;
  }
  return sum;
}

omni.onResult([], function (ctx, v) {
  var order = Number(v.v);
  if (v.x_type !== undefined && String(v.x_type) === '2') {
    ctx.addUnmetCondition('This build evaluates real x. Enter the real part of x and leave the imaginary part at zero.');
    return;
  }
  var x = Number(v.x);
  if (!isFinite(order) || !isFinite(x)) {
    ctx.addUnmetCondition('Enter the order v and the argument x.');
    return;
  }
  if (x === 0 && order < 0) {
    ctx.addUnmetCondition('J_v(0) diverges for a negative order.');
    return;
  }
  var j = sbessel(order, x, false);
  var i = sbessel(order, x, true);
  var jneg = sbessel(-order, x, false);
  if (!isFinite(j)) {
    ctx.addUnmetCondition('That order and argument are outside the range this series can evaluate.');
    return;
  }
  ctx.exportValue('jv', sround(j, 6));
  ctx.exportValue('iv', sround(i, 6));
  ctx.exportValue('y_note', sround(jneg, 6));

  ctx.addHtml(stable(['Quantity', 'Value'], [
    ['Order v', snum(order, 4)],
    ['Argument x', snum(x, 4)],
    ['J_v(x)', snum(j, 6)],
    ['J_−v(x)', snum(jneg, 6)],
    ['I_v(x)', snum(i, 6)],
    ['Y_v(x)', order === Math.round(order)
      ? 'integer order — the series above is the real answer here'
      : snum((Math.cos(order * Math.PI) * j - jneg) / Math.sin(order * Math.PI), 6)],
  ]));
});
JS,
];
