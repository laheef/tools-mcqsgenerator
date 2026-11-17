<?php

/**
 * Ending inventory
 * /finance/ending-inventory
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Ending inventory',
    'meta' => ['title' => 'Ending inventory — Formula, Steps & Examples', 'description' => 'Ending inventory works out inventory turnover from is the value of COGS known?. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Ending inventory Calculator', 'updated' => '2024-04-16'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'place' => [0, 0],
                    'fields' => [
                        [
                            'name' => 'cogs_known',
                            'label' => 'Is the value of COGS known?',
                            'type' => 'select',
                            'options' => ['No' => '0', 'Yes' => '1'],
                            'dataset' => 'yn',
                            'control' => 'DROPDOWN',
                            'help' => 'COGS - Cost of goods sold.',
                            'default' => 'Yes',
                        ],
                        ['type' => 'note', 'text' => 'Please check out our other calculators to find your value of COGS: LIFO; and FIFO.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'beginning_Inventory',
                            'label' => 'Starting inventory',
                            'type' => 'number',
                            'help' => 'The monetary value of the inventory at the beginning of the accounting period.',
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
                            'name' => 'net_Purchases',
                            'label' => 'Net purchases',
                            'type' => 'number',
                            'help' => 'The value of new items in the inventory that were purchased during the accounting period.',
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
                            'help' => 'The direct production costs of the goods you create and sell out of the materials from the inventory.',
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
                            'name' => 'ending_Inventory',
                            'label' => 'Ending inventory',
                            'type' => 'number',
                            'help' => 'The monetary value of the inventory at the ending of the accounting period.',
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
                            'name' => 'inventory_Turnover',
                            'label' => 'Inventory turnover',
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
            'title' => 'ending_Inventory  = beginning_Inventory +  net_Purchases - cost_of_goods_sold',
            'results' => ['cost_of_goods_sold' => 'beginning_Inventory - ending_Inventory + net_Purchases', 'net_Purchases' => '-beginning_Inventory + cost_of_goods_sold + ending_Inventory', 'beginning_Inventory' => 'cost_of_goods_sold + ending_Inventory - net_Purchases', 'ending_Inventory' => 'beginning_Inventory - cost_of_goods_sold + net_Purchases'],
        ],
        [
            'title' => 'inventory_Turnover = cost_of_goods_sold / ((beginning_Inventory + ending_Inventory) / 2)',
            'results' => ['inventory_Turnover' => '2*cost_of_goods_sold/(beginning_Inventory + ending_Inventory)', 'beginning_Inventory' => '2*cost_of_goods_sold/inventory_Turnover - ending_Inventory', 'cost_of_goods_sold' => '(1/2)*inventory_Turnover*(beginning_Inventory + ending_Inventory)', 'ending_Inventory' => '-beginning_Inventory + 2*cost_of_goods_sold/inventory_Turnover'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Ending inventory turns Starting inventory, Net purchases and Cost of goods sold into Ending inventory and Inventory turnover. There is no hidden constant here: change ending inventory and starting inventory moves with it. The main result, Ending inventory, is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the Ending inventory calculator works', 'html' => <<<'TXT'
            <p>The Ending inventory calculator applies one relationship to 3 numbers and reports Ending inventory and Inventory turnover.</p><p>In the form&#039;s own words, Ending inventory = Starting inventory − Cost of goods sold + Net purchases.</p><p>The answers are Ending inventory and Inventory turnover; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Starting inventory</strong> — in USD. The monetary value of the inventory at the beginning of the accounting period.</li><li><strong>Net purchases</strong> — in USD. The value of new items in the inventory that were purchased during the accounting period.</li><li><strong>Cost of goods sold</strong> — in USD. The direct production costs of the goods you create and sell out of the materials from the inventory.</li></ul><p>What you get back is Ending inventory in USD, Inventory turnover, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: Ending inventory takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Ending inventory</strong> = <code>Starting inventory − Cost of goods sold + Net purchases</code></li><li><strong>Cost of goods sold</strong> = <code>Starting inventory − Ending inventory + Net purchases</code></li><li><strong>Net purchases</strong> = <code>− Starting inventory + Cost of goods sold + Ending inventory</code></li><li><strong>Starting inventory</strong> = <code>Cost of goods sold + Ending inventory − Net purchases</code></li><li><strong>Inventory turnover</strong> = <code>2 × Cost of goods sold ÷ (Starting inventory + Ending inventory)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Ending inventory</strong> = <code>Starting inventory − Cost of goods sold + Net purchases</code> — the form to use when Starting inventory, Cost of goods sold and Net purchases are the values you have.</li><li><strong>Cost of goods sold</strong> = <code>Starting inventory − Ending inventory + Net purchases</code> — the form to use when Starting inventory, Ending inventory and Net purchases are the values you have.</li><li><strong>Net purchases</strong> = <code>− Starting inventory + Cost of goods sold + Ending inventory</code> — the form to use when Starting inventory, Cost of goods sold and Ending inventory are the values you have.</li><li><strong>Starting inventory</strong> = <code>Cost of goods sold + Ending inventory − Net purchases</code> — the form to use when Cost of goods sold, Ending inventory and Net purchases are the values you have.</li><li><strong>Inventory turnover</strong> = <code>2 × Cost of goods sold ÷ (Starting inventory + Ending inventory)</code> — the form to use when Cost of goods sold, Starting inventory and Ending inventory are the values you have.</li><li><strong>Starting inventory</strong> = <code>2 × Cost of goods sold ÷ Inventory turnover − Ending inventory</code> — the form to use when Cost of goods sold, Inventory turnover and Ending inventory are the values you have.</li><li><strong>Cost of goods sold</strong> = <code>(1 ÷ 2) × Inventory turnover × (Starting inventory + Ending inventory)</code> — the form to use when Inventory turnover, Starting inventory and Ending inventory are the values you have.</li><li><strong>Ending inventory</strong> = <code>− Starting inventory + 2 × Cost of goods sold ÷ Inventory turnover</code> — the form to use when Starting inventory, Cost of goods sold and Inventory turnover are the values you have.</li></ul><p>Any one of Ending inventory, Cost of goods sold and Net purchases can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Ending inventory and Inventory turnover are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Starting inventory left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Starting inventory is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Net purchases left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Net purchases is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Cost of goods sold left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Cost of goods sold is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Starting inventory and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Ending inventory form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Starting inventory</strong> takes a plain number with no unit attached. The monetary value of the inventory at the beginning of the accounting period. It feeds Cost of goods sold, Net purchases and Ending inventory. Fill it from a measurement rather than a memory — Starting inventory is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Net purchases</strong> takes a plain number with no unit attached. The value of new items in the inventory that were purchased during the accounting period. It feeds Cost of goods sold, Starting inventory and Ending inventory. Fill it from a measurement rather than a memory — Net purchases is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Cost of goods sold</strong> takes a plain number with no unit attached. The direct production costs of the goods you create and sell out of the materials from the inventory. It feeds Net purchases, Starting inventory and Ending inventory. Fill it from a measurement rather than a memory — Cost of goods sold is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Ending inventory</strong> is a plain number. It is worked out from Starting inventory, Cost of goods sold and Net purchases. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Inventory turnover</strong> is a plain number. It is worked out from Cost of goods sold, Starting inventory and Ending inventory. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Starting inventory, Net purchases and Cost of goods sold ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Starting inventory — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Ending inventory in USD against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Ending inventory follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Starting inventory, Net purchases and Cost of goods sold are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Starting inventory, Net purchases and Cost of goods sold is what you already know and Ending inventory and Inventory turnover is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/credit-spread">Credit spread Calculator</a>, <a href="/finance/credit-utilization">Credit utilization Calculator</a> and <a href="/finance/cross-exchange-rate">Cross exchange rate Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Ending inventory is a number to act on, so the useful question is what to do with Ending inventory (USD) and Inventory turnover once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Starting inventory, Net purchases and Cost of goods sold alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Ending inventory calculator work out?', 'a' => <<<'TXT'
            Ending inventory and Inventory turnover, from Starting inventory, Cost of goods sold and Net purchases. The relationship is Ending inventory = Starting inventory − Cost of goods sold + Net purchases.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Starting inventory (USD), Net purchases (USD), Cost of goods sold (USD). With starting inventory, net purchases and cost of goods sold in place, Ending inventory can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Ending inventory, Cost of goods sold, Net purchases and Starting inventory blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Ending inventory is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Starting inventory blank and the page solves for it, reporting Ending inventory instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Ending inventory keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/credit-spread', 'name' => 'Credit spread Calculator'],
            ['path' => '/finance/credit-utilization', 'name' => 'Credit utilization Calculator'],
            ['path' => '/finance/cross-exchange-rate', 'name' => 'Cross exchange rate Calculator'],
        ],
        'authors' => [],
    ],
];
