<?php
/**
 * Common factors of two numbers.
 *
 * A common factor divides both numbers exactly, and the largest of them is the
 * greatest common divisor. Both are listed, because "the common factors of 36
 * and 60" is a list, not a single number.
 */
return [
    'vars' => [
        'greatest_common_factor' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'factor_count' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'common_factor_list' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'greatest_common_factor', 'vt' => 'dependent',
                       'l' => 'Greatest common factor']]]],
            ['FR1', [[['t' => 'v', 'n' => 'factor_count', 'vt' => 'dependent',
                       'l' => 'How many common factors']]]],
            ['FR1', [[['t' => 'v', 'n' => 'common_factor_list', 'vt' => 'dependent',
                       'l' => 'Number of pairs in the list']]]],
        ],
    ]],
    'js' => <<<'JS'
function cfactors(n) {
  var out = [];
  n = Math.abs(Math.round(n));
  for (var d = 1; d * d <= n; d++) {
    if (n % d !== 0) continue;
    out.push(d);
    if (d !== n / d) out.push(n / d);
  }
  return out.sort(function (a, b) { return a - b; });
}

omni.onResult([], function (ctx, v) {
  var a = Number(v.number), b = Number(v.number2);
  if (v.number === '' || v.number2 === '' || !isFinite(a) || !isFinite(b)) {
    ctx.addUnmetCondition('Enter both numbers.');
    return;
  }
  a = Math.round(a); b = Math.round(b);
  if (a === 0 && b === 0) {
    ctx.addUnmetCondition('Every number divides zero, so two zeros have no common factors to list.');
    return;
  }
  var fa = cfactors(a === 0 ? b : a), fb = cfactors(b === 0 ? a : b);
  var common = fa.filter(function (d) { return fb.indexOf(d) !== -1; });
  var gcd = common[common.length - 1] || 1;

  ctx.exportValue('greatest_common_factor', gcd);
  ctx.exportValue('factor_count', common.length);
  ctx.exportValue('common_factor_list', common.length);

  ctx.addHtml('<p><strong>The common factors of ' + snum(a, 0) + ' and ' + snum(b, 0)
    + ' are ' + common.join(', ') + '; the greatest is ' + snum(gcd, 0) + '.</strong></p>');
  ctx.addHtml(stable(['Factor', 'Divides ' + snum(a, 0) + ' as', 'Divides ' + snum(b, 0) + ' as'],
    common.map(function (d) {
      return [String(d), snum(a / d, 4) + ' × ' + snum(d, 0), snum(b / d, 4) + ' × ' + snum(d, 0)];
    })));
  var prime = function (n) {
    if (n < 2) return false;
    for (var d = 2; d * d <= n; d++) if (n % d === 0) return false;
    return true;
  };
  ctx.addHtml('<p class="calc-unmet">' + snum(a, 0) + ' has ' + fa.length + ' factors, '
    + snum(b, 0) + ' has ' + fb.length + '. ' + (gcd === 1
      ? 'Nothing but 1 divides both, so the two numbers are coprime.'
      : 'Their greatest common factor is ' + snum(gcd, 0)
        + (prime(gcd) ? ', which is prime.' : '.')) + '</p>');
});
JS,
];
