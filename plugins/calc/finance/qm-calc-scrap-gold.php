<?php

/**
 * Scrap gold
 * /finance/scrap-gold
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Scrap gold',
    'meta' => ['title' => 'Scrap gold Calculator — Formula, Units & Example', 'description' => 'Scrap gold works out gold purity by percent and pure gold weight and reports both. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Scrap gold Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mass',
                            'label' => 'Weight of scrap gold',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'karat',
                            'label' => 'Gold purity by karat',
                            'type' => 'number',
                            'suffix' => 'K',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gold_purity',
                            'label' => 'Gold purity by percent',
                            'type' => 'number',
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
                            'name' => 'pure_gold_weight',
                            'label' => 'Pure gold weight',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price_per_ounce',
                            'label' => 'Price per unit weight',
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
                            'name' => 'price',
                            'label' => 'Total value',
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
            'title' => 'price = price_per_ounce * pure_gold_weight ',
            'results' => ['price' => 'price_per_ounce*pure_gold_weight', 'pure_gold_weight' => 'price/price_per_ounce', 'price_per_ounce' => 'price/pure_gold_weight'],
        ],
        [
            'title' => 'karat/24 = gold_purity',
            'results' => ['karat' => '24*gold_purity', 'gold_purity' => '(1/24)*karat'],
        ],
        [
            'title' => 'pure_gold_weight = mass * gold_purity',
            'results' => ['gold_purity' => 'pure_gold_weight/mass', 'pure_gold_weight' => 'gold_purity*mass', 'mass' => 'pure_gold_weight/gold_purity'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Pure gold weight and Price per unit weight into Scrap gold and the answer comes back as Weight of scrap gold and Gold purity by karat. The arithmetic is the whole method: weight of scrap gold is worked out from pure gold weight by one formula, applied once. Weight of scrap gold comes back in grams unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Scrap gold calculator works', 'html' => <<<'TXT'
            <p>The Scrap gold calculator applies one relationship to 2 numbers and reports Weight of scrap gold, Gold purity by karat and Gold purity by percent.</p><p>In the form&#039;s own words, Total value = Price per unit weight × Pure gold weight.</p><p>What comes back is Weight of scrap gold, Gold purity by karat, Gold purity by percent and Total value — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Pure gold weight</strong> — in grams</li><li><strong>Price per unit weight</strong> — in USD</li></ul><p>What you get back is Weight of scrap gold in grams, Gold purity by karat in K, Gold purity by percent in percent, Total value in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Weight of scrap gold = 10 g, Gold purity by karat = 100 K, Gold purity by percent = 1000 perc, Pure gold weight = 10 g and Price per unit weight = 100 USD gives <strong>Total value</strong> = 1000 USD.</p><ul><li><strong>Total value</strong> = 1000 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Total value</strong> = <code>Price per unit weight × Pure gold weight</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Total value</strong> = 1000. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Weight of scrap gold lists 6 options and opens on grams. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Total value</strong> = <code>Price per unit weight × Pure gold weight</code></li><li><strong>Pure gold weight</strong> = <code>Total value ÷ Price per unit weight</code></li><li><strong>Price per unit weight</strong> = <code>Total value ÷ Pure gold weight</code></li><li><strong>Gold purity by karat</strong> = <code>24 × Gold purity by percent</code></li><li><strong>Gold purity by percent</strong> = <code>(1 ÷ 24) × Gold purity by karat</code></li><li><strong>Weight of scrap gold</strong> = <code>Pure gold weight ÷ Gold purity by percent</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Total value</strong> = <code>Price per unit weight × Pure gold weight</code> — the form to use when Price per unit weight and Pure gold weight are the values you have.</li><li><strong>Pure gold weight</strong> = <code>Total value ÷ Price per unit weight</code> — the form to use when Total value and Price per unit weight are the values you have.</li><li><strong>Price per unit weight</strong> = <code>Total value ÷ Pure gold weight</code> — the form to use when Total value and Pure gold weight are the values you have.</li><li><strong>Gold purity by karat</strong> = <code>24 × Gold purity by percent</code> — the form to use when Gold purity by percent are the values you have.</li><li><strong>Gold purity by percent</strong> = <code>(1 ÷ 24) × Gold purity by karat</code> — the form to use when Gold purity by karat are the values you have.</li><li><strong>Pure gold weight</strong> = <code>Gold purity by percent × Weight of scrap gold</code> — the form to use when Gold purity by percent and Weight of scrap gold are the values you have.</li><li><strong>Gold purity by percent</strong> = <code>Pure gold weight ÷ Weight of scrap gold</code> — the form to use when Pure gold weight and Weight of scrap gold are the values you have.</li><li><strong>Weight of scrap gold</strong> = <code>Pure gold weight ÷ Gold purity by percent</code> — the form to use when Pure gold weight and Gold purity by percent are the values you have.</li></ul><p>Any one of Total value, Pure gold weight and Price per unit weight can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Weight of scrap gold, from 10 to 20 — and the answers go from <strong>Total value</strong> 1000 USD to <strong>Total value</strong> 1000 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Pure gold weight carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Weight of scrap gold, Gold purity by karat and Gold purity by percent are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Pure gold weight left as a guess.</strong> Anything typed into Pure gold weight is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Price per unit weight left as a guess.</strong> Anything typed into Price per unit weight is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Pure gold weight and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Scrap gold form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Pure gold weight</strong> is a grams quantity: the page opens it in g and converts anything else you pick before the formula runs. Change it and Total value, Price per unit weight and Gold purity by percent changes with it. Fill it from a measurement rather than a memory — Pure gold weight is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Price per unit weight</strong> takes a plain number with no unit attached. Change it and Total value and Pure gold weight changes with it. Fill it from a measurement rather than a memory — Price per unit weight is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Weight of scrap gold</strong> is a grams figure. It is worked out from Pure gold weight and Gold purity by percent. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Gold purity by karat</strong> is a plain number. It is worked out from Gold purity by percent. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Gold purity by percent</strong> is a percent figure. It is worked out from Gold purity by karat. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Total value</strong> is a plain number and the page's own defaults put it at 1000. It is worked out from Price per unit weight and Pure gold weight. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Total value</th></tr></thead><tbody><tr><td><strong>Weight of scrap gold</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Gold purity by karat</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Gold purity by percent</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Pure gold weight</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Price per unit weight</strong> +10%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Price per unit weight: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. By contrast, Weight of scrap gold, Gold purity by karat and Gold purity by percent barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Weight of scrap gold = 5 g, Gold purity by karat = 50 K, Gold purity by percent = 500 perc, Pure gold weight = 5 g and Price per unit weight = 50 USD and the page reports <strong>Total value</strong> = 250 USD.</li><li>Feed in Weight of scrap gold = 30 g, Gold purity by karat = 100 K, Gold purity by percent = 1000 perc, Pure gold weight = 10 g and Price per unit weight = 100 USD and the page reports <strong>Total value</strong> = 1000 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Scrap gold actually offers.</p><ul><li><strong>grams</strong> — opens in <em>g</em>, and the chip also carries g, mg, lb, oz and st. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Weight of scrap gold is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover grams and percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Pure gold weight and Price per unit weight is what you already know and Weight of scrap gold and Gold purity by karat is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/income-tax-philippines">Income tax Philippines Calculator</a>, <a href="/finance/inflation">Inflation Calculator</a> and <a href="/finance/information-ratio">Information ratio Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Scrap gold calculator work out?', 'a' => <<<'TXT'
            Weight of scrap gold, Gold purity by karat, Gold purity by percent and Total value, from Price per unit weight and Pure gold weight. The relationship is Total value = Price per unit weight × Pure gold weight.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Pure gold weight (grams), Price per unit weight (USD). Enter pure gold weight and price per unit weight; Weight of scrap gold is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Total value, Pure gold weight, Price per unit weight and Gold purity by karat blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Total value = 1000 USD. That comes from the page\'s own defaults, entered in Pure gold weight; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Weight of scrap gold is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Pure gold weight blank and the page solves for it, reporting Weight of scrap gold instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Weight of scrap gold at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/income-tax-philippines', 'name' => 'Income tax Philippines Calculator'],
            ['path' => '/finance/inflation', 'name' => 'Inflation Calculator'],
            ['path' => '/finance/information-ratio', 'name' => 'Information ratio Calculator'],
        ],
        'authors' => [],
    ],
];
