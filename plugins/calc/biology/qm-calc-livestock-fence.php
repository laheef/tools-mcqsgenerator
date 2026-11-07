<?php

/**
 * Livestock fence cost
 * /biology/livestock-fence
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Livestock fence cost',
    'meta' => ['title' => 'Livestock fence cost Calculator: Free, With Steps', 'description' => <<<'TXT'
    Enter Fence type, ✔️ Length and ✔️ Height into Livestock fence cost and the answer comes back as 8" Wood end posts needed and ✔️ 8" Wood post unit price.
    TXT, 'h1' => 'Livestock fence cost Calculator', 'updated' => '2026-08-06'],
    'raw' => [
        'vars' => [
            'addConcreteFootingOptions' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'dvPGD2qVbL78ndvPrAkty', 'c' => null],
                ],
                'ds' => 'bjpj8xMEQqu1E1Wms0-Qd',
            ],
            'additional' => [
                'type' => 'dependent',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'additionalBarbedWireRolls' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'additionalBarbedWires' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'swgIZu1aInsA-VZ3baaLh', 'c' => null],
                ],
                'ds' => 'rbAFXLuFKjCOJj0gL1OX5',
            ],
            'additionalBarbedwireTotalCost' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'averageBarbedWireSpacing' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'barbedWireSpacingOptions' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => '0JxIoe7zjJdvDUMNuCUC7', 'c' => null],
                ],
                'ds' => '1ygJCURxoLyYL5xPGUCw6',
            ],
            'barbedwireRequiredRolls' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'barbedwireRollLength' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '10', 'c' => null],
                    ['v' => '30', 'c' => 'userUsesImperialUnits()'],
                ],
            ],
            'barbedwireRuns' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'barbedwireTotalCost' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'barbedwireUnitPrice' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'clipsForFiberglassPosts' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'clipsForFiberglassPostsTotalCost' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'clipsForFiberglassPostsUnitPrice' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'clipsOrStaples' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'clipsOrStaplesSpacingOptions' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'BI28h0EPS7WQR7lSgL1BB', 'c' => null],
                ],
                'ds' => '1ygJCURxoLyYL5xPGUCw6',
            ],
            'clipsOrStaplesTotalCost' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'clipsOrStaplesUnitPrice' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'concreteRequired' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'concreteTotalCost' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'concreteUnitPrice' => [
                'type' => 'dependent',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'energizerRequired' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'energizerTotalCost' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'energizerUnitPrice' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'fenceHeight' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '1.2', 'c' => null],
                    ['v' => '4', 'c' => 'userUsesImperialUnits()'],
                ],
            ],
            'fenceLength' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '30', 'c' => null],
                    ['v' => '100', 'c' => 'userUsesImperialUnits()'],
                ],
            ],
            'fencePostsNeeded' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'fenceType' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'd5ftue5XyBV8JjK7bMeoc', 'c' => null],
                ],
                'ds' => 'aYlm5yL5Fx3SLVPnRYRGN',
            ],
            'fencepostSpacing' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '2.5', 'c' => null],
                    ['v' => '8', 'c' => 'userUsesImperialUnits()'],
                ],
            ],
            'fencepostTotalCost' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'fencepostUnitPrice' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'fiberglasspostsRequired' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
            'fiberglasspostsTotalCost' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'fiberglasspostsUnitPrice' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'hingeJointRequired' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'hingeJointRollLength' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '10', 'c' => null],
                    ['v' => '30', 'c' => 'userUsesImperialUnits()'],
                ],
            ],
            'hingeJointUnitPrice' => [
                'type' => 'dependent',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'hingejointTotalCost' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'htWireRequiredLength' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'htWireRuns' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'htWireSpacing' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'htWireSpacingOptions' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'HeIzMgGJBL8dNpAzp9vT3', 'c' => null],
                ],
                'ds' => '1ygJCURxoLyYL5xPGUCw6',
            ],
            'htWireTotalCost' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'htWireUnitPrice' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'includeLaborCostOptions' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => '1rk3pobDGczBz0EL1MJnD', 'c' => null],
                ],
                'ds' => 'xKMESqRB6l2FAoWdwyps_',
            ],
            'laborCost' => [
                'type' => 'dependent',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'laborRequired' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'laborTotalCost' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'm1' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'm2' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'm3' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'm4' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'm5' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'm6' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'material' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => '7VVQTTE9Hcga7WOy9MSpU', 'c' => null],
                ],
                'ds' => 'N0Zi4FNKS58bmhFT_KNJ1',
            ],
            'numberOfAdditionalBarbedWireRuns' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => '03Dkoz6XR6rvm4HUGRpjA', 'c' => null],
                ],
                'ds' => 'SiV40zqnVngpDxVx7qfLE',
            ],
            'numberOfElectrifiedWires' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '1', 'c' => null],
                ],
            ],
            'p1' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'p2' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'polywireRequiredLength' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'polywireRuns' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'polywireSpacing' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'polywireSpacingOptions' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => '01UScp-RUlRkKSINRhU1c', 'c' => null],
                ],
                'ds' => '1ygJCURxoLyYL5xPGUCw6',
            ],
            'polywireTotalCost' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'polywireUnitPrice' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'rodsRequired' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'rodsRequiredOptions' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'u9Et7Xre-ImFT8gwgy9zA', 'c' => null],
                ],
                'ds' => 'zHaD6vlonOl473scWmmJK',
            ],
            'rodsTotalCost' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'rodsUnitPrice' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'springsRequired' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'springsTotalCost' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'springsUnitPrice' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'stapleSpacing' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'staysRequired' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'staysSpacing' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '45', 'c' => null],
                    ['v' => '18', 'c' => 'userUsesImperialUnits()'],
                ],
            ],
            'staysTotalCost' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'staysUnitPrice' => [
                'type' => 'dependent',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'strainerUnitPrice' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'strainersRequired' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'strainersTotalCost' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'switchRequired' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '1', 'c' => null],
                ],
            ],
            'switchTotalCost' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'switchUnitPrice' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'tcplBarbedWire' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'tcplCustomFence' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'tcplElectrifiedHtWire' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'tcplElectrifiedPolywire' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'tcplHtWire' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'tcplWovenWire' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'totalCostBarbedWire' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'totalCostCustomFence' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'totalCostElectrifiedHtWire' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'totalCostElectrifiedPolywire' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'totalCostHtWire' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'totalCostWovenWire' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'useHingeJointOptions' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'DUY4GU5fMSFt1nxjoPJrE', 'c' => null],
                ],
                'ds' => 'OL_mzaqHsPoS9n7kGIq-R',
            ],
            'useStaysOptions' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'VdN74IKMDfBnp5oa2b6hW', 'c' => null],
                ],
                'ds' => 'L1tor7bPCDbeb1X83_twL',
            ],
            'woodpostRequired8in' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'woodpostTotalCost8in' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'woodpostUnitPrice8in' => [
                'type' => 'dependent',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'wovenwireRequiredRolls' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'wovenwireRollLength' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '10', 'c' => null],
                    ['v' => '30', 'c' => 'userUsesImperialUnits()'],
                ],
            ],
            'wovenwireTotalCost' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'wovenwireUnitPrice' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
        ],
        'groups' => [
            [
                'uid' => '9PqYN7cdgXHZOvzgmBCdE',
                'title' => 'Fence details',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'fenceType',
                                    'vt' => 'valueSelect',
                                    'l' => 'Fence type',
                                    'h' => 'What type of fence are you interested in constructing?',
                                    'ds' => 'aYlm5yL5Fx3SLVPnRYRGN',
                                    'opts' => [
                                        ['d5ftue5XyBV8JjK7bMeoc', 'Woven wire', '1'],
                                        ['FdF_WJVKAPnFO6uxJX66y', 'Barbed wire', '2'],
                                        ['e9drSgbgVys5uTWWGSIaj', 'High-tensile non-electric', '3'],
                                        ['gs3clkErkfXTSgbpplTih', 'High-tensile electrified', '4'],
                                        ['VEtTHPTaW6oyKNlzIwXNa', 'Electrified polywire', '5'],
                                        ['k-8dG6Xp-wdmvwi3QG35d', 'Custom', '0'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1_FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'fenceLength',
                                    'vt' => 'numerical',
                                    'l' => '✔️ Length',
                                    'h' => 'Also equivalent to the perimeter of the lot you want to fence.',
                                    'us' => '4',
                                    'du' => 'm',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'fenceHeight',
                                    'vt' => 'numerical',
                                    'l' => '✔️ Height',
                                    'us' => '4',
                                    'du' => 'm',
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
                                    'n' => 'fencepostSpacing',
                                    'vt' => 'numerical',
                                    'l' => '✔️ Desired spacing of posts',
                                    'h' => 'Distance between two adjacent posts.',
                                    'us' => '4',
                                    'du' => 'm',
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
                                    'n' => 'material',
                                    'vt' => 'valueSelect',
                                    'l' => 'Desired fence post material',
                                    'ds' => 'N0Zi4FNKS58bmhFT_KNJ1',
                                    'opts' => [
                                        ['7VVQTTE9Hcga7WOy9MSpU', 'Wood', '1'],
                                        ['TIcyjN7_j-2p6YinasV9Q', 'Steel', '2'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'I4ATbcZqCLnrYJ67f9Hz3',
                'title' => '📍 Post requirements',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'woodpostRequired8in', 'vt' => 'dependent', 'l' => '8" Wood end posts needed'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'woodpostUnitPrice8in',
                                    'vt' => 'dependent',
                                    'l' => '✔️ 8" Wood post unit price',
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
                                    'n' => 'woodpostTotalCost8in',
                                    'vt' => 'numerical',
                                    'l' => '8" Wood posts total cost',
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
                                ['t' => 'v', 'n' => 'fencePostsNeeded', 'vt' => 'numerical', 'l' => 'Fence posts needed'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'fencepostUnitPrice',
                                    'vt' => 'numerical',
                                    'l' => '✔️ Fence post unit price',
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
                                    'n' => 'fencepostTotalCost',
                                    'vt' => 'numerical',
                                    'l' => 'Fence posts total cost',
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
                                    'n' => 'fiberglasspostsRequired',
                                    'vt' => 'numerical',
                                    'l' => 'Fiberglass posts needed',
                                    'h' => 'Number of fiberglass posts needed.',
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
                                    'n' => 'fiberglasspostsUnitPrice',
                                    'vt' => 'numerical',
                                    'l' => '✔️ Fiberglass post unit price',
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
                                    'n' => 'fiberglasspostsTotalCost',
                                    'vt' => 'numerical',
                                    'l' => 'Fiberglass posts total cost',
                                    'us' => '663',
                                    'du' => 'USD',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'IROGRHJTLXUBBy4K82UhX',
                'title' => '⛓ Wire requirements',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'wovenwireRollLength',
                                    'vt' => 'numerical',
                                    'l' => '✔️ Woven wire length per roll',
                                    'us' => '4',
                                    'du' => 'm',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'wovenwireRequiredRolls', 'vt' => 'numerical', 'l' => 'Woven wire rolls needed'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'wovenwireUnitPrice',
                                    'vt' => 'numerical',
                                    'l' => '✔️ Woven wire price per roll',
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
                                    'n' => 'wovenwireTotalCost',
                                    'vt' => 'numerical',
                                    'l' => 'Woven wires total cost',
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
                                    'n' => 'additionalBarbedWires',
                                    'vt' => 'valueSelect',
                                    'l' => '',
                                    'ds' => 'rbAFXLuFKjCOJj0gL1OX5',
                                    'opts' => [
                                        ['nlL6Z7fPEoXPvPfyncNgT', 'Install additional barbed wires', '1'],
                                        ['swgIZu1aInsA-VZ3baaLh', '', '0'],
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
                                    'n' => 'barbedWireSpacingOptions',
                                    'vt' => 'valueSelect',
                                    'l' => 'Average barbed wire vertical spacing',
                                    'ds' => '1ygJCURxoLyYL5xPGUCw6',
                                    'opts' => [
                                        ['BI28h0EPS7WQR7lSgL1BB', '4" (≈ 10 cm)', '1'],
                                        ['HeIzMgGJBL8dNpAzp9vT3', '6" (≈ 15 cm)', '2'],
                                        ['0JxIoe7zjJdvDUMNuCUC7', '8" (≈ 20 cm)', '3'],
                                        ['B801wcE5vOStENFM0Z0b8', '10" (≈ 25 cm)', '4'],
                                        ['01UScp-RUlRkKSINRhU1c', '12" (≈ 30 cm)', '5'],
                                        ['g-6cs1733Efp7PTdH7wnK', '14" (≈ 35 cm)', '6'],
                                        ['7foqcrwSxZrwWSHG5LsQV', '16" (≈ 40 cm)', '7'],
                                        ['fIZmYW0H6Dsj3sCZiPZMB', 'Enter a custom average wire spacing', '0'],
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
                                    'n' => 'averageBarbedWireSpacing',
                                    'vt' => 'dependent',
                                    'l' => '✔️ Average barbed wire spacing',
                                    'us' => '4',
                                    'du' => 'cm',
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
                                    'n' => 'barbedwireRuns',
                                    'vt' => 'numerical',
                                    'l' => 'Barbed wire horizontal runs',
                                    'h' => 'Number of barbed wires to run through the fence length.',
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
                                    'n' => 'numberOfAdditionalBarbedWireRuns',
                                    'vt' => 'valueSelect',
                                    'l' => 'Number of additional barbed wire runs',
                                    'ds' => 'SiV40zqnVngpDxVx7qfLE',
                                    'opts' => [
                                        ['03Dkoz6XR6rvm4HUGRpjA', '1', '1'],
                                        ['UVkF4ypGwPnPRSUCKp1L5', '2', '2'],
                                        ['SlVrLfgexQIKffEQk9kgu', '3', '3'],
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
                                    'n' => 'barbedwireRollLength',
                                    'vt' => 'numerical',
                                    'l' => '✔️ Barbed wire length per roll',
                                    'us' => '4',
                                    'du' => 'm',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'barbedwireRequiredRolls', 'vt' => 'numerical', 'l' => 'Barbed wire rolls needed'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'additionalBarbedWireRolls', 'vt' => 'numerical', 'l' => 'Barbed wire rolls needed'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'barbedwireUnitPrice',
                                    'vt' => 'numerical',
                                    'l' => '✔️ Barbed wire price per roll',
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
                                    'n' => 'barbedwireTotalCost',
                                    'vt' => 'numerical',
                                    'l' => 'Barbed wires total cost',
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
                                    'n' => 'additional',
                                    'vt' => 'dependent',
                                    'l' => '✔️ Barbed wire price per roll',
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
                                    'n' => 'additionalBarbedwireTotalCost',
                                    'vt' => 'numerical',
                                    'l' => 'Additional barbed wire total cost',
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
                                    'n' => 'htWireSpacingOptions',
                                    'vt' => 'valueSelect',
                                    'l' => 'High-tensile wire spacing options',
                                    'ds' => '1ygJCURxoLyYL5xPGUCw6',
                                    'opts' => [
                                        ['BI28h0EPS7WQR7lSgL1BB', '4" (≈ 10 cm)', '1'],
                                        ['HeIzMgGJBL8dNpAzp9vT3', '6" (≈ 15 cm)', '2'],
                                        ['0JxIoe7zjJdvDUMNuCUC7', '8" (≈ 20 cm)', '3'],
                                        ['B801wcE5vOStENFM0Z0b8', '10" (≈ 25 cm)', '4'],
                                        ['01UScp-RUlRkKSINRhU1c', '12" (≈ 30 cm)', '5'],
                                        ['g-6cs1733Efp7PTdH7wnK', '14" (≈ 35 cm)', '6'],
                                        ['7foqcrwSxZrwWSHG5LsQV', '16" (≈ 40 cm)', '7'],
                                        ['fIZmYW0H6Dsj3sCZiPZMB', 'Enter a custom average wire spacing', '0'],
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
                                    'n' => 'htWireSpacing',
                                    'vt' => 'dependent',
                                    'l' => '✔️ Average high-tensile wire spacing',
                                    'us' => '4',
                                    'du' => 'cm',
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
                                    'n' => 'htWireRuns',
                                    'vt' => 'numerical',
                                    'l' => 'High-tensile wire runs needed',
                                    'h' => 'Number of high-tensile wire runs needed.',
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
                                    'n' => 'htWireRequiredLength',
                                    'vt' => 'numerical',
                                    'l' => 'High-tensile wire total length needed',
                                    'us' => '4',
                                    'du' => 'm',
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
                                    'n' => 'htWireUnitPrice',
                                    'vt' => 'numerical',
                                    'l' => 'High-tensile wire unit price',
                                    'h' => 'Cost of high-tensile wires.',
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
                                    'n' => 'htWireTotalCost',
                                    'vt' => 'numerical',
                                    'l' => 'Hight-tensile wire total cost',
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
                                    'n' => 'polywireSpacingOptions',
                                    'vt' => 'valueSelect',
                                    'l' => 'Polywire spacing options',
                                    'ds' => '1ygJCURxoLyYL5xPGUCw6',
                                    'opts' => [
                                        ['BI28h0EPS7WQR7lSgL1BB', '4" (≈ 10 cm)', '1'],
                                        ['HeIzMgGJBL8dNpAzp9vT3', '6" (≈ 15 cm)', '2'],
                                        ['0JxIoe7zjJdvDUMNuCUC7', '8" (≈ 20 cm)', '3'],
                                        ['B801wcE5vOStENFM0Z0b8', '10" (≈ 25 cm)', '4'],
                                        ['01UScp-RUlRkKSINRhU1c', '12" (≈ 30 cm)', '5'],
                                        ['g-6cs1733Efp7PTdH7wnK', '14" (≈ 35 cm)', '6'],
                                        ['7foqcrwSxZrwWSHG5LsQV', '16" (≈ 40 cm)', '7'],
                                        ['fIZmYW0H6Dsj3sCZiPZMB', 'Enter a custom average wire spacing', '0'],
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
                                    'n' => 'polywireSpacing',
                                    'vt' => 'dependent',
                                    'l' => '✔️ Average polywire spacing',
                                    'us' => '4',
                                    'du' => 'cm',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'polywireRuns', 'vt' => 'numerical', 'l' => 'Polywire runs needed'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'polywireRequiredLength',
                                    'vt' => 'numerical',
                                    'l' => 'Polywire length needed',
                                    'h' => 'Length of Polywire needed.',
                                    'us' => '4',
                                    'du' => 'm',
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
                                    'n' => 'polywireUnitPrice',
                                    'vt' => 'numerical',
                                    'l' => '✔️ Polywire unit price',
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
                                    'n' => 'polywireTotalCost',
                                    'vt' => 'numerical',
                                    'l' => 'Polywire total cost',
                                    'us' => '663',
                                    'du' => 'USD',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'wlLWAdV8Oo89slxAGeoiT',
                'title' => '🔗 Mounting hardware requirements',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'clipsOrStaplesSpacingOptions',
                                    'vt' => 'valueSelect',
                                    'l' => 'Clips or staples spacing options',
                                    'ds' => '1ygJCURxoLyYL5xPGUCw6',
                                    'opts' => [
                                        ['BI28h0EPS7WQR7lSgL1BB', '4" (≈ 10 cm)', '1'],
                                        ['HeIzMgGJBL8dNpAzp9vT3', '6" (≈ 15 cm)', '2'],
                                        ['0JxIoe7zjJdvDUMNuCUC7', '8" (≈ 20 cm)', '3'],
                                        ['B801wcE5vOStENFM0Z0b8', '10" (≈ 25 cm)', '4'],
                                        ['01UScp-RUlRkKSINRhU1c', '12" (≈ 30 cm)', '5'],
                                        ['g-6cs1733Efp7PTdH7wnK', '14" (≈ 35 cm)', '6'],
                                        ['7foqcrwSxZrwWSHG5LsQV', '16" (≈ 40 cm)', '7'],
                                        ['fIZmYW0H6Dsj3sCZiPZMB', 'Enter a custom average wire spacing', '0'],
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
                                    'n' => 'stapleSpacing',
                                    'vt' => 'dependent',
                                    'l' => 'Clips or staples vertical spacing',
                                    'us' => '4',
                                    'du' => 'cm',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'clipsOrStaples', 'vt' => 'numerical', 'l' => 'Clips or staples needed'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'clipsOrStaplesUnitPrice',
                                    'vt' => 'numerical',
                                    'l' => 'Clips or staples unit price',
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
                                    'n' => 'clipsOrStaplesTotalCost',
                                    'vt' => 'numerical',
                                    'l' => 'Clips or staples total cost',
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
                                    'n' => 'springsRequired',
                                    'vt' => 'numerical',
                                    'l' => 'Springs needed',
                                    'h' => 'Number of springs needed.',
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
                                    'n' => 'springsUnitPrice',
                                    'vt' => 'numerical',
                                    'l' => '✔️ Spring unit price',
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
                                    'n' => 'springsTotalCost',
                                    'vt' => 'numerical',
                                    'l' => 'Springs total cost',
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
                                    'n' => 'strainersRequired',
                                    'vt' => 'numerical',
                                    'l' => 'Strainers needed',
                                    'h' => 'Number of wire strainers needed.',
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
                                    'n' => 'strainerUnitPrice',
                                    'vt' => 'numerical',
                                    'l' => '✔️ Strainer unit price',
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
                                    'n' => 'strainersTotalCost',
                                    'vt' => 'numerical',
                                    'l' => 'Strainers total cost',
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
                                ['t' => 'v', 'n' => 'clipsForFiberglassPosts', 'vt' => 'numerical', 'l' => 'Clips for fiberglass posts'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'clipsForFiberglassPostsUnitPrice',
                                    'vt' => 'numerical',
                                    'l' => '✔️ Clips for fiberglass posts unit price',
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
                                    'n' => 'clipsForFiberglassPostsTotalCost',
                                    'vt' => 'numerical',
                                    'l' => 'Clips for fiberglass posts total cost',
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
                                    'n' => 'useStaysOptions',
                                    'vt' => 'valueSelect',
                                    'l' => '',
                                    'ds' => 'L1tor7bPCDbeb1X83_twL',
                                    'opts' => [
                                        ['pIaplX4wYVwL8pMK9yvOq', 'Use fence stays', '1'],
                                        ['VdN74IKMDfBnp5oa2b6hW', '', '0'],
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
                                    'n' => 'staysSpacing',
                                    'vt' => 'numerical',
                                    'l' => 'Horizontal stays spacing',
                                    'us' => '4',
                                    'du' => 'cm',
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
                                    'n' => 'staysRequired',
                                    'vt' => 'numerical',
                                    'l' => '✔️ Fence stays needed',
                                    'h' => 'Number of fence stays needed.',
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
                                    'n' => 'staysUnitPrice',
                                    'vt' => 'dependent',
                                    'l' => '✔️ Fence stay unit price',
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
                                    'n' => 'staysTotalCost',
                                    'vt' => 'numerical',
                                    'l' => 'Stays total cost',
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
                                    'n' => 'useHingeJointOptions',
                                    'vt' => 'valueSelect',
                                    'l' => '',
                                    'h' => 'Are you using hinge joint wires?',
                                    'ds' => 'OL_mzaqHsPoS9n7kGIq-R',
                                    'opts' => [
                                        ['Jf5Bz7Oow0h9v6ZzdW9_C', 'Use hinge joint wires', '1'],
                                        ['DUY4GU5fMSFt1nxjoPJrE', '', '0'],
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
                                    'n' => 'hingeJointRollLength',
                                    'vt' => 'numerical',
                                    'l' => '✔️ Hinge joint wire length per roll',
                                    'us' => '4',
                                    'du' => 'm',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'hingeJointRequired', 'vt' => 'numerical', 'l' => 'Hinge joint needed'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'hingeJointUnitPrice',
                                    'vt' => 'dependent',
                                    'l' => '✔️ Hinge joint wire price per roll',
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
                                    'n' => 'hingejointTotalCost',
                                    'vt' => 'numerical',
                                    'l' => 'Hinge joint total cost',
                                    'us' => '663',
                                    'du' => 'USD',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'OdDlTjw1K7oU5c36HyKPG',
                'title' => '⚡ Electrical requirements',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'numberOfElectrifiedWires', 'vt' => 'numerical', 'l' => '✔️ Number of electrified wires needed'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'energizerRequired',
                                    'vt' => 'numerical',
                                    'l' => 'Energizer capacity needed',
                                    'h' => 'Recommended capacity of energizer needed for the fence length.',
                                    'us' => '4',
                                    'du' => 'm',
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
                                    'n' => 'energizerUnitPrice',
                                    'vt' => 'numerical',
                                    'l' => '✔️ Energizer unit price',
                                    'h' => 'Total cost of Energizer required',
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
                                    'n' => 'energizerTotalCost',
                                    'vt' => 'numerical',
                                    'l' => 'Energizer total cost',
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
                                    'n' => 'rodsRequiredOptions',
                                    'vt' => 'valueSelect',
                                    'l' => 'Grounding or lightning rods needed',
                                    'ds' => 'zHaD6vlonOl473scWmmJK',
                                    'opts' => [
                                        ['ZOplcg-IVnRB-qWjXvp-Q', '1', '1'],
                                        ['fQR01e6aO_sb9bPLQGUuz', '2', '2'],
                                        ['u9Et7Xre-ImFT8gwgy9zA', '3', '3'],
                                        ['gY3axLcrd5DpeORn9cSJs', 'Enter a custom number of grounding rods', '0'],
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
                                    'n' => 'rodsRequired',
                                    'vt' => 'dependent',
                                    'l' => '✔️ Your desired number of grounding or lightning rods',
                                    'h' => 'Number of grounding or lightning rods needed.',
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
                                    'n' => 'rodsUnitPrice',
                                    'vt' => 'numerical',
                                    'l' => '✔️ Grounding or lightning rod unit price',
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
                                    'n' => 'rodsTotalCost',
                                    'vt' => 'numerical',
                                    'l' => 'Grounding or lightning rods total cost',
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
                                ['t' => 'v', 'n' => 'switchRequired', 'vt' => 'numerical', 'l' => '✔️ Cut-out switch needed'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'switchUnitPrice',
                                    'vt' => 'numerical',
                                    'l' => '✔️ Cut-out switch unit price',
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
                                    'n' => 'switchTotalCost',
                                    'vt' => 'numerical',
                                    'l' => 'Cut-out switch total cost',
                                    'us' => '663',
                                    'du' => 'USD',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'NMOrDF0OxeyjuOHAc0ckN',
                'title' => '🧱 More materials needed',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'addConcreteFootingOptions',
                                    'vt' => 'valueSelect',
                                    'l' => '',
                                    'ds' => 'bjpj8xMEQqu1E1Wms0-Qd',
                                    'opts' => [
                                        ['NXHZor67O4WrehXX8PH3i', 'Add concrete footing for the posts', '1'],
                                        ['dvPGD2qVbL78ndvPrAkty', '', '0'],
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
                                    'n' => 'concreteRequired',
                                    'vt' => 'dependent',
                                    'l' => '✔️ Concrete volume needed',
                                    'h' => 'Volume of concrete for fence posts fabrication or for fence posts foundation.',
                                    'us' => '20',
                                    'du' => 'm3',
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
                                    'n' => 'concreteUnitPrice',
                                    'vt' => 'dependent',
                                    'l' => '✔️ Concrete price per unit volume',
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
                                    'n' => 'concreteTotalCost',
                                    'vt' => 'numerical',
                                    'l' => 'Concrete total cost',
                                    'us' => '663',
                                    'du' => 'USD',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'lLNjiEKb3h_88yM5WogQi',
                'title' => '👷‍♂️ Labor cost',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'includeLaborCostOptions',
                                    'vt' => 'valueSelect',
                                    'l' => '',
                                    'ds' => 'xKMESqRB6l2FAoWdwyps_',
                                    'opts' => [
                                        ['50yzPbigHtyYKTWG6IlFm', 'Include labor cost', '1'],
                                        ['1rk3pobDGczBz0EL1MJnD', '', '0'],
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
                                    'n' => 'laborRequired',
                                    'vt' => 'dependent',
                                    'l' => '✔️ Estimated labor hours',
                                    'h' => 'Estimated number of hours needed for the fence construction.',
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
                                    'n' => 'laborCost',
                                    'vt' => 'dependent',
                                    'l' => '✔️ Labor cost per unit time',
                                    'h' => 'Labor cost per time (hour, day, week, month, etc.).',
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
                                    'n' => 'laborTotalCost',
                                    'vt' => 'numerical',
                                    'l' => 'Labor total cost',
                                    'us' => '663',
                                    'du' => 'USD',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'TL66wWU7i8Yl_nIVodLW1',
                'title' => 'Hidden variables',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'm1', 'vt' => 'dependent', 'l' => 'M1'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'm2', 'vt' => 'dependent', 'l' => 'M2'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'm3', 'vt' => 'dependent', 'l' => 'M3'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'm4', 'vt' => 'dependent', 'l' => 'M4'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'm5', 'vt' => 'dependent', 'l' => 'M5'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'm6', 'vt' => 'dependent', 'l' => 'M6'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'p1', 'vt' => 'dependent', 'l' => 'P1'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'p2', 'vt' => 'dependent', 'l' => 'P2'],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'NwnzqgLFK0w7h8cDroShz',
                'title' => '💰 Construction cost',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'totalCostWovenWire',
                                    'vt' => 'numerical',
                                    'l' => '💲 Total cost',
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
                                    'n' => 'totalCostBarbedWire',
                                    'vt' => 'numerical',
                                    'l' => '💲 Total cost',
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
                                    'n' => 'totalCostHtWire',
                                    'vt' => 'numerical',
                                    'l' => '💲 Total cost',
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
                                    'n' => 'totalCostElectrifiedHtWire',
                                    'vt' => 'numerical',
                                    'l' => '💲 Total cost',
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
                                    'n' => 'totalCostElectrifiedPolywire',
                                    'vt' => 'numerical',
                                    'l' => '💲 Total cost',
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
                                    'n' => 'totalCostCustomFence',
                                    'vt' => 'numerical',
                                    'l' => '💲 Total cost',
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
                                    'n' => 'tcplWovenWire',
                                    'vt' => 'numerical',
                                    'l' => '📏 Total cost per unit length',
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
                                    'n' => 'tcplBarbedWire',
                                    'vt' => 'numerical',
                                    'l' => '📏 Total cost per unit length',
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
                                    'n' => 'tcplHtWire',
                                    'vt' => 'numerical',
                                    'l' => '📏 Total cost per unit length',
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
                                    'n' => 'tcplElectrifiedHtWire',
                                    'vt' => 'numerical',
                                    'l' => '📏 Total cost per unit length',
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
                                    'n' => 'tcplElectrifiedPolywire',
                                    'vt' => 'numerical',
                                    'l' => '📏 Total cost per unit length',
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
                                    'n' => 'tcplCustomFence',
                                    'vt' => 'numerical',
                                    'l' => '📏 Total cost per unit length',
                                    'us' => '663',
                                    'du' => 'USD',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'woodpostTotalCost8in = one_way(woodpostUnitPrice8in * woodpostRequired8in)',
                'var' => [
                    [
                        'l' => 'woodpostTotalCost8in',
                        'f' => '(woodpostRequired8in*woodpostUnitPrice8in)',
                        'r' => ['woodpostRequired8in', 'woodpostUnitPrice8in'],
                    ],
                ],
            ],
            [
                'formula' => <<<'TXT'
                fencePostsNeeded = one_way((1 - m6) * (p1 * ((floor(fenceLength / fencepostSpacing) + 1 - woodpostRequired8in) * (1- m5) + m5 * 2) + p2 * ((floor(fenceLength / fencepostSpacing) + 1) * (1- m5) + m5 * 2)) + m6 * (floor(fenceLength / fencepostSpacing) + 1))
                TXT,
                'var' => [
                    [
                        'l' => 'fencePostsNeeded',
                        'f' => <<<'TXT'
                        (-m5*m6*p1*woodpostRequired8in + m5*m6*p1*floor(fenceLength/fencepostSpacing) - m5*m6*p1 + m5*m6*p2*floor(fenceLength/fencepostSpacing) - m5*m6*p2 + m5*p1*woodpostRequired8in - m5*p1*floor(fenceLength/fencepostSpacing) + m5*p1 - m5*p2*floor(fenceLength/fencepostSpacing) + m5*p2 + m6*p1*woodpostRequired8in - m6*p1*floor(fenceLength/fencepostSpacing) - m6*p1 - m6*p2*floor(fenceLength/fencepostSpacing) - m6*p2 + m6*floor(fenceLength/fencepostSpacing) + m6 - p1*woodpostRequired8in + p1*floor(fenceLength/fencepostSpacing) + p1 + p2*floor(fenceLength/fencepostSpacing) + p2)
                        TXT,
                        'r' => [
                            'fenceLength',
                            'fencepostSpacing',
                            'm5',
                            'm6',
                            'p1',
                            'p2',
                            'woodpostRequired8in',
                        ],
                    ],
                ],
            ],
            [
                'formula' => <<<'TXT'
                fencepostTotalCost = one_way(fencepostUnitPrice * (1 - m6) * (p1 * ((floor(fenceLength / fencepostSpacing) + 1 - woodpostRequired8in) * (1- m5) + m5 * 2) + p2 * ((floor(fenceLength / fencepostSpacing) + 1) * (1- m5) + m5 * 2)) + m6 * (floor(fenceLength / fencepostSpacing) + 1))
                TXT,
                'var' => [
                    [
                        'l' => 'fencepostTotalCost',
                        'f' => <<<'TXT'
                        (-fencepostUnitPrice*m5*m6*p1*woodpostRequired8in + fencepostUnitPrice*m5*m6*p1*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m5*m6*p1 + fencepostUnitPrice*m5*m6*p2*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m5*m6*p2 + fencepostUnitPrice*m5*p1*woodpostRequired8in - fencepostUnitPrice*m5*p1*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*m5*p1 - fencepostUnitPrice*m5*p2*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*m5*p2 + fencepostUnitPrice*m6*p1*woodpostRequired8in - fencepostUnitPrice*m6*p1*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m6*p1 - fencepostUnitPrice*m6*p2*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m6*p2 - fencepostUnitPrice*p1*woodpostRequired8in + fencepostUnitPrice*p1*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*p1 + fencepostUnitPrice*p2*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*p2 + m6*floor(fenceLength/fencepostSpacing) + m6)
                        TXT,
                        'r' => [
                            'fenceLength',
                            'fencepostSpacing',
                            'fencepostUnitPrice',
                            'm5',
                            'm6',
                            'p1',
                            'p2',
                            'woodpostRequired8in',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'fiberglasspostsRequired = floor(fenceLength / fencepostSpacing) - 1',
                'var' => [
                    [
                        'l' => 'fiberglasspostsRequired',
                        'f' => 'floor(fenceLength/fencepostSpacing) - 1',
                        'r' => ['fenceLength', 'fencepostSpacing'],
                    ],
                ],
            ],
            [
                'formula' => 'fiberglasspostsTotalCost = one_way(fiberglasspostsUnitPrice * (floor(fenceLength / fencepostSpacing) - 1))',
                'var' => [
                    [
                        'l' => 'fiberglasspostsTotalCost',
                        'f' => '(fiberglasspostsUnitPrice*(floor(fenceLength/fencepostSpacing) - 1))',
                        'r' => ['fenceLength', 'fencepostSpacing', 'fiberglasspostsUnitPrice'],
                    ],
                ],
            ],
            [
                'formula' => 'wovenwireRequiredRolls = ceil(fenceLength / wovenwireRollLength)',
                'var' => [
                    [
                        'l' => 'wovenwireRequiredRolls',
                        'f' => 'ceil(fenceLength/wovenwireRollLength)',
                        'r' => ['fenceLength', 'wovenwireRollLength'],
                    ],
                ],
            ],
            [
                'formula' => 'wovenwireTotalCost = one_way(wovenwireUnitPrice * ceil(fenceLength / wovenwireRollLength))',
                'var' => [
                    [
                        'l' => 'wovenwireTotalCost',
                        'f' => '(wovenwireUnitPrice*ceil(fenceLength/wovenwireRollLength))',
                        'r' => ['fenceLength', 'wovenwireRollLength', 'wovenwireUnitPrice'],
                    ],
                ],
            ],
            [
                'formula' => 'barbedwireRuns = floor(fenceHeight * 12 / averageBarbedWireSpacing)',
                'var' => [
                    [
                        'l' => 'barbedwireRuns',
                        'f' => 'floor(12*fenceHeight/averageBarbedWireSpacing)',
                        'r' => ['averageBarbedWireSpacing', 'fenceHeight'],
                    ],
                ],
            ],
            [
                'formula' => 'barbedwireRequiredRolls = ceil((fenceLength * barbedwireRuns) / barbedwireRollLength)',
                'var' => [
                    [
                        'l' => 'barbedwireRequiredRolls',
                        'f' => 'ceil(fenceLength*floor(12*fenceHeight/averageBarbedWireSpacing)/barbedwireRollLength)',
                        'r' => ['averageBarbedWireSpacing', 'barbedwireRollLength', 'fenceHeight', 'fenceLength'],
                    ],
                ],
            ],
            [
                'formula' => 'barbedwireTotalCost = one_way(barbedwireUnitPrice * ceil((fenceLength * barbedwireRuns) / barbedwireRollLength))',
                'var' => [
                    [
                        'l' => 'barbedwireTotalCost',
                        'f' => '(barbedwireUnitPrice*ceil(fenceLength*floor(12*fenceHeight/averageBarbedWireSpacing)/barbedwireRollLength))',
                        'r' => [
                            'averageBarbedWireSpacing',
                            'barbedwireRollLength',
                            'barbedwireUnitPrice',
                            'fenceHeight',
                            'fenceLength',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'htWireRuns = floor(fenceHeight * 12 / htWireSpacing) + 1',
                'var' => [
                    [
                        'l' => 'htWireRuns',
                        'f' => 'floor(12*fenceHeight/htWireSpacing) + 1',
                        'r' => ['fenceHeight', 'htWireSpacing'],
                    ],
                ],
            ],
            [
                'formula' => 'htWireRequiredLength = one_way((floor(fenceHeight * 12 / htWireSpacing) + 1) * fenceLength)',
                'var' => [
                    [
                        'l' => 'htWireRequiredLength',
                        'f' => '(fenceLength*(floor(12*fenceHeight/htWireSpacing) + 1))',
                        'r' => ['fenceHeight', 'fenceLength', 'htWireSpacing'],
                    ],
                ],
            ],
            [
                'formula' => 'htWireTotalCost = one_way(htWireUnitPrice * (floor(fenceHeight * 12 / htWireSpacing) + 1) * fenceLength)',
                'var' => [
                    [
                        'l' => 'htWireTotalCost',
                        'f' => '(fenceLength*htWireUnitPrice*(floor(12*fenceHeight/htWireSpacing) + 1))',
                        'r' => ['fenceHeight', 'fenceLength', 'htWireSpacing', 'htWireUnitPrice'],
                    ],
                ],
            ],
            [
                'formula' => 'polywireRuns = floor(fenceHeight * 12 / polywireSpacing) + 1',
                'var' => [
                    [
                        'l' => 'polywireRuns',
                        'f' => 'floor(12*fenceHeight/polywireSpacing) + 1',
                        'r' => ['fenceHeight', 'polywireSpacing'],
                    ],
                ],
            ],
            [
                'formula' => 'polywireRequiredLength = one_way(fenceLength * (floor(fenceHeight * 12 / polywireSpacing) + 1))',
                'var' => [
                    [
                        'l' => 'polywireRequiredLength',
                        'f' => '(fenceLength*(floor(12*fenceHeight/polywireSpacing) + 1))',
                        'r' => ['fenceHeight', 'fenceLength', 'polywireSpacing'],
                    ],
                ],
            ],
            [
                'formula' => 'polywireTotalCost = one_way(polywireUnitPrice * fenceLength * (floor(fenceHeight * 12 / polywireSpacing) + 1))',
                'var' => [
                    [
                        'l' => 'polywireTotalCost',
                        'f' => '(fenceLength*polywireUnitPrice*(floor(12*fenceHeight/polywireSpacing) + 1))',
                        'r' => ['fenceHeight', 'fenceLength', 'polywireSpacing', 'polywireUnitPrice'],
                    ],
                ],
            ],
            [
                'formula' => <<<'TXT'
                clipsOrStaples = one_way(m1 * ((floor(fenceLength / fencepostSpacing) + 1) * (floor(fenceHeight * 12 / stapleSpacing) + 1)) + m2 * ((floor(fenceLength / fencepostSpacing) + 1) * floor(fenceHeight * 12 / averageBarbedWireSpacing)) + m3 * (one_way((floor(fenceLength / fencepostSpacing) + 1) * (floor(fenceHeight * 12 / htWireSpacing) + 1))) + m4 * (one_way((floor(fenceLength / fencepostSpacing) + 1) * (floor(fenceHeight * 12 / htWireSpacing) + 1))) + m5 * (2 * (floor(fenceHeight * 12 / polywireSpacing) + 1)) + m6 * ((floor(fenceLength / fencepostSpacing) + 1) * (floor(fenceHeight * 12 / stapleSpacing) + 1)))
                TXT,
                'var' => [
                    [
                        'l' => 'clipsOrStaples',
                        'f' => <<<'TXT'
                        (m1*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m1*floor(12*fenceHeight/stapleSpacing) + m1*floor(fenceLength/fencepostSpacing) + m1 + m2*floor(12*fenceHeight/averageBarbedWireSpacing)*floor(fenceLength/fencepostSpacing) + m2*floor(12*fenceHeight/averageBarbedWireSpacing) + m3*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + m4*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + 2*m5*floor(12*fenceHeight/polywireSpacing) + 2*m5 + m6*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m6*floor(12*fenceHeight/stapleSpacing) + m6*floor(fenceLength/fencepostSpacing) + m6)
                        TXT,
                        'r' => [
                            'averageBarbedWireSpacing',
                            'fenceHeight',
                            'fenceLength',
                            'fencepostSpacing',
                            'htWireSpacing',
                            'm1',
                            'm2',
                            'm3',
                            'm4',
                            'm5',
                            'm6',
                            'polywireSpacing',
                            'stapleSpacing',
                        ],
                    ],
                ],
            ],
            [
                'formula' => <<<'TXT'
                clipsOrStaplesTotalCost = one_way(clipsOrStaplesUnitPrice * (m1 * ((floor(fenceLength / fencepostSpacing) + 1) * (floor(fenceHeight * 12 / stapleSpacing) + 1)) + m2 * ((floor(fenceLength / fencepostSpacing) + 1) * floor(fenceHeight * 12 / averageBarbedWireSpacing)) + m3 * (one_way((floor(fenceLength / fencepostSpacing) + 1) * (floor(fenceHeight * 12 / htWireSpacing) + 1))) + m4 * (one_way((floor(fenceLength / fencepostSpacing) + 1) * (floor(fenceHeight * 12 / htWireSpacing) + 1))) + m5 * (2 * (floor(fenceHeight * 12 / polywireSpacing) + 1)) + m6 * ((floor(fenceLength / fencepostSpacing) + 1) * (floor(fenceHeight * 12 / stapleSpacing) + 1))))
                TXT,
                'var' => [
                    [
                        'l' => 'clipsOrStaplesTotalCost',
                        'f' => <<<'TXT'
                        (clipsOrStaplesUnitPrice*(m1*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m1*floor(12*fenceHeight/stapleSpacing) + m1*floor(fenceLength/fencepostSpacing) + m1 + m2*floor(12*fenceHeight/averageBarbedWireSpacing)*floor(fenceLength/fencepostSpacing) + m2*floor(12*fenceHeight/averageBarbedWireSpacing) + m3*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + m4*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + 2*m5*floor(12*fenceHeight/polywireSpacing) + 2*m5 + m6*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m6*floor(12*fenceHeight/stapleSpacing) + m6*floor(fenceLength/fencepostSpacing) + m6))
                        TXT,
                        'r' => [
                            'averageBarbedWireSpacing',
                            'clipsOrStaplesUnitPrice',
                            'fenceHeight',
                            'fenceLength',
                            'fencepostSpacing',
                            'htWireSpacing',
                            'm1',
                            'm2',
                            'm3',
                            'm4',
                            'm5',
                            'm6',
                            'polywireSpacing',
                            'stapleSpacing',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'clipsForFiberglassPosts = (floor(fenceLength / fencepostSpacing) + 1 - 2) * (floor(fenceHeight * 12 / polywireSpacing) + 1)',
                'var' => [
                    [
                        'l' => 'clipsForFiberglassPosts',
                        'f' => 'floor(12*fenceHeight/polywireSpacing)*floor(fenceLength/fencepostSpacing) - floor(12*fenceHeight/polywireSpacing) + floor(fenceLength/fencepostSpacing) - 1',
                        'r' => ['fenceHeight', 'fenceLength', 'fencepostSpacing', 'polywireSpacing'],
                    ],
                ],
            ],
            [
                'formula' => <<<'TXT'
                clipsForFiberglassPostsTotalCost = one_way(clipsForFiberglassPostsUnitPrice * ((floor(fenceLength / fencepostSpacing) + 1 - 2) * (floor(fenceHeight * 12 / polywireSpacing) + 1)))
                TXT,
                'var' => [
                    [
                        'l' => 'clipsForFiberglassPostsTotalCost',
                        'f' => <<<'TXT'
                        (clipsForFiberglassPostsUnitPrice*(floor(12*fenceHeight/polywireSpacing)*floor(fenceLength/fencepostSpacing) - floor(12*fenceHeight/polywireSpacing) + floor(fenceLength/fencepostSpacing) - 1))
                        TXT,
                        'r' => [
                            'clipsForFiberglassPostsUnitPrice',
                            'fenceHeight',
                            'fenceLength',
                            'fencepostSpacing',
                            'polywireSpacing',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'springsRequired = floor(fenceHeight * 12 / htWireSpacing) + 1',
                'var' => [
                    [
                        'l' => 'springsRequired',
                        'f' => 'floor(12*fenceHeight/htWireSpacing) + 1',
                        'r' => ['fenceHeight', 'htWireSpacing'],
                    ],
                ],
            ],
            [
                'formula' => 'springsTotalCost = one_way(springsUnitPrice * (floor(fenceHeight * 12 / htWireSpacing) + 1))',
                'var' => [
                    [
                        'l' => 'springsTotalCost',
                        'f' => '(springsUnitPrice*(floor(12*fenceHeight/htWireSpacing) + 1))',
                        'r' => ['fenceHeight', 'htWireSpacing', 'springsUnitPrice'],
                    ],
                ],
            ],
            [
                'formula' => 'strainersRequired = floor(fenceHeight * 12 / htWireSpacing) + 1',
                'var' => [
                    [
                        'l' => 'strainersRequired',
                        'f' => 'floor(12*fenceHeight/htWireSpacing) + 1',
                        'r' => ['fenceHeight', 'htWireSpacing'],
                    ],
                ],
            ],
            [
                'formula' => 'strainersTotalCost = one_way(strainerUnitPrice * (floor(fenceHeight * 12 / htWireSpacing) + 1))',
                'var' => [
                    [
                        'l' => 'strainersTotalCost',
                        'f' => '(strainerUnitPrice*(floor(12*fenceHeight/htWireSpacing) + 1))',
                        'r' => ['fenceHeight', 'htWireSpacing', 'strainerUnitPrice'],
                    ],
                ],
            ],
            [
                'formula' => 'staysRequired = ceil(fencepostSpacing / staysSpacing)',
                'var' => [
                    [
                        'l' => 'staysRequired',
                        'f' => 'ceil(fencepostSpacing/staysSpacing)',
                        'r' => ['fencepostSpacing', 'staysSpacing'],
                    ],
                ],
            ],
            [
                'formula' => 'staysTotalCost = ceil(staysUnitPrice * fencepostSpacing / staysSpacing)',
                'var' => [
                    [
                        'l' => 'staysTotalCost',
                        'f' => 'ceil(fencepostSpacing*staysUnitPrice/staysSpacing)',
                        'r' => ['fencepostSpacing', 'staysSpacing', 'staysUnitPrice'],
                    ],
                ],
            ],
            [
                'formula' => 'hingeJointRequired = ceil((fenceLength * useHingeJointOptions) / hingeJointRollLength)',
                'var' => [
                    [
                        'l' => 'hingeJointRequired',
                        'f' => 'ceil(fenceLength*useHingeJointOptions/hingeJointRollLength)',
                        'r' => ['fenceLength', 'hingeJointRollLength', 'useHingeJointOptions'],
                    ],
                ],
            ],
            [
                'formula' => 'hingejointTotalCost = one_way(hingeJointUnitPrice * ceil((fenceLength * useHingeJointOptions) / hingeJointRollLength))',
                'var' => [
                    [
                        'l' => 'hingejointTotalCost',
                        'f' => '(hingeJointUnitPrice*ceil(fenceLength*useHingeJointOptions/hingeJointRollLength))',
                        'r' => ['fenceLength', 'hingeJointRollLength', 'hingeJointUnitPrice', 'useHingeJointOptions'],
                    ],
                ],
            ],
            [
                'formula' => 'energizerRequired = one_way(fenceLength * numberOfElectrifiedWires) + 0.25 * (fenceLength * numberOfElectrifiedWires)',
                'var' => [
                    [
                        'l' => 'energizerRequired',
                        'f' => '(1/4)*fenceLength*numberOfElectrifiedWires + (fenceLength*numberOfElectrifiedWires)',
                        'r' => ['fenceLength', 'numberOfElectrifiedWires'],
                    ],
                ],
            ],
            [
                'formula' => 'energizerTotalCost = one_way(energizerUnitPrice * (one_way(fenceLength * numberOfElectrifiedWires) + 0.25 * (fenceLength * numberOfElectrifiedWires)))',
                'var' => [
                    [
                        'l' => 'energizerTotalCost',
                        'f' => '((1/4)*energizerUnitPrice*(fenceLength*numberOfElectrifiedWires + 4*(fenceLength*numberOfElectrifiedWires)))',
                        'r' => ['energizerUnitPrice', 'fenceLength', 'numberOfElectrifiedWires'],
                    ],
                ],
            ],
            [
                'formula' => 'switchTotalCost = one_way(switchUnitPrice * switchRequired)',
                'var' => [
                    [
                        'l' => 'switchTotalCost',
                        'f' => '(switchRequired*switchUnitPrice)',
                        'r' => ['switchRequired', 'switchUnitPrice'],
                    ],
                ],
            ],
            [
                'formula' => 'rodsTotalCost = one_way(rodsUnitPrice * rodsRequired)',
                'var' => [
                    [
                        'l' => 'rodsTotalCost',
                        'f' => '(rodsRequired*rodsUnitPrice)',
                        'r' => ['rodsRequired', 'rodsUnitPrice'],
                    ],
                ],
            ],
            [
                'formula' => 'concreteTotalCost = one_way(concreteUnitPrice * concreteRequired)',
                'var' => [
                    [
                        'l' => 'concreteTotalCost',
                        'f' => '(concreteRequired*concreteUnitPrice)',
                        'r' => ['concreteRequired', 'concreteUnitPrice'],
                    ],
                ],
            ],
            [
                'formula' => 'laborTotalCost = one_way(laborCost * laborRequired)',
                'var' => [
                    [
                        'l' => 'laborTotalCost',
                        'f' => '(laborCost*laborRequired)',
                        'r' => ['laborCost', 'laborRequired'],
                    ],
                ],
            ],
            [
                'formula' => 'additionalBarbedWireRolls = ceil((numberOfAdditionalBarbedWireRuns * fenceLength) / barbedwireRollLength)',
                'var' => [
                    [
                        'l' => 'additionalBarbedWireRolls',
                        'f' => 'ceil(fenceLength*numberOfAdditionalBarbedWireRuns/barbedwireRollLength)',
                        'r' => ['barbedwireRollLength', 'fenceLength', 'numberOfAdditionalBarbedWireRuns'],
                    ],
                ],
            ],
            [
                'formula' => 'additionalBarbedwireTotalCost = one_way(additional * ceil((numberOfAdditionalBarbedWireRuns * fenceLength) / barbedwireRollLength))',
                'var' => [
                    [
                        'l' => 'additionalBarbedwireTotalCost',
                        'f' => '(additional*ceil(fenceLength*numberOfAdditionalBarbedWireRuns/barbedwireRollLength))',
                        'r' => ['additional', 'barbedwireRollLength', 'fenceLength', 'numberOfAdditionalBarbedWireRuns'],
                    ],
                ],
            ],
            [
                'formula' => <<<'TXT'
                totalCostWovenWire = one_way(woodpostTotalCost8in + fencepostTotalCost + wovenwireTotalCost + additionalBarbedwireTotalCost + clipsOrStaplesTotalCost + laborTotalCost)
                TXT,
                'var' => [
                    [
                        'l' => 'totalCostWovenWire',
                        'f' => <<<'TXT'
                        ((additional*ceil(fenceLength*numberOfAdditionalBarbedWireRuns/barbedwireRollLength)) + (clipsOrStaplesUnitPrice*(m1*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m1*floor(12*fenceHeight/stapleSpacing) + m1*floor(fenceLength/fencepostSpacing) + m1 + m2*floor(12*fenceHeight/averageBarbedWireSpacing)*floor(fenceLength/fencepostSpacing) + m2*floor(12*fenceHeight/averageBarbedWireSpacing) + m3*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + m4*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + 2*m5*floor(12*fenceHeight/polywireSpacing) + 2*m5 + m6*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m6*floor(12*fenceHeight/stapleSpacing) + m6*floor(fenceLength/fencepostSpacing) + m6)) + (laborCost*laborRequired) + (woodpostRequired8in*woodpostUnitPrice8in) + (wovenwireUnitPrice*ceil(fenceLength/wovenwireRollLength)) + (-fencepostUnitPrice*m5*m6*p1*woodpostRequired8in + fencepostUnitPrice*m5*m6*p1*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m5*m6*p1 + fencepostUnitPrice*m5*m6*p2*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m5*m6*p2 + fencepostUnitPrice*m5*p1*woodpostRequired8in - fencepostUnitPrice*m5*p1*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*m5*p1 - fencepostUnitPrice*m5*p2*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*m5*p2 + fencepostUnitPrice*m6*p1*woodpostRequired8in - fencepostUnitPrice*m6*p1*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m6*p1 - fencepostUnitPrice*m6*p2*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m6*p2 - fencepostUnitPrice*p1*woodpostRequired8in + fencepostUnitPrice*p1*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*p1 + fencepostUnitPrice*p2*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*p2 + m6*floor(fenceLength/fencepostSpacing) + m6))
                        TXT,
                        'r' => [
                            'additional',
                            'averageBarbedWireSpacing',
                            'barbedwireRollLength',
                            'clipsOrStaplesUnitPrice',
                            'fenceHeight',
                            'fenceLength',
                            'fencepostSpacing',
                            'fencepostUnitPrice',
                            'htWireSpacing',
                            'laborCost',
                            'laborRequired',
                            'm1',
                            'm2',
                            'm3',
                            'm4',
                            'm5',
                            'm6',
                            'numberOfAdditionalBarbedWireRuns',
                            'p1',
                            'p2',
                            'polywireSpacing',
                            'stapleSpacing',
                            'woodpostRequired8in',
                            'woodpostUnitPrice8in',
                            'wovenwireRollLength',
                            'wovenwireUnitPrice',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'totalCostBarbedWire = one_way(woodpostTotalCost8in + fencepostTotalCost + barbedwireTotalCost + clipsOrStaplesTotalCost + laborTotalCost)',
                'var' => [
                    [
                        'l' => 'totalCostBarbedWire',
                        'f' => <<<'TXT'
                        ((barbedwireUnitPrice*ceil(fenceLength*floor(12*fenceHeight/averageBarbedWireSpacing)/barbedwireRollLength)) + (clipsOrStaplesUnitPrice*(m1*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m1*floor(12*fenceHeight/stapleSpacing) + m1*floor(fenceLength/fencepostSpacing) + m1 + m2*floor(12*fenceHeight/averageBarbedWireSpacing)*floor(fenceLength/fencepostSpacing) + m2*floor(12*fenceHeight/averageBarbedWireSpacing) + m3*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + m4*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + 2*m5*floor(12*fenceHeight/polywireSpacing) + 2*m5 + m6*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m6*floor(12*fenceHeight/stapleSpacing) + m6*floor(fenceLength/fencepostSpacing) + m6)) + (laborCost*laborRequired) + (woodpostRequired8in*woodpostUnitPrice8in) + (-fencepostUnitPrice*m5*m6*p1*woodpostRequired8in + fencepostUnitPrice*m5*m6*p1*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m5*m6*p1 + fencepostUnitPrice*m5*m6*p2*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m5*m6*p2 + fencepostUnitPrice*m5*p1*woodpostRequired8in - fencepostUnitPrice*m5*p1*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*m5*p1 - fencepostUnitPrice*m5*p2*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*m5*p2 + fencepostUnitPrice*m6*p1*woodpostRequired8in - fencepostUnitPrice*m6*p1*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m6*p1 - fencepostUnitPrice*m6*p2*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m6*p2 - fencepostUnitPrice*p1*woodpostRequired8in + fencepostUnitPrice*p1*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*p1 + fencepostUnitPrice*p2*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*p2 + m6*floor(fenceLength/fencepostSpacing) + m6))
                        TXT,
                        'r' => [
                            'averageBarbedWireSpacing',
                            'barbedwireRollLength',
                            'barbedwireUnitPrice',
                            'clipsOrStaplesUnitPrice',
                            'fenceHeight',
                            'fenceLength',
                            'fencepostSpacing',
                            'fencepostUnitPrice',
                            'htWireSpacing',
                            'laborCost',
                            'laborRequired',
                            'm1',
                            'm2',
                            'm3',
                            'm4',
                            'm5',
                            'm6',
                            'p1',
                            'p2',
                            'polywireSpacing',
                            'stapleSpacing',
                            'woodpostRequired8in',
                            'woodpostUnitPrice8in',
                        ],
                    ],
                ],
            ],
            [
                'formula' => <<<'TXT'
                totalCostHtWire = one_way(woodpostTotalCost8in + fencepostTotalCost + htWireTotalCost + clipsOrStaplesTotalCost + springsTotalCost + strainersTotalCost + laborTotalCost)
                TXT,
                'var' => [
                    [
                        'l' => 'totalCostHtWire',
                        'f' => <<<'TXT'
                        ((clipsOrStaplesUnitPrice*(m1*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m1*floor(12*fenceHeight/stapleSpacing) + m1*floor(fenceLength/fencepostSpacing) + m1 + m2*floor(12*fenceHeight/averageBarbedWireSpacing)*floor(fenceLength/fencepostSpacing) + m2*floor(12*fenceHeight/averageBarbedWireSpacing) + m3*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + m4*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + 2*m5*floor(12*fenceHeight/polywireSpacing) + 2*m5 + m6*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m6*floor(12*fenceHeight/stapleSpacing) + m6*floor(fenceLength/fencepostSpacing) + m6)) + (laborCost*laborRequired) + (springsUnitPrice*(floor(12*fenceHeight/htWireSpacing) + 1)) + (strainerUnitPrice*(floor(12*fenceHeight/htWireSpacing) + 1)) + (woodpostRequired8in*woodpostUnitPrice8in) + (fenceLength*htWireUnitPrice*(floor(12*fenceHeight/htWireSpacing) + 1)) + (-fencepostUnitPrice*m5*m6*p1*woodpostRequired8in + fencepostUnitPrice*m5*m6*p1*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m5*m6*p1 + fencepostUnitPrice*m5*m6*p2*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m5*m6*p2 + fencepostUnitPrice*m5*p1*woodpostRequired8in - fencepostUnitPrice*m5*p1*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*m5*p1 - fencepostUnitPrice*m5*p2*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*m5*p2 + fencepostUnitPrice*m6*p1*woodpostRequired8in - fencepostUnitPrice*m6*p1*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m6*p1 - fencepostUnitPrice*m6*p2*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m6*p2 - fencepostUnitPrice*p1*woodpostRequired8in + fencepostUnitPrice*p1*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*p1 + fencepostUnitPrice*p2*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*p2 + m6*floor(fenceLength/fencepostSpacing) + m6))
                        TXT,
                        'r' => [
                            'averageBarbedWireSpacing',
                            'clipsOrStaplesUnitPrice',
                            'fenceHeight',
                            'fenceLength',
                            'fencepostSpacing',
                            'fencepostUnitPrice',
                            'htWireSpacing',
                            'htWireUnitPrice',
                            'laborCost',
                            'laborRequired',
                            'm1',
                            'm2',
                            'm3',
                            'm4',
                            'm5',
                            'm6',
                            'p1',
                            'p2',
                            'polywireSpacing',
                            'springsUnitPrice',
                            'stapleSpacing',
                            'strainerUnitPrice',
                            'woodpostRequired8in',
                            'woodpostUnitPrice8in',
                        ],
                    ],
                ],
            ],
            [
                'formula' => <<<'TXT'
                totalCostElectrifiedHtWire = one_way(woodpostTotalCost8in + fencepostTotalCost + htWireTotalCost + clipsOrStaplesTotalCost + springsTotalCost + strainersTotalCost + energizerTotalCost + rodsTotalCost + switchTotalCost + laborTotalCost)
                TXT,
                'var' => [
                    [
                        'l' => 'totalCostElectrifiedHtWire',
                        'f' => <<<'TXT'
                        ((clipsOrStaplesUnitPrice*(m1*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m1*floor(12*fenceHeight/stapleSpacing) + m1*floor(fenceLength/fencepostSpacing) + m1 + m2*floor(12*fenceHeight/averageBarbedWireSpacing)*floor(fenceLength/fencepostSpacing) + m2*floor(12*fenceHeight/averageBarbedWireSpacing) + m3*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + m4*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + 2*m5*floor(12*fenceHeight/polywireSpacing) + 2*m5 + m6*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m6*floor(12*fenceHeight/stapleSpacing) + m6*floor(fenceLength/fencepostSpacing) + m6)) + ((1/4)*energizerUnitPrice*(fenceLength*numberOfElectrifiedWires + 4*(fenceLength*numberOfElectrifiedWires))) + (laborCost*laborRequired) + (rodsRequired*rodsUnitPrice) + (springsUnitPrice*(floor(12*fenceHeight/htWireSpacing) + 1)) + (strainerUnitPrice*(floor(12*fenceHeight/htWireSpacing) + 1)) + (switchRequired*switchUnitPrice) + (woodpostRequired8in*woodpostUnitPrice8in) + (fenceLength*htWireUnitPrice*(floor(12*fenceHeight/htWireSpacing) + 1)) + (-fencepostUnitPrice*m5*m6*p1*woodpostRequired8in + fencepostUnitPrice*m5*m6*p1*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m5*m6*p1 + fencepostUnitPrice*m5*m6*p2*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m5*m6*p2 + fencepostUnitPrice*m5*p1*woodpostRequired8in - fencepostUnitPrice*m5*p1*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*m5*p1 - fencepostUnitPrice*m5*p2*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*m5*p2 + fencepostUnitPrice*m6*p1*woodpostRequired8in - fencepostUnitPrice*m6*p1*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m6*p1 - fencepostUnitPrice*m6*p2*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m6*p2 - fencepostUnitPrice*p1*woodpostRequired8in + fencepostUnitPrice*p1*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*p1 + fencepostUnitPrice*p2*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*p2 + m6*floor(fenceLength/fencepostSpacing) + m6))
                        TXT,
                        'r' => [
                            'averageBarbedWireSpacing',
                            'clipsOrStaplesUnitPrice',
                            'energizerUnitPrice',
                            'fenceHeight',
                            'fenceLength',
                            'fencepostSpacing',
                            'fencepostUnitPrice',
                            'htWireSpacing',
                            'htWireUnitPrice',
                            'laborCost',
                            'laborRequired',
                            'm1',
                            'm2',
                            'm3',
                            'm4',
                            'm5',
                            'm6',
                            'numberOfElectrifiedWires',
                            'p1',
                            'p2',
                            'polywireSpacing',
                            'rodsRequired',
                            'rodsUnitPrice',
                            'springsUnitPrice',
                            'stapleSpacing',
                            'strainerUnitPrice',
                            'switchRequired',
                            'switchUnitPrice',
                            'woodpostRequired8in',
                            'woodpostUnitPrice8in',
                        ],
                    ],
                ],
            ],
            [
                'formula' => <<<'TXT'
                totalCostElectrifiedPolywire = one_way(fencepostTotalCost + fiberglasspostsTotalCost + polywireTotalCost + clipsOrStaplesTotalCost + energizerTotalCost + rodsTotalCost + switchTotalCost + laborTotalCost)
                TXT,
                'var' => [
                    [
                        'l' => 'totalCostElectrifiedPolywire',
                        'f' => <<<'TXT'
                        ((clipsOrStaplesUnitPrice*(m1*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m1*floor(12*fenceHeight/stapleSpacing) + m1*floor(fenceLength/fencepostSpacing) + m1 + m2*floor(12*fenceHeight/averageBarbedWireSpacing)*floor(fenceLength/fencepostSpacing) + m2*floor(12*fenceHeight/averageBarbedWireSpacing) + m3*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + m4*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + 2*m5*floor(12*fenceHeight/polywireSpacing) + 2*m5 + m6*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m6*floor(12*fenceHeight/stapleSpacing) + m6*floor(fenceLength/fencepostSpacing) + m6)) + ((1/4)*energizerUnitPrice*(fenceLength*numberOfElectrifiedWires + 4*(fenceLength*numberOfElectrifiedWires))) + (fiberglasspostsUnitPrice*(floor(fenceLength/fencepostSpacing) - 1)) + (laborCost*laborRequired) + (rodsRequired*rodsUnitPrice) + (switchRequired*switchUnitPrice) + (fenceLength*polywireUnitPrice*(floor(12*fenceHeight/polywireSpacing) + 1)) + (-fencepostUnitPrice*m5*m6*p1*woodpostRequired8in + fencepostUnitPrice*m5*m6*p1*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m5*m6*p1 + fencepostUnitPrice*m5*m6*p2*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m5*m6*p2 + fencepostUnitPrice*m5*p1*woodpostRequired8in - fencepostUnitPrice*m5*p1*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*m5*p1 - fencepostUnitPrice*m5*p2*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*m5*p2 + fencepostUnitPrice*m6*p1*woodpostRequired8in - fencepostUnitPrice*m6*p1*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m6*p1 - fencepostUnitPrice*m6*p2*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m6*p2 - fencepostUnitPrice*p1*woodpostRequired8in + fencepostUnitPrice*p1*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*p1 + fencepostUnitPrice*p2*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*p2 + m6*floor(fenceLength/fencepostSpacing) + m6))
                        TXT,
                        'r' => [
                            'averageBarbedWireSpacing',
                            'clipsOrStaplesUnitPrice',
                            'energizerUnitPrice',
                            'fenceHeight',
                            'fenceLength',
                            'fencepostSpacing',
                            'fencepostUnitPrice',
                            'fiberglasspostsUnitPrice',
                            'htWireSpacing',
                            'laborCost',
                            'laborRequired',
                            'm1',
                            'm2',
                            'm3',
                            'm4',
                            'm5',
                            'm6',
                            'numberOfElectrifiedWires',
                            'p1',
                            'p2',
                            'polywireSpacing',
                            'polywireUnitPrice',
                            'rodsRequired',
                            'rodsUnitPrice',
                            'stapleSpacing',
                            'switchRequired',
                            'switchUnitPrice',
                            'woodpostRequired8in',
                        ],
                    ],
                ],
            ],
            [
                'formula' => <<<'TXT'
                totalCostCustomFence = one_way(fencepostTotalCost + wovenwireTotalCost + additionalBarbedwireTotalCost + clipsOrStaplesTotalCost + strainersTotalCost + staysTotalCost + hingejointTotalCost + concreteTotalCost + laborTotalCost)
                TXT,
                'var' => [
                    [
                        'l' => 'totalCostCustomFence',
                        'f' => <<<'TXT'
                        (ceil(fencepostSpacing*staysUnitPrice/staysSpacing) + (additional*ceil(fenceLength*numberOfAdditionalBarbedWireRuns/barbedwireRollLength)) + (clipsOrStaplesUnitPrice*(m1*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m1*floor(12*fenceHeight/stapleSpacing) + m1*floor(fenceLength/fencepostSpacing) + m1 + m2*floor(12*fenceHeight/averageBarbedWireSpacing)*floor(fenceLength/fencepostSpacing) + m2*floor(12*fenceHeight/averageBarbedWireSpacing) + m3*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + m4*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + 2*m5*floor(12*fenceHeight/polywireSpacing) + 2*m5 + m6*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m6*floor(12*fenceHeight/stapleSpacing) + m6*floor(fenceLength/fencepostSpacing) + m6)) + (concreteRequired*concreteUnitPrice) + (hingeJointUnitPrice*ceil(fenceLength*useHingeJointOptions/hingeJointRollLength)) + (laborCost*laborRequired) + (strainerUnitPrice*(floor(12*fenceHeight/htWireSpacing) + 1)) + (wovenwireUnitPrice*ceil(fenceLength/wovenwireRollLength)) + (-fencepostUnitPrice*m5*m6*p1*woodpostRequired8in + fencepostUnitPrice*m5*m6*p1*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m5*m6*p1 + fencepostUnitPrice*m5*m6*p2*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m5*m6*p2 + fencepostUnitPrice*m5*p1*woodpostRequired8in - fencepostUnitPrice*m5*p1*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*m5*p1 - fencepostUnitPrice*m5*p2*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*m5*p2 + fencepostUnitPrice*m6*p1*woodpostRequired8in - fencepostUnitPrice*m6*p1*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m6*p1 - fencepostUnitPrice*m6*p2*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m6*p2 - fencepostUnitPrice*p1*woodpostRequired8in + fencepostUnitPrice*p1*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*p1 + fencepostUnitPrice*p2*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*p2 + m6*floor(fenceLength/fencepostSpacing) + m6))
                        TXT,
                        'r' => [
                            'additional',
                            'averageBarbedWireSpacing',
                            'barbedwireRollLength',
                            'clipsOrStaplesUnitPrice',
                            'concreteRequired',
                            'concreteUnitPrice',
                            'fenceHeight',
                            'fenceLength',
                            'fencepostSpacing',
                            'fencepostUnitPrice',
                            'hingeJointRollLength',
                            'hingeJointUnitPrice',
                            'htWireSpacing',
                            'laborCost',
                            'laborRequired',
                            'm1',
                            'm2',
                            'm3',
                            'm4',
                            'm5',
                            'm6',
                            'numberOfAdditionalBarbedWireRuns',
                            'p1',
                            'p2',
                            'polywireSpacing',
                            'stapleSpacing',
                            'staysSpacing',
                            'staysUnitPrice',
                            'strainerUnitPrice',
                            'useHingeJointOptions',
                            'woodpostRequired8in',
                            'wovenwireRollLength',
                            'wovenwireUnitPrice',
                        ],
                    ],
                ],
            ],
            [
                'formula' => <<<'TXT'
                tcplWovenWire = one_way((woodpostTotalCost8in + fencepostTotalCost + wovenwireTotalCost + additionalBarbedwireTotalCost + clipsOrStaplesTotalCost + laborTotalCost) / fenceLength)
                TXT,
                'var' => [
                    [
                        'l' => 'tcplWovenWire',
                        'f' => <<<'TXT'
                        (((additional*ceil(fenceLength*numberOfAdditionalBarbedWireRuns/barbedwireRollLength)) + (clipsOrStaplesUnitPrice*(m1*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m1*floor(12*fenceHeight/stapleSpacing) + m1*floor(fenceLength/fencepostSpacing) + m1 + m2*floor(12*fenceHeight/averageBarbedWireSpacing)*floor(fenceLength/fencepostSpacing) + m2*floor(12*fenceHeight/averageBarbedWireSpacing) + m3*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + m4*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + 2*m5*floor(12*fenceHeight/polywireSpacing) + 2*m5 + m6*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m6*floor(12*fenceHeight/stapleSpacing) + m6*floor(fenceLength/fencepostSpacing) + m6)) + (laborCost*laborRequired) + (woodpostRequired8in*woodpostUnitPrice8in) + (wovenwireUnitPrice*ceil(fenceLength/wovenwireRollLength)) + (-fencepostUnitPrice*m5*m6*p1*woodpostRequired8in + fencepostUnitPrice*m5*m6*p1*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m5*m6*p1 + fencepostUnitPrice*m5*m6*p2*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m5*m6*p2 + fencepostUnitPrice*m5*p1*woodpostRequired8in - fencepostUnitPrice*m5*p1*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*m5*p1 - fencepostUnitPrice*m5*p2*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*m5*p2 + fencepostUnitPrice*m6*p1*woodpostRequired8in - fencepostUnitPrice*m6*p1*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m6*p1 - fencepostUnitPrice*m6*p2*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m6*p2 - fencepostUnitPrice*p1*woodpostRequired8in + fencepostUnitPrice*p1*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*p1 + fencepostUnitPrice*p2*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*p2 + m6*floor(fenceLength/fencepostSpacing) + m6))/fenceLength)
                        TXT,
                        'r' => [
                            'additional',
                            'averageBarbedWireSpacing',
                            'barbedwireRollLength',
                            'clipsOrStaplesUnitPrice',
                            'fenceHeight',
                            'fenceLength',
                            'fencepostSpacing',
                            'fencepostUnitPrice',
                            'htWireSpacing',
                            'laborCost',
                            'laborRequired',
                            'm1',
                            'm2',
                            'm3',
                            'm4',
                            'm5',
                            'm6',
                            'numberOfAdditionalBarbedWireRuns',
                            'p1',
                            'p2',
                            'polywireSpacing',
                            'stapleSpacing',
                            'woodpostRequired8in',
                            'woodpostUnitPrice8in',
                            'wovenwireRollLength',
                            'wovenwireUnitPrice',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'tcplBarbedWire = one_way((woodpostTotalCost8in + fencepostTotalCost + barbedwireTotalCost + clipsOrStaplesTotalCost + laborTotalCost) / fenceLength)',
                'var' => [
                    [
                        'l' => 'tcplBarbedWire',
                        'f' => <<<'TXT'
                        (((barbedwireUnitPrice*ceil(fenceLength*floor(12*fenceHeight/averageBarbedWireSpacing)/barbedwireRollLength)) + (clipsOrStaplesUnitPrice*(m1*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m1*floor(12*fenceHeight/stapleSpacing) + m1*floor(fenceLength/fencepostSpacing) + m1 + m2*floor(12*fenceHeight/averageBarbedWireSpacing)*floor(fenceLength/fencepostSpacing) + m2*floor(12*fenceHeight/averageBarbedWireSpacing) + m3*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + m4*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + 2*m5*floor(12*fenceHeight/polywireSpacing) + 2*m5 + m6*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m6*floor(12*fenceHeight/stapleSpacing) + m6*floor(fenceLength/fencepostSpacing) + m6)) + (laborCost*laborRequired) + (woodpostRequired8in*woodpostUnitPrice8in) + (-fencepostUnitPrice*m5*m6*p1*woodpostRequired8in + fencepostUnitPrice*m5*m6*p1*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m5*m6*p1 + fencepostUnitPrice*m5*m6*p2*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m5*m6*p2 + fencepostUnitPrice*m5*p1*woodpostRequired8in - fencepostUnitPrice*m5*p1*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*m5*p1 - fencepostUnitPrice*m5*p2*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*m5*p2 + fencepostUnitPrice*m6*p1*woodpostRequired8in - fencepostUnitPrice*m6*p1*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m6*p1 - fencepostUnitPrice*m6*p2*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m6*p2 - fencepostUnitPrice*p1*woodpostRequired8in + fencepostUnitPrice*p1*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*p1 + fencepostUnitPrice*p2*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*p2 + m6*floor(fenceLength/fencepostSpacing) + m6))/fenceLength)
                        TXT,
                        'r' => [
                            'averageBarbedWireSpacing',
                            'barbedwireRollLength',
                            'barbedwireUnitPrice',
                            'clipsOrStaplesUnitPrice',
                            'fenceHeight',
                            'fenceLength',
                            'fencepostSpacing',
                            'fencepostUnitPrice',
                            'htWireSpacing',
                            'laborCost',
                            'laborRequired',
                            'm1',
                            'm2',
                            'm3',
                            'm4',
                            'm5',
                            'm6',
                            'p1',
                            'p2',
                            'polywireSpacing',
                            'stapleSpacing',
                            'woodpostRequired8in',
                            'woodpostUnitPrice8in',
                        ],
                    ],
                ],
            ],
            [
                'formula' => <<<'TXT'
                tcplHtWire = one_way((woodpostTotalCost8in + fencepostTotalCost + htWireTotalCost + clipsOrStaplesTotalCost + springsTotalCost + strainersTotalCost + laborTotalCost) / fenceLength)
                TXT,
                'var' => [
                    [
                        'l' => 'tcplHtWire',
                        'f' => <<<'TXT'
                        (((clipsOrStaplesUnitPrice*(m1*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m1*floor(12*fenceHeight/stapleSpacing) + m1*floor(fenceLength/fencepostSpacing) + m1 + m2*floor(12*fenceHeight/averageBarbedWireSpacing)*floor(fenceLength/fencepostSpacing) + m2*floor(12*fenceHeight/averageBarbedWireSpacing) + m3*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + m4*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + 2*m5*floor(12*fenceHeight/polywireSpacing) + 2*m5 + m6*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m6*floor(12*fenceHeight/stapleSpacing) + m6*floor(fenceLength/fencepostSpacing) + m6)) + (laborCost*laborRequired) + (springsUnitPrice*(floor(12*fenceHeight/htWireSpacing) + 1)) + (strainerUnitPrice*(floor(12*fenceHeight/htWireSpacing) + 1)) + (woodpostRequired8in*woodpostUnitPrice8in) + (fenceLength*htWireUnitPrice*(floor(12*fenceHeight/htWireSpacing) + 1)) + (-fencepostUnitPrice*m5*m6*p1*woodpostRequired8in + fencepostUnitPrice*m5*m6*p1*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m5*m6*p1 + fencepostUnitPrice*m5*m6*p2*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m5*m6*p2 + fencepostUnitPrice*m5*p1*woodpostRequired8in - fencepostUnitPrice*m5*p1*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*m5*p1 - fencepostUnitPrice*m5*p2*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*m5*p2 + fencepostUnitPrice*m6*p1*woodpostRequired8in - fencepostUnitPrice*m6*p1*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m6*p1 - fencepostUnitPrice*m6*p2*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m6*p2 - fencepostUnitPrice*p1*woodpostRequired8in + fencepostUnitPrice*p1*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*p1 + fencepostUnitPrice*p2*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*p2 + m6*floor(fenceLength/fencepostSpacing) + m6))/fenceLength)
                        TXT,
                        'r' => [
                            'averageBarbedWireSpacing',
                            'clipsOrStaplesUnitPrice',
                            'fenceHeight',
                            'fenceLength',
                            'fencepostSpacing',
                            'fencepostUnitPrice',
                            'htWireSpacing',
                            'htWireUnitPrice',
                            'laborCost',
                            'laborRequired',
                            'm1',
                            'm2',
                            'm3',
                            'm4',
                            'm5',
                            'm6',
                            'p1',
                            'p2',
                            'polywireSpacing',
                            'springsUnitPrice',
                            'stapleSpacing',
                            'strainerUnitPrice',
                            'woodpostRequired8in',
                            'woodpostUnitPrice8in',
                        ],
                    ],
                ],
            ],
            [
                'formula' => <<<'TXT'
                tcplElectrifiedHtWire = one_way((woodpostTotalCost8in + fencepostTotalCost + htWireTotalCost + clipsOrStaplesTotalCost + springsTotalCost + strainersTotalCost + energizerTotalCost + rodsTotalCost + switchTotalCost + laborTotalCost) / fenceLength)
                TXT,
                'var' => [
                    [
                        'l' => 'tcplElectrifiedHtWire',
                        'f' => <<<'TXT'
                        (((clipsOrStaplesUnitPrice*(m1*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m1*floor(12*fenceHeight/stapleSpacing) + m1*floor(fenceLength/fencepostSpacing) + m1 + m2*floor(12*fenceHeight/averageBarbedWireSpacing)*floor(fenceLength/fencepostSpacing) + m2*floor(12*fenceHeight/averageBarbedWireSpacing) + m3*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + m4*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + 2*m5*floor(12*fenceHeight/polywireSpacing) + 2*m5 + m6*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m6*floor(12*fenceHeight/stapleSpacing) + m6*floor(fenceLength/fencepostSpacing) + m6)) + ((1/4)*energizerUnitPrice*(fenceLength*numberOfElectrifiedWires + 4*(fenceLength*numberOfElectrifiedWires))) + (laborCost*laborRequired) + (rodsRequired*rodsUnitPrice) + (springsUnitPrice*(floor(12*fenceHeight/htWireSpacing) + 1)) + (strainerUnitPrice*(floor(12*fenceHeight/htWireSpacing) + 1)) + (switchRequired*switchUnitPrice) + (woodpostRequired8in*woodpostUnitPrice8in) + (fenceLength*htWireUnitPrice*(floor(12*fenceHeight/htWireSpacing) + 1)) + (-fencepostUnitPrice*m5*m6*p1*woodpostRequired8in + fencepostUnitPrice*m5*m6*p1*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m5*m6*p1 + fencepostUnitPrice*m5*m6*p2*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m5*m6*p2 + fencepostUnitPrice*m5*p1*woodpostRequired8in - fencepostUnitPrice*m5*p1*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*m5*p1 - fencepostUnitPrice*m5*p2*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*m5*p2 + fencepostUnitPrice*m6*p1*woodpostRequired8in - fencepostUnitPrice*m6*p1*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m6*p1 - fencepostUnitPrice*m6*p2*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m6*p2 - fencepostUnitPrice*p1*woodpostRequired8in + fencepostUnitPrice*p1*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*p1 + fencepostUnitPrice*p2*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*p2 + m6*floor(fenceLength/fencepostSpacing) + m6))/fenceLength)
                        TXT,
                        'r' => [
                            'averageBarbedWireSpacing',
                            'clipsOrStaplesUnitPrice',
                            'energizerUnitPrice',
                            'fenceHeight',
                            'fenceLength',
                            'fencepostSpacing',
                            'fencepostUnitPrice',
                            'htWireSpacing',
                            'htWireUnitPrice',
                            'laborCost',
                            'laborRequired',
                            'm1',
                            'm2',
                            'm3',
                            'm4',
                            'm5',
                            'm6',
                            'numberOfElectrifiedWires',
                            'p1',
                            'p2',
                            'polywireSpacing',
                            'rodsRequired',
                            'rodsUnitPrice',
                            'springsUnitPrice',
                            'stapleSpacing',
                            'strainerUnitPrice',
                            'switchRequired',
                            'switchUnitPrice',
                            'woodpostRequired8in',
                            'woodpostUnitPrice8in',
                        ],
                    ],
                ],
            ],
            [
                'formula' => <<<'TXT'
                tcplElectrifiedPolywire = one_way((fencepostTotalCost + fiberglasspostsTotalCost + polywireTotalCost + clipsOrStaplesTotalCost + energizerTotalCost + rodsTotalCost + switchTotalCost + laborTotalCost) / fenceLength)
                TXT,
                'var' => [
                    [
                        'l' => 'tcplElectrifiedPolywire',
                        'f' => <<<'TXT'
                        (((clipsOrStaplesUnitPrice*(m1*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m1*floor(12*fenceHeight/stapleSpacing) + m1*floor(fenceLength/fencepostSpacing) + m1 + m2*floor(12*fenceHeight/averageBarbedWireSpacing)*floor(fenceLength/fencepostSpacing) + m2*floor(12*fenceHeight/averageBarbedWireSpacing) + m3*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + m4*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + 2*m5*floor(12*fenceHeight/polywireSpacing) + 2*m5 + m6*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m6*floor(12*fenceHeight/stapleSpacing) + m6*floor(fenceLength/fencepostSpacing) + m6)) + ((1/4)*energizerUnitPrice*(fenceLength*numberOfElectrifiedWires + 4*(fenceLength*numberOfElectrifiedWires))) + (fiberglasspostsUnitPrice*(floor(fenceLength/fencepostSpacing) - 1)) + (laborCost*laborRequired) + (rodsRequired*rodsUnitPrice) + (switchRequired*switchUnitPrice) + (fenceLength*polywireUnitPrice*(floor(12*fenceHeight/polywireSpacing) + 1)) + (-fencepostUnitPrice*m5*m6*p1*woodpostRequired8in + fencepostUnitPrice*m5*m6*p1*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m5*m6*p1 + fencepostUnitPrice*m5*m6*p2*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m5*m6*p2 + fencepostUnitPrice*m5*p1*woodpostRequired8in - fencepostUnitPrice*m5*p1*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*m5*p1 - fencepostUnitPrice*m5*p2*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*m5*p2 + fencepostUnitPrice*m6*p1*woodpostRequired8in - fencepostUnitPrice*m6*p1*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m6*p1 - fencepostUnitPrice*m6*p2*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m6*p2 - fencepostUnitPrice*p1*woodpostRequired8in + fencepostUnitPrice*p1*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*p1 + fencepostUnitPrice*p2*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*p2 + m6*floor(fenceLength/fencepostSpacing) + m6))/fenceLength)
                        TXT,
                        'r' => [
                            'averageBarbedWireSpacing',
                            'clipsOrStaplesUnitPrice',
                            'energizerUnitPrice',
                            'fenceHeight',
                            'fenceLength',
                            'fencepostSpacing',
                            'fencepostUnitPrice',
                            'fiberglasspostsUnitPrice',
                            'htWireSpacing',
                            'laborCost',
                            'laborRequired',
                            'm1',
                            'm2',
                            'm3',
                            'm4',
                            'm5',
                            'm6',
                            'numberOfElectrifiedWires',
                            'p1',
                            'p2',
                            'polywireSpacing',
                            'polywireUnitPrice',
                            'rodsRequired',
                            'rodsUnitPrice',
                            'stapleSpacing',
                            'switchRequired',
                            'switchUnitPrice',
                            'woodpostRequired8in',
                        ],
                    ],
                ],
            ],
            [
                'formula' => <<<'TXT'
                tcplCustomFence = one_way((fencepostTotalCost + wovenwireTotalCost + additionalBarbedwireTotalCost + clipsOrStaplesTotalCost + strainersTotalCost + staysTotalCost + hingejointTotalCost + concreteTotalCost + laborTotalCost) / fenceLength)
                TXT,
                'var' => [
                    [
                        'l' => 'tcplCustomFence',
                        'f' => <<<'TXT'
                        ((ceil(fencepostSpacing*staysUnitPrice/staysSpacing) + (additional*ceil(fenceLength*numberOfAdditionalBarbedWireRuns/barbedwireRollLength)) + (clipsOrStaplesUnitPrice*(m1*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m1*floor(12*fenceHeight/stapleSpacing) + m1*floor(fenceLength/fencepostSpacing) + m1 + m2*floor(12*fenceHeight/averageBarbedWireSpacing)*floor(fenceLength/fencepostSpacing) + m2*floor(12*fenceHeight/averageBarbedWireSpacing) + m3*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + m4*(floor(12*fenceHeight/htWireSpacing)*floor(fenceLength/fencepostSpacing) + floor(12*fenceHeight/htWireSpacing) + floor(fenceLength/fencepostSpacing) + 1) + 2*m5*floor(12*fenceHeight/polywireSpacing) + 2*m5 + m6*floor(12*fenceHeight/stapleSpacing)*floor(fenceLength/fencepostSpacing) + m6*floor(12*fenceHeight/stapleSpacing) + m6*floor(fenceLength/fencepostSpacing) + m6)) + (concreteRequired*concreteUnitPrice) + (hingeJointUnitPrice*ceil(fenceLength*useHingeJointOptions/hingeJointRollLength)) + (laborCost*laborRequired) + (strainerUnitPrice*(floor(12*fenceHeight/htWireSpacing) + 1)) + (wovenwireUnitPrice*ceil(fenceLength/wovenwireRollLength)) + (-fencepostUnitPrice*m5*m6*p1*woodpostRequired8in + fencepostUnitPrice*m5*m6*p1*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m5*m6*p1 + fencepostUnitPrice*m5*m6*p2*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m5*m6*p2 + fencepostUnitPrice*m5*p1*woodpostRequired8in - fencepostUnitPrice*m5*p1*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*m5*p1 - fencepostUnitPrice*m5*p2*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*m5*p2 + fencepostUnitPrice*m6*p1*woodpostRequired8in - fencepostUnitPrice*m6*p1*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m6*p1 - fencepostUnitPrice*m6*p2*floor(fenceLength/fencepostSpacing) - fencepostUnitPrice*m6*p2 - fencepostUnitPrice*p1*woodpostRequired8in + fencepostUnitPrice*p1*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*p1 + fencepostUnitPrice*p2*floor(fenceLength/fencepostSpacing) + fencepostUnitPrice*p2 + m6*floor(fenceLength/fencepostSpacing) + m6))/fenceLength)
                        TXT,
                        'r' => [
                            'additional',
                            'averageBarbedWireSpacing',
                            'barbedwireRollLength',
                            'clipsOrStaplesUnitPrice',
                            'concreteRequired',
                            'concreteUnitPrice',
                            'fenceHeight',
                            'fenceLength',
                            'fencepostSpacing',
                            'fencepostUnitPrice',
                            'hingeJointRollLength',
                            'hingeJointUnitPrice',
                            'htWireSpacing',
                            'laborCost',
                            'laborRequired',
                            'm1',
                            'm2',
                            'm3',
                            'm4',
                            'm5',
                            'm6',
                            'numberOfAdditionalBarbedWireRuns',
                            'p1',
                            'p2',
                            'polywireSpacing',
                            'stapleSpacing',
                            'staysSpacing',
                            'staysUnitPrice',
                            'strainerUnitPrice',
                            'useHingeJointOptions',
                            'woodpostRequired8in',
                            'wovenwireRollLength',
                            'wovenwireUnitPrice',
                        ],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'aYlm5yL5Fx3SLVPnRYRGN' => [
                'name' => 'Fence type',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'd5ftue5XyBV8JjK7bMeoc', 'label' => 'Woven wire', 'value' => '1'],
                    ['uid' => 'FdF_WJVKAPnFO6uxJX66y', 'label' => 'Barbed wire', 'value' => '2'],
                    ['uid' => 'e9drSgbgVys5uTWWGSIaj', 'label' => 'High-tensile non-electric', 'value' => '3'],
                    ['uid' => 'gs3clkErkfXTSgbpplTih', 'label' => 'High-tensile electrified', 'value' => '4'],
                    ['uid' => 'VEtTHPTaW6oyKNlzIwXNa', 'label' => 'Electrified polywire', 'value' => '5'],
                    ['uid' => 'k-8dG6Xp-wdmvwi3QG35d', 'label' => 'Custom', 'value' => '0'],
                ],
            ],
            'OL_mzaqHsPoS9n7kGIq-R' => [
                'name' => 'Hinged joint options',
                'uiType' => 'CHECKBOX',
                'options' => [
                    ['uid' => 'Jf5Bz7Oow0h9v6ZzdW9_C', 'label' => 'Use hinge joint wires', 'value' => '1'],
                    ['uid' => 'DUY4GU5fMSFt1nxjoPJrE', 'label' => '', 'value' => '0'],
                ],
            ],
            'rbAFXLuFKjCOJj0gL1OX5' => [
                'name' => 'Additional barbed wires',
                'uiType' => 'CHECKBOX',
                'options' => [
                    ['uid' => 'nlL6Z7fPEoXPvPfyncNgT', 'label' => 'Install additional barbed wires', 'value' => '1'],
                    ['uid' => 'swgIZu1aInsA-VZ3baaLh', 'label' => '', 'value' => '0'],
                ],
            ],
            'N0Zi4FNKS58bmhFT_KNJ1' => [
                'name' => 'Fence post material',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => '7VVQTTE9Hcga7WOy9MSpU', 'label' => 'Wood', 'value' => '1'],
                    ['uid' => 'TIcyjN7_j-2p6YinasV9Q', 'label' => 'Steel', 'value' => '2'],
                ],
            ],
            '1ygJCURxoLyYL5xPGUCw6' => [
                'name' => 'Wire spacing options',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'BI28h0EPS7WQR7lSgL1BB', 'label' => '4" (≈ 10 cm)', 'value' => '1'],
                    ['uid' => 'HeIzMgGJBL8dNpAzp9vT3', 'label' => '6" (≈ 15 cm)', 'value' => '2'],
                    ['uid' => '0JxIoe7zjJdvDUMNuCUC7', 'label' => '8" (≈ 20 cm)', 'value' => '3'],
                    ['uid' => 'B801wcE5vOStENFM0Z0b8', 'label' => '10" (≈ 25 cm)', 'value' => '4'],
                    ['uid' => '01UScp-RUlRkKSINRhU1c', 'label' => '12" (≈ 30 cm)', 'value' => '5'],
                    ['uid' => 'g-6cs1733Efp7PTdH7wnK', 'label' => '14" (≈ 35 cm)', 'value' => '6'],
                    ['uid' => '7foqcrwSxZrwWSHG5LsQV', 'label' => '16" (≈ 40 cm)', 'value' => '7'],
                    ['uid' => 'fIZmYW0H6Dsj3sCZiPZMB', 'label' => 'Enter a custom average wire spacing', 'value' => '0'],
                ],
            ],
            'zHaD6vlonOl473scWmmJK' => [
                'name' => 'Grounding quantity options',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'ZOplcg-IVnRB-qWjXvp-Q', 'label' => '1', 'value' => '1'],
                    ['uid' => 'fQR01e6aO_sb9bPLQGUuz', 'label' => '2', 'value' => '2'],
                    ['uid' => 'u9Et7Xre-ImFT8gwgy9zA', 'label' => '3', 'value' => '3'],
                    ['uid' => 'gY3axLcrd5DpeORn9cSJs', 'label' => 'Enter a custom number of grounding rods', 'value' => '0'],
                ],
            ],
            'SiV40zqnVngpDxVx7qfLE' => [
                'name' => 'Additional barbed wire runs',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => '03Dkoz6XR6rvm4HUGRpjA', 'label' => '1', 'value' => '1'],
                    ['uid' => 'UVkF4ypGwPnPRSUCKp1L5', 'label' => '2', 'value' => '2'],
                    ['uid' => 'SlVrLfgexQIKffEQk9kgu', 'label' => '3', 'value' => '3'],
                ],
            ],
            'xKMESqRB6l2FAoWdwyps_' => [
                'name' => 'Include labor cost',
                'uiType' => 'CHECKBOX',
                'options' => [
                    ['uid' => '50yzPbigHtyYKTWG6IlFm', 'label' => 'Include labor cost', 'value' => '1'],
                    ['uid' => '1rk3pobDGczBz0EL1MJnD', 'label' => '', 'value' => '0'],
                ],
            ],
            'bjpj8xMEQqu1E1Wms0-Qd' => [
                'name' => 'Concrete footing options',
                'uiType' => 'CHECKBOX',
                'options' => [
                    ['uid' => 'NXHZor67O4WrehXX8PH3i', 'label' => 'Add concrete footing for the posts', 'value' => '1'],
                    ['uid' => 'dvPGD2qVbL78ndvPrAkty', 'label' => '', 'value' => '0'],
                ],
            ],
            'L1tor7bPCDbeb1X83_twL' => [
                'name' => 'Stays options',
                'uiType' => 'CHECKBOX',
                'options' => [
                    ['uid' => 'pIaplX4wYVwL8pMK9yvOq', 'label' => 'Use fence stays', 'value' => '1'],
                    ['uid' => 'VdN74IKMDfBnp5oa2b6hW', 'label' => '', 'value' => '0'],
                ],
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Fence type, ✔️ Length and ✔️ Height into Livestock fence cost and the answer comes back as 8" Wood end posts needed and ✔️ 8" Wood post unit price. It is a single relationship that reads 8" Wood end posts needed out of Fence type, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Livestock fence cost calculator works', 'html' => <<<'TXT'
            <p>Livestock fence cost answers one question from 83 numbers, and the answer is 8&quot; Wood end posts needed, ✔️ 8&quot; Wood post unit price and ✔️ Average barbed wire spacing.</p><p>The relationship it solves reads 8&quot; Wood posts total cost = (8&quot; Wood end posts needed × ✔️ 8&quot; Wood post unit price).</p><p>The answers are 8&quot; Wood end posts needed, ✔️ 8&quot; Wood post unit price, ✔️ Average barbed wire spacing and ✔️ Barbed wire price per roll; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 83 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Fence type</strong> — a plain number, no unit. What type of fence are you interested in constructing?</li><li><strong>✔️ Length</strong> — in meters. Also equivalent to the perimeter of the lot you want to fence.</li><li><strong>✔️ Height</strong> — in meters</li><li><strong>✔️ Desired spacing of posts</strong> — in meters. Distance between two adjacent posts.</li><li><strong>Desired fence post material</strong> — a plain number, no unit</li><li><strong>8&quot; Wood posts total cost</strong> — in USD</li><li><strong>Fence posts needed</strong> — a plain number, no unit</li><li><strong>✔️ Fence post unit price</strong> — in USD</li><li><strong>Fence posts total cost</strong> — in USD</li><li><strong>Fiberglass posts needed</strong> — a plain number, no unit. Number of fiberglass posts needed.</li><li><strong>✔️ Fiberglass post unit price</strong> — in USD</li><li><strong>Fiberglass posts total cost</strong> — in USD</li><li><strong>✔️ Woven wire length per roll</strong> — in meters</li><li><strong>Woven wire rolls needed</strong> — a plain number, no unit</li><li><strong>✔️ Woven wire price per roll</strong> — in USD</li><li><strong>Woven wires total cost</strong> — in USD</li><li><strong>additionalBarbedWires</strong> — a plain number, no unit</li><li><strong>Average barbed wire vertical spacing</strong> — a plain number, no unit</li><li><strong>Barbed wire horizontal runs</strong> — a plain number, no unit. Number of barbed wires to run through the fence length.</li><li><strong>Number of additional barbed wire runs</strong> — a plain number, no unit</li><li><strong>✔️ Barbed wire length per roll</strong> — in meters</li><li><strong>Barbed wire rolls needed</strong> — a plain number, no unit</li><li><strong>Barbed wire rolls needed</strong> — a plain number, no unit</li><li><strong>✔️ Barbed wire price per roll</strong> — in USD</li><li><strong>Barbed wires total cost</strong> — in USD</li><li><strong>Additional barbed wire total cost</strong> — in USD</li><li><strong>High-tensile wire spacing options</strong> — a plain number, no unit</li><li><strong>High-tensile wire runs needed</strong> — a plain number, no unit. Number of high-tensile wire runs needed.</li><li><strong>High-tensile wire total length needed</strong> — in meters</li><li><strong>High-tensile wire unit price</strong> — in USD. Cost of high-tensile wires.</li><li><strong>Hight-tensile wire total cost</strong> — in USD</li><li><strong>Polywire spacing options</strong> — a plain number, no unit</li><li><strong>Polywire runs needed</strong> — a plain number, no unit</li><li><strong>Polywire length needed</strong> — in meters. Length of Polywire needed.</li><li><strong>✔️ Polywire unit price</strong> — in USD</li><li><strong>Polywire total cost</strong> — in USD</li><li><strong>Clips or staples spacing options</strong> — a plain number, no unit</li><li><strong>Clips or staples needed</strong> — a plain number, no unit</li><li><strong>Clips or staples unit price</strong> — in USD</li><li><strong>Clips or staples total cost</strong> — in USD</li><li><strong>Springs needed</strong> — a plain number, no unit. Number of springs needed.</li><li><strong>✔️ Spring unit price</strong> — in USD</li><li><strong>Springs total cost</strong> — in USD</li><li><strong>Strainers needed</strong> — a plain number, no unit. Number of wire strainers needed.</li><li><strong>✔️ Strainer unit price</strong> — in USD</li><li><strong>Strainers total cost</strong> — in USD</li><li><strong>Clips for fiberglass posts</strong> — a plain number, no unit</li><li><strong>✔️ Clips for fiberglass posts unit price</strong> — in USD</li><li><strong>Clips for fiberglass posts total cost</strong> — in USD</li><li><strong>useStaysOptions</strong> — a plain number, no unit</li><li><strong>Horizontal stays spacing</strong> — in centimeters</li><li><strong>✔️ Fence stays needed</strong> — a plain number, no unit. Number of fence stays needed.</li><li><strong>Stays total cost</strong> — in USD</li><li><strong>useHingeJointOptions</strong> — a plain number, no unit. Are you using hinge joint wires?</li><li><strong>✔️ Hinge joint wire length per roll</strong> — in meters</li><li><strong>Hinge joint needed</strong> — a plain number, no unit</li><li><strong>Hinge joint total cost</strong> — in USD</li><li><strong>✔️ Number of electrified wires needed</strong> — a plain number, no unit</li><li><strong>Energizer capacity needed</strong> — in meters. Recommended capacity of energizer needed for the fence length.</li><li><strong>✔️ Energizer unit price</strong> — in USD. Total cost of Energizer required</li><li><strong>Energizer total cost</strong> — in USD</li><li><strong>Grounding or lightning rods needed</strong> — a plain number, no unit</li><li><strong>✔️ Grounding or lightning rod unit price</strong> — in USD</li><li><strong>Grounding or lightning rods total cost</strong> — in USD</li><li><strong>✔️ Cut-out switch needed</strong> — a plain number, no unit</li><li><strong>✔️ Cut-out switch unit price</strong> — in USD</li><li><strong>Cut-out switch total cost</strong> — in USD</li><li><strong>addConcreteFootingOptions</strong> — a plain number, no unit</li><li><strong>Concrete total cost</strong> — in USD</li><li><strong>includeLaborCostOptions</strong> — a plain number, no unit</li><li><strong>Labor total cost</strong> — in USD</li><li><strong>💲 Total cost</strong> — in USD</li><li><strong>💲 Total cost</strong> — in USD</li><li><strong>💲 Total cost</strong> — in USD</li><li><strong>💲 Total cost</strong> — in USD</li><li><strong>💲 Total cost</strong> — in USD</li><li><strong>💲 Total cost</strong> — in USD</li><li><strong>📏 Total cost per unit length</strong> — in USD</li><li><strong>📏 Total cost per unit length</strong> — in USD</li><li><strong>📏 Total cost per unit length</strong> — in USD</li><li><strong>📏 Total cost per unit length</strong> — in USD</li><li><strong>📏 Total cost per unit length</strong> — in USD</li><li><strong>📏 Total cost per unit length</strong> — in USD</li></ul><p>What you get back is 8&quot; Wood end posts needed, ✔️ 8&quot; Wood post unit price in USD, ✔️ Average barbed wire spacing in centimeters, ✔️ Barbed wire price per roll in USD, ✔️ Average high-tensile wire spacing in centimeters, ✔️ Average polywire spacing in centimeters, Clips or staples vertical spacing in centimeters, ✔️ Fence stay unit price in USD, ✔️ Hinge joint wire price per roll in USD, ✔️ Your desired number of grounding or lightning rods, ✔️ Concrete volume needed in cubic meters, ✔️ Concrete price per unit volume in USD, ✔️ Estimated labor hours, ✔️ Labor cost per unit time in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Fence type = 1, ✔️ Length = 30 m, ✔️ Height = 1.2 m, ✔️ Desired spacing of posts = 2.5 m, Desired fence post material = 1, ✔️ Fence post unit price = 6 USD, ✔️ Fiberglass post unit price = 7 USD, ✔️ Woven wire length per roll = 10 m, ✔️ Woven wire price per roll = 9 USD, additionalBarbedWires = 0, Average barbed wire vertical spacing = 3, Number of additional barbed wire runs = 1, ✔️ Barbed wire length per roll = 10 m, ✔️ Barbed wire price per roll = 2 USD, High-tensile wire spacing options = 2, High-tensile wire unit price = 3 USD, Polywire spacing options = 5, ✔️ Polywire unit price = 4 USD, Clips or staples spacing options = 1, Clips or staples unit price = 5 USD, ✔️ Spring unit price = 6 USD, ✔️ Strainer unit price = 7 USD, ✔️ Clips for fiberglass posts unit price = 8 USD, useStaysOptions = 0, Horizontal stays spacing = 45 cm, useHingeJointOptions = 0, ✔️ Hinge joint wire length per roll = 10 m, ✔️ Number of electrified wires needed = 1, ✔️ Energizer unit price = 3 USD, Grounding or lightning rods needed = 3, ✔️ Grounding or lightning rod unit price = 4 USD, ✔️ Cut-out switch needed = 1, ✔️ Cut-out switch unit price = 6 USD, addConcreteFootingOptions = 0 and includeLaborCostOptions = 0 — through the same formula and the panel reports &lt;strong&gt;8&amp;quot; Wood posts total cost&lt;/strong&gt; = 0 USD, &lt;strong&gt;Fence posts needed&lt;/strong&gt; = 0, &lt;strong&gt;Fence posts total cost&lt;/strong&gt; = 0 USD, &lt;strong&gt;Fiberglass posts needed&lt;/strong&gt; = 11, &lt;strong&gt;Fiberglass posts total cost&lt;/strong&gt; = 77 USD, &lt;strong&gt;Woven wire rolls needed&lt;/strong&gt; = 3, &lt;strong&gt;Woven wires total cost&lt;/strong&gt; = 27 USD, &lt;strong&gt;✔️ Fence stays needed&lt;/strong&gt; = 1, &lt;strong&gt;Stays total cost&lt;/strong&gt; = 0 USD, &lt;strong&gt;Hinge joint needed&lt;/strong&gt; = 0, &lt;strong&gt;Hinge joint total cost&lt;/strong&gt; = 0 USD, &lt;strong&gt;Energizer capacity needed&lt;/strong&gt; = 37.5 m, &lt;strong&gt;Energizer total cost&lt;/strong&gt; = 113 USD, &lt;strong&gt;Cut-out switch total cost&lt;/strong&gt; = 6 USD, &lt;strong&gt;Grounding or lightning rods total cost&lt;/strong&gt; = 0 USD, &lt;strong&gt;Concrete total cost&lt;/strong&gt; = 0 USD, &lt;strong&gt;Labor total cost&lt;/strong&gt; = 0 USD, &lt;strong&gt;Barbed wire rolls needed&lt;/strong&gt; = 3 and &lt;strong&gt;Additional barbed wire total cost&lt;/strong&gt; = 0 USD.</p><ul><li><strong>8&quot; Wood posts total cost</strong> = 0 USD</li><li><strong>Fence posts needed</strong> = 0</li><li><strong>Fence posts total cost</strong> = 0 USD</li><li><strong>Fiberglass posts needed</strong> = 11</li><li><strong>Fiberglass posts total cost</strong> = 77 USD</li><li><strong>Woven wire rolls needed</strong> = 3</li><li><strong>Woven wires total cost</strong> = 27 USD</li><li><strong>✔️ Fence stays needed</strong> = 1</li><li><strong>Stays total cost</strong> = 0 USD</li><li><strong>Hinge joint needed</strong> = 0</li><li><strong>Hinge joint total cost</strong> = 0 USD</li><li><strong>Energizer capacity needed</strong> = 37.5 m</li><li><strong>Energizer total cost</strong> = 113 USD</li><li><strong>Cut-out switch total cost</strong> = 6 USD</li><li><strong>Grounding or lightning rods total cost</strong> = 0 USD</li><li><strong>Concrete total cost</strong> = 0 USD</li><li><strong>Labor total cost</strong> = 0 USD</li><li><strong>Barbed wire rolls needed</strong> = 3</li><li><strong>Additional barbed wire total cost</strong> = 0 USD</li></ul><p>That is <strong>8&quot; Wood posts total cost</strong> = <code>(8&quot; Wood end posts needed × ✔️ 8&quot; Wood post unit price)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;8&amp;quot; Wood posts total cost&lt;/strong&gt; = 0, &lt;strong&gt;Fence posts needed&lt;/strong&gt; = 0, &lt;strong&gt;Fence posts total cost&lt;/strong&gt; = 0, &lt;strong&gt;Fiberglass posts needed&lt;/strong&gt; = 11, &lt;strong&gt;Fiberglass posts total cost&lt;/strong&gt; = 77, &lt;strong&gt;Woven wire rolls needed&lt;/strong&gt; = 3, &lt;strong&gt;Woven wires total cost&lt;/strong&gt; = 27, &lt;strong&gt;✔️ Fence stays needed&lt;/strong&gt; = 1, &lt;strong&gt;Stays total cost&lt;/strong&gt; = 0, &lt;strong&gt;Hinge joint needed&lt;/strong&gt; = 0, &lt;strong&gt;Hinge joint total cost&lt;/strong&gt; = 0, &lt;strong&gt;Energizer capacity needed&lt;/strong&gt; = 37.5, &lt;strong&gt;Energizer total cost&lt;/strong&gt; = 113, &lt;strong&gt;Cut-out switch total cost&lt;/strong&gt; = 6, &lt;strong&gt;Grounding or lightning rods total cost&lt;/strong&gt; = 0, &lt;strong&gt;Concrete total cost&lt;/strong&gt; = 0, &lt;strong&gt;Labor total cost&lt;/strong&gt; = 0, &lt;strong&gt;Barbed wire rolls needed&lt;/strong&gt; = 3 and &lt;strong&gt;Additional barbed wire total cost&lt;/strong&gt; = 0. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on ✔️ Average barbed wire spacing lists 31 options and opens on centimeters. </p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>8&quot; Wood posts total cost</strong> = <code>(8&quot; Wood end posts needed × ✔️ 8&quot; Wood post unit price)</code></li><li><strong>Fiberglass posts needed</strong> = <code>floor(✔️ Length ÷ ✔️ Desired spacing of posts) − 1</code></li><li><strong>Fiberglass posts total cost</strong> = <code>(✔️ Fiberglass post unit price × (floor(✔️ Length ÷ ✔️ Desired spacing of posts) − 1))</code></li><li><strong>Woven wire rolls needed</strong> = <code>ceil(✔️ Length ÷ ✔️ Woven wire length per roll)</code></li><li><strong>Woven wires total cost</strong> = <code>(✔️ Woven wire price per roll × ceil(✔️ Length ÷ ✔️ Woven wire length per roll))</code></li><li><strong>Barbed wire horizontal runs</strong> = <code>floor(12 × ✔️ Height ÷ ✔️ Average barbed wire spacing)</code></li></ul><p>Any one of 8&quot; Wood posts total cost, Fence posts needed and Fence posts total cost can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Fence type from 1 to 2, leaving every other box alone. The panel moves from &lt;strong&gt;8&amp;quot; Wood posts total cost&lt;/strong&gt; 0 USD, &lt;strong&gt;Fence posts needed&lt;/strong&gt; 0, &lt;strong&gt;Fence posts total cost&lt;/strong&gt; 0 USD, &lt;strong&gt;Fiberglass posts needed&lt;/strong&gt; 11, &lt;strong&gt;Fiberglass posts total cost&lt;/strong&gt; 77 USD, &lt;strong&gt;Woven wire rolls needed&lt;/strong&gt; 3, &lt;strong&gt;Woven wires total cost&lt;/strong&gt; 27 USD, &lt;strong&gt;✔️ Fence stays needed&lt;/strong&gt; 1, &lt;strong&gt;Stays total cost&lt;/strong&gt; 0 USD, &lt;strong&gt;Hinge joint needed&lt;/strong&gt; 0, &lt;strong&gt;Hinge joint total cost&lt;/strong&gt; 0 USD, &lt;strong&gt;Energizer capacity needed&lt;/strong&gt; 37.5 m, &lt;strong&gt;Energizer total cost&lt;/strong&gt; 113 USD, &lt;strong&gt;Cut-out switch total cost&lt;/strong&gt; 6 USD, &lt;strong&gt;Grounding or lightning rods total cost&lt;/strong&gt; 0 USD, &lt;strong&gt;Concrete total cost&lt;/strong&gt; 0 USD, &lt;strong&gt;Labor total cost&lt;/strong&gt; 0 USD, &lt;strong&gt;Barbed wire rolls needed&lt;/strong&gt; 3 and &lt;strong&gt;Additional barbed wire total cost&lt;/strong&gt; 0 USD to &lt;strong&gt;8&amp;quot; Wood posts total cost&lt;/strong&gt; 0 USD, &lt;strong&gt;Fence posts needed&lt;/strong&gt; 0, &lt;strong&gt;Fence posts total cost&lt;/strong&gt; 0 USD, &lt;strong&gt;Fiberglass posts needed&lt;/strong&gt; 11, &lt;strong&gt;Fiberglass posts total cost&lt;/strong&gt; 77 USD, &lt;strong&gt;Woven wire rolls needed&lt;/strong&gt; 3, &lt;strong&gt;Woven wires total cost&lt;/strong&gt; 27 USD, &lt;strong&gt;✔️ Fence stays needed&lt;/strong&gt; 1, &lt;strong&gt;Stays total cost&lt;/strong&gt; 0 USD, &lt;strong&gt;Hinge joint needed&lt;/strong&gt; 0, &lt;strong&gt;Hinge joint total cost&lt;/strong&gt; 0 USD, &lt;strong&gt;Energizer capacity needed&lt;/strong&gt; 37.5 m, &lt;strong&gt;Energizer total cost&lt;/strong&gt; 113 USD, &lt;strong&gt;Cut-out switch total cost&lt;/strong&gt; 6 USD, &lt;strong&gt;Grounding or lightning rods total cost&lt;/strong&gt; 0 USD, &lt;strong&gt;Concrete total cost&lt;/strong&gt; 0 USD, &lt;strong&gt;Labor total cost&lt;/strong&gt; 0 USD, &lt;strong&gt;Barbed wire rolls needed&lt;/strong&gt; 3 and &lt;strong&gt;Additional barbed wire total cost&lt;/strong&gt; 0 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> ✔️ Length, ✔️ Height and ✔️ Desired spacing of posts carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> 8&quot; Wood end posts needed, ✔️ 8&quot; Wood post unit price and ✔️ Average barbed wire spacing are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Fence type and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Fence type, ✔️ Length and ✔️ Height is what you already know and 8&quot; Wood end posts needed and ✔️ 8&quot; Wood post unit price is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/allometric-equation">Allometric Equation Calculator</a>, <a href="/biology/amino-acid-composition">Amino Acid Composition Calculator</a> and <a href="/biology/animal-mortality-rate">Animal mortality rate</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Livestock fence cost calculator work out?', 'a' => <<<'TXT'
            8" Wood end posts needed, ✔️ 8" Wood post unit price, ✔️ Average barbed wire spacing and ✔️ Barbed wire price per roll, from 8" Wood end posts needed and ✔️ 8" Wood post unit price. The relationship is 8" Wood posts total cost = (8" Wood end posts needed × ✔️ 8" Wood post unit price).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Fence type, ✔️ Length (meters), ✔️ Height (meters), ✔️ Desired spacing of posts (meters), Desired fence post material. Enter fenceType, fenceLength and fenceHeight; 8" Wood end posts needed is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of 8" Wood posts total cost, Fence posts needed, Fence posts total cost and Fiberglass posts needed blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            8" Wood posts total cost = 0 USD, Fence posts needed = 0, Fence posts total cost = 0 USD, Fiberglass posts needed = 11, Fiberglass posts total cost = 77 USD, Woven wire rolls needed = 3, Woven wires total cost = 27 USD, ✔️ Fence stays needed = 1, Stays total cost = 0 USD, Hinge joint needed = 0, Hinge joint total cost = 0 USD, Energizer capacity needed = 37.5 m, Energizer total cost = 113 USD, Cut-out switch total cost = 6 USD, Grounding or lightning rods total cost = 0 USD, Concrete total cost = 0 USD, Labor total cost = 0 USD, Barbed wire rolls needed = 3 and Additional barbed wire total cost = 0 USD. That comes from the page's own defaults, entered in Fence type; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            8" Wood end posts needed is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Fence type left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of 8" Wood end posts needed keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/allometric-equation', 'name' => 'Allometric Equation Calculator'],
            ['path' => '/biology/amino-acid-composition', 'name' => 'Amino Acid Composition Calculator'],
            ['path' => '/biology/animal-mortality-rate', 'name' => 'Animal mortality rate'],
        ],
        'authors' => [],
    ],
];
