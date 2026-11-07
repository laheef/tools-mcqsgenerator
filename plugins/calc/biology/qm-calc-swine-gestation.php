<?php

/**
 * Swine gestation
 * /biology/swine-gestation
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Swine gestation',
    'meta' => ['title' => 'Swine gestation — Formula, Steps & Examples', 'description' => <<<'TXT'
    Swine gestation takes Breeding date and returns Farrowing date. A result here can always be checked: enter it in its own box, leave a different one empty, and…
    TXT, 'h1' => 'Swine gestation Calculator', 'updated' => '2026-08-06'],
    'raw' => [
        'vars' => [
            'SuffixCheckJ' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'currentDate' => ['type' => 'date', 'rnd' => null],
            'difference' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'earliestDue' => ['type' => 'date', 'rnd' => null],
            'exposed' => ['type' => 'date', 'rnd' => null],
            'farrowing' => ['type' => 'date', 'rnd' => null],
            'latestDue' => ['type' => 'date', 'rnd' => null],
            'negativeDifference' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'pregnancyDay' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'suffixCheckK' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'D1h-B2jHwb-zt_iCxH8Bm',
                'title' => '',
                'desc' => '',
                'm' => [
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
                                ['t' => 'v', 'n' => 'farrowing', 'vt' => 'date', 'l' => 'Farrowing date'],
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
                                        ['difference > 0', '🐖 Your sow is going to farrow in {{difference.formattedValue}}&nbsp;days!'],
                                        ['currentDate == farrowing', '🐖 Your sow gave birth today!'],
                                        ['difference < 0', '🐖 Your sow gave birth {{negativeDifference.formattedValue}}&nbsp;days ago!'],
                                        ['difference == 1', '🐖 Your sow is going to farrow in {{difference.formattedValue}}&nbsp;day!'],
                                        ['negativeDifference == 1', '🐖 Your sow gave birth {{negativeDifference.formattedValue}}&nbsp;day ago!'],
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
                                        ['not((SuffixCheckJ == 1 and suffixCheckK != 11) and (SuffixCheckJ == 2 and suffixCheckK != 12) and (SuffixCheckJ == 3 and suffixCheckK != 13))', 'Today is the {{pregnancyDay.formattedValue}}th day of the gestation.'],
                                        ['SuffixCheckJ == 1 and suffixCheckK != 11', 'Today is the {{pregnancyDay.formattedValue}}st day of the gestation.'],
                                        ['SuffixCheckJ == 2 and suffixCheckK != 12', 'Today is the {{pregnancyDay.formattedValue}}nd day of the gestation.'],
                                        ['SuffixCheckJ == 3 and suffixCheckK != 13', 'Today is the {{pregnancyDay.formattedValue}}rd day of the gestation.'],
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
                                        [null, '• Earliest possible farrowing: {{earliestDue.formattedValue}} • Latest possible farrowing: {{latestDue.formattedValue}}'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => '1C80nZlSUPtZ0UNxCBscw',
                'title' => 'Hidden variables',
                'desc' => '',
                'm' => [
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
                                ['t' => 'v', 'n' => 'negativeDifference', 'vt' => 'numerical', 'l' => 'Negative difference'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'pregnancyDay', 'vt' => 'numerical', 'l' => 'Pregnancy day'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'SuffixCheckJ', 'vt' => 'numerical', 'l' => 'Suffix check j'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'suffixCheckK', 'vt' => 'numerical', 'l' => 'Suffix check k'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'earliestDue', 'vt' => 'date', 'l' => 'Earliest due'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'latestDue', 'vt' => 'date', 'l' => 'Latest due'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'farrowing = exposed + 114',
                'var' => [
                    [
                        'l' => 'farrowing',
                        'f' => 'exposed + 114',
                        'r' => ['exposed'],
                    ],
                    [
                        'l' => 'exposed',
                        'f' => 'farrowing - 114',
                        'r' => ['farrowing'],
                    ],
                ],
            ],
            [
                'formula' => 'difference = round(farrowing - currentDate)',
                'var' => [
                    [
                        'l' => 'difference',
                        'f' => 'round(-currentDate + farrowing)',
                        'r' => ['currentDate', 'farrowing'],
                    ],
                ],
            ],
            [
                'formula' => 'negativeDifference = round(difference * -1)',
                'var' => [
                    [
                        'l' => 'negativeDifference',
                        'f' => 'round(-round(-currentDate + farrowing))',
                        'r' => ['currentDate', 'farrowing'],
                    ],
                ],
            ],
            [
                'formula' => 'pregnancyDay = round(currentDate - exposed)',
                'var' => [
                    [
                        'l' => 'pregnancyDay',
                        'f' => 'round(currentDate - exposed)',
                        'r' => ['currentDate', 'exposed'],
                    ],
                ],
            ],
            [
                'formula' => 'earliestDue = exposed + 112',
                'var' => [
                    [
                        'l' => 'earliestDue',
                        'f' => 'exposed + 112',
                        'r' => ['exposed'],
                    ],
                    [
                        'l' => 'exposed',
                        'f' => 'earliestDue - 112',
                        'r' => ['earliestDue'],
                    ],
                ],
            ],
            [
                'formula' => 'latestDue = exposed + 120',
                'var' => [
                    [
                        'l' => 'latestDue',
                        'f' => 'exposed + 120',
                        'r' => ['exposed'],
                    ],
                    [
                        'l' => 'exposed',
                        'f' => 'latestDue - 120',
                        'r' => ['latestDue'],
                    ],
                ],
            ],
            [
                'formula' => 'SuffixCheckJ = round(mod(pregnancyDay, 10))',
                'var' => [
                    [
                        'l' => 'SuffixCheckJ',
                        'f' => 'round(mod(round(currentDate - exposed), 10))',
                        'r' => ['currentDate', 'exposed'],
                    ],
                ],
            ],
            [
                'formula' => 'suffixCheckK = round(mod(pregnancyDay, 100))',
                'var' => [
                    [
                        'l' => 'suffixCheckK',
                        'f' => 'round(mod(round(currentDate - exposed), 100))',
                        'r' => ['currentDate', 'exposed'],
                    ],
                ],
            ],
        ],
        'datasets' => [],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Swine gestation takes Breeding date and returns Farrowing date. Nothing is looked up on this page: Farrowing date is computed from Breeding date and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Swine gestation calculator works', 'html' => <<<'TXT'
            <p>Swine gestation answers one question from 1 number, and the answer is Farrowing date.</p><p>Written with the labels from the form, Farrowing date = Breeding date + 114.</p><p>The result panel carries Farrowing date, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 1 box, and nothing else.</p><ul><li><strong>Breeding date</strong> — a plain number, no unit, entered as a date</li></ul><p>What you get back is Farrowing date, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: Farrowing date takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Farrowing date</strong> = <code>Breeding date + 114</code></li><li><strong>Breeding date</strong> = <code>Farrowing date − 114</code></li><li><strong>difference</strong> = <code>round( − currentDate + Farrowing date)</code></li><li><strong>negativeDifference</strong> = <code>round( − round( − currentDate + Farrowing date))</code></li><li><strong>pregnancyDay</strong> = <code>round(currentDate − Breeding date)</code></li><li><strong>earliestDue</strong> = <code>Breeding date + 112</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Farrowing date, Breeding date and difference can be the unknown.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Farrowing date is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Breeding date and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Breeding date and the number you are missing is Farrowing date.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/cell-dilution">Cell dilution Calculator</a>, <a href="/biology/cell-doubling-time">Cell doubling time Calculator</a> and <a href="/biology/cell-seeding-density">Cell Seeding Density Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Swine gestation calculator work out?', 'a' => 'Farrowing date, from Breeding date. The relationship is Farrowing date = Breeding date + 114.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Breeding date. Enter exposed; Farrowing date is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Farrowing date, Breeding date, difference and negativeDifference can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Farrowing date is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Breeding date blank and the page solves for it, reporting Farrowing date instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Farrowing date keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/cell-dilution', 'name' => 'Cell dilution Calculator'],
            ['path' => '/biology/cell-doubling-time', 'name' => 'Cell doubling time Calculator'],
            ['path' => '/biology/cell-seeding-density', 'name' => 'Cell Seeding Density Calculator'],
        ],
        'authors' => [],
    ],
];
