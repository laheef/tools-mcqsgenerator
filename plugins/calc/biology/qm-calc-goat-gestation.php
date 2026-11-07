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
    'meta' => ['title' => 'Goat gestation Calculator — Formula & Results', 'description' => 'The answer is what the Goat gestation calculator works out, and it gets there from the days until, the current date and the neg difference.', 'h1' => 'Goat gestation Calculator', 'updated' => '2025-04-07'],
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
        'intro' => 'The answer is what the Goat gestation calculator works out, and it gets there from the days until, the current date and the neg difference.',
        'sections' => [
            ['title' => 'How does the Goat gestation calculator work?', 'html' => <<<'TXT'
            <p>The Goat gestation calculator takes the values in the form, applies the relationships described below and reports every result it can derive from them.</p>
            <p>Working from the top of the form: you give the current date; then you type in the days until and the neg difference.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>A plain number with no unit attached.</li><li>A calendar date. </li><li>A plain number with no unit attached.</li></ul><p>One field on this form is a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Breeding date</strong></td><td>A calendar date.</td><td>date</td><td>Calculated</td></tr><tr><td><strong>Kidding date</strong></td><td>A calendar date.</td><td>date</td><td>Calculated</td></tr><tr><td><strong>Day</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Days until</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Current date</strong></td><td>A calendar date.</td><td>date</td><td>You supply it</td></tr><tr><td><strong>Difference</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Neg difference</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Goat gestation calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">The breed of your goat is...</span><span class="formula-eq">=</span><span class="formula-rhs">(1 ÷ 5) × kidding date − 1 ÷ 5 × breeding date − 29</span></div><div class="formula-row"><span class="formula-lhs">Day</span><span class="formula-eq">=</span><span class="formula-rhs">weekday of (kidding date)</span></div><div class="formula-row"><span class="formula-lhs">Breeding date</span><span class="formula-eq">=</span><span class="formula-rhs">kidding date − days until</span></div><div class="formula-row"><span class="formula-lhs">Kidding date</span><span class="formula-eq">=</span><span class="formula-rhs">current date + difference</span></div><div class="formula-row"><span class="formula-lhs">Difference</span><span class="formula-eq">=</span><span class="formula-rhs">-neg difference</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>The option the calculation settles on.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A calendar date.</li><li>A calendar date.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Goat gestation calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Comparing two organisms, populations or processes</li><li>Putting a biological quantity into a scale you can picture</li><li>Supporting a lesson, a lecture or a field note</li><li>Any time the same 3 figures keep coming back — the days until, the current date and the neg difference — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Keep the units you enter consistent. </li><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li><li>Write the answer down with its unit. </li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Dates are compared date to date in your own time zone, so a daylight-saving change will not shift the count by a day.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Goat gestation calculator, these are the ones that matter:</p>
            <ul><li>The 1 drop-down on this page offers a fixed list of cases. A value that is not on the list cannot be entered, and the nearest option is not always a good substitute.</li><li>Dates are handled as whole calendar days in the time zone of the browser, so a birth date or a deadline is compared date to date rather than as a span of hours.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/grain-bin">Grain bin</a>, <a href="/biology/grain-conversion">Grain conversion</a> and <a href="/biology/grass-seed">Grass seed</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What do I need to enter to use the Goat gestation calculator?', 'a' => <<<'TXT'
            The form asks for the days until, the current date and the neg difference, which is 3 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There is one choice to make (1 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'Is the Goat gestation calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — press Calculate and every result updates together.
            TXT],
            ['q' => 'Why is the answer different from the one in my protocol?', 'a' => <<<'TXT'
            Nearly always a unit or a rounding difference. The calculator works in the units printed next to each box, keeps full precision internally and only rounds for display, so recomputing from the rounded numbers on screen can differ in the last digit.
            TXT],
        ],
        'related' => [
            ['path' => '/biology/grain-bin', 'name' => 'Grain bin'],
            ['path' => '/biology/grain-conversion', 'name' => 'Grain conversion'],
            ['path' => '/biology/grass-seed', 'name' => 'Grass seed'],
        ],
    ],
];
