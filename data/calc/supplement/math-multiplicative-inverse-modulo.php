<?php
/**
 * Modular multiplicative inverse.
 *
 * The inverse of a modulo m is the x with a · x ≡ 1 (mod m), and it exists
 * exactly when gcd(a, m) = 1. The extended Euclidean algorithm finds it: it
 * writes 1 as a combination of a and m, and the coefficient of a is the answer.
 */
return [
    'vars' => [
        'gcd' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'inverse' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'exists' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'gcd', 'vt' => 'dependent',
                       'l' => 'gcd(a, m)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'exists', 'vt' => 'dependent',
                       'l' => 'Inverse exists? (1 = yes, 0 = no)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'inverse', 'vt' => 'dependent',
                       'l' => 'Modular inverse of a (mod m)']]]],
        ],
    ]],
    'js' => <<<'JS'
function segcd(a, b) {
  a = Math.abs(a); b = Math.abs(b);
  while (b) { var t = b; b = a % b; a = t; }
  return a;
}

/* extended Euclid: returns [g, x, y] with a·x + b·y = g */
function seegcd(a, b) {
  if (b === 0) return [a, 1, 0];
  var r = seegcd(b, a % b);
  return [r[0], r[2], r[1] - Math.floor(a / b) * r[2]];
}

omni.onResult([], function (ctx, v) {
  var a = Number(v.a), m = Number(v.m);
  if (!isFinite(a) || !isFinite(m) || Math.round(m) < 2) {
    ctx.addUnmetCondition('Enter a and a modulus m of 2 or more.');
    return;
  }
  a = Math.round(a); m = Math.round(m);
  var g = segcd(a, m);
  ctx.exportValue('gcd', g);
  if (g !== 1) {
    ctx.exportValue('exists', 0);
    ctx.exportValue('inverse', 0);
    ctx.addHtml('<p class="calc-unmet"><strong>No inverse exists.</strong> gcd(' + a + ', ' + m
      + ') = ' + g + '. An inverse exists only when the two numbers share no factor.</p>');
    return;
  }
  var r = seegcd(((a % m) + m) % m, m);
  var inv = ((r[1] % m) + m) % m;
  ctx.exportValue('exists', 1);
  ctx.exportValue('inverse', inv);
  ctx.addHtml('<p><strong>The inverse of ' + a + ' modulo ' + m + ' is ' + inv + '.</strong> Check: '
    + a + ' × ' + inv + ' = ' + (a * inv) + ', and ' + (a * inv) + ' mod ' + m + ' = '
    + (((a * inv) % m) + m) % m + '.</p>');
});
JS,
];
