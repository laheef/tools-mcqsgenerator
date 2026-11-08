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
    'meta' => ['title' => 'Fruit Tree Spacing Calculator: Units & Formula', 'description' => 'Fruit Tree Spacing Calculator turns orchard area, between rows and between trees in the row into trees to plant and trees per hectare. A worked example follows.', 'h1' => 'Fruit Tree Spacing Calculator', 'updated' => '2026-10-29'],
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
        Fruit Tree Spacing turns Orchard area, Between rows and Between trees in the row into Trees to plant and Trees per hectare. Nothing is looked up on this page: trees to plant is computed from orchard area and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Fruit Tree Spacing calculator works', 'html' => <<<'TXT'
            <p>The Fruit Tree Spacing calculator applies one relationship to 4 numbers and reports Trees to plant, Trees per hectare and Space per tree.</p><p>Written with the labels from the form, Space per tree = Between rows × Between trees in the row.</p><p>What comes back is Trees to plant, Trees per hectare, Space per tree and Trees of the main variety — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>Orchard area</strong> — in ha</li><li><strong>Between rows</strong> — in m. Usually 1.2–1.5 × the in-row spacing</li><li><strong>Between trees in the row</strong> — in m. 3 m for a dwarf on M9, 7 m on a seedling rootstock</li><li><strong>Pollinator rows</strong> — in %. Every fourth or fifth row, for cross-pollination</li></ul><p>The result boxes are Trees to plant, Trees per hectare in /ha, Space per tree in m², Trees of the main variety, Row spacing ÷ tree spacing; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Orchard area = 1 ha, Between rows = 4 m, Between trees in the row = 3 m and Pollinator rows = 20 %; the answers are <strong>Space per tree</strong> = 12 m², <strong>Trees per hectare</strong> = 833 /ha, <strong>Trees to plant</strong> = 833, <strong>Trees of the main variety</strong> = 667 and <strong>Row spacing ÷ tree spacing</strong> = 1.33.</p><ul><li><strong>Space per tree</strong> = 12 m²</li><li><strong>Trees per hectare</strong> = 833 /ha</li><li><strong>Trees to plant</strong> = 833</li><li><strong>Trees of the main variety</strong> = 667</li><li><strong>Row spacing ÷ tree spacing</strong> = 1.33</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Space per tree</strong> = <code>Between rows × Between trees in the row</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Space per tree</strong> = 12, <strong>Trees per hectare</strong> = 833, <strong>Trees to plant</strong> = 833, <strong>Trees of the main variety</strong> = 667 and <strong>Row spacing ÷ tree spacing</strong> = 1.33 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Trees to plant takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Space per tree</strong> = <code>Between rows × Between trees in the row</code></li><li><strong>Trees per hectare</strong> = <code>10000 ÷ (Between rows × Between trees in the row)</code></li><li><strong>Trees to plant</strong> = <code>Orchard area × 10000 ÷ (Between rows × Between trees in the row)</code></li><li><strong>Trees of the main variety</strong> = <code>Orchard area × 10000 ÷ (Between rows × Between trees in the row) × (1 − Pollinator rows ÷ 100)</code></li><li><strong>Row spacing ÷ tree spacing</strong> = <code>Between rows ÷ Between trees in the row</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Space per tree</strong> = <code>Between rows × Between trees in the row</code> — the form to use when Between rows and Between trees in the row are the values you have.</li><li><strong>Trees per hectare</strong> = <code>10000 ÷ (Between rows × Between trees in the row)</code> — the form to use when Between rows and Between trees in the row are the values you have.</li><li><strong>Trees to plant</strong> = <code>Orchard area × 10000 ÷ (Between rows × Between trees in the row)</code> — the form to use when Orchard area, Between rows and Between trees in the row are the values you have.</li><li><strong>Trees of the main variety</strong> = <code>Orchard area × 10000 ÷ (Between rows × Between trees in the row) × (1 − Pollinator rows ÷ 100)</code> — the form to use when Orchard area, Between rows, Between trees in the row and Pollinator rows are the values you have.</li><li><strong>Row spacing ÷ tree spacing</strong> = <code>Between rows ÷ Between trees in the row</code> — the form to use when Between rows and Between trees in the row are the values you have.</li></ul><p>Any one of Space per tree, Trees per hectare and Trees to plant can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Orchard area, from 1 to 2 — and the answers go from <strong>Space per tree</strong> 12 m², <strong>Trees per hectare</strong> 833 /ha, <strong>Trees to plant</strong> 833, <strong>Trees of the main variety</strong> 667 and <strong>Row spacing ÷ tree spacing</strong> 1.33 to <strong>Space per tree</strong> 12 m², <strong>Trees per hectare</strong> 833 /ha, <strong>Trees to plant</strong> 1667, <strong>Trees of the main variety</strong> 1333 and <strong>Row spacing ÷ tree spacing</strong> 1.33.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box cannot be typed into: the results are worked out from the inputs above, and a past answer has to be entered as one of those inputs instead.</li><li><strong>Orchard area left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Orchard area is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Between rows left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Between rows is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Between trees in the row left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Between trees in the row is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Orchard area and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Fruit Tree Spacing form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Orchard area</strong> is measured in ha. It feeds Trees to plant and Trees of the main variety. Fill it from a measurement rather than a memory — Orchard area is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Between rows</strong> is measured in m. Usually 1.2–1.5 × the in-row spacing. It feeds Space per tree, Trees per hectare and Trees to plant. Fill it from a measurement rather than a memory — Between rows is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Between trees in the row</strong> is measured in m. 3 m for a dwarf on M9, 7 m on a seedling rootstock. It feeds Space per tree, Trees per hectare and Trees to plant. Fill it from a measurement rather than a memory — Between trees in the row is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Pollinator rows</strong> is measured in %. Every fourth or fifth row, for cross-pollination. It feeds Trees of the main variety. Fill it from a measurement rather than a memory — Pollinator rows is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 5 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Trees to plant</strong> is a plain number and the page's own defaults put it at 833. It is worked out from Orchard area, Between rows and Between trees in the row. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Trees per hectare</strong> is a plain number and the page's own defaults put it at 833. It is worked out from Between rows and Between trees in the row. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Space per tree</strong> is a plain number and the page's own defaults put it at 12. It is worked out from Between rows and Between trees in the row. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Trees of the main variety</strong> is a plain number and the page's own defaults put it at 667. It is worked out from Orchard area, Between rows, Between trees in the row and Pollinator rows. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Row spacing ÷ tree spacing</strong> is a plain number and the page's own defaults put it at 1.33. It is worked out from Between rows and Between trees in the row. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Space per tree</th><th>Trees per hectare</th><th>Trees to plant</th><th>Trees of the main variety</th><th>Row spacing ÷ tree spacing</th></tr></thead><tbody><tr><td><strong>Orchard area</strong> +10%</td><td>+0%</td><td>+0%</td><td>+10%</td><td>+10%</td><td>+0%</td></tr><tr><td><strong>Between rows</strong> +10%</td><td>+10%</td><td>-9.09%</td><td>-9.09%</td><td>-9.09%</td><td>+10%</td></tr><tr><td><strong>Between trees in the row</strong> +10%</td><td>+10%</td><td>-9.09%</td><td>-9.09%</td><td>-9.09%</td><td>-9.09%</td></tr><tr><td><strong>Pollinator rows</strong> +10%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>-2.5%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Between rows sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Trees to plant follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
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
            Orchard area (ha), Between rows (m), Between trees in the row (m), Pollinator rows (%). With orchard area, between rows and between trees in the row in place, Trees to plant can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Space per tree, Trees per hectare, Trees to plant and Trees of the main variety blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Space per tree = 12 m², Trees per hectare = 833 /ha, Trees to plant = 833, Trees of the main variety = 667 and Row spacing ÷ tree spacing = 1.33. The figures come from Orchard area as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Trees to plant is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
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
