<?php

/**
 * Potting soil
 * /biology/potting-soil-calculator
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Potting soil',
    'meta' => ['title' => 'Potting soil Calculator — Formula, Units & Example', 'description' => 'Enter Width, Depth and Quantity into Potting soil and the answer comes back as Length and Diameter. Width, Depth and Volume of soil needed carry a unit chip…', 'h1' => 'Potting soil Calculator', 'updated' => '2026-09-28'],
    'raw' => [
        'vars' => [
            'd_R' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'd_r' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'depth' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'diameter' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'length' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'quantity' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '1', 'c' => null],
                ],
            ],
            'shape_select' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 't9P1eU3PI9LDaw0KCnXl_', 'c' => null],
                ],
                'ds' => '315',
            ],
            'soil_pot' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.01'],
            ],
            'soil_rect' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.01'],
            ],
            'soil_round' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.01'],
            ],
            'width' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'p4IFDaRdsO0pBWgUOsYiS',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'shape_select',
                                    'vt' => 'valueSelect',
                                    'l' => 'Shape',
                                    'ds' => '315',
                                    'opts' => [
                                        ['t9P1eU3PI9LDaw0KCnXl_', 'Rectangular', '1'],
                                        ['3S4XyMab-r4WWSY1o0FLQ', 'Round', '2'],
                                        ['ghItbntgrHDVeEoY93unU', 'Flower pot (truncated cone)', '3'],
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
                                    'n' => 'length',
                                    'vt' => 'numerical',
                                    'l' => 'Length',
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
                                    'n' => 'width',
                                    'vt' => 'numerical',
                                    'l' => 'Width',
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
                                    'n' => 'depth',
                                    'vt' => 'numerical',
                                    'l' => 'Depth',
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
                                    'n' => 'diameter',
                                    'vt' => 'numerical',
                                    'l' => 'Diameter',
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
                                    'n' => 'd_R',
                                    'vt' => 'numerical',
                                    'l' => 'Diameter across top',
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
                                    'n' => 'd_r',
                                    'vt' => 'numerical',
                                    'l' => 'Diameter across bottom',
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
                                ['t' => 'v', 'n' => 'quantity', 'vt' => 'numerical', 'l' => 'Quantity'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'soil_rect',
                                    'vt' => 'numerical',
                                    'l' => 'Volume of soil needed',
                                    'us' => '20',
                                    'du' => 'liters',
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
                                    'n' => 'soil_round',
                                    'vt' => 'numerical',
                                    'l' => 'Volume of soil needed',
                                    'us' => '20',
                                    'du' => 'liters',
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
                                    'n' => 'soil_pot',
                                    'vt' => 'numerical',
                                    'l' => 'Volume of soil needed',
                                    'us' => '20',
                                    'du' => 'liters',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'soil_rect =  quantity * depth * length * width',
                'var' => [
                    [
                        'l' => 'length',
                        'f' => 'soil_rect/(depth*quantity*width)',
                        'r' => ['soil_rect', 'width', 'depth', 'quantity'],
                    ],
                    [
                        'l' => 'soil_rect',
                        'f' => 'depth*length*quantity*width',
                        'r' => ['length', 'width', 'depth', 'quantity'],
                    ],
                    [
                        'l' => 'width',
                        'f' => 'soil_rect/(depth*length*quantity)',
                        'r' => ['length', 'soil_rect', 'depth', 'quantity'],
                    ],
                    [
                        'l' => 'depth',
                        'f' => 'soil_rect/(length*quantity*width)',
                        'r' => ['length', 'soil_rect', 'width', 'quantity'],
                    ],
                    [
                        'l' => 'quantity',
                        'f' => 'soil_rect/(depth*length*width)',
                        'r' => ['length', 'soil_rect', 'width', 'depth'],
                    ],
                ],
            ],
            [
                'formula' => 'soil_round = quantity *  pi*(diameter/2)^2 *  depth',
                'var' => [
                    [
                        'l' => 'quantity',
                        'f' => '4*soil_round/(PI*depth*pow(diameter, 2))',
                        'r' => ['diameter', 'depth', 'soil_round'],
                    ],
                    [
                        'l' => 'diameter',
                        'f' => '2*sqrt(soil_round/(depth*quantity))/sqrt(PI)',
                        'r' => ['quantity', 'depth', 'soil_round'],
                    ],
                    [
                        'l' => 'depth',
                        'f' => '4*soil_round/(PI*pow(diameter, 2)*quantity)',
                        'r' => ['quantity', 'diameter', 'soil_round'],
                    ],
                    [
                        'l' => 'soil_round',
                        'f' => '(1/4)*PI*depth*pow(diameter, 2)*quantity',
                        'r' => ['quantity', 'diameter', 'depth'],
                    ],
                ],
            ],
            [
                'formula' => 'soil_pot = quantity * (1/3) * pi *  depth * ((d_R/2)^2 + (d_r/2)*(d_R/2) + (d_r/2)^2)',
                'var' => [
                    [
                        'l' => 'd_R',
                        'f' => '-1/2*d_r + (1/2)*sqrt(3)*sqrt(-PI*pow(d_r, 2)*pow(depth, 2)*pow(quantity, 2) + 16*depth*quantity*soil_pot)/(sqrt(PI)*depth*quantity)',
                        'r' => ['soil_pot', 'd_r', 'depth', 'quantity'],
                    ],
                    [
                        'l' => 'soil_pot',
                        'f' => '(1/12)*PI*depth*quantity*(pow(d_R, 2) + d_R*d_r + pow(d_r, 2))',
                        'r' => ['d_R', 'd_r', 'depth', 'quantity'],
                    ],
                    [
                        'l' => 'd_r',
                        'f' => '-1/2*d_R + (1/2)*sqrt(3)*sqrt(-PI*pow(d_R, 2)*pow(depth, 2)*pow(quantity, 2) + 16*depth*quantity*soil_pot)/(sqrt(PI)*depth*quantity)',
                        'r' => ['d_R', 'soil_pot', 'depth', 'quantity'],
                    ],
                    [
                        'l' => 'depth',
                        'f' => '12*soil_pot/(PI*quantity*(pow(d_R, 2) + d_R*d_r + pow(d_r, 2)))',
                        'r' => ['d_R', 'soil_pot', 'd_r', 'quantity'],
                    ],
                    [
                        'l' => 'quantity',
                        'f' => '12*soil_pot/(PI*depth*(pow(d_R, 2) + d_R*d_r + pow(d_r, 2)))',
                        'r' => ['d_R', 'soil_pot', 'd_r', 'depth'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            '315' => [
                'name' => 'pot_shape',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 't9P1eU3PI9LDaw0KCnXl_', 'label' => 'Rectangular', 'value' => '1'],
                    ['uid' => '3S4XyMab-r4WWSY1o0FLQ', 'label' => 'Round', 'value' => '2'],
                    ['uid' => 'ghItbntgrHDVeEoY93unU', 'label' => 'Flower pot (truncated cone)', 'value' => '3'],
                ],
            ],
        ],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Width, Depth and Quantity into Potting soil and the answer comes back as Length and Diameter. The arithmetic is the whole method: Length is worked out from Width by one formula, applied once. Length comes back in centimeters unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Potting soil calculator works', 'html' => <<<'TXT'
            <p>The Potting soil calculator applies one relationship to 4 numbers and reports Length, Diameter and Diameter across top.</p><p>The relationship it solves reads Length = Volume of soil needed ÷ (Depth × Quantity × Width).</p><p>The result panel carries Length, Diameter, Diameter across top and Diameter across bottom, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>Width</strong> — in centimeters</li><li><strong>Depth</strong> — in centimeters</li><li><strong>Quantity</strong> — a plain number, no unit</li><li><strong>Volume of soil needed</strong> — in liters</li></ul><p>The result boxes are Length in centimeters, Diameter in centimeters, Diameter across top in centimeters, Diameter across bottom in centimeters, Volume of soil needed in liters, Volume of soil needed in liters; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Length</strong> = <code>Volume of soil needed ÷ (Depth × Quantity × Width)</code></li><li><strong>Volume of soil needed</strong> = <code>Depth × Length × Quantity × Width</code></li><li><strong>Width</strong> = <code>Volume of soil needed ÷ (Depth × Length × Quantity)</code></li><li><strong>Depth</strong> = <code>Volume of soil needed ÷ (Length × Quantity × Width)</code></li><li><strong>Quantity</strong> = <code>Volume of soil needed ÷ (Depth × Length × Width)</code></li><li><strong>Diameter</strong> = <code>2 × √(Volume of soil needed ÷ (Depth × Quantity)) ÷ √(PI)</code></li></ul><p>Any one of Length, Volume of soil needed and Width can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Width, Depth and Volume of soil needed carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Length, Diameter and Diameter across top are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Convert Width to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Width, Depth and Quantity is what you already know and Length and Diameter is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/cell-surface-area-volume-ratio">Cell Surface Area to Volume Ratio Calculator — Formula &amp; Resul</a>, <a href="/biology/centimorgan-to-percentage">Centimorgan to Percentage Calculator</a> and <a href="/biology/centrifuge-rcf-rpm">Centrifuge RCF to RPM Converter Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Potting soil calculator work out?', 'a' => <<<'TXT'
            Length, Diameter, Diameter across top and Diameter across bottom, from Volume of soil needed, Width, Depth and Quantity. The relationship is Length = Volume of soil needed ÷ (Depth × Quantity × Width).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Width (centimeters), Depth (centimeters), Quantity, Volume of soil needed (liters). Enter width, depth and quantity; Length is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Length, Volume of soil needed, Width and Depth blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => 'Internally Length is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Width blank and the page solves for it, reporting Length instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Length keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/cell-surface-area-volume-ratio', 'name' => 'Cell Surface Area to Volume Ratio Calculator — Formula & Resul'],
            ['path' => '/biology/centimorgan-to-percentage', 'name' => 'Centimorgan to Percentage Calculator'],
            ['path' => '/biology/centrifuge-rcf-rpm', 'name' => 'Centrifuge RCF to RPM Converter Calculator'],
        ],
        'authors' => [],
    ],
];
