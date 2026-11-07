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
    'meta' => ['title' => 'Fruit Tree Spacing Calculator — Formula & Results', 'description' => 'Fruit Tree Spacing turns Orchard area, Between rows and Between trees in the row into Trees to plant and Trees per hectare. A result box can be typed into…', 'h1' => 'Fruit Tree Spacing Calculator', 'updated' => '2026-10-29'],
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
        Fruit Tree Spacing turns Orchard area, Between rows and Between trees in the row into Trees to plant and Trees per hectare. Nothing is looked up on this page: Trees to plant is computed from Orchard area and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Fruit Tree Spacing calculator works', 'html' => <<<'TXT'
            <p>The Fruit Tree Spacing calculator applies one relationship to 4 numbers and reports Trees to plant, Trees per hectare and Space per tree.</p><p>Written with the labels from the form, Space per tree = Between rows × Between trees in the row.</p><p>What comes back is Trees to plant, Trees per hectare, Space per tree and Trees of the main variety — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>Orchard area</strong> — in ha</li><li><strong>Between rows</strong> — in m. Usually 1.2–1.5 × the in-row spacing</li><li><strong>Between trees in the row</strong> — in m. 3 m for a dwarf on M9, 7 m on a seedling rootstock</li><li><strong>Pollinator rows</strong> — in %. Every fourth or fifth row, for cross-pollination</li></ul><p>The result boxes are Trees to plant, Trees per hectare in /ha, Space per tree in m², Trees of the main variety, Row spacing ÷ tree spacing; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Orchard area = 1 ha, Between rows = 4 m, Between trees in the row = 3 m and Pollinator rows = 20 %; the answers are &lt;strong&gt;Space per tree&lt;/strong&gt; = 12 m², &lt;strong&gt;Trees per hectare&lt;/strong&gt; = 833 /ha, &lt;strong&gt;Trees to plant&lt;/strong&gt; = 833, &lt;strong&gt;Trees of the main variety&lt;/strong&gt; = 667 and &lt;strong&gt;Row spacing ÷ tree spacing&lt;/strong&gt; = 1.33.</p><ul><li><strong>Space per tree</strong> = 12 m²</li><li><strong>Trees per hectare</strong> = 833 /ha</li><li><strong>Trees to plant</strong> = 833</li><li><strong>Trees of the main variety</strong> = 667</li><li><strong>Row spacing ÷ tree spacing</strong> = 1.33</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Space per tree</strong> = <code>Between rows × Between trees in the row</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Space per tree&lt;/strong&gt; = 12, &lt;strong&gt;Trees per hectare&lt;/strong&gt; = 833, &lt;strong&gt;Trees to plant&lt;/strong&gt; = 833, &lt;strong&gt;Trees of the main variety&lt;/strong&gt; = 667 and &lt;strong&gt;Row spacing ÷ tree spacing&lt;/strong&gt; = 1.33 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Trees to plant takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Space per tree</strong> = <code>Between rows × Between trees in the row</code></li><li><strong>Trees per hectare</strong> = <code>10000 ÷ (Between rows × Between trees in the row)</code></li><li><strong>Trees to plant</strong> = <code>Orchard area × 10000 ÷ (Between rows × Between trees in the row)</code></li><li><strong>Trees of the main variety</strong> = <code>Orchard area × 10000 ÷ (Between rows × Between trees in the row) × (1 − Pollinator rows ÷ 100)</code></li><li><strong>Row spacing ÷ tree spacing</strong> = <code>Between rows ÷ Between trees in the row</code></li></ul><p>Any one of Space per tree, Trees per hectare and Trees to plant can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Orchard area, from 1 to 2 — and the answers go from &lt;strong&gt;Space per tree&lt;/strong&gt; 12 m², &lt;strong&gt;Trees per hectare&lt;/strong&gt; 833 /ha, &lt;strong&gt;Trees to plant&lt;/strong&gt; 833, &lt;strong&gt;Trees of the main variety&lt;/strong&gt; 667 and &lt;strong&gt;Row spacing ÷ tree spacing&lt;/strong&gt; 1.33 to &lt;strong&gt;Space per tree&lt;/strong&gt; 12 m², &lt;strong&gt;Trees per hectare&lt;/strong&gt; 833 /ha, &lt;strong&gt;Trees to plant&lt;/strong&gt; 1667, &lt;strong&gt;Trees of the main variety&lt;/strong&gt; 1333 and &lt;strong&gt;Row spacing ÷ tree spacing&lt;/strong&gt; 1.33.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Trees to plant, Trees per hectare and Space per tree are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Orchard area and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Orchard area, Between rows and Between trees in the row and the number you are missing is Trees to plant and Trees per hectare.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/mark-recapture">Mark-Recapture Population Calculator</a>, <a href="/biology/mark-recapture-population">Mark–Recapture Population (Lincoln–Petersen) Calculator</a> and <a href="/biology/mass-molarity-conversion">Mass to Molarity Converter Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Fruit Tree Spacing calculator work out?', 'a' => <<<'TXT'
            Trees to plant, Trees per hectare, Space per tree and Trees of the main variety, from Between rows and Between trees in the row. The relationship is Space per tree = Between rows × Between trees in the row.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Orchard area (ha), Between rows (m), Between trees in the row (m), Pollinator rows (%). With area_ha, row_m and tree_m in place, Trees to plant can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Space per tree, Trees per hectare, Trees to plant and Trees of the main variety blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Space per tree = 12 m², Trees per hectare = 833 /ha, Trees to plant = 833, Trees of the main variety = 667 and Row spacing ÷ tree spacing = 1.33. The figures come from Orchard area as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Trees to plant is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Orchard area blank and the page solves for it, reporting Trees to plant instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Trees to plant keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/mark-recapture', 'name' => 'Mark-Recapture Population Calculator'],
            ['path' => '/biology/mark-recapture-population', 'name' => 'Mark–Recapture Population (Lincoln–Petersen) Calculator'],
            ['path' => '/biology/mass-molarity-conversion', 'name' => 'Mass to Molarity Converter Calculator'],
        ],
        'authors' => [],
    ],
];
