<?php

/**
 * Trump's account
 * /finance/trumps-account
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Trump\'s account',
    'meta' => ['title' => 'Trump\'s account Calculator: Free, With Steps', 'description' => 'Enter child’s starting age, starting balance and annual contribution and Trump\'s account returns account balance on 18th birthday and your contribution.', 'h1' => 'Trump\'s account Calculator', 'updated' => '2026-07-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'starting_age',
                            'label' => 'Child’s starting age',
                            'type' => 'number',
                            'suffix' => 'years',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'principal',
                            'label' => 'Starting balance',
                            'type' => 'number',
                            'suffix' => 'USD',
                            'help' => 'The starting sum of $1000 is available for kids born in 2025 and 2026. Children younger than 10 also are eligible to apply for a starting sum of $250.',
                            'rounding' => ['standard', '2'],
                            'default' => '1000',
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
                            'suffix' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '5000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'return_rate',
                            'label' => 'Choose a scenario for the rate of return:',
                            'type' => 'select',
                            'options' => ['Optimistic (10.51% annual return rate)' => '0.1051', 'Conservative (7% annual return rate)' => '0.07', 'Pessimistic (4% annual return rate)' => '0.04'],
                            'dataset' => 'rate_of_return',
                            'default' => 'Optimistic (10.51% annual return rate)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'include_inflation_checkbox',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Include inflation' => '1', '' => '0'],
                            'dataset' => 'inflation checkbox',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'inflation',
                            'label' => 'Choose a scenario for inflation:',
                            'type' => 'select',
                            'options' => ['10-year average (3.39% inflation)' => '0.0339', '5-year average (4.34% inflation)' => '0.0434'],
                            'dataset' => 'inflation_rate',
                            'default' => '10-year average (3.39% inflation)',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Your results',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'balance_after_18_years >= 0', 'text' => <<<'TXT'
                                Your final balance will be ${{balance_after_18_years.formattedValue}}. From that, ${{your_contribution.formattedValue}} will be the money you contributed towards the account, and the remaining ${{interest.formattedValue}} comes from the accrued interest.
                                TXT],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'interest_after_inflation >= 0', 'text' => <<<'TXT'
                                Your final balance, adjusted for inflation, will be ${{balance_after_18_years_with_inflation.formattedValue}} in today's purchasing power (${{balance_after_18_years.formattedValue}} in dollar terms). Over the years, you will deposit a total of ${{your_contribution.formattedValue}}, so even after accounting for rising prices, the account will be worth at least ${{interest_after_inflation.formattedV
                                TXT],
                                ['when' => 'interest_after_inflation < 0', 'text' => <<<'TXT'
                                Your final balance, adjusted for inflation, will be ${{balance_after_18_years_with_inflation.formattedValue}} in today's purchasing power. In dollar terms, the account still grows — your deposits will reach ${{balance_after_18_years.formattedValue}}, a gain of ${{interest.formattedValue}}. The inflation-adjusted figure shows that rising prices will absorb much of that growth. Your final balance ad
                                TXT],
                            ],
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
                            'name' => 'balance_after_18_years',
                            'label' => 'Account balance on 18th birthday',
                            'type' => 'number',
                            'suffix' => 'USD',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'your_contribution',
                            'label' => 'Your contribution',
                            'type' => 'number',
                            'suffix' => 'USD',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'interest',
                            'label' => 'Accrued interest',
                            'type' => 'number',
                            'suffix' => 'USD',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'balance_after_18_years_with_inflation',
                            'label' => 'Inflation-adjusted balance on 18th birthday',
                            'type' => 'number',
                            'suffix' => 'USD',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'interest_after_inflation',
                            'label' => 'Interest after inflation',
                            'type' => 'number',
                            'suffix' => 'USD',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'your_contribution_rounded',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'interest_rounded',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'interest_after_inflation_rounded',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => <<<'TXT'
            balance_after_18_years = principal * (1 + return_rate)^(18-starting_age) + annual_contribution * ((1 + return_rate)^(18-starting_age) - 1) / return_rate * (1 + return_rate)
            TXT,
            'results' => ['principal' => <<<'TXT'
            (annual_contribution*pow(return_rate + 1, starting_age - 18) - annual_contribution + return_rate*(annual_contribution*pow(return_rate + 1, starting_age - 18) - annual_contribution + balance_after_18_years*pow(return_rate + 1, starting_age - 18)))/return_rate
            TXT, 'annual_contribution' => <<<'TXT'
            return_rate*(balance_after_18_years - principal*pow(return_rate + 1, 18 - starting_age))/(return_rate*pow(return_rate + 1, 18 - starting_age) - return_rate + pow(return_rate + 1, 18 - starting_age) - 1)
            TXT, 'starting_age' => <<<'TXT'
            log(pow(return_rate + 1, 18)*(annual_contribution*return_rate + annual_contribution + principal*return_rate)/(annual_contribution*return_rate + annual_contribution + balance_after_18_years*return_rate))/log(return_rate + 1)
            TXT, 'balance_after_18_years' => <<<'TXT'
            (annual_contribution*pow(return_rate + 1, 18 - starting_age) - annual_contribution + return_rate*(annual_contribution*pow(return_rate + 1, 18 - starting_age) - annual_contribution + principal*pow(return_rate + 1, 18 - starting_age)))/return_rate
            TXT],
        ],
        [
            'title' => 'balance_after_18_years_with_inflation = balance_after_18_years / (1 + inflation)^(18-starting_age)',
            'results' => ['balance_after_18_years_with_inflation' => 'balance_after_18_years*pow(inflation + 1, starting_age - 18)', 'inflation' => 'pow(balance_after_18_years_with_inflation/balance_after_18_years, 1/(starting_age - 18)) - 1', 'balance_after_18_years' => 'balance_after_18_years_with_inflation*pow(inflation + 1, 18 - starting_age)', 'starting_age' => 'log(balance_after_18_years_with_inflation*pow(inflation + 1, 18)/balance_after_18_years)/log(inflation + 1)'],
        ],
        [
            'title' => 'your_contribution = annual_contribution * (18-starting_age)',
            'results' => ['your_contribution' => 'annual_contribution*(18 - starting_age)', 'annual_contribution' => '-your_contribution/(starting_age - 18)', 'starting_age' => '18 - your_contribution/annual_contribution'],
        ],
        [
            'title' => 'interest = balance_after_18_years - your_contribution',
            'results' => ['interest' => 'balance_after_18_years - your_contribution', 'your_contribution' => 'balance_after_18_years - interest', 'balance_after_18_years' => 'interest + your_contribution'],
        ],
        [
            'title' => 'interest_after_inflation = balance_after_18_years_with_inflation - your_contribution',
            'results' => ['your_contribution' => 'balance_after_18_years_with_inflation - interest_after_inflation', 'balance_after_18_years_with_inflation' => 'interest_after_inflation + your_contribution', 'interest_after_inflation' => 'balance_after_18_years_with_inflation - your_contribution'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Trump's account works out Choose a scenario for inflation and Account balance on 18th birthday from Child’s starting age, Starting balance and Annual contribution. There is no hidden constant here: change choose a scenario for inflation and child’s starting age moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Trump\'s account calculator works', 'html' => <<<'TXT'
            <p>The Trump&#039;s account calculator applies one relationship to 4 numbers and reports Choose a scenario for inflation, Account balance on 18th birthday and Your contribution.</p><p>The result panel carries Choose a scenario for inflation, Account balance on 18th birthday, Your contribution and Accrued interest, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>Child’s starting age</strong> — in years</li><li><strong>Starting balance</strong> — in USD. The starting sum of $1000 is available for kids born in 2025 and 2026. Children younger than 10 also are eligible to apply for a starting sum of $250.</li><li><strong>Annual contribution</strong> — in USD</li><li><strong>Choose a scenario for the rate of return</strong> — a plain number, no unit</li></ul><p>The result boxes are Choose a scenario for inflation, Account balance on 18th birthday in USD, Your contribution in USD, Accrued interest in USD, Inflation-adjusted balance on 18th birthday in USD, Interest after inflation in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Choose a scenario for the rate of return = 0.1051 and Include inflation checkbox = 0 gives <strong>Choose a scenario for inflation</strong> = 0.0339.</p><ul><li><strong>Choose a scenario for inflation</strong> = 0.0339</li></ul>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Choose a scenario for inflation:</strong> = 0.0339. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Choose a scenario for inflation: is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Inflation-adjusted balance on 18th birthday</strong> = <code>Account balance on 18th birthday × (Choose a scenario for inflation: + 1)^(Child’s starting age − 18)</code></li><li><strong>Choose a scenario for inflation</strong> = <code>(Inflation-adjusted balance on 18th birthday ÷ Account balance on 18th birthday)^(1 ÷ (Child’s starting age − 18)) − 1</code></li><li><strong>Account balance on 18th birthday</strong> = <code>Inflation-adjusted balance on 18th birthday × (Choose a scenario for inflation: + 1)^(18 − Child’s starting age)</code></li><li><strong>Child’s starting age</strong> = <code>ln(Inflation-adjusted balance on 18th birthday × (Choose a scenario for inflation: + 1)^(18) ÷ Account balance on 18th birthday) ÷ ln(Choose a scenario for inflation: + 1)</code></li><li><strong>Your contribution</strong> = <code>Annual contribution × (18 − Child’s starting age)</code></li><li><strong>Annual contribution</strong> = <code>− Your contribution ÷ (Child’s starting age − 18)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Inflation-adjusted balance on 18th birthday</strong> = <code>Account balance on 18th birthday × (Choose a scenario for inflation: + 1)^(Child’s starting age − 18)</code> — the form to use when Account balance on 18th birthday, Choose a scenario for inflation and Child’s starting age are the values you have.</li><li><strong>Choose a scenario for inflation</strong> = <code>(Inflation-adjusted balance on 18th birthday ÷ Account balance on 18th birthday)^(1 ÷ (Child’s starting age − 18)) − 1</code> — the form to use when Inflation-adjusted balance on 18th birthday, Account balance on 18th birthday and Child’s starting age are the values you have.</li><li><strong>Account balance on 18th birthday</strong> = <code>Inflation-adjusted balance on 18th birthday × (Choose a scenario for inflation: + 1)^(18 − Child’s starting age)</code> — the form to use when Inflation-adjusted balance on 18th birthday, Choose a scenario for inflation and Child’s starting age are the values you have.</li><li><strong>Child’s starting age</strong> = <code>ln(Inflation-adjusted balance on 18th birthday × (Choose a scenario for inflation: + 1)^(18) ÷ Account balance on 18th birthday) ÷ ln(Choose a scenario for inflation: + 1)</code> — the form to use when Inflation-adjusted balance on 18th birthday, Choose a scenario for inflation and Account balance on 18th birthday are the values you have.</li><li><strong>Your contribution</strong> = <code>Annual contribution × (18 − Child’s starting age)</code> — the form to use when Annual contribution and Child’s starting age are the values you have.</li><li><strong>Annual contribution</strong> = <code>− Your contribution ÷ (Child’s starting age − 18)</code> — the form to use when Your contribution and Child’s starting age are the values you have.</li><li><strong>Child’s starting age</strong> = <code>18 − Your contribution ÷ Annual contribution</code> — the form to use when Your contribution and Annual contribution are the values you have.</li><li><strong>Accrued interest</strong> = <code>Account balance on 18th birthday − Your contribution</code> — the form to use when Account balance on 18th birthday and Your contribution are the values you have.</li></ul><p>Any one of Account balance on 18th birthday, Starting balance and Annual contribution can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Choose a scenario for the rate of return: from 0.1051 to 0.2102, leaving every other box alone. The panel moves from <strong>Choose a scenario for inflation:</strong> 0.0339 to <strong>Choose a scenario for inflation:</strong> 0.0339.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Choose a scenario for inflation, Account balance on 18th birthday and Your contribution are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Child’s starting age left as a guess.</strong> Anything typed into Child’s starting age is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Starting balance left as a guess.</strong> Anything typed into Starting balance is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Annual contribution left as a guess.</strong> Anything typed into Annual contribution is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Child’s starting age and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Trump&#039;s account form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Child’s starting age</strong> is measured in years. It feeds Starting balance, Annual contribution and Account balance on 18th birthday. Fill it from a measurement rather than a memory — Child’s starting age is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Starting balance</strong> is measured in USD. The starting sum of $1000 is available for kids born in 2025 and 2026. Children younger than 10 also are eligible to apply for a starting sum of $250. It feeds Annual contribution, Child’s starting age and Account balance on 18th birthday. Fill it from a measurement rather than a memory — Starting balance is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Annual contribution</strong> is measured in USD. It feeds Starting balance, Child’s starting age and Account balance on 18th birthday. Fill it from a measurement rather than a memory — Annual contribution is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Choose a scenario for the rate of return</strong> takes a plain number with no unit attached. It feeds Starting balance, Annual contribution and Child’s starting age. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Choose a scenario for the rate of return is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Choose a scenario for inflation is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Child’s starting age, Starting balance and Annual contribution are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Child’s starting age, Starting balance and Annual contribution is what you already know and Choose a scenario for inflation and Account balance on 18th birthday is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/70-20-10-rule-money">70/20/10 rule money Calculator</a>, <a href="/finance/ar-days">A/R days Calculator</a> and <a href="/finance/absence-percentage">Absence percentage Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Trump&#039;s account is a number to act on, so the useful question is what to do with Choose a scenario for inflation, Account balance on 18th birthday (USD) and Your contribution (USD) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Child’s starting age, Starting balance, Annual contribution and Choose a scenario for the rate of return alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Trump\'s account calculator work out?', 'a' => <<<'TXT'
            Choose a scenario for inflation, Account balance on 18th birthday, Your contribution and Accrued interest, from Annual contribution, Choose a scenario for the rate of return, Child’s starting age and Starting balance.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Child’s starting age (years), Starting balance (USD), Annual contribution (USD), Choose a scenario for the rate of return. With child’s starting age, starting balance and annual contribution in place, Choose a scenario for inflation: can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Account balance on 18th birthday, Starting balance, Annual contribution and Child’s starting age blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Choose a scenario for inflation = 0.0339. That comes from the page's own defaults, entered in Child’s starting age; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Choose a scenario for inflation: is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave Child’s starting age blank and the page solves for it, reporting Choose a scenario for inflation: instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Choose a scenario for inflation: keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/70-20-10-rule-money', 'name' => '70/20/10 rule money Calculator'],
            ['path' => '/finance/ar-days', 'name' => 'A/R days Calculator'],
            ['path' => '/finance/absence-percentage', 'name' => 'Absence percentage Calculator'],
        ],
        'authors' => [],
    ],
];
