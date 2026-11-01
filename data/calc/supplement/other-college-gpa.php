<?php
/**
 * /other/college-gpa — the rows its script already publishes.
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
        'count1' => 'Count1',
        'count2' => 'Count2',
        'course_s' => 'Course s',
        'credit_input_s' => 'Credit input s',
        'however_string' => 'However string',
        'initial_2' => 'Initial 2',
        'initial_3' => 'Initial 3',
        'missing_credits' => 'Missing credits',
        'number_of_vars' => 'Number of vars',
        'result_cgpa' => 'Cgpa',
        'result_gpa' => 'Gpa',
    ],
    'js' => <<<'JS'
/* The page hook has already run by the time this one does, so the values
   below are its results: tidy the reference site's markup out of them
   before they reach the panel. */
omni.onResult([], function (ctx, values) {
  var rows = [
    'count1',
    'count2',
    'course_s',
    'credit_input_s',
    'however_string',
    'initial_2',
    'initial_3',
    'missing_credits',
    'number_of_vars',
    'result_cgpa',
    'result_gpa'
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
