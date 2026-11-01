<?php
/**
 * /finance/mega-millions-payout — the copies the tax table reads.
 *
 * The page's arithmetic is a full annuity schedule with the federal brackets and
 * a state rate. Every one of its formulas is fed from `Var…` copies of the
 * drop-downs — VarStat is the filing status, VarTax the state, VarRep the report
 * the visitor asked for, and so on — and nothing on the page ever filled those
 * copies in: the harvest dropped the lines that did it. The solver found them
 * declared `dependent` with no value, stood a 0 in for each, and every formula
 * that divides by one of them stalled with "not a number".
 *
 * These equations are the missing wiring, and the copies are taken off the form
 * so they are worked out rather than asked for.
 */
require_once __DIR__ . '/_builder.php';

$map = [
    'VarStat' => 'Stat',
    'VarTax' => 'TaxState',
    'VarRep' => 'Rep',
    'VarSub' => 'Subject',
    'VarTime' => 'Timing',
    'VarType' => 'Type',
    'VarTable' => 'TableFreq',
    'm' => 'CompFreq',
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

/*
 * The page has a form and no results at all: its model computes the lump sum,
 * the two taxes and the net into variables that never had a box of their own,
 * and the reference paints them into a table the harvest did not keep. The five
 * numbers the visitor came for are printed here.
 */
return [
    'vars' => $vars,
    'eq' => $eq,
    'hideVars' => array_keys($map),
    'outputs' => [
        'GrossCash' => ['label' => 'Lump sum before tax', 'precision' => '2'],
        'TaxFedCash_24' => ['label' => 'Federal withholding at 24%', 'precision' => '2'],
        'TaxFedCash' => ['label' => 'Additional federal tax', 'precision' => '2'],
        'TaxStateCash' => ['label' => 'State tax', 'precision' => '2'],
        'NetCash' => ['label' => 'Lump sum after tax', 'precision' => '2'],
    ],
];
