<?php

/**
 * Moratorium
 * /finance/moratorium-emi
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Moratorium',
    'meta' => ['title' => 'Moratorium Calculator: Formula, Steps & Examples', 'description' => 'Moratorium takes estimation based on..., loan amount and Current EMI and returns equated monthly installment (EMI) and loan tenure. The answer is shown in USD.', 'h1' => 'Moratorium Calculator', 'updated' => '2025-10-03'],
    'sections' => [
        [
            'title' => 'Loan inputs',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Mode',
                            'label' => 'Estimation based on...',
                            'type' => 'select',
                            'options' => ['loan term (tenure)' => '1', 'monthly payment (EMI)' => '2'],
                            'dataset' => 'DATA11',
                            'default' => 'loan term (tenure)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'LoanAmount',
                            'label' => 'Loan amount',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '3000000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Payment',
                            'label' => 'Current EMI',
                            'type' => 'number',
                            'help' => 'Monthly payment before moratorium.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '40000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'first_day', 'label' => 'Date of balance', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 't',
                            'label' => 'Loan term',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrsmos',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '120',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'r',
                            'label' => 'Interest rate',
                            'type' => 'number',
                            'help' => 'Annual rate of interest.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '8',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'Per <= 0', 'text' => 'The estimated tenure is too short with the given parameters.&nbsp;'],
                                ['when' => 'LoanAmount <= Payment', 'text' => 'The loan amount must be larger than the given EMI.'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'CompoundFreq',
                            'label' => 'Compounding frequency',
                            'type' => 'select',
                            'options' => [
                                'Annually' => '11',
                                'Semi-annually' => '12',
                                'Quarterly' => '13',
                                'Monthly' => '14',
                                'Daily' => '15',
                            ],
                            'dataset' => 'DATA3',
                            'control' => 'DROPDOWN',
                            'help' => 'How often the interest is computed on the outstanding principle.',
                            'default' => 'Monthly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Pmt',
                            'label' => 'Equated monthly installment (EMI)',
                            'type' => 'number',
                            'help' => 'Monthly payment before moratorium.',
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
                            'name' => 'Per',
                            'label' => 'Loan tenure',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrsmos',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'show_comp_freq',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Change compounding frequency' => '1', '' => '0'],
                            'dataset' => 'disp_compFreq',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Loan moratorium',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'DefIntMode',
                            'label' => 'Interest treatment',
                            'type' => 'select',
                            'options' => ['Capitalized (added to principal)' => '11', 'Paid monthly during moratorium' => '112'],
                            'dataset' => 'DATA01',
                            'default' => 'Capitalized (added to principal)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'DefType',
                            'label' => 'Repayment by...',
                            'type' => 'select',
                            'options' => ['increased payment - same term' => '11', 'increased payment - extended term' => '12', 'same payment - extended term' => '13'],
                            'dataset' => 'DATA02',
                            'default' => 'increased payment - same term',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'DefFrom', 'label' => 'Moratorium from', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'DefPer',
                            'label' => 'Moratorium periods',
                            'type' => 'number',
                            'suffix' => 'months',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Payment summary',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'VarDef == 1 and periods <= DefPer', 'text' => 'The number of moratorium periods should be less than the loan tenure if you choose the "increased EMI - same tenure" option.&nbsp;'],
                                ['when' => 'hide2 == 0 and Per <= 0', 'text' => 'The monthly payment is either too small or too large relative to the loan amount - please update the loan inputs&nbsp;'],
                                ['when' => 'hide2 == 0 and LoanAmount / Payment < 2 and VarMode == 2', 'text' => 'The monthly payment is too large compared to the loan amount - please update the loan inputs.&nbsp;'],
                                ['when' => 'hide2 == 0 and BalanceAtDef <= 0', 'text' => 'With the given dates, your loan will already be paid off at the beginning of moratorium.&nbsp;'],
                                ['when' => 'disp_msg_error == 1', 'text' => 'With the given setup, you can\'t repay your loan after the moratorium.'],
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
                                ['when' => 'VarInt == 2', 'text' => <<<'TXT'
                                The accumulated interest during deferment is {{DefInt.monetaryValue}}, which is paid back when deferment ends by making equal payments of {{DefIntEq.monetaryValue}}.
                                TXT],
                                ['when' => 'VarInt == 1', 'text' => <<<'TXT'
                                The loan balance is {{BalanceAtDef.monetaryValue}} at the beginning of the moratorium, and will be {{Balance_Int.monetaryValue}} at the end of it. The accumulated interest in the moratorium is {{DefInt.monetaryValue}}.
                                TXT],
                                ['when' => 'VarInt == 11', 'text' => <<<'TXT'
                                The loan balance is {{BalanceAtDef.monetaryValue}} at the beginning of the moratorium, and will remain the same at the end of it. The monthly interest payment during the moratorium is {{Balance_eqp.monetaryValue}}.
                                TXT],
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
                                ['when' => null, 'text' => 'Term * Without moratorium:&nbsp;'],
                                ['when' => 'TermRef_msg == 1', 'text' => '{{TermRef_years.formattedValue}} year&nbsp;'],
                                ['when' => 'TermRef_msg == 2', 'text' => '{{TermRef_years.formattedValue}} years&nbsp;'],
                                ['when' => 'TermRef_msg == 3', 'text' => '{{TermRef_months.formattedValue}} month&nbsp;'],
                                ['when' => 'TermRef_msg == 4', 'text' => '{{TermRef_months.formattedValue}} months&nbsp;'],
                                ['when' => 'TermRef_msg == 5', 'text' => '{{TermRef_years.formattedValue}} year and {{TermRef_months.formattedValue}} month&nbsp;'],
                                ['when' => 'TermRef_msg == 6', 'text' => '{{TermRef_years.formattedValue}} years and {{TermRef_months.formattedValue}} month&nbsp;'],
                                ['when' => 'TermRef_msg == 7', 'text' => '{{TermRef_years.formattedValue}} year and {{TermRef_months.formattedValue}} months&nbsp;'],
                                ['when' => 'TermRef_msg == 8', 'text' => '{{TermRef_years.formattedValue}} years and {{TermRef_months.formattedValue}} months&nbsp;'],
                                ['when' => null, 'text' => '({{perRef.formattedValue}} payments).'],
                                ['when' => null, 'text' => '* With moratorium:&nbsp;'],
                                ['when' => 'TermCurr_msg == 1', 'text' => '{{TermRef_years.formattedValue}} year&nbsp;'],
                                ['when' => 'TermCurr_msg == 2', 'text' => '{{TermRef_years.formattedValue}} years&nbsp;'],
                                ['when' => 'TermCurr_msg == 3', 'text' => '{{TermRef_months.formattedValue}} month&nbsp;'],
                                ['when' => 'TermCurr_msg == 4', 'text' => '{{TermRef_months.formattedValue}} months&nbsp;'],
                                ['when' => 'TermCurr_msg == 5', 'text' => '{{TermRef_years.formattedValue}} year and {{TermRef_months.formattedValue}} month&nbsp;'],
                                ['when' => 'TermCurr_msg == 6', 'text' => '{{TermRef_years.formattedValue}} years and {{TermRef_months.formattedValue}} month&nbsp;'],
                                ['when' => 'TermCurr_msg == 7', 'text' => '{{TermRef_years.formattedValue}} year and {{TermRef_months.formattedValue}} months&nbsp;'],
                                ['when' => 'TermCurr_msg == 8', 'text' => '{{TermRef_years.formattedValue}} years and {{TermRef_months.formattedValue}} months&nbsp;'],
                                ['when' => null, 'text' => '({{perCurr.formattedValue}} payments).'],
                                ['when' => null, 'text' => '* Difference:&nbsp;'],
                                ['when' => 'TermDiff_months == 0 and TermDiff_years == 0', 'text' => 'no change&nbsp;'],
                                ['when' => 'TermDiff_msg == 1', 'text' => '{{TermDiff_years.formattedValue}} year&nbsp;'],
                                ['when' => 'TermDiff_msg == 2', 'text' => '{{TermDiff_years.formattedValue}} years&nbsp;'],
                                ['when' => 'TermDiff_msg == 3', 'text' => '{{TermDiff_months.formattedValue}} month&nbsp;'],
                                ['when' => 'TermDiff_msg == 4', 'text' => '{{TermDiff_months.formattedValue}} months&nbsp;'],
                                ['when' => 'TermDiff_msg == 5', 'text' => '{{TermDiff_years.formattedValue}} year and {{TermDiff_months.formattedValue}} month&nbsp;'],
                                ['when' => 'TermDiff_msg == 6', 'text' => '{{TermDiff_years.formattedValue}} years and {{TermDiff_months.formattedValue}} month&nbsp;'],
                                ['when' => 'TermDiff_msg == 7', 'text' => '{{TermDiff_years.formattedValue}} year and {{TermDiff_months.formattedValue}} months&nbsp;'],
                                ['when' => 'TermDiff_msg == 8', 'text' => '{{TermDiff_years.formattedValue}} years and {{TermDiff_months.formattedValue}} months&nbsp;'],
                                ['when' => 'perGapDiff_msg >= 0.01', 'text' => '({{TermDiff1b.formattedValue}} payments)'],
                                ['when' => 'perGapDiff_msg < 0.01', 'text' => '.'],
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
                                ['when' => null, 'text' => 'Payoff date * Without moratorium: {{dateChartRef.formattedValue}}'],
                                ['when' => null, 'text' => '* With moratorium: {{dateChart.formattedValue}}'],
                                ['when' => null, 'text' => '* Difference:&nbsp;'],
                                ['when' => 'TermDiff2_msg == 1', 'text' => '{{TermDiff2_years.formattedValue}} year&nbsp;'],
                                ['when' => 'TermDiff2_msg == 2', 'text' => '{{TermDiff2_years.formattedValue}} years&nbsp;'],
                                ['when' => 'TermDiff2_msg == 3', 'text' => '{{TermDiff2_months.formattedValue}} month&nbsp;'],
                                ['when' => 'TermDiff2_msg == 4', 'text' => '{{TermDiff2_months.formattedValue}} months&nbsp;'],
                                ['when' => 'TermDiff2_msg == 5', 'text' => '{{TermDiff2_years.formattedValue}} year and {{TermDiff2_months.formattedValue}} month&nbsp;'],
                                ['when' => 'TermDiff2_msg == 6', 'text' => '{{TermDiff2_years.formattedValue}} years and {{TermDiff2_months.formattedValue}} month&nbsp;'],
                                ['when' => 'TermDiff2_msg == 7', 'text' => '{{TermDiff2_years.formattedValue}} year and {{TermDiff2_months.formattedValue}} months&nbsp;'],
                                ['when' => 'TermDiff2_msg == 8', 'text' => '{{TermDiff2_years.formattedValue}} years and {{TermDiff2_months.formattedValue}} months&nbsp;'],
                                ['when' => 'TermDiff2_months == 0 and TermDiff2_years == 0', 'text' => 'no change&nbsp;'],
                                ['when' => 'perGapDiff_msg >= 0.01', 'text' => '({{perGapDiff_msg.formattedValue}} moths)'],
                                ['when' => 'perGapDiff_msg < 0.01', 'text' => '.'],
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
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'DefTill', 'label' => 'Deferment till', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'q',
                            'label' => 'Payment frequency',
                            'type' => 'select',
                            'options' => ['Monthly' => '12.000000000000000', 'Bi-weekly' => '26.088750000000000', 'Weekly' => '52.177500000000000'],
                            'control' => 'DROPDOWN',
                            'default' => 'Monthly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Fee',
                            'label' => 'Fee',
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
                            'name' => 'VarTable',
                            'label' => 'Vartable',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
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
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'represent',
                            'label' => 'Display',
                            'type' => 'select',
                            'options' => ['Chart of balances' => '11', 'Table of payment schedule' => '12', 'Both' => '13'],
                            'dataset' => 'DATA1',
                            'default' => 'Chart of balances',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarRep',
                            'label' => 'Var rep',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'TableFreq',
                            'label' => 'Show',
                            'type' => 'select',
                            'options' => ['Monthly schedule' => '111', 'Annual schedule' => '112'],
                            'dataset' => 'DATA2',
                            'default' => 'Monthly schedule',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarDef',
                            'label' => 'Var def',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarInt',
                            'label' => 'Var int',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarMode',
                            'label' => 'Var mode',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 3,
                    'place' => [0, 1, 2],
                    'fields' => [
                        [
                            'name' => 'hide',
                            'label' => 'Hide',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'hide2',
                            'label' => 'Hide2',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'disp_msg_error',
                            'label' => 'Disp msg error',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'BalanceAtDef',
                            'label' => 'Balance at def',
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
                            'name' => 'DefInt',
                            'label' => 'Def int',
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
                            'name' => 'DefIntEq',
                            'label' => 'Def int eq',
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
                            'name' => 'Balance_Int',
                            'label' => 'Balance int',
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
                            'name' => 'Balance_eqp',
                            'label' => 'Balance eqp',
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
                    'columns' => 3,
                    'place' => [0, 1, 2],
                    'fields' => [
                        [
                            'name' => 'pmtRef',
                            'label' => 'Pmt ref',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'pmt',
                            'label' => 'Pmt',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'EMIDiff',
                            'label' => 'Emi diff',
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
                            'name' => 'intPaidRef',
                            'label' => 'Int paid ref',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'intPaid',
                            'label' => 'Int paid',
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
                            'name' => 'TermRef',
                            'label' => 'Term ref',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 0, 1, 1],
                    'fields' => [
                        [
                            'name' => 'TermRef_months',
                            'label' => 'Term ref months',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'TermRef_msg',
                            'label' => 'Term ref msg',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'TermRef_years',
                            'label' => 'Term ref years',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'perRef',
                            'label' => 'Per ref',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 0, 1, 1],
                    'fields' => [
                        [
                            'name' => 'TermCurr_months',
                            'label' => 'Term curr months',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'TermCurr_msg',
                            'label' => 'Term curr msg',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'TermCurr_years',
                            'label' => 'Term curr years',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'perCurr',
                            'label' => 'Per curr',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 0, 1, 1],
                    'fields' => [
                        [
                            'name' => 'TermDiff_months',
                            'label' => 'Term diff months',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'TermDiff_msg',
                            'label' => 'Term diff msg',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'TermDiff_years',
                            'label' => 'Term diff years',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'perDiff',
                            'label' => 'Per diff',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 0, 1, 1],
                    'fields' => [
                        [
                            'name' => 'TermDiff2_months',
                            'label' => 'Term diff2 months',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'TermDiff2_msg',
                            'label' => 'Term diff2 msg',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'TermDiff2_years',
                            'label' => 'Term diff2 years',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'perDiff2',
                            'label' => 'Per diff2',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        ['name' => 'dateChartRef', 'label' => 'Date chart ref', 'type' => 'date'],
                        ['name' => 'dateChart', 'label' => 'Date chart', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'dateFormat', 'label' => 'Date format', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Gap',
                            'label' => 'Gap',
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
                            'name' => 'TermDiff1b',
                            'label' => 'Term diff1b',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'TermDiff2b',
                            'label' => 'Term diff2b',
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
                            'name' => 'pmt_mor',
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
                            'name' => 'intPaid_diff',
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
                            'name' => 'total_pmt_ref',
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
                            'name' => 'total_pmt',
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
                            'name' => 'perDiff_msg',
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
                            'name' => 'perGapDiff_msg',
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
            'title' => 'Pmt = returnPmt(LoanAmount, q, t, m, r, Fee)',
            'results' => ['Pmt' => 'returnPmt(LoanAmount, q, t, m, r, Fee)'],
        ],
        [
            'title' => 'Per = returnPer(LoanAmount, q, Payment, m, r, Fee)',
            'results' => ['Per' => 'returnPer(LoanAmount, q, Payment, m, r, Fee)'],
        ],
        [
            'title' => 'hide = get_values(r, t, m, q, LoanAmount, VarTable, first_day, DefFrom, DefTill, VarInt, VarDef, Payment, VarMode, DefPer, 0)',
            'results' => ['hide' => 'get_values(r, t, m, q, LoanAmount, VarTable, first_day, DefFrom, DefTill, VarInt, VarDef, Payment, VarMode, DefPer, 0)'],
        ],
        [
            'title' => 'hide2 = get_hide2()',
            'results' => ['hide2' => 'get_hide2()'],
        ],
        [
            'title' => 'disp_msg_error = get_disp_msg_error()',
            'results' => ['disp_msg_error' => 'get_disp_msg_error()'],
        ],
        [
            'title' => 'eq_p = get_eq_p()',
            'results' => ['eq_p' => 'get_eq_p()'],
        ],
        [
            'title' => 'BalanceAtDef = get_BalanceAtDef()',
            'results' => ['BalanceAtDef' => 'get_BalanceAtDef()'],
        ],
        [
            'title' => 'DefInt = get_DefInt()',
            'results' => ['DefInt' => 'get_DefInt()'],
        ],
        [
            'title' => 'DefIntEq = get_DefIntEq()',
            'results' => ['DefIntEq' => 'get_DefIntEq()'],
        ],
        [
            'title' => 'Balance_Int = one_way(BalanceAtDef + DefInt)',
            'results' => ['Balance_Int' => '(get_BalanceAtDef() + get_DefInt())'],
        ],
        [
            'title' => 'Balance_eqp = one_way(BalanceAtDef * eq_p)',
            'results' => ['Balance_eqp' => '(get_BalanceAtDef()*get_eq_p())'],
        ],
        [
            'title' => 'pmtRef = get_pmtRef()',
            'results' => ['pmtRef' => 'get_pmtRef()'],
        ],
        [
            'title' => 'pmt = get_pmt()',
            'results' => ['pmt' => 'get_pmt()'],
        ],
        [
            'title' => 'EMIDiff = get_EMIDiff()',
            'results' => ['EMIDiff' => 'get_EMIDiff()'],
        ],
        [
            'title' => 'intPaidRef = get_intPaidRef()',
            'results' => ['intPaidRef' => 'get_intPaidRef()'],
        ],
        [
            'title' => 'intPaid = get_intPaid()',
            'results' => ['intPaid' => 'get_intPaid()'],
        ],
        [
            'title' => 'TermRef = get_TermRef()',
            'results' => ['TermRef' => 'get_TermRef()'],
        ],
        [
            'title' => 'TermRef_months = get_TermRef_months()',
            'results' => ['TermRef_months' => 'get_TermRef_months()'],
        ],
        [
            'title' => 'TermRef_years = get_TermRef_years()',
            'results' => ['TermRef_years' => 'get_TermRef_years()'],
        ],
        [
            'title' => 'TermRef_msg = get_TermRef_msg()',
            'results' => ['TermRef_msg' => 'get_TermRef_msg()'],
        ],
        [
            'title' => 'perRef = get_perRef()',
            'results' => ['perRef' => 'get_perRef()'],
        ],
        [
            'title' => 'TermCurr_years = get_TermCurr_years()',
            'results' => ['TermCurr_years' => 'get_TermCurr_years()'],
        ],
        [
            'title' => 'TermCurr_months = get_TermCurr_months()',
            'results' => ['TermCurr_months' => 'get_TermCurr_months()'],
        ],
        [
            'title' => 'TermCurr_msg = get_TermCurr_msg()',
            'results' => ['TermCurr_msg' => 'get_TermCurr_msg()'],
        ],
        [
            'title' => 'perCurr = get_perCurr()',
            'results' => ['perCurr' => 'get_perCurr()'],
        ],
        [
            'title' => 'TermDiff_years = get_TermDiff_years()',
            'results' => ['TermDiff_years' => 'get_TermDiff_years()'],
        ],
        [
            'title' => 'TermDiff_months = get_TermDiff_months()',
            'results' => ['TermDiff_months' => 'get_TermDiff_months()'],
        ],
        [
            'title' => 'TermDiff_msg = get_TermDiff_msg()',
            'results' => ['TermDiff_msg' => 'get_TermDiff_msg()'],
        ],
        [
            'title' => 'perDiff = get_perDiff()',
            'results' => ['perDiff' => 'get_perDiff()'],
        ],
        [
            'title' => 'dateFormat = get_dateFormat()',
            'results' => ['dateFormat' => 'get_dateFormat()'],
        ],
        [
            'title' => 'Gap = get_Gap()',
            'results' => ['Gap' => 'get_Gap()'],
        ],
        [
            'title' => 'TermDiff2_years = get_TermDiff2_years()',
            'results' => ['TermDiff2_years' => 'get_TermDiff2_years()'],
        ],
        [
            'title' => 'TermDiff2_months = get_TermDiff2_months()',
            'results' => ['TermDiff2_months' => 'get_TermDiff2_months()'],
        ],
        [
            'title' => 'TermDiff2_msg = get_TermDiff2_msg()',
            'results' => ['TermDiff2_msg' => 'get_TermDiff2_msg()'],
        ],
        [
            'title' => 'perDiff2 = get_perDiff2()',
            'results' => ['perDiff2' => 'get_perDiff2()'],
        ],
        [
            'title' => 'TermDiff2b = one_way(perCurr - perRef + Gap)',
            'results' => ['TermDiff2b' => '(get_Gap() + get_perCurr() - get_perRef())'],
        ],
        [
            'title' => 'TermDiff1b = one_way(perCurr - perRef)',
            'results' => ['TermDiff1b' => '(get_perCurr() - get_perRef())'],
        ],
        [
            'title' => 'dateChart = get_dateChart()',
            'results' => ['dateChart' => 'get_dateChart()'],
        ],
        [
            'title' => 'dateChartRef = get_dateChartRef()',
            'results' => ['dateChartRef' => 'get_dateChartRef()'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";var hide2_res,BalanceAtDef_res,disp_msg_error_res,DefInt_res,DefIntEq_res,eq_p_res,TermRef_msg_res;var pmtRef_res,pmt_res,EMIDiff_res,intPaidRef_res,intPaid_res;var TermRef_res,TermRef_months_res,TermRef_years_res,perRef_res;var TermCurr_months_res,TermCurr_years_res,perCurr_res,TermCurr_msg_res;var TermDiff_msg_res,TermDiff_months_res,TermDiff_years_res,perDiff_res;var TermDiff2_msg_res,TermDiff2_months_res,TermDiff2_years_res,perDiff2_res;var dateFormat_res;var Gap_res;var dateChart_res,dateChartRef_res;var milisecondsInADay=24*60*60*1000;omni.define("get_values",function(r,t,m,q,LoanAmount,VarTable,first_day,DefFrom,DefTill,VarInt,VarDef,Payment,VarMode,DefPer,index){var date_init=new Date;date_init.setFullYear(date_init.getFullYear()+0);var DefInt=0;var hide=0;var hide2=0;var BalanceAtDef=0;var DefIntEq=0;var EMIDiff;var intPaid=0;var intPaidRef=0;var disp_msg_error=0;var TermRef=0;var TermRef_msg=0;var TermRef_months,TermRef_years;var perRef;var TermCurr_msg=0;var TermCurr_months,TermCurr_years,perCurr;var TermDiff_msg=0;var TermDiff_months,TermDiff_years,perDiff;var date,dateFormat;var DateChart=0;var DateChartRef=0;var Gap=0;var TermDiff2_msg=0;var TermDiff2_months,TermDiff2_years,perDiff2;var DefDateFrom=formatDate(DefFrom);var DefDateTill=getDateGapEnd(first_day,DefFrom,DefPer);var periods=q*t;var pmt;var pmtBefDef;var totalPmt;var eq_p=getPerEqRate(q,m,r);if(VarMode===1){pmt=getPmt(LoanAmount,periods,eq_p);pmtRef=pmt=getPmt(LoanAmount,periods,eq_p);Payment=0;pmtBefDef=pmt}var Per=periods;if(VarMode===2){pmt=Payment;pmtRef=Payment;pmtBefDef=Payment;Per=getPer(LoanAmount,Payment,eq_p);periods=Per}if(Per>0){hide=0}else{hide=1}if(LoanAmount>Payment){hide=0}else{hide=1}var pmtRef=pmt;if(VarDef===1&&periods<=DefPer){hide2=1}if(hide2===0){if(Per>0){hide=0}else{hide=1}if(LoanAmount/Payment<2&&VarMode===2){hide=1}var DefFrom_days=DefFrom;var GapTillDef=getGapPeriods(first_day,first_day,DefFrom_days-1);BalanceAtDef=LoanAmount*mathjs.pow(1+eq_p,GapTillDef)-pmtBefDef/eq_p*(mathjs.pow(1+eq_p,GapTillDef)-1);if(BalanceAtDef<=0){hide=1}if(BalanceAtDef<0){BalanceAtDef=0}if(VarInt===1||VarInt===2){DefInt=BalanceAtDef*mathjs.pow(1+eq_p,DefPer)-BalanceAtDef}if(VarInt===11){DefInt=0}var PerAftDef;if(VarInt===1||VarInt===2||VarInt===11){if(VarDef===1){PerAftDef=periods-GapTillDef-DefPer;pmt=getPmt(BalanceAtDef+DefInt,PerAftDef,eq_p)}if(VarDef===2){PerAftDef=periods-GapTillDef;pmt=getPmt(BalanceAtDef+DefInt,PerAftDef,eq_p)}if(VarDef===3){PerAftDef=getPer(BalanceAtDef+DefInt,pmt,eq_p);if(PerAftDef===0){hide=1,hide2=1;disp_msg_error=1}}}var _DefIntEq=0;if(VarDef===3&&VarInt===2){PerAftDef=getNewPer(BalanceAtDef,eq_p,periods,DefInt,pmt)}if(VarInt===2){_DefIntEq=DefInt/PerAftDef}var DefIntPerAft=0;if(VarInt===2){DefIntPerAft=_DefIntEq}var daysPassed=0;var daysInPeriod;var dd;var mm;var yyyy;var periodsMonth=periods+DefPer+PerAftDef;var rMonth=eq_p;var i;var pmtMonth=pmt;var pmtMonthRef=pmtRef;var princBal=LoanAmount;var princBalRef=LoanAmount;var princBalOpen;var princMonth;var intMonth=0;var princBalOpenRef=0;var princMonthRef=0;var intMonthRef=0;var LoopDate;var DefIntMonth=0;var iCurr=0;var iRef=0;var PerSumCurr=0;var PerSumRef=0;for(i=0;i<=periodsMonth;i++){date=new Date((first_day+daysPassed)*milisecondsInADay);daysInPeriod=getDaysInPeriod(first_day,date,q);if(i>0){daysPassed+=daysInPeriod;dd=date.getDate();mm=date.getMonth()+1;yyyy=date.getFullYear();if(dd<10){dd="0"+dd}if(mm<10){mm="0"+mm}dateFormat=date.getTime();LoopDate=yyyy+""+mm+""+dd;intMonthRef=princBalRef*rMonth;princMonthRef=pmtMonthRef-intMonthRef;princBalRef=princBalRef-princMonthRef;princBalOpenRef=princBalRef+princMonthRef;if(LoopDate>=DefDateFrom&&LoopDate<=DefDateTill){intMonth=princBal*eq_p;if(VarInt===1){DefIntMonth=princBal*eq_p}princMonth=0;princBal=princBal-princMonth+DefIntMonth;princBalOpen=princBal+princMonth-DefIntMonth;if(VarInt===11){totalPmt=intMonth}else{totalPmt=0}}if(LoopDate>DefDateTill){intMonth=princBal*rMonth;if(VarDef===3){princMonth=pmtMonth-intMonth-_DefIntEq}else{princMonth=pmtMonth-intMonth}princBal=princBal-princMonth;princBalOpen=princBal+princMonth;if(VarInt===2&&princMonth>0){totalPmt=princMonth+intMonth+_DefIntEq}else{totalPmt=princMonth+intMonth}}if(LoopDate<DefDateFrom){intMonth=princBal*rMonth;princMonth=pmtBefDef-intMonth;princBal=princBal-princMonth;princBalOpen=princBal+princMonth;if(VarInt===2&&princMonth>0){totalPmt=princMonth+intMonth+_DefIntEq}else{totalPmt=princMonth+intMonth}}if(princMonth>0&&VarInt===2){DefIntPerAft=_DefIntEq}else{DefIntPerAft=0}if(i===0){intMonth=0;princMonth=0;intMonthRef=0;princMonthRef=0}if(princBalOpen<pmtMonth){princMonth=princBalOpen}if(princBalOpenRef<pmtMonthRef){princMonthRef=princBalOpenRef}if(princBal<=0){princBal=0}if(princBalOpen<=0){princBalOpen=0;DefIntPerAft=0}if(princBalOpen<=0){intMonth=0}if(princMonth<=0){princMonth=0}if(intMonth<=0){princMonth=0}if(princBalRef<=0){princBalRef=0}if(princBalOpenRef<=0){princBalOpenRef=0}if(princBalOpenRef<=0){intMonthRef=0}if(princMonthRef<=0){princMonthRef=0}if(intMonthRef<=0){princMonthRef=0}intPaid+=intMonth;intPaidRef+=intMonthRef;if(princBalOpen>0.001&&princMonth>0.001){iCurr=1}else{iCurr=0}if(princBalOpenRef&&princMonthRef>0.001){iRef=1}else{iRef=0}if(princBalOpen>0.001&&princBal<=0.001){DateChart=dateFormat}if(princBalOpenRef>0.001&&princBalRef<=0.001){DateChartRef=dateFormat}PerSumCurr+=iCurr;PerSumRef+=iRef}if(VarInt===1||VarInt===11){}if(VarInt===2){}}if(hide!==1){if(VarInt===2){}if(VarInt===1){}if(VarInt===11){}Gap=0;perCurr=mathjs.ceil(PerSumCurr+DefPer);perRef=mathjs.ceil(PerSumRef);perDiff=Math.abs(PerSumCurr+DefPer-PerSumRef);perDiff2=Math.abs(PerSumCurr+DefPer-PerSumRef);TermCurr_months=formatTerm(perCurr,0);TermCurr_years=formatTerm(perCurr,1);TermCurr_msg=formatTerm_msg(perCurr);TermRef_months=formatTerm(perRef,0);TermRef_years=formatTerm(perRef,1);TermRef_msg=formatTerm_msg(perRef);TermDiff_months=formatTerm(perDiff,0);TermDiff_years=formatTerm(perDiff,1);TermDiff_msg=formatTerm_msg(perDiff);TermDiff2_months=formatTerm(perDiff2,0);TermDiff2_years=formatTerm(perDiff2,1);TermDiff2_msg=formatTerm_msg(perDiff2);EMIDiff=mathjs.abs(pmt+_DefIntEq-pmtRef);if(mathjs.abs(pmt+_DefIntEq-pmtRef)<0.101){EMIDiff=0}if(VarDef===3){_DefIntEq=0}var ForLoop=5}}var results=[hide,hide2,disp_msg_error];hide2_res=hide2;BalanceAtDef_res=BalanceAtDef;disp_msg_error_res=disp_msg_error;DefInt_res=DefInt;DefIntEq_res=DefIntEq;BalanceAtDef_res=BalanceAtDef;eq_p_res=eq_p;pmtRef_res=pmtRef;pmt_res=pmt;EMIDiff_res=EMIDiff;intPaidRef_res=intPaidRef;intPaid_res=intPaid;TermRef_res=TermRef;TermRef_months_res=TermRef_months;TermRef_years_res=TermRef_years;TermRef_msg_res=TermRef_msg;perRef_res=perRef;Gap_res=mathjs.round(Gap);TermCurr_msg_res=TermCurr_msg;TermCurr_months_res=TermCurr_months;TermCurr_years_res=TermCurr_years;perCurr_res=perCurr;TermDiff_msg_res=TermDiff_msg;TermDiff_months_res=TermDiff_months;TermDiff_years_res=TermDiff_years;perDiff_res=perDiff;dateFormat_res=dateFormat;dateChart_res=DateChart;dateChartRef_res=DateChartRef;TermDiff2_msg_res=TermDiff2_msg;TermDiff2_months_res=TermDiff2_months;TermDiff2_years_res=TermDiff2_years;perDiff2_res=perDiff2;return results[index]});omni.define("get_dateChartRef",function(){return dateChartRef_res});omni.define("get_dateChart",function(){return dateChart_res});omni.define("get_TermDiff2_msg",function(){return TermDiff2_msg_res});omni.define("get_TermDiff2_months",function(){return TermDiff2_months_res});omni.define("get_TermDiff2_years",function(){return TermDiff2_years_res});omni.define("get_perDiff2",function(){return perDiff2_res});omni.define("get_Gap",function(){return Gap_res});omni.define("get_dateFormat",function(){return dateFormat_res});omni.define("get_TermDiff_msg",function(){return TermDiff_msg_res});omni.define("get_TermDiff_months",function(){return TermDiff_months_res});omni.define("get_TermDiff_years",function(){return TermDiff_years_res});omni.define("get_perDiff",function(){return perDiff_res});omni.define("get_TermCurr_msg",function(){return TermCurr_msg_res});omni.define("get_TermCurr_months",function(){return TermCurr_months_res});omni.define("get_TermCurr_years",function(){return TermCurr_years_res});omni.define("get_perCurr",function(){return perCurr_res});omni.define("get_perRef",function(){return perRef_res});omni.define("get_TermRef_months",function(){return TermRef_months_res});omni.define("get_TermRef_years",function(){return TermRef_years_res});omni.define("get_TermRef_msg",function(){return TermRef_msg_res});omni.define("get_TermRef",function(){return TermRef_res});omni.define("get_intPaid",function(){return intPaid_res});omni.define("get_intPaidRef",function(){return intPaidRef_res});omni.define("get_EMIDiff",function(){return EMIDiff_res});omni.define("get_pmt",function(){return pmt_res});omni.define("get_pmtRef",function(){return pmtRef_res});omni.define("get_eq_p",function(){return eq_p_res});omni.define("get_DefIntEq",function(){return DefIntEq_res});omni.define("get_DefInt",function(){return DefInt_res});omni.define("get_disp_msg_error",function(){return disp_msg_error_res});omni.define("get_BalanceAtDef",function(){return BalanceAtDef_res});omni.define("get_hide2",function(){return hide2_res});omni.define("returnPmt",function(LoanAmount,q,t,m,r){var ex=Math.exp(1);var periods=q*t;var base;if(m===0){var continuous_r=mathjs.pow(ex,r)-1;m=1;base=1+continuous_r/m}else{base=1+r/m}var power=m/q;var eq=q*(mathjs.pow(base,power)-1);var eq_p=eq/q;var Pmt=LoanAmount*eq_p*mathjs.pow(1+eq_p,periods)/(mathjs.pow(1+eq_p,periods)-1);return mathjs.bignumber(mathjs.round(Pmt,0))});omni.define("returnPer",function(LoanAmount,q,Payment,m,r){var ex=Math.exp(1);var Per;var base;if(m===0){var continuous_r=mathjs.pow(ex,r)-1;m=1;base=1+continuous_r/m}else{base=1+r/m}var power=m/q;var eq=q*(mathjs.pow(base,power)-1);var eq_p=eq/q;Per=mathjs.ceil(mathjs.log(Payment/(eq_p*-LoanAmount+Payment))/mathjs.log(eq_p+1));if(Per>0){Per=Per}else{Per=0}return mathjs.bignumber(mathjs.round(Per,0))});function getNewPer(LoanAmount,eq_p,periods,DefInt,pmt){var iteration=0;var MAX_ITERATIONS=5000000;var MIN_PRECISION=1e-10;var oldPer;var NewPer=periods;LoanAmount=LoanAmount/10000;DefInt=DefInt/10000;pmt=pmt/10000;do{oldPer=NewPer;var dividend=LoanAmount*eq_p*mathjs.pow(1+eq_p,NewPer)/(mathjs.pow(1+eq_p,NewPer)-1)+DefInt/NewPer-pmt;var divisor=-mathjs.pow(DefInt/NewPer,2)-LoanAmount*eq_p*mathjs.pow(1+eq_p,NewPer)*mathjs.log(eq_p+1)/mathjs.pow(mathjs.pow(1+eq_p,NewPer)-1,2);NewPer=NewPer-dividend/divisor;++iteration}while(Math.abs(oldPer-NewPer)>MIN_PRECISION&&iteration<=MAX_ITERATIONS);NewPer=mathjs.ceil(NewPer);return NewPer}function getDateGapEnd(FirstDay,DateFrom,periodsGap){var i;var date;var DateEnd;var daysInPeriod;var milisecondsInADay=24*60*60*1000;var daysPassed=0;var MonthCorr=1;var date2=new Date(FirstDay*milisecondsInADay);var date1=new Date(DateFrom*milisecondsInADay);var DayFrom=date2.getDate();var DayTill=date1.getDate();if(DayFrom<DayTill){MonthCorr=2}for(i=0;i<=periodsGap+10;i++){date=new Date((DateFrom+daysPassed)*milisecondsInADay);daysInPeriod=getDaysInPeriod(DateFrom,date,12);var Year=date.getFullYear();var Month=date.getMonth()+MonthCorr;var Day=date2.getDate();if(Month<10){Month="0"+Month}if(Day<10){Day="0"+Day}var dateFormat=Year+""+Month+""+Day;if(i>0){daysPassed+=daysInPeriod;if(i===periodsGap){DateEnd=dateFormat}}}return DateEnd}function getDaysInMonth(date){var month=date.getMonth();var year=date.getFullYear();var daysInMonth;if(month===0){daysInMonth=31}else if(month===1){daysInMonth=28}else if(month===2){daysInMonth=31}else if(month===3){daysInMonth=30}else if(month===4){daysInMonth=31}else if(month===5){daysInMonth=30}else if(month===6){daysInMonth=31}else if(month===7){daysInMonth=31}else if(month===8){daysInMonth=30}else if(month===9){daysInMonth=31}else if(month===10){daysInMonth=30}else if(month===11){daysInMonth=31}if(year%4===0&&year%100!==0&&month===1||year%400===0&&month===1){daysInMonth=29}return daysInMonth}function getGapPeriods(FirstDay,DateFrom,DateTill){var milisecondsInADay=24*60*60*1000;var date1=new Date(DateFrom*milisecondsInADay);var date2=new Date(DateTill*milisecondsInADay);var DayFirst=date1.getDate();var DayLast=date2.getDate();var DaysInFirstMonth=getDaysInMonth(date1);var DaysInLastMonth=getDaysInMonth(date2);var DateDue=formatDate(FirstDay);var DayDue=parseInt(DateDue.substring(6,8));var DateFrom2=formatDate(DateFrom);var DateTill2=formatDate(DateTill);var YearFrom=parseInt(DateFrom2.substring(0,4));var YearTill=parseInt(DateTill2.substring(0,4));var MonthFrom=parseInt(DateFrom2.substring(4,6));var MonthTill=parseInt(DateTill2.substring(4,6));var DayFrom=parseInt(DateFrom2.substring(6,8));var DayTill=parseInt(DateTill2.substring(6,8));var MonthCorr1=0;var MonthCorr2=0;var MonthCorr3=0;var Gap=0;if(DayDue-DayFrom>=0){MonthCorr1=1}if(DayDue-DayTill>0){MonthCorr2=-1}if(DaysInFirstMonth===DayFirst&&DaysInLastMonth===DayLast&&DaysInFirstMonth!==DaysInLastMonth){MonthCorr3=1}Gap=(YearTill-YearFrom)*12+(MonthTill-MonthFrom)+MonthCorr1+MonthCorr2+MonthCorr3;return Gap}function formatTerm_msg(periods){var year=parseInt(Math.trunc(periods/12));var month=parseInt(Math.ceil(periods-year*12));var Term_msg=0;if(year===1&&month===0){Term_msg=1}if(year>1&&month===0){Term_msg=2}if(year===0&&month===1){Term_msg=3}if(year===0&&month>1){Term_msg=4}if(year===1&&month===1){Term_msg=5}if(year>1&&month===1){Term_msg=6}if(year===1&&month>1){Term_msg=7}if(year>1&&month>1){Term_msg=8}return Term_msg}function formatTerm(periods,ind){var year=parseInt(Math.trunc(periods/12));var month=parseInt(Math.ceil(periods-year*12));var Term=[0,0];if(year===1&&month===0){Term=[0,1]}if(year>1&&month===0){Term=[0,year]}if(year===0&&month===1){Term=[1,0]}if(year===0&&month>1){Term=[month,0]}if(year===1&&month===1){Term=[1,1]}if(year>1&&month===1){Term=[1,year]}if(year===1&&month>1){Term=[month,1]}if(year>1&&month>1){Term=[month,year]}return Term[ind]}function formatDate(date){date=new Date(date*24*60*60*1000);var Year=date.getFullYear();var Month=date.getMonth()+1;var Day=date.getDate();if(Month<10){Month="0"+Month}if(Day<10){Day="0"+Day}return Year+""+Month+""+Day}function getPmt(LoanAmount,periods,eq_p){var Pmt=LoanAmount*eq_p*mathjs.pow(1+eq_p,periods)/(mathjs.pow(1+eq_p,periods)-1);return Pmt}function getPer(LoanAmount,Pmt,eq_p){var Per;Per=mathjs.ceil(mathjs.log(Pmt/(eq_p*-LoanAmount+Pmt))/mathjs.log(eq_p+1));if(Per>0){Per=Per}else{Per=0}return Per}function getPerEqRate(q,m,r){var ex=Math.exp(1);var base;if(m===0){var continuous_r=mathjs.pow(ex,r)-1;m=1;base=1+continuous_r/m}else{base=1+r/m}var power=m/q;var eq_p=mathjs.round(mathjs.pow(base,power)-1,10);return eq_p}function getDaysInPeriod(FirstDay,date,q){var milisecondsInADay=24*60*60*1000;FirstDay=new Date(FirstDay*milisecondsInADay);var daysInMonth;var daysInPeriod;var DaysInYear;var DaysInNextYear;var day=FirstDay.getDate();var month=date.getMonth();var year=date.getFullYear();if(day<29&&month===0){daysInMonth=31}else if(day===29&&month===0){daysInMonth=30}else if(day===30&&month===0){daysInMonth=29}else if(day===31&&month===0){daysInMonth=28}else if(day<29&&month===1){daysInMonth=28}else if(day===29&&month===1){daysInMonth=29}else if(day===30&&month===1){daysInMonth=30}else if(day===31&&month===1){daysInMonth=31}else if(day<31&&month===2){daysInMonth=31}else if(day===31&&month===2){daysInMonth=30}else if(day<31&&month===3){daysInMonth=30}else if(day===31&&month===3){daysInMonth=31}else if(day<31&&month===4){daysInMonth=31}else if(day===31&&month===4){daysInMonth=30}else if(day<31&&month===5){daysInMonth=30}else if(day===31&&month===5){daysInMonth=31}else if(day<31&&month===6){daysInMonth=31}else if(day===31&&month===6){daysInMonth=31}else if(day<31&&month===7){daysInMonth=31}else if(day===31&&month===7){daysInMonth=30}else if(day<31&&month===8){daysInMonth=30}else if(day===31&&month===8){daysInMonth=31}else if(day<31&&month===9){daysInMonth=31}else if(day===31&&month===9){daysInMonth=30}else if(day<31&&month===10){daysInMonth=30}else if(day===31&&month===10){daysInMonth=31}else if(day<31&&month===11){daysInMonth=31}else if(day===31&&month===11){daysInMonth=31}if(year%4===0&&year%100!==0&&month===1||year%400===0&&month===1){daysInMonth=29}if(year%4===0&&year%100!==0&&month===0&&date.getDate()===30||year%400===0&&month===0&&date.getDate()===30){daysInMonth=30}if(year%4===0&&year%100!==0&&month===0&&date.getDate()===31||year%400===0&&month===0&&date.getDate()===31){daysInMonth=29}if(year%4===0&&year%100!==0&&month===0&&date.getDate()===29||year%400===0&&month===0&&date.getDate()===29){daysInMonth=31}if(date.getDate()===29&&date.getMonth()===1&&day>29){daysInMonth=30}if(date.getDate()===29&&date.getMonth()===1&&day>30){daysInMonth=31}if(date.getDate()===28&&date.getMonth()===1&&day>30){daysInMonth=31}if(year%4===0&&year%100!==0||year%400===0){DaysInYear=366}else{DaysInYear=365}if((year+1)%4===0&&(year+1)%100!==0||(year+1)%400===0){DaysInNextYear=366}else{DaysInNextYear=365}if(q===1){daysInPeriod=DaysInYear}if(q===12){daysInPeriod=daysInMonth}if(q===26){daysInPeriod=14}if(q===52){daysInPeriod=7}if(q===365){daysInPeriod=1}if(q===4){day=date.getDate();if(month===0&&DaysInYear===366){daysInPeriod=91}if(month===0&&DaysInYear===365){daysInPeriod=90}if(month===1&&DaysInYear===366){daysInPeriod=90}if(month===1&&DaysInYear===365){daysInPeriod=89}if(month===11&&DaysInNextYear===366){daysInPeriod=92}if(month===11&&DaysInNextYear===365){daysInPeriod=91}if(month===2||month===4||month===6||month===7||month===9||month===10){daysInPeriod=92}if(month===3||month===5||month===8){daysInPeriod=91}if(day===31&&(month===2||month===7)){daysInPeriod=91}if(day===30&&(month===3||month===8||month===5)){daysInPeriod=92}if(day===31&&month===0&&DaysInYear===365){daysInPeriod=89}if(day===31&&month===0&&DaysInYear===366){daysInPeriod=90}if(day===31&&(month===4||month===9)){daysInPeriod=92}if(day>=30&&month>=10&&DaysInNextYear===366){daysInPeriod=91}if(day>=30&&month>=10&&DaysInNextYear===365){daysInPeriod=90}if(day===28&&month===1&&DaysInYear===365){daysInPeriod=92}if(day===28&&month===1&&DaysInYear===366){daysInPeriod=93}if(day===29&&month===1){daysInPeriod=92}}if(q===2){daysInPeriod=180}return daysInPeriod}//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Moratorium works out Equated monthly installment (EMI) and Loan tenure from Loan amount, Loan term and Interest rate. The arithmetic is the whole method: equated monthly installment (EMI) is worked out from loan amount by one formula, applied once. Equated monthly installment (EMI) comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Moratorium calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Moratorium: it takes 3 numbers and reports Equated monthly installment (EMI), Loan tenure and Hide.</p><p>In the form&#039;s own words, Equated monthly installment (EMI) = returnPmt(Loan amount, Payment frequency, Loan term, M, Interest rate, Fee).</p><p>The answers are Equated monthly installment (EMI), Loan tenure, Hide and Hide2; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Loan amount</strong> — in USD</li><li><strong>Loan term</strong> — in years / months</li><li><strong>Interest rate</strong> — in percent. Annual rate of interest.</li></ul><p>The result boxes are Equated monthly installment (EMI) in USD, Loan tenure in years / months, Hide, Hide2, Disp msg error, Balance at def, Def int, Def int eq, Balance int, Balance eqp, Eq p, Pmt ref, Pmt, Emi diff, Int paid ref, Int paid, Term ref, Term ref months, Term ref msg, Term ref years, Per ref, Term curr months, Term curr msg, Term curr years, Per curr, Term diff months, Term diff msg, Term diff years, Per diff, Term diff2 months, Term diff2 msg, Term diff2 years, Per diff2, Date chart ref, Date chart, Date format, Gap, Term diff1b, Term diff2b; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Estimation based on… = 1, Loan amount = 3.000e+6 USD, Current EMI = 40000 USD, Loan term = 120 yrsmos, Interest rate = 8 perc, Compounding frequency = 14, Show comp freq = 0, Interest treatment = 11, Repayment by… = 11, Moratorium periods = 12 months, Date of balance = Sun 1 March 2026 and Moratorium from = Sun 1 March 2026 — through the same formula and the panel reports <strong>Payment frequency</strong> = 12, <strong>Fee</strong> = 0, <strong>Display</strong> = 11 and <strong>Show</strong> = 111.</p><ul><li><strong>Payment frequency</strong> = 12</li><li><strong>Fee</strong> = 0</li><li><strong>Display</strong> = 11</li><li><strong>Show</strong> = 111</li></ul><p>The line behind those figures is <strong>Equated monthly installment (EMI)</strong> = <code>returnPmt(Loan amount, Payment frequency, Loan term, M, Interest rate, Fee)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Payment frequency</strong> = 12, <strong>Fee</strong> = 0, <strong>Display</strong> = 11 and <strong>Show</strong> = 111. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Loan tenure lists 9 options and opens on years / months. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Equated monthly installment (EMI)</strong> = <code>returnPmt(Loan amount, Payment frequency, Loan term, M, Interest rate, Fee)</code></li><li><strong>Loan tenure</strong> = <code>returnPer(Loan amount, Payment frequency, Current EMI, M, Interest rate, Fee)</code></li><li><strong>Hide</strong> = <code>get_values(Interest rate, Loan term, M, Payment frequency, Loan amount, Vartable, Date of balance, Moratorium from, Deferment till, Var int, Var def, Current EMI, Var mode, Moratorium periods, 0)</code></li><li><strong>Hide2</strong> = <code>get_hide2()</code></li><li><strong>Disp msg error</strong> = <code>get_disp_msg_error()</code></li><li><strong>Eq p</strong> = <code>get_eq_p()</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Equated monthly installment (EMI)</strong> = <code>returnPmt(Loan amount, Payment frequency, Loan term, M, Interest rate, Fee)</code> — the form to use when Loan amount, Payment frequency, Loan term and M are the values you have.</li><li><strong>Loan tenure</strong> = <code>returnPer(Loan amount, Payment frequency, Current EMI, M, Interest rate, Fee)</code> — the form to use when Loan amount, Payment frequency, Current EMI and M are the values you have.</li><li><strong>Hide</strong> = <code>get_values(Interest rate, Loan term, M, Payment frequency, Loan amount, Vartable, Date of balance, Moratorium from, Deferment till, Var int, Var def, Current EMI, Var mode, Moratorium periods, 0)</code> — the form to use when Interest rate, Loan term, M and Payment frequency are the values you have.</li><li><strong>Hide2</strong> = <code>get_hide2()</code> — the form to use when the other values are known.</li><li><strong>Disp msg error</strong> = <code>get_disp_msg_error()</code> — the form to use when the other values are known.</li><li><strong>Eq p</strong> = <code>get_eq_p()</code> — the form to use when the other values are known.</li><li><strong>Balance at def</strong> = <code>get_BalanceAtDef()</code> — the form to use when the other values are known.</li><li><strong>Def int</strong> = <code>get_DefInt()</code> — the form to use when the other values are known.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Equated monthly installment (EMI), Loan tenure and Hide can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Estimation based on..., from 1 to 2 — and the answers go from <strong>Payment frequency</strong> 12, <strong>Fee</strong> 0, <strong>Display</strong> 11 and <strong>Show</strong> 111 to <strong>Payment frequency</strong> 12, <strong>Fee</strong> 0, <strong>Display</strong> 11 and <strong>Show</strong> 111.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Loan term and Interest rate carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Equated monthly installment (EMI), Loan tenure and Hide are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Loan amount left as a guess.</strong> Anything typed into Loan amount is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Loan term left as a guess.</strong> Anything typed into Loan term is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Loan amount is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Loan amount</strong> takes a plain number with no unit attached. It feeds Equated monthly installment (EMI), Loan tenure and Hide. Have it to hand before you start: Loan amount is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Loan term</strong> is a years / months quantity: the page opens it in yrsmos and converts anything else you pick before the formula runs. It feeds Equated monthly installment (EMI) and Hide. Have it to hand before you start: Loan term is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Interest rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Annual rate of interest. It feeds Equated monthly installment (EMI), Loan tenure and Hide. Have it to hand before you start: Interest rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Loan amount, Loan term and Interest rate. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Loan amount into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Equated monthly installment (EMI) in USD with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Equated monthly installment (EMI) is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are years / months and percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It counts in whole days.</strong> Dates are compared as calendar days, not as moments: two dates that differ by a few hours on the same day give the same answer, and there is no time-of-day input to set.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Loan amount, Loan term and Interest rate are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Loan amount, Loan term and Interest rate and the number you are missing is Equated monthly installment (EMI) and Loan tenure.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/dscr">Debt service coverage ratio Calculator</a>, <a href="/finance/debt-to-asset">Debt to asset ratio Calculator</a> and <a href="/finance/debt-to-equity">Debt to equity Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Moratorium calculator work out?', 'a' => <<<'TXT'
            Equated monthly installment (EMI), Loan tenure, Hide and Hide2, from Loan amount, Payment frequency, Loan term and M. The relationship is Equated monthly installment (EMI) = returnPmt(Loan amount, Payment frequency, Loan term, M, Interest rate, Fee).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Loan amount (USD), Loan term (years / months), Interest rate (percent). Enter loan amount, loan term and interest rate; Equated monthly installment (EMI) is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Equated monthly installment (EMI), Loan tenure, Hide and Hide2 can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Payment frequency = 12, Fee = 0, Display = 11 and Show = 111. Those are the defaults written into the form — move Loan amount and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Equated monthly installment (EMI) is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Loan amount left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Equated monthly installment (EMI) keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/dscr', 'name' => 'Debt service coverage ratio Calculator'],
            ['path' => '/finance/debt-to-asset', 'name' => 'Debt to asset ratio Calculator'],
            ['path' => '/finance/debt-to-equity', 'name' => 'Debt to equity Calculator'],
        ],
        'authors' => [],
    ],
];
