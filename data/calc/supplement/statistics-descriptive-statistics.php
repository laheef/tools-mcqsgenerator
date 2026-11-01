<?php
/**
 * /statistics/descriptive-statistics — the rows its script already publishes.
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
        'fence_1' => 'Fence 1',
        'fence_2' => 'Fence 2',
        'iqr' => 'Iqr',
        'kurtosis' => 'Kurtosis',
        'max' => 'Max',
        'mean' => 'Mean',
        'median' => 'Median',
        'midrange' => 'Midrange',
        'min' => 'Min',
        'modes' => 'Modes',
        'outliers' => 'Outliers',
        'q1' => 'Q1',
        'q3' => 'Q3',
        'range' => 'Range',
        'size' => 'Size',
        'skewness' => 'Skewness',
        'std' => 'Std',
        'ste' => 'Ste',
        'sum' => 'Sum',
        'variance' => 'Variance',
    ],
    'js' => <<<'JS'
/* The page hook has already run by the time this one does, so the values
   below are its results: tidy the reference site's markup out of them
   before they reach the panel. */
omni.onResult([], function (ctx, values) {
  var rows = [
    'fence_1',
    'fence_2',
    'iqr',
    'kurtosis',
    'max',
    'mean',
    'median',
    'midrange',
    'min',
    'modes',
    'outliers',
    'q1',
    'q3',
    'range',
    'size',
    'skewness',
    'std',
    'ste',
    'sum',
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
