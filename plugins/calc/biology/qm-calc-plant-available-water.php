<?php

/**
 * Field Capacity and Plant Available Water Calculator
 * /biology/plant-available-water
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Field Capacity and Plant Available Water Calculator',
    'meta' => ['title' => 'Field Capacity and Plant Available Water Calculator', 'description' => 'Plant available water is what a soil holds between field capacity and the permanent wilting point. It returns plant available water, available water in the…', 'h1' => 'Field Capacity and Plant Available Water Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'fc',
                            'label' => 'Field capacity',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'Volumetric water content',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '32',
                        ],
                        [
                            'name' => 'pwp',
                            'label' => 'Permanent wilting point',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '15',
                        ],
                        [
                            'name' => 'depth',
                            'label' => 'Rooting depth',
                            'type' => 'number',
                            'suffix' => 'mm',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '600',
                        ],
                        [
                            'name' => 'current',
                            'label' => 'Current water content',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '24',
                        ],
                        [
                            'name' => 'paw',
                            'label' => 'Plant available water',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'paw_mm',
                            'label' => 'Available water in the root zone',
                            'type' => 'number',
                            'suffix' => 'mm',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'deficit',
                            'label' => 'Deficit to refill',
                            'type' => 'number',
                            'suffix' => 'mm',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'days',
                            'label' => 'Days until wilting at 5 mm/day',
                            'type' => 'number',
                            'suffix' => 'days',
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
            'title' => 'Water',
            'results' => ['paw' => 'fc-pwp', 'paw_mm' => '(fc-pwp)/100*depth', 'deficit' => '(fc-current)/100*depth', 'days' => '(current-pwp)/100*depth/5'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Plant available water is what a soil holds between field capacity and the permanent wilting point. It returns plant available water, available water in the root zone, deficit to refill and days until wilting at 5 mm/day, and the panel shows all of them at once.
        
        It decides how long a crop can go between irrigations, and it is one of the few soil properties worth measuring once because it barely changes.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Field Capacity and Plant Available Water', 'html' => <<<'TXT'
            <p>PAW (%) = FC − PWP; PAW (mm) = PAW% ÷ 100 × rooting depth</p>
            <figure class="calc-figure"><img src="/uploads/biology/plant-available-water.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Field Capacity and Plant Available Water Calculator — Saturation, field capacity, wilting point, and what roots can reach." title="Field Capacity and Plant Available Water Calculator"><figcaption>Saturation, field capacity, wilting point, and what roots can reach.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>FC</code></td><td>field capacity, volumetric</td><td>%</td></tr><tr><td><code>PWP</code></td><td>permanent wilting point, volumetric</td><td>%</td></tr><tr><td><code>PAW</code></td><td>plant available water</td><td>% or mm</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Field Capacity and Plant Available Water?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: field capacity of <strong>32</strong>%, permanent wilting point of <strong>15</strong>%, rooting depth of <strong>600</strong> mm, current water content of <strong>24</strong>%.</p>
            <p>Substituting them into the formula gives plant available water of <strong>17</strong>%, available water in the root zone of <strong>102</strong> mm, deficit to refill of <strong>48</strong> mm, days until wilting at 5 mm/day of <strong>10.8</strong> days.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>below 10%</td><td><strong>Low</strong></td><td>sand and gravel; irrigate little and often</td></tr><tr><td>10 – 20%</td><td><strong>Moderate</strong></td><td>sandy loam; the common middle ground</td></tr><tr><td>above 20%</td><td><strong>High</strong></td><td>clay loam and peat; long intervals between irrigations</td></tr></tbody></table>
            <ul><li><p>Sands hold little plant available water even though they drain freely; clays hold a lot but release it slowly.</p></li><li><p>The mm figure is what an irrigation schedule works in: 51 mm of available water at 5 mm/day is about ten days of buffer.</p></li><li><p>Field capacity and wilting point are measured on undisturbed cores — a texture class conversion is only a rough guide.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Using gravimetric water content as if it were volumetric.</li><li>Applying the same rooting depth to seedlings and mature plants.</li><li>Ignoring compaction, which cuts rooting depth far below the value in the table.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'How long can a crop go between irrigations?', 'a' => 'Divide the available water in the root zone by the daily crop water use.'],
            ['q' => 'Why does clay hold more water than sand but wilt sooner?', 'a' => 'Because much of the water in clay is held too tightly for roots to extract.'],
            ['q' => 'What does the Field Capacity and Plant Available Water actually calculate?', 'a' => <<<'TXT'
            It returns plant available water, available water in the root zone, deficit to refill and days until wilting at 5 mm/day. Each one is derived by the formula on this page, so you can check any figure by hand.
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
