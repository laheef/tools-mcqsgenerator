<?php

/**
 * Credit card minimum payment
 * /finance/credit-card-minimum-payment
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Credit card minimum payment',
    'meta' => ['title' => 'Credit card minimum payment — Formula & Results', 'description' => 'Credit card minimum payment works out period count2 and period count2 ne from statement balance and due date. The formula is printed in the form\'s own words.', 'h1' => 'Credit card minimum payment Calculator', 'updated' => '2026-09-27'],
    'sections' => [
        [
            'title' => 'Specifications',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'LoanAmount',
                            'label' => 'Statement balance',
                            'type' => 'number',
                            'help' => 'The amount you owe on your credit card as of the latest billing cycle.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '1500',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'first_day', 'label' => 'Due date', 'type' => 'date', 'help' => 'The closest date by which you need to pay your following monthly payment.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'r',
                            'label' => 'APR',
                            'type' => 'number',
                            'help' => 'APR - Annual Percentage Rate.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '18',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'CompoundFreq',
                            'label' => 'Interest capitalization frequency',
                            'type' => 'select',
                            'options' => ['Yearly' => '11', 'Monthly' => '14', 'Daily (360)' => '16', 'Daily (365)' => '17'],
                            'dataset' => 'CompoundFreq',
                            'control' => 'DROPDOWN',
                            'help' => 'You can set here how often the interest is calculated and added to your balance.',
                            'default' => 'Daily (360)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'change_comp_freq',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Change capitalization frequency' => '1', '' => '0'],
                            'dataset' => 'selectCompFreq',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Payment setting',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PmtMin2',
                            'label' => 'Minimum payment',
                            'type' => 'number',
                            'help' => 'Note that the minimum payment amount only applies when it\'s higher than the minimum payment percentage.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '25',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PmtMin',
                            'label' => 'Minimum percentage',
                            'type' => 'number',
                            'help' => 'Note that the minimum percentage applies when it is higher than the minimum payment amount.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '3',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PercType',
                            'label' => 'Calculation method',
                            'type' => 'select',
                            'options' => ['Flat percentage' => '111', 'Percentage + interest' => '112'],
                            'help' => 'The way the bank applies the minimum percentage on your statement balance to determine your minimum payment.',
                            'default' => 'Flat percentage',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PmtGiven',
                            'label' => 'Monthly fix payment',
                            'type' => 'number',
                            'help' => 'Note that you can check the minimum payment schedule if you set the monthly fixed payment to zero.',
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
                            'name' => 't',
                            'label' => 'Payback within',
                            'type' => 'number',
                            'help' => 'The desired payback term.',
                            'unit' => '19',
                            'unit_default' => 'yrsmos',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '24',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PmtExtra',
                            'label' => 'Monthly additional payment',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            The amount of money you add to the fixed monthly payment. With this option, you can check how additional money reduces your interest costs and changes your payment schedule.
                            TXT,
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '50',
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
                                ['when' => null, 'text' => 'Minimum payment'],
                                ['when' => 'years != 0 and months != 0', 'text' => <<<'TXT'
                                With the minimum monthly payment, you would pay off the credit in {{years.formattedValue}}&nbsp;year(s), and {{months.formattedValue}}&nbsp;month(s), on {{payoffDate_NE.formattedValue}}.
                                TXT],
                                ['when' => 'years == 0 and months != 0', 'text' => 'With the minimum monthly payment, you would pay off the credit in {{months.formattedValue}}&nbsp;month(s), on {{payoffDate_NE.formattedValue}}.'],
                                ['when' => 'years != 0 and months == 0', 'text' => 'With the minimum monthly payment, you would pay off the credit in {{years.formattedValue}}&nbsp;year(s), on {{payoffDate_NE.formattedValue}}.'],
                                ['when' => null, 'text' => <<<'TXT'
                                The total payment amount is {{global.currencySymbol}}{{total_payment_NE.formattedValue}}, with an interest payment of {{global.currencySymbol}}{{intPaid_NE.formattedValue}}.
                                TXT],
                                ['when' => null, 'text' => 'Fixed payment of {{global.currencySymbol}}{{PmtGiven.formattedValue}}'],
                                ['when' => '(PmtGiven < minPmt_NE) and (PmtGiven >= PmtMin) and ((VarSpec == 2))', 'text' => 'The monthly payment is lower than the minimum payment, so calculations have been adjusted accordingly.'],
                                ['when' => '(PmtGiven < minPmt_NE) and (PmtGiven >= PmtMin) and ((VarSpec == 2)) and years1 != 0 and months1 != 0', 'text' => <<<'TXT'
                                Your monthly payment (except when it's adjusted) is {{global.currencySymbol}}{{PmtGiven.formattedValue}}, and you will pay off the credit in {{years1.formattedValue}}&nbsp;year(s), and {{months1.formattedValue}}&nbsp;month(s)**, on {{payoffDate.formattedValue}}.&nbsp;
                                TXT],
                                ['when' => '(PmtGiven < minPmt_NE) and (PmtGiven >= PmtMin) and ((VarSpec == 2)) and years1 == 0 and months1 != 0', 'text' => <<<'TXT'
                                Your monthly payment (except when it's adjusted) is {{global.currencySymbol}}{{PmtGiven.formattedValue}}, and you will pay off the credit in {{months1.formattedValue}}&nbsp;month(s)**, on {{payoffDate.formattedValue}}.&nbsp;
                                TXT],
                                ['when' => '(PmtGiven < minPmt_NE) and (PmtGiven >= PmtMin) and ((VarSpec == 2)) and years1 != 0 and months1 == 0', 'text' => <<<'TXT'
                                Your monthly payment (except when it's adjusted) is {{global.currencySymbol}}{{PmtGiven.formattedValue}}, and you will pay off the credit in {{years1.formattedValue}}&nbsp;year(s), on {{payoffDate.formattedValue}}.&nbsp;
                                TXT],
                                ['when' => 'not((PmtGiven < minPmt_NE) and (PmtGiven >= PmtMin) and ((VarSpec == 2))) and years1 != 0 and years2 != 0 and months1 != 0 and months2 != 0', 'text' => <<<'TXT'
                                With the monthly fixed payment you would pay off the credit on {{payoffDate.formattedValue}}, which means that you finish paying the credit in {{years1.formattedValue}}&nbsp;year(s), and {{months1.formattedValue}}&nbsp;month(s); thus, you accelerate the repayment by {{years2.formattedValue}}&nbsp;year(s), and {{months2.formattedValue}}&nbsp;month(s).
                                TXT],
                                ['when' => 'not((PmtGiven < minPmt_NE) and (PmtGiven >= PmtMin) and ((VarSpec == 2))) and years1 == 0 and years2 != 0 and months1 != 0 and months2 != 0', 'text' => <<<'TXT'
                                With the monthly fixed payment you would pay off the credit on {{payoffDate.formattedValue}}, which means that you finish paying the credit in {{months1.formattedValue}}&nbsp;month(s); thus, you accelerate the repayment by {{years2.formattedValue}}&nbsp;year(s), and {{months2.formattedValue}}&nbsp;month(s).
                                TXT],
                                ['when' => 'not((PmtGiven < minPmt_NE) and (PmtGiven >= PmtMin) and ((VarSpec == 2))) and years1 != 0 and years2 == 0 and months1 != 0 and months2 != 0', 'text' => <<<'TXT'
                                With the monthly fixed payment you would pay off the credit on {{payoffDate.formattedValue}}, which means that you finish paying the credit in {{years1.formattedValue}}&nbsp;year(s), and {{months1.formattedValue}}&nbsp;month(s); thus, you accelerate the repayment by {{months2.formattedValue}}&nbsp;month(s).
                                TXT],
                                ['when' => 'not((PmtGiven < minPmt_NE) and (PmtGiven >= PmtMin) and ((VarSpec == 2))) and years1 != 0 and years2 != 0 and months1 == 0 and months2 != 0', 'text' => <<<'TXT'
                                With the monthly fixed payment you would pay off the credit on {{payoffDate.formattedValue}}, which means that you finish paying the credit in {{years1.formattedValue}}&nbsp;year(s); thus, you accelerate the repayment by {{years2.formattedValue}}&nbsp;year(s), and {{months2.formattedValue}}&nbsp;month(s).
                                TXT],
                                ['when' => 'not((PmtGiven < minPmt_NE) and (PmtGiven >= PmtMin) and ((VarSpec == 2))) and years1 != 0 and years2 != 0 and months1 != 0 and months2 == 0', 'text' => <<<'TXT'
                                With the monthly fixed payment you would pay off the credit on {{payoffDate.formattedValue}}, which means that you finish paying the credit in {{years1.formattedValue}}&nbsp;year(s), and {{months1.formattedValue}}&nbsp;month(s); thus, you accelerate the repayment by {{years2.formattedValue}}&nbsp;year(s).
                                TXT],
                                ['when' => 'not((PmtGiven < minPmt_NE) and (PmtGiven >= PmtMin) and ((VarSpec == 2))) and years1 == 0 and years2 == 0 and months1 != 0 and months2 != 0', 'text' => <<<'TXT'
                                With the monthly fixed payment you would pay off the credit on {{payoffDate.formattedValue}}, which means that you finish paying the credit in {{months1.formattedValue}}&nbsp;month(s); thus, you accelerate the repayment by {{months2.formattedValue}}&nbsp;month(s).
                                TXT],
                                ['when' => 'not((PmtGiven < minPmt_NE) and (PmtGiven >= PmtMin) and ((VarSpec == 2))) and years1 != 0 and years2 != 0 and months1 == 0 and months2 == 0', 'text' => <<<'TXT'
                                With the monthly fixed payment you would pay off the credit on {{payoffDate.formattedValue}}, which means that you finish paying the credit in {{years1.formattedValue}}&nbsp;year(s); thus, you accelerate the repayment by {{years2.formattedValue}}&nbsp;year(s).
                                TXT],
                                ['when' => 'not((PmtGiven < minPmt_NE) and (PmtGiven >= PmtMin) and ((VarSpec == 2))) and years1 == 0 and years2 != 0 and months1 != 0 and months2 == 0', 'text' => <<<'TXT'
                                With the monthly fixed payment you would pay off the credit on {{payoffDate.formattedValue}}, which means that you finish paying the credit in {{months1.formattedValue}}&nbsp;month(s); thus, you accelerate the repayment by {{years2.formattedValue}}&nbsp;year(s).
                                TXT],
                                ['when' => 'not((PmtGiven < minPmt_NE) and (PmtGiven >= PmtMin) and ((VarSpec == 2))) and years1 != 0 and years2 == 0 and months1 == 0 and months2 != 0', 'text' => <<<'TXT'
                                With the monthly fixed payment you would pay off the credit on {{payoffDate.formattedValue}}, which means that you finish paying the credit in {{years1.formattedValue}}&nbsp;year(s); thus, you accelerate the repayment by {{months2.formattedValue}}&nbsp;month(s).
                                TXT],
                                ['when' => null, 'text' => <<<'TXT'
                                The total payment amount is {{global.currencySymbol}}{{total_payment.formattedValue}}, with an interest payment of {{global.currencySymbol}}{{intPaid.formattedValue}}, resulting in an interest saving of {{global.currencySymbol}}{{intPaid_diff.formattedValue}}.
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
                                ['when' => '(PmtGiven < minPmt) and (PmtGiven >= PmtMin2) and  VarBase_vc  == 2 and VarSpec == 2', 'text' => 'The monthly payment is lower than the minimum payment percentage- the payment schedule is adjusted accordingly.'],
                                ['when' => '(PmtGiven < minPmt) and (PmtGiven >= PmtMin2) and VarBase_vc == 2 and VarSpec == 2  and years1 != 0 and months1 != 0', 'text' => <<<'TXT'
                                Your monthly payment (except when it's adjusted) is {{global.currencySymbol}}{{pmt.formattedValue}} and you will pay off the credit in {{years1.formattedValue}}&nbsp;year(s), and {{months1.formattedValue}}&nbsp;month(s), on {{payoffDate.formattedValue}}.
                                TXT],
                                ['when' => '(PmtGiven < minPmt) and (PmtGiven >= PmtMin2) and VarBase_vc == 2 and VarSpec == 2  and years1 == 0 and months1 != 0', 'text' => <<<'TXT'
                                Your monthly payment (except when it's adjusted) is {{global.currencySymbol}}{{pmt.formattedValue}} and you will pay off the credit in {{months1.formattedValue}}&nbsp;month(s), on {{payoffDate.formattedValue}}.
                                TXT],
                                ['when' => '(PmtGiven < minPmt) and (PmtGiven >= PmtMin2) and VarBase_vc == 2 and VarSpec == 2  and years1 != 0 and months1 == 0', 'text' => <<<'TXT'
                                Your monthly payment (except when it's adjusted) is {{global.currencySymbol}}{{pmt.formattedValue}} and you will pay off the credit in {{years1.formattedValue}}&nbsp;year(s), on {{payoffDate.formattedValue}}.
                                TXT],
                                ['when' => '(((PmtGiven < PmtMin2) and ((VarBase_vc == 2) and (VarSpec == 2))) or (((VarSpec == 1) or (VarSpec == 3)) and (pmt <= minPmt)))', 'text' => 'The monthly payment is lower than the minimum payment, so calculations have been adjusted accordingly.'],
                                ['when' => <<<'TXT'
                                (((PmtGiven < PmtMin2) and ((VarBase_vc == 2) and (VarSpec == 2))) or (((VarSpec == 1) or (VarSpec == 3)) and (pmt <= minPmt)))  and years1 != 0 and months1 != 0
                                TXT, 'text' => 'You will pay off the credit in {{years1.formattedValue}}&nbsp;year(s), and {{months1.formattedValue}}&nbsp;month(s), on {{payoffDate.formattedValue}}.'],
                                ['when' => <<<'TXT'
                                (((PmtGiven < PmtMin2) and ((VarBase_vc == 2) and (VarSpec == 2))) or (((VarSpec == 1) or (VarSpec == 3)) and (pmt <= minPmt)))  and years1 == 0 and months1 != 0
                                TXT, 'text' => 'You will pay off the credit in {{months1.formattedValue}}&nbsp;month(s), on {{payoffDate.formattedValue}}.'],
                                ['when' => <<<'TXT'
                                (((PmtGiven < PmtMin2) and ((VarBase_vc == 2) and (VarSpec == 2))) or (((VarSpec == 1) or (VarSpec == 3)) and (pmt <= minPmt)))  and years1 != 0 and months1 == 0
                                TXT, 'text' => 'You will pay off the credit in {{years1.formattedValue}}&nbsp;year(s), on {{payoffDate.formattedValue}}.'],
                                ['when' => <<<'TXT'
                                (((PmtGiven > minPmt)) and (PmtGiven > PmtMin2)) and ((VarBase_vc == 2) and (VarSpec == 2)) or (((VarSpec == 1) or (VarSpec == 3)) and (pmt > PmtMin2)) and years1 != 0 and months1 != 0
                                TXT, 'text' => <<<'TXT'
                                With monthly payments of {{global.currencySymbol}}{{pmt.formattedValue}} you would pay off the credit in {{years1.formattedValue}}&nbsp;year(s), and {{months1.formattedValue}}&nbsp;month(s), on {{payoffDate.formattedValue}}.
                                TXT],
                                ['when' => <<<'TXT'
                                (((PmtGiven > minPmt)) and (PmtGiven > PmtMin2)) and ((VarBase_vc == 2) and (VarSpec == 2)) or (((VarSpec == 1) or (VarSpec == 3)) and (pmt > PmtMin2)) and years1 == 0 and months1 != 0
                                TXT, 'text' => <<<'TXT'
                                With monthly payments of {{global.currencySymbol}}{{pmt.formattedValue}} you would pay off the credit in {{months1.formattedValue}}&nbsp;month(s), on {{payoffDate.formattedValue}}.
                                TXT],
                                ['when' => <<<'TXT'
                                (((PmtGiven > minPmt)) and (PmtGiven > PmtMin2)) and ((VarBase_vc == 2) and (VarSpec == 2)) or (((VarSpec == 1) or (VarSpec == 3)) and (pmt > PmtMin2)) and years1 != 0 and months1 == 0
                                TXT, 'text' => <<<'TXT'
                                With monthly payments of {{global.currencySymbol}}{{pmt.formattedValue}} you would pay off the credit in {{years1.formattedValue}}&nbsp;year(s), on {{payoffDate.formattedValue}}.
                                TXT],
                                ['when' => '(VarBase_vc == 1 and VarSpec == 2) and years1 != 0 and months1 != 0', 'text' => 'You will pay off the credit in {{years1.formattedValue}}&nbsp;year(s), and {{months1.formattedValue}}&nbsp;month(s), on {{payoffDate.formattedValue}}.'],
                                ['when' => '(VarBase_vc == 1 and VarSpec == 2) and years1 == 0 and months1 != 0', 'text' => 'You will pay off the credit in {{months1.formattedValue}}&nbsp;month(s), on {{payoffDate.formattedValue}}.'],
                                ['when' => '(VarBase_vc == 1 and VarSpec == 2) and years1 != 0 and months1 == 0', 'text' => 'You will pay off the credit in {{years1.formattedValue}}&nbsp;year(s), on {{payoffDate.formattedValue}}.'],
                                ['when' => 'pmtMonth == 0', 'text' => <<<'TXT'
                                The total payment amount is {{global.currencySymbol}}{{total_payment.formattedValue}}, with an interest payment of {{global.currencySymbol}}{{intPaid.formattedValue}}.
                                TXT],
                                ['when' => 'pmtMonth != 0', 'text' => <<<'TXT'
                                As the required minimum payment doesn't cover your monthly interest, your statement balance increases, and you can't eliminate the credit by paying only the minimum.
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
                                ['when' => 'periodCount2 == 0 or (periodCount2_NE == 0 and PmtGiven != 0)', 'text' => 'With the given setup, you can\'t pay off your credit card balance within a reasonable time by paying only the required minimum.&nbsp;'],
                                ['when' => 'PmtGiven > 0 and PmtGiven <= PmtMin2', 'text' => <<<'TXT'
                                The monthly payment must be higher than the minimum monthly payment. To check the repayment schedule with minimum payments, set the fixed monthly payment to zero.
                                TXT],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Always hidden variables',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'periodCount2',
                            'label' => 'Period count2',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'periodCount2_NE',
                            'label' => 'Period count2 ne',
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
                            'name' => 'm',
                            'label' => 'M',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
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
                        [
                            'name' => 'q',
                            'label' => 'Payment frequency',
                            'type' => 'select',
                            'options' => ['Monthly' => '12', 'Bi-weekly' => '26.08875', 'Weekly' => '52.17750'],
                            'default' => 'Monthly',
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
                            'name' => 'Select1',
                            'label' => 'I would like to specify the..',
                            'type' => 'select',
                            'options' => ['Monthly payment' => '22', 'Desired payback term' => '21', 'Desired payoff date' => '23'],
                            'dataset' => 'Select1',
                            'default' => 'Monthly payment',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarSpec',
                            'label' => 'Varspec',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PmtBase',
                            'label' => 'Repayment by',
                            'type' => 'select',
                            'options' => ['Minimum payments' => '1', 'Fixed payments' => '2'],
                            'dataset' => 'PmtBase',
                            'help' => 'In the advanced mode, you can set the appropriate parameters for minimum payments.',
                            'default' => 'Fixed payments',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarPerc',
                            'label' => 'Varperc',
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
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Monthly amortization schedule' => '111', 'Yearly amortization schedule' => '112'],
                            'dataset' => 'TableFreq',
                            'default' => 'Monthly amortization schedule',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'amortization_year', 'label' => 'Amortization schedule from', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'VarBase',
                            'label' => 'Varbase',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'VarBase_vc',
                            'label' => 'VarBase vc',
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
                            'name' => 'intPaid',
                            'label' => 'Int paid',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'minPmt',
                            'label' => 'Min pmt',
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
                        ['name' => 'payoffDate', 'label' => 'Payoff date', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'intPaid_NE',
                            'label' => 'Int paid ne',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'minPmt_NE',
                            'label' => 'Min pmt ne',
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
                        ['name' => 'payoffDate_NE', 'label' => 'Payoff date ne', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'intPaid_diff',
                            'label' => 'Int paid diff',
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
                            'name' => 'pmt',
                            'label' => 'Pmt',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'pmtMonth',
                            'label' => 'pmtMonth',
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
                            'name' => 'total_payment',
                            'label' => 'Total payment',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'total_payment_NE',
                            'label' => 'Total payment ne',
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
                            'name' => 'years',
                            'label' => 'Years',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'months',
                            'label' => 'Months',
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
                            'name' => 'years1',
                            'label' => 'Years1',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'months1',
                            'label' => 'Months1',
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
                            'name' => 'years2',
                            'label' => 'Years2',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'months2',
                            'label' => 'Months2',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hide',
                            'label' => 'Hide',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pmtExtraOne',
                            'label' => 'Lump-sum payment',
                            'type' => 'number',
                            'help' => 'A single prepayment on a given day.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'periodCount2 = get_values(r, t, m, q, LoanAmount, PmtExtra, VarTable, first_day, amortization_year, PmtGiven, VarSpec, PmtMin, PmtMin2, VarBase, VarPerc, 0)',
            'results' => ['periodCount2' => 'get_values(r, t, m, q, LoanAmount, PmtExtra, VarTable, first_day, amortization_year, PmtGiven, VarSpec, PmtMin, PmtMin2, VarBase, VarPerc, 0)'],
        ],
        [
            'title' => 'periodCount2_NE = get_values(r, t, m, q, LoanAmount, PmtExtra, VarTable, first_day, amortization_year, PmtGiven, VarSpec, PmtMin, PmtMin2, VarBase, VarPerc, 1)',
            'results' => ['periodCount2_NE' => 'get_values(r, t, m, q, LoanAmount, PmtExtra, VarTable, first_day, amortization_year, PmtGiven, VarSpec, PmtMin, PmtMin2, VarBase, VarPerc, 1)'],
        ],
        [
            'title' => 'minPmt = get_values(r, t, m, q, LoanAmount, PmtExtra, VarTable, first_day, amortization_year, PmtGiven, VarSpec, PmtMin, PmtMin2, VarBase, VarPerc, 2)',
            'results' => ['minPmt' => 'get_values(r, t, m, q, LoanAmount, PmtExtra, VarTable, first_day, amortization_year, PmtGiven, VarSpec, PmtMin, PmtMin2, VarBase, VarPerc, 2)'],
        ],
        [
            'title' => 'pmt = get_values(r, t, m, q, LoanAmount, PmtExtra, VarTable, first_day, amortization_year, PmtGiven, VarSpec, PmtMin, PmtMin2, VarBase, VarPerc, 3)',
            'results' => ['pmt' => 'get_values(r, t, m, q, LoanAmount, PmtExtra, VarTable, first_day, amortization_year, PmtGiven, VarSpec, PmtMin, PmtMin2, VarBase, VarPerc, 3)'],
        ],
        [
            'title' => 'years = get_values(r, t, m, q, LoanAmount, PmtExtra, VarTable, first_day, amortization_year, PmtGiven, VarSpec, PmtMin, PmtMin2, VarBase, VarPerc, 4)',
            'results' => ['years' => 'get_values(r, t, m, q, LoanAmount, PmtExtra, VarTable, first_day, amortization_year, PmtGiven, VarSpec, PmtMin, PmtMin2, VarBase, VarPerc, 4)'],
        ],
        [
            'title' => 'years1 = get_values(r, t, m, q, LoanAmount, PmtExtra, VarTable, first_day, amortization_year, PmtGiven, VarSpec, PmtMin, PmtMin2, VarBase, VarPerc, 5)',
            'results' => ['years1' => 'get_values(r, t, m, q, LoanAmount, PmtExtra, VarTable, first_day, amortization_year, PmtGiven, VarSpec, PmtMin, PmtMin2, VarBase, VarPerc, 5)'],
        ],
        [
            'title' => 'years2 = get_values(r, t, m, q, LoanAmount, PmtExtra, VarTable, first_day, amortization_year, PmtGiven, VarSpec, PmtMin, PmtMin2, VarBase, VarPerc, 6)',
            'results' => ['years2' => 'get_values(r, t, m, q, LoanAmount, PmtExtra, VarTable, first_day, amortization_year, PmtGiven, VarSpec, PmtMin, PmtMin2, VarBase, VarPerc, 6)'],
        ],
        [
            'title' => 'months = get_values(r, t, m, q, LoanAmount, PmtExtra, VarTable, first_day, amortization_year, PmtGiven, VarSpec, PmtMin, PmtMin2, VarBase, VarPerc, 7)',
            'results' => ['months' => 'get_values(r, t, m, q, LoanAmount, PmtExtra, VarTable, first_day, amortization_year, PmtGiven, VarSpec, PmtMin, PmtMin2, VarBase, VarPerc, 7)'],
        ],
        [
            'title' => 'months1 = get_values(r, t, m, q, LoanAmount, PmtExtra, VarTable, first_day, amortization_year, PmtGiven, VarSpec, PmtMin, PmtMin2, VarBase, VarPerc, 8)',
            'results' => ['months1' => 'get_values(r, t, m, q, LoanAmount, PmtExtra, VarTable, first_day, amortization_year, PmtGiven, VarSpec, PmtMin, PmtMin2, VarBase, VarPerc, 8)'],
        ],
        [
            'title' => 'months2 = get_values(r, t, m, q, LoanAmount, PmtExtra, VarTable, first_day, amortization_year, PmtGiven, VarSpec, PmtMin, PmtMin2, VarBase, VarPerc, 9)',
            'results' => ['months2' => 'get_values(r, t, m, q, LoanAmount, PmtExtra, VarTable, first_day, amortization_year, PmtGiven, VarSpec, PmtMin, PmtMin2, VarBase, VarPerc, 9)'],
        ],
        [
            'title' => 'payoffDate = get_values(r, t, m, q, LoanAmount, PmtExtra, VarTable, first_day, amortization_year, PmtGiven, VarSpec, PmtMin, PmtMin2, VarBase, VarPerc, 10)',
            'results' => ['payoffDate' => 'get_values(r, t, m, q, LoanAmount, PmtExtra, VarTable, first_day, amortization_year, PmtGiven, VarSpec, PmtMin, PmtMin2, VarBase, VarPerc, 10)'],
        ],
        [
            'title' => 'pmtMonth = get_values(r, t, m, q, LoanAmount, PmtExtra, VarTable, first_day, amortization_year, PmtGiven, VarSpec, PmtMin, PmtMin2, VarBase, VarPerc, 11)',
            'results' => ['pmtMonth' => 'get_values(r, t, m, q, LoanAmount, PmtExtra, VarTable, first_day, amortization_year, PmtGiven, VarSpec, PmtMin, PmtMin2, VarBase, VarPerc, 11)'],
        ],
        [
            'title' => 'intPaid = get_values(r, t, m, q, LoanAmount, PmtExtra, VarTable, first_day, amortization_year, PmtGiven, VarSpec, PmtMin, PmtMin2, VarBase, VarPerc, 12)',
            'results' => ['intPaid' => 'get_values(r, t, m, q, LoanAmount, PmtExtra, VarTable, first_day, amortization_year, PmtGiven, VarSpec, PmtMin, PmtMin2, VarBase, VarPerc, 12)'],
        ],
        [
            'title' => 'payoffDate_NE = get_values(r, t, m, q, LoanAmount, PmtExtra, VarTable, first_day, amortization_year, PmtGiven, VarSpec, PmtMin, PmtMin2, VarBase, VarPerc, 13)',
            'results' => ['payoffDate_NE' => 'get_values(r, t, m, q, LoanAmount, PmtExtra, VarTable, first_day, amortization_year, PmtGiven, VarSpec, PmtMin, PmtMin2, VarBase, VarPerc, 13)'],
        ],
        [
            'title' => 'intPaid_NE = get_values(r, t, m, q, LoanAmount, PmtExtra, VarTable, first_day, amortization_year, PmtGiven, VarSpec, PmtMin, PmtMin2, VarBase, VarPerc, 14)',
            'results' => ['intPaid_NE' => 'get_values(r, t, m, q, LoanAmount, PmtExtra, VarTable, first_day, amortization_year, PmtGiven, VarSpec, PmtMin, PmtMin2, VarBase, VarPerc, 14)'],
        ],
        [
            'title' => 'minPmt_NE = get_values(r, t, m, q, LoanAmount, PmtExtra, VarTable, first_day, amortization_year, PmtGiven, VarSpec, PmtMin, PmtMin2, VarBase, VarPerc, 15)',
            'results' => ['minPmt_NE' => 'get_values(r, t, m, q, LoanAmount, PmtExtra, VarTable, first_day, amortization_year, PmtGiven, VarSpec, PmtMin, PmtMin2, VarBase, VarPerc, 15)'],
        ],
        [
            'title' => 'hide = get_values(r, t, m, q, LoanAmount, PmtExtra, VarTable, first_day, amortization_year, PmtGiven, VarSpec, PmtMin, PmtMin2, VarBase, VarPerc, 16)',
            'results' => ['hide' => 'get_values(r, t, m, q, LoanAmount, PmtExtra, VarTable, first_day, amortization_year, PmtGiven, VarSpec, PmtMin, PmtMin2, VarBase, VarPerc, 16)'],
        ],
        [
            'title' => 'total_payment =  one_way(LoanAmount + intPaid)',
            'results' => ['total_payment' => '(LoanAmount + get_values(r, t, m, q, LoanAmount, PmtExtra, VarTable, first_day, amortization_year, PmtGiven, VarSpec, PmtMin, PmtMin2, VarBase, VarPerc, 12))'],
        ],
        [
            'title' => 'total_payment_NE =  one_way(LoanAmount + intPaid_NE)',
            'results' => ['total_payment_NE' => '(LoanAmount + get_values(r, t, m, q, LoanAmount, PmtExtra, VarTable, first_day, amortization_year, PmtGiven, VarSpec, PmtMin, PmtMin2, VarBase, VarPerc, 14))'],
        ],
        [
            'title' => 'intPaid_diff = one_way(intPaid_NE - intPaid)',
            'results' => ['intPaid_diff' => <<<'TXT'
            (-get_values(r, t, m, q, LoanAmount, PmtExtra, VarTable, first_day, amortization_year, PmtGiven, VarSpec, PmtMin, PmtMin2, VarBase, VarPerc, 12) + get_values(r, t, m, q, LoanAmount, PmtExtra, VarTable, first_day, amortization_year, PmtGiven, VarSpec, PmtMin, PmtMin2, VarBase, VarPerc, 14))
            TXT],
        ],
        [
            'title' => 'VarBase_vc = get_var_base(PmtGiven)',
            'results' => ['VarBase_vc' => 'get_var_base(PmtGiven)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("get_var_base",function(PmtGiven){var VarBase;if(PmtGiven===0){VarBase=1}else{VarBase=2}return VarBase});omni.define("get_values",function(r,t,m,q,LoanAmount,PmtExtra,VarTable,first_day,amortization_year,PmtGiven,VarSpec,PmtMin,PmtMin2,_VarBase,VarPerc,index){var milisecondsInADay=24*60*60*1000;var pmt;var periods=q*t;var date,i;var first_day_date=new Date(first_day);var VarBase=_VarBase;if(PmtGiven===0){VarBase=1}else{VarBase=2}var hide=0;var eq_p=mathjs.pow(1+r/m,m/q)-1;if(VarSpec===1){pmt=LoanAmount*eq_p*mathjs.pow(1+eq_p,periods)/(mathjs.pow(1+eq_p,periods)-1);PmtExtra=0}else if(VarSpec===2){pmt=VarBase==1?PmtMin2:PmtGiven;periods=600}else if(VarSpec===3){pmt=LoanAmount*eq_p*mathjs.pow(1+eq_p,periods)/(mathjs.pow(1+eq_p,periods)-1);PmtExtra=0}t=periods/q;var daydiff;if(q===12&&first_day_date.getMonth()===0){daydiff=31}else if(q===12&&first_day_date.getMonth()===1){daydiff=31}else if(q===12&&first_day_date.getDate()===27&&first_day_date.getMonth()===2){daydiff=28}else if(q===12&&first_day_date.getDate()===28&&first_day_date.getMonth()===2){daydiff=28}else if(q===12&&first_day_date.getDate()===29&&first_day_date.getMonth()===2){daydiff=29}else if(q===12&&first_day_date.getDate()===30&&first_day_date.getMonth()===2){daydiff=30}else if(q===12&&first_day_date.getDate()===31&&first_day_date.getMonth()===2){daydiff=31}else if(q===12&&first_day_date.getMonth()===2){daydiff=28}else if(q===12&&first_day_date.getMonth()===3){daydiff=31}else if(q===12&&first_day_date.getMonth()===4){daydiff=30}else if(q===12&&first_day_date.getMonth()===5){daydiff=31}else if(q===12&&first_day_date.getMonth()===6){daydiff=30}else if(q===12&&first_day_date.getMonth()===7){daydiff=31}else if(q===12&&first_day_date.getMonth()===8){daydiff=31}else if(q===12&&first_day_date.getMonth()===9){daydiff=30}else if(q===12&&first_day_date.getMonth()===10){daydiff=31}else if(q===12&&first_day_date.getMonth()===11){daydiff=30}else{daydiff=365.25/q}var int_year=(first_day_date.getYear()-100)/4;if(q===12&&int_year%1===0&&first_day_date.getYear()/100%1!==0&&first_day_date.getMonth()===2||q===12&&(first_day_date.getYear()+1900)/400%1===0&&first_day_date.getMonth()===2){daydiff=29}if(int_year%1===0&&first_day_date.getYear()/100%1!==0&&first_day_date.getMonth()===2&&first_day_date.getDate()===30||(first_day_date.getYear()+1900)/400%1===0&&first_day_date.getMonth()===2){daydiff=30}if(int_year%1===0&&first_day_date.getYear()/100%1!==0&&first_day_date.getMonth()===2&&first_day_date.getDate()===31||(first_day_date.getYear()+1900)/400%1===0&&first_day_date.getMonth()===2){daydiff=31}if(q===12&&first_day_date.getDate()===29&&first_day_date.getMonth()===1){daydiff=31}if(q===12&&first_day_date.getDate()===28&&first_day_date.getMonth()===1){daydiff=31}var first_day2=first_day-daydiff;var days_passed=0;var days_in_month;if(first_day>amortization_year||VarTable===2){amortization_year=first_day}var periodsMonthCount=Math.ceil(periods);var rMonth=eq_p;var princBal=LoanAmount;var princBalOpen;var princMonth;var intMonth;var princPaid=0;var intPaid=0;var pmtMonth=pmt;var minPmt;var princBal_NE=LoanAmount;var princBalOpen_NE;var princMonth_NE;var intMonth_NE;var intPaid_NE=0;var pmtMonth_NE=0;var minPmt_NE;var periodCount;var periodCount2=0;var periodCount_NE=0;var periodCount2_NE=0;var dd1=0,mm1=0,yyyy1=0;var dd1_NE=0,mm1_NE=0,yyyy1_NE=0;var payoffDate=0;var ddEnd=0,mmEnd=0,yyyyEnd=0;var ddEndSum=0,mmEndSum=0,yyyyEndSum=0;var payoffDate_NE=0;var ddEnd_NE=0,mmEnd_NE=0,yyyyEnd_NE=0;var ddEndSum_NE=0,mmEndSum_NE=0,yyyyEndSum_NE=0;for(i=0;i<=periodsMonthCount;i++){date=new Date(first_day2+days_passed*milisecondsInADay);if(q===12&&first_day_date.getDate()<29&&date.getMonth()===0){days_in_month=31}else if(q===12&&first_day_date.getDate()===29&&date.getMonth()===0){days_in_month=30}else if(q===12&&first_day_date.getDate()===30&&date.getMonth()===0){days_in_month=29}else if(q===12&&first_day_date.getDate()===31&&date.getMonth()===0){days_in_month=28}else if(q===12&&first_day_date.getDate()<29&&date.getMonth()===1){days_in_month=28}else if(q===12&&first_day_date.getDate()===29&&date.getMonth()===1){days_in_month=29}else if(q===12&&first_day_date.getDate()===30&&date.getMonth()===1){days_in_month=30}else if(q===12&&first_day_date.getDate()===31&&date.getMonth()===1){days_in_month=31}else if(q===12&&first_day_date.getDate()<31&&date.getMonth()===2){days_in_month=31}else if(q===12&&first_day_date.getDate()===31&&date.getMonth()===2){days_in_month=30}else if(q===12&&first_day_date.getDate()<31&&date.getMonth()===3){days_in_month=30}else if(q===12&&first_day_date.getDate()===31&&date.getMonth()===3){days_in_month=31}else if(q===12&&first_day_date.getDate()<31&&date.getMonth()===4){days_in_month=31}else if(q===12&&first_day_date.getDate()===31&&date.getMonth()===4){days_in_month=30}else if(q===12&&first_day_date.getDate()<31&&date.getMonth()===5){days_in_month=30}else if(q===12&&first_day_date.getDate()===31&&date.getMonth()===5){days_in_month=31}else if(q===12&&first_day_date.getDate()<31&&date.getMonth()===6){days_in_month=31}else if(q===12&&first_day_date.getDate()===31&&date.getMonth()===6){days_in_month=31}else if(q===12&&first_day_date.getDate()<31&&date.getMonth()===7){days_in_month=31}else if(q===12&&first_day_date.getDate()===31&&date.getMonth()===7){days_in_month=30}else if(q===12&&first_day_date.getDate()<31&&date.getMonth()===8){days_in_month=30}else if(q===12&&first_day_date.getDate()===31&&date.getMonth()===8){days_in_month=31}else if(q===12&&first_day_date.getDate()<31&&date.getMonth()===9){days_in_month=31}else if(q===12&&first_day_date.getDate()===31&&date.getMonth()===9){days_in_month=30}else if(q===12&&first_day_date.getDate()<31&&date.getMonth()===10){days_in_month=30}else if(q===12&&first_day_date.getDate()===31&&date.getMonth()===10){days_in_month=31}else if(q===12&&first_day_date.getDate()<31&&date.getMonth()===11){days_in_month=31}else if(q===12&&first_day_date.getDate()===31&&date.getMonth()===11){days_in_month=31}else{days_in_month=365.25/q}int_year=(date.getYear()-100)/4;if(q===12&&int_year%1===0&&date.getYear()/100%1!==0&&date.getMonth()===1||q===12&&(date.getYear()+1900)/400%1===0&&date.getMonth()===1){days_in_month=29}if(q===12&&int_year%1===0&&date.getYear()/100%1!==0&&date.getMonth()===0&&date.getDate()===30||q===12&&(date.getYear()+1900)/400%1===0&&date.getMonth()===0&&date.getDate()===30){days_in_month=30}if(q===12&&int_year%1===0&&date.getYear()/100%1!==0&&date.getMonth()===0&&date.getDate()===31||q===12&&(date.getYear()+1900)/400%1===0&&date.getMonth()===0&&date.getDate()===31){days_in_month=29}if(q===12&&int_year%1===0&&date.getYear()/100%1!==0&&date.getMonth()===0&&date.getDate()===29||q===12&&(date.getYear()+1900)/400%1===0&&date.getMonth()===0&&date.getDate()===29){days_in_month=31}else{days_in_month=days_in_month}if(q===12&&date.getDate()===29&&date.getMonth()===1&&first_day_date.getDate()>29){days_in_month=30}else{days_in_month=days_in_month}if(q===12&&date.getDate()===29&&date.getMonth()===1&&first_day_date.getDate()>30){days_in_month=31}else{days_in_month=days_in_month}if(q===12&&date.getDate()===28&&date.getMonth()===1&&first_day_date.getDate()>30){days_in_month=31}else{days_in_month=days_in_month}days_passed+=days_in_month;dd1=date.getDate();mm1=date.getMonth()+1;yyyy1=date.getFullYear();dd1_NE=date.getDate();mm1_NE=date.getMonth()+1;yyyy1_NE=date.getFullYear();princBalOpen_NE=princBal_NE;if(i>0){intMonth_NE=princBal_NE*rMonth;if(VarPerc==2){minPmt_NE=princBal_NE*PmtMin+intMonth_NE}else{minPmt_NE=princBal_NE*PmtMin}if(minPmt_NE<PmtMin2){minPmt_NE=PmtMin2}pmtMonth_NE=minPmt_NE;princMonth_NE=pmtMonth_NE-intMonth_NE;princBal_NE=princBal_NE-princMonth_NE}princBalOpen=princBal;if(i>0){intMonth=princBal*rMonth;if(VarPerc==2){minPmt=princBal*PmtMin+intMonth}else{minPmt=princBal*PmtMin}if(minPmt<PmtMin2){minPmt=PmtMin2}if(VarBase==1){pmtMonth=minPmt}else{pmtMonth=pmt;if(pmtMonth<minPmt){pmtMonth=minPmt}}princMonth=pmtMonth-intMonth;princBal=princBal-princMonth}if(i===0){intMonth=0;princMonth=0;intMonth_NE=0;princMonth_NE=0}if(princBalOpen<pmtMonth&&PmtExtra!==0){princMonth=princBalOpen}if(princBalOpen<pmtMonth&&PmtExtra!==0){princMonth=princBalOpen}intPaid+=intMonth;princPaid+=princMonth;intPaid_NE+=intMonth_NE;if(princBal<=0){princBal=0}if(princBalOpen<=0){princBalOpen=0}if(princBalOpen<=0){intMonth=0}if(princMonth<=0){princMonth=0}if(intMonth<=0){princMonth=0}if(princBal<=0){princPaid=LoanAmount}if(intPaid<=0){intMonth=0}if(princPaid===0){intPaid=0}if(princBal_NE<=0){princBal_NE=0}if(princBalOpen_NE<=0){princBalOpen_NE=0}if(princBalOpen_NE<=0){intMonth_NE=0}if(princMonth_NE<=0){princMonth_NE=0}if(intMonth_NE<=0){princMonth_NE=0}if(princBal===0&&princBalOpen!==0){periodCount=i}else{periodCount=0}if(princBal_NE===0&&princBalOpen_NE!==0){periodCount_NE=i}else{periodCount_NE=0}periodCount2+=periodCount;periodCount2_NE+=periodCount_NE;if(princBal===0){princMonth=princBalOpen}if(princBal_NE===0){princMonth_NE=princBalOpen_NE}if(princBal===0&&princBalOpen!==0){ddEnd=dd1;mmEnd=mm1;yyyyEnd=yyyy1}else{ddEnd=0;mmEnd=0;yyyyEnd=0}ddEndSum+=ddEnd;mmEndSum+=mmEnd;yyyyEndSum+=yyyyEnd;if(princBal_NE===0&&princBalOpen_NE!==0){ddEnd_NE=dd1_NE;mmEnd_NE=mm1_NE;yyyyEnd_NE=yyyy1_NE}else{ddEnd_NE=0;mmEnd_NE=0;yyyyEnd_NE=0}ddEndSum_NE+=ddEnd_NE;mmEndSum_NE+=mmEnd_NE;yyyyEndSum_NE+=yyyyEnd_NE;if(princBalOpen<pmtMonth){pmtMonth=princMonth+intMonth}}if(periodCount2===0||periodCount2_NE===0&&PmtGiven!==0){hide=1}else{hide=0}if(PmtGiven>0&&PmtGiven<=PmtMin2){hide=1}payoffDate=new Date(yyyyEndSum,mmEndSum-1,ddEndSum).getTime();payoffDate_NE=new Date(yyyyEndSum_NE,mmEndSum_NE-1,ddEndSum_NE).getTime();var years1=parseInt(Math.trunc(periodCount2/12));var months1=parseInt(periodCount2-years1*12);var years=parseInt(Math.trunc(periodCount2_NE/12));var months=parseInt(periodCount2_NE-years*12);var years2=parseInt(Math.trunc((periodCount2_NE-periodCount2)/12));var months2=parseInt(periodCount2_NE-periodCount2-years2*12);if(hide===0){if(PmtGiven===0){if(VarPerc==2){minPmt=LoanAmount*PmtMin+intMonth}else{minPmt=LoanAmount*PmtMin}}if(PmtGiven!==0){if(VarPerc==2){minPmt_NE=LoanAmount*PmtMin+LoanAmount*r/12}else{minPmt_NE=LoanAmount*PmtMin}}}var results=[periodCount2,periodCount2_NE,minPmt,pmt,years,years1,years2,months,months1,months2,payoffDate,pmtMonth,intPaid,payoffDate_NE,intPaid_NE,minPmt_NE,hide];return results[index]});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Credit card minimum payment turns Statement balance, Due date and APR into M and Ct1. There is no hidden constant here: change m and statement balance moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Credit card minimum payment calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Credit card minimum payment: it takes 36 numbers and reports M, Ct1 and Ct2.</p><p>Written with the labels from the form, Period count2 = get_values(APR, Payback within, M, Payment frequency, Statement balance, Monthly additional payment, Vartable, Due date, Amortization schedule from, Monthly fix payment, Varspec, Minimum percentage, Minimum payment, Varbase, Varperc, 0).</p><p>What comes back is M, Ct1, Ct2 and Vartable — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 36 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Statement balance</strong> — in USD. The amount you owe on your credit card as of the latest billing cycle.</li><li><strong>Due date</strong> — a plain number, no unit, entered as a date. The closest date by which you need to pay your following monthly payment.</li><li><strong>APR</strong> — in percent. APR - Annual Percentage Rate.</li><li><strong>Interest capitalization frequency</strong> — a plain number, no unit. You can set here how often the interest is calculated and added to your balance.</li><li><strong>Minimum payment</strong> — in USD. Note that the minimum payment amount only applies when it&#039;s higher than the minimum payment percentage.</li><li><strong>Minimum percentage</strong> — in percent. Note that the minimum percentage applies when it is higher than the minimum payment amount.</li><li><strong>Calculation method</strong> — a plain number, no unit. The way the bank applies the minimum percentage on your statement balance to determine your minimum payment.</li><li><strong>Monthly fix payment</strong> — in USD. Note that you can check the minimum payment schedule if you set the monthly fixed payment to zero.</li><li><strong>Payback within</strong> — in years / months. The desired payback term.</li><li><strong>Monthly additional payment</strong> — in USD. The amount of money you add to the fixed monthly payment. With this option, you can check how additional money reduces your interest costs and changes your payment schedule.</li><li><strong>Period count2</strong> — a plain number, no unit</li><li><strong>Period count2 ne</strong> — a plain number, no unit</li><li><strong>Payment frequency</strong> — a plain number, no unit</li><li><strong>I would like to specify the…</strong> — a plain number, no unit</li><li><strong>Repayment by</strong> — a plain number, no unit. In the advanced mode, you can set the appropriate parameters for minimum payments.</li><li><strong>Amortization schedule from</strong> — a plain number, no unit, entered as a date</li><li><strong>VarBase vc</strong> — a plain number, no unit</li><li><strong>Int paid</strong> — in USD</li><li><strong>Min pmt</strong> — in USD</li><li><strong>Payoff date</strong> — a plain number, no unit, entered as a date</li><li><strong>Int paid ne</strong> — in USD</li><li><strong>Min pmt ne</strong> — in USD</li><li><strong>Payoff date ne</strong> — a plain number, no unit, entered as a date</li><li><strong>Int paid diff</strong> — in USD</li><li><strong>Pmt</strong> — a plain number, no unit</li><li><strong>pmtMonth</strong> — a plain number, no unit</li><li><strong>Total payment</strong> — in USD</li><li><strong>Total payment ne</strong> — in USD</li><li><strong>Years</strong> — a plain number, no unit</li><li><strong>Months</strong> — a plain number, no unit</li><li><strong>Years1</strong> — a plain number, no unit</li><li><strong>Months1</strong> — a plain number, no unit</li><li><strong>Years2</strong> — a plain number, no unit</li><li><strong>Months2</strong> — a plain number, no unit</li><li><strong>Hide</strong> — a plain number, no unit</li><li><strong>Lump-sum payment</strong> — in USD. A single prepayment on a given day.</li></ul><p>The result boxes are M, Ct1, Ct2, Vartable, Varspec, Varperc, Varbase; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: APR offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Period count2</strong> = <code>get_values(APR, Payback within, M, Payment frequency, Statement balance, Monthly additional payment, Vartable, Due date, Amortization schedule from, Monthly fix payment, Varspec, Minimum percentage, Minimum payment, Varbase, Varperc, 0)</code></li><li><strong>Period count2 ne</strong> = <code>get_values(APR, Payback within, M, Payment frequency, Statement balance, Monthly additional payment, Vartable, Due date, Amortization schedule from, Monthly fix payment, Varspec, Minimum percentage, Minimum payment, Varbase, Varperc, 1)</code></li><li><strong>Min pmt</strong> = <code>get_values(APR, Payback within, M, Payment frequency, Statement balance, Monthly additional payment, Vartable, Due date, Amortization schedule from, Monthly fix payment, Varspec, Minimum percentage, Minimum payment, Varbase, Varperc, 2)</code></li><li><strong>Pmt</strong> = <code>get_values(APR, Payback within, M, Payment frequency, Statement balance, Monthly additional payment, Vartable, Due date, Amortization schedule from, Monthly fix payment, Varspec, Minimum percentage, Minimum payment, Varbase, Varperc, 3)</code></li><li><strong>Years</strong> = <code>get_values(APR, Payback within, M, Payment frequency, Statement balance, Monthly additional payment, Vartable, Due date, Amortization schedule from, Monthly fix payment, Varspec, Minimum percentage, Minimum payment, Varbase, Varperc, 4)</code></li><li><strong>Years1</strong> = <code>get_values(APR, Payback within, M, Payment frequency, Statement balance, Monthly additional payment, Vartable, Due date, Amortization schedule from, Monthly fix payment, Varspec, Minimum percentage, Minimum payment, Varbase, Varperc, 5)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Period count2</strong> = <code>get_values(APR, Payback within, M, Payment frequency, Statement balance, Monthly additional payment, Vartable, Due date, Amortization schedule from, Monthly fix payment, Varspec, Minimum percentage, Minimum payment, Varbase, Varperc, 0)</code> — the form to use when APR, Payback within, M and Payment frequency are the values you have.</li><li><strong>Period count2 ne</strong> = <code>get_values(APR, Payback within, M, Payment frequency, Statement balance, Monthly additional payment, Vartable, Due date, Amortization schedule from, Monthly fix payment, Varspec, Minimum percentage, Minimum payment, Varbase, Varperc, 1)</code> — the form to use when APR, Payback within, M and Payment frequency are the values you have.</li><li><strong>Min pmt</strong> = <code>get_values(APR, Payback within, M, Payment frequency, Statement balance, Monthly additional payment, Vartable, Due date, Amortization schedule from, Monthly fix payment, Varspec, Minimum percentage, Minimum payment, Varbase, Varperc, 2)</code> — the form to use when APR, Payback within, M and Payment frequency are the values you have.</li><li><strong>Pmt</strong> = <code>get_values(APR, Payback within, M, Payment frequency, Statement balance, Monthly additional payment, Vartable, Due date, Amortization schedule from, Monthly fix payment, Varspec, Minimum percentage, Minimum payment, Varbase, Varperc, 3)</code> — the form to use when APR, Payback within, M and Payment frequency are the values you have.</li><li><strong>Years</strong> = <code>get_values(APR, Payback within, M, Payment frequency, Statement balance, Monthly additional payment, Vartable, Due date, Amortization schedule from, Monthly fix payment, Varspec, Minimum percentage, Minimum payment, Varbase, Varperc, 4)</code> — the form to use when APR, Payback within, M and Payment frequency are the values you have.</li><li><strong>Years1</strong> = <code>get_values(APR, Payback within, M, Payment frequency, Statement balance, Monthly additional payment, Vartable, Due date, Amortization schedule from, Monthly fix payment, Varspec, Minimum percentage, Minimum payment, Varbase, Varperc, 5)</code> — the form to use when APR, Payback within, M and Payment frequency are the values you have.</li><li><strong>Years2</strong> = <code>get_values(APR, Payback within, M, Payment frequency, Statement balance, Monthly additional payment, Vartable, Due date, Amortization schedule from, Monthly fix payment, Varspec, Minimum percentage, Minimum payment, Varbase, Varperc, 6)</code> — the form to use when APR, Payback within, M and Payment frequency are the values you have.</li><li><strong>Months</strong> = <code>get_values(APR, Payback within, M, Payment frequency, Statement balance, Monthly additional payment, Vartable, Due date, Amortization schedule from, Monthly fix payment, Varspec, Minimum percentage, Minimum payment, Varbase, Varperc, 7)</code> — the form to use when APR, Payback within, M and Payment frequency are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Period count2, Period count2 ne and Min pmt can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside APR, Minimum percentage and Payback within is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with M, Ct1 and Ct2 are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Statement balance left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Statement balance is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Due date left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Due date is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Statement balance and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> M follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and years / months and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It counts in whole days.</strong> Dates are compared as calendar days, not as moments: two dates that differ by a few hours on the same day give the same answer, and there is no time-of-day input to set.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Statement balance, Due date and APR are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Statement balance, Due date and APR measured, M and Ct1 wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/annuity">Annuity Calculator</a>, <a href="/finance/annuity-payout">Annuity payout Calculator</a> and <a href="/finance/apc">APC Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Credit card minimum payment calculator work out?', 'a' => <<<'TXT'
            M, Ct1, Ct2 and Vartable, from APR, Payback within, M and Payment frequency. The relationship is Period count2 = get_values(APR, Payback within, M, Payment frequency, Statement balance, Monthly additional payment, Vartable, Due date, Amortization schedule from, Monthly fix payment, Varspec, Minimum percentage, Minimum payment, Varbase, Varperc, 0).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Statement balance (USD), Due date, APR (percent), Interest capitalization frequency, Minimum payment (USD). Enter statement balance, due date and APR; M is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Period count2, Period count2 ne, Min pmt and Pmt can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally M is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Statement balance blank and the page solves for it, reporting M instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to M at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/annuity', 'name' => 'Annuity Calculator'],
            ['path' => '/finance/annuity-payout', 'name' => 'Annuity payout Calculator'],
            ['path' => '/finance/apc', 'name' => 'APC Calculator'],
        ],
        'authors' => [],
    ],
];
