<?php
/**
 * /statistics/iqr — one list box instead of the numbered-slot wall.
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
        'lqr' => ['label' => 'Lower quartile (Q1)', 'precision' => '4'],
        'uqr' => ['label' => 'Upper quartile (Q3)', 'precision' => '4'],
        'iqr' => ['label' => 'Interquartile range', 'precision' => '4'],
        'n' => 'How many numbers',
        'sorted_dataset' => 'Sorted data',
    ],
    'js' => <<<'JS'
omni.onResult([], function (ctx) {
  var xs = snumlist(ctx.getRawInput('numbers')), n = xs.length;
  if (n < 4) {
    if (n) ctx.addUnmetCondition('Add at least four numbers — quartiles split a set in four.');
    return;
  }
  var s = xs.slice().sort(function (a, b) { return a - b; });
  var mid = Math.floor(n / 2);
  var lower = s.slice(0, mid), upper = n % 2 ? s.slice(mid + 1) : s.slice(mid);
  var q1 = smedian(lower), q3 = smedian(upper);
  ctx.exportValue('lqr', sround(q1, 4));
  ctx.exportValue('uqr', sround(q3, 4));
  ctx.exportValue('iqr', sround(q3 - q1, 4));
  ctx.exportValue('n', n);
  ctx.exportValue('sorted_dataset', s.join(', '));
});
JS,
];
