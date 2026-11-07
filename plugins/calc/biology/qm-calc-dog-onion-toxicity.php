<?php

/**
 * Dog onion toxicity
 * /biology/dog-onion-toxicity
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dog onion toxicity',
    'meta' => ['title' => 'Dog onion toxicity — Free Online Calculator', 'description' => 'The Dog onion toxicity calculator takes the numbers you enter and reports <strong>your dog\'s weight</strong> immediately. The Dog onion toxicity calculator…', 'h1' => 'Dog onion toxicity Calculator', 'updated' => '2026-08-10'],
    'raw' => [
        'vars' => [
            'consumedAmount' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'seriousToxicity' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'toxicDose' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'weight' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'ZaxCNrKRhIBNTgtOR2RKh',
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
                                    't' => 'v',
                                    'n' => 'consumedAmount',
                                    'vt' => 'numerical',
                                    'l' => 'Consumed amount',
                                    'h' => 'A medium onion weights around 150 g/ 6 oz.&nbsp;',
                                    'us' => '22',
                                    'du' => 'g',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => '8h-gstSEAbkyxDAhUjKck',
                'title' => 'Your dog\'s toxic doses',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'toxicDose',
                                    'vt' => 'numerical',
                                    'l' => 'Toxic dose',
                                    'h' => 'Lowest reported dose to cause onion-related toxicosis.',
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
                                    'n' => 'seriousToxicity',
                                    'vt' => 'numerical',
                                    'l' => 'Serious toxicity',
                                    'h' => 'This amount will probably cause toxic effects and hematologic changes that might be life-threatening.',
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
                                    't' => 'x',
                                    'c' => [
                                        [null, 'The amount eaten by your dog is below the calculated possible toxic dose. Your dog should be fine; however, you still need to observe it.'],
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
                                        [null, 'The amount eaten by your dog is greater than the calculated toxic dose. Look for professional help and observe your dog carefully!'],
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
                                        [null, 'Always consult your vet if you have any doubt, or if your pet displays any suspicious behavior.'],
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
                                        [null, 'Remember that onions contain the same poisonous substance as garlic, chives, and leeks.'],
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
                'formula' => 'toxicDose = (weight/20) * 50',
                'var' => [
                    [
                        'l' => 'weight',
                        'f' => '(2/5)*toxicDose',
                        'r' => ['toxicDose'],
                    ],
                    [
                        'l' => 'toxicDose',
                        'f' => '(5/2)*weight',
                        'r' => ['weight'],
                    ],
                ],
            ],
            [
                'formula' => 'seriousToxicity = weight*5',
                'var' => [
                    [
                        'l' => 'weight',
                        'f' => '(1/5)*seriousToxicity',
                        'r' => ['seriousToxicity'],
                    ],
                    [
                        'l' => 'seriousToxicity',
                        'f' => '5*weight',
                        'r' => ['weight'],
                    ],
                ],
            ],
        ],
        'datasets' => [],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => 'The Dog onion toxicity calculator takes the numbers you enter and reports <strong>your dog\'s weight</strong> immediately.',
        'sections' => [
            ['title' => 'How does the Dog onion toxicity calculator work?', 'html' => <<<'TXT'
            <p>The Dog onion toxicity calculator takes the values in the form, applies the relationship described below and reports <strong>your dog's weight</strong> in the results panel.</p>
            <p>Working from the top of the form: you type in the toxic dose.</p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Your dog's weight</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>Calculated</td></tr><tr><td><strong>Toxic dose</strong></td><td>A measured quantity, 29 units available.</td><td>grams</td><td>You supply it</td></tr><tr><td><strong>Serious toxicity</strong></td><td>A measured quantity, 29 units available.</td><td>grams</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Dog onion toxicity calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Your dog&#x27;s weight</span><span class="formula-eq">=</span><span class="formula-rhs">(2 ÷ 5) × toxic dose</span></div><div class="formula-row"><span class="formula-lhs">Your dog&#x27;s weight</span><span class="formula-eq">=</span><span class="formula-rhs">(1 ÷ 5) × serious toxicity</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What is a worked example?', 'html' => <<<'TXT'
            <p>Suppose <strong>Toxic dose</strong> = 10 g. Working through the relationship above gives <strong>Your dog's weight</strong> = 4 kg and <strong>Serious toxicity</strong> = 20 g.</p><p>Read it as a template. Every number above can be replaced with one of yours; only the relationship between them is fixed.</p><ol><li>Enter the values listed above, matching the units each box asks for.</li><li>Read off the result. Any field you leave empty is the one the calculator solves for.</li><li>Sanity-check the number against the relationship: <strong>Your dog's weight</strong> = 4 kg and <strong>Serious toxicity</strong> = 20 g should be roughly the size you expected from <strong>Toxic dose</strong> = 10 g.</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li><li>Shown in grams, and convertible to any of the 29 units on that chip.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Mass, opening in kilograms</li><li>Mass, opening in grams</li><li>Mass, opening in grams</li><li>Mass, opening in grams</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Dog onion toxicity calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Supporting a lesson, a lecture or a field note</li><li>Comparing two organisms, populations or processes</li><li>Putting a biological quantity into a scale you can picture</li><li>Any time the same 1 figures keep coming back — the toxic dose — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li><li>Write the answer down with its unit. </li><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li><li>Round only at the end. </li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Dog onion toxicity calculator, these are the ones that matter:</p>
            <ul><li>The unit chips cover the units listed on the page. A historical or regional unit that is missing can still be used by converting it to a listed unit first.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/dog-pregnancy">Dog pregnancy</a>, <a href="/biology/dog-quality-of-life">Dog quality of life</a> and <a href="/biology/dog-raisin-toxicity">Dog raisin toxicity</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dog onion toxicity calculator work out?', 'a' => <<<'TXT'
            It returns your dog's weight, derived from the toxic dose. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Dog onion toxicity calculator?', 'a' => <<<'TXT'
            The form asks for the toxic dose, which is 2 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter your dog\'s weight in a different unit?', 'a' => <<<'TXT'
            Yes. Your dog's weight opens in kilograms and the chip beside it offers 29 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'What is a typical result?', 'a' => <<<'TXT'
            With the values the page starts from, the calculator reports Your dog's weight = 4 kg. Treat that as a reference point rather than a recommendation: it exists so you can tell at a glance whether your own inputs are on the same scale.
            TXT],
            ['q' => 'Is the Dog onion toxicity calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/dog-pregnancy', 'name' => 'Dog pregnancy'],
            ['path' => '/biology/dog-quality-of-life', 'name' => 'Dog quality of life'],
            ['path' => '/biology/dog-raisin-toxicity', 'name' => 'Dog raisin toxicity'],
        ],
    ],
];
