<?php

/**
 * Chilled drink
 * /food/chilled-drink
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Chilled drink',
    'meta' => ['title' => 'Chilled drink Calculator — Formula & Results', 'description' => 'Estimate how long a drink may take to cool from its starting temperature, container and cooling method. Check units and follow the recipe or package directions.', 'h1' => 'Chilled drink Calculator', 'updated' => '2026-07-28'],
    'raw' => [
        'vars' => [
            'alcohol_content' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'ambient_temperature' => [
                'type' => 'dependent',
                'rnd' => ['standard', '1'],
            ],
            'ambient_temperature_VS' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => '-4rk2TGEwxxid0XcJMiBg', 'c' => null],
                ],
                'ds' => 'qfqlzEgpromCBL2-PtQtp',
            ],
            'area_beer' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'area_juice' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'area_soft_drinks' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'area_spirit' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'area_water' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'area_wine' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'conductivity_beer' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'conductivity_juice' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'conductivity_soft_drinks' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'conductivity_spirit' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'conductivity_water' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'conductivity_wine' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'container_type_beer_VS' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => '-1Y79IslId0f14rTdbZ-L', 'c' => null],
                ],
                'ds' => 'pKa0En_RCyA6yGaxSCg6p',
            ],
            'container_type_soft_or_juice_VS' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => '_H8SG_wJSj-0MD4PpDE1q', 'c' => null],
                ],
                'ds' => '8xo3KV7i-zct50I4a0poa',
            ],
            'container_type_spirit_VS' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'X_NYdSmcG6reUPKDu2Dyd', 'c' => null],
                ],
                'ds' => 'TvDAoj2R08kLJaVrpiGUk',
            ],
            'container_type_water_VS' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'dGiYTG55FbnLQB8DG3nPP', 'c' => null],
                ],
                'ds' => '_S9DGEnTa89TGW89xYwMj',
            ],
            'container_type_wine_VS' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'kaGNhFl79VFUmnxZnHjNf', 'c' => null],
                ],
                'ds' => 'pc2dCPjDpNf5cBn9dI9EA',
            ],
            'desired_temperature_beer_VS' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => '8GVsZNRopC8XIA23GdT8W', 'c' => null],
                ],
                'ds' => '_JRK0SPE4fgAbL9cLd_dV',
            ],
            'desired_temperature_juice_VS' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'noA7hkjMqCLy3Sp4XDF8H', 'c' => null],
                ],
                'ds' => 'RNOFV8KxjvLFls14uaGYk',
            ],
            'desired_temperature_soft_drinks_VS' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'l6Ctq-HnSdA_eitkQERPZ', 'c' => null],
                ],
                'ds' => 'xDkpDhQ30i4ZvPYcTEORp',
            ],
            'desired_temperature_spirit_VS' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'yFGV7IF-_dNJgKYla8W9U', 'c' => null],
                ],
                'ds' => 'HLp8v4KNSrbPJ7FOcXn-1',
            ],
            'desired_temperature_water_VS' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'YtM39BY8A1C3o4ZPq5EB9', 'c' => null],
                ],
                'ds' => 'buMo7rO44hRgPazwfX90V',
            ],
            'desired_temperature_wine_VS' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'TNMV89u_xGsTRslmVIyPN', 'c' => null],
                ],
                'ds' => 'SGC12GxWXLjo82bhR2oV-',
            ],
            'drink_type_VS' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'f0r0n684Z9392fZZsOWTw', 'c' => null],
                ],
                'ds' => 'BwT-AfkvmAcJvYLWDCO9W',
            ],
            'final_temperature_beer' => [
                'type' => 'dependent',
                'rnd' => ['standard', '1'],
            ],
            'final_temperature_juice' => [
                'type' => 'dependent',
                'rnd' => ['standard', '1'],
            ],
            'final_temperature_soft_drinks' => [
                'type' => 'dependent',
                'rnd' => ['standard', '1'],
            ],
            'final_temperature_spirit' => [
                'type' => 'dependent',
                'rnd' => ['standard', '1'],
            ],
            'final_temperature_water' => [
                'type' => 'dependent',
                'rnd' => ['standard', '1'],
            ],
            'final_temperature_wine' => [
                'type' => 'dependent',
                'rnd' => ['standard', '1'],
            ],
            'heat_transfer_coefficient_outside' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'initial_temperature' => [
                'type' => 'dependent',
                'rnd' => ['standard', '1'],
            ],
            'initial_temperature_VS' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'TgYhxdvx7tV_T8nOIdGJL', 'c' => null],
                ],
                'ds' => 'c09WXqmnMgtJOsK6JTWzn',
            ],
            'thickness_beer' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'thickness_juice' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'thickness_soft_drinks' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'thickness_spirit' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'thickness_water' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'thickness_wine' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'time_hours_beer' => [
                'type' => 'presentation',
                'rnd' => ['standard', '0'],
            ],
            'time_hours_juice' => [
                'type' => 'presentation',
                'rnd' => ['standard', '0'],
            ],
            'time_hours_soft_drinks' => [
                'type' => 'presentation',
                'rnd' => ['standard', '0'],
            ],
            'time_hours_spirit' => [
                'type' => 'presentation',
                'rnd' => ['standard', '0'],
            ],
            'time_hours_water' => [
                'type' => 'presentation',
                'rnd' => ['standard', '0'],
            ],
            'time_hours_wine' => [
                'type' => 'presentation',
                'rnd' => ['standard', '0'],
            ],
            'time_minutes_beer' => [
                'type' => 'presentation',
                'rnd' => ['standard', '0'],
            ],
            'time_minutes_juice' => [
                'type' => 'presentation',
                'rnd' => ['standard', '0'],
            ],
            'time_minutes_soft_drinks' => [
                'type' => 'presentation',
                'rnd' => ['standard', '0'],
            ],
            'time_minutes_spirit' => [
                'type' => 'presentation',
                'rnd' => ['standard', '0'],
            ],
            'time_minutes_water' => [
                'type' => 'presentation',
                'rnd' => ['standard', '0'],
            ],
            'time_minutes_wine' => [
                'type' => 'presentation',
                'rnd' => ['standard', '0'],
            ],
            'volume_beer' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'volume_juice' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'volume_soft_drinks' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'volume_spirit' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'volume_water' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'volume_wine' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'custom_initial_C' => ['type' => 'numerical', 'label' => 'Initial temperature, only if you chose Custom (°C)'],
            'custom_ambient_C' => ['type' => 'numerical', 'label' => 'Ambient temperature, only if you chose Custom (°C)'],
            'custom_desired_C' => ['type' => 'numerical', 'label' => 'Drinking temperature, only if you chose Custom (°C)'],
            'cool_minutes' => [
                'type' => 'dependent',
                'rnd' => ['standard', '0'],
            ],
            'cool_minutes_water' => [
                'type' => 'dependent',
                'rnd' => ['standard', '0'],
            ],
            'volume_litres' => [
                'type' => 'dependent',
                'rnd' => ['standard', '2'],
            ],
            'tau_minutes' => [
                'type' => 'dependent',
                'rnd' => ['standard', '1'],
            ],
            'warm_minutes' => [
                'type' => 'dependent',
                'rnd' => ['standard', '0'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'OgbRROlaHBwLy8b5r6Yjd',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'drink_type_VS',
                                    'vt' => 'valueSelect',
                                    'l' => 'What do you want to cool?',
                                    'ds' => 'BwT-AfkvmAcJvYLWDCO9W',
                                    'opts' => [
                                        ['f0r0n684Z9392fZZsOWTw', 'Water', '0'],
                                        ['3lkfjredpqeJBx_9wsXid', 'Soft drinks', '0'],
                                        ['hsj91aG9S7hkHwAYbGufm', 'Iced coffee / Juice / Tea', '0'],
                                        ['oaTtiKzOmpoVXsv7fRZml', 'Wine', '13.5'],
                                        ['GjWvogW9l8lhiy2sdwOEn', 'Beer', '6'],
                                        ['5hx91BRGC9WDmLs8tVsC0', 'Spirit', '40'],
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
                                    'n' => 'container_type_water_VS',
                                    'vt' => 'valueSelect',
                                    'l' => 'Bottle/Container',
                                    'ds' => '_S9DGEnTa89TGW89xYwMj',
                                    'opts' => [
                                        ['m2CBquA3Hv6i01JPgpJ5s', 'Magnum Glass Bottle (1.5L)', '0.0015'],
                                        ['yKacuNbCtqu71Tj-RnCTQ', 'Standard wine glass bottle (0.75L)', '0.00075'],
                                        ['iTpikX9SpUnP3syRy1Xmq', 'Glass bottle (16.9 oz / 0.5L)', '0.0005'],
                                        ['S0A98Sd_ntfedqxuTKbcb', 'Small glass bottle (8.5 oz / 0.25L)', '0.00025'],
                                        ['ilHbwj7OMQ7MEJJLdmabm', 'Demi/Half glass bottle (0.375L)', '0.000375'],
                                        ['W8ghGpkm1xkBIDmC8fSYa', 'Spirit Glass Bottle (0.7L)', '0.0007'],
                                        ['6mXAEwxbGgJyT_gkYNXaA', 'Europe Big Can (0.5L)', '0.0005'],
                                        ['inWRpSXU5vEdMh45dNaOW', 'European Standard can (330 ml)', '0.00033'],
                                        ['Bf74vOjF6VqoVWE0y1aVy', 'US Standard can (12 oz)', '0.000355'],
                                        ['k8alJy4TS-AR36URKTE6w', 'US Tall boy can (16 oz)', '0.000473'],
                                        ['2FSb6ya6BXy8RF4KDyh9U', 'US Tall boy can (24 oz)', '0.00071'],
                                        ['esikHf3mwSY_3QZC8EwOV', 'AU Standard can (375 ml / 13.2 oz)', '0.000375'],
                                        ['I1kRcLxGuDKoBj9-P4j12', 'Big plastic bottle (50.7 oz / 1.5L)', '0.0015'],
                                        ['ov8_vZH94JO4cS8EcVzj5', 'Standard plastic bottle (33.8 oz / 1L)', '0.001'],
                                        ['dGiYTG55FbnLQB8DG3nPP', 'Medium plastic bottle (16.9 oz / 0.5L)', '0.0005'],
                                        ['4H-MjfMxZbNIYgPPWIgfc', 'Small plastic bottle (8.5 oz / 0.25L)', '0.00025'],
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
                                    'n' => 'container_type_soft_or_juice_VS',
                                    'vt' => 'valueSelect',
                                    'l' => 'Bottle/Container',
                                    'ds' => '8xo3KV7i-zct50I4a0poa',
                                    'opts' => [
                                        ['22zaqUqDsqCYCfBuWpHWR', 'Glass bottle (16.9 oz / 0.5L)', '0.0005'],
                                        ['nFzZ-nVNrtF_puMI7kgFa', 'Small glass bottle (8.5 oz / 0.25L)', '0.00025'],
                                        ['KiwvL6DDY5n_Ffk4bAGiW', 'European Big can (0.5L)', '0.0005'],
                                        ['JSZvbRX38hgW_mFRQNp8K', 'European Standard can (330 ml)', '0.00033'],
                                        ['fu4IAhiJwcnqbnQ1p3L7l', 'US Standard can (12 oz)', '0.000355'],
                                        ['ZGKXKJJUrG5_Z6rB-Qulp', 'US Tall boy can (16 oz)', '0.000473'],
                                        ['IvDX19x_DXx8OaWVLPlcK', 'US Tall boy can (24 oz)', '0.00071'],
                                        ['sX3kVT9ZK91fNMH4Dzsmy', 'AU Standard can (375 ml, 13.2 oz)', '0.000375'],
                                        ['vjWUcsjw9V1XKUe8EBZ8b', 'Big plastic bottle (67.6 oz / 2L)', '0.002'],
                                        ['v7n1Cs3YdDYDVvBeLblDG', 'Plastic bottle (50.7 oz / 1.5L)', '0.0015'],
                                        ['Y8CTxSO3RQuBtfu385Md3', 'Standard plastic bottle (33.8 oz / 1L)', '0.001'],
                                        ['_H8SG_wJSj-0MD4PpDE1q', 'Medium plastic bottle (16.9 oz / 0.5L)', '0.0005'],
                                        ['Z9usXPNkAqnu2zjliYxob', 'Small plastic bottle (8.5 oz / 0.25L)', '0.00025'],
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
                                    'n' => 'container_type_wine_VS',
                                    'vt' => 'valueSelect',
                                    'l' => 'Bottle/Container',
                                    'ds' => 'pc2dCPjDpNf5cBn9dI9EA',
                                    'opts' => [
                                        ['Hcs-rNCkqS6YgHbcwfuIo', 'Magnum Glass Bottle (1.5L)', '0.0015'],
                                        ['kaGNhFl79VFUmnxZnHjNf', 'Standard wine glass bottle (0.75L)', '0.00075'],
                                        ['qznjPMoxyFwbln5sGRy4f', 'Demi/Half glass bottle (0.375L)', '0.000375'],
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
                                    'n' => 'container_type_beer_VS',
                                    'vt' => 'valueSelect',
                                    'l' => 'Bottle/Container',
                                    'ds' => 'pKa0En_RCyA6yGaxSCg6p',
                                    'opts' => [
                                        ['-1Y79IslId0f14rTdbZ-L', 'Glass bottle (16.9 oz / 0.5L)', '0.0005'],
                                        ['YeDjvSt4pkEJf18OXm2AR', 'Small glass bottle (8.5 oz / 0.25L)', '0.00025'],
                                        ['SrXrPHm6siimPByEF9PKO', 'European Big can (0.5L)', '0.0005'],
                                        ['9EPk8tn4ucUWGCwTtjvZQ', 'European Standard can (330 ml)', '0.00033'],
                                        ['-IJ3dS-t34yIcFmCqiLCC', 'US Standard can (12 oz)', '0.000355'],
                                        ['dP5IREQ2k-i373YGqIDqa', 'US Tall boy can (16 oz)', '0.000473'],
                                        ['QX9j5R-1TgaQIq2WozC9C', 'US Tall boy can (24 oz)', '0.00071'],
                                        ['5ZotsjACuy9WgoDrObTje', 'CA standard bottle (340 ml / 12 oz)', '0.00034'],
                                        ['yNzLNK77QUPcqDUbLZK1E', 'AU Standard can (375 ml / 13.2 oz)', '0.000375'],
                                        ['WEP8A1tEX1PkDM_jxBJNu', 'AU Throwdown bottle (250 ml / 8.5 oz)', '0.00025'],
                                        ['AuwBa4S9YvVVI7yKpfqy1', 'AU Stubby bottle (375 ml / 13.2 oz)', '0.000375'],
                                        ['0Wix9HZj0Iba5QSQ6C_LH', 'AU Long Neck bottle (750 ml / 26.4 oz)', '0.00075'],
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
                                    'n' => 'container_type_spirit_VS',
                                    'vt' => 'valueSelect',
                                    'l' => 'Bottle/Container',
                                    'ds' => 'TvDAoj2R08kLJaVrpiGUk',
                                    'opts' => [
                                        ['X_NYdSmcG6reUPKDu2Dyd', 'Spirit Glass Bottle (0.7L)', '0.0007'],
                                        ['x3q91dEGDQQX2f4r-jGzT', 'Jagermeister Square Bottle (0.75L)', '0.00075'],
                                        ['pFEev-iQhO1x_8XzOkvJs', 'Glass bottle (16.9 oz / 0.5L)', '0.0005'],
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
                                    'n' => 'initial_temperature_VS',
                                    'vt' => 'valueSelect',
                                    'l' => 'Where was the drink?',
                                    'ds' => 'c09WXqmnMgtJOsK6JTWzn',
                                    'opts' => [
                                        ['TgYhxdvx7tV_T8nOIdGJL', 'Hot summer day (30 °C/86 °F)', '303.15'],
                                        ['AEtXE_BXIH2pmKigKWxZ6', 'Cloudy day (20 °C/68 °F)', '293.15'],
                                        ['WQc9sliORWE4KNOswaGqi', 'Room temperature (16.5 °C/61.7 °F)', '289.65'],
                                        ['QLj42XfD6UCLMhuApAPY_', 'Custom', ''],
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
                                    'n' => 'initial_temperature',
                                    'vt' => 'dependent',
                                    'l' => 'Initial temperature',
                                    'us' => '40',
                                    'du' => 'C',
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
                                    'n' => 'ambient_temperature_VS',
                                    'vt' => 'valueSelect',
                                    'l' => 'Where did you put the drink?',
                                    'ds' => 'qfqlzEgpromCBL2-PtQtp',
                                    'opts' => [
                                        ['Hjo-cXsCNEDbD9LXMzP68', 'Fridge (4 °C/39 °F)', '277.15'],
                                        ['-4rk2TGEwxxid0XcJMiBg', 'Freezer (-18 °C/-0.4 °F)', '255.15'],
                                        ['FNDUDfW1DdN1Uxs0sCTWl', 'Wine cellar/basement (15 °C/59 °F)', '288.15'],
                                        ['OkOUbcXDKaDrsHZbh5QEr', 'Ice bath (0 °C/32 °F)', '273.15'],
                                        ['h4eQ9uJAPi-foPgTosL4v', 'Ice + salt bath [10%] (-6 °C/21 °F)', '267.15'],
                                        ['tkELYd16x3l_hCCun6BlD', 'Custom (air)', ''],
                                        ['Tt6pAuqubfjhKwKgUWFNa', 'Custom (water)', ''],
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
                                    'n' => 'ambient_temperature',
                                    'vt' => 'dependent',
                                    'l' => 'Ambient temperature',
                                    'us' => '40',
                                    'du' => 'C',
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
                                    'n' => 'desired_temperature_water_VS',
                                    'vt' => 'valueSelect',
                                    'l' => 'Desired temperature',
                                    'h' => 'By default it is temperature set out in the calculator text, feel free to change it according to your preference.',
                                    'ds' => 'buMo7rO44hRgPazwfX90V',
                                    'opts' => [
                                        ['b6ciKL5JVnJT76k5O_Jm0', 'Warm (22 °C/72 °F)', '295.15'],
                                        ['3z8JmILHJmLZp9a0Yhw7M', 'Optimal for hydration (16 °C/61 °F)', '289.15'],
                                        ['YtM39BY8A1C3o4ZPq5EB9', 'Refreshing (6 °C/43 °F)', '279.15'],
                                        ['EWqVseZmHML17l0AEd-U5', 'Very cold (2 °C/36 °F)', '275.15'],
                                        ['uSsItf7S9wBToIErgV_ZY', 'Custom', ''],
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
                                    'n' => 'desired_temperature_soft_drinks_VS',
                                    'vt' => 'valueSelect',
                                    'l' => 'Desired temperature',
                                    'h' => 'By default it is temperature set out in the calculator text, feel free to change it according to your preference.',
                                    'ds' => 'xDkpDhQ30i4ZvPYcTEORp',
                                    'opts' => [
                                        ['l6Ctq-HnSdA_eitkQERPZ', 'Optimal (4.5 °C/40 °F)', '277.65'],
                                        ['uAWefkUTIYpVDD9fDTIuP', 'Very cold (2 °C/36 °F)', '275.15'],
                                        ['zrbKbdraRZC6wcgTY6inj', 'Custom', ''],
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
                                    'n' => 'desired_temperature_juice_VS',
                                    'vt' => 'valueSelect',
                                    'l' => 'Desired temperature',
                                    'h' => 'By default it is temperature set out in the calculator text, feel free to change it according to your preference.',
                                    'ds' => 'RNOFV8KxjvLFls14uaGYk',
                                    'opts' => [
                                        ['noA7hkjMqCLy3Sp4XDF8H', 'Optimal for taste (14 °C/57 °F)', '287.15'],
                                        ['t_FzaxKE_RGjlTrPOwCVF', 'Refreshing (4 °C/39 °F)', '277.15'],
                                        ['AYg5dypY_fnmj8ZB2g2CU', 'Very cold (2 °C/36 °F)', '275.15'],
                                        ['5LBIoPAM4RT8V-5tsqEPd', 'Custom', ''],
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
                                    'n' => 'desired_temperature_wine_VS',
                                    'vt' => 'valueSelect',
                                    'l' => 'Desired temperature',
                                    'h' => 'By default it is temperature set out in the calculator text, feel free to change it according to your preference.',
                                    'ds' => 'SGC12GxWXLjo82bhR2oV-',
                                    'opts' => [
                                        ['TNMV89u_xGsTRslmVIyPN', 'Optimal for red wine (16 °C/61 °F)', '289.15'],
                                        ['CfzOeVusOnkAC4NNbQOcC', 'Optimal for white and rose wines (10 °C/50 °F)', '283.15'],
                                        ['aVJpT1NQcUdJXDUlVPtev', 'Optimal for sparkling wines and Champagne(9 °C/48 °F)', '282.15'],
                                        ['yTmKsluvoR33UCGW828f2', 'Optimal for sweet aromatic sparkling wines (13 °C/55 °F)', '286.15'],
                                        ['cIlGaDGSn2IjB3dL75r1g', 'Custom', ''],
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
                                    'n' => 'desired_temperature_beer_VS',
                                    'vt' => 'valueSelect',
                                    'l' => 'Desired temperature',
                                    'h' => 'By default it is temperature set out in the calculator text, feel free to change it according to your preference.',
                                    'ds' => '_JRK0SPE4fgAbL9cLd_dV',
                                    'opts' => [
                                        ['8GVsZNRopC8XIA23GdT8W', 'Optimal for Stout (13 °C/55 °F)', '286.15'],
                                        ['SUASgq7eawnej7imw904g', 'Optimal for Ale (10 °C/50 °F)', '283.15'],
                                        ['DyUc8SPEXQ-4jRiKccXrb', 'Optimal for Lager (6 °C/43 °F)', '279.15'],
                                        ['I6v5ZT04pHjibxIsyj3r4', 'Very cold (3 °C/37.4 °F)', '276.15'],
                                        ['C_FBx-jrnJGwV0unziopF', 'Custom', ''],
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
                                    'n' => 'desired_temperature_spirit_VS',
                                    'vt' => 'valueSelect',
                                    'l' => 'Desired temperature',
                                    'h' => 'By default it is temperature set out in the calculator text, feel free to change it according to your preference.',
                                    'ds' => 'HLp8v4KNSrbPJ7FOcXn-1',
                                    'opts' => [
                                        ['B8RtEy2yoVvnHtz2GI8cI', 'Optimal for taste (16 °C/60.8 °F)', '289.15'],
                                        ['yFGV7IF-_dNJgKYla8W9U', 'Optimal for shots (2 °C/35.6 °F)', '275.15'],
                                        ['lNypbG_cgiLemWDaNDT0u', 'Cold (6 °C/42.8 °F)', '279.15'],
                                        ['iYkOEYpDgCMDVZyLTWC6x', 'Custom', ''],
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
                                    'n' => 'final_temperature_water',
                                    'vt' => 'dependent',
                                    'l' => 'Desired temperature',
                                    'us' => '40',
                                    'du' => 'C',
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
                                    'n' => 'final_temperature_soft_drinks',
                                    'vt' => 'dependent',
                                    'l' => 'Desired temperature',
                                    'us' => '40',
                                    'du' => 'C',
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
                                    'n' => 'final_temperature_juice',
                                    'vt' => 'dependent',
                                    'l' => 'Desired temperature',
                                    'us' => '40',
                                    'du' => 'C',
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
                                    'n' => 'final_temperature_wine',
                                    'vt' => 'dependent',
                                    'l' => 'Desired temperature',
                                    'us' => '40',
                                    'du' => 'C',
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
                                    'n' => 'final_temperature_beer',
                                    'vt' => 'dependent',
                                    'l' => 'Desired temperature',
                                    'us' => '40',
                                    'du' => 'C',
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
                                    'n' => 'final_temperature_spirit',
                                    'vt' => 'dependent',
                                    'l' => 'Desired temperature',
                                    'us' => '40',
                                    'du' => 'C',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => '8BuUAhEVUiO19RHGf7RgT',
                'title' => 'Hidden variables',
                'desc' => '',
                'm' => [
                    [
                        'FR1_FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'alcohol_content',
                                    'vt' => 'dependent',
                                    'l' => 'Alcohol Content',
                                    'suf' => '%',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'heat_transfer_coefficient_outside',
                                    'vt' => 'dependent',
                                    'l' => 'h (outside)',
                                    'suf' => 'W / (m² · K)',
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
                                    'n' => 'volume_water',
                                    'vt' => 'dependent',
                                    'l' => 'Volume',
                                    'us' => '20',
                                    'du' => 'liters',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'thickness_water',
                                    'vt' => 'dependent',
                                    'l' => 'Thickness',
                                    'us' => '4',
                                    'du' => 'mm',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'area_water',
                                    'vt' => 'dependent',
                                    'l' => 'Area',
                                    'h' => 'Area of the bottle/can modelled as a cylinder',
                                    'us' => '28',
                                    'du' => 'cm2',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'conductivity_water',
                                    'vt' => 'dependent',
                                    'l' => 'Conductivity (interface)',
                                    'suf' => 'W / (m² · K)',
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
                                    'n' => 'volume_soft_drinks',
                                    'vt' => 'dependent',
                                    'l' => 'Volume',
                                    'us' => '20',
                                    'du' => 'liters',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'thickness_soft_drinks',
                                    'vt' => 'dependent',
                                    'l' => 'Thickness',
                                    'us' => '4',
                                    'du' => 'mm',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'area_soft_drinks',
                                    'vt' => 'dependent',
                                    'l' => 'Area',
                                    'h' => 'Area of the bottle/can modelled as a cylinder',
                                    'us' => '28',
                                    'du' => 'cm2',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'conductivity_soft_drinks',
                                    'vt' => 'dependent',
                                    'l' => 'Conductivity (interface)',
                                    'suf' => 'W / (m² · K)',
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
                                    'n' => 'volume_juice',
                                    'vt' => 'dependent',
                                    'l' => 'Volume',
                                    'us' => '20',
                                    'du' => 'liters',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'thickness_juice',
                                    'vt' => 'dependent',
                                    'l' => 'Thickness',
                                    'us' => '4',
                                    'du' => 'mm',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'area_juice',
                                    'vt' => 'dependent',
                                    'l' => 'Area',
                                    'h' => 'Area of the bottle/can modelled as a cylinder',
                                    'us' => '28',
                                    'du' => 'cm2',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'conductivity_juice',
                                    'vt' => 'dependent',
                                    'l' => 'Conductivity (interface)',
                                    'suf' => 'W / (m² · K)',
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
                                    'n' => 'volume_wine',
                                    'vt' => 'dependent',
                                    'l' => 'Volume',
                                    'us' => '20',
                                    'du' => 'liters',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'thickness_wine',
                                    'vt' => 'dependent',
                                    'l' => 'Thickness',
                                    'us' => '4',
                                    'du' => 'mm',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'area_wine',
                                    'vt' => 'dependent',
                                    'l' => 'Area',
                                    'h' => 'Area of the bottle/can modelled as a cylinder',
                                    'us' => '28',
                                    'du' => 'cm2',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'conductivity_wine',
                                    'vt' => 'dependent',
                                    'l' => 'Conductivity (interface)',
                                    'suf' => 'W / (m² · K)',
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
                                    'n' => 'volume_beer',
                                    'vt' => 'dependent',
                                    'l' => 'Volume',
                                    'us' => '20',
                                    'du' => 'liters',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'thickness_beer',
                                    'vt' => 'dependent',
                                    'l' => 'Thickness',
                                    'us' => '4',
                                    'du' => 'mm',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'area_beer',
                                    'vt' => 'dependent',
                                    'l' => 'Area',
                                    'h' => 'Area of the bottle/can modelled as a cylinder',
                                    'us' => '28',
                                    'du' => 'cm2',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'conductivity_beer',
                                    'vt' => 'dependent',
                                    'l' => 'Conductivity (interface)',
                                    'suf' => 'W / (m² · K)',
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
                                    'n' => 'volume_spirit',
                                    'vt' => 'dependent',
                                    'l' => 'Volume',
                                    'us' => '20',
                                    'du' => 'liters',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'thickness_spirit',
                                    'vt' => 'dependent',
                                    'l' => 'Thickness',
                                    'us' => '4',
                                    'du' => 'mm',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'area_spirit',
                                    'vt' => 'dependent',
                                    'l' => 'Area',
                                    'h' => 'Area of the bottle/can modelled as a cylinder',
                                    'us' => '28',
                                    'du' => 'cm2',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'conductivity_spirit',
                                    'vt' => 'dependent',
                                    'l' => 'Conductivity (interface)',
                                    'suf' => 'W / (m² · K)',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'X8xmYTD6PIZYKzLhI9qg4',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1_FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'time_minutes_water',
                                    'vt' => 'presentation',
                                    'l' => '',
                                    'us' => '19',
                                    'du' => 'min',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'time_minutes_soft_drinks',
                                    'vt' => 'presentation',
                                    'l' => '',
                                    'us' => '19',
                                    'du' => 'min',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'time_minutes_juice',
                                    'vt' => 'presentation',
                                    'l' => '',
                                    'us' => '19',
                                    'du' => 'min',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'time_minutes_wine',
                                    'vt' => 'presentation',
                                    'l' => '',
                                    'us' => '19',
                                    'du' => 'min',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'time_minutes_beer',
                                    'vt' => 'presentation',
                                    'l' => '',
                                    'us' => '19',
                                    'du' => 'min',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'time_minutes_spirit',
                                    'vt' => 'presentation',
                                    'l' => '',
                                    'us' => '19',
                                    'du' => 'min',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'time_hours_water',
                                    'vt' => 'presentation',
                                    'l' => '',
                                    'us' => '19',
                                    'du' => 'hrs',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'time_hours_soft_drinks',
                                    'vt' => 'presentation',
                                    'l' => '',
                                    'us' => '19',
                                    'du' => 'hrs',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'time_hours_juice',
                                    'vt' => 'presentation',
                                    'l' => '',
                                    'us' => '19',
                                    'du' => 'hrs',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'time_hours_wine',
                                    'vt' => 'presentation',
                                    'l' => '',
                                    'us' => '19',
                                    'du' => 'hrs',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'time_hours_beer',
                                    'vt' => 'presentation',
                                    'l' => '',
                                    'us' => '19',
                                    'du' => 'hrs',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'time_hours_spirit',
                                    'vt' => 'presentation',
                                    'l' => '',
                                    'us' => '19',
                                    'du' => 'hrs',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'supp-chill-results',
                'title' => 'Results',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'cool_minutes', 'vt' => 'dependent', 'l' => 'Minutes to reach your temperature in air (fridge, freezer, room)'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'cool_minutes_water', 'vt' => 'dependent', 'l' => 'Minutes in water or an ice bath'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'warm_minutes', 'vt' => 'dependent', 'l' => 'Minutes if the drink is colder than its surroundings'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'volume_litres', 'vt' => 'dependent', 'l' => 'Volume of the container (litres)'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'tau_minutes', 'vt' => 'dependent', 'l' => 'Cooling time constant (minutes)'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [],
        'datasets' => [
            'c09WXqmnMgtJOsK6JTWzn' => [
                'name' => 'initial_temperature_DS',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'TgYhxdvx7tV_T8nOIdGJL', 'label' => 'Hot summer day (30 °C/86 °F)', 'value' => '303.15'],
                    ['uid' => 'AEtXE_BXIH2pmKigKWxZ6', 'label' => 'Cloudy day (20 °C/68 °F)', 'value' => '293.15'],
                    ['uid' => 'WQc9sliORWE4KNOswaGqi', 'label' => 'Room temperature (16.5 °C/61.7 °F)', 'value' => '289.65'],
                    ['uid' => 'QLj42XfD6UCLMhuApAPY_', 'label' => 'Custom', 'value' => ''],
                ],
            ],
            'qfqlzEgpromCBL2-PtQtp' => [
                'name' => 'ambient_temperature_DS',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'Hjo-cXsCNEDbD9LXMzP68', 'label' => 'Fridge (4 °C/39 °F)', 'value' => '277.15'],
                    ['uid' => '-4rk2TGEwxxid0XcJMiBg', 'label' => 'Freezer (-18 °C/-0.4 °F)', 'value' => '255.15'],
                    ['uid' => 'FNDUDfW1DdN1Uxs0sCTWl', 'label' => 'Wine cellar/basement (15 °C/59 °F)', 'value' => '288.15'],
                    ['uid' => 'OkOUbcXDKaDrsHZbh5QEr', 'label' => 'Ice bath (0 °C/32 °F)', 'value' => '273.15'],
                    ['uid' => 'h4eQ9uJAPi-foPgTosL4v', 'label' => 'Ice + salt bath [10%] (-6 °C/21 °F)', 'value' => '267.15'],
                    ['uid' => 'tkELYd16x3l_hCCun6BlD', 'label' => 'Custom (air)', 'value' => ''],
                    ['uid' => 'Tt6pAuqubfjhKwKgUWFNa', 'label' => 'Custom (water)', 'value' => ''],
                ],
            ],
            'BwT-AfkvmAcJvYLWDCO9W' => [
                'name' => 'drink_type_DS',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'f0r0n684Z9392fZZsOWTw', 'label' => 'Water', 'value' => '0'],
                    ['uid' => '3lkfjredpqeJBx_9wsXid', 'label' => 'Soft drinks', 'value' => '0'],
                    ['uid' => 'hsj91aG9S7hkHwAYbGufm', 'label' => 'Iced coffee / Juice / Tea', 'value' => '0'],
                    ['uid' => 'oaTtiKzOmpoVXsv7fRZml', 'label' => 'Wine', 'value' => '13.5'],
                    ['uid' => 'GjWvogW9l8lhiy2sdwOEn', 'label' => 'Beer', 'value' => '6'],
                    ['uid' => '5hx91BRGC9WDmLs8tVsC0', 'label' => 'Spirit', 'value' => '40'],
                ],
            ],
            '_S9DGEnTa89TGW89xYwMj' => [
                'name' => 'container_type_water_DS',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'm2CBquA3Hv6i01JPgpJ5s', 'label' => 'Magnum Glass Bottle (1.5L)', 'value' => '0.0015'],
                    ['uid' => 'yKacuNbCtqu71Tj-RnCTQ', 'label' => 'Standard wine glass bottle (0.75L)', 'value' => '0.00075'],
                    ['uid' => 'iTpikX9SpUnP3syRy1Xmq', 'label' => 'Glass bottle (16.9 oz / 0.5L)', 'value' => '0.0005'],
                    ['uid' => 'S0A98Sd_ntfedqxuTKbcb', 'label' => 'Small glass bottle (8.5 oz / 0.25L)', 'value' => '0.00025'],
                    ['uid' => 'ilHbwj7OMQ7MEJJLdmabm', 'label' => 'Demi/Half glass bottle (0.375L)', 'value' => '0.000375'],
                    ['uid' => 'W8ghGpkm1xkBIDmC8fSYa', 'label' => 'Spirit Glass Bottle (0.7L)', 'value' => '0.0007'],
                    ['uid' => '6mXAEwxbGgJyT_gkYNXaA', 'label' => 'Europe Big Can (0.5L)', 'value' => '0.0005'],
                    ['uid' => 'inWRpSXU5vEdMh45dNaOW', 'label' => 'European Standard can (330 ml)', 'value' => '0.00033'],
                    ['uid' => 'Bf74vOjF6VqoVWE0y1aVy', 'label' => 'US Standard can (12 oz)', 'value' => '0.000355'],
                    ['uid' => 'k8alJy4TS-AR36URKTE6w', 'label' => 'US Tall boy can (16 oz)', 'value' => '0.000473'],
                    ['uid' => '2FSb6ya6BXy8RF4KDyh9U', 'label' => 'US Tall boy can (24 oz)', 'value' => '0.00071'],
                    ['uid' => 'esikHf3mwSY_3QZC8EwOV', 'label' => 'AU Standard can (375 ml / 13.2 oz)', 'value' => '0.000375'],
                    ['uid' => 'I1kRcLxGuDKoBj9-P4j12', 'label' => 'Big plastic bottle (50.7 oz / 1.5L)', 'value' => '0.0015'],
                    ['uid' => 'ov8_vZH94JO4cS8EcVzj5', 'label' => 'Standard plastic bottle (33.8 oz / 1L)', 'value' => '0.001'],
                    ['uid' => 'dGiYTG55FbnLQB8DG3nPP', 'label' => 'Medium plastic bottle (16.9 oz / 0.5L)', 'value' => '0.0005'],
                    ['uid' => '4H-MjfMxZbNIYgPPWIgfc', 'label' => 'Small plastic bottle (8.5 oz / 0.25L)', 'value' => '0.00025'],
                ],
            ],
            'pc2dCPjDpNf5cBn9dI9EA' => [
                'name' => 'container_type_wine_DS',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'Hcs-rNCkqS6YgHbcwfuIo', 'label' => 'Magnum Glass Bottle (1.5L)', 'value' => '0.0015'],
                    ['uid' => 'kaGNhFl79VFUmnxZnHjNf', 'label' => 'Standard wine glass bottle (0.75L)', 'value' => '0.00075'],
                    ['uid' => 'qznjPMoxyFwbln5sGRy4f', 'label' => 'Demi/Half glass bottle (0.375L)', 'value' => '0.000375'],
                ],
            ],
            'pKa0En_RCyA6yGaxSCg6p' => [
                'name' => 'container_type_beer_DS',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => '-1Y79IslId0f14rTdbZ-L', 'label' => 'Glass bottle (16.9 oz / 0.5L)', 'value' => '0.0005'],
                    ['uid' => 'YeDjvSt4pkEJf18OXm2AR', 'label' => 'Small glass bottle (8.5 oz / 0.25L)', 'value' => '0.00025'],
                    ['uid' => 'SrXrPHm6siimPByEF9PKO', 'label' => 'European Big can (0.5L)', 'value' => '0.0005'],
                    ['uid' => '9EPk8tn4ucUWGCwTtjvZQ', 'label' => 'European Standard can (330 ml)', 'value' => '0.00033'],
                    ['uid' => '-IJ3dS-t34yIcFmCqiLCC', 'label' => 'US Standard can (12 oz)', 'value' => '0.000355'],
                    ['uid' => 'dP5IREQ2k-i373YGqIDqa', 'label' => 'US Tall boy can (16 oz)', 'value' => '0.000473'],
                    ['uid' => 'QX9j5R-1TgaQIq2WozC9C', 'label' => 'US Tall boy can (24 oz)', 'value' => '0.00071'],
                    ['uid' => '5ZotsjACuy9WgoDrObTje', 'label' => 'CA standard bottle (340 ml / 12 oz)', 'value' => '0.00034'],
                    ['uid' => 'yNzLNK77QUPcqDUbLZK1E', 'label' => 'AU Standard can (375 ml / 13.2 oz)', 'value' => '0.000375'],
                    ['uid' => 'WEP8A1tEX1PkDM_jxBJNu', 'label' => 'AU Throwdown bottle (250 ml / 8.5 oz)', 'value' => '0.00025'],
                    ['uid' => 'AuwBa4S9YvVVI7yKpfqy1', 'label' => 'AU Stubby bottle (375 ml / 13.2 oz)', 'value' => '0.000375'],
                    ['uid' => '0Wix9HZj0Iba5QSQ6C_LH', 'label' => 'AU Long Neck bottle (750 ml / 26.4 oz)', 'value' => '0.00075'],
                ],
            ],
            'TvDAoj2R08kLJaVrpiGUk' => [
                'name' => 'container_type_spirit_DS',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'X_NYdSmcG6reUPKDu2Dyd', 'label' => 'Spirit Glass Bottle (0.7L)', 'value' => '0.0007'],
                    ['uid' => 'x3q91dEGDQQX2f4r-jGzT', 'label' => 'Jagermeister Square Bottle (0.75L)', 'value' => '0.00075'],
                    ['uid' => 'pFEev-iQhO1x_8XzOkvJs', 'label' => 'Glass bottle (16.9 oz / 0.5L)', 'value' => '0.0005'],
                ],
            ],
            '8xo3KV7i-zct50I4a0poa' => [
                'name' => 'container_type_others_DS',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => '22zaqUqDsqCYCfBuWpHWR', 'label' => 'Glass bottle (16.9 oz / 0.5L)', 'value' => '0.0005'],
                    ['uid' => 'nFzZ-nVNrtF_puMI7kgFa', 'label' => 'Small glass bottle (8.5 oz / 0.25L)', 'value' => '0.00025'],
                    ['uid' => 'KiwvL6DDY5n_Ffk4bAGiW', 'label' => 'European Big can (0.5L)', 'value' => '0.0005'],
                    ['uid' => 'JSZvbRX38hgW_mFRQNp8K', 'label' => 'European Standard can (330 ml)', 'value' => '0.00033'],
                    ['uid' => 'fu4IAhiJwcnqbnQ1p3L7l', 'label' => 'US Standard can (12 oz)', 'value' => '0.000355'],
                    ['uid' => 'ZGKXKJJUrG5_Z6rB-Qulp', 'label' => 'US Tall boy can (16 oz)', 'value' => '0.000473'],
                    ['uid' => 'IvDX19x_DXx8OaWVLPlcK', 'label' => 'US Tall boy can (24 oz)', 'value' => '0.00071'],
                    ['uid' => 'sX3kVT9ZK91fNMH4Dzsmy', 'label' => 'AU Standard can (375 ml, 13.2 oz)', 'value' => '0.000375'],
                    ['uid' => 'vjWUcsjw9V1XKUe8EBZ8b', 'label' => 'Big plastic bottle (67.6 oz / 2L)', 'value' => '0.002'],
                    ['uid' => 'v7n1Cs3YdDYDVvBeLblDG', 'label' => 'Plastic bottle (50.7 oz / 1.5L)', 'value' => '0.0015'],
                    ['uid' => 'Y8CTxSO3RQuBtfu385Md3', 'label' => 'Standard plastic bottle (33.8 oz / 1L)', 'value' => '0.001'],
                    ['uid' => '_H8SG_wJSj-0MD4PpDE1q', 'label' => 'Medium plastic bottle (16.9 oz / 0.5L)', 'value' => '0.0005'],
                    ['uid' => 'Z9usXPNkAqnu2zjliYxob', 'label' => 'Small plastic bottle (8.5 oz / 0.25L)', 'value' => '0.00025'],
                ],
            ],
            'buMo7rO44hRgPazwfX90V' => [
                'name' => 'final_temperature_water_DS',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'b6ciKL5JVnJT76k5O_Jm0', 'label' => 'Warm (22 °C/72 °F)', 'value' => '295.15'],
                    ['uid' => '3z8JmILHJmLZp9a0Yhw7M', 'label' => 'Optimal for hydration (16 °C/61 °F)', 'value' => '289.15'],
                    ['uid' => 'YtM39BY8A1C3o4ZPq5EB9', 'label' => 'Refreshing (6 °C/43 °F)', 'value' => '279.15'],
                    ['uid' => 'EWqVseZmHML17l0AEd-U5', 'label' => 'Very cold (2 °C/36 °F)', 'value' => '275.15'],
                    ['uid' => 'uSsItf7S9wBToIErgV_ZY', 'label' => 'Custom', 'value' => ''],
                ],
            ],
            '_JRK0SPE4fgAbL9cLd_dV' => [
                'name' => 'final_temperature_beer_DS',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => '8GVsZNRopC8XIA23GdT8W', 'label' => 'Optimal for Stout (13 °C/55 °F)', 'value' => '286.15'],
                    ['uid' => 'SUASgq7eawnej7imw904g', 'label' => 'Optimal for Ale (10 °C/50 °F)', 'value' => '283.15'],
                    ['uid' => 'DyUc8SPEXQ-4jRiKccXrb', 'label' => 'Optimal for Lager (6 °C/43 °F)', 'value' => '279.15'],
                    ['uid' => 'I6v5ZT04pHjibxIsyj3r4', 'label' => 'Very cold (3 °C/37.4 °F)', 'value' => '276.15'],
                    ['uid' => 'C_FBx-jrnJGwV0unziopF', 'label' => 'Custom', 'value' => ''],
                ],
            ],
            'xDkpDhQ30i4ZvPYcTEORp' => [
                'name' => 'final_temperature_soft_drinks_DS',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'l6Ctq-HnSdA_eitkQERPZ', 'label' => 'Optimal (4.5 °C/40 °F)', 'value' => '277.65'],
                    ['uid' => 'uAWefkUTIYpVDD9fDTIuP', 'label' => 'Very cold (2 °C/36 °F)', 'value' => '275.15'],
                    ['uid' => 'zrbKbdraRZC6wcgTY6inj', 'label' => 'Custom', 'value' => ''],
                ],
            ],
            'RNOFV8KxjvLFls14uaGYk' => [
                'name' => 'final_temperature_juice_DS',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'noA7hkjMqCLy3Sp4XDF8H', 'label' => 'Optimal for taste (14 °C/57 °F)', 'value' => '287.15'],
                    ['uid' => 't_FzaxKE_RGjlTrPOwCVF', 'label' => 'Refreshing (4 °C/39 °F)', 'value' => '277.15'],
                    ['uid' => 'AYg5dypY_fnmj8ZB2g2CU', 'label' => 'Very cold (2 °C/36 °F)', 'value' => '275.15'],
                    ['uid' => '5LBIoPAM4RT8V-5tsqEPd', 'label' => 'Custom', 'value' => ''],
                ],
            ],
            'SGC12GxWXLjo82bhR2oV-' => [
                'name' => 'final_temperature_wine_DS',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'TNMV89u_xGsTRslmVIyPN', 'label' => 'Optimal for red wine (16 °C/61 °F)', 'value' => '289.15'],
                    ['uid' => 'CfzOeVusOnkAC4NNbQOcC', 'label' => 'Optimal for white and rose wines (10 °C/50 °F)', 'value' => '283.15'],
                    ['uid' => 'aVJpT1NQcUdJXDUlVPtev', 'label' => 'Optimal for sparkling wines and Champagne(9 °C/48 °F)', 'value' => '282.15'],
                    ['uid' => 'yTmKsluvoR33UCGW828f2', 'label' => 'Optimal for sweet aromatic sparkling wines (13 °C/55 °F)', 'value' => '286.15'],
                    ['uid' => 'cIlGaDGSn2IjB3dL75r1g', 'label' => 'Custom', 'value' => ''],
                ],
            ],
            'HLp8v4KNSrbPJ7FOcXn-1' => [
                'name' => 'final_temperature_spirit_DS',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'B8RtEy2yoVvnHtz2GI8cI', 'label' => 'Optimal for taste (16 °C/60.8 °F)', 'value' => '289.15'],
                    ['uid' => 'yFGV7IF-_dNJgKYla8W9U', 'label' => 'Optimal for shots (2 °C/35.6 °F)', 'value' => '275.15'],
                    ['uid' => 'lNypbG_cgiLemWDaNDT0u', 'label' => 'Cold (6 °C/42.8 °F)', 'value' => '279.15'],
                    ['uid' => 'iYkOEYpDgCMDVZyLTWC6x', 'label' => 'Custom', 'value' => ''],
                ],
            ],
        ],
        'js' => <<<'TXT'
        "use strict";omni.define("main_function",function(T_initial,T_ambient,T,A,volume,alcohol,thickness,h_1,conductivity){if(T<T_ambient){return-1}else{var weight=volume*1000;var h_total=1/(1/h_1+thickness/conductivity+1/1000);var heat_C=weight/100*(4160*(100-alcohol)+3000*alcohol);var cooling_cte=h_total*A/heat_C;var T_eff=T*1;if(Math.abs(T-T_ambient)<=0.1){T_eff=T_eff+0.1}var in_log=(T_eff-T_ambient)/(T_initial-T_ambient);var time=Math.log(in_log)/-cooling_cte;return Math.round((time+(T_eff-T)*120)/60)}});//# sourceURL=customJs.js
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
        
        /* the six drinks, in the order the picker lists them */
        var DRINKS = [
          { name: 'Water',      alcohol: 0,     volume: 'container_type_water_VS',          want: 'desired_temperature_water_VS' },
          { name: 'Soft drinks', alcohol: 0,    volume: 'container_type_soft_or_juice_VS',  want: 'desired_temperature_soft_drinks_VS' },
          { name: 'Iced coffee / juice / tea', alcohol: 0, volume: 'container_type_soft_or_juice_VS', want: 'desired_temperature_juice_VS' },
          { name: 'Wine',       alcohol: 0.135, volume: 'container_type_wine_VS',          want: 'desired_temperature_wine_VS' },
          { name: 'Beer',       alcohol: 0.06,  volume: 'container_type_beer_VS',          want: 'desired_temperature_beer_VS' },
          { name: 'Spirit',     alcohol: 0.40,  volume: 'container_type_spirit_VS',        want: 'desired_temperature_spirit_VS' }
        ];
        
        /*
         * A choice field is a drop-down when it has many options and a row of radio
         * buttons when it has few, and the radio values are opaque ids rather than the
         * numbers behind them. Both kinds are therefore read the same way: take the
         * text of the option that is chosen and pick the numbers out of it.
         */
        function chosenText(name) {
          var sel = document.querySelector('select[data-var="' + name + '"]');
          if (sel && sel.selectedIndex >= 0) {
            return (sel.options[sel.selectedIndex].text || '').trim();
          }
          var radios = document.querySelectorAll('input[type="radio"][name="' + name + '"]');
          for (var i = 0; i < radios.length; i++) {
            if (radios[i].checked) {
              var host = radios[i].closest('label') || radios[i].parentNode;
              return (host.innerText || host.textContent || '').replace(/\s+/g, ' ').trim();
            }
          }
          return '';
        }
        
        /* "(330 ml)", "(0.5L)" or "(12 oz)" -> litres */
        function volumeFrom(text) {
          var m = text.match(/\(([\d.]+)\s*ml/i);
          if (m) { return Number(m[1]) / 1000; }
          m = text.match(/([\d.]+)\s*L\b/);
          if (m) { return Number(m[1]); }
          m = text.match(/([\d.]+)\s*oz/i);
          if (m) { return Number(m[1]) * 0.0295735; }
          return null;
        }
        
        /* the first "(-6 °C" in a label, in celsius */
        function tempFrom(text) {
          var m = text.match(/(-?[\d.]+)\s*°C/);
          return m ? Number(m[1]) : null;
        }
        
        /* the model: minutes to move from t0 to t in an environment of ta */
        function coolMinutes(volumeM3, alcohol, t0, ta, t, hOut) {
          var mass = volumeM3 * 1000;                      /* kg, the drink is mostly water */
          var capacity = mass * (4186 * (1 - alcohol) + 2400 * alcohol);   /* J/K */
          var area = 7 * Math.pow(volumeM3, 2 / 3);        /* m², a bottle or a can */
          var tau = capacity / (hOut * area);              /* seconds */
          var ratio = (t0 - ta) / (t - ta);
          if (!isFinite(ratio) || ratio <= 0) { return null; }
          return tau * Math.log(ratio) / 60;
        }
        
        omni.onResult(['drink_type_VS', 'initial_temperature_VS', 'ambient_temperature_VS'], function (ctx, v) {
          /*
           * The drink picker's option values are alcohol percentages, and three of the
           * six drinks share the value 0, so the chosen drink is identified by its
           * position in the list rather than by its value.
           */
          var drinkText = chosenText('drink_type_VS');
          var d = -1;
          for (var i = 0; i < DRINKS.length; i++) {
            if (drinkText.toLowerCase().indexOf(DRINKS[i].name.split(' ')[0].toLowerCase()) === 0) { d = i; }
          }
          if (d < 0) {
            ctx.addUnmetCondition('Choose what is in the bottle.');
            return;
          }
          var drink = DRINKS[d];
        
          var t0 = tempFrom(chosenText('initial_temperature_VS'));
          if (t0 === null) {
            var c0 = Number(v.custom_initial_C);
            t0 = v.custom_initial_C !== '' && isFinite(c0) ? c0 : null;
          }
          var ambientText = chosenText('ambient_temperature_VS');
          var ta = tempFrom(ambientText);
          if (ta === null) {
            var ca = Number(v.custom_ambient_C);
            ta = v.custom_ambient_C !== '' && isFinite(ca) ? ca : null;
          }
          /* the two "Custom" surroundings differ in what the drink is standing in */
          var ambientWet = /water/i.test(ambientText);
          if (t0 === null) {
            ctx.addUnmetCondition('Choose the temperature the drink starts at (or type it in the Custom box).');
            return;
          }
          if (ta === null) {
            ctx.addUnmetCondition('Choose where the drink is cooling (or type the air temperature in the Custom box).');
            return;
          }
        
          /* the label gives litres; the model works in cubic metres */
          var volume = volumeFrom(chosenText(drink.volume));
          if (volume !== null) { volume = volume / 1000; }
          if (volume === null || volume <= 0) {
            ctx.addUnmetCondition('Choose the container the drink is in.');
            return;
          }
          var t = tempFrom(chosenText(drink.want));
          if (t === null) {
            var cd = Number(v.custom_desired_C);
            t = v.custom_desired_C !== '' && isFinite(cd) ? cd : null;
          }
          if (t === null || !isFinite(t)) {
            ctx.addUnmetCondition('Choose the temperature you want to drink it at.');
            return;
          }
        
          var inAir = coolMinutes(volume, drink.alcohol, t0, ta, t, 10);
          var inWater = coolMinutes(volume, drink.alcohol, t0, ta, t, 300);
          if (ambientWet && inWater !== null && inWater > 0) { inAir = inWater; }
        
          if (inAir === null || inWater === null) {
            ctx.addUnmetCondition('Those temperatures never meet — the drink cannot reach ' + snum(t, 1)
              + ' °C in surroundings of ' + snum(ta, 1) + ' °C. Pick a colder place, or a warmer target.');
            return;
          }
        
          /* negative means the drink is going to warm up rather than chill */
          var warming = inAir < 0;
          var air = Math.abs(inAir), water = Math.abs(inWater);
        
          var mass = volume * 1000;
          var capacity = mass * (4186 * (1 - drink.alcohol) + 2400 * drink.alcohol);
          var area = 7 * Math.pow(volume, 2 / 3);
          var tauMin = capacity / (10 * area) / 60;
        
          ctx.exportValue('cool_minutes', Math.round(air));
          ctx.exportValue('cool_minutes_water', Math.round(water));
          ctx.exportValue('warm_minutes', warming ? Math.round(air) : 0);
          ctx.exportValue('volume_litres', sround(volume * 1000, 2));
          ctx.exportValue('tau_minutes', sround(tauMin, 1));
        
          var hours = function (min) {
            return min >= 120 ? snum(min / 60, 1) + ' hours (' + snum(min, 0) + ' min)' : snum(min, 0) + ' min';
          };
        
          ctx.addHtml('<p><strong>' + snum(volume * 1000, 2) + ' L of ' + drink.name.toLowerCase() + ', from '
            + snum(t0, 1) + ' °C down to ' + snum(t, 1) + ' °C in ' + snum(ta, 1) + ' °C surroundings: about '
            + hours(air) + ' in air, or ' + hours(water) + ' standing in water or an ice bath.</strong>'
            + (warming ? ' The drink is already colder than its surroundings, so what happens is the opposite: it '
              + 'warms up, and the same physics gives that time.' : '') + '</p>');
        
          var rows = [
            ['Drink', drink.name],
            ['Volume', snum(volume * 1000, 2) + ' L (' + snum(volume * 33814, 0) + ' fl oz)'],
            ['Alcohol', snum(drink.alcohol * 100, 1) + ' % by volume'],
            ['Mass', snum(mass, 2) + ' kg'],
            ['Surface area', snum(area, 4) + ' m²'],
            ['Heat capacity', snum(capacity, 0) + ' J/K'],
            ['Time constant', snum(tauMin, 1) + ' min in air'],
            ['In air (h = 10 W/m²K)', hours(air)],
            ['In water or ice (h = 300 W/m²K)', hours(water)],
            ['Speed-up from water', 'about ' + snum(air / water, 1) + '× faster']
          ];
          ctx.addHtml(stable(['Item', 'Value'], rows));
        
          /* the same bottle at the other surroundings on the page */
          var places = [
            ['Fridge (4 °C)', 4], ['Freezer (-18 °C)', -18], ['Wine cellar (15 °C)', 15],
            ['Ice bath (0 °C, in water)', 0], ['Ice + salt bath (-6 °C, in water)', -6],
            ['Room (20 °C)', 20]
          ];
          var placeRows = places.map(function (p) {
            var wet = /bath/i.test(p[0]);
            var mins = coolMinutes(volume, drink.alcohol, t0, p[1], t, wet ? 300 : 10);
            if (mins === null || mins < 0) {
              return [p[0], 'cannot reach ' + snum(t, 1) + ' °C', '—'];
            }
            return [p[0], hours(Math.abs(mins)), wet ? 'water' : 'air'];
          });
          ctx.addHtml('<p>This container in every place the page offers:</p>');
          ctx.addHtml(stable(['Where', 'Time to ' + snum(t, 1) + ' °C', 'Contact'], placeRows));
        
          ctx.addHtml('<p class="calc-unmet">Newton\'s law of cooling says the drink approaches the temperature of '
            + 'its surroundings exponentially, and the time constant above is how long it takes to close about '
            + '63 % of the gap. That is why the last couple of degrees take as long as the first ten, and why a '
            + 'drink can never go below the temperature of the room it is standing in. The model treats the bottle '
            + 'as one lump: in reality the outside cools first, a glass conducts better than a thin can, a can '
            + 'cooled in air on a shelf cools more slowly than one on a wire rack, and a drink with ice in it is a '
            + 'different problem again. Standing the drink in a bowl of water, with ice and a spoonful of salt, is '
            + 'roughly fifteen minutes for a standard bottle and is the fastest of the methods here.</p>');
        });
        TXT,
        'showIf' => [
            'container_type_beer_VS' => 'drink_type_VS == 4',
            'desired_temperature_beer_VS' => 'drink_type_VS == 4',
            'container_type_wine_VS' => 'drink_type_VS == 3',
            'desired_temperature_wine_VS' => 'drink_type_VS == 3',
            'container_type_spirit_VS' => 'drink_type_VS == 5',
            'desired_temperature_spirit_VS' => 'drink_type_VS == 5',
            'container_type_water_VS' => 'drink_type_VS == 0',
            'desired_temperature_water_VS' => 'drink_type_VS == 0',
            'container_type_soft_or_juice_VS' => 'drink_type_VS == 1 or drink_type_VS == 2',
            'desired_temperature_soft_drinks_VS' => 'drink_type_VS == 1',
            'desired_temperature_juice_VS' => 'drink_type_VS == 2',
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>This calculator estimates how long a selected drink may take to approach a chosen temperature. It uses the beverage type, container, starting condition, surrounding environment and target temperature you choose. Because those choices affect heat transfer, the estimate is more useful than a single rule such as “put every bottle in the freezer for the same number of minutes.”</p>
        <p>Use it as a planning aid, not as a thermometer or a food-safety test. The result comes from a simplified cooling model and reference choices; it cannot account for every bottle shape, fill level, fridge cycle or handling condition.</p>
        TXT,
        'sections' => [
            ['title' => 'What the calculator estimates', 'html' => <<<'TXT'
            <p>The page estimates time for a drink to move toward a target temperature. Depending on the selected drink and setup, it can show an estimate for cooling in air, cooling in water or an ice bath, or warming when the drink starts colder than its surroundings. It also reports supporting quantities such as container volume and a cooling time constant. These are model outputs, not observations from a sensor.</p>
            <p>The target is not the same for every drink. The form offers beverage-specific choices for water, soft drinks, juice, wine, beer and spirits. Select the category that best matches what you are chilling. The calculator uses that selection to reveal the related container and temperature choices. A result for one drink class should not automatically be applied to another, even when both drinks are in similar bottles.</p>
            <p>There is no “best” temperature that suits every purpose. Serving preference, recipe, storage practice and the drink itself matter. Treat the temperature options as selectable scenarios: choose the one you actually want to reach, rather than assuming the page knows your preference.</p>
            TXT],
            ['title' => 'Choose the drink and container carefully', 'html' => <<<'TXT'
            <p>Begin with “What do you want to cool?” Then choose the bottle or container option that most closely describes the package. The available choices vary by drink type and include different bottle or can sizes. The package choice matters because volume and geometry influence how quickly heat moves between the liquid and its surroundings.</p>
            <p>If your container is not listed, use the closest option only as a rough comparison. A tall narrow bottle, a wide jar, a can and an opened glass can behave differently even if they hold the same volume. The model cannot infer container thickness, cap material, whether the drink is opened, or how much liquid remains unless those details are represented by the selected case.</p>
            <p>Next choose where the drink started and where it is being placed. The page offers starting and ambient scenarios as well as temperature choices. If a “custom” option is available, enter the measured temperature rather than a guess. If the liquid has been moved between environments, use the conditions at the start of the interval you want to estimate.</p>
            TXT],
            ['title' => 'Starting, surrounding and target temperatures', 'html' => <<<'TXT'
            <p>The starting temperature is the liquid temperature at the beginning of the estimate. The ambient temperature describes the air or cooling environment around the container. The target is the temperature you want the drink to approach. Keep those roles separate: a refrigerator setting is not the same as the drink’s starting temperature, and the target should not simply repeat the ambient temperature unless that is what you intend.</p>
            <p>When the target is closer to the surrounding temperature, the final part of cooling generally takes longer than the first part. The temperature difference shrinks as the drink approaches its surroundings, so a model based on heat transfer does not predict a constant number of degrees per minute. If the target is at or beyond the ambient temperature in the wrong direction, the selected scenario may not represent cooling; inspect the setup instead of treating a missing or unusual time as a recommendation.</p>
            <p>Temperature units can be displayed in the unit options for supported fields. Choose one unit per field and check the label before entering a number. Although the calculator converts supported units internally, entering a Fahrenheit value while the field is labelled Celsius can still produce a plausible-looking but wrong scenario.</p>
            TXT],
            ['title' => 'How the cooling estimate is formed', 'html' => <<<'TXT'
            <p>The page uses a heat-transfer model rather than a fixed “minutes per bottle” lookup. In simplified form, Newton’s law of cooling describes the rate of temperature change as proportional to the difference between the object and its surroundings. A larger temperature gap produces faster change at first; the rate slows as the drink approaches the surrounding temperature.</p>
            <p>The implementation also accounts for the selected drink’s volume and alcohol content, the container’s surface area and thickness, the material’s thermal conductivity, and an outside heat-transfer coefficient. These inputs are combined into an effective heat-transfer resistance and the drink’s heat capacity. The model then estimates elapsed time from the logarithm of the ratio between the remaining temperature difference and the initial one.</p>
            <p>That structure explains why changing the container or environment can change the answer even when the target stays fixed. It also explains why the number should not be read as a stopwatch guarantee: the model represents a simplified, well-defined scenario, while real cooling depends on details the page may not ask for.</p>
            TXT],
            ['title' => 'A practical way to use the result', 'html' => <<<'TXT'
            <p>Set the drink, container, starting condition, environment and target first. Review each displayed unit, then calculate. If the estimate is longer than the time you have, choose a different cooling method only if it is appropriate for the drink and container; do not infer that the calculator has tested the safety or suitability of a method.</p>
            <p>For a real drink, check the temperature with a clean thermometer when precision matters. You can use the estimate to decide when to begin checking, then rely on the measured temperature rather than the predicted time. If you change the container, move the drink, add ice or open the package, the original scenario no longer describes the same setup and should be recalculated.</p>
            <p>For comparison, change one input at a time. First compare two cooling environments while keeping the same drink and package. Then compare a second container. This makes it easier to see which assumption moved the result. Record the full setup with any time you share; “about twenty minutes” without the drink, container and ambient conditions is not a reusable instruction.</p>
            TXT],
            ['title' => 'What the outputs can and cannot tell you', 'html' => <<<'TXT'
            <p>Cooling-in-air and cooling-in-water outputs refer to different surrounding conditions. Use the one that matches the method you selected. The warming estimate applies when the drink is colder than its surroundings; it is not a cooling time. The time constant describes the model’s rate of approach and is not itself a promised time to reach the target.</p>
            <p>Volume is supporting information, not a separate serving recommendation. A displayed number can be precise to several digits while the assumptions remain approximate. Do not confuse numerical precision with certainty about the real bottle: the calculation can carry its arithmetic precisely and still differ from a measured result.</p>
            TXT],
            ['title' => 'Important limits and food safety', 'html' => <<<'TXT'
            <p>This page estimates temperature change for drinks. It does not measure the liquid, verify the refrigerator or ice bath, account for every container, or certify a safe storage or serving practice. It is not a food-safety calculator and should not be used to decide whether a perishable item has been held at a safe temperature. Follow authoritative food-safety guidance for storage, handling and time limits.</p>
            <p>Use particular care if the drink contains ingredients that require refrigeration, has been opened, or is being served to someone with additional health considerations. A chilling-time estimate cannot replace a thermometer, product label, local food-safety rules or professional advice. If the result seems inconsistent with what you measure, trust the measurement and review the chosen inputs.</p>
            TXT],
            ['title' => 'Frequently considered scenarios', 'html' => <<<'TXT'
            <p>A bottle placed in a refrigerator is an air-cooling scenario. A bottle surrounded by cold water or an ice bath is a different scenario because heat can transfer differently through the surrounding medium. The calculator separates these estimates so they are not mistaken for one another.</p>
            <p>For a drink that begins colder than the room, the warming output may be relevant instead of the cooling output. If the ambient temperature is already near the target, the model may show a long approach time; that is a property of the temperature difference, not a suggestion to leave the drink out indefinitely.</p>
            TXT],
            ['title' => 'Make a useful real-world comparison', 'html' => <<<'TXT'
            <p>If you want to compare two methods, start both scenarios from the same measured drink temperature and use the same target. For example, compare the same sealed bottle in a refrigerator with that bottle in an ice bath, changing only the surrounding condition. The difference between the estimates is then easier to interpret. If you change the bottle size, beverage category and cooling method all at once, the result may move, but it will be unclear which change mattered most.</p>
            <p>Appliances and rooms do not always stay at one temperature. A refrigerator cycles, a freezer door opens, and an ice bath warms as it absorbs heat. The model treats the selected surroundings as a defined condition; it cannot track those changes over time. A packed fridge, a bottle against a cold wall, direct sunlight, or a container wrapped in a towel may behave differently from the simple scenario represented by the form.</p>
            <p>For an important serving time, use the estimate to decide when to begin checking, then measure. Record the actual time and temperature for your own drink and container if you repeat the process. That small note is more useful than treating a generic estimate as a universal rule. If the next batch uses a different container or starts at a different temperature, update those inputs rather than reusing the old time.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Which drinks can I estimate?', 'a' => <<<'TXT'
            Choose among the drink categories offered by the form, including water, soft drinks, juice, wine, beer and spirits. The available container and target choices depend on the selected category.
            TXT],
            ['q' => 'What information affects the chilling time?', 'a' => <<<'TXT'
            The selected drink, container, starting temperature, surrounding environment and target temperature all affect the modeled estimate. Use the closest available case and treat an unlisted package as an approximation.
            TXT],
            ['q' => 'Is the time exact?', 'a' => <<<'TXT'
            No. It is a model-based estimate, not a measurement. Container details, fill level, movement and real appliance conditions can make the actual time differ. Check with a thermometer when the temperature matters.
            TXT],
            ['q' => 'Does a chilling estimate confirm food safety?', 'a' => 'No. This calculator does not certify safe storage or handling. Follow authoritative food-safety guidance and use a thermometer for actual temperature checks.'],
            ['q' => 'Why are there separate air and water or ice-bath results?', 'a' => 'The surrounding medium affects heat transfer. Use the estimate that matches the method and conditions you actually selected.'],
        ],
        'related' => [
            ['path' => '/food/party-drink', 'name' => 'Party drink'],
            ['path' => '/food/wedding-alcohol', 'name' => 'Wedding alcohol'],
            ['path' => '/food/cold-brew-ratio', 'name' => 'Cold brew ratio']
        ],
    ],
];
