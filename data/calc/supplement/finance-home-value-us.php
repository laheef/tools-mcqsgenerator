<?php
/**
 * /finance/home-value-us — the six choices never reached the table.
 *
 * The page carries a metro-by-metro house-price index (a quarter of a megabyte
 * of it) and two helper functions that read it:
 *
 *     calc_home_value(VarYear, VarMonth, VarYearTo, VarMonthTo, VarState, price)
 *     calc_inflation(VarYear, VarMonth, VarYearTo, VarMonthTo)
 *
 * Every argument of both is a `Var…` copy of a control the visitor can see — the
 * metro area and the two dates — and nothing on the page ever filled those
 * copies in: the harvest dropped the six lines that did it. Choosing a city, a
 * purchase date, a valuation date and a price therefore produced no answer at
 * all, whatever the numbers.
 *
 * The results are then the plain consequences of the two: what the home is worth
 * now, how much that is as a change, how much inflation ran over the same years,
 * and what the value is worth in the money of the year it was bought.
 */
require_once __DIR__ . '/_builder.php';

$map = [
    'VarState' => 'state',
    'VarYear' => 'year',
    'VarMonth' => 'month',
    'VarYearTo' => 'yearTo',
    'VarMonthTo' => 'monthTo',
    'VarVal' => 'price',
];

$vars = [];
$eq = [];
foreach ($map as $var => $from) {
    $vars[$var] = ['type' => 'numerical'];
    $eq[] = [
        'formula' => $var . ' = ' . $from,
        'var' => [['l' => $var, 'f' => $from, 'r' => [$from]]],
    ];
}

$home   = 'calc_home_value(VarYear, VarMonth, VarYearTo, VarMonthTo, VarState, price)';
$infl   = 'calc_inflation(VarYear, VarMonth, VarYearTo, VarMonthTo)';
$formulas = [
    'home_value' => [$home, ['VarYear', 'VarMonth', 'VarYearTo', 'VarMonthTo', 'VarState', 'price']],
    'inflation' => ['(' . $infl . ')*100', ['VarYear', 'VarMonth', 'VarYearTo', 'VarMonthTo']],
    'perc_change' => ['(home_value - price)/price', ['home_value', 'price']],
    'real_value' => ['home_value/(1 + inflation/100)', ['home_value', 'inflation']],
    'real_change' => ['(home_value/(1 + inflation/100) - price)/price', ['home_value', 'inflation', 'price']],
];
foreach ($formulas as $lhs => $spec) {
    $eq[] = [
        'formula' => $lhs . ' = ' . $spec[0],
        'var' => [['l' => $lhs, 'f' => $spec[0], 'r' => $spec[1]]],
    ];
    /* `inflation` arrives as a presentation row, which has no box of its own;
       as a plain number it can be printed in the results list. */
    $vars[$lhs] = ['type' => 'numerical'];
}

return [
    'vars' => $vars,
    'eq' => $eq,
    'hideVars' => array_keys($map),
    'outputs' => [
        'home_value' => ['label' => 'What the home is worth now', 'precision' => '0'],
        'perc_change' => ['label' => 'Change in value', 'precision' => '2'],
        'inflation' => ['label' => 'Inflation over the same period (%)', 'precision' => '2'],
        'real_value' => ['label' => 'Worth in purchase-year money', 'precision' => '0'],
        'real_change' => ['label' => 'Real change in value', 'precision' => '2'],
    ],
];
