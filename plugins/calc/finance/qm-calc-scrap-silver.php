<?php

/**
 * Scrap silver
 * /finance/scrap-silver
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Scrap silver',
    'meta' => ['title' => 'Scrap silver Calculator — Formula & Results', 'description' => 'Scrap silver works out silver purity and custom purity and reports both. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Scrap silver Calculator', 'updated' => '2024-05-22'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'weight',
                            'label' => 'Weight of scrap silver',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'ozt',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'purity',
                            'label' => 'Silver purity',
                            'type' => 'select',
                            'options' => [
                                '.999 - fine' => '0.999000000000000',
                                '.980' => '0.980000000000000',
                                '.970' => '0.970000000000000',
                                '.960' => '0.960000000000000',
                                '.9584 - Brittania' => '0.958400000000000',
                                '.950' => '0.950000000000000',
                                '.940' => '0.940000000000000',
                                '.930' => '0.930000000000000',
                                '.925 - Sterling' => '0.925000000000000',
                                '.920' => '0.920000000000000',
                                '.910' => '0.910000000000000',
                                '.900 - Coin' => '0.900000000000000',
                                '.875' => '0.875000000000000',
                                '.850' => '0.850000000000000',
                                '.825' => '0.825000000000000',
                                '.800' => '0.800000000000000',
                                '.775' => '0.775000000000000',
                                '.750' => '0.750000000000000',
                                'custom...' => '0.000000000000000',
                            ],
                            'dataset' => 'purity',
                            'control' => 'DROPDOWN',
                            'default' => '.999 - fine',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'custom_purity',
                            'label' => 'Custom purity',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'permille',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price',
                            'label' => 'Price per weight unit',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '18.850',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'real_weight',
                            'label' => 'Pure silver weight',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'ozt',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'value',
                            'label' => 'Silver value',
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
            'title' => 'Silver scrap buy and sell value',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'spread',
                            'label' => 'Spread',
                            'type' => 'number',
                            'help' => 'The difference between the prices quoted for a sale (offer) and a purchase (bid) for different types of assets.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'buy',
                            'label' => 'Ask price (buy)',
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
                            'name' => 'sell',
                            'label' => 'Bid price (sell)',
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
            'title' => 'value = real_weight * price',
            'results' => ['real_weight' => 'value/price', 'price' => 'value/real_weight', 'value' => 'price*real_weight'],
        ],
        [
            'title' => 'real_weight = weight * purity',
            'results' => ['weight' => 'real_weight/purity', 'real_weight' => 'purity*weight', 'purity' => 'real_weight/weight'],
        ],
        [
            'title' => 'buy = (1 + spread) * value',
            'results' => ['buy' => 'value*(spread + 1)', 'value' => 'buy/(spread + 1)', 'spread' => '(buy - value)/value'],
        ],
        [
            'title' => 'sell = (1 - spread) * value',
            'results' => ['value' => '-sell/(spread - 1)', 'spread' => '(-sell + value)/value', 'sell' => 'value*(1 - spread)'],
        ],
        [
            'title' => 'purity = custom_purity',
            'results' => ['custom_purity' => 'purity', 'purity' => 'custom_purity'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Scrap silver works out Custom purity from Weight of scrap silver, Silver purity and Price per weight unit. Nothing is looked up on this page: custom purity is computed from weight of scrap silver and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Custom purity is opened in permille; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Scrap silver calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Scrap silver: it takes 8 numbers and reports Custom purity.</p><p>The relationship it solves reads Silver value = Price per weight unit × Pure silver weight.</p><p>What comes back is Custom purity — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 8 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Weight of scrap silver</strong> — in troy ounces</li><li><strong>Silver purity</strong> — a plain number, no unit</li><li><strong>Price per weight unit</strong> — in USD</li><li><strong>Pure silver weight</strong> — in troy ounces</li><li><strong>Silver value</strong> — in USD</li><li><strong>Spread</strong> — in percent. The difference between the prices quoted for a sale (offer) and a purchase (bid) for different types of assets.</li><li><strong>Ask price (buy)</strong> — in USD</li><li><strong>Bid price (sell)</strong> — in USD</li></ul><p>What you get back is Custom purity in permille, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Weight of scrap silver = 10 ozt, Silver purity = 0.999, Price per weight unit = 18.85 USD, Silver value = 1000 USD, Spread = 5 perc, Ask price (buy) = 100 USD and Bid price (sell) = 1000 USD — through the same formula and the panel reports <strong>Pure silver weight</strong> = 53.05 ozt and <strong>Custom purity</strong> = 0.999 permille.</p><ul><li><strong>Pure silver weight</strong> = 53.05 ozt</li><li><strong>Custom purity</strong> = 0.999 permille</li></ul><p>The line behind those figures is <strong>Silver value</strong> = <code>Price per weight unit × Pure silver weight</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Pure silver weight</strong> = 53.05 and <strong>Custom purity</strong> = 0.999. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Custom purity lists 6 options and opens on permille. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Silver value</strong> = <code>Price per weight unit × Pure silver weight</code></li><li><strong>Pure silver weight</strong> = <code>Silver value ÷ Price per weight unit</code></li><li><strong>Price per weight unit</strong> = <code>Silver value ÷ Pure silver weight</code></li><li><strong>Weight of scrap silver</strong> = <code>Pure silver weight ÷ Silver purity</code></li><li><strong>Silver purity</strong> = <code>Pure silver weight ÷ Weight of scrap silver</code></li><li><strong>Ask price (buy)</strong> = <code>Silver value × (Spread + 1)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Silver value</strong> = <code>Price per weight unit × Pure silver weight</code> — the form to use when Price per weight unit and Pure silver weight are the values you have.</li><li><strong>Pure silver weight</strong> = <code>Silver value ÷ Price per weight unit</code> — the form to use when Silver value and Price per weight unit are the values you have.</li><li><strong>Price per weight unit</strong> = <code>Silver value ÷ Pure silver weight</code> — the form to use when Silver value and Pure silver weight are the values you have.</li><li><strong>Pure silver weight</strong> = <code>Silver purity × Weight of scrap silver</code> — the form to use when Silver purity and Weight of scrap silver are the values you have.</li><li><strong>Weight of scrap silver</strong> = <code>Pure silver weight ÷ Silver purity</code> — the form to use when Pure silver weight and Silver purity are the values you have.</li><li><strong>Silver purity</strong> = <code>Pure silver weight ÷ Weight of scrap silver</code> — the form to use when Pure silver weight and Weight of scrap silver are the values you have.</li><li><strong>Ask price (buy)</strong> = <code>Silver value × (Spread + 1)</code> — the form to use when Silver value and Spread are the values you have.</li><li><strong>Silver value</strong> = <code>Ask price (buy) ÷ (Spread + 1)</code> — the form to use when Ask price (buy) and Spread are the values you have.</li></ul><p>Any one of Silver value, Pure silver weight and Price per weight unit can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Weight of scrap silver, from 10 to 20 — and the answers go from <strong>Pure silver weight</strong> 53.05 ozt and <strong>Custom purity</strong> 0.999 permille to <strong>Pure silver weight</strong> 53.05 ozt and <strong>Custom purity</strong> 0.999 permille.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Weight of scrap silver, Pure silver weight and Spread carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Custom purity is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Weight of scrap silver left as a guess.</strong> Anything typed into Weight of scrap silver is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Silver purity left as a guess.</strong> Anything typed into Silver purity is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Weight of scrap silver and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Scrap silver form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Weight of scrap silver</strong> is a troy ounces quantity: the page opens it in ozt and converts anything else you pick before the formula runs. The page reads it when it works out Pure silver weight and Silver purity. Fill it from a measurement rather than a memory — Weight of scrap silver is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Silver purity</strong> takes a plain number with no unit attached. The page reads it when it works out Weight of scrap silver, Pure silver weight and Custom purity. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Silver purity is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Price per weight unit</strong> takes a plain number with no unit attached. The page reads it when it works out Pure silver weight and Silver value. Fill it from a measurement rather than a memory — Price per weight unit is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Pure silver weight</strong> is a troy ounces quantity: the page opens it in ozt and converts anything else you pick before the formula runs. The page reads it when it works out Price per weight unit, Silver value and Weight of scrap silver. Fill it from a measurement rather than a memory — Pure silver weight is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Silver value</strong> takes a plain number with no unit attached. The page reads it when it works out Pure silver weight, Price per weight unit and Ask price (buy). Fill it from a measurement rather than a memory — Silver value is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Spread</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The difference between the prices quoted for a sale (offer) and a purchase (bid) for different types of assets. The page reads it when it works out Ask price (buy), Silver value and Bid price (sell). Fill it from a measurement rather than a memory — Spread is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Ask price (buy)</strong> takes a plain number with no unit attached. The page reads it when it works out Silver value and Spread. Fill it from a measurement rather than a memory — Ask price (buy) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Bid price (sell)</strong> takes a plain number with no unit attached. The page reads it when it works out Silver value and Spread. Fill it from a measurement rather than a memory — Bid price (sell) is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Custom purity</strong> is a permille figure and the page's own defaults put it at 0.999 permille. It is worked out from Silver purity. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Pure silver weight</th><th>Custom purity</th></tr></thead><tbody><tr><td><strong>Weight of scrap silver</strong> +10%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Silver purity</strong> +10%</td><td>+0%</td><td>+10%</td></tr><tr><td><strong>Price per weight unit</strong> +10%</td><td>-9.09%</td><td>+0%</td></tr><tr><td><strong>Silver value</strong> +10%</td><td>+10%</td><td>+0%</td></tr><tr><td><strong>Spread</strong> +10%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Ask price (buy)</strong> +10%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Bid price (sell)</strong> +10%</td><td>+0%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Silver purity: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. By contrast, Weight of scrap silver, Spread and Ask price (buy) barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Scrap silver actually offers.</p><ul><li><strong>permille</strong> — opens in <em>permille</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>troy ounces</strong> — opens in <em>ozt</em>, and the chip also carries kg, g, lb, oz and st. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Custom purity is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover permille and troy ounces. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Weight of scrap silver, Silver purity and Price per weight unit measured, Custom purity wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/texas-overtime">Texas overtime Calculator</a>, <a href="/finance/texas-tax">Texas tax Calculator</a> and <a href="/finance/time-and-a-half">Time and a half Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Scrap silver calculator work out?', 'a' => 'Custom purity, from Price per weight unit and Pure silver weight. The relationship is Silver value = Price per weight unit × Pure silver weight.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Weight of scrap silver (troy ounces), Silver purity, Price per weight unit (USD), Pure silver weight (troy ounces), Silver value (USD). Enter weight of scrap silver, silver purity and price per weight unit; Custom purity is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Silver value, Pure silver weight, Price per weight unit and Weight of scrap silver blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Pure silver weight = 53.05 ozt and Custom purity = 0.999 permille. That comes from the page's own defaults, entered in Weight of scrap silver; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Custom purity is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Weight of scrap silver blank and the page solves for it, reporting Custom purity instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Custom purity keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/texas-overtime', 'name' => 'Texas overtime Calculator'],
            ['path' => '/finance/texas-tax', 'name' => 'Texas tax Calculator'],
            ['path' => '/finance/time-and-a-half', 'name' => 'Time and a half Calculator'],
        ],
        'authors' => [],
    ],
];
