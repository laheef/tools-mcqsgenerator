<?php
/**
 * /statistics/median — one list box instead of the numbered-slot wall.
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
        'n' => 'How many numbers',
        'lowNumbers' => 'Below the middle',
        'highNumbers' => 'Above the middle',
        'middleNumbers' => 'Middle number',
        'centreIndex' => 'Centre position',
        'sorted_dataset' => 'Sorted data',
    ],
    'js' => <<<'JS'
omni.onResult([], function (ctx) {
  var xs = snumlist(ctx.getRawInput('numbers')), n = xs.length;
  if (!n) return;
  var s = xs.slice().sort(function (a, b) { return a - b; });
  var mid = Math.floor(n / 2);
  ctx.exportValue('median', sround(smedian(s), 4));
  ctx.exportValue('n', n);
  ctx.exportValue('centreIndex', mid + 1);
  ctx.exportValue('sorted_dataset', s.join(', '));
  if (n % 2) {
    ctx.exportValue('middleNumbers', String(s[mid]));
  } else {
    ctx.exportValue('middleNumbers', s[mid - 1] + ', ' + s[mid]);
  }
  ctx.exportValue('lowNumbers', s.slice(0, mid).join(', ') || null);
  ctx.exportValue('highNumbers', (n % 2 ? s.slice(mid + 1) : s.slice(mid)).join(', ') || null);
});
JS,
];
