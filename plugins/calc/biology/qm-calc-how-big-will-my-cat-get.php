<?php

/**
 * How big will my cat get
 * /biology/how-big-will-my-cat-get
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'How big will my cat get',
    'meta' => ['title' => 'How big will my cat get Calculator: Free, With Steps', 'description' => 'Give the How big will my cat get calculator your kitten\'s age and the weight and it returns <strong>final size</strong>. The How big will my cat get…', 'h1' => 'How big will my cat get Calculator', 'updated' => '2026-08-19'],
    'raw' => [
        'vars' => [
            'age' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'final_size' => [
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
                'uid' => 'OAeJbOwgafSMR25mpB0xQ',
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
                                    'l' => 'Your kitten\'s age',
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
                                    'h' => 'Your kitten\'s weight at the given age.',
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
                                    'n' => 'final_size',
                                    'vt' => 'numerical',
                                    'l' => 'Final size',
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
                                        ['final_size >0 and final_size <= 8', 'Your pet\'s going to be a small cat&nbsp;🐈 This type of cat typically weighs less than 8 pounds (3.6 kg)!'],
                                        ['final_size >8 and final_size <= 13', 'Your pet\'s going to be a medium cat&nbsp;🐈 This type of cat typically weighs 8–13 pounds (3.6-5.9 kg)!'],
                                        ['final_size > 13', 'Your pet\'s going to be a large cat&nbsp;🐈 This type of cat is usually larger than 13 pounds (5.9 kg)!&nbsp;'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'yiB11rk7nHjZlMBjn_LA0',
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
                                        [null, '✨ Build and customize your own tools instantly. Just type a simple sentence to generate a working calculator with zero coding.'],
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
                'formula' => 'final_size = (weight / age) * 32',
                'var' => [
                    [
                        'l' => 'final_size',
                        'f' => '32*weight/age',
                        'r' => ['weight', 'age'],
                    ],
                    [
                        'l' => 'weight',
                        'f' => '(1/32)*age*final_size',
                        'r' => ['final_size', 'age'],
                    ],
                    [
                        'l' => 'age',
                        'f' => '32*weight/final_size',
                        'r' => ['final_size', 'weight'],
                    ],
                ],
            ],
        ],
        'datasets' => [],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => 'Give the How big will my cat get calculator your kitten\'s age and the weight and it returns <strong>final size</strong>.',
        'sections' => [
            ['title' => 'How does the How big will my cat get calculator work?', 'html' => <<<'TXT'
            <p>The How big will my cat get calculator takes the values in the form, applies the relationship described below and reports <strong>final size</strong> in the results panel.</p>
            <p>Working from the top of the form: you type in your kitten's age and the weight.</p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Your kitten's age</strong></td><td>A measured quantity, 27 units available.</td><td>weeks</td><td>You supply it</td></tr><tr><td><strong>Weight</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>You supply it</td></tr><tr><td><strong>Final size</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Time, opening in weeks</li><li>Mass, opening in kilograms</li><li>Mass, opening in kilograms</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The How big will my cat get calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Putting a biological quantity into a scale you can picture</li><li>Supporting a lesson, a lecture or a field note</li><li>Comparing two organisms, populations or processes</li><li>Any time the same 2 figures keep coming back — your kitten's age and the weight — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the How big will my cat get calculator, these are the ones that matter:</p>
            <ul><li>The unit chips cover the units listed on the page. A historical or regional unit that is missing can still be used by converting it to a listed unit first.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'How do you check the answer yourself?', 'html' => <<<'TXT'
            <ul><li>Change one input at a time — your kitten's age for instance — and watch which results move. A result that stays put does not depend on it.</li><li>Try a round value you can work out in your head. If the answer matches your mental arithmetic, the inputs are on the scale you assumed.</li><li>Switch the units to the ones you normally use and confirm the numbers are unchanged apart from their label; if they are not, a chip was on the wrong setting.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/ligation">Ligation</a>, <a href="/biology/livestock-fence">Livestock fence cost</a> and <a href="/biology/llama">Llama</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the How big will my cat get calculator work out?', 'a' => <<<'TXT'
            It returns final size, derived from your kitten's age and the weight. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the How big will my cat get calculator?', 'a' => <<<'TXT'
            The form asks for your kitten's age and the weight, which is 2 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter your kitten\'s age in a different unit?', 'a' => <<<'TXT'
            Yes. Your kitten's age opens in weeks and the chip beside it offers 27 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'Is the How big will my cat get calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — press Calculate and every result updates together.
            TXT],
        ],
        'related' => [
            ['path' => '/biology/ligation', 'name' => 'Ligation'],
            ['path' => '/biology/livestock-fence', 'name' => 'Livestock fence cost'],
            ['path' => '/biology/llama', 'name' => 'Llama'],
        ],
    ],
];
