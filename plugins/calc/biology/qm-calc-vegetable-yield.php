<?php

/**
 * Vegetable yield
 * /biology/vegetable-yield
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Vegetable yield',
    'meta' => ['title' => 'Vegetable yield — Formula, Steps & Examples', 'description' => 'Vegetable yield turns Choose crop, Length of rows and Number of rows into Yield rate and Seed distance. It is a single relationship that reads Yield rate out…', 'h1' => 'Vegetable yield Calculator', 'updated' => '2026-08-12'],
    'raw' => [
        'vars' => [
            'crop_type' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'dmr6H0rRnP-2U2oBamh9P', 'c' => null],
                ],
                'ds' => 'vXPXr8v6wnVw4SW94NSox',
            ],
            'expected_yield' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
            ],
            'garden_area' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
            ],
            'garden_length' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
            ],
            'garden_width' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
            ],
            'length_of_row' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
            ],
            'no_of_rows' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
                'dfl' => [
                    ['v' => '1', 'c' => null],
                ],
            ],
            'seed_distance' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'seed_distance_copy' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'yield_rate' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => '9fmzWjP-EHGlNDBeurk4X',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'crop_type',
                                    'vt' => 'valueSelect',
                                    'l' => 'Choose crop',
                                    'ds' => 'vXPXr8v6wnVw4SW94NSox',
                                    'opts' => [
                                        ['dmr6H0rRnP-2U2oBamh9P', 'Artichoke', '1'],
                                        ['-X3oXW_Y2arAm23x9oiSY', 'Beans  ', '2'],
                                        ['2Sl_mtuxLYo8FCEDP9GUg', 'Beets  ', '3'],
                                        ['p6wAixbSdsjE3wlCGY799', 'Broccoli  ', '4'],
                                        ['gREyfE_S-XvFEd4beSZC5', 'Brussel Sprouts', '5'],
                                        ['BankNF_jOwRd-cCJ2Ei9Q', 'Cabbage  ', '6'],
                                        ['BNbqIIgvIe13sXK0KmIUu', 'Carrots  ', '7'],
                                        ['pwWhOeKdOrZtgbnzyBXAr', 'Cauliflower  ', '8'],
                                        ['DWDuAlD1m9Az0p3WJ-WEF', 'Celery  ', '9'],
                                        ['VhGJDe36bWKwhrL86tC7f', 'Chard  ', '10'],
                                        ['i4YybqAcHYg22T1Rr2goD', 'Collards  ', '11'],
                                        ['lHA-bY59U4b56UIqJwSWn', 'Corn  ', '12'],
                                        ['4BVgZKjEHtNYgLIVeDIuh', 'Cucumbers  ', '13'],
                                        ['e_MxuLDu49P3bJreSJEOL', 'Eggplant  ', '14'],
                                        ['KJnaXHpB5Akpf6d4_okWM', 'Garlic  ', '15'],
                                        ['f6d_MmKRhtC2WWqScGK_3', 'Kale  ', '16'],
                                        ['Je8bcfJM-2lrCIxIMGYWC', 'Kohlrabi  ', '17'],
                                        ['ACgtHmk2DyecAfS_8B3b7', 'Leek  ', '18'],
                                        ['qg1aZMlY_o7Aa1LBserTR', 'Lettuce  ', '19'],
                                        ['dXJDOjLk4LFNTqH26k8hT', 'Melons  ', '20'],
                                        ['tnXniILBhg6F3_gaae1Lm', 'Okra  ', '21'],
                                        ['vV8jtYSYRXZHqKHHCdHMB', 'Onions  ', '22'],
                                        ['9tYr2FuSeRW-7G-ppJ8V2', 'Peas  ', '23'],
                                        ['5DVkTTdu636FjOzeZ0feX', 'Peppers  ', '24'],
                                        ['ckOm_9hPcVstT06yXkc2O', 'Potatoes  ', '25'],
                                        ['do2ZSVm6M3URjgTnldiLf', 'Pumpkins  ', '26'],
                                        ['wln9D19SX1nS-Dkeu728y', 'Radish  ', '27'],
                                        ['zS8FZkkcvbl2-7l586JqC', 'Spinach  ', '28'],
                                        ['bCjwWrtAZQhDT-_15cWUR', 'Squash  ', '29'],
                                        ['0CdGFBRgeT5Ig1AWDvtiC', 'Tomatoes  ', '30'],
                                        ['KkVeuD5YRJAyIbjCmPtFz', 'Turnips  ', '31'],
                                        ['u-6mWLhcEHX4OkWyXNqWc', 'Watermelons  ', '32'],
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
                                    'n' => 'length_of_row',
                                    'vt' => 'numerical',
                                    'l' => 'Length of rows',
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
                                    'n' => 'no_of_rows',
                                    'vt' => 'numerical',
                                    'l' => 'Number of rows',
                                    'suf' => 'row(s)',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'yield_rate', 'vt' => 'dependent', 'l' => 'Yield rate'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'seed_distance_copy',
                                    'vt' => 'numerical',
                                    'l' => 'Seed distance (isolation distance)',
                                    'h' => 'Minimum distance required between seeds.',
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
                                ['t' => 'v', 'n' => 'seed_distance', 'vt' => 'dependent', 'l' => 'Seed distance'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'expected_yield',
                                    'vt' => 'numerical',
                                    'l' => 'Expected yield',
                                    'us' => '22',
                                    'du' => 'kg',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'wiCh3d5VNl81sMbDBtofO',
                'title' => 'Farm/garden dimensions',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'garden_length',
                                    'vt' => 'numerical',
                                    'l' => 'Required length',
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
                                    'n' => 'garden_width',
                                    'vt' => 'numerical',
                                    'l' => 'Required width',
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
                                    'n' => 'garden_area',
                                    'vt' => 'numerical',
                                    'l' => 'Required area',
                                    'us' => '28',
                                    'du' => 'm2',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'expected_yield = length_of_row * one_way(no_of_rows) * one_way(yield_rate)',
                'var' => [
                    [
                        'l' => 'expected_yield',
                        'f' => 'length_of_row*(no_of_rows)*(yield_rate)',
                        'r' => ['length_of_row', 'no_of_rows', 'yield_rate'],
                    ],
                    [
                        'l' => 'length_of_row',
                        'f' => 'expected_yield/((no_of_rows)*(yield_rate))',
                        'r' => ['expected_yield', 'no_of_rows', 'yield_rate'],
                    ],
                ],
            ],
            [
                'formula' => 'seed_distance_copy = one_way(seed_distance)',
                'var' => [
                    [
                        'l' => 'seed_distance_copy',
                        'f' => '(seed_distance)',
                        'r' => ['seed_distance'],
                    ],
                ],
            ],
            [
                'formula' => 'garden_length = one_way(length_of_row + 3 + 2*seed_distance / 12)',
                'var' => [
                    [
                        'l' => 'garden_length',
                        'f' => '(length_of_row + (1/6)*seed_distance + 3)',
                        'r' => ['length_of_row', 'seed_distance'],
                    ],
                ],
            ],
            [
                'formula' => 'garden_width = one_way(((no_of_rows + 1) * seed_distance / 12) + (no_of_rows - 1) * 1.5)',
                'var' => [
                    [
                        'l' => 'garden_width',
                        'f' => '((1/12)*no_of_rows*seed_distance + (3/2)*no_of_rows + (1/12)*seed_distance - 3/2)',
                        'r' => ['no_of_rows', 'seed_distance'],
                    ],
                ],
            ],
            [
                'formula' => 'garden_area = one_way(garden_length * garden_width)',
                'var' => [
                    [
                        'l' => 'garden_area',
                        'f' => '((length_of_row + (1/6)*seed_distance + 3)*((1/12)*no_of_rows*seed_distance + (3/2)*no_of_rows + (1/12)*seed_distance - 3/2))',
                        'r' => ['length_of_row', 'no_of_rows', 'seed_distance'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'vXPXr8v6wnVw4SW94NSox' => [
                'name' => 'veggie',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'dmr6H0rRnP-2U2oBamh9P', 'label' => 'Artichoke', 'value' => '1'],
                    ['uid' => '-X3oXW_Y2arAm23x9oiSY', 'label' => 'Beans  ', 'value' => '2'],
                    ['uid' => '2Sl_mtuxLYo8FCEDP9GUg', 'label' => 'Beets  ', 'value' => '3'],
                    ['uid' => 'p6wAixbSdsjE3wlCGY799', 'label' => 'Broccoli  ', 'value' => '4'],
                    ['uid' => 'gREyfE_S-XvFEd4beSZC5', 'label' => 'Brussel Sprouts', 'value' => '5'],
                    ['uid' => 'BankNF_jOwRd-cCJ2Ei9Q', 'label' => 'Cabbage  ', 'value' => '6'],
                    ['uid' => 'BNbqIIgvIe13sXK0KmIUu', 'label' => 'Carrots  ', 'value' => '7'],
                    ['uid' => 'pwWhOeKdOrZtgbnzyBXAr', 'label' => 'Cauliflower  ', 'value' => '8'],
                    ['uid' => 'DWDuAlD1m9Az0p3WJ-WEF', 'label' => 'Celery  ', 'value' => '9'],
                    ['uid' => 'VhGJDe36bWKwhrL86tC7f', 'label' => 'Chard  ', 'value' => '10'],
                    ['uid' => 'i4YybqAcHYg22T1Rr2goD', 'label' => 'Collards  ', 'value' => '11'],
                    ['uid' => 'lHA-bY59U4b56UIqJwSWn', 'label' => 'Corn  ', 'value' => '12'],
                    ['uid' => '4BVgZKjEHtNYgLIVeDIuh', 'label' => 'Cucumbers  ', 'value' => '13'],
                    ['uid' => 'e_MxuLDu49P3bJreSJEOL', 'label' => 'Eggplant  ', 'value' => '14'],
                    ['uid' => 'KJnaXHpB5Akpf6d4_okWM', 'label' => 'Garlic  ', 'value' => '15'],
                    ['uid' => 'f6d_MmKRhtC2WWqScGK_3', 'label' => 'Kale  ', 'value' => '16'],
                    ['uid' => 'Je8bcfJM-2lrCIxIMGYWC', 'label' => 'Kohlrabi  ', 'value' => '17'],
                    ['uid' => 'ACgtHmk2DyecAfS_8B3b7', 'label' => 'Leek  ', 'value' => '18'],
                    ['uid' => 'qg1aZMlY_o7Aa1LBserTR', 'label' => 'Lettuce  ', 'value' => '19'],
                    ['uid' => 'dXJDOjLk4LFNTqH26k8hT', 'label' => 'Melons  ', 'value' => '20'],
                    ['uid' => 'tnXniILBhg6F3_gaae1Lm', 'label' => 'Okra  ', 'value' => '21'],
                    ['uid' => 'vV8jtYSYRXZHqKHHCdHMB', 'label' => 'Onions  ', 'value' => '22'],
                    ['uid' => '9tYr2FuSeRW-7G-ppJ8V2', 'label' => 'Peas  ', 'value' => '23'],
                    ['uid' => '5DVkTTdu636FjOzeZ0feX', 'label' => 'Peppers  ', 'value' => '24'],
                    ['uid' => 'ckOm_9hPcVstT06yXkc2O', 'label' => 'Potatoes  ', 'value' => '25'],
                    ['uid' => 'do2ZSVm6M3URjgTnldiLf', 'label' => 'Pumpkins  ', 'value' => '26'],
                    ['uid' => 'wln9D19SX1nS-Dkeu728y', 'label' => 'Radish  ', 'value' => '27'],
                    ['uid' => 'zS8FZkkcvbl2-7l586JqC', 'label' => 'Spinach  ', 'value' => '28'],
                    ['uid' => 'bCjwWrtAZQhDT-_15cWUR', 'label' => 'Squash  ', 'value' => '29'],
                    ['uid' => '0CdGFBRgeT5Ig1AWDvtiC', 'label' => 'Tomatoes  ', 'value' => '30'],
                    ['uid' => 'KkVeuD5YRJAyIbjCmPtFz', 'label' => 'Turnips  ', 'value' => '31'],
                    ['uid' => 'u-6mWLhcEHX4OkWyXNqWc', 'label' => 'Watermelons  ', 'value' => '32'],
                ],
            ],
        ],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        Vegetable yield turns Choose crop, Length of rows and Number of rows into Yield rate and Seed distance. It is a single relationship that reads Yield rate out of Choose crop, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Vegetable yield calculator works', 'html' => <<<'TXT'
            <p>The Vegetable yield calculator applies one relationship to 8 numbers and reports Yield rate and Seed distance.</p><p>The relationship it solves reads Expected yield = Length of rows × (Number of rows) × (Yield rate).</p><p>The answers are Yield rate and Seed distance; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 8 boxes and the page has everything it needs.</p><ul><li><strong>Choose crop</strong> — a plain number, no unit</li><li><strong>Length of rows</strong> — in meters</li><li><strong>Number of rows</strong> — in row(s)</li><li><strong>Seed distance (isolation distance)</strong> — in centimeters. Minimum distance required between seeds.</li><li><strong>Expected yield</strong> — in kilograms</li><li><strong>Required length</strong> — in meters</li><li><strong>Required width</strong> — in meters</li><li><strong>Required area</strong> — in square meters</li></ul><p>The result boxes are Yield rate, Seed distance; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Choose crop = 1 and Number of rows = 1 row(s); the answers are &lt;strong&gt;Seed distance (isolation distance)&lt;/strong&gt; = 0 cm and &lt;strong&gt;Required width&lt;/strong&gt; = 0 m.</p><ul><li><strong>Seed distance (isolation distance)</strong> = 0 cm</li><li><strong>Required width</strong> = 0 m</li></ul><p>That is <strong>Expected yield</strong> = <code>Length of rows × (Number of rows) × (Yield rate)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Seed distance (isolation distance)&lt;/strong&gt; = 0 and &lt;strong&gt;Required width&lt;/strong&gt; = 0 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Length of rows offers 31 units and opens on meters, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Expected yield</strong> = <code>Length of rows × (Number of rows) × (Yield rate)</code></li><li><strong>Length of rows</strong> = <code>Expected yield ÷ ((Number of rows) × (Yield rate))</code></li><li><strong>Seed distance (isolation distance)</strong> = <code>(Seed distance)</code></li><li><strong>Required length</strong> = <code>(Length of rows + (1 ÷ 6) × Seed distance + 3)</code></li><li><strong>Required width</strong> = <code>((1 ÷ 12) × Number of rows × Seed distance + (3 ÷ 2) × Number of rows + (1 ÷ 12) × Seed distance − 3 ÷ 2)</code></li><li><strong>Required area</strong> = <code>((Length of rows + (1 ÷ 6) × Seed distance + 3) × ((1 ÷ 12) × Number of rows × Seed distance + (3 ÷ 2) × Number of rows + (1 ÷ 12) × Seed distance − 3 ÷ 2))</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Expected yield, Length of rows and Seed distance (isolation distance) can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Choose crop from 1 to 2, leaving every other box alone. The panel moves from &lt;strong&gt;Seed distance (isolation distance)&lt;/strong&gt; 0 cm and &lt;strong&gt;Required width&lt;/strong&gt; 0 m to &lt;strong&gt;Seed distance (isolation distance)&lt;/strong&gt; 0 cm and &lt;strong&gt;Required width&lt;/strong&gt; 0 m.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Length of rows, Seed distance (isolation distance) and Expected yield is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Yield rate and Seed distance are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Choose crop and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Choose crop, Length of rows and Number of rows measured, Yield rate and Seed distance wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/protein-gravy-calculator">Protein GRAVY (Hydropathy) Calculator</a>, <a href="/biology/protein-hydrodynamic-radius">Protein Hydrodynamic Radius Calculator</a> and <a href="/biology/protein-isoelectric-point">Protein Isoelectric Point Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Vegetable yield calculator work out?', 'a' => <<<'TXT'
            Yield rate and Seed distance, from Length of rows, Number of rows and Yield rate. The relationship is Expected yield = Length of rows × (Number of rows) × (Yield rate).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Choose crop, Length of rows (meters), Number of rows (row(s)), Seed distance (isolation distance) (centimeters), Expected yield (kilograms). Enter crop_type, length_of_row and no_of_rows; Yield rate is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Expected yield, Length of rows, Seed distance (isolation distance) and Required length can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Seed distance (isolation distance) = 0 cm and Required width = 0 m. Those are the defaults written into the form — move Choose crop and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Yield rate is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Choose crop left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Yield rate keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/protein-gravy-calculator', 'name' => 'Protein GRAVY (Hydropathy) Calculator'],
            ['path' => '/biology/protein-hydrodynamic-radius', 'name' => 'Protein Hydrodynamic Radius Calculator'],
            ['path' => '/biology/protein-isoelectric-point', 'name' => 'Protein Isoelectric Point Calculator'],
        ],
        'authors' => [],
    ],
];
