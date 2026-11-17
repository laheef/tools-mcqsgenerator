<?php

/**
 * Rent or buy
 * /finance/rent-or-buy
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Rent or buy',
    'meta' => ['title' => 'Rent or buy Calculator: Formula, Steps & Examples', 'description' => 'Rent or buy reports rent cost, total rent cost, mortgage left and buy cost. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Rent or buy Calculator', 'updated' => '2026-09-09'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'staying_period',
                            'label' => 'Staying period',
                            'type' => 'number',
                            'help' => 'The period you plan to stay in the apartment.',
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
                            'name' => 'money',
                            'label' => 'Money you have',
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
            'title' => 'Rent',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rent_price',
                            'label' => 'Rent price',
                            'type' => 'number',
                            'help' => 'The price you pay periodically to the property owner.',
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
                            'name' => 'agent_commision',
                            'label' => 'Agent commision',
                            'type' => 'number',
                            'help' => 'The one-off payment you pay to your estate agent.',
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
                            'name' => 'other_costs',
                            'label' => 'Other costs',
                            'type' => 'number',
                            'help' => 'All other costs related to renting (e.g. costs of moving-in, minor adjustments, additional furniture).',
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
                            'name' => 'interest_rate_deposit',
                            'label' => 'Interest rate (deposit)',
                            'type' => 'number',
                            'help' => 'The average yearly deposit interest rate in your bank.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rent_cost',
                            'label' => 'Rent cost',
                            'type' => 'number',
                            'help' => 'Cost of renting to be covered in each period.',
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
                            'name' => 'total_rent_cost',
                            'label' => 'Total rent cost',
                            'type' => 'number',
                            'help' => 'The overall cost of renting within the whole period.',
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
            'title' => 'Buy',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'value_of_property',
                            'label' => 'Cost of the property',
                            'type' => 'number',
                            'help' => 'Total cost of purchase and adaptation of the property.',
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
                            'label' => 'Interest rate (mortgage)',
                            'type' => 'number',
                            'help' => 'Your mortgage rate for a fixed-rate loan.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5',
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
                            'name' => 'mortgage_left',
                            'label' => 'Mortgage left',
                            'type' => 'number',
                            'help' => 'The value of the mortgage at the time of selling the property.',
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
                            'name' => 'buying_commission',
                            'label' => 'Buying commission',
                            'type' => 'number',
                            'help' => 'Commission paid when buying a home.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '4',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'selling_commision',
                            'label' => 'Selling commision',
                            'type' => 'number',
                            'help' => 'Commission paid when selling a home.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '7',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'other_fees',
                            'label' => 'Other fees',
                            'type' => 'number',
                            'help' => 'Other fees related to buying and owning a house (annual property tax, home owner\'s insurance, home repairs and renovations).',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2.3',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'appreciation',
                            'label' => 'Appreciation',
                            'type' => 'number',
                            'help' => 'The annual growth rate of the home value.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'buy_cost',
                            'label' => 'Buy cost',
                            'type' => 'number',
                            'help' => 'Cost of buying to be covered in each period.',
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
                            'name' => 'total_buy_cost',
                            'label' => 'Total buy cost',
                            'type' => 'number',
                            'help' => 'The overall cost of buying within the whole period.',
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
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'total_rent_cost < total_buy_cost', 'text' => 'In your case, renting a house is cheaper — you will save approximately {{savings.monetaryValue}} in total.'],
                                ['when' => 'total_rent_cost > total_buy_cost', 'text' => 'In your case, buying a house is cheaper — you will save approximately {{savings.monetaryValue}} in total.'],
                                ['when' => 'total_rent_cost == total_buy_cost', 'text' => 'In your case, there is no difference whether you buy or rent a house.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'savings',
                            'label' => '',
                            'type' => 'presentation',
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
            'title' => 'rent_cost = rent_price - money * (interest_rate_deposit / 12)',
            'results' => ['money' => '12*(-rent_cost + rent_price)/interest_rate_deposit', 'rent_price' => '(1/12)*interest_rate_deposit*money + rent_cost', 'rent_cost' => '-1/12*interest_rate_deposit*money + rent_price', 'interest_rate_deposit' => '12*(-rent_cost + rent_price)/money'],
        ],
        [
            'title' => 'total_rent_cost = one_way(rent_cost * staying_period + agent_commision + other_costs)',
            'results' => ['total_rent_cost' => '(agent_commision + other_costs + rent_cost*staying_period)'],
        ],
        [
            'title' => 'buy_cost = (value_of_property - money) * (interest_rate / 12) / (1 - (1 + (interest_rate / 12)) ^ (- loan_term)) + ((other_fees / 12) * value_of_property)',
            'results' => ['buy_cost' => <<<'TXT'
            (1/12)*(pow(12, loan_term)*other_fees*value_of_property + interest_rate*money*pow(interest_rate + 12, loan_term) - interest_rate*value_of_property*pow(interest_rate + 12, loan_term) - other_fees*value_of_property*pow(interest_rate + 12, loan_term))/(pow(12, loan_term) - pow(interest_rate + 12, loan_term))
            TXT, 'value_of_property' => <<<'TXT'
            (-pow(12, loan_term + 1)*buy_cost + 12*buy_cost*pow(interest_rate + 12, loan_term) + interest_rate*money*pow(interest_rate + 12, loan_term))/(-pow(12, loan_term)*other_fees + interest_rate*pow(interest_rate + 12, loan_term) + other_fees*pow(interest_rate + 12, loan_term))
            TXT, 'money' => <<<'TXT'
            pow(interest_rate + 12, -loan_term)*(pow(12, loan_term)*(12*buy_cost - other_fees*value_of_property) + interest_rate*value_of_property*pow(interest_rate + 12, loan_term) + (-12*buy_cost + other_fees*value_of_property)*pow(interest_rate + 12, loan_term))/interest_rate
            TXT, 'other_fees' => <<<'TXT'
            (pow(12, loan_term + 1)*buy_cost - 12*buy_cost*pow(interest_rate + 12, loan_term) - interest_rate*money*pow(interest_rate + 12, loan_term) + interest_rate*value_of_property*pow(interest_rate + 12, loan_term))/(value_of_property*(pow(12, loan_term) - pow(interest_rate + 12, loan_term)))
            TXT],
        ],
        [
            'title' => <<<'TXT'
            total_buy_cost = one_way(buy_cost * staying_period + mortgage_left - value_of_property * (1 + appreciation / 12) ^ staying_period) + (buying_commission * value_of_property) + (selling_commision * (value_of_property * (1 + interest_rate / 12) ^ staying_period))
            TXT,
            'results' => ['selling_commision' => <<<'TXT'
            pow(interest_rate + 12, -2*staying_period)*pow(12*interest_rate + 144, staying_period)*(-buying_commission*value_of_property + total_buy_cost - (pow(12, -staying_period)*(pow(12, staying_period)*(buy_cost*staying_period + (pow(144, -staying_period)*(pow(12, staying_period)*pow(interest_rate + 12, loan_term + staying_period)*(money - value_of_property) + pow(144, staying_period)*pow(interest_rate + 12, loan_term)*(-money + value_of_property) + (-pow(12, loan_term) + pow(interest_rate + 12, loan_term))*pow(12*interest_rate + 144, staying_period)*(-money + value_of_property))/(-pow(12, loan_term) + pow(interest_rate + 12, loan_term)))) - value_of_property*pow(appreciation + 12, staying_period))))/value_of_property
            TXT, 'buying_commission' => <<<'TXT'
            total_buy_cost/value_of_property - (buy_cost*staying_period + (pow(144, -staying_period)*(pow(12, staying_period)*pow(interest_rate + 12, loan_term + staying_period)*(money - value_of_property) + pow(144, staying_period)*pow(interest_rate + 12, loan_term)*(-money + value_of_property) + (-pow(12, loan_term) + pow(interest_rate + 12, loan_term))*pow(12*interest_rate + 144, staying_period)*(-money + value_of_property))/(-pow(12, loan_term) + pow(interest_rate + 12, loan_term))) - pow(12, -staying_period)*value_of_property*pow(appreciation + 12, staying_period))/value_of_property - pow(12, -staying_period)*selling_commision*pow(interest_rate + 12, staying_period)
            TXT, 'interest_rate' => <<<'TXT'
            pow(-pow(12, staying_period)*(buying_commission*value_of_property - total_buy_cost + (pow(12, -staying_period)*(pow(12, staying_period)*(buy_cost*staying_period + (pow(144, -staying_period)*(pow(12, staying_period)*pow(interest_rate + 12, loan_term + staying_period)*(money - value_of_property) + pow(144, staying_period)*pow(interest_rate + 12, loan_term)*(-money + value_of_property) + (-pow(12, loan_term) + pow(interest_rate + 12, loan_term))*pow(12*interest_rate + 144, staying_period)*(-money + value_of_property))/(-pow(12, loan_term) + pow(interest_rate + 12, loan_term)))) - value_of_property*pow(appreciation + 12, staying_period))))/(selling_commision*value_of_property), 1/staying_period) - 12
            TXT, 'total_buy_cost' => <<<'TXT'
            buying_commission*value_of_property + (buy_cost*staying_period + (pow(144, -staying_period)*(pow(12, staying_period)*pow(interest_rate + 12, loan_term + staying_period)*(money - value_of_property) + pow(144, staying_period)*pow(interest_rate + 12, loan_term)*(-money + value_of_property) + (-pow(12, loan_term) + pow(interest_rate + 12, loan_term))*pow(12*interest_rate + 144, staying_period)*(-money + value_of_property))/(-pow(12, loan_term) + pow(interest_rate + 12, loan_term))) - pow(12, -staying_period)*value_of_property*pow(appreciation + 12, staying_period)) + pow(12, -staying_period)*selling_commision*value_of_property*pow(interest_rate + 12, staying_period)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            mortgage_left = one_way(((value_of_property - money) * (1 + interest_rate / 12) ^ staying_period) - ((value_of_property - money) * (1 + interest_rate / 12) ^ loan_term) * ((interest_rate / 12) / ((1 + interest_rate / 12) ^ loan_term -1)) * ((1 + interest_rate / 12) ^ staying_period - 1) / (interest_rate / 12))
            TXT,
            'results' => ['mortgage_left' => <<<'TXT'
            (pow(144, -staying_period)*(pow(12, staying_period)*pow(interest_rate + 12, loan_term + staying_period)*(money - value_of_property) + pow(144, staying_period)*pow(interest_rate + 12, loan_term)*(-money + value_of_property) + (-pow(12, loan_term) + pow(interest_rate + 12, loan_term))*pow(12*interest_rate + 144, staying_period)*(-money + value_of_property))/(-pow(12, loan_term) + pow(interest_rate + 12, loan_term)))
            TXT],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Rent or buy takes Money you have, Rent price and Interest rate (deposit) and returns Rent cost and Total rent cost. The arithmetic is the whole method: rent cost is worked out from money you have by one formula, applied once. Rent cost comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Rent or buy calculator works', 'html' => <<<'TXT'
            <p>The Rent or buy calculator applies one relationship to 3 numbers and reports Rent cost, Total rent cost and Cost of the property.</p><p>Written with the labels from the form, Rent cost = − 1 ÷ 12 × Interest rate (deposit) × Money you have + Rent price.</p><p>What comes back is Rent cost, Total rent cost, Cost of the property and Interest rate (mortgage) — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Money you have</strong> — in USD</li><li><strong>Rent price</strong> — in USD. The price you pay periodically to the property owner.</li><li><strong>Interest rate (deposit)</strong> — in percent. The average yearly deposit interest rate in your bank.</li></ul><p>What you get back is Rent cost in USD, Total rent cost in USD, Cost of the property in USD, Interest rate (mortgage) in percent, Mortgage left in USD, Buying commission in percent, Selling commision in percent, Other fees in percent, Buy cost in USD, Total buy cost in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Interest rate (mortgage) offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Rent cost</strong> = <code>− 1 ÷ 12 × Interest rate (deposit) × Money you have + Rent price</code></li><li><strong>Money you have</strong> = <code>12 × ( − Rent cost + Rent price) ÷ Interest rate (deposit)</code></li><li><strong>Rent price</strong> = <code>(1 ÷ 12) × Interest rate (deposit) × Money you have + Rent cost</code></li><li><strong>Interest rate (deposit)</strong> = <code>12 × ( − Rent cost + Rent price) ÷ Money you have</code></li><li><strong>Total rent cost</strong> = <code>(Agent commision + Other costs + Rent cost × Staying period)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Rent cost</strong> = <code>− 1 ÷ 12 × Interest rate (deposit) × Money you have + Rent price</code> — the form to use when Interest rate (deposit), Money you have and Rent price are the values you have.</li><li><strong>Money you have</strong> = <code>12 × ( − Rent cost + Rent price) ÷ Interest rate (deposit)</code> — the form to use when Rent cost, Rent price and Interest rate (deposit) are the values you have.</li><li><strong>Rent price</strong> = <code>(1 ÷ 12) × Interest rate (deposit) × Money you have + Rent cost</code> — the form to use when Interest rate (deposit), Money you have and Rent cost are the values you have.</li><li><strong>Interest rate (deposit)</strong> = <code>12 × ( − Rent cost + Rent price) ÷ Money you have</code> — the form to use when Rent cost, Rent price and Money you have are the values you have.</li><li><strong>Total rent cost</strong> = <code>(Agent commision + Other costs + Rent cost × Staying period)</code> — the form to use when Agent commision, Other costs, Rent cost and Staying period are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Rent cost, Money you have and Rent price can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Interest rate (deposit) is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Rent cost, Total rent cost and Cost of the property are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Money you have left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Money you have is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Rent price left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Rent price is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Money you have to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Rent or buy form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Money you have</strong> takes a plain number with no unit attached. It feeds Rent price, Rent cost and Interest rate (deposit). Fill it from a measurement rather than a memory — Money you have is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Rent price</strong> takes a plain number with no unit attached. The price you pay periodically to the property owner. It feeds Money you have, Rent cost and Interest rate (deposit). Fill it from a measurement rather than a memory — Rent price is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Interest rate (deposit)</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The average yearly deposit interest rate in your bank. It feeds Money you have, Rent price and Rent cost. Fill it from a measurement rather than a memory — Interest rate (deposit) is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 10 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Rent cost</strong> is a plain number. The value follows from Interest rate (deposit), Money you have and Rent price. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Total rent cost</strong> is a plain number. The value follows from Agent commision, Other costs, Rent cost and Staying period. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Cost of the property</strong> is a plain number. The value follows from Loan term, Buy cost, Interest rate (mortgage) and Money you have. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Interest rate (mortgage)</strong> is a percent figure. The value follows from Staying period, Buying commission, Cost of the property and Total buy cost. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Mortgage left</strong> is a plain number. The value follows from Staying period, Interest rate (mortgage), Loan term and Money you have. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Buying commission</strong> is a percent figure. The value follows from Total buy cost, Cost of the property, Buy cost and Staying period. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Selling commision</strong> is a percent figure. The value follows from Interest rate (mortgage), Staying period, Buying commission and Cost of the property. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Other fees</strong> is a percent figure. The value follows from Loan term, Buy cost, Interest rate (mortgage) and Money you have. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Buy cost</strong> is a plain number. The value follows from Loan term, Other fees, Cost of the property and Interest rate (mortgage). Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Total buy cost</strong> is a plain number. The value follows from Buying commission, Cost of the property, Buy cost and Staying period. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Rent cost is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Money you have, Rent price and Interest rate (deposit) and the number you are missing is Rent cost and Total rent cost.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/revenue">Revenue Calculator</a>, <a href="/finance/revenue-growth">Revenue growth Calculator</a> and <a href="/finance/revenue-per-employee">Revenue per employee</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Rent or buy calculator work out?', 'a' => <<<'TXT'
            Rent cost, Total rent cost, Cost of the property and Interest rate (mortgage), from Interest rate (deposit), Money you have and Rent price. The relationship is Rent cost = − 1 ÷ 12 × Interest rate (deposit) × Money you have + Rent price.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Money you have (USD), Rent price (USD), Interest rate (deposit) (percent). With money you have, rent price and interest rate (deposit) in place, Rent cost can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Rent cost, Money you have, Rent price and Interest rate (deposit) can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Rent cost is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Money you have blank and the page solves for it, reporting Rent cost instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Rent cost keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/revenue', 'name' => 'Revenue Calculator'],
            ['path' => '/finance/revenue-growth', 'name' => 'Revenue growth Calculator'],
            ['path' => '/finance/revenue-per-employee', 'name' => 'Revenue per employee'],
        ],
        'authors' => [],
    ],
];
