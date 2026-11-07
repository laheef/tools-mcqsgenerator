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
    'meta' => ['title' => 'Plant spacing Calculator — Formula & Results', 'description' => '<strong>area length</strong> is what the Plant spacing calculator works out, and it gets there from the area width, the area size, the border and the total…', 'h1' => 'Plant spacing Calculator', 'updated' => '2026-09-28'],
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
                                [
                                    't' => 'v',
                                    'n' => 'density',
                                    'vt' => 'numerical',
                                    'l' => 'Density',
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
                                    'n' => 'density_triangular',
                                    'vt' => 'numerical',
                                    'l' => 'Density',
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
        <strong>area length</strong> is what the Plant spacing calculator works out, and it gets there from the area width, the area size, the border and the total plants.
        TXT,
        'sections' => [
            ['title' => 'How does the Plant spacing calculator work?', 'html' => <<<'TXT'
            <p>The Plant spacing calculator takes the values in the form, applies the relationship described below and reports <strong>area length</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the type of planting, number of rows and the plant grid); then you type in the area width, the area size, the border and the total plants (Planting bed).</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 2 options, such as garden grid and hedgerow. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>Pick the option that matches your case — 5 options, such as single, double and triple. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>Pick the option that matches your case — 3 options, such as square, rectangular and triangular. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>Pick the option that matches your case — 2 options, such as how many plants do I need? and how should I arrange my plants?. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li> The unit chip switches it to any of the 34 supported units.</li><li>A measured quantity, entered by default in square meters. The unit chip switches it to any of the 24 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li><li> The unit chip switches it to any of the 34 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li><li>A measured quantity, entered by default in square meters. The unit chip switches it to any of the 24 supported units.</li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li></ul><p>4 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Type of planting</strong></td><td>One of 2 options, such as garden grid and hedgerow.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Number of rows</strong></td><td>One of 5 options, such as single, double and triple.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Plant grid</strong></td><td>One of 3 options, such as square, rectangular and triangular.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Length of hedge</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>Calculated</td></tr><tr><td><strong>Area length</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>Calculated</td></tr><tr><td><strong>Area width</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>You supply it</td></tr><tr><td><strong>Area size</strong></td><td>A measured quantity, 24 units available.</td><td>square meters</td><td>You supply it</td></tr><tr><td><strong>Border</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Total plants (Planting bed)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Total plants (Spacing)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Plants per row (Spacing)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Plant spacing (s) (Spacing)</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Plant spacing (s) (Spacing)</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Number of plants</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Row spacing (r) (Spacing)</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Plant spacing (s) (Spacing)</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Total plants (Spacing)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Plant spacing (s) (Spacing)</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>Calculated</td></tr><tr><td><strong>Density (Spacing)</strong></td><td>A measured quantity, 24 units available.</td><td>square meters</td><td>You supply it</td></tr><tr><td><strong>Density (Spacing)</strong></td><td>A measured quantity, 24 units available.</td><td>square meters</td><td>Calculated</td></tr><tr><td><strong>Total plants (Spacing)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Total rows (Spacing)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Plants per row (Spacing)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Row spacing (r) (Spacing)</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>Calculated</td></tr></tbody></table><p>The table lists the first 24 of 37 fields; the rest follow the same pattern.</p>
            TXT],
            ['title' => 'The formula behind the Plant spacing calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Area length</span><span class="formula-eq">=</span><span class="formula-rhs">area size ÷ area width</span></div><div class="formula-row"><span class="formula-lhs">Total rows</span><span class="formula-eq">=</span><span class="formula-rhs">rounded down, ((-2 × border + area width) ÷ row spacing (r)) + 1</span></div><div class="formula-row"><span class="formula-lhs">Plants per row</span><span class="formula-eq">=</span><span class="formula-rhs">rounded down, ((-2 × border + area length) ÷ plant spacing (s)) + 1</span></div><div class="formula-row"><span class="formula-lhs">Total plants</span><span class="formula-eq">=</span><span class="formula-rhs">((rounded down, ((-2 × border + area length) ÷ plant spacing (s)) + 1) × (rounded down, ((-2 × border + area width) ÷ row spacing (r)) + 1))</span></div><div class="formula-row"><span class="formula-lhs">Number of rows triangle</span><span class="formula-eq">=</span><span class="formula-rhs">rounded down, ((500 ÷ 433) × (-2 × border + area width) ÷ plant spacing (s)) + 1</span></div><div class="formula-row"><span class="formula-lhs">Row spacing triangle</span><span class="formula-eq">=</span><span class="formula-rhs">((433 ÷ 500) × plant spacing (s))</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in meters, and convertible to any of the 34 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in meters, and convertible to any of the 34 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in centimeters, and convertible to any of the 34 units on that chip.</li><li>Shown in centimeters, and convertible to any of the 34 units on that chip.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in meters</li><li>Length, opening in meters</li><li>Length, opening in meters</li><li>Area, opening in square meters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Plant spacing calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Putting a biological quantity into a scale you can picture</li><li>Comparing two organisms, populations or processes</li><li>Supporting a lesson, a lecture or a field note</li><li>Any time the same 4 figures keep coming back — the area width, the area size and the border — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li><li>Write the answer down with its unit. </li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/potting-soil-calculator">Potting soil</a>, <a href="/biology/protein-concentration">Protein concentration</a> and <a href="/biology/protein-molecular-weight">Protein molecular weight</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Plant spacing calculator work out?', 'a' => <<<'TXT'
            It returns area length, derived from the area width, the area size and the border. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Plant spacing calculator?', 'a' => <<<'TXT'
            The form asks for the area width, the area size, the border and the total plants, which is 17 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter length of hedge in a different unit?', 'a' => <<<'TXT'
            Yes. Length of hedge opens in meters and the chip beside it offers 34 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There are several choices to make (4 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'Is the Plant spacing calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/potting-soil-calculator', 'name' => 'Potting soil'],
            ['path' => '/biology/protein-concentration', 'name' => 'Protein concentration'],
            ['path' => '/biology/protein-molecular-weight', 'name' => 'Protein molecular weight'],
        ],
    ],
];
