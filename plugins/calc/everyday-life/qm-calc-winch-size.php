<?php

/**
 * Winch size
 * /everyday-life/winch-size
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Winch size',
    'meta' => ['title' => 'Winch size Calculator — Formula, Units & Example', 'description' => 'Enter i want to..., mode and vehicle type and Winch size returns pull. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Winch size Calculator', 'updated' => '2026-08-22'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'choice',
                            'label' => 'I want to...',
                            'type' => 'select',
                            'options' => ['right a rolled over load' => '1', 'move a load' => '2'],
                            'dataset' => 'situation',
                            'defaults' => [
                                ['value' => 'right a rolled over load', 'when' => null],
                                ['value' => 'right a rolled over load', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mode',
                            'label' => 'Mode',
                            'type' => 'select',
                            'options' => ['Input weight' => '0', 'Choose vehicle type' => '1'],
                            'dataset' => 'mode',
                            'default' => 'Choose vehicle type',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'vehicle',
                            'label' => 'Vehicle type',
                            'type' => 'select',
                            'options' => ['Small car' => '1000', 'Medium car' => '1500', 'Full-size car' => '2000', 'Van' => '3000'],
                            'dataset' => 'vehicle',
                            'control' => 'DROPDOWN',
                            'default' => 'Small car',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'weight_custom',
                            'label' => 'Weight ',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'original_wheels',
                            'label' => 'Original wheels',
                            'type' => 'number',
                            'help' => 'How many wheels does the vehicle have?',
                            'rounding' => ['standard', '0'],
                        ],
                        [
                            'name' => 'damaged_wheels',
                            'label' => 'Damaged wheels',
                            'type' => 'number',
                            'help' => 'How many wheels are damaged? Twin rear wheels count as one.',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ground_factor',
                            'label' => 'Ground type',
                            'type' => 'select',
                            'options' => [
                                'Road' => '25',
                                'Grass' => '4',
                                'Gravel' => '5',
                                'Shingle' => '3',
                                'Sand, mud or soft clay' => '2',
                                'Bogged to axle' => '1',
                                'Bogged to wheel top' => '0.5',
                                'Bogged to bonnet' => '0.3333333333',
                            ],
                            'dataset' => 'resistance',
                            'control' => 'DROPDOWN',
                            'defaults' => [
                                ['value' => 'Road', 'when' => null],
                                ['value' => 'Road', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'direction',
                            'label' => 'Direction',
                            'type' => 'select',
                            'options' => ['Uphill' => '1', 'Downhill' => '-1'],
                            'dataset' => 'direction',
                            'defaults' => [
                                ['value' => 'Uphill', 'when' => null],
                                ['value' => 'Uphill', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gradient_resistance',
                            'label' => 'Degree of slope',
                            'type' => 'select',
                            'options' => ['0-15°' => '0', '15-30°' => '0.25', '30-45°' => '0.5', 'over 45°' => '1'],
                            'dataset' => 'gradient',
                            'control' => 'DROPDOWN',
                            'default' => '0-15°',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pull',
                            'label' => 'Pull',
                            'type' => 'number',
                            'help' => 'Winch line pull you need.',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'distance',
                            'label' => 'Centre of gravity',
                            'type' => 'number',
                            'help' => 'Distance to the centre of mass measured behind the front axle.',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'height',
                            'label' => 'Height',
                            'type' => 'number',
                            'help' => 'Height of the vehicle.',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'right',
                            'label' => 'Pull',
                            'type' => 'number',
                            'help' => 'Winch line pull you need.',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'hidden parameters',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rolling_resistance',
                            'label' => 'Rolling resistance',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'damage_resistance',
                            'label' => 'Damage resistance',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gradient_resistance_2',
                            'label' => 'Gradient resistance 2',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mode_number',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'weight',
                            'label' => 'Weight',
                            'type' => 'result',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '1000', 'when' => null],
                                ['value' => '2204.6', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'rolling_resistance = weight / ground_factor',
            'results' => ['ground_factor' => 'weight/rolling_resistance', 'rolling_resistance' => 'weight/ground_factor', 'weight' => 'ground_factor*rolling_resistance'],
        ],
        [
            'title' => 'rolling_resistance = weight_custom / ground_factor',
            'results' => ['ground_factor' => 'weight_custom/rolling_resistance', 'rolling_resistance' => 'weight_custom/ground_factor', 'weight_custom' => 'ground_factor*rolling_resistance'],
        ],
        [
            'title' => 'damage_resistance = (weight * damaged_wheels) / original_wheels',
            'results' => ['damage_resistance' => 'damaged_wheels*weight/original_wheels', 'original_wheels' => 'damaged_wheels*weight/damage_resistance', 'damaged_wheels' => 'damage_resistance*original_wheels/weight', 'weight' => 'damage_resistance*original_wheels/damaged_wheels'],
        ],
        [
            'title' => 'damage_resistance = (weight_custom * damaged_wheels) / original_wheels',
            'results' => ['original_wheels' => 'damaged_wheels*weight_custom/damage_resistance', 'damaged_wheels' => 'damage_resistance*original_wheels/weight_custom', 'damage_resistance' => 'damaged_wheels*weight_custom/original_wheels', 'weight_custom' => 'damage_resistance*original_wheels/damaged_wheels'],
        ],
        [
            'title' => 'pull = rolling_resistance + damage_resistance + direction * gradient_resistance_2',
            'results' => [
                'damage_resistance' => '-direction*gradient_resistance_2 + pull - rolling_resistance',
                'direction' => '(-damage_resistance + pull - rolling_resistance)/gradient_resistance_2',
                'rolling_resistance' => '-damage_resistance - direction*gradient_resistance_2 + pull',
                'gradient_resistance_2' => '(-damage_resistance + pull - rolling_resistance)/direction',
                'pull' => 'damage_resistance + direction*gradient_resistance_2 + rolling_resistance',
            ],
        ],
        [
            'title' => 'right = distance * weight / height',
            'results' => ['height' => 'distance*weight/right', 'weight' => 'height*right/distance', 'distance' => 'height*right/weight', 'right' => 'distance*weight/height'],
        ],
        [
            'title' => 'right = distance * weight_custom / height',
            'results' => ['height' => 'distance*weight_custom/right', 'weight_custom' => 'height*right/distance', 'distance' => 'height*right/weight_custom', 'right' => 'distance*weight_custom/height'],
        ],
        [
            'title' => 'gradient_resistance_2 = weight * gradient_resistance',
            'results' => ['gradient_resistance' => 'gradient_resistance_2/weight', 'weight' => 'gradient_resistance_2/gradient_resistance', 'gradient_resistance_2' => 'gradient_resistance*weight'],
        ],
        [
            'title' => 'gradient_resistance_2 = weight_custom * gradient_resistance',
            'results' => ['gradient_resistance' => 'gradient_resistance_2/weight_custom', 'gradient_resistance_2' => 'gradient_resistance*weight_custom', 'weight_custom' => 'gradient_resistance_2/gradient_resistance'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Supply the damaged wheels, the pull and the centre of gravity and the Winch size calculator solves for <strong>ground type</strong>.

        The panel waits for the button.
        TXT,
        'sections' => [
            ['title' => 'How does the Winch size calculator work?', 'html' => <<<'TXT'
            <p>The Winch size calculator takes the values in the form, applies the relationship described below and reports <strong>ground type</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the mode and the vehicle type); then you type in the damaged wheels, the pull, the centre of gravity and the pull (2).</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 2 options, such as right a rolled over load and move a load. </li><li>Pick the option that matches your case — 2 options, such as input weight and choose vehicle type. </li><li>Pick the option that matches your case — 4 options, such as small car, medium car and full-size car. </li><li>A plain number with no unit attached.</li><li>A measured quantity, entered by default in kilograms. The unit chip switches it to any of the 29 supported units.</li><li>A measured quantity, entered by default in meters. </li><li>A measured quantity, entered by default in kilograms. The unit chip switches it to any of the 29 supported units.</li></ul><p>6 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Mode</strong></td><td>One of 2 options, such as input weight and choose vehicle type.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Vehicle type</strong></td><td>One of 4 options, such as small car, medium car and full-size car.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Weight</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>Calculated</td></tr><tr><td><strong>Original wheels</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Damaged wheels</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Ground type</strong></td><td>One of 8 options, such as road, grass and gravel.</td><td>choice</td><td>Calculated</td></tr><tr><td><strong>Direction</strong></td><td>One of 2 options, such as uphill and downhill.</td><td>choice</td><td>Calculated</td></tr><tr><td><strong>Degree of slope</strong></td><td>One of 4 options, such as 0-15°, 15-30° and 30-45°.</td><td>choice</td><td>Calculated</td></tr><tr><td><strong>Pull</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>You supply it</td></tr><tr><td><strong>Centre of gravity</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>You supply it</td></tr><tr><td><strong>Height</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>Calculated</td></tr><tr><td><strong>Pull (2)</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>You supply it</td></tr><tr><td><strong>Rolling resistance</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Damage resistance</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Gradient resistance 2</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Weight (hidden parameters)</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Winch size calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Ground type</span><span class="formula-eq">=</span><span class="formula-rhs">weight ÷ rolling resistance</span></div><div class="formula-row"><span class="formula-lhs">Damage resistance</span><span class="formula-eq">=</span><span class="formula-rhs">damaged wheels × weight ÷ original wheels</span></div><div class="formula-row"><span class="formula-lhs">Original wheels</span><span class="formula-eq">=</span><span class="formula-rhs">damaged wheels × weight ÷ damage resistance</span></div><div class="formula-row"><span class="formula-lhs">Damage resistance</span><span class="formula-eq">=</span><span class="formula-rhs">-direction × gradient resistance 2 + pull − rolling resistance</span></div><div class="formula-row"><span class="formula-lhs">Height</span><span class="formula-eq">=</span><span class="formula-rhs">centre of gravity × weight ÷ pull</span></div><div class="formula-row"><span class="formula-lhs">Degree of slope</span><span class="formula-eq">=</span><span class="formula-rhs">gradient resistance 2 ÷ weight</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What is a worked example?', 'html' => <<<'TXT'
            <p>Open the page and it is already filled in. With the values it starts from — <strong>I want to</strong> set to right a rolled over load, <strong>Mode</strong> set to Choose vehicle type, <strong>Vehicle type</strong> set to Small car and <strong>Ground type</strong> set to Road — it reports <strong>Weight</strong> = 1000 kg.</p><p>Those are real numbers produced by the same engine that runs when you press Calculate, so you can change any single box afterwards and watch the answer move from this starting point.</p><ol><li>Enter the values listed above, matching the units each box asks for.</li><li>Read off the result. Any field you leave empty is the one the calculator solves for.</li><li>Sanity-check the number against the relationship: <strong>Weight</strong> = 1000 kg should be roughly the size you expected from <strong>I want to</strong> set to right a rolled over load and <strong>Mode</strong> set to Choose vehicle type.</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>The option the calculation settles on.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>The option the calculation settles on.</li><li>Shown in meters, and convertible to any of the 34 units on that chip.</li><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li><li>The option the calculation settles on.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Mass, opening in kilograms</li><li>Mass, opening in kilograms</li><li>Length, opening in meters</li><li>Length, opening in meters</li><li>Mass, opening in kilograms</li><li>Mass, opening in kilograms</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Winch size calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Testing how sensitive an answer is to one input</li><li>Checking a figure someone else quoted</li><li>Turning a rough idea into a number you can act on</li><li>Any time the same 3 figures keep coming back — the damaged wheels, the pull and the centre of gravity — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/korean-age">Korean age</a>, <a href="/everyday-life/lead-time">Lead time</a> and <a href="/everyday-life/leap-year">Leap year</a>.</p>
            TXT],
            ['title' => 'Planning with the estimate', 'html' => <<<'TXT'
            <p>Winch sizing depends on the recovery task, vehicle mass, wheel condition, ground surface, slope and pull direction. Choose whether you want to estimate a required pull or assess an existing winch, then select the vehicle and terrain assumptions that resemble the situation. A stuck vehicle on soft ground or a slope can demand much more force than a freely rolling vehicle on firm, level ground.</p><p>Rated line pull can vary with the amount of rope on the drum; the first layer often has a different rating from outer layers. Snatch blocks, line angle and anchoring arrangements change the mechanical load, and the calculator may not model every rigging detail. The answer is not an operating instruction or a guarantee that a particular recovery setup is safe.</p><p>Use only equipment rated for the load and configuration, inspect the winch, rope, connectors and anchor points, and follow the manufacturer’s manual. Keep people clear of a tensioned line and use appropriate protective practices. Recovery work can cause severe injury or equipment failure; a professional recovery operator is the safer choice when conditions, load or rigging are uncertain.</p><p>Enter vehicle weight in the required unit and distinguish total vehicle mass from the load actually borne by the winch. A damaged wheel, steep gradient or high-resistance surface can alter the estimate. Treat the result as a planning check and apply the manufacturer’s safety guidance and any required safety factor rather than buying or operating equipment solely from one calculator output.</p>
            TXT],
            ['title' => 'What the pull estimate can and cannot tell you', 'html' => <<<'TXT'
            <p>Recovery force depends on how the vehicle is stuck, not only on its curb weight. Mud, sand, snow, an uphill slope, locked or damaged wheels and the direction of pull can all increase resistance. The calculator’s ground, wheel and gradient choices represent simplified assumptions; a real recovery may combine several difficult conditions at once.</p><p>Winch ratings are commonly specified under particular test conditions and can change with rope layers on the drum. A snatch block can change line pull and line speed, but it also adds forces to the block and anchor. Confirm ratings for every component—winch, rope, shackles, recovery points and anchor—and follow the vehicle and winch manufacturers’ instructions.</p><p>This output is a sizing aid, not a safe rigging plan. Do not exceed rated working loads, stand in the path of a tensioned line or use a damaged recovery point. If the vehicle is unstable, the anchor is uncertain or the load is unclear, stop and get help from a trained recovery operator. The right equipment choice depends on conditions that a calculator cannot inspect.</p>
            TXT],
            ['title' => 'Conservative planning', 'html' => <<<'TXT'
            <p>When inputs are uncertain, compare a conservative scenario rather than choosing a single optimistic ground or slope setting. A vehicle partially sunk into soft ground may require substantially more effort than one rolling freely, and the force can rise sharply as the line angle becomes less direct. The page’s options are simplified categories, so they cannot replace an on-site assessment.</p><p>Do not infer that a winch is safe solely because its nominal rating exceeds the calculator’s estimated pull. The line layer, temperature, duty cycle, recovery point, connector ratings and manufacturer’s conditions all matter. A professional can evaluate the complete rig and select a suitable safety margin; this calculator should be only one preliminary check.</p>
            TXT],
            ['title' => 'Questions to resolve before a recovery', 'html' => <<<'TXT'
            <p>Before selecting equipment, identify the vehicle’s actual loaded mass, the nature of the obstruction, the direction of pull, the anchor and the rating of every part of the system. If any of these are unknown, the calculator cannot make the uncertainty disappear. Recovery loads can exceed a simple static estimate, especially when shock loading or a changing slope is involved.</p><p>Use trained assistance for a difficult recovery and follow the maker’s limits. This page is a preliminary sizing guide, not a replacement for a recovery plan or safety training.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Winch size calculator work out?', 'a' => 'It returns ground type, derived from the damaged wheels, the pull and the centre of gravity.'],
            ['q' => 'What do I need to enter to use the Winch size calculator?', 'a' => 'The form asks for the damaged wheels, the pull and the centre of gravity, which is 7 fields in total.'],
            ['q' => 'Can I enter weight in a different unit?', 'a' => 'Yes. Weight opens in kilograms and the chip beside it offers 29 units.'],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => 'There are several choices to make (6 in total), and each one selects a different case rather than scaling the result.'],
            ['q' => 'What is a typical result?', 'a' => 'With the values the page starts from, the calculator reports Weight = 1000 kg.'],
        ],
        'related' => [
            ['path' => '/everyday-life/korean-age', 'name' => 'Korean age'],
            ['path' => '/everyday-life/lead-time', 'name' => 'Lead time'],
            ['path' => '/everyday-life/leap-year', 'name' => 'Leap year'],
        ],
    ],
];
