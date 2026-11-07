<?php

/**
 * Fertilizer
 * /biology/fertilizer
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Fertilizer',
    'meta' => ['title' => 'Fertilizer Calculator — Formula, Units & Example', 'description' => 'Supply the nitrogen, the phosphate (P₂O₅) rate, the potash (K₂O) rate and the you need and the Fertilizer calculator solves for <strong>n rate</strong>.', 'h1' => 'Fertilizer Calculator', 'updated' => '2026-08-12'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'lawn_area',
                            'label' => 'Lawn area',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'm2',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Fertilizer label',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'N_label',
                            'label' => 'Nitrogen (N)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'P_label',
                            'label' => 'Phosphorus (P)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'K_label',
                            'label' => 'Potassium (K)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Desired application rates',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'N_rate',
                            'label' => 'N rate',
                            'type' => 'number',
                            'help' => 'Use recommended rates from soil tests and/or local grass experts.',
                            'unit' => '344',
                            'unit_default' => 'kgha',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'P_rate',
                            'label' => 'Phosphate (P₂O₅) rate',
                            'type' => 'number',
                            'unit' => '344',
                            'unit_default' => 'kgha',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'K_rate',
                            'label' => 'Potash (K₂O) rate',
                            'type' => 'number',
                            'unit' => '344',
                            'unit_default' => 'kgha',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Application instructions',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fertilizer_weight',
                            'label' => 'You need',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fertilizer_rate',
                            'label' => 'Fertilizer rate',
                            'type' => 'number',
                            'unit' => '344',
                            'unit_default' => 'kgha',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fertilizer_bag_weight',
                            'label' => 'Fertilizer bag weight',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fertilizer_bags',
                            'label' => 'Number of bags',
                            'type' => 'number',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'fertilizer_rate = N_rate / (N_label / 100) ',
            'results' => ['N_rate' => '(1/100)*N_label*fertilizer_rate', 'fertilizer_rate' => '100*N_rate/N_label', 'N_label' => '100*N_rate/fertilizer_rate'],
        ],
        [
            'title' => 'fertilizer_weight = fertilizer_rate * (lawn_area / 92.903) ',
            'results' => ['lawn_area' => '(92903/1000)*fertilizer_weight/fertilizer_rate', 'fertilizer_rate' => '(92903/1000)*fertilizer_weight/lawn_area', 'fertilizer_weight' => '(1000/92903)*fertilizer_rate*lawn_area'],
        ],
        [
            'title' => 'P_rate = (P_label / 100) * fertilizer_rate',
            'results' => ['P_label' => '100*P_rate/fertilizer_rate', 'fertilizer_rate' => '100*P_rate/P_label', 'P_rate' => '(1/100)*P_label*fertilizer_rate'],
        ],
        [
            'title' => 'K_rate = (K_label / 100) * fertilizer_rate',
            'results' => ['K_label' => '100*K_rate/fertilizer_rate', 'fertilizer_rate' => '100*K_rate/K_label', 'K_rate' => '(1/100)*K_label*fertilizer_rate'],
        ],
        [
            'title' => 'fertilizer_bags = fertilizer_weight / fertilizer_bag_weight',
            'results' => ['fertilizer_bag_weight' => 'fertilizer_weight/fertilizer_bags', 'fertilizer_weight' => 'fertilizer_bag_weight*fertilizer_bags', 'fertilizer_bags' => 'fertilizer_weight/fertilizer_bag_weight'],
        ],
    ],
    'article' => [
        'intro' => 'Supply the nitrogen, the phosphate (P₂O₅) rate, the potash (K₂O) rate and the you need and the Fertilizer calculator solves for <strong>n rate</strong>.',
        'sections' => [
            ['title' => 'How does the Fertilizer calculator work?', 'html' => <<<'TXT'
            <p>The Fertilizer calculator takes the values in the form, applies the relationship described below and reports <strong>n rate</strong> in the results panel.</p>
            <p>Working from the top of the form: you type in the nitrogen (N), the phosphate (P₂O₅) rate, the potash (K₂O) rate and the you need.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>A plain number with no unit attached.</li><li>A measured quantity, entered by default in kilograms per hectare. The unit chip switches it to any of the 11 supported units.</li><li>A measured quantity, entered by default in kilograms per hectare. The unit chip switches it to any of the 11 supported units.</li><li>A measured quantity, entered by default in kilograms per hectare. The unit chip switches it to any of the 11 supported units.</li><li>A plain number with no unit attached.</li></ul>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Lawn area</strong></td><td>A measured quantity, 24 units available.</td><td>square meters</td><td>Calculated</td></tr><tr><td><strong>Nitrogen (N)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Phosphorus (P)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Potassium (K)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>N rate</strong></td><td>A measured quantity, 11 units available.</td><td>kilograms per hectare</td><td>Calculated</td></tr><tr><td><strong>Phosphate (P₂O₅) rate</strong></td><td>A measured quantity, 11 units available.</td><td>kilograms per hectare</td><td>You supply it</td></tr><tr><td><strong>Potash (K₂O) rate</strong></td><td>A measured quantity, 11 units available.</td><td>kilograms per hectare</td><td>You supply it</td></tr><tr><td><strong>You need</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>You supply it</td></tr><tr><td><strong>Fertilizer rate</strong></td><td>A measured quantity, 11 units available.</td><td>kilograms per hectare</td><td>You supply it</td></tr><tr><td><strong>Fertilizer bag weight</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>Calculated</td></tr><tr><td><strong>Number of bags</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Fertilizer calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">N rate</span><span class="formula-eq">=</span><span class="formula-rhs">(1 ÷ 100) × nitrogen (N) × fertilizer rate</span></div><div class="formula-row"><span class="formula-lhs">Lawn area</span><span class="formula-eq">=</span><span class="formula-rhs">(92903 ÷ 1000) × you need ÷ fertilizer rate</span></div><div class="formula-row"><span class="formula-lhs">Phosphorus (P)</span><span class="formula-eq">=</span><span class="formula-rhs">100 × phosphate (P₂O₅) rate ÷ fertilizer rate</span></div><div class="formula-row"><span class="formula-lhs">Potassium (K)</span><span class="formula-eq">=</span><span class="formula-rhs">100 × potash (K₂O) rate ÷ fertilizer rate</span></div><div class="formula-row"><span class="formula-lhs">Fertilizer bag weight</span><span class="formula-eq">=</span><span class="formula-rhs">you need ÷ number of bags</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What is a worked example?', 'html' => <<<'TXT'
            <p>Suppose <strong>Nitrogen (N)</strong> = 10 and <strong>Fertilizer rate</strong> = 10 kg/ha. Working through the relationship above gives <strong>N rate</strong> = 1 kg/ha.</p><p>Read it as a template. Every number above can be replaced with one of yours; only the relationship between them is fixed.</p><ol><li>Enter the values listed above, matching the units each box asks for.</li><li>Read off the result. Any field you leave empty is the one the calculator solves for.</li><li>Sanity-check the number against the relationship: <strong>N rate</strong> = 1 kg/ha should be roughly the size you expected from <strong>Nitrogen (N)</strong> = 10 and <strong>Fertilizer rate</strong> = 10 kg/ha.</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in kilograms per hectare, and convertible to any of the 11 units on that chip.</li><li>Shown in square meters, and convertible to any of the 24 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Area, opening in square meters</li><li>Mass per area, opening in kilograms per hectare</li><li>Mass per area, opening in kilograms per hectare</li><li>Mass per area, opening in kilograms per hectare</li><li>Mass, opening in kilograms</li><li>Mass per area, opening in kilograms per hectare</li><li>Mass, opening in kilograms</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Fertilizer calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Supporting a lesson, a lecture or a field note</li><li>Comparing two organisms, populations or processes</li><li>Putting a biological quantity into a scale you can picture</li><li>Any time the same 4 figures keep coming back — the nitrogen, the phosphate (P₂O₅) rate and the potash (K₂O) rate — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li><li>Round only at the end. </li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/fish-oil-dosage-for-cats">Fish oil dosage for cats</a>, <a href="/biology/gdu">GDU (growing degree units)</a> and <a href="/biology/goat-gestation">Goat gestation</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Fertilizer calculator work out?', 'a' => <<<'TXT'
            It returns n rate, derived from the nitrogen, the phosphate (P₂O₅) rate and the potash (K₂O) rate. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Fertilizer calculator?', 'a' => <<<'TXT'
            The form asks for the nitrogen, the phosphate (P₂O₅) rate, the potash (K₂O) rate and the you need, which is 6 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter lawn area in a different unit?', 'a' => <<<'TXT'
            Yes. Lawn area opens in square meters and the chip beside it offers 24 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'What is a typical result?', 'a' => <<<'TXT'
            With the values the page starts from, the calculator reports N rate = 1 kg/ha. Treat that as a reference point rather than a recommendation: it exists so you can tell at a glance whether your own inputs are on the same scale.
            TXT],
            ['q' => 'Is the Fertilizer calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/fish-oil-dosage-for-cats', 'name' => 'Fish oil dosage for cats'],
            ['path' => '/biology/gdu', 'name' => 'GDU (growing degree units)'],
            ['path' => '/biology/goat-gestation', 'name' => 'Goat gestation'],
        ],
    ],
];
