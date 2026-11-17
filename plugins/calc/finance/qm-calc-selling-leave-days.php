<?php

/**
 * Selling leave days
 * /finance/selling-leave-days
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Selling leave days',
    'meta' => ['title' => 'Selling leave days: Formula, Steps & Results', 'description' => 'Selling leave days works out amount you can earn from how is your salary paid? and base pay per month. The formula is printed in the form\'s own words.', 'h1' => 'Selling leave days Calculator', 'updated' => '2026-08-17'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Enter your base pay as well as your desired number of leave days to sell to find out how much you can earn by selling your leave!&nbsp;'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'option',
                            'label' => 'How is your salary paid?',
                            'type' => 'select',
                            'options' => ['Annual' => '1', 'Monthly' => '2', 'Weekly' => '3', 'Hourly' => '4'],
                            'dataset' => 'payment_frequency',
                            'default' => 'Monthly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'base_pay',
                            'label' => 'Base pay per month',
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
                            'name' => 'days',
                            'label' => 'Leave days to sell',
                            'type' => 'number',
                            'suffix' => 'days',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'selling_leave',
                            'label' => 'Amount you can earn',
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
                            'name' => 'base_pay_annual',
                            'label' => 'Base pay per year',
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
                            'name' => 'working_days',
                            'label' => 'Working days per year',
                            'type' => 'number',
                            'suffix' => 'days',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '260',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'days_annual',
                            'label' => 'Leave days to sell',
                            'type' => 'number',
                            'suffix' => 'days',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'selling_leave_annual',
                            'label' => 'Amount you can earn',
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
                            'name' => 'base_pay_weekly',
                            'label' => 'Base pay per week',
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
                            'name' => 'working_days_week',
                            'label' => 'Working days per week',
                            'type' => 'number',
                            'suffix' => 'days',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'days_weekly',
                            'label' => 'Leave days to sell',
                            'type' => 'number',
                            'suffix' => 'days',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'selling_leave_weekly',
                            'label' => 'Amount you can earn',
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
                            'name' => 'base_pay_hourly',
                            'label' => 'Base pay per hour',
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
                            'name' => 'hours',
                            'label' => 'Working hours per day',
                            'type' => 'number',
                            'suffix' => 'hrs',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '8',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'days_hourly',
                            'label' => 'Leave days to sell',
                            'type' => 'number',
                            'suffix' => 'days',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'selling_leave_hourly',
                            'label' => 'Amount you can earn',
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
            'title' => 'selling_leave = (base_pay/30)*days',
            'results' => ['base_pay' => '30*selling_leave/days', 'days' => '30*selling_leave/base_pay', 'selling_leave' => '(1/30)*base_pay*days'],
        ],
        [
            'title' => 'selling_leave_annual = (base_pay_annual/working_days)*days_annual',
            'results' => ['selling_leave_annual' => 'base_pay_annual*days_annual/working_days', 'base_pay_annual' => 'selling_leave_annual*working_days/days_annual', 'working_days' => 'base_pay_annual*days_annual/selling_leave_annual', 'days_annual' => 'selling_leave_annual*working_days/base_pay_annual'],
        ],
        [
            'title' => 'selling_leave_weekly = (base_pay_weekly / working_days_week) * days_weekly',
            'results' => ['working_days_week' => 'base_pay_weekly*days_weekly/selling_leave_weekly', 'base_pay_weekly' => 'selling_leave_weekly*working_days_week/days_weekly', 'days_weekly' => 'selling_leave_weekly*working_days_week/base_pay_weekly', 'selling_leave_weekly' => 'base_pay_weekly*days_weekly/working_days_week'],
        ],
        [
            'title' => 'selling_leave_hourly = base_pay_hourly * hours * days_hourly',
            'results' => ['days_hourly' => 'selling_leave_hourly/(base_pay_hourly*hours)', 'base_pay_hourly' => 'selling_leave_hourly/(days_hourly*hours)', 'selling_leave_hourly' => 'base_pay_hourly*days_hourly*hours', 'hours' => 'selling_leave_hourly/(base_pay_hourly*days_hourly)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Selling leave days works out Amount you can earn and Base pay per year from Base pay per month. Nothing is looked up on this page: amount you can earn is computed from base pay per month and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Amount you can earn is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Selling leave days calculator works', 'html' => <<<'TXT'
            <p>The Selling leave days calculator applies one relationship to 2 numbers and reports Amount you can earn, Base pay per year and Working days per year.</p><p>Written with the labels from the form, Amount you can earn = (1 ÷ 30) × Base pay per month × Leave days to sell.</p><p>What comes back is Amount you can earn, Base pay per year, Working days per year and Leave days to sell — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Base pay per month</strong> — in USD</li><li><strong>Leave days to sell</strong> — in days</li></ul><p>The result boxes are Amount you can earn in USD, Base pay per year in USD, Working days per year in days, Leave days to sell in days, Amount you can earn in USD, Base pay per week in USD, Working days per week in days, Leave days to sell in days, Amount you can earn in USD, Base pay per hour in USD, Working hours per day in hrs, Leave days to sell in days, Amount you can earn in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Amount you can earn is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Amount you can earn</strong> = <code>(1 ÷ 30) × Base pay per month × Leave days to sell</code></li><li><strong>Base pay per month</strong> = <code>30 × Amount you can earn ÷ Leave days to sell</code></li><li><strong>Leave days to sell</strong> = <code>30 × Amount you can earn ÷ Base pay per month</code></li><li><strong>Base pay per year</strong> = <code>Amount you can earn × Working days per year ÷ Leave days to sell</code></li><li><strong>Working days per year</strong> = <code>Base pay per year × Leave days to sell ÷ Amount you can earn</code></li><li><strong>Working days per week</strong> = <code>Base pay per week × Leave days to sell ÷ Amount you can earn</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Amount you can earn</strong> = <code>(1 ÷ 30) × Base pay per month × Leave days to sell</code> — the form to use when Base pay per month and Leave days to sell are the values you have.</li><li><strong>Base pay per month</strong> = <code>30 × Amount you can earn ÷ Leave days to sell</code> — the form to use when Amount you can earn and Leave days to sell are the values you have.</li><li><strong>Leave days to sell</strong> = <code>30 × Amount you can earn ÷ Base pay per month</code> — the form to use when Amount you can earn and Base pay per month are the values you have.</li><li><strong>Amount you can earn</strong> = <code>Base pay per year × Leave days to sell ÷ Working days per year</code> — the form to use when Base pay per year, Leave days to sell and Working days per year are the values you have.</li><li><strong>Base pay per year</strong> = <code>Amount you can earn × Working days per year ÷ Leave days to sell</code> — the form to use when Amount you can earn, Working days per year and Leave days to sell are the values you have.</li><li><strong>Working days per year</strong> = <code>Base pay per year × Leave days to sell ÷ Amount you can earn</code> — the form to use when Base pay per year, Leave days to sell and Amount you can earn are the values you have.</li><li><strong>Leave days to sell</strong> = <code>Amount you can earn × Working days per year ÷ Base pay per year</code> — the form to use when Amount you can earn, Working days per year and Base pay per year are the values you have.</li><li><strong>Amount you can earn</strong> = <code>Base pay per week × Leave days to sell ÷ Working days per week</code> — the form to use when Base pay per week, Leave days to sell and Working days per week are the values you have.</li></ul><p>Any one of Amount you can earn, Base pay per month and Leave days to sell can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Amount you can earn, Base pay per year and Working days per year are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Base pay per month left as a guess.</strong> Anything typed into Base pay per month is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Leave days to sell left as a guess.</strong> Anything typed into Leave days to sell is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Base pay per month and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Base pay per month</strong> takes a plain number with no unit attached. The page reads it when it works out Leave days to sell and Amount you can earn. Have it to hand before you start: Base pay per month is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Leave days to sell</strong> is measured in days. The page reads it when it works out Base pay per month and Amount you can earn. Have it to hand before you start: Leave days to sell is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Base pay per month and Leave days to sell. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Base pay per month into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Amount you can earn in USD with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Amount you can earn is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Base pay per month and Leave days to sell and the number you are missing is Amount you can earn and Base pay per year.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/gdp-growth">GDP growth rate Calculator</a>, <a href="/finance/gdp-per-capita">GDP per capita Calculator</a> and <a href="/finance/gdp">GDP</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Selling leave days calculator work out?', 'a' => <<<'TXT'
            Amount you can earn, Base pay per year, Working days per year and Leave days to sell, from Base pay per month and Leave days to sell. The relationship is Amount you can earn = (1 ÷ 30) × Base pay per month × Leave days to sell.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Base pay per month (USD), Leave days to sell (days). Fill base pay per month and leave days to sell and leave Amount you can earn empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Amount you can earn, Base pay per month, Leave days to sell and Amount you can earn blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Amount you can earn is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Base pay per month left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Amount you can earn keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/gdp-growth', 'name' => 'GDP growth rate Calculator'],
            ['path' => '/finance/gdp-per-capita', 'name' => 'GDP per capita Calculator'],
            ['path' => '/finance/gdp', 'name' => 'GDP'],
        ],
        'authors' => [],
    ],
];
