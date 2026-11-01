<?php
/**
 * /math/matrix-power — the rows its script already publishes.
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
        'D_label' => 'D label',
        'D_row1' => 'D row1',
        'D_row2' => 'D row2',
        'D_row3' => 'D row3',
        'D_row4' => 'D row4',
        'S_label' => 'S label',
        'S_row1' => 'S row1',
        'S_row2' => 'S row2',
        'S_row3' => 'S row3',
        'S_row4' => 'S row4',
        'expTranslation' => 'Exp translation',
        'final_left1' => 'Final left1',
        'final_left2' => 'Final left2',
        'final_left3' => 'Final left3',
        'final_left4' => 'Final left4',
        'final_right1' => 'Final right1',
        'final_right2' => 'Final right2',
        'final_right3' => 'Final right3',
        'final_right4' => 'Final right4',
        'result2Text' => 'Result2 text',
        'result3Text' => 'Result3 text',
        'result4Text' => 'Result4 text',
        'resultText' => 'Text',
    ],
    'js' => <<<'JS'
/* The page hook has already run by the time this one does, so the values
   below are its results: tidy the reference site's markup out of them
   before they reach the panel. */
omni.onResult([], function (ctx, values) {
  var rows = [
    'D_label',
    'D_row1',
    'D_row2',
    'D_row3',
    'D_row4',
    'S_label',
    'S_row1',
    'S_row2',
    'S_row3',
    'S_row4',
    'expTranslation',
    'final_left1',
    'final_left2',
    'final_left3',
    'final_left4',
    'final_right1',
    'final_right2',
    'final_right3',
    'final_right4',
    'result2Text',
    'result3Text',
    'result4Text',
    'resultText'
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
