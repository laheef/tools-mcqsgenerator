<?php

/**
 * Days inventory outstanding (DIO)
 * /finance/days-inventory-outstanding
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Days inventory outstanding (DIO)',
    'meta' => ['title' => 'Days inventory outstanding (DIO) Calculator', 'description' => 'Days inventory outstanding (DIO) turns starting inventory and ending inventory into average inventory. The formula is printed in the form\'s own words.', 'h1' => 'Days inventory outstanding (DIO) Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => 'Average inventory',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'beg_inv',
                            'label' => 'Starting inventory',
                            'type' => 'number',
                            'help' => 'Inventory at the beginning of the accounting period.',
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
                            'name' => 'end_inv',
                            'label' => 'Ending inventory',
                            'type' => 'number',
                            'help' => 'Inventory at the end of the accounting period.',
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
                            'name' => 'avg_inv',
                            'label' => 'Average inventory',
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
            'title' => 'Days inventory outstanding (DIO)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cogs',
                            'label' => 'Cost of goods sold (COGS)',
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
                            'name' => 'days',
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
                            'name' => 'dio',
                            'label' => 'DIO',
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
            'title' => 'avg_inv = (beg_inv + end_inv) / 2',
            'results' => ['end_inv' => '2*avg_inv - beg_inv', 'avg_inv' => '(1/2)*beg_inv + (1/2)*end_inv', 'beg_inv' => '2*avg_inv - end_inv'],
        ],
        [
            'title' => 'dio = (avg_inv / cogs) * days',
            'results' => ['avg_inv' => 'cogs*dio/days', 'days' => 'cogs*dio/avg_inv', 'dio' => 'avg_inv*days/cogs', 'cogs' => 'avg_inv*days/dio'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Days inventory outstanding (DIO) works out Average inventory and Cost of goods sold (COGS) from Starting inventory and Ending inventory. There is no hidden constant here: change average inventory and starting inventory moves with it. The main result, Average inventory, is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the Days inventory outstanding (DIO) calculator works', 'html' => <<<'TXT'
            <p>The Days inventory outstanding (DIO) calculator applies one relationship to 2 numbers and reports Average inventory, Cost of goods sold (COGS) and Days in accounting period.</p><p>In the form&#039;s own words, Average inventory = (1 ÷ 2) × Starting inventory + (1 ÷ 2) × Ending inventory.</p><p>The result panel carries Average inventory, Cost of goods sold (COGS), Days in accounting period and DIO, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Starting inventory</strong> — in USD. Inventory at the beginning of the accounting period.</li><li><strong>Ending inventory</strong> — in USD. Inventory at the end of the accounting period.</li></ul><p>The answers come back as Average inventory in USD, Cost of goods sold (COGS) in USD, Days in accounting period in days, DIO in days. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Starting inventory = 10 USD, Ending inventory = 100 USD, Cost of goods sold (COGS) = 1000 USD, Days in accounting period = 365 days and DIO = 100 days gives <strong>Average inventory</strong> = 55 USD.</p><ul><li><strong>Average inventory</strong> = 55 USD</li></ul><p>That is <strong>Average inventory</strong> = <code>(1 ÷ 2) × Starting inventory + (1 ÷ 2) × Ending inventory</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Average inventory</strong> = 55. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Days in accounting period lists 6 options and opens on days. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Average inventory</strong> = <code>(1 ÷ 2) × Starting inventory + (1 ÷ 2) × Ending inventory</code></li><li><strong>Ending inventory</strong> = <code>2 × Average inventory − Starting inventory</code></li><li><strong>Starting inventory</strong> = <code>2 × Average inventory − Ending inventory</code></li><li><strong>DIO</strong> = <code>Average inventory × Days in accounting period ÷ Cost of goods sold (COGS)</code></li><li><strong>Days in accounting period</strong> = <code>Cost of goods sold (COGS) × DIO ÷ Average inventory</code></li><li><strong>Cost of goods sold (COGS)</strong> = <code>Average inventory × Days in accounting period ÷ DIO</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Average inventory</strong> = <code>(1 ÷ 2) × Starting inventory + (1 ÷ 2) × Ending inventory</code> — the form to use when Starting inventory and Ending inventory are the values you have.</li><li><strong>Ending inventory</strong> = <code>2 × Average inventory − Starting inventory</code> — the form to use when Average inventory and Starting inventory are the values you have.</li><li><strong>Starting inventory</strong> = <code>2 × Average inventory − Ending inventory</code> — the form to use when Average inventory and Ending inventory are the values you have.</li><li><strong>DIO</strong> = <code>Average inventory × Days in accounting period ÷ Cost of goods sold (COGS)</code> — the form to use when Average inventory, Days in accounting period and Cost of goods sold (COGS) are the values you have.</li><li><strong>Average inventory</strong> = <code>Cost of goods sold (COGS) × DIO ÷ Days in accounting period</code> — the form to use when Cost of goods sold (COGS), DIO and Days in accounting period are the values you have.</li><li><strong>Days in accounting period</strong> = <code>Cost of goods sold (COGS) × DIO ÷ Average inventory</code> — the form to use when Cost of goods sold (COGS), DIO and Average inventory are the values you have.</li><li><strong>Cost of goods sold (COGS)</strong> = <code>Average inventory × Days in accounting period ÷ DIO</code> — the form to use when Average inventory, Days in accounting period and DIO are the values you have.</li></ul><p>Any one of Average inventory, Ending inventory and Starting inventory can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Starting inventory from 10 to 20, leaving every other box alone. The panel moves from <strong>Average inventory</strong> 55 USD to <strong>Average inventory</strong> 60 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Average inventory, Cost of goods sold (COGS) and Days in accounting period are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Starting inventory left as a guess.</strong> Anything typed into Starting inventory is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Ending inventory left as a guess.</strong> Anything typed into Ending inventory is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Starting inventory to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Starting inventory</strong> takes a plain number with no unit attached. Inventory at the beginning of the accounting period. It feeds Ending inventory and Average inventory. Have it to hand before you start: Starting inventory is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Ending inventory</strong> takes a plain number with no unit attached. Inventory at the end of the accounting period. It feeds Average inventory and Starting inventory. Have it to hand before you start: Ending inventory is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Average inventory</strong> is a plain number and the page's own defaults put it at 55. It is computed from Starting inventory and Ending inventory, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Cost of goods sold (COGS)</strong> is a plain number. It is computed from Average inventory, Days in accounting period and DIO, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Days in accounting period</strong> is a days figure. It is computed from Cost of goods sold (COGS), DIO and Average inventory, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>DIO</strong> is a days figure. It is computed from Average inventory, Days in accounting period and Cost of goods sold (COGS), so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Average inventory</th></tr></thead><tbody><tr><td><strong>Starting inventory</strong> +10%</td><td>+0.91%</td></tr><tr><td><strong>Ending inventory</strong> +10%</td><td>+9.09%</td></tr><tr><td><strong>Cost of goods sold (COGS)</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Days in accounting period</strong> +10%</td><td>+0%</td></tr><tr><td><strong>DIO</strong> +10%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Ending inventory: ten per cent there moves an answer by about 9.1 per cent, which is why that is the number to measure twice. By contrast, Cost of goods sold (COGS), Days in accounting period and DIO barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Starting inventory = 5 USD, Ending inventory = 50 USD, Cost of goods sold (COGS) = 500 USD, Days in accounting period = 183 days and DIO = 50 days, the answer is <strong>Average inventory</strong> = 27.5 USD.</li><li>With Starting inventory = 30 USD, Ending inventory = 100 USD, Cost of goods sold (COGS) = 1000 USD, Days in accounting period = 365 days and DIO = 100 days, the answer is <strong>Average inventory</strong> = 65 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>days</strong> — opens in <em>days</em>, and the chip also carries hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Average inventory is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover days. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Starting inventory and Ending inventory measured, Average inventory and Cost of goods sold (COGS) wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/cpa">CPA (cost per acquisition) Calculator</a>, <a href="/finance/cpc-cpm">CPC and CPM Calculator</a> and <a href="/finance/cpi-inflation">CPI inflation</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Days inventory outstanding (DIO) calculator work out?', 'a' => <<<'TXT'
            Average inventory, Cost of goods sold (COGS), Days in accounting period and DIO, from Starting inventory and Ending inventory. The relationship is Average inventory = (1 ÷ 2) × Starting inventory + (1 ÷ 2) × Ending inventory.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Starting inventory (USD), Ending inventory (USD). Fill starting inventory and ending inventory and leave Average inventory empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Average inventory, Ending inventory, Starting inventory and DIO blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Average inventory = 55 USD. Those are the defaults written into the form — move Starting inventory and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Average inventory is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Starting inventory left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Average inventory keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/cpa', 'name' => 'CPA (cost per acquisition) Calculator'],
            ['path' => '/finance/cpc-cpm', 'name' => 'CPC and CPM Calculator'],
            ['path' => '/finance/cpi-inflation', 'name' => 'CPI inflation'],
        ],
        'authors' => [],
    ],
];
