<?php

/**
 * Cow gestation
 * /biology/cow-gestation
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cow gestation',
    'meta' => ['title' => 'Cow gestation Calculator — Formula & Results', 'description' => '<strong>calving start</strong> is what the Cow gestation calculator works out, and it gets there from the exposed and the end of postpartum.', 'h1' => 'Cow gestation Calculator', 'updated' => '2026-08-06'],
    'raw' => [
        'vars' => [
            'calvingStart' => ['type' => 'date', 'rnd' => null],
            'endOf' => ['type' => 'date', 'rnd' => null],
            'exposed' => ['type' => 'date', 'rnd' => null],
            'firstCalv' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => '_nrMSe5Nd5jhifyJ6sy2Z', 'c' => null],
                ],
                'ds' => 'dvOcipHocV4XeZFZbUMa-',
            ],
        ],
        'groups' => [
            [
                'uid' => 'zFapwlFezkMC2PONVbOJ1',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'exposed',
                                    'vt' => 'date',
                                    'l' => 'Exposed',
                                    'h' => 'When were the cows first exposed to bulls?',
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
                                    'n' => 'firstCalv',
                                    'vt' => 'valueSelect',
                                    'l' => 'First-time calver?',
                                    'h' => 'Is it the cow\'s first pregnancy?',
                                    'ds' => 'dvOcipHocV4XeZFZbUMa-',
                                    'opts' => [
                                        ['_nrMSe5Nd5jhifyJ6sy2Z', 'No', '0'],
                                        ['R5lVF70A5PUD926eb2zK-', 'Yes', '10'],
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
                                    't' => 'v',
                                    'n' => 'calvingStart',
                                    'vt' => 'date',
                                    'l' => 'Calving start',
                                    'h' => 'When calving should begin.',
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
                                    'n' => 'endOf',
                                    'vt' => 'date',
                                    'l' => 'End of postpartum',
                                    'h' => 'End of the postpartum interval after the calving period.',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'calvingStart = exposed + 283 ',
                'var' => [
                    [
                        'l' => 'calvingStart',
                        'f' => 'exposed + 283',
                        'r' => ['exposed'],
                    ],
                    [
                        'l' => 'exposed',
                        'f' => 'calvingStart - 283',
                        'r' => ['calvingStart'],
                    ],
                ],
            ],
            [
                'formula' => 'endOf = calvingStart + 55 + firstCalv',
                'var' => [
                    [
                        'l' => 'firstCalv',
                        'f' => '-calvingStart + endOf - 55',
                        'r' => ['calvingStart', 'endOf'],
                    ],
                    [
                        'l' => 'calvingStart',
                        'f' => 'endOf - firstCalv - 55',
                        'r' => ['firstCalv', 'endOf'],
                    ],
                    [
                        'l' => 'endOf',
                        'f' => 'calvingStart + firstCalv + 55',
                        'r' => ['firstCalv', 'calvingStart'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'dvOcipHocV4XeZFZbUMa-' => [
                'name' => 'firstCalvers',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => '_nrMSe5Nd5jhifyJ6sy2Z', 'label' => 'No', 'value' => '0'],
                    ['uid' => 'R5lVF70A5PUD926eb2zK-', 'label' => 'Yes', 'value' => '10'],
                ],
            ],
        ],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => '<strong>calving start</strong> is what the Cow gestation calculator works out, and it gets there from the exposed and the end of postpartum.',
        'sections' => [
            ['title' => 'How does the Cow gestation calculator work?', 'html' => <<<'TXT'
            <p>The Cow gestation calculator takes the values in the form, applies the relationship described below and reports <strong>calving start</strong> in the results panel.</p>
            <p>Working from the top of the form: you give the exposed and the end of postpartum.</p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Exposed</strong></td><td>A calendar date.</td><td>date</td><td>You supply it</td></tr><tr><td><strong>First-time calver?</strong></td><td>One of 2 options, such as no and yes.</td><td>choice</td><td>Calculated</td></tr><tr><td><strong>Calving start</strong></td><td>A calendar date.</td><td>date</td><td>Calculated</td></tr><tr><td><strong>End of postpartum</strong></td><td>A calendar date.</td><td>date</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Cow gestation calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Calving start</span><span class="formula-eq">=</span><span class="formula-rhs">exposed + 283</span></div><div class="formula-row"><span class="formula-lhs">First-time calver?</span><span class="formula-eq">=</span><span class="formula-rhs">-calving start + end of postpartum − 55</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A calendar date.</li><li>The option the calculation settles on.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Cow gestation calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Supporting a lesson, a lecture or a field note</li><li>Comparing two organisms, populations or processes</li><li>Putting a biological quantity into a scale you can picture</li><li>Any time the same 2 figures keep coming back — the exposed and the end of postpartum — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li><li>Round only at the end. </li><li>Write the answer down with its unit. </li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Dates are compared date to date in your own time zone, so a daylight-saving change will not shift the count by a day.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Cow gestation calculator, these are the ones that matter:</p>
            <ul><li>The 1 drop-down on this page offers a fixed list of cases. A value that is not on the list cannot be entered, and the nearest option is not always a good substitute.</li><li>Dates are handled as whole calendar days in the time zone of the browser, so a birth date or a deadline is compared date to date rather than as a span of hours.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'How do you check the answer yourself?', 'html' => <<<'TXT'
            <ul><li>Change one input at a time — exposed for instance — and watch which results move. A result that stays put does not depend on it.</li><li>Try a round value you can work out in your head. If the answer matches your mental arithmetic, the inputs are on the scale you assumed.</li><li>Re-enter the same figure and confirm the result is stable; a number that moves when you press Calculate again is a sign that a field is still empty.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/cricket-chirp-thermometer">Crickets chirping thermometer</a>, <a href="/biology/daily-light-integral-dli">Daily light integral (DLI)</a> and <a href="/biology/dihybrid-cross-punnett-square">Dihybrid cross Punnett square</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cow gestation calculator work out?', 'a' => <<<'TXT'
            It returns calving start, derived from the exposed and the end of postpartum. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Cow gestation calculator?', 'a' => <<<'TXT'
            The form asks for the exposed and the end of postpartum, which is 2 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There is one choice to make (1 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'Is the Cow gestation calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — press Calculate and every result updates together.
            TXT],
        ],
        'related' => [
            ['path' => '/biology/cricket-chirp-thermometer', 'name' => 'Crickets chirping thermometer'],
            ['path' => '/biology/daily-light-integral-dli', 'name' => 'Daily light integral (DLI)'],
            ['path' => '/biology/dihybrid-cross-punnett-square', 'name' => 'Dihybrid cross Punnett square'],
        ],
    ],
];
