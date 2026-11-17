<?php

/**
 * Price per share
 * /finance/price-per-share
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Price per share',
    'meta' => ['title' => 'Price per share — Formula, Steps & Examples', 'description' => 'Price per share takes number of shares outstanding and market capitalization and returns you save. Every box can be solved for, not only the one in the title.', 'h1' => 'Price per share Calculator', 'updated' => '2024-03-14'],
    'sections' => [
        [
            'title' => 'Company A',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'num_share_outstanding_A',
                            'label' => 'Number of shares outstanding',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'market_cap_A',
                            'label' => 'Market capitalization',
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
                            'name' => 'price_per_share_A',
                            'label' => 'Price per share',
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
            'title' => 'Company B',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'num_share_outstanding_B',
                            'label' => 'Number of shares outstanding',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'market_cap_B',
                            'label' => 'Market capitalization',
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
                            'name' => 'price_per_share_B',
                            'label' => 'Price per share',
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
            'title' => 'Which one is cheaper?',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'price_per_share_B < price_per_share_A', 'text' => 'Company B is cheaper!'],
                                ['when' => 'price_per_share_B > price_per_share_A', 'text' => 'Company A is cheaper!'],
                                ['when' => 'price_per_share_B == price_per_share_A', 'text' => 'Company A and B are the same price per share!'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'item_savings',
                            'label' => 'You save',
                            'type' => 'number',
                            'suffix' => '/share',
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
            'title' => 'price_per_share_A = market_cap_A / num_share_outstanding_A',
            'results' => ['market_cap_A' => 'num_share_outstanding_A*price_per_share_A', 'num_share_outstanding_A' => 'market_cap_A/price_per_share_A', 'price_per_share_A' => 'market_cap_A/num_share_outstanding_A'],
        ],
        [
            'title' => 'price_per_share_B = market_cap_B / num_share_outstanding_B',
            'results' => ['price_per_share_B' => 'market_cap_B/num_share_outstanding_B', 'market_cap_B' => 'num_share_outstanding_B*price_per_share_B', 'num_share_outstanding_B' => 'market_cap_B/price_per_share_B'],
        ],
        [
            'title' => 'item_savings = abs(price_per_share_B - price_per_share_A)',
            'results' => ['item_savings' => 'abs(price_per_share_A - price_per_share_B)'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Price per share works in both directions, between price per share and number of shares outstanding. Units for Price per share default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Price per share calculator works', 'html' => <<<'TXT'
            <p>Price per share answers one question from 2 numbers, and the answer is Price per share, Number of shares outstanding and Market capitalization.</p><p>The relationship it solves reads Price per share = Market capitalization ÷ Number of shares outstanding.</p><p>What comes back is Price per share, Number of shares outstanding, Market capitalization and Price per share — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Number of shares outstanding</strong> — a plain number, no unit</li><li><strong>Market capitalization</strong> — in USD</li></ul><p>The result boxes are Price per share in USD, Number of shares outstanding, Market capitalization in USD, Price per share in USD, You save in /share; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Number of shares outstanding = 10, Market capitalization = 100 USD, Number of shares outstanding = 1000, Market capitalization = 10 USD, Price per share = 100 USD and You save = 1000 /share gives <strong>Price per share</strong> = 10 USD.</p><ul><li><strong>Price per share</strong> = 10 USD</li></ul><p>That is <strong>Price per share</strong> = <code>Market capitalization ÷ Number of shares outstanding</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Price per share</strong> = 10 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Price per share takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Price per share</strong> = <code>Market capitalization ÷ Number of shares outstanding</code></li><li><strong>Market capitalization</strong> = <code>Number of shares outstanding × Price per share</code></li><li><strong>Number of shares outstanding</strong> = <code>Market capitalization ÷ Price per share</code></li><li><strong>You save</strong> = <code>abs(Price per share − Price per share)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Price per share</strong> = <code>Market capitalization ÷ Number of shares outstanding</code> — the form to use when Market capitalization and Number of shares outstanding are the values you have.</li><li><strong>Market capitalization</strong> = <code>Number of shares outstanding × Price per share</code> — the form to use when Number of shares outstanding and Price per share are the values you have.</li><li><strong>Number of shares outstanding</strong> = <code>Market capitalization ÷ Price per share</code> — the form to use when Market capitalization and Price per share are the values you have.</li><li><strong>Price per share</strong> = <code>Market capitalization ÷ Number of shares outstanding</code> — the form to use when Market capitalization and Number of shares outstanding are the values you have.</li><li><strong>Market capitalization</strong> = <code>Number of shares outstanding × Price per share</code> — the form to use when Number of shares outstanding and Price per share are the values you have.</li><li><strong>Number of shares outstanding</strong> = <code>Market capitalization ÷ Price per share</code> — the form to use when Market capitalization and Price per share are the values you have.</li><li><strong>You save</strong> = <code>abs(Price per share − Price per share)</code> — the form to use when Price per share and Price per share are the values you have.</li></ul><p>Any one of Price per share, Market capitalization and Number of shares outstanding can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Number of shares outstanding from 10 to 20, leaving every other box alone. The panel moves from <strong>Price per share</strong> 10 USD to <strong>Price per share</strong> 5 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Price per share, Number of shares outstanding and Market capitalization are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Number of shares outstanding left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Number of shares outstanding is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Market capitalization left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Market capitalization is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Number of shares outstanding to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Number of shares outstanding</strong> takes a plain number with no unit attached. The page reads it when it works out Market capitalization and Price per share. Have it to hand before you start: Number of shares outstanding is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Market capitalization</strong> takes a plain number with no unit attached. The page reads it when it works out Number of shares outstanding and Price per share. Have it to hand before you start: Market capitalization is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 5 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Price per share</strong> is a plain number and the page's own defaults put it at 10. It is computed from Market capitalization and Number of shares outstanding, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Number of shares outstanding</strong> is a plain number. It is computed from Market capitalization and Price per share, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Market capitalization</strong> is a plain number. It is computed from Number of shares outstanding and Price per share, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Price per share</strong> is a plain number. It is computed from Market capitalization and Number of shares outstanding, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>You save</strong> is a plain number. It is computed from Price per share and Price per share, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Price per share</th></tr></thead><tbody><tr><td><strong>Number of shares outstanding</strong> +10%</td><td>-9.09%</td></tr><tr><td><strong>Market capitalization</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Number of shares outstanding</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Market capitalization</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Price per share</strong> +10%</td><td>+0%</td></tr><tr><td><strong>You save</strong> +10%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Market capitalization sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. By contrast, Number of shares outstanding, Market capitalization and Price per share barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Number of shares outstanding = 5, Market capitalization = 50 USD, Number of shares outstanding = 500, Market capitalization = 5 USD, Price per share = 50 USD and You save = 500 /share, the answer is <strong>Price per share</strong> = 10 USD.</li><li>With Number of shares outstanding = 30, Market capitalization = 100 USD, Number of shares outstanding = 1000, Market capitalization = 10 USD, Price per share = 100 USD and You save = 1000 /share, the answer is <strong>Price per share</strong> = 3.33 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Price per share follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Number of shares outstanding and Market capitalization and the number you are missing is Price per share and Number of shares outstanding.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/cd">CD (certificate of deposit)</a>, <a href="/finance/cell-phone-plan">Cell phone plan Calculator</a> and <a href="/finance/gtin-check-digit">Check digit Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Price per share calculator work out?', 'a' => <<<'TXT'
            Price per share, Number of shares outstanding, Market capitalization and Price per share, from Market capitalization and Number of shares outstanding. The relationship is Price per share = Market capitalization ÷ Number of shares outstanding.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Number of shares outstanding, Market capitalization (USD). Enter number of shares outstanding and market capitalization; Price per share is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Price per share, Market capitalization, Number of shares outstanding and Price per share blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Price per share = 10 USD. The figures come from Number of shares outstanding as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Price per share is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Number of shares outstanding left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Price per share keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/cd', 'name' => 'CD (certificate of deposit)'],
            ['path' => '/finance/cell-phone-plan', 'name' => 'Cell phone plan Calculator'],
            ['path' => '/finance/gtin-check-digit', 'name' => 'Check digit Calculator'],
        ],
        'authors' => [],
    ],
];
