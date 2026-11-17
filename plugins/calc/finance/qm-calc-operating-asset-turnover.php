<?php

/**
 * Operating asset turnover
 * /finance/operating-asset-turnover
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Operating asset turnover',
    'meta' => ['title' => 'Operating asset turnover — Formula & Results', 'description' => 'Operating asset turnover turns cash and accounts receivable into operating assets. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Operating asset turnover Calculator', 'updated' => '2026-09-19'],
    'sections' => [
        [
            'title' => 'Operating assets',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cash',
                            'label' => 'Cash',
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
                            'name' => 'receivables',
                            'label' => 'Accounts receivable',
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
                            'name' => 'inventory',
                            'label' => 'Inventory',
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
                            'name' => 'prepaid_expense',
                            'label' => 'Prepaid expenses',
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
                            'name' => 'fixed_asset',
                            'label' => 'Fixed assets',
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
                            'name' => 'operating_assets',
                            'label' => 'Operating assets',
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
            'title' => 'Operating asset turnover',
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
                            'name' => 'operating_asset_turnover',
                            'label' => 'Operating asset turnover',
                            'type' => 'number',
                            'suffix' => '×',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'operating_assets = cash + receivables + inventory + prepaid_expense + fixed_asset',
            'results' => [
                'cash' => '-fixed_asset - inventory + operating_assets - prepaid_expense - receivables',
                'fixed_asset' => '-cash - inventory + operating_assets - prepaid_expense - receivables',
                'inventory' => '-cash - fixed_asset + operating_assets - prepaid_expense - receivables',
                'operating_assets' => 'cash + fixed_asset + inventory + prepaid_expense + receivables',
                'prepaid_expense' => '-cash - fixed_asset - inventory + operating_assets - receivables',
                'receivables' => '-cash - fixed_asset - inventory + operating_assets - prepaid_expense',
            ],
        ],
        [
            'title' => 'operating_asset_turnover = sales / operating_assets ',
            'results' => ['operating_asset_turnover' => 'sales/operating_assets', 'sales' => 'operating_asset_turnover*operating_assets', 'operating_assets' => 'sales/operating_asset_turnover'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Operating asset turnover takes Cash, Accounts receivable and Inventory and returns Operating assets and Sales. Nothing is looked up on this page: operating assets is computed from cash and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Operating assets is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Operating asset turnover calculator works', 'html' => <<<'TXT'
            <p>The Operating asset turnover calculator applies one relationship to 5 numbers and reports Operating assets, Sales and Operating asset turnover.</p><p>In the form&#039;s own words, Operating assets = Cash + Fixed assets + Inventory + Prepaid expenses + Accounts receivable.</p><p>What comes back is Operating assets, Sales and Operating asset turnover — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs.</p><ul><li><strong>Cash</strong> — in USD</li><li><strong>Accounts receivable</strong> — in USD</li><li><strong>Inventory</strong> — in USD</li><li><strong>Prepaid expenses</strong> — in USD</li><li><strong>Fixed assets</strong> — in USD</li></ul><p>The answers come back as Operating assets in USD, Sales in USD, Operating asset turnover in ×. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Cash = 10 USD, Accounts receivable = 100 USD, Inventory = 1000 USD, Prepaid expenses = 10 USD, Fixed assets = 100 USD, Sales = 1000 USD and Operating asset turnover = 10 × gives <strong>Operating assets</strong> = 1220 USD.</p><ul><li><strong>Operating assets</strong> = 1220 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Operating assets</strong> = <code>Cash + Fixed assets + Inventory + Prepaid expenses + Accounts receivable</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Operating assets</strong> = 1220 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Operating assets takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Operating assets</strong> = <code>Cash + Fixed assets + Inventory + Prepaid expenses + Accounts receivable</code></li><li><strong>Cash</strong> = <code>− Fixed assets − Inventory + Operating assets − Prepaid expenses − Accounts receivable</code></li><li><strong>Fixed assets</strong> = <code>− Cash − Inventory + Operating assets − Prepaid expenses − Accounts receivable</code></li><li><strong>Inventory</strong> = <code>− Cash − Fixed assets + Operating assets − Prepaid expenses − Accounts receivable</code></li><li><strong>Prepaid expenses</strong> = <code>− Cash − Fixed assets − Inventory + Operating assets − Accounts receivable</code></li><li><strong>Accounts receivable</strong> = <code>− Cash − Fixed assets − Inventory + Operating assets − Prepaid expenses</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Operating assets</strong> = <code>Cash + Fixed assets + Inventory + Prepaid expenses + Accounts receivable</code> — the form to use when Cash, Fixed assets, Inventory and Prepaid expenses are the values you have.</li><li><strong>Cash</strong> = <code>− Fixed assets − Inventory + Operating assets − Prepaid expenses − Accounts receivable</code> — the form to use when Fixed assets, Inventory, Operating assets and Prepaid expenses are the values you have.</li><li><strong>Fixed assets</strong> = <code>− Cash − Inventory + Operating assets − Prepaid expenses − Accounts receivable</code> — the form to use when Cash, Inventory, Operating assets and Prepaid expenses are the values you have.</li><li><strong>Inventory</strong> = <code>− Cash − Fixed assets + Operating assets − Prepaid expenses − Accounts receivable</code> — the form to use when Cash, Fixed assets, Operating assets and Prepaid expenses are the values you have.</li><li><strong>Prepaid expenses</strong> = <code>− Cash − Fixed assets − Inventory + Operating assets − Accounts receivable</code> — the form to use when Cash, Fixed assets, Inventory and Operating assets are the values you have.</li><li><strong>Accounts receivable</strong> = <code>− Cash − Fixed assets − Inventory + Operating assets − Prepaid expenses</code> — the form to use when Cash, Fixed assets, Inventory and Operating assets are the values you have.</li><li><strong>Operating asset turnover</strong> = <code>Sales ÷ Operating assets</code> — the form to use when Sales and Operating assets are the values you have.</li><li><strong>Sales</strong> = <code>Operating asset turnover × Operating assets</code> — the form to use when Operating asset turnover and Operating assets are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Operating assets, Cash and Fixed assets can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Cash, from 10 to 20 — and the answers go from <strong>Operating assets</strong> 1220 USD to <strong>Operating assets</strong> 1230 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Operating assets, Sales and Operating asset turnover are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Cash left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Cash is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Accounts receivable left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Accounts receivable is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Inventory left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Inventory is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Cash and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Cash</strong> takes a plain number with no unit attached. Change it and Fixed assets, Inventory and Operating assets changes with it. Have it to hand before you start: Cash is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Accounts receivable</strong> takes a plain number with no unit attached. Change it and Cash, Fixed assets and Inventory changes with it. Have it to hand before you start: Accounts receivable is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Inventory</strong> takes a plain number with no unit attached. Change it and Cash, Fixed assets and Operating assets changes with it. Have it to hand before you start: Inventory is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Prepaid expenses</strong> takes a plain number with no unit attached. Change it and Cash, Fixed assets and Inventory changes with it. Have it to hand before you start: Prepaid expenses is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Fixed assets</strong> takes a plain number with no unit attached. Change it and Cash, Inventory and Operating assets changes with it. Have it to hand before you start: Fixed assets is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Operating assets</strong> is a plain number and the page's own defaults put it at 1220. The value follows from Cash, Fixed assets, Inventory and Prepaid expenses. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Sales</strong> is a plain number. The value follows from Operating asset turnover and Operating assets. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Operating asset turnover</strong> is a plain number. The value follows from Sales and Operating assets. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Operating assets</th></tr></thead><tbody><tr><td><strong>Cash</strong> +10%</td><td>+0.08%</td></tr><tr><td><strong>Accounts receivable</strong> +10%</td><td>+0.82%</td></tr><tr><td><strong>Inventory</strong> +10%</td><td>+8.2%</td></tr><tr><td><strong>Prepaid expenses</strong> +10%</td><td>+0.08%</td></tr><tr><td><strong>Fixed assets</strong> +10%</td><td>+0.82%</td></tr><tr><td><strong>Sales</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Operating asset turnover</strong> +10%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Inventory sits at the top — a ten per cent error in that box shows up as roughly 8.2 per cent in the answer. By contrast, Cash, Prepaid expenses and Sales barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Cash = 5 USD, Accounts receivable = 50 USD, Inventory = 500 USD, Prepaid expenses = 5 USD, Fixed assets = 50 USD, Sales = 500 USD and Operating asset turnover = 5 ×, the answer is <strong>Operating assets</strong> = 610 USD.</li><li>With Cash = 30 USD, Accounts receivable = 100 USD, Inventory = 1000 USD, Prepaid expenses = 10 USD, Fixed assets = 100 USD, Sales = 1000 USD and Operating asset turnover = 10 ×, the answer is <strong>Operating assets</strong> = 1240 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Operating assets follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Cash, Accounts receivable and Inventory are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Cash, Accounts receivable and Inventory and the number you are missing is Operating assets and Sales.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/salary-inflation">Salary inflation Calculator</a>, <a href="/finance/salary-to-hourly">Salary to hourly</a> and <a href="/finance/salary-with-overtime">Salary with overtime</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Operating asset turnover calculator work out?', 'a' => <<<'TXT'
            Operating assets, Sales and Operating asset turnover, from Cash, Fixed assets, Inventory and Prepaid expenses. The relationship is Operating assets = Cash + Fixed assets + Inventory + Prepaid expenses + Accounts receivable.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Cash (USD), Accounts receivable (USD), Inventory (USD), Prepaid expenses (USD), Fixed assets (USD). With cash, accounts receivable and inventory in place, Operating assets can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Operating assets, Cash, Fixed assets and Inventory can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Operating assets = 1220 USD. That comes from the page\'s own defaults, entered in Cash; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Operating assets is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'A blank box is the question. With Cash left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Operating assets keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/salary-inflation', 'name' => 'Salary inflation Calculator'],
            ['path' => '/finance/salary-to-hourly', 'name' => 'Salary to hourly'],
            ['path' => '/finance/salary-with-overtime', 'name' => 'Salary with overtime'],
        ],
        'authors' => [],
    ],
];
