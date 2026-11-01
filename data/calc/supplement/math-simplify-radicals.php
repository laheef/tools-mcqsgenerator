<?php
/**
 * Simplifying radicals.
 *
 * Every perfect n-th power inside a radicand can be carried out in front of
 * the sign, so the tool pulls them out one at a time, then adds, multiplies or
 * divides — combining only what is really combinable (same index, same
 * radicand for a sum).
 */
return [
    'vars' => [
        'out_coefficient' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
        'out_radicand' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
        'out_index' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'decimal_value' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'out_coefficient', 'vt' => 'dependent', 'l' => 'Coefficient']]]],
            ['FR1', [[['t' => 'v', 'n' => 'out_radicand', 'vt' => 'dependent', 'l' => 'Radicand']]]],
            ['FR1', [[['t' => 'v', 'n' => 'out_index', 'vt' => 'dependent', 'l' => 'Index of the root']]]],
            ['FR1', [[['t' => 'v', 'n' => 'decimal_value', 'vt' => 'dependent', 'l' => 'Decimal value']]]],
        ],
    ]],
    'showIf' => [
        'c_var' => 'option >= 2', 'd_var' => 'option >= 2', 'm_var' => 'option >= 2',
    ],
    'js' => <<<'JS'
function pull(coef, radicand, index) {
  var c = coef, r = radicand, k = 2;
  while (Math.pow(k, index) <= r) {
    var p = Math.pow(k, index);
    while (r % p === 0) { r = r / p; c = c * k; }
    k++;
  }
  return { coef: c, radicand: r };
}

function rootText(coef, radicand, index) {
  var mark = index === 2 ? '√' : (index === 3 ? '∛' : (index === 4 ? '∜' : ''));
  var radix = mark || ('ⁿ√');
  var front = index <= 4 ? radix : radix;
  var body = (Math.abs(coef - 1) < 1e-12 ? '' : snum(coef, 6)) + front + snum(radicand, 6);
  if (!mark) body = snum(coef, 6) + ' · ᵗʰᵉ ' + index + 'th root of ' + snum(radicand, 6);
  return (coef < 0 ? '−' : '') + body.replace('-', '');
}

