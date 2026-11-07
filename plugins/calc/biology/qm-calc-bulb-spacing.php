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
    'meta' => ['title' => 'Bulb spacing Calculator — Formula & Results', 'description' => 'Supply the width, the border, the area and the row spacing and the Bulb spacing calculator solves for <strong>length</strong>. The Bulb spacing calculator…', 'h1' => 'Bulb spacing Calculator', 'updated' => '2026-08-12'],
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
                                [
                                    't' => 'v',
                                    'n' => 'border',
                                    'vt' => 'numerical',
                                    'l' => 'Border',
                                    'us' => '4',
                                    'du' => 'm',
                                ],
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
        'intro' => 'Supply the width, the border, the area and the row spacing and the Bulb spacing calculator solves for <strong>length</strong>.',
        'sections' => [
            ['title' => 'How does the Bulb spacing calculator work?', 'html' => <<<'TXT'
            <p>The Bulb spacing calculator takes the values in the form, applies the relationship described below and reports <strong>length</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the plant grid and the plant select); then you type in the width, the border, the area and the row spacing (r).</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 2 options, such as rectangular and triangle. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li> The unit chip switches it to any of the 34 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li><li>A measured quantity, entered by default in square meters. The unit chip switches it to any of the 24 supported units.</li><li>Pick the option that matches your case — 14 options, such as allium, anemones and bluebells. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li> The unit chip switches it to any of the 34 supported units.</li></ul><p>2 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Plant grid</strong></td><td>One of 2 options, such as rectangular and triangle.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Length</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>Calculated</td></tr><tr><td><strong>Width</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>You supply it</td></tr><tr><td><strong>Border</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>You supply it</td></tr><tr><td><strong>Area</strong></td><td>A measured quantity, 24 units available.</td><td>square meters</td><td>You supply it</td></tr><tr><td><strong>Plant select</strong></td><td>One of 14 options, such as allium, anemones and bluebells.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Plant spacing (s)</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>Calculated</td></tr><tr><td><strong>Row spacing (r)</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Number of plants (Plant information)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Number of plants (Plant information)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Triangle rows</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Triangle row spacing</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>Calculated</td></tr><tr><td><strong>Even row plants</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Odd row plants</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Rows</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Plants per row</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Bulb spacing calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Length</span><span class="formula-eq">=</span><span class="formula-rhs">area ÷ width</span></div><div class="formula-row"><span class="formula-lhs">Triangle rows</span><span class="formula-eq">=</span><span class="formula-rhs">rounded down, ((500 ÷ 433) × (-2 × border + width) ÷ plant spacing (s)) + 1</span></div><div class="formula-row"><span class="formula-lhs">Triangle row spacing</span><span class="formula-eq">=</span><span class="formula-rhs">((433 ÷ 500) × plant spacing (s))</span></div><div class="formula-row"><span class="formula-lhs">Odd row plants</span><span class="formula-eq">=</span><span class="formula-rhs">rounded down, ((-2 × border + length) ÷ plant spacing (s)) + 1</span></div><div class="formula-row"><span class="formula-lhs">Even row plants</span><span class="formula-eq">=</span><span class="formula-rhs">rounded down, ((1 ÷ 2) × (-4 × border + 2 × length − plant spacing (s)) ÷ plant spacing (s)) + 1</span></div><div class="formula-row"><span class="formula-lhs">Number of plants</span><span class="formula-eq">=</span><span class="formula-rhs">((rounded down, ((-2 × border + length) ÷ plant spacing (s)) + 1) × rounded up, ((1 ÷ 2) × rounded down, ((500 ÷ 433) × (-2 × border + width) ÷ plant spacing (s)) + 1 ÷ 2) + (rounded down, ((1 ÷ 2) × (-4 × border + 2 × length − plant spacing (s)) ÷ plant spacing (s)) + 1) × rounded down, ((1 ÷ 2) × rounded down, ((500 ÷ 433) × (-2 × border + width) ÷ plant spacing (s)) + 1 ÷ 2))</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in meters, and convertible to any of the 34 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in meters, and convertible to any of the 34 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in centimeters, and convertible to any of the 34 units on that chip.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in meters</li><li>Length, opening in meters</li><li>Length, opening in meters</li><li>Area, opening in square meters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in meters</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Bulb spacing calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Supporting a lesson, a lecture or a field note</li><li>Comparing two organisms, populations or processes</li><li>Putting a biological quantity into a scale you can picture</li><li>Any time the same 4 figures keep coming back — the width, the border and the area — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/cat-age">Cat age</a>, <a href="/biology/cat-benadryl-dosage">Cat Benadryl dosage</a> and <a href="/biology/cat-bmi">Cat BMI</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Bulb spacing calculator work out?', 'a' => <<<'TXT'
            It returns length, derived from the width, the border and the area. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Bulb spacing calculator?', 'a' => <<<'TXT'
            The form asks for the width, the border, the area and the row spacing, which is 6 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter length in a different unit?', 'a' => <<<'TXT'
            Yes. Length opens in meters and the chip beside it offers 34 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There are several choices to make (2 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'What is a typical result?', 'a' => <<<'TXT'
            With the values the page starts from, the calculator reports Plant spacing (s) = 0 cm. Treat that as a reference point rather than a recommendation: it exists so you can tell at a glance whether your own inputs are on the same scale.
            TXT],
            ['q' => 'Is the Bulb spacing calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/cat-age', 'name' => 'Cat age'],
            ['path' => '/biology/cat-benadryl-dosage', 'name' => 'Cat Benadryl dosage'],
            ['path' => '/biology/cat-bmi', 'name' => 'Cat BMI'],
        ],
    ],
];
