<?php
/**
 * /math/significant-figures — the answer is published under five names.
 *
 * The page's script hands its result over as `formattedResultWithComment0` …
 * `formattedResultWithComment4`: the reference site paints them into one line,
 * marking the significant digits as it goes. The harvested record kept no box
 * for any of them, so the working ran, the numbers were published, and the page
 * still had nothing to show.
 *
 * The gatherer below folds them into two boxes: the rounded answer (with the
 * mark-up characters the reference used for emphasis stripped out) and the
 * working.
 */
require_once __DIR__ . '/_builder.php';

return [
    'outputs' => [
        'formattedResultWithComment' => ['label' => 'Answer'],
        'formattedSteps' => ['label' => 'Working'],
    ],
    'js' => <<<'JS'
omni.onResult([], function (ctx) {
  function plain(s) {
    return String(s === null || s === undefined ? '' : s)
      .replace(/!!/g, '')
      .replace(/\*\*/g, '')
      .replace(/\^\^(\d+)\^\^/g, '^$1')
      .replace(/\^\^/g, '');
  }
  var main = plain(ctx.getInput('formattedResultWithComment0'));
  if (!main) { return; }
  var sci = plain(ctx.getInput('formattedResultWithComment3'));
  var text = main;
  if (sci && sci !== main) { text += ' (in scientific notation: ' + sci + ')'; }
  ctx.exportValue('formattedResultWithComment', text);
  var steps = plain(ctx.getInput('formattedSteps'));
  if (steps) {
    /* the reference separates the steps with its own line breaks, which the
       harvest flattened; put one back before each numbered step */
    steps = steps.replace(/\)(?=\s*\d+\.\s)/g, ')\n');
    ctx.exportValue('formattedSteps', steps);
  }
});
JS,
];
