<?php

/**
 * Dog harness size
 * /biology/dog-harness-size
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dog harness size',
    'meta' => ['title' => 'Dog harness size — Formula, Steps & Examples', 'description' => <<<'TXT'
    Dog harness size works out minWeightPrint and maxWeightPrint from 🐾 Weight, 🐕 Girth and Min weight print imperial. Chest circumference, measured by wrapping a…
    TXT, 'h1' => 'Dog harness size Calculator', 'updated' => '2026-08-10'],
    'raw' => [
        'vars' => [
            'girth' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'maxGirthPrint' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'maxGirthPrint_imperial' => [
                'type' => 'presentation',
                'rnd' => ['omni', '0.0001'],
            ],
            'maxWeightPrint' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'maxWeightPrint_imperial' => [
                'type' => 'presentation',
                'rnd' => ['omni', '0.0001'],
            ],
            'minGirthPrint' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'minGirthPrint_imperial' => [
                'type' => 'presentation',
                'rnd' => ['omni', '0.0001'],
            ],
            'minWeightPrint' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'minWeightPrint_imperial' => [
                'type' => 'presentation',
                'rnd' => ['omni', '0.0001'],
            ],
            'weight' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'ot1knAQfPgXHKbqMPZbmZ',
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
                                        [null, 'If you\'re unsure how to measure and weigh your dog, read the "How do I measure a dog for a harness?" section of the accompanying article.'],
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
                                    'n' => 'weight',
                                    'vt' => 'numerical',
                                    'l' => '🐾 Weight',
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
                                    'n' => 'girth',
                                    'vt' => 'numerical',
                                    'l' => '🐕 Girth',
                                    'h' => 'Chest circumference, measured by wrapping a tailor\'s tape around the widest area of the dog\'s chest.',
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
                                    't' => 'x',
                                    'c' => [
                                        [<<<'TXT'
                                        (weight > 0 and weight <= 5 and girth >= 8 and girth <=10) or (weight > 0 and weight < 5 and not(hasValue(girth))) or (girth >= 8 and girth < 9 and not(hasValue(weight)))
                                        TXT, 'Your dog size category is XX-Small. The recommended leash size for the dog with the above measurements is 5/16" (0.79&nbsp;cm) wide.'],
                                        ['(weight == 5 and not(hasValue(girth))) or (girth >= 9 and girth <= 10 and not(hasValue(weight)))', <<<'TXT'
                                        Your dog size category is XX-Small to X-Small. The recommended leash size for the dog with the above measurement is 5/16" (0.79&nbsp;cm) to 3/8" (0.95&nbsp;cm) wide.
                                        TXT],
                                        [<<<'TXT'
                                        (weight == 5 and girth > 10 and girth <=15) or (weight > 5 and weight <= 10 and girth >= 9 and girth <= 15) or (weight > 5 and weight < 10 and not(hasValue(girth))) or (girth > 10 and girth < 13 and not(hasValue(weight)))
                                        TXT, 'Your dog size category is X-Small. The recommended leash size for the dog with the above measurements is 3/8" (0.95&nbsp;cm) wide.'],
                                        ['(weight == 10 and not(hasValue(girth))) or (girth >= 13 and girth <= 15 and not(hasValue(weight)))', <<<'TXT'
                                        Your dog size category is X-Small to Small. The recommended leash size for the dog with the above measurement is 3/8" (0.95&nbsp;cm) to 5/8" (1.59&nbsp;cm) wide.
                                        TXT],
                                        [<<<'TXT'
                                        (weight == 10 and girth > 15 and girth <= 23) or (weight > 10 and weight <= 25 and girth >= 13 and girth <= 23) or (weight > 10 and weight < 25 and not(hasValue(girth))) or (girth > 15 and girth < 18 and not(hasValue(weight)))
                                        TXT, 'Your dog size category is Small. The recommended leash size for the dog with the above measurements is 5/8" (1.59&nbsp;cm) wide.'],
                                        ['(weight == 25 and not(hasValue(girth))) or (girth >= 18 and girth < 22 and not(hasValue(weight)))', <<<'TXT'
                                        Your dog size category is Small to Medium. The recommended leash size for the dog with the above measurement is 5/8" (1.59&nbsp;cm) to 3/4" (1.905&nbsp;cm) wide.
                                        TXT],
                                        [<<<'TXT'
                                        (weight == 25 and girth > 23 and girth <= 29) or (weight > 25 and weight <= 55 and girth >= 18 and girth <=29) or (weight > 25 and weight < 55 and not(hasValue(girth)))
                                        TXT, 'Your dog size category is Medium. The recommended leash size for the dog with the above measurements is 3/4" (1.905&nbsp;cm) wide.'],
                                        ['girth >= 22 and girth <= 23 and not(hasValue(weight))', <<<'TXT'
                                        Your dog size category is Small to Large. The recommended leash size for the dog with the above measurement is 5/8" (1.59&nbsp;cm) to 1" (2.54&nbsp;cm) wide, two-ply for strong pullers.
                                        TXT],
                                        ['weight == 55 and not(hasValue(girth)) or (girth > 23 and girth < 28 and not(hasValue(weight)))', <<<'TXT'
                                        Your dog size category is Medium to Large. The recommended leash size for the dog with the above measurement is 3/4" (1.905&nbsp;cm) wide to 1" (2.54&nbsp;cm) wide, two-ply for strong pullers.
                                        TXT],
                                        [<<<'TXT'
                                        (weight == 55 and girth > 29 and girth <= 39) or (weight > 55 and weight <= 75 and girth >= 22 and girth <= 39) or (weight > 55 and weight < 75 and not(hasValue(girth)))
                                        TXT, 'Your dog size category is Large. The recommended leash size for the dog with the above measurements is 1" (2.54&nbsp;cm) width, two-ply for strong pullers.'],
                                        ['girth >= 28 and girth <= 29 and not(hasValue(weight))', <<<'TXT'
                                        Your dog size category is Medium to X-Large. The recommended leash size for the dog with the above measurement is 3/4" (1.905&nbsp;cm) wide to 1.25" (3.175&nbsp;cm) wide, two-ply for strong pullers.
                                        TXT],
                                        ['weight == 75 and not(hasValue(girth)) or (girth > 29 and girth <= 39 and not(hasValue(weight)))', <<<'TXT'
                                        Your dog size category is Large to X-Large. The recommended leash size for the dog with the above measurement is 1" (2.54&nbsp;cm) to 1.25" (3.18&nbsp;cm) wide, two-ply for strong pullers.
                                        TXT],
                                        [<<<'TXT'
                                        (weight == 75 and girth > 39 and girth <= 48) or (weight > 75 and weight <= 343 and girth >= 28 and girth <= 48) or (weight > 75 and weight <= 343 and not(hasValue(girth))) or (girth > 39 and girth <= 48 and not(hasValue(weight)))
                                        TXT, <<<'TXT'
                                        Your dog size category is X-Large. The recommended leash size for the dog with the above measurements is 1.25" (3.175&nbsp;cm) width, two-ply for strong pullers.
                                        TXT],
                                        ['(hasValue(weight) and (girth < minGirthPrint or girth > maxGirthPrint)) or (hasValue(girth) and (weight < minWeightPrint or weight > maxWeightPrint))', 'The measurements entered seem unlikely; please double-check.&nbsp;'],
                                        [<<<'TXT'
                                        ((hasValue(weight) and weight <= 343 and not(hasValue(girth))) or (not(hasValue(weight)) and hasValue(girth) and girth >= 8)) and(((weight == 5 and not(hasValue(girth))) or (girth >= 9 and girth <= 10 and not(hasValue(weight)))) or ((weight == 10 and not(hasValue(girth))) or (girth >= 13 and girth <= 15 and not(hasValue(weight)))) or ((weight == 25 and not(hasValue(girth))) or (girth >= 18 and girth < 22 and not(hasValue(weight)))) or (girth >= 22 and girth <= 23 and not(hasValue(weight))) or (weight == 55 and not(hasValue(girth)) or (girth > 23 and girth < 28 and not(hasValue(weight)))) or (girth >= 28 and girth <= 29 and not(hasValue(weight))) or (weight == 75 and not(hasValue(girth)) or (girth > 29 and girth <= 39 and not(hasValue(weight)))))
                                        TXT, 'Please complete your inputs to obtain the final dog harness size estimate.&nbsp;'],
                                        ['hasValue(weight) and not(hasValue(girth)) and weight <= 343', <<<'TXT'
                                        With the weight you entered, the girth value must be from {{minGirthPrint.value}}&nbsp;{{minGirthPrint.unit}} to {{maxGirthPrint.value}}&nbsp;{{maxGirthPrint.unit}} ({{minGirthPrint_imperial.value}}&nbsp;{{minGirthPrint_imperial.unit}} to {{maxGirthPrint_imperial.value}}&nbsp;{{maxGirthPrint_imperial.unit}}).&nbsp;
                                        TXT],
                                        ['not(hasValue(weight)) and hasValue(girth) and minWeightPrint > 0', <<<'TXT'
                                        With the girth you entered, the weight must be from {{minWeightPrint.value}}&nbsp;{{minWeightPrint.unit}} to {{maxWeightPrint.value}}&nbsp;{{maxWeightPrint.unit}} ({{minWeightPrint_imperial.value}}&nbsp;{{minWeightPrint_imperial.unit}} to {{maxWeightPrint_imperial.value}}&nbsp;{{maxWeightPrint_imperial.unit}}).&nbsp;
                                        TXT],
                                        ['not(hasValue(weight)) and hasValue(girth) and minWeightPrint == 0 and girth >= 8 and girth <= 48', <<<'TXT'
                                        With the girth you entered, the weight must be {{maxWeightPrint.value}}&nbsp;{{maxWeightPrint.unit}} ({{maxWeightPrint_imperial.value}}&nbsp;{{maxWeightPrint_imperial.unit}}) or less.
                                        TXT],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'P10oE0v9ZfzMqf_WQSjzb',
                'title' => 'Hidden printed variables',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'minGirthPrint',
                                    'vt' => 'numerical',
                                    'l' => 'Min girth print',
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
                                    'n' => 'maxGirthPrint',
                                    'vt' => 'numerical',
                                    'l' => 'Max girth print',
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
                                    'n' => 'minWeightPrint',
                                    'vt' => 'numerical',
                                    'l' => 'Min weight print',
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
                                    'n' => 'maxWeightPrint',
                                    'vt' => 'numerical',
                                    'l' => 'Max weight print',
                                    'us' => '22',
                                    'du' => 'kg',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => '4PgStiCovpBvnuDK3tcBL',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'minWeightPrint_imperial',
                                    'vt' => 'presentation',
                                    'l' => 'Min weight print imperial',
                                    'us' => '22',
                                    'du' => 'lb',
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
                                    'n' => 'maxWeightPrint_imperial',
                                    'vt' => 'presentation',
                                    'l' => 'Max weight print imperial',
                                    'us' => '22',
                                    'du' => 'lb',
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
                                    'n' => 'minGirthPrint_imperial',
                                    'vt' => 'presentation',
                                    'l' => 'Min girth print imperial',
                                    'us' => '4',
                                    'du' => 'inch',
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
                                    'n' => 'maxGirthPrint_imperial',
                                    'vt' => 'presentation',
                                    'l' => 'Max girth print imperial',
                                    'us' => '4',
                                    'du' => 'inch',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'minWeightPrint = get_minWeight(girth)',
                'var' => [
                    [
                        'l' => 'minWeightPrint',
                        'f' => 'get_minWeight(girth)',
                        'r' => ['girth'],
                    ],
                ],
            ],
            [
                'formula' => 'maxWeightPrint = get_maxWeight(girth)',
                'var' => [
                    [
                        'l' => 'maxWeightPrint',
                        'f' => 'get_maxWeight(girth)',
                        'r' => ['girth'],
                    ],
                ],
            ],
            [
                'formula' => 'minGirthPrint = get_minGirth(weight)',
                'var' => [
                    [
                        'l' => 'minGirthPrint',
                        'f' => 'get_minGirth(weight)',
                        'r' => ['weight'],
                    ],
                ],
            ],
            [
                'formula' => 'maxGirthPrint = get_maxGirth(weight)',
                'var' => [
                    [
                        'l' => 'maxGirthPrint',
                        'f' => 'get_maxGirth(weight)',
                        'r' => ['weight'],
                    ],
                ],
            ],
        ],
        'datasets' => [],
        'js' => <<<'TXT'
        "use strict";omni.define("get_minWeight",function(girth){if(girth<8){return 0}else if(girth>=8&&girth<9){return 0}else if(girth>=9&&girth<=10){return 0}else if(girth>10&&girth<13){return 5}else if(girth>=13&&girth<=15){return 5}else if(girth>15&&girth<18){return 10}else if(girth>=18&&girth<22){return 10}else if(girth>=22&&girth<=23){return 10}else if(girth>23&&girth<28){return 25}else if(girth>=28&&girth<=29){return 25}else if(girth>29&&girth<=39){return 55}else if(girth>39&&girth<=48){return 75}else if(girth>48){return 75}});omni.define("get_maxWeight",function(girth){if(girth<8){return 0}else if(girth>=8&&girth<9){return 5}else if(girth>=9&&girth<=10){return 10}else if(girth>10&&girth<13){return 10}else if(girth>=13&&girth<=15){return 25}else if(girth>15&&girth<18){return 25}else if(girth>=18&&girth<22){return 55}else if(girth>=22&&girth<=23){return 75}else if(girth>23&&girth<28){return 75}else if(girth>=28&&girth<=29){return 343}else if(girth>29&&girth<=39){return 343}else if(girth>39&&girth<=48){return 343}else if(girth>48){return 343}});omni.define("get_minGirth",function(weight){if(weight>0&&weight<5){return 8}else if(weight===5){return 8}else if(weight>5&&weight<10){return 9}else if(weight===10){return 9}else if(weight>10&&weight<25){return 13}else if(weight===25){return 13}else if(weight>25&&weight<55){return 18}else if(weight===55){return 18}else if(weight>55&&weight<75){return 22}else if(weight===75){return 22}else if(weight>75){return 28}});omni.define("get_maxGirth",function(weight){if(weight>0&&weight<5){return 10}else if(weight===5){return 15}else if(weight>5&&weight<10){return 15}else if(weight===10){return 23}else if(weight>10&&weight<25){return 23}else if(weight===25){return 29}else if(weight>25&&weight<55){return 29}else if(weight===55){return 39}else if(weight>55&&weight<75){return 39}else if(weight===75){return 48}else if(weight>75){return 48}});//# sourceURL=customJs.js
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        Dog harness size works out minWeightPrint and maxWeightPrint from 🐾 Weight, 🐕 Girth and Min weight print imperial. Nothing is looked up on this page: minWeightPrint is computed from 🐾 Weight and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Dog harness size calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Dog harness size: it takes 6 numbers and reports minWeightPrint, maxWeightPrint and minGirthPrint.</p><p>Written with the labels from the form, minWeightPrint = get_minWeight(🐕 Girth).</p><p>The answers are minWeightPrint, maxWeightPrint, minGirthPrint and maxGirthPrint; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 6 boxes and the page has everything it needs.</p><ul><li><strong>🐾 Weight</strong> — in kilograms</li><li><strong>🐕 Girth</strong> — in centimeters. Chest circumference, measured by wrapping a tailor&#039;s tape around the widest area of the dog&#039;s chest.</li><li><strong>Min weight print imperial</strong> — in pounds</li><li><strong>Max weight print imperial</strong> — in pounds</li><li><strong>Min girth print imperial</strong> — in inches</li><li><strong>Max girth print imperial</strong> — in inches</li></ul><p>The answers come back as minWeightPrint, maxWeightPrint, minGirthPrint, maxGirthPrint. </p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>minWeightPrint</strong> = <code>get_minWeight(🐕 Girth)</code></li><li><strong>maxWeightPrint</strong> = <code>get_maxWeight(🐕 Girth)</code></li><li><strong>minGirthPrint</strong> = <code>get_minGirth(🐾 Weight)</code></li><li><strong>maxGirthPrint</strong> = <code>get_maxGirth(🐾 Weight)</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of minWeightPrint, maxWeightPrint and minGirthPrint can be the unknown.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> 🐾 Weight, 🐕 Girth and Min weight print imperial carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> minWeightPrint, maxWeightPrint and minGirthPrint are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Convert 🐾 Weight to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are 🐾 Weight, 🐕 Girth and Min weight print imperial and the number you are missing is minWeightPrint and maxWeightPrint.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/bacterial-growth-curve">Bacterial Growth Curve (generation time) Calculator</a>, <a href="/biology/basal-area">Basal area Calculator</a> and <a href="/biology/basal-metabolic-rate">Basal Metabolic Rate (Mifflin–St Jeor) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dog harness size calculator work out?', 'a' => 'minWeightPrint, maxWeightPrint, minGirthPrint and maxGirthPrint, from 🐕 Girth. The relationship is minWeightPrint = get_minWeight(🐕 Girth).'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            🐾 Weight (kilograms), 🐕 Girth (centimeters), Min weight print imperial (pounds), Max weight print imperial (pounds), Min girth print imperial (inches). With weight, girth and minWeightPrint_imperial in place, minWeightPrint can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. minWeightPrint, maxWeightPrint, minGirthPrint and maxGirthPrint can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of minWeightPrint is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave 🐾 Weight blank and the page solves for it, reporting minWeightPrint instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of minWeightPrint keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/bacterial-growth-curve', 'name' => 'Bacterial Growth Curve (generation time) Calculator'],
            ['path' => '/biology/basal-area', 'name' => 'Basal area Calculator'],
            ['path' => '/biology/basal-metabolic-rate', 'name' => 'Basal Metabolic Rate (Mifflin–St Jeor) Calculator'],
        ],
        'authors' => [],
    ],
];
