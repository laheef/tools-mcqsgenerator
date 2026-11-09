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
    'meta' => ['title' => 'Water soluble fertilizer Calculator: Steps & Units', 'description' => <<<'TXT'
    Water soluble fertilizer works out n and P₂O₅ from fertilizer presets and label type. Each figure is computed from the boxes you fill, never read from a table.
    TXT, 'h1' => 'Water soluble fertilizer Calculator', 'updated' => '2026-08-12'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fertilizer_presets',
                            'label' => 'Fertilizer presets',
                            'type' => 'select',
                            'options' => [
                                '20-20-20' => '20',
                                'Ammonium nitrate (34-0-0)' => '34',
                                'Calcium nitrate (15.5-0-0-19Ca)' => '15.5',
                                'Magnesium sulfate (0-0-0-10Mg-13S)' => '',
                                'Potassium nitrate (13-0-44)' => '13',
                                'Potassium chloride (0-0-60)' => '0',
                                'Monopotassium phosphate (0-52-34)' => '0',
                                'Custom' => '',
                            ],
                            'dataset' => 'fertilizer_presets',
                            'control' => 'DROPDOWN',
                            'help' => 'These are some common fertilizer ratios used when creating solutions. The percent composition may differ slightly from company to company.',
                            'default' => '20-20-20',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Fertilizer label',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'label_type',
                            'label' => 'Label type',
                            'type' => 'select',
                            'options' => ['N-P-K' => '0', 'Elemental percentage' => '1'],
                            'dataset' => 'label_type',
                            'help' => <<<'TXT'
                            Select "elemental percentage" to see all possible elements. To find the fertilizer's elemental percentages, check the "guaranteed analysis" section of the label.
                            TXT,
                            'default' => 'N-P-K',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'label_N',
                            'label' => 'N',
                            'type' => 'result',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'label_P',
                            'label' => 'P₂O₅',
                            'type' => 'result',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'label_K',
                            'label' => 'K₂O',
                            'type' => 'result',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'label_Ca',
                            'label' => ' Ca',
                            'type' => 'result',
                            'rounding' => ['standard', '2'],
                            'default' => '19',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'label_Mg',
                            'label' => 'Mg',
                            'type' => 'result',
                            'rounding' => ['standard', '2'],
                            'default' => '10',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'label_S',
                            'label' => 'S',
                            'type' => 'result',
                            'rounding' => ['standard', '2'],
                            'default' => '13',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'percent_weight_N',
                            'label' => 'Total Nitrogen (N)',
                            'type' => 'result',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'percent_weight_P2O5',
                            'label' => 'Available phosphate (P₂O₅)',
                            'type' => 'result',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'percent_weight_P',
                            'label' => 'Soluble Phosphorus (P)',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'percent_weight_K2O',
                            'label' => 'Soluble potash (K₂O)',
                            'type' => 'result',
                            'suffix' => '%',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'percent_weight_K',
                            'label' => 'Soluble Potassium (K)',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'percent_weight_Ca',
                            'label' => 'Calcium (Ca)',
                            'type' => 'result',
                            'suffix' => '%',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'percent_weight_Mg',
                            'label' => 'Magnesium (Mg)',
                            'type' => 'result',
                            'suffix' => '%',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'percent_weight_Fe',
                            'label' => 'Iron (Fe)',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'percent_weight_S',
                            'label' => 'Sulphur (S)',
                            'type' => 'result',
                            'suffix' => '%',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'percent_weight_Mn',
                            'label' => 'Manganese (Mn)',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'percent_weight_Zn',
                            'label' => 'Zinc (Zn)',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'percent_weight_Cu',
                            'label' => 'Copper (Cu)',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'percent_weight_Mo',
                            'label' => 'Molybdenum (Mo)',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'percent_weight_B',
                            'label' => 'Boron (B)',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'If the sum of elemental percentages exceeds 100%, it will become an impossible fertilizer! Current sum of elemental percentages: {{totalElementPercent.value}}%'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => <<<'TXT'
                                (fertilizer_presets == 0 or fertilizer_presets == 1) and label_type == 0 and (percent_weight_Ca or percent_weight_Mg or percent_weight_Fe or percent_weight_S or percent_weight_Mn or percent_weight_Zn or percent_weight_Cu or percent_weight_Mo or percent_weight_B)
                                TXT, 'text' => 'This fertilizer contains some elements which are hidden from view. Change the label type to see them.'],
                                ['when' => <<<'TXT'
                                fertilizer_presets == 2 and label_type == 0 and (percent_weight_Mg or percent_weight_Fe or percent_weight_S or percent_weight_Mn or percent_weight_Zn or percent_weight_Cu or percent_weight_Mo or percent_weight_B)
                                TXT, 'text' => 'This fertilizer contains some elements which are hidden from view. Change the label type to see them.'],
                                ['when' => <<<'TXT'
                                fertilizer_presets == 3 and label_type == 0 and (percent_weight_N or percent_weight_P2O5 or percent_weight_P or percent_weight_K2O or percent_weight_K or percent_weight_Ca or percent_weight_Fe or percent_weight_Mn or percent_weight_Zn or percent_weight_Cu or percent_weight_Mo or percent_weight_B)
                                TXT, 'text' => 'This fertilizer contains some elements which are hidden from view. Change the label type to see them.'],
                                ['when' => <<<'TXT'
                                (fertilizer_presets == 4 or fertilizer_presets == 5) and label_type == 0 and (percent_weight_Ca or percent_weight_Mg or percent_weight_Fe or percent_weight_S or percent_weight_Mn or percent_weight_Zn or percent_weight_Cu or percent_weight_Mo or percent_weight_B)
                                TXT, 'text' => 'This fertilizer contains some elements which are hidden from view. Change the label type to see them.'],
                                ['when' => <<<'TXT'
                                fertilizer_presets == 6 and label_type == 0 and (percent_weight_Ca or percent_weight_Mg or percent_weight_Fe or percent_weight_S or percent_weight_Mn or percent_weight_Zn or percent_weight_Cu or percent_weight_Mo or percent_weight_B)
                                TXT, 'text' => 'This fertilizer contains some elements which are hidden from view. Change the label type to see them.'],
                                ['when' => <<<'TXT'
                                fertilizer_presets == 7 and label_type == 0 and (percent_weight_Ca or percent_weight_Mg or percent_weight_Fe or percent_weight_S or percent_weight_Mn or percent_weight_Zn or percent_weight_Cu or percent_weight_Mo or percent_weight_B)
                                TXT, 'text' => 'This fertilizer contains some elements which are hidden from view. Change the label type to see them.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Your requirements',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'desired_element',
                            'label' => 'Desired element',
                            'type' => 'select',
                            'options' => [
                                'Nitrogen (N)' => '0',
                                'Phosphorus (P)' => '1',
                                'Potassium (K)' => '2',
                                'Calcium (Ca)' => '3',
                                'Magnesium (Mg)' => '4',
                                'Iron (Fe)' => '5',
                                'Sulphur (S)' => '6',
                                'Manganese (Mn)' => '7',
                                'Zinc (Zn)' => '8',
                                'Copper (Cu)' => '9',
                                'Molybdenum (Mo)' => '10',
                                'Boron (B)' => '11',
                            ],
                            'dataset' => 'desired_element',
                            'control' => 'DROPDOWN',
                            'defaults' => [
                                ['value' => 'Nitrogen (N)', 'when' => 'fertilizerPresets == 0 or fertilizerPresets == 1'],
                                ['value' => 'Calcium (Ca)', 'when' => 'fertilizerPresets == 2'],
                                ['value' => 'Magnesium (Mg)', 'when' => 'fertilizerPresets == 3'],
                                ['value' => 'Potassium (K)', 'when' => 'fertilizerPresets == 4 or fertilizerPresets == 5'],
                                ['value' => 'Phosphorus (P)', 'when' => 'fertilizerPresets == 6'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Your desired element must be present in the fertilizer!'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ppm_N',
                            'label' => 'Mass concentration',
                            'type' => 'number',
                            'unit' => '21',
                            'unit_default' => 'ppm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mmol_N',
                            'label' => 'Molar concentration',
                            'type' => 'number',
                            'unit' => '65',
                            'unit_default' => 'mM',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ppm_P',
                            'label' => 'Mass concentration',
                            'type' => 'number',
                            'unit' => '21',
                            'unit_default' => 'ppm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mmol_P',
                            'label' => 'Molar concentration',
                            'type' => 'number',
                            'unit' => '65',
                            'unit_default' => 'mM',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ppm_K',
                            'label' => 'Mass concentration',
                            'type' => 'number',
                            'unit' => '21',
                            'unit_default' => 'ppm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mmol_K',
                            'label' => 'Molar concentration',
                            'type' => 'number',
                            'unit' => '65',
                            'unit_default' => 'mM',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ppm_Ca',
                            'label' => 'Mass concentration',
                            'type' => 'number',
                            'unit' => '21',
                            'unit_default' => 'ppm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mmol_Ca',
                            'label' => 'Molar concentration',
                            'type' => 'number',
                            'unit' => '65',
                            'unit_default' => 'mM',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ppm_Mg',
                            'label' => 'Mass concentration',
                            'type' => 'number',
                            'unit' => '21',
                            'unit_default' => 'ppm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mmol_Mg',
                            'label' => 'Molar concentration',
                            'type' => 'number',
                            'unit' => '65',
                            'unit_default' => 'mM',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ppm_Fe',
                            'label' => 'Mass concentration',
                            'type' => 'number',
                            'unit' => '21',
                            'unit_default' => 'ppm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mmol_Fe',
                            'label' => 'Molar concentration',
                            'type' => 'number',
                            'unit' => '65',
                            'unit_default' => 'mM',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ppm_S',
                            'label' => 'Mass concentration',
                            'type' => 'number',
                            'unit' => '21',
                            'unit_default' => 'ppm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mmol_S',
                            'label' => 'Molar concentration',
                            'type' => 'number',
                            'unit' => '65',
                            'unit_default' => 'mM',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ppm_Mn',
                            'label' => 'Mass concentration',
                            'type' => 'number',
                            'unit' => '21',
                            'unit_default' => 'ppm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mmol_Mn',
                            'label' => 'Molar concentration',
                            'type' => 'number',
                            'unit' => '65',
                            'unit_default' => 'mM',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ppm_Zn',
                            'label' => 'Mass concentration',
                            'type' => 'number',
                            'unit' => '21',
                            'unit_default' => 'ppm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mmol_Zn',
                            'label' => 'Molar concentration',
                            'type' => 'number',
                            'unit' => '65',
                            'unit_default' => 'mM',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ppm_Cu',
                            'label' => 'Mass concentration',
                            'type' => 'number',
                            'unit' => '21',
                            'unit_default' => 'ppm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mmol_Cu',
                            'label' => 'Molar concentration',
                            'type' => 'number',
                            'unit' => '65',
                            'unit_default' => 'mM',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ppm_Mo',
                            'label' => 'Mass concentration',
                            'type' => 'number',
                            'unit' => '21',
                            'unit_default' => 'ppm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mmol_Mo',
                            'label' => 'Molar concentration',
                            'type' => 'number',
                            'unit' => '65',
                            'unit_default' => 'mM',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ppm_B',
                            'label' => 'Mass concentration',
                            'type' => 'number',
                            'unit' => '21',
                            'unit_default' => 'ppm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mmol_B',
                            'label' => 'Molar concentration',
                            'type' => 'number',
                            'unit' => '65',
                            'unit_default' => 'mM',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Nutrient solution recipe',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'volume_diluted_solution',
                            'label' => 'Volume of diluted solution',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'liters',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '100', 'when' => null],
                                ['value' => '25', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fertilizer_rate_N',
                            'label' => 'Fertilizer rate',
                            'type' => 'number',
                            'help' => 'The amount of fertilizer you should use per unit volume of water.',
                            'unit' => '21',
                            'unit_default' => 'gperL',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fertilizer_weight_N',
                            'label' => 'Fertilizer weight',
                            'type' => 'number',
                            'help' => 'The amount of fertilizer you should use per specified volume of diluted solution.',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fertilizer_rate_P',
                            'label' => 'Fertilizer rate',
                            'type' => 'number',
                            'help' => 'The amount of fertilizer you should use per unit volume of water.',
                            'unit' => '21',
                            'unit_default' => 'gperL',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fertilizer_weight_P',
                            'label' => 'Fertilizer weight',
                            'type' => 'number',
                            'help' => 'The amount of fertilizer you should use per specified volume of diluted solution.',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fertilizer_rate_K',
                            'label' => 'Fertilizer rate',
                            'type' => 'number',
                            'help' => 'The amount of fertilizer you should use per unit volume of water.',
                            'unit' => '21',
                            'unit_default' => 'gperL',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fertilizer_weight_K',
                            'label' => 'Fertilizer weight',
                            'type' => 'number',
                            'help' => 'The amount of fertilizer you should use per specified volume of diluted solution.',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fertilizer_rate_Ca',
                            'label' => 'Fertilizer rate',
                            'type' => 'number',
                            'help' => 'The amount of fertilizer you should use per unit volume of water.',
                            'unit' => '21',
                            'unit_default' => 'gperL',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fertilizer_weight_Ca',
                            'label' => 'Fertilizer weight',
                            'type' => 'number',
                            'help' => 'The amount of fertilizer you should use per specified volume of diluted solution.',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fertilizer_rate_Mg',
                            'label' => 'Fertilizer rate',
                            'type' => 'number',
                            'help' => 'The amount of fertilizer you should use per unit volume of water.',
                            'unit' => '21',
                            'unit_default' => 'gperL',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fertilizer_weight_Mg',
                            'label' => 'Fertilizer weight',
                            'type' => 'number',
                            'help' => 'The amount of fertilizer you should use per specified volume of diluted solution.',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fertilizer_rate_Fe',
                            'label' => 'Fertilizer rate',
                            'type' => 'number',
                            'help' => 'The amount of fertilizer you should use per unit volume of water.',
                            'unit' => '21',
                            'unit_default' => 'gperL',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fertilizer_weight_Fe',
                            'label' => 'Fertilizer weight',
                            'type' => 'number',
                            'help' => 'The amount of fertilizer you should use per specified volume of diluted solution.',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fertilizer_rate_S',
                            'label' => 'Fertilizer rate',
                            'type' => 'number',
                            'help' => 'The amount of fertilizer you should use per unit volume of water.',
                            'unit' => '21',
                            'unit_default' => 'gperL',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fertilizer_weight_S',
                            'label' => 'Fertilizer weight',
                            'type' => 'number',
                            'help' => 'The amount of fertilizer you should use per specified volume of diluted solution.',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fertilizer_rate_Mn',
                            'label' => 'Fertilizer rate',
                            'type' => 'number',
                            'help' => 'The amount of fertilizer you should use per unit volume of water.',
                            'unit' => '21',
                            'unit_default' => 'gperL',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fertilizer_weight_Mn',
                            'label' => 'Fertilizer weight',
                            'type' => 'number',
                            'help' => 'The amount of fertilizer you should use per specified volume of diluted solution.',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fertilizer_rate_Zn',
                            'label' => 'Fertilizer rate',
                            'type' => 'number',
                            'help' => 'The amount of fertilizer you should use per unit volume of water.',
                            'unit' => '21',
                            'unit_default' => 'gperL',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fertilizer_weight_Zn',
                            'label' => 'Fertilizer weight',
                            'type' => 'number',
                            'help' => 'The amount of fertilizer you should use per specified volume of diluted solution.',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fertilizer_rate_Cu',
                            'label' => 'Fertilizer rate',
                            'type' => 'number',
                            'help' => 'The amount of fertilizer you should use per unit volume of water.',
                            'unit' => '21',
                            'unit_default' => 'gperL',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fertilizer_weight_Cu',
                            'label' => 'Fertilizer weight',
                            'type' => 'number',
                            'help' => 'The amount of fertilizer you should use per specified volume of diluted solution.',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fertilizer_rate_Mo',
                            'label' => 'Fertilizer rate',
                            'type' => 'number',
                            'help' => 'The amount of fertilizer you should use per unit volume of water.',
                            'unit' => '21',
                            'unit_default' => 'gperL',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fertilizer_weight_Mo',
                            'label' => 'Fertilizer weight',
                            'type' => 'number',
                            'help' => 'The amount of fertilizer you should use per specified volume of diluted solution.',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fertilizer_rate_B',
                            'label' => 'Fertilizer rate',
                            'type' => 'number',
                            'help' => 'The amount of fertilizer you should use per unit volume of water.',
                            'unit' => '21',
                            'unit_default' => 'gperL',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fertilizer_weight_B',
                            'label' => 'Fertilizer weight',
                            'type' => 'number',
                            'help' => 'The amount of fertilizer you should use per specified volume of diluted solution.',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'desired_element == 0 and ppm_N and fertilizer_weight_N and volume_diluted_solution', 'text' => <<<'TXT'
                                To make a solution of {{ppm_N.formattedValue}} {{ppm_N.unit}} {{desired_element.name}}, add {{fertilizer_weight_N.formattedValue}} {{fertilizer_weight_N.unit}} of dry fertilizer to {{volume_diluted_solution.formattedValue}} {{volume_diluted_solution.fullUnit}} of water.&nbsp;
                                TXT],
                                ['when' => 'desired_element == 1 and ppm_P and fertilizer_weight_P and volume_diluted_solution', 'text' => <<<'TXT'
                                To make a solution of {{ppm_P.formattedValue}} {{ppm_P.unit}} {{desired_element.name}}, add {{fertilizer_weight_P.formattedValue}} {{fertilizer_weight_P.unit}} of dry fertilizer to {{volume_diluted_solution.formattedValue}} {{volume_diluted_solution.fullUnit}} of water.&nbsp;
                                TXT],
                                ['when' => 'desired_element == 2 and ppm_K and fertilizer_weight_K and volume_diluted_solution', 'text' => <<<'TXT'
                                To make a solution of {{ppm_K.formattedValue}} {{ppm_K.unit}} {{desired_element.name}}, add {{fertilizer_weight_K.formattedValue}} {{fertilizer_weight_K.unit}} of dry fertilizer to {{volume_diluted_solution.formattedValue}} {{volume_diluted_solution.fullUnit}} of water.&nbsp;
                                TXT],
                                ['when' => 'desired_element == 3 and ppm_Ca and fertilizer_weight_Ca and volume_diluted_solution', 'text' => <<<'TXT'
                                To make a solution of {{ppm_Ca.formattedValue}} {{ppm_Ca.unit}} {{desired_element.name}}, add {{fertilizer_weight_Ca.formattedValue}} {{fertilizer_weight_Ca.unit}} of dry fertilizer to {{volume_diluted_solution.formattedValue}} {{volume_diluted_solution.fullUnit}} of water.&nbsp;
                                TXT],
                                ['when' => 'desired_element == 4 and ppm_Mg and fertilizer_weight_Mg and volume_diluted_solution', 'text' => <<<'TXT'
                                To make a solution of {{ppm_Mg.formattedValue}} {{ppm_Mg.unit}} {{desired_element.name}}, add {{fertilizer_weight_Mg.formattedValue}} {{fertilizer_weight_Mg.unit}} of dry fertilizer to {{volume_diluted_solution.formattedValue}} {{volume_diluted_solution.fullUnit}} of water.&nbsp;
                                TXT],
                                ['when' => 'desired_element == 5 and ppm_Fe and fertilizer_weight_Fe and volume_diluted_solution', 'text' => <<<'TXT'
                                To make a solution of {{ppm_Fe.formattedValue}} {{ppm_Fe.unit}} {{desired_element.name}}, add {{fertilizer_weight_Fe.formattedValue}} {{fertilizer_weight_Fe.unit}} of dry fertilizer to {{volume_diluted_solution.formattedValue}} {{volume_diluted_solution.fullUnit}} of water.&nbsp;
                                TXT],
                                ['when' => 'desired_element == 6 and ppm_S and fertilizer_weight_S and volume_diluted_solution', 'text' => <<<'TXT'
                                To make a solution of {{ppm_S.formattedValue}} {{ppm_S.unit}} {{desired_element.name}}, add {{fertilizer_weight_S.formattedValue}} {{fertilizer_weight_S.unit}} of dry fertilizer to {{volume_diluted_solution.formattedValue}} {{volume_diluted_solution.fullUnit}} of water.&nbsp;
                                TXT],
                                ['when' => 'desired_element == 7 and ppm_Mn and fertilizer_weight_Mn and volume_diluted_solution', 'text' => <<<'TXT'
                                To make a solution of {{ppm_Mn.formattedValue}} {{ppm_Mn.unit}} {{desired_element.name}}, add {{fertilizer_weight_Mn.formattedValue}} {{fertilizer_weight_Mn.unit}} of dry fertilizer to {{volume_diluted_solution.formattedValue}} {{volume_diluted_solution.fullUnit}} of water.&nbsp;
                                TXT],
                                ['when' => 'desired_element == 8 and ppm_Zn and fertilizer_weight_Zn and volume_diluted_solution', 'text' => <<<'TXT'
                                To make a solution of {{ppm_Zn.formattedValue}} {{ppm_Zn.unit}} {{desired_element.name}}, add {{fertilizer_weight_Zn.formattedValue}} {{fertilizer_weight_Zn.unit}} of dry fertilizer to {{volume_diluted_solution.formattedValue}} {{volume_diluted_solution.fullUnit}} of water.&nbsp;
                                TXT],
                                ['when' => 'desired_element == 9 and ppm_Cu and fertilizer_weight_Cu and volume_diluted_solution', 'text' => <<<'TXT'
                                To make a solution of {{ppm_Cu.formattedValue}} {{ppm_Cu.unit}} {{desired_element.name}}, add {{fertilizer_weight_Cu.formattedValue}} {{fertilizer_weight_Cu.unit}} of dry fertilizer to {{volume_diluted_solution.formattedValue}} {{volume_diluted_solution.fullUnit}} of water.&nbsp;
                                TXT],
                                ['when' => 'desired_element == 10 and ppm_Mo and fertilizer_weight_Mo and volume_diluted_solution', 'text' => <<<'TXT'
                                To make a solution of {{ppm_Mo.formattedValue}} {{ppm_Mo.unit}} {{desired_element.name}}, add {{fertilizer_weight_Mo.formattedValue}} {{fertilizer_weight_Mo.unit}} of dry fertilizer to {{volume_diluted_solution.formattedValue}} {{volume_diluted_solution.fullUnit}} of water.&nbsp;
                                TXT],
                                ['when' => 'desired_element == 11 and ppm_B and fertilizer_weight_B and volume_diluted_solution', 'text' => <<<'TXT'
                                To make a solution of {{ppm_B.formattedValue}} {{ppm_B.unit}} {{desired_element.name}}, add {{fertilizer_weight_B.formattedValue}} {{fertilizer_weight_B.unit}} of dry fertilizer to {{volume_diluted_solution.formattedValue}} {{volume_diluted_solution.fullUnit}} of water.
                                TXT],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'TestVariables',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fertilizerPresets',
                            'label' => 'Fertilizer presets',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'selectedElement',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'fertilizer_rate_N = (ppm_N / percent_weight_N) * 100',
            'results' => ['percent_weight_N' => '100*ppm_N/fertilizer_rate_N', 'ppm_N' => '(1/100)*fertilizer_rate_N*percent_weight_N', 'fertilizer_rate_N' => '100*ppm_N/percent_weight_N'],
        ],
        [
            'title' => 'fertilizer_rate_P = (ppm_P/ percent_weight_P) * 100',
            'results' => ['percent_weight_P' => '100*ppm_P/fertilizer_rate_P', 'ppm_P' => '(1/100)*fertilizer_rate_P*percent_weight_P', 'fertilizer_rate_P' => '100*ppm_P/percent_weight_P'],
        ],
        [
            'title' => 'fertilizer_rate_K = (ppm_K/ percent_weight_K) * 100',
            'results' => ['fertilizer_rate_K' => '100*ppm_K/percent_weight_K', 'percent_weight_K' => '100*ppm_K/fertilizer_rate_K', 'ppm_K' => '(1/100)*fertilizer_rate_K*percent_weight_K'],
        ],
        [
            'title' => 'fertilizer_rate_Ca = (ppm_Ca/ percent_weight_Ca) * 100',
            'results' => ['fertilizer_rate_Ca' => '100*ppm_Ca/percent_weight_Ca', 'percent_weight_Ca' => '100*ppm_Ca/fertilizer_rate_Ca', 'ppm_Ca' => '(1/100)*fertilizer_rate_Ca*percent_weight_Ca'],
        ],
        [
            'title' => 'fertilizer_rate_Mg = (ppm_Mg/ percent_weight_Mg) * 100',
            'results' => ['ppm_Mg' => '(1/100)*fertilizer_rate_Mg*percent_weight_Mg', 'fertilizer_rate_Mg' => '100*ppm_Mg/percent_weight_Mg', 'percent_weight_Mg' => '100*ppm_Mg/fertilizer_rate_Mg'],
        ],
        [
            'title' => 'fertilizer_rate_Fe = (ppm_Fe/ percent_weight_Fe) * 100',
            'results' => ['fertilizer_rate_Fe' => '100*ppm_Fe/percent_weight_Fe', 'ppm_Fe' => '(1/100)*fertilizer_rate_Fe*percent_weight_Fe', 'percent_weight_Fe' => '100*ppm_Fe/fertilizer_rate_Fe'],
        ],
        [
            'title' => 'fertilizer_rate_S = (ppm_S/ percent_weight_S) * 100',
            'results' => ['ppm_S' => '(1/100)*fertilizer_rate_S*percent_weight_S', 'fertilizer_rate_S' => '100*ppm_S/percent_weight_S', 'percent_weight_S' => '100*ppm_S/fertilizer_rate_S'],
        ],
        [
            'title' => 'fertilizer_rate_Mn = (ppm_Mn/ percent_weight_Mn) * 100',
            'results' => ['ppm_Mn' => '(1/100)*fertilizer_rate_Mn*percent_weight_Mn', 'fertilizer_rate_Mn' => '100*ppm_Mn/percent_weight_Mn', 'percent_weight_Mn' => '100*ppm_Mn/fertilizer_rate_Mn'],
        ],
        [
            'title' => 'fertilizer_rate_Zn = (ppm_Zn/ percent_weight_Zn) * 100',
            'results' => ['percent_weight_Zn' => '100*ppm_Zn/fertilizer_rate_Zn', 'fertilizer_rate_Zn' => '100*ppm_Zn/percent_weight_Zn', 'ppm_Zn' => '(1/100)*fertilizer_rate_Zn*percent_weight_Zn'],
        ],
        [
            'title' => 'fertilizer_rate_Cu = (ppm_Cu/ percent_weight_Cu) * 100',
            'results' => ['percent_weight_Cu' => '100*ppm_Cu/fertilizer_rate_Cu', 'ppm_Cu' => '(1/100)*fertilizer_rate_Cu*percent_weight_Cu', 'fertilizer_rate_Cu' => '100*ppm_Cu/percent_weight_Cu'],
        ],
        [
            'title' => 'fertilizer_rate_B = (ppm_B/ percent_weight_B) * 100',
            'results' => ['percent_weight_B' => '100*ppm_B/fertilizer_rate_B', 'ppm_B' => '(1/100)*fertilizer_rate_B*percent_weight_B', 'fertilizer_rate_B' => '100*ppm_B/percent_weight_B'],
        ],
        [
            'title' => 'fertilizer_rate_Mo = (ppm_Mo/ percent_weight_Mo) * 100',
            'results' => ['percent_weight_Mo' => '100*ppm_Mo/fertilizer_rate_Mo', 'fertilizer_rate_Mo' => '100*ppm_Mo/percent_weight_Mo', 'ppm_Mo' => '(1/100)*fertilizer_rate_Mo*percent_weight_Mo'],
        ],
        [
            'title' => 'label_P = percent_weight_P * 2.29133490476819',
            'results' => ['percent_weight_P' => '(100000000000000/229133490476819)*label_P', 'label_P' => '(229133490476819/100000000000000)*percent_weight_P'],
        ],
        [
            'title' => 'label_K = percent_weight_K * 1.2045996884775',
            'results' => ['percent_weight_K' => '(400000000000/481839875391)*label_K', 'label_K' => '(481839875391/400000000000)*percent_weight_K'],
        ],
        [
            'title' => 'fertilizer_weight_N = fertilizer_rate_N * volume_diluted_solution',
            'results' => ['fertilizer_rate_N' => 'fertilizer_weight_N/volume_diluted_solution', 'volume_diluted_solution' => 'fertilizer_weight_N/fertilizer_rate_N', 'fertilizer_weight_N' => 'fertilizer_rate_N*volume_diluted_solution'],
        ],
        [
            'title' => 'fertilizer_weight_P = fertilizer_rate_P * volume_diluted_solution',
            'results' => ['volume_diluted_solution' => 'fertilizer_weight_P/fertilizer_rate_P', 'fertilizer_weight_P' => 'fertilizer_rate_P*volume_diluted_solution', 'fertilizer_rate_P' => 'fertilizer_weight_P/volume_diluted_solution'],
        ],
        [
            'title' => 'fertilizer_weight_K = fertilizer_rate_K * volume_diluted_solution',
            'results' => ['fertilizer_weight_K' => 'fertilizer_rate_K*volume_diluted_solution', 'volume_diluted_solution' => 'fertilizer_weight_K/fertilizer_rate_K', 'fertilizer_rate_K' => 'fertilizer_weight_K/volume_diluted_solution'],
        ],
        [
            'title' => 'fertilizer_weight_Ca = fertilizer_rate_Ca * volume_diluted_solution',
            'results' => ['fertilizer_weight_Ca' => 'fertilizer_rate_Ca*volume_diluted_solution', 'volume_diluted_solution' => 'fertilizer_weight_Ca/fertilizer_rate_Ca', 'fertilizer_rate_Ca' => 'fertilizer_weight_Ca/volume_diluted_solution'],
        ],
        [
            'title' => 'fertilizer_weight_Mg = fertilizer_rate_Mg * volume_diluted_solution',
            'results' => ['volume_diluted_solution' => 'fertilizer_weight_Mg/fertilizer_rate_Mg', 'fertilizer_rate_Mg' => 'fertilizer_weight_Mg/volume_diluted_solution', 'fertilizer_weight_Mg' => 'fertilizer_rate_Mg*volume_diluted_solution'],
        ],
        [
            'title' => 'fertilizer_weight_Fe = fertilizer_rate_Fe * volume_diluted_solution',
            'results' => ['fertilizer_rate_Fe' => 'fertilizer_weight_Fe/volume_diluted_solution', 'volume_diluted_solution' => 'fertilizer_weight_Fe/fertilizer_rate_Fe', 'fertilizer_weight_Fe' => 'fertilizer_rate_Fe*volume_diluted_solution'],
        ],
        [
            'title' => 'fertilizer_weight_S = fertilizer_rate_S * volume_diluted_solution',
            'results' => ['volume_diluted_solution' => 'fertilizer_weight_S/fertilizer_rate_S', 'fertilizer_rate_S' => 'fertilizer_weight_S/volume_diluted_solution', 'fertilizer_weight_S' => 'fertilizer_rate_S*volume_diluted_solution'],
        ],
        [
            'title' => 'fertilizer_weight_Mn = fertilizer_rate_Mn * volume_diluted_solution',
            'results' => ['volume_diluted_solution' => 'fertilizer_weight_Mn/fertilizer_rate_Mn', 'fertilizer_rate_Mn' => 'fertilizer_weight_Mn/volume_diluted_solution', 'fertilizer_weight_Mn' => 'fertilizer_rate_Mn*volume_diluted_solution'],
        ],
        [
            'title' => 'fertilizer_weight_Zn = fertilizer_rate_Zn * volume_diluted_solution',
            'results' => ['volume_diluted_solution' => 'fertilizer_weight_Zn/fertilizer_rate_Zn', 'fertilizer_weight_Zn' => 'fertilizer_rate_Zn*volume_diluted_solution', 'fertilizer_rate_Zn' => 'fertilizer_weight_Zn/volume_diluted_solution'],
        ],
        [
            'title' => 'fertilizer_weight_Cu = fertilizer_rate_Cu * volume_diluted_solution',
            'results' => ['volume_diluted_solution' => 'fertilizer_weight_Cu/fertilizer_rate_Cu', 'fertilizer_weight_Cu' => 'fertilizer_rate_Cu*volume_diluted_solution', 'fertilizer_rate_Cu' => 'fertilizer_weight_Cu/volume_diluted_solution'],
        ],
        [
            'title' => 'fertilizer_weight_B = fertilizer_rate_B * volume_diluted_solution',
            'results' => ['volume_diluted_solution' => 'fertilizer_weight_B/fertilizer_rate_B', 'fertilizer_weight_B' => 'fertilizer_rate_B*volume_diluted_solution', 'fertilizer_rate_B' => 'fertilizer_weight_B/volume_diluted_solution'],
        ],
        [
            'title' => 'fertilizer_weight_Mo = fertilizer_rate_Mo * volume_diluted_solution',
            'results' => ['volume_diluted_solution' => 'fertilizer_weight_Mo/fertilizer_rate_Mo', 'fertilizer_rate_Mo' => 'fertilizer_weight_Mo/volume_diluted_solution', 'fertilizer_weight_Mo' => 'fertilizer_rate_Mo*volume_diluted_solution'],
        ],
        [
            'title' => 'mmol_N = ppm_N / 14.007',
            'results' => ['mmol_N' => '(1000/14007)*ppm_N', 'ppm_N' => '(14007/1000)*mmol_N'],
        ],
        [
            'title' => 'mmol_P = ppm_P / 30.973761998',
            'results' => ['mmol_P' => '(500000000/15486880999)*ppm_P', 'ppm_P' => '(15486880999/500000000)*mmol_P'],
        ],
        [
            'title' => 'mmol_K = ppm_K / 39.0983',
            'results' => ['mmol_K' => '(10000/390983)*ppm_K', 'ppm_K' => '(390983/10000)*mmol_K'],
        ],
        [
            'title' => 'mmol_Ca = ppm_Ca / 40.078',
            'results' => ['mmol_Ca' => '(500/20039)*ppm_Ca', 'ppm_Ca' => '(20039/500)*mmol_Ca'],
        ],
        [
            'title' => 'mmol_Mg = ppm_Mg / 24.305',
            'results' => ['mmol_Mg' => '(200/4861)*ppm_Mg', 'ppm_Mg' => '(4861/200)*mmol_Mg'],
        ],
        [
            'title' => 'mmol_Fe = ppm_Fe / 55.845',
            'results' => ['ppm_Fe' => '(11169/200)*mmol_Fe', 'mmol_Fe' => '(200/11169)*ppm_Fe'],
        ],
        [
            'title' => 'mmol_S = ppm_S / 32.06',
            'results' => ['mmol_S' => '(50/1603)*ppm_S', 'ppm_S' => '(1603/50)*mmol_S'],
        ],
        [
            'title' => 'mmol_Mn = ppm_Mn / 54.938043',
            'results' => ['ppm_Mn' => '(54938043/1000000)*mmol_Mn', 'mmol_Mn' => '(1000000/54938043)*ppm_Mn'],
        ],
        [
            'title' => 'mmol_Zn = ppm_Zn / 65.38',
            'results' => ['mmol_Zn' => '(50/3269)*ppm_Zn', 'ppm_Zn' => '(3269/50)*mmol_Zn'],
        ],
        [
            'title' => 'mmol_Cu = ppm_Cu / 63.546',
            'results' => ['mmol_Cu' => '(500/31773)*ppm_Cu', 'ppm_Cu' => '(31773/500)*mmol_Cu'],
        ],
        [
            'title' => 'mmol_Mo = ppm_Mo / 95.95',
            'results' => ['mmol_Mo' => '(20/1919)*ppm_Mo', 'ppm_Mo' => '(1919/20)*mmol_Mo'],
        ],
        [
            'title' => 'mmol_B = ppm_B / 10.81',
            'results' => ['mmol_B' => '(100/1081)*ppm_B', 'ppm_B' => '(1081/100)*mmol_B'],
        ],
        [
            'title' => 'fertilizerPresets = fertilizer_presets',
            'results' => ['fertilizer_presets' => 'fertilizerPresets', 'fertilizerPresets' => 'fertilizer_presets'],
        ],
        [
            'title' => 'label_N = percent_weight_N',
            'results' => ['percent_weight_N' => 'label_N', 'label_N' => 'percent_weight_N'],
        ],
        [
            'title' => 'label_P = percent_weight_P2O5',
            'results' => ['percent_weight_P2O5' => 'label_P', 'label_P' => 'percent_weight_P2O5'],
        ],
        [
            'title' => 'label_K = percent_weight_K2O',
            'results' => ['percent_weight_K2O' => 'label_K', 'label_K' => 'percent_weight_K2O'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";function roundTo2(value){return Math.round(value*100)/100}omni.onResult(["label_type"],function(ctx,_ref){var percent_weight_N=_ref.percent_weight_N,percent_weight_P=_ref.percent_weight_P,percent_weight_K=_ref.percent_weight_K,percent_weight_Ca=_ref.percent_weight_Ca,percent_weight_Mg=_ref.percent_weight_Mg,percent_weight_Fe=_ref.percent_weight_Fe,percent_weight_S=_ref.percent_weight_S,percent_weight_Mn=_ref.percent_weight_Mn,percent_weight_Zn=_ref.percent_weight_Zn,percent_weight_Cu=_ref.percent_weight_Cu,percent_weight_Mo=_ref.percent_weight_Mo,percent_weight_B=_ref.percent_weight_B;var elementPercent=roundTo2(percent_weight_N+percent_weight_P+percent_weight_K+percent_weight_Ca+percent_weight_Mg+percent_weight_Fe+percent_weight_S+percent_weight_Mn+percent_weight_Zn+percent_weight_Cu+percent_weight_Mo+percent_weight_B);ctx.exportValue("totalElementPercent",elementPercent)});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Water soluble fertilizer takes Label type, Soluble Phosphorus (P) and Soluble Potassium (K) and returns N and P₂O₅. The arithmetic is the whole method: n is worked out from label type by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Water soluble fertilizer calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Water soluble fertilizer: it takes 60 numbers and reports N, P₂O₅ and K₂O.</p><p>The relationship it solves reads Fertilizer rate = 100 × Mass concentration ÷ Total Nitrogen (N).</p><p>What comes back is N, P₂O₅, K₂O and Ca — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 60 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Fertilizer presets</strong> — a plain number, no unit. These are some common fertilizer ratios used when creating solutions. The percent composition may differ slightly from company to company.</li><li><strong>Label type</strong> — a plain number, no unit. Select &quot;elemental percentage&quot; to see all possible elements. To find the fertilizer&#039;s elemental percentages, check the &quot;guaranteed analysis&quot; section of the label.</li><li><strong>Soluble Phosphorus (P)</strong> — in %</li><li><strong>Soluble Potassium (K)</strong> — in %</li><li><strong>Iron (Fe)</strong> — in %</li><li><strong>Manganese (Mn)</strong> — in %</li><li><strong>Zinc (Zn)</strong> — in %</li><li><strong>Copper (Cu)</strong> — in %</li><li><strong>Molybdenum (Mo)</strong> — in %</li><li><strong>Boron (B)</strong> — in %</li><li><strong>Desired element</strong> — a plain number, no unit</li><li><strong>Mass concentration</strong> — in parts per million</li><li><strong>Molar concentration</strong> — in millimolars</li><li><strong>Mass concentration</strong> — in parts per million</li><li><strong>Molar concentration</strong> — in millimolars</li><li><strong>Mass concentration</strong> — in parts per million</li><li><strong>Molar concentration</strong> — in millimolars</li><li><strong>Mass concentration</strong> — in parts per million</li><li><strong>Molar concentration</strong> — in millimolars</li><li><strong>Mass concentration</strong> — in parts per million</li><li><strong>Molar concentration</strong> — in millimolars</li><li><strong>Mass concentration</strong> — in parts per million</li><li><strong>Molar concentration</strong> — in millimolars</li><li><strong>Mass concentration</strong> — in parts per million</li><li><strong>Molar concentration</strong> — in millimolars</li><li><strong>Mass concentration</strong> — in parts per million</li><li><strong>Molar concentration</strong> — in millimolars</li><li><strong>Mass concentration</strong> — in parts per million</li><li><strong>Molar concentration</strong> — in millimolars</li><li><strong>Mass concentration</strong> — in parts per million</li><li><strong>Molar concentration</strong> — in millimolars</li><li><strong>Mass concentration</strong> — in parts per million</li><li><strong>Molar concentration</strong> — in millimolars</li><li><strong>Mass concentration</strong> — in parts per million</li><li><strong>Molar concentration</strong> — in millimolars</li><li><strong>Volume of diluted solution</strong> — in liters</li><li><strong>Fertilizer rate</strong> — in grams per liter. The amount of fertilizer you should use per unit volume of water.</li><li><strong>Fertilizer weight</strong> — in grams. The amount of fertilizer you should use per specified volume of diluted solution.</li><li><strong>Fertilizer rate</strong> — in grams per liter. The amount of fertilizer you should use per unit volume of water.</li><li><strong>Fertilizer weight</strong> — in grams. The amount of fertilizer you should use per specified volume of diluted solution.</li><li><strong>Fertilizer rate</strong> — in grams per liter. The amount of fertilizer you should use per unit volume of water.</li><li><strong>Fertilizer weight</strong> — in grams. The amount of fertilizer you should use per specified volume of diluted solution.</li><li><strong>Fertilizer rate</strong> — in grams per liter. The amount of fertilizer you should use per unit volume of water.</li><li><strong>Fertilizer weight</strong> — in grams. The amount of fertilizer you should use per specified volume of diluted solution.</li><li><strong>Fertilizer rate</strong> — in grams per liter. The amount of fertilizer you should use per unit volume of water.</li><li><strong>Fertilizer weight</strong> — in grams. The amount of fertilizer you should use per specified volume of diluted solution.</li><li><strong>Fertilizer rate</strong> — in grams per liter. The amount of fertilizer you should use per unit volume of water.</li><li><strong>Fertilizer weight</strong> — in grams. The amount of fertilizer you should use per specified volume of diluted solution.</li><li><strong>Fertilizer rate</strong> — in grams per liter. The amount of fertilizer you should use per unit volume of water.</li><li><strong>Fertilizer weight</strong> — in grams. The amount of fertilizer you should use per specified volume of diluted solution.</li><li><strong>Fertilizer rate</strong> — in grams per liter. The amount of fertilizer you should use per unit volume of water.</li><li><strong>Fertilizer weight</strong> — in grams. The amount of fertilizer you should use per specified volume of diluted solution.</li><li><strong>Fertilizer rate</strong> — in grams per liter. The amount of fertilizer you should use per unit volume of water.</li><li><strong>Fertilizer weight</strong> — in grams. The amount of fertilizer you should use per specified volume of diluted solution.</li><li><strong>Fertilizer rate</strong> — in grams per liter. The amount of fertilizer you should use per unit volume of water.</li><li><strong>Fertilizer weight</strong> — in grams. The amount of fertilizer you should use per specified volume of diluted solution.</li><li><strong>Fertilizer rate</strong> — in grams per liter. The amount of fertilizer you should use per unit volume of water.</li><li><strong>Fertilizer weight</strong> — in grams. The amount of fertilizer you should use per specified volume of diluted solution.</li><li><strong>Fertilizer rate</strong> — in grams per liter. The amount of fertilizer you should use per unit volume of water.</li><li><strong>Fertilizer weight</strong> — in grams. The amount of fertilizer you should use per specified volume of diluted solution.</li></ul><p>The answers come back as N, P₂O₅, K₂O, Ca, Mg, S, Total Nitrogen (N) in percent, Available phosphate (P₂O₅) in percent, Soluble potash (K₂O) in %, Calcium (Ca) in %, Magnesium (Mg) in %, Sulphur (S) in %, Fertilizer presets. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Label type = 0 and Desired element = 0 — through the same formula and the panel reports <strong>Fertilizer presets</strong> = 20, <strong>Soluble Phosphorus (P)</strong> = 0 %, <strong>Soluble Potassium (K)</strong> = 0 % and <strong>Fertilizer presets</strong> = 20.</p><ul><li><strong>Fertilizer presets</strong> = 20</li><li><strong>Soluble Phosphorus (P)</strong> = 0 %</li><li><strong>Soluble Potassium (K)</strong> = 0 %</li><li><strong>Fertilizer presets</strong> = 20</li></ul><p>That is <strong>Fertilizer rate</strong> = <code>100 × Mass concentration ÷ Total Nitrogen (N)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Fertilizer presets</strong> = 20, <strong>Soluble Phosphorus (P)</strong> = 0, <strong>Soluble Potassium (K)</strong> = 0 and <strong>Fertilizer presets</strong> = 20 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Total Nitrogen (N) offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Fertilizer rate</strong> = <code>100 × Mass concentration ÷ Total Nitrogen (N)</code></li><li><strong>Total Nitrogen (N)</strong> = <code>100 × Mass concentration ÷ Fertilizer rate</code></li><li><strong>Mass concentration</strong> = <code>(1 ÷ 100) × Fertilizer rate × Total Nitrogen (N)</code></li><li><strong>Soluble Phosphorus (P)</strong> = <code>100 × Mass concentration ÷ Fertilizer rate</code></li><li><strong>Soluble Potassium (K)</strong> = <code>100 × Mass concentration ÷ Fertilizer rate</code></li><li><strong>Calcium (Ca)</strong> = <code>100 × Mass concentration ÷ Fertilizer rate</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Fertilizer rate</strong> = <code>100 × Mass concentration ÷ Total Nitrogen (N)</code> — the form to use when Mass concentration and Total Nitrogen (N) are the values you have.</li><li><strong>Total Nitrogen (N)</strong> = <code>100 × Mass concentration ÷ Fertilizer rate</code> — the form to use when Mass concentration and Fertilizer rate are the values you have.</li><li><strong>Mass concentration</strong> = <code>(1 ÷ 100) × Fertilizer rate × Total Nitrogen (N)</code> — the form to use when Fertilizer rate and Total Nitrogen (N) are the values you have.</li><li><strong>Fertilizer rate</strong> = <code>100 × Mass concentration ÷ Soluble Phosphorus (P)</code> — the form to use when Mass concentration and Soluble Phosphorus (P) are the values you have.</li><li><strong>Soluble Phosphorus (P)</strong> = <code>100 × Mass concentration ÷ Fertilizer rate</code> — the form to use when Mass concentration and Fertilizer rate are the values you have.</li><li><strong>Mass concentration</strong> = <code>(1 ÷ 100) × Fertilizer rate × Soluble Phosphorus (P)</code> — the form to use when Fertilizer rate and Soluble Phosphorus (P) are the values you have.</li><li><strong>Fertilizer rate</strong> = <code>100 × Mass concentration ÷ Soluble Potassium (K)</code> — the form to use when Mass concentration and Soluble Potassium (K) are the values you have.</li><li><strong>Soluble Potassium (K)</strong> = <code>100 × Mass concentration ÷ Fertilizer rate</code> — the form to use when Mass concentration and Fertilizer rate are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Fertilizer rate, Total Nitrogen (N) and Mass concentration can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => ''],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Mass concentration, Molar concentration and Mass concentration is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with N, P₂O₅ and K₂O are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Fertilizer presets left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Fertilizer presets is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Label type left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Label type is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Fertilizer presets is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> N follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are percent, parts per million and millimolars and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Fertilizer presets, Label type and Soluble Phosphorus (P) are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Fertilizer presets, Label type and Soluble Phosphorus (P) is what you already know and N and P₂O₅ is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Water soluble fertilizer is a number to act on, so the useful question is what to do with N, P₂O₅ and K₂O once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Fertilizer presets, Label type, Soluble Phosphorus (P) and Soluble Potassium (K) alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Water soluble fertilizer calculator work out?', 'a' => <<<'TXT'
            N, P₂O₅, K₂O and Ca, from Mass concentration and Total Nitrogen (N). The relationship is Fertilizer rate = 100 × Mass concentration ÷ Total Nitrogen (N).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Fertilizer presets, Label type, Soluble Phosphorus (P) (%), Soluble Potassium (K) (%), Iron (Fe) (%). With fertilizer presets, label type and soluble Phosphorus (P) in place, N can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Fertilizer rate, Total Nitrogen (N), Mass concentration and Fertilizer rate can each be the answer: the page works out which box is empty and rearranges the relationship for it.
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
