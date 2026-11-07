<?php

/**
 * Pasture Stocking Rate Calculator
 * /biology/pasture-stocking-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Pasture Stocking Rate Calculator',
    'meta' => ['title' => 'Pasture Stocking Rate Calculator — Formula & Results', 'description' => 'Stocking rate is how many animals a paddock can carry without the grass running out before it regrows. It returns usable dry matter, animals carried…', 'h1' => 'Pasture Stocking Rate Calculator', 'updated' => '2026-10-29'],
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
                            'label' => 'Pasture area',
                            'type' => 'number',
                            'suffix' => 'ha',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'dm_yield',
                            'label' => 'Pasture dry-matter yield',
                            'type' => 'number',
                            'suffix' => 'kg/ha/yr',
                            'help' => 'Temperate pasture: 6,000–12,000',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '8000',
                        ],
                        [
                            'name' => 'use',
                            'label' => 'Utilisation',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'How much of the growth animals actually harvest',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '65',
                        ],
                        [
                            'name' => 'intake',
                            'label' => 'Daily dry-matter intake per animal',
                            'type' => 'number',
                            'suffix' => 'kg/day',
                            'help' => 'Cattle: 2–2.5% of body weight',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
                        ],
                        [
                            'name' => 'season',
                            'label' => 'Grazing days per year',
                            'type' => 'number',
                            'suffix' => 'days',
                            'help' => 'Days the animals are on pasture',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '220',
                        ],
                        [
                            'name' => 'capacity',
                            'label' => 'Animals carried',
                            'type' => 'number',
                            'suffix' => 'head',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'lu',
                            'label' => 'Livestock units (1 LU = 600 kg cow)',
                            'type' => 'number',
                            'suffix' => 'LU',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_head',
                            'label' => 'Pasture per animal',
                            'type' => 'number',
                            'suffix' => 'ha/head',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'dm_available',
                            'label' => 'Usable dry matter',
                            'type' => 'number',
                            'suffix' => 'kg',
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
            'title' => 'Stocking',
            'results' => [
                'dm_available' => 'area*dm_yield*use/100',
                'capacity' => 'area*dm_yield*use/100/(intake*season)',
                'lu' => 'area*dm_yield*use/100/(intake*season)',
                'per_head' => 'area/(area*dm_yield*use/100/(intake*season))',
                'area' => 'intake*season*capacity/(dm_yield*use/100)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Stocking rate is how many animals a paddock can carry without the grass running out before it regrows. It returns usable dry matter, animals carried, livestock units (1 LU = 600 kg cow) and pasture per animal, and the panel shows all of them at once.
        
        It balances pasture supply against intake and grazing efficiency, and gives both the stocking rate and the area each animal needs.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Pasture Stocking Rate', 'html' => <<<'TXT'
            <p>Animals = (area × yield × utilisation) ÷ (daily intake × grazing days)</p>
            <figure class="calc-figure"><img src="/uploads/biology/pasture-stocking-rate.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Pasture Stocking Rate Calculator — Grass grown, the share eaten, and the intake per animal set the stocking rate." title="Pasture Stocking Rate Calculator"><figcaption>Grass grown, the share eaten, and the intake per animal set the stocking rate.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>area</code></td><td>grazed area</td><td>ha</td></tr><tr><td><code>yield</code></td><td>annual dry-matter production</td><td>kg/ha</td></tr><tr><td><code>use</code></td><td>share of growth actually eaten</td><td>%</td></tr><tr><td><code>intake</code></td><td>dry matter eaten per animal per day</td><td>kg/day</td></tr><tr><td><code>season</code></td><td>grazing days</td><td>days</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Pasture Stocking Rate?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: pasture dry-matter yield of <strong>8,000</strong> kg/ha/yr, utilisation of <strong>65</strong>%, daily dry-matter intake per animal of <strong>12</strong> kg/day, grazing days per year of <strong>220</strong> days.</p>
            <p>Substituting them into the formula gives usable dry matter of <strong>52,000</strong> kg, animals carried of <strong>19.7</strong> head, livestock units (1 lu = 600 kg cow) of <strong>19.7</strong> LU, pasture per animal of <strong>0.5077</strong> ha/head, pasture area of <strong>10</strong> ha.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>0.8–1.5 LU/ha</td><td><strong>Extensive</strong></td><td>unimproved or dryland pasture</td></tr><tr><td>1.5–3 LU/ha</td><td><strong>Moderate</strong></td><td>improved temperate pasture</td></tr><tr><td>3–5 LU/ha</td><td><strong>Intensive</strong></td><td>high-rainfall or irrigated, rotational grazing</td></tr><tr><td>above 5 LU/ha</td><td><strong>Very intensive</strong></td><td>needs nitrogen, irrigation or supplementary feed</td></tr></tbody></table>
            <ul><li><p>Utilisation is the honest number in the equation: of the grass that grows, typically 50–70% can be eaten before the pasture is damaged.</p></li><li><p>Grazing days matters as much as yield — a pasture that is only grazed in summer carries more animals than the same pasture grazed all year.</p></li><li><p>Livestock units let you compare mixed herds: 1 LU is conventionally a 600 kg mature cow.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Using total grass growth as if all of it were available.</li><li>Forgetting that stock still need feed when the grass stops growing.</li><li>Comparing stocking rates without checking whether both are per hectare or per acre.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'How many cows per hectare?', 'a' => 'On improved temperate pasture, roughly 1.5–3 livestock units per hectare, which is 1.5–3 cows or several times that number of sheep.'],
            ['q' => 'What utilisation should I assume?', 'a' => '60–70% for rotational grazing, lower for continuous grazing.'],
            ['q' => 'What does the Pasture Stocking Rate actually calculate?', 'a' => <<<'TXT'
            It returns usable dry matter, animals carried, livestock units (1 LU = 600 kg cow) and pasture per animal. Each one is derived by the formula on this page, so you can check any figure by hand.
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
