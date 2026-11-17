<?php

/**
 * Money market account
 * /finance/money-market-account
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Money market account',
    'meta' => ['title' => 'Money market account: Formula, Steps & Results', 'description' => 'Enter investment form, starting balance and recurring investment and Money market account returns total deposit and total interest. Every figure is computed.', 'h1' => 'Money market account Calculator', 'updated' => '2026-09-27'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'select_form',
                            'label' => 'Investment form',
                            'type' => 'select',
                            'options' => ['Systematic Investment Plan' => '0', 'One-time investment' => '1'],
                            'dataset' => 'Investment forms',
                            'default' => 'Systematic Investment Plan',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'starting_balance',
                            'label' => 'Starting balance',
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
                            'name' => 'recurring_investment',
                            'label' => 'Recurring investment',
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
                            'name' => 'investment_amount',
                            'label' => 'Investment amount',
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
                        ['type' => 'note', 'text' => 'No values can be negative; otherwise, you will lose money!'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'expected_annual_return',
                            'label' => 'Expected annual return',
                            'type' => 'number',
                            'help' => 'Assuming monthly interest compounding',
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
                            'name' => 'n',
                            'label' => 'Investment period',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrsmos',
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
                            'name' => 'totalDeposit',
                            'label' => 'Total deposit',
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
                            'name' => 'totalInterest',
                            'label' => 'Total interest',
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
                            'name' => 'FV',
                            'label' => 'Future value of money market account',
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
                            'name' => 'FV2',
                            'label' => 'Future value of money market account',
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
                        ['type' => 'note', 'text' => 'No values can be negative; otherwise, you will lose money!'],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => <<<'TXT'
            FV=recurring_investment*(((1+(expected_annual_return/12))^(n*12)-1)/(expected_annual_return/12))*(1+(expected_annual_return/12)) + (starting_balance * ((1+expected_annual_return/12)^(n*12)))
            TXT,
            'results' => ['recurring_investment' => <<<'TXT'
            expected_annual_return*(-pow(8916100448256, n)*FV + starting_balance*pow(expected_annual_return + 12, 12*n))/(pow(12, 12*n)*expected_annual_return + 12*pow(12, 12*n) - expected_annual_return*pow(expected_annual_return + 12, 12*n) - 12*pow(expected_annual_return + 12, 12*n))
            TXT, 'n' => <<<'TXT'
            -log((expected_annual_return*recurring_investment + expected_annual_return*starting_balance + 12*recurring_investment)/(FV*expected_annual_return + expected_annual_return*recurring_investment + 12*recurring_investment))/(12*log(expected_annual_return + 12) - log(8916100448256))
            TXT, 'FV' => <<<'TXT'
            pow(79496847203390844133441536, -n)*(pow(12, 12*n + 1)*recurring_investment*pow(expected_annual_return + 12, 12*n) - pow(12, 24*n + 1)*recurring_investment - pow(79496847203390844133441536, n)*expected_annual_return*recurring_investment + pow(8916100448256, n)*expected_annual_return*pow(expected_annual_return + 12, 12*n)*(recurring_investment + starting_balance))/expected_annual_return
            TXT, 'starting_balance' => <<<'TXT'
            pow(expected_annual_return + 12, -12*n)*(pow(12, 12*n + 1)*recurring_investment + pow(8916100448256, n)*expected_annual_return*(FV + recurring_investment) - expected_annual_return*recurring_investment*pow(expected_annual_return + 12, 12*n) - 12*recurring_investment*pow(expected_annual_return + 12, 12*n))/expected_annual_return
            TXT],
        ],
        [
            'title' => 'FV2=investment_amount*((1+expected_annual_return)^n)',
            'results' => ['expected_annual_return' => 'pow(FV2/investment_amount, 1/n) - 1', 'n' => 'log(FV2/investment_amount)/log(expected_annual_return + 1)', 'FV2' => 'investment_amount*pow(expected_annual_return + 1, n)', 'investment_amount' => 'FV2*pow(expected_annual_return + 1, -n)'],
        ],
        [
            'title' => 'totalDeposit = starting_balance + recurring_investment * n*12',
            'results' => ['n' => '(1/12)*(-starting_balance + totalDeposit)/recurring_investment', 'totalDeposit' => '12*n*recurring_investment + starting_balance', 'recurring_investment' => '(1/12)*(-starting_balance + totalDeposit)/n', 'starting_balance' => '-12*n*recurring_investment + totalDeposit'],
        ],
        [
            'title' => 'totalInterest = FV - totalDeposit',
            'results' => ['totalInterest' => 'FV - totalDeposit', 'totalDeposit' => 'FV - totalInterest', 'FV' => 'totalDeposit + totalInterest'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Enter Starting balance, Recurring investment and Expected annual return into Money market account and the answer comes back as Investment amount and Total deposit. It is a single relationship that reads investment amount out of starting balance, not a table of canned results keyed by them. Units for Investment amount default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Money market account calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Money market account: it takes 4 numbers and reports Investment amount, Total deposit and Total interest.</p><p>What comes back is Investment amount, Total deposit, Total interest and Future value of money market account — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Starting balance</strong> — in USD</li><li><strong>Recurring investment</strong> — in USD</li><li><strong>Expected annual return</strong> — in percent. Assuming monthly interest compounding</li><li><strong>Investment period</strong> — in years / months</li></ul><p>The answers come back as Investment amount in USD, Total deposit in USD, Total interest in USD, Future value of money market account in USD, Future value of money market account in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Expected annual return lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Future value of money market account</strong> = <code>Investment amount × (Expected annual return + 1)^(Investment period)</code></li><li><strong>Expected annual return</strong> = <code>(Future value of money market account ÷ Investment amount)^(1 ÷ Investment period) − 1</code></li><li><strong>Investment period</strong> = <code>ln(Future value of money market account ÷ Investment amount) ÷ ln(Expected annual return + 1)</code></li><li><strong>Investment amount</strong> = <code>Future value of money market account × (Expected annual return + 1)^(− Investment period)</code></li><li><strong>Total deposit</strong> = <code>12 × Investment period × Recurring investment + Starting balance</code></li><li><strong>Recurring investment</strong> = <code>(1 ÷ 12) × ( − Starting balance + Total deposit) ÷ Investment period</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Future value of money market account</strong> = <code>Investment amount × (Expected annual return + 1)^(Investment period)</code> — the form to use when Investment amount, Expected annual return and Investment period are the values you have.</li><li><strong>Expected annual return</strong> = <code>(Future value of money market account ÷ Investment amount)^(1 ÷ Investment period) − 1</code> — the form to use when Future value of money market account, Investment amount and Investment period are the values you have.</li><li><strong>Investment period</strong> = <code>ln(Future value of money market account ÷ Investment amount) ÷ ln(Expected annual return + 1)</code> — the form to use when Future value of money market account, Investment amount and Expected annual return are the values you have.</li><li><strong>Investment amount</strong> = <code>Future value of money market account × (Expected annual return + 1)^(− Investment period)</code> — the form to use when Future value of money market account, Expected annual return and Investment period are the values you have.</li><li><strong>Total deposit</strong> = <code>12 × Investment period × Recurring investment + Starting balance</code> — the form to use when Investment period, Recurring investment and Starting balance are the values you have.</li><li><strong>Investment period</strong> = <code>(1 ÷ 12) × ( − Starting balance + Total deposit) ÷ Recurring investment</code> — the form to use when Starting balance, Total deposit and Recurring investment are the values you have.</li><li><strong>Recurring investment</strong> = <code>(1 ÷ 12) × ( − Starting balance + Total deposit) ÷ Investment period</code> — the form to use when Starting balance, Total deposit and Investment period are the values you have.</li><li><strong>Starting balance</strong> = <code>− 12 × Investment period × Recurring investment + Total deposit</code> — the form to use when Investment period, Recurring investment and Total deposit are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Future value of money market account, Recurring investment and Investment period can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Expected annual return and Investment period carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Investment amount, Total deposit and Total interest are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Starting balance left as a guess.</strong> Anything typed into Starting balance is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Recurring investment left as a guess.</strong> Anything typed into Recurring investment is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Starting balance to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Starting balance</strong> takes a plain number with no unit attached. It feeds Recurring investment, Investment period and Future value of money market account. Have it to hand before you start: Starting balance is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Recurring investment</strong> takes a plain number with no unit attached. It feeds Investment period, Future value of money market account and Starting balance. Have it to hand before you start: Recurring investment is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Expected annual return</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Assuming monthly interest compounding. It feeds Recurring investment, Investment period and Future value of money market account. Have it to hand before you start: Expected annual return is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Investment period</strong> is a years / months quantity: the page opens it in yrsmos and converts anything else you pick before the formula runs. It feeds Recurring investment, Future value of money market account and Starting balance. Have it to hand before you start: Investment period is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Investment amount</strong> is a plain number. The value follows from Future value of money market account, Expected annual return and Investment period. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Total deposit</strong> is a plain number. The value follows from Investment period, Recurring investment and Starting balance. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Total interest</strong> is a plain number. The value follows from Future value of money market account and Total deposit. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Future value of money market account</strong> is a plain number. The value follows from Investment period, Recurring investment, Expected annual return and Starting balance. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Future value of money market account</strong> is a plain number. The value follows from Investment amount, Expected annual return and Investment period. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>years / months</strong> — opens in <em>yrsmos</em>, and the chip also carries min, hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Investment amount is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and years / months and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Starting balance, Recurring investment and Expected annual return are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Starting balance, Recurring investment and Expected annual return measured, Investment amount and Total deposit wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/hra-exemption">HRA exemption Calculator</a>, <a href="/finance/illinois-overtime">Illinois overtime Calculator</a> and <a href="/finance/illinois-tax">Illinois tax Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Money market account calculator work out?', 'a' => <<<'TXT'
            Investment amount, Total deposit, Total interest and Future value of money market account, from Investment period, Recurring investment, Expected annual return and Starting balance.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Starting balance (USD), Recurring investment (USD), Expected annual return (percent), Investment period (years / months). With starting balance, recurring investment and expected annual return in place, Investment amount can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Future value of money market account, Recurring investment, Investment period and Starting balance can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Investment amount is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Starting balance left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Investment amount at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/hra-exemption', 'name' => 'HRA exemption Calculator'],
            ['path' => '/finance/illinois-overtime', 'name' => 'Illinois overtime Calculator'],
            ['path' => '/finance/illinois-tax', 'name' => 'Illinois tax Calculator'],
        ],
        'authors' => [],
    ],
];
