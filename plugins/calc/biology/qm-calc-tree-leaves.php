<?php

/**
 * Leaves on tree
 * /biology/tree-leaves
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Leaves on tree',
    'meta' => ['title' => 'Leaves on tree Calculator — Formula & Results', 'description' => 'Leaves on tree works out Leaves area index (LAI) from Plate diameter, Number of leaves on a plate and Tree crown projection diameter.', 'h1' => 'Leaves on tree Calculator', 'updated' => '2026-07-24'],
    'sections' => [
        [
            'title' => 'How many leaves are on a tree?',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'plate_radius',
                            'label' => 'Plate diameter',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'plate_number_of_leaves',
                            'label' => 'Number of leaves on a plate',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'canopy_radius',
                            'label' => 'Tree crown projection diameter',
                            'type' => 'number',
                            'help' => 'How wide is the tree crown at the widest point?',
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
                            'name' => 'tree_species',
                            'label' => 'Tree species',
                            'type' => 'select',
                            'options' => [
                                'Typical deciduous tree' => '4.7',
                                'Red maple' => '5.97',
                                'Sugar maple' => '6.64',
                                'Grey alder' => '3.18',
                                'Paper birch' => '4.65',
                                'American beech' => '4.39',
                                'Green ash' => '4.69',
                                'Loblolly pine' => '3.91',
                                'Sweetgum' => '5.5',
                                'Quaking aspen' => '2.73',
                                'White oak' => '5.57',
                                'Enter custom LAI value' => '',
                            ],
                            'dataset' => 'Tree_species',
                            'control' => 'DROPDOWN',
                            'default' => 'Typical deciduous tree',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'LAI',
                            'label' => 'Leaves area index (LAI)',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_number_of_leaves',
                            'label' => 'Number of leaves on a tree',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'How many bags do you need?',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'number_of_trees',
                            'label' => 'Number of trees',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'squashed_pile_radius',
                            'label' => 'Squashed ball diameter',
                            'type' => 'number',
                            'help' => 'Diameter of a ball created from leaves.',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'number_of_squashed_leaves',
                            'label' => 'Number of squashed leaves',
                            'type' => 'number',
                            'help' => 'How many leaves are in the ball?',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bags_volume',
                            'label' => 'Bag volume',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'liters',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bags_needed',
                            'label' => 'Bags needed',
                            'type' => 'number',
                            'help' => 'Bags needed to gather all the leaves.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mass_of_leaf',
                            'label' => 'Average mass of one leaf',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_mass_of_leaves',
                            'label' => 'Total mass of leaves',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bag_weight',
                            'label' => 'Weight of one bag',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'How many leaves are in a pile?',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'small_pile_leaves_radius',
                            'label' => 'Ball diameter',
                            'type' => 'number',
                            'help' => 'Diameter of a ball created from leaves (not squashed).',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'small_pile_leaves_number',
                            'label' => 'Number of leaves in a ball',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pile_radius',
                            'label' => 'Pile diameter',
                            'type' => 'number',
                            'help' => 'Diameter of a pile (cone).',
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
                            'name' => 'pile_height',
                            'label' => 'Pile height',
                            'type' => 'number',
                            'help' => 'Height of a pile (cone).',
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
                            'name' => 'pile_leaves_number',
                            'label' => 'Number of leaves in a pile',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Hidden variables',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'plate_area',
                            'label' => 'Plate area',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'cm2',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'canopy_area',
                            'label' => 'Tree canopy projection area',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'm2',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'squashed_pile_volume',
                            'label' => 'Squashed pile volume',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'm3',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'density_of_squashed_pile',
                            'label' => 'Density of squashed pile',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'm3',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_squashed_pile_volume',
                            'label' => 'Total squashed pile volume',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'm3',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pile_volume',
                            'label' => 'Pile volume',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'm3',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'leaves_density',
                            'label' => 'Density of leaves in pile',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'm3',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'small_pile_leaves_volume',
                            'label' => 'Small pile volume',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'cm3',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'plate_area = pi * (plate_radius/2)^2',
            'results' => ['plate_radius' => '2*sqrt(plate_area)/sqrt(PI)', 'plate_area' => '(1/4)*PI*pow(plate_radius, 2)'],
        ],
        [
            'title' => 'canopy_area = pi * (canopy_radius/2)^2',
            'results' => ['canopy_area' => '(1/4)*PI*pow(canopy_radius, 2)', 'canopy_radius' => '2*sqrt(canopy_area)/sqrt(PI)'],
        ],
        [
            'title' => 'total_number_of_leaves = LAI * plate_number_of_leaves * canopy_area / plate_area',
            'results' => [
                'LAI' => 'plate_area*total_number_of_leaves/(canopy_area*plate_number_of_leaves)',
                'canopy_area' => 'plate_area*total_number_of_leaves/(LAI*plate_number_of_leaves)',
                'plate_area' => 'LAI*canopy_area*plate_number_of_leaves/total_number_of_leaves',
                'plate_number_of_leaves' => 'plate_area*total_number_of_leaves/(LAI*canopy_area)',
                'total_number_of_leaves' => 'LAI*canopy_area*plate_number_of_leaves/plate_area',
            ],
        ],
        [
            'title' => 'total_mass_of_leaves = number_of_trees * total_number_of_leaves * mass_of_leaf',
            'results' => ['mass_of_leaf' => 'total_mass_of_leaves/(number_of_trees*total_number_of_leaves)', 'total_number_of_leaves' => 'total_mass_of_leaves/(mass_of_leaf*number_of_trees)', 'total_mass_of_leaves' => 'mass_of_leaf*number_of_trees*total_number_of_leaves', 'number_of_trees' => 'total_mass_of_leaves/(mass_of_leaf*total_number_of_leaves)'],
        ],
        [
            'title' => 'small_pile_leaves_volume = 4/3 * pi * (small_pile_leaves_radius/2)^3',
            'results' => ['small_pile_leaves_volume' => '(1/6)*PI*pow(small_pile_leaves_radius, 3)', 'small_pile_leaves_radius' => 'cbrt(6)*cbrt(small_pile_leaves_volume)/cbrt(PI)'],
        ],
        [
            'title' => 'leaves_density = small_pile_leaves_number / small_pile_leaves_volume',
            'results' => ['leaves_density' => 'small_pile_leaves_number/small_pile_leaves_volume', 'small_pile_leaves_volume' => 'small_pile_leaves_number/leaves_density', 'small_pile_leaves_number' => 'leaves_density*small_pile_leaves_volume'],
        ],
        [
            'title' => 'pile_volume = 1 / 3 * pi * (pile_radius/2)^2 * pile_height',
            'results' => ['pile_volume' => '(1/12)*PI*pile_height*pow(pile_radius, 2)', 'pile_radius' => '2*sqrt(3)*sqrt(pile_volume/pile_height)/sqrt(PI)', 'pile_height' => '12*pile_volume/(PI*pow(pile_radius, 2))'],
        ],
        [
            'title' => 'pile_leaves_number = leaves_density * pile_volume',
            'results' => ['leaves_density' => 'pile_leaves_number/pile_volume', 'pile_leaves_number' => 'leaves_density*pile_volume', 'pile_volume' => 'pile_leaves_number/leaves_density'],
        ],
        [
            'title' => 'squashed_pile_volume = 4/3 * pi * (squashed_pile_radius/2)^3',
            'results' => ['squashed_pile_radius' => 'cbrt(6)*cbrt(squashed_pile_volume)/cbrt(PI)', 'squashed_pile_volume' => '(1/6)*PI*pow(squashed_pile_radius, 3)'],
        ],
        [
            'title' => 'density_of_squashed_pile = number_of_squashed_leaves / squashed_pile_volume',
            'results' => ['density_of_squashed_pile' => 'number_of_squashed_leaves/squashed_pile_volume', 'squashed_pile_volume' => 'number_of_squashed_leaves/density_of_squashed_pile', 'number_of_squashed_leaves' => 'density_of_squashed_pile*squashed_pile_volume'],
        ],
        [
            'title' => 'total_squashed_pile_volume = number_of_trees * total_number_of_leaves / density_of_squashed_pile',
            'results' => ['density_of_squashed_pile' => 'number_of_trees*total_number_of_leaves/total_squashed_pile_volume', 'total_number_of_leaves' => 'density_of_squashed_pile*total_squashed_pile_volume/number_of_trees', 'number_of_trees' => 'density_of_squashed_pile*total_squashed_pile_volume/total_number_of_leaves', 'total_squashed_pile_volume' => 'number_of_trees*total_number_of_leaves/density_of_squashed_pile'],
        ],
        [
            'title' => 'bags_needed = total_squashed_pile_volume / bags_volume',
            'results' => ['bags_needed' => 'total_squashed_pile_volume/bags_volume', 'bags_volume' => 'total_squashed_pile_volume/bags_needed', 'total_squashed_pile_volume' => 'bags_needed*bags_volume'],
        ],
        [
            'title' => 'bag_weight = bags_volume * density_of_squashed_pile * mass_of_leaf',
            'results' => ['mass_of_leaf' => 'bag_weight/(bags_volume*density_of_squashed_pile)', 'density_of_squashed_pile' => 'bag_weight/(bags_volume*mass_of_leaf)', 'bag_weight' => 'bags_volume*density_of_squashed_pile*mass_of_leaf', 'bags_volume' => 'bag_weight/(density_of_squashed_pile*mass_of_leaf)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Leaves on tree works out Leaves area index (LAI) from Plate diameter, Number of leaves on a plate and Tree crown projection diameter. It is a single relationship that reads Leaves area index (LAI) out of Plate diameter, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Leaves on tree calculator works', 'html' => <<<'TXT'
            <p>The Leaves on tree calculator applies one relationship to 18 numbers and reports Leaves area index (LAI).</p><p>In the form&#039;s own words, Plate diameter = 2 × √(plate_area) ÷ √(PI).</p><p>The result panel carries Leaves area index (LAI), each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 18 boxes and the page has everything it needs.</p><ul><li><strong>Plate diameter</strong> — in centimeters</li><li><strong>Number of leaves on a plate</strong> — a plain number, no unit</li><li><strong>Tree crown projection diameter</strong> — in meters. How wide is the tree crown at the widest point?</li><li><strong>Tree species</strong> — a plain number, no unit</li><li><strong>Number of leaves on a tree</strong> — a plain number, no unit</li><li><strong>Number of trees</strong> — a plain number, no unit</li><li><strong>Squashed ball diameter</strong> — in centimeters. Diameter of a ball created from leaves.</li><li><strong>Number of squashed leaves</strong> — a plain number, no unit. How many leaves are in the ball?</li><li><strong>Bag volume</strong> — in liters</li><li><strong>Bags needed</strong> — a plain number, no unit. Bags needed to gather all the leaves.</li><li><strong>Average mass of one leaf</strong> — in grams</li><li><strong>Total mass of leaves</strong> — in kilograms</li><li><strong>Weight of one bag</strong> — in kilograms</li><li><strong>Ball diameter</strong> — in centimeters. Diameter of a ball created from leaves (not squashed).</li><li><strong>Number of leaves in a ball</strong> — a plain number, no unit</li><li><strong>Pile diameter</strong> — in meters. Diameter of a pile (cone).</li><li><strong>Pile height</strong> — in meters. Height of a pile (cone).</li><li><strong>Number of leaves in a pile</strong> — a plain number, no unit</li></ul><p>What you get back is Leaves area index (LAI), shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Plate diameter</strong> = <code>2 × √(plate_area) ÷ √(PI)</code></li><li><strong>plate_area</strong> = <code>(1 ÷ 4) × PI × (Plate diameter)^(2)</code></li><li><strong>canopy_area</strong> = <code>(1 ÷ 4) × PI × (Tree crown projection diameter)^(2)</code></li><li><strong>Tree crown projection diameter</strong> = <code>2 × √(canopy_area) ÷ √(PI)</code></li><li><strong>Leaves area index (LAI)</strong> = <code>plate_area × Number of leaves on a tree ÷ (canopy_area × Number of leaves on a plate)</code></li><li><strong>Number of leaves on a plate</strong> = <code>plate_area × Number of leaves on a tree ÷ (Leaves area index (LAI) × canopy_area)</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Plate diameter, plate_area and canopy_area can be the unknown.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Plate diameter, Tree crown projection diameter and Squashed ball diameter carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Leaves area index (LAI) is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Plate diameter and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Plate diameter, Number of leaves on a plate and Tree crown projection diameter and the number you are missing is Leaves area index (LAI).</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/plant-population">Plant population Calculator</a>, <a href="/biology/plants">Plant spacing Calculator</a> and <a href="/biology/plants-per-hectare">Plants Per Hectare Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Leaves on tree calculator work out?', 'a' => <<<'TXT'
            Leaves area index (LAI), from Plate diameter, Number of leaves on a plate, Tree crown projection diameter and Tree species. The relationship is Plate diameter = 2 × √(plate_area) ÷ √(PI).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Plate diameter (centimeters), Number of leaves on a plate, Tree crown projection diameter (meters), Tree species, Number of leaves on a tree. Enter plate_radius, plate_number_of_leaves and canopy_radius; Leaves area index (LAI) is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Plate diameter, plate_area, canopy_area and Tree crown projection diameter can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Leaves area index (LAI) is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Plate diameter blank and the page solves for it, reporting Leaves area index (LAI) instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Leaves area index (LAI) keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/plant-population', 'name' => 'Plant population Calculator'],
            ['path' => '/biology/plants', 'name' => 'Plant spacing Calculator'],
            ['path' => '/biology/plants-per-hectare', 'name' => 'Plants Per Hectare Calculator'],
        ],
        'authors' => [],
    ],
];
