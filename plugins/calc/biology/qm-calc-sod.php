<?php

/**
 * Sod
 * /biology/sod
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Sod',
    'meta' => ['title' => 'Sod Calculator — Free, With Worked Examples', 'description' => 'Sod works out Length and Waste factor from Width and Total area. There is no hidden constant here: change Length and Width moves with it.', 'h1' => 'Sod Calculator', 'updated' => '2026-08-12'],
    'raw' => [
        'vars' => [
            'area' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'area_waste' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'length' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'roll_area' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'roll_length' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '2', 'c' => null],
                    ['v' => '6', 'c' => 'userUsesImperialUnits()'],
                ],
            ],
            'roll_number' => [
                'type' => 'numerical',
                'rnd' => ['standard', '1'],
            ],
            'roll_price' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'roll_width' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '0.5', 'c' => null],
                    ['v' => '1.5', 'c' => 'userUsesImperialUnits()'],
                ],
            ],
            'total_area' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'total_cost' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'waste_factor' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '10', 'c' => null],
                ],
            ],
            'width' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'joIFKsDR-AANA0ttc4cPl',
                'title' => 'Field parameters',
                'desc' => '',
                'm' => [
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
                                    'n' => 'area',
                                    'vt' => 'numerical',
                                    'l' => 'Total area',
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
                                    'n' => 'waste_factor',
                                    'vt' => 'numerical',
                                    'l' => 'Waste factor',
                                    'h' => 'Additional percentage amount of material that will be wasted.',
                                    'us' => '37',
                                    'du' => 'perc',
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
                                    'n' => 'area_waste',
                                    'vt' => 'numerical',
                                    'l' => 'Area waste',
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
                                    'n' => 'total_area',
                                    'vt' => 'numerical',
                                    'l' => 'Total sod area',
                                    'us' => '28',
                                    'du' => 'm2',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'MqVxqWiFOOaTtjpJqIChH',
                'title' => 'Roll parameters',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'roll_length',
                                    'vt' => 'numerical',
                                    'l' => 'Roll length',
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
                                    'n' => 'roll_width',
                                    'vt' => 'numerical',
                                    'l' => 'Roll width',
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
                                    'n' => 'roll_area',
                                    'vt' => 'numerical',
                                    'l' => 'Roll area',
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
                                    'n' => 'roll_price',
                                    'vt' => 'numerical',
                                    'l' => 'Roll price',
                                    'us' => '663',
                                    'du' => 'USD',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'U7c3isL8qcCCv8XgjPFLL',
                'title' => 'Results',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'roll_number', 'vt' => 'numerical', 'l' => 'Number of rolls'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'total_cost',
                                    'vt' => 'numerical',
                                    'l' => 'Total cost',
                                    'us' => '663',
                                    'du' => 'USD',
                                ],
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
                        'r' => ['width', 'area'],
                    ],
                    [
                        'l' => 'width',
                        'f' => 'area/length',
                        'r' => ['length', 'area'],
                    ],
                    [
                        'l' => 'area',
                        'f' => 'length*width',
                        'r' => ['length', 'width'],
                    ],
                ],
            ],
            [
                'formula' => 'roll_area = roll_length * roll_width',
                'var' => [
                    [
                        'l' => 'roll_area',
                        'f' => 'roll_length*roll_width',
                        'r' => ['roll_width', 'roll_length'],
                    ],
                    [
                        'l' => 'roll_width',
                        'f' => 'roll_area/roll_length',
                        'r' => ['roll_area', 'roll_length'],
                    ],
                    [
                        'l' => 'roll_length',
                        'f' => 'roll_area/roll_width',
                        'r' => ['roll_area', 'roll_width'],
                    ],
                ],
            ],
            [
                'formula' => 'area_waste= area * waste_factor',
                'var' => [
                    [
                        'l' => 'area_waste',
                        'f' => 'area*waste_factor',
                        'r' => ['area', 'waste_factor'],
                    ],
                    [
                        'l' => 'area',
                        'f' => 'area_waste/waste_factor',
                        'r' => ['area_waste', 'waste_factor'],
                    ],
                    [
                        'l' => 'waste_factor',
                        'f' => 'area_waste/area',
                        'r' => ['area_waste', 'area'],
                    ],
                ],
            ],
            [
                'formula' => 'total_area = area + area_waste',
                'var' => [
                    [
                        'l' => 'area_waste',
                        'f' => '-area + total_area',
                        'r' => ['area', 'total_area'],
                    ],
                    [
                        'l' => 'area',
                        'f' => '-area_waste + total_area',
                        'r' => ['area_waste', 'total_area'],
                    ],
                    [
                        'l' => 'total_area',
                        'f' => 'area + area_waste',
                        'r' => ['area_waste', 'area'],
                    ],
                ],
            ],
            [
                'formula' => 'roll_number = total_area / roll_area',
                'var' => [
                    [
                        'l' => 'roll_area',
                        'f' => 'total_area/roll_number',
                        'r' => ['roll_number', 'total_area'],
                    ],
                    [
                        'l' => 'roll_number',
                        'f' => 'total_area/roll_area',
                        'r' => ['roll_area', 'total_area'],
                    ],
                    [
                        'l' => 'total_area',
                        'f' => 'roll_area*roll_number',
                        'r' => ['roll_area', 'roll_number'],
                    ],
                ],
            ],
            [
                'formula' => 'total_cost = total_area * roll_price',
                'var' => [
                    [
                        'l' => 'roll_price',
                        'f' => 'total_cost/total_area',
                        'r' => ['total_cost', 'total_area'],
                    ],
                    [
                        'l' => 'total_cost',
                        'f' => 'roll_price*total_area',
                        'r' => ['roll_price', 'total_area'],
                    ],
                    [
                        'l' => 'total_area',
                        'f' => 'total_cost/roll_price',
                        'r' => ['roll_price', 'total_cost'],
                    ],
                ],
            ],
        ],
        'datasets' => [],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        Sod works out Length and Waste factor from Width and Total area. There is no hidden constant here: change Length and Width moves with it. The main result, Length, is reported in meters.
        TXT,
        'sections' => [
            ['title' => 'How the Sod calculator works', 'html' => <<<'TXT'
            <p>The Sod calculator applies one relationship to 2 numbers and reports Length, Waste factor and Area waste.</p><p>The relationship it solves reads Length = Total area ÷ Width.</p><p>The answers are Length, Waste factor, Area waste and Total sod area; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Width</strong> — in meters</li><li><strong>Total area</strong> — in square meters</li></ul><p>The answers come back as Length in meters, Waste factor in percent, Area waste in square meters, Total sod area in square meters, Roll length in meters, Roll width in meters, Roll area in square meters, Roll price in USD, Number of rolls, Total cost in USD. </p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Length</strong> = <code>Total area ÷ Width</code></li><li><strong>Width</strong> = <code>Total area ÷ Length</code></li><li><strong>Total area</strong> = <code>Length × Width</code></li><li><strong>Roll area</strong> = <code>Roll length × Roll width</code></li><li><strong>Roll width</strong> = <code>Roll area ÷ Roll length</code></li><li><strong>Roll length</strong> = <code>Roll area ÷ Roll width</code></li></ul><p>Any one of Length, Width and Total area can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Width and Total area carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Length, Waste factor and Area waste are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Convert Width to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Width and Total area is what you already know and Length and Waste factor is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/lawn-fertilizer-rate">Lawn Fertilizer Rate Calculator</a>, <a href="/biology/mowing-cost">Lawn mowing Calculator</a> and <a href="/biology/tree-leaves">Leaves on tree Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Sod calculator work out?', 'a' => 'Length, Waste factor, Area waste and Total sod area, from Width and Total area. The relationship is Length = Total area ÷ Width.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Width (meters), Total area (square meters). With width and area in place, Length can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Length, Width, Total area and Roll area blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Width blank and the page solves for it, reporting Length instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Length keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/lawn-fertilizer-rate', 'name' => 'Lawn Fertilizer Rate Calculator'],
            ['path' => '/biology/mowing-cost', 'name' => 'Lawn mowing Calculator'],
            ['path' => '/biology/tree-leaves', 'name' => 'Leaves on tree Calculator'],
        ],
        'authors' => [],
    ],
];