omni.onResult([], function (ctx, v) {
  var mode = Math.round(Number(v.option));
  var a = Number(v.a_var), b = Number(v.b_var), n = Math.round(Number(v.n_var));
  if (v.a_var === '' || v.b_var === '' || v.n_var === '' || !isFinite(a) || !isFinite(b) || !isFinite(n)) {
    ctx.addUnmetCondition('Fill in the coefficient, the radicand and the index of the root.');
    return;
  }
  if (n < 2 || n > 12) {
    ctx.addUnmetCondition('The index has to be a whole number between 2 and 12.');
    return;
  }
  if (b <= 0 || !Number.isInteger(b)) {
    ctx.addUnmetCondition('Use a positive whole number under the root.');
    return;
  }

  var coef = a, radicand = b, index = n, note = '';
  var rows = [];

  if (mode >= 2) {
    var c = Number(v.c_var), d = Number(v.d_var), m = Math.round(Number(v.m_var));
    if (v.c_var === '' || v.d_var === '' || v.m_var === '' || !isFinite(c) || !isFinite(d) || !isFinite(m)) {
      ctx.addUnmetCondition('The second radical needs its own coefficient, radicand and index.');
      return;
    }
    if (m < 2 || m > 12 || d <= 0 || !Number.isInteger(d)) {
      ctx.addUnmetCondition('The second root needs a positive whole radicand and an index between 2 and 12.');
      return;
    }

    if (mode === 2) {                       /* sum */
      if (n === m && b === d) {
        coef = a + c; radicand = b; index = n;
        note = 'The two radicals are alike, so only the coefficients are added.';
      } else {
        ctx.exportValue('decimal_value', sround(a * Math.pow(b, 1 / n) + c * Math.pow(d, 1 / m), 6));
        ctx.addHtml('<p><strong>These radicals cannot be combined</strong> — they are alike only when the index '
          + 'and the radicand both match, and here they are ' + n + '√' + snum(b, 6) + ' and ' + m + '√'
          + snum(d, 6) + '.</p>');
        ctx.addHtml(stable(['Radical', 'Decimal'], [
          [rootText(a, b, n), snum(a * Math.pow(b, 1 / n), 6)],
          [rootText(c, d, m), snum(c * Math.pow(d, 1 / m), 6)],
          ['Sum (left as it is)', snum(a * Math.pow(b, 1 / n) + c * Math.pow(d, 1 / m), 6)]
        ]));
        return;
      }
    } else if (mode === 3) {                /* product */
      if (n === m) {
        coef = a * c; radicand = b * d; index = n;
        note = 'Same index, so the coefficients multiply and the radicands multiply.';
      } else {
        coef = a * c; radicand = Math.pow(b, m) * Math.pow(d, n); index = n * m;
        note = 'Different indices ' + n + ' and ' + m + ', so the product is a ' + (n * m)
          + 'th root of b^m · d^n.';
      }
    } else {                                /* quotient */
      if (c === 0) {
        ctx.addUnmetCondition('The divisor cannot be zero.');
        return;
      }
      coef = a / c;
      if (n === m) {
        radicand = b / d; index = n;
        note = 'Same index, so the coefficients divide and the radicands divide.';
        if (!Number.isInteger(radicand)) {
          ctx.exportValue('out_coefficient', sround(coef, 6));
          ctx.exportValue('out_index', n);
          ctx.exportValue('decimal_value', sround((a / c) * Math.pow(b / d, 1 / n), 6));
          ctx.addHtml('<p><strong>The radicands do not divide evenly</strong>, so the quotient stays as a '
            + n + 'th root of ' + snum(b / d, 6) + '.</p>');
          return;
        }
      } else {
        radicand = Math.pow(b, m) / Math.pow(d, n); index = n * m;
        note = 'Different indices ' + n + ' and ' + m + ', so the quotient is a ' + (n * m)
          + 'th root of b^m / d^n.';
        if (!Number.isInteger(radicand)) {
          ctx.exportValue('out_coefficient', sround(coef, 6));
          ctx.exportValue('out_index', index);
          ctx.exportValue('decimal_value', sround(coef * Math.pow(radicand, 1 / index), 6));
          ctx.addHtml('<p><strong>' + note + '</strong> The result stays in that form.</p>');
          return;
        }
      }
    }
  }

  if (radicand < 0 || !Number.isInteger(radicand)) {
    ctx.exportValue('out_coefficient', sround(coef, 6));
    ctx.exportValue('out_index', index);
    ctx.exportValue('decimal_value', sround(coef * Math.pow(Math.abs(radicand), 1 / index), 6));
    ctx.addHtml('<p><strong>Result:</strong> ' + snum(coef, 6) + ' × ' + snum(radicand, 6)
      + '^(1/' + index + '</p>');
    return;
  }

  var simple = pull(coef, radicand, index);
  var dec = simple.coef * Math.pow(simple.radicand, 1 / index);

  ctx.exportValue('out_coefficient', sround(simple.coef, 6));
  ctx.exportValue('out_radicand', sround(simple.radicand, 6));
  ctx.exportValue('out_index', index);
  ctx.exportValue('decimal_value', sround(dec, 6));

  var text = rootText(simple.coef, simple.radicand, index);
  ctx.addHtml('<p><strong>' + text + ' = ' + snum(dec, 6) + '</strong>'
    + (note ? ' ' + note : '') + '</p>');
  ctx.addHtml(stable(['Step', 'Value'], [
    ['Radicand at the start', snum(radicand, 6)],
    ['Index', String(index)],
    ['Perfect powers pulled out', String(Math.abs(simple.coef))],
    ['Left under the root', snum(simple.radicand, 6)],
    ['Decimal value', snum(dec, 6)]
  ]));
});
JS,
];
