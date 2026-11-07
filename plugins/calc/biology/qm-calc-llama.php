<?php

/**
 * Llama
 * /biology/llama
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Llama',
    'meta' => ['title' => 'Llama Calculator: Formula, Steps & Examples', 'description' => <<<'TXT'
    Enter 🦙 Due date into Llama and the answer comes back as ❤️ Mating date. There is no hidden constant here: change ❤️ Mating date and 🦙 Due date moves with it.
    TXT, 'h1' => 'Llama Calculator', 'updated' => '2025-04-07'],
    'raw' => [
        'vars' => [
            'currentDate' => ['type' => 'date', 'rnd' => null],
            'difference_negative' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'difference_positive' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'difference_value' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'dueDate' => ['type' => 'date', 'rnd' => null],
            'earliest' => ['type' => 'date', 'rnd' => null],
            'latest' => ['type' => 'date', 'rnd' => null],
            'matingDate' => ['type' => 'date', 'rnd' => null],
            'weekday' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'Kdz1dFDTJtt6e9cE1HlIv',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'matingDate', 'vt' => 'date', 'l' => '❤️ Mating date'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'dueDate', 'vt' => 'date', 'l' => ' 🦙 Due date'],
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
                                        ['difference_value == 0', 'Your llama or alpaca is going to give birth today!'],
                                        ['difference_value == 1', 'Your llama or alpaca is going to give birth in {{difference_positive.formattedValue}} day!'],
                                        ['difference_value > 1', 'Your llama or alpaca is going to give birth in {{difference_positive.formattedValue}} days!'],
                                        ['difference_value == -1', 'Your llama or alpaca gave birth 1 day ago!'],
                                        ['difference_value < -1', 'Your llama or alpaca gave birth {{difference_negative.formattedValue}} days ago!'],
                                        ['difference_value == 0', 'Today is&nbsp;'],
                                        ['difference_value > 0', 'Your llama\'s or alpaca\'s due date is on a&nbsp;'],
                                        ['difference_value < 0', 'Your llama\'s or alpaca\'s due date was on a&nbsp;'],
                                        ['weekday==0', 'Sunday!'],
                                        ['weekday==1', 'Monday!'],
                                        ['weekday==2', 'Tuesday!'],
                                        ['weekday==3', 'Wednesday!'],
                                        ['weekday==4', 'Thursday!'],
                                        ['weekday==5', 'Friday!'],
                                        ['weekday==6', 'Saturday!'],
                                        [null, 'The earliest normal delivery: {{earliest.shortValue}} The latest normal delivery: {{latest.shortValue}}'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'njm_51Yf4CE5qtBB5rF1b',
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
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'difference_positive',
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
                                    'n' => 'difference_negative',
                                    'vt' => 'numerical',
                                    'l' => 'Difference negative',
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
                                ['t' => 'v', 'n' => 'difference_value', 'vt' => 'numerical', 'l' => 'Difference value'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'dueDate = matingDate + 342*86400000',
                'var' => [
                    [
                        'l' => 'matingDate',
                        'f' => 'dueDate - 29548800000',
                        'r' => ['dueDate'],
                    ],
                    [
                        'l' => 'dueDate',
                        'f' => 'matingDate + 29548800000',
                        'r' => ['matingDate'],
                    ],
                ],
            ],
            [
                'formula' => 'earliest = matingDate + 332*86400000',
                'var' => [
                    [
                        'l' => 'matingDate',
                        'f' => 'earliest - 28684800000',
                        'r' => ['earliest'],
                    ],
                    [
                        'l' => 'earliest',
                        'f' => 'matingDate + 28684800000',
                        'r' => ['matingDate'],
                    ],
                ],
            ],
            [
                'formula' => 'latest = matingDate + 352*86400000',
                'var' => [
                    [
                        'l' => 'matingDate',
                        'f' => 'latest - 30412800000',
                        'r' => ['latest'],
                    ],
                    [
                        'l' => 'latest',
                        'f' => 'matingDate + 30412800000',
                        'r' => ['matingDate'],
                    ],
                ],
            ],
            [
                'formula' => 'difference_positive = dueDate - (currentDate - mod(currentDate,86400000))',
                'var' => [
                    [
                        'l' => 'dueDate',
                        'f' => 'currentDate + difference_positive - mod(currentDate, 86400000)',
                        'r' => ['difference_positive', 'currentDate'],
                    ],
                    [
                        'l' => 'difference_positive',
                        'f' => '-currentDate + dueDate + mod(currentDate, 86400000)',
                        'r' => ['dueDate', 'currentDate'],
                    ],
                ],
            ],
            [
                'formula' => 'difference_negative = (currentDate - mod(currentDate,86400000)) - dueDate',
                'var' => [
                    [
                        'l' => 'dueDate',
                        'f' => 'currentDate - difference_negative - mod(currentDate, 86400000)',
                        'r' => ['difference_negative', 'currentDate'],
                    ],
                    [
                        'l' => 'difference_negative',
                        'f' => 'currentDate - dueDate - mod(currentDate, 86400000)',
                        'r' => ['dueDate', 'currentDate'],
                    ],
                ],
            ],
            [
                'formula' => 'weekday = getDayOfWeek(dueDate)',
                'var' => [
                    [
                        'l' => 'weekday',
                        'f' => 'getDayOfWeek(dueDate)',
                        'r' => ['dueDate'],
                    ],
                ],
            ],
            [
                'formula' => 'difference_value = difference_positive/86400000',
                'var' => [
                    [
                        'l' => 'difference_value',
                        'f' => '(1/86400000)*difference_positive',
                        'r' => ['difference_positive'],
                    ],
                    [
                        'l' => 'difference_positive',
                        'f' => '86400000*difference_value',
                        'r' => ['difference_value'],
                    ],
                ],
            ],
        ],
        'datasets' => [],
        'js' => '"use strict";omni.define("getDayOfWeek",function(dateInput){var day=new Date(dateInput);return day.getUTCDay()});//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter 🦙 Due date into Llama and the answer comes back as ❤️ Mating date. There is no hidden constant here: change ❤️ Mating date and 🦙 Due date moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Llama calculator works', 'html' => <<<'TXT'
            <p>Llama answers one question from 1 number, and the answer is ❤️ Mating date.</p><p>Written with the labels from the form, ❤️ Mating date = 🦙 Due date − 29548800000.</p><p>The answers are ❤️ Mating date; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 1 box to fill in; every one of them is used by the formula.</p><ul><li><strong>🦙 Due date</strong> — a plain number, no unit, entered as a date</li></ul><p>What you get back is ❤️ Mating date, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as ❤️ Mating date is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>❤️ Mating date</strong> = <code>🦙 Due date − 29548800000</code></li><li><strong>🦙 Due date</strong> = <code>❤️ Mating date + 29548800000</code></li><li><strong>earliest</strong> = <code>❤️ Mating date + 28684800000</code></li><li><strong>latest</strong> = <code>❤️ Mating date + 30412800000</code></li><li><strong>difference_positive</strong> = <code>− currentDate + 🦙 Due date + mod(currentDate, 86400000)</code></li><li><strong>difference_negative</strong> = <code>currentDate − 🦙 Due date − mod(currentDate, 86400000)</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of ❤️ Mating date, 🦙 Due date and earliest can be the unknown.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> ❤️ Mating date is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Convert 🦙 Due date to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: 🦙 Due date measured, ❤️ Mating date wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/grass-seed">Grass seed Calculator</a>, <a href="/biology/growing-degree-days">Growing Degree Days Calculator</a> and <a href="/biology/guinea-pig-pregnancy">Guinea pig pregnancy</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Llama calculator work out?', 'a' => '❤️ Mating date, from 🦙 Due date. The relationship is ❤️ Mating date = 🦙 Due date − 29548800000.'],
            ['q' => 'Which values do I need before I start?', 'a' => '🦙 Due date. With dueDate in place, ❤️ Mating date can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. ❤️ Mating date, 🦙 Due date, earliest and latest can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            ❤️ Mating date is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave 🦙 Due date blank and the page solves for it, reporting ❤️ Mating date instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of ❤️ Mating date keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/grass-seed', 'name' => 'Grass seed Calculator'],
            ['path' => '/biology/growing-degree-days', 'name' => 'Growing Degree Days Calculator'],
            ['path' => '/biology/guinea-pig-pregnancy', 'name' => 'Guinea pig pregnancy'],
        ],
        'authors' => [],
    ],
];
