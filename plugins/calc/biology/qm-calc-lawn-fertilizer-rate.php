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
    'meta' => ['title' => 'Lawn Fertilizer Rate Calculator — Formula & Results', 'description' => 'Enter Lawn area, Nitrogen per application and Nitrogen in the product into Lawn Fertilizer Rate and the answer comes back as Product needed and Bags needed.', 'h1' => 'Lawn Fertilizer Rate Calculator', 'updated' => '2026-10-29'],
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
        Enter Lawn area, Nitrogen per application and Nitrogen in the product into Lawn Fertilizer Rate and the answer comes back as Product needed and Bags needed. It is a single relationship that reads Product needed out of Lawn area, not a table of canned results keyed by them. Units for Product needed default to lb and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Lawn Fertilizer Rate calculator works', 'html' => <<<'TXT'
            <p>Lawn Fertilizer Rate answers one question from 4 numbers, and the answer is Product needed, Bags needed and Nitrogen applied overall.</p><p>The relationship it solves reads Product per 1 000 ft² = Nitrogen per application ÷ (Nitrogen in the product ÷ 100).</p><p>What comes back is Product needed, Bags needed, Nitrogen applied overall and Product per 1 000 ft² — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>Lawn area</strong> — in ft². 1 000 ft² is about 93 m²</li><li><strong>Nitrogen per application</strong> — in lb N/1000 ft². 0.5–1 for most cool-season turf</li><li><strong>Nitrogen in the product</strong> — in %. The first number on the bag, e.g. 24-0-11</li><li><strong>Bag size</strong> — in lb</li></ul><p>The answers come back as Product needed in lb, Bags needed, Nitrogen applied overall in lb, Product per 1 000 ft² in lb, Nitrogen over a season in lb/1000 ft². </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Lawn area = 5000 ft², Nitrogen per application = 1 lb N/1000 ft², Nitrogen in the product = 24 % and Bag size = 50 lb — through the same formula and the panel reports &lt;strong&gt;Product per 1 000 ft²&lt;/strong&gt; = 4.17 lb, &lt;strong&gt;Product needed&lt;/strong&gt; = 20.83 lb, &lt;strong&gt;Bags needed&lt;/strong&gt; = 0.4167, &lt;strong&gt;Nitrogen applied overall&lt;/strong&gt; = 5 lb and &lt;strong&gt;Nitrogen over a season&lt;/strong&gt; = 4 lb/1000 ft².</p><ul><li><strong>Product per 1 000 ft²</strong> = 4.17 lb</li><li><strong>Product needed</strong> = 20.83 lb</li><li><strong>Bags needed</strong> = 0.4167</li><li><strong>Nitrogen applied overall</strong> = 5 lb</li><li><strong>Nitrogen over a season</strong> = 4 lb/1000 ft²</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Product per 1 000 ft²</strong> = <code>Nitrogen per application ÷ (Nitrogen in the product ÷ 100)</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Product per 1 000 ft²&lt;/strong&gt; = 4.17, &lt;strong&gt;Product needed&lt;/strong&gt; = 20.83, &lt;strong&gt;Bags needed&lt;/strong&gt; = 0.4167, &lt;strong&gt;Nitrogen applied overall&lt;/strong&gt; = 5 and &lt;strong&gt;Nitrogen over a season&lt;/strong&gt; = 4. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Product needed is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Product per 1 000 ft²</strong> = <code>Nitrogen per application ÷ (Nitrogen in the product ÷ 100)</code></li><li><strong>Product needed</strong> = <code>Lawn area ÷ 1000 × Nitrogen per application ÷ (Nitrogen in the product ÷ 100)</code></li><li><strong>Bags needed</strong> = <code>Lawn area ÷ 1000 × Nitrogen per application ÷ (Nitrogen in the product ÷ 100) ÷ Bag size</code></li><li><strong>Nitrogen applied overall</strong> = <code>Lawn area ÷ 1000 × Nitrogen per application</code></li><li><strong>Nitrogen over a season</strong> = <code>Nitrogen per application × 4</code></li></ul><p>Any one of Product per 1 000 ft², Product needed and Bags needed can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Lawn area from 5000 to 10000, leaving every other box alone. The panel moves from &lt;strong&gt;Product per 1 000 ft²&lt;/strong&gt; 4.17 lb, &lt;strong&gt;Product needed&lt;/strong&gt; 20.83 lb, &lt;strong&gt;Bags needed&lt;/strong&gt; 0.4167, &lt;strong&gt;Nitrogen applied overall&lt;/strong&gt; 5 lb and &lt;strong&gt;Nitrogen over a season&lt;/strong&gt; 4 lb/1000 ft² to &lt;strong&gt;Product per 1 000 ft²&lt;/strong&gt; 4.17 lb, &lt;strong&gt;Product needed&lt;/strong&gt; 41.67 lb, &lt;strong&gt;Bags needed&lt;/strong&gt; 0.8333, &lt;strong&gt;Nitrogen applied overall&lt;/strong&gt; 10 lb and &lt;strong&gt;Nitrogen over a season&lt;/strong&gt; 4 lb/1000 ft².</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Product needed, Bags needed and Nitrogen applied overall are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Lawn area and let the panel round the answer once.</li></ul>
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
            Lawn area (ft²), Nitrogen per application (lb N/1000 ft²), Nitrogen in the product (%), Bag size (lb). Enter area, n_rate and n_pct; Product needed is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Product per 1 000 ft², Product needed, Bags needed and Nitrogen applied overall blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Product per 1 000 ft² = 4.17 lb, Product needed = 20.83 lb, Bags needed = 0.4167, Nitrogen applied overall = 5 lb and Nitrogen over a season = 4 lb/1000 ft². Those are the defaults written into the form — move Lawn area and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Product needed is not rounded at all; the figure you read is formatted for legibility.'],
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
