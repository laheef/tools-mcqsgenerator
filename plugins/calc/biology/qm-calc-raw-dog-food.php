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
    'meta' => ['title' => 'Raw dog food Calculator — Formula & Results', 'description' => 'Raw dog food turns Life stage, Dog\'s ideal body weight and Required amount of food into Age (months) and %. The chip beside Dog&#039;s ideal body weight…', 'h1' => 'Raw dog food Calculator', 'updated' => '2026-05-25'],
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
        'intro' => <<<'TXT'
        Raw dog food turns Life stage, Dog's ideal body weight and Required amount of food into Age (months) and %. The arithmetic is the whole method: Age (months) is worked out from Life stage by one formula, applied once. Age (months) comes back in months unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Raw dog food calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Raw dog food: it takes 19 numbers and reports Age (months), % and %.</p><p>In the form&#039;s own words, Dog&#039;s ideal body weight = Required amount of food ÷ getPercentageDogMass(Life stage, Age (months)).</p><p>The result panel carries Age (months), %, % and %, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 19 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Life stage</strong> — a plain number, no unit</li><li><strong>Dog&#039;s ideal body weight</strong> — in kilograms</li><li><strong>Required amount of food</strong> — in grams. How much your dog needs to eat each day, assuming healthy balanced diet.</li><li><strong>diet_type</strong> — a plain number, no unit</li><li><strong>Muscle meat</strong> — in grams</li><li><strong>Bone</strong> — in grams</li><li><strong>Liver</strong> — in grams</li><li><strong>Organ</strong> — in grams. Other secreting organs: the most common is the spleen.</li><li><strong>Vegetables</strong> — in grams</li><li><strong>Seeds</strong> — in grams</li><li><strong>Fruits</strong> — in grams</li><li><strong>diet_type2</strong> — a plain number, no unit</li><li><strong>Muscle meat</strong> — in grams</li><li><strong>Bone</strong> — in grams</li><li><strong>Liver</strong> — in grams</li><li><strong>Organ</strong> — in grams. Other secreting organs: the most common is the spleen.</li><li><strong>Vegetables</strong> — in grams</li><li><strong>Seeds</strong> — in grams</li><li><strong>Fruits</strong> — in grams</li></ul><p>The answers come back as Age (months) in months, % in percent, % in percent, % in percent, % in percent, % in percent, % in percent, % in percent, % in percent, % in percent, % in percent, % in percent, % in percent, % in percent, % in percent. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Age (months) offers 18 units and opens on months, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Dog&#039;s ideal body weight</strong> = <code>Required amount of food ÷ getPercentageDogMass(Life stage, Age (months))</code></li><li><strong>Required amount of food</strong> = <code>Dog&#039;s ideal body weight × getPercentageDogMass(Life stage, Age (months))</code></li><li><strong>%</strong> = <code>Muscle meat ÷ Required amount of food</code></li><li><strong>Muscle meat</strong> = <code>Required amount of food × %</code></li><li><strong>Bone</strong> = <code>Required amount of food × %</code></li><li><strong>Liver</strong> = <code>Required amount of food × %</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Dog&#039;s ideal body weight</strong> = <code>Required amount of food ÷ getPercentageDogMass(Life stage, Age (months))</code> — the form to use when Required amount of food, Age (months) and Life stage are the values you have.</li><li><strong>Required amount of food</strong> = <code>Dog&#039;s ideal body weight × getPercentageDogMass(Life stage, Age (months))</code> — the form to use when Dog&#039;s ideal body weight, Age (months) and Life stage are the values you have.</li><li><strong>%</strong> = <code>Muscle meat ÷ Required amount of food</code> — the form to use when Muscle meat and Required amount of food are the values you have.</li><li><strong>Muscle meat</strong> = <code>Required amount of food × %</code> — the form to use when % and Required amount of food are the values you have.</li><li><strong>Required amount of food</strong> = <code>Muscle meat ÷ %</code> — the form to use when % and Muscle meat are the values you have.</li><li><strong>%</strong> = <code>Bone ÷ Required amount of food</code> — the form to use when Bone and Required amount of food are the values you have.</li><li><strong>Bone</strong> = <code>Required amount of food × %</code> — the form to use when % and Required amount of food are the values you have.</li><li><strong>Required amount of food</strong> = <code>Bone ÷ %</code> — the form to use when % and Bone are the values you have.</li></ul><p>Any one of Dog&#039;s ideal body weight, Required amount of food and % can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Dog&#039;s ideal body weight, Required amount of food and Muscle meat is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Age (months), % and % are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Life stage left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Life stage is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Dog&#039;s ideal body weight left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Dog&amp;#039;s ideal body weight is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Life stage to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Life stage, Dog&#039;s ideal body weight, Required amount of food and diet_type ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Life stage — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Age (months) in mos against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Age (months) follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are months, percent and grams and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Life stage, Dog&#039;s ideal body weight and Required amount of food are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Life stage, Dog&#039;s ideal body weight and Required amount of food and the number you are missing is Age (months) and %.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/svi-sludge-volume-index">Sludge Volume Index (SVI) Calculator</a>, <a href="/biology/sod">Sod Calculator</a> and <a href="/biology/soil">Soil Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Raw dog food is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Raw dog food is a number to act on, so the useful question is what to do with Age (months) (mos), % (perc) and % (perc) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Life stage, Dog&#039;s ideal body weight, Required amount of food and diet_type alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Raw dog food calculator work out?', 'a' => <<<'TXT'
            Age (months), %, % and %, from Required amount of food, Age (months) and Life stage. The relationship is Dog's ideal body weight = Required amount of food ÷ getPercentageDogMass(Life stage, Age (months)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Life stage, Dog's ideal body weight (kilograms), Required amount of food (grams), diet_type, Muscle meat (grams). With life_stage, bodyWeight and averageDogActivityFoodKilograms in place, Age (months) can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Dog's ideal body weight, Required amount of food, % and Muscle meat blank and the page solves for that one instead — nothing has to be switched first.
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
