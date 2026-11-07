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
    'meta' => ['title' => 'Leaves on tree Calculator — Formula & Results', 'description' => 'The Leaves on tree calculator works out <strong>plate diameter</strong> from number of leaves on a plate, the tree crown projection diameter, number of trees…', 'h1' => 'Leaves on tree Calculator', 'updated' => '2026-07-24'],
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
        The Leaves on tree calculator works out <strong>plate diameter</strong> from number of leaves on a plate, the tree crown projection diameter, number of trees and number of squashed leaves.
        TXT,
        'sections' => [
            ['title' => 'How does the Leaves on tree calculator work?', 'html' => <<<'TXT'
            <p>The Leaves on tree calculator takes the values in the form, applies the relationship described below and reports <strong>plate diameter</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the tree species); then you type in number of leaves on a plate, the tree crown projection diameter, number of trees and number of squashed leaves.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>A plain number with no unit attached.</li><li> The unit chip switches it to any of the 34 supported units.</li><li>Pick the option that matches your case — 12 options, such as typical deciduous tree, red maple and sugar maple. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li><li>A measured quantity, entered by default in liters. The unit chip switches it to any of the 40 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li><li>A plain number with no unit attached.</li><li> The unit chip switches it to any of the 34 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li><li>A measured quantity, entered by default in square centimeters. The unit chip switches it to any of the 24 supported units.</li><li>A measured quantity, entered by default in cubic meters. The unit chip switches it to any of the 40 supported units.</li><li>A measured quantity, entered by default in cubic meters. The unit chip switches it to any of the 40 supported units.</li></ul><p>One field on this form is a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Plate diameter</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>Calculated</td></tr><tr><td><strong>Number of leaves on a plate</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Tree crown projection diameter</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>You supply it</td></tr><tr><td><strong>Tree species</strong></td><td>One of 12 options, such as typical deciduous tree, red maple and sugar maple.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Leaves area index (LAI)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Number of leaves on a tree</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Number of trees</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Squashed ball diameter</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>Calculated</td></tr><tr><td><strong>Number of squashed leaves</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Bag volume</strong></td><td>A measured quantity, 40 units available.</td><td>liters</td><td>You supply it</td></tr><tr><td><strong>Bags needed</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Average mass of one leaf</strong></td><td>A measured quantity, 29 units available.</td><td>grams</td><td>Calculated</td></tr><tr><td><strong>Total mass of leaves</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>You supply it</td></tr><tr><td><strong>Weight of one bag</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>Calculated</td></tr><tr><td><strong>Ball diameter</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Number of leaves in a ball</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Pile diameter</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>You supply it</td></tr><tr><td><strong>Pile height</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>You supply it</td></tr><tr><td><strong>Number of leaves in a pile</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Plate area</strong></td><td>A measured quantity, 24 units available.</td><td>square centimeters</td><td>You supply it</td></tr><tr><td><strong>Tree canopy projection area</strong></td><td>A measured quantity, 24 units available.</td><td>square meters</td><td>Calculated</td></tr><tr><td><strong>Squashed pile volume</strong></td><td>A measured quantity, 40 units available.</td><td>cubic meters</td><td>You supply it</td></tr><tr><td><strong>Density of squashed pile</strong></td><td>A measured quantity, 40 units available.</td><td>cubic meters</td><td>Calculated</td></tr><tr><td><strong>Total squashed pile volume</strong></td><td>A measured quantity, 40 units available.</td><td>cubic meters</td><td>You supply it</td></tr></tbody></table><p>The table lists the first 24 of 27 fields; the rest follow the same pattern.</p>
            TXT],
            ['title' => 'The formula behind the Leaves on tree calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Plate diameter</span><span class="formula-eq">=</span><span class="formula-rhs">2 × the square root of (plate area) ÷ the square root of (PI)</span></div><div class="formula-row"><span class="formula-lhs">Tree canopy projection area</span><span class="formula-eq">=</span><span class="formula-rhs">(1 ÷ 4) × PI × (tree crown projection diameter ^ 2)</span></div><div class="formula-row"><span class="formula-lhs">Leaves area index (LAI)</span><span class="formula-eq">=</span><span class="formula-rhs">plate area × number of leaves on a tree ÷ (tree canopy projection area × number of leaves on a plate)</span></div><div class="formula-row"><span class="formula-lhs">Average mass of one leaf</span><span class="formula-eq">=</span><span class="formula-rhs">total mass of leaves ÷ (number of trees × number of leaves on a tree)</span></div><div class="formula-row"><span class="formula-lhs">Small pile volume</span><span class="formula-eq">=</span><span class="formula-rhs">(1 ÷ 6) × PI × (ball diameter ^ 3)</span></div><div class="formula-row"><span class="formula-lhs">Density of leaves in pile</span><span class="formula-eq">=</span><span class="formula-rhs">number of leaves in a ball ÷ small pile volume</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in centimeters, and convertible to any of the 34 units on that chip.</li><li>Shown in square meters, and convertible to any of the 24 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in grams, and convertible to any of the 29 units on that chip.</li><li>Shown in cubic centimeters, and convertible to any of the 40 units on that chip.</li><li>Shown in cubic meters, and convertible to any of the 40 units on that chip.</li><li>Shown in cubic meters, and convertible to any of the 40 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in centimeters, and convertible to any of the 34 units on that chip.</li><li>Shown in cubic meters, and convertible to any of the 40 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in centimeters</li><li>Length, opening in meters</li><li>Length, opening in centimeters</li><li>Volume, opening in liters</li><li>Mass, opening in grams</li><li>Mass, opening in kilograms</li><li>Mass, opening in kilograms</li><li>Length, opening in centimeters</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Leaves on tree calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Supporting a lesson, a lecture or a field note</li><li>Comparing two organisms, populations or processes</li><li>Putting a biological quantity into a scale you can picture</li><li>Any time the same 4 figures keep coming back — number of leaves on a plate, the tree crown projection diameter and number of trees — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Write the answer down with its unit. </li><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/tree-spacing">Tree spacing</a>, <a href="/biology/tree-value">Tree value</a> and <a href="/biology/trihybrid-cross-punnett-square">Trihybrid cross Punnett square</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Leaves on tree calculator work out?', 'a' => <<<'TXT'
            It returns plate diameter, derived from number of leaves on a plate, the tree crown projection diameter and number of trees. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Leaves on tree calculator?', 'a' => <<<'TXT'
            The form asks for number of leaves on a plate, the tree crown projection diameter, number of trees and number of squashed leaves, which is 14 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter plate diameter in a different unit?', 'a' => <<<'TXT'
            Yes. Plate diameter opens in centimeters and the chip beside it offers 34 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There is one choice to make (1 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'What is a typical result?', 'a' => <<<'TXT'
            With the values the page starts from, the calculator reports Leaves area index (LAI) = 0. Treat that as a reference point rather than a recommendation: it exists so you can tell at a glance whether your own inputs are on the same scale.
            TXT],
            ['q' => 'Is the Leaves on tree calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/tree-spacing', 'name' => 'Tree spacing'],
            ['path' => '/biology/tree-value', 'name' => 'Tree value'],
            ['path' => '/biology/trihybrid-cross-punnett-square', 'name' => 'Trihybrid cross Punnett square'],
        ],
    ],
];
