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
    'meta' => ['title' => 'Water soluble fertilizer Calculator: Free, With Steps', 'description' => 'Water soluble fertilizer takes Fertilizer presets, Label type and Soluble Phosphorus (P) and returns N and P₂O₅. The arithmetic is the whole method: N is…', 'h1' => 'Water soluble fertilizer Calculator', 'updated' => '2026-08-12'],
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
        Water soluble fertilizer takes Fertilizer presets, Label type and Soluble Phosphorus (P) and returns N and P₂O₅. The arithmetic is the whole method: N is worked out from Fertilizer presets by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Water soluble fertilizer calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Water soluble fertilizer: it takes 61 numbers and reports N, P₂O₅ and K₂O.</p><p>The relationship it solves reads Total Nitrogen (N) = 100 × Mass concentration ÷ Fertilizer rate.</p><p>What comes back is N, P₂O₅, K₂O and Ca — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 61 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Fertilizer presets</strong> — a plain number, no unit. These are some common fertilizer ratios used when creating solutions. The percent composition may differ slightly from company to company.</li><li><strong>Label type</strong> — a plain number, no unit. Select &quot;elemental percentage&quot; to see all possible elements. To find the fertilizer&#039;s elemental percentages, check the &quot;guaranteed analysis&quot; section of the label.</li><li><strong>Soluble Phosphorus (P)</strong> — in %</li><li><strong>Soluble Potassium (K)</strong> — in %</li><li><strong>Iron (Fe)</strong> — in %</li><li><strong>Manganese (Mn)</strong> — in %</li><li><strong>Zinc (Zn)</strong> — in %</li><li><strong>Copper (Cu)</strong> — in %</li><li><strong>Molybdenum (Mo)</strong> — in %</li><li><strong>Boron (B)</strong> — in %</li><li><strong>Desired element</strong> — a plain number, no unit</li><li><strong>Mass concentration</strong> — in parts per million</li><li><strong>Molar concentration</strong> — in millimolars</li><li><strong>Mass concentration</strong> — in parts per million</li><li><strong>Molar concentration</strong> — in millimolars</li><li><strong>Mass concentration</strong> — in parts per million</li><li><strong>Molar concentration</strong> — in millimolars</li><li><strong>Mass concentration</strong> — in parts per million</li><li><strong>Molar concentration</strong> — in millimolars</li><li><strong>Mass concentration</strong> — in parts per million</li><li><strong>Molar concentration</strong> — in millimolars</li><li><strong>Mass concentration</strong> — in parts per million</li><li><strong>Molar concentration</strong> — in millimolars</li><li><strong>Mass concentration</strong> — in parts per million</li><li><strong>Molar concentration</strong> — in millimolars</li><li><strong>Mass concentration</strong> — in parts per million</li><li><strong>Molar concentration</strong> — in millimolars</li><li><strong>Mass concentration</strong> — in parts per million</li><li><strong>Molar concentration</strong> — in millimolars</li><li><strong>Mass concentration</strong> — in parts per million</li><li><strong>Molar concentration</strong> — in millimolars</li><li><strong>Mass concentration</strong> — in parts per million</li><li><strong>Molar concentration</strong> — in millimolars</li><li><strong>Mass concentration</strong> — in parts per million</li><li><strong>Molar concentration</strong> — in millimolars</li><li><strong>Volume of diluted solution</strong> — in liters</li><li><strong>Fertilizer rate</strong> — in grams per liter. The amount of fertilizer you should use per unit volume of water.</li><li><strong>Fertilizer weight</strong> — in grams. The amount of fertilizer you should use per specified volume of diluted solution.</li><li><strong>Fertilizer rate</strong> — in grams per liter. The amount of fertilizer you should use per unit volume of water.</li><li><strong>Fertilizer weight</strong> — in grams. The amount of fertilizer you should use per specified volume of diluted solution.</li><li><strong>Fertilizer rate</strong> — in grams per liter. The amount of fertilizer you should use per unit volume of water.</li><li><strong>Fertilizer weight</strong> — in grams. The amount of fertilizer you should use per specified volume of diluted solution.</li><li><strong>Fertilizer rate</strong> — in grams per liter. The amount of fertilizer you should use per unit volume of water.</li><li><strong>Fertilizer weight</strong> — in grams. The amount of fertilizer you should use per specified volume of diluted solution.</li><li><strong>Fertilizer rate</strong> — in grams per liter. The amount of fertilizer you should use per unit volume of water.</li><li><strong>Fertilizer weight</strong> — in grams. The amount of fertilizer you should use per specified volume of diluted solution.</li><li><strong>Fertilizer rate</strong> — in grams per liter. The amount of fertilizer you should use per unit volume of water.</li><li><strong>Fertilizer weight</strong> — in grams. The amount of fertilizer you should use per specified volume of diluted solution.</li><li><strong>Fertilizer rate</strong> — in grams per liter. The amount of fertilizer you should use per unit volume of water.</li><li><strong>Fertilizer weight</strong> — in grams. The amount of fertilizer you should use per specified volume of diluted solution.</li><li><strong>Fertilizer rate</strong> — in grams per liter. The amount of fertilizer you should use per unit volume of water.</li><li><strong>Fertilizer weight</strong> — in grams. The amount of fertilizer you should use per specified volume of diluted solution.</li><li><strong>Fertilizer rate</strong> — in grams per liter. The amount of fertilizer you should use per unit volume of water.</li><li><strong>Fertilizer weight</strong> — in grams. The amount of fertilizer you should use per specified volume of diluted solution.</li><li><strong>Fertilizer rate</strong> — in grams per liter. The amount of fertilizer you should use per unit volume of water.</li><li><strong>Fertilizer weight</strong> — in grams. The amount of fertilizer you should use per specified volume of diluted solution.</li><li><strong>Fertilizer rate</strong> — in grams per liter. The amount of fertilizer you should use per unit volume of water.</li><li><strong>Fertilizer weight</strong> — in grams. The amount of fertilizer you should use per specified volume of diluted solution.</li><li><strong>Fertilizer rate</strong> — in grams per liter. The amount of fertilizer you should use per unit volume of water.</li><li><strong>Fertilizer weight</strong> — in grams. The amount of fertilizer you should use per specified volume of diluted solution.</li><li><strong>selectedElement</strong> — a plain number, no unit</li></ul><p>The answers come back as N, P₂O₅, K₂O, Ca, Mg, S, Total Nitrogen (N) in percent, Available phosphate (P₂O₅) in percent, Soluble potash (K₂O) in %, Calcium (Ca) in %, Magnesium (Mg) in %, Sulphur (S) in %, Fertilizer presets. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Label type = 0 and Desired element = 0 — through the same formula and the panel reports &lt;strong&gt;Fertilizer presets&lt;/strong&gt; = 20, &lt;strong&gt;Soluble Phosphorus (P)&lt;/strong&gt; = 0 %, &lt;strong&gt;Soluble Potassium (K)&lt;/strong&gt; = 0 % and &lt;strong&gt;Fertilizer presets&lt;/strong&gt; = 20.</p><ul><li><strong>Fertilizer presets</strong> = 20</li><li><strong>Soluble Phosphorus (P)</strong> = 0 %</li><li><strong>Soluble Potassium (K)</strong> = 0 %</li><li><strong>Fertilizer presets</strong> = 20</li></ul><p>That is <strong>Total Nitrogen (N)</strong> = <code>100 × Mass concentration ÷ Fertilizer rate</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Fertilizer presets&lt;/strong&gt; = 20, &lt;strong&gt;Soluble Phosphorus (P)&lt;/strong&gt; = 0, &lt;strong&gt;Soluble Potassium (K)&lt;/strong&gt; = 0 and &lt;strong&gt;Fertilizer presets&lt;/strong&gt; = 20 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Total Nitrogen (N) offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Total Nitrogen (N)</strong> = <code>100 × Mass concentration ÷ Fertilizer rate</code></li><li><strong>Mass concentration</strong> = <code>(1 ÷ 100) × Fertilizer rate × Total Nitrogen (N)</code></li><li><strong>Fertilizer rate</strong> = <code>100 × Mass concentration ÷ Total Nitrogen (N)</code></li><li><strong>Soluble Phosphorus (P)</strong> = <code>100 × Mass concentration ÷ Fertilizer rate</code></li><li><strong>Soluble Potassium (K)</strong> = <code>100 × Mass concentration ÷ Fertilizer rate</code></li><li><strong>Calcium (Ca)</strong> = <code>100 × Mass concentration ÷ Fertilizer rate</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Total Nitrogen (N)</strong> = <code>100 × Mass concentration ÷ Fertilizer rate</code> — the form to use when Mass concentration and Fertilizer rate are the values you have.</li><li><strong>Mass concentration</strong> = <code>(1 ÷ 100) × Fertilizer rate × Total Nitrogen (N)</code> — the form to use when Total Nitrogen (N) and Fertilizer rate are the values you have.</li><li><strong>Fertilizer rate</strong> = <code>100 × Mass concentration ÷ Total Nitrogen (N)</code> — the form to use when Total Nitrogen (N) and Mass concentration are the values you have.</li><li><strong>Soluble Phosphorus (P)</strong> = <code>100 × Mass concentration ÷ Fertilizer rate</code> — the form to use when Mass concentration and Fertilizer rate are the values you have.</li><li><strong>Mass concentration</strong> = <code>(1 ÷ 100) × Fertilizer rate × Soluble Phosphorus (P)</code> — the form to use when Soluble Phosphorus (P) and Fertilizer rate are the values you have.</li><li><strong>Fertilizer rate</strong> = <code>100 × Mass concentration ÷ Soluble Phosphorus (P)</code> — the form to use when Soluble Phosphorus (P) and Mass concentration are the values you have.</li><li><strong>Fertilizer rate</strong> = <code>100 × Mass concentration ÷ Soluble Potassium (K)</code> — the form to use when Soluble Potassium (K) and Mass concentration are the values you have.</li><li><strong>Soluble Potassium (K)</strong> = <code>100 × Mass concentration ÷ Fertilizer rate</code> — the form to use when Fertilizer rate and Mass concentration are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Total Nitrogen (N), Mass concentration and Fertilizer rate can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => ''],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Mass concentration, Molar concentration and Mass concentration is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with N, P₂O₅ and K₂O are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Fertilizer presets left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Fertilizer presets is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Label type left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Label type is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Fertilizer presets is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> N follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are percent, grams per liter and millimolars and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Fertilizer presets, Label type and Soluble Phosphorus (P) are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Fertilizer presets, Label type and Soluble Phosphorus (P) is what you already know and N and P₂O₅ is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/base-pair-to-kda">Base Pair to kDa Calculator</a>, <a href="/biology/bca-assay-calculator">BCA Assay (standard curve) Calculator</a> and <a href="/biology/beer-lambert-a280-protein-concentration">Beer-Lambert A280 Protein Concentration Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Water soluble fertilizer calculator work out?', 'a' => 'N, P₂O₅, K₂O and Ca, from Mass concentration and Fertilizer rate. The relationship is Total Nitrogen (N) = 100 × Mass concentration ÷ Fertilizer rate.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Fertilizer presets, Label type, Soluble Phosphorus (P) (%), Soluble Potassium (K) (%), Iron (Fe) (%). With fertilizer_presets, label_type and percent_weight_P in place, N can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Total Nitrogen (N), Mass concentration, Fertilizer rate and Soluble Phosphorus (P) can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Fertilizer presets = 20, Soluble Phosphorus (P) = 0 %, Soluble Potassium (K) = 0 % and Fertilizer presets = 20. Those are the defaults written into the form — move Fertilizer presets and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            N is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Fertilizer presets blank and the page solves for it, reporting N instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to N at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/base-pair-to-kda', 'name' => 'Base Pair to kDa Calculator'],
            ['path' => '/biology/bca-assay-calculator', 'name' => 'BCA Assay (standard curve) Calculator'],
            ['path' => '/biology/beer-lambert-a280-protein-concentration', 'name' => 'Beer-Lambert A280 Protein Concentration Calculator'],
        ],
        'authors' => [],
    ],
];
