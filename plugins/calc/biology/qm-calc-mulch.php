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
    'meta' => ['title' => 'Mulch Calculator: Formula, Steps & Examples', 'description' => 'Mulch works out area and number of bags needed from do you know what\'s the area? and shape. Every box can be solved for, not only the one in the title.', 'h1' => 'Mulch Calculator', 'updated' => '2026-08-12'],
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
        'intro' => <<<'TXT'
        Enter Do you know what's the area?, Shape and Depth into Mulch and the answer comes back as Density. There is no hidden constant here: change density and do you know what's the area? moves with it. The main result, Density, is reported in kilograms per cubic meter.
        TXT,
        'sections' => [
            ['title' => 'How the Mulch calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Mulch: it takes 32 numbers and reports Density.</p><p>Written with the labels from the form, Area = Length × Width.</p><p>What comes back is Density — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 32 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Do you know what&#039;s the area?</strong> — a plain number, no unit. If you don&#039;t know the value of area to be covered with mulch, this calculator can find it for you based on the information you provide.</li><li><strong>Shape</strong> — a plain number, no unit. What shape is the area to be covered in mulch?</li><li><strong>Depth</strong> — in centimeters. Desired depth of the mulch layer.</li><li><strong>Length</strong> — in meters</li><li><strong>Width</strong> — in meters</li><li><strong>Area</strong> — in square meters. Area to be covered with mulch.</li><li><strong>Mulch needed</strong> — in liters. Volume of mulch needed to cover the calculated area.</li><li><strong>Radius</strong> — in meters</li><li><strong>Area</strong> — in square meters. Area to be covered with mulch.</li><li><strong>Mulch needed</strong> — in liters. Volume of mulch needed to cover the calculated area.</li><li><strong>Area</strong> — in square meters. Please input the area to be covered with mulch.</li><li><strong>Mulch needed</strong> — in liters. Volume of mulch needed to cover the whole deginated area.</li><li><strong>I know the price…</strong> — a plain number, no unit</li><li><strong>Bag size</strong> — in liters. What&#039;s the size of a single bag of mulch you want to buy?</li><li><strong>Number of bags needed</strong> — a plain number, no unit</li><li><strong>Number of bags needed</strong> — a plain number, no unit</li><li><strong>Number of bags needed</strong> — a plain number, no unit</li><li><strong>Price per one bag</strong> — in USD</li><li><strong>Price per one bag</strong> — in USD</li><li><strong>Price per one bag</strong> — in USD</li><li><strong>Cost per volume unit</strong> — in USD</li><li><strong>Total costs of mulch</strong> — in USD</li><li><strong>Total costs of mulch</strong> — in USD</li><li><strong>Total costs of mulch</strong> — in USD</li><li><strong>Total costs of mulch</strong> — in USD</li><li><strong>Total costs of mulch</strong> — in USD</li><li><strong>Total costs of mulch</strong> — in USD</li><li><strong>Mulch type</strong> — a plain number, no unit. Mulch can be made of various materials, resulting in different densities and weights. Wood and compost are the most common.</li><li><strong>Estimated weight</strong> — in kilograms</li><li><strong>Estimated weight</strong> — in kilograms</li><li><strong>Estimated weight</strong> — in kilograms</li><li><strong>Mulch rect</strong> — a plain number, no unit</li></ul><p>The answer comes back as Density in kilograms per cubic meter. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Density lists 9 options and opens on kilograms per cubic meter. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Area</strong> = <code>Length × Width</code></li><li><strong>Length</strong> = <code>Area ÷ Width</code></li><li><strong>Width</strong> = <code>Area ÷ Length</code></li><li><strong>Radius</strong> = <code>√(Area) ÷ √(PI)</code></li><li><strong>Depth</strong> = <code>Mulch needed ÷ Area</code></li><li><strong>Mulch needed</strong> = <code>Area × Depth</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Area</strong> = <code>Length × Width</code> — the form to use when Length and Width are the values you have.</li><li><strong>Length</strong> = <code>Area ÷ Width</code> — the form to use when Area and Width are the values you have.</li><li><strong>Width</strong> = <code>Area ÷ Length</code> — the form to use when Area and Length are the values you have.</li><li><strong>Area</strong> = <code>PI × (Radius)^(2)</code> — the form to use when Radius are the values you have.</li><li><strong>Radius</strong> = <code>√(Area) ÷ √(PI)</code> — the form to use when Area are the values you have.</li><li><strong>Area</strong> = <code>Mulch needed ÷ Depth</code> — the form to use when Depth and Mulch needed are the values you have.</li><li><strong>Depth</strong> = <code>Mulch needed ÷ Area</code> — the form to use when Area and Mulch needed are the values you have.</li><li><strong>Mulch needed</strong> = <code>Area × Depth</code> — the form to use when Area and Depth are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Area, Length and Width can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Depth, Length and Width carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Density is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Do you know what&#039;s the area? left as a guess.</strong> Anything typed into Do you know what&amp;#039;s the area? is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Shape left as a guess.</strong> Anything typed into Shape is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Do you know what&#039;s the area? and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Do you know what&#039;s the area?, Shape, Depth and Length ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Do you know what&amp;#039;s the area? — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Density in kgm3 against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Density is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The unit tables here are kilograms per cubic meter, meters and square meters and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Do you know what&#039;s the area?, Shape and Depth are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Do you know what&#039;s the area?, Shape and Depth is what you already know and Density is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/rat-cage">Rat cage Calculator</a>, <a href="/biology/raw-dog-food">Raw dog food Calculator</a> and <a href="/biology/recombination-frequency">Recombination Frequency Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Mulch is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Mulch is a number to act on, so the useful question is what to do with Density (kgm3) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Do you know what&#039;s the area?, Shape, Depth and Length alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Mulch calculator work out?', 'a' => 'Density, from Length and Width. The relationship is Area = Length × Width.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Do you know what's the area?, Shape, Depth (centimeters), Length (meters), Width (meters). Enter do you know what's the area?, shape and depth; Density is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Area, Length, Width and Area can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Density is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Do you know what\'s the area? blank and the page solves for it, reporting Density instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Density at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/rat-cage', 'name' => 'Rat cage Calculator'],
            ['path' => '/biology/raw-dog-food', 'name' => 'Raw dog food Calculator'],
            ['path' => '/biology/recombination-frequency', 'name' => 'Recombination Frequency Calculator'],
        ],
        'authors' => [],
    ],
];
