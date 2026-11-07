<?php

/**
 * Dog raisin toxicity
 * /biology/dog-raisin-toxicity
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dog raisin toxicity',
    'meta' => ['title' => 'Dog raisin toxicity: Formula, Steps & Results', 'description' => <<<'TXT'
    Dog raisin toxicity works out Toxic amount of raisins and Size of raisins from Your dog's weight 🐕. There is no hidden constant here: change Toxic amount of…
    TXT, 'h1' => 'Dog raisin toxicity Calculator', 'updated' => '2026-09-28'],
    'raw' => [
        'vars' => [
            'amount' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.1'],
            ],
            'raisin_size' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'KYuI8cLcpgYaHyLXr37GW', 'c' => null],
                ],
                'ds' => 'JYfO3FozK4NpX1NV-_XOa',
            ],
            'toxic_amount' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.01'],
            ],
            'weight_kg' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'L1r413CmzPUyydaqOimW5',
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
                                        ['weight_kg == 3.62873896  and raisin_size == $raisinsDS[\'Standard\']', 'Onim Example 1: If my Affenpinscher weighs 8 pounds, what\'s the maximum number of standard raisins it can eat?&nbsp;'],
                                        ['weight_kg == 24.94758035 and raisin_size == $raisinsDS[\'Small\']', 'Onim Example 2: If my Labrador weighs 55 pounds, what\'s the maximum number of small raisins it can eat?&nbsp;'],
                                        ['amount == 4 and raisin_size == $raisinsDS[\'Jumbo\']', 'Onim Example 3: How much does my dog need to weigh to safely eat 4 jumbo raisins?'],
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
                                    'n' => 'weight_kg',
                                    'vt' => 'numerical',
                                    'l' => 'Your dog\'s weight 🐕',
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
                                    'n' => 'toxic_amount',
                                    'vt' => 'numerical',
                                    'l' => 'Toxic amount of raisins',
                                    'h' => 'The lowest reported raisin toxicity of around 2.8 grams per kilogram weight of the dog.',
                                    'us' => '22',
                                    'du' => 'g',
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
                                    'n' => 'raisin_size',
                                    'vt' => 'valueSelect',
                                    'l' => 'Size of raisins',
                                    'ds' => 'JYfO3FozK4NpX1NV-_XOa',
                                    'opts' => [
                                        ['d2bOjuxNXCl7YnmmGPitj', 'Small', '2'],
                                        ['KYuI8cLcpgYaHyLXr37GW', 'Standard', '1'],
                                        ['EpHMMh1dSvNKk4etIY6dp', 'Jumbo', '0.6666'],
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
                                    'l' => 'Toxic number of raisins (approx.)',
                                    'h' => 'Amount may vary depending on the type and brand of raisins.',
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
                                        [null, <<<'TXT'
                                        The given amount is just a suggestion and should not be taken as a medical advice, please contact your veterinarian immediately if your dog consumed even a small amount of raisins!
                                        TXT],
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
                                        ['weight_kg == 3.62873896  and raisin_size == $raisinsDS[\'Standard\']', <<<'TXT'
                                        How the result is calculated: Convert the weight of your dog to kg:&nbsp;8&nbsp;lb/2.205&nbsp;=&nbsp;3.629&nbsp;kg; Multiply this value by 2.8&nbsp;g/kg to find the toxic amount in grams:&nbsp;10.1612&nbsp;g; Multiply the last value by 1&nbsp;g-1, which is the factor for a standard raisin:&nbsp;10&nbsp;units.&nbsp;
                                        TXT],
                                        ['weight_kg == 24.94758035 and raisin_size == $raisinsDS[\'Small\']', <<<'TXT'
                                        How the result is calculated: Convert the weight of your dog to kg:&nbsp;55&nbsp;lbs/2.205&nbsp;=&nbsp;24.943&nbsp;kg; Multiply this value by 2.8&nbsp;g/kg to find the toxic amount in grams:&nbsp;69.840&nbsp;g; Multiply the last value by 2&nbsp;g-1, which is the factor for a small raisin:&nbsp;140&nbsp;units.&nbsp;
                                        TXT],
                                        ['amount == 4 and raisin_size == $raisinsDS[\'Jumbo\']', <<<'TXT'
                                        How the result is calculated: Divide the amount of raisins by 0.6666&nbsp;g-1, which is the factor for a jumbo raisin:&nbsp;6&nbsp;g; Divide this value by 2.8&nbsp;g/kg to find the weight in kg:&nbsp;2.143&nbsp;kg; Convert the weight of your dog to pounds:&nbsp;2.143&nbsp;× 2.205&nbsp;=&nbsp;4.725&nbsp;lb.
                                        TXT],
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
                                        [null, <<<'TXT'
                                        Check our examples: Example 1 ⧉ — Maximum standard raisins for a Affenpinscher Example 2 ⧉ — Maximum small raisins for a Labrador Example 3 ⧉ — Maximum weight for a dog safely eat 4 jumbo raisins
                                        TXT],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'toxic_amount =  0.0028 * weight_kg',
                'var' => [
                    [
                        'l' => 'toxic_amount',
                        'f' => '(7/2500)*weight_kg',
                        'r' => ['weight_kg'],
                    ],
                    [
                        'l' => 'weight_kg',
                        'f' => '(2500/7)*toxic_amount',
                        'r' => ['toxic_amount'],
                    ],
                ],
            ],
            [
                'formula' => 'amount = raisin_size * toxic_amount * 1000 ',
                'var' => [
                    [
                        'l' => 'toxic_amount',
                        'f' => '(1/1000)*amount/raisin_size',
                        'r' => ['amount', 'raisin_size'],
                    ],
                    [
                        'l' => 'amount',
                        'f' => '1000*raisin_size*toxic_amount',
                        'r' => ['toxic_amount', 'raisin_size'],
                    ],
                    [
                        'l' => 'raisin_size',
                        'f' => '(1/1000)*amount/toxic_amount',
                        'r' => ['toxic_amount', 'amount'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'JYfO3FozK4NpX1NV-_XOa' => [
                'name' => 'raisinsDS',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'd2bOjuxNXCl7YnmmGPitj', 'label' => 'Small', 'value' => '2'],
                    ['uid' => 'KYuI8cLcpgYaHyLXr37GW', 'label' => 'Standard', 'value' => '1'],
                    ['uid' => 'EpHMMh1dSvNKk4etIY6dp', 'label' => 'Jumbo', 'value' => '0.6666'],
                ],
            ],
        ],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        Dog raisin toxicity works out Toxic amount of raisins and Size of raisins from Your dog's weight 🐕. There is no hidden constant here: change Toxic amount of raisins and Your dog's weight 🐕 moves with it. The main result, Toxic amount of raisins, is reported in grams.
        TXT,
        'sections' => [
            ['title' => 'How the Dog raisin toxicity calculator works', 'html' => <<<'TXT'
            <p>The Dog raisin toxicity calculator applies one relationship to 1 number and reports Toxic amount of raisins, Size of raisins and Toxic number of raisins (approx.).</p><p>In the form&#039;s own words, Toxic amount of raisins = (7 ÷ 2500) × Your dog&#039;s weight 🐕.</p><p>What comes back is Toxic amount of raisins, Size of raisins and Toxic number of raisins (approx.) — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 1 box and the page has everything it needs.</p><ul><li><strong>Your dog&#039;s weight 🐕</strong> — in kilograms</li></ul><p>What you get back is Toxic amount of raisins in grams, Size of raisins, Toxic number of raisins (approx.), shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Your dog&amp;#039;s weight 🐕 = 10 kg gives &lt;strong&gt;Size of raisins&lt;/strong&gt; = 1, &lt;strong&gt;Toxic amount of raisins&lt;/strong&gt; = 0.028 g and &lt;strong&gt;Toxic number of raisins (approx.)&lt;/strong&gt; = 28.</p><ul><li><strong>Size of raisins</strong> = 1</li><li><strong>Toxic amount of raisins</strong> = 0.028 g</li><li><strong>Toxic number of raisins (approx.)</strong> = 28</li></ul><p>The line behind those figures is <strong>Toxic amount of raisins</strong> = <code>(7 ÷ 2500) × Your dog&#039;s weight 🐕</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Size of raisins&lt;/strong&gt; = 1, &lt;strong&gt;Toxic amount of raisins&lt;/strong&gt; = 0.028 and &lt;strong&gt;Toxic number of raisins (approx.)&lt;/strong&gt; = 28. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Toxic amount of raisins lists 27 options and opens on grams. </p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Toxic amount of raisins</strong> = <code>(7 ÷ 2500) × Your dog&#039;s weight 🐕</code></li><li><strong>Your dog&#039;s weight 🐕</strong> = <code>(2500 ÷ 7) × Toxic amount of raisins</code></li><li><strong>Toxic number of raisins (approx.)</strong> = <code>1000 × Size of raisins × Toxic amount of raisins</code></li><li><strong>Size of raisins</strong> = <code>(1 ÷ 1000) × Toxic number of raisins (approx.) ÷ Toxic amount of raisins</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Toxic amount of raisins, Your dog&#039;s weight 🐕 and Toxic number of raisins (approx.) can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Your dog&#039;s weight 🐕 from 10 to 20, leaving every other box alone. The panel moves from &lt;strong&gt;Size of raisins&lt;/strong&gt; 1, &lt;strong&gt;Toxic amount of raisins&lt;/strong&gt; 0.028 g and &lt;strong&gt;Toxic number of raisins (approx.)&lt;/strong&gt; 28 to &lt;strong&gt;Size of raisins&lt;/strong&gt; 1, &lt;strong&gt;Toxic amount of raisins&lt;/strong&gt; 0.056 g and &lt;strong&gt;Toxic number of raisins (approx.)&lt;/strong&gt; 56.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Your dog&#039;s weight 🐕 carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Toxic amount of raisins, Size of raisins and Toxic number of raisins (approx.) are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Convert Your dog&#039;s weight 🐕 to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Your dog&#039;s weight 🐕 measured, Toxic amount of raisins and Size of raisins wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/transfection-setup">Transfection Setup Calculator</a>, <a href="/biology/transformation-efficiency">Transformation Efficiency Calculator</a> and <a href="/biology/transpiration-rate">Transpiration Rate Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dog raisin toxicity calculator work out?', 'a' => <<<'TXT'
            Toxic amount of raisins, Size of raisins and Toxic number of raisins (approx.), from Your dog's weight 🐕. The relationship is Toxic amount of raisins = (7 ÷ 2500) × Your dog's weight 🐕.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Your dog\'s weight 🐕 (kilograms). Enter weight_kg; Toxic amount of raisins is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Toxic amount of raisins, Your dog's weight 🐕, Toxic number of raisins (approx.) and Size of raisins can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Size of raisins = 1, Toxic amount of raisins = 0.028 g and Toxic number of raisins (approx.) = 28. Those are the defaults written into the form — move Your dog's weight 🐕 and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Toxic amount of raisins is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Your dog's weight 🐕 left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Toxic amount of raisins keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/transfection-setup', 'name' => 'Transfection Setup Calculator'],
            ['path' => '/biology/transformation-efficiency', 'name' => 'Transformation Efficiency Calculator'],
            ['path' => '/biology/transpiration-rate', 'name' => 'Transpiration Rate Calculator'],
        ],
        'authors' => [],
    ],
];
