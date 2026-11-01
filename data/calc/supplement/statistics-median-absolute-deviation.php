<?php
/**
 * /statistics/median-absolute-deviation — one list box instead of the numbered-slot wall.
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
        'median' => ['label' => 'Median', 'precision' => '4'],
        'mad' => ['label' => 'Median absolute deviation', 'precision' => '4'],
        'n' => 'How many numbers',
        'sorted_dataset' => 'Sorted data',
    ],
    'js' => <<<'JS'
omni.onResult([], function (ctx) {
  var xs = snumlist(ctx.getRawInput('numbers')), n = xs.length;
  if (!n) return;
  var s = xs.slice().sort(function (a, b) { return a - b; });
  var med = smedian(s);
  var dev = s.map(function (x) { return Math.abs(x - med); }).sort(function (a, b) { return a - b; });
  ctx.exportValue('median', sround(med, 4));
  ctx.exportValue('mad', sround(smedian(dev), 4));
  ctx.exportValue('n', n);
  ctx.exportValue('sorted_dataset', s.join(', '));
});
JS,
];
