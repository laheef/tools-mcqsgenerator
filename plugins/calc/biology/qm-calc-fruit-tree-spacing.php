<?php

/**
 * Fruit Tree Spacing Calculator
 * /biology/fruit-tree-spacing
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Fruit Tree Spacing Calculator',
    'meta' => ['title' => 'Fruit Tree Spacing Calculator — Formula & Results', 'description' => 'How many fruit trees fit an orchard, and how far apart they should stand. It returns space per tree, trees per hectare, trees to plant and trees of the main…', 'h1' => 'Fruit Tree Spacing Calculator', 'updated' => '2026-10-29'],
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
                            'label' => 'Orchard area',
                            'type' => 'number',
                            'suffix' => 'ha',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'row_m',
                            'label' => 'Between rows',
                            'type' => 'number',
                            'suffix' => 'm',
                            'help' => 'Usually 1.2–1.5 × the in-row spacing',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '4',
                        ],
                        [
                            'name' => 'tree_m',
                            'label' => 'Between trees in the row',
                            'type' => 'number',
                            'suffix' => 'm',
                            'help' => '3 m for a dwarf on M9, 7 m on a seedling rootstock',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '3',
                        ],
                        [
                            'name' => 'pollinator_pct',
                            'label' => 'Pollinator rows',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'Every fourth or fifth row, for cross-pollination',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                        [
                            'name' => 'trees',
                            'label' => 'Trees to plant',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'trees_per_ha',
                            'label' => 'Trees per hectare',
                            'type' => 'number',
                            'suffix' => '/ha',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'spacing_m2',
                            'label' => 'Space per tree',
                            'type' => 'number',
                            'suffix' => 'm²',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'main_trees',
                            'label' => 'Trees of the main variety',
                            'type' => 'number',
                            'help' => 'After the pollinator rows',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'hedge_ratio',
                            'label' => 'Row spacing ÷ tree spacing',
                            'type' => 'number',
                            'help' => 'Around 1.25 for a modern hedge',
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
            'title' => 'Orchard',
            'results' => [
                'spacing_m2' => 'row_m*tree_m',
                'trees_per_ha' => '10000/(row_m*tree_m)',
                'trees' => 'area_ha*10000/(row_m*tree_m)',
                'main_trees' => 'area_ha*10000/(row_m*tree_m)*(1-pollinator_pct/100)',
                'hedge_ratio' => 'row_m/tree_m',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        How many fruit trees fit an orchard, and how far apart they should stand. It returns space per tree, trees per hectare, trees to plant and trees of the main variety, and the panel shows all of them at once.
        
        Spacing depends on the rootstock far more than on the variety: a dwarf apple on M9 wants 3 m between trees, the same variety on a seedling rootstock wants 8 m.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Fruit Tree Spacing', 'html' => <<<'TXT'
            <p>Trees per hectare = 10 000 ÷ (row spacing × in-row spacing). Trees to order = area in ha × trees per hectare</p>
            <figure class="calc-figure"><img src="/uploads/biology/fruit-tree-spacing.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Fruit Tree Spacing Calculator — Trees per hectare by rootstock vigour" title="Fruit Tree Spacing Calculator"><figcaption>Trees per hectare by rootstock vigour</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>rootstock</code></td><td>the root system a variety is grafted onto; it sets the tree's vigour</td><td>—</td></tr><tr><td><code>in-row spacing</code></td><td>distance between trees in the same row</td><td>m</td></tr><tr><td><code>hedge ratio</code></td><td>row spacing divided by tree spacing</td><td>—</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Fruit Tree Spacing?', 'html' => <<<'TXT'
            <ol><li>Enter the area you have available in hectares.</li><li>Choose the rootstock vigour — it sets the in-row spacing — and the row spacing your machinery needs.</li><li>The number of trees and the planting density follow.</li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: orchard area of <strong>1</strong> ha, between rows of <strong>4</strong> m, between trees in the row of <strong>3</strong> m, pollinator rows of <strong>20</strong>%.</p>
            <p>Substituting them into the formula gives space per tree of <strong>12</strong> m², trees per hectare of <strong>833.33</strong> /ha, trees to plant of <strong>833.33</strong>, trees of the main variety of <strong>666.67</strong>, row spacing ÷ tree spacing of <strong>1.33</strong>.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>1 000 – 1 500/ha</td><td><strong>Modern intensive</strong></td><td>dwarf trees on a trellis, 3 × 3.5 m</td></tr><tr><td>400 – 800/ha</td><td><strong>Semi-intensive</strong></td><td>M26 or MM106 at 4.5 × 5 m</td></tr><tr><td>100 – 250/ha</td><td><strong>Traditional standard</strong></td><td>seedling rootstock at 7 × 8 m</td></tr></tbody></table>
            <ul><li><p>Dwarf trees crop earlier and are picked from the ground; standard trees need ladders but live far longer. The choice is about labour, not just yield.</p></li><li><p>Pollination needs two different varieties that flower at the same time, and spacing must leave room for pollinator rows — often every fourth row.</p></li><li><p>The hedge ratio matters for light: keep the row spacing at roughly 1.25 times the tree height that the mature canopy will reach.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Using the variety's suggested spacing instead of the rootstock's, which is what actually determines vigour.</li><li>Planting too close for the machinery, then having to remove every third tree in year eight.</li><li>Forgetting that a windbreak costs the first and last rows some yield.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'How many apple trees per hectare?', 'a' => 'About 1 100 for dwarf trees at 3 × 3 m, or 250 for standards at 7 × 6 m.'],
            ['q' => 'What spacing do dwarf trees need?', 'a' => '3 m in the row and 3.5–4 m between rows, on a trellis.'],
            ['q' => 'Why keep pollinator rows?', 'a' => 'Most apple varieties are self-incompatible, so a different variety must flower at the same time within a bee\'s flight distance.'],
            ['q' => 'Why does row spacing exceed tree spacing?', 'a' => 'So light reaches the lower canopy and machinery can pass; the ratio is roughly 1.25.'],
            ['q' => 'What does the Fruit Tree Spacing actually calculate?', 'a' => <<<'TXT'
            It returns space per tree, trees per hectare, trees to plant and trees of the main variety. Each one is derived by the formula on this page, so you can check any figure by hand.
            TXT],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — and if you change an input, every result updates with it.
            TXT],
        ],
        'related' => [],
    ],
];
