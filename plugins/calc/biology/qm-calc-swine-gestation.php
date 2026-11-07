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
    'meta' => ['title' => 'Swine gestation — Formula, Steps & Examples', 'description' => '<strong>farrowing date</strong> is what the Swine gestation calculator works out, and it gets there from the breeding date and the current date.', 'h1' => 'Swine gestation Calculator', 'updated' => '2026-08-06'],
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
        <strong>farrowing date</strong> is what the Swine gestation calculator works out, and it gets there from the breeding date and the current date. 
        
        Editing anything puts the results away until the next press of Calculate — change one value at a time and the updated answer tells you what that value was worth.
        TXT,
        'sections' => [
            ['title' => 'How does the Swine gestation calculator work?', 'html' => <<<'TXT'
            <p>The Swine gestation calculator takes the values in the form, applies the relationship described below and reports <strong>farrowing date</strong> in the results panel.</p>
            <p>Working from the top of the form: you give the breeding date and the current date.</p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Breeding date</strong></td><td>A calendar date.</td><td>date</td><td>You supply it</td></tr><tr><td><strong>Farrowing date</strong></td><td>A calendar date.</td><td>date</td><td>Calculated</td></tr><tr><td><strong>Current date</strong></td><td>A calendar date.</td><td>date</td><td>You supply it</td></tr><tr><td><strong>Difference</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Negative differenceerenceerence</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Pregnancy day</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Suffix check j</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Suffix check k</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Earliest due</strong></td><td>A calendar date.</td><td>date</td><td>Calculated</td></tr><tr><td><strong>Latest due</strong></td><td>A calendar date.</td><td>date</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Swine gestation calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Farrowing date</span><span class="formula-eq">=</span><span class="formula-rhs">breeding date + 114</span></div><div class="formula-row"><span class="formula-lhs">Difference</span><span class="formula-eq">=</span><span class="formula-rhs">rounded, (-current date + farrowing date)</span></div><div class="formula-row"><span class="formula-lhs">Negative differenceerenceerence</span><span class="formula-eq">=</span><span class="formula-rhs">rounded, (-rounded, (-current date + farrowing date))</span></div><div class="formula-row"><span class="formula-lhs">Pregnancy day</span><span class="formula-eq">=</span><span class="formula-rhs">rounded, (current date − breeding date)</span></div><div class="formula-row"><span class="formula-lhs">Earliest due</span><span class="formula-eq">=</span><span class="formula-rhs">breeding date + 112</span></div><div class="formula-row"><span class="formula-lhs">Latest due</span><span class="formula-eq">=</span><span class="formula-rhs">breeding date + 120</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A calendar date.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A calendar date.</li><li>A calendar date.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Swine gestation calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Comparing two organisms, populations or processes</li><li>Supporting a lesson, a lecture or a field note</li><li>Putting a biological quantity into a scale you can picture</li><li>Any time the same 2 figures keep coming back — the breeding date and the current date — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li><li>Round only at the end. </li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li>Dates are compared date to date in your own time zone, so a daylight-saving change will not shift the count by a day.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Swine gestation calculator, these are the ones that matter:</p>
            <ul><li>Dates are handled as whole calendar days in the time zone of the browser, so a birth date or a deadline is compared date to date rather than as a span of hours.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'How do you check the answer yourself?', 'html' => <<<'TXT'
            <ul><li>Change one input at a time — breeding date for instance — and watch which results move. A result that stays put does not depend on it.</li><li>Try a round value you can work out in your head. If the answer matches your mental arithmetic, the inputs are on the scale you assumed.</li><li>Re-enter the same figure and confirm the result is stable; a number that moves when you press Calculate again is a sign that a field is still empty.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/the-cost-of-owning-a-dog">Cost of owning a dog</a>, <a href="/biology/tramadol-for-dogs">Tramadol for dogs</a> and <a href="/biology/tree-age">Tree age</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Swine gestation calculator work out?', 'a' => <<<'TXT'
            It returns farrowing date, derived from the breeding date and the current date. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Swine gestation calculator?', 'a' => <<<'TXT'
            The form asks for the breeding date and the current date, which is 2 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'Is the Swine gestation calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — press Calculate and every result updates together.
            TXT],
            ['q' => 'Why is the answer different from the one in my protocol?', 'a' => <<<'TXT'
            Nearly always a unit or a rounding difference. The calculator works in the units printed next to each box, keeps full precision internally and only rounds for display, so recomputing from the rounded numbers on screen can differ in the last digit.
            TXT],
        ],
        'related' => [
            ['path' => '/biology/the-cost-of-owning-a-dog', 'name' => 'Cost of owning a dog'],
            ['path' => '/biology/tramadol-for-dogs', 'name' => 'Tramadol for dogs'],
            ['path' => '/biology/tree-age', 'name' => 'Tree age'],
        ],
    ],
];
