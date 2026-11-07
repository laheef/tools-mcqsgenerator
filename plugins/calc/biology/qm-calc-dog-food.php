<?php

/**
 * Dog food
 * /biology/dog-food
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dog food',
    'meta' => ['title' => 'Dog food Calculator: Formula, Steps & Examples', 'description' => 'Dog food takes Body weight and returns Type and Resting daily calories. Fill in 1 box and the page has everything it needs.Body weight — in kilogramsThe…', 'h1' => 'Dog food Calculator', 'updated' => '2026-08-10'],
    'sections' => [
        [
            'title' => 'Dog\'s characteristics',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Type',
                            'label' => 'Type',
                            'type' => 'select',
                            'options' => [
                                'Puppy - 0 to 4 months' => '3.000000000000000',
                                'Puppy - 4 months to adult' => '2.000000000000000',
                                'Dog - inactive or obese prone' => '1.200000000000000',
                                'Dog (neutered/spayed) - average activity' => '1.600000000000000',
                                'Dog (intact) - average activity' => '1.800000000000000',
                                'Dog - weight loss needed' => '1.000000000000000',
                                'Dog - weight gain needed' => '1.700000000000000',
                                'Working dog - light work' => '2.000000000000001',
                                'Working dog - moderate work' => '3.000000000000001',
                                'Working dog - heavy work' => '5.000000000000000',
                                'Senior dog' => '1.100000000000000',
                            ],
                            'dataset' => 'Multiplier',
                            'control' => 'DROPDOWN',
                            'default' => 'Dog (intact) - average activity',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bodyWeight',
                            'label' => 'Body weight',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Results - Dog\'s calorie requirements',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'caloriesResting',
                            'label' => 'Resting daily calories',
                            'type' => 'number',
                            'suffix' => 'cal',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'caloriesActive',
                            'label' => 'Total daily calories',
                            'type' => 'number',
                            'suffix' => 'cal',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Feeding amount',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'caloriesPerCup',
                            'label' => '1 dose',
                            'type' => 'number',
                            'suffix' => 'calories / cup',
                            'help' => 'How many calories per cup, portion, etc.',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'feedingAmount',
                            'label' => 'Daily servings',
                            'type' => 'number',
                            'suffix' => 'cups / day',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'caloriesResting = one_way((70*pow(bodyWeight, 0.75)))',
            'results' => ['caloriesResting' => '(70*pow(bodyWeight, 3/4))'],
        ],
        [
            'title' => 'caloriesActive  = one_way((70*pow(bodyWeight, 0.75))*Type)',
            'results' => ['caloriesActive' => '(70*Type*pow(bodyWeight, 3/4))'],
        ],
        [
            'title' => 'feedingAmount = ((70*pow(bodyWeight, 0.75))*Type)/caloriesPerCup',
            'results' => ['Type' => '(1/70)*caloriesPerCup*feedingAmount/pow(bodyWeight, 3/4)', 'caloriesPerCup' => '70*Type*pow(bodyWeight, 3/4)/feedingAmount', 'feedingAmount' => '70*Type*pow(bodyWeight, 3/4)/caloriesPerCup', 'bodyWeight' => '(1/4900)*pow(70, 2/3)*pow(caloriesPerCup*feedingAmount/Type, 4/3)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Dog food takes Body weight and returns Type and Resting daily calories. Nothing is looked up on this page: Type is computed from Body weight and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Dog food calculator works', 'html' => <<<'TXT'
            <p>Dog food answers one question from 1 number, and the answer is Type, Resting daily calories and Total daily calories.</p><p>In the form&#039;s own words, Resting daily calories = (70 × (Body weight)^(3 ÷ 4)).</p><p>The result panel carries Type, Resting daily calories, Total daily calories and 1 dose, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 1 box and the page has everything it needs.</p><ul><li><strong>Body weight</strong> — in kilograms</li></ul><p>The answers come back as Type, Resting daily calories in cal, Total daily calories in cal, 1 dose in calories / cup, Daily servings in cups / day. </p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Body weight offers 27 units and opens on kilograms, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Resting daily calories</strong> = <code>(70 × (Body weight)^(3 ÷ 4))</code></li><li><strong>Total daily calories</strong> = <code>(70 × Type × (Body weight)^(3 ÷ 4))</code></li><li><strong>Type</strong> = <code>(1 ÷ 70) × 1 dose × Daily servings ÷ (Body weight)^(3 ÷ 4)</code></li><li><strong>1 dose</strong> = <code>70 × Type × (Body weight)^(3 ÷ 4) ÷ Daily servings</code></li><li><strong>Daily servings</strong> = <code>70 × Type × (Body weight)^(3 ÷ 4) ÷ 1 dose</code></li><li><strong>Body weight</strong> = <code>(1 ÷ 4900) × (70)^(2 ÷ 3) × (1 dose × Daily servings ÷ Type)^(4 ÷ 3)</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Resting daily calories, Total daily calories and Type can be the unknown.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Body weight is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Type, Resting daily calories and Total daily calories are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Body weight and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Body weight and the number you are missing is Type and Resting daily calories.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/dna-molarity-calculator">DNA Molarity Calculator</a>, <a href="/biology/dna-molarity-from-mass">DNA Molarity from Mass or A260 Calculator</a> and <a href="/biology/dna-molecular-weight-calculator">DNA Molecular Weight Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dog food calculator work out?', 'a' => 'Type, Resting daily calories, Total daily calories and 1 dose, from Body weight. The relationship is Resting daily calories = (70 × (Body weight)^(3 ÷ 4)).'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Body weight (kilograms). Fill bodyWeight and leave Type empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Resting daily calories, Total daily calories, Type and 1 dose can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Type is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Body weight left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Type at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/dna-molarity-calculator', 'name' => 'DNA Molarity Calculator'],
            ['path' => '/biology/dna-molarity-from-mass', 'name' => 'DNA Molarity from Mass or A260 Calculator'],
            ['path' => '/biology/dna-molecular-weight-calculator', 'name' => 'DNA Molecular Weight Calculator'],
        ],
        'authors' => [],
    ],
];
