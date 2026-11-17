<?php

/**
 * Net income
 * /finance/net-income
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Net income',
    'meta' => ['title' => 'Net income Calculator: Formula, Steps & Examples', 'description' => 'Net income turns revenue and cost of sales into gross profit and operating income. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Net income Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => 'Net income before taxes',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'revenue',
                            'label' => 'Revenue',
                            'type' => 'number',
                            'help' => 'Total money earned from sales before any costs.',
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
                            'name' => 'cost_of_sales',
                            'label' => 'Cost of sales',
                            'type' => 'number',
                            'help' => 'Direct costs of producing goods or services sold; also called "cost of goods sold" (COGS).',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Gross_profit',
                            'label' => 'Gross profit',
                            'type' => 'number',
                            'help' => 'Revenue minus COGS.',
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
                            'name' => 'operating_expenses',
                            'label' => 'Operating expenses',
                            'type' => 'number',
                            'help' => 'Day-to-day operating costs like salaries, rent, utilities, etc.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Operating_income',
                            'label' => 'Operating income',
                            'type' => 'number',
                            'help' => 'Gross profit minus operating expenses.',
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
                            'name' => 'interests',
                            'label' => 'Interest',
                            'type' => 'number',
                            'help' => 'Cost of borrowed money (loan/bond interest).',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Net_income_before_taxes',
                            'label' => 'Net income before taxes',
                            'type' => 'number',
                            'help' => 'Earnings before taxes (EBT).',
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
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'Net_income_before_taxes>0', 'text' => 'Hurrah! Your business is profitable and soon will make you a millionaire '],
                                ['when' => 'Net_income_before_taxes<=0', 'text' => 'Your business is still not profitable. Keep going! '],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Taxes',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Tax_bracket',
                            'label' => 'Tax rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'taxes',
                            'label' => 'Total taxes',
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
                            'name' => 'net_income1',
                            'label' => 'Net income after taxes',
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
            'title' => '',
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
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'net_income = revenue - cost_of_sales - operating_expenses - interests - taxes',
            'results' => [
                'revenue' => 'cost_of_sales + interests + net_income + operating_expenses + taxes',
                'net_income' => '-cost_of_sales - interests - operating_expenses + revenue - taxes',
                'taxes' => '-cost_of_sales - interests - net_income - operating_expenses + revenue',
                'interests' => '-cost_of_sales - net_income - operating_expenses + revenue - taxes',
                'operating_expenses' => '-cost_of_sales - interests - net_income + revenue - taxes',
                'cost_of_sales' => '-interests - net_income - operating_expenses + revenue - taxes',
            ],
        ],
        [
            'title' => 'Gross_profit = revenue - cost_of_sales',
            'results' => ['Gross_profit' => '-cost_of_sales + revenue', 'revenue' => 'Gross_profit + cost_of_sales', 'cost_of_sales' => '-Gross_profit + revenue'],
        ],
        [
            'title' => 'Operating_income = revenue - cost_of_sales - operating_expenses ',
            'results' => ['Operating_income' => '-cost_of_sales - operating_expenses + revenue', 'revenue' => 'Operating_income + cost_of_sales + operating_expenses', 'operating_expenses' => '-Operating_income - cost_of_sales + revenue', 'cost_of_sales' => '-Operating_income - operating_expenses + revenue'],
        ],
        [
            'title' => 'Net_income_before_taxes = Operating_income - interests',
            'results' => ['Operating_income' => 'Net_income_before_taxes + interests', 'interests' => '-Net_income_before_taxes + Operating_income', 'Net_income_before_taxes' => 'Operating_income - interests'],
        ],
        [
            'title' => 'net_income1=Net_income_before_taxes *(1 - Tax_bracket)',
            'results' => ['Net_income_before_taxes' => '-net_income1/(Tax_bracket - 1)', 'net_income1' => 'Net_income_before_taxes*(1 - Tax_bracket)', 'Tax_bracket' => '(Net_income_before_taxes - net_income1)/Net_income_before_taxes'],
        ],
        [
            'title' => 'taxes=Net_income_before_taxes - net_income1',
            'results' => ['net_income1' => 'Net_income_before_taxes - taxes', 'taxes' => 'Net_income_before_taxes - net_income1', 'Net_income_before_taxes' => 'net_income1 + taxes'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Enter Revenue, Cost of sales and Operating expenses into Net income and the answer comes back as Gross profit and Operating income. The arithmetic is the whole method: gross profit is worked out from revenue by one formula, applied once. Gross profit comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Net income calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Net income: it takes 5 numbers and reports Gross profit, Operating income and Net income before taxes.</p><p>Written with the labels from the form, Net income = − Cost of sales − Interest − Operating expenses + Revenue − Total taxes.</p><p>What comes back is Gross profit, Operating income, Net income before taxes and Tax rate — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 5 boxes, and nothing else.</p><ul><li><strong>Revenue</strong> — in USD. Total money earned from sales before any costs.</li><li><strong>Cost of sales</strong> — in USD. Direct costs of producing goods or services sold; also called &quot;cost of goods sold&quot; (COGS).</li><li><strong>Operating expenses</strong> — in USD. Day-to-day operating costs like salaries, rent, utilities, etc.</li><li><strong>Interest</strong> — in USD. Cost of borrowed money (loan/bond interest).</li><li><strong>Total taxes</strong> — in USD</li></ul><p>The result boxes are Gross profit in USD, Operating income in USD, Net income before taxes in USD, Tax rate in percent, Net income after taxes in USD, Net income in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Revenue = 10 USD, Cost of sales = 100 USD, Operating expenses = 1000 USD, Interest = 10 USD and Total taxes = 100 USD gives <strong>Net income</strong> = -1200 USD, <strong>Gross profit</strong> = -90 USD, <strong>Operating income</strong> = -1090 USD, <strong>Net income before taxes</strong> = -1100 USD, <strong>Net income after taxes</strong> = -1200 USD and <strong>Tax rate</strong> = -0.0909 perc.</p><ul><li><strong>Net income</strong> = -1200 USD</li><li><strong>Gross profit</strong> = -90 USD</li><li><strong>Operating income</strong> = -1090 USD</li><li><strong>Net income before taxes</strong> = -1100 USD</li><li><strong>Net income after taxes</strong> = -1200 USD</li><li><strong>Tax rate</strong> = -0.0909 perc</li></ul><p>That is <strong>Net income</strong> = <code>− Cost of sales − Interest − Operating expenses + Revenue − Total taxes</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Net income</strong> = -1200, <strong>Gross profit</strong> = -90, <strong>Operating income</strong> = -1090, <strong>Net income before taxes</strong> = -1100, <strong>Net income after taxes</strong> = -1200 and <strong>Tax rate</strong> = -0.0909. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Tax rate lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Net income</strong> = <code>− Cost of sales − Interest − Operating expenses + Revenue − Total taxes</code></li><li><strong>Revenue</strong> = <code>Cost of sales + Interest + Net income + Operating expenses + Total taxes</code></li><li><strong>Total taxes</strong> = <code>− Cost of sales − Interest − Net income − Operating expenses + Revenue</code></li><li><strong>Interest</strong> = <code>− Cost of sales − Net income − Operating expenses + Revenue − Total taxes</code></li><li><strong>Operating expenses</strong> = <code>− Cost of sales − Interest − Net income + Revenue − Total taxes</code></li><li><strong>Cost of sales</strong> = <code>− Interest − Net income − Operating expenses + Revenue − Total taxes</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Net income</strong> = <code>− Cost of sales − Interest − Operating expenses + Revenue − Total taxes</code> — the form to use when Cost of sales, Interest, Operating expenses and Revenue are the values you have.</li><li><strong>Revenue</strong> = <code>Cost of sales + Interest + Net income + Operating expenses + Total taxes</code> — the form to use when Cost of sales, Interest, Net income and Operating expenses are the values you have.</li><li><strong>Total taxes</strong> = <code>− Cost of sales − Interest − Net income − Operating expenses + Revenue</code> — the form to use when Cost of sales, Interest, Net income and Operating expenses are the values you have.</li><li><strong>Interest</strong> = <code>− Cost of sales − Net income − Operating expenses + Revenue − Total taxes</code> — the form to use when Cost of sales, Net income, Operating expenses and Revenue are the values you have.</li><li><strong>Operating expenses</strong> = <code>− Cost of sales − Interest − Net income + Revenue − Total taxes</code> — the form to use when Cost of sales, Interest, Net income and Revenue are the values you have.</li><li><strong>Cost of sales</strong> = <code>− Interest − Net income − Operating expenses + Revenue − Total taxes</code> — the form to use when Interest, Net income, Operating expenses and Revenue are the values you have.</li><li><strong>Gross profit</strong> = <code>− Cost of sales + Revenue</code> — the form to use when Cost of sales and Revenue are the values you have.</li><li><strong>Revenue</strong> = <code>Gross profit + Cost of sales</code> — the form to use when Gross profit and Cost of sales are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Net income, Revenue and Total taxes can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Revenue, from 10 to 20 — and the answers go from <strong>Net income</strong> -1200 USD, <strong>Gross profit</strong> -90 USD, <strong>Operating income</strong> -1090 USD, <strong>Net income before taxes</strong> -1100 USD, <strong>Net income after taxes</strong> -1200 USD and <strong>Tax rate</strong> -0.0909 perc to <strong>Net income</strong> -1190 USD, <strong>Gross profit</strong> -80 USD, <strong>Operating income</strong> -1080 USD, <strong>Net income before taxes</strong> -1090 USD, <strong>Net income after taxes</strong> -1190 USD and <strong>Tax rate</strong> -0.0917 perc.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Gross profit, Operating income and Net income before taxes are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Revenue left as a guess.</strong> Anything typed into Revenue is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Cost of sales left as a guess.</strong> Anything typed into Cost of sales is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Operating expenses left as a guess.</strong> Anything typed into Operating expenses is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Revenue to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Revenue</strong> takes a plain number with no unit attached. Total money earned from sales before any costs. Change it and Net income, Total taxes and Interest changes with it. Have it to hand before you start: Revenue is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Cost of sales</strong> takes a plain number with no unit attached. Direct costs of producing goods or services sold; also called &quot;cost of goods sold&quot; (COGS). Change it and Revenue, Net income and Total taxes changes with it. Have it to hand before you start: Cost of sales is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Operating expenses</strong> takes a plain number with no unit attached. Day-to-day operating costs like salaries, rent, utilities, etc. Change it and Revenue, Net income and Total taxes changes with it. Have it to hand before you start: Operating expenses is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Interest</strong> takes a plain number with no unit attached. Cost of borrowed money (loan/bond interest). Change it and Revenue, Net income and Total taxes changes with it. Have it to hand before you start: Interest is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Total taxes</strong> takes a plain number with no unit attached. Change it and Revenue, Net income and Interest changes with it. Have it to hand before you start: Total taxes is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Gross profit is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Revenue, Cost of sales and Operating expenses are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Revenue, Cost of sales and Operating expenses and the number you are missing is Gross profit and Operating income.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/goodwill">Goodwill Calculator</a>, <a href="/finance/google-adsense">Google AdSense Calculator</a> and <a href="/finance/graham-number">Graham number Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Net income calculator work out?', 'a' => <<<'TXT'
            Gross profit, Operating income, Net income before taxes and Tax rate, from Cost of sales, Interest, Operating expenses and Revenue. The relationship is Net income = − Cost of sales − Interest − Operating expenses + Revenue − Total taxes.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Revenue (USD), Cost of sales (USD), Operating expenses (USD), Interest (USD), Total taxes (USD). With revenue, cost of sales and operating expenses in place, Gross profit can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Net income, Revenue, Total taxes and Interest can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Net income = -1200 USD, Gross profit = -90 USD, Operating income = -1090 USD, Net income before taxes = -1100 USD, Net income after taxes = -1200 USD and Tax rate = -0.0909 perc. The figures come from Revenue as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Gross profit is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Revenue left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Gross profit keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/goodwill', 'name' => 'Goodwill Calculator'],
            ['path' => '/finance/google-adsense', 'name' => 'Google AdSense Calculator'],
            ['path' => '/finance/graham-number', 'name' => 'Graham number Calculator'],
        ],
        'authors' => [],
    ],
];
