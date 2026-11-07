<?php

/**
 * Dog food
 * /biology/dog-food
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dog food',
    'meta' => ['title' => 'Dog food Calculator: Formula, Steps & Examples', 'description' => <<<'TXT'
    The Dog food calculator turns the body weight and the daily servings into <strong>resting daily calories</strong>. The Dog food calculator takes the values in…
    TXT, 'h1' => 'Dog food Calculator', 'updated' => '2026-08-10'],
    'sections' => [
        [
            'title' => 'Dog\'s characteristics',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Type',
                            'label' => 'Type',
                            'type' => 'select',
                            'options' => [
                                'Puppy - 0 to 4 months' => '3.000000000000000',
                                'Puppy - 4 months to adult' => '2.000000000000000',
                                'Dog - inactive or obese prone' => '1.200000000000000',
                                'Dog (neutered/spayed) - average activity' => '1.600000000000000',
                                'Dog (intact) - average activity' => '1.800000000000000',
                                'Dog - weight loss needed' => '1.000000000000000',
                                'Dog - weight gain needed' => '1.700000000000000',
                                'Working dog - light work' => '2.000000000000001',
                                'Working dog - moderate work' => '3.000000000000001',
                                'Working dog - heavy work' => '5.000000000000000',
                                'Senior dog' => '1.100000000000000',
                            ],
                            'dataset' => 'Multiplier',
                            'control' => 'DROPDOWN',
                            'default' => 'Dog (intact) - average activity',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bodyWeight',
                            'label' => 'Body weight',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Results - Dog\'s calorie requirements',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'caloriesResting',
                            'label' => 'Resting daily calories',
                            'type' => 'number',
                            'suffix' => 'cal',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'caloriesActive',
                            'label' => 'Total daily calories',
                            'type' => 'number',
                            'suffix' => 'cal',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Feeding amount',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'caloriesPerCup',
                            'label' => '1 dose',
                            'type' => 'number',
                            'suffix' => 'calories / cup',
                            'help' => 'How many calories per cup, portion, etc.',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'feedingAmount',
                            'label' => 'Daily servings',
                            'type' => 'number',
                            'suffix' => 'cups / day',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'caloriesResting = one_way((70*pow(bodyWeight, 0.75)))',
            'results' => ['caloriesResting' => '(70*pow(bodyWeight, 3/4))'],
        ],
        [
            'title' => 'caloriesActive  = one_way((70*pow(bodyWeight, 0.75))*Type)',
            'results' => ['caloriesActive' => '(70*Type*pow(bodyWeight, 3/4))'],
        ],
        [
            'title' => 'feedingAmount = ((70*pow(bodyWeight, 0.75))*Type)/caloriesPerCup',
            'results' => ['Type' => '(1/70)*caloriesPerCup*feedingAmount/pow(bodyWeight, 3/4)', 'caloriesPerCup' => '70*Type*pow(bodyWeight, 3/4)/feedingAmount', 'feedingAmount' => '70*Type*pow(bodyWeight, 3/4)/caloriesPerCup', 'bodyWeight' => '(1/4900)*pow(70, 2/3)*pow(caloriesPerCup*feedingAmount/Type, 4/3)'],
        ],
    ],
    'article' => [
        'intro' => 'The Dog food calculator turns the body weight and the daily servings into <strong>resting daily calories</strong>.',
        'sections' => [
            ['title' => 'How does the Dog food calculator work?', 'html' => <<<'TXT'
            <p>The Dog food calculator takes the values in the form, applies the relationship described below and reports <strong>resting daily calories</strong> in the results panel.</p>
            <p>Working from the top of the form: you type in the body weight and the daily servings.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>A number, expressed in calories / cup.</li><li>A number, expressed in cups / day.</li></ul><p>One field on this form is a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Type</strong></td><td>One of 11 options, such as puppy - 0 to 4 months, puppy - 4 months to adult and dog - inactive or obese prone.</td><td>choice</td><td>Calculated</td></tr><tr><td><strong>Body weight</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>You supply it</td></tr><tr><td><strong>Resting daily calories</strong></td><td>A number stated in cal.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Total daily calories</strong></td><td>A number stated in cal.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Daily servings</strong></td><td>A number stated in cups / day.</td><td>—</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Dog food calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Resting daily calories</span><span class="formula-eq">=</span><span class="formula-rhs">(70 × (body weight ^ 3 ÷ 4))</span></div><div class="formula-row"><span class="formula-lhs">Total daily calories</span><span class="formula-eq">=</span><span class="formula-rhs">(70 × type × (body weight ^ 3 ÷ 4))</span></div><div class="formula-row"><span class="formula-lhs">Type</span><span class="formula-eq">=</span><span class="formula-rhs">(1 ÷ 70) × 1 dose × daily servings ÷ (body weight ^ 3 ÷ 4)</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What is a worked example?', 'html' => <<<'TXT'
            <p>Take <strong>Type</strong> set to Dog (intact) - average activity and <strong>Body weight</strong> = 10 kg. The calculator returns <strong>Resting daily calories</strong> = 394 and <strong>Total daily calories</strong> = 709.</p><p>Read it as a template. Every number above can be replaced with one of yours; only the relationship between them is fixed.</p><ol><li>Enter the values listed above, matching the units each box asks for.</li><li>Read off the result. Any field you leave empty is the one the calculator solves for.</li><li>Sanity-check the number against the relationship: <strong>Resting daily calories</strong> = 394 and <strong>Total daily calories</strong> = 709 should be roughly the size you expected from <strong>Type</strong> set to Dog (intact) - average activity and <strong>Body weight</strong> = 10 kg.</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>The option the calculation settles on.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Mass, opening in kilograms</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Dog food calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Comparing two organisms, populations or processes</li><li>Supporting a lesson, a lecture or a field note</li><li>Putting a biological quantity into a scale you can picture</li><li>Any time the same 2 figures keep coming back — the body weight and the daily servings — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li><li>Keep the units you enter consistent. </li><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/dog-harness-size">Dog harness size</a>, <a href="/biology/dog-heat-cycle">Dog heat cycle</a> and <a href="/biology/dog-life-expectancy">Dog life expectancy</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dog food calculator work out?', 'a' => <<<'TXT'
            It returns resting daily calories, derived from the body weight and the daily servings. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Dog food calculator?', 'a' => <<<'TXT'
            The form asks for the body weight and the daily servings, which is 3 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter body weight in a different unit?', 'a' => <<<'TXT'
            Yes. Body weight opens in kilograms and the chip beside it offers 29 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There is one choice to make (1 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'What is a typical result?', 'a' => <<<'TXT'
            With the values the page starts from, the calculator reports Resting daily calories = 394. Treat that as a reference point rather than a recommendation: it exists so you can tell at a glance whether your own inputs are on the same scale.
            TXT],
            ['q' => 'Is the Dog food calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/dog-harness-size', 'name' => 'Dog harness size'],
            ['path' => '/biology/dog-heat-cycle', 'name' => 'Dog heat cycle'],
            ['path' => '/biology/dog-life-expectancy', 'name' => 'Dog life expectancy'],
        ],
    ],
];
