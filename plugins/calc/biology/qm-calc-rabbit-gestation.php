<?php

/**
 * Rabbit gestation
 * /biology/rabbit-gestation
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Rabbit gestation',
    'meta' => ['title' => 'Rabbit gestation — Formula, Steps & Examples', 'description' => 'Enter Conception date and Birth date into Rabbit gestation and the answer comes back as Rabbit Type and Palpate rabbit. There is no hidden constant here…', 'h1' => 'Rabbit gestation Calculator', 'updated' => '2026-08-06'],
    'raw' => [
        'vars' => [
            'estimatedDateOfConception' => ['type' => 'date', 'rnd' => null],
            'expectedBirthDate' => ['type' => 'date', 'rnd' => null],
            'nestBox' => ['type' => 'date', 'rnd' => null],
            'palpateTheRabbit' => ['type' => 'date', 'rnd' => null],
            'typeOfRabbit' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'R0gLTk8hjProB_JPGWN9j', 'c' => null],
                ],
                'ds' => '7tz9GkYgmRCjsSeP-8irZ',
            ],
        ],
        'groups' => [
            [
                'uid' => 'gPWsjlhfCRfTh1ZA3ED8N',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'typeOfRabbit',
                                    'vt' => 'valueSelect',
                                    'l' => 'Rabbit Type',
                                    'ds' => '7tz9GkYgmRCjsSeP-8irZ',
                                    'opts' => [
                                        ['95ctlj1tmNtyxbQjHS4qC', 'Desert Cottontail & New England Cottontail', '28'],
                                        ['S9hprgzAQC09-ui6vywgh', 'European Rabbit, Flemish Giant, Chinchilla', '28.000000000000000001'],
                                        ['3NRt1YiM8XP8d-uQSX-oc', 'New Zealand White, French Lop', '28.000000000000001'],
                                        ['nFiTmb-_t09-VNaSFe-91', 'Harlequin Rabbit', '29'],
                                        ['_4JvKYyUqs7bzgChsR4kU', 'California white, American Rabbit', '31'],
                                        ['xN6qq9QPKOOO1BHXSgnP-', 'Blanc de Hotot, Belgian Hare Rabbit', '30'],
                                        ['l1bxpPBE4wKCH39TcwD81', 'Mexican Cottontail & Dice, Dwarf Rabbits', '30.0000000000000001'],
                                        ['R0gLTk8hjProB_JPGWN9j', 'Tapeti', '42'],
                                        ['Jf9RMVDoIdObb3rWc6mmQ', 'Swamp rabbit, Eastern Cottontail & Brush rabbits', '27'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'estimatedDateOfConception', 'vt' => 'date', 'l' => 'Conception date'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'palpateTheRabbit',
                                    'vt' => 'date',
                                    'l' => 'Palpate rabbit',
                                    'h' => 'This is the best day to palpate the rabbit (check for baby rabbits). However, this may be done as early as the 11th day and no later than the 14th day.',
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
                                    'n' => 'nestBox',
                                    'vt' => 'date',
                                    'l' => 'Nest box',
                                    'h' => 'This is the best day to add the nest box. Try not to add this too early, to avoid a mess. It is best to add this 2 days before the expected birth date.',
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
                                    'n' => 'expectedBirthDate',
                                    'vt' => 'date',
                                    'l' => 'Birth date',
                                    'h' => 'The birth should occur no later than two days after the date shown here or there is a good chance of a stillbirth.',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'estimatedDateOfConception + typeOfRabbit=expectedBirthDate',
                'var' => [
                    [
                        'l' => 'typeOfRabbit',
                        'f' => '-estimatedDateOfConception + expectedBirthDate',
                        'r' => ['estimatedDateOfConception', 'expectedBirthDate'],
                    ],
                    [
                        'l' => 'estimatedDateOfConception',
                        'f' => 'expectedBirthDate - typeOfRabbit',
                        'r' => ['typeOfRabbit', 'expectedBirthDate'],
                    ],
                    [
                        'l' => 'expectedBirthDate',
                        'f' => 'estimatedDateOfConception + typeOfRabbit',
                        'r' => ['typeOfRabbit', 'estimatedDateOfConception'],
                    ],
                ],
            ],
            [
                'formula' => 'estimatedDateOfConception + 12=palpateTheRabbit',
                'var' => [
                    [
                        'l' => 'palpateTheRabbit',
                        'f' => 'estimatedDateOfConception + 12',
                        'r' => ['estimatedDateOfConception'],
                    ],
                    [
                        'l' => 'estimatedDateOfConception',
                        'f' => 'palpateTheRabbit - 12',
                        'r' => ['palpateTheRabbit'],
                    ],
                ],
            ],
            [
                'formula' => 'expectedBirthDate - 2 =nestBox',
                'var' => [
                    [
                        'l' => 'nestBox',
                        'f' => 'expectedBirthDate - 2',
                        'r' => ['expectedBirthDate'],
                    ],
                    [
                        'l' => 'expectedBirthDate',
                        'f' => 'nestBox + 2',
                        'r' => ['nestBox'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            '7tz9GkYgmRCjsSeP-8irZ' => [
                'name' => 'Type of Rabbit',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => '95ctlj1tmNtyxbQjHS4qC', 'label' => 'Desert Cottontail & New England Cottontail', 'value' => '28'],
                    ['uid' => 'S9hprgzAQC09-ui6vywgh', 'label' => 'European Rabbit, Flemish Giant, Chinchilla', 'value' => '28.000000000000000001'],
                    ['uid' => '3NRt1YiM8XP8d-uQSX-oc', 'label' => 'New Zealand White, French Lop', 'value' => '28.000000000000001'],
                    ['uid' => 'nFiTmb-_t09-VNaSFe-91', 'label' => 'Harlequin Rabbit', 'value' => '29'],
                    ['uid' => '_4JvKYyUqs7bzgChsR4kU', 'label' => 'California white, American Rabbit', 'value' => '31'],
                    ['uid' => 'xN6qq9QPKOOO1BHXSgnP-', 'label' => 'Blanc de Hotot, Belgian Hare Rabbit', 'value' => '30'],
                    ['uid' => 'l1bxpPBE4wKCH39TcwD81', 'label' => 'Mexican Cottontail & Dice, Dwarf Rabbits', 'value' => '30.0000000000000001'],
                    ['uid' => 'R0gLTk8hjProB_JPGWN9j', 'label' => 'Tapeti', 'value' => '42'],
                    ['uid' => 'Jf9RMVDoIdObb3rWc6mmQ', 'label' => 'Swamp rabbit, Eastern Cottontail & Brush rabbits', 'value' => '27'],
                ],
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Conception date and Birth date into Rabbit gestation and the answer comes back as Rabbit Type and Palpate rabbit. There is no hidden constant here: change Rabbit Type and Conception date moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Rabbit gestation calculator works', 'html' => <<<'TXT'
            <p>Rabbit gestation answers one question from 2 numbers, and the answer is Rabbit Type, Palpate rabbit and Nest box.</p><p>Written with the labels from the form, Rabbit Type = − Conception date + Birth date.</p><p>What comes back is Rabbit Type, Palpate rabbit and Nest box — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Conception date</strong> — a plain number, no unit, entered as a date</li><li><strong>Birth date</strong> — a plain number, no unit, entered as a date. The birth should occur no later than two days after the date shown here or there is a good chance of a stillbirth.</li></ul><p>The result boxes are Rabbit Type, Palpate rabbit, Nest box; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Rabbit Type is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Rabbit Type</strong> = <code>− Conception date + Birth date</code></li><li><strong>Conception date</strong> = <code>Birth date − Rabbit Type</code></li><li><strong>Birth date</strong> = <code>Conception date + Rabbit Type</code></li><li><strong>Palpate rabbit</strong> = <code>Conception date + 12</code></li><li><strong>Nest box</strong> = <code>Birth date − 2</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Rabbit Type, Conception date and Birth date can be the unknown.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Rabbit Type, Palpate rabbit and Nest box are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> If Conception date is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Conception date and Birth date and the number you are missing is Rabbit Type and Palpate rabbit.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/fertilizer">Fertilizer Calculator</a>, <a href="/biology/fertilizer-injector-ratio">Fertilizer Injector Ratio Calculator</a> and <a href="/biology/plant-available-water">Field Capacity and Plant Available Water Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Rabbit gestation calculator work out?', 'a' => 'Rabbit Type, Palpate rabbit and Nest box, from Conception date and Birth date. The relationship is Rabbit Type = − Conception date + Birth date.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Conception date, Birth date. Enter estimatedDateOfConception and expectedBirthDate; Rabbit Type is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Rabbit Type, Conception date, Birth date and Palpate rabbit can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Rabbit Type is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Conception date blank and the page solves for it, reporting Rabbit Type instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Rabbit Type keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/fertilizer', 'name' => 'Fertilizer Calculator'],
            ['path' => '/biology/fertilizer-injector-ratio', 'name' => 'Fertilizer Injector Ratio Calculator'],
            ['path' => '/biology/plant-available-water', 'name' => 'Field Capacity and Plant Available Water Calculator'],
        ],
        'authors' => [],
    ],
];
