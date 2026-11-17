<?php

/**
 * Currency forward
 * /finance/currency-forward
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Currency forward',
    'meta' => ['title' => 'Currency forward Calculator: Free, With Steps', 'description' => 'Currency forward takes number of days in the forward contract and returns price currency interest rate. The formula is printed in the form\'s own words.', 'h1' => 'Currency forward Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'days',
                            'label' => 'Number of days in the forward contract',
                            'type' => 'number',
                            'suffix' => 'days',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Price currency interest rate',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ann_price_cur_interest_rate',
                            'label' => 'Annualised price currency interest rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price_cur_interest_rate',
                            'label' => 'Price currency interest rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Base currency interest rate',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ann_base_cur_interest_rate',
                            'label' => 'Annualised base currency interest rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'base_cur_interest_rate',
                            'label' => 'Base currency interest rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Currency forward',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'spot_price',
                            'label' => 'Spot price',
                            'type' => 'number',
                            'rounding' => ['standard', '4'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cur_forward_price',
                            'label' => 'Currency forward price',
                            'type' => 'number',
                            'rounding' => ['standard', '4'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'cur_forward_price = spot_price * ((1 + price_cur_interest_rate) / (1 + base_cur_interest_rate))',
            'results' => ['base_cur_interest_rate' => '(-cur_forward_price + price_cur_interest_rate*spot_price + spot_price)/cur_forward_price', 'spot_price' => 'cur_forward_price*(base_cur_interest_rate + 1)/(price_cur_interest_rate + 1)', 'price_cur_interest_rate' => '(base_cur_interest_rate*cur_forward_price + cur_forward_price - spot_price)/spot_price', 'cur_forward_price' => 'spot_price*(price_cur_interest_rate + 1)/(base_cur_interest_rate + 1)'],
        ],
        [
            'title' => 'price_cur_interest_rate = ann_price_cur_interest_rate * (days / 360)',
            'results' => ['days' => '360*price_cur_interest_rate/ann_price_cur_interest_rate', 'ann_price_cur_interest_rate' => '360*price_cur_interest_rate/days', 'price_cur_interest_rate' => '(1/360)*ann_price_cur_interest_rate*days'],
        ],
        [
            'title' => 'base_cur_interest_rate =  ann_base_cur_interest_rate * (days / 360)',
            'results' => ['days' => '360*base_cur_interest_rate/ann_base_cur_interest_rate', 'base_cur_interest_rate' => '(1/360)*ann_base_cur_interest_rate*days', 'ann_base_cur_interest_rate' => '360*base_cur_interest_rate/days'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Currency forward turns Price currency interest rate, Base currency interest rate and Spot price into Number of days in the forward contract and Annualised price currency interest rate. It is a single relationship that reads number of days in the forward contract out of price currency interest rate, not a table of canned results keyed by them. Units for Number of days in the forward contract default to days and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Currency forward calculator works', 'html' => <<<'TXT'
            <p>Currency forward answers one question from 3 numbers, and the answer is Number of days in the forward contract, Annualised price currency interest rate and Annualised base currency interest rate.</p><p>The relationship it solves reads Currency forward price = Spot price × (Price currency interest rate + 1) ÷ (Base currency interest rate + 1).</p><p>The answers are Number of days in the forward contract, Annualised price currency interest rate, Annualised base currency interest rate and Currency forward price; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Price currency interest rate</strong> — in percent</li><li><strong>Base currency interest rate</strong> — in percent</li><li><strong>Spot price</strong> — a plain number, no unit</li></ul><p>What you get back is Number of days in the forward contract in days, Annualised price currency interest rate in percent, Annualised base currency interest rate in percent, Currency forward price, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Number of days in the forward contract = 10 days, Annualised price currency interest rate = 100 perc, Price currency interest rate = 1000 perc, Annualised base currency interest rate = 10 perc, Spot price = 100 and Currency forward price = 1000; the answers are <strong>Base currency interest rate</strong> = 99.1 perc.</p><ul><li><strong>Base currency interest rate</strong> = 99.1 perc</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Currency forward price</strong> = <code>Spot price × (Price currency interest rate + 1) ÷ (Base currency interest rate + 1)</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Base currency interest rate</strong> = 99.1 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Annualised price currency interest rate offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Currency forward price</strong> = <code>Spot price × (Price currency interest rate + 1) ÷ (Base currency interest rate + 1)</code></li><li><strong>Base currency interest rate</strong> = <code>( − Currency forward price + Price currency interest rate × Spot price + Spot price) ÷ Currency forward price</code></li><li><strong>Spot price</strong> = <code>Currency forward price × (Base currency interest rate + 1) ÷ (Price currency interest rate + 1)</code></li><li><strong>Price currency interest rate</strong> = <code>(Base currency interest rate × Currency forward price + Currency forward price − Spot price) ÷ Spot price</code></li><li><strong>Number of days in the forward contract</strong> = <code>360 × Price currency interest rate ÷ Annualised price currency interest rate</code></li><li><strong>Annualised price currency interest rate</strong> = <code>360 × Price currency interest rate ÷ Number of days in the forward contract</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Currency forward price</strong> = <code>Spot price × (Price currency interest rate + 1) ÷ (Base currency interest rate + 1)</code> — the form to use when Spot price, Price currency interest rate and Base currency interest rate are the values you have.</li><li><strong>Base currency interest rate</strong> = <code>( − Currency forward price + Price currency interest rate × Spot price + Spot price) ÷ Currency forward price</code> — the form to use when Currency forward price, Price currency interest rate and Spot price are the values you have.</li><li><strong>Spot price</strong> = <code>Currency forward price × (Base currency interest rate + 1) ÷ (Price currency interest rate + 1)</code> — the form to use when Currency forward price, Base currency interest rate and Price currency interest rate are the values you have.</li><li><strong>Price currency interest rate</strong> = <code>(Base currency interest rate × Currency forward price + Currency forward price − Spot price) ÷ Spot price</code> — the form to use when Base currency interest rate, Currency forward price and Spot price are the values you have.</li><li><strong>Price currency interest rate</strong> = <code>(1 ÷ 360) × Annualised price currency interest rate × Number of days in the forward contract</code> — the form to use when Annualised price currency interest rate and Number of days in the forward contract are the values you have.</li><li><strong>Number of days in the forward contract</strong> = <code>360 × Price currency interest rate ÷ Annualised price currency interest rate</code> — the form to use when Price currency interest rate and Annualised price currency interest rate are the values you have.</li><li><strong>Annualised price currency interest rate</strong> = <code>360 × Price currency interest rate ÷ Number of days in the forward contract</code> — the form to use when Price currency interest rate and Number of days in the forward contract are the values you have.</li><li><strong>Base currency interest rate</strong> = <code>(1 ÷ 360) × Annualised base currency interest rate × Number of days in the forward contract</code> — the form to use when Annualised base currency interest rate and Number of days in the forward contract are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Currency forward price, Base currency interest rate and Spot price can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Number of days in the forward contract from 10 to 20, leaving every other box alone. The panel moves from <strong>Base currency interest rate</strong> 99.1 perc to <strong>Base currency interest rate</strong> 99.1 perc.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Price currency interest rate and Base currency interest rate is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Number of days in the forward contract, Annualised price currency interest rate and Annualised base currency interest rate are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Price currency interest rate left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Price currency interest rate is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Base currency interest rate left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Base currency interest rate is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Price currency interest rate and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Currency forward form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Price currency interest rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Change it and Base currency interest rate, Spot price and Currency forward price changes with it. Fill it from a measurement rather than a memory — Price currency interest rate is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Base currency interest rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Change it and Spot price, Price currency interest rate and Currency forward price changes with it. Fill it from a measurement rather than a memory — Base currency interest rate is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Spot price</strong> takes a plain number with no unit attached. Change it and Base currency interest rate, Price currency interest rate and Currency forward price changes with it. Fill it from a measurement rather than a memory — Spot price is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Number of days in the forward contract</strong> is a plain number. It is worked out from Price currency interest rate and Annualised price currency interest rate. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Annualised price currency interest rate</strong> is a percent figure. It is worked out from Price currency interest rate and Number of days in the forward contract. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Annualised base currency interest rate</strong> is a percent figure. It is worked out from Base currency interest rate and Number of days in the forward contract. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Currency forward price</strong> is a plain number. It is worked out from Spot price, Price currency interest rate and Base currency interest rate. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Number of days in the forward contract follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Price currency interest rate, Base currency interest rate and Spot price measured, Number of days in the forward contract and Annualised price currency interest rate wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/70-20-10-rule-money">70/20/10 rule money Calculator</a>, <a href="/finance/ar-days">A/R days Calculator</a> and <a href="/finance/absence-percentage">Absence percentage Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Currency forward calculator work out?', 'a' => <<<'TXT'
            Number of days in the forward contract, Annualised price currency interest rate, Annualised base currency interest rate and Currency forward price, from Spot price, Price currency interest rate and Base currency interest rate. The relationship is Currency forward price = Spot price × (Price currency interest rate + 1) ÷ (Base currency interest rate + 1).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Price currency interest rate (percent), Base currency interest rate (percent), Spot price. Enter price currency interest rate, base currency interest rate and spot price; Number of days in the forward contract is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Currency forward price, Base currency interest rate, Spot price and Price currency interest rate can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Base currency interest rate = 99.1 perc. Those are the defaults written into the form — move Price currency interest rate and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Number of days in the forward contract is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave Price currency interest rate blank and the page solves for it, reporting Number of days in the forward contract instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Number of days in the forward contract keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/70-20-10-rule-money', 'name' => '70/20/10 rule money Calculator'],
            ['path' => '/finance/ar-days', 'name' => 'A/R days Calculator'],
            ['path' => '/finance/absence-percentage', 'name' => 'Absence percentage Calculator'],
        ],
        'authors' => [],
    ],
];
