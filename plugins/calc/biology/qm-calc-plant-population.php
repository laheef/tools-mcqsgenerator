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
    'meta' => ['title' => 'Plant population — Formula, Steps & Examples', 'description' => 'Plant population turns Plant spacing, Row spacing and Walkway width into Field length and Field width. There is no hidden constant here: change Field length…', 'h1' => 'Plant population Calculator', 'updated' => '2026-08-12'],
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
        'intro' => <<<'TXT'
        Plant population turns Plant spacing, Row spacing and Walkway width into Field length and Field width. There is no hidden constant here: change Field length and Plant spacing moves with it. The main result, Field length, is reported in meters.
        TXT,
        'sections' => [
            ['title' => 'How the Plant population calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Plant population: it takes 5 numbers and reports Field length, Field width and Field area.</p><p>In the form&#039;s own words, Field area = Plant population × Row spacing × (Plant spacing + Walkway width) ÷ Number of plants per stand.</p><p>The result panel carries Field length, Field width, Field area and Plant population per area, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 5 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Plant spacing</strong> — in centimeters</li><li><strong>Row spacing</strong> — in centimeters</li><li><strong>Walkway width</strong> — in centimeters</li><li><strong>Number of plants per stand</strong> — a plain number, no unit</li><li><strong>Plant population</strong> — a plain number, no unit</li></ul><p>What you get back is Field length in meters, Field width in meters, Field area in hectares, Plant population per area in acres, Number seeds per mass unit in kilograms, Estimated seeds to buy in kilograms, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Field length offers 31 units and opens on meters, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Field area</strong> = <code>Plant population × Row spacing × (Plant spacing + Walkway width) ÷ Number of plants per stand</code></li><li><strong>Walkway width</strong> = <code>Field area × Number of plants per stand ÷ (Plant population × Row spacing) − Plant spacing</code></li><li><strong>Plant spacing</strong> = <code>Field area × Number of plants per stand ÷ (Plant population × Row spacing) − Walkway width</code></li><li><strong>Number of plants per stand</strong> = <code>Plant population × Row spacing × (Plant spacing + Walkway width) ÷ Field area</code></li><li><strong>Plant population</strong> = <code>Field area × Number of plants per stand ÷ (Row spacing × (Plant spacing + Walkway width))</code></li><li><strong>Row spacing</strong> = <code>Field area × Number of plants per stand ÷ (Plant population × (Plant spacing + Walkway width))</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Field area, Walkway width and Plant spacing can be the unknown.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Plant spacing, Row spacing and Walkway width is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Field length, Field width and Field area are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Convert Plant spacing to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Plant spacing, Row spacing and Walkway width is what you already know and Field length and Field width is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/pcr-annealing-temperature">PCR Annealing Temperature Calculator</a>, <a href="/biology/pcr-cycle-calculator">PCR Cycle Calculator</a> and <a href="/biology/pcr-master-mix-calculator">PCR Master Mix Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Plant population calculator work out?', 'a' => <<<'TXT'
            Field length, Field width, Field area and Plant population per area, from Plant population, Row spacing, Plant spacing and Walkway width. The relationship is Field area = Plant population × Row spacing × (Plant spacing + Walkway width) ÷ Number of plants per stand.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Plant spacing (centimeters), Row spacing (centimeters), Walkway width (centimeters), Number of plants per stand, Plant population. With plant_spacing, row_spacing and walkway in place, Field length can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Field area, Walkway width, Plant spacing and Number of plants per stand can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Field length is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Plant spacing blank and the page solves for it, reporting Field length instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Field length at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/pcr-annealing-temperature', 'name' => 'PCR Annealing Temperature Calculator'],
            ['path' => '/biology/pcr-cycle-calculator', 'name' => 'PCR Cycle Calculator'],
            ['path' => '/biology/pcr-master-mix-calculator', 'name' => 'PCR Master Mix Calculator'],
        ],
        'authors' => [],
    ],
];
