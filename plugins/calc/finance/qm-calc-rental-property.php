<?php

/**
 * Rental property
 * /finance/rental-property
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Rental property',
    'meta' => ['title' => 'Rental property — Formula, Steps & Examples', 'description' => 'Rental property works out loan amount and total paid from purchase price, down payment and interest rate. The formula is printed in the form\'s own words.', 'h1' => 'Rental property Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => 'Purchase',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'purchase_price',
                            'label' => 'Purchase price',
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
                            'name' => 'down_payment',
                            'label' => 'Down payment',
                            'type' => 'number',
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
                            'name' => 'loan_amount',
                            'label' => 'Loan amount',
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
                            'name' => 'interest_rate',
                            'label' => 'Interest rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'percentyear',
                            'rounding' => ['omni', '0.0001'],
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
                            'name' => 'total_paid',
                            'label' => 'Total paid',
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
            'title' => 'Income',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rent',
                            'label' => 'Rent',
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
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'management_fee',
                            'label' => 'Management fee',
                            'type' => 'number',
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
            'title' => 'Recurring expenses',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'property_tax',
                            'label' => 'Property tax',
                            'type' => 'number',
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
                            'label' => 'Insurance',
                            'type' => 'number',
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
                            'name' => 'maintenance',
                            'label' => 'Maintenance/repairs',
                            'type' => 'number',
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
                            'name' => 'hoa_fee',
                            'label' => 'HOA fee',
                            'type' => 'number',
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
                            'name' => 'other_costs',
                            'label' => 'Other costs',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Selling the property',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'value_appreciation',
                            'label' => 'Value appreciation',
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
                            'name' => 'holding_period',
                            'label' => 'Holding period',
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
                            'name' => 'selling_price',
                            'label' => 'Selling price',
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
            'title' => 'Cash flow and return on investment',
            'note' => '',
            'blocks' => [
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
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'monthly_costs',
                            'label' => 'Other costs',
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
                            'name' => 'gross_income',
                            'label' => 'Gross income',
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
                            'name' => 'cash_flow',
                            'label' => 'Cash flow',
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
                            'name' => 'noi',
                            'label' => 'NOI',
                            'type' => 'number',
                            'help' => 'Net Operating Income - doesn\'t take into account the cost of the mortgage.',
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
                            'name' => 'cash_on_cash_return',
                            'label' => 'Cash-on-cash return',
                            'type' => 'number',
                            'help' => 'Also called the annual yield. What portion of your initial cash investment returns to you every year?',
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
                            'name' => 'cap_rate',
                            'label' => 'Cap rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'loan_payment = interest_rate * loan_amount / (1 - (1+interest_rate)^(-loan_term)) ',
            'results' => ['loan_amount' => 'loan_payment/interest_rate - loan_payment*pow(interest_rate + 1, -loan_term)/interest_rate', 'loan_term' => 'log(-loan_payment/(interest_rate*loan_amount - loan_payment))/log(interest_rate + 1)', 'loan_payment' => 'interest_rate*loan_amount*pow(interest_rate + 1, loan_term)/(pow(interest_rate + 1, loan_term) - 1)'],
        ],
        [
            'title' => 'total_paid = loan_term * loan_payment',
            'results' => ['total_paid' => 'loan_payment*loan_term', 'loan_term' => 'total_paid/loan_payment', 'loan_payment' => 'total_paid/loan_term'],
        ],
        [
            'title' => 'loan_amount = purchase_price - down_payment',
            'results' => ['loan_amount' => '-down_payment + purchase_price', 'purchase_price' => 'down_payment + loan_amount', 'down_payment' => '-loan_amount + purchase_price'],
        ],
        [
            'title' => 'monthly_costs = property_tax + insurance +hoa_fee + maintenance + other_costs',
            'results' => [
                'hoa_fee' => '-insurance - maintenance + monthly_costs - other_costs - property_tax',
                'monthly_costs' => 'hoa_fee + insurance + maintenance + other_costs + property_tax',
                'property_tax' => '-hoa_fee - insurance - maintenance + monthly_costs - other_costs',
                'insurance' => '-hoa_fee - maintenance + monthly_costs - other_costs - property_tax',
                'maintenance' => '-hoa_fee - insurance + monthly_costs - other_costs - property_tax',
                'other_costs' => '-hoa_fee - insurance - maintenance + monthly_costs - property_tax',
            ],
        ],
        [
            'title' => 'gross_income = rent * (1-vacancy_rate) * (1-management_fee)',
            'results' => ['gross_income' => 'rent*(management_fee*vacancy_rate - management_fee - vacancy_rate + 1)', 'rent' => 'gross_income/(management_fee*vacancy_rate - management_fee - vacancy_rate + 1)', 'vacancy_rate' => '(gross_income + management_fee*rent - rent)/(rent*(management_fee - 1))', 'management_fee' => '(gross_income + rent*vacancy_rate - rent)/(rent*(vacancy_rate - 1))'],
        ],
        [
            'title' => 'selling_price =  purchase_price * (1+value_appreciation)^(holding_period)',
            'results' => ['holding_period' => 'log(selling_price/purchase_price)/log(value_appreciation + 1)', 'selling_price' => 'purchase_price*pow(value_appreciation + 1, holding_period)', 'purchase_price' => 'selling_price*pow(value_appreciation + 1, -holding_period)', 'value_appreciation' => 'pow(selling_price/purchase_price, 1/holding_period) - 1'],
        ],
        [
            'title' => 'cash_flow = gross_income - loan_payment - monthly_costs',
            'results' => ['cash_flow' => 'gross_income - loan_payment - monthly_costs', 'monthly_costs' => '-cash_flow + gross_income - loan_payment', 'gross_income' => 'cash_flow + loan_payment + monthly_costs', 'loan_payment' => '-cash_flow + gross_income - monthly_costs'],
        ],
        [
            'title' => 'cap_rate = (gross_income-monthly_costs)*12 /purchase_price',
            'results' => ['gross_income' => '(1/12)*cap_rate*purchase_price + monthly_costs', 'purchase_price' => '12*(gross_income - monthly_costs)/cap_rate', 'monthly_costs' => '-1/12*cap_rate*purchase_price + gross_income', 'cap_rate' => '12*(gross_income - monthly_costs)/purchase_price'],
        ],
        [
            'title' => 'cash_on_cash_return = cash_flow*12 / down_payment',
            'results' => ['cash_flow' => '(1/12)*cash_on_cash_return*down_payment', 'cash_on_cash_return' => '12*cash_flow/down_payment', 'down_payment' => '12*cash_flow/cash_on_cash_return'],
        ],
        [
            'title' => 'noi = (gross_income-monthly_costs)',
            'results' => ['gross_income' => 'monthly_costs + noi', 'monthly_costs' => 'gross_income - noi', 'noi' => 'gross_income - monthly_costs'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Rental property turns Loan amount, Interest rate and Loan term into Purchase price and Down payment. It is a single relationship that reads purchase price out of loan amount, not a table of canned results keyed by them. Units for Purchase price default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Rental property calculator works', 'html' => <<<'TXT'
            <p>The Rental property calculator applies one relationship to 3 numbers and reports Purchase price, Down payment and Total paid.</p><p>In the form&#039;s own words, Loan payment = Interest rate × Loan amount × (Interest rate + 1)^(Loan term) ÷ ((Interest rate + 1)^(Loan term) − 1).</p><p>The answers are Purchase price, Down payment, Total paid and Rent; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Loan amount</strong> — in USD</li><li><strong>Interest rate</strong> — in interest rate per year</li><li><strong>Loan term</strong> — in years / months</li></ul><p>The result boxes are Purchase price in USD, Down payment in USD, Total paid in USD, Rent in USD, Vacancy rate in percent, Management fee in percent, Property tax in USD, Insurance in USD, Maintenance/repairs in USD, HOA fee in USD, Other costs in USD, Value appreciation in percent, Holding period in years / months, Selling price in USD, Loan payment in USD, Other costs in USD, Gross income in USD, Cash flow in USD, NOI in USD, Cash-on-cash return in percent, Cap rate in percent; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Vacancy rate offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Loan payment</strong> = <code>Interest rate × Loan amount × (Interest rate + 1)^(Loan term) ÷ ((Interest rate + 1)^(Loan term) − 1)</code></li><li><strong>Loan amount</strong> = <code>Loan payment ÷ Interest rate − Loan payment × (Interest rate + 1)^(− Loan term) ÷ Interest rate</code></li><li><strong>Loan term</strong> = <code>ln( − Loan payment ÷ (Interest rate × Loan amount − Loan payment)) ÷ ln(Interest rate + 1)</code></li><li><strong>Total paid</strong> = <code>Loan payment × Loan term</code></li><li><strong>Purchase price</strong> = <code>Down payment + Loan amount</code></li><li><strong>Down payment</strong> = <code>− Loan amount + Purchase price</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Loan payment</strong> = <code>Interest rate × Loan amount × (Interest rate + 1)^(Loan term) ÷ ((Interest rate + 1)^(Loan term) − 1)</code> — the form to use when Interest rate, Loan amount and Loan term are the values you have.</li><li><strong>Loan amount</strong> = <code>Loan payment ÷ Interest rate − Loan payment × (Interest rate + 1)^(− Loan term) ÷ Interest rate</code> — the form to use when Loan payment, Interest rate and Loan term are the values you have.</li><li><strong>Loan term</strong> = <code>ln( − Loan payment ÷ (Interest rate × Loan amount − Loan payment)) ÷ ln(Interest rate + 1)</code> — the form to use when Loan payment, Interest rate and Loan amount are the values you have.</li><li><strong>Total paid</strong> = <code>Loan payment × Loan term</code> — the form to use when Loan payment and Loan term are the values you have.</li><li><strong>Loan term</strong> = <code>Total paid ÷ Loan payment</code> — the form to use when Total paid and Loan payment are the values you have.</li><li><strong>Loan payment</strong> = <code>Total paid ÷ Loan term</code> — the form to use when Total paid and Loan term are the values you have.</li><li><strong>Loan amount</strong> = <code>− Down payment + Purchase price</code> — the form to use when Down payment and Purchase price are the values you have.</li><li><strong>Purchase price</strong> = <code>Down payment + Loan amount</code> — the form to use when Down payment and Loan amount are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Loan payment, Loan amount and Loan term can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Interest rate and Loan term is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Purchase price, Down payment and Total paid are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Loan amount left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Loan amount is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Interest rate left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Interest rate is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Loan amount to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Loan amount</strong> takes a plain number with no unit attached. The page reads it when it works out Loan term, Loan payment and Purchase price. Have it to hand before you start: Loan amount is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Interest rate</strong> is a interest rate per year quantity: the page opens it in percentyear and converts anything else you pick before the formula runs. The page reads it when it works out Loan amount, Loan term and Loan payment. Have it to hand before you start: Interest rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Loan term</strong> is a years / months quantity: the page opens it in yrsmos and converts anything else you pick before the formula runs. The page reads it when it works out Loan amount, Loan payment and Total paid. Have it to hand before you start: Loan term is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Loan amount, Interest rate and Loan term. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Loan amount into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Purchase price in USD with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Purchase price is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The chips cover percent and years / months. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Loan amount, Interest rate and Loan term and the number you are missing is Purchase price and Down payment.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/times-interest-earned-ratio">Times interest earned ratio</a>, <a href="/finance/total-asset-turnover">Total asset turnover Calculator</a> and <a href="/finance/treynor-ratio">Treynor ratio Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Rental property calculator work out?', 'a' => <<<'TXT'
            Purchase price, Down payment, Total paid and Rent, from Interest rate, Loan amount and Loan term. The relationship is Loan payment = Interest rate × Loan amount × (Interest rate + 1)^(Loan term) ÷ ((Interest rate + 1)^(Loan term) − 1).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Loan amount (USD), Interest rate (interest rate per year), Loan term (years / months). Fill loan amount, interest rate and loan term and leave Purchase price empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Loan payment, Loan amount, Loan term and Total paid can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Purchase price is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Loan amount left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Purchase price at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/times-interest-earned-ratio', 'name' => 'Times interest earned ratio'],
            ['path' => '/finance/total-asset-turnover', 'name' => 'Total asset turnover Calculator'],
            ['path' => '/finance/treynor-ratio', 'name' => 'Treynor ratio Calculator'],
        ],
        'authors' => [],
    ],
];
