<?php

/**
 * Dog size
 * /biology/dog-size
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dog size',
    'meta' => ['title' => 'Dog size Calculator — Formula, Units & Example', 'description' => 'Supply your puppy’s age and the weight and the Dog size calculator solves for <strong>adult weight</strong>. Nothing repaints underneath you: edit a field…', 'h1' => 'Dog size Calculator', 'updated' => '2026-10-05'],
    'raw' => [
        'vars' => [
            'age' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'finalSize' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'finalSize_110' => [
                'type' => 'presentation',
                'rnd' => ['standard', '2'],
            ],
            'finalSize_90' => [
                'type' => 'presentation',
                'rnd' => ['standard', '2'],
            ],
            'weight' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'ZcCCUjrPOAyKM8W2kCK-b',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'age',
                                    'vt' => 'numerical',
                                    'l' => 'Your puppy’s age',
                                    'us' => '19',
                                    'du' => 'wk',
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
                                    'n' => 'weight',
                                    'vt' => 'numerical',
                                    'l' => 'Weight',
                                    'h' => 'Your puppy’s weight at the age specified above.',
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
                                    'n' => 'finalSize',
                                    'vt' => 'numerical',
                                    'l' => 'Adult weight',
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
                                        ['hasValue(finalSize)', 'Your dog\'s adult weight should fall into this range: {{finalSize_90.formattedValue}}-{{finalSize_110.formattedValue}}&nbsp;{{finalSize.unit}}.'],
                                        ['finalSize > 0 and finalSize <= 12', 'Your pet\'s going to be a Toy dog 🐶&nbsp;'],
                                        ['finalSize > 12 and finalSize <=22', 'Your pet\'s going to be a Small dog 🐶&nbsp;'],
                                        ['finalSize > 22 and finalSize <=57', 'Your pet\'s going to be a Medium dog 🐶&nbsp;'],
                                        ['finalSize > 57 and finalSize <=99', 'Your pet\'s going to be a Large dog 🐶&nbsp;'],
                                        ['finalSize > 99', 'Your pet\'s going to be a Giant dog 🐶'],
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
                                    't' => 'i',
                                    'u' => ['Dogs/toydog22.jpg'],
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
                                        ['finalSize > 0 and finalSize <= 12', 'This type of dog can measure up to 12&nbsp;inches (30.5&nbsp;cm) in height, from paw to shoulder.&nbsp;'],
                                        ['finalSize > 12 and finalSize <=22', 'This type of dog can measure up to 18&nbsp;inches (45.7&nbsp;cm) in height, from paw to shoulder.&nbsp;'],
                                        ['finalSize > 22 and finalSize <=57', 'This type of dog can measure up to 25&nbsp;inches (63.5&nbsp;cm) in height, from paw to shoulder.&nbsp;'],
                                        ['finalSize > 57 and finalSize <=99', 'This type of dog can measure up to 30&nbsp;inches (76.2&nbsp;cm) in height, from paw to shoulder.&nbsp;'],
                                        ['finalSize > 99', 'This type of dog can measure up to 44&nbsp;inches (111.8&nbsp;cm) in height, from paw to shoulder.'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'uCg9lNYg8pSLCsL1Xy77c',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'finalSize_90', 'vt' => 'presentation', 'l' => ''],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'finalSize_110', 'vt' => 'presentation', 'l' => ''],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'finalSize = (weight / age) * 52',
                'var' => [
                    [
                        'l' => 'finalSize',
                        'f' => '52*weight/age',
                        'r' => ['weight', 'age'],
                    ],
                    [
                        'l' => 'weight',
                        'f' => '(1/52)*age*finalSize',
                        'r' => ['finalSize', 'age'],
                    ],
                    [
                        'l' => 'age',
                        'f' => '52*weight/finalSize',
                        'r' => ['finalSize', 'weight'],
                    ],
                ],
            ],
        ],
        'datasets' => [],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Supply your puppy’s age and the weight and the Dog size calculator solves for <strong>adult weight</strong>. 
        
        Nothing repaints underneath you: edit a field, press Calculate, and the new answer appears. That is how you find out which input the result is sensitive to.
        TXT,
        'sections' => [
            ['title' => 'How does the Dog size calculator work?', 'html' => <<<'TXT'
            <p>The Dog size calculator takes the values in the form, applies the relationship described below and reports <strong>adult weight</strong> in the results panel.</p>
            <p>Working from the top of the form: you type in your puppy’s age and the weight.</p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Your puppy’s age</strong></td><td>A measured quantity, 27 units available.</td><td>weeks</td><td>You supply it</td></tr><tr><td><strong>Weight</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>You supply it</td></tr><tr><td><strong>Adult weight</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Time, opening in weeks</li><li>Mass, opening in kilograms</li><li>Mass, opening in kilograms</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Dog size calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Supporting a lesson, a lecture or a field note</li><li>Comparing two organisms, populations or processes</li><li>Putting a biological quantity into a scale you can picture</li><li>Any time the same 2 figures keep coming back — your puppy’s age and the weight — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Keep the units you enter consistent. </li><li>Write the answer down with its unit. </li><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Dog size calculator, these are the ones that matter:</p>
            <ul><li>The unit chips cover the units listed on the page. A historical or regional unit that is missing can still be used by converting it to a listed unit first.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'How do you check the answer yourself?', 'html' => <<<'TXT'
            <ul><li>Change one input at a time — your puppy’s age for instance — and watch which results move. A result that stays put does not depend on it.</li><li>Try a round value you can work out in your head. If the answer matches your mental arithmetic, the inputs are on the scale you assumed.</li><li>Switch the units to the ones you normally use and confirm the numbers are unchanged apart from their label; if they are not, a chip was on the wrong setting.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/dog-water-intake">Dog water intake</a>, <a href="/biology/dry-matter">Dry matter</a> and <a href="/biology/fcr">Feed conversion ratio</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dog size calculator work out?', 'a' => <<<'TXT'
            It returns adult weight, derived from your puppy’s age and the weight. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Dog size calculator?', 'a' => <<<'TXT'
            The form asks for your puppy’s age and the weight, which is 2 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter your puppy’s age in a different unit?', 'a' => <<<'TXT'
            Yes. Your puppy’s age opens in weeks and the chip beside it offers 27 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'Is the Dog size calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — press Calculate and every result updates together.
            TXT],
        ],
        'related' => [
            ['path' => '/biology/dog-water-intake', 'name' => 'Dog water intake'],
            ['path' => '/biology/dry-matter', 'name' => 'Dry matter'],
            ['path' => '/biology/fcr', 'name' => 'Feed conversion ratio'],
        ],
    ],
];
