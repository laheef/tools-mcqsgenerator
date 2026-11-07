<?php

/**
 * Plant population
 * /biology/plant-population
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Plant population',
    'meta' => ['title' => 'Plant population — Formula, Steps & Examples', 'description' => 'Give the Plant population calculator the field width, the plant spacing, the row spacing and the walkway width and it returns <strong>field area</strong>.', 'h1' => 'Plant population Calculator', 'updated' => '2026-08-12'],
    'sections' => [
        [
            'title' => 'Farm field dimensions',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'field_length',
                            'label' => 'Field length',
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
                            'name' => 'field_width',
                            'label' => 'Field width',
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
                            'name' => 'field_area',
                            'label' => 'Field area',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'hectare',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Planting details',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'plant_spacing',
                            'label' => 'Plant spacing',
                            'type' => 'number',
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
                            'name' => 'row_spacing',
                            'label' => 'Row spacing',
                            'type' => 'number',
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
                            'name' => 'walkway',
                            'label' => 'Walkway width',
                            'type' => 'number',
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
                            'name' => 'plant_per_stand',
                            'label' => 'Number of plants per stand',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Result',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'plant_population',
                            'label' => 'Plant population',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'plant_popoulation_per_area',
                            'label' => 'Plant population per area',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'acre',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Additional settings',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'seeds_weight',
                            'label' => 'Number seeds per mass unit',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'seeds_needed',
                            'label' => 'Estimated seeds to buy',
                            'type' => 'number',
                            'help' => 'Recommended seeds required for the plant population accounting for germination failure.',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'plant_population = field_area * plant_per_stand / ((plant_spacing +walkway)*row_spacing)',
            'results' => [
                'field_area' => 'plant_population*row_spacing*(plant_spacing + walkway)/plant_per_stand',
                'walkway' => 'field_area*plant_per_stand/(plant_population*row_spacing) - plant_spacing',
                'plant_spacing' => 'field_area*plant_per_stand/(plant_population*row_spacing) - walkway',
                'plant_per_stand' => 'plant_population*row_spacing*(plant_spacing + walkway)/field_area',
                'plant_population' => 'field_area*plant_per_stand/(row_spacing*(plant_spacing + walkway))',
                'row_spacing' => 'field_area*plant_per_stand/(plant_population*(plant_spacing + walkway))',
            ],
        ],
        [
            'title' => 'plant_popoulation_per_area = plant_population / field_area',
            'results' => ['plant_popoulation_per_area' => 'plant_population/field_area', 'plant_population' => 'field_area*plant_popoulation_per_area', 'field_area' => 'plant_population/plant_popoulation_per_area'],
        ],
        [
            'title' => 'field_area = field_length * field_width',
            'results' => ['field_length' => 'field_area/field_width', 'field_width' => 'field_area/field_length', 'field_area' => 'field_length*field_width'],
        ],
        [
            'title' => 'seeds_needed = (plant_population / seeds_weight) + 0.2*(plant_population / seeds_weight)',
            'results' => ['seeds_needed' => '(6/5)*plant_population/seeds_weight', 'plant_population' => '(5/6)*seeds_needed*seeds_weight', 'seeds_weight' => '(6/5)*plant_population/seeds_needed'],
        ],
    ],
    'article' => [
        'intro' => 'Give the Plant population calculator the field width, the plant spacing, the row spacing and the walkway width and it returns <strong>field area</strong>.',
        'sections' => [
            ['title' => 'How does the Plant population calculator work?', 'html' => <<<'TXT'
            <p>The Plant population calculator takes the values in the form, applies the relationship described below and reports <strong>field area</strong> in the results panel.</p>
            <p>Working from the top of the form: you type in the field width, the plant spacing, the row spacing and the walkway width.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li> The unit chip switches it to any of the 34 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li></ul>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Field length</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>Calculated</td></tr><tr><td><strong>Field width</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>You supply it</td></tr><tr><td><strong>Field area</strong></td><td>A measured quantity, 24 units available.</td><td>hectares</td><td>Calculated</td></tr><tr><td><strong>Plant spacing</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Row spacing</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Walkway width</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Number of plants per stand</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Plant population</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Plant population per area</strong></td><td>A measured quantity, 24 units available.</td><td>acres</td><td>Calculated</td></tr><tr><td><strong>Number seeds per mass unit</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>You supply it</td></tr><tr><td><strong>Estimated seeds to buy</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Plant population calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Field area</span><span class="formula-eq">=</span><span class="formula-rhs">plant population × row spacing × (plant spacing + walkway width) ÷ number of plants per stand</span></div><div class="formula-row"><span class="formula-lhs">Plant population per area</span><span class="formula-eq">=</span><span class="formula-rhs">plant population ÷ field area</span></div><div class="formula-row"><span class="formula-lhs">Field length</span><span class="formula-eq">=</span><span class="formula-rhs">field area ÷ field width</span></div><div class="formula-row"><span class="formula-lhs">Estimated seeds to buy</span><span class="formula-eq">=</span><span class="formula-rhs">(6 ÷ 5) × plant population ÷ number seeds per mass unit</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in hectares, and convertible to any of the 24 units on that chip.</li><li>Shown in acres, and convertible to any of the 24 units on that chip.</li><li>Shown in meters, and convertible to any of the 34 units on that chip.</li><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in meters</li><li>Length, opening in meters</li><li>Area, opening in hectares</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Area, opening in acres</li><li>Mass, opening in kilograms</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Plant population calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Putting a biological quantity into a scale you can picture</li><li>Supporting a lesson, a lecture or a field note</li><li>Comparing two organisms, populations or processes</li><li>Any time the same 4 figures keep coming back — the field width, the plant spacing and the row spacing — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li><li>Keep the units you enter consistent. </li><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/plants">Plant spacing</a>, <a href="/biology/potting-soil-calculator">Potting soil</a> and <a href="/biology/protein-concentration">Protein concentration</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Plant population calculator work out?', 'a' => <<<'TXT'
            It returns field area, derived from the field width, the plant spacing and the row spacing. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Plant population calculator?', 'a' => <<<'TXT'
            The form asks for the field width, the plant spacing, the row spacing and the walkway width, which is 7 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter field length in a different unit?', 'a' => <<<'TXT'
            Yes. Field length opens in meters and the chip beside it offers 34 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'Is the Plant population calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — press Calculate and every result updates together.
            TXT],
        ],
        'related' => [
            ['path' => '/biology/plants', 'name' => 'Plant spacing'],
            ['path' => '/biology/potting-soil-calculator', 'name' => 'Potting soil'],
            ['path' => '/biology/protein-concentration', 'name' => 'Protein concentration'],
        ],
    ],
];
