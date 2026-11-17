<?php

/**
 * Break even
 * /finance/break-even
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Break even',
    'meta' => ['title' => 'Break even Calculator: Formula, Steps & Examples', 'description' => 'Break even turns cost per unit and fixed costs into revenue per unit and markup. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Break even Calculator', 'updated' => '2026-09-28'],
    'sections' => [
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
                                ['when' => 'per_unit_revenue == 5 and per_unit_cost == 1.5 and fixed_costs == 2000', 'text' => <<<'TXT'
                                Onim Example 1: I have a coffee shop with $2,000 in fixed costs per month, and I sell a cup of coffee for $5.00, which costs $1.50. How many units per month do I need to sell to break even?&nbsp;
                                TXT],
                                ['when' => 'per_unit_revenue == 40 and per_unit_cost == 10 and fixed_costs == 6000', 'text' => <<<'TXT'
                                Onim Example 2: I have a phone case shop with $6,000 in fixed costs per month. Each case costs $10.00, and the selling price is $40.00. What's the monthly break-even revenue?
                                TXT],
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
                            'name' => 'per_unit_revenue',
                            'label' => 'Revenue per unit',
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
                            'name' => 'per_unit_cost',
                            'label' => 'Cost per unit',
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
                            'name' => 'fixed_costs',
                            'label' => 'Fixed costs',
                            'type' => 'number',
                            'help' => 'The costs that do not change with sales, e.g., rent, utilities, etc.',
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
            'title' => 'Margin and markup',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'margin',
                            'label' => 'Margin',
                            'type' => 'number',
                            'help' => 'Gross margin per unit.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'markup',
                            'label' => 'Markup',
                            'type' => 'number',
                            'help' => 'Percentage difference between the cost of producing a good and its selling price.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'To break even',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'units',
                            'label' => 'You need to sell',
                            'type' => 'number',
                            'suffix' => 'units',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'revenue',
                            'label' => 'With a revenue of',
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
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'per_unit_revenue == 5 and per_unit_cost == 1.5 and fixed_costs == 2000', 'text' => <<<'TXT'
                                How the result is calculated: Subtract the revenue by the cost of each unit: $5.00&nbsp;−&nbsp;$1.50&nbsp;=&nbsp;$3.50 Divide the fixed costs by the last result: 571.4&nbsp;units&nbsp;
                                TXT],
                                ['when' => 'per_unit_revenue == 40 and per_unit_cost == 10 and fixed_costs == 6000', 'text' => <<<'TXT'
                                How the result is calculated: Subtract the cost per unit from the selling price: $40.00&nbsp;−&nbsp;$10.00&nbsp;=&nbsp;$30.00 Divide the fixed costs by the last result: 200&nbsp;units Multiply the number of units by the revenue per unit: $8,000
                                TXT],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Check our examples: Example 1&nbsp;⧉ — Number of units to break even Example 2 ⧉ — Finding the break-even revenue'],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'fixed_costs + units * per_unit_cost = units * per_unit_revenue',
            'results' => ['per_unit_revenue' => 'fixed_costs/units + per_unit_cost', 'per_unit_cost' => '-fixed_costs/units + per_unit_revenue', 'units' => '-fixed_costs/(per_unit_cost - per_unit_revenue)', 'fixed_costs' => 'units*(-per_unit_cost + per_unit_revenue)'],
        ],
        [
            'title' => 'revenue = units * per_unit_revenue',
            'results' => ['units' => 'revenue/per_unit_revenue', 'revenue' => 'per_unit_revenue*units', 'per_unit_revenue' => 'revenue/units'],
        ],
        [
            'title' => 'per_unit_cost + per_unit_cost * markup  = per_unit_revenue',
            'results' => ['per_unit_cost' => 'per_unit_revenue/(markup + 1)', 'markup' => '(-per_unit_cost + per_unit_revenue)/per_unit_cost', 'per_unit_revenue' => 'per_unit_cost*(markup + 1)'],
        ],
        [
            'title' => 'markup = 1 / (1 - margin) - 1',
            'results' => ['markup' => '-margin/(margin - 1)', 'margin' => 'markup/(markup + 1)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Revenue per unit and You need to sell into Break even and the answer comes back as Cost per unit and Fixed costs. There is no hidden constant here: change cost per unit and revenue per unit moves with it. The main result, Cost per unit, is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the Break even calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Break even: it takes 2 numbers and reports Cost per unit, Fixed costs and Margin.</p><p>The relationship it solves reads Revenue per unit = Fixed costs ÷ You need to sell + Cost per unit.</p><p>What comes back is Cost per unit, Fixed costs, Margin and Markup — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Revenue per unit</strong> — in USD</li><li><strong>You need to sell</strong> — in units</li></ul><p>The answers come back as Cost per unit in USD, Fixed costs in USD, Margin in percent, Markup in percent, With a revenue of in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Revenue per unit = 10 USD, Cost per unit = 100 USD, Fixed costs = 1000 USD, Margin = 10 perc, Markup = 100 perc and You need to sell = 1000 units gives <strong>With a revenue of</strong> = 10000 USD.</p><ul><li><strong>With a revenue of</strong> = 10000 USD</li></ul><p>That is <strong>Revenue per unit</strong> = <code>Fixed costs ÷ You need to sell + Cost per unit</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>With a revenue of</strong> = 10000. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Margin lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Revenue per unit</strong> = <code>Fixed costs ÷ You need to sell + Cost per unit</code></li><li><strong>Cost per unit</strong> = <code>− Fixed costs ÷ You need to sell + Revenue per unit</code></li><li><strong>You need to sell</strong> = <code>− Fixed costs ÷ (Cost per unit − Revenue per unit)</code></li><li><strong>Fixed costs</strong> = <code>You need to sell × ( − Cost per unit + Revenue per unit)</code></li><li><strong>With a revenue of</strong> = <code>Revenue per unit × You need to sell</code></li><li><strong>Markup</strong> = <code>( − Cost per unit + Revenue per unit) ÷ Cost per unit</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Revenue per unit</strong> = <code>Fixed costs ÷ You need to sell + Cost per unit</code> — the form to use when Fixed costs, You need to sell and Cost per unit are the values you have.</li><li><strong>Cost per unit</strong> = <code>− Fixed costs ÷ You need to sell + Revenue per unit</code> — the form to use when Fixed costs, You need to sell and Revenue per unit are the values you have.</li><li><strong>You need to sell</strong> = <code>− Fixed costs ÷ (Cost per unit − Revenue per unit)</code> — the form to use when Fixed costs, Cost per unit and Revenue per unit are the values you have.</li><li><strong>Fixed costs</strong> = <code>You need to sell × ( − Cost per unit + Revenue per unit)</code> — the form to use when You need to sell, Cost per unit and Revenue per unit are the values you have.</li><li><strong>With a revenue of</strong> = <code>Revenue per unit × You need to sell</code> — the form to use when Revenue per unit and You need to sell are the values you have.</li><li><strong>You need to sell</strong> = <code>With a revenue of ÷ Revenue per unit</code> — the form to use when With a revenue of and Revenue per unit are the values you have.</li><li><strong>Revenue per unit</strong> = <code>With a revenue of ÷ You need to sell</code> — the form to use when With a revenue of and You need to sell are the values you have.</li><li><strong>Cost per unit</strong> = <code>Revenue per unit ÷ (Markup + 1)</code> — the form to use when Revenue per unit and Markup are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Revenue per unit, Cost per unit and You need to sell can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Revenue per unit from 10 to 20, leaving every other box alone. The panel moves from <strong>With a revenue of</strong> 10000 USD to <strong>With a revenue of</strong> 20000 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Cost per unit, Fixed costs and Margin are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Revenue per unit left as a guess.</strong> Anything typed into Revenue per unit is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>You need to sell left as a guess.</strong> Anything typed into You need to sell is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Revenue per unit and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Break even form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Revenue per unit</strong> takes a plain number with no unit attached. Change it and Cost per unit, You need to sell and Fixed costs changes with it. Fill it from a measurement rather than a memory — Revenue per unit is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>You need to sell</strong> is measured in units. Change it and Revenue per unit, Cost per unit and Fixed costs changes with it. Fill it from a measurement rather than a memory — You need to sell is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Cost per unit</strong> is a plain number. The value follows from Fixed costs, You need to sell and Revenue per unit. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Fixed costs</strong> is a plain number. The value follows from You need to sell, Cost per unit and Revenue per unit. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Margin</strong> is a percent figure. The value follows from Markup. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Markup</strong> is a percent figure. The value follows from Cost per unit and Revenue per unit. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>With a revenue of</strong> is a plain number and the page's own defaults put it at 10000. The value follows from Revenue per unit and You need to sell. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>With a revenue of</th></tr></thead><tbody><tr><td><strong>Revenue per unit</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Cost per unit</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Fixed costs</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Margin</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Markup</strong> +10%</td><td>+0%</td></tr><tr><td><strong>You need to sell</strong> +10%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Revenue per unit: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. By contrast, Cost per unit, Fixed costs and Margin barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Revenue per unit = 5 USD, Cost per unit = 50 USD, Fixed costs = 500 USD, Margin = 5 perc, Markup = 50 perc and You need to sell = 500 units and the page reports <strong>With a revenue of</strong> = 2500 USD.</li><li>Feed in Revenue per unit = 30 USD, Cost per unit = 100 USD, Fixed costs = 1000 USD, Margin = 10 perc, Markup = 100 perc and You need to sell = 1000 units and the page reports <strong>With a revenue of</strong> = 30000 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Break even actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Cost per unit is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Revenue per unit and You need to sell are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Revenue per unit and You need to sell is what you already know and Cost per unit and Fixed costs is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/portfolio-beta">Portfolio beta Calculator</a>, <a href="/finance/post-judgment-interest">Post judgment interest Calculator</a> and <a href="/finance/post-office-monthly-income-scheme">Post Office Monthly Income Scheme</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Break even calculator work out?', 'a' => <<<'TXT'
            Cost per unit, Fixed costs, Margin and Markup, from Fixed costs, You need to sell and Cost per unit. The relationship is Revenue per unit = Fixed costs ÷ You need to sell + Cost per unit.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Revenue per unit (USD), You need to sell (units). With revenue per unit and you need to sell in place, Cost per unit can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Revenue per unit, Cost per unit, You need to sell and Fixed costs can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'With a revenue of = 10000 USD. The figures come from Revenue per unit as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Cost per unit is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Revenue per unit blank and the page solves for it, reporting Cost per unit instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Cost per unit at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/portfolio-beta', 'name' => 'Portfolio beta Calculator'],
            ['path' => '/finance/post-judgment-interest', 'name' => 'Post judgment interest Calculator'],
            ['path' => '/finance/post-office-monthly-income-scheme', 'name' => 'Post Office Monthly Income Scheme'],
        ],
        'authors' => [],
    ],
];
