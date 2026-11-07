<?php

/**
 * Cow gestation
 * /biology/cow-gestation
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cow gestation',
    'meta' => ['title' => 'Cow gestation Calculator — Formula & Results', 'description' => 'Cow gestation turns Exposed into First-time calver? and Calving start. When were the cows first exposed to bulls?The answers come back as First-time calver?…', 'h1' => 'Cow gestation Calculator', 'updated' => '2026-08-06'],
    'raw' => [
        'vars' => [
            'calvingStart' => ['type' => 'date', 'rnd' => null],
            'endOf' => ['type' => 'date', 'rnd' => null],
            'exposed' => ['type' => 'date', 'rnd' => null],
            'firstCalv' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => '_nrMSe5Nd5jhifyJ6sy2Z', 'c' => null],
                ],
                'ds' => 'dvOcipHocV4XeZFZbUMa-',
            ],
        ],
        'groups' => [
            [
                'uid' => 'zFapwlFezkMC2PONVbOJ1',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'exposed',
                                    'vt' => 'date',
                                    'l' => 'Exposed',
                                    'h' => 'When were the cows first exposed to bulls?',
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
                                    'n' => 'firstCalv',
                                    'vt' => 'valueSelect',
                                    'l' => 'First-time calver?',
                                    'h' => 'Is it the cow\'s first pregnancy?',
                                    'ds' => 'dvOcipHocV4XeZFZbUMa-',
                                    'opts' => [
                                        ['_nrMSe5Nd5jhifyJ6sy2Z', 'No', '0'],
                                        ['R5lVF70A5PUD926eb2zK-', 'Yes', '10'],
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
                                    'n' => 'calvingStart',
                                    'vt' => 'date',
                                    'l' => 'Calving start',
                                    'h' => 'When calving should begin.',
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
                                    'n' => 'endOf',
                                    'vt' => 'date',
                                    'l' => 'End of postpartum',
                                    'h' => 'End of the postpartum interval after the calving period.',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'calvingStart = exposed + 283 ',
                'var' => [
                    [
                        'l' => 'calvingStart',
                        'f' => 'exposed + 283',
                        'r' => ['exposed'],
                    ],
                    [
                        'l' => 'exposed',
                        'f' => 'calvingStart - 283',
                        'r' => ['calvingStart'],
                    ],
                ],
            ],
            [
                'formula' => 'endOf = calvingStart + 55 + firstCalv',
                'var' => [
                    [
                        'l' => 'firstCalv',
                        'f' => '-calvingStart + endOf - 55',
                        'r' => ['calvingStart', 'endOf'],
                    ],
                    [
                        'l' => 'calvingStart',
                        'f' => 'endOf - firstCalv - 55',
                        'r' => ['firstCalv', 'endOf'],
                    ],
                    [
                        'l' => 'endOf',
                        'f' => 'calvingStart + firstCalv + 55',
                        'r' => ['firstCalv', 'calvingStart'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'dvOcipHocV4XeZFZbUMa-' => [
                'name' => 'firstCalvers',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => '_nrMSe5Nd5jhifyJ6sy2Z', 'label' => 'No', 'value' => '0'],
                    ['uid' => 'R5lVF70A5PUD926eb2zK-', 'label' => 'Yes', 'value' => '10'],
                ],
            ],
        ],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        Cow gestation turns Exposed into First-time calver? and Calving start. Nothing is looked up on this page: First-time calver? is computed from Exposed and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Cow gestation calculator works', 'html' => <<<'TXT'
            <p>Cow gestation answers one question from 1 number, and the answer is First-time calver?, Calving start and End of postpartum.</p><p>In the form&#039;s own words, Calving start = Exposed + 283.</p><p>What comes back is First-time calver?, Calving start and End of postpartum — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 1 box to fill in; every one of them is used by the formula.</p><ul><li><strong>Exposed</strong> — a plain number, no unit, entered as a date. When were the cows first exposed to bulls?</li></ul><p>The answers come back as First-time calver?, Calving start, End of postpartum. </p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: First-time calver? takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Calving start</strong> = <code>Exposed + 283</code></li><li><strong>Exposed</strong> = <code>Calving start − 283</code></li><li><strong>First-time calver?</strong> = <code>− Calving start + End of postpartum − 55</code></li><li><strong>End of postpartum</strong> = <code>Calving start + First-time calver? + 55</code></li></ul><p>Any one of Calving start, Exposed and First-time calver? can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with First-time calver?, Calving start and End of postpartum are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> If Exposed is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Exposed measured, First-time calver? and Calving start wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/compost-application-rate">Compost Application Rate Calculator</a>, <a href="/biology/compost">Compost Calculator</a> and <a href="/biology/corn-yield">Corn yield Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cow gestation calculator work out?', 'a' => 'First-time calver?, Calving start and End of postpartum, from Exposed. The relationship is Calving start = Exposed + 283.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Exposed. Fill exposed and leave First-time calver? empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Calving start, Exposed, First-time calver? and End of postpartum blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            First-time calver? is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Exposed left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of First-time calver? keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/compost-application-rate', 'name' => 'Compost Application Rate Calculator'],
            ['path' => '/biology/compost', 'name' => 'Compost Calculator'],
            ['path' => '/biology/corn-yield', 'name' => 'Corn yield Calculator'],
        ],
        'authors' => [],
    ],
];
