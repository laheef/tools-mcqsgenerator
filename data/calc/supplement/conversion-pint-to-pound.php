<?php
/**
 * /conversion/pint-to-pound — the ingredient picker becomes the density box.
 *
 * The harvested form carries ten drop-downs (liquid, dairy, oil, …) and eleven
 * density boxes behind them, and `get_density(ingredient, …)` reads whichever
 * one the integer `ingredient` points at. Rendered here those drop-downs change
 * nothing a visitor can see and the integer is never set, so the page answers
 * nothing. Pinning `ingredient` to 0 makes `get_density` return the density the
 * visitor types, and every control that cannot affect the answer is hidden.
 */
require_once __DIR__ . '/_builder.php';

return [
    'vars' => [
        'ingredient' => ['type' => 'dependent', 'defaults' => [['value' => '0']]],
    ],
    'hideVars' => [
        'more', 'ingredient', 'liquid', 'dairy', 'oil', 'fruit_or_vegetable', 'flour',
        'sweetner', 'cereal', 'nut', 'sauce_or_condiment', 'herbs_and_spices',
        'density_liquid', 'density_dairy', 'density_oil', 'density_fruit_or_vegetable',
        'density_flour', 'density_sweetener', 'density_cereal', 'density_nut',
        'density_sauce_or_condiment', 'density_herbs_and_spices',
    ],
    'hideTexts' => true,
];
