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
    'meta' => ['title' => 'Grain bin Calculator: Formula, Steps & Example', 'description' => 'Grain bin reports radius, volume of grain, grain volume in bushels and total grain weight. Nothing is stored between visits, and the working stays on the page.', 'h1' => 'Grain bin Calculator', 'updated' => '2026-08-06'],
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
                                ['t' => 'v', 'n' => 'radius', 'vt' => 'numerical', 'l' => 'Radius'],
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
        'intro' => <<<'TXT'
        Grain bin turns Grain weight into Roof height and Radius. Nothing is looked up on this page: roof height is computed from grain weight and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Roof height is opened in meters; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Grain bin calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Grain bin: it takes 2 numbers and reports Roof height, Radius and Sidewall height.</p><p>In the form&#039;s own words, Total grain weight = Grain weight × Volume of grain.</p><p>The result panel carries Roof height, Radius, Sidewall height and Length, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Grain weight</strong> — in kilograms per cubic meter. Test weight of grain</li><li><strong>Volume of grain</strong> — in cubic meters</li></ul><p>The result boxes are Roof height in meters, Radius in meters, Sidewall height in meters, Length in meters, Width in meters, Hopper height in meters, Grain volume in bushels in Bu, Volume of grain in cubic meters, Grain volume in bushels in Bu, Volume of grain in cubic meters, Grain volume in bushels in Bu, Volume of grain in cubic meters, Grain volume in bushels in Bu, Volume of grain, Grain volume in bushels, Volume of grain, Grain volume in bushels, Total grain weight in kilograms, Total grain weight in kilograms, Total grain weight in kilograms, Total grain weight in kilograms, Total grain weight in kilograms, Total grain weight in kilograms, Hopper conical vol, Topfill conical vol, Topfill curved vol; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Grain bin type = 0, Roof = 0, Diameter = 3 m and Hopper = 0 — through the same formula and the panel reports <strong>Radius</strong> = 1.5 m.</p><ul><li><strong>Radius</strong> = 1.5 m</li></ul><p>That is <strong>Total grain weight</strong> = <code>Grain weight × Volume of grain</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Radius</strong> = 1.5 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Roof height offers 9 units and opens on meters, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Total grain weight</strong> = <code>Grain weight × Volume of grain</code></li><li><strong>Grain weight</strong> = <code>Total grain weight ÷ Volume of grain</code></li><li><strong>Volume of grain</strong> = <code>Total grain weight ÷ Grain weight</code></li><li><strong>Radius</strong> = <code>((1 ÷ 2) × Diameter)</code></li><li><strong>Sidewall height</strong> = <code>Volume of grain ÷ (PI × ((((1 ÷ 2) × Diameter))^(2)))</code></li><li><strong>Grain volume in bushels</strong> = <code>(3893 ÷ 5000) × Volume of grain</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Total grain weight</strong> = <code>Grain weight × Volume of grain</code> — the form to use when Grain weight and Volume of grain are the values you have.</li><li><strong>Grain weight</strong> = <code>Total grain weight ÷ Volume of grain</code> — the form to use when Total grain weight and Volume of grain are the values you have.</li><li><strong>Volume of grain</strong> = <code>Total grain weight ÷ Grain weight</code> — the form to use when Grain weight and Total grain weight are the values you have.</li><li><strong>Total grain weight</strong> = <code>Grain weight × Volume of grain</code> — the form to use when Volume of grain and Grain weight are the values you have.</li><li><strong>Volume of grain</strong> = <code>Total grain weight ÷ Grain weight</code> — the form to use when Total grain weight and Grain weight are the values you have.</li><li><strong>Grain weight</strong> = <code>Total grain weight ÷ Volume of grain</code> — the form to use when Total grain weight and Volume of grain are the values you have.</li><li><strong>Total grain weight</strong> = <code>Grain weight × Volume of grain</code> — the form to use when Volume of grain and Grain weight are the values you have.</li><li><strong>Volume of grain</strong> = <code>Total grain weight ÷ Grain weight</code> — the form to use when Total grain weight and Grain weight are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Total grain weight, Grain weight and Volume of grain can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => ''],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Grain weight and Volume of grain is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Roof height, Radius and Sidewall height are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Grain weight left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Grain weight is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Volume of grain left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Volume of grain is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Grain weight is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Grain bin form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Grain weight</strong> is a kilograms per cubic meter quantity: the page opens it in kgm3 and converts anything else you pick before the formula runs. Test weight of grain. The page reads it when it works out Total grain weight, Volume of grain and Total grain weight. Fill it from a measurement rather than a memory — Grain weight is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Volume of grain</strong> is a cubic meters quantity: the page opens it in m3 and converts anything else you pick before the formula runs. The page reads it when it works out Grain weight, Total grain weight and Sidewall height. Fill it from a measurement rather than a memory — Volume of grain is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Grain weight and Volume of grain ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Grain weight — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Roof height in m against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Roof height is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The chips cover meters, cubic meters and kilograms. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Grain weight and Volume of grain is what you already know and Roof height and Radius is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/bone-length-to-body-height">Bone Length to Body Height Calculator</a>, <a href="/biology/bradford-assay-calculator">Bradford Assay (standard curve) Calculator</a> and <a href="/biology/henderson-hasselbalch-buffer">Buffer pH (Henderson–Hasselbalch) Calculator — Formula &amp; Resul</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Grain bin is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Grain bin calculator work out?', 'a' => <<<'TXT'
            Roof height, Radius, Sidewall height and Length, from Grain weight and Volume of grain. The relationship is Total grain weight = Grain weight × Volume of grain.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Grain weight (kilograms per cubic meter), Volume of grain (cubic meters). With grain weight and volume of grain in place, Roof height can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Total grain weight, Grain weight, Volume of grain and Total grain weight can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Radius = 1.5 m. That comes from the page\'s own defaults, entered in Grain weight; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Roof height is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Grain weight blank and the page solves for it, reporting Roof height instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Roof height at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/bone-length-to-body-height', 'name' => 'Bone Length to Body Height Calculator'],
            ['path' => '/biology/bradford-assay-calculator', 'name' => 'Bradford Assay (standard curve) Calculator'],
            ['path' => '/biology/henderson-hasselbalch-buffer', 'name' => 'Buffer pH (Henderson–Hasselbalch) Calculator — Formula & Resul'],
        ],
        'authors' => [],
    ],
];
