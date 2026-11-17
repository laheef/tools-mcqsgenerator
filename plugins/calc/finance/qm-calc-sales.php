<?php

/**
 * Sales
 * /finance/sales
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Sales',
    'meta' => ['title' => 'Sales Calculator: Formula, Steps & Examples', 'description' => 'Sales works out revenue per {{revenue.fullUnit}} from product price. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Sales Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price',
                            'label' => 'Product price',
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
                            'name' => 'products_sold',
                            'label' => 'Number of products sold',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'mos',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'revenue',
                            'label' => 'Revenue per {{revenue.fullUnit}}',
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
                            'name' => 'revenue2',
                            'label' => 'Revenue per {{revenue2.fullUnit}}',
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
            'title' => 'Costs to be deducted',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Allowances',
                            'label' => 'Allowances',
                            'type' => 'number',
                            'help' => 'For example, refunding of damaged goods.',
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
                            'name' => 'Discounts',
                            'label' => 'Discounts',
                            'type' => 'number',
                            'help' => 'The sum of discounts that you provide for your customers.',
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
                            'name' => 'SalesReturns',
                            'label' => 'Sales returns',
                            'type' => 'number',
                            'help' => 'The cost of products that your customers return.',
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
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'NetRevenue',
                            'label' => 'Net sales',
                            'type' => 'number',
                            'help' => 'Your sales after all the specified costs have been deducted.',
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
            'title' => 'price * products_sold = revenue',
            'results' => ['products_sold' => 'revenue/price', 'revenue' => 'price*products_sold', 'price' => 'revenue/products_sold'],
        ],
        [
            'title' => 'revenue2 = revenue',
            'results' => ['revenue2' => 'revenue', 'revenue' => 'revenue2'],
        ],
        [
            'title' => 'NetRevenue = revenue - (SalesReturns + Allowances + Discounts)',
            'results' => [
                'Allowances' => '-Discounts - NetRevenue - SalesReturns + revenue',
                'Discounts' => '-Allowances - NetRevenue - SalesReturns + revenue',
                'NetRevenue' => '-Allowances - Discounts - SalesReturns + revenue',
                'SalesReturns' => '-Allowances - Discounts - NetRevenue + revenue',
                'revenue' => 'Allowances + Discounts + NetRevenue + SalesReturns',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Revenue per into Sales and the answer comes back as Product price and Number of products sold. There is no hidden constant here: change product price and revenue per moves with it. The main result, Product price, is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the Sales calculator works', 'html' => <<<'TXT'
            <p>The Sales calculator applies one relationship to 1 number and reports Product price, Number of products sold and Revenue per.</p><p>In the form&#039;s own words, Number of products sold = Revenue per ÷ Product price.</p><p>What comes back is Product price, Number of products sold, Revenue per and Allowances — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 1 box and the page has everything it needs.</p><ul><li><strong>Revenue per</strong> — in USD</li></ul><p>The answers come back as Product price in USD, Number of products sold in months, Revenue per in USD, Allowances in USD, Discounts in USD, Sales returns in USD, Net sales in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Product price = 10 USD, Number of products sold = 100 mos, Revenue per = 1000 USD, Allowances = 10 USD, Discounts = 100 USD, Sales returns = 1000 USD and Net sales = 10 USD; the answers are <strong>Revenue per</strong> = 1000 USD.</p><ul><li><strong>Revenue per</strong> = 1000 USD</li></ul><p>The line behind those figures is <strong>Number of products sold</strong> = <code>Revenue per ÷ Product price</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Revenue per {{revenue2.fullUnit}}</strong> = 1000. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Number of products sold lists 5 options and opens on months. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Number of products sold</strong> = <code>Revenue per ÷ Product price</code></li><li><strong>Revenue per</strong> = <code>Product price × Number of products sold</code></li><li><strong>Product price</strong> = <code>Revenue per ÷ Number of products sold</code></li><li><strong>Net sales</strong> = <code>− Allowances − Discounts − Sales returns + Revenue per </code></li><li><strong>Allowances</strong> = <code>− Discounts − Net sales − Sales returns + Revenue per </code></li><li><strong>Discounts</strong> = <code>− Allowances − Net sales − Sales returns + Revenue per </code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Number of products sold</strong> = <code>Revenue per ÷ Product price</code> — the form to use when Revenue per and Product price are the values you have.</li><li><strong>Revenue per</strong> = <code>Product price × Number of products sold</code> — the form to use when Product price and Number of products sold are the values you have.</li><li><strong>Product price</strong> = <code>Revenue per ÷ Number of products sold</code> — the form to use when Revenue per and Number of products sold are the values you have.</li><li><strong>Revenue per</strong> = <code>Revenue per </code> — the form to use when Revenue per are the values you have.</li><li><strong>Revenue per</strong> = <code>Revenue per </code> — the form to use when Revenue per are the values you have.</li><li><strong>Net sales</strong> = <code>− Allowances − Discounts − Sales returns + Revenue per </code> — the form to use when Allowances, Discounts, Sales returns and Revenue per are the values you have.</li><li><strong>Allowances</strong> = <code>− Discounts − Net sales − Sales returns + Revenue per </code> — the form to use when Discounts, Net sales, Sales returns and Revenue per are the values you have.</li><li><strong>Discounts</strong> = <code>− Allowances − Net sales − Sales returns + Revenue per </code> — the form to use when Allowances, Net sales, Sales returns and Revenue per are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Number of products sold, Revenue per and Product price can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Product price from 10 to 20, leaving every other box alone. The panel moves from <strong>Revenue per {{revenue2.fullUnit}}</strong> 1000 USD to <strong>Revenue per {{revenue2.fullUnit}}</strong> 1000 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Product price, Number of products sold and Revenue per are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Revenue per left as a guess.</strong> Anything typed into Revenue per is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Revenue per {{revenue.fullUnit}} and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Sales form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Revenue per</strong> takes a plain number with no unit attached. It feeds Number of products sold, Product price and Revenue per. Fill it from a measurement rather than a memory — Revenue per is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Product price</strong> is a plain number. It is computed from Revenue per and Number of products sold, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Number of products sold</strong> is a months figure. It is computed from Revenue per and Product price, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Revenue per</strong> is a plain number and the page's own defaults put it at 1000. It is computed from Revenue per, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Allowances</strong> is a plain number. It is computed from Discounts, Net sales, Sales returns and Revenue per, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Discounts</strong> is a plain number. It is computed from Allowances, Net sales, Sales returns and Revenue per, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Sales returns</strong> is a plain number. It is computed from Allowances, Discounts, Net sales and Revenue per, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Net sales</strong> is a plain number. It is computed from Allowances, Discounts, Sales returns and Revenue per, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Revenue per</th></tr></thead><tbody><tr><td><strong>Product price</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Number of products sold</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Revenue per</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Allowances</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Discounts</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Sales returns</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Net sales</strong> +10%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Revenue per: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. By contrast, Product price, Number of products sold and Allowances barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Product price = 5 USD, Number of products sold = 50 mos, Revenue per = 500 USD, Allowances = 5 USD, Discounts = 50 USD, Sales returns = 500 USD and Net sales = 5 USD and the page reports <strong>Revenue per</strong> = 500 USD.</li><li>Feed in Product price = 30 USD, Number of products sold = 100 mos, Revenue per = 1000 USD, Allowances = 10 USD, Discounts = 100 USD, Sales returns = 1000 USD and Net sales = 10 USD and the page reports <strong>Revenue per</strong> = 1000 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Sales actually offers.</p><ul><li><strong>months</strong> — opens in <em>mos</em>, and the chip also carries days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Product price is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are months and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Revenue per are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Revenue per and the number you are missing is Product price and Number of products sold.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/salary-with-overtime">Salary with overtime</a>, <a href="/finance/sales-commission">Sales commission Calculator</a> and <a href="/finance/sales-tax">Sales tax Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Sales calculator work out?', 'a' => <<<'TXT'
            Product price, Number of products sold, Revenue per and Allowances, from Revenue per and Product price. The relationship is Number of products sold = Revenue per ÷ Product price.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Revenue per (USD). With revenue per in place, Product price can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Number of products sold, Revenue per, Product price and Revenue per can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Revenue per = 1000 USD. The figures come from Revenue per {{revenue.fullUnit}} as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Product price is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Revenue per {{revenue.fullUnit}} blank and the page solves for it, reporting Product price instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Product price keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/salary-with-overtime', 'name' => 'Salary with overtime'],
            ['path' => '/finance/sales-commission', 'name' => 'Sales commission Calculator'],
            ['path' => '/finance/sales-tax', 'name' => 'Sales tax Calculator'],
        ],
        'authors' => [],
    ],
];
