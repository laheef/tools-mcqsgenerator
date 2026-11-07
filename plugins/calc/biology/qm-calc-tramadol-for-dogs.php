<?php

/**
 * Tramadol for dogs
 * /biology/tramadol-for-dogs
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Tramadol for dogs',
    'meta' => ['title' => 'Tramadol for dogs: Formula, Steps & Results', 'description' => 'The Tramadol for dogs calculator is a free, no-sign-up biology tool. Fill in the field it asks for and it works out <strong>your dog\'s weight</strong>…', 'h1' => 'Tramadol for dogs Calculator', 'updated' => '2026-05-22'],
    'raw' => [
        'vars' => [
            'Maximum_dose_allowed' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
            'Minimum_dose_tablets' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
            'maximum_dose' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
            'minimum_dose' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
            'weight' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'R5NgzIXC2E3ugLPv35SR6',
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
                                    'l' => 'Your dog\'s weight',
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
                                    't' => 'x',
                                    'c' => [
                                        [null, '🐶 Fill in the field above to receive the recommended tramadol dose for your dog.'],
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
                                        [null, '🐶 Recommended dosage: {{minimum_dose.formattedValue}}-{{maximum_dose.formattedValue}} mg. 🐕 Tramadol should be given every 8-12 hours (2-3 times per day).'],
                                        ['minimum_dose >= 49', '⚕️The minimal dosage requires a total of {{Minimum_dose_tablets.formattedValue}} tablets (strength: 50 mg) per day.'],
                                        ['minimum_dose < 49', '&nbsp;'],
                                        [null, '⚠️ Maximum dose allowed: {{Maximum_dose_allowed.formattedValue}} mg/day.'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'U4_6YFGzRBQ3BSnmiVhRC',
                'title' => 'hidden group',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'maximum_dose', 'vt' => 'numerical', 'l' => 'Max dose'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'minimum_dose', 'vt' => 'numerical', 'l' => 'Min dose'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'Maximum_dose_allowed', 'vt' => 'numerical', 'l' => 'Maximum dose allowed'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'Minimum_dose_tablets', 'vt' => 'numerical', 'l' => 'Minimal dose allowed'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'minimum_dose = 0.9 * weight ',
                'var' => [
                    [
                        'l' => 'weight',
                        'f' => '(10/9)*minimum_dose',
                        'r' => ['minimum_dose'],
                    ],
                    [
                        'l' => 'minimum_dose',
                        'f' => '(9/10)*weight',
                        'r' => ['weight'],
                    ],
                ],
            ],
            [
                'formula' => 'maximum_dose = 2.25 * weight',
                'var' => [
                    [
                        'l' => 'weight',
                        'f' => '(4/9)*maximum_dose',
                        'r' => ['maximum_dose'],
                    ],
                    [
                        'l' => 'maximum_dose',
                        'f' => '(9/4)*weight',
                        'r' => ['weight'],
                    ],
                ],
            ],
            [
                'formula' => 'Maximum_dose_allowed = 4.54 * weight',
                'var' => [
                    [
                        'l' => 'weight',
                        'f' => '(50/227)*Maximum_dose_allowed',
                        'r' => ['Maximum_dose_allowed'],
                    ],
                    [
                        'l' => 'Maximum_dose_allowed',
                        'f' => '(227/50)*weight',
                        'r' => ['weight'],
                    ],
                ],
            ],
            [
                'formula' => 'Minimum_dose_tablets = minimum_dose / 25',
                'var' => [
                    [
                        'l' => 'Minimum_dose_tablets',
                        'f' => '(1/25)*minimum_dose',
                        'r' => ['minimum_dose'],
                    ],
                    [
                        'l' => 'minimum_dose',
                        'f' => '25*Minimum_dose_tablets',
                        'r' => ['Minimum_dose_tablets'],
                    ],
                ],
            ],
        ],
        'datasets' => [],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        The Tramadol for dogs calculator is a free, no-sign-up biology tool. Fill in the field it asks for and it works out <strong>your dog's weight</strong> straight away, with the formula shown underneath.
        
         The panel waits for the button. Edit a field, press Calculate, and compare — one input at a time is enough to see what drives the answer.
        TXT,
        'sections' => [
            ['title' => 'How does the Tramadol for dogs calculator work?', 'html' => <<<'TXT'
            <p>The Tramadol for dogs calculator takes the values in the form, applies the relationship described below and reports <strong>your dog's weight</strong> in the results panel.</p>
            <p>Working from the top of the form: you type in the min dose.</p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Your dog's weight</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>Calculated</td></tr><tr><td><strong>Max dose</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Min dose</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Maximum dose allowed</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Minimal dose allowed</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Tramadol for dogs calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Your dog&#x27;s weight</span><span class="formula-eq">=</span><span class="formula-rhs">(10 ÷ 9) × min dose</span></div><div class="formula-row"><span class="formula-lhs">Your dog&#x27;s weight</span><span class="formula-eq">=</span><span class="formula-rhs">(4 ÷ 9) × max dose</span></div><div class="formula-row"><span class="formula-lhs">Your dog&#x27;s weight</span><span class="formula-eq">=</span><span class="formula-rhs">(50 ÷ 227) × maximum dose allowed</span></div><div class="formula-row"><span class="formula-lhs">Minimal dose allowed</span><span class="formula-eq">=</span><span class="formula-rhs">(1 ÷ 25) × min dose</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Mass, opening in kilograms</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Tramadol for dogs calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Comparing two organisms, populations or processes</li><li>Putting a biological quantity into a scale you can picture</li><li>Supporting a lesson, a lecture or a field note</li><li>Any time the same 1 figures keep coming back — the min dose — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li><li>Write the answer down with its unit. </li><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Tramadol for dogs calculator, these are the ones that matter:</p>
            <ul><li>The unit chips cover the units listed on the page. A historical or regional unit that is missing can still be used by converting it to a listed unit first.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'How do you check the answer yourself?', 'html' => <<<'TXT'
            <ul><li>Change one input at a time — min dose for instance — and watch which results move. A result that stays put does not depend on it.</li><li>Try a round value you can work out in your head. If the answer matches your mental arithmetic, the inputs are on the scale you assumed.</li><li>Switch the units to the ones you normally use and confirm the numbers are unchanged apart from their label; if they are not, a chip was on the wrong setting.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/tree-age">Tree age</a>, <a href="/biology/tree-diameter">Tree diameter</a> and <a href="/biology/tree-height">Tree height</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Tramadol for dogs calculator work out?', 'a' => <<<'TXT'
            It returns your dog's weight, derived from the min dose. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Tramadol for dogs calculator?', 'a' => <<<'TXT'
            The form asks for the min dose, which is a single field. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter your dog\'s weight in a different unit?', 'a' => <<<'TXT'
            Yes. Your dog's weight opens in kilograms and the chip beside it offers 29 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'What is a typical result?', 'a' => <<<'TXT'
            With the values the page starts from, the calculator reports Your dog's weight = 11.1111 kg. Treat that as a reference point rather than a recommendation: it exists so you can tell at a glance whether your own inputs are on the same scale.
            TXT],
            ['q' => 'Is the Tramadol for dogs calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/tree-age', 'name' => 'Tree age'],
            ['path' => '/biology/tree-diameter', 'name' => 'Tree diameter'],
            ['path' => '/biology/tree-height', 'name' => 'Tree height'],
        ],
    ],
];
