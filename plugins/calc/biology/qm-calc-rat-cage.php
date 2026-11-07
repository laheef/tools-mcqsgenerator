<?php

/**
 * Rat cage
 * /biology/rat-cage
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Rat cage',
    'meta' => ['title' => 'Rat cage Calculator: Formula, Steps & Examples', 'description' => '<strong>cage volume</strong> is what the Rat cage calculator works out, and it gets there from the height, the length and the width. The Rat cage calculator…', 'h1' => 'Rat cage Calculator', 'updated' => '2026-08-06'],
    'raw' => [
        'vars' => [
            'height' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'length' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'rats' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
            'ratspace' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'yPH2XpJMRKQ8kjlYusMJZ', 'c' => null],
                ],
                'ds' => 'vkeAWlKTSA9LNrvtWpDwB',
            ],
            'ratspaceunit' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'volume' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.1'],
            ],
            'width' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'PriAG9RgdazW5INMUieCV',
                'title' => 'Cage Size',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'height',
                                    'vt' => 'numerical',
                                    'l' => 'Height',
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
                                    'n' => 'width',
                                    'vt' => 'numerical',
                                    'l' => 'Width',
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
                                    'n' => 'volume',
                                    'vt' => 'numerical',
                                    'l' => 'Cage volume',
                                    'us' => '20',
                                    'du' => 'liters',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'Y-D1WB17-euyC2CxrXATf',
                'title' => 'Recommendation',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'ratspace',
                                    'vt' => 'valueSelect',
                                    'l' => 'Space per rat',
                                    'ds' => 'vkeAWlKTSA9LNrvtWpDwB',
                                    'opts' => [
                                        ['31iQG4uboPcvBvfTwzVI2', '2 cu ft (57 liters)', '1'],
                                        ['yPH2XpJMRKQ8kjlYusMJZ', '2.5 cu ft (71 liters)', '2'],
                                        ['4bSuxZUT_t8p0udbaX-7C', 'Custom', '0'],
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
                                    'n' => 'ratspaceunit',
                                    'vt' => 'dependent',
                                    'l' => 'Space per rat (custom)',
                                    'us' => '20',
                                    'du' => 'liters',
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
                                    'n' => 'rats',
                                    'vt' => 'numerical',
                                    'l' => 'Can fit at most',
                                    'suf' => 'rat(s)',
                                    'h' => 'Getting 0 means you might need a larger cage for your rat(s)!',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'volume = length * width * height',
                'var' => [
                    [
                        'l' => 'volume',
                        'f' => 'height*length*width',
                        'r' => ['length', 'height', 'width'],
                    ],
                    [
                        'l' => 'length',
                        'f' => 'volume/(height*width)',
                        'r' => ['volume', 'height', 'width'],
                    ],
                    [
                        'l' => 'height',
                        'f' => 'volume/(length*width)',
                        'r' => ['volume', 'length', 'width'],
                    ],
                    [
                        'l' => 'width',
                        'f' => 'volume/(height*length)',
                        'r' => ['volume', 'length', 'height'],
                    ],
                ],
            ],
            [
                'formula' => 'floor(volume / ratspaceunit) = rats',
                'var' => [
                    [
                        'l' => 'rats',
                        'f' => 'floor(volume/ratspaceunit)',
                        'r' => ['ratspaceunit', 'volume'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'vkeAWlKTSA9LNrvtWpDwB' => [
                'name' => 'rat_spaceDS',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => '31iQG4uboPcvBvfTwzVI2', 'label' => '2 cu ft (57 liters)', 'value' => '1'],
                    ['uid' => 'yPH2XpJMRKQ8kjlYusMJZ', 'label' => '2.5 cu ft (71 liters)', 'value' => '2'],
                    ['uid' => '4bSuxZUT_t8p0udbaX-7C', 'label' => 'Custom', 'value' => '0'],
                ],
            ],
        ],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => '<strong>cage volume</strong> is what the Rat cage calculator works out, and it gets there from the height, the length and the width.',
        'sections' => [
            ['title' => 'How does the Rat cage calculator work?', 'html' => <<<'TXT'
            <p>The Rat cage calculator takes the values in the form, applies the relationship described below and reports <strong>cage volume</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the space per rat); then you type in the height, the length and the width.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li> The unit chip switches it to any of the 34 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li><li>Pick the option that matches your case — 3 options, such as 2 cu ft (57 liters), 2.5 cu ft (71 liters) and custom. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li></ul><p>One field on this form is a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Height</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Length</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Width</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Cage volume</strong></td><td>A measured quantity, 40 units available.</td><td>liters</td><td>Calculated</td></tr><tr><td><strong>Space per rat</strong></td><td>One of 3 options, such as 2 cu ft (57 liters), 2.5 cu ft (71 liters) and custom.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Space per rat (custom)</strong></td><td>A measured quantity, 40 units available.</td><td>liters</td><td>Calculated</td></tr><tr><td><strong>Can fit at most</strong></td><td>A number stated in rat(s).</td><td>—</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Rat cage calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Cage volume</span><span class="formula-eq">=</span><span class="formula-rhs">height × length × width</span></div><div class="formula-row"><span class="formula-lhs">Can fit at most</span><span class="formula-eq">=</span><span class="formula-rhs">rounded down, (cage volume ÷ space per rat (custom))</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in liters, and convertible to any of the 40 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in liters, and convertible to any of the 40 units on that chip.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Volume, opening in liters</li><li>Volume, opening in liters</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Rat cage calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Putting a biological quantity into a scale you can picture</li><li>Supporting a lesson, a lecture or a field note</li><li>Comparing two organisms, populations or processes</li><li>Any time the same 3 figures keep coming back — the height, the length and the width — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/raw-dog-food">Raw dog food</a>, <a href="/biology/sheep-gestation">Sheep gestation</a> and <a href="/biology/sod">Sod</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Rat cage calculator work out?', 'a' => <<<'TXT'
            It returns cage volume, derived from the height, the length and the width. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Rat cage calculator?', 'a' => <<<'TXT'
            The form asks for the height, the length and the width, which is 4 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
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
            ['q' => 'What is a typical result?', 'a' => <<<'TXT'
            With the values the page starts from, the calculator reports Space per rat (custom) = 0 L. Treat that as a reference point rather than a recommendation: it exists so you can tell at a glance whether your own inputs are on the same scale.
            TXT],
            ['q' => 'Is the Rat cage calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/raw-dog-food', 'name' => 'Raw dog food'],
            ['path' => '/biology/sheep-gestation', 'name' => 'Sheep gestation'],
            ['path' => '/biology/sod', 'name' => 'Sod'],
        ],
    ],
];
