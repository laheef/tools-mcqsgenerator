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
    'meta' => ['title' => 'Dog calorie Calculator: Formula, Steps & Examples', 'description' => 'Dog calorie works out Your dog needs and Your dog needs from Weight. Units for Your dog needs default to kilocalories and can be changed on the answer itself.', 'h1' => 'Dog calorie Calculator', 'updated' => '2026-08-10'],
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
        Dog calorie works out Your dog needs and Your dog needs from Weight. It is a single relationship that reads Your dog needs out of Weight, not a table of canned results keyed by them. Units for Your dog needs default to kilocalories and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Dog calorie calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Dog calorie: it takes 1 number and reports Your dog needs, Your dog needs and Your dog needs.</p><p>In the form&#039;s own words, Your dog needs = 95 × (Weight)^(3 ÷ 4).</p><p>What comes back is Your dog needs, Your dog needs, Your dog needs and Your dog needs — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 1 box and the page has everything it needs.</p><ul><li><strong>Weight</strong> — in kilograms</li></ul><p>The answers come back as Your dog needs in kilocalories, Your dog needs in kilocalories, Your dog needs in kilocalories, Your dog needs in kilocalories, Energy content in food in kcal/100g, Your dog should eat in grams, Your dog should eat in grams, Your dog should eat in grams, Your dog should eat in grams, How many days do you need food for?, Amount of food for given the number of days in grams, Amount of food for given the number of days in grams, Amount of food for given the number of days in grams, Amount of food for given the number of days in grams, Dry matter in grams, Crude protein in grams, Crude ash in grams, Crude fat in grams, Crude fiber in grams, Caloric content of food in kcal/100g, Digestible energy in grams, Bnw, Gross energy, Wspstreb, Dry Pulse Fiber in grams. </p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Your dog needs</strong> = <code>95 × (Weight)^(3 ÷ 4)</code></li><li><strong>Weight</strong> = <code>(1 ÷ 9025) × (95)^(2 ÷ 3) × (Your dog needs)^(4 ÷ 3)</code></li><li><strong>Energy content in food</strong> = <code>100 × Your dog needs ÷ Your dog should eat</code></li><li><strong>Your dog should eat</strong> = <code>100 × Your dog needs ÷ Energy content in food</code></li><li><strong>Bnw</strong> = <code>− 94 ÷ 41 × Crude fat − Crude fiber − 57 ÷ 41 × Crude protein + (10 ÷ 41) × Gross energy</code></li><li><strong>Crude fat</strong> = <code>− 41 ÷ 94 × Bnw − 41 ÷ 94 × Crude fiber − 57 ÷ 94 × Crude protein + (5 ÷ 47) × Gross energy</code></li></ul><p>Any one of Your dog needs, Weight and Your dog needs can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Weight carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Your dog needs, Your dog needs and Your dog needs are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Convert Weight to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Weight and the number you are missing is Your dog needs and Your dog needs.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/dna-molarity-calculator">DNA Molarity Calculator</a>, <a href="/biology/dna-molarity-from-mass">DNA Molarity from Mass or A260 Calculator</a> and <a href="/biology/dna-molecular-weight-calculator">DNA Molecular Weight Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dog calorie calculator work out?', 'a' => 'Your dog needs, Your dog needs, Your dog needs and Your dog needs, from Weight. The relationship is Your dog needs = 95 × (Weight)^(3 ÷ 4).'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Weight (kilograms). Enter weight; Your dog needs is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Your dog needs, Weight, Your dog needs and Your dog needs blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Your dog needs is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Weight left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Your dog needs keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/dna-molarity-calculator', 'name' => 'DNA Molarity Calculator'],
            ['path' => '/biology/dna-molarity-from-mass', 'name' => 'DNA Molarity from Mass or A260 Calculator'],
            ['path' => '/biology/dna-molecular-weight-calculator', 'name' => 'DNA Molecular Weight Calculator'],
        ],
        'authors' => [],
    ],
];
