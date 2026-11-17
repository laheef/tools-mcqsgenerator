<?php

/**
 * Car lease
 * /finance/car-lease
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Car lease',
    'meta' => ['title' => 'Car lease Calculator: Formula, Steps & Examples', 'description' => 'Car lease turns MSRP, negotiated selling price and lease term into negotiation ded and money factor. Results come back in USD, with any other unit a click away.', 'h1' => 'Car lease Calculator', 'updated' => '2025-10-03'],
    'sections' => [
        [
            'title' => 'Basic information',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'msrp',
                            'label' => 'MSRP',
                            'type' => 'number',
                            'help' => 'Manufacturer\'s suggested retail price or the sticker price.',
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
                            'name' => 'negotiated_price',
                            'label' => 'Negotiated selling price',
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
                            'name' => 'negotiation_ded',
                            'label' => 'Negotiation ded',
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
                            'name' => 'lease_term',
                            'label' => 'Lease term',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'mos',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '36',
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
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '6',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'residual_factor',
                            'label' => 'Residual factor',
                            'type' => 'number',
                            'help' => 'Determines the value of your car at the end of the lease term. You can get this information from your dealer.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '60',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'money_factor',
                            'label' => 'Money factor',
                            'type' => 'number',
                            'help' => 'Determines the monthly interest you will pay during the term of your lease. You can get this information from your dealer.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.001',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'lease_charge',
                            'label' => 'Lease charge',
                            'type' => 'number',
                            'help' => 'Determines the monthly interest you will pay during the term of your lease. You can get this information from your dealer.',
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
            'title' => 'Additional information',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dealer_fee',
                            'label' => 'Dealer fee',
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
                            'name' => 'reg_fee',
                            'label' => 'Registration fee',
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
                            'name' => 'down_payment',
                            'label' => 'Down payment',
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
                            'name' => 'tradein_value',
                            'label' => 'Trade-in value',
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
                            'name' => 'other_reductions',
                            'label' => 'Other reductions',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
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
                            'name' => 'capitalized_cost',
                            'label' => 'Net capitalized cost',
                            'type' => 'number',
                            'help' => 'Total amount on which lease is financed.',
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
                            'name' => 'residual_value',
                            'label' => 'Residual value',
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
                            'name' => 'depreciation_value',
                            'label' => 'Monthly depreciation fee',
                            'type' => 'number',
                            'help' => 'Takes into account the reduction in the value of the car over time.',
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
                            'name' => 'monthly_interest',
                            'label' => 'Monthly lease fee',
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
                            'name' => 'monthly_pay_notax',
                            'label' => 'Monthly lease payment (Excl.tax)',
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
                            'name' => 'monthly_tax',
                            'label' => 'Monthly sales tax',
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
                            'name' => 'monthly_payment',
                            'label' => 'Monthly lease payment (Incl. tax)',
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
            'title' => ' negotiation_ded= msrp-negotiated_price',
            'results' => ['negotiation_ded' => 'msrp - negotiated_price', 'negotiated_price' => 'msrp - negotiation_ded', 'msrp' => 'negotiated_price + negotiation_ded'],
        ],
        [
            'title' => 'capitalized_cost=(msrp+dealer_fee+reg_fee)-(down_payment+tradein_value+other_reductions+ negotiation_ded)',
            'results' => [
                'down_payment' => '-capitalized_cost + dealer_fee + msrp - negotiation_ded - other_reductions + reg_fee - tradein_value',
                'tradein_value' => '-capitalized_cost + dealer_fee - down_payment + msrp - negotiation_ded - other_reductions + reg_fee',
                'other_reductions' => '-capitalized_cost + dealer_fee - down_payment + msrp - negotiation_ded + reg_fee - tradein_value',
                'capitalized_cost' => 'dealer_fee - down_payment + msrp - negotiation_ded - other_reductions + reg_fee - tradein_value',
                'negotiation_ded' => '-capitalized_cost + dealer_fee - down_payment + msrp - other_reductions + reg_fee - tradein_value',
                'reg_fee' => 'capitalized_cost - dealer_fee + down_payment - msrp + negotiation_ded + other_reductions + tradein_value',
                'dealer_fee' => 'capitalized_cost + down_payment - msrp + negotiation_ded + other_reductions - reg_fee + tradein_value',
                'msrp' => 'capitalized_cost - dealer_fee + down_payment + negotiation_ded + other_reductions - reg_fee + tradein_value',
            ],
        ],
        [
            'title' => 'residual_value=residual_factor*msrp/100',
            'results' => ['residual_value' => '(1/100)*msrp*residual_factor', 'residual_factor' => '100*residual_value/msrp', 'msrp' => '100*residual_value/residual_factor'],
        ],
        [
            'title' => 'depreciation_value=(capitalized_cost - residual_value)/lease_term',
            'results' => ['capitalized_cost' => 'depreciation_value*lease_term + residual_value', 'residual_value' => 'capitalized_cost - depreciation_value*lease_term', 'depreciation_value' => '(capitalized_cost - residual_value)/lease_term', 'lease_term' => '(capitalized_cost - residual_value)/depreciation_value'],
        ],
        [
            'title' => 'money_factor=lease_charge/((capitalized_cost+residual_value)*lease_term)',
            'results' => [
                'lease_charge' => 'lease_term*money_factor*(capitalized_cost + residual_value)',
                'residual_value' => '-capitalized_cost + lease_charge/(lease_term*money_factor)',
                'lease_term' => 'lease_charge/(money_factor*(capitalized_cost + residual_value))',
                'money_factor' => 'lease_charge/(lease_term*(capitalized_cost + residual_value))',
                'capitalized_cost' => 'lease_charge/(lease_term*money_factor) - residual_value',
            ],
        ],
        [
            'title' => 'monthly_interest=(capitalized_cost+residual_value)*money_factor',
            'results' => ['capitalized_cost' => '-residual_value + monthly_interest/money_factor', 'residual_value' => '-capitalized_cost + monthly_interest/money_factor', 'monthly_interest' => 'money_factor*(capitalized_cost + residual_value)', 'money_factor' => 'monthly_interest/(capitalized_cost + residual_value)'],
        ],
        [
            'title' => 'monthly_tax=(depreciation_value + monthly_interest)*sales_tax/100',
            'results' => ['monthly_tax' => '(1/100)*sales_tax*(depreciation_value + monthly_interest)', 'depreciation_value' => '-monthly_interest + 100*monthly_tax/sales_tax', 'monthly_interest' => '-depreciation_value + 100*monthly_tax/sales_tax', 'sales_tax' => '100*monthly_tax/(depreciation_value + monthly_interest)'],
        ],
        [
            'title' => 'monthly_payment=depreciation_value+monthly_tax+monthly_interest',
            'results' => ['monthly_tax' => '-depreciation_value - monthly_interest + monthly_payment', 'depreciation_value' => '-monthly_interest + monthly_payment - monthly_tax', 'monthly_payment' => 'depreciation_value + monthly_interest + monthly_tax', 'monthly_interest' => '-depreciation_value + monthly_payment - monthly_tax'],
        ],
        [
            'title' => 'monthly_pay_notax=depreciation_value+monthly_interest',
            'results' => ['depreciation_value' => '-monthly_interest + monthly_pay_notax', 'monthly_pay_notax' => 'depreciation_value + monthly_interest', 'monthly_interest' => '-depreciation_value + monthly_pay_notax'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Car lease takes MSRP and Negotiated selling price and returns Negotiation ded and Lease term. Nothing is looked up on this page: negotiation ded is computed from MSRP and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Negotiation ded is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Car lease calculator works', 'html' => <<<'TXT'
            <p>The Car lease calculator applies one relationship to 2 numbers and reports Negotiation ded, Lease term and Sales tax.</p><p>In the form&#039;s own words, Negotiation ded = MSRP − Negotiated selling price.</p><p>The result panel carries Negotiation ded, Lease term, Sales tax and Residual factor, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>MSRP</strong> — in USD. Manufacturer&#039;s suggested retail price or the sticker price.</li><li><strong>Negotiated selling price</strong> — in USD</li></ul><p>The answers come back as Negotiation ded in USD, Lease term in months, Sales tax in %, Residual factor, Money factor, Lease charge in USD, Dealer fee in USD, Registration fee in USD, Down payment in USD, Trade-in value in USD, Other reductions in USD, Net capitalized cost in USD, Residual value in USD, Monthly depreciation fee in USD, Monthly lease fee in USD, Monthly lease payment (Excl.tax) in USD, Monthly sales tax in USD, Monthly lease payment (Incl. tax) in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — MSRP = 10 USD, Negotiated selling price = 100 USD, Lease term = 36 mos, Sales tax = 6 %, Residual factor = 60, Money factor = 0.001, Lease charge = 10 USD, Dealer fee = 100 USD, Registration fee = 1000 USD, Down payment = 10 USD, Trade-in value = 100 USD, Other reductions = 1000 USD, Net capitalized cost = 10 USD, Residual value = 100 USD, Monthly depreciation fee = 1000 USD, Monthly lease fee = 10 USD, Monthly lease payment (Excl.tax) = 100 USD, Monthly sales tax = 1000 USD and Monthly lease payment (Incl. tax) = 10 USD — through the same formula and the panel reports <strong>Negotiation ded</strong> = -90 USD.</p><ul><li><strong>Negotiation ded</strong> = -90 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Negotiation ded</strong> = <code>MSRP − Negotiated selling price</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Negotiation ded</strong> = -90 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Lease term offers 5 units and opens on months, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Negotiation ded</strong> = <code>MSRP − Negotiated selling price</code></li><li><strong>Negotiated selling price</strong> = <code>MSRP − Negotiation ded</code></li><li><strong>MSRP</strong> = <code>Negotiated selling price + Negotiation ded</code></li><li><strong>Net capitalized cost</strong> = <code>Dealer fee − Down payment + MSRP − Negotiation ded − Other reductions + Registration fee − Trade-in value</code></li><li><strong>Down payment</strong> = <code>− Net capitalized cost + Dealer fee + MSRP − Negotiation ded − Other reductions + Registration fee − Trade-in value</code></li><li><strong>Trade-in value</strong> = <code>− Net capitalized cost + Dealer fee − Down payment + MSRP − Negotiation ded − Other reductions + Registration fee</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Negotiation ded</strong> = <code>MSRP − Negotiated selling price</code> — the form to use when MSRP and Negotiated selling price are the values you have.</li><li><strong>Negotiated selling price</strong> = <code>MSRP − Negotiation ded</code> — the form to use when MSRP and Negotiation ded are the values you have.</li><li><strong>MSRP</strong> = <code>Negotiated selling price + Negotiation ded</code> — the form to use when Negotiated selling price and Negotiation ded are the values you have.</li><li><strong>Net capitalized cost</strong> = <code>Dealer fee − Down payment + MSRP − Negotiation ded − Other reductions + Registration fee − Trade-in value</code> — the form to use when Dealer fee, Down payment, MSRP and Negotiation ded are the values you have.</li><li><strong>Down payment</strong> = <code>− Net capitalized cost + Dealer fee + MSRP − Negotiation ded − Other reductions + Registration fee − Trade-in value</code> — the form to use when Net capitalized cost, Dealer fee, MSRP and Negotiation ded are the values you have.</li><li><strong>Trade-in value</strong> = <code>− Net capitalized cost + Dealer fee − Down payment + MSRP − Negotiation ded − Other reductions + Registration fee</code> — the form to use when Net capitalized cost, Dealer fee, Down payment and MSRP are the values you have.</li><li><strong>Other reductions</strong> = <code>− Net capitalized cost + Dealer fee − Down payment + MSRP − Negotiation ded + Registration fee − Trade-in value</code> — the form to use when Net capitalized cost, Dealer fee, Down payment and MSRP are the values you have.</li><li><strong>Negotiation ded</strong> = <code>− Net capitalized cost + Dealer fee − Down payment + MSRP − Other reductions + Registration fee − Trade-in value</code> — the form to use when Net capitalized cost, Dealer fee, Down payment and MSRP are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Negotiation ded, Negotiated selling price and MSRP can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — MSRP, from 10 to 20 — and the answers go from <strong>Negotiation ded</strong> -90 USD to <strong>Negotiation ded</strong> -80 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Negotiation ded, Lease term and Sales tax are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>MSRP left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If MSRP is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Negotiated selling price left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Negotiated selling price is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in MSRP and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>MSRP</strong> takes a plain number with no unit attached. Manufacturer&#039;s suggested retail price or the sticker price. The page reads it when it works out Negotiation ded, Negotiated selling price and Down payment. Have it to hand before you start: MSRP is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Negotiated selling price</strong> takes a plain number with no unit attached. The page reads it when it works out Negotiation ded and MSRP. Have it to hand before you start: Negotiated selling price is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need MSRP and Negotiated selling price. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type MSRP into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Negotiation ded in USD with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Negotiation ded follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover months. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when MSRP and Negotiated selling price is what you already know and Negotiation ded and Lease term is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/revenue">Revenue Calculator</a>, <a href="/finance/revenue-growth">Revenue growth Calculator</a> and <a href="/finance/revenue-per-employee">Revenue per employee</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Car lease is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put MSRP and Negotiated selling price beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Car lease calculator work out?', 'a' => <<<'TXT'
            Negotiation ded, Lease term, Sales tax and Residual factor, from MSRP and Negotiated selling price. The relationship is Negotiation ded = MSRP − Negotiated selling price.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'MSRP (USD), Negotiated selling price (USD). With MSRP and negotiated selling price in place, Negotiation ded can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Negotiation ded, Negotiated selling price, MSRP and Net capitalized cost can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Negotiation ded = -90 USD. Those are the defaults written into the form — move MSRP and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Negotiation ded is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'A blank box is the question. With MSRP left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Negotiation ded keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/revenue', 'name' => 'Revenue Calculator'],
            ['path' => '/finance/revenue-growth', 'name' => 'Revenue growth Calculator'],
            ['path' => '/finance/revenue-per-employee', 'name' => 'Revenue per employee'],
        ],
        'authors' => [],
    ],
];
