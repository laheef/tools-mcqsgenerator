<?php
/**
 * Prime number test.
 *
 * Trial division up to the square root: if no prime at or below √n divides n,
 * none above it can either. The same walk collects the factorisation, which is
 * what a visitor actually wants next.
 */
return [
    'vars' => [
        'is_prime' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'smallest_factor' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'next_prime' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'is_prime', 'vt' => 'dependent',
                       'l' => 'Prime? (1 = yes, 0 = no)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'smallest_factor', 'vt' => 'dependent',
                       'l' => 'Smallest divisor above 1']]]],
            ['FR1', [[['t' => 'v', 'n' => 'next_prime', 'vt' => 'dependent',
                       'l' => 'Next prime above the number']]]],
        ],
    ]],
    'js' => <<<'JS'
function sisPrime(n) {
  if (n < 2) return false;
  if (n % 2 === 0) return n === 2;
  for (var d = 3; d * d <= n; d += 2) if (n % d === 0) return false;
  return true;
}

omni.onResult([], function (ctx, v) {
  var n = Number(v.number);
  if (!isFinite(n) || Math.abs(n) > 1e12) {
    ctx.addUnmetCondition('Enter a whole number up to a trillion.');
    return;
  }
  n = Math.round(n);
  if (n < 2) {
    ctx.exportValue('is_prime', 0);
    ctx.exportValue('smallest_factor', 0);
    ctx.exportValue('next_prime', 2);
    ctx.addHtml('<p class="calc-unmet">' + n + ' is not prime: primes start at 2.</p>');
    return;
  }
  var prime = sisPrime(n);
  var factor = n;
  if (!prime) {
    factor = 2;
    while (factor * factor <= n && n % factor !== 0) factor++;
    if (factor * factor > n) factor = n;
  }
  var next = n + 1;
  while (!sisPrime(next)) next++;
  ctx.exportValue('is_prime', prime ? 1 : 0);
  ctx.exportValue('smallest_factor', factor);
  ctx.exportValue('next_prime', next);

  if (prime) {
    ctx.addHtml('<p><strong>' + n + ' is prime.</strong> Nothing between 2 and ' 
      + Math.floor(Math.sqrt(n)) + ' divides it, so nothing above that can either.</p>');
  } else {
    var parts = [], rest = n;
    for (var d = 2; d * d <= rest; d++) {
      while (rest % d === 0) { parts.push(d); rest /= d; }
    }
    if (rest > 1) parts.push(rest);
    ctx.addHtml('<p><strong>' + n + ' is not prime.</strong> It factors as '
      + parts.join(' × ') + '.</p>');
  }
});
JS,
];
