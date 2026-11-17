<?php

/**
 * True cost of real estate commission
 * /finance/true-cost-of-real-estate-commission
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'True cost of real estate commission',
    'meta' => ['title' => 'True cost of real estate commission Calculator', 'description' => 'True cost of real estate commission takes property price, down payment and seller\'s commission and returns loan amount and ...of which the commission is.', 'h1' => 'True cost of real estate commission Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => 'Property purchase details',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'home_price',
                            'label' => 'Property price',
                            'type' => 'number',
                            'help' => 'The purchase price of the property.',
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
                            'help' => 'Initial payment towards the purchase of property.',
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
                            'name' => 'sellers_commission',
                            'label' => 'Seller\'s commission',
                            'type' => 'number',
                            'help' => 'We\'re assuming what is usually true: sellers include the cost of the commission in the price of the house, therefore raising the cost to the buyer.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '6',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'buyers_commission',
                            'label' => 'Buyer\'s commission',
                            'type' => 'number',
                            'help' => 'Enter the buyer\'s commission percentage if it\'s separate.',
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
            'title' => 'Mortgage',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'loan_amount',
                            'label' => 'Loan amount',
                            'type' => 'number',
                            'help' => 'Amount needed to cover the house price and buyer\'s commission, minus your down payment.',
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
                            'name' => 'mortgaged_commission',
                            'label' => '...of which the commission is',
                            'type' => 'number',
                            'help' => 'This is the part of your loan that\'s needed to cover the commission.',
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
                                ['when' => 'mortgaged_commission > 0', 'text' => 'This amount shows how much of your loan will be used to cover the commission fees for the property.&nbsp;'],
                                ['when' => 'mortgaged_commission == 0', 'text' => <<<'TXT'
                                Your down payment fully satisfies the financial requirements for both the property purchase and the commission fees. There is no necessity to secure additional financing.&nbsp;
                                TXT],
                                ['when' => 'total_commission > mortgaged_commission and mortgaged_commission > 0', 'text' => <<<'TXT'
                                Your down payment covers the cost of the property and a portion of the commission. Since you didn't need to take out a loan for the entire commission, your total commission costs will only consist of smaller payments.
                                TXT],
                            ],
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
                            'help' => 'The length of time over which you are obliged to pay off your loan.',
                            'unit' => '19',
                            'unit_default' => 'yrsmos',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '360',
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
                            'help' => 'Annual percentage rate on your loan.',
                            'unit' => '37',
                            'unit_default' => 'percentyear',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '7.83',
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
                            'help' => 'Your monthly loan payment amount.',
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
                            'name' => 'monthly_payment_c',
                            'label' => '...of which the commission is',
                            'type' => 'number',
                            'help' => 'This is the part of your monthly payment that\'s needed to cover the commission',
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
                            'name' => 'total_payments',
                            'label' => 'Total payments',
                            'type' => 'number',
                            'help' => 'Total to repay: includes the borrowed amount, interest, and commission.',
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
            'title' => 'Commission cost',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'apparent_commission',
                            'label' => 'Apparent commission',
                            'type' => 'number',
                            'help' => 'The commission amount you think you\'re paying — the buyer\'s commission.',
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
                            'name' => 'total_commission',
                            'label' => 'Commission amount',
                            'type' => 'number',
                            'help' => 'Commission amount included in property\'s price.',
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
                            'name' => 'total_payments_c',
                            'label' => 'Real commission cost',
                            'type' => 'number',
                            'help' => 'Total commission cost when added to loan and paid monthly.',
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
                        As a buyer, it may seem like you only pay {{apparent_commission.monetaryValue}} in commision, but in fact, seller's commission is rolled into the price, so you have to pay {{total_commission.monetaryValue}}. Since you have to borrow the money for it, the total cost ends up being {{total_payments_c.monetaryValue}}!
                        TXT],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'loan_amount = home_price - down_payment + home_price * buyers_commission',
            'results' => ['buyers_commission' => '(down_payment - home_price + loan_amount)/home_price', 'down_payment' => 'buyers_commission*home_price + home_price - loan_amount', 'home_price' => '(down_payment + loan_amount)/(buyers_commission + 1)', 'loan_amount' => 'buyers_commission*home_price - down_payment + home_price'],
        ],
        [
            'title' => 'monthly_payment = one_way(loan_amount / ((((1 + interest_rate) ^ term) - 1) / (interest_rate * ((1 + interest_rate) ^ term))))',
            'results' => ['monthly_payment' => '(interest_rate*loan_amount*pow(interest_rate + 1, term)/(pow(interest_rate + 1, term) - 1))'],
        ],
        [
            'title' => 'monthly_payment_c = one_way(mortgaged_commission / ((((1 + interest_rate) ^ term) - 1) / (interest_rate * ((1 + interest_rate) ^ term))))',
            'results' => ['monthly_payment_c' => <<<'TXT'
            (interest_rate*pow(interest_rate + 1, term)*min(-down_payment + home_price, (home_price*(buyers_commission + sellers_commission)))/(pow(interest_rate + 1, term) - 1))
            TXT],
        ],
        [
            'title' => 'total_payments = one_way(monthly_payment * term)',
            'results' => ['total_payments' => '(term*(interest_rate*loan_amount*pow(interest_rate + 1, term)/(pow(interest_rate + 1, term) - 1)))'],
        ],
        [
            'title' => 'total_payments_c = one_way(monthly_payment_c * term + total_commission - mortgaged_commission)',
            'results' => ['total_payments_c' => <<<'TXT'
            (term*(interest_rate*pow(interest_rate + 1, term)*min(-down_payment + home_price, (home_price*(buyers_commission + sellers_commission)))/(pow(interest_rate + 1, term) - 1)) + (home_price*(buyers_commission + sellers_commission)) - min(-down_payment + home_price, (home_price*(buyers_commission + sellers_commission))))
            TXT],
        ],
        [
            'title' => 'total_commission = one_way((sellers_commission + buyers_commission) * home_price) ',
            'results' => ['total_commission' => '(home_price*(buyers_commission + sellers_commission))'],
        ],
        [
            'title' => 'apparent_commission = one_way(home_price * buyers_commission)',
            'results' => ['apparent_commission' => '(buyers_commission*home_price)'],
        ],
        [
            'title' => 'mortgaged_commission = min(total_commission, home_price - down_payment)',
            'results' => ['mortgaged_commission' => 'min(-down_payment + home_price, (home_price*(buyers_commission + sellers_commission)))'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Enter Property price, Down payment and Buyer's commission into True cost of real estate commission and the answer comes back as Loan amount and ...of which the commission is. Nothing is looked up on this page: loan amount is computed from property price and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Loan amount is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the True cost of real estate commission calculator works', 'html' => <<<'TXT'
            <p>The True cost of real estate commission calculator applies one relationship to 3 numbers and reports Loan amount, ...of which the commission is and Monthly payment.</p><p>Written with the labels from the form, Loan amount = Buyer&#039;s commission × Property price − Down payment + Property price.</p><p>The answers are Loan amount, ...of which the commission is, Monthly payment and ...of which the commission is; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Property price</strong> — in USD. The purchase price of the property.</li><li><strong>Down payment</strong> — in USD. Initial payment towards the purchase of property.</li><li><strong>Buyer&#039;s commission</strong> — in percent. Enter the buyer&#039;s commission percentage if it&#039;s separate.</li></ul><p>What you get back is Loan amount in USD, ...of which the commission is in USD, Monthly payment in USD, ...of which the commission is in USD, Total payments in USD, Apparent commission in USD, Commission amount in USD, Real commission cost in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Seller&#039;s commission lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Loan amount</strong> = <code>Buyer&#039;s commission × Property price − Down payment + Property price</code></li><li><strong>Buyer&#039;s commission</strong> = <code>(Down payment − Property price + Loan amount) ÷ Property price</code></li><li><strong>Down payment</strong> = <code>Buyer&#039;s commission × Property price + Property price − Loan amount</code></li><li><strong>Property price</strong> = <code>(Down payment + Loan amount) ÷ (Buyer&#039;s commission + 1)</code></li><li><strong>Monthly payment</strong> = <code>(Interest rate × Loan amount × (Interest rate + 1)^(Term) ÷ ((Interest rate + 1)^(Term) − 1))</code></li><li><strong>...of which the commission is</strong> = <code>(Interest rate × (Interest rate + 1)^(Term) × min( − Down payment + Property price, (Property price × (Buyer&#039;s commission + Seller&#039;s commission))) ÷ ((Interest rate + 1)^(Term) − 1))</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Loan amount</strong> = <code>Buyer&#039;s commission × Property price − Down payment + Property price</code> — the form to use when Buyer&#039;s commission, Property price and Down payment are the values you have.</li><li><strong>Buyer&#039;s commission</strong> = <code>(Down payment − Property price + Loan amount) ÷ Property price</code> — the form to use when Down payment, Property price and Loan amount are the values you have.</li><li><strong>Down payment</strong> = <code>Buyer&#039;s commission × Property price + Property price − Loan amount</code> — the form to use when Buyer&#039;s commission, Property price and Loan amount are the values you have.</li><li><strong>Property price</strong> = <code>(Down payment + Loan amount) ÷ (Buyer&#039;s commission + 1)</code> — the form to use when Down payment, Loan amount and Buyer&#039;s commission are the values you have.</li><li><strong>Monthly payment</strong> = <code>(Interest rate × Loan amount × (Interest rate + 1)^(Term) ÷ ((Interest rate + 1)^(Term) − 1))</code> — the form to use when Interest rate, Loan amount and Term are the values you have.</li><li><strong>...of which the commission is</strong> = <code>(Interest rate × (Interest rate + 1)^(Term) × min( − Down payment + Property price, (Property price × (Buyer&#039;s commission + Seller&#039;s commission))) ÷ ((Interest rate + 1)^(Term) − 1))</code> — the form to use when Interest rate, Term, Down payment and Property price are the values you have.</li><li><strong>Total payments</strong> = <code>(Term × (Interest rate × Loan amount × (Interest rate + 1)^(Term) ÷ ((Interest rate + 1)^(Term) − 1)))</code> — the form to use when Term, Interest rate and Loan amount are the values you have.</li><li><strong>Commission amount</strong> = <code>(Property price × (Buyer&#039;s commission + Seller&#039;s commission))</code> — the form to use when Property price, Buyer&#039;s commission and Seller&#039;s commission are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Loan amount, Buyer&#039;s commission and Down payment can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Buyer&#039;s commission carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Loan amount, ...of which the commission is and Monthly payment are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Property price left as a guess.</strong> Anything typed into Property price is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Down payment left as a guess.</strong> Anything typed into Down payment is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Property price and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the True cost of real estate commission form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Property price</strong> takes a plain number with no unit attached. The purchase price of the property. Change it and Buyer's commission, Down payment and Loan amount changes with it. Fill it from a measurement rather than a memory — Property price is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Down payment</strong> takes a plain number with no unit attached. Initial payment towards the purchase of property. Change it and Buyer's commission, Property price and Loan amount changes with it. Fill it from a measurement rather than a memory — Down payment is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Buyer&#039;s commission</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Enter the buyer&#039;s commission percentage if it&#039;s separate. Change it and Down payment, Property price and Loan amount changes with it. Fill it from a measurement rather than a memory — Buyer&#039;s commission is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 8 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Loan amount</strong> is a plain number. It is worked out from Buyer's commission, Property price and Down payment. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>...of which the commission is</strong> is a plain number. It is worked out from Down payment, Property price, Buyer's commission and Seller's commission. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Monthly payment</strong> is a plain number. It is worked out from Interest rate, Loan amount and Term. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>...of which the commission is</strong> is a plain number. It is worked out from Interest rate, Term, Down payment and Property price. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Total payments</strong> is a plain number. It is worked out from Term, Interest rate and Loan amount. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Apparent commission</strong> is a plain number. It is worked out from Buyer's commission and Property price. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Commission amount</strong> is a plain number. It is worked out from Property price, Buyer's commission and Seller's commission. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Real commission cost</strong> is a plain number. It is worked out from Term, Interest rate, Down payment and Property price. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on True cost of real estate commission actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Loan amount is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Property price, Down payment and Buyer&#039;s commission measured, Loan amount and ...of which the commission is wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/trump-tariff">Trump tariff Calculator</a>, <a href="/finance/trump-tax">Trump tax Calculator</a> and <a href="/finance/trumps-account">Trump&#039;s account Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the True cost of real estate commission calculator work out?', 'a' => <<<'TXT'
            Loan amount, ...of which the commission is, Monthly payment and ...of which the commission is, from Buyer's commission, Property price and Down payment. The relationship is Loan amount = Buyer's commission × Property price − Down payment + Property price.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Property price (USD), Down payment (USD), Buyer's commission (percent). With property price, down payment and buyer's commission in place, Loan amount can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Loan amount, Buyer's commission, Down payment and Property price can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Loan amount is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Property price blank and the page solves for it, reporting Loan amount instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Loan amount at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/trump-tariff', 'name' => 'Trump tariff Calculator'],
            ['path' => '/finance/trump-tax', 'name' => 'Trump tax Calculator'],
            ['path' => '/finance/trumps-account', 'name' => 'Trump\'s account Calculator'],
        ],
        'authors' => [],
    ],
];
