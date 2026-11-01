<?php
/**
 * Prime factorisation — the factors, the factor tree, the neighbouring primes.
 *
 * The page's script factorised the number and published the answer in `res` and
 * the working in `tree1`, `tree11`, `tree2`, `tree22` — none of them declared, so
 * every one was computed and dropped. Its own sentences were label variables
 * (`output1` … `output13`, one sentence fragment per option) whose text lost its
 * numbers in the harvest, which is why the page opened on a wall of blank prose.
 *
 * The repair factorises the number itself and prints the factorisation, its
 * exponent form and the prime neighbours.
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideTexts' => true,
    'outputs' => [
        'distinct_factors'  => ['label' => 'Distinct prime factors', 'precision' => '0'],
        'largest_factor'    => ['label' => 'Largest prime factor', 'precision' => '0'],
        'smallest_factor'   => ['label' => 'Smallest prime factor', 'precision' => '0'],
        'prime_below'       => ['label' => 'Nearest prime below', 'precision' => '0'],
        'prime_above'       => ['label' => 'Nearest prime above', 'precision' => '0'],
    ],
    'js' => <<<'JS'
function pfIsPrime(n) {
  if (n < 2) { return false; }
  if (n % 2 === 0) { return n === 2; }
  for (var i = 3; i * i <= n; i += 2) { if (n % i === 0) { return false; } }
  return true;
}
function pfFactorise(n) {
  var out = [], rest = n;
  for (var p = 2; p * p <= rest; p++) {
    while (rest % p === 0) { out.push(p); rest /= p; }
  }
  if (rest > 1) { out.push(rest); }
  return out;
}
function pfExponents(list) {
  var parts = [], i = 0;
  while (i < list.length) {
    var j = i;
    while (j + 1 < list.length && list[j + 1] === list[i]) { j++; }
    var k = j - i + 1;
    parts.push(k > 1 ? list[i] + '^' + k : String(list[i]));
    i = j + 1;
  }
  return parts.join(' × ');
}

omni.onResult(['number'], function (ctx, values) {
  var raw = values.number;
  var clear = function () {
    ['distinct_factors', 'largest_factor', 'smallest_factor', 'prime_below', 'prime_above']
      .forEach(function (n) { ctx.exportValue(n, null); });
  };
  if (raw === '' || raw === null || raw === undefined) {
    clear();
    ctx.addUnmetCondition('Enter a whole number greater than 1 to factorise.');
    return;
  }
  var n = Number(raw);
  if (!isFinite(n) || n !== Math.round(n)) {
    clear();
    ctx.addUnmetCondition('Prime factorisation is for whole numbers — the box takes nothing with a decimal point.');
    return;
  }
  if (n < 2) {
    clear();
    ctx.addUnmetCondition('Enter a whole number of 2 or more: 1 has no prime factors, and 0 is divisible by everything.');
    return;
  }
  if (n > 1e12) {
    clear();
    ctx.addUnmetCondition('That number is too large to factorise here — keep it below one trillion.');
    return;
  }

  var factors = pfFactorise(n);
  var distinct = [];
  factors.forEach(function (f) { if (distinct.indexOf(f) < 0) { distinct.push(f); } });

  var below = null, above = null;
  for (var d = n - 1; d >= 2 && below === null; d--) { if (pfIsPrime(d)) { below = d; } }
  for (var u = n + 1; u < n + 100000 && above === null; u++) { if (pfIsPrime(u)) { above = u; } }

  ctx.exportValue('distinct_factors', distinct.length);
  ctx.exportValue('largest_factor', factors[factors.length - 1]);
  ctx.exportValue('smallest_factor', factors[0]);
  ctx.exportValue('prime_below', below === null ? null : below);
  ctx.exportValue('prime_above', above === null ? null : above);

  if (factors.length === 1) {
    ctx.addHtml('<p><strong>' + n + ' is prime</strong> — its only factors are 1 and itself.</p>');
  } else {
    ctx.addHtml('<p><strong>' + n + ' = ' + factors.join(' × ') + ' = ' + pfExponents(factors) + '</strong></p>');
  }
  var counts = [];
  distinct.forEach(function (p) {
    var k = factors.filter(function (f) { return f === p; }).length;
    counts.push([String(p), String(k), Math.pow(p, k) > 1e15 ? 'huge' : String(Math.pow(p, k))]);
  });
  ctx.addHtml(stable(['Prime', 'Times it divides', 'Its share of the number'], counts));
  ctx.addHtml(stable(['Item', 'Value'], [
    ['Number', String(n)],
    ['Prime?', factors.length === 1 ? 'yes' : 'no'],
    ['Distinct prime factors', String(distinct.length)],
    ['Prime factors in total', String(factors.length)],
    ['Nearest prime below', below === null ? 'none' : String(below)],
    ['Nearest prime above', above === null ? 'none' : String(above)]
  ]));
  ctx.addHtml('<p class="calc-note">Every whole number greater than 1 is either prime or a product of primes, and '
    + 'that product is unique — which is what makes primes the building blocks of arithmetic. The factor tree '
    + 'is the working: split the number into any two factors and repeat until every leaf is prime, and the '
    + 'leaves are the factors in the list above whatever order the splits were made in. A prime has a one-leaf '
    + 'tree and no other.</p>');
});
JS,
];
