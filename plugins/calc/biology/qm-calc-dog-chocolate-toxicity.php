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
    'meta' => ['title' => 'Dog chocolate toxicity: Formula, Steps & Results', 'description' => '<strong>methylxanthines dose</strong> is what the Dog chocolate toxicity calculator works out, and it gets there from your dog\'s weight, the amount eaten and…', 'h1' => 'Dog chocolate toxicity Calculator', 'updated' => '2026-09-28'],
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
        <strong>methylxanthines dose</strong> is what the Dog chocolate toxicity calculator works out, and it gets there from your dog's weight, the amount eaten and the total methylxanthines received.
        TXT,
        'sections' => [
            ['title' => 'How does the Dog chocolate toxicity calculator work?', 'html' => <<<'TXT'
            <p>The Dog chocolate toxicity calculator takes the values in the form, applies the relationship described below and reports <strong>methylxanthines dose</strong> in the results panel.</p>
            <p>Working from the top of the form: you type in your dog's weight, the amount eaten and the total methylxanthines received.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>A measured quantity, entered by default in grams. </li><li>A measured quantity, entered by default in milligrams. </li></ul><p>One field on this form is a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Your dog's weight</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>You supply it</td></tr><tr><td><strong>Chocolate type</strong></td><td>One of 21 options, such as white chocolate, milk chocolate and dark-sweet chocolate.</td><td>choice</td><td>Calculated</td></tr><tr><td><strong>Amount eaten</strong></td><td>A measured quantity, 29 units available.</td><td>grams</td><td>You supply it</td></tr><tr><td><strong>Methylxanthines dose</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>Calculated</td></tr><tr><td><strong>Total methylxanthines received</strong></td><td>A measured quantity, 29 units available.</td><td>milligrams</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Dog chocolate toxicity calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Methylxanthines dose</span><span class="formula-eq">=</span><span class="formula-rhs">amount eaten × chocolate type ÷ your dog&#x27;s weight</span></div><div class="formula-row"><span class="formula-lhs">Chocolate type</span><span class="formula-eq">=</span><span class="formula-rhs">total methylxanthines received ÷ amount eaten</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What is a worked example?', 'html' => <<<'TXT'
            <p>Take <strong>Your dog's weight</strong> = 10 kg, <strong>Chocolate type</strong> set to Milk chocolate, <strong>Amount eaten</strong> = 1000 g and <strong>Methylxanthines dose</strong> = 10 kg. The calculator returns <strong>Total methylxanthines received</strong> = 2260 mg.</p><p>Read it as a template. Every number above can be replaced with one of yours; only the relationship between them is fixed.</p><ol><li>Enter the values listed above, matching the units each box asks for.</li><li>Read off the result. Any field you leave empty is the one the calculator solves for.</li><li>Sanity-check the number against the relationship: <strong>Total methylxanthines received</strong> = 2260 mg should be roughly the size you expected from <strong>Your dog's weight</strong> = 10 kg and <strong>Chocolate type</strong> set to Milk chocolate.</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li><li>The option the calculation settles on.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Mass, opening in kilograms</li><li>Mass, opening in grams</li><li>Mass, opening in kilograms</li><li>Mass, opening in milligrams</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Dog chocolate toxicity calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Supporting a lesson, a lecture or a field note</li><li>Comparing two organisms, populations or processes</li><li>Putting a biological quantity into a scale you can picture</li><li>Any time the same 3 figures keep coming back — your dog's weight, the amount eaten and the total methylxanthines received — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li><li>Keep the units you enter consistent. </li><li>Write the answer down with its unit. </li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/dog-crate-size">Dog crate size</a>, <a href="/biology/dog-food">Dog food</a> and <a href="/biology/dog-harness-size">Dog harness size</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dog chocolate toxicity calculator work out?', 'a' => <<<'TXT'
            It returns methylxanthines dose, derived from your dog's weight, the amount eaten and the total methylxanthines received. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Dog chocolate toxicity calculator?', 'a' => <<<'TXT'
            The form asks for your dog's weight, the amount eaten and the total methylxanthines received, which is 3 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter your dog\'s weight in a different unit?', 'a' => <<<'TXT'
            Yes. Your dog's weight opens in kilograms and the chip beside it offers 29 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
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
            ['q' => 'Is the Dog chocolate toxicity calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/dog-crate-size', 'name' => 'Dog crate size'],
            ['path' => '/biology/dog-food', 'name' => 'Dog food'],
            ['path' => '/biology/dog-harness-size', 'name' => 'Dog harness size'],
        ],
    ],
];
