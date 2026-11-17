<?php

/**
 * Cash conversion cycle
 * /finance/cash-conversion-cycle
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cash conversion cycle',
    'meta' => ['title' => 'Cash conversion cycle: Formula, Steps & Results', 'description' => 'Cash conversion cycle works out average inventory and average accounts receivables from period of analysis and total revenues. A worked example follows.', 'h1' => 'Cash conversion cycle Calculator', 'updated' => '2026-09-15'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'period',
                            'label' => 'Period of analysis',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '365',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'revenue',
                            'label' => 'Total revenues',
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
                            'name' => 'cost_of_goods_sold',
                            'label' => 'Cost of goods sold',
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
                            'name' => 'avg_inventory',
                            'label' => 'Average inventory',
                            'type' => 'number',
                            'help' => 'If you don\'t know the average inventory, open the section "Calculate the average of inventories" below.',
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
                            'name' => 'avg_accounts_receivables',
                            'label' => 'Average accounts receivables',
                            'type' => 'number',
                            'help' => 'If you don\'t know the average accounts receivables, open the section "Calculate the average of accounts receivables" below.',
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
                            'name' => 'avg_accounts_payable',
                            'label' => 'Average accounts payable',
                            'type' => 'number',
                            'help' => 'If you don\'t know the average accounts payable, open the section "Calculate the average of accounts payable" below.',
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
                            'name' => 'accounts_receivables_days',
                            'label' => 'Accounts receivables days',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'inventory_days',
                            'label' => 'Inventory days',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'accounts_payable_days',
                            'label' => 'Accounts payable days',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cash_conversion_cycle',
                            'label' => 'Cash conversion cycle',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Calculate the average of inventories',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'beginning_inventory',
                            'label' => 'Beginning inventory',
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
                            'name' => 'ending_inventory',
                            'label' => 'End  inventory',
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
            'title' => 'Calculate the average of accounts receivables',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'beginning_accounts_receivables',
                            'label' => 'Beginning accounts receivables',
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
                            'name' => 'ending_accounts_receivables',
                            'label' => 'End  accounts receivables',
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
            'title' => 'Calculate the average of accounts payable',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'beginning_accounts_payable',
                            'label' => 'Beginning accounts payable',
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
                            'name' => 'ending_accounts_payable',
                            'label' => 'End accounts payable',
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
            'title' => 'cash_conversion_cycle= accounts_receivables_days+inventory_days-accounts_payable_days',
            'results' => ['inventory_days' => 'accounts_payable_days - accounts_receivables_days + cash_conversion_cycle', 'accounts_payable_days' => 'accounts_receivables_days - cash_conversion_cycle + inventory_days', 'cash_conversion_cycle' => '-accounts_payable_days + accounts_receivables_days + inventory_days', 'accounts_receivables_days' => 'accounts_payable_days + cash_conversion_cycle - inventory_days'],
        ],
        [
            'title' => 'accounts_receivables_days=avg_accounts_receivables/(revenue/period)',
            'results' => ['period' => 'accounts_receivables_days*revenue/avg_accounts_receivables', 'revenue' => 'avg_accounts_receivables*period/accounts_receivables_days', 'avg_accounts_receivables' => 'accounts_receivables_days*revenue/period', 'accounts_receivables_days' => 'avg_accounts_receivables*period/revenue'],
        ],
        [
            'title' => 'accounts_payable_days=avg_accounts_payable/(cost_of_goods_sold/period)',
            'results' => ['avg_accounts_payable' => 'accounts_payable_days*cost_of_goods_sold/period', 'cost_of_goods_sold' => 'avg_accounts_payable*period/accounts_payable_days', 'accounts_payable_days' => 'avg_accounts_payable*period/cost_of_goods_sold', 'period' => 'accounts_payable_days*cost_of_goods_sold/avg_accounts_payable'],
        ],
        [
            'title' => 'inventory_days=avg_inventory/(cost_of_goods_sold/period)',
            'results' => ['inventory_days' => 'avg_inventory*period/cost_of_goods_sold', 'cost_of_goods_sold' => 'avg_inventory*period/inventory_days', 'avg_inventory' => 'cost_of_goods_sold*inventory_days/period', 'period' => 'cost_of_goods_sold*inventory_days/avg_inventory'],
        ],
        [
            'title' => 'avg_accounts_receivables =  (beginning_accounts_receivables+ending_accounts_receivables) / 2',
            'results' => ['beginning_accounts_receivables' => '2*avg_accounts_receivables - ending_accounts_receivables', 'avg_accounts_receivables' => '(1/2)*beginning_accounts_receivables + (1/2)*ending_accounts_receivables', 'ending_accounts_receivables' => '2*avg_accounts_receivables - beginning_accounts_receivables'],
        ],
        [
            'title' => 'avg_accounts_payable =(beginning_accounts_payable+ending_accounts_payable) / 2',
            'results' => ['ending_accounts_payable' => '2*avg_accounts_payable - beginning_accounts_payable', 'avg_accounts_payable' => '(1/2)*beginning_accounts_payable + (1/2)*ending_accounts_payable', 'beginning_accounts_payable' => '2*avg_accounts_payable - ending_accounts_payable'],
        ],
        [
            'title' => 'avg_inventory =(beginning_inventory+ending_inventory) / 2',
            'results' => ['beginning_inventory' => '2*avg_inventory - ending_inventory', 'avg_inventory' => '(1/2)*beginning_inventory + (1/2)*ending_inventory', 'ending_inventory' => '2*avg_inventory - beginning_inventory'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Enter Accounts receivables days, Inventory days and Accounts payable days into Cash conversion cycle and the answer comes back as Period of analysis and Total revenues. The arithmetic is the whole method: period of analysis is worked out from accounts receivables days by one formula, applied once. Period of analysis comes back in days unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Cash conversion cycle calculator works', 'html' => <<<'TXT'
            <p>Cash conversion cycle answers one question from 3 numbers, and the answer is Period of analysis, Total revenues and Cost of goods sold.</p><p>The relationship it solves reads Cash conversion cycle = − Accounts payable days + Accounts receivables days + Inventory days.</p><p>The answers are Period of analysis, Total revenues, Cost of goods sold and Average inventory; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Accounts receivables days</strong> — in days</li><li><strong>Inventory days</strong> — in days</li><li><strong>Accounts payable days</strong> — in days</li></ul><p>The result boxes are Period of analysis in days, Total revenues in USD, Cost of goods sold in USD, Average inventory in USD, Average accounts receivables in USD, Average accounts payable in USD, Cash conversion cycle in days, Beginning inventory in USD, End inventory in USD, Beginning accounts receivables in USD, End accounts receivables in USD, Beginning accounts payable in USD, End accounts payable in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Period of analysis = 365 days, Total revenues = 100 USD, Cost of goods sold = 1000 USD, Average inventory = 10 USD, Average accounts receivables = 100 USD, Average accounts payable = 1000 USD, Accounts receivables days = 10 days, Accounts payable days = 100 days, Cash conversion cycle = 1000 days, Beginning inventory = 10 USD, End inventory = 100 USD, Beginning accounts receivables = 1000 USD, End accounts receivables = 10 USD, Beginning accounts payable = 100 USD and End accounts payable = 1000 USD gives <strong>Inventory days</strong> = 1090 days.</p><ul><li><strong>Inventory days</strong> = 1090 days</li></ul><p>The line behind those figures is <strong>Cash conversion cycle</strong> = <code>− Accounts payable days + Accounts receivables days + Inventory days</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Inventory days</strong> = 1090. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Period of analysis lists 6 options and opens on days. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Cash conversion cycle</strong> = <code>− Accounts payable days + Accounts receivables days + Inventory days</code></li><li><strong>Inventory days</strong> = <code>Accounts payable days − Accounts receivables days + Cash conversion cycle</code></li><li><strong>Accounts payable days</strong> = <code>Accounts receivables days − Cash conversion cycle + Inventory days</code></li><li><strong>Accounts receivables days</strong> = <code>Accounts payable days + Cash conversion cycle − Inventory days</code></li><li><strong>Period of analysis</strong> = <code>Accounts receivables days × Total revenues ÷ Average accounts receivables</code></li><li><strong>Total revenues</strong> = <code>Average accounts receivables × Period of analysis ÷ Accounts receivables days</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Cash conversion cycle</strong> = <code>− Accounts payable days + Accounts receivables days + Inventory days</code> — the form to use when Accounts payable days, Accounts receivables days and Inventory days are the values you have.</li><li><strong>Inventory days</strong> = <code>Accounts payable days − Accounts receivables days + Cash conversion cycle</code> — the form to use when Accounts payable days, Accounts receivables days and Cash conversion cycle are the values you have.</li><li><strong>Accounts payable days</strong> = <code>Accounts receivables days − Cash conversion cycle + Inventory days</code> — the form to use when Accounts receivables days, Cash conversion cycle and Inventory days are the values you have.</li><li><strong>Accounts receivables days</strong> = <code>Accounts payable days + Cash conversion cycle − Inventory days</code> — the form to use when Accounts payable days, Cash conversion cycle and Inventory days are the values you have.</li><li><strong>Accounts receivables days</strong> = <code>Average accounts receivables × Period of analysis ÷ Total revenues</code> — the form to use when Average accounts receivables, Period of analysis and Total revenues are the values you have.</li><li><strong>Period of analysis</strong> = <code>Accounts receivables days × Total revenues ÷ Average accounts receivables</code> — the form to use when Accounts receivables days, Total revenues and Average accounts receivables are the values you have.</li><li><strong>Total revenues</strong> = <code>Average accounts receivables × Period of analysis ÷ Accounts receivables days</code> — the form to use when Average accounts receivables, Period of analysis and Accounts receivables days are the values you have.</li><li><strong>Average accounts receivables</strong> = <code>Accounts receivables days × Total revenues ÷ Period of analysis</code> — the form to use when Accounts receivables days, Total revenues and Period of analysis are the values you have.</li></ul><p>Any one of Cash conversion cycle, Inventory days and Accounts payable days can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Period of analysis, from 365 to 730 — and the answers go from <strong>Inventory days</strong> 1090 days to <strong>Inventory days</strong> 1090 days.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Accounts receivables days, Inventory days and Accounts payable days carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Period of analysis, Total revenues and Cost of goods sold are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Accounts receivables days left as a guess.</strong> Anything typed into Accounts receivables days is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Inventory days left as a guess.</strong> Anything typed into Inventory days is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Accounts receivables days and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Accounts receivables days</strong> is a days quantity: the page opens it in days and converts anything else you pick before the formula runs. It feeds Inventory days, Accounts payable days and Cash conversion cycle. Have it to hand before you start: Accounts receivables days is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Inventory days</strong> is a days quantity: the page opens it in days and converts anything else you pick before the formula runs. It feeds Accounts payable days, Cash conversion cycle and Accounts receivables days. Have it to hand before you start: Inventory days is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Accounts payable days</strong> is a days quantity: the page opens it in days and converts anything else you pick before the formula runs. It feeds Inventory days, Cash conversion cycle and Accounts receivables days. Have it to hand before you start: Accounts payable days is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Accounts receivables days, Inventory days and Accounts payable days. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Accounts receivables days into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Period of analysis in days with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Period of analysis is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are days and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Accounts receivables days, Inventory days and Accounts payable days are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Accounts receivables days, Inventory days and Accounts payable days measured, Period of analysis and Total revenues wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/coupon-rate">Coupon rate</a>, <a href="/finance/cpa">CPA (cost per acquisition) Calculator</a> and <a href="/finance/cpc-cpm">CPC and CPM Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cash conversion cycle calculator work out?', 'a' => <<<'TXT'
            Period of analysis, Total revenues, Cost of goods sold and Average inventory, from Accounts payable days, Accounts receivables days and Inventory days. The relationship is Cash conversion cycle = − Accounts payable days + Accounts receivables days + Inventory days.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Accounts receivables days (days), Inventory days (days), Accounts payable days (days). With accounts receivables days, inventory days and accounts payable days in place, Period of analysis can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Cash conversion cycle, Inventory days, Accounts payable days and Accounts receivables days blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Inventory days = 1090 days. The figures come from Accounts receivables days as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Period of analysis is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Accounts receivables days left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Period of analysis at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/coupon-rate', 'name' => 'Coupon rate'],
            ['path' => '/finance/cpa', 'name' => 'CPA (cost per acquisition) Calculator'],
            ['path' => '/finance/cpc-cpm', 'name' => 'CPC and CPM Calculator'],
        ],
        'authors' => [],
    ],
];
