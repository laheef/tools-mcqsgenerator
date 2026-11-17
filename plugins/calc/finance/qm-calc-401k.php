<?php

/**
 * 401(k)
 * /finance/401k
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => '401(k)',
    'meta' => ['title' => '401(k) Calculator — Formula, Units & Example', 'description' => '401(k) reports total contribution rate2 and total contribution rate1. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => '401(k) Calculator', 'updated' => '2026-09-01'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Subject',
                            'label' => 'I\'d like to know...',
                            'type' => 'select',
                            'options' => ['how much can I withdraw?' => '1', 'how long will my 401(k) balance last?' => '2'],
                            'dataset' => 'mode (VarSub)',
                            'default' => 'how much can I withdraw?',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Accumulation phase',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Salary',
                            'label' => 'Annual salary',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '50000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gDef',
                            'label' => 'Expected salary growth rate',
                            'type' => 'number',
                            'help' => 'This decide the percentage growth rate of your contribution over a year.',
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
                            'name' => 'AgeStart',
                            'label' => 'Current age',
                            'type' => 'number',
                            'suffix' => 'years',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '30',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'AgeEnd',
                            'label' => 'Retirement age',
                            'type' => 'number',
                            'suffix' => 'years',
                            'help' => 'Your expected age when you will begin withdrawing from your 401(k) balance.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '70',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'If you start withdrawing before the age of 59.5 you\'ll need to pay the 10% early withdrawal penalty.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'InDep',
                            'label' => 'Current 401(k) balance',
                            'type' => 'number',
                            'help' => 'This will be the opening balance at the beginning of the accumulation phase.',
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
                            'name' => 'contribution_rate',
                            'label' => 'Your contribution rate',
                            'type' => 'number',
                            'help' => 'How much of your salary do you transfer to the 401k account?',
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
                            'name' => 'employer_match',
                            'label' => 'Employer match',
                            'type' => 'number',
                            'help' => 'What part of your contributions does your employer match? E.g. if your employer matches 50% it means that for each $1 you contribute, they contribute $0.50.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '50',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'employer_match_limit',
                            'label' => 'Employer matching limit',
                            'type' => 'number',
                            'help' => 'What is the maximum your employer is willing to match? E.g., a matching limit of 3% means that if you contribute 6%, they will match only 3%.',
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
                            'name' => 'TypeDef',
                            'label' => 'Timing of contribution',
                            'type' => 'select',
                            'options' => ['Beginning of month' => '1', 'End of months' => '0'],
                            'dataset' => 'timing contribution',
                            'control' => 'DROPDOWN',
                            'default' => 'End of months',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rDef',
                            'label' => 'Expected rate of return',
                            'type' => 'number',
                            'help' => 'The average interest rate or rate of return during the accumulation phase.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1.5',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'CompFreq_m',
                            'label' => 'Compounding method',
                            'type' => 'select',
                            'options' => [
                                'Yearly' => '1',
                                'Semi-annually' => '2',
                                'Quarterly' => '4',
                                'Monthly' => '12',
                                'Biweekly' => '26.08875',
                                'Weekly' => '52.1775',
                                'Daily' => '365.242',
                                'Continuous' => '0',
                            ],
                            'dataset' => 'compound freq',
                            'control' => 'DROPDOWN',
                            'help' => 'The frequency interest is added to your balance. Note, that it applies over the whole lifetime of the annuity.',
                            'default' => 'Monthly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'advanced_1',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Set salary growth rate, timing of contributions, and compounding method' => '1', '' => '0'],
                            'dataset' => 'advanced 1',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Payout phase - retirement withdrawals',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 't',
                            'label' => 'Time spent in retirement',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PerPay',
                            'label' => 'Withdrawal amount',
                            'type' => 'number',
                            'help' => 'The amount you are planning to withdraw monthly.',
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
                            'name' => 'Tax',
                            'label' => 'Income tax',
                            'type' => 'number',
                            'help' => 'Your income tax rate.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'q',
                            'label' => 'Withdrawal frequency',
                            'type' => 'select',
                            'options' => [
                                'Yearly' => '1',
                                'Semi-annually' => '2',
                                'Quarterly' => '4',
                                'Monthly' => '12',
                                'Weekly' => '52',
                            ],
                            'dataset' => 'payfreq',
                            'control' => 'DROPDOWN',
                            'help' => 'Interval between regular withdrawals.',
                            'default' => 'Monthly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'r',
                            'label' => 'Expected rate of return',
                            'type' => 'number',
                            'help' => 'The average interest rate or rate of return during the payout phase.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1.5',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Type',
                            'label' => 'Timing of withdrawals',
                            'type' => 'select',
                            'options' => ['Beginning of periods' => '1', 'End of periods' => '0'],
                            'dataset' => 'timing withdrawals',
                            'control' => 'DROPDOWN',
                            'default' => 'Beginning of periods',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'g',
                            'label' => 'Expected inflation',
                            'type' => 'number',
                            'help' => 'The percentage growth rate of your withdrawals over a year.',
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
                            'name' => 'advanced_2',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Set timing of withdrawals and expected inflation' => '1', '' => '0'],
                            'dataset' => 'advanced 2',
                            'control' => 'CHECKBOX',
                            'default' => '',
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
                            'type' => 'note',
                            'cases' => [
                                ['when' => null, 'text' => '{{monthly_payment.monetaryValue}} goes to your 401(k) monthly.'],
                                ['when' => 'penalty > 0', 'text' => <<<'TXT'
                                You'll probably need to pay {{penalty_payment.monetaryValue}} penalty for withdrawing your 401k balance too early (your balance at the first withdrawal is not reduced by this amount).
                                TXT],
                                ['when' => 'Subject == 1 and g == 0', 'text' => <<<'TXT'
                                You can withdraw {{period_withdrawal.monetaryValue}} (after tax) at the {{timing_withdrawal.uiValue}} of each {{withdrawal_freq_name.uiValue}} to deplete your 401(k) balance entirely.
                                TXT],
                                ['when' => 'Subject == 1 and g > 0', 'text' => 'You can withdraw {{period_withdrawal.monetaryValue}} at first and increase it gradually.&nbsp;'],
                                ['when' => 'Subject == 1 and g < 0', 'text' => 'You can withdraw {{period_withdrawal.monetaryValue}} at first and increase it gradually.&nbsp;'],
                                ['when' => 'Subject == 2 and last_for_months > 0', 'text' => 'Your 401(k) balance will last for {{last_for_yrs.value}}&nbsp;years and {{last_for_mos.value}}&nbsp;months from the first day of withdrawal.'],
                                ['when' => 'Subject == 2 and return_status == -1', 'text' => <<<'TXT'
                                Since the interest earned exceeds the withdrawal amount for each {{withdrawal_freq_name.uiValue}}, you could withdraw money from your 401(k) balance forever with the given setup.
                                TXT],
                            ],
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
                        ['name' => 'first_day', 'label' => 'Schedule starts from...', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_contribution_rate2',
                            'label' => 'Total contribution rate2',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_contribution_rate1',
                            'label' => 'Total contribution rate1',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'employer_contrib2',
                            'label' => 'Employer contrib2',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'employer_contrib1',
                            'label' => 'Employer contrib1',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tDef',
                            'label' => 'Years before retirement',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'FinBal',
                            'label' => 'Remaining balance',
                            'type' => 'number',
                            'help' => 'Set an amount if you want to have some money left at the end of the withdrawal period.',
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
                            'name' => 'Deposit',
                            'label' => 'Monthly contribution',
                            'type' => 'number',
                            'help' => 'The amount that goes to your 401k every month.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '500',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Deposit1',
                            'label' => 'Monthly contribution',
                            'type' => 'number',
                            'help' => 'The amount that goes to your 401k every month.',
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
                            'name' => 'Deposit2',
                            'label' => 'Monthly contribution',
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
                            'name' => 'g_pDef',
                            'label' => 'Monthly growth rate',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            The percentage growth rate of the monthly contributions. Note, that periodic and annual growth rates are linked together: if you set one, the other will be calculated according to annuity frequency. Only available for a fixed length annuity.
                            TXT,
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
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
                            The percentage growth rate of the monthly withdrawals. Note, that periodic and annual growth rates are linked together: if you set one, the other will be calculated according to annuity frequency. Only available for a fixed length annuity.
                            TXT,
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'penalty',
                            'label' => 'Early withdrawal penalty',
                            'type' => 'number',
                            'help' => 'Early withdrawal is subject to a 10% penalty.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'qDef',
                            'label' => 'Q def',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'EndDate',
                            'label' => 'Planned age to retire',
                            'type' => 'number',
                            'suffix' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '50',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'monthly_payment',
                            'label' => 'Monthly payment',
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
                            'name' => 'return_status',
                            'label' => 'Return status',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'last_withdrawal', 'label' => 'Last withdrawal', 'type' => 'date'],
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
                            'name' => 'period_withdrawal',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'withdrawal_freq_name',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'timing_withdrawal',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'balance_first',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'total_withdrawal',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'total_contribution',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'total_return',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'number_withdrawal',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'last_for_months',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'last_for_yrs',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'last_for_mos',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'penalty_payment',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '663',
                            'unit_default' => 'USD',
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
            'results' => ['q' => 'log(g + 1)/log(g_p + 1)', 'g' => 'pow(g_p + 1, q) - 1', 'g_p' => 'pow(g + 1, 1/q) - 1'],
        ],
        [
            'title' => 'gDef + 1= (1 + g_pDef) ^ qDef',
            'results' => ['g_pDef' => 'pow(gDef + 1, 1/qDef) - 1', 'gDef' => 'pow(g_pDef + 1, qDef) - 1', 'qDef' => 'log(gDef + 1)/log(g_pDef + 1)'],
        ],
        [
            'title' => 'tDef = AgeEnd - AgeStart',
            'results' => ['tDef' => 'AgeEnd - AgeStart', 'AgeStart' => 'AgeEnd - tDef', 'AgeEnd' => 'AgeStart + tDef'],
        ],
        [
            'title' => 'employer_contrib1 = contribution_rate * employer_match',
            'results' => ['employer_match' => 'employer_contrib1/contribution_rate', 'employer_contrib1' => 'contribution_rate*employer_match', 'contribution_rate' => 'employer_contrib1/employer_match'],
        ],
        [
            'title' => 'employer_contrib2 = employer_match_limit * employer_match',
            'results' => ['employer_match' => 'employer_contrib2/employer_match_limit', 'employer_match_limit' => 'employer_contrib2/employer_match', 'employer_contrib2' => 'employer_match*employer_match_limit'],
        ],
        [
            'title' => 'total_contribution_rate1 = employer_contrib1 + contribution_rate',
            'results' => ['employer_contrib1' => '-contribution_rate + total_contribution_rate1', 'contribution_rate' => '-employer_contrib1 + total_contribution_rate1', 'total_contribution_rate1' => 'contribution_rate + employer_contrib1'],
        ],
        [
            'title' => 'total_contribution_rate2 = employer_contrib2 + contribution_rate',
            'results' => ['total_contribution_rate2' => 'contribution_rate + employer_contrib2', 'employer_contrib2' => '-contribution_rate + total_contribution_rate2', 'contribution_rate' => '-employer_contrib2 + total_contribution_rate2'],
        ],
        [
            'title' => 'Deposit1 = one_way(total_contribution_rate1 * Salary/12)',
            'results' => ['Deposit1' => '((1/12)*Salary*total_contribution_rate1)'],
        ],
        [
            'title' => 'Deposit2 = one_way(total_contribution_rate2 * Salary/12)',
            'results' => ['Deposit2' => '((1/12)*Salary*total_contribution_rate2)'],
        ],
        [
            'title' => 'penalty = if_else(AgeEnd < 59.5, 0.1, 0)',
            'results' => ['penalty' => <<<'TXT'
            (((AgeEnd < 119/2) ? (
               1/10
            )
            : (
               0
            )))
            TXT],
        ],
        [
            'title' => 'monthly_payment = if_else(Deposit2 < Deposit1, Deposit2, Deposit1)',
            'results' => ['monthly_payment' => <<<'TXT'
            (((((1/12)*Salary*total_contribution_rate1) > ((1/12)*Salary*total_contribution_rate2)) ? (
               ((1/12)*Salary*total_contribution_rate2)
            )
            : (
               ((1/12)*Salary*total_contribution_rate1)
            )))
            TXT],
        ],
        [
            'title' => <<<'TXT'
            return_status = run_calculator(Subject, q, t, g, g_p, g_pDef, monthly_payment, Type, TypeDef, InDep, Tax, r, rDef, tDef, FinBal, CompFreq_m, gDef, first_day, PerPay, penalty)
            TXT,
            'results' => ['return_status' => <<<'TXT'
            run_calculator(Subject, q, t, g, g_p, g_pDef, (((((1/12)*Salary*total_contribution_rate1) > ((1/12)*Salary*total_contribution_rate2)) ? (
               ((1/12)*Salary*total_contribution_rate2)
            )
            : (
               ((1/12)*Salary*total_contribution_rate1)
            ))), Type, TypeDef, InDep, Tax, r, rDef, tDef, FinBal, CompFreq_m, gDef, first_day, PerPay, (((AgeEnd < 119/2) ? (
               1/10
            )
            : (
               0
            ))))
            TXT],
        ],
        [
            'title' => 'last_withdrawal = get_last_withdrawal()',
            'results' => ['last_withdrawal' => 'get_last_withdrawal()'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";var qDef=12,ex=mathjs.e,millisecondsInADay=24*60*60*1000;var period_withdrawal,balance_first,total_withdrawal,total_contribution,total_return,number_withdrawal,last_withdrawal,last_for_months,penalty_payment;omni.define("run_calculator",function(VarSub,q,t,g,g_p,g_pDef,Deposit,VarType,VarTypeDef,InDep,Tax,r,rDef,tDef,FinBal,m,gDef,first_day,PerPay,penalty){var periods=q*t;var yearsBefore=tDef;var monthsBefore=mathjs.floor(yearsBefore*qDef);var periodsDef=yearsBefore*qDef;var start_day=new Date;start_day.setUTCFullYear(start_day.getUTCFullYear()+tDef);var StartDate=start_day.getTime()/millisecondsInADay;var gap=mathjs.floor(StartDate)-mathjs.floor(first_day);var eq_base;if(m===0){var continuous_rDef=mathjs.pow(ex,rDef)-1;m=1;eq_base=1+continuous_rDef/m}else{eq_base=1+rDef/m}var eq_powerDef=m/qDef;var eq_pDef=mathjs.round(mathjs.pow(eq_base,eq_powerDef)-1,10);if(m===0){var continuous_r=mathjs.pow(ex,r)-1;m=1;eq_base=1+continuous_r/m}else{eq_base=1+r/m}var eq_power=m/q;var eq_p=mathjs.round(mathjs.pow(eq_base,eq_power)-1,10);var InDepFV=InDep*mathjs.pow(1+eq_pDef,12*yearsBefore);var DepBalDef;if(g!==eq_pDef&&qDef!==1){DepBalDef=Deposit*(mathjs.pow(1+eq_pDef,periodsDef)-mathjs.pow(1+g_pDef,periodsDef))*(1+eq_pDef*VarTypeDef)/(eq_pDef-g_pDef)}else if(g!==eq_pDef&&qDef===1){DepBalDef=Deposit*(mathjs.pow(1+eq_pDef,periodsDef)-mathjs.pow(1+gDef,periodsDef))*(1+eq_pDef*VarTypeDef)/(eq_pDef-gDef)}else if(g===eq_pDef){DepBalDef=Deposit*periodsDef*mathjs.pow(1+eq_pDef,periodsDef-1)*(1+eq_pDef*VarTypeDef)}InDepFV=InDepFV+DepBalDef;if(VarSub===1){var PrincBal=InDepFV*mathjs.pow(1+eq_p,periods);var _DepBal=FinBal-PrincBal;if(g!==eq_p&&q!==1){PerPay=_DepBal/((mathjs.pow(1+eq_p,periods)-mathjs.pow(1+g_p,periods))*(1+eq_p*VarType)/(eq_p-g_p))}else if(g!==eq_p&&q===1){PerPay=_DepBal/((mathjs.pow(1+eq_p,periods)-mathjs.pow(1+g,periods))*(1+eq_p*VarType)/(eq_p-g))}else if(g===eq_p){PerPay=_DepBal/(periods*mathjs.pow(1+eq_p,periods-1)*(1+eq_p*VarType))}FinBal=PrincBal+_DepBal}if(VarSub===2){g=0;g_p=0;PerPay=-PerPay*(1-Tax);periods=mathjs.log((eq_p*(FinBal+PerPay*VarType)+PerPay)/(eq_p*InDepFV+PerPay*(1+eq_p*VarType)))/mathjs.log(eq_p+1);t=periods/q}var eq_base_monthly;if(m===0){var continuous_r_monthly=mathjs.pow(ex,r)-1;m=1;eq_base_monthly=1+continuous_r_monthly/m}else{eq_base_monthly=1+r/m}var eq_power_monthly=m/12;var r_monthly=mathjs.pow(eq_base_monthly,eq_power_monthly)-1;var TotIntBal2=0,TotPerInt=0,iDep=0,dep_pow=0,daysPassed=0,date,LastDate,DepPrincBal=0,InIntBal=0,DepBal=0,DepIntBal=0,TotContr=0,TotDep=0,p=0,periodsCount=0;var TotPrincBal=InDep;var TotIntBal=0;var TotBal=0;var TotBalOpen=InDep;var InBal=InDep;var k;if(q===1){k=12}else if(q===2){k=6}else if(q===4){k=3}else if(q===12){k=1}else if(q===52){k=12/52.1775}else if(q===26){k=12/26.08875}else if(q===365){k=12/365.242}var MonthlyDep=PerPay/k;var periods_chart;if(VarSub===1){periods_chart=t*12+monthsBefore}else{periods_chart=t*12+monthsBefore+10}if(isNaN(periods_chart)){return-1}for(var i=0;i<=periods_chart;i++){if(i!==monthsBefore){gap=0}date=new Date((first_day+daysPassed+gap)*millisecondsInADay);var daysInMonth=getDaysInMonth(date);if(i>0){daysInMonth=daysInMonth+gap;daysPassed+=daysInMonth;if(i<=monthsBefore){dep_pow=i/12*qDef;if(i===1){TotBalOpen=InBal}else{TotBalOpen=TotBal}if(i===1){iDep=Deposit}else{iDep=Deposit*mathjs.pow(1+g_pDef,dep_pow-1)}DepPrincBal+=iDep;InBal=InDep*mathjs.pow(1+eq_pDef,dep_pow);InIntBal=InBal-InDep;if(g!==eq_pDef&&qDef!==1){DepBal=Deposit*(mathjs.pow(1+eq_pDef,dep_pow)-mathjs.pow(1+g_pDef,dep_pow))*(1+eq_pDef*VarTypeDef)/(eq_pDef-g_pDef)}else if(gDef!==eq_pDef&&qDef===1){DepBal=Deposit*(mathjs.pow(1+eq_pDef,dep_pow)-mathjs.pow(1+gDef,dep_pow))*(1+eq_pDef*VarTypeDef)/(eq_pDef-gDef)}else if(gDef===eq_pDef){DepBal=Deposit*i*mathjs.pow(1+eq_pDef,dep_pow-1)*(1+eq_pDef*VarTypeDef)}DepIntBal=DepBal-DepPrincBal;TotPrincBal=InDep+DepPrincBal;TotIntBal=InIntBal+DepIntBal;TotBal=TotPrincBal+TotIntBal;TotPerInt=-(TotBalOpen-TotBal+iDep);if(i===monthsBefore){TotBal=InDepFV}}if(i===monthsBefore+1){TotContr=TotDep}if(i>monthsBefore){p+=1;dep_pow=p/12*q;if(i===monthsBefore+1){iDep=MonthlyDep}else{iDep=MonthlyDep*mathjs.pow(1+g_p,dep_pow-1)}DepPrincBal+=iDep;InBal=InDepFV*mathjs.pow(1+eq_p,dep_pow);InIntBal=InBal-InDep;if(i===monthsBefore+1){TotBalOpen=InDepFV}else{TotBalOpen=TotBal}if(g!==eq_p&&qDef!==1){DepBal=PerPay*(mathjs.pow(1+eq_p,dep_pow)-mathjs.pow(1+g_p,dep_pow))*(1+eq_p*VarType)/(eq_p-g_p)}else if(g!==eq_p&&qDef===1){DepBal=PerPay*(mathjs.pow(1+eq_p,dep_pow)-mathjs.pow(1+g,dep_pow))*(1+eq_p*VarType)/(eq_p-g)}else if(g===eq_p){DepBal=PerPay*i*mathjs.pow(1+eq_p,dep_pow-1)*(1+eq_p*VarType)}DepIntBal=DepBal-DepPrincBal;TotPrincBal=InDep+DepPrincBal;TotIntBal=InIntBal+DepIntBal;TotBal=TotPrincBal+TotIntBal;if(i>=monthsBefore){TotPerInt=-(TotBalOpen-TotBal+iDep)}if(-iDep>TotBalOpen-FinBal&&VarSub>1){TotBal=FinBal;TotPerInt=TotBalOpen*r_monthly;iDep=-TotBalOpen-TotPerInt+FinBal}if(i%12===daysInMonth){iDep=0}}if(i===monthsBefore+1){TotContr=TotDep}TotDep+=iDep;TotIntBal2+=TotPerInt}if(i===0){TotBal=InDep}if(TotBalOpen>0.001+FinBal&&TotBal<0.001+FinBal){LastDate=date;periodsCount=p}}period_withdrawal=-PerPay*(1-Tax);balance_first=InDepFV;total_withdrawal=(InDep+TotIntBal2+TotContr)*(1-Tax);total_contribution=TotContr;total_return=TotIntBal2;number_withdrawal=periodsCount*(q/12);last_withdrawal=LastDate.getTime();last_for_months=periods;penalty_payment=InDepFV*penalty;return 1});omni.define("get_period_withdrawal",function(){return period_withdrawal});omni.define("get_balance_first",function(){return balance_first});omni.define("get_total_withdrawal",function(){return total_withdrawal});omni.define("get_total_contribution",function(){return total_contribution});omni.define("get_total_return",function(){return total_return});omni.define("get_last_withdrawal",function(){return last_withdrawal});omni.define("get_number_withdrawal",function(){return number_withdrawal});omni.define("get_last_for_months",function(){return last_for_months});omni.define("get_penalty_payment",function(){return penalty_payment});function getDaysInMonth(date){var year=date.getFullYear();var month=date.getMonth();return new Date(year,month+1,0).getDate()}//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        401(k) takes I'd like to know…, Annual salary and Expected salary growth rate and returns Withdrawal freq name and Timing withdrawal. Nothing is looked up on this page: withdrawal freq name is computed from i'd like to know… and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the 401(k) calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind 401(k): it takes 37 numbers and reports Withdrawal freq name and Timing withdrawal.</p><p>In the form&#039;s own words, Withdrawal frequency = ln(Expected inflation + 1) ÷ ln(Periodic growth rate + 1).</p><p>The answers are Withdrawal freq name and Timing withdrawal; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 37 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>I&#039;d like to know…</strong> — a plain number, no unit</li><li><strong>Annual salary</strong> — in USD</li><li><strong>Expected salary growth rate</strong> — in percent. This decide the percentage growth rate of your contribution over a year.</li><li><strong>Current age</strong> — in years</li><li><strong>Retirement age</strong> — in years. Your expected age when you will begin withdrawing from your 401(k) balance.</li><li><strong>Current 401(k) balance</strong> — in USD. This will be the opening balance at the beginning of the accumulation phase.</li><li><strong>Your contribution rate</strong> — in percent. How much of your salary do you transfer to the 401k account?</li><li><strong>Employer match</strong> — in percent. What part of your contributions does your employer match? E.g. if your employer matches 50% it means that for each $1 you contribute, they contribute $0.50.</li><li><strong>Employer matching limit</strong> — in percent. What is the maximum your employer is willing to match? E.g., a matching limit of 3% means that if you contribute 6%, they will match only 3%.</li><li><strong>Timing of contribution</strong> — a plain number, no unit</li><li><strong>Expected rate of return</strong> — in percent. The average interest rate or rate of return during the accumulation phase.</li><li><strong>Compounding method</strong> — a plain number, no unit. The frequency interest is added to your balance. Note, that it applies over the whole lifetime of the annuity.</li><li><strong>Time spent in retirement</strong> — in years</li><li><strong>Withdrawal amount</strong> — in USD. The amount you are planning to withdraw monthly.</li><li><strong>Income tax</strong> — in percent. Your income tax rate.</li><li><strong>Withdrawal frequency</strong> — a plain number, no unit. Interval between regular withdrawals.</li><li><strong>Expected rate of return</strong> — in percent. The average interest rate or rate of return during the payout phase.</li><li><strong>Timing of withdrawals</strong> — a plain number, no unit</li><li><strong>Expected inflation</strong> — in percent. The percentage growth rate of your withdrawals over a year.</li><li><strong>Schedule starts from…</strong> — a plain number, no unit, entered as a date</li><li><strong>Total contribution rate2</strong> — a plain number, no unit</li><li><strong>Total contribution rate1</strong> — a plain number, no unit</li><li><strong>Employer contrib2</strong> — a plain number, no unit</li><li><strong>Employer contrib1</strong> — a plain number, no unit</li><li><strong>Years before retirement</strong> — in years</li><li><strong>Remaining balance</strong> — in USD. Set an amount if you want to have some money left at the end of the withdrawal period.</li><li><strong>Monthly contribution</strong> — in USD. The amount that goes to your 401k every month.</li><li><strong>Monthly contribution</strong> — in USD. The amount that goes to your 401k every month.</li><li><strong>Monthly contribution</strong> — in USD</li><li><strong>Monthly growth rate</strong> — in percent. The percentage growth rate of the monthly contributions. Note, that periodic and annual growth rates are linked together: if you set one, the other will be calculated according to annuity frequency. Only available for a fixed length annuity.</li><li><strong>Periodic growth rate</strong> — in percent. The percentage growth rate of the monthly withdrawals. Note, that periodic and annual growth rates are linked together: if you set one, the other will be calculated according to annuity frequency. Only available for a fixed length annuity.</li><li><strong>Early withdrawal penalty</strong> — in percent. Early withdrawal is subject to a 10% penalty.</li><li><strong>Q def</strong> — a plain number, no unit</li><li><strong>Planned age to retire</strong> — in yrs</li><li><strong>Monthly payment</strong> — in USD</li><li><strong>Return status</strong> — a plain number, no unit</li><li><strong>Last withdrawal</strong> — a plain number, no unit, entered as a date</li></ul><p>The result boxes are Withdrawal freq name, Timing withdrawal; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — I&amp;#039;d like to know… = 1, Annual salary = 50000 USD, Current 401(k) balance = 4 USD, Timing of contribution = 0, Expected rate of return = 1.5 perc, Compounding method = 12, Advanced 1 = 0, Time spent in retirement = 20 yrs, Withdrawal amount = 1000 USD, Income tax = 12 perc, Expected rate of return = 1.5 perc, Timing of withdrawals = 1, Advanced 2 = 0, Remaining balance = 10 USD, Monthly contribution = 500 USD, Planned age to retire = 50 yrs, Schedule starts from… = Sun 1 March 2026 and Last withdrawal = Sun 1 March 2026 — through the same formula and the panel reports <strong>Withdrawal frequency</strong> = 12.</p><ul><li><strong>Withdrawal frequency</strong> = 12</li></ul><p>The line behind those figures is <strong>Withdrawal frequency</strong> = <code>ln(Expected inflation + 1) ÷ ln(Periodic growth rate + 1)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Withdrawal frequency</strong> = 12 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Expected salary growth rate offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Withdrawal frequency</strong> = <code>ln(Expected inflation + 1) ÷ ln(Periodic growth rate + 1)</code></li><li><strong>Expected inflation</strong> = <code>(Periodic growth rate + 1)^(Withdrawal frequency) − 1</code></li><li><strong>Periodic growth rate</strong> = <code>(Expected inflation + 1)^(1 ÷ Withdrawal frequency) − 1</code></li><li><strong>Monthly growth rate</strong> = <code>(Expected salary growth rate + 1)^(1 ÷ Q def) − 1</code></li><li><strong>Expected salary growth rate</strong> = <code>(Monthly growth rate + 1)^(Q def) − 1</code></li><li><strong>Q def</strong> = <code>ln(Expected salary growth rate + 1) ÷ ln(Monthly growth rate + 1)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Withdrawal frequency</strong> = <code>ln(Expected inflation + 1) ÷ ln(Periodic growth rate + 1)</code> — the form to use when Expected inflation and Periodic growth rate are the values you have.</li><li><strong>Expected inflation</strong> = <code>(Periodic growth rate + 1)^(Withdrawal frequency) − 1</code> — the form to use when Periodic growth rate and Withdrawal frequency are the values you have.</li><li><strong>Periodic growth rate</strong> = <code>(Expected inflation + 1)^(1 ÷ Withdrawal frequency) − 1</code> — the form to use when Expected inflation and Withdrawal frequency are the values you have.</li><li><strong>Monthly growth rate</strong> = <code>(Expected salary growth rate + 1)^(1 ÷ Q def) − 1</code> — the form to use when Expected salary growth rate and Q def are the values you have.</li><li><strong>Expected salary growth rate</strong> = <code>(Monthly growth rate + 1)^(Q def) − 1</code> — the form to use when Monthly growth rate and Q def are the values you have.</li><li><strong>Q def</strong> = <code>ln(Expected salary growth rate + 1) ÷ ln(Monthly growth rate + 1)</code> — the form to use when Expected salary growth rate and Monthly growth rate are the values you have.</li><li><strong>Years before retirement</strong> = <code>Retirement age − Current age</code> — the form to use when Retirement age and Current age are the values you have.</li><li><strong>Current age</strong> = <code>Retirement age − Years before retirement</code> — the form to use when Retirement age and Years before retirement are the values you have.</li></ul><p>Any one of Withdrawal frequency, Expected inflation and Periodic growth rate can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — I&#039;d like to know..., from 1 to 2 — and the answers go from <strong>Withdrawal frequency</strong> 12 to <strong>Withdrawal frequency</strong> 12.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Expected salary growth rate, Your contribution rate and Employer match is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Withdrawal freq name and Timing withdrawal are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>I&#039;d like to know… left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If I&amp;#039;d like to know… is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Annual salary left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Annual salary is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert I&#039;d like to know... to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Withdrawal freq name is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The chips cover percent and years. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It counts in whole days.</strong> The differences are counted in whole days, so an answer is a date or a number of days rather than an interval in hours. Expect a day&#039;s uncertainty if the event itself happened at an unknown time.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: I&#039;d like to know…, Annual salary and Expected salary growth rate measured, Withdrawal freq name and Timing withdrawal wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/bond-current-yield">Bond current yield Calculator</a>, <a href="/finance/bond-equivalent-yield">Bond equivalent yield Calculator</a> and <a href="/finance/bond-price">Bond price</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the 401(k) calculator work out?', 'a' => <<<'TXT'
            Withdrawal freq name and Timing withdrawal, from Expected inflation and Periodic growth rate. The relationship is Withdrawal frequency = ln(Expected inflation + 1) ÷ ln(Periodic growth rate + 1).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            I'd like to know…, Annual salary (USD), Expected salary growth rate (percent), Current age (years), Retirement age (years). Fill i'd like to know…, annual salary and expected salary growth rate and leave Withdrawal freq name empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Withdrawal frequency, Expected inflation, Periodic growth rate and Monthly growth rate blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Withdrawal frequency = 12. The figures come from I\'d like to know... as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Withdrawal freq name is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave I\'d like to know... blank and the page solves for it, reporting Withdrawal freq name instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Withdrawal freq name keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/bond-current-yield', 'name' => 'Bond current yield Calculator'],
            ['path' => '/finance/bond-equivalent-yield', 'name' => 'Bond equivalent yield Calculator'],
            ['path' => '/finance/bond-price', 'name' => 'Bond price'],
        ],
        'authors' => [],
    ],
];
