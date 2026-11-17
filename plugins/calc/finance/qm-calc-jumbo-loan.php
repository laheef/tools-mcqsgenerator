<?php

/**
 * Jumbo loan
 * /finance/jumbo-loan
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Jumbo loan',
    'meta' => ['title' => 'Jumbo loan Calculator: Formula, Steps & Examples', 'description' => 'Jumbo loan works out down payment percentage and monthly payment from property price and down payment. The formula is printed in the form\'s own words.', 'h1' => 'Jumbo loan Calculator', 'updated' => '2026-09-14'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'property_price',
                            'label' => 'Property price',
                            'type' => 'number',
                            'help' => 'Enter the price of the property you want to take a loan for.',
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
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'down_payment_percentage',
                            'label' => 'Down payment percentage',
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
                            'name' => 'loan_amount',
                            'label' => 'Jumbo loan amount',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            Remember that a loan becomes a jumbo loan once it exceeds a certain amount set by Fannie Mae and Freddie Mac each year. In 2025, this amount usually is $806,500, so any loan below that wouldn't qualify as a jumbo loan.
                            TXT,
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
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'loan_amount > 806500', 'text' => 'This is considered a jumbo loan in most counties, given the 2025 limit of $806,500.'],
                                ['when' => 'loan_amount > 1209750', 'text' => 'This is considered a jumbo loan in all counties, as it exceeds the highest limit of $1,209,750.'],
                            ],
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
                            'name' => 'interest_rate',
                            'label' => 'Interest rate',
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
                        ['name' => 'first_day', 'label' => 'First day', 'type' => 'date', 'help' => 'Enter the date of your first payment'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'monthly_payment',
                            'label' => 'Monthly payment',
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
                        ['type' => 'note', 'text' => <<<'TXT'
                        If you take out a loan of {{loan_amount.monetaryValue}} for {{loan_term.formattedValue}} month(s), with your first payment on {{first_day.shortValue}}, you’ll finish repaying it by {{end_day.shortValue}}, and Over the course of the loan, you’ll pay a total of {{total_paid.monetaryValue}}, which includes {{total_interest_paid.monetaryValue}} in interest — that’s {{total_interest_paid_percentage.for
                        TXT],
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
                            'name' => 'total_interest_paid',
                            'label' => 'Total interest paid',
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
                            'name' => 'total_interest_paid_percentage',
                            'label' => 'Total interest paid percentage',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_paid',
                            'label' => 'Total debt to repay',
                            'type' => 'number',
                            'help' => 'The amount you need to repay to the lender.',
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
                        ['name' => 'end_day', 'label' => 'End day', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_interest_paid_rounded',
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
                            'name' => 'down_payment_rounded',
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
                            'name' => 'loan_amount_rounded',
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
            'title' => 'loan_amount = property_price-down_payment',
            'results' => ['property_price' => 'down_payment + loan_amount', 'down_payment' => '-loan_amount + property_price', 'loan_amount' => '-down_payment + property_price'],
        ],
        [
            'title' => 'down_payment_percentage=down_payment/property_price',
            'results' => ['property_price' => 'down_payment/down_payment_percentage', 'down_payment' => 'down_payment_percentage*property_price', 'down_payment_percentage' => 'down_payment/property_price'],
        ],
        [
            'title' => 'monthly_payment = (loan_amount) * (interest_rate / 12) / (1 - (1 + (interest_rate / 12)) ^ (- loan_term))',
            'results' => ['monthly_payment' => '(1/12)*interest_rate*loan_amount*pow(interest_rate + 12, loan_term)/(-pow(12, loan_term) + pow(interest_rate + 12, loan_term))', 'loan_amount' => '12*monthly_payment*(-pow(12, loan_term) + pow(interest_rate + 12, loan_term))*pow(interest_rate + 12, -loan_term)/interest_rate'],
        ],
        [
            'title' => 'total_interest_paid =  monthly_payment * loan_term - loan_amount',
            'results' => ['monthly_payment' => '(loan_amount + total_interest_paid)/loan_term', 'total_interest_paid' => '-loan_amount + loan_term*monthly_payment', 'loan_amount' => 'loan_term*monthly_payment - total_interest_paid', 'loan_term' => '(loan_amount + total_interest_paid)/monthly_payment'],
        ],
        [
            'title' => 'total_paid = monthly_payment*loan_term',
            'results' => ['monthly_payment' => 'total_paid/loan_term', 'total_paid' => 'loan_term*monthly_payment', 'loan_term' => 'total_paid/monthly_payment'],
        ],
        [
            'title' => 'first_day+loan_term=end_day',
            'results' => ['first_day' => 'end_day - loan_term', 'end_day' => 'first_day + loan_term', 'loan_term' => 'end_day - first_day'],
        ],
        [
            'title' => 'total_interest_paid_percentage=total_interest_paid/loan_amount',
            'results' => ['total_interest_paid' => 'loan_amount*total_interest_paid_percentage', 'loan_amount' => 'total_interest_paid/total_interest_paid_percentage', 'total_interest_paid_percentage' => 'total_interest_paid/loan_amount'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Property price and Down payment into Jumbo loan and the answer comes back as Down payment percentage and Jumbo loan amount. It is a single relationship that reads down payment percentage out of property price, not a table of canned results keyed by them. Units for Down payment percentage default to percent and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Jumbo loan calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Jumbo loan: it takes 2 numbers and reports Down payment percentage, Jumbo loan amount and Loan term.</p><p>In the form&#039;s own words, Jumbo loan amount = − Down payment + Property price.</p><p>The answers are Down payment percentage, Jumbo loan amount, Loan term and First day; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Property price</strong> — in USD. Enter the price of the property you want to take a loan for.</li><li><strong>Down payment</strong> — in USD</li></ul><p>The answers come back as Down payment percentage in percent, Jumbo loan amount in USD, Loan term in years / months, First day, Monthly payment in USD, Total interest paid in USD, Total interest paid percentage in percent, Total debt to repay in USD, End day. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Down payment percentage lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Jumbo loan amount</strong> = <code>− Down payment + Property price</code></li><li><strong>Property price</strong> = <code>Down payment + Jumbo loan amount</code></li><li><strong>Down payment</strong> = <code>− Jumbo loan amount + Property price</code></li><li><strong>Down payment percentage</strong> = <code>Down payment ÷ Property price</code></li><li><strong>Monthly payment</strong> = <code>(1 ÷ 12) × Interest rate × Jumbo loan amount × (Interest rate + 12)^(Loan term) ÷ ( − (12)^(Loan term) + (Interest rate + 12)^(Loan term))</code></li><li><strong>Total interest paid</strong> = <code>− Jumbo loan amount + Loan term × Monthly payment</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Jumbo loan amount</strong> = <code>− Down payment + Property price</code> — the form to use when Down payment and Property price are the values you have.</li><li><strong>Property price</strong> = <code>Down payment + Jumbo loan amount</code> — the form to use when Down payment and Jumbo loan amount are the values you have.</li><li><strong>Down payment</strong> = <code>− Jumbo loan amount + Property price</code> — the form to use when Jumbo loan amount and Property price are the values you have.</li><li><strong>Down payment percentage</strong> = <code>Down payment ÷ Property price</code> — the form to use when Down payment and Property price are the values you have.</li><li><strong>Property price</strong> = <code>Down payment ÷ Down payment percentage</code> — the form to use when Down payment and Down payment percentage are the values you have.</li><li><strong>Down payment</strong> = <code>Down payment percentage × Property price</code> — the form to use when Down payment percentage and Property price are the values you have.</li><li><strong>Monthly payment</strong> = <code>(1 ÷ 12) × Interest rate × Jumbo loan amount × (Interest rate + 12)^(Loan term) ÷ ( − (12)^(Loan term) + (Interest rate + 12)^(Loan term))</code> — the form to use when Interest rate, Jumbo loan amount and Loan term are the values you have.</li><li><strong>Jumbo loan amount</strong> = <code>12 × Monthly payment × ( − (12)^(Loan term) + (Interest rate + 12)^(Loan term)) × (Interest rate + 12)^(− Loan term) ÷ Interest rate</code> — the form to use when Monthly payment, Loan term and Interest rate are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Jumbo loan amount, Property price and Down payment can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Down payment percentage, Jumbo loan amount and Loan term are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Property price left as a guess.</strong> Anything typed into Property price is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Down payment left as a guess.</strong> Anything typed into Down payment is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Property price to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Property price</strong> takes a plain number with no unit attached. Enter the price of the property you want to take a loan for. Change it and Down payment, Jumbo loan amount and Down payment percentage changes with it. Have it to hand before you start: Property price is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Down payment</strong> takes a plain number with no unit attached. Change it and Property price, Jumbo loan amount and Down payment percentage changes with it. Have it to hand before you start: Down payment is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Down payment percentage</strong> is a percent figure. It is computed from Down payment and Property price, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Jumbo loan amount</strong> is a plain number. It is computed from Down payment and Property price, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Loan term</strong> is a years / months figure. It is computed from Jumbo loan amount, Total interest paid and Monthly payment, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>First day</strong> is a plain number. It is computed from End day and Loan term, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Monthly payment</strong> is a plain number. It is computed from Interest rate, Jumbo loan amount and Loan term, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Total interest paid</strong> is a plain number. It is computed from Jumbo loan amount, Loan term and Monthly payment, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Total interest paid percentage</strong> is a percent figure. It is computed from Total interest paid and Jumbo loan amount, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Total debt to repay</strong> is a plain number. It is computed from Loan term and Monthly payment, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>End day</strong> is a plain number. It is computed from First day and Loan term, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>years / months</strong> — opens in <em>yrsmos</em>, and the chip also carries min, hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Down payment percentage is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and years / months and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It counts in whole days.</strong> Dates are compared as calendar days, not as moments: two dates that differ by a few hours on the same day give the same answer, and there is no time-of-day input to set.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Property price and Down payment are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Property price and Down payment measured, Down payment percentage and Jumbo loan amount wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/dream-come-true">Dream come true Calculator</a>, <a href="/finance/dupont-analysis">DuPont analysis Calculator</a> and <a href="/finance/ear">EAR Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Jumbo loan calculator work out?', 'a' => <<<'TXT'
            Down payment percentage, Jumbo loan amount, Loan term and First day, from Down payment and Property price. The relationship is Jumbo loan amount = − Down payment + Property price.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Property price (USD), Down payment (USD). With property price and down payment in place, Down payment percentage can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Jumbo loan amount, Property price, Down payment and Down payment percentage can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Down payment percentage is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Property price left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Down payment percentage at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/dream-come-true', 'name' => 'Dream come true Calculator'],
            ['path' => '/finance/dupont-analysis', 'name' => 'DuPont analysis Calculator'],
            ['path' => '/finance/ear', 'name' => 'EAR Calculator'],
        ],
        'authors' => [],
    ],
];
