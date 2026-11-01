<?php
/**
 * FOIL — multiplying two binomials.
 *
 * (a₁xⁿ + a₀)(b₁xᵐ + b₀) has four products: first, outer, inner, last. The
 * middle terms are collected, so the answer is printed as a polynomial rather
 * than as four loose pieces.
 */
return [
    'vars' => [
        'foil_first' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
        'foil_outer' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
        'foil_inner' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
        'foil_last' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
        'foil_middle' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'foil_first', 'vt' => 'dependent', 'l' => 'First (a₁ · b₁)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'foil_outer', 'vt' => 'dependent', 'l' => 'Outer (a₁ · b₀)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'foil_inner', 'vt' => 'dependent', 'l' => 'Inner (a₀ · b₁)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'foil_last', 'vt' => 'dependent', 'l' => 'Last (a₀ · b₀)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'foil_middle', 'vt' => 'dependent',
                       'l' => 'Middle terms added (outer + inner)']]]],
        ],
    ]],
    'showIf' => [
        // In linear mode both exponents are 1, so the two boxes would be asking
        // for something the answer ignores.
        'n' => 'mode_select == 2',
        'm' => 'mode_select == 2',
    ],
    'js' => <<<'JS'
/* "3x²" / "−x" / "4", with the signs the reader expects. */
function sterm(coef, power, first) {
  if (Math.abs(coef) < 1e-12) return '';
  var sign = coef < 0 ? '−' : (first ? '' : ' + ');
  var mag = Math.abs(coef);
  var body = power === 0 ? snum(mag, 6)
    : (Math.abs(mag - 1) < 1e-12 ? '' : snum(mag, 6)) + (power === 1 ? 'x' : 'x' + sup(power));
  return sign + body;
}

function sup(n) {
  var map = { '0': '⁰', '1': '¹', '2': '²', '3': '³', '4': '⁴', '5': '⁵', '6': '⁶',
              '7': '⁷', '8': '⁸', '9': '⁹' };
  return String(n).split('').map(function (c) { return map[c] || c; }).join('');
}

omni.onResult([], function (ctx, v) {
  var a1 = Number(v.a1), a0 = Number(v.a0), b1 = Number(v.b1), b0 = Number(v.b0);
  if ([a1, a0, b1, b0].some(function (x) { return !isFinite(x); })
      || v.a1 === '' || v.a0 === '' || v.b1 === '' || v.b0 === '') {
    ctx.addUnmetCondition('Enter a, b, c and d — the two binomials are (ax + b) and (cx + d).');
    return;
  }
  var general = Number(v.mode_select) === 2;
  var n = general ? Number(v.n) : 1;
  var m = general ? Number(v.m) : 1;
  if (!isFinite(n) || !isFinite(m) || n < 0 || m < 0) {
    ctx.addUnmetCondition('The exponents have to be zero or more.');
    return;
  }

  var first = a1 * b1, outer = a1 * b0, inner = a0 * b1, last = a0 * b0;
  ctx.exportValue('foil_first', sround(first, 6));
  ctx.exportValue('foil_outer', sround(outer, 6));
  ctx.exportValue('foil_inner', sround(inner, 6));
  ctx.exportValue('foil_last', sround(last, 6));

  /* collect like terms: n+m from the first product, n and m from the cross
     terms (equal when the exponents are), and the constant. */
  var poly = {};
  var add = function (power, coef) { poly[power] = (poly[power] || 0) + coef; };
  add(n + m, first);
  add(n, outer);
  add(m, inner);
  add(0, last);
  var powers = Object.keys(poly).map(Number).sort(function (x, y) { return y - x; });
  var text = powers.map(function (p, i) { return sterm(poly[p], p, i === 0); })
    .filter(function (s) { return s !== ''; }).join('');
  if (text === '') text = '0';

  ctx.exportValue('foil_middle', sround(outer + inner, 6));

  var x = n === 1 ? 'x' : 'x' + sup(n);
  var y = m === 1 ? 'x' : 'x' + sup(m);
  ctx.addHtml('<p><strong>(' + stermPlain(a1, x) + ' ' + plusMinus(a0) + ' ' + snum(Math.abs(a0), 6)
    + ')(' + stermPlain(b1, y) + ' ' + plusMinus(b0) + ' ' + snum(Math.abs(b0), 6) + ') = '
    + text + '</strong></p>');
  ctx.addHtml(stable(['Step', 'Product', 'Value'], [
    ['First', 'a · c = ' + snum(a1, 6) + ' × ' + snum(b1, 6), snum(first, 6)],
    ['Outer', 'a · d = ' + snum(a1, 6) + ' × ' + snum(b0, 6), snum(outer, 6)],
    ['Inner', 'b · c = ' + snum(a0, 6) + ' × ' + snum(b1, 6), snum(inner, 6)],
    ['Last',  'b · d = ' + snum(a0, 6) + ' × ' + snum(b0, 6), snum(last, 6)],
  ]));

  function stermPlain(coef, sym) {
    return (Math.abs(coef - 1) < 1e-12 ? '' : snum(coef, 6)) + sym;
  }
  function plusMinus(x) { return x < 0 ? '−' : '+'; }
});
JS,
];
