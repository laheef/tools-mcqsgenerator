<?php

/**
 * Turtle tank
 * /biology/turtle-tank
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Turtle tank',
    'meta' => ['title' => 'Turtle tank Calculator: Formula, Steps & Examples', 'description' => 'The Turtle tank calculator returns <strong>recommended tank size</strong> from the 2 fields on the form. The Turtle tank calculator takes the values in the…', 'h1' => 'Turtle tank Calculator', 'updated' => '2026-08-06'],
    'raw' => [
        'vars' => [
            'Species' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'DhYe1EUnYPhZkgmD2b74o', 'c' => null],
                ],
                'ds' => 'zh72X8ejC9bEIwoepe40m',
            ],
            'my_turtle_size' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'size' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'tank_size' => [
                'type' => 'numerical',
                'rnd' => ['standard', '1'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'wbb8m21twQbxpjUasmPC6',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'Species',
                                    'vt' => 'valueSelect',
                                    'l' => 'Your turtle\'s species',
                                    'ds' => 'zh72X8ejC9bEIwoepe40m',
                                    'opts' => [
                                        ['DhYe1EUnYPhZkgmD2b74o', 'Red-Eared Slider', '12'],
                                        ['AEFduDoq8mO0bjV1diiaA', 'Eastern Box Turtle', '7'],
                                        ['d83qXX9XSSNFvmGPPbp06', 'Western Painted Turtle', '8'],
                                        ['zQ7qtwm7wiDsRSdjZUEZ2', 'Map Turtle', '10'],
                                        ['jI-DZX2uCZHfhWB7-B31X', 'Wood Turtle', '9'],
                                        ['0V9HvO84z4-k9yCFpMzWo', 'Musk Turtle', '5'],
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
                                    'u' => ['redear.jpg '],
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
                                    'n' => 'size',
                                    'vt' => 'dependent',
                                    'l' => 'This species can grow up to',
                                    'h' => 'Turtles come in many different sizes depending on their species.',
                                    'us' => '4',
                                    'du' => 'cm',
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
                                    'n' => 'my_turtle_size',
                                    'vt' => 'numerical',
                                    'l' => 'My turtle\'s length',
                                    'h' => 'Input the length of your turtle\'s shell in inches (or cm) here!',
                                    'us' => '4',
                                    'du' => 'cm',
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
                                    'n' => 'tank_size',
                                    'vt' => 'numerical',
                                    'l' => 'Recommended tank size',
                                    'us' => '20',
                                    'du' => 'liters',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'tank_size = my_turtle_size * 10',
                'var' => [
                    [
                        'l' => 'tank_size',
                        'f' => '10*my_turtle_size',
                        'r' => ['my_turtle_size'],
                    ],
                    [
                        'l' => 'my_turtle_size',
                        'f' => '(1/10)*tank_size',
                        'r' => ['tank_size'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'zh72X8ejC9bEIwoepe40m' => [
                'name' => 'Kind of Turtle',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'DhYe1EUnYPhZkgmD2b74o', 'label' => 'Red-Eared Slider', 'value' => '12'],
                    ['uid' => 'AEFduDoq8mO0bjV1diiaA', 'label' => 'Eastern Box Turtle', 'value' => '7'],
                    ['uid' => 'd83qXX9XSSNFvmGPPbp06', 'label' => 'Western Painted Turtle', 'value' => '8'],
                    ['uid' => 'zQ7qtwm7wiDsRSdjZUEZ2', 'label' => 'Map Turtle', 'value' => '10'],
                    ['uid' => 'jI-DZX2uCZHfhWB7-B31X', 'label' => 'Wood Turtle', 'value' => '9'],
                    ['uid' => '0V9HvO84z4-k9yCFpMzWo', 'label' => 'Musk Turtle', 'value' => '5'],
                ],
            ],
        ],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => 'The Turtle tank calculator returns <strong>recommended tank size</strong> from the 2 fields on the form.',
        'sections' => [
            ['title' => 'How does the Turtle tank calculator work?', 'html' => <<<'TXT'
            <p>The Turtle tank calculator takes the values in the form, applies the relationship described below and reports <strong>recommended tank size</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (your turtle's species); then you type in my turtle's length.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 6 options, such as red-Eared Slider, eastern Box Turtle and western Painted Turtle. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li> The unit chip switches it to any of the 34 supported units.</li></ul><p>One field on this form is a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Your turtle's species</strong></td><td>One of 6 options, such as red-Eared Slider, eastern Box Turtle and western Painted Turtle.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>My turtle's length</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Recommended tank size</strong></td><td>A measured quantity, 40 units available.</td><td>liters</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in liters, and convertible to any of the 40 units on that chip.</li><li>Shown in centimeters, and convertible to any of the 34 units on that chip.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Volume, opening in liters</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Turtle tank calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Supporting a lesson, a lecture or a field note</li><li>Putting a biological quantity into a scale you can picture</li><li>Comparing two organisms, populations or processes</li><li>Any time the same 1 figures keep coming back — my turtle's length — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Round only at the end. </li><li>Write the answer down with its unit. </li><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Turtle tank calculator, these are the ones that matter:</p>
            <ul><li>The 1 drop-down on this page offers a fixed list of cases. A value that is not on the list cannot be entered, and the nearest option is not always a good substitute.</li><li>The unit chips cover the units listed on the page. A historical or regional unit that is missing can still be used by converting it to a listed unit first.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/vapor-pressure-deficit">Vapor pressure deficit</a>, <a href="/biology/vegetable-seed">Vegetable seed</a> and <a href="/biology/vegetable-yield">Vegetable yield</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Turtle tank calculator work out?', 'a' => <<<'TXT'
            It returns recommended tank size, derived from my turtle's length. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Turtle tank calculator?', 'a' => <<<'TXT'
            The form asks for my turtle's length, which is 2 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter this species can grow up to in a different unit?', 'a' => <<<'TXT'
            Yes. This species can grow up to opens in centimeters and the chip beside it offers 34 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There is one choice to make (1 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'What is a typical result?', 'a' => <<<'TXT'
            With the values the page starts from, the calculator reports This species can grow up to = 0 cm. Treat that as a reference point rather than a recommendation: it exists so you can tell at a glance whether your own inputs are on the same scale.
            TXT],
            ['q' => 'Is the Turtle tank calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/vapor-pressure-deficit', 'name' => 'Vapor pressure deficit'],
            ['path' => '/biology/vegetable-seed', 'name' => 'Vegetable seed'],
            ['path' => '/biology/vegetable-yield', 'name' => 'Vegetable yield'],
        ],
    ],
];
