<?php
/**
 * Integer calculator — the two numbers and the operation between them.
 *
 * The nine variables were all here: `a`, `b`, the operation to perform, and the
 * seven results, each with an equation in both directions. What was missing was
 * a place to show them: not one result has a box, so Calculate derived seven
 * numbers, printed none, and left the page in the "Results updated" state above
 * an empty panel. The step lines that could have carried them came back from the
 * harvest with their value slots stripped ("a + b =  ").
 *
 * The repair gives every operation a row in the results panel, and the one the
 * visitor picked becomes the headline above them.
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideTexts' => true,
    'outputs' => [
        'res1' => ['label' => 'a + b', 'precision' => '6'],
        'res2' => ['label' => 'a − b', 'precision' => '6'],
        'res3' => ['label' => 'a × b', 'precision' => '6'],
        'res4' => ['label' => 'a ÷ b', 'precision' => '6'],
        'res5' => ['label' => 'a to the power b', 'precision' => '6'],
        'res6' => ['label' => 'b-th root of a (a^(1/b))', 'precision' => '6'],
        'res7' => ['label' => 'log base b of a', 'precision' => '6'],
    ],
    'js' => <<<'JS'
omni.onResult(['a', 'b', 'operation'], function (ctx, values) {
  var a = values.a, b = values.b, op = values.operation;
  if (a === null || a === undefined || b === null || b === undefined) {
    ctx.addUnmetCondition('Enter both integers — the operation is worked out from them.');
    return;
  }
  if (!op) {
    ctx.addUnmetCondition('Choose an operation: addition, subtraction, multiplication, division, exponent, root or logarithm.');
    return;
  }
  var names = { 1: ' + ', 2: ' − ', 3: ' × ', 4: ' ÷ ' };
  var rows = [
    ['Addition', 'a + b', snum(a + b, 6)],
    ['Subtraction', 'a − b', snum(a - b, 6)],
    ['Multiplication', 'a × b', snum(a * b, 6)],
    ['Division', 'a ÷ b', b === 0 ? 'undefined' : snum(a / b, 6)],
    ['Exponent', 'a^b', snum(Math.pow(a, b), 6)],
    ['Root', 'a^(1/b)', b === 0 ? 'undefined' : (a < 0 && Math.round(b) % 2 === 0 ? 'not real' : snum(Math.pow(a, 1 / b), 6))],
    ['Logarithm', 'log_b(a)', (a <= 0 || b <= 0 || b === 1) ? 'undefined' : snum(Math.log(a) / Math.log(b), 6)]
  ];
  var pick = rows[Number(op) - 1];
  ctx.addHtml('<p><strong>' + pick[1] + ' = ' + pick[2] + '</strong> for a = ' + snum(a, 6)
    + ' and b = ' + snum(b, 6) + '.</p>');
  ctx.addHtml(stable(['Operation', 'Expression', 'Result'],
    rows.map(function (r) { return [r[0] === pick[0] ? '<strong>' + r[0] + '</strong>' : r[0], r[1], r[2]]; })));
  ctx.addHtml('<p class="calc-note">All seven operations are computed; the one you chose is the row in the '
    + 'headline above and in the table. Division by zero and the logarithm of a non-positive number have no value, and an '
    + 'even root of a negative number is not a real number — those are printed as such instead of as '
    + 'Infinity or NaN' + (names[op] ? '' : '') + '. Exponents and roots use floating-point arithmetic, so a '
    + 'very large power loses its last digits; the fractional part is kept to six places.</p>');
});
JS,
];
