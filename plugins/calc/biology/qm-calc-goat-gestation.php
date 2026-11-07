<?php

/**
 * Goat gestation
 * /biology/goat-gestation
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Goat gestation',
    'meta' => ['title' => 'Goat gestation Calculator — Formula & Results', 'description' => 'Goat gestation takes Breeding date and Kidding date and returns 🐐 The breed of your goat is…. A result box can be typed into, and doing so changes the…', 'h1' => 'Goat gestation Calculator', 'updated' => '2025-04-07'],
    'raw' => [
        'vars' => [
            'calving' => ['type' => 'date', 'rnd' => null],
            'currentDate' => ['type' => 'date', 'rnd' => null],
            'day' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'daysUntil' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'difference' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'exposed' => ['type' => 'date', 'rnd' => null],
            'miniature' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'OgfDXm_ssq5E-OFxSUvwE', 'c' => null],
                ],
                'ds' => 'p_OHW1janDuegiSjO3cSL',
            ],
            'negDifference' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'x2j51r5jRiijGIqMg5X7b',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'miniature',
                                    'vt' => 'valueSelect',
                                    'l' => '🐐 The breed of your goat is...',
                                    'ds' => 'p_OHW1janDuegiSjO3cSL',
                                    'opts' => [
                                        ['OgfDXm_ssq5E-OFxSUvwE', 'standard breed', '1'],
                                        ['yCWH5owyz2QfAj3gulGL_', 'miniature breed', '0'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'exposed', 'vt' => 'date', 'l' => 'Breeding date'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'calving', 'vt' => 'date', 'l' => 'Kidding date'],
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
                                        [null, 'Your goat\'s due date is on a&nbsp;'],
                                        ['day == 0', 'Sunday!'],
                                        ['day == 1', 'Monday!'],
                                        ['day == 2', 'Tuesday!'],
                                        ['day == 3', 'Wednesday!'],
                                        ['day == 4', 'Thursday!'],
                                        ['day == 5', 'Friday!'],
                                        ['day == 6', 'Saturday!'],
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
                                        ['difference > 1', 'Your goat is going to give birth in {{difference.formattedValue}} days!'],
                                        ['difference < 1', 'Your goat is going to give birth in {{difference.formattedValue}} day!'],
                                        ['calving == currentDate', 'Your goat gives birth today!!'],
                                        ['calving < currentDate', 'Your goat gave birth {{negDifference.formattedValue}} day(s) ago!'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'w8W2Uf_VPl2U43profVzQ',
                'title' => 'Hidden variables',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'day', 'vt' => 'numerical', 'l' => 'Day'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'daysUntil', 'vt' => 'numerical', 'l' => 'Days until'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'currentDate', 'vt' => 'date', 'l' => 'Current date'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'difference', 'vt' => 'numerical', 'l' => 'Difference'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'negDifference', 'vt' => 'numerical', 'l' => 'Neg difference'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'calving = exposed + 150 - 5 * (1 - miniature)',
                'var' => [
                    [
                        'l' => 'miniature',
                        'f' => '(1/5)*calving - 1/5*exposed - 29',
                        'r' => ['exposed', 'calving'],
                    ],
                    [
                        'l' => 'exposed',
                        'f' => 'calving - 5*miniature - 145',
                        'r' => ['miniature', 'calving'],
                    ],
                    [
                        'l' => 'calving',
                        'f' => 'exposed + 5*miniature + 145',
                        'r' => ['miniature', 'exposed'],
                    ],
                ],
            ],
            [
                'formula' => 'day = getDayOfWeek (calving)',
                'var' => [
                    [
                        'l' => 'day',
                        'f' => 'getDayOfWeek(calving)',
                        'r' => ['calving'],
                    ],
                ],
            ],
            [
                'formula' => 'daysUntil = calving - exposed',
                'var' => [
                    [
                        'l' => 'exposed',
                        'f' => 'calving - daysUntil',
                        'r' => ['calving', 'daysUntil'],
                    ],
                    [
                        'l' => 'calving',
                        'f' => 'daysUntil + exposed',
                        'r' => ['exposed', 'daysUntil'],
                    ],
                    [
                        'l' => 'daysUntil',
                        'f' => 'calving - exposed',
                        'r' => ['exposed', 'calving'],
                    ],
                ],
            ],
            [
                'formula' => 'difference = calving - currentDate',
                'var' => [
                    [
                        'l' => 'calving',
                        'f' => 'currentDate + difference',
                        'r' => ['currentDate', 'difference'],
                    ],
                    [
                        'l' => 'currentDate',
                        'f' => 'calving - difference',
                        'r' => ['calving', 'difference'],
                    ],
                    [
                        'l' => 'difference',
                        'f' => 'calving - currentDate',
                        'r' => ['calving', 'currentDate'],
                    ],
                ],
            ],
            [
                'formula' => 'negDifference = difference * -1',
                'var' => [
                    [
                        'l' => 'difference',
                        'f' => '-negDifference',
                        'r' => ['negDifference'],
                    ],
                    [
                        'l' => 'negDifference',
                        'f' => '-difference',
                        'r' => ['difference'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'p_OHW1janDuegiSjO3cSL' => [
                'name' => 'miniature',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'OgfDXm_ssq5E-OFxSUvwE', 'label' => 'standard breed', 'value' => '1'],
                    ['uid' => 'yCWH5owyz2QfAj3gulGL_', 'label' => 'miniature breed', 'value' => '0'],
                ],
            ],
        ],
        'js' => '"use strict";omni.define("getDayOfWeek",function(dateInput){var date=new Date(dateInput*1000*60*60*24);return date.getUTCDay()});//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        Goat gestation takes Breeding date and Kidding date and returns 🐐 The breed of your goat is…. Nothing is looked up on this page: 🐐 The breed of your goat is... is computed from Breeding date and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Goat gestation calculator works', 'html' => <<<'TXT'
            <p>Goat gestation answers one question from 2 numbers, and the answer is 🐐 The breed of your goat is….</p><p>The relationship it solves reads 🐐 The breed of your goat is... = (1 ÷ 5) × Kidding date − 1 ÷ 5 × Breeding date − 29.</p><p>The answers are 🐐 The breed of your goat is…; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Breeding date</strong> — a plain number, no unit, entered as a date</li><li><strong>Kidding date</strong> — a plain number, no unit, entered as a date</li></ul><p>The answer comes back as 🐐 The breed of your goat is…. </p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: 🐐 The breed of your goat is... takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>🐐 The breed of your goat is...</strong> = <code>(1 ÷ 5) × Kidding date − 1 ÷ 5 × Breeding date − 29</code></li><li><strong>Breeding date</strong> = <code>Kidding date − 5 × 🐐 The breed of your goat is... − 145</code></li><li><strong>Kidding date</strong> = <code>Breeding date + 5 × 🐐 The breed of your goat is... + 145</code></li><li><strong>day</strong> = <code>getDayOfWeek(Kidding date)</code></li><li><strong>daysUntil</strong> = <code>Kidding date − Breeding date</code></li><li><strong>currentDate</strong> = <code>Kidding date − difference</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of 🐐 The breed of your goat is…, Breeding date and Kidding date can be the unknown.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with 🐐 The breed of your goat is… is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Breeding date and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Breeding date and Kidding date is what you already know and 🐐 The breed of your goat is… is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/gc-content-calculator">GC Content Calculator</a>, <a href="/biology/gc-content-sequence">GC Content from a Sequence — Sliding Window</a> and <a href="/biology/gdu">GDU (growing degree units) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Goat gestation calculator work out?', 'a' => <<<'TXT'
            🐐 The breed of your goat is…, from Breeding date and Kidding date. The relationship is 🐐 The breed of your goat is... = (1 ÷ 5) × Kidding date − 1 ÷ 5 × Breeding date − 29.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Breeding date, Kidding date. Enter exposed and calving; 🐐 The breed of your goat is... is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. 🐐 The breed of your goat is…, Breeding date, Kidding date and day can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            🐐 The breed of your goat is... is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave Breeding date blank and the page solves for it, reporting 🐐 The breed of your goat is... instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of 🐐 The breed of your goat is... keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/gc-content-calculator', 'name' => 'GC Content Calculator'],
            ['path' => '/biology/gc-content-sequence', 'name' => 'GC Content from a Sequence — Sliding Window'],
            ['path' => '/biology/gdu', 'name' => 'GDU (growing degree units) Calculator'],
        ],
        'authors' => [],
    ],
];
