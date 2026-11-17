<?php

/**
 * Future value of annuity
 * /finance/annuity-future-value
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Future value of annuity',
    'meta' => ['title' => 'Future value of annuity — Free Online Calculator', 'description' => 'Future value of annuity works out number of periods and equivalent interest rate from payment amount, interest rate and annuity term. A worked example follows.', 'h1' => 'Future value of annuity Calculator', 'updated' => '2026-09-30'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'payment',
                            'label' => 'Payment amount',
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
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'annuity_term',
                            'label' => 'Annuity term',
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
                            'name' => 'compounding_frequency',
                            'label' => 'Compounding frequency',
                            'type' => 'select',
                            'options' => [
                                'Yearly' => '1',
                                'Bi-annually' => '2',
                                'Quarterly' => '4',
                                'Monthly' => '12',
                                'Weekly' => '52.1775',
                                'Daily' => '365.242',
                                'Continuous' => '0',
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
                            'name' => 'payment_frequency',
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
                            'control' => 'DROPDOWN',
                            'default' => 'Yearly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'type_of_annuity',
                            'label' => 'Type of annuity',
                            'type' => 'select',
                            'options' => ['Ordinary annuity' => '0', 'Annuity due' => '1'],
                            'dataset' => 'Type of Annuity',
                            'help' => 'With this option, you can set the payment to be made at the end of the period (ordinary annuity) or the beginning of each period (annuity due).',
                            'default' => 'Ordinary annuity',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'future_value',
                            'label' => 'Future value of annuity',
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
            'title' => 'Advanced parameters',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'growth_rate',
                            'label' => 'Growth rate of annuity',
                            'type' => 'number',
                            'help' => 'The percentage increase of an annuity in the case of a growing annuity.',
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
                            'name' => 'number_of_periods',
                            'label' => 'Number of periods',
                            'type' => 'number',
                            'help' => 'The number of times the interest and growth are accrued.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'equivalent_interest_rate',
                            'label' => 'Equivalent interest rate',
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
                            'name' => 'periodic_equivalent_interest_rate',
                            'label' => 'Periodic equivalent interest rate',
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
            future_value = payment * (((1 + periodic_equivalent_interest_rate) ^ number_of_periods - (1 + growth_rate) ^ number_of_periods) / (periodic_equivalent_interest_rate - growth_rate)) * (1 + periodic_equivalent_interest_rate * type_of_annuity)
            TXT,
            'results' => ['payment' => <<<'TXT'
            future_value*(growth_rate - (((compounding_frequency > 0) ? (
               payment_frequency*((pow((compounding_frequency + interest_rate)/compounding_frequency, compounding_frequency/payment_frequency)) - 1)
            )
            : (
               payment_frequency*((exp(interest_rate/payment_frequency)) - 1)
            ))/payment_frequency))/(type_of_annuity*pow(growth_rate + 1, number_of_periods)*(((compounding_frequency > 0) ? (
               payment_frequency*((pow((compounding_frequency + interest_rate)/compounding_frequency, compounding_frequency/payment_frequency)) - 1)
            )
            : (
               payment_frequency*((exp(interest_rate/payment_frequency)) - 1)
            ))/payment_frequency) - type_of_annuity*pow((((compounding_frequency > 0) ? (
               payment_frequency*((pow((compounding_frequency + interest_rate)/compounding_frequency, compounding_frequency/payment_frequency)) - 1)
            )
            : (
               payment_frequency*((exp(interest_rate/payment_frequency)) - 1)
            ))/payment_frequency) + 1, number_of_periods)*(((compounding_frequency > 0) ? (
               payment_frequency*((pow((compounding_frequency + interest_rate)/compounding_frequency, compounding_frequency/payment_frequency)) - 1)
            )
            : (
               payment_frequency*((exp(interest_rate/payment_frequency)) - 1)
            ))/payment_frequency) + pow(growth_rate + 1, number_of_periods) - pow((((compounding_frequency > 0) ? (
               payment_frequency*((pow((compounding_frequency + interest_rate)/compounding_frequency, compounding_frequency/payment_frequency)) - 1)
            )
            : (
               payment_frequency*((exp(interest_rate/payment_frequency)) - 1)
            ))/payment_frequency) + 1, number_of_periods))
            TXT, 'future_value' => <<<'TXT'
            payment*(type_of_annuity*pow(growth_rate + 1, number_of_periods)*(((compounding_frequency > 0) ? (
               payment_frequency*((pow((compounding_frequency + interest_rate)/compounding_frequency, compounding_frequency/payment_frequency)) - 1)
            )
            : (
               payment_frequency*((exp(interest_rate/payment_frequency)) - 1)
            ))/payment_frequency) - type_of_annuity*pow((((compounding_frequency > 0) ? (
               payment_frequency*((pow((compounding_frequency + interest_rate)/compounding_frequency, compounding_frequency/payment_frequency)) - 1)
            )
            : (
               payment_frequency*((exp(interest_rate/payment_frequency)) - 1)
            ))/payment_frequency) + 1, number_of_periods)*(((compounding_frequency > 0) ? (
               payment_frequency*((pow((compounding_frequency + interest_rate)/compounding_frequency, compounding_frequency/payment_frequency)) - 1)
            )
            : (
               payment_frequency*((exp(interest_rate/payment_frequency)) - 1)
            ))/payment_frequency) + pow(growth_rate + 1, number_of_periods) - pow((((compounding_frequency > 0) ? (
               payment_frequency*((pow((compounding_frequency + interest_rate)/compounding_frequency, compounding_frequency/payment_frequency)) - 1)
            )
            : (
               payment_frequency*((exp(interest_rate/payment_frequency)) - 1)
            ))/payment_frequency) + 1, number_of_periods))/(growth_rate - (((compounding_frequency > 0) ? (
               payment_frequency*((pow((compounding_frequency + interest_rate)/compounding_frequency, compounding_frequency/payment_frequency)) - 1)
            )
            : (
               payment_frequency*((exp(interest_rate/payment_frequency)) - 1)
            ))/payment_frequency))
            TXT, 'type_of_annuity' => <<<'TXT'
            (future_value*growth_rate - future_value*(((compounding_frequency > 0) ? (
               payment_frequency*((pow((compounding_frequency + interest_rate)/compounding_frequency, compounding_frequency/payment_frequency)) - 1)
            )
            : (
               payment_frequency*((exp(interest_rate/payment_frequency)) - 1)
            ))/payment_frequency) - payment*pow(growth_rate + 1, number_of_periods) + payment*pow((((compounding_frequency > 0) ? (
               payment_frequency*((pow((compounding_frequency + interest_rate)/compounding_frequency, compounding_frequency/payment_frequency)) - 1)
            )
            : (
               payment_frequency*((exp(interest_rate/payment_frequency)) - 1)
            ))/payment_frequency) + 1, number_of_periods))/(payment*(pow(growth_rate + 1, number_of_periods) - pow((((compounding_frequency > 0) ? (
               payment_frequency*((pow((compounding_frequency + interest_rate)/compounding_frequency, compounding_frequency/payment_frequency)) - 1)
            )
            : (
               payment_frequency*((exp(interest_rate/payment_frequency)) - 1)
            ))/payment_frequency) + 1, number_of_periods))*(((compounding_frequency > 0) ? (
               payment_frequency*((pow((compounding_frequency + interest_rate)/compounding_frequency, compounding_frequency/payment_frequency)) - 1)
            )
            : (
               payment_frequency*((exp(interest_rate/payment_frequency)) - 1)
            ))/payment_frequency))
            TXT],
        ],
        [
            'title' => 'periodic_equivalent_interest_rate = one_way(equivalent_interest_rate / payment_frequency)',
            'results' => ['periodic_equivalent_interest_rate' => <<<'TXT'
            (((compounding_frequency > 0) ? (
               payment_frequency*((pow((compounding_frequency + interest_rate)/compounding_frequency, compounding_frequency/payment_frequency)) - 1)
            )
            : (
               payment_frequency*((exp(interest_rate/payment_frequency)) - 1)
            ))/payment_frequency)
            TXT],
        ],
        [
            'title' => 'number_of_periods = payment_frequency * annuity_term',
            'results' => ['number_of_periods' => 'annuity_term*payment_frequency', 'annuity_term' => 'number_of_periods/payment_frequency', 'payment_frequency' => 'number_of_periods/annuity_term'],
        ],
        [
            'title' => <<<'TXT'
            equivalent_interest_rate = payment_frequency * (if_else(compounding_frequency > 0, (1 + interest_rate/compounding_frequency) ^ (compounding_frequency/payment_frequency), e ^ (interest_rate/payment_frequency)) - 1)
            TXT,
            'results' => ['equivalent_interest_rate' => <<<'TXT'
            ((compounding_frequency > 0) ? (
               payment_frequency*((pow((compounding_frequency + interest_rate)/compounding_frequency, compounding_frequency/payment_frequency)) - 1)
            )
            : (
               payment_frequency*((exp(interest_rate/payment_frequency)) - 1)
            ))
            TXT],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Future value of annuity turns Payment amount, Interest rate and Compounding frequency into Annuity term and Future value of annuity. Nothing is looked up on this page: annuity term is computed from payment amount and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Annuity term is opened in years / months; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Future value of annuity calculator works', 'html' => <<<'TXT'
            <p>The Future value of annuity calculator applies one relationship to 7 numbers and reports Annuity term, Future value of annuity and Equivalent interest rate.</p><p>What comes back is Annuity term, Future value of annuity, Equivalent interest rate and Periodic equivalent interest rate — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 7 boxes, and nothing else.</p><ul><li><strong>Payment amount</strong> — in USD</li><li><strong>Interest rate</strong> — in percent</li><li><strong>Compounding frequency</strong> — a plain number, no unit</li><li><strong>Payment frequency</strong> — a plain number, no unit</li><li><strong>Type of annuity</strong> — a plain number, no unit. With this option, you can set the payment to be made at the end of the period (ordinary annuity) or the beginning of each period (annuity due).</li><li><strong>Growth rate of annuity</strong> — in percent. The percentage increase of an annuity in the case of a growing annuity.</li><li><strong>Number of periods</strong> — a plain number, no unit. The number of times the interest and growth are accrued.</li></ul><p>The answers come back as Annuity term in years / months, Future value of annuity in USD, Equivalent interest rate in percent, Periodic equivalent interest rate in percent. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Interest rate = 3 perc, Compounding frequency = 1 and Growth rate of annuity = 4 perc — through the same formula and the panel reports <strong>Payment frequency</strong> = 1, <strong>Type of annuity</strong> = 0, <strong>Periodic equivalent interest rate</strong> = 3 perc and <strong>Equivalent interest rate</strong> = 3 perc.</p><ul><li><strong>Payment frequency</strong> = 1</li><li><strong>Type of annuity</strong> = 0</li><li><strong>Periodic equivalent interest rate</strong> = 3 perc</li><li><strong>Equivalent interest rate</strong> = 3 perc</li></ul>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Payment frequency</strong> = 1, <strong>Type of annuity</strong> = 0, <strong>Periodic equivalent interest rate</strong> = 3 and <strong>Equivalent interest rate</strong> = 3 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Annuity term offers 9 units and opens on years / months, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Number of periods</strong> = <code>Annuity term × Payment frequency</code></li><li><strong>Annuity term</strong> = <code>Number of periods ÷ Payment frequency</code></li><li><strong>Payment frequency</strong> = <code>Number of periods ÷ Annuity term</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Number of periods</strong> = <code>Annuity term × Payment frequency</code> — the form to use when Annuity term and Payment frequency are the values you have.</li><li><strong>Annuity term</strong> = <code>Number of periods ÷ Payment frequency</code> — the form to use when Number of periods and Payment frequency are the values you have.</li><li><strong>Payment frequency</strong> = <code>Number of periods ÷ Annuity term</code> — the form to use when Number of periods and Annuity term are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Future value of annuity, Payment amount and Type of annuity can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Interest rate, from 3 to 6 — and the answers go from <strong>Payment frequency</strong> 1, <strong>Type of annuity</strong> 0, <strong>Periodic equivalent interest rate</strong> 3 perc and <strong>Equivalent interest rate</strong> 3 perc to <strong>Payment frequency</strong> 1, <strong>Type of annuity</strong> 0, <strong>Periodic equivalent interest rate</strong> 6 perc and <strong>Equivalent interest rate</strong> 6 perc.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Interest rate and Growth rate of annuity is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Annuity term, Future value of annuity and Equivalent interest rate are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Payment amount left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Payment amount is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Interest rate left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Interest rate is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Payment amount is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Future value of annuity form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Payment amount</strong> takes a plain number with no unit attached. It feeds Future value of annuity and Type of annuity. Fill it from a measurement rather than a memory — Payment amount is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Interest rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Payment amount, Future value of annuity and Type of annuity. Fill it from a measurement rather than a memory — Interest rate is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Compounding frequency</strong> takes a plain number with no unit attached. It feeds Payment amount, Future value of annuity and Type of annuity. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Compounding frequency is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Payment frequency</strong> takes a plain number with no unit attached. It feeds Payment amount, Future value of annuity and Type of annuity. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Payment frequency is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Type of annuity</strong> takes a plain number with no unit attached. With this option, you can set the payment to be made at the end of the period (ordinary annuity) or the beginning of each period (annuity due). It feeds Payment amount and Future value of annuity. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Type of annuity is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Growth rate of annuity</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The percentage increase of an annuity in the case of a growing annuity. It feeds Payment amount, Future value of annuity and Type of annuity. Fill it from a measurement rather than a memory — Growth rate of annuity is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Number of periods</strong> takes a plain number with no unit attached. The number of times the interest and growth are accrued. It feeds Payment amount, Future value of annuity and Type of annuity. Fill it from a measurement rather than a memory — Number of periods is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Annuity term</strong> is a years / months figure. The value follows from Number of periods and Payment frequency. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Future value of annuity</strong> is a plain number. The value follows from Payment amount, Type of annuity, Growth rate of annuity and Number of periods. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Equivalent interest rate</strong> is a percent figure and the page's own defaults put it at 3 perc. The value follows from Compounding frequency, Payment frequency and Interest rate. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Periodic equivalent interest rate</strong> is a percent figure and the page's own defaults put it at 3 perc. The value follows from Compounding frequency, Payment frequency and Interest rate. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Annuity term is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The chips cover years / months and percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Payment amount, Interest rate and Compounding frequency and the number you are missing is Annuity term and Future value of annuity.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/cogs">Cost of goods sold Calculator</a>, <a href="/finance/coupon-payment">Coupon payment Calculator</a> and <a href="/finance/coupon-rate">Coupon rate</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Future value of annuity calculator work out?', 'a' => <<<'TXT'
            Annuity term, Future value of annuity, Equivalent interest rate and Periodic equivalent interest rate, from Payment amount, Type of annuity, Growth rate of annuity and Number of periods.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Payment amount (USD), Interest rate (percent), Compounding frequency, Payment frequency, Type of annuity. Fill payment amount, interest rate and compounding frequency and leave Annuity term empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Future value of annuity, Payment amount, Type of annuity and Periodic equivalent interest rate can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Payment frequency = 1, Type of annuity = 0, Periodic equivalent interest rate = 3 perc and Equivalent interest rate = 3 perc. Those are the defaults written into the form — move Payment amount and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Annuity term is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Payment amount blank and the page solves for it, reporting Annuity term instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Annuity term keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/cogs', 'name' => 'Cost of goods sold Calculator'],
            ['path' => '/finance/coupon-payment', 'name' => 'Coupon payment Calculator'],
            ['path' => '/finance/coupon-rate', 'name' => 'Coupon rate'],
        ],
        'authors' => [],
    ],
];
