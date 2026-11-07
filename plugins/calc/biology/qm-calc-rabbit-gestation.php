<?php

/**
 * Rabbit gestation
 * /biology/rabbit-gestation
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Rabbit gestation',
    'meta' => ['title' => 'Rabbit gestation — Formula, Steps & Examples', 'description' => <<<'TXT'
    Give the Rabbit gestation calculator the conception date and the birth date and it returns <strong>rabbit Type</strong>. The Rabbit gestation calculator takes…
    TXT, 'h1' => 'Rabbit gestation Calculator', 'updated' => '2026-08-06'],
    'raw' => [
        'vars' => [
            'estimatedDateOfConception' => ['type' => 'date', 'rnd' => null],
            'expectedBirthDate' => ['type' => 'date', 'rnd' => null],
            'nestBox' => ['type' => 'date', 'rnd' => null],
            'palpateTheRabbit' => ['type' => 'date', 'rnd' => null],
            'typeOfRabbit' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'R0gLTk8hjProB_JPGWN9j', 'c' => null],
                ],
                'ds' => '7tz9GkYgmRCjsSeP-8irZ',
            ],
        ],
        'groups' => [
            [
                'uid' => 'gPWsjlhfCRfTh1ZA3ED8N',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'typeOfRabbit',
                                    'vt' => 'valueSelect',
                                    'l' => 'Rabbit Type',
                                    'ds' => '7tz9GkYgmRCjsSeP-8irZ',
                                    'opts' => [
                                        ['95ctlj1tmNtyxbQjHS4qC', 'Desert Cottontail & New England Cottontail', '28'],
                                        ['S9hprgzAQC09-ui6vywgh', 'European Rabbit, Flemish Giant, Chinchilla', '28.000000000000000001'],
                                        ['3NRt1YiM8XP8d-uQSX-oc', 'New Zealand White, French Lop', '28.000000000000001'],
                                        ['nFiTmb-_t09-VNaSFe-91', 'Harlequin Rabbit', '29'],
                                        ['_4JvKYyUqs7bzgChsR4kU', 'California white, American Rabbit', '31'],
                                        ['xN6qq9QPKOOO1BHXSgnP-', 'Blanc de Hotot, Belgian Hare Rabbit', '30'],
                                        ['l1bxpPBE4wKCH39TcwD81', 'Mexican Cottontail & Dice, Dwarf Rabbits', '30.0000000000000001'],
                                        ['R0gLTk8hjProB_JPGWN9j', 'Tapeti', '42'],
                                        ['Jf9RMVDoIdObb3rWc6mmQ', 'Swamp rabbit, Eastern Cottontail & Brush rabbits', '27'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'estimatedDateOfConception', 'vt' => 'date', 'l' => 'Conception date'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'palpateTheRabbit',
                                    'vt' => 'date',
                                    'l' => 'Palpate rabbit',
                                    'h' => 'This is the best day to palpate the rabbit (check for baby rabbits). However, this may be done as early as the 11th day and no later than the 14th day.',
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
                                    'n' => 'nestBox',
                                    'vt' => 'date',
                                    'l' => 'Nest box',
                                    'h' => 'This is the best day to add the nest box. Try not to add this too early, to avoid a mess. It is best to add this 2 days before the expected birth date.',
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
                                    'n' => 'expectedBirthDate',
                                    'vt' => 'date',
                                    'l' => 'Birth date',
                                    'h' => 'The birth should occur no later than two days after the date shown here or there is a good chance of a stillbirth.',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'estimatedDateOfConception + typeOfRabbit=expectedBirthDate',
                'var' => [
                    [
                        'l' => 'typeOfRabbit',
                        'f' => '-estimatedDateOfConception + expectedBirthDate',
                        'r' => ['estimatedDateOfConception', 'expectedBirthDate'],
                    ],
                    [
                        'l' => 'estimatedDateOfConception',
                        'f' => 'expectedBirthDate - typeOfRabbit',
                        'r' => ['typeOfRabbit', 'expectedBirthDate'],
                    ],
                    [
                        'l' => 'expectedBirthDate',
                        'f' => 'estimatedDateOfConception + typeOfRabbit',
                        'r' => ['typeOfRabbit', 'estimatedDateOfConception'],
                    ],
                ],
            ],
            [
                'formula' => 'estimatedDateOfConception + 12=palpateTheRabbit',
                'var' => [
                    [
                        'l' => 'palpateTheRabbit',
                        'f' => 'estimatedDateOfConception + 12',
                        'r' => ['estimatedDateOfConception'],
                    ],
                    [
                        'l' => 'estimatedDateOfConception',
                        'f' => 'palpateTheRabbit - 12',
                        'r' => ['palpateTheRabbit'],
                    ],
                ],
            ],
            [
                'formula' => 'expectedBirthDate - 2 =nestBox',
                'var' => [
                    [
                        'l' => 'nestBox',
                        'f' => 'expectedBirthDate - 2',
                        'r' => ['expectedBirthDate'],
                    ],
                    [
                        'l' => 'expectedBirthDate',
                        'f' => 'nestBox + 2',
                        'r' => ['nestBox'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            '7tz9GkYgmRCjsSeP-8irZ' => [
                'name' => 'Type of Rabbit',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => '95ctlj1tmNtyxbQjHS4qC', 'label' => 'Desert Cottontail & New England Cottontail', 'value' => '28'],
                    ['uid' => 'S9hprgzAQC09-ui6vywgh', 'label' => 'European Rabbit, Flemish Giant, Chinchilla', 'value' => '28.000000000000000001'],
                    ['uid' => '3NRt1YiM8XP8d-uQSX-oc', 'label' => 'New Zealand White, French Lop', 'value' => '28.000000000000001'],
                    ['uid' => 'nFiTmb-_t09-VNaSFe-91', 'label' => 'Harlequin Rabbit', 'value' => '29'],
                    ['uid' => '_4JvKYyUqs7bzgChsR4kU', 'label' => 'California white, American Rabbit', 'value' => '31'],
                    ['uid' => 'xN6qq9QPKOOO1BHXSgnP-', 'label' => 'Blanc de Hotot, Belgian Hare Rabbit', 'value' => '30'],
                    ['uid' => 'l1bxpPBE4wKCH39TcwD81', 'label' => 'Mexican Cottontail & Dice, Dwarf Rabbits', 'value' => '30.0000000000000001'],
                    ['uid' => 'R0gLTk8hjProB_JPGWN9j', 'label' => 'Tapeti', 'value' => '42'],
                    ['uid' => 'Jf9RMVDoIdObb3rWc6mmQ', 'label' => 'Swamp rabbit, Eastern Cottontail & Brush rabbits', 'value' => '27'],
                ],
            ],
        ],
    ],
    'article' => [
        'intro' => 'Give the Rabbit gestation calculator the conception date and the birth date and it returns <strong>rabbit Type</strong>.',
        'sections' => [
            ['title' => 'How does the Rabbit gestation calculator work?', 'html' => <<<'TXT'
            <p>The Rabbit gestation calculator takes the values in the form, applies the relationship described below and reports <strong>rabbit Type</strong> in the results panel.</p>
            <p>Working from the top of the form: you give the conception date and the birth date.</p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Rabbit Type</strong></td><td>One of 9 options, such as desert Cottontail & New England Cottontail, european Rabbit, Flemish Giant, Chinchilla and new Zealand White, French Lop.</td><td>choice</td><td>Calculated</td></tr><tr><td><strong>Conception date</strong></td><td>A calendar date.</td><td>date</td><td>You supply it</td></tr><tr><td><strong>Palpate rabbit</strong></td><td>A calendar date.</td><td>date</td><td>Calculated</td></tr><tr><td><strong>Nest box</strong></td><td>A calendar date.</td><td>date</td><td>Calculated</td></tr><tr><td><strong>Birth date</strong></td><td>A calendar date.</td><td>date</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Rabbit gestation calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Rabbit Type</span><span class="formula-eq">=</span><span class="formula-rhs">-conception date + birth date</span></div><div class="formula-row"><span class="formula-lhs">Palpate rabbit</span><span class="formula-eq">=</span><span class="formula-rhs">conception date + 12</span></div><div class="formula-row"><span class="formula-lhs">Nest box</span><span class="formula-eq">=</span><span class="formula-rhs">birth date − 2</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>The option the calculation settles on.</li><li>A calendar date.</li><li>A calendar date.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Rabbit gestation calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Supporting a lesson, a lecture or a field note</li><li>Comparing two organisms, populations or processes</li><li>Putting a biological quantity into a scale you can picture</li><li>Any time the same 2 figures keep coming back — the conception date and the birth date — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li><li>Round only at the end. </li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Dates are compared date to date in your own time zone, so a daylight-saving change will not shift the count by a day.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Rabbit gestation calculator, these are the ones that matter:</p>
            <ul><li>The 1 drop-down on this page offers a fixed list of cases. A value that is not on the list cannot be entered, and the nearest option is not always a good substitute.</li><li>Dates are handled as whole calendar days in the time zone of the browser, so a birth date or a deadline is compared date to date rather than as a span of hours.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'How do you check the answer yourself?', 'html' => <<<'TXT'
            <ul><li>Change one input at a time — conception date for instance — and watch which results move. A result that stays put does not depend on it.</li><li>Try a round value you can work out in your head. If the answer matches your mental arithmetic, the inputs are on the scale you assumed.</li><li>Re-enter the same figure and confirm the result is stable; a number that moves when you press Calculate again is a sign that a field is still empty.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/raised-bed-soil">Raised bed soil</a>, <a href="/biology/rat-cage">Rat cage</a> and <a href="/biology/raw-dog-food">Raw dog food</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Rabbit gestation calculator work out?', 'a' => <<<'TXT'
            It returns rabbit Type, derived from the conception date and the birth date. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Rabbit gestation calculator?', 'a' => <<<'TXT'
            The form asks for the conception date and the birth date, which is 2 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There is one choice to make (1 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'Is the Rabbit gestation calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — press Calculate and every result updates together.
            TXT],
        ],
        'related' => [
            ['path' => '/biology/raised-bed-soil', 'name' => 'Raised bed soil'],
            ['path' => '/biology/rat-cage', 'name' => 'Rat cage'],
            ['path' => '/biology/raw-dog-food', 'name' => 'Raw dog food'],
        ],
    ],
];
