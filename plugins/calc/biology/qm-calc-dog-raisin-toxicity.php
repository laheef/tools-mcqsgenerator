<?php

/**
 * Dog raisin toxicity
 * /biology/dog-raisin-toxicity
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dog raisin toxicity',
    'meta' => ['title' => 'Dog raisin toxicity: Formula, Steps & Results', 'description' => 'The Dog raisin toxicity calculator returns <strong>toxic amount of raisins</strong> from the 2 fields on the form. The Dog raisin toxicity calculator takes…', 'h1' => 'Dog raisin toxicity Calculator', 'updated' => '2026-09-28'],
    'raw' => [
        'vars' => [
            'amount' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.1'],
            ],
            'raisin_size' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'KYuI8cLcpgYaHyLXr37GW', 'c' => null],
                ],
                'ds' => 'JYfO3FozK4NpX1NV-_XOa',
            ],
            'toxic_amount' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.01'],
            ],
            'weight_kg' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'L1r413CmzPUyydaqOimW5',
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
                                        ['weight_kg == 3.62873896  and raisin_size == $raisinsDS[\'Standard\']', 'Onim Example 1: If my Affenpinscher weighs 8 pounds, what\'s the maximum number of standard raisins it can eat?&nbsp;'],
                                        ['weight_kg == 24.94758035 and raisin_size == $raisinsDS[\'Small\']', 'Onim Example 2: If my Labrador weighs 55 pounds, what\'s the maximum number of small raisins it can eat?&nbsp;'],
                                        ['amount == 4 and raisin_size == $raisinsDS[\'Jumbo\']', 'Onim Example 3: How much does my dog need to weigh to safely eat 4 jumbo raisins?'],
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
                                    'n' => 'weight_kg',
                                    'vt' => 'numerical',
                                    'l' => 'Your dog\'s weight 🐕',
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
                                    'n' => 'toxic_amount',
                                    'vt' => 'numerical',
                                    'l' => 'Toxic amount of raisins',
                                    'h' => 'The lowest reported raisin toxicity of around 2.8 grams per kilogram weight of the dog.',
                                    'us' => '22',
                                    'du' => 'g',
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
                                    'n' => 'raisin_size',
                                    'vt' => 'valueSelect',
                                    'l' => 'Size of raisins',
                                    'ds' => 'JYfO3FozK4NpX1NV-_XOa',
                                    'opts' => [
                                        ['d2bOjuxNXCl7YnmmGPitj', 'Small', '2'],
                                        ['KYuI8cLcpgYaHyLXr37GW', 'Standard', '1'],
                                        ['EpHMMh1dSvNKk4etIY6dp', 'Jumbo', '0.6666'],
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
                                    'n' => 'amount',
                                    'vt' => 'numerical',
                                    'l' => 'Toxic number of raisins (approx.)',
                                    'h' => 'Amount may vary depending on the type and brand of raisins.',
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
                                        [null, <<<'TXT'
                                        The given amount is just a suggestion and should not be taken as a medical advice, please contact your veterinarian immediately if your dog consumed even a small amount of raisins!
                                        TXT],
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
                                        ['weight_kg == 3.62873896  and raisin_size == $raisinsDS[\'Standard\']', <<<'TXT'
                                        How the result is calculated: Convert the weight of your dog to kg:&nbsp;8&nbsp;lb/2.205&nbsp;=&nbsp;3.629&nbsp;kg; Multiply this value by 2.8&nbsp;g/kg to find the toxic amount in grams:&nbsp;10.1612&nbsp;g; Multiply the last value by 1&nbsp;g-1, which is the factor for a standard raisin:&nbsp;10&nbsp;units.&nbsp;
                                        TXT],
                                        ['weight_kg == 24.94758035 and raisin_size == $raisinsDS[\'Small\']', <<<'TXT'
                                        How the result is calculated: Convert the weight of your dog to kg:&nbsp;55&nbsp;lbs/2.205&nbsp;=&nbsp;24.943&nbsp;kg; Multiply this value by 2.8&nbsp;g/kg to find the toxic amount in grams:&nbsp;69.840&nbsp;g; Multiply the last value by 2&nbsp;g-1, which is the factor for a small raisin:&nbsp;140&nbsp;units.&nbsp;
                                        TXT],
                                        ['amount == 4 and raisin_size == $raisinsDS[\'Jumbo\']', <<<'TXT'
                                        How the result is calculated: Divide the amount of raisins by 0.6666&nbsp;g-1, which is the factor for a jumbo raisin:&nbsp;6&nbsp;g; Divide this value by 2.8&nbsp;g/kg to find the weight in kg:&nbsp;2.143&nbsp;kg; Convert the weight of your dog to pounds:&nbsp;2.143&nbsp;× 2.205&nbsp;=&nbsp;4.725&nbsp;lb.
                                        TXT],
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
                                        [null, <<<'TXT'
                                        Check our examples: Example 1 ⧉ — Maximum standard raisins for a Affenpinscher Example 2 ⧉ — Maximum small raisins for a Labrador Example 3 ⧉ — Maximum weight for a dog safely eat 4 jumbo raisins
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
                'formula' => 'toxic_amount =  0.0028 * weight_kg',
                'var' => [
                    [
                        'l' => 'toxic_amount',
                        'f' => '(7/2500)*weight_kg',
                        'r' => ['weight_kg'],
                    ],
                    [
                        'l' => 'weight_kg',
                        'f' => '(2500/7)*toxic_amount',
                        'r' => ['toxic_amount'],
                    ],
                ],
            ],
            [
                'formula' => 'amount = raisin_size * toxic_amount * 1000 ',
                'var' => [
                    [
                        'l' => 'toxic_amount',
                        'f' => '(1/1000)*amount/raisin_size',
                        'r' => ['amount', 'raisin_size'],
                    ],
                    [
                        'l' => 'amount',
                        'f' => '1000*raisin_size*toxic_amount',
                        'r' => ['toxic_amount', 'raisin_size'],
                    ],
                    [
                        'l' => 'raisin_size',
                        'f' => '(1/1000)*amount/toxic_amount',
                        'r' => ['toxic_amount', 'amount'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'JYfO3FozK4NpX1NV-_XOa' => [
                'name' => 'raisinsDS',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'd2bOjuxNXCl7YnmmGPitj', 'label' => 'Small', 'value' => '2'],
                    ['uid' => 'KYuI8cLcpgYaHyLXr37GW', 'label' => 'Standard', 'value' => '1'],
                    ['uid' => 'EpHMMh1dSvNKk4etIY6dp', 'label' => 'Jumbo', 'value' => '0.6666'],
                ],
            ],
        ],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => 'The Dog raisin toxicity calculator returns <strong>toxic amount of raisins</strong> from the 2 fields on the form.',
        'sections' => [
            ['title' => 'How does the Dog raisin toxicity calculator work?', 'html' => <<<'TXT'
            <p>The Dog raisin toxicity calculator takes the values in the form, applies the relationship described below and reports <strong>toxic amount of raisins</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the size of raisins); then you type in your dog's weight.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 3 options, such as small, standard and jumbo. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li></ul><p>One field on this form is a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Your dog's weight</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>You supply it</td></tr><tr><td><strong>Toxic amount of raisins</strong></td><td>A measured quantity, 29 units available.</td><td>grams</td><td>Calculated</td></tr><tr><td><strong>Size of raisins</strong></td><td>One of 3 options, such as small, standard and jumbo.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Toxic number of raisins (approx.)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Dog raisin toxicity calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Toxic amount of raisins</span><span class="formula-eq">=</span><span class="formula-rhs">(7 ÷ 2500) × your dog&#x27;s weight</span></div><div class="formula-row"><span class="formula-lhs">Toxic amount of raisins</span><span class="formula-eq">=</span><span class="formula-rhs">(1 ÷ 1000) × toxic number of raisins (approx.) ÷ size of raisins</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in grams, and convertible to any of the 29 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Mass, opening in kilograms</li><li>Mass, opening in grams</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Dog raisin toxicity calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Supporting a lesson, a lecture or a field note</li><li>Putting a biological quantity into a scale you can picture</li><li>Comparing two organisms, populations or processes</li><li>Any time the same 1 figures keep coming back — your dog's weight — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li><li>Keep the units you enter consistent. </li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/dog-size">Dog size</a>, <a href="/biology/dog-water-intake">Dog water intake</a> and <a href="/biology/dry-matter">Dry matter</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dog raisin toxicity calculator work out?', 'a' => <<<'TXT'
            It returns toxic amount of raisins, derived from your dog's weight. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Dog raisin toxicity calculator?', 'a' => <<<'TXT'
            The form asks for your dog's weight, which is 2 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter your dog\'s weight in a different unit?', 'a' => <<<'TXT'
            Yes. Your dog's weight opens in kilograms and the chip beside it offers 29 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There is one choice to make (1 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'Is the Dog raisin toxicity calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/dog-size', 'name' => 'Dog size'],
            ['path' => '/biology/dog-water-intake', 'name' => 'Dog water intake'],
            ['path' => '/biology/dry-matter', 'name' => 'Dry matter'],
        ],
    ],
];
