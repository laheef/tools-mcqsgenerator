<?php

/**
 * Net operating assets
 * /finance/net-operating-assets
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Net operating assets',
    'meta' => ['title' => 'Net operating assets: Formula, Steps & Results', 'description' => 'Net operating assets turns cash and accounts receivable into operating liabilities. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Net operating assets Calculator', 'updated' => '2026-09-19'],
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
            'title' => 'Operating liabilities',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'payables',
                            'label' => 'Accounts payable',
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
                            'name' => 'accrued_operating_expenses',
                            'label' => 'Accrued operating expenses',
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
                            'name' => 'operating_liabilities',
                            'label' => 'Operating liabilities',
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
                            'name' => 'net_operating_assets',
                            'label' => 'Net operating assets (NOA)',
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
            'title' => 'net_operating_assets = operating_assets - operating_liabilities ',
            'results' => ['operating_assets' => 'net_operating_assets + operating_liabilities', 'operating_liabilities' => '-net_operating_assets + operating_assets', 'net_operating_assets' => 'operating_assets - operating_liabilities'],
        ],
        [
            'title' => 'operating_assets = cash + receivables + inventory + prepaid_expense + fixed_asset',
            'results' => [
                'inventory' => '-cash - fixed_asset + operating_assets - prepaid_expense - receivables',
                'cash' => '-fixed_asset - inventory + operating_assets - prepaid_expense - receivables',
                'operating_assets' => 'cash + fixed_asset + inventory + prepaid_expense + receivables',
                'fixed_asset' => '-cash - inventory + operating_assets - prepaid_expense - receivables',
                'prepaid_expense' => '-cash - fixed_asset - inventory + operating_assets - receivables',
                'receivables' => '-cash - fixed_asset - inventory + operating_assets - prepaid_expense',
            ],
        ],
        [
            'title' => 'operating_liabilities = payables + accrued_operating_expenses',
            'results' => ['payables' => '-accrued_operating_expenses + operating_liabilities', 'operating_liabilities' => 'accrued_operating_expenses + payables', 'accrued_operating_expenses' => 'operating_liabilities - payables'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Net operating assets turns Operating assets and Operating liabilities into Cash and Accounts receivable. It is a single relationship that reads cash out of operating assets, not a table of canned results keyed by them. Units for Cash default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Net operating assets calculator works', 'html' => <<<'TXT'
            <p>Net operating assets answers one question from 2 numbers, and the answer is Cash, Accounts receivable and Inventory.</p><p>The relationship it solves reads Net operating assets (NOA) = Operating assets − Operating liabilities.</p><p>The result panel carries Cash, Accounts receivable, Inventory and Prepaid expenses, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Operating assets</strong> — in USD</li><li><strong>Operating liabilities</strong> — in USD</li></ul><p>What you get back is Cash in USD, Accounts receivable in USD, Inventory in USD, Prepaid expenses in USD, Fixed assets in USD, Accounts payable in USD, Accrued operating expenses in USD, Net operating assets (NOA) in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Cash = 10 USD, Accounts receivable = 100 USD, Inventory = 1000 USD, Prepaid expenses = 10 USD, Fixed assets = 100 USD, Accounts payable = 1000 USD, Accrued operating expenses = 10 USD, Operating liabilities = 100 USD and Net operating assets (NOA) = 1000 USD; the answers are <strong>Operating assets</strong> = 1100 USD.</p><ul><li><strong>Operating assets</strong> = 1100 USD</li></ul><p>That is <strong>Net operating assets (NOA)</strong> = <code>Operating assets − Operating liabilities</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Operating assets</strong> = 1100 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Cash takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Net operating assets (NOA)</strong> = <code>Operating assets − Operating liabilities</code></li><li><strong>Operating assets</strong> = <code>Net operating assets (NOA) + Operating liabilities</code></li><li><strong>Operating liabilities</strong> = <code>− Net operating assets (NOA) + Operating assets</code></li><li><strong>Inventory</strong> = <code>− Cash − Fixed assets + Operating assets − Prepaid expenses − Accounts receivable</code></li><li><strong>Cash</strong> = <code>− Fixed assets − Inventory + Operating assets − Prepaid expenses − Accounts receivable</code></li><li><strong>Fixed assets</strong> = <code>− Cash − Inventory + Operating assets − Prepaid expenses − Accounts receivable</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Net operating assets (NOA)</strong> = <code>Operating assets − Operating liabilities</code> — the form to use when Operating assets and Operating liabilities are the values you have.</li><li><strong>Operating assets</strong> = <code>Net operating assets (NOA) + Operating liabilities</code> — the form to use when Net operating assets (NOA) and Operating liabilities are the values you have.</li><li><strong>Operating liabilities</strong> = <code>− Net operating assets (NOA) + Operating assets</code> — the form to use when Net operating assets (NOA) and Operating assets are the values you have.</li><li><strong>Operating assets</strong> = <code>Cash + Fixed assets + Inventory + Prepaid expenses + Accounts receivable</code> — the form to use when Cash, Fixed assets, Inventory and Prepaid expenses are the values you have.</li><li><strong>Inventory</strong> = <code>− Cash − Fixed assets + Operating assets − Prepaid expenses − Accounts receivable</code> — the form to use when Cash, Fixed assets, Operating assets and Prepaid expenses are the values you have.</li><li><strong>Cash</strong> = <code>− Fixed assets − Inventory + Operating assets − Prepaid expenses − Accounts receivable</code> — the form to use when Fixed assets, Inventory, Operating assets and Prepaid expenses are the values you have.</li><li><strong>Fixed assets</strong> = <code>− Cash − Inventory + Operating assets − Prepaid expenses − Accounts receivable</code> — the form to use when Cash, Inventory, Operating assets and Prepaid expenses are the values you have.</li><li><strong>Prepaid expenses</strong> = <code>− Cash − Fixed assets − Inventory + Operating assets − Accounts receivable</code> — the form to use when Cash, Fixed assets, Inventory and Operating assets are the values you have.</li></ul><p>Any one of Net operating assets (NOA), Operating assets and Operating liabilities can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Cash from 10 to 20, leaving every other box alone. The panel moves from <strong>Operating assets</strong> 1100 USD to <strong>Operating assets</strong> 1100 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Cash, Accounts receivable and Inventory are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Operating assets left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Operating assets is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Operating liabilities left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Operating liabilities is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Operating assets and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Operating assets</strong> takes a plain number with no unit attached. Change it and Operating liabilities, Net operating assets (NOA) and Inventory changes with it. Have it to hand before you start: Operating assets is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Operating liabilities</strong> takes a plain number with no unit attached. Change it and Operating assets, Net operating assets (NOA) and Accounts payable changes with it. Have it to hand before you start: Operating liabilities is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Cash</strong> is a plain number. The value follows from Fixed assets, Inventory, Operating assets and Prepaid expenses. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Accounts receivable</strong> is a plain number. The value follows from Cash, Fixed assets, Inventory and Operating assets. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Inventory</strong> is a plain number. The value follows from Cash, Fixed assets, Operating assets and Prepaid expenses. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Prepaid expenses</strong> is a plain number. The value follows from Cash, Fixed assets, Inventory and Operating assets. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Fixed assets</strong> is a plain number. The value follows from Cash, Inventory, Operating assets and Prepaid expenses. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Accounts payable</strong> is a plain number. The value follows from Accrued operating expenses and Operating liabilities. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Accrued operating expenses</strong> is a plain number. The value follows from Operating liabilities and Accounts payable. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Net operating assets (NOA)</strong> is a plain number. The value follows from Operating assets and Operating liabilities. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Operating assets</th></tr></thead><tbody><tr><td><strong>Cash</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Accounts receivable</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Inventory</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Prepaid expenses</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Fixed assets</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Accounts payable</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Accrued operating expenses</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Operating liabilities</strong> +10%</td><td>+0.91%</td></tr><tr><td><strong>Net operating assets (NOA)</strong> +10%</td><td>+9.09%</td></tr></tbody></table><p>Ranked by leverage, Net operating assets (NOA) sits at the top — a ten per cent error in that box shows up as roughly 9.1 per cent in the answer. By contrast, Cash, Accounts receivable and Inventory barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Cash = 5 USD, Accounts receivable = 50 USD, Inventory = 500 USD, Prepaid expenses = 5 USD, Fixed assets = 50 USD, Accounts payable = 500 USD, Accrued operating expenses = 5 USD, Operating liabilities = 50 USD and Net operating assets (NOA) = 500 USD, the answer is <strong>Operating assets</strong> = 550 USD.</li><li>With Cash = 30 USD, Accounts receivable = 100 USD, Inventory = 1000 USD, Prepaid expenses = 10 USD, Fixed assets = 100 USD, Accounts payable = 1000 USD, Accrued operating expenses = 10 USD, Operating liabilities = 100 USD and Net operating assets (NOA) = 1000 USD, the answer is <strong>Operating assets</strong> = 1100 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Cash follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Operating assets and Operating liabilities are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Operating assets and Operating liabilities measured, Cash and Accounts receivable wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/receivables-turnover">Receivables turnover Calculator</a>, <a href="/finance/rsi">Relative strength index (RSI) Calculator</a> and <a href="/finance/remote-vs-on-location-workers">Remote vs. on-location workers (non-salary costs) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Net operating assets calculator work out?', 'a' => <<<'TXT'
            Cash, Accounts receivable, Inventory and Prepaid expenses, from Operating assets and Operating liabilities. The relationship is Net operating assets (NOA) = Operating assets − Operating liabilities.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Operating assets (USD), Operating liabilities (USD). With operating assets and operating liabilities in place, Cash can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Net operating assets (NOA), Operating assets, Operating liabilities and Inventory blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Operating assets = 1100 USD. Those are the defaults written into the form — move Operating assets and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Cash is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Operating assets left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Cash at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/receivables-turnover', 'name' => 'Receivables turnover Calculator'],
            ['path' => '/finance/rsi', 'name' => 'Relative strength index (RSI) Calculator'],
            ['path' => '/finance/remote-vs-on-location-workers', 'name' => 'Remote vs. on-location workers (non-salary costs) Calculator'],
        ],
        'authors' => [],
    ],
];
