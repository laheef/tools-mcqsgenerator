<?php
/**
 * /statistics/simpsons-diversity-index — one list box instead of the numbered-slot wall.
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
            sup_field(['t' => 'v', 'n' => 'numbers', 'vt' => 'text', 'l' => 'Count per species']),
        ]),
    ],
    'outputs' => [
        'D_result' => ['label' => 'Simpson index (D)', 'precision' => '6'],
        'D_recip_result' => ['label' => 'Reciprocal index (1/D)', 'precision' => '6'],
        'di_result' => ['label' => 'Gini–Simpson index (1 − D)', 'precision' => '6'],
        'n' => 'Total individuals',
        'species' => 'How many species',
    ],
    'js' => <<<'JS'
omni.onResult([], function (ctx) {
  var counts = snumlist(ctx.getRawInput('numbers')).filter(function (x) { return x >= 0; });
  if (!counts.length) return;
  var N = counts.reduce(function (a, b) { return a + b; }, 0);
  if (N < 2) {
    ctx.addUnmetCondition('Add at least two individuals across the species — diversity needs a pair to compare.');
    return;
  }
  var pairs = counts.reduce(function (a, c) { return a + c * (c - 1); }, 0);
  var D = pairs / (N * (N - 1));
  ctx.exportValue('D_result', sround(D, 6));
  ctx.exportValue('D_recip_result', D > 0 ? sround(1 / D, 6) : null);
  ctx.exportValue('di_result', sround(1 - D, 6));
  ctx.exportValue('n', N);
  ctx.exportValue('species', counts.length);
});
JS,
];
