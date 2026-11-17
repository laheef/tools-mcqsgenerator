<?php

/**
 * Investment
 * /finance/investment
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Investment',
    'meta' => ['title' => 'Investment Calculator — Formula, Units & Example', 'description' => 'Investment works out total balance and of which interest and reports both. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Investment Calculator', 'updated' => '2026-09-27'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'subject',
                            'label' => 'I would like to know...',
                            'type' => 'select',
                            'options' => [
                                'final balance' => '1138535033',
                                'initial investment' => '1311887163',
                                'periodic contribution' => '992999823',
                                'time length' => '3471940413',
                                'rate of return' => '3471940414',
                            ],
                            'dataset' => 'subjectDS',
                            'control' => 'DROPDOWN',
                            'default' => 'final balance',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Main Features',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'FinalBal_adj',
                            'label' => 'Desired Balance',
                            'type' => 'number',
                            'help' => 'The future value (FV) of your investment. Note that it will be your desired inflation-adjusted balance if you provide the annual inflation.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '200000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'InitialDep',
                            'label' => 'Initial Investment',
                            'type' => 'number',
                            'help' => 'The initial balance at the beginning of the investment term.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '10000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'r',
                            'label' => 'Rate of return',
                            'type' => 'number',
                            'help' => 'Yearly nominal interest rate.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 't',
                            'label' => 'Term',
                            'type' => 'number',
                            'help' => 'The time frame of your investment.',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'compound_frequency',
                            'label' => 'Compound frequency',
                            'type' => 'select',
                            'options' => [
                                'Yearly' => '1138535111',
                                'Semi-annually' => '992999222',
                                'Quarterly' => '3471940333',
                                'Monthly' => '131188444',
                                'Weekly' => '3763296555',
                                'Daily' => '458649666',
                                'Continuous' => '21448810777',
                            ],
                            'dataset' => 'compound_frequencyDS',
                            'control' => 'DROPDOWN',
                            'help' => 'Here you can set how often the interest is calculated on your balance.',
                            'default' => 'Monthly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'infl',
                            'label' => 'Annual inflation rate',
                            'type' => 'number',
                            'help' => 'Here you can set the expected average yearly inflation rate over the timespan of your investment.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Additional contributions',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PeriodicDep',
                            'label' => 'How much?',
                            'type' => 'number',
                            'help' => 'The amount of additional periodic contribution to your initial investment.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '1000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'q',
                            'label' => 'How often?',
                            'type' => 'select',
                            'options' => [
                                'Yearly' => '1',
                                'Semi-annually' => '2',
                                'Quarterly' => '4',
                                'Monthly' => '12',
                                'Bi-weekly' => '26.08875',
                                'Weekly' => '52.1775',
                                'Daily' => '365.242',
                                'Never' => '1000',
                            ],
                            'dataset' => 'Payment frequency',
                            'control' => 'DROPDOWN',
                            'help' => 'Here you can set the regularity of payments if you wish to set a periodic contribution.',
                            'default' => 'Never',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'type',
                            'label' => 'When?',
                            'type' => 'select',
                            'options' => ['end of period' => '0', 'beginning of period' => '1'],
                            'dataset' => 'Type',
                            'control' => 'DROPDOWN',
                            'help' => 'Here you can set the timing of the periodic contribution.',
                            'default' => 'beginning of period',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'g',
                            'label' => 'Annual Growth Rate',
                            'type' => 'number',
                            'help' => 'The percentage growth rate of your periodic contribution over a year.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'g_p',
                            'label' => 'Periodic Growth Rate',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            The percentage growth rate of your periodic contribution. Note that periodic and annual growth rates are linked together: if you set one, the other will be calculated according to the regularity of your contribution.
                            TXT,
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Results',
            'note' => '',
            'blocks' => [],
        ],
        [
            'title' => 'Hidden variables',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'FinalBal',
                            'label' => 'Desired Balance',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '2000000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'var1',
                            'label' => 'Var1',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'DepositBal',
                            'label' => 'Depositbal',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PrincipalBal',
                            'label' => 'Principalbal',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'm',
                            'label' => 'M',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'ct1',
                            'label' => 'Ct1',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ct2',
                            'label' => 'Ct2',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'first_day', 'label' => 'Display in', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'vis_FinalBal_adj',
                            'label' => 'Vis final bal adj',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'vis_FinalBal',
                            'label' => 'Vis final bal',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'vis_InitialDep',
                            'label' => 'Vis initial dep',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'vis_PeriodicDep',
                            'label' => 'Vis periodic dep',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 3,
                    'place' => [0, 1, 2],
                    'fields' => [
                        [
                            'name' => 'vis_g',
                            'label' => 'Vis g',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'vis_g_p',
                            'label' => 'Vis g p',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'vis_infl',
                            'label' => 'Vis infl',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 3,
                    'place' => [0, 1, 2],
                    'fields' => [
                        [
                            'name' => 'vis_r',
                            'label' => 'Vis r',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'vis_t',
                            'label' => 'Vis t',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'vis_type',
                            'label' => 'Vis type',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'message_disp',
                            'label' => 'Message disp',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'chart',
                            'label' => 'Chart',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Balance_interest',
                            'label' => 'Balance interest',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'FinalBal_r',
                            'label' => 'Final bal r',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Final_real',
                            'label' => 'Final real',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'InitialDep_r',
                            'label' => 'Initial dep r',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'eq_p2',
                            'label' => 'Eq p2',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PeriodicDep_r',
                            'label' => 'Periodic dep r',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 3,
                    'place' => [0, 1, 2],
                    'fields' => [
                        [
                            'name' => 'trunc_days',
                            'label' => 'Trunc days',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'trunc_months',
                            'label' => 'Trunc months',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'trunc_t',
                            'label' => 'Trunc t',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Balance_total',
                            'label' => 'Balance total',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'contributions_total',
                            'label' => 'Contributions total',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_principal',
                            'label' => 'Total principal',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'real_interest',
                            'label' => 'Real interest',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'real_interest_neg',
                            'label' => 'Real interest neg',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'infl_r',
                            'label' => 'Infl r',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Results',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Balance_total',
                            'label' => 'Total balance',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Balance_interest',
                            'label' => 'Of which interest',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Final_real',
                            'label' => 'Balance in today\'s money',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'contributions_total',
                            'label' => 'Total of the additional deposits',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_principal',
                            'label' => 'Total principal (initial plus deposits)',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'g + 1 = (1 + g_p) ^ q',
            'results' => ['g_p' => 'pow(g + 1, 1/q) - 1', 'q' => 'log(g + 1)/log(g_p + 1)', 'g' => 'pow(g_p + 1, q) - 1'],
        ],
        [
            'title' => 'vis_FinalBal_adj = check_visibility(var1, q, 0)',
            'results' => ['vis_FinalBal_adj' => 'check_visibility(var1, q, 0)'],
        ],
        [
            'title' => 'vis_FinalBal = check_visibility(var1, q, 1)',
            'results' => ['vis_FinalBal' => 'check_visibility(var1, q, 1)'],
        ],
        [
            'title' => 'vis_InitialDep = check_visibility(var1, q, 2)',
            'results' => ['vis_InitialDep' => 'check_visibility(var1, q, 2)'],
        ],
        [
            'title' => 'vis_PeriodicDep = check_visibility(var1, q, 3)',
            'results' => ['vis_PeriodicDep' => 'check_visibility(var1, q, 3)'],
        ],
        [
            'title' => 'vis_t = check_visibility(var1, q, 4)',
            'results' => ['vis_t' => 'check_visibility(var1, q, 4)'],
        ],
        [
            'title' => 'vis_r = check_visibility(var1, q, 5)',
            'results' => ['vis_r' => 'check_visibility(var1, q, 5)'],
        ],
        [
            'title' => 'vis_g = check_visibility(var1, q, 6)',
            'results' => ['vis_g' => 'check_visibility(var1, q, 6)'],
        ],
        [
            'title' => 'vis_g_p = check_visibility(var1, q, 7)',
            'results' => ['vis_g_p' => 'check_visibility(var1, q, 7)'],
        ],
        [
            'title' => 'vis_type = check_visibility(var1, q, 8)',
            'results' => ['vis_type' => 'check_visibility(var1, q, 8)'],
        ],
        [
            'title' => 'vis_infl = check_visibility(var1, q, 9)',
            'results' => ['vis_infl' => 'check_visibility(var1, q, 9)'],
        ],
        [
            'title' => 'message_disp = get_message_numb(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, t, r, m, q, var1, g, type, g_p, ct1, infl, 0)',
            'results' => ['message_disp' => 'get_message_numb(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, t, r, m, q, var1, g, type, g_p, ct1, infl, 0)'],
        ],
        [
            'title' => 'eq_p2 = get_message_numb(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, t, r, m, q, var1, g, type, g_p, ct1, infl, 1) * 100',
            'results' => ['eq_p2' => '100*get_message_numb(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, t, r, m, q, var1, g, type, g_p, ct1, infl, 1)'],
        ],
        [
            'title' => 'Balance_total = get_message_numb(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, t, r, m, q, var1, g, type, g_p, ct1, infl, 5)',
            'results' => ['Balance_total' => 'get_message_numb(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, t, r, m, q, var1, g, type, g_p, ct1, infl, 5)'],
        ],
        [
            'title' => 'Balance_interest = get_message_numb(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, t, r, m, q, var1, g, type, g_p, ct1, infl, 6)',
            'results' => ['Balance_interest' => 'get_message_numb(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, t, r, m, q, var1, g, type, g_p, ct1, infl, 6)'],
        ],
        [
            'title' => 'real_interest =  get_message_numb(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, t, r, m, q, var1, g, type, g_p, ct1, infl, 7)',
            'results' => ['real_interest' => 'get_message_numb(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, t, r, m, q, var1, g, type, g_p, ct1, infl, 7)'],
        ],
        [
            'title' => 'Final_real = get_message_numb(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, t, r, m, q, var1, g, type, g_p, ct1, infl, 8)',
            'results' => ['Final_real' => 'get_message_numb(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, t, r, m, q, var1, g, type, g_p, ct1, infl, 8)'],
        ],
        [
            'title' => 'chart = get_message_numb(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, t, r, m, q, var1, g, type, g_p, ct1, infl, 9)',
            'results' => ['chart' => 'get_message_numb(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, t, r, m, q, var1, g, type, g_p, ct1, infl, 9)'],
        ],
        [
            'title' => 'FinalBal_r = get_message_numb(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, t, r, m, q, var1, g, type, g_p, ct1, infl, 10)',
            'results' => ['FinalBal_r' => 'get_message_numb(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, t, r, m, q, var1, g, type, g_p, ct1, infl, 10)'],
        ],
        [
            'title' => 'InitialDep_r = get_message_numb(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, t, r, m, q, var1, g, type, g_p, ct1, infl, 11)',
            'results' => ['InitialDep_r' => 'get_message_numb(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, t, r, m, q, var1, g, type, g_p, ct1, infl, 11)'],
        ],
        [
            'title' => 'PeriodicDep_r = get_message_numb(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, t, r, m, q, var1, g, type, g_p, ct1, infl, 12)',
            'results' => ['PeriodicDep_r' => 'get_message_numb(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, t, r, m, q, var1, g, type, g_p, ct1, infl, 12)'],
        ],
        [
            'title' => 'trunc_months = get_message_numb(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, t, r, m, q, var1, g, type, g_p, ct1, infl, 3)',
            'results' => ['trunc_months' => 'get_message_numb(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, t, r, m, q, var1, g, type, g_p, ct1, infl, 3)'],
        ],
        [
            'title' => 'trunc_days = get_message_numb(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, t, r, m, q, var1, g, type, g_p, ct1, infl, 4)',
            'results' => ['trunc_days' => 'get_message_numb(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, t, r, m, q, var1, g, type, g_p, ct1, infl, 4)'],
        ],
        [
            'title' => 'trunc_t = get_message_numb(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, t, r, m, q, var1, g, type, g_p, ct1, infl, 13)',
            'results' => ['trunc_t' => 'get_message_numb(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, t, r, m, q, var1, g, type, g_p, ct1, infl, 13)'],
        ],
        [
            'title' => 'infl_r = get_message_numb(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, t, r, m, q, var1, g, type, g_p, ct1, infl, 14)',
            'results' => ['infl_r' => 'get_message_numb(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, t, r, m, q, var1, g, type, g_p, ct1, infl, 14)'],
        ],
        [
            'title' => 'contributions_total = one_way((Balance_total - (InitialDep_r + Balance_interest)))',
            'results' => ['contributions_total' => <<<'TXT'
            (get_message_numb(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, t, r, m, q, var1, g, type, g_p, ct1, infl, 5) - get_message_numb(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, t, r, m, q, var1, g, type, g_p, ct1, infl, 6) - get_message_numb(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, t, r, m, q, var1, g, type, g_p, ct1, infl, 11))
            TXT],
        ],
        [
            'title' => 'total_principal = one_way(contributions_total + InitialDep_r)',
            'results' => ['total_principal' => <<<'TXT'
            (get_message_numb(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, t, r, m, q, var1, g, type, g_p, ct1, infl, 11) + (get_message_numb(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, t, r, m, q, var1, g, type, g_p, ct1, infl, 5) - get_message_numb(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, t, r, m, q, var1, g, type, g_p, ct1, infl, 6) - get_message_numb(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, t, r, m, q, var1, g, type, g_p, ct1, infl, 11)))
            TXT],
        ],
        [
            'title' => 'real_interest_neg = one_way(-real_interest)',
            'results' => ['real_interest_neg' => '(-get_message_numb(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, t, r, m, q, var1, g, type, g_p, ct1, infl, 7))'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("check_visibility",function(var1,q,index){var waysOfImprovement={finalAmount:1,initialInvestment:2,periodicDeposit:3,timeLength:4,rateOfReturn:5};var visibility={FinalBal_adj:1,FinalBal:1,InitialDep:1,PeriodicDep:1,t:1,r:1,g:1,g_p:1,type:1,infl:1};if(q===1000){visibility.PeriodicDep=0;visibility.type=0;visibility.g=0;visibility.g_p=0}if(var1===waysOfImprovement.finalAmount){visibility.FinalBal_adj=0}if(var1===1&&q===1){visibility.FinalBal=0;visibility.g_p=0}if(var1===waysOfImprovement.initialInvestment){visibility.InitialDep=0}if(var1===2&&q===1){visibility.InitialDep=0;visibility.g_p=0}if(var1===waysOfImprovement.periodicDeposit){visibility.PeriodicDep=0}if(var1===3&&q===1){visibility.PeriodicDep=0;visibility.g_p=0}if(var1===waysOfImprovement.timeLength){visibility.t=0;visibility.g=0;visibility.g_p=0;visibility.infl=0}if(var1===waysOfImprovement.rateOfReturn){visibility.r=0;visibility.g=0;visibility.g_p=0}return Object.values(visibility)[index]});omni.define("get_message_numb",function(PrincipalBal,DepositBal,InitialDep,PeriodicDep,FinalBal,FinalBal_adj,t,r,m,q,var1,g,type,g_p,ct1,infl,index){var eq_p_var5;var eq_p2;var ex=2.718281828459045;var Final_real;var eq_base;var MAX_ITERATIONS=5000;var MIN_PRECISION=1e-7;var Principal_bal;var chart;var message_numb;if(m===0){var continuous_r=mathjs.pow(ex,r)-1;m=1;eq_base=1+continuous_r/m}else{eq_base=1+r/m}var eq_power=m/q;var eq_p=Math.pow(eq_base,eq_power)-1;var periods=q*t;if(var1===1){if(q===1000){PeriodicDep=0}PrincipalBal=InitialDep*Math.pow(1+eq_p,periods);if(g!==eq_p&&q!==1){DepositBal=PeriodicDep*(Math.pow(1+eq_p,periods)-Math.pow(1+g_p,periods))*(1+eq_p*type)/(eq_p-g_p)}else if(g!==eq_p&&q===1){DepositBal=PeriodicDep*(Math.pow(1+eq_p,periods)-Math.pow(1+g,periods))*(1+eq_p*type)/(eq_p-g)}else if(g===eq_p){DepositBal=PeriodicDep*periods*Math.pow(1+eq_p,periods-1)*(1+eq_p*type)}FinalBal=PrincipalBal+DepositBal;Final_real=FinalBal/mathjs.pow(1+infl,t);if((InitialDep>0||PeriodicDep>0)&&infl===0){message_numb=1;chart=1}else if((InitialDep>0||PeriodicDep>0)&&infl>0){message_numb=2;chart=1}else{message_numb=3;chart=0}}else if(var1===2){if(q===1000){PeriodicDep=0}if(g!==eq_p&&q!==1){DepositBal=PeriodicDep*(Math.pow(1+eq_p,periods)-Math.pow(1+g_p,periods))*(1+eq_p*type)/(eq_p-g_p)}else if(g!==eq_p&&q===1){DepositBal=PeriodicDep*(Math.pow(1+eq_p,periods)-Math.pow(1+g,periods))*(1+eq_p*type)/(eq_p-g)}else if(g===eq_p){DepositBal=PeriodicDep*periods*Math.pow(1+eq_p,periods-1)*(1+eq_p*type)}FinalBal=FinalBal_adj*mathjs.pow(1+infl,t);PrincipalBal=FinalBal-DepositBal;InitialDep=PrincipalBal/Math.pow(1+eq_p,periods);if(FinalBal===0){message_numb=4;chart=0}else if(InitialDep>=0&&infl===0){message_numb=5;chart=1}else if(InitialDep>=0&&infl>0){message_numb=6;chart=1}else{message_numb=7;chart=0}}else if(var1===3){FinalBal=FinalBal_adj*mathjs.pow(1+infl,t);PrincipalBal=InitialDep*Math.pow(1+eq_p,periods);DepositBal=FinalBal-PrincipalBal;if(g!==eq_p&&q!==1){PeriodicDep=DepositBal/((Math.pow(1+eq_p,periods)-Math.pow(1+g_p,periods))*(1+eq_p*type)/(eq_p-g_p))}else if(g!==eq_p&&q===1){PeriodicDep=DepositBal/((Math.pow(1+eq_p,periods)-Math.pow(1+g,periods))*(1+eq_p*type)/(eq_p-g))}else if(g===eq_p){PeriodicDep=DepositBal/(periods*Math.pow(1+eq_p,periods-1)*(1+eq_p*type))}if(PeriodicDep>0&&infl===0&&q!==1000){message_numb=8;chart=1}else if(PeriodicDep>0&&infl>0&&q!==1000){message_numb=9;chart=1}else if(q===1000){message_numb=10;chart=0}else{message_numb=11;chart=0}}else if(var1===4){infl=0;if(q===1000){PeriodicDep=0}if(InitialDep>0||PeriodicDep>0){FinalBal=FinalBal_adj*mathjs.pow(1+infl,t);DepositBal=FinalBal-PrincipalBal;periods=Math.log((eq_p*(FinalBal+PeriodicDep*type)+PeriodicDep)/(eq_p*InitialDep+PeriodicDep*(1+eq_p*type)))/Math.log(eq_p+1);t=periods/q}var _months=(t-Math.trunc(t))*12;var _days=(_months-Math.trunc(_months))*365.242/12;if(InitialDep+PeriodicDep<=0){message_numb=12;chart=0}else if(InitialDep>=FinalBal){message_numb=13;chart=0}else if(Math.trunc(t)===0&&Math.trunc(_months)!==0&&Math.trunc(_days)!==0){message_numb=14;chart=1}else if(Math.trunc(_months)===0&&Math.trunc(_days)!==0&&Math.trunc(t)!==0){message_numb=15;chart=1}else if(Math.trunc(_days)===0&&Math.trunc(_months)!==0&&Math.trunc(t)!==0){message_numb=16;chart=1}else if(Math.trunc(t)===0&&Math.trunc(_months)===0&&Math.trunc(_days)!==0){message_numb=17;chart=1}else if(Math.trunc(t)===0&&Math.trunc(_days)===0&&Math.trunc(_months)!==0){message_numb=18;chart=1}else if(Math.trunc(_days)===0&&Math.trunc(_months)===0&&Math.trunc(t)!==0){message_numb=19;chart=1}else if(Math.trunc(_days)!==0&&Math.trunc(_months)!==0&&Math.trunc(t)!==0){message_numb=20;chart=1}else if(Math.trunc(_days)===0&&Math.trunc(_months)===0&&Math.trunc(t)===0){message_numb=21;chart=0}}else if(var1===5){if(q===1000){PeriodicDep=0}FinalBal=FinalBal_adj*mathjs.pow(1+infl,t);var oldI;var newI=eq_p;var iteration=0;do{oldI=newI;var dividend=InitialDep*Math.pow(newI+1,periods)+PeriodicDep*(Math.pow(newI+1,periods)-1)*(1+newI*type)/newI-FinalBal;var divisor=InitialDep*periods*Math.pow(newI+1,periods-1)+((PeriodicDep*periods*Math.pow(newI+1,periods-1)*(1+newI*type)+PeriodicDep*(Math.pow(newI+1,periods)-1))*newI-PeriodicDep*(Math.pow(newI+1,periods)-1)*(1+newI*type))/Math.pow(newI,2);newI=newI-dividend/divisor;++iteration}while(Math.abs(oldI-newI)>MIN_PRECISION&&iteration<=MAX_ITERATIONS);eq_p=newI;eq_p_var5=newI;var oldR;var newR=eq_p;var iterationR=0;do{oldR=newR;if(ct1===0){var dividendR=Math.pow(ex,newR/q)-1-eq_p;var divisorR=Math.pow(ex,newR/q)/q;newR=newR-dividendR/divisorR}else{var dividendR2=Math.pow(1+newR/m,m/q)-1-eq_p;var divisorR2=Math.pow(1+newR/m,m/q-1)/q;newR=newR-dividendR2/divisorR2}++iterationR}while(Math.abs(oldR-newR)>MIN_PRECISION&&iterationR<=MAX_ITERATIONS);eq_p2=newR;eq_p=eq_p2;if(InitialDep+PeriodicDep<=0){message_numb=22;chart=0}else if(eq_p2<=0||isNaN(eq_p2)){message_numb=23;chart=0}else{message_numb=24;chart=1}}if(var1===5){r=eq_p}if(var1===5){eq_p=eq_p_var5}var Balance_interest;var Balance_total;var Deposit_bal;var Contributions=0;var dep_growth=0;var yearly_dep=PeriodicDep*q;var periods_chart=t*12;if(var1===4){periods_chart=periods_chart+1}var dep_power;var eq_base_monthly;if(ct1===0){var continuous_r_monthly=mathjs.pow(ex,r)-1;m=1;eq_base_monthly=1+continuous_r_monthly/m}else{eq_base_monthly=1+r/m}var eq_power_monthly=m/12;var r_monthly=mathjs.pow(eq_base_monthly,eq_power_monthly)-1;var Initial_bal=InitialDep/(r_monthly+1);var Interest_princ_month;for(var i=0;i<=periods_chart;i++){dep_power=i/12*q;Interest_princ_month=Initial_bal*r_monthly;Initial_bal=Initial_bal+Interest_princ_month;if(var1>3){Deposit_bal=PeriodicDep*(Math.pow(1+eq_p,dep_power)-1)*(1+eq_p*type)/eq_p}if(g!==eq_p&&q!==1&&var1<4){Deposit_bal=PeriodicDep*(Math.pow(1+eq_p,dep_power)-Math.pow(1+g_p,dep_power))*(1+eq_p*type)/(eq_p-g_p)}else if(g!==eq_p&&q===1&&var1<4){Deposit_bal=PeriodicDep*(Math.pow(1+eq_p,dep_power)-Math.pow(1+g,dep_power))*(1+eq_p*type)/(eq_p-g)}else if(g===eq_p&&var1<4){Deposit_bal=PeriodicDep*dep_power*Math.pow(1+eq_p,dep_power-1)*(1+eq_p*type)}if(i===12){dep_growth=yearly_dep}else if(i%12===0&&i>=24){dep_growth=yearly_dep*Math.pow(1+g,i/12-1)}else{dep_growth=0}Contributions+=dep_growth;Principal_bal=Contributions+InitialDep;Balance_total=Deposit_bal+Initial_bal;if(Balance_total>FinalBal){Balance_total=FinalBal}Balance_interest=Balance_total-Principal_bal;if(Balance_interest>FinalBal-Principal_bal){Balance_interest=FinalBal-Principal_bal}}var months=(t-Math.trunc(t))*12;var days=(months-Math.trunc(months))*365.242/12;var contributions_total=Balance_total-(InitialDep+Balance_interest);var real_interest=0;Final_real=Balance_total/mathjs.pow(1+infl,t);real_interest=Final_real-(contributions_total+InitialDep);var results=[message_numb,eq_p2,periods,Math.trunc(months),Math.trunc(days),Balance_total,Balance_interest,real_interest,Final_real,chart,FinalBal,InitialDep,PeriodicDep,Math.trunc(t),infl];return results[index]});//# sourceURL=customJs.js
    /*
     * Shared helpers for the hand-written repairs in data/calc/supplement/.
     *
     * Every supplement script is evaluated in its own closed scope, so anything the
     * repairs have in common has to travel with each one. Supplement::apply()
     * prepends this file to every page script it merges.
     */
    
    /**
     * The numbers in one free-text box: "1, 2, 3", "1 2 3", "1;2;3" or one per line.
     *
     * A statistics page that asked for fifty separate boxes now asks for one, and
     * the visitor types a list the way they would in a spreadsheet cell. Anything
     * that is not a number is ignored rather than turned into NaN — a stray comma
     * or an accidental letter must not poison the whole set.
     */
    function snumlist(text) {
      if (typeof text !== 'string' || text.trim() === '') return [];
      var out = [];
      text.split(/[\s,;]+/).forEach(function (piece) {
        if (piece === '') return;
        var n = Number(piece.replace(/(\d),(?=\d{3}\b)/g, '$1'));
        if (isFinite(n)) out.push(n);
      });
      return out;
    }
    
    /** Median of an already sorted array of numbers. */
    function smedian(sorted) {
      var n = sorted.length;
      if (!n) return NaN;
      var mid = Math.floor(n / 2);
      return n % 2 ? sorted[mid] : (sorted[mid - 1] + sorted[mid]) / 2;
    }
    
    /** The numbers a visitor actually typed, in field order, skipping blanks. */
    function snumbers(values, pattern, limit) {
      var out = [];
      for (var i = 1; i <= limit; i++) {
        var key = pattern.replace('%d', i);
        var raw = values[key];
        if (raw === undefined || raw === null || raw === '') continue;
        var n = Number(raw);
        if (!isFinite(n)) continue;
        out.push({ key: key, n: n });
      }
      return out;
    }
    
    /** A plain number, no trailing zeros, at most `d` decimals. */
    function snum(n, d) {
      if (!isFinite(n)) return '—';
      var v = Number(n.toFixed(d === undefined ? 4 : d));
      return String(v);
    }
    
    /** Round to `d` decimals but keep it a number. */
    function sround(n, d) {
      var f = Math.pow(10, d === undefined ? 2 : d);
      return Math.round(n * f) / f;
    }
    
    /** Greatest common divisor of two whole numbers. */
    function sgcd(x, y) {
      x = Math.abs(Math.round(x));
      y = Math.abs(Math.round(y));
      return y === 0 ? x : sgcd(y, x % y);
    }
    
    /** "10" / "1/3" — a fraction reduced to lowest terms. */
    function sfrac(part, whole) {
      if (!whole) return '—';
      var a = Math.round(part), b = Math.round(whole);
      var g = sgcd(a, b) || 1;
      if (g > 1) { a = a / g; b = b / g; }
      return b === 1 ? String(a) : a + '/' + b;
    }
    
    /** Minimal escape for text that came out of the definition or a label. */
    function sesc(s) {
      return String(s).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
    }
    
    /**
     * A table from a header list and rows of cells. Cells are printed as they are
     * given, so a caller can pass a pre-formatted string.
     */
    function stable(head, rows, foot) {
      var html = '<table><thead><tr>';
      head.forEach(function (h) { html += '<th>' + h + '</th>'; });
      html += '</tr></thead><tbody>';
      rows.forEach(function (r) {
        html += '<tr>';
        r.forEach(function (c) { html += '<td>' + c + '</td>'; });
        html += '</tr>';
      });
      if (foot) {
        html += '<tr>';
        foot.forEach(function (c) { html += '<th>' + c + '</th>'; });
        html += '</tr>';
      }
      return html + '</tbody></table>';
    }
    
    /** Turn a list of [label, value] pairs into "A: 3, B: 4" style prose. */
    function slist(pairs) {
      return pairs.map(function (p) { return p[0] + ': ' + p[1]; }).join(', ');
    }
    
    /**
     * Tidy a value a page script published.
     *
     * The harvested scripts speak the reference site's front-end dialect: `==2==`
     * for a subscript, `**bold**`, `<br>` between lines, and often a trailing
     * comma or a dangling colon left where a second half of a sentence used to
     * follow. Our panel prints the string as plain text, so those markers would
     * land on screen as punctuation soup. This turns them into something readable
     * without changing the value itself.
     */
    function sclean(value) {
      var s = value === null || value === undefined ? '' : String(value);
      var sub = {'0': '₀', '1': '₁', '2': '₂', '3': '₃', '4': '₄',
                 '5': '₅', '6': '₆', '7': '₇', '8': '₈', '9': '₉'};
      s = s.replace(/==(\d+)==/g, function (all, d) {
        return d.split('').map(function (c) { return sub[c] || c; }).join('');
      });
      /* the same convention for superscripts: "^^+^^" is a charge, "^^2^^" an index */
      var sup = {'0': '⁰', '1': '¹', '2': '²', '3': '³', '4': '⁴',
                 '5': '⁵', '6': '⁶', '7': '⁷', '8': '⁸', '9': '⁹',
                 '+': '⁺', '-': '⁻'};
      s = s.replace(/\^\^([0-9+-]+)\^\^/g, function (all, d) {
        return d.split('').map(function (c) { return sup[c] || c; }).join('');
      });
      s = s.replace(/\*\*(.+?)\*\*/g, '$1');
      s = s.replace(/<br\s*\/?>/gi, ' ');
      s = s.replace(/<\/(p|div|li)>/gi, ' ');
      s = s.replace(/<[^>]+>/g, '');
      s = s.replace(/&nbsp;/g, ' ').replace(/&lt;/g, '<').replace(/&gt;/g, '>').replace(/&amp;/g, '&');
      /* invisible characters the reference used as "this line is blank": an Arabic
         letter mark, a zero-width space, a byte-order mark. They render as nothing
         and would otherwise keep an empty row looking filled. */
      s = s.replace(/[\u061C\u200B\u200C\u200D\uFEFF\u00AD]/g, '');
      s = s.replace(/\s+/g, ' ').trim();
      s = s.replace(/[,;:\-–—]\s*$/, '').trim();
      return s;
    }
    
    /**
     * Turn a drop-down option's id back into its label.
     *
     * Several harvested scripts publish `ctx.getRawInput("…")` of a select, which
     * is the option's uid (`z3nTqAbVhlMSz-B46c7Xk`) and not the words the visitor
     * picked. The uid is in the page markup as an option value or a radio value,
     * so the label is one lookup away.
     */
    function sdelabel(value) {
      if (typeof value !== 'string' || !/[A-Za-z0-9_-]{20,28}/.test(value)) { return value; }
      var one = function (id) {
        if (!/^[A-Za-z0-9_-]{20,28}$/.test(id)) { return id; }
        var el = document.querySelector('[value="' + id + '"]');
        if (!el) { return id; }
        if (el.tagName === 'OPTION') { return (el.textContent || '').trim() || id; }
        var lab = el.closest ? el.closest('label') : null;
        return lab ? ((lab.textContent || '').trim() || id) : id;
      };
      /* a published value can be several ids joined by commas ("Possibilities,
         MD4, NTLM"), so map each piece rather than the whole string */
      return value.split(/\s*,\s*/).map(one).join(', ');
    }
    
    omni.onResult(['subject'], function (ctx, values) {
      /* The helper leaves every slot it does not use at zero; a zero balance or a
         zero deposit is not an answer, it is the absence of one. */
      ['Balance_total', 'Balance_interest', 'Final_real', 'contributions_total',
       'total_principal'].forEach(function (n) {
        var v = Number(values[n]);
        if (!isFinite(v) || v === 0) { ctx.exportValue(n, null); }
      });
    });
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Investment works out Total balance and Of which interest from I would like to know…, Desired Balance and Initial Investment. Nothing is looked up on this page: total balance is computed from i would like to know… and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Investment calculator works', 'html' => <<<'TXT'
            <p>Investment answers one question from 12 numbers, and the answer is Total balance, Of which interest and Balance in today&#039;s money.</p><p>Written with the labels from the form, Periodic Growth Rate = (Annual Growth Rate + 1)^(1 ÷ How often?) − 1.</p><p>The answers are Total balance, Of which interest, Balance in today&#039;s money and Total of the additional deposits; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 12 boxes and the page has everything it needs.</p><ul><li><strong>I would like to know…</strong> — a plain number, no unit</li><li><strong>Desired Balance</strong> — in USD. The future value (FV) of your investment. Note that it will be your desired inflation-adjusted balance if you provide the annual inflation.</li><li><strong>Initial Investment</strong> — in USD. The initial balance at the beginning of the investment term.</li><li><strong>Rate of return</strong> — in percent. Yearly nominal interest rate.</li><li><strong>Term</strong> — in years. The time frame of your investment.</li><li><strong>Compound frequency</strong> — a plain number, no unit. Here you can set how often the interest is calculated on your balance.</li><li><strong>Annual inflation rate</strong> — in percent. Here you can set the expected average yearly inflation rate over the timespan of your investment.</li><li><strong>How much?</strong> — in USD. The amount of additional periodic contribution to your initial investment.</li><li><strong>How often?</strong> — a plain number, no unit. Here you can set the regularity of payments if you wish to set a periodic contribution.</li><li><strong>When?</strong> — a plain number, no unit. Here you can set the timing of the periodic contribution.</li><li><strong>Annual Growth Rate</strong> — in percent. The percentage growth rate of your periodic contribution over a year.</li><li><strong>Periodic Growth Rate</strong> — in percent. The percentage growth rate of your periodic contribution. Note that periodic and annual growth rates are linked together: if you set one, the other will be calculated according to the regularity of your contribution.</li></ul><p>What you get back is Total balance, Of which interest, Balance in today&#039;s money, Total of the additional deposits, Total principal (initial plus deposits), shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, I would like to know… = 1.139e+9, Desired Balance = 200000 USD, Initial Investment = 10000 USD, Rate of return = 5 perc, Term = 10 yrs, Compound frequency = 1.312e+8, Annual inflation rate = 7 perc, How much? = 1000 USD and When? = 1 gives <strong>How often?</strong> = 1000, <strong>Desired Balance</strong> = 2.000e+6, <strong>Depositbal</strong> = 0 and <strong>Principalbal</strong> = 0.</p><ul><li><strong>How often?</strong> = 1000</li><li><strong>Desired Balance</strong> = 2.000e+6</li><li><strong>Depositbal</strong> = 0</li><li><strong>Principalbal</strong> = 0</li></ul><p>The line behind those figures is <strong>Periodic Growth Rate</strong> = <code>(Annual Growth Rate + 1)^(1 ÷ How often?) − 1</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>How often?</strong> = 1000, <strong>Desired Balance</strong> = 2.000e+6, <strong>Depositbal</strong> = 0 and <strong>Principalbal</strong> = 0. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Rate of return lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Periodic Growth Rate</strong> = <code>(Annual Growth Rate + 1)^(1 ÷ How often?) − 1</code></li><li><strong>How often?</strong> = <code>ln(Annual Growth Rate + 1) ÷ ln(Periodic Growth Rate + 1)</code></li><li><strong>Annual Growth Rate</strong> = <code>(Periodic Growth Rate + 1)^(How often?) − 1</code></li><li><strong>Vis final bal adj</strong> = <code>check_visibility(Var1, How often?, 0)</code></li><li><strong>Vis final bal</strong> = <code>check_visibility(Var1, How often?, 1)</code></li><li><strong>Vis initial dep</strong> = <code>check_visibility(Var1, How often?, 2)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Periodic Growth Rate</strong> = <code>(Annual Growth Rate + 1)^(1 ÷ How often?) − 1</code> — the form to use when Annual Growth Rate and How often? are the values you have.</li><li><strong>How often?</strong> = <code>ln(Annual Growth Rate + 1) ÷ ln(Periodic Growth Rate + 1)</code> — the form to use when Annual Growth Rate and Periodic Growth Rate are the values you have.</li><li><strong>Annual Growth Rate</strong> = <code>(Periodic Growth Rate + 1)^(How often?) − 1</code> — the form to use when Periodic Growth Rate and How often? are the values you have.</li><li><strong>Vis final bal adj</strong> = <code>check_visibility(Var1, How often?, 0)</code> — the form to use when Var1 and How often? are the values you have.</li><li><strong>Vis final bal</strong> = <code>check_visibility(Var1, How often?, 1)</code> — the form to use when Var1 and How often? are the values you have.</li><li><strong>Vis initial dep</strong> = <code>check_visibility(Var1, How often?, 2)</code> — the form to use when Var1 and How often? are the values you have.</li><li><strong>Vis periodic dep</strong> = <code>check_visibility(Var1, How often?, 3)</code> — the form to use when Var1 and How often? are the values you have.</li><li><strong>Vis t</strong> = <code>check_visibility(Var1, How often?, 4)</code> — the form to use when Var1 and How often? are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Periodic Growth Rate, How often? and Annual Growth Rate can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — I would like to know..., from 1.139e+9 to 2.277e+9 — and the answers go from <strong>How often?</strong> 1000, <strong>Desired Balance</strong> 2.000e+6, <strong>Depositbal</strong> 0 and <strong>Principalbal</strong> 0 to <strong>How often?</strong> 1000, <strong>Desired Balance</strong> 2.000e+6, <strong>Depositbal</strong> 0 and <strong>Principalbal</strong> 0.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Rate of return, Term and Annual inflation rate carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Total balance, Of which interest and Balance in today&#039;s money are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>I would like to know… left as a guess.</strong> Anything typed into I would like to know… is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Desired Balance left as a guess.</strong> Anything typed into Desired Balance is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If I would like to know... is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need I would like to know…, Desired Balance, Initial Investment and Rate of return. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type I would like to know… into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Total balance with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Total balance is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The chips cover percent and years. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It counts in whole days.</strong> The differences are counted in whole days, so an answer is a date or a number of days rather than an interval in hours. Expect a day&#039;s uncertainty if the event itself happened at an unknown time.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are I would like to know…, Desired Balance and Initial Investment and the number you are missing is Total balance and Of which interest.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/florida-overtime">Florida overtime Calculator</a>, <a href="/finance/florida-sales-tax">Florida sales tax Calculator</a> and <a href="/finance/forward-premium">Forward premium</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Investment calculator work out?', 'a' => <<<'TXT'
            Total balance, Of which interest, Balance in today's money and Total of the additional deposits, from Annual Growth Rate and How often?. The relationship is Periodic Growth Rate = (Annual Growth Rate + 1)^(1 ÷ How often?) − 1.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            I would like to know…, Desired Balance (USD), Initial Investment (USD), Rate of return (percent), Term (years). With i would like to know…, desired Balance and initial Investment in place, Total balance can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Periodic Growth Rate, How often?, Annual Growth Rate and Vis final bal adj can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            How often? = 1000, Desired Balance = 2.000e+6, Depositbal = 0 and Principalbal = 0. Those are the defaults written into the form — move I would like to know... and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Total balance is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With I would like to know... left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Total balance keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/florida-overtime', 'name' => 'Florida overtime Calculator'],
            ['path' => '/finance/florida-sales-tax', 'name' => 'Florida sales tax Calculator'],
            ['path' => '/finance/forward-premium', 'name' => 'Forward premium'],
        ],
        'authors' => [],
    ],
];
