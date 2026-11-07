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
    'meta' => ['title' => 'Compost Calculator: Formula, Steps & Examples', 'description' => 'Give the Compost calculator the length, the area, the price and the density and it returns <strong>width</strong>. The Compost calculator takes the values in…', 'h1' => 'Compost Calculator', 'updated' => '2026-08-21'],
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
        'intro' => 'Give the Compost calculator the length, the area, the price and the density and it returns <strong>width</strong>.',
        'sections' => [
            ['title' => 'How does the Compost calculator work?', 'html' => <<<'TXT'
            <p>The Compost calculator takes the values in the form, applies the relationship described below and reports <strong>width</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the garden or lawn type); then you type in the length, the area, the price and the density.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li> The unit chip switches it to any of the 34 supported units.</li><li>A measured quantity, entered by default in square meters. The unit chip switches it to any of the 24 supported units.</li><li>Pick the option that matches your case — 9 options, such as new lawn - high compost level, new lawn - low compost level and established lawn - high compost level. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in kilograms per cubic meter. The unit chip switches it to any of the 9 supported units.</li></ul><p>One field on this form is a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Length</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>You supply it</td></tr><tr><td><strong>Width</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>Calculated</td></tr><tr><td><strong>Area</strong></td><td>A measured quantity, 24 units available.</td><td>square meters</td><td>You supply it</td></tr><tr><td><strong>Garden or lawn type</strong></td><td>One of 9 options, such as new lawn - high compost level, new lawn - low compost level and established lawn - high compost level.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Depth</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>Calculated</td></tr><tr><td><strong>Volume</strong></td><td>A measured quantity, 40 units available.</td><td>cubic meters</td><td>Calculated</td></tr><tr><td><strong>Price</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Total cost</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>Calculated</td></tr><tr><td><strong>Density</strong></td><td>A measured quantity, 9 units available.</td><td>kilograms per cubic meter</td><td>You supply it</td></tr><tr><td><strong>Total weight</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Compost calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Width</span><span class="formula-eq">=</span><span class="formula-rhs">area ÷ length</span></div><div class="formula-row"><span class="formula-lhs">Volume</span><span class="formula-eq">=</span><span class="formula-rhs">area × depth</span></div><div class="formula-row"><span class="formula-lhs">Volume</span><span class="formula-eq">=</span><span class="formula-rhs">total cost ÷ price</span></div><div class="formula-row"><span class="formula-lhs">Volume</span><span class="formula-eq">=</span><span class="formula-rhs">total weight ÷ density</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in meters, and convertible to any of the 34 units on that chip.</li><li>Shown in cubic meters, and convertible to any of the 40 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li><li>Shown in centimeters, and convertible to any of the 34 units on that chip.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in meters</li><li>Length, opening in meters</li><li>Area, opening in square meters</li><li>Length, opening in centimeters</li><li>Volume, opening in cubic meters</li><li>Currency, opening in US Dollar</li><li>Currency, opening in US Dollar</li><li>Density, opening in kilograms per cubic meter</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Compost calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Supporting a lesson, a lecture or a field note</li><li>Putting a biological quantity into a scale you can picture</li><li>Comparing two organisms, populations or processes</li><li>Any time the same 4 figures keep coming back — the length, the area and the price — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li><li>Round only at the end. </li><li>Keep the units you enter consistent. </li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/corn-yield">Corn yield</a>, <a href="/biology/cow-gestation">Cow gestation</a> and <a href="/biology/cricket-chirp-thermometer">Crickets chirping thermometer</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Compost calculator work out?', 'a' => <<<'TXT'
            It returns width, derived from the length, the area and the price. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Compost calculator?', 'a' => <<<'TXT'
            The form asks for the length, the area, the price and the density, which is 5 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter length in a different unit?', 'a' => <<<'TXT'
            Yes. Length opens in meters and the chip beside it offers 34 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There is one choice to make (1 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'What is a typical result?', 'a' => <<<'TXT'
            With the values the page starts from, the calculator reports Depth = 0 cm. Treat that as a reference point rather than a recommendation: it exists so you can tell at a glance whether your own inputs are on the same scale.
            TXT],
            ['q' => 'Is the Compost calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/corn-yield', 'name' => 'Corn yield'],
            ['path' => '/biology/cow-gestation', 'name' => 'Cow gestation'],
            ['path' => '/biology/cricket-chirp-thermometer', 'name' => 'Crickets chirping thermometer'],
        ],
    ],
];
