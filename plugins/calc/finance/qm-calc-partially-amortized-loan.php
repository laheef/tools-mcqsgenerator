<?php

/**
 * Partially amortized loan
 * /finance/partially-amortized-loan
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Partially amortized loan',
    'meta' => ['title' => 'Partially amortized loan — Free Online Calculator', 'description' => 'Enter full loan, annual interest rate and amortization time and Partially amortized loan returns monthly payment and total paid during payment period.', 'h1' => 'Partially amortized loan Calculator', 'updated' => '2026-09-30'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'full_loan',
                            'label' => 'Full loan',
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
                            'name' => 'annual_interest',
                            'label' => 'Annual interest rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'percentyear',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'amortization_time',
                            'label' => 'Amortization time',
                            'type' => 'number',
                            'help' => 'Loan payments are calculated for this amount of time.',
                            'unit' => '19',
                            'unit_default' => 'yrsmos',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'payment_period',
                            'label' => 'Payment period',
                            'type' => 'number',
                            'help' => 'Loan is paid in monthly payments for this amount of time.',
                            'unit' => '19',
                            'unit_default' => 'yrsmos',
                            'rounding' => ['omni', '0.000001'],
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
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_during_period',
                            'label' => 'Total paid during payment period',
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
                            'name' => 'balloon_payment',
                            'label' => 'Balloon payment',
                            'type' => 'number',
                            'help' => 'Additional payment after the payment period.',
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
                            'name' => 'total_after_amortization',
                            'label' => 'Total',
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
            'title' => 'monthly_payment = one_way(annual_interest* full_loan / (1 - pow(1+annual_interest,-amortization_time)))',
            'results' => ['monthly_payment' => '(annual_interest*full_loan*pow(annual_interest + 1, amortization_time)/(pow(annual_interest + 1, amortization_time) - 1))'],
        ],
        [
            'title' => 'total_during_period = one_way(monthly_payment)*payment_period',
            'results' => ['payment_period' => 'total_during_period/((annual_interest*full_loan*pow(annual_interest + 1, amortization_time)/(pow(annual_interest + 1, amortization_time) - 1)))', 'total_during_period' => 'payment_period*((annual_interest*full_loan*pow(annual_interest + 1, amortization_time)/(pow(annual_interest + 1, amortization_time) - 1)))'],
        ],
        [
            'title' => 'total_after_amortization = total_during_period + one_way(balloon_payment)',
            'results' => ['total_after_amortization' => 'total_during_period + (balloon_payment)', 'total_during_period' => 'total_after_amortization - (balloon_payment)'],
        ],
        [
            'title' => 'balloon_payment = full_loan * (1+annual_interest)^payment_period- one_way(monthly_payment)*((1+annual_interest)^payment_period-1)/annual_interest',
            'results' => ['full_loan' => <<<'TXT'
            pow(annual_interest + 1, -payment_period)*(annual_interest*balloon_payment + pow(annual_interest + 1, payment_period)*((annual_interest*full_loan*pow(annual_interest + 1, amortization_time)/(pow(annual_interest + 1, amortization_time) - 1))) - ((annual_interest*full_loan*pow(annual_interest + 1, amortization_time)/(pow(annual_interest + 1, amortization_time) - 1))))/annual_interest
            TXT, 'payment_period' => <<<'TXT'
            log((annual_interest*balloon_payment - ((annual_interest*full_loan*pow(annual_interest + 1, amortization_time)/(pow(annual_interest + 1, amortization_time) - 1))))/(annual_interest*full_loan - ((annual_interest*full_loan*pow(annual_interest + 1, amortization_time)/(pow(annual_interest + 1, amortization_time) - 1)))))/log(annual_interest + 1)
            TXT, 'balloon_payment' => <<<'TXT'
            (annual_interest*full_loan*pow(annual_interest + 1, payment_period) - pow(annual_interest + 1, payment_period)*((annual_interest*full_loan*pow(annual_interest + 1, amortization_time)/(pow(annual_interest + 1, amortization_time) - 1))) + ((annual_interest*full_loan*pow(annual_interest + 1, amortization_time)/(pow(annual_interest + 1, amortization_time) - 1))))/annual_interest
            TXT],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Partially amortized loan turns Full loan, Annual interest rate and Amortization time into Payment period and Monthly payment. It is a single relationship that reads payment period out of full loan, not a table of canned results keyed by them. Units for Payment period default to years / months and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Partially amortized loan calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Partially amortized loan: it takes 3 numbers and reports Payment period, Monthly payment and Total paid during payment period.</p><p>Written with the labels from the form, Monthly payment = (Annual interest rate × Full loan × (Annual interest rate + 1)^(Amortization time) ÷ ((Annual interest rate + 1)^(Amortization time) − 1)).</p><p>What comes back is Payment period, Monthly payment, Total paid during payment period and Balloon payment — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Full loan</strong> — in USD</li><li><strong>Annual interest rate</strong> — in interest rate per year</li><li><strong>Amortization time</strong> — in years / months. Loan payments are calculated for this amount of time.</li></ul><p>The result boxes are Payment period in years / months, Monthly payment in USD, Total paid during payment period in USD, Balloon payment in USD, Total in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Payment period offers 9 units and opens on years / months, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Monthly payment</strong> = <code>(Annual interest rate × Full loan × (Annual interest rate + 1)^(Amortization time) ÷ ((Annual interest rate + 1)^(Amortization time) − 1))</code></li><li><strong>Total paid during payment period</strong> = <code>Payment period × ((Annual interest rate × Full loan × (Annual interest rate + 1)^(Amortization time) ÷ ((Annual interest rate + 1)^(Amortization time) − 1)))</code></li><li><strong>Payment period</strong> = <code>Total paid during payment period ÷ ((Annual interest rate × Full loan × (Annual interest rate + 1)^(Amortization time) ÷ ((Annual interest rate + 1)^(Amortization time) − 1)))</code></li><li><strong>Total</strong> = <code>Total paid during payment period + (Balloon payment)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Monthly payment</strong> = <code>(Annual interest rate × Full loan × (Annual interest rate + 1)^(Amortization time) ÷ ((Annual interest rate + 1)^(Amortization time) − 1))</code> — the form to use when Annual interest rate, Full loan and Amortization time are the values you have.</li><li><strong>Total paid during payment period</strong> = <code>Payment period × ((Annual interest rate × Full loan × (Annual interest rate + 1)^(Amortization time) ÷ ((Annual interest rate + 1)^(Amortization time) − 1)))</code> — the form to use when Payment period, Annual interest rate, Full loan and Amortization time are the values you have.</li><li><strong>Payment period</strong> = <code>Total paid during payment period ÷ ((Annual interest rate × Full loan × (Annual interest rate + 1)^(Amortization time) ÷ ((Annual interest rate + 1)^(Amortization time) − 1)))</code> — the form to use when Total paid during payment period, Annual interest rate, Full loan and Amortization time are the values you have.</li><li><strong>Total</strong> = <code>Total paid during payment period + (Balloon payment)</code> — the form to use when Total paid during payment period and Balloon payment are the values you have.</li><li><strong>Total paid during payment period</strong> = <code>Total − (Balloon payment)</code> — the form to use when Total and Balloon payment are the values you have.</li></ul><p>Any one of Monthly payment, Total paid during payment period and Payment period can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Annual interest rate and Amortization time is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Payment period, Monthly payment and Total paid during payment period are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Full loan left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Full loan is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Annual interest rate left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Annual interest rate is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Full loan is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Partially amortized loan form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Full loan</strong> takes a plain number with no unit attached. The page reads it when it works out Monthly payment, Payment period and Total paid during payment period. Fill it from a measurement rather than a memory — Full loan is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Annual interest rate</strong> is a interest rate per year quantity: the page opens it in percentyear and converts anything else you pick before the formula runs. The page reads it when it works out Monthly payment, Payment period and Total paid during payment period. Fill it from a measurement rather than a memory — Annual interest rate is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Amortization time</strong> is a years / months quantity: the page opens it in yrsmos and converts anything else you pick before the formula runs. Loan payments are calculated for this amount of time. The page reads it when it works out Monthly payment, Payment period and Total paid during payment period. Fill it from a measurement rather than a memory — Amortization time is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 5 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Payment period</strong> is a years / months figure. The value follows from Total paid during payment period, Annual interest rate, Full loan and Amortization time. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Monthly payment</strong> is a plain number. The value follows from Annual interest rate, Full loan and Amortization time. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Total paid during payment period</strong> is a plain number. The value follows from Payment period, Annual interest rate, Full loan and Amortization time. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Balloon payment</strong> is a plain number. The value follows from Annual interest rate, Full loan, Payment period and Amortization time. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Total</strong> is a plain number. The value follows from Total paid during payment period and Balloon payment. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Partially amortized loan actually offers.</p><ul><li><strong>years / months</strong> — opens in <em>yrsmos</em>, and the chip also carries min, hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>interest rate per year</strong> — opens in <em>percentyear</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Payment period is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The chips cover years / months and interest rate per year. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Full loan, Annual interest rate and Amortization time is what you already know and Payment period and Monthly payment is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/loan-repayment">Loan repayment Calculator</a>, <a href="/finance/long-term-care">Long term care</a> and <a href="/finance/lgd">Loss given default Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Partially amortized loan calculator work out?', 'a' => <<<'TXT'
            Payment period, Monthly payment, Total paid during payment period and Balloon payment, from Annual interest rate, Full loan and Amortization time. The relationship is Monthly payment = (Annual interest rate × Full loan × (Annual interest rate + 1)^(Amortization time) ÷ ((Annual interest rate + 1)^(Amortization time) − 1)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Full loan (USD), Annual interest rate (interest rate per year), Amortization time (years / months). Enter full loan, annual interest rate and amortization time; Payment period is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Monthly payment, Total paid during payment period, Payment period and Total blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Payment period is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Full loan blank and the page solves for it, reporting Payment period instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Payment period at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/loan-repayment', 'name' => 'Loan repayment Calculator'],
            ['path' => '/finance/long-term-care', 'name' => 'Long term care'],
            ['path' => '/finance/lgd', 'name' => 'Loss given default Calculator'],
        ],
        'authors' => [],
    ],
];
