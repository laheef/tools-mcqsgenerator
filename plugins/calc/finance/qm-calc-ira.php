<?php

/**
 * IRA
 * /finance/ira
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'IRA',
    'meta' => ['title' => 'IRA Calculator — Free, With Worked Examples', 'description' => 'IRA works out contribution years from current age and retirement age. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'IRA Calculator', 'updated' => '2024-06-11'],
    'sections' => [
        [
            'title' => 'Your details',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'age',
                            'label' => 'Current age',
                            'type' => 'number',
                            'suffix' => 'years',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'retirement_age',
                            'label' => 'Retirement age',
                            'type' => 'number',
                            'suffix' => 'years',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'years_of_withdrawals',
                            'label' => 'Years of withdrawals',
                            'type' => 'number',
                            'suffix' => 'years',
                            'help' => 'Number of years you expect to make withdrawals from the IRA.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'contribution_years',
                            'label' => 'Contribution years',
                            'type' => 'number',
                            'suffix' => 'years',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cotribution_tax_bracket',
                            'label' => 'Tax bracket during contribution',
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
                            'name' => 'retirement_tax_bracket',
                            'label' => 'Tax bracket at retirement',
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
                            'name' => 'annual_contribution',
                            'label' => 'Annual contribution',
                            'type' => 'number',
                            'help' => 'Maximum contribution for Traditional IRA and Roth IRA is $6,000. If you are 50 years or older, you can contribute $7,000.',
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
                            'name' => 'annual_contribution_after_tax',
                            'label' => 'Annual contribution after tax (Roth IRA)',
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
                            'name' => 'return_rate',
                            'label' => 'Annual return rate',
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
            'title' => 'Results for Traditional IRA, SEP IRA, and SIMPLE IRA',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ira_balance',
                            'label' => 'IRA balance',
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
                            'name' => 'ira_annual_withdrawal',
                            'label' => 'IRA annual withdrawal',
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
                            'name' => 'ira_tax_on_withdrawal',
                            'label' => 'Annual withdrawal after tax',
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
                            'name' => 'ira_take_home',
                            'label' => 'Annual take home',
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
                        ['type' => 'note', 'text' => 'It appears the Roth IRA take home offers more benefit. You may want to check out the Roth IRA calculator to find out if you qualify.'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Results for Roth IRA',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'roth_ira_balance',
                            'label' => 'Roth IRA balance',
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
                            'name' => 'roth_ira_annual_take_home',
                            'label' => 'Annual take home',
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
                        ['type' => 'note', 'text' => 'If you are interested in the Roth IRA, use the Roth IRA calculator to determine whether you qualify.'],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'annual_contribution_after_tax = annual_contribution - (annual_contribution * cotribution_tax_bracket)',
            'results' => ['cotribution_tax_bracket' => '(annual_contribution - annual_contribution_after_tax)/annual_contribution', 'annual_contribution' => '-annual_contribution_after_tax/(cotribution_tax_bracket - 1)', 'annual_contribution_after_tax' => 'annual_contribution*(1 - cotribution_tax_bracket)'],
        ],
        [
            'title' => 'contribution_years = retirement_age - age',
            'results' => ['contribution_years' => '-age + retirement_age', 'age' => '-contribution_years + retirement_age', 'retirement_age' => 'age + contribution_years'],
        ],
        [
            'title' => 'ira_balance = annual_contribution * ((((1+return_rate)^contribution_years - 1)/return_rate) * (1 + return_rate))',
            'results' => ['contribution_years' => 'log((annual_contribution*return_rate + annual_contribution + ira_balance*return_rate)/(annual_contribution*(return_rate + 1)))/log(return_rate + 1)', 'ira_balance' => 'annual_contribution*(return_rate*(pow(return_rate + 1, contribution_years) - 1) + pow(return_rate + 1, contribution_years) - 1)/return_rate', 'annual_contribution' => 'ira_balance*return_rate/(return_rate*pow(return_rate + 1, contribution_years) - return_rate + pow(return_rate + 1, contribution_years) - 1)'],
        ],
        [
            'title' => 'roth_ira_balance = annual_contribution_after_tax * ((((1+return_rate)^contribution_years - 1)/return_rate) * (1 + return_rate))',
            'results' => ['contribution_years' => <<<'TXT'
            log((annual_contribution_after_tax*return_rate + annual_contribution_after_tax + return_rate*roth_ira_balance)/(annual_contribution_after_tax*(return_rate + 1)))/log(return_rate + 1)
            TXT, 'roth_ira_balance' => 'annual_contribution_after_tax*(return_rate*(pow(return_rate + 1, contribution_years) - 1) + pow(return_rate + 1, contribution_years) - 1)/return_rate', 'annual_contribution_after_tax' => 'return_rate*roth_ira_balance/(return_rate*pow(return_rate + 1, contribution_years) - return_rate + pow(return_rate + 1, contribution_years) - 1)'],
        ],
        [
            'title' => 'ira_annual_withdrawal = ira_balance * (return_rate / (1 - (1 + return_rate)^(-years_of_withdrawals))) * (1/(1 + return_rate))',
            'results' => ['years_of_withdrawals' => 'log(ira_annual_withdrawal*(return_rate + 1)/(ira_annual_withdrawal*return_rate + ira_annual_withdrawal - ira_balance*return_rate))/log(return_rate + 1)', 'ira_annual_withdrawal' => <<<'TXT'
            ira_balance*return_rate*pow(return_rate + 1, years_of_withdrawals)/(return_rate*pow(return_rate + 1, years_of_withdrawals) - return_rate + pow(return_rate + 1, years_of_withdrawals) - 1)
            TXT, 'ira_balance' => <<<'TXT'
            ira_annual_withdrawal - ira_annual_withdrawal*pow(return_rate + 1, -years_of_withdrawals) + ira_annual_withdrawal/return_rate - ira_annual_withdrawal*pow(return_rate + 1, -years_of_withdrawals)/return_rate
            TXT],
        ],
        [
            'title' => 'ira_tax_on_withdrawal = ira_annual_withdrawal * retirement_tax_bracket',
            'results' => ['ira_tax_on_withdrawal' => 'ira_annual_withdrawal*retirement_tax_bracket', 'ira_annual_withdrawal' => 'ira_tax_on_withdrawal/retirement_tax_bracket', 'retirement_tax_bracket' => 'ira_tax_on_withdrawal/ira_annual_withdrawal'],
        ],
        [
            'title' => 'ira_take_home = ira_annual_withdrawal - ira_tax_on_withdrawal',
            'results' => ['ira_tax_on_withdrawal' => 'ira_annual_withdrawal - ira_take_home', 'ira_annual_withdrawal' => 'ira_take_home + ira_tax_on_withdrawal', 'ira_take_home' => 'ira_annual_withdrawal - ira_tax_on_withdrawal'],
        ],
        [
            'title' => 'roth_ira_annual_take_home =  roth_ira_balance * (return_rate / (1 - (1 + return_rate)^(-years_of_withdrawals))) * (1/(1 + return_rate))',
            'results' => ['years_of_withdrawals' => <<<'TXT'
            log(roth_ira_annual_take_home*(return_rate + 1)/(return_rate*roth_ira_annual_take_home - return_rate*roth_ira_balance + roth_ira_annual_take_home))/log(return_rate + 1)
            TXT, 'roth_ira_annual_take_home' => <<<'TXT'
            return_rate*roth_ira_balance*pow(return_rate + 1, years_of_withdrawals)/(return_rate*pow(return_rate + 1, years_of_withdrawals) - return_rate + pow(return_rate + 1, years_of_withdrawals) - 1)
            TXT, 'roth_ira_balance' => <<<'TXT'
            roth_ira_annual_take_home - roth_ira_annual_take_home*pow(return_rate + 1, -years_of_withdrawals) + roth_ira_annual_take_home/return_rate - roth_ira_annual_take_home*pow(return_rate + 1, -years_of_withdrawals)/return_rate
            TXT],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Enter Tax bracket during contribution and Annual contribution into IRA and the answer comes back as Current age and Retirement age. Nothing is looked up on this page: current age is computed from tax bracket during contribution and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Current age is opened in years; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the IRA calculator works', 'html' => <<<'TXT'
            <p>IRA answers one question from 2 numbers, and the answer is Current age, Retirement age and Years of withdrawals.</p><p>The relationship it solves reads Annual contribution after tax (Roth IRA) = Annual contribution × (1 − Tax bracket during contribution).</p><p>The result panel carries Current age, Retirement age, Years of withdrawals and Contribution years, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Tax bracket during contribution</strong> — in percent</li><li><strong>Annual contribution</strong> — in USD. Maximum contribution for Traditional IRA and Roth IRA is $6,000. If you are 50 years or older, you can contribute $7,000.</li></ul><p>The result boxes are Current age in years, Retirement age in years, Years of withdrawals in years, Contribution years in years, Tax bracket at retirement in percent, Annual contribution after tax (Roth IRA) in USD, IRA balance in USD, IRA annual withdrawal in USD, Annual withdrawal after tax in USD, Annual take home in USD, Roth IRA balance in USD, Annual take home in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Tax bracket at retirement lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Annual contribution after tax (Roth IRA)</strong> = <code>Annual contribution × (1 − Tax bracket during contribution)</code></li><li><strong>Tax bracket during contribution</strong> = <code>(Annual contribution − Annual contribution after tax (Roth IRA)) ÷ Annual contribution</code></li><li><strong>Annual contribution</strong> = <code>− Annual contribution after tax (Roth IRA) ÷ (Tax bracket during contribution − 1)</code></li><li><strong>Contribution years</strong> = <code>− Current age + Retirement age</code></li><li><strong>Current age</strong> = <code>− Contribution years + Retirement age</code></li><li><strong>Retirement age</strong> = <code>Current age + Contribution years</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Annual contribution after tax (Roth IRA)</strong> = <code>Annual contribution × (1 − Tax bracket during contribution)</code> — the form to use when Annual contribution and Tax bracket during contribution are the values you have.</li><li><strong>Tax bracket during contribution</strong> = <code>(Annual contribution − Annual contribution after tax (Roth IRA)) ÷ Annual contribution</code> — the form to use when Annual contribution and Annual contribution after tax (Roth IRA) are the values you have.</li><li><strong>Annual contribution</strong> = <code>− Annual contribution after tax (Roth IRA) ÷ (Tax bracket during contribution − 1)</code> — the form to use when Annual contribution after tax (Roth IRA) and Tax bracket during contribution are the values you have.</li><li><strong>Contribution years</strong> = <code>− Current age + Retirement age</code> — the form to use when Current age and Retirement age are the values you have.</li><li><strong>Current age</strong> = <code>− Contribution years + Retirement age</code> — the form to use when Contribution years and Retirement age are the values you have.</li><li><strong>Retirement age</strong> = <code>Current age + Contribution years</code> — the form to use when Current age and Contribution years are the values you have.</li><li><strong>IRA balance</strong> = <code>Annual contribution × (Annual return rate × ((Annual return rate + 1)^(Contribution years) − 1) + (Annual return rate + 1)^(Contribution years) − 1) ÷ Annual return rate</code> — the form to use when Annual contribution, Annual return rate and Contribution years are the values you have.</li><li><strong>Contribution years</strong> = <code>ln((Annual contribution × Annual return rate + Annual contribution + IRA balance × Annual return rate) ÷ (Annual contribution × (Annual return rate + 1))) ÷ ln(Annual return rate + 1)</code> — the form to use when Annual contribution, Annual return rate and IRA balance are the values you have.</li></ul><p>Any one of Annual contribution after tax (Roth IRA), Tax bracket during contribution and Annual contribution can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Tax bracket during contribution carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Current age, Retirement age and Years of withdrawals are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Tax bracket during contribution left as a guess.</strong> Anything typed into Tax bracket during contribution is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Annual contribution left as a guess.</strong> Anything typed into Annual contribution is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Tax bracket during contribution is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Tax bracket during contribution</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Annual contribution and Annual contribution after tax (Roth IRA). Have it to hand before you start: Tax bracket during contribution is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Annual contribution</strong> takes a plain number with no unit attached. Maximum contribution for Traditional IRA and Roth IRA is $6,000. If you are 50 years or older, you can contribute $7,000. It feeds Tax bracket during contribution, Annual contribution after tax (Roth IRA) and Contribution years. Have it to hand before you start: Annual contribution is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Tax bracket during contribution and Annual contribution. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Tax bracket during contribution into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Current age in years with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Current age is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Tax bracket during contribution and Annual contribution and the number you are missing is Current age and Retirement age.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/income-elasticity-demand">Income elasticity of demand Calculator</a>, <a href="/finance/income-tax-pakistan">Income tax - Pakistan</a> and <a href="/finance/income-tax-australia">Income tax Australia Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the IRA calculator work out?', 'a' => <<<'TXT'
            Current age, Retirement age, Years of withdrawals and Contribution years, from Annual contribution and Tax bracket during contribution. The relationship is Annual contribution after tax (Roth IRA) = Annual contribution × (1 − Tax bracket during contribution).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Tax bracket during contribution (percent), Annual contribution (USD). With tax bracket during contribution and annual contribution in place, Current age can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Annual contribution after tax (Roth IRA), Tax bracket during contribution, Annual contribution and Contribution years blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Current age is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Tax bracket during contribution left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Current age keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/income-elasticity-demand', 'name' => 'Income elasticity of demand Calculator'],
            ['path' => '/finance/income-tax-pakistan', 'name' => 'Income tax - Pakistan'],
            ['path' => '/finance/income-tax-australia', 'name' => 'Income tax Australia Calculator'],
        ],
        'authors' => [],
    ],
];
