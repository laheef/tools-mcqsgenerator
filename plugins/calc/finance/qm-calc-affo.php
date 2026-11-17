<?php

/**
 * Adjusted funds from operation (AFFO)
 * /finance/affo
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Adjusted funds from operation (AFFO)',
    'meta' => ['title' => 'Adjusted funds from operation (AFFO) Calculator', 'description' => 'Adjusted funds from operation (AFFO) works out FFO and AFFO and reports both. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Adjusted funds from operation (AFFO) Calculator', 'updated' => '2024-09-04'],
    'sections' => [
        [
            'title' => 'Funds from operations (FFO)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'net_income',
                            'label' => 'Net income',
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
                            'name' => 'd_and_a',
                            'label' => 'Depreciation and amortization',
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
                            'name' => 'gains',
                            'label' => 'Gains from property sales',
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
                            'name' => 'loss',
                            'label' => 'Losses from property sales',
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
                            'name' => 'int_inc',
                            'label' => 'Interest income',
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
                            'name' => 'ffo',
                            'label' => 'FFO',
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
        [
            'title' => 'Adjusted funds from operations (AFFO)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rent_inc',
                            'label' => 'Rent increases',
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
                            'name' => 'capex',
                            'label' => 'Capital expenditures',
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
                            'name' => 'rout_maint',
                            'label' => 'Routine maintenance amounts',
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
                            'name' => 'affo',
                            'label' => 'AFFO',
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
            'title' => 'ffo = net_income + d_and_a + loss - gains - int_inc',
            'results' => [
                'ffo' => 'd_and_a - gains - int_inc + loss + net_income',
                'int_inc' => 'd_and_a - ffo - gains + loss + net_income',
                'd_and_a' => 'ffo + gains + int_inc - loss - net_income',
                'loss' => '-d_and_a + ffo + gains + int_inc - net_income',
                'gains' => 'd_and_a - ffo - int_inc + loss + net_income',
                'net_income' => '-d_and_a + ffo + gains + int_inc - loss',
            ],
        ],
        [
            'title' => 'affo = ffo + rent_inc - capex - rout_maint ',
            'results' => [
                'capex' => '-affo + ffo + rent_inc - rout_maint',
                'affo' => '-capex + ffo + rent_inc - rout_maint',
                'ffo' => 'affo + capex - rent_inc + rout_maint',
                'rent_inc' => 'affo + capex - ffo + rout_maint',
                'rout_maint' => '-affo - capex + ffo + rent_inc',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Adjusted funds from operation (AFFO) takes Net income, Depreciation and amortization and Gains from property sales and returns FFO and Rent increases. Nothing is looked up on this page: FFO is computed from net income and the other boxes, so an unusual pair of values gives an honest answer rather than an error. FFO is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Adjusted funds from operation (AFFO) calculator works', 'html' => <<<'TXT'
            <p>Adjusted funds from operation (AFFO) answers one question from 5 numbers, and the answer is FFO, Rent increases and Capital expenditures.</p><p>The relationship it solves reads FFO = Depreciation and amortization − Gains from property sales − Interest income + Losses from property sales + Net income.</p><p>What comes back is FFO, Rent increases, Capital expenditures and Routine maintenance amounts — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 5 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Net income</strong> — in USD</li><li><strong>Depreciation and amortization</strong> — in USD</li><li><strong>Gains from property sales</strong> — in USD</li><li><strong>Losses from property sales</strong> — in USD</li><li><strong>Interest income</strong> — in USD</li></ul><p>What you get back is FFO in USD, Rent increases in USD, Capital expenditures in USD, Routine maintenance amounts in USD, AFFO in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Net income = 10 USD, Depreciation and amortization = 100 USD, Gains from property sales = 1000 USD, Losses from property sales = 10 USD, Interest income = 100 USD, Rent increases = 1000 USD, Capital expenditures = 10 USD, Routine maintenance amounts = 100 USD and AFFO = 1000 USD — through the same formula and the panel reports <strong>FFO</strong> = -980 USD.</p><ul><li><strong>FFO</strong> = -980 USD</li></ul><p>That is <strong>FFO</strong> = <code>Depreciation and amortization − Gains from property sales − Interest income + Losses from property sales + Net income</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>FFO</strong> = -980 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: FFO takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>FFO</strong> = <code>Depreciation and amortization − Gains from property sales − Interest income + Losses from property sales + Net income</code></li><li><strong>Interest income</strong> = <code>Depreciation and amortization − FFO − Gains from property sales + Losses from property sales + Net income</code></li><li><strong>Depreciation and amortization</strong> = <code>FFO + Gains from property sales + Interest income − Losses from property sales − Net income</code></li><li><strong>Losses from property sales</strong> = <code>− Depreciation and amortization + FFO + Gains from property sales + Interest income − Net income</code></li><li><strong>Gains from property sales</strong> = <code>Depreciation and amortization − FFO − Interest income + Losses from property sales + Net income</code></li><li><strong>Net income</strong> = <code>− Depreciation and amortization + FFO + Gains from property sales + Interest income − Losses from property sales</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>FFO</strong> = <code>Depreciation and amortization − Gains from property sales − Interest income + Losses from property sales + Net income</code> — the form to use when Depreciation and amortization, Gains from property sales, Interest income and Losses from property sales are the values you have.</li><li><strong>Interest income</strong> = <code>Depreciation and amortization − FFO − Gains from property sales + Losses from property sales + Net income</code> — the form to use when Depreciation and amortization, FFO, Gains from property sales and Losses from property sales are the values you have.</li><li><strong>Depreciation and amortization</strong> = <code>FFO + Gains from property sales + Interest income − Losses from property sales − Net income</code> — the form to use when FFO, Gains from property sales, Interest income and Losses from property sales are the values you have.</li><li><strong>Losses from property sales</strong> = <code>− Depreciation and amortization + FFO + Gains from property sales + Interest income − Net income</code> — the form to use when Depreciation and amortization, FFO, Gains from property sales and Interest income are the values you have.</li><li><strong>Gains from property sales</strong> = <code>Depreciation and amortization − FFO − Interest income + Losses from property sales + Net income</code> — the form to use when Depreciation and amortization, FFO, Interest income and Losses from property sales are the values you have.</li><li><strong>Net income</strong> = <code>− Depreciation and amortization + FFO + Gains from property sales + Interest income − Losses from property sales</code> — the form to use when Depreciation and amortization, FFO, Gains from property sales and Interest income are the values you have.</li><li><strong>AFFO</strong> = <code>− Capital expenditures + FFO + Rent increases − Routine maintenance amounts</code> — the form to use when Capital expenditures, FFO, Rent increases and Routine maintenance amounts are the values you have.</li><li><strong>Capital expenditures</strong> = <code>− AFFO + FFO + Rent increases − Routine maintenance amounts</code> — the form to use when AFFO, FFO, Rent increases and Routine maintenance amounts are the values you have.</li></ul><p>Any one of FFO, Interest income and Depreciation and amortization can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Net income, from 10 to 20 — and the answers go from <strong>FFO</strong> -980 USD to <strong>FFO</strong> -970 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with FFO, Rent increases and Capital expenditures are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Net income left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Net income is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Depreciation and amortization left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Depreciation and amortization is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Gains from property sales left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Gains from property sales is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Net income and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Adjusted funds from operation (AFFO) form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Net income</strong> takes a plain number with no unit attached. The page reads it when it works out FFO, Interest income and Depreciation and amortization. Fill it from a measurement rather than a memory — Net income is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Depreciation and amortization</strong> takes a plain number with no unit attached. The page reads it when it works out FFO, Interest income and Losses from property sales. Fill it from a measurement rather than a memory — Depreciation and amortization is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Gains from property sales</strong> takes a plain number with no unit attached. The page reads it when it works out FFO, Interest income and Depreciation and amortization. Fill it from a measurement rather than a memory — Gains from property sales is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Losses from property sales</strong> takes a plain number with no unit attached. The page reads it when it works out FFO, Interest income and Depreciation and amortization. Fill it from a measurement rather than a memory — Losses from property sales is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Interest income</strong> takes a plain number with no unit attached. The page reads it when it works out FFO, Depreciation and amortization and Losses from property sales. Fill it from a measurement rather than a memory — Interest income is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>FFO</strong> is a plain number and the page's own defaults put it at -980. It is computed from Depreciation and amortization, Gains from property sales, Interest income and Losses from property sales, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Rent increases</strong> is a plain number. It is computed from AFFO, Capital expenditures, FFO and Routine maintenance amounts, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Capital expenditures</strong> is a plain number. It is computed from AFFO, FFO, Rent increases and Routine maintenance amounts, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Routine maintenance amounts</strong> is a plain number. It is computed from AFFO, Capital expenditures, FFO and Rent increases, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>AFFO</strong> is a plain number. It is computed from Capital expenditures, FFO, Rent increases and Routine maintenance amounts, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> FFO follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Net income, Depreciation and amortization and Gains from property sales are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Net income, Depreciation and amortization and Gains from property sales measured, FFO and Rent increases wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/rate-of-pay">Rate of pay</a>, <a href="/finance/rate-of-return">Rate of return Calculator</a> and <a href="/finance/rd">RD (recurring deposit)</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Adjusted funds from operation (AFFO) calculator work out?', 'a' => <<<'TXT'
            FFO, Rent increases, Capital expenditures and Routine maintenance amounts, from Depreciation and amortization, Gains from property sales, Interest income and Losses from property sales. The relationship is FFO = Depreciation and amortization − Gains from property sales − Interest income + Losses from property sales + Net income.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Net income (USD), Depreciation and amortization (USD), Gains from property sales (USD), Losses from property sales (USD), Interest income (USD). With net income, depreciation and amortization and gains from property sales in place, FFO can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of FFO, Interest income, Depreciation and amortization and Losses from property sales blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'FFO = -980 USD. That comes from the page\'s own defaults, entered in Net income; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of FFO is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Net income blank and the page solves for it, reporting FFO instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of FFO keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/rate-of-pay', 'name' => 'Rate of pay'],
            ['path' => '/finance/rate-of-return', 'name' => 'Rate of return Calculator'],
            ['path' => '/finance/rd', 'name' => 'RD (recurring deposit)'],
        ],
        'authors' => [],
    ],
];
