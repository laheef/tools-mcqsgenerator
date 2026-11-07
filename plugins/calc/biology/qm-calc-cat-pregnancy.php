<?php

/**
 * Cat pregnancy
 * /biology/cat-pregnancy
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cat pregnancy',
    'meta' => ['title' => 'Cat pregnancy Calculator — Formula & Results', 'description' => <<<'TXT'
    Cat pregnancy works out Due date from Mating date. There is no hidden constant here: change Due date and Mating date moves with it. It fills in as soon as the…
    TXT, 'h1' => 'Cat pregnancy Calculator', 'updated' => '2026-09-28'],
    'raw' => [
        'vars' => [
            'currentDate' => ['type' => 'date', 'rnd' => null],
            'dateMili' => ['type' => 'date', 'rnd' => null],
            'difference' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.01'],
            ],
            'dueDate' => ['type' => 'date', 'rnd' => null],
            'dueDateDay' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'earliestDue' => ['type' => 'date', 'rnd' => null],
            'latestDue' => ['type' => 'date', 'rnd' => null],
            'matingDate' => ['type' => 'date', 'rnd' => null],
            'negativeDiff' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'S5I6ds_9xrc8wZcD8oPvT',
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
                                ['t' => 'v', 'n' => 'dueDate', 'vt' => 'date', 'l' => 'Due date'],
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
                                        [null, '🐈 Your cat\'s due date is on a&nbsp;'],
                                        ['dueDateDay == 0', 'Sunday!'],
                                        ['dueDateDay == 1', 'Monday!'],
                                        ['dueDateDay == 2', 'Tuesday!'],
                                        ['dueDateDay == 3', 'Wednesday!'],
                                        ['dueDateDay == 4', 'Thursday!'],
                                        ['dueDateDay == 5', 'Friday!'],
                                        ['dueDateDay == 6', 'Saturday!'],
                                        ['difference > 0', '&nbsp; 🐱 Your cat is going to give birth in around {{difference.formattedValue}} day(s)!'],
                                        ['difference <= 0', '&nbsp; 🐱 Your cat gave birth {{negativeDiff.formattedValue}} day(s) ago!&nbsp;'],
                                        [null, 'The earliest possible delivery date is: {{earliestDue.formattedValue}} The latest possible delivery date is: {{latestDue.formattedValue}}'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'f5Ct3xKzr8RYjuFhFs_hv',
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
                                ['t' => 'v', 'n' => 'dateMili', 'vt' => 'date', 'l' => 'Date mili'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'dueDateDay', 'vt' => 'numerical', 'l' => 'Due date day'],
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
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'negativeDiff', 'vt' => 'numerical', 'l' => 'Negative diff'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'matingDate + 63 = dueDate',
                'var' => [
                    [
                        'l' => 'dueDate',
                        'f' => 'matingDate + 63',
                        'r' => ['matingDate'],
                    ],
                    [
                        'l' => 'matingDate',
                        'f' => 'dueDate - 63',
                        'r' => ['dueDate'],
                    ],
                ],
            ],
            [
                'formula' => 'difference = dueDate - currentDate',
                'var' => [
                    [
                        'l' => 'dueDate',
                        'f' => 'currentDate + difference',
                        'r' => ['currentDate', 'difference'],
                    ],
                    [
                        'l' => 'currentDate',
                        'f' => '-difference + dueDate',
                        'r' => ['dueDate', 'difference'],
                    ],
                    [
                        'l' => 'difference',
                        'f' => '-currentDate + dueDate',
                        'r' => ['dueDate', 'currentDate'],
                    ],
                ],
            ],
            [
                'formula' => 'dateMili = dueDate',
                'var' => [
                    [
                        'l' => 'dueDate',
                        'f' => 'dateMili',
                        'r' => ['dateMili'],
                    ],
                    [
                        'l' => 'dateMili',
                        'f' => 'dueDate',
                        'r' => ['dueDate'],
                    ],
                ],
            ],
            [
                'formula' => 'dueDateDay = getDueDate(dateMili)',
                'var' => [
                    [
                        'l' => 'dueDateDay',
                        'f' => 'getDueDate(dateMili)',
                        'r' => ['dateMili'],
                    ],
                ],
            ],
            [
                'formula' => 'earliestDue = matingDate + 58',
                'var' => [
                    [
                        'l' => 'earliestDue',
                        'f' => 'matingDate + 58',
                        'r' => ['matingDate'],
                    ],
                    [
                        'l' => 'matingDate',
                        'f' => 'earliestDue - 58',
                        'r' => ['earliestDue'],
                    ],
                ],
            ],
            [
                'formula' => 'latestDue = matingDate + 71',
                'var' => [
                    [
                        'l' => 'matingDate',
                        'f' => 'latestDue - 71',
                        'r' => ['latestDue'],
                    ],
                    [
                        'l' => 'latestDue',
                        'f' => 'matingDate + 71',
                        'r' => ['matingDate'],
                    ],
                ],
            ],
            [
                'formula' => 'negativeDiff = difference * -1',
                'var' => [
                    [
                        'l' => 'negativeDiff',
                        'f' => '-difference',
                        'r' => ['difference'],
                    ],
                    [
                        'l' => 'difference',
                        'f' => '-negativeDiff',
                        'r' => ['negativeDiff'],
                    ],
                ],
            ],
        ],
        'datasets' => [],
        'js' => <<<'TXT'
        "use strict";omni.define("getDueDate",function(dateInput){var dateInputMili=dateInput*24*60*60*1000;var date=new Date(dateInputMili);return date.getUTCDay()});//# sourceURL=customJs.js
        TXT,
    ],
    'article' => [
        'intro' => 'Cat pregnancy works out Due date from Mating date. There is no hidden constant here: change Due date and Mating date moves with it.',
        'sections' => [
            ['title' => 'How the Cat pregnancy calculator works', 'html' => <<<'TXT'
            <p>Cat pregnancy answers one question from 1 number, and the answer is Due date.</p><p>The relationship it solves reads Due date = Mating date + 63.</p><p>The answers are Due date; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 1 box, and nothing else.</p><ul><li><strong>Mating date</strong> — a plain number, no unit, entered as a date</li></ul><p>The result box is Due date. </p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Due date is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Due date</strong> = <code>Mating date + 63</code></li><li><strong>Mating date</strong> = <code>Due date − 63</code></li><li><strong>currentDate</strong> = <code>− difference + Due date</code></li><li><strong>difference</strong> = <code>− currentDate + Due date</code></li><li><strong>dateMili</strong> = <code>Due date</code></li><li><strong>dueDateDay</strong> = <code>getDueDate(dateMili)</code></li></ul><p>Any one of Due date, Mating date and currentDate can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Due date is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> If Mating date is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Mating date and the number you are missing is Due date.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/pcr-cycle-calculator">PCR Cycle Calculator</a>, <a href="/biology/pcr-master-mix-calculator">PCR Master Mix Calculator</a> and <a href="/biology/pcr-primer-stats">PCR Primer Stats Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cat pregnancy calculator work out?', 'a' => 'Due date, from Mating date. The relationship is Due date = Mating date + 63.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Mating date. Fill matingDate and leave Due date empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Due date, Mating date, currentDate and difference blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Due date is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Mating date blank and the page solves for it, reporting Due date instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Due date keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/pcr-cycle-calculator', 'name' => 'PCR Cycle Calculator'],
            ['path' => '/biology/pcr-master-mix-calculator', 'name' => 'PCR Master Mix Calculator'],
            ['path' => '/biology/pcr-primer-stats', 'name' => 'PCR Primer Stats Calculator'],
        ],
        'authors' => [],
    ],
];
