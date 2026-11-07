<?php

/**
 * Annealing temperature
 * /biology/annealing-temperature
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Annealing temperature',
    'meta' => ['title' => 'Annealing temperature: Formula, Steps & Results', 'description' => 'Give the Annealing temperature calculator the primer melting temperature and the annealing temperature and it returns <strong>target melting…', 'h1' => 'Annealing temperature Calculator', 'updated' => '2026-07-23'],
    'raw' => [
        'vars' => [
            'annealing_temp' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'temp_primer' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'temp_product' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'wIu49XuazM5Q28a1RVIk7',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'temp_primer',
                                    'vt' => 'numerical',
                                    'l' => 'Primer melting temperature',
                                    'h' => 'Consider the less stable primer.',
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
                                    'n' => 'temp_product',
                                    'vt' => 'numerical',
                                    'l' => 'Target melting temperature',
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
                                    'n' => 'annealing_temp',
                                    'vt' => 'numerical',
                                    'l' => 'Annealing temperature (Tₐ)',
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
                                    't' => 'x',
                                    'c' => [
                                        ['annealing_temp>65  or annealing_temp < 50', 'The annealing temperature is out of the suggested range of 50 to 65 °C.'],
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
                'formula' => 'annealing_temp=(0.3*temp_primer)+(0.7*temp_product)-14.9',
                'var' => [
                    [
                        'l' => 'temp_product',
                        'f' => '(10/7)*annealing_temp - 3/7*temp_primer + 149/7',
                        'r' => ['temp_primer', 'annealing_temp'],
                    ],
                    [
                        'l' => 'temp_primer',
                        'f' => '(10/3)*annealing_temp - 7/3*temp_product + 149/3',
                        'r' => ['temp_product', 'annealing_temp'],
                    ],
                    [
                        'l' => 'annealing_temp',
                        'f' => '(3/10)*temp_primer + (7/10)*temp_product - 149/10',
                        'r' => ['temp_product', 'temp_primer'],
                    ],
                ],
            ],
        ],
        'datasets' => [],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Give the Annealing temperature calculator the primer melting temperature and the annealing temperature and it returns <strong>target melting temperature</strong>.
        TXT,
        'sections' => [
            ['title' => 'How does the Annealing temperature calculator work?', 'html' => <<<'TXT'
            <p>The Annealing temperature calculator takes the values in the form, applies the relationship described below and reports <strong>target melting temperature</strong> in the results panel.</p>
            <p>Working from the top of the form: you type in the primer melting temperature and the annealing temperature (Tₐ).</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>A measured quantity, entered by default in Celsius. The unit chip switches it to any of the 28 supported units.</li><li>A measured quantity, entered by default in Celsius. The unit chip switches it to any of the 28 supported units.</li></ul>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Primer melting temperature</strong></td><td>A measured quantity, 28 units available.</td><td>Celsius</td><td>You supply it</td></tr><tr><td><strong>Target melting temperature</strong></td><td>A measured quantity, 28 units available.</td><td>Celsius</td><td>Calculated</td></tr><tr><td><strong>Annealing temperature (Tₐ)</strong></td><td>A measured quantity, 28 units available.</td><td>Celsius</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Annealing temperature calculator', 'html' => <<<'TXT'
            <p>One relationship drives the whole page:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Target melting temperature</span><span class="formula-eq">=</span><span class="formula-rhs">(10 ÷ 7) × annealing temperature (Tₐ) − 3 ÷ 7 × primer melting temperature + 149 ÷ 7</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What is a worked example?', 'html' => <<<'TXT'
            <p>Suppose <strong>Primer melting temperature</strong> = 10 °C and <strong>Annealing temperature (Tₐ)</strong> = 10 °C. Working through the relationship above gives <strong>Target melting temperature</strong> = 31.2857 °C.</p><p>The point of the example is the scale, not the particular digits: swap in your own figures and the same relationship produces your answer.</p><ol><li>Enter the values listed above, matching the units each box asks for.</li><li>Read off the result. Any field you leave empty is the one the calculator solves for.</li><li>Sanity-check the number against the relationship: <strong>Target melting temperature</strong> = 31.2857 °C should be roughly the size you expected from <strong>Primer melting temperature</strong> = 10 °C and <strong>Annealing temperature (Tₐ)</strong> = 10 °C.</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in Celsius, and convertible to any of the 28 units on that chip.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Temperature, opening in Celsius</li><li>Temperature, opening in Celsius</li><li>Temperature, opening in Celsius</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Annealing temperature calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Supporting a lesson, a lecture or a field note</li><li>Putting a biological quantity into a scale you can picture</li><li>Comparing two organisms, populations or processes</li><li>Any time the same 2 figures keep coming back — the primer melting temperature and the annealing temperature — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Write the answer down with its unit. </li><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li><li>Keep the units you enter consistent. </li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Annealing temperature calculator, these are the ones that matter:</p>
            <ul><li>The unit chips cover the units listed on the page. A historical or regional unit that is missing can still be used by converting it to a listed unit first.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'How do you check the answer yourself?', 'html' => <<<'TXT'
            <ul><li>Change one input at a time — primer melting temperature for instance — and watch which results move. A result that stays put does not depend on it.</li><li>Try a round value you can work out in your head. If the answer matches your mental arithmetic, the inputs are on the scale you assumed.</li><li>Switch the units to the ones you normally use and confirm the numbers are unchanged apart from their label; if they are not, a chip was on the wrong setting.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/bacteria-growth">Bacteria growth</a>, <a href="/biology/basal-area">Basal area</a> and <a href="/biology/benadryl-dosage-for-dogs">Benadryl dosage for dogs</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Annealing temperature calculator work out?', 'a' => <<<'TXT'
            It returns target melting temperature, derived from the primer melting temperature and the annealing temperature. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Annealing temperature calculator?', 'a' => <<<'TXT'
            The form asks for the primer melting temperature and the annealing temperature, which is 2 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter primer melting temperature in a different unit?', 'a' => <<<'TXT'
            Yes. Primer melting temperature opens in Celsius and the chip beside it offers 28 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'What is a typical result?', 'a' => <<<'TXT'
            With the values the page starts from, the calculator reports Target melting temperature = 31.2857 °C. Treat that as a reference point rather than a recommendation: it exists so you can tell at a glance whether your own inputs are on the same scale.
            TXT],
            ['q' => 'Is the Annealing temperature calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/bacteria-growth', 'name' => 'Bacteria growth'],
            ['path' => '/biology/basal-area', 'name' => 'Basal area'],
            ['path' => '/biology/benadryl-dosage-for-dogs', 'name' => 'Benadryl dosage for dogs'],
        ],
    ],
];
