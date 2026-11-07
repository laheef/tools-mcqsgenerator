<?php

/**
 * Plants Per Hectare Calculator
 * /biology/plants-per-hectare
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Plants Per Hectare Calculator',
    'meta' => ['title' => 'Plants Per Hectare Calculator — Formula & Results', 'description' => 'How many plants fit in a field, from the spacing between rows and between plants. It returns space per plant, plants per hectare, plants needed and seedlings…', 'h1' => 'Plants Per Hectare Calculator', 'updated' => '2026-10-29'],
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
                            'label' => 'Area to plant',
                            'type' => 'number',
                            'suffix' => 'ha',
                            'help' => '1 hectare = 10 000 m²',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'row_cm',
                            'label' => 'Row spacing',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'help' => 'Distance between rows',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '75',
                        ],
                        [
                            'name' => 'plant_cm',
                            'label' => 'In-row spacing',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'help' => 'Distance between plants in a row',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '30',
                        ],
                        [
                            'name' => 'loss_pct',
                            'label' => 'Expected losses',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'Germination gaps, pest damage, headlands',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5',
                        ],
                        [
                            'name' => 'plants',
                            'label' => 'Plants needed',
                            'type' => 'number',
                            'help' => 'After losses',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'plants_per_ha',
                            'label' => 'Plants per hectare',
                            'type' => 'number',
                            'suffix' => '/ha',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'area_per_plant',
                            'label' => 'Space per plant',
                            'type' => 'number',
                            'suffix' => 'm²',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'seedlings',
                            'label' => 'Seedlings to buy',
                            'type' => 'number',
                            'help' => 'Plants plus losses, rounded up',
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
            'title' => 'Density',
            'results' => ['area_per_plant' => 'row_cm*plant_cm/10000', 'plants_per_ha' => '10000/(row_cm*plant_cm/10000)', 'plants' => 'area*10000/(row_cm*plant_cm/10000)*(1+loss_pct/100)', 'seedlings' => 'round(area*10000/(row_cm*plant_cm/10000)*(1+loss_pct/100))'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        How many plants fit in a field, from the spacing between rows and between plants. It returns space per plant, plants per hectare, plants needed and seedlings to buy, and the panel shows all of them at once.
        
        Ten thousand square metres divided by the area each plant occupies gives the population — the number every fertiliser rate, seed order and yield estimate is built on.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Plants Per Hectare', 'html' => <<<'TXT'
            <p>Plants per hectare = 10 000 ÷ (row spacing in m × in-row spacing in m). Total plants = area in ha × plants per hectare × (1 + losses)</p>
            <figure class="calc-figure"><img src="/uploads/biology/plants-per-hectare.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Plants Per Hectare Calculator — Plants per hectare as spacing widens" title="Plants Per Hectare Calculator"><figcaption>Plants per hectare as spacing widens</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>ha</code></td><td>hectare, 10 000 m²</td><td>m²</td></tr><tr><td><code>row spacing</code></td><td>distance between adjacent rows</td><td>cm</td></tr><tr><td><code>in-row spacing</code></td><td>distance between plants within a row</td><td>cm</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Plants Per Hectare?', 'html' => <<<'TXT'
            <ol><li>Enter the area in hectares (1 acre is 0.4047 ha).</li><li>Enter the row spacing and the in-row spacing in centimetres.</li><li>Add the losses you expect; the plants and seedlings to order are shown.</li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: area to plant of <strong>1</strong> ha, row spacing of <strong>75</strong> cm, in-row spacing of <strong>30</strong> cm, expected losses of <strong>5</strong>%.</p>
            <p>Substituting them into the formula gives space per plant of <strong>0.225</strong> m², plants per hectare of <strong>44,444.44</strong> /ha, plants needed of <strong>46,666.67</strong>, seedlings to buy of <strong>46,667</strong>.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> These are the bands most often used when the result is quoted in a paper, a report or a label:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>under 20 000/ha</td><td><strong>Wide spacing</strong></td><td>orchard trees, maize for silage, pumpkins</td></tr><tr><td>20 000 – 100 000/ha</td><td><strong>Field crops</strong></td><td>cereals, soybeans, potatoes</td></tr><tr><td>over 100 000/ha</td><td><strong>Dense</strong></td><td>leafy greens, carrots, transplants in beds</td></tr></tbody></table>
            <ul><li><p>Spacing sets the population, and population sets the yield curve. Doubling the density does not double the yield, because plants compete for the same light and water.</p></li><li><p>Buy 5–10% more seedlings than the calculated population. Transplant losses and headland waste are real, and a second order mid-season costs more than the surplus.</p></li><li><p>For beds rather than rows, use the bed spacing as the row spacing and count beds per hectare instead of rows.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Mixing centimetres and metres in the same calculation — the classic factor-of-100 error.</li><li>Forgetting the headland: a 1 ha field with a 3 m headland all round loses about 6% of its plantable area.</li><li>Planning the population for the seed packet's ideal spacing rather than your equipment's actual row width.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'How many plants per hectare at 75 × 30 cm?', 'a' => 'About 44 400 — 10 000 ÷ (0.75 × 0.30).'],
            ['q' => 'How do I convert plants per hectare to plants per acre?', 'a' => 'Multiply by 0.4047, since an acre is 0.4047 ha.'],
            ['q' => 'Should I add a margin for losses?', 'a' => 'Yes, 5–10% for field crops and more for transplants or direct-sown small seed.'],
            ['q' => 'What does the Plants Per Hectare actually calculate?', 'a' => <<<'TXT'
            It returns space per plant, plants per hectare, plants needed and seedlings to buy. Each one is derived by the formula on this page, so you can check any figure by hand.
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
