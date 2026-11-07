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
    'meta' => ['title' => 'Rat cage Calculator: Formula, Steps & Examples', 'description' => 'Rat cage works out Space per rat (custom) from Height, Length and Width. Height (centimeters), Length (centimeters), Width (centimeters), Cage volume…', 'h1' => 'Rat cage Calculator', 'updated' => '2026-08-06'],
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
        'intro' => <<<'TXT'
        Rat cage works out Space per rat (custom) from Height, Length and Width. The arithmetic is the whole method: Space per rat (custom) is worked out from Height by one formula, applied once. Space per rat (custom) comes back in liters unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Rat cage calculator works', 'html' => <<<'TXT'
            <p>The Rat cage calculator applies one relationship to 6 numbers and reports Space per rat (custom).</p><p>The relationship it solves reads Cage volume = Height × Length × Width.</p><p>What comes back is Space per rat (custom) — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 6 boxes, and nothing else.</p><ul><li><strong>Height</strong> — in centimeters</li><li><strong>Length</strong> — in centimeters</li><li><strong>Width</strong> — in centimeters</li><li><strong>Cage volume</strong> — in liters</li><li><strong>Space per rat</strong> — a plain number, no unit</li><li><strong>Can fit at most</strong> — in rat(s). Getting 0 means you might need a larger cage for your rat(s)!</li></ul><p>What you get back is Space per rat (custom) in liters, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Cage volume</strong> = <code>Height × Length × Width</code></li><li><strong>Length</strong> = <code>Cage volume ÷ (Height × Width)</code></li><li><strong>Height</strong> = <code>Cage volume ÷ (Length × Width)</code></li><li><strong>Width</strong> = <code>Cage volume ÷ (Height × Length)</code></li><li><strong>Can fit at most</strong> = <code>floor(Cage volume ÷ Space per rat (custom))</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Cage volume, Length and Height can be the unknown.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Height, Length and Width carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Space per rat (custom) is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Height and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Height, Length and Width measured, Space per rat (custom) wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/vine-density">Vine Density Calculator</a>, <a href="/biology/wastewater">Wastewater Calculator</a> and <a href="/biology/water-potential">Water potential Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Rat cage calculator work out?', 'a' => 'Space per rat (custom), from Length, Height and Width. The relationship is Cage volume = Height × Length × Width.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Height (centimeters), Length (centimeters), Width (centimeters), Cage volume (liters), Space per rat. Enter height, length and width; Space per rat (custom) is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Cage volume, Length, Height and Width can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Space per rat (custom) is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Height blank and the page solves for it, reporting Space per rat (custom) instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Space per rat (custom) keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/vine-density', 'name' => 'Vine Density Calculator'],
            ['path' => '/biology/wastewater', 'name' => 'Wastewater Calculator'],
            ['path' => '/biology/water-potential', 'name' => 'Water potential Calculator'],
        ],
        'authors' => [],
    ],
];
