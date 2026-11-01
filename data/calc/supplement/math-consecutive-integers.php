<?php
/**
 * Consecutive integers — k integers in a row that add up to (or multiply to) a
 * given result.
 *
 * The page's helper searched for the first integer and published its findings in
 * `int_text`, `ope_text`, `int_text2`, `ope_text2` — four names the definition
 * does not declare, so the sentence "The integers you seek are:  since  " lost
 * both its numbers and its meaning, and Calculate ended in silence.
 *
 * The repair solves it directly:
 *
 *     sum      a + (a+d) + … = k·a + d·k(k−1)/2 = S   →  a = (S − d·k(k−1)/2) / k
 *     product  a(a+d)…(a+(k−1)d) = P                  →  searched over a
 *
 * with d = 1 for "any integers", 2 for "only even" or "only odd" (the parity of
 * the first integer then fixes the rest).
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideTexts' => true,
    'outputs' => [
        'first_integer'  => ['label' => 'First integer', 'precision' => '0'],
        'last_integer'   => ['label' => 'Last integer', 'precision' => '0'],
        'count_used'     => ['label' => 'Integers in the run', 'precision' => '0'],
    ],
    'js' => <<<'JS'
/* The run of k integers with step d that starts at a. */
function cpRun(a, k, d) {
  var out = [];
  for (var i = 0; i < k; i++) { out.push(a + i * d); }
  return out;
}
function cpSum(a, k, d) {
  return k * a + d * k * (k - 1) / 2;
}
function cpProduct(a, k, d) {
  var p = 1;
  for (var i = 0; i < k; i++) { p *= (a + i * d); }
  return p;
}

omni.onResult(['operation', 'noOfElements', 'result', 'oddOrNot'], function (ctx, values) {
  var op = Number(values.operation);
  var k = Math.round(Number(values.noOfElements));
  var parity = Number(values.oddOrNot);
  var target = Number(values.result);
  var clear = function () {
    ['first_integer', 'last_integer', 'count_used'].forEach(function (n) { ctx.exportValue(n, null); });
  };
  if (!op) {
    clear();
    ctx.addUnmetCondition('Choose whether the integers should add up to your result or multiply to it.');
    return;
  }
  if (!parity) {
    clear();
    ctx.addUnmetCondition('Choose which integers are allowed: any, only even, or only odd.');
    return;
  }
  if (!(k >= 2)) {
    clear();
    ctx.addUnmetCondition('Enter how many integers the run should hold — two or more.');
    return;
  }
  if (values.result === '' || !isFinite(target)) {
    clear();
    ctx.addUnmetCondition('Enter the result the run should add up to (or multiply to).');
    return;
  }

  var d = parity === 1 ? 1 : 2;
  var start = null;

  if (op === 1) {
    var a = (target - d * k * (k - 1) / 2) / k;
    if (Math.abs(a - Math.round(a)) < 1e-9) {
      a = Math.round(a);
      if (parity === 1 || Math.abs(a % 2) === (parity === 2 ? 0 : 1)) { start = a; }
    }
  } else {
    /* product: walk outwards from zero — the run nearest to zero wins */
    var limit = Math.max(64, Math.min(200000, Math.abs(target)));
    var best = null;
    for (var s = -limit; s <= limit; s++) {
      if (parity === 2 && s % 2 !== 0) { continue; }
      if (parity === 3 && Math.abs(s % 2) !== 1) { continue; }
      if (Math.abs(cpProduct(s, k, d)) > Math.abs(target) * 4 && s > 0) { break; }
      if (cpProduct(s, k, d) === target) { best = s; break; }
    }
    start = best;
  }

  if (start === null) {
    clear();
    ctx.addUnmetCondition('No run of ' + k + (parity === 2 ? ' even' : parity === 3 ? ' odd' : '')
      + ' consecutive integers ' + (op === 1 ? 'adds up to ' : 'multiplies to ') + snum(target, 6)
      + ' — try another result, another count, or allow any integers.');
    return;
  }

  var run = cpRun(start, k, d);
  ctx.exportValue('first_integer', start);
  ctx.exportValue('last_integer', run[run.length - 1]);
  ctx.exportValue('count_used', k);

  var joined = run.join(' + ');
  ctx.addHtml('<p><strong>The integers are ' + run.join(', ') + '</strong> — ' + joined
    + (op === 1 ? ' = ' : ' and their product is ') + snum(op === 1 ? target : cpProduct(start, k, d), 10) + '.</p>');
  ctx.addHtml(stable(['Integer', 'Value'], run.map(function (v, i) {
    return ['#' + (i + 1), String(v)];
  })));
  ctx.addHtml('<p class="calc-note">' + (op === 1
    ? 'Consecutive integers with a fixed step form an arithmetic progression, so the sum is the count times the '
      + 'average of the first and last — which is why the middle integer is simply the target divided by the '
      + 'count whenever the count is odd.'
    : 'A product of consecutive integers grows very fast, so a run of five or more around a large result is '
      + 'rare: the search here walks outward from zero and stops at the first run that matches, which is the '
      + 'one nearest zero. A zero anywhere in the run makes the product zero, whatever the other integers are.')
    + ' Negative integers are allowed, and "only even" or "only odd" keeps the step at two so the whole run '
    + 'holds the same parity.</p>');
});
JS,
];
