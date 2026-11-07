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
    'meta' => ['title' => 'Horse gestation Calculator: Free, With Steps', 'description' => 'Supply the foaling date and the difference negated and the Horse gestation calculator solves for <strong>mating date</strong>. The Horse gestation calculator…', 'h1' => 'Horse gestation Calculator', 'updated' => '2026-08-06'],
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
        'intro' => 'Supply the foaling date and the difference negated and the Horse gestation calculator solves for <strong>mating date</strong>.',
        'sections' => [
            ['title' => 'How does the Horse gestation calculator work?', 'html' => <<<'TXT'
            <p>The Horse gestation calculator takes the values in the form, applies the relationship described below and reports <strong>mating date</strong> in the results panel.</p>
            <p>Working from the top of the form: you give the foaling date; then you type in the difference negated.</p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Mating date</strong></td><td>A calendar date.</td><td>date</td><td>Calculated</td></tr><tr><td><strong>Foaling date</strong></td><td>A calendar date.</td><td>date</td><td>You supply it</td></tr><tr><td><strong>Pregnancy day</strong></td><td>A measured quantity, 27 units available.</td><td>days</td><td>Calculated</td></tr><tr><td><strong>Current date</strong></td><td>A calendar date.</td><td>date</td><td>Calculated</td></tr><tr><td><strong>Difference</strong></td><td>A measured quantity, 27 units available.</td><td>days</td><td>Calculated</td></tr><tr><td><strong>Difference negated</strong></td><td>A measured quantity, 27 units available.</td><td>days</td><td>You supply it</td></tr><tr><td><strong>Weekday</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Earliest</strong></td><td>A calendar date.</td><td>date</td><td>Calculated</td></tr><tr><td><strong>Latest</strong></td><td>A calendar date.</td><td>date</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Horse gestation calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Mating date</span><span class="formula-eq">=</span><span class="formula-rhs">foaling date − 338</span></div><div class="formula-row"><span class="formula-lhs">Difference</span><span class="formula-eq">=</span><span class="formula-rhs">rounded, (-current date + foaling date)</span></div><div class="formula-row"><span class="formula-lhs">Current date</span><span class="formula-eq">=</span><span class="formula-rhs">foaling date + difference negated</span></div><div class="formula-row"><span class="formula-lhs">Pregnancy day</span><span class="formula-eq">=</span><span class="formula-rhs">rounded, (current date − mating date)</span></div><div class="formula-row"><span class="formula-lhs">Mating date</span><span class="formula-eq">=</span><span class="formula-rhs">earliest − 331</span></div><div class="formula-row"><span class="formula-lhs">Mating date</span><span class="formula-eq">=</span><span class="formula-rhs">latest − 346</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A calendar date.</li><li>Shown in days, and convertible to any of the 27 units on that chip.</li><li>A calendar date.</li><li>Shown in days, and convertible to any of the 27 units on that chip.</li><li>A calendar date.</li><li>A calendar date.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Time, opening in days</li><li>Time, opening in days</li><li>Time, opening in days</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Horse gestation calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Supporting a lesson, a lecture or a field note</li><li>Comparing two organisms, populations or processes</li><li>Putting a biological quantity into a scale you can picture</li><li>Any time the same 2 figures keep coming back — the foaling date and the difference negated — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Write the answer down with its unit. </li><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li><li>Round only at the end. </li><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li>Dates are compared date to date in your own time zone, so a daylight-saving change will not shift the count by a day.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Horse gestation calculator, these are the ones that matter:</p>
            <ul><li>Dates are handled as whole calendar days in the time zone of the browser, so a birth date or a deadline is compared date to date rather than as a span of hours.</li><li>The unit chips cover the units listed on the page. A historical or regional unit that is missing can still be used by converting it to a listed unit first.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/horse-weight">Horse weight</a>, <a href="/biology/how-big-will-my-cat-get">How big will my cat get</a> and <a href="/biology/ligation">Ligation</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Horse gestation calculator work out?', 'a' => <<<'TXT'
            It returns mating date, derived from the foaling date and the difference negated. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Horse gestation calculator?', 'a' => <<<'TXT'
            The form asks for the foaling date and the difference negated, which is 2 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter pregnancy day in a different unit?', 'a' => <<<'TXT'
            Yes. Pregnancy day opens in days and the chip beside it offers 27 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'Is the Horse gestation calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — press Calculate and every result updates together.
            TXT],
        ],
        'related' => [
            ['path' => '/biology/horse-weight', 'name' => 'Horse weight'],
            ['path' => '/biology/how-big-will-my-cat-get', 'name' => 'How big will my cat get'],
            ['path' => '/biology/ligation', 'name' => 'Ligation'],
        ],
    ],
];
