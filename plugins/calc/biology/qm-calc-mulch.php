<?php

/**
 * Mulch
 * /biology/mulch
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Mulch',
    'meta' => ['title' => 'Mulch Calculator: Formula, Steps & Examples', 'description' => 'The Mulch calculator turns the length, the width and more into <strong>area (Mulch calculations)</strong>. The Mulch calculator takes the values in the form…', 'h1' => 'Mulch Calculator', 'updated' => '2026-08-12'],
    'raw' => [
        'vars' => [
            'Shape' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => '_RXgU1SOlZH4BwWXx-zPS', 'c' => null],
                ],
                'ds' => '2093',
            ],
            'area' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.000001'],
            ],
            'areaCircle' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'areaRectangle' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'bagOrVolPricing' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'XqhyNjwhKsFA4vcqKmK2D', 'c' => null],
                ],
                'ds' => '4Osm__4SmTzlcdGUXktxz',
            ],
            'bagPrice' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'bagPriceCirc' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'bagPriceRect' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'bagSize' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'bagsCirc' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
            ],
            'bagsNeeded' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
            ],
            'bagsRect' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
            ],
            'cost' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'costCirc' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'costCircleVol' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'costPerm3' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'costRect' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'costRectVol' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'costVol' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'density' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '475', 'c' => null],
                    ['v' => '800', 'c' => 'userUsesImperialUnits()'],
                ],
            ],
            'depth' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.000001'],
            ],
            'knowArea' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'c2DERuFYpuVoxkTKq9JW4', 'c' => null],
                ],
                'ds' => '2094',
            ],
            'length' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.000001'],
            ],
            'mulchCircle' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'mulchNeeded' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'mulchRect' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'mulchRectangle' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'mulchType' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'zfKKQeVUUZKBd0yu9i6Fy', 'c' => null],
                ],
                'ds' => '2092',
            ],
            'radius' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'weight' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'weightCirc' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'weightRect' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'width' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.000001'],
            ],
        ],
        'groups' => [
            [
                'uid' => '5-st-Zt6PNproVRjFqFcF',
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
                                        Estimate the amount of mulch needed based on your selected area and desired mulch depth. You can also optionally calculate the total mulch cost and weight required for your project.
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
                                    't' => 'v',
                                    'n' => 'knowArea',
                                    'vt' => 'valueSelect',
                                    'l' => 'Do you know what\'s the area?',
                                    'h' => 'If you don\'t know the value of area to be covered with mulch, this calculator can find it for you based on the information you provide.',
                                    'ds' => '2094',
                                    'opts' => [
                                        ['c2DERuFYpuVoxkTKq9JW4', 'Yes, I know it.', '55.000000000000000'],
                                        ['jJQeXdXfjJxjfPjBAGk6Y', 'No, calculate it for me.', '66.000000000000000'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'Y797l55Gum4TQekKXTRf1',
                'title' => 'Mulch calculations',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'Shape',
                                    'vt' => 'valueSelect',
                                    'l' => 'Shape',
                                    'h' => 'What shape is the area to be covered in mulch?',
                                    'ds' => '2093',
                                    'opts' => [
                                        ['_RXgU1SOlZH4BwWXx-zPS', 'Rectangle', '1.000000000000000'],
                                        ['-AS-pCZAJe4j85Hj9_kY-', 'Circle', '2.000000000000000'],
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
                                    'u' => ['mulch-circle.png'],
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
                                    'h' => 'Desired depth of the mulch layer.',
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
                                    'n' => 'length',
                                    'vt' => 'numerical',
                                    'l' => 'Length',
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
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'areaRectangle',
                                    'vt' => 'numerical',
                                    'l' => 'Area',
                                    'h' => 'Area to be covered with mulch.',
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
                                    'n' => 'mulchRectangle',
                                    'vt' => 'numerical',
                                    'l' => 'Mulch needed',
                                    'h' => 'Volume of mulch needed to cover the calculated area.',
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
                                    'n' => 'radius',
                                    'vt' => 'numerical',
                                    'l' => 'Radius',
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
                                    'n' => 'areaCircle',
                                    'vt' => 'numerical',
                                    'l' => 'Area',
                                    'h' => 'Area to be covered with mulch.',
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
                                    'n' => 'mulchCircle',
                                    'vt' => 'numerical',
                                    'l' => 'Mulch needed',
                                    'h' => 'Volume of mulch needed to cover the calculated area.',
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
                                    'n' => 'area',
                                    'vt' => 'numerical',
                                    'l' => 'Area',
                                    'h' => 'Please input the area to be covered with mulch.',
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
                                    'n' => 'mulchNeeded',
                                    'vt' => 'numerical',
                                    'l' => 'Mulch needed',
                                    'h' => 'Volume of mulch needed to cover the whole deginated area.',
                                    'us' => '20',
                                    'du' => 'liters',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'kBP_cxXNhZb68fGfLMC9N',
                'title' => 'Cost calculations',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'bagOrVolPricing',
                                    'vt' => 'valueSelect',
                                    'l' => 'I know the price...',
                                    'ds' => '4Osm__4SmTzlcdGUXktxz',
                                    'opts' => [
                                        ['XqhyNjwhKsFA4vcqKmK2D', '... by bag', '1'],
                                        ['-rtz1xcsW5X0T0DwTJFR3', '... by volume', '0'],
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
                                    'n' => 'bagSize',
                                    'vt' => 'numerical',
                                    'l' => 'Bag size',
                                    'h' => 'What\'s the size of a single bag of mulch you want to buy?',
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
                                ['t' => 'v', 'n' => 'bagsNeeded', 'vt' => 'numerical', 'l' => 'Number of bags needed'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'bagsRect', 'vt' => 'numerical', 'l' => 'Number of bags needed'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'bagsCirc', 'vt' => 'numerical', 'l' => 'Number of bags needed'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'bagPrice',
                                    'vt' => 'numerical',
                                    'l' => 'Price per one bag',
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
                                    'n' => 'bagPriceRect',
                                    'vt' => 'numerical',
                                    'l' => 'Price per one bag',
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
                                    'n' => 'bagPriceCirc',
                                    'vt' => 'numerical',
                                    'l' => 'Price per one bag',
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
                                    'n' => 'costPerm3',
                                    'vt' => 'numerical',
                                    'l' => 'Cost per volume unit',
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
                                    'n' => 'cost',
                                    'vt' => 'numerical',
                                    'l' => 'Total costs of mulch',
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
                                    'n' => 'costVol',
                                    'vt' => 'numerical',
                                    'l' => 'Total costs of mulch',
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
                                    'n' => 'costRect',
                                    'vt' => 'numerical',
                                    'l' => 'Total costs of mulch',
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
                                    'n' => 'costRectVol',
                                    'vt' => 'numerical',
                                    'l' => 'Total costs of mulch',
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
                                    'n' => 'costCirc',
                                    'vt' => 'numerical',
                                    'l' => 'Total costs of mulch',
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
                                    'n' => 'costCircleVol',
                                    'vt' => 'numerical',
                                    'l' => 'Total costs of mulch',
                                    'us' => '663',
                                    'du' => 'USD',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'C7Ng6f9YUfzrvlsj-KRGI',
                'title' => 'Mulch weight estimation',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'mulchType',
                                    'vt' => 'valueSelect',
                                    'l' => 'Mulch type',
                                    'h' => 'Mulch can be made of various materials, resulting in different densities and weights. Wood and compost are the most common.',
                                    'ds' => '2092',
                                    'opts' => [
                                        ['zfKKQeVUUZKBd0yu9i6Fy', 'Wood (chips or bark)', '11'],
                                        ['TcYdvR-JPRdJBJgSh_0zd', 'Compost', '12'],
                                        ['wnLqyYSmf29HzQmoCbc2S', 'Custom', '13'],
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
                                    'n' => 'density',
                                    'vt' => 'dependent',
                                    'l' => 'Density',
                                    'h' => 'Density of wooden mulch is typically around 475 kg/m³ (800 lb/cu yd).',
                                    'us' => '33',
                                    'du' => 'kgm3',
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
                                    'n' => 'weight',
                                    'vt' => 'numerical',
                                    'l' => 'Estimated weight',
                                    'us' => '22',
                                    'du' => 'kg',
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
                                    'n' => 'weightRect',
                                    'vt' => 'numerical',
                                    'l' => 'Estimated weight',
                                    'us' => '22',
                                    'du' => 'kg',
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
                                    'n' => 'weightCirc',
                                    'vt' => 'numerical',
                                    'l' => 'Estimated weight',
                                    'us' => '22',
                                    'du' => 'kg',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'mulchRect', 'vt' => 'numerical', 'l' => 'Mulch rect'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'areaRectangle = length * width',
                'var' => [
                    [
                        'l' => 'areaRectangle',
                        'f' => 'length*width',
                        'r' => ['length', 'width'],
                    ],
                    [
                        'l' => 'length',
                        'f' => 'areaRectangle/width',
                        'r' => ['areaRectangle', 'width'],
                    ],
                    [
                        'l' => 'width',
                        'f' => 'areaRectangle/length',
                        'r' => ['areaRectangle', 'length'],
                    ],
                ],
            ],
            [
                'formula' => 'areaCircle = pi * radius^2',
                'var' => [
                    [
                        'l' => 'areaCircle',
                        'f' => 'PI*pow(radius, 2)',
                        'r' => ['radius'],
                    ],
                    [
                        'l' => 'radius',
                        'f' => 'sqrt(areaCircle)/sqrt(PI)',
                        'r' => ['areaCircle'],
                    ],
                ],
            ],
            [
                'formula' => 'mulchNeeded = area * depth ',
                'var' => [
                    [
                        'l' => 'area',
                        'f' => 'mulchNeeded/depth',
                        'r' => ['depth', 'mulchNeeded'],
                    ],
                    [
                        'l' => 'depth',
                        'f' => 'mulchNeeded/area',
                        'r' => ['area', 'mulchNeeded'],
                    ],
                    [
                        'l' => 'mulchNeeded',
                        'f' => 'area*depth',
                        'r' => ['area', 'depth'],
                    ],
                ],
            ],
            [
                'formula' => 'mulchRectangle = areaRectangle * depth',
                'var' => [
                    [
                        'l' => 'mulchRectangle',
                        'f' => 'areaRectangle*depth',
                        'r' => ['depth', 'areaRectangle'],
                    ],
                    [
                        'l' => 'depth',
                        'f' => 'mulchRectangle/areaRectangle',
                        'r' => ['mulchRectangle', 'areaRectangle'],
                    ],
                    [
                        'l' => 'areaRectangle',
                        'f' => 'mulchRectangle/depth',
                        'r' => ['mulchRectangle', 'depth'],
                    ],
                ],
            ],
            [
                'formula' => 'mulchCircle = areaCircle * depth',
                'var' => [
                    [
                        'l' => 'depth',
                        'f' => 'mulchCircle/areaCircle',
                        'r' => ['areaCircle', 'mulchCircle'],
                    ],
                    [
                        'l' => 'areaCircle',
                        'f' => 'mulchCircle/depth',
                        'r' => ['depth', 'mulchCircle'],
                    ],
                    [
                        'l' => 'mulchCircle',
                        'f' => 'areaCircle*depth',
                        'r' => ['depth', 'areaCircle'],
                    ],
                ],
            ],
            [
                'formula' => 'bagsNeeded = mulchNeeded / bagSize',
                'var' => [
                    [
                        'l' => 'bagsNeeded',
                        'f' => 'mulchNeeded/bagSize',
                        'r' => ['bagSize', 'mulchNeeded'],
                    ],
                    [
                        'l' => 'bagSize',
                        'f' => 'mulchNeeded/bagsNeeded',
                        'r' => ['bagsNeeded', 'mulchNeeded'],
                    ],
                    [
                        'l' => 'mulchNeeded',
                        'f' => 'bagSize*bagsNeeded',
                        'r' => ['bagsNeeded', 'bagSize'],
                    ],
                ],
            ],
            [
                'formula' => 'bagsRect = mulchRectangle / bagSize',
                'var' => [
                    [
                        'l' => 'bagSize',
                        'f' => 'mulchRectangle/bagsRect',
                        'r' => ['bagsRect', 'mulchRectangle'],
                    ],
                    [
                        'l' => 'bagsRect',
                        'f' => 'mulchRectangle/bagSize',
                        'r' => ['bagSize', 'mulchRectangle'],
                    ],
                    [
                        'l' => 'mulchRectangle',
                        'f' => 'bagSize*bagsRect',
                        'r' => ['bagSize', 'bagsRect'],
                    ],
                ],
            ],
            [
                'formula' => 'bagsCirc = mulchCircle / bagSize',
                'var' => [
                    [
                        'l' => 'bagsCirc',
                        'f' => 'mulchCircle/bagSize',
                        'r' => ['bagSize', 'mulchCircle'],
                    ],
                    [
                        'l' => 'bagSize',
                        'f' => 'mulchCircle/bagsCirc',
                        'r' => ['bagsCirc', 'mulchCircle'],
                    ],
                    [
                        'l' => 'mulchCircle',
                        'f' => 'bagSize*bagsCirc',
                        'r' => ['bagsCirc', 'bagSize'],
                    ],
                ],
            ],
            [
                'formula' => 'cost = bagsNeeded * bagPrice',
                'var' => [
                    [
                        'l' => 'bagsNeeded',
                        'f' => 'cost/bagPrice',
                        'r' => ['cost', 'bagPrice'],
                    ],
                    [
                        'l' => 'cost',
                        'f' => 'bagPrice*bagsNeeded',
                        'r' => ['bagsNeeded', 'bagPrice'],
                    ],
                    [
                        'l' => 'bagPrice',
                        'f' => 'cost/bagsNeeded',
                        'r' => ['bagsNeeded', 'cost'],
                    ],
                ],
            ],
            [
                'formula' => 'costRect = bagsRect * bagPriceRect',
                'var' => [
                    [
                        'l' => 'bagPriceRect',
                        'f' => 'costRect/bagsRect',
                        'r' => ['bagsRect', 'costRect'],
                    ],
                    [
                        'l' => 'bagsRect',
                        'f' => 'costRect/bagPriceRect',
                        'r' => ['bagPriceRect', 'costRect'],
                    ],
                    [
                        'l' => 'costRect',
                        'f' => 'bagPriceRect*bagsRect',
                        'r' => ['bagPriceRect', 'bagsRect'],
                    ],
                ],
            ],
            [
                'formula' => 'costCirc = bagsCirc * bagPriceCirc',
                'var' => [
                    [
                        'l' => 'bagsCirc',
                        'f' => 'costCirc/bagPriceCirc',
                        'r' => ['costCirc', 'bagPriceCirc'],
                    ],
                    [
                        'l' => 'costCirc',
                        'f' => 'bagPriceCirc*bagsCirc',
                        'r' => ['bagsCirc', 'bagPriceCirc'],
                    ],
                    [
                        'l' => 'bagPriceCirc',
                        'f' => 'costCirc/bagsCirc',
                        'r' => ['bagsCirc', 'costCirc'],
                    ],
                ],
            ],
            [
                'formula' => 'weightRect = mulchRectangle * density ',
                'var' => [
                    [
                        'l' => 'weightRect',
                        'f' => 'density*mulchRectangle',
                        'r' => ['density', 'mulchRectangle'],
                    ],
                    [
                        'l' => 'density',
                        'f' => 'weightRect/mulchRectangle',
                        'r' => ['weightRect', 'mulchRectangle'],
                    ],
                    [
                        'l' => 'mulchRectangle',
                        'f' => 'weightRect/density',
                        'r' => ['weightRect', 'density'],
                    ],
                ],
            ],
            [
                'formula' => 'weightCirc = mulchCircle * density ',
                'var' => [
                    [
                        'l' => 'weightCirc',
                        'f' => 'density*mulchCircle',
                        'r' => ['density', 'mulchCircle'],
                    ],
                    [
                        'l' => 'density',
                        'f' => 'weightCirc/mulchCircle',
                        'r' => ['weightCirc', 'mulchCircle'],
                    ],
                    [
                        'l' => 'mulchCircle',
                        'f' => 'weightCirc/density',
                        'r' => ['weightCirc', 'density'],
                    ],
                ],
            ],
            [
                'formula' => 'weight = mulchNeeded * density',
                'var' => [
                    [
                        'l' => 'weight',
                        'f' => 'density*mulchNeeded',
                        'r' => ['density', 'mulchNeeded'],
                    ],
                    [
                        'l' => 'density',
                        'f' => 'weight/mulchNeeded',
                        'r' => ['weight', 'mulchNeeded'],
                    ],
                    [
                        'l' => 'mulchNeeded',
                        'f' => 'weight/density',
                        'r' => ['weight', 'density'],
                    ],
                ],
            ],
            [
                'formula' => 'costVol = mulchNeeded * costPerm3',
                'var' => [
                    [
                        'l' => 'costVol',
                        'f' => 'costPerm3*mulchNeeded',
                        'r' => ['costPerm3', 'mulchNeeded'],
                    ],
                    [
                        'l' => 'costPerm3',
                        'f' => 'costVol/mulchNeeded',
                        'r' => ['costVol', 'mulchNeeded'],
                    ],
                    [
                        'l' => 'mulchNeeded',
                        'f' => 'costVol/costPerm3',
                        'r' => ['costVol', 'costPerm3'],
                    ],
                ],
            ],
            [
                'formula' => 'costCircleVol = mulchCircle * costPerm3',
                'var' => [
                    [
                        'l' => 'costCircleVol',
                        'f' => 'costPerm3*mulchCircle',
                        'r' => ['costPerm3', 'mulchCircle'],
                    ],
                    [
                        'l' => 'costPerm3',
                        'f' => 'costCircleVol/mulchCircle',
                        'r' => ['costCircleVol', 'mulchCircle'],
                    ],
                    [
                        'l' => 'mulchCircle',
                        'f' => 'costCircleVol/costPerm3',
                        'r' => ['costCircleVol', 'costPerm3'],
                    ],
                ],
            ],
            [
                'formula' => 'costRectVol = mulchRect * costPerm3',
                'var' => [
                    [
                        'l' => 'mulchRect',
                        'f' => 'costRectVol/costPerm3',
                        'r' => ['costPerm3', 'costRectVol'],
                    ],
                    [
                        'l' => 'costPerm3',
                        'f' => 'costRectVol/mulchRect',
                        'r' => ['mulchRect', 'costRectVol'],
                    ],
                    [
                        'l' => 'costRectVol',
                        'f' => 'costPerm3*mulchRect',
                        'r' => ['mulchRect', 'costPerm3'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            '2092' => [
                'name' => 'mulch',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'zfKKQeVUUZKBd0yu9i6Fy', 'label' => 'Wood (chips or bark)', 'value' => '11'],
                    ['uid' => 'TcYdvR-JPRdJBJgSh_0zd', 'label' => 'Compost', 'value' => '12'],
                    ['uid' => 'wnLqyYSmf29HzQmoCbc2S', 'label' => 'Custom', 'value' => '13'],
                ],
            ],
            '2093' => [
                'name' => 'shape',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => '_RXgU1SOlZH4BwWXx-zPS', 'label' => 'Rectangle', 'value' => '1.000000000000000'],
                    ['uid' => '-AS-pCZAJe4j85Hj9_kY-', 'label' => 'Circle', 'value' => '2.000000000000000'],
                ],
            ],
            '2094' => [
                'name' => 'yes no',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'c2DERuFYpuVoxkTKq9JW4', 'label' => 'Yes, I know it.', 'value' => '55.000000000000000'],
                    ['uid' => 'jJQeXdXfjJxjfPjBAGk6Y', 'label' => 'No, calculate it for me.', 'value' => '66.000000000000000'],
                ],
            ],
            '4Osm__4SmTzlcdGUXktxz' => [
                'name' => 'costCalc',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'XqhyNjwhKsFA4vcqKmK2D', 'label' => '... by bag', 'value' => '1'],
                    ['uid' => '-rtz1xcsW5X0T0DwTJFR3', 'label' => '... by volume', 'value' => '0'],
                ],
            ],
        ],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => 'The Mulch calculator turns the length, the width and more into <strong>area (Mulch calculations)</strong>.',
        'sections' => [
            ['title' => 'How does the Mulch calculator work?', 'html' => <<<'TXT'
            <p>The Mulch calculator takes the values in the form, applies the relationship described below and reports <strong>area (Mulch calculations)</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the shape and the mulch type); then you type in the length, the width, the radius and the mulch needed (Mulch calculations).</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 2 options, such as yes, I know it. and no, calculate it for me.. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>Pick the option that matches your case — 2 options, such as rectangle and circle. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li> The unit chip switches it to any of the 34 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li><li>A measured quantity, entered by default in liters. The unit chip switches it to any of the 40 supported units.</li><li>A measured quantity, entered by default in liters. The unit chip switches it to any of the 40 supported units.</li><li>Pick the option that matches your case — 2 options, such as... by bag and... by volume. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>A plain number with no unit attached.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>Pick the option that matches your case — 3 options, such as wood (chips or bark), compost and custom. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li></ul><p>4 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Shape</strong></td><td>One of 2 options, such as rectangle and circle.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Depth</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>Calculated</td></tr><tr><td><strong>Length</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>You supply it</td></tr><tr><td><strong>Width</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>You supply it</td></tr><tr><td><strong>Area (Mulch calculations)</strong></td><td>A measured quantity, 24 units available.</td><td>square meters</td><td>Calculated</td></tr><tr><td><strong>Mulch needed (Mulch calculations)</strong></td><td>A measured quantity, 40 units available.</td><td>liters</td><td>Calculated</td></tr><tr><td><strong>Radius</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>You supply it</td></tr><tr><td><strong>Area (Mulch calculations)</strong></td><td>A measured quantity, 24 units available.</td><td>square meters</td><td>Calculated</td></tr><tr><td><strong>Mulch needed (Mulch calculations)</strong></td><td>A measured quantity, 40 units available.</td><td>liters</td><td>You supply it</td></tr><tr><td><strong>Area (Mulch calculations)</strong></td><td>A measured quantity, 24 units available.</td><td>square meters</td><td>Calculated</td></tr><tr><td><strong>Mulch needed (Mulch calculations)</strong></td><td>A measured quantity, 40 units available.</td><td>liters</td><td>You supply it</td></tr><tr><td><strong>Bag size</strong></td><td>A measured quantity, 40 units available.</td><td>liters</td><td>Calculated</td></tr><tr><td><strong>Number of bags needed (Cost calculations)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Number of bags needed (Cost calculations)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Number of bags needed (Cost calculations)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Price per one bag (Cost calculations)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Price per one bag (Cost calculations)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>Calculated</td></tr><tr><td><strong>Price per one bag (Cost calculations)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Cost per volume unit</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Total costs of mulch (Cost calculations)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>Calculated</td></tr><tr><td><strong>Total costs of mulch (Cost calculations)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>Calculated</td></tr><tr><td><strong>Total costs of mulch (Cost calculations)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Total costs of mulch (Cost calculations)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Total costs of mulch (Cost calculations)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>Calculated</td></tr></tbody></table><p>The table lists the first 24 of 31 fields; the rest follow the same pattern.</p>
            TXT],
            ['title' => 'The formula behind the Mulch calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Area</span><span class="formula-eq">=</span><span class="formula-rhs">length × width</span></div><div class="formula-row"><span class="formula-lhs">Area</span><span class="formula-eq">=</span><span class="formula-rhs">PI × (radius ^ 2)</span></div><div class="formula-row"><span class="formula-lhs">Area</span><span class="formula-eq">=</span><span class="formula-rhs">mulch needed ÷ depth</span></div><div class="formula-row"><span class="formula-lhs">Mulch needed</span><span class="formula-eq">=</span><span class="formula-rhs">area × depth</span></div><div class="formula-row"><span class="formula-lhs">Depth</span><span class="formula-eq">=</span><span class="formula-rhs">mulch needed ÷ area</span></div><div class="formula-row"><span class="formula-lhs">Number of bags needed</span><span class="formula-eq">=</span><span class="formula-rhs">mulch needed ÷ bag size</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What is a worked example?', 'html' => <<<'TXT'
            <p>Open the page and it is already filled in. With the values it starts from — <strong>Do you know what's the area?</strong> set to Yes, I know it., <strong>Shape</strong> set to Rectangle, <strong>I know the price</strong> set to... by bag and <strong>Mulch type</strong> set to Wood (chips or bark) — it reports <strong>Density</strong> = 475 kg/m³.</p><p>Those are real numbers produced by the same engine that runs when you press Calculate, so you can change any single box afterwards and watch the answer move from this starting point.</p><ol><li>Enter the values listed above, matching the units each box asks for.</li><li>Read off the result. Any field you leave empty is the one the calculator solves for.</li><li>Sanity-check the number against the relationship: <strong>Density</strong> = 475 kg/m³ should be roughly the size you expected from <strong>Do you know what's the area?</strong> set to Yes, I know it. and <strong>Shape</strong> set to Rectangle.</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in square meters, and convertible to any of the 24 units on that chip.</li><li>Shown in square meters, and convertible to any of the 24 units on that chip.</li><li>Shown in square meters, and convertible to any of the 24 units on that chip.</li><li>Shown in liters, and convertible to any of the 40 units on that chip.</li><li>Shown in centimeters, and convertible to any of the 34 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in liters, and convertible to any of the 40 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in centimeters</li><li>Length, opening in meters</li><li>Length, opening in meters</li><li>Area, opening in square meters</li><li>Volume, opening in liters</li><li>Length, opening in meters</li><li>Area, opening in square meters</li><li>Volume, opening in liters</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Mulch calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Putting a biological quantity into a scale you can picture</li><li>Comparing two organisms, populations or processes</li><li>Supporting a lesson, a lecture or a field note</li><li>Any time the same 4 figures keep coming back — the length, the width and the radius — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li><li>Write the answer down with its unit. </li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/mutation-frequency">Mutation frequency</a>, <a href="/biology/mutation-rate">Mutation rate</a> and <a href="/biology/omega-3-for-dogs">Omega-3 for dogs</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Mulch calculator work out?', 'a' => <<<'TXT'
            It returns area (Mulch calculations), derived from the length, the width and the radius. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Mulch calculator?', 'a' => <<<'TXT'
            The form asks for the length, the width, the radius and the mulch needed, which is 15 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter depth in a different unit?', 'a' => <<<'TXT'
            Yes. Depth opens in centimeters and the chip beside it offers 34 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There are several choices to make (4 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'What is a typical result?', 'a' => <<<'TXT'
            With the values the page starts from, the calculator reports Density = 475 kg/m³. Treat that as a reference point rather than a recommendation: it exists so you can tell at a glance whether your own inputs are on the same scale.
            TXT],
            ['q' => 'Is the Mulch calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/mutation-frequency', 'name' => 'Mutation frequency'],
            ['path' => '/biology/mutation-rate', 'name' => 'Mutation rate'],
            ['path' => '/biology/omega-3-for-dogs', 'name' => 'Omega-3 for dogs'],
        ],
    ],
];
