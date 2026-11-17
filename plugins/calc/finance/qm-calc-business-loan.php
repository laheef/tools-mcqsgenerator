<?php

/**
 * Business loan
 * /finance/business-loan
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Business loan',
    'meta' => ['title' => 'Business loan Calculator — Formula, Units & Example', 'description' => 'Business loan works out loan amount and periodic payment and reports both. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Business loan Calculator', 'updated' => '2026-09-26'],
    'sections' => [
        [
            'title' => 'Main specifications',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'subject2',
                            'label' => 'Known rate',
                            'type' => 'select',
                            'options' => ['Nominal interest rate' => '1', 'APR' => '2', 'Both APR and interest rate' => '3', 'I do not know either rate' => '4'],
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
                            'default' => '100000',
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
                            'name' => 'loan_term',
                            'label' => 'Loan term',
                            'type' => 'number',
                            'help' => 'The length of time over which you are obliged to pay off your loan.',
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
                            'default' => '500',
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
                            'default' => '1000',
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
                        ['type' => 'note', 'text' => 'You receive a {{LoanReceived.monetaryValue}} loan after deducting the origination fee of {{fee_amount.monetaryValue}}.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'LoanReceived',
                            'label' => 'Loan amount',
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
                            'label' => 'Periodic payment',
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
                            'label' => 'Periodic payment',
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
                            'label' => 'Total interest payment',
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
                            'label' => 'Total interest payment',
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
                            'label' => 'Total payment',
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
                            'label' => 'Total payment',
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
                            'label' => 'Total finance charge',
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
                            'name' => 'APR4',
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
                            'name' => 'APR_effective',
                            'label' => 'Effective APR',
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
                            'label' => 'Effective APR',
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
                            'label' => 'Effective APR',
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
                            'label' => 'Loaned fee_calculated',
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
                            'name' => 'Payment_total',
                            'label' => 'Total payment',
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
                            'label' => 'Ir',
                            'type' => 'number',
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
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'LoanAmount_fee',
                            'label' => 'LoanAmount_fee',
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
            'results' => ['fee_amount' => 'Fee_admin*LoanAmount', 'Fee_admin' => 'fee_amount/LoanAmount', 'LoanAmount' => 'fee_amount/Fee_admin'],
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
            'title' => 'periods = payment_frequency * loan_term',
            'results' => ['loan_term' => 'periods/payment_frequency', 'periods' => 'loan_term*payment_frequency', 'payment_frequency' => 'periods/loan_term'],
        ],
        [
            'title' => 'Fee_rolled = get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input)',
            'results' => ['Fee_rolled' => 'get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input)'],
        ],
        [
            'title' => 'Payment2 = get_Payment2(LoanAmount, eq_p, periods, Fee_rolled, subject3, subject2, fee_amount, LoanAmount_fee, interest_rate, apr, m, payment_frequency)',
            'results' => ['Payment2' => <<<'TXT'
            get_Payment2(LoanAmount, (pow((m + get_ir(subject2, apr, interest_rate))/m, m/payment_frequency) - 1), periods, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), subject3, subject2, fee_amount, get_LoanAmountFee(LoanAmount, get_Fee_rolled(subject2, subject3, interest_rate, apr, fee_amount, Fee_rolled_input), subject2), interest_rate, apr, m, payment_frequency)
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
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("get_APR_effective",function(APR,m){var APR_effective=Math.pow(1+APR/m,m)-1;return APR_effective});omni.define("get_APR3",function(LoanAmount,Fee_pre_noapr,Payment,r,apr,m,q,periods){var APR3=calculate_APR3(LoanAmount,Fee_pre_noapr,Payment,r,apr,m,q,periods).APR;return APR3});omni.define("get_APR4",function(LoanAmount,Payment,Fee_rolled,Fee_pre,m,q,periods){var APR4=calculate_APR4(LoanAmount,Payment,Fee_rolled,Fee_pre,m,q,periods).APR;return APR4});omni.define("get_APR4_effective",function(LoanAmount,Payment,Fee_rolled,Fee_pre,m,q,periods){var APR4_effective=calculate_APR4(LoanAmount,Payment,Fee_rolled,Fee_pre,m,q,periods).APR_effective;return APR4_effective});omni.define("get_APR3_effective",function(LoanAmount,Fee_pre_noapr,Payment,r,apr,m,q,periods){var APR3_effective=calculate_APR3(LoanAmount,Fee_pre_noapr,Payment,r,apr,m,q,periods).APR_effective;return APR3_effective});omni.define("get_APR",function(Payment_fee,Fee_pre,LoanReceived,periods,q,m,LoanAmount,subject2,subject3,Fee_rolled,AdminFee,Fee_pre_noapr,Payment,r,apr){var old_APR_eq;var new_APR_eq=0.1;var iteration=0;var MIN_PRECISION=1e-6;var MAX_ITERATIONS=5000;var r_local=r;var apr_local=apr;var Fee_pre_noapr_local=Fee_pre_noapr;if(subject2===4){r_local=0;apr_local=0;Fee_pre_noapr_local=0}var Fee_pre_=calculateFeePre(subject2,subject3,LoanAmount,Fee_rolled,AdminFee,Fee_pre_noapr_local,Fee_pre,Payment,r_local,apr_local);var periodsPow=function periodsPow(rate,power){return Math.pow(1+rate,power)};do{old_APR_eq=new_APR_eq;var powMinusPeriods=periodsPow(new_APR_eq,-periods);var powMinusPeriodsMinus1=periodsPow(new_APR_eq,-periods-1);var dividend_APR_eq=Payment_fee*periods+Fee_pre_-Payment_fee*periods*powMinusPeriods-Fee_pre_*powMinusPeriods-new_APR_eq*LoanReceived*periods;var divisor_APR=Payment_fee*periods*periods*powMinusPeriodsMinus1+Fee_pre_*periods*powMinusPeriodsMinus1-periods*LoanReceived;new_APR_eq=new_APR_eq-dividend_APR_eq/divisor_APR;++iteration}while(Math.abs(old_APR_eq-new_APR_eq)>MIN_PRECISION&&iteration<=MAX_ITERATIONS);var APR_eq=new_APR_eq*q;var APR=m*(Math.pow((q+APR_eq)/q,q/m)-1);if(subject2===3&&r_local<apr_local){APR=calculate_APR3(LoanAmount,Fee_pre_noapr_local,Payment,r_local,apr_local,m,q,periods).APR}return APR});omni.define("get_LoanReceived",function(LoanAmount,AdminFee,select3){var LoanReceived=LoanAmount;if(select3===1){LoanReceived=LoanAmount-AdminFee}return LoanReceived});omni.define("get_finalFinanceCharges",function(FinCharges,AdminFee,subject3){var finalFinanceCharges=FinCharges;if(subject3===2){finalFinanceCharges=FinCharges+AdminFee}return finalFinanceCharges});omni.define("get_Payment_total",function(Payment_fee,periods,Fee_pre,subject2,Payment,subject3,LoanAmount,Fee_rolled,AdminFee,Fee_pre_noapr,r,apr){var Fee_pre_=calculateFeePre(subject2,subject3,LoanAmount,Fee_rolled,AdminFee,Fee_pre_noapr,Fee_pre,Payment,r,apr);var Payment_total=Payment_fee*periods+Fee_pre_;if(subject2===4){Payment_total=Payment*periods}return Payment_total});omni.define("get_finalPaymentTotal",function(Payment_total,AdminFee,subject3){var finalPaymentTotal=Payment_total;if(subject3===2){finalPaymentTotal=Payment_total+AdminFee}return finalPaymentTotal});omni.define("get_finalPaymentTotal_4",function(Payment,periods,LoanAmount,Fee_rolled){var finalPaymentTotal_4=calculate_finalPaymentTotal_4(Payment,periods,LoanAmount,Fee_rolled);return finalPaymentTotal_4});omni.define("get_Payment_fee",function(subject2,LoanAmount,LoanAmount_fee,Fee_rolled,Payment,periods,q,eq_p){var Payment_fee=LoanAmount_fee*eq_p*Math.pow(1+eq_p,periods)/(Math.pow(1+eq_p,periods)-1);if(subject2===4){var _LoanAmount_fee=LoanAmount+Fee_rolled;var new_r_eq=0.1;var old_r_eq;var iteration=0;var MIN_PRECISION=1e-10;var MAX_ITERATIONS=100;do{old_r_eq=new_r_eq;var dividend_r_eq=Payment*periods-Payment*periods*Math.pow(1+new_r_eq,-periods)-new_r_eq*LoanAmount*periods;var divisor_r_eq=Payment*periods*periods*Math.pow(1+new_r_eq,-periods-1)-periods*LoanAmount;new_r_eq=new_r_eq-dividend_r_eq/divisor_r_eq;iteration++}while(Math.abs(old_r_eq-new_r_eq)>MIN_PRECISION&&iteration<=MAX_ITERATIONS);var r_eq=new_r_eq*q;var APR_eq=r_eq;Payment_fee=_LoanAmount_fee*(APR_eq/q)*Math.pow(1+APR_eq/q,periods)/(Math.pow(1+APR_eq/q,periods)-1)}return Payment_fee});omni.define("get_ir",function(subject2,apr,r){var ir;if(subject2==2){ir=apr}else if(subject2==1){ir=r}return ir});omni.define("get_Fee_rolled",function(subject2,subject3,r,apr,fee_amount,Fee_rolled_input){var Fee_rolled=Fee_rolled_input;if(subject3===2){Fee_rolled=Fee_rolled+fee_amount}if(subject2===2){Fee_rolled=0}if(subject2===2&&subject3===2){Fee_rolled=fee_amount}if(subject2===3&&r<apr){Fee_rolled=0}return Fee_rolled});omni.define("get_LoanAmountFee",function(LoanAmount,Fee_rolled,subject2){var LoanAmount_fee=LoanAmount;if(subject2===1){LoanAmount_fee=LoanAmount+Fee_rolled}else if(subject2===2){LoanAmount_fee=LoanAmount}else if(subject2===4){LoanAmount_fee=LoanAmount+Fee_rolled}return LoanAmount_fee});omni.define("get_Payment2",function(LoanAmount,eq_p,periods,Fee_rolled,subject3,subject2,fee_amount,LoanAmount_fee,r,apr,m,q){var Payment_fee=LoanAmount_fee*eq_p*mathjs.pow(1+eq_p,periods)/(mathjs.pow(1+eq_p,periods)-1);var Payment2=LoanAmount*eq_p*mathjs.pow(1+eq_p,periods)/(mathjs.pow(1+eq_p,periods)-1);var eq_p_apr=mathjs.pow(1+apr/m,m/q)-1;var Payment_apr=LoanAmount*eq_p_apr*mathjs.pow(1+eq_p_apr,periods)/(mathjs.pow(1+eq_p_apr,periods)-1);if(subject2===3&&r<apr){Payment2=Payment_apr}if(Fee_rolled>0&&subject3!==2){Payment2=Payment_fee}if(Fee_rolled-fee_amount===0&&subject3===2&&fee_amount>0){Payment2=Payment_fee}if(Fee_rolled-fee_amount>0&&subject3===2&&fee_amount>0){Payment2=Payment_fee}return Payment2});omni.define("get_payment2_3",function(apr,r,m,q,LoanAmount,periods){var payment2_3=calculate_payment2_3(apr,r,m,q,LoanAmount,periods).Payment2;return payment2_3});omni.define("get_interest_total_3",function(apr,r,m,q,LoanAmount,periods){var interest_total_3=calculate_payment2_3(apr,r,m,q,LoanAmount,periods).Interest_total;return interest_total_3});function calculateFeePre(select2,select3,LoanAmount,Fee_rolled,AdminFee,Fee_pre_noapr,Fee_pre,Payment,r,apr){var Fee_pre_calculated=Fee_pre;if(select3===3){Fee_pre_calculated+=AdminFee}if(select2===2){Fee_pre_calculated=Fee_pre_noapr}if(select2===3&&r<apr){Fee_pre_calculated=0}if(select2===3){Fee_pre_calculated=Fee_pre_noapr}if(select2===2&&Fee_pre_noapr===0){Fee_pre_calculated=0}return Fee_pre_calculated}function calculate_APR3(LoanAmount,Fee_pre_noapr,Payment,r,apr,m,q,periods){var MIN_PRECISION=1e-6;var MAX_ITERATIONS=5000;var eq_p_apr=Math.pow(1+apr/m,m/q)-1;var Payment_apr=LoanAmount*eq_p_apr*Math.pow(1+eq_p_apr,periods)/(Math.pow(1+eq_p_apr,periods)-1);var new_APR_eq=apr,old_APR_eq,iteration=0;do{old_APR_eq=new_APR_eq;var dividend_APR_eq2=Payment_apr*periods+Fee_pre_noapr-Payment_apr*periods*Math.pow(1+new_APR_eq,-periods)-Fee_pre_noapr*Math.pow(1+new_APR_eq,-periods)-new_APR_eq*LoanAmount*periods;var divisor_APR2=Payment_apr*periods*periods*Math.pow(1+new_APR_eq,-periods-1)+Fee_pre_noapr*periods*Math.pow(1+new_APR_eq,-periods-1)-periods*LoanAmount;new_APR_eq-=dividend_APR_eq2/divisor_APR2}while(Math.abs(old_APR_eq-new_APR_eq)>MIN_PRECISION&&iteration++<=MAX_ITERATIONS);var APR_eq=new_APR_eq*q;var APR=m*(Math.pow((q+APR_eq)/q,q/m)-1);var Payment2=Payment_apr;var APR_effective=Fee_pre_noapr>0?Math.pow(1+APR/m,m)-1:Math.pow(1+apr/m,m)-1;return{APR_eq:APR_eq,APR:APR,Payment2:Payment2,APR_effective:APR_effective}}function calculate_APR4(LoanAmount,Payment,Fee_rolled,Fee_pre,m,q,periods){var MIN_PRECISION=1e-6;var MAX_ITERATIONS=5000;var iteration=0;var old_r_eq;var new_r_eq=0.1;do{old_r_eq=new_r_eq;var dividend_r_eq=Payment*periods-Payment*periods*Math.pow(1+new_r_eq,-periods)-new_r_eq*LoanAmount*periods;var divisor_r_eq=Payment*periods*periods*Math.pow(1+new_r_eq,-periods-1)-periods*LoanAmount;new_r_eq=new_r_eq-dividend_r_eq/divisor_r_eq;++iteration}while(Math.abs(old_r_eq-new_r_eq)>MIN_PRECISION&&iteration<=MAX_ITERATIONS);var old_APR_eq;var new_APR_eq=0.1;do{old_APR_eq=new_APR_eq;var dividend_APR_eq3=Payment*periods+Fee_pre-Payment*periods*Math.pow(1+new_APR_eq,-periods)-Fee_pre*Math.pow(1+new_APR_eq,-periods)-new_APR_eq*LoanAmount*periods;var divisor_APR_eq3=Payment*periods*periods*Math.pow(1+new_APR_eq,-periods-1)+Fee_pre*periods*Math.pow(1+new_APR_eq,-periods-1)-periods*LoanAmount;new_APR_eq=new_APR_eq-dividend_APR_eq3/divisor_APR_eq3;++iteration}while(Math.abs(old_APR_eq-new_APR_eq)>MIN_PRECISION&&iteration<=MAX_ITERATIONS);var APR_eq=new_APR_eq*q;var APR_effective=m*(mathjs.pow((q+APR_eq)/q,q/m)-1);var APR=mathjs.pow(1+APR_effective/m,m)-1;return{APR_eq:APR_eq,APR:APR,APR_effective:APR_effective}}function calculate_payment2_3(apr,r,m,q,LoanAmount,periods){var eq_p_r=mathjs.pow(1+r/m,m/q)-1;var eq_p_apr=mathjs.pow(1+apr/m,m/q)-1;var Payment_r=LoanAmount*eq_p_r*mathjs.pow(1+eq_p_r,periods)/(mathjs.pow(1+eq_p_r,periods)-1);var Payment_apr=LoanAmount*eq_p_apr*mathjs.pow(1+eq_p_apr,periods)/(mathjs.pow(1+eq_p_apr,periods)-1);var Interest_total=Payment_r*periods-LoanAmount;var Payment2=Payment_apr;return{Payment2:Payment2,Interest_total:Interest_total}}function calculate_finalPaymentTotal_4(Payment,periods,LoanAmount,Fee_rolled){var Payment_total=Payment*periods;var finalPaymentTotal=Payment_total;return finalPaymentTotal}//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Enter Origination fee into Business loan and the answer comes back as Loan term and Payment frequency. It is a single relationship that reads loan term out of origination fee, not a table of canned results keyed by them. Units for Loan term default to years / months and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Business loan calculator works', 'html' => <<<'TXT'
            <p>Business loan answers one question from 2 numbers, and the answer is Loan term, Payment frequency and Loan amount.</p><p>The relationship it solves reads Fee amount = Origination fee × Loan amount.</p><p>The answers are Loan term, Payment frequency, Loan amount and Periodic payment; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Loan amount</strong> — in USD. This is the full amount of the loan applied for. Note that the actual amount received may differ if any fee is financed by part of your loan.</li><li><strong>Origination fee</strong> — in percent. It is also called the administration fee, underwriting&amp;nbsp;fee, or processing&amp;nbsp;fee. Note that it is given as a percentage of the whole loan amount and that APR usually includes this fee.</li></ul><p>The result boxes are Loan term in years / months, Payment frequency, Loan amount in USD, Periodic payment in USD, Periodic payment in USD, Total interest payment in USD, Total interest payment in USD, Total payment in USD, Total payment in USD, Total finance charge in USD, APR in percent, APR in percent, APR in percent, Effective APR in percent, Effective APR in percent, Effective APR in percent, Loaned fee_calculated, Total payment, Fee amount, Eq p, Ir, Periods, Payment fee, LoanAmount_fee, Fin charges; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Known rate = 1, Interest rate = 5 perc, Annual Percentage Rate (APR) = 10 perc, Compound frequency = 44, Periodic payment = 150 USD, Prepaid fee = 500 USD, Loaned fee = 1000 USD, Fees not in APR = 8 USD and Origination fee repayment = 1 — through the same formula and the panel reports <strong>Payment frequency</strong> = 12, <strong>Annual fee</strong> = 0 and <strong>Annual fee</strong> = 0.</p><ul><li><strong>Payment frequency</strong> = 12</li><li><strong>Annual fee</strong> = 0</li><li><strong>Annual fee</strong> = 0</li></ul><p>That is <strong>Fee amount</strong> = <code>Origination fee × Loan amount</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Payment frequency</strong> = 12, <strong>Annual fee</strong> = 0 and <strong>Annual fee</strong> = 0. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Loan term lists 9 options and opens on years / months. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Fee amount</strong> = <code>Origination fee × Loan amount</code></li><li><strong>Origination fee</strong> = <code>Fee amount ÷ Loan amount</code></li><li><strong>Loan amount</strong> = <code>Fee amount ÷ Origination fee</code></li><li><strong>Ir</strong> = <code>get_ir(Known rate, Annual Percentage Rate (APR), Interest rate)</code></li><li><strong>Eq p</strong> = <code>(((M + get_ir(Known rate, Annual Percentage Rate (APR), Interest rate)) ÷ M)^(M ÷ Payment frequency) − 1)</code></li><li><strong>Periods</strong> = <code>Loan term × Payment frequency</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Fee amount</strong> = <code>Origination fee × Loan amount</code> — the form to use when Origination fee and Loan amount are the values you have.</li><li><strong>Origination fee</strong> = <code>Fee amount ÷ Loan amount</code> — the form to use when Fee amount and Loan amount are the values you have.</li><li><strong>Loan amount</strong> = <code>Fee amount ÷ Origination fee</code> — the form to use when Fee amount and Origination fee are the values you have.</li><li><strong>Ir</strong> = <code>get_ir(Known rate, Annual Percentage Rate (APR), Interest rate)</code> — the form to use when Known rate, Annual Percentage Rate (APR) and Interest rate are the values you have.</li><li><strong>Eq p</strong> = <code>(((M + get_ir(Known rate, Annual Percentage Rate (APR), Interest rate)) ÷ M)^(M ÷ Payment frequency) − 1)</code> — the form to use when M, Known rate, Annual Percentage Rate (APR) and Interest rate are the values you have.</li><li><strong>Periods</strong> = <code>Loan term × Payment frequency</code> — the form to use when Loan term and Payment frequency are the values you have.</li><li><strong>Loan term</strong> = <code>Periods ÷ Payment frequency</code> — the form to use when Periods and Payment frequency are the values you have.</li><li><strong>Payment frequency</strong> = <code>Periods ÷ Loan term</code> — the form to use when Periods and Loan term are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Fee amount, Origination fee and Loan amount can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Known rate from 1 to 2, leaving every other box alone. The panel moves from <strong>Payment frequency</strong> 12, <strong>Annual fee</strong> 0 and <strong>Annual fee</strong> 0 to <strong>Payment frequency</strong> 12, <strong>Annual fee</strong> 0 and <strong>Annual fee</strong> 0.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Origination fee carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Loan term, Payment frequency and Loan amount are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Loan amount left as a guess.</strong> Anything typed into Loan amount is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Origination fee left as a guess.</strong> Anything typed into Origination fee is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Loan amount to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Loan amount</strong> takes a plain number with no unit attached. This is the full amount of the loan applied for. Note that the actual amount received may differ if any fee is financed by part of your loan. Change it and Fee amount, Origination fee and Periodic payment changes with it. Have it to hand before you start: Loan amount is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Origination fee</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It is also called the administration fee, underwriting&amp;nbsp;fee, or processing&amp;nbsp;fee. Note that it is given as a percentage of the whole loan amount and that APR usually includes this fee. Change it and Fee amount and Loan amount changes with it. Have it to hand before you start: Origination fee is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Loan amount and Origination fee. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Loan amount into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Loan term in yrsmos with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Loan term is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The chips cover years / months and percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Loan amount and Origination fee measured, Loan term and Payment frequency wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/annual-salary-per-hour">Annual salary per hour Calculator</a>, <a href="/finance/annual-to-monthly-salary">Annual to monthly salary Calculator</a> and <a href="/finance/annualized-rate-of-return">Annualized rate of return Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Business loan calculator work out?', 'a' => <<<'TXT'
            Loan term, Payment frequency, Loan amount and Periodic payment, from Origination fee and Loan amount. The relationship is Fee amount = Origination fee × Loan amount.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Loan amount (USD), Origination fee (percent). With loan amount and origination fee in place, Loan term can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Fee amount, Origination fee, Loan amount and Ir can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Payment frequency = 12, Annual fee = 0 and Annual fee = 0. That comes from the page's own defaults, entered in Loan amount; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Loan term is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Loan amount left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Loan term keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/annual-salary-per-hour', 'name' => 'Annual salary per hour Calculator'],
            ['path' => '/finance/annual-to-monthly-salary', 'name' => 'Annual to monthly salary Calculator'],
            ['path' => '/finance/annualized-rate-of-return', 'name' => 'Annualized rate of return Calculator'],
        ],
        'authors' => [],
    ],
];
