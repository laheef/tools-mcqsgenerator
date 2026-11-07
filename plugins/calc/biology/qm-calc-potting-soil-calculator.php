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
    'meta' => ['title' => 'Potting soil Calculator — Formula, Units & Example', 'description' => 'Supply the width, the depth, the diameter and the diameter across bottom and the Potting soil calculator solves for <strong>length</strong>.', 'h1' => 'Potting soil Calculator', 'updated' => '2026-09-28'],
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
        'intro' => 'Supply the width, the depth, the diameter and the diameter across bottom and the Potting soil calculator solves for <strong>length</strong>.',
        'sections' => [
            ['title' => 'How does the Potting soil calculator work?', 'html' => <<<'TXT'
            <p>The Potting soil calculator takes the values in the form, applies the relationship described below and reports <strong>length</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the shape); then you type in the width, the depth, the diameter and the diameter across bottom.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 3 options, such as rectangular, round and flower pot (truncated cone). The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li> The unit chip switches it to any of the 34 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li><li>A measured quantity, entered by default in liters. The unit chip switches it to any of the 40 supported units.</li><li>A measured quantity, entered by default in liters. The unit chip switches it to any of the 40 supported units.</li><li>A measured quantity, entered by default in liters. The unit chip switches it to any of the 40 supported units.</li></ul><p>One field on this form is a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Shape</strong></td><td>One of 3 options, such as rectangular, round and flower pot (truncated cone).</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Length</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>Calculated</td></tr><tr><td><strong>Width</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Depth</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Diameter</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Diameter across top</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>Calculated</td></tr><tr><td><strong>Diameter across bottom</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Quantity</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Volume of soil needed</strong></td><td>A measured quantity, 40 units available.</td><td>liters</td><td>You supply it</td></tr><tr><td><strong>Volume of soil needed (2)</strong></td><td>A measured quantity, 40 units available.</td><td>liters</td><td>You supply it</td></tr><tr><td><strong>Volume of soil needed (3)</strong></td><td>A measured quantity, 40 units available.</td><td>liters</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Potting soil calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Length</span><span class="formula-eq">=</span><span class="formula-rhs">volume of soil needed ÷ (depth × quantity × width)</span></div><div class="formula-row"><span class="formula-lhs">Quantity</span><span class="formula-eq">=</span><span class="formula-rhs">4 × volume of soil needed ÷ (PI × depth × (diameter ^ 2))</span></div><div class="formula-row"><span class="formula-lhs">Diameter across top</span><span class="formula-eq">=</span><span class="formula-rhs">-1 ÷ 2 × diameter across bottom + (1 ÷ 2) × the square root of (3) × the square root of (-PI × (diameter across bottom ^ 2) × (depth ^ 2) × (quantity ^ 2) + 16 × depth × quantity × volume of soil needed) ÷ (the square root of (PI) × depth × quantity)</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in centimeters, and convertible to any of the 34 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in centimeters, and convertible to any of the 34 units on that chip.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Volume, opening in liters</li><li>Volume, opening in liters</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Potting soil calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Supporting a lesson, a lecture or a field note</li><li>Putting a biological quantity into a scale you can picture</li><li>Comparing two organisms, populations or processes</li><li>Any time the same 4 figures keep coming back — the width, the depth and the diameter — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li><li>Keep the units you enter consistent. </li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/protein-concentration">Protein concentration</a>, <a href="/biology/protein-molecular-weight">Protein molecular weight</a> and <a href="/biology/punnett-square">Punnett square</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Potting soil calculator work out?', 'a' => <<<'TXT'
            It returns length, derived from the width, the depth and the diameter. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Potting soil calculator?', 'a' => <<<'TXT'
            The form asks for the width, the depth, the diameter and the diameter across bottom, which is 8 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter length in a different unit?', 'a' => <<<'TXT'
            Yes. Length opens in centimeters and the chip beside it offers 34 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There is one choice to make (1 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'Is the Potting soil calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/protein-concentration', 'name' => 'Protein concentration'],
            ['path' => '/biology/protein-molecular-weight', 'name' => 'Protein molecular weight'],
            ['path' => '/biology/punnett-square', 'name' => 'Punnett square'],
        ],
    ],
];
