<?php

/**
 * Free cash flow to firm (FCFF)
 * /finance/free-cash-flow-to-firm
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Free cash flow to firm (FCFF)',
    'meta' => ['title' => 'Free cash flow to firm (FCFF) — Formula & Results', 'description' => 'Free cash flow to firm (FCFF) works out net income from select source and EBITDA. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Free cash flow to firm (FCFF) Calculator', 'updated' => '2026-09-15'],
    'sections' => [
        [
            'title' => 'Source',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sources',
                            'label' => 'Select source',
                            'type' => 'select',
                            'options' => ['Net income' => '0', 'Earnings before interest, taxes, depreciation, and amortization (EBITDA)' => '1', 'Earnings before interest and taxes (EBIT)' => '2', 'Cash flow from operation (CFO)' => '3'],
                            'dataset' => 'source',
                            'default' => 'Net income',
                        ],
                    ],
                ],
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
                            'name' => 'ebitda',
                            'label' => 'EBITDA',
                            'type' => 'number',
                            'help' => 'Earnings before interest, taxes, depreciation, and amortization',
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
                            'name' => 'ebit',
                            'label' => 'EBIT',
                            'type' => 'number',
                            'help' => 'Earnings before interest and taxes',
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
                            'name' => 'cfo',
                            'label' => 'CFO',
                            'type' => 'number',
                            'help' => 'Cash flow from operation',
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
            'title' => 'Adjustments',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'depreciation_amortization',
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
                            'name' => 'interest_expense',
                            'label' => 'Interest expense',
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
                            'name' => 'tax_rate',
                            'label' => 'Corporate tax rate',
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
                            'name' => 'fixed_capital_investment',
                            'label' => 'Fixed capital investment',
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
                            'name' => 'working_capital_investment',
                            'label' => 'Working capital investment',
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
                            'name' => 'fcff',
                            'label' => 'Free cash flow to firm (FCFF)',
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
            'title' => 'fcff = net_income + depreciation_amortization + interest_expense * (1 - tax_rate) - fixed_capital_investment - working_capital_investment',
            'results' => [
                'net_income' => '-depreciation_amortization + fcff + fixed_capital_investment + interest_expense*tax_rate - interest_expense + working_capital_investment',
                'tax_rate' => '(depreciation_amortization - fcff - fixed_capital_investment + interest_expense + net_income - working_capital_investment)/interest_expense',
                'depreciation_amortization' => 'fcff + fixed_capital_investment + interest_expense*tax_rate - interest_expense - net_income + working_capital_investment',
                'working_capital_investment' => 'depreciation_amortization - fcff - fixed_capital_investment - interest_expense*tax_rate + interest_expense + net_income',
                'fcff' => 'depreciation_amortization - fixed_capital_investment - interest_expense*tax_rate + interest_expense + net_income - working_capital_investment',
                'interest_expense' => '(depreciation_amortization - fcff - fixed_capital_investment + net_income - working_capital_investment)/(tax_rate - 1)',
                'fixed_capital_investment' => 'depreciation_amortization - fcff - interest_expense*tax_rate + interest_expense + net_income - working_capital_investment',
            ],
        ],
        [
            'title' => 'fcff = ebitda * (1 - tax_rate) + depreciation_amortization * tax_rate - fixed_capital_investment - working_capital_investment',
            'results' => [
                'ebitda' => '(depreciation_amortization*tax_rate - fcff - fixed_capital_investment - working_capital_investment)/(tax_rate - 1)',
                'tax_rate' => '(-ebitda + fcff + fixed_capital_investment + working_capital_investment)/(depreciation_amortization - ebitda)',
                'depreciation_amortization' => '(ebitda*tax_rate - ebitda + fcff + fixed_capital_investment + working_capital_investment)/tax_rate',
                'working_capital_investment' => 'depreciation_amortization*tax_rate - ebitda*tax_rate + ebitda - fcff - fixed_capital_investment',
                'fcff' => 'depreciation_amortization*tax_rate - ebitda*tax_rate + ebitda - fixed_capital_investment - working_capital_investment',
                'fixed_capital_investment' => 'depreciation_amortization*tax_rate - ebitda*tax_rate + ebitda - fcff - working_capital_investment',
            ],
        ],
        [
            'title' => 'fcff = ebit * (1 - tax_rate) + depreciation_amortization - fixed_capital_investment - working_capital_investment',
            'results' => [
                'ebit' => '(depreciation_amortization - fcff - fixed_capital_investment - working_capital_investment)/(tax_rate - 1)',
                'tax_rate' => '(depreciation_amortization + ebit - fcff - fixed_capital_investment - working_capital_investment)/ebit',
                'depreciation_amortization' => 'ebit*tax_rate - ebit + fcff + fixed_capital_investment + working_capital_investment',
                'working_capital_investment' => 'depreciation_amortization - ebit*tax_rate + ebit - fcff - fixed_capital_investment',
                'fcff' => 'depreciation_amortization - ebit*tax_rate + ebit - fixed_capital_investment - working_capital_investment',
                'fixed_capital_investment' => 'depreciation_amortization - ebit*tax_rate + ebit - fcff - working_capital_investment',
            ],
        ],
        [
            'title' => 'fcff = cfo + interest_expense * (1 - tax_rate) - fixed_capital_investment',
            'results' => [
                'tax_rate' => '(cfo - fcff - fixed_capital_investment + interest_expense)/interest_expense',
                'fixed_capital_investment' => 'cfo - fcff - interest_expense*tax_rate + interest_expense',
                'fcff' => 'cfo - fixed_capital_investment - interest_expense*tax_rate + interest_expense',
                'interest_expense' => '(cfo - fcff - fixed_capital_investment)/(tax_rate - 1)',
                'cfo' => 'fcff + fixed_capital_investment + interest_expense*tax_rate - interest_expense',
            ],
        ],
        [
            'title' => 'net_income = (ebitda - depreciation_amortization - interest_expense) * (1 - tax_rate)',
            'results' => [
                'ebitda' => '(depreciation_amortization*tax_rate - depreciation_amortization + interest_expense*tax_rate - interest_expense - net_income)/(tax_rate - 1)',
                'net_income' => 'depreciation_amortization*tax_rate - depreciation_amortization - ebitda*tax_rate + ebitda + interest_expense*tax_rate - interest_expense',
                'tax_rate' => '(depreciation_amortization - ebitda + interest_expense + net_income)/(depreciation_amortization - ebitda + interest_expense)',
                'depreciation_amortization' => '(ebitda*tax_rate - ebitda - interest_expense*tax_rate + interest_expense + net_income)/(tax_rate - 1)',
                'interest_expense' => '(-depreciation_amortization*tax_rate + depreciation_amortization + ebitda*tax_rate - ebitda + net_income)/(tax_rate - 1)',
            ],
        ],
        [
            'title' => 'ebit = ebitda - depreciation_amortization',
            'results' => ['depreciation_amortization' => '-ebit + ebitda', 'ebit' => '-depreciation_amortization + ebitda', 'ebitda' => 'depreciation_amortization + ebit'],
        ],
        [
            'title' => 'cfo = net_income + depreciation_amortization - working_capital_investment',
            'results' => ['depreciation_amortization' => 'cfo - net_income + working_capital_investment', 'working_capital_investment' => '-cfo + depreciation_amortization + net_income', 'cfo' => 'depreciation_amortization + net_income - working_capital_investment', 'net_income' => 'cfo - depreciation_amortization + working_capital_investment'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Free cash flow to firm (FCFF) takes Net income, Depreciation and amortization and Interest expense and returns EBITDA and EBIT. It is a single relationship that reads EBITDA out of net income, not a table of canned results keyed by them. Units for EBITDA default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Free cash flow to firm (FCFF) calculator works', 'html' => <<<'TXT'
            <p>Free cash flow to firm (FCFF) answers one question from 6 numbers, and the answer is EBITDA, EBIT and CFO.</p><p>The relationship it solves reads Free cash flow to firm (FCFF) = Depreciation and amortization − Fixed capital investment − Interest expense × Corporate tax rate + Interest expense + Net income − Working capital investment.</p><p>The answers are EBITDA, EBIT, CFO and Free cash flow to firm (FCFF); they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 6 boxes, and nothing else.</p><ul><li><strong>Net income</strong> — in USD</li><li><strong>Depreciation and amortization</strong> — in USD</li><li><strong>Interest expense</strong> — in USD</li><li><strong>Corporate tax rate</strong> — in percent</li><li><strong>Fixed capital investment</strong> — in USD</li><li><strong>Working capital investment</strong> — in USD</li></ul><p>The answers come back as EBITDA in USD, EBIT in USD, CFO in USD, Free cash flow to firm (FCFF) in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Corporate tax rate offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Free cash flow to firm (FCFF)</strong> = <code>Depreciation and amortization − Fixed capital investment − Interest expense × Corporate tax rate + Interest expense + Net income − Working capital investment</code></li><li><strong>Net income</strong> = <code>− Depreciation and amortization + Free cash flow to firm (FCFF) + Fixed capital investment + Interest expense × Corporate tax rate − Interest expense + Working capital investment</code></li><li><strong>Corporate tax rate</strong> = <code>(Depreciation and amortization − Free cash flow to firm (FCFF) − Fixed capital investment + Interest expense + Net income − Working capital investment) ÷ Interest expense</code></li><li><strong>Depreciation and amortization</strong> = <code>Free cash flow to firm (FCFF) + Fixed capital investment + Interest expense × Corporate tax rate − Interest expense − Net income + Working capital investment</code></li><li><strong>Working capital investment</strong> = <code>Depreciation and amortization − Free cash flow to firm (FCFF) − Fixed capital investment − Interest expense × Corporate tax rate + Interest expense + Net income</code></li><li><strong>Interest expense</strong> = <code>(Depreciation and amortization − Free cash flow to firm (FCFF) − Fixed capital investment + Net income − Working capital investment) ÷ (Corporate tax rate − 1)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Free cash flow to firm (FCFF)</strong> = <code>Depreciation and amortization − Fixed capital investment − Interest expense × Corporate tax rate + Interest expense + Net income − Working capital investment</code> — the form to use when Depreciation and amortization, Fixed capital investment, Interest expense and Corporate tax rate are the values you have.</li><li><strong>Net income</strong> = <code>− Depreciation and amortization + Free cash flow to firm (FCFF) + Fixed capital investment + Interest expense × Corporate tax rate − Interest expense + Working capital investment</code> — the form to use when Depreciation and amortization, Free cash flow to firm (FCFF), Fixed capital investment and Interest expense are the values you have.</li><li><strong>Corporate tax rate</strong> = <code>(Depreciation and amortization − Free cash flow to firm (FCFF) − Fixed capital investment + Interest expense + Net income − Working capital investment) ÷ Interest expense</code> — the form to use when Depreciation and amortization, Free cash flow to firm (FCFF), Fixed capital investment and Interest expense are the values you have.</li><li><strong>Depreciation and amortization</strong> = <code>Free cash flow to firm (FCFF) + Fixed capital investment + Interest expense × Corporate tax rate − Interest expense − Net income + Working capital investment</code> — the form to use when Free cash flow to firm (FCFF), Fixed capital investment, Interest expense and Corporate tax rate are the values you have.</li><li><strong>Working capital investment</strong> = <code>Depreciation and amortization − Free cash flow to firm (FCFF) − Fixed capital investment − Interest expense × Corporate tax rate + Interest expense + Net income</code> — the form to use when Depreciation and amortization, Free cash flow to firm (FCFF), Fixed capital investment and Interest expense are the values you have.</li><li><strong>Interest expense</strong> = <code>(Depreciation and amortization − Free cash flow to firm (FCFF) − Fixed capital investment + Net income − Working capital investment) ÷ (Corporate tax rate − 1)</code> — the form to use when Depreciation and amortization, Free cash flow to firm (FCFF), Fixed capital investment and Net income are the values you have.</li><li><strong>Fixed capital investment</strong> = <code>Depreciation and amortization − Free cash flow to firm (FCFF) − Interest expense × Corporate tax rate + Interest expense + Net income − Working capital investment</code> — the form to use when Depreciation and amortization, Free cash flow to firm (FCFF), Interest expense and Corporate tax rate are the values you have.</li><li><strong>Free cash flow to firm (FCFF)</strong> = <code>Depreciation and amortization × Corporate tax rate − EBITDA × Corporate tax rate + EBITDA − Fixed capital investment − Working capital investment</code> — the form to use when Depreciation and amortization, Corporate tax rate, EBITDA and Fixed capital investment are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Free cash flow to firm (FCFF), Net income and Corporate tax rate can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Corporate tax rate is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with EBITDA, EBIT and CFO are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Net income left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Net income is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Depreciation and amortization left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Depreciation and amortization is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Net income is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Net income</strong> takes a plain number with no unit attached. The page reads it when it works out Corporate tax rate, Depreciation and amortization and Working capital investment. Have it to hand before you start: Net income is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Depreciation and amortization</strong> takes a plain number with no unit attached. The page reads it when it works out Net income, Corporate tax rate and Working capital investment. Have it to hand before you start: Depreciation and amortization is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Interest expense</strong> takes a plain number with no unit attached. The page reads it when it works out Net income, Corporate tax rate and Depreciation and amortization. Have it to hand before you start: Interest expense is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Corporate tax rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The page reads it when it works out Net income, Depreciation and amortization and Working capital investment. Have it to hand before you start: Corporate tax rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Fixed capital investment</strong> takes a plain number with no unit attached. The page reads it when it works out Net income, Corporate tax rate and Depreciation and amortization. Have it to hand before you start: Fixed capital investment is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Working capital investment</strong> takes a plain number with no unit attached. The page reads it when it works out Net income, Corporate tax rate and Depreciation and amortization. Have it to hand before you start: Working capital investment is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>EBITDA</strong> is a plain number. It is worked out from Depreciation and amortization, Corporate tax rate, Free cash flow to firm (FCFF) and Fixed capital investment. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>EBIT</strong> is a plain number. It is worked out from Depreciation and amortization, Free cash flow to firm (FCFF), Fixed capital investment and Working capital investment. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>CFO</strong> is a plain number. It is worked out from Free cash flow to firm (FCFF), Fixed capital investment, Interest expense and Corporate tax rate. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Free cash flow to firm (FCFF)</strong> is a plain number. It is worked out from Depreciation and amortization, Fixed capital investment, Interest expense and Corporate tax rate. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> EBITDA follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Net income, Depreciation and amortization and Interest expense are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Net income, Depreciation and amortization and Interest expense measured, EBITDA and EBIT wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/net-debt">Net debt Calculator</a>, <a href="/finance/net-effective-rent">Net effective rent Calculator</a> and <a href="/finance/net-income">Net income</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Free cash flow to firm (FCFF) calculator work out?', 'a' => <<<'TXT'
            EBITDA, EBIT, CFO and Free cash flow to firm (FCFF), from Depreciation and amortization, Fixed capital investment, Interest expense and Corporate tax rate. The relationship is Free cash flow to firm (FCFF) = Depreciation and amortization − Fixed capital investment − Interest expense × Corporate tax rate + Interest expense + Net income − Working capital investment.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Net income (USD), Depreciation and amortization (USD), Interest expense (USD), Corporate tax rate (percent), Fixed capital investment (USD). Fill net income, depreciation and amortization and interest expense and leave EBITDA empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Free cash flow to firm (FCFF), Net income, Corporate tax rate and Depreciation and amortization can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of EBITDA is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Net income left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. EBITDA keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/net-debt', 'name' => 'Net debt Calculator'],
            ['path' => '/finance/net-effective-rent', 'name' => 'Net effective rent Calculator'],
            ['path' => '/finance/net-income', 'name' => 'Net income'],
        ],
        'authors' => [],
    ],
];
