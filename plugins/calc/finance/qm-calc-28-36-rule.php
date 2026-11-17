<?php

/**
 * 28/36 Rule
 * /finance/28-36-rule
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => '28/36 Rule',
    'meta' => ['title' => '28/36 Rule Calculator: Formula, Steps & Examples', 'description' => '28/36 Rule turns income, do you want to input individual housing expenses separately? and principal loan amount into housing costs and front-end ratio.', 'h1' => '28/36 Rule Calculator', 'updated' => '2026-09-27'],
    'sections' => [
        [
            'title' => 'Front-end ratio — 28% rule',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'income',
                            'label' => 'Income',
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
                            'name' => 'show_individual_expenses',
                            'label' => 'Do you want to input individual housing expenses separately?',
                            'type' => 'select',
                            'options' => ['Yes' => '1'],
                            'dataset' => 'yes_no_VS',
                            'control' => 'CHECKBOX',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'principal_loan_amount',
                            'label' => 'Principal loan amount',
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
                            'name' => 'loan_interest',
                            'label' => 'Loan interest',
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
                            'name' => 'property_tax',
                            'label' => 'Property tax',
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
                            'name' => 'insurance',
                            'label' => 'Insurance',
                            'type' => 'number',
                            'help' => 'Homeowner property insurance or mortgage insurance premium.',
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
                            'name' => 'housing_costs',
                            'label' => 'Housing costs',
                            'type' => 'number',
                            'help' => 'Maximum household expenses.',
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
                            'name' => 'front_end_ratio',
                            'label' => 'Front-end ratio',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'front_end_ratio > 0.28', 'text' => 'Watch out! Your front-end ratio {{front_end_ratio.formattedValue}}% exceeds the recommended maximum 28%.&nbsp;'],
                                ['when' => 'front_end_ratio <= 0.28', 'text' => 'Your front-end ratio {{front_end_ratio.formattedValue}}% is below the recommended maximum 28%.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Back-end ratio — 36% rule',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'other_debts',
                            'label' => 'Other debts',
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
                            'name' => 'total_debt',
                            'label' => 'Total debt',
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
                            'name' => 'back_end_ratio',
                            'label' => 'Back-end ratio',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'back_end_ratio > 0.36', 'text' => 'Watch out! Your back-end ratio {{back_end_ratio.formattedValue}}% exceeds the recommended maximum 36%.'],
                                ['when' => 'back_end_ratio <= 0.36', 'text' => 'Your back-end ratio {{back_end_ratio.formattedValue}}% is below the maximum recommended 36%.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'front_end_ratio = housing_costs / income',
            'results' => ['front_end_ratio' => 'housing_costs/income', 'income' => 'housing_costs/front_end_ratio', 'housing_costs' => 'front_end_ratio*income'],
        ],
        [
            'title' => 'housing_costs = principal_loan_amount + loan_interest + property_tax + insurance',
            'results' => [
                'loan_interest' => 'housing_costs - insurance - principal_loan_amount - property_tax',
                'property_tax' => 'housing_costs - insurance - loan_interest - principal_loan_amount',
                'housing_costs' => 'insurance + loan_interest + principal_loan_amount + property_tax',
                'principal_loan_amount' => 'housing_costs - insurance - loan_interest - property_tax',
                'insurance' => 'housing_costs - loan_interest - principal_loan_amount - property_tax',
            ],
        ],
        [
            'title' => 'total_debt = housing_costs + other_debts',
            'results' => ['total_debt' => 'housing_costs + other_debts', 'housing_costs' => '-other_debts + total_debt', 'other_debts' => '-housing_costs + total_debt'],
        ],
        [
            'title' => 'back_end_ratio = total_debt / income',
            'results' => ['total_debt' => 'back_end_ratio*income', 'back_end_ratio' => 'total_debt/income', 'income' => 'total_debt/back_end_ratio'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        28/36 Rule turns Income and Housing costs into Principal loan amount and Loan interest. There is no hidden constant here: change principal loan amount and income moves with it. The main result, Principal loan amount, is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the 28/36 Rule calculator works', 'html' => <<<'TXT'
            <p>28/36 Rule answers one question from 2 numbers, and the answer is Principal loan amount, Loan interest and Property tax.</p><p>The relationship it solves reads Front-end ratio = Housing costs ÷ Income.</p><p>What comes back is Principal loan amount, Loan interest, Property tax and Insurance — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Income</strong> — in USD</li><li><strong>Housing costs</strong> — in USD. Maximum household expenses.</li></ul><p>The answers come back as Principal loan amount in USD, Loan interest in USD, Property tax in USD, Insurance in USD, Front-end ratio in percent, Other debts in USD, Total debt in USD, Back-end ratio in percent. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Front-end ratio offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Front-end ratio</strong> = <code>Housing costs ÷ Income</code></li><li><strong>Income</strong> = <code>Housing costs ÷ Front-end ratio</code></li><li><strong>Housing costs</strong> = <code>Front-end ratio × Income</code></li><li><strong>Loan interest</strong> = <code>Housing costs − Insurance − Principal loan amount − Property tax</code></li><li><strong>Property tax</strong> = <code>Housing costs − Insurance − Loan interest − Principal loan amount</code></li><li><strong>Principal loan amount</strong> = <code>Housing costs − Insurance − Loan interest − Property tax</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Front-end ratio</strong> = <code>Housing costs ÷ Income</code> — the form to use when Housing costs and Income are the values you have.</li><li><strong>Income</strong> = <code>Housing costs ÷ Front-end ratio</code> — the form to use when Housing costs and Front-end ratio are the values you have.</li><li><strong>Housing costs</strong> = <code>Front-end ratio × Income</code> — the form to use when Front-end ratio and Income are the values you have.</li><li><strong>Housing costs</strong> = <code>Insurance + Loan interest + Principal loan amount + Property tax</code> — the form to use when Insurance, Loan interest, Principal loan amount and Property tax are the values you have.</li><li><strong>Loan interest</strong> = <code>Housing costs − Insurance − Principal loan amount − Property tax</code> — the form to use when Housing costs, Insurance, Principal loan amount and Property tax are the values you have.</li><li><strong>Property tax</strong> = <code>Housing costs − Insurance − Loan interest − Principal loan amount</code> — the form to use when Housing costs, Insurance, Loan interest and Principal loan amount are the values you have.</li><li><strong>Principal loan amount</strong> = <code>Housing costs − Insurance − Loan interest − Property tax</code> — the form to use when Housing costs, Insurance, Loan interest and Property tax are the values you have.</li><li><strong>Insurance</strong> = <code>Housing costs − Loan interest − Principal loan amount − Property tax</code> — the form to use when Housing costs, Loan interest, Principal loan amount and Property tax are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Front-end ratio, Income and Housing costs can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Principal loan amount, Loan interest and Property tax are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Income left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Income is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Housing costs left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Housing costs is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Income is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Income</strong> takes a plain number with no unit attached. It feeds Front-end ratio, Housing costs and Total debt. Have it to hand before you start: Income is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Housing costs</strong> takes a plain number with no unit attached. Maximum household expenses. It feeds Front-end ratio, Income and Loan interest. Have it to hand before you start: Housing costs is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 8 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Principal loan amount</strong> is a plain number. It is computed from Housing costs, Insurance, Loan interest and Property tax, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Loan interest</strong> is a plain number. It is computed from Housing costs, Insurance, Principal loan amount and Property tax, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Property tax</strong> is a plain number. It is computed from Housing costs, Insurance, Loan interest and Principal loan amount, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Insurance</strong> is a plain number. It is computed from Housing costs, Loan interest, Principal loan amount and Property tax, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Front-end ratio</strong> is a percent figure. It is computed from Housing costs and Income, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Other debts</strong> is a plain number. It is computed from Housing costs and Total debt, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Total debt</strong> is a plain number. It is computed from Housing costs and Other debts, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Back-end ratio</strong> is a percent figure. It is computed from Total debt and Income, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Principal loan amount follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Income and Housing costs measured, Principal loan amount and Loan interest wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/operating-asset-turnover">Operating asset turnover Calculator</a>, <a href="/finance/operating-cash-flow-ratio">Operating cash flow ratio Calculator</a> and <a href="/finance/operating-cash-flow">Operating cash flow</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the 28/36 Rule calculator work out?', 'a' => 'Principal loan amount, Loan interest, Property tax and Insurance, from Housing costs and Income. The relationship is Front-end ratio = Housing costs ÷ Income.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Income (USD), Housing costs (USD). With income and housing costs in place, Principal loan amount can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Front-end ratio, Income, Housing costs and Loan interest can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Principal loan amount is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Income left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Principal loan amount keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/operating-asset-turnover', 'name' => 'Operating asset turnover Calculator'],
            ['path' => '/finance/operating-cash-flow-ratio', 'name' => 'Operating cash flow ratio Calculator'],
            ['path' => '/finance/operating-cash-flow', 'name' => 'Operating cash flow'],
        ],
        'authors' => [],
    ],
];
