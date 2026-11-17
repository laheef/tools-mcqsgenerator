<?php

/**
 * Contribution margin
 * /finance/contribution-margin
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Contribution margin',
    'meta' => ['title' => 'Contribution margin — Free Online Calculator', 'description' => 'Enter selling price per unit, variable cost per unit and number of units and Contribution margin returns profit generated. Any box can be the unknown.', 'h1' => 'Contribution margin Calculator', 'updated' => '2026-09-26'],
    'raw' => [
        'vars' => [
            'contribution_margin' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'contribution_margin_ratio' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'fixed_costs' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'number_units' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'profit_generated' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'selling_price' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'variable_cost' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
        ],
        'groups' => [
            [
                'uid' => 'NJQLZ1yuMYcmZX-Y5L1qB',
                'title' => 'Data provided:',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'selling_price',
                                    'vt' => 'numerical',
                                    'l' => 'Selling price per unit',
                                    'us' => '663',
                                    'du' => 'USD',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'variable_cost',
                                    'vt' => 'numerical',
                                    'l' => 'Variable cost per unit',
                                    'us' => '663',
                                    'du' => 'USD',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'number_units', 'vt' => 'numerical', 'l' => 'Number of units'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'fixed_costs',
                                    'vt' => 'numerical',
                                    'l' => 'Fixed costs',
                                    'us' => '663',
                                    'du' => 'USD',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'tx74N8dr4PDkpHPus9auO',
                'title' => 'Results:',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'contribution_margin',
                                    'vt' => 'numerical',
                                    'l' => 'Contribution margin',
                                    'us' => '663',
                                    'du' => 'USD',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'contribution_margin_ratio',
                                    'vt' => 'numerical',
                                    'l' => 'Contribution margin ratio',
                                    'us' => '37',
                                    'du' => 'perc',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'profit_generated',
                                    'vt' => 'numerical',
                                    'l' => 'Profit generated',
                                    'us' => '663',
                                    'du' => 'USD',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'x',
                                    'c' => [
                                        ['profit_generated < 0', 'Your business is not profitable yet. Keep going!'],
                                        ['profit_generated > 0', 'Your business is making profits. That\'s awesome!'],
                                        ['profit_generated == 0', 'Your business is exactly at breakeven. You just need to sell a bit more to make profits!'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'contribution_margin = (selling_price * number_units) - (variable_cost * number_units) ',
                'var' => [
                    [
                        'l' => 'selling_price',
                        'f' => 'contribution_margin/number_units + variable_cost',
                        'r' => ['contribution_margin', 'variable_cost', 'number_units'],
                    ],
                    [
                        'l' => 'contribution_margin',
                        'f' => 'number_units*(selling_price - variable_cost)',
                        'r' => ['selling_price', 'variable_cost', 'number_units'],
                    ],
                    [
                        'l' => 'variable_cost',
                        'f' => '-contribution_margin/number_units + selling_price',
                        'r' => ['selling_price', 'contribution_margin', 'number_units'],
                    ],
                    [
                        'l' => 'number_units',
                        'f' => 'contribution_margin/(selling_price - variable_cost)',
                        'r' => ['selling_price', 'contribution_margin', 'variable_cost'],
                    ],
                ],
            ],
            [
                'formula' => 'contribution_margin_ratio = ( (selling_price * number_units) - (variable_cost * number_units) ) / (selling_price * number_units)',
                'var' => [
                    [
                        'l' => 'selling_price',
                        'f' => '-variable_cost/(contribution_margin_ratio - 1)',
                        'r' => ['contribution_margin_ratio', 'variable_cost', 'number_units'],
                    ],
                    [
                        'l' => 'contribution_margin_ratio',
                        'f' => '(selling_price - variable_cost)/selling_price',
                        'r' => ['selling_price', 'variable_cost', 'number_units'],
                    ],
                    [
                        'l' => 'variable_cost',
                        'f' => 'selling_price*(1 - contribution_margin_ratio)',
                        'r' => ['selling_price', 'contribution_margin_ratio', 'number_units'],
                    ],
                ],
            ],
            [
                'formula' => 'profit_generated = contribution_margin - fixed_costs',
                'var' => [
                    [
                        'l' => 'fixed_costs',
                        'f' => 'contribution_margin - profit_generated',
                        'r' => ['contribution_margin', 'profit_generated'],
                    ],
                    [
                        'l' => 'contribution_margin',
                        'f' => 'fixed_costs + profit_generated',
                        'r' => ['fixed_costs', 'profit_generated'],
                    ],
                    [
                        'l' => 'profit_generated',
                        'f' => 'contribution_margin - fixed_costs',
                        'r' => ['fixed_costs', 'contribution_margin'],
                    ],
                ],
            ],
        ],
        'datasets' => [],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        Contribution margin takes Selling price per unit, Variable cost per unit and Number of units and returns Fixed costs and Contribution margin. Nothing is looked up on this page: fixed costs is computed from selling price per unit and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Fixed costs is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Contribution margin calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Contribution margin: it takes 3 numbers and reports Fixed costs, Contribution margin and Contribution margin ratio.</p><p>In the form&#039;s own words, Contribution margin = Number of units × (Selling price per unit − Variable cost per unit).</p><p>The result panel carries Fixed costs, Contribution margin, Contribution margin ratio and Profit generated, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Selling price per unit</strong> — in USD</li><li><strong>Variable cost per unit</strong> — in USD</li><li><strong>Number of units</strong> — a plain number, no unit</li></ul><p>The answers come back as Fixed costs in USD, Contribution margin in USD, Contribution margin ratio in percent, Profit generated in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Selling price per unit = 10 USD, Variable cost per unit = 100 USD, Number of units = 1000, Fixed costs = 10 USD, Contribution margin ratio = 100 perc and Profit generated = 1000 USD — through the same formula and the panel reports <strong>Contribution margin</strong> = -90000 USD.</p><ul><li><strong>Contribution margin</strong> = -90000 USD</li></ul><p>The line behind those figures is <strong>Contribution margin</strong> = <code>Number of units × (Selling price per unit − Variable cost per unit)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Contribution margin</strong> = -90000 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Contribution margin ratio offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Contribution margin</strong> = <code>Number of units × (Selling price per unit − Variable cost per unit)</code></li><li><strong>Selling price per unit</strong> = <code>Contribution margin ÷ Number of units + Variable cost per unit</code></li><li><strong>Variable cost per unit</strong> = <code>− Contribution margin ÷ Number of units + Selling price per unit</code></li><li><strong>Number of units</strong> = <code>Contribution margin ÷ (Selling price per unit − Variable cost per unit)</code></li><li><strong>Contribution margin ratio</strong> = <code>(Selling price per unit − Variable cost per unit) ÷ Selling price per unit</code></li><li><strong>Profit generated</strong> = <code>Contribution margin − Fixed costs</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Contribution margin</strong> = <code>Number of units × (Selling price per unit − Variable cost per unit)</code> — the form to use when Selling price per unit, Variable cost per unit and Number of units are the values you have.</li><li><strong>Selling price per unit</strong> = <code>Contribution margin ÷ Number of units + Variable cost per unit</code> — the form to use when Contribution margin, Variable cost per unit and Number of units are the values you have.</li><li><strong>Variable cost per unit</strong> = <code>− Contribution margin ÷ Number of units + Selling price per unit</code> — the form to use when Selling price per unit, Contribution margin and Number of units are the values you have.</li><li><strong>Number of units</strong> = <code>Contribution margin ÷ (Selling price per unit − Variable cost per unit)</code> — the form to use when Selling price per unit, Contribution margin and Variable cost per unit are the values you have.</li><li><strong>Contribution margin ratio</strong> = <code>(Selling price per unit − Variable cost per unit) ÷ Selling price per unit</code> — the form to use when Selling price per unit, Variable cost per unit and Number of units are the values you have.</li><li><strong>Selling price per unit</strong> = <code>− Variable cost per unit ÷ (Contribution margin ratio − 1)</code> — the form to use when Contribution margin ratio, Variable cost per unit and Number of units are the values you have.</li><li><strong>Variable cost per unit</strong> = <code>Selling price per unit × (1 − Contribution margin ratio)</code> — the form to use when Selling price per unit, Contribution margin ratio and Number of units are the values you have.</li><li><strong>Profit generated</strong> = <code>Contribution margin − Fixed costs</code> — the form to use when Fixed costs and Contribution margin are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Contribution margin, Selling price per unit and Variable cost per unit can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Selling price per unit, from 10 to 20 — and the answers go from <strong>Contribution margin</strong> -90000 USD to <strong>Contribution margin</strong> -80000 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Fixed costs, Contribution margin and Contribution margin ratio are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Selling price per unit left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Selling price per unit is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Variable cost per unit left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Variable cost per unit is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Number of units left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Number of units is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Selling price per unit is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Selling price per unit</strong> takes a plain number with no unit attached. It feeds Contribution margin, Variable cost per unit and Number of units. Have it to hand before you start: Selling price per unit is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Variable cost per unit</strong> takes a plain number with no unit attached. It feeds Selling price per unit, Contribution margin and Number of units. Have it to hand before you start: Variable cost per unit is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Number of units</strong> takes a plain number with no unit attached. It feeds Selling price per unit, Contribution margin and Variable cost per unit. Have it to hand before you start: Number of units is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Fixed costs</strong> is a plain number. The value follows from Contribution margin and Profit generated. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Contribution margin</strong> is a plain number and the page's own defaults put it at -90000. The value follows from Selling price per unit, Variable cost per unit and Number of units. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Contribution margin ratio</strong> is a percent figure. The value follows from Selling price per unit, Variable cost per unit and Number of units. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Profit generated</strong> is a plain number. The value follows from Fixed costs and Contribution margin. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Contribution margin</th></tr></thead><tbody><tr><td><strong>Selling price per unit</strong> +10%</td><td>+1.11%</td></tr><tr><td><strong>Variable cost per unit</strong> +10%</td><td>-11.11%</td></tr><tr><td><strong>Number of units</strong> +10%</td><td>-10%</td></tr><tr><td><strong>Fixed costs</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Contribution margin ratio</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Profit generated</strong> +10%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Variable cost per unit sits at the top — a ten per cent error in that box shows up as roughly 11.1 per cent in the answer. By contrast, Fixed costs, Contribution margin ratio and Profit generated barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Fixed costs follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Selling price per unit, Variable cost per unit and Number of units are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Selling price per unit, Variable cost per unit and Number of units is what you already know and Fixed costs and Contribution margin is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/amortization">Amortization Calculator</a>, <a href="/finance/annual-income">Annual income Calculator</a> and <a href="/finance/annual-pay">Annual pay Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Contribution margin calculator work out?', 'a' => <<<'TXT'
            Fixed costs, Contribution margin, Contribution margin ratio and Profit generated, from Selling price per unit, Variable cost per unit and Number of units. The relationship is Contribution margin = Number of units × (Selling price per unit − Variable cost per unit).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Selling price per unit (USD), Variable cost per unit (USD), Number of units. Fill selling price per unit, variable cost per unit and number of units and leave Fixed costs empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Contribution margin, Selling price per unit, Variable cost per unit and Number of units can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Contribution margin = -90000 USD. Those are the defaults written into the form — move Selling price per unit and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Fixed costs is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Selling price per unit left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Fixed costs keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/amortization', 'name' => 'Amortization Calculator'],
            ['path' => '/finance/annual-income', 'name' => 'Annual income Calculator'],
            ['path' => '/finance/annual-pay', 'name' => 'Annual pay Calculator'],
        ],
        'authors' => [],
    ],
];
