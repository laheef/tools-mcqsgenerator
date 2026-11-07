<?php

/**
 * Cat chocolate toxicity
 * /biology/cat-chocolate-toxicity
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cat chocolate toxicity',
    'meta' => ['title' => 'Cat chocolate toxicity Calculator: Free, With Steps', 'description' => 'Cat chocolate toxicity turns Your cat\'s weight, Amount eaten and Methylxanthines dose into Chocolate type and Total methylxanthines received.', 'h1' => 'Cat chocolate toxicity Calculator', 'updated' => '2026-05-25'],
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
                    ['v' => 'DHMZbK8J1B0VpPA-1UYLV', 'c' => null],
                ],
                'ds' => '8nYqZfLWq-fs5htcKh7ns',
            ],
            'methyl' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'methylReceived' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'theo' => [
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
                'uid' => 'OwvfWwO9CD7Hzx4ceIh2t',
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
                                    'l' => 'Your cat\'s weight',
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
                                    'ds' => '8nYqZfLWq-fs5htcKh7ns',
                                    'opts' => [
                                        ['K4WyHuwj-4OEYkeu8v8kR', 'White chocolate', '0.03882'],
                                        ['DHMZbK8J1B0VpPA-1UYLV', 'Milk chocolate', '2.26'],
                                        ['JSdIBRD4_f--X-TzIpFM_', 'Dark-sweet chocolate', '5.295'],
                                        ['I-JCZfH5u-eZ9h0w_B9vN', '60% cocoa', '8.47'],
                                        ['FZiX5F72Zmd0grQV6173L', '72% cocoa', '10.15'],
                                        ['obhHH3L8cea7PYjHApPPZ', '86% cocoa', '12.13'],
                                        ['tQ-64iSqtLZLNV1Hq9czz', 'Syrup', '4.13'],
                                        ['Lgm-dbvUD5t0DckUODEhr', 'Dairy milkshake', '8.37'],
                                        ['V3hXReNY1S1jMQ2e5AxWW', 'Chocolate pudding', '5.98'],
                                        ['8GWA6i_pIDA1-Fz-WNPcQ', 'Chocolate cake', '4.3'],
                                        ['iwTcPnbKqADX46Wpdfhrr', 'Candies, sweet chocolate', '4.92'],
                                        ['uJxtkbFcPMZY1wXTLMftq', 'Candies, semi-sweet', '5.48'],
                                        ['UjPhMLhXF1kaV2B8q1fM0', 'Candies, dark', '5.85'],
                                        ['O3uLnX8t3cm4QiPefeQhZ', 'Semi-sweet choco chips', '5.65'],
                                        ['MOhIgo4qtEPbZXutO_jAs', 'Unsweetened (baking)', '15.52'],
                                        ['vJ9vUqEEqC0HQnq2QstTy', 'Dry cocoa powder', '28.46'],
                                        ['Rq9HQ2ip6hZMb60aLs8wl', 'Instant cocoa powder', '5.33'],
                                        ['igPzdm-yXtNdifp4ipjNb', 'Cocoa beans', '21.16'],
                                        ['eX2k-ygoPGtQYjakoBWoc', 'Cocoa bean hulls, mulch', '8.99'],
                                        ['fr2Oe6nUous-FcPKBuan9', 'Ice creams', '0.65'],
                                        ['Nqjts0FmuJXxVtLHi8o-x', 'Coffee beans/grounds', '21.16'],
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
                                    'h' => 'Quantity of chocolate that your pet has eaten.',
                                    'us' => '22',
                                    'du' => 'g',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'Jrk5eLhzLYNSIOiRoyfJu',
                'title' => '',
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
                                        ['methyl<15.01', '✅ Your cat is going to be ok.'],
                                        ['methyl<34.02 and methyl>=15.01', '❌ Your cat may suffer from diarrhea and vomiting.'],
                                        ['methyl<45 and methyl>=34.02', '❗ Your cat may experience rapid heart rate (tachyarrhythmia), diarrhea, and vomiting. Find help immediately.'],
                                        ['methyl<55.01 and methyl>=45', '❗ Your cat may experience tremors and seizures. Find help immediately.'],
                                        ['methyl>=55.01', '💀❗ Your cat is at risk of death. Find help immediately.'],
                                    ],
                                ],
                                [
                                    't' => 'x',
                                    'c' => [
                                        [null, 'Caffeine dose received: {{caffeine.value}}&nbsp;mg/kg Theobromine dose received: {{theo.value}}&nbsp;mg/kg Methylxantines = Theobromine + Caffeine'],
                                    ],
                                ],
                                [
                                    't' => 'x',
                                    'c' => [
                                        [null, 'Consult your vet in case of any doubt, suspicious behaviour or worsening state of your pet.'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'ddbnq7zuTqeakS25uASbQ',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'caffeine', 'vt' => 'presentation', 'l' => 'Caffeine'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'theo', 'vt' => 'presentation', 'l' => 'Theo'],
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
                        'l' => 'chocolateType',
                        'f' => 'methyl*weight/amount',
                        'r' => ['methyl', 'weight', 'amount'],
                    ],
                    [
                        'l' => 'methyl',
                        'f' => 'amount*chocolateType/weight',
                        'r' => ['chocolateType', 'weight', 'amount'],
                    ],
                    [
                        'l' => 'weight',
                        'f' => 'amount*chocolateType/methyl',
                        'r' => ['chocolateType', 'methyl', 'amount'],
                    ],
                    [
                        'l' => 'amount',
                        'f' => 'methyl*weight/chocolateType',
                        'r' => ['chocolateType', 'methyl', 'weight'],
                    ],
                ],
            ],
            [
                'formula' => 'chocolateType * amount = methylReceived',
                'var' => [
                    [
                        'l' => 'chocolateType',
                        'f' => 'methylReceived/amount',
                        'r' => ['amount', 'methylReceived'],
                    ],
                    [
                        'l' => 'amount',
                        'f' => 'methylReceived/chocolateType',
                        'r' => ['chocolateType', 'methylReceived'],
                    ],
                    [
                        'l' => 'methylReceived',
                        'f' => 'amount*chocolateType',
                        'r' => ['chocolateType', 'amount'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            '8nYqZfLWq-fs5htcKh7ns' => [
                'name' => 'chocolate_VS',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'K4WyHuwj-4OEYkeu8v8kR', 'label' => 'White chocolate', 'value' => '0.03882'],
                    ['uid' => 'DHMZbK8J1B0VpPA-1UYLV', 'label' => 'Milk chocolate', 'value' => '2.26'],
                    ['uid' => 'JSdIBRD4_f--X-TzIpFM_', 'label' => 'Dark-sweet chocolate', 'value' => '5.295'],
                    ['uid' => 'I-JCZfH5u-eZ9h0w_B9vN', 'label' => '60% cocoa', 'value' => '8.47'],
                    ['uid' => 'FZiX5F72Zmd0grQV6173L', 'label' => '72% cocoa', 'value' => '10.15'],
                    ['uid' => 'obhHH3L8cea7PYjHApPPZ', 'label' => '86% cocoa', 'value' => '12.13'],
                    ['uid' => 'tQ-64iSqtLZLNV1Hq9czz', 'label' => 'Syrup', 'value' => '4.13'],
                    ['uid' => 'Lgm-dbvUD5t0DckUODEhr', 'label' => 'Dairy milkshake', 'value' => '8.37'],
                    ['uid' => 'V3hXReNY1S1jMQ2e5AxWW', 'label' => 'Chocolate pudding', 'value' => '5.98'],
                    ['uid' => '8GWA6i_pIDA1-Fz-WNPcQ', 'label' => 'Chocolate cake', 'value' => '4.3'],
                    ['uid' => 'iwTcPnbKqADX46Wpdfhrr', 'label' => 'Candies, sweet chocolate', 'value' => '4.92'],
                    ['uid' => 'uJxtkbFcPMZY1wXTLMftq', 'label' => 'Candies, semi-sweet', 'value' => '5.48'],
                    ['uid' => 'UjPhMLhXF1kaV2B8q1fM0', 'label' => 'Candies, dark', 'value' => '5.85'],
                    ['uid' => 'O3uLnX8t3cm4QiPefeQhZ', 'label' => 'Semi-sweet choco chips', 'value' => '5.65'],
                    ['uid' => 'MOhIgo4qtEPbZXutO_jAs', 'label' => 'Unsweetened (baking)', 'value' => '15.52'],
                    ['uid' => 'vJ9vUqEEqC0HQnq2QstTy', 'label' => 'Dry cocoa powder', 'value' => '28.46'],
                    ['uid' => 'Rq9HQ2ip6hZMb60aLs8wl', 'label' => 'Instant cocoa powder', 'value' => '5.33'],
                    ['uid' => 'igPzdm-yXtNdifp4ipjNb', 'label' => 'Cocoa beans', 'value' => '21.16'],
                    ['uid' => 'eX2k-ygoPGtQYjakoBWoc', 'label' => 'Cocoa bean hulls, mulch', 'value' => '8.99'],
                    ['uid' => 'fr2Oe6nUous-FcPKBuan9', 'label' => 'Ice creams', 'value' => '0.65'],
                    ['uid' => 'Nqjts0FmuJXxVtLHi8o-x', 'label' => 'Coffee beans/grounds', 'value' => '21.16'],
                ],
            ],
        ],
        'js' => <<<'TXT'
        "use strict";omni.define("getcaffeine",function(chocolateType){var caffeine;var caffeineArray=[0.03,0.21,0.705,0.91,1.09,1.3,0.06,0.04,0.02,0.06,0.66,0.62,0.7,0.78,1.66,2.47,0.53,0,0,0.03,21.16];var methyArray=[0.03882,2.26,5.295,8.47,10.15,12.13,4.13,8.37,5.98,4.3,4.92,5.48,5.85,5.65,15.52,28.46,5.33,21.16,8.99,0.65,21.16];for(var i=0;i<22;i++){if(chocolateType===methyArray[i]){caffeine=caffeineArray[i]}}return caffeine});omni.define("gettheobromine",function(chocolateType){var theobromine;var theobromineArray=[0.00882,2.05,4.59,7.56,9.06,10.83,4.07,8.33,5.96,4.24,4.26,4.86,5.15,4.87,13.86,25.99,4.8,21.16,8.99,0.62,0];var methyArray=[0.03882,2.26,5.295,8.47,10.15,12.13,4.13,8.37,5.98,4.3,4.92,5.48,5.85,5.65,15.52,28.46,5.33,21.16,8.99,0.65,21.16];for(var i=0;i<22;i++){if(chocolateType===methyArray[i]){theobromine=theobromineArray[i]}}return theobromine});//# sourceURL=customJs.js
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        Cat chocolate toxicity turns Your cat's weight, Amount eaten and Methylxanthines dose into Chocolate type and Total methylxanthines received. It is a single relationship that reads Chocolate type out of Your cat's weight, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Cat chocolate toxicity calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Cat chocolate toxicity: it takes 3 numbers and reports Chocolate type and Total methylxanthines received.</p><p>In the form&#039;s own words, Chocolate type = Methylxanthines dose × Your cat&#039;s weight ÷ Amount eaten.</p><p>The result panel carries Chocolate type and Total methylxanthines received, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Your cat&#039;s weight</strong> — in kilograms</li><li><strong>Amount eaten</strong> — in grams. Quantity of chocolate that your pet has eaten.</li><li><strong>Methylxanthines dose</strong> — in kilograms. Substances in chocolate that cause the poisoning in dogs (theobromine + caffeine combined).</li></ul><p>What you get back is Chocolate type, Total methylxanthines received in milligrams, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Total methylxanthines received offers 27 units and opens on milligrams, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Chocolate type</strong> = <code>Methylxanthines dose × Your cat&#039;s weight ÷ Amount eaten</code></li><li><strong>Methylxanthines dose</strong> = <code>Amount eaten × Chocolate type ÷ Your cat&#039;s weight</code></li><li><strong>Your cat&#039;s weight</strong> = <code>Amount eaten × Chocolate type ÷ Methylxanthines dose</code></li><li><strong>Amount eaten</strong> = <code>Methylxanthines dose × Your cat&#039;s weight ÷ Chocolate type</code></li><li><strong>Total methylxanthines received</strong> = <code>Amount eaten × Chocolate type</code></li></ul><p>Any one of Chocolate type, Methylxanthines dose and Your cat&#039;s weight can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Your cat&#039;s weight, Amount eaten and Methylxanthines dose is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Chocolate type and Total methylxanthines received are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Convert Your cat&#039;s weight to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Your cat&#039;s weight, Amount eaten and Methylxanthines dose measured, Chocolate type and Total methylxanthines received wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/dog-raisin-toxicity">Dog raisin toxicity Calculator</a>, <a href="/biology/dog-size">Dog size Calculator</a> and <a href="/biology/dog-water-intake">Dog water intake Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cat chocolate toxicity calculator work out?', 'a' => <<<'TXT'
            Chocolate type and Total methylxanthines received, from Methylxanthines dose, Your cat's weight and Amount eaten. The relationship is Chocolate type = Methylxanthines dose × Your cat's weight ÷ Amount eaten.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Your cat's weight (kilograms), Amount eaten (grams), Methylxanthines dose (kilograms). Enter weight, amount and methyl; Chocolate type is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Chocolate type, Methylxanthines dose, Your cat's weight and Amount eaten blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Chocolate type is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Your cat's weight left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Chocolate type keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/dog-raisin-toxicity', 'name' => 'Dog raisin toxicity Calculator'],
            ['path' => '/biology/dog-size', 'name' => 'Dog size Calculator'],
            ['path' => '/biology/dog-water-intake', 'name' => 'Dog water intake Calculator'],
        ],
        'authors' => [],
    ],
];
