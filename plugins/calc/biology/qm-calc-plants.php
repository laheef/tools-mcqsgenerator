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
    'meta' => ['title' => 'Plant spacing Calculator: Formula & Example', 'description' => 'Plant spacing turns type of planting, number of rows and plant grid into area size and total plants. Every box can be solved for, not only the one in the title.', 'h1' => 'Plant spacing Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        Are you planning a landscaping project, or you want to grow an ideal garden? This plant spacing calculator will help you determine how many plants you need for an area, the planting grid and spacing, and even estimate the plants' purchase cost in seconds!
                        TXT],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Planting bed',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gardenHedge',
                            'label' => 'Type of planting',
                            'type' => 'select',
                            'options' => ['Garden grid' => '0', 'Hedgerow' => '1'],
                            'dataset' => 'garden_hedgeDS',
                            'default' => 'Garden grid',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hedgerows',
                            'label' => 'Number of rows',
                            'type' => 'select',
                            'options' => [
                                'Single' => '1',
                                'Double' => '2',
                                'Triple' => '3',
                                'Four' => '4',
                                'Five' => '5',
                            ],
                            'dataset' => 'hedgerowsDS',
                            'control' => 'DROPDOWN',
                            'default' => 'Single',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'garden_grid',
                            'label' => 'Plant grid',
                            'type' => 'select',
                            'options' => ['Square' => '2', 'Rectangular' => '1', 'Triangular' => '0'],
                            'dataset' => 'gridDS',
                            'default' => 'Square',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/plants-spacing-squares.png'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/hedgerow-1.png'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'question',
                            'label' => 'I want to know...',
                            'type' => 'select',
                            'options' => ['How many plants do I need?' => '0', 'How should I arrange my plants?' => '1'],
                            'dataset' => 'questionsDS',
                            'default' => 'How many plants do I need?',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hedge_length',
                            'label' => 'Length of hedge',
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
                            'name' => 'length_bed',
                            'label' => 'Area length',
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
                            'name' => 'width_bed',
                            'label' => 'Area width',
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
                            'name' => 'area_bed',
                            'label' => 'Area size',
                            'type' => 'number',
                            'help' => 'The area size includes the border space.',
                            'unit' => '28',
                            'unit_default' => 'm2',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'boundary',
                            'label' => 'Border',
                            'type' => 'number',
                            'help' => 'The border is the empty space you require along the plot perimeter.',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'plants_1',
                            'label' => 'Total plants',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Spacing',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hedgeplants_total',
                            'label' => 'Total plants',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hedgeplants_per_row',
                            'label' => 'Plants per row',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hedgespacing_plant',
                            'label' => 'Plant spacing (s)',
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
                            'name' => 'hedgespacing_plant1',
                            'label' => 'Plant spacing (s)',
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
                            'name' => 'number_of_plants',
                            'label' => 'Number of plants',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'spacing_row',
                            'label' => 'Row spacing (r)',
                            'type' => 'number',
                            'help' => 'The spacing between rows.',
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
                            'name' => 'spacing_plant',
                            'label' => 'Plant spacing (s)',
                            'type' => 'number',
                            'help' => 'The spacing between plants within a row.',
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
                            'name' => 'plants',
                            'label' => 'Total plants',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'spacing',
                            'label' => 'Plant spacing (s)',
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
                            'name' => 'density',
                            'label' => 'Density',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'density_triangular',
                            'label' => 'Density',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'triangle_plants',
                            'label' => 'Total plants',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rows_1',
                            'label' => 'Total rows',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'plants_per_row_1',
                            'label' => 'Plants per row',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'spacing_row_1',
                            'label' => 'Row spacing (r)',
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
                            'name' => 'spacing_plant_1',
                            'label' => 'Plant spacing (s)',
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
                            'name' => 'plants_square',
                            'label' => 'Total plants',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Plant {{rows.formattedValue}} rows with {{plants_per_row.formattedValue}} plants per row for a total of {{plants.formattedValue}} plants.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Be aware that it is usally easier to plan if rows and plants per row are whole numbers.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        To achieve the triangular grid, plant {{triangle_rows.formattedValue}} rows with {{triangular_row_spacing.formattedValue}} {{spacing.unit}} between rows. On each row, space plants {{spacing.formattedValue}} {{spacing.unit}} apart. Plant {{odd_row_plants.formattedValue}} plants every odd row (rows 1, 3, 5...) and {{even_row_plants.formattedValue}} plants every even row (rows 2, 4, 6...).
                        TXT],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Plant a grid of {{rows_square.formattedValue}} × {{plants_per_row_square.formattedValue}} plants to achieve square spacing.'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Plants cost',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_plants',
                            'label' => 'Total plants',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cost_per_plant',
                            'label' => 'Cost per plant',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'planting_cost',
                            'label' => 'Total plant cost',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
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
                            'name' => 'rows',
                            'label' => 'Total rows',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'plants_per_row',
                            'label' => 'Plants per row',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'triangle_rows',
                            'label' => 'Number of rows triangle',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'triangle_row_spacing',
                            'label' => 'Row spacing triangle',
                            'type' => 'number',
                            'help' => 'This row spacing will allow for equal distances between each plant.',
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
                            'name' => 'odd_row_plants',
                            'label' => 'Plants per odd row',
                            'type' => 'number',
                            'help' => 'On odd rows (1, 3, 5...) place this many plants, starting in the corner.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'even_row_plants',
                            'label' => 'Plants per even row',
                            'type' => 'number',
                            'help' => 'On even rows (2, 4, 6...) place this many plants, staggered from the adjacent rows.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'plants_per_row_square',
                            'label' => 'Plants per row',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rows_square',
                            'label' => 'Rows square',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'triangular_row_spacing',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'area_bed = length_bed * width_bed',
            'results' => ['length_bed' => 'area_bed/width_bed', 'width_bed' => 'area_bed/length_bed', 'area_bed' => 'length_bed*width_bed'],
        ],
        [
            'title' => 'rows = floor((width_bed - boundary*2)/spacing_row+1)',
            'results' => ['rows' => 'floor((-2*boundary + width_bed)/spacing_row) + 1'],
        ],
        [
            'title' => 'plants_per_row = floor((length_bed - boundary*2)/spacing_plant + 1)',
            'results' => ['plants_per_row' => 'floor((-2*boundary + length_bed)/spacing_plant) + 1'],
        ],
        [
            'title' => 'plants = one_way(rows * plants_per_row)',
            'results' => ['plants' => '((floor((-2*boundary + length_bed)/spacing_plant) + 1)*(floor((-2*boundary + width_bed)/spacing_row) + 1))'],
        ],
        [
            'title' => 'triangle_rows = floor((width_bed - boundary*2)/(spacing*0.866) + 1)',
            'results' => ['triangle_rows' => 'floor((500/433)*(-2*boundary + width_bed)/spacing) + 1'],
        ],
        [
            'title' => 'triangle_row_spacing = one_way(spacing * 0.866)',
            'results' => ['triangle_row_spacing' => '((433/500)*spacing)'],
        ],
        [
            'title' => 'odd_row_plants = floor((length_bed - boundary*2)/spacing + 1)',
            'results' => ['odd_row_plants' => 'floor((-2*boundary + length_bed)/spacing) + 1'],
        ],
        [
            'title' => 'even_row_plants = floor((length_bed - boundary*2 - 0.5*spacing)/spacing + 1)',
            'results' => ['even_row_plants' => 'floor((1/2)*(-4*boundary + 2*length_bed - spacing)/spacing) + 1'],
        ],
        [
            'title' => 'triangle_plants = one_way(floor(triangle_rows/2) * even_row_plants + ceil(triangle_rows/2) * odd_row_plants)',
            'results' => ['triangle_plants' => <<<'TXT'
            ((floor((-2*boundary + length_bed)/spacing) + 1)*ceil((1/2)*floor((500/433)*(-2*boundary + width_bed)/spacing) + 1/2) + (floor((1/2)*(-4*boundary + 2*length_bed - spacing)/spacing) + 1)*floor((1/2)*floor((500/433)*(-2*boundary + width_bed)/spacing) + 1/2))
            TXT],
        ],
        [
            'title' => 'plants_1 = rows_1 * plants_per_row_1',
            'results' => ['rows_1' => 'plants_1/plants_per_row_1', 'plants_1' => 'plants_per_row_1*rows_1', 'plants_per_row_1' => 'plants_1/rows_1'],
        ],
        [
            'title' => 'spacing_plant_1 = (length_bed - boundary*2) / plants_per_row_1',
            'results' => ['length_bed' => '2*boundary + plants_per_row_1*spacing_plant_1', 'spacing_plant_1' => '(-2*boundary + length_bed)/plants_per_row_1', 'boundary' => '(1/2)*length_bed - 1/2*plants_per_row_1*spacing_plant_1', 'plants_per_row_1' => '(-2*boundary + length_bed)/spacing_plant_1'],
        ],
        [
            'title' => 'spacing_row_1 = (length_bed - boundary*2) / rows_1',
            'results' => ['rows_1' => '(-2*boundary + length_bed)/spacing_row_1', 'spacing_row_1' => '(-2*boundary + length_bed)/rows_1', 'length_bed' => '2*boundary + rows_1*spacing_row_1', 'boundary' => '(1/2)*length_bed - 1/2*rows_1*spacing_row_1'],
        ],
        [
            'title' => 'rows_square = floor((width_bed - boundary*2)/spacing+1)',
            'results' => ['rows_square' => 'floor((-2*boundary + width_bed)/spacing) + 1'],
        ],
        [
            'title' => 'plants_per_row_square = floor((length_bed - boundary*2)/spacing+1)',
            'results' => ['plants_per_row_square' => 'floor((-2*boundary + length_bed)/spacing) + 1'],
        ],
        [
            'title' => 'plants_square = one_way(rows_square * plants_per_row_square)',
            'results' => ['plants_square' => '((floor((-2*boundary + length_bed)/spacing) + 1)*(floor((-2*boundary + width_bed)/spacing) + 1))'],
        ],
        [
            'title' => 'spacing^2 = 1/density',
            'results' => ['spacing' => 'sqrt(1/density)', 'density' => 'pow(spacing, -2)'],
        ],
        [
            'title' => 'spacing^2 = 2/(sqrt(3)*density_triangular)',
            'results' => ['density_triangular' => '(2/3)*sqrt(3)/pow(spacing, 2)', 'spacing' => '(1/3)*sqrt(2)*pow(3, 3/4)*sqrt(1/density_triangular)'],
        ],
        [
            'title' => 'planting_cost = cost_per_plant * total_plants',
            'results' => ['cost_per_plant' => 'planting_cost/total_plants', 'planting_cost' => 'cost_per_plant*total_plants', 'total_plants' => 'planting_cost/cost_per_plant'],
        ],
        [
            'title' => 'number_of_plants = findNumberOfPlants(hedge_length, hedgerows, hedgespacing_plant)',
            'results' => ['number_of_plants' => 'findNumberOfPlants(hedge_length, hedgerows, hedgespacing_plant)'],
        ],
        [
            'title' => 'hedgeplants_total = hedgeplants_per_row * hedgerows',
            'results' => ['hedgeplants_per_row' => 'hedgeplants_total/hedgerows', 'hedgerows' => 'hedgeplants_total/hedgeplants_per_row', 'hedgeplants_total' => 'hedgeplants_per_row*hedgerows'],
        ],
        [
            'title' => 'hedgespacing_plant1 = hedge_length/hedgeplants_per_row',
            'results' => ['hedgeplants_per_row' => 'hedge_length/hedgespacing_plant1', 'hedge_length' => 'hedgeplants_per_row*hedgespacing_plant1', 'hedgespacing_plant1' => 'hedge_length/hedgeplants_per_row'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("findNumberOfPlants",function(hedge_length,hedgerows,hedgespacing_plant){var recommended_spacing=hedgerows*(hedge_length/hedgespacing_plant);return Math.round(recommended_spacing)});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Plant spacing turns Area length and Area width into Number of rows and Length of hedge. Nothing is looked up on this page: number of rows is computed from area length and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Plant spacing calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Plant spacing: it takes 2 numbers and reports Number of rows, Length of hedge and Area size.</p><p>In the form&#039;s own words, Area size = Area length × Area width.</p><p>What comes back is Number of rows, Length of hedge, Area size and Border — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Area length</strong> — in meters</li><li><strong>Area width</strong> — in meters</li></ul><p>The answers come back as Number of rows, Length of hedge in meters, Area size in square meters, Border in centimeters, Total plants, Total plants, Plants per row, Plant spacing (s) in centimeters, Number of plants, Total plants, Plant spacing (s) in centimeters, Density, Density, Total plants, Total rows, Plants per row, Row spacing (r) in centimeters, Plant spacing (s) in centimeters, Total plants, Total plants, Cost per plant in USD, Total plant cost in USD, Total rows, Plants per row, Number of rows triangle, Row spacing triangle, Plants per odd row, Plants per even row, Plants per row, Rows square. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Type of planting = 0, Plant grid = 2, I want to know… = 0, Plant spacing (s) = 3 cm, Row spacing (r) = 4 cm and Plant spacing (s) = 5 cm — through the same formula and the panel reports <strong>Number of rows</strong> = 1.</p><ul><li><strong>Number of rows</strong> = 1</li></ul><p>That is <strong>Area size</strong> = <code>Area length × Area width</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Number of rows</strong> = 1 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Length of hedge offers 9 units and opens on meters, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Area size</strong> = <code>Area length × Area width</code></li><li><strong>Area length</strong> = <code>Area size ÷ Area width</code></li><li><strong>Area width</strong> = <code>Area size ÷ Area length</code></li><li><strong>Total rows</strong> = <code>floor(( − 2 × Border + Area width) ÷ Row spacing (r)) + 1</code></li><li><strong>Plants per row</strong> = <code>floor(( − 2 × Border + Area length) ÷ Plant spacing (s)) + 1</code></li><li><strong>Total plants</strong> = <code>((floor(( − 2 × Border + Area length) ÷ Plant spacing (s)) + 1) × (floor(( − 2 × Border + Area width) ÷ Row spacing (r)) + 1))</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Area size</strong> = <code>Area length × Area width</code> — the form to use when Area length and Area width are the values you have.</li><li><strong>Area length</strong> = <code>Area size ÷ Area width</code> — the form to use when Area size and Area width are the values you have.</li><li><strong>Area width</strong> = <code>Area size ÷ Area length</code> — the form to use when Area size and Area length are the values you have.</li><li><strong>Total rows</strong> = <code>floor(( − 2 × Border + Area width) ÷ Row spacing (r)) + 1</code> — the form to use when Border, Area width and Row spacing (r) are the values you have.</li><li><strong>Plants per row</strong> = <code>floor(( − 2 × Border + Area length) ÷ Plant spacing (s)) + 1</code> — the form to use when Border, Area length and Plant spacing (s) are the values you have.</li><li><strong>Total plants</strong> = <code>((floor(( − 2 × Border + Area length) ÷ Plant spacing (s)) + 1) × (floor(( − 2 × Border + Area width) ÷ Row spacing (r)) + 1))</code> — the form to use when Border, Area length, Plant spacing (s) and Area width are the values you have.</li><li><strong>Number of rows triangle</strong> = <code>floor((500 ÷ 433) × ( − 2 × Border + Area width) ÷ Plant spacing (s)) + 1</code> — the form to use when Border, Area width and Plant spacing (s) are the values you have.</li><li><strong>Row spacing triangle</strong> = <code>((433 ÷ 500) × Plant spacing (s))</code> — the form to use when Plant spacing (s) are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Area size, Area length and Area width can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => ''],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Area length and Area width is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Number of rows, Length of hedge and Area size are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Area length left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Area length is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Area width left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Area width is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Area length to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Area length</strong> is a meters quantity: the page opens it in m and converts anything else you pick before the formula runs. Change it and Area width, Area size and Plants per row changes with it. Have it to hand before you start: Area length is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Area width</strong> is a meters quantity: the page opens it in m and converts anything else you pick before the formula runs. Change it and Area length, Area size and Total rows changes with it. Have it to hand before you start: Area width is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Area length and Area width. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Area length into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Number of rows with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Number of rows is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The chips cover meters and square meters. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Area length and Area width measured, Number of rows and Length of hedge wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Plant spacing calculator work out?', 'a' => 'Number of rows, Length of hedge, Area size and Border, from Area length and Area width. The relationship is Area size = Area length × Area width.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Area length (meters), Area width (meters). Fill area length and area width and leave Number of rows empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Area size, Area length, Area width and Total rows can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
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
