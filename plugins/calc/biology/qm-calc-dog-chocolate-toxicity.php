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
    'meta' => ['title' => 'Dog chocolate toxicity Calculator: Steps & Units', 'description' => 'Dog chocolate toxicity works out methylxanthines dose from your dog\'s weight. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Dog chocolate toxicity Calculator', 'updated' => '2026-09-28'],
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
                            'label' => 'Your dog\'s weight',
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
                            'dataset' => 'chocolate',
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
                            'help' => 'Quantity of chocolate that your pet ate',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Results',
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
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'methyl<15.01', 'text' => ' Your dog\'s going to be OK.'],
                                ['when' => 'methyl<34.02 and methyl>=15.01', 'text' => ' Your pet may suffer from diarrhea and vomiting.'],
                                ['when' => 'methyl<45 and  methyl>=34.02', 'text' => ' Your pet may experience rapid heart rate (tachyarrhythmia), diarrhea, and vomiting. Find help immediately.'],
                                ['when' => 'methyl<55.01 and  methyl>=45', 'text' => ' Your pet may experience tremors and seizures. Find help immediately.'],
                                ['when' => 'methyl>=55.01', 'text' => ' Your pet\'s at risk of death. Find help immediately.'],
                                ['when' => null, 'text' => 'Caffeine dose received: {{caffeine.value}}&nbsp;mg/kg Theobromine dose received: {{theobromine.value}}&nbsp;mg/kg Methylxantines = Theobromine + Caffeine'],
                                ['when' => null, 'text' => 'Consult your vet in case of any doubt, suspicious behavior or worsening state of your pet.'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Check out how to use this calculator!'],
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
                            'name' => 'theobromine',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'caffeine',
                            'label' => '',
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
            'results' => ['methyl' => 'amount*chocolateType/weight', 'weight' => 'amount*chocolateType/methyl', 'chocolateType' => 'methyl*weight/amount', 'amount' => 'methyl*weight/chocolateType'],
        ],
        [
            'title' => 'chocolateType * amount = methylReceived',
            'results' => ['chocolateType' => 'methylReceived/amount', 'methylReceived' => 'amount*chocolateType', 'amount' => 'methylReceived/chocolateType'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("getcaffeine",function(chocolateType){var caffeine;var caffeineArray=[0.03,0.21,0.705,0.91,1.09,1.3,0.06,0.04,0.02,0.06,0.66,0.62,0.7,0.78,1.66,2.47,0.53,0,0,0.03,21.16];var methyArray=[0.03882,2.26,5.295,8.47,10.15,12.13,4.13,8.37,5.98,4.3,4.92,5.48,5.85,5.65,15.52,28.46,5.33,21.16,8.99,0.65,21.16];for(var i=0;i<22;i++){if(chocolateType===methyArray[i]){caffeine=caffeineArray[i]}}return caffeine});omni.define("gettheobromine",function(chocolateType){var theobromine;var theobromineArray=[0.00882,2.05,4.59,7.56,9.06,10.83,4.07,8.33,5.96,4.24,4.26,4.86,5.15,4.87,13.86,25.99,4.8,21.16,8.99,0.62,0];var methyArray=[0.03882,2.26,5.295,8.47,10.15,12.13,4.13,8.37,5.98,4.3,4.92,5.48,5.85,5.65,15.52,28.46,5.33,21.16,8.99,0.65,21.16];for(var i=0;i<22;i++){if(chocolateType===methyArray[i]){theobromine=theobromineArray[i]}}return theobromine});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Dog chocolate toxicity takes Your dog's weight, Chocolate type and Amount eaten and returns Methylxanthines dose and Total methylxanthines received. Nothing is looked up on this page: methylxanthines dose is computed from your dog's weight and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Methylxanthines dose is opened in kilograms; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Dog chocolate toxicity calculator works', 'html' => <<<'TXT'
            <p>Dog chocolate toxicity answers one question from 3 numbers, and the answer is Methylxanthines dose and Total methylxanthines received.</p><p>The relationship it solves reads Methylxanthines dose = Amount eaten × Chocolate type ÷ Your dog&#039;s weight.</p><p>The answers are Methylxanthines dose and Total methylxanthines received; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Your dog&#039;s weight</strong> — in kilograms</li><li><strong>Chocolate type</strong> — a plain number, no unit</li><li><strong>Amount eaten</strong> — in grams. Quantity of chocolate that your pet ate</li></ul><p>The answers come back as Methylxanthines dose in kilograms, Total methylxanthines received in milligrams. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Methylxanthines dose offers 7 units and opens on kilograms, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Methylxanthines dose</strong> = <code>Amount eaten × Chocolate type ÷ Your dog&#039;s weight</code></li><li><strong>Your dog&#039;s weight</strong> = <code>Amount eaten × Chocolate type ÷ Methylxanthines dose</code></li><li><strong>Chocolate type</strong> = <code>Methylxanthines dose × Your dog&#039;s weight ÷ Amount eaten</code></li><li><strong>Amount eaten</strong> = <code>Methylxanthines dose × Your dog&#039;s weight ÷ Chocolate type</code></li><li><strong>Total methylxanthines received</strong> = <code>Amount eaten × Chocolate type</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Methylxanthines dose</strong> = <code>Amount eaten × Chocolate type ÷ Your dog&#039;s weight</code> — the form to use when Amount eaten, Chocolate type and Your dog&#039;s weight are the values you have.</li><li><strong>Your dog&#039;s weight</strong> = <code>Amount eaten × Chocolate type ÷ Methylxanthines dose</code> — the form to use when Amount eaten, Chocolate type and Methylxanthines dose are the values you have.</li><li><strong>Chocolate type</strong> = <code>Methylxanthines dose × Your dog&#039;s weight ÷ Amount eaten</code> — the form to use when Methylxanthines dose, Your dog&#039;s weight and Amount eaten are the values you have.</li><li><strong>Amount eaten</strong> = <code>Methylxanthines dose × Your dog&#039;s weight ÷ Chocolate type</code> — the form to use when Methylxanthines dose, Your dog&#039;s weight and Chocolate type are the values you have.</li><li><strong>Chocolate type</strong> = <code>Total methylxanthines received ÷ Amount eaten</code> — the form to use when Total methylxanthines received and Amount eaten are the values you have.</li><li><strong>Total methylxanthines received</strong> = <code>Amount eaten × Chocolate type</code> — the form to use when Amount eaten and Chocolate type are the values you have.</li><li><strong>Amount eaten</strong> = <code>Total methylxanthines received ÷ Chocolate type</code> — the form to use when Total methylxanthines received and Chocolate type are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Methylxanthines dose, Your dog&#039;s weight and Chocolate type can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Your dog&#039;s weight and Amount eaten is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Methylxanthines dose and Total methylxanthines received are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Your dog&#039;s weight left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Your dog&amp;#039;s weight is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Chocolate type left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Chocolate type is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Your dog&#039;s weight is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Your dog&#039;s weight</strong> is a kilograms quantity: the page opens it in kg and converts anything else you pick before the formula runs. The page reads it when it works out Methylxanthines dose, Chocolate type and Amount eaten. Have it to hand before you start: Your dog&#039;s weight is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Chocolate type</strong> takes a plain number with no unit attached. The page reads it when it works out Methylxanthines dose, Your dog's weight and Amount eaten. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Chocolate type is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Amount eaten</strong> is a grams quantity: the page opens it in g and converts anything else you pick before the formula runs. Quantity of chocolate that your pet ate. The page reads it when it works out Methylxanthines dose, Your dog's weight and Chocolate type. Have it to hand before you start: Amount eaten is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 2 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Methylxanthines dose</strong> is a kilograms figure. The value follows from Amount eaten, Chocolate type and Your dog's weight. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Total methylxanthines received</strong> is a milligrams figure. The value follows from Amount eaten and Chocolate type. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>kilograms</strong> — opens in <em>kg</em>, and the chip also carries g, lb, oz, st, t and US ton. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Your dog&#039;s weight, Chocolate type and Amount eaten. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Your dog&amp;#039;s weight into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Methylxanthines dose in kg with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Methylxanthines dose follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover kilograms. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Your dog&#039;s weight, Chocolate type and Amount eaten is what you already know and Methylxanthines dose and Total methylxanthines received is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dog chocolate toxicity calculator work out?', 'a' => <<<'TXT'
            Methylxanthines dose and Total methylxanthines received, from Amount eaten, Chocolate type and Your dog's weight. The relationship is Methylxanthines dose = Amount eaten × Chocolate type ÷ Your dog's weight.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Your dog's weight (kilograms), Chocolate type, Amount eaten (grams). With your dog's weight, chocolate type and amount eaten in place, Methylxanthines dose can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Methylxanthines dose, Your dog's weight, Chocolate type and Amount eaten can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Methylxanthines dose is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
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
