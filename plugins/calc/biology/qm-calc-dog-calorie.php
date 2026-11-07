<?php

/**
 * Dog calorie
 * /biology/dog-calorie
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dog calorie',
    'meta' => ['title' => 'Dog calorie Calculator: Formula, Steps & Examples', 'description' => 'The Dog calorie calculator turns the dry matter and the crude fat into the answer. The results leave the screen the moment you edit a field; press Calculate…', 'h1' => 'Dog calorie Calculator', 'updated' => '2026-08-10'],
    'raw' => [
        'vars' => [
            'BNW' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'act' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'Au60jBv9_1gemgM45zds3', 'c' => null],
                ],
                'ds' => '1740',
            ],
            'caloricContent100gr' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'calorieHigh' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'calorieLow' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'calorieModHigh' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'calorieModLow' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'crude_ash' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '5', 'c' => null],
                ],
            ],
            'crude_fat' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '3.5', 'c' => null],
                ],
            ],
            'crude_fiber' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '16', 'c' => null],
                ],
            ],
            'crude_protein' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '25', 'c' => null],
                ],
            ],
            'days' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'daysHigh' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'daysLow' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'daysModHigh' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'daysModLow' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'digestible_energy' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'dry_matter' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '90', 'c' => null],
                ],
            ],
            'dry_pulse_fiber' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'energyContent' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'extra' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'gg4o-u7oFC2Q6I5zZ5jIR', 'c' => null],
                ],
                'ds' => '1741',
            ],
            'extra2' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'ByUbchfIz-i9XDN87jyTU', 'c' => null],
                ],
                'ds' => '2S8_2yHXM-a5H-lQP1JZ6',
            ],
            'foodHigh' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'foodLow' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'foodModHigh' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'foodModLow' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'gross_energy' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'weight' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'wspStrEB' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'ENLCdgRHtTkC41Q3mItMX',
                'title' => 'How many calories does my dog need?',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'act',
                                    'vt' => 'valueSelect',
                                    'l' => 'Activity',
                                    'h' => <<<'TXT'
                                    Choose the level of activity your dog typically gets. Check the "How to use" paragraph of the text for more detail if you're unsure what kind of activity your dog gets!
                                    TXT,
                                    'ds' => '1740',
                                    'opts' => [
                                        ['t6Riwb0CzmpwS1_nqp8cJ', 'Low (including senior): <1h/day', '0'],
                                        ['Au60jBv9_1gemgM45zds3', 'Moderate (low intensity): 1-3h/day', '1'],
                                        ['DM_wuMtm-_dAe7_if3vOZ', 'Moderate (high intensity): 3-6h/day', '2'],
                                        ['J34_rKj23FJrsilxRAgoQ', 'High (working dogs): 3-6h/day', '3'],
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
                                        ['act == 0', 'Characterized as less than 1 hour of low-intensity activity per day, for example, walking on a leash. It also applies to elderly dogs.'],
                                        ['act == 1', 'This is the most common type. It means 1−3 hours a day of low-intensity activity, such as walking on a leash.'],
                                        ['act == 2', '3−6 hours a day of high-intensity activity, such as unleashed walks with considerate amounts of running, games, playing with other dogs, etc.'],
                                        ['act == 3', '3−6 hours of work per day, such as sheepdogs.'],
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
                                    'n' => 'weight',
                                    'vt' => 'numerical',
                                    'l' => 'Weight',
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
                                    'n' => 'calorieLow',
                                    'vt' => 'numerical',
                                    'l' => 'Your dog needs',
                                    'us' => '44',
                                    'du' => 'kcal',
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
                                    'n' => 'calorieModLow',
                                    'vt' => 'numerical',
                                    'l' => 'Your dog needs',
                                    'us' => '44',
                                    'du' => 'kcal',
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
                                    'n' => 'calorieModHigh',
                                    'vt' => 'numerical',
                                    'l' => 'Your dog needs',
                                    'us' => '44',
                                    'du' => 'kcal',
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
                                    'n' => 'calorieHigh',
                                    'vt' => 'numerical',
                                    'l' => 'Your dog needs',
                                    'us' => '44',
                                    'du' => 'kcal',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'DO7qbA3B4CSxmzOtOaEjk',
                'title' => 'Do you also want to calculate the...',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'extra',
                                    'vt' => 'valueSelect',
                                    'l' => '',
                                    'h' => 'Select "Yes" here if you want to calculate the amount of food required based on its caloric content.',
                                    'ds' => '1741',
                                    'opts' => [
                                        ['gg4o-u7oFC2Q6I5zZ5jIR', 'amount of food?', '55'],
                                        ['P_TgX1meVG_cDAEMe44V4', '', '66'],
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
                                    'n' => 'extra2',
                                    'vt' => 'valueSelect',
                                    'l' => '',
                                    'h' => 'Pick "Yes" here if you want to manually calculate the metabolic energy in a specific food.',
                                    'ds' => '2S8_2yHXM-a5H-lQP1JZ6',
                                    'opts' => [
                                        ['ZoO4WM5qeNrVyLAa27h55', 'calorie content of a specific food?', '55'],
                                        ['ByUbchfIz-i9XDN87jyTU', '', '66'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => '4ZbApOJEx1zoCAC3KBPPQ',
                'title' => 'How much food is that?',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'energyContent',
                                    'vt' => 'numerical',
                                    'l' => 'Energy content in food',
                                    'suf' => 'kcal/100g',
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
                                    'n' => 'foodLow',
                                    'vt' => 'numerical',
                                    'l' => 'Your dog should eat',
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
                                    'n' => 'foodModLow',
                                    'vt' => 'numerical',
                                    'l' => 'Your dog should eat',
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
                                    'n' => 'foodModHigh',
                                    'vt' => 'numerical',
                                    'l' => 'Your dog should eat',
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
                                    'n' => 'foodHigh',
                                    'vt' => 'numerical',
                                    'l' => 'Your dog should eat',
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
                                ['t' => 'v', 'n' => 'days', 'vt' => 'numerical', 'l' => 'How many days do you need food for?'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'daysLow',
                                    'vt' => 'numerical',
                                    'l' => 'Amount of food for given the number of days:',
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
                                    'n' => 'daysModLow',
                                    'vt' => 'numerical',
                                    'l' => 'Amount of food for given the number of days:',
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
                                    'n' => 'daysModHigh',
                                    'vt' => 'numerical',
                                    'l' => 'Amount of food for given the number of days:',
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
                                    'n' => 'daysHigh',
                                    'vt' => 'numerical',
                                    'l' => 'Amount of food for given the number of days:',
                                    'us' => '22',
                                    'du' => 'g',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'jvoXr-YwDRG1p3JxnWdtp',
                'title' => 'How caloric is my dog\'s food?',
                'desc' => <<<'TXT'
                If you're unsure of the precise caloric content of your dog's food, use this part of the dog calorie calculator to figure it out based on the information about its specific components, which is always provided on the food's packaging. Below, you will see how much of each component is in a typical example of dog food. Feel free to change the values according to the brand you use.
                TXT,
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'dry_matter',
                                    'vt' => 'numerical',
                                    'l' => 'Dry matter',
                                    'h' => 'What would stay if you evaporated all the water from your dog\'s food.',
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
                                    'n' => 'crude_protein',
                                    'vt' => 'numerical',
                                    'l' => 'Crude protein',
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
                                    'n' => 'crude_ash',
                                    'vt' => 'numerical',
                                    'l' => 'Crude ash',
                                    'h' => 'Although it sounds scary, "crude ash" actually means all the essential minerals.',
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
                                    'n' => 'crude_fat',
                                    'vt' => 'numerical',
                                    'l' => 'Crude fat',
                                    'h' => 'Total amount of fats in your dog\'s food.',
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
                                    'n' => 'crude_fiber',
                                    'vt' => 'numerical',
                                    'l' => 'Crude fiber',
                                    'h' => 'Fiber, the indigestible part of the food, is crucial for the digestive system\'s health.',
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
                                    'n' => 'caloricContent100gr',
                                    'vt' => 'numerical',
                                    'l' => 'Caloric content of food',
                                    'suf' => 'kcal/100g',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'oeAmbcRzItOc4UevP5BaK',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'digestible_energy',
                                    'vt' => 'numerical',
                                    'l' => 'Digestible energy',
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
                                ['t' => 'v', 'n' => 'BNW', 'vt' => 'numerical', 'l' => 'Bnw'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'gross_energy', 'vt' => 'numerical', 'l' => 'Gross energy'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'wspStrEB', 'vt' => 'numerical', 'l' => 'Wspstreb'],
                                [
                                    't' => 'v',
                                    'n' => 'dry_pulse_fiber',
                                    'vt' => 'numerical',
                                    'l' => 'Dry Pulse Fiber',
                                    'us' => '22',
                                    'du' => 'g',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'calorieLow = 95 * weight^0.75',
                'var' => [
                    [
                        'l' => 'calorieLow',
                        'f' => '95*pow(weight, 3/4)',
                        'r' => ['weight'],
                    ],
                    [
                        'l' => 'weight',
                        'f' => '(1/9025)*pow(95, 2/3)*pow(calorieLow, 4/3)',
                        'r' => ['calorieLow'],
                    ],
                ],
            ],
            [
                'formula' => 'calorieModLow = 110 * weight^0.75',
                'var' => [
                    [
                        'l' => 'weight',
                        'f' => '(1/12100)*pow(110, 2/3)*pow(calorieModLow, 4/3)',
                        'r' => ['calorieModLow'],
                    ],
                    [
                        'l' => 'calorieModLow',
                        'f' => '110*pow(weight, 3/4)',
                        'r' => ['weight'],
                    ],
                ],
            ],
            [
                'formula' => 'calorieModHigh = 125 * weight^0.75',
                'var' => [
                    [
                        'l' => 'weight',
                        'f' => '(1/625)*pow(calorieModHigh, 4/3)',
                        'r' => ['calorieModHigh'],
                    ],
                    [
                        'l' => 'calorieModHigh',
                        'f' => '125*pow(weight, 3/4)',
                        'r' => ['weight'],
                    ],
                ],
            ],
            [
                'formula' => 'calorieHigh = 175 * weight^0.75',
                'var' => [
                    [
                        'l' => 'calorieHigh',
                        'f' => '175*pow(weight, 3/4)',
                        'r' => ['weight'],
                    ],
                    [
                        'l' => 'weight',
                        'f' => '(1/6125)*cbrt(245)*pow(calorieHigh, 4/3)',
                        'r' => ['calorieHigh'],
                    ],
                ],
            ],
            [
                'formula' => 'foodLow = (calorieLow * 100) / energyContent',
                'var' => [
                    [
                        'l' => 'calorieLow',
                        'f' => '(1/100)*energyContent*foodLow',
                        'r' => ['energyContent', 'foodLow'],
                    ],
                    [
                        'l' => 'energyContent',
                        'f' => '100*calorieLow/foodLow',
                        'r' => ['calorieLow', 'foodLow'],
                    ],
                    [
                        'l' => 'foodLow',
                        'f' => '100*calorieLow/energyContent',
                        'r' => ['calorieLow', 'energyContent'],
                    ],
                ],
            ],
            [
                'formula' => 'foodModLow = (calorieModLow * 100) / energyContent',
                'var' => [
                    [
                        'l' => 'foodModLow',
                        'f' => '100*calorieModLow/energyContent',
                        'r' => ['energyContent', 'calorieModLow'],
                    ],
                    [
                        'l' => 'energyContent',
                        'f' => '100*calorieModLow/foodModLow',
                        'r' => ['foodModLow', 'calorieModLow'],
                    ],
                    [
                        'l' => 'calorieModLow',
                        'f' => '(1/100)*energyContent*foodModLow',
                        'r' => ['foodModLow', 'energyContent'],
                    ],
                ],
            ],
            [
                'formula' => 'foodModHigh = (calorieModHigh * 100) / energyContent',
                'var' => [
                    [
                        'l' => 'energyContent',
                        'f' => '100*calorieModHigh/foodModHigh',
                        'r' => ['calorieModHigh', 'foodModHigh'],
                    ],
                    [
                        'l' => 'calorieModHigh',
                        'f' => '(1/100)*energyContent*foodModHigh',
                        'r' => ['energyContent', 'foodModHigh'],
                    ],
                    [
                        'l' => 'foodModHigh',
                        'f' => '100*calorieModHigh/energyContent',
                        'r' => ['energyContent', 'calorieModHigh'],
                    ],
                ],
            ],
            [
                'formula' => 'foodHigh = (calorieHigh * 100) / energyContent',
                'var' => [
                    [
                        'l' => 'foodHigh',
                        'f' => '100*calorieHigh/energyContent',
                        'r' => ['calorieHigh', 'energyContent'],
                    ],
                    [
                        'l' => 'calorieHigh',
                        'f' => '(1/100)*energyContent*foodHigh',
                        'r' => ['foodHigh', 'energyContent'],
                    ],
                    [
                        'l' => 'energyContent',
                        'f' => '100*calorieHigh/foodHigh',
                        'r' => ['foodHigh', 'calorieHigh'],
                    ],
                ],
            ],
            [
                'formula' => 'gross_energy = (crude_protein * 5.70) + (crude_fat * 9.40) + (4.10* (crude_fiber +BNW))',
                'var' => [
                    [
                        'l' => 'BNW',
                        'f' => '-94/41*crude_fat - crude_fiber - 57/41*crude_protein + (10/41)*gross_energy',
                        'r' => ['crude_fat', 'crude_protein', 'gross_energy', 'crude_fiber'],
                    ],
                    [
                        'l' => 'crude_fat',
                        'f' => '-41/94*BNW - 41/94*crude_fiber - 57/94*crude_protein + (5/47)*gross_energy',
                        'r' => ['BNW', 'crude_protein', 'gross_energy', 'crude_fiber'],
                    ],
                    [
                        'l' => 'crude_protein',
                        'f' => '-41/57*BNW - 94/57*crude_fat - 41/57*crude_fiber + (10/57)*gross_energy',
                        'r' => ['BNW', 'crude_fat', 'gross_energy', 'crude_fiber'],
                    ],
                    [
                        'l' => 'gross_energy',
                        'f' => '(41/10)*BNW + (47/5)*crude_fat + (41/10)*crude_fiber + (57/10)*crude_protein',
                        'r' => ['BNW', 'crude_fat', 'crude_protein', 'crude_fiber'],
                    ],
                    [
                        'l' => 'crude_fiber',
                        'f' => '-BNW - 94/41*crude_fat - 57/41*crude_protein + (10/41)*gross_energy',
                        'r' => ['BNW', 'crude_fat', 'crude_protein', 'gross_energy'],
                    ],
                ],
            ],
            [
                'formula' => 'BNW = dry_matter - crude_ash - crude_protein - crude_fat - crude_fiber',
                'var' => [
                    [
                        'l' => 'crude_ash',
                        'f' => '-BNW - crude_fat - crude_fiber - crude_protein + dry_matter',
                        'r' => [
                            'BNW',
                            'crude_fat',
                            'crude_protein',
                            'dry_matter',
                            'crude_fiber',
                        ],
                    ],
                    [
                        'l' => 'BNW',
                        'f' => '-crude_ash - crude_fat - crude_fiber - crude_protein + dry_matter',
                        'r' => [
                            'crude_ash',
                            'crude_fat',
                            'crude_protein',
                            'dry_matter',
                            'crude_fiber',
                        ],
                    ],
                    [
                        'l' => 'crude_fat',
                        'f' => '-BNW - crude_ash - crude_fiber - crude_protein + dry_matter',
                        'r' => [
                            'crude_ash',
                            'BNW',
                            'crude_protein',
                            'dry_matter',
                            'crude_fiber',
                        ],
                    ],
                    [
                        'l' => 'crude_protein',
                        'f' => '-BNW - crude_ash - crude_fat - crude_fiber + dry_matter',
                        'r' => [
                            'crude_ash',
                            'BNW',
                            'crude_fat',
                            'dry_matter',
                            'crude_fiber',
                        ],
                    ],
                    [
                        'l' => 'dry_matter',
                        'f' => 'BNW + crude_ash + crude_fat + crude_fiber + crude_protein',
                        'r' => [
                            'crude_ash',
                            'BNW',
                            'crude_fat',
                            'crude_protein',
                            'crude_fiber',
                        ],
                    ],
                    [
                        'l' => 'crude_fiber',
                        'f' => '-BNW - crude_ash - crude_fat - crude_protein + dry_matter',
                        'r' => [
                            'crude_ash',
                            'BNW',
                            'crude_fat',
                            'crude_protein',
                            'dry_matter',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'wspStrEB = 91.2 - (1.43 * dry_pulse_fiber)',
                'var' => [
                    [
                        'l' => 'wspStrEB',
                        'f' => '456/5 - 143/100*dry_pulse_fiber',
                        'r' => ['dry_pulse_fiber'],
                    ],
                    [
                        'l' => 'dry_pulse_fiber',
                        'f' => '9120/143 - 100/143*wspStrEB',
                        'r' => ['wspStrEB'],
                    ],
                ],
            ],
            [
                'formula' => 'dry_pulse_fiber = 100 * crude_fiber / dry_matter',
                'var' => [
                    [
                        'l' => 'crude_fiber',
                        'f' => '(1/100)*dry_matter*dry_pulse_fiber',
                        'r' => ['dry_matter', 'dry_pulse_fiber'],
                    ],
                    [
                        'l' => 'dry_matter',
                        'f' => '100*crude_fiber/dry_pulse_fiber',
                        'r' => ['crude_fiber', 'dry_pulse_fiber'],
                    ],
                    [
                        'l' => 'dry_pulse_fiber',
                        'f' => '100*crude_fiber/dry_matter',
                        'r' => ['crude_fiber', 'dry_matter'],
                    ],
                ],
            ],
            [
                'formula' => 'digestible_energy = gross_energy * wspStrEB / 100',
                'var' => [
                    [
                        'l' => 'gross_energy',
                        'f' => '100*digestible_energy/wspStrEB',
                        'r' => ['wspStrEB', 'digestible_energy'],
                    ],
                    [
                        'l' => 'wspStrEB',
                        'f' => '100*digestible_energy/gross_energy',
                        'r' => ['gross_energy', 'digestible_energy'],
                    ],
                    [
                        'l' => 'digestible_energy',
                        'f' => '(1/100)*gross_energy*wspStrEB',
                        'r' => ['gross_energy', 'wspStrEB'],
                    ],
                ],
            ],
            [
                'formula' => 'caloricContent100gr = digestible_energy - (1.04 * crude_protein)',
                'var' => [
                    [
                        'l' => 'crude_protein',
                        'f' => '-25/26*caloricContent100gr + (25/26)*digestible_energy',
                        'r' => ['caloricContent100gr', 'digestible_energy'],
                    ],
                    [
                        'l' => 'caloricContent100gr',
                        'f' => '-26/25*crude_protein + digestible_energy',
                        'r' => ['crude_protein', 'digestible_energy'],
                    ],
                    [
                        'l' => 'digestible_energy',
                        'f' => 'caloricContent100gr + (26/25)*crude_protein',
                        'r' => ['crude_protein', 'caloricContent100gr'],
                    ],
                ],
            ],
            [
                'formula' => 'daysModLow = foodModLow * days',
                'var' => [
                    [
                        'l' => 'foodModLow',
                        'f' => 'daysModLow/days',
                        'r' => ['daysModLow', 'days'],
                    ],
                    [
                        'l' => 'daysModLow',
                        'f' => 'days*foodModLow',
                        'r' => ['foodModLow', 'days'],
                    ],
                    [
                        'l' => 'days',
                        'f' => 'daysModLow/foodModLow',
                        'r' => ['foodModLow', 'daysModLow'],
                    ],
                ],
            ],
            [
                'formula' => 'daysLow = foodLow * days',
                'var' => [
                    [
                        'l' => 'daysLow',
                        'f' => 'days*foodLow',
                        'r' => ['foodLow', 'days'],
                    ],
                    [
                        'l' => 'foodLow',
                        'f' => 'daysLow/days',
                        'r' => ['daysLow', 'days'],
                    ],
                    [
                        'l' => 'days',
                        'f' => 'daysLow/foodLow',
                        'r' => ['daysLow', 'foodLow'],
                    ],
                ],
            ],
            [
                'formula' => 'daysModHigh = foodModHigh * days',
                'var' => [
                    [
                        'l' => 'days',
                        'f' => 'daysModHigh/foodModHigh',
                        'r' => ['daysModHigh', 'foodModHigh'],
                    ],
                    [
                        'l' => 'daysModHigh',
                        'f' => 'days*foodModHigh',
                        'r' => ['days', 'foodModHigh'],
                    ],
                    [
                        'l' => 'foodModHigh',
                        'f' => 'daysModHigh/days',
                        'r' => ['days', 'daysModHigh'],
                    ],
                ],
            ],
            [
                'formula' => 'daysHigh = foodHigh * days',
                'var' => [
                    [
                        'l' => 'foodHigh',
                        'f' => 'daysHigh/days',
                        'r' => ['days', 'daysHigh'],
                    ],
                    [
                        'l' => 'days',
                        'f' => 'daysHigh/foodHigh',
                        'r' => ['foodHigh', 'daysHigh'],
                    ],
                    [
                        'l' => 'daysHigh',
                        'f' => 'days*foodHigh',
                        'r' => ['foodHigh', 'days'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            '1740' => [
                'name' => 'Activity',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 't6Riwb0CzmpwS1_nqp8cJ', 'label' => 'Low (including senior): <1h/day', 'value' => '0'],
                    ['uid' => 'Au60jBv9_1gemgM45zds3', 'label' => 'Moderate (low intensity): 1-3h/day', 'value' => '1'],
                    ['uid' => 'DM_wuMtm-_dAe7_if3vOZ', 'label' => 'Moderate (high intensity): 3-6h/day', 'value' => '2'],
                    ['uid' => 'J34_rKj23FJrsilxRAgoQ', 'label' => 'High (working dogs): 3-6h/day', 'value' => '3'],
                ],
            ],
            '1741' => [
                'name' => 'Amount of food?',
                'uiType' => 'CHECKBOX',
                'options' => [
                    ['uid' => 'gg4o-u7oFC2Q6I5zZ5jIR', 'label' => 'amount of food?', 'value' => '55'],
                    ['uid' => 'P_TgX1meVG_cDAEMe44V4', 'label' => '', 'value' => '66'],
                ],
            ],
            '2S8_2yHXM-a5H-lQP1JZ6' => [
                'name' => 'Calorie content of specific food?',
                'uiType' => 'CHECKBOX',
                'options' => [
                    ['uid' => 'ZoO4WM5qeNrVyLAa27h55', 'label' => 'calorie content of a specific food?', 'value' => '55'],
                    ['uid' => 'ByUbchfIz-i9XDN87jyTU', 'label' => '', 'value' => '66'],
                ],
            ],
        ],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        The Dog calorie calculator turns the dry matter and the crude fat into the answer. 
        
        The results leave the screen the moment you edit a field; press Calculate and they come back updated, so a single changed input shows its own effect.
        TXT,
        'sections' => [
            ['title' => 'How does the Dog calorie calculator work?', 'html' => <<<'TXT'
            <p>The Dog calorie calculator takes the values in the form, applies the relationships described below and reports every result it can derive from them.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the activity); then you type in the dry matter, the crude fat, the caloric content of food and the digestible energy.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 4 options, such as low (including senior): &lt;1h/day, moderate (low intensity): 1-3h/day and moderate (high intensity): 3-6h/day. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>A measured quantity, entered by default in kilocalories. The unit chip switches it to any of the 33 supported units.</li><li>A single on/off switch — tick it for &ldquo;amount of food?&rdquo;, leave it clear for the other case. It changes which relationship the calculator applies, not just a multiplier.</li><li>A single on/off switch — tick it for &ldquo;calorie content of a specific food?&rdquo;, leave it clear for the other case. It changes which relationship the calculator applies, not just a multiplier.</li><li>A measured quantity, entered by default in grams. </li><li>A measured quantity, entered by default in grams. </li><li>A measured quantity, entered by default in grams. </li><li>A measured quantity, entered by default in grams. </li><li>A number, expressed in kcal/100g.</li><li>A measured quantity, entered by default in grams. </li><li>A measured quantity, entered by default in grams. </li></ul><p>3 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Activity</strong></td><td>One of 4 options, such as low (including senior): &lt;1h/day, moderate (low intensity): 1-3h/day and moderate (high intensity): 3-6h/day.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Weight</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>Calculated</td></tr><tr><td><strong>Energy content in food</strong></td><td>A number stated in kcal/100g.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Dry matter</strong></td><td>A measured quantity, 29 units available.</td><td>grams</td><td>You supply it</td></tr><tr><td><strong>Crude protein</strong></td><td>A measured quantity, 29 units available.</td><td>grams</td><td>Calculated</td></tr><tr><td><strong>Crude ash</strong></td><td>A measured quantity, 29 units available.</td><td>grams</td><td>Calculated</td></tr><tr><td><strong>Crude fat</strong></td><td>A measured quantity, 29 units available.</td><td>grams</td><td>You supply it</td></tr><tr><td><strong>Crude fiber</strong></td><td>A measured quantity, 29 units available.</td><td>grams</td><td>Calculated</td></tr><tr><td><strong>Caloric content of food</strong></td><td>A number stated in kcal/100g.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Digestible energy</strong></td><td>A measured quantity, 29 units available.</td><td>grams</td><td>You supply it</td></tr><tr><td><strong>Bnw</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Gross energy</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Wspstreb</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Dry Pulse Fiber</strong></td><td>A measured quantity, 29 units available.</td><td>grams</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Dog calorie calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Your dog needs</span><span class="formula-eq">=</span><span class="formula-rhs">95 × (weight ^ 3 ÷ 4)</span></div><div class="formula-row"><span class="formula-lhs">Weight</span><span class="formula-eq">=</span><span class="formula-rhs">(1 ÷ 12100) × (110 ^ 2 ÷ 3) × (your dog needs ^ 4 ÷ 3)</span></div><div class="formula-row"><span class="formula-lhs">Weight</span><span class="formula-eq">=</span><span class="formula-rhs">(1 ÷ 625) × (your dog needs ^ 4 ÷ 3)</span></div><div class="formula-row"><span class="formula-lhs">Your dog needs</span><span class="formula-eq">=</span><span class="formula-rhs">175 × (weight ^ 3 ÷ 4)</span></div><div class="formula-row"><span class="formula-lhs">Your dog needs</span><span class="formula-eq">=</span><span class="formula-rhs">(1 ÷ 100) × energy content in food × your dog should eat</span></div><div class="formula-row"><span class="formula-lhs">Your dog should eat</span><span class="formula-eq">=</span><span class="formula-rhs">100 × your dog needs ÷ energy content in food</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What is a worked example?', 'html' => <<<'TXT'
            <p>The form opens with a complete set of values: <strong>Activity</strong> set to Moderate (low intensity): 1-3h/day, <strong>Dry matter</strong> = 0.09 g, <strong>Crude protein</strong> = 0.025 g and <strong>Crude ash</strong> = 0.005 g. Straight away the calculator returns <strong>Caloric content of food</strong> = 0.2417, <strong>Digestible energy</strong> = 0.2677 g, <strong>Bnw</strong> = 0.0405 and <strong>Gross energy</strong> = 0.407.</p><p>Those are real numbers produced by the same engine that runs when you press Calculate, so you can change any single box afterwards and watch the answer move from this starting point.</p><ol><li>Enter the values listed above, matching the units each box asks for.</li><li>Read off the result. Any field you leave empty is the one the calculator solves for.</li><li>Sanity-check the number against the relationship: <strong>Caloric content of food</strong> = 0.2417, <strong>Digestible energy</strong> = 0.2677 g, <strong>Bnw</strong> = 0.0405 and <strong>Gross energy</strong> = 0.407 should be roughly the size you expected from <strong>Activity</strong> set to Moderate (low intensity): 1-3h/day and <strong>Dry matter</strong> = 0.09 g.</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in kilocalories, and convertible to any of the 33 units on that chip.</li><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li><li>Shown in kilocalories, and convertible to any of the 33 units on that chip.</li><li>Shown in kilocalories, and convertible to any of the 33 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in grams, and convertible to any of the 29 units on that chip.</li><li>Shown in grams, and convertible to any of the 29 units on that chip.</li><li>Shown in grams, and convertible to any of the 29 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in grams, and convertible to any of the 29 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in grams, and convertible to any of the 29 units on that chip.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Mass, opening in kilograms</li><li>Energy, opening in kilocalories</li><li>Energy, opening in kilocalories</li><li>Energy, opening in kilocalories</li><li>Energy, opening in kilocalories</li><li>Mass, opening in grams</li><li>Mass, opening in grams</li><li>Mass, opening in grams</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Dog calorie calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Putting a biological quantity into a scale you can picture</li><li>Comparing two organisms, populations or processes</li><li>Supporting a lesson, a lecture or a field note</li><li>Any time the same 2 figures keep coming back — the dry matter and the crude fat — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Write the answer down with its unit. </li><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/dog-chocolate-toxicity">Dog chocolate toxicity</a>, <a href="/biology/dog-crate-size">Dog crate size</a> and <a href="/biology/dog-food">Dog food</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What do I need to enter to use the Dog calorie calculator?', 'a' => <<<'TXT'
            The form asks for the dry matter and the crude fat, which is 11 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter weight in a different unit?', 'a' => <<<'TXT'
            Yes. Weight opens in kilograms and the chip beside it offers 29 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There are several choices to make (3 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'What is a typical result?', 'a' => <<<'TXT'
            With the values the page starts from, the calculator reports Caloric content of food = 0.2417. Treat that as a reference point rather than a recommendation: it exists so you can tell at a glance whether your own inputs are on the same scale.
            TXT],
            ['q' => 'Is the Dog calorie calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/dog-chocolate-toxicity', 'name' => 'Dog chocolate toxicity'],
            ['path' => '/biology/dog-crate-size', 'name' => 'Dog crate size'],
            ['path' => '/biology/dog-food', 'name' => 'Dog food'],
        ],
    ],
];
