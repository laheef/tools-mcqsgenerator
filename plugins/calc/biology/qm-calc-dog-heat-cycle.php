<?php

/**
 * Dog heat cycle
 * /biology/dog-heat-cycle
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dog heat cycle',
    'meta' => ['title' => 'Dog heat cycle Calculator — Formula & Results', 'description' => 'The answer is what the Dog heat cycle calculator works out, and it gets there from the first day of the cycle, the eight months, the eighteen days and the…', 'h1' => 'Dog heat cycle Calculator', 'updated' => '2026-08-19'],
    'raw' => [
        'vars' => [
            'cycle1' => ['type' => 'date', 'rnd' => null],
            'cycle2' => ['type' => 'date', 'rnd' => null],
            'eightMonths' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '244', 'c' => null],
                ],
            ],
            'eighteenDays' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '18', 'c' => null],
                ],
            ],
            'enter_heat_cycle' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => '4MhaGP2DO5L_md8W9hnsI', 'c' => null],
                ],
                'ds' => 'w-uJoHUW7pkKMDdhWSRDo',
            ],
            'firstDay' => ['type' => 'date', 'rnd' => null],
            'fiveMonths' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '152', 'c' => null],
                ],
            ],
            'length' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'SmJOM4KUfVLcxoCn9xv7x', 'c' => null],
                ],
                'ds' => 'I3GbN75PmyXFrKKeXiUNm',
            ],
            'length_value' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'nextCycle1' => ['type' => 'date', 'rnd' => null],
            'nextCycle2' => ['type' => 'date', 'rnd' => null],
            'nextCycle3' => ['type' => 'date', 'rnd' => null],
            'twentyoneDays' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '21', 'c' => null],
                ],
            ],
        ],
        'groups' => [
            [
                'uid' => 'SZR7P1BlbCRYxkGwCczJL',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'x',
                                    'c' => [
                                        [null, '✨ Skip the math: create, edit, and save custom calculators ➔ instantly just by typing what you need.'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'firstDay', 'vt' => 'date', 'l' => 'First day of the cycle'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'enter_heat_cycle',
                                    'vt' => 'valueSelect',
                                    'l' => '',
                                    'ds' => 'w-uJoHUW7pkKMDdhWSRDo',
                                    'opts' => [
                                        ['kwpww5FxEm32wPYMeZvhS', 'Enter your dog\'s heat cycle length (if you know it)', '1'],
                                        ['4MhaGP2DO5L_md8W9hnsI', '', '0'],
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
                                    'n' => 'length',
                                    'vt' => 'valueSelect',
                                    'l' => 'Heat cycle length',
                                    'suf' => 'months',
                                    'ds' => 'I3GbN75PmyXFrKKeXiUNm',
                                    'opts' => [
                                        ['CK4OvRewrE2EcPUlijkYf', '4', '4'],
                                        ['pu_8vY4dOd3i6pAglybI6', '5', '5'],
                                        ['SmJOM4KUfVLcxoCn9xv7x', '6', '6'],
                                        ['ys3PuofM1WOXiN10XhfA9', '7', '7'],
                                        ['TSdrM1ZTgE0lWrj63Z-2m', '8', '8'],
                                        ['SGJLaHMs-CSmjakFiI3oz', '9', '9'],
                                        ['w5UF41W4wrNGcXsXm6Y3k', '10', '10'],
                                        ['BIa3HsO8V9JryI8VY5ZYI', '11', '11'],
                                        ['qgvzojXHcO2ttD0i84zen', '12', '12'],
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
                                        [null, '📅 Your dog\'s cycle will last up to {{cycle1.shortValue}} - {{cycle2.shortValue}}.'],
                                        ['enter_heat_cycle==0', '📅 You can expect the next heat cycle between {{nextCycle1.shortValue}} and {{nextCycle2.shortValue}}.&nbsp;'],
                                        ['enter_heat_cycle==1', '📅 You can expect the next heat on {{nextCycle3.shortValue}}.'],
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
                                        [null, '💡 Dogs of small breeds might go into heat more often (even every four months), while dogs of giant breeds - less frequently (e.g., once per year).'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'Nks1LHjtP3XnDgvaLipHy',
                'title' => 'Hidden variables',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'cycle1', 'vt' => 'date', 'l' => 'Cycle1'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'cycle2', 'vt' => 'date', 'l' => 'Cycle2'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'eightMonths',
                                    'vt' => 'numerical',
                                    'l' => 'Eight months',
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
                                    'n' => 'eighteenDays',
                                    'vt' => 'numerical',
                                    'l' => 'Eighteen days',
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
                                    'n' => 'fiveMonths',
                                    'vt' => 'numerical',
                                    'l' => 'Five months',
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
                                    'n' => 'twentyoneDays',
                                    'vt' => 'numerical',
                                    'l' => 'Twentyone days',
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
                                ['t' => 'v', 'n' => 'nextCycle1', 'vt' => 'date', 'l' => 'Next cycle1'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'nextCycle2', 'vt' => 'date', 'l' => 'Next cycle2'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'nextCycle3', 'vt' => 'date', 'l' => 'Next cycle3'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'length_value', 'vt' => 'dependent', 'l' => 'Length value'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'cycle1=one_way(firstDay+eighteenDays)',
                'var' => [
                    [
                        'l' => 'cycle1',
                        'f' => '(eighteenDays + firstDay)',
                        'r' => ['eighteenDays', 'firstDay'],
                    ],
                ],
            ],
            [
                'formula' => 'cycle2 = one_way(firstDay+twentyoneDays)',
                'var' => [
                    [
                        'l' => 'cycle2',
                        'f' => '(firstDay + twentyoneDays)',
                        'r' => ['firstDay', 'twentyoneDays'],
                    ],
                ],
            ],
            [
                'formula' => 'nextCycle1 = one_way(firstDay+fiveMonths)',
                'var' => [
                    [
                        'l' => 'nextCycle1',
                        'f' => '(firstDay + fiveMonths)',
                        'r' => ['firstDay', 'fiveMonths'],
                    ],
                ],
            ],
            [
                'formula' => 'nextCycle2 = one_way(firstDay+eightMonths)',
                'var' => [
                    [
                        'l' => 'nextCycle2',
                        'f' => '(eightMonths + firstDay)',
                        'r' => ['eightMonths', 'firstDay'],
                    ],
                ],
            ],
            [
                'formula' => 'nextCycle3= one_way(firstDay+round(length_value*30.44)*86400000)',
                'var' => [
                    [
                        'l' => 'nextCycle3',
                        'f' => '(firstDay + 86400000*round((761/25)*length_value))',
                        'r' => ['firstDay', 'length_value'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'I3GbN75PmyXFrKKeXiUNm' => [
                'name' => 'Length',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'CK4OvRewrE2EcPUlijkYf', 'label' => '4', 'value' => '4'],
                    ['uid' => 'pu_8vY4dOd3i6pAglybI6', 'label' => '5', 'value' => '5'],
                    ['uid' => 'SmJOM4KUfVLcxoCn9xv7x', 'label' => '6', 'value' => '6'],
                    ['uid' => 'ys3PuofM1WOXiN10XhfA9', 'label' => '7', 'value' => '7'],
                    ['uid' => 'TSdrM1ZTgE0lWrj63Z-2m', 'label' => '8', 'value' => '8'],
                    ['uid' => 'SGJLaHMs-CSmjakFiI3oz', 'label' => '9', 'value' => '9'],
                    ['uid' => 'w5UF41W4wrNGcXsXm6Y3k', 'label' => '10', 'value' => '10'],
                    ['uid' => 'BIa3HsO8V9JryI8VY5ZYI', 'label' => '11', 'value' => '11'],
                    ['uid' => 'qgvzojXHcO2ttD0i84zen', 'label' => '12', 'value' => '12'],
                ],
            ],
            'w-uJoHUW7pkKMDdhWSRDo' => [
                'name' => 'Choose heat cycle length',
                'uiType' => 'CHECKBOX',
                'options' => [
                    ['uid' => 'kwpww5FxEm32wPYMeZvhS', 'label' => 'Enter your dog\'s heat cycle length (if you know it)', 'value' => '1'],
                    ['uid' => '4MhaGP2DO5L_md8W9hnsI', 'label' => '', 'value' => '0'],
                ],
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        The answer is what the Dog heat cycle calculator works out, and it gets there from the first day of the cycle, the eight months, the eighteen days and the five months.
        TXT,
        'sections' => [
            ['title' => 'How does the Dog heat cycle calculator work?', 'html' => <<<'TXT'
            <p>The Dog heat cycle calculator takes the values in the form, applies the relationships described below and reports every result it can derive from them.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the heat cycle length); then you give the first day of the cycle; then you type in the eight months, the eighteen days, the five months and the twentyone days.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>A calendar date. </li><li>A single on/off switch — tick it for &ldquo;Enter your dog's heat cycle length (if you know it)&rdquo;, leave it clear for the other case. It changes which relationship the calculator applies, not just a multiplier.</li><li>Pick the option that matches your case — 9 options, such as 4, 5 and 6. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>A measured quantity, entered by default in days. </li><li>A measured quantity, entered by default in days. </li><li>A measured quantity, entered by default in days. </li><li>A measured quantity, entered by default in days. </li></ul><p>2 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>First day of the cycle</strong></td><td>A calendar date.</td><td>date</td><td>You supply it</td></tr><tr><td><strong>Heat cycle length</strong></td><td>One of 9 options, such as 4, 5 and 6.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Eight months</strong></td><td>A measured quantity, 27 units available.</td><td>days</td><td>You supply it</td></tr><tr><td><strong>Eighteen days</strong></td><td>A measured quantity, 27 units available.</td><td>days</td><td>You supply it</td></tr><tr><td><strong>Five months</strong></td><td>A measured quantity, 27 units available.</td><td>days</td><td>You supply it</td></tr><tr><td><strong>Twentyone days</strong></td><td>A measured quantity, 27 units available.</td><td>days</td><td>You supply it</td></tr><tr><td><strong>Next cycle 1</strong></td><td>A calendar date.</td><td>date</td><td>Calculated</td></tr><tr><td><strong>Next cycle 2</strong></td><td>A calendar date.</td><td>date</td><td>Calculated</td></tr><tr><td><strong>Next cycle 3</strong></td><td>A calendar date.</td><td>date</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Dog heat cycle calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Cycle 1</span><span class="formula-eq">=</span><span class="formula-rhs">(eighteen days + first day of the cycle)</span></div><div class="formula-row"><span class="formula-lhs">Cycle 2</span><span class="formula-eq">=</span><span class="formula-rhs">(first day of the cycle + twentyone days)</span></div><div class="formula-row"><span class="formula-lhs">Next cycle 1</span><span class="formula-eq">=</span><span class="formula-rhs">(first day of the cycle + five months)</span></div><div class="formula-row"><span class="formula-lhs">Next cycle 2</span><span class="formula-eq">=</span><span class="formula-rhs">(eight months + first day of the cycle)</span></div><div class="formula-row"><span class="formula-lhs">Next cycle 3</span><span class="formula-eq">=</span><span class="formula-rhs">(first day of the cycle + 86400000 × rounded, ((761 ÷ 25) × length value))</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A calendar date.</li><li>A calendar date.</li><li>A calendar date.</li><li>A calendar date.</li><li>A calendar date.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Time, opening in days</li><li>Time, opening in days</li><li>Time, opening in days</li><li>Time, opening in days</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Dog heat cycle calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Comparing two organisms, populations or processes</li><li>Supporting a lesson, a lecture or a field note</li><li>Putting a biological quantity into a scale you can picture</li><li>Any time the same 4 figures keep coming back — the first day of the cycle, the eight months and the eighteen days — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li><li>Keep the units you enter consistent. </li><li>Round only at the end. </li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Dates are compared date to date in your own time zone, so a daylight-saving change will not shift the count by a day.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/dog-life-expectancy">Dog life expectancy</a>, <a href="/biology/dog-metacam">Dog Metacam dosage</a> and <a href="/biology/dog-onion-toxicity">Dog onion toxicity</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What do I need to enter to use the Dog heat cycle calculator?', 'a' => <<<'TXT'
            The form asks for the first day of the cycle, the eight months, the eighteen days and the five months, which is 7 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter eight months in a different unit?', 'a' => <<<'TXT'
            Yes. Eight months opens in days and the chip beside it offers 27 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There are several choices to make (2 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'Is the Dog heat cycle calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — press Calculate and every result updates together.
            TXT],
            ['q' => 'Why is the answer different from the one in my protocol?', 'a' => <<<'TXT'
            Nearly always a unit or a rounding difference. The calculator works in the units printed next to each box, keeps full precision internally and only rounds for display, so recomputing from the rounded numbers on screen can differ in the last digit.
            TXT],
        ],
        'related' => [
            ['path' => '/biology/dog-life-expectancy', 'name' => 'Dog life expectancy'],
            ['path' => '/biology/dog-metacam', 'name' => 'Dog Metacam dosage'],
            ['path' => '/biology/dog-onion-toxicity', 'name' => 'Dog onion toxicity'],
        ],
    ],
];
