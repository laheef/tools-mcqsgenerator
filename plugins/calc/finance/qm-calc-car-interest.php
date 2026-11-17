<?php

/**
 * Car interest
 * /finance/car-interest
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Car interest',
    'meta' => ['title' => 'Car interest Calculator — Formula & Results', 'description' => 'Car interest turns price of the car and down payment into loan amount and monthly payment. Every box can be solved for, not only the one in the title.', 'h1' => 'Car interest Calculator', 'updated' => '2026-07-16'],
    'sections' => [
        [
            'title' => 'Calculate the loan amount',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price_of_the_car',
                            'label' => 'Price of the car',
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
                            'name' => 'trade_in_value',
                            'label' => 'Trade-in value',
                            'type' => 'number',
                            'help' => 'The value of your current car if you want to use it toward the purchase of another car.',
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
            'title' => 'Car interest',
            'note' => '',
            'blocks' => [
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
                            'help' => 'This is an annual percentage rate.',
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
                            'name' => 'monthly_payment',
                            'label' => 'Monthly payment',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'readonly' => true,
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_interest_paid',
                            'label' => 'Total interest',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'readonly' => true,
                            'rounding' => ['standard', '2'],
                            'min' => 2,
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
                            'name' => 'down_payment_total',
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
            'title' => 'loan_amount = price_of_the_car - down_payment - trade_in_value',
            'results' => ['down_payment' => '-loan_amount + price_of_the_car - trade_in_value', 'price_of_the_car' => 'down_payment + loan_amount + trade_in_value', 'loan_amount' => '-down_payment + price_of_the_car - trade_in_value', 'trade_in_value' => '-down_payment - loan_amount + price_of_the_car'],
        ],
        [
            'title' => 'monthly_payment = (loan_amount) * (interest_rate / 12) / (1 - (1 + (interest_rate / 12)) ^ (- loan_term))',
            'results' => ['monthly_payment' => '(1/12)*interest_rate*loan_amount*pow(interest_rate + 12, loan_term)/(-pow(12, loan_term) + pow(interest_rate + 12, loan_term))', 'loan_amount' => '12*monthly_payment*(-pow(12, loan_term) + pow(interest_rate + 12, loan_term))*pow(interest_rate + 12, -loan_term)/interest_rate'],
        ],
        [
            'title' => 'total_interest_paid =  monthly_payment * loan_term - loan_amount',
            'results' => ['loan_term' => '(loan_amount + total_interest_paid)/monthly_payment', 'total_interest_paid' => '-loan_amount + loan_term*monthly_payment', 'loan_amount' => 'loan_term*monthly_payment - total_interest_paid', 'monthly_payment' => '(loan_amount + total_interest_paid)/loan_term'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Price of the car, Down payment and Trade-in value into Car interest and the answer comes back as Monthly payment and Total interest. The arithmetic is the whole method: monthly payment is worked out from price of the car by one formula, applied once. Monthly payment comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Car interest calculator works', 'html' => <<<'TXT'
            <p>Car interest answers one question from 6 numbers, and the answer is Monthly payment and Total interest.</p><p>Written with the labels from the form, Loan amount = − Down payment + Price of the car − Trade-in value.</p><p>The result panel carries Monthly payment and Total interest, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 6 boxes and the page has everything it needs.</p><ul><li><strong>Price of the car</strong> — in USD</li><li><strong>Down payment</strong> — in USD</li><li><strong>Trade-in value</strong> — in USD. The value of your current car if you want to use it toward the purchase of another car.</li><li><strong>Loan amount</strong> — in USD</li><li><strong>Interest rate</strong> — in percent. This is an annual percentage rate.</li><li><strong>Loan term</strong> — in years / months</li></ul><p>The result boxes are Monthly payment in USD, Total interest in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Interest rate lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Loan amount</strong> = <code>− Down payment + Price of the car − Trade-in value</code></li><li><strong>Down payment</strong> = <code>− Loan amount + Price of the car − Trade-in value</code></li><li><strong>Price of the car</strong> = <code>Down payment + Loan amount + Trade-in value</code></li><li><strong>Trade-in value</strong> = <code>− Down payment − Loan amount + Price of the car</code></li><li><strong>Monthly payment</strong> = <code>(1 ÷ 12) × Interest rate × Loan amount × (Interest rate + 12)^(Loan term) ÷ ( − (12)^(Loan term) + (Interest rate + 12)^(Loan term))</code></li><li><strong>Total interest</strong> = <code>− Loan amount + Loan term × Monthly payment</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Loan amount</strong> = <code>− Down payment + Price of the car − Trade-in value</code> — the form to use when Down payment, Price of the car and Trade-in value are the values you have.</li><li><strong>Down payment</strong> = <code>− Loan amount + Price of the car − Trade-in value</code> — the form to use when Loan amount, Price of the car and Trade-in value are the values you have.</li><li><strong>Price of the car</strong> = <code>Down payment + Loan amount + Trade-in value</code> — the form to use when Down payment, Loan amount and Trade-in value are the values you have.</li><li><strong>Trade-in value</strong> = <code>− Down payment − Loan amount + Price of the car</code> — the form to use when Down payment, Loan amount and Price of the car are the values you have.</li><li><strong>Monthly payment</strong> = <code>(1 ÷ 12) × Interest rate × Loan amount × (Interest rate + 12)^(Loan term) ÷ ( − (12)^(Loan term) + (Interest rate + 12)^(Loan term))</code> — the form to use when Interest rate, Loan amount and Loan term are the values you have.</li><li><strong>Loan amount</strong> = <code>12 × Monthly payment × ( − (12)^(Loan term) + (Interest rate + 12)^(Loan term)) × (Interest rate + 12)^(− Loan term) ÷ Interest rate</code> — the form to use when Monthly payment, Loan term and Interest rate are the values you have.</li><li><strong>Total interest</strong> = <code>− Loan amount + Loan term × Monthly payment</code> — the form to use when Loan amount, Loan term and Monthly payment are the values you have.</li><li><strong>Loan term</strong> = <code>(Loan amount + Total interest) ÷ Monthly payment</code> — the form to use when Loan amount, Total interest and Monthly payment are the values you have.</li></ul><p>Any one of Loan amount, Down payment and Price of the car can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Interest rate and Loan term carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Monthly payment and Total interest are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Price of the car left as a guess.</strong> Anything typed into Price of the car is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Down payment left as a guess.</strong> Anything typed into Down payment is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Price of the car to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Price of the car</strong> takes a plain number with no unit attached. Change it and Down payment, Loan amount and Trade-in value changes with it. Have it to hand before you start: Price of the car is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Down payment</strong> takes a plain number with no unit attached. Change it and Price of the car, Loan amount and Trade-in value changes with it. Have it to hand before you start: Down payment is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Trade-in value</strong> takes a plain number with no unit attached. The value of your current car if you want to use it toward the purchase of another car. Change it and Down payment, Price of the car and Loan amount changes with it. Have it to hand before you start: Trade-in value is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Loan amount</strong> takes a plain number with no unit attached. Change it and Down payment, Price of the car and Trade-in value changes with it. Have it to hand before you start: Loan amount is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Interest rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. This is an annual percentage rate. Change it and Monthly payment and Loan amount changes with it. Have it to hand before you start: Interest rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Loan term</strong> is a years / months quantity: the page opens it in yrsmos and converts anything else you pick before the formula runs. Change it and Monthly payment, Loan amount and Total interest changes with it. Have it to hand before you start: Loan term is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Monthly payment</strong> is a plain number. It is computed from Interest rate, Loan amount and Loan term, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Total interest</strong> is a plain number. It is computed from Loan amount, Loan term and Monthly payment, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>years / months</strong> — opens in <em>yrsmos</em>, and the chip also carries min, hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Monthly payment is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and years / months and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Price of the car, Down payment and Trade-in value are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Price of the car, Down payment and Trade-in value and the number you are missing is Monthly payment and Total interest.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/jensen-alpha">Jensen&#039;s alpha Calculator</a>, <a href="/finance/jumbo-loan">Jumbo loan Calculator</a> and <a href="/finance/labor-cost">Labor cost Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Car interest calculator work out?', 'a' => <<<'TXT'
            Monthly payment and Total interest, from Down payment, Price of the car and Trade-in value. The relationship is Loan amount = − Down payment + Price of the car − Trade-in value.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Price of the car (USD), Down payment (USD), Trade-in value (USD), Loan amount (USD), Interest rate (percent). Enter price of the car, down payment and trade-in value; Monthly payment is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Loan amount, Down payment, Price of the car and Trade-in value blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Monthly payment is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Price of the car left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Monthly payment at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/jensen-alpha', 'name' => 'Jensen\'s alpha Calculator'],
            ['path' => '/finance/jumbo-loan', 'name' => 'Jumbo loan Calculator'],
            ['path' => '/finance/labor-cost', 'name' => 'Labor cost Calculator'],
        ],
        'authors' => [],
    ],
];
