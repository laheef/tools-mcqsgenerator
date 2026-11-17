<?php

/**
 * Price elasticity of demand
 * /finance/price-elasticity-demand
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Price elasticity of demand',
    'meta' => ['title' => 'Price elasticity of demand — Formula & Results', 'description' => 'Price elasticity of demand reports initial revenue and final revenue. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Price elasticity of demand Calculator', 'updated' => '2026-09-02'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Check out how to use this calculator!&nbsp;'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price0',
                            'label' => 'Initial price',
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
                            'name' => 'quantity0',
                            'label' => 'Initial quantity',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price1',
                            'label' => 'Final price',
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
                            'name' => 'quantity1',
                            'label' => 'Final quantity',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PED',
                            'label' => 'Price elasticity of demand',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => null, 'text' => 'Elasticity:&nbsp;'],
                                ['when' => 'PED == 0 ', 'text' => 'Perfectly inelastic'],
                                ['when' => 'PED > -1 and PED != 0', 'text' => 'Inelastic'],
                                ['when' => 'PED == -1', 'text' => 'Unitary elastic'],
                                ['when' => 'PED == -Infinity', 'text' => 'Perfectly elastic'],
                                ['when' => 'PED < -1 and PED != -Infinity', 'text' => 'Elastic'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Revenue',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'revenue0',
                            'label' => 'Initial revenue',
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
                            'name' => 'revenue1',
                            'label' => 'Final revenue',
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
                            'name' => 'increase',
                            'label' => 'Revenue increase',
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
            'title' => 'PED = ((quantity1 - quantity0) / (quantity1+quantity0)) / ((price1-price0)/(price1+price0))',
            'results' => [
                'price0' => 'price1*(PED*quantity0 + PED*quantity1 + quantity0 - quantity1)/(PED*quantity0 + PED*quantity1 - quantity0 + quantity1)',
                'quantity1' => 'quantity0*(-PED*price0 + PED*price1 + price0 + price1)/(PED*price0 - PED*price1 + price0 + price1)',
                'price1' => 'price0*(PED*quantity0 + PED*quantity1 - quantity0 + quantity1)/(PED*quantity0 + PED*quantity1 + quantity0 - quantity1)',
                'PED' => '(price0*quantity0 - price0*quantity1 + price1*quantity0 - price1*quantity1)/(price0*quantity0 + price0*quantity1 - price1*quantity0 - price1*quantity1)',
                'quantity0' => 'quantity1*(PED*price0 - PED*price1 + price0 + price1)/(-PED*price0 + PED*price1 + price0 + price1)',
            ],
        ],
        [
            'title' => 'revenue1 = price1 * quantity1',
            'results' => ['revenue1' => 'price1*quantity1', 'quantity1' => 'revenue1/price1', 'price1' => 'revenue1/quantity1'],
        ],
        [
            'title' => 'revenue0 = price0*quantity0',
            'results' => ['price0' => 'revenue0/quantity0', 'revenue0' => 'price0*quantity0', 'quantity0' => 'revenue0/price0'],
        ],
        [
            'title' => 'increase = (revenue1 - revenue0)/revenue0',
            'results' => ['revenue1' => 'revenue0*(increase + 1)', 'revenue0' => 'revenue1/(increase + 1)', 'increase' => '(-revenue0 + revenue1)/revenue0'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Price elasticity of demand works out Price elasticity of demand and Initial revenue from Initial price, Initial quantity and Final price. Nothing is looked up on this page: price elasticity of demand is computed from initial price and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Price elasticity of demand calculator works', 'html' => <<<'TXT'
            <p>The Price elasticity of demand calculator applies one relationship to 4 numbers and reports Price elasticity of demand, Initial revenue and Final revenue.</p><p>The answers are Price elasticity of demand, Initial revenue, Final revenue and Revenue increase; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>Initial price</strong> — in USD</li><li><strong>Initial quantity</strong> — a plain number, no unit</li><li><strong>Final price</strong> — in USD</li><li><strong>Final quantity</strong> — a plain number, no unit</li></ul><p>The answers come back as Price elasticity of demand, Initial revenue in USD, Final revenue in USD, Revenue increase in percent. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Initial price = 10 USD, Initial quantity = 100, Final price = 1000 USD and Final quantity = 10; the answers are <strong>Price elasticity of demand</strong> = -0.8347, <strong>Final revenue</strong> = 10000 USD, <strong>Initial revenue</strong> = 1000 USD and <strong>Revenue increase</strong> = 9 perc.</p><ul><li><strong>Price elasticity of demand</strong> = -0.8347</li><li><strong>Final revenue</strong> = 10000 USD</li><li><strong>Initial revenue</strong> = 1000 USD</li><li><strong>Revenue increase</strong> = 9 perc</li></ul>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Price elasticity of demand</strong> = -0.8347, <strong>Final revenue</strong> = 10000, <strong>Initial revenue</strong> = 1000 and <strong>Revenue increase</strong> = 9. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Revenue increase lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Final revenue</strong> = <code>Final price × Final quantity</code></li><li><strong>Final quantity</strong> = <code>Final revenue ÷ Final price</code></li><li><strong>Final price</strong> = <code>Final revenue ÷ Final quantity</code></li><li><strong>Initial revenue</strong> = <code>Initial price × Initial quantity</code></li><li><strong>Initial price</strong> = <code>Initial revenue ÷ Initial quantity</code></li><li><strong>Initial quantity</strong> = <code>Initial revenue ÷ Initial price</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Final revenue</strong> = <code>Final price × Final quantity</code> — the form to use when Final price and Final quantity are the values you have.</li><li><strong>Final quantity</strong> = <code>Final revenue ÷ Final price</code> — the form to use when Final revenue and Final price are the values you have.</li><li><strong>Final price</strong> = <code>Final revenue ÷ Final quantity</code> — the form to use when Final revenue and Final quantity are the values you have.</li><li><strong>Initial revenue</strong> = <code>Initial price × Initial quantity</code> — the form to use when Initial price and Initial quantity are the values you have.</li><li><strong>Initial price</strong> = <code>Initial revenue ÷ Initial quantity</code> — the form to use when Initial revenue and Initial quantity are the values you have.</li><li><strong>Initial quantity</strong> = <code>Initial revenue ÷ Initial price</code> — the form to use when Initial revenue and Initial price are the values you have.</li><li><strong>Revenue increase</strong> = <code>( − Initial revenue + Final revenue) ÷ Initial revenue</code> — the form to use when Initial revenue and Final revenue are the values you have.</li><li><strong>Final revenue</strong> = <code>Initial revenue × (Revenue increase + 1)</code> — the form to use when Initial revenue and Revenue increase are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Price elasticity of demand, Initial price and Final quantity can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Initial price, from 10 to 20 — and the answers go from <strong>Price elasticity of demand</strong> -0.8347, <strong>Final revenue</strong> 10000 USD, <strong>Initial revenue</strong> 1000 USD and <strong>Revenue increase</strong> 9 perc to <strong>Price elasticity of demand</strong> -0.8516, <strong>Final revenue</strong> 10000 USD, <strong>Initial revenue</strong> 2000 USD and <strong>Revenue increase</strong> 4 perc.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Price elasticity of demand, Initial revenue and Final revenue are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Initial price left as a guess.</strong> Anything typed into Initial price is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Initial quantity left as a guess.</strong> Anything typed into Initial quantity is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Final price left as a guess.</strong> Anything typed into Final price is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Initial price to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Initial price</strong> takes a plain number with no unit attached. Change it and Final quantity, Final price and Price elasticity of demand changes with it. Have it to hand before you start: Initial price is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Initial quantity</strong> takes a plain number with no unit attached. Change it and Initial price, Final quantity and Final price changes with it. Have it to hand before you start: Initial quantity is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Final price</strong> takes a plain number with no unit attached. Change it and Initial price, Final quantity and Price elasticity of demand changes with it. Have it to hand before you start: Final price is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Final quantity</strong> takes a plain number with no unit attached. Change it and Initial price, Final price and Price elasticity of demand changes with it. Have it to hand before you start: Final quantity is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Price elasticity of demand</strong> is a plain number and the page's own defaults put it at -0.8347. The value follows from Initial price, Initial quantity, Final quantity and Final price. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Initial revenue</strong> is a plain number and the page's own defaults put it at 1000. The value follows from Initial price and Initial quantity. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Final revenue</strong> is a plain number and the page's own defaults put it at 10000. The value follows from Final price and Final quantity. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Revenue increase</strong> is a percent figure and the page's own defaults put it at 9 perc. The value follows from Initial revenue and Final revenue. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Price elasticity of demand</th><th>Final revenue</th><th>Initial revenue</th><th>Revenue increase</th></tr></thead><tbody><tr><td><strong>Initial price</strong> +10%</td><td>-0.2%</td><td>+0%</td><td>+10%</td><td>-10.1%</td></tr><tr><td><strong>Initial quantity</strong> +10%</td><td>-1.85%</td><td>+0%</td><td>+10%</td><td>-10.1%</td></tr><tr><td><strong>Final price</strong> +10%</td><td>+0.18%</td><td>+10%</td><td>+0%</td><td>+11.11%</td></tr><tr><td><strong>Final quantity</strong> +10%</td><td>+2%</td><td>+10%</td><td>+0%</td><td>+11.11%</td></tr></tbody></table><p>The steepest column belongs to Final price: ten per cent there moves an answer by about 11.1 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Initial price = 5 USD, Initial quantity = 50, Final price = 500 USD and Final quantity = 5, the answer is <strong>Price elasticity of demand</strong> = -0.8347, <strong>Final revenue</strong> = 2500 USD, <strong>Initial revenue</strong> = 250 USD and <strong>Revenue increase</strong> = 9 perc.</li><li>With Initial price = 30 USD, Initial quantity = 100, Final price = 1000 USD and Final quantity = 10, the answer is <strong>Price elasticity of demand</strong> = -0.8688, <strong>Final revenue</strong> = 10000 USD, <strong>Initial revenue</strong> = 3000 USD and <strong>Revenue increase</strong> = 2.33 perc.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Price elasticity of demand is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Initial price, Initial quantity and Final price is what you already know and Price elasticity of demand and Initial revenue is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/fisher-effect">Fisher effect Calculator</a>, <a href="/finance/fisher-equation">Fisher equation Calculator</a> and <a href="/finance/fixed-asset-turnover">Fixed asset turnover</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Price elasticity of demand calculator work out?', 'a' => 'Price elasticity of demand, Initial revenue, Final revenue and Revenue increase, from Initial price, Initial quantity, Final quantity and Final price.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Initial price (USD), Initial quantity, Final price (USD), Final quantity. Enter initial price, initial quantity and final price; Price elasticity of demand is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Price elasticity of demand, Initial price, Final quantity and Final price can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Price elasticity of demand = -0.8347, Final revenue = 10000 USD, Initial revenue = 1000 USD and Revenue increase = 9 perc. That comes from the page's own defaults, entered in Initial price; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Price elasticity of demand is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Initial price left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Price elasticity of demand keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/fisher-effect', 'name' => 'Fisher effect Calculator'],
            ['path' => '/finance/fisher-equation', 'name' => 'Fisher equation Calculator'],
            ['path' => '/finance/fixed-asset-turnover', 'name' => 'Fixed asset turnover'],
        ],
        'authors' => [],
    ],
];
