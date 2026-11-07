<?php

/**
 * Cephalexin for cats dosage
 * /biology/cephalexin-for-cats-dosage
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cephalexin for cats dosage',
    'meta' => ['title' => 'Cephalexin for cats dosage — Formula & Results', 'description' => 'Give the Cephalexin for cats dosage calculator your cat\'s weight and the dose base and it returns <strong>amount per dose</strong>. The Cephalexin for cats…', 'h1' => 'Cephalexin for cats dosage Calculator', 'updated' => '2026-05-25'],
    'sections' => [
        [
            'title' => 'Cat and drug details',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'weight',
                            'label' => 'Your cat\'s weight',
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
                            'name' => 'prescribed_dose',
                            'label' => 'Dose base',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'mg',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '15',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'drug_type',
                            'label' => 'Drug type',
                            'type' => 'select',
                            'options' => [
                                'Tablets (250 mg)' => '250',
                                'Chewable tablets (75 mg)' => '75',
                                'Chewable tablets (150 mg)' => '150',
                                'Chewable tablets (300 mg)' => '300',
                                'Liquid (125 mg/5 mL)' => '25',
                                'Liquid (250 mg/5 mL)' => '50',
                            ],
                            'dataset' => 'drug_type',
                            'control' => 'DROPDOWN',
                            'default' => 'Liquid (125 mg/5 mL)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'It seems that the chosen drug type may be too strong for your cat. Please select another drug type and try again.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => '📍 The calculated dosage is based on the MSD Manual recommendations.'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Dosage',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dosage',
                            'label' => 'Amount per dose',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'mg',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'daily_dosage',
                            'label' => 'Daily dosage',
                            'type' => 'number',
                            'help' => 'With 2 doses per day, given every 12 hours.',
                            'unit' => '22',
                            'unit_default' => 'mg',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Amount of medicine',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'liquid_per_dose',
                            'label' => 'Liquid per dose',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'ml',
                            'readonly' => true,
                            'rounding' => ['omni', '0.1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'liquid_per_day',
                            'label' => 'Liquid per day',
                            'type' => 'number',
                            'help' => 'With 2 doses per day, administered every 12 hours.',
                            'unit' => '20',
                            'unit_default' => 'ml',
                            'readonly' => true,
                            'rounding' => ['omni', '0.1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tablets_per_dose',
                            'label' => 'Tablets per dose',
                            'type' => 'number',
                            'prefix' => '~',
                            'suffix' => '#',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tablets_per_day',
                            'label' => 'Tablets per day',
                            'type' => 'number',
                            'prefix' => '~',
                            'suffix' => '#',
                            'help' => 'With 2 doses per day, administered every 12 hours.',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'dosage = prescribed_dose * weight',
            'results' => ['dosage' => 'prescribed_dose*weight', 'prescribed_dose' => 'dosage/weight', 'weight' => 'dosage/prescribed_dose'],
        ],
        [
            'title' => 'daily_dosage = 2 * prescribed_dose * weight',
            'results' => ['daily_dosage' => '2*prescribed_dose*weight', 'prescribed_dose' => '(1/2)*daily_dosage/weight', 'weight' => '(1/2)*daily_dosage/prescribed_dose'],
        ],
        [
            'title' => 'liquid_per_dose = dosage/drug_type',
            'results' => ['liquid_per_dose' => 'dosage/drug_type', 'dosage' => 'drug_type*liquid_per_dose', 'drug_type' => 'dosage/liquid_per_dose'],
        ],
        [
            'title' => 'liquid_per_day = daily_dosage/drug_type',
            'results' => ['liquid_per_day' => 'daily_dosage/drug_type', 'daily_dosage' => 'drug_type*liquid_per_day', 'drug_type' => 'daily_dosage/liquid_per_day'],
        ],
        [
            'title' => 'tablets_per_dose = floor(dosage/drug_type+0.2)',
            'results' => ['tablets_per_dose' => 'floor((dosage + (1/5)*drug_type)/drug_type)'],
        ],
        [
            'title' => 'tablets_per_day = one_way(2*tablets_per_dose)',
            'results' => ['tablets_per_day' => '(2*floor((dosage + (1/5)*drug_type)/drug_type))'],
        ],
    ],
    'article' => [
        'intro' => 'Give the Cephalexin for cats dosage calculator your cat\'s weight and the dose base and it returns <strong>amount per dose</strong>.',
        'sections' => [
            ['title' => 'How does the Cephalexin for cats dosage calculator work?', 'html' => <<<'TXT'
            <p>The Cephalexin for cats dosage calculator takes the values in the form, applies the relationship described below and reports <strong>amount per dose</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the drug type); then you type in your cat's weight and the dose base.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>A measured quantity, entered by default in milligrams. </li><li>Pick the option that matches your case — 6 options, such as tablets (250 mg), chewable tablets (75 mg) and chewable tablets (150 mg). The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li></ul><p>One field on this form is a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Your cat's weight</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>You supply it</td></tr><tr><td><strong>Dose base</strong></td><td>A measured quantity, 29 units available.</td><td>milligrams</td><td>You supply it</td></tr><tr><td><strong>Drug type</strong></td><td>One of 6 options, such as tablets (250 mg), chewable tablets (75 mg) and chewable tablets (150 mg).</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Amount per dose</strong></td><td>A measured quantity, 29 units available.</td><td>milligrams</td><td>Calculated</td></tr><tr><td><strong>Daily dosage</strong></td><td>A measured quantity, 29 units available.</td><td>milligrams</td><td>Calculated</td></tr><tr><td><strong>Liquid per dose</strong></td><td>A measured quantity, 40 units available.</td><td>milliliters</td><td>Calculated</td></tr><tr><td><strong>Liquid per day</strong></td><td>A measured quantity, 40 units available.</td><td>milliliters</td><td>Calculated</td></tr><tr><td><strong>Tablets per dose</strong></td><td>A number stated in #.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Tablets per day</strong></td><td>A number stated in #.</td><td>—</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Cephalexin for cats dosage calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Amount per dose</span><span class="formula-eq">=</span><span class="formula-rhs">dose base × your cat&#x27;s weight</span></div><div class="formula-row"><span class="formula-lhs">Daily dosage</span><span class="formula-eq">=</span><span class="formula-rhs">2 × dose base × your cat&#x27;s weight</span></div><div class="formula-row"><span class="formula-lhs">Liquid per dose</span><span class="formula-eq">=</span><span class="formula-rhs">amount per dose ÷ drug type</span></div><div class="formula-row"><span class="formula-lhs">Liquid per day</span><span class="formula-eq">=</span><span class="formula-rhs">daily dosage ÷ drug type</span></div><div class="formula-row"><span class="formula-lhs">Tablets per dose</span><span class="formula-eq">=</span><span class="formula-rhs">rounded down, ((amount per dose + (1 ÷ 5) × drug type) ÷ drug type)</span></div><div class="formula-row"><span class="formula-lhs">Tablets per day</span><span class="formula-eq">=</span><span class="formula-rhs">(2 × rounded down, ((amount per dose + (1 ÷ 5) × drug type) ÷ drug type))</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in milligrams, and convertible to any of the 29 units on that chip.</li><li>Shown in milligrams, and convertible to any of the 29 units on that chip.</li><li>Shown in milliliters, and convertible to any of the 40 units on that chip.</li><li>Shown in milliliters, and convertible to any of the 40 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Mass, opening in kilograms</li><li>Mass, opening in milligrams</li><li>Mass, opening in milligrams</li><li>Mass, opening in milligrams</li><li>Volume, opening in milliliters</li><li>Volume, opening in milliliters</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Cephalexin for cats dosage calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Comparing two organisms, populations or processes</li><li>Putting a biological quantity into a scale you can picture</li><li>Supporting a lesson, a lecture or a field note</li><li>Any time the same 2 figures keep coming back — your cat's weight and the dose base — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Round only at the end. </li><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/cephalexin-for-dogs-dosage">Cephalexin for dogs dosage</a>, <a href="/biology/co2-grow-room">CO₂ grow room</a> and <a href="/biology/compost">Compost</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cephalexin for cats dosage calculator work out?', 'a' => <<<'TXT'
            It returns amount per dose, derived from your cat's weight and the dose base. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Cephalexin for cats dosage calculator?', 'a' => <<<'TXT'
            The form asks for your cat's weight and the dose base, which is 3 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
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
            ['q' => 'Is the Cephalexin for cats dosage calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/cephalexin-for-dogs-dosage', 'name' => 'Cephalexin for dogs dosage'],
            ['path' => '/biology/co2-grow-room', 'name' => 'CO₂ grow room'],
            ['path' => '/biology/compost', 'name' => 'Compost'],
        ],
    ],
];
