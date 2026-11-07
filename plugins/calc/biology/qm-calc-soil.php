<?php

/**
 * Soil
 * /biology/soil
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Soil',
    'meta' => ['title' => 'Soil Calculator — Free, With Worked Examples', 'description' => <<<'TXT'
    Supply the length, the width, the density and the weight needed and the Soil calculator solves for <strong>area</strong>. The Soil calculator takes the values…
    TXT, 'h1' => 'Soil Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => 'How much soil do you need?',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'length',
                            'label' => 'Length',
                            'type' => 'number',
                            'help' => 'Length of a rectangular surface. You may enter area directly if you want.',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['omni', '0.000001'],
                        ],
                        [
                            'name' => 'width',
                            'label' => 'Width',
                            'type' => 'number',
                            'help' => 'Width of a rectangular surface. You may enter area directly if you want.',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'area',
                            'label' => 'Area',
                            'type' => 'number',
                            'help' => 'The area of the surface you want to fill.',
                            'unit' => '28',
                            'unit_default' => 'm2',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'depth',
                            'label' => 'Depth',
                            'type' => 'number',
                            'help' => 'Desired depth of soil layer.',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'volume_needed',
                            'label' => 'Volume needed',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'm3',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'density',
                            'label' => 'Density',
                            'type' => 'number',
                            'help' => 'Density of soil that you want to buy. This information should be written on the bag.',
                            'unit' => '21',
                            'unit_default' => 'kgm3',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'weight_needed',
                            'label' => 'Weight needed',
                            'type' => 'number',
                            'help' => 'Weight of soil that you need to buy to cover the desired surface.',
                            'unit' => '22',
                            'unit_default' => 't',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'How much will the soil cost you?',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price_per_mass',
                            'label' => 'Price per unit mass',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price_per_volume',
                            'label' => 'Price per unit volume',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_cost',
                            'label' => 'Total cost',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'length * width = area',
            'results' => ['area' => 'length*width', 'width' => 'area/length', 'length' => 'area/width'],
        ],
        [
            'title' => 'area * depth = volume_needed',
            'results' => ['depth' => 'volume_needed/area', 'volume_needed' => 'area*depth', 'area' => 'volume_needed/depth'],
        ],
        [
            'title' => 'density = weight_needed / volume_needed',
            'results' => ['volume_needed' => 'weight_needed/density', 'weight_needed' => 'density*volume_needed', 'density' => 'weight_needed/volume_needed'],
        ],
        [
            'title' => 'weight_needed * price_per_mass = total_cost',
            'results' => ['price_per_mass' => 'total_cost/weight_needed', 'total_cost' => 'price_per_mass*weight_needed', 'weight_needed' => 'total_cost/price_per_mass'],
        ],
        [
            'title' => 'volume_needed * price_per_volume = total_cost',
            'results' => ['volume_needed' => 'total_cost/price_per_volume', 'price_per_volume' => 'total_cost/volume_needed', 'total_cost' => 'price_per_volume*volume_needed'],
        ],
    ],
    'article' => [
        'intro' => 'Supply the length, the width, the density and the weight needed and the Soil calculator solves for <strong>area</strong>.',
        'sections' => [
            ['title' => 'How does the Soil calculator work?', 'html' => <<<'TXT'
            <p>The Soil calculator takes the values in the form, applies the relationship described below and reports <strong>area</strong> in the results panel.</p>
            <p>Working from the top of the form: you type in the length, the width, the density and the weight needed.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li> The unit chip switches it to any of the 34 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li><li>A measured quantity, entered by default in kilograms per cubic meter. The unit chip switches it to any of the 28 supported units.</li><li>A measured quantity, entered by default in metric tons. </li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li></ul>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Length</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>You supply it</td></tr><tr><td><strong>Width</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>You supply it</td></tr><tr><td><strong>Area</strong></td><td>A measured quantity, 24 units available.</td><td>square meters</td><td>Calculated</td></tr><tr><td><strong>Depth</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>Calculated</td></tr><tr><td><strong>Volume needed</strong></td><td>A measured quantity, 40 units available.</td><td>cubic meters</td><td>Calculated</td></tr><tr><td><strong>Density</strong></td><td>A measured quantity, 28 units available.</td><td>kilograms per cubic meter</td><td>You supply it</td></tr><tr><td><strong>Weight needed</strong></td><td>A measured quantity, 29 units available.</td><td>metric tons</td><td>You supply it</td></tr><tr><td><strong>Price per unit mass</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>Calculated</td></tr><tr><td><strong>Price per unit volume</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>Calculated</td></tr><tr><td><strong>Total cost</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Soil calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Area</span><span class="formula-eq">=</span><span class="formula-rhs">length × width</span></div><div class="formula-row"><span class="formula-lhs">Depth</span><span class="formula-eq">=</span><span class="formula-rhs">volume needed ÷ area</span></div><div class="formula-row"><span class="formula-lhs">Volume needed</span><span class="formula-eq">=</span><span class="formula-rhs">weight needed ÷ density</span></div><div class="formula-row"><span class="formula-lhs">Price per unit mass</span><span class="formula-eq">=</span><span class="formula-rhs">total cost ÷ weight needed</span></div><div class="formula-row"><span class="formula-lhs">Volume needed</span><span class="formula-eq">=</span><span class="formula-rhs">total cost ÷ price per unit volume</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in square meters, and convertible to any of the 24 units on that chip.</li><li>Shown in centimeters, and convertible to any of the 34 units on that chip.</li><li>Shown in cubic meters, and convertible to any of the 40 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in meters</li><li>Length, opening in meters</li><li>Area, opening in square meters</li><li>Length, opening in centimeters</li><li>Volume, opening in cubic meters</li><li>Density, opening in kilograms per cubic meter</li><li>Mass, opening in metric tons</li><li>Currency, opening in US Dollar</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Soil calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Supporting a lesson, a lecture or a field note</li><li>Putting a biological quantity into a scale you can picture</li><li>Comparing two organisms, populations or processes</li><li>Any time the same 4 figures keep coming back — the length, the width and the density — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li><li>Round only at the end. </li><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/swine-gestation">Swine gestation</a>, <a href="/biology/the-cost-of-owning-a-dog">Cost of owning a dog</a> and <a href="/biology/tramadol-for-dogs">Tramadol for dogs</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Soil calculator work out?', 'a' => <<<'TXT'
            It returns area, derived from the length, the width and the density. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Soil calculator?', 'a' => <<<'TXT'
            The form asks for the length, the width, the density and the weight needed, which is 5 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter length in a different unit?', 'a' => <<<'TXT'
            Yes. Length opens in meters and the chip beside it offers 34 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'Is the Soil calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — press Calculate and every result updates together.
            TXT],
        ],
        'related' => [
            ['path' => '/biology/swine-gestation', 'name' => 'Swine gestation'],
            ['path' => '/biology/the-cost-of-owning-a-dog', 'name' => 'Cost of owning a dog'],
            ['path' => '/biology/tramadol-for-dogs', 'name' => 'Tramadol for dogs'],
        ],
    ],
];
