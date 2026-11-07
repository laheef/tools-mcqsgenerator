<?php

/**
 * Dog crate size
 * /biology/dog-crate-size
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dog crate size',
    'meta' => ['title' => 'Dog crate size Calculator — Formula & Results', 'description' => 'Dog crate size turns Extra length and Minimal crate length into Height and Length. To get the crate dimensions you need to add 2-4 inches to your dog&#039;s…', 'h1' => 'Dog crate size Calculator', 'updated' => '2026-08-10'],
    'raw' => [
        'vars' => [
            'addition' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => '5dSNG1fRWEfpWCvT9m9E0', 'c' => null],
                ],
                'ds' => '0r8-ePqXKGIEQHIr30pzZ',
            ],
            'final_height' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'final_length' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'height' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'length' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'RzKVLSZyPdGNfaw_mebM7',
                'title' => 'You dog\'s measurements:',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'i',
                                    'u' => ['/dog_crate_calc.png'],
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
                                    'n' => 'height',
                                    'vt' => 'numerical',
                                    'l' => 'Height',
                                    'h' => 'With your dog sitting, measure them from the ground to the top of the head or, if they have spikey ears, to the top of the ears.',
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
                                    'n' => 'length',
                                    'vt' => 'numerical',
                                    'l' => 'Length',
                                    'h' => 'With your dog standing, measure them from the tip of the nose to the base of the tail.',
                                    'us' => '4',
                                    'du' => 'cm',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => '_b2DnVRd_3ORQF_6vmG5F',
                'title' => 'Crate size',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'addition',
                                    'vt' => 'valueSelect',
                                    'l' => 'Extra length',
                                    'h' => 'To get the crate dimensions you need to add 2-4 inches to your dog\'s length and height.&nbsp;',
                                    'ds' => '0r8-ePqXKGIEQHIr30pzZ',
                                    'opts' => [
                                        ['JL3v-Hf0OJacgD9kv2yVm', '2 in/5.1 cm (small dog)', '2'],
                                        ['5dSNG1fRWEfpWCvT9m9E0', '3 in/7.6 cm (medium dog)', '3'],
                                        ['YcKMkGOlS8iXbRX1c5u4p', '4 in/10.2 cm (big dog)', '4'],
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
                                    'n' => 'final_height',
                                    'vt' => 'numerical',
                                    'l' => 'Minimal crate height',
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
                                    'n' => 'final_length',
                                    'vt' => 'numerical',
                                    'l' => 'Minimal crate length',
                                    'us' => '4',
                                    'du' => 'cm',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'final_length = length + addition',
                'var' => [
                    [
                        'l' => 'length',
                        'f' => '-addition + final_length',
                        'r' => ['final_length', 'addition'],
                    ],
                    [
                        'l' => 'final_length',
                        'f' => 'addition + length',
                        'r' => ['length', 'addition'],
                    ],
                    [
                        'l' => 'addition',
                        'f' => 'final_length - length',
                        'r' => ['length', 'final_length'],
                    ],
                ],
            ],
            [
                'formula' => 'final_height = height + addition',
                'var' => [
                    [
                        'l' => 'addition',
                        'f' => 'final_height - height',
                        'r' => ['final_height', 'height'],
                    ],
                    [
                        'l' => 'final_height',
                        'f' => 'addition + height',
                        'r' => ['addition', 'height'],
                    ],
                    [
                        'l' => 'height',
                        'f' => '-addition + final_height',
                        'r' => ['addition', 'final_height'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            '0r8-ePqXKGIEQHIr30pzZ' => [
                'name' => 'addition',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'JL3v-Hf0OJacgD9kv2yVm', 'label' => '2 in/5.1 cm (small dog)', 'value' => '2'],
                    ['uid' => '5dSNG1fRWEfpWCvT9m9E0', 'label' => '3 in/7.6 cm (medium dog)', 'value' => '3'],
                    ['uid' => 'YcKMkGOlS8iXbRX1c5u4p', 'label' => '4 in/10.2 cm (big dog)', 'value' => '4'],
                ],
            ],
        ],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        Dog crate size turns Extra length and Minimal crate length into Height and Length. It is a single relationship that reads Height out of Extra length, not a table of canned results keyed by them. Units for Height default to centimeters and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Dog crate size calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Dog crate size: it takes 2 numbers and reports Height, Length and Minimal crate height.</p><p>The relationship it solves reads Length = − Extra length + Minimal crate length.</p><p>What comes back is Height, Length and Minimal crate height — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Extra length</strong> — a plain number, no unit. To get the crate dimensions you need to add 2-4 inches to your dog&#039;s length and height.&amp;nbsp;</li><li><strong>Minimal crate length</strong> — in centimeters</li></ul><p>The answers come back as Height in centimeters, Length in centimeters, Minimal crate height in centimeters. </p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Height offers 31 units and opens on centimeters, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Length</strong> = <code>− Extra length + Minimal crate length</code></li><li><strong>Minimal crate length</strong> = <code>Extra length + Length</code></li><li><strong>Extra length</strong> = <code>Minimal crate length − Length</code></li><li><strong>Minimal crate height</strong> = <code>Extra length + Height</code></li><li><strong>Height</strong> = <code>− Extra length + Minimal crate height</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Length, Minimal crate length and Extra length can be the unknown.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Minimal crate length is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Height, Length and Minimal crate height are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> If Extra length is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Extra length and Minimal crate length measured, Height and Length wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/hamster-age">Hamster age Calculator</a>, <a href="/biology/hardy-weinberg-equilibrium">Hardy-Weinberg equilibrium Calculator</a> and <a href="/biology/hardy-weinberg-dominant-allele">Hardy–Weinberg from the Dominant Allele Frequency Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dog crate size calculator work out?', 'a' => 'Height, Length and Minimal crate height, from Minimal crate length and Extra length. The relationship is Length = − Extra length + Minimal crate length.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Extra length, Minimal crate length (centimeters). Fill addition and final_length and leave Height empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Length, Minimal crate length, Extra length and Minimal crate height can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Height is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Extra length blank and the page solves for it, reporting Height instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Height keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/hamster-age', 'name' => 'Hamster age Calculator'],
            ['path' => '/biology/hardy-weinberg-equilibrium', 'name' => 'Hardy-Weinberg equilibrium Calculator'],
            ['path' => '/biology/hardy-weinberg-dominant-allele', 'name' => 'Hardy–Weinberg from the Dominant Allele Frequency Calculator'],
        ],
        'authors' => [],
    ],
];
