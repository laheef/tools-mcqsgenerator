<?php

/**
 * Loan payment
 * /finance/loan-payment
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Loan payment',
    'meta' => ['title' => 'Loan payment Calculator — Formula & Results', 'description' => 'Loan payment reports number of installments and periodic interest rate. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Loan payment Calculator', 'updated' => '2026-09-30'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Amount',
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
                            'name' => 'Annual_rate',
                            'label' => 'Annual rate',
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
                            'label' => 'Payment Frequency',
                            'type' => 'select',
                            'options' => [
                                'Yearly' => '1.000000000000000',
                                'Bi-annually' => '2.000000000000000',
                                'Quarterly' => '4.000000000000000',
                                'Monthly' => '12.000000000000000',
                                'Weekly' => '52.177500000000000',
                                'Daily' => '365.242000000000000',
                            ],
                            'control' => 'DROPDOWN',
                            'default' => 'Yearly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'numberOfInstallments',
                            'label' => 'Number of installments',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
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
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Loan_Payment_periodic',
                            'label' => 'Periodic loan payment',
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
                            'name' => 'Loan_Payment_total',
                            'label' => 'Loan payment total',
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
            'title' => <<<'TXT'
            Loan_Payment_periodic = Amount / ((((1 + periodicInterestRate) ^ numberOfInstallments) - 1) / (periodicInterestRate * ((1 + periodicInterestRate) ^ numberOfInstallments)))
            TXT,
            'results' => ['Amount' => 'Loan_Payment_periodic/periodicInterestRate - Loan_Payment_periodic*pow(periodicInterestRate + 1, -numberOfInstallments)/periodicInterestRate', 'Loan_Payment_periodic' => 'Amount*periodicInterestRate*pow(periodicInterestRate + 1, numberOfInstallments)/(pow(periodicInterestRate + 1, numberOfInstallments) - 1)', 'numberOfInstallments' => 'log(-Loan_Payment_periodic/(Amount*periodicInterestRate - Loan_Payment_periodic))/log(periodicInterestRate + 1)'],
        ],
        [
            'title' => 'Loan_Payment_total = Loan_Payment_periodic * numberOfInstallments',
            'results' => ['Loan_Payment_periodic' => 'Loan_Payment_total/numberOfInstallments', 'numberOfInstallments' => 'Loan_Payment_total/Loan_Payment_periodic', 'Loan_Payment_total' => 'Loan_Payment_periodic*numberOfInstallments'],
        ],
        [
            'title' => 'numberOfInstallments = Years * Payments_in_year ',
            'results' => ['Years' => 'numberOfInstallments/Payments_in_year', 'Payments_in_year' => 'numberOfInstallments/Years', 'numberOfInstallments' => 'Payments_in_year*Years'],
        ],
        [
            'title' => 'periodicInterestRate = Annual_rate / Payments_in_year ',
            'results' => ['Payments_in_year' => 'Annual_rate/periodicInterestRate', 'Annual_rate' => 'Payments_in_year*periodicInterestRate', 'periodicInterestRate' => 'Annual_rate/Payments_in_year'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Loan payment turns Loan amount, Number of installments and Periodic interest rate into Annual rate and Loan term. It is a single relationship that reads annual rate out of loan amount, not a table of canned results keyed by them. Units for Annual rate default to percent and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Loan payment calculator works', 'html' => <<<'TXT'
            <p>The Loan payment calculator applies one relationship to 3 numbers and reports Annual rate, Loan term and Payment Frequency.</p><p>The relationship it solves reads Periodic loan payment = Loan amount × Periodic interest rate × (Periodic interest rate + 1)^(Number of installments) ÷ ((Periodic interest rate + 1)^(Number of installments) − 1).</p><p>The answers are Annual rate, Loan term, Payment Frequency and Periodic loan payment; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Loan amount</strong> — in USD</li><li><strong>Number of installments</strong> — a plain number, no unit</li><li><strong>Periodic interest rate</strong> — in percent</li></ul><p>What you get back is Annual rate in percent, Loan term in years / months, Payment Frequency, Periodic loan payment in USD, Loan payment total in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Loan amount = 10 USD, Number of installments = 100 and Periodic interest rate = 1000 perc — through the same formula and the panel reports <strong>Payment Frequency</strong> = 1, <strong>Periodic loan payment</strong> = 10000 USD, <strong>Loan payment total</strong> = 1.000e+6 USD, <strong>Loan term</strong> = 100 yrsmos and <strong>Annual rate</strong> = 1000 perc.</p><ul><li><strong>Payment Frequency</strong> = 1</li><li><strong>Periodic loan payment</strong> = 10000 USD</li><li><strong>Loan payment total</strong> = 1.000e+6 USD</li><li><strong>Loan term</strong> = 100 yrsmos</li><li><strong>Annual rate</strong> = 1000 perc</li></ul><p>The line behind those figures is <strong>Periodic loan payment</strong> = <code>Loan amount × Periodic interest rate × (Periodic interest rate + 1)^(Number of installments) ÷ ((Periodic interest rate + 1)^(Number of installments) − 1)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Payment Frequency</strong> = 1, <strong>Periodic loan payment</strong> = 10000, <strong>Loan payment total</strong> = 1.000e+6, <strong>Loan term</strong> = 100 and <strong>Annual rate</strong> = 1000 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Annual rate offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Periodic loan payment</strong> = <code>Loan amount × Periodic interest rate × (Periodic interest rate + 1)^(Number of installments) ÷ ((Periodic interest rate + 1)^(Number of installments) − 1)</code></li><li><strong>Loan amount</strong> = <code>Periodic loan payment ÷ Periodic interest rate − Periodic loan payment × (Periodic interest rate + 1)^(− Number of installments) ÷ Periodic interest rate</code></li><li><strong>Number of installments</strong> = <code>ln( − Periodic loan payment ÷ (Loan amount × Periodic interest rate − Periodic loan payment)) ÷ ln(Periodic interest rate + 1)</code></li><li><strong>Loan payment total</strong> = <code>Periodic loan payment × Number of installments</code></li><li><strong>Loan term</strong> = <code>Number of installments ÷ Payment Frequency</code></li><li><strong>Payment Frequency</strong> = <code>Number of installments ÷ Loan term</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Periodic loan payment</strong> = <code>Loan amount × Periodic interest rate × (Periodic interest rate + 1)^(Number of installments) ÷ ((Periodic interest rate + 1)^(Number of installments) − 1)</code> — the form to use when Loan amount, Periodic interest rate and Number of installments are the values you have.</li><li><strong>Loan amount</strong> = <code>Periodic loan payment ÷ Periodic interest rate − Periodic loan payment × (Periodic interest rate + 1)^(− Number of installments) ÷ Periodic interest rate</code> — the form to use when Periodic loan payment, Periodic interest rate and Number of installments are the values you have.</li><li><strong>Number of installments</strong> = <code>ln( − Periodic loan payment ÷ (Loan amount × Periodic interest rate − Periodic loan payment)) ÷ ln(Periodic interest rate + 1)</code> — the form to use when Periodic loan payment, Loan amount and Periodic interest rate are the values you have.</li><li><strong>Loan payment total</strong> = <code>Periodic loan payment × Number of installments</code> — the form to use when Periodic loan payment and Number of installments are the values you have.</li><li><strong>Periodic loan payment</strong> = <code>Loan payment total ÷ Number of installments</code> — the form to use when Loan payment total and Number of installments are the values you have.</li><li><strong>Number of installments</strong> = <code>Loan payment total ÷ Periodic loan payment</code> — the form to use when Loan payment total and Periodic loan payment are the values you have.</li><li><strong>Number of installments</strong> = <code>Payment Frequency × Loan term</code> — the form to use when Payment Frequency and Loan term are the values you have.</li><li><strong>Loan term</strong> = <code>Number of installments ÷ Payment Frequency</code> — the form to use when Number of installments and Payment Frequency are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Periodic loan payment, Loan amount and Number of installments can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Loan amount from 10 to 20, leaving every other box alone. The panel moves from <strong>Payment Frequency</strong> 1, <strong>Periodic loan payment</strong> 10000 USD, <strong>Loan payment total</strong> 1.000e+6 USD, <strong>Loan term</strong> 100 yrsmos and <strong>Annual rate</strong> 1000 perc to <strong>Payment Frequency</strong> 1, <strong>Periodic loan payment</strong> 20000 USD, <strong>Loan payment total</strong> 2.000e+6 USD, <strong>Loan term</strong> 100 yrsmos and <strong>Annual rate</strong> 1000 perc.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Periodic interest rate is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Annual rate, Loan term and Payment Frequency are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Loan amount left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Loan amount is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Number of installments left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Number of installments is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Loan amount is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Loan amount</strong> takes a plain number with no unit attached. Change it and Periodic loan payment and Number of installments changes with it. Have it to hand before you start: Loan amount is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Number of installments</strong> takes a plain number with no unit attached. Change it and Loan amount, Periodic loan payment and Loan payment total changes with it. Have it to hand before you start: Number of installments is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Periodic interest rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Change it and Loan amount, Periodic loan payment and Number of installments changes with it. Have it to hand before you start: Periodic interest rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Annual rate</strong> is a percent figure and the page's own defaults put it at 1000 perc. It is computed from Payment Frequency and Periodic interest rate, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Loan term</strong> is a years / months figure and the page's own defaults put it at 100 yrsmos. It is computed from Number of installments and Payment Frequency, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Payment Frequency</strong> is a plain number and the page's own defaults put it at 1. It is computed from Number of installments and Loan term, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Periodic loan payment</strong> is a plain number and the page's own defaults put it at 10000. It is computed from Loan amount, Periodic interest rate and Number of installments, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Loan payment total</strong> is a plain number and the page's own defaults put it at 1.000e+6. It is computed from Periodic loan payment and Number of installments, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Annual rate is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and years / months and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Loan amount, Number of installments and Periodic interest rate are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Loan amount, Number of installments and Periodic interest rate and the number you are missing is Annual rate and Loan term.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/ear">EAR Calculator</a>, <a href="/finance/early-loan-payoff">Early loan payoff Calculator</a> and <a href="/finance/early-retirement">Early retirement</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Loan payment calculator work out?', 'a' => <<<'TXT'
            Annual rate, Loan term, Payment Frequency and Periodic loan payment, from Loan amount, Periodic interest rate and Number of installments. The relationship is Periodic loan payment = Loan amount × Periodic interest rate × (Periodic interest rate + 1)^(Number of installments) ÷ ((Periodic interest rate + 1)^(Number of installments) − 1).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Loan amount (USD), Number of installments, Periodic interest rate (percent). With loan amount, number of installments and periodic interest rate in place, Annual rate can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Periodic loan payment, Loan amount, Number of installments and Loan payment total can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Payment Frequency = 1, Periodic loan payment = 10000 USD, Loan payment total = 1.000e+6 USD, Loan term = 100 yrsmos and Annual rate = 1000 perc. That comes from the page's own defaults, entered in Loan amount; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Annual rate is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Loan amount left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Annual rate keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/ear', 'name' => 'EAR Calculator'],
            ['path' => '/finance/early-loan-payoff', 'name' => 'Early loan payoff Calculator'],
            ['path' => '/finance/early-retirement', 'name' => 'Early retirement'],
        ],
        'authors' => [],
    ],
];
