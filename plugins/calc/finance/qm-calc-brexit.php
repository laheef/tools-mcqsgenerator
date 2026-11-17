<?php

/**
 * Brexit
 * /finance/brexit
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Brexit',
    'meta' => ['title' => 'Brexit Calculator — Formula, Units & Example', 'description' => 'Brexit takes since referendum till..., cost before 1/1/20 and cost post 1/1/20 and returns current cost and total government spending. A worked example follows.', 'h1' => 'Brexit Calculator', 'updated' => '2026-09-08'],
    'raw' => [
        'vars' => [
            'advanced_mode' => ['type' => 'valueSelect', 'rnd' => null, 'ds' => 'HISX43KExRFFLfpsg9JI_'],
            'ambulance' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'animals' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'banksy' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
            'cost' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
            'current' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
            'divorce_bill' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
                'dfl' => [
                    ['v' => '32900000000', 'c' => null],
                ],
            ],
            'divorce_just' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'pAm7NMLR4-2Rn-fuxRxZC', 'c' => null],
                ],
                'ds' => '694',
            ],
            'elect' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
                'dfl' => [
                    ['v' => '140850000', 'c' => null],
                ],
            ],
            'eu_election' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
                'dfl' => [
                    ['v' => '156000000', 'c' => null],
                ],
            ],
            'gov_spending' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
                'dfl' => [
                    ['v' => '6300000000', 'c' => null],
                ],
            ],
            'hospitals' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
            'income' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
            'meals_homeless' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
            'miles_hs2' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
            'neymar' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
            'nurse' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'police_officers' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'recyling' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
            'ref' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
                'dfl' => [
                    ['v' => '129100000', 'c' => null],
                ],
            ],
            'rubbish_times' => [
                'type' => 'presentation',
                'rnd' => ['standard', '0'],
            ],
            'school' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
            'secondary_school_teacher' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'spacex' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
            'theresa' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'today_date' => ['type' => 'datetime', 'rnd' => null],
            'total_gov' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
            'trees' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
            'twentynineteen_elect' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
                'dfl' => [
                    ['v' => '140000000', 'c' => null],
                ],
            ],
            'weekly_cost' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
                'dfl' => [
                    ['v' => '440000000', 'c' => null],
                ],
            ],
            'weekly_cost2' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
                'dfl' => [
                    ['v' => '1346154000', 'c' => null],
                ],
            ],
            'wind_turbine' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
            'wind_up' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
                'dfl' => [
                    ['v' => '4600000', 'c' => null],
                ],
            ],
        ],
        'groups' => [
            [
                'uid' => 'AodS8kY342zIjchgUv8-5',
                'title' => 'How much has the Brexit cost?',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'today_date', 'vt' => 'datetime', 'l' => 'Since referendum till...'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'current',
                                    'vt' => 'numerical',
                                    'l' => 'Current cost',
                                    'pre' => '£',
                                    'h' => <<<'TXT'
                                    As uncertainty changed with time, with reflected this in our calculator by having two different costs to the UK's GDP. Please hit advanced mode at the bottom of this calculator if you wish to change these values, and visit the "Lost potential" section in the text for an explanation.
                                    TXT,
                                    'us' => '19',
                                    'du' => 'wk',
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
                                    'n' => 'weekly_cost',
                                    'vt' => 'numerical',
                                    'l' => 'Cost before 1/1/20',
                                    'pre' => '£',
                                    'h' => 'According to the Bank of England.',
                                    'us' => '19',
                                    'du' => 'wk',
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
                                    'n' => 'weekly_cost2',
                                    'vt' => 'numerical',
                                    'l' => 'Cost post 1/1/20',
                                    'pre' => '£',
                                    'h' => 'According to Bloomberg Economics, an addition £70 billion will be added by the end of 2020.',
                                    'us' => '19',
                                    'du' => 'wk',
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
                                    'n' => 'total_gov',
                                    'vt' => 'numerical',
                                    'l' => 'Total government spending',
                                    'pre' => '£',
                                    'h' => 'Click advanced mode at the bottom of the calculator for a breakdown of this number.',
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
                                    'n' => 'ref',
                                    'vt' => 'numerical',
                                    'l' => 'EU referendum',
                                    'pre' => '£',
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
                                    'n' => 'elect',
                                    'vt' => 'numerical',
                                    'l' => '2017 general election',
                                    'pre' => '£',
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
                                    'n' => 'wind_up',
                                    'vt' => 'numerical',
                                    'l' => 'Ex-MP \'winding up\' costs',
                                    'pre' => '£',
                                    'h' => 'The money MPs voted out of office claimed to move out of offices and offer redundancy pay.',
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
                                    'n' => 'gov_spending',
                                    'vt' => 'numerical',
                                    'l' => 'Governmental Brexit preparations',
                                    'pre' => '£',
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
                                    'n' => 'eu_election',
                                    'vt' => 'numerical',
                                    'l' => '2019 EU elections',
                                    'pre' => '£',
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
                                    'n' => 'twentynineteen_elect',
                                    'vt' => 'numerical',
                                    'l' => '2019 general election',
                                    'pre' => '£',
                                    'h' => 'Current figure unknown, estimated to be roughly the same as the 2017 general election.',
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
                                    'n' => 'divorce_just',
                                    'vt' => 'valueSelect',
                                    'l' => 'Is the divorce bill justified?',
                                    'h' => 'Is the £32.9 billion that the UK has to pay to the EU as part of the divorce bill money that the UK would have paid to the EU anyway?',
                                    'ds' => '694',
                                    'opts' => [
                                        ['pAm7NMLR4-2Rn-fuxRxZC', 'Yes', '0'],
                                        ['_MNvTUjJL5trsAuhCTXio', 'No', '1'],
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
                                    'n' => 'divorce_bill',
                                    'vt' => 'numerical',
                                    'l' => 'Divorce bill',
                                    'pre' => '£',
                                    'h' => 'Payments to Brussels in pensions liabilities, as stipulated in the divorce bill.',
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
                                    'n' => 'cost',
                                    'vt' => 'numerical',
                                    'l' => 'Cost so far',
                                    'pre' => '£',
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
                                    'n' => 'advanced_mode',
                                    'vt' => 'valueSelect',
                                    'l' => 'Do you want to view and edit cost details?',
                                    'ds' => 'HISX43KExRFFLfpsg9JI_',
                                    'opts' => [
                                        ['c33jV9VnRZ17hyGDlnCnk', 'Yeap!', '1'],
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
                                        [null, <<<'TXT'
                                        Hit refresh, the cost has gone up since you loaded the page. For all sources regarding this data, check the sources and explaination for data section at the bottom of the page.
                                        TXT],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'FP7IF5fHpKL2BdF7fkd_M',
                'title' => 'How could we use the money instead?',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'x',
                                    'c' => [
                                        [null, 'We could build...'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'hospitals', 'vt' => 'numerical', 'l' => 'Hospitals '],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'school', 'vt' => 'numerical', 'l' => 'Schools '],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'wind_turbine', 'vt' => 'numerical', 'l' => 'Large wind turbines '],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'miles_hs2', 'vt' => 'numerical', 'l' => 'Miles of HS2 '],
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
                                        [null, 'Or fund...'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'meals_homeless', 'vt' => 'numerical', 'l' => 'Meals for children '],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'trees', 'vt' => 'numerical', 'l' => 'Trees planted '],
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
                                        [null, 'Or recycle...'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'recyling', 'vt' => 'numerical', 'l' => 'Tonnes of rubbish '],
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
                                        [null, 'This much rubbish is roughly equivalent to {{rubbish_times.formattedValue}} times the area of France.'],
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
                                        [null, 'Or buy...'],
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
                                    'n' => 'banksy',
                                    'vt' => 'numerical',
                                    'l' => 'Freddos ',
                                    'h' => 'At 30p per Freddo. This figure has likely gone up since this calculator was created.',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'ambulance', 'vt' => 'numerical', 'l' => 'Ambulances '],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'animals', 'vt' => 'numerical', 'l' => 'New London buses * '],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'spacex', 'vt' => 'numerical', 'l' => 'SpaceX Dragons '],
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
                                        [null, 'Or hire...'],
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
                                    'n' => 'nurse',
                                    'vt' => 'numerical',
                                    'l' => 'Nurses ‍',
                                    'h' => 'The amount of people we could hire for their entire working life - 5 years for the Prime Minister and 40 for everyone else.',
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
                                    'n' => 'police_officers',
                                    'vt' => 'numerical',
                                    'l' => 'Police officers ',
                                    'h' => 'For 10 years',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'secondary_school_teacher', 'vt' => 'numerical', 'l' => 'School teachers ‍'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'theresa',
                                    'vt' => 'numerical',
                                    'l' => 'Boris Johnsons ',
                                    'h' => 'For a 5 year term',
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
                                        [null, '* Arriving 4 at a time, 20 minutes late, of course.'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'BU6TEMWINQrGnbZj5f8u_',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'neymar', 'vt' => 'numerical', 'l' => 'Neymars '],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'income',
                                    'vt' => 'numerical',
                                    'l' => '',
                                    'suf' => 'basic incomes at £1k/mo for life ',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'rubbish_times', 'vt' => 'presentation', 'l' => ''],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'cost = true_cost(today_date, weekly_cost, weekly_cost2, total_gov, divorce_bill, divorce_just) ',
                'var' => [
                    [
                        'l' => 'cost',
                        'f' => 'true_cost(today_date, weekly_cost, weekly_cost2, total_gov, divorce_bill, divorce_just)',
                        'r' => [
                            'divorce_bill',
                            'divorce_just',
                            'today_date',
                            'total_gov',
                            'weekly_cost',
                            'weekly_cost2',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'meals_homeless = one_way(cost / 8)',
                'var' => [
                    [
                        'l' => 'meals_homeless',
                        'f' => '((1/8)*true_cost(today_date, weekly_cost, weekly_cost2, total_gov, divorce_bill, divorce_just))',
                        'r' => [
                            'divorce_bill',
                            'divorce_just',
                            'today_date',
                            'total_gov',
                            'weekly_cost',
                            'weekly_cost2',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'hospitals = one_way(cost / 90000000)',
                'var' => [
                    [
                        'l' => 'hospitals',
                        'f' => '((1/90000000)*true_cost(today_date, weekly_cost, weekly_cost2, total_gov, divorce_bill, divorce_just))',
                        'r' => [
                            'divorce_bill',
                            'divorce_just',
                            'today_date',
                            'total_gov',
                            'weekly_cost',
                            'weekly_cost2',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'wind_turbine = one_way(cost / 3130000)',
                'var' => [
                    [
                        'l' => 'wind_turbine',
                        'f' => '((1/3130000)*true_cost(today_date, weekly_cost, weekly_cost2, total_gov, divorce_bill, divorce_just))',
                        'r' => [
                            'divorce_bill',
                            'divorce_just',
                            'today_date',
                            'total_gov',
                            'weekly_cost',
                            'weekly_cost2',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'police_officers = one_way(cost/ (19971*40))',
                'var' => [
                    [
                        'l' => 'police_officers',
                        'f' => '((1/798840)*true_cost(today_date, weekly_cost, weekly_cost2, total_gov, divorce_bill, divorce_just))',
                        'r' => [
                            'divorce_bill',
                            'divorce_just',
                            'today_date',
                            'total_gov',
                            'weekly_cost',
                            'weekly_cost2',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'miles_hs2 = one_way(cost / 403000000)',
                'var' => [
                    [
                        'l' => 'miles_hs2',
                        'f' => '((1/403000000)*true_cost(today_date, weekly_cost, weekly_cost2, total_gov, divorce_bill, divorce_just))',
                        'r' => [
                            'divorce_bill',
                            'divorce_just',
                            'today_date',
                            'total_gov',
                            'weekly_cost',
                            'weekly_cost2',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'secondary_school_teacher = one_way(cost/ (23720*40))',
                'var' => [
                    [
                        'l' => 'secondary_school_teacher',
                        'f' => '((1/948800)*true_cost(today_date, weekly_cost, weekly_cost2, total_gov, divorce_bill, divorce_just))',
                        'r' => [
                            'divorce_bill',
                            'divorce_just',
                            'today_date',
                            'total_gov',
                            'weekly_cost',
                            'weekly_cost2',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'nurse = one_way(cost/ (22128*40))',
                'var' => [
                    [
                        'l' => 'nurse',
                        'f' => '((1/885120)*true_cost(today_date, weekly_cost, weekly_cost2, total_gov, divorce_bill, divorce_just))',
                        'r' => [
                            'divorce_bill',
                            'divorce_just',
                            'today_date',
                            'total_gov',
                            'weekly_cost',
                            'weekly_cost2',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'neymar = one_way(cost / 200000000)',
                'var' => [
                    [
                        'l' => 'neymar',
                        'f' => '((1/200000000)*true_cost(today_date, weekly_cost, weekly_cost2, total_gov, divorce_bill, divorce_just))',
                        'r' => [
                            'divorce_bill',
                            'divorce_just',
                            'today_date',
                            'total_gov',
                            'weekly_cost',
                            'weekly_cost2',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'spacex = one_way(cost / 697473983)',
                'var' => [
                    [
                        'l' => 'spacex',
                        'f' => '((1/697473983)*true_cost(today_date, weekly_cost, weekly_cost2, total_gov, divorce_bill, divorce_just))',
                        'r' => [
                            'divorce_bill',
                            'divorce_just',
                            'today_date',
                            'total_gov',
                            'weekly_cost',
                            'weekly_cost2',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'banksy = one_way(cost / 0.30)',
                'var' => [
                    [
                        'l' => 'banksy',
                        'f' => '((10/3)*true_cost(today_date, weekly_cost, weekly_cost2, total_gov, divorce_bill, divorce_just))',
                        'r' => [
                            'divorce_bill',
                            'divorce_just',
                            'today_date',
                            'total_gov',
                            'weekly_cost',
                            'weekly_cost2',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'animals = one_way(cost / 355000)',
                'var' => [
                    [
                        'l' => 'animals',
                        'f' => '((1/355000)*true_cost(today_date, weekly_cost, weekly_cost2, total_gov, divorce_bill, divorce_just))',
                        'r' => [
                            'divorce_bill',
                            'divorce_just',
                            'today_date',
                            'total_gov',
                            'weekly_cost',
                            'weekly_cost2',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'income = one_way(cost / 744000)',
                'var' => [
                    [
                        'l' => 'income',
                        'f' => '((1/744000)*true_cost(today_date, weekly_cost, weekly_cost2, total_gov, divorce_bill, divorce_just))',
                        'r' => [
                            'divorce_bill',
                            'divorce_just',
                            'today_date',
                            'total_gov',
                            'weekly_cost',
                            'weekly_cost2',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'theresa = one_way(cost/ (151451*5))',
                'var' => [
                    [
                        'l' => 'theresa',
                        'f' => '((1/757255)*true_cost(today_date, weekly_cost, weekly_cost2, total_gov, divorce_bill, divorce_just))',
                        'r' => [
                            'divorce_bill',
                            'divorce_just',
                            'today_date',
                            'total_gov',
                            'weekly_cost',
                            'weekly_cost2',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'recyling = one_way(cost / 171.96)',
                'var' => [
                    [
                        'l' => 'recyling',
                        'f' => '((25/4299)*true_cost(today_date, weekly_cost, weekly_cost2, total_gov, divorce_bill, divorce_just))',
                        'r' => [
                            'divorce_bill',
                            'divorce_just',
                            'today_date',
                            'total_gov',
                            'weekly_cost',
                            'weekly_cost2',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'trees = one_way(cost / 1.18)',
                'var' => [
                    [
                        'l' => 'trees',
                        'f' => '((50/59)*true_cost(today_date, weekly_cost, weekly_cost2, total_gov, divorce_bill, divorce_just))',
                        'r' => [
                            'divorce_bill',
                            'divorce_just',
                            'today_date',
                            'total_gov',
                            'weekly_cost',
                            'weekly_cost2',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'total_gov = ref+elect+wind_up+gov_spending+eu_election+twentynineteen_elect',
                'var' => [
                    [
                        'l' => 'ref',
                        'f' => '-elect - eu_election - gov_spending + total_gov - twentynineteen_elect - wind_up',
                        'r' => [
                            'twentynineteen_elect',
                            'eu_election',
                            'total_gov',
                            'elect',
                            'wind_up',
                            'gov_spending',
                        ],
                    ],
                    [
                        'l' => 'twentynineteen_elect',
                        'f' => '-elect - eu_election - gov_spending - ref + total_gov - wind_up',
                        'r' => [
                            'ref',
                            'eu_election',
                            'total_gov',
                            'elect',
                            'wind_up',
                            'gov_spending',
                        ],
                    ],
                    [
                        'l' => 'eu_election',
                        'f' => '-elect - gov_spending - ref + total_gov - twentynineteen_elect - wind_up',
                        'r' => [
                            'ref',
                            'twentynineteen_elect',
                            'total_gov',
                            'elect',
                            'wind_up',
                            'gov_spending',
                        ],
                    ],
                    [
                        'l' => 'total_gov',
                        'f' => 'elect + eu_election + gov_spending + ref + twentynineteen_elect + wind_up',
                        'r' => [
                            'ref',
                            'twentynineteen_elect',
                            'eu_election',
                            'elect',
                            'wind_up',
                            'gov_spending',
                        ],
                    ],
                    [
                        'l' => 'elect',
                        'f' => '-eu_election - gov_spending - ref + total_gov - twentynineteen_elect - wind_up',
                        'r' => [
                            'ref',
                            'twentynineteen_elect',
                            'eu_election',
                            'total_gov',
                            'wind_up',
                            'gov_spending',
                        ],
                    ],
                    [
                        'l' => 'wind_up',
                        'f' => '-elect - eu_election - gov_spending - ref + total_gov - twentynineteen_elect',
                        'r' => [
                            'ref',
                            'twentynineteen_elect',
                            'eu_election',
                            'total_gov',
                            'elect',
                            'gov_spending',
                        ],
                    ],
                    [
                        'l' => 'gov_spending',
                        'f' => '-elect - eu_election - ref + total_gov - twentynineteen_elect - wind_up',
                        'r' => [
                            'ref',
                            'twentynineteen_elect',
                            'eu_election',
                            'total_gov',
                            'elect',
                            'wind_up',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'ambulance = one_way(cost/250000)',
                'var' => [
                    [
                        'l' => 'ambulance',
                        'f' => '((1/250000)*true_cost(today_date, weekly_cost, weekly_cost2, total_gov, divorce_bill, divorce_just))',
                        'r' => [
                            'divorce_bill',
                            'divorce_just',
                            'today_date',
                            'total_gov',
                            'weekly_cost',
                            'weekly_cost2',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'school = one_way(cost/35000000)',
                'var' => [
                    [
                        'l' => 'school',
                        'f' => '((1/35000000)*true_cost(today_date, weekly_cost, weekly_cost2, total_gov, divorce_bill, divorce_just))',
                        'r' => [
                            'divorce_bill',
                            'divorce_just',
                            'today_date',
                            'total_gov',
                            'weekly_cost',
                            'weekly_cost2',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'current = current_cost(today_date, weekly_cost, weekly_cost2)',
                'var' => [
                    [
                        'l' => 'current',
                        'f' => 'current_cost(today_date, weekly_cost, weekly_cost2)',
                        'r' => ['today_date', 'weekly_cost', 'weekly_cost2'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            '694' => [
                'name' => 'cost350',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'pAm7NMLR4-2Rn-fuxRxZC', 'label' => 'Yes', 'value' => '0'],
                    ['uid' => '_MNvTUjJL5trsAuhCTXio', 'label' => 'No', 'value' => '1'],
                ],
            ],
            'HISX43KExRFFLfpsg9JI_' => [
                'name' => 'advanced_mode',
                'uiType' => 'CHECKBOX',
                'options' => [
                    ['uid' => 'c33jV9VnRZ17hyGDlnCnk', 'label' => 'Yeap!', 'value' => '1'],
                ],
            ],
        ],
        'js' => <<<'TXT'
        "use strict";omni.define("true_cost",function(date,weekly_cost,weekly_cost2,total_gov,divorce_bill,divorce_just){console.log(date,weekly_cost,weekly_cost2,total_gov,divorce_bill,divorce_just);if(date>=1577833230){return mathjs.bignumber(weekly_cost*(1577833230-1466726400)/(86400*7)+weekly_cost2*(date-1577833230)/(86400*7)+(total_gov+divorce_just*divorce_bill))}else if(date<1577833230){return mathjs.bignumber(weekly_cost*(date-1466726400)/(86400*7)+(total_gov+divorce_just*divorce_bill))}else{return 0}});omni.define("current_cost",function(date,weekly_cost,weekly_cost2){if(date>=1577833230){return weekly_cost2}else{return weekly_cost}});//# sourceURL=customJs.js
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        Brexit works out Current cost and EU referendum from Since referendum till…, Cost before 1/1/20 and Cost post 1/1/20. It is a single relationship that reads current cost out of since referendum till…, not a table of canned results keyed by them. Units for Current cost default to weeks and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Brexit calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Brexit: it takes 6 numbers and reports Current cost, EU referendum and 2017 general election.</p><p>Written with the labels from the form, Cost so far = true_cost(Since referendum till..., Cost before 1/1/20, Cost post 1/1/20, Total government spending, Divorce bill, Is the divorce bill justified?).</p><p>What comes back is Current cost, EU referendum, 2017 general election and Ex-MP &#039;winding up&#039; costs — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 6 boxes and the page has everything it needs.</p><ul><li><strong>Since referendum till…</strong> — a plain number, no unit</li><li><strong>Cost before 1/1/20</strong> — in weeks. According to the Bank of England.</li><li><strong>Cost post 1/1/20</strong> — in weeks. According to Bloomberg Economics, an addition £70 billion will be added by the end of 2020.</li><li><strong>Total government spending</strong> — a plain number, no unit. Click advanced mode at the bottom of the calculator for a breakdown of this number.</li><li><strong>Is the divorce bill justified?</strong> — a plain number, no unit. Is the £32.9 billion that the UK has to pay to the EU as part of the divorce bill money that the UK would have paid to the EU anyway?</li><li><strong>Divorce bill</strong> — a plain number, no unit. Payments to Brussels in pensions liabilities, as stipulated in the divorce bill.</li></ul><p>The answers come back as Current cost in weeks, EU referendum, 2017 general election, Ex-MP &#039;winding up&#039; costs, Governmental Brexit preparations, 2019 EU elections, 2019 general election, Cost so far, Hospitals, Schools, Large wind turbines, Miles of HS2, Meals for children, Trees planted, Tonnes of rubbish, Freddos, Ambulances, New London buses *, SpaceX Dragons, Nurses ‍, Police officers, School teachers ‍, Boris Johnsons, Neymars, Income in basic incomes at £1k/mo for life. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>The unit chip on Current cost lists 5 options and opens on weeks. Moving it changes the conversion applied to that row, not the number stored behind it.</p>'],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Cost so far</strong> = <code>true_cost(Since referendum till..., Cost before 1/1/20, Cost post 1/1/20, Total government spending, Divorce bill, Is the divorce bill justified?)</code></li><li><strong>Meals for children</strong> = <code>((1 ÷ 8) × true_cost(Since referendum till..., Cost before 1/1/20, Cost post 1/1/20, Total government spending, Divorce bill, Is the divorce bill justified?))</code></li><li><strong>Hospitals</strong> = <code>((1 ÷ 90000000) × true_cost(Since referendum till..., Cost before 1/1/20, Cost post 1/1/20, Total government spending, Divorce bill, Is the divorce bill justified?))</code></li><li><strong>Large wind turbines</strong> = <code>((1 ÷ 3130000) × true_cost(Since referendum till..., Cost before 1/1/20, Cost post 1/1/20, Total government spending, Divorce bill, Is the divorce bill justified?))</code></li><li><strong>Police officers</strong> = <code>((1 ÷ 798840) × true_cost(Since referendum till..., Cost before 1/1/20, Cost post 1/1/20, Total government spending, Divorce bill, Is the divorce bill justified?))</code></li><li><strong>Miles of HS2</strong> = <code>((1 ÷ 403000000) × true_cost(Since referendum till..., Cost before 1/1/20, Cost post 1/1/20, Total government spending, Divorce bill, Is the divorce bill justified?))</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Cost so far</strong> = <code>true_cost(Since referendum till..., Cost before 1/1/20, Cost post 1/1/20, Total government spending, Divorce bill, Is the divorce bill justified?)</code> — the form to use when Divorce bill, Is the divorce bill justified?, Since referendum till… and Total government spending are the values you have.</li><li><strong>Meals for children</strong> = <code>((1 ÷ 8) × true_cost(Since referendum till..., Cost before 1/1/20, Cost post 1/1/20, Total government spending, Divorce bill, Is the divorce bill justified?))</code> — the form to use when Divorce bill, Is the divorce bill justified?, Since referendum till… and Total government spending are the values you have.</li><li><strong>Hospitals</strong> = <code>((1 ÷ 90000000) × true_cost(Since referendum till..., Cost before 1/1/20, Cost post 1/1/20, Total government spending, Divorce bill, Is the divorce bill justified?))</code> — the form to use when Divorce bill, Is the divorce bill justified?, Since referendum till… and Total government spending are the values you have.</li><li><strong>Large wind turbines</strong> = <code>((1 ÷ 3130000) × true_cost(Since referendum till..., Cost before 1/1/20, Cost post 1/1/20, Total government spending, Divorce bill, Is the divorce bill justified?))</code> — the form to use when Divorce bill, Is the divorce bill justified?, Since referendum till… and Total government spending are the values you have.</li><li><strong>Police officers</strong> = <code>((1 ÷ 798840) × true_cost(Since referendum till..., Cost before 1/1/20, Cost post 1/1/20, Total government spending, Divorce bill, Is the divorce bill justified?))</code> — the form to use when Divorce bill, Is the divorce bill justified?, Since referendum till… and Total government spending are the values you have.</li><li><strong>Miles of HS2</strong> = <code>((1 ÷ 403000000) × true_cost(Since referendum till..., Cost before 1/1/20, Cost post 1/1/20, Total government spending, Divorce bill, Is the divorce bill justified?))</code> — the form to use when Divorce bill, Is the divorce bill justified?, Since referendum till… and Total government spending are the values you have.</li><li><strong>School teachers ‍</strong> = <code>((1 ÷ 948800) × true_cost(Since referendum till..., Cost before 1/1/20, Cost post 1/1/20, Total government spending, Divorce bill, Is the divorce bill justified?))</code> — the form to use when Divorce bill, Is the divorce bill justified?, Since referendum till… and Total government spending are the values you have.</li><li><strong>Nurses ‍</strong> = <code>((1 ÷ 885120) × true_cost(Since referendum till..., Cost before 1/1/20, Cost post 1/1/20, Total government spending, Divorce bill, Is the divorce bill justified?))</code> — the form to use when Divorce bill, Is the divorce bill justified?, Since referendum till… and Total government spending are the values you have.</li></ul><p>Any one of Cost so far, Meals for children and Hospitals can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Cost before 1/1/20 and Cost post 1/1/20 carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Current cost, EU referendum and 2017 general election are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Since referendum till… left as a guess.</strong> Anything typed into Since referendum till… is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Cost before 1/1/20 left as a guess.</strong> Anything typed into Cost before 1/1/20 is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Since referendum till... and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Brexit form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Since referendum till…</strong> takes a plain number with no unit attached. The page reads it when it works out Cost so far, Meals for children and Hospitals. Fill it from a measurement rather than a memory — Since referendum till… is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Cost before 1/1/20</strong> is a weeks quantity: the page opens it in wk and converts anything else you pick before the formula runs. According to the Bank of England. The page reads it when it works out Cost so far, Meals for children and Hospitals. Fill it from a measurement rather than a memory — Cost before 1/1/20 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Cost post 1/1/20</strong> is a weeks quantity: the page opens it in wk and converts anything else you pick before the formula runs. According to Bloomberg Economics, an addition £70 billion will be added by the end of 2020. The page reads it when it works out Cost so far, Meals for children and Hospitals. Fill it from a measurement rather than a memory — Cost post 1/1/20 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Total government spending</strong> takes a plain number with no unit attached. Click advanced mode at the bottom of the calculator for a breakdown of this number. The page reads it when it works out Cost so far, Meals for children and Hospitals. Fill it from a measurement rather than a memory — Total government spending is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Is the divorce bill justified?</strong> takes a plain number with no unit attached. Is the £32.9 billion that the UK has to pay to the EU as part of the divorce bill money that the UK would have paid to the EU anyway?. The page reads it when it works out Cost so far, Meals for children and Hospitals. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Is the divorce bill justified? is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Divorce bill</strong> takes a plain number with no unit attached. Payments to Brussels in pensions liabilities, as stipulated in the divorce bill. The page reads it when it works out Cost so far, Meals for children and Hospitals. Fill it from a measurement rather than a memory — Divorce bill is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Current cost is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are weeks and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It counts in whole days.</strong> Dates are compared as calendar days, not as moments: two dates that differ by a few hours on the same day give the same answer, and there is no time-of-day input to set.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Since referendum till…, Cost before 1/1/20 and Cost post 1/1/20 are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Since referendum till…, Cost before 1/1/20 and Cost post 1/1/20 and the number you are missing is Current cost and EU referendum.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/unlevered-free-cash-flow">Unlevered free cash flow Calculator</a>, <a href="/finance/unpaid-work">Unpaid work</a> and <a href="/finance/us-income-percentile">US income percentile Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Brexit calculator work out?', 'a' => <<<'TXT'
            Current cost, EU referendum, 2017 general election and Ex-MP 'winding up' costs, from Divorce bill, Is the divorce bill justified?, Since referendum till… and Total government spending. The relationship is Cost so far = true_cost(Since referendum till..., Cost before 1/1/20, Cost post 1/1/20, Total government spending, Divorce bill, Is the divorce bill justified?).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Since referendum till…, Cost before 1/1/20 (weeks), Cost post 1/1/20 (weeks), Total government spending, Is the divorce bill justified?. With since referendum till…, cost before 1/1/20 and cost post 1/1/20 in place, Current cost can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Cost so far, Meals for children, Hospitals and Large wind turbines blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Current cost is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Since referendum till... blank and the page solves for it, reporting Current cost instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Current cost at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/unlevered-free-cash-flow', 'name' => 'Unlevered free cash flow Calculator'],
            ['path' => '/finance/unpaid-work', 'name' => 'Unpaid work'],
            ['path' => '/finance/us-income-percentile', 'name' => 'US income percentile Calculator'],
        ],
        'authors' => [],
    ],
];
