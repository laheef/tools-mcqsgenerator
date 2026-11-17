<?php

/**
 * Home affordability
 * /finance/home-affordability
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Home affordability',
    'meta' => ['title' => 'Home affordability — Free Online Calculator', 'description' => 'Home affordability turns maximum payment and loan term into maximum home value. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Home affordability Calculator', 'updated' => '2026-09-09'],
    'sections' => [
        [
            'title' => 'Loan specification',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'maximum_payment',
                            'label' => 'Maximum payment',
                            'type' => 'number',
                            'help' => 'Maximum amount you can spend on an installment each month.',
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
                            'name' => 'loan_term',
                            'label' => 'Loan term',
                            'type' => 'number',
                            'help' => 'Mortgage term.',
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
                            'name' => 'interest_rate',
                            'label' => 'Interest rate',
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
            'title' => 'Additional information',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'money_you_have',
                            'label' => 'Money you have',
                            'type' => 'number',
                            'help' => 'Money you can spend on a down payment.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'current_debt',
                            'label' => 'Monthly debt',
                            'type' => 'number',
                            'help' => 'Installments of other loans you need to pay.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'insurance',
                            'label' => 'Homeowner insurance',
                            'type' => 'number',
                            'help' => 'Cost of your homeowner insurance policy.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tax',
                            'label' => 'Property tax',
                            'type' => 'number',
                            'help' => 'Tax you need to pay as a property owner.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'closing_costs',
                            'label' => 'Closing costs',
                            'type' => 'number',
                            'help' => 'Typically between 2-5% of the houses value.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
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
                            'name' => 'maximum_home_value',
                            'label' => 'Maximum home value',
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
                            'name' => 'maximum_loan',
                            'label' => 'Maximum loan',
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
            'title' => 'maximum_home_value = (money_you_have + maximum_loan) / (1+ closing_costs)',
            'results' => ['closing_costs' => '(-maximum_home_value + maximum_loan + money_you_have)/maximum_home_value', 'money_you_have' => 'closing_costs*maximum_home_value + maximum_home_value - maximum_loan', 'maximum_loan' => 'closing_costs*maximum_home_value + maximum_home_value - money_you_have', 'maximum_home_value' => '(maximum_loan + money_you_have)/(closing_costs + 1)'],
        ],
        [
            'title' => 'maximum_loan = ((1 - (1 + (interest_rate / 12)) ^ (- loan_term)) * (maximum_payment - insurance/12 - tax/12 - current_debt)) / (interest_rate / 12)',
            'results' => [
                'loan_term' => <<<'TXT'
                log((12*current_debt + insurance + interest_rate*maximum_loan - 12*maximum_payment + tax)/(12*current_debt + insurance - 12*maximum_payment + tax))/(-log(interest_rate + 12) + log(12))
                TXT,
                'maximum_payment' => <<<'TXT'
                (1/12)*(pow(12, loan_term)*insurance + pow(12, loan_term)*tax + pow(12, loan_term + 1)*current_debt - 12*current_debt*pow(interest_rate + 12, loan_term) - insurance*pow(interest_rate + 12, loan_term) - interest_rate*maximum_loan*pow(interest_rate + 12, loan_term) - tax*pow(interest_rate + 12, loan_term))/(pow(12, loan_term) - pow(interest_rate + 12, loan_term))
                TXT,
                'insurance' => <<<'TXT'
                (-pow(12, loan_term)*tax - pow(12, loan_term + 1)*current_debt + pow(12, loan_term + 1)*maximum_payment + 12*current_debt*pow(interest_rate + 12, loan_term) + interest_rate*maximum_loan*pow(interest_rate + 12, loan_term) - 12*maximum_payment*pow(interest_rate + 12, loan_term) + tax*pow(interest_rate + 12, loan_term))/(pow(12, loan_term) - pow(interest_rate + 12, loan_term))
                TXT,
                'maximum_loan' => <<<'TXT'
                pow(interest_rate + 12, -loan_term)*(pow(12, loan_term)*(12*current_debt + insurance - 12*maximum_payment + tax) + pow(interest_rate + 12, loan_term)*(-12*current_debt - insurance + 12*maximum_payment - tax))/interest_rate
                TXT,
                'current_debt' => <<<'TXT'
                (1/12)*(-pow(12, loan_term)*insurance - pow(12, loan_term)*tax + pow(12, loan_term + 1)*maximum_payment + insurance*pow(interest_rate + 12, loan_term) + interest_rate*maximum_loan*pow(interest_rate + 12, loan_term) - 12*maximum_payment*pow(interest_rate + 12, loan_term) + tax*pow(interest_rate + 12, loan_term))/(pow(12, loan_term) - pow(interest_rate + 12, loan_term))
                TXT,
                'tax' => <<<'TXT'
                (-pow(12, loan_term)*insurance - pow(12, loan_term + 1)*current_debt + pow(12, loan_term + 1)*maximum_payment + 12*current_debt*pow(interest_rate + 12, loan_term) + insurance*pow(interest_rate + 12, loan_term) + interest_rate*maximum_loan*pow(interest_rate + 12, loan_term) - 12*maximum_payment*pow(interest_rate + 12, loan_term))/(pow(12, loan_term) - pow(interest_rate + 12, loan_term))
                TXT,
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Home affordability turns Money you have, Closing costs and Maximum loan into Maximum payment and Loan term. There is no hidden constant here: change maximum payment and money you have moves with it. The main result, Maximum payment, is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the Home affordability calculator works', 'html' => <<<'TXT'
            <p>The Home affordability calculator applies one relationship to 3 numbers and reports Maximum payment, Loan term and Monthly debt.</p><p>The relationship it solves reads Maximum home value = (Maximum loan + Money you have) ÷ (Closing costs + 1).</p><p>The result panel carries Maximum payment, Loan term, Monthly debt and Homeowner insurance, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Money you have</strong> — in USD. Money you can spend on a down payment.</li><li><strong>Closing costs</strong> — in percent. Typically between 2-5% of the houses value.</li><li><strong>Maximum loan</strong> — in USD</li></ul><p>The answers come back as Maximum payment in USD, Loan term in years / months, Monthly debt in USD, Homeowner insurance in USD, Property tax in USD, Maximum home value in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Loan term offers 9 units and opens on years / months, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Maximum home value</strong> = <code>(Maximum loan + Money you have) ÷ (Closing costs + 1)</code></li><li><strong>Closing costs</strong> = <code>( − Maximum home value + Maximum loan + Money you have) ÷ Maximum home value</code></li><li><strong>Money you have</strong> = <code>Closing costs × Maximum home value + Maximum home value − Maximum loan</code></li><li><strong>Maximum loan</strong> = <code>Closing costs × Maximum home value + Maximum home value − Money you have</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Maximum home value</strong> = <code>(Maximum loan + Money you have) ÷ (Closing costs + 1)</code> — the form to use when Maximum loan, Money you have and Closing costs are the values you have.</li><li><strong>Closing costs</strong> = <code>( − Maximum home value + Maximum loan + Money you have) ÷ Maximum home value</code> — the form to use when Maximum home value, Maximum loan and Money you have are the values you have.</li><li><strong>Money you have</strong> = <code>Closing costs × Maximum home value + Maximum home value − Maximum loan</code> — the form to use when Closing costs, Maximum home value and Maximum loan are the values you have.</li><li><strong>Maximum loan</strong> = <code>Closing costs × Maximum home value + Maximum home value − Money you have</code> — the form to use when Closing costs, Maximum home value and Money you have are the values you have.</li></ul><p>Any one of Maximum home value, Closing costs and Money you have can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Closing costs is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Maximum payment, Loan term and Monthly debt are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Money you have left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Money you have is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Closing costs left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Closing costs is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Money you have to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Money you have</strong> takes a plain number with no unit attached. Money you can spend on a down payment. It feeds Closing costs, Maximum loan and Maximum home value. Have it to hand before you start: Money you have is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Closing costs</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Typically between 2-5% of the houses value. It feeds Money you have, Maximum loan and Maximum home value. Have it to hand before you start: Closing costs is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Maximum loan</strong> takes a plain number with no unit attached. It feeds Closing costs, Money you have and Maximum home value. Have it to hand before you start: Maximum loan is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 6 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Maximum payment</strong> is a plain number. It is worked out from Loan term, Homeowner insurance, Property tax and Monthly debt. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Loan term</strong> is a years / months figure. It is worked out from Monthly debt, Homeowner insurance, Interest rate and Maximum loan. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Monthly debt</strong> is a plain number. It is worked out from Loan term, Homeowner insurance, Property tax and Maximum payment. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Homeowner insurance</strong> is a plain number. It is worked out from Loan term, Property tax, Monthly debt and Maximum payment. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Property tax</strong> is a plain number. It is worked out from Loan term, Homeowner insurance, Monthly debt and Maximum payment. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Maximum home value</strong> is a plain number. It is worked out from Maximum loan, Money you have and Closing costs. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>years / months</strong> — opens in <em>yrsmos</em>, and the chip also carries min, hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Maximum payment is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The chips cover years / months and percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Money you have, Closing costs and Maximum loan is what you already know and Maximum payment and Loan term is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/ebitda-multiple">EBITDA multiple</a>, <a href="/finance/economic-injury-disaster-loan">Economic Injury Disaster Loan Emergency Advance … Calculator</a> and <a href="/finance/eoq">Economic order quantity (EOQ) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Home affordability calculator work out?', 'a' => <<<'TXT'
            Maximum payment, Loan term, Monthly debt and Homeowner insurance, from Maximum loan, Money you have and Closing costs. The relationship is Maximum home value = (Maximum loan + Money you have) ÷ (Closing costs + 1).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Money you have (USD), Closing costs (percent), Maximum loan (USD). Enter money you have, closing costs and maximum loan; Maximum payment is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Maximum home value, Closing costs, Money you have and Maximum loan blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Maximum payment is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Money you have left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Maximum payment at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/ebitda-multiple', 'name' => 'EBITDA multiple'],
            ['path' => '/finance/economic-injury-disaster-loan', 'name' => 'Economic Injury Disaster Loan Emergency Advance … Calculator'],
            ['path' => '/finance/eoq', 'name' => 'Economic order quantity (EOQ) Calculator'],
        ],
        'authors' => [],
    ],
];
