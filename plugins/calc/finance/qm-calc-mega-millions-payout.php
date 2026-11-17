<?php

/**
 * Mega Millions payout
 * /finance/mega-millions-payout
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Mega Millions payout',
    'meta' => ['title' => 'Mega Millions payout — Free Online Calculator', 'description' => 'Mega Millions payout turns how much did you win?, annuity rate and what is your filing status? into lump sum before tax and federal withholding at 24%.', 'h1' => 'Mega Millions payout Calculator', 'updated' => '2026-07-13'],
    'raw' => [
        'vars' => [
            'CashRate' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '52', 'c' => null],
                ],
            ],
            'CompFreq' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'a7CjuYgnF--XN5TgHx7K4', 'c' => null],
                ],
                'ds' => 'gB4X-hhlDTIRp21Fk0xO_',
            ],
            'EndDate' => ['type' => 'date', 'rnd' => null],
            'FinBal' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'dfl' => [
                    ['v' => '0', 'c' => null],
                ],
                'min' => 2,
            ],
            'GrossCash' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
            ],
            'InDep' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '201000000', 'c' => null],
                ],
            ],
            'Infl' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '0', 'c' => null],
                ],
            ],
            'NetCash' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
            ],
            'NetCash_24' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'PerPay' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'dfl' => [
                    ['v' => '1000', 'c' => null],
                ],
                'min' => 2,
            ],
            'Rep' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'bq-C5scRFSIl-1rW62638', 'c' => null],
                ],
                'ds' => '0RTKfucYg95ufOXKlPoIu',
            ],
            'StartDate' => ['type' => 'date', 'rnd' => null],
            'Stat' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'DmOcXiEcAxzErUwFXiPwS', 'c' => null],
                ],
                'ds' => '0NVy-CcNEipy3oVrcM1jr',
            ],
            'Subject' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'j4xZkoA2ipplPPV6r_BvE', 'c' => null],
                ],
                'ds' => 'rL9X_qESTwbpYWMCvP6vx',
            ],
            'TableFreq' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'FQnDEUReQ-1ZUuUelCxAi', 'c' => null],
                ],
                'ds' => 'hRh9CKKkrL5vqh1t_mJu_',
            ],
            'TaxFedCash' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
            ],
            'TaxFedCash_24' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
            ],
            'TaxState' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'AN2ZyW14SVCStJ9ZEoBFn', 'c' => null],
                ],
                'ds' => 'cRC9B4n-C937vSlsg0fal',
            ],
            'TaxStateCash' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
            ],
            'Timing' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'DPR2EyUMqAhmO2lDfXuuK', 'c' => null],
                ],
                'ds' => '4U7ynE96TFgJUCDqeCeH7',
            ],
            'TotCashFlow' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'TotTaxFed' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'TotTaxFed_24' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'TotTaxState' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'Type' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'qcWFCON37l1YmLNoxqZ-r', 'c' => null],
                ],
                'ds' => '-GELeNskB_ok9rk1d3Nxl',
            ],
            'VarRep' => ['type' => 'numerical'],
            'VarStat' => ['type' => 'numerical'],
            'VarSub' => ['type' => 'numerical'],
            'VarTable' => ['type' => 'numerical'],
            'VarTax' => ['type' => 'numerical'],
            'VarTime' => ['type' => 'numerical'],
            'VarType' => ['type' => 'numerical'],
            'annuity_rate' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '0', 'c' => null],
                ],
            ],
            'end_date_ph' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'fed_tot_tax_24_diff' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'fed_tot_tax_diff' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'fin_bal_ph' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'g' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'g_p' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '5', 'c' => null],
                ],
            ],
            'g_p_ph' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'g_ph' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'gross_payout_diff' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'in_dep_ph' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'm' => ['type' => 'numerical'],
            'm_ph' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'net_payout' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'per_pay_ph' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'q' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'EETU_NiupgNcVxPdjA5oA', 'c' => null],
                ],
                'ds' => 'm-NgeUbuhfswR95xvq_7a',
            ],
            'q_ph' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'r_ph' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'start_date_ph' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            't' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '30', 'c' => null],
                ],
            ],
            't_ph' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'tax_fed_cash_ph' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'tax_state_diff' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'var_rep_ph' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'var_stat_ph' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'var_sub_ph' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'var_table_ph' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'var_tax_ph' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'var_time_ph' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'var_type_ph' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'tZjO7elKnVolxOHNFhpxX',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'InDep',
                                    'vt' => 'numerical',
                                    'l' => 'How much did you win?',
                                    'pre' => '$',
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
                                    'n' => 'annuity_rate',
                                    'vt' => 'numerical',
                                    'l' => 'Annuity rate',
                                    'h' => 'Set here the yearly revenue on your annuity. You can receive the annuity payout only if you have US citizenship and residency in the US.',
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
                                    'n' => 'Stat',
                                    'vt' => 'valueSelect',
                                    'l' => 'What is your filing status?',
                                    'ds' => '0NVy-CcNEipy3oVrcM1jr',
                                    'opts' => [
                                        ['DmOcXiEcAxzErUwFXiPwS', 'Single', '1'],
                                        ['80fMV3I-m_-KdEAAxkOGl', 'Married filing jointly', '2'],
                                        ['EsxwMjDX2WhRGBsO984jP', 'Married filing separately', '3'],
                                        ['ovsCXn9CzfLXMKrAt4t2l', 'Heads of household', '4'],
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
                                    'n' => 'TaxState',
                                    'vt' => 'valueSelect',
                                    'l' => 'Where do you live?',
                                    'h' => 'If you are a foreigner, consider the state in USA where your ticket was purchased.',
                                    'ds' => 'cRC9B4n-C937vSlsg0fal',
                                    'opts' => [
                                        ['WSAqlIFLH0XzODRgBFL1s', 'Alabama', '1'],
                                        ['bppzGabiCCEkKl54Us3_P', 'Alaska', '2'],
                                        ['AN2ZyW14SVCStJ9ZEoBFn', 'Arizona', '3'],
                                        ['ceiOwQVOMvuidCAaxJv_G', 'Arkansas', '4'],
                                        ['ZyCHM1PngPEogfsqZeaO6', 'California', '5'],
                                        ['tDZ2ok5NpF0MecEBFqAI1', 'Colorado', '6'],
                                        ['IThVqs4toCHiGvJ6JBdZR', 'Connecticut', '7'],
                                        ['n-xuE6Q5_1XceoKHXXpI7', 'Delaware', '8'],
                                        ['HVyl4FQ98ycGZNJhLWEgx', 'Florida', '9'],
                                        ['MaUPpY9RHvX75utE4t69S', 'Georgia', '10'],
                                        ['b87nwLgYgPt26jUs2D5Al', 'Hawaii', '11'],
                                        ['0F6A-JH7V_nAm-MUbowqG', 'Idaho', '12'],
                                        ['IDf7RwPSQanYLgsuGfIjR', 'Illinois', '13'],
                                        ['yZBrUaYIfaNdTiI7eQzuT', 'Indiana', '14'],
                                        ['vh7ouuEj7H3c6qqXnU3Tn', 'Iowa', '15'],
                                        ['NEG5wbVNm8UnrTfj6mqGv', 'Kansas', '16'],
                                        ['0pHltub7pOr7_Z5jwvG2S', 'Kentucky', '17'],
                                        ['-S6e87s1evGnDDi-uXNQ9', 'Louisiana', '18'],
                                        ['eMFvK9xv8aJK32IPp4Qt1', 'Maine', '19'],
                                        ['bnEjhWvuQllmJCOYATvOd', 'Maryland', '20'],
                                        ['kKn6mA4ZVj8xWhhKHyyGd', 'Massachusetts', '21'],
                                        ['vtJYGpDPeyRZztjo2vUvy', 'Michigan', '22'],
                                        ['wVL7vHhVAyJlLuZ2XxYGT', 'Minnesota', '23'],
                                        ['9r774pAxz3UByRr3a8Gyr', 'Mississippi', '24'],
                                        ['8D0E65HeREafM4LlV54OG', 'Missouri', '25'],
                                        ['Cv7A-KvjFoh_CjWqUba--', 'Montana', '26'],
                                        ['Sa4KSTBIt4e3IjaMaH8y4', 'Nebraska', '27'],
                                        ['mNZciaYGRYUB_eHf3CA2I', 'Nevada', '28'],
                                        ['-sXmtcGOxqxZZ74EPvrlb', 'New Hampshire', '29'],
                                        ['2KRQijJex5Ge24GamWIOn', 'New Jersey', '30'],
                                        ['beYkVl-IEeASHAjgK6Dpx', 'New Mexico', '31'],
                                        ['lDS_F0Wd-3dtgKXfmFtl6', 'New York', '32'],
                                        ['NxN1ZReECp4nvGbaHSkRq', 'North Carolina', '33'],
                                        ['NMKiikQJaBmOawbZAEglb', 'North Dakota', '34'],
                                        ['vKGv4OriHWKX56PXi_twJ', 'Ohio', '35'],
                                        ['h-t5CWPNxjDQVS4Weqdpz', 'Oklahoma', '36'],
                                        ['NLepqjHEEKIHUvBYD5Gcp', 'Oregon', '37'],
                                        ['-Knx_jUmVHnOhCTovfcC7', 'Pennsylvania', '38'],
                                        ['n7m0EOiJZE1hXWmhCT3XI', 'Rhode Island', '39'],
                                        ['Kdz_XfYlQ4hc_ZdQ8f_z6', 'South Carolina', '40'],
                                        ['Py4MclDr5_tpm_L33AwXO', 'South Dakota', '41'],
                                        ['4QCWfbReXMrHoC1IxoZtT', 'Tennessee', '42'],
                                        ['nh-voG-AekJI2iZMoECET', 'Texas', '43'],
                                        ['mv1rE9EW-JWplIlWGZmFW', 'Utah', '44'],
                                        ['EI9ggLHJH0UkRJsUwvtTO', 'Vermont', '45'],
                                        ['TSkXCHcgcoLMWORO_JRT4', 'Virginia', '46'],
                                        ['y_NHgutewTPe5Jr0LF-RH', 'Washington', '47'],
                                        ['IE8fQ5wG_phz8oMdt308a', 'West Virginia', '48'],
                                        ['iN6LyQiYFEgbpCAB7Hskx', 'Wisconsin', '49'],
                                        ['lklozLRaqRomgyuJ8FKcA', 'Wyoming', '50'],
                                        ['ZU3WH9IqaPi3XEmZWVOgB', 'Washington,D.C.', '51'],
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
                                    'n' => 'CashRate',
                                    'vt' => 'numerical',
                                    'l' => 'Lump sum payout percentage',
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
                                    't' => 'x',
                                    'c' => [
                                        [null, <<<'TXT'
                                        *Additional Federal Tax (up to 37%, tax amount based on filing status minus the withheld 24% Federal Tax). **The gross payout for lump sum payment is approximated by 52% of the total lottery prize — you can alter the lump sum payout percentage in the corresponding variable. This is the only valid payout for foreigners.
                                        TXT],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => '5hWkOce6Wo_VWMEtIT97L',
                'title' => 'Hidden',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'q',
                                    'vt' => 'valueSelect',
                                    'l' => 'Payout frequency',
                                    'h' => 'The interval between the annuity payouts.',
                                    'ds' => 'm-NgeUbuhfswR95xvq_7a',
                                    'opts' => [
                                        ['EETU_NiupgNcVxPdjA5oA', 'Yearly', '1'],
                                        ['xfUWS8QC32Vb6pmR60vmG', 'Semi-annually', '2'],
                                        ['tdMLY6thxOTlP2qfBBwQe', 'Quarterly', '4'],
                                        ['2Rjz-gw9dD650vIG32Gmb', 'Monthly', '12'],
                                        ['LddqdFPfa5AAPruMZ9ezC', 'Weekly', '52'],
                                        ['Y10Vn3GZrjWDlsZ5KYt-y', 'Daily', '365'],
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
                                    'n' => 'Infl',
                                    'vt' => 'numerical',
                                    'l' => 'Inflation rate',
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
                                    'n' => 'Timing',
                                    'vt' => 'valueSelect',
                                    'l' => 'Set term by...',
                                    'ds' => '4U7ynE96TFgJUCDqeCeH7',
                                    'opts' => [
                                        ['DPR2EyUMqAhmO2lDfXuuK', 'length', '1'],
                                        ['t9ABQ_WmgMthRDuU4XV4T', 'dates', '2'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'EndDate', 'vt' => 'date', 'l' => 'Final payout on...'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'StartDate', 'vt' => 'date', 'l' => 'Starting from...'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'Subject',
                                    'vt' => 'valueSelect',
                                    'l' => 'Annuity payout option',
                                    'ds' => 'rL9X_qESTwbpYWMCvP6vx',
                                    'opts' => [
                                        ['tfW0NKqWTL0ux-I0WBGGV', 'Fixed payment annuity', '1'],
                                        ['j4xZkoA2ipplPPV6r_BvE', 'Fixed length annuity', '2'],
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
                                    'n' => 'PerPay',
                                    'vt' => 'numerical',
                                    'l' => 'Annuity payout',
                                    'h' => 'How much money is being withdrawn at equal intervals?',
                                    'us' => '663',
                                    'du' => 'USD',
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
                                    'n' => 'FinBal',
                                    'vt' => 'numerical',
                                    'l' => 'Final balance',
                                    'h' => 'The future value of the annuity.',
                                    'us' => '663',
                                    'du' => 'USD',
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
                                    'n' => 'g',
                                    'vt' => 'numerical',
                                    'l' => 'Annual growth rate',
                                    'h' => 'The percentage growth rate of the annuity payouts over a year.',
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
                                    'n' => 't',
                                    'vt' => 'numerical',
                                    'l' => 'Length of annuity',
                                    'us' => '19',
                                    'du' => 'yrs',
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
                                    'n' => 'TableFreq',
                                    'vt' => 'valueSelect',
                                    'l' => 'Show me...',
                                    'ds' => 'hRh9CKKkrL5vqh1t_mJu_',
                                    'opts' => [
                                        ['JYTFR4lajDgSfdALPqINl', 'monthly schedule', '1'],
                                        ['FQnDEUReQ-1ZUuUelCxAi', 'yearly schedule', '2'],
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
                                    'n' => 'Rep',
                                    'vt' => 'valueSelect',
                                    'l' => 'Display...',
                                    'ds' => '0RTKfucYg95ufOXKlPoIu',
                                    'opts' => [
                                        ['ADsvDpxanPG__DtNPIGXj', 'chart of balances', '1'],
                                        ['bq-C5scRFSIl-1rW62638', 'table of payment schedule', '2'],
                                        ['BMnKmfBpqScAP8OhRfo8Z', 'show all', '3'],
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
                                    'n' => 'Type',
                                    'vt' => 'valueSelect',
                                    'l' => 'Type of annuity',
                                    'h' => 'Ordinary annuity - end of periods; annuity due - beginning of periods.',
                                    'ds' => '-GELeNskB_ok9rk1d3Nxl',
                                    'opts' => [
                                        ['qcWFCON37l1YmLNoxqZ-r', 'Ordinary annuity', '0'],
                                        ['1vofs8yPzbCqbxXElYM8v', 'Annuity due', '1'],
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
                                    'n' => 'CompFreq',
                                    'vt' => 'valueSelect',
                                    'l' => 'Compounding method',
                                    'h' => 'The frequency with which interest is added to the balance.',
                                    'ds' => 'gB4X-hhlDTIRp21Fk0xO_',
                                    'opts' => [
                                        ['a7CjuYgnF--XN5TgHx7K4', 'Yearly', '1'],
                                        ['WbJqsjxWD2byUUhhndBnT', 'Semi-annually', '2'],
                                        ['T-Bg2k5uP8p-JVfIcYhOP', 'Quarterly', '4'],
                                        ['_GCQ0svAsEfY0IWB3NK9X', 'Monthly', '12'],
                                        ['Nz6ufawdLjnXHMxzY2bSd', 'Weekly', '52.1775'],
                                        ['d5QIX3f8Lz5DcKemkg0B0', 'Daily', '365.242'],
                                        ['B5cbU62R3FPt-0L7fnffK', 'Continuous', '0'],
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
                                    'n' => 'g_p',
                                    'vt' => 'numerical',
                                    'l' => 'Periodic growth rate',
                                    'h' => <<<'TXT'
                                    The percentage growth rate in the periodic payout. Note, that the periodic and annual growth rates are linked together: if you set one, the other will be calculated according to the payout frequency.
                                    TXT,
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
                                ['t' => 'v', 'n' => 'GrossCash', 'vt' => 'numerical', 'l' => 'Gross cash'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'NetCash', 'vt' => 'numerical', 'l' => 'Net cash'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'NetCash_24', 'vt' => 'numerical', 'l' => 'Net cash 24'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'TaxFedCash', 'vt' => 'numerical', 'l' => 'Tax fed cash'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'TaxFedCash_24', 'vt' => 'numerical', 'l' => 'Tax fed cash 24'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'TaxStateCash', 'vt' => 'numerical', 'l' => 'Tax state cash'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'TotTaxFed', 'vt' => 'numerical', 'l' => 'Tot tax fed'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'TotTaxFed_24', 'vt' => 'numerical', 'l' => 'Tot tax fed 24'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'TotTaxState', 'vt' => 'numerical', 'l' => 'Tot tax state'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'TotCashFlow', 'vt' => 'numerical', 'l' => 'Tot cash flow'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'fed_tot_tax_24_diff', 'vt' => 'numerical', 'l' => 'Fed tot tax 24 diff'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'fed_tot_tax_diff', 'vt' => 'numerical', 'l' => 'Fed tot tax diff'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'gross_payout_diff', 'vt' => 'numerical', 'l' => 'Gross payout diff'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'net_payout', 'vt' => 'numerical', 'l' => 'Net payout'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'tax_state_diff', 'vt' => 'numerical', 'l' => 'Tax state diff'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'tax_fed_cash_ph', 'vt' => 'numerical', 'l' => 'Tax fed cash ph'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'end_date_ph', 'vt' => 'numerical', 'l' => 'End date ph'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'fin_bal_ph', 'vt' => 'numerical', 'l' => 'Fin bal ph'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'g_p_ph', 'vt' => 'numerical', 'l' => 'G p ph'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'g_ph', 'vt' => 'numerical', 'l' => 'G ph'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'in_dep_ph', 'vt' => 'numerical', 'l' => 'In dep ph'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'm_ph', 'vt' => 'numerical', 'l' => 'M ph'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'per_pay_ph', 'vt' => 'numerical', 'l' => 'Per pay ph'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'q_ph', 'vt' => 'numerical', 'l' => 'Q ph'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'r_ph', 'vt' => 'numerical', 'l' => 'R ph'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'start_date_ph', 'vt' => 'numerical', 'l' => 'Start date ph'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 't_ph', 'vt' => 'numerical', 'l' => 'T ph'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'var_stat_ph', 'vt' => 'numerical', 'l' => 'Var stat ph'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'var_sub_ph', 'vt' => 'numerical', 'l' => 'Var sub ph'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'var_tax_ph', 'vt' => 'numerical', 'l' => 'Var tax ph'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'var_time_ph', 'vt' => 'numerical', 'l' => 'Var time ph'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'var_type_ph', 'vt' => 'numerical', 'l' => 'Var type ph'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'var_rep_ph', 'vt' => 'numerical', 'l' => 'Var rep ph'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'var_table_ph', 'vt' => 'numerical', 'l' => 'Var table ph'],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'supp-outputs',
                'title' => 'Results',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'GrossCash',
                                    'vt' => 'numerical',
                                    'l' => 'Lump sum before tax',
                                    'oo' => 1,
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
                                    'n' => 'TaxFedCash_24',
                                    'vt' => 'numerical',
                                    'l' => 'Federal withholding at 24%',
                                    'oo' => 1,
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
                                    'n' => 'TaxFedCash',
                                    'vt' => 'numerical',
                                    'l' => 'Additional federal tax',
                                    'oo' => 1,
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
                                    'n' => 'TaxStateCash',
                                    'vt' => 'numerical',
                                    'l' => 'State tax',
                                    'oo' => 1,
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
                                    'n' => 'NetCash',
                                    'vt' => 'numerical',
                                    'l' => 'Lump sum after tax',
                                    'oo' => 1,
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'g + 1 = (1 + g_p) ^ q',
                'var' => [
                    [
                        'l' => 'g',
                        'f' => 'pow(g_p + 1, q) - 1',
                        'r' => ['q', 'g_p'],
                    ],
                    [
                        'l' => 'q',
                        'f' => 'log(g + 1)/log(g_p + 1)',
                        'r' => ['g', 'g_p'],
                    ],
                    [
                        'l' => 'g_p',
                        'f' => 'pow(g + 1, 1/q) - 1',
                        'r' => ['g', 'q'],
                    ],
                ],
            ],
            [
                'formula' => 'StartDate = floor(EndDate)',
                'var' => [
                    [
                        'l' => 'StartDate',
                        'f' => 'floor(EndDate)',
                        'r' => ['EndDate'],
                    ],
                ],
            ],
            [
                'formula' => 'GrossCash = one_way(InDep * CashRate)',
                'var' => [
                    [
                        'l' => 'GrossCash',
                        'f' => '(CashRate*InDep)',
                        'r' => ['CashRate', 'InDep'],
                    ],
                ],
            ],
            [
                'formula' => 'TaxFedCash_24 = one_way(GrossCash * 0.24)',
                'var' => [
                    [
                        'l' => 'TaxFedCash_24',
                        'f' => '((6/25)*(CashRate*InDep))',
                        'r' => ['CashRate', 'InDep'],
                    ],
                ],
            ],
            [
                'formula' => 'NetCash_24 = one_way(GrossCash - TaxFedCash_24)',
                'var' => [
                    [
                        'l' => 'NetCash_24',
                        'f' => '((CashRate*InDep) - ((6/25)*(CashRate*InDep)))',
                        'r' => ['CashRate', 'InDep'],
                    ],
                ],
            ],
            [
                'formula' => 'tax_fed_cash_ph = one_way(getTaxFedEq(GrossCash, VarStat) - TaxFedCash_24)',
                'var' => [
                    [
                        'l' => 'tax_fed_cash_ph',
                        'f' => '(getTaxFedEq((CashRate*InDep), VarStat) - ((6/25)*(CashRate*InDep)))',
                        'r' => ['CashRate', 'InDep', 'VarStat'],
                    ],
                ],
            ],
            [
                'formula' => 'TaxFedCash = if_else(tax_fed_cash_ph < 0, 0, tax_fed_cash_ph)',
                'var' => [
                    [
                        'l' => 'TaxFedCash',
                        'f' => <<<'TXT'
                        ((((getTaxFedEq((CashRate*InDep), VarStat) - ((6/25)*(CashRate*InDep))) < 0) ? (
                           0
                        )
                        : (
                           (getTaxFedEq((CashRate*InDep), VarStat) - ((6/25)*(CashRate*InDep)))
                        )))
                        TXT,
                        'r' => ['CashRate', 'InDep', 'VarStat'],
                    ],
                ],
            ],
            [
                'formula' => 'TaxStateCash = one_way(GrossCash * VarTax / 100)',
                'var' => [
                    [
                        'l' => 'TaxStateCash',
                        'f' => '((1/100)*VarTax*(CashRate*InDep))',
                        'r' => ['CashRate', 'InDep', 'VarTax'],
                    ],
                ],
            ],
            [
                'formula' => 'NetCash = one_way(GrossCash - (TaxFedCash + TaxFedCash_24 + TaxStateCash))',
                'var' => [
                    [
                        'l' => 'NetCash',
                        'f' => <<<'TXT'
                        ((CashRate*InDep) - ((1/100)*VarTax*(CashRate*InDep)) - ((((getTaxFedEq((CashRate*InDep), VarStat) - ((6/25)*(CashRate*InDep))) < 0) ? (
                           0
                        )
                        : (
                           (getTaxFedEq((CashRate*InDep), VarStat) - ((6/25)*(CashRate*InDep)))
                        ))) - ((6/25)*(CashRate*InDep)))
                        TXT,
                        'r' => ['CashRate', 'InDep', 'VarStat', 'VarTax'],
                    ],
                ],
            ],
            [
                'formula' => 'TotTaxFed_24= getTotTaxFed_24(EndDate, StartDate, VarTime, q, t, m, annuity_rate, g, g_p, InDep, PerPay, VarType, VarStat, VarTax, VarSub, FinBal)',
                'var' => [
                    [
                        'l' => 'TotTaxFed_24',
                        'f' => 'getTotTaxFed_24(EndDate, floor(EndDate), VarTime, q, t, m, annuity_rate, g, g_p, InDep, PerPay, VarType, VarStat, VarTax, VarSub, FinBal)',
                        'r' => [
                            'EndDate',
                            'FinBal',
                            'InDep',
                            'PerPay',
                            'VarStat',
                            'VarSub',
                            'VarTax',
                            'VarTime',
                            'VarType',
                            'annuity_rate',
                            'g',
                            'g_p',
                            'm',
                            'q',
                            't',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'TotTaxFed = getTotTaxFed(EndDate, StartDate, VarTime, q, t, m, annuity_rate, g, g_p, InDep, PerPay, VarType, VarStat, VarTax, VarSub, FinBal)',
                'var' => [
                    [
                        'l' => 'TotTaxFed',
                        'f' => 'getTotTaxFed(EndDate, floor(EndDate), VarTime, q, t, m, annuity_rate, g, g_p, InDep, PerPay, VarType, VarStat, VarTax, VarSub, FinBal)',
                        'r' => [
                            'EndDate',
                            'FinBal',
                            'InDep',
                            'PerPay',
                            'VarStat',
                            'VarSub',
                            'VarTax',
                            'VarTime',
                            'VarType',
                            'annuity_rate',
                            'g',
                            'g_p',
                            'm',
                            'q',
                            't',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'TotTaxState = getTotTaxState(EndDate, StartDate, VarTime, q, t, m, annuity_rate, g, g_p, InDep, PerPay, VarType, VarStat, VarTax, VarSub, FinBal)',
                'var' => [
                    [
                        'l' => 'TotTaxState',
                        'f' => 'getTotTaxState(EndDate, floor(EndDate), VarTime, q, t, m, annuity_rate, g, g_p, InDep, PerPay, VarType, VarStat, VarTax, VarSub, FinBal)',
                        'r' => [
                            'EndDate',
                            'FinBal',
                            'InDep',
                            'PerPay',
                            'VarStat',
                            'VarSub',
                            'VarTax',
                            'VarTime',
                            'VarType',
                            'annuity_rate',
                            'g',
                            'g_p',
                            'm',
                            'q',
                            't',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'TotCashFlow = getTotCashFlow(EndDate, StartDate, VarTime, q, t, m, annuity_rate, g, g_p, InDep, PerPay, VarType, VarStat, VarTax, VarSub, FinBal)',
                'var' => [
                    [
                        'l' => 'TotCashFlow',
                        'f' => 'getTotCashFlow(EndDate, floor(EndDate), VarTime, q, t, m, annuity_rate, g, g_p, InDep, PerPay, VarType, VarStat, VarTax, VarSub, FinBal)',
                        'r' => [
                            'EndDate',
                            'FinBal',
                            'InDep',
                            'PerPay',
                            'VarStat',
                            'VarSub',
                            'VarTax',
                            'VarTime',
                            'VarType',
                            'annuity_rate',
                            'g',
                            'g_p',
                            'm',
                            'q',
                            't',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'gross_payout_diff = one_way(InDep-GrossCash)',
                'var' => [
                    [
                        'l' => 'gross_payout_diff',
                        'f' => '(InDep - (CashRate*InDep))',
                        'r' => ['CashRate', 'InDep'],
                    ],
                ],
            ],
            [
                'formula' => 'fed_tot_tax_24_diff = one_way(TotTaxFed_24-TaxFedCash_24)',
                'var' => [
                    [
                        'l' => 'fed_tot_tax_24_diff',
                        'f' => <<<'TXT'
                        (getTotTaxFed_24(EndDate, floor(EndDate), VarTime, q, t, m, annuity_rate, g, g_p, InDep, PerPay, VarType, VarStat, VarTax, VarSub, FinBal) - ((6/25)*(CashRate*InDep)))
                        TXT,
                        'r' => [
                            'CashRate',
                            'EndDate',
                            'FinBal',
                            'InDep',
                            'PerPay',
                            'VarStat',
                            'VarSub',
                            'VarTax',
                            'VarTime',
                            'VarType',
                            'annuity_rate',
                            'g',
                            'g_p',
                            'm',
                            'q',
                            't',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'fed_tot_tax_diff = one_way(TotTaxFed-TaxFedCash)',
                'var' => [
                    [
                        'l' => 'fed_tot_tax_diff',
                        'f' => <<<'TXT'
                        (getTotTaxFed(EndDate, floor(EndDate), VarTime, q, t, m, annuity_rate, g, g_p, InDep, PerPay, VarType, VarStat, VarTax, VarSub, FinBal) - ((((getTaxFedEq((CashRate*InDep), VarStat) - ((6/25)*(CashRate*InDep))) < 0) ? (
                           0
                        )
                        : (
                           (getTaxFedEq((CashRate*InDep), VarStat) - ((6/25)*(CashRate*InDep)))
                        ))))
                        TXT,
                        'r' => [
                            'CashRate',
                            'EndDate',
                            'FinBal',
                            'InDep',
                            'PerPay',
                            'VarStat',
                            'VarSub',
                            'VarTax',
                            'VarTime',
                            'VarType',
                            'annuity_rate',
                            'g',
                            'g_p',
                            'm',
                            'q',
                            't',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'tax_state_diff = one_way(TotTaxState-TaxStateCash)',
                'var' => [
                    [
                        'l' => 'tax_state_diff',
                        'f' => <<<'TXT'
                        (getTotTaxState(EndDate, floor(EndDate), VarTime, q, t, m, annuity_rate, g, g_p, InDep, PerPay, VarType, VarStat, VarTax, VarSub, FinBal) - ((1/100)*VarTax*(CashRate*InDep)))
                        TXT,
                        'r' => [
                            'CashRate',
                            'EndDate',
                            'FinBal',
                            'InDep',
                            'PerPay',
                            'VarStat',
                            'VarSub',
                            'VarTax',
                            'VarTime',
                            'VarType',
                            'annuity_rate',
                            'g',
                            'g_p',
                            'm',
                            'q',
                            't',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'net_payout = one_way(TotCashFlow-NetCash)',
                'var' => [
                    [
                        'l' => 'net_payout',
                        'f' => <<<'TXT'
                        (getTotCashFlow(EndDate, floor(EndDate), VarTime, q, t, m, annuity_rate, g, g_p, InDep, PerPay, VarType, VarStat, VarTax, VarSub, FinBal) - ((CashRate*InDep) - ((1/100)*VarTax*(CashRate*InDep)) - ((((getTaxFedEq((CashRate*InDep), VarStat) - ((6/25)*(CashRate*InDep))) < 0) ? (
                           0
                        )
                        : (
                           (getTaxFedEq((CashRate*InDep), VarStat) - ((6/25)*(CashRate*InDep)))
                        ))) - ((6/25)*(CashRate*InDep))))
                        TXT,
                        'r' => [
                            'CashRate',
                            'EndDate',
                            'FinBal',
                            'InDep',
                            'PerPay',
                            'VarStat',
                            'VarSub',
                            'VarTax',
                            'VarTime',
                            'VarType',
                            'annuity_rate',
                            'g',
                            'g_p',
                            'm',
                            'q',
                            't',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'start_date_ph = one_way(StartDate)',
                'var' => [
                    [
                        'l' => 'start_date_ph',
                        'f' => '(floor(EndDate))',
                        'r' => ['EndDate'],
                    ],
                ],
            ],
            [
                'formula' => 'end_date_ph = one_way(EndDate)',
                'var' => [
                    [
                        'l' => 'end_date_ph',
                        'f' => '(EndDate)',
                        'r' => ['EndDate'],
                    ],
                ],
            ],
            [
                'formula' => 'in_dep_ph = one_way(InDep)',
                'var' => [
                    [
                        'l' => 'in_dep_ph',
                        'f' => '(InDep)',
                        'r' => ['InDep'],
                    ],
                ],
            ],
            [
                'formula' => 'r_ph = one_way(annuity_rate)',
                'var' => [
                    [
                        'l' => 'r_ph',
                        'f' => '(annuity_rate)',
                        'r' => ['annuity_rate'],
                    ],
                ],
            ],
            [
                'formula' => 'var_type_ph = one_way(VarType)',
                'var' => [
                    [
                        'l' => 'var_type_ph',
                        'f' => '(VarType)',
                        'r' => ['VarType'],
                    ],
                ],
            ],
            [
                'formula' => 'm_ph = one_way(m)',
                'var' => [
                    [
                        'l' => 'm_ph',
                        'f' => '(m)',
                        'r' => ['m'],
                    ],
                ],
            ],
            [
                'formula' => 'q_ph = one_way(q)',
                'var' => [
                    [
                        'l' => 'q_ph',
                        'f' => '(q)',
                        'r' => ['q'],
                    ],
                ],
            ],
            [
                'formula' => 'var_time_ph = one_way(VarTime)',
                'var' => [
                    [
                        'l' => 'var_time_ph',
                        'f' => '(VarTime)',
                        'r' => ['VarTime'],
                    ],
                ],
            ],
            [
                'formula' => 'var_sub_ph = one_way(VarSub)',
                'var' => [
                    [
                        'l' => 'var_sub_ph',
                        'f' => '(VarSub)',
                        'r' => ['VarSub'],
                    ],
                ],
            ],
            [
                'formula' => 'per_pay_ph = one_way(PerPay)',
                'var' => [
                    [
                        'l' => 'per_pay_ph',
                        'f' => '(PerPay)',
                        'r' => ['PerPay'],
                    ],
                ],
            ],
            [
                'formula' => 'fin_bal_ph = one_way(FinBal)',
                'var' => [
                    [
                        'l' => 'fin_bal_ph',
                        'f' => '(FinBal)',
                        'r' => ['FinBal'],
                    ],
                ],
            ],
            [
                'formula' => 'g_ph = one_way(g)',
                'var' => [
                    [
                        'l' => 'g_ph',
                        'f' => '(g)',
                        'r' => ['g'],
                    ],
                ],
            ],
            [
                'formula' => 't_ph = one_way(t)',
                'var' => [
                    [
                        'l' => 't_ph',
                        'f' => '(t)',
                        'r' => ['t'],
                    ],
                ],
            ],
            [
                'formula' => 'g_p_ph = one_way(g_p)',
                'var' => [
                    [
                        'l' => 'g_p_ph',
                        'f' => '(g_p)',
                        'r' => ['g_p'],
                    ],
                ],
            ],
            [
                'formula' => 'var_tax_ph = one_way(VarTax)',
                'var' => [
                    [
                        'l' => 'var_tax_ph',
                        'f' => '(VarTax)',
                        'r' => ['VarTax'],
                    ],
                ],
            ],
            [
                'formula' => 'var_stat_ph = one_way(VarStat)',
                'var' => [
                    [
                        'l' => 'var_stat_ph',
                        'f' => '(VarStat)',
                        'r' => ['VarStat'],
                    ],
                ],
            ],
            [
                'formula' => 'var_rep_ph = one_way(VarRep)',
                'var' => [
                    [
                        'l' => 'var_rep_ph',
                        'f' => '(VarRep)',
                        'r' => ['VarRep'],
                    ],
                ],
            ],
            [
                'formula' => 'var_table_ph = one_way(VarTable)',
                'var' => [
                    [
                        'l' => 'var_table_ph',
                        'f' => '(VarTable)',
                        'r' => ['VarTable'],
                    ],
                ],
            ],
            [
                'formula' => 'VarStat = Stat',
                'var' => [
                    [
                        'l' => 'VarStat',
                        'f' => 'Stat',
                        'r' => ['Stat'],
                    ],
                ],
            ],
            [
                'formula' => 'VarTax = TaxState',
                'var' => [
                    [
                        'l' => 'VarTax',
                        'f' => 'TaxState',
                        'r' => ['TaxState'],
                    ],
                ],
            ],
            [
                'formula' => 'VarRep = Rep',
                'var' => [
                    [
                        'l' => 'VarRep',
                        'f' => 'Rep',
                        'r' => ['Rep'],
                    ],
                ],
            ],
            [
                'formula' => 'VarSub = Subject',
                'var' => [
                    [
                        'l' => 'VarSub',
                        'f' => 'Subject',
                        'r' => ['Subject'],
                    ],
                ],
            ],
            [
                'formula' => 'VarTime = Timing',
                'var' => [
                    [
                        'l' => 'VarTime',
                        'f' => 'Timing',
                        'r' => ['Timing'],
                    ],
                ],
            ],
            [
                'formula' => 'VarType = Type',
                'var' => [
                    [
                        'l' => 'VarType',
                        'f' => 'Type',
                        'r' => ['Type'],
                    ],
                ],
            ],
            [
                'formula' => 'VarTable = TableFreq',
                'var' => [
                    [
                        'l' => 'VarTable',
                        'f' => 'TableFreq',
                        'r' => ['TableFreq'],
                    ],
                ],
            ],
            [
                'formula' => 'm = CompFreq',
                'var' => [
                    [
                        'l' => 'm',
                        'f' => 'CompFreq',
                        'r' => ['CompFreq'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'm-NgeUbuhfswR95xvq_7a' => [
                'name' => 'payfreq',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'EETU_NiupgNcVxPdjA5oA', 'label' => 'Yearly', 'value' => '1'],
                    ['uid' => 'xfUWS8QC32Vb6pmR60vmG', 'label' => 'Semi-annually', 'value' => '2'],
                    ['uid' => 'tdMLY6thxOTlP2qfBBwQe', 'label' => 'Quarterly', 'value' => '4'],
                    ['uid' => '2Rjz-gw9dD650vIG32Gmb', 'label' => 'Monthly', 'value' => '12'],
                    ['uid' => 'LddqdFPfa5AAPruMZ9ezC', 'label' => 'Weekly', 'value' => '52'],
                    ['uid' => 'Y10Vn3GZrjWDlsZ5KYt-y', 'label' => 'Daily', 'value' => '365'],
                ],
            ],
            '4U7ynE96TFgJUCDqeCeH7' => [
                'name' => 'data0',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'DPR2EyUMqAhmO2lDfXuuK', 'label' => 'length', 'value' => '1'],
                    ['uid' => 't9ABQ_WmgMthRDuU4XV4T', 'label' => 'dates', 'value' => '2'],
                ],
            ],
            '0RTKfucYg95ufOXKlPoIu' => [
                'name' => 'data1',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'ADsvDpxanPG__DtNPIGXj', 'label' => 'chart of balances', 'value' => '1'],
                    ['uid' => 'bq-C5scRFSIl-1rW62638', 'label' => 'table of payment schedule', 'value' => '2'],
                    ['uid' => 'BMnKmfBpqScAP8OhRfo8Z', 'label' => 'show all', 'value' => '3'],
                ],
            ],
            '-GELeNskB_ok9rk1d3Nxl' => [
                'name' => 'data2',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'qcWFCON37l1YmLNoxqZ-r', 'label' => 'Ordinary annuity', 'value' => '0'],
                    ['uid' => '1vofs8yPzbCqbxXElYM8v', 'label' => 'Annuity due', 'value' => '1'],
                ],
            ],
            'gB4X-hhlDTIRp21Fk0xO_' => [
                'name' => 'data3',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'a7CjuYgnF--XN5TgHx7K4', 'label' => 'Yearly', 'value' => '1'],
                    ['uid' => 'WbJqsjxWD2byUUhhndBnT', 'label' => 'Semi-annually', 'value' => '2'],
                    ['uid' => 'T-Bg2k5uP8p-JVfIcYhOP', 'label' => 'Quarterly', 'value' => '4'],
                    ['uid' => '_GCQ0svAsEfY0IWB3NK9X', 'label' => 'Monthly', 'value' => '12'],
                    ['uid' => 'Nz6ufawdLjnXHMxzY2bSd', 'label' => 'Weekly', 'value' => '52.1775'],
                    ['uid' => 'd5QIX3f8Lz5DcKemkg0B0', 'label' => 'Daily', 'value' => '365.242'],
                    ['uid' => 'B5cbU62R3FPt-0L7fnffK', 'label' => 'Continuous', 'value' => '0'],
                ],
            ],
            '0NVy-CcNEipy3oVrcM1jr' => [
                'name' => 'data_stat',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'DmOcXiEcAxzErUwFXiPwS', 'label' => 'Single', 'value' => '1'],
                    ['uid' => '80fMV3I-m_-KdEAAxkOGl', 'label' => 'Married filing jointly', 'value' => '2'],
                    ['uid' => 'EsxwMjDX2WhRGBsO984jP', 'label' => 'Married filing separately', 'value' => '3'],
                    ['uid' => 'ovsCXn9CzfLXMKrAt4t2l', 'label' => 'Heads of household', 'value' => '4'],
                ],
            ],
            'hRh9CKKkrL5vqh1t_mJu_' => [
                'name' => 'data5',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'JYTFR4lajDgSfdALPqINl', 'label' => 'monthly schedule', 'value' => '1'],
                    ['uid' => 'FQnDEUReQ-1ZUuUelCxAi', 'label' => 'yearly schedule', 'value' => '2'],
                ],
            ],
            'rL9X_qESTwbpYWMCvP6vx' => [
                'name' => 'data6',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'tfW0NKqWTL0ux-I0WBGGV', 'label' => 'Fixed payment annuity', 'value' => '1'],
                    ['uid' => 'j4xZkoA2ipplPPV6r_BvE', 'label' => 'Fixed length annuity', 'value' => '2'],
                ],
            ],
            'cRC9B4n-C937vSlsg0fal' => [
                'name' => 'taxState',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'WSAqlIFLH0XzODRgBFL1s', 'label' => 'Alabama', 'value' => '1'],
                    ['uid' => 'bppzGabiCCEkKl54Us3_P', 'label' => 'Alaska', 'value' => '2'],
                    ['uid' => 'AN2ZyW14SVCStJ9ZEoBFn', 'label' => 'Arizona', 'value' => '3'],
                    ['uid' => 'ceiOwQVOMvuidCAaxJv_G', 'label' => 'Arkansas', 'value' => '4'],
                    ['uid' => 'ZyCHM1PngPEogfsqZeaO6', 'label' => 'California', 'value' => '5'],
                    ['uid' => 'tDZ2ok5NpF0MecEBFqAI1', 'label' => 'Colorado', 'value' => '6'],
                    ['uid' => 'IThVqs4toCHiGvJ6JBdZR', 'label' => 'Connecticut', 'value' => '7'],
                    ['uid' => 'n-xuE6Q5_1XceoKHXXpI7', 'label' => 'Delaware', 'value' => '8'],
                    ['uid' => 'HVyl4FQ98ycGZNJhLWEgx', 'label' => 'Florida', 'value' => '9'],
                    ['uid' => 'MaUPpY9RHvX75utE4t69S', 'label' => 'Georgia', 'value' => '10'],
                    ['uid' => 'b87nwLgYgPt26jUs2D5Al', 'label' => 'Hawaii', 'value' => '11'],
                    ['uid' => '0F6A-JH7V_nAm-MUbowqG', 'label' => 'Idaho', 'value' => '12'],
                    ['uid' => 'IDf7RwPSQanYLgsuGfIjR', 'label' => 'Illinois', 'value' => '13'],
                    ['uid' => 'yZBrUaYIfaNdTiI7eQzuT', 'label' => 'Indiana', 'value' => '14'],
                    ['uid' => 'vh7ouuEj7H3c6qqXnU3Tn', 'label' => 'Iowa', 'value' => '15'],
                    ['uid' => 'NEG5wbVNm8UnrTfj6mqGv', 'label' => 'Kansas', 'value' => '16'],
                    ['uid' => '0pHltub7pOr7_Z5jwvG2S', 'label' => 'Kentucky', 'value' => '17'],
                    ['uid' => '-S6e87s1evGnDDi-uXNQ9', 'label' => 'Louisiana', 'value' => '18'],
                    ['uid' => 'eMFvK9xv8aJK32IPp4Qt1', 'label' => 'Maine', 'value' => '19'],
                    ['uid' => 'bnEjhWvuQllmJCOYATvOd', 'label' => 'Maryland', 'value' => '20'],
                    ['uid' => 'kKn6mA4ZVj8xWhhKHyyGd', 'label' => 'Massachusetts', 'value' => '21'],
                    ['uid' => 'vtJYGpDPeyRZztjo2vUvy', 'label' => 'Michigan', 'value' => '22'],
                    ['uid' => 'wVL7vHhVAyJlLuZ2XxYGT', 'label' => 'Minnesota', 'value' => '23'],
                    ['uid' => '9r774pAxz3UByRr3a8Gyr', 'label' => 'Mississippi', 'value' => '24'],
                    ['uid' => '8D0E65HeREafM4LlV54OG', 'label' => 'Missouri', 'value' => '25'],
                    ['uid' => 'Cv7A-KvjFoh_CjWqUba--', 'label' => 'Montana', 'value' => '26'],
                    ['uid' => 'Sa4KSTBIt4e3IjaMaH8y4', 'label' => 'Nebraska', 'value' => '27'],
                    ['uid' => 'mNZciaYGRYUB_eHf3CA2I', 'label' => 'Nevada', 'value' => '28'],
                    ['uid' => '-sXmtcGOxqxZZ74EPvrlb', 'label' => 'New Hampshire', 'value' => '29'],
                    ['uid' => '2KRQijJex5Ge24GamWIOn', 'label' => 'New Jersey', 'value' => '30'],
                    ['uid' => 'beYkVl-IEeASHAjgK6Dpx', 'label' => 'New Mexico', 'value' => '31'],
                    ['uid' => 'lDS_F0Wd-3dtgKXfmFtl6', 'label' => 'New York', 'value' => '32'],
                    ['uid' => 'NxN1ZReECp4nvGbaHSkRq', 'label' => 'North Carolina', 'value' => '33'],
                    ['uid' => 'NMKiikQJaBmOawbZAEglb', 'label' => 'North Dakota', 'value' => '34'],
                    ['uid' => 'vKGv4OriHWKX56PXi_twJ', 'label' => 'Ohio', 'value' => '35'],
                    ['uid' => 'h-t5CWPNxjDQVS4Weqdpz', 'label' => 'Oklahoma', 'value' => '36'],
                    ['uid' => 'NLepqjHEEKIHUvBYD5Gcp', 'label' => 'Oregon', 'value' => '37'],
                    ['uid' => '-Knx_jUmVHnOhCTovfcC7', 'label' => 'Pennsylvania', 'value' => '38'],
                    ['uid' => 'n7m0EOiJZE1hXWmhCT3XI', 'label' => 'Rhode Island', 'value' => '39'],
                    ['uid' => 'Kdz_XfYlQ4hc_ZdQ8f_z6', 'label' => 'South Carolina', 'value' => '40'],
                    ['uid' => 'Py4MclDr5_tpm_L33AwXO', 'label' => 'South Dakota', 'value' => '41'],
                    ['uid' => '4QCWfbReXMrHoC1IxoZtT', 'label' => 'Tennessee', 'value' => '42'],
                    ['uid' => 'nh-voG-AekJI2iZMoECET', 'label' => 'Texas', 'value' => '43'],
                    ['uid' => 'mv1rE9EW-JWplIlWGZmFW', 'label' => 'Utah', 'value' => '44'],
                    ['uid' => 'EI9ggLHJH0UkRJsUwvtTO', 'label' => 'Vermont', 'value' => '45'],
                    ['uid' => 'TSkXCHcgcoLMWORO_JRT4', 'label' => 'Virginia', 'value' => '46'],
                    ['uid' => 'y_NHgutewTPe5Jr0LF-RH', 'label' => 'Washington', 'value' => '47'],
                    ['uid' => 'IE8fQ5wG_phz8oMdt308a', 'label' => 'West Virginia', 'value' => '48'],
                    ['uid' => 'iN6LyQiYFEgbpCAB7Hskx', 'label' => 'Wisconsin', 'value' => '49'],
                    ['uid' => 'lklozLRaqRomgyuJ8FKcA', 'label' => 'Wyoming', 'value' => '50'],
                    ['uid' => 'ZU3WH9IqaPi3XEmZWVOgB', 'label' => 'Washington,D.C.', 'value' => '51'],
                ],
            ],
        ],
        'js' => <<<'TXT'
        "use strict";function _typeof(o){"@babel/helpers - typeof";return _typeof="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(o){return typeof o}:function(o){return o&&"function"==typeof Symbol&&o.constructor===Symbol&&o!==Symbol.prototype?"symbol":typeof o},_typeof(o)}var milisecondsInADay=24*60*60*1000;omni.define("getTaxFedEq",function(Inc,VarStat){var Brack1;var Brack2;var Brack3;var Brack4;var Brack5;var Brack6;var TaxRate0=0.1;var TaxRate1=0.12;var TaxRate2=0.22;var TaxRate3=0.24;var TaxRate4=0.32;var TaxRate5=0.35;var TaxRate6=0.37;var UnmarBrack1=12400;var UnmarBrack2=50400;var UnmarBrack3=105700;var UnmarBrack4=201775;var UnmarBrack5=256225;var UnmarBrack6=640600;var MarJointBrack1=24800;var MarJointBrack2=100800;var MarJointBrack3=211400;var MarJointBrack4=403500;var MarJointBrack5=512450;var MarJointBrack6=768700;var MarSepBrack1=12400;var MarSepBrack2=50400;var MarSepBrack3=105700;var MarSepBrack4=201775;var MarSepBrack5=256225;var MarSepBrack6=384350;var HeadBrack1=17700;var HeadBrack2=67450;var HeadBrack3=105700;var HeadBrack4=201775;var HeadBrack5=256200;var HeadBrack6=640600;var TaxFed;if(VarStat===1){Brack1=UnmarBrack1;Brack2=UnmarBrack2;Brack3=UnmarBrack3;Brack4=UnmarBrack4;Brack5=UnmarBrack5;Brack6=UnmarBrack6}if(VarStat===2){Brack1=MarJointBrack1;Brack2=MarJointBrack2;Brack3=MarJointBrack3;Brack4=MarJointBrack4;Brack5=MarJointBrack5;Brack6=MarJointBrack6}if(VarStat===3){Brack1=MarSepBrack1;Brack2=MarSepBrack2;Brack3=MarSepBrack3;Brack4=MarSepBrack4;Brack5=MarSepBrack5;Brack6=MarSepBrack6}if(VarStat===4){Brack1=HeadBrack1;Brack2=HeadBrack2;Brack3=HeadBrack3;Brack4=HeadBrack4;Brack5=HeadBrack5;Brack6=HeadBrack6}var Tax1=Brack1*TaxRate0;var Tax2=(Brack2-Brack1)*TaxRate1+Tax1;var Tax3=(Brack3-Brack2)*TaxRate2+Tax2;var Tax4=(Brack4-Brack3)*TaxRate3+Tax3;var Tax5=(Brack5-Brack4)*TaxRate4+Tax4;var Tax6=(Brack6-Brack5)*TaxRate5+Tax5;if(Inc<=Brack1){TaxFed=Inc*TaxRate0}else if(Inc>Brack1&&Inc<=Brack2){TaxFed=Tax1+(Inc-Brack1)*TaxRate1}else if(Inc>Brack2&&Inc<=Brack3){TaxFed=Tax2+(Inc-Brack2)*TaxRate2}else if(Inc>Brack3&&Inc<=Brack4){TaxFed=Tax3+(Inc-Brack3)*TaxRate3}else if(Inc>Brack4&&Inc<=Brack5){TaxFed=Tax4+(Inc-Brack4)*TaxRate4}else if(Inc>Brack5&&Inc<=Brack6){TaxFed=Tax5+(Inc-Brack5)*TaxRate5}else if(Inc>Brack6){TaxFed=Tax6+(Inc-Brack6)*TaxRate6}return TaxFed});omni.define("getTotTaxFed_24",function(EndDate,StartDate,VarTime,q,t,m,r,g,g_p,InDep,perPay,VarType,VarStat,varTax,VarSub,FinBal){console.log(EndDate);console.log(_typeof(EndDate));var VarTax=varTax/100;var PerPay=perPay;var periods=0;var eq_p=getPerEqRate(q,m,r);var dayInTerm=mathjs.floor(EndDate-StartDate);if(VarTime===1){periods=q*t};if(VarTime===2){periods=Math.ceil(dayInTerm/q)};if(VarSub===1){periods=getAnnuityPer(InDep,FinBal,PerPay,q,eq_p,VarType)};if(VarSub===2){PerPay=getPayOut(InDep,FinBal,periods,q,eq_p,g_p,g,VarType)};var k;var daysInMonth;var date;if(q===1){k=12}else if(q===2){k=6}else if(q===4){k=3}else if(q===12){k=1}else if(q===24){k=12/24}else if(q===52){k=12/52}else if(q===26){k=12/26}else if(q===365){k=12/365}var perChart=periods*k;var daysPassed=0;var DepBal=0;var iDep=0;var InBal=0;var TotBal=0;var TotBalOpen=0;var TotIntMonth=0;var TotBalOpenYear=InDep;var YearDep=0;var YearInt=0;var DepBalOpen=0;var InBalOpen=0;var dep_pow=0;var dep_powOpen=0;var TotCashFlow=0;var TotReturn=0;var TotTaxFed=0;var TotTaxFed_24=0;var TotTaxState=0;var g_month=getMonthlyGrowthRate(g);var TaxAmFed_24=0;var TaxAmFed=0;var TaxAmState=0;var NetPayOut=0;var yearChart=0;for(var i=0;i<=perChart;i++){date=new Date((StartDate+daysPassed)*milisecondsInADay);daysInMonth=getDaysInMonth(StartDate,date);if(i>0){daysPassed+=daysInMonth;dep_pow=i/12*q;if(q<=12){dep_powOpen=(i-k)/12*q}else{dep_powOpen=(i-1)/12*q}InBal=InDep*mathjs.pow(1+eq_p,dep_pow);InBalOpen=InDep*mathjs.pow(1+eq_p,dep_powOpen);DepBal=getBal(PerPay,dep_pow,q,eq_p,g_p,g,VarType);DepBalOpen=getBal(PerPay,dep_powOpen,q,eq_p,g_p,g,VarType);TotBal=InBal+DepBal;TotBalOpen=InBalOpen+DepBalOpen;if(i%k===0&&q<=12){iDep=PerPay*mathjs.pow(1+g_month,i-k);TotIntMonth=TotBal-TotBalOpen-iDep}if(i%k!==0&&q<=12){iDep=0;TotIntMonth=0}if(q>12){iDep=PerPay/k*mathjs.pow(1+g_month,i);TotIntMonth=TotBal-TotBalOpen-iDep}if(i%12===1){YearInt=0;YearDep=0}if(i%12===0){yearChart=1}else{yearChart=0}YearInt+=TotIntMonth;YearDep+=-iDep;TaxAmFed_24=YearDep*0.24;TaxAmFed=getTaxFed(YearDep,VarStat)-TaxAmFed_24;if(TaxAmFed<0){TaxAmFed=0}TotBalOpenYear=TotBal-YearDep-YearInt;if(i===12){TotBalOpenYear=InDep}TaxAmState=-iDep*VarTax;NetPayOut=-iDep-(TaxAmFed+TaxAmFed_24+TaxAmState);TotReturn+=TotIntMonth;TotCashFlow+=NetPayOut;TotTaxFed_24+=TaxAmFed_24;TotTaxFed+=TaxAmFed;TotTaxState+=TaxAmState}}return TotTaxFed_24});omni.define("getTotTaxFed",function(EndDate,StartDate,VarTime,q,t,m,r,g,g_p,InDep,perPay,VarType,VarStat,varTax,VarSub,FinBal){var VarTax=varTax/100;var PerPay=perPay;var periods=0;var eq_p=getPerEqRate(q,m,r);var dayInTerm=mathjs.floor(EndDate-StartDate);if(VarTime===1){periods=q*t};if(VarTime===2){periods=Math.ceil(dayInTerm/q)};if(VarSub===1){periods=getAnnuityPer(InDep,FinBal,PerPay,q,eq_p,VarType)};if(VarSub===2){PerPay=getPayOut(InDep,FinBal,periods,q,eq_p,g_p,g,VarType)};var k;var daysInMonth;var date;if(q===1){k=12}else if(q===2){k=6}else if(q===4){k=3}else if(q===12){k=1}else if(q===24){k=12/24}else if(q===52){k=12/52}else if(q===26){k=12/26}else if(q===365){k=12/365}var perChart=periods*k;var daysPassed=0;var DepBal=0;var iDep=0;var InBal=0;var TotBal=0;var TotBalOpen=0;var TotIntMonth=0;var TotBalOpenYear=InDep;var YearDep=0;var YearInt=0;var DepBalOpen=0;var InBalOpen=0;var dep_pow=0;var dep_powOpen=0;var TotCashFlow=0;var TotReturn=0;var TotTaxFed=0;var TotTaxFed_24=0;var TotTaxState=0;var g_month=getMonthlyGrowthRate(g);var TaxAmFed_24=0;var TaxAmFed=0;var TaxAmState=0;var NetPayOut=0;var yearChart=0;for(var i=0;i<=perChart;i++){date=new Date((StartDate+daysPassed)*milisecondsInADay);daysInMonth=getDaysInMonth(StartDate,date);if(i>0){daysPassed+=daysInMonth;dep_pow=i/12*q;if(q<=12){dep_powOpen=(i-k)/12*q}else{dep_powOpen=(i-1)/12*q}InBal=InDep*mathjs.pow(1+eq_p,dep_pow);InBalOpen=InDep*mathjs.pow(1+eq_p,dep_powOpen);DepBal=getBal(PerPay,dep_pow,q,eq_p,g_p,g,VarType);DepBalOpen=getBal(PerPay,dep_powOpen,q,eq_p,g_p,g,VarType);TotBal=InBal+DepBal;TotBalOpen=InBalOpen+DepBalOpen;if(i%k===0&&q<=12){iDep=PerPay*mathjs.pow(1+g_month,i-k);TotIntMonth=TotBal-TotBalOpen-iDep}if(i%k!==0&&q<=12){iDep=0;TotIntMonth=0}if(q>12){iDep=PerPay/k*mathjs.pow(1+g_month,i);TotIntMonth=TotBal-TotBalOpen-iDep}if(i%12===1){YearInt=0;YearDep=0}if(i%12===0){yearChart=1}else{yearChart=0}YearInt+=TotIntMonth;YearDep+=-iDep;TaxAmFed_24=YearDep*0.24;TaxAmFed=getTaxFed(YearDep,VarStat)-TaxAmFed_24;if(TaxAmFed<0){TaxAmFed=0}TotBalOpenYear=TotBal-YearDep-YearInt;if(i===12){TotBalOpenYear=InDep}TaxAmState=-iDep*VarTax;NetPayOut=-iDep-(TaxAmFed+TaxAmFed_24+TaxAmState);TotReturn+=TotIntMonth;TotCashFlow+=NetPayOut;TotTaxFed_24+=TaxAmFed_24;TotTaxFed+=TaxAmFed;TotTaxState+=TaxAmState}}return TotTaxFed});omni.define("getTotTaxState",function(EndDate,StartDate,VarTime,q,t,m,r,g,g_p,InDep,perPay,VarType,VarStat,varTax,VarSub,FinBal){var VarTax=varTax/100;var PerPay=perPay;var periods=0;var eq_p=getPerEqRate(q,m,r);var dayInTerm=mathjs.floor(EndDate-StartDate);if(VarTime===1){periods=q*t};if(VarTime===2){periods=Math.ceil(dayInTerm/q)};if(VarSub===1){periods=getAnnuityPer(InDep,FinBal,PerPay,q,eq_p,VarType)};if(VarSub===2){PerPay=getPayOut(InDep,FinBal,periods,q,eq_p,g_p,g,VarType)};var k;var daysInMonth;var date;if(q===1){k=12}else if(q===2){k=6}else if(q===4){k=3}else if(q===12){k=1}else if(q===24){k=12/24}else if(q===52){k=12/52}else if(q===26){k=12/26}else if(q===365){k=12/365}var perChart=periods*k;var daysPassed=0;var DepBal=0;var iDep=0;var InBal=0;var TotBal=0;var TotBalOpen=0;var TotIntMonth=0;var TotBalOpenYear=InDep;var YearDep=0;var YearInt=0;var DepBalOpen=0;var InBalOpen=0;var dep_pow=0;var dep_powOpen=0;var TotCashFlow=0;var TotReturn=0;var TotTaxFed=0;var TotTaxFed_24=0;var TotTaxState=0;var g_month=getMonthlyGrowthRate(g);var TaxAmFed_24=0;var TaxAmFed=0;var TaxAmState=0;var NetPayOut=0;var yearChart=0;for(var i=0;i<=perChart;i++){date=new Date((StartDate+daysPassed)*milisecondsInADay);daysInMonth=getDaysInMonth(StartDate,date);if(i>0){daysPassed+=daysInMonth;dep_pow=i/12*q;if(q<=12){dep_powOpen=(i-k)/12*q}else{dep_powOpen=(i-1)/12*q}InBal=InDep*mathjs.pow(1+eq_p,dep_pow);InBalOpen=InDep*mathjs.pow(1+eq_p,dep_powOpen);DepBal=getBal(PerPay,dep_pow,q,eq_p,g_p,g,VarType);DepBalOpen=getBal(PerPay,dep_powOpen,q,eq_p,g_p,g,VarType);TotBal=InBal+DepBal;TotBalOpen=InBalOpen+DepBalOpen;if(i%k===0&&q<=12){iDep=PerPay*mathjs.pow(1+g_month,i-k);TotIntMonth=TotBal-TotBalOpen-iDep}if(i%k!==0&&q<=12){iDep=0;TotIntMonth=0}if(q>12){iDep=PerPay/k*mathjs.pow(1+g_month,i);TotIntMonth=TotBal-TotBalOpen-iDep}if(i%12===1){YearInt=0;YearDep=0}if(i%12===0){yearChart=1}else{yearChart=0}YearInt+=TotIntMonth;YearDep+=-iDep;TaxAmFed_24=YearDep*0.24;TaxAmFed=getTaxFed(YearDep,VarStat)-TaxAmFed_24;if(TaxAmFed<0){TaxAmFed=0}TotBalOpenYear=TotBal-YearDep-YearInt;if(i===12){TotBalOpenYear=InDep}TaxAmState=-iDep*VarTax;NetPayOut=-iDep-(TaxAmFed+TaxAmFed_24+TaxAmState);TotReturn+=TotIntMonth;TotCashFlow+=NetPayOut;TotTaxFed_24+=TaxAmFed_24;TotTaxFed+=TaxAmFed;TotTaxState+=TaxAmState}}return TotTaxState});omni.define("getTotCashFlow",function(EndDate,StartDate,VarTime,q,t,m,r,g,g_p,InDep,perPay,VarType,VarStat,varTax,VarSub,FinBal){var VarTax=varTax/100;var PerPay=perPay;var periods=0;var eq_p=getPerEqRate(q,m,r);var dayInTerm=mathjs.floor(EndDate-StartDate);if(VarTime===1){periods=q*t};if(VarTime===2){periods=Math.ceil(dayInTerm/q)};if(VarSub===1){periods=getAnnuityPer(InDep,FinBal,PerPay,q,eq_p,VarType)};if(VarSub===2){PerPay=getPayOut(InDep,FinBal,periods,q,eq_p,g_p,g,VarType)};var k;var daysInMonth;var date;if(q===1){k=12}else if(q===2){k=6}else if(q===4){k=3}else if(q===12){k=1}else if(q===24){k=12/24}else if(q===52){k=12/52}else if(q===26){k=12/26}else if(q===365){k=12/365}var perChart=periods*k;var daysPassed=0;var DepBal=0;var iDep=0;var InBal=0;var TotBal=0;var TotBalOpen=0;var TotIntMonth=0;var TotBalOpenYear=InDep;var YearDep=0;var YearInt=0;var DepBalOpen=0;var InBalOpen=0;var dep_pow=0;var dep_powOpen=0;var TotCashFlow=0;var TotReturn=0;var TotTaxFed=0;var TotTaxFed_24=0;var TotTaxState=0;var g_month=getMonthlyGrowthRate(g);var TaxAmFed_24=0;var TaxAmFed=0;var TaxAmState=0;var NetPayOut=0;var yearChart=0;for(var i=0;i<=perChart;i++){date=new Date((StartDate+daysPassed)*milisecondsInADay);daysInMonth=getDaysInMonth(StartDate,date);if(i>0){daysPassed+=daysInMonth;dep_pow=i/12*q;if(q<=12){dep_powOpen=(i-k)/12*q}else{dep_powOpen=(i-1)/12*q}InBal=InDep*mathjs.pow(1+eq_p,dep_pow);InBalOpen=InDep*mathjs.pow(1+eq_p,dep_powOpen);DepBal=getBal(PerPay,dep_pow,q,eq_p,g_p,g,VarType);DepBalOpen=getBal(PerPay,dep_powOpen,q,eq_p,g_p,g,VarType);TotBal=InBal+DepBal;TotBalOpen=InBalOpen+DepBalOpen;if(i%k===0&&q<=12){iDep=PerPay*mathjs.pow(1+g_month,i-k);TotIntMonth=TotBal-TotBalOpen-iDep}if(i%k!==0&&q<=12){iDep=0;TotIntMonth=0}if(q>12){iDep=PerPay/k*mathjs.pow(1+g_month,i);TotIntMonth=TotBal-TotBalOpen-iDep}if(i%12===1){YearInt=0;YearDep=0}if(i%12===0){yearChart=1}else{yearChart=0}YearInt+=TotIntMonth;YearDep+=-iDep;TaxAmFed_24=YearDep*0.24;TaxAmFed=getTaxFed(YearDep,VarStat)-TaxAmFed_24;if(TaxAmFed<0){TaxAmFed=0}TotBalOpenYear=TotBal-YearDep-YearInt;if(i===12){TotBalOpenYear=InDep}TaxAmState=-iDep*VarTax;NetPayOut=-iDep-(TaxAmFed+TaxAmFed_24+TaxAmState);TotReturn+=TotIntMonth;TotCashFlow+=NetPayOut;TotTaxFed_24+=TaxAmFed_24;TotTaxFed+=TaxAmFed;TotTaxState+=TaxAmState}}return TotCashFlow});function getDaysInMonth(StartDate,date){var FirstDate=new Date(StartDate*milisecondsInADay);var daysInMonth;var day=FirstDate.getDate();var month=date.getMonth();var year=date.getFullYear();if(day<29&&month===0){daysInMonth=31}else if(day===29&&month===0){daysInMonth=30}else if(day===30&&month===0){daysInMonth=29}else if(day===31&&month===0){daysInMonth=28}else if(day<29&&month===1){daysInMonth=28}else if(day===29&&month===1){daysInMonth=29}else if(day===30&&month===1){daysInMonth=30}else if(day===31&&month===1){daysInMonth=31}else if(day<31&&month===2){daysInMonth=31}else if(day===31&&month===2){daysInMonth=30}else if(day<31&&month===3){daysInMonth=30}else if(day===31&&month===3){daysInMonth=31}else if(day<31&&month===4){daysInMonth=31}else if(day===31&&month===4){daysInMonth=30}else if(day<31&&month===5){daysInMonth=30}else if(day===31&&month===5){daysInMonth=31}else if(day<31&&month===6){daysInMonth=31}else if(day===31&&month===6){daysInMonth=31}else if(day<31&&month===7){daysInMonth=31}else if(day===31&&month===7){daysInMonth=30}else if(day<31&&month===8){daysInMonth=30}else if(day===31&&month===8){daysInMonth=31}else if(day<31&&month===9){daysInMonth=31}else if(day===31&&month===9){daysInMonth=30}else if(day<31&&month===10){daysInMonth=30}else if(day===31&&month===10){daysInMonth=31}else if(day<31&&month===11){daysInMonth=31}else if(day===31&&month===11){daysInMonth=31}if(year%4===0&&year%100!==0&&month===1||year%400===0&&month===1){daysInMonth=29}if(year%4===0&&year%100!==0&&month===0&&day===30||year%400===0&&month===0&&day===30){daysInMonth=30}if(year%4===0&&year%100!==0&&month===0&&day===31||year%400===0&&month===0&&day===31){daysInMonth=29}if(year%4===0&&year%100!==0&&month===0&&day===29||year%400===0&&month===0&&day===29){daysInMonth=31}if(day===29&&month===1&&day>29){daysInMonth=30}if(day===29&&month===1&&day>30){daysInMonth=31}if(day===28&&month===1&&day>30){daysInMonth=31}return daysInMonth}function getPerEqRate(q,m,r){var ex=Math.exp(1);var eq_p;var base;if(m===0){var continuous_r=mathjs.pow(ex,r)-1;m=1;base=1+continuous_r/m}else{base=1+r/m}var power=m/q;eq_p=mathjs.round(mathjs.pow(base,power)-1,10);return eq_p}function getMonthlyGrowthRate(g){var Max_iterations=50000;var Min_precision=1e-10;var g_month=g/12;var oldG;var newG=g_month;var iteration=0;do{oldG=newG;var dividend_g=mathjs.pow(1+newG,12)-(g+1);var divisor_g=12*mathjs.pow(g+1,11);newG=newG-dividend_g/divisor_g;++iteration}while(Math.abs(oldG-newG)>Min_precision&&iteration<=Max_iterations);return newG}function getTaxFed(Inc,VarStat){var Brack1;var Brack2;var Brack3;var Brack4;var Brack5;var Brack6;var TaxRate0=0.1;var TaxRate1=0.12;var TaxRate2=0.22;var TaxRate3=0.24;var TaxRate4=0.32;var TaxRate5=0.35;var TaxRate6=0.37;var UnmarBrack1=11600;var UnmarBrack2=47150;var UnmarBrack3=100525;var UnmarBrack4=191950;var UnmarBrack5=243725;var UnmarBrack6=609350;var MarJointBrack1=23200;var MarJointBrack2=94300;var MarJointBrack3=201050;var MarJointBrack4=383900;var MarJointBrack5=487450;var MarJointBrack6=731200;var MarSepBrack1=11600;var MarSepBrack2=47150;var MarSepBrack3=100525;var MarSepBrack4=191950;var MarSepBrack5=243725;var MarSepBrack6=365600;var HeadBrack1=16550;var HeadBrack2=63100;var HeadBrack3=100500;var HeadBrack4=191950;var HeadBrack5=243700;var HeadBrack6=609350;var TaxFed;if(VarStat===1){Brack1=UnmarBrack1;Brack2=UnmarBrack2;Brack3=UnmarBrack3;Brack4=UnmarBrack4;Brack5=UnmarBrack5;Brack6=UnmarBrack6}if(VarStat===2){Brack1=MarJointBrack1;Brack2=MarJointBrack2;Brack3=MarJointBrack3;Brack4=MarJointBrack4;Brack5=MarJointBrack5;Brack6=MarJointBrack6}if(VarStat===3){Brack1=MarSepBrack1;Brack2=MarSepBrack2;Brack3=MarSepBrack3;Brack4=MarSepBrack4;Brack5=MarSepBrack5;Brack6=MarSepBrack6}if(VarStat===4){Brack1=HeadBrack1;Brack2=HeadBrack2;Brack3=HeadBrack3;Brack4=HeadBrack4;Brack5=HeadBrack5;Brack6=HeadBrack6}var Tax1=Brack1*TaxRate0;var Tax2=(Brack2-Brack1)*TaxRate1+Tax1;var Tax3=(Brack3-Brack2)*TaxRate2+Tax2;var Tax4=(Brack4-Brack3)*TaxRate3+Tax3;var Tax5=(Brack5-Brack4)*TaxRate4+Tax4;var Tax6=(Brack6-Brack5)*TaxRate5+Tax5;if(Inc<=Brack1){TaxFed=Inc*TaxRate0}else if(Inc>Brack1&&Inc<=Brack2){TaxFed=Tax1+(Inc-Brack1)*TaxRate1}else if(Inc>Brack2&&Inc<=Brack3){TaxFed=Tax2+(Inc-Brack2)*TaxRate2}else if(Inc>Brack3&&Inc<=Brack4){TaxFed=Tax3+(Inc-Brack3)*TaxRate3}else if(Inc>Brack4&&Inc<=Brack5){TaxFed=Tax4+(Inc-Brack4)*TaxRate4}else if(Inc>Brack5&&Inc<=Brack6){TaxFed=Tax5+(Inc-Brack5)*TaxRate5}else if(Inc>Brack6){TaxFed=Tax6+(Inc-Brack6)*TaxRate6}return TaxFed}function getBal(PerPay,periods,q,eq_p,g_p,g,VarType){var DepBal;if(g_p!==eq_p&&q!==1){DepBal=PerPay*(mathjs.pow(1+eq_p,periods)-mathjs.pow(1+g_p,periods))*(1+eq_p*VarType)/(eq_p-g_p)}else if(g!==eq_p&&q===1){DepBal=PerPay*(mathjs.pow(1+eq_p,periods)-mathjs.pow(1+g,periods))*(1+eq_p*VarType)/(eq_p-g)}else if(g_p===eq_p){DepBal=PerPay*periods*mathjs.pow(1+eq_p,periods-1)*(1+eq_p*VarType)}return DepBal}function getPayOut(InDep,FinBal,periods,q,eq_p,g_p,g,VarType){var DepBal;var PerPay;var PrincBal=InDep*mathjs.pow(1+eq_p,periods);DepBal=FinBal-PrincBal;if(g_p!==eq_p&&q!==1){PerPay=DepBal/((mathjs.pow(1+eq_p,periods)-mathjs.pow(1+g_p,periods))*(1+eq_p*VarType)/(eq_p-g_p))}else if(g!==eq_p&&q===1){PerPay=DepBal/((mathjs.pow(1+eq_p,periods)-mathjs.pow(1+g,periods))*(1+eq_p*VarType)/(eq_p-g))}else if(g_p===eq_p){PerPay=DepBal/(periods*mathjs.pow(1+eq_p,periods-1)*(1+eq_p*VarType))}return PerPay}function getAnnuityPer(InDep,FinBal,PerPay,q,eq_p,VarType){var periods;PerPay=-PerPay;periods=mathjs.log((eq_p*(FinBal+PerPay*VarType)+PerPay)/(eq_p*InDep+PerPay*(1+eq_p*VarType)))/mathjs.log(eq_p+1);if(periods>0){periods=periods}else{periods=0}return periods}//# sourceURL=customJs.js
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        Mega Millions payout takes How much did you win?, Annuity rate and What is your filing status? and returns Lump sum before tax and Federal withholding at 24%. There is no hidden constant here: change lump sum before tax and how much did you win? moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Mega Millions payout calculator works', 'html' => <<<'TXT'
            <p>Mega Millions payout answers one question from 5 numbers, and the answer is Lump sum before tax, Federal withholding at 24% and Additional federal tax.</p><p>In the form&#039;s own words, Annual growth rate = (Periodic growth rate + 1)^(Payout frequency) − 1.</p><p>The answers are Lump sum before tax, Federal withholding at 24%, Additional federal tax and State tax; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 5 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>How much did you win?</strong> — a plain number, no unit</li><li><strong>Annuity rate</strong> — in percent. Set here the yearly revenue on your annuity. You can receive the annuity payout only if you have US citizenship and residency in the US.</li><li><strong>What is your filing status?</strong> — a plain number, no unit</li><li><strong>Where do you live?</strong> — a plain number, no unit. If you are a foreigner, consider the state in USA where your ticket was purchased.</li><li><strong>Lump sum payout percentage</strong> — in percent</li></ul><p>What you get back is Lump sum before tax, Federal withholding at 24%, Additional federal tax, State tax, Lump sum after tax, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — How much did you win? = 2.010e+8, Annuity rate = 4 perc, What is your filing status? = 1, Where do you live? = 3 and Lump sum payout percentage = 52 perc — through the same formula and the panel reports <strong>Compounding method</strong> = 1, <strong>Final balance</strong> = 0, <strong>Inflation rate</strong> = 0, <strong>Annuity payout</strong> = 1000, <strong>Display…</strong> = 2, <strong>Annuity payout option</strong> = 2, <strong>Show me…</strong> = 2, <strong>Set term by…</strong> = 1, <strong>Type of annuity</strong> = 0, <strong>Periodic growth rate</strong> = 0.05, <strong>Payout frequency</strong> = 1, <strong>Length of annuity</strong> = 9.467e+8, <strong>Annual growth rate</strong> = 0.05, <strong>Lump sum before tax</strong> = 1.045e+1, <strong>Federal withholding at 24%</strong> = 2.508e+9, <strong>Net cash 24</strong> = 7.944e+9, <strong>Gross payout diff</strong> = -1.025e+1, <strong>In dep ph</strong> = 2.010e+8, <strong>R ph</strong> = 4, <strong>Q ph</strong> = 1, <strong>Per pay ph</strong> = 1000, <strong>Fin bal ph</strong> = 0, <strong>G ph</strong> = 0.05, <strong>T ph</strong> = 30, <strong>G p ph</strong> = 0.05, <strong>Var Stat</strong> = 1, <strong>Var Tax</strong> = 3, <strong>Var Rep</strong> = 2, <strong>Var Sub</strong> = 2, <strong>Var Time</strong> = 1, <strong>Var Type</strong> = 0, <strong>Var Table</strong> = 2, <strong>M</strong> = 1, <strong>State tax</strong> = 3.136e+8, <strong>Var type ph</strong> = 0, <strong>M ph</strong> = 1, <strong>Var time ph</strong> = 1, <strong>Var sub ph</strong> = 2, <strong>Var tax ph</strong> = 3, <strong>Var stat ph</strong> = 1, <strong>Var rep ph</strong> = 2 and <strong>Var table ph</strong> = 2.</p><ul><li><strong>Compounding method</strong> = 1</li><li><strong>Final balance</strong> = 0</li><li><strong>Inflation rate</strong> = 0</li><li><strong>Annuity payout</strong> = 1000</li><li><strong>Display…</strong> = 2</li><li><strong>Annuity payout option</strong> = 2</li><li><strong>Show me…</strong> = 2</li><li><strong>Set term by…</strong> = 1</li><li><strong>Type of annuity</strong> = 0</li><li><strong>Periodic growth rate</strong> = 0.05</li><li><strong>Payout frequency</strong> = 1</li><li><strong>Length of annuity</strong> = 9.467e+8</li><li><strong>Annual growth rate</strong> = 0.05</li><li><strong>Lump sum before tax</strong> = 1.045e+1</li><li><strong>Federal withholding at 24%</strong> = 2.508e+9</li><li><strong>Net cash 24</strong> = 7.944e+9</li><li><strong>Gross payout diff</strong> = -1.025e+1</li><li><strong>In dep ph</strong> = 2.010e+8</li><li><strong>R ph</strong> = 4</li><li><strong>Q ph</strong> = 1</li><li><strong>Per pay ph</strong> = 1000</li><li><strong>Fin bal ph</strong> = 0</li><li><strong>G ph</strong> = 0.05</li><li><strong>T ph</strong> = 30</li><li><strong>G p ph</strong> = 0.05</li><li><strong>Var Stat</strong> = 1</li><li><strong>Var Tax</strong> = 3</li><li><strong>Var Rep</strong> = 2</li><li><strong>Var Sub</strong> = 2</li><li><strong>Var Time</strong> = 1</li><li><strong>Var Type</strong> = 0</li><li><strong>Var Table</strong> = 2</li><li><strong>M</strong> = 1</li><li><strong>State tax</strong> = 3.136e+8</li><li><strong>Var type ph</strong> = 0</li><li><strong>M ph</strong> = 1</li><li><strong>Var time ph</strong> = 1</li><li><strong>Var sub ph</strong> = 2</li><li><strong>Var tax ph</strong> = 3</li><li><strong>Var stat ph</strong> = 1</li><li><strong>Var rep ph</strong> = 2</li><li><strong>Var table ph</strong> = 2</li></ul><p>That is <strong>Annual growth rate</strong> = <code>(Periodic growth rate + 1)^(Payout frequency) − 1</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Compounding method</strong> = 1, <strong>Final balance</strong> = 0, <strong>Inflation rate</strong> = 0, <strong>Annuity payout</strong> = 1000, <strong>Display...</strong> = 2, <strong>Annuity payout option</strong> = 2, <strong>Show me...</strong> = 2, <strong>Set term by...</strong> = 1, <strong>Type of annuity</strong> = 0, <strong>Periodic growth rate</strong> = 0.05, <strong>Payout frequency</strong> = 1, <strong>Length of annuity</strong> = 9.467e+8, <strong>Annual growth rate</strong> = 0.05, <strong>Lump sum before tax</strong> = 1.045e+1, <strong>Federal withholding at 24%</strong> = 2.508e+9, <strong>Net cash 24</strong> = 7.944e+9, <strong>Gross payout diff</strong> = -1.025e+1, <strong>In dep ph</strong> = 2.010e+8, <strong>R ph</strong> = 4, <strong>Q ph</strong> = 1, <strong>Per pay ph</strong> = 1000, <strong>Fin bal ph</strong> = 0, <strong>G ph</strong> = 0.05, <strong>T ph</strong> = 30, <strong>G p ph</strong> = 0.05, <strong>Var Stat</strong> = 1, <strong>Var Tax</strong> = 3, <strong>Var Rep</strong> = 2, <strong>Var Sub</strong> = 2, <strong>Var Time</strong> = 1, <strong>Var Type</strong> = 0, <strong>Var Table</strong> = 2, <strong>M</strong> = 1, <strong>State tax</strong> = 3.136e+8, <strong>Var type ph</strong> = 0, <strong>M ph</strong> = 1, <strong>Var time ph</strong> = 1, <strong>Var sub ph</strong> = 2, <strong>Var tax ph</strong> = 3, <strong>Var stat ph</strong> = 1, <strong>Var rep ph</strong> = 2 and <strong>Var table ph</strong> = 2 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Annuity rate offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Annual growth rate</strong> = <code>(Periodic growth rate + 1)^(Payout frequency) − 1</code></li><li><strong>Payout frequency</strong> = <code>ln(Annual growth rate + 1) ÷ ln(Periodic growth rate + 1)</code></li><li><strong>Periodic growth rate</strong> = <code>(Annual growth rate + 1)^(1 ÷ Payout frequency) − 1</code></li><li><strong>Starting from…</strong> = <code>floor(Final payout on...)</code></li><li><strong>Lump sum before tax</strong> = <code>(Lump sum payout percentage × How much did you win?)</code></li><li><strong>Federal withholding at 24%</strong> = <code>((6 ÷ 25) × (Lump sum payout percentage × How much did you win?))</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Annual growth rate</strong> = <code>(Periodic growth rate + 1)^(Payout frequency) − 1</code> — the form to use when Payout frequency and Periodic growth rate are the values you have.</li><li><strong>Payout frequency</strong> = <code>ln(Annual growth rate + 1) ÷ ln(Periodic growth rate + 1)</code> — the form to use when Annual growth rate and Periodic growth rate are the values you have.</li><li><strong>Periodic growth rate</strong> = <code>(Annual growth rate + 1)^(1 ÷ Payout frequency) − 1</code> — the form to use when Annual growth rate and Payout frequency are the values you have.</li><li><strong>Starting from…</strong> = <code>floor(Final payout on...)</code> — the form to use when Final payout on… are the values you have.</li><li><strong>Lump sum before tax</strong> = <code>(Lump sum payout percentage × How much did you win?)</code> — the form to use when Lump sum payout percentage and How much did you win? are the values you have.</li><li><strong>Federal withholding at 24%</strong> = <code>((6 ÷ 25) × (Lump sum payout percentage × How much did you win?))</code> — the form to use when Lump sum payout percentage and How much did you win? are the values you have.</li><li><strong>Net cash 24</strong> = <code>((Lump sum payout percentage × How much did you win?) − ((6 ÷ 25) × (Lump sum payout percentage × How much did you win?)))</code> — the form to use when Lump sum payout percentage and How much did you win? are the values you have.</li><li><strong>Tax fed cash ph</strong> = <code>(getTaxFedEq((Lump sum payout percentage × How much did you win?), Var Stat) − ((6 ÷ 25) × (Lump sum payout percentage × How much did you win?)))</code> — the form to use when Lump sum payout percentage, How much did you win? and Var Stat are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Annual growth rate, Payout frequency and Periodic growth rate can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double How much did you win? from 2.010e+8 to 4.020e+8, leaving every other box alone. The panel moves from <strong>Compounding method</strong> 1, <strong>Final balance</strong> 0, <strong>Inflation rate</strong> 0, <strong>Annuity payout</strong> 1000, <strong>Display...</strong> 2, <strong>Annuity payout option</strong> 2, <strong>Show me...</strong> 2, <strong>Set term by...</strong> 1, <strong>Type of annuity</strong> 0, <strong>Periodic growth rate</strong> 0.05, <strong>Payout frequency</strong> 1, <strong>Length of annuity</strong> 9.467e+8, <strong>Annual growth rate</strong> 0.05, <strong>Lump sum before tax</strong> 1.045e+1, <strong>Federal withholding at 24%</strong> 2.508e+9, <strong>Net cash 24</strong> 7.944e+9, <strong>Gross payout diff</strong> -1.025e+1, <strong>In dep ph</strong> 2.010e+8, <strong>R ph</strong> 4, <strong>Q ph</strong> 1, <strong>Per pay ph</strong> 1000, <strong>Fin bal ph</strong> 0, <strong>G ph</strong> 0.05, <strong>T ph</strong> 30, <strong>G p ph</strong> 0.05, <strong>Var Stat</strong> 1, <strong>Var Tax</strong> 3, <strong>Var Rep</strong> 2, <strong>Var Sub</strong> 2, <strong>Var Time</strong> 1, <strong>Var Type</strong> 0, <strong>Var Table</strong> 2, <strong>M</strong> 1, <strong>State tax</strong> 3.136e+8, <strong>Var type ph</strong> 0, <strong>M ph</strong> 1, <strong>Var time ph</strong> 1, <strong>Var sub ph</strong> 2, <strong>Var tax ph</strong> 3, <strong>Var stat ph</strong> 1, <strong>Var rep ph</strong> 2 and <strong>Var table ph</strong> 2 to <strong>Compounding method</strong> 1, <strong>Final balance</strong> 0, <strong>Inflation rate</strong> 0, <strong>Annuity payout</strong> 1000, <strong>Display...</strong> 2, <strong>Annuity payout option</strong> 2, <strong>Show me...</strong> 2, <strong>Set term by...</strong> 1, <strong>Type of annuity</strong> 0, <strong>Periodic growth rate</strong> 0.05, <strong>Payout frequency</strong> 1, <strong>Length of annuity</strong> 9.467e+8, <strong>Annual growth rate</strong> 0.05, <strong>Lump sum before tax</strong> 2.090e+1, <strong>Federal withholding at 24%</strong> 5.017e+9, <strong>Net cash 24</strong> 1.589e+1, <strong>Gross payout diff</strong> -2.050e+1, <strong>In dep ph</strong> 4.020e+8, <strong>R ph</strong> 4, <strong>Q ph</strong> 1, <strong>Per pay ph</strong> 1000, <strong>Fin bal ph</strong> 0, <strong>G ph</strong> 0.05, <strong>T ph</strong> 30, <strong>G p ph</strong> 0.05, <strong>Var Stat</strong> 1, <strong>Var Tax</strong> 3, <strong>Var Rep</strong> 2, <strong>Var Sub</strong> 2, <strong>Var Time</strong> 1, <strong>Var Type</strong> 0, <strong>Var Table</strong> 2, <strong>M</strong> 1, <strong>State tax</strong> 6.271e+8, <strong>Var type ph</strong> 0, <strong>M ph</strong> 1, <strong>Var time ph</strong> 1, <strong>Var sub ph</strong> 2, <strong>Var tax ph</strong> 3, <strong>Var stat ph</strong> 1, <strong>Var rep ph</strong> 2 and <strong>Var table ph</strong> 2.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Annuity rate and Lump sum payout percentage is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Lump sum before tax, Federal withholding at 24% and Additional federal tax are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>How much did you win? left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If How much did you win? is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Annuity rate left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Annuity rate is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert How much did you win? to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Lump sum before tax is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It counts in whole days.</strong> Dates are compared as calendar days, not as moments: two dates that differ by a few hours on the same day give the same answer, and there is no time-of-day input to set.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes How much did you win?, Annuity rate and What is your filing status? are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: How much did you win?, Annuity rate and What is your filing status? measured, Lump sum before tax and Federal withholding at 24% wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/cap-rate">Cap rate Calculator</a>, <a href="/finance/capital-gains-tax-uk">Capital gains tax UK Calculator</a> and <a href="/finance/capital-gains-yield">Capital gains yield</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Mega Millions payout calculator work out?', 'a' => <<<'TXT'
            Lump sum before tax, Federal withholding at 24%, Additional federal tax and State tax, from Payout frequency and Periodic growth rate. The relationship is Annual growth rate = (Periodic growth rate + 1)^(Payout frequency) − 1.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            How much did you win?, Annuity rate (percent), What is your filing status?, Where do you live?, Lump sum payout percentage (percent). Fill how much did you win?, annuity rate and what is your filing status? and leave Lump sum before tax empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Annual growth rate, Payout frequency, Periodic growth rate and Starting from… can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Compounding method = 1, Final balance = 0, Inflation rate = 0, Annuity payout = 1000, Display… = 2, Annuity payout option = 2, Show me… = 2, Set term by… = 1, Type of annuity = 0, Periodic growth rate = 0.05, Payout frequency = 1, Length of annuity = 9.467e+8, Annual growth rate = 0.05, Lump sum before tax = 1.045e+1, Federal withholding at 24% = 2.508e+9, Net cash 24 = 7.944e+9, Gross payout diff = -1.025e+1, In dep ph = 2.010e+8, R ph = 4, Q ph = 1, Per pay ph = 1000, Fin bal ph = 0, G ph = 0.05, T ph = 30, G p ph = 0.05, Var Stat = 1, Var Tax = 3, Var Rep = 2, Var Sub = 2, Var Time = 1, Var Type = 0, Var Table = 2, M = 1, State tax = 3.136e+8, Var type ph = 0, M ph = 1, Var time ph = 1, Var sub ph = 2, Var tax ph = 3, Var stat ph = 1, Var rep ph = 2 and Var table ph = 2. That comes from the page's own defaults, entered in How much did you win?; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Lump sum before tax is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With How much did you win? left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Lump sum before tax keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/cap-rate', 'name' => 'Cap rate Calculator'],
            ['path' => '/finance/capital-gains-tax-uk', 'name' => 'Capital gains tax UK Calculator'],
            ['path' => '/finance/capital-gains-yield', 'name' => 'Capital gains yield'],
        ],
        'authors' => [],
    ],
];
