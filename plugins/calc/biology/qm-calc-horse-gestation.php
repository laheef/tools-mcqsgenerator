<?php

/**
 * Horse gestation
 * /biology/horse-gestation
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Horse gestation',
    'meta' => ['title' => 'Horse gestation Calculator: Free, With Steps', 'description' => 'Enter Foaling date into Horse gestation and the answer comes back as Mating date. There is no hidden constant here: change Mating date and Foaling date moves…', 'h1' => 'Horse gestation Calculator', 'updated' => '2026-08-06'],
    'raw' => [
        'vars' => [
            'currentDate' => ['type' => 'date', 'rnd' => null],
            'date' => ['type' => 'date', 'rnd' => null],
            'difference' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'difference_negated' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'earliest' => ['type' => 'date', 'rnd' => null],
            'latest' => ['type' => 'date', 'rnd' => null],
            'matingDate' => ['type' => 'date', 'rnd' => null],
            'pregnancyDay' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'weekday' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'guLepVD0nr0uoFvQ3EJ8T',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'matingDate', 'vt' => 'date', 'l' => 'Mating date'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'date',
                                    'vt' => 'date',
                                    'l' => 'Foaling date',
                                    'h' => 'The estimated delivery date.',
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
                                        ['difference == 0', '🐎 Your mare is going to foal today! Today is a&nbsp;'],
                                        ['difference == 1', '🐎 Your mare is going to foal in 1 day! Today is day 337 of the gestation. Your mare\'s estimated due date falls on a&nbsp;'],
                                        ['difference > 1', <<<'TXT'
                                        🐎 Your mare is going to foal in {{difference.formattedValue}} days! Today is day {{pregnancyDay.formattedValue}} of the gestation. Your mare's estimated due date falls on a&nbsp;
                                        TXT],
                                        ['difference == -1', '🐎 Your mare gave birth 1 day ago! Your mare\'s estimated due date was on a&nbsp;'],
                                        ['difference < -1', '🐎 Your mare gave birth {{difference_negated.formattedValue}} days ago! Your mare\'s estimated due date was on a&nbsp;'],
                                        ['weekday==0', 'Sunday.'],
                                        ['weekday==1', 'Monday.'],
                                        ['weekday==2', 'Tuesday.'],
                                        ['weekday==3', 'Wednesday.'],
                                        ['weekday==4', 'Thursday.'],
                                        ['weekday==5', 'Friday.'],
                                        ['weekday==6', 'Saturday.'],
                                        [null, 'Earliest possible foaling: {{earliest.shortValue}} Latest possible foaling: {{latest.shortValue}}'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => '3zPpw3ppfeRVdGYAiHkF0',
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
                                ['t' => 'v', 'n' => 'weekday', 'vt' => 'numerical', 'l' => 'Weekday'],
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
                                ['t' => 'v', 'n' => 'latest', 'vt' => 'date', 'l' => 'Latest'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'date = matingDate + 338',
                'var' => [
                    [
                        'l' => 'matingDate',
                        'f' => 'date - 338',
                        'r' => ['date'],
                    ],
                    [
                        'l' => 'date',
                        'f' => 'matingDate + 338',
                        'r' => ['matingDate'],
                    ],
                ],
            ],
            [
                'formula' => 'difference = round(date - currentDate)',
                'var' => [
                    [
                        'l' => 'difference',
                        'f' => 'round(-currentDate + date)',
                        'r' => ['currentDate', 'date'],
                    ],
                ],
            ],
            [
                'formula' => 'difference_negated = -1 * (date - currentDate)',
                'var' => [
                    [
                        'l' => 'currentDate',
                        'f' => 'date + difference_negated',
                        'r' => ['difference_negated', 'date'],
                    ],
                    [
                        'l' => 'difference_negated',
                        'f' => 'currentDate - date',
                        'r' => ['currentDate', 'date'],
                    ],
                    [
                        'l' => 'date',
                        'f' => 'currentDate - difference_negated',
                        'r' => ['currentDate', 'difference_negated'],
                    ],
                ],
            ],
            [
                'formula' => 'pregnancyDay = round(currentDate - matingDate)',
                'var' => [
                    [
                        'l' => 'pregnancyDay',
                        'f' => 'round(currentDate - matingDate)',
                        'r' => ['currentDate', 'matingDate'],
                    ],
                ],
            ],
            [
                'formula' => 'earliest = matingDate + 331',
                'var' => [
                    [
                        'l' => 'matingDate',
                        'f' => 'earliest - 331',
                        'r' => ['earliest'],
                    ],
                    [
                        'l' => 'earliest',
                        'f' => 'matingDate + 331',
                        'r' => ['matingDate'],
                    ],
                ],
            ],
            [
                'formula' => 'latest = matingDate + 346',
                'var' => [
                    [
                        'l' => 'matingDate',
                        'f' => 'latest - 346',
                        'r' => ['latest'],
                    ],
                    [
                        'l' => 'latest',
                        'f' => 'matingDate + 346',
                        'r' => ['matingDate'],
                    ],
                ],
            ],
            [
                'formula' => 'weekday = getDayOfWeek(date)',
                'var' => [
                    [
                        'l' => 'weekday',
                        'f' => 'getDayOfWeek(date)',
                        'r' => ['date'],
                    ],
                ],
            ],
        ],
        'datasets' => [],
        'js' => '"use strict";omni.define("getDayOfWeek",function(dateInput){var day=new Date(dateInput*86400000);return day.getUTCDay()});//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Foaling date into Horse gestation and the answer comes back as Mating date. There is no hidden constant here: change Mating date and Foaling date moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Horse gestation calculator works', 'html' => <<<'TXT'
            <p>The Horse gestation calculator applies one relationship to 1 number and reports Mating date.</p><p>The relationship it solves reads Mating date = Foaling date − 338.</p><p>The result panel carries Mating date, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 1 box, and nothing else.</p><ul><li><strong>Foaling date</strong> — a plain number, no unit, entered as a date. The estimated delivery date.</li></ul><p>What you get back is Mating date, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Mating date is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Mating date</strong> = <code>Foaling date − 338</code></li><li><strong>Foaling date</strong> = <code>Mating date + 338</code></li><li><strong>difference</strong> = <code>round( − currentDate + Foaling date)</code></li><li><strong>currentDate</strong> = <code>Foaling date + difference_negated</code></li><li><strong>difference_negated</strong> = <code>currentDate − Foaling date</code></li><li><strong>pregnancyDay</strong> = <code>round(currentDate − Mating date)</code></li></ul><p>Any one of Mating date, Foaling date and difference can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Mating date is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Convert Foaling date to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Foaling date is what you already know and Mating date is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/plasmid-molar-ratio">Plasmid Molar Ratio Calculator</a>, <a href="/biology/potting-soil-calculator">Potting soil Calculator</a> and <a href="/biology/primer-dimer-checker">Primer Dimer Checker Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Horse gestation calculator work out?', 'a' => 'Mating date, from Foaling date. The relationship is Mating date = Foaling date − 338.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Foaling date. Enter date; Mating date is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Mating date, Foaling date, difference and currentDate blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => 'Internally Mating date is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Foaling date blank and the page solves for it, reporting Mating date instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Mating date at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/plasmid-molar-ratio', 'name' => 'Plasmid Molar Ratio Calculator'],
            ['path' => '/biology/potting-soil-calculator', 'name' => 'Potting soil Calculator'],
            ['path' => '/biology/primer-dimer-checker', 'name' => 'Primer Dimer Checker Calculator'],
        ],
        'authors' => [],
    ],
];
