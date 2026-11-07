<?php

/**
 * Cat calorie
 * /biology/cat-calorie
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cat calorie',
    'meta' => ['title' => 'Cat calorie Calculator: Formula, Steps & Examples', 'description' => 'Enter Weight, Condition and Resting energy into Cat calorie and the answer comes back as Maintenance coefficient. The energy required to perform basic bodily…', 'h1' => 'Cat calorie Calculator', 'updated' => '2026-07-23'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'weight',
                            'label' => 'Weight',
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
                            'name' => 'condition',
                            'label' => 'Condition',
                            'type' => 'select',
                            'options' => [
                                'Neutered adult' => '1.6',
                                'Non-neutered adult' => '1.8',
                                'Weight loss' => '1',
                                'Weight gain' => '1.7',
                                '0 to 4 months old kitten' => '3',
                                '4 months kitten to adult' => '2',
                                'Set custom maintenance coefficient' => '',
                            ],
                            'dataset' => 'condition',
                            'control' => 'DROPDOWN',
                            'default' => 'Neutered adult',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'resting_energy',
                            'label' => 'Resting energy',
                            'type' => 'number',
                            'help' => 'The energy required to perform basic bodily functions, such as digestion, respiration, heart and brain functions.',
                            'unit' => '44',
                            'unit_default' => 'kcal',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'maintenance_energy',
                            'label' => 'Maintenance energy',
                            'type' => 'number',
                            'help' => 'The total number of calories required on a daily basis.&nbsp;',
                            'unit' => '44',
                            'unit_default' => 'kcal',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Maintenance coefficient',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'maintenance_coefficient',
                            'label' => 'Maintenance coefficient',
                            'type' => 'result',
                            'help' => <<<'TXT'
                            A maintenance multiplier that is a factor based on the condition of the cat, like age, whether the cat is neutered or not and whether the cat is on a weight loss or gain plan.
                            TXT,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'resting_energy = (weight ^ 0.75) *70',
            'results' => ['weight' => '(1/4900)*pow(70, 2/3)*pow(resting_energy, 4/3)', 'resting_energy' => '70*pow(weight, 3/4)'],
        ],
        [
            'title' => 'maintenance_energy = resting_energy *maintenance_coefficient',
            'results' => ['resting_energy' => 'maintenance_energy/maintenance_coefficient', 'maintenance_coefficient' => 'maintenance_energy/resting_energy', 'maintenance_energy' => 'maintenance_coefficient*resting_energy'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Weight, Condition and Resting energy into Cat calorie and the answer comes back as Maintenance coefficient. There is no hidden constant here: change Maintenance coefficient and Weight moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Cat calorie calculator works', 'html' => <<<'TXT'
            <p>The Cat calorie calculator applies one relationship to 4 numbers and reports Maintenance coefficient.</p><p>Written with the labels from the form, Weight = (1 ÷ 4900) × (70)^(2 ÷ 3) × (Resting energy)^(4 ÷ 3).</p><p>The answers are Maintenance coefficient; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>Weight</strong> — in kilograms</li><li><strong>Condition</strong> — a plain number, no unit</li><li><strong>Resting energy</strong> — in kilocalories. The energy required to perform basic bodily functions, such as digestion, respiration, heart and brain functions.</li><li><strong>Maintenance energy</strong> — in kilocalories. The total number of calories required on a daily basis.&amp;nbsp;</li></ul><p>The result box is Maintenance coefficient. </p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Weight</strong> = <code>(1 ÷ 4900) × (70)^(2 ÷ 3) × (Resting energy)^(4 ÷ 3)</code></li><li><strong>Resting energy</strong> = <code>70 × (Weight)^(3 ÷ 4)</code></li><li><strong>Maintenance coefficient</strong> = <code>Maintenance energy ÷ Resting energy</code></li><li><strong>Maintenance energy</strong> = <code>Maintenance coefficient × Resting energy</code></li></ul><p>Any one of Weight, Resting energy and Maintenance coefficient can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Weight, Resting energy and Maintenance energy carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Maintenance coefficient is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> If Weight is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Weight, Condition and Resting energy and the number you are missing is Maintenance coefficient.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/dna-percentage">DNA Percentage Calculator</a>, <a href="/biology/sequence-shuffler">DNA Sequence Shuffler Calculator</a> and <a href="/biology/dna-to-mrna">DNA to mRNA</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Weight (kilograms), Condition, Resting energy (kilocalories), Maintenance energy (kilocalories). Fill weight, condition and resting_energy and leave Maintenance coefficient empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Weight, Resting energy, Maintenance coefficient and Maintenance energy blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Maintenance coefficient is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Weight left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Maintenance coefficient keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/dna-percentage', 'name' => 'DNA Percentage Calculator'],
            ['path' => '/biology/sequence-shuffler', 'name' => 'DNA Sequence Shuffler Calculator'],
            ['path' => '/biology/dna-to-mrna', 'name' => 'DNA to mRNA'],
        ],
        'authors' => [],
    ],
];
