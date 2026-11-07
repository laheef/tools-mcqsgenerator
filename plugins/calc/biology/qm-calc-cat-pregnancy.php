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
    'meta' => ['title' => 'Cat pregnancy Calculator — Formula & Results', 'description' => '<strong>due date</strong> is what the Cat pregnancy calculator works out, and it gets there from the difference and the latest due. Working from the top of…', 'h1' => 'Cat pregnancy Calculator', 'updated' => '2026-09-28'],
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
        'intro' => '<strong>due date</strong> is what the Cat pregnancy calculator works out, and it gets there from the difference and the latest due.',
        'sections' => [
            ['title' => 'How does the Cat pregnancy calculator work?', 'html' => <<<'TXT'
            <p>The Cat pregnancy calculator takes the values in the form, applies the relationship described below and reports <strong>due date</strong> in the results panel.</p>
            <p>Working from the top of the form: you give the latest due; then you type in the difference.</p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Mating date</strong></td><td>A calendar date.</td><td>date</td><td>Calculated</td></tr><tr><td><strong>Due date</strong></td><td>A calendar date.</td><td>date</td><td>Calculated</td></tr><tr><td><strong>Current date</strong></td><td>A calendar date.</td><td>date</td><td>Calculated</td></tr><tr><td><strong>Difference</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Date mili</strong></td><td>A calendar date.</td><td>date</td><td>Calculated</td></tr><tr><td><strong>Due date day</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Earliest due</strong></td><td>A calendar date.</td><td>date</td><td>Calculated</td></tr><tr><td><strong>Latest due</strong></td><td>A calendar date.</td><td>date</td><td>You supply it</td></tr><tr><td><strong>Negative differenceerence</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Cat pregnancy calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Due date</span><span class="formula-eq">=</span><span class="formula-rhs">mating date + 63</span></div><div class="formula-row"><span class="formula-lhs">Due date</span><span class="formula-eq">=</span><span class="formula-rhs">current date + difference</span></div><div class="formula-row"><span class="formula-lhs">Due date</span><span class="formula-eq">=</span><span class="formula-rhs">date mili</span></div><div class="formula-row"><span class="formula-lhs">Due date day</span><span class="formula-eq">=</span><span class="formula-rhs">(date mili)</span></div><div class="formula-row"><span class="formula-lhs">Earliest due</span><span class="formula-eq">=</span><span class="formula-rhs">mating date + 58</span></div><div class="formula-row"><span class="formula-lhs">Mating date</span><span class="formula-eq">=</span><span class="formula-rhs">latest due − 71</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A calendar date.</li><li>A calendar date.</li><li>A calendar date.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A calendar date.</li><li>A calendar date.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Cat pregnancy calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Putting a biological quantity into a scale you can picture</li><li>Comparing two organisms, populations or processes</li><li>Supporting a lesson, a lecture or a field note</li><li>Any time the same 2 figures keep coming back — the difference and the latest due — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li><li>Keep the units you enter consistent. </li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li>Dates are compared date to date in your own time zone, so a daylight-saving change will not shift the count by a day.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Cat pregnancy calculator, these are the ones that matter:</p>
            <ul><li>Dates are handled as whole calendar days in the time zone of the browser, so a birth date or a deadline is compared date to date rather than as a span of hours.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'How do you check the answer yourself?', 'html' => <<<'TXT'
            <ul><li>Change one input at a time — difference for instance — and watch which results move. A result that stays put does not depend on it.</li><li>Try a round value you can work out in your head. If the answer matches your mental arithmetic, the inputs are on the scale you assumed.</li><li>Re-enter the same figure and confirm the result is stable; a number that moves when you press Calculate again is a sign that a field is still empty.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/cat-quality-of-life">Cat quality of life</a>, <a href="/biology/catculator">Catculator</a> and <a href="/biology/cattle-per-acre">Cattle per acre</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cat pregnancy calculator work out?', 'a' => <<<'TXT'
            It returns due date, derived from the difference and the latest due. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Cat pregnancy calculator?', 'a' => <<<'TXT'
            The form asks for the difference and the latest due, which is 2 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'Is the Cat pregnancy calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — press Calculate and every result updates together.
            TXT],
            ['q' => 'Why is the answer different from the one in my protocol?', 'a' => <<<'TXT'
            Nearly always a unit or a rounding difference. The calculator works in the units printed next to each box, keeps full precision internally and only rounds for display, so recomputing from the rounded numbers on screen can differ in the last digit.
            TXT],
        ],
        'related' => [
            ['path' => '/biology/cat-quality-of-life', 'name' => 'Cat quality of life'],
            ['path' => '/biology/catculator', 'name' => 'Catculator'],
            ['path' => '/biology/cattle-per-acre', 'name' => 'Cattle per acre'],
        ],
    ],
];
