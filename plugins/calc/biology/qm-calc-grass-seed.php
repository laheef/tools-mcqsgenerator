<?php

/**
 * Grass seed
 * /biology/grass-seed
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Grass seed',
    'meta' => ['title' => 'Grass seed Calculator: Formula, Steps & Examples', 'description' => <<<'TXT'
    Grass seed takes Width and Area and returns Length and Radius. It is a single relationship that reads Length out of Width, not a table of canned results keyed…
    TXT, 'h1' => 'Grass seed Calculator', 'updated' => '2026-08-12'],
    'raw' => [
        'vars' => [
            'a_axis' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'area_circle' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'area_elipsis' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'area_rectangle' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'area_triangle' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'areashape' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'iwGwVtLZWaw7WOAJKokAP', 'c' => null],
                ],
                'ds' => '840',
            ],
            'b_axis' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'base' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'height' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'length' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'radius' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'seed_coverage_rate' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '2.5', 'c' => null],
                    ['v' => '10', 'c' => 'userUsesImperialUnits()'],
                ],
            ],
            'seeds_circle' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'seeds_elipsis' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'seeds_rectangle' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'seeds_triangle' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'width' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'jUqZlk8i1WKu1pd8uUcTD',
                'title' => 'Lawn area',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'areashape',
                                    'vt' => 'valueSelect',
                                    'l' => 'Lawn shape',
                                    'ds' => '840',
                                    'opts' => [
                                        ['iwGwVtLZWaw7WOAJKokAP', 'Rectangle', '0'],
                                        ['NDgKgOih0C1ObJEW2W-Sy', 'Circle', '1'],
                                        ['X1AsDt6JU1e1ePWERLgDr', 'Ellipsis', '2'],
                                        ['2hu8Uvv5_qrQlGXkN3t8N', 'Triangle', '3'],
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
                                    'n' => 'area_rectangle',
                                    'vt' => 'numerical',
                                    'l' => 'Area',
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
                                    'n' => 'area_circle',
                                    'vt' => 'numerical',
                                    'l' => 'Area',
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
                                    'n' => 'a_axis',
                                    'vt' => 'numerical',
                                    'l' => 'A axis',
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
                                    'n' => 'b_axis',
                                    'vt' => 'numerical',
                                    'l' => 'B axis',
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
                                    'n' => 'area_elipsis',
                                    'vt' => 'numerical',
                                    'l' => 'Area',
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
                                    'n' => 'base',
                                    'vt' => 'numerical',
                                    'l' => 'Base',
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
                                    'n' => 'height',
                                    'vt' => 'numerical',
                                    'l' => 'Height',
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
                                    'n' => 'area_triangle',
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
                'uid' => 'ioUzkJiismVEx9-RlYImh',
                'title' => 'Seeds',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'seed_coverage_rate',
                                    'vt' => 'numerical',
                                    'l' => 'Coverage rate',
                                    'h' => <<<'TXT'
                                    Each type of grass has a different coverage rate. They are usually given in kg/1000m² in the metric system, or lbs/1000ft² in the imperial system. To find out the coverage rate of your grass, look at the seed packaging.
                                    TXT,
                                    'us' => '344',
                                    'du' => 'kg1000m2',
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
                                    'n' => 'seeds_rectangle',
                                    'vt' => 'numerical',
                                    'l' => 'Seeds',
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
                                    'n' => 'seeds_circle',
                                    'vt' => 'numerical',
                                    'l' => 'Seeds',
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
                                    'n' => 'seeds_elipsis',
                                    'vt' => 'numerical',
                                    'l' => 'Seeds',
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
                                    'n' => 'seeds_triangle',
                                    'vt' => 'numerical',
                                    'l' => 'Seeds',
                                    'us' => '22',
                                    'du' => 'kg',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'area_rectangle = width * length',
                'var' => [
                    [
                        'l' => 'length',
                        'f' => 'area_rectangle/width',
                        'r' => ['area_rectangle', 'width'],
                    ],
                    [
                        'l' => 'area_rectangle',
                        'f' => 'length*width',
                        'r' => ['length', 'width'],
                    ],
                    [
                        'l' => 'width',
                        'f' => 'area_rectangle/length',
                        'r' => ['length', 'area_rectangle'],
                    ],
                ],
            ],
            [
                'formula' => 'area_circle = pi * radius^2',
                'var' => [
                    [
                        'l' => 'area_circle',
                        'f' => 'PI*pow(radius, 2)',
                        'r' => ['radius'],
                    ],
                    [
                        'l' => 'radius',
                        'f' => 'sqrt(area_circle)/sqrt(PI)',
                        'r' => ['area_circle'],
                    ],
                ],
            ],
            [
                'formula' => 'area_elipsis = a_axis * b_axis * pi',
                'var' => [
                    [
                        'l' => 'b_axis',
                        'f' => 'area_elipsis/(PI*a_axis)',
                        'r' => ['a_axis', 'area_elipsis'],
                    ],
                    [
                        'l' => 'a_axis',
                        'f' => 'area_elipsis/(PI*b_axis)',
                        'r' => ['b_axis', 'area_elipsis'],
                    ],
                    [
                        'l' => 'area_elipsis',
                        'f' => 'PI*a_axis*b_axis',
                        'r' => ['b_axis', 'a_axis'],
                    ],
                ],
            ],
            [
                'formula' => 'area_triangle = (1/2) * base * height',
                'var' => [
                    [
                        'l' => 'area_triangle',
                        'f' => '(1/2)*base*height',
                        'r' => ['base', 'height'],
                    ],
                    [
                        'l' => 'base',
                        'f' => '2*area_triangle/height',
                        'r' => ['area_triangle', 'height'],
                    ],
                    [
                        'l' => 'height',
                        'f' => '2*area_triangle/base',
                        'r' => ['area_triangle', 'base'],
                    ],
                ],
            ],
            [
                'formula' => 'seeds_rectangle = seed_coverage_rate * area_rectangle / 1000',
                'var' => [
                    [
                        'l' => 'seeds_rectangle',
                        'f' => '(1/1000)*area_rectangle*seed_coverage_rate',
                        'r' => ['area_rectangle', 'seed_coverage_rate'],
                    ],
                    [
                        'l' => 'area_rectangle',
                        'f' => '1000*seeds_rectangle/seed_coverage_rate',
                        'r' => ['seeds_rectangle', 'seed_coverage_rate'],
                    ],
                    [
                        'l' => 'seed_coverage_rate',
                        'f' => '1000*seeds_rectangle/area_rectangle',
                        'r' => ['seeds_rectangle', 'area_rectangle'],
                    ],
                ],
            ],
            [
                'formula' => 'seeds_circle = seed_coverage_rate * area_circle / 1000',
                'var' => [
                    [
                        'l' => 'seed_coverage_rate',
                        'f' => '1000*seeds_circle/area_circle',
                        'r' => ['area_circle', 'seeds_circle'],
                    ],
                    [
                        'l' => 'area_circle',
                        'f' => '1000*seeds_circle/seed_coverage_rate',
                        'r' => ['seed_coverage_rate', 'seeds_circle'],
                    ],
                    [
                        'l' => 'seeds_circle',
                        'f' => '(1/1000)*area_circle*seed_coverage_rate',
                        'r' => ['seed_coverage_rate', 'area_circle'],
                    ],
                ],
            ],
            [
                'formula' => 'seeds_elipsis = seed_coverage_rate * area_elipsis / 1000',
                'var' => [
                    [
                        'l' => 'seed_coverage_rate',
                        'f' => '1000*seeds_elipsis/area_elipsis',
                        'r' => ['area_elipsis', 'seeds_elipsis'],
                    ],
                    [
                        'l' => 'area_elipsis',
                        'f' => '1000*seeds_elipsis/seed_coverage_rate',
                        'r' => ['seed_coverage_rate', 'seeds_elipsis'],
                    ],
                    [
                        'l' => 'seeds_elipsis',
                        'f' => '(1/1000)*area_elipsis*seed_coverage_rate',
                        'r' => ['seed_coverage_rate', 'area_elipsis'],
                    ],
                ],
            ],
            [
                'formula' => 'seeds_triangle = seed_coverage_rate * area_triangle / 1000',
                'var' => [
                    [
                        'l' => 'area_triangle',
                        'f' => '1000*seeds_triangle/seed_coverage_rate',
                        'r' => ['seed_coverage_rate', 'seeds_triangle'],
                    ],
                    [
                        'l' => 'seed_coverage_rate',
                        'f' => '1000*seeds_triangle/area_triangle',
                        'r' => ['area_triangle', 'seeds_triangle'],
                    ],
                    [
                        'l' => 'seeds_triangle',
                        'f' => '(1/1000)*area_triangle*seed_coverage_rate',
                        'r' => ['area_triangle', 'seed_coverage_rate'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            '840' => [
                'name' => 'Area Shape',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'iwGwVtLZWaw7WOAJKokAP', 'label' => 'Rectangle', 'value' => '0'],
                    ['uid' => 'NDgKgOih0C1ObJEW2W-Sy', 'label' => 'Circle', 'value' => '1'],
                    ['uid' => 'X1AsDt6JU1e1ePWERLgDr', 'label' => 'Ellipsis', 'value' => '2'],
                    ['uid' => '2hu8Uvv5_qrQlGXkN3t8N', 'label' => 'Triangle', 'value' => '3'],
                ],
            ],
        ],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        Grass seed takes Width and Area and returns Length and Radius. It is a single relationship that reads Length out of Width, not a table of canned results keyed by them. Units for Length default to meters and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Grass seed calculator works', 'html' => <<<'TXT'
            <p>Grass seed answers one question from 2 numbers, and the answer is Length, Radius and Area.</p><p>Written with the labels from the form, Length = Area ÷ Width.</p><p>The result panel carries Length, Radius, Area and A axis, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Width</strong> — in meters</li><li><strong>Area</strong> — in square meters</li></ul><p>The result boxes are Length in meters, Radius in meters, Area in square meters, A axis in meters, B axis in meters, Area in square meters, Base in meters, Height in meters, Area in square meters, Coverage rate in kilograms per thousand square meters, Seeds in kilograms, Seeds in kilograms, Seeds in kilograms, Seeds in kilograms; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Length offers 31 units and opens on meters, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Length</strong> = <code>Area ÷ Width</code></li><li><strong>Area</strong> = <code>Length × Width</code></li><li><strong>Width</strong> = <code>Area ÷ Length</code></li><li><strong>Radius</strong> = <code>√(Area) ÷ √(PI)</code></li><li><strong>B axis</strong> = <code>Area ÷ (PI × A axis)</code></li><li><strong>A axis</strong> = <code>Area ÷ (PI × B axis)</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Length, Area and Width can be the unknown.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Width and Area is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Length, Radius and Area are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> If Width is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Width and Area and the number you are missing is Length and Radius.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/femur-to-foot-ratio">Femur to Foot Ratio Calculator</a>, <a href="/biology/fertilizer">Fertilizer Calculator</a> and <a href="/biology/fertilizer-injector-ratio">Fertilizer Injector Ratio Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Grass seed calculator work out?', 'a' => 'Length, Radius, Area and A axis, from Area and Width. The relationship is Length = Area ÷ Width.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Width (meters), Area (square meters). With width and area_rectangle in place, Length can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Length, Area, Width and Area can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Length is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Width blank and the page solves for it, reporting Length instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Length at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/femur-to-foot-ratio', 'name' => 'Femur to Foot Ratio Calculator'],
            ['path' => '/biology/fertilizer', 'name' => 'Fertilizer Calculator'],
            ['path' => '/biology/fertilizer-injector-ratio', 'name' => 'Fertilizer Injector Ratio Calculator'],
        ],
        'authors' => [],
    ],
];
