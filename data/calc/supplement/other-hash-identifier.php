<?php
/**
 * /other/hash-identifier — the rows its script already publishes.
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
        'hex_hash' => ['type' => 'text'],
    ],
    'outputs' => [
        'res' => 'Res',
    ],
    'js' => <<<'JS'
/* The page hook has already run by the time this one does, so the values
   below are its results: tidy the reference site's markup out of them
   before they reach the panel. */
omni.onResult([], function (ctx, values) {
  var rows = [
    'res'
  ];
  rows.forEach(function (name) {
    var v = values[name];
    if (typeof v !== 'string' || v.trim() === '') { return; }
    /* the page prefixes its list with the id of a mode option that is not on
       the page, so the id cannot be looked up: drop it instead of printing it */
    var text = sclean(sdelabel(v)).replace(/^[A-Za-z0-9_-]{20,28},\s*/, '');
    ctx.exportValue(name, text);
  });
});
JS,
];
