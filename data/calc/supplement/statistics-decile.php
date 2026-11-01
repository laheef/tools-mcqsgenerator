<?php
/**
 * /statistics/decile — the rows its script already publishes.
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
        'c1' => 'C1',
        'c10' => 'C10',
        'c2' => 'C2',
        'c3' => 'C3',
        'c4' => 'C4',
        'c5' => 'C5',
        'c6' => 'C6',
        'c7' => 'C7',
        'c8' => 'C8',
        'c9' => 'C9',
        'd1' => 'D1',
        'd10' => 'D10',
        'd2' => 'D2',
        'd3' => 'D3',
        'd4' => 'D4',
        'd5' => 'D5',
        'd6' => 'D6',
        'd7' => 'D7',
        'd8' => 'D8',
        'd9' => 'D9',
        'f1' => 'F1',
        'f10' => 'F10',
        'f2' => 'F2',
        'f3' => 'F3',
        'f4' => 'F4',
        'f5' => 'F5',
        'f6' => 'F6',
        'f7' => 'F7',
        'f8' => 'F8',
        'f9' => 'F9',
        'max' => 'Max',
        'mean' => 'Mean',
        'median' => 'Median',
        'min' => 'Min',
        'r1' => 'R1',
        'r10' => 'R10',
        'r2' => 'R2',
        'r3' => 'R3',
        'r4' => 'R4',
        'r5' => 'R5',
        'r6' => 'R6',
        'r7' => 'R7',
        'r8' => 'R8',
        'r9' => 'R9',
        'range' => 'Range',
        'size' => 'Size',
        'std' => 'Std',
        'test' => 'Test',
        'variance' => 'Variance',
    ],
    'js' => <<<'JS'
/* The page hook has already run by the time this one does, so the values
   below are its results: tidy the reference site's markup out of them
   before they reach the panel. */
omni.onResult([], function (ctx, values) {
  var rows = [
    'c1',
    'c10',
    'c2',
    'c3',
    'c4',
    'c5',
    'c6',
    'c7',
    'c8',
    'c9',
    'd1',
    'd10',
    'd2',
    'd3',
    'd4',
    'd5',
    'd6',
    'd7',
    'd8',
    'd9',
    'f1',
    'f10',
    'f2',
    'f3',
    'f4',
    'f5',
    'f6',
    'f7',
    'f8',
    'f9',
    'max',
    'mean',
    'median',
    'min',
    'r1',
    'r10',
    'r2',
    'r3',
    'r4',
    'r5',
    'r6',
    'r7',
    'r8',
    'r9',
    'range',
    'size',
    'std',
    'test',
    'variance'
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
