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
    'meta' => ['title' => 'Dog size Calculator — Formula, Units & Example', 'description' => <<<'TXT'
    Dog size works out Adult weight from Your puppy’s age and Weight. The arithmetic is the whole method: Adult weight is worked out from Your puppy’s age by one…
    TXT, 'h1' => 'Dog size Calculator', 'updated' => '2026-10-05'],
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
        Dog size works out Adult weight from Your puppy’s age and Weight. The arithmetic is the whole method: Adult weight is worked out from Your puppy’s age by one formula, applied once. Adult weight comes back in kilograms unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Dog size calculator works', 'html' => <<<'TXT'
            <p>The Dog size calculator applies one relationship to 2 numbers and reports Adult weight.</p><p>In the form&#039;s own words, Adult weight = 52 × Weight ÷ Your puppy’s age.</p><p>The answers are Adult weight; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Your puppy’s age</strong> — in weeks</li><li><strong>Weight</strong> — in kilograms. Your puppy’s weight at the age specified above.</li></ul><p>What you get back is Adult weight in kilograms, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Adult weight</strong> = <code>52 × Weight ÷ Your puppy’s age</code></li><li><strong>Weight</strong> = <code>(1 ÷ 52) × Your puppy’s age × Adult weight</code></li><li><strong>Your puppy’s age</strong> = <code>52 × Weight ÷ Adult weight</code></li></ul><p>Any one of Adult weight, Weight and Your puppy’s age can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Your puppy’s age and Weight carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Adult weight is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Convert Your puppy’s age to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Your puppy’s age and Weight is what you already know and Adult weight is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/coefficient-of-coincidence">Coefficient of Coincidence Calculator</a>, <a href="/biology/compost-application-rate">Compost Application Rate Calculator</a> and <a href="/biology/compost">Compost Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dog size calculator work out?', 'a' => 'Adult weight, from Weight and Your puppy’s age. The relationship is Adult weight = 52 × Weight ÷ Your puppy’s age.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Your puppy’s age (weeks), Weight (kilograms). Fill age and weight and leave Adult weight empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Adult weight, Weight and Your puppy’s age blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Adult weight is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Your puppy’s age blank and the page solves for it, reporting Adult weight instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Adult weight keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/coefficient-of-coincidence', 'name' => 'Coefficient of Coincidence Calculator'],
            ['path' => '/biology/compost-application-rate', 'name' => 'Compost Application Rate Calculator'],
            ['path' => '/biology/compost', 'name' => 'Compost Calculator'],
        ],
        'authors' => [],
    ],
];
