<?php
/**
 * /everyday-life/underline-text — the rows its script already publishes.
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
        'output_underline' => 'Underline',
        'output_double' => 'Double',
        'output_wavy' => 'Wavy',
        'output_dots' => 'Dots',
        'output_continuous' => 'Continuous',
    ],
    'js' => <<<'JS'
/* The page hook has already run by the time this one does, so the values
   below are its results: tidy the reference site's markup out of them
   before they reach the panel. */
omni.onResult([], function (ctx, values) {
  var rows = [
    'output_underline',
    'output_double',
    'output_wavy',
    'output_dots',
    'output_continuous'
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
