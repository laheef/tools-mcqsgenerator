<?php

/**
 * Cost of owning a dog
 * /biology/the-cost-of-owning-a-dog
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cost of owning a dog',
    'meta' => ['title' => 'Cost of owning a dog: Formula, Steps & Results', 'description' => <<<'TXT'
    Cost of owning a dog turns your dog's size 🐕 and vaccination into total price of medical expenses. Every box can be solved for, not only the one in the title.
    TXT, 'h1' => 'Cost of owning a dog Calculator', 'updated' => '2026-05-22'],
    'raw' => [
        'vars' => [
            'bed1' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'dfl' => [
                    ['v' => '40', 'c' => 'userUsesImperialUnits()'],
                ],
                'min' => 2,
            ],
            'bed2' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'dfl' => [
                    ['v' => '70', 'c' => 'userUsesImperialUnits()'],
                ],
                'min' => 2,
            ],
            'bed3' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'dfl' => [
                    ['v' => '120', 'c' => 'userUsesImperialUnits()'],
                ],
                'min' => 2,
            ],
            'bowl' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'dfl' => [
                    ['v' => '10', 'c' => 'userUsesImperialUnits()'],
                ],
                'min' => 2,
            ],
            'crate1' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'dfl' => [
                    ['v' => '60', 'c' => 'userUsesImperialUnits()'],
                ],
                'min' => 2,
            ],
            'crate2' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'dfl' => [
                    ['v' => '100', 'c' => 'userUsesImperialUnits()'],
                ],
                'min' => 2,
            ],
            'crate3' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'dfl' => [
                    ['v' => '120', 'c' => 'userUsesImperialUnits()'],
                ],
                'min' => 2,
            ],
            'dentalcare' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'dfl' => [
                    ['v' => '500', 'c' => 'userUsesImperialUnits()'],
                ],
                'min' => 2,
            ],
            'equipment' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'dfl' => [
                    ['v' => '30', 'c' => 'userUsesImperialUnits()'],
                ],
                'min' => 2,
            ],
            'equipment_price1' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'equipment_price2' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'equipment_price3' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'fleacontrol' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'dfl' => [
                    ['v' => '60', 'c' => 'userUsesImperialUnits()'],
                ],
                'min' => 2,
            ],
            'food1' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'dfl' => [
                    ['v' => '240', 'c' => 'userUsesImperialUnits()'],
                ],
                'min' => 2,
            ],
            'food2' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'dfl' => [
                    ['v' => '480', 'c' => 'userUsesImperialUnits()'],
                ],
                'min' => 2,
            ],
            'food3' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'dfl' => [
                    ['v' => '720', 'c' => 'userUsesImperialUnits()'],
                ],
                'min' => 2,
            ],
            'food_price1' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'food_price2' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'food_price3' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'groom1' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'dfl' => [
                    ['v' => '30', 'c' => 'userUsesImperialUnits()'],
                ],
                'min' => 2,
            ],
            'groom2' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'dfl' => [
                    ['v' => '50', 'c' => 'userUsesImperialUnits()'],
                ],
                'min' => 2,
            ],
            'groom3' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'dfl' => [
                    ['v' => '70', 'c' => 'userUsesImperialUnits()'],
                ],
                'min' => 2,
            ],
            'groom_price1' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'groom_price2' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'groom_price3' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'heartworm' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'dfl' => [
                    ['v' => '144', 'c' => 'userUsesImperialUnits()'],
                ],
                'min' => 2,
            ],
            'lead' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'dfl' => [
                    ['v' => '50', 'c' => 'userUsesImperialUnits()'],
                ],
                'min' => 2,
            ],
            'medical_price' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'neutering' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'dfl' => [
                    ['v' => '300', 'c' => 'userUsesImperialUnits()'],
                ],
                'min' => 2,
            ],
            'nvisits' => [
                'type' => 'numerical',
                'rnd' => ['standard', '1'],
                'dfl' => [
                    ['v' => '4', 'c' => null],
                    ['v' => '4', 'c' => 'userUsesImperialUnits()'],
                ],
            ],
            'size' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'wsdlsD_0PyekaCh0gFN6u', 'c' => null],
                ],
                'ds' => '1EZC1w7jVJw5HD37ZhvK-',
            ],
            'total_price1' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'total_price2' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'total_price3' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'toys' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'dfl' => [
                    ['v' => '25', 'c' => 'userUsesImperialUnits()'],
                ],
                'min' => 2,
            ],
            'treats' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'dfl' => [
                    ['v' => '100', 'c' => 'userUsesImperialUnits()'],
                ],
                'min' => 2,
            ],
            'vaccination' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'dfl' => [
                    ['v' => '87.5', 'c' => 'userUsesImperialUnits()'],
                ],
                'min' => 2,
            ],
            'wellness' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'dfl' => [
                    ['v' => '50', 'c' => 'userUsesImperialUnits()'],
                ],
                'min' => 2,
            ],
        ],
        'groups' => [
            [
                'uid' => 'TBCU5nHTkbzL8JstNwitg',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'size',
                                    'vt' => 'valueSelect',
                                    'l' => 'Your dog\'s size 🐕',
                                    'ds' => '1EZC1w7jVJw5HD37ZhvK-',
                                    'opts' => [
                                        ['dy2vS2xx5JYbz6oi950Ip', 'Small', '0'],
                                        ['wsdlsD_0PyekaCh0gFN6u', 'Medium', '1'],
                                        ['SthtpiacyIpShJ5Nkztl8', 'Large', '2'],
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
                                        Enter and adjust the prices of the given dog-related items, then scroll down to see the total cost of owning a dog! If you need help estimating your dog's size, search for Onim's dog size calculator.
                                        TXT],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'SRI50Y57USmCrZt_ZapB_',
                'title' => '⚕️ Medical expenses',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'vaccination',
                                    'vt' => 'numerical',
                                    'l' => 'Vaccination',
                                    'us' => '663',
                                    'du' => 'USD',
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
                                    'n' => 'dentalcare',
                                    'vt' => 'numerical',
                                    'l' => 'Dental care',
                                    'us' => '663',
                                    'du' => 'USD',
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
                                    'n' => 'fleacontrol',
                                    'vt' => 'numerical',
                                    'l' => 'Flea and tick control',
                                    'us' => '663',
                                    'du' => 'USD',
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
                                    'n' => 'heartworm',
                                    'vt' => 'numerical',
                                    'l' => 'Heartworm prevention ',
                                    'us' => '663',
                                    'du' => 'USD',
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
                                    'n' => 'wellness',
                                    'vt' => 'numerical',
                                    'l' => 'Wellness check-ups',
                                    'us' => '663',
                                    'du' => 'USD',
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
                                    'n' => 'neutering',
                                    'vt' => 'numerical',
                                    'l' => 'Neutering/spaying',
                                    'us' => '663',
                                    'du' => 'USD',
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
                                        [null, 'Consider pet insurance to cover your veterinary costs.'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'ROjzB9yJhve9zD-umxFme',
                'title' => '🍽️ Food',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'treats',
                                    'vt' => 'numerical',
                                    'l' => 'Treats (including dental chews)',
                                    'us' => '663',
                                    'du' => 'USD',
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
                                    'n' => 'food1',
                                    'vt' => 'numerical',
                                    'l' => 'Kibble',
                                    'us' => '663',
                                    'du' => 'USD',
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
                                    'n' => 'food2',
                                    'vt' => 'numerical',
                                    'l' => 'Kibble',
                                    'us' => '663',
                                    'du' => 'USD',
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
                                    'n' => 'food3',
                                    'vt' => 'numerical',
                                    'l' => 'Kibble',
                                    'us' => '663',
                                    'du' => 'USD',
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
                                        [null, 'Keep in mind that "premium" kibble may be double in price.'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'JS80Pi05hNyHcthCOjwRL',
                'title' => '💅 Grooming',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'groom1',
                                    'vt' => 'numerical',
                                    'l' => 'Grooming service',
                                    'us' => '663',
                                    'du' => 'USD',
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
                                    'n' => 'groom2',
                                    'vt' => 'numerical',
                                    'l' => 'Grooming service',
                                    'us' => '663',
                                    'du' => 'USD',
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
                                    'n' => 'groom3',
                                    'vt' => 'numerical',
                                    'l' => 'Grooming service',
                                    'us' => '663',
                                    'du' => 'USD',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'nvisits', 'vt' => 'numerical', 'l' => 'A number of grooming appointments per year'],
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
                                        [null, 'The frequency with which you should take your pooch to a grooming saloon may depend on the type of coat and breed of your dog.'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'cR__HJlhNsfUoIf9Un7dB',
                'title' => '🧺 Equipment',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'crate1',
                                    'vt' => 'numerical',
                                    'l' => 'Crate',
                                    'us' => '663',
                                    'du' => 'USD',
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
                                    'n' => 'crate2',
                                    'vt' => 'numerical',
                                    'l' => 'Crate',
                                    'us' => '663',
                                    'du' => 'USD',
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
                                    'n' => 'crate3',
                                    'vt' => 'numerical',
                                    'l' => 'Crate',
                                    'us' => '663',
                                    'du' => 'USD',
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
                                    'n' => 'bed1',
                                    'vt' => 'numerical',
                                    'l' => 'Bedding',
                                    'us' => '663',
                                    'du' => 'USD',
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
                                    'n' => 'bed2',
                                    'vt' => 'numerical',
                                    'l' => 'Bedding',
                                    'us' => '663',
                                    'du' => 'USD',
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
                                    'n' => 'bed3',
                                    'vt' => 'numerical',
                                    'l' => 'Bedding',
                                    'us' => '663',
                                    'du' => 'USD',
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
                                    'n' => 'equipment',
                                    'vt' => 'numerical',
                                    'l' => 'Grooming equipment',
                                    'us' => '663',
                                    'du' => 'USD',
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
                                    'n' => 'lead',
                                    'vt' => 'numerical',
                                    'l' => 'Leash, collar, identity tag',
                                    'us' => '663',
                                    'du' => 'USD',
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
                                    'n' => 'bowl',
                                    'vt' => 'numerical',
                                    'l' => 'Bowls',
                                    'us' => '663',
                                    'du' => 'USD',
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
                                    'n' => 'toys',
                                    'vt' => 'numerical',
                                    'l' => 'Toys',
                                    'us' => '663',
                                    'du' => 'USD',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'g_wknaFQxzIf_HVOLPRch',
                'title' => 'Results',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'medical_price',
                                    'vt' => 'numerical',
                                    'l' => 'Total price of medical expenses',
                                    'us' => '663',
                                    'du' => 'USD',
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
                                    'n' => 'groom_price1',
                                    'vt' => 'numerical',
                                    'l' => 'Total price of grooming',
                                    'us' => '663',
                                    'du' => 'USD',
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
                                    'n' => 'groom_price2',
                                    'vt' => 'numerical',
                                    'l' => 'Total price of grooming',
                                    'us' => '663',
                                    'du' => 'USD',
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
                                    'n' => 'groom_price3',
                                    'vt' => 'numerical',
                                    'l' => 'Total price of grooming',
                                    'us' => '663',
                                    'du' => 'USD',
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
                                    'n' => 'food_price1',
                                    'vt' => 'numerical',
                                    'l' => 'Total price of food',
                                    'us' => '663',
                                    'du' => 'USD',
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
                                    'n' => 'food_price2',
                                    'vt' => 'numerical',
                                    'l' => 'Total price of food',
                                    'us' => '663',
                                    'du' => 'USD',
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
                                    'n' => 'food_price3',
                                    'vt' => 'numerical',
                                    'l' => 'Total price of food',
                                    'us' => '663',
                                    'du' => 'USD',
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
                                    'n' => 'equipment_price1',
                                    'vt' => 'numerical',
                                    'l' => 'Total price of equipment',
                                    'us' => '663',
                                    'du' => 'USD',
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
                                    'n' => 'equipment_price2',
                                    'vt' => 'numerical',
                                    'l' => 'Total price of equipment',
                                    'us' => '663',
                                    'du' => 'USD',
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
                                    'n' => 'equipment_price3',
                                    'vt' => 'numerical',
                                    'l' => 'Total price of equipment',
                                    'us' => '663',
                                    'du' => 'USD',
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
                                    'n' => 'total_price1',
                                    'vt' => 'numerical',
                                    'l' => 'Total price of owning a dog ',
                                    'us' => '663',
                                    'du' => 'USD',
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
                                    'n' => 'total_price2',
                                    'vt' => 'numerical',
                                    'l' => 'Total price of owning a dog ',
                                    'us' => '663',
                                    'du' => 'USD',
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
                                    'n' => 'total_price3',
                                    'vt' => 'numerical',
                                    'l' => 'Total price of owning a dog ',
                                    'us' => '663',
                                    'du' => 'USD',
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
                                        [null, 'Note that these are just estimates — the cost may vary depending on your location and on the brands you buy.'],
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
                'formula' => 'groom_price1 = one_way(groom1 * nvisits)',
                'var' => [
                    [
                        'l' => 'groom_price1',
                        'f' => '(groom1*nvisits)',
                        'r' => ['groom1', 'nvisits'],
                    ],
                ],
            ],
            [
                'formula' => 'groom_price2 = one_way(groom2 * nvisits)',
                'var' => [
                    [
                        'l' => 'groom_price2',
                        'f' => '(groom2*nvisits)',
                        'r' => ['groom2', 'nvisits'],
                    ],
                ],
            ],
            [
                'formula' => 'groom_price3 = one_way(groom3 * nvisits)',
                'var' => [
                    [
                        'l' => 'groom_price3',
                        'f' => '(groom3*nvisits)',
                        'r' => ['groom3', 'nvisits'],
                    ],
                ],
            ],
            [
                'formula' => 'medical_price = one_way(dentalcare + fleacontrol + heartworm + vaccination + wellness)',
                'var' => [
                    [
                        'l' => 'medical_price',
                        'f' => '(dentalcare + fleacontrol + heartworm + vaccination + wellness)',
                        'r' => [
                            'dentalcare',
                            'fleacontrol',
                            'heartworm',
                            'vaccination',
                            'wellness',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'food_price1 = one_way(food1 + treats)',
                'var' => [
                    [
                        'l' => 'food_price1',
                        'f' => '(food1 + treats)',
                        'r' => ['food1', 'treats'],
                    ],
                ],
            ],
            [
                'formula' => 'food_price2 = one_way(food2 + treats)',
                'var' => [
                    [
                        'l' => 'food_price2',
                        'f' => '(food2 + treats)',
                        'r' => ['food2', 'treats'],
                    ],
                ],
            ],
            [
                'formula' => 'food_price3 = one_way(food3 + treats)',
                'var' => [
                    [
                        'l' => 'food_price3',
                        'f' => '(food3 + treats)',
                        'r' => ['food3', 'treats'],
                    ],
                ],
            ],
            [
                'formula' => 'equipment_price1 = one_way(equipment + bed1 + bowl + crate1 + lead + toys)',
                'var' => [
                    [
                        'l' => 'equipment_price1',
                        'f' => '(bed1 + bowl + crate1 + equipment + lead + toys)',
                        'r' => [
                            'bed1',
                            'bowl',
                            'crate1',
                            'equipment',
                            'lead',
                            'toys',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'equipment_price2 = one_way(equipment + bed2 + bowl + crate2 + lead + toys)',
                'var' => [
                    [
                        'l' => 'equipment_price2',
                        'f' => '(bed2 + bowl + crate2 + equipment + lead + toys)',
                        'r' => [
                            'bed2',
                            'bowl',
                            'crate2',
                            'equipment',
                            'lead',
                            'toys',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'equipment_price3 =  one_way(equipment + bed3 + bowl + crate3 + lead + toys)',
                'var' => [
                    [
                        'l' => 'equipment_price3',
                        'f' => '(bed3 + bowl + crate3 + equipment + lead + toys)',
                        'r' => [
                            'bed3',
                            'bowl',
                            'crate3',
                            'equipment',
                            'lead',
                            'toys',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'total_price1 = one_way(medical_price + food_price1 + equipment_price1)',
                'var' => [
                    [
                        'l' => 'total_price1',
                        'f' => '((food1 + treats) + (dentalcare + fleacontrol + heartworm + vaccination + wellness) + (bed1 + bowl + crate1 + equipment + lead + toys))',
                        'r' => [
                            'bed1',
                            'bowl',
                            'crate1',
                            'dentalcare',
                            'equipment',
                            'fleacontrol',
                            'food1',
                            'heartworm',
                            'lead',
                            'toys',
                            'treats',
                            'vaccination',
                            'wellness',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'total_price2 = one_way(medical_price + food_price2 + equipment_price2)',
                'var' => [
                    [
                        'l' => 'total_price2',
                        'f' => '((food2 + treats) + (dentalcare + fleacontrol + heartworm + vaccination + wellness) + (bed2 + bowl + crate2 + equipment + lead + toys))',
                        'r' => [
                            'bed2',
                            'bowl',
                            'crate2',
                            'dentalcare',
                            'equipment',
                            'fleacontrol',
                            'food2',
                            'heartworm',
                            'lead',
                            'toys',
                            'treats',
                            'vaccination',
                            'wellness',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'total_price3 = one_way(medical_price + food_price3 + equipment_price3)',
                'var' => [
                    [
                        'l' => 'total_price3',
                        'f' => '((food3 + treats) + (dentalcare + fleacontrol + heartworm + vaccination + wellness) + (bed3 + bowl + crate3 + equipment + lead + toys))',
                        'r' => [
                            'bed3',
                            'bowl',
                            'crate3',
                            'dentalcare',
                            'equipment',
                            'fleacontrol',
                            'food3',
                            'heartworm',
                            'lead',
                            'toys',
                            'treats',
                            'vaccination',
                            'wellness',
                        ],
                    ],
                ],
            ],
        ],
        'datasets' => [
            '1EZC1w7jVJw5HD37ZhvK-' => [
                'name' => 'Size',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'dy2vS2xx5JYbz6oi950Ip', 'label' => 'Small', 'value' => '0'],
                    ['uid' => 'wsdlsD_0PyekaCh0gFN6u', 'label' => 'Medium', 'value' => '1'],
                    ['uid' => 'SthtpiacyIpShJ5Nkztl8', 'label' => 'Large', 'value' => '2'],
                ],
            ],
        ],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        Cost of owning a dog takes Grooming service and A number of grooming appointments per year and returns Total price of medical expenses and Total price of grooming. It is a single relationship that reads total price of medical expenses out of grooming service, not a table of canned results keyed by them. Units for Total price of medical expenses default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Cost of owning a dog calculator works', 'html' => <<<'TXT'
            <p>The Cost of owning a dog calculator applies one relationship to 2 numbers and reports Total price of medical expenses, Total price of grooming and Total price of grooming.</p><p>The relationship it solves reads Total price of grooming = (Grooming service × A number of grooming appointments per year).</p><p>The result panel carries Total price of medical expenses, Total price of grooming, Total price of grooming and Total price of grooming, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Grooming service</strong> — in USD</li><li><strong>A number of grooming appointments per year</strong> — a plain number, no unit</li></ul><p>The answers come back as Total price of medical expenses in USD, Total price of grooming in USD, Total price of grooming in USD, Total price of grooming in USD, Total price of food in USD, Total price of food in USD, Total price of food in USD, Total price of equipment in USD, Total price of equipment in USD, Total price of equipment in USD, Total price of owning a dog in USD, Total price of owning a dog in USD, Total price of owning a dog in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Your dog&amp;#039;s size 🐕 = 1, Vaccination = 87.5 USD, Dental care = 500 USD, Flea and tick control = 60 USD, Heartworm prevention = 144 USD, Wellness check-ups = 50 USD, Neutering/spaying = 300 USD, Treats (including dental chews) = 100 USD, Kibble = 240 USD, Kibble = 480 USD, Kibble = 720 USD, Grooming service = 30 USD, Grooming service = 50 USD, Grooming service = 70 USD, A number of grooming appointments per year = 4, Crate = 60 USD, Crate = 100 USD, Crate = 120 USD, Bedding = 40 USD, Bedding = 70 USD, Bedding = 120 USD, Grooming equipment = 30 USD, Leash, collar, identity tag = 50 USD, Bowls = 10 USD and Toys = 25 USD; the answers are <strong>Total price of grooming</strong> = 120 USD, <strong>Total price of grooming</strong> = 200 USD, <strong>Total price of grooming</strong> = 280 USD, <strong>Total price of medical expenses</strong> = 842 USD, <strong>Total price of food</strong> = 340 USD, <strong>Total price of food</strong> = 580 USD, <strong>Total price of food</strong> = 820 USD, <strong>Total price of equipment</strong> = 215 USD, <strong>Total price of equipment</strong> = 285 USD, <strong>Total price of equipment</strong> = 355 USD, <strong>Total price of owning a dog</strong> = 1397 USD, <strong>Total price of owning a dog</strong> = 1707 USD and <strong>Total price of owning a dog</strong> = 2017 USD.</p><ul><li><strong>Total price of grooming</strong> = 120 USD</li><li><strong>Total price of grooming</strong> = 200 USD</li><li><strong>Total price of grooming</strong> = 280 USD</li><li><strong>Total price of medical expenses</strong> = 842 USD</li><li><strong>Total price of food</strong> = 340 USD</li><li><strong>Total price of food</strong> = 580 USD</li><li><strong>Total price of food</strong> = 820 USD</li><li><strong>Total price of equipment</strong> = 215 USD</li><li><strong>Total price of equipment</strong> = 285 USD</li><li><strong>Total price of equipment</strong> = 355 USD</li><li><strong>Total price of owning a dog</strong> = 1397 USD</li><li><strong>Total price of owning a dog</strong> = 1707 USD</li><li><strong>Total price of owning a dog</strong> = 2017 USD</li></ul><p>The line behind those figures is <strong>Total price of grooming</strong> = <code>(Grooming service × A number of grooming appointments per year)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Total price of grooming</strong> = 120, <strong>Total price of grooming</strong> = 200, <strong>Total price of grooming</strong> = 280, <strong>Total price of medical expenses</strong> = 842, <strong>Total price of food</strong> = 340, <strong>Total price of food</strong> = 580, <strong>Total price of food</strong> = 820, <strong>Total price of equipment</strong> = 215, <strong>Total price of equipment</strong> = 285, <strong>Total price of equipment</strong> = 355, <strong>Total price of owning a dog</strong> = 1397, <strong>Total price of owning a dog</strong> = 1707 and <strong>Total price of owning a dog</strong> = 2017 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Total price of medical expenses takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Total price of grooming</strong> = <code>(Grooming service × A number of grooming appointments per year)</code></li><li><strong>Total price of medical expenses</strong> = <code>(Dental care + Flea and tick control + Heartworm prevention + Vaccination + Wellness check-ups)</code></li><li><strong>Total price of food</strong> = <code>(Kibble + Treats (including dental chews))</code></li><li><strong>Total price of equipment</strong> = <code>(Bedding + Bowls + Crate + Grooming equipment + Leash, collar, identity tag + Toys)</code></li><li><strong>Total price of owning a dog</strong> = <code>((Kibble + Treats (including dental chews)) + (Dental care + Flea and tick control + Heartworm prevention + Vaccination + Wellness check-ups) + (Bedding + Bowls + Crate + Grooming equipment + Leash, collar, identity tag + Toys))</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Total price of grooming</strong> = <code>(Grooming service × A number of grooming appointments per year)</code> — the form to use when Grooming service and A number of grooming appointments per year are the values you have.</li><li><strong>Total price of grooming</strong> = <code>(Grooming service × A number of grooming appointments per year)</code> — the form to use when Grooming service and A number of grooming appointments per year are the values you have.</li><li><strong>Total price of grooming</strong> = <code>(Grooming service × A number of grooming appointments per year)</code> — the form to use when Grooming service and A number of grooming appointments per year are the values you have.</li><li><strong>Total price of medical expenses</strong> = <code>(Dental care + Flea and tick control + Heartworm prevention + Vaccination + Wellness check-ups)</code> — the form to use when Dental care, Flea and tick control, Heartworm prevention and Vaccination are the values you have.</li><li><strong>Total price of food</strong> = <code>(Kibble + Treats (including dental chews))</code> — the form to use when Kibble and Treats (including dental chews) are the values you have.</li><li><strong>Total price of food</strong> = <code>(Kibble + Treats (including dental chews))</code> — the form to use when Kibble and Treats (including dental chews) are the values you have.</li><li><strong>Total price of food</strong> = <code>(Kibble + Treats (including dental chews))</code> — the form to use when Kibble and Treats (including dental chews) are the values you have.</li><li><strong>Total price of equipment</strong> = <code>(Bedding + Bowls + Crate + Grooming equipment + Leash, collar, identity tag + Toys)</code> — the form to use when Bedding, Bowls, Crate and Grooming equipment are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Total price of grooming, Total price of grooming and Total price of grooming can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Your dog&#039;s size 🐕 from 1 to 2, leaving every other box alone. The panel moves from <strong>Total price of grooming</strong> 120 USD, <strong>Total price of grooming</strong> 200 USD, <strong>Total price of grooming</strong> 280 USD, <strong>Total price of medical expenses</strong> 842 USD, <strong>Total price of food</strong> 340 USD, <strong>Total price of food</strong> 580 USD, <strong>Total price of food</strong> 820 USD, <strong>Total price of equipment</strong> 215 USD, <strong>Total price of equipment</strong> 285 USD, <strong>Total price of equipment</strong> 355 USD, <strong>Total price of owning a dog</strong> 1397 USD, <strong>Total price of owning a dog</strong> 1707 USD and <strong>Total price of owning a dog</strong> 2017 USD to <strong>Total price of grooming</strong> 120 USD, <strong>Total price of grooming</strong> 200 USD, <strong>Total price of grooming</strong> 280 USD, <strong>Total price of medical expenses</strong> 842 USD, <strong>Total price of food</strong> 340 USD, <strong>Total price of food</strong> 580 USD, <strong>Total price of food</strong> 820 USD, <strong>Total price of equipment</strong> 215 USD, <strong>Total price of equipment</strong> 285 USD, <strong>Total price of equipment</strong> 355 USD, <strong>Total price of owning a dog</strong> 1397 USD, <strong>Total price of owning a dog</strong> 1707 USD and <strong>Total price of owning a dog</strong> 2017 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Total price of medical expenses, Total price of grooming and Total price of grooming are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Grooming service left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Grooming service is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>A number of grooming appointments per year left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If A number of grooming appointments per year is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Grooming service and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Grooming service</strong> takes a plain number with no unit attached. The page reads it when it works out Total price of grooming. Have it to hand before you start: Grooming service is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>A number of grooming appointments per year</strong> takes a plain number with no unit attached. The page reads it when it works out Total price of grooming, Total price of grooming and Total price of grooming. Have it to hand before you start: A number of grooming appointments per year is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Total price of medical expenses follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Grooming service and A number of grooming appointments per year is what you already know and Total price of medical expenses and Total price of grooming is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/chicken-hatch-date">Chicken Hatch Date Calculator</a>, <a href="/biology/chicken-years-to-human-years">Chicken Years to Human Years Calculator</a> and <a href="/biology/coding-capacity-of-dna">Coding Capacity of DNA Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cost of owning a dog calculator work out?', 'a' => <<<'TXT'
            Total price of medical expenses, Total price of grooming, Total price of grooming and Total price of grooming, from Grooming service and A number of grooming appointments per year. The relationship is Total price of grooming = (Grooming service × A number of grooming appointments per year).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Grooming service (USD), A number of grooming appointments per year. Enter grooming service and a number of grooming appointments per year; Total price of medical expenses is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Total price of grooming, Total price of grooming, Total price of grooming and Total price of medical expenses can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Total price of grooming = 120 USD, Total price of grooming = 200 USD, Total price of grooming = 280 USD, Total price of medical expenses = 842 USD, Total price of food = 340 USD, Total price of food = 580 USD, Total price of food = 820 USD, Total price of equipment = 215 USD, Total price of equipment = 285 USD, Total price of equipment = 355 USD, Total price of owning a dog = 1397 USD, Total price of owning a dog = 1707 USD and Total price of owning a dog = 2017 USD. Those are the defaults written into the form — move Grooming service and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Total price of medical expenses is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Grooming service left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Total price of medical expenses keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/chicken-hatch-date', 'name' => 'Chicken Hatch Date Calculator'],
            ['path' => '/biology/chicken-years-to-human-years', 'name' => 'Chicken Years to Human Years Calculator'],
            ['path' => '/biology/coding-capacity-of-dna', 'name' => 'Coding Capacity of DNA Calculator'],
        ],
        'authors' => [],
    ],
];
