<?php

/**
 * Holding period return
 * /finance/holding-period-return
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Holding period return',
    'meta' => ['title' => 'Holding period return: Formula, Steps & Results', 'description' => 'Holding period return turns bought price, current price and dividend income per share into capital gains yield and dividend yield. The answer is shown in perc.', 'h1' => 'Holding period return Calculator', 'updated' => '2026-09-27'],
    'sections' => [
        [
            'title' => 'Capital gains yield',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'bought_price',
                            'label' => 'Bought price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'current_price',
                            'label' => 'Current price',
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
                            'name' => 'cap_gain',
                            'label' => 'Capital gains yield',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Dividend yield',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'div_income',
                            'label' => 'Dividend income per share',
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
                            'name' => 'div_yield',
                            'label' => 'Dividend yield',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
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
                            'name' => 'hpr',
                            'label' => 'Holding period return',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'cap_gain = (current_price - bought_price) / bought_price',
            'results' => ['cap_gain' => '(-bought_price + current_price)/bought_price', 'bought_price' => 'current_price/(cap_gain + 1)', 'current_price' => 'bought_price*(cap_gain + 1)'],
        ],
        [
            'title' => 'div_yield = div_income / bought_price',
            'results' => ['div_yield' => 'div_income/bought_price', 'bought_price' => 'div_income/div_yield', 'div_income' => 'bought_price*div_yield'],
        ],
        [
            'title' => 'hpr = cap_gain + div_yield',
            'results' => ['hpr' => 'cap_gain + div_yield', 'div_yield' => '-cap_gain + hpr', 'cap_gain' => '-div_yield + hpr'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Bought price and Current price into Holding period return and the answer comes back as Capital gains yield and Dividend income per share. There is no hidden constant here: change capital gains yield and bought price moves with it. The main result, Capital gains yield, is reported in percent.
        TXT,
        'sections' => [
            ['title' => 'How the Holding period return calculator works', 'html' => <<<'TXT'
            <p>The Holding period return calculator applies one relationship to 2 numbers and reports Capital gains yield, Dividend income per share and Dividend yield.</p><p>Written with the labels from the form, Capital gains yield = ( − Bought price + Current price) ÷ Bought price.</p><p>What comes back is Capital gains yield, Dividend income per share, Dividend yield and Holding period return — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Bought price</strong> — in USD</li><li><strong>Current price</strong> — in USD</li></ul><p>What you get back is Capital gains yield in percent, Dividend income per share in USD, Dividend yield in percent, Holding period return in percent, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Bought price = 10 USD, Current price = 100 USD, Dividend income per share = 1000 USD, Dividend yield = 10 perc and Holding period return = 100 perc gives <strong>Capital gains yield</strong> = 9 perc.</p><ul><li><strong>Capital gains yield</strong> = 9 perc</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Capital gains yield</strong> = <code>( − Bought price + Current price) ÷ Bought price</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Capital gains yield</strong> = 9. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Capital gains yield lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Capital gains yield</strong> = <code>( − Bought price + Current price) ÷ Bought price</code></li><li><strong>Bought price</strong> = <code>Current price ÷ (Capital gains yield + 1)</code></li><li><strong>Current price</strong> = <code>Bought price × (Capital gains yield + 1)</code></li><li><strong>Dividend yield</strong> = <code>Dividend income per share ÷ Bought price</code></li><li><strong>Dividend income per share</strong> = <code>Bought price × Dividend yield</code></li><li><strong>Holding period return</strong> = <code>Capital gains yield + Dividend yield</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Capital gains yield</strong> = <code>( − Bought price + Current price) ÷ Bought price</code> — the form to use when Bought price and Current price are the values you have.</li><li><strong>Bought price</strong> = <code>Current price ÷ (Capital gains yield + 1)</code> — the form to use when Current price and Capital gains yield are the values you have.</li><li><strong>Current price</strong> = <code>Bought price × (Capital gains yield + 1)</code> — the form to use when Bought price and Capital gains yield are the values you have.</li><li><strong>Dividend yield</strong> = <code>Dividend income per share ÷ Bought price</code> — the form to use when Dividend income per share and Bought price are the values you have.</li><li><strong>Bought price</strong> = <code>Dividend income per share ÷ Dividend yield</code> — the form to use when Dividend income per share and Dividend yield are the values you have.</li><li><strong>Dividend income per share</strong> = <code>Bought price × Dividend yield</code> — the form to use when Bought price and Dividend yield are the values you have.</li><li><strong>Holding period return</strong> = <code>Capital gains yield + Dividend yield</code> — the form to use when Capital gains yield and Dividend yield are the values you have.</li><li><strong>Dividend yield</strong> = <code>− Capital gains yield + Holding period return</code> — the form to use when Capital gains yield and Holding period return are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Capital gains yield, Bought price and Current price can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Bought price from 10 to 20, leaving every other box alone. The panel moves from <strong>Capital gains yield</strong> 9 perc to <strong>Capital gains yield</strong> 4 perc.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Capital gains yield, Dividend income per share and Dividend yield are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Bought price left as a guess.</strong> Anything typed into Bought price is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Current price left as a guess.</strong> Anything typed into Current price is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Bought price to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Bought price</strong> takes a plain number with no unit attached. The page reads it when it works out Capital gains yield, Current price and Dividend yield. Have it to hand before you start: Bought price is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Current price</strong> takes a plain number with no unit attached. The page reads it when it works out Capital gains yield and Bought price. Have it to hand before you start: Current price is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Capital gains yield</strong> is a percent figure and the page's own defaults put it at 9 perc. The value follows from Bought price and Current price. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Dividend income per share</strong> is a plain number. The value follows from Bought price and Dividend yield. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Dividend yield</strong> is a percent figure. The value follows from Dividend income per share and Bought price. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Holding period return</strong> is a percent figure. The value follows from Capital gains yield and Dividend yield. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Capital gains yield</th></tr></thead><tbody><tr><td><strong>Bought price</strong> +10%</td><td>-10.1%</td></tr><tr><td><strong>Current price</strong> +10%</td><td>+11.11%</td></tr><tr><td><strong>Dividend income per share</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Dividend yield</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Holding period return</strong> +10%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Current price: ten per cent there moves an answer by about 11.1 per cent, which is why that is the number to measure twice. By contrast, Dividend income per share, Dividend yield and Holding period return barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Bought price = 5 USD, Current price = 50 USD, Dividend income per share = 500 USD, Dividend yield = 5 perc and Holding period return = 50 perc, the answer is <strong>Capital gains yield</strong> = 9 perc.</li><li>With Bought price = 30 USD, Current price = 100 USD, Dividend income per share = 1000 USD, Dividend yield = 10 perc and Holding period return = 100 perc, the answer is <strong>Capital gains yield</strong> = 2.33 perc.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Capital gains yield is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Bought price and Current price are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Bought price and Current price measured, Capital gains yield and Dividend income per share wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/cpa">CPA (cost per acquisition) Calculator</a>, <a href="/finance/cpc-cpm">CPC and CPM Calculator</a> and <a href="/finance/cpi-inflation">CPI inflation</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Holding period return calculator work out?', 'a' => <<<'TXT'
            Capital gains yield, Dividend income per share, Dividend yield and Holding period return, from Bought price and Current price. The relationship is Capital gains yield = ( − Bought price + Current price) ÷ Bought price.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Bought price (USD), Current price (USD). Fill bought price and current price and leave Capital gains yield empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Capital gains yield, Bought price, Current price and Dividend yield can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Capital gains yield = 9 perc. The figures come from Bought price as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Capital gains yield is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Bought price left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Capital gains yield keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/cpa', 'name' => 'CPA (cost per acquisition) Calculator'],
            ['path' => '/finance/cpc-cpm', 'name' => 'CPC and CPM Calculator'],
            ['path' => '/finance/cpi-inflation', 'name' => 'CPI inflation'],
        ],
        'authors' => [],
    ],
];
