<?php

/**
 * Guinea pig pregnancy
 * /biology/guinea-pig-pregnancy
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Guinea pig pregnancy',
    'meta' => ['title' => 'Guinea pig pregnancy — Free Online Calculator', 'description' => 'Enter Breeding date into Guinea pig pregnancy and the answer comes back as Due date. The arithmetic is the whole method: Due date is worked out from Breeding…', 'h1' => 'Guinea pig pregnancy Calculator', 'updated' => '2026-08-06'],
    'raw' => [
        'vars' => [
            'breeding_date' => ['type' => 'date', 'rnd' => null],
            'currentDate' => ['type' => 'date', 'rnd' => null],
            'difference' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'difference_negated' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'due_date' => ['type' => 'date', 'rnd' => null],
            'earliest' => ['type' => 'date', 'rnd' => null],
            'latest' => ['type' => 'date', 'rnd' => null],
            'pregnancyDay' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'MUl5Gxw9ZziWT9v6NSZVQ',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'breeding_date', 'vt' => 'date', 'l' => 'Breeding date'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'due_date', 'vt' => 'date', 'l' => 'Due date'],
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
                                        ['difference == 0', '🐹 Your sow is going to farrow today!'],
                                        ['difference == 1', '🐹 Your sow is going to farrow in about 1 day! Today is day {{pregnancyDay.formattedValue}} of the gestation.'],
                                        ['difference > 1', '🐹 Your sow is going to farrow in about {{difference.formattedValue}} days! Today is day {{pregnancyDay.formattedValue}} of the gestation.'],
                                        ['difference == -1', '🐹 Your sow gave birth 1 day ago!'],
                                        ['difference < -1', '🐹 Your sow gave birth {{difference_negated.formattedValue}} days ago!'],
                                        [null, 'The earliest possible farrowing: {{earliest.shortValue}} The latest possible farrowing: {{latest.shortValue}}'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'oTJJJH94dhV3Lkew89BVI',
                'title' => 'Hidden variables',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'pregnancyDay',
                                    'vt' => 'numerical',
                                    'l' => 'Pregnancy day',
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
                                ['t' => 'v', 'n' => 'currentDate', 'vt' => 'date', 'l' => 'Current date'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'difference',
                                    'vt' => 'numerical',
                                    'l' => 'Difference',
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
                                    'n' => 'difference_negated',
                                    'vt' => 'numerical',
                                    'l' => 'Difference negated',
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
                                ['t' => 'v', 'n' => 'earliest', 'vt' => 'date', 'l' => 'Earliest'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'latest',
                                    'vt' => 'date',
                                    'l' => 'Latest',
                                    'oo' => 1,
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'due_date = breeding_date + 65',
                'var' => [
                    [
                        'l' => 'due_date',
                        'f' => 'breeding_date + 65',
                        'r' => ['breeding_date'],
                    ],
                    [
                        'l' => 'breeding_date',
                        'f' => 'due_date - 65',
                        'r' => ['due_date'],
                    ],
                ],
            ],
            [
                'formula' => 'difference = round(due_date - currentDate)',
                'var' => [
                    [
                        'l' => 'difference',
                        'f' => 'round(-currentDate + due_date)',
                        'r' => ['currentDate', 'due_date'],
                    ],
                ],
            ],
            [
                'formula' => 'difference_negated = -1 * (due_date - currentDate)',
                'var' => [
                    [
                        'l' => 'currentDate',
                        'f' => 'difference_negated + due_date',
                        'r' => ['due_date', 'difference_negated'],
                    ],
                    [
                        'l' => 'due_date',
                        'f' => 'currentDate - difference_negated',
                        'r' => ['currentDate', 'difference_negated'],
                    ],
                    [
                        'l' => 'difference_negated',
                        'f' => 'currentDate - due_date',
                        'r' => ['currentDate', 'due_date'],
                    ],
                ],
            ],
            [
                'formula' => 'pregnancyDay = round(currentDate - breeding_date)',
                'var' => [
                    [
                        'l' => 'pregnancyDay',
                        'f' => 'round(-breeding_date + currentDate)',
                        'r' => ['breeding_date', 'currentDate'],
                    ],
                ],
            ],
            [
                'formula' => 'earliest = breeding_date + 59',
                'var' => [
                    [
                        'l' => 'breeding_date',
                        'f' => 'earliest - 59',
                        'r' => ['earliest'],
                    ],
                    [
                        'l' => 'earliest',
                        'f' => 'breeding_date + 59',
                        'r' => ['breeding_date'],
                    ],
                ],
            ],
            [
                'formula' => 'latest = breeding_date + 72',
                'var' => [
                    [
                        'l' => 'latest',
                        'f' => 'breeding_date + 72',
                        'r' => ['breeding_date'],
                    ],
                    [
                        'l' => 'breeding_date',
                        'f' => 'latest - 72',
                        'r' => ['latest'],
                    ],
                ],
            ],
        ],
        'datasets' => [],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Breeding date into Guinea pig pregnancy and the answer comes back as Due date. The arithmetic is the whole method: Due date is worked out from Breeding date by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Guinea pig pregnancy calculator works', 'html' => <<<'TXT'
            <p>Guinea pig pregnancy answers one question from 1 number, and the answer is Due date.</p><p>Written with the labels from the form, Due date = Breeding date + 65.</p><p>What comes back is Due date — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 1 box to fill in; every one of them is used by the formula.</p><ul><li><strong>Breeding date</strong> — a plain number, no unit, entered as a date</li></ul><p>The answer comes back as Due date. </p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Due date is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Due date</strong> = <code>Breeding date + 65</code></li><li><strong>Breeding date</strong> = <code>Due date − 65</code></li><li><strong>difference</strong> = <code>round( − currentDate + Due date)</code></li><li><strong>currentDate</strong> = <code>difference_negated + Due date</code></li><li><strong>difference_negated</strong> = <code>currentDate − Due date</code></li><li><strong>pregnancyDay</strong> = <code>round( − Breeding date + currentDate)</code></li></ul><p>Any one of Due date, Breeding date and difference can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Due date is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Convert Breeding date to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Breeding date measured, Due date wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/tree-height">Tree height</a>, <a href="/biology/tree-spacing">Tree spacing</a> and <a href="/biology/tree-value">Tree value Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Guinea pig pregnancy calculator work out?', 'a' => 'Due date, from Breeding date. The relationship is Due date = Breeding date + 65.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Breeding date. Enter breeding_date; Due date is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Due date, Breeding date, difference and currentDate blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => 'Internally Due date is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Breeding date blank and the page solves for it, reporting Due date instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Due date keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/tree-height', 'name' => 'Tree height'],
            ['path' => '/biology/tree-spacing', 'name' => 'Tree spacing'],
            ['path' => '/biology/tree-value', 'name' => 'Tree value Calculator'],
        ],
        'authors' => [],
    ],
];
