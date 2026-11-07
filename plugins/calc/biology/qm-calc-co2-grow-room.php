<?php

/**
 * CO₂ grow room
 * /biology/co2-grow-room
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'CO₂ grow room',
    'meta' => ['title' => 'CO₂ grow room Calculator — Formula & Results', 'description' => 'The CO₂ grow room calculator turns the width, the height and more into <strong>length</strong>. The CO₂ grow room calculator takes the values in the form…', 'h1' => 'CO₂ grow room Calculator', 'updated' => '2026-08-12'],
    'sections' => [
        [
            'title' => 'Grow room dimensions',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'roomWidth',
                            'label' => 'Width',
                            'type' => 'number',
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
                            'name' => 'roomLength',
                            'label' => 'Length',
                            'type' => 'number',
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
                            'name' => 'ceilingHeight',
                            'label' => 'Height',
                            'type' => 'number',
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
                            'name' => 'roomArea',
                            'label' => 'Area',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'm2',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'roomVolume',
                            'label' => 'Volume',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'm3',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'CO₂ levels',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'currentCO2',
                            'label' => 'Current CO₂',
                            'type' => 'number',
                            'help' => 'Atmospheric CO₂ is around 412 ppm.',
                            'unit' => '21',
                            'unit_default' => 'ppm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'targetCO2',
                            'label' => 'Target CO₂',
                            'type' => 'number',
                            'unit' => '21',
                            'unit_default' => 'ppm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'neededCO2',
                            'label' => 'Required CO₂',
                            'type' => 'number',
                            'help' => 'Volume of CO₂ required to fill the room to the target CO₂ level.',
                            'unit' => '20',
                            'unit_default' => 'm3',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'CO₂ tank',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'time',
                            'label' => 'Time',
                            'type' => 'number',
                            'help' => 'Time the tank is on.',
                            'unit' => '19',
                            'unit_default' => 'min',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'flowRate',
                            'label' => ' CO₂ flow rate',
                            'type' => 'number',
                            'unit' => '146',
                            'unit_default' => 'm-hour',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'roomArea=roomLength*roomWidth',
            'results' => ['roomLength' => 'roomArea/roomWidth', 'roomWidth' => 'roomArea/roomLength', 'roomArea' => 'roomLength*roomWidth'],
        ],
        [
            'title' => 'roomVolume=ceilingHeight*roomArea',
            'results' => ['roomVolume' => 'ceilingHeight*roomArea', 'ceilingHeight' => 'roomVolume/roomArea', 'roomArea' => 'roomVolume/ceilingHeight'],
        ],
        [
            'title' => 'neededCO2 = (targetCO2 - currentCO2)/10^6 * roomVolume',
            'results' => ['roomVolume' => '-1000000*neededCO2/(currentCO2 - targetCO2)', 'currentCO2' => '-1000000*neededCO2/roomVolume + targetCO2', 'neededCO2' => '(1/1000000)*roomVolume*(-currentCO2 + targetCO2)', 'targetCO2' => 'currentCO2 + 1000000*neededCO2/roomVolume'],
        ],
        [
            'title' => 'flowRate = neededCO2/time',
            'results' => ['flowRate' => 'neededCO2/time', 'time' => 'neededCO2/flowRate', 'neededCO2' => 'flowRate*time'],
        ],
    ],
    'article' => [
        'intro' => 'The CO₂ grow room calculator turns the width, the height and more into <strong>length</strong>.',
        'sections' => [
            ['title' => 'How does the CO₂ grow room calculator work?', 'html' => <<<'TXT'
            <p>The CO₂ grow room calculator takes the values in the form, applies the relationship described below and reports <strong>length</strong> in the results panel.</p>
            <p>Working from the top of the form: you type in the width, the height, the area and the target CO₂.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li> The unit chip switches it to any of the 34 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li><li>A measured quantity, entered by default in square meters. The unit chip switches it to any of the 24 supported units.</li><li>A measured quantity, entered by default in parts per million. The unit chip switches it to any of the 28 supported units.</li><li>A measured quantity, entered by default in cubic meters. The unit chip switches it to any of the 40 supported units.</li><li>A measured quantity, entered by default in minutes. </li></ul>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Width</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>You supply it</td></tr><tr><td><strong>Length</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>Calculated</td></tr><tr><td><strong>Height</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>You supply it</td></tr><tr><td><strong>Area</strong></td><td>A measured quantity, 24 units available.</td><td>square meters</td><td>You supply it</td></tr><tr><td><strong>Volume</strong></td><td>A measured quantity, 40 units available.</td><td>cubic meters</td><td>Calculated</td></tr><tr><td><strong>Current CO₂</strong></td><td>A measured quantity, 28 units available.</td><td>parts per million</td><td>Calculated</td></tr><tr><td><strong>Target CO₂</strong></td><td>A measured quantity, 28 units available.</td><td>parts per million</td><td>You supply it</td></tr><tr><td><strong>Required CO₂</strong></td><td>A measured quantity, 40 units available.</td><td>cubic meters</td><td>You supply it</td></tr><tr><td><strong>Time</strong></td><td>A measured quantity, 27 units available.</td><td>minutes</td><td>You supply it</td></tr><tr><td><strong>CO₂ flow rate</strong></td><td>A measured quantity, 39 units available.</td><td>cubic meters per hour</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the CO₂ grow room calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Length</span><span class="formula-eq">=</span><span class="formula-rhs">area ÷ width</span></div><div class="formula-row"><span class="formula-lhs">Volume</span><span class="formula-eq">=</span><span class="formula-rhs">height × area</span></div><div class="formula-row"><span class="formula-lhs">Volume</span><span class="formula-eq">=</span><span class="formula-rhs">-1000000 × required CO₂ ÷ (current CO₂ − target CO₂)</span></div><div class="formula-row"><span class="formula-lhs">CO₂ flow rate</span><span class="formula-eq">=</span><span class="formula-rhs">required CO₂ ÷ time</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in meters, and convertible to any of the 34 units on that chip.</li><li>Shown in cubic meters, and convertible to any of the 40 units on that chip.</li><li>Shown in parts per million, and convertible to any of the 28 units on that chip.</li><li>Shown in cubic meters per hour, and convertible to any of the 39 units on that chip.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in meters</li><li>Length, opening in meters</li><li>Length, opening in meters</li><li>Area, opening in square meters</li><li>Volume, opening in cubic meters</li><li>Density, opening in parts per million</li><li>Density, opening in parts per million</li><li>Volume, opening in cubic meters</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The CO₂ grow room calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Supporting a lesson, a lecture or a field note</li><li>Putting a biological quantity into a scale you can picture</li><li>Comparing two organisms, populations or processes</li><li>Any time the same 4 figures keep coming back — the width, the height and the area — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li><li>Round only at the end. </li><li>Keep the units you enter consistent. </li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/compost">Compost</a>, <a href="/biology/corn-yield">Corn yield</a> and <a href="/biology/cow-gestation">Cow gestation</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the CO₂ grow room calculator work out?', 'a' => <<<'TXT'
            It returns length, derived from the width, the height and the area. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the CO₂ grow room calculator?', 'a' => <<<'TXT'
            The form asks for the width, the height, the area and the target CO₂, which is 6 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter width in a different unit?', 'a' => <<<'TXT'
            Yes. Width opens in meters and the chip beside it offers 34 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'Is the CO₂ grow room calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — press Calculate and every result updates together.
            TXT],
        ],
        'related' => [
            ['path' => '/biology/compost', 'name' => 'Compost'],
            ['path' => '/biology/corn-yield', 'name' => 'Corn yield'],
            ['path' => '/biology/cow-gestation', 'name' => 'Cow gestation'],
        ],
    ],
];
