<?php

/**
 * Water soluble fertilizer
 * /biology/water-soluble-fertilizer
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Water soluble fertilizer',
    'meta' => ['title' => 'Water soluble fertilizer Calculator: Free, With Steps', 'description' => 'Supply the iron, the manganese and the mass concentration and the Water soluble fertilizer calculator solves for <strong>total Nitrogen (N)</strong>.', 'h1' => 'Water soluble fertilizer Calculator', 'updated' => '2026-08-12'],
    'raw' => [
        'vars' => [
            'desired_element' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => '2-EJQH_tOqLi8IWlsVtUZ', 'c' => 'fertilizerPresets == 0 or fertilizerPresets == 1'],
                    ['v' => '52sEsbxOUwCIvGjTdO_rl', 'c' => 'fertilizerPresets == 2'],
                    ['v' => 'wemyHQkpX9NZZzmnwRk3C', 'c' => 'fertilizerPresets == 3'],
                    ['v' => 'ZJjJ9wHHpsD6nXdkbyjNx', 'c' => 'fertilizerPresets == 4 or fertilizerPresets == 5'],
                    ['v' => 'FjXpbISIS-QHoggRmWVb0', 'c' => 'fertilizerPresets == 6'],
                ],
                'ds' => 'Ubn51P_QOi_YKGsDvL4K8',
            ],
            'fertilizerPresets' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'fertilizer_presets' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'YwuuwO_8QeTYqBiL7q_at', 'c' => null],
                ],
                'ds' => 'q8lOI-MUABCPfuY-A702b',
            ],
            'fertilizer_rate_B' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'fertilizer_rate_Ca' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'fertilizer_rate_Cu' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'fertilizer_rate_Fe' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'fertilizer_rate_K' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'fertilizer_rate_Mg' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'fertilizer_rate_Mn' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'fertilizer_rate_Mo' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'fertilizer_rate_N' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'fertilizer_rate_P' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'fertilizer_rate_S' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'fertilizer_rate_Zn' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'fertilizer_weight_B' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'fertilizer_weight_Ca' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'fertilizer_weight_Cu' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'fertilizer_weight_Fe' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'fertilizer_weight_K' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'fertilizer_weight_Mg' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'fertilizer_weight_Mn' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'fertilizer_weight_Mo' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'fertilizer_weight_N' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'fertilizer_weight_P' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'fertilizer_weight_S' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'fertilizer_weight_Zn' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'label_Ca' => [
                'type' => 'dependent',
                'rnd' => ['standard', '2'],
                'dfl' => [
                    ['v' => '19', 'c' => null],
                ],
            ],
            'label_K' => [
                'type' => 'dependent',
                'rnd' => ['standard', '2'],
            ],
            'label_Mg' => [
                'type' => 'dependent',
                'rnd' => ['standard', '2'],
                'dfl' => [
                    ['v' => '10', 'c' => null],
                ],
            ],
            'label_N' => [
                'type' => 'dependent',
                'rnd' => ['standard', '2'],
            ],
            'label_P' => [
                'type' => 'dependent',
                'rnd' => ['standard', '2'],
            ],
            'label_S' => [
                'type' => 'dependent',
                'rnd' => ['standard', '2'],
                'dfl' => [
                    ['v' => '13', 'c' => null],
                ],
            ],
            'label_type' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'p-SQi1U8gWij5U8zrVy1r', 'c' => null],
                ],
                'ds' => 'T-lDWteXTvr-eENvet9x4',
            ],
            'mmol_B' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'mmol_Ca' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'mmol_Cu' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'mmol_Fe' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'mmol_K' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'mmol_Mg' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'mmol_Mn' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'mmol_Mo' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'mmol_N' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'mmol_P' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'mmol_S' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'mmol_Zn' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'percent_weight_B' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
            ],
            'percent_weight_Ca' => [
                'type' => 'dependent',
                'rnd' => ['standard', '2'],
            ],
            'percent_weight_Cu' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
            ],
            'percent_weight_Fe' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
            ],
            'percent_weight_K' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
            ],
            'percent_weight_K2O' => [
                'type' => 'dependent',
                'rnd' => ['standard', '2'],
            ],
            'percent_weight_Mg' => [
                'type' => 'dependent',
                'rnd' => ['standard', '2'],
            ],
            'percent_weight_Mn' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
            ],
            'percent_weight_Mo' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
            ],
            'percent_weight_N' => [
                'type' => 'dependent',
                'rnd' => ['standard', '2'],
            ],
            'percent_weight_P' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
            ],
            'percent_weight_P2O5' => [
                'type' => 'dependent',
                'rnd' => ['standard', '2'],
            ],
            'percent_weight_S' => [
                'type' => 'dependent',
                'rnd' => ['standard', '2'],
            ],
            'percent_weight_Zn' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
            ],
            'ppm_B' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'ppm_Ca' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'ppm_Cu' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'ppm_Fe' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'ppm_K' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'ppm_Mg' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'ppm_Mn' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'ppm_Mo' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'ppm_N' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'ppm_P' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'ppm_S' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'ppm_Zn' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'selectedElement' => [
                'type' => 'presentation',
                'rnd' => ['omni', '0.0001'],
            ],
            'volume_diluted_solution' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '100', 'c' => null],
                    ['v' => '25', 'c' => 'userUsesImperialUnits()'],
                ],
            ],
        ],
        'groups' => [
            [
                'uid' => '-GOp8lHkZ-hX2bvh2v_32',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'fertilizer_presets',
                                    'vt' => 'valueSelect',
                                    'l' => 'Fertilizer presets',
                                    'h' => 'These are some common fertilizer ratios used when creating solutions. The percent composition may differ slightly from company to company.',
                                    'ds' => 'q8lOI-MUABCPfuY-A702b',
                                    'opts' => [
                                        ['YwuuwO_8QeTYqBiL7q_at', '20-20-20', '20'],
                                        ['4PAcbM7lErw0iNagD_Msl', 'Ammonium nitrate (34-0-0)', '34'],
                                        ['USFzruYfq_4h3P0vI7jnG', 'Calcium nitrate (15.5-0-0-19Ca)', '15.5'],
                                        ['evCNpQ7Xks1G96wc1cZJx', 'Magnesium sulfate (0-0-0-10Mg-13S)', ''],
                                        ['3l5dMkPP2Ebvh0qt-wYz1', 'Potassium nitrate (13-0-44)', '13'],
                                        ['82X6Iztk-u_Cl8rNAkv9V', 'Potassium chloride (0-0-60)', '0'],
                                        ['824irlS4pauXm7HsI4I0-', 'Monopotassium phosphate (0-52-34)', '0'],
                                        ['njQLNKuY5KqMei7yKqkfH', 'Custom', ''],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'jn8wxua0oAS6QL5ERQpE5',
                'title' => 'Fertilizer label',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'label_type',
                                    'vt' => 'valueSelect',
                                    'l' => 'Label type',
                                    'h' => <<<'TXT'
                                    Select "elemental percentage" to see all possible elements. To find the fertilizer's elemental percentages, check the "guaranteed analysis" section of the label.
                                    TXT,
                                    'ds' => 'T-lDWteXTvr-eENvet9x4',
                                    'opts' => [
                                        ['p-SQi1U8gWij5U8zrVy1r', 'N-P-K', '0'],
                                        ['kKor-3cQuqiYBEzUsH7Qe', 'Elemental percentage', '1'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'label_N', 'vt' => 'dependent', 'l' => 'N'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'label_P', 'vt' => 'dependent', 'l' => 'P₂O₅'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'label_K', 'vt' => 'dependent', 'l' => 'K₂O'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'label_Ca', 'vt' => 'dependent', 'l' => ' Ca'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'label_Mg', 'vt' => 'dependent', 'l' => 'Mg'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'label_S', 'vt' => 'dependent', 'l' => 'S'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'percent_weight_N',
                                    'vt' => 'dependent',
                                    'l' => 'Total Nitrogen (N)',
                                    'us' => '37',
                                    'du' => 'perc',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'percent_weight_P2O5',
                                    'vt' => 'dependent',
                                    'l' => 'Available phosphate (P₂O₅)',
                                    'us' => '37',
                                    'du' => 'perc',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'percent_weight_P',
                                    'vt' => 'numerical',
                                    'l' => 'Soluble Phosphorus (P)',
                                    'suf' => '%',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'percent_weight_K2O',
                                    'vt' => 'dependent',
                                    'l' => 'Soluble potash (K₂O)',
                                    'suf' => '%',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'percent_weight_K',
                                    'vt' => 'numerical',
                                    'l' => 'Soluble Potassium (K)',
                                    'suf' => '%',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'percent_weight_Ca',
                                    'vt' => 'dependent',
                                    'l' => 'Calcium (Ca)',
                                    'suf' => '%',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'percent_weight_Mg',
                                    'vt' => 'dependent',
                                    'l' => 'Magnesium (Mg)',
                                    'suf' => '%',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'percent_weight_Fe',
                                    'vt' => 'numerical',
                                    'l' => 'Iron (Fe)',
                                    'suf' => '%',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'percent_weight_S',
                                    'vt' => 'dependent',
                                    'l' => 'Sulphur (S)',
                                    'suf' => '%',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'percent_weight_Mn',
                                    'vt' => 'numerical',
                                    'l' => 'Manganese (Mn)',
                                    'suf' => '%',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'percent_weight_Zn',
                                    'vt' => 'numerical',
                                    'l' => 'Zinc (Zn)',
                                    'suf' => '%',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'percent_weight_Cu',
                                    'vt' => 'numerical',
                                    'l' => 'Copper (Cu)',
                                    'suf' => '%',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'percent_weight_Mo',
                                    'vt' => 'numerical',
                                    'l' => 'Molybdenum (Mo)',
                                    'suf' => '%',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'percent_weight_B',
                                    'vt' => 'numerical',
                                    'l' => 'Boron (B)',
                                    'suf' => '%',
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
                                        [null, 'If the sum of elemental percentages exceeds 100%, it will become an impossible fertilizer! Current sum of elemental percentages: {{totalElementPercent.value}}%'],
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
                                        [<<<'TXT'
                                        (fertilizer_presets == 0 or fertilizer_presets == 1) and label_type == 0 and (percent_weight_Ca or percent_weight_Mg or percent_weight_Fe or percent_weight_S or percent_weight_Mn or percent_weight_Zn or percent_weight_Cu or percent_weight_Mo or percent_weight_B)
                                        TXT, 'This fertilizer contains some elements which are hidden from view. Change the label type to see them.'],
                                        [<<<'TXT'
                                        fertilizer_presets == 2 and label_type == 0 and (percent_weight_Mg or percent_weight_Fe or percent_weight_S or percent_weight_Mn or percent_weight_Zn or percent_weight_Cu or percent_weight_Mo or percent_weight_B)
                                        TXT, 'This fertilizer contains some elements which are hidden from view. Change the label type to see them.'],
                                        [<<<'TXT'
                                        fertilizer_presets == 3 and label_type == 0 and (percent_weight_N or percent_weight_P2O5 or percent_weight_P or percent_weight_K2O or percent_weight_K or percent_weight_Ca or percent_weight_Fe or percent_weight_Mn or percent_weight_Zn or percent_weight_Cu or percent_weight_Mo or percent_weight_B)
                                        TXT, 'This fertilizer contains some elements which are hidden from view. Change the label type to see them.'],
                                        [<<<'TXT'
                                        (fertilizer_presets == 4 or fertilizer_presets == 5) and label_type == 0 and (percent_weight_Ca or percent_weight_Mg or percent_weight_Fe or percent_weight_S or percent_weight_Mn or percent_weight_Zn or percent_weight_Cu or percent_weight_Mo or percent_weight_B)
                                        TXT, 'This fertilizer contains some elements which are hidden from view. Change the label type to see them.'],
                                        [<<<'TXT'
                                        fertilizer_presets == 6 and label_type == 0 and (percent_weight_Ca or percent_weight_Mg or percent_weight_Fe or percent_weight_S or percent_weight_Mn or percent_weight_Zn or percent_weight_Cu or percent_weight_Mo or percent_weight_B)
                                        TXT, 'This fertilizer contains some elements which are hidden from view. Change the label type to see them.'],
                                        [<<<'TXT'
                                        fertilizer_presets == 7 and label_type == 0 and (percent_weight_Ca or percent_weight_Mg or percent_weight_Fe or percent_weight_S or percent_weight_Mn or percent_weight_Zn or percent_weight_Cu or percent_weight_Mo or percent_weight_B)
                                        TXT, 'This fertilizer contains some elements which are hidden from view. Change the label type to see them.'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'G4gP-WOvZckgCBldu-jCb',
                'title' => 'Your requirements',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'desired_element',
                                    'vt' => 'valueSelect',
                                    'l' => 'Desired element',
                                    'ds' => 'Ubn51P_QOi_YKGsDvL4K8',
                                    'opts' => [
                                        ['2-EJQH_tOqLi8IWlsVtUZ', 'Nitrogen (N)', '0'],
                                        ['FjXpbISIS-QHoggRmWVb0', 'Phosphorus (P)', '1'],
                                        ['ZJjJ9wHHpsD6nXdkbyjNx', 'Potassium (K)', '2'],
                                        ['52sEsbxOUwCIvGjTdO_rl', 'Calcium (Ca)', '3'],
                                        ['wemyHQkpX9NZZzmnwRk3C', 'Magnesium (Mg)', '4'],
                                        ['yPMtqKp79pa9RYiY67tYs', 'Iron (Fe)', '5'],
                                        ['FsIuMaOTgSJvCIEw0CxsT', 'Sulphur (S)', '6'],
                                        ['T-_vEXoA5PFrAJMdImNPj', 'Manganese (Mn)', '7'],
                                        ['eHGmvoIL4914s0hesoNFj', 'Zinc (Zn)', '8'],
                                        ['A4JMXgs-8k09V0T4Ox-6G', 'Copper (Cu)', '9'],
                                        ['8A-pGg6mF_-gmYrmNaMwB', 'Molybdenum (Mo)', '10'],
                                        ['n_FsOZ96shBT7Fhrak2vu', 'Boron (B)', '11'],
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
                                        [null, 'Your desired element must be present in the fertilizer!'],
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
                                    'n' => 'ppm_N',
                                    'vt' => 'numerical',
                                    'l' => 'Mass concentration',
                                    'us' => '21',
                                    'du' => 'ppm',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'mmol_N',
                                    'vt' => 'numerical',
                                    'l' => 'Molar concentration',
                                    'us' => '65',
                                    'du' => 'mM',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'ppm_P',
                                    'vt' => 'numerical',
                                    'l' => 'Mass concentration',
                                    'us' => '21',
                                    'du' => 'ppm',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'mmol_P',
                                    'vt' => 'numerical',
                                    'l' => 'Molar concentration',
                                    'us' => '65',
                                    'du' => 'mM',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'ppm_K',
                                    'vt' => 'numerical',
                                    'l' => 'Mass concentration',
                                    'us' => '21',
                                    'du' => 'ppm',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'mmol_K',
                                    'vt' => 'numerical',
                                    'l' => 'Molar concentration',
                                    'us' => '65',
                                    'du' => 'mM',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'ppm_Ca',
                                    'vt' => 'numerical',
                                    'l' => 'Mass concentration',
                                    'us' => '21',
                                    'du' => 'ppm',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'mmol_Ca',
                                    'vt' => 'numerical',
                                    'l' => 'Molar concentration',
                                    'us' => '65',
                                    'du' => 'mM',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'ppm_Mg',
                                    'vt' => 'numerical',
                                    'l' => 'Mass concentration',
                                    'us' => '21',
                                    'du' => 'ppm',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'mmol_Mg',
                                    'vt' => 'numerical',
                                    'l' => 'Molar concentration',
                                    'us' => '65',
                                    'du' => 'mM',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'ppm_Fe',
                                    'vt' => 'numerical',
                                    'l' => 'Mass concentration',
                                    'us' => '21',
                                    'du' => 'ppm',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'mmol_Fe',
                                    'vt' => 'numerical',
                                    'l' => 'Molar concentration',
                                    'us' => '65',
                                    'du' => 'mM',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'ppm_S',
                                    'vt' => 'numerical',
                                    'l' => 'Mass concentration',
                                    'us' => '21',
                                    'du' => 'ppm',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'mmol_S',
                                    'vt' => 'numerical',
                                    'l' => 'Molar concentration',
                                    'us' => '65',
                                    'du' => 'mM',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'ppm_Mn',
                                    'vt' => 'numerical',
                                    'l' => 'Mass concentration',
                                    'us' => '21',
                                    'du' => 'ppm',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'mmol_Mn',
                                    'vt' => 'numerical',
                                    'l' => 'Molar concentration',
                                    'us' => '65',
                                    'du' => 'mM',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'ppm_Zn',
                                    'vt' => 'numerical',
                                    'l' => 'Mass concentration',
                                    'us' => '21',
                                    'du' => 'ppm',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'mmol_Zn',
                                    'vt' => 'numerical',
                                    'l' => 'Molar concentration',
                                    'us' => '65',
                                    'du' => 'mM',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'ppm_Cu',
                                    'vt' => 'numerical',
                                    'l' => 'Mass concentration',
                                    'us' => '21',
                                    'du' => 'ppm',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'mmol_Cu',
                                    'vt' => 'numerical',
                                    'l' => 'Molar concentration',
                                    'us' => '65',
                                    'du' => 'mM',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'ppm_Mo',
                                    'vt' => 'numerical',
                                    'l' => 'Mass concentration',
                                    'us' => '21',
                                    'du' => 'ppm',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'mmol_Mo',
                                    'vt' => 'numerical',
                                    'l' => 'Molar concentration',
                                    'us' => '65',
                                    'du' => 'mM',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'ppm_B',
                                    'vt' => 'numerical',
                                    'l' => 'Mass concentration',
                                    'us' => '21',
                                    'du' => 'ppm',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'mmol_B',
                                    'vt' => 'numerical',
                                    'l' => 'Molar concentration',
                                    'us' => '65',
                                    'du' => 'mM',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'tYkLKZcDmFQWSdA8ZhfcL',
                'title' => 'Nutrient solution recipe',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'volume_diluted_solution',
                                    'vt' => 'numerical',
                                    'l' => 'Volume of diluted solution',
                                    'us' => '20',
                                    'du' => 'liters',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'fertilizer_rate_N',
                                    'vt' => 'numerical',
                                    'l' => 'Fertilizer rate',
                                    'h' => 'The amount of fertilizer you should use per unit volume of water.',
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
                                    'n' => 'fertilizer_weight_N',
                                    'vt' => 'numerical',
                                    'l' => 'Fertilizer weight',
                                    'h' => 'The amount of fertilizer you should use per specified volume of diluted solution.',
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
                                    'n' => 'fertilizer_rate_P',
                                    'vt' => 'numerical',
                                    'l' => 'Fertilizer rate',
                                    'h' => 'The amount of fertilizer you should use per unit volume of water.',
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
                                    'n' => 'fertilizer_weight_P',
                                    'vt' => 'numerical',
                                    'l' => 'Fertilizer weight',
                                    'h' => 'The amount of fertilizer you should use per specified volume of diluted solution.',
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
                                    'n' => 'fertilizer_rate_K',
                                    'vt' => 'numerical',
                                    'l' => 'Fertilizer rate',
                                    'h' => 'The amount of fertilizer you should use per unit volume of water.',
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
                                    'n' => 'fertilizer_weight_K',
                                    'vt' => 'numerical',
                                    'l' => 'Fertilizer weight',
                                    'h' => 'The amount of fertilizer you should use per specified volume of diluted solution.',
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
                                    'n' => 'fertilizer_rate_Ca',
                                    'vt' => 'numerical',
                                    'l' => 'Fertilizer rate',
                                    'h' => 'The amount of fertilizer you should use per unit volume of water.',
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
                                    'n' => 'fertilizer_weight_Ca',
                                    'vt' => 'numerical',
                                    'l' => 'Fertilizer weight',
                                    'h' => 'The amount of fertilizer you should use per specified volume of diluted solution.',
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
                                    'n' => 'fertilizer_rate_Mg',
                                    'vt' => 'numerical',
                                    'l' => 'Fertilizer rate',
                                    'h' => 'The amount of fertilizer you should use per unit volume of water.',
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
                                    'n' => 'fertilizer_weight_Mg',
                                    'vt' => 'numerical',
                                    'l' => 'Fertilizer weight',
                                    'h' => 'The amount of fertilizer you should use per specified volume of diluted solution.',
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
                                    'n' => 'fertilizer_rate_Fe',
                                    'vt' => 'numerical',
                                    'l' => 'Fertilizer rate',
                                    'h' => 'The amount of fertilizer you should use per unit volume of water.',
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
                                    'n' => 'fertilizer_weight_Fe',
                                    'vt' => 'numerical',
                                    'l' => 'Fertilizer weight',
                                    'h' => 'The amount of fertilizer you should use per specified volume of diluted solution.',
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
                                    'n' => 'fertilizer_rate_S',
                                    'vt' => 'numerical',
                                    'l' => 'Fertilizer rate',
                                    'h' => 'The amount of fertilizer you should use per unit volume of water.',
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
                                    'n' => 'fertilizer_weight_S',
                                    'vt' => 'numerical',
                                    'l' => 'Fertilizer weight',
                                    'h' => 'The amount of fertilizer you should use per specified volume of diluted solution.',
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
                                    'n' => 'fertilizer_rate_Mn',
                                    'vt' => 'numerical',
                                    'l' => 'Fertilizer rate',
                                    'h' => 'The amount of fertilizer you should use per unit volume of water.',
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
                                    'n' => 'fertilizer_weight_Mn',
                                    'vt' => 'numerical',
                                    'l' => 'Fertilizer weight',
                                    'h' => 'The amount of fertilizer you should use per specified volume of diluted solution.',
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
                                    'n' => 'fertilizer_rate_Zn',
                                    'vt' => 'numerical',
                                    'l' => 'Fertilizer rate',
                                    'h' => 'The amount of fertilizer you should use per unit volume of water.',
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
                                    'n' => 'fertilizer_weight_Zn',
                                    'vt' => 'numerical',
                                    'l' => 'Fertilizer weight',
                                    'h' => 'The amount of fertilizer you should use per specified volume of diluted solution.',
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
                                    'n' => 'fertilizer_rate_Cu',
                                    'vt' => 'numerical',
                                    'l' => 'Fertilizer rate',
                                    'h' => 'The amount of fertilizer you should use per unit volume of water.',
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
                                    'n' => 'fertilizer_weight_Cu',
                                    'vt' => 'numerical',
                                    'l' => 'Fertilizer weight',
                                    'h' => 'The amount of fertilizer you should use per specified volume of diluted solution.',
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
                                    'n' => 'fertilizer_rate_Mo',
                                    'vt' => 'numerical',
                                    'l' => 'Fertilizer rate',
                                    'h' => 'The amount of fertilizer you should use per unit volume of water.',
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
                                    'n' => 'fertilizer_weight_Mo',
                                    'vt' => 'numerical',
                                    'l' => 'Fertilizer weight',
                                    'h' => 'The amount of fertilizer you should use per specified volume of diluted solution.',
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
                                    'n' => 'fertilizer_rate_B',
                                    'vt' => 'numerical',
                                    'l' => 'Fertilizer rate',
                                    'h' => 'The amount of fertilizer you should use per unit volume of water.',
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
                                    'n' => 'fertilizer_weight_B',
                                    'vt' => 'numerical',
                                    'l' => 'Fertilizer weight',
                                    'h' => 'The amount of fertilizer you should use per specified volume of diluted solution.',
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
                                    't' => 'x',
                                    'c' => [
                                        ['desired_element == 0 and ppm_N and fertilizer_weight_N and volume_diluted_solution', <<<'TXT'
                                        To make a solution of {{ppm_N.formattedValue}} {{ppm_N.unit}} {{desired_element.name}}, add {{fertilizer_weight_N.formattedValue}} {{fertilizer_weight_N.unit}} of dry fertilizer to {{volume_diluted_solution.formattedValue}} {{volume_diluted_solution.fullUnit}} of water.&nbsp;
                                        TXT],
                                        ['desired_element == 1 and ppm_P and fertilizer_weight_P and volume_diluted_solution', <<<'TXT'
                                        To make a solution of {{ppm_P.formattedValue}} {{ppm_P.unit}} {{desired_element.name}}, add {{fertilizer_weight_P.formattedValue}} {{fertilizer_weight_P.unit}} of dry fertilizer to {{volume_diluted_solution.formattedValue}} {{volume_diluted_solution.fullUnit}} of water.&nbsp;
                                        TXT],
                                        ['desired_element == 2 and ppm_K and fertilizer_weight_K and volume_diluted_solution', <<<'TXT'
                                        To make a solution of {{ppm_K.formattedValue}} {{ppm_K.unit}} {{desired_element.name}}, add {{fertilizer_weight_K.formattedValue}} {{fertilizer_weight_K.unit}} of dry fertilizer to {{volume_diluted_solution.formattedValue}} {{volume_diluted_solution.fullUnit}} of water.&nbsp;
                                        TXT],
                                        ['desired_element == 3 and ppm_Ca and fertilizer_weight_Ca and volume_diluted_solution', <<<'TXT'
                                        To make a solution of {{ppm_Ca.formattedValue}} {{ppm_Ca.unit}} {{desired_element.name}}, add {{fertilizer_weight_Ca.formattedValue}} {{fertilizer_weight_Ca.unit}} of dry fertilizer to {{volume_diluted_solution.formattedValue}} {{volume_diluted_solution.fullUnit}} of water.&nbsp;
                                        TXT],
                                        ['desired_element == 4 and ppm_Mg and fertilizer_weight_Mg and volume_diluted_solution', <<<'TXT'
                                        To make a solution of {{ppm_Mg.formattedValue}} {{ppm_Mg.unit}} {{desired_element.name}}, add {{fertilizer_weight_Mg.formattedValue}} {{fertilizer_weight_Mg.unit}} of dry fertilizer to {{volume_diluted_solution.formattedValue}} {{volume_diluted_solution.fullUnit}} of water.&nbsp;
                                        TXT],
                                        ['desired_element == 5 and ppm_Fe and fertilizer_weight_Fe and volume_diluted_solution', <<<'TXT'
                                        To make a solution of {{ppm_Fe.formattedValue}} {{ppm_Fe.unit}} {{desired_element.name}}, add {{fertilizer_weight_Fe.formattedValue}} {{fertilizer_weight_Fe.unit}} of dry fertilizer to {{volume_diluted_solution.formattedValue}} {{volume_diluted_solution.fullUnit}} of water.&nbsp;
                                        TXT],
                                        ['desired_element == 6 and ppm_S and fertilizer_weight_S and volume_diluted_solution', <<<'TXT'
                                        To make a solution of {{ppm_S.formattedValue}} {{ppm_S.unit}} {{desired_element.name}}, add {{fertilizer_weight_S.formattedValue}} {{fertilizer_weight_S.unit}} of dry fertilizer to {{volume_diluted_solution.formattedValue}} {{volume_diluted_solution.fullUnit}} of water.&nbsp;
                                        TXT],
                                        ['desired_element == 7 and ppm_Mn and fertilizer_weight_Mn and volume_diluted_solution', <<<'TXT'
                                        To make a solution of {{ppm_Mn.formattedValue}} {{ppm_Mn.unit}} {{desired_element.name}}, add {{fertilizer_weight_Mn.formattedValue}} {{fertilizer_weight_Mn.unit}} of dry fertilizer to {{volume_diluted_solution.formattedValue}} {{volume_diluted_solution.fullUnit}} of water.&nbsp;
                                        TXT],
                                        ['desired_element == 8 and ppm_Zn and fertilizer_weight_Zn and volume_diluted_solution', <<<'TXT'
                                        To make a solution of {{ppm_Zn.formattedValue}} {{ppm_Zn.unit}} {{desired_element.name}}, add {{fertilizer_weight_Zn.formattedValue}} {{fertilizer_weight_Zn.unit}} of dry fertilizer to {{volume_diluted_solution.formattedValue}} {{volume_diluted_solution.fullUnit}} of water.&nbsp;
                                        TXT],
                                        ['desired_element == 9 and ppm_Cu and fertilizer_weight_Cu and volume_diluted_solution', <<<'TXT'
                                        To make a solution of {{ppm_Cu.formattedValue}} {{ppm_Cu.unit}} {{desired_element.name}}, add {{fertilizer_weight_Cu.formattedValue}} {{fertilizer_weight_Cu.unit}} of dry fertilizer to {{volume_diluted_solution.formattedValue}} {{volume_diluted_solution.fullUnit}} of water.&nbsp;
                                        TXT],
                                        ['desired_element == 10 and ppm_Mo and fertilizer_weight_Mo and volume_diluted_solution', <<<'TXT'
                                        To make a solution of {{ppm_Mo.formattedValue}} {{ppm_Mo.unit}} {{desired_element.name}}, add {{fertilizer_weight_Mo.formattedValue}} {{fertilizer_weight_Mo.unit}} of dry fertilizer to {{volume_diluted_solution.formattedValue}} {{volume_diluted_solution.fullUnit}} of water.&nbsp;
                                        TXT],
                                        ['desired_element == 11 and ppm_B and fertilizer_weight_B and volume_diluted_solution', <<<'TXT'
                                        To make a solution of {{ppm_B.formattedValue}} {{ppm_B.unit}} {{desired_element.name}}, add {{fertilizer_weight_B.formattedValue}} {{fertilizer_weight_B.unit}} of dry fertilizer to {{volume_diluted_solution.formattedValue}} {{volume_diluted_solution.fullUnit}} of water.
                                        TXT],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'ga8JwC-Bwv45-iyipF7vk',
                'title' => 'TestVariables',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'fertilizerPresets',
                                    'vt' => 'numerical',
                                    'l' => 'Fertilizer presets',
                                    'oo' => 1,
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => '8gkKq7hZBD1g60OLQ70M-',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'selectedElement', 'vt' => 'presentation', 'l' => ''],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'fertilizer_rate_N = (ppm_N / percent_weight_N) * 100',
                'var' => [
                    [
                        'l' => 'percent_weight_N',
                        'f' => '100*ppm_N/fertilizer_rate_N',
                        'r' => ['ppm_N', 'fertilizer_rate_N'],
                    ],
                    [
                        'l' => 'ppm_N',
                        'f' => '(1/100)*fertilizer_rate_N*percent_weight_N',
                        'r' => ['percent_weight_N', 'fertilizer_rate_N'],
                    ],
                    [
                        'l' => 'fertilizer_rate_N',
                        'f' => '100*ppm_N/percent_weight_N',
                        'r' => ['percent_weight_N', 'ppm_N'],
                    ],
                ],
            ],
            [
                'formula' => 'fertilizer_rate_P = (ppm_P/ percent_weight_P) * 100',
                'var' => [
                    [
                        'l' => 'percent_weight_P',
                        'f' => '100*ppm_P/fertilizer_rate_P',
                        'r' => ['ppm_P', 'fertilizer_rate_P'],
                    ],
                    [
                        'l' => 'ppm_P',
                        'f' => '(1/100)*fertilizer_rate_P*percent_weight_P',
                        'r' => ['percent_weight_P', 'fertilizer_rate_P'],
                    ],
                    [
                        'l' => 'fertilizer_rate_P',
                        'f' => '100*ppm_P/percent_weight_P',
                        'r' => ['percent_weight_P', 'ppm_P'],
                    ],
                ],
            ],
            [
                'formula' => 'fertilizer_rate_K = (ppm_K/ percent_weight_K) * 100',
                'var' => [
                    [
                        'l' => 'fertilizer_rate_K',
                        'f' => '100*ppm_K/percent_weight_K',
                        'r' => ['percent_weight_K', 'ppm_K'],
                    ],
                    [
                        'l' => 'percent_weight_K',
                        'f' => '100*ppm_K/fertilizer_rate_K',
                        'r' => ['fertilizer_rate_K', 'ppm_K'],
                    ],
                    [
                        'l' => 'ppm_K',
                        'f' => '(1/100)*fertilizer_rate_K*percent_weight_K',
                        'r' => ['fertilizer_rate_K', 'percent_weight_K'],
                    ],
                ],
            ],
            [
                'formula' => 'fertilizer_rate_Ca = (ppm_Ca/ percent_weight_Ca) * 100',
                'var' => [
                    [
                        'l' => 'fertilizer_rate_Ca',
                        'f' => '100*ppm_Ca/percent_weight_Ca',
                        'r' => ['percent_weight_Ca', 'ppm_Ca'],
                    ],
                    [
                        'l' => 'percent_weight_Ca',
                        'f' => '100*ppm_Ca/fertilizer_rate_Ca',
                        'r' => ['fertilizer_rate_Ca', 'ppm_Ca'],
                    ],
                    [
                        'l' => 'ppm_Ca',
                        'f' => '(1/100)*fertilizer_rate_Ca*percent_weight_Ca',
                        'r' => ['fertilizer_rate_Ca', 'percent_weight_Ca'],
                    ],
                ],
            ],
            [
                'formula' => 'fertilizer_rate_Mg = (ppm_Mg/ percent_weight_Mg) * 100',
                'var' => [
                    [
                        'l' => 'ppm_Mg',
                        'f' => '(1/100)*fertilizer_rate_Mg*percent_weight_Mg',
                        'r' => ['fertilizer_rate_Mg', 'percent_weight_Mg'],
                    ],
                    [
                        'l' => 'fertilizer_rate_Mg',
                        'f' => '100*ppm_Mg/percent_weight_Mg',
                        'r' => ['ppm_Mg', 'percent_weight_Mg'],
                    ],
                    [
                        'l' => 'percent_weight_Mg',
                        'f' => '100*ppm_Mg/fertilizer_rate_Mg',
                        'r' => ['ppm_Mg', 'fertilizer_rate_Mg'],
                    ],
                ],
            ],
            [
                'formula' => 'fertilizer_rate_Fe = (ppm_Fe/ percent_weight_Fe) * 100',
                'var' => [
                    [
                        'l' => 'fertilizer_rate_Fe',
                        'f' => '100*ppm_Fe/percent_weight_Fe',
                        'r' => ['ppm_Fe', 'percent_weight_Fe'],
                    ],
                    [
                        'l' => 'ppm_Fe',
                        'f' => '(1/100)*fertilizer_rate_Fe*percent_weight_Fe',
                        'r' => ['fertilizer_rate_Fe', 'percent_weight_Fe'],
                    ],
                    [
                        'l' => 'percent_weight_Fe',
                        'f' => '100*ppm_Fe/fertilizer_rate_Fe',
                        'r' => ['fertilizer_rate_Fe', 'ppm_Fe'],
                    ],
                ],
            ],
            [
                'formula' => 'fertilizer_rate_S = (ppm_S/ percent_weight_S) * 100',
                'var' => [
                    [
                        'l' => 'ppm_S',
                        'f' => '(1/100)*fertilizer_rate_S*percent_weight_S',
                        'r' => ['fertilizer_rate_S', 'percent_weight_S'],
                    ],
                    [
                        'l' => 'fertilizer_rate_S',
                        'f' => '100*ppm_S/percent_weight_S',
                        'r' => ['ppm_S', 'percent_weight_S'],
                    ],
                    [
                        'l' => 'percent_weight_S',
                        'f' => '100*ppm_S/fertilizer_rate_S',
                        'r' => ['ppm_S', 'fertilizer_rate_S'],
                    ],
                ],
            ],
            [
                'formula' => 'fertilizer_rate_Mn = (ppm_Mn/ percent_weight_Mn) * 100',
                'var' => [
                    [
                        'l' => 'ppm_Mn',
                        'f' => '(1/100)*fertilizer_rate_Mn*percent_weight_Mn',
                        'r' => ['fertilizer_rate_Mn', 'percent_weight_Mn'],
                    ],
                    [
                        'l' => 'fertilizer_rate_Mn',
                        'f' => '100*ppm_Mn/percent_weight_Mn',
                        'r' => ['ppm_Mn', 'percent_weight_Mn'],
                    ],
                    [
                        'l' => 'percent_weight_Mn',
                        'f' => '100*ppm_Mn/fertilizer_rate_Mn',
                        'r' => ['ppm_Mn', 'fertilizer_rate_Mn'],
                    ],
                ],
            ],
            [
                'formula' => 'fertilizer_rate_Zn = (ppm_Zn/ percent_weight_Zn) * 100',
                'var' => [
                    [
                        'l' => 'percent_weight_Zn',
                        'f' => '100*ppm_Zn/fertilizer_rate_Zn',
                        'r' => ['fertilizer_rate_Zn', 'ppm_Zn'],
                    ],
                    [
                        'l' => 'fertilizer_rate_Zn',
                        'f' => '100*ppm_Zn/percent_weight_Zn',
                        'r' => ['percent_weight_Zn', 'ppm_Zn'],
                    ],
                    [
                        'l' => 'ppm_Zn',
                        'f' => '(1/100)*fertilizer_rate_Zn*percent_weight_Zn',
                        'r' => ['percent_weight_Zn', 'fertilizer_rate_Zn'],
                    ],
                ],
            ],
            [
                'formula' => 'fertilizer_rate_Cu = (ppm_Cu/ percent_weight_Cu) * 100',
                'var' => [
                    [
                        'l' => 'percent_weight_Cu',
                        'f' => '100*ppm_Cu/fertilizer_rate_Cu',
                        'r' => ['ppm_Cu', 'fertilizer_rate_Cu'],
                    ],
                    [
                        'l' => 'ppm_Cu',
                        'f' => '(1/100)*fertilizer_rate_Cu*percent_weight_Cu',
                        'r' => ['percent_weight_Cu', 'fertilizer_rate_Cu'],
                    ],
                    [
                        'l' => 'fertilizer_rate_Cu',
                        'f' => '100*ppm_Cu/percent_weight_Cu',
                        'r' => ['percent_weight_Cu', 'ppm_Cu'],
                    ],
                ],
            ],
            [
                'formula' => 'fertilizer_rate_B = (ppm_B/ percent_weight_B) * 100',
                'var' => [
                    [
                        'l' => 'percent_weight_B',
                        'f' => '100*ppm_B/fertilizer_rate_B',
                        'r' => ['ppm_B', 'fertilizer_rate_B'],
                    ],
                    [
                        'l' => 'ppm_B',
                        'f' => '(1/100)*fertilizer_rate_B*percent_weight_B',
                        'r' => ['percent_weight_B', 'fertilizer_rate_B'],
                    ],
                    [
                        'l' => 'fertilizer_rate_B',
                        'f' => '100*ppm_B/percent_weight_B',
                        'r' => ['percent_weight_B', 'ppm_B'],
                    ],
                ],
            ],
            [
                'formula' => 'fertilizer_rate_Mo = (ppm_Mo/ percent_weight_Mo) * 100',
                'var' => [
                    [
                        'l' => 'percent_weight_Mo',
                        'f' => '100*ppm_Mo/fertilizer_rate_Mo',
                        'r' => ['fertilizer_rate_Mo', 'ppm_Mo'],
                    ],
                    [
                        'l' => 'fertilizer_rate_Mo',
                        'f' => '100*ppm_Mo/percent_weight_Mo',
                        'r' => ['percent_weight_Mo', 'ppm_Mo'],
                    ],
                    [
                        'l' => 'ppm_Mo',
                        'f' => '(1/100)*fertilizer_rate_Mo*percent_weight_Mo',
                        'r' => ['percent_weight_Mo', 'fertilizer_rate_Mo'],
                    ],
                ],
            ],
            [
                'formula' => 'label_P = percent_weight_P * 2.29133490476819',
                'var' => [
                    [
                        'l' => 'percent_weight_P',
                        'f' => '(100000000000000/229133490476819)*label_P',
                        'r' => ['label_P'],
                    ],
                    [
                        'l' => 'label_P',
                        'f' => '(229133490476819/100000000000000)*percent_weight_P',
                        'r' => ['percent_weight_P'],
                    ],
                ],
            ],
            [
                'formula' => 'label_K = percent_weight_K * 1.2045996884775',
                'var' => [
                    [
                        'l' => 'percent_weight_K',
                        'f' => '(400000000000/481839875391)*label_K',
                        'r' => ['label_K'],
                    ],
                    [
                        'l' => 'label_K',
                        'f' => '(481839875391/400000000000)*percent_weight_K',
                        'r' => ['percent_weight_K'],
                    ],
                ],
            ],
            [
                'formula' => 'fertilizer_weight_N = fertilizer_rate_N * volume_diluted_solution',
                'var' => [
                    [
                        'l' => 'fertilizer_rate_N',
                        'f' => 'fertilizer_weight_N/volume_diluted_solution',
                        'r' => ['volume_diluted_solution', 'fertilizer_weight_N'],
                    ],
                    [
                        'l' => 'volume_diluted_solution',
                        'f' => 'fertilizer_weight_N/fertilizer_rate_N',
                        'r' => ['fertilizer_rate_N', 'fertilizer_weight_N'],
                    ],
                    [
                        'l' => 'fertilizer_weight_N',
                        'f' => 'fertilizer_rate_N*volume_diluted_solution',
                        'r' => ['fertilizer_rate_N', 'volume_diluted_solution'],
                    ],
                ],
            ],
            [
                'formula' => 'fertilizer_weight_P = fertilizer_rate_P * volume_diluted_solution',
                'var' => [
                    [
                        'l' => 'volume_diluted_solution',
                        'f' => 'fertilizer_weight_P/fertilizer_rate_P',
                        'r' => ['fertilizer_weight_P', 'fertilizer_rate_P'],
                    ],
                    [
                        'l' => 'fertilizer_weight_P',
                        'f' => 'fertilizer_rate_P*volume_diluted_solution',
                        'r' => ['volume_diluted_solution', 'fertilizer_rate_P'],
                    ],
                    [
                        'l' => 'fertilizer_rate_P',
                        'f' => 'fertilizer_weight_P/volume_diluted_solution',
                        'r' => ['volume_diluted_solution', 'fertilizer_weight_P'],
                    ],
                ],
            ],
            [
                'formula' => 'fertilizer_weight_K = fertilizer_rate_K * volume_diluted_solution',
                'var' => [
                    [
                        'l' => 'fertilizer_weight_K',
                        'f' => 'fertilizer_rate_K*volume_diluted_solution',
                        'r' => ['volume_diluted_solution', 'fertilizer_rate_K'],
                    ],
                    [
                        'l' => 'volume_diluted_solution',
                        'f' => 'fertilizer_weight_K/fertilizer_rate_K',
                        'r' => ['fertilizer_weight_K', 'fertilizer_rate_K'],
                    ],
                    [
                        'l' => 'fertilizer_rate_K',
                        'f' => 'fertilizer_weight_K/volume_diluted_solution',
                        'r' => ['fertilizer_weight_K', 'volume_diluted_solution'],
                    ],
                ],
            ],
            [
                'formula' => 'fertilizer_weight_Ca = fertilizer_rate_Ca * volume_diluted_solution',
                'var' => [
                    [
                        'l' => 'fertilizer_weight_Ca',
                        'f' => 'fertilizer_rate_Ca*volume_diluted_solution',
                        'r' => ['volume_diluted_solution', 'fertilizer_rate_Ca'],
                    ],
                    [
                        'l' => 'volume_diluted_solution',
                        'f' => 'fertilizer_weight_Ca/fertilizer_rate_Ca',
                        'r' => ['fertilizer_weight_Ca', 'fertilizer_rate_Ca'],
                    ],
                    [
                        'l' => 'fertilizer_rate_Ca',
                        'f' => 'fertilizer_weight_Ca/volume_diluted_solution',
                        'r' => ['fertilizer_weight_Ca', 'volume_diluted_solution'],
                    ],
                ],
            ],
            [
                'formula' => 'fertilizer_weight_Mg = fertilizer_rate_Mg * volume_diluted_solution',
                'var' => [
                    [
                        'l' => 'volume_diluted_solution',
                        'f' => 'fertilizer_weight_Mg/fertilizer_rate_Mg',
                        'r' => ['fertilizer_rate_Mg', 'fertilizer_weight_Mg'],
                    ],
                    [
                        'l' => 'fertilizer_rate_Mg',
                        'f' => 'fertilizer_weight_Mg/volume_diluted_solution',
                        'r' => ['volume_diluted_solution', 'fertilizer_weight_Mg'],
                    ],
                    [
                        'l' => 'fertilizer_weight_Mg',
                        'f' => 'fertilizer_rate_Mg*volume_diluted_solution',
                        'r' => ['volume_diluted_solution', 'fertilizer_rate_Mg'],
                    ],
                ],
            ],
            [
                'formula' => 'fertilizer_weight_Fe = fertilizer_rate_Fe * volume_diluted_solution',
                'var' => [
                    [
                        'l' => 'fertilizer_rate_Fe',
                        'f' => 'fertilizer_weight_Fe/volume_diluted_solution',
                        'r' => ['volume_diluted_solution', 'fertilizer_weight_Fe'],
                    ],
                    [
                        'l' => 'volume_diluted_solution',
                        'f' => 'fertilizer_weight_Fe/fertilizer_rate_Fe',
                        'r' => ['fertilizer_rate_Fe', 'fertilizer_weight_Fe'],
                    ],
                    [
                        'l' => 'fertilizer_weight_Fe',
                        'f' => 'fertilizer_rate_Fe*volume_diluted_solution',
                        'r' => ['fertilizer_rate_Fe', 'volume_diluted_solution'],
                    ],
                ],
            ],
            [
                'formula' => 'fertilizer_weight_S = fertilizer_rate_S * volume_diluted_solution',
                'var' => [
                    [
                        'l' => 'volume_diluted_solution',
                        'f' => 'fertilizer_weight_S/fertilizer_rate_S',
                        'r' => ['fertilizer_rate_S', 'fertilizer_weight_S'],
                    ],
                    [
                        'l' => 'fertilizer_rate_S',
                        'f' => 'fertilizer_weight_S/volume_diluted_solution',
                        'r' => ['volume_diluted_solution', 'fertilizer_weight_S'],
                    ],
                    [
                        'l' => 'fertilizer_weight_S',
                        'f' => 'fertilizer_rate_S*volume_diluted_solution',
                        'r' => ['volume_diluted_solution', 'fertilizer_rate_S'],
                    ],
                ],
            ],
            [
                'formula' => 'fertilizer_weight_Mn = fertilizer_rate_Mn * volume_diluted_solution',
                'var' => [
                    [
                        'l' => 'volume_diluted_solution',
                        'f' => 'fertilizer_weight_Mn/fertilizer_rate_Mn',
                        'r' => ['fertilizer_rate_Mn', 'fertilizer_weight_Mn'],
                    ],
                    [
                        'l' => 'fertilizer_rate_Mn',
                        'f' => 'fertilizer_weight_Mn/volume_diluted_solution',
                        'r' => ['volume_diluted_solution', 'fertilizer_weight_Mn'],
                    ],
                    [
                        'l' => 'fertilizer_weight_Mn',
                        'f' => 'fertilizer_rate_Mn*volume_diluted_solution',
                        'r' => ['volume_diluted_solution', 'fertilizer_rate_Mn'],
                    ],
                ],
            ],
            [
                'formula' => 'fertilizer_weight_Zn = fertilizer_rate_Zn * volume_diluted_solution',
                'var' => [
                    [
                        'l' => 'volume_diluted_solution',
                        'f' => 'fertilizer_weight_Zn/fertilizer_rate_Zn',
                        'r' => ['fertilizer_weight_Zn', 'fertilizer_rate_Zn'],
                    ],
                    [
                        'l' => 'fertilizer_weight_Zn',
                        'f' => 'fertilizer_rate_Zn*volume_diluted_solution',
                        'r' => ['volume_diluted_solution', 'fertilizer_rate_Zn'],
                    ],
                    [
                        'l' => 'fertilizer_rate_Zn',
                        'f' => 'fertilizer_weight_Zn/volume_diluted_solution',
                        'r' => ['volume_diluted_solution', 'fertilizer_weight_Zn'],
                    ],
                ],
            ],
            [
                'formula' => 'fertilizer_weight_Cu = fertilizer_rate_Cu * volume_diluted_solution',
                'var' => [
                    [
                        'l' => 'volume_diluted_solution',
                        'f' => 'fertilizer_weight_Cu/fertilizer_rate_Cu',
                        'r' => ['fertilizer_weight_Cu', 'fertilizer_rate_Cu'],
                    ],
                    [
                        'l' => 'fertilizer_weight_Cu',
                        'f' => 'fertilizer_rate_Cu*volume_diluted_solution',
                        'r' => ['volume_diluted_solution', 'fertilizer_rate_Cu'],
                    ],
                    [
                        'l' => 'fertilizer_rate_Cu',
                        'f' => 'fertilizer_weight_Cu/volume_diluted_solution',
                        'r' => ['volume_diluted_solution', 'fertilizer_weight_Cu'],
                    ],
                ],
            ],
            [
                'formula' => 'fertilizer_weight_B = fertilizer_rate_B * volume_diluted_solution',
                'var' => [
                    [
                        'l' => 'volume_diluted_solution',
                        'f' => 'fertilizer_weight_B/fertilizer_rate_B',
                        'r' => ['fertilizer_weight_B', 'fertilizer_rate_B'],
                    ],
                    [
                        'l' => 'fertilizer_weight_B',
                        'f' => 'fertilizer_rate_B*volume_diluted_solution',
                        'r' => ['volume_diluted_solution', 'fertilizer_rate_B'],
                    ],
                    [
                        'l' => 'fertilizer_rate_B',
                        'f' => 'fertilizer_weight_B/volume_diluted_solution',
                        'r' => ['volume_diluted_solution', 'fertilizer_weight_B'],
                    ],
                ],
            ],
            [
                'formula' => 'fertilizer_weight_Mo = fertilizer_rate_Mo * volume_diluted_solution',
                'var' => [
                    [
                        'l' => 'volume_diluted_solution',
                        'f' => 'fertilizer_weight_Mo/fertilizer_rate_Mo',
                        'r' => ['fertilizer_rate_Mo', 'fertilizer_weight_Mo'],
                    ],
                    [
                        'l' => 'fertilizer_rate_Mo',
                        'f' => 'fertilizer_weight_Mo/volume_diluted_solution',
                        'r' => ['volume_diluted_solution', 'fertilizer_weight_Mo'],
                    ],
                    [
                        'l' => 'fertilizer_weight_Mo',
                        'f' => 'fertilizer_rate_Mo*volume_diluted_solution',
                        'r' => ['volume_diluted_solution', 'fertilizer_rate_Mo'],
                    ],
                ],
            ],
            [
                'formula' => 'mmol_N = ppm_N / 14.007',
                'var' => [
                    [
                        'l' => 'mmol_N',
                        'f' => '(1000/14007)*ppm_N',
                        'r' => ['ppm_N'],
                    ],
                    [
                        'l' => 'ppm_N',
                        'f' => '(14007/1000)*mmol_N',
                        'r' => ['mmol_N'],
                    ],
                ],
            ],
            [
                'formula' => 'mmol_P = ppm_P / 30.973761998',
                'var' => [
                    [
                        'l' => 'mmol_P',
                        'f' => '(500000000/15486880999)*ppm_P',
                        'r' => ['ppm_P'],
                    ],
                    [
                        'l' => 'ppm_P',
                        'f' => '(15486880999/500000000)*mmol_P',
                        'r' => ['mmol_P'],
                    ],
                ],
            ],
            [
                'formula' => 'mmol_K = ppm_K / 39.0983',
                'var' => [
                    [
                        'l' => 'mmol_K',
                        'f' => '(10000/390983)*ppm_K',
                        'r' => ['ppm_K'],
                    ],
                    [
                        'l' => 'ppm_K',
                        'f' => '(390983/10000)*mmol_K',
                        'r' => ['mmol_K'],
                    ],
                ],
            ],
            [
                'formula' => 'mmol_Ca = ppm_Ca / 40.078',
                'var' => [
                    [
                        'l' => 'mmol_Ca',
                        'f' => '(500/20039)*ppm_Ca',
                        'r' => ['ppm_Ca'],
                    ],
                    [
                        'l' => 'ppm_Ca',
                        'f' => '(20039/500)*mmol_Ca',
                        'r' => ['mmol_Ca'],
                    ],
                ],
            ],
            [
                'formula' => 'mmol_Mg = ppm_Mg / 24.305',
                'var' => [
                    [
                        'l' => 'mmol_Mg',
                        'f' => '(200/4861)*ppm_Mg',
                        'r' => ['ppm_Mg'],
                    ],
                    [
                        'l' => 'ppm_Mg',
                        'f' => '(4861/200)*mmol_Mg',
                        'r' => ['mmol_Mg'],
                    ],
                ],
            ],
            [
                'formula' => 'mmol_Fe = ppm_Fe / 55.845',
                'var' => [
                    [
                        'l' => 'ppm_Fe',
                        'f' => '(11169/200)*mmol_Fe',
                        'r' => ['mmol_Fe'],
                    ],
                    [
                        'l' => 'mmol_Fe',
                        'f' => '(200/11169)*ppm_Fe',
                        'r' => ['ppm_Fe'],
                    ],
                ],
            ],
            [
                'formula' => 'mmol_S = ppm_S / 32.06',
                'var' => [
                    [
                        'l' => 'mmol_S',
                        'f' => '(50/1603)*ppm_S',
                        'r' => ['ppm_S'],
                    ],
                    [
                        'l' => 'ppm_S',
                        'f' => '(1603/50)*mmol_S',
                        'r' => ['mmol_S'],
                    ],
                ],
            ],
            [
                'formula' => 'mmol_Mn = ppm_Mn / 54.938043',
                'var' => [
                    [
                        'l' => 'ppm_Mn',
                        'f' => '(54938043/1000000)*mmol_Mn',
                        'r' => ['mmol_Mn'],
                    ],
                    [
                        'l' => 'mmol_Mn',
                        'f' => '(1000000/54938043)*ppm_Mn',
                        'r' => ['ppm_Mn'],
                    ],
                ],
            ],
            [
                'formula' => 'mmol_Zn = ppm_Zn / 65.38',
                'var' => [
                    [
                        'l' => 'mmol_Zn',
                        'f' => '(50/3269)*ppm_Zn',
                        'r' => ['ppm_Zn'],
                    ],
                    [
                        'l' => 'ppm_Zn',
                        'f' => '(3269/50)*mmol_Zn',
                        'r' => ['mmol_Zn'],
                    ],
                ],
            ],
            [
                'formula' => 'mmol_Cu = ppm_Cu / 63.546',
                'var' => [
                    [
                        'l' => 'mmol_Cu',
                        'f' => '(500/31773)*ppm_Cu',
                        'r' => ['ppm_Cu'],
                    ],
                    [
                        'l' => 'ppm_Cu',
                        'f' => '(31773/500)*mmol_Cu',
                        'r' => ['mmol_Cu'],
                    ],
                ],
            ],
            [
                'formula' => 'mmol_Mo = ppm_Mo / 95.95',
                'var' => [
                    [
                        'l' => 'mmol_Mo',
                        'f' => '(20/1919)*ppm_Mo',
                        'r' => ['ppm_Mo'],
                    ],
                    [
                        'l' => 'ppm_Mo',
                        'f' => '(1919/20)*mmol_Mo',
                        'r' => ['mmol_Mo'],
                    ],
                ],
            ],
            [
                'formula' => 'mmol_B = ppm_B / 10.81',
                'var' => [
                    [
                        'l' => 'mmol_B',
                        'f' => '(100/1081)*ppm_B',
                        'r' => ['ppm_B'],
                    ],
                    [
                        'l' => 'ppm_B',
                        'f' => '(1081/100)*mmol_B',
                        'r' => ['mmol_B'],
                    ],
                ],
            ],
            [
                'formula' => 'fertilizerPresets = fertilizer_presets',
                'var' => [
                    [
                        'l' => 'fertilizer_presets',
                        'f' => 'fertilizerPresets',
                        'r' => ['fertilizerPresets'],
                    ],
                    [
                        'l' => 'fertilizerPresets',
                        'f' => 'fertilizer_presets',
                        'r' => ['fertilizer_presets'],
                    ],
                ],
            ],
            [
                'formula' => 'label_N = percent_weight_N',
                'var' => [
                    [
                        'l' => 'percent_weight_N',
                        'f' => 'label_N',
                        'r' => ['label_N'],
                    ],
                    [
                        'l' => 'label_N',
                        'f' => 'percent_weight_N',
                        'r' => ['percent_weight_N'],
                    ],
                ],
            ],
            [
                'formula' => 'label_P = percent_weight_P2O5',
                'var' => [
                    [
                        'l' => 'percent_weight_P2O5',
                        'f' => 'label_P',
                        'r' => ['label_P'],
                    ],
                    [
                        'l' => 'label_P',
                        'f' => 'percent_weight_P2O5',
                        'r' => ['percent_weight_P2O5'],
                    ],
                ],
            ],
            [
                'formula' => 'label_K = percent_weight_K2O',
                'var' => [
                    [
                        'l' => 'percent_weight_K2O',
                        'f' => 'label_K',
                        'r' => ['label_K'],
                    ],
                    [
                        'l' => 'label_K',
                        'f' => 'percent_weight_K2O',
                        'r' => ['percent_weight_K2O'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'Ubn51P_QOi_YKGsDvL4K8' => [
                'name' => 'desired_element',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => '2-EJQH_tOqLi8IWlsVtUZ', 'label' => 'Nitrogen (N)', 'value' => '0'],
                    ['uid' => 'FjXpbISIS-QHoggRmWVb0', 'label' => 'Phosphorus (P)', 'value' => '1'],
                    ['uid' => 'ZJjJ9wHHpsD6nXdkbyjNx', 'label' => 'Potassium (K)', 'value' => '2'],
                    ['uid' => '52sEsbxOUwCIvGjTdO_rl', 'label' => 'Calcium (Ca)', 'value' => '3'],
                    ['uid' => 'wemyHQkpX9NZZzmnwRk3C', 'label' => 'Magnesium (Mg)', 'value' => '4'],
                    ['uid' => 'yPMtqKp79pa9RYiY67tYs', 'label' => 'Iron (Fe)', 'value' => '5'],
                    ['uid' => 'FsIuMaOTgSJvCIEw0CxsT', 'label' => 'Sulphur (S)', 'value' => '6'],
                    ['uid' => 'T-_vEXoA5PFrAJMdImNPj', 'label' => 'Manganese (Mn)', 'value' => '7'],
                    ['uid' => 'eHGmvoIL4914s0hesoNFj', 'label' => 'Zinc (Zn)', 'value' => '8'],
                    ['uid' => 'A4JMXgs-8k09V0T4Ox-6G', 'label' => 'Copper (Cu)', 'value' => '9'],
                    ['uid' => '8A-pGg6mF_-gmYrmNaMwB', 'label' => 'Molybdenum (Mo)', 'value' => '10'],
                    ['uid' => 'n_FsOZ96shBT7Fhrak2vu', 'label' => 'Boron (B)', 'value' => '11'],
                ],
            ],
            'T-lDWteXTvr-eENvet9x4' => [
                'name' => 'label_type',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'p-SQi1U8gWij5U8zrVy1r', 'label' => 'N-P-K', 'value' => '0'],
                    ['uid' => 'kKor-3cQuqiYBEzUsH7Qe', 'label' => 'Elemental percentage', 'value' => '1'],
                ],
            ],
            'q8lOI-MUABCPfuY-A702b' => [
                'name' => 'fertilizer_presets',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'YwuuwO_8QeTYqBiL7q_at', 'label' => '20-20-20', 'value' => '20'],
                    ['uid' => '4PAcbM7lErw0iNagD_Msl', 'label' => 'Ammonium nitrate (34-0-0)', 'value' => '34'],
                    ['uid' => 'USFzruYfq_4h3P0vI7jnG', 'label' => 'Calcium nitrate (15.5-0-0-19Ca)', 'value' => '15.5'],
                    ['uid' => 'evCNpQ7Xks1G96wc1cZJx', 'label' => 'Magnesium sulfate (0-0-0-10Mg-13S)', 'value' => ''],
                    ['uid' => '3l5dMkPP2Ebvh0qt-wYz1', 'label' => 'Potassium nitrate (13-0-44)', 'value' => '13'],
                    ['uid' => '82X6Iztk-u_Cl8rNAkv9V', 'label' => 'Potassium chloride (0-0-60)', 'value' => '0'],
                    ['uid' => '824irlS4pauXm7HsI4I0-', 'label' => 'Monopotassium phosphate (0-52-34)', 'value' => '0'],
                    ['uid' => 'njQLNKuY5KqMei7yKqkfH', 'label' => 'Custom', 'value' => ''],
                ],
            ],
        ],
        'js' => <<<'TXT'
        "use strict";function roundTo2(value){return Math.round(value*100)/100}omni.onResult(["label_type"],function(ctx,_ref){var percent_weight_N=_ref.percent_weight_N,percent_weight_P=_ref.percent_weight_P,percent_weight_K=_ref.percent_weight_K,percent_weight_Ca=_ref.percent_weight_Ca,percent_weight_Mg=_ref.percent_weight_Mg,percent_weight_Fe=_ref.percent_weight_Fe,percent_weight_S=_ref.percent_weight_S,percent_weight_Mn=_ref.percent_weight_Mn,percent_weight_Zn=_ref.percent_weight_Zn,percent_weight_Cu=_ref.percent_weight_Cu,percent_weight_Mo=_ref.percent_weight_Mo,percent_weight_B=_ref.percent_weight_B;var elementPercent=roundTo2(percent_weight_N+percent_weight_P+percent_weight_K+percent_weight_Ca+percent_weight_Mg+percent_weight_Fe+percent_weight_S+percent_weight_Mn+percent_weight_Zn+percent_weight_Cu+percent_weight_Mo+percent_weight_B);ctx.exportValue("totalElementPercent",elementPercent)});//# sourceURL=customJs.js
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        Supply the iron, the manganese and the mass concentration and the Water soluble fertilizer calculator solves for <strong>total Nitrogen (N)</strong>. 
        
        Press Calculate for the answer; change a value and it steps off screen until you press again, so each edit can be judged on its own.
        TXT,
        'sections' => [
            ['title' => 'How does the Water soluble fertilizer calculator work?', 'html' => <<<'TXT'
            <p>The Water soluble fertilizer calculator takes the values in the form, applies the relationship described below and reports <strong>total Nitrogen (N)</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the label type and the desired element); then you type in the iron (Fe), the manganese (Mn), the mass concentration (Your requirements) and the mass concentration (Your requirements).</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 2 options, such as N-P-K and elemental percentage. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>A number, expressed in %.</li><li>A number, expressed in %.</li><li>Pick the option that matches your case — 12 options, such as nitrogen (N), phosphorus (P) and potassium (K). The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>A measured quantity, entered by default in parts per million. The unit chip switches it to any of the 28 supported units.</li><li>A measured quantity, entered by default in parts per million. The unit chip switches it to any of the 28 supported units.</li><li>A measured quantity, entered by default in parts per million. The unit chip switches it to any of the 28 supported units.</li><li>A measured quantity, entered by default in parts per million. The unit chip switches it to any of the 28 supported units.</li><li>A measured quantity, entered by default in millimolars. The unit chip switches it to any of the 9 supported units.</li><li>A measured quantity, entered by default in parts per million. The unit chip switches it to any of the 28 supported units.</li><li>A measured quantity, entered by default in parts per million. The unit chip switches it to any of the 28 supported units.</li><li>A measured quantity, entered by default in parts per million. The unit chip switches it to any of the 28 supported units.</li><li>A measured quantity, entered by default in parts per million. The unit chip switches it to any of the 28 supported units.</li><li>A measured quantity, entered by default in grams. </li><li>A measured quantity, entered by default in grams per liter. The unit chip switches it to any of the 28 supported units.</li><li>A measured quantity, entered by default in grams. </li><li>A measured quantity, entered by default in grams. </li><li>A measured quantity, entered by default in grams. </li><li>A measured quantity, entered by default in grams. </li><li>A measured quantity, entered by default in grams per liter. The unit chip switches it to any of the 28 supported units.</li><li>A measured quantity, entered by default in grams per liter. The unit chip switches it to any of the 28 supported units.</li><li>A measured quantity, entered by default in grams. </li><li>A measured quantity, entered by default in grams per liter. The unit chip switches it to any of the 28 supported units.</li><li>A plain number with no unit attached.</li></ul><p>3 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Fertilizer presets</strong></td><td>One of 8 options, such as 20-20-20, ammonium nitrate (34-0-0) and calcium nitrate (15.5-0-0-19Ca).</td><td>choice</td><td>Calculated</td></tr><tr><td><strong>Label type</strong></td><td>One of 2 options, such as N-P-K and elemental percentage.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Total Nitrogen (N)</strong></td><td>A measured quantity, 6 units available.</td><td>percent</td><td>Calculated</td></tr><tr><td><strong>Available phosphate (P₂O₅)</strong></td><td>A measured quantity, 6 units available.</td><td>percent</td><td>Calculated</td></tr><tr><td><strong>Soluble Phosphorus (P)</strong></td><td>A number stated in %.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Soluble potash (K₂O)</strong></td><td>A number stated in %.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Soluble Potassium (K)</strong></td><td>A number stated in %.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Calcium (Ca)</strong></td><td>A number stated in %.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Magnesium (Mg)</strong></td><td>A number stated in %.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Iron (Fe)</strong></td><td>A number stated in %.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Sulphur (S)</strong></td><td>A number stated in %.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Manganese (Mn)</strong></td><td>A number stated in %.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Zinc (Zn)</strong></td><td>A number stated in %.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Copper (Cu)</strong></td><td>A number stated in %.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Molybdenum (Mo)</strong></td><td>A number stated in %.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Boron (B)</strong></td><td>A number stated in %.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Desired element</strong></td><td>One of 12 options, such as nitrogen (N), phosphorus (P) and potassium (K).</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Mass concentration (Your requirements)</strong></td><td>A measured quantity, 28 units available.</td><td>parts per million</td><td>You supply it</td></tr><tr><td><strong>Molar concentration (Your requirements)</strong></td><td>A measured quantity, 9 units available.</td><td>millimolars</td><td>Calculated</td></tr><tr><td><strong>Mass concentration (Your requirements)</strong></td><td>A measured quantity, 28 units available.</td><td>parts per million</td><td>You supply it</td></tr><tr><td><strong>Molar concentration (Your requirements)</strong></td><td>A measured quantity, 9 units available.</td><td>millimolars</td><td>Calculated</td></tr><tr><td><strong>Mass concentration (Your requirements)</strong></td><td>A measured quantity, 28 units available.</td><td>parts per million</td><td>You supply it</td></tr><tr><td><strong>Molar concentration (Your requirements)</strong></td><td>A measured quantity, 9 units available.</td><td>millimolars</td><td>Calculated</td></tr><tr><td><strong>Mass concentration (Your requirements)</strong></td><td>A measured quantity, 28 units available.</td><td>parts per million</td><td>You supply it</td></tr></tbody></table><p>The table lists the first 24 of 67 fields; the rest follow the same pattern.</p>
            TXT],
            ['title' => 'The formula behind the Water soluble fertilizer calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Total Nitrogen (N)</span><span class="formula-eq">=</span><span class="formula-rhs">100 × mass concentration ÷ fertilizer rate</span></div><div class="formula-row"><span class="formula-lhs">Soluble Phosphorus (P)</span><span class="formula-eq">=</span><span class="formula-rhs">100 × mass concentration ÷ fertilizer rate</span></div><div class="formula-row"><span class="formula-lhs">Fertilizer rate</span><span class="formula-eq">=</span><span class="formula-rhs">100 × mass concentration ÷ soluble Potassium (K)</span></div><div class="formula-row"><span class="formula-lhs">Fertilizer rate</span><span class="formula-eq">=</span><span class="formula-rhs">100 × mass concentration ÷ calcium (Ca)</span></div><div class="formula-row"><span class="formula-lhs">Mass concentration</span><span class="formula-eq">=</span><span class="formula-rhs">(1 ÷ 100) × fertilizer rate × magnesium (Mg)</span></div><div class="formula-row"><span class="formula-lhs">Fertilizer rate</span><span class="formula-eq">=</span><span class="formula-rhs">100 × mass concentration ÷ iron (Fe)</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in percent, and convertible to any of the 6 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in grams per liter, and convertible to any of the 28 units on that chip.</li><li>Shown in grams per liter, and convertible to any of the 28 units on that chip.</li><li>Shown in parts per million, and convertible to any of the 28 units on that chip.</li><li>Shown in grams per liter, and convertible to any of the 28 units on that chip.</li><li>Shown in parts per million, and convertible to any of the 28 units on that chip.</li><li>Shown in parts per million, and convertible to any of the 28 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>%, opening in percent</li><li>%, opening in percent</li><li>Density, opening in parts per million</li><li>Molar concentration, opening in millimolars</li><li>Density, opening in parts per million</li><li>Molar concentration, opening in millimolars</li><li>Density, opening in parts per million</li><li>Molar concentration, opening in millimolars</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Water soluble fertilizer calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Putting a biological quantity into a scale you can picture</li><li>Supporting a lesson, a lecture or a field note</li><li>Comparing two organisms, populations or processes</li><li>Any time the same 3 figures keep coming back — the iron, the manganese and the mass concentration — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Round only at the end. </li><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li><li>Write the answer down with its unit. </li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/acres-per-hour">Acres per hour</a>, <a href="/biology/allele-frequency">Allele frequency</a> and <a href="/biology/animal-mortality-rate">Animal mortality rate</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Water soluble fertilizer calculator work out?', 'a' => <<<'TXT'
            It returns total Nitrogen (N), derived from the iron, the manganese and the mass concentration. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Water soluble fertilizer calculator?', 'a' => <<<'TXT'
            The form asks for the iron, the manganese and the mass concentration, which is 24 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter total Nitrogen (N) in a different unit?', 'a' => <<<'TXT'
            Yes. Total Nitrogen (N) opens in percent and the chip beside it offers 6 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There are several choices to make (3 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'What is a typical result?', 'a' => <<<'TXT'
            With the values the page starts from, the calculator reports N = 0. Treat that as a reference point rather than a recommendation: it exists so you can tell at a glance whether your own inputs are on the same scale.
            TXT],
            ['q' => 'Is the Water soluble fertilizer calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/acres-per-hour', 'name' => 'Acres per hour'],
            ['path' => '/biology/allele-frequency', 'name' => 'Allele frequency'],
            ['path' => '/biology/animal-mortality-rate', 'name' => 'Animal mortality rate'],
        ],
    ],
];
