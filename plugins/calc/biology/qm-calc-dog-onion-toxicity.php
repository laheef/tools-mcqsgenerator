<?php

/**
 * Dog onion toxicity
 * /biology/dog-onion-toxicity
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dog onion toxicity',
    'meta' => ['title' => 'Dog onion toxicity — Free Online Calculator', 'description' => 'Enter Toxic dose into Dog onion toxicity and the answer comes back as Your dog\'s weight and Serious toxicity. Lowest reported dose to cause onion-related…', 'h1' => 'Dog onion toxicity Calculator', 'updated' => '2026-08-10'],
    'raw' => [
        'vars' => [
            'consumedAmount' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'seriousToxicity' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'toxicDose' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'weight' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'ZaxCNrKRhIBNTgtOR2RKh',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'weight',
                                    'vt' => 'numerical',
                                    'l' => 'Your dog\'s weight',
                                    'us' => '22',
                                    'du' => 'kg',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'consumedAmount',
                                    'vt' => 'numerical',
                                    'l' => 'Consumed amount',
                                    'h' => 'A medium onion weights around 150 g/ 6 oz.&nbsp;',
                                    'us' => '22',
                                    'du' => 'g',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => '8h-gstSEAbkyxDAhUjKck',
                'title' => 'Your dog\'s toxic doses',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'toxicDose',
                                    'vt' => 'numerical',
                                    'l' => 'Toxic dose',
                                    'h' => 'Lowest reported dose to cause onion-related toxicosis.',
                                    'us' => '22',
                                    'du' => 'g',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'seriousToxicity',
                                    'vt' => 'numerical',
                                    'l' => 'Serious toxicity',
                                    'h' => 'This amount will probably cause toxic effects and hematologic changes that might be life-threatening.',
                                    'us' => '22',
                                    'du' => 'g',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'x',
                                    'c' => [
                                        [null, 'The amount eaten by your dog is below the calculated possible toxic dose. Your dog should be fine; however, you still need to observe it.'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'x',
                                    'c' => [
                                        [null, 'The amount eaten by your dog is greater than the calculated toxic dose. Look for professional help and observe your dog carefully!'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'x',
                                    'c' => [
                                        [null, 'Always consult your vet if you have any doubt, or if your pet displays any suspicious behavior.'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'x',
                                    'c' => [
                                        [null, 'Remember that onions contain the same poisonous substance as garlic, chives, and leeks.'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'toxicDose = (weight/20) * 50',
                'var' => [
                    [
                        'l' => 'weight',
                        'f' => '(2/5)*toxicDose',
                        'r' => ['toxicDose'],
                    ],
                    [
                        'l' => 'toxicDose',
                        'f' => '(5/2)*weight',
                        'r' => ['weight'],
                    ],
                ],
            ],
            [
                'formula' => 'seriousToxicity = weight*5',
                'var' => [
                    [
                        'l' => 'weight',
                        'f' => '(1/5)*seriousToxicity',
                        'r' => ['seriousToxicity'],
                    ],
                    [
                        'l' => 'seriousToxicity',
                        'f' => '5*weight',
                        'r' => ['weight'],
                    ],
                ],
            ],
        ],
        'datasets' => [],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Toxic dose into Dog onion toxicity and the answer comes back as Your dog's weight and Serious toxicity. It is a single relationship that reads Your dog's weight out of Toxic dose, not a table of canned results keyed by them. Units for Your dog's weight default to kilograms and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Dog onion toxicity calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Dog onion toxicity: it takes 1 number and reports Your dog&#039;s weight and Serious toxicity.</p><p>The relationship it solves reads Your dog&#039;s weight = (2 ÷ 5) × Toxic dose.</p><p>The result panel carries Your dog&#039;s weight and Serious toxicity, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 1 box to fill in; every one of them is used by the formula.</p><ul><li><strong>Toxic dose</strong> — in grams. Lowest reported dose to cause onion-related toxicosis.</li></ul><p>The answers come back as Your dog&#039;s weight in kilograms, Serious toxicity in grams. </p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Your dog&#039;s weight</strong> = <code>(2 ÷ 5) × Toxic dose</code></li><li><strong>Toxic dose</strong> = <code>(5 ÷ 2) × Your dog&#039;s weight</code></li><li><strong>Serious toxicity</strong> = <code>5 × Your dog&#039;s weight</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Your dog&#039;s weight, Toxic dose and Serious toxicity can be the unknown.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Toxic dose carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Your dog&#039;s weight and Serious toxicity are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> If Toxic dose is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Toxic dose is what you already know and Your dog&#039;s weight and Serious toxicity is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/pcr-annealing-temperature">PCR Annealing Temperature Calculator</a>, <a href="/biology/pcr-cycle-calculator">PCR Cycle Calculator</a> and <a href="/biology/pcr-master-mix-calculator">PCR Master Mix Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dog onion toxicity calculator work out?', 'a' => 'Your dog\'s weight and Serious toxicity, from Toxic dose. The relationship is Your dog\'s weight = (2 ÷ 5) × Toxic dose.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Toxic dose (grams). With toxicDose in place, Your dog\'s weight can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Your dog\'s weight, Toxic dose and Serious toxicity can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Your dog\'s weight is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Toxic dose blank and the page solves for it, reporting Your dog\'s weight instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Your dog\'s weight keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/pcr-annealing-temperature', 'name' => 'PCR Annealing Temperature Calculator'],
            ['path' => '/biology/pcr-cycle-calculator', 'name' => 'PCR Cycle Calculator'],
            ['path' => '/biology/pcr-master-mix-calculator', 'name' => 'PCR Master Mix Calculator'],
        ],
        'authors' => [],
    ],
];
