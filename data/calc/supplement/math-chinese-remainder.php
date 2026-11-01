<?php
/**
 * The Chinese remainder theorem.
 *
 * Each congruence x ≡ a (mod n) narrows x to one class; combining them one at a
 * time (x = x₀ + k·N, solved for k modulo the new modulus) gives the single
 * class modulo the product — provided the moduli are pairwise coprime, which is
 * checked instead of assumed.
 */
return [
    'vars' => [
        'solution_x' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'modulus_n' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'solution_x', 'vt' => 'dependent', 'l' => 'Smallest non-negative x']]]],
            ['FR1', [[['t' => 'v', 'n' => 'modulus_n', 'vt' => 'dependent', 'l' => 'Modulus N']]]],
        ],
    ]],
    'showIf' => [
        'a3' => 'noOfEqs >= 3', 'n3' => 'noOfEqs >= 3',
        'a4' => 'noOfEqs >= 4', 'n4' => 'noOfEqs >= 4',
        'a5' => 'noOfEqs >= 5', 'n5' => 'noOfEqs >= 5',
        'a6' => 'noOfEqs >= 6', 'n6' => 'noOfEqs >= 6',
    ],
    'js' => <<<'JS'
function gcd(a, b) { a = Math.abs(a); b = Math.abs(b); while (b) { var t = b; b = a % b; a = t; } return a; }

/* modular inverse by the extended Euclidean algorithm */
function inverse(a, m) {
  var t = 0, newT = 1, r = m, newR = ((a % m) + m) % m;
  while (newR !== 0) {
    var q = Math.floor(r / newR);
    var tmp = t - q * newT; t = newT; newT = tmp;
    var tmp2 = r - q * newR; r = newR; newR = tmp2;
  }
  if (r !== 1) return null;
  return ((t % m) + m) % m;
}

omni.onResult([], function (ctx, v) {
  var count = Math.round(Number(v.noOfEqs));
  if (!isFinite(count) || count < 2) {
    ctx.addUnmetCondition('Choose how many congruences you have.');
    return;
  }
  var pairs = [], moduli = [];
  for (var i = 1; i <= count; i++) {
    var aRaw = v['a' + i], nRaw = v['n' + i];
    if (aRaw === '' || nRaw === '' || aRaw === undefined || nRaw === undefined) {
      ctx.addUnmetCondition('Congruence ' + i + ' is missing its a or its n.');
      return;
    }
    var a = Number(aRaw), n = Number(nRaw);
    if (!Number.isInteger(a) || !Number.isInteger(n)) {
      ctx.addUnmetCondition('Both a and n have to be whole numbers — congruence ' + i + ' is not.');
      return;
    }
    if (n < 2) {
      ctx.addUnmetCondition('The modulus n' + i + ' has to be at least 2.');
      return;
    }
    for (var j = 0; j < moduli.length; j++) {
      if (gcd(moduli[j], n) !== 1) {
        ctx.addUnmetCondition('n' + (j + 1) + ' = ' + moduli[j] + ' and n' + i + ' = ' + n
          + ' share a factor, so the plain theorem does not apply — the system may have no solution '
          + 'or several classes.');
        return;
      }
    }
    moduli.push(n);
    pairs.push([((a % n) + n) % n, n]);
  }

  /* x = x0 (mod N), extended one congruence at a time */
  var x = pairs[0][0], N = pairs[0][1];
  var rows = [['Start', 'x ≡ ' + pairs[0][0] + ' (mod ' + pairs[0][1] + ')', 'N = ' + N]];
  for (var k = 1; k < pairs.length; k++) {
    var a2 = pairs[k][0], n2 = pairs[k][1];
    var inv = inverse(N % n2, n2);
    var step = ((a2 - x) % n2 + n2) % n2;
    step = (step * inv) % n2;
    x = x + step * N;
    N = N * n2;
    x = ((x % N) + N) % N;
    rows.push(['Add x ≡ ' + a2 + ' (mod ' + n2 + ')', 'k ≡ ' + step,
      'x = ' + x + ' (mod ' + N + ')']);
  }

  ctx.exportValue('solution_x', x);
  ctx.exportValue('modulus_n', N);

  ctx.addHtml('<p><strong>x = ' + x + ' (mod ' + N + ')</strong> — the smallest non-negative answer is '
    + x + ', and every answer is ' + x + ' + ' + N + 'k.</p>');
  ctx.addHtml(stable(['Combine', 'Multiplier', 'Result so far'], rows));
  ctx.addHtml(stable(['Congruence', 'x mod n', 'Check'], pairs.map(function (p) {
    return ['x ≡ ' + p[0] + ' (mod ' + p[1] + ')', String(x % p[1]), x % p[1] === p[0] ? 'holds' : 'fails'];
  })));
});
JS,
];
