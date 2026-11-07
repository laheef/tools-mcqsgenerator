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
    'meta' => ['title' => 'Turtle tank Calculator: Formula, Steps & Examples', 'description' => 'Turtle tank works out This species can grow up to from Your turtle\'s species, My turtle\'s length and Recommended tank size. My turtle&#039;s length and…', 'h1' => 'Turtle tank Calculator', 'updated' => '2026-08-06'],
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
        'intro' => <<<'TXT'
        Turtle tank works out This species can grow up to from Your turtle's species, My turtle's length and Recommended tank size. Nothing is looked up on this page: This species can grow up to is computed from Your turtle's species and the other boxes, so an unusual pair of values gives an honest answer rather than an error. This species can grow up to is opened in centimeters; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Turtle tank calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Turtle tank: it takes 3 numbers and reports This species can grow up to.</p><p>The relationship it solves reads Recommended tank size = 10 × My turtle&#039;s length.</p><p>The answers are This species can grow up to; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Your turtle&#039;s species</strong> — a plain number, no unit</li><li><strong>My turtle&#039;s length</strong> — in centimeters. Input the length of your turtle&#039;s shell in inches (or cm) here!</li><li><strong>Recommended tank size</strong> — in liters</li></ul><p>The result box is This species can grow up to in centimeters. </p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Recommended tank size</strong> = <code>10 × My turtle&#039;s length</code></li><li><strong>My turtle&#039;s length</strong> = <code>(1 ÷ 10) × Recommended tank size</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Recommended tank size and My turtle&#039;s length can be the unknown.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> My turtle&#039;s length and Recommended tank size carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> This species can grow up to is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Convert Your turtle&#039;s species to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Your turtle&#039;s species, My turtle&#039;s length and Recommended tank size measured, This species can grow up to wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/crop-water-stress-index">Crop Water Stress Index Calculator</a>, <a href="/biology/daily-light-integral-dli">Daily light integral (DLI) Calculator</a> and <a href="/biology/days-to-maturity">Days to Maturity Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Turtle tank calculator work out?', 'a' => 'This species can grow up to, from My turtle\'s length. The relationship is Recommended tank size = 10 × My turtle\'s length.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Your turtle's species, My turtle's length (centimeters), Recommended tank size (liters). With Species, my_turtle_size and tank_size in place, This species can grow up to can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Recommended tank size and My turtle\'s length can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            This species can grow up to is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave Your turtle's species blank and the page solves for it, reporting This species can grow up to instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. This species can grow up to keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/crop-water-stress-index', 'name' => 'Crop Water Stress Index Calculator'],
            ['path' => '/biology/daily-light-integral-dli', 'name' => 'Daily light integral (DLI) Calculator'],
            ['path' => '/biology/days-to-maturity', 'name' => 'Days to Maturity Calculator'],
        ],
        'authors' => [],
    ],
];
