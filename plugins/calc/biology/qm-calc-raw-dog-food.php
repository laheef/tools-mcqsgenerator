<?php

/**
 * Raw dog food
 * /biology/raw-dog-food
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Raw dog food',
    'meta' => ['title' => 'Raw dog food Calculator: Units and Formulas', 'description' => 'Raw dog food reports required amount of food, muscle meat, bone and liver. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Raw dog food Calculator', 'updated' => '2026-05-25'],
    'sections' => [
        [
            'title' => 'Total raw food mass',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'life_stage',
                            'label' => 'Life stage',
                            'type' => 'select',
                            'options' => ['Adult' => '0', 'Puppy' => '1'],
                            'dataset' => 'age',
                            'default' => 'Adult',
                        ],
                        [
                            'name' => 'age',
                            'label' => 'Age (months)',
                            'type' => 'result',
                            'unit' => '19',
                            'unit_default' => 'mos',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bodyWeight',
                            'label' => 'Dog\'s ideal body weight',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'averageDogActivityFoodKilograms',
                            'label' => 'Required amount of food',
                            'type' => 'number',
                            'help' => 'How much your dog needs to eat each day, assuming healthy balanced diet.',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Daily raw food recommendations',
            'note' => 'By default, we base the calculations on the Biologically Appropriate Raw Food (BARF) model diet.',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'diet_type',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Change raw food composition' => '1', '' => '0'],
                            'dataset' => 'diet type',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'grid' => 'FR3_FR2',
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'kilogramsMuscle',
                            'label' => 'Muscle meat',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.1'],
                        ],
                        [
                            'name' => 'percentageMuscle',
                            'label' => '%',
                            'type' => 'result',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '70',
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'grid' => 'FR3_FR2',
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'kilogramsBone',
                            'label' => 'Bone',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.1'],
                        ],
                        [
                            'name' => 'percentageBone',
                            'label' => '%',
                            'type' => 'result',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '70',
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'grid' => 'FR3_FR2',
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'kilogramsLiver',
                            'label' => 'Liver',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.1'],
                        ],
                        [
                            'name' => 'percentageLiver',
                            'label' => '%',
                            'type' => 'result',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '70',
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'grid' => 'FR3_FR2',
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'kilogramsOrgan',
                            'label' => 'Organ',
                            'type' => 'number',
                            'help' => 'Other secreting organs: the most common is the spleen.',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.1'],
                        ],
                        [
                            'name' => 'percentageOrgan',
                            'label' => '%',
                            'type' => 'result',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '70',
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'grid' => 'FR3_FR2',
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'kilogramsVeggie',
                            'label' => 'Vegetables',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.1'],
                        ],
                        [
                            'name' => 'percentageVeggie',
                            'label' => '%',
                            'type' => 'result',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '70',
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'grid' => 'FR3_FR2',
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'kilogramsSeeds',
                            'label' => 'Seeds',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.1'],
                        ],
                        [
                            'name' => 'percentageSeeds',
                            'label' => '%',
                            'type' => 'result',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '70',
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'grid' => 'FR3_FR2',
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'kilogramsFruits',
                            'label' => 'Fruits',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.1'],
                        ],
                        [
                            'name' => 'percentageFruits',
                            'label' => '%',
                            'type' => 'result',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '70',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'diet_type2',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Change raw food composition' => '1', '' => '0'],
                            'dataset' => 'diet type',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'grid' => 'FR3_FR2',
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'kilogramsMuscle2',
                            'label' => 'Muscle meat',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.1'],
                        ],
                        [
                            'name' => 'percentageMuscle2',
                            'label' => '%',
                            'type' => 'result',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'grid' => 'FR3_FR2',
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'kilogramsBone2',
                            'label' => 'Bone',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.1'],
                        ],
                        [
                            'name' => 'percentageBone2',
                            'label' => '%',
                            'type' => 'result',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'grid' => 'FR3_FR2',
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'kilogramsLiver2',
                            'label' => 'Liver',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.1'],
                        ],
                        [
                            'name' => 'percentageLiver2',
                            'label' => '%',
                            'type' => 'result',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '70',
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'grid' => 'FR3_FR2',
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'kilogramsOrgan2',
                            'label' => 'Organ',
                            'type' => 'number',
                            'help' => 'Other secreting organs: the most common is the spleen.',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.1'],
                        ],
                        [
                            'name' => 'percentageOrgan2',
                            'label' => '%',
                            'type' => 'result',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'grid' => 'FR3_FR2',
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'kilogramsVeggie2',
                            'label' => 'Vegetables',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.1'],
                        ],
                        [
                            'name' => 'percentageVeggie2',
                            'label' => '%',
                            'type' => 'result',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'grid' => 'FR3_FR2',
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'kilogramsSeeds2',
                            'label' => 'Seeds',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.1'],
                        ],
                        [
                            'name' => 'percentageSeeds2',
                            'label' => '%',
                            'type' => 'result',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'grid' => 'FR3_FR2',
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'kilogramsFruits2',
                            'label' => 'Fruits',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.1'],
                        ],
                        [
                            'name' => 'percentageFruits2',
                            'label' => '%',
                            'type' => 'result',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'averageDogActivityFoodKilograms = getPercentageDogMass(life_stage, age) * bodyWeight ',
            'results' => ['bodyWeight' => 'averageDogActivityFoodKilograms/getPercentageDogMass(life_stage, age)', 'averageDogActivityFoodKilograms' => 'bodyWeight*getPercentageDogMass(life_stage, age)'],
        ],
        [
            'title' => 'kilogramsMuscle = percentageMuscle * averageDogActivityFoodKilograms',
            'results' => ['percentageMuscle' => 'kilogramsMuscle/averageDogActivityFoodKilograms', 'kilogramsMuscle' => 'averageDogActivityFoodKilograms*percentageMuscle', 'averageDogActivityFoodKilograms' => 'kilogramsMuscle/percentageMuscle'],
        ],
        [
            'title' => 'kilogramsBone = percentageBone * averageDogActivityFoodKilograms',
            'results' => ['percentageBone' => 'kilogramsBone/averageDogActivityFoodKilograms', 'kilogramsBone' => 'averageDogActivityFoodKilograms*percentageBone', 'averageDogActivityFoodKilograms' => 'kilogramsBone/percentageBone'],
        ],
        [
            'title' => 'kilogramsLiver = percentageLiver * averageDogActivityFoodKilograms',
            'results' => ['percentageLiver' => 'kilogramsLiver/averageDogActivityFoodKilograms', 'kilogramsLiver' => 'averageDogActivityFoodKilograms*percentageLiver', 'averageDogActivityFoodKilograms' => 'kilogramsLiver/percentageLiver'],
        ],
        [
            'title' => 'kilogramsOrgan = percentageOrgan * averageDogActivityFoodKilograms',
            'results' => ['kilogramsOrgan' => 'averageDogActivityFoodKilograms*percentageOrgan', 'percentageOrgan' => 'kilogramsOrgan/averageDogActivityFoodKilograms', 'averageDogActivityFoodKilograms' => 'kilogramsOrgan/percentageOrgan'],
        ],
        [
            'title' => 'kilogramsVeggie = percentageVeggie * averageDogActivityFoodKilograms',
            'results' => ['percentageVeggie' => 'kilogramsVeggie/averageDogActivityFoodKilograms', 'kilogramsVeggie' => 'averageDogActivityFoodKilograms*percentageVeggie', 'averageDogActivityFoodKilograms' => 'kilogramsVeggie/percentageVeggie'],
        ],
        [
            'title' => 'kilogramsSeeds = percentageSeeds * averageDogActivityFoodKilograms',
            'results' => ['kilogramsSeeds' => 'averageDogActivityFoodKilograms*percentageSeeds', 'percentageSeeds' => 'kilogramsSeeds/averageDogActivityFoodKilograms', 'averageDogActivityFoodKilograms' => 'kilogramsSeeds/percentageSeeds'],
        ],
        [
            'title' => 'kilogramsFruits = percentageFruits * averageDogActivityFoodKilograms',
            'results' => ['percentageFruits' => 'kilogramsFruits/averageDogActivityFoodKilograms', 'averageDogActivityFoodKilograms' => 'kilogramsFruits/percentageFruits', 'kilogramsFruits' => 'averageDogActivityFoodKilograms*percentageFruits'],
        ],
        [
            'title' => 'kilogramsMuscle2 = percentageMuscle2 * averageDogActivityFoodKilograms',
            'results' => ['percentageMuscle2' => 'kilogramsMuscle2/averageDogActivityFoodKilograms', 'averageDogActivityFoodKilograms' => 'kilogramsMuscle2/percentageMuscle2', 'kilogramsMuscle2' => 'averageDogActivityFoodKilograms*percentageMuscle2'],
        ],
        [
            'title' => 'kilogramsBone2 = percentageBone2 * averageDogActivityFoodKilograms',
            'results' => ['averageDogActivityFoodKilograms' => 'kilogramsBone2/percentageBone2', 'kilogramsBone2' => 'averageDogActivityFoodKilograms*percentageBone2', 'percentageBone2' => 'kilogramsBone2/averageDogActivityFoodKilograms'],
        ],
        [
            'title' => 'kilogramsLiver2 = percentageLiver2 * averageDogActivityFoodKilograms',
            'results' => ['percentageLiver2' => 'kilogramsLiver2/averageDogActivityFoodKilograms', 'kilogramsLiver2' => 'averageDogActivityFoodKilograms*percentageLiver2', 'averageDogActivityFoodKilograms' => 'kilogramsLiver2/percentageLiver2'],
        ],
        [
            'title' => 'kilogramsOrgan2 = percentageOrgan2 * averageDogActivityFoodKilograms',
            'results' => ['kilogramsOrgan2' => 'averageDogActivityFoodKilograms*percentageOrgan2', 'percentageOrgan2' => 'kilogramsOrgan2/averageDogActivityFoodKilograms', 'averageDogActivityFoodKilograms' => 'kilogramsOrgan2/percentageOrgan2'],
        ],
        [
            'title' => 'kilogramsVeggie2 = percentageVeggie2 * averageDogActivityFoodKilograms',
            'results' => ['percentageVeggie2' => 'kilogramsVeggie2/averageDogActivityFoodKilograms', 'kilogramsVeggie2' => 'averageDogActivityFoodKilograms*percentageVeggie2', 'averageDogActivityFoodKilograms' => 'kilogramsVeggie2/percentageVeggie2'],
        ],
        [
            'title' => 'kilogramsSeeds2 = percentageSeeds2 * averageDogActivityFoodKilograms',
            'results' => ['percentageSeeds2' => 'kilogramsSeeds2/averageDogActivityFoodKilograms', 'kilogramsSeeds2' => 'averageDogActivityFoodKilograms*percentageSeeds2', 'averageDogActivityFoodKilograms' => 'kilogramsSeeds2/percentageSeeds2'],
        ],
        [
            'title' => 'kilogramsFruits2 = percentageFruits2 * averageDogActivityFoodKilograms',
            'results' => ['kilogramsFruits2' => 'averageDogActivityFoodKilograms*percentageFruits2', 'percentageFruits2' => 'kilogramsFruits2/averageDogActivityFoodKilograms', 'averageDogActivityFoodKilograms' => 'kilogramsFruits2/percentageFruits2'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("getPercentageDogMass",function(life_stage,age){if(life_stage==0||age>12){return 0.025}if(age<=4){return 0.08}if(age<=6){return 0.07}if(age<=9){return 0.04}if(age<=12){return 0.03}});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Raw dog food turns Life stage, Dog's ideal body weight and Required amount of food into Age (months) and %. The arithmetic is the whole method: age (months) is worked out from life stage by one formula, applied once. Age (months) comes back in months unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Raw dog food calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Raw dog food: it takes 17 numbers and reports Age (months), % and %.</p><p>In the form&#039;s own words, Required amount of food = Dog&#039;s ideal body weight × getPercentageDogMass(Life stage, Age (months)).</p><p>The result panel carries Age (months), %, % and %, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 17 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Life stage</strong> — a plain number, no unit</li><li><strong>Dog&#039;s ideal body weight</strong> — in kilograms</li><li><strong>Required amount of food</strong> — in grams. How much your dog needs to eat each day, assuming healthy balanced diet.</li><li><strong>Muscle meat</strong> — in grams</li><li><strong>Bone</strong> — in grams</li><li><strong>Liver</strong> — in grams</li><li><strong>Organ</strong> — in grams. Other secreting organs: the most common is the spleen.</li><li><strong>Vegetables</strong> — in grams</li><li><strong>Seeds</strong> — in grams</li><li><strong>Fruits</strong> — in grams</li><li><strong>Muscle meat</strong> — in grams</li><li><strong>Bone</strong> — in grams</li><li><strong>Liver</strong> — in grams</li><li><strong>Organ</strong> — in grams. Other secreting organs: the most common is the spleen.</li><li><strong>Vegetables</strong> — in grams</li><li><strong>Seeds</strong> — in grams</li><li><strong>Fruits</strong> — in grams</li></ul><p>The answers come back as Age (months) in months, % in percent, % in percent, % in percent, % in percent, % in percent, % in percent, % in percent, % in percent, % in percent, % in percent, % in percent, % in percent, % in percent, % in percent. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Age (months) offers 5 units and opens on months, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Required amount of food</strong> = <code>Dog&#039;s ideal body weight × getPercentageDogMass(Life stage, Age (months))</code></li><li><strong>Dog&#039;s ideal body weight</strong> = <code>Required amount of food ÷ getPercentageDogMass(Life stage, Age (months))</code></li><li><strong>Muscle meat</strong> = <code>Required amount of food × %</code></li><li><strong>%</strong> = <code>Muscle meat ÷ Required amount of food</code></li><li><strong>Bone</strong> = <code>Required amount of food × %</code></li><li><strong>Liver</strong> = <code>Required amount of food × %</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Required amount of food</strong> = <code>Dog&#039;s ideal body weight × getPercentageDogMass(Life stage, Age (months))</code> — the form to use when Dog&#039;s ideal body weight, Life stage and Age (months) are the values you have.</li><li><strong>Dog&#039;s ideal body weight</strong> = <code>Required amount of food ÷ getPercentageDogMass(Life stage, Age (months))</code> — the form to use when Required amount of food, Life stage and Age (months) are the values you have.</li><li><strong>Muscle meat</strong> = <code>Required amount of food × %</code> — the form to use when Required amount of food and % are the values you have.</li><li><strong>%</strong> = <code>Muscle meat ÷ Required amount of food</code> — the form to use when Muscle meat and Required amount of food are the values you have.</li><li><strong>Required amount of food</strong> = <code>Muscle meat ÷ %</code> — the form to use when Muscle meat and % are the values you have.</li><li><strong>Bone</strong> = <code>Required amount of food × %</code> — the form to use when Required amount of food and % are the values you have.</li><li><strong>%</strong> = <code>Bone ÷ Required amount of food</code> — the form to use when Bone and Required amount of food are the values you have.</li><li><strong>Required amount of food</strong> = <code>Bone ÷ %</code> — the form to use when Bone and % are the values you have.</li></ul><p>Any one of Required amount of food, Dog&#039;s ideal body weight and Muscle meat can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Dog&#039;s ideal body weight, Required amount of food and Muscle meat is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Age (months), % and % are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Life stage left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Life stage is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Dog&#039;s ideal body weight left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Dog&amp;#039;s ideal body weight is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Life stage to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Raw dog food form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Life stage</strong> takes a plain number with no unit attached. It feeds Dog's ideal body weight and Required amount of food. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Life stage is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Dog&#039;s ideal body weight</strong> is a kilograms quantity: the page opens it in kg and converts anything else you pick before the formula runs. It feeds Required amount of food. Fill it from a measurement rather than a memory — Dog&#039;s ideal body weight is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Required amount of food</strong> is a grams quantity: the page opens it in g and converts anything else you pick before the formula runs. How much your dog needs to eat each day, assuming healthy balanced diet. It feeds Dog's ideal body weight, % and Muscle meat. Fill it from a measurement rather than a memory — Required amount of food is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Muscle meat</strong> is a grams quantity: the page opens it in g and converts anything else you pick before the formula runs. It feeds % and Required amount of food. Fill it from a measurement rather than a memory — Muscle meat is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Bone</strong> is a grams quantity: the page opens it in g and converts anything else you pick before the formula runs. It feeds % and Required amount of food. Fill it from a measurement rather than a memory — Bone is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Liver</strong> is a grams quantity: the page opens it in g and converts anything else you pick before the formula runs. It feeds % and Required amount of food. Fill it from a measurement rather than a memory — Liver is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Organ</strong> is a grams quantity: the page opens it in g and converts anything else you pick before the formula runs. Other secreting organs: the most common is the spleen. It feeds % and Required amount of food. Fill it from a measurement rather than a memory — Organ is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Vegetables</strong> is a grams quantity: the page opens it in g and converts anything else you pick before the formula runs. It feeds % and Required amount of food. Fill it from a measurement rather than a memory — Vegetables is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Seeds</strong> is a grams quantity: the page opens it in g and converts anything else you pick before the formula runs. It feeds % and Required amount of food. Fill it from a measurement rather than a memory — Seeds is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Fruits</strong> is a grams quantity: the page opens it in g and converts anything else you pick before the formula runs. It feeds % and Required amount of food. Fill it from a measurement rather than a memory — Fruits is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Muscle meat</strong> is a grams quantity: the page opens it in g and converts anything else you pick before the formula runs. It feeds % and Required amount of food. Fill it from a measurement rather than a memory — Muscle meat is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Bone</strong> is a grams quantity: the page opens it in g and converts anything else you pick before the formula runs. It feeds Required amount of food and %. Fill it from a measurement rather than a memory — Bone is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Liver</strong> is a grams quantity: the page opens it in g and converts anything else you pick before the formula runs. It feeds % and Required amount of food. Fill it from a measurement rather than a memory — Liver is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Organ</strong> is a grams quantity: the page opens it in g and converts anything else you pick before the formula runs. Other secreting organs: the most common is the spleen. It feeds % and Required amount of food. Fill it from a measurement rather than a memory — Organ is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Vegetables</strong> is a grams quantity: the page opens it in g and converts anything else you pick before the formula runs. It feeds % and Required amount of food. Fill it from a measurement rather than a memory — Vegetables is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Seeds</strong> is a grams quantity: the page opens it in g and converts anything else you pick before the formula runs. It feeds % and Required amount of food. Fill it from a measurement rather than a memory — Seeds is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Fruits</strong> is a grams quantity: the page opens it in g and converts anything else you pick before the formula runs. It feeds % and Required amount of food. Fill it from a measurement rather than a memory — Fruits is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Age (months) follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are months, percent and kilograms and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Life stage, Dog&#039;s ideal body weight and Required amount of food are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Life stage, Dog&#039;s ideal body weight and Required amount of food and the number you are missing is Age (months) and %.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Raw dog food calculator work out?', 'a' => <<<'TXT'
            Age (months), %, % and %, from Dog's ideal body weight, Life stage and Age (months). The relationship is Required amount of food = Dog's ideal body weight × getPercentageDogMass(Life stage, Age (months)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Life stage, Dog's ideal body weight (kilograms), Required amount of food (grams), Muscle meat (grams), Bone (grams). With life stage, dog's ideal body weight and required amount of food in place, Age (months) can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Required amount of food, Dog's ideal body weight, Muscle meat and % blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Age (months) is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Life stage blank and the page solves for it, reporting Age (months) instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Age (months) at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/svi-sludge-volume-index', 'name' => 'Sludge Volume Index (SVI) Calculator'],
            ['path' => '/biology/sod', 'name' => 'Sod Calculator'],
            ['path' => '/biology/soil', 'name' => 'Soil Calculator'],
        ],
        'authors' => [],
    ],
];
