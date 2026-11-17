<?php

/**
 * Cost function
 * /finance/cost-function
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cost function',
    'meta' => ['title' => 'Cost function Calculator — Formula & Results', 'description' => 'Cost function takes calculation type and returns total variable cost. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Cost function Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'calculation_type',
                            'label' => 'Calculation type',
                            'type' => 'select',
                            'options' => ['Use fixed and variable costs' => '1', 'Find cost function from two point costs' => '2'],
                            'dataset' => 'calculation_type',
                            'default' => 'Use fixed and variable costs',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fixed_cost',
                            'label' => 'Fixed cost',
                            'type' => 'number',
                            'help' => 'The baseline expenses that remain constant regardless of production volume (e.g., rent, insurance, salaries).',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'variable_cost_per_unit',
                            'label' => 'Variable cost per unit',
                            'type' => 'number',
                            'help' => 'The additional cost incurred to produce each individual unit (e.g., raw materials, packaging, direct labor).',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'quantity',
                            'label' => 'Quantity',
                            'type' => 'number',
                            'help' => 'The total number of units produced or planned for evaluation.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'quantity1',
                            'label' => 'Quantity 1',
                            'type' => 'number',
                            'help' => 'The production volume for your first known data point.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_cost_at_quantity1',
                            'label' => 'Total cost of quantity 1',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'quantity2',
                            'label' => 'Quantity 2',
                            'type' => 'number',
                            'help' => 'The production volume for your second known data point.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_cost_at_quantity2',
                            'label' => 'Total cost of quantity 2',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'quantity_evaluated',
                            'label' => 'Quantity to evaluate',
                            'type' => 'number',
                            'help' => 'The target production volume to estimate total and per-unit costs.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Results',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Fill in all the fields to get your results!'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Fill in all the fields to get your results!'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'hidden',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_cost',
                            'label' => 'Total cost',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'average_total_cost',
                            'label' => 'Average cost per unit',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_variable_cost',
                            'label' => 'Total variable cost',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'average_fixed_cost',
                            'label' => 'Average fixed cost',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fixed_cost_bis',
                            'label' => 'Fixed cost',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'variable_cost_per_unit_bis',
                            'label' => 'Variable cost per unit',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_variable_cost_bis',
                            'label' => 'Total variable cost',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_cost_bis',
                            'label' => 'Total cost',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'average_cost_per_unit_bis',
                            'label' => 'Average cost per unit',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'total_variable_cost = variable_cost_per_unit * quantity',
            'results' => ['quantity' => 'total_variable_cost/variable_cost_per_unit', 'total_variable_cost' => 'quantity*variable_cost_per_unit', 'variable_cost_per_unit' => 'total_variable_cost/quantity'],
        ],
        [
            'title' => 'total_cost = fixed_cost + (variable_cost_per_unit * quantity)',
            'results' => ['quantity' => '(-fixed_cost + total_cost)/variable_cost_per_unit', 'total_cost' => 'fixed_cost + quantity*variable_cost_per_unit', 'variable_cost_per_unit' => '(-fixed_cost + total_cost)/quantity', 'fixed_cost' => '-quantity*variable_cost_per_unit + total_cost'],
        ],
        [
            'title' => 'average_fixed_cost = fixed_cost / quantity',
            'results' => ['quantity' => 'fixed_cost/average_fixed_cost', 'average_fixed_cost' => 'fixed_cost/quantity', 'fixed_cost' => 'average_fixed_cost*quantity'],
        ],
        [
            'title' => 'average_total_cost = total_cost / quantity',
            'results' => ['quantity' => 'total_cost/average_total_cost', 'total_cost' => 'average_total_cost*quantity', 'average_total_cost' => 'total_cost/quantity'],
        ],
        [
            'title' => 'variable_cost_per_unit_bis = (total_cost_at_quantity2 - total_cost_at_quantity1) / (quantity2 - quantity1)',
            'results' => [
                'quantity1' => '(quantity2*variable_cost_per_unit_bis + total_cost_at_quantity1 - total_cost_at_quantity2)/variable_cost_per_unit_bis',
                'quantity2' => '(quantity1*variable_cost_per_unit_bis - total_cost_at_quantity1 + total_cost_at_quantity2)/variable_cost_per_unit_bis',
                'variable_cost_per_unit_bis' => '(total_cost_at_quantity1 - total_cost_at_quantity2)/(quantity1 - quantity2)',
                'total_cost_at_quantity1' => 'quantity1*variable_cost_per_unit_bis - quantity2*variable_cost_per_unit_bis + total_cost_at_quantity2',
                'total_cost_at_quantity2' => '-quantity1*variable_cost_per_unit_bis + quantity2*variable_cost_per_unit_bis + total_cost_at_quantity1',
            ],
        ],
        [
            'title' => 'fixed_cost_bis = total_cost_at_quantity1 - (variable_cost_per_unit_bis * quantity1)',
            'results' => ['total_cost_at_quantity1' => 'fixed_cost_bis + quantity1*variable_cost_per_unit_bis', 'variable_cost_per_unit_bis' => '(-fixed_cost_bis + total_cost_at_quantity1)/quantity1', 'quantity1' => '(-fixed_cost_bis + total_cost_at_quantity1)/variable_cost_per_unit_bis', 'fixed_cost_bis' => '-quantity1*variable_cost_per_unit_bis + total_cost_at_quantity1'],
        ],
        [
            'title' => 'total_variable_cost_bis = variable_cost_per_unit_bis * quantity_evaluated',
            'results' => ['variable_cost_per_unit_bis' => 'total_variable_cost_bis/quantity_evaluated', 'total_variable_cost_bis' => 'quantity_evaluated*variable_cost_per_unit_bis', 'quantity_evaluated' => 'total_variable_cost_bis/variable_cost_per_unit_bis'],
        ],
        [
            'title' => 'total_cost_bis = fixed_cost_bis + total_variable_cost_bis',
            'results' => ['total_variable_cost_bis' => '-fixed_cost_bis + total_cost_bis', 'total_cost_bis' => 'fixed_cost_bis + total_variable_cost_bis', 'fixed_cost_bis' => 'total_cost_bis - total_variable_cost_bis'],
        ],
        [
            'title' => 'average_cost_per_unit_bis = total_cost_bis / quantity_evaluated',
            'results' => ['total_cost_bis' => 'average_cost_per_unit_bis*quantity_evaluated', 'quantity_evaluated' => 'total_cost_bis/average_cost_per_unit_bis', 'average_cost_per_unit_bis' => 'total_cost_bis/quantity_evaluated'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Cost function turns Quantity into Fixed cost and Quantity 1. Nothing is looked up on this page: fixed cost is computed from quantity and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Fixed cost is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Cost function calculator works', 'html' => <<<'TXT'
            <p>Cost function answers one question from 2 numbers, and the answer is Fixed cost, Quantity 1 and Total cost of quantity 1.</p><p>Written with the labels from the form, Total variable cost = Quantity × Variable cost per unit.</p><p>What comes back is Fixed cost, Quantity 1, Total cost of quantity 1 and Quantity 2 — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Variable cost per unit</strong> — in USD. The additional cost incurred to produce each individual unit (e.g., raw materials, packaging, direct labor).</li><li><strong>Quantity</strong> — a plain number, no unit. The total number of units produced or planned for evaluation.</li></ul><p>The result boxes are Fixed cost in USD, Quantity 1, Total cost of quantity 1 in USD, Quantity 2, Total cost of quantity 2 in USD, Quantity to evaluate, Total cost, Average cost per unit, Total variable cost, Average fixed cost, Fixed cost, Variable cost per unit, Total variable cost, Total cost, Average cost per unit; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>None of the boxes on this page carries a unit chip: Fixed cost takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>'],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Total variable cost</strong> = <code>Quantity × Variable cost per unit</code></li><li><strong>Quantity</strong> = <code>Total variable cost ÷ Variable cost per unit</code></li><li><strong>Variable cost per unit</strong> = <code>Total variable cost ÷ Quantity</code></li><li><strong>Total cost</strong> = <code>Fixed cost + Quantity × Variable cost per unit</code></li><li><strong>Fixed cost</strong> = <code>− Quantity × Variable cost per unit + Total cost</code></li><li><strong>Average fixed cost</strong> = <code>Fixed cost ÷ Quantity</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Total variable cost</strong> = <code>Quantity × Variable cost per unit</code> — the form to use when Quantity and Variable cost per unit are the values you have.</li><li><strong>Quantity</strong> = <code>Total variable cost ÷ Variable cost per unit</code> — the form to use when Total variable cost and Variable cost per unit are the values you have.</li><li><strong>Variable cost per unit</strong> = <code>Total variable cost ÷ Quantity</code> — the form to use when Total variable cost and Quantity are the values you have.</li><li><strong>Total cost</strong> = <code>Fixed cost + Quantity × Variable cost per unit</code> — the form to use when Fixed cost, Quantity and Variable cost per unit are the values you have.</li><li><strong>Quantity</strong> = <code>( − Fixed cost + Total cost) ÷ Variable cost per unit</code> — the form to use when Fixed cost, Total cost and Variable cost per unit are the values you have.</li><li><strong>Variable cost per unit</strong> = <code>( − Fixed cost + Total cost) ÷ Quantity</code> — the form to use when Fixed cost, Total cost and Quantity are the values you have.</li><li><strong>Fixed cost</strong> = <code>− Quantity × Variable cost per unit + Total cost</code> — the form to use when Quantity, Variable cost per unit and Total cost are the values you have.</li><li><strong>Average fixed cost</strong> = <code>Fixed cost ÷ Quantity</code> — the form to use when Fixed cost and Quantity are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Total variable cost, Quantity and Variable cost per unit can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Fixed cost, Quantity 1 and Total cost of quantity 1 are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Variable cost per unit left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Variable cost per unit is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Quantity left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Quantity is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Variable cost per unit and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Cost function form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Variable cost per unit</strong> takes a plain number with no unit attached. The additional cost incurred to produce each individual unit (e.g., raw materials, packaging, direct labor). The page reads it when it works out Quantity, Total variable cost and Total cost. Fill it from a measurement rather than a memory — Variable cost per unit is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Quantity</strong> takes a plain number with no unit attached. The total number of units produced or planned for evaluation. The page reads it when it works out Total variable cost, Variable cost per unit and Total cost. Fill it from a measurement rather than a memory — Quantity is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 15 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Fixed cost</strong> is a plain number. The value follows from Quantity, Variable cost per unit and Total cost. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Quantity 1</strong> is a plain number. The value follows from Quantity 2, Variable cost per unit, Total cost of quantity 1 and Total cost of quantity 2. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Total cost of quantity 1</strong> is a plain number. The value follows from Quantity 1, Variable cost per unit, Quantity 2 and Total cost of quantity 2. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Quantity 2</strong> is a plain number. The value follows from Quantity 1, Variable cost per unit, Total cost of quantity 1 and Total cost of quantity 2. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Total cost of quantity 2</strong> is a plain number. The value follows from Quantity 1, Variable cost per unit, Quantity 2 and Total cost of quantity 1. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Quantity to evaluate</strong> is a plain number. The value follows from Total variable cost and Variable cost per unit. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Total cost</strong> is a plain number. The value follows from Fixed cost, Quantity and Variable cost per unit. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Average cost per unit</strong> is a plain number. The value follows from Total cost and Quantity. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Total variable cost</strong> is a plain number. The value follows from Quantity and Variable cost per unit. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Average fixed cost</strong> is a plain number. The value follows from Fixed cost and Quantity. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Fixed cost</strong> is a plain number. The value follows from Quantity 1, Variable cost per unit and Total cost of quantity 1. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Variable cost per unit</strong> is a plain number. The value follows from Total cost of quantity 1, Total cost of quantity 2, Quantity 1 and Quantity 2. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Total variable cost</strong> is a plain number. The value follows from Quantity to evaluate and Variable cost per unit. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Total cost</strong> is a plain number. The value follows from Fixed cost and Total variable cost. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Average cost per unit</strong> is a plain number. The value follows from Total cost and Quantity to evaluate. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Fixed cost follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Variable cost per unit and Quantity and the number you are missing is Fixed cost and Quantity 1.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/rent-increase">Rent increase Calculator</a>, <a href="/finance/rent-or-buy">Rent or buy</a> and <a href="/finance/rent-split">Rent split Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cost function calculator work out?', 'a' => <<<'TXT'
            Fixed cost, Quantity 1, Total cost of quantity 1 and Quantity 2, from Quantity and Variable cost per unit. The relationship is Total variable cost = Quantity × Variable cost per unit.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Variable cost per unit (USD), Quantity. Fill variable cost per unit and quantity and leave Fixed cost empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Total variable cost, Quantity, Variable cost per unit and Total cost can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Fixed cost is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Variable cost per unit blank and the page solves for it, reporting Fixed cost instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Fixed cost at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/rent-increase', 'name' => 'Rent increase Calculator'],
            ['path' => '/finance/rent-or-buy', 'name' => 'Rent or buy'],
            ['path' => '/finance/rent-split', 'name' => 'Rent split Calculator'],
        ],
        'authors' => [],
    ],
];
