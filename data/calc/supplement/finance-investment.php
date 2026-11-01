<?php
/**
 * Investment calculator — the balance sheet the page worked out and hid.
 *
 * The page's own recipe (`get_message_numb`, one call per figure, each reading a
 * different slot of the same result list) filled `Balance_total`,
 * `Balance_interest`, `Final_real`, `contributions_total`, `total_principal` and
 * the `*_r` rates. None of those has a box: the form shows the inputs, the
 * results panel stayed empty, and the sentences that would have said "Your final
 * balance will be ." arrived from the harvest with the number missing.
 *
 * The rows below are the ones the recipe fills in every mode. A figure the page
 * leaves at zero belongs to another mode, so the repair drops the row instead of
 * printing a zero that reads like an answer.
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideTexts' => true,
    'outputs' => [
        'Balance_total'      => ['label' => 'Total balance', 'precision' => '2'],
        'Balance_interest'   => ['label' => 'Of which interest', 'precision' => '2'],
        'Final_real'         => ['label' => 'Balance in today\'s money', 'precision' => '2'],
        'contributions_total' => ['label' => 'Total of the additional deposits', 'precision' => '2'],
        'total_principal'    => ['label' => 'Total principal (initial plus deposits)', 'precision' => '2'],
    ],
    'js' => <<<'JS'
omni.onResult(['subject'], function (ctx, values) {
  /* The helper leaves every slot it does not use at zero; a zero balance or a
     zero deposit is not an answer, it is the absence of one. */
  ['Balance_total', 'Balance_interest', 'Final_real', 'contributions_total',
   'total_principal'].forEach(function (n) {
    var v = Number(values[n]);
    if (!isFinite(v) || v === 0) { ctx.exportValue(n, null); }
  });
});
JS,
];
