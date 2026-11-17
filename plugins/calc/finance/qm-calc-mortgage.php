<?php

/**
 * Mortgage
 * /finance/mortgage
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Mortgage',
    'meta' => ['title' => 'Mortgage Calculator: Formula, Steps & Examples', 'description' => 'Mortgage reports down payment in percentage, loan amount, payment and total periodic payment. Results come back in perc, with any other unit a click away.', 'h1' => 'Mortgage Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'home_value',
                            'label' => 'Home value',
                            'type' => 'number',
                            'help' => 'The purchase price of the property.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '150000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'down_payment',
                            'label' => 'Down payment',
                            'type' => 'number',
                            'help' => 'The total cash available for the house purchase.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '15000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'down_payment_percentage',
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
                            'name' => 'loan_amount',
                            'label' => 'Loan amount',
                            'type' => 'number',
                            'help' => 'This is the value of your mortgage loan, in other words the loan principal.',
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
                            'name' => 'int_rate',
                            'label' => 'Interest rate',
                            'type' => 'number',
                            'help' => 'Yearly rate of interest.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '4.5',
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
                            'help' => <<<'TXT'
                            The length of time over which you are obliged to pay off your mortgage. Note that it is not equal to the amortization term (the actual time for the repayment of the principal), that is, you may pay off the whole principal amount before the end of the loan term. Possible options include an accelerated loan construction or extra payments.
                            TXT,
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '30',
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
                            'options' => ['Semi-annually (Canada)' => '2', 'Monthly (US & UK)' => '12'],
                            'dataset' => 'comp_freq',
                            'control' => 'DROPDOWN',
                            'help' => 'You can set how often the bank calculate the interest on the principal balance.',
                            'default' => 'Monthly (US & UK)',
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
                            'options' => [
                                'Monthly' => '12',
                                'Semi-monthly' => '24',
                                'Bi-weekly' => '26',
                                'Accelerated bi-weekly' => '12',
                                'Weekly' => '52',
                                'Accelerated weekly' => '12',
                            ],
                            'dataset' => 'pay_freq_options',
                            'control' => 'DROPDOWN',
                            'help' => 'Note that in the US, accelerated weekly and bi-weekly payments refer simply to the weekly and bi-weekly payments.',
                            'default' => 'Monthly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'first_day', 'label' => 'First day', 'type' => 'date', 'help' => 'The first payment is due on this date.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'payment',
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
            'title' => 'Further specifications',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'extra_payment',
                            'label' => 'Extra periodic payment',
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
                        [
                            'name' => 'pay_inc',
                            'label' => 'Yearly increase in payments',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            Here you may set a percentage rate of growth in your payments that may reflect the average yearly increase of your income during the loan term. Note that you always should consult your bank before transferring any additional amount above your installment stated in the loan contract as most of the banks charge you an extra fee.
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
                        ['name' => 'date_extra', 'label' => 'Starting from', 'type' => 'date', 'help' => 'You can set here from which date onward you will add extra money to your installments (also including the yearly increase in payments).'],
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
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pmi',
                            'label' => 'PMI',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            Private Mortgage Insurance - this additional fee typically costs in the US between 0.5% to 1% of the entire loan amount on an annual basis. Note that after your home value to loan principal reaches a particular threshold (typically 20 percent) you can cancel this additional fee.
                            TXT,
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.5',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pmi_treshold',
                            'label' => 'PMI treshold',
                            'type' => 'number',
                            'help' => 'Currently the typical threshold of PMI in the US is 20 percent, still you may change it according to the specific loan construction.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'property_tax',
                            'label' => 'Property tax',
                            'type' => 'number',
                            'help' => 'Administered by the local government and utilized for road maintenance and costs of other public services. It is typically based on the value of the property.',
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
                            'name' => 'home_insurance',
                            'label' => 'Annual homeowner insurance',
                            'type' => 'number',
                            'help' => 'An insurance policy that provides compensation for damage, loss or injury of property and it belongings in case of fire, theft or other accidents.',
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
                            'name' => 'hoa_fee',
                            'label' => 'Monthly HOA fees',
                            'type' => 'number',
                            'help' => 'Homeowners association fee that covers the expenses of maintaining and improving the property.',
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
                            'name' => 'other_costs',
                            'label' => 'Other monthly costs',
                            'type' => 'number',
                            'help' => 'You may set here any further costs that relate to your mortgage.',
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
                            'name' => 'total_payment_2',
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
            ],
        ],
        [
            'title' => 'Mortgage Summary',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => '(payoff2 == payoff1) or (date_diff_year == 0 and date_diff_month == 0)', 'text' => 'Your mortgage payoff date is {{mortgage_payoff_date.formattedValue}}.'],
                                ['when' => 'payoff2 != payoff1 and date_diff_year > 0 and date_diff_month > 0', 'text' => <<<'TXT'
                                Your mortgage payoff date is {{mortgage_payoff_date.formattedValue}}, which is {{date_diff_year.formattedValue}} year(s) and {{date_diff_month.formattedValue}} month(s) earlier than the end of the full loan term.
                                TXT],
                                ['when' => 'payoff2 != payoff1 and date_diff_year == 0 and date_diff_month > 0', 'text' => <<<'TXT'
                                Your mortgage payoff date is {{mortgage_payoff_date.formattedValue}}, which is {{date_diff_month.formattedValue}} month(s) earlier than the end of the full loan term.
                                TXT],
                                ['when' => 'payoff2 != payoff1 and date_diff_month == 0 and date_diff_year != 0', 'text' => <<<'TXT'
                                Your mortgage payoff date is {{mortgage_payoff_date.formattedValue}}, which is {{date_diff_year.formattedValue}} year(s) earlier than the end of the full loan term.
                                TXT],
                                ['when' => null, 'text' => <<<'TXT'
                                The total of the {{payment_count.formattedValue}} mortgage payments is {{total_payment.monetaryValue}}. From that, the total interest payment is {{interest_paid.monetaryValue}}.
                                TXT],
                                ['when' => 'pmi_total > 0', 'text' => <<<'TXT'
                                The total payable Private Mortgage Insurance (PMI) is {{pmi_total.monetaryValue}}, with a {{pmi_html.monetaryValue}} periodic contribution, that needs to be paid until {{mortgage_payoff_pmi_date.formattedValue}}.
                                TXT],
                                ['when' => 'costs_add_total > 0', 'text' => 'Besides, you need to pay in {{costs_add_total.monetaryValue}} for additional costs.'],
                                ['when' => 'total_payment_monthly - loan_amount - interest_paid_noextra > 1 and interest_paid_noextra - interest_paid != 0', 'text' => <<<'TXT'
                                By the non-monthly payment frequency you can save {{non_monthly_payment_save.monetaryValue}} and by the extra payments {{extra_payment_save.monetaryValue}} of interest. Overall, you can save {{total_payment_save.monetaryValue}} of interest by reducing the amortization term.
                                TXT],
                                ['when' => 'total_payment_monthly - loan_amount - interest_paid_noextra < 1 and interest_paid_noextra - interest_paid != 0', 'text' => 'By the extra payments you can save {{extra_payment_save.monetaryValue}} of interest.'],
                                ['when' => 'total_payment_monthly - loan_amount - interest_paid_noextra > 1 and interest_paid_noextra - interest_paid == 0', 'text' => 'By the non-monthly payment frequency you can save {{non_monthly_payment_save.monetaryValue}} of interest.'],
                                ['when' => 'pmi_total + costs_add_total > 0', 'text' => 'Your total payment with all additional costs is {{payment_full.monetaryValue}}.'],
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
                            'name' => 'extra_payment_yearly',
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
                            'name' => 'costs_add',
                            'label' => 'Costs add',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pmi_periodic',
                            'label' => 'Pmi periodic',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'payment_accelerated',
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
                            'name' => 'payment_gen',
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
                            'name' => 'payment_monthly',
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
                            'name' => 'yearly_balances',
                            'label' => 'Yearly balances',
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
                            'name' => 'total_payment_monthly',
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
                        [
                            'name' => 'growth_rate',
                            'label' => 'Growth rate',
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
                            'name' => 'pie_chart',
                            'label' => 'Pie chart',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
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
                        ['name' => 'mortgage_payoff_date', 'label' => 'Mortgage payoff date2', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'mortgage_payoff_pmi_date', 'label' => 'Mortgage payoff pmi date', 'type' => 'date'],
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
                            'name' => 'interest_paid',
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
                            'name' => 'pmi_total',
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
                            'name' => 'pmi_html',
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
                            'name' => 'costs_add_total',
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
                            'name' => 'payment_full',
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
                            'name' => 'principal_paid',
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
                            'name' => 'payoff1',
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
                            'name' => 'payoff2',
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
                            'name' => 'date_diff_year',
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
                            'name' => 'date_diff_month',
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
                            'name' => 'interest_paid_noextra',
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
                            'name' => 'non_monthly_payment_save',
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
                            'name' => 'extra_payment_save',
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
                            'name' => 'total_payment_save',
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
            'title' => 'payment_gen = (loan_amount * eq_p * (1 + eq_p) ^ n) / ((1 + eq_p) ^ n - 1) ',
            'results' => ['n' => 'log(-payment_gen/(eq_p*loan_amount - payment_gen))/log(eq_p + 1)', 'payment_gen' => 'eq_p*loan_amount*pow(eq_p + 1, n)/(pow(eq_p + 1, n) - 1)', 'loan_amount' => 'payment_gen/eq_p - payment_gen*pow(eq_p + 1, -n)/eq_p'],
        ],
        [
            'title' => 'eq_p = (1 + int_rate / calc_method) ^ (calc_method / pay_freq) - 1',
            'results' => ['int_rate' => 'calc_method*(pow(eq_p + 1, pay_freq/calc_method) - 1)', 'eq_p' => 'pow((calc_method + int_rate)/calc_method, calc_method/pay_freq) - 1', 'pay_freq' => 'calc_method*log((calc_method + int_rate)/calc_method)/log(eq_p + 1)'],
        ],
        [
            'title' => 'n = pay_freq * term',
            'results' => ['pay_freq' => 'n/term', 'n' => 'pay_freq*term', 'term' => 'n/pay_freq'],
        ],
        [
            'title' => 'payment_accelerated = payment_gen * pay_freq / q2',
            'results' => ['payment_gen' => 'payment_accelerated*q2/pay_freq', 'pay_freq' => 'payment_accelerated*q2/payment_gen', 'payment_accelerated' => 'pay_freq*payment_gen/q2', 'q2' => 'pay_freq*payment_gen/payment_accelerated'],
        ],
        [
            'title' => 'payment = one_way(payment_gen * ct1 + payment_accelerated * ct2 + extra_payment)',
            'results' => ['payment' => '(ct1*payment_gen + ct2*payment_accelerated + extra_payment)'],
        ],
        [
            'title' => 'n_monthly = 12 * term',
            'results' => ['n_monthly' => '12*term', 'term' => '(1/12)*n_monthly'],
        ],
        [
            'title' => 'eq_p_monthly = ((1 + int_rate / calc_method) ^ (calc_method / 12) - 1)',
            'results' => ['int_rate' => 'calc_method*(pow(pow(eq_p_monthly + 1, 12), 1/calc_method) - 1)', 'eq_p_monthly' => 'pow((calc_method + int_rate)/calc_method, (1/12)*calc_method) - 1'],
        ],
        [
            'title' => 'payment_monthly = (loan_amount * eq_p_monthly * (1 + eq_p_monthly) ^ n_monthly) / ((1 + eq_p_monthly) ^ n_monthly - 1)',
            'results' => ['n_monthly' => 'log(-payment_monthly/(eq_p_monthly*loan_amount - payment_monthly))/log(eq_p_monthly + 1)', 'payment_monthly' => 'eq_p_monthly*loan_amount*pow(eq_p_monthly + 1, n_monthly)/(pow(eq_p_monthly + 1, n_monthly) - 1)', 'loan_amount' => 'payment_monthly/eq_p_monthly - payment_monthly*pow(eq_p_monthly + 1, -n_monthly)/eq_p_monthly'],
        ],
        [
            'title' => 'total_payment_monthly = payment_monthly * n_monthly',
            'results' => ['n_monthly' => 'total_payment_monthly/payment_monthly', 'payment_monthly' => 'total_payment_monthly/n_monthly', 'total_payment_monthly' => 'n_monthly*payment_monthly'],
        ],
        [
            'title' => 'pay_inc + 1 = (1 + g_t / q3) ^ q3 ',
            'results' => ['g_t' => 'q3*(pow(pay_inc + 1, 1/q3) - 1)', 'pay_inc' => 'pow((g_t + q3)/q3, q3) - 1'],
        ],
        [
            'title' => 'growth_rate = g_t / q3',
            'results' => ['g_t' => 'growth_rate*q3', 'growth_rate' => 'g_t/q3', 'q3' => 'g_t/growth_rate'],
        ],
        [
            'title' => 'extra_payment_yearly = extra_payment * q3',
            'results' => ['extra_payment_yearly' => 'extra_payment*q3', 'extra_payment' => 'extra_payment_yearly/q3', 'q3' => 'extra_payment_yearly/extra_payment'],
        ],
        [
            'title' => 'pmi_periodic = loan_amount * pmi / q3',
            'results' => ['pmi_periodic' => 'loan_amount*pmi/q3', 'loan_amount' => 'pmi_periodic*q3/pmi', 'pmi' => 'pmi_periodic*q3/loan_amount', 'q3' => 'loan_amount*pmi/pmi_periodic'],
        ],
        [
            'title' => 'loan_amount = home_value - down_payment',
            'results' => ['down_payment' => 'home_value - loan_amount', 'home_value' => 'down_payment + loan_amount', 'loan_amount' => '-down_payment + home_value'],
        ],
        [
            'title' => 'down_payment_percentage =  one_way(down_payment / home_value)',
            'results' => ['down_payment_percentage' => '(down_payment/home_value)'],
        ],
        [
            'title' => 'costs_add = property_tax + home_insurance + hoa_fee * 12 + other_costs * 12 ',
            'results' => [
                'home_insurance' => 'costs_add - 12*hoa_fee - 12*other_costs - property_tax',
                'hoa_fee' => '(1/12)*costs_add - 1/12*home_insurance - other_costs - 1/12*property_tax',
                'other_costs' => '(1/12)*costs_add - hoa_fee - 1/12*home_insurance - 1/12*property_tax',
                'property_tax' => 'costs_add - 12*hoa_fee - home_insurance - 12*other_costs',
                'costs_add' => '12*hoa_fee + home_insurance + 12*other_costs + property_tax',
            ],
        ],
        [
            'title' => 'total_payment_2 = one_way(payment + pmi_periodic + costs_add / q3)',
            'results' => ['total_payment_2' => '(costs_add/q3 + pmi_periodic + (ct1*payment_gen + ct2*payment_accelerated + extra_payment))'],
        ],
        [
            'title' => <<<'TXT'
            payment_count = get_payment_count(loan_amount, payment, int_rate, term, pay_freq, q2, q3, calc_method, growth_rate, extra_payment, first_day, date_extra, single_extra, date_single)
            TXT,
            'results' => ['payment_count' => <<<'TXT'
            get_payment_count(loan_amount, (ct1*payment_gen + ct2*payment_accelerated + extra_payment), int_rate, term, pay_freq, q2, q3, calc_method, growth_rate, extra_payment, first_day, date_extra, single_extra, date_single)
            TXT],
        ],
        [
            'title' => 'mortgage_payoff_date = get_mortgage_payoff_date(first_day, payment_count, q3)',
            'results' => ['mortgage_payoff_date' => <<<'TXT'
            get_mortgage_payoff_date(first_day, get_payment_count(loan_amount, (ct1*payment_gen + ct2*payment_accelerated + extra_payment), int_rate, term, pay_freq, q2, q3, calc_method, growth_rate, extra_payment, first_day, date_extra, single_extra, date_single), q3)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            mortgage_payoff_pmi_date = get_mortgage_payoff_pmi_date(loan_amount, payment, int_rate, term, pay_freq, q2, q3, calc_method, growth_rate, extra_payment, costs_add, home_value, pmi_treshold, first_day)
            TXT,
            'results' => ['mortgage_payoff_pmi_date' => <<<'TXT'
            get_mortgage_payoff_pmi_date(loan_amount, (ct1*payment_gen + ct2*payment_accelerated + extra_payment), int_rate, term, pay_freq, q2, q3, calc_method, growth_rate, extra_payment, costs_add, home_value, pmi_treshold, first_day)
            TXT],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";var MILLISECONDS_IN_DAY=24*60*60*1000;omni.define("get_interest_paid",function(first_day,Loan_amount,q,q2,q3,t,r,m,payment,extra_payment,date_extra,date_single,single_extra,growth_rate,Costs_add,PMI_periodic){var MILLISECONDS_IN_DAY=24*60*60*1000;if(q2===48){q=52}else if(q2===24){q=26}var periods=t*q+1;var equivalent_base=1+r/m;var equivalent_power=m/q;var equivalent_p=Math.pow(equivalent_base,equivalent_power)-1;var firstDate=new Date(first_day);var extraDate=new Date(date_extra);var singleExtraDate=new Date(date_single);var payment2;if(extraDate.getTime()<=firstDate.getTime()){payment2=payment/(1+growth_rate)}else{payment2=payment+extra_payment}var principal_balance=Loan_amount;var interest_paid=0;var days_in_period=q===12?30.44:365.25/q;var currentDate=new Date(first_day);var lumpApplied=false;for(var i=1;i<=periods;i++){var periodStart=new Date(currentDate);currentDate=new Date(periodStart.getTime()+days_in_period*MILLISECONDS_IN_DAY);var effectivePayment=payment2;if(!lumpApplied&&singleExtraDate.getTime()>=periodStart.getTime()&&singleExtraDate.getTime()<currentDate.getTime()){effectivePayment=payment2+single_extra;lumpApplied=true}var interest_amount=principal_balance*equivalent_p;interest_paid+=interest_amount;var principal_payment=effectivePayment-interest_amount;if(principal_payment<0){principal_payment=0}if(principal_payment>principal_balance){principal_payment=principal_balance}principal_balance-=principal_payment;if(principal_balance<0){principal_balance=0}payment2=payment2*(1+growth_rate);if(principal_balance<=0){break}}return interest_paid});omni.define("get_payment_count",function(Loan_amount,payment,r,t,q,q2,q3,m,growth_rate,extra_payment,first_day,date_extra,single_extra,date_single){var MILLISECONDS_IN_DAY=24*60*60*1000;if(q2===48){q=52}else if(q2===24){q=26}var periods=t*q+1;var equivalent_base=1+r/m;var equivalent_power=m/q;var equivalent_p=Math.pow(equivalent_base,equivalent_power)-1;var firstDate=new Date(first_day);var extraDate=new Date(date_extra);var singleExtraDate=new Date(date_single);var payment2;if(extraDate.getTime()<=firstDate.getTime()){payment2=payment/(1+growth_rate)}else{payment2=payment+extra_payment}var principal_balance=Loan_amount;var payment_count_sum=0;var days_in_period=q===12?30.44:365.25/q;var currentDateSim=new Date(first_day);var lumpApplied=false;for(var i=1;i<=periods;i++){var periodStart=new Date(currentDateSim);currentDateSim=new Date(periodStart.getTime()+days_in_period*MILLISECONDS_IN_DAY);var effectivePayment=payment2;if(!lumpApplied&&singleExtraDate.getTime()>=periodStart.getTime()&&singleExtraDate.getTime()<=currentDateSim.getTime()){effectivePayment=payment2+single_extra;lumpApplied=true}var interest_amount=principal_balance*equivalent_p;var principal_amount=effectivePayment-interest_amount;if(principal_amount<0){principal_amount=0}var payment_amount=principal_amount+interest_amount;if(payment_amount>0){payment_count_sum+=1}principal_balance-=principal_amount;if(principal_balance<0){principal_balance=0}payment2=payment2*(1+growth_rate);if(principal_balance<=0){break}}return payment_count_sum});omni.define("get_pmi_total",function(Loan_amount,payment,r,t,q,q2,q3,m,growth_rate,extra_payment,Home_value,PMI_treshold,first_day,date_extra,single_extra,date_single,base_PMI_periodic){var MILLISECONDS_IN_DAY=24*60*60*1000;if(q2===48){q=52}else if(q2===24){q=26}var periods=t*q+1;var equivalent_base=1+r/m;var equivalent_power=m/q;var equivalent_p=Math.pow(equivalent_base,equivalent_power)-1;var firstDate=new Date(first_day);var extraDate=new Date(date_extra);var singleExtraDate=new Date(date_single);var payment2;if(extraDate.getTime()<=firstDate.getTime()){payment2=payment/(1+growth_rate)}else{payment2=payment+extra_payment}var days_in_period=q===12?30.44:365.25/q;var currentDateSim=new Date(first_day);var principal_balance=Loan_amount;var PMI_total=0;var lumpApplied=false;for(var i=1;i<=periods;i++){var periodStart=new Date(currentDateSim);currentDateSim=new Date(periodStart.getTime()+days_in_period*MILLISECONDS_IN_DAY);var effectivePayment=payment2;if(!lumpApplied&&singleExtraDate.getTime()>=periodStart.getTime()&&singleExtraDate.getTime()<currentDateSim.getTime()){effectivePayment=payment2+single_extra;lumpApplied=true}var interest_amount=principal_balance*equivalent_p;var principal_amount=effectivePayment-interest_amount;if(principal_amount<0){principal_amount=0}if(principal_amount>principal_balance){principal_amount=principal_balance}var remainingBalance=principal_balance-principal_amount;var PMI_this_period=remainingBalance<Home_value*(1-PMI_treshold)?0:base_PMI_periodic;PMI_total+=PMI_this_period;principal_balance-=principal_amount;if(principal_balance<0){principal_balance=0}payment2=payment2*(1+growth_rate);if(principal_balance<=0){break}}return PMI_total});omni.define("get_pmi_html",function(Loan_amount,Home_value,PMI_treshold,base_PMI_periodic){if(Loan_amount<Home_value*(1-PMI_treshold)){return 0}return base_PMI_periodic});omni.define("get_costs_add_total",function(Loan_amount,payment,r,t,q,q2,q3,m,growth_rate,extra_payment,Costs_add){var periods=t*q+1;if(q2===48){q=52;periods=t*52}else if(q2===24){q=26;periods=t*26}var equivalent_base=1+r/m;var equivalent_power=m/q;var equivalent_p=Math.pow(equivalent_base,equivalent_power)-1;var payment2=payment-extra_payment;var principal_balance=Loan_amount;var Costs_add_total=0;for(var i=1;i<=periods;i++){var interest_amount=principal_balance*equivalent_p;var principal_amount=payment2-interest_amount;if(principal_amount<0){principal_amount=0}var period_cost=principal_balance===0?0:Costs_add;Costs_add_total+=period_cost;principal_balance-=principal_amount;if(principal_balance<0){principal_balance=0}payment2=payment2*(1+growth_rate);if(principal_balance<=0){break}}if(q2===1){Costs_add_total=Costs_add*q3*t}return Costs_add_total});omni.define("get_mortgage_payoff_date",function(first_day,payment_count,q3){return first_day+payment_count/q3*365.25*MILLISECONDS_IN_DAY});omni.define("get_mortgage_payoff_pmi_date",function(Loan_amount,payment,r,t,q,q2,q3,m,growth_rate,extra_payment,Costs_add,Home_value,PMI_treshold,first_day,date_extra,single_extra,date_single){var MILLISECONDS_IN_DAY=24*60*60*1000;if(q2===48){q=52}else if(q2===24){q=26}var equivalent_base=1+r/m;var equivalent_power=m/q;var equivalent_p=Math.pow(equivalent_base,equivalent_power)-1;var currentDate=new Date(first_day);var daysInPeriod=365.25/q;var principal_balance=Loan_amount;var currentPayment=payment+extra_payment;var lumpApplied=false;var lastPmiDate=null;var maxPeriods=t*q*2;for(var i=0;i<maxPeriods;i++){var periodStart=new Date(currentDate);var periodEnd=new Date(currentDate.getTime()+daysInPeriod*MILLISECONDS_IN_DAY);var effectivePayment=currentPayment;if(!lumpApplied&&new Date(date_single).getTime()>=periodStart.getTime()&&new Date(date_single).getTime()<periodEnd.getTime()){effectivePayment=currentPayment+single_extra;lumpApplied=true}var interest=principal_balance*equivalent_p;var principalPayment=effectivePayment-interest;if(principalPayment<0){principalPayment=0}if(principalPayment>principal_balance){principalPayment=principal_balance}var newPrincipal=principal_balance-principalPayment;if(newPrincipal>=Home_value*(1-PMI_treshold)){lastPmiDate=new Date(currentDate)}principal_balance=newPrincipal;if(principal_balance<=0){break}currentPayment=currentPayment*(1+growth_rate);currentDate=new Date(currentDate.getTime()+daysInPeriod*MILLISECONDS_IN_DAY)}return lastPmiDate?lastPmiDate.getTime():0});omni.define("get_principal_paid",function(Loan_amount,payment,r,t,q,q2,q3,m,growth_rate,extra_payment,Costs_add,first_day){var MILLISECONDS_IN_DAY=24*60*60*1000;if(q2===48){q=52}else if(q2===24){q=26}var equivalent_base=1+r/m;var equivalent_power=m/q;var equivalent_p=Math.pow(equivalent_base,equivalent_power)-1;var currentDate=new Date(first_day);var daysInPeriod=365.25/q;var principal_balance=Loan_amount;var principal_paid=0;var currentPayment=payment-extra_payment;var maxPeriods=t*q*2;for(var i=0;i<maxPeriods;i++){var interest=principal_balance*equivalent_p;var principalPayment=currentPayment-interest;if(principalPayment<0){principalPayment=0}if(principalPayment>principal_balance){principalPayment=principal_balance}principal_paid+=principalPayment;principal_balance-=principalPayment;if(principal_balance<=0){break}currentPayment=currentPayment*(1+growth_rate);currentDate=new Date(currentDate.getTime()+daysInPeriod*MILLISECONDS_IN_DAY)}return principal_paid});function simulateAmortisation(Loan_amount,payment,r,t,q,q2,q3,m,growth_rate,extra_payment,first_day){var MILLISECONDS_IN_DAY=24*60*60*1000;if(q2===48){q=52}else if(q2===24){q=26}var equivalent_base=1+r/m;var equivalent_power=m/q;var equivalent_p=Math.pow(equivalent_base,equivalent_power)-1;var currentDate=new Date(first_day);var daysInPeriod=365.25/q;var principal_balance=Loan_amount;var currentPayment=payment-extra_payment;var payment_count_sum=0;var payoff1=currentDate.getTime();var payoff2=currentPayment!==0?currentDate.getTime():null;var maxPeriods=t*q*2;for(var i=0;i<maxPeriods;i++){var interest=principal_balance*equivalent_p;var principalPayment=currentPayment-interest;if(principalPayment<0){principalPayment=0}if(principalPayment>principal_balance){principalPayment=principal_balance}if(currentPayment>0){payment_count_sum++}principal_balance-=principalPayment;payoff1=currentDate.getTime();if(currentPayment!==0){payoff2=currentDate.getTime()}if(principal_balance<=0){break}currentPayment=currentPayment*(1+growth_rate);currentDate=new Date(currentDate.getTime()+daysInPeriod*MILLISECONDS_IN_DAY)}return{payoff1:payoff1,payoff2:payoff2,payment_count_sum:payment_count_sum,frequency:q}}omni.define("get_payoff1",function(Loan_amount,payment,r,t,q,q2,q3,m,growth_rate,extra_payment,first_day){var sim=simulateAmortisation(Loan_amount,payment,r,t,q,q2,q3,m,growth_rate,extra_payment,first_day);return sim.payoff1});omni.define("get_payoff2",function(Loan_amount,payment,r,t,q,q2,q3,m,growth_rate,extra_payment,first_day){var sim=simulateAmortisation(Loan_amount,payment,r,t,q,q2,q3,m,growth_rate,extra_payment,first_day);return sim.payoff2!==null?sim.payoff2:sim.payoff1});omni.define("get_date_diff_year",function(Loan_amount,payment,r,t,q,q2,q3,m,growth_rate,extra_payment,first_day){var sim=simulateAmortisation(Loan_amount,payment,r,t,q,q2,q3,m,growth_rate,extra_payment,first_day);var n=sim.frequency*t;var diff=(n-sim.payment_count_sum)/sim.frequency;return Math.trunc(diff)});omni.define("get_date_diff_month",function(Loan_amount,payment,r,t,q,q2,q3,m,growth_rate,extra_payment,first_day){var sim=simulateAmortisation(Loan_amount,payment,r,t,q,q2,q3,m,growth_rate,extra_payment,first_day);var n=sim.frequency*t;var diff=(n-sim.payment_count_sum)/sim.frequency;var diffYear=Math.trunc(diff);return Math.round((diff-diffYear)*12)});omni.define("get_interest_paid_noextra",function(Loan_amount,payment,r,t,q,q2,q3,m,growth_rate,extra_payment,first_day){if(q2===48){q=52}else if(q2===24){q=26}var equivalent_base=1+r/m;var equivalent_power=m/q;var equivalent_p=Math.pow(equivalent_base,equivalent_power)-1;var interest_paid_noextra=0;var principal_balance_noextra=Loan_amount;var payment_noextra=payment-extra_payment;var maxPeriods=t*q*2;for(var i=0;i<maxPeriods;i++){var interest=principal_balance_noextra*equivalent_p;var principal_payment=payment_noextra-interest;if(principal_payment<0){principal_payment=0}if(principal_payment>principal_balance_noextra){principal_payment=principal_balance_noextra}interest_paid_noextra+=interest;principal_balance_noextra-=principal_payment;if(principal_balance_noextra<=0){break}payment_noextra=payment_noextra*(1+growth_rate)}return interest_paid_noextra});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Mortgage takes Home value, Down payment and Down payment in percentage and returns Payment frequency and Ct1. The arithmetic is the whole method: payment frequency is worked out from home value by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Mortgage calculator works', 'html' => <<<'TXT'
            <p>The Mortgage calculator applies one relationship to 40 numbers and reports Payment frequency, Ct1 and Ct2.</p><p>The relationship it solves reads Payment gen = Eq p × Loan amount × (Eq p + 1)^(N) ÷ ((Eq p + 1)^(N) − 1).</p><p>The result panel carries Payment frequency, Ct1, Ct2 and Q2, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 40 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Home value</strong> — in USD. The purchase price of the property.</li><li><strong>Down payment</strong> — in USD. The total cash available for the house purchase.</li><li><strong>Down payment in percentage</strong> — in percent. If your down payment is lower than 20 percent of the house&#039;s value, you are obliged to pay Private Mortgage Insurance (PMI).</li><li><strong>Loan amount</strong> — in USD. This is the value of your mortgage loan, in other words the loan principal.</li><li><strong>Interest rate</strong> — in percent. Yearly rate of interest.</li><li><strong>Loan term</strong> — in years. The length of time over which you are obliged to pay off your mortgage. Note that it is not equal to the amortization term (the actual time for the repayment of the principal), that is, you may pay off the whole principal amount before the end of the loan term. Possible options include an accelerated loan construction or extra payments.</li><li><strong>Interest calculation method</strong> — a plain number, no unit. You can set how often the bank calculate the interest on the principal balance.</li><li><strong>Payment frequency</strong> — a plain number, no unit. Note that in the US, accelerated weekly and bi-weekly payments refer simply to the weekly and bi-weekly payments.</li><li><strong>First day</strong> — a plain number, no unit, entered as a date. The first payment is due on this date.</li><li><strong>Payment</strong> — in USD. The loan installment that you are obliged to pay at the due date of each agreed payment frequency (if you set extra periodic payment, the additional amount also appears here).</li><li><strong>Extra periodic payment</strong> — in USD. Here you can set an additional amount of money that you wish to contribute to your calculated loan installments. Note that after signing a mortgage contract you may charged for altering the amount of the installment stated in the contract.</li><li><strong>Yearly increase in payments</strong> — in percent. Here you may set a percentage rate of growth in your payments that may reflect the average yearly increase of your income during the loan term. Note that you always should consult your bank before transferring any additional amount above your installment stated in the loan contract as most of the banks charge you an extra fee.</li><li><strong>Starting from</strong> — a plain number, no unit, entered as a date. You can set here from which date onward you will add extra money to your installments (also including the yearly increase in payments).</li><li><strong>Lump sum prepayment</strong> — in USD. Here you can set a one off payment to your mortgage on a specific date. Note that depending on your contract, the bank may charge you an extra fee for any advance payment.</li><li><strong>Paid on</strong> — a plain number, no unit, entered as a date. This is the specific date when your individual prepayment is applied. Note that if the selected date doesn&#039;t coincide with the due date of your periodic payment, the amount will be added on the following payment due date.</li><li><strong>PMI</strong> — in percent. Private Mortgage Insurance - this additional fee typically costs in the US between 0.5% to 1% of the entire loan amount on an annual basis. Note that after your home value to loan principal reaches a particular threshold (typically 20 percent) you can cancel this additional fee.</li><li><strong>PMI treshold</strong> — in percent. Currently the typical threshold of PMI in the US is 20 percent, still you may change it according to the specific loan construction.</li><li><strong>Property tax</strong> — in USD. Administered by the local government and utilized for road maintenance and costs of other public services. It is typically based on the value of the property.</li><li><strong>Annual homeowner insurance</strong> — in USD. An insurance policy that provides compensation for damage, loss or injury of property and it belongings in case of fire, theft or other accidents.</li><li><strong>Monthly HOA fees</strong> — in USD. Homeowners association fee that covers the expenses of maintaining and improving the property.</li><li><strong>Other monthly costs</strong> — in USD. You may set here any further costs that relate to your mortgage.</li><li><strong>Total periodic payment</strong> — in USD. It is the total payment with additional costs you need to pay periodically. Note that although the due date of other expenses may divert from the payment frequency, here we rely on the due date of your loan installments.</li><li><strong>Eq p</strong> — a plain number, no unit</li><li><strong>Extra payment yearly</strong> — in USD</li><li><strong>Costs add</strong> — a plain number, no unit</li><li><strong>Pmi periodic</strong> — a plain number, no unit</li><li><strong>Payment accelerated</strong> — a plain number, no unit</li><li><strong>Payment gen</strong> — a plain number, no unit</li><li><strong>Payment monthly</strong> — a plain number, no unit</li><li><strong>Yearly balances</strong> — a plain number, no unit</li><li><strong>N</strong> — a plain number, no unit</li><li><strong>Total payment monthly</strong> — a plain number, no unit</li><li><strong>Eq p monthly</strong> — a plain number, no unit</li><li><strong>G t</strong> — a plain number, no unit</li><li><strong>Growth rate</strong> — in percent</li><li><strong>N monthly</strong> — a plain number, no unit</li><li><strong>Pie chart</strong> — a plain number, no unit</li><li><strong>Mortgage payoff date2</strong> — a plain number, no unit, entered as a date</li><li><strong>Mortgage payoff pmi date</strong> — a plain number, no unit, entered as a date</li><li><strong>Payment count</strong> — a plain number, no unit</li></ul><p>The answers come back as Payment frequency, Ct1, Ct2, Q2, Q3. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Down payment in percentage offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Payment gen</strong> = <code>Eq p × Loan amount × (Eq p + 1)^(N) ÷ ((Eq p + 1)^(N) − 1)</code></li><li><strong>N</strong> = <code>ln( − Payment gen ÷ (Eq p × Loan amount − Payment gen)) ÷ ln(Eq p + 1)</code></li><li><strong>Loan amount</strong> = <code>Payment gen ÷ Eq p − Payment gen × (Eq p + 1)^(− N) ÷ Eq p</code></li><li><strong>Eq p</strong> = <code>((Interest calculation method + Interest rate) ÷ Interest calculation method)^(Interest calculation method ÷ Payment frequency) − 1</code></li><li><strong>Interest rate</strong> = <code>Interest calculation method × ((Eq p + 1)^(Payment frequency ÷ Interest calculation method) − 1)</code></li><li><strong>Payment frequency</strong> = <code>Interest calculation method × ln((Interest calculation method + Interest rate) ÷ Interest calculation method) ÷ ln(Eq p + 1)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Payment gen</strong> = <code>Eq p × Loan amount × (Eq p + 1)^(N) ÷ ((Eq p + 1)^(N) − 1)</code> — the form to use when Eq p, Loan amount and N are the values you have.</li><li><strong>N</strong> = <code>ln( − Payment gen ÷ (Eq p × Loan amount − Payment gen)) ÷ ln(Eq p + 1)</code> — the form to use when Payment gen, Eq p and Loan amount are the values you have.</li><li><strong>Loan amount</strong> = <code>Payment gen ÷ Eq p − Payment gen × (Eq p + 1)^(− N) ÷ Eq p</code> — the form to use when Payment gen, Eq p and N are the values you have.</li><li><strong>Eq p</strong> = <code>((Interest calculation method + Interest rate) ÷ Interest calculation method)^(Interest calculation method ÷ Payment frequency) − 1</code> — the form to use when Interest calculation method, Interest rate and Payment frequency are the values you have.</li><li><strong>Interest rate</strong> = <code>Interest calculation method × ((Eq p + 1)^(Payment frequency ÷ Interest calculation method) − 1)</code> — the form to use when Interest calculation method, Eq p and Payment frequency are the values you have.</li><li><strong>Payment frequency</strong> = <code>Interest calculation method × ln((Interest calculation method + Interest rate) ÷ Interest calculation method) ÷ ln(Eq p + 1)</code> — the form to use when Interest calculation method, Interest rate and Eq p are the values you have.</li><li><strong>N</strong> = <code>Payment frequency × Loan term</code> — the form to use when Payment frequency and Loan term are the values you have.</li><li><strong>Payment frequency</strong> = <code>N ÷ Loan term</code> — the form to use when N and Loan term are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Payment gen, N and Loan amount can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Down payment in percentage, Interest rate and Loan term is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Payment frequency, Ct1 and Ct2 are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Home value left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Home value is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Down payment left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Down payment is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Home value to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Payment frequency is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and years and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It counts in whole days.</strong> Dates are compared as calendar days, not as moments: two dates that differ by a few hours on the same day give the same answer, and there is no time-of-day input to set.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Home value, Down payment and Down payment in percentage are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Home value, Down payment and Down payment in percentage is what you already know and Payment frequency and Ct1 is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/gdp-growth">GDP growth rate Calculator</a>, <a href="/finance/gdp-per-capita">GDP per capita Calculator</a> and <a href="/finance/gdp">GDP</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Mortgage calculator work out?', 'a' => <<<'TXT'
            Payment frequency, Ct1, Ct2 and Q2, from Eq p, Loan amount and N. The relationship is Payment gen = Eq p × Loan amount × (Eq p + 1)^(N) ÷ ((Eq p + 1)^(N) − 1).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Home value (USD), Down payment (USD), Down payment in percentage (percent), Loan amount (USD), Interest rate (percent). Enter home value, down payment and down payment in percentage; Payment frequency is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Payment gen, N, Loan amount and Eq p can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Payment frequency is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Home value left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Payment frequency keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/gdp-growth', 'name' => 'GDP growth rate Calculator'],
            ['path' => '/finance/gdp-per-capita', 'name' => 'GDP per capita Calculator'],
            ['path' => '/finance/gdp', 'name' => 'GDP'],
        ],
        'authors' => [],
    ],
];
