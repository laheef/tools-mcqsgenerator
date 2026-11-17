<?php

/**
 * Mortgage prepayment
 * /finance/mortgage-prepayment
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Mortgage prepayment',
    'meta' => ['title' => 'Mortgage prepayment: Formula, Steps & Results', 'description' => 'Mortgage prepayment takes interest rate and returns mortgage amount. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Mortgage prepayment Calculator', 'updated' => '2026-09-09'],
    'sections' => [
        [
            'title' => 'Current mortgage',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'loan_amount',
                            'label' => 'Mortgage amount',
                            'type' => 'number',
                            'help' => 'Your original or remaining loan principal to be repaid on a monthly basis.',
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
                            'name' => 'int_rate',
                            'label' => 'Interest rate',
                            'type' => 'number',
                            'help' => 'Yearly rate of interest.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '6',
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
                            'help' => 'If the set mortgage amount is your original loan, then set here the original term.',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '30', 'when' => null],
                                ['value' => '30', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'calc_method',
                            'label' => 'Interest calculation method',
                            'type' => 'select',
                            'options' => ['Semi-annually (Canada)' => '2.000000000000000', 'Monthly (US & UK)' => '12.000000000000000'],
                            'dataset' => 'Compounding frequency',
                            'control' => 'DROPDOWN',
                            'help' => 'You can set how often the bank calculate the interest on the principal balance.',
                            'default' => 'Monthly (US & UK)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'first_day', 'label' => 'One the day of', 'type' => 'date', 'help' => 'The date your next mortgage payment is due.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Payment',
                            'label' => 'Payment',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            The loan installment that you are obliged to pay at the due date of each agreed payment frequency (if you set extra periodic payment, the additional amount also appears here).
                            TXT,
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Prepayment options',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'payment_frequency',
                            'label' => 'Payment frequency',
                            'type' => 'select',
                            'options' => [
                                'Monthly' => '12',
                                'Bi-weekly' => '26',
                                'Accelerated bi-weekly' => '12',
                                'Weekly' => '52',
                                'Accelerated weekly' => '12',
                            ],
                            'dataset' => 'pay_freq',
                            'control' => 'DROPDOWN',
                            'help' => <<<'TXT'
                            In the case of accelerated bi-weekly (or weekly) options, payments are the half (or quarter) of your original monthly payment but paid every second week (or weekly).
                            TXT,
                            'default' => 'Monthly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'extra_payment',
                            'label' => 'Periodic prepayment',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            Here you can set an additional amount of money that you wish to contribute to your calculated loan installments. Note that after signing a mortgage contract you may charged for altering the amount of the installment stated in the contract.
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
                        ['name' => 'date_extra', 'label' => 'Starting from', 'type' => 'date', 'help' => 'You can set here from which date onward you will add extra money to your installments.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'single_extra',
                            'label' => 'Lump sum prepayment',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            Here you can set a one off payment to your mortgage on a specific date. Note that depending on your contract, the bank may charge you an extra fee for any advance payment.
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
                        ['name' => 'date_single', 'label' => 'Paid on', 'type' => 'date', 'help' => <<<'TXT'
                        This is the specific date when your individual prepayment is applied. Note that if the selected date doesn't coincide with the due date of your periodic payment, the amount will be added on the following payment due date.
                        TXT],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Prepayment summary',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'You need to set additional periodic or lump sum prepayment to induce changes in your original repayment schedule.'],
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
                            'name' => 'pay_freq',
                            'label' => 'Payment frequency',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'q2',
                            'label' => 'Q2',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Payment_monthly',
                            'label' => 'Payment monthly',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Payment_accelerated',
                            'label' => 'Payment accelerated',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
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
                            'name' => 'Payment_gen',
                            'label' => 'Payment gen',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Total_payment_2',
                            'label' => 'Total periodic payment',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            It is the total payment with additional costs you need to pay periodically. Note that although the due date of other expenses may divert from the payment frequency, here we rely on the due date of your loan installments.
                            TXT,
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
                            'name' => 'details',
                            'label' => 'Details',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Total_payment_monthly',
                            'label' => 'Total payment monthly',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Rep',
                            'label' => 'Display',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'eq_p_monthly',
                            'label' => 'Eq p monthly',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'g_t',
                            'label' => 'G t',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'amortization_year', 'label' => 'Due dates from', 'type' => 'date', 'help' => 'By setting this date you can see the details of your periodic balances for one year onward.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'growth_rate',
                            'label' => 'Growth rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.000000000000000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'amortization_table',
                            'label' => 'Annual Breakdown & Amortization table',
                            'type' => 'number',
                            'help' => 'The table shows details for one year from the above chosen date for a balance on a specific date.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'n_monthly',
                            'label' => 'N monthly',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'n',
                            'label' => 'N',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ct1',
                            'label' => 'Ct1',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
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
                            'name' => 'q3',
                            'label' => 'Q3',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarRep',
                            'label' => 'Var rep',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Home_value',
                            'label' => 'Home value',
                            'type' => 'number',
                            'help' => 'The purchase price of the property.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '200000.000000000000000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Down_payment',
                            'label' => 'Down payment',
                            'type' => 'number',
                            'help' => 'The total cash available for the house purchase.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '100000.000000000000000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Down_payment_percentage',
                            'label' => 'Down payment in percentage',
                            'type' => 'number',
                            'help' => 'If your down payment is lower than 20 percent of the house\'s value, you are obliged to pay Private Mortgage Insurance (PMI).',
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
                            'name' => 'HOA_fee',
                            'label' => 'Monthly HOA fees',
                            'type' => 'number',
                            'help' => 'Homeowners association fee that covers the expenses of maintaining and improving the property.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0.000000000000000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PMI_periodic',
                            'label' => 'Pmi periodic',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Costs_add',
                            'label' => 'Costs add',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Property_tax',
                            'label' => 'Property tax',
                            'type' => 'number',
                            'help' => 'Administered by the local government and utilized for road maintenance and costs of other public services. It is typically based on the value of the property.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0.000000000000000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Home_insurance',
                            'label' => 'Annual homeowner insurance',
                            'type' => 'number',
                            'help' => 'An insurance policy that provides compensation for damage, loss or injury of property and it belongings in case of fire, theft or other accidents.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0.000000000000000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'other_costs',
                            'label' => 'Other monthly costs',
                            'type' => 'number',
                            'help' => 'You may set here any further costs that relate to your mortgage.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0.000000000000000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Extra_payment_yearly',
                            'label' => 'Extra payment yearly',
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
                            'name' => 'PMI_treshold',
                            'label' => 'PMI treshold',
                            'type' => 'number',
                            'help' => 'Currently the typical threshold of PMI in the US is 20 percent, still you may change it according to the specific loan construction.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20.000000000000000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PMI',
                            'label' => 'PMI',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            Private Mortgage Insurance - this additional fee typically costs in the US between 0.5% to 1% of the entire loan amount on an annual basis. Note that after your home value to loan principal reaches a particular threshold (typically 20 percent) you can cancel this additional fee.
                            TXT,
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
                            'name' => 'g',
                            'label' => 'Yearly increase in payments',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            Here you may set a percentage rate of growth in your payments that may reflect the average yearly increase of your income during the loan term. Note that you always should consult your bank before transferring any additional amount above your installment stated in the loan contract as most of the banks charge you an extra fee.
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
                        ['name' => 'mortgage_payoff_date', 'label' => 'Mortgage payoff date', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'ori_mortgage_payoff_date', 'label' => 'Ori mortgage payoff date', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'payment_count',
                            'label' => 'Payment count',
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
                            'name' => 'total_interest',
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
                            'name' => 'total_payment',
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
                            'name' => 'repayment_term',
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
                            'name' => 'ori_payment',
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
                            'name' => 'ori_repayment_term',
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
                            'name' => 'ori_total_interest',
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
                            'name' => 'ori_total_payment',
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
                            'name' => 'diff_repayment_term',
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
                            'name' => 'diff_payment',
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
                            'name' => 'diff_total_interest',
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
                            'name' => 'diff_total_payment',
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
                            'name' => 'ori_n',
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
                            'name' => 'ori_payment_gen',
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
                            'name' => 'ori_payment_accelerated',
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
                            'name' => 'ori_eq_p',
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
                            'name' => 'new_payment_count',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'new_payment',
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
                            'name' => 'repayment_term_num_years',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'repayment_term_num_months',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ori_repayment_term_num_years',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ori_repayment_term_num_months',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'diff_repayment_term_num_years',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'diff_repayment_term_num_months',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ori_payment_count',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'diff_payment_count',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Payment_gen = (loan_amount * eq_p * (1 + eq_p) ^ n) / ((1 + eq_p) ^ n - 1)',
            'results' => ['n' => 'log(Payment_gen/(Payment_gen - eq_p*loan_amount))/log(eq_p + 1)', 'loan_amount' => 'Payment_gen/eq_p - Payment_gen*pow(eq_p + 1, -n)/eq_p', 'Payment_gen' => 'eq_p*loan_amount*pow(eq_p + 1, n)/(pow(eq_p + 1, n) - 1)'],
        ],
        [
            'title' => 'eq_p = (1 + int_rate / calc_method) ^ (calc_method / pay_freq) - 1',
            'results' => ['int_rate' => 'calc_method*(pow(eq_p + 1, pay_freq/calc_method) - 1)', 'pay_freq' => 'calc_method*log((calc_method + int_rate)/calc_method)/log(eq_p + 1)', 'eq_p' => 'pow((calc_method + int_rate)/calc_method, calc_method/pay_freq) - 1'],
        ],
        [
            'title' => 'n = pay_freq * term',
            'results' => ['n' => 'pay_freq*term', 'term' => 'n/pay_freq', 'pay_freq' => 'n/term'],
        ],
        [
            'title' => 'Payment_accelerated = Payment_gen * pay_freq / q2',
            'results' => ['q2' => 'Payment_gen*pay_freq/Payment_accelerated', 'Payment_accelerated' => 'Payment_gen*pay_freq/q2', 'pay_freq' => 'Payment_accelerated*q2/Payment_gen', 'Payment_gen' => 'Payment_accelerated*q2/pay_freq'],
        ],
        [
            'title' => 'Payment = one_way(Payment_gen * ct1 + Payment_accelerated * ct2 + extra_payment)',
            'results' => ['Payment' => '(Payment_accelerated*ct2 + Payment_gen*ct1 + extra_payment)'],
        ],
        [
            'title' => 'n_monthly = 12 * term',
            'results' => ['term' => '(1/12)*n_monthly', 'n_monthly' => '12*term'],
        ],
        [
            'title' => 'eq_p_monthly = ((1 + int_rate / calc_method) ^ (calc_method / 12) - 1)',
            'results' => ['eq_p_monthly' => 'pow((calc_method + int_rate)/calc_method, (1/12)*calc_method) - 1', 'int_rate' => 'calc_method*(pow(pow(eq_p_monthly + 1, 12), 1/calc_method) - 1)'],
        ],
        [
            'title' => 'Payment_monthly = (loan_amount * eq_p_monthly * (1 + eq_p_monthly) ^ n_monthly) / ((1 + eq_p_monthly) ^ n_monthly - 1)',
            'results' => ['Payment_monthly' => 'eq_p_monthly*loan_amount*pow(eq_p_monthly + 1, n_monthly)/(pow(eq_p_monthly + 1, n_monthly) - 1)', 'n_monthly' => 'log(Payment_monthly/(Payment_monthly - eq_p_monthly*loan_amount))/log(eq_p_monthly + 1)', 'loan_amount' => 'Payment_monthly/eq_p_monthly - Payment_monthly*pow(eq_p_monthly + 1, -n_monthly)/eq_p_monthly'],
        ],
        [
            'title' => 'Total_payment_monthly = Payment_monthly * n_monthly',
            'results' => ['Payment_monthly' => 'Total_payment_monthly/n_monthly', 'Total_payment_monthly' => 'Payment_monthly*n_monthly', 'n_monthly' => 'Total_payment_monthly/Payment_monthly'],
        ],
        [
            'title' => 'g + 1 = (1 + g_t / q3) ^ q3 ',
            'results' => ['g' => 'pow((g_t + q3)/q3, q3) - 1', 'g_t' => 'q3*(pow(g + 1, 1/q3) - 1)'],
        ],
        [
            'title' => 'growth_rate = g_t / q3',
            'results' => ['growth_rate' => 'g_t/q3', 'q3' => 'g_t/growth_rate', 'g_t' => 'growth_rate*q3'],
        ],
        [
            'title' => 'Extra_payment_yearly = extra_payment * q3',
            'results' => ['q3' => 'Extra_payment_yearly/extra_payment', 'extra_payment' => 'Extra_payment_yearly/q3', 'Extra_payment_yearly' => 'extra_payment*q3'],
        ],
        [
            'title' => 'PMI_periodic = loan_amount * PMI / q3',
            'results' => ['q3' => 'PMI*loan_amount/PMI_periodic', 'PMI' => 'PMI_periodic*q3/loan_amount', 'loan_amount' => 'PMI_periodic*q3/PMI', 'PMI_periodic' => 'PMI*loan_amount/q3'],
        ],
        [
            'title' => 'loan_amount = Home_value - Down_payment',
            'results' => ['Home_value' => 'Down_payment + loan_amount', 'Down_payment' => 'Home_value - loan_amount', 'loan_amount' => '-Down_payment + Home_value'],
        ],
        [
            'title' => 'Down_payment_percentage =  one_way(Down_payment / Home_value)',
            'results' => ['Down_payment_percentage' => '(Down_payment/Home_value)'],
        ],
        [
            'title' => 'Costs_add = Property_tax + Home_insurance + HOA_fee * 12 + other_costs * 12 ',
            'results' => [
                'other_costs' => '(1/12)*Costs_add - HOA_fee - 1/12*Home_insurance - 1/12*Property_tax',
                'Home_insurance' => 'Costs_add - 12*HOA_fee - Property_tax - 12*other_costs',
                'Costs_add' => '12*HOA_fee + Home_insurance + Property_tax + 12*other_costs',
                'Property_tax' => 'Costs_add - 12*HOA_fee - Home_insurance - 12*other_costs',
                'HOA_fee' => '(1/12)*Costs_add - 1/12*Home_insurance - 1/12*Property_tax - other_costs',
            ],
        ],
        [
            'title' => 'Total_payment_2 = one_way(Payment + PMI_periodic + Costs_add / q3)',
            'results' => ['Total_payment_2' => '(Costs_add/q3 + PMI_periodic + (Payment_accelerated*ct2 + Payment_gen*ct1 + extra_payment))'],
        ],
        [
            'title' => <<<'TXT'
            payment_count = get_payment_count(loan_amount, Payment, int_rate, term, pay_freq, q2, q3, calc_method, growth_rate, extra_payment, first_day, date_extra, single_extra, date_single)
            TXT,
            'results' => ['payment_count' => <<<'TXT'
            get_payment_count(loan_amount, (Payment_accelerated*ct2 + Payment_gen*ct1 + extra_payment), int_rate, term, pay_freq, q2, q3, calc_method, growth_rate, extra_payment, first_day, date_extra, single_extra, date_single)
            TXT],
        ],
        [
            'title' => 'mortgage_payoff_date = get_mortgage_payoff_date(first_day, payment_count, q3)',
            'results' => ['mortgage_payoff_date' => <<<'TXT'
            get_mortgage_payoff_date(first_day, get_payment_count(loan_amount, (Payment_accelerated*ct2 + Payment_gen*ct1 + extra_payment), int_rate, term, pay_freq, q2, q3, calc_method, growth_rate, extra_payment, first_day, date_extra, single_extra, date_single), q3)
            TXT],
        ],
        [
            'title' => 'ori_mortgage_payoff_date = get_mortgage_payoff_date(first_day, ori_payment_count, 12)',
            'results' => ['ori_mortgage_payoff_date' => <<<'TXT'
            get_mortgage_payoff_date(first_day, ((get_payment_count(loan_amount, ((loan_amount*pow((pow((calc_method + int_rate)/calc_method, (1/12)*calc_method) - 1) + 1, (12*term))*(pow((calc_method + int_rate)/calc_method, (1/12)*calc_method) - 1)/(pow((pow((calc_method + int_rate)/calc_method, (1/12)*calc_method) - 1) + 1, (12*term)) - 1))), int_rate, term, 12, 1, 12, calc_method, growth_rate, 0, first_day, date_extra, 0, date_single))), 12)
            TXT],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";var MILLISECONDS_IN_DAY=24*60*60*1000;omni.define("get_interest_paid",function(first_day,Loan_amount,q,q2,q3,t,r,m,payment,extra_payment,date_extra,date_single,single_extra,growth_rate,Costs_add,PMI_periodic){growth_rate=0;var MILLISECONDS_IN_DAY=24*60*60*1000;if(q2===48){q=52}else if(q2===24){q=26}var periods=t*q+1;var equivalent_base=1+r/m;var equivalent_power=m/q;var equivalent_p=Math.pow(equivalent_base,equivalent_power)-1;var firstDate=new Date(first_day);var extraDate=new Date(date_extra);var singleExtraDate=new Date(date_single);var payment2;if(extraDate.getTime()<=firstDate.getTime()){payment2=payment/(1+growth_rate)}else{payment2=payment+extra_payment}var principal_balance=Loan_amount;var interest_paid=0;var days_in_period=q===12?30.44:365.25/q;var currentDate=new Date(first_day);var lumpApplied=false;for(var i=1;i<=periods;i++){var periodStart=new Date(currentDate);currentDate=new Date(periodStart.getTime()+days_in_period*MILLISECONDS_IN_DAY);var effectivePayment=payment2;if(!lumpApplied&&singleExtraDate.getTime()>=periodStart.getTime()&&singleExtraDate.getTime()<currentDate.getTime()){effectivePayment=payment2+single_extra;lumpApplied=true}var interest_amount=principal_balance*equivalent_p;interest_paid+=interest_amount;var principal_payment=effectivePayment-interest_amount;if(principal_payment<0){principal_payment=0}if(principal_payment>principal_balance){principal_payment=principal_balance}principal_balance-=principal_payment;if(principal_balance<0){principal_balance=0}payment2=payment2*(1+growth_rate);if(principal_balance<=0){break}}return interest_paid});omni.define("get_payment_count",function(Loan_amount,payment,r,t,q,q2,q3,m,growth_rate,extra_payment,first_day,date_extra,single_extra,date_single){growth_rate=0;var MILLISECONDS_IN_DAY=24*60*60*1000;if(q2===48){q=52}else if(q2===24){q=26}var periods=t*q+1;var equivalent_base=1+r/m;var equivalent_power=m/q;var equivalent_p=Math.pow(equivalent_base,equivalent_power)-1;var firstDate=new Date(first_day);var extraDate=new Date(date_extra);var singleExtraDate=new Date(date_single);var payment2;if(extraDate.getTime()<=firstDate.getTime()){payment2=payment/(1+growth_rate)}else{payment2=payment+extra_payment}var principal_balance=Loan_amount;var payment_count_sum=0;var days_in_period=q===12?30.44:365.25/q;var currentDateSim=new Date(first_day);var lumpApplied=false;for(var i=1;i<=periods;i++){var periodStart=new Date(currentDateSim);currentDateSim=new Date(periodStart.getTime()+days_in_period*MILLISECONDS_IN_DAY);var effectivePayment=payment2;if(!lumpApplied&&singleExtraDate.getTime()>=periodStart.getTime()&&singleExtraDate.getTime()<=currentDateSim.getTime()){effectivePayment=payment2+single_extra;lumpApplied=true}var interest_amount=principal_balance*equivalent_p;var principal_amount=effectivePayment-interest_amount;if(principal_amount<0){principal_amount=0}var payment_amount=principal_amount+interest_amount;if(payment_amount>0){payment_count_sum+=1}principal_balance-=principal_amount;if(principal_balance<0){principal_balance=0}payment2=payment2*(1+growth_rate);if(principal_balance<=0){break}}return payment_count_sum});omni.define("get_pmi_total",function(Loan_amount,payment,r,t,q,q2,q3,m,growth_rate,extra_payment,Home_value,PMI_treshold,first_day,date_extra,single_extra,date_single,base_PMI_periodic){growth_rate=0;var MILLISECONDS_IN_DAY=24*60*60*1000;if(q2===48){q=52}else if(q2===24){q=26}var periods=t*q+1;var equivalent_base=1+r/m;var equivalent_power=m/q;var equivalent_p=Math.pow(equivalent_base,equivalent_power)-1;var firstDate=new Date(first_day);var extraDate=new Date(date_extra);var singleExtraDate=new Date(date_single);var payment2;if(extraDate.getTime()<=firstDate.getTime()){payment2=payment/(1+growth_rate)}else{payment2=payment+extra_payment}var days_in_period=q===12?30.44:365.25/q;var currentDateSim=new Date(first_day);var principal_balance=Loan_amount;var PMI_total=0;var lumpApplied=false;for(var i=1;i<=periods;i++){var periodStart=new Date(currentDateSim);currentDateSim=new Date(periodStart.getTime()+days_in_period*MILLISECONDS_IN_DAY);var effectivePayment=payment2;if(!lumpApplied&&singleExtraDate.getTime()>=periodStart.getTime()&&singleExtraDate.getTime()<currentDateSim.getTime()){effectivePayment=payment2+single_extra;lumpApplied=true}var interest_amount=principal_balance*equivalent_p;var principal_amount=effectivePayment-interest_amount;if(principal_amount<0){principal_amount=0}if(principal_amount>principal_balance){principal_amount=principal_balance}var remainingBalance=principal_balance-principal_amount;var PMI_this_period=remainingBalance<Home_value*(1-PMI_treshold)?0:base_PMI_periodic;PMI_total+=PMI_this_period;principal_balance-=principal_amount;if(principal_balance<0){principal_balance=0}payment2=payment2*(1+growth_rate);if(principal_balance<=0){break}}return PMI_total});omni.define("get_pmi_html",function(Loan_amount,Home_value,PMI_treshold,base_PMI_periodic){if(Loan_amount<Home_value*(1-PMI_treshold)){return 0}return base_PMI_periodic});omni.define("get_costs_add_total",function(Loan_amount,payment,r,t,q,q2,q3,m,growth_rate,extra_payment,Costs_add){growth_rate=0;var periods=t*q+1;if(q2===48){q=52;periods=t*52}else if(q2===24){q=26;periods=t*26}var equivalent_base=1+r/m;var equivalent_power=m/q;var equivalent_p=Math.pow(equivalent_base,equivalent_power)-1;var payment2=payment-extra_payment;var principal_balance=Loan_amount;var Costs_add_total=0;for(var i=1;i<=periods;i++){var interest_amount=principal_balance*equivalent_p;var principal_amount=payment2-interest_amount;if(principal_amount<0){principal_amount=0}var period_cost=principal_balance===0?0:Costs_add;Costs_add_total+=period_cost;principal_balance-=principal_amount;if(principal_balance<0){principal_balance=0}payment2=payment2*(1+growth_rate);if(principal_balance<=0){break}}if(q2===1){Costs_add_total=Costs_add*q3*t}return Costs_add_total});omni.define("get_mortgage_payoff_date",function(first_day,payment_count,q3){return first_day+payment_count/q3*365.25*MILLISECONDS_IN_DAY});omni.define("get_mortgage_payoff_pmi_date",function(Loan_amount,payment,r,t,q,q2,q3,m,growth_rate,extra_payment,Costs_add,Home_value,PMI_treshold,first_day,date_extra,single_extra,date_single){growth_rate=0;var MILLISECONDS_IN_DAY=24*60*60*1000;if(q2===48){q=52}else if(q2===24){q=26}var equivalent_base=1+r/m;var equivalent_power=m/q;var equivalent_p=Math.pow(equivalent_base,equivalent_power)-1;var currentDate=new Date(first_day);var daysInPeriod=365.25/q;var principal_balance=Loan_amount;var currentPayment=payment+extra_payment;var lumpApplied=false;var lastPmiDate=null;var maxPeriods=t*q*2;for(var i=0;i<maxPeriods;i++){var periodStart=new Date(currentDate);var periodEnd=new Date(currentDate.getTime()+daysInPeriod*MILLISECONDS_IN_DAY);var effectivePayment=currentPayment;if(!lumpApplied&&new Date(date_single).getTime()>=periodStart.getTime()&&new Date(date_single).getTime()<periodEnd.getTime()){effectivePayment=currentPayment+single_extra;lumpApplied=true}var interest=principal_balance*equivalent_p;var principalPayment=effectivePayment-interest;if(principalPayment<0){principalPayment=0}if(principalPayment>principal_balance){principalPayment=principal_balance}var newPrincipal=principal_balance-principalPayment;if(newPrincipal>=Home_value*(1-PMI_treshold)){lastPmiDate=new Date(currentDate)}principal_balance=newPrincipal;if(principal_balance<=0){break}currentPayment=currentPayment*(1+growth_rate);currentDate=new Date(currentDate.getTime()+daysInPeriod*MILLISECONDS_IN_DAY)}return lastPmiDate?lastPmiDate.getTime():0});omni.define("get_principal_paid",function(Loan_amount,payment,r,t,q,q2,q3,m,growth_rate,extra_payment,Costs_add,first_day){growth_rate=0;var MILLISECONDS_IN_DAY=24*60*60*1000;if(q2===48){q=52}else if(q2===24){q=26}var equivalent_base=1+r/m;var equivalent_power=m/q;var equivalent_p=Math.pow(equivalent_base,equivalent_power)-1;var currentDate=new Date(first_day);var daysInPeriod=365.25/q;var principal_balance=Loan_amount;var principal_paid=0;var currentPayment=payment-extra_payment;var maxPeriods=t*q*2;for(var i=0;i<maxPeriods;i++){var interest=principal_balance*equivalent_p;var principalPayment=currentPayment-interest;if(principalPayment<0){principalPayment=0}if(principalPayment>principal_balance){principalPayment=principal_balance}principal_paid+=principalPayment;principal_balance-=principalPayment;if(principal_balance<=0){break}currentPayment=currentPayment*(1+growth_rate);currentDate=new Date(currentDate.getTime()+daysInPeriod*MILLISECONDS_IN_DAY)}return principal_paid});function simulateAmortisation(Loan_amount,payment,r,t,q,q2,q3,m,growth_rate,extra_payment,first_day){growth_rate=0;var MILLISECONDS_IN_DAY=24*60*60*1000;if(q2===48){q=52}else if(q2===24){q=26}var equivalent_base=1+r/m;var equivalent_power=m/q;var equivalent_p=Math.pow(equivalent_base,equivalent_power)-1;var currentDate=new Date(first_day);var daysInPeriod=365.25/q;var principal_balance=Loan_amount;var currentPayment=payment-extra_payment;var payment_count_sum=0;var payoff1=currentDate.getTime();var payoff2=currentPayment!==0?currentDate.getTime():null;var maxPeriods=t*q*2;for(var i=0;i<maxPeriods;i++){var interest=principal_balance*equivalent_p;var principalPayment=currentPayment-interest;if(principalPayment<0){principalPayment=0}if(principalPayment>principal_balance){principalPayment=principal_balance}if(currentPayment>0){payment_count_sum++}principal_balance-=principalPayment;payoff1=currentDate.getTime();if(currentPayment!==0){payoff2=currentDate.getTime()}if(principal_balance<=0){break}currentPayment=currentPayment*(1+growth_rate);currentDate=new Date(currentDate.getTime()+daysInPeriod*MILLISECONDS_IN_DAY)}return{payoff1:payoff1,payoff2:payoff2,payment_count_sum:payment_count_sum,frequency:q}}omni.define("get_payoff1",function(Loan_amount,payment,r,t,q,q2,q3,m,growth_rate,extra_payment,first_day){var sim=simulateAmortisation(Loan_amount,payment,r,t,q,q2,q3,m,growth_rate,extra_payment,first_day);return sim.payoff1});omni.define("get_payoff2",function(Loan_amount,payment,r,t,q,q2,q3,m,growth_rate,extra_payment,first_day){var sim=simulateAmortisation(Loan_amount,payment,r,t,q,q2,q3,m,growth_rate,extra_payment,first_day);return sim.payoff2!==null?sim.payoff2:sim.payoff1});omni.define("get_date_diff_year",function(Loan_amount,payment,r,t,q,q2,q3,m,growth_rate,extra_payment,first_day){var sim=simulateAmortisation(Loan_amount,payment,r,t,q,q2,q3,m,growth_rate,extra_payment,first_day);var n=sim.frequency*t;var diff=(n-sim.payment_count_sum)/sim.frequency;return Math.trunc(diff)});omni.define("get_date_diff_month",function(Loan_amount,payment,r,t,q,q2,q3,m,growth_rate,extra_payment,first_day){var sim=simulateAmortisation(Loan_amount,payment,r,t,q,q2,q3,m,growth_rate,extra_payment,first_day);var n=sim.frequency*t;var diff=(n-sim.payment_count_sum)/sim.frequency;var diffYear=Math.trunc(diff);return Math.round((diff-diffYear)*12)});omni.define("get_interest_paid_noextra",function(Loan_amount,payment,r,t,q,q2,q3,m,growth_rate,extra_payment,first_day){growth_rate=0;if(q2===48){q=52}else if(q2===24){q=26}var equivalent_base=1+r/m;var equivalent_power=m/q;var equivalent_p=Math.pow(equivalent_base,equivalent_power)-1;var interest_paid_noextra=0;var principal_balance_noextra=Loan_amount;var payment_noextra=payment-extra_payment;var maxPeriods=t*q*2;for(var i=0;i<maxPeriods;i++){var interest=principal_balance_noextra*equivalent_p;var principal_payment=payment_noextra-interest;if(principal_payment<0){principal_payment=0}if(principal_payment>principal_balance_noextra){principal_payment=principal_balance_noextra}interest_paid_noextra+=interest;principal_balance_noextra-=principal_payment;if(principal_balance_noextra<=0){break}payment_noextra=payment_noextra*(1+growth_rate)}return interest_paid_noextra});omni.define("get_repayment_term",function(mortgage_payoff_date,first_day){var differenceInSeconds=Math.abs(mortgage_payoff_date-first_day);return differenceInSeconds/1000});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Mortgage prepayment works out Payment frequency and Q2 from Mortgage amount, Interest rate and Loan term. The arithmetic is the whole method: payment frequency is worked out from mortgage amount by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Mortgage prepayment calculator works', 'html' => <<<'TXT'
            <p>Mortgage prepayment answers one question from 43 numbers, and the answer is Payment frequency, Q2 and Ct1.</p><p>Written with the labels from the form, Payment gen = Eq p × Mortgage amount × (Eq p + 1)^(N) ÷ ((Eq p + 1)^(N) − 1).</p><p>What comes back is Payment frequency, Q2, Ct1 and Ct2 — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 43 boxes, and nothing else.</p><ul><li><strong>Mortgage amount</strong> — in USD. Your original or remaining loan principal to be repaid on a monthly basis.</li><li><strong>Interest rate</strong> — in percent. Yearly rate of interest.</li><li><strong>Loan term</strong> — in years. If the set mortgage amount is your original loan, then set here the original term.</li><li><strong>Interest calculation method</strong> — a plain number, no unit. You can set how often the bank calculate the interest on the principal balance.</li><li><strong>One the day of</strong> — a plain number, no unit, entered as a date. The date your next mortgage payment is due.</li><li><strong>Payment</strong> — in USD. The loan installment that you are obliged to pay at the due date of each agreed payment frequency (if you set extra periodic payment, the additional amount also appears here).</li><li><strong>Payment frequency</strong> — a plain number, no unit. In the case of accelerated bi-weekly (or weekly) options, payments are the half (or quarter) of your original monthly payment but paid every second week (or weekly).</li><li><strong>Periodic prepayment</strong> — in USD. Here you can set an additional amount of money that you wish to contribute to your calculated loan installments. Note that after signing a mortgage contract you may charged for altering the amount of the installment stated in the contract.</li><li><strong>Starting from</strong> — a plain number, no unit, entered as a date. You can set here from which date onward you will add extra money to your installments.</li><li><strong>Lump sum prepayment</strong> — in USD. Here you can set a one off payment to your mortgage on a specific date. Note that depending on your contract, the bank may charge you an extra fee for any advance payment.</li><li><strong>Paid on</strong> — a plain number, no unit, entered as a date. This is the specific date when your individual prepayment is applied. Note that if the selected date doesn&#039;t coincide with the due date of your periodic payment, the amount will be added on the following payment due date.</li><li><strong>Payment monthly</strong> — a plain number, no unit</li><li><strong>Payment accelerated</strong> — a plain number, no unit</li><li><strong>Eq p</strong> — a plain number, no unit</li><li><strong>Payment gen</strong> — a plain number, no unit</li><li><strong>Total periodic payment</strong> — in USD. It is the total payment with additional costs you need to pay periodically. Note that although the due date of other expenses may divert from the payment frequency, here we rely on the due date of your loan installments.</li><li><strong>Details</strong> — a plain number, no unit</li><li><strong>Total payment monthly</strong> — a plain number, no unit</li><li><strong>Display</strong> — a plain number, no unit</li><li><strong>Eq p monthly</strong> — a plain number, no unit</li><li><strong>G t</strong> — a plain number, no unit</li><li><strong>Due dates from</strong> — a plain number, no unit, entered as a date. By setting this date you can see the details of your periodic balances for one year onward.</li><li><strong>Growth rate</strong> — in percent</li><li><strong>Annual Breakdown &amp; Amortization table</strong> — a plain number, no unit. The table shows details for one year from the above chosen date for a balance on a specific date.</li><li><strong>N monthly</strong> — a plain number, no unit</li><li><strong>N</strong> — a plain number, no unit</li><li><strong>Var rep</strong> — a plain number, no unit</li><li><strong>Home value</strong> — in USD. The purchase price of the property.</li><li><strong>Down payment</strong> — in USD. The total cash available for the house purchase.</li><li><strong>Down payment in percentage</strong> — in percent. If your down payment is lower than 20 percent of the house&#039;s value, you are obliged to pay Private Mortgage Insurance (PMI).</li><li><strong>Monthly HOA fees</strong> — in USD. Homeowners association fee that covers the expenses of maintaining and improving the property.</li><li><strong>Pmi periodic</strong> — a plain number, no unit</li><li><strong>Costs add</strong> — a plain number, no unit</li><li><strong>Property tax</strong> — in USD. Administered by the local government and utilized for road maintenance and costs of other public services. It is typically based on the value of the property.</li><li><strong>Annual homeowner insurance</strong> — in USD. An insurance policy that provides compensation for damage, loss or injury of property and it belongings in case of fire, theft or other accidents.</li><li><strong>Other monthly costs</strong> — in USD. You may set here any further costs that relate to your mortgage.</li><li><strong>Extra payment yearly</strong> — in USD</li><li><strong>PMI treshold</strong> — in percent. Currently the typical threshold of PMI in the US is 20 percent, still you may change it according to the specific loan construction.</li><li><strong>PMI</strong> — in percent. Private Mortgage Insurance - this additional fee typically costs in the US between 0.5% to 1% of the entire loan amount on an annual basis. Note that after your home value to loan principal reaches a particular threshold (typically 20 percent) you can cancel this additional fee.</li><li><strong>Yearly increase in payments</strong> — in percent. Here you may set a percentage rate of growth in your payments that may reflect the average yearly increase of your income during the loan term. Note that you always should consult your bank before transferring any additional amount above your installment stated in the loan contract as most of the banks charge you an extra fee.</li><li><strong>Mortgage payoff date</strong> — a plain number, no unit, entered as a date</li><li><strong>Ori mortgage payoff date</strong> — a plain number, no unit, entered as a date</li><li><strong>Payment count</strong> — a plain number, no unit</li></ul><p>The result boxes are Payment frequency, Q2, Ct1, Ct2, Q3; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Interest rate lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Payment gen</strong> = <code>Eq p × Mortgage amount × (Eq p + 1)^(N) ÷ ((Eq p + 1)^(N) − 1)</code></li><li><strong>N</strong> = <code>ln(Payment gen ÷ (Payment gen − Eq p × Mortgage amount)) ÷ ln(Eq p + 1)</code></li><li><strong>Mortgage amount</strong> = <code>Payment gen ÷ Eq p − Payment gen × (Eq p + 1)^(− N) ÷ Eq p</code></li><li><strong>Eq p</strong> = <code>((Interest calculation method + Interest rate) ÷ Interest calculation method)^(Interest calculation method ÷ Payment frequency) − 1</code></li><li><strong>Interest rate</strong> = <code>Interest calculation method × ((Eq p + 1)^(Payment frequency ÷ Interest calculation method) − 1)</code></li><li><strong>Payment frequency</strong> = <code>Interest calculation method × ln((Interest calculation method + Interest rate) ÷ Interest calculation method) ÷ ln(Eq p + 1)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Payment gen</strong> = <code>Eq p × Mortgage amount × (Eq p + 1)^(N) ÷ ((Eq p + 1)^(N) − 1)</code> — the form to use when Eq p, Mortgage amount and N are the values you have.</li><li><strong>N</strong> = <code>ln(Payment gen ÷ (Payment gen − Eq p × Mortgage amount)) ÷ ln(Eq p + 1)</code> — the form to use when Payment gen, Eq p and Mortgage amount are the values you have.</li><li><strong>Mortgage amount</strong> = <code>Payment gen ÷ Eq p − Payment gen × (Eq p + 1)^(− N) ÷ Eq p</code> — the form to use when Payment gen, Eq p and N are the values you have.</li><li><strong>Eq p</strong> = <code>((Interest calculation method + Interest rate) ÷ Interest calculation method)^(Interest calculation method ÷ Payment frequency) − 1</code> — the form to use when Interest calculation method, Interest rate and Payment frequency are the values you have.</li><li><strong>Interest rate</strong> = <code>Interest calculation method × ((Eq p + 1)^(Payment frequency ÷ Interest calculation method) − 1)</code> — the form to use when Interest calculation method, Eq p and Payment frequency are the values you have.</li><li><strong>Payment frequency</strong> = <code>Interest calculation method × ln((Interest calculation method + Interest rate) ÷ Interest calculation method) ÷ ln(Eq p + 1)</code> — the form to use when Interest calculation method, Interest rate and Eq p are the values you have.</li><li><strong>N</strong> = <code>Payment frequency × Loan term</code> — the form to use when Payment frequency and Loan term are the values you have.</li><li><strong>Loan term</strong> = <code>N ÷ Payment frequency</code> — the form to use when N and Payment frequency are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Payment gen, N and Mortgage amount can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Interest rate, Loan term and Growth rate carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Payment frequency, Q2 and Ct1 are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Mortgage amount left as a guess.</strong> Anything typed into Mortgage amount is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Interest rate left as a guess.</strong> Anything typed into Interest rate is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Mortgage amount and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Payment frequency is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The chips cover percent and years. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It counts in whole days.</strong> The differences are counted in whole days, so an answer is a date or a number of days rather than an interval in hours. Expect a day&#039;s uncertainty if the event itself happened at an unknown time.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Mortgage amount, Interest rate and Loan term measured, Payment frequency and Q2 wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/break-even">Break even</a>, <a href="/finance/brexit">Brexit Calculator</a> and <a href="/finance/budget">Budget Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Mortgage prepayment calculator work out?', 'a' => <<<'TXT'
            Payment frequency, Q2, Ct1 and Ct2, from Eq p, Mortgage amount and N. The relationship is Payment gen = Eq p × Mortgage amount × (Eq p + 1)^(N) ÷ ((Eq p + 1)^(N) − 1).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Mortgage amount (USD), Interest rate (percent), Loan term (years), Interest calculation method, One the day of. Enter mortgage amount, interest rate and loan term; Payment frequency is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Payment gen, N, Mortgage amount and Eq p can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Payment frequency is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Mortgage amount blank and the page solves for it, reporting Payment frequency instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Payment frequency keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/break-even', 'name' => 'Break even'],
            ['path' => '/finance/brexit', 'name' => 'Brexit Calculator'],
            ['path' => '/finance/budget', 'name' => 'Budget Calculator'],
        ],
        'authors' => [],
    ],
];
