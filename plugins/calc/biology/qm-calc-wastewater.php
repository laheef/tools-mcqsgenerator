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
    'meta' => ['title' => 'Wastewater Calculator: Formula, Steps & Example', 'description' => 'Wastewater reports influent SS weight, Effluent BOD, Effluent COD and volume. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Wastewater Calculator', 'updated' => '2026-08-12'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'calculation_type',
                            'label' => 'I\'d like to find...',
                            'type' => 'select',
                            'options' => [
                                'F/M ratio/MLVSS' => '1',
                                'HRT (hydraulic retention time)' => '2',
                                'MCRT (mean cell residence time)' => '3',
                                'Sludge age' => '4',
                                'SVI (sludge volume index)' => '5',
                                'Everything' => '6',
                            ],
                            'dataset' => 'calculate',
                            'control' => 'DROPDOWN',
                            'default' => 'F/M ratio/MLVSS',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bod_or_cod',
                            'label' => 'using...',
                            'type' => 'select',
                            'options' => ['BOD (biochemical oxygen demand)' => '1', 'COD (chemical oxygen demand)' => '2', 'Both' => '3'],
                            'dataset' => 'bod/cod',
                            'default' => 'BOD (biochemical oxygen demand)',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Primary clarifier',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'SS_lbs_influent',
                            'label' => 'Influent SS weight',
                            'type' => 'number',
                            'help' => 'Weight of suspended solids flowing in.',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'average_untreated_influent_bod',
                            'label' => 'Average untreated influent BOD',
                            'type' => 'number',
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
                            'name' => 'average_untreated_influent_cod',
                            'label' => 'Average untreated influent COD',
                            'type' => 'number',
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
                            'name' => 'average_primary_treated_bod',
                            'label' => 'Average primary treated BOD',
                            'type' => 'number',
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
                            'name' => 'average_primary_treated_cod',
                            'label' => 'Average primary treated COD',
                            'type' => 'number',
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
                            'name' => 'primary_effluent_bod',
                            'label' => 'Effluent BOD',
                            'type' => 'number',
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
                            'name' => 'primary_effluent_cod',
                            'label' => 'Effluent COD',
                            'type' => 'number',
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
                            'name' => 'effluent_flow',
                            'label' => 'Effluent flow',
                            'type' => 'number',
                            'help' => 'Also the influent flow into the aeration tank.',
                            'unit' => '146',
                            'unit_default' => 'm-day',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pri_clarifier_effluent_SS',
                            'label' => 'Effluent SS concentration',
                            'type' => 'number',
                            'help' => 'Suspended solids concentration exiting the primary clarifier.',
                            'unit' => '21',
                            'unit_default' => 'mgpL',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Aeration tank',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'volume',
                            'label' => 'Is the volume known?',
                            'type' => 'select',
                            'options' => ['No' => '0', 'Yes' => '1'],
                            'dataset' => 'volume',
                            'default' => 'Yes',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'length_tank',
                            'label' => 'Length',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'width_tank',
                            'label' => 'Width',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'side_wall_depth',
                            'label' => 'Side wall depth',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'free_board',
                            'label' => 'Free-board',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'aeration_vol_mg',
                            'label' => 'Volume',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'm3',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'flow_through',
                            'label' => 'Flow rate through tank',
                            'type' => 'number',
                            'unit' => '146',
                            'unit_default' => 'm-hour',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bod_lb_day',
                            'label' => 'BOD loading',
                            'type' => 'number',
                            'help' => 'The BOD added to aeration.',
                            'unit' => '147',
                            'unit_default' => 'kgd',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cod_lb_day',
                            'label' => 'COD loading',
                            'type' => 'number',
                            'help' => 'The COD added to aeration.',
                            'unit' => '147',
                            'unit_default' => 'kgd',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hrt',
                            'label' => 'HRT',
                            'type' => 'number',
                            'help' => 'Hydraulic retention time.',
                            'unit' => '19',
                            'unit_default' => 'hrsmin',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mlss_lbs_aeration',
                            'label' => 'MLSS weight',
                            'type' => 'number',
                            'help' => 'Weight of suspended solids.',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Secondary clarifiers',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'clarifier_volume',
                            'label' => 'Is the volume known?',
                            'type' => 'select',
                            'options' => ['No' => '0', 'Yes' => '1'],
                            'dataset' => 'volume',
                            'default' => 'Yes',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'length_2_clarifier',
                            'label' => 'Length',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'width_2_clarifier',
                            'label' => 'Width',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'side_wall_depth_2_clarifier',
                            'label' => 'Side wall depth',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'free_board_2_clarifier',
                            'label' => 'Free-board',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'clarifier_vol_mg',
                            'label' => 'Volume',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'm3',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'effluence_flow',
                            'label' => 'Flow of secondary effluence',
                            'type' => 'number',
                            'unit' => '146',
                            'unit_default' => 'm-day',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'effluence_sludge',
                            'label' => 'Solids in secondary effluence',
                            'type' => 'number',
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
                            'name' => 'wasted_flow',
                            'label' => 'Flow of waste sludge',
                            'type' => 'number',
                            'unit' => '146',
                            'unit_default' => 'm-day',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'wasted_sludge',
                            'label' => 'Solids in waste sludge',
                            'type' => 'number',
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
                            'name' => 'SS_lbs_leaving',
                            'label' => 'SS leaving activated sludge process',
                            'type' => 'number',
                            'help' => 'Where SS is suspended solids.',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'BOD calculation',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fm_ratio_bod',
                            'label' => 'F/M ratio',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mlvss_bod',
                            'label' => 'MLVSS conc.',
                            'type' => 'number',
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
                            'name' => 'mlvss_lbs_bod',
                            'label' => 'MLVSS weight',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'COD calculation',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fm_ratio_cod',
                            'label' => 'F/M ratio',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mlvss_cod',
                            'label' => 'MLVSS conc.',
                            'type' => 'number',
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
                            'name' => 'mlvss_lbs_cod',
                            'label' => 'MLVSS weight',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Values for entire activated sludge process',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mlss',
                            'label' => 'MLSS conc.',
                            'type' => 'number',
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
                            'name' => 'mlss_lbs_total',
                            'label' => 'MLSS total weight',
                            'type' => 'number',
                            'help' => 'In both the aeration tank and secondary clarifiers.',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mcrt',
                            'label' => 'MCRT',
                            'type' => 'number',
                            'help' => 'Mean cell residence time. Also known as SRT (solid retention time).',
                            'unit' => '19',
                            'unit_default' => 'hrsmin',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sludge_age',
                            'label' => 'Sludge age',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'hrsmin',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Laboratory calculations',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'settled_solids',
                            'label' => 'Settled solids',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'ml',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'svi',
                            'label' => 'SVI',
                            'type' => 'number',
                            'suffix' => 'mL/g',
                            'help' => 'Sludge volume index.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'primary_effluent_cod = average_untreated_influent_cod - average_primary_treated_cod',
            'results' => ['primary_effluent_cod' => '-average_primary_treated_cod + average_untreated_influent_cod', 'average_primary_treated_cod' => 'average_untreated_influent_cod - primary_effluent_cod', 'average_untreated_influent_cod' => 'average_primary_treated_cod + primary_effluent_cod'],
        ],
        [
            'title' => 'primary_effluent_bod = average_untreated_influent_bod - average_primary_treated_bod',
            'results' => ['average_primary_treated_bod' => 'average_untreated_influent_bod - primary_effluent_bod', 'average_untreated_influent_bod' => 'average_primary_treated_bod + primary_effluent_bod', 'primary_effluent_bod' => '-average_primary_treated_bod + average_untreated_influent_bod'],
        ],
        [
            'title' => 'cod_lb_day = effluent_flow * primary_effluent_cod',
            'results' => ['primary_effluent_cod' => 'cod_lb_day/effluent_flow', 'effluent_flow' => 'cod_lb_day/primary_effluent_cod', 'cod_lb_day' => 'effluent_flow*primary_effluent_cod'],
        ],
        [
            'title' => 'bod_lb_day = effluent_flow * primary_effluent_bod',
            'results' => ['effluent_flow' => 'bod_lb_day/primary_effluent_bod', 'primary_effluent_bod' => 'bod_lb_day/effluent_flow', 'bod_lb_day' => 'effluent_flow*primary_effluent_bod'],
        ],
        [
            'title' => 'aeration_vol_mg = length_tank * width_tank * (side_wall_depth - free_board) ',
            'results' => [
                'free_board' => '-aeration_vol_mg/(length_tank*width_tank) + side_wall_depth',
                'width_tank' => '-aeration_vol_mg/(length_tank*(free_board - side_wall_depth))',
                'length_tank' => '-aeration_vol_mg/(width_tank*(free_board - side_wall_depth))',
                'aeration_vol_mg' => 'length_tank*width_tank*(-free_board + side_wall_depth)',
                'side_wall_depth' => 'aeration_vol_mg/(length_tank*width_tank) + free_board',
            ],
        ],
        [
            'title' => 'clarifier_vol_mg = length_2_clarifier * width_2_clarifier * (side_wall_depth_2_clarifier  - free_board_2_clarifier )',
            'results' => [
                'width_2_clarifier' => '-clarifier_vol_mg/(length_2_clarifier*(free_board_2_clarifier - side_wall_depth_2_clarifier))',
                'side_wall_depth_2_clarifier' => 'clarifier_vol_mg/(length_2_clarifier*width_2_clarifier) + free_board_2_clarifier',
                'free_board_2_clarifier' => '-clarifier_vol_mg/(length_2_clarifier*width_2_clarifier) + side_wall_depth_2_clarifier',
                'clarifier_vol_mg' => 'length_2_clarifier*width_2_clarifier*(-free_board_2_clarifier + side_wall_depth_2_clarifier)',
                'length_2_clarifier' => '-clarifier_vol_mg/(width_2_clarifier*(free_board_2_clarifier - side_wall_depth_2_clarifier))',
            ],
        ],
        [
            'title' => 'hrt = aeration_vol_mg / (flow_through)',
            'results' => ['flow_through' => 'aeration_vol_mg/hrt', 'hrt' => 'aeration_vol_mg/flow_through', 'aeration_vol_mg' => 'flow_through*hrt'],
        ],
        [
            'title' => 'mlvss_lbs_bod = bod_lb_day / fm_ratio_bod',
            'results' => ['mlvss_lbs_bod' => 'bod_lb_day/fm_ratio_bod', 'fm_ratio_bod' => 'bod_lb_day/mlvss_lbs_bod', 'bod_lb_day' => 'fm_ratio_bod*mlvss_lbs_bod'],
        ],
        [
            'title' => 'mlvss_lbs_cod = cod_lb_day / fm_ratio_cod',
            'results' => ['mlvss_lbs_cod' => 'cod_lb_day/fm_ratio_cod', 'fm_ratio_cod' => 'cod_lb_day/mlvss_lbs_cod', 'cod_lb_day' => 'fm_ratio_cod*mlvss_lbs_cod'],
        ],
        [
            'title' => 'mlvss_bod = mlvss_lbs_bod / aeration_vol_mg ',
            'results' => ['mlvss_lbs_bod' => 'aeration_vol_mg*mlvss_bod', 'mlvss_bod' => 'mlvss_lbs_bod/aeration_vol_mg', 'aeration_vol_mg' => 'mlvss_lbs_bod/mlvss_bod'],
        ],
        [
            'title' => 'mlvss_cod = mlvss_lbs_cod / aeration_vol_mg ',
            'results' => ['mlvss_lbs_cod' => 'aeration_vol_mg*mlvss_cod', 'mlvss_cod' => 'mlvss_lbs_cod/aeration_vol_mg', 'aeration_vol_mg' => 'mlvss_lbs_cod/mlvss_cod'],
        ],
        [
            'title' => 'mlss_lbs_total = mlss * (aeration_vol_mg + clarifier_vol_mg)',
            'results' => ['mlss_lbs_total' => 'mlss*(aeration_vol_mg + clarifier_vol_mg)', 'clarifier_vol_mg' => '-aeration_vol_mg + mlss_lbs_total/mlss', 'mlss' => 'mlss_lbs_total/(aeration_vol_mg + clarifier_vol_mg)', 'aeration_vol_mg' => '-clarifier_vol_mg + mlss_lbs_total/mlss'],
        ],
        [
            'title' => 'SS_lbs_leaving = (wasted_sludge * wasted_flow) +  (effluence_sludge * effluence_flow)',
            'results' => [
                'SS_lbs_leaving' => 'effluence_flow*effluence_sludge + wasted_flow*wasted_sludge',
                'wasted_flow' => '(SS_lbs_leaving - effluence_flow*effluence_sludge)/wasted_sludge',
                'wasted_sludge' => '(SS_lbs_leaving - effluence_flow*effluence_sludge)/wasted_flow',
                'effluence_flow' => '(SS_lbs_leaving - wasted_flow*wasted_sludge)/effluence_sludge',
                'effluence_sludge' => '(SS_lbs_leaving - wasted_flow*wasted_sludge)/effluence_flow',
            ],
        ],
        [
            'title' => 'mcrt = mlss_lbs_total / SS_lbs_leaving',
            'results' => ['SS_lbs_leaving' => 'mlss_lbs_total/mcrt', 'mlss_lbs_total' => 'SS_lbs_leaving*mcrt', 'mcrt' => 'mlss_lbs_total/SS_lbs_leaving'],
        ],
        [
            'title' => 'mlss_lbs_aeration = mlss * aeration_vol_mg ',
            'results' => ['mlss' => 'mlss_lbs_aeration/aeration_vol_mg', 'mlss_lbs_aeration' => 'aeration_vol_mg*mlss', 'aeration_vol_mg' => 'mlss_lbs_aeration/mlss'],
        ],
        [
            'title' => 'SS_lbs_influent = pri_clarifier_effluent_SS * effluent_flow',
            'results' => ['SS_lbs_influent' => 'effluent_flow*pri_clarifier_effluent_SS', 'pri_clarifier_effluent_SS' => 'SS_lbs_influent/effluent_flow', 'effluent_flow' => 'SS_lbs_influent/pri_clarifier_effluent_SS'],
        ],
        [
            'title' => 'sludge_age = mlss_lbs_aeration / SS_lbs_influent',
            'results' => ['SS_lbs_influent' => 'mlss_lbs_aeration/sludge_age', 'sludge_age' => 'mlss_lbs_aeration/SS_lbs_influent', 'mlss_lbs_aeration' => 'SS_lbs_influent*sludge_age'],
        ],
        [
            'title' => 'svi = (settled_solids ) / (mlss )',
            'results' => ['svi' => 'settled_solids/mlss', 'mlss' => 'settled_solids/svi', 'settled_solids' => 'mlss*svi'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Wastewater turns Average untreated influent COD and Average primary treated COD into Influent SS weight and Average untreated influent BOD. Nothing is looked up on this page: influent SS weight is computed from average untreated influent COD and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Influent SS weight is opened in kilograms; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Wastewater calculator works', 'html' => <<<'TXT'
            <p>Wastewater answers one question from 2 numbers, and the answer is Influent SS weight, Average untreated influent BOD and Average primary treated BOD.</p><p>In the form&#039;s own words, Effluent COD = − Average primary treated COD + Average untreated influent COD.</p><p>What comes back is Influent SS weight, Average untreated influent BOD, Average primary treated BOD and Effluent BOD — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Average untreated influent COD</strong> — in grams per liter</li><li><strong>Average primary treated COD</strong> — in grams per liter</li></ul><p>The result boxes are Influent SS weight in kilograms, Average untreated influent BOD in grams per liter, Average primary treated BOD in grams per liter, Effluent BOD in grams per liter, Effluent COD in grams per liter, Effluent flow in cubic meters per day, Effluent SS concentration in milligrams per liter, Length in meters, Width in meters, Side wall depth in meters, Free-board in meters, Volume in cubic meters, Flow rate through tank in cubic meters per hour, BOD loading in kilograms per day, COD loading in kilograms per day, HRT in hours / minutes, MLSS weight in kilograms, Length in meters, Width in meters, Side wall depth in meters, Free-board in meters, Volume in cubic meters, Flow of secondary effluence in cubic meters per day, Solids in secondary effluence in grams per liter, Flow of waste sludge in cubic meters per day, Solids in waste sludge in grams per liter, SS leaving activated sludge process in kilograms, F/M ratio, MLVSS conc in grams per liter, MLVSS weight in kilograms, F/M ratio, MLVSS conc in grams per liter, MLVSS weight in kilograms, MLSS conc in grams per liter, MLSS total weight in kilograms, MCRT in hours / minutes, Sludge age in hours / minutes, Settled solids in milliliters, SVI in mL/g; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Influent SS weight offers 7 units and opens on kilograms, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Effluent COD</strong> = <code>− Average primary treated COD + Average untreated influent COD</code></li><li><strong>Average primary treated COD</strong> = <code>Average untreated influent COD − Effluent COD</code></li><li><strong>Average untreated influent COD</strong> = <code>Average primary treated COD + Effluent COD</code></li><li><strong>Effluent BOD</strong> = <code>− Average primary treated BOD + Average untreated influent BOD</code></li><li><strong>Average primary treated BOD</strong> = <code>Average untreated influent BOD − Effluent BOD</code></li><li><strong>Average untreated influent BOD</strong> = <code>Average primary treated BOD + Effluent BOD</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Effluent COD</strong> = <code>− Average primary treated COD + Average untreated influent COD</code> — the form to use when Average primary treated COD and Average untreated influent COD are the values you have.</li><li><strong>Average primary treated COD</strong> = <code>Average untreated influent COD − Effluent COD</code> — the form to use when Average untreated influent COD and Effluent COD are the values you have.</li><li><strong>Average untreated influent COD</strong> = <code>Average primary treated COD + Effluent COD</code> — the form to use when Average primary treated COD and Effluent COD are the values you have.</li><li><strong>Effluent BOD</strong> = <code>− Average primary treated BOD + Average untreated influent BOD</code> — the form to use when Average primary treated BOD and Average untreated influent BOD are the values you have.</li><li><strong>Average primary treated BOD</strong> = <code>Average untreated influent BOD − Effluent BOD</code> — the form to use when Average untreated influent BOD and Effluent BOD are the values you have.</li><li><strong>Average untreated influent BOD</strong> = <code>Average primary treated BOD + Effluent BOD</code> — the form to use when Average primary treated BOD and Effluent BOD are the values you have.</li><li><strong>COD loading</strong> = <code>Effluent flow × Effluent COD</code> — the form to use when Effluent flow and Effluent COD are the values you have.</li><li><strong>Effluent COD</strong> = <code>COD loading ÷ Effluent flow</code> — the form to use when COD loading and Effluent flow are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Effluent COD, Average primary treated COD and Average untreated influent COD can be the unknown.</p>
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
            <p>Reach for this page when Average untreated influent COD and Average primary treated COD is what you already know and Influent SS weight and Average untreated influent BOD is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Wastewater calculator work out?', 'a' => <<<'TXT'
            Influent SS weight, Average untreated influent BOD, Average primary treated BOD and Effluent BOD, from Average primary treated COD and Average untreated influent COD. The relationship is Effluent COD = − Average primary treated COD + Average untreated influent COD.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Average untreated influent COD (grams per liter), Average primary treated COD (grams per liter). Fill average untreated influent COD and average primary treated COD and leave Influent SS weight empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Effluent COD, Average primary treated COD, Average untreated influent COD and Effluent BOD can each be the answer: the page works out which box is empty and rearranges the relationship for it.
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
