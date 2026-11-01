<?php
/**
 * /statistics/percentile — one list box instead of the numbered-slot wall.
 *
 * The harvest gave this page a wall of numbered boxes plus a second box hidden behind it. The visitor had to guess how many boxes to
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
        'percentile' => ['type' => 'numerical'],
    ],
    'groups' => [
        sup_group('supp-input', '', [
            sup_field(['t' => 'v', 'n' => 'numbers', 'vt' => 'text', 'l' => 'Data set']),
            sup_field(['t' => 'v', 'n' => 'percentile', 'vt' => 'numerical', 'l' => 'Percentile (0–100)']),
        ]),
    ],
    'outputs' => [
        'percentile_answer' => ['label' => 'Value at that percentile', 'precision' => '4'],
        'percentile_suf' => 'Ranked position',
        'sorted_dataset' => 'Sorted data',
        'n' => 'How many numbers',
    ],
    'js' => <<<'JS'
omni.onResult([], function (ctx) {
  var xs = snumlist(ctx.getRawInput('numbers')), n = xs.length;
  var p = Number(ctx.getRawInput('percentile'));
  if (!n) return;
  if (!isFinite(p) || p < 0 || p > 100) {
    if (ctx.getRawInput('percentile') !== '') ctx.addUnmetCondition('The percentile has to be between 0 and 100.');
    return;
  }
  var s = xs.slice().sort(function (a, b) { return a - b; });
  var pos = (p / 100) * (n - 1);
  var lo = Math.floor(pos), hi = Math.ceil(pos);
  var value = lo === hi ? s[lo] : s[lo] + (s[hi] - s[lo]) * (pos - lo);
  ctx.exportValue('percentile_answer', sround(value, 4));
  ctx.exportValue('percentile_suf', p + 'th percentile of ' + n + ' values');
  ctx.exportValue('sorted_dataset', s.join(', '));
  ctx.exportValue('n', n);
});
JS,
];
