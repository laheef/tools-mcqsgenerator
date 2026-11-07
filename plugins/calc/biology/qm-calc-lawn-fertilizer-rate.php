<?php

/**
 * Lawn Fertilizer Rate Calculator
 * /biology/lawn-fertilizer-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Lawn Fertilizer Rate Calculator',
    'meta' => ['title' => 'Lawn Fertilizer Rate Calculator — Formula & Results', 'description' => 'Lawn Fertilizer Rate Calculator turns lawn area and nitrogen per application into product needed. Every box can be solved for, not only the one in the title.', 'h1' => 'Lawn Fertilizer Rate Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'area',
                            'label' => 'Lawn area',
                            'type' => 'number',
                            'suffix' => 'ft²',
                            'help' => '1 000 ft² is about 93 m²',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5000',
                        ],
                        [
                            'name' => 'n_rate',
                            'label' => 'Nitrogen per application',
                            'type' => 'number',
                            'suffix' => 'lb N/1000 ft²',
                            'help' => '0.5–1 for most cool-season turf',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'n_pct',
                            'label' => 'Nitrogen in the product',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'The first number on the bag, e.g. 24-0-11',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '24',
                        ],
                        [
                            'name' => 'bag_lb',
                            'label' => 'Bag size',
                            'type' => 'number',
                            'suffix' => 'lb',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '50',
                        ],
                        [
                            'name' => 'product_lb',
                            'label' => 'Product needed',
                            'type' => 'number',
                            'suffix' => 'lb',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'bags',
                            'label' => 'Bags needed',
                            'type' => 'number',
                            'help' => 'Round up when ordering',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'n_total',
                            'label' => 'Nitrogen applied overall',
                            'type' => 'number',
                            'suffix' => 'lb',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'product_per_1000',
                            'label' => 'Product per 1 000 ft²',
                            'type' => 'number',
                            'suffix' => 'lb',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'n_per_year',
                            'label' => 'Nitrogen over a season',
                            'type' => 'number',
                            'suffix' => 'lb/1000 ft²',
                            'help' => 'Four applications at the rate above',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Rate',
            'results' => [
                'product_per_1000' => 'n_rate/(n_pct/100)',
                'product_lb' => 'area/1000*n_rate/(n_pct/100)',
                'bags' => 'area/1000*n_rate/(n_pct/100)/bag_lb',
                'n_total' => 'area/1000*n_rate',
                'n_per_year' => 'n_rate*4',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Lawn area, Nitrogen per application and Nitrogen in the product into Lawn Fertilizer Rate and the answer comes back as Product needed and Bags needed. It is a single relationship that reads product needed out of lawn area, not a table of canned results keyed by them. Units for Product needed default to lb and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Lawn Fertilizer Rate calculator works', 'html' => <<<'TXT'
            <p>Lawn Fertilizer Rate answers one question from 4 numbers, and the answer is Product needed, Bags needed and Nitrogen applied overall.</p><p>The relationship it solves reads Product per 1 000 ft² = Nitrogen per application ÷ (Nitrogen in the product ÷ 100).</p><p>What comes back is Product needed, Bags needed, Nitrogen applied overall and Product per 1 000 ft² — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>Lawn area</strong> — in ft². 1 000 ft² is about 93 m²</li><li><strong>Nitrogen per application</strong> — in lb N/1000 ft². 0.5–1 for most cool-season turf</li><li><strong>Nitrogen in the product</strong> — in %. The first number on the bag, e.g. 24-0-11</li><li><strong>Bag size</strong> — in lb</li></ul><p>The answers come back as Product needed in lb, Bags needed, Nitrogen applied overall in lb, Product per 1 000 ft² in lb, Nitrogen over a season in lb/1000 ft². Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Lawn area = 5000 ft², Nitrogen per application = 1 lb N/1000 ft², Nitrogen in the product = 24 % and Bag size = 50 lb — through the same formula and the panel reports <strong>Product per 1 000 ft²</strong> = 4.17 lb, <strong>Product needed</strong> = 20.83 lb, <strong>Bags needed</strong> = 0.4167, <strong>Nitrogen applied overall</strong> = 5 lb and <strong>Nitrogen over a season</strong> = 4 lb/1000 ft².</p><ul><li><strong>Product per 1 000 ft²</strong> = 4.17 lb</li><li><strong>Product needed</strong> = 20.83 lb</li><li><strong>Bags needed</strong> = 0.4167</li><li><strong>Nitrogen applied overall</strong> = 5 lb</li><li><strong>Nitrogen over a season</strong> = 4 lb/1000 ft²</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Product per 1 000 ft²</strong> = <code>Nitrogen per application ÷ (Nitrogen in the product ÷ 100)</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Product per 1 000 ft²</strong> = 4.17, <strong>Product needed</strong> = 20.83, <strong>Bags needed</strong> = 0.4167, <strong>Nitrogen applied overall</strong> = 5 and <strong>Nitrogen over a season</strong> = 4. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Product needed is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Product per 1 000 ft²</strong> = <code>Nitrogen per application ÷ (Nitrogen in the product ÷ 100)</code></li><li><strong>Product needed</strong> = <code>Lawn area ÷ 1000 × Nitrogen per application ÷ (Nitrogen in the product ÷ 100)</code></li><li><strong>Bags needed</strong> = <code>Lawn area ÷ 1000 × Nitrogen per application ÷ (Nitrogen in the product ÷ 100) ÷ Bag size</code></li><li><strong>Nitrogen applied overall</strong> = <code>Lawn area ÷ 1000 × Nitrogen per application</code></li><li><strong>Nitrogen over a season</strong> = <code>Nitrogen per application × 4</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Product per 1 000 ft²</strong> = <code>Nitrogen per application ÷ (Nitrogen in the product ÷ 100)</code> — the form to use when Nitrogen per application and Nitrogen in the product are the values you have.</li><li><strong>Product needed</strong> = <code>Lawn area ÷ 1000 × Nitrogen per application ÷ (Nitrogen in the product ÷ 100)</code> — the form to use when Lawn area, Nitrogen per application and Nitrogen in the product are the values you have.</li><li><strong>Bags needed</strong> = <code>Lawn area ÷ 1000 × Nitrogen per application ÷ (Nitrogen in the product ÷ 100) ÷ Bag size</code> — the form to use when Lawn area, Nitrogen per application, Nitrogen in the product and Bag size are the values you have.</li><li><strong>Nitrogen applied overall</strong> = <code>Lawn area ÷ 1000 × Nitrogen per application</code> — the form to use when Lawn area and Nitrogen per application are the values you have.</li><li><strong>Nitrogen over a season</strong> = <code>Nitrogen per application × 4</code> — the form to use when Nitrogen per application are the values you have.</li></ul><p>Any one of Product per 1 000 ft², Product needed and Bags needed can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Lawn area from 5000 to 10000, leaving every other box alone. The panel moves from <strong>Product per 1 000 ft²</strong> 4.17 lb, <strong>Product needed</strong> 20.83 lb, <strong>Bags needed</strong> 0.4167, <strong>Nitrogen applied overall</strong> 5 lb and <strong>Nitrogen over a season</strong> 4 lb/1000 ft² to <strong>Product per 1 000 ft²</strong> 4.17 lb, <strong>Product needed</strong> 41.67 lb, <strong>Bags needed</strong> 0.8333, <strong>Nitrogen applied overall</strong> 10 lb and <strong>Nitrogen over a season</strong> 4 lb/1000 ft².</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Product needed, Bags needed and Nitrogen applied overall are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Lawn area left as a guess.</strong> Anything typed into Lawn area is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Nitrogen per application left as a guess.</strong> Anything typed into Nitrogen per application is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Nitrogen in the product left as a guess.</strong> Anything typed into Nitrogen in the product is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Lawn area and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Lawn Fertilizer Rate form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Lawn area</strong> is measured in ft². 1 000 ft² is about 93 m². The page reads it when it works out Product needed, Bags needed and Nitrogen applied overall. Fill it from a measurement rather than a memory — Lawn area is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Nitrogen per application</strong> is measured in lb N/1000 ft². 0.5–1 for most cool-season turf. The page reads it when it works out Product per 1 000 ft², Product needed and Bags needed. Fill it from a measurement rather than a memory — Nitrogen per application is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Nitrogen in the product</strong> is measured in %. The first number on the bag, e.g. 24-0-11. The page reads it when it works out Product per 1 000 ft², Product needed and Bags needed. Fill it from a measurement rather than a memory — Nitrogen in the product is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Bag size</strong> is measured in lb. The page reads it when it works out Bags needed. Fill it from a measurement rather than a memory — Bag size is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 5 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Product needed</strong> is a plain number and the page's own defaults put it at 20.83. It is computed from Lawn area, Nitrogen per application and Nitrogen in the product, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Bags needed</strong> is a plain number and the page's own defaults put it at 0.4167. It is computed from Lawn area, Nitrogen per application, Nitrogen in the product and Bag size, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Nitrogen applied overall</strong> is a plain number and the page's own defaults put it at 5. It is computed from Lawn area and Nitrogen per application, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Product per 1 000 ft²</strong> is a plain number and the page's own defaults put it at 4.17. It is computed from Nitrogen per application and Nitrogen in the product, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Nitrogen over a season</strong> is a plain number and the page's own defaults put it at 4. It is computed from Nitrogen per application, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Product per 1 000 ft²</th><th>Product needed</th><th>Bags needed</th><th>Nitrogen applied overall</th><th>Nitrogen over a season</th></tr></thead><tbody><tr><td><strong>Lawn area</strong> +10%</td><td>+0%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+0%</td></tr><tr><td><strong>Nitrogen per application</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>Nitrogen in the product</strong> +10%</td><td>-9.09%</td><td>-9.09%</td><td>-9.09%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Bag size</strong> +10%</td><td>+0%</td><td>+0%</td><td>-9.09%</td><td>+0%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Nitrogen per application: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Lawn area = 2500 ft², Nitrogen per application = 0.5 lb N/1000 ft², Nitrogen in the product = 12 % and Bag size = 25 lb and the page reports <strong>Product per 1 000 ft²</strong> = 4.17 lb, <strong>Product needed</strong> = 10.42 lb, <strong>Bags needed</strong> = 0.4167, <strong>Nitrogen applied overall</strong> = 1.25 lb and <strong>Nitrogen over a season</strong> = 2 lb/1000 ft².</li><li>Feed in Lawn area = 15000 ft², Nitrogen per application = 1 lb N/1000 ft², Nitrogen in the product = 24 % and Bag size = 50 lb and the page reports <strong>Product per 1 000 ft²</strong> = 4.17 lb, <strong>Product needed</strong> = 62.5 lb, <strong>Bags needed</strong> = 1.25, <strong>Nitrogen applied overall</strong> = 15 lb and <strong>Nitrogen over a season</strong> = 4 lb/1000 ft².</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Product needed is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Lawn area, Nitrogen per application and Nitrogen in the product measured, Product needed and Bags needed wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/pcr-primer-stats">PCR Primer Stats Calculator</a>, <a href="/biology/pedigree-probability">Pedigree Probability Calculator</a> and <a href="/biology/percent-germination">Percent Germination Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Lawn Fertilizer Rate calculator work out?', 'a' => <<<'TXT'
            Product needed, Bags needed, Nitrogen applied overall and Product per 1 000 ft², from Nitrogen per application and Nitrogen in the product. The relationship is Product per 1 000 ft² = Nitrogen per application ÷ (Nitrogen in the product ÷ 100).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Lawn area (ft²), Nitrogen per application (lb N/1000 ft²), Nitrogen in the product (%), Bag size (lb). Enter lawn area, nitrogen per application and nitrogen in the product; Product needed is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Product per 1 000 ft², Product needed, Bags needed and Nitrogen applied overall blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Product per 1 000 ft² = 4.17 lb, Product needed = 20.83 lb, Bags needed = 0.4167, Nitrogen applied overall = 5 lb and Nitrogen over a season = 4 lb/1000 ft². Those are the defaults written into the form — move Lawn area and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Product needed is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Lawn area blank and the page solves for it, reporting Product needed instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Product needed keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/pcr-primer-stats', 'name' => 'PCR Primer Stats Calculator'],
            ['path' => '/biology/pedigree-probability', 'name' => 'Pedigree Probability Calculator'],
            ['path' => '/biology/percent-germination', 'name' => 'Percent Germination Calculator'],
        ],
        'authors' => [],
    ],
];
