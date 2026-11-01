<?php
/**
 * /chemistry/molar-mass-of-gas — two numbers from one measurement.
 *
 * The harvested page could not answer at any set of sensible values, for three
 * separate reasons:
 *
 *   1. `gas_constant` was a `dependent` with no stored default, so the solver
 *      seeded it with 0 and every equation that divides by it ran off to
 *      infinity. A row called "gas constant" also sat in the results panel as a
 *      box nobody could fill. The constant is not something a visitor is asked
 *      to type: it is taken off the form and supplied here.
 *   2. The molar-mass equation fed a mass in kilograms (the unit the solver
 *      works in) straight into a value the page labels grams per mole, so 44 g
 *      of gas came back as 0.0457 instead of 45.7.
 *   3. The temperature equations read degrees Celsius as kelvins. Every
 *      temperature unit is defined as an offset from Celsius — that is the base
 *      of the set — so a gas at 25 °C was being treated as 25 K.
 *
 * The ideal-gas law is two lines, so both are stated here in the solver's own
 * units: pascals, cubic metres, kilograms, degrees Celsius.
 */
require_once __DIR__ . '/_builder.php';

$n = 'pressure * volume / (gas_constant * (temp + 273.15))';
$m = 'mass * 1000 / moles';

return [
    'hideTexts' => true,
    'hideVars' => ['gas_constant'],
    'replaceEq' => true,
    'vars' => [
        'gas_constant' => ['type' => 'dependent', 'dfl' => [['v' => '8.314462618']]],
    ],
    'outputs' => [
        'moles' => ['label' => 'Amount of gas (mol)', 'precision' => '6'],
        'molar_mass' => ['label' => 'Molar mass (g/mol)', 'precision' => '2'],
    ],
    'eq' => [
        ['formula' => 'moles = ' . $n, 'var' => [['l' => 'moles', 'f' => $n, 'r' => ['pressure', 'volume', 'gas_constant', 'temp']]]],
        ['formula' => 'molar_mass = ' . $m, 'var' => [['l' => 'molar_mass', 'f' => $m, 'r' => ['mass', 'moles']]]],
    ],
];
