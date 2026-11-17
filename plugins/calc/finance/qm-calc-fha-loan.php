<?php

/**
 * FHA loan
 * /finance/fha-loan
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'FHA loan',
    'meta' => ['title' => 'FHA loan Calculator: Formula, Steps & Examples', 'description' => 'FHA loan works out your down payment from home price and down payment percentage. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'FHA loan Calculator', 'updated' => '2026-09-14'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'home_price',
                            'label' => 'Home price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '200000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'down_payment_percent',
                            'label' => 'Down payment percentage',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.000001'],
                            'default' => '10',
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
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '30',
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
                            'default' => '3',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'MIP',
                            'label' => 'FHA Annual MIP',
                            'type' => 'number',
                            'help' => 'Use the FHA Annual MIP table to determine the proper MIP for your loan',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.85',
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
                            'name' => 'down_payment',
                            'label' => 'Your down payment',
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
                            'name' => 'loan_amount',
                            'label' => 'FHA base loan amount',
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
                            'name' => 'UFMIP',
                            'label' => 'FHA Upfront MIP',
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
                            'name' => 'Monthly_payment',
                            'label' => 'Monthly mortgage payment',
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
                            'name' => 'monthly_MIP',
                            'label' => 'Monthly MIP',
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
                            'name' => 'Total_FHA_loan_amount',
                            'label' => 'Total FHA loan amount',
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
                            'name' => 'Total_monthly_payment',
                            'label' => 'Total monthly payment',
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
                            'name' => 'Total_cost_of_loan',
                            'label' => 'Total cost of loan',
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
                            'name' => 'periodic_interest_rate',
                            'label' => 'Periodic interest rate',
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
                            'name' => 'number_payments',
                            'label' => 'Number of payments',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'loan_amount = one_way(home_price - down_payment)',
            'results' => ['loan_amount' => '(home_price - (down_payment_percent*home_price))'],
        ],
        [
            'title' => 'down_payment = one_way(down_payment_percent * home_price)',
            'results' => ['down_payment' => '(down_payment_percent*home_price)'],
        ],
        [
            'title' => 'periodic_interest_rate = one_way((1 + interest_rate / 12) -1)',
            'results' => ['periodic_interest_rate' => '((1/12)*interest_rate)'],
        ],
        [
            'title' => <<<'TXT'
            Monthly_payment = one_way((loan_amount * periodic_interest_rate * ((1 + periodic_interest_rate) ^ number_payments) / ((1 + periodic_interest_rate) ^ (number_payments) - 1)))
            TXT,
            'results' => ['Monthly_payment' => <<<'TXT'
            (pow(((1/12)*interest_rate) + 1, (12*loan_term))*((1/12)*interest_rate)*(home_price - (down_payment_percent*home_price))/(pow(((1/12)*interest_rate) + 1, (12*loan_term)) - 1))
            TXT],
        ],
        [
            'title' => 'number_payments = one_way(loan_term * 12)',
            'results' => ['number_payments' => '(12*loan_term)'],
        ],
        [
            'title' => 'UFMIP = one_way(0.0175 * loan_amount)',
            'results' => ['UFMIP' => '((7/400)*(home_price - (down_payment_percent*home_price)))'],
        ],
        [
            'title' => 'monthly_MIP = one_way((MIP * loan_amount) / 12)',
            'results' => ['monthly_MIP' => '((1/12)*MIP*(home_price - (down_payment_percent*home_price)))'],
        ],
        [
            'title' => <<<'TXT'
            Total_monthly_payment = one_way((loan_amount * periodic_interest_rate * ((1 + periodic_interest_rate) ^ number_payments) / ((1 + periodic_interest_rate) ^ (number_payments) - 1)) + monthly_MIP)
            TXT,
            'results' => ['Total_monthly_payment' => <<<'TXT'
            (((pow(((1/12)*interest_rate) + 1, (12*loan_term)) - 1)*((1/12)*MIP*(home_price - (down_payment_percent*home_price))) + pow(((1/12)*interest_rate) + 1, (12*loan_term))*((1/12)*interest_rate)*(home_price - (down_payment_percent*home_price)))/(pow(((1/12)*interest_rate) + 1, (12*loan_term)) - 1))
            TXT],
        ],
        [
            'title' => 'Total_FHA_loan_amount = one_way(loan_amount + UFMIP)',
            'results' => ['Total_FHA_loan_amount' => '((home_price - (down_payment_percent*home_price)) + ((7/400)*(home_price - (down_payment_percent*home_price))))'],
        ],
        [
            'title' => 'Total_cost_of_loan = one_way(Total_monthly_payment * number_payments)',
            'results' => ['Total_cost_of_loan' => <<<'TXT'
            ((12*loan_term)*(((pow(((1/12)*interest_rate) + 1, (12*loan_term)) - 1)*((1/12)*MIP*(home_price - (down_payment_percent*home_price))) + pow(((1/12)*interest_rate) + 1, (12*loan_term))*((1/12)*interest_rate)*(home_price - (down_payment_percent*home_price)))/(pow(((1/12)*interest_rate) + 1, (12*loan_term)) - 1)))
            TXT],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        FHA loan takes Home price and Down payment percentage and returns Your down payment and FHA base loan amount. The arithmetic is the whole method: your down payment is worked out from home price by one formula, applied once. Your down payment comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the FHA loan calculator works', 'html' => <<<'TXT'
            <p>FHA loan answers one question from 2 numbers, and the answer is Your down payment, FHA base loan amount and FHA Upfront MIP.</p><p>In the form&#039;s own words, FHA base loan amount = (Home price − (Down payment percentage × Home price)).</p><p>The result panel carries Your down payment, FHA base loan amount, FHA Upfront MIP and Monthly mortgage payment, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Home price</strong> — in USD</li><li><strong>Down payment percentage</strong> — in percent</li></ul><p>What you get back is Your down payment in USD, FHA base loan amount in USD, FHA Upfront MIP in USD, Monthly mortgage payment in USD, Monthly MIP in USD, Total FHA loan amount in USD, Total monthly payment in USD, Total cost of loan in USD, Periodic interest rate in percent, Number of payments, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Home price = 200000 USD, Down payment percentage = 10 perc, Loan term = 30 yrs, Interest rate = 3 perc and FHA Annual MIP = 0.85 perc — through the same formula and the panel reports <strong>FHA base loan amount</strong> = -1.800e+6 USD, <strong>Your down payment</strong> = 2.000e+6 USD, <strong>Periodic interest rate</strong> = 0.25 perc, <strong>Monthly mortgage payment</strong> = -1.768e+11 USD, <strong>Number of payments</strong> = 1.141e-5, <strong>FHA Upfront MIP</strong> = -31500 USD, <strong>Monthly MIP</strong> = -127500 USD, <strong>Total monthly payment</strong> = -1.768e+11 USD, <strong>Total FHA loan amount</strong> = -1.832e+6 USD and <strong>Total cost of loan</strong> = -2.017e+6 USD.</p><ul><li><strong>FHA base loan amount</strong> = -1.800e+6 USD</li><li><strong>Your down payment</strong> = 2.000e+6 USD</li><li><strong>Periodic interest rate</strong> = 0.25 perc</li><li><strong>Monthly mortgage payment</strong> = -1.768e+11 USD</li><li><strong>Number of payments</strong> = 1.141e-5</li><li><strong>FHA Upfront MIP</strong> = -31500 USD</li><li><strong>Monthly MIP</strong> = -127500 USD</li><li><strong>Total monthly payment</strong> = -1.768e+11 USD</li><li><strong>Total FHA loan amount</strong> = -1.832e+6 USD</li><li><strong>Total cost of loan</strong> = -2.017e+6 USD</li></ul><p>The line behind those figures is <strong>FHA base loan amount</strong> = <code>(Home price − (Down payment percentage × Home price))</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>FHA base loan amount</strong> = -1.800e+6, <strong>Your down payment</strong> = 2.000e+6, <strong>Periodic interest rate</strong> = 0.25, <strong>Monthly mortgage payment</strong> = -1.768e+11, <strong>Number of payments</strong> = 1.141e-5, <strong>FHA Upfront MIP</strong> = -31500, <strong>Monthly MIP</strong> = -127500, <strong>Total monthly payment</strong> = -1.768e+11, <strong>Total FHA loan amount</strong> = -1.832e+6 and <strong>Total cost of loan</strong> = -2.017e+6 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Periodic interest rate offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>FHA base loan amount</strong> = <code>(Home price − (Down payment percentage × Home price))</code></li><li><strong>Your down payment</strong> = <code>(Down payment percentage × Home price)</code></li><li><strong>Periodic interest rate</strong> = <code>((1 ÷ 12) × Interest rate)</code></li><li><strong>Monthly mortgage payment</strong> = <code>((((1 ÷ 12) × Interest rate) + 1)^((12 × Loan term)) × ((1 ÷ 12) × Interest rate) × (Home price − (Down payment percentage × Home price)) ÷ ((((1 ÷ 12) × Interest rate) + 1)^((12 × Loan term)) − 1))</code></li><li><strong>Number of payments</strong> = <code>(12 × Loan term)</code></li><li><strong>FHA Upfront MIP</strong> = <code>((7 ÷ 400) × (Home price − (Down payment percentage × Home price)))</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>FHA base loan amount</strong> = <code>(Home price − (Down payment percentage × Home price))</code> — the form to use when Home price and Down payment percentage are the values you have.</li><li><strong>Your down payment</strong> = <code>(Down payment percentage × Home price)</code> — the form to use when Down payment percentage and Home price are the values you have.</li><li><strong>Periodic interest rate</strong> = <code>((1 ÷ 12) × Interest rate)</code> — the form to use when Interest rate are the values you have.</li><li><strong>Monthly mortgage payment</strong> = <code>((((1 ÷ 12) × Interest rate) + 1)^((12 × Loan term)) × ((1 ÷ 12) × Interest rate) × (Home price − (Down payment percentage × Home price)) ÷ ((((1 ÷ 12) × Interest rate) + 1)^((12 × Loan term)) − 1))</code> — the form to use when Interest rate, Loan term, Home price and Down payment percentage are the values you have.</li><li><strong>Number of payments</strong> = <code>(12 × Loan term)</code> — the form to use when Loan term are the values you have.</li><li><strong>FHA Upfront MIP</strong> = <code>((7 ÷ 400) × (Home price − (Down payment percentage × Home price)))</code> — the form to use when Home price and Down payment percentage are the values you have.</li><li><strong>Monthly MIP</strong> = <code>((1 ÷ 12) × FHA Annual MIP × (Home price − (Down payment percentage × Home price)))</code> — the form to use when FHA Annual MIP, Home price and Down payment percentage are the values you have.</li><li><strong>Total FHA loan amount</strong> = <code>((Home price − (Down payment percentage × Home price)) + ((7 ÷ 400) × (Home price − (Down payment percentage × Home price))))</code> — the form to use when Home price and Down payment percentage are the values you have.</li></ul><p>Any one of FHA base loan amount, Your down payment and Periodic interest rate can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Home price, from 200000 to 400000 — and the answers go from <strong>FHA base loan amount</strong> -1.800e+6 USD, <strong>Your down payment</strong> 2.000e+6 USD, <strong>Periodic interest rate</strong> 0.25 perc, <strong>Monthly mortgage payment</strong> -1.768e+11 USD, <strong>Number of payments</strong> 1.141e-5, <strong>FHA Upfront MIP</strong> -31500 USD, <strong>Monthly MIP</strong> -127500 USD, <strong>Total monthly payment</strong> -1.768e+11 USD, <strong>Total FHA loan amount</strong> -1.832e+6 USD and <strong>Total cost of loan</strong> -2.017e+6 USD to <strong>FHA base loan amount</strong> -3.600e+6 USD, <strong>Your down payment</strong> 4.000e+6 USD, <strong>Periodic interest rate</strong> 0.25 perc, <strong>Monthly mortgage payment</strong> -3.536e+11 USD, <strong>Number of payments</strong> 1.141e-5, <strong>FHA Upfront MIP</strong> -63000 USD, <strong>Monthly MIP</strong> -255000 USD, <strong>Total monthly payment</strong> -3.536e+11 USD, <strong>Total FHA loan amount</strong> -3.663e+6 USD and <strong>Total cost of loan</strong> -4.033e+6 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Down payment percentage is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Your down payment, FHA base loan amount and FHA Upfront MIP are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Home price left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Home price is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Down payment percentage left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Down payment percentage is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Home price to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Home price</strong> takes a plain number with no unit attached. It feeds FHA base loan amount, Your down payment and Monthly mortgage payment. Have it to hand before you start: Home price is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Down payment percentage</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds FHA base loan amount, Your down payment and Monthly mortgage payment. Have it to hand before you start: Down payment percentage is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Your down payment is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Home price and Down payment percentage are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Home price and Down payment percentage is what you already know and Your down payment and FHA base loan amount is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/3x-rent">3x rent Calculator</a>, <a href="/finance/401k">401(k) Calculator</a> and <a href="/finance/403b">403b Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the FHA loan calculator work out?', 'a' => <<<'TXT'
            Your down payment, FHA base loan amount, FHA Upfront MIP and Monthly mortgage payment, from Home price and Down payment percentage. The relationship is FHA base loan amount = (Home price − (Down payment percentage × Home price)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Home price (USD), Down payment percentage (percent). Fill home price and down payment percentage and leave Your down payment empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of FHA base loan amount, Your down payment, Periodic interest rate and Monthly mortgage payment blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            FHA base loan amount = -1.800e+6 USD, Your down payment = 2.000e+6 USD, Periodic interest rate = 0.25 perc, Monthly mortgage payment = -1.768e+11 USD, Number of payments = 1.141e-5, FHA Upfront MIP = -31500 USD, Monthly MIP = -127500 USD, Total monthly payment = -1.768e+11 USD, Total FHA loan amount = -1.832e+6 USD and Total cost of loan = -2.017e+6 USD. Those are the defaults written into the form — move Home price and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Your down payment is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Home price left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Your down payment keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/3x-rent', 'name' => '3x rent Calculator'],
            ['path' => '/finance/401k', 'name' => '401(k) Calculator'],
            ['path' => '/finance/403b', 'name' => '403b Calculator'],
        ],
        'authors' => [],
    ],
];
