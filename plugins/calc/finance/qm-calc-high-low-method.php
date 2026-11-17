<?php

/**
 * High-low method
 * /finance/high-low-method
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'High-low method',
    'meta' => ['title' => 'High-low method Calculator: Free, With Steps', 'description' => 'High-low method works out variable cost per unit and total fixed cost from high cost and high unit volume. The formula is printed in the form\'s own words.', 'h1' => 'High-low method Calculator', 'updated' => '2026-09-26'],
    'sections' => [
        [
            'title' => 'Initial costs and units',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'high_cost',
                            'label' => 'High cost',
                            'type' => 'number',
                            'help' => 'Cost at the highest level of activity.',
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
                            'name' => 'high_unit',
                            'label' => 'High unit volume',
                            'type' => 'number',
                            'help' => 'Volume at the highest level of activity.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'low_cost',
                            'label' => 'Low cost',
                            'type' => 'number',
                            'help' => 'Cost at the lowest level of activity.',
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
                            'name' => 'low_unit',
                            'label' => 'Low unit volume',
                            'type' => 'number',
                            'help' => 'Volume at the lowest level of activity.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'volume',
                            'label' => 'Number of units (x)',
                            'type' => 'number',
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
                        [
                            'name' => 'variable_cost',
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
                            'name' => 'total_fixed_cost',
                            'label' => 'Total fixed cost',
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
                            'name' => 'cost_volume',
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
                        ['type' => 'note', 'text' => 'Cost model = {{total_fixed_cost.monetaryValue}} + {{variable_cost.monetaryValue}} × x'],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'variable_cost = (high_cost - low_cost) / (high_unit - low_unit)',
            'results' => [
                'low_unit' => '(-high_cost + high_unit*variable_cost + low_cost)/variable_cost',
                'low_cost' => 'high_cost - high_unit*variable_cost + low_unit*variable_cost',
                'variable_cost' => '(high_cost - low_cost)/(high_unit - low_unit)',
                'high_unit' => '(high_cost - low_cost + low_unit*variable_cost)/variable_cost',
                'high_cost' => 'high_unit*variable_cost + low_cost - low_unit*variable_cost',
            ],
        ],
        [
            'title' => 'total_fixed_cost = high_cost - (variable_cost * high_unit)',
            'results' => ['variable_cost' => '(high_cost - total_fixed_cost)/high_unit', 'high_unit' => '(high_cost - total_fixed_cost)/variable_cost', 'high_cost' => 'high_unit*variable_cost + total_fixed_cost', 'total_fixed_cost' => 'high_cost - high_unit*variable_cost'],
        ],
        [
            'title' => 'cost_volume = total_fixed_cost + (variable_cost * volume)',
            'results' => ['variable_cost' => '(cost_volume - total_fixed_cost)/volume', 'total_fixed_cost' => 'cost_volume - variable_cost*volume', 'cost_volume' => 'total_fixed_cost + variable_cost*volume', 'volume' => '(cost_volume - total_fixed_cost)/variable_cost'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        High-low method takes High cost, High unit volume and Low cost and returns Number of units (x) and Variable cost per unit. It is a single relationship that reads number of units (x) out of high cost, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the High-low method calculator works', 'html' => <<<'TXT'
            <p>High-low method answers one question from 4 numbers, and the answer is Number of units (x), Variable cost per unit and Total fixed cost.</p><p>Written with the labels from the form, Variable cost per unit = (High cost − Low cost) ÷ (High unit volume − Low unit volume).</p><p>The answers are Number of units (x), Variable cost per unit, Total fixed cost and Total cost; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>High cost</strong> — in USD. Cost at the highest level of activity.</li><li><strong>High unit volume</strong> — a plain number, no unit. Volume at the highest level of activity.</li><li><strong>Low cost</strong> — in USD. Cost at the lowest level of activity.</li><li><strong>Low unit volume</strong> — a plain number, no unit. Volume at the lowest level of activity.</li></ul><p>The answers come back as Number of units (x), Variable cost per unit in USD, Total fixed cost in USD, Total cost in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — High cost = 10 USD, High unit volume = 100, Low cost = 1000 USD, Low unit volume = 10, Number of units (x) = 100, Total fixed cost = 1000 USD and Total cost = 10 USD — through the same formula and the panel reports <strong>Variable cost per unit</strong> = -11 USD.</p><ul><li><strong>Variable cost per unit</strong> = -11 USD</li></ul><p>The line behind those figures is <strong>Variable cost per unit</strong> = <code>(High cost − Low cost) ÷ (High unit volume − Low unit volume)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Variable cost per unit</strong> = -11 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Number of units (x) takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Variable cost per unit</strong> = <code>(High cost − Low cost) ÷ (High unit volume − Low unit volume)</code></li><li><strong>Low unit volume</strong> = <code>( − High cost + High unit volume × Variable cost per unit + Low cost) ÷ Variable cost per unit</code></li><li><strong>Low cost</strong> = <code>High cost − High unit volume × Variable cost per unit + Low unit volume × Variable cost per unit</code></li><li><strong>High unit volume</strong> = <code>(High cost − Low cost + Low unit volume × Variable cost per unit) ÷ Variable cost per unit</code></li><li><strong>High cost</strong> = <code>High unit volume × Variable cost per unit + Low cost − Low unit volume × Variable cost per unit</code></li><li><strong>Total fixed cost</strong> = <code>High cost − High unit volume × Variable cost per unit</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Variable cost per unit</strong> = <code>(High cost − Low cost) ÷ (High unit volume − Low unit volume)</code> — the form to use when High cost, Low cost, High unit volume and Low unit volume are the values you have.</li><li><strong>Low unit volume</strong> = <code>( − High cost + High unit volume × Variable cost per unit + Low cost) ÷ Variable cost per unit</code> — the form to use when High cost, High unit volume, Variable cost per unit and Low cost are the values you have.</li><li><strong>Low cost</strong> = <code>High cost − High unit volume × Variable cost per unit + Low unit volume × Variable cost per unit</code> — the form to use when High cost, High unit volume, Variable cost per unit and Low unit volume are the values you have.</li><li><strong>High unit volume</strong> = <code>(High cost − Low cost + Low unit volume × Variable cost per unit) ÷ Variable cost per unit</code> — the form to use when High cost, Low cost, Low unit volume and Variable cost per unit are the values you have.</li><li><strong>High cost</strong> = <code>High unit volume × Variable cost per unit + Low cost − Low unit volume × Variable cost per unit</code> — the form to use when High unit volume, Variable cost per unit, Low cost and Low unit volume are the values you have.</li><li><strong>Total fixed cost</strong> = <code>High cost − High unit volume × Variable cost per unit</code> — the form to use when High cost, High unit volume and Variable cost per unit are the values you have.</li><li><strong>Variable cost per unit</strong> = <code>(High cost − Total fixed cost) ÷ High unit volume</code> — the form to use when High cost, Total fixed cost and High unit volume are the values you have.</li><li><strong>High unit volume</strong> = <code>(High cost − Total fixed cost) ÷ Variable cost per unit</code> — the form to use when High cost, Total fixed cost and Variable cost per unit are the values you have.</li></ul><p>Any one of Variable cost per unit, Low unit volume and Low cost can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double High cost from 10 to 20, leaving every other box alone. The panel moves from <strong>Variable cost per unit</strong> -11 USD to <strong>Variable cost per unit</strong> -10.89 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Number of units (x), Variable cost per unit and Total fixed cost are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>High cost left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If High cost is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>High unit volume left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If High unit volume is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Low cost left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Low cost is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in High cost and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>High cost</strong> takes a plain number with no unit attached. Cost at the highest level of activity. The page reads it when it works out Low unit volume, Low cost and Variable cost per unit. Have it to hand before you start: High cost is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>High unit volume</strong> takes a plain number with no unit attached. Volume at the highest level of activity. The page reads it when it works out Low unit volume, Low cost and Variable cost per unit. Have it to hand before you start: High unit volume is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Low cost</strong> takes a plain number with no unit attached. Cost at the lowest level of activity. The page reads it when it works out Low unit volume, Variable cost per unit and High unit volume. Have it to hand before you start: Low cost is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Low unit volume</strong> takes a plain number with no unit attached. Volume at the lowest level of activity. The page reads it when it works out Low cost, Variable cost per unit and High unit volume. Have it to hand before you start: Low unit volume is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Number of units (x)</strong> is a plain number. It is worked out from Total cost, Total fixed cost and Variable cost per unit. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Variable cost per unit</strong> is a plain number and the page's own defaults put it at -11. It is worked out from High cost, Low cost, High unit volume and Low unit volume. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Total fixed cost</strong> is a plain number. It is worked out from High cost, High unit volume and Variable cost per unit. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Total cost</strong> is a plain number. It is worked out from Total fixed cost, Variable cost per unit and Number of units (x). Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Number of units (x) follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes High cost, High unit volume and Low cost are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: High cost, High unit volume and Low cost measured, Number of units (x) and Variable cost per unit wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/market-capitalization">Market capitalization Calculator</a>, <a href="/finance/mva">Market value added (MVA) Calculator</a> and <a href="/finance/margin-2-sets">Markup and margin (2 sets) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the High-low method calculator work out?', 'a' => <<<'TXT'
            Number of units (x), Variable cost per unit, Total fixed cost and Total cost, from High cost, Low cost, High unit volume and Low unit volume. The relationship is Variable cost per unit = (High cost − Low cost) ÷ (High unit volume − Low unit volume).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            High cost (USD), High unit volume, Low cost (USD), Low unit volume. Enter high cost, high unit volume and low cost; Number of units (x) is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Variable cost per unit, Low unit volume, Low cost and High unit volume blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Variable cost per unit = -11 USD. That comes from the page\'s own defaults, entered in High cost; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Number of units (x) is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With High cost left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Number of units (x) keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/market-capitalization', 'name' => 'Market capitalization Calculator'],
            ['path' => '/finance/mva', 'name' => 'Market value added (MVA) Calculator'],
            ['path' => '/finance/margin-2-sets', 'name' => 'Markup and margin (2 sets) Calculator'],
        ],
        'authors' => [],
    ],
];
