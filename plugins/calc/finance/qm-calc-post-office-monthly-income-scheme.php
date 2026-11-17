<?php

/**
 * Post Office Monthly Income Scheme
 * /finance/post-office-monthly-income-scheme
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Post Office Monthly Income Scheme',
    'meta' => ['title' => 'Post Office Monthly Income Scheme — Finance', 'description' => 'Post Office Monthly Income Scheme works out monthly income from nature of account. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Post Office Monthly Income Scheme Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => 'Post Office Monthly Income Scheme (POMIS)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'account_nature',
                            'label' => 'Nature of account',
                            'type' => 'select',
                            'options' => ['Individual' => '0', 'Joint' => '1'],
                            'default' => 'Individual',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'amount_invested',
                            'label' => 'Amount invested',
                            'type' => 'number',
                            'prefix' => '₹',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'amount_invested_joint',
                            'label' => 'Amount invested ',
                            'type' => 'number',
                            'prefix' => '₹',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'interest_rate',
                            'label' => 'Interest rate',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '6.60',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'monthly_income',
                            'label' => 'Monthly income',
                            'type' => 'number',
                            'prefix' => '₹',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'monthly_income_joint',
                            'label' => 'Monthly income',
                            'type' => 'number',
                            'prefix' => '₹',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Pre-mature account closure penalty charges',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'account_nature == 0 and hasValue(amount_invested)', 'text' => <<<'TXT'
                                The maturity period of your POMIS account is 5 years. You can not close your account before 1 year from the day of deposit. If you close your account between 1 and 3 years from the opening date, you will have to pay a penalty of ₹{{penalty1_3_ind.formattedValue}}. If you close your account between 3 and 5 years from the opening date, you will have to pay a penalty of ₹{{penalty3_5_ind.formattedVal
                                TXT],
                                ['when' => 'account_nature == 1 and hasValue(amount_invested_joint)', 'text' => <<<'TXT'
                                The maturity period of your POMIS account is 5 years. You can not close your account before 1 year from the day of deposit. If you close your account between 1 and 3 years from the opening date, you will have to pay a penalty of ₹{{penalty1_3_joint.formattedValue}}. If you close your account between 3 and 5 years from the opening date, you will have to pay a penalty of ₹{{penalty3_5_joint.formatte
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
                            'name' => 'penalty1_3_ind',
                            'label' => 'Penalty1 3 ind',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'penalty3_5_ind',
                            'label' => 'Penalty3 5 ind',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'penalty1_3_joint',
                            'label' => 'Penalty1 3 joint',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'penalty3_5_joint',
                            'label' => 'Penalty3 5 joint',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'monthly_income=amount_invested*interest_rate/1200',
            'results' => ['monthly_income' => '(1/1200)*amount_invested*interest_rate', 'amount_invested' => '1200*monthly_income/interest_rate', 'interest_rate' => '1200*monthly_income/amount_invested'],
        ],
        [
            'title' => 'monthly_income_joint=amount_invested_joint*interest_rate/1200 ',
            'results' => ['amount_invested_joint' => '1200*monthly_income_joint/interest_rate', 'monthly_income_joint' => '(1/1200)*amount_invested_joint*interest_rate', 'interest_rate' => '1200*monthly_income_joint/amount_invested_joint'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Enter Interest rate into Post Office Monthly Income Scheme and the answer comes back as Amount invested and Monthly income. It is a single relationship that reads amount invested out of interest rate, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Post Office Monthly Income Scheme calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Post Office Monthly Income Scheme: it takes 2 numbers and reports Amount invested, Monthly income and Monthly income.</p><p>The relationship it solves reads Monthly income = (1 ÷ 1200) × Amount invested × Interest rate.</p><p>The result panel carries Amount invested, Monthly income and Monthly income, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Amount invested</strong> — a plain number, no unit</li><li><strong>Interest rate</strong> — in %</li></ul><p>The answers come back as Amount invested, Monthly income, Monthly income. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Amount invested is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Monthly income</strong> = <code>(1 ÷ 1200) × Amount invested × Interest rate</code></li><li><strong>Amount invested</strong> = <code>1200 × Monthly income ÷ Interest rate</code></li><li><strong>Interest rate</strong> = <code>1200 × Monthly income ÷ Amount invested</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Monthly income</strong> = <code>(1 ÷ 1200) × Amount invested × Interest rate</code> — the form to use when Amount invested and Interest rate are the values you have.</li><li><strong>Amount invested</strong> = <code>1200 × Monthly income ÷ Interest rate</code> — the form to use when Monthly income and Interest rate are the values you have.</li><li><strong>Interest rate</strong> = <code>1200 × Monthly income ÷ Amount invested</code> — the form to use when Monthly income and Amount invested are the values you have.</li><li><strong>Monthly income</strong> = <code>(1 ÷ 1200) × Amount invested × Interest rate</code> — the form to use when Amount invested and Interest rate are the values you have.</li><li><strong>Amount invested</strong> = <code>1200 × Monthly income ÷ Interest rate</code> — the form to use when Monthly income and Interest rate are the values you have.</li><li><strong>Interest rate</strong> = <code>1200 × Monthly income ÷ Amount invested</code> — the form to use when Monthly income and Amount invested are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Monthly income, Amount invested and Interest rate can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Amount invested, Monthly income and Monthly income are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Amount invested left as a guess.</strong> Anything typed into Amount invested is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Interest rate left as a guess.</strong> Anything typed into Interest rate is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Amount invested to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Post Office Monthly Income Scheme form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Amount invested</strong> takes a plain number with no unit attached. It feeds Monthly income and Interest rate. Fill it from a measurement rather than a memory — Amount invested is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Interest rate</strong> is measured in %. It feeds Monthly income, Amount invested and Amount invested. Fill it from a measurement rather than a memory — Interest rate is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Amount invested</strong> is a plain number. It is worked out from Monthly income and Interest rate. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Monthly income</strong> is a plain number. It is worked out from Amount invested and Interest rate. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Monthly income</strong> is a plain number. It is worked out from Amount invested and Interest rate. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Amount invested and Interest rate ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Amount invested — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Amount invested against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Amount invested is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Amount invested and Interest rate are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Amount invested and Interest rate and the number you are missing is Amount invested and Monthly income.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/marketing-conversion">Online marketing conversion Calculator</a>, <a href="/finance/operating-asset-turnover">Operating asset turnover Calculator</a> and <a href="/finance/operating-cash-flow-ratio">Operating cash flow ratio Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Post Office Monthly Income Scheme is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Post Office Monthly Income Scheme is a number to act on, so the useful question is what to do with Amount invested, Monthly income and Monthly income once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Amount invested and Interest rate alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Post Office Monthly Income Scheme calculator work out?', 'a' => <<<'TXT'
            Amount invested, Monthly income and Monthly income, from Amount invested and Interest rate. The relationship is Monthly income = (1 ÷ 1200) × Amount invested × Interest rate.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Amount invested, Interest rate (%). With amount invested and interest rate in place, Amount invested can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Monthly income, Amount invested, Interest rate and Monthly income can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Amount invested is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Amount invested blank and the page solves for it, reporting Amount invested instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Amount invested keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/marketing-conversion', 'name' => 'Online marketing conversion Calculator'],
            ['path' => '/finance/operating-asset-turnover', 'name' => 'Operating asset turnover Calculator'],
            ['path' => '/finance/operating-cash-flow-ratio', 'name' => 'Operating cash flow ratio Calculator'],
        ],
        'authors' => [],
    ],
];
