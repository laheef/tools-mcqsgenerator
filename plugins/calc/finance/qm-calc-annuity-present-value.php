<?php

/**
 * Present value of annuity
 * /finance/annuity-present-value
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Present value of annuity',
    'meta' => ['title' => 'Present value of annuity — Free Online Calculator', 'description' => 'Present value of annuity reports number of periods and equivalent interest rate. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Present value of annuity Calculator', 'updated' => '2026-09-30'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Payment',
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
                            'name' => 'interestRate',
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
                            'name' => 'annuityTerm',
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
                            'name' => 'compoundFrequency',
                            'label' => 'Compound frequency',
                            'type' => 'select',
                            'options' => [
                                'Yearly' => '1.000000000000000',
                                'Bi-annually' => '2.000000000000000',
                                'Quarterly' => '4.000000000000000',
                                'Monthly' => '12.000000000000000',
                                'Weekly' => '52.177500000000000',
                                'Daily' => '365.242000000000000',
                                'Continuous' => '0.000000000000000',
                            ],
                            'dataset' => 'Compounding frequency',
                            'control' => 'DROPDOWN',
                            'default' => 'Yearly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'paymentFrequency',
                            'label' => 'Payment frequency',
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
                            'name' => 'typeOfAnnuity',
                            'label' => 'Type of annuity',
                            'type' => 'select',
                            'options' => ['Ordinary annuity' => '0.000000000000000', 'Annuity due' => '1.000000000000000'],
                            'dataset' => 'Type of Annuity',
                            'help' => 'With this option, you can set when the payment is made: at the end of the period (ordinary annuity) or the beginning of each period (annuity due).',
                            'default' => 'Ordinary annuity',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PVA',
                            'label' => 'Present value of annuity',
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
            'title' => 'Growth rate and additional information',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'growthRateOfAnnuity',
                            'label' => 'Growth rate of annuity',
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
                            'name' => 'numberOfPeriods',
                            'label' => 'Number of periods',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'equivalentInterestRate',
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
                            'name' => 'periodicEquivalentInterestRate',
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
            PVA = Payment * ((1 - ((1 + growthRateOfAnnuity) / (1 + periodicEquivalentInterestRate)) ^ numberOfPeriods) / (periodicEquivalentInterestRate - growthRateOfAnnuity)) * (1 + periodicEquivalentInterestRate * typeOfAnnuity)
            TXT,
            'results' => ['typeOfAnnuity' => <<<'TXT'
            (PVA*growthRateOfAnnuity - PVA*(get_eq(paymentFrequency, interestRate, compoundFrequency)/paymentFrequency) - Payment*pow((growthRateOfAnnuity + 1)/((get_eq(paymentFrequency, interestRate, compoundFrequency)/paymentFrequency) + 1), numberOfPeriods) + Payment)/(Payment*(pow((growthRateOfAnnuity + 1)/((get_eq(paymentFrequency, interestRate, compoundFrequency)/paymentFrequency) + 1), numberOfPeriods) - 1)*(get_eq(paymentFrequency, interestRate, compoundFrequency)/paymentFrequency))
            TXT, 'numberOfPeriods' => <<<'TXT'
            log((PVA*growthRateOfAnnuity - PVA*(get_eq(paymentFrequency, interestRate, compoundFrequency)/paymentFrequency) + Payment*typeOfAnnuity*(get_eq(paymentFrequency, interestRate, compoundFrequency)/paymentFrequency) + Payment)/(Payment*(typeOfAnnuity*(get_eq(paymentFrequency, interestRate, compoundFrequency)/paymentFrequency) + 1)))/log((growthRateOfAnnuity + 1)/((get_eq(paymentFrequency, interestRate, compoundFrequency)/paymentFrequency) + 1))
            TXT, 'Payment' => <<<'TXT'
            PVA*(growthRateOfAnnuity - (get_eq(paymentFrequency, interestRate, compoundFrequency)/paymentFrequency))/(typeOfAnnuity*pow((growthRateOfAnnuity + 1)/((get_eq(paymentFrequency, interestRate, compoundFrequency)/paymentFrequency) + 1), numberOfPeriods)*(get_eq(paymentFrequency, interestRate, compoundFrequency)/paymentFrequency) - typeOfAnnuity*(get_eq(paymentFrequency, interestRate, compoundFrequency)/paymentFrequency) + pow((growthRateOfAnnuity + 1)/((get_eq(paymentFrequency, interestRate, compoundFrequency)/paymentFrequency) + 1), numberOfPeriods) - 1)
            TXT, 'PVA' => <<<'TXT'
            Payment*(typeOfAnnuity*pow((growthRateOfAnnuity + 1)/((get_eq(paymentFrequency, interestRate, compoundFrequency)/paymentFrequency) + 1), numberOfPeriods)*(get_eq(paymentFrequency, interestRate, compoundFrequency)/paymentFrequency) - typeOfAnnuity*(get_eq(paymentFrequency, interestRate, compoundFrequency)/paymentFrequency) + pow((growthRateOfAnnuity + 1)/((get_eq(paymentFrequency, interestRate, compoundFrequency)/paymentFrequency) + 1), numberOfPeriods) - 1)/(growthRateOfAnnuity - (get_eq(paymentFrequency, interestRate, compoundFrequency)/paymentFrequency))
            TXT],
        ],
        [
            'title' => 'equivalentInterestRate = get_eq(paymentFrequency, interestRate, compoundFrequency)',
            'results' => ['equivalentInterestRate' => 'get_eq(paymentFrequency, interestRate, compoundFrequency)'],
        ],
        [
            'title' => 'periodicEquivalentInterestRate = one_way(equivalentInterestRate / paymentFrequency)',
            'results' => ['periodicEquivalentInterestRate' => '(get_eq(paymentFrequency, interestRate, compoundFrequency)/paymentFrequency)'],
        ],
        [
            'title' => 'numberOfPeriods = paymentFrequency * annuityTerm',
            'results' => ['annuityTerm' => 'numberOfPeriods/paymentFrequency', 'numberOfPeriods' => 'annuityTerm*paymentFrequency', 'paymentFrequency' => 'numberOfPeriods/annuityTerm'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("get_eq",function(q,r,m){var base;var newM=m;if(m===0){var continous_r=Math.pow(2.718281828459045,r)-1;newM=1;base=1+continous_r/newM}else{base=1+r/newM}var power=newM/q;var eq=q*(Math.pow(base,power)-1);return eq});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Enter Payment amount, Interest rate and Compound frequency into Present value of annuity and the answer comes back as Annuity term and Present value of annuity. Nothing is looked up on this page: annuity term is computed from payment amount and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Annuity term is opened in years / months; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Present value of annuity calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Present value of annuity: it takes 7 numbers and reports Annuity term, Present value of annuity and Equivalent interest rate.</p><p>The result panel carries Annuity term, Present value of annuity, Equivalent interest rate and Periodic equivalent interest rate, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 7 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Payment amount</strong> — in USD</li><li><strong>Interest rate</strong> — in percent</li><li><strong>Compound frequency</strong> — a plain number, no unit</li><li><strong>Payment frequency</strong> — a plain number, no unit</li><li><strong>Type of annuity</strong> — a plain number, no unit. With this option, you can set when the payment is made: at the end of the period (ordinary annuity) or the beginning of each period (annuity due).</li><li><strong>Growth rate of annuity</strong> — in percent</li><li><strong>Number of periods</strong> — a plain number, no unit</li></ul><p>The answers come back as Annuity term in years / months, Present value of annuity in USD, Equivalent interest rate in percent, Periodic equivalent interest rate in percent. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Interest rate = 3 perc, Compound frequency = 1 and Growth rate of annuity = 4 perc — through the same formula and the panel reports <strong>Payment frequency</strong> = 1 and <strong>Type of annuity</strong> = 0.</p><ul><li><strong>Payment frequency</strong> = 1</li><li><strong>Type of annuity</strong> = 0</li></ul>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Payment frequency</strong> = 1 and <strong>Type of annuity</strong> = 0. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Annuity term lists 9 options and opens on years / months. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Equivalent interest rate</strong> = <code>get_eq(Payment frequency, Interest rate, Compound frequency)</code></li><li><strong>Periodic equivalent interest rate</strong> = <code>(get_eq(Payment frequency, Interest rate, Compound frequency) ÷ Payment frequency)</code></li><li><strong>Number of periods</strong> = <code>Annuity term × Payment frequency</code></li><li><strong>Annuity term</strong> = <code>Number of periods ÷ Payment frequency</code></li><li><strong>Payment frequency</strong> = <code>Number of periods ÷ Annuity term</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Equivalent interest rate</strong> = <code>get_eq(Payment frequency, Interest rate, Compound frequency)</code> — the form to use when Payment frequency, Interest rate and Compound frequency are the values you have.</li><li><strong>Periodic equivalent interest rate</strong> = <code>(get_eq(Payment frequency, Interest rate, Compound frequency) ÷ Payment frequency)</code> — the form to use when Payment frequency, Interest rate and Compound frequency are the values you have.</li><li><strong>Number of periods</strong> = <code>Annuity term × Payment frequency</code> — the form to use when Annuity term and Payment frequency are the values you have.</li><li><strong>Annuity term</strong> = <code>Number of periods ÷ Payment frequency</code> — the form to use when Number of periods and Payment frequency are the values you have.</li><li><strong>Payment frequency</strong> = <code>Number of periods ÷ Annuity term</code> — the form to use when Number of periods and Annuity term are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Present value of annuity, Type of annuity and Number of periods can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Interest rate, from 3 to 6 — and the answers go from <strong>Payment frequency</strong> 1 and <strong>Type of annuity</strong> 0 to <strong>Payment frequency</strong> 1 and <strong>Type of annuity</strong> 0.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Interest rate and Growth rate of annuity carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Annuity term, Present value of annuity and Equivalent interest rate are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Payment amount left as a guess.</strong> Anything typed into Payment amount is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Interest rate left as a guess.</strong> Anything typed into Interest rate is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Payment amount is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Payment amount</strong> takes a plain number with no unit attached. The page reads it when it works out Type of annuity, Number of periods and Present value of annuity. Have it to hand before you start: Payment amount is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Interest rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The page reads it when it works out Type of annuity, Number of periods and Payment amount. Have it to hand before you start: Interest rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Compound frequency</strong> takes a plain number with no unit attached. The page reads it when it works out Type of annuity, Number of periods and Payment amount. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Compound frequency is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Payment frequency</strong> takes a plain number with no unit attached. The page reads it when it works out Type of annuity, Number of periods and Payment amount. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Payment frequency is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Type of annuity</strong> takes a plain number with no unit attached. With this option, you can set when the payment is made: at the end of the period (ordinary annuity) or the beginning of each period (annuity due). The page reads it when it works out Number of periods, Payment amount and Present value of annuity. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Type of annuity is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Growth rate of annuity</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The page reads it when it works out Type of annuity, Number of periods and Payment amount. Have it to hand before you start: Growth rate of annuity is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Number of periods</strong> takes a plain number with no unit attached. The page reads it when it works out Type of annuity, Payment amount and Present value of annuity. Have it to hand before you start: Number of periods is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Annuity term</strong> is a years / months figure. It is computed from Number of periods and Payment frequency, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Present value of annuity</strong> is a plain number. It is computed from Payment amount, Type of annuity, Growth rate of annuity and Payment frequency, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Equivalent interest rate</strong> is a percent figure. It is computed from Payment frequency, Interest rate and Compound frequency, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Periodic equivalent interest rate</strong> is a percent figure. It is computed from Payment frequency, Interest rate and Compound frequency, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>years / months</strong> — opens in <em>yrsmos</em>, and the chip also carries min, hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Annuity term is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The chips cover years / months and percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Payment amount, Interest rate and Compound frequency and the number you are missing is Annuity term and Present value of annuity.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/piti">PITI Calculator</a>, <a href="/finance/pivot-point">Pivot point Calculator</a> and <a href="/finance/pmi">PMI Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Present value of annuity calculator work out?', 'a' => <<<'TXT'
            Annuity term, Present value of annuity, Equivalent interest rate and Periodic equivalent interest rate, from Payment amount, Type of annuity, Growth rate of annuity and Payment frequency.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Payment amount (USD), Interest rate (percent), Compound frequency, Payment frequency, Type of annuity. Enter payment amount, interest rate and compound frequency; Annuity term is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Present value of annuity, Type of annuity, Number of periods and Payment amount can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Payment frequency = 1 and Type of annuity = 0. That comes from the page's own defaults, entered in Payment amount; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Annuity term is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Payment amount left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Annuity term at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/piti', 'name' => 'PITI Calculator'],
            ['path' => '/finance/pivot-point', 'name' => 'Pivot point Calculator'],
            ['path' => '/finance/pmi', 'name' => 'PMI Calculator'],
        ],
        'authors' => [],
    ],
];
