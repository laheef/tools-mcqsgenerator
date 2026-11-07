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
    'meta' => ['title' => 'Mixed liquor volatile suspended solids Calculator', 'description' => <<<'TXT'
    Give the Mixed liquor volatile suspended solids calculator the sample volume, the weight of filter paper and the MLSS and it returns <strong>average untreated…
    TXT, 'h1' => 'Mixed liquor volatile suspended solids Calculator', 'updated' => '2026-08-12'],
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
        Give the Mixed liquor volatile suspended solids calculator the sample volume, the weight of filter paper and the MLSS and it returns <strong>average untreated in-fluent COD</strong>.
        TXT,
        'sections' => [
            ['title' => 'How does the Mixed liquor volatile suspended solids calculator work?', 'html' => <<<'TXT'
            <p>The Mixed liquor volatile suspended solids calculator takes the values in the form, applies the relationship described below and reports <strong>average untreated in-fluent COD</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the method); then you type in the sample volume (Mixed liquor suspended solid experiment), the weight of filter paper, the MLSS and the sample volume (Fixed solids experiment).</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 2 options, such as laboratory and industrial. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>A measured quantity, entered by default in cubic decimeters. The unit chip switches it to any of the 40 supported units.</li><li>A measured quantity, entered by default in grams. </li><li>A measured quantity, entered by default in grams per liter. The unit chip switches it to any of the 28 supported units.</li><li>A measured quantity, entered by default in cubic decimeters. The unit chip switches it to any of the 40 supported units.</li><li>A measured quantity, entered by default in grams. </li><li>A measured quantity, entered by default in cubic meters per day. The unit chip switches it to any of the 39 supported units.</li><li>A measured quantity, entered by default in hours / minutes. </li><li>A measured quantity, entered by default in grams per liter. The unit chip switches it to any of the 28 supported units.</li><li>A measured quantity, entered by default in kilograms per day. The unit chip switches it to any of the 16 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li><li>A plain number with no unit attached.</li></ul><p>One field on this form is a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Method</strong></td><td>One of 2 options, such as laboratory and industrial.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Sample volume (Mixed liquor suspended solid experiment)</strong></td><td>A measured quantity, 40 units available.</td><td>cubic decimeters</td><td>You supply it</td></tr><tr><td><strong>Weight of filter paper</strong></td><td>A measured quantity, 29 units available.</td><td>grams</td><td>You supply it</td></tr><tr><td><strong>Weight of filter paper + residue</strong></td><td>A measured quantity, 29 units available.</td><td>grams</td><td>Calculated</td></tr><tr><td><strong>MLSS</strong></td><td>A measured quantity, 28 units available.</td><td>grams per liter</td><td>You supply it</td></tr><tr><td><strong>Sample volume (Fixed solids experiment)</strong></td><td>A measured quantity, 40 units available.</td><td>cubic decimeters</td><td>You supply it</td></tr><tr><td><strong>Weight of crucible</strong></td><td>A measured quantity, 29 units available.</td><td>grams</td><td>You supply it</td></tr><tr><td><strong>Weight of crucible + ash</strong></td><td>A measured quantity, 29 units available.</td><td>grams</td><td>Calculated</td></tr><tr><td><strong>Fixed solids</strong></td><td>A measured quantity, 28 units available.</td><td>grams per liter</td><td>Calculated</td></tr><tr><td><strong>Flow</strong></td><td>A measured quantity, 39 units available.</td><td>cubic meters per day</td><td>You supply it</td></tr><tr><td><strong>HRT</strong></td><td>A measured quantity, 27 units available.</td><td>hours / minutes</td><td>You supply it</td></tr><tr><td><strong>Average untreated in-fluent COD</strong></td><td>A measured quantity, 28 units available.</td><td>grams per liter</td><td>Calculated</td></tr><tr><td><strong>Average primary treated COD</strong></td><td>A measured quantity, 28 units available.</td><td>grams per liter</td><td>You supply it</td></tr><tr><td><strong>Primary effluent COD</strong></td><td>A measured quantity, 28 units available.</td><td>grams per liter</td><td>Calculated</td></tr><tr><td><strong>COD added to aeration</strong></td><td>A measured quantity, 16 units available.</td><td>kilograms per day</td><td>You supply it</td></tr><tr><td><strong>Length</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>You supply it</td></tr><tr><td><strong>Width</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>You supply it</td></tr><tr><td><strong>Sidewall depth</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>You supply it</td></tr><tr><td><strong>Aeration volume</strong></td><td>A measured quantity, 40 units available.</td><td>cubic meters</td><td>Calculated</td></tr><tr><td><strong>F/M ratio</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>MLVSS (mass)</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>Calculated</td></tr><tr><td><strong>MLVSS (conc.)</strong></td><td>A measured quantity, 28 units available.</td><td>milligrams per liter</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Mixed liquor volatile suspended solids calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Average untreated in-fluent COD</span><span class="formula-eq">=</span><span class="formula-rhs">average primary treated COD + primary effluent COD</span></div><div class="formula-row"><span class="formula-lhs">Primary effluent COD</span><span class="formula-eq">=</span><span class="formula-rhs">(50000 ÷ 417) × COD added to aeration ÷ flow</span></div><div class="formula-row"><span class="formula-lhs">Free-board</span><span class="formula-eq">=</span><span class="formula-rhs">-25 ÷ 187 × aeration volume ÷ (length × width) + sidewall depth</span></div><div class="formula-row"><span class="formula-lhs">Aeration volume</span><span class="formula-eq">=</span><span class="formula-rhs">(1 ÷ 24) × HRT × flow</span></div><div class="formula-row"><span class="formula-lhs">MLVSS (mass)</span><span class="formula-eq">=</span><span class="formula-rhs">COD added to aeration ÷ F ÷ M ratio</span></div><div class="formula-row"><span class="formula-lhs">MLVSS (mass)</span><span class="formula-eq">=</span><span class="formula-rhs">(417 ÷ 50000000) × MLVSS (conc.) × aeration volume</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What is a worked example?', 'html' => <<<'TXT'
            <p>Suppose <strong>Method</strong> set to Laboratory, <strong>Average primary treated COD</strong> = 10 g/L and <strong>Primary effluent COD</strong> = 10 g/L. Working through the relationship above gives <strong>Average untreated in-fluent COD</strong> = 20 g/L.</p><p>The point of the example is the scale, not the particular digits: swap in your own figures and the same relationship produces your answer.</p><ol><li>Enter the values listed above, matching the units each box asks for.</li><li>Read off the result. Any field you leave empty is the one the calculator solves for.</li><li>Sanity-check the number against the relationship: <strong>Average untreated in-fluent COD</strong> = 20 g/L should be roughly the size you expected from <strong>Method</strong> set to Laboratory and <strong>Average primary treated COD</strong> = 10 g/L.</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in grams per liter, and convertible to any of the 28 units on that chip.</li><li>Shown in grams per liter, and convertible to any of the 28 units on that chip.</li><li>Shown in meters, and convertible to any of the 34 units on that chip.</li><li>Shown in cubic meters, and convertible to any of the 40 units on that chip.</li><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li><li>Shown in milligrams per liter, and convertible to any of the 28 units on that chip.</li><li>Shown in grams, and convertible to any of the 29 units on that chip.</li><li>Shown in grams, and convertible to any of the 29 units on that chip.</li><li>Shown in grams per liter, and convertible to any of the 28 units on that chip.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Volume, opening in cubic decimeters</li><li>Mass, opening in grams</li><li>Mass, opening in grams</li><li>Density, opening in grams per liter</li><li>Volume, opening in cubic decimeters</li><li>Mass, opening in grams</li><li>Mass, opening in grams</li><li>Density, opening in grams per liter</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Mixed liquor volatile suspended solids calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Putting a biological quantity into a scale you can picture</li><li>Supporting a lesson, a lecture or a field note</li><li>Comparing two organisms, populations or processes</li><li>Any time the same 3 figures keep coming back — the sample volume, the weight of filter paper and the MLSS — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li><li>Write the answer down with its unit. </li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/mowing-cost">Lawn mowing</a>, <a href="/biology/mulch">Mulch</a> and <a href="/biology/mutation-frequency">Mutation frequency</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Mixed liquor volatile suspended solids calculator work out?', 'a' => <<<'TXT'
            It returns average untreated in-fluent COD, derived from the sample volume, the weight of filter paper and the MLSS. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Mixed liquor volatile suspended solids calculator?', 'a' => <<<'TXT'
            The form asks for the sample volume, the weight of filter paper and the MLSS, which is 14 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter sample volume (Mixed liquor suspended solid experiment) in a different unit?', 'a' => <<<'TXT'
            Yes. Sample volume (Mixed liquor suspended solid experiment) opens in cubic decimeters and the chip beside it offers 40 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There is one choice to make (1 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'What is a typical result?', 'a' => <<<'TXT'
            With the values the page starts from, the calculator reports Average untreated in-fluent COD = 20 g/L. Treat that as a reference point rather than a recommendation: it exists so you can tell at a glance whether your own inputs are on the same scale.
            TXT],
            ['q' => 'Is the Mixed liquor volatile suspended solids calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/mowing-cost', 'name' => 'Lawn mowing'],
            ['path' => '/biology/mulch', 'name' => 'Mulch'],
            ['path' => '/biology/mutation-frequency', 'name' => 'Mutation frequency'],
        ],
    ],
];
