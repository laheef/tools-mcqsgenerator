<?php

/**
 * Days payable outstanding (DPO)
 * /finance/days-payable-outstanding
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Days payable outstanding (DPO)',
    'meta' => ['title' => 'Days payable outstanding (DPO) — Formula & Results', 'description' => 'Days payable outstanding (DPO) turns beginning account payable, ending accounts payable and beginning inventory into average accounts payables and purchases.', 'h1' => 'Days payable outstanding (DPO) Calculator', 'updated' => '2026-09-19'],
    'sections' => [
        [
            'title' => 'Average Payables',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'beginning_payables',
                            'label' => 'Beginning account payable',
                            'type' => 'number',
                            'help' => 'Trade payables at the start of the accounting period.',
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
                            'name' => 'ending_payables',
                            'label' => 'Ending accounts payable',
                            'type' => 'number',
                            'help' => 'Trade payables at the end of the accounting period.',
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
                            'name' => 'average_trade_payables',
                            'label' => 'Average accounts payables',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.0001'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Purchases',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'beginning_inventory',
                            'label' => 'Beginning inventory',
                            'type' => 'number',
                            'help' => 'Inventory value at the start of the accounting period.',
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
                            'label' => 'Ending inventory',
                            'type' => 'number',
                            'help' => 'Inventory value at the end of the accounting period.',
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
                            'name' => 'purchases',
                            'label' => 'Purchases',
                            'type' => 'number',
                            'help' => 'Amount of goods purchased and the cost of goods sold by the company.',
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
            'title' => 'Days Payable Outstanding (DPO)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'days_in_accounting_period',
                            'label' => 'Days in accounting period',
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
                            'name' => 'days_payable_outstanding',
                            'label' => 'Days payable outstanding',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'days_payable_outstanding = (average_trade_payables / purchases) * days_in_accounting_period',
            'results' => ['days_in_accounting_period' => 'days_payable_outstanding*purchases/average_trade_payables', 'days_payable_outstanding' => 'average_trade_payables*days_in_accounting_period/purchases', 'average_trade_payables' => 'days_payable_outstanding*purchases/days_in_accounting_period', 'purchases' => 'average_trade_payables*days_in_accounting_period/days_payable_outstanding'],
        ],
        [
            'title' => 'purchases = ending_inventory - beginning_inventory + cost_of_goods_sold',
            'results' => ['beginning_inventory' => 'cost_of_goods_sold + ending_inventory - purchases', 'cost_of_goods_sold' => 'beginning_inventory - ending_inventory + purchases', 'ending_inventory' => 'beginning_inventory - cost_of_goods_sold + purchases', 'purchases' => '-beginning_inventory + cost_of_goods_sold + ending_inventory'],
        ],
        [
            'title' => 'average_trade_payables = (ending_payables + beginning_payables) / 2',
            'results' => ['ending_payables' => '2*average_trade_payables - beginning_payables', 'beginning_payables' => '2*average_trade_payables - ending_payables', 'average_trade_payables' => '(1/2)*beginning_payables + (1/2)*ending_payables'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Days payable outstanding (DPO) works out Beginning account payable and Ending accounts payable from Average accounts payables, Purchases and Days in accounting period. Nothing is looked up on this page: beginning account payable is computed from average accounts payables and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Beginning account payable is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Days payable outstanding (DPO) calculator works', 'html' => <<<'TXT'
            <p>Days payable outstanding (DPO) answers one question from 3 numbers, and the answer is Beginning account payable, Ending accounts payable and Beginning inventory.</p><p>Written with the labels from the form, Days payable outstanding = Average accounts payables × Days in accounting period ÷ Purchases.</p><p>The answers are Beginning account payable, Ending accounts payable, Beginning inventory and Ending inventory; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Average accounts payables</strong> — in USD</li><li><strong>Purchases</strong> — in USD. Amount of goods purchased and the cost of goods sold by the company.</li><li><strong>Days in accounting period</strong> — in days</li></ul><p>The answers come back as Beginning account payable in USD, Ending accounts payable in USD, Beginning inventory in USD, Ending inventory in USD, Cost of goods sold in USD, Days payable outstanding in days. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Beginning account payable = 10 USD, Ending accounts payable = 100 USD, Average accounts payables = 1000 USD, Beginning inventory = 10 USD, Ending inventory = 100 USD, Cost of goods sold = 1000 USD, Purchases = 10 USD and Days in accounting period = 365 days — through the same formula and the panel reports <strong>Days payable outstanding</strong> = 36500 days.</p><ul><li><strong>Days payable outstanding</strong> = 36500 days</li></ul><p>The line behind those figures is <strong>Days payable outstanding</strong> = <code>Average accounts payables × Days in accounting period ÷ Purchases</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Days payable outstanding</strong> = 36500. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Days payable outstanding lists 6 options and opens on days. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Days payable outstanding</strong> = <code>Average accounts payables × Days in accounting period ÷ Purchases</code></li><li><strong>Days in accounting period</strong> = <code>Days payable outstanding × Purchases ÷ Average accounts payables</code></li><li><strong>Average accounts payables</strong> = <code>Days payable outstanding × Purchases ÷ Days in accounting period</code></li><li><strong>Purchases</strong> = <code>Average accounts payables × Days in accounting period ÷ Days payable outstanding</code></li><li><strong>Beginning inventory</strong> = <code>Cost of goods sold + Ending inventory − Purchases</code></li><li><strong>Cost of goods sold</strong> = <code>Beginning inventory − Ending inventory + Purchases</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Days payable outstanding</strong> = <code>Average accounts payables × Days in accounting period ÷ Purchases</code> — the form to use when Average accounts payables, Days in accounting period and Purchases are the values you have.</li><li><strong>Days in accounting period</strong> = <code>Days payable outstanding × Purchases ÷ Average accounts payables</code> — the form to use when Days payable outstanding, Purchases and Average accounts payables are the values you have.</li><li><strong>Average accounts payables</strong> = <code>Days payable outstanding × Purchases ÷ Days in accounting period</code> — the form to use when Days payable outstanding, Purchases and Days in accounting period are the values you have.</li><li><strong>Purchases</strong> = <code>Average accounts payables × Days in accounting period ÷ Days payable outstanding</code> — the form to use when Average accounts payables, Days in accounting period and Days payable outstanding are the values you have.</li><li><strong>Purchases</strong> = <code>− Beginning inventory + Cost of goods sold + Ending inventory</code> — the form to use when Beginning inventory, Cost of goods sold and Ending inventory are the values you have.</li><li><strong>Beginning inventory</strong> = <code>Cost of goods sold + Ending inventory − Purchases</code> — the form to use when Cost of goods sold, Ending inventory and Purchases are the values you have.</li><li><strong>Cost of goods sold</strong> = <code>Beginning inventory − Ending inventory + Purchases</code> — the form to use when Beginning inventory, Ending inventory and Purchases are the values you have.</li><li><strong>Ending inventory</strong> = <code>Beginning inventory − Cost of goods sold + Purchases</code> — the form to use when Beginning inventory, Cost of goods sold and Purchases are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Days payable outstanding, Days in accounting period and Average accounts payables can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Beginning account payable, from 10 to 20 — and the answers go from <strong>Days payable outstanding</strong> 36500 days to <strong>Days payable outstanding</strong> 36500 days.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Days in accounting period carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Beginning account payable, Ending accounts payable and Beginning inventory are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Average accounts payables left as a guess.</strong> Anything typed into Average accounts payables is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Purchases left as a guess.</strong> Anything typed into Purchases is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Average accounts payables and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Days payable outstanding (DPO) form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Average accounts payables</strong> takes a plain number with no unit attached. The page reads it when it works out Days in accounting period, Days payable outstanding and Purchases. Fill it from a measurement rather than a memory — Average accounts payables is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Purchases</strong> takes a plain number with no unit attached. Amount of goods purchased and the cost of goods sold by the company. The page reads it when it works out Days in accounting period, Days payable outstanding and Average accounts payables. Fill it from a measurement rather than a memory — Purchases is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Days in accounting period</strong> is a days quantity: the page opens it in days and converts anything else you pick before the formula runs. The page reads it when it works out Days payable outstanding, Average accounts payables and Purchases. Fill it from a measurement rather than a memory — Days in accounting period is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 6 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Beginning account payable</strong> is a plain number. The value follows from Average accounts payables and Ending accounts payable. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Ending accounts payable</strong> is a plain number. The value follows from Average accounts payables and Beginning account payable. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Beginning inventory</strong> is a plain number. The value follows from Cost of goods sold, Ending inventory and Purchases. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Ending inventory</strong> is a plain number. The value follows from Beginning inventory, Cost of goods sold and Purchases. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Cost of goods sold</strong> is a plain number. The value follows from Beginning inventory, Ending inventory and Purchases. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Days payable outstanding</strong> is a days figure and the page's own defaults put it at 36500 days. The value follows from Average accounts payables, Days in accounting period and Purchases. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Days payable outstanding (DPO) actually offers.</p><ul><li><strong>days</strong> — opens in <em>days</em>, and the chip also carries hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Beginning account payable is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover days. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Average accounts payables, Purchases and Days in accounting period is what you already know and Beginning account payable and Ending accounts payable is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/receivables-turnover">Receivables turnover Calculator</a>, <a href="/finance/rsi">Relative strength index (RSI) Calculator</a> and <a href="/finance/remote-vs-on-location-workers">Remote vs. on-location workers (non-salary costs) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Days payable outstanding (DPO) calculator work out?', 'a' => <<<'TXT'
            Beginning account payable, Ending accounts payable, Beginning inventory and Ending inventory, from Average accounts payables, Days in accounting period and Purchases. The relationship is Days payable outstanding = Average accounts payables × Days in accounting period ÷ Purchases.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Average accounts payables (USD), Purchases (USD), Days in accounting period (days). Fill average accounts payables, purchases and days in accounting period and leave Beginning account payable empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Days payable outstanding, Days in accounting period, Average accounts payables and Purchases can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Days payable outstanding = 36500 days. Those are the defaults written into the form — move Average accounts payables and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Beginning account payable is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave Average accounts payables blank and the page solves for it, reporting Beginning account payable instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Beginning account payable keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/receivables-turnover', 'name' => 'Receivables turnover Calculator'],
            ['path' => '/finance/rsi', 'name' => 'Relative strength index (RSI) Calculator'],
            ['path' => '/finance/remote-vs-on-location-workers', 'name' => 'Remote vs. on-location workers (non-salary costs) Calculator'],
        ],
        'authors' => [],
    ],
];
