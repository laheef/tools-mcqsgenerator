<?php
/**
 * Runs of heads in a sequence of fair coin flips.
 *
 * The number of heads in n flips follows the binomial distribution with
 * p = ½, so the three questions the page asks are three sums of C(n,k)/2ⁿ. Both
 * forms are given: the exact fraction (computed with BigInt, so 2ⁿ never
 * overflows) and the decimal.
 */
return [
    'vars' => [
        'prob_exactly' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
        'prob_at_least' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
        'prob_at_most' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
        'expected_heads' => ['type' => 'dependent', 'rnd' => ['standard', '2']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'prob_exactly', 'vt' => 'dependent', 'l' => 'Exactly that many heads']]]],
            ['FR1', [[['t' => 'v', 'n' => 'prob_at_least', 'vt' => 'dependent', 'l' => 'At least that many heads']]]],
            ['FR1', [[['t' => 'v', 'n' => 'prob_at_most', 'vt' => 'dependent', 'l' => 'At most that many heads']]]],
            ['FR1', [[['t' => 'v', 'n' => 'expected_heads', 'vt' => 'dependent',
                       'l' => 'Expected number of heads']]]],
        ],
    ]],
    'js' => <<<'JS'
function choose(n, k) {
  /* BigInt, so 2^n stays exact for the whole range the page allows. */
  if (k < 0 || k > n) return 0n;
  var out = 1n;
  for (var i = 1n; i <= BigInt(k); i++) {
    out = out * (BigInt(n) - BigInt(k) + i) / i;
  }
  return out;
}

omni.onResult([], function (ctx, v) {
  var n = Math.round(Number(v.flips));
  var h = Math.round(Number(v.heads));
  if (!isFinite(n) || !isFinite(h) || n < 1) {
    ctx.addUnmetCondition('Enter how many flips you are making.');
    return;
  }
  if (h < 0 || h > n) {
    ctx.addUnmetCondition('The number of heads has to be between 0 and ' + n + '.');
    return;
  }
  var den = 1n << BigInt(n);
  var k, sumEq = 0n, sumLeast = 0n, sumMost = 0n;
  for (k = 0; k <= n; k++) {
    var c = choose(n, k);
    if (k === h) sumEq = c;
    if (k >= h) sumLeast += c;
    if (k <= h) sumMost += c;
  }
  var dec = function (num) { return Number(num) / Math.pow(2, n); };
  var pEq = dec(sumEq), pLeast = dec(sumLeast), pMost = dec(sumMost);

  ctx.exportValue('prob_exactly', sround(pEq, 6));
  ctx.exportValue('prob_at_least', sround(pLeast, 6));
  ctx.exportValue('prob_at_most', sround(pMost, 6));
  ctx.exportValue('expected_heads', sround(n / 2, 2));
  ctx.exportValue('exact_exactly', sround(pEq, 6));
  ctx.exportValue('exact_at_least', sround(pLeast, 6));
  ctx.exportValue('exact_at_most', sround(pMost, 6));

  ctx.addHtml('<p><strong>' + n + ' flips of a fair coin:</strong> exactly ' + h
    + ' heads is ' + sumEq.toString() + '/2^' + n + ' = ' + snum(pEq, 6)
    + '; at least ' + h + ' is ' + snum(pLeast, 6) + '; at most ' + h + ' is '
    + snum(pMost, 6) + '.</p>');
  ctx.addHtml(stable(['Question', 'Exact fraction', 'Decimal', 'Percentage'], [
    ['Exactly ' + h, sumEq.toString() + ' / 2^' + n, snum(pEq, 6), snum(pEq * 100, 4) + ' %'],
    ['At least ' + h, sumLeast.toString() + ' / 2^' + n, snum(pLeast, 6), snum(pLeast * 100, 4) + ' %'],
    ['At most ' + h, sumMost.toString() + ' / 2^' + n, snum(pMost, 6), snum(pMost * 100, 4) + ' %'],
  ]));
  ctx.addHtml('<p class="calc-unmet">Each flip is ½, so every one of the 2^' + n + ' sequences is '
    + 'equally likely. The distribution is centred on ' + snum(n / 2, 2) + ' heads.</p>');
});
JS,
];
