<?php

/**
 * Lease
 * /finance/lease
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Lease',
    'meta' => ['title' => 'Lease Calculator: Formula, Steps & Examples', 'description' => 'Lease reports or in %, monthly payment, total payments and total interest. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Lease Calculator', 'updated' => '2026-09-27'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        This lease calculator helps you estimate the monthly payments, total interest and a total costs of any lease. Optionally, you can include down payments to reduce the total cost of owning the assets and lower the monthly instalments.
                        TXT],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Basic information',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Product_Value',
                            'label' => 'Product value',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.000001'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'Residual_Value',
                            'label' => 'Residual value,',
                            'type' => 'number',
                            'help' => 'Fill this field if the residual value is given as a percentage as a fixed value.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.000001'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'Residual_Value_Percentage',
                            'label' => 'or in %',
                            'type' => 'number',
                            'help' => 'Fill this field if the residual value is given as a percentage of the product value.',
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
                            'name' => 'Lease_term',
                            'label' => 'Lease term',
                            'type' => 'number',
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
                            'name' => 'Interest_rate',
                            'label' => 'Interest rate',
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
                            'name' => 'downpayment_bool',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Include down payment' => '1', '' => '0'],
                            'dataset' => 'if_downpayment',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'Down_payment',
                            'label' => 'Fixed ',
                            'type' => 'result',
                            'help' => 'Fill this field if the down payment is given as a fixed value.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'Down_payment_percentage',
                            'label' => 'or in %',
                            'type' => 'number',
                            'help' => 'Fill this field if the down payment is given as a percentage of the product value.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Lease_amount',
                            'label' => 'Lease amount',
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
            'title' => 'Results',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Monthly_Payment',
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
                            'name' => 'Total_Payments',
                            'label' => 'Total payments',
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
                            'name' => 'Total_interest',
                            'label' => 'Total interest',
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
                            'name' => 'Total_cost_to_own',
                            'label' => 'Total cost to own',
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
            'title' => 'Monthly_Payment = (Lease_amount * Interest_rate * (1 + Interest_rate) ^ Lease_term - Residual_Value * Interest_rate) / ((1 + Interest_rate) ^ Lease_term - 1)',
            'results' => ['Lease_term' => 'log((Interest_rate*Residual_Value - Monthly_Payment)/(Interest_rate*Lease_amount - Monthly_Payment))/log(Interest_rate + 1)', 'Lease_amount' => 'pow(Interest_rate + 1, -Lease_term)*(Interest_rate*Residual_Value + Monthly_Payment*pow(Interest_rate + 1, Lease_term) - Monthly_Payment)/Interest_rate', 'Residual_Value' => '(Interest_rate*Lease_amount*pow(Interest_rate + 1, Lease_term) - Monthly_Payment*pow(Interest_rate + 1, Lease_term) + Monthly_Payment)/Interest_rate', 'Monthly_Payment' => 'Interest_rate*(Lease_amount*pow(Interest_rate + 1, Lease_term) - Residual_Value)/(pow(Interest_rate + 1, Lease_term) - 1)'],
        ],
        [
            'title' => 'Total_Payments = Monthly_Payment * Lease_term',
            'results' => ['Lease_term' => 'Total_Payments/Monthly_Payment', 'Monthly_Payment' => 'Total_Payments/Lease_term', 'Total_Payments' => 'Lease_term*Monthly_Payment'],
        ],
        [
            'title' => 'Lease_amount = Product_Value - Down_payment',
            'results' => ['Lease_amount' => '-Down_payment + Product_Value', 'Down_payment' => '-Lease_amount + Product_Value', 'Product_Value' => 'Down_payment + Lease_amount'],
        ],
        [
            'title' => 'Down_payment_percentage = Down_payment / Product_Value',
            'results' => ['Down_payment_percentage' => 'Down_payment/Product_Value', 'Down_payment' => 'Down_payment_percentage*Product_Value', 'Product_Value' => 'Down_payment/Down_payment_percentage'],
        ],
        [
            'title' => 'Total_interest = Down_payment + Total_Payments + Residual_Value - Product_Value',
            'results' => [
                'Total_interest' => 'Down_payment - Product_Value + Residual_Value + Total_Payments',
                'Down_payment' => 'Product_Value - Residual_Value - Total_Payments + Total_interest',
                'Residual_Value' => '-Down_payment + Product_Value - Total_Payments + Total_interest',
                'Total_Payments' => '-Down_payment + Product_Value - Residual_Value + Total_interest',
                'Product_Value' => 'Down_payment + Residual_Value + Total_Payments - Total_interest',
            ],
        ],
        [
            'title' => 'Total_cost_to_own = Product_Value + Total_interest',
            'results' => ['Total_interest' => '-Product_Value + Total_cost_to_own', 'Total_cost_to_own' => 'Product_Value + Total_interest', 'Product_Value' => 'Total_cost_to_own - Total_interest'],
        ],
        [
            'title' => 'Residual_Value_Percentage = Residual_Value / Product_Value',
            'results' => ['Residual_Value' => 'Product_Value*Residual_Value_Percentage', 'Residual_Value_Percentage' => 'Residual_Value/Product_Value', 'Product_Value' => 'Residual_Value/Residual_Value_Percentage'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Product value, Residual value and or in % into Lease and the answer comes back as Fixed. There is no hidden constant here: change fixed and product value moves with it. The main result, Fixed, is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the Lease calculator works', 'html' => <<<'TXT'
            <p>The Lease calculator applies one relationship to 11 numbers and reports Fixed.</p><p>Written with the labels from the form, Monthly payment = Interest rate × (Lease amount × (Interest rate + 1)^(Lease term) − Residual value,) ÷ ((Interest rate + 1)^(Lease term) − 1).</p><p>What comes back is Fixed — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 11 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Product value</strong> — in USD</li><li><strong>Residual value</strong> — in USD. Fill this field if the residual value is given as a percentage as a fixed value.</li><li><strong>or in %</strong> — in percent. Fill this field if the residual value is given as a percentage of the product value.</li><li><strong>Lease term</strong> — in years / months</li><li><strong>Interest rate</strong> — in interest rate per year</li><li><strong>or in %</strong> — in percent. Fill this field if the down payment is given as a percentage of the product value.</li><li><strong>Lease amount</strong> — in USD</li><li><strong>Monthly payment</strong> — in USD</li><li><strong>Total payments</strong> — in USD</li><li><strong>Total interest</strong> — in USD</li><li><strong>Total cost to own</strong> — in USD</li></ul><p>What you get back is Fixed in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>The unit chip on or in % lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>'],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Monthly payment</strong> = <code>Interest rate × (Lease amount × (Interest rate + 1)^(Lease term) − Residual value,) ÷ ((Interest rate + 1)^(Lease term) − 1)</code></li><li><strong>Lease term</strong> = <code>ln((Interest rate × Residual value, − Monthly payment) ÷ (Interest rate × Lease amount − Monthly payment)) ÷ ln(Interest rate + 1)</code></li><li><strong>Lease amount</strong> = <code>(Interest rate + 1)^(− Lease term) × (Interest rate × Residual value, + Monthly payment × (Interest rate + 1)^(Lease term) − Monthly payment) ÷ Interest rate</code></li><li><strong>Residual value</strong> = <code>(Interest rate × Lease amount × (Interest rate + 1)^(Lease term) − Monthly payment × (Interest rate + 1)^(Lease term) + Monthly payment) ÷ Interest rate</code></li><li><strong>Total payments</strong> = <code>Lease term × Monthly payment</code></li><li><strong>Fixed</strong> = <code>− Lease amount + Product value</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Monthly payment</strong> = <code>Interest rate × (Lease amount × (Interest rate + 1)^(Lease term) − Residual value,) ÷ ((Interest rate + 1)^(Lease term) − 1)</code> — the form to use when Interest rate, Lease amount, Lease term and Residual value are the values you have.</li><li><strong>Lease term</strong> = <code>ln((Interest rate × Residual value, − Monthly payment) ÷ (Interest rate × Lease amount − Monthly payment)) ÷ ln(Interest rate + 1)</code> — the form to use when Interest rate, Residual value, Monthly payment and Lease amount are the values you have.</li><li><strong>Lease amount</strong> = <code>(Interest rate + 1)^(− Lease term) × (Interest rate × Residual value, + Monthly payment × (Interest rate + 1)^(Lease term) − Monthly payment) ÷ Interest rate</code> — the form to use when Interest rate, Lease term, Residual value and Monthly payment are the values you have.</li><li><strong>Residual value</strong> = <code>(Interest rate × Lease amount × (Interest rate + 1)^(Lease term) − Monthly payment × (Interest rate + 1)^(Lease term) + Monthly payment) ÷ Interest rate</code> — the form to use when Interest rate, Lease amount, Lease term and Monthly payment are the values you have.</li><li><strong>Total payments</strong> = <code>Lease term × Monthly payment</code> — the form to use when Lease term and Monthly payment are the values you have.</li><li><strong>Lease term</strong> = <code>Total payments ÷ Monthly payment</code> — the form to use when Total payments and Monthly payment are the values you have.</li><li><strong>Monthly payment</strong> = <code>Total payments ÷ Lease term</code> — the form to use when Total payments and Lease term are the values you have.</li><li><strong>Lease amount</strong> = <code>− Fixed + Product value</code> — the form to use when Fixed and Product value are the values you have.</li></ul><p>Any one of Monthly payment, Lease term and Lease amount can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> or in %, Lease term and Interest rate carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Fixed is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Product value left as a guess.</strong> Anything typed into Product value is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Residual value left as a guess.</strong> Anything typed into Residual value is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Product value and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Lease form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Product value</strong> takes a plain number with no unit attached. The page reads it when it works out Lease amount, Fixed and or in %. Fill it from a measurement rather than a memory — Product value is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Residual value</strong> takes a plain number with no unit attached. Fill this field if the residual value is given as a percentage as a fixed value. The page reads it when it works out Lease term, Lease amount and Monthly payment. Fill it from a measurement rather than a memory — Residual value is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>or in %</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Fill this field if the residual value is given as a percentage of the product value. The page reads it when it works out Residual value and Product value. Fill it from a measurement rather than a memory — or in % is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Lease term</strong> is a years / months quantity: the page opens it in yrsmos and converts anything else you pick before the formula runs. The page reads it when it works out Lease amount, Residual value and Monthly payment. Fill it from a measurement rather than a memory — Lease term is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Interest rate</strong> is a interest rate per year quantity: the page opens it in percentyear and converts anything else you pick before the formula runs. The page reads it when it works out Lease term, Lease amount and Residual value. Fill it from a measurement rather than a memory — Interest rate is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>or in %</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Fill this field if the down payment is given as a percentage of the product value. The page reads it when it works out Fixed and Product value. Fill it from a measurement rather than a memory — or in % is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Lease amount</strong> takes a plain number with no unit attached. The page reads it when it works out Lease term, Residual value and Monthly payment. Fill it from a measurement rather than a memory — Lease amount is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Monthly payment</strong> takes a plain number with no unit attached. The page reads it when it works out Lease term, Lease amount and Residual value. Fill it from a measurement rather than a memory — Monthly payment is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Total payments</strong> takes a plain number with no unit attached. The page reads it when it works out Lease term, Monthly payment and Total interest. Fill it from a measurement rather than a memory — Total payments is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Total interest</strong> takes a plain number with no unit attached. The page reads it when it works out Fixed, Residual value and Total payments. Fill it from a measurement rather than a memory — Total interest is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Total cost to own</strong> takes a plain number with no unit attached. The page reads it when it works out Total interest and Product value. Fill it from a measurement rather than a memory — Total cost to own is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Fixed</strong> is a plain number. The value follows from Lease amount and Product value. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Lease actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>years / months</strong> — opens in <em>yrsmos</em>, and the chip also carries min, hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Fixed is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and years / months and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Product value, Residual value and or in % are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Product value, Residual value and or in % and the number you are missing is Fixed.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/savings">Savings</a>, <a href="/finance/scrap-gold">Scrap gold Calculator</a> and <a href="/finance/scrap-silver">Scrap silver Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Lease calculator work out?', 'a' => <<<'TXT'
            Fixed, from Interest rate, Lease amount, Lease term and Residual value. The relationship is Monthly payment = Interest rate × (Lease amount × (Interest rate + 1)^(Lease term) − Residual value,) ÷ ((Interest rate + 1)^(Lease term) − 1).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Product value (USD), Residual value (USD), or in % (percent), Lease term (years / months), Interest rate (interest rate per year). Fill product value, residual value and or in % and leave Fixed empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Monthly payment, Lease term, Lease amount and Residual value blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Fixed is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Product value blank and the page solves for it, reporting Fixed instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Fixed keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/savings', 'name' => 'Savings'],
            ['path' => '/finance/scrap-gold', 'name' => 'Scrap gold Calculator'],
            ['path' => '/finance/scrap-silver', 'name' => 'Scrap silver Calculator'],
        ],
        'authors' => [],
    ],
];
