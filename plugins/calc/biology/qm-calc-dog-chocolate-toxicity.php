<?php

/**
 * Dog chocolate toxicity
 * /biology/dog-chocolate-toxicity
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dog chocolate toxicity',
    'meta' => ['title' => 'Dog chocolate toxicity: Formula, Steps & Results', 'description' => 'Dog chocolate toxicity takes Your dog\'s weight, Chocolate type and Amount eaten and returns Methylxanthines dose and Total methylxanthines received.', 'h1' => 'Dog chocolate toxicity Calculator', 'updated' => '2026-09-28'],
    'raw' => [
        'vars' => [
            'amount' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'caffeine' => [
                'type' => 'presentation',
                'rnd' => ['omni', '0.0001'],
            ],
            'chocolateType' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => '_HFxwvGyhgppZ0tjdh66l', 'c' => null],
                ],
                'ds' => 'KV0oN2pIjXIIHolqa16EQ',
            ],
            'methyl' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'methylReceived' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'theobromine' => [
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
                'uid' => '6WSCsxfy2pwhL3JsGz2v1',
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
                                    't' => 'v',
                                    'n' => 'chocolateType',
                                    'vt' => 'valueSelect',
                                    'l' => 'Chocolate type',
                                    'ds' => 'KV0oN2pIjXIIHolqa16EQ',
                                    'opts' => [
                                        ['lVKIQ9MG--gTBfPA8Uubv', 'White chocolate', '0.03882'],
                                        ['_HFxwvGyhgppZ0tjdh66l', 'Milk chocolate', '2.26'],
                                        ['4L0PvkQCCVwULoj5Eyd25', 'Dark-sweet chocolate', '5.295'],
                                        ['I1_FxROvjWA6GZPBvdyXt', '60% cocoa', '8.47'],
                                        ['9OHnHmgl7awUqS6fXMK2R', '72% cocoa', '10.15'],
                                        ['9hr-RtNL3LfsPGGyo9AS5', '86% cocoa', '12.13'],
                                        ['i4nHrIR1OCx4ommpUizbV', 'Syrup', '4.13'],
                                        ['4zXy2X1ohWFVqScSLYrZe', 'Dairy milkshake', '8.37'],
                                        ['TY_g18JawdisJYefzuoGp', 'Chocolate pudding', '5.98'],
                                        ['zVjJHMEfe5G4-oT6fGVs8', 'Chocolate cake', '4.3'],
                                        ['0kL27bOjTrm6YNeMBqqgh', 'Candies, sweet chocolate', '4.92'],
                                        ['MSfTjzWZEEQUUWc8i1gOR', 'Candies, semi-sweet', '5.48'],
                                        ['WKht2KlksfIPzwmudDSnX', 'Candies, dark', '5.85'],
                                        ['qzhxJ7_jy_4A4YbL2WM3L', 'Semi-sweet choco chips', '5.65'],
                                        ['cnLJk2x1MMBnMYunRBswv', 'Unsweetened (baking)', '15.52'],
                                        ['OVIndOB_jIDe4jmCahlf-', 'Dry cocoa powder', '28.46'],
                                        ['3oK_ehG7lfrW4Z_BrBQYA', 'Instant cocoa powder', '5.33'],
                                        ['LLH6WeDFeFwAi0EA_VJ18', 'Cocoa beans', '21.16'],
                                        ['NhNQmxnMQAUcJ6SUWQ7ec', 'Cocoa bean hulls, mulch', '8.99'],
                                        ['4gUkg7N2KEHF1KtfgrV7B', 'Ice creams', '0.65'],
                                        ['qYthwGkKH51DAa7FuSZLD', 'Coffee beans/grounds', '21.16'],
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
                                    'n' => 'amount',
                                    'vt' => 'numerical',
                                    'l' => 'Amount eaten',
                                    'h' => 'Quantity of chocolate that your pet ate',
                                    'us' => '22',
                                    'du' => 'g',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'eMwNpUQkhBqNDA9eLitR3',
                'title' => 'Results',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'methyl',
                                    'vt' => 'numerical',
                                    'l' => 'Methylxanthines dose',
                                    'h' => 'Substances in chocolate that cause the poisoning in dogs (theobromine + caffeine combined).',
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
                                    'n' => 'methylReceived',
                                    'vt' => 'numerical',
                                    'l' => 'Total methylxanthines received',
                                    'h' => 'A total dose of methylxanthine eaten by your dog.',
                                    'us' => '22',
                                    'du' => 'mg',
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
                                        ['methyl<15.01', '✅ Your dog\'s going to be OK.'],
                                        ['methyl<34.02 and methyl>=15.01', '❌ Your pet may suffer from diarrhea and vomiting.'],
                                        ['methyl<45 and  methyl>=34.02', '❗ Your pet may experience rapid heart rate (tachyarrhythmia), diarrhea, and vomiting. Find help immediately.'],
                                        ['methyl<55.01 and  methyl>=45', '❗ Your pet may experience tremors and seizures. Find help immediately.'],
                                        ['methyl>=55.01', '💀❗ Your pet\'s at risk of death. Find help immediately.'],
                                        [null, 'Caffeine dose received: {{caffeine.value}}&nbsp;mg/kg Theobromine dose received: {{theobromine.value}}&nbsp;mg/kg Methylxantines = Theobromine + Caffeine'],
                                        [null, 'Consult your vet in case of any doubt, suspicious behavior or worsening state of your pet.'],
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
                                        [null, 'Check out how to use this calculator!'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'W_ZL2BP-JSE6-3av51onX',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'theobromine', 'vt' => 'presentation', 'l' => ''],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'caffeine', 'vt' => 'presentation', 'l' => ''],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => '(chocolateType * amount)/weight = methyl',
                'var' => [
                    [
                        'l' => 'methyl',
                        'f' => 'amount*chocolateType/weight',
                        'r' => ['weight', 'chocolateType', 'amount'],
                    ],
                    [
                        'l' => 'weight',
                        'f' => 'amount*chocolateType/methyl',
                        'r' => ['methyl', 'chocolateType', 'amount'],
                    ],
                    [
                        'l' => 'chocolateType',
                        'f' => 'methyl*weight/amount',
                        'r' => ['methyl', 'weight', 'amount'],
                    ],
                    [
                        'l' => 'amount',
                        'f' => 'methyl*weight/chocolateType',
                        'r' => ['methyl', 'weight', 'chocolateType'],
                    ],
                ],
            ],
            [
                'formula' => 'chocolateType * amount = methylReceived',
                'var' => [
                    [
                        'l' => 'chocolateType',
                        'f' => 'methylReceived/amount',
                        'r' => ['methylReceived', 'amount'],
                    ],
                    [
                        'l' => 'methylReceived',
                        'f' => 'amount*chocolateType',
                        'r' => ['chocolateType', 'amount'],
                    ],
                    [
                        'l' => 'amount',
                        'f' => 'methylReceived/chocolateType',
                        'r' => ['chocolateType', 'methylReceived'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'KV0oN2pIjXIIHolqa16EQ' => [
                'name' => 'chocolate',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'lVKIQ9MG--gTBfPA8Uubv', 'label' => 'White chocolate', 'value' => '0.03882'],
                    ['uid' => '_HFxwvGyhgppZ0tjdh66l', 'label' => 'Milk chocolate', 'value' => '2.26'],
                    ['uid' => '4L0PvkQCCVwULoj5Eyd25', 'label' => 'Dark-sweet chocolate', 'value' => '5.295'],
                    ['uid' => 'I1_FxROvjWA6GZPBvdyXt', 'label' => '60% cocoa', 'value' => '8.47'],
                    ['uid' => '9OHnHmgl7awUqS6fXMK2R', 'label' => '72% cocoa', 'value' => '10.15'],
                    ['uid' => '9hr-RtNL3LfsPGGyo9AS5', 'label' => '86% cocoa', 'value' => '12.13'],
                    ['uid' => 'i4nHrIR1OCx4ommpUizbV', 'label' => 'Syrup', 'value' => '4.13'],
                    ['uid' => '4zXy2X1ohWFVqScSLYrZe', 'label' => 'Dairy milkshake', 'value' => '8.37'],
                    ['uid' => 'TY_g18JawdisJYefzuoGp', 'label' => 'Chocolate pudding', 'value' => '5.98'],
                    ['uid' => 'zVjJHMEfe5G4-oT6fGVs8', 'label' => 'Chocolate cake', 'value' => '4.3'],
                    ['uid' => '0kL27bOjTrm6YNeMBqqgh', 'label' => 'Candies, sweet chocolate', 'value' => '4.92'],
                    ['uid' => 'MSfTjzWZEEQUUWc8i1gOR', 'label' => 'Candies, semi-sweet', 'value' => '5.48'],
                    ['uid' => 'WKht2KlksfIPzwmudDSnX', 'label' => 'Candies, dark', 'value' => '5.85'],
                    ['uid' => 'qzhxJ7_jy_4A4YbL2WM3L', 'label' => 'Semi-sweet choco chips', 'value' => '5.65'],
                    ['uid' => 'cnLJk2x1MMBnMYunRBswv', 'label' => 'Unsweetened (baking)', 'value' => '15.52'],
                    ['uid' => 'OVIndOB_jIDe4jmCahlf-', 'label' => 'Dry cocoa powder', 'value' => '28.46'],
                    ['uid' => '3oK_ehG7lfrW4Z_BrBQYA', 'label' => 'Instant cocoa powder', 'value' => '5.33'],
                    ['uid' => 'LLH6WeDFeFwAi0EA_VJ18', 'label' => 'Cocoa beans', 'value' => '21.16'],
                    ['uid' => 'NhNQmxnMQAUcJ6SUWQ7ec', 'label' => 'Cocoa bean hulls, mulch', 'value' => '8.99'],
                    ['uid' => '4gUkg7N2KEHF1KtfgrV7B', 'label' => 'Ice creams', 'value' => '0.65'],
                    ['uid' => 'qYthwGkKH51DAa7FuSZLD', 'label' => 'Coffee beans/grounds', 'value' => '21.16'],
                ],
            ],
        ],
        'js' => <<<'TXT'
        "use strict";omni.define("getcaffeine",function(chocolateType){var caffeine;var caffeineArray=[0.03,0.21,0.705,0.91,1.09,1.3,0.06,0.04,0.02,0.06,0.66,0.62,0.7,0.78,1.66,2.47,0.53,0,0,0.03,21.16];var methyArray=[0.03882,2.26,5.295,8.47,10.15,12.13,4.13,8.37,5.98,4.3,4.92,5.48,5.85,5.65,15.52,28.46,5.33,21.16,8.99,0.65,21.16];for(var i=0;i<22;i++){if(chocolateType===methyArray[i]){caffeine=caffeineArray[i]}}return caffeine});omni.define("gettheobromine",function(chocolateType){var theobromine;var theobromineArray=[0.00882,2.05,4.59,7.56,9.06,10.83,4.07,8.33,5.96,4.24,4.26,4.86,5.15,4.87,13.86,25.99,4.8,21.16,8.99,0.62,0];var methyArray=[0.03882,2.26,5.295,8.47,10.15,12.13,4.13,8.37,5.98,4.3,4.92,5.48,5.85,5.65,15.52,28.46,5.33,21.16,8.99,0.65,21.16];for(var i=0;i<22;i++){if(chocolateType===methyArray[i]){theobromine=theobromineArray[i]}}return theobromine});//# sourceURL=customJs.js
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        Dog chocolate toxicity takes Your dog's weight, Chocolate type and Amount eaten and returns Methylxanthines dose and Total methylxanthines received. Nothing is looked up on this page: Methylxanthines dose is computed from Your dog's weight and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Methylxanthines dose is opened in kilograms; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Dog chocolate toxicity calculator works', 'html' => <<<'TXT'
            <p>Dog chocolate toxicity answers one question from 3 numbers, and the answer is Methylxanthines dose and Total methylxanthines received.</p><p>The relationship it solves reads Methylxanthines dose = Amount eaten × Chocolate type ÷ Your dog&#039;s weight.</p><p>The answers are Methylxanthines dose and Total methylxanthines received; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Your dog&#039;s weight</strong> — in kilograms</li><li><strong>Chocolate type</strong> — a plain number, no unit</li><li><strong>Amount eaten</strong> — in grams. Quantity of chocolate that your pet ate</li></ul><p>The answers come back as Methylxanthines dose in kilograms, Total methylxanthines received in milligrams. </p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Methylxanthines dose offers 27 units and opens on kilograms, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Methylxanthines dose</strong> = <code>Amount eaten × Chocolate type ÷ Your dog&#039;s weight</code></li><li><strong>Your dog&#039;s weight</strong> = <code>Amount eaten × Chocolate type ÷ Methylxanthines dose</code></li><li><strong>Chocolate type</strong> = <code>Methylxanthines dose × Your dog&#039;s weight ÷ Amount eaten</code></li><li><strong>Amount eaten</strong> = <code>Methylxanthines dose × Your dog&#039;s weight ÷ Chocolate type</code></li><li><strong>Total methylxanthines received</strong> = <code>Amount eaten × Chocolate type</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Methylxanthines dose, Your dog&#039;s weight and Chocolate type can be the unknown.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Your dog&#039;s weight and Amount eaten is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Methylxanthines dose and Total methylxanthines received are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> If Your dog&#039;s weight is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Your dog&#039;s weight, Chocolate type and Amount eaten is what you already know and Methylxanthines dose and Total methylxanthines received is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/cell-doubling-time">Cell doubling time Calculator</a>, <a href="/biology/cell-seeding-density">Cell Seeding Density Calculator</a> and <a href="/biology/cell-surface-area-volume-ratio">Cell Surface Area to Volume Ratio Calculator — Formula &amp; Resul</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dog chocolate toxicity calculator work out?', 'a' => <<<'TXT'
            Methylxanthines dose and Total methylxanthines received, from Your dog's weight, Chocolate type and Amount eaten. The relationship is Methylxanthines dose = Amount eaten × Chocolate type ÷ Your dog's weight.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Your dog's weight (kilograms), Chocolate type, Amount eaten (grams). With weight, chocolateType and amount in place, Methylxanthines dose can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Methylxanthines dose, Your dog's weight, Chocolate type and Amount eaten can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Methylxanthines dose is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Your dog's weight left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Methylxanthines dose keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/cell-doubling-time', 'name' => 'Cell doubling time Calculator'],
            ['path' => '/biology/cell-seeding-density', 'name' => 'Cell Seeding Density Calculator'],
            ['path' => '/biology/cell-surface-area-volume-ratio', 'name' => 'Cell Surface Area to Volume Ratio Calculator — Formula & Resul'],
        ],
        'authors' => [],
    ],
];
