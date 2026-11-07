<?php

/**
 * Sulfur Soil Acidifier Calculator
 * /biology/sulfur-soil-acidifier
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Sulfur Soil Acidifier Calculator',
    'meta' => ['title' => 'Sulfur Soil Acidifier Calculator — Formula & Results', 'description' => 'Elemental sulfur is how you lower soil pH without adding salt: soil bacteria oxidise it to sulfuric acid, which acidifies the soil over several months.', 'h1' => 'Sulfur Soil Acidifier Calculator', 'updated' => '2026-10-29'],
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
                            'label' => 'Area',
                            'type' => 'number',
                            'suffix' => 'm²',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '100',
                        ],
                        [
                            'name' => 'ph_now',
                            'label' => 'Current pH',
                            'type' => 'number',
                            'suffix' => 'pH',
                            'help' => 'From a soil test',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '7.5',
                        ],
                        [
                            'name' => 'ph_target',
                            'label' => 'Target pH',
                            'type' => 'number',
                            'suffix' => 'pH',
                            'help' => 'Blueberries want 4.5–5.5, most vegetables 6–7',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '6.5',
                        ],
                        [
                            'name' => 'texture',
                            'label' => 'Soil texture',
                            'type' => 'select',
                            'options' => ['Sand' => '0.5', 'Loam' => '1', 'Clay' => '1.5'],
                            'help' => 'Multiplier on the base rate',
                            'default' => 'Loam',
                        ],
                        [
                            'name' => 'sulfur_kg',
                            'label' => 'Elemental sulfur',
                            'type' => 'number',
                            'suffix' => 'kg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'sulfur_kg_100',
                            'label' => 'Sulfur per 100 m²',
                            'type' => 'number',
                            'suffix' => 'kg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'sulfur_lb_1000',
                            'label' => 'Sulfur per 1 000 ft²',
                            'type' => 'number',
                            'suffix' => 'lb',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'months',
                            'label' => 'Time to take effect',
                            'type' => 'number',
                            'suffix' => 'months',
                            'help' => 'Sulfur needs warm, moist soil to oxidise',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ph_drop',
                            'label' => 'pH change',
                            'type' => 'number',
                            'suffix' => 'units',
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
            'title' => 'Sulfur',
            'results' => [
                'ph_drop' => 'ph_now-ph_target',
                'sulfur_kg' => 'area*(ph_now-ph_target)*texture*0.2',
                'sulfur_kg_100' => '(ph_now-ph_target)*texture*0.2*100',
                'sulfur_lb_1000' => '(ph_now-ph_target)*texture*0.2*9.29*10.7639/10',
                'months' => '(ph_now-ph_target)*texture*3',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Elemental sulfur is how you lower soil pH without adding salt: soil bacteria oxidise it to sulfuric acid, which acidifies the soil over several months. It returns pH change, elemental sulfur, sulfur per 100 m² and sulfur per 1 000 ft², and the panel shows all of them at once.
        
        The amount depends on how far the pH has to fall and on the texture — a sand needs a third of what a clay needs for the same change.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Sulfur Soil Acidifier', 'html' => <<<'TXT'
            <p>Sulfur (kg) ≈ area (m²) × ΔpH × texture factor × 0.2. One pH unit on a loam takes about 20 kg per 100 m² (≈ 4 lb per 100 ft²)</p>
            <figure class="calc-figure"><img src="/uploads/biology/sulfur-soil-acidifier.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Sulfur Soil Acidifier Calculator — Sulfur to lower pH by one unit, by texture (kg per 100 m²)" title="Sulfur Soil Acidifier Calculator"><figcaption>Sulfur to lower pH by one unit, by texture (kg per 100 m²)</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>ΔpH</code></td><td>how many pH units you need to come down</td><td>—</td></tr><tr><td><code>S⁰</code></td><td>elemental sulfur, oxidised by soil bacteria to sulfuric acid</td><td>—</td></tr><tr><td><code>texture factor</code></td><td>0.5 for sand, 1 for loam, 1.5 for clay — clay buffers more</td><td>—</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Sulfur Soil Acidifier?', 'html' => <<<'TXT'
            <ol><li>Enter the area and the pH from your soil test, plus the pH you want.</li><li>Choose the texture; clay needs the most sulfur, sand the least.</li><li>The sulfur to apply is given in kilograms and in pounds per 1 000 ft², with the months it will take.</li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: area of <strong>100</strong> m², current ph of <strong>7.5</strong> pH, target ph of <strong>6.5</strong> pH, soil texture set to <strong>1.0</strong>.</p>
            <p>Substituting them into the formula gives ph change of <strong>1</strong> units, elemental sulfur of <strong>20</strong> kg, sulfur per 100 m² of <strong>20</strong> kg, sulfur per 1 000 ft² of <strong>2</strong> lb, time to take effect of <strong>3</strong> months.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> These are the bands most often used when the result is quoted in a paper, a report or a label:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>under 0.5 unit</td><td><strong>Trim</strong></td><td>0.5–1 kg per 10 m² on a loam</td></tr><tr><td>0.5 – 1 unit</td><td><strong>Typical</strong></td><td>apply in autumn so winter rain works it in</td></tr><tr><td>over 1.5 units</td><td><strong>Large change</strong></td><td>split over two years and retest between</td></tr></tbody></table>
            <ul><li><p>Sulfur is slow: the bacteria need warm, moist, aerated soil and it can take six months to a year. For a fast change use aluminium sulfate or a pH-adjusted mix, at the cost of adding salts.</p></li><li><p>Never change pH by more than about one unit in a single season — the shift is uneven and the plants in the patch get shocked.</p></li><li><p>Sulfur does not move far in soil. Incorporate it into the root zone rather than spreading it on the surface.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Expecting a pH change within a week — elemental sulfur needs microbial oxidation.</li><li>Using lime to raise pH and sulfur to lower it on the same bed in one season.</li><li>Applying sulfur to dry soil in a cold month, where the bacteria do nothing at all.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'How long does elemental sulfur take to lower pH?', 'a' => 'Three to twelve months, depending on temperature, moisture and how finely ground it is.'],
            ['q' => 'How much sulfur to lower pH by one unit?', 'a' => 'About 20 kg per 100 m² on a loam, roughly half that on sand and one and a half times on clay.'],
            ['q' => 'Is aluminum sulfate better?', 'a' => 'It acts within weeks, but adds aluminium and salt; sulfur is gentler and slower.'],
            ['q' => 'What does the Sulfur Soil Acidifier actually calculate?', 'a' => <<<'TXT'
            It returns pH change, elemental sulfur, sulfur per 100 m² and sulfur per 1 000 ft². Each one is derived by the formula on this page, so you can check any figure by hand.
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
