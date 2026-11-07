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
    'meta' => ['title' => 'Cat chocolate toxicity Calculator: Free, With Steps', 'description' => '<strong>chocolate type</strong> is what the Cat chocolate toxicity calculator works out, and it gets there from your cat\'s weight, the methylxanthines dose…', 'h1' => 'Cat chocolate toxicity Calculator', 'updated' => '2026-05-25'],
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
        <strong>chocolate type</strong> is what the Cat chocolate toxicity calculator works out, and it gets there from your cat's weight, the methylxanthines dose and the total methylxanthines received.
        TXT,
        'sections' => [
            ['title' => 'How does the Cat chocolate toxicity calculator work?', 'html' => <<<'TXT'
            <p>The Cat chocolate toxicity calculator takes the values in the form, applies the relationship described below and reports <strong>chocolate type</strong> in the results panel.</p>
            <p>Working from the top of the form: you type in your cat's weight, the methylxanthines dose and the total methylxanthines received.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => '<ul><li>A measured quantity, entered by default in milligrams. </li></ul><p>One field on this form is a choice rather than a number. </p>'],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Your cat's weight</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>You supply it</td></tr><tr><td><strong>Chocolate type</strong></td><td>One of 21 options, such as white chocolate, milk chocolate and dark-sweet chocolate.</td><td>choice</td><td>Calculated</td></tr><tr><td><strong>Amount eaten</strong></td><td>A measured quantity, 29 units available.</td><td>grams</td><td>Calculated</td></tr><tr><td><strong>Methylxanthines dose</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>You supply it</td></tr><tr><td><strong>Total methylxanthines received</strong></td><td>A measured quantity, 29 units available.</td><td>milligrams</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Cat chocolate toxicity calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Chocolate type</span><span class="formula-eq">=</span><span class="formula-rhs">methylxanthines dose × your cat&#x27;s weight ÷ amount eaten</span></div><div class="formula-row"><span class="formula-lhs">Chocolate type</span><span class="formula-eq">=</span><span class="formula-rhs">total methylxanthines received ÷ amount eaten</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What is a worked example?', 'html' => <<<'TXT'
            <p>Take <strong>Your cat's weight</strong> = 10 kg, <strong>Chocolate type</strong> set to Milk chocolate, <strong>Amount eaten</strong> = 1000 g and <strong>Methylxanthines dose</strong> = 10 kg. The calculator returns <strong>Total methylxanthines received</strong> = 2260 mg.</p><p>The point of the example is the scale, not the particular digits: swap in your own figures and the same relationship produces your answer.</p><ol><li>Enter the values listed above, matching the units each box asks for.</li><li>Read off the result. Any field you leave empty is the one the calculator solves for.</li><li>Sanity-check the number against the relationship: <strong>Total methylxanthines received</strong> = 2260 mg should be roughly the size you expected from <strong>Your cat's weight</strong> = 10 kg and <strong>Chocolate type</strong> set to Milk chocolate.</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>The option the calculation settles on.</li><li>Shown in grams, and convertible to any of the 29 units on that chip.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Mass, opening in kilograms</li><li>Mass, opening in grams</li><li>Mass, opening in kilograms</li><li>Mass, opening in milligrams</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Cat chocolate toxicity calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Putting a biological quantity into a scale you can picture</li><li>Comparing two organisms, populations or processes</li><li>Supporting a lesson, a lecture or a field note</li><li>Any time the same 3 figures keep coming back — your cat's weight, the methylxanthines dose and the total methylxanthines received — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Write the answer down with its unit. </li><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li><li>Round only at the end. </li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/cat-pregnancy">Cat pregnancy</a>, <a href="/biology/cat-quality-of-life">Cat quality of life</a> and <a href="/biology/catculator">Catculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cat chocolate toxicity calculator work out?', 'a' => <<<'TXT'
            It returns chocolate type, derived from your cat's weight, the methylxanthines dose and the total methylxanthines received. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Cat chocolate toxicity calculator?', 'a' => <<<'TXT'
            The form asks for your cat's weight, the methylxanthines dose and the total methylxanthines received, which is 3 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter your cat\'s weight in a different unit?', 'a' => <<<'TXT'
            Yes. Your cat's weight opens in kilograms and the chip beside it offers 29 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There is one choice to make (1 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'What is a typical result?', 'a' => <<<'TXT'
            With the values the page starts from, the calculator reports Total methylxanthines received = 2260 mg. Treat that as a reference point rather than a recommendation: it exists so you can tell at a glance whether your own inputs are on the same scale.
            TXT],
            ['q' => 'Is the Cat chocolate toxicity calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/cat-pregnancy', 'name' => 'Cat pregnancy'],
            ['path' => '/biology/cat-quality-of-life', 'name' => 'Cat quality of life'],
            ['path' => '/biology/catculator', 'name' => 'Catculator'],
        ],
    ],
];
