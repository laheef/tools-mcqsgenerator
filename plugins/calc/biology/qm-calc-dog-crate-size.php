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
    'meta' => ['title' => 'Dog crate size Calculator — Formula & Results', 'description' => 'Give the Dog crate size calculator the height, the minimal crate height and the minimal crate length and it returns <strong>length</strong>.', 'h1' => 'Dog crate size Calculator', 'updated' => '2026-08-10'],
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
        'intro' => 'Give the Dog crate size calculator the height, the minimal crate height and the minimal crate length and it returns <strong>length</strong>.',
        'sections' => [
            ['title' => 'How does the Dog crate size calculator work?', 'html' => <<<'TXT'
            <p>The Dog crate size calculator takes the values in the form, applies the relationship described below and reports <strong>length</strong> in the results panel.</p>
            <p>Working from the top of the form: you type in the height, the minimal crate height and the minimal crate length.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li> The unit chip switches it to any of the 34 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li></ul><p>One field on this form is a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Height</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Length</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>Calculated</td></tr><tr><td><strong>Extra length</strong></td><td>One of 3 options, such as 2 in/5.1 cm (small dog), 3 in/7.6 cm (medium dog) and 4 in/10.2 cm (big dog).</td><td>choice</td><td>Calculated</td></tr><tr><td><strong>Minimal crate height</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Minimal crate length</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Dog crate size calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Length</span><span class="formula-eq">=</span><span class="formula-rhs">-extra length + minimal crate length</span></div><div class="formula-row"><span class="formula-lhs">Extra length</span><span class="formula-eq">=</span><span class="formula-rhs">minimal crate height − height</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in centimeters, and convertible to any of the 34 units on that chip.</li><li>The option the calculation settles on.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Dog crate size calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Comparing two organisms, populations or processes</li><li>Putting a biological quantity into a scale you can picture</li><li>Supporting a lesson, a lecture or a field note</li><li>Any time the same 3 figures keep coming back — the height, the minimal crate height and the minimal crate length — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li><li>Round only at the end. </li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Dog crate size calculator, these are the ones that matter:</p>
            <ul><li>The 1 drop-down on this page offers a fixed list of cases. A value that is not on the list cannot be entered, and the nearest option is not always a good substitute.</li><li>The unit chips cover the units listed on the page. A historical or regional unit that is missing can still be used by converting it to a listed unit first.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/dog-food">Dog food</a>, <a href="/biology/dog-harness-size">Dog harness size</a> and <a href="/biology/dog-heat-cycle">Dog heat cycle</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dog crate size calculator work out?', 'a' => <<<'TXT'
            It returns length, derived from the height, the minimal crate height and the minimal crate length. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Dog crate size calculator?', 'a' => <<<'TXT'
            The form asks for the height, the minimal crate height and the minimal crate length, which is 3 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter height in a different unit?', 'a' => <<<'TXT'
            Yes. Height opens in centimeters and the chip beside it offers 34 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There is one choice to make (1 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'Is the Dog crate size calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/dog-food', 'name' => 'Dog food'],
            ['path' => '/biology/dog-harness-size', 'name' => 'Dog harness size'],
            ['path' => '/biology/dog-heat-cycle', 'name' => 'Dog heat cycle'],
        ],
    ],
];
