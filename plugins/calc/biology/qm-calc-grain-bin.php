<?php

/**
 * Grain bin
 * /biology/grain-bin
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Grain bin',
    'meta' => ['title' => 'Grain bin Calculator: Formula, Steps & Examples', 'description' => 'The Grain bin calculator turns the roof height, the diameter and more into <strong>grain weight</strong>. The Grain bin calculator takes the values in the…', 'h1' => 'Grain bin Calculator', 'updated' => '2026-08-06'],
    'raw' => [
        'vars' => [
            'diameter' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'grainBinVolume' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'car2RLBPFxoEIB52gjgpI', 'c' => null],
                ],
                'ds' => '7GuMr12JymVjuxW78sEuG',
            ],
            'grain_weight' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'height' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'height2' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '0', 'c' => null],
                    ['v' => '0', 'c' => 'userUsesImperialUnits()'],
                ],
            ],
            'height3' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '0', 'c' => null],
                    ['v' => '0', 'c' => 'userUsesImperialUnits()'],
                ],
            ],
            'hopper' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'p2y6b5wFpzTgDo7gyVby-', 'c' => null],
                ],
                'ds' => '0UZoSWgvwHBX9Qr6y5E87',
            ],
            'hopper_conical_vol' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'length' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'radius' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'rectangle_bin_bu' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'rectangle_bin_topfillconical_bu' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'rectangle_bin_topfillconical_vol' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'rectangle_bin_topfillcurved_bu' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'rectangle_bin_topfillcurved_vol' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'rectangle_bin_vol' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'round_bin_bu' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'round_bin_topfillconical_hopper_bu' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'round_bin_topfillconical_hopper_vol' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'round_bin_topfillcurved_hopper_bu' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'round_bin_topfillcurved_hopper_vol' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'round_bin_vol' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'topFill' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'knv81Zf6L3mRDKV9d1ije', 'c' => null],
                ],
                'ds' => 'E20O16AA3u1aNjDIy4I4M',
            ],
            'topfill_conical_vol' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'topfill_curved_vol' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'total_grain_weight_rectangle' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'total_grain_weight_rectangle_topfillconical' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'total_grain_weight_rectangle_topfillcurved' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'total_grain_weight_round' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'total_grain_weight_round_topfillconical' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'total_grain_weight_round_topfillcurved' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'width' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => '4IFNqSqyt1ySR_9eclmGR',
                'title' => 'Grain bin dimensions',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'grainBinVolume',
                                    'vt' => 'valueSelect',
                                    'l' => 'Grain bin type',
                                    'h' => 'Select the grain bin type — Round grain bins or Rectangle flat-bottom grain bin?',
                                    'ds' => '7GuMr12JymVjuxW78sEuG',
                                    'opts' => [
                                        ['car2RLBPFxoEIB52gjgpI', 'Round', '0'],
                                        ['I_CyfgpjkNm1Im7pBWgFS', 'Rectangular', '1'],
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
                                    'n' => 'topFill',
                                    'vt' => 'valueSelect',
                                    'l' => 'Roof',
                                    'h' => 'Choose the shape of grain bin roof.',
                                    'ds' => 'E20O16AA3u1aNjDIy4I4M',
                                    'opts' => [
                                        ['knv81Zf6L3mRDKV9d1ije', 'No', '0'],
                                        ['_IRPnPA4XJNGOOz4k_0Rh', 'Conical', '1'],
                                        ['mjuKdsoc2jniFhMMat0t5', 'Curved', '2'],
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
                                    'n' => 'height2',
                                    'vt' => 'numerical',
                                    'l' => 'Roof height',
                                    'h' => 'The peak height of the grain bin',
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
                                    'n' => 'diameter',
                                    'vt' => 'numerical',
                                    'l' => 'Diameter',
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
                                    'n' => 'radius',
                                    'vt' => 'numerical',
                                    'l' => 'Radius',
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
                                    'n' => 'height',
                                    'vt' => 'numerical',
                                    'l' => 'Sidewall height',
                                    'h' => 'Body height of the grain bin or height of grain.',
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
                                    'n' => 'length',
                                    'vt' => 'numerical',
                                    'l' => 'Length',
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
                                    'n' => 'width',
                                    'vt' => 'numerical',
                                    'l' => 'Width',
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
                                    'n' => 'hopper',
                                    'vt' => 'valueSelect',
                                    'l' => '',
                                    'ds' => '0UZoSWgvwHBX9Qr6y5E87',
                                    'opts' => [
                                        ['EiKymWAe4ObfJKSXCHsbf', 'The grain bin has a hopper', '1'],
                                        ['p2y6b5wFpzTgDo7gyVby-', '', '0'],
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
                                    'n' => 'height3',
                                    'vt' => 'numerical',
                                    'l' => 'Hopper height',
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
                                    'n' => 'grain_weight',
                                    'vt' => 'numerical',
                                    'l' => 'Grain weight',
                                    'h' => 'Test weight of grain',
                                    'us' => '33',
                                    'du' => 'kgm3',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => '6S-g6DjFKwGr_Ptta98hf',
                'title' => 'Volume and weight results',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'round_bin_vol',
                                    'vt' => 'numerical',
                                    'l' => 'Volume of grain',
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
                                    'n' => 'round_bin_bu',
                                    'vt' => 'numerical',
                                    'l' => 'Grain volume in bushels',
                                    'suf' => 'Bu',
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
                                    'n' => 'round_bin_topfillconical_hopper_vol',
                                    'vt' => 'numerical',
                                    'l' => 'Volume of grain',
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
                                    'n' => 'round_bin_topfillconical_hopper_bu',
                                    'vt' => 'numerical',
                                    'l' => 'Grain volume in bushels',
                                    'suf' => 'Bu',
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
                                    'n' => 'round_bin_topfillcurved_hopper_vol',
                                    'vt' => 'numerical',
                                    'l' => 'Volume of grain',
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
                                    'n' => 'round_bin_topfillcurved_hopper_bu',
                                    'vt' => 'numerical',
                                    'l' => 'Grain volume in bushels',
                                    'suf' => 'Bu',
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
                                    'n' => 'rectangle_bin_vol',
                                    'vt' => 'numerical',
                                    'l' => 'Volume of grain',
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
                                    'n' => 'rectangle_bin_bu',
                                    'vt' => 'numerical',
                                    'l' => 'Grain volume in bushels',
                                    'suf' => 'Bu',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'rectangle_bin_topfillconical_vol', 'vt' => 'numerical', 'l' => 'Volume of grain'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'rectangle_bin_topfillconical_bu', 'vt' => 'numerical', 'l' => 'Grain volume in bushels'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'rectangle_bin_topfillcurved_vol', 'vt' => 'numerical', 'l' => 'Volume of grain'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'rectangle_bin_topfillcurved_bu', 'vt' => 'numerical', 'l' => 'Grain volume in bushels'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'total_grain_weight_round',
                                    'vt' => 'numerical',
                                    'l' => 'Total grain weight',
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
                                    'n' => 'total_grain_weight_rectangle',
                                    'vt' => 'numerical',
                                    'l' => 'Total grain weight',
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
                                    'n' => 'total_grain_weight_round_topfillconical',
                                    'vt' => 'numerical',
                                    'l' => 'Total grain weight',
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
                                    'n' => 'total_grain_weight_round_topfillcurved',
                                    'vt' => 'numerical',
                                    'l' => 'Total grain weight',
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
                                    'n' => 'total_grain_weight_rectangle_topfillconical',
                                    'vt' => 'numerical',
                                    'l' => 'Total grain weight',
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
                                    'n' => 'total_grain_weight_rectangle_topfillcurved',
                                    'vt' => 'numerical',
                                    'l' => 'Total grain weight',
                                    'us' => '22',
                                    'du' => 'kg',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'GD78eozM1qjfKTNOYqSyD',
                'title' => 'hidden variables',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'hopper_conical_vol', 'vt' => 'numerical', 'l' => 'Hopper conical vol'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'topfill_conical_vol', 'vt' => 'numerical', 'l' => 'Topfill conical vol'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'topfill_curved_vol', 'vt' => 'numerical', 'l' => 'Topfill curved vol'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'total_grain_weight_round = round_bin_vol * grain_weight',
                'var' => [
                    [
                        'l' => 'grain_weight',
                        'f' => 'total_grain_weight_round/round_bin_vol',
                        'r' => ['total_grain_weight_round', 'round_bin_vol'],
                    ],
                    [
                        'l' => 'total_grain_weight_round',
                        'f' => 'grain_weight*round_bin_vol',
                        'r' => ['grain_weight', 'round_bin_vol'],
                    ],
                    [
                        'l' => 'round_bin_vol',
                        'f' => 'total_grain_weight_round/grain_weight',
                        'r' => ['grain_weight', 'total_grain_weight_round'],
                    ],
                ],
            ],
            [
                'formula' => 'total_grain_weight_rectangle = rectangle_bin_vol * grain_weight',
                'var' => [
                    [
                        'l' => 'total_grain_weight_rectangle',
                        'f' => 'grain_weight*rectangle_bin_vol',
                        'r' => ['rectangle_bin_vol', 'grain_weight'],
                    ],
                    [
                        'l' => 'rectangle_bin_vol',
                        'f' => 'total_grain_weight_rectangle/grain_weight',
                        'r' => ['total_grain_weight_rectangle', 'grain_weight'],
                    ],
                    [
                        'l' => 'grain_weight',
                        'f' => 'total_grain_weight_rectangle/rectangle_bin_vol',
                        'r' => ['total_grain_weight_rectangle', 'rectangle_bin_vol'],
                    ],
                ],
            ],
            [
                'formula' => 'total_grain_weight_round_topfillconical = round_bin_topfillconical_hopper_vol * grain_weight',
                'var' => [
                    [
                        'l' => 'round_bin_topfillconical_hopper_vol',
                        'f' => 'total_grain_weight_round_topfillconical/grain_weight',
                        'r' => ['total_grain_weight_round_topfillconical', 'grain_weight'],
                    ],
                    [
                        'l' => 'total_grain_weight_round_topfillconical',
                        'f' => 'grain_weight*round_bin_topfillconical_hopper_vol',
                        'r' => ['round_bin_topfillconical_hopper_vol', 'grain_weight'],
                    ],
                    [
                        'l' => 'grain_weight',
                        'f' => 'total_grain_weight_round_topfillconical/round_bin_topfillconical_hopper_vol',
                        'r' => ['round_bin_topfillconical_hopper_vol', 'total_grain_weight_round_topfillconical'],
                    ],
                ],
            ],
            [
                'formula' => 'total_grain_weight_round_topfillcurved = round_bin_topfillcurved_hopper_vol * grain_weight',
                'var' => [
                    [
                        'l' => 'total_grain_weight_round_topfillcurved',
                        'f' => 'grain_weight*round_bin_topfillcurved_hopper_vol',
                        'r' => ['round_bin_topfillcurved_hopper_vol', 'grain_weight'],
                    ],
                    [
                        'l' => 'round_bin_topfillcurved_hopper_vol',
                        'f' => 'total_grain_weight_round_topfillcurved/grain_weight',
                        'r' => ['total_grain_weight_round_topfillcurved', 'grain_weight'],
                    ],
                    [
                        'l' => 'grain_weight',
                        'f' => 'total_grain_weight_round_topfillcurved/round_bin_topfillcurved_hopper_vol',
                        'r' => ['total_grain_weight_round_topfillcurved', 'round_bin_topfillcurved_hopper_vol'],
                    ],
                ],
            ],
            [
                'formula' => 'total_grain_weight_rectangle_topfillconical = rectangle_bin_topfillconical_vol * grain_weight',
                'var' => [
                    [
                        'l' => 'total_grain_weight_rectangle_topfillconical',
                        'f' => 'grain_weight*rectangle_bin_topfillconical_vol',
                        'r' => ['rectangle_bin_topfillconical_vol', 'grain_weight'],
                    ],
                    [
                        'l' => 'rectangle_bin_topfillconical_vol',
                        'f' => 'total_grain_weight_rectangle_topfillconical/grain_weight',
                        'r' => ['total_grain_weight_rectangle_topfillconical', 'grain_weight'],
                    ],
                    [
                        'l' => 'grain_weight',
                        'f' => 'total_grain_weight_rectangle_topfillconical/rectangle_bin_topfillconical_vol',
                        'r' => ['total_grain_weight_rectangle_topfillconical', 'rectangle_bin_topfillconical_vol'],
                    ],
                ],
            ],
            [
                'formula' => 'total_grain_weight_rectangle_topfillcurved = rectangle_bin_topfillcurved_vol * grain_weight',
                'var' => [
                    [
                        'l' => 'rectangle_bin_topfillcurved_vol',
                        'f' => 'total_grain_weight_rectangle_topfillcurved/grain_weight',
                        'r' => ['total_grain_weight_rectangle_topfillcurved', 'grain_weight'],
                    ],
                    [
                        'l' => 'total_grain_weight_rectangle_topfillcurved',
                        'f' => 'grain_weight*rectangle_bin_topfillcurved_vol',
                        'r' => ['rectangle_bin_topfillcurved_vol', 'grain_weight'],
                    ],
                    [
                        'l' => 'grain_weight',
                        'f' => 'total_grain_weight_rectangle_topfillcurved/rectangle_bin_topfillcurved_vol',
                        'r' => ['rectangle_bin_topfillcurved_vol', 'total_grain_weight_rectangle_topfillcurved'],
                    ],
                ],
            ],
            [
                'formula' => 'radius = one_way(diameter/2)',
                'var' => [
                    [
                        'l' => 'radius',
                        'f' => '((1/2)*diameter)',
                        'r' => ['diameter'],
                    ],
                ],
            ],
            [
                'formula' => 'round_bin_vol = pi * one_way(radius^2) * height',
                'var' => [
                    [
                        'l' => 'height',
                        'f' => 'round_bin_vol/(PI*(pow(((1/2)*diameter), 2)))',
                        'r' => ['round_bin_vol', 'diameter'],
                    ],
                    [
                        'l' => 'round_bin_vol',
                        'f' => 'PI*height*(pow(((1/2)*diameter), 2))',
                        'r' => ['height', 'diameter'],
                    ],
                ],
            ],
            [
                'formula' => 'round_bin_bu = round_bin_vol * 0.7786',
                'var' => [
                    [
                        'l' => 'round_bin_bu',
                        'f' => '(3893/5000)*round_bin_vol',
                        'r' => ['round_bin_vol'],
                    ],
                    [
                        'l' => 'round_bin_vol',
                        'f' => '(5000/3893)*round_bin_bu',
                        'r' => ['round_bin_bu'],
                    ],
                ],
            ],
            [
                'formula' => 'rectangle_bin_vol = length * width * height',
                'var' => [
                    [
                        'l' => 'length',
                        'f' => 'rectangle_bin_vol/(height*width)',
                        'r' => ['height', 'rectangle_bin_vol', 'width'],
                    ],
                    [
                        'l' => 'height',
                        'f' => 'rectangle_bin_vol/(length*width)',
                        'r' => ['length', 'rectangle_bin_vol', 'width'],
                    ],
                    [
                        'l' => 'rectangle_bin_vol',
                        'f' => 'height*length*width',
                        'r' => ['length', 'height', 'width'],
                    ],
                    [
                        'l' => 'width',
                        'f' => 'rectangle_bin_vol/(height*length)',
                        'r' => ['length', 'height', 'rectangle_bin_vol'],
                    ],
                ],
            ],
            [
                'formula' => 'rectangle_bin_bu = rectangle_bin_vol * 0.7786',
                'var' => [
                    [
                        'l' => 'rectangle_bin_vol',
                        'f' => '(5000/3893)*rectangle_bin_bu',
                        'r' => ['rectangle_bin_bu'],
                    ],
                    [
                        'l' => 'rectangle_bin_bu',
                        'f' => '(3893/5000)*rectangle_bin_vol',
                        'r' => ['rectangle_bin_vol'],
                    ],
                ],
            ],
            [
                'formula' => 'topfill_conical_vol = 0.3333 * pi * one_way(radius^2) * height2',
                'var' => [
                    [
                        'l' => 'topfill_conical_vol',
                        'f' => '(3333/10000)*PI*height2*(pow(((1/2)*diameter), 2))',
                        'r' => ['height2', 'diameter'],
                    ],
                    [
                        'l' => 'height2',
                        'f' => '(10000/3333)*topfill_conical_vol/(PI*(pow(((1/2)*diameter), 2)))',
                        'r' => ['topfill_conical_vol', 'diameter'],
                    ],
                ],
            ],
            [
                'formula' => 'topfill_curved_vol = pi * one_way(radius^2) * ((0.6666) * radius + height2)',
                'var' => [
                    [
                        'l' => 'topfill_curved_vol',
                        'f' => '(1/5000)*PI*(5000*height2 + 3333*((1/2)*diameter))*(pow(((1/2)*diameter), 2))',
                        'r' => ['height2', 'diameter'],
                    ],
                    [
                        'l' => 'height2',
                        'f' => 'topfill_curved_vol/(PI*(pow(((1/2)*diameter), 2))) - 3333/5000*((1/2)*diameter)',
                        'r' => ['topfill_curved_vol', 'diameter'],
                    ],
                ],
            ],
            [
                'formula' => 'hopper_conical_vol = 0.3333 * pi * one_way(radius^2) * height3',
                'var' => [
                    [
                        'l' => 'height3',
                        'f' => '(10000/3333)*hopper_conical_vol/(PI*(pow(((1/2)*diameter), 2)))',
                        'r' => ['hopper_conical_vol', 'diameter'],
                    ],
                    [
                        'l' => 'hopper_conical_vol',
                        'f' => '(3333/10000)*PI*height3*(pow(((1/2)*diameter), 2))',
                        'r' => ['height3', 'diameter'],
                    ],
                ],
            ],
            [
                'formula' => 'round_bin_topfillconical_hopper_vol = round_bin_vol + (topfill_conical_vol) + (hopper_conical_vol)',
                'var' => [
                    [
                        'l' => 'round_bin_topfillconical_hopper_vol',
                        'f' => 'hopper_conical_vol + round_bin_vol + topfill_conical_vol',
                        'r' => ['topfill_conical_vol', 'hopper_conical_vol', 'round_bin_vol'],
                    ],
                    [
                        'l' => 'topfill_conical_vol',
                        'f' => '-hopper_conical_vol + round_bin_topfillconical_hopper_vol - round_bin_vol',
                        'r' => ['round_bin_topfillconical_hopper_vol', 'hopper_conical_vol', 'round_bin_vol'],
                    ],
                    [
                        'l' => 'hopper_conical_vol',
                        'f' => 'round_bin_topfillconical_hopper_vol - round_bin_vol - topfill_conical_vol',
                        'r' => ['round_bin_topfillconical_hopper_vol', 'topfill_conical_vol', 'round_bin_vol'],
                    ],
                    [
                        'l' => 'round_bin_vol',
                        'f' => '-hopper_conical_vol + round_bin_topfillconical_hopper_vol - topfill_conical_vol',
                        'r' => ['round_bin_topfillconical_hopper_vol', 'topfill_conical_vol', 'hopper_conical_vol'],
                    ],
                ],
            ],
            [
                'formula' => 'round_bin_topfillconical_hopper_bu = round_bin_topfillconical_hopper_vol * 0.7786',
                'var' => [
                    [
                        'l' => 'round_bin_topfillconical_hopper_vol',
                        'f' => '(5000/3893)*round_bin_topfillconical_hopper_bu',
                        'r' => ['round_bin_topfillconical_hopper_bu'],
                    ],
                    [
                        'l' => 'round_bin_topfillconical_hopper_bu',
                        'f' => '(3893/5000)*round_bin_topfillconical_hopper_vol',
                        'r' => ['round_bin_topfillconical_hopper_vol'],
                    ],
                ],
            ],
            [
                'formula' => 'round_bin_topfillcurved_hopper_vol = round_bin_vol + (topfill_curved_vol) + (hopper_conical_vol)',
                'var' => [
                    [
                        'l' => 'round_bin_topfillcurved_hopper_vol',
                        'f' => 'hopper_conical_vol + round_bin_vol + topfill_curved_vol',
                        'r' => ['topfill_curved_vol', 'hopper_conical_vol', 'round_bin_vol'],
                    ],
                    [
                        'l' => 'topfill_curved_vol',
                        'f' => '-hopper_conical_vol + round_bin_topfillcurved_hopper_vol - round_bin_vol',
                        'r' => ['round_bin_topfillcurved_hopper_vol', 'hopper_conical_vol', 'round_bin_vol'],
                    ],
                    [
                        'l' => 'hopper_conical_vol',
                        'f' => 'round_bin_topfillcurved_hopper_vol - round_bin_vol - topfill_curved_vol',
                        'r' => ['round_bin_topfillcurved_hopper_vol', 'topfill_curved_vol', 'round_bin_vol'],
                    ],
                    [
                        'l' => 'round_bin_vol',
                        'f' => '-hopper_conical_vol + round_bin_topfillcurved_hopper_vol - topfill_curved_vol',
                        'r' => ['round_bin_topfillcurved_hopper_vol', 'topfill_curved_vol', 'hopper_conical_vol'],
                    ],
                ],
            ],
            [
                'formula' => 'round_bin_topfillcurved_hopper_bu = round_bin_topfillcurved_hopper_vol * 0.7786',
                'var' => [
                    [
                        'l' => 'round_bin_topfillcurved_hopper_bu',
                        'f' => '(3893/5000)*round_bin_topfillcurved_hopper_vol',
                        'r' => ['round_bin_topfillcurved_hopper_vol'],
                    ],
                    [
                        'l' => 'round_bin_topfillcurved_hopper_vol',
                        'f' => '(5000/3893)*round_bin_topfillcurved_hopper_bu',
                        'r' => ['round_bin_topfillcurved_hopper_bu'],
                    ],
                ],
            ],
            [
                'formula' => 'rectangle_bin_topfillconical_vol = rectangle_bin_vol + topfill_conical_vol',
                'var' => [
                    [
                        'l' => 'topfill_conical_vol',
                        'f' => 'rectangle_bin_topfillconical_vol - rectangle_bin_vol',
                        'r' => ['rectangle_bin_vol', 'rectangle_bin_topfillconical_vol'],
                    ],
                    [
                        'l' => 'rectangle_bin_vol',
                        'f' => 'rectangle_bin_topfillconical_vol - topfill_conical_vol',
                        'r' => ['topfill_conical_vol', 'rectangle_bin_topfillconical_vol'],
                    ],
                    [
                        'l' => 'rectangle_bin_topfillconical_vol',
                        'f' => 'rectangle_bin_vol + topfill_conical_vol',
                        'r' => ['topfill_conical_vol', 'rectangle_bin_vol'],
                    ],
                ],
            ],
            [
                'formula' => 'rectangle_bin_topfillconical_bu = rectangle_bin_topfillconical_vol * 0.7786',
                'var' => [
                    [
                        'l' => 'rectangle_bin_topfillconical_bu',
                        'f' => '(3893/5000)*rectangle_bin_topfillconical_vol',
                        'r' => ['rectangle_bin_topfillconical_vol'],
                    ],
                    [
                        'l' => 'rectangle_bin_topfillconical_vol',
                        'f' => '(5000/3893)*rectangle_bin_topfillconical_bu',
                        'r' => ['rectangle_bin_topfillconical_bu'],
                    ],
                ],
            ],
            [
                'formula' => 'rectangle_bin_topfillcurved_vol = rectangle_bin_vol + topfill_curved_vol',
                'var' => [
                    [
                        'l' => 'rectangle_bin_topfillcurved_vol',
                        'f' => 'rectangle_bin_vol + topfill_curved_vol',
                        'r' => ['topfill_curved_vol', 'rectangle_bin_vol'],
                    ],
                    [
                        'l' => 'topfill_curved_vol',
                        'f' => 'rectangle_bin_topfillcurved_vol - rectangle_bin_vol',
                        'r' => ['rectangle_bin_topfillcurved_vol', 'rectangle_bin_vol'],
                    ],
                    [
                        'l' => 'rectangle_bin_vol',
                        'f' => 'rectangle_bin_topfillcurved_vol - topfill_curved_vol',
                        'r' => ['rectangle_bin_topfillcurved_vol', 'topfill_curved_vol'],
                    ],
                ],
            ],
            [
                'formula' => 'rectangle_bin_topfillcurved_bu = rectangle_bin_topfillcurved_vol * 0.7786',
                'var' => [
                    [
                        'l' => 'rectangle_bin_topfillcurved_vol',
                        'f' => '(5000/3893)*rectangle_bin_topfillcurved_bu',
                        'r' => ['rectangle_bin_topfillcurved_bu'],
                    ],
                    [
                        'l' => 'rectangle_bin_topfillcurved_bu',
                        'f' => '(3893/5000)*rectangle_bin_topfillcurved_vol',
                        'r' => ['rectangle_bin_topfillcurved_vol'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            '7GuMr12JymVjuxW78sEuG' => [
                'name' => 'Grain bin type',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'car2RLBPFxoEIB52gjgpI', 'label' => 'Round', 'value' => '0'],
                    ['uid' => 'I_CyfgpjkNm1Im7pBWgFS', 'label' => 'Rectangular', 'value' => '1'],
                ],
            ],
            'E20O16AA3u1aNjDIy4I4M' => [
                'name' => 'Roof',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'knv81Zf6L3mRDKV9d1ije', 'label' => 'No', 'value' => '0'],
                    ['uid' => '_IRPnPA4XJNGOOz4k_0Rh', 'label' => 'Conical', 'value' => '1'],
                    ['uid' => 'mjuKdsoc2jniFhMMat0t5', 'label' => 'Curved', 'value' => '2'],
                ],
            ],
            '0UZoSWgvwHBX9Qr6y5E87' => [
                'name' => 'Hopper',
                'uiType' => 'CHECKBOX',
                'options' => [
                    ['uid' => 'EiKymWAe4ObfJKSXCHsbf', 'label' => 'The grain bin has a hopper', 'value' => '1'],
                    ['uid' => 'p2y6b5wFpzTgDo7gyVby-', 'label' => '', 'value' => '0'],
                ],
            ],
        ],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => 'The Grain bin calculator turns the roof height, the diameter and more into <strong>grain weight</strong>.',
        'sections' => [
            ['title' => 'How does the Grain bin calculator work?', 'html' => <<<'TXT'
            <p>The Grain bin calculator takes the values in the form, applies the relationship described below and reports <strong>grain weight</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the grain bin type and the roof); then you type in the roof height, the diameter, the width and the volume of grain (Volume and weight results).</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 2 options, such as round and rectangular. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>Pick the option that matches your case — 3 options, such as no, conical and curved. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li> The unit chip switches it to any of the 34 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li><li>A single on/off switch — tick it for &ldquo;The grain bin has a hopper&rdquo;, leave it clear for the other case. It changes which relationship the calculator applies, not just a multiplier.</li><li>A measured quantity, entered by default in cubic meters. The unit chip switches it to any of the 40 supported units.</li><li>A number, expressed in Bu.</li></ul><p>3 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Grain bin type</strong></td><td>One of 2 options, such as round and rectangular.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Roof</strong></td><td>One of 3 options, such as no, conical and curved.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Roof height</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>You supply it</td></tr><tr><td><strong>Diameter</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>You supply it</td></tr><tr><td><strong>Radius</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>Calculated</td></tr><tr><td><strong>Sidewall height</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>Calculated</td></tr><tr><td><strong>Length</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>Calculated</td></tr><tr><td><strong>Width</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>You supply it</td></tr><tr><td><strong>Hopper height</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>Calculated</td></tr><tr><td><strong>Grain weight</strong></td><td>A measured quantity, 9 units available.</td><td>kilograms per cubic meter</td><td>Calculated</td></tr><tr><td><strong>Volume of grain (Volume and weight results)</strong></td><td>A measured quantity, 40 units available.</td><td>cubic meters</td><td>You supply it</td></tr><tr><td><strong>Grain volume in bushels (Volume and weight results)</strong></td><td>A number stated in Bu.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Volume of grain (Volume and weight results)</strong></td><td>A measured quantity, 40 units available.</td><td>cubic meters</td><td>Calculated</td></tr><tr><td><strong>Grain volume in bushels (Volume and weight results)</strong></td><td>A number stated in Bu.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Volume of grain (Volume and weight results)</strong></td><td>A measured quantity, 40 units available.</td><td>cubic meters</td><td>Calculated</td></tr><tr><td><strong>Grain volume in bushels (Volume and weight results)</strong></td><td>A number stated in Bu.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Volume of grain (Volume and weight results)</strong></td><td>A measured quantity, 40 units available.</td><td>cubic meters</td><td>Calculated</td></tr><tr><td><strong>Grain volume in bushels (Volume and weight results)</strong></td><td>A number stated in Bu.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Volume of grain (Volume and weight results)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Grain volume in bushels (Volume and weight results)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Volume of grain (Volume and weight results)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Grain volume in bushels (Volume and weight results)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Total grain weight (Volume and weight results)</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>You supply it</td></tr><tr><td><strong>Total grain weight (Volume and weight results)</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>Calculated</td></tr></tbody></table><p>The table lists the first 24 of 31 fields; the rest follow the same pattern.</p>
            TXT],
            ['title' => 'The formula behind the Grain bin calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Grain weight</span><span class="formula-eq">=</span><span class="formula-rhs">total grain weight ÷ volume of grain</span></div><div class="formula-row"><span class="formula-lhs">Total grain weight</span><span class="formula-eq">=</span><span class="formula-rhs">grain weight × volume of grain</span></div><div class="formula-row"><span class="formula-lhs">Volume of grain</span><span class="formula-eq">=</span><span class="formula-rhs">total grain weight ÷ grain weight</span></div><div class="formula-row"><span class="formula-lhs">Radius</span><span class="formula-eq">=</span><span class="formula-rhs">((1 ÷ 2) × diameter)</span></div><div class="formula-row"><span class="formula-lhs">Sidewall height</span><span class="formula-eq">=</span><span class="formula-rhs">volume of grain ÷ (PI × ((((1 ÷ 2) × diameter), 2)))</span></div><div class="formula-row"><span class="formula-lhs">Grain volume in bushels</span><span class="formula-eq">=</span><span class="formula-rhs">(3893 ÷ 5000) × volume of grain</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What is a worked example?', 'html' => <<<'TXT'
            <p>Take <strong>Grain bin type</strong> set to Round, <strong>Roof</strong> set to No, <strong>Roof height</strong> = 0 m and <strong>Diameter</strong> = 30 m. The calculator returns <strong>Radius</strong> = 15 m.</p><p>The point of the example is the scale, not the particular digits: swap in your own figures and the same relationship produces your answer.</p><ol><li>Enter the values listed above, matching the units each box asks for.</li><li>Read off the result. Any field you leave empty is the one the calculator solves for.</li><li>Sanity-check the number against the relationship: <strong>Radius</strong> = 15 m should be roughly the size you expected from <strong>Grain bin type</strong> set to Round and <strong>Roof</strong> set to No.</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in kilograms per cubic meter, and convertible to any of the 9 units on that chip.</li><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li><li>Shown in cubic meters, and convertible to any of the 40 units on that chip.</li><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in meters, and convertible to any of the 34 units on that chip.</li><li>Shown in meters, and convertible to any of the 34 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in meters, and convertible to any of the 34 units on that chip.</li><li>Shown in cubic meters, and convertible to any of the 40 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in meters</li><li>Length, opening in meters</li><li>Length, opening in meters</li><li>Length, opening in meters</li><li>Length, opening in meters</li><li>Length, opening in meters</li><li>Length, opening in meters</li><li>Density, opening in kilograms per cubic meter</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Grain bin calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Putting a biological quantity into a scale you can picture</li><li>Comparing two organisms, populations or processes</li><li>Supporting a lesson, a lecture or a field note</li><li>Any time the same 4 figures keep coming back — the roof height, the diameter and the width — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li><li>Write the answer down with its unit. </li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/grain-conversion">Grain conversion</a>, <a href="/biology/grass-seed">Grass seed</a> and <a href="/biology/guinea-pig-age">Guinea pig years to human years</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Grain bin calculator work out?', 'a' => <<<'TXT'
            It returns grain weight, derived from the roof height, the diameter and the width. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Grain bin calculator?', 'a' => <<<'TXT'
            The form asks for the roof height, the diameter, the width and the volume of grain, which is 11 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter roof height in a different unit?', 'a' => <<<'TXT'
            Yes. Roof height opens in meters and the chip beside it offers 34 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There are several choices to make (3 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'What is a typical result?', 'a' => <<<'TXT'
            With the values the page starts from, the calculator reports Radius = 15 m. Treat that as a reference point rather than a recommendation: it exists so you can tell at a glance whether your own inputs are on the same scale.
            TXT],
            ['q' => 'Is the Grain bin calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/grain-conversion', 'name' => 'Grain conversion'],
            ['path' => '/biology/grass-seed', 'name' => 'Grass seed'],
            ['path' => '/biology/guinea-pig-age', 'name' => 'Guinea pig years to human years'],
        ],
    ],
];
