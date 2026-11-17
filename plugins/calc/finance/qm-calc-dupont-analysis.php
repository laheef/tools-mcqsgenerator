<?php

/**
 * DuPont analysis
 * /finance/dupont-analysis
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'DuPont analysis',
    'meta' => ['title' => 'DuPont analysis Calculator — Formula, Units & Example', 'description' => 'DuPont analysis works out net profit margin and total asset turnover and reports both. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'DuPont analysis Calculator', 'updated' => '2026-09-15'],
    'sections' => [
        [
            'title' => 'DuPont analysis inputs',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sales',
                            'label' => 'Sales',
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
                            'name' => 'net_income',
                            'label' => 'Net income',
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
                            'name' => 'total_asset',
                            'label' => 'Total assets',
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
                            'name' => 'total_equity',
                            'label' => 'Total equity',
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
            'title' => 'DuPont analysis results',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'net_profit_margin',
                            'label' => 'Net profit margin',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_asset_turnover',
                            'label' => 'Total asset turnover',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'financial_leverage',
                            'label' => 'Financial leverage',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'return_on_equity',
                            'label' => 'Return on equity (ROE)',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'return_on_equity = net_profit_margin * total_asset_turnover * financial_leverage',
            'results' => ['total_asset_turnover' => 'return_on_equity/(financial_leverage*net_profit_margin)', 'net_profit_margin' => 'return_on_equity/(financial_leverage*total_asset_turnover)', 'financial_leverage' => 'return_on_equity/(net_profit_margin*total_asset_turnover)', 'return_on_equity' => 'financial_leverage*net_profit_margin*total_asset_turnover'],
        ],
        [
            'title' => 'net_profit_margin = net_income / sales',
            'results' => ['net_profit_margin' => 'net_income/sales', 'sales' => 'net_income/net_profit_margin', 'net_income' => 'net_profit_margin*sales'],
        ],
        [
            'title' => 'total_asset_turnover = sales / total_asset',
            'results' => ['total_asset_turnover' => 'sales/total_asset', 'sales' => 'total_asset*total_asset_turnover', 'total_asset' => 'sales/total_asset_turnover'],
        ],
        [
            'title' => 'financial_leverage = total_asset / total_equity',
            'results' => ['total_equity' => 'total_asset/financial_leverage', 'financial_leverage' => 'total_asset/total_equity', 'total_asset' => 'financial_leverage*total_equity'],
        ],
        [
            'title' => 'return_on_equity = net_income / total_equity',
            'results' => ['total_equity' => 'net_income/return_on_equity', 'net_income' => 'return_on_equity*total_equity', 'return_on_equity' => 'net_income/total_equity'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Net profit margin, Total asset turnover and Financial leverage into DuPont analysis and the answer comes back as Sales and Net income. Nothing is looked up on this page: sales is computed from net profit margin and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Sales is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the DuPont analysis calculator works', 'html' => <<<'TXT'
            <p>The DuPont analysis calculator applies one relationship to 3 numbers and reports Sales, Net income and Total assets.</p><p>In the form&#039;s own words, Return on equity (ROE) = Financial leverage × Net profit margin × Total asset turnover.</p><p>The answers are Sales, Net income, Total assets and Total equity; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Net profit margin</strong> — in percent</li><li><strong>Total asset turnover</strong> — in percent</li><li><strong>Financial leverage</strong> — in percent</li></ul><p>What you get back is Sales in USD, Net income in USD, Total assets in USD, Total equity in USD, Return on equity (ROE) in percent, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Sales = 10 USD, Net income = 100 USD, Total assets = 1000 USD, Total equity = 10 USD, Net profit margin = 100 perc, Financial leverage = 1000 perc and Return on equity (ROE) = 10 perc gives <strong>Total asset turnover</strong> = 1.000e-4 perc.</p><ul><li><strong>Total asset turnover</strong> = 1.000e-4 perc</li></ul><p>The line behind those figures is <strong>Return on equity (ROE)</strong> = <code>Financial leverage × Net profit margin × Total asset turnover</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Total asset turnover</strong> = 1.000e-4. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Return on equity (ROE) lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Return on equity (ROE)</strong> = <code>Financial leverage × Net profit margin × Total asset turnover</code></li><li><strong>Total asset turnover</strong> = <code>Return on equity (ROE) ÷ (Financial leverage × Net profit margin)</code></li><li><strong>Net profit margin</strong> = <code>Return on equity (ROE) ÷ (Financial leverage × Total asset turnover)</code></li><li><strong>Financial leverage</strong> = <code>Return on equity (ROE) ÷ (Net profit margin × Total asset turnover)</code></li><li><strong>Sales</strong> = <code>Net income ÷ Net profit margin</code></li><li><strong>Net income</strong> = <code>Net profit margin × Sales</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Return on equity (ROE)</strong> = <code>Financial leverage × Net profit margin × Total asset turnover</code> — the form to use when Financial leverage, Net profit margin and Total asset turnover are the values you have.</li><li><strong>Total asset turnover</strong> = <code>Return on equity (ROE) ÷ (Financial leverage × Net profit margin)</code> — the form to use when Return on equity (ROE), Financial leverage and Net profit margin are the values you have.</li><li><strong>Net profit margin</strong> = <code>Return on equity (ROE) ÷ (Financial leverage × Total asset turnover)</code> — the form to use when Return on equity (ROE), Financial leverage and Total asset turnover are the values you have.</li><li><strong>Financial leverage</strong> = <code>Return on equity (ROE) ÷ (Net profit margin × Total asset turnover)</code> — the form to use when Return on equity (ROE), Net profit margin and Total asset turnover are the values you have.</li><li><strong>Net profit margin</strong> = <code>Net income ÷ Sales</code> — the form to use when Net income and Sales are the values you have.</li><li><strong>Sales</strong> = <code>Net income ÷ Net profit margin</code> — the form to use when Net income and Net profit margin are the values you have.</li><li><strong>Net income</strong> = <code>Net profit margin × Sales</code> — the form to use when Net profit margin and Sales are the values you have.</li><li><strong>Total asset turnover</strong> = <code>Sales ÷ Total assets</code> — the form to use when Sales and Total assets are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Return on equity (ROE), Total asset turnover and Net profit margin can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Sales, from 10 to 20 — and the answers go from <strong>Total asset turnover</strong> 1.000e-4 perc to <strong>Total asset turnover</strong> 1.000e-4 perc.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Net profit margin, Total asset turnover and Financial leverage carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Sales, Net income and Total assets are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Net profit margin left as a guess.</strong> Anything typed into Net profit margin is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Total asset turnover left as a guess.</strong> Anything typed into Total asset turnover is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Net profit margin to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the DuPont analysis form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Net profit margin</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The page reads it when it works out Total asset turnover, Financial leverage and Return on equity (ROE). Fill it from a measurement rather than a memory — Net profit margin is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Total asset turnover</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The page reads it when it works out Net profit margin, Financial leverage and Return on equity (ROE). Fill it from a measurement rather than a memory — Total asset turnover is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Financial leverage</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The page reads it when it works out Total asset turnover, Net profit margin and Return on equity (ROE). Fill it from a measurement rather than a memory — Financial leverage is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Sales</strong> is a plain number. The value follows from Net income and Net profit margin. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Net income</strong> is a plain number. The value follows from Net profit margin and Sales. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Total assets</strong> is a plain number. The value follows from Sales and Total asset turnover. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Total equity</strong> is a plain number. The value follows from Total assets and Financial leverage. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Return on equity (ROE)</strong> is a percent figure. The value follows from Financial leverage, Net profit margin and Total asset turnover. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Total asset turnover</th></tr></thead><tbody><tr><td><strong>Sales</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Net income</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Total assets</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Total equity</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Net profit margin</strong> +10%</td><td>-9.09%</td></tr><tr><td><strong>Financial leverage</strong> +10%</td><td>-9.09%</td></tr><tr><td><strong>Return on equity (ROE)</strong> +10%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Return on equity (ROE): ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. By contrast, Sales, Net income and Total assets barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on DuPont analysis actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Sales is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Net profit margin, Total asset turnover and Financial leverage are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Net profit margin, Total asset turnover and Financial leverage and the number you are missing is Sales and Net income.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/margin-of-safety">Margin of safety Calculator</a>, <a href="/finance/margin-discount">Margin with discount Calculator</a> and <a href="/finance/marginal-cost">Marginal cost</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the DuPont analysis calculator work out?', 'a' => <<<'TXT'
            Sales, Net income, Total assets and Total equity, from Financial leverage, Net profit margin and Total asset turnover. The relationship is Return on equity (ROE) = Financial leverage × Net profit margin × Total asset turnover.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Net profit margin (percent), Total asset turnover (percent), Financial leverage (percent). With net profit margin, total asset turnover and financial leverage in place, Sales can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Return on equity (ROE), Total asset turnover, Net profit margin and Financial leverage can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Total asset turnover = 1.000e-4 perc. That comes from the page\'s own defaults, entered in Net profit margin; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Sales is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Net profit margin blank and the page solves for it, reporting Sales instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Sales keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/margin-of-safety', 'name' => 'Margin of safety Calculator'],
            ['path' => '/finance/margin-discount', 'name' => 'Margin with discount Calculator'],
            ['path' => '/finance/marginal-cost', 'name' => 'Marginal cost'],
        ],
        'authors' => [],
    ],
];
