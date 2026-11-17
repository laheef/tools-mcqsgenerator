<?php

/**
 * Margin and sales tax
 * /finance/margin-sales-tax
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Margin and sales tax',
    'meta' => ['title' => 'Margin and sales tax Calculator: Free, With Steps', 'description' => 'Margin and sales tax reports markup, my net price, my gross price and profit. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Margin and sales tax Calculator', 'updated' => '2024-07-01'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cost',
                            'label' => 'Cost',
                            'type' => 'number',
                            'help' => 'The amount it cost you to buy or produce the item or service.',
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
                            'name' => 'markup',
                            'label' => 'Markup',
                            'type' => 'number',
                            'help' => 'The ratio of profit to cost.',
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
                            'name' => 'netRev',
                            'label' => 'My net price',
                            'type' => 'number',
                            'help' => 'Price before tax. It includes the net cost and margin/markup.',
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
                            'name' => 'margin',
                            'label' => 'Margin',
                            'type' => 'number',
                            'help' => 'Profit margin is the ratio of profit to revenue.',
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
                            'name' => 'tax',
                            'label' => 'Sales tax',
                            'type' => 'number',
                            'help' => 'The tax you are required to charge on the net price by your local government if you are the final seller of the merchandise.',
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
                            'name' => 'grossRev',
                            'label' => 'My gross price',
                            'type' => 'number',
                            'help' => 'Price including margin and tax.',
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
                            'name' => 'profit',
                            'label' => 'Profit',
                            'type' => 'number',
                            'help' => 'Money gained from selling the product.',
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
            'title' => 'cost + cost * markup = netRev',
            'results' => ['netRev' => 'cost*(markup + 1)', 'cost' => 'netRev/(markup + 1)', 'markup' => '(-cost + netRev)/cost'],
        ],
        [
            'title' => 'grossRev = netRev + netRev * tax',
            'results' => ['tax' => '(grossRev - netRev)/netRev', 'netRev' => 'grossRev/(tax + 1)', 'grossRev' => 'netRev*(tax + 1)'],
        ],
        [
            'title' => 'profit = netRev - cost',
            'results' => ['netRev' => 'cost + profit', 'cost' => 'netRev - profit', 'profit' => '-cost + netRev'],
        ],
        [
            'title' => 'markup = 1 / (1 - margin) - 1',
            'results' => ['markup' => '-margin/(margin - 1)', 'margin' => 'markup/(markup + 1)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Margin and sales tax turns My net price and Sales tax into Cost and Markup. Nothing is looked up on this page: cost is computed from my net price and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Cost is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Margin and sales tax calculator works', 'html' => <<<'TXT'
            <p>Margin and sales tax answers one question from 2 numbers, and the answer is Cost, Markup and Margin.</p><p>In the form&#039;s own words, My net price = Cost × (Markup + 1).</p><p>The result panel carries Cost, Markup, Margin and My gross price, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>My net price</strong> — in USD. Price before tax. It includes the net cost and margin/markup.</li><li><strong>Sales tax</strong> — in percent. The tax you are required to charge on the net price by your local government if you are the final seller of the merchandise.</li></ul><p>The result boxes are Cost in USD, Markup in percent, Margin in percent, My gross price in USD, Profit in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Cost = 10 USD, My net price = 100 USD, Margin = 1000 perc, Sales tax = 10 perc, My gross price = 100 USD and Profit = 1000 USD gives <strong>Markup</strong> = 9 perc.</p><ul><li><strong>Markup</strong> = 9 perc</li></ul><p>The line behind those figures is <strong>My net price</strong> = <code>Cost × (Markup + 1)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Markup</strong> = 9 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Markup offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>My net price</strong> = <code>Cost × (Markup + 1)</code></li><li><strong>Cost</strong> = <code>My net price ÷ (Markup + 1)</code></li><li><strong>Markup</strong> = <code>( − Cost + My net price) ÷ Cost</code></li><li><strong>My gross price</strong> = <code>My net price × (Sales tax + 1)</code></li><li><strong>Sales tax</strong> = <code>(My gross price − My net price) ÷ My net price</code></li><li><strong>Profit</strong> = <code>− Cost + My net price</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>My net price</strong> = <code>Cost × (Markup + 1)</code> — the form to use when Cost and Markup are the values you have.</li><li><strong>Cost</strong> = <code>My net price ÷ (Markup + 1)</code> — the form to use when My net price and Markup are the values you have.</li><li><strong>Markup</strong> = <code>( − Cost + My net price) ÷ Cost</code> — the form to use when Cost and My net price are the values you have.</li><li><strong>My gross price</strong> = <code>My net price × (Sales tax + 1)</code> — the form to use when My net price and Sales tax are the values you have.</li><li><strong>Sales tax</strong> = <code>(My gross price − My net price) ÷ My net price</code> — the form to use when My gross price and My net price are the values you have.</li><li><strong>My net price</strong> = <code>My gross price ÷ (Sales tax + 1)</code> — the form to use when My gross price and Sales tax are the values you have.</li><li><strong>Profit</strong> = <code>− Cost + My net price</code> — the form to use when Cost and My net price are the values you have.</li><li><strong>My net price</strong> = <code>Cost + Profit</code> — the form to use when Cost and Profit are the values you have.</li></ul><p>Any one of My net price, Cost and Markup can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Cost, from 10 to 20 — and the answers go from <strong>Markup</strong> 9 perc to <strong>Markup</strong> 4 perc.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Sales tax is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Cost, Markup and Margin are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>My net price left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If My net price is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Sales tax left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Sales tax is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in My net price and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>My net price</strong> takes a plain number with no unit attached. Price before tax. It includes the net cost and margin/markup. It feeds Cost, Markup and Sales tax. Have it to hand before you start: My net price is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Sales tax</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The tax you are required to charge on the net price by your local government if you are the final seller of the merchandise. It feeds My net price and My gross price. Have it to hand before you start: Sales tax is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 5 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Cost</strong> is a plain number. It is computed from My net price and Markup, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Markup</strong> is a percent figure and the page's own defaults put it at 9 perc. It is computed from Cost and My net price, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Margin</strong> is a percent figure. It is computed from Markup, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>My gross price</strong> is a plain number. It is computed from My net price and Sales tax, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Profit</strong> is a plain number. It is computed from Cost and My net price, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Markup</th></tr></thead><tbody><tr><td><strong>Cost</strong> +10%</td><td>-10.1%</td></tr><tr><td><strong>My net price</strong> +10%</td><td>+11.11%</td></tr><tr><td><strong>Margin</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Sales tax</strong> +10%</td><td>+0%</td></tr><tr><td><strong>My gross price</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Profit</strong> +10%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, My net price sits at the top — a ten per cent error in that box shows up as roughly 11.1 per cent in the answer. By contrast, Margin, Sales tax and My gross price barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Cost = 5 USD, My net price = 50 USD, Margin = 500 perc, Sales tax = 5 perc, My gross price = 50 USD and Profit = 500 USD, the answer is <strong>Markup</strong> = 9 perc.</li><li>With Cost = 30 USD, My net price = 100 USD, Margin = 1000 perc, Sales tax = 10 perc, My gross price = 100 USD and Profit = 1000 USD, the answer is <strong>Markup</strong> = 2.33 perc.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Cost follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when My net price and Sales tax is what you already know and Cost and Markup is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/margin">Margin Calculator</a>, <a href="/finance/margin-call">Margin call Calculator</a> and <a href="/finance/margin-interest">Margin interest Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Margin and sales tax calculator work out?', 'a' => 'Cost, Markup, Margin and My gross price, from Cost and Markup. The relationship is My net price = Cost × (Markup + 1).'],
            ['q' => 'Which values do I need before I start?', 'a' => 'My net price (USD), Sales tax (percent). Fill my net price and sales tax and leave Cost empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of My net price, Cost, Markup and My gross price blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Markup = 9 perc. That comes from the page\'s own defaults, entered in My net price; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Cost is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With My net price left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Cost keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/margin', 'name' => 'Margin Calculator'],
            ['path' => '/finance/margin-call', 'name' => 'Margin call Calculator'],
            ['path' => '/finance/margin-interest', 'name' => 'Margin interest Calculator'],
        ],
        'authors' => [],
    ],
];
