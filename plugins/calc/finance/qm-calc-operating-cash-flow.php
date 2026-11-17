<?php

/**
 * Operating cash flow
 * /finance/operating-cash-flow
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Operating cash flow',
    'meta' => ['title' => 'Operating cash flow — Free Online Calculator', 'description' => 'Operating cash flow reports change in inventories, change in accounts receivables, change in accounts payable and change in operating working capital.', 'h1' => 'Operating cash flow Calculator', 'updated' => '2026-09-15'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Net_income',
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
                            'name' => 'Depreciation',
                            'label' => 'Depreciation',
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
                            'name' => 'Amortization',
                            'label' => 'Amortization',
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
                            'name' => 'Change_inventory',
                            'label' => 'Change in inventories',
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
                            'name' => 'Change_accounts_receivables',
                            'label' => 'Change in accounts receivables',
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
                            'name' => 'Change_accounts_payable',
                            'label' => 'Change in accounts payable',
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
                            'name' => 'Income_tax_payable',
                            'label' => 'Income tax payable',
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
                            'name' => 'Net_other_cash_flows',
                            'label' => 'Net of other cash flows',
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
                            'name' => 'Change_op_working_cap',
                            'label' => 'Change in operating working capital',
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
                            'name' => 'Operating_cash_flow',
                            'label' => 'Operating cash flow',
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
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'Operating_cash_flow < 0', 'text' => 'Losing money. Better analyze its interest coverage ratio.&nbsp;'],
                                ['when' => 'Operating_cash_flow > Net_income', 'text' => 'Your company looks to be doing great. We recommend you to check its free cash flow.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Balance changes',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Inventory_start',
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
                            'name' => 'Inventory_end',
                            'label' => 'End inventory',
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
                            'name' => 'Acc_recv_start',
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
                            'name' => 'Acc_recv_end',
                            'label' => 'End accounts receivables',
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
                            'name' => 'Acc_pay_start',
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
                            'name' => 'Acc_pay_end',
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
            'title' => 'Operating_cash_flow=Net_income+Depreciation + Amortization + Change_op_working_cap+Net_other_cash_flows+Income_tax_payable',
            'results' => [
                'Operating_cash_flow' => 'Amortization + Change_op_working_cap + Depreciation + Income_tax_payable + Net_income + Net_other_cash_flows',
                'Amortization' => '-Change_op_working_cap - Depreciation - Income_tax_payable - Net_income - Net_other_cash_flows + Operating_cash_flow',
                'Net_income' => '-Amortization - Change_op_working_cap - Depreciation - Income_tax_payable - Net_other_cash_flows + Operating_cash_flow',
                'Income_tax_payable' => '-Amortization - Change_op_working_cap - Depreciation - Net_income - Net_other_cash_flows + Operating_cash_flow',
                'Change_op_working_cap' => '-Amortization - Depreciation - Income_tax_payable - Net_income - Net_other_cash_flows + Operating_cash_flow',
                'Depreciation' => '-Amortization - Change_op_working_cap - Income_tax_payable - Net_income - Net_other_cash_flows + Operating_cash_flow',
                'Net_other_cash_flows' => '-Amortization - Change_op_working_cap - Depreciation - Income_tax_payable - Net_income + Operating_cash_flow',
            ],
        ],
        [
            'title' => 'Change_op_working_cap=Change_inventory+Change_accounts_receivables+Change_accounts_payable',
            'results' => ['Change_op_working_cap' => 'Change_accounts_payable + Change_accounts_receivables + Change_inventory', 'Change_accounts_receivables' => '-Change_accounts_payable - Change_inventory + Change_op_working_cap', 'Change_accounts_payable' => '-Change_accounts_receivables - Change_inventory + Change_op_working_cap', 'Change_inventory' => '-Change_accounts_payable - Change_accounts_receivables + Change_op_working_cap'],
        ],
        [
            'title' => 'Change_inventory= Inventory_start-Inventory_end ',
            'results' => ['Inventory_start' => 'Change_inventory + Inventory_end', 'Inventory_end' => '-Change_inventory + Inventory_start', 'Change_inventory' => '-Inventory_end + Inventory_start'],
        ],
        [
            'title' => 'Change_accounts_receivables=Acc_recv_start-Acc_recv_end',
            'results' => ['Acc_recv_end' => 'Acc_recv_start - Change_accounts_receivables', 'Change_accounts_receivables' => '-Acc_recv_end + Acc_recv_start', 'Acc_recv_start' => 'Acc_recv_end + Change_accounts_receivables'],
        ],
        [
            'title' => 'Change_accounts_payable=Acc_pay_end-Acc_pay_start',
            'results' => ['Acc_pay_start' => 'Acc_pay_end - Change_accounts_payable', 'Change_accounts_payable' => 'Acc_pay_end - Acc_pay_start', 'Acc_pay_end' => 'Acc_pay_start + Change_accounts_payable'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Operating cash flow takes Net income, Depreciation and Amortization and returns Change in inventories and Change in accounts receivables. Nothing is looked up on this page: change in inventories is computed from net income and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Change in inventories is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Operating cash flow calculator works', 'html' => <<<'TXT'
            <p>Operating cash flow answers one question from 6 numbers, and the answer is Change in inventories, Change in accounts receivables and Change in accounts payable.</p><p>In the form&#039;s own words, Operating cash flow = Amortization + Change in operating working capital + Depreciation + Income tax payable + Net income + Net of other cash flows.</p><p>The answers are Change in inventories, Change in accounts receivables, Change in accounts payable and Operating cash flow; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 6 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Net income</strong> — in USD</li><li><strong>Depreciation</strong> — in USD</li><li><strong>Amortization</strong> — in USD</li><li><strong>Income tax payable</strong> — in USD</li><li><strong>Net of other cash flows</strong> — in USD</li><li><strong>Change in operating working capital</strong> — in USD</li></ul><p>What you get back is Change in inventories in USD, Change in accounts receivables in USD, Change in accounts payable in USD, Operating cash flow in USD, Beginning inventory in USD, End inventory in USD, Beginning accounts receivables in USD, End accounts receivables in USD, Beginning accounts payable in USD, End accounts payable in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Net income = 10 USD, Depreciation = 100 USD, Amortization = 1000 USD, Change in inventories = 10 USD, Change in accounts receivables = 100 USD, Change in accounts payable = 1000 USD, Income tax payable = 10 USD, Net of other cash flows = 100 USD, Change in operating working capital = 1000 USD, Beginning inventory = 10 USD, End inventory = 100 USD, Beginning accounts receivables = 1000 USD, End accounts receivables = 10 USD, Beginning accounts payable = 100 USD and End accounts payable = 1000 USD; the answers are <strong>Operating cash flow</strong> = 2220 USD.</p><ul><li><strong>Operating cash flow</strong> = 2220 USD</li></ul><p>That is <strong>Operating cash flow</strong> = <code>Amortization + Change in operating working capital + Depreciation + Income tax payable + Net income + Net of other cash flows</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Operating cash flow</strong> = 2220 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Change in inventories takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Operating cash flow</strong> = <code>Amortization + Change in operating working capital + Depreciation + Income tax payable + Net income + Net of other cash flows</code></li><li><strong>Amortization</strong> = <code>− Change in operating working capital − Depreciation − Income tax payable − Net income − Net of other cash flows + Operating cash flow</code></li><li><strong>Net income</strong> = <code>− Amortization − Change in operating working capital − Depreciation − Income tax payable − Net of other cash flows + Operating cash flow</code></li><li><strong>Income tax payable</strong> = <code>− Amortization − Change in operating working capital − Depreciation − Net income − Net of other cash flows + Operating cash flow</code></li><li><strong>Change in operating working capital</strong> = <code>− Amortization − Depreciation − Income tax payable − Net income − Net of other cash flows + Operating cash flow</code></li><li><strong>Depreciation</strong> = <code>− Amortization − Change in operating working capital − Income tax payable − Net income − Net of other cash flows + Operating cash flow</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Operating cash flow</strong> = <code>Amortization + Change in operating working capital + Depreciation + Income tax payable + Net income + Net of other cash flows</code> — the form to use when Amortization, Change in operating working capital, Depreciation and Income tax payable are the values you have.</li><li><strong>Amortization</strong> = <code>− Change in operating working capital − Depreciation − Income tax payable − Net income − Net of other cash flows + Operating cash flow</code> — the form to use when Change in operating working capital, Depreciation, Income tax payable and Net income are the values you have.</li><li><strong>Net income</strong> = <code>− Amortization − Change in operating working capital − Depreciation − Income tax payable − Net of other cash flows + Operating cash flow</code> — the form to use when Amortization, Change in operating working capital, Depreciation and Income tax payable are the values you have.</li><li><strong>Income tax payable</strong> = <code>− Amortization − Change in operating working capital − Depreciation − Net income − Net of other cash flows + Operating cash flow</code> — the form to use when Amortization, Change in operating working capital, Depreciation and Net income are the values you have.</li><li><strong>Change in operating working capital</strong> = <code>− Amortization − Depreciation − Income tax payable − Net income − Net of other cash flows + Operating cash flow</code> — the form to use when Amortization, Depreciation, Income tax payable and Net income are the values you have.</li><li><strong>Depreciation</strong> = <code>− Amortization − Change in operating working capital − Income tax payable − Net income − Net of other cash flows + Operating cash flow</code> — the form to use when Amortization, Change in operating working capital, Income tax payable and Net income are the values you have.</li><li><strong>Net of other cash flows</strong> = <code>− Amortization − Change in operating working capital − Depreciation − Income tax payable − Net income + Operating cash flow</code> — the form to use when Amortization, Change in operating working capital, Depreciation and Income tax payable are the values you have.</li><li><strong>Change in operating working capital</strong> = <code>Change in accounts payable + Change in accounts receivables + Change in inventories</code> — the form to use when Change in accounts payable, Change in accounts receivables and Change in inventories are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Operating cash flow, Amortization and Net income can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Net income, from 10 to 20 — and the answers go from <strong>Operating cash flow</strong> 2220 USD to <strong>Operating cash flow</strong> 2230 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Change in inventories, Change in accounts receivables and Change in accounts payable are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Net income left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Net income is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Depreciation left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Depreciation is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Amortization left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Amortization is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Net income and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Operating cash flow form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Net income</strong> takes a plain number with no unit attached. Change it and Operating cash flow, Amortization and Income tax payable changes with it. Fill it from a measurement rather than a memory — Net income is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Depreciation</strong> takes a plain number with no unit attached. Change it and Operating cash flow, Amortization and Net income changes with it. Fill it from a measurement rather than a memory — Depreciation is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Amortization</strong> takes a plain number with no unit attached. Change it and Operating cash flow, Net income and Income tax payable changes with it. Fill it from a measurement rather than a memory — Amortization is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Income tax payable</strong> takes a plain number with no unit attached. Change it and Operating cash flow, Amortization and Net income changes with it. Fill it from a measurement rather than a memory — Income tax payable is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Net of other cash flows</strong> takes a plain number with no unit attached. Change it and Operating cash flow, Amortization and Net income changes with it. Fill it from a measurement rather than a memory — Net of other cash flows is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Change in operating working capital</strong> takes a plain number with no unit attached. Change it and Operating cash flow, Amortization and Net income changes with it. Fill it from a measurement rather than a memory — Change in operating working capital is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Change in inventories follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Net income, Depreciation and Amortization are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Net income, Depreciation and Amortization measured, Change in inventories and Change in accounts receivables wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/market-capitalization">Market capitalization Calculator</a>, <a href="/finance/mva">Market value added (MVA) Calculator</a> and <a href="/finance/margin-2-sets">Markup and margin (2 sets) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Operating cash flow calculator work out?', 'a' => <<<'TXT'
            Change in inventories, Change in accounts receivables, Change in accounts payable and Operating cash flow, from Amortization, Change in operating working capital, Depreciation and Income tax payable. The relationship is Operating cash flow = Amortization + Change in operating working capital + Depreciation + Income tax payable + Net income + Net of other cash flows.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Net income (USD), Depreciation (USD), Amortization (USD), Income tax payable (USD), Net of other cash flows (USD). Enter net income, depreciation and amortization; Change in inventories is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Operating cash flow, Amortization, Net income and Income tax payable can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Operating cash flow = 2220 USD. The figures come from Net income as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Change in inventories is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Net income blank and the page solves for it, reporting Change in inventories instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Change in inventories at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/market-capitalization', 'name' => 'Market capitalization Calculator'],
            ['path' => '/finance/mva', 'name' => 'Market value added (MVA) Calculator'],
            ['path' => '/finance/margin-2-sets', 'name' => 'Markup and margin (2 sets) Calculator'],
        ],
        'authors' => [],
    ],
];
