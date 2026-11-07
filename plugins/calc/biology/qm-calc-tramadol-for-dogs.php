<?php

/**
 * Tramadol for dogs
 * /biology/tramadol-for-dogs
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Tramadol for dogs',
    'meta' => ['title' => 'Tramadol for dogs: Formula, Steps & Results', 'description' => 'Your dog\'s weight is opened in kilograms; the chip beside it switches to any unit of the same quantity. Moving it changes the conversion applied to that row…', 'h1' => 'Tramadol for dogs Calculator', 'updated' => '2026-05-22'],
    'raw' => [
        'vars' => [
            'Maximum_dose_allowed' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
            'Minimum_dose_tablets' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
            'maximum_dose' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
            'minimum_dose' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
            'weight' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'R5NgzIXC2E3ugLPv35SR6',
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
                                    't' => 'x',
                                    'c' => [
                                        [null, '🐶 Fill in the field above to receive the recommended tramadol dose for your dog.'],
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
                                        [null, '🐶 Recommended dosage: {{minimum_dose.formattedValue}}-{{maximum_dose.formattedValue}} mg. 🐕 Tramadol should be given every 8-12 hours (2-3 times per day).'],
                                        ['minimum_dose >= 49', '⚕️The minimal dosage requires a total of {{Minimum_dose_tablets.formattedValue}} tablets (strength: 50 mg) per day.'],
                                        ['minimum_dose < 49', '&nbsp;'],
                                        [null, '⚠️ Maximum dose allowed: {{Maximum_dose_allowed.formattedValue}} mg/day.'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'U4_6YFGzRBQ3BSnmiVhRC',
                'title' => 'hidden group',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'maximum_dose', 'vt' => 'numerical', 'l' => 'Max dose'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'minimum_dose', 'vt' => 'numerical', 'l' => 'Min dose'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'Maximum_dose_allowed', 'vt' => 'numerical', 'l' => 'Maximum dose allowed'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'Minimum_dose_tablets', 'vt' => 'numerical', 'l' => 'Minimal dose allowed'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'minimum_dose = 0.9 * weight ',
                'var' => [
                    [
                        'l' => 'weight',
                        'f' => '(10/9)*minimum_dose',
                        'r' => ['minimum_dose'],
                    ],
                    [
                        'l' => 'minimum_dose',
                        'f' => '(9/10)*weight',
                        'r' => ['weight'],
                    ],
                ],
            ],
            [
                'formula' => 'maximum_dose = 2.25 * weight',
                'var' => [
                    [
                        'l' => 'weight',
                        'f' => '(4/9)*maximum_dose',
                        'r' => ['maximum_dose'],
                    ],
                    [
                        'l' => 'maximum_dose',
                        'f' => '(9/4)*weight',
                        'r' => ['weight'],
                    ],
                ],
            ],
            [
                'formula' => 'Maximum_dose_allowed = 4.54 * weight',
                'var' => [
                    [
                        'l' => 'weight',
                        'f' => '(50/227)*Maximum_dose_allowed',
                        'r' => ['Maximum_dose_allowed'],
                    ],
                    [
                        'l' => 'Maximum_dose_allowed',
                        'f' => '(227/50)*weight',
                        'r' => ['weight'],
                    ],
                ],
            ],
            [
                'formula' => 'Minimum_dose_tablets = minimum_dose / 25',
                'var' => [
                    [
                        'l' => 'Minimum_dose_tablets',
                        'f' => '(1/25)*minimum_dose',
                        'r' => ['minimum_dose'],
                    ],
                    [
                        'l' => 'minimum_dose',
                        'f' => '25*Minimum_dose_tablets',
                        'r' => ['Minimum_dose_tablets'],
                    ],
                ],
            ],
        ],
        'datasets' => [],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        Tramadol for dogs returns Your dog's weight from the values already on the page. Nothing is looked up on this page: Your dog's weight is computed from and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Your dog's weight is opened in kilograms; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Tramadol for dogs calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Tramadol for dogs: it takes the value already on the page and reports Your dog&#039;s weight.</p><p>In the form&#039;s own words, Your dog&#039;s weight = (10 ÷ 9) × minimum_dose.</p><p>The result panel carries Your dog&#039;s weight, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Your dog&#039;s weight</strong> = <code>(10 ÷ 9) × minimum_dose</code></li><li><strong>minimum_dose</strong> = <code>(9 ÷ 10) × Your dog&#039;s weight</code></li><li><strong>maximum_dose</strong> = <code>(9 ÷ 4) × Your dog&#039;s weight</code></li><li><strong>Maximum_dose_allowed</strong> = <code>(227 ÷ 50) × Your dog&#039;s weight</code></li><li><strong>Minimum_dose_tablets</strong> = <code>(1 ÷ 25) × minimum_dose</code></li></ul><p>Any one of Your dog&#039;s weight, minimum_dose and maximum_dose can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Your dog&#039;s weight is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in the measured values and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/enzyme-unit-converter">Enzyme Unit Converter (U/mg, kcat) Calculator</a>, <a href="/biology/exponential-population-growth">Exponential Population Growth Calculator</a> and <a href="/biology/farm-pond-fish-stocking">Farm Pond Fish Stocking Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Tramadol for dogs calculator work out?', 'a' => 'Your dog\'s weight, from. The relationship is Your dog\'s weight = (10 ÷ 9) × minimum_dose.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Your dog's weight, minimum_dose, maximum_dose and Maximum_dose_allowed blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Your dog's weight is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With the value already on the page left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Your dog\'s weight keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/enzyme-unit-converter', 'name' => 'Enzyme Unit Converter (U/mg, kcat) Calculator'],
            ['path' => '/biology/exponential-population-growth', 'name' => 'Exponential Population Growth Calculator'],
            ['path' => '/biology/farm-pond-fish-stocking', 'name' => 'Farm Pond Fish Stocking Calculator'],
        ],
        'authors' => [],
    ],
];
