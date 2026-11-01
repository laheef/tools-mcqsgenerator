<?php
/**
 * /statistics/range — one list box instead of the numbered-slot wall.
 *
 * The harvest gave this page a wall of numbered boxes (one per possible observation). The visitor had to guess how many boxes to
 * fill and the answer only appeared if the right ones were chosen. This
 * supplement retires that form (`replaceGroups`), asks for the numbers in a
 * single box the way the page is actually used, and publishes
 * the answers the page asks for — the arithmetic below is the standard definition, checked
 * against the textbook result.
 */
require_once __DIR__ . '/_builder.php';

return [
    'replaceGroups' => true,
    'replaceJs' => true,
    'hideTexts' => true,
    'vars' => [
        'numbers' => ['type' => 'text'],
    ],
    'groups' => [
        sup_group('supp-input', '', [
            sup_field(['t' => 'v', 'n' => 'numbers', 'vt' => 'text', 'l' => 'Data set']),
        ]),
    ],
    'outputs' => [
        'min_value' => ['label' => 'Minimum', 'precision' => '4'],
        'max_value' => ['label' => 'Maximum', 'precision' => '4'],
        'range' => ['label' => 'Range', 'precision' => '4'],
        'n' => 'How many numbers',
    ],
    'js' => <<<'JS'
omni.onResult([], function (ctx) {
  var xs = snumlist(ctx.getRawInput('numbers')), n = xs.length;
  if (n < 2) {
    if (n === 1) ctx.addUnmetCondition('Add at least two numbers — a range needs a smallest and a largest.');
    return;
  }
  var sorted = xs.slice().sort(function (a, b) { return a - b; });
  ctx.exportValue('min_value', sorted[0]);
  ctx.exportValue('max_value', sorted[n - 1]);
  ctx.exportValue('range', sorted[n - 1] - sorted[0]);
  ctx.exportValue('n', n);
});
JS,
];
