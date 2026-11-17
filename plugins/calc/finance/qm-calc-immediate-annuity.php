<?php

/**
 * Immediate annuity
 * /finance/immediate-annuity
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Immediate annuity',
    'meta' => ['title' => 'Immediate annuity: Formula, Steps & Results', 'description' => 'Immediate annuity works out periods. Each figure is computed from the boxes you fill, never read from a table. The formula is printed in the form\'s own words.', 'h1' => 'Immediate annuity Calculator', 'updated' => '2026-09-01'],
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
                            'options' => [
                                'how much can I withdraw?' => '3',
                                'how much money should I invest?' => '1',
                                'how long can I withdraw for?' => '4',
                                'what rate of return is needed?' => '5',
                                'how much money will remain?' => '2',
                            ],
                            'dataset' => 'subject',
                            'default' => 'how much can I withdraw?',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Annuity specifications',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PayFreq',
                            'label' => 'Payment frequency',
                            'type' => 'select',
                            'options' => [
                                'Yearly' => '1',
                                'Semi-annually' => '2',
                                'Quarterly' => '4',
                                'Monthly' => '12',
                                'Biweekly' => '26',
                                'Weekly' => '52',
                                'Daily' => '365',
                            ],
                            'dataset' => 'DATA4',
                            'control' => 'DROPDOWN',
                            'default' => 'Monthly',
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
                            'options' => ['End of periods' => '0', 'Beginning of periods' => '1'],
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
                            'name' => 'CompFreq',
                            'label' => 'Compounding frequency',
                            'type' => 'select',
                            'options' => [
                                'Yearly' => '1',
                                'Semi-annually' => '2',
                                'Quarterly' => '4',
                                'Monthly' => '12',
                                'Biweekly' => '26',
                                'Weekly' => '52',
                                'Daily' => '365',
                                'Continuous' => '0',
                            ],
                            'dataset' => 'DATA3',
                            'control' => 'DROPDOWN',
                            'help' => 'The frequency interest is added to your balance.',
                            'default' => 'Monthly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'StartDate', 'label' => 'Annuity starts from...', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'disp_com_freq',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Change compounding frequency' => '1', '' => '0'],
                            'dataset' => 'disp_comp_freq',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Annuity inputs',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'InDep',
                            'label' => 'Amount to invest',
                            'type' => 'number',
                            'help' => 'Your lump sum payment at the beginning of the annuity.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '100000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PerPay',
                            'label' => 'Payment amount',
                            'type' => 'number',
                            'help' => 'The amount you\'re planning to withdraw.',
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
                            'name' => 'FinBal',
                            'label' => 'Remaining balance',
                            'type' => 'number',
                            'help' => 'Set an amount if you would like to have some money left at the end of the withdrawal period.',
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
                            'name' => 't',
                            'label' => 'Length of withdrawal',
                            'type' => 'number',
                            'help' => 'The expected length of withdrawals.',
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
                            'name' => 'r',
                            'label' => 'Expected rate of return',
                            'type' => 'number',
                            'help' => 'The average interest rate or rate of return.',
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
                            'name' => 'g',
                            'label' => 'Growth rate of withdrawals',
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
                            'name' => 'g_p',
                            'label' => 'Periodic growth rate',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            The percentage growth rate of your periodic withdrawals. Note, that periodic and annual growth rates are linked together: if you set one, the other will be calculated according to the annuity frequency. Available only for fixed length annuities.
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
                        ['type' => 'note', 'text' => 'Your investment at the beginning of the annuity must exceed the desired final balance (adjust it by checking the Display more annuity parameters box).'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'more_annuity_vars',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Display more annuity parameters' => '1', '' => '0'],
                            'dataset' => 'more_annuityDS',
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
                                ['when' => 'r_r == 0', 'text' => 'The rate of return cannot be estimated with the given setup.'],
                                ['when' => 'VarSub == 4 and periods == 0', 'text' => 'The time length cannot be estimated with the given setup.'],
                                ['when' => 'VarSub == 4 and periods == 0 and InDep_eq_p >= abs_PerPay and VarFlow_r == -1', 'text' => 'The length of withdrawal is infinite since the interest earned {{title3.uiValue}} exceeds the withdrawal amount.&nbsp;'],
                                ['when' => 'VarSub == 4 and periods == 0 and InDep_r > FinBal_r and VarFlow_r == 1', 'text' => 'The final balance must exceed the initial deposit to estimate the time length with deposits.&nbsp;'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => '(VarSub == 3 and g == 0 and FinBal == 0) or (VarSub == 3 and g == 0 and FinBal_r != 0) or (VarSub == 3 and g != 0)', 'text' => 'You can&nbsp;'],
                                ['when' => '((VarSub == 3 and g == 0 and FinBal_r == 0) or (VarSub == 3 and g == 0 and FinBal != 0) or (VarSub == 3 and g != 0)) and PerPay_r >= 0', 'text' => 'deposit&nbsp;'],
                                ['when' => '((VarSub == 3 and g == 0 and FinBal_r == 0) or (VarSub == 3 and g == 0 and FinBal != 0) or (VarSub == 3 and g != 0)) and PerPay < 0', 'text' => 'withdraw&nbsp;'],
                                ['when' => '(VarSub == 3 and g == 0 and FinBal_r == 0) or (VarSub == 3 and g == 0 and FinBal != 0) or (VarSub == 3 and g != 0)', 'text' => '{{abs_PerPay.monetaryValue}}&nbsp;'],
                                ['when' => '((VarSub == 3 and g == 0 and FinBal_r == 0) or (VarSub == 3 and g != 0)) and infl != 0', 'text' => '{{PerPay_pv.monetaryValue}} in today\'s dollar.&nbsp;'],
                                ['when' => '((VarSub == 3 and g == 0 and FinBal_r == 0) or (VarSub == 3 and g != 0)) and infl == 0', 'text' => '&nbsp;'],
                                ['when' => 'VarSub == 3 and g == 0 and (FinBal_r == 0 or FinBal_r != 0)', 'text' => 'at the&nbsp;'],
                                ['when' => 'VarSub == 3 and g == 0 and (FinBal_r == 0 or FinBal != 0) and VarType ==  0', 'text' => 'end of&nbsp;'],
                                ['when' => 'VarSub == 3 and g == 0 and (FinBal_r == 0 or FinBal_r != 0) and VarType !=  0', 'text' => 'beginning of&nbsp;'],
                                ['when' => 'VarSub == 3 and g == 0 and (FinBal_r == 0 or FinBal_r != 0)', 'text' => 'each {{title2.uiValue}}&nbsp;'],
                                ['when' => 'VarSub == 3 and g == 0 and FinBal_r == 0', 'text' => 'to deplete your annuity entirely.&nbsp;'],
                                ['when' => 'VarSub == 3 and g == 0 and FinBal_r != 0', 'text' => 'to reach the final balance.&nbsp;'],
                                ['when' => 'VarSub == 3 and g != 0 and g > 0', 'text' => 'initially and increase&nbsp;'],
                                ['when' => 'VarSub == 3 and g != 0 and g < 0', 'text' => 'initially and decrease&nbsp;'],
                                ['when' => 'VarSub == 3 and g != 0', 'text' => 'it gradually to reach the final balance.'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'VarSub == 4 and FinBal_r == 0', 'text' => 'Your annuity will last for&nbsp;'],
                                ['when' => 'VarSub == 4 and FinBal_r != 0 and PerPay_r >= 0 and hasValue(FinBal_r)', 'text' => 'After depositing for&nbsp;'],
                                ['when' => 'VarSub == 4 and FinBal_r != 0 and PerPay_r < 0 and hasValue(FinBal_r)', 'text' => 'After withdrawing for&nbsp;'],
                                ['when' => 'VarSub == 4 and termCase == 1 and hasValue(FinBal_r)', 'text' => '{{yearDebt.formattedValue}} year&nbsp;'],
                                ['when' => 'VarSub == 4 and termCase == 2 and hasValue(FinBal_r)', 'text' => '{{yearDebt.formattedValue}} years&nbsp;'],
                                ['when' => 'VarSub == 4 and termCase == 3 and hasValue(FinBal_r)', 'text' => '{{monthDebt.formattedValue}} month&nbsp;'],
                                ['when' => 'VarSub == 4 and termCase == 4 and hasValue(FinBal_r)', 'text' => '{{monthDebt.formattedValue}} months&nbsp;'],
                                ['when' => 'VarSub == 4 and termCase == 5 and hasValue(FinBal_r)', 'text' => '{{yearDebt.formattedValue}} year {{monthDebt.formattedValue}} month&nbsp;'],
                                ['when' => 'VarSub == 4 and termCase == 6 and hasValue(FinBal_r)', 'text' => '{{yearDebt.formattedValue}} years and {{monthDebt.formattedValue}} month&nbsp;'],
                                ['when' => 'VarSub == 4 and termCase == 7 and hasValue(FinBal_r)', 'text' => '{{yearDebt.formattedValue}} year and {{monthDebt.formattedValue}} months&nbsp;'],
                                ['when' => 'VarSub == 4 and termCase == 8 and hasValue(FinBal_r)', 'text' => '{{yearDebt.formattedValue}} years and {{monthDebt.formattedValue}} months&nbsp;'],
                                ['when' => 'VarSub == 4 and FinBal_r == 0', 'text' => 'from the first day of withdrawal.&nbsp;'],
                                ['when' => 'VarSub == 4 and FinBal_r != 0 and hasValue(FinBal_r)', 'text' => ', you will reach {{FinBal_r.monetaryValue}}.&nbsp;'],
                                ['when' => 'VarSub == 1 and hasValue(InDep_r)', 'text' => 'The initial deposit (present value) of your annuity is {{InDep_r.monetaryValue}}.&nbsp;'],
                                ['when' => 'VarSub == 2 and hasValue(FinBal_r)', 'text' => 'The final balance (future value) of your annuity is {{FinBal_r.monetaryValue}}.&nbsp;'],
                                ['when' => 'VarSub == 5 and hasValue(r_r)', 'text' => 'The rate of return of your annuity needs to be {{r_r.formattedValue}}%.'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => '(TotBal_FinBal > 0.1 and VarSub == 3) or abs_PerPay < 0.01', 'text' => 'We can\'t proceed with the computation with the given setup.&nbsp;'],
                                ['when' => 'warning_msg_disp == 1 and hide == 0', 'text' => 'Your&nbsp;annuity balance&nbsp;will&nbsp;last&nbsp;for over&nbsp;100&nbsp;years.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Hidden variables',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'm',
                            'label' => 'M',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'q',
                            'label' => 'Withdrawal frequency',
                            'type' => 'result',
                            'help' => 'Interval between the regular withdrawals.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'Rep',
                            'label' => 'Display...',
                            'type' => 'select',
                            'options' => ['chart of balances' => '1', 'table of payment schedule' => '2', 'show all' => '3'],
                            'dataset' => 'DATA1',
                            'default' => 'chart of balances',
                        ],
                        [
                            'name' => 'TableFreq',
                            'label' => 'Show me...',
                            'type' => 'select',
                            'options' => ['periodic schedule' => '1', 'yearly schedule' => '2'],
                            'dataset' => 'DATA6',
                            'help' => 'Note, that only the yearly schedule is available when the term is longer than 30 years.',
                            'default' => 'yearly schedule',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarType',
                            'label' => 'Var type',
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
                            'name' => 'VarTime',
                            'label' => 'Var time',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'VarTable',
                            'label' => 'Var table',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarSub',
                            'label' => 'Var sub',
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
                            'name' => 'VarFlow_r',
                            'label' => 'Var flow r',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'VarFlow',
                            'label' => 'Var flow',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Infl',
                            'label' => 'Expected inflation rate',
                            'type' => 'number',
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
                            'name' => 'Timing',
                            'label' => 'Set term by...',
                            'type' => 'select',
                            'options' => ['length' => '1', 'dates' => '2'],
                            'dataset' => 'DATA0',
                            'default' => 'length',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'FlowType',
                            'label' => 'Flow type',
                            'type' => 'select',
                            'options' => ['deposit' => '1', 'withdrawal' => '2'],
                            'dataset' => 'DATA5',
                            'default' => 'withdrawal',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'TotBal',
                            'label' => 'Tot bal',
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
                            'name' => 'eq_p',
                            'label' => 'Eq p',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'periods',
                            'label' => 'Periods',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'FinBal_r',
                            'label' => 'Fin bal r',
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
                            'name' => 'InDep_r',
                            'label' => 'In dep r',
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
                            'name' => 'r_r',
                            'label' => 'R r',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'PerPay_r',
                            'label' => 'Per pay r',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'PerPay_pv',
                            'label' => 'Per pay pv',
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
                            'name' => 'title2',
                            'label' => 'title2',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'title3',
                            'label' => 'title3',
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
                            'name' => 'warning_msg_disp',
                            'label' => 'Warning msg disp',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'hide',
                            'label' => 'Hide',
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
                            'name' => 'termCase',
                            'label' => 'Term case',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'monthDebt',
                            'label' => 'Month debt',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'yearDebt',
                            'label' => 'Year debt',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'LastDate', 'label' => 'Last date', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'TotCashFlow',
                            'label' => 'Tot cash flow',
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
                            'name' => 'TotInt',
                            'label' => 'Tot int',
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
                            'name' => 'periodsCount',
                            'label' => 'Periods count',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'check_rem_bal',
                            'label' => 'Check rem bal',
                            'type' => 'number',
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
                            'name' => 'TotBal_FinBal',
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
                            'name' => 'InDep_eq_p',
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
                            'name' => 'abs_PerPay',
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
            'results' => ['q' => 'log(g + 1)/log(g_p + 1)', 'g_p' => 'pow(g + 1, 1/q) - 1', 'g' => 'pow(g_p + 1, q) - 1'],
        ],
        [
            'title' => 'periods = get_values(InDep, FinBal, Infl, m, q, t, VarType, VarTime, StartDate, EndDate, PerPay, VarTable, Type, r, g, g_p, VarSub, VarFlow, 0)',
            'results' => ['periods' => 'get_values(InDep, FinBal, Infl, m, q, t, VarType, VarTime, StartDate, EndDate, PerPay, VarTable, Type, r, g, g_p, VarSub, VarFlow, 0)'],
        ],
        [
            'title' => 'TotBal = get_TotBal()',
            'results' => ['TotBal' => 'get_TotBal()'],
        ],
        [
            'title' => 'eq_p = get_eq_p()',
            'results' => ['eq_p' => 'get_eq_p()'],
        ],
        [
            'title' => 'FinBal_r = get_FinBal_r()',
            'results' => ['FinBal_r' => 'get_FinBal_r()'],
        ],
        [
            'title' => 'InDep_r = get_InDep_r()',
            'results' => ['InDep_r' => 'get_InDep_r()'],
        ],
        [
            'title' => 'r_r = get_r_r()',
            'results' => ['r_r' => 'get_r_r()'],
        ],
        [
            'title' => 'PerPay_r = get_PerPay_r()',
            'results' => ['PerPay_r' => 'get_PerPay_r()'],
        ],
        [
            'title' => 'VarFlow_r = get_VarFlow_r()',
            'results' => ['VarFlow_r' => 'get_VarFlow_r()'],
        ],
        [
            'title' => 'PerPay_pv = get_PerPay_pv_r()',
            'results' => ['PerPay_pv' => 'get_PerPay_pv_r()'],
        ],
        [
            'title' => 'warning_msg_disp = get_warning_msg_r()',
            'results' => ['warning_msg_disp' => 'get_warning_msg_r()'],
        ],
        [
            'title' => 'hide = get_hide()',
            'results' => ['hide' => 'get_hide()'],
        ],
        [
            'title' => 'termCase = get_termCase()',
            'results' => ['termCase' => 'get_termCase()'],
        ],
        [
            'title' => 'yearDebt = get_yearDebt()',
            'results' => ['yearDebt' => 'get_yearDebt()'],
        ],
        [
            'title' => 'monthDebt = get_monthDebt()',
            'results' => ['monthDebt' => 'get_monthDebt()'],
        ],
        [
            'title' => 'TotCashFlow = get_TotCashFlow()',
            'results' => ['TotCashFlow' => 'get_TotCashFlow()'],
        ],
        [
            'title' => 'TotInt = get_TotInt()',
            'results' => ['TotInt' => 'get_TotInt()'],
        ],
        [
            'title' => 'periodsCount = get_periodsCount()',
            'results' => ['periodsCount' => 'get_periodsCount()'],
        ],
        [
            'title' => 'LastDate = get_LastDate()',
            'results' => ['LastDate' => 'get_LastDate()'],
        ],
        [
            'title' => 'check_rem_bal = checkRemainingBalance(Subject, InDep, FinBal)',
            'results' => ['check_rem_bal' => 'checkRemainingBalance(Subject, InDep, FinBal)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";var hide=0;var milisecondsInADay=24*60*60*1000;omni.define("checkRemainingBalance",function(_Subject,InDep,FinBal){var checker;var Subject=Number(_Subject);if(Subject!==1&&Subject!==2){if(Number(InDep)<Number(FinBal)){checker=0}else{checker=1}}return checker});var periods_res,TotBal_res,eq_p_res,FinBal_res,InDep_res,r_res,PerPay_res,VarFlow_res,PerPay_pv_res,warning_msg_res,hide_res,termCase_res,yearDebt_res,monthDebt_res,TotCashFlow_res,TotInt_res,periodsCount_res,LastDate_res;omni.define("get_values",function(_InDep,_FinBal,_Infl,_m,_q,_t,_VarType,_VarTime,_StartDate,_EndDate,_PerPay,_VarTable,_Type,_r,_g,_g_p,_VarSub,_VarFlow,index){var InDep=_InDep;var FinBal=_FinBal;var m=_m;var q=_q;var t=_t;var VarType=_VarType;var VarTable=_VarTable;var VarTime=_VarTime;var StartDate=_StartDate;var EndDate=_EndDate;var PerPay=_PerPay;var r=_r;var g=_g;var g_p=_g_p;var VarSub=_VarSub;var Infl=_Infl;var VarFlow=_VarFlow;PerPay=PerPay*VarFlow;if(VarSub>3){g_p=0}if(t>30){VarTable=2}if(VarSub===3){VarFlow=1}hide=0;var dayInTerm=mathjs.floor(EndDate-StartDate);var periods;if(VarTime===1){periods=q*t}if(VarTime===2){periods=dayInTerm/365.242*q+1}if(r===0){r=1e-10}var eq_p=getPerEqRate(q,m,r);var DepBal=0;var FinPrincBal=0;if(VarSub===1){DepBal=getBal(PerPay,periods,q,eq_p,g_p,g,VarType);FinPrincBal=FinBal-DepBal;InDep=getPV(FinPrincBal,eq_p,periods)}if(VarSub===2){DepBal=getBal(PerPay,periods,q,eq_p,g_p,g,VarType);FinPrincBal=getFV(InDep,eq_p,periods);FinBal=FinPrincBal+DepBal}if(VarSub===3){PerPay=getPerPay(InDep,FinBal,periods,q,eq_p,g_p,g,VarType)}if(VarSub===4){periods=getAnnuityPer(InDep,FinBal,PerPay,q,eq_p,VarType)}if(VarSub===5){r=getIntRate(InDep,FinBal,PerPay,periods,m,q,VarType);eq_p=getPerEqRate(q,m,r/100);if(r===0){hide=1}}if(VarSub===4&&periods===0){hide=1}var periodsLoop=mathjs.floor(periods);if(VarSub===4){periodsLoop=mathjs.floor(periods+1)}var daysPassed=0;var daysInPeriod;var date;var i;var iDep=0;var InBal=0;var TotBal=InDep;var TotBalOpen=0;var TotIntPer=0;var TotInt=0;var YearDep=0;var YearInt=0;var DepBalOpen=0;var InBalOpen=0;var TotCashFlow=0;var dateText;var warning_msg=0;var PerPay_pv;var periodsCount=0;var LastDate=new Date(StartDate);if(hide===0){for(i=0;i<=periodsLoop;i++){if(i/q>100){warning_msg=1;return}date=new Date((StartDate/milisecondsInADay+daysPassed)*milisecondsInADay);daysInPeriod=getDaysInPeriod(date,q);if(VarType===0){dateText=new Date((StartDate/milisecondsInADay+daysPassed+daysInPeriod-1)*milisecondsInADay)}if(VarType===1){dateText=new Date((StartDate/milisecondsInADay+daysPassed)*milisecondsInADay)}if(i>0){daysPassed+=daysInPeriod;InBal=InDep*mathjs.pow(1+eq_p,i);InBalOpen=InDep*mathjs.pow(1+eq_p,i-1);DepBal=getBal(PerPay,i,q,eq_p,g_p,g,VarType);DepBalOpen=getBal(PerPay,i-1,q,eq_p,g_p,g,VarType);TotBal=InBal+DepBal;TotBalOpen=InBalOpen+DepBalOpen;iDep=PerPay*mathjs.pow(1+g_p,i-1);if(VarType===1){TotIntPer=(TotBalOpen+iDep)*eq_p}else{TotIntPer=TotBalOpen*eq_p}TotInt+=TotIntPer;LastDate=dateText;periodsCount=i;TotCashFlow+=iDep}}}if(mathjs.abs(TotBal-FinBal)>0.1&&VarSub===3||mathjs.abs(PerPay)<0.01){hide=1}if(TotBal<0.0001&&TotBal>-0.0001){TotBal=0}var termCase;var yearDebt;var monthDebt;if(hide===0){var months=periods/q*12;yearDebt=parseInt(Math.trunc(months/12));monthDebt=parseInt(mathjs.ceil(months-yearDebt*12));if(yearDebt===1&&monthDebt===0){termCase=1}if(yearDebt>1&&monthDebt===0){termCase=2}if(yearDebt===0&&monthDebt===1){termCase=3}if(yearDebt===0&&monthDebt>1){termCase=4}if(yearDebt===1&&monthDebt===1){termCase=5}if(yearDebt>1&&monthDebt===1){termCase=6}if(yearDebt===1&&monthDebt>1){termCase=7}if(yearDebt>1&&monthDebt>1){termCase=8}var yearsBefore=0;PerPay_pv=-PerPay/mathjs.pow(1+Infl,yearsBefore)}if(TotCashFlow<0){TotCashFlow=-TotCashFlow}var results=[periods,TotBal,eq_p,FinBal,InDep,r,PerPay,VarFlow,PerPay_pv,warning_msg,hide,termCase,yearDebt,monthDebt,TotCashFlow,TotInt,periodsCount,LastDate.getTime()];periods_res=periods;TotBal_res=TotBal;eq_p_res=eq_p;FinBal_res=FinBal;InDep_res=InDep;r_res=r;PerPay_res=PerPay;VarFlow_res=VarFlow;PerPay_pv_res=PerPay_pv;warning_msg_res=warning_msg;hide_res=hide;termCase_res=termCase;yearDebt_res=yearDebt;monthDebt_res=monthDebt;TotCashFlow_res=TotCashFlow;TotInt_res=TotInt;periodsCount_res=periodsCount;LastDate_res=LastDate.getTime();return results[index]});omni.define("get_periods",function(){return periods_res});omni.define("get_TotBal",function(){return TotBal_res});omni.define("get_eq_p",function(){return eq_p_res});omni.define("get_InDep_r",function(){return InDep_res});omni.define("get_FinBal_r",function(){return FinBal_res});omni.define("get_r_r",function(){return r_res});omni.define("get_PerPay_r",function(){return PerPay_res});omni.define("get_VarFlow_r",function(){return VarFlow_res});omni.define("get_PerPay_pv_r",function(){return PerPay_pv_res});omni.define("get_warning_msg_r",function(){return warning_msg_res});omni.define("get_hide",function(){return hide_res});omni.define("get_termCase",function(){return termCase_res});omni.define("get_yearDebt",function(){return yearDebt_res});omni.define("get_monthDebt",function(){return monthDebt_res});omni.define("get_TotCashFlow",function(){return TotCashFlow_res});omni.define("get_TotInt",function(){return TotInt_res});omni.define("get_periodsCount",function(){return periodsCount_res});omni.define("get_LastDate",function(){return LastDate_res});function getPV(FinPrincBal,eq_p,periods){var InBal=FinPrincBal/mathjs.pow(1+eq_p,periods);return InBal}function getFV(InBal,eq_p,periods){var FinPrincBal=InBal*mathjs.pow(1+eq_p,periods);return FinPrincBal}function getBal(PerPay,periods,q,eq_p,g_p,g,VarType){var DepBal;if(g_p!==eq_p&&q!==1){DepBal=PerPay*(mathjs.pow(1+eq_p,periods)-mathjs.pow(1+g_p,periods))*(1+eq_p*VarType)/(eq_p-g_p)}else if(g!==eq_p&&q===1){DepBal=PerPay*(mathjs.pow(1+eq_p,periods)-mathjs.pow(1+g,periods))*(1+eq_p*VarType)/(eq_p-g)}else if(g_p===eq_p){DepBal=PerPay*periods*mathjs.pow(1+eq_p,periods-1)*(1+eq_p*VarType)}return DepBal}function getPerPay(InBal,FinBal,periods,q,eq_p,g_p,g,VarType){var PerPay;var PrincBal=InBal*mathjs.pow(1+eq_p,periods);var DepBal=FinBal-PrincBal;if(g_p!==eq_p&&q!==1){PerPay=DepBal/((mathjs.pow(1+eq_p,periods)-mathjs.pow(1+g_p,periods))*(1+eq_p*VarType)/(eq_p-g_p))}else if(g!==eq_p&&q===1){PerPay=DepBal/((mathjs.pow(1+eq_p,periods)-mathjs.pow(1+g,periods))*(1+eq_p*VarType)/(eq_p-g))}else if(g_p===eq_p){PerPay=DepBal/(periods*mathjs.pow(1+eq_p,periods-1)*(1+eq_p*VarType))}return PerPay}function getAnnuityPer(InBal,FinBal,PerPay,q,eq_p,VarType){var periods;periods=mathjs.log((eq_p*(FinBal+PerPay*VarType)+PerPay)/(eq_p*InBal+PerPay*(1+eq_p*VarType)))/mathjs.log(eq_p+1);if(periods>0){periods=periods}else{periods=0}return periods}function getIntRate(InBal,FinBal,PerPay,periods,m,q,VarType){var Max_iterations=500000;var Min_precision=1e-9;var ex=Math.exp(1);var APR_approx=0.1;var oldI;var newI=APR_approx;var iteration=0;do{oldI=newI;var dividend=InBal*mathjs.pow(newI+1,periods)+PerPay*(mathjs.pow(newI+1,periods)-1)*(1+newI*VarType)/newI-FinBal;var divisor=InBal*periods*mathjs.pow(newI+1,periods-1)+((PerPay*periods*mathjs.pow(newI+1,periods-1)*(1+newI*VarType)+PerPay*(mathjs.pow(newI+1,periods)-1))*newI-PerPay*(mathjs.pow(newI+1,periods)-1)*(1+newI*VarType))/mathjs.pow(newI,2);newI=newI-dividend/divisor;++iteration}while(mathjs.abs(oldI-newI)>Min_precision&&iteration<=Max_iterations);var eq_p=newI;var oldR;var newR=eq_p;do{oldR=newR;if(m===0){var dividendR=mathjs.pow(ex,newR/q)-1-eq_p;var divisorR=mathjs.pow(ex,newR/q)/q;newR=newR-dividendR/divisorR}else{var dividendR2=mathjs.pow(1+newR/m,m/q)-1-eq_p;var divisorR2=mathjs.pow(1+newR/m,m/q-1)/q;newR=newR-dividendR2/divisorR2}++iteration}while(mathjs.abs(oldR-newR)>Min_precision&&iteration<=Max_iterations);eq_p=newR/q;var r=eq_p*q*100;if(mathjs.abs(r)<0){r=0}return r}function getPerEqRate(q,m,r){var ex=Math.exp(1);var base;if(m===0){var continuous_r=mathjs.pow(ex,r)-1;m=1;base=1+continuous_r/m}else{base=1+r/m}var power=m/q;var eq_p=mathjs.round(mathjs.pow(base,power)-1,10);return eq_p}function getDaysInPeriod(date,q){var daysInMonth;var daysInPeriod;var DaysInYear;var DaysInNextYear;var day=date.getDate();var month=date.getMonth();var year=date.getFullYear();if(day<29&&month===0){daysInMonth=31}else if(day===29&&month===0){daysInMonth=30}else if(day===30&&month===0){daysInMonth=29}else if(day===31&&month===0){daysInMonth=28}else if(day<29&&month===1){daysInMonth=28}else if(day===29&&month===1){daysInMonth=29}else if(day===30&&month===1){daysInMonth=30}else if(day===31&&month===1){daysInMonth=31}else if(day<31&&month===2){daysInMonth=31}else if(day===31&&month===2){daysInMonth=30}else if(day<31&&month===3){daysInMonth=30}else if(day===31&&month===3){daysInMonth=31}else if(day<31&&month===4){daysInMonth=31}else if(day===31&&month===4){daysInMonth=30}else if(day<31&&month===5){daysInMonth=30}else if(day===31&&month===5){daysInMonth=31}else if(day<31&&month===6){daysInMonth=31}else if(day===31&&month===6){daysInMonth=31}else if(day<31&&month===7){daysInMonth=31}else if(day===31&&month===7){daysInMonth=30}else if(day<31&&month===8){daysInMonth=30}else if(day===31&&month===8){daysInMonth=31}else if(day<31&&month===9){daysInMonth=31}else if(day===31&&month===9){daysInMonth=30}else if(day<31&&month===10){daysInMonth=30}else if(day===31&&month===10){daysInMonth=31}else if(day<31&&month===11){daysInMonth=31}else if(day===31&&month===11){daysInMonth=31}if(year%4===0&&year%100!==0&&date.getMonth()===1||year%400===0&&month===1){daysInMonth=29}if(year%4===0&&year%100!==0&&month===0&&date.getDate()===30||year%400===0&&month===0&&date.getDate()===30){daysInMonth=30}if(year%4===0&&year%100!==0&&month===0&&date.getDate()===31||year%400===0&&month===0&&date.getDate()===31){daysInMonth=29}if(year%4===0&&year%100!==0&&month===0&&date.getDate()===29||year%400===0&&month===0&&date.getDate()===29){daysInMonth=31}if(date.getDate()===29&&date.getMonth()===1&&day>29){daysInMonth=30}if(date.getDate()===29&&date.getMonth()===1&&day>30){daysInMonth=31}if(date.getDate()===28&&date.getMonth()===1&&day>30){daysInMonth=31}if(year%4===0&&year%100!==0||year%400===0){DaysInYear=366}else{DaysInYear=365}if((year+1)%4===0&&(year+1)%100!==0||(year+1)%400===0){DaysInNextYear=366}else{DaysInNextYear=365}if(q===1){daysInPeriod=DaysInYear}if(q===2){daysInPeriod=DaysInYear/2}if(q===12){daysInPeriod=daysInMonth}if(q===26){daysInPeriod=14}if(q===52){daysInPeriod=7}if(q===365){daysInPeriod=1}if(q===4){if(month<=1&&DaysInYear===366){daysInPeriod=90}else if(month<=1&&DaysInYear===365){daysInPeriod=89}else if(month===11&&DaysInNextYear===366){daysInPeriod=92}else if(month===11&&DaysInNextYear===365){daysInPeriod=91}else if(month===2||month===4||month===6||month===7||month===9||month===10){daysInPeriod=92}else if(month===3||month===5||month===8){daysInPeriod=91}if(day===31&&(month===2||month===7)){daysInPeriod=91}if(day===30&&(month===3||month===8||month===5)){daysInPeriod=92}if(day===31&&month===0&&DaysInYear===365){daysInPeriod=89}if(day===31&&month===0&&DaysInYear===366){daysInPeriod=90}if(day===31&&(month===4||month===9)){daysInPeriod=92}if(day>=30&&month>=10&&DaysInNextYear===366){daysInPeriod=91}if(day>=30&&month>=10&&DaysInNextYear===365){daysInPeriod=90}if(day===28&&month===1&&DaysInYear===365){daysInPeriod=92}if(day===28&&month===1&&DaysInYear===366){daysInPeriod=93}if(day===29&&month===1){daysInPeriod=92}}return daysInPeriod}//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Immediate annuity works out Withdrawal frequency and Var flow r from Timing of withdrawals, Annuity starts from… and Amount to invest. Nothing is looked up on this page: withdrawal frequency is computed from timing of withdrawals and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Immediate annuity calculator works', 'html' => <<<'TXT'
            <p>The Immediate annuity calculator applies one relationship to 10 numbers and reports Withdrawal frequency, Var flow r and Tot bal.</p><p>Written with the labels from the form, Withdrawal frequency = ln(Growth rate of withdrawals + 1) ÷ ln(Periodic growth rate + 1).</p><p>The result panel carries Withdrawal frequency, Var flow r, Tot bal and Eq p, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 10 boxes, and nothing else.</p><ul><li><strong>Timing of withdrawals</strong> — a plain number, no unit</li><li><strong>Annuity starts from…</strong> — a plain number, no unit, entered as a date</li><li><strong>Amount to invest</strong> — in USD. Your lump sum payment at the beginning of the annuity.</li><li><strong>Payment amount</strong> — in USD. The amount you&#039;re planning to withdraw.</li><li><strong>Remaining balance</strong> — in USD. Set an amount if you would like to have some money left at the end of the withdrawal period.</li><li><strong>Planned age to retire</strong> — in yrs</li><li><strong>Length of withdrawal</strong> — in years. The expected length of withdrawals.</li><li><strong>Expected rate of return</strong> — in percent. The average interest rate or rate of return.</li><li><strong>Growth rate of withdrawals</strong> — in percent. The percentage growth rate of your withdrawals over a year.</li><li><strong>Periodic growth rate</strong> — in percent. The percentage growth rate of your periodic withdrawals. Note, that periodic and annual growth rates are linked together: if you set one, the other will be calculated according to the annuity frequency. Available only for fixed length annuities.</li></ul><p>The result boxes are Withdrawal frequency, Var flow r, Tot bal, Eq p, Periods, Fin bal r, In dep r, R r, Per pay r, Per pay pv, Warning msg disp, Hide, Term case, Month debt, Year debt, Last date, Tot cash flow, Tot int, Periods count, Check rem bal; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — I&amp;#039;d like to know… = 3, Payment frequency = 12, Timing of withdrawals = 1, Compounding frequency = 12, Disp com freq = 0, Amount to invest = 100000 USD, Payment amount = 1000 USD, Remaining balance = 5 USD, Planned age to retire = 50 yrs, Length of withdrawal = 10 yrs, Expected rate of return = 1.5 perc, More annuity vars = 0 and Annuity starts from… = Sun 1 March 2026 — through the same formula and the panel reports <strong>Display…</strong> = 1, <strong>Show me…</strong> = 2, <strong>Expected inflation rate</strong> = 0, <strong>Set term by…</strong> = 1 and <strong>Flow type</strong> = 2.</p><ul><li><strong>Display…</strong> = 1</li><li><strong>Show me…</strong> = 2</li><li><strong>Expected inflation rate</strong> = 0</li><li><strong>Set term by…</strong> = 1</li><li><strong>Flow type</strong> = 2</li></ul><p>That is <strong>Withdrawal frequency</strong> = <code>ln(Growth rate of withdrawals + 1) ÷ ln(Periodic growth rate + 1)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Display...</strong> = 1, <strong>Show me...</strong> = 2, <strong>Expected inflation rate</strong> = 0, <strong>Set term by...</strong> = 1 and <strong>Flow type</strong> = 2. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Length of withdrawal lists 5 options and opens on years. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Withdrawal frequency</strong> = <code>ln(Growth rate of withdrawals + 1) ÷ ln(Periodic growth rate + 1)</code></li><li><strong>Periodic growth rate</strong> = <code>(Growth rate of withdrawals + 1)^(1 ÷ Withdrawal frequency) − 1</code></li><li><strong>Growth rate of withdrawals</strong> = <code>(Periodic growth rate + 1)^(Withdrawal frequency) − 1</code></li><li><strong>Tot bal</strong> = <code>get_TotBal()</code></li><li><strong>Eq p</strong> = <code>get_eq_p()</code></li><li><strong>Fin bal r</strong> = <code>get_FinBal_r()</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Withdrawal frequency</strong> = <code>ln(Growth rate of withdrawals + 1) ÷ ln(Periodic growth rate + 1)</code> — the form to use when Growth rate of withdrawals and Periodic growth rate are the values you have.</li><li><strong>Periodic growth rate</strong> = <code>(Growth rate of withdrawals + 1)^(1 ÷ Withdrawal frequency) − 1</code> — the form to use when Growth rate of withdrawals and Withdrawal frequency are the values you have.</li><li><strong>Growth rate of withdrawals</strong> = <code>(Periodic growth rate + 1)^(Withdrawal frequency) − 1</code> — the form to use when Periodic growth rate and Withdrawal frequency are the values you have.</li><li><strong>Tot bal</strong> = <code>get_TotBal()</code> — the form to use when the other values are known.</li><li><strong>Eq p</strong> = <code>get_eq_p()</code> — the form to use when the other values are known.</li><li><strong>Fin bal r</strong> = <code>get_FinBal_r()</code> — the form to use when the other values are known.</li><li><strong>In dep r</strong> = <code>get_InDep_r()</code> — the form to use when the other values are known.</li><li><strong>R r</strong> = <code>get_r_r()</code> — the form to use when the other values are known.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Withdrawal frequency, Periodic growth rate and Growth rate of withdrawals can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — I&#039;d like to know..., from 3 to 6 — and the answers go from <strong>Display...</strong> 1, <strong>Show me...</strong> 2, <strong>Expected inflation rate</strong> 0, <strong>Set term by...</strong> 1 and <strong>Flow type</strong> 2 to <strong>Display...</strong> 1, <strong>Show me...</strong> 2, <strong>Expected inflation rate</strong> 0, <strong>Set term by...</strong> 1 and <strong>Flow type</strong> 2.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Length of withdrawal, Expected rate of return and Growth rate of withdrawals carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Withdrawal frequency, Var flow r and Tot bal are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Timing of withdrawals left as a guess.</strong> Anything typed into Timing of withdrawals is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Annuity starts from… left as a guess.</strong> Anything typed into Annuity starts from… is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Timing of withdrawals and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Immediate annuity form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Timing of withdrawals</strong> takes a plain number with no unit attached. The page reads it when it works out Periods. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Timing of withdrawals is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Annuity starts from…</strong> takes a plain number with no unit attached. The page reads it when it works out Periods. Fill it from a measurement rather than a memory — Annuity starts from… is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Amount to invest</strong> takes a plain number with no unit attached. Your lump sum payment at the beginning of the annuity. The page reads it when it works out Periods and Check rem bal. Fill it from a measurement rather than a memory — Amount to invest is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Payment amount</strong> takes a plain number with no unit attached. The amount you&#039;re planning to withdraw. The page reads it when it works out Periods. Fill it from a measurement rather than a memory — Payment amount is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Remaining balance</strong> takes a plain number with no unit attached. Set an amount if you would like to have some money left at the end of the withdrawal period. The page reads it when it works out Periods and Check rem bal. Fill it from a measurement rather than a memory — Remaining balance is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Planned age to retire</strong> is measured in yrs. The page reads it when it works out Periods. Fill it from a measurement rather than a memory — Planned age to retire is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Length of withdrawal</strong> is a years quantity: the page opens it in yrs and converts anything else you pick before the formula runs. The expected length of withdrawals. The page reads it when it works out Periods. Fill it from a measurement rather than a memory — Length of withdrawal is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Expected rate of return</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The average interest rate or rate of return. The page reads it when it works out Periods. Fill it from a measurement rather than a memory — Expected rate of return is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Growth rate of withdrawals</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The percentage growth rate of your withdrawals over a year. The page reads it when it works out Withdrawal frequency, Periodic growth rate and Periods. Fill it from a measurement rather than a memory — Growth rate of withdrawals is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Periodic growth rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The percentage growth rate of your periodic withdrawals. Note, that periodic and annual growth rates are linked together: if you set one, the other will be calculated according to the annuity frequency. Available only for fixed length annuities. The page reads it when it works out Withdrawal frequency, Growth rate of withdrawals and Periods. Fill it from a measurement rather than a memory — Periodic growth rate is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Withdrawal frequency is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The chips cover years and percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It counts in whole days.</strong> The differences are counted in whole days, so an answer is a date or a number of days rather than an interval in hours. Expect a day&#039;s uncertainty if the event itself happened at an unknown time.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Timing of withdrawals, Annuity starts from… and Amount to invest is what you already know and Withdrawal frequency and Var flow r is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/black-scholes">Black Scholes Calculator</a>, <a href="/finance/blended-rate">Blended rate Calculator</a> and <a href="/finance/boat-loan">Boat loan</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Immediate annuity calculator work out?', 'a' => <<<'TXT'
            Withdrawal frequency, Var flow r, Tot bal and Eq p, from Growth rate of withdrawals and Periodic growth rate. The relationship is Withdrawal frequency = ln(Growth rate of withdrawals + 1) ÷ ln(Periodic growth rate + 1).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Timing of withdrawals, Annuity starts from…, Amount to invest (USD), Payment amount (USD), Remaining balance (USD). With timing of withdrawals, annuity starts from… and amount to invest in place, Withdrawal frequency can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Withdrawal frequency, Periodic growth rate, Growth rate of withdrawals and Periods can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Display… = 1, Show me… = 2, Expected inflation rate = 0, Set term by… = 1 and Flow type = 2. That comes from the page's own defaults, entered in Timing of withdrawals; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Withdrawal frequency is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Timing of withdrawals blank and the page solves for it, reporting Withdrawal frequency instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Withdrawal frequency keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/black-scholes', 'name' => 'Black Scholes Calculator'],
            ['path' => '/finance/blended-rate', 'name' => 'Blended rate Calculator'],
            ['path' => '/finance/boat-loan', 'name' => 'Boat loan'],
        ],
        'authors' => [],
    ],
];
