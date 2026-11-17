<?php

/**
 * ARV
 * /finance/arv
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'ARV',
    'meta' => ['title' => 'ARV Calculator — Free, With Worked Examples', 'description' => 'ARV works out after repair value (ARV) and total cost of renovation from method:, property\'s current value and value of renovations. Any box can be the unknown.', 'h1' => 'ARV Calculator', 'updated' => '2026-09-14'],
    'sections' => [
        [
            'title' => 'Property value',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'method_of_calculation',
                            'label' => 'Method:',
                            'type' => 'select',
                            'options' => ['Value of the property' => '0', 'Average price in the area' => '1'],
                            'dataset' => 'formula',
                            'defaults' => [
                                ['value' => 'Value of the property', 'when' => null],
                                ['value' => 'Value of the property', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Property_current_value',
                            'label' => 'Property\'s current value',
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
                            'name' => 'Value_of_renovations',
                            'label' => 'Value of renovations',
                            'type' => 'number',
                            'help' => 'The increase in value of the property due to renovations.',
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
                            'name' => 'Average_area_price',
                            'label' => 'Average area price',
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
                            'name' => 'Total_area_of_the_property',
                            'label' => 'Total area of the property',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'm2',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'After_repair_value',
                            'label' => 'After repair value (ARV)',
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
                        ['type' => 'note', 'text' => ' Ready to show buyers the post-renovation property value? Generate a custom calculator to embed on your site.&nbsp;'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Property best purchase price',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Total_cost_of_renovation',
                            'label' => 'Total cost of renovation',
                            'type' => 'number',
                            'help' => 'What is the estimated cost for renovating the property?',
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
                            'name' => 'Investors_purchase_rule',
                            'label' => 'Investors purchase rule',
                            'type' => 'number',
                            'help' => 'A general rule of thumb that investors use to determine the price they should pay for the fixer upper property.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '70', 'when' => null],
                                ['value' => '70', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Maximum_bid_price',
                            'label' => 'Maximum bid price',
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
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'Maximum_bid_price < sale_price_half and Maximum_bid_price > sale_price_fourth', 'text' => 'To increase your chances of making the deal, try reducing your total cost of renovation and find a price close to the property\'s current value.&nbsp;'],
                                ['when' => 'Maximum_bid_price < sale_price_fourth and Maximum_bid_price > 0', 'text' => <<<'TXT'
                                It is unlikely that the property will be available for purchase at this rate! Try reducing the total cost of renovation or increasing the investors' purchase rule.&nbsp;
                                TXT],
                                ['when' => 'Maximum_bid_price < 1', 'text' => <<<'TXT'
                                The maximum bid price should be a positive number close to the property's current value. Either reduce the total cost of renovation or increase the investors purchase rule.&nbsp;
                                TXT],
                                ['when' => 'Maximum_bid_price > Property_current_value', 'text' => 'Your maximum bid price should be close to the property\'s current value.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Potential return on investment',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'roi',
                            'label' => 'ROI',
                            'type' => 'number',
                            'help' => 'Return on investment.',
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
                            'name' => 'roi_percentage',
                            'label' => 'Percentage',
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
                            'name' => 'sale_price_fourth',
                            'label' => 'Sale price fourth',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sale_price_half',
                            'label' => 'Sale price half',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Additional settings',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Repair_cost',
                            'label' => 'Repair cost',
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
                            'name' => 'Total_area_that_requires_repairs',
                            'label' => 'Total area that requires repairs',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'ft2',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'After_repair_value = Property_current_value + Value_of_renovations',
            'results' => ['Value_of_renovations' => 'After_repair_value - Property_current_value', 'After_repair_value' => 'Property_current_value + Value_of_renovations', 'Property_current_value' => 'After_repair_value - Value_of_renovations'],
        ],
        [
            'title' => 'After_repair_value = Total_area_of_the_property * Average_area_price',
            'results' => ['Average_area_price' => 'After_repair_value/Total_area_of_the_property', 'Total_area_of_the_property' => 'After_repair_value/Average_area_price', 'After_repair_value' => 'Average_area_price*Total_area_of_the_property'],
        ],
        [
            'title' => 'Total_cost_of_renovation = Repair_cost * Total_area_that_requires_repairs',
            'results' => ['Total_cost_of_renovation' => 'Repair_cost*Total_area_that_requires_repairs', 'Total_area_that_requires_repairs' => 'Total_cost_of_renovation/Repair_cost', 'Repair_cost' => 'Total_cost_of_renovation/Total_area_that_requires_repairs'],
        ],
        [
            'title' => 'Maximum_bid_price = ( After_repair_value/100 * Investors_purchase_rule ) - Total_cost_of_renovation',
            'results' => ['After_repair_value' => '100*(Maximum_bid_price + Total_cost_of_renovation)/Investors_purchase_rule', 'Investors_purchase_rule' => '100*(Maximum_bid_price + Total_cost_of_renovation)/After_repair_value', 'Maximum_bid_price' => '(1/100)*After_repair_value*Investors_purchase_rule - Total_cost_of_renovation', 'Total_cost_of_renovation' => '(1/100)*After_repair_value*Investors_purchase_rule - Maximum_bid_price'],
        ],
        [
            'title' => 'roi = After_repair_value - Maximum_bid_price - Total_cost_of_renovation',
            'results' => ['roi' => 'After_repair_value - Maximum_bid_price - Total_cost_of_renovation', 'After_repair_value' => 'Maximum_bid_price + Total_cost_of_renovation + roi', 'Maximum_bid_price' => 'After_repair_value - Total_cost_of_renovation - roi', 'Total_cost_of_renovation' => 'After_repair_value - Maximum_bid_price - roi'],
        ],
        [
            'title' => 'roi_percentage =  roi / After_repair_value * 100',
            'results' => ['roi' => '(1/100)*After_repair_value*roi_percentage', 'roi_percentage' => '100*roi/After_repair_value', 'After_repair_value' => '100*roi/roi_percentage'],
        ],
        [
            'title' => 'sale_price_half = Property_current_value/2',
            'results' => ['Property_current_value' => '2*sale_price_half', 'sale_price_half' => '(1/2)*Property_current_value'],
        ],
        [
            'title' => 'sale_price_fourth = Property_current_value/4',
            'results' => ['sale_price_fourth' => '(1/4)*Property_current_value', 'Property_current_value' => '4*sale_price_fourth'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Enter Method, Property's current value and Value of renovations into ARV and the answer comes back as Sale price fourth and Sale price half. The arithmetic is the whole method: sale price fourth is worked out from method by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the ARV calculator works', 'html' => <<<'TXT'
            <p>The ARV calculator applies one relationship to 13 numbers and reports Sale price fourth and Sale price half.</p><p>The relationship it solves reads After repair value (ARV) = Property&#039;s current value + Value of renovations.</p><p>The result panel carries Sale price fourth and Sale price half, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 13 boxes and the page has everything it needs.</p><ul><li><strong>Method</strong> — a plain number, no unit</li><li><strong>Property&#039;s current value</strong> — in USD</li><li><strong>Value of renovations</strong> — in USD. The increase in value of the property due to renovations.</li><li><strong>Average area price</strong> — in USD</li><li><strong>Total area of the property</strong> — in square meters</li><li><strong>After repair value (ARV)</strong> — in USD</li><li><strong>Total cost of renovation</strong> — in USD. What is the estimated cost for renovating the property?</li><li><strong>Investors purchase rule</strong> — in percent. A general rule of thumb that investors use to determine the price they should pay for the fixer upper property.</li><li><strong>Maximum bid price</strong> — in USD</li><li><strong>ROI</strong> — in USD. Return on investment.</li><li><strong>Percentage</strong> — in percent</li><li><strong>Repair cost</strong> — in USD</li><li><strong>Total area that requires repairs</strong> — in square feet</li></ul><p>The answers come back as Sale price fourth, Sale price half. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Total area of the property lists 7 options and opens on square meters. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>After repair value (ARV)</strong> = <code>Property&#039;s current value + Value of renovations</code></li><li><strong>Value of renovations</strong> = <code>After repair value (ARV) − Property&#039;s current value</code></li><li><strong>Property&#039;s current value</strong> = <code>After repair value (ARV) − Value of renovations</code></li><li><strong>Average area price</strong> = <code>After repair value (ARV) ÷ Total area of the property</code></li><li><strong>Total area of the property</strong> = <code>After repair value (ARV) ÷ Average area price</code></li><li><strong>Total cost of renovation</strong> = <code>Repair cost × Total area that requires repairs</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>After repair value (ARV)</strong> = <code>Property&#039;s current value + Value of renovations</code> — the form to use when Property&#039;s current value and Value of renovations are the values you have.</li><li><strong>Value of renovations</strong> = <code>After repair value (ARV) − Property&#039;s current value</code> — the form to use when After repair value (ARV) and Property&#039;s current value are the values you have.</li><li><strong>Property&#039;s current value</strong> = <code>After repair value (ARV) − Value of renovations</code> — the form to use when After repair value (ARV) and Value of renovations are the values you have.</li><li><strong>After repair value (ARV)</strong> = <code>Average area price × Total area of the property</code> — the form to use when Average area price and Total area of the property are the values you have.</li><li><strong>Average area price</strong> = <code>After repair value (ARV) ÷ Total area of the property</code> — the form to use when After repair value (ARV) and Total area of the property are the values you have.</li><li><strong>Total area of the property</strong> = <code>After repair value (ARV) ÷ Average area price</code> — the form to use when After repair value (ARV) and Average area price are the values you have.</li><li><strong>Total cost of renovation</strong> = <code>Repair cost × Total area that requires repairs</code> — the form to use when Repair cost and Total area that requires repairs are the values you have.</li><li><strong>Total area that requires repairs</strong> = <code>Total cost of renovation ÷ Repair cost</code> — the form to use when Total cost of renovation and Repair cost are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of After repair value (ARV), Value of renovations and Property&#039;s current value can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Total area of the property, Investors purchase rule and Percentage carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Sale price fourth and Sale price half are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Method left as a guess.</strong> Anything typed into Method is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Property&#039;s current value left as a guess.</strong> Anything typed into Property&amp;#039;s current value is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Method: is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the ARV form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Method</strong> takes a plain number with no unit attached. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Method is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Property&#039;s current value</strong> takes a plain number with no unit attached. It feeds Value of renovations, After repair value (ARV) and Sale price half. Fill it from a measurement rather than a memory — Property&#039;s current value is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Value of renovations</strong> takes a plain number with no unit attached. The increase in value of the property due to renovations. It feeds After repair value (ARV) and Property's current value. Fill it from a measurement rather than a memory — Value of renovations is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Average area price</strong> takes a plain number with no unit attached. It feeds Total area of the property and After repair value (ARV). Fill it from a measurement rather than a memory — Average area price is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Total area of the property</strong> is a square meters quantity: the page opens it in m2 and converts anything else you pick before the formula runs. It feeds Average area price and After repair value (ARV). Fill it from a measurement rather than a memory — Total area of the property is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>After repair value (ARV)</strong> takes a plain number with no unit attached. It feeds Value of renovations, Property's current value and Average area price. Fill it from a measurement rather than a memory — After repair value (ARV) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Total cost of renovation</strong> takes a plain number with no unit attached. What is the estimated cost for renovating the property?. It feeds Total area that requires repairs, Repair cost and After repair value (ARV). Fill it from a measurement rather than a memory — Total cost of renovation is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Investors purchase rule</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. A general rule of thumb that investors use to determine the price they should pay for the fixer upper property. It feeds After repair value (ARV), Maximum bid price and Total cost of renovation. Fill it from a measurement rather than a memory — Investors purchase rule is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Maximum bid price</strong> takes a plain number with no unit attached. It feeds After repair value (ARV), Investors purchase rule and Total cost of renovation. Fill it from a measurement rather than a memory — Maximum bid price is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>ROI</strong> takes a plain number with no unit attached. Return on investment. It feeds After repair value (ARV), Maximum bid price and Total cost of renovation. Fill it from a measurement rather than a memory — ROI is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Percentage</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds ROI and After repair value (ARV). Fill it from a measurement rather than a memory — Percentage is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Repair cost</strong> takes a plain number with no unit attached. It feeds Total cost of renovation and Total area that requires repairs. Fill it from a measurement rather than a memory — Repair cost is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Total area that requires repairs</strong> is a square feet quantity: the page opens it in ft2 and converts anything else you pick before the formula runs. It feeds Total cost of renovation and Repair cost. Fill it from a measurement rather than a memory — Total area that requires repairs is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 2 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Sale price fourth</strong> is a plain number. It is computed from Property's current value, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Sale price half</strong> is a plain number. It is computed from Property's current value, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Sale price fourth is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover square meters and percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Method, Property&#039;s current value and Value of renovations is what you already know and Sale price fourth and Sale price half is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/triple-discount">Triple discount Calculator</a>, <a href="/finance/trir">TRIR Calculator</a> and <a href="/finance/true-cost-of-real-estate-commission">True cost of real estate commission Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the ARV calculator work out?', 'a' => <<<'TXT'
            Sale price fourth and Sale price half, from Property's current value and Value of renovations. The relationship is After repair value (ARV) = Property's current value + Value of renovations.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Method, Property's current value (USD), Value of renovations (USD), Average area price (USD), Total area of the property (square meters). Fill method, property's current value and value of renovations and leave Sale price fourth empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. After repair value (ARV), Value of renovations, Property's current value and Average area price can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Sale price fourth is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Method: blank and the page solves for it, reporting Sale price fourth instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Sale price fourth keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/triple-discount', 'name' => 'Triple discount Calculator'],
            ['path' => '/finance/trir', 'name' => 'TRIR Calculator'],
            ['path' => '/finance/true-cost-of-real-estate-commission', 'name' => 'True cost of real estate commission Calculator'],
        ],
        'authors' => [],
    ],
];
