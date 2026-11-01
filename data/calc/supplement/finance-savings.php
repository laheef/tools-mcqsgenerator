<?php
/**
 * Savings calculator — the answer set the page derived and never showed.
 *
 * Sixty-three equations here work out the final balance, the split between what
 * you paid in and what the rate added, the time needed to reach a target, and
 * the rate needed to reach it sooner. Every one of those variables is declared
 * — `finalSavings`, `totalPrincipal`, `totalInterestGained`, `timeToReachYears`
 * … — and not one has a box, so the whole answer set was thrown away and the
 * page ended in "Results updated" above an empty panel. Its sentences, which
 * would at least have said "Your final savings will be .", lost their values in
 * the harvest.
 *
 * No new arithmetic: the repair gives the existing equations somewhere to write.
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideTexts' => true,
    'outputs' => [
        'finalSavings'          => ['label' => 'Final balance', 'precision' => '2'],
        'finalSavingsReal'      => ['label' => 'Final balance in today\'s money', 'precision' => '2'],
        'totalPrincipal'        => ['label' => 'Total principal (initial plus deposits)', 'precision' => '2'],
        'sumAdditionalDeposits' => ['label' => 'Sum of the additional deposits', 'precision' => '2'],
        'totalInterestGained'   => ['label' => 'Total interest earned', 'precision' => '2'],
        'annualPercentageYield' => ['label' => 'Annual percentage yield (APY), %', 'precision' => '4'],
        'timeToReachYears'      => ['label' => 'Time to reach the target, years', 'precision' => '2'],
        'timeToReachMonths'     => ['label' => 'Time to reach the target, months', 'precision' => '0'],
        'timeToReachDays'       => ['label' => 'Time to reach the target, days', 'precision' => '0'],
        'initialDepositRequired'    => ['label' => 'Initial deposit needed', 'precision' => '2'],
        'additionalDepositRequired' => ['label' => 'Additional deposit needed', 'precision' => '2'],
    ],
    /*
     * Two corrections to what the equations publish.
     *
     * `totalInterestGained` comes back as 0 on the ordinary "savings balance"
     * run: the harvested helper fills it only in one branch and leaves the
     * zero it was initialised with everywhere else. Interest earned is not a
     * matter of opinion — it is the final balance minus everything paid in — so
     * the repair states it that way.
     *
     * The other rows (time needed, deposit needed) belong to the other four
     * modes. In this mode the helper leaves them at 0, and a row reading
     * "Additional deposit needed: 0" is a wrong answer rather than a missing
     * one; a row with nothing in it is simply not shown.
     */
    'js' => <<<'JS'
omni.onResult(['subject'], function (ctx, values) {
  var final = values.finalSavings, principal = values.totalPrincipal;
  if (isFinite(final) && isFinite(principal) && final > principal && principal > 0) {
    ctx.exportValue('totalInterestGained', sround(final - principal, 2));
  }
  ['timeToReachYears', 'timeToReachMonths', 'timeToReachDays', 'finalSavingsReal',
   'initialDepositRequired', 'additionalDepositRequired'].forEach(function (n) {
    if (!(Number(values[n]) > 0)) { ctx.exportValue(n, null); }
  });
});
JS,
];
