<?php

/**
 * Loan
 * /finance/loan
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Loan',
    'meta' => ['title' => 'Loan Calculator — Free, With Worked Examples', 'description' => 'Loan works out fee amount from what interest rate do you know? and interest rate. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Loan Calculator', 'updated' => '2026-09-30'],
    'sections' => [
        [
            'title' => 'Loan specifications',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'subject2',
                            'label' => 'What interest rate do you know?',
                            'type' => 'select',
                            'options' => ['Nominal interest rate' => '1', 'APR' => '2', 'Both APR and interest rate' => '3', 'I do not know either rate' => '4'],
                            'dataset' => 'Known rate',
                            'control' => 'DROPDOWN',
                            'help' => <<<'TXT'
                            While the nominal interest rate (or simply, the quoted rate) discloses only the interest on your loan amount, the Annual Percentage Rate (APR) reflects the real borrowing cost as it incorporates additional fees linked to the loan as well.
                            TXT,
                            'default' => 'Nominal interest rate',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'interest_rate',
                            'label' => 'Interest rate',
                            'type' => 'number',
                            'help' => 'Annual nominal interest rate or quoted rate.',
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
                            'name' => 'apr',
                            'label' => 'Annual Percentage Rate (APR)',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            Note that generally APR accounts for most fees, but there still might be other fees not included in the APR. For the list of typical charges, please refer to the text, and always check with your lender for accurate information.
                            TXT,
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'The APR must be higher than the nominal interest rate. Please change the specifications.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'compound_frequency',
                            'label' => 'Compound frequency',
                            'type' => 'select',
                            'options' => ['Yearly' => '41', 'Semi-annually' => '42', 'Quarterly' => '43', 'Monthly' => '44'],
                            'control' => 'DROPDOWN',
                            'help' => 'Generally, banks in the U.S. apply interest calculation on a monthly bases. Still, it is always a good idea to confirm it with the lender as it may differ.',
                            'default' => 'Monthly',
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
                            'help' => 'This is the full amount of the loan applied for. Note that the actual amount received may differ if any fee is financed by part of your loan.',
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
                            'name' => 'Payment',
                            'label' => 'Periodic payment',
                            'type' => 'number',
                            'help' => 'This is the amount of money (or installment) that need to be paid by the agreed due date.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '150',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'term',
                            'label' => 'Loan term',
                            'type' => 'number',
                            'help' => 'The length of time over which you are obliged to pay off your loan.',
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
                            'name' => 'payment_frequency',
                            'label' => 'Payment frequency',
                            'type' => 'select',
                            'options' => ['Quarterly' => '4', 'Monthly' => '12', 'Bi-weekly' => '26.08875', 'Weekly' => '52.1775'],
                            'control' => 'DROPDOWN',
                            'help' => 'The regularity of the due payments.',
                            'default' => 'Monthly',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Additional fees',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Fee_pre',
                            'label' => 'Prepaid fee',
                            'type' => 'number',
                            'help' => 'Paid in advance before the beginning of the loan term – no interest is calculated on this fee but it is still included in the APR.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '200',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Fee_rolled_input',
                            'label' => 'Loaned fee',
                            'type' => 'number',
                            'help' => 'Rolled into the loan, and paid with the periodic installments–usually, banks calculate interest on this fee and include it in the APR.',
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
                            'name' => 'Fee_pre_noapr',
                            'label' => 'Fees not in APR',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            You can include fees that are missed out from the quoted APR here. For the list of such possible charges, please refer to the text. It is always advisable to check with your lender on what fees they have based the APR. Note that charges included here are considered as prepaid fees.
                            TXT,
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
                            'name' => 'Fee_admin',
                            'label' => 'Origination fee',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            It is also called the administration fee, underwriting&nbsp;fee, or processing&nbsp;fee. Note that it is given as a percentage of the whole loan amount and that APR usually includes this fee.
                            TXT,
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
                            'name' => 'subject3',
                            'label' => 'Origination fee repayment',
                            'type' => 'select',
                            'options' => ['From the loan amount' => '1', 'Rolling into the loan' => '2', 'Out of pocket' => '3'],
                            'help' => 'Mostly it is deducted from the loan amount and paid at the beginning of the loan term.',
                            'default' => 'From the loan amount',
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
                                ['when' => 'subject3 == 1 and Fee_admin > 0', 'text' => 'You receive a {{LoanReceived.monetaryValue}} loan after deducting the origination fee of {{fee_amount.monetaryValue}}.'],
                                ['when' => 'Fee_rolled > 0 and subject3 != 2', 'text' => <<<'TXT'
                                Your periodic payment is {{Payment_fee.monetaryValue}}, and from this, {{paymentFeePeriod.monetaryValue}} covers the additional fees rolled into the loan. The total interest payment is {{Interest_total.monetaryValue}}, and from this, {{Interes_loan.monetaryValue}} charged on the loan amount and {{Interest_fee.monetaryValue}} is paid after the additional fees have been rolled into the loan.
                                TXT],
                                ['when' => '(Fee_rolled - AdminFee == 0) and subject3 == 2 and AdminFee > 0', 'text' => <<<'TXT'
                                Your periodic payment is {{Payment2.monetaryValue}}, and from this, {{Payment_admin.monetaryValue}} covers the administration fee rolled into the loan. The total interest payment is {{Interest_total.monetaryValue}}, and from this, {{Interes_loan.monetaryValue}} is charged on the loan amount and {{Interest_admin.monetaryValue}} is paid after the administration fee.
                                TXT],
                                ['when' => '(Fee_rolled - AdminFee > 0) and subject3 == 2 and AdminFee > 0', 'text' => <<<'TXT'
                                Your periodic payment is {{Payment_fee.monetaryValue}}, from this, {{paymentFeePeriod2.monetaryValue}} covers the additional fees rolled into the loan, and {{Payment_admin.monetaryValue}} covers the origination fee rolled into the loan. The total interest payment is {{Interest_total.monetaryValue}}, from this, {{Interest_total_3.monetaryValue}} is charged on the loan amount, {{Interest_3.monetaryV
                                TXT],
                                ['when' => 'Fee_rolled == 0 and subject2 != 2', 'text' => 'Your periodic payment is {{Payment2.monetaryValue}}. The total interest charged on your loan is, {{Interest_total.monetaryValue}}.'],
                                ['when' => 'Fee_rolled == 0 and subject2 == 2', 'text' => 'Your periodic payment is {{Payment2.monetaryValue}}.'],
                                ['when' => 'AdminFee > 0 and subject3 == 3', 'text' => 'The origination fee paid in advance is {{AdminFee.monetaryValue}}.'],
                                ['when' => 'AdminFee > 0 and subject3 == 2', 'text' => 'The origination fee rolled into the loan with the interest on it is {{origination_fee_sub3_2.monetaryValue}}.'],
                                ['when' => 'Fee_total > 0 and Fee_rolled > 0 and subject3 != 2', 'text' => 'The total additional fees with interest charged on them are {{Fee_total3.monetaryValue}}.'],
                                ['when' => 'Fee_total > 0 and Fee_rolled == 0 and Fee_pre_calc == 0', 'text' => 'The total additional fees are {{AdminFee.monetaryValue}}.'],
                                ['when' => 'Fee_rolled > 0 and subject3 != 2', 'text' => <<<'TXT'
                                The total payment you need to make is {{finalPaymentTotal.monetaryValue}}; thus, the total finance charge (total interest plus additional fees) is {{total_finance_charge.monetaryValue}}.
                                TXT],
                                ['when' => 'subject3 == 2 or (subject2 == 2 and subject3 != 2)', 'text' => <<<'TXT'
                                The total payment you need to make is {{Payment_total.monetaryValue}}; thus, the total finance charge (total interest plus additional fees) is {{FinCharges.monetaryValue}}.
                                TXT],
                                ['when' => 'subject2 == 2 and subject3 == 2', 'text' => <<<'TXT'
                                The total payment you need to make is {{Payment_total_2_2.monetaryValue}}; thus, the total finance charge (total interest plus additional fees) is {{FinCharges_2_2.monetaryValue}}.
                                TXT],
                                ['when' => 'Fee_total == 0 and subject2 != 2', 'text' => 'The total payment you need to make is {{Payment_total_2_2.monetaryValue}}.'],
                                ['when' => 'Fee_total > 0 and subject2 != 2', 'text' => <<<'TXT'
                                The total payment you need to make is {{Payment_total.monetaryValue}}; thus, the total finance charge (total interest plus additional fees) is {{FinCharges.monetaryValue}}.
                                TXT],
                                ['when' => 'subject2 != 2', 'text' => 'The APR is {{APR.formattedValue}}%, and the effective&nbsp;APR that accounts for the compounding frequency as well is {{APR_effective.formattedValue}}%.'],
                                ['when' => 'subject2 == 2 and Fee_pre_calc == 0', 'text' => 'The effective APR that accounts for the compounding frequency as well is {{APR_effective_sel2.formattedValue}}%.'],
                                ['when' => 'subject2 == 2 and Fee_pre_calc > 0', 'text' => <<<'TXT'
                                The adjusted APR is {{APR.formattedValue}}%, and the effective&nbsp;APR that accounts for the compounding frequency as well is {{APR_effective.formattedValue}}%.
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
                                ['when' => 'subject3 == 1 and Fee_admin > 0', 'text' => 'You receive a {{LoanReceived.monetaryValue}} loan after deducting the origination fee of {{fee_amount.monetaryValue}}.'],
                                ['when' => 'Fee_admin > 0', 'text' => <<<'TXT'
                                Your periodic payment is {{Payment2_3.monetaryValue}}, and from this, {{fee_apr.monetaryValue}} covers the additional fees rolled into the loan. The total payment you need to make is {{finalPaymentTotal_3_1.monetaryValue}}; thus, the total finance charge (total interest plus additional fees) is {{get_finalFinanceCharges_3_2.monetaryValue}}.
                                TXT],
                                ['when' => null, 'text' => 'The total interest payment on your loan is {{Interest_total_3.monetaryValue}}.'],
                                ['when' => null, 'text' => 'The total additional fees with interest charged on your loan are {{Fee_total_3_1.monetaryValue}}.'],
                                ['when' => 'Fee_admin > 0 and subject3 == 2', 'text' => 'The origination fee rolled into the loan is {{AdminFee.monetaryValue}} which has an interest of {{Interest_admin.monetaryValue}}.'],
                                ['when' => 'Fee_admin > 0 and subject3 == 3', 'text' => 'The origination fee paid in advance is {{AdminFee.monetaryValue}}.&nbsp;'],
                                ['when' => 'Fee_admin > 0 and subject3 == 2 and Fee_pre_noapr == 0', 'text' => 'The effective APR that accounts for the compounding frequency as well is {{APR3_effective.formattedValue}}%.'],
                                ['when' => 'Fee_pre_noapr > 0', 'text' => <<<'TXT'
                                The adjusted APR is {{APR3_effective.formattedValue}}%, and the effective APR that accounts for the compounding frequency as well is {{APR3_effective.formattedValue}}%.
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
                                ['when' => 'LoanAmount > Payment_total_4', 'text' => <<<'TXT'
                                Your total payment would be {{Payment_total_4.monetaryValue}}. In general, you always need to pay back more than the loan amount, therefore please change the specification accordingly.&nbsp;
                                TXT],
                                ['when' => '(LoanAmount <= Payment_total_4) and (Fee_rolled == 0 and Fee_pre_calc == 0 Fee_admin_calc == 0)', 'text' => <<<'TXT'
                                Your total payment is {{Payment_total_4.monetaryValue}}; thus, the total interest on your loan, which makes up the total finance charge, is {{finalFinanceCharges_4.monetaryValue}}.
                                TXT],
                                ['when' => '(LoanAmount <= Payment_total_4) and (Fee_rolled == 0 and Fee_pre_calc > 0 Fee_admin_calc == 0)', 'text' => <<<'TXT'
                                Your total payment is {{Payment_total_4.monetaryValue}}, which consists of an interest payment of {{interestPayment_4.monetaryValue}} and additional fees of {{Fee_pre_calc.monetaryValue}}. Therefore, the total finance charge is {{finalFinanceCharges_4.monetaryValue}}.
                                TXT],
                                ['when' => '(LoanAmount <= Payment_total_4) and (Fee_rolled > 0 and Fee_admin_calc == 0)', 'text' => 'Your total payment is {{Payment_total_4.monetaryValue}}, with a total finance charge of {{finalFinanceCharges_4.monetaryValue}}.'],
                                ['when' => '(LoanAmount <= Payment_total_4) and (Fee_rolled == 0 and Fee_admin_calc > 0 and subject3 == 1)', 'text' => <<<'TXT'
                                You receive a {{LoanReceived.monetaryValue}} loan, after deducting the origination fee of {{AdminFee.monetaryValue}}. Your total payment is {{Payment_total_4.monetaryValue}}, which consists of an interest payment of {{interestPayment_4.monetaryValue}} and additional fees of {{Fee_additional_4.monetaryValue}}. Therefore, the total finance charge is {{Payment_total_4.monetaryValue}}, with a total fi
                                TXT],
                                ['when' => '(LoanAmount <= Payment_total_4) and (Fee_admin > 0 and subject3 == 2)', 'text' => 'Your total payment is {{Payment_total_4.monetaryValue}}, with a total finance charge of {{finalFinanceCharges_4.monetaryValue}}.'],
                                ['when' => '(LoanAmount <= Payment_total_4) and (Fee_rolled == 0 and Fee_admin > 0 and subject3 == 2)', 'text' => <<<'TXT'
                                Your total payment is {{Payment_total_4.monetaryValue}}, which consists of an interest payment of {{interestPayment_4.monetaryValue}} and additional fees of {{Fee_pre_calc.monetaryValue}}. Therefore, the total finance charge is {{finalFinanceCharges_4.monetaryValue}}.
                                TXT],
                                ['when' => '(LoanAmount <= Payment_total_4) and (Fee_rolled == 0 and Fee_pre_calc == 0 Fee_admin_calc == 0)', 'text' => <<<'TXT'
                                The interest rate, which is equal to the APR, is {{APR4.formattedValue}}%, and the effective&nbsp;APR that accounts for the compounding frequency as well is {{APR4_effective.formattedValue}}%
                                TXT],
                                ['when' => '(LoanAmount <= Payment_total_4) and (Fee_rolled == 0 and Fee_pre_calc > 0 Fee_admin_calc == 0)', 'text' => <<<'TXT'
                                The interest rate is {{r_4.formattedValue}}%, and the APR is {{APR4.formattedValue}}%**. The effective&nbsp;APR that accounts for the compounding frequency as well is {{APR4_effective.formattedValue}}%.
                                TXT],
                                ['when' => '(LoanAmount <= Payment_total_4) and (Fee_rolled > 0 and Fee_admin_calc == 0)', 'text' => 'The APR is {{APR4.formattedValue}}%. The effective&nbsp;APR that accounts for the compounding frequency as well is {{APR4_effective.formattedValue}}%.'],
                                ['when' => '(LoanAmount <= Payment_total_4) and (Fee_rolled == 0 and Fee_admin_calc > 0 and subject3 == 1)', 'text' => 'The APR is {{APR4.formattedValue}}%. The effective&nbsp;APR that accounts for the compounding frequency as well is {{APR4_effective.formattedValue}}%.'],
                                ['when' => '(LoanAmount <= Payment_total_4) and (Fee_admin > 0 and subject3 == 2)', 'text' => 'The APR is {{APR4.formattedValue}}%. The effective&nbsp;APR that accounts for the compounding frequency as well is {{APR4_effective.formattedValue}}%.'],
                                ['when' => '(LoanAmount <= Payment_total_4) and (Fee_rolled == 0 and Fee_admin > 0 and subject3 == 2)', 'text' => <<<'TXT'
                                The interest rate is {{r_4.formattedValue}}%, and the APR is {{APR4.formattedValue}}%**. The effective&nbsp;APR that accounts for the compounding frequency as well is {{APR4_effective.formattedValue}}%.
                                TXT],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Hidden variable -- Results',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'LoanReceived',
                            'label' => 'Loan received',
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
                            'name' => 'Payment2',
                            'label' => 'Payment2',
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
                            'name' => 'Payment2_3',
                            'label' => 'Payment2 3',
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
                            'name' => 'Interest_total',
                            'label' => 'Interest total',
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
                            'name' => 'Interest_total_3',
                            'label' => 'Interest total 3',
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
                            'name' => 'finalPaymentTotal',
                            'label' => 'finalPaymentTotal',
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
                            'name' => 'finalPaymentTotal_4',
                            'label' => 'Final payment total 4',
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
                            'name' => 'total_finance_charge',
                            'label' => 'total_finance_charge',
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
                            'name' => 'APR',
                            'label' => 'APR',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'APR3',
                            'label' => 'APR3',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'APR4',
                            'label' => 'APR4',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'APR_effective',
                            'label' => 'APR effective',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'APR3_effective',
                            'label' => 'APR3 effective',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'APR4_effective',
                            'label' => 'APR4 effective',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
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
                    'columns' => 3,
                    'place' => [0, 1, 2],
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
                            'name' => 'Fee_rolled',
                            'label' => 'Loaned fee Fee_rolled',
                            'type' => 'number',
                            'help' => 'Rolled into the loan, and paid with the periodic installments – usually, banks calculate interest on this fee and include it in the APR.',
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
                            'name' => 'Fee_annual_abs',
                            'label' => 'Annual fee',
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
                            'name' => 'Fee_annual_per',
                            'label' => 'Annual fee',
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
                            'name' => 'Payment_total',
                            'label' => 'Payment total',
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
                            'name' => 'fee_amount',
                            'label' => 'Fee amount',
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
                            'name' => 'ir',
                            'label' => 'ir',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
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
                            'name' => 'Payment_fee',
                            'label' => 'Payment fee',
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
                            'name' => 'LoanAmount_fee',
                            'label' => 'Loan amount fee',
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
                            'name' => 'FinCharges',
                            'label' => 'Fin charges',
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
                            'name' => 'Fee_total',
                            'label' => 'Fee_total',
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
                            'name' => 'Interest_fee',
                            'label' => 'Interest fee',
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
                            'name' => 'AdminFee',
                            'label' => 'AdminFee',
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
                            'name' => 'Interest_3',
                            'label' => 'Interest 3',
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
                            'name' => 'Interest_admin',
                            'label' => 'Interest admin',
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
                            'name' => 'Payment_admin',
                            'label' => 'Payment admin',
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
                            'name' => 'paymentFeePeriod2',
                            'label' => 'Payment fee period2',
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
                            'name' => 'paymentFeePeriod',
                            'label' => 'Payment fee period',
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
                            'name' => 'Interes_loan',
                            'label' => 'Interes loan',
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
                            'name' => 'Payment2_old',
                            'label' => 'Payment2 old',
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
                            'name' => 'origination_fee_sub3_2',
                            'label' => 'Origination fee sub3 2',
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
                            'name' => 'Fee_total3',
                            'label' => 'Fee total3',
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
                            'name' => 'APR_effective_sel2',
                            'label' => 'Apr effective sel2',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'LoanAmount_2_2',
                            'label' => 'Loan amount 2 2',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'FinCharges_2_2',
                            'label' => 'Fin charges 2 2',
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
                            'name' => 'Payment_total_2_2',
                            'label' => 'Payment total 2 2',
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
                            'name' => 'Fee_pre_calc',
                            'label' => 'Fee pre calc',
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
                            'name' => 'Payment_apr',
                            'label' => 'Payment apr',
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
                            'name' => 'fee_apr',
                            'label' => 'Fee apr',
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
                            'name' => 'finalPaymentTotal_3_1',
                            'label' => 'Final payment total 3 1',
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
                            'name' => 'get_finalFinanceCharges_3_2',
                            'label' => 'Get final finance charges 3 2',
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
                            'name' => 'Fee_total_3_1',
                            'label' => 'Fee total 3 1',
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
                            'name' => 'Payment_total_4',
                            'label' => 'Payment total 4',
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
                            'name' => 'finalFinanceCharges_4',
                            'label' => 'Final finance charges 4',
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
                            'name' => 'Fee_admin_calc',
                            'label' => 'Fee admin calc',
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
                            'name' => 'interestPayment_4',
                            'label' => 'Interest payment 4',
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
                            'name' => 'r_4',
                            'label' => 'R 4',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Fee_additional_4',
                            'label' => 'Fee additional 4',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'fee_amount = Fee_admin * LoanAmount',
            'results' => ['fee_amount' => 'Fee_admin*LoanAmount', 'LoanAmount' => 'fee_amount/Fee_admin', 'Fee_admin' => 'fee_amount/LoanAmount'],
        ],
        [
            'title' => 'ir = get_ir(subject2, apr, interest_rate)',
            'results' => ['ir' => 'get_ir(subject2, apr, interest_rate)'],
        ],
        [
            'title' => 'eq_p = one_way((1 + ir / m) ^ (m / payment_frequency) - 1)',
            'results' => ['eq_p' => '(pow((m + get_ir(subject2, apr, interest_rate))/m, m/payment_frequency) - 1)'],
        ],
        [
            'title' => 'periods = payment_frequency * term',
            'results' => ['payment_frequency' => 'periods/term', 'term' => 'periods/payment_frequency', 'periods' => 'payment_frequency*term'],
        ],
        [
            'title' => 'Fee_rolled = get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input)',
            'results' => ['Fee_rolled' => 'get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input)'],
        ],
        [
            'title' => <<<'TXT'
            Payment2 = get_Payment2(LoanAmount, LoanAmount_2_2, eq_p, periods, Fee_rolled, subject3, subject2, fee_amount, LoanAmount_fee, interest_rate, apr, m, payment_frequency)
            TXT,
            'results' => ['Payment2' => <<<'TXT'
            get_Payment2(LoanAmount, (LoanAmount - (Fee_admin*LoanAmount)), (pow((m + get_ir(subject2, apr, interest_rate))/m, m/payment_frequency) - 1), periods, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), subject3, subject2, fee_amount, get_LoanAmountFee(LoanAmount, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), subject2), interest_rate, apr, m, payment_frequency)
            TXT],
        ],
        [
            'title' => 'Payment2_3 = get_payment2_3(apr, interest_rate, m, payment_frequency, LoanAmount, periods)',
            'results' => ['Payment2_3' => 'get_payment2_3(apr, interest_rate, m, payment_frequency, LoanAmount, periods)'],
        ],
        [
            'title' => 'LoanAmount_fee = get_LoanAmountFee(LoanAmount, Fee_rolled, subject2)',
            'results' => ['LoanAmount_fee' => 'get_LoanAmountFee(LoanAmount, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), subject2)'],
        ],
        [
            'title' => 'Interest_total = one_way(Payment_fee * periods - LoanAmount_fee)',
            'results' => ['Interest_total' => <<<'TXT'
            (periods*get_Payment_fee(subject2, LoanAmount, get_LoanAmountFee(LoanAmount, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), subject2), get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), Payment, periods, payment_frequency, (pow((m + get_ir(subject2, apr, interest_rate))/m, m/payment_frequency) - 1)) - get_LoanAmountFee(LoanAmount, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), subject2))
            TXT],
        ],
        [
            'title' => 'Interest_total_3 = get_interest_total_3(apr, interest_rate, m, payment_frequency, LoanAmount, periods)',
            'results' => ['Interest_total_3' => 'get_interest_total_3(apr, interest_rate, m, payment_frequency, LoanAmount, periods)'],
        ],
        [
            'title' => 'Payment_fee = get_Payment_fee(subject2, LoanAmount, LoanAmount_fee, Fee_rolled, Payment, periods, payment_frequency, eq_p)',
            'results' => ['Payment_fee' => <<<'TXT'
            get_Payment_fee(subject2, LoanAmount, get_LoanAmountFee(LoanAmount, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), subject2), get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), Payment, periods, payment_frequency, (pow((m + get_ir(subject2, apr, interest_rate))/m, m/payment_frequency) - 1))
            TXT],
        ],
        [
            'title' => <<<'TXT'
            Payment_total = get_Payment_total(Payment_fee, periods, Fee_pre, subject2, Payment, subject3, LoanAmount, Fee_rolled, fee_amount, Fee_pre_noapr, interest_rate, apr)
            TXT,
            'results' => ['Payment_total' => <<<'TXT'
            get_Payment_total(get_Payment_fee(subject2, LoanAmount, get_LoanAmountFee(LoanAmount, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), subject2), get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), Payment, periods, payment_frequency, (pow((m + get_ir(subject2, apr, interest_rate))/m, m/payment_frequency) - 1)), periods, Fee_pre, subject2, Payment, subject3, LoanAmount, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), fee_amount, Fee_pre_noapr, interest_rate, apr)
            TXT],
        ],
        [
            'title' => 'finalPaymentTotal = get_finalPaymentTotal(Payment_total, fee_amount, subject3)',
            'results' => ['finalPaymentTotal' => <<<'TXT'
            get_finalPaymentTotal(get_Payment_total(get_Payment_fee(subject2, LoanAmount, get_LoanAmountFee(LoanAmount, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), subject2), get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), Payment, periods, payment_frequency, (pow((m + get_ir(subject2, apr, interest_rate))/m, m/payment_frequency) - 1)), periods, Fee_pre, subject2, Payment, subject3, LoanAmount, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), fee_amount, Fee_pre_noapr, interest_rate, apr), fee_amount, subject3)
            TXT],
        ],
        [
            'title' => 'finalPaymentTotal_4 = get_finalPaymentTotal_4(Payment, periods, LoanAmount, Fee_rolled)',
            'results' => ['finalPaymentTotal_4' => 'get_finalPaymentTotal_4(Payment, periods, LoanAmount, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input))'],
        ],
        [
            'title' => 'FinCharges = one_way(Payment_total - LoanReceived)',
            'results' => ['FinCharges' => <<<'TXT'
            (-get_LoanReceived(LoanAmount, fee_amount, subject3) + get_Payment_total(get_Payment_fee(subject2, LoanAmount, get_LoanAmountFee(LoanAmount, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), subject2), get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), Payment, periods, payment_frequency, (pow((m + get_ir(subject2, apr, interest_rate))/m, m/payment_frequency) - 1)), periods, Fee_pre, subject2, Payment, subject3, LoanAmount, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), fee_amount, Fee_pre_noapr, interest_rate, apr))
            TXT],
        ],
        [
            'title' => 'LoanReceived = get_LoanReceived(LoanAmount, fee_amount, subject3)',
            'results' => ['LoanReceived' => 'get_LoanReceived(LoanAmount, fee_amount, subject3)'],
        ],
        [
            'title' => 'total_finance_charge = get_finalFinanceCharges(FinCharges, fee_amount, subject3)',
            'results' => ['total_finance_charge' => <<<'TXT'
            get_finalFinanceCharges((-get_LoanReceived(LoanAmount, fee_amount, subject3) + get_Payment_total(get_Payment_fee(subject2, LoanAmount, get_LoanAmountFee(LoanAmount, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), subject2), get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), Payment, periods, payment_frequency, (pow((m + get_ir(subject2, apr, interest_rate))/m, m/payment_frequency) - 1)), periods, Fee_pre, subject2, Payment, subject3, LoanAmount, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), fee_amount, Fee_pre_noapr, interest_rate, apr)), fee_amount, subject3)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            APR = get_APR(Payment_fee, Fee_pre, LoanReceived, periods, payment_frequency, m, LoanAmount, subject2, subject3, Fee_rolled, fee_amount, Fee_pre_noapr, Payment, interest_rate, apr )
            TXT,
            'results' => ['APR' => <<<'TXT'
            get_APR(get_Payment_fee(subject2, LoanAmount, get_LoanAmountFee(LoanAmount, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), subject2), get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), Payment, periods, payment_frequency, (pow((m + get_ir(subject2, apr, interest_rate))/m, m/payment_frequency) - 1)), Fee_pre, get_LoanReceived(LoanAmount, fee_amount, subject3), periods, payment_frequency, m, LoanAmount, subject2, subject3, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), fee_amount, Fee_pre_noapr, Payment, interest_rate, apr)
            TXT],
        ],
        [
            'title' => 'APR3 = get_APR3(LoanAmount, Fee_pre_noapr, Payment, interest_rate, apr, m, payment_frequency, periods)',
            'results' => ['APR3' => 'get_APR3(LoanAmount, Fee_pre_noapr, Payment, interest_rate, apr, m, payment_frequency, periods)'],
        ],
        [
            'title' => 'APR4 = get_APR4(LoanAmount, Payment, Fee_rolled, Fee_pre, m, payment_frequency, periods)',
            'results' => ['APR4' => 'get_APR4(LoanAmount, Payment, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), Fee_pre, m, payment_frequency, periods)'],
        ],
        [
            'title' => 'APR_effective = get_APR_effective(APR, m)',
            'results' => ['APR_effective' => <<<'TXT'
            get_APR_effective(get_APR(get_Payment_fee(subject2, LoanAmount, get_LoanAmountFee(LoanAmount, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), subject2), get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), Payment, periods, payment_frequency, (pow((m + get_ir(subject2, apr, interest_rate))/m, m/payment_frequency) - 1)), Fee_pre, get_LoanReceived(LoanAmount, fee_amount, subject3), periods, payment_frequency, m, LoanAmount, subject2, subject3, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), fee_amount, Fee_pre_noapr, Payment, interest_rate, apr), m)
            TXT],
        ],
        [
            'title' => 'APR3_effective = get_APR3_effective(LoanAmount, Fee_pre_noapr, Payment, interest_rate, apr, m, payment_frequency, periods)',
            'results' => ['APR3_effective' => 'get_APR3_effective(LoanAmount, Fee_pre_noapr, Payment, interest_rate, apr, m, payment_frequency, periods)'],
        ],
        [
            'title' => 'APR4_effective = get_APR4_effective(LoanAmount, Payment, Fee_rolled, Fee_pre, m, payment_frequency, periods)',
            'results' => ['APR4_effective' => <<<'TXT'
            get_APR4_effective(LoanAmount, Payment, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), Fee_pre, m, payment_frequency, periods)
            TXT],
        ],
        [
            'title' => 'Fee_total = get_fee_total(LoanReceived, Payment_fee, periods, Fee_pre_calc, Payment2, LoanAmount)',
            'results' => ['Fee_total' => <<<'TXT'
            get_fee_total(get_LoanReceived(LoanAmount, fee_amount, subject3), get_Payment_fee(subject2, LoanAmount, get_LoanAmountFee(LoanAmount, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), subject2), get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), Payment, periods, payment_frequency, (pow((m + get_ir(subject2, apr, interest_rate))/m, m/payment_frequency) - 1)), periods, get_calculateFeePre(get_Payment_fee(subject2, LoanAmount, get_LoanAmountFee(LoanAmount, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), subject2), get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), Payment, periods, payment_frequency, (pow((m + get_ir(subject2, apr, interest_rate))/m, m/payment_frequency) - 1)), Fee_pre, get_LoanReceived(LoanAmount, fee_amount, subject3), periods, payment_frequency, m, LoanAmount, subject2, subject3, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), (Fee_admin*LoanAmount), Fee_pre_noapr, Payment, interest_rate, apr), get_Payment2(LoanAmount, (LoanAmount - (Fee_admin*LoanAmount)), (pow((m + get_ir(subject2, apr, interest_rate))/m, m/payment_frequency) - 1), periods, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), subject3, subject2, fee_amount, get_LoanAmountFee(LoanAmount, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), subject2), interest_rate, apr, m, payment_frequency), LoanAmount)
            TXT],
        ],
        [
            'title' => 'Interest_fee = get_interest_fee(Payment_fee, periods, Payment2_old, LoanAmount, LoanAmount_fee)',
            'results' => ['Interest_fee' => <<<'TXT'
            get_interest_fee(get_Payment_fee(subject2, LoanAmount, get_LoanAmountFee(LoanAmount, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), subject2), get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), Payment, periods, payment_frequency, (pow((m + get_ir(subject2, apr, interest_rate))/m, m/payment_frequency) - 1)), periods, get_Payment2_old(LoanAmount, (LoanAmount - (Fee_admin*LoanAmount)), (pow((m + get_ir(subject2, apr, interest_rate))/m, m/payment_frequency) - 1), periods, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), subject3, subject2, fee_amount, get_LoanAmountFee(LoanAmount, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), subject2), interest_rate, apr, m, payment_frequency), LoanAmount, get_LoanAmountFee(LoanAmount, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), subject2))
            TXT],
        ],
        [
            'title' => 'Payment_admin = get_Payment_admin(AdminFee, periods, subject2, interest_rate, apr, m, payment_frequency )',
            'results' => ['Payment_admin' => 'get_Payment_admin((Fee_admin*LoanAmount), periods, subject2, interest_rate, apr, m, payment_frequency)'],
        ],
        [
            'title' => 'paymentFeePeriod2 = one_way(Payment_fee - Payment2_old - Payment_admin)',
            'results' => ['paymentFeePeriod2' => <<<'TXT'
            (-get_Payment2_old(LoanAmount, (LoanAmount - (Fee_admin*LoanAmount)), (pow((m + get_ir(subject2, apr, interest_rate))/m, m/payment_frequency) - 1), periods, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), subject3, subject2, fee_amount, get_LoanAmountFee(LoanAmount, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), subject2), interest_rate, apr, m, payment_frequency) - get_Payment_admin((Fee_admin*LoanAmount), periods, subject2, interest_rate, apr, m, payment_frequency) + get_Payment_fee(subject2, LoanAmount, get_LoanAmountFee(LoanAmount, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), subject2), get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), Payment, periods, payment_frequency, (pow((m + get_ir(subject2, apr, interest_rate))/m, m/payment_frequency) - 1)))
            TXT],
        ],
        [
            'title' => 'Interest_admin = one_way(Payment_admin * periods - AdminFee)',
            'results' => ['Interest_admin' => '(periods*get_Payment_admin((Fee_admin*LoanAmount), periods, subject2, interest_rate, apr, m, payment_frequency) - (Fee_admin*LoanAmount))'],
        ],
        [
            'title' => 'Interest_3 = one_way(Interest_fee - Interest_admin)',
            'results' => ['Interest_3' => <<<'TXT'
            (get_interest_fee(get_Payment_fee(subject2, LoanAmount, get_LoanAmountFee(LoanAmount, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), subject2), get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), Payment, periods, payment_frequency, (pow((m + get_ir(subject2, apr, interest_rate))/m, m/payment_frequency) - 1)), periods, get_Payment2_old(LoanAmount, (LoanAmount - (Fee_admin*LoanAmount)), (pow((m + get_ir(subject2, apr, interest_rate))/m, m/payment_frequency) - 1), periods, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), subject3, subject2, fee_amount, get_LoanAmountFee(LoanAmount, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), subject2), interest_rate, apr, m, payment_frequency), LoanAmount, get_LoanAmountFee(LoanAmount, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), subject2)) - (periods*get_Payment_admin((Fee_admin*LoanAmount), periods, subject2, interest_rate, apr, m, payment_frequency) - (Fee_admin*LoanAmount)))
            TXT],
        ],
        [
            'title' => 'AdminFee = one_way(LoanAmount * Fee_admin)',
            'results' => ['AdminFee' => '(Fee_admin*LoanAmount)'],
        ],
        [
            'title' => <<<'TXT'
            paymentFeePeriod = get_paymentFeePeriod(Fee_rolled, subject3, Payment_fee, Payment2_old, AdminFee, Payment_admin, subject2, interest_rate, apr, Fee_pre_noapr, m, payment_frequency, LoanAmount, periods, Payment)
            TXT,
            'results' => ['paymentFeePeriod' => <<<'TXT'
            get_paymentFeePeriod(get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), subject3, get_Payment_fee(subject2, LoanAmount, get_LoanAmountFee(LoanAmount, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), subject2), get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), Payment, periods, payment_frequency, (pow((m + get_ir(subject2, apr, interest_rate))/m, m/payment_frequency) - 1)), get_Payment2_old(LoanAmount, (LoanAmount - (Fee_admin*LoanAmount)), (pow((m + get_ir(subject2, apr, interest_rate))/m, m/payment_frequency) - 1), periods, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), subject3, subject2, fee_amount, get_LoanAmountFee(LoanAmount, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), subject2), interest_rate, apr, m, payment_frequency), (Fee_admin*LoanAmount), get_Payment_admin((Fee_admin*LoanAmount), periods, subject2, interest_rate, apr, m, payment_frequency), subject2, interest_rate, apr, Fee_pre_noapr, m, payment_frequency, LoanAmount, periods, Payment)
            TXT],
        ],
        [
            'title' => 'Interes_loan = get_interest_loan(LoanAmount, AdminFee, Payment2_old, periods, subject3, subject2)',
            'results' => ['Interes_loan' => <<<'TXT'
            get_interest_loan(LoanAmount, (Fee_admin*LoanAmount), get_Payment2_old(LoanAmount, (LoanAmount - (Fee_admin*LoanAmount)), (pow((m + get_ir(subject2, apr, interest_rate))/m, m/payment_frequency) - 1), periods, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), subject3, subject2, fee_amount, get_LoanAmountFee(LoanAmount, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), subject2), interest_rate, apr, m, payment_frequency), periods, subject3, subject2)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            Payment2_old = get_Payment2_old(LoanAmount, LoanAmount_2_2, eq_p, periods, Fee_rolled, subject3, subject2, fee_amount, LoanAmount_fee, interest_rate, apr, m, payment_frequency)
            TXT,
            'results' => ['Payment2_old' => <<<'TXT'
            get_Payment2_old(LoanAmount, (LoanAmount - (Fee_admin*LoanAmount)), (pow((m + get_ir(subject2, apr, interest_rate))/m, m/payment_frequency) - 1), periods, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), subject3, subject2, fee_amount, get_LoanAmountFee(LoanAmount, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), subject2), interest_rate, apr, m, payment_frequency)
            TXT],
        ],
        [
            'title' => 'origination_fee_sub3_2 = one_way(AdminFee + Interest_admin)',
            'results' => ['origination_fee_sub3_2' => <<<'TXT'
            ((Fee_admin*LoanAmount) + (periods*get_Payment_admin((Fee_admin*LoanAmount), periods, subject2, interest_rate, apr, m, payment_frequency) - (Fee_admin*LoanAmount)))
            TXT],
        ],
        [
            'title' => 'Fee_total3 = one_way(finalPaymentTotal - LoanReceived - Interest_total_3)',
            'results' => ['Fee_total3' => <<<'TXT'
            (-get_LoanReceived(LoanAmount, fee_amount, subject3) + get_finalPaymentTotal(get_Payment_total(get_Payment_fee(subject2, LoanAmount, get_LoanAmountFee(LoanAmount, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), subject2), get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), Payment, periods, payment_frequency, (pow((m + get_ir(subject2, apr, interest_rate))/m, m/payment_frequency) - 1)), periods, Fee_pre, subject2, Payment, subject3, LoanAmount, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), fee_amount, Fee_pre_noapr, interest_rate, apr), fee_amount, subject3) - get_interest_total_3(apr, interest_rate, m, payment_frequency, LoanAmount, periods))
            TXT],
        ],
        [
            'title' => 'LoanAmount_2_2 = one_way(LoanAmount - AdminFee)',
            'results' => ['LoanAmount_2_2' => '(LoanAmount - (Fee_admin*LoanAmount))'],
        ],
        [
            'title' => 'APR_effective_sel2 = ((1 + apr / m) ^ m) - 1',
            'results' => ['apr' => 'm*(pow(APR_effective_sel2 + 1, 1/m) - 1)', 'APR_effective_sel2' => 'pow((apr + m)/m, m) - 1'],
        ],
        [
            'title' => 'Payment_total_2_2 = one_way(Payment_total + AdminFee)',
            'results' => ['Payment_total_2_2' => <<<'TXT'
            (get_Payment_total(get_Payment_fee(subject2, LoanAmount, get_LoanAmountFee(LoanAmount, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), subject2), get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), Payment, periods, payment_frequency, (pow((m + get_ir(subject2, apr, interest_rate))/m, m/payment_frequency) - 1)), periods, Fee_pre, subject2, Payment, subject3, LoanAmount, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), fee_amount, Fee_pre_noapr, interest_rate, apr) + (Fee_admin*LoanAmount))
            TXT],
        ],
        [
            'title' => 'FinCharges_2_2 = one_way(FinCharges + AdminFee)',
            'results' => ['FinCharges_2_2' => <<<'TXT'
            ((Fee_admin*LoanAmount) + (-get_LoanReceived(LoanAmount, fee_amount, subject3) + get_Payment_total(get_Payment_fee(subject2, LoanAmount, get_LoanAmountFee(LoanAmount, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), subject2), get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), Payment, periods, payment_frequency, (pow((m + get_ir(subject2, apr, interest_rate))/m, m/payment_frequency) - 1)), periods, Fee_pre, subject2, Payment, subject3, LoanAmount, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), fee_amount, Fee_pre_noapr, interest_rate, apr)))
            TXT],
        ],
        [
            'title' => <<<'TXT'
            Fee_pre_calc = get_calculateFeePre(Payment_fee, Fee_pre, LoanReceived, periods, payment_frequency, m, LoanAmount, subject2, subject3, Fee_rolled, AdminFee, Fee_pre_noapr, Payment, interest_rate, apr)
            TXT,
            'results' => ['Fee_pre_calc' => <<<'TXT'
            get_calculateFeePre(get_Payment_fee(subject2, LoanAmount, get_LoanAmountFee(LoanAmount, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), subject2), get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), Payment, periods, payment_frequency, (pow((m + get_ir(subject2, apr, interest_rate))/m, m/payment_frequency) - 1)), Fee_pre, get_LoanReceived(LoanAmount, fee_amount, subject3), periods, payment_frequency, m, LoanAmount, subject2, subject3, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), (Fee_admin*LoanAmount), Fee_pre_noapr, Payment, interest_rate, apr)
            TXT],
        ],
        [
            'title' => 'fee_apr = get_fee_apr(subject2, interest_rate, apr, m, payment_frequency, periods, LoanAmount)',
            'results' => ['fee_apr' => 'get_fee_apr(subject2, interest_rate, apr, m, payment_frequency, periods, LoanAmount)'],
        ],
        [
            'title' => 'finalPaymentTotal_3_1 = one_way(Payment_apr * periods + Fee_pre_noapr)',
            'results' => ['finalPaymentTotal_3_1' => '(Fee_pre_noapr + periods*get_Payment_apr(LoanAmount, subject2, interest_rate, apr, m, payment_frequency, periods))'],
        ],
        [
            'title' => 'get_finalFinanceCharges_3_2 = one_way(Payment_apr * periods - LoanAmount + Fee_pre_noapr)',
            'results' => ['get_finalFinanceCharges_3_2' => '(Fee_pre_noapr - LoanAmount + periods*get_Payment_apr(LoanAmount, subject2, interest_rate, apr, m, payment_frequency, periods))'],
        ],
        [
            'title' => 'Payment_apr = get_Payment_apr(LoanAmount, subject2, interest_rate, apr, m, payment_frequency, periods)',
            'results' => ['Payment_apr' => 'get_Payment_apr(LoanAmount, subject2, interest_rate, apr, m, payment_frequency, periods)'],
        ],
        [
            'title' => 'Fee_total_3_1 = one_way(Payment_apr * periods - LoanAmount - Interest_total_3 + Fee_pre_noapr)',
            'results' => ['Fee_total_3_1' => <<<'TXT'
            (Fee_pre_noapr - LoanAmount + periods*get_Payment_apr(LoanAmount, subject2, interest_rate, apr, m, payment_frequency, periods) - get_interest_total_3(apr, interest_rate, m, payment_frequency, LoanAmount, periods))
            TXT],
        ],
        [
            'title' => 'Payment_total_4 = one_way(Payment_total + Fee_pre_calc)',
            'results' => ['Payment_total_4' => <<<'TXT'
            (get_Payment_total(get_Payment_fee(subject2, LoanAmount, get_LoanAmountFee(LoanAmount, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), subject2), get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), Payment, periods, payment_frequency, (pow((m + get_ir(subject2, apr, interest_rate))/m, m/payment_frequency) - 1)), periods, Fee_pre, subject2, Payment, subject3, LoanAmount, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), fee_amount, Fee_pre_noapr, interest_rate, apr) + get_calculateFeePre(get_Payment_fee(subject2, LoanAmount, get_LoanAmountFee(LoanAmount, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), subject2), get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), Payment, periods, payment_frequency, (pow((m + get_ir(subject2, apr, interest_rate))/m, m/payment_frequency) - 1)), Fee_pre, get_LoanReceived(LoanAmount, fee_amount, subject3), periods, payment_frequency, m, LoanAmount, subject2, subject3, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), (Fee_admin*LoanAmount), Fee_pre_noapr, Payment, interest_rate, apr))
            TXT],
        ],
        [
            'title' => 'finalFinanceCharges_4 = one_way(Payment_total - LoanAmount + Fee_pre_calc)',
            'results' => ['finalFinanceCharges_4' => <<<'TXT'
            (-LoanAmount + get_Payment_total(get_Payment_fee(subject2, LoanAmount, get_LoanAmountFee(LoanAmount, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), subject2), get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), Payment, periods, payment_frequency, (pow((m + get_ir(subject2, apr, interest_rate))/m, m/payment_frequency) - 1)), periods, Fee_pre, subject2, Payment, subject3, LoanAmount, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), fee_amount, Fee_pre_noapr, interest_rate, apr) + get_calculateFeePre(get_Payment_fee(subject2, LoanAmount, get_LoanAmountFee(LoanAmount, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), subject2), get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), Payment, periods, payment_frequency, (pow((m + get_ir(subject2, apr, interest_rate))/m, m/payment_frequency) - 1)), Fee_pre, get_LoanReceived(LoanAmount, fee_amount, subject3), periods, payment_frequency, m, LoanAmount, subject2, subject3, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), (Fee_admin*LoanAmount), Fee_pre_noapr, Payment, interest_rate, apr))
            TXT],
        ],
        [
            'title' => 'interestPayment_4 = one_way(Payment_total - LoanAmount)',
            'results' => ['interestPayment_4' => <<<'TXT'
            (-LoanAmount + get_Payment_total(get_Payment_fee(subject2, LoanAmount, get_LoanAmountFee(LoanAmount, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), subject2), get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), Payment, periods, payment_frequency, (pow((m + get_ir(subject2, apr, interest_rate))/m, m/payment_frequency) - 1)), periods, Fee_pre, subject2, Payment, subject3, LoanAmount, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), fee_amount, Fee_pre_noapr, interest_rate, apr))
            TXT],
        ],
        [
            'title' => 'Fee_additional_4 = one_way(Fee_pre_calc + AdminFee)',
            'results' => ['Fee_additional_4' => <<<'TXT'
            (get_calculateFeePre(get_Payment_fee(subject2, LoanAmount, get_LoanAmountFee(LoanAmount, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), subject2), get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), Payment, periods, payment_frequency, (pow((m + get_ir(subject2, apr, interest_rate))/m, m/payment_frequency) - 1)), Fee_pre, get_LoanReceived(LoanAmount, fee_amount, subject3), periods, payment_frequency, m, LoanAmount, subject2, subject3, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), (Fee_admin*LoanAmount), Fee_pre_noapr, Payment, interest_rate, apr) + (Fee_admin*LoanAmount))
            TXT],
        ],
        [
            'title' => 'Fee_admin_calc = get_fee_admin(Fee_admin, subject2)',
            'results' => ['Fee_admin_calc' => 'get_fee_admin(Fee_admin, subject2)'],
        ],
        [
            'title' => 'r_4 = get_r4(subject2, LoanAmount, Payment, periods, payment_frequency, eq_p, m, interest_rate)',
            'results' => ['r_4' => <<<'TXT'
            get_r4(subject2, LoanAmount, Payment, periods, payment_frequency, (pow((m + get_ir(subject2, apr, interest_rate))/m, m/payment_frequency) - 1), m, interest_rate)
            TXT],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("get_r4",function(subject2,LoanAmount,Payment,periods,q,eq_p,m,r){var r_=r;if(subject2===4){var new_r_eq=0.1;var old_r_eq;var iteration=0;var MIN_PRECISION=1e-10;var MAX_ITERATIONS=100;do{old_r_eq=new_r_eq;var dividend_r_eq=Payment*periods-Payment*periods*Math.pow(1+new_r_eq,-periods)-new_r_eq*LoanAmount*periods;var divisor_r_eq=Payment*periods*periods*Math.pow(1+new_r_eq,-periods-1)-periods*LoanAmount;new_r_eq=new_r_eq-dividend_r_eq/divisor_r_eq;iteration++}while(Math.abs(old_r_eq-new_r_eq)>MIN_PRECISION&&iteration<=MAX_ITERATIONS);var r_eq=new_r_eq*q;r_=m*(mathjs.pow((q+r_eq)/q,q/m)-1)}return r_});omni.define("get_fee_admin",function(Fee_admin,subject2){var Fee_admin_=Fee_admin;if(subject2==4){Fee_admin_=0}return Fee_admin_});omni.define("get_Payment_apr",function(LoanAmount,subject2,r,apr,m,q,periods){var Payment_apr=null;if(m===0||q===0||periods===0){return null}if(isNaN(LoanAmount)||isNaN(m)||isNaN(q)||isNaN(periods)||isNaN(apr)){return null}var eq_p_apr=Math.pow(1+apr/m,m/q)-1;console.log("eq_p_apr:",eq_p_apr);if(isNaN(eq_p_apr)||eq_p_apr<=0){return null}var denominator=Math.pow(1+eq_p_apr,periods)-1;if(denominator===0){return null}Payment_apr=LoanAmount*eq_p_apr*Math.pow(1+eq_p_apr,periods)/denominator;return Payment_apr});omni.define("get_fee_apr",function(subject2,r,apr,m,q,periods,LoanAmount){var fee_apr=null;if(subject2===3&&r<apr){var eq_p_r=mathjs.pow(1+r/m,m/q)-1;var eq_p_apr=mathjs.pow(1+apr/m,m/q)-1;var Payment_r=LoanAmount*eq_p_r*mathjs.pow(1+eq_p_r,periods)/(mathjs.pow(1+eq_p_r,periods)-1);var Payment_apr=LoanAmount*eq_p_apr*mathjs.pow(1+eq_p_apr,periods)/(mathjs.pow(1+eq_p_apr,periods)-1);fee_apr=Payment_apr-Payment_r}return fee_apr});omni.define("get_calculateFeePre",function(Payment_fee,Fee_pre,LoanReceived,periods,q,m,LoanAmount,subject2,subject3,Fee_rolled,AdminFee,Fee_pre_noapr,Payment,r,apr){var r_local=r;var apr_local=apr;var Fee_pre_noapr_local=Fee_pre_noapr;if(subject2===4){r_local=0;apr_local=0;Fee_pre_noapr_local=0}var Fee_pre_=calculateFeePre(subject2,subject3,LoanAmount,Fee_rolled,AdminFee,Fee_pre_noapr_local,Fee_pre,Payment,r_local,apr_local);return Fee_pre_});omni.define("get_interest_loan",function(LoanAmount,AdminFee,Payment2_old,periods,subject3,subject2){var LoanAmount_=LoanAmount;if(subject3===2&&subject2===2){LoanAmount_=LoanAmount-AdminFee}var Interes_loan=Payment2_old*periods-LoanAmount_;return Interes_loan});omni.define("get_Payment_admin",function(AdminFee,periods,subject2,r,apr,m,q){var ir;if(subject2==2){ir=apr}else if(subject2==1){ir=r}var eq_p=Math.pow(1+ir/m,m/q)-1;var Payment_admin=AdminFee*eq_p*Math.pow(1+eq_p,periods)/(Math.pow(1+eq_p,periods)-1);if(subject2===3&&r<apr){var eq_p_r=mathjs.pow(1+r/m,m/q)-1;Payment_admin=AdminFee*eq_p_r*mathjs.pow(1+eq_p_r,periods)/(mathjs.pow(1+eq_p_r,periods)-1)}return Payment_admin});omni.define("get_paymentFeePeriod",function(Fee_rolled,subject3,Payment_fee,Payment2,AdminFee,Payment_admin,subject2,r,apr,Fee_pre_noapr,m,q,LoanAmount,periods,Payment){var paymentFeePeriod=0;if(subject2<3){if(Fee_rolled>0&&subject3!==2){paymentFeePeriod=Payment_fee-Payment2}else if(Fee_rolled-AdminFee===0&&subject3===2&&AdminFee>0){paymentFeePeriod=Payment_admin}else if(Fee_rolled-AdminFee>0&&subject3===2&&AdminFee>0){paymentFeePeriod=Payment_fee-Payment2}}else if(subject2===3&&r<apr){if(Fee_pre_noapr>0){var eq_p_r=Math.pow(1+r/m,m/q)-1;var eq_p_apr=mathjs.pow(1+apr/m,m/q)-1;var Payment_r=LoanAmount*eq_p_r*Math.pow(1+eq_p_r,periods)/(Math.pow(1+eq_p_r,periods)-1);var Payment_apr=LoanAmount*eq_p_apr*mathjs.pow(1+eq_p_apr,periods)/(mathjs.pow(1+eq_p_apr,periods)-1);paymentFeePeriod=Payment_apr-Payment_r}}else if(subject2===4){paymentFeePeriod=Payment_fee-Payment}return paymentFeePeriod});omni.define("get_interest_fee",function(Payment_fee,periods,Payment2,LoanAmount,LoanAmount_fee){var Interes_loan=Payment2*periods-LoanAmount;var Interest_total=Payment_fee*periods-LoanAmount_fee;var Interest_fee=Interest_total-Interes_loan;return Interest_fee});omni.define("get_fee_total",function(LoanReceived,Payment_fee,periods,Fee_pre,Payment2,LoanAmount){var Payment_total=Payment_fee*periods+Fee_pre;var Interes_loan=Payment2*periods-LoanAmount;var Fee_total=Payment_total-LoanReceived-Interes_loan;return Fee_total});omni.define("get_APR_effective",function(APR,m){var APR_effective=Math.pow(1+APR/m,m)-1;return APR_effective});omni.define("get_APR3",function(LoanAmount,Fee_pre_noapr,Payment,r,apr,m,q,periods){var APR3=calculate_APR3(LoanAmount,Fee_pre_noapr,Payment,r,apr,m,q,periods).APR;return APR3});omni.define("get_APR4",function(LoanAmount,Payment,Fee_rolled,Fee_pre,m,q,periods){var APR4=calculate_APR4(LoanAmount,Payment,Fee_rolled,Fee_pre,m,q,periods).APR;return APR4});omni.define("get_APR4_effective",function(LoanAmount,Payment,Fee_rolled,Fee_pre,m,q,periods){var APR4_effective=calculate_APR4(LoanAmount,Payment,Fee_rolled,Fee_pre,m,q,periods).APR_effective;return APR4_effective});omni.define("get_APR3_effective",function(LoanAmount,Fee_pre_noapr,Payment,r,apr,m,q,periods){var APR3_effective=calculate_APR3(LoanAmount,Fee_pre_noapr,Payment,r,apr,m,q,periods).APR_effective;return APR3_effective});omni.define("get_APR",function(Payment_fee,Fee_pre,LoanReceived,periods,q,m,LoanAmount,subject2,subject3,Fee_rolled,AdminFee,Fee_pre_noapr,Payment,r,apr){var old_APR_eq;var new_APR_eq=0.1;var iteration=0;var MIN_PRECISION=1e-6;var MAX_ITERATIONS=5000;var r_local=r;var apr_local=apr;var Fee_pre_noapr_local=Fee_pre_noapr;if(subject2===4){r_local=0;apr_local=0;Fee_pre_noapr_local=0}var Fee_pre_=calculateFeePre(subject2,subject3,LoanAmount,Fee_rolled,AdminFee,Fee_pre_noapr_local,Fee_pre,Payment,r_local,apr_local);var periodsPow=function periodsPow(rate,power){return Math.pow(1+rate,power)};do{old_APR_eq=new_APR_eq;var powMinusPeriods=periodsPow(new_APR_eq,-periods);var powMinusPeriodsMinus1=periodsPow(new_APR_eq,-periods-1);var dividend_APR_eq=Payment_fee*periods+Fee_pre_-Payment_fee*periods*powMinusPeriods-Fee_pre_*powMinusPeriods-new_APR_eq*LoanReceived*periods;var divisor_APR=Payment_fee*periods*periods*powMinusPeriodsMinus1+Fee_pre_*periods*powMinusPeriodsMinus1-periods*LoanReceived;new_APR_eq=new_APR_eq-dividend_APR_eq/divisor_APR;++iteration}while(Math.abs(old_APR_eq-new_APR_eq)>MIN_PRECISION&&iteration<=MAX_ITERATIONS);var APR_eq=new_APR_eq*q;var APR=m*(Math.pow((q+APR_eq)/q,q/m)-1);if(subject2===3&&r_local<apr_local){APR=calculate_APR3(LoanAmount,Fee_pre_noapr_local,Payment,r_local,apr_local,m,q,periods).APR}return APR});omni.define("get_LoanReceived",function(LoanAmount,AdminFee,select3){var LoanReceived=LoanAmount;if(select3===1){LoanReceived=LoanAmount-AdminFee}return LoanReceived});omni.define("get_finalFinanceCharges",function(FinCharges,AdminFee,subject3){var finalFinanceCharges=FinCharges;if(subject3===2){finalFinanceCharges=FinCharges+AdminFee}return finalFinanceCharges});omni.define("get_Payment_total",function(Payment_fee,periods,Fee_pre,subject2,Payment,subject3,LoanAmount,Fee_rolled,AdminFee,Fee_pre_noapr,r,apr){var Fee_pre_=calculateFeePre(subject2,subject3,LoanAmount,Fee_rolled,AdminFee,Fee_pre_noapr,Fee_pre,Payment,r,apr);var Payment_total=Payment_fee*periods+Fee_pre_;if(subject2===4){Payment_total=Payment*periods}return Payment_total});omni.define("get_finalPaymentTotal",function(Payment_total,AdminFee,subject3){var finalPaymentTotal=Payment_total;if(subject3===2){finalPaymentTotal=Payment_total+AdminFee}return finalPaymentTotal});omni.define("get_finalPaymentTotal_4",function(Payment,periods,LoanAmount,Fee_rolled){var finalPaymentTotal_4=calculate_finalPaymentTotal_4(Payment,periods,LoanAmount,Fee_rolled);return finalPaymentTotal_4});omni.define("get_Payment_fee",function(subject2,LoanAmount,LoanAmount_fee,Fee_rolled,Payment,periods,q,eq_p){var Payment_fee=LoanAmount_fee*eq_p*Math.pow(1+eq_p,periods)/(Math.pow(1+eq_p,periods)-1);if(subject2===4){var _LoanAmount_fee=LoanAmount+Fee_rolled;var new_r_eq=0.1;var old_r_eq;var iteration=0;var MIN_PRECISION=1e-10;var MAX_ITERATIONS=100;do{old_r_eq=new_r_eq;var dividend_r_eq=Payment*periods-Payment*periods*Math.pow(1+new_r_eq,-periods)-new_r_eq*LoanAmount*periods;var divisor_r_eq=Payment*periods*periods*Math.pow(1+new_r_eq,-periods-1)-periods*LoanAmount;new_r_eq=new_r_eq-dividend_r_eq/divisor_r_eq;iteration++}while(Math.abs(old_r_eq-new_r_eq)>MIN_PRECISION&&iteration<=MAX_ITERATIONS);var r_eq=new_r_eq*q;var APR_eq=r_eq;Payment_fee=_LoanAmount_fee*(APR_eq/q)*Math.pow(1+APR_eq/q,periods)/(Math.pow(1+APR_eq/q,periods)-1)}return Payment_fee});omni.define("get_ir",function(subject2,apr,r){var ir=null;if(subject2==2){ir=apr}else if(subject2==1){ir=r}return ir});omni.define("get_Fee_rolled",function(subject2,subject3,r,apr,fee_amount,Fee_rolled_input){var Fee_rolled=Fee_rolled_input;if(subject3===2){Fee_rolled=Fee_rolled+fee_amount}if(subject2===2){Fee_rolled=0}if(subject2===2&&subject3===2){Fee_rolled=fee_amount}if(subject2===3&&r<apr){Fee_rolled=0}return Fee_rolled});omni.define("get_LoanAmountFee",function(LoanAmount,Fee_rolled,subject2){var LoanAmount_fee=LoanAmount;if(subject2===1){LoanAmount_fee=LoanAmount+Fee_rolled}else if(subject2===2){LoanAmount_fee=LoanAmount}else if(subject2===4){LoanAmount_fee=LoanAmount+Fee_rolled}return LoanAmount_fee});omni.define("get_Payment2_old",function(LoanAmount,LoanAmount_2_2,eq_p,periods,Fee_rolled,subject3,subject2,fee_amount,LoanAmount_fee,r,apr,m,q){var LoanAmount_=LoanAmount;if(subject2===2&&subject3===2){LoanAmount_=LoanAmount_2_2}var Payment2_old=LoanAmount_*eq_p*mathjs.pow(1+eq_p,periods)/(mathjs.pow(1+eq_p,periods)-1);return Payment2_old});omni.define("get_Payment2",function(LoanAmount,LoanAmount_2_2,eq_p,periods,Fee_rolled,subject3,subject2,fee_amount,LoanAmount_fee,r,apr,m,q){var LoanAmount_=LoanAmount;if(subject2===2&&subject3===2){LoanAmount_=LoanAmount_2_2}var Payment_fee=LoanAmount_fee*eq_p*mathjs.pow(1+eq_p,periods)/(mathjs.pow(1+eq_p,periods)-1);var Payment2=LoanAmount_*eq_p*mathjs.pow(1+eq_p,periods)/(mathjs.pow(1+eq_p,periods)-1);var eq_p_apr=mathjs.pow(1+apr/m,m/q)-1;var Payment_apr=LoanAmount_*eq_p_apr*mathjs.pow(1+eq_p_apr,periods)/(mathjs.pow(1+eq_p_apr,periods)-1);if(subject2<3){if(Fee_rolled>0&&subject3!==2){Payment2=Payment_fee}if(Fee_rolled-fee_amount===0&&subject3===2&&fee_amount>0){Payment2=Payment_fee}if(Fee_rolled-fee_amount>0&&subject3===2&&fee_amount>0){Payment2=Payment_fee}}if(subject2===3&&r<apr){Payment2=Payment_apr}return Payment2});omni.define("get_payment2_3",function(apr,r,m,q,LoanAmount,periods){var payment2_3=calculate_payment2_3(apr,r,m,q,LoanAmount,periods).Payment2;return payment2_3});omni.define("get_interest_total_3",function(apr,r,m,q,LoanAmount,periods){var interest_total_3=calculate_payment2_3(apr,r,m,q,LoanAmount,periods).Interest_total;return interest_total_3});function calculateFeePre(select2,select3,LoanAmount,Fee_rolled,AdminFee,Fee_pre_noapr,Fee_pre,Payment,r,apr){var Fee_pre_calculated=Fee_pre;if(select3===3){Fee_pre_calculated+=AdminFee}if(select2===2){Fee_pre_calculated=Fee_pre_noapr}if(select2===3&&r<apr){Fee_pre_calculated=0}if(select2===3){Fee_pre_calculated=Fee_pre_noapr}if(select2===2&&Fee_pre_noapr===0){Fee_pre_calculated=0}return Fee_pre_calculated}function calculate_APR3(LoanAmount,Fee_pre_noapr,Payment,r,apr,m,q,periods){var MIN_PRECISION=1e-6;var MAX_ITERATIONS=5000;var eq_p_apr=Math.pow(1+apr/m,m/q)-1;var Payment_apr=LoanAmount*eq_p_apr*Math.pow(1+eq_p_apr,periods)/(Math.pow(1+eq_p_apr,periods)-1);var new_APR_eq=apr,old_APR_eq,iteration=0;do{old_APR_eq=new_APR_eq;var dividend_APR_eq2=Payment_apr*periods+Fee_pre_noapr-Payment_apr*periods*Math.pow(1+new_APR_eq,-periods)-Fee_pre_noapr*Math.pow(1+new_APR_eq,-periods)-new_APR_eq*LoanAmount*periods;var divisor_APR2=Payment_apr*periods*periods*Math.pow(1+new_APR_eq,-periods-1)+Fee_pre_noapr*periods*Math.pow(1+new_APR_eq,-periods-1)-periods*LoanAmount;new_APR_eq-=dividend_APR_eq2/divisor_APR2}while(Math.abs(old_APR_eq-new_APR_eq)>MIN_PRECISION&&iteration++<=MAX_ITERATIONS);var APR_eq=new_APR_eq*q;var APR=m*(Math.pow((q+APR_eq)/q,q/m)-1);var Payment2=Payment_apr;var APR_effective=Fee_pre_noapr>0?Math.pow(1+APR/m,m)-1:Math.pow(1+apr/m,m)-1;return{APR_eq:APR_eq,APR:APR,Payment2:Payment2,APR_effective:APR_effective}}function calculate_APR4(LoanAmount,Payment,Fee_rolled,Fee_pre,m,q,periods){var MIN_PRECISION=1e-6;var MAX_ITERATIONS=5000;var iteration=0;var old_r_eq;var new_r_eq=0.1;do{old_r_eq=new_r_eq;var dividend_r_eq=Payment*periods-Payment*periods*Math.pow(1+new_r_eq,-periods)-new_r_eq*LoanAmount*periods;var divisor_r_eq=Payment*periods*periods*Math.pow(1+new_r_eq,-periods-1)-periods*LoanAmount;new_r_eq=new_r_eq-dividend_r_eq/divisor_r_eq;++iteration}while(Math.abs(old_r_eq-new_r_eq)>MIN_PRECISION&&iteration<=MAX_ITERATIONS);var old_APR_eq;var new_APR_eq=0.1;do{old_APR_eq=new_APR_eq;var dividend_APR_eq3=Payment*periods+Fee_pre-Payment*periods*Math.pow(1+new_APR_eq,-periods)-Fee_pre*Math.pow(1+new_APR_eq,-periods)-new_APR_eq*LoanAmount*periods;var divisor_APR_eq3=Payment*periods*periods*Math.pow(1+new_APR_eq,-periods-1)+Fee_pre*periods*Math.pow(1+new_APR_eq,-periods-1)-periods*LoanAmount;new_APR_eq=new_APR_eq-dividend_APR_eq3/divisor_APR_eq3;++iteration}while(Math.abs(old_APR_eq-new_APR_eq)>MIN_PRECISION&&iteration<=MAX_ITERATIONS);var APR_eq=new_APR_eq*q;var APR_effective=m*(mathjs.pow((q+APR_eq)/q,q/m)-1);var APR=mathjs.pow(1+APR_effective/m,m)-1;return{APR_eq:APR_eq,APR:APR,APR_effective:APR_effective}}function calculate_payment2_3(apr,r,m,q,LoanAmount,periods){var eq_p_r=mathjs.pow(1+r/m,m/q)-1;var eq_p_apr=mathjs.pow(1+apr/m,m/q)-1;var Payment_r=LoanAmount*eq_p_r*mathjs.pow(1+eq_p_r,periods)/(mathjs.pow(1+eq_p_r,periods)-1);var Payment_apr=LoanAmount*eq_p_apr*mathjs.pow(1+eq_p_apr,periods)/(mathjs.pow(1+eq_p_apr,periods)-1);var Interest_total=Payment_r*periods-LoanAmount;var Payment2=Payment_apr;return{Payment2:Payment2,Interest_total:Interest_total}}function calculate_finalPaymentTotal_4(Payment,periods,LoanAmount,Fee_rolled){var Payment_total=Payment*periods;var finalPaymentTotal=Payment_total;return finalPaymentTotal}//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Loan turns Loan amount and Origination fee into Annual Percentage Rate (APR) and Loan term. The arithmetic is the whole method: annual Percentage Rate (APR) is worked out from loan amount by one formula, applied once. Annual Percentage Rate (APR) comes back in percent unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Loan calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Loan: it takes 2 numbers and reports Annual Percentage Rate (APR), Loan term and Payment frequency.</p><p>Written with the labels from the form, Fee amount = Origination fee × Loan amount.</p><p>What comes back is Annual Percentage Rate (APR), Loan term, Payment frequency and Loan received — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Loan amount</strong> — in USD. This is the full amount of the loan applied for. Note that the actual amount received may differ if any fee is financed by part of your loan.</li><li><strong>Origination fee</strong> — in percent. It is also called the administration fee, underwriting&amp;nbsp;fee, or processing&amp;nbsp;fee. Note that it is given as a percentage of the whole loan amount and that APR usually includes this fee.</li></ul><p>The result boxes are Annual Percentage Rate (APR) in percent, Loan term in years / months, Payment frequency, Loan received, Payment2, Payment2 3, Interest total, Interest total 3, finalPaymentTotal, Final payment total 4, total_finance_charge, APR, APR3, APR4, APR effective, APR3 effective, APR4 effective, Loaned fee Fee_rolled, Payment total, Fee amount, Eq p, ir, Periods, Payment fee, Loan amount fee, Fin charges, Fee_total, Interest fee, AdminFee, Interest 3, Interest admin, Payment admin, Payment fee period2, Payment fee period, Interes loan, Payment2 old, Origination fee sub3 2, Fee total3, Apr effective sel2, Loan amount 2 2, Fin charges 2 2, Payment total 2 2, Fee pre calc, Payment apr, Fee apr, Final payment total 3 1, Get final finance charges 3 2, Fee total 3 1, Payment total 4, Final finance charges 4, Fee admin calc, Interest payment 4, R 4, Fee additional 4; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, What interest rate do you know? = 1, Interest rate = 5 perc, Compound frequency = 44, Periodic payment = 150 USD, Prepaid fee = 200 USD, Loaned fee = 500 USD, Fees not in APR = 7 USD and Origination fee repayment = 1; the answers are <strong>Payment frequency</strong> = 12, <strong>Loaned fee Fee_rolled</strong> = 500, <strong>Annual fee</strong> = 0 and <strong>Annual fee</strong> = 0.</p><ul><li><strong>Payment frequency</strong> = 12</li><li><strong>Loaned fee Fee_rolled</strong> = 500</li><li><strong>Annual fee</strong> = 0</li><li><strong>Annual fee</strong> = 0</li></ul><p>That is <strong>Fee amount</strong> = <code>Origination fee × Loan amount</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Payment frequency</strong> = 12, <strong>Loaned fee Fee_rolled</strong> = 500, <strong>Annual fee</strong> = 0 and <strong>Annual fee</strong> = 0 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Annual Percentage Rate (APR) offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Fee amount</strong> = <code>Origination fee × Loan amount</code></li><li><strong>Loan amount</strong> = <code>Fee amount ÷ Origination fee</code></li><li><strong>Origination fee</strong> = <code>Fee amount ÷ Loan amount</code></li><li><strong>ir</strong> = <code>get_ir(What interest rate do you know?, Annual Percentage Rate (APR), Interest rate)</code></li><li><strong>Eq p</strong> = <code>(((M + get_ir(What interest rate do you know?, Annual Percentage Rate (APR), Interest rate)) ÷ M)^(M ÷ Payment frequency) − 1)</code></li><li><strong>Periods</strong> = <code>Payment frequency × Loan term</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Fee amount</strong> = <code>Origination fee × Loan amount</code> — the form to use when Origination fee and Loan amount are the values you have.</li><li><strong>Loan amount</strong> = <code>Fee amount ÷ Origination fee</code> — the form to use when Fee amount and Origination fee are the values you have.</li><li><strong>Origination fee</strong> = <code>Fee amount ÷ Loan amount</code> — the form to use when Fee amount and Loan amount are the values you have.</li><li><strong>ir</strong> = <code>get_ir(What interest rate do you know?, Annual Percentage Rate (APR), Interest rate)</code> — the form to use when What interest rate do you know?, Annual Percentage Rate (APR) and Interest rate are the values you have.</li><li><strong>Eq p</strong> = <code>(((M + get_ir(What interest rate do you know?, Annual Percentage Rate (APR), Interest rate)) ÷ M)^(M ÷ Payment frequency) − 1)</code> — the form to use when M, What interest rate do you know?, Annual Percentage Rate (APR) and Interest rate are the values you have.</li><li><strong>Periods</strong> = <code>Payment frequency × Loan term</code> — the form to use when Payment frequency and Loan term are the values you have.</li><li><strong>Payment frequency</strong> = <code>Periods ÷ Loan term</code> — the form to use when Periods and Loan term are the values you have.</li><li><strong>Loan term</strong> = <code>Periods ÷ Payment frequency</code> — the form to use when Periods and Payment frequency are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Fee amount, Loan amount and Origination fee can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — What interest rate do you know?, from 1 to 2 — and the answers go from <strong>Payment frequency</strong> 12, <strong>Loaned fee Fee_rolled</strong> 500, <strong>Annual fee</strong> 0 and <strong>Annual fee</strong> 0 to <strong>Payment frequency</strong> 12, <strong>Loaned fee Fee_rolled</strong> 500, <strong>Annual fee</strong> 0 and <strong>Annual fee</strong> 0.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Origination fee is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Annual Percentage Rate (APR), Loan term and Payment frequency are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Loan amount left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Loan amount is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Origination fee left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Origination fee is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Loan amount is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Loan form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Loan amount</strong> takes a plain number with no unit attached. This is the full amount of the loan applied for. Note that the actual amount received may differ if any fee is financed by part of your loan. Change it and Fee amount, Origination fee and Payment2 changes with it. Fill it from a measurement rather than a memory — Loan amount is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Origination fee</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It is also called the administration fee, underwriting&amp;nbsp;fee, or processing&amp;nbsp;fee. Note that it is given as a percentage of the whole loan amount and that APR usually includes this fee. Change it and Fee amount, Loan amount and Payment2 changes with it. Fill it from a measurement rather than a memory — Origination fee is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Annual Percentage Rate (APR) is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The chips cover percent and years / months. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Loan amount and Origination fee measured, Annual Percentage Rate (APR) and Loan term wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/retirement">Retirement Calculator</a>, <a href="/finance/retirement-withdrawal">Retirement withdrawal Calculator</a> and <a href="/finance/return-on-capital-employed">Return on capital employed</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Loan is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Loan amount and Origination fee beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Loan calculator work out?', 'a' => <<<'TXT'
            Annual Percentage Rate (APR), Loan term, Payment frequency and Loan received, from Origination fee and Loan amount. The relationship is Fee amount = Origination fee × Loan amount.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Loan amount (USD), Origination fee (percent). Fill loan amount and origination fee and leave Annual Percentage Rate (APR) empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Fee amount, Loan amount, Origination fee and ir can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Payment frequency = 12, Loaned fee Fee_rolled = 500, Annual fee = 0 and Annual fee = 0. That comes from the page's own defaults, entered in Loan amount; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Annual Percentage Rate (APR) is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Loan amount blank and the page solves for it, reporting Annual Percentage Rate (APR) instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Annual Percentage Rate (APR) keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/retirement', 'name' => 'Retirement Calculator'],
            ['path' => '/finance/retirement-withdrawal', 'name' => 'Retirement withdrawal Calculator'],
            ['path' => '/finance/return-on-capital-employed', 'name' => 'Return on capital employed'],
        ],
        'authors' => [],
    ],
];
