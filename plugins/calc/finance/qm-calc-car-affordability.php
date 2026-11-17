<?php

/**
 * Car affordability
 * /finance/car-affordability
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Car affordability',
    'meta' => ['title' => 'Car affordability: Formula, Steps & Results', 'description' => 'Car affordability works out maximum car value from monthly payment you can afford. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Car affordability Calculator', 'updated' => '2024-06-07'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'monthly_payment',
                            'label' => 'Monthly payment you can afford',
                            'type' => 'number',
                            'help' => 'Maximum amount of money you can spend each month on an auto loan.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'money_you_have',
                            'label' => 'Money you have',
                            'type' => 'number',
                            'help' => 'Cash you can spend now on purchasing a new car.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'trade_in_value',
                            'label' => 'Current car trade in value',
                            'type' => 'number',
                            'help' => 'The value of your current car.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'interest_rate',
                            'label' => 'Interest rate',
                            'type' => 'number',
                            'help' => 'Interest rate on the auto loan.',
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
                            'help' => 'The term of the car loan.',
                            'unit' => '19',
                            'unit_default' => 'yrsmos',
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
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'Maximum_car_value',
                            'label' => 'Maximum car value',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'maximum_loan',
                            'label' => 'Loan amount',
                            'type' => 'number',
                            'help' => 'The maximum amount of your auto-loan.',
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
                            'name' => 'interest_paid',
                            'label' => 'Interest paid',
                            'type' => 'number',
                            'help' => 'Total interest to be paid for the auto loan.',
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
            'title' => 'Additional options',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tax_rate',
                            'label' => 'Sales tax rate',
                            'type' => 'number',
                            'help' => 'Car sales tax.',
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
                            'name' => 'sales_tax',
                            'label' => 'Sales tax',
                            'type' => 'number',
                            'help' => 'Total amount of sales tax.',
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
            'title' => 'Maximum_car_value = (money_you_have + trade_in_value + maximum_loan) / (1+ tax_rate)',
            'results' => [
                'maximum_loan' => 'Maximum_car_value*tax_rate + Maximum_car_value - money_you_have - trade_in_value',
                'Maximum_car_value' => '(maximum_loan + money_you_have + trade_in_value)/(tax_rate + 1)',
                'money_you_have' => 'Maximum_car_value*tax_rate + Maximum_car_value - maximum_loan - trade_in_value',
                'tax_rate' => '(-Maximum_car_value + maximum_loan + money_you_have + trade_in_value)/Maximum_car_value',
                'trade_in_value' => 'Maximum_car_value*tax_rate + Maximum_car_value - maximum_loan - money_you_have',
            ],
        ],
        [
            'title' => 'maximum_loan = ((1 - (1 + (interest_rate / 12)) ^ (- loan_term)) * monthly_payment) / (interest_rate / 12)',
            'results' => ['maximum_loan' => '12*monthly_payment*(-pow(12, loan_term) + pow(interest_rate + 12, loan_term))*pow(interest_rate + 12, -loan_term)/interest_rate', 'monthly_payment' => '(1/12)*interest_rate*maximum_loan*pow(interest_rate + 12, loan_term)/(-pow(12, loan_term) + pow(interest_rate + 12, loan_term))'],
        ],
        [
            'title' => 'interest_paid = monthly_payment * loan_term - maximum_loan',
            'results' => ['maximum_loan' => '-interest_paid + loan_term*monthly_payment', 'loan_term' => '(interest_paid + maximum_loan)/monthly_payment', 'monthly_payment' => '(interest_paid + maximum_loan)/loan_term', 'interest_paid' => 'loan_term*monthly_payment - maximum_loan'],
        ],
        [
            'title' => 'sales_tax = Maximum_car_value * tax_rate',
            'results' => ['Maximum_car_value' => 'sales_tax/tax_rate', 'sales_tax' => 'Maximum_car_value*tax_rate', 'tax_rate' => 'sales_tax/Maximum_car_value'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Car affordability turns Money you have, Current car trade in value and Loan amount into Monthly payment you can afford and Loan term. There is no hidden constant here: change monthly payment you can afford and money you have moves with it. The main result, Monthly payment you can afford, is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the Car affordability calculator works', 'html' => <<<'TXT'
            <p>The Car affordability calculator applies one relationship to 4 numbers and reports Monthly payment you can afford, Loan term and Maximum car value.</p><p>In the form&#039;s own words, Maximum car value = (Loan amount + Money you have + Current car trade in value) ÷ (Sales tax rate + 1).</p><p>The result panel carries Monthly payment you can afford, Loan term, Maximum car value and Interest paid, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>Money you have</strong> — in USD. Cash you can spend now on purchasing a new car.</li><li><strong>Current car trade in value</strong> — in USD. The value of your current car.</li><li><strong>Loan amount</strong> — in USD. The maximum amount of your auto-loan.</li><li><strong>Sales tax rate</strong> — in percent. Car sales tax.</li></ul><p>The result boxes are Monthly payment you can afford in USD, Loan term in years / months, Maximum car value in USD, Interest paid in USD, Sales tax in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Loan term offers 9 units and opens on years / months, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Maximum car value</strong> = <code>(Loan amount + Money you have + Current car trade in value) ÷ (Sales tax rate + 1)</code></li><li><strong>Loan amount</strong> = <code>Maximum car value × Sales tax rate + Maximum car value − Money you have − Current car trade in value</code></li><li><strong>Money you have</strong> = <code>Maximum car value × Sales tax rate + Maximum car value − Loan amount − Current car trade in value</code></li><li><strong>Sales tax rate</strong> = <code>( − Maximum car value + Loan amount + Money you have + Current car trade in value) ÷ Maximum car value</code></li><li><strong>Current car trade in value</strong> = <code>Maximum car value × Sales tax rate + Maximum car value − Loan amount − Money you have</code></li><li><strong>Monthly payment you can afford</strong> = <code>(1 ÷ 12) × Interest rate × Loan amount × (Interest rate + 12)^(Loan term) ÷ ( − (12)^(Loan term) + (Interest rate + 12)^(Loan term))</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Maximum car value</strong> = <code>(Loan amount + Money you have + Current car trade in value) ÷ (Sales tax rate + 1)</code> — the form to use when Loan amount, Money you have, Current car trade in value and Sales tax rate are the values you have.</li><li><strong>Loan amount</strong> = <code>Maximum car value × Sales tax rate + Maximum car value − Money you have − Current car trade in value</code> — the form to use when Maximum car value, Sales tax rate, Money you have and Current car trade in value are the values you have.</li><li><strong>Money you have</strong> = <code>Maximum car value × Sales tax rate + Maximum car value − Loan amount − Current car trade in value</code> — the form to use when Maximum car value, Sales tax rate, Loan amount and Current car trade in value are the values you have.</li><li><strong>Sales tax rate</strong> = <code>( − Maximum car value + Loan amount + Money you have + Current car trade in value) ÷ Maximum car value</code> — the form to use when Maximum car value, Loan amount, Money you have and Current car trade in value are the values you have.</li><li><strong>Current car trade in value</strong> = <code>Maximum car value × Sales tax rate + Maximum car value − Loan amount − Money you have</code> — the form to use when Maximum car value, Sales tax rate, Loan amount and Money you have are the values you have.</li><li><strong>Loan amount</strong> = <code>12 × Monthly payment you can afford × ( − (12)^(Loan term) + (Interest rate + 12)^(Loan term)) × (Interest rate + 12)^(− Loan term) ÷ Interest rate</code> — the form to use when Monthly payment you can afford, Loan term and Interest rate are the values you have.</li><li><strong>Monthly payment you can afford</strong> = <code>(1 ÷ 12) × Interest rate × Loan amount × (Interest rate + 12)^(Loan term) ÷ ( − (12)^(Loan term) + (Interest rate + 12)^(Loan term))</code> — the form to use when Interest rate, Loan amount and Loan term are the values you have.</li><li><strong>Interest paid</strong> = <code>Loan term × Monthly payment you can afford − Loan amount</code> — the form to use when Loan term, Monthly payment you can afford and Loan amount are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Maximum car value, Loan amount and Money you have can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Sales tax rate is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Monthly payment you can afford, Loan term and Maximum car value are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Money you have left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Money you have is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Current car trade in value left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Current car trade in value is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Money you have is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Money you have</strong> takes a plain number with no unit attached. Cash you can spend now on purchasing a new car. Change it and Loan amount, Maximum car value and Sales tax rate changes with it. Have it to hand before you start: Money you have is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Current car trade in value</strong> takes a plain number with no unit attached. The value of your current car. Change it and Loan amount, Maximum car value and Money you have changes with it. Have it to hand before you start: Current car trade in value is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Loan amount</strong> takes a plain number with no unit attached. The maximum amount of your auto-loan. Change it and Maximum car value, Money you have and Sales tax rate changes with it. Have it to hand before you start: Loan amount is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Sales tax rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Car sales tax. Change it and Loan amount, Maximum car value and Money you have changes with it. Have it to hand before you start: Sales tax rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Monthly payment you can afford</strong> is a plain number. The value follows from Interest rate, Loan amount and Loan term. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Loan term</strong> is a years / months figure. The value follows from Interest paid, Loan amount and Monthly payment you can afford. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Maximum car value</strong> is a plain number. The value follows from Loan amount, Money you have, Current car trade in value and Sales tax rate. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Interest paid</strong> is a plain number. The value follows from Loan term, Monthly payment you can afford and Loan amount. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Sales tax</strong> is a plain number. The value follows from Maximum car value and Sales tax rate. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>years / months</strong> — opens in <em>yrsmos</em>, and the chip also carries min, hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Monthly payment you can afford is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The unit tables here are years / months and percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Money you have, Current car trade in value and Loan amount are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Money you have, Current car trade in value and Loan amount is what you already know and Monthly payment you can afford and Loan term is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/ar-days">A/R days Calculator</a>, <a href="/finance/absence-percentage">Absence percentage Calculator</a> and <a href="/finance/accounting-profit">Accounting profit Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Car affordability calculator work out?', 'a' => <<<'TXT'
            Monthly payment you can afford, Loan term, Maximum car value and Interest paid, from Loan amount, Money you have, Current car trade in value and Sales tax rate. The relationship is Maximum car value = (Loan amount + Money you have + Current car trade in value) ÷ (Sales tax rate + 1).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Money you have (USD), Current car trade in value (USD), Loan amount (USD), Sales tax rate (percent). Enter money you have, current car trade in value and loan amount; Monthly payment you can afford is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Maximum car value, Loan amount, Money you have and Sales tax rate can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Monthly payment you can afford is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Money you have left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Monthly payment you can afford keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/ar-days', 'name' => 'A/R days Calculator'],
            ['path' => '/finance/absence-percentage', 'name' => 'Absence percentage Calculator'],
            ['path' => '/finance/accounting-profit', 'name' => 'Accounting profit Calculator'],
        ],
        'authors' => [],
    ],
];
