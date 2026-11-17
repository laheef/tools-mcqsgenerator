<?php

/**
 * Savings
 * /finance/savings
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Savings',
    'meta' => ['title' => 'Savings Calculator: Formula, Steps & Examples', 'description' => 'Savings turns i would like to know my: and known rate into final balance. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Savings Calculator', 'updated' => '2026-09-02'],
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
                            'label' => 'I would like to know my:',
                            'type' => 'select',
                            'options' => [
                                'Savings balance' => '1',
                                'Initial deposit' => '2',
                                'Additional deposit' => '3',
                                'Time length' => '4',
                                'Interest rate' => '5',
                            ],
                            'dataset' => 'Like to know',
                            'control' => 'DROPDOWN',
                            'default' => 'Savings balance',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'subject2',
                            'label' => 'Known rate',
                            'type' => 'select',
                            'options' => ['Interest rate' => '1', 'Annual percentage yield (APY)' => '2'],
                            'default' => 'Interest rate',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Main specifications',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'FinalBal_adj',
                            'label' => 'Desired savings',
                            'type' => 'number',
                            'help' => 'The future value (FV) of your savings. Note that it will be your desired inflation-adjusted balance in case you set the annual inflation rate.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '20000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'InitialDep',
                            'label' => 'Initial savings',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '1000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'r',
                            'label' => 'Annual nominal interest rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1.3',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'apy',
                            'label' => 'Annual percentage yield (APY)',
                            'type' => 'number',
                            'help' => 'Includes compounding.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1.95',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 't',
                            'label' => 'Time length',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrsmos',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '72',
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
                                'Yearly' => '1',
                                'Semi-annually' => '2',
                                'Quarterly' => '4',
                                'Monthly' => '12',
                                'Weekly' => '52.1775',
                                'Daily' => '365.242',
                                'Continuous' => '0',
                            ],
                            'control' => 'DROPDOWN',
                            'help' => 'You can set here how often the interest is calculated on your balance.',
                            'default' => 'Monthly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'enableInfl',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Adjust inflation and growth rate' => '1', '' => '0'],
                            'dataset' => 'adjustInflationAndGrowth',
                            'control' => 'CHECKBOX',
                            'default' => '',
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
            'title' => 'Additional deposits',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PeriodicDep',
                            'label' => 'How much?',
                            'type' => 'number',
                            'help' => 'The amount of periodic deposit added to your savings.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '100',
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
                                'Quarterly' => '4',
                                'Monthly' => '12',
                                'Bi-weekly' => '26.08875',
                                'Weekly' => '52.1775',
                                'Daily' => '365.242',
                                'Never' => '1000',
                            ],
                            'dataset' => 'q How often',
                            'control' => 'DROPDOWN',
                            'help' => 'Here you can set the regularity of the additional deposits.',
                            'default' => 'Monthly',
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
                            'options' => ['Beginning of period' => '1', 'End of period' => '0'],
                            'dataset' => 'Type',
                            'help' => 'You can set here the timing of the additional deposits.',
                            'default' => 'Beginning of period',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'g',
                            'label' => 'Annual growth rate',
                            'type' => 'number',
                            'help' => 'The percentage growth rate of your additional periodic deposits over a year.',
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
                            'label' => 'Periodic growth rate',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            The percentage growth rate of your periodic contributions. Note that periodic and annual growth rates are linked together: if you set one, the other will be calculated according to the regularity of your additional deposit.
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
            'title' => 'Savings details',
            'note' => '',
            'blocks' => [],
        ],
        [
            'title' => 'Hidden (checks)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ct1',
                            'label' => 'ct1',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fn1',
                            'label' => 'Fn1',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fn2',
                            'label' => 'Fn2',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fn3',
                            'label' => 'Fn3',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fn4',
                            'label' => 'Fn4',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fn5',
                            'label' => 'Fn5',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fn6',
                            'label' => 'Fn6',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fn7',
                            'label' => 'Fn7',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fn8',
                            'label' => 'Fn8',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fn9',
                            'label' => 'Fn9',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fn10',
                            'label' => 'Fn10',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fn11',
                            'label' => 'Fn11',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fn12',
                            'label' => 'Fn12',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fn13',
                            'label' => 'Fn13',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fn14',
                            'label' => 'Fn14',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fn15',
                            'label' => 'Fn15',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fn16',
                            'label' => 'Fn16',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fn17',
                            'label' => 'Fn17',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fn18',
                            'label' => 'Fn18',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fn19',
                            'label' => 'Fn19',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fn20',
                            'label' => 'Fn20',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fn21',
                            'label' => 'Fn21',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fn22',
                            'label' => 'Fn22',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fn23',
                            'label' => 'Fn23',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fn24',
                            'label' => 'Fn24',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fn25',
                            'label' => 'Fn25',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fn26',
                            'label' => 'Fn26',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fn27',
                            'label' => 'Fn27',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fn28',
                            'label' => 'Fn28',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fn29',
                            'label' => 'Fn29',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fn30',
                            'label' => 'Fn30',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fn31',
                            'label' => 'Fn31',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fn32',
                            'label' => 'Fn32',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fn33',
                            'label' => 'Fn33',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fn34',
                            'label' => 'Fn34',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fn35',
                            'label' => 'Fn35',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fn36',
                            'label' => 'Fn36',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fn37',
                            'label' => 'Fn37',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fn38',
                            'label' => 'Fn38',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fn39',
                            'label' => 'Fn39',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fn40',
                            'label' => 'Fn40',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'runSavings',
                            'label' => 'Run savings',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'annualPercentageYield',
                            'label' => 'Annual percentage yield',
                            'type' => 'number',
                            'rounding' => ['standard', '4'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'finalSavings',
                            'label' => 'Final savings',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'additionalDepositRequired',
                            'label' => 'Additional deposit required',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'finalNominalValue',
                            'label' => 'Final nominal value',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'finalSavingsReal',
                            'label' => 'Final savings real',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'initialDepositRequired',
                            'label' => 'Initial deposit required',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'interestFromSavings',
                            'label' => 'Interest from savings',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'nominalInterest',
                            'label' => 'Nominal interest',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'realInterest',
                            'label' => 'Real interest',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'realLoss',
                            'label' => 'Real loss',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'requiredAPY',
                            'label' => 'Required apy',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'requiredInterestRate',
                            'label' => 'Required interest rate',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sumAdditionalDeposits',
                            'label' => 'Sum additional deposits',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'timeToReachDays',
                            'label' => 'Time to reach days',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'timeToReachMonths',
                            'label' => 'Time to reach months',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'timeToReachYears',
                            'label' => 'Time to reach years',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'totalInterestGained',
                            'label' => 'Total interest gained',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'totalPrincipal',
                            'label' => 'Total principal',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'chartInitialDeposit',
                            'label' => 'Chart initial deposit',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'chartTotalDeposits',
                            'label' => 'Chart total deposits',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'chartTotalInterest',
                            'label' => 'Chart total interest',
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
                            'name' => 'finalSavings',
                            'label' => 'Final balance',
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
                            'name' => 'finalSavingsReal',
                            'label' => 'Final balance in today\'s money',
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
                            'name' => 'totalPrincipal',
                            'label' => 'Total principal (initial plus deposits)',
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
                            'name' => 'sumAdditionalDeposits',
                            'label' => 'Sum of the additional deposits',
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
                            'name' => 'totalInterestGained',
                            'label' => 'Total interest earned',
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
                            'name' => 'annualPercentageYield',
                            'label' => 'Annual percentage yield (APY), %',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['standard', '4'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'timeToReachYears',
                            'label' => 'Time to reach the target, years',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'timeToReachMonths',
                            'label' => 'Time to reach the target, months',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'timeToReachDays',
                            'label' => 'Time to reach the target, days',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'initialDepositRequired',
                            'label' => 'Initial deposit needed',
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
                            'name' => 'additionalDepositRequired',
                            'label' => 'Additional deposit needed',
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
            'results' => ['g_p' => 'pow(g + 1, 1/q) - 1', 'g' => 'pow(g_p + 1, q) - 1', 'q' => 'log(g + 1)/log(g_p + 1)'],
        ],
        [
            'title' => 'runSavings = savingsCalc(InitialDep,PeriodicDep,FinalBal_adj,t,r,apy,compound_frequency,q,subject,subject2,g,type,g_p,ct1,infl)',
            'results' => ['runSavings' => 'savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl)'],
        ],
        [
            'title' => 'annualPercentageYield = getAnnualPercentageYield(runSavings)',
            'results' => ['annualPercentageYield' => 'getAnnualPercentageYield(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'finalSavings = getFinalSavings(runSavings)',
            'results' => ['finalSavings' => 'getFinalSavings(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'finalSavingsReal = getFinalSavingsReal(runSavings)',
            'results' => ['finalSavingsReal' => 'getFinalSavingsReal(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'initialDepositRequired = getInitialDepositRequired(runSavings)',
            'results' => ['initialDepositRequired' => 'getInitialDepositRequired(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'additionalDepositRequired = getAdditionalDepositRequired(runSavings)',
            'results' => ['additionalDepositRequired' => 'getAdditionalDepositRequired(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'timeToReachMonths = getTimeToReachMonths(runSavings)',
            'results' => ['timeToReachMonths' => 'getTimeToReachMonths(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'timeToReachDays = getTimeToReachDays(runSavings)',
            'results' => ['timeToReachDays' => 'getTimeToReachDays(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'timeToReachYears = getTimeToReachYears(runSavings)',
            'results' => ['timeToReachYears' => 'getTimeToReachYears(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'requiredInterestRate = getRequiredInterestRate(runSavings)',
            'results' => ['requiredInterestRate' => 'getRequiredInterestRate(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'requiredAPY = getRequiredAPY(runSavings)',
            'results' => ['requiredAPY' => 'getRequiredAPY(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'totalPrincipal = getTotalPrincipal(runSavings)',
            'results' => ['totalPrincipal' => 'getTotalPrincipal(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'sumAdditionalDeposits = getSumAdditionalDeposits(runSavings)',
            'results' => ['sumAdditionalDeposits' => 'getSumAdditionalDeposits(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'totalInterestGained = getTotalInterestGained(runSavings)',
            'results' => ['totalInterestGained' => 'getTotalInterestGained(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'interestFromSavings = getInterestFromSavings(runSavings)',
            'results' => ['interestFromSavings' => 'getInterestFromSavings(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'nominalInterest = getNominalInterest(runSavings)',
            'results' => ['nominalInterest' => 'getNominalInterest(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'realInterest = getRealInterest(runSavings)',
            'results' => ['realInterest' => 'getRealInterest(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'realLoss = getRealLoss(runSavings)',
            'results' => ['realLoss' => 'getRealLoss(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'finalNominalValue = getFinalNominalValue(runSavings)',
            'results' => ['finalNominalValue' => 'getFinalNominalValue(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'chartInitialDeposit = getChartInitialDeposit(runSavings)',
            'results' => ['chartInitialDeposit' => 'getChartInitialDeposit(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'chartTotalDeposits = getChartTotalDeposits(runSavings)',
            'results' => ['chartTotalDeposits' => 'getChartTotalDeposits(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'chartTotalInterest  = getChartTotalInterest(runSavings)',
            'results' => ['chartTotalInterest' => 'getChartTotalInterest(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'fn1 = fl1(runSavings)',
            'results' => ['fn1' => 'fl1(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'fn2 = fl2(runSavings)',
            'results' => ['fn2' => 'fl2(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'fn3 = fl3(runSavings)',
            'results' => ['fn3' => 'fl3(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'fn4 = fl4(runSavings)',
            'results' => ['fn4' => 'fl4(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'fn5 = fl5(runSavings)',
            'results' => ['fn5' => 'fl5(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'fn6 = fl6(runSavings)',
            'results' => ['fn6' => 'fl6(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'fn7 = fl7(runSavings)',
            'results' => ['fn7' => 'fl7(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'fn8 = fl8(runSavings)',
            'results' => ['fn8' => 'fl8(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'fn9 = fl9(runSavings)',
            'results' => ['fn9' => 'fl9(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'fn10 = fl10(runSavings)',
            'results' => ['fn10' => 'fl10(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'fn11 = fl11(runSavings)',
            'results' => ['fn11' => 'fl11(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'fn12 = fl12(runSavings)',
            'results' => ['fn12' => 'fl12(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'fn13 = fl13(runSavings)',
            'results' => ['fn13' => 'fl13(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'fn14 = fl14(runSavings)',
            'results' => ['fn14' => 'fl14(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'fn15 = fl15(runSavings)',
            'results' => ['fn15' => 'fl15(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'fn16 = fl16(runSavings)',
            'results' => ['fn16' => 'fl16(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'fn17 = fl17(runSavings)',
            'results' => ['fn17' => 'fl17(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'fn18 = fl18(runSavings)',
            'results' => ['fn18' => 'fl18(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'fn19 = fl19(runSavings)',
            'results' => ['fn19' => 'fl19(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'fn20 = fl20(runSavings)',
            'results' => ['fn20' => 'fl20(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'fn21 = fl21(runSavings)',
            'results' => ['fn21' => 'fl21(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'fn22 = fl22(runSavings)',
            'results' => ['fn22' => 'fl22(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'fn23 = fl23(runSavings)',
            'results' => ['fn23' => 'fl23(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'fn24 = fl24(runSavings)',
            'results' => ['fn24' => 'fl24(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'fn25 = fl25(runSavings)',
            'results' => ['fn25' => 'fl25(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'fn26 = fl26(runSavings)',
            'results' => ['fn26' => 'fl26(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'fn27 = fl27(runSavings)',
            'results' => ['fn27' => 'fl27(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'fn28 = fl28(runSavings)',
            'results' => ['fn28' => 'fl28(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'fn29 = fl29(runSavings)',
            'results' => ['fn29' => 'fl29(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'fn30 = fl30(runSavings)',
            'results' => ['fn30' => 'fl30(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'fn31 = fl31(runSavings)',
            'results' => ['fn31' => 'fl31(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'fn32 = fl32(runSavings)',
            'results' => ['fn32' => 'fl32(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'fn33 = fl33(runSavings)',
            'results' => ['fn33' => 'fl33(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'fn34 = fl34(runSavings)',
            'results' => ['fn34' => 'fl34(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'fn35 = fl35(runSavings)',
            'results' => ['fn35' => 'fl35(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'fn36 = fl36(runSavings)',
            'results' => ['fn36' => 'fl36(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'fn37 = fl37(runSavings)',
            'results' => ['fn37' => 'fl37(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'fn38 = fl38(runSavings)',
            'results' => ['fn38' => 'fl38(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'fn39 = fl39(runSavings)',
            'results' => ['fn39' => 'fl39(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
        [
            'title' => 'fn40 = fl40(runSavings)',
            'results' => ['fn40' => 'fl40(savingsCalc(InitialDep, PeriodicDep, FinalBal_adj, t, r, apy, compound_frequency, q, subject, subject2, g, type, g_p, ct1, infl))'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";var MAX_ITERATIONS=5000;var MIN_PRECISION=1e-7;var annualPercentageYield=0;var finalSavings=0;var finalSavingsReal=0;var initialDepositRequired=0;var additionalDepositRequired=0;var timeToReachMonths=0;var timeToReachDays=0;var timeToReachYears=0;var requiredInterestRate=0;var requiredAPY=0;var sumAdditionalDeposits=0;var totalPrincipal=0;var totalInterestGained=0;var interestFromSavings=0;var nominalInterest=0;var realInterest=0;var realLoss=0;var finalNominalValue=0;var chartInitialDeposit=0;var chartTotalDeposits=0;var chartTotalInterest=0;var select1=2;var a1=0,a2=0,a3=0,a4=0,a5=0;var a6=0,a7=0,a8=0,a9=0,a10=0;var a11=0,a12=0,a13=0,a14=0,a15=0;var a16=0,a17=0,a18=0,a19=0,a20=0;var a21=0,a22=0,a23=0,a24=0,a25=0;var a26=0,a27=0,a28=0,a29=0,a30=0;var a31=0,a32=0,a33=0,a34=0,a35=0;var a36=0,a37=0,a38=0,a39=0,a40=0;omni.define("savingsCalc",function(_InitialDep,_PeriodicDep,_FinalBal_adj,_t,_r,_apy,_compound_frequency,_q,_subject,_subject2,_g,_type,_g_p,_ct1,_infl){var days=0,months=0;var InitialDep=Number(_InitialDep);var PeriodicDep=Number(_PeriodicDep);var FinalBal_adj=Number(_FinalBal_adj);var t=Number(_t);var r=Number(_r);var apy=Number(_apy);var compound_frequency=Number(_compound_frequency);var q=Number(_q);var subject=Number(_subject);var subject2=Number(_subject2);var g=Number(_g);var type=Number(_type);var g_p=Number(_g_p);var ct1=Number(_ct1);var infl=Number(_infl);a1=0,a2=0,a3=0,a4=0,a5=0;a6=0,a7=0,a8=0,a9=0,a10=0;a11=0,a12=0,a13=0,a14=0,a15=0;a16=0,a17=0,a18=0,a19=0,a20=0;a21=0,a22=0,a23=0,a24=0,a25=0;a26=0,a27=0,a28=0,a29=0,a30=0;a31=0,a32=0,a33=0,a34=0,a35=0;a36=0,a37=0,a38=0,a39=0,a40=0;var my_r=r;var eq_p_var5;var DepositBal;var chart;var PrincipalBal;var FinalBal;var apy2;var ex=Math.E;var guess=apy;var Final_real;if(compound_frequency===0){apy2=mathjs.pow(ex,my_r)-1}else{apy2=mathjs.pow(1+my_r/compound_frequency,compound_frequency)-1}var eq_p2;var old_r;var new_r=guess;var iteration_r=0;do{old_r=new_r;if(ct1===0){var dividend_r=Math.pow(ex,new_r)-1-apy;var divisor_r=Math.pow(ex,new_r);new_r=new_r-dividend_r/divisor_r}else{var dividend_r2=Math.pow(1+new_r/compound_frequency,compound_frequency)-1-apy;var divisor_r2=Math.pow(1+new_r/compound_frequency,compound_frequency-1);new_r=new_r-dividend_r2/divisor_r2}++iteration_r}while(Math.abs(old_r-new_r)>MIN_PRECISION&&iteration_r<=MAX_ITERATIONS);if(subject2===2){my_r=new_r}var eq_base;var compound_frequency_local=compound_frequency;if(compound_frequency===0){var continuous_r=mathjs.pow(ex,my_r)-1;compound_frequency_local=1;eq_base=1+continuous_r/compound_frequency_local}else{eq_base=1+my_r/compound_frequency_local}var eq_power=compound_frequency_local/q;var eq_p=Math.pow(eq_base,eq_power)-1;var periods=q*t;if(subject===3&&0<FinalBal_adj&&subject2===1&&subject<5){chart=1;a1=1;annualPercentageYield=mathjs.round(apy2*100,2)}if(subject===2&&PeriodicDep*periods<FinalBal_adj&&subject2===1){chart=1;a2=1;annualPercentageYield=mathjs.round(apy2*100,2)}if(subject===1&&(InitialDep>0||PeriodicDep>0)&&subject2===1&&subject<5){chart=1;a3=1;annualPercentageYield=mathjs.round(apy2*100,2)}if(subject===4&&InitialDep<FinalBal_adj&&subject2===1&&subject<5){chart=1;a4=1;annualPercentageYield=mathjs.round(apy2*100,2)}if(subject===1){if(q===1000){PeriodicDep=0}PrincipalBal=InitialDep*Math.pow(1+eq_p,periods);if(g!==eq_p&&q!==1){DepositBal=PeriodicDep*(Math.pow(1+eq_p,periods)-Math.pow(1+g_p,periods))*(1+eq_p*type)/(eq_p-g_p)}else if(g!==eq_p&&q===1){DepositBal=PeriodicDep*(Math.pow(1+eq_p,periods)-Math.pow(1+g,periods))*(1+eq_p*type)/(eq_p-g)}else if(g===eq_p){DepositBal=PeriodicDep*periods*Math.pow(1+eq_p,periods-1)*(1+eq_p*type)}FinalBal=PrincipalBal+DepositBal;Final_real=FinalBal/mathjs.pow(1+infl,t);if((InitialDep>0||PeriodicDep>0)&&infl===0){chart=1;a5=1;finalSavings=mathjs.round(FinalBal,2)}else if((InitialDep>0||PeriodicDep>0)&&infl>0){chart=1;a6=1;finalSavings=mathjs.round(FinalBal,2);finalSavingsReal=mathjs.round(Final_real,2)}else{chart=0;a7=1}}else if(subject===2){if(q===1000){PeriodicDep=0}if(g!==eq_p&&q!==1){DepositBal=PeriodicDep*(Math.pow(1+eq_p,periods)-Math.pow(1+g_p,periods))*(1+eq_p*type)/(eq_p-g_p)}else if(g!==eq_p&&q===1){DepositBal=PeriodicDep*(Math.pow(1+eq_p,periods)-Math.pow(1+g,periods))*(1+eq_p*type)/(eq_p-g)}else if(g===eq_p){DepositBal=PeriodicDep*periods*Math.pow(1+eq_p,periods-1)*(1+eq_p*type)}FinalBal=FinalBal_adj*mathjs.pow(1+infl,t);PrincipalBal=FinalBal-DepositBal;InitialDep=PrincipalBal/Math.pow(1+eq_p,periods);if(FinalBal===0){chart=0;a8=1}else if(InitialDep>=0&&infl===0){chart=1;a9=1;initialDepositRequired=mathjs.round(InitialDep,2)}else if(InitialDep>=0&&infl>0){chart=1;a10=1;initialDepositRequired=mathjs.round(InitialDep,2)}else{chart=0;a11=1}}else if(subject===3){FinalBal=FinalBal_adj*mathjs.pow(1+infl,t);PrincipalBal=InitialDep*Math.pow(1+eq_p,periods);DepositBal=FinalBal-PrincipalBal;if(g!==eq_p&&q!==1){PeriodicDep=DepositBal/((Math.pow(1+eq_p,periods)-Math.pow(1+g_p,periods))*(1+eq_p*type)/(eq_p-g_p))}else if(g!==eq_p&&q===1){PeriodicDep=DepositBal/((Math.pow(1+eq_p,periods)-Math.pow(1+g,periods))*(1+eq_p*type)/(eq_p-g))}else if(g===eq_p){PeriodicDep=DepositBal/(periods*Math.pow(1+eq_p,periods-1)*(1+eq_p*type))}if(PeriodicDep>0&&infl===0&&q!==1000){chart=1;a12=1;additionalDepositRequired=mathjs.round(PeriodicDep,2)}else if(PeriodicDep>0&&infl>0&&q!==1000){chart=1;a13=1;additionalDepositRequired=mathjs.round(PeriodicDep,2)}else if(q===1000){chart=0;a14=1}else{chart=0;a15=1}}else if(subject===4){g=0;infl=0;if(q===1000){PeriodicDep=0}if(InitialDep>0||PeriodicDep>0){FinalBal=FinalBal_adj*mathjs.pow(1+infl,t);PrincipalBal=InitialDep*Math.pow(1+eq_p,periods);DepositBal=FinalBal-PrincipalBal;periods=Math.log((eq_p*(FinalBal+PeriodicDep*type)+PeriodicDep)/(eq_p*InitialDep+PeriodicDep*(1+eq_p*type)))/Math.log(eq_p+1);t=periods/q}months=(t-Math.trunc(t))*12;days=(months-Math.trunc(months))*365.242/12;if(InitialDep+PeriodicDep<=0){chart=0;a16=1}else if(InitialDep>=FinalBal){chart=0;a17=1}else if(Math.trunc(t)===0&&Math.trunc(months)!==0&&Math.trunc(days)!==0){chart=1;a18=1;timeToReachMonths=mathjs.round(Math.trunc(months),2);timeToReachDays=mathjs.round(Math.trunc(days),2)}else if(Math.trunc(months)===0&&Math.trunc(days)!==0&&Math.trunc(t)!==0){chart=1;a19=1;timeToReachYears=mathjs.round(Math.trunc(t),2);timeToReachDays=mathjs.round(Math.trunc(days),2)}else if(Math.trunc(days)===0&&Math.trunc(months)!==0&&Math.trunc(t)!==0){chart=1;a20=1;timeToReachYears=mathjs.round(Math.trunc(t),2);timeToReachMonths=mathjs.round(Math.trunc(months),2)}else if(Math.trunc(t)===0&&Math.trunc(months)===0&&Math.trunc(days)!==0){chart=1;a21=1;timeToReachDays=mathjs.round(Math.trunc(days),2)}else if(Math.trunc(t)===0&&Math.trunc(days)===0&&Math.trunc(months)!==0){chart=1;a22=1;timeToReachMonths=mathjs.round(Math.trunc(months),2)}else if(Math.trunc(days)===0&&Math.trunc(months)===0&&Math.trunc(t)!==0){chart=1;a23=1;timeToReachYears=mathjs.round(Math.trunc(t),2)}else if(Math.trunc(days)!==0&&Math.trunc(months)!==0&&Math.trunc(t)!==0){chart=1;a24=1;timeToReachYears=mathjs.round(Math.trunc(t),2);timeToReachMonths=mathjs.round(Math.trunc(months),2);timeToReachDays=mathjs.round(Math.trunc(days),2)}else if(Math.trunc(days)===0&&Math.trunc(months)===0&&Math.trunc(t)===0){chart=0;a25=1}}else if(subject===5){var PeriodicDep_local=PeriodicDep;if(q===1000){PeriodicDep_local=0}FinalBal=FinalBal_adj*mathjs.pow(1+infl,t);var oldI;var newI=eq_p;var iteration=0;do{oldI=newI;var dividend=InitialDep*Math.pow(newI+1,periods)+PeriodicDep_local*(Math.pow(newI+1,periods)-1)*(1+newI*type)/newI-FinalBal;var divisor=InitialDep*periods*Math.pow(newI+1,periods-1)+((PeriodicDep_local*periods*Math.pow(newI+1,periods-1)*(1+newI*type)+PeriodicDep_local*(Math.pow(newI+1,periods)-1))*newI-PeriodicDep_local*(Math.pow(newI+1,periods)-1)*(1+newI*type))/Math.pow(newI,2);newI=newI-dividend/divisor;++iteration}while(Math.abs(oldI-newI)>MIN_PRECISION&&iteration<=MAX_ITERATIONS);eq_p=newI;eq_p_var5=newI;var oldR;var newR=eq_p;var iterationR=0;do{oldR=newR;if(ct1===0){var dividendR=Math.pow(ex,newR/q)-1-eq_p;var divisorR=Math.pow(ex,newR/q)/q;newR=newR-dividendR/divisorR}else{var dividendR2=Math.pow(1+newR/compound_frequency_local,compound_frequency_local/q)-1-eq_p;var divisorR2=Math.pow(1+newR/compound_frequency_local,compound_frequency_local/q-1)/q;newR=newR-dividendR2/divisorR2}++iterationR}while(Math.abs(oldR-newR)>MIN_PRECISION&&iterationR<=MAX_ITERATIONS);eq_p2=newR;eq_p=eq_p2;if(ct1===0){apy2=mathjs.pow(ex,eq_p2)-1}else{apy2=mathjs.pow(1+eq_p2/compound_frequency_local,compound_frequency_local)-1}if(InitialDep+PeriodicDep_local<=0){chart=0;a26=1}else if(eq_p2<=0||isNaN(eq_p2)){chart=0;a27=1}else{chart=1;a28=1;requiredInterestRate=mathjs.round(eq_p2*100,3);requiredAPY=mathjs.round(apy2*100,3)}}var k;if(q===1){k=12}else if(q===2){k=6}else if(q===4){k=3}else if(q===12){k=1}else if(q===52.1775){k=12/52.1775}else if(q===26.08875){k=12/26.08875}else if(q===365.242){k=12/365.242}var MonthlyDep=PeriodicDep/k;var r_local=my_r;if(subject===5){r_local=eq_p}var eq_base_monthly;var compound_frequency_monthly=compound_frequency_local;if(ct1===0){var continuous_r_monthly=mathjs.pow(ex,r_local)-1;compound_frequency_monthly=1;eq_base_monthly=1+continuous_r_monthly/compound_frequency_monthly}else{eq_base_monthly=1+r_local/compound_frequency_monthly}var eq_power_monthly=compound_frequency_monthly/12;var r_monthly=mathjs.pow(eq_base_monthly,eq_power_monthly)-1;var MonthlyDep2;var periodsMonth=t*12;var outChart=[];var outTable1=[];var outTable2=[];var i;var rowLabelTableMonth;var rowLabelTableYear;var rowLabelChartMonth;var rowLabelChartQuarter;var rowLabelChartYear;var MonthlyPrincInt=0;var MonthlyDepInt=0;var MonthlyPrincIntBal=0;var InitialBal=InitialDep/(r_monthly+1);var InitialBal_lag=0;var DepBal;var DepBal_lag;var DepBal_lag2;var DepBalPrinc=0;var DepBalPrinc_lag=0;var DepBalPrinc_lag2=0;var YearlyDep;var YearlyDepBal;var YearlyDepInt;var YearlyPrincInt;var BalanceTotal=0;var BalanceIntTotal=0;var dep_pow;var dep_pow_lag;var dep_pow_lag2;var pointFractionTable=0;var pointFractionChart=0;if(periods>120){}if(subject===5){eq_p=eq_p_var5}if(subject===4){periodsMonth=periodsMonth+1}for(i=0;i<=periodsMonth;i++){rowLabelTableMonth=i;rowLabelTableYear=i;rowLabelChartMonth=i;rowLabelChartQuarter=i;rowLabelChartYear=i;dep_pow=i/12*q;dep_pow_lag=(i-12)/12*q;dep_pow_lag2=(i-1)/12*q;if(q===1000){MonthlyDep=0}if(i>12&&i%12!==0){dep_pow_lag=(i-i%12)/12*q}if(i>0){MonthlyPrincInt=InitialBal*r_monthly}InitialBal=InitialDep*Math.pow(1+eq_p,dep_pow);MonthlyPrincIntBal=InitialBal-InitialDep;InitialBal_lag=InitialDep*Math.pow(1+eq_p,dep_pow_lag);if(i<12){InitialBal_lag=InitialDep}if((subject>3||g===0)&&i>1){DepBalPrinc_lag2+=MonthlyDep}if((subject>3||g===0)&&i>0){DepBalPrinc+=MonthlyDep}if((subject>3||g===0)&&i>12){DepBalPrinc_lag+=MonthlyDep}if(subject>3&&g===0){DepBal=PeriodicDep*(Math.pow(1+eq_p,dep_pow)-1)*(1+eq_p*type)/eq_p;DepBal_lag=PeriodicDep*(Math.pow(1+eq_p,dep_pow_lag)-1)*(1+eq_p*type)/eq_p;DepBal_lag2=PeriodicDep*(Math.pow(1+eq_p,dep_pow_lag2)-1)*(1+eq_p*type)/eq_p}if(g!==eq_p&&q!==1&&subject<=3){DepBal=PeriodicDep*(Math.pow(1+eq_p,dep_pow)-Math.pow(1+g_p,dep_pow))*(1+eq_p*type)/(eq_p-g_p);DepBal_lag=PeriodicDep*(Math.pow(1+eq_p,dep_pow_lag)-Math.pow(1+g_p,dep_pow_lag))*(1+eq_p*type)/(eq_p-g_p);DepBal_lag2=PeriodicDep*(Math.pow(1+eq_p,dep_pow_lag2)-Math.pow(1+g_p,dep_pow_lag2))*(1+eq_p*type)/(eq_p-g_p)}if(g!==eq_p&&q!==1&&subject<=3&&g!==0){DepBalPrinc=PeriodicDep*(Math.pow(1+0,dep_pow)-Math.pow(1+g_p,dep_pow))*(1+0*type)/(0-g_p);DepBalPrinc_lag=PeriodicDep*(Math.pow(1+0,dep_pow_lag)-Math.pow(1+g_p,dep_pow_lag))*(1+0*type)/(0-g_p);DepBalPrinc_lag2=PeriodicDep*(Math.pow(1+0,dep_pow_lag2)-Math.pow(1+g_p,dep_pow_lag2))*(1+0*type)/(0-g_p)}else if(g!==eq_p&&q===1&&subject<=3){DepBal=PeriodicDep*(Math.pow(1+eq_p,dep_pow)-Math.pow(1+g,dep_pow))*(1+eq_p*type)/(eq_p-g);DepBal_lag=PeriodicDep*(Math.pow(1+eq_p,dep_pow_lag)-Math.pow(1+g_p,dep_pow_lag))*(1+eq_p*type)/(eq_p-g_p);DepBal_lag2=PeriodicDep*(Math.pow(1+eq_p,dep_pow_lag2)-Math.pow(1+g_p,dep_pow_lag2))*(1+eq_p*type)/(eq_p-g_p)}if(g!==eq_p&&q===1&&subject<=3&&g!==0){DepBalPrinc=PeriodicDep*(Math.pow(1+0,dep_pow)-Math.pow(1+g_p,dep_pow))*(1+0*type)/(0-g_p);DepBalPrinc_lag=PeriodicDep*(Math.pow(1+0,dep_pow_lag)-Math.pow(1+g_p,dep_pow_lag))*(1+0*type)/(0-g_p);DepBalPrinc_lag2=PeriodicDep*(Math.pow(1+0,dep_pow_lag2)-Math.pow(1+g_p,dep_pow_lag2))*(1+0*type)/(0-g_p)}else if(g===eq_p&&subject<4){DepBal=PeriodicDep*dep_pow*Math.pow(1+eq_p,dep_pow-1)*(1+eq_p*type);DepBal_lag=PeriodicDep*dep_pow_lag*Math.pow(1+eq_p,dep_pow_lag-1)*(1+eq_p*type);DepBal_lag2=PeriodicDep*dep_pow_lag2*Math.pow(1+eq_p,dep_pow_lag2-1)*(1+eq_p*type);if(g!==0){DepBalPrinc=PeriodicDep*(Math.pow(1+0,dep_pow)-Math.pow(1+g_p,dep_pow))*(1+0*type)/(0-g_p);DepBalPrinc_lag=PeriodicDep*(Math.pow(1+0,dep_pow_lag)-Math.pow(1+g_p,dep_pow_lag))*(1+0*type)/(0-g_p);DepBalPrinc_lag2=PeriodicDep*(Math.pow(1+0,dep_pow_lag2)-Math.pow(1+g_p,dep_pow_lag2))*(1+0*type)/(0-g_p)}}if(i<12){DepBal_lag=0;DepBalPrinc_lag=0}YearlyPrincInt=InitialBal-InitialBal_lag;YearlyDep=DepBalPrinc-DepBalPrinc_lag;MonthlyDep2=DepBalPrinc-DepBalPrinc_lag2;if(i===0){MonthlyDep2=0;DepBal_lag2=0}MonthlyDepInt=DepBal-DepBal_lag2-MonthlyDep2;YearlyDepBal=DepBal-DepBal_lag;if(i>12&&i%12!==0&&g===0){YearlyDep=YearlyDep*(i%12)/12}YearlyDepInt=YearlyDepBal-YearlyDep;BalanceTotal=InitialBal+DepBal;BalanceIntTotal=BalanceTotal-DepBalPrinc-InitialDep;if(days!==0&&DepBalPrinc+InitialDep>=FinalBal&&subject===4){YearlyDep=MonthlyDep*months;DepBal=FinalBal-InitialDep;YearlyDepBal=DepBal-DepBal_lag;YearlyDepInt=YearlyDepBal-YearlyDep;MonthlyDep2=MonthlyDep*(days/(365.242/12)/k);DepBalPrinc=DepBalPrinc-MonthlyDep+MonthlyDep2;BalanceTotal=FinalBal;BalanceIntTotal=FinalBal-(DepBalPrinc+InitialDep)}if((pointFractionTable<i+1||i>periodsMonth-1)&&select1===1&&t<=10){outTable1.push([rowLabelTableMonth,mathjs.round(InitialDep,2),mathjs.round(MonthlyPrincInt,2),mathjs.round(MonthlyPrincIntBal,2),mathjs.round(InitialBal,2)]);outTable2.push([rowLabelTableMonth,mathjs.round(MonthlyDep2,2),mathjs.round(DepBalPrinc+InitialDep,2),mathjs.round(MonthlyDepInt+MonthlyPrincInt,2),mathjs.round(BalanceIntTotal,2),mathjs.round(BalanceTotal,2)])}else if((pointFractionTable<i+1||i>periodsMonth-1)&&(select1===2||t>10)){rowLabelTableYear=i%12===0?i/12:"... and "+Math.trunc(t*12)%12+" month(s)";outTable1.push([rowLabelTableYear,mathjs.round(InitialDep,2),mathjs.round(YearlyPrincInt,2),mathjs.round(MonthlyPrincIntBal,2),mathjs.round(InitialBal,2)]);outTable2.push([rowLabelTableYear,mathjs.round(YearlyDep,2),mathjs.round(DepBalPrinc+InitialDep,2),mathjs.round(YearlyDepInt+YearlyPrincInt,2),mathjs.round(BalanceIntTotal,2),mathjs.round(BalanceTotal,2)]);rowLabelTableYear++;pointFractionTable+=12}if((pointFractionChart<i+1||i>periodsMonth-1)&&t<=2){outChart.push([rowLabelChartMonth,mathjs.round(DepBalPrinc+InitialDep,2),mathjs.round(BalanceIntTotal,2),mathjs.round(BalanceTotal,2)])}else if((pointFractionChart<i+1||i>periodsMonth-1)&&t<=6&&t>2){rowLabelChartQuarter=i%3===0?i/3:"... and "+Math.trunc(t*12)%12+" months";outChart.push([rowLabelChartQuarter,mathjs.round(DepBalPrinc+InitialDep,2),mathjs.round(BalanceIntTotal,2),mathjs.round(BalanceTotal,2)]);rowLabelChartQuarter++;pointFractionChart+=3}else if((pointFractionChart<i+1||i>periodsMonth-1)&&t>6){rowLabelChartYear=i%12===0?i/12:"... and "+Math.trunc(t*12)%12+" months";outChart.push([rowLabelChartYear,mathjs.round(DepBalPrinc+InitialDep,2),mathjs.round(BalanceIntTotal,2),mathjs.round(BalanceTotal,2)]);rowLabelChartYear++;pointFractionChart+=12}}if(chart===1){chartInitialDeposit=mathjs.round(InitialDep/BalanceTotal*100,1);chartTotalDeposits=mathjs.round(DepBalPrinc/BalanceTotal*100,1);chartTotalInterest=mathjs.round(BalanceIntTotal/BalanceTotal*100,1)}var real_interest=0;Final_real=BalanceTotal/mathjs.pow(1+infl,t);real_interest=Final_real-(DepBalPrinc+InitialDep);if(infl>0&&chart===1&&subject>1){a29=1;finalNominalValue=mathjs.round(FinalBal,2)}if(chart===1&&PeriodicDep>0&&InitialDep>0&&infl===0){a30=1;sumAdditionalDeposits=mathjs.round(DepBalPrinc,2);totalPrincipal=mathjs.round(DepBalPrinc+InitialDep,2);totalInterestGained=mathjs.round(BalanceIntTotal,2)}if(chart===1&&PeriodicDep>0&&InitialDep===0&&infl===0){a31=1;sumAdditionalDeposits=mathjs.round(DepBalPrinc,2);totalInterestGained=mathjs.round(BalanceIntTotal,2)}if(chart===1&&PeriodicDep===0&&InitialDep>0&&infl===0){a32=1;interestFromSavings=mathjs.round(BalanceIntTotal,2)}if(chart===1&&PeriodicDep>0&&InitialDep>0&&real_interest>=0&&infl!==0){a33=1;sumAdditionalDeposits=mathjs.round(DepBalPrinc,2);totalPrincipal=mathjs.round(DepBalPrinc+InitialDep,2)}if(chart===1&&PeriodicDep>0&&InitialDep>0&&real_interest>=0&&infl!==0){a34=1;nominalInterest=mathjs.round(BalanceIntTotal,2);realInterest=mathjs.round(real_interest,2)}if(chart===1&&PeriodicDep>0&&InitialDep===0&&real_interest>=0&&infl!==0){a35=1;sumAdditionalDeposits=mathjs.round(DepBalPrinc,2);nominalInterest=mathjs.round(BalanceIntTotal,2);realInterest=mathjs.round(real_interest,2)}if(chart===1&&PeriodicDep===0&&InitialDep>0&&real_interest>=0&&infl!==0){a36=1;nominalInterest=mathjs.round(BalanceIntTotal,2);realInterest=mathjs.round(real_interest,2)}if(chart===1&&PeriodicDep>0&&InitialDep>0&&real_interest<0){a37=1;sumAdditionalDeposits=mathjs.round(DepBalPrinc,2);totalPrincipal=mathjs.round(DepBalPrinc+InitialDep,2)}if(chart===1&&PeriodicDep>0&&InitialDep>0&&real_interest<0){a38=1;nominalInterest=mathjs.round(BalanceIntTotal,2);realLoss=mathjs.round(-real_interest,2)}if(chart===1&&PeriodicDep>0&&InitialDep===0&&real_interest<0){a39=1;sumAdditionalDeposits=mathjs.round(DepBalPrinc,2);nominalInterest=mathjs.round(BalanceIntTotal,2);realLoss=mathjs.round(-real_interest,2)}if(chart===1&&PeriodicDep===0&&InitialDep>0&&real_interest<0){a40=1;nominalInterest=mathjs.round(BalanceIntTotal,2);realLoss=mathjs.round(-real_interest,2)}return 1});omni.define("getAnnualPercentageYield",function(runSavings){if(runSavings==1){return annualPercentageYield}});omni.define("getFinalSavings",function(runSavings){if(runSavings==1){return finalSavings}});omni.define("getFinalSavingsReal",function(runSavings){if(runSavings==1){return finalSavingsReal}});omni.define("getInitialDepositRequired",function(runSavings){if(runSavings==1){return initialDepositRequired}});omni.define("getAdditionalDepositRequired",function(runSavings){if(runSavings==1){return additionalDepositRequired}});omni.define("getTimeToReachMonths",function(runSavings){if(runSavings==1){return timeToReachMonths}});omni.define("getTimeToReachDays",function(runSavings){if(runSavings==1){return timeToReachDays}});omni.define("getTimeToReachYears",function(runSavings){if(runSavings==1){return timeToReachYears}});omni.define("getRequiredInterestRate",function(runSavings){if(runSavings==1){return requiredInterestRate}});omni.define("getRequiredAPY",function(runSavings){if(runSavings==1){return requiredAPY}});omni.define("getSumAdditionalDeposits",function(runSavings){if(runSavings==1){return sumAdditionalDeposits}});omni.define("getTotalPrincipal",function(runSavings){if(runSavings==1){return totalPrincipal}});omni.define("getTotalInterestGained",function(runSavings){if(runSavings==1){return totalInterestGained}});omni.define("getInterestFromSavings",function(runSavings){if(runSavings==1){return interestFromSavings}});omni.define("getNominalInterest",function(runSavings){if(runSavings==1){return nominalInterest}});omni.define("getRealInterest",function(runSavings){if(runSavings==1){return realInterest}});omni.define("getRealLoss",function(runSavings){if(runSavings==1){return realLoss}});omni.define("getFinalNominalValue",function(runSavings){if(runSavings==1){return finalNominalValue}});omni.define("getChartInitialDeposit",function(runSavings){if(runSavings==1){return chartInitialDeposit}});omni.define("getChartTotalDeposits",function(runSavings){if(runSavings==1){return chartTotalDeposits}});omni.define("getChartTotalInterest",function(runSavings){if(runSavings==1){return chartTotalInterest}});omni.define("fl1",function(runSavings){if(runSavings==1){return a1}});omni.define("fl2",function(runSavings){if(runSavings==1){return a2}});omni.define("fl3",function(runSavings){if(runSavings==1){return a3}});omni.define("fl4",function(runSavings){if(runSavings==1){return a4}});omni.define("fl5",function(runSavings){if(runSavings==1){return a5}});omni.define("fl6",function(runSavings){if(runSavings==1){return a6}});omni.define("fl7",function(runSavings){if(runSavings==1){return a7}});omni.define("fl8",function(runSavings){if(runSavings==1){return a8}});omni.define("fl9",function(runSavings){if(runSavings==1){return a9}});omni.define("fl10",function(runSavings){if(runSavings==1){return a10}});omni.define("fl11",function(runSavings){if(runSavings==1){return a11}});omni.define("fl12",function(runSavings){if(runSavings==1){return a12}});omni.define("fl13",function(runSavings){if(runSavings==1){return a13}});omni.define("fl14",function(runSavings){if(runSavings==1){return a14}});omni.define("fl15",function(runSavings){if(runSavings==1){return a15}});omni.define("fl16",function(runSavings){if(runSavings==1){return a16}});omni.define("fl17",function(runSavings){if(runSavings==1){return a17}});omni.define("fl18",function(runSavings){if(runSavings==1){return a18}});omni.define("fl19",function(runSavings){if(runSavings==1){return a19}});omni.define("fl20",function(runSavings){if(runSavings==1){return a20}});omni.define("fl21",function(runSavings){if(runSavings==1){return a21}});omni.define("fl22",function(runSavings){if(runSavings==1){return a22}});omni.define("fl23",function(runSavings){if(runSavings==1){return a23}});omni.define("fl24",function(runSavings){if(runSavings==1){return a24}});omni.define("fl25",function(runSavings){if(runSavings==1){return a25}});omni.define("fl26",function(runSavings){if(runSavings==1){return a26}});omni.define("fl27",function(runSavings){if(runSavings==1){return a27}});omni.define("fl28",function(runSavings){if(runSavings==1){return a28}});omni.define("fl29",function(runSavings){if(runSavings==1){return a29}});omni.define("fl30",function(runSavings){if(runSavings==1){return a30}});omni.define("fl31",function(runSavings){if(runSavings==1){return a31}});omni.define("fl32",function(runSavings){if(runSavings==1){return a32}});omni.define("fl33",function(runSavings){if(runSavings==1){return a33}});omni.define("fl34",function(runSavings){if(runSavings==1){return a34}});omni.define("fl35",function(runSavings){if(runSavings==1){return a35}});omni.define("fl36",function(runSavings){if(runSavings==1){return a36}});omni.define("fl37",function(runSavings){if(runSavings==1){return a37}});omni.define("fl38",function(runSavings){if(runSavings==1){return a38}});omni.define("fl39",function(runSavings){if(runSavings==1){return a39}});omni.define("fl40",function(runSavings){if(runSavings==1){return a40}});//# sourceURL=customJs.js
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
      var final = values.finalSavings, principal = values.totalPrincipal;
      if (isFinite(final) && isFinite(principal) && final > principal && principal > 0) {
        ctx.exportValue('totalInterestGained', sround(final - principal, 2));
      }
      ['timeToReachYears', 'timeToReachMonths', 'timeToReachDays', 'finalSavingsReal',
       'initialDepositRequired', 'additionalDepositRequired'].forEach(function (n) {
        if (!(Number(values[n]) > 0)) { ctx.exportValue(n, null); }
      });
    });
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Savings works out Final balance and Final balance in today's money from I would like to know my, Known rate and Desired savings. Nothing is looked up on this page: final balance is computed from i would like to know my and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Savings calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Savings: it takes 14 numbers and reports Final balance, Final balance in today&#039;s money and Total principal (initial plus deposits).</p><p>Written with the labels from the form, Periodic growth rate = (Annual growth rate + 1)^(1 ÷ How often?) − 1.</p><p>The result panel carries Final balance, Final balance in today&#039;s money, Total principal (initial plus deposits) and Sum of the additional deposits, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 14 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>I would like to know my</strong> — a plain number, no unit</li><li><strong>Known rate</strong> — a plain number, no unit</li><li><strong>Desired savings</strong> — in USD. The future value (FV) of your savings. Note that it will be your desired inflation-adjusted balance in case you set the annual inflation rate.</li><li><strong>Initial savings</strong> — in USD</li><li><strong>Annual nominal interest rate</strong> — in percent</li><li><strong>Annual percentage yield (APY)</strong> — in percent. Includes compounding.</li><li><strong>Time length</strong> — in years / months</li><li><strong>Compound frequency</strong> — a plain number, no unit. You can set here how often the interest is calculated on your balance.</li><li><strong>Annual inflation rate</strong> — in percent</li><li><strong>How much?</strong> — in USD. The amount of periodic deposit added to your savings.</li><li><strong>How often?</strong> — a plain number, no unit. Here you can set the regularity of the additional deposits.</li><li><strong>When?</strong> — a plain number, no unit. You can set here the timing of the additional deposits.</li><li><strong>Annual growth rate</strong> — in percent. The percentage growth rate of your additional periodic deposits over a year.</li><li><strong>Periodic growth rate</strong> — in percent. The percentage growth rate of your periodic contributions. Note that periodic and annual growth rates are linked together: if you set one, the other will be calculated according to the regularity of your additional deposit.</li></ul><p>What you get back is Final balance, Final balance in today&#039;s money, Total principal (initial plus deposits), Sum of the additional deposits, Total interest earned, Annual percentage yield (APY), %, Time to reach the target, years, Time to reach the target, months, Time to reach the target, days, Initial deposit needed, Additional deposit needed, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, I would like to know my = 1, Known rate = 1, Desired savings = 20000 USD, Initial savings = 1000 USD, Annual nominal interest rate = 1.3 perc, Annual percentage yield (APY) = 1.95 perc, Time length = 72 yrsmos, Compound frequency = 12, Enable Infl = 0, Annual inflation rate = 8 perc, How much? = 100 USD and When? = 1 gives <strong>How often?</strong> = 12.</p><ul><li><strong>How often?</strong> = 12</li></ul><p>The line behind those figures is <strong>Periodic growth rate</strong> = <code>(Annual growth rate + 1)^(1 ÷ How often?) − 1</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>How often?</strong> = 12. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Annual nominal interest rate lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Periodic growth rate</strong> = <code>(Annual growth rate + 1)^(1 ÷ How often?) − 1</code></li><li><strong>Annual growth rate</strong> = <code>(Periodic growth rate + 1)^(How often?) − 1</code></li><li><strong>How often?</strong> = <code>ln(Annual growth rate + 1) ÷ ln(Periodic growth rate + 1)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Periodic growth rate</strong> = <code>(Annual growth rate + 1)^(1 ÷ How often?) − 1</code> — the form to use when Annual growth rate and How often? are the values you have.</li><li><strong>Annual growth rate</strong> = <code>(Periodic growth rate + 1)^(How often?) − 1</code> — the form to use when Periodic growth rate and How often? are the values you have.</li><li><strong>How often?</strong> = <code>ln(Annual growth rate + 1) ÷ ln(Periodic growth rate + 1)</code> — the form to use when Annual growth rate and Periodic growth rate are the values you have.</li></ul><p>Any one of Periodic growth rate, Annual growth rate and How often? can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — I would like to know my:, from 1 to 2 — and the answers go from <strong>How often?</strong> 12 to <strong>How often?</strong> 12.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Annual nominal interest rate, Annual percentage yield (APY) and Time length carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Final balance, Final balance in today&#039;s money and Total principal (initial plus deposits) are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>I would like to know my left as a guess.</strong> Anything typed into I would like to know my is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Known rate left as a guess.</strong> Anything typed into Known rate is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If I would like to know my: is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have I would like to know my, Known rate, Desired savings and Initial savings ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with I would like to know my — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Final balance against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Final balance is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The chips cover percent and years / months. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: I would like to know my, Known rate and Desired savings measured, Final balance and Final balance in today&#039;s money wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/options-spread">Options spread</a>, <a href="/finance/overtime">Overtime Calculator</a> and <a href="/finance/overtime-paycheck">Overtime paycheck</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Savings is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Savings is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put I would like to know my, Known rate, Desired savings and Initial savings beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Savings calculator work out?', 'a' => <<<'TXT'
            Final balance, Final balance in today's money, Total principal (initial plus deposits) and Sum of the additional deposits, from Annual growth rate and How often?. The relationship is Periodic growth rate = (Annual growth rate + 1)^(1 ÷ How often?) − 1.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            I would like to know my, Known rate, Desired savings (USD), Initial savings (USD), Annual nominal interest rate (percent). Enter i would like to know my, known rate and desired savings; Final balance is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Periodic growth rate, Annual growth rate, How often? and Run savings blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'How often? = 12. Those are the defaults written into the form — move I would like to know my: and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Final balance is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave I would like to know my: blank and the page solves for it, reporting Final balance instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Final balance keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/options-spread', 'name' => 'Options spread'],
            ['path' => '/finance/overtime', 'name' => 'Overtime Calculator'],
            ['path' => '/finance/overtime-paycheck', 'name' => 'Overtime paycheck'],
        ],
        'authors' => [],
    ],
];
