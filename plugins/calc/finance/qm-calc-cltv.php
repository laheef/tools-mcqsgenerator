<?php

/**
 * CLTV (customer lifetime value)
 * /finance/cltv
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'CLTV (customer lifetime value)',
    'meta' => ['title' => 'CLTV (customer lifetime value) — Formula & Results', 'description' => 'CLTV (customer lifetime value) works out average purchase value and average purchase frequency from total revenue, number of purchases and number of customers.', 'h1' => 'CLTV (customer lifetime value) Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => 'Average customer value',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rev',
                            'label' => 'Total revenue',
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
                            'name' => 'num_pur',
                            'label' => 'Number of purchases',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'num_cus',
                            'label' => 'Number of customers',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'avg_pur',
                            'label' => 'Average purchase value',
                            'type' => 'number',
                            'help' => 'A customer\'s worth to a business in a year.',
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
                            'name' => 'avg_freq',
                            'label' => 'Average purchase frequency',
                            'type' => 'number',
                            'help' => 'Number of purchases a customer makes in a year on average.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'avg_cus_value',
                            'label' => 'Average customer value',
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
            'title' => 'Customer lifetime value (CLTV)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sum_lifespan',
                            'label' => 'Sum of customer lifespans',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'acl',
                            'label' => 'Average customer lifespan',
                            'type' => 'number',
                            'help' => 'Average number of years a customer stays with the business.',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cltv',
                            'label' => 'CLTV',
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
                            'name' => 'advancedMode',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Determine total revenue, number of customers and purchases' => '1', '' => '0'],
                            'dataset' => 'advanced',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'avg_pur = rev / num_pur',
            'results' => ['rev' => 'avg_pur*num_pur', 'num_pur' => 'rev/avg_pur', 'avg_pur' => 'rev/num_pur'],
        ],
        [
            'title' => 'avg_freq = num_pur / num_cus',
            'results' => ['num_pur' => 'avg_freq*num_cus', 'num_cus' => 'num_pur/avg_freq', 'avg_freq' => 'num_pur/num_cus'],
        ],
        [
            'title' => 'avg_cus_value = avg_pur * avg_freq',
            'results' => ['avg_pur' => 'avg_cus_value/avg_freq', 'avg_freq' => 'avg_cus_value/avg_pur', 'avg_cus_value' => 'avg_freq*avg_pur'],
        ],
        [
            'title' => 'acl = sum_lifespan / num_cus',
            'results' => ['sum_lifespan' => 'acl*num_cus', 'acl' => 'sum_lifespan/num_cus', 'num_cus' => 'sum_lifespan/acl'],
        ],
        [
            'title' => 'cltv = avg_cus_value * acl',
            'results' => ['acl' => 'cltv/avg_cus_value', 'cltv' => 'acl*avg_cus_value', 'avg_cus_value' => 'cltv/acl'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        CLTV (customer lifetime value) takes Total revenue and Number of purchases and returns Number of customers and Average purchase value. There is no hidden constant here: change number of customers and total revenue moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the CLTV (customer lifetime value) calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind CLTV (customer lifetime value): it takes 2 numbers and reports Number of customers, Average purchase value and Average purchase frequency.</p><p>Written with the labels from the form, Average purchase value = Total revenue ÷ Number of purchases.</p><p>What comes back is Number of customers, Average purchase value, Average purchase frequency and Average customer value — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Total revenue</strong> — in USD</li><li><strong>Number of purchases</strong> — a plain number, no unit</li></ul><p>The answers come back as Number of customers, Average purchase value in USD, Average purchase frequency, Average customer value in USD, Sum of customer lifespans in years, Average customer lifespan in years, CLTV in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Sum of customer lifespans offers 5 units and opens on years, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Average purchase value</strong> = <code>Total revenue ÷ Number of purchases</code></li><li><strong>Total revenue</strong> = <code>Average purchase value × Number of purchases</code></li><li><strong>Number of purchases</strong> = <code>Total revenue ÷ Average purchase value</code></li><li><strong>Average purchase frequency</strong> = <code>Number of purchases ÷ Number of customers</code></li><li><strong>Number of customers</strong> = <code>Number of purchases ÷ Average purchase frequency</code></li><li><strong>Average customer value</strong> = <code>Average purchase frequency × Average purchase value</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Average purchase value</strong> = <code>Total revenue ÷ Number of purchases</code> — the form to use when Total revenue and Number of purchases are the values you have.</li><li><strong>Total revenue</strong> = <code>Average purchase value × Number of purchases</code> — the form to use when Average purchase value and Number of purchases are the values you have.</li><li><strong>Number of purchases</strong> = <code>Total revenue ÷ Average purchase value</code> — the form to use when Total revenue and Average purchase value are the values you have.</li><li><strong>Average purchase frequency</strong> = <code>Number of purchases ÷ Number of customers</code> — the form to use when Number of purchases and Number of customers are the values you have.</li><li><strong>Number of purchases</strong> = <code>Average purchase frequency × Number of customers</code> — the form to use when Average purchase frequency and Number of customers are the values you have.</li><li><strong>Number of customers</strong> = <code>Number of purchases ÷ Average purchase frequency</code> — the form to use when Number of purchases and Average purchase frequency are the values you have.</li><li><strong>Average customer value</strong> = <code>Average purchase frequency × Average purchase value</code> — the form to use when Average purchase frequency and Average purchase value are the values you have.</li><li><strong>Average purchase value</strong> = <code>Average customer value ÷ Average purchase frequency</code> — the form to use when Average customer value and Average purchase frequency are the values you have.</li></ul><p>Any one of Average purchase value, Total revenue and Number of purchases can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Number of customers, Average purchase value and Average purchase frequency are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Total revenue left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Total revenue is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Number of purchases left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Number of purchases is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Total revenue to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the CLTV (customer lifetime value) form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Total revenue</strong> takes a plain number with no unit attached. Change it and Number of purchases and Average purchase value changes with it. Fill it from a measurement rather than a memory — Total revenue is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Number of purchases</strong> takes a plain number with no unit attached. Change it and Total revenue, Average purchase value and Number of customers changes with it. Fill it from a measurement rather than a memory — Number of purchases is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Number of customers</strong> is a plain number. It is computed from Number of purchases and Average purchase frequency, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Average purchase value</strong> is a plain number. It is computed from Total revenue and Number of purchases, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Average purchase frequency</strong> is a plain number. It is computed from Number of purchases and Number of customers, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Average customer value</strong> is a plain number. It is computed from Average purchase frequency and Average purchase value, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Sum of customer lifespans</strong> is a years figure. It is computed from Average customer lifespan and Number of customers, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Average customer lifespan</strong> is a years figure. It is computed from Sum of customer lifespans and Number of customers, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>CLTV</strong> is a plain number. It is computed from Average customer lifespan and Average customer value, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on CLTV (customer lifetime value) actually offers.</p><ul><li><strong>years</strong> — opens in <em>yrs</em>, and the chip also carries days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Number of customers follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are years and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Total revenue and Number of purchases are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Total revenue and Number of purchases is what you already know and Number of customers and Average purchase value is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/home-affordability">Home affordability</a>, <a href="/finance/home-improvement-loan">Home improvement loan Calculator</a> and <a href="/finance/home-value-us">Home value US Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the CLTV (customer lifetime value) calculator work out?', 'a' => <<<'TXT'
            Number of customers, Average purchase value, Average purchase frequency and Average customer value, from Total revenue and Number of purchases. The relationship is Average purchase value = Total revenue ÷ Number of purchases.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Total revenue (USD), Number of purchases. Enter total revenue and number of purchases; Number of customers is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Average purchase value, Total revenue, Number of purchases and Average purchase frequency blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Number of customers is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Total revenue blank and the page solves for it, reporting Number of customers instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Number of customers keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/home-affordability', 'name' => 'Home affordability'],
            ['path' => '/finance/home-improvement-loan', 'name' => 'Home improvement loan Calculator'],
            ['path' => '/finance/home-value-us', 'name' => 'Home value US Calculator'],
        ],
        'authors' => [],
    ],
];
