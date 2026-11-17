<?php

/**
 * Gold melt
 * /finance/gold-melt
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Gold melt',
    'meta' => ['title' => 'Gold melt Calculator: Formula, Steps & Examples', 'description' => 'Gold melt turns weight of gold, market price and spread into karat and purity. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Gold melt Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => 'Quality ',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'karat',
                            'label' => 'Karat',
                            'type' => 'select',
                            'options' => [
                                '24 karat' => '99.9',
                                '23 karat' => '95.83',
                                '22 karat' => '91.67',
                                '21.6 karat' => '90',
                                '21 karat' => '87.5',
                                '20 karat' => '83.33',
                                '19 karat' => '79.17',
                                '18 karat' => '75',
                                '17 karat' => '70.83',
                                '16 karat' => '66.67',
                                '15 karat' => '62.5',
                                '14 karat' => '58.33',
                                '13 karat' => '54.17',
                                '12 karat' => '50',
                                '11 karat' => '45.83',
                                '10 karat' => '41.67',
                                '9 karat' => '37.5',
                                '8 karat' => '33.33',
                            ],
                            'control' => 'DROPDOWN',
                            'defaults' => [
                                ['value' => '24 karat', 'when' => null],
                                ['value' => '24 karat', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'purity',
                            'label' => 'Purity',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                            'default' => '99.9',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Value ',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'weight',
                            'label' => 'Weight of gold',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'market_price',
                            'label' => 'Market price',
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
                            'name' => 'possession_value',
                            'label' => 'Possession value',
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
            'title' => 'Trade / Exchange ',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'spread',
                            'label' => 'Spread',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                            'defaults' => [
                                ['value' => '5', 'when' => null],
                                ['value' => '5', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'bidValue',
                            'label' => 'Bid price',
                            'type' => 'number',
                            'help' => 'Price you will get when selling.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'askValue',
                            'label' => 'Ask price',
                            'type' => 'number',
                            'help' => 'Price you will pay when buying.',
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
            'title' => 'possession_value = weight * (purity * 0.01) * market_price',
            'results' => ['purity' => '100*possession_value/(market_price*weight)', 'market_price' => '100*possession_value/(purity*weight)', 'possession_value' => '(1/100)*market_price*purity*weight', 'weight' => '100*possession_value/(market_price*purity)'],
        ],
        [
            'title' => 'karat = purity',
            'results' => ['purity' => 'karat', 'karat' => 'purity'],
        ],
        [
            'title' => 'bidValue = (possession_value * 0.01) * (100 - spread)',
            'results' => ['bidValue' => '(1/100)*possession_value*(100 - spread)', 'spread' => '-100*bidValue/possession_value + 100', 'possession_value' => '-100*bidValue/(spread - 100)'],
        ],
        [
            'title' => 'askValue = (possession_value * 0.01) * (100 + spread) ',
            'results' => ['possession_value' => '100*askValue/(spread + 100)', 'spread' => '100*askValue/possession_value - 100', 'askValue' => '(1/100)*possession_value*(spread + 100)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Gold melt turns Karat, Weight of gold and Market price into Purity. Nothing is looked up on this page: purity is computed from karat and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Purity is opened in percent; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Gold melt calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Gold melt: it takes 7 numbers and reports Purity.</p><p>In the form&#039;s own words, Possession value = (1 ÷ 100) × Market price × Purity × Weight of gold.</p><p>The answers are Purity; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 7 boxes, and nothing else.</p><ul><li><strong>Karat</strong> — a plain number, no unit</li><li><strong>Weight of gold</strong> — in grams</li><li><strong>Market price</strong> — in USD</li><li><strong>Possession value</strong> — in USD</li><li><strong>Spread</strong> — in percent</li><li><strong>Bid price</strong> — in USD. Price you will get when selling.</li><li><strong>Ask price</strong> — in USD. Price you will pay when buying.</li></ul><p>The result box is Purity in percent. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Karat = 99.9, Weight of gold = 10 g, Market price = 100 USD, Possession value = 1000 USD, Spread = 5 perc and Ask price = 100 USD; the answers are <strong>Purity</strong> = 100 perc and <strong>Bid price</strong> = 950 USD.</p><ul><li><strong>Purity</strong> = 100 perc</li><li><strong>Bid price</strong> = 950 USD</li></ul><p>That is <strong>Possession value</strong> = <code>(1 ÷ 100) × Market price × Purity × Weight of gold</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Purity</strong> = 100 and <strong>Bid price</strong> = 950 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Purity offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Possession value</strong> = <code>(1 ÷ 100) × Market price × Purity × Weight of gold</code></li><li><strong>Purity</strong> = <code>100 × Possession value ÷ (Market price × Weight of gold)</code></li><li><strong>Market price</strong> = <code>100 × Possession value ÷ (Purity × Weight of gold)</code></li><li><strong>Weight of gold</strong> = <code>100 × Possession value ÷ (Market price × Purity)</code></li><li><strong>Karat</strong> = <code>Purity</code></li><li><strong>Bid price</strong> = <code>(1 ÷ 100) × Possession value × (100 − Spread)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Possession value</strong> = <code>(1 ÷ 100) × Market price × Purity × Weight of gold</code> — the form to use when Market price, Purity and Weight of gold are the values you have.</li><li><strong>Purity</strong> = <code>100 × Possession value ÷ (Market price × Weight of gold)</code> — the form to use when Possession value, Market price and Weight of gold are the values you have.</li><li><strong>Market price</strong> = <code>100 × Possession value ÷ (Purity × Weight of gold)</code> — the form to use when Possession value, Purity and Weight of gold are the values you have.</li><li><strong>Weight of gold</strong> = <code>100 × Possession value ÷ (Market price × Purity)</code> — the form to use when Possession value, Market price and Purity are the values you have.</li><li><strong>Karat</strong> = <code>Purity</code> — the form to use when Purity are the values you have.</li><li><strong>Purity</strong> = <code>Karat</code> — the form to use when Karat are the values you have.</li><li><strong>Bid price</strong> = <code>(1 ÷ 100) × Possession value × (100 − Spread)</code> — the form to use when Possession value and Spread are the values you have.</li><li><strong>Spread</strong> = <code>− 100 × Bid price ÷ Possession value + 100</code> — the form to use when Bid price and Possession value are the values you have.</li></ul><p>Any one of Possession value, Purity and Market price can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Karat, from 99.9 to 200 — and the answers go from <strong>Purity</strong> 100 perc and <strong>Bid price</strong> 950 USD to <strong>Purity</strong> 100 perc and <strong>Bid price</strong> 950 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Weight of gold and Spread is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Purity is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Karat left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Karat is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Weight of gold left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Weight of gold is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Karat is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Gold melt form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Karat</strong> takes a plain number with no unit attached. The page reads it when it works out Purity. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Karat is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Weight of gold</strong> is a grams quantity: the page opens it in g and converts anything else you pick before the formula runs. The page reads it when it works out Purity, Market price and Possession value. Fill it from a measurement rather than a memory — Weight of gold is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Market price</strong> takes a plain number with no unit attached. The page reads it when it works out Purity, Possession value and Weight of gold. Fill it from a measurement rather than a memory — Market price is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Possession value</strong> takes a plain number with no unit attached. The page reads it when it works out Purity, Market price and Weight of gold. Fill it from a measurement rather than a memory — Possession value is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Spread</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The page reads it when it works out Bid price, Possession value and Ask price. Fill it from a measurement rather than a memory — Spread is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Bid price</strong> takes a plain number with no unit attached. Price you will get when selling. The page reads it when it works out Spread and Possession value. Fill it from a measurement rather than a memory — Bid price is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Ask price</strong> takes a plain number with no unit attached. Price you will pay when buying. The page reads it when it works out Possession value and Spread. Fill it from a measurement rather than a memory — Ask price is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Purity</strong> is a percent figure and the page's own defaults put it at 100 perc. It is computed from Possession value, Market price and Weight of gold, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Purity</th><th>Bid price</th></tr></thead><tbody><tr><td><strong>Karat</strong> +10%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Weight of gold</strong> +10%</td><td>-9.09%</td><td>+0%</td></tr><tr><td><strong>Market price</strong> +10%</td><td>-9.09%</td><td>+0%</td></tr><tr><td><strong>Possession value</strong> +10%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>Spread</strong> +10%</td><td>+0%</td><td>-0.53%</td></tr><tr><td><strong>Ask price</strong> +10%</td><td>+0%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Possession value sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. By contrast, Karat and Ask price barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Karat = 49.95, Weight of gold = 5 g, Market price = 50 USD, Possession value = 500 USD, Spread = 2.5 perc and Ask price = 50 USD and the page reports <strong>Purity</strong> = 200 perc and <strong>Bid price</strong> = 488 USD.</li><li>Feed in Karat = 300, Weight of gold = 10 g, Market price = 100 USD, Possession value = 1000 USD, Spread = 5 perc and Ask price = 100 USD and the page reports <strong>Purity</strong> = 100 perc and <strong>Bid price</strong> = 950 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Gold melt actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>grams</strong> — opens in <em>g</em>, and the chip also carries g, mg, lb, oz and st. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Purity follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover percent and grams. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Karat, Weight of gold and Market price and the number you are missing is Purity.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/saas-ltv">SaaS lifetime value Calculator</a>, <a href="/finance/sabbatical">Sabbatical Calculator</a> and <a href="/finance/safety-stock">Safety stock Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Gold melt calculator work out?', 'a' => 'Purity, from Market price, Purity and Weight of gold. The relationship is Possession value = (1 ÷ 100) × Market price × Purity × Weight of gold.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Karat, Weight of gold (grams), Market price (USD), Possession value (USD), Spread (percent). Fill karat, weight of gold and market price and leave Purity empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Possession value, Purity, Market price and Weight of gold blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Purity = 100 perc and Bid price = 950 USD. That comes from the page\'s own defaults, entered in Karat; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Purity is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Karat blank and the page solves for it, reporting Purity instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Purity at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/saas-ltv', 'name' => 'SaaS lifetime value Calculator'],
            ['path' => '/finance/sabbatical', 'name' => 'Sabbatical Calculator'],
            ['path' => '/finance/safety-stock', 'name' => 'Safety stock Calculator'],
        ],
        'authors' => [],
    ],
];
