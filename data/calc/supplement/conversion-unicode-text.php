<?php
/**
 * /conversion/unicode-text — the rows its script already publishes.
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
    'vars' => [
        'input_text' => ['type' => 'text'],
    ],
    'outputs' => [
        'result_circle' => 'Circle',
        'result_negative_circle' => 'Negative circle',
        'result_square' => 'Square',
        'result_negative_square' => 'Negative square',
        'result_inverted' => 'Inverted',
        'result_inverted_reversed' => 'Inverted reversed',
        'result_monospace' => 'Monospace',
    ],
    'js' => <<<'JS'
/* The page hook has already run by the time this one does, so the values
   below are its results: tidy the reference site's markup out of them
   before they reach the panel. */
omni.onResult([], function (ctx, values) {
  var rows = [
    'result_circle',
    'result_negative_circle',
    'result_square',
    'result_negative_square',
    'result_inverted',
    'result_inverted_reversed',
    'result_monospace'
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
