<?php

/**
 * Private savings
 * /finance/private-savings
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Private savings',
    'meta' => ['title' => 'Private savings Calculator — Formula, Units & Example', 'description' => 'Enter total income and taxes paid to government and get private savings back. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Private savings Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'TotalIncome',
                            'label' => 'Total income',
                            'type' => 'number',
                            'help' => 'The total private sector income or gross domestic product (GPD).',
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
                            'name' => 'Tax',
                            'label' => 'Taxes paid to government',
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
                            'name' => 'Consumption',
                            'label' => 'Consumption',
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
                            'name' => 'additional_variables',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Include additional parameters' => '1', '' => '0'],
                            'dataset' => 'additional variables',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PrivateSavings',
                            'label' => 'Private savings',
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
                            'name' => 'NetFactorPayments',
                            'label' => 'Net factor payments from abroad',
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
                            'name' => 'Transfers',
                            'label' => 'Transfers from government',
                            'type' => 'number',
                            'help' => 'Transfers paid by the government to the consumers.',
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
                            'name' => 'InterestPayments',
                            'label' => 'Interest payments on the government\'s debt',
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
                            'name' => 'PrivateSavings_extended',
                            'label' => 'Private savings',
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
            'title' => 'PrivateSavings = TotalIncome - Tax - Consumption',
            'results' => ['Tax' => '-Consumption - PrivateSavings + TotalIncome', 'PrivateSavings' => '-Consumption - Tax + TotalIncome', 'TotalIncome' => 'Consumption + PrivateSavings + Tax', 'Consumption' => '-PrivateSavings - Tax + TotalIncome'],
        ],
        [
            'title' => 'PrivateSavings_extended = PrivateSavings + Transfers + NetFactorPayments + InterestPayments',
            'results' => [
                'PrivateSavings' => '-InterestPayments - NetFactorPayments + PrivateSavings_extended - Transfers',
                'NetFactorPayments' => '-InterestPayments - PrivateSavings + PrivateSavings_extended - Transfers',
                'InterestPayments' => '-NetFactorPayments - PrivateSavings + PrivateSavings_extended - Transfers',
                'Transfers' => '-InterestPayments - NetFactorPayments - PrivateSavings + PrivateSavings_extended',
                'PrivateSavings_extended' => 'InterestPayments + NetFactorPayments + PrivateSavings + Transfers',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Private savings works out Private savings and Net factor payments from abroad from Total income, Taxes paid to government and Consumption. Nothing is looked up on this page: private savings is computed from total income and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Private savings is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Private savings calculator works', 'html' => <<<'TXT'
            <p>The Private savings calculator applies one relationship to 3 numbers and reports Private savings, Net factor payments from abroad and Transfers from government.</p><p>The relationship it solves reads Private savings = − Consumption − Taxes paid to government + Total income.</p><p>The result panel carries Private savings, Net factor payments from abroad, Transfers from government and Interest payments on the government&#039;s debt, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Total income</strong> — in USD. The total private sector income or gross domestic product (GPD).</li><li><strong>Taxes paid to government</strong> — in USD</li><li><strong>Consumption</strong> — in USD</li></ul><p>The result boxes are Private savings in USD, Net factor payments from abroad in USD, Transfers from government in USD, Interest payments on the government&#039;s debt in USD, Private savings in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Private savings is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Private savings</strong> = <code>− Consumption − Taxes paid to government + Total income</code></li><li><strong>Taxes paid to government</strong> = <code>− Consumption − Private savings + Total income</code></li><li><strong>Total income</strong> = <code>Consumption + Private savings + Taxes paid to government</code></li><li><strong>Consumption</strong> = <code>− Private savings − Taxes paid to government + Total income</code></li><li><strong>Net factor payments from abroad</strong> = <code>− Interest payments on the government&#039;s debt − Private savings + Private savings − Transfers from government</code></li><li><strong>Interest payments on the government&#039;s debt</strong> = <code>− Net factor payments from abroad − Private savings + Private savings − Transfers from government</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Private savings</strong> = <code>− Consumption − Taxes paid to government + Total income</code> — the form to use when Consumption, Taxes paid to government and Total income are the values you have.</li><li><strong>Taxes paid to government</strong> = <code>− Consumption − Private savings + Total income</code> — the form to use when Consumption, Private savings and Total income are the values you have.</li><li><strong>Total income</strong> = <code>Consumption + Private savings + Taxes paid to government</code> — the form to use when Consumption, Private savings and Taxes paid to government are the values you have.</li><li><strong>Consumption</strong> = <code>− Private savings − Taxes paid to government + Total income</code> — the form to use when Private savings, Taxes paid to government and Total income are the values you have.</li><li><strong>Private savings</strong> = <code>Interest payments on the government&#039;s debt + Net factor payments from abroad + Private savings + Transfers from government</code> — the form to use when Interest payments on the government&#039;s debt, Net factor payments from abroad, Private savings and Transfers from government are the values you have.</li><li><strong>Private savings</strong> = <code>− Interest payments on the government&#039;s debt − Net factor payments from abroad + Private savings − Transfers from government</code> — the form to use when Interest payments on the government&#039;s debt, Net factor payments from abroad, Private savings and Transfers from government are the values you have.</li><li><strong>Net factor payments from abroad</strong> = <code>− Interest payments on the government&#039;s debt − Private savings + Private savings − Transfers from government</code> — the form to use when Interest payments on the government&#039;s debt, Private savings, Private savings and Transfers from government are the values you have.</li><li><strong>Interest payments on the government&#039;s debt</strong> = <code>− Net factor payments from abroad − Private savings + Private savings − Transfers from government</code> — the form to use when Net factor payments from abroad, Private savings, Private savings and Transfers from government are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Private savings, Taxes paid to government and Total income can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Private savings, Net factor payments from abroad and Transfers from government are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Total income left as a guess.</strong> Anything typed into Total income is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Taxes paid to government left as a guess.</strong> Anything typed into Taxes paid to government is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Consumption left as a guess.</strong> Anything typed into Consumption is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Total income to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Private savings form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Total income</strong> takes a plain number with no unit attached. The total private sector income or gross domestic product (GPD). Change it and Taxes paid to government, Private savings and Consumption changes with it. Fill it from a measurement rather than a memory — Total income is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Taxes paid to government</strong> takes a plain number with no unit attached. Change it and Private savings, Total income and Consumption changes with it. Fill it from a measurement rather than a memory — Taxes paid to government is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Consumption</strong> takes a plain number with no unit attached. Change it and Taxes paid to government, Private savings and Total income changes with it. Fill it from a measurement rather than a memory — Consumption is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Private savings</strong> is a plain number. It is computed from Consumption, Taxes paid to government and Total income, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Net factor payments from abroad</strong> is a plain number. It is computed from Interest payments on the government's debt, Private savings, Private savings and Transfers from government, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Transfers from government</strong> is a plain number. It is computed from Interest payments on the government's debt, Net factor payments from abroad, Private savings and Private savings, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Interest payments on the government&#039;s debt</strong> is a plain number. It is computed from Net factor payments from abroad, Private savings, Private savings and Transfers from government, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Private savings</strong> is a plain number. It is computed from Interest payments on the government's debt, Net factor payments from abroad, Private savings and Transfers from government, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Private savings is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Total income, Taxes paid to government and Consumption are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Total income, Taxes paid to government and Consumption measured, Private savings and Net factor payments from abroad wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/boat-loan">Boat loan</a>, <a href="/finance/bond-convexity">Bond convexity</a> and <a href="/finance/bond-current-yield">Bond current yield Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Private savings calculator work out?', 'a' => <<<'TXT'
            Private savings, Net factor payments from abroad, Transfers from government and Interest payments on the government's debt, from Consumption, Taxes paid to government and Total income. The relationship is Private savings = − Consumption − Taxes paid to government + Total income.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Total income (USD), Taxes paid to government (USD), Consumption (USD). Enter total income, taxes paid to government and consumption; Private savings is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Private savings, Taxes paid to government, Total income and Consumption can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Private savings is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Total income blank and the page solves for it, reporting Private savings instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Private savings keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/boat-loan', 'name' => 'Boat loan'],
            ['path' => '/finance/bond-convexity', 'name' => 'Bond convexity'],
            ['path' => '/finance/bond-current-yield', 'name' => 'Bond current yield Calculator'],
        ],
        'authors' => [],
    ],
];
