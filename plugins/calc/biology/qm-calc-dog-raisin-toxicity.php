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
    'meta' => ['title' => 'Dog raisin toxicity: Formula, Steps & Results', 'description' => 'Dog raisin toxicity reports toxic amount of raisins and toxic number of raisins (approx.). Every box can be solved for, not only the one in the title.', 'h1' => 'Dog raisin toxicity Calculator', 'updated' => '2026-09-28'],
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
        Dog raisin toxicity works out Toxic amount of raisins and Size of raisins from Your dog's weight 🐕. There is no hidden constant here: change toxic amount of raisins and your dog's weight 🐕 moves with it. The main result, Toxic amount of raisins, is reported in grams.
        TXT,
        'sections' => [
            ['title' => 'How the Dog raisin toxicity calculator works', 'html' => <<<'TXT'
            <p>The Dog raisin toxicity calculator applies one relationship to 1 number and reports Toxic amount of raisins, Size of raisins and Toxic number of raisins (approx.).</p><p>In the form&#039;s own words, Toxic amount of raisins = (7 ÷ 2500) × Your dog&#039;s weight 🐕.</p><p>What comes back is Toxic amount of raisins, Size of raisins and Toxic number of raisins (approx.) — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 1 box and the page has everything it needs.</p><ul><li><strong>Your dog&#039;s weight 🐕</strong> — in kilograms</li></ul><p>What you get back is Toxic amount of raisins in grams, Size of raisins, Toxic number of raisins (approx.), shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Your dog&amp;#039;s weight 🐕 = 10 kg gives <strong>Size of raisins</strong> = 1, <strong>Toxic amount of raisins</strong> = 0.028 g and <strong>Toxic number of raisins (approx.)</strong> = 28.</p><ul><li><strong>Size of raisins</strong> = 1</li><li><strong>Toxic amount of raisins</strong> = 0.028 g</li><li><strong>Toxic number of raisins (approx.)</strong> = 28</li></ul><p>The line behind those figures is <strong>Toxic amount of raisins</strong> = <code>(7 ÷ 2500) × Your dog&#039;s weight 🐕</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Size of raisins</strong> = 1, <strong>Toxic amount of raisins</strong> = 0.028 and <strong>Toxic number of raisins (approx.)</strong> = 28. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Toxic amount of raisins lists 27 options and opens on grams. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Toxic amount of raisins</strong> = <code>(7 ÷ 2500) × Your dog&#039;s weight 🐕</code></li><li><strong>Your dog&#039;s weight 🐕</strong> = <code>(2500 ÷ 7) × Toxic amount of raisins</code></li><li><strong>Toxic number of raisins (approx.)</strong> = <code>1000 × Size of raisins × Toxic amount of raisins</code></li><li><strong>Size of raisins</strong> = <code>(1 ÷ 1000) × Toxic number of raisins (approx.) ÷ Toxic amount of raisins</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Toxic amount of raisins</strong> = <code>(7 ÷ 2500) × Your dog&#039;s weight 🐕</code> — the form to use when Your dog&#039;s weight 🐕 are the values you have.</li><li><strong>Your dog&#039;s weight 🐕</strong> = <code>(2500 ÷ 7) × Toxic amount of raisins</code> — the form to use when Toxic amount of raisins are the values you have.</li><li><strong>Toxic amount of raisins</strong> = <code>(1 ÷ 1000) × Toxic number of raisins (approx.) ÷ Size of raisins</code> — the form to use when Toxic number of raisins (approx.) and Size of raisins are the values you have.</li><li><strong>Toxic number of raisins (approx.)</strong> = <code>1000 × Size of raisins × Toxic amount of raisins</code> — the form to use when Toxic amount of raisins and Size of raisins are the values you have.</li><li><strong>Size of raisins</strong> = <code>(1 ÷ 1000) × Toxic number of raisins (approx.) ÷ Toxic amount of raisins</code> — the form to use when Toxic amount of raisins and Toxic number of raisins (approx.) are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Toxic amount of raisins, Your dog&#039;s weight 🐕 and Toxic number of raisins (approx.) can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Your dog&#039;s weight 🐕 from 10 to 20, leaving every other box alone. The panel moves from <strong>Size of raisins</strong> 1, <strong>Toxic amount of raisins</strong> 0.028 g and <strong>Toxic number of raisins (approx.)</strong> 28 to <strong>Size of raisins</strong> 1, <strong>Toxic amount of raisins</strong> 0.056 g and <strong>Toxic number of raisins (approx.)</strong> 56.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Your dog&#039;s weight 🐕 carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Toxic amount of raisins, Size of raisins and Toxic number of raisins (approx.) are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Your dog&#039;s weight 🐕 left as a guess.</strong> Anything typed into Your dog&amp;#039;s weight 🐕 is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Your dog&#039;s weight 🐕 to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Your dog&#039;s weight 🐕</strong> is a kilograms quantity: the page opens it in kg and converts anything else you pick before the formula runs. The page reads it when it works out Toxic amount of raisins. Have it to hand before you start: Your dog&#039;s weight 🐕 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Toxic amount of raisins</strong> is a grams figure and the page's own defaults put it at 0.028 g. It is computed from Your dog's weight 🐕, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Size of raisins</strong> is a plain number and the page's own defaults put it at 1. It is computed from Toxic amount of raisins and Toxic number of raisins (approx.), so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Toxic number of raisins (approx.)</strong> is a plain number and the page's own defaults put it at 28. It is computed from Toxic amount of raisins and Size of raisins, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Size of raisins</th><th>Toxic amount of raisins</th><th>Toxic number of raisins (approx.)</th></tr></thead><tbody><tr><td><strong>Your dog&#039;s weight 🐕</strong> +10%</td><td>+0%</td><td>+10%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Your dog&#039;s weight 🐕: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Your dog&#039;s weight 🐕 = 5 kg, the answer is <strong>Size of raisins</strong> = 1, <strong>Toxic amount of raisins</strong> = 0.014 g and <strong>Toxic number of raisins (approx.)</strong> = 14.</li><li>With Your dog&#039;s weight 🐕 = 30 kg, the answer is <strong>Size of raisins</strong> = 1, <strong>Toxic amount of raisins</strong> = 0.084 g and <strong>Toxic number of raisins (approx.)</strong> = 84.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>kilograms</strong> — 27 units. It opens in <em>kg</em>, and the chip also carries lb, mg, g, oz, t and ng. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Toxic amount of raisins is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover kilograms. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Your dog&#039;s weight 🐕 measured, Toxic amount of raisins and Size of raisins wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/transfection-setup">Transfection Setup Calculator</a>, <a href="/biology/transformation-efficiency">Transformation Efficiency Calculator</a> and <a href="/biology/transpiration-rate">Transpiration Rate Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dog raisin toxicity calculator work out?', 'a' => <<<'TXT'
            Toxic amount of raisins, Size of raisins and Toxic number of raisins (approx.), from Your dog's weight 🐕. The relationship is Toxic amount of raisins = (7 ÷ 2500) × Your dog's weight 🐕.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Your dog\'s weight 🐕 (kilograms). Enter your dog\'s weight 🐕; Toxic amount of raisins is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Toxic amount of raisins, Your dog's weight 🐕, Toxic number of raisins (approx.) and Size of raisins can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Size of raisins = 1, Toxic amount of raisins = 0.028 g and Toxic number of raisins (approx.) = 28. Those are the defaults written into the form — move Your dog's weight 🐕 and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Toxic amount of raisins is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
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
