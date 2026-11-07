<?php

/**
 * NPK Fertilizer Blend Calculator
 * /biology/npk-fertilizer-blend
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'NPK Fertilizer Blend Calculator',
    'meta' => ['title' => 'NPK Fertilizer Blend Calculator — Formula & Results', 'description' => <<<'TXT'
    A fertilizer grade such as 20-10-10 tells you the percentage of nitrogen, phosphate and potash by weight — not the mass to spread. It returns product to apply…
    TXT, 'h1' => 'NPK Fertilizer Blend Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'n_need',
                            'label' => 'Nitrogen required',
                            'type' => 'number',
                            'suffix' => 'kg/ha',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '120',
                        ],
                        [
                            'name' => 'p_need',
                            'label' => 'Phosphate required (P₂O₅)',
                            'type' => 'number',
                            'suffix' => 'kg/ha',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '60',
                        ],
                        [
                            'name' => 'k_need',
                            'label' => 'Potash required (K₂O)',
                            'type' => 'number',
                            'suffix' => 'kg/ha',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '60',
                        ],
                        [
                            'name' => 'n_pct',
                            'label' => 'N in the product',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                        [
                            'name' => 'p_pct',
                            'label' => 'P₂O₅ in the product',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'k_pct',
                            'label' => 'K₂O in the product',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'rate',
                            'label' => 'Product to apply (limited by N)',
                            'type' => 'number',
                            'suffix' => 'kg/ha',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'rate_p',
                            'label' => 'Product limited by P',
                            'type' => 'number',
                            'suffix' => 'kg/ha',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'rate_k',
                            'label' => 'Product limited by K',
                            'type' => 'number',
                            'suffix' => 'kg/ha',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'bag',
                            'label' => 'Bags of 50 kg per hectare',
                            'type' => 'number',
                            'suffix' => 'bags',
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
            'title' => 'Blend',
            'results' => ['rate' => 'n_need/n_pct*100', 'rate_p' => 'p_need/p_pct*100', 'rate_k' => 'k_need/k_pct*100', 'bag' => 'n_need/n_pct*100/50'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        A fertilizer grade such as 20-10-10 tells you the percentage of nitrogen, phosphate and potash by weight — not the mass to spread. It returns product to apply (limited by N), product limited by P, product limited by K and bags of 50 kg per hectare, and the panel shows all of them at once.
        
        This calculator converts a nutrient requirement into kilograms of product per hectare and the fill weight for a spreader.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the NPK Fertilizer Blend', 'html' => <<<'TXT'
            <p>Product (kg/ha) = nutrient required ÷ percentage in the product × 100</p>
            <figure class="calc-figure"><img src="/uploads/biology/npk-fertilizer-blend.svg" width="720" height="300" loading="lazy" alt="Animated diagram: NPK Fertilizer Blend Calculator — Nutrient requirement against the product rate for each nutrient." title="NPK Fertilizer Blend Calculator"><figcaption>Nutrient requirement against the product rate for each nutrient.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>N, P₂O₅, K₂O</code></td><td>nutrient requirement</td><td>kg/ha</td></tr><tr><td><code>grade</code></td><td>percentage of each nutrient in the product</td><td>%</td></tr><tr><td><code>rate</code></td><td>product needed</td><td>kg/ha</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the NPK Fertilizer Blend?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: nitrogen required of <strong>120</strong> kg/ha, phosphate required (p₂o₅) of <strong>60</strong> kg/ha, potash required (k₂o) of <strong>60</strong> kg/ha, n in the product of <strong>20</strong>%, p₂o₅ in the product of <strong>10</strong>%, k₂o in the product of <strong>10</strong>%.</p>
            <p>Substituting them into the formula gives product to apply (limited by n) of <strong>600</strong> kg/ha, product limited by p of <strong>600</strong> kg/ha, product limited by k of <strong>600</strong> kg/ha, bags of 50 kg per hectare of <strong>12</strong> bags.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><p>The grade is by weight of N, P₂O₅ and K₂O — not elemental phosphorus and potassium. To convert, P₂O₅ × 0.44 = P and K₂O × 0.83 = K.</p></li><li><p>A single blend rarely matches all three requirements, so the product rate is set by the nutrient that runs out first and the rest is topped up with straight fertilizers.</p></li><li><p>Fertilizer grade percentages must sum to at most 100; a 20-10-10 blend is 40% nutrient and 60% carrier.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Treating P₂O₅ as elemental P, which overstates phosphate by a factor of 2.3.</li><li>Dividing by the grade instead of multiplying by 100 ÷ grade.</li><li>Ignoring the nutrient already in the soil test.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>If you need the rest of the working, these cover the adjacent quantities:</p><p><a href="/biology/fertilizer-injector-ratio">Fertilizer injector ratio</a>. <a href="/biology/lime-requirement">Lime requirement</a>. <a href="/biology/crop-water-requirement">Crop water requirement</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How much 20-10-10 gives 120 kg of nitrogen?', 'a' => '600 kg per hectare — 120 ÷ 0.20.'],
            ['q' => 'Why does the bag count differ from the rate?', 'a' => 'Because bags are sold in fixed weights; divide the rate by the bag weight.'],
            ['q' => 'What does the NPK Fertilizer Blend actually calculate?', 'a' => <<<'TXT'
            It returns product to apply (limited by N), product limited by P, product limited by K and bags of 50 kg per hectare. Each one is derived by the formula on this page, so you can check any figure by hand.
            TXT],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — and if you change an input, every result updates with it.
            TXT],
            ['q' => 'Why is the answer different from the one in my protocol?', 'a' => <<<'TXT'
            Nearly always a unit or a rounding difference. This calculator works in the units printed next to each box, keeps full precision internally and only rounds for display, so recomputing from the rounded numbers on screen can differ in the last digit.
            TXT],
            ['q' => 'Can I use it with the numbers straight from a datasheet?', 'a' => 'Yes. Every box states its unit, and nothing is converted behind your back, so a figure copied from a datasheet, a kit insert or a protocol goes in as printed.'],
        ],
        'related' => [],
    ],
];
