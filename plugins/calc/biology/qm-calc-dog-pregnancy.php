<?php

/**
 * Dog pregnancy
 * /biology/dog-pregnancy
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dog pregnancy',
    'meta' => ['title' => 'Dog pregnancy Calculator — Formula, Units & Example', 'description' => <<<'TXT'
    Dog pregnancy turns Mating date into Due date. Fill in 1 box and the page has everything it needs.Mating date — a plain number, no unit, entered as a dateThe…
    TXT, 'h1' => 'Dog pregnancy Calculator', 'updated' => '2026-10-05'],
    'raw' => [
        'vars' => [
            'currentDate' => ['type' => 'date', 'rnd' => null],
            'day' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'difference' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'dueDate' => ['type' => 'date', 'rnd' => null],
            'matingDate' => ['type' => 'date', 'rnd' => null],
            'negDifference' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'D5WPUuaJyeIQwS3__K-g1',
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
                                        ['difference > 1', '🐶 Your dog is going to give birth in {{difference.formattedValue}}&nbsp;days!'],
                                        ['difference < 1', '🐶 Your dog is going to give birth in {{difference.formattedValue}}&nbsp;day!'],
                                        ['dueDate == currentDate', '🐶 Your dog gives birth today!!'],
                                        ['dueDate < currentDate', '🐶 Your dog gave birth {{negDifference.formattedValue}}&nbsp;day(s) ago!'],
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
                                        [null, '🐕 Your dog\'s due date is on&nbsp;'],
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
                ],
            ],
            [
                'uid' => 'UkmKtR1gNIVMnwHRqrfev',
                'title' => 'Hidden variables',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'currentDate', 'vt' => 'date', 'l' => 'Currentdate'],
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
                                ['t' => 'v', 'n' => 'day', 'vt' => 'numerical', 'l' => 'Day'],
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
                'formula' => 'dueDate = matingDate + 63',
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
                        'l' => 'difference',
                        'f' => '-currentDate + dueDate',
                        'r' => ['dueDate', 'currentDate'],
                    ],
                    [
                        'l' => 'dueDate',
                        'f' => 'currentDate + difference',
                        'r' => ['difference', 'currentDate'],
                    ],
                    [
                        'l' => 'currentDate',
                        'f' => '-difference + dueDate',
                        'r' => ['difference', 'dueDate'],
                    ],
                ],
            ],
            [
                'formula' => 'day = getDayOfWeek (dueDate)',
                'var' => [
                    [
                        'l' => 'day',
                        'f' => 'getDayOfWeek(dueDate)',
                        'r' => ['dueDate'],
                    ],
                ],
            ],
            [
                'formula' => 'negDifference = difference * -1',
                'var' => [
                    [
                        'l' => 'negDifference',
                        'f' => '-difference',
                        'r' => ['difference'],
                    ],
                    [
                        'l' => 'difference',
                        'f' => '-negDifference',
                        'r' => ['negDifference'],
                    ],
                ],
            ],
        ],
        'datasets' => [],
        'js' => '"use strict";omni.define("getDayOfWeek",function(dateInput){var date=new Date(dateInput*1000*60*60*24);return date.getUTCDay()});//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        Dog pregnancy turns Mating date into Due date. Nothing is looked up on this page: Due date is computed from Mating date and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Dog pregnancy calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Dog pregnancy: it takes 1 number and reports Due date.</p><p>The relationship it solves reads Due date = Mating date + 63.</p><p>What comes back is Due date — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 1 box and the page has everything it needs.</p><ul><li><strong>Mating date</strong> — a plain number, no unit, entered as a date</li></ul><p>The result box is Due date. </p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>None of the boxes on this page carries a unit chip: Due date takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>'],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Due date</strong> = <code>Mating date + 63</code></li><li><strong>Mating date</strong> = <code>Due date − 63</code></li><li><strong>difference</strong> = <code>− currentDate + Due date</code></li><li><strong>currentDate</strong> = <code>− difference + Due date</code></li><li><strong>day</strong> = <code>getDayOfWeek(Due date)</code></li><li><strong>negDifference</strong> = <code>− difference</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Due date, Mating date and difference can be the unknown.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Due date is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> If Mating date is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Mating date measured, Due date wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/plant-population">Plant population Calculator</a>, <a href="/biology/plants">Plant spacing Calculator</a> and <a href="/biology/plants-per-hectare">Plants Per Hectare Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dog pregnancy calculator work out?', 'a' => 'Due date, from Mating date. The relationship is Due date = Mating date + 63.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Mating date. Fill matingDate and leave Due date empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Due date, Mating date, difference and currentDate can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Due date is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Mating date blank and the page solves for it, reporting Due date instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Due date keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/plant-population', 'name' => 'Plant population Calculator'],
            ['path' => '/biology/plants', 'name' => 'Plant spacing Calculator'],
            ['path' => '/biology/plants-per-hectare', 'name' => 'Plants Per Hectare Calculator'],
        ],
        'authors' => [],
    ],
];
