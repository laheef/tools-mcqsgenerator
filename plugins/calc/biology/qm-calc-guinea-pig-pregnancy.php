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
    'meta' => ['title' => 'Guinea pig pregnancy — Free Online Calculator', 'description' => 'The Guinea pig pregnancy calculator turns the difference negated and the earliest into <strong>due date</strong>. The Guinea pig pregnancy calculator takes…', 'h1' => 'Guinea pig pregnancy Calculator', 'updated' => '2026-08-06'],
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
        'intro' => 'The Guinea pig pregnancy calculator turns the difference negated and the earliest into <strong>due date</strong>.',
        'sections' => [
            ['title' => 'How does the Guinea pig pregnancy calculator work?', 'html' => <<<'TXT'
            <p>The Guinea pig pregnancy calculator takes the values in the form, applies the relationship described below and reports <strong>due date</strong> in the results panel.</p>
            <p>Working from the top of the form: you give the earliest; then you type in the difference negated.</p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Breeding date</strong></td><td>A calendar date.</td><td>date</td><td>Calculated</td></tr><tr><td><strong>Due date</strong></td><td>A calendar date.</td><td>date</td><td>Calculated</td></tr><tr><td><strong>Pregnancy day</strong></td><td>A measured quantity, 27 units available.</td><td>days</td><td>Calculated</td></tr><tr><td><strong>Current date</strong></td><td>A calendar date.</td><td>date</td><td>Calculated</td></tr><tr><td><strong>Difference</strong></td><td>A measured quantity, 27 units available.</td><td>days</td><td>Calculated</td></tr><tr><td><strong>Difference negated</strong></td><td>A measured quantity, 27 units available.</td><td>days</td><td>You supply it</td></tr><tr><td><strong>Earliest</strong></td><td>A calendar date.</td><td>date</td><td>You supply it</td></tr><tr><td><strong>Latest</strong></td><td>A calendar date.</td><td>date</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Guinea pig pregnancy calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Due date</span><span class="formula-eq">=</span><span class="formula-rhs">breeding date + 65</span></div><div class="formula-row"><span class="formula-lhs">Difference</span><span class="formula-eq">=</span><span class="formula-rhs">rounded, (-current date + due date)</span></div><div class="formula-row"><span class="formula-lhs">Current date</span><span class="formula-eq">=</span><span class="formula-rhs">difference negated + due date</span></div><div class="formula-row"><span class="formula-lhs">Pregnancy day</span><span class="formula-eq">=</span><span class="formula-rhs">rounded, (-breeding date + current date)</span></div><div class="formula-row"><span class="formula-lhs">Breeding date</span><span class="formula-eq">=</span><span class="formula-rhs">earliest − 59</span></div><div class="formula-row"><span class="formula-lhs">Latest</span><span class="formula-eq">=</span><span class="formula-rhs">breeding date + 72</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A calendar date.</li><li>Shown in days, and convertible to any of the 27 units on that chip.</li><li>A calendar date.</li><li>Shown in days, and convertible to any of the 27 units on that chip.</li><li>A calendar date.</li><li>A calendar date.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Time, opening in days</li><li>Time, opening in days</li><li>Time, opening in days</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Guinea pig pregnancy calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Comparing two organisms, populations or processes</li><li>Supporting a lesson, a lecture or a field note</li><li>Putting a biological quantity into a scale you can picture</li><li>Any time the same 2 figures keep coming back — the difference negated and the earliest — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Write the answer down with its unit. </li><li>Round only at the end. </li><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li>Dates are compared date to date in your own time zone, so a daylight-saving change will not shift the count by a day.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Guinea pig pregnancy calculator, these are the ones that matter:</p>
            <ul><li>Dates are handled as whole calendar days in the time zone of the browser, so a birth date or a deadline is compared date to date rather than as a span of hours.</li><li>The unit chips cover the units listed on the page. A historical or regional unit that is missing can still be used by converting it to a listed unit first.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/hamster-age">Hamster age</a>, <a href="/biology/hardy-weinberg-equilibrium">Hardy-Weinberg equilibrium</a> and <a href="/biology/horse-gestation">Horse gestation</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Guinea pig pregnancy calculator work out?', 'a' => <<<'TXT'
            It returns due date, derived from the difference negated and the earliest. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Guinea pig pregnancy calculator?', 'a' => <<<'TXT'
            The form asks for the difference negated and the earliest, which is 2 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter pregnancy day in a different unit?', 'a' => <<<'TXT'
            Yes. Pregnancy day opens in days and the chip beside it offers 27 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'Is the Guinea pig pregnancy calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — press Calculate and every result updates together.
            TXT],
        ],
        'related' => [
            ['path' => '/biology/hamster-age', 'name' => 'Hamster age'],
            ['path' => '/biology/hardy-weinberg-equilibrium', 'name' => 'Hardy-Weinberg equilibrium'],
            ['path' => '/biology/horse-gestation', 'name' => 'Horse gestation'],
        ],
    ],
];
