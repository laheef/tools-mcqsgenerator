<?php

/**
 * Bulb spacing
 * /biology/bulb-spacing
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Bulb spacing',
    'meta' => ['title' => 'Bulb spacing Calculator — Formula & Results', 'description' => 'Bulb spacing turns plant grid, length and width into area and number of plants. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Bulb spacing Calculator', 'updated' => '2026-08-12'],
    'raw' => [
        'vars' => [
            'area' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'border' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'even_row_plants' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'length' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'odd_row_plants' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'plant_grid' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'vs2EMycLiGr81S6xh3gq_', 'c' => null],
                ],
                'ds' => 'LeJPFH1--tbE2eGWY_G9s',
            ],
            'plant_select' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'GmfVGCFfWzbCmtOdryWvG', 'c' => null],
                ],
                'ds' => 'wzTgIAwBbIqkC1ueDYG2j',
            ],
            'plant_spacing' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'plants' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.1'],
            ],
            'plants_per_row' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'row_spacing' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'rows' => [
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
            'width' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'bmXTAW12SoD2gJtM8sQHF',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'plant_grid',
                                    'vt' => 'valueSelect',
                                    'l' => 'Plant grid',
                                    'ds' => 'LeJPFH1--tbE2eGWY_G9s',
                                    'opts' => [
                                        ['vs2EMycLiGr81S6xh3gq_', 'Rectangular', '1'],
                                        ['Fou7nfktaiq3Ci70oQJw5', 'Triangle', '2'],
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
                                    'u' => ['plants-spacing-rectangles.png'],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1_FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'length',
                                    'vt' => 'numerical',
                                    'l' => 'Length',
                                    'us' => '4',
                                    'du' => 'm',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'width',
                                    'vt' => 'numerical',
                                    'l' => 'Width',
                                    'us' => '4',
                                    'du' => 'm',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1_FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'border', 'vt' => 'numerical', 'l' => 'Border'],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'area',
                                    'vt' => 'numerical',
                                    'l' => 'Area',
                                    'us' => '28',
                                    'du' => 'm2',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'vI4bPuhBVBHSaGLlj0kjo',
                'title' => 'Plant information',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'plant_select',
                                    'vt' => 'valueSelect',
                                    'l' => 'Plant select',
                                    'ds' => 'wzTgIAwBbIqkC1ueDYG2j',
                                    'opts' => [
                                        ['GmfVGCFfWzbCmtOdryWvG', 'Allium', '1'],
                                        ['MTpHE1VFqioaezTwnyGyO', 'Anemones', '2'],
                                        ['Sjo_bVdJHR95-p_X97BPy', 'Bluebells', '3'],
                                        ['8H8thqA3BzmwG-1AAwodm', 'Crocus', '4'],
                                        ['oQqPPA3da8hHuKjI6-XaT', 'Cyclamen', '5'],
                                        ['vGwkaUYsiDu_r7MTLJXAl', 'Daffodil', '6'],
                                        ['JwhgnV3rPzFhe2CMdsXyv', 'Dwarf Daffodil', '7'],
                                        ['pfuO8kC9FD09i6gZ-kiOp', 'Fritillaria', '8'],
                                        ['5xRVrXDuvK_g5VAuqhffP', 'Hyacinths', '9'],
                                        ['lXygS6Cek2-zBTLC7nerE', 'Iris Reticulata', '10'],
                                        ['tFvslhn4scEFHIbnaCoVO', 'Muscari', '11'],
                                        ['X6iOf1qllM6ND8W-aJDZG', 'Snowdrops', '12'],
                                        ['Xs97OgZzsXynG8ZrpcOQ5', 'Tulips', '13'],
                                        ['IaQbOlX4M8Gn0Mc9UcabQ', 'Custom plant', '14'],
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
                                    'n' => 'plant_spacing',
                                    'vt' => 'dependent',
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
                                    'n' => 'row_spacing',
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
                                ['t' => 'v', 'n' => 'triangle_plants', 'vt' => 'numerical', 'l' => 'Number of plants'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'plants', 'vt' => 'numerical', 'l' => 'Number of plants'],
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
                                        ['plant_select == 1', <<<'TXT'
                                        Allium Type: Perennial Height: 30-90 cm (12-36 in) Width: 8-10 cm (3-4 in) Spacing: 10 cm (4 in) Plant in: Mid-summer to early autumn Flowers in: Spring or early autumn Plant likes: Full sun, semi-shade, and moist soil
                                        TXT],
                                        ['plant_select == 2', <<<'TXT'
                                        Anemone (Wildflowers) Type: Perennial Height: 30-100 cm (12-39 in) Width: 15-23 cm (6-9 in) Spacing: 5-8 cm (2-3 in) Plant in: Spring or early autumn, depending on species Flowers in: Spring or Sept, depending on species Plant likes: Full sun, semi-shade, and shade
                                        TXT],
                                        ['plant_select == 3', <<<'TXT'
                                        Bluebells Type: Perennial Height: 50 cm (20 in) Width: 10 cm (4 in) Spacing: 5-8 cm (2-3 in) Plant in: Sep-Oct Flowers in: Apr-May Plant likes: Semi-shade and shade
                                        TXT],
                                        ['plant_select == 4', <<<'TXT'
                                        Crocus Type: Perennial Height: 10-40 cm (4-16 in) Width: 5 cm (2 in) Spacing: 8-10 cm (3-4 in) Plant in: Aug-Nov Flowers in: Feb-Apr Plant likes: Full sun, semi-shade, and moist soil
                                        TXT],
                                        ['plant_select == 5', <<<'TXT'
                                        Cyclamen Type: Perennial Height: 5-13 cm (2-5 in) Width: 8-15 cm (3-6 in) Spacing: 3 cm (1 in) Plant in: Spring and from Autumn until the first frost Flowers in: Oct-Nov Plant likes: Semi-shade and shade
                                        TXT],
                                        ['plant_select == 6', <<<'TXT'
                                        Daffodil (Narcissus) Type: Perennial Height: 40-45 cm (16-18 in) Width: 5-8 cm (2-3 in) Spacing: 10-20 cm (4-8 in) Plant in: Autumn Flowers in: Feb-May Plant likes: Full sun, semi-shade, and moist soil
                                        TXT],
                                        ['plant_select == 7', <<<'TXT'
                                        Dwarf Daffodil (Narcissus) Type: Perennial Height: 5–8 cm (2-3 in) Width: 5-8 cm (2-3 in) Spacing: 10-15 cm (4-6 in) Plant in: Autumn Flowers in: Feb-May Plant likes: Full sun, semi-shade, and moist soil
                                        TXT],
                                        ['plant_select == 8', <<<'TXT'
                                        Fritillaria Type: Perennial Height: 30-150 cm (12-60 in) Width: 10-50 cm (4-20 in) Spacing: 10-15 cm (4-6 in) Plant in: Sep-Oct Flowers in: Apr-May Plant likes: Semi-shade, shade, and moist soil
                                        TXT],
                                        ['plant_select == 9', <<<'TXT'
                                        Hyacinths Type: Perennial Height: 20-30 cm (8-12 in) Width: 10 cm (4 in) Spacing: 10 cm (4 in) Plant in: Sep-Nov Flowers in: Dec-Apr Plant likes: Full sun, semi-shade, and moist soil
                                        TXT],
                                        ['plant_select == 10', <<<'TXT'
                                        Iris Type: Perennial Height: 15-50 cm (6-20 in) Width: 8-10 cm (3-4 in) Spacing: 5-10 cm (2-4 in) Plant in: Autumn Flowers in: Apr-Jun Plant likes: Full sun, semi-shade, and moist soil
                                        TXT],
                                        ['plant_select == 11', <<<'TXT'
                                        Muscari (Grape hyacinth) Type: Perennial Height: 20 cm (8 in) Width: 5 cm (2 in) Spacing: 10 cm (4 in) Plant in: Sep-Nov Flowers in: Apr-May Plant likes: Full sun and semi-shade
                                        TXT],
                                        ['plant_select == 12', <<<'TXT'
                                        Snowdrops Type: Perennial Height: 15-30 cm (6-12 in) Width: 20 cm (8 in) Spacing: 8-10 cm (3-4 in) Plant in: Apr-May Flowers in: Jan-Mar Plant likes: Semi-shade, shade, and moist soil
                                        TXT],
                                        ['plant_select == 13', <<<'TXT'
                                        Tulips Type: Perennial Height: 25-60 cm (10-24 in) Width: 15 cm (6 in) Spacing: 10-15 cm (4-6 in) Plant in: Oct-Nov Flowers in: Mar-May Plant likes: Full sun, semi-shade, and moist soil
                                        TXT],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'wjZKhlYGfT86R9-UQ7Lwm',
                'title' => 'hidden parameters',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'triangle_rows', 'vt' => 'numerical', 'l' => 'Triangle rows'],
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
                                    'l' => 'Triangle row spacing',
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
                                ['t' => 'v', 'n' => 'even_row_plants', 'vt' => 'numerical', 'l' => 'Even row plants'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'odd_row_plants', 'vt' => 'numerical', 'l' => 'Odd row plants'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'rows', 'vt' => 'numerical', 'l' => 'Rows'],
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
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'area = length * width',
                'var' => [
                    [
                        'l' => 'length',
                        'f' => 'area/width',
                        'r' => ['area', 'width'],
                    ],
                    [
                        'l' => 'area',
                        'f' => 'length*width',
                        'r' => ['length', 'width'],
                    ],
                    [
                        'l' => 'width',
                        'f' => 'area/length',
                        'r' => ['length', 'area'],
                    ],
                ],
            ],
            [
                'formula' => 'triangle_rows = floor((width - border*2)/(plant_spacing*0.866) + 1)',
                'var' => [
                    [
                        'l' => 'triangle_rows',
                        'f' => 'floor((500/433)*(-2*border + width)/plant_spacing) + 1',
                        'r' => ['border', 'plant_spacing', 'width'],
                    ],
                ],
            ],
            [
                'formula' => 'triangle_row_spacing = one_way(plant_spacing* 0.866)',
                'var' => [
                    [
                        'l' => 'triangle_row_spacing',
                        'f' => '((433/500)*plant_spacing)',
                        'r' => ['plant_spacing'],
                    ],
                ],
            ],
            [
                'formula' => 'odd_row_plants = floor((length - border*2)/plant_spacing+ 1)',
                'var' => [
                    [
                        'l' => 'odd_row_plants',
                        'f' => 'floor((-2*border + length)/plant_spacing) + 1',
                        'r' => ['border', 'length', 'plant_spacing'],
                    ],
                ],
            ],
            [
                'formula' => 'even_row_plants = floor((length - border*2 - 0.5*plant_spacing)/plant_spacing+ 1)',
                'var' => [
                    [
                        'l' => 'even_row_plants',
                        'f' => 'floor((1/2)*(-4*border + 2*length - plant_spacing)/plant_spacing) + 1',
                        'r' => ['border', 'length', 'plant_spacing'],
                    ],
                ],
            ],
            [
                'formula' => 'triangle_plants = one_way(floor(triangle_rows/2) * even_row_plants + ceil(triangle_rows/2) * odd_row_plants)',
                'var' => [
                    [
                        'l' => 'triangle_plants',
                        'f' => <<<'TXT'
                        ((floor((-2*border + length)/plant_spacing) + 1)*ceil((1/2)*floor((500/433)*(-2*border + width)/plant_spacing) + 1/2) + (floor((1/2)*(-4*border + 2*length - plant_spacing)/plant_spacing) + 1)*floor((1/2)*floor((500/433)*(-2*border + width)/plant_spacing) + 1/2))
                        TXT,
                        'r' => ['border', 'length', 'plant_spacing', 'width'],
                    ],
                ],
            ],
            [
                'formula' => 'rows = floor((width - border*2)/row_spacing+1)',
                'var' => [
                    [
                        'l' => 'rows',
                        'f' => 'floor((-2*border + width)/row_spacing) + 1',
                        'r' => ['border', 'row_spacing', 'width'],
                    ],
                ],
            ],
            [
                'formula' => 'plants_per_row = floor((length - border*2)/plant_spacing+1)',
                'var' => [
                    [
                        'l' => 'plants_per_row',
                        'f' => 'floor((-2*border + length)/plant_spacing) + 1',
                        'r' => ['border', 'length', 'plant_spacing'],
                    ],
                ],
            ],
            [
                'formula' => 'plants = one_way(rows * plants_per_row)',
                'var' => [
                    [
                        'l' => 'plants',
                        'f' => '((floor((-2*border + length)/plant_spacing) + 1)*(floor((-2*border + width)/row_spacing) + 1))',
                        'r' => [
                            'border',
                            'length',
                            'plant_spacing',
                            'row_spacing',
                            'width',
                        ],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'LeJPFH1--tbE2eGWY_G9s' => [
                'name' => 'plant_grid',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'vs2EMycLiGr81S6xh3gq_', 'label' => 'Rectangular', 'value' => '1'],
                    ['uid' => 'Fou7nfktaiq3Ci70oQJw5', 'label' => 'Triangle', 'value' => '2'],
                ],
            ],
            'wzTgIAwBbIqkC1ueDYG2j' => [
                'name' => 'plant_spacing',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'GmfVGCFfWzbCmtOdryWvG', 'label' => 'Allium', 'value' => '1'],
                    ['uid' => 'MTpHE1VFqioaezTwnyGyO', 'label' => 'Anemones', 'value' => '2'],
                    ['uid' => 'Sjo_bVdJHR95-p_X97BPy', 'label' => 'Bluebells', 'value' => '3'],
                    ['uid' => '8H8thqA3BzmwG-1AAwodm', 'label' => 'Crocus', 'value' => '4'],
                    ['uid' => 'oQqPPA3da8hHuKjI6-XaT', 'label' => 'Cyclamen', 'value' => '5'],
                    ['uid' => 'vGwkaUYsiDu_r7MTLJXAl', 'label' => 'Daffodil', 'value' => '6'],
                    ['uid' => 'JwhgnV3rPzFhe2CMdsXyv', 'label' => 'Dwarf Daffodil', 'value' => '7'],
                    ['uid' => 'pfuO8kC9FD09i6gZ-kiOp', 'label' => 'Fritillaria', 'value' => '8'],
                    ['uid' => '5xRVrXDuvK_g5VAuqhffP', 'label' => 'Hyacinths', 'value' => '9'],
                    ['uid' => 'lXygS6Cek2-zBTLC7nerE', 'label' => 'Iris Reticulata', 'value' => '10'],
                    ['uid' => 'tFvslhn4scEFHIbnaCoVO', 'label' => 'Muscari', 'value' => '11'],
                    ['uid' => 'X6iOf1qllM6ND8W-aJDZG', 'label' => 'Snowdrops', 'value' => '12'],
                    ['uid' => 'Xs97OgZzsXynG8ZrpcOQ5', 'label' => 'Tulips', 'value' => '13'],
                    ['uid' => 'IaQbOlX4M8Gn0Mc9UcabQ', 'label' => 'Custom plant', 'value' => '14'],
                ],
            ],
        ],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        Bulb spacing works out Plant spacing (s) from Plant grid, Length and Width. Nothing is looked up on this page: plant spacing (s) is computed from plant grid and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Plant spacing (s) is opened in centimeters; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Bulb spacing calculator works', 'html' => <<<'TXT'
            <p>Bulb spacing answers one question from 9 numbers, and the answer is Plant spacing (s).</p><p>The relationship it solves reads Area = Length × Width.</p><p>The answers are Plant spacing (s); they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 9 boxes and the page has everything it needs.</p><ul><li><strong>Plant grid</strong> — a plain number, no unit</li><li><strong>Length</strong> — in meters</li><li><strong>Width</strong> — in meters</li><li><strong>Border</strong> — in meters</li><li><strong>Area</strong> — in square meters</li><li><strong>Plant select</strong> — a plain number, no unit</li><li><strong>Row spacing (r)</strong> — in centimeters</li><li><strong>Number of plants</strong> — a plain number, no unit</li><li><strong>Number of plants</strong> — a plain number, no unit</li></ul><p>The answer comes back as Plant spacing (s) in centimeters. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Plant spacing (s) lists 31 options and opens on centimeters. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Area</strong> = <code>Length × Width</code></li><li><strong>Length</strong> = <code>Area ÷ Width</code></li><li><strong>Width</strong> = <code>Area ÷ Length</code></li><li><strong>triangle_rows</strong> = <code>floor((500 ÷ 433) × ( − 2 × Border + Width) ÷ Plant spacing (s)) + 1</code></li><li><strong>triangle_row_spacing</strong> = <code>((433 ÷ 500) × Plant spacing (s))</code></li><li><strong>odd_row_plants</strong> = <code>floor(( − 2 × Border + Length) ÷ Plant spacing (s)) + 1</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Area</strong> = <code>Length × Width</code> — the form to use when Length and Width are the values you have.</li><li><strong>Length</strong> = <code>Area ÷ Width</code> — the form to use when Area and Width are the values you have.</li><li><strong>Width</strong> = <code>Area ÷ Length</code> — the form to use when Length and Area are the values you have.</li><li><strong>triangle_rows</strong> = <code>floor((500 ÷ 433) × ( − 2 × Border + Width) ÷ Plant spacing (s)) + 1</code> — the form to use when Border, Plant spacing (s) and Width are the values you have.</li><li><strong>triangle_row_spacing</strong> = <code>((433 ÷ 500) × Plant spacing (s))</code> — the form to use when Plant spacing (s) are the values you have.</li><li><strong>odd_row_plants</strong> = <code>floor(( − 2 × Border + Length) ÷ Plant spacing (s)) + 1</code> — the form to use when Border, Length and Plant spacing (s) are the values you have.</li><li><strong>even_row_plants</strong> = <code>floor((1 ÷ 2) × ( − 4 × Border + 2 × Length − Plant spacing (s)) ÷ Plant spacing (s)) + 1</code> — the form to use when Border, Length and Plant spacing (s) are the values you have.</li><li><strong>rows</strong> = <code>floor(( − 2 × Border + Width) ÷ Row spacing (r)) + 1</code> — the form to use when Border, Row spacing (r) and Width are the values you have.</li></ul><p>Any one of Area, Length and Width can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Length, Width and Border carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Plant spacing (s) is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Plant grid left as a guess.</strong> Anything typed into Plant grid is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Length left as a guess.</strong> Anything typed into Length is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Plant grid to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Plant grid</strong> takes a plain number with no unit attached. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Plant grid is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Length</strong> is a meters quantity: the page opens it in m and converts anything else you pick before the formula runs. Change it and Area, Width and Number of plants changes with it. Have it to hand before you start: Length is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Width</strong> is a meters quantity: the page opens it in m and converts anything else you pick before the formula runs. Change it and Length, Area and Number of plants changes with it. Have it to hand before you start: Width is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Border</strong> is a meters quantity: the page opens it in m and converts anything else you pick before the formula runs. Change it and Number of plants and Number of plants changes with it. Have it to hand before you start: Border is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Area</strong> is a square meters quantity: the page opens it in m2 and converts anything else you pick before the formula runs. Change it and Length and Width changes with it. Have it to hand before you start: Area is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Plant select</strong> takes a plain number with no unit attached. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Plant select is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Row spacing (r)</strong> is a centimeters quantity: the page opens it in cm and converts anything else you pick before the formula runs. Change it and Number of plants changes with it. Have it to hand before you start: Row spacing (r) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Number of plants</strong> takes a plain number with no unit attached. Have it to hand before you start: Number of plants is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Number of plants</strong> takes a plain number with no unit attached. Have it to hand before you start: Number of plants is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Plant spacing (s)</strong> is a centimeters figure. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>centimeters</strong> — 31 units. It opens in <em>cm</em>, and the chip also carries in, m, ft, Å, nm and pm. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>square meters</strong> — 24 units. It opens in <em>m2</em>, and the chip also carries ac, m², ft², cm², in² and a. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Plant spacing (s) is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are centimeters and square meters and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Plant grid, Length and Width are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Plant grid, Length and Width is what you already know and Plant spacing (s) is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/amino-acid-composition">Amino Acid Composition Calculator</a>, <a href="/biology/animal-mortality-rate">Animal mortality rate</a> and <a href="/biology/annealing-temperature">Annealing temperature Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Bulb spacing calculator work out?', 'a' => 'Plant spacing (s), from Length and Width. The relationship is Area = Length × Width.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Plant grid, Length (meters), Width (meters), Border (meters), Area (square meters). Fill plant grid, length and width and leave Plant spacing (s) empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Area, Length, Width and triangle_rows blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Plant spacing (s) is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Plant grid left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Plant spacing (s) keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/amino-acid-composition', 'name' => 'Amino Acid Composition Calculator'],
            ['path' => '/biology/animal-mortality-rate', 'name' => 'Animal mortality rate'],
            ['path' => '/biology/annealing-temperature', 'name' => 'Annealing temperature Calculator'],
        ],
        'authors' => [],
    ],
];
