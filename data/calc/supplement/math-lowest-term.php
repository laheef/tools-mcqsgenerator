<?php
/**
 * Reducing a fraction to lowest terms.
 *
 * A standard fraction n/d and a mixed number W n/d are both reduced by dividing
 * top and bottom by their greatest common divisor; the mixed form also carries
 * the whole part through, and a negative sign is kept in front of the whole
 * number rather than inside it.
 */
return [
    'vars' => [
        'gcd_used' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'decimal_value' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'gcd_used', 'vt' => 'dependent', 'l' => 'Greatest common divisor']]]],
            ['FR1', [[['t' => 'v', 'n' => 'decimal_value', 'vt' => 'dependent', 'l' => 'As a decimal']]]],
        ],
    ]],
    'showIf' => [
        'W' => 'option_mixed == 1',
    ],
    'js' => <<<'JS'
function gcd(a, b) {
  a = Math.abs(a); b = Math.abs(b);
  while (b) { var t = b; b = a % b; a = t; }
  return a;
}

omni.onResult([], function (ctx, v) {
  var mixed = Number(v.option_mixed) === 1;
  var whole = mixed ? Number(v.W) : 0;
  var n = Number(v.n), d = Number(v.d);
  if (v.n === '' || v.d === '' || !isFinite(n) || !isFinite(d)) {
    ctx.addUnmetCondition('Enter the numerator and the denominator.');
    return;
  }
  if (mixed && (v.W === '' || !isFinite(whole))) {
    ctx.addUnmetCondition('Enter the whole number that goes with the fraction.');
    return;
  }
  if (d === 0) {
    ctx.addUnmetCondition('The denominator cannot be zero.');
    return;
  }
  if (!Number.isInteger(n) || !Number.isInteger(d)) {
    ctx.addUnmetCondition('Use whole numbers for the numerator and denominator — decimals are not a fraction.');
    return;
  }
  if (!Number.isInteger(whole)) {
    ctx.addUnmetCondition('The whole number has to be a whole number.');
    return;
  }

  /* move the whole part into the numerator, keeping the sign with the fraction */
  var sign = (whole < 0 || (whole === 0 && n < 0) || (d < 0)) ? -1 : 1;
  var numerator = mixed ? Math.abs(whole) * Math.abs(d) + Math.abs(n) : Math.abs(n);
  var denominator = Math.abs(d);
  if (mixed && whole !== 0) numerator = Math.abs(whole) * denominator + Math.abs(n);

  var g = gcd(numerator, denominator) || 1;
  var rn = numerator / g, rd = denominator / g;

  var text;
  if (mixed) {
    var w2 = Math.floor(rn / rd), rem = rn - w2 * rd;
    text = (sign < 0 ? '−' : '') + (w2 ? w2 + ' ' : '') + (rem ? rem + '/' + rd : (w2 ? '' : '0'));
    if (!rem && w2) text = (sign < 0 ? '−' : '') + w2;
  } else {
    text = (sign < 0 ? '−' : '') + rn + '/' + rd;
  }

  ctx.exportValue('gcd_used', g);
  ctx.exportValue('decimal_value', sround(sign * rn / rd, 6));

  ctx.addHtml('<p><strong>' + text + '</strong></p>');
  ctx.addHtml(stable(['Step', 'Value'], [
    ['Fraction as entered', mixed ? (whole + ' ' + n + '/' + d) : (n + '/' + d)],
    ['Numerator over the common denominator', numerator + '/' + denominator],
    ['Greatest common divisor', String(g)],
    ['Divided top and bottom by', String(g)],
    ['Lowest terms', text],
  ]));
});
JS,
];
