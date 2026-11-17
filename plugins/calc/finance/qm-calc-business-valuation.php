<?php

/**
 * Business valuation
 * /finance/business-valuation
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Business valuation',
    'meta' => ['title' => 'Business valuation: Formula, Steps & Results', 'description' => 'Enter valuation method and cash flow and get business valuation back. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Business valuation Calculator', 'updated' => '2026-09-26'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'method',
                            'label' => 'Valuation method',
                            'type' => 'select',
                            'options' => ['Discounted Cash Flow (DCF)' => '3', 'Asset-based valuation' => '1', 'Market capitalization' => '2', 'Market-based valuation (multiples method)' => '4'],
                            'dataset' => 'methods',
                            'help' => 'Choose a method to perform business valuation.',
                            'default' => 'Discounted Cash Flow (DCF)',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Enter your data',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cashflow',
                            'label' => 'Cash flow',
                            'type' => 'number',
                            'help' => 'Enter the projected annual cash flow. This is the net amount of cash and cash equivalents being transferred into and out of the business.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'assetts',
                            'label' => 'Assets',
                            'type' => 'number',
                            'help' => 'Enter the total value of all business assets like cash, inventory, property, equipment, etc.',
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
                            'name' => 'liabilities',
                            'label' => 'Liabilities',
                            'type' => 'number',
                            'help' => 'Enter total liabilities, including loans, accounts payable, and other debts.',
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
                            'name' => 'shares',
                            'label' => 'Outstanding shares',
                            'type' => 'number',
                            'help' => 'Input all company-issued shares currently held by investors.',
                            'unit' => '521',
                            'unit_default' => 'one',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'stockprice',
                            'label' => 'Stock price',
                            'type' => 'number',
                            'help' => 'Price per one stock at the time of business valuation.',
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
                            'name' => 'n',
                            'label' => 'Projection period',
                            'type' => 'number',
                            'suffix' => 'years',
                            'help' => 'Specify the number of years you expect to forecast the cash flows. Typically, this is a 5 to 10-year period.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'r',
                            'label' => 'Discount rate',
                            'type' => 'number',
                            'help' => 'Input the yearly discount rate, which reflects the risk of the cash flows. Often, this is the weighted average cost of capital (WACC).',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '3',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'choose_multiple',
                            'label' => 'Chosen financial metric',
                            'type' => 'select',
                            'options' => ['EV/EBITDA (enterprise value / EBITDA)' => '1', 'EV/sales (enterprise value / revenue)' => '3', 'P/E ratio (price / earnings)' => '2'],
                            'dataset' => 'multiple_type',
                            'control' => 'DROPDOWN',
                            'default' => 'EV/EBITDA (enterprise value / EBITDA)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'financialmetric',
                            'label' => 'Earnings before interest, tax and amortization  (EBITA)',
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
                            'name' => 'multiple',
                            'label' => 'Choose your industry',
                            'type' => 'select',
                            'options' => [
                                'Marketing' => '11.94',
                                'Business Support Services' => '15.19',
                                'Computer Hardware' => '18.66',
                                'Construction & Engineering' => '9.4',
                                'Distillers & Wineries' => '13.89',
                                'Entertainment Production' => '15.78',
                                'Homebuilding' => '8.03',
                                'IT Services & Consulting' => '14.68',
                                'Gyms, Fitness and Spa Centers' => '11.79',
                                'Online Services' => '20.44',
                                'Accounting' => '15.44',
                                'Software' => '28.48',
                                'Wireless Telecommunications Services' => '7.37',
                                'Electronic Equipment & Parts' => '15.55',
                                'Commercial Printing Services' => '12.2',
                                'Custom multiple' => '',
                            ],
                            'dataset' => 'multiples',
                            'control' => 'DROPDOWN',
                            'help' => <<<'TXT'
                            Provide an industry-specific multiple to calculate the terminal value. It can range from under 7 to over 20, depending on the industry. Here you can choose the industry, or "Custom" option to input custom value.
                            TXT,
                            'default' => 'Marketing',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'multiple_amount',
                            'label' => 'Multiple',
                            'type' => 'number',
                            'suffix' => 'x',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'choose_multiple == 1', 'text' => 'Typical multiples based on EBITA range from 4x to 8x. Check here for the latest EBITA multiple for your industry.'],
                                ['when' => 'choose_multiple == 3', 'text' => 'Typical EV/sales multiples range from 1.1 to 2.2 times sales.'],
                                ['when' => 'choose_multiple == 2', 'text' => 'Typical P/E ratio multiples range between 25 and 30 times net profit.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Result',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'value_dcf',
                            'label' => 'Business valuation',
                            'type' => 'number',
                            'help' => 'This your business valuation, calculated using the DCF method.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'readonly' => true,
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'value_assett',
                            'label' => 'Business valuation',
                            'type' => 'number',
                            'help' => 'This your business valuation, calculated using the asset-based method.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'readonly' => true,
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'value_market',
                            'label' => 'Business valuation',
                            'type' => 'number',
                            'help' => 'This your business valuation, calculated using the market capitalizaion method.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'readonly' => true,
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'value_multi',
                            'label' => 'Business valuation',
                            'type' => 'number',
                            'help' => 'This is your business valuation, calculated using the multiples method.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'readonly' => true,
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'assetts-liabilities=value_assett',
            'results' => ['assetts' => 'liabilities + value_assett', 'value_assett' => 'assetts - liabilities', 'liabilities' => 'assetts - value_assett'],
        ],
        [
            'title' => 'stockprice*shares=value_market',
            'results' => ['value_market' => 'shares*stockprice', 'shares' => 'value_market/stockprice', 'stockprice' => 'value_market/shares'],
        ],
        [
            'title' => '(cashflow*((1-(1+r)^-n)/r))+(cashflow/(1+r)^n)=value_dcf',
            'results' => ['cashflow' => 'r*value_dcf*pow(r + 1, n)/(r + pow(r + 1, n) - 1)', 'n' => 'log(cashflow*(r - 1)/(-cashflow + r*value_dcf))/log(r + 1)', 'value_dcf' => 'cashflow*pow(r + 1, -n)*(r + pow(r + 1, n) - 1)/r'],
        ],
        [
            'title' => 'financialmetric*multiple_amount=value_multi',
            'results' => ['multiple_amount' => 'value_multi/financialmetric', 'value_multi' => 'financialmetric*multiple_amount', 'financialmetric' => 'value_multi/multiple_amount'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Business valuation turns Valuation method, Cash flow and Assets into Business valuation and Business valuation. It is a single relationship that reads business valuation out of valuation method, not a table of canned results keyed by them. Units for Business valuation default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Business valuation calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Business valuation: it takes 12 numbers and reports Business valuation, Business valuation and Business valuation.</p><p>The relationship it solves reads Assets = Liabilities + Business valuation.</p><p>The result panel carries Business valuation, Business valuation, Business valuation and Business valuation, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 12 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Valuation method</strong> — a plain number, no unit. Choose a method to perform business valuation.</li><li><strong>Cash flow</strong> — in USD. Enter the projected annual cash flow. This is the net amount of cash and cash equivalents being transferred into and out of the business.</li><li><strong>Assets</strong> — in USD. Enter the total value of all business assets like cash, inventory, property, equipment, etc.</li><li><strong>Liabilities</strong> — in USD. Enter total liabilities, including loans, accounts payable, and other debts.</li><li><strong>Outstanding shares</strong> — in no multiplier. Input all company-issued shares currently held by investors.</li><li><strong>Stock price</strong> — in USD. Price per one stock at the time of business valuation.</li><li><strong>Projection period</strong> — in years. Specify the number of years you expect to forecast the cash flows. Typically, this is a 5 to 10-year period.</li><li><strong>Discount rate</strong> — in percent. Input the yearly discount rate, which reflects the risk of the cash flows. Often, this is the weighted average cost of capital (WACC).</li><li><strong>Chosen financial metric</strong> — a plain number, no unit</li><li><strong>Earnings before interest, tax and amortization (EBITA)</strong> — in USD</li><li><strong>Choose your industry</strong> — a plain number, no unit. Provide an industry-specific multiple to calculate the terminal value. It can range from under 7 to over 20, depending on the industry. Here you can choose the industry, or &quot;Custom&quot; option to input custom value.</li><li><strong>Multiple</strong> — in x</li></ul><p>What you get back is Business valuation in USD, Business valuation in USD, Business valuation in USD, Business valuation in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Outstanding shares offers 3 units and opens on no multiplier, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Assets</strong> = <code>Liabilities + Business valuation</code></li><li><strong>Business valuation</strong> = <code>Assets − Liabilities</code></li><li><strong>Liabilities</strong> = <code>Assets − Business valuation</code></li><li><strong>Outstanding shares</strong> = <code>Business valuation ÷ Stock price</code></li><li><strong>Stock price</strong> = <code>Business valuation ÷ Outstanding shares</code></li><li><strong>Cash flow</strong> = <code>Discount rate × Business valuation × (Discount rate + 1)^(Projection period) ÷ (Discount rate + (Discount rate + 1)^(Projection period) − 1)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Assets</strong> = <code>Liabilities + Business valuation</code> — the form to use when Liabilities and Business valuation are the values you have.</li><li><strong>Business valuation</strong> = <code>Assets − Liabilities</code> — the form to use when Assets and Liabilities are the values you have.</li><li><strong>Liabilities</strong> = <code>Assets − Business valuation</code> — the form to use when Assets and Business valuation are the values you have.</li><li><strong>Business valuation</strong> = <code>Outstanding shares × Stock price</code> — the form to use when Outstanding shares and Stock price are the values you have.</li><li><strong>Outstanding shares</strong> = <code>Business valuation ÷ Stock price</code> — the form to use when Business valuation and Stock price are the values you have.</li><li><strong>Stock price</strong> = <code>Business valuation ÷ Outstanding shares</code> — the form to use when Business valuation and Outstanding shares are the values you have.</li><li><strong>Cash flow</strong> = <code>Discount rate × Business valuation × (Discount rate + 1)^(Projection period) ÷ (Discount rate + (Discount rate + 1)^(Projection period) − 1)</code> — the form to use when Discount rate, Business valuation and Projection period are the values you have.</li><li><strong>Projection period</strong> = <code>ln(Cash flow × (Discount rate − 1) ÷ ( − Cash flow + Discount rate × Business valuation)) ÷ ln(Discount rate + 1)</code> — the form to use when Cash flow, Discount rate and Business valuation are the values you have.</li></ul><p>Any one of Assets, Business valuation and Liabilities can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Outstanding shares and Discount rate is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Business valuation, Business valuation and Business valuation are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Valuation method left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Valuation method is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Cash flow left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Cash flow is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Valuation method and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Business valuation form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Valuation method</strong> takes a plain number with no unit attached. Choose a method to perform business valuation. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Valuation method is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Cash flow</strong> takes a plain number with no unit attached. Enter the projected annual cash flow. This is the net amount of cash and cash equivalents being transferred into and out of the business. It feeds Projection period and Business valuation. Fill it from a measurement rather than a memory — Cash flow is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Assets</strong> takes a plain number with no unit attached. Enter the total value of all business assets like cash, inventory, property, equipment, etc. It feeds Business valuation and Liabilities. Fill it from a measurement rather than a memory — Assets is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Liabilities</strong> takes a plain number with no unit attached. Enter total liabilities, including loans, accounts payable, and other debts. It feeds Assets and Business valuation. Fill it from a measurement rather than a memory — Liabilities is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Outstanding shares</strong> is a no multiplier quantity: the page opens it in one and converts anything else you pick before the formula runs. Input all company-issued shares currently held by investors. It feeds Business valuation and Stock price. Fill it from a measurement rather than a memory — Outstanding shares is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Stock price</strong> takes a plain number with no unit attached. Price per one stock at the time of business valuation. It feeds Business valuation and Outstanding shares. Fill it from a measurement rather than a memory — Stock price is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Projection period</strong> is measured in years. Specify the number of years you expect to forecast the cash flows. Typically, this is a 5 to 10-year period. It feeds Cash flow and Business valuation. Fill it from a measurement rather than a memory — Projection period is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Discount rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Input the yearly discount rate, which reflects the risk of the cash flows. Often, this is the weighted average cost of capital (WACC). It feeds Cash flow, Projection period and Business valuation. Fill it from a measurement rather than a memory — Discount rate is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Chosen financial metric</strong> takes a plain number with no unit attached. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Chosen financial metric is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Earnings before interest, tax and amortization (EBITA)</strong> takes a plain number with no unit attached. It feeds Multiple and Business valuation. Fill it from a measurement rather than a memory — Earnings before interest, tax and amortization (EBITA) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Choose your industry</strong> takes a plain number with no unit attached. Provide an industry-specific multiple to calculate the terminal value. It can range from under 7 to over 20, depending on the industry. Here you can choose the industry, or &quot;Custom&quot; option to input custom value. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Choose your industry is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Multiple</strong> is measured in x. It feeds Business valuation and Earnings before interest, tax and amortization (EBITA). Fill it from a measurement rather than a memory — Multiple is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Business valuation is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The unit tables here are no multiplier and percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Valuation method, Cash flow and Assets are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Valuation method, Cash flow and Assets and the number you are missing is Business valuation and Business valuation.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/net-debt">Net debt Calculator</a>, <a href="/finance/net-effective-rent">Net effective rent Calculator</a> and <a href="/finance/net-income">Net income</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Business valuation calculator work out?', 'a' => <<<'TXT'
            Business valuation, Business valuation, Business valuation and Business valuation, from Liabilities and Business valuation. The relationship is Assets = Liabilities + Business valuation.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Valuation method, Cash flow (USD), Assets (USD), Liabilities (USD), Outstanding shares (no multiplier). Fill valuation method, cash flow and assets and leave Business valuation empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Assets, Business valuation, Liabilities and Business valuation blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Business valuation is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Valuation method blank and the page solves for it, reporting Business valuation instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Business valuation keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/net-debt', 'name' => 'Net debt Calculator'],
            ['path' => '/finance/net-effective-rent', 'name' => 'Net effective rent Calculator'],
            ['path' => '/finance/net-income', 'name' => 'Net income'],
        ],
        'authors' => [],
    ],
];
