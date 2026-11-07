<?php

/**
 * Mixed liquor volatile suspended solids
 * /biology/mlvss
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Mixed liquor volatile suspended solids',
    'meta' => ['title' => 'Mixed liquor volatile suspended solids Calculator', 'description' => 'Mixed liquor volatile suspended solids: work out average untreated in-fluent COD from the sample volume and the weight of filter paper. A free biology…', 'h1' => 'Mixed liquor volatile suspended solids Calculator', 'updated' => '2026-08-12'],
    'raw' => [
        'vars' => [
            'COD_lb_day' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'FS_after' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'FS_before' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'FS_sample' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'F_M_ratio' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'Fixed_solids' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'HRT' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'MLSS' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'MLSS_after' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'MLSS_before' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'MLSS_sample' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'MLVSS' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'MLVSS_lbs' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'aeration_vol_mg' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'average_primary_treated_COD' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'average_untreated_influent_COD' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'flow_mgd' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'free_board' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'l' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'method' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'd006IVo__Aqx37bG8i9Mi', 'c' => null],
                ],
                'ds' => 'Taj6c3xfhwivF8I7JuE82',
            ],
            'primary_effluent_COD' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'side_wall_depth' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'w' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'kunuMim8cvwycayyEjInT',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'method',
                                    'vt' => 'valueSelect',
                                    'l' => 'Method',
                                    'ds' => 'Taj6c3xfhwivF8I7JuE82',
                                    'opts' => [
                                        ['d006IVo__Aqx37bG8i9Mi', 'Laboratory', '1'],
                                        ['coxb9zyKm2Fo4u8MG7eFh', 'Industrial', '2'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'ibT-NlmXki4_VwhFQB6vo',
                'title' => 'Mixed liquor suspended solid experiment',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'MLSS_sample',
                                    'vt' => 'numerical',
                                    'l' => 'Sample volume',
                                    'us' => '20',
                                    'du' => 'dm3',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'MLSS_before',
                                    'vt' => 'numerical',
                                    'l' => 'Weight of filter paper',
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
                                    'n' => 'MLSS_after',
                                    'vt' => 'numerical',
                                    'l' => 'Weight of filter paper + residue',
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
                                    'n' => 'MLSS',
                                    'vt' => 'numerical',
                                    'l' => 'MLSS',
                                    'us' => '21',
                                    'du' => 'gperL',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'u_R_haZI5mL_FiLshq0cP',
                'title' => 'Fixed solids experiment',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'FS_sample',
                                    'vt' => 'numerical',
                                    'l' => 'Sample volume',
                                    'us' => '20',
                                    'du' => 'dm3',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'FS_before',
                                    'vt' => 'numerical',
                                    'l' => 'Weight of crucible',
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
                                    'n' => 'FS_after',
                                    'vt' => 'numerical',
                                    'l' => 'Weight of crucible + ash',
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
                                    'n' => 'Fixed_solids',
                                    'vt' => 'numerical',
                                    'l' => 'Fixed solids',
                                    'us' => '21',
                                    'du' => 'gperL',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'H7iVwcs9ry2lQi6dHSKtl',
                'title' => 'Flow rate',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'flow_mgd',
                                    'vt' => 'numerical',
                                    'l' => 'Flow',
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
                                    'n' => 'HRT',
                                    'vt' => 'numerical',
                                    'l' => 'HRT',
                                    'h' => 'Hydraulic retention time.',
                                    'us' => '19',
                                    'du' => 'hrsmin',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'qfaIQVM8Y8PkSfcjZm-Z2',
                'title' => 'Chemical oxygen demand',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'average_untreated_influent_COD',
                                    'vt' => 'numerical',
                                    'l' => 'Average untreated in-fluent COD',
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
                                    'n' => 'average_primary_treated_COD',
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
                                    'n' => 'primary_effluent_COD',
                                    'vt' => 'numerical',
                                    'l' => 'Primary effluent COD',
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
                                    'n' => 'COD_lb_day',
                                    'vt' => 'numerical',
                                    'l' => 'COD added to aeration',
                                    'us' => '147',
                                    'du' => 'kgd',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'eRxOe7tENAcnLip0qwGYf',
                'title' => 'Aerator dimensions',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'l',
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
                                    'n' => 'w',
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
                                    'l' => 'Sidewall depth',
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
                                    'l' => 'Aeration volume',
                                    'us' => '20',
                                    'du' => 'm3',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'cQ5nR5Gl-O6Qp-i83hqY9',
                'title' => 'Biological component',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'F_M_ratio',
                                    'vt' => 'numerical',
                                    'l' => 'F/M ratio',
                                    'h' => <<<'TXT'
                                    Food to microorganism ratio. Please note that the full units are mass unit per day of COD / mass unit of MLVSS. Use the unit switcher on the right to change the mass unit selected.
                                    TXT,
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => '2x_DzAXD8fkuL3kzE3Qm9',
                'title' => 'Results',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'MLVSS_lbs',
                                    'vt' => 'numerical',
                                    'l' => 'MLVSS (mass)',
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
                                    'n' => 'MLVSS',
                                    'vt' => 'numerical',
                                    'l' => 'MLVSS (conc.)',
                                    'us' => '21',
                                    'du' => 'mgpL',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'primary_effluent_COD = average_untreated_influent_COD - average_primary_treated_COD',
                'var' => [
                    [
                        'l' => 'average_untreated_influent_COD',
                        'f' => 'average_primary_treated_COD + primary_effluent_COD',
                        'r' => ['average_primary_treated_COD', 'primary_effluent_COD'],
                    ],
                    [
                        'l' => 'average_primary_treated_COD',
                        'f' => 'average_untreated_influent_COD - primary_effluent_COD',
                        'r' => ['average_untreated_influent_COD', 'primary_effluent_COD'],
                    ],
                    [
                        'l' => 'primary_effluent_COD',
                        'f' => '-average_primary_treated_COD + average_untreated_influent_COD',
                        'r' => ['average_untreated_influent_COD', 'average_primary_treated_COD'],
                    ],
                ],
            ],
            [
                'formula' => 'COD_lb_day = flow_mgd * primary_effluent_COD * 8.34 / 1000',
                'var' => [
                    [
                        'l' => 'primary_effluent_COD',
                        'f' => '(50000/417)*COD_lb_day/flow_mgd',
                        'r' => ['COD_lb_day', 'flow_mgd'],
                    ],
                    [
                        'l' => 'COD_lb_day',
                        'f' => '(417/50000)*flow_mgd*primary_effluent_COD',
                        'r' => ['primary_effluent_COD', 'flow_mgd'],
                    ],
                    [
                        'l' => 'flow_mgd',
                        'f' => '(50000/417)*COD_lb_day/primary_effluent_COD',
                        'r' => ['primary_effluent_COD', 'COD_lb_day'],
                    ],
                ],
            ],
            [
                'formula' => 'aeration_vol_mg = (l * w * (side_wall_depth - free_board) * 7.48) ',
                'var' => [
                    [
                        'l' => 'free_board',
                        'f' => '-25/187*aeration_vol_mg/(l*w) + side_wall_depth',
                        'r' => ['l', 'w', 'aeration_vol_mg', 'side_wall_depth'],
                    ],
                    [
                        'l' => 'l',
                        'f' => '-25/187*aeration_vol_mg/(w*(free_board - side_wall_depth))',
                        'r' => ['free_board', 'w', 'aeration_vol_mg', 'side_wall_depth'],
                    ],
                    [
                        'l' => 'w',
                        'f' => '-25/187*aeration_vol_mg/(l*(free_board - side_wall_depth))',
                        'r' => ['free_board', 'l', 'aeration_vol_mg', 'side_wall_depth'],
                    ],
                    [
                        'l' => 'aeration_vol_mg',
                        'f' => '(187/25)*l*w*(-free_board + side_wall_depth)',
                        'r' => ['free_board', 'l', 'w', 'side_wall_depth'],
                    ],
                    [
                        'l' => 'side_wall_depth',
                        'f' => '(25/187)*aeration_vol_mg/(l*w) + free_board',
                        'r' => ['free_board', 'l', 'w', 'aeration_vol_mg'],
                    ],
                ],
            ],
            [
                'formula' => 'HRT = aeration_vol_mg / (flow_mgd / 24)',
                'var' => [
                    [
                        'l' => 'aeration_vol_mg',
                        'f' => '(1/24)*HRT*flow_mgd',
                        'r' => ['HRT', 'flow_mgd'],
                    ],
                    [
                        'l' => 'HRT',
                        'f' => '24*aeration_vol_mg/flow_mgd',
                        'r' => ['aeration_vol_mg', 'flow_mgd'],
                    ],
                    [
                        'l' => 'flow_mgd',
                        'f' => '24*aeration_vol_mg/HRT',
                        'r' => ['aeration_vol_mg', 'HRT'],
                    ],
                ],
            ],
            [
                'formula' => 'MLVSS_lbs = COD_lb_day / F_M_ratio',
                'var' => [
                    [
                        'l' => 'MLVSS_lbs',
                        'f' => 'COD_lb_day/F_M_ratio',
                        'r' => ['F_M_ratio', 'COD_lb_day'],
                    ],
                    [
                        'l' => 'F_M_ratio',
                        'f' => 'COD_lb_day/MLVSS_lbs',
                        'r' => ['MLVSS_lbs', 'COD_lb_day'],
                    ],
                    [
                        'l' => 'COD_lb_day',
                        'f' => 'F_M_ratio*MLVSS_lbs',
                        'r' => ['MLVSS_lbs', 'F_M_ratio'],
                    ],
                ],
            ],
            [
                'formula' => 'MLVSS = MLVSS_lbs / (aeration_vol_mg * 8.34 / 1000000)',
                'var' => [
                    [
                        'l' => 'MLVSS_lbs',
                        'f' => '(417/50000000)*MLVSS*aeration_vol_mg',
                        'r' => ['aeration_vol_mg', 'MLVSS'],
                    ],
                    [
                        'l' => 'aeration_vol_mg',
                        'f' => '(50000000/417)*MLVSS_lbs/MLVSS',
                        'r' => ['MLVSS_lbs', 'MLVSS'],
                    ],
                    [
                        'l' => 'MLVSS',
                        'f' => '(50000000/417)*MLVSS_lbs/aeration_vol_mg',
                        'r' => ['MLVSS_lbs', 'aeration_vol_mg'],
                    ],
                ],
            ],
            [
                'formula' => 'MLSS = ((MLSS_after - MLSS_before)) / MLSS_sample',
                'var' => [
                    [
                        'l' => 'MLSS_after',
                        'f' => 'MLSS*MLSS_sample + MLSS_before',
                        'r' => ['MLSS', 'MLSS_before', 'MLSS_sample'],
                    ],
                    [
                        'l' => 'MLSS',
                        'f' => '(MLSS_after - MLSS_before)/MLSS_sample',
                        'r' => ['MLSS_after', 'MLSS_before', 'MLSS_sample'],
                    ],
                    [
                        'l' => 'MLSS_before',
                        'f' => '-MLSS*MLSS_sample + MLSS_after',
                        'r' => ['MLSS_after', 'MLSS', 'MLSS_sample'],
                    ],
                    [
                        'l' => 'MLSS_sample',
                        'f' => '(MLSS_after - MLSS_before)/MLSS',
                        'r' => ['MLSS_after', 'MLSS', 'MLSS_before'],
                    ],
                ],
            ],
            [
                'formula' => 'Fixed_solids = ((FS_after - FS_before)) / FS_sample',
                'var' => [
                    [
                        'l' => 'FS_after',
                        'f' => 'FS_before + FS_sample*Fixed_solids',
                        'r' => ['FS_sample', 'Fixed_solids', 'FS_before'],
                    ],
                    [
                        'l' => 'FS_sample',
                        'f' => '(FS_after - FS_before)/Fixed_solids',
                        'r' => ['FS_after', 'Fixed_solids', 'FS_before'],
                    ],
                    [
                        'l' => 'Fixed_solids',
                        'f' => '(FS_after - FS_before)/FS_sample',
                        'r' => ['FS_after', 'FS_sample', 'FS_before'],
                    ],
                    [
                        'l' => 'FS_before',
                        'f' => 'FS_after - FS_sample*Fixed_solids',
                        'r' => ['FS_after', 'FS_sample', 'Fixed_solids'],
                    ],
                ],
            ],
            [
                'formula' => 'MLVSS = MLSS - Fixed_solids',
                'var' => [
                    [
                        'l' => 'Fixed_solids',
                        'f' => 'MLSS - MLVSS',
                        'r' => ['MLSS', 'MLVSS'],
                    ],
                    [
                        'l' => 'MLSS',
                        'f' => 'Fixed_solids + MLVSS',
                        'r' => ['Fixed_solids', 'MLVSS'],
                    ],
                    [
                        'l' => 'MLVSS',
                        'f' => '-Fixed_solids + MLSS',
                        'r' => ['Fixed_solids', 'MLSS'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'Taj6c3xfhwivF8I7JuE82' => [
                'name' => 'method',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'd006IVo__Aqx37bG8i9Mi', 'label' => 'Laboratory', 'value' => '1'],
                    ['uid' => 'coxb9zyKm2Fo4u8MG7eFh', 'label' => 'Industrial', 'value' => '2'],
                ],
            ],
        ],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        Mixed liquor volatile suspended solids works out Sample volume and Weight of filter paper from Average primary treated COD and Primary effluent COD. Nothing is looked up on this page: Sample volume is computed from Average primary treated COD and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Sample volume is opened in cubic decimeters; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Mixed liquor volatile suspended solids calculator works', 'html' => <<<'TXT'
            <p>The Mixed liquor volatile suspended solids calculator applies one relationship to 2 numbers and reports Sample volume, Weight of filter paper and Weight of filter paper + residue.</p><p>In the form&#039;s own words, Average untreated in-fluent COD = Average primary treated COD + Primary effluent COD.</p><p>The answers are Sample volume, Weight of filter paper, Weight of filter paper + residue and MLSS; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Average primary treated COD</strong> — in grams per liter</li><li><strong>Primary effluent COD</strong> — in grams per liter</li></ul><p>The answers come back as Sample volume in cubic decimeters, Weight of filter paper in grams, Weight of filter paper + residue in grams, MLSS in grams per liter, Sample volume in cubic decimeters, Weight of crucible in grams, Weight of crucible + ash in grams, Fixed solids in grams per liter, Flow in cubic meters per day, HRT in hours / minutes, Average untreated in-fluent COD in grams per liter, COD added to aeration in kilograms per day, Length in meters, Width in meters, Sidewall depth in meters, Free-board in meters, Aeration volume in cubic meters, F/M ratio, MLVSS (mass) in kilograms, MLVSS (conc.) in milligrams per liter. </p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Average untreated in-fluent COD</strong> = <code>Average primary treated COD + Primary effluent COD</code></li><li><strong>Average primary treated COD</strong> = <code>Average untreated in-fluent COD − Primary effluent COD</code></li><li><strong>Primary effluent COD</strong> = <code>− Average primary treated COD + Average untreated in-fluent COD</code></li><li><strong>COD added to aeration</strong> = <code>(417 ÷ 50000) × Flow × Primary effluent COD</code></li><li><strong>Flow</strong> = <code>(50000 ÷ 417) × COD added to aeration ÷ Primary effluent COD</code></li><li><strong>Free-board</strong> = <code>− 25 ÷ 187 × Aeration volume ÷ (Length × Width) + Sidewall depth</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Average untreated in-fluent COD, Average primary treated COD and Primary effluent COD can be the unknown.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Average primary treated COD and Primary effluent COD carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Sample volume, Weight of filter paper and Weight of filter paper + residue are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Average primary treated COD and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Average primary treated COD and Primary effluent COD and the number you are missing is Sample volume and Weight of filter paper.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/respiratory-quotient">Respiratory Quotient Calculator</a>, <a href="/biology/restriction-digest">Restriction Digest Calculator</a> and <a href="/biology/restriction-digest-setup">Restriction Digest Reaction Setup Calculator — Formula &amp; Resul</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Mixed liquor volatile suspended solids calculator work out?', 'a' => <<<'TXT'
            Sample volume, Weight of filter paper, Weight of filter paper + residue and MLSS, from Average primary treated COD and Primary effluent COD. The relationship is Average untreated in-fluent COD = Average primary treated COD + Primary effluent COD.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Average primary treated COD (grams per liter), Primary effluent COD (grams per liter). Fill average_primary_treated_COD and primary_effluent_COD and leave Sample volume empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Average untreated in-fluent COD, Average primary treated COD, Primary effluent COD and COD added to aeration can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Sample volume is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Average primary treated COD blank and the page solves for it, reporting Sample volume instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Sample volume keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/respiratory-quotient', 'name' => 'Respiratory Quotient Calculator'],
            ['path' => '/biology/restriction-digest', 'name' => 'Restriction Digest Calculator'],
            ['path' => '/biology/restriction-digest-setup', 'name' => 'Restriction Digest Reaction Setup Calculator — Formula & Resul'],
        ],
        'authors' => [],
    ],
];
