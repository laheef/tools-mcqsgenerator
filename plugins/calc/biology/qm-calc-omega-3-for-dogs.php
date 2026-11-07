<?php

/**
 * Omega-3 for dogs
 * /biology/omega-3-for-dogs
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Omega-3 for dogs',
    'meta' => ['title' => 'Omega-3 for dogs — Formula, Steps & Examples', 'description' => 'Enter Dog\'s weight, Purpose/disorder and Total Omega-3 dose into Omega-3 for dogs and the answer comes back as Dose. NRC stands for the National Research…', 'h1' => 'Omega-3 for dogs Calculator', 'updated' => '2026-08-10'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dog',
                            'label' => 'Dog\'s weight',
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
                            'name' => 'purpose',
                            'label' => 'Purpose/disorder',
                            'type' => 'select',
                            'options' => [
                                'NRC recommended allowance' => '30',
                                'NRC safe upper limit ' => '370',
                                'Idiopathic hyperlipidemia' => '120',
                                'Kidney disease' => '140',
                                'Cardiovascular disorders' => '115',
                                'Osteoarthritis' => '310',
                                'Inflammatory or immunologic' => '125',
                                'Custom' => '',
                            ],
                            'dataset' => 'purpose',
                            'control' => 'DROPDOWN',
                            'help' => 'NRC stands for the National Research Council.',
                            'default' => 'NRC recommended allowance',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dose',
                            'label' => 'Dose',
                            'type' => 'result',
                            'suffix' => 'mg/kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_dose',
                            'label' => 'Total Omega-3 dose',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'mg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dose_custom',
                            'label' => 'Dose ',
                            'type' => 'number',
                            'suffix' => 'mg/kg',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_dose_custom',
                            'label' => 'Total Omega-3 dose',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'mg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => '(dog^0.75)* dose = total_dose',
            'results' => ['dog' => 'pow(total_dose/dose, 4/3)', 'dose' => 'total_dose/pow(dog, 3/4)', 'total_dose' => 'pow(dog, 3/4)*dose'],
        ],
        [
            'title' => '(dog^0.75) * dose_custom = total_dose_custom',
            'results' => ['dog' => 'pow(total_dose_custom/dose_custom, 4/3)', 'total_dose_custom' => 'pow(dog, 3/4)*dose_custom', 'dose_custom' => 'total_dose_custom/pow(dog, 3/4)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Dog's weight, Purpose/disorder and Total Omega-3 dose into Omega-3 for dogs and the answer comes back as Dose. The arithmetic is the whole method: Dose is worked out from Dog's weight by one formula, applied once. Dose comes back in mg/kg unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Omega-3 for dogs calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Omega-3 for dogs: it takes 5 numbers and reports Dose.</p><p>In the form&#039;s own words, Dog&#039;s weight = (Total Omega-3 dose ÷ Dose)^(4 ÷ 3).</p><p>The result panel carries Dose, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs.</p><ul><li><strong>Dog&#039;s weight</strong> — in kilograms</li><li><strong>Purpose/disorder</strong> — a plain number, no unit. NRC stands for the National Research Council.</li><li><strong>Total Omega-3 dose</strong> — in milligrams</li><li><strong>Dose</strong> — in mg/kg</li><li><strong>Total Omega-3 dose</strong> — in milligrams</li></ul><p>The answer comes back as Dose in mg/kg. </p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Dog&#039;s weight</strong> = <code>(Total Omega-3 dose ÷ Dose)^(4 ÷ 3)</code></li><li><strong>Dose</strong> = <code>Total Omega-3 dose ÷ (Dog&#039;s weight)^(3 ÷ 4)</code></li><li><strong>Total Omega-3 dose</strong> = <code>(Dog&#039;s weight)^(3 ÷ 4) × Dose</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Dog&#039;s weight, Dose and Total Omega-3 dose can be the unknown.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Dog&#039;s weight, Total Omega-3 dose and Total Omega-3 dose carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Dose is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> If Dog&#039;s weight is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Dog&#039;s weight, Purpose/disorder and Total Omega-3 dose measured, Dose wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/species-richness">Species Richness Calculator</a>, <a href="/biology/specific-growth-rate-od">Specific Growth Rate from OD Calculator</a> and <a href="/biology/specific-growth-rate-from-od">Specific Growth Rate from OD Readings Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Omega-3 for dogs calculator work out?', 'a' => 'Dose, from Total Omega-3 dose and Dose. The relationship is Dog\'s weight = (Total Omega-3 dose ÷ Dose)^(4 ÷ 3).'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Dog's weight (kilograms), Purpose/disorder, Total Omega-3 dose (milligrams), Dose (mg/kg), Total Omega-3 dose (milligrams). With dog, purpose and total_dose in place, Dose can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Dog's weight, Dose, Total Omega-3 dose and Total Omega-3 dose can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Dose is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Dog's weight left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Dose keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/species-richness', 'name' => 'Species Richness Calculator'],
            ['path' => '/biology/specific-growth-rate-od', 'name' => 'Specific Growth Rate from OD Calculator'],
            ['path' => '/biology/specific-growth-rate-from-od', 'name' => 'Specific Growth Rate from OD Readings Calculator'],
        ],
        'authors' => [],
    ],
];
