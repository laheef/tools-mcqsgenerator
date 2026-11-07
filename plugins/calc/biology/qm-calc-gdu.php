<?php

/**
 * GDU (growing degree units)
 * /biology/gdu
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'GDU (growing degree units)',
    'meta' => ['title' => 'GDU (growing degree units) — Formula & Results', 'description' => 'Give the GDU (growing degree units) calculator the maximum growing temperature for crop and the base temperature and it returns <strong>growing degree units…', 'h1' => 'GDU (growing degree units) Calculator', 'updated' => '2026-08-12'],
    'raw' => [
        'vars' => [
            'base_temp' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '10', 'c' => null],
                ],
            ],
            'base_temp_f' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '50', 'c' => null],
                ],
            ],
            'gdu' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'gdu_f' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'max_crop_temp' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '30', 'c' => null],
                ],
            ],
            'max_crop_temp_f' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '86', 'c' => null],
                ],
            ],
            'max_temp' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'max_temp_f' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'min_temp' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'min_temp_f' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'temp_unit' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'BRcKqLQ6G32GI0q9eXgXZ', 'c' => null],
                    ['v' => 'htrN5K5xfwHTqz_YdDI3N', 'c' => 'userUsesImperialUnits()'],
                ],
                'ds' => '1ablvJg37Q8wFXmG0w4Gy',
            ],
        ],
        'groups' => [
            [
                'uid' => '2aCsGlh8a2vNCo_FJ-JXY',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'temp_unit',
                                    'vt' => 'valueSelect',
                                    'l' => 'Which temperature unit will you be using?',
                                    'ds' => '1ablvJg37Q8wFXmG0w4Gy',
                                    'opts' => [
                                        ['BRcKqLQ6G32GI0q9eXgXZ', 'Celsius', '0'],
                                        ['htrN5K5xfwHTqz_YdDI3N', 'Fahrenheit', '1'],
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
                                    'n' => 'max_crop_temp',
                                    'vt' => 'numerical',
                                    'l' => 'Maximum growing temperature for crop',
                                    'us' => '40',
                                    'du' => 'C',
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
                                    'n' => 'base_temp',
                                    'vt' => 'numerical',
                                    'l' => 'Base temperature',
                                    'h' => 'Minimum growing temperature for crop.',
                                    'us' => '40',
                                    'du' => 'C',
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
                                    'n' => 'max_temp',
                                    'vt' => 'numerical',
                                    'l' => 'Daily maximum temperature',
                                    'us' => '40',
                                    'du' => 'C',
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
                                    'n' => 'min_temp',
                                    'vt' => 'numerical',
                                    'l' => 'Daily minimum temperature',
                                    'us' => '40',
                                    'du' => 'C',
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
                                    'n' => 'gdu',
                                    'vt' => 'numerical',
                                    'l' => 'Growing degree units (GDU)',
                                    'us' => '40',
                                    'du' => 'C',
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
                                    'n' => 'max_crop_temp_f',
                                    'vt' => 'numerical',
                                    'l' => 'Maximum growing temperature for crop',
                                    'us' => '40',
                                    'du' => 'F',
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
                                    'n' => 'base_temp_f',
                                    'vt' => 'numerical',
                                    'l' => 'Base temperature',
                                    'h' => 'Minimum growing temperature for crop.',
                                    'us' => '40',
                                    'du' => 'F',
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
                                    'n' => 'max_temp_f',
                                    'vt' => 'numerical',
                                    'l' => 'Daily maximum temperature',
                                    'us' => '40',
                                    'du' => 'F',
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
                                    'n' => 'min_temp_f',
                                    'vt' => 'numerical',
                                    'l' => 'Daily minimum temperature',
                                    'us' => '40',
                                    'du' => 'F',
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
                                    'n' => 'gdu_f',
                                    'vt' => 'numerical',
                                    'l' => 'Growing degree units (GDU)',
                                    'us' => '40',
                                    'du' => 'F',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'gdu = (min(max_temp, max_crop_temp) + max(min_temp, base_temp)) / 2 - base_temp',
                'var' => [
                    [
                        'l' => 'gdu',
                        'f' => '-base_temp + (1/2)*max(base_temp, min_temp) + (1/2)*min(max_crop_temp, max_temp)',
                        'r' => ['base_temp', 'max_crop_temp', 'max_temp', 'min_temp'],
                    ],
                ],
            ],
            [
                'formula' => 'gdu_f = (min(max_temp_f, max_crop_temp_f) + max(min_temp_f, base_temp_f)) / 2 - base_temp_f ',
                'var' => [
                    [
                        'l' => 'gdu_f',
                        'f' => '-base_temp_f + (1/2)*max(base_temp_f, min_temp_f) + (1/2)*min(max_crop_temp_f, max_temp_f)',
                        'r' => ['base_temp_f', 'max_crop_temp_f', 'max_temp_f', 'min_temp_f'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            '1ablvJg37Q8wFXmG0w4Gy' => [
                'name' => 'temp_unit',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'BRcKqLQ6G32GI0q9eXgXZ', 'label' => 'Celsius', 'value' => '0'],
                    ['uid' => 'htrN5K5xfwHTqz_YdDI3N', 'label' => 'Fahrenheit', 'value' => '1'],
                ],
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Give the GDU (growing degree units) calculator the maximum growing temperature for crop and the base temperature and it returns <strong>growing degree units (GDU)</strong>.
        TXT,
        'sections' => [
            ['title' => 'How does the GDU (growing degree units) calculator work?', 'html' => <<<'TXT'
            <p>The GDU (growing degree units) calculator takes the values in the form, applies the relationship described below and reports <strong>growing degree units (GDU)</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (which temperature unit will you be using?); then you type in the maximum growing temperature for crop, the base temperature, the daily maximum temperature and the daily minimum temperature.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 2 options, such as celsius and fahrenheit. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>A measured quantity, entered by default in Celsius. The unit chip switches it to any of the 28 supported units.</li><li>A measured quantity, entered by default in Celsius. The unit chip switches it to any of the 28 supported units.</li><li>A measured quantity, entered by default in Celsius. The unit chip switches it to any of the 28 supported units.</li><li>A measured quantity, entered by default in Celsius. The unit chip switches it to any of the 28 supported units.</li><li>A measured quantity, entered by default in Fahrenheit. The unit chip switches it to any of the 28 supported units.</li><li>A measured quantity, entered by default in Fahrenheit. The unit chip switches it to any of the 28 supported units.</li><li>A measured quantity, entered by default in Fahrenheit. The unit chip switches it to any of the 28 supported units.</li><li>A measured quantity, entered by default in Fahrenheit. The unit chip switches it to any of the 28 supported units.</li></ul><p>One field on this form is a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Which temperature unit will you be using?</strong></td><td>One of 2 options, such as celsius and fahrenheit.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Maximum growing temperature for crop</strong></td><td>A measured quantity, 28 units available.</td><td>Celsius</td><td>You supply it</td></tr><tr><td><strong>Base temperature</strong></td><td>A measured quantity, 28 units available.</td><td>Celsius</td><td>You supply it</td></tr><tr><td><strong>Daily maximum temperature</strong></td><td>A measured quantity, 28 units available.</td><td>Celsius</td><td>You supply it</td></tr><tr><td><strong>Daily minimum temperature</strong></td><td>A measured quantity, 28 units available.</td><td>Celsius</td><td>You supply it</td></tr><tr><td><strong>Growing degree units (GDU)</strong></td><td>A measured quantity, 28 units available.</td><td>Celsius</td><td>Calculated</td></tr><tr><td><strong>Maximum growing temperature for crop (2)</strong></td><td>A measured quantity, 28 units available.</td><td>Fahrenheit</td><td>You supply it</td></tr><tr><td><strong>Base temperature (2)</strong></td><td>A measured quantity, 28 units available.</td><td>Fahrenheit</td><td>You supply it</td></tr><tr><td><strong>Daily maximum temperature (2)</strong></td><td>A measured quantity, 28 units available.</td><td>Fahrenheit</td><td>You supply it</td></tr><tr><td><strong>Daily minimum temperature (2)</strong></td><td>A measured quantity, 28 units available.</td><td>Fahrenheit</td><td>You supply it</td></tr><tr><td><strong>Growing degree units (GDU) (2)</strong></td><td>A measured quantity, 28 units available.</td><td>Fahrenheit</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the GDU (growing degree units) calculator', 'html' => <<<'TXT'
            <p>One relationship drives the whole page:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Growing degree units (GDU)</span><span class="formula-eq">=</span><span class="formula-rhs">-base temperature + (1 ÷ 2) × the larger of (base temperature, daily minimum temperature) + (1 ÷ 2) × the smaller of (maximum growing temperature for crop, daily maximum temperature)</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in Celsius, and convertible to any of the 28 units on that chip.</li><li>Shown in Fahrenheit, and convertible to any of the 28 units on that chip.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Temperature, opening in Celsius</li><li>Temperature, opening in Celsius</li><li>Temperature, opening in Celsius</li><li>Temperature, opening in Celsius</li><li>Temperature, opening in Celsius</li><li>Temperature, opening in Fahrenheit</li><li>Temperature, opening in Fahrenheit</li><li>Temperature, opening in Fahrenheit</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The GDU (growing degree units) calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Supporting a lesson, a lecture or a field note</li><li>Comparing two organisms, populations or processes</li><li>Putting a biological quantity into a scale you can picture</li><li>Any time the same 2 figures keep coming back — the maximum growing temperature for crop and the base temperature — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li><li>Write the answer down with its unit. </li><li>Round only at the end. </li><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/goat-gestation">Goat gestation</a>, <a href="/biology/grain-bin">Grain bin</a> and <a href="/biology/grain-conversion">Grain conversion</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the GDU (growing degree units) calculator work out?', 'a' => <<<'TXT'
            It returns growing degree units (GDU), derived from the maximum growing temperature for crop and the base temperature. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the GDU (growing degree units) calculator?', 'a' => <<<'TXT'
            The form asks for the maximum growing temperature for crop and the base temperature, which is 9 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter maximum growing temperature for crop in a different unit?', 'a' => <<<'TXT'
            Yes. Maximum growing temperature for crop opens in Celsius and the chip beside it offers 28 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There is one choice to make (1 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'Is the GDU (growing degree units) calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — press Calculate and every result updates together.
            TXT],
        ],
        'related' => [
            ['path' => '/biology/goat-gestation', 'name' => 'Goat gestation'],
            ['path' => '/biology/grain-bin', 'name' => 'Grain bin'],
            ['path' => '/biology/grain-conversion', 'name' => 'Grain conversion'],
        ],
    ],
];
