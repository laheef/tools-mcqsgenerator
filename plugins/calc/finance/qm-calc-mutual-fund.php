<?php

/**
 * Mutual fund
 * /finance/mutual-fund
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Mutual fund',
    'meta' => ['title' => 'Mutual fund Calculator: Formula, Steps & Examples', 'description' => 'Mutual fund turns investment form and monthly investment into investment amount at maturity. Results come back in USD, with any other unit a click away.', 'h1' => 'Mutual fund Calculator', 'updated' => '2026-09-27'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        Input the amount of your investment (one time, or monthly), the expected return, and the time you commit to it, and find out how much you will earn at withdrawal.
                        TXT],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'select_form',
                            'label' => 'Investment form',
                            'type' => 'select',
                            'options' => ['Systematic Investment Plan (SIP)' => '0', 'One-time investment (lump sum)' => '1'],
                            'dataset' => 'investment',
                            'default' => 'Systematic Investment Plan (SIP)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'monthly_invest1',
                            'label' => 'Monthly investment',
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
                            'name' => 'monthly_invest2',
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
                        [
                            'name' => 'annual_return',
                            'label' => 'Expected annual return',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'period',
                            'label' => 'Investment period',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrsmos',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'invest_amount1',
                            'label' => 'Investment amount at maturity',
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
                            'name' => 'invest_amount2',
                            'label' => 'Investment amount at maturity',
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
            'title' => 'invest_amount1=monthly_invest1*(((1+(annual_return/1200))^(period*12)-1)/(annual_return/1200))*(1+(annual_return/1200))',
            'results' => ['monthly_invest1' => <<<'TXT'
            pow(8916100448256000000000000000000000000, period)*annual_return*invest_amount1/(-pow(1200, 12*period)*annual_return - 1200*pow(1200, 12*period) + annual_return*pow(annual_return + 1200, 12*period) + 1200*pow(annual_return + 1200, 12*period))
            TXT, 'invest_amount1' => <<<'TXT'
            pow(79496847203390844133441536000000000000000000000000000000000000000000000000, -period)*monthly_invest1*(pow(1200, 12*period + 1)*pow(annual_return + 1200, 12*period) - pow(1200, 24*period + 1) - pow(79496847203390844133441536000000000000000000000000000000000000000000000000, period)*annual_return + pow(8916100448256000000000000000000000000, period)*annual_return*pow(annual_return + 1200, 12*period))/annual_return
            TXT],
        ],
        [
            'title' => 'invest_amount2=monthly_invest2*(1+(annual_return/100))^period',
            'results' => ['invest_amount2' => 'monthly_invest2*pow((1/100)*annual_return + 1, period)', 'annual_return' => 'pow(pow(100, period)*invest_amount2/monthly_invest2, 1/period) - 100', 'period' => '-log(monthly_invest2/invest_amount2)/log((1/100)*annual_return + 1)', 'monthly_invest2' => 'pow(100, period)*invest_amount2*pow(annual_return + 100, -period)'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Enter Monthly investment, Expected annual return and Investment period into Mutual fund and the answer comes back as Investment amount and Investment amount at maturity. The arithmetic is the whole method: investment amount is worked out from monthly investment by one formula, applied once. Investment amount comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Mutual fund calculator works', 'html' => <<<'TXT'
            <p>The Mutual fund calculator applies one relationship to 3 numbers and reports Investment amount, Investment amount at maturity and Investment amount at maturity.</p><p>The answers are Investment amount, Investment amount at maturity and Investment amount at maturity; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Monthly investment</strong> — in USD</li><li><strong>Expected annual return</strong> — in %</li><li><strong>Investment period</strong> — in years / months</li></ul><p>What you get back is Investment amount in USD, Investment amount at maturity in USD, Investment amount at maturity in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Investment period lists 9 options and opens on years / months. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Investment amount at maturity</strong> = <code>Investment amount × ((1 ÷ 100) × Expected annual return + 1)^(Investment period)</code></li><li><strong>Expected annual return</strong> = <code>((100)^(Investment period) × Investment amount at maturity ÷ Investment amount)^(1 ÷ Investment period) − 100</code></li><li><strong>Investment period</strong> = <code>− ln(Investment amount ÷ Investment amount at maturity) ÷ ln((1 ÷ 100) × Expected annual return + 1)</code></li><li><strong>Investment amount</strong> = <code>(100)^(Investment period) × Investment amount at maturity × (Expected annual return + 100)^(− Investment period)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Investment amount at maturity</strong> = <code>Investment amount × ((1 ÷ 100) × Expected annual return + 1)^(Investment period)</code> — the form to use when Investment amount, Expected annual return and Investment period are the values you have.</li><li><strong>Expected annual return</strong> = <code>((100)^(Investment period) × Investment amount at maturity ÷ Investment amount)^(1 ÷ Investment period) − 100</code> — the form to use when Investment period, Investment amount at maturity and Investment amount are the values you have.</li><li><strong>Investment period</strong> = <code>− ln(Investment amount ÷ Investment amount at maturity) ÷ ln((1 ÷ 100) × Expected annual return + 1)</code> — the form to use when Investment amount, Investment amount at maturity and Expected annual return are the values you have.</li><li><strong>Investment amount</strong> = <code>(100)^(Investment period) × Investment amount at maturity × (Expected annual return + 100)^(− Investment period)</code> — the form to use when Investment period, Investment amount at maturity and Expected annual return are the values you have.</li></ul><p>Any one of Investment amount at maturity, Monthly investment and Investment amount at maturity can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Investment period carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Investment amount, Investment amount at maturity and Investment amount at maturity are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Monthly investment left as a guess.</strong> Anything typed into Monthly investment is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Expected annual return left as a guess.</strong> Anything typed into Expected annual return is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Monthly investment and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Monthly investment</strong> takes a plain number with no unit attached. It feeds Investment amount at maturity. Have it to hand before you start: Monthly investment is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Expected annual return</strong> is measured in %. It feeds Monthly investment, Investment amount at maturity and Investment amount at maturity. Have it to hand before you start: Expected annual return is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Investment period</strong> is a years / months quantity: the page opens it in yrsmos and converts anything else you pick before the formula runs. It feeds Monthly investment, Investment amount at maturity and Investment amount at maturity. Have it to hand before you start: Investment period is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Investment amount</strong> is a plain number. It is computed from Investment period, Investment amount at maturity and Expected annual return, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Investment amount at maturity</strong> is a plain number. It is computed from Investment period, Monthly investment and Expected annual return, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Investment amount at maturity</strong> is a plain number. It is computed from Investment amount, Expected annual return and Investment period, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>years / months</strong> — opens in <em>yrsmos</em>, and the chip also carries min, hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Monthly investment, Expected annual return and Investment period. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Monthly investment into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Investment amount in USD with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Investment amount is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The unit tables here are years / months and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Monthly investment, Expected annual return and Investment period are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Monthly investment, Expected annual return and Investment period is what you already know and Investment amount and Investment amount at maturity is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/gross-to-net">Gross to net Calculator</a>, <a href="/finance/growing-annuity">Growing annuity Calculator</a> and <a href="/finance/gst">GST</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Mutual fund calculator work out?', 'a' => 'Investment amount, Investment amount at maturity and Investment amount at maturity, from Investment period, Monthly investment and Expected annual return.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Monthly investment (USD), Expected annual return (%), Investment period (years / months). With monthly investment, expected annual return and investment period in place, Investment amount can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Investment amount at maturity, Monthly investment, Investment amount at maturity and Expected annual return blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Investment amount is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Monthly investment left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Investment amount keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/gross-to-net', 'name' => 'Gross to net Calculator'],
            ['path' => '/finance/growing-annuity', 'name' => 'Growing annuity Calculator'],
            ['path' => '/finance/gst', 'name' => 'GST'],
        ],
        'authors' => [],
    ],
];
