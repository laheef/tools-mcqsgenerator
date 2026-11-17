<?php

/**
 * Free cash flow to equity (FCFE)
 * /finance/free-cash-flow-to-equity
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Free cash flow to equity (FCFE)',
    'meta' => ['title' => 'Free cash flow to equity (FCFE) — Formula & Results', 'description' => 'Free cash flow to equity (FCFE) takes calculate using, EBITDA and FCFF and returns net income and EBIT. The formula is printed in the form\'s own words.', 'h1' => 'Free cash flow to equity (FCFE) Calculator', 'updated' => '2026-09-15'],
    'sections' => [
        [
            'title' => 'Calculation method',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sources',
                            'label' => 'Calculate using',
                            'type' => 'select',
                            'options' => [
                                'Net income' => '0',
                                'Earnings before interest, taxes, depreciation, and amortization (EBITDA)' => '1',
                                'Earnings before interest and taxes (EBIT)' => '2',
                                'Cash flow from operation (CFO)' => '3',
                                'Free cash flow to firm (FCFF)' => '4',
                            ],
                            'dataset' => 'sources',
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
                            'help' => 'Earnings before interest, taxes, depreciation, and amortization.',
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
                            'help' => 'Earnings before interests and taxes.',
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
                            'label' => 'Cash flow from operation (CFO)',
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
                            'name' => 'fcff',
                            'label' => 'FCFF',
                            'type' => 'number',
                            'help' => 'Free cash flow to firm',
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
            'title' => 'Net borrowing',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'begin_debt',
                            'label' => 'Beginning total debt',
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
                            'name' => 'end_debt',
                            'label' => 'Ending total debt',
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
                            'name' => 'net_borrowing',
                            'label' => 'Net borrowing',
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
            ],
        ],
        [
            'title' => 'Result',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fcfe',
                            'label' => 'Free cash flow to equity (FCFE)',
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
            'title' => 'fcfe = fcff - interest_expense * (1 - tax_rate) + net_borrowing',
            'results' => [
                'tax_rate' => '(fcfe - fcff + interest_expense - net_borrowing)/interest_expense',
                'fcfe' => 'fcff + interest_expense*tax_rate - interest_expense + net_borrowing',
                'interest_expense' => '(fcfe - fcff - net_borrowing)/(tax_rate - 1)',
                'net_borrowing' => 'fcfe - fcff - interest_expense*tax_rate + interest_expense',
                'fcff' => 'fcfe - interest_expense*tax_rate + interest_expense - net_borrowing',
            ],
        ],
        [
            'title' => 'fcfe = net_income + depreciation_amortization - fixed_capital_investment - working_capital_investment + net_borrowing',
            'results' => [
                'fixed_capital_investment' => 'depreciation_amortization - fcfe + net_borrowing + net_income - working_capital_investment',
                'fcfe' => 'depreciation_amortization - fixed_capital_investment + net_borrowing + net_income - working_capital_investment',
                'working_capital_investment' => 'depreciation_amortization - fcfe - fixed_capital_investment + net_borrowing + net_income',
                'net_borrowing' => '-depreciation_amortization + fcfe + fixed_capital_investment - net_income + working_capital_investment',
                'net_income' => '-depreciation_amortization + fcfe + fixed_capital_investment - net_borrowing + working_capital_investment',
                'depreciation_amortization' => 'fcfe + fixed_capital_investment - net_borrowing - net_income + working_capital_investment',
            ],
        ],
        [
            'title' => <<<'TXT'
            fcfe = ebitda * (1 - tax_rate) + depreciation_amortization * tax_rate - fixed_capital_investment - working_capital_investment + net_borrowing - interest_expense * (1 - tax_rate)
            TXT,
            'results' => [
                'fixed_capital_investment' => 'depreciation_amortization*tax_rate - ebitda*tax_rate + ebitda - fcfe + interest_expense*tax_rate - interest_expense + net_borrowing - working_capital_investment',
                'tax_rate' => <<<'TXT'
                (-ebitda + fcfe + fixed_capital_investment + interest_expense - net_borrowing + working_capital_investment)/(depreciation_amortization - ebitda + interest_expense)
                TXT,
                'fcfe' => <<<'TXT'
                depreciation_amortization*tax_rate - ebitda*tax_rate + ebitda - fixed_capital_investment + interest_expense*tax_rate - interest_expense + net_borrowing - working_capital_investment
                TXT,
                'working_capital_investment' => 'depreciation_amortization*tax_rate - ebitda*tax_rate + ebitda - fcfe - fixed_capital_investment + interest_expense*tax_rate - interest_expense + net_borrowing',
                'ebitda' => <<<'TXT'
                (depreciation_amortization*tax_rate - fcfe - fixed_capital_investment + interest_expense*tax_rate - interest_expense + net_borrowing - working_capital_investment)/(tax_rate - 1)
                TXT,
                'interest_expense' => '(-depreciation_amortization*tax_rate + ebitda*tax_rate - ebitda + fcfe + fixed_capital_investment - net_borrowing + working_capital_investment)/(tax_rate - 1)',
                'net_borrowing' => <<<'TXT'
                -depreciation_amortization*tax_rate + ebitda*tax_rate - ebitda + fcfe + fixed_capital_investment - interest_expense*tax_rate + interest_expense + working_capital_investment
                TXT,
                'depreciation_amortization' => '(-ebitda + fcfe + fixed_capital_investment + interest_expense - net_borrowing + tax_rate*(ebitda - interest_expense) + working_capital_investment)/tax_rate',
            ],
        ],
        [
            'title' => <<<'TXT'
            fcfe = ebit * (1 - tax_rate) + depreciation_amortization - fixed_capital_investment - working_capital_investment + net_borrowing - interest_expense * (1 - tax_rate)
            TXT,
            'results' => [
                'fixed_capital_investment' => 'depreciation_amortization - ebit*tax_rate + ebit - fcfe + interest_expense*tax_rate - interest_expense + net_borrowing - working_capital_investment',
                'tax_rate' => '(depreciation_amortization + ebit - fcfe - fixed_capital_investment - interest_expense + net_borrowing - working_capital_investment)/(ebit - interest_expense)',
                'fcfe' => <<<'TXT'
                depreciation_amortization - ebit*tax_rate + ebit - fixed_capital_investment + interest_expense*tax_rate - interest_expense + net_borrowing - working_capital_investment
                TXT,
                'working_capital_investment' => 'depreciation_amortization - ebit*tax_rate + ebit - fcfe - fixed_capital_investment + interest_expense*tax_rate - interest_expense + net_borrowing',
                'interest_expense' => '(-depreciation_amortization + ebit*tax_rate - ebit + fcfe + fixed_capital_investment - net_borrowing + working_capital_investment)/(tax_rate - 1)',
                'net_borrowing' => '-depreciation_amortization + ebit*tax_rate - ebit + fcfe + fixed_capital_investment - interest_expense*tax_rate + interest_expense + working_capital_investment',
                'ebit' => <<<'TXT'
                (depreciation_amortization - fcfe - fixed_capital_investment + interest_expense*tax_rate - interest_expense + net_borrowing - working_capital_investment)/(tax_rate - 1)
                TXT,
                'depreciation_amortization' => 'ebit*tax_rate - ebit + fcfe + fixed_capital_investment - interest_expense*tax_rate + interest_expense - net_borrowing + working_capital_investment',
            ],
        ],
        [
            'title' => 'fcfe = cfo - fixed_capital_investment + net_borrowing',
            'results' => ['fixed_capital_investment' => 'cfo - fcfe + net_borrowing', 'net_borrowing' => '-cfo + fcfe + fixed_capital_investment', 'cfo' => 'fcfe + fixed_capital_investment - net_borrowing', 'fcfe' => 'cfo - fixed_capital_investment + net_borrowing'],
        ],
        [
            'title' => 'net_income = (ebitda - depreciation_amortization - interest_expense) * (1 - tax_rate)',
            'results' => [
                'tax_rate' => '(depreciation_amortization - ebitda + interest_expense + net_income)/(depreciation_amortization - ebitda + interest_expense)',
                'ebitda' => '(depreciation_amortization*tax_rate - depreciation_amortization + interest_expense*tax_rate - interest_expense - net_income)/(tax_rate - 1)',
                'interest_expense' => '(-depreciation_amortization*tax_rate + depreciation_amortization + ebitda*tax_rate - ebitda + net_income)/(tax_rate - 1)',
                'net_income' => 'depreciation_amortization*tax_rate - depreciation_amortization - ebitda*tax_rate + ebitda + interest_expense*tax_rate - interest_expense',
                'depreciation_amortization' => '(ebitda*tax_rate - ebitda - interest_expense*tax_rate + interest_expense + net_income)/(tax_rate - 1)',
            ],
        ],
        [
            'title' => 'ebit = ebitda - depreciation_amortization',
            'results' => ['ebitda' => 'depreciation_amortization + ebit', 'ebit' => '-depreciation_amortization + ebitda', 'depreciation_amortization' => '-ebit + ebitda'],
        ],
        [
            'title' => 'cfo = net_income + depreciation_amortization - working_capital_investment',
            'results' => ['net_income' => 'cfo - depreciation_amortization + working_capital_investment', 'working_capital_investment' => '-cfo + depreciation_amortization + net_income', 'cfo' => 'depreciation_amortization + net_income - working_capital_investment', 'depreciation_amortization' => 'cfo - net_income + working_capital_investment'],
        ],
        [
            'title' => 'net_borrowing = end_debt - begin_debt',
            'results' => ['net_borrowing' => '-begin_debt + end_debt', 'begin_debt' => 'end_debt - net_borrowing', 'end_debt' => 'begin_debt + net_borrowing'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Enter FCFF, Net borrowing and Interest expense into Free cash flow to equity (FCFE) and the answer comes back as Net income and EBITDA. It is a single relationship that reads net income out of FCFF, not a table of canned results keyed by them. Units for Net income default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Free cash flow to equity (FCFE) calculator works', 'html' => <<<'TXT'
            <p>The Free cash flow to equity (FCFE) calculator applies one relationship to 4 numbers and reports Net income, EBITDA and EBIT.</p><p>The relationship it solves reads Free cash flow to equity (FCFE) = FCFF + Interest expense × Corporate tax rate − Interest expense + Net borrowing.</p><p>What comes back is Net income, EBITDA, EBIT and Cash flow from operation (CFO) — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>FCFF</strong> — in USD. Free cash flow to firm</li><li><strong>Net borrowing</strong> — in USD</li><li><strong>Interest expense</strong> — in USD</li><li><strong>Corporate tax rate</strong> — in percent</li></ul><p>The result boxes are Net income in USD, EBITDA in USD, EBIT in USD, Cash flow from operation (CFO) in USD, Beginning total debt in USD, Ending total debt in USD, Depreciation and amortization in USD, Fixed capital investment in USD, Working capital investment in USD, Free cash flow to equity (FCFE) in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Corporate tax rate lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Free cash flow to equity (FCFE)</strong> = <code>FCFF + Interest expense × Corporate tax rate − Interest expense + Net borrowing</code></li><li><strong>Corporate tax rate</strong> = <code>(Free cash flow to equity (FCFE) − FCFF + Interest expense − Net borrowing) ÷ Interest expense</code></li><li><strong>Interest expense</strong> = <code>(Free cash flow to equity (FCFE) − FCFF − Net borrowing) ÷ (Corporate tax rate − 1)</code></li><li><strong>Net borrowing</strong> = <code>Free cash flow to equity (FCFE) − FCFF − Interest expense × Corporate tax rate + Interest expense</code></li><li><strong>FCFF</strong> = <code>Free cash flow to equity (FCFE) − Interest expense × Corporate tax rate + Interest expense − Net borrowing</code></li><li><strong>Fixed capital investment</strong> = <code>Depreciation and amortization − Free cash flow to equity (FCFE) + Net borrowing + Net income − Working capital investment</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Free cash flow to equity (FCFE)</strong> = <code>FCFF + Interest expense × Corporate tax rate − Interest expense + Net borrowing</code> — the form to use when FCFF, Interest expense, Corporate tax rate and Net borrowing are the values you have.</li><li><strong>Corporate tax rate</strong> = <code>(Free cash flow to equity (FCFE) − FCFF + Interest expense − Net borrowing) ÷ Interest expense</code> — the form to use when Free cash flow to equity (FCFE), FCFF, Interest expense and Net borrowing are the values you have.</li><li><strong>Interest expense</strong> = <code>(Free cash flow to equity (FCFE) − FCFF − Net borrowing) ÷ (Corporate tax rate − 1)</code> — the form to use when Free cash flow to equity (FCFE), FCFF, Net borrowing and Corporate tax rate are the values you have.</li><li><strong>Net borrowing</strong> = <code>Free cash flow to equity (FCFE) − FCFF − Interest expense × Corporate tax rate + Interest expense</code> — the form to use when Free cash flow to equity (FCFE), FCFF, Interest expense and Corporate tax rate are the values you have.</li><li><strong>FCFF</strong> = <code>Free cash flow to equity (FCFE) − Interest expense × Corporate tax rate + Interest expense − Net borrowing</code> — the form to use when Free cash flow to equity (FCFE), Interest expense, Corporate tax rate and Net borrowing are the values you have.</li><li><strong>Free cash flow to equity (FCFE)</strong> = <code>Depreciation and amortization − Fixed capital investment + Net borrowing + Net income − Working capital investment</code> — the form to use when Depreciation and amortization, Fixed capital investment, Net borrowing and Net income are the values you have.</li><li><strong>Fixed capital investment</strong> = <code>Depreciation and amortization − Free cash flow to equity (FCFE) + Net borrowing + Net income − Working capital investment</code> — the form to use when Depreciation and amortization, Free cash flow to equity (FCFE), Net borrowing and Net income are the values you have.</li><li><strong>Working capital investment</strong> = <code>Depreciation and amortization − Free cash flow to equity (FCFE) − Fixed capital investment + Net borrowing + Net income</code> — the form to use when Depreciation and amortization, Free cash flow to equity (FCFE), Fixed capital investment and Net borrowing are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Free cash flow to equity (FCFE), Corporate tax rate and Interest expense can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Corporate tax rate carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Net income, EBITDA and EBIT are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>FCFF left as a guess.</strong> Anything typed into FCFF is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Net borrowing left as a guess.</strong> Anything typed into Net borrowing is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert FCFF to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>FCFF</strong> takes a plain number with no unit attached. Free cash flow to firm. Change it and Corporate tax rate, Free cash flow to equity (FCFE) and Interest expense changes with it. Have it to hand before you start: FCFF is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Net borrowing</strong> takes a plain number with no unit attached. Change it and Corporate tax rate, Free cash flow to equity (FCFE) and Interest expense changes with it. Have it to hand before you start: Net borrowing is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Interest expense</strong> takes a plain number with no unit attached. Change it and Corporate tax rate, Free cash flow to equity (FCFE) and Net borrowing changes with it. Have it to hand before you start: Interest expense is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Corporate tax rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Change it and Free cash flow to equity (FCFE), Interest expense and Net borrowing changes with it. Have it to hand before you start: Corporate tax rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need FCFF, Net borrowing, Interest expense and Corporate tax rate. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type FCFF into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Net income in USD with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Net income is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are FCFF, Net borrowing and Interest expense and the number you are missing is Net income and EBITDA.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/rv-loan">RV loan Calculator</a>, <a href="/finance/saas-ltv">SaaS lifetime value Calculator</a> and <a href="/finance/sabbatical">Sabbatical Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Free cash flow to equity (FCFE) calculator work out?', 'a' => <<<'TXT'
            Net income, EBITDA, EBIT and Cash flow from operation (CFO), from FCFF, Interest expense, Corporate tax rate and Net borrowing. The relationship is Free cash flow to equity (FCFE) = FCFF + Interest expense × Corporate tax rate − Interest expense + Net borrowing.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            FCFF (USD), Net borrowing (USD), Interest expense (USD), Corporate tax rate (percent). With FCFF, net borrowing and interest expense in place, Net income can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Free cash flow to equity (FCFE), Corporate tax rate, Interest expense and Net borrowing can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Net income is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'A blank box is the question. With FCFF left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Net income keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/rv-loan', 'name' => 'RV loan Calculator'],
            ['path' => '/finance/saas-ltv', 'name' => 'SaaS lifetime value Calculator'],
            ['path' => '/finance/sabbatical', 'name' => 'Sabbatical Calculator'],
        ],
        'authors' => [],
    ],
];
