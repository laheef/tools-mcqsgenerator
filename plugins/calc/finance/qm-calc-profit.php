<?php

/**
 * Profit
 * /finance/profit
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Profit',
    'meta' => ['title' => 'Profit Calculator: Formula, Steps & Examples', 'description' => 'Profit takes per, unit cost and unit price and returns cost and price. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Profit Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => 'Buying cost',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'cost',
                            'label' => 'Cost',
                            'type' => 'number',
                            'help' => 'The amount spent to acquire or produce x units of an item.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'per1',
                            'label' => 'per',
                            'type' => 'number',
                            'suffix' => 'unit(s)',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'unit_cost',
                            'label' => 'Unit cost',
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
            'title' => 'Selling price',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'price',
                            'label' => 'Price',
                            'type' => 'number',
                            'help' => 'The price at which you sell x units of an item.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'per2',
                            'label' => 'per',
                            'type' => 'number',
                            'suffix' => 'unit(s)',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'unit_price',
                            'label' => 'Unit price',
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
            'title' => 'Profit',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'quantity',
                            'label' => 'Quantity',
                            'type' => 'number',
                            'suffix' => 'unit(s)',
                            'help' => 'The number of items you wish to sell.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'discount',
                            'label' => 'Discount',
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
                            'name' => 'total_cost',
                            'label' => 'Total cost',
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
                            'name' => 'revenue',
                            'label' => 'Revenue',
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
                            'name' => 'unit_profit',
                            'label' => 'Profit per unit',
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
                            'name' => 'total_profit',
                            'label' => 'Total profit',
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
                        ['type' => 'note', 'text' => 'Wait, you are doing it wrong, you have a loss. Price should be higher than cost.'],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'cost = unit_cost * per1',
            'results' => ['cost' => 'per1*unit_cost', 'per1' => 'cost/unit_cost', 'unit_cost' => 'cost/per1'],
        ],
        [
            'title' => 'price = unit_price * per2',
            'results' => ['per2' => 'price/unit_price', 'unit_price' => 'price/per2', 'price' => 'per2*unit_price'],
        ],
        [
            'title' => 'total_cost = unit_cost * quantity',
            'results' => ['total_cost' => 'quantity*unit_cost', 'quantity' => 'total_cost/unit_cost', 'unit_cost' => 'total_cost/quantity'],
        ],
        [
            'title' => 'revenue = unit_price * quantity * (1 - discount / 100) ',
            'results' => ['revenue' => '(1/100)*quantity*unit_price*(100 - discount)', 'quantity' => '-100*revenue/(unit_price*(discount - 100))', 'discount' => '100 - 100*revenue/(quantity*unit_price)', 'unit_price' => '-100*revenue/(quantity*(discount - 100))'],
        ],
        [
            'title' => 'unit_profit =  (revenue - total_cost) / quantity',
            'results' => ['total_cost' => '-quantity*unit_profit + revenue', 'quantity' => '(revenue - total_cost)/unit_profit', 'unit_profit' => '(revenue - total_cost)/quantity', 'revenue' => 'quantity*unit_profit + total_cost'],
        ],
        [
            'title' => 'total_profit = revenue - total_cost',
            'results' => ['total_profit' => 'revenue - total_cost', 'total_cost' => 'revenue - total_profit', 'revenue' => 'total_cost + total_profit'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Profit takes Unit cost and returns Cost and Price. There is no hidden constant here: change cost and unit cost moves with it. The main result, Cost, is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the Profit calculator works', 'html' => <<<'TXT'
            <p>Profit answers one question from 2 numbers, and the answer is Cost, Price and per.</p><p>The relationship it solves reads Cost = per × Unit cost.</p><p>The result panel carries Cost, Price, per and Unit price, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>per</strong> — in unit(s)</li><li><strong>Unit cost</strong> — in USD</li></ul><p>The result boxes are Cost in USD, Price in USD, per in unit(s), Unit price in USD, Quantity in unit(s), Discount in percent, Total cost in USD, Revenue in USD, Profit per unit in USD, Total profit in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — per = 1 unit(s), Unit cost = 100 USD, Price = 1000 USD, per = 1 unit(s), Unit price = 100 USD, Quantity = 1 unit(s), Discount = 10 perc, Total cost = 100 USD, Revenue = 1000 USD, Profit per unit = 10 USD and Total profit = 100 USD — through the same formula and the panel reports <strong>Cost</strong> = 100 USD.</p><ul><li><strong>Cost</strong> = 100 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Cost</strong> = <code>per × Unit cost</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Cost</strong> = 100 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Discount offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Cost</strong> = <code>per × Unit cost</code></li><li><strong>per</strong> = <code>Cost ÷ Unit cost</code></li><li><strong>Unit cost</strong> = <code>Cost ÷ per</code></li><li><strong>Price</strong> = <code>per × Unit price</code></li><li><strong>Unit price</strong> = <code>Price ÷ per</code></li><li><strong>Total cost</strong> = <code>Quantity × Unit cost</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Cost</strong> = <code>per × Unit cost</code> — the form to use when per and Unit cost are the values you have.</li><li><strong>per</strong> = <code>Cost ÷ Unit cost</code> — the form to use when Cost and Unit cost are the values you have.</li><li><strong>Unit cost</strong> = <code>Cost ÷ per</code> — the form to use when Cost and per are the values you have.</li><li><strong>Price</strong> = <code>per × Unit price</code> — the form to use when per and Unit price are the values you have.</li><li><strong>per</strong> = <code>Price ÷ Unit price</code> — the form to use when Price and Unit price are the values you have.</li><li><strong>Unit price</strong> = <code>Price ÷ per</code> — the form to use when Price and per are the values you have.</li><li><strong>Total cost</strong> = <code>Quantity × Unit cost</code> — the form to use when Quantity and Unit cost are the values you have.</li><li><strong>Quantity</strong> = <code>Total cost ÷ Unit cost</code> — the form to use when Total cost and Unit cost are the values you have.</li></ul><p>Any one of Cost, per and Unit cost can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double per from 1 to 2, leaving every other box alone. The panel moves from <strong>Cost</strong> 100 USD to <strong>Cost</strong> 200 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Cost, Price and per are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>per left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If per is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Unit cost left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Unit cost is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert per to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Profit form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>per</strong> is measured in unit(s). It feeds Cost and Unit cost. Fill it from a measurement rather than a memory — per is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Unit cost</strong> takes a plain number with no unit attached. It feeds Cost, per and Total cost. Fill it from a measurement rather than a memory — Unit cost is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 10 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Cost</strong> is a plain number and the page's own defaults put it at 100. It is computed from per and Unit cost, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Price</strong> is a plain number. It is computed from per and Unit price, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>per</strong> is a plain number. It is computed from Price and Unit price, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Unit price</strong> is a plain number. It is computed from Price and per, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Quantity</strong> is a plain number. It is computed from Total cost and Unit cost, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Discount</strong> is a percent figure. It is computed from Revenue, Quantity and Unit price, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Total cost</strong> is a plain number. It is computed from Quantity and Unit cost, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Revenue</strong> is a plain number. It is computed from Quantity, Unit price and Discount, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Profit per unit</strong> is a plain number. It is computed from Revenue, Total cost and Quantity, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Total profit</strong> is a plain number. It is computed from Revenue and Total cost, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Profit actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Cost follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are per and Unit cost and the number you are missing is Cost and Price.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/coupon-rate">Coupon rate</a>, <a href="/finance/cpa">CPA (cost per acquisition) Calculator</a> and <a href="/finance/cpc-cpm">CPC and CPM Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Profit calculator work out?', 'a' => 'Cost, Price, per and Unit price, from per and Unit cost. The relationship is Cost = per × Unit cost.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'per (unit(s)), Unit cost (USD). Fill per and unit cost and leave Cost empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Cost, per, Unit cost and Price blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Cost = 100 USD. The figures come from per as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Cost is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave per blank and the page solves for it, reporting Cost instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Cost keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/coupon-rate', 'name' => 'Coupon rate'],
            ['path' => '/finance/cpa', 'name' => 'CPA (cost per acquisition) Calculator'],
            ['path' => '/finance/cpc-cpm', 'name' => 'CPC and CPM Calculator'],
        ],
        'authors' => [],
    ],
];
