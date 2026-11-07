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
    'meta' => ['title' => 'Cost of owning a dog: Formula, Steps & Results', 'description' => 'The Cost of owning a dog calculator turns the vaccination, the dental care and more into <strong>total price of grooming (Results)</strong>.', 'h1' => 'Cost of owning a dog Calculator', 'updated' => '2026-05-22'],
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
        'intro' => 'The Cost of owning a dog calculator turns the vaccination, the dental care and more into <strong>total price of grooming (Results)</strong>.',
        'sections' => [
            ['title' => 'How does the Cost of owning a dog calculator work?', 'html' => <<<'TXT'
            <p>The Cost of owning a dog calculator takes the values in the form, applies the relationship described below and reports <strong>total price of grooming (Results)</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (your dog's size); then you type in the vaccination, the dental care, the flea and tick control and the heartworm prevention.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 3 options, such as small, medium and large. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A plain number with no unit attached.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li></ul><p>The form has 25 fields in total. The ones not listed here work the same way: a label, a unit chip where the quantity has units, and a box that updates the results as soon as it holds a valid number.</p><p>One field on this form is a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Your dog's size</strong></td><td>One of 3 options, such as small, medium and large.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Vaccination</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Dental care</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Flea and tick control</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Heartworm prevention</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Wellness check-ups</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Treats (including dental chews)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Kibble (Food)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Kibble (Food)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Kibble (Food)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Grooming service (Grooming)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Grooming service (Grooming)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Grooming service (Grooming)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>A number of grooming appointments per year</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Crate (Equipment)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Crate (Equipment)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Crate (Equipment)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Bedding (Equipment)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Bedding (Equipment)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Bedding (Equipment)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Grooming equipment</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Leash, collar, identity tag</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Bowls</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Toys</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr></tbody></table><p>The table lists the first 24 of 37 fields; the rest follow the same pattern.</p>
            TXT],
            ['title' => 'The formula behind the Cost of owning a dog calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Total price of grooming</span><span class="formula-eq">=</span><span class="formula-rhs">(grooming service × a number of grooming appointments per year)</span></div><div class="formula-row"><span class="formula-lhs">Total price of medical expenses</span><span class="formula-eq">=</span><span class="formula-rhs">(dental care + flea and tick control + heartworm prevention + vaccination + wellness check-ups)</span></div><div class="formula-row"><span class="formula-lhs">Total price of food</span><span class="formula-eq">=</span><span class="formula-rhs">(kibble + treats (including dental chews))</span></div><div class="formula-row"><span class="formula-lhs">Total price of equipment</span><span class="formula-eq">=</span><span class="formula-rhs">(bedding + bowls + crate + grooming equipment + leash, collar, identity tag + toys)</span></div><div class="formula-row"><span class="formula-lhs">Total price of owning a dog</span><span class="formula-eq">=</span><span class="formula-rhs">((kibble + treats (including dental chews)) + (dental care + flea and tick control + heartworm prevention + vaccination + wellness check-ups) + (bedding + bowls + crate + grooming equipment + leash, collar, identity tag + toys))</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What is a worked example?', 'html' => <<<'TXT'
            <p>Take <strong>Your dog's size</strong> set to Medium, <strong>Vaccination</strong> = 10, <strong>Dental care</strong> = 10 and <strong>Flea and tick control</strong> = 10. The calculator returns <strong>Total price of medical expenses</strong> = 50, <strong>Total price of grooming</strong> = 100, <strong>Total price of food</strong> = 20 and <strong>Total price of equipment</strong> = 60.</p><p>The point of the example is the scale, not the particular digits: swap in your own figures and the same relationship produces your answer.</p><ol><li>Enter the values listed above, matching the units each box asks for.</li><li>Read off the result. Any field you leave empty is the one the calculator solves for.</li><li>Sanity-check the number against the relationship: <strong>Total price of medical expenses</strong> = 50, <strong>Total price of grooming</strong> = 100, <strong>Total price of food</strong> = 20 and <strong>Total price of equipment</strong> = 60 should be roughly the size you expected from <strong>Your dog's size</strong> set to Medium and <strong>Vaccination</strong> = 10.</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Currency, opening in US Dollar</li><li>Currency, opening in US Dollar</li><li>Currency, opening in US Dollar</li><li>Currency, opening in US Dollar</li><li>Currency, opening in US Dollar</li><li>Currency, opening in US Dollar</li><li>Currency, opening in US Dollar</li><li>Currency, opening in US Dollar</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Cost of owning a dog calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Comparing two organisms, populations or processes</li><li>Supporting a lesson, a lecture or a field note</li><li>Putting a biological quantity into a scale you can picture</li><li>Any time the same 4 figures keep coming back — the vaccination, the dental care and the flea and tick control — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Write the answer down with its unit. </li><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li><li>Round only at the end. </li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/tramadol-for-dogs">Tramadol for dogs</a>, <a href="/biology/tree-age">Tree age</a> and <a href="/biology/tree-diameter">Tree diameter</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cost of owning a dog calculator work out?', 'a' => <<<'TXT'
            It returns total price of grooming (Results), derived from the vaccination, the dental care and the flea and tick control. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Cost of owning a dog calculator?', 'a' => <<<'TXT'
            The form asks for the vaccination, the dental care, the flea and tick control and the heartworm prevention, which is 25 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter vaccination in a different unit?', 'a' => <<<'TXT'
            Yes. Vaccination opens in US Dollar and the chip beside it offers 113 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There is one choice to make (1 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'What is a typical result?', 'a' => <<<'TXT'
            With the values the page starts from, the calculator reports Total price of medical expenses = 50. Treat that as a reference point rather than a recommendation: it exists so you can tell at a glance whether your own inputs are on the same scale.
            TXT],
            ['q' => 'Is the Cost of owning a dog calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/tramadol-for-dogs', 'name' => 'Tramadol for dogs'],
            ['path' => '/biology/tree-age', 'name' => 'Tree age'],
            ['path' => '/biology/tree-diameter', 'name' => 'Tree diameter'],
        ],
    ],
];
