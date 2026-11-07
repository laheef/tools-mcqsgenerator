<?php

/**
 * Fertilizer
 * /biology/fertilizer
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Fertilizer',
    'meta' => ['title' => 'Fertilizer Calculator — Formula, Units & Example', 'description' => 'Fertilizer takes Nitrogen (N) and Fertilizer rate and returns Lawn area and Phosphorus (P). The chip beside Fertilizer rate is part of the input.', 'h1' => 'Fertilizer Calculator', 'updated' => '2026-08-12'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'lawn_area',
                            'label' => 'Lawn area',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'm2',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Fertilizer label',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'N_label',
                            'label' => 'Nitrogen (N)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'P_label',
                            'label' => 'Phosphorus (P)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'K_label',
                            'label' => 'Potassium (K)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Desired application rates',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'N_rate',
                            'label' => 'N rate',
                            'type' => 'number',
                            'help' => 'Use recommended rates from soil tests and/or local grass experts.',
                            'unit' => '344',
                            'unit_default' => 'kgha',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'P_rate',
                            'label' => 'Phosphate (P₂O₅) rate',
                            'type' => 'number',
                            'unit' => '344',
                            'unit_default' => 'kgha',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'K_rate',
                            'label' => 'Potash (K₂O) rate',
                            'type' => 'number',
                            'unit' => '344',
                            'unit_default' => 'kgha',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Application instructions',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fertilizer_weight',
                            'label' => 'You need',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fertilizer_rate',
                            'label' => 'Fertilizer rate',
                            'type' => 'number',
                            'unit' => '344',
                            'unit_default' => 'kgha',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fertilizer_bag_weight',
                            'label' => 'Fertilizer bag weight',
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
                            'name' => 'fertilizer_bags',
                            'label' => 'Number of bags',
                            'type' => 'number',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'fertilizer_rate = N_rate / (N_label / 100) ',
            'results' => ['N_rate' => '(1/100)*N_label*fertilizer_rate', 'fertilizer_rate' => '100*N_rate/N_label', 'N_label' => '100*N_rate/fertilizer_rate'],
        ],
        [
            'title' => 'fertilizer_weight = fertilizer_rate * (lawn_area / 92.903) ',
            'results' => ['lawn_area' => '(92903/1000)*fertilizer_weight/fertilizer_rate', 'fertilizer_rate' => '(92903/1000)*fertilizer_weight/lawn_area', 'fertilizer_weight' => '(1000/92903)*fertilizer_rate*lawn_area'],
        ],
        [
            'title' => 'P_rate = (P_label / 100) * fertilizer_rate',
            'results' => ['P_label' => '100*P_rate/fertilizer_rate', 'fertilizer_rate' => '100*P_rate/P_label', 'P_rate' => '(1/100)*P_label*fertilizer_rate'],
        ],
        [
            'title' => 'K_rate = (K_label / 100) * fertilizer_rate',
            'results' => ['K_label' => '100*K_rate/fertilizer_rate', 'fertilizer_rate' => '100*K_rate/K_label', 'K_rate' => '(1/100)*K_label*fertilizer_rate'],
        ],
        [
            'title' => 'fertilizer_bags = fertilizer_weight / fertilizer_bag_weight',
            'results' => ['fertilizer_bag_weight' => 'fertilizer_weight/fertilizer_bags', 'fertilizer_weight' => 'fertilizer_bag_weight*fertilizer_bags', 'fertilizer_bags' => 'fertilizer_weight/fertilizer_bag_weight'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Fertilizer takes Nitrogen (N) and Fertilizer rate and returns Lawn area and Phosphorus (P). The arithmetic is the whole method: Lawn area is worked out from Nitrogen (N) by one formula, applied once. Lawn area comes back in square meters unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Fertilizer calculator works', 'html' => <<<'TXT'
            <p>Fertilizer answers one question from 2 numbers, and the answer is Lawn area, Phosphorus (P) and Potassium (K).</p><p>Written with the labels from the form, N rate = (1 ÷ 100) × Nitrogen (N) × Fertilizer rate.</p><p>The answers are Lawn area, Phosphorus (P), Potassium (K) and N rate; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Nitrogen (N)</strong> — a plain number, no unit</li><li><strong>Fertilizer rate</strong> — in kilograms per hectare</li></ul><p>The answers come back as Lawn area in square meters, Phosphorus (P), Potassium (K), N rate in kilograms per hectare, Phosphate (P₂O₅) rate in kilograms per hectare, Potash (K₂O) rate in kilograms per hectare, You need in kilograms, Fertilizer bag weight in kilograms, Number of bags. </p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Lawn area offers 24 units and opens on square meters, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>N rate</strong> = <code>(1 ÷ 100) × Nitrogen (N) × Fertilizer rate</code></li><li><strong>Fertilizer rate</strong> = <code>100 × N rate ÷ Nitrogen (N)</code></li><li><strong>Nitrogen (N)</strong> = <code>100 × N rate ÷ Fertilizer rate</code></li><li><strong>Lawn area</strong> = <code>(92903 ÷ 1000) × You need ÷ Fertilizer rate</code></li><li><strong>You need</strong> = <code>(1000 ÷ 92903) × Fertilizer rate × Lawn area</code></li><li><strong>Phosphorus (P)</strong> = <code>100 × Phosphate (P₂O₅) rate ÷ Fertilizer rate</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of N rate, Fertilizer rate and Nitrogen (N) can be the unknown.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Fertilizer rate is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Lawn area, Phosphorus (P) and Potassium (K) are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Convert Nitrogen (N) to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Nitrogen (N) and Fertilizer rate is what you already know and Lawn area and Phosphorus (P) is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/solute-potential">Solute Potential Calculator</a>, <a href="/biology/species-richness">Species Richness Calculator</a> and <a href="/biology/specific-growth-rate-od">Specific Growth Rate from OD Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Fertilizer calculator work out?', 'a' => <<<'TXT'
            Lawn area, Phosphorus (P), Potassium (K) and N rate, from Nitrogen (N) and Fertilizer rate. The relationship is N rate = (1 ÷ 100) × Nitrogen (N) × Fertilizer rate.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Nitrogen (N), Fertilizer rate (kilograms per hectare). With N_label and fertilizer_rate in place, Lawn area can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. N rate, Fertilizer rate, Nitrogen (N) and Lawn area can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'How precise is the result?', 'a' => 'Internally Lawn area is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Nitrogen (N) blank and the page solves for it, reporting Lawn area instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Lawn area keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/solute-potential', 'name' => 'Solute Potential Calculator'],
            ['path' => '/biology/species-richness', 'name' => 'Species Richness Calculator'],
            ['path' => '/biology/specific-growth-rate-od', 'name' => 'Specific Growth Rate from OD Calculator'],
        ],
        'authors' => [],
    ],
];
