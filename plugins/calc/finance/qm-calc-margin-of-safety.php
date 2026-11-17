<?php

/**
 * Margin of safety
 * /finance/margin-of-safety
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Margin of safety',
    'meta' => ['title' => 'Margin of safety Calculator: Free, With Steps', 'description' => 'Margin of safety takes sales volume and returns current (estimated) sales. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Margin of safety Calculator', 'updated' => '2026-09-15'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'current_sales',
                            'label' => 'Current (estimated) sales',
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
                            'name' => 'breakeven_sales',
                            'label' => 'Breakeven sales',
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
            'title' => 'Per unit sales',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sales_volume',
                            'label' => 'Sales volume',
                            'type' => 'number',
                            'help' => 'Number of unit sales',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price_per_unit',
                            'label' => 'Selling price per unit',
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
                            'name' => 'cost_per_unit',
                            'label' => 'Cost price per unit',
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
                            'name' => 'MOS_sales',
                            'label' => 'Margin of safety',
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
                            'name' => 'MOS_ratio',
                            'label' => 'Margin of safety ratio',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'MOS_percentage',
                            'label' => 'Margin of safety percentage',
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
                            'name' => 'MOS_unit',
                            'label' => 'Margin of safety (units)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'MOS_percentage = (current_sales - breakeven_sales) / current_sales',
            'results' => ['current_sales' => '-breakeven_sales/(MOS_percentage - 1)', 'breakeven_sales' => 'current_sales*(1 - MOS_percentage)', 'MOS_percentage' => '(-breakeven_sales + current_sales)/current_sales'],
        ],
        [
            'title' => 'MOS_sales = current_sales - breakeven_sales',
            'results' => ['current_sales' => 'MOS_sales + breakeven_sales', 'breakeven_sales' => '-MOS_sales + current_sales', 'MOS_sales' => '-breakeven_sales + current_sales'],
        ],
        [
            'title' => 'MOS_unit = (current_sales - breakeven_sales) / price_per_unit',
            'results' => ['price_per_unit' => '(-breakeven_sales + current_sales)/MOS_unit', 'current_sales' => 'MOS_unit*price_per_unit + breakeven_sales', 'breakeven_sales' => '-MOS_unit*price_per_unit + current_sales', 'MOS_unit' => '(-breakeven_sales + current_sales)/price_per_unit'],
        ],
        [
            'title' => 'current_sales = sales_volume * price_per_unit',
            'results' => ['price_per_unit' => 'current_sales/sales_volume', 'current_sales' => 'price_per_unit*sales_volume', 'sales_volume' => 'current_sales/price_per_unit'],
        ],
        [
            'title' => 'breakeven_sales = sales_volume * cost_per_unit',
            'results' => ['sales_volume' => 'breakeven_sales/cost_per_unit', 'breakeven_sales' => 'cost_per_unit*sales_volume', 'cost_per_unit' => 'breakeven_sales/sales_volume'],
        ],
        [
            'title' => 'MOS_ratio = (current_sales - breakeven_sales) / current_sales',
            'results' => ['current_sales' => '-breakeven_sales/(MOS_ratio - 1)', 'MOS_ratio' => '(-breakeven_sales + current_sales)/current_sales', 'breakeven_sales' => 'current_sales*(1 - MOS_ratio)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Current (estimated) sales and Breakeven sales into Margin of safety and the answer comes back as Sales volume and Selling price per unit. The arithmetic is the whole method: sales volume is worked out from current (estimated) sales by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Margin of safety calculator works', 'html' => <<<'TXT'
            <p>The Margin of safety calculator applies one relationship to 2 numbers and reports Sales volume, Selling price per unit and Cost price per unit.</p><p>In the form&#039;s own words, Margin of safety percentage = ( − Breakeven sales + Current (estimated) sales) ÷ Current (estimated) sales.</p><p>What comes back is Sales volume, Selling price per unit, Cost price per unit and Margin of safety — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Current (estimated) sales</strong> — in USD</li><li><strong>Breakeven sales</strong> — in USD</li></ul><p>What you get back is Sales volume, Selling price per unit in USD, Cost price per unit in USD, Margin of safety in USD, Margin of safety ratio, Margin of safety percentage in percent, Margin of safety (units), shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Breakeven sales = 10 USD, Sales volume = 100, Selling price per unit = 1000 USD, Cost price per unit = 10 USD, Margin of safety = 100 USD, Margin of safety ratio = 1000, Margin of safety percentage = 10 perc and Margin of safety (units) = 100; the answers are <strong>Current (estimated) sales</strong> = -1.11 USD.</p><ul><li><strong>Current (estimated) sales</strong> = -1.11 USD</li></ul><p>The line behind those figures is <strong>Margin of safety percentage</strong> = <code>( − Breakeven sales + Current (estimated) sales) ÷ Current (estimated) sales</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Current (estimated) sales</strong> = -1.11. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Margin of safety percentage lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Margin of safety percentage</strong> = <code>( − Breakeven sales + Current (estimated) sales) ÷ Current (estimated) sales</code></li><li><strong>Current (estimated) sales</strong> = <code>− Breakeven sales ÷ (Margin of safety percentage − 1)</code></li><li><strong>Breakeven sales</strong> = <code>Current (estimated) sales × (1 − Margin of safety percentage)</code></li><li><strong>Margin of safety</strong> = <code>− Breakeven sales + Current (estimated) sales</code></li><li><strong>Margin of safety (units)</strong> = <code>( − Breakeven sales + Current (estimated) sales) ÷ Selling price per unit</code></li><li><strong>Selling price per unit</strong> = <code>( − Breakeven sales + Current (estimated) sales) ÷ Margin of safety (units)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Margin of safety percentage</strong> = <code>( − Breakeven sales + Current (estimated) sales) ÷ Current (estimated) sales</code> — the form to use when Breakeven sales and Current (estimated) sales are the values you have.</li><li><strong>Current (estimated) sales</strong> = <code>− Breakeven sales ÷ (Margin of safety percentage − 1)</code> — the form to use when Breakeven sales and Margin of safety percentage are the values you have.</li><li><strong>Breakeven sales</strong> = <code>Current (estimated) sales × (1 − Margin of safety percentage)</code> — the form to use when Current (estimated) sales and Margin of safety percentage are the values you have.</li><li><strong>Margin of safety</strong> = <code>− Breakeven sales + Current (estimated) sales</code> — the form to use when Breakeven sales and Current (estimated) sales are the values you have.</li><li><strong>Current (estimated) sales</strong> = <code>Margin of safety + Breakeven sales</code> — the form to use when Margin of safety and Breakeven sales are the values you have.</li><li><strong>Breakeven sales</strong> = <code>− Margin of safety + Current (estimated) sales</code> — the form to use when Margin of safety and Current (estimated) sales are the values you have.</li><li><strong>Margin of safety (units)</strong> = <code>( − Breakeven sales + Current (estimated) sales) ÷ Selling price per unit</code> — the form to use when Breakeven sales, Current (estimated) sales and Selling price per unit are the values you have.</li><li><strong>Selling price per unit</strong> = <code>( − Breakeven sales + Current (estimated) sales) ÷ Margin of safety (units)</code> — the form to use when Breakeven sales, Current (estimated) sales and Margin of safety (units) are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Margin of safety percentage, Current (estimated) sales and Breakeven sales can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Breakeven sales, from 10 to 20 — and the answers go from <strong>Current (estimated) sales</strong> -1.11 USD to <strong>Current (estimated) sales</strong> -2.22 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Sales volume, Selling price per unit and Cost price per unit are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Current (estimated) sales left as a guess.</strong> Anything typed into Current (estimated) sales is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Breakeven sales left as a guess.</strong> Anything typed into Breakeven sales is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Current (estimated) sales is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Current (estimated) sales</strong> takes a plain number with no unit attached. Change it and Breakeven sales, Margin of safety percentage and Margin of safety changes with it. Have it to hand before you start: Current (estimated) sales is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Breakeven sales</strong> takes a plain number with no unit attached. Change it and Current (estimated) sales, Margin of safety percentage and Margin of safety changes with it. Have it to hand before you start: Breakeven sales is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 7 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Sales volume</strong> is a plain number. The value follows from Current (estimated) sales and Selling price per unit. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Selling price per unit</strong> is a plain number. The value follows from Breakeven sales, Current (estimated) sales and Margin of safety (units). Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Cost price per unit</strong> is a plain number. The value follows from Breakeven sales and Sales volume. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Margin of safety</strong> is a plain number. The value follows from Breakeven sales and Current (estimated) sales. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Margin of safety ratio</strong> is a plain number. The value follows from Breakeven sales and Current (estimated) sales. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Margin of safety percentage</strong> is a percent figure. The value follows from Breakeven sales and Current (estimated) sales. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Margin of safety (units)</strong> is a plain number. The value follows from Breakeven sales, Current (estimated) sales and Selling price per unit. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Sales volume is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Current (estimated) sales and Breakeven sales measured, Sales volume and Selling price per unit wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/what-to-offer-on-a-house">What to offer on a house Calculator</a>, <a href="/finance/working-capital">Working capital Calculator</a> and <a href="/finance/working-capital-turnover-ratio">Working capital turnover ratio Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Margin of safety calculator work out?', 'a' => <<<'TXT'
            Sales volume, Selling price per unit, Cost price per unit and Margin of safety, from Breakeven sales and Current (estimated) sales. The relationship is Margin of safety percentage = ( − Breakeven sales + Current (estimated) sales) ÷ Current (estimated) sales.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Current (estimated) sales (USD), Breakeven sales (USD). Fill current (estimated) sales and breakeven sales and leave Sales volume empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Margin of safety percentage, Current (estimated) sales, Breakeven sales and Margin of safety can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Current (estimated) sales = -1.11 USD. Those are the defaults written into the form — move Current (estimated) sales and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Sales volume is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Current (estimated) sales left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Sales volume keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/what-to-offer-on-a-house', 'name' => 'What to offer on a house Calculator'],
            ['path' => '/finance/working-capital', 'name' => 'Working capital Calculator'],
            ['path' => '/finance/working-capital-turnover-ratio', 'name' => 'Working capital turnover ratio Calculator'],
        ],
        'authors' => [],
    ],
];
