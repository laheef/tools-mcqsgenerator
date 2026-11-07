<?php

/**
 * Wastewater
 * /biology/wastewater
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Wastewater',
    'meta' => ['title' => 'Wastewater Calculator: Formula, Steps & Examples', 'description' => 'Wastewater turns Average untreated influent COD and Average primary treated COD into Influent SS weight and Average untreated influent BOD.', 'h1' => 'Wastewater Calculator', 'updated' => '2026-08-12'],
    'raw' => [
        'vars' => [
            'SS_lbs_influent' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'SS_lbs_leaving' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'aeration_vol_mg' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'average_primary_treated_bod' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'average_primary_treated_cod' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'average_untreated_influent_bod' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'average_untreated_influent_cod' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'bod_lb_day' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'bod_or_cod' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'QeLjjpQrmuAFEawRCiiDk', 'c' => null],
                ],
                'ds' => 'Y6rdzfBjpDe6s0mEfABtk',
            ],
            'calculation_type' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'CvmMwmtYYDiXNMToHX8Xw', 'c' => null],
                ],
                'ds' => '7c7eHN5GSvkpmEK20wseW',
            ],
            'clarifier_vol_mg' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'clarifier_volume' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'W499kOkFTlv2I7DzbLUOe', 'c' => null],
                ],
                'ds' => 'pjX3R3xQVUoBcI5odMQ0V',
            ],
            'cod_lb_day' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'effluence_flow' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'effluence_sludge' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'effluent_flow' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'flow_through' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'fm_ratio_bod' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'fm_ratio_cod' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'free_board' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'free_board_2_clarifier' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'hrt' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'length_2_clarifier' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'length_tank' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'mcrt' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'mlss' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'mlss_lbs_aeration' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'mlss_lbs_total' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'mlvss_bod' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'mlvss_cod' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'mlvss_lbs_bod' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'mlvss_lbs_cod' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'pri_clarifier_effluent_SS' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'primary_effluent_bod' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'primary_effluent_cod' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'settled_solids' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'side_wall_depth' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'side_wall_depth_2_clarifier' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'sludge_age' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'svi' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'volume' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'W499kOkFTlv2I7DzbLUOe', 'c' => null],
                ],
                'ds' => 'pjX3R3xQVUoBcI5odMQ0V',
            ],
            'wasted_flow' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'wasted_sludge' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'width_2_clarifier' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'width_tank' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => '1BrM1jRlsQzaIuMsh--J9',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'calculation_type',
                                    'vt' => 'valueSelect',
                                    'l' => 'I\'d like to find...',
                                    'ds' => '7c7eHN5GSvkpmEK20wseW',
                                    'opts' => [
                                        ['CvmMwmtYYDiXNMToHX8Xw', 'F/M ratio/MLVSS', '1'],
                                        ['Q2xt-kDoJ0M6yPsJIKGkQ', 'HRT (hydraulic retention time)', '2'],
                                        ['uqJLRxGnji8rM1Dflj2-h', 'MCRT (mean cell residence time)', '3'],
                                        ['GKT4SSMNs0EL93YqVoQn-', 'Sludge age', '4'],
                                        ['hxp25T2C6TmH87yR6cwVZ', 'SVI (sludge volume index)', '5'],
                                        ['fNgXlfOY9DD5TZIm9QDyx', 'Everything', '6'],
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
                                    'n' => 'bod_or_cod',
                                    'vt' => 'valueSelect',
                                    'l' => 'using...',
                                    'ds' => 'Y6rdzfBjpDe6s0mEfABtk',
                                    'opts' => [
                                        ['QeLjjpQrmuAFEawRCiiDk', 'BOD (biochemical oxygen demand)', '1'],
                                        ['jlA2uTWpAWPRa54Qi46Gy', 'COD (chemical oxygen demand)', '2'],
                                        ['IPsoq6J7VUSdWQ3NQ8RCw', 'Both', '3'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'ZXWmKbXCEr6TsmKmsvnnl',
                'title' => 'Primary clarifier',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'SS_lbs_influent',
                                    'vt' => 'numerical',
                                    'l' => 'Influent SS weight',
                                    'h' => 'Weight of suspended solids flowing in.',
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
                                    'n' => 'average_untreated_influent_bod',
                                    'vt' => 'numerical',
                                    'l' => 'Average untreated influent BOD',
                                    'us' => '21',
                                    'du' => 'gperL',
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
                                    'n' => 'average_untreated_influent_cod',
                                    'vt' => 'numerical',
                                    'l' => 'Average untreated influent COD',
                                    'us' => '21',
                                    'du' => 'gperL',
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
                                    'n' => 'average_primary_treated_bod',
                                    'vt' => 'numerical',
                                    'l' => 'Average primary treated BOD',
                                    'us' => '21',
                                    'du' => 'gperL',
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
                                    'n' => 'average_primary_treated_cod',
                                    'vt' => 'numerical',
                                    'l' => 'Average primary treated COD',
                                    'us' => '21',
                                    'du' => 'gperL',
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
                                    'n' => 'primary_effluent_bod',
                                    'vt' => 'numerical',
                                    'l' => 'Effluent BOD',
                                    'us' => '21',
                                    'du' => 'gperL',
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
                                    'n' => 'primary_effluent_cod',
                                    'vt' => 'numerical',
                                    'l' => 'Effluent COD',
                                    'us' => '21',
                                    'du' => 'gperL',
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
                                    'n' => 'effluent_flow',
                                    'vt' => 'numerical',
                                    'l' => 'Effluent flow',
                                    'h' => 'Also the influent flow into the aeration tank.',
                                    'us' => '146',
                                    'du' => 'm-day',
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
                                    'n' => 'pri_clarifier_effluent_SS',
                                    'vt' => 'numerical',
                                    'l' => 'Effluent SS concentration',
                                    'h' => 'Suspended solids concentration exiting the primary clarifier.',
                                    'us' => '21',
                                    'du' => 'mgpL',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'ohEgij4El7Vn8zXgRfHHM',
                'title' => 'Aeration tank',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'volume',
                                    'vt' => 'valueSelect',
                                    'l' => 'Is the volume known?',
                                    'ds' => 'pjX3R3xQVUoBcI5odMQ0V',
                                    'opts' => [
                                        ['1H3nfboQGGGha4V74TrHb', 'No', '0'],
                                        ['W499kOkFTlv2I7DzbLUOe', 'Yes', '1'],
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
                                    'n' => 'length_tank',
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
                                    'n' => 'width_tank',
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
                                    'n' => 'side_wall_depth',
                                    'vt' => 'numerical',
                                    'l' => 'Side wall depth',
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
                                    'n' => 'free_board',
                                    'vt' => 'numerical',
                                    'l' => 'Free-board',
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
                                    'n' => 'aeration_vol_mg',
                                    'vt' => 'numerical',
                                    'l' => 'Volume',
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
                                    'n' => 'flow_through',
                                    'vt' => 'numerical',
                                    'l' => 'Flow rate through tank',
                                    'us' => '146',
                                    'du' => 'm-hour',
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
                                    'n' => 'bod_lb_day',
                                    'vt' => 'numerical',
                                    'l' => 'BOD loading',
                                    'h' => 'The BOD added to aeration.',
                                    'us' => '147',
                                    'du' => 'kgd',
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
                                    'n' => 'cod_lb_day',
                                    'vt' => 'numerical',
                                    'l' => 'COD loading',
                                    'h' => 'The COD added to aeration.',
                                    'us' => '147',
                                    'du' => 'kgd',
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
                                    'n' => 'hrt',
                                    'vt' => 'numerical',
                                    'l' => 'HRT',
                                    'h' => 'Hydraulic retention time.',
                                    'us' => '19',
                                    'du' => 'hrsmin',
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
                                    'n' => 'mlss_lbs_aeration',
                                    'vt' => 'numerical',
                                    'l' => 'MLSS weight',
                                    'h' => 'Weight of suspended solids.',
                                    'us' => '22',
                                    'du' => 'kg',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'G9DJHm194_Nst6APxyGng',
                'title' => 'Secondary clarifiers',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'clarifier_volume',
                                    'vt' => 'valueSelect',
                                    'l' => 'Is the volume known?',
                                    'ds' => 'pjX3R3xQVUoBcI5odMQ0V',
                                    'opts' => [
                                        ['1H3nfboQGGGha4V74TrHb', 'No', '0'],
                                        ['W499kOkFTlv2I7DzbLUOe', 'Yes', '1'],
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
                                    'n' => 'length_2_clarifier',
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
                                    'n' => 'width_2_clarifier',
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
                                    'n' => 'side_wall_depth_2_clarifier',
                                    'vt' => 'numerical',
                                    'l' => 'Side wall depth',
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
                                    'n' => 'free_board_2_clarifier',
                                    'vt' => 'numerical',
                                    'l' => 'Free-board',
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
                                    'n' => 'clarifier_vol_mg',
                                    'vt' => 'numerical',
                                    'l' => 'Volume',
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
                                    'n' => 'effluence_flow',
                                    'vt' => 'numerical',
                                    'l' => 'Flow of secondary effluence',
                                    'us' => '146',
                                    'du' => 'm-day',
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
                                    'n' => 'effluence_sludge',
                                    'vt' => 'numerical',
                                    'l' => 'Solids in secondary effluence',
                                    'us' => '21',
                                    'du' => 'gperL',
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
                                    'n' => 'wasted_flow',
                                    'vt' => 'numerical',
                                    'l' => 'Flow of waste sludge',
                                    'us' => '146',
                                    'du' => 'm-day',
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
                                    'n' => 'wasted_sludge',
                                    'vt' => 'numerical',
                                    'l' => 'Solids in waste sludge',
                                    'us' => '21',
                                    'du' => 'gperL',
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
                                    'n' => 'SS_lbs_leaving',
                                    'vt' => 'numerical',
                                    'l' => 'SS leaving activated sludge process',
                                    'h' => 'Where SS is suspended solids.',
                                    'us' => '22',
                                    'du' => 'kg',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => '-5tV1SKKDfuskrArGpj5u',
                'title' => 'BOD calculation',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'fm_ratio_bod', 'vt' => 'numerical', 'l' => 'F/M ratio'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'mlvss_bod',
                                    'vt' => 'numerical',
                                    'l' => 'MLVSS conc.',
                                    'us' => '21',
                                    'du' => 'gperL',
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
                                    'n' => 'mlvss_lbs_bod',
                                    'vt' => 'numerical',
                                    'l' => 'MLVSS weight',
                                    'us' => '22',
                                    'du' => 'kg',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'nBXy266RaF2pZQ8Net-N4',
                'title' => 'COD calculation',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'fm_ratio_cod', 'vt' => 'numerical', 'l' => 'F/M ratio'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'mlvss_cod',
                                    'vt' => 'numerical',
                                    'l' => 'MLVSS conc.',
                                    'us' => '21',
                                    'du' => 'gperL',
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
                                    'n' => 'mlvss_lbs_cod',
                                    'vt' => 'numerical',
                                    'l' => 'MLVSS weight',
                                    'us' => '22',
                                    'du' => 'kg',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'NEL_fGiyjQPjZ-tOE0TXT',
                'title' => 'Values for entire activated sludge process',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'mlss',
                                    'vt' => 'numerical',
                                    'l' => 'MLSS conc.',
                                    'us' => '21',
                                    'du' => 'gperL',
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
                                    'n' => 'mlss_lbs_total',
                                    'vt' => 'numerical',
                                    'l' => 'MLSS total weight',
                                    'h' => 'In both the aeration tank and secondary clarifiers.',
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
                                    'n' => 'mcrt',
                                    'vt' => 'numerical',
                                    'l' => 'MCRT',
                                    'h' => 'Mean cell residence time. Also known as SRT (solid retention time).',
                                    'us' => '19',
                                    'du' => 'hrsmin',
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
                                    'n' => 'sludge_age',
                                    'vt' => 'numerical',
                                    'l' => 'Sludge age',
                                    'us' => '19',
                                    'du' => 'hrsmin',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => '8xByG5FhsYeazD2GRBaqo',
                'title' => 'Laboratory calculations',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'settled_solids',
                                    'vt' => 'numerical',
                                    'l' => 'Settled solids',
                                    'us' => '20',
                                    'du' => 'ml',
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
                                    'n' => 'svi',
                                    'vt' => 'numerical',
                                    'l' => 'SVI',
                                    'suf' => 'mL/g',
                                    'h' => 'Sludge volume index.',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'primary_effluent_cod = average_untreated_influent_cod - average_primary_treated_cod',
                'var' => [
                    [
                        'l' => 'primary_effluent_cod',
                        'f' => '-average_primary_treated_cod + average_untreated_influent_cod',
                        'r' => ['average_primary_treated_cod', 'average_untreated_influent_cod'],
                    ],
                    [
                        'l' => 'average_primary_treated_cod',
                        'f' => 'average_untreated_influent_cod - primary_effluent_cod',
                        'r' => ['primary_effluent_cod', 'average_untreated_influent_cod'],
                    ],
                    [
                        'l' => 'average_untreated_influent_cod',
                        'f' => 'average_primary_treated_cod + primary_effluent_cod',
                        'r' => ['primary_effluent_cod', 'average_primary_treated_cod'],
                    ],
                ],
            ],
            [
                'formula' => 'primary_effluent_bod = average_untreated_influent_bod - average_primary_treated_bod',
                'var' => [
                    [
                        'l' => 'average_primary_treated_bod',
                        'f' => 'average_untreated_influent_bod - primary_effluent_bod',
                        'r' => ['average_untreated_influent_bod', 'primary_effluent_bod'],
                    ],
                    [
                        'l' => 'average_untreated_influent_bod',
                        'f' => 'average_primary_treated_bod + primary_effluent_bod',
                        'r' => ['average_primary_treated_bod', 'primary_effluent_bod'],
                    ],
                    [
                        'l' => 'primary_effluent_bod',
                        'f' => '-average_primary_treated_bod + average_untreated_influent_bod',
                        'r' => ['average_primary_treated_bod', 'average_untreated_influent_bod'],
                    ],
                ],
            ],
            [
                'formula' => 'cod_lb_day = effluent_flow * primary_effluent_cod',
                'var' => [
                    [
                        'l' => 'primary_effluent_cod',
                        'f' => 'cod_lb_day/effluent_flow',
                        'r' => ['effluent_flow', 'cod_lb_day'],
                    ],
                    [
                        'l' => 'effluent_flow',
                        'f' => 'cod_lb_day/primary_effluent_cod',
                        'r' => ['primary_effluent_cod', 'cod_lb_day'],
                    ],
                    [
                        'l' => 'cod_lb_day',
                        'f' => 'effluent_flow*primary_effluent_cod',
                        'r' => ['primary_effluent_cod', 'effluent_flow'],
                    ],
                ],
            ],
            [
                'formula' => 'bod_lb_day = effluent_flow * primary_effluent_bod',
                'var' => [
                    [
                        'l' => 'effluent_flow',
                        'f' => 'bod_lb_day/primary_effluent_bod',
                        'r' => ['primary_effluent_bod', 'bod_lb_day'],
                    ],
                    [
                        'l' => 'primary_effluent_bod',
                        'f' => 'bod_lb_day/effluent_flow',
                        'r' => ['effluent_flow', 'bod_lb_day'],
                    ],
                    [
                        'l' => 'bod_lb_day',
                        'f' => 'effluent_flow*primary_effluent_bod',
                        'r' => ['effluent_flow', 'primary_effluent_bod'],
                    ],
                ],
            ],
            [
                'formula' => 'aeration_vol_mg = length_tank * width_tank * (side_wall_depth - free_board) ',
                'var' => [
                    [
                        'l' => 'free_board',
                        'f' => '-aeration_vol_mg/(length_tank*width_tank) + side_wall_depth',
                        'r' => ['width_tank', 'length_tank', 'aeration_vol_mg', 'side_wall_depth'],
                    ],
                    [
                        'l' => 'width_tank',
                        'f' => '-aeration_vol_mg/(length_tank*(free_board - side_wall_depth))',
                        'r' => ['free_board', 'length_tank', 'aeration_vol_mg', 'side_wall_depth'],
                    ],
                    [
                        'l' => 'length_tank',
                        'f' => '-aeration_vol_mg/(width_tank*(free_board - side_wall_depth))',
                        'r' => ['free_board', 'width_tank', 'aeration_vol_mg', 'side_wall_depth'],
                    ],
                    [
                        'l' => 'aeration_vol_mg',
                        'f' => 'length_tank*width_tank*(-free_board + side_wall_depth)',
                        'r' => ['free_board', 'width_tank', 'length_tank', 'side_wall_depth'],
                    ],
                    [
                        'l' => 'side_wall_depth',
                        'f' => 'aeration_vol_mg/(length_tank*width_tank) + free_board',
                        'r' => ['free_board', 'width_tank', 'length_tank', 'aeration_vol_mg'],
                    ],
                ],
            ],
            [
                'formula' => 'clarifier_vol_mg = length_2_clarifier * width_2_clarifier * (side_wall_depth_2_clarifier  - free_board_2_clarifier )',
                'var' => [
                    [
                        'l' => 'width_2_clarifier',
                        'f' => '-clarifier_vol_mg/(length_2_clarifier*(free_board_2_clarifier - side_wall_depth_2_clarifier))',
                        'r' => ['side_wall_depth_2_clarifier', 'free_board_2_clarifier', 'clarifier_vol_mg', 'length_2_clarifier'],
                    ],
                    [
                        'l' => 'side_wall_depth_2_clarifier',
                        'f' => 'clarifier_vol_mg/(length_2_clarifier*width_2_clarifier) + free_board_2_clarifier',
                        'r' => ['width_2_clarifier', 'free_board_2_clarifier', 'clarifier_vol_mg', 'length_2_clarifier'],
                    ],
                    [
                        'l' => 'free_board_2_clarifier',
                        'f' => '-clarifier_vol_mg/(length_2_clarifier*width_2_clarifier) + side_wall_depth_2_clarifier',
                        'r' => ['width_2_clarifier', 'side_wall_depth_2_clarifier', 'clarifier_vol_mg', 'length_2_clarifier'],
                    ],
                    [
                        'l' => 'clarifier_vol_mg',
                        'f' => 'length_2_clarifier*width_2_clarifier*(-free_board_2_clarifier + side_wall_depth_2_clarifier)',
                        'r' => ['width_2_clarifier', 'side_wall_depth_2_clarifier', 'free_board_2_clarifier', 'length_2_clarifier'],
                    ],
                    [
                        'l' => 'length_2_clarifier',
                        'f' => '-clarifier_vol_mg/(width_2_clarifier*(free_board_2_clarifier - side_wall_depth_2_clarifier))',
                        'r' => ['width_2_clarifier', 'side_wall_depth_2_clarifier', 'free_board_2_clarifier', 'clarifier_vol_mg'],
                    ],
                ],
            ],
            [
                'formula' => 'hrt = aeration_vol_mg / (flow_through)',
                'var' => [
                    [
                        'l' => 'flow_through',
                        'f' => 'aeration_vol_mg/hrt',
                        'r' => ['hrt', 'aeration_vol_mg'],
                    ],
                    [
                        'l' => 'hrt',
                        'f' => 'aeration_vol_mg/flow_through',
                        'r' => ['flow_through', 'aeration_vol_mg'],
                    ],
                    [
                        'l' => 'aeration_vol_mg',
                        'f' => 'flow_through*hrt',
                        'r' => ['flow_through', 'hrt'],
                    ],
                ],
            ],
            [
                'formula' => 'mlvss_lbs_bod = bod_lb_day / fm_ratio_bod',
                'var' => [
                    [
                        'l' => 'mlvss_lbs_bod',
                        'f' => 'bod_lb_day/fm_ratio_bod',
                        'r' => ['fm_ratio_bod', 'bod_lb_day'],
                    ],
                    [
                        'l' => 'fm_ratio_bod',
                        'f' => 'bod_lb_day/mlvss_lbs_bod',
                        'r' => ['mlvss_lbs_bod', 'bod_lb_day'],
                    ],
                    [
                        'l' => 'bod_lb_day',
                        'f' => 'fm_ratio_bod*mlvss_lbs_bod',
                        'r' => ['mlvss_lbs_bod', 'fm_ratio_bod'],
                    ],
                ],
            ],
            [
                'formula' => 'mlvss_lbs_cod = cod_lb_day / fm_ratio_cod',
                'var' => [
                    [
                        'l' => 'mlvss_lbs_cod',
                        'f' => 'cod_lb_day/fm_ratio_cod',
                        'r' => ['fm_ratio_cod', 'cod_lb_day'],
                    ],
                    [
                        'l' => 'fm_ratio_cod',
                        'f' => 'cod_lb_day/mlvss_lbs_cod',
                        'r' => ['mlvss_lbs_cod', 'cod_lb_day'],
                    ],
                    [
                        'l' => 'cod_lb_day',
                        'f' => 'fm_ratio_cod*mlvss_lbs_cod',
                        'r' => ['mlvss_lbs_cod', 'fm_ratio_cod'],
                    ],
                ],
            ],
            [
                'formula' => 'mlvss_bod = mlvss_lbs_bod / aeration_vol_mg ',
                'var' => [
                    [
                        'l' => 'mlvss_lbs_bod',
                        'f' => 'aeration_vol_mg*mlvss_bod',
                        'r' => ['mlvss_bod', 'aeration_vol_mg'],
                    ],
                    [
                        'l' => 'mlvss_bod',
                        'f' => 'mlvss_lbs_bod/aeration_vol_mg',
                        'r' => ['mlvss_lbs_bod', 'aeration_vol_mg'],
                    ],
                    [
                        'l' => 'aeration_vol_mg',
                        'f' => 'mlvss_lbs_bod/mlvss_bod',
                        'r' => ['mlvss_lbs_bod', 'mlvss_bod'],
                    ],
                ],
            ],
            [
                'formula' => 'mlvss_cod = mlvss_lbs_cod / aeration_vol_mg ',
                'var' => [
                    [
                        'l' => 'mlvss_lbs_cod',
                        'f' => 'aeration_vol_mg*mlvss_cod',
                        'r' => ['mlvss_cod', 'aeration_vol_mg'],
                    ],
                    [
                        'l' => 'mlvss_cod',
                        'f' => 'mlvss_lbs_cod/aeration_vol_mg',
                        'r' => ['mlvss_lbs_cod', 'aeration_vol_mg'],
                    ],
                    [
                        'l' => 'aeration_vol_mg',
                        'f' => 'mlvss_lbs_cod/mlvss_cod',
                        'r' => ['mlvss_lbs_cod', 'mlvss_cod'],
                    ],
                ],
            ],
            [
                'formula' => 'mlss_lbs_total = mlss * (aeration_vol_mg + clarifier_vol_mg)',
                'var' => [
                    [
                        'l' => 'mlss_lbs_total',
                        'f' => 'mlss*(aeration_vol_mg + clarifier_vol_mg)',
                        'r' => ['clarifier_vol_mg', 'mlss', 'aeration_vol_mg'],
                    ],
                    [
                        'l' => 'clarifier_vol_mg',
                        'f' => '-aeration_vol_mg + mlss_lbs_total/mlss',
                        'r' => ['mlss_lbs_total', 'mlss', 'aeration_vol_mg'],
                    ],
                    [
                        'l' => 'mlss',
                        'f' => 'mlss_lbs_total/(aeration_vol_mg + clarifier_vol_mg)',
                        'r' => ['mlss_lbs_total', 'clarifier_vol_mg', 'aeration_vol_mg'],
                    ],
                    [
                        'l' => 'aeration_vol_mg',
                        'f' => '-clarifier_vol_mg + mlss_lbs_total/mlss',
                        'r' => ['mlss_lbs_total', 'clarifier_vol_mg', 'mlss'],
                    ],
                ],
            ],
            [
                'formula' => 'SS_lbs_leaving = (wasted_sludge * wasted_flow) +  (effluence_sludge * effluence_flow)',
                'var' => [
                    [
                        'l' => 'SS_lbs_leaving',
                        'f' => 'effluence_flow*effluence_sludge + wasted_flow*wasted_sludge',
                        'r' => ['wasted_flow', 'wasted_sludge', 'effluence_flow', 'effluence_sludge'],
                    ],
                    [
                        'l' => 'wasted_flow',
                        'f' => '(SS_lbs_leaving - effluence_flow*effluence_sludge)/wasted_sludge',
                        'r' => ['SS_lbs_leaving', 'wasted_sludge', 'effluence_flow', 'effluence_sludge'],
                    ],
                    [
                        'l' => 'wasted_sludge',
                        'f' => '(SS_lbs_leaving - effluence_flow*effluence_sludge)/wasted_flow',
                        'r' => ['SS_lbs_leaving', 'wasted_flow', 'effluence_flow', 'effluence_sludge'],
                    ],
                    [
                        'l' => 'effluence_flow',
                        'f' => '(SS_lbs_leaving - wasted_flow*wasted_sludge)/effluence_sludge',
                        'r' => ['SS_lbs_leaving', 'wasted_flow', 'wasted_sludge', 'effluence_sludge'],
                    ],
                    [
                        'l' => 'effluence_sludge',
                        'f' => '(SS_lbs_leaving - wasted_flow*wasted_sludge)/effluence_flow',
                        'r' => ['SS_lbs_leaving', 'wasted_flow', 'wasted_sludge', 'effluence_flow'],
                    ],
                ],
            ],
            [
                'formula' => 'mcrt = mlss_lbs_total / SS_lbs_leaving',
                'var' => [
                    [
                        'l' => 'SS_lbs_leaving',
                        'f' => 'mlss_lbs_total/mcrt',
                        'r' => ['mlss_lbs_total', 'mcrt'],
                    ],
                    [
                        'l' => 'mlss_lbs_total',
                        'f' => 'SS_lbs_leaving*mcrt',
                        'r' => ['SS_lbs_leaving', 'mcrt'],
                    ],
                    [
                        'l' => 'mcrt',
                        'f' => 'mlss_lbs_total/SS_lbs_leaving',
                        'r' => ['SS_lbs_leaving', 'mlss_lbs_total'],
                    ],
                ],
            ],
            [
                'formula' => 'mlss_lbs_aeration = mlss * aeration_vol_mg ',
                'var' => [
                    [
                        'l' => 'mlss',
                        'f' => 'mlss_lbs_aeration/aeration_vol_mg',
                        'r' => ['mlss_lbs_aeration', 'aeration_vol_mg'],
                    ],
                    [
                        'l' => 'mlss_lbs_aeration',
                        'f' => 'aeration_vol_mg*mlss',
                        'r' => ['mlss', 'aeration_vol_mg'],
                    ],
                    [
                        'l' => 'aeration_vol_mg',
                        'f' => 'mlss_lbs_aeration/mlss',
                        'r' => ['mlss', 'mlss_lbs_aeration'],
                    ],
                ],
            ],
            [
                'formula' => 'SS_lbs_influent = pri_clarifier_effluent_SS * effluent_flow',
                'var' => [
                    [
                        'l' => 'SS_lbs_influent',
                        'f' => 'effluent_flow*pri_clarifier_effluent_SS',
                        'r' => ['pri_clarifier_effluent_SS', 'effluent_flow'],
                    ],
                    [
                        'l' => 'pri_clarifier_effluent_SS',
                        'f' => 'SS_lbs_influent/effluent_flow',
                        'r' => ['SS_lbs_influent', 'effluent_flow'],
                    ],
                    [
                        'l' => 'effluent_flow',
                        'f' => 'SS_lbs_influent/pri_clarifier_effluent_SS',
                        'r' => ['SS_lbs_influent', 'pri_clarifier_effluent_SS'],
                    ],
                ],
            ],
            [
                'formula' => 'sludge_age = mlss_lbs_aeration / SS_lbs_influent',
                'var' => [
                    [
                        'l' => 'SS_lbs_influent',
                        'f' => 'mlss_lbs_aeration/sludge_age',
                        'r' => ['sludge_age', 'mlss_lbs_aeration'],
                    ],
                    [
                        'l' => 'sludge_age',
                        'f' => 'mlss_lbs_aeration/SS_lbs_influent',
                        'r' => ['SS_lbs_influent', 'mlss_lbs_aeration'],
                    ],
                    [
                        'l' => 'mlss_lbs_aeration',
                        'f' => 'SS_lbs_influent*sludge_age',
                        'r' => ['SS_lbs_influent', 'sludge_age'],
                    ],
                ],
            ],
            [
                'formula' => 'svi = (settled_solids ) / (mlss )',
                'var' => [
                    [
                        'l' => 'svi',
                        'f' => 'settled_solids/mlss',
                        'r' => ['mlss', 'settled_solids'],
                    ],
                    [
                        'l' => 'mlss',
                        'f' => 'settled_solids/svi',
                        'r' => ['svi', 'settled_solids'],
                    ],
                    [
                        'l' => 'settled_solids',
                        'f' => 'mlss*svi',
                        'r' => ['svi', 'mlss'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'Y6rdzfBjpDe6s0mEfABtk' => [
                'name' => 'bod/cod',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'QeLjjpQrmuAFEawRCiiDk', 'label' => 'BOD (biochemical oxygen demand)', 'value' => '1'],
                    ['uid' => 'jlA2uTWpAWPRa54Qi46Gy', 'label' => 'COD (chemical oxygen demand)', 'value' => '2'],
                    ['uid' => 'IPsoq6J7VUSdWQ3NQ8RCw', 'label' => 'Both', 'value' => '3'],
                ],
            ],
            '7c7eHN5GSvkpmEK20wseW' => [
                'name' => 'calculate',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'CvmMwmtYYDiXNMToHX8Xw', 'label' => 'F/M ratio/MLVSS', 'value' => '1'],
                    ['uid' => 'Q2xt-kDoJ0M6yPsJIKGkQ', 'label' => 'HRT (hydraulic retention time)', 'value' => '2'],
                    ['uid' => 'uqJLRxGnji8rM1Dflj2-h', 'label' => 'MCRT (mean cell residence time)', 'value' => '3'],
                    ['uid' => 'GKT4SSMNs0EL93YqVoQn-', 'label' => 'Sludge age', 'value' => '4'],
                    ['uid' => 'hxp25T2C6TmH87yR6cwVZ', 'label' => 'SVI (sludge volume index)', 'value' => '5'],
                    ['uid' => 'fNgXlfOY9DD5TZIm9QDyx', 'label' => 'Everything', 'value' => '6'],
                ],
            ],
            'pjX3R3xQVUoBcI5odMQ0V' => [
                'name' => 'volume',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => '1H3nfboQGGGha4V74TrHb', 'label' => 'No', 'value' => '0'],
                    ['uid' => 'W499kOkFTlv2I7DzbLUOe', 'label' => 'Yes', 'value' => '1'],
                ],
            ],
        ],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        Wastewater turns Average untreated influent COD and Average primary treated COD into Influent SS weight and Average untreated influent BOD. Nothing is looked up on this page: Influent SS weight is computed from Average untreated influent COD and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Influent SS weight is opened in kilograms; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Wastewater calculator works', 'html' => <<<'TXT'
            <p>Wastewater answers one question from 2 numbers, and the answer is Influent SS weight, Average untreated influent BOD and Average primary treated BOD.</p><p>In the form&#039;s own words, Effluent COD = − Average primary treated COD + Average untreated influent COD.</p><p>What comes back is Influent SS weight, Average untreated influent BOD, Average primary treated BOD and Effluent BOD — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Average untreated influent COD</strong> — in grams per liter</li><li><strong>Average primary treated COD</strong> — in grams per liter</li></ul><p>The result boxes are Influent SS weight in kilograms, Average untreated influent BOD in grams per liter, Average primary treated BOD in grams per liter, Effluent BOD in grams per liter, Effluent COD in grams per liter, Effluent flow in cubic meters per day, Effluent SS concentration in milligrams per liter, Length in meters, Width in meters, Side wall depth in meters, Free-board in meters, Volume in cubic meters, Flow rate through tank in cubic meters per hour, BOD loading in kilograms per day, COD loading in kilograms per day, HRT in hours / minutes, MLSS weight in kilograms, Length in meters, Width in meters, Side wall depth in meters, Free-board in meters, Volume in cubic meters, Flow of secondary effluence in cubic meters per day, Solids in secondary effluence in grams per liter, Flow of waste sludge in cubic meters per day, Solids in waste sludge in grams per liter, SS leaving activated sludge process in kilograms, F/M ratio, MLVSS conc in grams per liter, MLVSS weight in kilograms, F/M ratio, MLVSS conc in grams per liter, MLVSS weight in kilograms, MLSS conc in grams per liter, MLSS total weight in kilograms, MCRT in hours / minutes, Sludge age in hours / minutes, Settled solids in milliliters, SVI in mL/g; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Influent SS weight offers 27 units and opens on kilograms, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Effluent COD</strong> = <code>− Average primary treated COD + Average untreated influent COD</code></li><li><strong>Average primary treated COD</strong> = <code>Average untreated influent COD − Effluent COD</code></li><li><strong>Average untreated influent COD</strong> = <code>Average primary treated COD + Effluent COD</code></li><li><strong>Average primary treated BOD</strong> = <code>Average untreated influent BOD − Effluent BOD</code></li><li><strong>Average untreated influent BOD</strong> = <code>Average primary treated BOD + Effluent BOD</code></li><li><strong>Effluent BOD</strong> = <code>− Average primary treated BOD + Average untreated influent BOD</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Effluent COD</strong> = <code>− Average primary treated COD + Average untreated influent COD</code> — the form to use when Average primary treated COD and Average untreated influent COD are the values you have.</li><li><strong>Average primary treated COD</strong> = <code>Average untreated influent COD − Effluent COD</code> — the form to use when Effluent COD and Average untreated influent COD are the values you have.</li><li><strong>Average untreated influent COD</strong> = <code>Average primary treated COD + Effluent COD</code> — the form to use when Effluent COD and Average primary treated COD are the values you have.</li><li><strong>Average primary treated BOD</strong> = <code>Average untreated influent BOD − Effluent BOD</code> — the form to use when Average untreated influent BOD and Effluent BOD are the values you have.</li><li><strong>Average untreated influent BOD</strong> = <code>Average primary treated BOD + Effluent BOD</code> — the form to use when Average primary treated BOD and Effluent BOD are the values you have.</li><li><strong>Effluent BOD</strong> = <code>− Average primary treated BOD + Average untreated influent BOD</code> — the form to use when Average primary treated BOD and Average untreated influent BOD are the values you have.</li><li><strong>Effluent COD</strong> = <code>COD loading ÷ Effluent flow</code> — the form to use when Effluent flow and COD loading are the values you have.</li><li><strong>Effluent flow</strong> = <code>COD loading ÷ Effluent COD</code> — the form to use when Effluent COD and COD loading are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Effluent COD, Average primary treated COD and Average untreated influent COD can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Average untreated influent COD and Average primary treated COD is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Influent SS weight, Average untreated influent BOD and Average primary treated BOD are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Average untreated influent COD left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Average untreated influent COD is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Average primary treated COD left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Average primary treated COD is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Average untreated influent COD is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Average untreated influent COD</strong> is a grams per liter quantity: the page opens it in gperL and converts anything else you pick before the formula runs. It feeds Effluent COD and Average primary treated COD. Have it to hand before you start: Average untreated influent COD is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Average primary treated COD</strong> is a grams per liter quantity: the page opens it in gperL and converts anything else you pick before the formula runs. It feeds Effluent COD and Average untreated influent COD. Have it to hand before you start: Average primary treated COD is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Average untreated influent COD and Average primary treated COD. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Average untreated influent COD into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Influent SS weight in kg with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Influent SS weight follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are kilograms, grams per liter and cubic meters per day and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Average untreated influent COD and Average primary treated COD are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Average untreated influent COD and Average primary treated COD is what you already know and Influent SS weight and Average untreated influent BOD is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/shannon-wiener-index">Shannon–Wiener Diversity Index Calculator</a>, <a href="/biology/sheep-gestation">Sheep gestation Calculator</a> and <a href="/biology/simpson-diversity-index">Simpson&#039;s Diversity Index Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Wastewater calculator work out?', 'a' => <<<'TXT'
            Influent SS weight, Average untreated influent BOD, Average primary treated BOD and Effluent BOD, from Average primary treated COD and Average untreated influent COD. The relationship is Effluent COD = − Average primary treated COD + Average untreated influent COD.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Average untreated influent COD (grams per liter), Average primary treated COD (grams per liter). Fill average_untreated_influent_cod and average_primary_treated_cod and leave Influent SS weight empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Effluent COD, Average primary treated COD, Average untreated influent COD and Average primary treated BOD can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Influent SS weight is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Average untreated influent COD left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Influent SS weight at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/shannon-wiener-index', 'name' => 'Shannon–Wiener Diversity Index Calculator'],
            ['path' => '/biology/sheep-gestation', 'name' => 'Sheep gestation Calculator'],
            ['path' => '/biology/simpson-diversity-index', 'name' => 'Simpson\'s Diversity Index Calculator'],
        ],
        'authors' => [],
    ],
];
