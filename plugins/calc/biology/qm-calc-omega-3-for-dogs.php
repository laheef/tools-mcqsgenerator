<?php

/**
 * Omega-3 for dogs
 * /biology/omega-3-for-dogs
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Omega-3 for dogs',
    'meta' => ['title' => 'Omega-3 for dogs — Formula, Steps & Examples', 'description' => 'Give the Omega-3 for dogs calculator the total Omega-3 dose and the dose and it returns <strong>dog\'s weight</strong>. Press Calculate for the answer; change…', 'h1' => 'Omega-3 for dogs Calculator', 'updated' => '2026-08-10'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dog',
                            'label' => 'Dog\'s weight',
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
                            'name' => 'purpose',
                            'label' => 'Purpose/disorder',
                            'type' => 'select',
                            'options' => [
                                'NRC recommended allowance' => '30',
                                'NRC safe upper limit ' => '370',
                                'Idiopathic hyperlipidemia' => '120',
                                'Kidney disease' => '140',
                                'Cardiovascular disorders' => '115',
                                'Osteoarthritis' => '310',
                                'Inflammatory or immunologic' => '125',
                                'Custom' => '',
                            ],
                            'dataset' => 'purpose',
                            'control' => 'DROPDOWN',
                            'help' => 'NRC stands for the National Research Council.',
                            'default' => 'NRC recommended allowance',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dose',
                            'label' => 'Dose',
                            'type' => 'result',
                            'suffix' => 'mg/kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_dose',
                            'label' => 'Total Omega-3 dose',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'mg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dose_custom',
                            'label' => 'Dose ',
                            'type' => 'number',
                            'suffix' => 'mg/kg',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_dose_custom',
                            'label' => 'Total Omega-3 dose',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'mg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => '(dog^0.75)* dose = total_dose',
            'results' => ['dog' => 'pow(total_dose/dose, 4/3)', 'dose' => 'total_dose/pow(dog, 3/4)', 'total_dose' => 'pow(dog, 3/4)*dose'],
        ],
        [
            'title' => '(dog^0.75) * dose_custom = total_dose_custom',
            'results' => ['dog' => 'pow(total_dose_custom/dose_custom, 4/3)', 'total_dose_custom' => 'pow(dog, 3/4)*dose_custom', 'dose_custom' => 'total_dose_custom/pow(dog, 3/4)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Give the Omega-3 for dogs calculator the total Omega-3 dose and the dose and it returns <strong>dog's weight</strong>. 
        
        Press Calculate for the answer; change a value and it steps off screen until you press again, so each edit can be judged on its own.
        TXT,
        'sections' => [
            ['title' => 'How does the Omega-3 for dogs calculator work?', 'html' => <<<'TXT'
            <p>The Omega-3 for dogs calculator takes the values in the form, applies the relationship described below and reports <strong>dog's weight</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case; then you type in the total Omega-3 dose and the dose (2).</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 8 options, such as NRC recommended allowance, NRC safe upper limit and idiopathic hyperlipidemia. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>A measured quantity, entered by default in milligrams. </li><li>A number, expressed in mg/kg.</li></ul><p>One field on this form is a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Dog's weight</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>Calculated</td></tr><tr><td><strong>Dose</strong></td><td>A number stated in mg/kg.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Total Omega-3 dose</strong></td><td>A measured quantity, 29 units available.</td><td>milligrams</td><td>You supply it</td></tr><tr><td><strong>Dose (2)</strong></td><td>A number stated in mg/kg.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Total Omega-3 dose (2)</strong></td><td>A measured quantity, 29 units available.</td><td>milligrams</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Omega-3 for dogs calculator', 'html' => <<<'TXT'
            <p>One relationship drives the whole page:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Dog&#x27;s weight</span><span class="formula-eq">=</span><span class="formula-rhs">(total Omega-3 dose ÷ dose ^ 4 ÷ 3)</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li><li>Shown in milligrams, and convertible to any of the 29 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Mass, opening in kilograms</li><li>Mass, opening in milligrams</li><li>Mass, opening in milligrams</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Omega-3 for dogs calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Comparing two organisms, populations or processes</li><li>Supporting a lesson, a lecture or a field note</li><li>Putting a biological quantity into a scale you can picture</li><li>Any time the same 2 figures keep coming back — the total Omega-3 dose and the dose — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Omega-3 for dogs calculator, these are the ones that matter:</p>
            <ul><li>The 1 drop-down on this page offers a fixed list of cases. A value that is not on the list cannot be entered, and the nearest option is not always a good substitute.</li><li>The unit chips cover the units listed on the page. A historical or regional unit that is missing can still be used by converting it to a listed unit first.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/pet-sitter-rates">Pet sitter rates</a>, <a href="/biology/pine-straw">Pine straw</a> and <a href="/biology/plant-population">Plant population</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Omega-3 for dogs calculator work out?', 'a' => <<<'TXT'
            It returns dog's weight, derived from the total Omega-3 dose and the dose. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Omega-3 for dogs calculator?', 'a' => <<<'TXT'
            The form asks for the total Omega-3 dose and the dose, which is 3 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter dog\'s weight in a different unit?', 'a' => <<<'TXT'
            Yes. Dog's weight opens in kilograms and the chip beside it offers 29 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There is one choice to make (1 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'What is a typical result?', 'a' => <<<'TXT'
            With the values the page starts from, the calculator reports Dose = 0. Treat that as a reference point rather than a recommendation: it exists so you can tell at a glance whether your own inputs are on the same scale.
            TXT],
            ['q' => 'Is the Omega-3 for dogs calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/pet-sitter-rates', 'name' => 'Pet sitter rates'],
            ['path' => '/biology/pine-straw', 'name' => 'Pine straw'],
            ['path' => '/biology/plant-population', 'name' => 'Plant population'],
        ],
    ],
];
