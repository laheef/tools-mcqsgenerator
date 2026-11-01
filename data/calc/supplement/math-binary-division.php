<?php
/**
 * /math/binary-division — the rows its script already publishes.
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
        'not_binary_err_msg_1' => 'Not binary err msg 1',
        'not_binary_err_msg_2' => 'Not binary err msg 2',
        'binary1_raw' => 'Binary1 raw',
        'binary2_raw' => 'Binary2 raw',
        'binary_result' => 'Binary',
        'decimal_result' => 'Decimal',
        'result_dec_unsigned' => 'Dec unsigned',
        'remain_bin' => 'Remain bin',
        'remain_dec' => 'Remain dec',
        'label_string1' => 'Label string1',
        'label_string2' => 'Label string2',
        'label_string3' => 'Label string3',
        'result2' => 'Result2',
        'result3' => 'Result3',
    ],
    'js' => <<<'JS'
/* The page hook has already run by the time this one does, so the values
   below are its results: tidy the reference site's markup out of them
   before they reach the panel. */
omni.onResult([], function (ctx, values) {
  var rows = [
    'not_binary_err_msg_1',
    'not_binary_err_msg_2',
    'binary1_raw',
    'binary2_raw',
    'binary_result',
    'decimal_result',
    'result_dec_unsigned',
    'remain_bin',
    'remain_dec',
    'label_string1',
    'label_string2',
    'label_string3',
    'result2',
    'result3'
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
