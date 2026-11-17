<?php

/**
 * Coffee kick
 * /food/coffee-kick
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Coffee kick',
    'meta' => ['title' => 'Coffee kick Calculator: Formula, Steps & Examples', 'description' => 'Estimate caffeine intake and how it may change over the day from drink type, servings and timing. Check serving sizes and labels before relying on the estimate.', 'h1' => 'Coffee kick Calculator', 'updated' => '2026-07-28'],
    'raw' => [
        'vars' => [
            'chart_type_VS' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'YAURi81bT7V6YCsVUphe4', 'c' => null],
                ],
                'ds' => '463',
            ],
            'dose_time1' => [
                'type' => 'time',
                'rnd' => null,
                'dfl' => [
                    ['v' => '28800000', 'c' => null],
                ],
            ],
            'dose_time2' => [
                'type' => 'time',
                'rnd' => null,
                'dfl' => [
                    ['v' => '36000000', 'c' => null],
                ],
            ],
            'dose_time3' => [
                'type' => 'time',
                'rnd' => null,
                'dfl' => [
                    ['v' => '43200000', 'c' => null],
                ],
            ],
            'dose_time4' => [
                'type' => 'time',
                'rnd' => null,
                'dfl' => [
                    ['v' => '50400000', 'c' => null],
                ],
            ],
            'dose_time5' => [
                'type' => 'time',
                'rnd' => null,
                'dfl' => [
                    ['v' => '57600000', 'c' => null],
                ],
            ],
            'drink_type1' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'asLP5bpIzKKDB4RwqVEe9', 'c' => null],
                ],
                'ds' => '462',
            ],
            'drink_type2' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'asLP5bpIzKKDB4RwqVEe9', 'c' => null],
                ],
                'ds' => '462',
            ],
            'drink_type3' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'asLP5bpIzKKDB4RwqVEe9', 'c' => null],
                ],
                'ds' => '462',
            ],
            'drink_type4' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'asLP5bpIzKKDB4RwqVEe9', 'c' => null],
                ],
                'ds' => '462',
            ],
            'drink_type5' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'asLP5bpIzKKDB4RwqVEe9', 'c' => null],
                ],
                'ds' => '462',
            ],
            'no_servings1' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '1', 'c' => null],
                ],
            ],
            'no_servings2' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '1', 'c' => null],
                ],
            ],
            'no_servings3' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '1', 'c' => null],
                ],
            ],
            'no_servings4' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '1', 'c' => null],
                ],
            ],
            'no_servings5' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '1', 'c' => null],
                ],
            ],
            'number_of_drinks' => ['type' => 'valueSelect', 'rnd' => null, 'ds' => 'g0clizz7Lynq6OncHoAFE'],
            'sleep_length' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'xFJmdTC3IzS7WWrL5TlL-', 'c' => null],
                ],
                'ds' => '464',
            ],
            'wake_up_time' => [
                'type' => 'time',
                'rnd' => null,
                'dfl' => [
                    ['v' => '21600000', 'c' => null],
                ],
            ],
            'total_mg' => [
                'type' => 'dependent',
                'rnd' => ['standard', '0'],
            ],
            'at_bedtime' => [
                'type' => 'dependent',
                'rnd' => ['standard', '0'],
            ],
            'bedtime' => [
                'type' => 'dependent',
                'rnd' => ['standard', '2'],
            ],
            'clear_time' => [
                'type' => 'dependent',
                'rnd' => ['standard', '2'],
            ],
            'drinks' => [
                'type' => 'dependent',
                'rnd' => ['standard', '0'],
            ],
            'peak_mg' => [
                'type' => 'dependent',
                'rnd' => ['standard', '0'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'CccaG5NWv14ZOVnpMtYg2',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'sleep_length',
                                    'vt' => 'valueSelect',
                                    'l' => 'How long have you slept?',
                                    'h' => 'Pick roughly or try different values and watch the graph change!',
                                    'ds' => '464',
                                    'opts' => [
                                        ['xFJmdTC3IzS7WWrL5TlL-', '8 hours or more', '0.17'],
                                        ['xKqKsfe-iYbnV_Wvd0FLH', '7 hours', '0.176'],
                                        ['eZWV3srZ07hOUtqouXuIG', '6 hours', '0.185'],
                                        ['ZZkkwsPtShShQTdfOu0E7', '5 hours', '0.2'],
                                        ['nfSIsKom522F490QP-ZyE', '4 hours', '0.21'],
                                        ['GoBzQfYox0AXk7Lx8jzQN', '3 hours', '0.23'],
                                        ['vk5mb_PziaVehCQkQ_1B-', '2 hours', '0.26'],
                                        ['mNyFKjf2vyuq4Szf0xVUo', '1 hours', '0.287'],
                                        ['_4RunbMNXNCByZSgyuN32', 'a sleepless night', '0.32'],
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
                                    'n' => 'wake_up_time',
                                    'vt' => 'time',
                                    'l' => 'Wake up time',
                                    'h' => 'At what time did you wake up?',
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
                                    'n' => 'number_of_drinks',
                                    'vt' => 'valueSelect',
                                    'l' => 'How many caffeine drinks do you plan to drink today?',
                                    'ds' => 'g0clizz7Lynq6OncHoAFE',
                                    'opts' => [
                                        ['5PwmN2SZ4qQrPuvSb2xoO', 'One', '1'],
                                        ['3AL5LhjQ7O8HuLWle_CnH', 'Two', '2'],
                                        ['2y83S6YffUGCajjCEPh45', 'Three', '3'],
                                        ['QcJjCeI0Iut6QfFf6lG3d', 'Four', '4'],
                                        ['Ot0GRIZweOL4TCoFMV0M5', 'Five', '5'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'bzTT5qbmV3uabW0G06GmA',
                'title' => 'Caffeine drink #1',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'dose_time1', 'vt' => 'time', 'l' => 'Time'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'drink_type1',
                                    'vt' => 'valueSelect',
                                    'l' => 'Drink type',
                                    'h' => 'For typical volume and caffeine content, please check the table in the article.',
                                    'ds' => '462',
                                    'opts' => [
                                        ['asLP5bpIzKKDB4RwqVEe9', 'Espresso (1 fl oz / 30 mL)', '1.5'],
                                        ['ng8j9YYbO8mZb_3zBvoe3', 'Filter coffee (1 cup / 236 mL)', '0.6'],
                                        ['uBU7X34ZIakNk0vvKpl5k', 'Instant coffee (1 cup / 236 mL)', '0.4'],
                                        ['rP9xgtUzGydj5TDTCSfB5', 'Latte (1 cup / 236 mL)', '0.19'],
                                        ['iLVqG60zjT0xbNJkHn55O', 'Mocha (7 fl oz / 210 mL)', '0.214'],
                                        ['qUB7XyDXlLz3yt4AYJrBV', 'Flat white (6.4 fl oz / 190 mL)', '0.474'],
                                        ['Qs1JVbeafItLJ42b-NEvh', 'Americano (6.3 fl oz / 180 mL)', '0.25'],
                                        ['EGULkhR7onWVoagXx32yv', 'Cappuccino (5.7 fl oz / 170 mL)', '0.265'],
                                        ['YqW918mzasiYjDY8cIZij', 'Decaf (1 cup / 236 mL)', '0.04'],
                                        ['rA614nl85PGfGLpD4qNRV', 'Covfefe  (1 Trump)', '3'],
                                        ['uGbkhHk7NfLrWkG9_Ly68', 'Black tea (1 cup / 236 mL)', '0.15'],
                                        ['rwGRTTyGFFaRv28EKWaXJ', 'Green tea (1 cup / 236 mL)', '0.09'],
                                        ['MYaedSeUTuCXSYTruGilp', 'Yerba mate (1 cup / 236 mL)', '0.3'],
                                        ['iN3hA5JJE_DtMbqctzyVJ', 'Energy drink (12 fl oz / 330 mL)', '0.33'],
                                        ['HXPdPrY4lbCRRKgdZmwYj', 'Yerba mate drink (12 fl oz / 330 mL)', '0.33'],
                                        ['y9LH260dKeZRS9dGrp5aV', 'Energy shot (2 fl oz / 60 mL)', '3.3'],
                                        ['HPMVMmyRby7xiUILD9hz7', 'Coke (12 fl oz / 330 mL)', '0.1'],
                                        ['h32L31_K7f6CVyhuhF8Zb', 'Diet Coke (12 fl oz / 330 mL)', '0.13'],
                                        ['qcvc8hD1IDJUuMMkEJxvk', 'Custom', ''],
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
                                    'n' => 'no_servings1',
                                    'vt' => 'numerical',
                                    'l' => 'How many servings?',
                                    'h' => 'How many of such caffeine drinks do you plan to drink at the same time? For example, input 2 drinks for double espresso.',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'Q9Q7UK08IYgwH8iAyQHEh',
                'title' => 'Caffeine drink #2',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'dose_time2', 'vt' => 'time', 'l' => 'Time'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'drink_type2',
                                    'vt' => 'valueSelect',
                                    'l' => 'Drink type',
                                    'h' => 'For typical volume and caffeine content, please check the table in the article.',
                                    'ds' => '462',
                                    'opts' => [
                                        ['asLP5bpIzKKDB4RwqVEe9', 'Espresso (1 fl oz / 30 mL)', '1.5'],
                                        ['ng8j9YYbO8mZb_3zBvoe3', 'Filter coffee (1 cup / 236 mL)', '0.6'],
                                        ['uBU7X34ZIakNk0vvKpl5k', 'Instant coffee (1 cup / 236 mL)', '0.4'],
                                        ['rP9xgtUzGydj5TDTCSfB5', 'Latte (1 cup / 236 mL)', '0.19'],
                                        ['iLVqG60zjT0xbNJkHn55O', 'Mocha (7 fl oz / 210 mL)', '0.214'],
                                        ['qUB7XyDXlLz3yt4AYJrBV', 'Flat white (6.4 fl oz / 190 mL)', '0.474'],
                                        ['Qs1JVbeafItLJ42b-NEvh', 'Americano (6.3 fl oz / 180 mL)', '0.25'],
                                        ['EGULkhR7onWVoagXx32yv', 'Cappuccino (5.7 fl oz / 170 mL)', '0.265'],
                                        ['YqW918mzasiYjDY8cIZij', 'Decaf (1 cup / 236 mL)', '0.04'],
                                        ['rA614nl85PGfGLpD4qNRV', 'Covfefe  (1 Trump)', '3'],
                                        ['uGbkhHk7NfLrWkG9_Ly68', 'Black tea (1 cup / 236 mL)', '0.15'],
                                        ['rwGRTTyGFFaRv28EKWaXJ', 'Green tea (1 cup / 236 mL)', '0.09'],
                                        ['MYaedSeUTuCXSYTruGilp', 'Yerba mate (1 cup / 236 mL)', '0.3'],
                                        ['iN3hA5JJE_DtMbqctzyVJ', 'Energy drink (12 fl oz / 330 mL)', '0.33'],
                                        ['HXPdPrY4lbCRRKgdZmwYj', 'Yerba mate drink (12 fl oz / 330 mL)', '0.33'],
                                        ['y9LH260dKeZRS9dGrp5aV', 'Energy shot (2 fl oz / 60 mL)', '3.3'],
                                        ['HPMVMmyRby7xiUILD9hz7', 'Coke (12 fl oz / 330 mL)', '0.1'],
                                        ['h32L31_K7f6CVyhuhF8Zb', 'Diet Coke (12 fl oz / 330 mL)', '0.13'],
                                        ['qcvc8hD1IDJUuMMkEJxvk', 'Custom', ''],
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
                                    'n' => 'no_servings2',
                                    'vt' => 'numerical',
                                    'l' => 'How many servings?',
                                    'h' => 'How many of such caffeine drinks do you plan to drink at the same time? For example, input 2 drinks for double espresso.',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'AtFxaiCOKS5SSc8TrZKOU',
                'title' => 'Caffeine drink #3',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'dose_time3', 'vt' => 'time', 'l' => 'Time'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'drink_type3',
                                    'vt' => 'valueSelect',
                                    'l' => 'Drink type',
                                    'h' => 'For typical volume and caffeine content, please check the table in the article.',
                                    'ds' => '462',
                                    'opts' => [
                                        ['asLP5bpIzKKDB4RwqVEe9', 'Espresso (1 fl oz / 30 mL)', '1.5'],
                                        ['ng8j9YYbO8mZb_3zBvoe3', 'Filter coffee (1 cup / 236 mL)', '0.6'],
                                        ['uBU7X34ZIakNk0vvKpl5k', 'Instant coffee (1 cup / 236 mL)', '0.4'],
                                        ['rP9xgtUzGydj5TDTCSfB5', 'Latte (1 cup / 236 mL)', '0.19'],
                                        ['iLVqG60zjT0xbNJkHn55O', 'Mocha (7 fl oz / 210 mL)', '0.214'],
                                        ['qUB7XyDXlLz3yt4AYJrBV', 'Flat white (6.4 fl oz / 190 mL)', '0.474'],
                                        ['Qs1JVbeafItLJ42b-NEvh', 'Americano (6.3 fl oz / 180 mL)', '0.25'],
                                        ['EGULkhR7onWVoagXx32yv', 'Cappuccino (5.7 fl oz / 170 mL)', '0.265'],
                                        ['YqW918mzasiYjDY8cIZij', 'Decaf (1 cup / 236 mL)', '0.04'],
                                        ['rA614nl85PGfGLpD4qNRV', 'Covfefe  (1 Trump)', '3'],
                                        ['uGbkhHk7NfLrWkG9_Ly68', 'Black tea (1 cup / 236 mL)', '0.15'],
                                        ['rwGRTTyGFFaRv28EKWaXJ', 'Green tea (1 cup / 236 mL)', '0.09'],
                                        ['MYaedSeUTuCXSYTruGilp', 'Yerba mate (1 cup / 236 mL)', '0.3'],
                                        ['iN3hA5JJE_DtMbqctzyVJ', 'Energy drink (12 fl oz / 330 mL)', '0.33'],
                                        ['HXPdPrY4lbCRRKgdZmwYj', 'Yerba mate drink (12 fl oz / 330 mL)', '0.33'],
                                        ['y9LH260dKeZRS9dGrp5aV', 'Energy shot (2 fl oz / 60 mL)', '3.3'],
                                        ['HPMVMmyRby7xiUILD9hz7', 'Coke (12 fl oz / 330 mL)', '0.1'],
                                        ['h32L31_K7f6CVyhuhF8Zb', 'Diet Coke (12 fl oz / 330 mL)', '0.13'],
                                        ['qcvc8hD1IDJUuMMkEJxvk', 'Custom', ''],
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
                                    'n' => 'no_servings3',
                                    'vt' => 'numerical',
                                    'l' => 'How many servings?',
                                    'h' => 'How many of such caffeine drinks do you plan to drink at the same time? For example, input 2 drinks for double espresso.',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'OVW5cRWVzAY__9Lr989XS',
                'title' => 'Caffeine drink #4',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'dose_time4', 'vt' => 'time', 'l' => 'Time'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'drink_type4',
                                    'vt' => 'valueSelect',
                                    'l' => 'Drink type',
                                    'h' => 'For typical volume and caffeine content, please check the table in the article.',
                                    'ds' => '462',
                                    'opts' => [
                                        ['asLP5bpIzKKDB4RwqVEe9', 'Espresso (1 fl oz / 30 mL)', '1.5'],
                                        ['ng8j9YYbO8mZb_3zBvoe3', 'Filter coffee (1 cup / 236 mL)', '0.6'],
                                        ['uBU7X34ZIakNk0vvKpl5k', 'Instant coffee (1 cup / 236 mL)', '0.4'],
                                        ['rP9xgtUzGydj5TDTCSfB5', 'Latte (1 cup / 236 mL)', '0.19'],
                                        ['iLVqG60zjT0xbNJkHn55O', 'Mocha (7 fl oz / 210 mL)', '0.214'],
                                        ['qUB7XyDXlLz3yt4AYJrBV', 'Flat white (6.4 fl oz / 190 mL)', '0.474'],
                                        ['Qs1JVbeafItLJ42b-NEvh', 'Americano (6.3 fl oz / 180 mL)', '0.25'],
                                        ['EGULkhR7onWVoagXx32yv', 'Cappuccino (5.7 fl oz / 170 mL)', '0.265'],
                                        ['YqW918mzasiYjDY8cIZij', 'Decaf (1 cup / 236 mL)', '0.04'],
                                        ['rA614nl85PGfGLpD4qNRV', 'Covfefe  (1 Trump)', '3'],
                                        ['uGbkhHk7NfLrWkG9_Ly68', 'Black tea (1 cup / 236 mL)', '0.15'],
                                        ['rwGRTTyGFFaRv28EKWaXJ', 'Green tea (1 cup / 236 mL)', '0.09'],
                                        ['MYaedSeUTuCXSYTruGilp', 'Yerba mate (1 cup / 236 mL)', '0.3'],
                                        ['iN3hA5JJE_DtMbqctzyVJ', 'Energy drink (12 fl oz / 330 mL)', '0.33'],
                                        ['HXPdPrY4lbCRRKgdZmwYj', 'Yerba mate drink (12 fl oz / 330 mL)', '0.33'],
                                        ['y9LH260dKeZRS9dGrp5aV', 'Energy shot (2 fl oz / 60 mL)', '3.3'],
                                        ['HPMVMmyRby7xiUILD9hz7', 'Coke (12 fl oz / 330 mL)', '0.1'],
                                        ['h32L31_K7f6CVyhuhF8Zb', 'Diet Coke (12 fl oz / 330 mL)', '0.13'],
                                        ['qcvc8hD1IDJUuMMkEJxvk', 'Custom', ''],
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
                                    'n' => 'no_servings4',
                                    'vt' => 'numerical',
                                    'l' => 'How many servings?',
                                    'h' => 'How many of such caffeine drinks do you plan to drink at the same time? For example, input 2 drinks for double espresso.',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => '9FtXX2107XLO-FGXxY-UC',
                'title' => 'Caffeine drink #5',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'dose_time5', 'vt' => 'time', 'l' => 'Time'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'drink_type5',
                                    'vt' => 'valueSelect',
                                    'l' => 'Drink type',
                                    'h' => 'For typical volume and caffeine content, please check the table in the article.',
                                    'ds' => '462',
                                    'opts' => [
                                        ['asLP5bpIzKKDB4RwqVEe9', 'Espresso (1 fl oz / 30 mL)', '1.5'],
                                        ['ng8j9YYbO8mZb_3zBvoe3', 'Filter coffee (1 cup / 236 mL)', '0.6'],
                                        ['uBU7X34ZIakNk0vvKpl5k', 'Instant coffee (1 cup / 236 mL)', '0.4'],
                                        ['rP9xgtUzGydj5TDTCSfB5', 'Latte (1 cup / 236 mL)', '0.19'],
                                        ['iLVqG60zjT0xbNJkHn55O', 'Mocha (7 fl oz / 210 mL)', '0.214'],
                                        ['qUB7XyDXlLz3yt4AYJrBV', 'Flat white (6.4 fl oz / 190 mL)', '0.474'],
                                        ['Qs1JVbeafItLJ42b-NEvh', 'Americano (6.3 fl oz / 180 mL)', '0.25'],
                                        ['EGULkhR7onWVoagXx32yv', 'Cappuccino (5.7 fl oz / 170 mL)', '0.265'],
                                        ['YqW918mzasiYjDY8cIZij', 'Decaf (1 cup / 236 mL)', '0.04'],
                                        ['rA614nl85PGfGLpD4qNRV', 'Covfefe  (1 Trump)', '3'],
                                        ['uGbkhHk7NfLrWkG9_Ly68', 'Black tea (1 cup / 236 mL)', '0.15'],
                                        ['rwGRTTyGFFaRv28EKWaXJ', 'Green tea (1 cup / 236 mL)', '0.09'],
                                        ['MYaedSeUTuCXSYTruGilp', 'Yerba mate (1 cup / 236 mL)', '0.3'],
                                        ['iN3hA5JJE_DtMbqctzyVJ', 'Energy drink (12 fl oz / 330 mL)', '0.33'],
                                        ['HXPdPrY4lbCRRKgdZmwYj', 'Yerba mate drink (12 fl oz / 330 mL)', '0.33'],
                                        ['y9LH260dKeZRS9dGrp5aV', 'Energy shot (2 fl oz / 60 mL)', '3.3'],
                                        ['HPMVMmyRby7xiUILD9hz7', 'Coke (12 fl oz / 330 mL)', '0.1'],
                                        ['h32L31_K7f6CVyhuhF8Zb', 'Diet Coke (12 fl oz / 330 mL)', '0.13'],
                                        ['qcvc8hD1IDJUuMMkEJxvk', 'Custom', ''],
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
                                    'n' => 'no_servings5',
                                    'vt' => 'numerical',
                                    'l' => 'How many servings?',
                                    'h' => 'How many of such caffeine drinks do you plan to drink at the same time? For example, input 2 drinks for double espresso.',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'e_KlWuAQVODDjtePhHYRo',
                'title' => 'Results',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'chart_type_VS',
                                    'vt' => 'valueSelect',
                                    'l' => 'Graph type',
                                    'h' => 'What do you want to see on the graph?',
                                    'ds' => '463',
                                    'opts' => [
                                        ['YAURi81bT7V6YCsVUphe4', 'Alertness (%)', '3'],
                                        ['5UwO0HvrD3Aqlknw5L_F-', 'Response time (ms)', '2'],
                                        ['yZTFBxkyIsavt0XxVxMZF', 'Reaction speed (1/s)', '1'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'XwajwrAJ-Ni6b2uBI4sSd',
                'title' => '',
                'desc' => '',
                'm' => [],
            ],
            [
                'uid' => 'supp-coffee-results',
                'title' => 'Results',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'total_mg', 'vt' => 'dependent', 'l' => 'Caffeine drunk today (mg)'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'peak_mg', 'vt' => 'dependent', 'l' => 'Highest level in your blood (mg, one drink on top of another)'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'at_bedtime', 'vt' => 'dependent', 'l' => 'Still in you at bedtime (mg)'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'clear_time', 'vt' => 'dependent', 'l' => 'Hour of the day it falls under 30 mg (24+ means after midnight)'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'bedtime', 'vt' => 'dependent', 'l' => 'Your bedtime (hour of the day, 24+ after midnight)'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'drinks', 'vt' => 'dependent', 'l' => 'Drinks counted'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [],
        'datasets' => [
            '462' => [
                'name' => 'drink_type_DS',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'asLP5bpIzKKDB4RwqVEe9', 'label' => 'Espresso (1 fl oz / 30 mL)', 'value' => '1.5'],
                    ['uid' => 'ng8j9YYbO8mZb_3zBvoe3', 'label' => 'Filter coffee (1 cup / 236 mL)', 'value' => '0.6'],
                    ['uid' => 'uBU7X34ZIakNk0vvKpl5k', 'label' => 'Instant coffee (1 cup / 236 mL)', 'value' => '0.4'],
                    ['uid' => 'rP9xgtUzGydj5TDTCSfB5', 'label' => 'Latte (1 cup / 236 mL)', 'value' => '0.19'],
                    ['uid' => 'iLVqG60zjT0xbNJkHn55O', 'label' => 'Mocha (7 fl oz / 210 mL)', 'value' => '0.214'],
                    ['uid' => 'qUB7XyDXlLz3yt4AYJrBV', 'label' => 'Flat white (6.4 fl oz / 190 mL)', 'value' => '0.474'],
                    ['uid' => 'Qs1JVbeafItLJ42b-NEvh', 'label' => 'Americano (6.3 fl oz / 180 mL)', 'value' => '0.25'],
                    ['uid' => 'EGULkhR7onWVoagXx32yv', 'label' => 'Cappuccino (5.7 fl oz / 170 mL)', 'value' => '0.265'],
                    ['uid' => 'YqW918mzasiYjDY8cIZij', 'label' => 'Decaf (1 cup / 236 mL)', 'value' => '0.04'],
                    ['uid' => 'rA614nl85PGfGLpD4qNRV', 'label' => 'Covfefe  (1 Trump)', 'value' => '3'],
                    ['uid' => 'uGbkhHk7NfLrWkG9_Ly68', 'label' => 'Black tea (1 cup / 236 mL)', 'value' => '0.15'],
                    ['uid' => 'rwGRTTyGFFaRv28EKWaXJ', 'label' => 'Green tea (1 cup / 236 mL)', 'value' => '0.09'],
                    ['uid' => 'MYaedSeUTuCXSYTruGilp', 'label' => 'Yerba mate (1 cup / 236 mL)', 'value' => '0.3'],
                    ['uid' => 'iN3hA5JJE_DtMbqctzyVJ', 'label' => 'Energy drink (12 fl oz / 330 mL)', 'value' => '0.33'],
                    ['uid' => 'HXPdPrY4lbCRRKgdZmwYj', 'label' => 'Yerba mate drink (12 fl oz / 330 mL)', 'value' => '0.33'],
                    ['uid' => 'y9LH260dKeZRS9dGrp5aV', 'label' => 'Energy shot (2 fl oz / 60 mL)', 'value' => '3.3'],
                    ['uid' => 'HPMVMmyRby7xiUILD9hz7', 'label' => 'Coke (12 fl oz / 330 mL)', 'value' => '0.1'],
                    ['uid' => 'h32L31_K7f6CVyhuhF8Zb', 'label' => 'Diet Coke (12 fl oz / 330 mL)', 'value' => '0.13'],
                    ['uid' => 'qcvc8hD1IDJUuMMkEJxvk', 'label' => 'Custom', 'value' => ''],
                ],
            ],
            '464' => [
                'name' => 'sleep_length_DS',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'xFJmdTC3IzS7WWrL5TlL-', 'label' => '8 hours or more', 'value' => '0.17'],
                    ['uid' => 'xKqKsfe-iYbnV_Wvd0FLH', 'label' => '7 hours', 'value' => '0.176'],
                    ['uid' => 'eZWV3srZ07hOUtqouXuIG', 'label' => '6 hours', 'value' => '0.185'],
                    ['uid' => 'ZZkkwsPtShShQTdfOu0E7', 'label' => '5 hours', 'value' => '0.2'],
                    ['uid' => 'nfSIsKom522F490QP-ZyE', 'label' => '4 hours', 'value' => '0.21'],
                    ['uid' => 'GoBzQfYox0AXk7Lx8jzQN', 'label' => '3 hours', 'value' => '0.23'],
                    ['uid' => 'vk5mb_PziaVehCQkQ_1B-', 'label' => '2 hours', 'value' => '0.26'],
                    ['uid' => 'mNyFKjf2vyuq4Szf0xVUo', 'label' => '1 hours', 'value' => '0.287'],
                    ['uid' => '_4RunbMNXNCByZSgyuN32', 'label' => 'a sleepless night', 'value' => '0.32'],
                ],
            ],
            '463' => [
                'name' => 'graph_type_DS',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'YAURi81bT7V6YCsVUphe4', 'label' => 'Alertness (%)', 'value' => '3'],
                    ['uid' => '5UwO0HvrD3Aqlknw5L_F-', 'label' => 'Response time (ms)', 'value' => '2'],
                    ['uid' => 'yZTFBxkyIsavt0XxVxMZF', 'label' => 'Reaction speed (1/s)', 'value' => '1'],
                ],
            ],
            'g0clizz7Lynq6OncHoAFE' => [
                'name' => 'number_of_drinks_DS',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => '5PwmN2SZ4qQrPuvSb2xoO', 'label' => 'One', 'value' => '1'],
                    ['uid' => '3AL5LhjQ7O8HuLWle_CnH', 'label' => 'Two', 'value' => '2'],
                    ['uid' => '2y83S6YffUGCajjCEPh45', 'label' => 'Three', 'value' => '3'],
                    ['uid' => 'QcJjCeI0Iut6QfFf6lG3d', 'label' => 'Four', 'value' => '4'],
                    ['uid' => 'Ot0GRIZweOL4TCoFMV0M5', 'label' => 'Five', 'value' => '5'],
                ],
            ],
        ],
        'js' => <<<'TXT'
        "use strict";omni.define("tooBigDoseCheck",function(sleep_length,wake_up_time,number_of_drinks,dose_time1,dose1,dose_time2,dose2,dose_time3,dose3,dose_time4,dose4,dose_time5,dose5){wake_up_time/=1000;dose_time1/=1000;dose_time2/=1000;dose_time3/=1000;dose_time4/=1000;dose_time5/=1000;var values={};var dose_times=[dose_time1,dose_time2,dose_time3,dose_time4,dose_time5];var doses=[dose1,dose2,dose3,dose4,dose5];var total_time=24*3600;var time_interval=60;var caffeine_absorption=0.0004;var dangerous_dose=0.0004;var min_P_c=0.117;[1,2,3,4,5].forEach(function(doseI){values[doseI]={dose_time:dose_times[doseI-1]-wake_up_time+doseI*0.0001,dose:doses[doseI-1]*1e-6}});for(var doseI=1;doseI<=number_of_drinks-1;doseI++){for(var i=doseI+1;i<=number_of_drinks;i++){if(!compare(values[doseI],values[i])){var temp=values[doseI];values[doseI]=values[i];values[i]=temp}}}var before_wake_up=false;for(var _doseI=1;_doseI<=number_of_drinks;_doseI++){if(values[_doseI].dose_time<0){if(!before_wake_up){before_wake_up=true}for(var before_i=_doseI;before_i<number_of_drinks;before_i++){values[before_i]=values[before_i+1]}number_of_drinks--}}var kappa=0.075;var P_0_start=homeostatic_process(0,0,0.17)+kappa*circadian_process(0);var g_PD,P_0,P_c=P_0_start,P_old,a,time_old=0,kc,Ej=0,current_dose=0,dose_taken=false,total_dose=0,too_big_dose=false;var k0=0.49/3600;var z=1.63*1000;for(var time=0;time<=total_time;time+=time_interval){if(time>=72*3600){break}for(var j=0;j<number_of_drinks;j++){if(current_dose===j&&current_dose<number_of_drinks&&time>=values[current_dose+1].dose_time){current_dose++;dose_taken=true;P_old=P_c;time_old=time;total_dose+=values[current_dose].dose;a=caffeine_absorption+caffeine_absorption*Math.exp(-90000*(values[current_dose].dose-0.00003));if(current_dose>1){kc=k0*Math.exp(-z*values[current_dose-1].dose);Ej=equivalent_caffeine(Ej,values[current_dose-1].dose,kc,values[current_dose].dose_time,values[current_dose-1].dose_time)}}}if(current_dose===0){g_PD=1}else{g_PD=caffeine_effect(time,values[current_dose].dose+Ej,values[current_dose].dose_time)}P_0=homeostatic_process(time,0,sleep_length)+kappa*circadian_process(time);if(!dose_taken){P_c=P_0*g_PD}else{P_c=P_0*g_PD+(-P_0*g_PD+P_old)*Math.exp(-a*(time-time_old))}if(P_c<=min_P_c){too_big_dose=true;break}}if(too_big_dose){return 2000}else if(total_dose>=dangerous_dose){return Math.round(1E6*total_dose*10)/10}else{return 0}});function homeostatic_process(time,activity,S0){var U=0.497;var L0=0.14;var tau_w=23*3600;var tau_s=4*3600;var tau_LA=7*24*3600;var result;if(activity===0){result=U-(U-S0)*Math.exp(-time/tau_w)}else{result=-2*U+(2*U+S0)*Math.exp(-time/tau_s)+(2*U+L0)*(tau_LA/(tau_LA-tau_s))*(Math.exp(-time/tau_LA)-Math.exp(-time/tau_s))}return result}function circadian_process(time){var a=[0.97,0.22,0.07,0.03,0.001];var tau=24*3600;var phase=2.5*3600;var sum=0;var phase_temp=2*3.14159265359/tau*(time+phase);for(var i=0;i<=4;i++){sum+=a[i]*Math.sin((i+1)*phase_temp)}return sum}function compare(a,b){if(b.dose_time>=a.dose_time){return true}return false}function caffeine_effect(time,dose,time0){var M0=2.69*1000;var k0=0.49/3600;var z=1.63*1000;var Mc=M0*dose;var kc=k0*Math.exp(-z*dose);return Math.pow(1+Mc*Math.exp(-kc*(time-time0)),-1)}function equivalent_caffeine(Ej_before,dose_before,kc_before,time0,time0_before){return(Ej_before+dose_before)*Math.exp(-kc_before*(time0-time0_before))}//# sourceURL=customJs.js
        /*
         * Shared helpers for the hand-written repairs in data/calc/supplement/.
         *
         * Every supplement script is evaluated in its own closed scope, so anything the
         * repairs have in common has to travel with each one. Supplement::apply()
         * prepends this file to every page script it merges.
         */
        
        /**
         * The numbers in one free-text box: "1, 2, 3", "1 2 3", "1;2;3" or one per line.
         *
         * A statistics page that asked for fifty separate boxes now asks for one, and
         * the visitor types a list the way they would in a spreadsheet cell. Anything
         * that is not a number is ignored rather than turned into NaN — a stray comma
         * or an accidental letter must not poison the whole set.
         */
        function snumlist(text) {
          if (typeof text !== 'string' || text.trim() === '') return [];
          var out = [];
          text.split(/[\s,;]+/).forEach(function (piece) {
            if (piece === '') return;
            var n = Number(piece.replace(/(\d),(?=\d{3}\b)/g, '$1'));
            if (isFinite(n)) out.push(n);
          });
          return out;
        }
        
        /** Median of an already sorted array of numbers. */
        function smedian(sorted) {
          var n = sorted.length;
          if (!n) return NaN;
          var mid = Math.floor(n / 2);
          return n % 2 ? sorted[mid] : (sorted[mid - 1] + sorted[mid]) / 2;
        }
        
        /** The numbers a visitor actually typed, in field order, skipping blanks. */
        function snumbers(values, pattern, limit) {
          var out = [];
          for (var i = 1; i <= limit; i++) {
            var key = pattern.replace('%d', i);
            var raw = values[key];
            if (raw === undefined || raw === null || raw === '') continue;
            var n = Number(raw);
            if (!isFinite(n)) continue;
            out.push({ key: key, n: n });
          }
          return out;
        }
        
        /** A plain number, no trailing zeros, at most `d` decimals. */
        function snum(n, d) {
          if (!isFinite(n)) return '—';
          var v = Number(n.toFixed(d === undefined ? 4 : d));
          return String(v);
        }
        
        /** Round to `d` decimals but keep it a number. */
        function sround(n, d) {
          var f = Math.pow(10, d === undefined ? 2 : d);
          return Math.round(n * f) / f;
        }
        
        /** Greatest common divisor of two whole numbers. */
        function sgcd(x, y) {
          x = Math.abs(Math.round(x));
          y = Math.abs(Math.round(y));
          return y === 0 ? x : sgcd(y, x % y);
        }
        
        /** "10" / "1/3" — a fraction reduced to lowest terms. */
        function sfrac(part, whole) {
          if (!whole) return '—';
          var a = Math.round(part), b = Math.round(whole);
          var g = sgcd(a, b) || 1;
          if (g > 1) { a = a / g; b = b / g; }
          return b === 1 ? String(a) : a + '/' + b;
        }
        
        /** Minimal escape for text that came out of the definition or a label. */
        function sesc(s) {
          return String(s).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
        }
        
        /**
         * A table from a header list and rows of cells. Cells are printed as they are
         * given, so a caller can pass a pre-formatted string.
         */
        function stable(head, rows, foot) {
          var html = '<table><thead><tr>';
          head.forEach(function (h) { html += '<th>' + h + '</th>'; });
          html += '</tr></thead><tbody>';
          rows.forEach(function (r) {
            html += '<tr>';
            r.forEach(function (c) { html += '<td>' + c + '</td>'; });
            html += '</tr>';
          });
          if (foot) {
            html += '<tr>';
            foot.forEach(function (c) { html += '<th>' + c + '</th>'; });
            html += '</tr>';
          }
          return html + '</tbody></table>';
        }
        
        /** Turn a list of [label, value] pairs into "A: 3, B: 4" style prose. */
        function slist(pairs) {
          return pairs.map(function (p) { return p[0] + ': ' + p[1]; }).join(', ');
        }
        
        /**
         * Tidy a value a page script published.
         *
         * The harvested scripts speak the reference site's front-end dialect: `==2==`
         * for a subscript, `**bold**`, `<br>` between lines, and often a trailing
         * comma or a dangling colon left where a second half of a sentence used to
         * follow. Our panel prints the string as plain text, so those markers would
         * land on screen as punctuation soup. This turns them into something readable
         * without changing the value itself.
         */
        function sclean(value) {
          var s = value === null || value === undefined ? '' : String(value);
          var sub = {'0': '₀', '1': '₁', '2': '₂', '3': '₃', '4': '₄',
                     '5': '₅', '6': '₆', '7': '₇', '8': '₈', '9': '₉'};
          s = s.replace(/==(\d+)==/g, function (all, d) {
            return d.split('').map(function (c) { return sub[c] || c; }).join('');
          });
          /* the same convention for superscripts: "^^+^^" is a charge, "^^2^^" an index */
          var sup = {'0': '⁰', '1': '¹', '2': '²', '3': '³', '4': '⁴',
                     '5': '⁵', '6': '⁶', '7': '⁷', '8': '⁸', '9': '⁹',
                     '+': '⁺', '-': '⁻'};
          s = s.replace(/\^\^([0-9+-]+)\^\^/g, function (all, d) {
            return d.split('').map(function (c) { return sup[c] || c; }).join('');
          });
          s = s.replace(/\*\*(.+?)\*\*/g, '$1');
          s = s.replace(/<br\s*\/?>/gi, ' ');
          s = s.replace(/<\/(p|div|li)>/gi, ' ');
          s = s.replace(/<[^>]+>/g, '');
          s = s.replace(/&nbsp;/g, ' ').replace(/&lt;/g, '<').replace(/&gt;/g, '>').replace(/&amp;/g, '&');
          /* invisible characters the reference used as "this line is blank": an Arabic
             letter mark, a zero-width space, a byte-order mark. They render as nothing
             and would otherwise keep an empty row looking filled. */
          s = s.replace(/[\u061C\u200B\u200C\u200D\uFEFF\u00AD]/g, '');
          s = s.replace(/\s+/g, ' ').trim();
          s = s.replace(/[,;:\-–—]\s*$/, '').trim();
          return s;
        }
        
        /**
         * Turn a drop-down option's id back into its label.
         *
         * Several harvested scripts publish `ctx.getRawInput("…")` of a select, which
         * is the option's uid (`z3nTqAbVhlMSz-B46c7Xk`) and not the words the visitor
         * picked. The uid is in the page markup as an option value or a radio value,
         * so the label is one lookup away.
         */
        function sdelabel(value) {
          if (typeof value !== 'string' || !/[A-Za-z0-9_-]{20,28}/.test(value)) { return value; }
          var one = function (id) {
            if (!/^[A-Za-z0-9_-]{20,28}$/.test(id)) { return id; }
            var el = document.querySelector('[value="' + id + '"]');
            if (!el) { return id; }
            if (el.tagName === 'OPTION') { return (el.textContent || '').trim() || id; }
            var lab = el.closest ? el.closest('label') : null;
            return lab ? ((lab.textContent || '').trim() || id) : id;
          };
          /* a published value can be several ids joined by commas ("Possibilities,
             MD4, NTLM"), so map each piece rather than the whole string */
          return value.split(/\s*,\s*/).map(one).join(', ');
        }
        
        var HALF_LIFE = 5;          /* hours */
        var SLEEP_LIMIT = 30;       /* mg — roughly a quarter of a cup of coffee */
        
        /* a control's raw text ("07:30"), turned into hours after midnight */
        function clockHours(name) {
          var el = document.querySelector('input[data-var="' + name + '"]');
          if (!el) { return null; }
          var raw = el.value || '';
          var m = raw.match(/^(\d{1,2}):(\d{2})/);
          if (!m) { return null; }
          return Number(m[1]) + Number(m[2]) / 60;
        }
        
        /* the text of the chosen option of a choice field, and its value */
        function choice(name) {
          var sel = document.querySelector('select[data-var="' + name + '"]');
          if (sel && sel.selectedIndex >= 0) {
            return { text: (sel.options[sel.selectedIndex].text || '').trim(), value: sel.value };
          }
          var radios = document.querySelectorAll('input[type="radio"][name="' + name + '"]');
          for (var i = 0; i < radios.length; i++) {
            if (radios[i].checked) {
              var host = radios[i].closest('label') || radios[i].parentNode;
              return { text: (host.innerText || '').trim(), value: radios[i].value };
            }
          }
          return { text: '', value: '' };
        }
        
        /* the servings in a drink row: 1 unless the visitor typed another number */
        function servings(i) {
          var el = document.querySelector('input[data-var="no_servings' + i + '"]');
          var n = el ? Number(el.value) : 1;
          return isFinite(n) && n > 0 ? n : 1;
        }
        
        /* how many drinks the form is showing — the picker says "One" ... "Five" */
        var WORDS = { one: 1, two: 2, three: 3, four: 4, five: 5 };
        
        function drinkCount() {
          var chosen = choice('number_of_drinks');
          var text = (chosen.text || '').toLowerCase();
          if (WORDS[text]) { return WORDS[text]; }
          var digits = Number((text.match(/\d+/) || [])[0]);
          return isFinite(digits) && digits >= 1 && digits <= 5 ? digits : 1;
        }
        
        /*
         * Caffeine per millilitre for each drink on the page, in the order the picker
         * lists them. The option ids in the served markup are opaque, so the numbers
         * cannot be read back from the <option> value; these are the figures the page
         * shipped with, keyed by position.
         */
        var DRINKS = [
          { name: 'Espresso',        mg: 45,  ml: 30 },
          { name: 'Filter coffee',   mg: 142, ml: 236 },
          { name: 'Instant coffee',  mg: 94,  ml: 236 },
          { name: 'Latte',           mg: 45,  ml: 236 },
          { name: 'Mocha',           mg: 45,  ml: 210 },
          { name: 'Flat white',      mg: 90,  ml: 190 },
          { name: 'Americano',       mg: 45,  ml: 180 },
          { name: 'Cappuccino',      mg: 45,  ml: 170 },
          { name: 'Decaf',           mg: 9,   ml: 236 },
          { name: 'Covfefe',         mg: 90,  ml: 30 },
          { name: 'Black tea',       mg: 35,  ml: 236 },
          { name: 'Green tea',       mg: 21,  ml: 236 },
          { name: 'Yerba mate',      mg: 71,  ml: 236 },
          { name: 'Energy drink',    mg: 109, ml: 330 },
          { name: 'Yerba mate drink', mg: 109, ml: 330 },
          { name: 'Energy shot',     mg: 198, ml: 60 },
          { name: 'Coke',            mg: 33,  ml: 330 },
          { name: 'Diet Coke',       mg: 43,  ml: 330 }
        ];
        
        /* the caffeine in one serving of the drink chosen in row i */
        function doseFor(i) {
          var sel = document.querySelector('select[data-var="drink_type' + i + '"]');
          if (!sel || sel.selectedIndex < 0) { return null; }
          var index = sel.selectedIndex;
          if (index >= DRINKS.length) {
            /* the last option is "Custom": the visitor types the milligrams themselves */
            var el = document.querySelector('input[data-var="concetration' + i + '"]')
                  || document.querySelector('input[data-var="volume' + i + '"]');
            var typed = el ? Number(el.value) : NaN;
            return isFinite(typed) && typed > 0 ? { name: 'Custom', mg: typed, ml: null } : null;
          }
          var d = DRINKS[index];
          return { name: d.name, mg: d.mg, ml: d.ml, text: (sel.options[index].text || '').trim() };
        }
        
        /* "Espresso (1 fl oz / 30 mL)" -> 30 mL */
        function volumeFrom(text) {
          var m = text.match(/([\d.]+)\s*ml/i);
          if (m) { return Number(m[1]); }
          m = text.match(/([\d.]+)\s*fl\s*oz/i);
          if (m) { return Number(m[1]) * 29.5735; }
          return null;
        }
        
        omni.onResult(['wake_up_time', 'sleep_length', 'number_of_drinks', 'drink_type1', 'dose_time1'],
          function (ctx, v) {
          var wake = clockHours('wake_up_time');
          if (wake === null) {
            ctx.addUnmetCondition('Enter the time you woke up.');
            return;
          }
        
          /* how long you slept, from the label */
          var sleepChoice = choice('sleep_length');
          var hours = /sleepless/i.test(sleepChoice.text)
            ? 0
            : Number((sleepChoice.text.match(/([\d.]+)\s*hour/) || [])[1]);
          if (!isFinite(hours)) {
            ctx.addUnmetCondition('Choose how long you slept.');
            return;
          }
        
          /* bedtime is a full day after waking, minus the hours slept */
          var bedtime = wake + (24 - hours);
        
          var count = drinkCount();
          var doses = [];
          for (var i = 1; i <= count; i++) {
            var when = clockHours('dose_time' + i);
            if (when === null) {
              ctx.addUnmetCondition('Enter the time of drink ' + i + '.');
              return;
            }
            /* a drink after midnight is entered as a small hour of the same day */
            if (when < wake - 6) { when += 24; }
            var drinkType = doseFor(i);
            if (drinkType === null) {
              ctx.addUnmetCondition('Choose what drink ' + i + ' was (or type its caffeine in the Custom boxes).');
              return;
            }
            doses.push({ at: when, mg: drinkType.mg * servings(i), name: drinkType.name });
          }
        
          var total = doses.reduce(function (sum, d) { return sum + d.mg; }, 0);
        
          /* the level at any hour, summing the decaying contribution of each drink */
          function levelAt(t) {
            var sum = 0;
            for (var k = 0; k < doses.length; k++) {
              if (t >= doses[k].at) {
                sum += doses[k].mg * Math.pow(0.5, (t - doses[k].at) / HALF_LIFE);
              }
            }
            return sum;
          }
        
          /* the peak: just after the last drink, or earlier if that drink was small */
          var peak = 0, peakAt = 0;
          for (var t = 0; t <= 48; t += 0.05) {
            var lv = levelAt(t);
            if (lv > peak) { peak = lv; peakAt = t; }
          }
        
          /* when the level first falls under the sleep threshold after the peak */
          var clear = null;
          for (var u = peakAt; u <= peakAt + 72; u += 0.05) {
            if (levelAt(u) < SLEEP_LIMIT) { clear = u; break; }
          }
          if (clear === null) { clear = peakAt + 72; }
        
          var atBed = levelAt(bedtime);
        
          ctx.exportValue('total_mg', Math.round(total));
          ctx.exportValue('peak_mg', Math.round(peak));
          ctx.exportValue('at_bedtime', Math.round(atBed));
          ctx.exportValue('clear_time', sround(clear, 2));
          ctx.exportValue('bedtime', sround(bedtime, 2));
          ctx.exportValue('drinks', doses.length);
        
          var hhmm = function (h) {
            var t = ((h % 24) + 24) % 24;
            var hh = Math.floor(t);
            var mm = Math.round((t - hh) * 60);
            if (mm === 60) { hh += 1; mm = 0; }
            return (hh < 10 ? '0' : '') + hh + ':' + (mm < 10 ? '0' : '') + mm
              + (h >= 24 ? ' the next day' : '');
          };
        
          var verdict = atBed < SLEEP_LIMIT
            ? 'By ' + hhmm(bedtime) + ' you are down to ' + snum(atBed, 0) + ' mg, under the 30 mg that'
              + ' usually leaves sleep alone.'
            : 'At ' + hhmm(bedtime) + ' you still have ' + snum(atBed, 0) + ' mg in you — about '
              + snum(atBed / 95, 1) + ' cups of coffee. That is enough to make falling asleep harder and to '
              + 'lighten the second half of the night.';
        
          ctx.addHtml('<p><strong>' + snum(total, 0) + ' mg of caffeine in ' + doses.length + ' drink'
            + (doses.length === 1 ? '' : 's') + ', peaking at ' + snum(peak, 0) + ' mg around '
            + hhmm(peakAt) + '. ' + verdict + '</strong></p>');
        
          var rows = doses.map(function (d, idx) {
            return [String(idx + 1), hhmm(d.at), d.name, snum(d.mg, 0) + ' mg',
              snum(levelAt(bedtime), 0) + ' mg at bedtime'];
          });
          ctx.addHtml(stable(['#', 'Time', 'Drink', 'Caffeine', 'Left at bedtime'], rows));
        
          var summary = [
            ['Woke up', hhmm(wake)],
            ['Slept', hours === 0 ? 'a sleepless night' : snum(hours, 0) + ' hours'],
            ['Bedtime', hhmm(bedtime)],
            ['Total caffeine', snum(total, 0) + ' mg'],
            ['Peak', snum(peak, 0) + ' mg at ' + hhmm(peakAt)],
            ['At bedtime', snum(atBed, 0) + ' mg'],
            ['Under 30 mg at', hhmm(clear)],
            ['Half-life used', HALF_LIFE + ' hours']
          ];
          ctx.addHtml(stable(['Item', 'Value'], summary));
        
          /* the decay curve, hour by hour from the first drink */
          var curve = [];
          for (var h = Math.floor(doses[0].at); h <= Math.ceil(clear) && curve.length < 26; h++) {
            curve.push([hhmm(h), snum(levelAt(h), 0) + ' mg']);
          }
          ctx.addHtml('<p>The level hour by hour:</p>');
          ctx.addHtml(stable(['Hour', 'Caffeine in you'], curve));
        
          if (total > 400) {
            ctx.addHtml('<p><strong>That is more than the 400 mg a day that most health authorities treat as '
              + 'the safe upper limit for a healthy adult.</strong></p>');
          }
          if (doses.length && peak > 200) {
            ctx.addHtml('<p>A single peak above about 200 mg is enough to make some people jittery, and it '
              + 'does nothing extra for alertness — spreading the same total over more, smaller drinks keeps '
              + 'the level flat instead.</p>');
          }
        
          ctx.addHtml('<p class="calc-unmet">Caffeine is cleared by an enzyme in the liver whose speed varies '
            + 'enormously between people: the five-hour half-life here is the average for a healthy adult, and '
            + 'it is closer to two or three hours in smokers, six or more in the last months of pregnancy, and '
            + 'longer again with some medicines and in liver disease. The model treats each drink as arriving '
            + 'instantly; in reality the level rises for about 45 minutes first, so a drink taken at bedtime '
            + 'is not at full strength when you lie down. 400 mg a day is the usual safe ceiling for a healthy '
            + 'adult, 200 mg in pregnancy, and children should have much less — the sleep figures here assume '
            + 'an adult. Caffeine also masks tiredness rather than removing it: the adenosine it blocks is '
            + 'still there when it wears off, which is why the crash arrives all at once.</p>');
        });
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        Coffee kick takes How long have you slept?, Wake up time and How many caffeine drinks do you plan to drink today? and returns Caffeine drunk today (mg) and Highest level in your blood (mg, one drink on top of another). It is a single relationship that reads caffeine drunk today (mg) out of how long have you slept?, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Coffee kick calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Coffee kick: it takes 19 numbers and reports Caffeine drunk today (mg), Highest level in your blood (mg, one drink on top of another) and Still in you at bedtime (mg).</p><p>What comes back is Caffeine drunk today (mg), Highest level in your blood (mg, one drink on top of another), Still in you at bedtime (mg) and Hour of the day it falls under 30 mg (24+ means after midnight) — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 19 boxes and the page has everything it needs.</p><ul><li><strong>How long have you slept?</strong> — a plain number, no unit. Pick roughly or try different values and watch the graph change!</li><li><strong>Wake up time</strong> — a plain number, no unit. At what time did you wake up?</li><li><strong>How many caffeine drinks do you plan to drink today?</strong> — a plain number, no unit</li><li><strong>Time</strong> — a plain number, no unit</li><li><strong>Drink type</strong> — a plain number, no unit. For typical volume and caffeine content, please check the table in the article.</li><li><strong>How many servings?</strong> — a plain number, no unit. How many of such caffeine drinks do you plan to drink at the same time? For example, input 2 drinks for double espresso.</li><li><strong>Time</strong> — a plain number, no unit</li><li><strong>Drink type</strong> — a plain number, no unit. For typical volume and caffeine content, please check the table in the article.</li><li><strong>How many servings?</strong> — a plain number, no unit. How many of such caffeine drinks do you plan to drink at the same time? For example, input 2 drinks for double espresso.</li><li><strong>Time</strong> — a plain number, no unit</li><li><strong>Drink type</strong> — a plain number, no unit. For typical volume and caffeine content, please check the table in the article.</li><li><strong>How many servings?</strong> — a plain number, no unit. How many of such caffeine drinks do you plan to drink at the same time? For example, input 2 drinks for double espresso.</li><li><strong>Time</strong> — a plain number, no unit</li><li><strong>Drink type</strong> — a plain number, no unit. For typical volume and caffeine content, please check the table in the article.</li><li><strong>How many servings?</strong> — a plain number, no unit. How many of such caffeine drinks do you plan to drink at the same time? For example, input 2 drinks for double espresso.</li><li><strong>Time</strong> — a plain number, no unit</li><li><strong>Drink type</strong> — a plain number, no unit. For typical volume and caffeine content, please check the table in the article.</li><li><strong>How many servings?</strong> — a plain number, no unit. How many of such caffeine drinks do you plan to drink at the same time? For example, input 2 drinks for double espresso.</li><li><strong>Graph type</strong> — a plain number, no unit. What do you want to see on the graph?</li></ul><p>What you get back is Caffeine drunk today (mg), Highest level in your blood (mg, one drink on top of another), Still in you at bedtime (mg), Hour of the day it falls under 30 mg (24+ means after midnight), Your bedtime (hour of the day, 24+ after midnight), Drinks counted, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: Caffeine drunk today (mg) takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Caffeine drunk today (mg), Highest level in your blood (mg, one drink on top of another) and Still in you at bedtime (mg) are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>How long have you slept? left as a guess.</strong> If How long have you slept? is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Wake up time left as a guess.</strong> If Wake up time is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>How many caffeine drinks do you plan to drink today? left as a guess.</strong> If How many caffeine drinks do you plan to drink today? is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in How long have you slept? and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>The calculation on this page is a procedure rather than one formula: it takes Coffee kick, works through it, and the panel lists How long have you slept?, Wake up time, How many caffeine drinks do you plan to drink today? and Time.</p><p>The processing runs locally: the text you enter stays in the page, the script reads it, and the results are printed beside it. Nothing about your input is stored after you leave.</p><p>Because the script works on exactly what it is given, the usual failure is not arithmetic but input: trailing spaces, a header line from a FASTA file, an ambiguous base in the middle of a sequence. Check that the box holds the characters you meant and nothing else.</p><p>What comes back is Caffeine drunk today (mg), Highest level in your blood (mg, one drink on top of another), Still in you at bedtime (mg) and Hour of the day it falls under 30 mg (24+ means after midnight) — the same input described several ways, which is why the panel lists them side by side rather than picking one.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have How long have you slept?, Wake up time, How many caffeine drinks do you plan to drink today? and Time ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with How long have you slept? — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Caffeine drunk today (mg) against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. </p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Caffeine drunk today (mg) follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It counts in whole days.</strong> The differences are counted in whole days, so an answer is a date or a number of days rather than an interval in hours. Expect a day&#039;s uncertainty if the event itself happened at an unknown time.</li><li><strong>It is a formula, not a model of your case.</strong> </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when How long have you slept?, Wake up time and How many caffeine drinks do you plan to drink today? is what you already know and Caffeine drunk today (mg) and Highest level in your blood (mg, one drink on top of another) is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related calculators: <a href="/food/coffee">Coffee</a>, <a href="/food/healthy-coffee">Healthy coffee</a> and <a href="/food/coffee-footprint">Coffee footprint</a>.</p>
            TXT],
            ['title' => 'Limits and data handling', 'html' => <<<'TXT'
            <p>This calculator applies the relationships and assumptions shown on the page to the values entered. It cannot verify ingredient labels, measurements, equipment or conditions that are not represented in the form. Check the selected units and consult recipe, product or safety instructions where they apply.</p>
            <p>The result is a calculation, not a measurement of the food or drink. Use a scale, thermometer or product label when the real-world quantity or safety status matters.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Coffee kick calculator work out?', 'a' => <<<'TXT'
            Caffeine drunk today (mg), Highest level in your blood (mg, one drink on top of another), Still in you at bedtime (mg) and Hour of the day it falls under 30 mg (24+ means after midnight).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            How long have you slept?, Wake up time, How many caffeine drinks do you plan to drink today?, Time, Drink type. Enter how long have you slept?, wake up time and how many caffeine drinks do you plan to drink today?; Caffeine drunk today (mg) is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Caffeine drunk today (mg) is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The page needs every box filled: Caffeine drunk today (mg) is fixed as the value it works out, so there is nothing to solve for when an input is missing.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Caffeine drunk today (mg) keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/food/coffee', 'name' => 'Coffee'],
            ['path' => '/food/healthy-coffee', 'name' => 'Healthy coffee'],
            ['path' => '/food/coffee-footprint', 'name' => 'Coffee footprint']
        ],
    ],
];
