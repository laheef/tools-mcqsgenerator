<?php

/**
 * Land loan
 * /finance/land-loan-payment
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Land loan',
    'meta' => ['title' => 'Land loan Calculator: Formula, Steps & Examples', 'description' => 'Land loan works out down payment percentage and loan value from land value and down payment. Results come back in perc, with any other unit a click away.', 'h1' => 'Land loan Calculator', 'updated' => '2026-10-01'],
    'sections' => [
        [
            'title' => 'Loan details',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Land_value',
                            'label' => 'Land value',
                            'type' => 'number',
                            'help' => 'The purchase price of the land.',
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
                            'name' => 'Down_payment_percentage',
                            'label' => 'Down payment percentage',
                            'type' => 'number',
                            'help' => 'The higher the downpayment required means the financial entity consider the operation more risky',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Down_payment',
                            'label' => 'Down payment',
                            'type' => 'number',
                            'help' => 'Cash required by financing entity as a requirement for the land loan.',
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
                            'name' => 'Amount',
                            'label' => 'Loan value',
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
                            'name' => 'Annual_rate',
                            'label' => 'Annual interest rate',
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
                            'name' => 'Years',
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
                            'name' => 'Payments_in_year',
                            'label' => 'Payment frequency',
                            'type' => 'select',
                            'options' => [
                                'Yearly' => '1',
                                'Bi-annually' => '2',
                                'Quarterly' => '4',
                                'Monthly' => '12',
                                'Weekly' => '52.1775',
                                'Daily' => '365.242',
                            ],
                            'dataset' => 'Payment Frequency',
                            'control' => 'DROPDOWN',
                            'default' => 'Monthly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'numberOfPayments',
                            'label' => 'Number of payments',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
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
                            'name' => 'Loan_Payment_periodic',
                            'label' => 'Periodic loan payment',
                            'type' => 'number',
                            'help' => 'Accordingly to the payment frequency you chose, this will be the money that you will have to pay periodically.',
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
                            'name' => 'Loan_Payment_total',
                            'label' => 'Total loan payment',
                            'type' => 'number',
                            'help' => 'Total amount of money that you will end paying at the end of the loan term without including the Down payment.',
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
                            'name' => 'Total_interest_payed',
                            'label' => 'Total interest paid',
                            'type' => 'number',
                            'help' => 'This is the total amount of money you will pay only in interests.',
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
                            'name' => 'periodicInterestRate',
                            'label' => 'Periodic interest rate',
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
            'title' => <<<'TXT'
            Loan_Payment_periodic = Amount / ((((1 + periodicInterestRate) ^ numberOfPayments) - 1) / (periodicInterestRate * ((1 + periodicInterestRate) ^ numberOfPayments)))
            TXT,
            'results' => ['Loan_Payment_periodic' => 'Amount*periodicInterestRate*pow(periodicInterestRate + 1, numberOfPayments)/(pow(periodicInterestRate + 1, numberOfPayments) - 1)', 'numberOfPayments' => 'log(-Loan_Payment_periodic/(Amount*periodicInterestRate - Loan_Payment_periodic))/log(periodicInterestRate + 1)', 'Amount' => 'Loan_Payment_periodic/periodicInterestRate - Loan_Payment_periodic*pow(periodicInterestRate + 1, -numberOfPayments)/periodicInterestRate'],
        ],
        [
            'title' => 'Loan_Payment_total = Loan_Payment_periodic * numberOfPayments',
            'results' => ['Loan_Payment_total' => 'Loan_Payment_periodic*numberOfPayments', 'Loan_Payment_periodic' => 'Loan_Payment_total/numberOfPayments', 'numberOfPayments' => 'Loan_Payment_total/Loan_Payment_periodic'],
        ],
        [
            'title' => 'numberOfPayments = Years * Payments_in_year ',
            'results' => ['Years' => 'numberOfPayments/Payments_in_year', 'Payments_in_year' => 'numberOfPayments/Years', 'numberOfPayments' => 'Payments_in_year*Years'],
        ],
        [
            'title' => 'periodicInterestRate = Annual_rate / Payments_in_year ',
            'results' => ['Annual_rate' => 'Payments_in_year*periodicInterestRate', 'Payments_in_year' => 'Annual_rate/periodicInterestRate', 'periodicInterestRate' => 'Annual_rate/Payments_in_year'],
        ],
        [
            'title' => 'Amount= Land_value - Down_payment',
            'results' => ['Land_value' => 'Amount + Down_payment', 'Down_payment' => '-Amount + Land_value', 'Amount' => '-Down_payment + Land_value'],
        ],
        [
            'title' => 'Down_payment_percentage= Down_payment /  Land_value',
            'results' => ['Down_payment' => 'Down_payment_percentage*Land_value', 'Down_payment_percentage' => 'Down_payment/Land_value', 'Land_value' => 'Down_payment/Down_payment_percentage'],
        ],
        [
            'title' => 'Total_interest_payed= Loan_Payment_total -Amount',
            'results' => ['Total_interest_payed' => '-Amount + Loan_Payment_total', 'Loan_Payment_total' => 'Amount + Total_interest_payed', 'Amount' => 'Loan_Payment_total - Total_interest_payed'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Land loan takes Loan value, Number of payments and Periodic interest rate and returns Land value and Down payment percentage. Nothing is looked up on this page: land value is computed from loan value and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Land value is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Land loan calculator works', 'html' => <<<'TXT'
            <p>Land loan answers one question from 3 numbers, and the answer is Land value, Down payment percentage and Down payment.</p><p>The relationship it solves reads Periodic loan payment = Loan value × Periodic interest rate × (Periodic interest rate + 1)^(Number of payments) ÷ ((Periodic interest rate + 1)^(Number of payments) − 1).</p><p>The answers are Land value, Down payment percentage, Down payment and Annual interest rate; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Loan value</strong> — in USD</li><li><strong>Number of payments</strong> — a plain number, no unit</li><li><strong>Periodic interest rate</strong> — in percent</li></ul><p>The result boxes are Land value in USD, Down payment percentage in percent, Down payment in USD, Annual interest rate in percent, Loan term in years / months, Payment frequency, Periodic loan payment in USD, Total loan payment in USD, Total interest paid in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Land value = 10 USD, Down payment percentage = 10 perc, Down payment = 1000 USD, Loan value = 10 USD, Annual interest rate = 100 perc, Loan term = 1000 yrsmos, Payment frequency = 12, Number of payments = 10, Total loan payment = 100 USD, Total interest paid = 1000 USD and Periodic interest rate = 10 perc gives <strong>Periodic loan payment</strong> = 100 USD.</p><ul><li><strong>Periodic loan payment</strong> = 100 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Periodic loan payment</strong> = <code>Loan value × Periodic interest rate × (Periodic interest rate + 1)^(Number of payments) ÷ ((Periodic interest rate + 1)^(Number of payments) − 1)</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Periodic loan payment</strong> = 100 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Down payment percentage offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Periodic loan payment</strong> = <code>Loan value × Periodic interest rate × (Periodic interest rate + 1)^(Number of payments) ÷ ((Periodic interest rate + 1)^(Number of payments) − 1)</code></li><li><strong>Number of payments</strong> = <code>ln( − Periodic loan payment ÷ (Loan value × Periodic interest rate − Periodic loan payment)) ÷ ln(Periodic interest rate + 1)</code></li><li><strong>Loan value</strong> = <code>Periodic loan payment ÷ Periodic interest rate − Periodic loan payment × (Periodic interest rate + 1)^(− Number of payments) ÷ Periodic interest rate</code></li><li><strong>Total loan payment</strong> = <code>Periodic loan payment × Number of payments</code></li><li><strong>Loan term</strong> = <code>Number of payments ÷ Payment frequency</code></li><li><strong>Payment frequency</strong> = <code>Number of payments ÷ Loan term</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Periodic loan payment</strong> = <code>Loan value × Periodic interest rate × (Periodic interest rate + 1)^(Number of payments) ÷ ((Periodic interest rate + 1)^(Number of payments) − 1)</code> — the form to use when Loan value, Periodic interest rate and Number of payments are the values you have.</li><li><strong>Number of payments</strong> = <code>ln( − Periodic loan payment ÷ (Loan value × Periodic interest rate − Periodic loan payment)) ÷ ln(Periodic interest rate + 1)</code> — the form to use when Periodic loan payment, Loan value and Periodic interest rate are the values you have.</li><li><strong>Loan value</strong> = <code>Periodic loan payment ÷ Periodic interest rate − Periodic loan payment × (Periodic interest rate + 1)^(− Number of payments) ÷ Periodic interest rate</code> — the form to use when Periodic loan payment, Periodic interest rate and Number of payments are the values you have.</li><li><strong>Total loan payment</strong> = <code>Periodic loan payment × Number of payments</code> — the form to use when Periodic loan payment and Number of payments are the values you have.</li><li><strong>Periodic loan payment</strong> = <code>Total loan payment ÷ Number of payments</code> — the form to use when Total loan payment and Number of payments are the values you have.</li><li><strong>Number of payments</strong> = <code>Total loan payment ÷ Periodic loan payment</code> — the form to use when Total loan payment and Periodic loan payment are the values you have.</li><li><strong>Number of payments</strong> = <code>Payment frequency × Loan term</code> — the form to use when Payment frequency and Loan term are the values you have.</li><li><strong>Loan term</strong> = <code>Number of payments ÷ Payment frequency</code> — the form to use when Number of payments and Payment frequency are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Periodic loan payment, Number of payments and Loan value can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Land value, from 10 to 20 — and the answers go from <strong>Periodic loan payment</strong> 100 USD to <strong>Periodic loan payment</strong> 100 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Periodic interest rate is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Land value, Down payment percentage and Down payment are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Loan value left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Loan value is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Number of payments left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Number of payments is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Loan value is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Land loan form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Loan value</strong> takes a plain number with no unit attached. The page reads it when it works out Periodic loan payment, Number of payments and Land value. Fill it from a measurement rather than a memory — Loan value is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Number of payments</strong> takes a plain number with no unit attached. The page reads it when it works out Periodic loan payment, Loan value and Total loan payment. Fill it from a measurement rather than a memory — Number of payments is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Periodic interest rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The page reads it when it works out Periodic loan payment, Number of payments and Loan value. Fill it from a measurement rather than a memory — Periodic interest rate is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Loan value, Number of payments and Periodic interest rate ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Loan value — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Land value in USD against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Land value is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The chips cover percent and years / months. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Loan value, Number of payments and Periodic interest rate and the number you are missing is Land value and Down payment percentage.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/income-tax-pakistan">Income tax - Pakistan</a>, <a href="/finance/income-tax-australia">Income tax Australia Calculator</a> and <a href="/finance/income-tax-philippines">Income tax Philippines Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Land loan calculator work out?', 'a' => <<<'TXT'
            Land value, Down payment percentage, Down payment and Annual interest rate, from Loan value, Periodic interest rate and Number of payments. The relationship is Periodic loan payment = Loan value × Periodic interest rate × (Periodic interest rate + 1)^(Number of payments) ÷ ((Periodic interest rate + 1)^(Number of payments) − 1).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Loan value (USD), Number of payments, Periodic interest rate (percent). Fill loan value, number of payments and periodic interest rate and leave Land value empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Periodic loan payment, Number of payments, Loan value and Total loan payment can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Periodic loan payment = 100 USD. Those are the defaults written into the form — move Loan value and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Land value is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Loan value blank and the page solves for it, reporting Land value instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Land value keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/income-tax-pakistan', 'name' => 'Income tax - Pakistan'],
            ['path' => '/finance/income-tax-australia', 'name' => 'Income tax Australia Calculator'],
            ['path' => '/finance/income-tax-philippines', 'name' => 'Income tax Philippines Calculator'],
        ],
        'authors' => [],
    ],
];
