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
    'meta' => ['title' => 'Sod Calculator — Free, With Worked Examples', 'description' => 'Give the Sod calculator the width, the waste factor, the total sod area and the roll length and it returns <strong>length</strong>. The Sod calculator takes…', 'h1' => 'Sod Calculator', 'updated' => '2026-08-12'],
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
        'intro' => 'Give the Sod calculator the width, the waste factor, the total sod area and the roll length and it returns <strong>length</strong>.',
        'sections' => [
            ['title' => 'How does the Sod calculator work?', 'html' => <<<'TXT'
            <p>The Sod calculator takes the values in the form, applies the relationship described below and reports <strong>length</strong> in the results panel.</p>
            <p>Working from the top of the form: you type in the width, the waste factor, the total sod area and the roll length.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li> The unit chip switches it to any of the 34 supported units.</li><li>A measured quantity, entered by default in percent. The unit chip switches it to any of the 6 supported units.</li><li>A measured quantity, entered by default in square meters. The unit chip switches it to any of the 24 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li></ul>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Length</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>Calculated</td></tr><tr><td><strong>Width</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>You supply it</td></tr><tr><td><strong>Total sod area</strong></td><td>A measured quantity, 24 units available.</td><td>square meters</td><td>Calculated</td></tr><tr><td><strong>Waste factor</strong></td><td>A measured quantity, 6 units available.</td><td>percent</td><td>You supply it</td></tr><tr><td><strong>Area waste</strong></td><td>A measured quantity, 24 units available.</td><td>square meters</td><td>Calculated</td></tr><tr><td><strong>Total sod area</strong></td><td>A measured quantity, 24 units available.</td><td>square meters</td><td>You supply it</td></tr><tr><td><strong>Roll length</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>You supply it</td></tr><tr><td><strong>Roll width</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>You supply it</td></tr><tr><td><strong>Roll area</strong></td><td>A measured quantity, 24 units available.</td><td>square meters</td><td>Calculated</td></tr><tr><td><strong>Roll price</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>Calculated</td></tr><tr><td><strong>Number of rolls</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Total cost</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Sod calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Length</span><span class="formula-eq">=</span><span class="formula-rhs">total area ÷ width</span></div><div class="formula-row"><span class="formula-lhs">Roll area</span><span class="formula-eq">=</span><span class="formula-rhs">roll length × roll width</span></div><div class="formula-row"><span class="formula-lhs">Area waste</span><span class="formula-eq">=</span><span class="formula-rhs">total area × waste factor</span></div><div class="formula-row"><span class="formula-lhs">Area waste</span><span class="formula-eq">=</span><span class="formula-rhs">-total area + total sod area</span></div><div class="formula-row"><span class="formula-lhs">Roll area</span><span class="formula-eq">=</span><span class="formula-rhs">total sod area ÷ number of rolls</span></div><div class="formula-row"><span class="formula-lhs">Roll price</span><span class="formula-eq">=</span><span class="formula-rhs">total cost ÷ total sod area</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What is a worked example?', 'html' => <<<'TXT'
            <p>Open the page and it is already filled in. With the values it starts from — <strong>Waste factor</strong> = 10 %, <strong>Roll length</strong> = 200 m and <strong>Roll width</strong> = 50 m — it reports <strong>Roll area</strong> = 0.0001 m².</p><p>Those are real numbers produced by the same engine that runs when you press Calculate, so you can change any single box afterwards and watch the answer move from this starting point.</p><ol><li>Enter the values listed above, matching the units each box asks for.</li><li>Read off the result. Any field you leave empty is the one the calculator solves for.</li><li>Sanity-check the number against the relationship: <strong>Roll area</strong> = 0.0001 m² should be roughly the size you expected from <strong>Waste factor</strong> = 10 % and <strong>Roll length</strong> = 200 m.</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in meters, and convertible to any of the 34 units on that chip.</li><li>Shown in square meters, and convertible to any of the 24 units on that chip.</li><li>Shown in square meters, and convertible to any of the 24 units on that chip.</li><li>Shown in square meters, and convertible to any of the 24 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in meters</li><li>Length, opening in meters</li><li>Area, opening in square meters</li><li>%, opening in percent</li><li>Area, opening in square meters</li><li>Area, opening in square meters</li><li>Length, opening in meters</li><li>Length, opening in meters</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Sod calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Comparing two organisms, populations or processes</li><li>Putting a biological quantity into a scale you can picture</li><li>Supporting a lesson, a lecture or a field note</li><li>Any time the same 4 figures keep coming back — the width, the waste factor and the total sod area — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li><li>Keep the units you enter consistent. </li><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li><li>Round only at the end. </li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/soil">Soil</a>, <a href="/biology/swine-gestation">Swine gestation</a> and <a href="/biology/the-cost-of-owning-a-dog">Cost of owning a dog</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Sod calculator work out?', 'a' => <<<'TXT'
            It returns length, derived from the width, the waste factor and the total sod area. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Sod calculator?', 'a' => <<<'TXT'
            The form asks for the width, the waste factor, the total sod area and the roll length, which is 6 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter length in a different unit?', 'a' => <<<'TXT'
            Yes. Length opens in meters and the chip beside it offers 34 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'What is a typical result?', 'a' => <<<'TXT'
            With the values the page starts from, the calculator reports Roll area = 0.0001 m². Treat that as a reference point rather than a recommendation: it exists so you can tell at a glance whether your own inputs are on the same scale.
            TXT],
            ['q' => 'Is the Sod calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/soil', 'name' => 'Soil'],
            ['path' => '/biology/swine-gestation', 'name' => 'Swine gestation'],
            ['path' => '/biology/the-cost-of-owning-a-dog', 'name' => 'Cost of owning a dog'],
        ],
    ],
];
