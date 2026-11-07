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
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Field length = 10 m, Field width = 100 m, Plant spacing = 1000 cm, Row spacing = 10 cm, Walkway width = 100 cm, Number of plants per stand = 1, Plant population = 10, Plant population per area = 100 acre, Number seeds per mass unit = 1000 kg and Estimated seeds to buy = 10 kg gives &lt;strong&gt;Field area&lt;/strong&gt; = 110000 hectare.</p><ul><li><strong>Field area</strong> = 110000 hectare</li></ul><p>The line behind those figures is <strong>Field area</strong> = <code>Plant population × Row spacing × (Plant spacing + Walkway width) ÷ Number of plants per stand</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Field area&lt;/strong&gt; = 110000 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Field length offers 31 units and opens on meters, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Field area</strong> = <code>Plant population × Row spacing × (Plant spacing + Walkway width) ÷ Number of plants per stand</code></li><li><strong>Walkway width</strong> = <code>Field area × Number of plants per stand ÷ (Plant population × Row spacing) − Plant spacing</code></li><li><strong>Plant spacing</strong> = <code>Field area × Number of plants per stand ÷ (Plant population × Row spacing) − Walkway width</code></li><li><strong>Number of plants per stand</strong> = <code>Plant population × Row spacing × (Plant spacing + Walkway width) ÷ Field area</code></li><li><strong>Plant population</strong> = <code>Field area × Number of plants per stand ÷ (Row spacing × (Plant spacing + Walkway width))</code></li><li><strong>Row spacing</strong> = <code>Field area × Number of plants per stand ÷ (Plant population × (Plant spacing + Walkway width))</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Field area</strong> = <code>Plant population × Row spacing × (Plant spacing + Walkway width) ÷ Number of plants per stand</code> — the form to use when Plant population, Row spacing, Plant spacing and Walkway width are the values you have.</li><li><strong>Walkway width</strong> = <code>Field area × Number of plants per stand ÷ (Plant population × Row spacing) − Plant spacing</code> — the form to use when Field area, Number of plants per stand, Plant population and Row spacing are the values you have.</li><li><strong>Plant spacing</strong> = <code>Field area × Number of plants per stand ÷ (Plant population × Row spacing) − Walkway width</code> — the form to use when Field area, Number of plants per stand, Plant population and Row spacing are the values you have.</li><li><strong>Number of plants per stand</strong> = <code>Plant population × Row spacing × (Plant spacing + Walkway width) ÷ Field area</code> — the form to use when Plant population, Row spacing, Plant spacing and Walkway width are the values you have.</li><li><strong>Plant population</strong> = <code>Field area × Number of plants per stand ÷ (Row spacing × (Plant spacing + Walkway width))</code> — the form to use when Field area, Number of plants per stand, Row spacing and Plant spacing are the values you have.</li><li><strong>Row spacing</strong> = <code>Field area × Number of plants per stand ÷ (Plant population × (Plant spacing + Walkway width))</code> — the form to use when Field area, Number of plants per stand, Plant population and Plant spacing are the values you have.</li><li><strong>Plant population per area</strong> = <code>Plant population ÷ Field area</code> — the form to use when Plant population and Field area are the values you have.</li><li><strong>Plant population</strong> = <code>Field area × Plant population per area</code> — the form to use when Field area and Plant population per area are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Field area, Walkway width and Plant spacing can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Field length from 10 to 20, leaving every other box alone. The panel moves from &lt;strong&gt;Field area&lt;/strong&gt; 110000 hectare to &lt;strong&gt;Field area&lt;/strong&gt; 110000 hectare.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Plant spacing, Row spacing and Walkway width is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Field length, Field width and Field area are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Plant spacing left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Plant spacing is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Row spacing left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Row spacing is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Plant spacing to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Plant population form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Plant spacing</strong> is a centimeters quantity: the page opens it in cm and converts anything else you pick before the formula runs. Change it and Field area, Walkway width and Number of plants per stand changes with it. Fill it from a measurement rather than a memory — Plant spacing is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Row spacing</strong> is a centimeters quantity: the page opens it in cm and converts anything else you pick before the formula runs. Change it and Field area, Walkway width and Plant spacing changes with it. Fill it from a measurement rather than a memory — Row spacing is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Walkway width</strong> is a centimeters quantity: the page opens it in cm and converts anything else you pick before the formula runs. Change it and Field area, Plant spacing and Number of plants per stand changes with it. Fill it from a measurement rather than a memory — Walkway width is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Number of plants per stand</strong> takes a plain number with no unit attached. Change it and Field area, Walkway width and Plant spacing changes with it. Fill it from a measurement rather than a memory — Number of plants per stand is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Plant population</strong> takes a plain number with no unit attached. Change it and Field area, Walkway width and Plant spacing changes with it. Fill it from a measurement rather than a memory — Plant population is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 6 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Field length</strong> is a meters figure. The value follows from Field area and Field width. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Field width</strong> is a meters figure. The value follows from Field area and Field length. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Field area</strong> is a hectares figure and the page's own defaults put it at 110000 hectare. The value follows from Plant population, Row spacing, Plant spacing and Walkway width. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Plant population per area</strong> is a acres figure. The value follows from Plant population and Field area. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Number seeds per mass unit</strong> is a kilograms figure. The value follows from Plant population and Estimated seeds to buy. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Estimated seeds to buy</strong> is a kilograms figure. The value follows from Plant population and Number seeds per mass unit. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Field length follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover centimeters, acres and kilograms. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
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
            ['q' => 'What answer do the default values give?', 'a' => 'Field area = 110000 hectare. Those are the defaults written into the form — move Plant spacing and every result box follows.'],
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
