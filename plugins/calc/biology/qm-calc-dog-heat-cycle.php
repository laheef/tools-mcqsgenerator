<?php

/**
 * Dog heat cycle
 * /biology/dog-heat-cycle
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dog heat cycle',
    'meta' => ['title' => 'Dog heat cycle Calculator — Formula & Results', 'description' => 'Dog heat cycle turns First day of the cycle, enter_heat_cycle and Heat cycle length into cycle1 and cycle2. The arithmetic is the whole method: cycle1 is…', 'h1' => 'Dog heat cycle Calculator', 'updated' => '2026-08-19'],
    'raw' => [
        'vars' => [
            'cycle1' => ['type' => 'date', 'rnd' => null],
            'cycle2' => ['type' => 'date', 'rnd' => null],
            'eightMonths' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '244', 'c' => null],
                ],
            ],
            'eighteenDays' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '18', 'c' => null],
                ],
            ],
            'enter_heat_cycle' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => '4MhaGP2DO5L_md8W9hnsI', 'c' => null],
                ],
                'ds' => 'w-uJoHUW7pkKMDdhWSRDo',
            ],
            'firstDay' => ['type' => 'date', 'rnd' => null],
            'fiveMonths' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '152', 'c' => null],
                ],
            ],
            'length' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'SmJOM4KUfVLcxoCn9xv7x', 'c' => null],
                ],
                'ds' => 'I3GbN75PmyXFrKKeXiUNm',
            ],
            'length_value' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'nextCycle1' => ['type' => 'date', 'rnd' => null],
            'nextCycle2' => ['type' => 'date', 'rnd' => null],
            'nextCycle3' => ['type' => 'date', 'rnd' => null],
            'twentyoneDays' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '21', 'c' => null],
                ],
            ],
        ],
        'groups' => [
            [
                'uid' => 'SZR7P1BlbCRYxkGwCczJL',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'x',
                                    'c' => [
                                        [null, '✨ Skip the math: create, edit, and save custom calculators ➔ instantly just by typing what you need.'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'firstDay', 'vt' => 'date', 'l' => 'First day of the cycle'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'enter_heat_cycle',
                                    'vt' => 'valueSelect',
                                    'l' => '',
                                    'ds' => 'w-uJoHUW7pkKMDdhWSRDo',
                                    'opts' => [
                                        ['kwpww5FxEm32wPYMeZvhS', 'Enter your dog\'s heat cycle length (if you know it)', '1'],
                                        ['4MhaGP2DO5L_md8W9hnsI', '', '0'],
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
                                    't' => 'v',
                                    'n' => 'length',
                                    'vt' => 'valueSelect',
                                    'l' => 'Heat cycle length',
                                    'suf' => 'months',
                                    'ds' => 'I3GbN75PmyXFrKKeXiUNm',
                                    'opts' => [
                                        ['CK4OvRewrE2EcPUlijkYf', '4', '4'],
                                        ['pu_8vY4dOd3i6pAglybI6', '5', '5'],
                                        ['SmJOM4KUfVLcxoCn9xv7x', '6', '6'],
                                        ['ys3PuofM1WOXiN10XhfA9', '7', '7'],
                                        ['TSdrM1ZTgE0lWrj63Z-2m', '8', '8'],
                                        ['SGJLaHMs-CSmjakFiI3oz', '9', '9'],
                                        ['w5UF41W4wrNGcXsXm6Y3k', '10', '10'],
                                        ['BIa3HsO8V9JryI8VY5ZYI', '11', '11'],
                                        ['qgvzojXHcO2ttD0i84zen', '12', '12'],
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
                                        [null, '📅 Your dog\'s cycle will last up to {{cycle1.shortValue}} - {{cycle2.shortValue}}.'],
                                        ['enter_heat_cycle==0', '📅 You can expect the next heat cycle between {{nextCycle1.shortValue}} and {{nextCycle2.shortValue}}.&nbsp;'],
                                        ['enter_heat_cycle==1', '📅 You can expect the next heat on {{nextCycle3.shortValue}}.'],
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
                                        [null, '💡 Dogs of small breeds might go into heat more often (even every four months), while dogs of giant breeds - less frequently (e.g., once per year).'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'Nks1LHjtP3XnDgvaLipHy',
                'title' => 'Hidden variables',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'cycle1', 'vt' => 'date', 'l' => 'Cycle1'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'cycle2', 'vt' => 'date', 'l' => 'Cycle2'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'eightMonths',
                                    'vt' => 'numerical',
                                    'l' => 'Eight months',
                                    'us' => '19',
                                    'du' => 'days',
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
                                    'n' => 'eighteenDays',
                                    'vt' => 'numerical',
                                    'l' => 'Eighteen days',
                                    'us' => '19',
                                    'du' => 'days',
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
                                    'n' => 'fiveMonths',
                                    'vt' => 'numerical',
                                    'l' => 'Five months',
                                    'us' => '19',
                                    'du' => 'days',
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
                                    'n' => 'twentyoneDays',
                                    'vt' => 'numerical',
                                    'l' => 'Twentyone days',
                                    'us' => '19',
                                    'du' => 'days',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'nextCycle1', 'vt' => 'date', 'l' => 'Next cycle1'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'nextCycle2', 'vt' => 'date', 'l' => 'Next cycle2'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'nextCycle3', 'vt' => 'date', 'l' => 'Next cycle3'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'length_value', 'vt' => 'dependent', 'l' => 'Length value'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'cycle1=one_way(firstDay+eighteenDays)',
                'var' => [
                    [
                        'l' => 'cycle1',
                        'f' => '(eighteenDays + firstDay)',
                        'r' => ['eighteenDays', 'firstDay'],
                    ],
                ],
            ],
            [
                'formula' => 'cycle2 = one_way(firstDay+twentyoneDays)',
                'var' => [
                    [
                        'l' => 'cycle2',
                        'f' => '(firstDay + twentyoneDays)',
                        'r' => ['firstDay', 'twentyoneDays'],
                    ],
                ],
            ],
            [
                'formula' => 'nextCycle1 = one_way(firstDay+fiveMonths)',
                'var' => [
                    [
                        'l' => 'nextCycle1',
                        'f' => '(firstDay + fiveMonths)',
                        'r' => ['firstDay', 'fiveMonths'],
                    ],
                ],
            ],
            [
                'formula' => 'nextCycle2 = one_way(firstDay+eightMonths)',
                'var' => [
                    [
                        'l' => 'nextCycle2',
                        'f' => '(eightMonths + firstDay)',
                        'r' => ['eightMonths', 'firstDay'],
                    ],
                ],
            ],
            [
                'formula' => 'nextCycle3= one_way(firstDay+round(length_value*30.44)*86400000)',
                'var' => [
                    [
                        'l' => 'nextCycle3',
                        'f' => '(firstDay + 86400000*round((761/25)*length_value))',
                        'r' => ['firstDay', 'length_value'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'I3GbN75PmyXFrKKeXiUNm' => [
                'name' => 'Length',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'CK4OvRewrE2EcPUlijkYf', 'label' => '4', 'value' => '4'],
                    ['uid' => 'pu_8vY4dOd3i6pAglybI6', 'label' => '5', 'value' => '5'],
                    ['uid' => 'SmJOM4KUfVLcxoCn9xv7x', 'label' => '6', 'value' => '6'],
                    ['uid' => 'ys3PuofM1WOXiN10XhfA9', 'label' => '7', 'value' => '7'],
                    ['uid' => 'TSdrM1ZTgE0lWrj63Z-2m', 'label' => '8', 'value' => '8'],
                    ['uid' => 'SGJLaHMs-CSmjakFiI3oz', 'label' => '9', 'value' => '9'],
                    ['uid' => 'w5UF41W4wrNGcXsXm6Y3k', 'label' => '10', 'value' => '10'],
                    ['uid' => 'BIa3HsO8V9JryI8VY5ZYI', 'label' => '11', 'value' => '11'],
                    ['uid' => 'qgvzojXHcO2ttD0i84zen', 'label' => '12', 'value' => '12'],
                ],
            ],
            'w-uJoHUW7pkKMDdhWSRDo' => [
                'name' => 'Choose heat cycle length',
                'uiType' => 'CHECKBOX',
                'options' => [
                    ['uid' => 'kwpww5FxEm32wPYMeZvhS', 'label' => 'Enter your dog\'s heat cycle length (if you know it)', 'value' => '1'],
                    ['uid' => '4MhaGP2DO5L_md8W9hnsI', 'label' => '', 'value' => '0'],
                ],
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Dog heat cycle turns First day of the cycle, enter_heat_cycle and Heat cycle length into cycle1 and cycle2. The arithmetic is the whole method: cycle1 is worked out from First day of the cycle by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Dog heat cycle calculator works', 'html' => <<<'TXT'
            <p>Dog heat cycle answers one question from 3 numbers, and the answer is cycle1, cycle2 and nextCycle1.</p><p>The relationship it solves reads cycle1 = (eighteenDays + First day of the cycle).</p><p>The result panel carries cycle1, cycle2, nextCycle1 and nextCycle2, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>First day of the cycle</strong> — a plain number, no unit, entered as a date</li><li><strong>enter_heat_cycle</strong> — a plain number, no unit</li><li><strong>Heat cycle length</strong> — in months</li></ul><p>The answers come back as cycle1, cycle2, nextCycle1, nextCycle2, nextCycle3. </p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>None of the boxes on this page carries a unit chip: cycle1 takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>'],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>cycle1</strong> = <code>(eighteenDays + First day of the cycle)</code></li><li><strong>cycle2</strong> = <code>(First day of the cycle + twentyoneDays)</code></li><li><strong>nextCycle1</strong> = <code>(First day of the cycle + fiveMonths)</code></li><li><strong>nextCycle2</strong> = <code>(eightMonths + First day of the cycle)</code></li><li><strong>nextCycle3</strong> = <code>(First day of the cycle + 86400000 × round((761 ÷ 25) × length_value))</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of cycle1, cycle2 and nextCycle1 can be the unknown.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with cycle1, cycle2 and nextCycle1 are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Convert First day of the cycle to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: First day of the cycle, enter_heat_cycle and Heat cycle length measured, cycle1 and cycle2 wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/gypsum-application-rate">Gypsum Application Rate Calculator</a>, <a href="/biology/hamster-age">Hamster age Calculator</a> and <a href="/biology/hardy-weinberg-equilibrium">Hardy-Weinberg equilibrium Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dog heat cycle calculator work out?', 'a' => 'cycle1, cycle2, nextCycle1 and nextCycle2, from First day of the cycle. The relationship is cycle1 = (eighteenDays + First day of the cycle).'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            First day of the cycle, enter_heat_cycle, Heat cycle length (months). Enter firstDay, enter_heat_cycle and length; cycle1 is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. cycle1, cycle2, nextCycle1 and nextCycle2 can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'How precise is the result?', 'a' => 'Internally cycle1 is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave First day of the cycle blank and the page solves for it, reporting cycle1 instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of cycle1 keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/gypsum-application-rate', 'name' => 'Gypsum Application Rate Calculator'],
            ['path' => '/biology/hamster-age', 'name' => 'Hamster age Calculator'],
            ['path' => '/biology/hardy-weinberg-equilibrium', 'name' => 'Hardy-Weinberg equilibrium Calculator'],
        ],
        'authors' => [],
    ],
];
