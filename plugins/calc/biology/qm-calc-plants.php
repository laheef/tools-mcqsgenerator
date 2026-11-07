<?php

/**
 * Plant spacing
 * /biology/plants
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Plant spacing',
    'meta' => ['title' => 'Plant spacing Calculator — Formula & Results', 'description' => 'Plant spacing turns type of planting, number of rows and plant grid into area size and total plants. Every box can be solved for, not only the one in the title.', 'h1' => 'Plant spacing Calculator', 'updated' => '2026-09-28'],
    'raw' => [
        'vars' => [
            'area_bed' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.000001'],
            ],
            'boundary' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '0', 'c' => null],
                    ['v' => '0', 'c' => 'userUsesImperialUnits()'],
                ],
            ],
            'cost_per_plant' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'density' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'density_triangular' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'even_row_plants' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'gardenHedge' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'Hdxbmkyr3DE_Bso-lBB3p', 'c' => null],
                ],
                'ds' => '-m10ay8dRseJ9aH318DOL',
            ],
            'garden_grid' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => '4RCQB-DbX8hRl0KVN-RVr', 'c' => null],
                ],
                'ds' => '1589',
            ],
            'hedge_length' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'hedgeplants_per_row' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'hedgeplants_total' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'hedgerows' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'dDtNenbbCBpXpB4OnJsro', 'c' => null],
                ],
                'ds' => 'ptQnsTSMJwsJ6iplEtYy5',
            ],
            'hedgespacing_plant' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'hedgespacing_plant1' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'length_bed' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'number_of_plants' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'odd_row_plants' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'planting_cost' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'plants' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'plants_1' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'plants_per_row' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'plants_per_row_1' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'plants_per_row_square' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'plants_square' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'question' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'fSxPjncl4LH55IZuXSkdZ', 'c' => null],
                ],
                'ds' => 'mmkXoD6WcUcnjk6fwfzxN',
            ],
            'rows' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'rows_1' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'rows_square' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'spacing' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'spacing_plant' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'spacing_plant_1' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'spacing_row' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'spacing_row_1' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'total_plants' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'triangle_plants' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'triangle_row_spacing' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'triangle_rows' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'triangular_row_spacing' => [
                'type' => 'presentation',
                'rnd' => ['standard', '2'],
            ],
            'width_bed' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'azyiN8Uc7lIgVuKKSLy9e',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'x',
                                    'c' => [
                                        [null, <<<'TXT'
                                        Are you planning a landscaping project, or you want to grow an ideal garden? This plant spacing calculator will help you determine how many plants you need for an area, the planting grid and spacing, and even estimate the plants' purchase cost in seconds!
                                        TXT],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'pCx2x9LKEZ3XuF8bRAbtv',
                'title' => 'Planting bed',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'gardenHedge',
                                    'vt' => 'valueSelect',
                                    'l' => 'Type of planting',
                                    'ds' => '-m10ay8dRseJ9aH318DOL',
                                    'opts' => [
                                        ['Hdxbmkyr3DE_Bso-lBB3p', 'Garden grid', '0'],
                                        ['Gy5DhkjulE3qoqQvCBnIG', 'Hedgerow', '1'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'hedgerows',
                                    'vt' => 'valueSelect',
                                    'l' => 'Number of rows',
                                    'ds' => 'ptQnsTSMJwsJ6iplEtYy5',
                                    'opts' => [
                                        ['dDtNenbbCBpXpB4OnJsro', 'Single', '1'],
                                        ['lelhKl9S4-ililW0RU_Ca', 'Double', '2'],
                                        ['h2UFvYbgbc3o5c16KnopX', 'Triple', '3'],
                                        ['PJI1q6SWJT8mLoPGqAE4b', 'Four', '4'],
                                        ['qGCZxsWWo5celSLVTl7jH', 'Five', '5'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'garden_grid',
                                    'vt' => 'valueSelect',
                                    'l' => 'Plant grid',
                                    'ds' => '1589',
                                    'opts' => [
                                        ['4RCQB-DbX8hRl0KVN-RVr', 'Square', '2'],
                                        ['Wi2G4u83UqRzukCL8GVnf', 'Rectangular', '1'],
                                        ['e-V0A9GU344Pk5RtcOAGK', 'Triangular', '0'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'i',
                                    'u' => ['/plants-spacing-squares.png'],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'i',
                                    'u' => ['/hedgerow-1.png'],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'question',
                                    'vt' => 'valueSelect',
                                    'l' => 'I want to know...',
                                    'ds' => 'mmkXoD6WcUcnjk6fwfzxN',
                                    'opts' => [
                                        ['fSxPjncl4LH55IZuXSkdZ', 'How many plants do I need?', '0'],
                                        ['FzxUTFW6_YcluHN9WeeAI', 'How should I arrange my plants?', '1'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'hedge_length',
                                    'vt' => 'numerical',
                                    'l' => 'Length of hedge',
                                    'us' => '4',
                                    'du' => 'm',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'length_bed',
                                    'vt' => 'numerical',
                                    'l' => 'Area length',
                                    'us' => '4',
                                    'du' => 'm',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'width_bed',
                                    'vt' => 'numerical',
                                    'l' => 'Area width',
                                    'us' => '4',
                                    'du' => 'm',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'area_bed',
                                    'vt' => 'numerical',
                                    'l' => 'Area size',
                                    'h' => 'The area size includes the border space.',
                                    'us' => '28',
                                    'du' => 'm2',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'boundary',
                                    'vt' => 'numerical',
                                    'l' => 'Border',
                                    'h' => 'The border is the empty space you require along the plot perimeter.',
                                    'us' => '4',
                                    'du' => 'cm',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'plants_1', 'vt' => 'numerical', 'l' => 'Total plants'],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'nwERk4U5EnP7O5qTS-KlL',
                'title' => 'Spacing',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'hedgeplants_total', 'vt' => 'numerical', 'l' => 'Total plants'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'hedgeplants_per_row', 'vt' => 'numerical', 'l' => 'Plants per row'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'hedgespacing_plant',
                                    'vt' => 'numerical',
                                    'l' => 'Plant spacing (s)',
                                    'us' => '4',
                                    'du' => 'cm',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'hedgespacing_plant1',
                                    'vt' => 'numerical',
                                    'l' => 'Plant spacing (s)',
                                    'us' => '4',
                                    'du' => 'cm',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'number_of_plants', 'vt' => 'numerical', 'l' => 'Number of plants'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'spacing_row',
                                    'vt' => 'numerical',
                                    'l' => 'Row spacing (r)',
                                    'h' => 'The spacing between rows.',
                                    'us' => '4',
                                    'du' => 'cm',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'spacing_plant',
                                    'vt' => 'numerical',
                                    'l' => 'Plant spacing (s)',
                                    'h' => 'The spacing between plants within a row.',
                                    'us' => '4',
                                    'du' => 'cm',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'plants', 'vt' => 'numerical', 'l' => 'Total plants'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'spacing',
                                    'vt' => 'numerical',
                                    'l' => 'Plant spacing (s)',
                                    'us' => '4',
                                    'du' => 'cm',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'density', 'vt' => 'numerical', 'l' => 'Density'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'density_triangular', 'vt' => 'numerical', 'l' => 'Density'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'triangle_plants', 'vt' => 'numerical', 'l' => 'Total plants'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'rows_1', 'vt' => 'numerical', 'l' => 'Total rows'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'plants_per_row_1', 'vt' => 'numerical', 'l' => 'Plants per row'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'spacing_row_1',
                                    'vt' => 'numerical',
                                    'l' => 'Row spacing (r)',
                                    'us' => '4',
                                    'du' => 'cm',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'spacing_plant_1',
                                    'vt' => 'numerical',
                                    'l' => 'Plant spacing (s)',
                                    'us' => '4',
                                    'du' => 'cm',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'plants_square', 'vt' => 'numerical', 'l' => 'Total plants'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'x',
                                    'c' => [
                                        [null, 'Plant {{rows.formattedValue}} rows with {{plants_per_row.formattedValue}} plants per row for a total of {{plants.formattedValue}} plants.'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'x',
                                    'c' => [
                                        [null, 'Be aware that it is usally easier to plan if rows and plants per row are whole numbers.'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'x',
                                    'c' => [
                                        [null, <<<'TXT'
                                        To achieve the triangular grid, plant {{triangle_rows.formattedValue}} rows with {{triangular_row_spacing.formattedValue}} {{spacing.unit}} between rows. On each row, space plants {{spacing.formattedValue}} {{spacing.unit}} apart. Plant {{odd_row_plants.formattedValue}} plants every odd row (rows 1, 3, 5...) and {{even_row_plants.formattedValue}} plants every even row (rows 2, 4, 6...).
                                        TXT],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'x',
                                    'c' => [
                                        [null, 'Plant a grid of {{rows_square.formattedValue}} × {{plants_per_row_square.formattedValue}} plants to achieve square spacing.'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => '5HG2BRfSGRg37hqeFFRQV',
                'title' => 'Plants cost',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'total_plants', 'vt' => 'numerical', 'l' => 'Total plants'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'cost_per_plant',
                                    'vt' => 'numerical',
                                    'l' => 'Cost per plant',
                                    'us' => '663',
                                    'du' => 'USD',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'planting_cost',
                                    'vt' => 'numerical',
                                    'l' => 'Total plant cost',
                                    'us' => '663',
                                    'du' => 'USD',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'iK8-jzesHqZFGu7w92NMs',
                'title' => 'Hidden variables',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'rows', 'vt' => 'numerical', 'l' => 'Total rows'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'plants_per_row', 'vt' => 'numerical', 'l' => 'Plants per row'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'triangle_rows', 'vt' => 'numerical', 'l' => 'Number of rows triangle'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'triangle_row_spacing',
                                    'vt' => 'numerical',
                                    'l' => 'Row spacing triangle',
                                    'h' => 'This row spacing will allow for equal distances between each plant.',
                                    'us' => '4',
                                    'du' => 'm',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'odd_row_plants',
                                    'vt' => 'numerical',
                                    'l' => 'Plants per odd row',
                                    'h' => 'On odd rows (1, 3, 5...) place this many plants, starting in the corner.',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'even_row_plants',
                                    'vt' => 'numerical',
                                    'l' => 'Plants per even row',
                                    'h' => 'On even rows (2, 4, 6...) place this many plants, staggered from the adjacent rows.',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'plants_per_row_square', 'vt' => 'numerical', 'l' => 'Plants per row'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'rows_square', 'vt' => 'numerical', 'l' => 'Rows square'],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'Xm5Pe1isN1g1bu_fDM39a',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'triangular_row_spacing', 'vt' => 'presentation', 'l' => ''],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'area_bed = length_bed * width_bed',
                'var' => [
                    [
                        'l' => 'length_bed',
                        'f' => 'area_bed/width_bed',
                        'r' => ['width_bed', 'area_bed'],
                    ],
                    [
                        'l' => 'width_bed',
                        'f' => 'area_bed/length_bed',
                        'r' => ['length_bed', 'area_bed'],
                    ],
                    [
                        'l' => 'area_bed',
                        'f' => 'length_bed*width_bed',
                        'r' => ['length_bed', 'width_bed'],
                    ],
                ],
            ],
            [
                'formula' => 'rows = floor((width_bed - boundary*2)/spacing_row+1)',
                'var' => [
                    [
                        'l' => 'rows',
                        'f' => 'floor((-2*boundary + width_bed)/spacing_row) + 1',
                        'r' => ['boundary', 'spacing_row', 'width_bed'],
                    ],
                ],
            ],
            [
                'formula' => 'plants_per_row = floor((length_bed - boundary*2)/spacing_plant + 1)',
                'var' => [
                    [
                        'l' => 'plants_per_row',
                        'f' => 'floor((-2*boundary + length_bed)/spacing_plant) + 1',
                        'r' => ['boundary', 'length_bed', 'spacing_plant'],
                    ],
                ],
            ],
            [
                'formula' => 'plants = one_way(rows * plants_per_row)',
                'var' => [
                    [
                        'l' => 'plants',
                        'f' => '((floor((-2*boundary + length_bed)/spacing_plant) + 1)*(floor((-2*boundary + width_bed)/spacing_row) + 1))',
                        'r' => [
                            'boundary',
                            'length_bed',
                            'spacing_plant',
                            'spacing_row',
                            'width_bed',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'triangle_rows = floor((width_bed - boundary*2)/(spacing*0.866) + 1)',
                'var' => [
                    [
                        'l' => 'triangle_rows',
                        'f' => 'floor((500/433)*(-2*boundary + width_bed)/spacing) + 1',
                        'r' => ['boundary', 'spacing', 'width_bed'],
                    ],
                ],
            ],
            [
                'formula' => 'triangle_row_spacing = one_way(spacing * 0.866)',
                'var' => [
                    [
                        'l' => 'triangle_row_spacing',
                        'f' => '((433/500)*spacing)',
                        'r' => ['spacing'],
                    ],
                ],
            ],
            [
                'formula' => 'odd_row_plants = floor((length_bed - boundary*2)/spacing + 1)',
                'var' => [
                    [
                        'l' => 'odd_row_plants',
                        'f' => 'floor((-2*boundary + length_bed)/spacing) + 1',
                        'r' => ['boundary', 'length_bed', 'spacing'],
                    ],
                ],
            ],
            [
                'formula' => 'even_row_plants = floor((length_bed - boundary*2 - 0.5*spacing)/spacing + 1)',
                'var' => [
                    [
                        'l' => 'even_row_plants',
                        'f' => 'floor((1/2)*(-4*boundary + 2*length_bed - spacing)/spacing) + 1',
                        'r' => ['boundary', 'length_bed', 'spacing'],
                    ],
                ],
            ],
            [
                'formula' => 'triangle_plants = one_way(floor(triangle_rows/2) * even_row_plants + ceil(triangle_rows/2) * odd_row_plants)',
                'var' => [
                    [
                        'l' => 'triangle_plants',
                        'f' => <<<'TXT'
                        ((floor((-2*boundary + length_bed)/spacing) + 1)*ceil((1/2)*floor((500/433)*(-2*boundary + width_bed)/spacing) + 1/2) + (floor((1/2)*(-4*boundary + 2*length_bed - spacing)/spacing) + 1)*floor((1/2)*floor((500/433)*(-2*boundary + width_bed)/spacing) + 1/2))
                        TXT,
                        'r' => ['boundary', 'length_bed', 'spacing', 'width_bed'],
                    ],
                ],
            ],
            [
                'formula' => 'plants_1 = rows_1 * plants_per_row_1',
                'var' => [
                    [
                        'l' => 'rows_1',
                        'f' => 'plants_1/plants_per_row_1',
                        'r' => ['plants_1', 'plants_per_row_1'],
                    ],
                    [
                        'l' => 'plants_1',
                        'f' => 'plants_per_row_1*rows_1',
                        'r' => ['rows_1', 'plants_per_row_1'],
                    ],
                    [
                        'l' => 'plants_per_row_1',
                        'f' => 'plants_1/rows_1',
                        'r' => ['rows_1', 'plants_1'],
                    ],
                ],
            ],
            [
                'formula' => 'spacing_plant_1 = (length_bed - boundary*2) / plants_per_row_1',
                'var' => [
                    [
                        'l' => 'length_bed',
                        'f' => '2*boundary + plants_per_row_1*spacing_plant_1',
                        'r' => ['spacing_plant_1', 'boundary', 'plants_per_row_1'],
                    ],
                    [
                        'l' => 'spacing_plant_1',
                        'f' => '(-2*boundary + length_bed)/plants_per_row_1',
                        'r' => ['length_bed', 'boundary', 'plants_per_row_1'],
                    ],
                    [
                        'l' => 'boundary',
                        'f' => '(1/2)*length_bed - 1/2*plants_per_row_1*spacing_plant_1',
                        'r' => ['length_bed', 'spacing_plant_1', 'plants_per_row_1'],
                    ],
                    [
                        'l' => 'plants_per_row_1',
                        'f' => '(-2*boundary + length_bed)/spacing_plant_1',
                        'r' => ['length_bed', 'spacing_plant_1', 'boundary'],
                    ],
                ],
            ],
            [
                'formula' => 'spacing_row_1 = (length_bed - boundary*2) / rows_1',
                'var' => [
                    [
                        'l' => 'rows_1',
                        'f' => '(-2*boundary + length_bed)/spacing_row_1',
                        'r' => ['spacing_row_1', 'length_bed', 'boundary'],
                    ],
                    [
                        'l' => 'spacing_row_1',
                        'f' => '(-2*boundary + length_bed)/rows_1',
                        'r' => ['rows_1', 'length_bed', 'boundary'],
                    ],
                    [
                        'l' => 'length_bed',
                        'f' => '2*boundary + rows_1*spacing_row_1',
                        'r' => ['rows_1', 'spacing_row_1', 'boundary'],
                    ],
                    [
                        'l' => 'boundary',
                        'f' => '(1/2)*length_bed - 1/2*rows_1*spacing_row_1',
                        'r' => ['rows_1', 'spacing_row_1', 'length_bed'],
                    ],
                ],
            ],
            [
                'formula' => 'rows_square = floor((width_bed - boundary*2)/spacing+1)',
                'var' => [
                    [
                        'l' => 'rows_square',
                        'f' => 'floor((-2*boundary + width_bed)/spacing) + 1',
                        'r' => ['boundary', 'spacing', 'width_bed'],
                    ],
                ],
            ],
            [
                'formula' => 'plants_per_row_square = floor((length_bed - boundary*2)/spacing+1)',
                'var' => [
                    [
                        'l' => 'plants_per_row_square',
                        'f' => 'floor((-2*boundary + length_bed)/spacing) + 1',
                        'r' => ['boundary', 'length_bed', 'spacing'],
                    ],
                ],
            ],
            [
                'formula' => 'plants_square = one_way(rows_square * plants_per_row_square)',
                'var' => [
                    [
                        'l' => 'plants_square',
                        'f' => '((floor((-2*boundary + length_bed)/spacing) + 1)*(floor((-2*boundary + width_bed)/spacing) + 1))',
                        'r' => ['boundary', 'length_bed', 'spacing', 'width_bed'],
                    ],
                ],
            ],
            [
                'formula' => 'spacing^2 = 1/density',
                'var' => [
                    [
                        'l' => 'spacing',
                        'f' => 'sqrt(1/density)',
                        'r' => ['density'],
                    ],
                    [
                        'l' => 'density',
                        'f' => 'pow(spacing, -2)',
                        'r' => ['spacing'],
                    ],
                ],
            ],
            [
                'formula' => 'spacing^2 = 2/(sqrt(3)*density_triangular)',
                'var' => [
                    [
                        'l' => 'density_triangular',
                        'f' => '(2/3)*sqrt(3)/pow(spacing, 2)',
                        'r' => ['spacing'],
                    ],
                    [
                        'l' => 'spacing',
                        'f' => '(1/3)*sqrt(2)*pow(3, 3/4)*sqrt(1/density_triangular)',
                        'r' => ['density_triangular'],
                    ],
                ],
            ],
            [
                'formula' => 'planting_cost = cost_per_plant * total_plants',
                'var' => [
                    [
                        'l' => 'cost_per_plant',
                        'f' => 'planting_cost/total_plants',
                        'r' => ['planting_cost', 'total_plants'],
                    ],
                    [
                        'l' => 'planting_cost',
                        'f' => 'cost_per_plant*total_plants',
                        'r' => ['cost_per_plant', 'total_plants'],
                    ],
                    [
                        'l' => 'total_plants',
                        'f' => 'planting_cost/cost_per_plant',
                        'r' => ['cost_per_plant', 'planting_cost'],
                    ],
                ],
            ],
            [
                'formula' => 'number_of_plants = findNumberOfPlants(hedge_length, hedgerows, hedgespacing_plant)',
                'var' => [
                    [
                        'l' => 'number_of_plants',
                        'f' => 'findNumberOfPlants(hedge_length, hedgerows, hedgespacing_plant)',
                        'r' => ['hedge_length', 'hedgerows', 'hedgespacing_plant'],
                    ],
                ],
            ],
            [
                'formula' => 'hedgeplants_total = hedgeplants_per_row * hedgerows',
                'var' => [
                    [
                        'l' => 'hedgeplants_per_row',
                        'f' => 'hedgeplants_total/hedgerows',
                        'r' => ['hedgerows', 'hedgeplants_total'],
                    ],
                    [
                        'l' => 'hedgerows',
                        'f' => 'hedgeplants_total/hedgeplants_per_row',
                        'r' => ['hedgeplants_per_row', 'hedgeplants_total'],
                    ],
                    [
                        'l' => 'hedgeplants_total',
                        'f' => 'hedgeplants_per_row*hedgerows',
                        'r' => ['hedgeplants_per_row', 'hedgerows'],
                    ],
                ],
            ],
            [
                'formula' => 'hedgespacing_plant1 = hedge_length/hedgeplants_per_row',
                'var' => [
                    [
                        'l' => 'hedgeplants_per_row',
                        'f' => 'hedge_length/hedgespacing_plant1',
                        'r' => ['hedge_length', 'hedgespacing_plant1'],
                    ],
                    [
                        'l' => 'hedge_length',
                        'f' => 'hedgeplants_per_row*hedgespacing_plant1',
                        'r' => ['hedgeplants_per_row', 'hedgespacing_plant1'],
                    ],
                    [
                        'l' => 'hedgespacing_plant1',
                        'f' => 'hedge_length/hedgeplants_per_row',
                        'r' => ['hedgeplants_per_row', 'hedge_length'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            '1589' => [
                'name' => 'gridDS',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => '4RCQB-DbX8hRl0KVN-RVr', 'label' => 'Square', 'value' => '2'],
                    ['uid' => 'Wi2G4u83UqRzukCL8GVnf', 'label' => 'Rectangular', 'value' => '1'],
                    ['uid' => 'e-V0A9GU344Pk5RtcOAGK', 'label' => 'Triangular', 'value' => '0'],
                ],
            ],
            '-m10ay8dRseJ9aH318DOL' => [
                'name' => 'garden_hedgeDS',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'Hdxbmkyr3DE_Bso-lBB3p', 'label' => 'Garden grid', 'value' => '0'],
                    ['uid' => 'Gy5DhkjulE3qoqQvCBnIG', 'label' => 'Hedgerow', 'value' => '1'],
                ],
            ],
            'ptQnsTSMJwsJ6iplEtYy5' => [
                'name' => 'hedgerowsDS',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'dDtNenbbCBpXpB4OnJsro', 'label' => 'Single', 'value' => '1'],
                    ['uid' => 'lelhKl9S4-ililW0RU_Ca', 'label' => 'Double', 'value' => '2'],
                    ['uid' => 'h2UFvYbgbc3o5c16KnopX', 'label' => 'Triple', 'value' => '3'],
                    ['uid' => 'PJI1q6SWJT8mLoPGqAE4b', 'label' => 'Four', 'value' => '4'],
                    ['uid' => 'qGCZxsWWo5celSLVTl7jH', 'label' => 'Five', 'value' => '5'],
                ],
            ],
            'mmkXoD6WcUcnjk6fwfzxN' => [
                'name' => 'questionsDS',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'fSxPjncl4LH55IZuXSkdZ', 'label' => 'How many plants do I need?', 'value' => '0'],
                    ['uid' => 'FzxUTFW6_YcluHN9WeeAI', 'label' => 'How should I arrange my plants?', 'value' => '1'],
                ],
            ],
        ],
        'js' => <<<'TXT'
        "use strict";omni.define("findNumberOfPlants",function(hedge_length,hedgerows,hedgespacing_plant){var recommended_spacing=hedgerows*(hedge_length/hedgespacing_plant);return Math.round(recommended_spacing)});//# sourceURL=customJs.js
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        Plant spacing turns Area length and Area width into Number of rows and Length of hedge. Nothing is looked up on this page: number of rows is computed from area length and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Plant spacing calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Plant spacing: it takes 2 numbers and reports Number of rows, Length of hedge and Area size.</p><p>In the form&#039;s own words, Area size = Area length × Area width.</p><p>What comes back is Number of rows, Length of hedge, Area size and Border — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Area length</strong> — in meters</li><li><strong>Area width</strong> — in meters</li></ul><p>The answers come back as Number of rows, Length of hedge in meters, Area size in square meters, Border in centimeters, Total plants, Total plants, Plants per row, Plant spacing (s) in centimeters, Number of plants, Total plants, Plant spacing (s) in centimeters, Density in square meters, Density in square meters, Total plants, Total rows, Plants per row, Row spacing (r) in centimeters, Plant spacing (s) in centimeters, Total plants, Total plants, Cost per plant in USD, Total plant cost in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Type of planting = 0, Plant grid = 2, I want to know… = 0, Plant spacing (s) = 3 cm, Row spacing (r) = 4 cm and Plant spacing (s) = 5 cm — through the same formula and the panel reports <strong>Number of rows</strong> = 1.</p><ul><li><strong>Number of rows</strong> = 1</li></ul><p>That is <strong>Area size</strong> = <code>Area length × Area width</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Number of rows</strong> = 1 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Length of hedge offers 31 units and opens on meters, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Area size</strong> = <code>Area length × Area width</code></li><li><strong>Area length</strong> = <code>Area size ÷ Area width</code></li><li><strong>Area width</strong> = <code>Area size ÷ Area length</code></li><li><strong>rows</strong> = <code>floor(( − 2 × Border + Area width) ÷ Row spacing (r)) + 1</code></li><li><strong>plants_per_row</strong> = <code>floor(( − 2 × Border + Area length) ÷ Plant spacing (s)) + 1</code></li><li><strong>Total plants</strong> = <code>((floor(( − 2 × Border + Area length) ÷ Plant spacing (s)) + 1) × (floor(( − 2 × Border + Area width) ÷ Row spacing (r)) + 1))</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Area size</strong> = <code>Area length × Area width</code> — the form to use when Area length and Area width are the values you have.</li><li><strong>Area length</strong> = <code>Area size ÷ Area width</code> — the form to use when Area width and Area size are the values you have.</li><li><strong>Area width</strong> = <code>Area size ÷ Area length</code> — the form to use when Area length and Area size are the values you have.</li><li><strong>rows</strong> = <code>floor(( − 2 × Border + Area width) ÷ Row spacing (r)) + 1</code> — the form to use when Border, Row spacing (r) and Area width are the values you have.</li><li><strong>plants_per_row</strong> = <code>floor(( − 2 × Border + Area length) ÷ Plant spacing (s)) + 1</code> — the form to use when Border, Area length and Plant spacing (s) are the values you have.</li><li><strong>Total plants</strong> = <code>((floor(( − 2 × Border + Area length) ÷ Plant spacing (s)) + 1) × (floor(( − 2 × Border + Area width) ÷ Row spacing (r)) + 1))</code> — the form to use when Border, Area length, Plant spacing (s) and Row spacing (r) are the values you have.</li><li><strong>triangle_rows</strong> = <code>floor((500 ÷ 433) × ( − 2 × Border + Area width) ÷ Plant spacing (s)) + 1</code> — the form to use when Border, Plant spacing (s) and Area width are the values you have.</li><li><strong>triangle_row_spacing</strong> = <code>((433 ÷ 500) × Plant spacing (s))</code> — the form to use when Plant spacing (s) are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Area size, Area length and Area width can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => ''],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Area length and Area width is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Number of rows, Length of hedge and Area size are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Area length left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Area length is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Area width left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Area width is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Area length to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Area length</strong> is a meters quantity: the page opens it in m and converts anything else you pick before the formula runs. Change it and Area width, Area size and Total plants changes with it. Have it to hand before you start: Area length is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Area width</strong> is a meters quantity: the page opens it in m and converts anything else you pick before the formula runs. Change it and Area length, Area size and Total plants changes with it. Have it to hand before you start: Area width is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Area length and Area width. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Area length into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Number of rows with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Number of rows is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The chips cover meters and square meters. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Area length and Area width measured, Number of rows and Length of hedge wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/dna-concentration">DNA concentration</a>, <a href="/biology/dna-copy-number">DNA copy number Calculator</a> and <a href="/biology/dna-molarity-calculator">DNA Molarity Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Plant spacing calculator work out?', 'a' => 'Number of rows, Length of hedge, Area size and Border, from Area length and Area width. The relationship is Area size = Area length × Area width.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Area length (meters), Area width (meters). Fill area length and area width and leave Number of rows empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Area size, Area length, Area width and rows can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Number of rows = 1. Those are the defaults written into the form — move Area length and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Number of rows is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Area length left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Number of rows keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/dna-concentration', 'name' => 'DNA concentration'],
            ['path' => '/biology/dna-copy-number', 'name' => 'DNA copy number Calculator'],
            ['path' => '/biology/dna-molarity-calculator', 'name' => 'DNA Molarity Calculator'],
        ],
        'authors' => [],
    ],
];
