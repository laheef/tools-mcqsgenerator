<?php
/**
 * /finance/lottery-annuity — 30 years, not 946 728 000 of them.
 *
 * The model behind this page is complete: thirty years of payments rising with
 * the payout increase, the payments invested at the return rate, the federal
 * brackets for each filing status, and three tax modes (none, US taxes, a custom
 * rate). Two things stopped it working.
 *
 *   * The `years` box carries a unit of time, so the engine stores 30 years as
 *     946 728 000 seconds and handed the schedule that number: `q*t` periods is
 *     not a calculation anybody would wait for, and it returned nothing usable.
 *   * The rate boxes are optional — you only fill the ones your tax mode uses —
 *     but the page's helper multiplies by all three of them whatever the mode
 *     is, so one empty box turned every total into NaN.
 *
 * The formulas below pass the years the visitor typed, and each result has a
 * variant for "no state rate", "no custom rates" and "no rates at all": the
 * first variant whose inputs are all present is the one that runs.
 */
require_once __DIR__ . '/_builder.php';

$args = ['winnings', 'years/31557600', 'payoutIncrease', 'returnRate', 'taxMode', 'filingStatus'];
$deps = ['winnings', 'years', 'payoutIncrease', 'returnRate', 'taxMode', 'filingStatus'];

function sup_lot_eq(string $lhs, array $args, array $deps, array $rateVariants): array
{
    $variants = [];
    foreach ($rateVariants as $rates) {
        $all = array_merge($args, $rates[0]);
        $formula = 'getFederalOrCustom1(' . implode(', ', $all) . ')';
        $variants[] = [
            'l' => $lhs,
            'f' => $formula,
            'r' => array_merge($deps, $rates[1]),
        ];
    }
    return ['formula' => $lhs . ' = getFederalOrCustom1(…)', 'var' => $variants];
}

return [
    'replaceEq' => true,
    'eq' => [
        sup_lot_eq('federalOrCustom1', $args, $deps, [
            [['stateTax', 'taxRate', 'taxRate2'], ['stateTax', 'taxRate', 'taxRate2']],
            /* the custom-rate mode reads the two custom rates and ignores the
               state rate, so that pair is a variant of its own */
            [['0', 'taxRate', 'taxRate2'], ['taxRate', 'taxRate2']],
            [['stateTax', '0', '0'], ['stateTax']],
            [['0', '0', '0'], []],
        ]),
        ['formula' => 'stateOrCustom2 = getStateOrCustom2(taxMode)',
         'var' => [['l' => 'stateOrCustom2', 'f' => 'getStateOrCustom2(taxMode)', 'r' => ['taxMode']]]],
        ['formula' => 'netPayout = getNetPayout(taxMode)',
         'var' => [['l' => 'netPayout', 'f' => 'getNetPayout(taxMode)',
                    'r' => ['taxMode', 'federalOrCustom1']]]],
    ],
    'outputs' => [
        'federalOrCustom1' => ['label' => 'Federal tax over the whole payout', 'precision' => '2'],
        'stateOrCustom2' => ['label' => 'State tax over the whole payout', 'precision' => '2'],
        'netPayout' => ['label' => 'What you keep, after tax', 'precision' => '2'],
    ],
];
