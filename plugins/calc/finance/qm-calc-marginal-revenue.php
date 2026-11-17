<?php

/**
 * Marginal revenue
 * /finance/marginal-revenue
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Marginal revenue',
    'meta' => ['title' => 'Marginal revenue — Formula, Steps & Examples', 'description' => 'Marginal revenue takes initial revenue and returns change in total revenue. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Marginal revenue Calculator', 'updated' => '2026-09-02'],
    'sections' => [
        [
            'title' => 'Change in revenue',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'initialRevenue',
                            'label' => 'Initial revenue',
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
                            'name' => 'finalRevenue',
                            'label' => 'Final revenue',
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
                            'name' => 'changeInTotalRevenue',
                            'label' => 'Change in total revenue',
                            'type' => 'number',
                            'help' => 'A positive change means an increase in revenue, while a negative change means a decrease in revenue.',
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
            'title' => 'Change in quantity',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'initialQuantity',
                            'label' => 'Initial quantity',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'finalQuantity',
                            'label' => 'Final quantity',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'changeInQuantity',
                            'label' => 'Change in quantity',
                            'type' => 'number',
                            'help' => 'A positive change means an increase in quantity, while a negative change means a decrease in quantity.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'marginalRevenue',
                            'label' => 'Marginal revenue',
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
            'title' => 'marginalRevenue = changeInTotalRevenue / changeInQuantity',
            'results' => ['changeInTotalRevenue' => 'changeInQuantity*marginalRevenue', 'changeInQuantity' => 'changeInTotalRevenue/marginalRevenue', 'marginalRevenue' => 'changeInTotalRevenue/changeInQuantity'],
        ],
        [
            'title' => 'changeInTotalRevenue = finalRevenue - initialRevenue',
            'results' => ['changeInTotalRevenue' => 'finalRevenue - initialRevenue', 'initialRevenue' => '-changeInTotalRevenue + finalRevenue', 'finalRevenue' => 'changeInTotalRevenue + initialRevenue'],
        ],
        [
            'title' => 'changeInQuantity = finalQuantity - initialQuantity',
            'results' => ['finalQuantity' => 'changeInQuantity + initialQuantity', 'changeInQuantity' => 'finalQuantity - initialQuantity', 'initialQuantity' => '-changeInQuantity + finalQuantity'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Marginal revenue turns Change in total revenue and Change in quantity into Initial revenue and Final revenue. Nothing is looked up on this page: initial revenue is computed from change in total revenue and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Initial revenue is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Marginal revenue calculator works', 'html' => <<<'TXT'
            <p>The Marginal revenue calculator applies one relationship to 2 numbers and reports Initial revenue, Final revenue and Initial quantity.</p><p>In the form&#039;s own words, Marginal revenue = Change in total revenue ÷ Change in quantity.</p><p>The result panel carries Initial revenue, Final revenue, Initial quantity and Final quantity, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Change in total revenue</strong> — in USD. A positive change means an increase in revenue, while a negative change means a decrease in revenue.</li><li><strong>Change in quantity</strong> — a plain number, no unit. A positive change means an increase in quantity, while a negative change means a decrease in quantity.</li></ul><p>The result boxes are Initial revenue in USD, Final revenue in USD, Initial quantity, Final quantity, Marginal revenue in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Initial revenue = 10 USD, Final revenue = 100 USD, Initial quantity = 1000, Final quantity = 10, Change in quantity = 100 and Marginal revenue = 1000 USD gives <strong>Change in total revenue</strong> = 100000 USD.</p><ul><li><strong>Change in total revenue</strong> = 100000 USD</li></ul><p>That is <strong>Marginal revenue</strong> = <code>Change in total revenue ÷ Change in quantity</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Change in total revenue</strong> = 100000 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Initial revenue takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Marginal revenue</strong> = <code>Change in total revenue ÷ Change in quantity</code></li><li><strong>Change in total revenue</strong> = <code>Change in quantity × Marginal revenue</code></li><li><strong>Change in quantity</strong> = <code>Change in total revenue ÷ Marginal revenue</code></li><li><strong>Initial revenue</strong> = <code>− Change in total revenue + Final revenue</code></li><li><strong>Final revenue</strong> = <code>Change in total revenue + Initial revenue</code></li><li><strong>Final quantity</strong> = <code>Change in quantity + Initial quantity</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Marginal revenue</strong> = <code>Change in total revenue ÷ Change in quantity</code> — the form to use when Change in total revenue and Change in quantity are the values you have.</li><li><strong>Change in total revenue</strong> = <code>Change in quantity × Marginal revenue</code> — the form to use when Change in quantity and Marginal revenue are the values you have.</li><li><strong>Change in quantity</strong> = <code>Change in total revenue ÷ Marginal revenue</code> — the form to use when Change in total revenue and Marginal revenue are the values you have.</li><li><strong>Change in total revenue</strong> = <code>Final revenue − Initial revenue</code> — the form to use when Final revenue and Initial revenue are the values you have.</li><li><strong>Initial revenue</strong> = <code>− Change in total revenue + Final revenue</code> — the form to use when Change in total revenue and Final revenue are the values you have.</li><li><strong>Final revenue</strong> = <code>Change in total revenue + Initial revenue</code> — the form to use when Change in total revenue and Initial revenue are the values you have.</li><li><strong>Change in quantity</strong> = <code>Final quantity − Initial quantity</code> — the form to use when Final quantity and Initial quantity are the values you have.</li><li><strong>Final quantity</strong> = <code>Change in quantity + Initial quantity</code> — the form to use when Change in quantity and Initial quantity are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Marginal revenue, Change in total revenue and Change in quantity can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Initial revenue, from 10 to 20 — and the answers go from <strong>Change in total revenue</strong> 100000 USD to <strong>Change in total revenue</strong> 100000 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Initial revenue, Final revenue and Initial quantity are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Change in total revenue left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Change in total revenue is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Change in quantity left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Change in quantity is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Change in total revenue is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Change in total revenue</strong> takes a plain number with no unit attached. A positive change means an increase in revenue, while a negative change means a decrease in revenue. Change it and Change in quantity, Marginal revenue and Initial revenue changes with it. Have it to hand before you start: Change in total revenue is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Change in quantity</strong> takes a plain number with no unit attached. A positive change means an increase in quantity, while a negative change means a decrease in quantity. Change it and Change in total revenue, Marginal revenue and Final quantity changes with it. Have it to hand before you start: Change in quantity is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Initial revenue</strong> is a plain number. It is worked out from Change in total revenue and Final revenue. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Final revenue</strong> is a plain number. It is worked out from Change in total revenue and Initial revenue. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Initial quantity</strong> is a plain number. It is worked out from Change in quantity and Final quantity. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Final quantity</strong> is a plain number. It is worked out from Change in quantity and Initial quantity. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Marginal revenue</strong> is a plain number. It is worked out from Change in total revenue and Change in quantity. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Change in total revenue</th></tr></thead><tbody><tr><td><strong>Initial revenue</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Final revenue</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Initial quantity</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Final quantity</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Change in quantity</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Marginal revenue</strong> +10%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, Change in quantity sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. By contrast, Initial revenue, Final revenue and Initial quantity barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Initial revenue = 5 USD, Final revenue = 50 USD, Initial quantity = 500, Final quantity = 5, Change in quantity = 50 and Marginal revenue = 500 USD, the answer is <strong>Change in total revenue</strong> = 25000 USD.</li><li>With Initial revenue = 30 USD, Final revenue = 100 USD, Initial quantity = 1000, Final quantity = 10, Change in quantity = 100 and Marginal revenue = 1000 USD, the answer is <strong>Change in total revenue</strong> = 100000 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Initial revenue follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Change in total revenue and Change in quantity are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Change in total revenue and Change in quantity and the number you are missing is Initial revenue and Final revenue.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/fixed-deposit">Fixed deposit Calculator</a>, <a href="/finance/florida-overtime">Florida overtime Calculator</a> and <a href="/finance/florida-sales-tax">Florida sales tax Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Marginal revenue calculator work out?', 'a' => <<<'TXT'
            Initial revenue, Final revenue, Initial quantity and Final quantity, from Change in total revenue and Change in quantity. The relationship is Marginal revenue = Change in total revenue ÷ Change in quantity.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Change in total revenue (USD), Change in quantity. With change in total revenue and change in quantity in place, Initial revenue can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Marginal revenue, Change in total revenue, Change in quantity and Initial revenue can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Change in total revenue = 100000 USD. That comes from the page's own defaults, entered in Change in total revenue; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Initial revenue is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Change in total revenue left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Initial revenue keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/fixed-deposit', 'name' => 'Fixed deposit Calculator'],
            ['path' => '/finance/florida-overtime', 'name' => 'Florida overtime Calculator'],
            ['path' => '/finance/florida-sales-tax', 'name' => 'Florida sales tax Calculator'],
        ],
        'authors' => [],
    ],
];
