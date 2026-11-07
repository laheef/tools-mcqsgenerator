<?php

/**
 * Tree spacing
 * /biology/tree-spacing
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Tree spacing',
    'meta' => ['title' => 'Tree spacing Calculator — Formula & Results', 'description' => 'Enter Length, Width and Area into Tree spacing and the answer comes back as Space between trees. It is a single relationship that reads Space between trees…', 'h1' => 'Tree spacing Calculator', 'updated' => '2026-08-10'],
    'sections' => [
        [
            'title' => 'Planting area specification',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'length',
                            'label' => 'Length',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['omni', '0.1'],
                        ],
                        [
                            'name' => 'width',
                            'label' => 'Width',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'area',
                            'label' => 'Area',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'are',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Tree type',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Tree_type',
                            'label' => 'Tree type',
                            'type' => 'select',
                            'options' => [
                                'Apple tree (standard) ' => '30',
                                'Alder' => '6.7',
                                'American beech' => '20',
                                'American chestnut' => '28',
                                'American elm' => '20.000001',
                                'European beech' => '24',
                                'Black cherry' => '18',
                                'Black locust' => '24.00000002',
                                'Black walnut' => '30',
                                'Common juniper' => '6',
                                'Cottonwood' => '21.00008',
                                'Douglas fir' => '16',
                                'Dutch elm' => '24.0000005',
                                'Eucalyptus' => '25',
                                'Hornbeam tree' => '15.00008',
                                'Hybrid poplar' => '15',
                                'Linden' => '25.000056',
                                ' Loblolly pine ' => '12',
                                'Mahogany' => '25.000001',
                                'Maple tree' => '25.000024',
                                'Norway spruce' => '10.0001',
                                'Paper birch' => '17',
                                'Pauloownia ' => '16.00001',
                                'Pear tree' => '20.00008',
                                'Red oak' => '23',
                                'Rosewood' => '23.000002',
                                'Rowan & mountain ash' => '22.97',
                                ' Scots pine' => '16.00003',
                                'Western red cedar' => '18.0000001',
                                'White oak' => '26',
                                'White pine' => '20.000003',
                                'Wheeping willow' => '30.0006',
                                'Yellow birch' => '21',
                            ],
                            'control' => 'DROPDOWN',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'space_between_trees',
                            'label' => 'Space between trees',
                            'type' => 'number',
                            'help' => 'The minimal recommended distance between your tree seedlings.',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'readonly' => true,
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'How many trees you can plant 🌱',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Trees_population',
                            'label' => 'Tree population',
                            'type' => 'number',
                            'help' => 'It\'s rounded down so that when the leftover land is too small for a tree, quarter and half trees are not accounted for.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'area = width*length',
            'results' => ['width' => 'area/length', 'area' => 'length*width', 'length' => 'area/width'],
        ],
        [
            'title' => 'space_between_trees = Tree_type',
            'results' => ['Tree_type' => 'space_between_trees', 'space_between_trees' => 'Tree_type'],
        ],
        [
            'title' => 'Trees_population = floor(length/space_between_trees) * floor(width/space_between_trees)',
            'results' => ['Trees_population' => 'floor(length/space_between_trees)*floor(width/space_between_trees)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Length, Width and Area into Tree spacing and the answer comes back as Space between trees. It is a single relationship that reads Space between trees out of Length, not a table of canned results keyed by them. Units for Space between trees default to meters and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Tree spacing calculator works', 'html' => <<<'TXT'
            <p>The Tree spacing calculator applies one relationship to 5 numbers and reports Space between trees.</p><p>The relationship it solves reads Width = Area ÷ Length.</p><p>What comes back is Space between trees — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 5 boxes, and nothing else.</p><ul><li><strong>Length</strong> — in meters</li><li><strong>Width</strong> — in meters</li><li><strong>Area</strong> — in ares</li><li><strong>Tree type</strong> — a plain number, no unit</li><li><strong>Tree population</strong> — a plain number, no unit. It&#039;s rounded down so that when the leftover land is too small for a tree, quarter and half trees are not accounted for.</li></ul><p>What you get back is Space between trees in meters, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Width</strong> = <code>Area ÷ Length</code></li><li><strong>Area</strong> = <code>Length × Width</code></li><li><strong>Length</strong> = <code>Area ÷ Width</code></li><li><strong>Tree type</strong> = <code>Space between trees</code></li><li><strong>Space between trees</strong> = <code>Tree type</code></li><li><strong>Tree population</strong> = <code>floor(Length ÷ Space between trees) × floor(Width ÷ Space between trees)</code></li></ul><p>Any one of Width, Area and Length can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Length, Width and Area carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Space between trees is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Length and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Length, Width and Area measured, Space between trees wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/serial-dilution-planner">Serial Dilution Planner Calculator</a>, <a href="/biology/shannon-wiener-index">Shannon–Wiener Diversity Index Calculator</a> and <a href="/biology/sheep-gestation">Sheep gestation Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Tree spacing calculator work out?', 'a' => 'Space between trees, from Area and Length. The relationship is Width = Area ÷ Length.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Length (meters), Width (meters), Area (ares), Tree type, Tree population. Fill length, width and area and leave Space between trees empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Width, Area, Length and Tree type blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Space between trees is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Length left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Space between trees keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/serial-dilution-planner', 'name' => 'Serial Dilution Planner Calculator'],
            ['path' => '/biology/shannon-wiener-index', 'name' => 'Shannon–Wiener Diversity Index Calculator'],
            ['path' => '/biology/sheep-gestation', 'name' => 'Sheep gestation Calculator'],
        ],
        'authors' => [],
    ],
];
