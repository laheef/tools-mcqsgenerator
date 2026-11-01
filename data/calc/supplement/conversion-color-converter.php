<?php
/**
 * /conversion/color-converter — the rows its script already publishes.
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
        'result_color_name' => 'Colour name',
        'result_rgb_R' => 'Red',
        'result_rgb_G' => 'Green',
        'result_rgb_B' => 'Blue',
        'result_Hex' => 'Hex colour',
        'result_hsl_H' => 'HSL h',
        'result_hsl_S' => 'HSL s',
        'result_hsl_L' => 'HSL l',
        'result_hwb_H' => 'Hwb h',
        'result_hwb_W' => 'Hwb W',
        'result_hwb_B' => 'Hwb b',
        'result_cmyk_C' => 'Cmyk c',
        'result_cmyk_M' => 'Cmyk m',
        'result_cmyk_Y' => 'Cmyk y',
        'result_cmyk_K' => 'Cmyk k',
        'result_ncol_H' => 'Ncol h',
        'result_ncol_W' => 'Ncol W',
        'result_ncol_B' => 'Ncol b',
    ],
    'js' => <<<'JS'
/* The page hook has already run by the time this one does, so the values
   below are its results: tidy the reference site's markup out of them
   before they reach the panel. */
omni.onResult([], function (ctx, values) {
  var rows = [
    'result_color_name',
    'result_rgb_R',
    'result_rgb_G',
    'result_rgb_B',
    'result_Hex',
    'result_hsl_H',
    'result_hsl_S',
    'result_hsl_L',
    'result_hwb_H',
    'result_hwb_W',
    'result_hwb_B',
    'result_cmyk_C',
    'result_cmyk_M',
    'result_cmyk_Y',
    'result_cmyk_K',
    'result_ncol_H',
    'result_ncol_W',
    'result_ncol_B'
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
