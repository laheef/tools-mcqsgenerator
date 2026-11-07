<?php

/**
 * Compost Application Rate Calculator
 * /biology/compost-application-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Compost Application Rate Calculator',
    'meta' => ['title' => 'Compost Application Rate Calculator — Biology', 'description' => 'How much compost to spread, in cubic yards or tonnes, from the area and the depth you want. It returns volume, volume, mass and rate, and the panel shows all…', 'h1' => 'Compost Application Rate Calculator', 'updated' => '2026-10-29'],
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
                            'name' => 'depth_cm',
                            'label' => 'Depth',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'help' => '5–10 cm for a new bed, 1 cm for a lawn top-dressing',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5',
                        ],
                        [
                            'name' => 'density',
                            'label' => 'Bulk density of the compost',
                            'type' => 'number',
                            'suffix' => 't/m³',
                            'help' => '0.4 for strawy compost, 0.7 for a wet, heavy one',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.55',
                        ],
                        [
                            'name' => 'volume',
                            'label' => 'Volume',
                            'type' => 'number',
                            'suffix' => 'm³',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'cubic_yards',
                            'label' => 'Volume',
                            'type' => 'number',
                            'suffix' => 'yd³',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'tonnes',
                            'label' => 'Mass',
                            'type' => 'number',
                            'suffix' => 't',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_ha',
                            'label' => 'Rate',
                            'type' => 'number',
                            'suffix' => 't/ha',
                            'help' => 'Compare with 5–20 t/ha for field maintenance',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'cost',
                            'label' => 'Cost at 40 per tonne',
                            'type' => 'number',
                            'help' => 'Optional sanity check',
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
            'title' => 'Volume',
            'results' => [
                'volume' => 'area*depth_cm/100',
                'cubic_yards' => 'area*depth_cm/100*1.30795',
                'tonnes' => 'area*depth_cm/100*density',
                'per_ha' => 'area*depth_cm/100*density/area*10000',
                'cost' => 'area*depth_cm/100*density*40',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        How much compost to spread, in cubic yards or tonnes, from the area and the depth you want. It returns volume, volume, mass and rate, and the panel shows all of them at once.
        
        A garden bed usually takes 5–10 cm worked into the top 15 cm, a lawn a 1 cm top-dressing, and a farm a 5–20 tonne per hectare maintenance application.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Compost Application Rate', 'html' => <<<'TXT'
            <p>Volume (m³) = area (m²) × depth (m). Tonnes = volume × bulk density. 1 m³ = 1.308 cubic yards</p>
            <figure class="calc-figure"><img src="/uploads/biology/compost-application-rate.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Compost Application Rate Calculator — Compost for 100 m² at different depths (m³)" title="Compost Application Rate Calculator"><figcaption>Compost for 100 m² at different depths (m³)</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>bulk density</code></td><td>mass per cubic metre of loose compost, 0.4–0.7 t/m³</td><td>t/m³</td></tr><tr><td><code>depth</code></td><td>how thick the layer is spread</td><td>cm</td></tr><tr><td><code>t/ha</code></td><td>tonnes per hectare, the field-scale unit</td><td>t/ha</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Compost Application Rate?', 'html' => <<<'TXT'
            <ol><li>Enter the area you will cover in square metres.</li><li>Set the depth you want and, if you know it, the bulk density of your compost.</li><li>Read the volume in cubic metres and yards, and the mass in tonnes.</li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: area of <strong>100</strong> m², depth of <strong>5</strong> cm, bulk density of the compost of <strong>0.55</strong> t/m³.</p>
            <p>Substituting them into the formula gives volume of <strong>5</strong> m³, volume of <strong>6.54</strong> yd³, mass of <strong>2.75</strong> t, rate of <strong>275</strong> t/ha, cost at 40 per tonne of <strong>110</strong>.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> These are the bands most often used when the result is quoted in a paper, a report or a label:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>5 – 10 cm</td><td><strong>New bed</strong></td><td>worked into the top 15 cm to build organic matter</td></tr><tr><td>1 – 2 cm</td><td><strong>Lawn top-dressing</strong></td><td>applied in spring and brushed in</td></tr><tr><td>5 – 20 t/ha</td><td><strong>Field maintenance</strong></td><td>an annual or biennial application on arable land</td></tr></tbody></table>
            <ul><li><p>Compost is sold by volume and spread by mass, so the bulk density is the number that converts one to the other. It varies by a factor of two between a dry strawy compost and a wet, heavy one.</p></li><li><p>More is not better: above about 25 t/ha in one application, salt and phosphorus load can harm the soil and the water course.</p></li><li><p>Compost shrinks as it matures. A cubic metre delivered today can be 20% smaller in a month, which matters if you are ordering to a finished depth.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Ordering by weight when the supplier sells by the cubic yard, or the reverse.</li><li>Spreading fresh, immature compost, which ties up nitrogen as it finishes breaking down.</li><li>Assuming 1 m³ is 1 yard³ — it is 1.31 yard³, so a short order is a 24% shortfall.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'How many cubic yards is 1 m³ of compost?', 'a' => '1.31 cubic yards.'],
            ['q' => 'How deep should compost be on a new bed?', 'a' => '5–10 cm, mixed into the top 15 cm of soil.'],
            ['q' => 'How much does a cubic metre of compost weigh?', 'a' => 'About 550 kg, or 0.4–0.7 tonnes depending on moisture.'],
            ['q' => 'What does the Compost Application Rate actually calculate?', 'a' => 'It returns volume, volume, mass and rate. Each one is derived by the formula on this page, so you can check any figure by hand.'],
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
