<?php

/**
 * Auto loan
 * /finance/auto-loan
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Auto loan',
    'meta' => ['title' => 'Auto loan Calculator: Formula, Steps & Examples', 'description' => 'Auto loan reports loan amount, monthly payment and total interest paid. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Auto loan Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        Fill in the value of your new and old car, the down payment (and taxes if needed), and find out the amount of the loan to buy your new car. We can also tell you the interest and monthly payment!
                        TXT],
                    ],
                ],
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
                            'name' => 'money_you_have',
                            'label' => 'Money you have',
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
                            'label' => 'Trade in value',
                            'type' => 'number',
                            'help' => 'The value of your current car',
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
                            'name' => 'sales_tax',
                            'label' => 'Sales tax',
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
                            'label' => 'Total interest paid',
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
    ],
    'formula' => [
        [
            'title' => 'loan_amount = price_of_the_car - money_you_have - (trade_in_value * (1 - sales_tax))',
            'results' => [
                'money_you_have' => '-loan_amount + price_of_the_car + sales_tax*trade_in_value - trade_in_value',
                'loan_amount' => '-money_you_have + price_of_the_car + sales_tax*trade_in_value - trade_in_value',
                'price_of_the_car' => 'loan_amount + money_you_have - sales_tax*trade_in_value + trade_in_value',
                'trade_in_value' => '(loan_amount + money_you_have - price_of_the_car)/(sales_tax - 1)',
                'sales_tax' => '(loan_amount + money_you_have - price_of_the_car + trade_in_value)/trade_in_value',
            ],
        ],
        [
            'title' => 'monthly_payment = (loan_amount) * (interest_rate / 12) / (1 - (1 + (interest_rate / 12)) ^ (- loan_term))',
            'results' => ['loan_amount' => '12*monthly_payment*(-pow(12, loan_term) + pow(interest_rate + 12, loan_term))*pow(interest_rate + 12, -loan_term)/interest_rate', 'monthly_payment' => '(1/12)*interest_rate*loan_amount*pow(interest_rate + 12, loan_term)/(-pow(12, loan_term) + pow(interest_rate + 12, loan_term))'],
        ],
        [
            'title' => 'total_interest_paid =  monthly_payment * loan_term - loan_amount',
            'results' => ['loan_amount' => 'loan_term*monthly_payment - total_interest_paid', 'loan_term' => '(loan_amount + total_interest_paid)/monthly_payment', 'total_interest_paid' => '-loan_amount + loan_term*monthly_payment', 'monthly_payment' => '(loan_amount + total_interest_paid)/loan_term'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Price of the car, Money you have and Trade in value into Auto loan and the answer comes back as Monthly payment and Total interest paid. It is a single relationship that reads monthly payment out of price of the car, not a table of canned results keyed by them. Units for Monthly payment default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Auto loan calculator works', 'html' => <<<'TXT'
            <p>Auto loan answers one question from 7 numbers, and the answer is Monthly payment and Total interest paid.</p><p>In the form&#039;s own words, Loan amount = − Money you have + Price of the car + Sales tax × Trade in value − Trade in value.</p><p>The result panel carries Monthly payment and Total interest paid, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 7 boxes and the page has everything it needs.</p><ul><li><strong>Price of the car</strong> — in USD</li><li><strong>Money you have</strong> — in USD</li><li><strong>Trade in value</strong> — in USD. The value of your current car</li><li><strong>Sales tax</strong> — in percent</li><li><strong>Loan amount</strong> — in USD</li><li><strong>Interest rate</strong> — in percent</li><li><strong>Loan term</strong> — in years / months</li></ul><p>What you get back is Monthly payment in USD, Total interest paid in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>The unit chip on Sales tax lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>'],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Loan amount</strong> = <code>− Money you have + Price of the car + Sales tax × Trade in value − Trade in value</code></li><li><strong>Money you have</strong> = <code>− Loan amount + Price of the car + Sales tax × Trade in value − Trade in value</code></li><li><strong>Price of the car</strong> = <code>Loan amount + Money you have − Sales tax × Trade in value + Trade in value</code></li><li><strong>Trade in value</strong> = <code>(Loan amount + Money you have − Price of the car) ÷ (Sales tax − 1)</code></li><li><strong>Sales tax</strong> = <code>(Loan amount + Money you have − Price of the car + Trade in value) ÷ Trade in value</code></li><li><strong>Monthly payment</strong> = <code>(1 ÷ 12) × Interest rate × Loan amount × (Interest rate + 12)^(Loan term) ÷ ( − (12)^(Loan term) + (Interest rate + 12)^(Loan term))</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Loan amount</strong> = <code>− Money you have + Price of the car + Sales tax × Trade in value − Trade in value</code> — the form to use when Money you have, Price of the car, Sales tax and Trade in value are the values you have.</li><li><strong>Money you have</strong> = <code>− Loan amount + Price of the car + Sales tax × Trade in value − Trade in value</code> — the form to use when Loan amount, Price of the car, Sales tax and Trade in value are the values you have.</li><li><strong>Price of the car</strong> = <code>Loan amount + Money you have − Sales tax × Trade in value + Trade in value</code> — the form to use when Loan amount, Money you have, Sales tax and Trade in value are the values you have.</li><li><strong>Trade in value</strong> = <code>(Loan amount + Money you have − Price of the car) ÷ (Sales tax − 1)</code> — the form to use when Loan amount, Money you have, Price of the car and Sales tax are the values you have.</li><li><strong>Sales tax</strong> = <code>(Loan amount + Money you have − Price of the car + Trade in value) ÷ Trade in value</code> — the form to use when Loan amount, Money you have, Price of the car and Trade in value are the values you have.</li><li><strong>Monthly payment</strong> = <code>(1 ÷ 12) × Interest rate × Loan amount × (Interest rate + 12)^(Loan term) ÷ ( − (12)^(Loan term) + (Interest rate + 12)^(Loan term))</code> — the form to use when Interest rate, Loan amount and Loan term are the values you have.</li><li><strong>Loan amount</strong> = <code>12 × Monthly payment × ( − (12)^(Loan term) + (Interest rate + 12)^(Loan term)) × (Interest rate + 12)^(− Loan term) ÷ Interest rate</code> — the form to use when Monthly payment, Loan term and Interest rate are the values you have.</li><li><strong>Total interest paid</strong> = <code>− Loan amount + Loan term × Monthly payment</code> — the form to use when Loan amount, Loan term and Monthly payment are the values you have.</li></ul><p>Any one of Loan amount, Money you have and Price of the car can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Sales tax, Interest rate and Loan term carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Monthly payment and Total interest paid are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Price of the car left as a guess.</strong> Anything typed into Price of the car is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Money you have left as a guess.</strong> Anything typed into Money you have is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Price of the car to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Auto loan form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Price of the car</strong> takes a plain number with no unit attached. It feeds Money you have, Loan amount and Trade in value. Fill it from a measurement rather than a memory — Price of the car is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Money you have</strong> takes a plain number with no unit attached. It feeds Loan amount, Price of the car and Trade in value. Fill it from a measurement rather than a memory — Money you have is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Trade in value</strong> takes a plain number with no unit attached. The value of your current car. It feeds Money you have, Loan amount and Price of the car. Fill it from a measurement rather than a memory — Trade in value is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Sales tax</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Money you have, Loan amount and Price of the car. Fill it from a measurement rather than a memory — Sales tax is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Loan amount</strong> takes a plain number with no unit attached. It feeds Money you have, Price of the car and Trade in value. Fill it from a measurement rather than a memory — Loan amount is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Interest rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Loan amount and Monthly payment. Fill it from a measurement rather than a memory — Interest rate is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Loan term</strong> is a years / months quantity: the page opens it in yrsmos and converts anything else you pick before the formula runs. It feeds Loan amount, Monthly payment and Total interest paid. Fill it from a measurement rather than a memory — Loan term is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 2 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Monthly payment</strong> is a plain number. It is computed from Interest rate, Loan amount and Loan term, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Total interest paid</strong> is a plain number. It is computed from Loan amount, Loan term and Monthly payment, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Auto loan actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>years / months</strong> — opens in <em>yrsmos</em>, and the chip also carries min, hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Monthly payment is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The chips cover percent and years / months. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Price of the car, Money you have and Trade in value is what you already know and Monthly payment and Total interest paid is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/rental-commission">Rental commission Calculator</a>, <a href="/finance/rental-property">Rental property</a> and <a href="/finance/reserve-ratio">Reserve ratio Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Auto loan calculator work out?', 'a' => <<<'TXT'
            Monthly payment and Total interest paid, from Money you have, Price of the car, Sales tax and Trade in value. The relationship is Loan amount = − Money you have + Price of the car + Sales tax × Trade in value − Trade in value.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Price of the car (USD), Money you have (USD), Trade in value (USD), Sales tax (percent), Loan amount (USD). Enter price of the car, money you have and trade in value; Monthly payment is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Loan amount, Money you have, Price of the car and Trade in value blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Monthly payment is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Price of the car blank and the page solves for it, reporting Monthly payment instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Monthly payment keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/rental-commission', 'name' => 'Rental commission Calculator'],
            ['path' => '/finance/rental-property', 'name' => 'Rental property'],
            ['path' => '/finance/reserve-ratio', 'name' => 'Reserve ratio Calculator'],
        ],
        'authors' => [],
    ],
];
