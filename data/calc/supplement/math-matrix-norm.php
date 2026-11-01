<?php
/**
 * /math/matrix-norm — the rows its script already publishes.
 *
 * The scan in docs/export-mismatch.json found the page script calling
 * ctx.exportValue() for these names and the definition declaring none of
 * them: the answer was computed correctly and then dropped, so the panel
 * stayed empty. This supplement declares the rows and tidies the text the
 * page publishes — the arithmetic is the page's own.
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideTexts' => true,
    'outputs' => [
        'frobenius_norm_22' => 'Frobenius norm 22',
        'frobenius_norm_23' => 'Frobenius norm 23',
        'frobenius_norm_32' => 'Frobenius norm 32',
        'frobenius_norm_33' => 'Frobenius norm 33',
        'inf_norm_22' => 'Inf norm 22',
        'inf_norm_23' => 'Inf norm 23',
        'inf_norm_32' => 'Inf norm 32',
        'inf_norm_33' => 'Inf norm 33',
        'max_norm_22' => 'Max norm 22',
        'max_norm_23' => 'Max norm 23',
        'max_norm_32' => 'Max norm 32',
        'max_norm_33' => 'Max norm 33',
        'one_norm_22' => 'One norm 22',
        'one_norm_23' => 'One norm 23',
        'one_norm_32' => 'One norm 32',
        'one_norm_33' => 'One norm 33',
        'two_norm_22' => 'Two norm 22',
        'two_norm_23' => 'Two norm 23',
        'two_norm_32' => 'Two norm 32',
        'two_norm_33' => 'Two norm 33',
    ],
    'js' => <<<'JS'
/* The page hook has already run by the time this one does, so the values
   below are its results: tidy the reference site's markup out of them
   before they reach the panel. */
omni.onResult([], function (ctx, values) {
  var rows = [
    'frobenius_norm_22',
    'frobenius_norm_23',
    'frobenius_norm_32',
    'frobenius_norm_33',
    'inf_norm_22',
    'inf_norm_23',
    'inf_norm_32',
    'inf_norm_33',
    'max_norm_22',
    'max_norm_23',
    'max_norm_32',
    'max_norm_33',
    'one_norm_22',
    'one_norm_23',
    'one_norm_32',
    'one_norm_33',
    'two_norm_22',
    'two_norm_23',
    'two_norm_32',
    'two_norm_33'
  ];
  rows.forEach(function (name) {
    var v = values[name];
    if (typeof v !== 'string' || v.trim() === '') { return; }
    var text = sclean(sdelabel(v));
    ctx.exportValue(name, text === '' ? null : text);
  });
});
JS,
];
