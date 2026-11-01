<?php
/**
 * /statistics/percentile-rank — one list box instead of the numbered-slot wall.
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
        'which_value' => ['type' => 'numerical'],
    ],
    'groups' => [
        sup_group('supp-input', '', [
            sup_field(['t' => 'v', 'n' => 'numbers', 'vt' => 'text', 'l' => 'Data set']),
            sup_field(['t' => 'v', 'n' => 'which_value', 'vt' => 'numerical', 'l' => 'Value to rank']),
        ]),
    ],
    'outputs' => [
        'percentile_rank' => ['label' => 'Percentile rank', 'precision' => '2'],
        'n' => 'How many numbers',
        'sorted_dataset' => 'Sorted data',
    ],
    'js' => <<<'JS'
omni.onResult([], function (ctx) {
  var xs = snumlist(ctx.getRawInput('numbers')), n = xs.length;
  var x = Number(ctx.getRawInput('which_value'));
  if (!n) return;
  if (!isFinite(x) || ctx.getRawInput('which_value') === '') {
    if (ctx.getRawInput('which_value') !== '') ctx.addUnmetCondition('Type the value whose rank you want as a number.');
    return;
  }
  var below = xs.filter(function (v) { return v < x; }).length;
  var equal = xs.filter(function (v) { return v === x; }).length;
  ctx.exportValue('percentile_rank', sround((below + 0.5 * equal) / n * 100, 2));
  ctx.exportValue('n', n);
  ctx.exportValue('sorted_dataset', xs.slice().sort(function (a, b) { return a - b; }).join(', '));
});
JS,
];
