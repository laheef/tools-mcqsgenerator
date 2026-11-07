<?php

/**
 * Stems Per Hectare Calculator
 * /biology/stems-per-hectare
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Stems Per Hectare Calculator',
    'meta' => ['title' => 'Stems Per Hectare Calculator — Formula & Results', 'description' => 'Stem counts for plantations and cane: given the row and stool spacing and the share that survives, how many harvestable stems a hectare will carry.', 'h1' => 'Stems Per Hectare Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'area_ha',
                            'label' => 'Area',
                            'type' => 'number',
                            'suffix' => 'ha',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'row_m',
                            'label' => 'Row spacing',
                            'type' => 'number',
                            'suffix' => 'm',
                            'help' => 'Sugarcane: 1.4–1.8 m',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1.5',
                        ],
                        [
                            'name' => 'stool_m',
                            'label' => 'Spacing along the row',
                            'type' => 'number',
                            'suffix' => 'm',
                            'help' => 'Distance between planting setts',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.5',
                        ],
                        [
                            'name' => 'stems_per_stool',
                            'label' => 'Stems per stool',
                            'type' => 'number',
                            'help' => 'Tillering gives 5–10 in a good crop',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '6',
                        ],
                        [
                            'name' => 'survival',
                            'label' => 'Survival',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'Germination and overwintering losses',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '85',
                        ],
                        [
                            'name' => 'stools',
                            'label' => 'Stools per hectare',
                            'type' => 'number',
                            'suffix' => '/ha',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'stems',
                            'label' => 'Stems per hectare',
                            'type' => 'number',
                            'suffix' => '/ha',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'total_stems',
                            'label' => 'Stems on the area',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'stems_m2',
                            'label' => 'Stems per square metre',
                            'type' => 'number',
                            'suffix' => '/m²',
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
            'title' => 'Stems',
            'results' => ['stools' => '10000/(row_m*stool_m)', 'stems' => '10000/(row_m*stool_m)*stems_per_stool*survival/100', 'total_stems' => 'area_ha*10000/(row_m*stool_m)*stems_per_stool*survival/100', 'stems_m2' => '10000/(row_m*stool_m)*stems_per_stool*survival/100/10000'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Stem counts for plantations and cane: given the row and stool spacing and the share that survives, how many harvestable stems a hectare will carry. It returns stools per hectare, stems per hectare, stems on the area and stems per square metre, and the panel shows all of them at once.
        
        It is the population that sets the tonnage, so getting it right is the difference between a full cane crop and a thin one.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Stems Per Hectare', 'html' => <<<'TXT'
            <p>Stools/ha = 10 000 ÷ (row spacing × stool spacing). Stems/ha = stools/ha × stems per stool × survival</p>
            <figure class="calc-figure"><img src="/uploads/biology/stems-per-hectare.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Stems Per Hectare Calculator — Stems per hectare by spacing (6 stems per stool, 85% survival)" title="Stems Per Hectare Calculator"><figcaption>Stems per hectare by spacing (6 stems per stool, 85% survival)</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>stool</code></td><td>the planted sett and the tillers that grow from it</td><td>—</td></tr><tr><td><code>survival</code></td><td>share of stools that establish and overwinter</td><td>%</td></tr><tr><td><code>stems/ha</code></td><td>harvestable stalks per hectare</td><td>/ha</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Stems Per Hectare?', 'html' => <<<'TXT'
            <ol><li>Enter the row spacing and the spacing between stools along the row.</li><li>Enter how many harvestable stems a stool carries and the survival you expect.</li><li>The stool count, stem count and stems per square metre follow.</li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: area of <strong>1</strong> ha, row spacing of <strong>1.5</strong> m, spacing along the row of <strong>0.5</strong> m, stems per stool of <strong>6</strong>, survival of <strong>85</strong>%.</p>
            <p>Substituting them into the formula gives stools per hectare of <strong>13,333.33</strong> /ha, stems per hectare of <strong>68,000</strong> /ha, stems on the area of <strong>68,000</strong>, stems per square metre of <strong>6.8</strong> /m².</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> These are the bands most often used when the result is quoted in a paper, a report or a label:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>under 60 000/ha</td><td><strong>Thin</strong></td><td>a poor strike or wide rows; yield will disappoint</td></tr><tr><td>60 000 – 120 000/ha</td><td><strong>Normal cane</strong></td><td>a well-established commercial crop</td></tr><tr><td>over 150 000/ha</td><td><strong>Very dense</strong></td><td>lodging risk and thinner, lighter stalks</td></tr></tbody></table>
            <ul><li><p>Yields scale with stem number up to a point; after that the stalks compete and each one weighs less, so the tonnage levels off.</p></li><li><p>Sugarcane is counted in millable stalks, which excludes the small tillers that never mature — the survival figure should reflect that.</p></li><li><p>For a timber or biomass plantation, the same arithmetic works with stems per hectare as the planted density, before thinning.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Counting every tiller as a millable stalk and over-estimating the tonnage by a third.</li><li>Using the planted spacing without any survival figure, which assumes every sett establishes.</li><li>Comparing stem counts taken at different ages, before tillering has finished.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'How many sugarcane stalks per hectare?', 'a' => '60 000–120 000 millable stalks in a commercial crop.'],
            ['q' => 'How many stools per hectare at 1.5 × 0.5 m?', 'a' => 'About 13 300 — 10 000 ÷ 0.75.'],
            ['q' => 'Does more stems mean more sugar?', 'a' => 'Up to a point; excessive density lowers stalk weight and increases lodging.'],
            ['q' => 'What does the Stems Per Hectare actually calculate?', 'a' => <<<'TXT'
            It returns stools per hectare, stems per hectare, stems on the area and stems per square metre. Each one is derived by the formula on this page, so you can check any figure by hand.
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
