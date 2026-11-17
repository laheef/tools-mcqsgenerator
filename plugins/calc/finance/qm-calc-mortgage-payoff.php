<?php

/**
 * Mortgage payoff
 * /finance/mortgage-payoff
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Mortgage payoff',
    'meta' => ['title' => 'Mortgage payoff Calculator — Formula, Units & Example', 'description' => 'Mortgage payoff works out down payment percentage from home value and down payment. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Mortgage payoff Calculator', 'updated' => '2026-09-09'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        Tell us the parameter of your mortgage, and we'll calculate terms, interest, and much more. If you include extra payments (one time, or regular), we will update the results and show you the difference.
                        TXT],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Current mortgage specification',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Home_value',
                            'label' => 'Home value',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '120000',
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
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Down_payment_percentage',
                            'label' => 'Down payment percentage',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'loan_amount',
                            'label' => 'Mortgage amount',
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
                            'name' => 'int_rate',
                            'label' => 'Interest rate',
                            'type' => 'number',
                            'help' => 'Annual rate of interest.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '4',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'term',
                            'label' => 'Mortgage term',
                            'type' => 'number',
                            'help' => 'The remaining loan term, or the full mortgage term in case of a new mortgage.',
                            'unit' => '19',
                            'unit_default' => 'yrsmos',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '300.000000000000000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'calc_method',
                            'label' => 'Interest capitalization method',
                            'type' => 'select',
                            'options' => ['Semi-annually (Canada)' => '2', 'Monthly (US & UK)' => '12'],
                            'dataset' => 'Compounding frequency',
                            'control' => 'DROPDOWN',
                            'help' => 'Here, you can set how often the bank calculates interest on the principal balance.',
                            'default' => 'Monthly (US & UK)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'first_day', 'label' => 'On the day of', 'type' => 'date', 'help' => 'The due date of the balance, or the due date of first payment of the mortgage.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pay_freq',
                            'label' => 'Payment frequency',
                            'type' => 'result',
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
            ],
        ],
        [
            'title' => 'Extra payment specification',
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
                            'default' => 'Monthly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'extra_payment',
                            'label' => 'Extra payment',
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
                        ['name' => 'date_extra', 'label' => 'From the day of', 'type' => 'date', 'help' => <<<'TXT'
                        The first due date in which the extra monthly payment is applied. Note that if you choose a day that is out of the monthly cycle, the beginning of the period will be considered.
                        TXT],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'single_extra',
                            'label' => 'One-time extra payment',
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
                        ['name' => 'date_single', 'label' => 'On the day of', 'type' => 'date', 'help' => <<<'TXT'
                        The date when the single lump-sum monthly payment is applied. Note that if you choose a day that is out of the monthly cycle, the beginning of the period will be considered.
                        TXT],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Extra_payment_yearly',
                            'label' => 'Extra payment yearly',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'g',
                            'label' => 'G',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PMI',
                            'label' => 'Pmi',
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
                            'name' => 'PMI_treshold',
                            'label' => 'Pmi treshold',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
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
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Home_insurance',
                            'label' => 'Home insurance',
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
                            'name' => 'HOA_fee',
                            'label' => 'Hoa fee',
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
                            'name' => 'other_costs',
                            'label' => 'Other costs',
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
                            'name' => 'Total_payment_2',
                            'label' => 'Total payment 2',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
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
                            'name' => 'Payment_gen',
                            'label' => 'Payment gen',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Accelerated pay-off options',
            'note' => '',
            'blocks' => [
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
                        ['type' => 'note', 'text' => 'Set an extra periodic or one-time payment to induce changes in your original repayment schedule.'],
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
                            'name' => 'VarRep',
                            'label' => 'Varrep',
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
                            'label' => 'Rep',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
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
            ],
        ],
        [
            'title' => 'Amortization table',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'amortization_year', 'label' => 'Amortization schedule from', 'type' => 'date'],
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
                            'name' => 'amortization_table',
                            'label' => 'Amortization table',
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
                        [
                            'name' => 'payment_count',
                            'label' => 'Payment count',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
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
                            'name' => 'payment',
                            'label' => 'Payment',
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
                            'name' => 'diff_payment_count',
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
                            'rounding' => ['omni', '0.0001'],
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
                            'rounding' => ['omni', '0.0001'],
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
                            'rounding' => ['omni', '0.0001'],
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
                            'rounding' => ['omni', '0.0001'],
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
                            'rounding' => ['omni', '0.0001'],
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
                            'rounding' => ['omni', '0.0001'],
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
                            'rounding' => ['omni', '0.0001'],
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
                            'rounding' => ['omni', '0.0001'],
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
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Payment_gen = (loan_amount * eq_p * (1 + eq_p) ^ n) / ((1 + eq_p) ^ n - 1)',
            'results' => ['n' => 'log(Payment_gen/(Payment_gen - eq_p*loan_amount))/log(eq_p + 1)', 'Payment_gen' => 'eq_p*loan_amount*pow(eq_p + 1, n)/(pow(eq_p + 1, n) - 1)', 'loan_amount' => 'Payment_gen/eq_p - Payment_gen*pow(eq_p + 1, -n)/eq_p'],
        ],
        [
            'title' => 'eq_p = (1 + int_rate / calc_method) ^ (calc_method / pay_freq) - 1',
            'results' => ['eq_p' => 'pow((calc_method + int_rate)/calc_method, calc_method/pay_freq) - 1', 'pay_freq' => 'calc_method*log((calc_method + int_rate)/calc_method)/log(eq_p + 1)', 'int_rate' => 'calc_method*(pow(eq_p + 1, pay_freq/calc_method) - 1)'],
        ],
        [
            'title' => 'n = pay_freq * term',
            'results' => ['n' => 'pay_freq*term', 'term' => 'n/pay_freq', 'pay_freq' => 'n/term'],
        ],
        [
            'title' => 'Payment_accelerated = Payment_gen * pay_freq / q2',
            'results' => ['q2' => 'Payment_gen*pay_freq/Payment_accelerated', 'Payment_gen' => 'Payment_accelerated*q2/pay_freq', 'pay_freq' => 'Payment_accelerated*q2/Payment_gen', 'Payment_accelerated' => 'Payment_gen*pay_freq/q2'],
        ],
        [
            'title' => 'payment = one_way(Payment_gen * ct1 + Payment_accelerated * ct2 + extra_payment)',
            'results' => ['payment' => '(Payment_accelerated*ct2 + Payment_gen*ct1 + extra_payment)'],
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
            'results' => ['Payment_monthly' => 'Total_payment_monthly/n_monthly', 'n_monthly' => 'Total_payment_monthly/Payment_monthly', 'Total_payment_monthly' => 'Payment_monthly*n_monthly'],
        ],
        [
            'title' => 'g + 1 = (1 + g_t / q3) ^ q3 ',
            'results' => ['g' => 'pow((g_t + q3)/q3, q3) - 1', 'g_t' => 'q3*(pow(g + 1, 1/q3) - 1)'],
        ],
        [
            'title' => 'growth_rate = g_t / q3',
            'results' => ['growth_rate' => 'g_t/q3', 'g_t' => 'growth_rate*q3', 'q3' => 'g_t/growth_rate'],
        ],
        [
            'title' => 'Extra_payment_yearly = extra_payment * q3',
            'results' => ['Extra_payment_yearly' => 'extra_payment*q3', 'extra_payment' => 'Extra_payment_yearly/q3', 'q3' => 'Extra_payment_yearly/extra_payment'],
        ],
        [
            'title' => 'PMI_periodic = loan_amount * PMI / q3',
            'results' => ['PMI_periodic' => 'PMI*loan_amount/q3', 'loan_amount' => 'PMI_periodic*q3/PMI', 'PMI' => 'PMI_periodic*q3/loan_amount', 'q3' => 'PMI*loan_amount/PMI_periodic'],
        ],
        [
            'title' => 'loan_amount = Home_value - Down_payment',
            'results' => ['Down_payment' => 'Home_value - loan_amount', 'Home_value' => 'Down_payment + loan_amount', 'loan_amount' => '-Down_payment + Home_value'],
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
                'Property_tax' => 'Costs_add - 12*HOA_fee - Home_insurance - 12*other_costs',
                'HOA_fee' => '(1/12)*Costs_add - 1/12*Home_insurance - 1/12*Property_tax - other_costs',
                'Costs_add' => '12*HOA_fee + Home_insurance + Property_tax + 12*other_costs',
            ],
        ],
        [
            'title' => 'Total_payment_2 = one_way(payment + PMI_periodic + Costs_add / q3)',
            'results' => ['Total_payment_2' => '(Costs_add/q3 + PMI_periodic + (Payment_accelerated*ct2 + Payment_gen*ct1 + extra_payment))'],
        ],
        [
            'title' => <<<'TXT'
            payment_count = get_payment_count(loan_amount, payment, int_rate, term, pay_freq, q2, q3, calc_method, growth_rate, extra_payment, first_day, date_extra, single_extra, date_single)
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
            'title' => 'ori_mortgage_payoff_date = get_mortgage_payoff_date(first_day, ori_payment_count, 12) ',
            'results' => ['ori_mortgage_payoff_date' => <<<'TXT'
            get_mortgage_payoff_date(first_day, ((get_payment_count(loan_amount, (ct1*(loan_amount*pow((pow((calc_method + int_rate)/calc_method, (1/12)*calc_method) - 1) + 1, (12*term))*(pow((calc_method + int_rate)/calc_method, (1/12)*calc_method) - 1)/(pow((pow((calc_method + int_rate)/calc_method, (1/12)*calc_method) - 1) + 1, (12*term)) - 1)) + ct2*(12*(loan_amount*pow((pow((calc_method + int_rate)/calc_method, (1/12)*calc_method) - 1) + 1, (12*term))*(pow((calc_method + int_rate)/calc_method, (1/12)*calc_method) - 1)/(pow((pow((calc_method + int_rate)/calc_method, (1/12)*calc_method) - 1) + 1, (12*term)) - 1))/q2)), int_rate, term, 12, q2, q3, calc_method, growth_rate, 0, first_day, date_extra, 0, date_single))), 12)
            TXT],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";var MILLISECONDS_IN_DAY=24*60*60*1000;omni.define("get_interest_paid",function(first_day,Loan_amount,q,q2,q3,t,r,m,payment,extra_payment,date_extra,date_single,single_extra,growth_rate,Costs_add,PMI_periodic){growth_rate=0;var MILLISECONDS_IN_DAY=24*60*60*1000;if(q2===48){q=52}else if(q2===24){q=26}var periods=t*q+1;var equivalent_base=1+r/m;var equivalent_power=m/q;var equivalent_p=Math.pow(equivalent_base,equivalent_power)-1;var firstDate=new Date(first_day);var extraDate=new Date(date_extra);var singleExtraDate=new Date(date_single);var payment2;if(extraDate.getTime()<=firstDate.getTime()){payment2=payment/(1+growth_rate)}else{payment2=payment+extra_payment}var principal_balance=Loan_amount;var interest_paid=0;var days_in_period=q===12?30.44:365.25/q;var currentDate=new Date(first_day);var lumpApplied=false;for(var i=1;i<=periods;i++){var periodStart=new Date(currentDate);currentDate=new Date(periodStart.getTime()+days_in_period*MILLISECONDS_IN_DAY);var effectivePayment=payment2;if(!lumpApplied&&singleExtraDate.getTime()>=periodStart.getTime()&&singleExtraDate.getTime()<currentDate.getTime()){effectivePayment=payment2+single_extra;lumpApplied=true}var interest_amount=principal_balance*equivalent_p;interest_paid+=interest_amount;var principal_payment=effectivePayment-interest_amount;if(principal_payment<0){principal_payment=0}if(principal_payment>principal_balance){principal_payment=principal_balance}principal_balance-=principal_payment;if(principal_balance<0){principal_balance=0}payment2=payment2*(1+growth_rate);if(principal_balance<=0){break}}return interest_paid});omni.define("get_payment_count",function(Loan_amount,payment,r,t,q,q2,q3,m,growth_rate,extra_payment,first_day,date_extra,single_extra,date_single){growth_rate=0;var MILLISECONDS_IN_DAY=24*60*60*1000;if(q2===48){q=52}else if(q2===24){q=26}var periods=t*q+1;var equivalent_base=1+r/m;var equivalent_power=m/q;var equivalent_p=Math.pow(equivalent_base,equivalent_power)-1;var firstDate=new Date(first_day);var extraDate=new Date(date_extra);var singleExtraDate=new Date(date_single);var payment2;if(extraDate.getTime()<=firstDate.getTime()){payment2=payment/(1+growth_rate)}else{payment2=payment+extra_payment}var principal_balance=Loan_amount;var payment_count_sum=0;var days_in_period=q===12?30.44:365.25/q;var currentDateSim=new Date(first_day);var lumpApplied=false;for(var i=1;i<=periods;i++){var periodStart=new Date(currentDateSim);currentDateSim=new Date(periodStart.getTime()+days_in_period*MILLISECONDS_IN_DAY);var effectivePayment=payment2;if(!lumpApplied&&singleExtraDate.getTime()>=periodStart.getTime()&&singleExtraDate.getTime()<=currentDateSim.getTime()){effectivePayment=payment2+single_extra;lumpApplied=true}var interest_amount=principal_balance*equivalent_p;var principal_amount=effectivePayment-interest_amount;if(principal_amount<0){principal_amount=0}var payment_amount=principal_amount+interest_amount;if(payment_amount>0){payment_count_sum+=1}principal_balance-=principal_amount;if(principal_balance<0){principal_balance=0}payment2=payment2*(1+growth_rate);if(principal_balance<=0){break}}return payment_count_sum});omni.define("get_pmi_total",function(Loan_amount,payment,r,t,q,q2,q3,m,growth_rate,extra_payment,Home_value,PMI_treshold,first_day,date_extra,single_extra,date_single,base_PMI_periodic){growth_rate=0;var MILLISECONDS_IN_DAY=24*60*60*1000;if(q2===48){q=52}else if(q2===24){q=26}var periods=t*q+1;var equivalent_base=1+r/m;var equivalent_power=m/q;var equivalent_p=Math.pow(equivalent_base,equivalent_power)-1;var firstDate=new Date(first_day);var extraDate=new Date(date_extra);var singleExtraDate=new Date(date_single);var payment2;if(extraDate.getTime()<=firstDate.getTime()){payment2=payment/(1+growth_rate)}else{payment2=payment+extra_payment}var days_in_period=q===12?30.44:365.25/q;var currentDateSim=new Date(first_day);var principal_balance=Loan_amount;var PMI_total=0;var lumpApplied=false;for(var i=1;i<=periods;i++){var periodStart=new Date(currentDateSim);currentDateSim=new Date(periodStart.getTime()+days_in_period*MILLISECONDS_IN_DAY);var effectivePayment=payment2;if(!lumpApplied&&singleExtraDate.getTime()>=periodStart.getTime()&&singleExtraDate.getTime()<currentDateSim.getTime()){effectivePayment=payment2+single_extra;lumpApplied=true}var interest_amount=principal_balance*equivalent_p;var principal_amount=effectivePayment-interest_amount;if(principal_amount<0){principal_amount=0}if(principal_amount>principal_balance){principal_amount=principal_balance}var remainingBalance=principal_balance-principal_amount;var PMI_this_period=remainingBalance<Home_value*(1-PMI_treshold)?0:base_PMI_periodic;PMI_total+=PMI_this_period;principal_balance-=principal_amount;if(principal_balance<0){principal_balance=0}payment2=payment2*(1+growth_rate);if(principal_balance<=0){break}}return PMI_total});omni.define("get_pmi_html",function(Loan_amount,Home_value,PMI_treshold,base_PMI_periodic){if(Loan_amount<Home_value*(1-PMI_treshold)){return 0}return base_PMI_periodic});omni.define("get_costs_add_total",function(Loan_amount,payment,r,t,q,q2,q3,m,growth_rate,extra_payment,Costs_add){growth_rate=0;var periods=t*q+1;if(q2===48){q=52;periods=t*52}else if(q2===24){q=26;periods=t*26}var equivalent_base=1+r/m;var equivalent_power=m/q;var equivalent_p=Math.pow(equivalent_base,equivalent_power)-1;var payment2=payment-extra_payment;var principal_balance=Loan_amount;var Costs_add_total=0;for(var i=1;i<=periods;i++){var interest_amount=principal_balance*equivalent_p;var principal_amount=payment2-interest_amount;if(principal_amount<0){principal_amount=0}var period_cost=principal_balance===0?0:Costs_add;Costs_add_total+=period_cost;principal_balance-=principal_amount;if(principal_balance<0){principal_balance=0}payment2=payment2*(1+growth_rate);if(principal_balance<=0){break}}if(q2===1){Costs_add_total=Costs_add*q3*t}return Costs_add_total});omni.define("get_mortgage_payoff_date",function(first_day,payment_count,q3){return first_day+payment_count/q3*365.25*MILLISECONDS_IN_DAY});omni.define("get_mortgage_payoff_pmi_date",function(Loan_amount,payment,r,t,q,q2,q3,m,growth_rate,extra_payment,Costs_add,Home_value,PMI_treshold,first_day,date_extra,single_extra,date_single){growth_rate=0;var MILLISECONDS_IN_DAY=24*60*60*1000;if(q2===48){q=52}else if(q2===24){q=26}var equivalent_base=1+r/m;var equivalent_power=m/q;var equivalent_p=Math.pow(equivalent_base,equivalent_power)-1;var currentDate=new Date(first_day);var daysInPeriod=365.25/q;var principal_balance=Loan_amount;var currentPayment=payment+extra_payment;var lumpApplied=false;var lastPmiDate=null;var maxPeriods=t*q*2;for(var i=0;i<maxPeriods;i++){var periodStart=new Date(currentDate);var periodEnd=new Date(currentDate.getTime()+daysInPeriod*MILLISECONDS_IN_DAY);var effectivePayment=currentPayment;if(!lumpApplied&&new Date(date_single).getTime()>=periodStart.getTime()&&new Date(date_single).getTime()<periodEnd.getTime()){effectivePayment=currentPayment+single_extra;lumpApplied=true}var interest=principal_balance*equivalent_p;var principalPayment=effectivePayment-interest;if(principalPayment<0){principalPayment=0}if(principalPayment>principal_balance){principalPayment=principal_balance}var newPrincipal=principal_balance-principalPayment;if(newPrincipal>=Home_value*(1-PMI_treshold)){lastPmiDate=new Date(currentDate)}principal_balance=newPrincipal;if(principal_balance<=0){break}currentPayment=currentPayment*(1+growth_rate);currentDate=new Date(currentDate.getTime()+daysInPeriod*MILLISECONDS_IN_DAY)}return lastPmiDate?lastPmiDate.getTime():0});omni.define("get_principal_paid",function(Loan_amount,payment,r,t,q,q2,q3,m,growth_rate,extra_payment,Costs_add,first_day){growth_rate=0;var MILLISECONDS_IN_DAY=24*60*60*1000;if(q2===48){q=52}else if(q2===24){q=26}var equivalent_base=1+r/m;var equivalent_power=m/q;var equivalent_p=Math.pow(equivalent_base,equivalent_power)-1;var currentDate=new Date(first_day);var daysInPeriod=365.25/q;var principal_balance=Loan_amount;var principal_paid=0;var currentPayment=payment-extra_payment;var maxPeriods=t*q*2;for(var i=0;i<maxPeriods;i++){var interest=principal_balance*equivalent_p;var principalPayment=currentPayment-interest;if(principalPayment<0){principalPayment=0}if(principalPayment>principal_balance){principalPayment=principal_balance}principal_paid+=principalPayment;principal_balance-=principalPayment;if(principal_balance<=0){break}currentPayment=currentPayment*(1+growth_rate);currentDate=new Date(currentDate.getTime()+daysInPeriod*MILLISECONDS_IN_DAY)}return principal_paid});function simulateAmortisation(Loan_amount,payment,r,t,q,q2,q3,m,growth_rate,extra_payment,first_day){growth_rate=0;var MILLISECONDS_IN_DAY=24*60*60*1000;if(q2===48){q=52}else if(q2===24){q=26}var equivalent_base=1+r/m;var equivalent_power=m/q;var equivalent_p=Math.pow(equivalent_base,equivalent_power)-1;var currentDate=new Date(first_day);var daysInPeriod=365.25/q;var principal_balance=Loan_amount;var currentPayment=payment-extra_payment;var payment_count_sum=0;var payoff1=currentDate.getTime();var payoff2=currentPayment!==0?currentDate.getTime():null;var maxPeriods=t*q*2;for(var i=0;i<maxPeriods;i++){var interest=principal_balance*equivalent_p;var principalPayment=currentPayment-interest;if(principalPayment<0){principalPayment=0}if(principalPayment>principal_balance){principalPayment=principal_balance}if(currentPayment>0){payment_count_sum++}principal_balance-=principalPayment;payoff1=currentDate.getTime();if(currentPayment!==0){payoff2=currentDate.getTime()}if(principal_balance<=0){break}currentPayment=currentPayment*(1+growth_rate);currentDate=new Date(currentDate.getTime()+daysInPeriod*MILLISECONDS_IN_DAY)}return{payoff1:payoff1,payoff2:payoff2,payment_count_sum:payment_count_sum,frequency:q}}omni.define("get_payoff1",function(Loan_amount,payment,r,t,q,q2,q3,m,growth_rate,extra_payment,first_day){var sim=simulateAmortisation(Loan_amount,payment,r,t,q,q2,q3,m,growth_rate,extra_payment,first_day);return sim.payoff1});omni.define("get_payoff2",function(Loan_amount,payment,r,t,q,q2,q3,m,growth_rate,extra_payment,first_day){var sim=simulateAmortisation(Loan_amount,payment,r,t,q,q2,q3,m,growth_rate,extra_payment,first_day);return sim.payoff2!==null?sim.payoff2:sim.payoff1});omni.define("get_date_diff_year",function(Loan_amount,payment,r,t,q,q2,q3,m,growth_rate,extra_payment,first_day){var sim=simulateAmortisation(Loan_amount,payment,r,t,q,q2,q3,m,growth_rate,extra_payment,first_day);var n=sim.frequency*t;var diff=(n-sim.payment_count_sum)/sim.frequency;return Math.trunc(diff)});omni.define("get_date_diff_month",function(Loan_amount,payment,r,t,q,q2,q3,m,growth_rate,extra_payment,first_day){var sim=simulateAmortisation(Loan_amount,payment,r,t,q,q2,q3,m,growth_rate,extra_payment,first_day);var n=sim.frequency*t;var diff=(n-sim.payment_count_sum)/sim.frequency;var diffYear=Math.trunc(diff);return Math.round((diff-diffYear)*12)});omni.define("get_interest_paid_noextra",function(Loan_amount,payment,r,t,q,q2,q3,m,growth_rate,extra_payment,first_day){growth_rate=0;if(q2===48){q=52}else if(q2===24){q=26}var equivalent_base=1+r/m;var equivalent_power=m/q;var equivalent_p=Math.pow(equivalent_base,equivalent_power)-1;var interest_paid_noextra=0;var principal_balance_noextra=Loan_amount;var payment_noextra=payment-extra_payment;var maxPeriods=t*q*2;for(var i=0;i<maxPeriods;i++){var interest=principal_balance_noextra*equivalent_p;var principal_payment=payment_noextra-interest;if(principal_payment<0){principal_payment=0}if(principal_payment>principal_balance_noextra){principal_payment=principal_balance_noextra}interest_paid_noextra+=interest;principal_balance_noextra-=principal_payment;if(principal_balance_noextra<=0){break}payment_noextra=payment_noextra*(1+growth_rate)}return interest_paid_noextra});omni.define("get_repayment_term",function(mortgage_payoff_date,first_day){var differenceInSeconds=Math.abs(mortgage_payoff_date-first_day);return differenceInSeconds/1000});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Enter Home value, Down payment and Down payment percentage into Mortgage payoff and the answer comes back as Payment frequency and Ct1. There is no hidden constant here: change payment frequency and home value moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Mortgage payoff calculator works', 'html' => <<<'TXT'
            <p>The Mortgage payoff calculator applies one relationship to 45 numbers and reports Payment frequency, Ct1 and Ct2.</p><p>The relationship it solves reads Payment gen = Eq p × Mortgage amount × (Eq p + 1)^(N) ÷ ((Eq p + 1)^(N) − 1).</p><p>The answers are Payment frequency, Ct1, Ct2 and Q2; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 45 boxes, and nothing else.</p><ul><li><strong>Home value</strong> — a plain number, no unit</li><li><strong>Down payment</strong> — a plain number, no unit</li><li><strong>Down payment percentage</strong> — a plain number, no unit</li><li><strong>Mortgage amount</strong> — in USD</li><li><strong>Interest rate</strong> — in percent. Annual rate of interest.</li><li><strong>Mortgage term</strong> — in years / months. The remaining loan term, or the full mortgage term in case of a new mortgage.</li><li><strong>Interest capitalization method</strong> — a plain number, no unit. Here, you can set how often the bank calculates interest on the principal balance.</li><li><strong>On the day of</strong> — a plain number, no unit, entered as a date. The due date of the balance, or the due date of first payment of the mortgage.</li><li><strong>Eq p</strong> — a plain number, no unit</li><li><strong>Payment frequency</strong> — a plain number, no unit</li><li><strong>Extra payment</strong> — in USD</li><li><strong>From the day of</strong> — a plain number, no unit, entered as a date. The first due date in which the extra monthly payment is applied. Note that if you choose a day that is out of the monthly cycle, the beginning of the period will be considered.</li><li><strong>One-time extra payment</strong> — in USD</li><li><strong>On the day of</strong> — a plain number, no unit, entered as a date. The date when the single lump-sum monthly payment is applied. Note that if you choose a day that is out of the monthly cycle, the beginning of the period will be considered.</li><li><strong>Extra payment yearly</strong> — a plain number, no unit</li><li><strong>G</strong> — a plain number, no unit</li><li><strong>Pmi</strong> — a plain number, no unit</li><li><strong>Pmi treshold</strong> — a plain number, no unit</li><li><strong>Property tax</strong> — a plain number, no unit</li><li><strong>Home insurance</strong> — a plain number, no unit</li><li><strong>Hoa fee</strong> — a plain number, no unit</li><li><strong>Other costs</strong> — a plain number, no unit</li><li><strong>Total payment 2</strong> — a plain number, no unit</li><li><strong>Costs add</strong> — a plain number, no unit</li><li><strong>Pmi periodic</strong> — a plain number, no unit</li><li><strong>Payment accelerated</strong> — a plain number, no unit</li><li><strong>Payment gen</strong> — a plain number, no unit</li><li><strong>Yearly balances</strong> — a plain number, no unit</li><li><strong>Varrep</strong> — a plain number, no unit</li><li><strong>Rep</strong> — a plain number, no unit</li><li><strong>Details</strong> — a plain number, no unit</li><li><strong>N</strong> — a plain number, no unit</li><li><strong>Amortization schedule from</strong> — a plain number, no unit, entered as a date</li><li><strong>Payment monthly</strong> — a plain number, no unit</li><li><strong>Total payment monthly</strong> — a plain number, no unit</li><li><strong>Amortization table</strong> — a plain number, no unit</li><li><strong>Eq p monthly</strong> — a plain number, no unit</li><li><strong>G t</strong> — a plain number, no unit</li><li><strong>Growth rate</strong> — a plain number, no unit</li><li><strong>N monthly</strong> — a plain number, no unit</li><li><strong>Pie chart</strong> — a plain number, no unit</li><li><strong>Payment count</strong> — a plain number, no unit</li><li><strong>Mortgage payoff date</strong> — a plain number, no unit, entered as a date</li><li><strong>Ori mortgage payoff date</strong> — a plain number, no unit, entered as a date</li><li><strong>Payment</strong> — in USD</li></ul><p>What you get back is Payment frequency, Ct1, Ct2, Q2, Q3, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Interest rate lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Payment gen</strong> = <code>Eq p × Mortgage amount × (Eq p + 1)^(N) ÷ ((Eq p + 1)^(N) − 1)</code></li><li><strong>N</strong> = <code>ln(Payment gen ÷ (Payment gen − Eq p × Mortgage amount)) ÷ ln(Eq p + 1)</code></li><li><strong>Mortgage amount</strong> = <code>Payment gen ÷ Eq p − Payment gen × (Eq p + 1)^(− N) ÷ Eq p</code></li><li><strong>Eq p</strong> = <code>((Interest capitalization method + Interest rate) ÷ Interest capitalization method)^(Interest capitalization method ÷ Payment frequency) − 1</code></li><li><strong>Payment frequency</strong> = <code>Interest capitalization method × ln((Interest capitalization method + Interest rate) ÷ Interest capitalization method) ÷ ln(Eq p + 1)</code></li><li><strong>Interest rate</strong> = <code>Interest capitalization method × ((Eq p + 1)^(Payment frequency ÷ Interest capitalization method) − 1)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Payment gen</strong> = <code>Eq p × Mortgage amount × (Eq p + 1)^(N) ÷ ((Eq p + 1)^(N) − 1)</code> — the form to use when Eq p, Mortgage amount and N are the values you have.</li><li><strong>N</strong> = <code>ln(Payment gen ÷ (Payment gen − Eq p × Mortgage amount)) ÷ ln(Eq p + 1)</code> — the form to use when Payment gen, Eq p and Mortgage amount are the values you have.</li><li><strong>Mortgage amount</strong> = <code>Payment gen ÷ Eq p − Payment gen × (Eq p + 1)^(− N) ÷ Eq p</code> — the form to use when Payment gen, Eq p and N are the values you have.</li><li><strong>Eq p</strong> = <code>((Interest capitalization method + Interest rate) ÷ Interest capitalization method)^(Interest capitalization method ÷ Payment frequency) − 1</code> — the form to use when Interest capitalization method, Interest rate and Payment frequency are the values you have.</li><li><strong>Payment frequency</strong> = <code>Interest capitalization method × ln((Interest capitalization method + Interest rate) ÷ Interest capitalization method) ÷ ln(Eq p + 1)</code> — the form to use when Interest capitalization method, Interest rate and Eq p are the values you have.</li><li><strong>Interest rate</strong> = <code>Interest capitalization method × ((Eq p + 1)^(Payment frequency ÷ Interest capitalization method) − 1)</code> — the form to use when Interest capitalization method, Eq p and Payment frequency are the values you have.</li><li><strong>N</strong> = <code>Payment frequency × Mortgage term</code> — the form to use when Payment frequency and Mortgage term are the values you have.</li><li><strong>Mortgage term</strong> = <code>N ÷ Payment frequency</code> — the form to use when N and Payment frequency are the values you have.</li></ul><p>Any one of Payment gen, N and Mortgage amount can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Interest rate and Mortgage term carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Payment frequency, Ct1 and Ct2 are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Home value left as a guess.</strong> Anything typed into Home value is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Down payment left as a guess.</strong> Anything typed into Down payment is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Home value to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Home value, Down payment, Down payment percentage and Mortgage amount ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Home value — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Payment frequency against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Payment frequency is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and years / months and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It counts in whole days.</strong> Dates are compared as calendar days, not as moments: two dates that differ by a few hours on the same day give the same answer, and there is no time-of-day input to set.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Home value, Down payment and Down payment percentage are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Home value, Down payment and Down payment percentage and the number you are missing is Payment frequency and Ct1.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/alternative-minimum-tax">Alternative minimum tax Calculator</a>, <a href="/finance/altman-z-score">Altman Z-Score Calculator</a> and <a href="/finance/amortization">Amortization Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Mortgage payoff is a number to act on, so the useful question is what to do with Payment frequency, Ct1 and Ct2 once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Home value, Down payment, Down payment percentage and Mortgage amount alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Mortgage payoff calculator work out?', 'a' => <<<'TXT'
            Payment frequency, Ct1, Ct2 and Q2, from Eq p, Mortgage amount and N. The relationship is Payment gen = Eq p × Mortgage amount × (Eq p + 1)^(N) ÷ ((Eq p + 1)^(N) − 1).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Home value, Down payment, Down payment percentage, Mortgage amount (USD), Interest rate (percent). Enter home value, down payment and down payment percentage; Payment frequency is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Payment gen, N, Mortgage amount and Eq p blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Payment frequency is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Home value blank and the page solves for it, reporting Payment frequency instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Payment frequency at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/alternative-minimum-tax', 'name' => 'Alternative minimum tax Calculator'],
            ['path' => '/finance/altman-z-score', 'name' => 'Altman Z-Score Calculator'],
            ['path' => '/finance/amortization', 'name' => 'Amortization Calculator'],
        ],
        'authors' => [],
    ],
];
