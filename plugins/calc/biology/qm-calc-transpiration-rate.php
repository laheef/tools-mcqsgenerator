<?php

/**
 * Transpiration Rate Calculator
 * /biology/transpiration-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Transpiration Rate Calculator',
    'meta' => ['title' => 'Transpiration Rate Calculator — Formula & Results', 'description' => <<<'TXT'
    Transpiration is water lost through stomata, driven by the vapour pressure difference between leaf and air. It returns transpiration rate, daily water use per…
    TXT, 'h1' => 'Transpiration Rate Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'mass',
                            'label' => 'Mass lost',
                            'type' => 'number',
                            'suffix' => 'g',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2.4',
                        ],
                        [
                            'name' => 'area',
                            'label' => 'Leaf area',
                            'type' => 'number',
                            'suffix' => 'm²',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.015',
                        ],
                        [
                            'name' => 'minutes',
                            'label' => 'Duration',
                            'type' => 'number',
                            'suffix' => 'min',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '30',
                        ],
                        [
                            'name' => 'rate',
                            'label' => 'Transpiration rate',
                            'type' => 'number',
                            'suffix' => 'g/m²/h',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_day',
                            'label' => 'Daily water use per m² of leaf',
                            'type' => 'number',
                            'suffix' => 'L/m²/day',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'mmol',
                            'label' => 'Molar rate',
                            'type' => 'number',
                            'suffix' => 'mmol/m²/s',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'conductance',
                            'label' => 'Approximate stomatal conductance',
                            'type' => 'number',
                            'suffix' => 'mol/m²/s',
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
            'title' => 'Water loss',
            'results' => ['rate' => 'mass/area/(minutes/60)', 'per_day' => 'mass/area/(minutes/60)*12/1000', 'mmol' => 'mass/area/(minutes/60)/18/3.6', 'conductance' => 'mass/area/(minutes/60)/18/3.6/44'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Transpiration is water lost through stomata, driven by the vapour pressure difference between leaf and air. It returns transpiration rate, daily water use per m² of leaf, molar rate and approximate stomatal conductance, and the panel shows all of them at once.
        
        This calculator converts a measured loss into a rate per unit leaf area and a whole-plant water use, and links it to the water the roots must supply.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Transpiration Rate', 'html' => <<<'TXT'
            <p>Transpiration rate (g/m²/h) = mass lost ÷ leaf area ÷ time in hours</p>
            <figure class="calc-figure"><img src="/uploads/biology/transpiration-rate.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Transpiration Rate Calculator — Mass lost, leaf area and time to a transpiration rate." title="Transpiration Rate Calculator"><figcaption>Mass lost, leaf area and time to a transpiration rate.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>mass</code></td><td>water lost by the shoot</td><td>g</td></tr><tr><td><code>area</code></td><td>leaf area of the shoot</td><td>m²</td></tr><tr><td><code>rate</code></td><td>transpiration rate</td><td>g/m²/h</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Transpiration Rate?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: mass lost of <strong>2.4</strong> g, leaf area of <strong>0.015</strong> m², duration of <strong>30</strong> min.</p>
            <p>Substituting them into the formula gives transpiration rate of <strong>320</strong> g/m²/h, daily water use per m² of leaf of <strong>3.84</strong> L/m²/day, molar rate of <strong>4.94</strong> mmol/m²/s, approximate stomatal conductance of <strong>0.1122</strong> mol/m²/s.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>below 20 g/m²/h</td><td><strong>Low</strong></td><td>shade, high humidity or closed stomata</td></tr><tr><td>20 – 100</td><td><strong>Moderate</strong></td><td>typical glasshouse conditions</td></tr><tr><td>above 100</td><td><strong>High</strong></td><td>bright, dry, windy conditions</td></tr></tbody></table>
            <ul><li><p>Mass loss measured by weighing is total evapotranspiration from the shoot; a gas analyser measures the transpiration flux directly.</p></li><li><p>Water lost is water the roots must replace: at 1 L/m²/day a square metre of leaf needs about a litre a day, which scales quickly to whole-canopy irrigation.</p></li><li><p>Transpiration cools the leaf; a water-stressed leaf runs several degrees warmer, which is the principle behind thermal stress indices.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Weighing the pot rather than the shoot, so evaporation from the substrate is included.</li><li>Using leaf area measured on one side of the leaf when both are transpiring.</li><li>Reporting g/h without normalising to leaf area.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'How do I convert g/m²/h to mmol/m²/s?', 'a' => 'Divide by 18 (grams per mole of water) and by 3.6.'],
            ['q' => 'Why does transpiration matter for nutrient uptake?', 'a' => 'Because mass flow in the xylem is the main route by which nutrients reach the roots.'],
            ['q' => 'What does the Transpiration Rate actually calculate?', 'a' => <<<'TXT'
            It returns transpiration rate, daily water use per m² of leaf, molar rate and approximate stomatal conductance. Each one is derived by the formula on this page, so you can check any figure by hand.
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
