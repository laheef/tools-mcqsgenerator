<?php

/**
 * Inventory turnover
 * /finance/inventory-turnover
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Inventory turnover',
    'meta' => ['title' => 'Inventory turnover — Free Online Calculator', 'description' => 'Inventory turnover works out inventory days from cost of Goods Sold and beginning inventory. Results come back in USD, with any other unit a click away.', 'h1' => 'Inventory turnover Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'COGS',
                            'label' => 'Cost of Goods Sold',
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
                            'name' => 'Begin_inventory',
                            'label' => 'Beginning inventory',
                            'type' => 'number',
                            'help' => 'Inventory value that the company has at the beginning of the fiscal year.',
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
                            'name' => 'End_inventory',
                            'label' => 'Ending inventory',
                            'type' => 'number',
                            'help' => 'Inventory value that the company has at the end of the fiscal year.',
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
                            'name' => 'Year_days',
                            'label' => 'Period',
                            'type' => 'number',
                            'help' => 'Time between the record of the Beginning Inventory and the Ending Inventory. 365 days is the default value but can be used 360 days or other value as preferred.',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '365',
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
                            'name' => 'Inventory_Days',
                            'label' => 'Inventory days',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Inventory_turnover',
                            'label' => 'Inventory turnover',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Avg_inventory',
                            'label' => 'Average inventory',
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
            'title' => 'Inventory_turnover = COGS / Avg_inventory',
            'results' => ['COGS' => 'Avg_inventory*Inventory_turnover', 'Avg_inventory' => 'COGS/Inventory_turnover', 'Inventory_turnover' => 'COGS/Avg_inventory'],
        ],
        [
            'title' => 'Avg_inventory = (Begin_inventory+End_inventory) / 2',
            'results' => ['End_inventory' => '2*Avg_inventory - Begin_inventory', 'Avg_inventory' => '(1/2)*Begin_inventory + (1/2)*End_inventory', 'Begin_inventory' => '2*Avg_inventory - End_inventory'],
        ],
        [
            'title' => 'Inventory_Days=Year_days / Inventory_turnover ',
            'results' => ['Inventory_Days' => 'Year_days/Inventory_turnover', 'Year_days' => 'Inventory_Days*Inventory_turnover', 'Inventory_turnover' => 'Year_days/Inventory_Days'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Inventory turnover works out Inventory turnover and Average inventory from Cost of Goods Sold, Beginning inventory and Ending inventory. Nothing is looked up on this page: inventory turnover is computed from cost of Goods Sold and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Inventory turnover calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Inventory turnover: it takes 5 numbers and reports Inventory turnover and Average inventory.</p><p>Written with the labels from the form, Inventory turnover = Cost of Goods Sold ÷ Average inventory.</p><p>The answers are Inventory turnover and Average inventory; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 5 boxes, and nothing else.</p><ul><li><strong>Cost of Goods Sold</strong> — in USD</li><li><strong>Beginning inventory</strong> — in USD. Inventory value that the company has at the beginning of the fiscal year.</li><li><strong>Ending inventory</strong> — in USD. Inventory value that the company has at the end of the fiscal year.</li><li><strong>Period</strong> — in days. Time between the record of the Beginning Inventory and the Ending Inventory. 365 days is the default value but can be used 360 days or other value as preferred.</li><li><strong>Inventory days</strong> — a plain number, no unit</li></ul><p>The answers come back as Inventory turnover, Average inventory in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Cost of Goods Sold = 10 USD, Beginning inventory = 100 USD, Ending inventory = 1000 USD, Period = 365 days and Inventory days = 100 — through the same formula and the panel reports <strong>Average inventory</strong> = 550 USD and <strong>Inventory turnover</strong> = 3.65.</p><ul><li><strong>Average inventory</strong> = 550 USD</li><li><strong>Inventory turnover</strong> = 3.65</li></ul><p>That is <strong>Inventory turnover</strong> = <code>Cost of Goods Sold ÷ Average inventory</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Average inventory</strong> = 550 and <strong>Inventory turnover</strong> = 3.65. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Period lists 6 options and opens on days. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Inventory turnover</strong> = <code>Cost of Goods Sold ÷ Average inventory</code></li><li><strong>Cost of Goods Sold</strong> = <code>Average inventory × Inventory turnover</code></li><li><strong>Average inventory</strong> = <code>Cost of Goods Sold ÷ Inventory turnover</code></li><li><strong>Ending inventory</strong> = <code>2 × Average inventory − Beginning inventory</code></li><li><strong>Beginning inventory</strong> = <code>2 × Average inventory − Ending inventory</code></li><li><strong>Inventory days</strong> = <code>Period ÷ Inventory turnover</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Inventory turnover</strong> = <code>Cost of Goods Sold ÷ Average inventory</code> — the form to use when Cost of Goods Sold and Average inventory are the values you have.</li><li><strong>Cost of Goods Sold</strong> = <code>Average inventory × Inventory turnover</code> — the form to use when Average inventory and Inventory turnover are the values you have.</li><li><strong>Average inventory</strong> = <code>Cost of Goods Sold ÷ Inventory turnover</code> — the form to use when Cost of Goods Sold and Inventory turnover are the values you have.</li><li><strong>Average inventory</strong> = <code>(1 ÷ 2) × Beginning inventory + (1 ÷ 2) × Ending inventory</code> — the form to use when Beginning inventory and Ending inventory are the values you have.</li><li><strong>Ending inventory</strong> = <code>2 × Average inventory − Beginning inventory</code> — the form to use when Average inventory and Beginning inventory are the values you have.</li><li><strong>Beginning inventory</strong> = <code>2 × Average inventory − Ending inventory</code> — the form to use when Average inventory and Ending inventory are the values you have.</li><li><strong>Inventory days</strong> = <code>Period ÷ Inventory turnover</code> — the form to use when Period and Inventory turnover are the values you have.</li><li><strong>Period</strong> = <code>Inventory days × Inventory turnover</code> — the form to use when Inventory days and Inventory turnover are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Inventory turnover, Cost of Goods Sold and Average inventory can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Cost of Goods Sold, from 10 to 20 — and the answers go from <strong>Average inventory</strong> 550 USD and <strong>Inventory turnover</strong> 3.65 to <strong>Average inventory</strong> 550 USD and <strong>Inventory turnover</strong> 3.65.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Period carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Inventory turnover and Average inventory are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Cost of Goods Sold left as a guess.</strong> Anything typed into Cost of Goods Sold is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Beginning inventory left as a guess.</strong> Anything typed into Beginning inventory is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Cost of Goods Sold to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Inventory turnover form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Cost of Goods Sold</strong> takes a plain number with no unit attached. It feeds Average inventory and Inventory turnover. Fill it from a measurement rather than a memory — Cost of Goods Sold is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Beginning inventory</strong> takes a plain number with no unit attached. Inventory value that the company has at the beginning of the fiscal year. It feeds Ending inventory and Average inventory. Fill it from a measurement rather than a memory — Beginning inventory is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Ending inventory</strong> takes a plain number with no unit attached. Inventory value that the company has at the end of the fiscal year. It feeds Average inventory and Beginning inventory. Fill it from a measurement rather than a memory — Ending inventory is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Period</strong> is a days quantity: the page opens it in days and converts anything else you pick before the formula runs. Time between the record of the Beginning Inventory and the Ending Inventory. 365 days is the default value but can be used 360 days or other value as preferred. It feeds Inventory days and Inventory turnover. Fill it from a measurement rather than a memory — Period is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Inventory days</strong> takes a plain number with no unit attached. It feeds Period and Inventory turnover. Fill it from a measurement rather than a memory — Inventory days is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Inventory turnover</strong> is a plain number and the page's own defaults put it at 3.65. The value follows from Cost of Goods Sold and Average inventory. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Average inventory</strong> is a plain number and the page's own defaults put it at 550. The value follows from Cost of Goods Sold and Inventory turnover. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Average inventory</th><th>Inventory turnover</th></tr></thead><tbody><tr><td><strong>Cost of Goods Sold</strong> +10%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Beginning inventory</strong> +10%</td><td>+0.91%</td><td>+0%</td></tr><tr><td><strong>Ending inventory</strong> +10%</td><td>+9.09%</td><td>+0%</td></tr><tr><td><strong>Period</strong> +10%</td><td>+0%</td><td>+10%</td></tr><tr><td><strong>Inventory days</strong> +10%</td><td>+0%</td><td>-9.09%</td></tr></tbody></table><p>The steepest column belongs to Period: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. By contrast, Cost of Goods Sold barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Cost of Goods Sold = 5 USD, Beginning inventory = 50 USD, Ending inventory = 500 USD, Period = 183 days and Inventory days = 50 and the page reports <strong>Average inventory</strong> = 275 USD and <strong>Inventory turnover</strong> = 3.65.</li><li>Feed in Cost of Goods Sold = 30 USD, Beginning inventory = 100 USD, Ending inventory = 1000 USD, Period = 365 days and Inventory days = 100 and the page reports <strong>Average inventory</strong> = 550 USD and <strong>Inventory turnover</strong> = 3.65.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Inventory turnover actually offers.</p><ul><li><strong>days</strong> — opens in <em>days</em>, and the chip also carries hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Inventory turnover is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are days and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Cost of Goods Sold, Beginning inventory and Ending inventory are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Cost of Goods Sold, Beginning inventory and Ending inventory measured, Inventory turnover and Average inventory wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/price-to-sales-ratio">Price to sales ratio Calculator</a>, <a href="/finance/price-to-earnings">Price/earnings ratio</a> and <a href="/finance/private-savings">Private savings Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Inventory turnover calculator work out?', 'a' => <<<'TXT'
            Inventory turnover and Average inventory, from Cost of Goods Sold and Average inventory. The relationship is Inventory turnover = Cost of Goods Sold ÷ Average inventory.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Cost of Goods Sold (USD), Beginning inventory (USD), Ending inventory (USD), Period (days), Inventory days. Fill cost of Goods Sold, beginning inventory and ending inventory and leave Inventory turnover empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Inventory turnover, Cost of Goods Sold, Average inventory and Ending inventory can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Average inventory = 550 USD and Inventory turnover = 3.65. That comes from the page's own defaults, entered in Cost of Goods Sold; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Inventory turnover is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Cost of Goods Sold blank and the page solves for it, reporting Inventory turnover instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Inventory turnover keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/price-to-sales-ratio', 'name' => 'Price to sales ratio Calculator'],
            ['path' => '/finance/price-to-earnings', 'name' => 'Price/earnings ratio'],
            ['path' => '/finance/private-savings', 'name' => 'Private savings Calculator'],
        ],
        'authors' => [],
    ],
];
