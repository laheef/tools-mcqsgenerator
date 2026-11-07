<?php

/**
 * Compost
 * /biology/compost
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Compost',
    'meta' => ['title' => 'Compost Calculator: Formula, Steps & Examples', 'description' => <<<'TXT'
    Compost takes Length, Width and Area and returns Depth. If you&#039;re unsure about the depth of compost you need, choose an option from this menu.Volume — in…
    TXT, 'h1' => 'Compost Calculator', 'updated' => '2026-08-21'],
    'raw' => [
        'vars' => [
            'area' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'cost' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'density' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '650', 'c' => null],
                    ['v' => '40', 'c' => 'userUsesImperialUnits()'],
                ],
            ],
            'depth' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.1'],
            ],
            'length' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'price' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'space' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => '_iPmL-wSuKTa4zjyqimcj', 'c' => null],
                ],
                'ds' => 'TrrQKs7kAtjS3Nk-lJrOd',
            ],
            'total_weight' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'volume' => [
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
                'uid' => 'DKSREVxXWW5ZIC3nJZexE',
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
                                        [null, '🍂 Composting guide or supply store? Help readers get the right amount. Prompt your own compost tool ➔&nbsp;'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 's3R7x0sIr4u4hrjzliyCe',
                'title' => 'Compost volume',
                'desc' => 'How much compost do I need?',
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
                                    'n' => 'space',
                                    'vt' => 'valueSelect',
                                    'l' => 'Garden or lawn type',
                                    'h' => 'If you\'re unsure about the depth of compost you need, choose an option from this menu.',
                                    'ds' => 'TrrQKs7kAtjS3Nk-lJrOd',
                                    'opts' => [
                                        ['u5Qrwo12AE2LBhEZQtbGY', 'New lawn - high compost level', '1'],
                                        ['HKWaL2r2i5HUMQTEzz4Rh', 'New lawn - low compost level', '2'],
                                        ['eaiRXxW8nUUxjw66sDRiU', 'Established lawn - high compost level', '3'],
                                        ['7wTPkuUu3Jsp091xoX2b4', 'Established lawn - low compost level', '4'],
                                        ['-CrkrP1fy-Uet1fSPuJu7', 'Garden - high compost level', '5'],
                                        ['YM56e53Zd-ILXhmjILK3D', 'Garden - low compost level', '6'],
                                        ['Kfq4mowxuhMRk5fWHBMXD', 'Raised bed - high compost level', '7'],
                                        ['YyI5lEBkromOILW1F3C3E', 'Raised bed - low compost level', '8'],
                                        ['_iPmL-wSuKTa4zjyqimcj', 'Custom depth', '0'],
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
                                    'n' => 'depth',
                                    'vt' => 'dependent',
                                    'l' => 'Depth',
                                    'h' => 'If you\'re unsure about the depth of compost you need, choose an option from the menu above.',
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
                                    'n' => 'volume',
                                    'vt' => 'numerical',
                                    'l' => 'Volume',
                                    'us' => '20',
                                    'du' => 'm3',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'mVrss9RvbZKboM527nTRx',
                'title' => 'Compost cost',
                'desc' => 'What is the cost of this much compost?',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'price',
                                    'vt' => 'numerical',
                                    'l' => 'Price ',
                                    'h' => 'A 1-cubic foot bag of compost typically costs around $5.',
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
                                    'l' => 'Total cost',
                                    'us' => '663',
                                    'du' => 'USD',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'sfapndVtSpQTnU4-9FRCU',
                'title' => 'Compost weight',
                'desc' => 'What will be the weight of this much compost?',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'density',
                                    'vt' => 'numerical',
                                    'l' => 'Density',
                                    'h' => 'A one-pound bag of compost typically weighs about 40 pounds.',
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
                                    'n' => 'total_weight',
                                    'vt' => 'numerical',
                                    'l' => 'Total weight',
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
                'formula' => 'area = length * width',
                'var' => [
                    [
                        'l' => 'width',
                        'f' => 'area/length',
                        'r' => ['length', 'area'],
                    ],
                    [
                        'l' => 'length',
                        'f' => 'area/width',
                        'r' => ['width', 'area'],
                    ],
                    [
                        'l' => 'area',
                        'f' => 'length*width',
                        'r' => ['width', 'length'],
                    ],
                ],
            ],
            [
                'formula' => 'volume = area * depth',
                'var' => [
                    [
                        'l' => 'volume',
                        'f' => 'area*depth',
                        'r' => ['depth', 'area'],
                    ],
                    [
                        'l' => 'depth',
                        'f' => 'volume/area',
                        'r' => ['volume', 'area'],
                    ],
                    [
                        'l' => 'area',
                        'f' => 'volume/depth',
                        'r' => ['volume', 'depth'],
                    ],
                ],
            ],
            [
                'formula' => 'cost = price * volume ',
                'var' => [
                    [
                        'l' => 'volume',
                        'f' => 'cost/price',
                        'r' => ['cost', 'price'],
                    ],
                    [
                        'l' => 'cost',
                        'f' => 'price*volume',
                        'r' => ['volume', 'price'],
                    ],
                    [
                        'l' => 'price',
                        'f' => 'cost/volume',
                        'r' => ['volume', 'cost'],
                    ],
                ],
            ],
            [
                'formula' => 'total_weight = density * volume',
                'var' => [
                    [
                        'l' => 'volume',
                        'f' => 'total_weight/density',
                        'r' => ['total_weight', 'density'],
                    ],
                    [
                        'l' => 'total_weight',
                        'f' => 'density*volume',
                        'r' => ['volume', 'density'],
                    ],
                    [
                        'l' => 'density',
                        'f' => 'total_weight/volume',
                        'r' => ['volume', 'total_weight'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'TrrQKs7kAtjS3Nk-lJrOd' => [
                'name' => 'spaceDS',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'u5Qrwo12AE2LBhEZQtbGY', 'label' => 'New lawn - high compost level', 'value' => '1'],
                    ['uid' => 'HKWaL2r2i5HUMQTEzz4Rh', 'label' => 'New lawn - low compost level', 'value' => '2'],
                    ['uid' => 'eaiRXxW8nUUxjw66sDRiU', 'label' => 'Established lawn - high compost level', 'value' => '3'],
                    ['uid' => '7wTPkuUu3Jsp091xoX2b4', 'label' => 'Established lawn - low compost level', 'value' => '4'],
                    ['uid' => '-CrkrP1fy-Uet1fSPuJu7', 'label' => 'Garden - high compost level', 'value' => '5'],
                    ['uid' => 'YM56e53Zd-ILXhmjILK3D', 'label' => 'Garden - low compost level', 'value' => '6'],
                    ['uid' => 'Kfq4mowxuhMRk5fWHBMXD', 'label' => 'Raised bed - high compost level', 'value' => '7'],
                    ['uid' => 'YyI5lEBkromOILW1F3C3E', 'label' => 'Raised bed - low compost level', 'value' => '8'],
                    ['uid' => '_iPmL-wSuKTa4zjyqimcj', 'label' => 'Custom depth', 'value' => '0'],
                ],
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Compost takes Length, Width and Area and returns Depth. The arithmetic is the whole method: Depth is worked out from Length by one formula, applied once. Depth comes back in centimeters unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Compost calculator works', 'html' => <<<'TXT'
            <p>The Compost calculator applies one relationship to 9 numbers and reports Depth.</p><p>The relationship it solves reads Width = Area ÷ Length.</p><p>What comes back is Depth — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 9 boxes and the page has everything it needs.</p><ul><li><strong>Length</strong> — in meters</li><li><strong>Width</strong> — in meters</li><li><strong>Area</strong> — in square meters</li><li><strong>Garden or lawn type</strong> — a plain number, no unit. If you&#039;re unsure about the depth of compost you need, choose an option from this menu.</li><li><strong>Volume</strong> — in cubic meters</li><li><strong>Price</strong> — in USD. A 1-cubic foot bag of compost typically costs around $5.</li><li><strong>Total cost</strong> — in USD</li><li><strong>Density</strong> — in kilograms per cubic meter. A one-pound bag of compost typically weighs about 40 pounds.</li><li><strong>Total weight</strong> — in kilograms</li></ul><p>What you get back is Depth in centimeters, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Depth offers 31 units and opens on centimeters, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Width</strong> = <code>Area ÷ Length</code></li><li><strong>Length</strong> = <code>Area ÷ Width</code></li><li><strong>Area</strong> = <code>Length × Width</code></li><li><strong>Volume</strong> = <code>Area × Depth</code></li><li><strong>Depth</strong> = <code>Volume ÷ Area</code></li><li><strong>Total cost</strong> = <code>Price × Volume</code></li></ul><p>Any one of Width, Length and Area can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Length, Width and Area is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Depth is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Convert Length to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Length, Width and Area and the number you are missing is Depth.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/percent-germination">Percent Germination Calculator</a>, <a href="/biology/percent-inhibition">Percent Inhibition Calculator</a> and <a href="/biology/percent-viability">Percent Viability Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Length (meters), Width (meters), Area (square meters), Garden or lawn type, Volume (cubic meters). Enter length, width and area; Depth is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Width, Length, Area and Volume blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Depth is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Length left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Depth keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/percent-germination', 'name' => 'Percent Germination Calculator'],
            ['path' => '/biology/percent-inhibition', 'name' => 'Percent Inhibition Calculator'],
            ['path' => '/biology/percent-viability', 'name' => 'Percent Viability Calculator'],
        ],
        'authors' => [],
    ],
];
