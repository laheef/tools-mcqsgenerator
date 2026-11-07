<?php

/**
 * Metacam dosage for cats
 * /biology/metacam-dosage-cat
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Metacam dosage for cats',
    'meta' => ['title' => 'Metacam dosage for cats — Free Online Calculator', 'description' => 'Supply your cat\'s weight and the volume needed and the Metacam dosage for cats calculator solves for <strong>indication</strong>. The Metacam dosage for cats…', 'h1' => 'Metacam dosage for cats Calculator', 'updated' => '2026-08-10'],
    'raw' => [
        'vars' => [
            'dosage' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'drops_needed' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.1'],
            ],
            'indication' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'i9ndlAJtFYR7cOkFJvzsb', 'c' => null],
                ],
                'ds' => 'dD9WeVimz-lXfr6TYdzvf',
            ],
            'later_dosage' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'later_drops' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.1'],
            ],
            'volume_needed' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'weight' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'yblO90NXZ3uekwT7e5cM5',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'weight',
                                    'vt' => 'numerical',
                                    'l' => 'Your cat\'s weight',
                                    'us' => '22',
                                    'du' => 'kg',
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
                                    'n' => 'indication',
                                    'vt' => 'valueSelect',
                                    'l' => 'Indication',
                                    'ds' => 'dD9WeVimz-lXfr6TYdzvf',
                                    'opts' => [
                                        ['i9ndlAJtFYR7cOkFJvzsb', 'Post-operative pain', '0.2001'],
                                        ['1BT8FL17srjSj1aPauUs1', 'Acute musculo-skeletal disorders', '0.2'],
                                        ['3B4MriKDStmdPziCuQ1rn', 'Chronic musculo-skeletal disorders', '0.1'],
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
                                        ['indication == 0.2001', '💉 Before the surgery: use the 2&nbsp;mg/mL solution. 💊 After the surgery: use the 0.5&nbsp;mg/mL solution.&nbsp;'],
                                        ['indication == 0.2', '💉 Entire treatment: use the 0.5&nbsp;mg/mL solution.&nbsp;'],
                                        ['indication == 0.1', '💉 Entire treatment: use the 0.5&nbsp;mg/mL solution.'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'UKQOuWVayVbrzRQWhP4YO',
                'title' => 'First 24 hours',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'dosage',
                                    'vt' => 'numerical',
                                    'l' => 'Dosage for the first 24 hours',
                                    'us' => '22',
                                    'du' => 'mg',
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
                                    'n' => 'volume_needed',
                                    'vt' => 'numerical',
                                    'l' => 'Volume needed',
                                    'us' => '20',
                                    'du' => 'ml',
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
                                    'n' => 'drops_needed',
                                    'vt' => 'numerical',
                                    'l' => 'Drops needed',
                                    'suf' => '#',
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
                                        ['indication == 0.2001', '• Typical dosage: 0.2&nbsp;mg/kg with a 2&nbsp;mg/mL solution. • Single subcutaneous injection.&nbsp;'],
                                        ['indication == 0.2', '• Typical dosage: 0.2&nbsp;mg/kg, orally. • Single oral dose.&nbsp;'],
                                        ['indication == 0.1', '• Typical dosage: 0.1&nbsp;mg/kg, orally. • Single oral dose.'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'RPeAMItgap5nnaSWB2sca',
                'title' => 'Following treatment',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'later_dosage',
                                    'vt' => 'numerical',
                                    'l' => 'Dosage after 24 hours',
                                    'h' => 'Typical treatment for a longer period of time.&nbsp;',
                                    'us' => '22',
                                    'du' => 'mg',
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
                                    'n' => 'later_drops',
                                    'vt' => 'numerical',
                                    'l' => 'Drops needed',
                                    'suf' => '#',
                                    'h' => 'Drops needed for the typical, prolonged treatment.',
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
                                        ['indication == 0.2001', '• Typical dosage: 0.05&nbsp;mg/kg, orally. • 24-hour intervals. • Up to 4&nbsp;days.&nbsp;'],
                                        ['indication == 0.2', '• Typical dosage:0.05&nbsp;mg/kg, orally. • 24-hour intervals. • As long as the acute pain persists.&nbsp;'],
                                        ['indication == 0.1', <<<'TXT'
                                        • Typical dosage: 0.05&nbsp;mg/kg, orally. • 24-hour intervals. • Clinical response should be seen within 7&nbsp;days; discontinue treatment after 14&nbsp;days if no improvement.
                                        TXT],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'weight* indication = dosage',
                'var' => [
                    [
                        'l' => 'indication',
                        'f' => 'dosage/weight',
                        'r' => ['weight', 'dosage'],
                    ],
                    [
                        'l' => 'weight',
                        'f' => 'dosage/indication',
                        'r' => ['indication', 'dosage'],
                    ],
                    [
                        'l' => 'dosage',
                        'f' => 'indication*weight',
                        'r' => ['indication', 'weight'],
                    ],
                ],
            ],
            [
                'formula' => 'dosage * 60 = drops_needed',
                'var' => [
                    [
                        'l' => 'drops_needed',
                        'f' => '60*dosage',
                        'r' => ['dosage'],
                    ],
                    [
                        'l' => 'dosage',
                        'f' => '(1/60)*drops_needed',
                        'r' => ['drops_needed'],
                    ],
                ],
            ],
            [
                'formula' => 'later_dosage = weight * 0.05',
                'var' => [
                    [
                        'l' => 'later_dosage',
                        'f' => '(1/20)*weight',
                        'r' => ['weight'],
                    ],
                    [
                        'l' => 'weight',
                        'f' => '20*later_dosage',
                        'r' => ['later_dosage'],
                    ],
                ],
            ],
            [
                'formula' => 'later_drops = later_dosage * 60',
                'var' => [
                    [
                        'l' => 'later_dosage',
                        'f' => '(1/60)*later_drops',
                        'r' => ['later_drops'],
                    ],
                    [
                        'l' => 'later_drops',
                        'f' => '60*later_dosage',
                        'r' => ['later_dosage'],
                    ],
                ],
            ],
            [
                'formula' => 'volume_needed= dosage/2',
                'var' => [
                    [
                        'l' => 'dosage',
                        'f' => '2*volume_needed',
                        'r' => ['volume_needed'],
                    ],
                    [
                        'l' => 'volume_needed',
                        'f' => '(1/2)*dosage',
                        'r' => ['dosage'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'dD9WeVimz-lXfr6TYdzvf' => [
                'name' => 'indication',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'i9ndlAJtFYR7cOkFJvzsb', 'label' => 'Post-operative pain', 'value' => '0.2001'],
                    ['uid' => '1BT8FL17srjSj1aPauUs1', 'label' => 'Acute musculo-skeletal disorders', 'value' => '0.2'],
                    ['uid' => '3B4MriKDStmdPziCuQ1rn', 'label' => 'Chronic musculo-skeletal disorders', 'value' => '0.1'],
                ],
            ],
        ],
    ],
    'article' => [
        'intro' => 'Supply your cat\'s weight and the volume needed and the Metacam dosage for cats calculator solves for <strong>indication</strong>.',
        'sections' => [
            ['title' => 'How does the Metacam dosage for cats calculator work?', 'html' => <<<'TXT'
            <p>The Metacam dosage for cats calculator takes the values in the form, applies the relationship described below and reports <strong>indication</strong> in the results panel.</p>
            <p>Working from the top of the form: you type in your cat's weight and the volume needed.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>A measured quantity, entered by default in milliliters. The unit chip switches it to any of the 40 supported units.</li></ul><p>One field on this form is a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Your cat's weight</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>You supply it</td></tr><tr><td><strong>Indication</strong></td><td>One of 3 options, such as post-operative pain, acute musculo-skeletal disorders and chronic musculo-skeletal disorders.</td><td>choice</td><td>Calculated</td></tr><tr><td><strong>Dosage for the first 24 hours</strong></td><td>A measured quantity, 29 units available.</td><td>milligrams</td><td>Calculated</td></tr><tr><td><strong>Volume needed</strong></td><td>A measured quantity, 40 units available.</td><td>milliliters</td><td>You supply it</td></tr><tr><td><strong>Drops needed (First 24 hours)</strong></td><td>A number stated in #.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Dosage after 24 hours</strong></td><td>A measured quantity, 29 units available.</td><td>milligrams</td><td>Calculated</td></tr><tr><td><strong>Drops needed (Following treatment)</strong></td><td>A number stated in #.</td><td>—</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Metacam dosage for cats calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Indication</span><span class="formula-eq">=</span><span class="formula-rhs">dosage for the first 24 hours ÷ your cat&#x27;s weight</span></div><div class="formula-row"><span class="formula-lhs">Drops needed</span><span class="formula-eq">=</span><span class="formula-rhs">60 × dosage for the first 24 hours</span></div><div class="formula-row"><span class="formula-lhs">Dosage after 24 hours</span><span class="formula-eq">=</span><span class="formula-rhs">(1 ÷ 20) × your cat&#x27;s weight</span></div><div class="formula-row"><span class="formula-lhs">Dosage after 24 hours</span><span class="formula-eq">=</span><span class="formula-rhs">(1 ÷ 60) × drops needed</span></div><div class="formula-row"><span class="formula-lhs">Dosage for the first 24 hours</span><span class="formula-eq">=</span><span class="formula-rhs">2 × volume needed</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>The option the calculation settles on.</li><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in milligrams, and convertible to any of the 29 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in milligrams, and convertible to any of the 29 units on that chip.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Mass, opening in kilograms</li><li>Mass, opening in milligrams</li><li>Volume, opening in milliliters</li><li>Mass, opening in milligrams</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Metacam dosage for cats calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Putting a biological quantity into a scale you can picture</li><li>Comparing two organisms, populations or processes</li><li>Supporting a lesson, a lecture or a field note</li><li>Any time the same 2 figures keep coming back — your cat's weight and the volume needed — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/mlvss">Mixed liquor volatile suspended solids</a>, <a href="/biology/mowing-cost">Lawn mowing</a> and <a href="/biology/mulch">Mulch</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Metacam dosage for cats calculator work out?', 'a' => <<<'TXT'
            It returns indication, derived from your cat's weight and the volume needed. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Metacam dosage for cats calculator?', 'a' => <<<'TXT'
            The form asks for your cat's weight and the volume needed, which is 2 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter your cat\'s weight in a different unit?', 'a' => <<<'TXT'
            Yes. Your cat's weight opens in kilograms and the chip beside it offers 29 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There is one choice to make (1 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'Is the Metacam dosage for cats calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/mlvss', 'name' => 'Mixed liquor volatile suspended solids'],
            ['path' => '/biology/mowing-cost', 'name' => 'Lawn mowing'],
            ['path' => '/biology/mulch', 'name' => 'Mulch'],
        ],
    ],
];
