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
    'meta' => ['title' => 'Lawn Fertilizer Rate Calculator — Formula & Results', 'description' => 'How much fertiliser to spread on a lawn, from the nitrogen rate you want and the analysis on the bag. It returns product per 1 000 ft², product needed, bags…', 'h1' => 'Lawn Fertilizer Rate Calculator', 'updated' => '2026-10-29'],
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
        How much fertiliser to spread on a lawn, from the nitrogen rate you want and the analysis on the bag. It returns product per 1 000 ft², product needed, bags needed and nitrogen applied overall, and the panel shows all of them at once.
        
        Turf wants about 0.5–1 lb of actual nitrogen per 1 000 ft² per application, and the bag's first number tells you how much product that is.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Lawn Fertilizer Rate', 'html' => <<<'TXT'
            <p>Product (lb) = area ÷ 1 000 × N rate ÷ (N% ÷ 100). A season of 2–4 lb N per 1 000 ft² is split across the growing season</p>
            <figure class="calc-figure"><img src="/uploads/biology/lawn-fertilizer-rate.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Lawn Fertilizer Rate Calculator — Product needed for 1 lb of nitrogen, by analysis" title="Lawn Fertilizer Rate Calculator"><figcaption>Product needed for 1 lb of nitrogen, by analysis</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>N rate</code></td><td>pounds of actual nitrogen per 1 000 square feet</td><td>lb/1000 ft²</td></tr><tr><td><code>N%</code></td><td>the first number in the fertiliser analysis, e.g. 24 in 24-0-11</td><td>%</td></tr><tr><td><code>1 000 ft²</code></td><td>about 93 m², the standard unit of turf recommendations</td><td>ft²</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Lawn Fertilizer Rate?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Measure the lawn area in square feet (an acre is 43 560 ft²).</li><li>Enter the nitrogen rate you want and the first number from the bag's analysis.</li><li>The pounds of product, the number of bags and the season's total nitrogen are shown.</li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: lawn area of <strong>5,000</strong> ft², nitrogen per application of <strong>1</strong> lb N/1000 ft², nitrogen in the product of <strong>24</strong>%, bag size of <strong>50</strong> lb.</p>
            <p>Substituting them into the formula gives product per 1 000 ft² of <strong>4.17</strong> lb, product needed of <strong>20.83</strong> lb, bags needed of <strong>0.4167</strong>, nitrogen applied overall of <strong>5</strong> lb, nitrogen over a season of <strong>4</strong> lb/1000 ft².</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> Here is the scale that goes with this one:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>0.5 lb N/1000 ft²</td><td><strong>Light</strong></td><td>shaded or low-maintenance turf</td></tr><tr><td>0.75 – 1 lb</td><td><strong>Standard</strong></td><td>the usual rate per application for a home lawn</td></tr><tr><td>over 1.5 lb</td><td><strong>Too much</strong></td><td>burn risk, thatch and runoff; split it into two applications</td></tr></tbody></table>
            <ul><li><p>The rate that matters is actual nitrogen, not product weight. A 24-0-11 bag delivers a quarter of its weight as nitrogen, which is why 1 lb of N needs about 4 lb of product.</p></li><li><p>Total seasonal nitrogen for cool-season grass is 2–4 lb per 1 000 ft², split into three or four applications; warm-season grass wants 2–3 lb.</p></li><li><p>Sweep anything that lands on paving back onto the lawn — nitrogen on hard surfaces goes straight to the storm drain.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Setting the spreader by product weight instead of nitrogen rate, which over-applies the cheap high-analysis products.</li><li>Applying a high-nitrogen product in midsummer heat, which burns the turf.</li><li>Feeding in late autumn in a cold climate, which feeds the snow mould rather than the grass.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>If you need the rest of the working, these cover the adjacent quantities:</p><p><a href="/biology/compost-application-rate">Compost application</a>. <a href="/biology/gypsum-application-rate">Gypsum application</a>. <a href="/biology/plants-per-hectare">Plants per hectare</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How much 24-0-11 do I need per 1 000 ft² for 1 lb of nitrogen?', 'a' => 'About 4.2 lb — divide 1 lb by 0.24.'],
            ['q' => 'How often should I fertilise a lawn?', 'a' => 'Three to four times a year for cool-season grass, at 0.5–1 lb N per 1 000 ft² each time.'],
            ['q' => 'Is more nitrogen better?', 'a' => 'No. Beyond about 1.5 lb per application the grass burns, thatch builds up and the surplus runs off.'],
            ['q' => 'What does the Lawn Fertilizer Rate actually calculate?', 'a' => <<<'TXT'
            It returns product per 1 000 ft², product needed, bags needed and nitrogen applied overall. Each one is derived by the formula on this page, so you can check any figure by hand.
            TXT],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — and if you change an input, every result updates with it.
            TXT],
            ['q' => 'Why is the answer different from the one in my protocol?', 'a' => <<<'TXT'
            Nearly always a unit or a rounding difference. This calculator works in the units printed next to each box, keeps full precision internally and only rounds for display, so recomputing from the rounded numbers on screen can differ in the last digit.
            TXT],
        ],
        'related' => [],
    ],
];
