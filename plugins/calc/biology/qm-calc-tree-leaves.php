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
    'meta' => ['title' => 'Leaves on tree Calculator — Formula & Results', 'description' => 'Enter plate diameter, number of leaves on a plate and tree crown projection diameter and Leaves on tree returns number of leaves on a tree and bags needed.', 'h1' => 'Leaves on tree Calculator', 'updated' => '2026-07-24'],
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
        Leaves on tree works out Leaves area index (LAI) from Plate diameter, Number of leaves on a plate and Tree crown projection diameter. It is a single relationship that reads leaves area index (LAI) out of plate diameter, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Leaves on tree calculator works', 'html' => <<<'TXT'
            <p>The Leaves on tree calculator applies one relationship to 18 numbers and reports Leaves area index (LAI).</p><p>In the form&#039;s own words, Plate diameter = 2 × √(plate_area) ÷ √(PI).</p><p>The result panel carries Leaves area index (LAI), each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 18 boxes and the page has everything it needs.</p><ul><li><strong>Plate diameter</strong> — in centimeters</li><li><strong>Number of leaves on a plate</strong> — a plain number, no unit</li><li><strong>Tree crown projection diameter</strong> — in meters. How wide is the tree crown at the widest point?</li><li><strong>Tree species</strong> — a plain number, no unit</li><li><strong>Number of leaves on a tree</strong> — a plain number, no unit</li><li><strong>Number of trees</strong> — a plain number, no unit</li><li><strong>Squashed ball diameter</strong> — in centimeters. Diameter of a ball created from leaves.</li><li><strong>Number of squashed leaves</strong> — a plain number, no unit. How many leaves are in the ball?</li><li><strong>Bag volume</strong> — in liters</li><li><strong>Bags needed</strong> — a plain number, no unit. Bags needed to gather all the leaves.</li><li><strong>Average mass of one leaf</strong> — in grams</li><li><strong>Total mass of leaves</strong> — in kilograms</li><li><strong>Weight of one bag</strong> — in kilograms</li><li><strong>Ball diameter</strong> — in centimeters. Diameter of a ball created from leaves (not squashed).</li><li><strong>Number of leaves in a ball</strong> — a plain number, no unit</li><li><strong>Pile diameter</strong> — in meters. Diameter of a pile (cone).</li><li><strong>Pile height</strong> — in meters. Height of a pile (cone).</li><li><strong>Number of leaves in a pile</strong> — a plain number, no unit</li></ul><p>What you get back is Leaves area index (LAI), shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Plate diameter lists 31 options and opens on centimeters. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Plate diameter</strong> = <code>2 × √(plate_area) ÷ √(PI)</code></li><li><strong>plate_area</strong> = <code>(1 ÷ 4) × PI × (Plate diameter)^(2)</code></li><li><strong>canopy_area</strong> = <code>(1 ÷ 4) × PI × (Tree crown projection diameter)^(2)</code></li><li><strong>Tree crown projection diameter</strong> = <code>2 × √(canopy_area) ÷ √(PI)</code></li><li><strong>Leaves area index (LAI)</strong> = <code>plate_area × Number of leaves on a tree ÷ (canopy_area × Number of leaves on a plate)</code></li><li><strong>Number of leaves on a plate</strong> = <code>plate_area × Number of leaves on a tree ÷ (Leaves area index (LAI) × canopy_area)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Plate diameter</strong> = <code>2 × √(plate_area) ÷ √(PI)</code> — the form to use when the other values are known.</li><li><strong>plate_area</strong> = <code>(1 ÷ 4) × PI × (Plate diameter)^(2)</code> — the form to use when Plate diameter are the values you have.</li><li><strong>canopy_area</strong> = <code>(1 ÷ 4) × PI × (Tree crown projection diameter)^(2)</code> — the form to use when Tree crown projection diameter are the values you have.</li><li><strong>Tree crown projection diameter</strong> = <code>2 × √(canopy_area) ÷ √(PI)</code> — the form to use when the other values are known.</li><li><strong>Leaves area index (LAI)</strong> = <code>plate_area × Number of leaves on a tree ÷ (canopy_area × Number of leaves on a plate)</code> — the form to use when Number of leaves on a tree and Number of leaves on a plate are the values you have.</li><li><strong>canopy_area</strong> = <code>plate_area × Number of leaves on a tree ÷ (Leaves area index (LAI) × Number of leaves on a plate)</code> — the form to use when Number of leaves on a tree, Leaves area index (LAI) and Number of leaves on a plate are the values you have.</li><li><strong>plate_area</strong> = <code>Leaves area index (LAI) × canopy_area × Number of leaves on a plate ÷ Number of leaves on a tree</code> — the form to use when Leaves area index (LAI), Number of leaves on a plate and Number of leaves on a tree are the values you have.</li><li><strong>Number of leaves on a plate</strong> = <code>plate_area × Number of leaves on a tree ÷ (Leaves area index (LAI) × canopy_area)</code> — the form to use when Number of leaves on a tree and Leaves area index (LAI) are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Plate diameter, plate_area and canopy_area can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Plate diameter, Tree crown projection diameter and Squashed ball diameter carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Leaves area index (LAI) is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Plate diameter left as a guess.</strong> Anything typed into Plate diameter is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Number of leaves on a plate left as a guess.</strong> Anything typed into Number of leaves on a plate is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Plate diameter and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Plate diameter, Number of leaves on a plate, Tree crown projection diameter and Tree species ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Plate diameter — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Leaves area index (LAI) against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Leaves area index (LAI) is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The unit tables here are meters, liters and kilograms and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Plate diameter, Number of leaves on a plate and Tree crown projection diameter are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Plate diameter, Number of leaves on a plate and Tree crown projection diameter and the number you are missing is Leaves area index (LAI).</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/plant-population">Plant population Calculator</a>, <a href="/biology/plants">Plant spacing Calculator</a> and <a href="/biology/plants-per-hectare">Plants Per Hectare Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Leaves on tree is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Leaves on tree is a number to act on, so the useful question is what to do with Leaves area index (LAI) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Plate diameter, Number of leaves on a plate, Tree crown projection diameter and Tree species alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Leaves on tree calculator work out?', 'a' => <<<'TXT'
            Leaves area index (LAI), from Plate diameter, Number of leaves on a plate, Tree crown projection diameter and Tree species. The relationship is Plate diameter = 2 × √(plate_area) ÷ √(PI).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Plate diameter (centimeters), Number of leaves on a plate, Tree crown projection diameter (meters), Tree species, Number of leaves on a tree. Enter plate diameter, number of leaves on a plate and tree crown projection diameter; Leaves area index (LAI) is the box to leave alone unless it is the value you came for.
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
