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
    'meta' => ['title' => 'Cat chocolate toxicity Calculator: Units & Formula', 'description' => 'Cat chocolate toxicity takes your cat\'s weight and returns methylxanthines dose. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Cat chocolate toxicity Calculator', 'updated' => '2026-05-25'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'weight',
                            'label' => 'Your cat\'s weight',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'chocolateType',
                            'label' => 'Chocolate type',
                            'type' => 'select',
                            'options' => [
                                'White chocolate' => '0.03882',
                                'Milk chocolate' => '2.26',
                                'Dark-sweet chocolate' => '5.295',
                                '60% cocoa' => '8.47',
                                '72% cocoa' => '10.15',
                                '86% cocoa' => '12.13',
                                'Syrup' => '4.13',
                                'Dairy milkshake' => '8.37',
                                'Chocolate pudding' => '5.98',
                                'Chocolate cake' => '4.3',
                                'Candies, sweet chocolate' => '4.92',
                                'Candies, semi-sweet' => '5.48',
                                'Candies, dark' => '5.85',
                                'Semi-sweet choco chips' => '5.65',
                                'Unsweetened (baking)' => '15.52',
                                'Dry cocoa powder' => '28.46',
                                'Instant cocoa powder' => '5.33',
                                'Cocoa beans' => '21.16',
                                'Cocoa bean hulls, mulch' => '8.99',
                                'Ice creams' => '0.65',
                                'Coffee beans/grounds' => '21.16',
                            ],
                            'dataset' => 'chocolate_VS',
                            'control' => 'DROPDOWN',
                            'default' => 'Milk chocolate',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'amount',
                            'label' => 'Amount eaten',
                            'type' => 'number',
                            'help' => 'Quantity of chocolate that your pet has eaten.',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'methyl',
                            'label' => 'Methylxanthines dose',
                            'type' => 'number',
                            'help' => 'Substances in chocolate that cause the poisoning in dogs (theobromine + caffeine combined).',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'methylReceived',
                            'label' => 'Total methylxanthines received',
                            'type' => 'number',
                            'help' => 'A total dose of methylxanthine eaten by your dog.',
                            'unit' => '22',
                            'unit_default' => 'mg',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'place' => [0, 0, 0],
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'methyl<15.01', 'text' => ' Your cat is going to be ok.'],
                                ['when' => 'methyl<34.02 and methyl>=15.01', 'text' => ' Your cat may suffer from diarrhea and vomiting.'],
                                ['when' => 'methyl<45 and methyl>=34.02', 'text' => ' Your cat may experience rapid heart rate (tachyarrhythmia), diarrhea, and vomiting. Find help immediately.'],
                                ['when' => 'methyl<55.01 and methyl>=45', 'text' => ' Your cat may experience tremors and seizures. Find help immediately.'],
                                ['when' => 'methyl>=55.01', 'text' => ' Your cat is at risk of death. Find help immediately.'],
                            ],
                        ],
                        ['type' => 'note', 'text' => 'Caffeine dose received: {{caffeine.value}}&nbsp;mg/kg Theobromine dose received: {{theo.value}}&nbsp;mg/kg Methylxantines = Theobromine + Caffeine'],
                        ['type' => 'note', 'text' => 'Consult your vet in case of any doubt, suspicious behaviour or worsening state of your pet.'],
                    ],
                ],
            ],
        ],
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'caffeine',
                            'label' => 'Caffeine',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'theo',
                            'label' => 'Theo',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => '(chocolateType * amount)/weight = methyl',
            'results' => ['chocolateType' => 'methyl*weight/amount', 'methyl' => 'amount*chocolateType/weight', 'weight' => 'amount*chocolateType/methyl', 'amount' => 'methyl*weight/chocolateType'],
        ],
        [
            'title' => 'chocolateType * amount = methylReceived',
            'results' => ['chocolateType' => 'methylReceived/amount', 'amount' => 'methylReceived/chocolateType', 'methylReceived' => 'amount*chocolateType'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("getcaffeine",function(chocolateType){var caffeine;var caffeineArray=[0.03,0.21,0.705,0.91,1.09,1.3,0.06,0.04,0.02,0.06,0.66,0.62,0.7,0.78,1.66,2.47,0.53,0,0,0.03,21.16];var methyArray=[0.03882,2.26,5.295,8.47,10.15,12.13,4.13,8.37,5.98,4.3,4.92,5.48,5.85,5.65,15.52,28.46,5.33,21.16,8.99,0.65,21.16];for(var i=0;i<22;i++){if(chocolateType===methyArray[i]){caffeine=caffeineArray[i]}}return caffeine});omni.define("gettheobromine",function(chocolateType){var theobromine;var theobromineArray=[0.00882,2.05,4.59,7.56,9.06,10.83,4.07,8.33,5.96,4.24,4.26,4.86,5.15,4.87,13.86,25.99,4.8,21.16,8.99,0.62,0];var methyArray=[0.03882,2.26,5.295,8.47,10.15,12.13,4.13,8.37,5.98,4.3,4.92,5.48,5.85,5.65,15.52,28.46,5.33,21.16,8.99,0.65,21.16];for(var i=0;i<22;i++){if(chocolateType===methyArray[i]){theobromine=theobromineArray[i]}}return theobromine});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Cat chocolate toxicity turns Your cat's weight, Amount eaten and Methylxanthines dose into Chocolate type and Total methylxanthines received. It is a single relationship that reads chocolate type out of your cat's weight, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Cat chocolate toxicity calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Cat chocolate toxicity: it takes 3 numbers and reports Chocolate type and Total methylxanthines received.</p><p>In the form&#039;s own words, Chocolate type = Methylxanthines dose × Your cat&#039;s weight ÷ Amount eaten.</p><p>The result panel carries Chocolate type and Total methylxanthines received, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Your cat&#039;s weight</strong> — in kilograms</li><li><strong>Amount eaten</strong> — in grams. Quantity of chocolate that your pet has eaten.</li><li><strong>Methylxanthines dose</strong> — in kilograms. Substances in chocolate that cause the poisoning in dogs (theobromine + caffeine combined).</li></ul><p>What you get back is Chocolate type, Total methylxanthines received in milligrams, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Total methylxanthines received offers 3 units and opens on milligrams, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Chocolate type</strong> = <code>Methylxanthines dose × Your cat&#039;s weight ÷ Amount eaten</code></li><li><strong>Methylxanthines dose</strong> = <code>Amount eaten × Chocolate type ÷ Your cat&#039;s weight</code></li><li><strong>Your cat&#039;s weight</strong> = <code>Amount eaten × Chocolate type ÷ Methylxanthines dose</code></li><li><strong>Amount eaten</strong> = <code>Methylxanthines dose × Your cat&#039;s weight ÷ Chocolate type</code></li><li><strong>Total methylxanthines received</strong> = <code>Amount eaten × Chocolate type</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Chocolate type</strong> = <code>Methylxanthines dose × Your cat&#039;s weight ÷ Amount eaten</code> — the form to use when Methylxanthines dose, Your cat&#039;s weight and Amount eaten are the values you have.</li><li><strong>Methylxanthines dose</strong> = <code>Amount eaten × Chocolate type ÷ Your cat&#039;s weight</code> — the form to use when Amount eaten, Chocolate type and Your cat&#039;s weight are the values you have.</li><li><strong>Your cat&#039;s weight</strong> = <code>Amount eaten × Chocolate type ÷ Methylxanthines dose</code> — the form to use when Amount eaten, Chocolate type and Methylxanthines dose are the values you have.</li><li><strong>Amount eaten</strong> = <code>Methylxanthines dose × Your cat&#039;s weight ÷ Chocolate type</code> — the form to use when Methylxanthines dose, Your cat&#039;s weight and Chocolate type are the values you have.</li><li><strong>Chocolate type</strong> = <code>Total methylxanthines received ÷ Amount eaten</code> — the form to use when Total methylxanthines received and Amount eaten are the values you have.</li><li><strong>Amount eaten</strong> = <code>Total methylxanthines received ÷ Chocolate type</code> — the form to use when Total methylxanthines received and Chocolate type are the values you have.</li><li><strong>Total methylxanthines received</strong> = <code>Amount eaten × Chocolate type</code> — the form to use when Amount eaten and Chocolate type are the values you have.</li></ul><p>Any one of Chocolate type, Methylxanthines dose and Your cat&#039;s weight can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Your cat&#039;s weight, Amount eaten and Methylxanthines dose is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Chocolate type and Total methylxanthines received are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Your cat&#039;s weight left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Your cat&amp;#039;s weight is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Amount eaten left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Amount eaten is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Your cat&#039;s weight to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Your cat&#039;s weight</strong> is a kilograms quantity: the page opens it in kg and converts anything else you pick before the formula runs. Change it and Chocolate type, Methylxanthines dose and Amount eaten changes with it. Have it to hand before you start: Your cat&#039;s weight is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Amount eaten</strong> is a grams quantity: the page opens it in g and converts anything else you pick before the formula runs. Quantity of chocolate that your pet has eaten. Change it and Chocolate type, Methylxanthines dose and Your cat's weight changes with it. Have it to hand before you start: Amount eaten is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Methylxanthines dose</strong> is a kilograms quantity: the page opens it in kg and converts anything else you pick before the formula runs. Substances in chocolate that cause the poisoning in dogs (theobromine + caffeine combined). Change it and Chocolate type, Your cat's weight and Amount eaten changes with it. Have it to hand before you start: Methylxanthines dose is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 2 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Chocolate type</strong> is a plain number. It is computed from Methylxanthines dose, Your cat's weight and Amount eaten, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Total methylxanthines received</strong> is a milligrams figure. It is computed from Amount eaten and Chocolate type, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>milligrams</strong> — opens in <em>mg</em>, and the chip also carries mg, mcg, kg, lb, oz and st. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Your cat&#039;s weight, Amount eaten and Methylxanthines dose. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Your cat&amp;#039;s weight into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Chocolate type with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Chocolate type follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover milligrams. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Your cat&#039;s weight, Amount eaten and Methylxanthines dose measured, Chocolate type and Total methylxanthines received wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cat chocolate toxicity calculator work out?', 'a' => <<<'TXT'
            Chocolate type and Total methylxanthines received, from Methylxanthines dose, Your cat's weight and Amount eaten. The relationship is Chocolate type = Methylxanthines dose × Your cat's weight ÷ Amount eaten.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Your cat's weight (kilograms), Amount eaten (grams), Methylxanthines dose (kilograms). Enter your cat's weight, amount eaten and methylxanthines dose; Chocolate type is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Chocolate type, Methylxanthines dose, Your cat's weight and Amount eaten blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Chocolate type is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
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
