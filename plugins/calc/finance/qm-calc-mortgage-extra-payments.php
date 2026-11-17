<?php

/**
 * Mortgage calculator with extra payments
 * /finance/mortgage-extra-payments
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Mortgage calculator with extra payments',
    'meta' => ['title' => 'Mortgage calculator with extra payments Calculator', 'description' => 'Mortgage calculator with extra payments works out eq p from mortgage amount. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Mortgage calculator with extra payments Calculator', 'updated' => '2026-09-09'],
    'sections' => [
        [
            'title' => 'Original schedule',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Loan_amount',
                            'label' => 'Mortgage amount',
                            'type' => 'number',
                            'help' => 'The loan principal to be repaid on a monthly basis.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '135000',
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
                            'name' => 't',
                            'label' => 'Loan term',
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
                            'name' => 'm',
                            'label' => 'Interest calculation method',
                            'type' => 'select',
                            'options' => ['Semi-annually (Canada)' => '2.000000000000000', 'Monthly (US & UK)' => '12.000000000000000'],
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
                        ['name' => 'first_day', 'label' => 'Due date', 'type' => 'date', 'help' => 'The following due date.'],
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
                                'Monthly' => '1',
                                'Bi-weekly' => '3',
                                'Accelerated bi-weekly' => '4',
                                'Weekly' => '5',
                                'Accelerated weekly' => '6',
                            ],
                            'dataset' => 'payment freq',
                            'control' => 'DROPDOWN',
                            'default' => 'Accelerated bi-weekly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Extra_payment',
                            'label' => 'Periodic extra payment',
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
                        ['name' => 'date_extra', 'label' => 'Starting from', 'type' => 'date', 'help' => 'Here you can set the date from which you will add extra money to your installments.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'single_extra',
                            'label' => 'Lump sum prepayment',
                            'type' => 'number',
                            'help' => 'Here you can set a one-time single extra payment to your mortgage on a specific date.',
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
                        ['name' => 'date_single', 'label' => 'Paid on', 'type' => 'date', 'help' => 'Note, that if the set date doesn\'t coincide with your periodic payment due date, the extra payment is made on the following payment due date.'],
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
                            'name' => 'g',
                            'label' => 'Yearly increase in payments',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            Here you may set the percentage rate of growth of your payments that may reflect the average yearly increase of your income during the loan term. Note, that you always should consult your bank before transferring any additional amount above your installment stated in the loan contract as most banks will charge you an extra fee.
                            TXT,
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 4,
                    'place' => [0, 1, 2, 3],
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
                        [
                            'name' => 'n_monthly',
                            'label' => 'N monthly',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'g_t',
                            'label' => 'G t',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
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
                            'name' => 'PMI_treshold',
                            'label' => 'PMI treshold',
                            'type' => 'number',
                            'help' => 'Currently the typical PMI threshold in the USA is 20 percent. Still, you may change it according to the specific loan construction.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                    ],
                ],
                [
                    'columns' => 4,
                    'place' => [0, 1, 2, 3],
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
                            'name' => 'n',
                            'label' => 'N',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'Payment_gen',
                            'label' => 'Payment gen',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 4,
                    'place' => [0, 1, 2, 3],
                    'fields' => [
                        [
                            'name' => 'Payment_accelerated',
                            'label' => 'Payment accelerated',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q',
                            'label' => 'q',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
                        ],
                        ['name' => 'payoff_og', 'label' => 'Payoff og', 'type' => 'date'],
                        [
                            'name' => 'term_extra',
                            'label' => 'Term extra',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
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
                            The loan installment that you are obliged to pay at the due date of each payment period (if you set an extra periodic payment, the additional amount also appears here).
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
                            'name' => 'Total_payment_monthly',
                            'label' => 'Total payment monthly',
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
                            'name' => 'Payment_monthly',
                            'label' => 'Payment monthly',
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
                            'name' => 'interest',
                            'label' => 'Interest',
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
                            'name' => 't_diff',
                            'label' => 'T diff',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'payoff_extra', 'label' => 'Payoff extra', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'payment_freq_table_label',
                            'label' => '',
                            'type' => 'result',
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
                            'name' => 'Payment_diff',
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
                            'name' => 't_yrs',
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
                            'name' => 't_mos',
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
                            'name' => 't_extra_yrs',
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
                            'name' => 't_extra_mos',
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
                            'name' => 't_diff_yrs',
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
                            'name' => 't_diff_mos',
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
                            'name' => 'interest_extra',
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
                            'name' => 'interest_diff',
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
                            'name' => 'Total_payment_extra',
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
                            'name' => 'Total_payment_diff',
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
                            'name' => 'payoff_diff',
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
                            'name' => 'payoff_diff_years',
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
                            'name' => 'payoff_diff_mos',
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
            'title' => 'Payment_gen = (Loan_amount * eq_p * (1 + eq_p) ^ n) / ((1 + eq_p) ^ n - 1)',
            'results' => ['Loan_amount' => 'Payment_gen/eq_p - Payment_gen*pow(eq_p + 1, -n)/eq_p', 'n' => 'log(-Payment_gen/(Loan_amount*eq_p - Payment_gen))/log(eq_p + 1)', 'Payment_gen' => 'Loan_amount*eq_p*pow(eq_p + 1, n)/(pow(eq_p + 1, n) - 1)'],
        ],
        [
            'title' => 'eq_p = (1 + r / m) ^ (m / q) - 1',
            'results' => ['eq_p' => 'pow((m + r)/m, m/q) - 1', 'r' => 'm*(pow(eq_p + 1, q/m) - 1)', 'q' => 'm*log((m + r)/m)/log(eq_p + 1)'],
        ],
        [
            'title' => 'n = q * t',
            'results' => ['q' => 'n/t', 'n' => 'q*t', 't' => 'n/q'],
        ],
        [
            'title' => 'Payment_accelerated = Payment_gen * q / q2',
            'results' => ['q' => 'Payment_accelerated*q2/Payment_gen', 'q2' => 'Payment_gen*q/Payment_accelerated', 'Payment_accelerated' => 'Payment_gen*q/q2', 'Payment_gen' => 'Payment_accelerated*q2/q'],
        ],
        [
            'title' => 'Payment = one_way(Payment_gen * ct1 + Payment_accelerated * ct2 + Extra_payment)',
            'results' => ['Payment' => '(Extra_payment + Payment_accelerated*ct2 + Payment_gen*ct1)'],
        ],
        [
            'title' => 'n_monthly = 12 * t',
            'results' => ['n_monthly' => '12*t', 't' => '(1/12)*n_monthly'],
        ],
        [
            'title' => 'eq_p_monthly = ((1 + r / m) ^ (m / 12) - 1)',
            'results' => ['r' => 'm*(pow(pow(eq_p_monthly + 1, 12), 1/m) - 1)', 'eq_p_monthly' => 'pow((m + r)/m, (1/12)*m) - 1'],
        ],
        [
            'title' => 'Payment_monthly = (Loan_amount * eq_p_monthly * (1 + eq_p_monthly) ^ n_monthly) / ((1 + eq_p_monthly) ^ n_monthly - 1)',
            'results' => ['Loan_amount' => 'Payment_monthly/eq_p_monthly - Payment_monthly*pow(eq_p_monthly + 1, -n_monthly)/eq_p_monthly', 'Payment_monthly' => 'Loan_amount*eq_p_monthly*pow(eq_p_monthly + 1, n_monthly)/(pow(eq_p_monthly + 1, n_monthly) - 1)', 'n_monthly' => 'log(-Payment_monthly/(Loan_amount*eq_p_monthly - Payment_monthly))/log(eq_p_monthly + 1)'],
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
            'results' => ['q3' => 'g_t/growth_rate', 'g_t' => 'growth_rate*q3', 'growth_rate' => 'g_t/q3'],
        ],
        [
            'title' => 'interest = main_calculations(Loan_amount, Payment, r, t, q, q2, q3, m, n, first_day, date_extra, single_extra, date_single, Extra_payment)',
            'results' => ['interest' => <<<'TXT'
            main_calculations(Loan_amount, (Extra_payment + Payment_accelerated*ct2 + Payment_gen*ct1), r, t, q, q2, q3, m, n, first_day, date_extra, single_extra, date_single, Extra_payment)
            TXT],
        ],
        [
            'title' => 'term_extra = get_term_extra(interest)',
            'results' => ['term_extra' => <<<'TXT'
            get_term_extra(main_calculations(Loan_amount, (Extra_payment + Payment_accelerated*ct2 + Payment_gen*ct1), r, t, q, q2, q3, m, n, first_day, date_extra, single_extra, date_single, Extra_payment))
            TXT],
        ],
        [
            'title' => 't_diff = abs(t - term_extra)',
            'results' => ['t_diff' => <<<'TXT'
            abs(t - get_term_extra(main_calculations(Loan_amount, (Extra_payment + Payment_accelerated*ct2 + Payment_gen*ct1), r, t, q, q2, q3, m, n, first_day, date_extra, single_extra, date_single, Extra_payment)))
            TXT],
        ],
        [
            'title' => 'payoff_og = get_payoffCurr()',
            'results' => ['payoff_og' => 'get_payoffCurr()'],
        ],
        [
            'title' => 'payoff_extra = get_payoff_extra()',
            'results' => ['payoff_extra' => 'get_payoff_extra()'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";var milisecondsInADay=24*60*60*1000;var term_extra,interest_paid=0,payoffCurr,payoff_extra;omni.define("main_calculations",function(Loan_amount,payment,r,t,q,q2,q3,m,n,first_day,date_extra,single_extra,date_single,extra_payment){var periodsCurr=mathjs.ceil(t*12);var equivalent_baseCurr=1+r/m;var eq_powerCurr=m/12;var eq_pCurr=mathjs.pow(equivalent_baseCurr,eq_powerCurr)-1;var equivalent_base=1+r/m;var periods=t*q+1;if(q2===48){q=52;periods=t*52}if(q2===24){q=26;periods=t*26}var eq_power=m/q;var eq_p=mathjs.pow(equivalent_base,eq_power)-1;var growth_rate=0;var pmtCurr=Loan_amount*eq_pCurr*mathjs.pow(1+eq_pCurr,t*12)/(mathjs.pow(1+eq_pCurr,t*12)-1);var payment_amount=0;var payment_count_sum=0;var payment_count=0;var daysPassed=0;var daysInMonth,thisMonthInterest,thisMonthInterest_NoEx,date;var principal_amount=Loan_amount;var interest_amount=0,principal_paid=0,opening_balance,opening_balanceNoEx;var dayDiff=getDaysInMonth(new Date(first_day*milisecondsInADay));if(q!==12){dayDiff=365.25/q}var first_day2=first_day-dayDiff;var dateExtra=new Date(date_extra*milisecondsInADay-dayDiff);var dateSingle=new Date(date_single*milisecondsInADay-dayDiff);var firstDate=new Date(first_day2*milisecondsInADay);var payment2;if(dateExtra.getTime()<firstDate.getTime()){payment2=payment/(1+growth_rate)}else{payment2=payment-extra_payment}var principal_balance=Loan_amount+(payment2-eq_p*Loan_amount)/(1+eq_p);var principal_balance_NoEx=Loan_amount;var principal_amount_NoEx=Loan_amount;var principal_paid_NoEx=0;var interest_amount_NoEx=0;var payment_NoEx=pmtCurr*12/q3;var count2=0;interest_paid=0;for(var i=0;i<=periods;i++){date=new Date((first_day2+daysPassed)*milisecondsInADay);daysInMonth=getDaysInMonth(date);if(q!==12){daysInMonth=365.25/q}daysPassed+=daysInMonth;thisMonthInterest=principal_balance*eq_p;thisMonthInterest_NoEx=principal_balance_NoEx*eq_p;principal_amount=payment2-thisMonthInterest;principal_amount_NoEx=payment_NoEx-thisMonthInterest_NoEx;interest_amount=thisMonthInterest;interest_amount_NoEx=thisMonthInterest_NoEx;principal_balance=principal_balance-principal_amount;principal_balance_NoEx=principal_balance_NoEx-principal_amount_NoEx;if(dateExtra.getTime()>date.getTime()&&dateExtra.getTime()<date.getTime()+daysInMonth*milisecondsInADay){payment2=payment2+extra_payment}if(dateExtra.getTime()<date.getTime()){payment2=payment2*(1+growth_rate)}if(dateSingle.getTime()>date.getTime()&&dateSingle.getTime()<date.getTime()+daysInMonth*milisecondsInADay){payment2=payment2+single_extra;count2=1}count2=count2+1;if(count2===3&&dateSingle.getTime()<date.getTime()&&dateSingle.getTime()>firstDate.getTime()){payment2=payment2-single_extra}if(principal_balance>Loan_amount-1){principal_amount=0;interest_amount=0}if(principal_balance_NoEx>Loan_amount-1){principal_amount_NoEx=0;interest_amount_NoEx=0}if(principal_balance<0){principal_balance=0}if(principal_balance_NoEx<0){principal_balance_NoEx=0}if(principal_paid>Loan_amount){principal_amount=thisMonthInterest/eq_p;principal_paid=Loan_amount}if(principal_paid_NoEx>Loan_amount){principal_amount_NoEx=thisMonthInterest_NoEx/eq_p;principal_paid_NoEx=Loan_amount}if(principal_balance===0){payment2=principal_amount+interest_amount}if(principal_balance===Loan_amount){principal_amount=0}if(principal_balance_NoEx===Loan_amount){principal_amount_NoEx=0}if(principal_paid_NoEx===Loan_amount){principal_amount_NoEx=thisMonthInterest_NoEx/eq_p}if(principal_balance_NoEx===0){payment_NoEx=principal_amount_NoEx+interest_amount_NoEx}interest_paid+=interest_amount;principal_paid+=principal_amount;principal_paid_NoEx+=principal_amount_NoEx;if(principal_balance===0){principal_paid=Loan_amount;principal_amount=interest_amount/eq_p;payment2=interest_amount+principal_amount}payment_amount=principal_amount+interest_amount;if(payment_amount>0){payment_count=1}else{payment_count=0}payment_count_sum+=payment_count;if(principal_balance_NoEx===0&&opening_balanceNoEx>0){payoffCurr=date}if(principal_balance===0&&opening_balance>0){payoff_extra=date}opening_balance=principal_balance+principal_amount;opening_balanceNoEx=principal_balance_NoEx+principal_amount_NoEx}term_extra=payment_count_sum/q;return pmtCurr*periodsCurr-Loan_amount});omni.define("get_term_extra",function(interest){if(interest){return term_extra}});omni.define("get_interest_paid",function(){return interest_paid});omni.define("get_payoffCurr",function(){return payoffCurr.getTime()});omni.define("get_payoff_extra",function(){return payoff_extra.getTime()});function getDaysInMonth(date){var year=date.getFullYear();var month=date.getMonth();return new Date(year,month+1,0).getDate()}//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Mortgage calculator with extra payments works out Q2 and Q3 from Mortgage amount, Interest rate and Loan term. Nothing is looked up on this page: q2 is computed from mortgage amount and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Mortgage calculator with extra payments calculator works', 'html' => <<<'TXT'
            <p>Mortgage calculator with extra payments answers one question from 28 numbers, and the answer is Q2, Q3 and Ct1.</p><p>The relationship it solves reads Payment gen = Mortgage amount × Eq p × (Eq p + 1)^(N) ÷ ((Eq p + 1)^(N) − 1).</p><p>What comes back is Q2, Q3, Ct1 and Ct2 — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 28 boxes, and nothing else.</p><ul><li><strong>Mortgage amount</strong> — in USD. The loan principal to be repaid on a monthly basis.</li><li><strong>Interest rate</strong> — in percent. Yearly rate of interest.</li><li><strong>Loan term</strong> — in years</li><li><strong>Interest calculation method</strong> — a plain number, no unit. Here, you can set how often the bank calculates interest on the principal balance.</li><li><strong>Due date</strong> — a plain number, no unit, entered as a date. The following due date.</li><li><strong>Eq p</strong> — a plain number, no unit</li><li><strong>Payment frequency</strong> — a plain number, no unit</li><li><strong>Periodic extra payment</strong> — in USD</li><li><strong>Starting from</strong> — a plain number, no unit, entered as a date. Here you can set the date from which you will add extra money to your installments.</li><li><strong>Lump sum prepayment</strong> — in USD. Here you can set a one-time single extra payment to your mortgage on a specific date.</li><li><strong>Paid on</strong> — a plain number, no unit, entered as a date. Note, that if the set date doesn&#039;t coincide with your periodic payment due date, the extra payment is made on the following payment due date.</li><li><strong>Yearly increase in payments</strong> — in percent. Here you may set the percentage rate of growth of your payments that may reflect the average yearly increase of your income during the loan term. Note, that you always should consult your bank before transferring any additional amount above your installment stated in the loan contract as most banks will charge you an extra fee.</li><li><strong>Growth rate</strong> — in percent</li><li><strong>N monthly</strong> — a plain number, no unit</li><li><strong>G t</strong> — a plain number, no unit</li><li><strong>Eq p monthly</strong> — a plain number, no unit</li><li><strong>PMI treshold</strong> — in percent. Currently the typical PMI threshold in the USA is 20 percent. Still, you may change it according to the specific loan construction.</li><li><strong>N</strong> — a plain number, no unit</li><li><strong>Payment gen</strong> — a plain number, no unit</li><li><strong>Payment accelerated</strong> — in USD</li><li><strong>Payoff og</strong> — a plain number, no unit, entered as a date</li><li><strong>Term extra</strong> — a plain number, no unit</li><li><strong>Payment</strong> — in USD. The loan installment that you are obliged to pay at the due date of each payment period (if you set an extra periodic payment, the additional amount also appears here).</li><li><strong>Total payment monthly</strong> — in USD</li><li><strong>Payment monthly</strong> — in USD</li><li><strong>Interest</strong> — in USD</li><li><strong>T diff</strong> — a plain number, no unit</li><li><strong>Payoff extra</strong> — a plain number, no unit, entered as a date</li></ul><p>The result boxes are Q2, Q3, Ct1, Ct2, q, Payment freq table label; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Interest rate lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Payment gen</strong> = <code>Mortgage amount × Eq p × (Eq p + 1)^(N) ÷ ((Eq p + 1)^(N) − 1)</code></li><li><strong>Mortgage amount</strong> = <code>Payment gen ÷ Eq p − Payment gen × (Eq p + 1)^(− N) ÷ Eq p</code></li><li><strong>N</strong> = <code>ln( − Payment gen ÷ (Mortgage amount × Eq p − Payment gen)) ÷ ln(Eq p + 1)</code></li><li><strong>Eq p</strong> = <code>((Interest calculation method + Interest rate) ÷ Interest calculation method)^(Interest calculation method ÷ q) − 1</code></li><li><strong>Interest rate</strong> = <code>Interest calculation method × ((Eq p + 1)^(q ÷ Interest calculation method) − 1)</code></li><li><strong>q</strong> = <code>Interest calculation method × ln((Interest calculation method + Interest rate) ÷ Interest calculation method) ÷ ln(Eq p + 1)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Payment gen</strong> = <code>Mortgage amount × Eq p × (Eq p + 1)^(N) ÷ ((Eq p + 1)^(N) − 1)</code> — the form to use when Mortgage amount, Eq p and N are the values you have.</li><li><strong>Mortgage amount</strong> = <code>Payment gen ÷ Eq p − Payment gen × (Eq p + 1)^(− N) ÷ Eq p</code> — the form to use when Payment gen, Eq p and N are the values you have.</li><li><strong>N</strong> = <code>ln( − Payment gen ÷ (Mortgage amount × Eq p − Payment gen)) ÷ ln(Eq p + 1)</code> — the form to use when Payment gen, Mortgage amount and Eq p are the values you have.</li><li><strong>Eq p</strong> = <code>((Interest calculation method + Interest rate) ÷ Interest calculation method)^(Interest calculation method ÷ q) − 1</code> — the form to use when Interest calculation method, Interest rate and q are the values you have.</li><li><strong>Interest rate</strong> = <code>Interest calculation method × ((Eq p + 1)^(q ÷ Interest calculation method) − 1)</code> — the form to use when Interest calculation method, Eq p and q are the values you have.</li><li><strong>q</strong> = <code>Interest calculation method × ln((Interest calculation method + Interest rate) ÷ Interest calculation method) ÷ ln(Eq p + 1)</code> — the form to use when Interest calculation method, Interest rate and Eq p are the values you have.</li><li><strong>N</strong> = <code>q × Loan term</code> — the form to use when q and Loan term are the values you have.</li><li><strong>q</strong> = <code>N ÷ Loan term</code> — the form to use when N and Loan term are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Payment gen, Mortgage amount and N can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Interest rate, Loan term and Yearly increase in payments carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Q2, Q3 and Ct1 are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Mortgage amount left as a guess.</strong> Anything typed into Mortgage amount is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Interest rate left as a guess.</strong> Anything typed into Interest rate is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Mortgage amount to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Mortgage amount, Interest rate, Loan term and Interest calculation method ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Mortgage amount — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Q2 against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Q2 is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The chips cover percent and years. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It counts in whole days.</strong> The differences are counted in whole days, so an answer is a date or a number of days rather than an interval in hours. Expect a day&#039;s uncertainty if the event itself happened at an unknown time.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Mortgage amount, Interest rate and Loan term measured, Q2 and Q3 wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/trump-tax">Trump tax Calculator</a>, <a href="/finance/trumps-account">Trump&#039;s account Calculator</a> and <a href="/finance/ttm-trailing-twelve-months">TTM (trailing twelve months) Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Mortgage calculator with extra payments is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Mortgage calculator with extra payments calculator work out?', 'a' => 'Q2, Q3, Ct1 and Ct2, from Mortgage amount, Eq p and N. The relationship is Payment gen = Mortgage amount × Eq p × (Eq p + 1)^(N) ÷ ((Eq p + 1)^(N) − 1).'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Mortgage amount (USD), Interest rate (percent), Loan term (years), Interest calculation method, Due date. Fill mortgage amount, interest rate and loan term and leave Q2 empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Payment gen, Mortgage amount, N and Eq p can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Q2 is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Mortgage amount blank and the page solves for it, reporting Q2 instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Q2 keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/trump-tax', 'name' => 'Trump tax Calculator'],
            ['path' => '/finance/trumps-account', 'name' => 'Trump\'s account Calculator'],
            ['path' => '/finance/ttm-trailing-twelve-months', 'name' => 'TTM (trailing twelve months) Calculator'],
        ],
        'authors' => [],
    ],
];
