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
    'meta' => ['title' => 'Wastewater Calculator: Formula, Steps & Examples', 'description' => 'The Wastewater calculator turns the average untreated influent BOD, the average untreated influent COD and more into <strong>effluent COD</strong>.', 'h1' => 'Wastewater Calculator', 'updated' => '2026-08-12'],
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
        'intro' => 'The Wastewater calculator turns the average untreated influent BOD, the average untreated influent COD and more into <strong>effluent COD</strong>.',
        'sections' => [
            ['title' => 'How does the Wastewater calculator work?', 'html' => <<<'TXT'
            <p>The Wastewater calculator takes the values in the form, applies the relationship described below and reports <strong>effluent COD</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case; then you type in the average untreated influent BOD, the average untreated influent COD, the average primary treated COD and the effluent SS concentration.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 6 options, such as F/M ratio/MLVSS, HRT (hydraulic retention time) and MCRT (mean cell residence time). The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>Pick the option that matches your case — 3 options, such as BOD (biochemical oxygen demand), COD (chemical oxygen demand) and both. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>A measured quantity, entered by default in grams per liter. The unit chip switches it to any of the 28 supported units.</li><li>A measured quantity, entered by default in grams per liter. The unit chip switches it to any of the 28 supported units.</li><li>A measured quantity, entered by default in grams per liter. The unit chip switches it to any of the 28 supported units.</li><li>A measured quantity, entered by default in milligrams per liter. The unit chip switches it to any of the 28 supported units.</li><li>Pick the option that matches your case — 2 options, such as no and yes. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li> The unit chip switches it to any of the 34 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li><li>A measured quantity, entered by default in cubic meters. The unit chip switches it to any of the 40 supported units.</li><li>A measured quantity, entered by default in kilograms per day. The unit chip switches it to any of the 16 supported units.</li><li>A measured quantity, entered by default in kilograms per day. The unit chip switches it to any of the 16 supported units.</li><li>A measured quantity, entered by default in hours / minutes. </li><li>Pick the option that matches your case — 2 options, such as no and yes. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li> The unit chip switches it to any of the 34 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li><li>A measured quantity, entered by default in cubic meters. The unit chip switches it to any of the 40 supported units.</li><li>A measured quantity, entered by default in cubic meters per day. The unit chip switches it to any of the 39 supported units.</li><li>A measured quantity, entered by default in grams per liter. The unit chip switches it to any of the 28 supported units.</li><li>A measured quantity, entered by default in cubic meters per day. The unit chip switches it to any of the 39 supported units.</li><li>A measured quantity, entered by default in grams per liter. The unit chip switches it to any of the 28 supported units.</li></ul><p>The form has 27 fields in total. The ones not listed here work the same way: a label, a unit chip where the quantity has units, and a box that updates the results as soon as it holds a valid number.</p><p>4 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Influent SS weight</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>Calculated</td></tr><tr><td><strong>Average untreated influent BOD</strong></td><td>A measured quantity, 28 units available.</td><td>grams per liter</td><td>You supply it</td></tr><tr><td><strong>Average untreated influent COD</strong></td><td>A measured quantity, 28 units available.</td><td>grams per liter</td><td>You supply it</td></tr><tr><td><strong>Average primary treated BOD</strong></td><td>A measured quantity, 28 units available.</td><td>grams per liter</td><td>Calculated</td></tr><tr><td><strong>Average primary treated COD</strong></td><td>A measured quantity, 28 units available.</td><td>grams per liter</td><td>You supply it</td></tr><tr><td><strong>Effluent BOD</strong></td><td>A measured quantity, 28 units available.</td><td>grams per liter</td><td>Calculated</td></tr><tr><td><strong>Effluent COD</strong></td><td>A measured quantity, 28 units available.</td><td>grams per liter</td><td>Calculated</td></tr><tr><td><strong>Effluent flow</strong></td><td>A measured quantity, 39 units available.</td><td>cubic meters per day</td><td>Calculated</td></tr><tr><td><strong>Effluent SS concentration</strong></td><td>A measured quantity, 28 units available.</td><td>milligrams per liter</td><td>You supply it</td></tr><tr><td><strong>Length (Aeration tank)</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>You supply it</td></tr><tr><td><strong>Width (Aeration tank)</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>You supply it</td></tr><tr><td><strong>Side wall depth (Aeration tank)</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>You supply it</td></tr><tr><td><strong>Volume (Aeration tank)</strong></td><td>A measured quantity, 40 units available.</td><td>cubic meters</td><td>You supply it</td></tr><tr><td><strong>Flow rate through tank</strong></td><td>A measured quantity, 39 units available.</td><td>cubic meters per hour</td><td>Calculated</td></tr><tr><td><strong>BOD loading</strong></td><td>A measured quantity, 16 units available.</td><td>kilograms per day</td><td>You supply it</td></tr><tr><td><strong>COD loading</strong></td><td>A measured quantity, 16 units available.</td><td>kilograms per day</td><td>You supply it</td></tr><tr><td><strong>HRT</strong></td><td>A measured quantity, 27 units available.</td><td>hours / minutes</td><td>You supply it</td></tr><tr><td><strong>MLSS weight</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>You supply it</td></tr><tr><td><strong>Length (Secondary clarifiers)</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>You supply it</td></tr><tr><td><strong>Width (Secondary clarifiers)</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>Calculated</td></tr><tr><td><strong>Side wall depth (Secondary clarifiers)</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>You supply it</td></tr><tr><td><strong>Volume (Secondary clarifiers)</strong></td><td>A measured quantity, 40 units available.</td><td>cubic meters</td><td>You supply it</td></tr><tr><td><strong>Flow of secondary effluence</strong></td><td>A measured quantity, 39 units available.</td><td>cubic meters per day</td><td>You supply it</td></tr><tr><td><strong>Solids in secondary effluence</strong></td><td>A measured quantity, 28 units available.</td><td>grams per liter</td><td>You supply it</td></tr></tbody></table><p>The table lists the first 24 of 39 fields; the rest follow the same pattern.</p>
            TXT],
            ['title' => 'The formula behind the Wastewater calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Effluent COD</span><span class="formula-eq">=</span><span class="formula-rhs">-average primary treated COD + average untreated influent COD</span></div><div class="formula-row"><span class="formula-lhs">Average primary treated BOD</span><span class="formula-eq">=</span><span class="formula-rhs">average untreated influent BOD − effluent BOD</span></div><div class="formula-row"><span class="formula-lhs">Effluent COD</span><span class="formula-eq">=</span><span class="formula-rhs">COD loading ÷ effluent flow</span></div><div class="formula-row"><span class="formula-lhs">Effluent flow</span><span class="formula-eq">=</span><span class="formula-rhs">BOD loading ÷ effluent BOD</span></div><div class="formula-row"><span class="formula-lhs">Free-board</span><span class="formula-eq">=</span><span class="formula-rhs">-volume ÷ (length × width) + side wall depth</span></div><div class="formula-row"><span class="formula-lhs">Width</span><span class="formula-eq">=</span><span class="formula-rhs">-volume ÷ (length × (free-board − side wall depth))</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in grams per liter, and convertible to any of the 28 units on that chip.</li><li>Shown in grams per liter, and convertible to any of the 28 units on that chip.</li><li>Shown in cubic meters per day, and convertible to any of the 39 units on that chip.</li><li>Shown in grams per liter, and convertible to any of the 28 units on that chip.</li><li>Shown in meters, and convertible to any of the 34 units on that chip.</li><li>Shown in meters, and convertible to any of the 34 units on that chip.</li><li>Shown in cubic meters per hour, and convertible to any of the 39 units on that chip.</li><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li><li>Shown in grams per liter, and convertible to any of the 28 units on that chip.</li><li>Shown in grams per liter, and convertible to any of the 28 units on that chip.</li><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Mass, opening in kilograms</li><li>Density, opening in grams per liter</li><li>Density, opening in grams per liter</li><li>Density, opening in grams per liter</li><li>Density, opening in grams per liter</li><li>Density, opening in grams per liter</li><li>Density, opening in grams per liter</li><li>Flow rate, opening in cubic meters per day</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Wastewater calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Comparing two organisms, populations or processes</li><li>Supporting a lesson, a lecture or a field note</li><li>Putting a biological quantity into a scale you can picture</li><li>Any time the same 4 figures keep coming back — the average untreated influent BOD, the average untreated influent COD and the average primary treated COD — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Keep the units you enter consistent. </li><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li><li>Round only at the end. </li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/water-potential">Water potential</a>, <a href="/biology/water-soluble-fertilizer">Water soluble fertilizer</a> and <a href="/biology/acres-per-hour">Acres per hour</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Wastewater calculator work out?', 'a' => <<<'TXT'
            It returns effluent COD, derived from the average untreated influent BOD, the average untreated influent COD and the average primary treated COD. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Wastewater calculator?', 'a' => <<<'TXT'
            The form asks for the average untreated influent BOD, the average untreated influent COD, the average primary treated COD and the effluent SS concentration, which is 27 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter influent SS weight in a different unit?', 'a' => <<<'TXT'
            Yes. Influent SS weight opens in kilograms and the chip beside it offers 29 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There are several choices to make (4 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'Is the Wastewater calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/water-potential', 'name' => 'Water potential'],
            ['path' => '/biology/water-soluble-fertilizer', 'name' => 'Water soluble fertilizer'],
            ['path' => '/biology/acres-per-hour', 'name' => 'Acres per hour'],
        ],
    ],
];
