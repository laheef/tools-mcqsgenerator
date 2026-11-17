<?php

/**
 * Debt service coverage ratio
 * /finance/dscr
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Debt service coverage ratio',
    'meta' => ['title' => 'Debt service coverage ratio — Formula & Results', 'description' => 'Debt service coverage ratio turns interest rate and term into loan payment. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Debt service coverage ratio Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => 'Debt service',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'interest_rate',
                            'label' => 'Interest rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'percentyear',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '4',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'term',
                            'label' => 'Term',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_loan',
                            'label' => 'Total loan',
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
                            'name' => 'loan_payment',
                            'label' => 'Loan payment',
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
            'title' => 'NOI calculation',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gross_rental_income',
                            'label' => 'Gross rental income',
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
                            'name' => 'vacancy_rate',
                            'label' => 'Vacancy rate',
                            'type' => 'number',
                            'help' => 'How often you don\'t have a tenant for the apartment, expressed as a percentage of the gross income.',
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
                            'name' => 'operating_expenses',
                            'label' => 'Operating expenses',
                            'type' => 'number',
                            'help' => 'Expressed as a percentage of the gross income.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Debt service coverage ratio',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'noi',
                            'label' => 'NOI (Net operating income)',
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
                            'name' => 'dscr',
                            'label' => 'DSCR',
                            'type' => 'number',
                            'suffix' => '×',
                            'help' => 'Debt service coverage ratio.',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'dscr = noi / loan_payment',
            'results' => ['loan_payment' => 'noi/dscr', 'noi' => 'dscr*loan_payment', 'dscr' => 'noi/loan_payment'],
        ],
        [
            'title' => '(1-operating_expenses) * (1 - vacancy_rate) * gross_rental_income =noi',
            'results' => ['operating_expenses' => '(gross_rental_income*vacancy_rate - gross_rental_income + noi)/(gross_rental_income*(vacancy_rate - 1))', 'noi' => 'gross_rental_income*(operating_expenses*vacancy_rate - operating_expenses - vacancy_rate + 1)', 'gross_rental_income' => 'noi/(operating_expenses*vacancy_rate - operating_expenses - vacancy_rate + 1)', 'vacancy_rate' => '(gross_rental_income*operating_expenses - gross_rental_income + noi)/(gross_rental_income*(operating_expenses - 1))'],
        ],
        [
            'title' => 'loan_payment = interest_rate * total_loan / (1 - (1+interest_rate)^(-term))',
            'results' => ['loan_payment' => 'interest_rate*total_loan*pow(interest_rate + 1, term)/(pow(interest_rate + 1, term) - 1)', 'total_loan' => 'loan_payment/interest_rate - loan_payment*pow(interest_rate + 1, -term)/interest_rate', 'term' => 'log(-loan_payment/(interest_rate*total_loan - loan_payment))/log(interest_rate + 1)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Debt service coverage ratio takes Loan payment and NOI (Net operating income) and returns Term and Total loan. There is no hidden constant here: change term and loan payment moves with it. The main result, Term, is reported in years.
        TXT,
        'sections' => [
            ['title' => 'How the Debt service coverage ratio calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Debt service coverage ratio: it takes 2 numbers and reports Term, Total loan and Gross rental income.</p><p>In the form&#039;s own words, DSCR = NOI (Net operating income) ÷ Loan payment.</p><p>The answers are Term, Total loan, Gross rental income and Vacancy rate; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Loan payment</strong> — in USD</li><li><strong>NOI (Net operating income)</strong> — in USD</li></ul><p>The result boxes are Term in years, Total loan in USD, Gross rental income in USD, Vacancy rate in percent, Operating expenses in percent, DSCR in ×; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Term offers 5 units and opens on years, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>DSCR</strong> = <code>NOI (Net operating income) ÷ Loan payment</code></li><li><strong>Loan payment</strong> = <code>NOI (Net operating income) ÷ DSCR</code></li><li><strong>NOI (Net operating income)</strong> = <code>DSCR × Loan payment</code></li><li><strong>Operating expenses</strong> = <code>(Gross rental income × Vacancy rate − Gross rental income + NOI (Net operating income)) ÷ (Gross rental income × (Vacancy rate − 1))</code></li><li><strong>Gross rental income</strong> = <code>NOI (Net operating income) ÷ (Operating expenses × Vacancy rate − Operating expenses − Vacancy rate + 1)</code></li><li><strong>Vacancy rate</strong> = <code>(Gross rental income × Operating expenses − Gross rental income + NOI (Net operating income)) ÷ (Gross rental income × (Operating expenses − 1))</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>DSCR</strong> = <code>NOI (Net operating income) ÷ Loan payment</code> — the form to use when NOI (Net operating income) and Loan payment are the values you have.</li><li><strong>Loan payment</strong> = <code>NOI (Net operating income) ÷ DSCR</code> — the form to use when NOI (Net operating income) and DSCR are the values you have.</li><li><strong>NOI (Net operating income)</strong> = <code>DSCR × Loan payment</code> — the form to use when DSCR and Loan payment are the values you have.</li><li><strong>Operating expenses</strong> = <code>(Gross rental income × Vacancy rate − Gross rental income + NOI (Net operating income)) ÷ (Gross rental income × (Vacancy rate − 1))</code> — the form to use when Gross rental income, Vacancy rate and NOI (Net operating income) are the values you have.</li><li><strong>NOI (Net operating income)</strong> = <code>Gross rental income × (Operating expenses × Vacancy rate − Operating expenses − Vacancy rate + 1)</code> — the form to use when Gross rental income, Operating expenses and Vacancy rate are the values you have.</li><li><strong>Gross rental income</strong> = <code>NOI (Net operating income) ÷ (Operating expenses × Vacancy rate − Operating expenses − Vacancy rate + 1)</code> — the form to use when NOI (Net operating income), Operating expenses and Vacancy rate are the values you have.</li><li><strong>Vacancy rate</strong> = <code>(Gross rental income × Operating expenses − Gross rental income + NOI (Net operating income)) ÷ (Gross rental income × (Operating expenses − 1))</code> — the form to use when Gross rental income, Operating expenses and NOI (Net operating income) are the values you have.</li><li><strong>Loan payment</strong> = <code>Interest rate × Total loan × (Interest rate + 1)^(Term) ÷ ((Interest rate + 1)^(Term) − 1)</code> — the form to use when Interest rate, Total loan and Term are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of DSCR, Loan payment and NOI (Net operating income) can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Term, Total loan and Gross rental income are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Loan payment left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Loan payment is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>NOI (Net operating income) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If NOI (Net operating income) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Loan payment and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Loan payment</strong> takes a plain number with no unit attached. It feeds NOI (Net operating income), DSCR and Total loan. Have it to hand before you start: Loan payment is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>NOI (Net operating income)</strong> takes a plain number with no unit attached. It feeds Loan payment, DSCR and Operating expenses. Have it to hand before you start: NOI (Net operating income) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Term</strong> is a years figure. The value follows from Loan payment, Interest rate and Total loan. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Total loan</strong> is a plain number. The value follows from Loan payment, Interest rate and Term. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Gross rental income</strong> is a plain number. The value follows from NOI (Net operating income), Operating expenses and Vacancy rate. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Vacancy rate</strong> is a percent figure. The value follows from Gross rental income, Operating expenses and NOI (Net operating income). Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Operating expenses</strong> is a percent figure. The value follows from Gross rental income, Vacancy rate and NOI (Net operating income). Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>DSCR</strong> is a plain number. The value follows from NOI (Net operating income) and Loan payment. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>years</strong> — opens in <em>yrs</em>, and the chip also carries days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Term is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The unit tables here are years and percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Loan payment and NOI (Net operating income) are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Loan payment and NOI (Net operating income) and the number you are missing is Term and Total loan.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/maturity-value">Maturity value Calculator</a>, <a href="/finance/maximum-drawdown">Maximum drawdown Calculator</a> and <a href="/finance/mega-millions-payout">Mega Millions payout</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Debt service coverage ratio calculator work out?', 'a' => <<<'TXT'
            Term, Total loan, Gross rental income and Vacancy rate, from NOI (Net operating income) and Loan payment. The relationship is DSCR = NOI (Net operating income) ÷ Loan payment.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Loan payment (USD), NOI (Net operating income) (USD). With loan payment and NOI (Net operating income) in place, Term can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. DSCR, Loan payment, NOI (Net operating income) and Operating expenses can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Term is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Loan payment left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Term keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/maturity-value', 'name' => 'Maturity value Calculator'],
            ['path' => '/finance/maximum-drawdown', 'name' => 'Maximum drawdown Calculator'],
            ['path' => '/finance/mega-millions-payout', 'name' => 'Mega Millions payout'],
        ],
        'authors' => [],
    ],
];
