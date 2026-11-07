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
    <strong>due date</strong> is what the Dog pregnancy calculator works out, and it gets there from the mating date and the current date. Working from the top of…
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
        'intro' => '<strong>due date</strong> is what the Dog pregnancy calculator works out, and it gets there from the mating date and the current date.',
        'sections' => [
            ['title' => 'How does the Dog pregnancy calculator work?', 'html' => <<<'TXT'
            <p>The Dog pregnancy calculator takes the values in the form, applies the relationship described below and reports <strong>due date</strong> in the results panel.</p>
            <p>Working from the top of the form: you give the mating date and the current date.</p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Mating date</strong></td><td>A calendar date.</td><td>date</td><td>You supply it</td></tr><tr><td><strong>Due date</strong></td><td>A calendar date.</td><td>date</td><td>Calculated</td></tr><tr><td><strong>Current date</strong></td><td>A calendar date.</td><td>date</td><td>You supply it</td></tr><tr><td><strong>Difference</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Day</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Neg difference</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Dog pregnancy calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Due date</span><span class="formula-eq">=</span><span class="formula-rhs">mating date + 63</span></div><div class="formula-row"><span class="formula-lhs">Difference</span><span class="formula-eq">=</span><span class="formula-rhs">-current date + due date</span></div><div class="formula-row"><span class="formula-lhs">Day</span><span class="formula-eq">=</span><span class="formula-rhs">weekday of (due date)</span></div><div class="formula-row"><span class="formula-lhs">Neg difference</span><span class="formula-eq">=</span><span class="formula-rhs">-difference</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><strong>Due date</strong>: a calendar date.</li><li><strong>Difference</strong>: a number, filled in as soon as the inputs allow it.</li><li><strong>Day</strong>: a number, filled in as soon as the inputs allow it.</li><li><strong>Neg difference</strong>: a number, filled in as soon as the inputs allow it.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Dog pregnancy calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Supporting a lesson, a lecture or a field note</li><li>Putting a biological quantity into a scale you can picture</li><li>Comparing two organisms, populations or processes</li><li>Any time the same 2 figures keep coming back — the mating date and the current date — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Keep the units you enter consistent. </li><li>Write the answer down with its unit. </li><li>Round only at the end. </li><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li>Dates are compared date to date in your own time zone, so a daylight-saving change will not shift the count by a day.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Dog pregnancy calculator, these are the ones that matter:</p>
            <ul><li>Dates are handled as whole calendar days in the time zone of the browser, so a birth date or a deadline is compared date to date rather than as a span of hours.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'How do you check the answer yourself?', 'html' => <<<'TXT'
            <ul><li>Change one input at a time — mating date for instance — and watch which results move. A result that stays put does not depend on it.</li><li>Try a round value you can work out in your head. If the answer matches your mental arithmetic, the inputs are on the scale you assumed.</li><li>Re-enter the same figure and confirm the result is stable; a number that moves when you press Calculate again is a sign that a field is still empty.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/dog-quality-of-life">Dog quality of life</a>, <a href="/biology/dog-raisin-toxicity">Dog raisin toxicity</a> and <a href="/biology/dog-size">Dog size</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dog pregnancy calculator work out?', 'a' => <<<'TXT'
            It returns due date, derived from the mating date and the current date. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Dog pregnancy calculator?', 'a' => <<<'TXT'
            The form asks for the mating date and the current date, which is 2 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'Is the Dog pregnancy calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — press Calculate and every result updates together.
            TXT],
            ['q' => 'Why is the answer different from the one in my protocol?', 'a' => <<<'TXT'
            Nearly always a unit or a rounding difference. The calculator works in the units printed next to each box, keeps full precision internally and only rounds for display, so recomputing from the rounded numbers on screen can differ in the last digit.
            TXT],
        ],
        'related' => [
            ['path' => '/biology/dog-quality-of-life', 'name' => 'Dog quality of life'],
            ['path' => '/biology/dog-raisin-toxicity', 'name' => 'Dog raisin toxicity'],
            ['path' => '/biology/dog-size', 'name' => 'Dog size'],
        ],
    ],
];
