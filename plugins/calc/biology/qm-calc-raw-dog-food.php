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
    'meta' => ['title' => 'Raw dog food Calculator — Formula & Results', 'description' => 'Supply the muscle meat, the bone, the liver and the vegetables and the Raw dog food calculator solves for <strong>dog\'s ideal body weight</strong>.', 'h1' => 'Raw dog food Calculator', 'updated' => '2026-05-25'],
    'raw' => [
        'vars' => [
            'age' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'averageDogActivityFoodKilograms' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.01'],
            ],
            'bodyWeight' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.01'],
            ],
            'diet_type' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'Xs614aHfFl4RSdsbMgWuP', 'c' => null],
                ],
                'ds' => 'iyGMwqVMWjJ567m7Hvyd1',
            ],
            'diet_type2' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'Xs614aHfFl4RSdsbMgWuP', 'c' => null],
                ],
                'ds' => 'iyGMwqVMWjJ567m7Hvyd1',
            ],
            'kilogramsBone' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.1'],
            ],
            'kilogramsBone2' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.1'],
            ],
            'kilogramsFruits' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.1'],
            ],
            'kilogramsFruits2' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.1'],
            ],
            'kilogramsLiver' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.1'],
            ],
            'kilogramsLiver2' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.1'],
            ],
            'kilogramsMuscle' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.1'],
            ],
            'kilogramsMuscle2' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.1'],
            ],
            'kilogramsOrgan' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.1'],
            ],
            'kilogramsOrgan2' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.1'],
            ],
            'kilogramsSeeds' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.1'],
            ],
            'kilogramsSeeds2' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.1'],
            ],
            'kilogramsVeggie' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.1'],
            ],
            'kilogramsVeggie2' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.1'],
            ],
            'life_stage' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'PPuhzZvdm2fFa_GHLOS98', 'c' => null],
                ],
                'ds' => 'VrXNIFXKekcN3jRaMiBHV',
            ],
            'percentageBone' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '70', 'c' => null],
                ],
            ],
            'percentageBone2' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'percentageFruits' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '70', 'c' => null],
                ],
            ],
            'percentageFruits2' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'percentageLiver' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '70', 'c' => null],
                ],
            ],
            'percentageLiver2' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '70', 'c' => null],
                ],
            ],
            'percentageMuscle' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '70', 'c' => null],
                ],
            ],
            'percentageMuscle2' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'percentageOrgan' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '70', 'c' => null],
                ],
            ],
            'percentageOrgan2' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'percentageSeeds' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '70', 'c' => null],
                ],
            ],
            'percentageSeeds2' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'percentageVeggie' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '70', 'c' => null],
                ],
            ],
            'percentageVeggie2' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'LYMLJh0BXbNS-dsdwInGJ',
                'title' => 'Total raw food mass',
                'desc' => '',
                'm' => [
                    [
                        'FR1_FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'life_stage',
                                    'vt' => 'valueSelect',
                                    'l' => 'Life stage',
                                    'ds' => 'VrXNIFXKekcN3jRaMiBHV',
                                    'opts' => [
                                        ['PPuhzZvdm2fFa_GHLOS98', 'Adult', '0'],
                                        ['eXbQlagfEcenSZUfms0xU', 'Puppy', '1'],
                                    ],
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'age',
                                    'vt' => 'dependent',
                                    'l' => 'Age (months)',
                                    'us' => '19',
                                    'du' => 'mos',
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
                                    'n' => 'bodyWeight',
                                    'vt' => 'numerical',
                                    'l' => 'Dog\'s ideal body weight',
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
                                    'n' => 'averageDogActivityFoodKilograms',
                                    'vt' => 'numerical',
                                    'l' => 'Required amount of food',
                                    'h' => 'How much your dog needs to eat each day, assuming healthy balanced diet.',
                                    'us' => '22',
                                    'du' => 'g',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'RX-_7IzKkWIEQ_LMYxswb',
                'title' => 'Daily raw food recommendations',
                'desc' => 'By default, we base the calculations on the Biologically Appropriate Raw Food (BARF) model diet.',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'diet_type',
                                    'vt' => 'valueSelect',
                                    'l' => '',
                                    'ds' => 'iyGMwqVMWjJ567m7Hvyd1',
                                    'opts' => [
                                        ['H9GDxJXUOcOZUh4YdTtNc', 'Change raw food composition', '1'],
                                        ['Xs614aHfFl4RSdsbMgWuP', '', '0'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR3_FR2',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'kilogramsMuscle',
                                    'vt' => 'numerical',
                                    'l' => 'Muscle meat',
                                    'us' => '22',
                                    'du' => 'g',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'percentageMuscle',
                                    'vt' => 'dependent',
                                    'l' => '%',
                                    'us' => '37',
                                    'du' => 'perc',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR3_FR2',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'kilogramsBone',
                                    'vt' => 'numerical',
                                    'l' => 'Bone',
                                    'us' => '22',
                                    'du' => 'g',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'percentageBone',
                                    'vt' => 'dependent',
                                    'l' => '%',
                                    'us' => '37',
                                    'du' => 'perc',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR3_FR2',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'kilogramsLiver',
                                    'vt' => 'numerical',
                                    'l' => 'Liver',
                                    'us' => '22',
                                    'du' => 'g',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'percentageLiver',
                                    'vt' => 'dependent',
                                    'l' => '%',
                                    'us' => '37',
                                    'du' => 'perc',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR3_FR2',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'kilogramsOrgan',
                                    'vt' => 'numerical',
                                    'l' => 'Organ',
                                    'h' => 'Other secreting organs: the most common is the spleen.',
                                    'us' => '22',
                                    'du' => 'g',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'percentageOrgan',
                                    'vt' => 'dependent',
                                    'l' => '%',
                                    'us' => '37',
                                    'du' => 'perc',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR3_FR2',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'kilogramsVeggie',
                                    'vt' => 'numerical',
                                    'l' => 'Vegetables',
                                    'us' => '22',
                                    'du' => 'g',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'percentageVeggie',
                                    'vt' => 'dependent',
                                    'l' => '%',
                                    'us' => '37',
                                    'du' => 'perc',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR3_FR2',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'kilogramsSeeds',
                                    'vt' => 'numerical',
                                    'l' => 'Seeds',
                                    'us' => '22',
                                    'du' => 'g',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'percentageSeeds',
                                    'vt' => 'dependent',
                                    'l' => '%',
                                    'us' => '37',
                                    'du' => 'perc',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR3_FR2',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'kilogramsFruits',
                                    'vt' => 'numerical',
                                    'l' => 'Fruits',
                                    'us' => '22',
                                    'du' => 'g',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'percentageFruits',
                                    'vt' => 'dependent',
                                    'l' => '%',
                                    'us' => '37',
                                    'du' => 'perc',
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
                                    'n' => 'diet_type2',
                                    'vt' => 'valueSelect',
                                    'l' => '',
                                    'ds' => 'iyGMwqVMWjJ567m7Hvyd1',
                                    'opts' => [
                                        ['H9GDxJXUOcOZUh4YdTtNc', 'Change raw food composition', '1'],
                                        ['Xs614aHfFl4RSdsbMgWuP', '', '0'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR3_FR2',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'kilogramsMuscle2',
                                    'vt' => 'numerical',
                                    'l' => 'Muscle meat',
                                    'us' => '22',
                                    'du' => 'g',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'percentageMuscle2',
                                    'vt' => 'dependent',
                                    'l' => '%',
                                    'us' => '37',
                                    'du' => 'perc',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR3_FR2',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'kilogramsBone2',
                                    'vt' => 'numerical',
                                    'l' => 'Bone',
                                    'us' => '22',
                                    'du' => 'g',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'percentageBone2',
                                    'vt' => 'dependent',
                                    'l' => '%',
                                    'us' => '37',
                                    'du' => 'perc',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR3_FR2',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'kilogramsLiver2',
                                    'vt' => 'numerical',
                                    'l' => 'Liver',
                                    'us' => '22',
                                    'du' => 'g',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'percentageLiver2',
                                    'vt' => 'dependent',
                                    'l' => '%',
                                    'us' => '37',
                                    'du' => 'perc',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR3_FR2',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'kilogramsOrgan2',
                                    'vt' => 'numerical',
                                    'l' => 'Organ',
                                    'h' => 'Other secreting organs: the most common is the spleen.',
                                    'us' => '22',
                                    'du' => 'g',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'percentageOrgan2',
                                    'vt' => 'dependent',
                                    'l' => '%',
                                    'us' => '37',
                                    'du' => 'perc',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR3_FR2',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'kilogramsVeggie2',
                                    'vt' => 'numerical',
                                    'l' => 'Vegetables',
                                    'us' => '22',
                                    'du' => 'g',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'percentageVeggie2',
                                    'vt' => 'dependent',
                                    'l' => '%',
                                    'us' => '37',
                                    'du' => 'perc',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR3_FR2',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'kilogramsSeeds2',
                                    'vt' => 'numerical',
                                    'l' => 'Seeds',
                                    'us' => '22',
                                    'du' => 'g',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'percentageSeeds2',
                                    'vt' => 'dependent',
                                    'l' => '%',
                                    'us' => '37',
                                    'du' => 'perc',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR3_FR2',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'kilogramsFruits2',
                                    'vt' => 'numerical',
                                    'l' => 'Fruits',
                                    'us' => '22',
                                    'du' => 'g',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'percentageFruits2',
                                    'vt' => 'dependent',
                                    'l' => '%',
                                    'us' => '37',
                                    'du' => 'perc',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'averageDogActivityFoodKilograms = getPercentageDogMass(life_stage, age) * bodyWeight ',
                'var' => [
                    [
                        'l' => 'bodyWeight',
                        'f' => 'averageDogActivityFoodKilograms/getPercentageDogMass(life_stage, age)',
                        'r' => ['averageDogActivityFoodKilograms', 'age', 'life_stage'],
                    ],
                    [
                        'l' => 'averageDogActivityFoodKilograms',
                        'f' => 'bodyWeight*getPercentageDogMass(life_stage, age)',
                        'r' => ['bodyWeight', 'age', 'life_stage'],
                    ],
                ],
            ],
            [
                'formula' => 'kilogramsMuscle = percentageMuscle * averageDogActivityFoodKilograms',
                'var' => [
                    [
                        'l' => 'percentageMuscle',
                        'f' => 'kilogramsMuscle/averageDogActivityFoodKilograms',
                        'r' => ['kilogramsMuscle', 'averageDogActivityFoodKilograms'],
                    ],
                    [
                        'l' => 'kilogramsMuscle',
                        'f' => 'averageDogActivityFoodKilograms*percentageMuscle',
                        'r' => ['percentageMuscle', 'averageDogActivityFoodKilograms'],
                    ],
                    [
                        'l' => 'averageDogActivityFoodKilograms',
                        'f' => 'kilogramsMuscle/percentageMuscle',
                        'r' => ['percentageMuscle', 'kilogramsMuscle'],
                    ],
                ],
            ],
            [
                'formula' => 'kilogramsBone = percentageBone * averageDogActivityFoodKilograms',
                'var' => [
                    [
                        'l' => 'percentageBone',
                        'f' => 'kilogramsBone/averageDogActivityFoodKilograms',
                        'r' => ['kilogramsBone', 'averageDogActivityFoodKilograms'],
                    ],
                    [
                        'l' => 'kilogramsBone',
                        'f' => 'averageDogActivityFoodKilograms*percentageBone',
                        'r' => ['percentageBone', 'averageDogActivityFoodKilograms'],
                    ],
                    [
                        'l' => 'averageDogActivityFoodKilograms',
                        'f' => 'kilogramsBone/percentageBone',
                        'r' => ['percentageBone', 'kilogramsBone'],
                    ],
                ],
            ],
            [
                'formula' => 'kilogramsLiver = percentageLiver * averageDogActivityFoodKilograms',
                'var' => [
                    [
                        'l' => 'percentageLiver',
                        'f' => 'kilogramsLiver/averageDogActivityFoodKilograms',
                        'r' => ['kilogramsLiver', 'averageDogActivityFoodKilograms'],
                    ],
                    [
                        'l' => 'kilogramsLiver',
                        'f' => 'averageDogActivityFoodKilograms*percentageLiver',
                        'r' => ['percentageLiver', 'averageDogActivityFoodKilograms'],
                    ],
                    [
                        'l' => 'averageDogActivityFoodKilograms',
                        'f' => 'kilogramsLiver/percentageLiver',
                        'r' => ['percentageLiver', 'kilogramsLiver'],
                    ],
                ],
            ],
            [
                'formula' => 'kilogramsOrgan = percentageOrgan * averageDogActivityFoodKilograms',
                'var' => [
                    [
                        'l' => 'kilogramsOrgan',
                        'f' => 'averageDogActivityFoodKilograms*percentageOrgan',
                        'r' => ['percentageOrgan', 'averageDogActivityFoodKilograms'],
                    ],
                    [
                        'l' => 'percentageOrgan',
                        'f' => 'kilogramsOrgan/averageDogActivityFoodKilograms',
                        'r' => ['kilogramsOrgan', 'averageDogActivityFoodKilograms'],
                    ],
                    [
                        'l' => 'averageDogActivityFoodKilograms',
                        'f' => 'kilogramsOrgan/percentageOrgan',
                        'r' => ['kilogramsOrgan', 'percentageOrgan'],
                    ],
                ],
            ],
            [
                'formula' => 'kilogramsVeggie = percentageVeggie * averageDogActivityFoodKilograms',
                'var' => [
                    [
                        'l' => 'percentageVeggie',
                        'f' => 'kilogramsVeggie/averageDogActivityFoodKilograms',
                        'r' => ['kilogramsVeggie', 'averageDogActivityFoodKilograms'],
                    ],
                    [
                        'l' => 'kilogramsVeggie',
                        'f' => 'averageDogActivityFoodKilograms*percentageVeggie',
                        'r' => ['percentageVeggie', 'averageDogActivityFoodKilograms'],
                    ],
                    [
                        'l' => 'averageDogActivityFoodKilograms',
                        'f' => 'kilogramsVeggie/percentageVeggie',
                        'r' => ['percentageVeggie', 'kilogramsVeggie'],
                    ],
                ],
            ],
            [
                'formula' => 'kilogramsSeeds = percentageSeeds * averageDogActivityFoodKilograms',
                'var' => [
                    [
                        'l' => 'kilogramsSeeds',
                        'f' => 'averageDogActivityFoodKilograms*percentageSeeds',
                        'r' => ['percentageSeeds', 'averageDogActivityFoodKilograms'],
                    ],
                    [
                        'l' => 'percentageSeeds',
                        'f' => 'kilogramsSeeds/averageDogActivityFoodKilograms',
                        'r' => ['kilogramsSeeds', 'averageDogActivityFoodKilograms'],
                    ],
                    [
                        'l' => 'averageDogActivityFoodKilograms',
                        'f' => 'kilogramsSeeds/percentageSeeds',
                        'r' => ['kilogramsSeeds', 'percentageSeeds'],
                    ],
                ],
            ],
            [
                'formula' => 'kilogramsFruits = percentageFruits * averageDogActivityFoodKilograms',
                'var' => [
                    [
                        'l' => 'percentageFruits',
                        'f' => 'kilogramsFruits/averageDogActivityFoodKilograms',
                        'r' => ['averageDogActivityFoodKilograms', 'kilogramsFruits'],
                    ],
                    [
                        'l' => 'averageDogActivityFoodKilograms',
                        'f' => 'kilogramsFruits/percentageFruits',
                        'r' => ['percentageFruits', 'kilogramsFruits'],
                    ],
                    [
                        'l' => 'kilogramsFruits',
                        'f' => 'averageDogActivityFoodKilograms*percentageFruits',
                        'r' => ['percentageFruits', 'averageDogActivityFoodKilograms'],
                    ],
                ],
            ],
            [
                'formula' => 'kilogramsMuscle2 = percentageMuscle2 * averageDogActivityFoodKilograms',
                'var' => [
                    [
                        'l' => 'percentageMuscle2',
                        'f' => 'kilogramsMuscle2/averageDogActivityFoodKilograms',
                        'r' => ['averageDogActivityFoodKilograms', 'kilogramsMuscle2'],
                    ],
                    [
                        'l' => 'averageDogActivityFoodKilograms',
                        'f' => 'kilogramsMuscle2/percentageMuscle2',
                        'r' => ['percentageMuscle2', 'kilogramsMuscle2'],
                    ],
                    [
                        'l' => 'kilogramsMuscle2',
                        'f' => 'averageDogActivityFoodKilograms*percentageMuscle2',
                        'r' => ['percentageMuscle2', 'averageDogActivityFoodKilograms'],
                    ],
                ],
            ],
            [
                'formula' => 'kilogramsBone2 = percentageBone2 * averageDogActivityFoodKilograms',
                'var' => [
                    [
                        'l' => 'averageDogActivityFoodKilograms',
                        'f' => 'kilogramsBone2/percentageBone2',
                        'r' => ['kilogramsBone2', 'percentageBone2'],
                    ],
                    [
                        'l' => 'kilogramsBone2',
                        'f' => 'averageDogActivityFoodKilograms*percentageBone2',
                        'r' => ['averageDogActivityFoodKilograms', 'percentageBone2'],
                    ],
                    [
                        'l' => 'percentageBone2',
                        'f' => 'kilogramsBone2/averageDogActivityFoodKilograms',
                        'r' => ['averageDogActivityFoodKilograms', 'kilogramsBone2'],
                    ],
                ],
            ],
            [
                'formula' => 'kilogramsLiver2 = percentageLiver2 * averageDogActivityFoodKilograms',
                'var' => [
                    [
                        'l' => 'percentageLiver2',
                        'f' => 'kilogramsLiver2/averageDogActivityFoodKilograms',
                        'r' => ['kilogramsLiver2', 'averageDogActivityFoodKilograms'],
                    ],
                    [
                        'l' => 'kilogramsLiver2',
                        'f' => 'averageDogActivityFoodKilograms*percentageLiver2',
                        'r' => ['percentageLiver2', 'averageDogActivityFoodKilograms'],
                    ],
                    [
                        'l' => 'averageDogActivityFoodKilograms',
                        'f' => 'kilogramsLiver2/percentageLiver2',
                        'r' => ['percentageLiver2', 'kilogramsLiver2'],
                    ],
                ],
            ],
            [
                'formula' => 'kilogramsOrgan2 = percentageOrgan2 * averageDogActivityFoodKilograms',
                'var' => [
                    [
                        'l' => 'kilogramsOrgan2',
                        'f' => 'averageDogActivityFoodKilograms*percentageOrgan2',
                        'r' => ['percentageOrgan2', 'averageDogActivityFoodKilograms'],
                    ],
                    [
                        'l' => 'percentageOrgan2',
                        'f' => 'kilogramsOrgan2/averageDogActivityFoodKilograms',
                        'r' => ['kilogramsOrgan2', 'averageDogActivityFoodKilograms'],
                    ],
                    [
                        'l' => 'averageDogActivityFoodKilograms',
                        'f' => 'kilogramsOrgan2/percentageOrgan2',
                        'r' => ['kilogramsOrgan2', 'percentageOrgan2'],
                    ],
                ],
            ],
            [
                'formula' => 'kilogramsVeggie2 = percentageVeggie2 * averageDogActivityFoodKilograms',
                'var' => [
                    [
                        'l' => 'percentageVeggie2',
                        'f' => 'kilogramsVeggie2/averageDogActivityFoodKilograms',
                        'r' => ['kilogramsVeggie2', 'averageDogActivityFoodKilograms'],
                    ],
                    [
                        'l' => 'kilogramsVeggie2',
                        'f' => 'averageDogActivityFoodKilograms*percentageVeggie2',
                        'r' => ['percentageVeggie2', 'averageDogActivityFoodKilograms'],
                    ],
                    [
                        'l' => 'averageDogActivityFoodKilograms',
                        'f' => 'kilogramsVeggie2/percentageVeggie2',
                        'r' => ['percentageVeggie2', 'kilogramsVeggie2'],
                    ],
                ],
            ],
            [
                'formula' => 'kilogramsSeeds2 = percentageSeeds2 * averageDogActivityFoodKilograms',
                'var' => [
                    [
                        'l' => 'percentageSeeds2',
                        'f' => 'kilogramsSeeds2/averageDogActivityFoodKilograms',
                        'r' => ['kilogramsSeeds2', 'averageDogActivityFoodKilograms'],
                    ],
                    [
                        'l' => 'kilogramsSeeds2',
                        'f' => 'averageDogActivityFoodKilograms*percentageSeeds2',
                        'r' => ['percentageSeeds2', 'averageDogActivityFoodKilograms'],
                    ],
                    [
                        'l' => 'averageDogActivityFoodKilograms',
                        'f' => 'kilogramsSeeds2/percentageSeeds2',
                        'r' => ['percentageSeeds2', 'kilogramsSeeds2'],
                    ],
                ],
            ],
            [
                'formula' => 'kilogramsFruits2 = percentageFruits2 * averageDogActivityFoodKilograms',
                'var' => [
                    [
                        'l' => 'kilogramsFruits2',
                        'f' => 'averageDogActivityFoodKilograms*percentageFruits2',
                        'r' => ['percentageFruits2', 'averageDogActivityFoodKilograms'],
                    ],
                    [
                        'l' => 'percentageFruits2',
                        'f' => 'kilogramsFruits2/averageDogActivityFoodKilograms',
                        'r' => ['kilogramsFruits2', 'averageDogActivityFoodKilograms'],
                    ],
                    [
                        'l' => 'averageDogActivityFoodKilograms',
                        'f' => 'kilogramsFruits2/percentageFruits2',
                        'r' => ['kilogramsFruits2', 'percentageFruits2'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'iyGMwqVMWjJ567m7Hvyd1' => [
                'name' => 'diet type',
                'uiType' => 'CHECKBOX',
                'options' => [
                    ['uid' => 'H9GDxJXUOcOZUh4YdTtNc', 'label' => 'Change raw food composition', 'value' => '1'],
                    ['uid' => 'Xs614aHfFl4RSdsbMgWuP', 'label' => '', 'value' => '0'],
                ],
            ],
            'VrXNIFXKekcN3jRaMiBHV' => [
                'name' => 'age',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'PPuhzZvdm2fFa_GHLOS98', 'label' => 'Adult', 'value' => '0'],
                    ['uid' => 'eXbQlagfEcenSZUfms0xU', 'label' => 'Puppy', 'value' => '1'],
                ],
            ],
        ],
        'js' => <<<'TXT'
        "use strict";omni.define("getPercentageDogMass",function(life_stage,age){if(life_stage==0||age>12){return 0.025}if(age<=4){return 0.08}if(age<=6){return 0.07}if(age<=9){return 0.04}if(age<=12){return 0.03}});//# sourceURL=customJs.js
        TXT,
    ],
    'article' => [
        'intro' => 'Supply the muscle meat, the bone, the liver and the vegetables and the Raw dog food calculator solves for <strong>dog\'s ideal body weight</strong>.',
        'sections' => [
            ['title' => 'How does the Raw dog food calculator work?', 'html' => <<<'TXT'
            <p>The Raw dog food calculator takes the values in the form, applies the relationship described below and reports <strong>dog's ideal body weight</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the life stage); then you type in the muscle meat (Daily raw food recommendations), the muscle meat (Daily raw food recommendations), the bone (Daily raw food recommendations) and the bone (Daily raw food recommendations).</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 2 options, such as adult and puppy. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>A single on/off switch — tick it for &ldquo;Change raw food composition&rdquo;, leave it clear for the other case. It changes which relationship the calculator applies, not just a multiplier.</li><li>A measured quantity, entered by default in grams. </li><li>A measured quantity, entered by default in grams. </li><li>A measured quantity, entered by default in grams. </li><li>A measured quantity, entered by default in grams. </li><li>A measured quantity, entered by default in grams. </li><li>A single on/off switch — tick it for &ldquo;Change raw food composition&rdquo;, leave it clear for the other case. It changes which relationship the calculator applies, not just a multiplier.</li><li>A measured quantity, entered by default in grams. </li><li>A measured quantity, entered by default in grams. </li><li>A measured quantity, entered by default in grams. </li><li>A measured quantity, entered by default in grams. </li><li>A measured quantity, entered by default in grams. </li></ul><p>3 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Life stage</strong></td><td>One of 2 options, such as adult and puppy.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Age (months)</strong></td><td>A measured quantity, 27 units available.</td><td>months</td><td>Calculated</td></tr><tr><td><strong>Dog's ideal body weight</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>Calculated</td></tr><tr><td><strong>Required amount of food</strong></td><td>A measured quantity, 29 units available.</td><td>grams</td><td>Calculated</td></tr><tr><td><strong>Muscle meat (Daily raw food recommendations)</strong></td><td>A measured quantity, 29 units available.</td><td>grams</td><td>You supply it</td></tr><tr><td><strong>% (Daily raw food recommendations)</strong></td><td>A measured quantity, 6 units available.</td><td>percent</td><td>Calculated</td></tr><tr><td><strong>Bone (Daily raw food recommendations)</strong></td><td>A measured quantity, 29 units available.</td><td>grams</td><td>You supply it</td></tr><tr><td><strong>% (Daily raw food recommendations)</strong></td><td>A measured quantity, 6 units available.</td><td>percent</td><td>Calculated</td></tr><tr><td><strong>Liver (Daily raw food recommendations)</strong></td><td>A measured quantity, 29 units available.</td><td>grams</td><td>You supply it</td></tr><tr><td><strong>% (Daily raw food recommendations)</strong></td><td>A measured quantity, 6 units available.</td><td>percent</td><td>Calculated</td></tr><tr><td><strong>Organ (Daily raw food recommendations)</strong></td><td>A measured quantity, 29 units available.</td><td>grams</td><td>Calculated</td></tr><tr><td><strong>% (Daily raw food recommendations)</strong></td><td>A measured quantity, 6 units available.</td><td>percent</td><td>Calculated</td></tr><tr><td><strong>Vegetables (Daily raw food recommendations)</strong></td><td>A measured quantity, 29 units available.</td><td>grams</td><td>You supply it</td></tr><tr><td><strong>% (Daily raw food recommendations)</strong></td><td>A measured quantity, 6 units available.</td><td>percent</td><td>Calculated</td></tr><tr><td><strong>Seeds (Daily raw food recommendations)</strong></td><td>A measured quantity, 29 units available.</td><td>grams</td><td>Calculated</td></tr><tr><td><strong>% (Daily raw food recommendations)</strong></td><td>A measured quantity, 6 units available.</td><td>percent</td><td>Calculated</td></tr><tr><td><strong>Fruits (Daily raw food recommendations)</strong></td><td>A measured quantity, 29 units available.</td><td>grams</td><td>You supply it</td></tr><tr><td><strong>% (Daily raw food recommendations)</strong></td><td>A measured quantity, 6 units available.</td><td>percent</td><td>Calculated</td></tr><tr><td><strong>Muscle meat (Daily raw food recommendations)</strong></td><td>A measured quantity, 29 units available.</td><td>grams</td><td>You supply it</td></tr><tr><td><strong>% (Daily raw food recommendations)</strong></td><td>A measured quantity, 6 units available.</td><td>percent</td><td>Calculated</td></tr><tr><td><strong>Bone (Daily raw food recommendations)</strong></td><td>A measured quantity, 29 units available.</td><td>grams</td><td>You supply it</td></tr><tr><td><strong>% (Daily raw food recommendations)</strong></td><td>A measured quantity, 6 units available.</td><td>percent</td><td>Calculated</td></tr><tr><td><strong>Liver (Daily raw food recommendations)</strong></td><td>A measured quantity, 29 units available.</td><td>grams</td><td>You supply it</td></tr><tr><td><strong>% (Daily raw food recommendations)</strong></td><td>A measured quantity, 6 units available.</td><td>percent</td><td>Calculated</td></tr></tbody></table><p>The table lists the first 24 of 32 fields; the rest follow the same pattern.</p>
            TXT],
            ['title' => 'The formula behind the Raw dog food calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Dog&#x27;s ideal body weight</span><span class="formula-eq">=</span><span class="formula-rhs">required amount of food ÷ (life stage, age (months))</span></div><div class="formula-row"><span class="formula-lhs">%</span><span class="formula-eq">=</span><span class="formula-rhs">muscle meat ÷ required amount of food</span></div><div class="formula-row"><span class="formula-lhs">%</span><span class="formula-eq">=</span><span class="formula-rhs">bone ÷ required amount of food</span></div><div class="formula-row"><span class="formula-lhs">%</span><span class="formula-eq">=</span><span class="formula-rhs">liver ÷ required amount of food</span></div><div class="formula-row"><span class="formula-lhs">Organ</span><span class="formula-eq">=</span><span class="formula-rhs">required amount of food × %</span></div><div class="formula-row"><span class="formula-lhs">%</span><span class="formula-eq">=</span><span class="formula-rhs">vegetables ÷ required amount of food</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li><li>Shown in percent, and convertible to any of the 6 units on that chip.</li><li>Shown in percent, and convertible to any of the 6 units on that chip.</li><li>Shown in percent, and convertible to any of the 6 units on that chip.</li><li>Shown in grams, and convertible to any of the 29 units on that chip.</li><li>Shown in percent, and convertible to any of the 6 units on that chip.</li><li>Shown in grams, and convertible to any of the 29 units on that chip.</li><li>Shown in percent, and convertible to any of the 6 units on that chip.</li><li>Shown in percent, and convertible to any of the 6 units on that chip.</li><li>Shown in grams, and convertible to any of the 29 units on that chip.</li><li>Shown in percent, and convertible to any of the 6 units on that chip.</li><li>Shown in grams, and convertible to any of the 29 units on that chip.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Time, opening in months</li><li>Mass, opening in kilograms</li><li>Mass, opening in grams</li><li>Mass, opening in grams</li><li>%, opening in percent</li><li>Mass, opening in grams</li><li>%, opening in percent</li><li>Mass, opening in grams</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Raw dog food calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Supporting a lesson, a lecture or a field note</li><li>Comparing two organisms, populations or processes</li><li>Putting a biological quantity into a scale you can picture</li><li>Any time the same 4 figures keep coming back — the muscle meat, the bone and the liver — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Keep the units you enter consistent. </li><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li><li>Write the answer down with its unit. </li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/sheep-gestation">Sheep gestation</a>, <a href="/biology/sod">Sod</a> and <a href="/biology/soil">Soil</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Raw dog food calculator work out?', 'a' => <<<'TXT'
            It returns dog's ideal body weight, derived from the muscle meat, the bone and the liver. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Raw dog food calculator?', 'a' => <<<'TXT'
            The form asks for the muscle meat, the bone, the liver and the vegetables, which is 13 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter age (months) in a different unit?', 'a' => <<<'TXT'
            Yes. Age (months) opens in months and the chip beside it offers 27 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There are several choices to make (3 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'What is a typical result?', 'a' => <<<'TXT'
            With the values the page starts from, the calculator reports Age (months) = 0 mos. Treat that as a reference point rather than a recommendation: it exists so you can tell at a glance whether your own inputs are on the same scale.
            TXT],
            ['q' => 'Is the Raw dog food calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/sheep-gestation', 'name' => 'Sheep gestation'],
            ['path' => '/biology/sod', 'name' => 'Sod'],
            ['path' => '/biology/soil', 'name' => 'Soil'],
        ],
    ],
];
