<?php
/**
 * Sum of the digits of a number.
 *
 * Each entry is read digit by digit — the decimal expansion, not the number —
 * so 10 contributes 1, and a negative sign or a decimal point is not a digit.
 */
return [
    'vars' => [
        'digit_sum' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'digit_count' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'digit_sum', 'vt' => 'dependent',
                       'l' => 'Sum of the digits']]]],
            ['FR1', [[['t' => 'v', 'n' => 'digit_count', 'vt' => 'dependent',
                       'l' => 'Number of digits']]]],
        ],
    ]],
    'js' => <<<'JS'
function sdigits(raw) {
  return String(raw).replace(/[^0-9]/g, '').split('').map(function (c) { return Number(c); });
}

omni.onResult([], function (ctx, v) {
  var entries = [];
  for (var i = 1; i <= 10; i++) {
    var raw = v['n_' + i];
    if (raw === undefined || raw === null || String(raw).trim() === '') continue;
    entries.push({ label: '#' + i, raw: String(raw), digits: sdigits(raw) });
  }
  if (!entries.length) {
    ctx.addUnmetCondition('Enter at least one number.');
    return;
  }
  var wantSum = String(v.SUM) !== '0';     // 1 = sum of digits, 0 = count of digits
  var combined = String(v.grouping) !== '0'; // 1 = one group, 0 = each number separately

  var allDigits = [];
  entries.forEach(function (e) { allDigits = allDigits.concat(e.digits); });
  var total = allDigits.reduce(function (a, b) { return a + b; }, 0);

  if (combined) {
    ctx.exportValue('digit_sum', total);
    ctx.exportValue('digit_count', allDigits.length);
    ctx.addHtml('<p><strong>' + entries.map(function (e) { return e.raw; }).join(' and ')
      + '</strong> treated as a single group: ' + allDigits.length + ' digits, sum '
      + total + '.</p>');
  } else {
    ctx.exportValue('digit_sum', total);
    ctx.exportValue('digit_count', allDigits.length);
    ctx.addHtml(stable(['Number', 'Digits', 'Count', 'Sum'],
      entries.map(function (e) {
        return [sesc(e.raw), e.digits.join(' + '), String(e.digits.length),
                String(e.digits.reduce(function (a, b) { return a + b; }, 0))];
      }),
      ['Total', '', String(allDigits.length), String(total)]));
  }
  ctx.addHtml('<p class="calc-unmet">' + (wantSum
    ? 'The digits add up to ' + total + (wantSum ? ' (digital root ' + droot(total) + ')' : '') + '.'
    : 'There are ' + allDigits.length + ' digits in all.') + '</p>');

  function droot(n) { return n === 0 ? 0 : 1 + (n - 1) % 9; }
});
JS,
];
