<?php

/**
 * Rabbit cage size
 * /biology/rabbit-cage-size
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Rabbit cage size',
    'meta' => ['title' => 'Rabbit cage size — Formula, Steps & Examples', 'description' => 'The Rabbit cage size calculator turns the height, the area and the width into <strong>rabbit width (Rabbit size)</strong>. The Rabbit cage size calculator…', 'h1' => 'Rabbit cage size Calculator', 'updated' => '2026-08-06'],
    'sections' => [
        [
            'title' => 'Rabbit size',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rabbit_size',
                            'label' => 'Rabbit size (metric)',
                            'type' => 'select',
                            'options' => ['Small' => '1', 'Large' => '2', 'Enter custom rabbit measurements' => '0'],
                            'dataset' => ' Rabbit size',
                            'help' => 'Select the last option to enter custom rabbit measurements.',
                            'default' => 'Large',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => 'rabbit-cage-size_DC-3.png'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hop',
                            'label' => 'One hop distance',
                            'type' => 'result',
                            'help' => 'The length of one hop of the rabbit.',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'width',
                            'label' => 'Rabbit width',
                            'type' => 'result',
                            'help' => 'The fully stretched rabbit length.',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'height',
                            'label' => 'Rabbit height',
                            'type' => 'result',
                            'help' => 'The height measured for a standing rabbit (including ears).',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rabbit_size_imperial',
                            'label' => 'Rabbit size',
                            'type' => 'select',
                            'options' => ['Small' => '1', 'Large' => '2', 'Enter custom rabbit measurements' => '0'],
                            'dataset' => ' Rabbit size',
                            'help' => 'Select the last option to enter custom rabbit measurements.',
                            'default' => 'Small',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hop_imperial',
                            'label' => 'One hop distance',
                            'type' => 'result',
                            'help' => 'The length of one hop of the rabbit.',
                            'unit' => '4',
                            'unit_default' => 'ft',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'width_imperial',
                            'label' => 'Rabbit width',
                            'type' => 'result',
                            'help' => 'The fully stretched rabbit length.',
                            'unit' => '4',
                            'unit_default' => 'ft',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'height_imperial',
                            'label' => 'Rabbit height',
                            'type' => 'result',
                            'help' => 'The height measured for a standing rabbit (including ears).',
                            'unit' => '4',
                            'unit_default' => 'ft',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Minimum cage dimensions for one rabbit',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rabbit_cage_length',
                            'label' => 'Length',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rabbit_cage_width',
                            'label' => 'Width',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rabbit_cage_height',
                            'label' => 'Height',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rabbit_cage_area',
                            'label' => 'Area',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'm2',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rabbit_cage_length_imperial',
                            'label' => 'Length',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'ft',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rabbit_cage_width_imperial',
                            'label' => 'Width',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'ft',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rabbit_cage_height_imperial',
                            'label' => 'Height',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'ft',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rabbit_cage_area_imperial',
                            'label' => 'Area',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'ft2',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'rabbit_cage_area = width * hop * 3',
            'results' => ['width' => '(1/3)*rabbit_cage_area/hop', 'rabbit_cage_area' => '3*hop*width', 'hop' => '(1/3)*rabbit_cage_area/width'],
        ],
        [
            'title' => 'rabbit_cage_height = height * 1.5',
            'results' => ['height' => '(2/3)*rabbit_cage_height', 'rabbit_cage_height' => '(3/2)*height'],
        ],
        [
            'title' => 'rabbit_cage_width = width',
            'results' => ['rabbit_cage_width' => 'width', 'width' => 'rabbit_cage_width'],
        ],
        [
            'title' => 'rabbit_cage_length = hop * 3',
            'results' => ['rabbit_cage_length' => '3*hop', 'hop' => '(1/3)*rabbit_cage_length'],
        ],
        [
            'title' => 'rabbit_cage_area_imperial = width_imperial * hop_imperial * 3',
            'results' => ['rabbit_cage_area_imperial' => '3*hop_imperial*width_imperial', 'hop_imperial' => '(1/3)*rabbit_cage_area_imperial/width_imperial', 'width_imperial' => '(1/3)*rabbit_cage_area_imperial/hop_imperial'],
        ],
        [
            'title' => 'rabbit_cage_height_imperial = height_imperial * 1.5',
            'results' => ['height_imperial' => '(2/3)*rabbit_cage_height_imperial', 'rabbit_cage_height_imperial' => '(3/2)*height_imperial'],
        ],
        [
            'title' => 'rabbit_cage_width_imperial = width_imperial',
            'results' => ['width_imperial' => 'rabbit_cage_width_imperial', 'rabbit_cage_width_imperial' => 'width_imperial'],
        ],
        [
            'title' => 'rabbit_cage_length_imperial = hop_imperial * 3',
            'results' => ['rabbit_cage_length_imperial' => '3*hop_imperial', 'hop_imperial' => '(1/3)*rabbit_cage_length_imperial'],
        ],
    ],
    'article' => [
        'intro' => 'The Rabbit cage size calculator turns the height, the area and the width into <strong>rabbit width (Rabbit size)</strong>.',
        'sections' => [
            ['title' => 'How does the Rabbit cage size calculator work?', 'html' => <<<'TXT'
            <p>The Rabbit cage size calculator takes the values in the form, applies the relationship described below and reports <strong>rabbit width (Rabbit size)</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the rabbit size (metric) and the rabbit size); then you type in the height (Minimum cage dimensions for one rabbit), the height (Minimum cage dimensions for one rabbit), the area (Minimum cage dimensions for one rabbit) and the width (Minimum cage dimensions for one rabbit).</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 3 options, such as small, large and enter custom rabbit measurements. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>Pick the option that matches your case — 3 options, such as small, large and enter custom rabbit measurements. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li> The unit chip switches it to any of the 34 supported units.</li><li>A measured quantity, entered by default in square meters. The unit chip switches it to any of the 24 supported units.</li><li>A measured quantity, entered by default in feet. The unit chip switches it to any of the 34 supported units.</li><li>A measured quantity, entered by default in feet. The unit chip switches it to any of the 34 supported units.</li></ul><p>2 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Rabbit size (metric)</strong></td><td>One of 3 options, such as small, large and enter custom rabbit measurements.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>One hop distance (Rabbit size)</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>Calculated</td></tr><tr><td><strong>Rabbit width (Rabbit size)</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>Calculated</td></tr><tr><td><strong>Rabbit height (Rabbit size)</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>Calculated</td></tr><tr><td><strong>Rabbit size (metric)</strong></td><td>One of 3 options, such as small, large and enter custom rabbit measurements.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>One hop distance (Rabbit size)</strong></td><td>A measured quantity, 34 units available.</td><td>feet</td><td>Calculated</td></tr><tr><td><strong>Rabbit width (Rabbit size)</strong></td><td>A measured quantity, 34 units available.</td><td>feet</td><td>Calculated</td></tr><tr><td><strong>Rabbit height (Rabbit size)</strong></td><td>A measured quantity, 34 units available.</td><td>feet</td><td>Calculated</td></tr><tr><td><strong>Length (Minimum cage dimensions for one rabbit)</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>Calculated</td></tr><tr><td><strong>Width (Minimum cage dimensions for one rabbit)</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>Calculated</td></tr><tr><td><strong>Height (Minimum cage dimensions for one rabbit)</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Area (Minimum cage dimensions for one rabbit)</strong></td><td>A measured quantity, 24 units available.</td><td>square meters</td><td>You supply it</td></tr><tr><td><strong>Length (Minimum cage dimensions for one rabbit)</strong></td><td>A measured quantity, 34 units available.</td><td>feet</td><td>Calculated</td></tr><tr><td><strong>Width (Minimum cage dimensions for one rabbit)</strong></td><td>A measured quantity, 34 units available.</td><td>feet</td><td>You supply it</td></tr><tr><td><strong>Height (Minimum cage dimensions for one rabbit)</strong></td><td>A measured quantity, 34 units available.</td><td>feet</td><td>You supply it</td></tr><tr><td><strong>Area (Minimum cage dimensions for one rabbit)</strong></td><td>A measured quantity, 24 units available.</td><td>square feet</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Rabbit cage size calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Rabbit width</span><span class="formula-eq">=</span><span class="formula-rhs">(1 ÷ 3) × area ÷ one hop distance</span></div><div class="formula-row"><span class="formula-lhs">Rabbit height</span><span class="formula-eq">=</span><span class="formula-rhs">(2 ÷ 3) × height</span></div><div class="formula-row"><span class="formula-lhs">Width</span><span class="formula-eq">=</span><span class="formula-rhs">rabbit width</span></div><div class="formula-row"><span class="formula-lhs">Length</span><span class="formula-eq">=</span><span class="formula-rhs">3 × one hop distance</span></div><div class="formula-row"><span class="formula-lhs">Area</span><span class="formula-eq">=</span><span class="formula-rhs">3 × one hop distance × rabbit width</span></div><div class="formula-row"><span class="formula-lhs">Rabbit width</span><span class="formula-eq">=</span><span class="formula-rhs">width</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in centimeters, and convertible to any of the 34 units on that chip.</li><li>Shown in centimeters, and convertible to any of the 34 units on that chip.</li><li>Shown in centimeters, and convertible to any of the 34 units on that chip.</li><li>Shown in centimeters, and convertible to any of the 34 units on that chip.</li><li>Shown in square feet, and convertible to any of the 24 units on that chip.</li><li>Shown in feet, and convertible to any of the 34 units on that chip.</li><li>Shown in feet, and convertible to any of the 34 units on that chip.</li><li>Shown in feet, and convertible to any of the 34 units on that chip.</li><li>Shown in centimeters, and convertible to any of the 34 units on that chip.</li><li>Shown in feet, and convertible to any of the 34 units on that chip.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in feet</li><li>Length, opening in feet</li><li>Length, opening in feet</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Rabbit cage size calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Supporting a lesson, a lecture or a field note</li><li>Comparing two organisms, populations or processes</li><li>Putting a biological quantity into a scale you can picture</li><li>Any time the same 3 figures keep coming back — the height, the area and the width — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Write the answer down with its unit. </li><li>Keep the units you enter consistent. </li><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/rabbit-color">Rabbit color</a>, <a href="/biology/rabbit-gestation">Rabbit gestation</a> and <a href="/biology/raised-bed-soil">Raised bed soil</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Rabbit cage size calculator work out?', 'a' => <<<'TXT'
            It returns rabbit width (Rabbit size), derived from the height, the area and the width. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Rabbit cage size calculator?', 'a' => <<<'TXT'
            The form asks for the height, the area and the width, which is 6 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter one hop distance (Rabbit size) in a different unit?', 'a' => <<<'TXT'
            Yes. One hop distance (Rabbit size) opens in centimeters and the chip beside it offers 34 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There are several choices to make (2 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'What is a typical result?', 'a' => <<<'TXT'
            With the values the page starts from, the calculator reports One hop distance = 0 cm. Treat that as a reference point rather than a recommendation: it exists so you can tell at a glance whether your own inputs are on the same scale.
            TXT],
            ['q' => 'Is the Rabbit cage size calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/rabbit-color', 'name' => 'Rabbit color'],
            ['path' => '/biology/rabbit-gestation', 'name' => 'Rabbit gestation'],
            ['path' => '/biology/raised-bed-soil', 'name' => 'Raised bed soil'],
        ],
    ],
];
