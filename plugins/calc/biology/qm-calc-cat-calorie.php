<?php

/**
 * Cat calorie
 * /biology/cat-calorie
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cat calorie',
    'meta' => ['title' => 'Cat calorie Calculator: Formula, Steps & Examples', 'description' => <<<'TXT'
    The Cat calorie calculator returns <strong>weight</strong> from the 2 fields on the form. The Cat calorie calculator takes the values in the form, applies the…
    TXT, 'h1' => 'Cat calorie Calculator', 'updated' => '2026-07-23'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'weight',
                            'label' => 'Weight',
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
                            'name' => 'condition',
                            'label' => 'Condition',
                            'type' => 'select',
                            'options' => [
                                'Neutered adult' => '1.6',
                                'Non-neutered adult' => '1.8',
                                'Weight loss' => '1',
                                'Weight gain' => '1.7',
                                '0 to 4 months old kitten' => '3',
                                '4 months kitten to adult' => '2',
                                'Set custom maintenance coefficient' => '',
                            ],
                            'dataset' => 'condition',
                            'control' => 'DROPDOWN',
                            'default' => 'Neutered adult',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'resting_energy',
                            'label' => 'Resting energy',
                            'type' => 'number',
                            'help' => 'The energy required to perform basic bodily functions, such as digestion, respiration, heart and brain functions.',
                            'unit' => '44',
                            'unit_default' => 'kcal',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'maintenance_energy',
                            'label' => 'Maintenance energy',
                            'type' => 'number',
                            'help' => 'The total number of calories required on a daily basis.&nbsp;',
                            'unit' => '44',
                            'unit_default' => 'kcal',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Maintenance coefficient',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'maintenance_coefficient',
                            'label' => 'Maintenance coefficient',
                            'type' => 'result',
                            'help' => <<<'TXT'
                            A maintenance multiplier that is a factor based on the condition of the cat, like age, whether the cat is neutered or not and whether the cat is on a weight loss or gain plan.
                            TXT,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'resting_energy = (weight ^ 0.75) *70',
            'results' => ['weight' => '(1/4900)*pow(70, 2/3)*pow(resting_energy, 4/3)', 'resting_energy' => '70*pow(weight, 3/4)'],
        ],
        [
            'title' => 'maintenance_energy = resting_energy *maintenance_coefficient',
            'results' => ['resting_energy' => 'maintenance_energy/maintenance_coefficient', 'maintenance_coefficient' => 'maintenance_energy/resting_energy', 'maintenance_energy' => 'maintenance_coefficient*resting_energy'],
        ],
    ],
    'article' => [
        'intro' => 'The Cat calorie calculator returns <strong>weight</strong> from the 2 fields on the form.',
        'sections' => [
            ['title' => 'How does the Cat calorie calculator work?', 'html' => <<<'TXT'
            <p>The Cat calorie calculator takes the values in the form, applies the relationship described below and reports <strong>weight</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the condition); then you type in the maintenance energy.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 7 options, such as neutered adult, non-neutered adult and weight loss. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>A measured quantity, entered by default in kilocalories. The unit chip switches it to any of the 33 supported units.</li></ul><p>One field on this form is a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Weight</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>Calculated</td></tr><tr><td><strong>Condition</strong></td><td>One of 7 options, such as neutered adult, non-neutered adult and weight loss.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Resting energy</strong></td><td>A measured quantity, 33 units available.</td><td>kilocalories</td><td>Calculated</td></tr><tr><td><strong>Maintenance energy</strong></td><td>A measured quantity, 33 units available.</td><td>kilocalories</td><td>You supply it</td></tr><tr><td><strong>Maintenance coefficient</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Cat calorie calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Weight</span><span class="formula-eq">=</span><span class="formula-rhs">(1 ÷ 4900) × (70 ^ 2 ÷ 3) × (resting energy ^ 4 ÷ 3)</span></div><div class="formula-row"><span class="formula-lhs">Resting energy</span><span class="formula-eq">=</span><span class="formula-rhs">maintenance energy ÷ maintenance coefficient</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li><li>Shown in kilocalories, and convertible to any of the 33 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Mass, opening in kilograms</li><li>Energy, opening in kilocalories</li><li>Energy, opening in kilocalories</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Cat calorie calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Supporting a lesson, a lecture or a field note</li><li>Putting a biological quantity into a scale you can picture</li><li>Comparing two organisms, populations or processes</li><li>Any time the same 1 figures keep coming back — the maintenance energy — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/cat-chocolate-toxicity">Cat chocolate toxicity</a>, <a href="/biology/cat-pregnancy">Cat pregnancy</a> and <a href="/biology/cat-quality-of-life">Cat quality of life</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cat calorie calculator work out?', 'a' => <<<'TXT'
            It returns weight, derived from the maintenance energy. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Cat calorie calculator?', 'a' => <<<'TXT'
            The form asks for the maintenance energy, which is 2 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter weight in a different unit?', 'a' => <<<'TXT'
            Yes. Weight opens in kilograms and the chip beside it offers 29 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There is one choice to make (1 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'What is a typical result?', 'a' => <<<'TXT'
            With the values the page starts from, the calculator reports Maintenance coefficient = 0. Treat that as a reference point rather than a recommendation: it exists so you can tell at a glance whether your own inputs are on the same scale.
            TXT],
            ['q' => 'Is the Cat calorie calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/cat-chocolate-toxicity', 'name' => 'Cat chocolate toxicity'],
            ['path' => '/biology/cat-pregnancy', 'name' => 'Cat pregnancy'],
            ['path' => '/biology/cat-quality-of-life', 'name' => 'Cat quality of life'],
        ],
    ],
];
