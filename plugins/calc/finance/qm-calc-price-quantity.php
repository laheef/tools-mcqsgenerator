<?php

/**
 * Price / quantity
 * /finance/price-quantity
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Price / quantity',
    'meta' => ['title' => 'Price / quantity — Formula, Steps & Examples', 'description' => 'Price / quantity turns quantity and price into price / unit and would have cost. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Price / quantity Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => 'Smaller product',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'quantity_1',
                            'label' => 'Quantity',
                            'type' => 'number',
                            'rounding' => ['omni', '0.000001'],
                        ],
                        [
                            'name' => 'price_1',
                            'label' => 'Price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.000001'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price_unit_1',
                            'label' => 'Price / unit',
                            'type' => 'number',
                            'suffix' => '/ unit',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Larger product',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'quantity_2',
                            'label' => 'Quantity',
                            'type' => 'number',
                            'rounding' => ['omni', '0.000001'],
                        ],
                        [
                            'name' => 'price_2',
                            'label' => 'Price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.000001'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price_unit_2',
                            'label' => 'Price / unit',
                            'type' => 'number',
                            'suffix' => '/ unit',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Savings',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'would_have_cost',
                            'label' => 'Would have cost',
                            'type' => 'number',
                            'help' => 'What you would have paid for the larger product if it had cost the same per unit as the smaller product.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.000001'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'you_save',
                            'label' => 'You save',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.000001'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'you_save < 0', 'text' => <<<'TXT'
                                You would save more if you buy the smaller product. This is good — you will not be constrained by bulk buying. However, please double check your inputs, because it is quite unlikely.
                                TXT],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'price_1 / quantity_1 = price_unit_1',
            'results' => ['quantity_1' => 'price_1/price_unit_1', 'price_unit_1' => 'price_1/quantity_1', 'price_1' => 'price_unit_1*quantity_1'],
        ],
        [
            'title' => 'price_2 / quantity_2 = price_unit_2',
            'results' => ['quantity_2' => 'price_2/price_unit_2', 'price_2' => 'price_unit_2*quantity_2', 'price_unit_2' => 'price_2/quantity_2'],
        ],
        [
            'title' => 'would_have_cost = quantity_2 * price_unit_1',
            'results' => ['quantity_2' => 'would_have_cost/price_unit_1', 'would_have_cost' => 'price_unit_1*quantity_2', 'price_unit_1' => 'would_have_cost/quantity_2'],
        ],
        [
            'title' => 'you_save = would_have_cost - price_2',
            'results' => ['price_2' => 'would_have_cost - you_save', 'would_have_cost' => 'price_2 + you_save', 'you_save' => '-price_2 + would_have_cost'],
        ],
    ],
    'article' => [
        'intro' => 'Price / quantity converts between quantity and price: put a value in either box and the other one is worked out.',
        'sections' => [
            ['title' => 'How the Price / quantity calculator works', 'html' => <<<'TXT'
            <p>Price / quantity answers one question from 2 numbers, and the answer is Quantity, Price and Price.</p><p>The relationship it solves reads Quantity = Price ÷ Price / unit.</p><p>The answers are Quantity, Price, Price and Price / unit; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Price / unit</strong> — in / unit</li><li><strong>Quantity</strong> — a plain number, no unit</li></ul><p>What you get back is Quantity, Price in USD, Price in USD, Price / unit in / unit, Would have cost in USD, You save in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Quantity = 10, Price = 100 USD, Price / unit = 1000 / unit, Quantity = 10, Price = 100 USD, Price / unit = 1000 / unit and You save = 10 USD; the answers are <strong>Would have cost</strong> = 10000 USD.</p><ul><li><strong>Would have cost</strong> = 10000 USD</li></ul><p>That is <strong>Quantity</strong> = <code>Price ÷ Price / unit</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Would have cost</strong> = 10000 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Quantity takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Quantity</strong> = <code>Price ÷ Price / unit</code></li><li><strong>Price / unit</strong> = <code>Price ÷ Quantity</code></li><li><strong>Price</strong> = <code>Price / unit × Quantity</code></li><li><strong>Would have cost</strong> = <code>Price / unit × Quantity</code></li><li><strong>You save</strong> = <code>− Price + Would have cost</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Quantity</strong> = <code>Price ÷ Price / unit</code> — the form to use when Price and Price / unit are the values you have.</li><li><strong>Price / unit</strong> = <code>Price ÷ Quantity</code> — the form to use when Price and Quantity are the values you have.</li><li><strong>Price</strong> = <code>Price / unit × Quantity</code> — the form to use when Price / unit and Quantity are the values you have.</li><li><strong>Quantity</strong> = <code>Price ÷ Price / unit</code> — the form to use when Price and Price / unit are the values you have.</li><li><strong>Price</strong> = <code>Price / unit × Quantity</code> — the form to use when Price / unit and Quantity are the values you have.</li><li><strong>Price / unit</strong> = <code>Price ÷ Quantity</code> — the form to use when Price and Quantity are the values you have.</li><li><strong>Would have cost</strong> = <code>Price / unit × Quantity</code> — the form to use when Price / unit and Quantity are the values you have.</li><li><strong>Quantity</strong> = <code>Would have cost ÷ Price / unit</code> — the form to use when Would have cost and Price / unit are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Quantity, Price / unit and Price can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Quantity from 10 to 20, leaving every other box alone. The panel moves from <strong>Would have cost</strong> 10000 USD to <strong>Would have cost</strong> 10000 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Quantity, Price and Price are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Price / unit left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Price / unit is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Quantity left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Quantity is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Price / unit is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Price / quantity form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Price / unit</strong> is measured in / unit. The page reads it when it works out Quantity, Price and Quantity. Fill it from a measurement rather than a memory — Price / unit is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Quantity</strong> takes a plain number with no unit attached. The page reads it when it works out Price, Price / unit and Would have cost. Fill it from a measurement rather than a memory — Quantity is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Quantity</strong> is a plain number. It is computed from Price and Price / unit, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Price</strong> is a plain number. It is computed from Price / unit and Quantity, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Price</strong> is a plain number. It is computed from Price / unit and Quantity, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Price / unit</strong> is a plain number. It is computed from Price and Quantity, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Would have cost</strong> is a plain number and the page's own defaults put it at 10000. It is computed from Price / unit and Quantity, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>You save</strong> is a plain number. It is computed from Price and Would have cost, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Would have cost</th></tr></thead><tbody><tr><td><strong>Quantity</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Price</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Price / unit</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Quantity</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Price</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Price / unit</strong> +10%</td><td>+0%</td></tr><tr><td><strong>You save</strong> +10%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Price / unit sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. By contrast, Quantity, Price and Price barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Quantity = 5, Price = 50 USD, Price / unit = 500 / unit, Quantity = 5, Price = 50 USD, Price / unit = 500 / unit and You save = 5 USD and the page reports <strong>Would have cost</strong> = 2500 USD.</li><li>Feed in Quantity = 30, Price = 100 USD, Price / unit = 1000 / unit, Quantity = 10, Price = 100 USD, Price / unit = 1000 / unit and You save = 10 USD and the page reports <strong>Would have cost</strong> = 10000 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Quantity follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Price / unit and Quantity are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Price / unit and Quantity is what you already know and Quantity and Price is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/effective-duration">Effective duration</a>, <a href="/finance/effective-interest-rate">Effective interest rate Calculator</a> and <a href="/finance/emergency-fund">Emergency fund Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Price / quantity calculator work out?', 'a' => 'Quantity, Price, Price and Price / unit, from Price and Price / unit. The relationship is Quantity = Price ÷ Price / unit.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Price / unit (/ unit), Quantity. With price / unit and quantity in place, Quantity can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Quantity, Price / unit, Price and Quantity can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Would have cost = 10000 USD. That comes from the page\'s own defaults, entered in Price / unit; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Quantity is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Price / unit blank and the page solves for it, reporting Quantity instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Quantity keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/effective-duration', 'name' => 'Effective duration'],
            ['path' => '/finance/effective-interest-rate', 'name' => 'Effective interest rate Calculator'],
            ['path' => '/finance/emergency-fund', 'name' => 'Emergency fund Calculator'],
        ],
        'authors' => [],
    ],
];
