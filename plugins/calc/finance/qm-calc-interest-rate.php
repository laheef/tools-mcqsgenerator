<?php

/**
 * Interest rate
 * /finance/interest-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Interest rate',
    'meta' => ['title' => 'Interest rate Calculator — Formula & Results', 'description' => <<<'TXT'
    Interest rate works out whichever of i would like to calculate…, loan amount and current balance is left blank. The formula is printed in the form's own words.
    TXT, 'h1' => 'Interest rate Calculator', 'updated' => '2026-09-30'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'payment_subject_VS',
                            'label' => 'I would like to calculate…',
                            'type' => 'select',
                            'options' => ['interest rate on loan' => '1', 'interest rate on deposit' => '2'],
                            'dataset' => 'calculation_type_DS',
                            'default' => 'interest rate on loan',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Specifications',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'loan_amount',
                            'label' => 'Loan amount',
                            'type' => 'number',
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
                            'name' => 'current_balance',
                            'label' => 'Current balance',
                            'type' => 'number',
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
                            'name' => 'initial_deposit',
                            'label' => 'Initial deposit',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '2000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'payment_term',
                            'label' => 'Term',
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
                            'name' => 'compound_frequency_VS',
                            'label' => 'Interest capitalization frequency',
                            'type' => 'select',
                            'options' => [
                                'Yearly' => '1',
                                'Semi-annually' => '2',
                                'Quarterly' => '4',
                                'Monthly' => '12',
                                'Weekly' => '52.1775',
                                'Daily' => '365.242',
                                'Continuous' => '0',
                            ],
                            'dataset' => 'interest_capitalization_frequency_DS',
                            'control' => 'DROPDOWN',
                            'help' => 'You can set here how often the interest is calculated and added to your balance. For your savings or deposit account, it is the compounding frequency.',
                            'default' => 'Monthly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'payment_frequency_VS',
                            'label' => 'Payment frequency',
                            'type' => 'select',
                            'options' => [
                                'Yearly' => '1',
                                'Semi-annually' => '2',
                                'Quarterly' => '4',
                                'Monthly' => '12',
                                'Bi-weekly' => '26.08875',
                                'Weekly' => '52.1775',
                                'Daily' => '365.242',
                            ],
                            'dataset' => 'payment_frequency_DS',
                            'control' => 'DROPDOWN',
                            'default' => 'Monthly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'periodic_payment',
                            'label' => 'Periodic payment',
                            'type' => 'number',
                            'help' => 'The installment that you are paying in each agreed period.',
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
                            'name' => 'fee_prepaid',
                            'label' => 'Prepaid fees',
                            'type' => 'number',
                            'help' => 'Paid in advance before the beginning of the loan term – no interest is calculated on this fee but it still affects the APR.',
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
                            'name' => 'fee_loaned',
                            'label' => 'Loaned fees',
                            'type' => 'number',
                            'help' => 'Rolled into the loan, i.e. paid with the periodic installments – usually, banks calculate interest on this fee.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '300',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Results',
            'note' => '',
            'blocks' => [],
        ],
        [
            'title' => '',
            'note' => '',
            'blocks' => [],
        ],
        [
            'title' => 'Results',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'periodic_rate',
                            'label' => 'Rate for one period (%)',
                            'type' => 'result',
                            'rounding' => ['standard', '4'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'nominal_rate',
                            'label' => 'Nominal annual rate — the headline rate (%)',
                            'type' => 'result',
                            'rounding' => ['standard', '4'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'effective_rate',
                            'label' => 'Effective annual rate — the one to compare (%)',
                            'type' => 'result',
                            'rounding' => ['standard', '4'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_interest',
                            'label' => 'Total interest over the term',
                            'type' => 'result',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_payments',
                            'label' => 'Total paid over the term (loan only)',
                            'type' => 'result',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'periods',
                            'label' => 'Number of payments or compounding periods',
                            'type' => 'result',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [],
    'js' => <<<'TXT'
    "use strict";omni.define("checkInterestRateDeposit",function(_InitialDep,_FinalBal,_t,_compound_frequency,_q){var InitialDep=Number(_InitialDep);var FinalBal=Number(_FinalBal);var t=Number(_t);var m=Number(_compound_frequency);var q=Number(_q);var guess_sav=InitialDep/FinalBal*q;var iteration=0;var MAX_ITERATIONS=5000;var MIN_PRECISION=1e-7;var periods=q*t;var r_sav;periods=m*t;var oldR_sav;var newR_sav=guess_sav;do{oldR_sav=newR_sav;var dividend_sav=InitialDep*Math.pow(newR_sav/m+1,periods)-FinalBal;var divisor_sav=InitialDep*periods*Math.pow(newR_sav/m+1,periods-1)/m;newR_sav=newR_sav-dividend_sav/divisor_sav;++iteration}while(Math.abs(oldR_sav-newR_sav)>MIN_PRECISION&&iteration<=MAX_ITERATIONS);var oldI_sav_cont;var newI_sav_cont=guess_sav;var iterationR=0;do{oldI_sav_cont=newI_sav_cont;var dividend_sav_cont=InitialDep*Math.pow(Math.E,newI_sav_cont*t)-FinalBal;var divisor_sav_cont=InitialDep*t*Math.pow(Math.E,newI_sav_cont*t);newI_sav_cont=newI_sav_cont-dividend_sav_cont/divisor_sav_cont;++iterationR}while(Math.abs(oldI_sav_cont-newI_sav_cont)>MIN_PRECISION&&iterationR<=MAX_ITERATIONS);if(m===0){r_sav=newI_sav_cont}else{r_sav=newR_sav}return r_sav>0.0001});omni.define("getEffectiveAnnualRateDeposit",function(_InitialDep,_FinalBal,_t,_compound_frequency,_q){var InitialDep=Number(_InitialDep);var FinalBal=Number(_FinalBal);var t=Number(_t);var m=Number(_compound_frequency);var q=Number(_q);var guess_sav=InitialDep/FinalBal*q;var iteration=0;var MAX_ITERATIONS=5000;var MIN_PRECISION=1e-7;var periods=q*t;var r_sav;periods=m*t;var oldR_sav;var newR_sav=guess_sav;do{oldR_sav=newR_sav;var dividend_sav=InitialDep*Math.pow(newR_sav/m+1,periods)-FinalBal;var divisor_sav=InitialDep*periods*Math.pow(newR_sav/m+1,periods-1)/m;newR_sav=newR_sav-dividend_sav/divisor_sav;++iteration}while(Math.abs(oldR_sav-newR_sav)>MIN_PRECISION&&iteration<=MAX_ITERATIONS);var oldI_sav_cont;var newI_sav_cont=guess_sav;var iterationR=0;do{oldI_sav_cont=newI_sav_cont;var dividend_sav_cont=InitialDep*Math.pow(Math.E,newI_sav_cont*t)-FinalBal;var divisor_sav_cont=InitialDep*t*Math.pow(Math.E,newI_sav_cont*t);newI_sav_cont=newI_sav_cont-dividend_sav_cont/divisor_sav_cont;++iterationR}while(Math.abs(oldI_sav_cont-newI_sav_cont)>MIN_PRECISION&&iterationR<=MAX_ITERATIONS);if(m===0){r_sav=newI_sav_cont}else{r_sav=newR_sav}var oldI_i_sav;var newI_i_sav=r_sav;do{oldI_i_sav=newI_i_sav;var dividend_i_sav=InitialDep*Math.pow(newI_i_sav+1,t)-FinalBal;var divisor_i_sav=InitialDep*t*Math.pow(newI_i_sav+1,t-1);newI_i_sav=newI_i_sav-dividend_i_sav/divisor_i_sav;++iteration}while(Math.abs(oldI_i_sav-newI_i_sav)>MIN_PRECISION&&iteration<=MAX_ITERATIONS);var i_sav=newI_i_sav;return mathjs.round(i_sav*100,4)});omni.define("getAnnualNominalInterestRateDeposit",function(_InitialDep,_FinalBal,_t,_compound_frequency,_q){var InitialDep=Number(_InitialDep);var FinalBal=Number(_FinalBal);var t=Number(_t);var m=Number(_compound_frequency);var q=Number(_q);var guess_sav=InitialDep/FinalBal*q;var iteration=0;var MAX_ITERATIONS=5000;var MIN_PRECISION=1e-7;var periods=q*t;var r_sav;periods=m*t;var oldR_sav;var newR_sav=guess_sav;do{oldR_sav=newR_sav;var dividend_sav=InitialDep*Math.pow(newR_sav/m+1,periods)-FinalBal;var divisor_sav=InitialDep*periods*Math.pow(newR_sav/m+1,periods-1)/m;newR_sav=newR_sav-dividend_sav/divisor_sav;++iteration}while(Math.abs(oldR_sav-newR_sav)>MIN_PRECISION&&iteration<=MAX_ITERATIONS);var oldI_sav_cont;var newI_sav_cont=guess_sav;var iterationR=0;do{oldI_sav_cont=newI_sav_cont;var dividend_sav_cont=InitialDep*Math.pow(Math.E,newI_sav_cont*t)-FinalBal;var divisor_sav_cont=InitialDep*t*Math.pow(Math.E,newI_sav_cont*t);newI_sav_cont=newI_sav_cont-dividend_sav_cont/divisor_sav_cont;++iterationR}while(Math.abs(oldI_sav_cont-newI_sav_cont)>MIN_PRECISION&&iterationR<=MAX_ITERATIONS);if(m===0){r_sav=newI_sav_cont}else{r_sav=newR_sav}return mathjs.round(r_sav*100,4)});omni.define("checkInterestRateLoan",function(_t,_compound_frequency,_q,_Payment,_LoanAmount){var t=Number(_t);var m=Number(_compound_frequency);var q=Number(_q);var Payment=Number(_Payment);var LoanAmount=Number(_LoanAmount);var guess=Payment/LoanAmount*q;var iteration=0;var MAX_ITERATIONS=5000;var MIN_PRECISION=1e-7;var periods=q*t;var r_loan;var oldI_eq_p;var newI_eq_p=guess;do{oldI_eq_p=newI_eq_p;var dividend=Payment*periods-Payment*periods*Math.pow(1+newI_eq_p,-periods)-newI_eq_p*LoanAmount*periods;var divisor=Payment*periods*periods*Math.pow(1+newI_eq_p,-periods-1)-periods*LoanAmount;newI_eq_p=newI_eq_p-dividend/divisor;++iteration}while(Math.abs(oldI_eq_p-newI_eq_p)>MIN_PRECISION&&iteration<=MAX_ITERATIONS);var eq_p=newI_eq_p;var eq=eq_p*q;var oldI_r_cont;var newI_r_cont=eq_p;do{oldI_r_cont=newI_r_cont;var dividend_r_cont=q*(mathjs.pow(Math.E,newI_r_cont/q)-1)-eq;var divisor_r_cont=q*newI_r_cont/q*mathjs.pow(Math.E,newI_r_cont/q-1)+mathjs.pow(Math.E,newI_r_cont/q);newI_r_cont=newI_r_cont-dividend_r_cont/divisor_r_cont;++iteration}while(Math.abs(oldI_r_cont-newI_r_cont)>MIN_PRECISION&&iteration<=MAX_ITERATIONS);if(m===0){r_loan=newI_r_cont}else{r_loan=m*(mathjs.pow((q+eq)/q,q/m)-1)}return r_loan>0.0001});omni.define("getPeriodicPaymentLoan",function(_t,_compound_frequency,_q,_Payment,_LoanAmount,_Fee_rolled){var t=Number(_t);var m=Number(_compound_frequency);var q=Number(_q);var Payment=Number(_Payment);var LoanAmount=Number(_LoanAmount);var Fee_rolled=Number(_Fee_rolled);var guess=Payment/LoanAmount*q;var iteration=0;var MAX_ITERATIONS=5000;var MIN_PRECISION=1e-7;var periods=q*t;var r_loan;var i_loan;var oldI_eq_p;var newI_eq_p=guess;do{oldI_eq_p=newI_eq_p;var dividend=Payment*periods-Payment*periods*Math.pow(1+newI_eq_p,-periods)-newI_eq_p*LoanAmount*periods;var divisor=Payment*periods*periods*Math.pow(1+newI_eq_p,-periods-1)-periods*LoanAmount;newI_eq_p=newI_eq_p-dividend/divisor;++iteration}while(Math.abs(oldI_eq_p-newI_eq_p)>MIN_PRECISION&&iteration<=MAX_ITERATIONS);var eq_p=newI_eq_p;var eq=eq_p*q;var oldI_r_cont;var newI_r_cont=eq_p;do{oldI_r_cont=newI_r_cont;var dividend_r_cont=q*(mathjs.pow(Math.E,newI_r_cont/q)-1)-eq;var divisor_r_cont=q*newI_r_cont/q*mathjs.pow(Math.E,newI_r_cont/q-1)+mathjs.pow(Math.E,newI_r_cont/q);newI_r_cont=newI_r_cont-dividend_r_cont/divisor_r_cont;++iteration}while(Math.abs(oldI_r_cont-newI_r_cont)>MIN_PRECISION&&iteration<=MAX_ITERATIONS);if(m===0){r_loan=newI_r_cont}else{r_loan=m*(mathjs.pow((q+eq)/q,q/m)-1)}if(m===0){i_loan=Math.pow(Math.E,r_loan)-1}else{i_loan=Math.pow(1+r_loan/m,m)-1}var LoanAmount_fee=LoanAmount+Fee_rolled;return LoanAmount_fee*i_loan/q*Math.pow(1+i_loan/q,periods)/(Math.pow(1+i_loan/q,periods)-1)});omni.define("getTotalInterestLoan",function(_t,_q,_Payment,_LoanAmount,_Fee_prior,_Fee_rolled){var t=Number(_t);var q=Number(_q);var Payment=Number(_Payment);var LoanAmount=Number(_LoanAmount);var Fee_prior=Number(_Fee_prior);var Fee_rolled=Number(_Fee_rolled);var cost_add=Fee_rolled+Fee_prior;var total_payment=Payment*q*t+cost_add;var total_interest=total_payment-LoanAmount-cost_add;return mathjs.round(total_interest,2)});omni.define("getTotalPaymentsLoan",function(_t,_q,_Payment,_Fee_prior,_Fee_rolled){var t=Number(_t);var q=Number(_q);var Payment=Number(_Payment);var Fee_prior=Number(_Fee_prior);var Fee_rolled=Number(_Fee_rolled);var cost_add=Fee_rolled+Fee_prior;var total_payment=Payment*q*t+cost_add;return mathjs.round(total_payment,2)});omni.define("getAnnualPercentageRateLoan",function(_t,_compound_frequency,_q,_Payment,_LoanAmount,_Fee_prior,_Fee_rolled){var t=Number(_t);var m=Number(_compound_frequency);var q=Number(_q);var Payment=Number(_Payment);var LoanAmount=Number(_LoanAmount);var Fee_prior=Number(_Fee_prior);var Fee_rolled=Number(_Fee_rolled);var guess=Payment/LoanAmount*q;var iteration=0;var MAX_ITERATIONS=5000;var MIN_PRECISION=1e-7;var periods=q*t;var r_loan;var i_loan;var oldI_eq_p;var newI_eq_p=guess;do{oldI_eq_p=newI_eq_p;var dividend=Payment*periods-Payment*periods*Math.pow(1+newI_eq_p,-periods)-newI_eq_p*LoanAmount*periods;var divisor=Payment*periods*periods*Math.pow(1+newI_eq_p,-periods-1)-periods*LoanAmount;newI_eq_p=newI_eq_p-dividend/divisor;++iteration}while(Math.abs(oldI_eq_p-newI_eq_p)>MIN_PRECISION&&iteration<=MAX_ITERATIONS);var eq_p=newI_eq_p;var eq=eq_p*q;var oldI_r_cont;var newI_r_cont=eq_p;do{oldI_r_cont=newI_r_cont;var dividend_r_cont=q*(mathjs.pow(Math.E,newI_r_cont/q)-1)-eq;var divisor_r_cont=q*newI_r_cont/q*mathjs.pow(Math.E,newI_r_cont/q-1)+mathjs.pow(Math.E,newI_r_cont/q);newI_r_cont=newI_r_cont-dividend_r_cont/divisor_r_cont;++iteration}while(Math.abs(oldI_r_cont-newI_r_cont)>MIN_PRECISION&&iteration<=MAX_ITERATIONS);if(m===0){r_loan=newI_r_cont}else{r_loan=m*(mathjs.pow((q+eq)/q,q/m)-1)}if(m===0){i_loan=Math.pow(Math.E,r_loan)-1}else{i_loan=Math.pow(1+r_loan/m,m)-1}var LoanAmount_fee=LoanAmount+Fee_rolled;var Payment_fee=LoanAmount_fee*i_loan/q*Math.pow(1+i_loan/q,periods)/(Math.pow(1+i_loan/q,periods)-1);var old_APR;var new_APR=eq;do{old_APR=new_APR;var dividend_APR=Payment_fee*periods+Fee_prior-Payment_fee*periods*Math.pow(1+new_APR,-periods)-Fee_prior*Math.pow(1+new_APR,-periods)-new_APR*LoanAmount*periods;var divisor_APR=Payment_fee*periods*periods*Math.pow(1+new_APR,-periods-1)+Fee_prior*periods*Math.pow(1+new_APR,-periods-1)-periods*LoanAmount;new_APR=new_APR-dividend_APR/divisor_APR;++iteration}while(Math.abs(old_APR-new_APR)>MIN_PRECISION&&iteration<=MAX_ITERATIONS);var APR=new_APR*q;return mathjs.round(APR*100,4)});omni.define("getEffectiveAnnualRateLoan",function(_t,_compound_frequency,_q,_Payment,_LoanAmount){var t=Number(_t);var m=Number(_compound_frequency);var q=Number(_q);var Payment=Number(_Payment);var LoanAmount=Number(_LoanAmount);var guess=Payment/LoanAmount*q;var iteration=0;var MAX_ITERATIONS=5000;var MIN_PRECISION=1e-7;var periods=q*t;var r_loan;var i_loan;var oldI_eq_p;var newI_eq_p=guess;do{oldI_eq_p=newI_eq_p;var dividend=Payment*periods-Payment*periods*Math.pow(1+newI_eq_p,-periods)-newI_eq_p*LoanAmount*periods;var divisor=Payment*periods*periods*Math.pow(1+newI_eq_p,-periods-1)-periods*LoanAmount;newI_eq_p=newI_eq_p-dividend/divisor;++iteration}while(Math.abs(oldI_eq_p-newI_eq_p)>MIN_PRECISION&&iteration<=MAX_ITERATIONS);var eq_p=newI_eq_p;var eq=eq_p*q;var oldI_r_cont;var newI_r_cont=eq_p;do{oldI_r_cont=newI_r_cont;var dividend_r_cont=q*(mathjs.pow(Math.E,newI_r_cont/q)-1)-eq;var divisor_r_cont=q*newI_r_cont/q*mathjs.pow(Math.E,newI_r_cont/q-1)+mathjs.pow(Math.E,newI_r_cont/q);newI_r_cont=newI_r_cont-dividend_r_cont/divisor_r_cont;++iteration}while(Math.abs(oldI_r_cont-newI_r_cont)>MIN_PRECISION&&iteration<=MAX_ITERATIONS);if(m===0){r_loan=newI_r_cont}else{r_loan=m*(mathjs.pow((q+eq)/q,q/m)-1)}if(m===0){i_loan=Math.pow(Math.E,r_loan)-1}else{i_loan=Math.pow(1+r_loan/m,m)-1}return mathjs.round(i_loan*100,4)});omni.define("getPeriodicRateLoan",function(_t,_compound_frequency,_q,_Payment,_LoanAmount){var t=Number(_t);var m=Number(_compound_frequency);var q=Number(_q);var Payment=Number(_Payment);var LoanAmount=Number(_LoanAmount);var guess=Payment/LoanAmount*q;var iteration=0;var MAX_ITERATIONS=5000;var MIN_PRECISION=1e-7;var periods=q*t;var oldI_eq_p;var newI_eq_p=guess;do{oldI_eq_p=newI_eq_p;var dividend=Payment*periods-Payment*periods*Math.pow(1+newI_eq_p,-periods)-newI_eq_p*LoanAmount*periods;var divisor=Payment*periods*periods*Math.pow(1+newI_eq_p,-periods-1)-periods*LoanAmount;newI_eq_p=newI_eq_p-dividend/divisor;++iteration}while(Math.abs(oldI_eq_p-newI_eq_p)>MIN_PRECISION&&iteration<=MAX_ITERATIONS);var eq_p=newI_eq_p;var eq=eq_p*q;var oldI_r_cont;var newI_r_cont=eq_p;do{oldI_r_cont=newI_r_cont;var dividend_r_cont=q*(mathjs.pow(Math.E,newI_r_cont/q)-1)-eq;var divisor_r_cont=q*newI_r_cont/q*mathjs.pow(Math.E,newI_r_cont/q-1)+mathjs.pow(Math.E,newI_r_cont/q);newI_r_cont=newI_r_cont-dividend_r_cont/divisor_r_cont;++iteration}while(Math.abs(oldI_r_cont-newI_r_cont)>MIN_PRECISION&&iteration<=MAX_ITERATIONS);var r_loan=m*(mathjs.pow((q+eq)/q,q/m)-1);var i_loan=Math.pow(1+r_loan/m,m)-1;return mathjs.round(i_loan*100/m,4)});omni.define("getAnnualNominalInterestRateLoan",function(_t,_compound_frequency,_q,_Payment,_LoanAmount){var t=Number(_t);var m=Number(_compound_frequency);var q=Number(_q);var Payment=Number(_Payment);var LoanAmount=Number(_LoanAmount);var guess=Payment/LoanAmount*q;var iteration=0;var MAX_ITERATIONS=5000;var MIN_PRECISION=1e-7;var periods=q*t;var r_loan;var i_loan;var oldI_eq_p;var newI_eq_p=guess;do{oldI_eq_p=newI_eq_p;var dividend=Payment*periods-Payment*periods*Math.pow(1+newI_eq_p,-periods)-newI_eq_p*LoanAmount*periods;var divisor=Payment*periods*periods*Math.pow(1+newI_eq_p,-periods-1)-periods*LoanAmount;newI_eq_p=newI_eq_p-dividend/divisor;++iteration}while(Math.abs(oldI_eq_p-newI_eq_p)>MIN_PRECISION&&iteration<=MAX_ITERATIONS);var eq_p=newI_eq_p;var eq=eq_p*q;var oldI_r_cont;var newI_r_cont=eq_p;do{oldI_r_cont=newI_r_cont;var dividend_r_cont=q*(mathjs.pow(Math.E,newI_r_cont/q)-1)-eq;var divisor_r_cont=q*newI_r_cont/q*mathjs.pow(Math.E,newI_r_cont/q-1)+mathjs.pow(Math.E,newI_r_cont/q);newI_r_cont=newI_r_cont-dividend_r_cont/divisor_r_cont;++iteration}while(Math.abs(oldI_r_cont-newI_r_cont)>MIN_PRECISION&&iteration<=MAX_ITERATIONS);if(m===0){r_loan=newI_r_cont}else{r_loan=m*(mathjs.pow((q+eq)/q,q/m)-1)}if(m===0){i_loan=Math.pow(Math.E,r_loan)-1}else{i_loan=Math.pow(1+r_loan/m,m)-1}if(m>0){return mathjs.round(r_loan*100,4)}else{return mathjs.round(i_loan*100,4)}});//# sourceURL=customJs.js
    /*
     * Shared helpers for the hand-written repairs in data/calc/supplement/.
     *
     * Every supplement script is evaluated in its own closed scope, so anything the
     * repairs have in common has to travel with each one. Supplement::apply()
     * prepends this file to every page script it merges.
     */
    
    /**
     * The numbers in one free-text box: "1, 2, 3", "1 2 3", "1;2;3" or one per line.
     *
     * A statistics page that asked for fifty separate boxes now asks for one, and
     * the visitor types a list the way they would in a spreadsheet cell. Anything
     * that is not a number is ignored rather than turned into NaN — a stray comma
     * or an accidental letter must not poison the whole set.
     */
    function snumlist(text) {
      if (typeof text !== 'string' || text.trim() === '') return [];
      var out = [];
      text.split(/[\s,;]+/).forEach(function (piece) {
        if (piece === '') return;
        var n = Number(piece.replace(/(\d),(?=\d{3}\b)/g, '$1'));
        if (isFinite(n)) out.push(n);
      });
      return out;
    }
    
    /** Median of an already sorted array of numbers. */
    function smedian(sorted) {
      var n = sorted.length;
      if (!n) return NaN;
      var mid = Math.floor(n / 2);
      return n % 2 ? sorted[mid] : (sorted[mid - 1] + sorted[mid]) / 2;
    }
    
    /** The numbers a visitor actually typed, in field order, skipping blanks. */
    function snumbers(values, pattern, limit) {
      var out = [];
      for (var i = 1; i <= limit; i++) {
        var key = pattern.replace('%d', i);
        var raw = values[key];
        if (raw === undefined || raw === null || raw === '') continue;
        var n = Number(raw);
        if (!isFinite(n)) continue;
        out.push({ key: key, n: n });
      }
      return out;
    }
    
    /** A plain number, no trailing zeros, at most `d` decimals. */
    function snum(n, d) {
      if (!isFinite(n)) return '—';
      var v = Number(n.toFixed(d === undefined ? 4 : d));
      return String(v);
    }
    
    /** Round to `d` decimals but keep it a number. */
    function sround(n, d) {
      var f = Math.pow(10, d === undefined ? 2 : d);
      return Math.round(n * f) / f;
    }
    
    /** Greatest common divisor of two whole numbers. */
    function sgcd(x, y) {
      x = Math.abs(Math.round(x));
      y = Math.abs(Math.round(y));
      return y === 0 ? x : sgcd(y, x % y);
    }
    
    /** "10" / "1/3" — a fraction reduced to lowest terms. */
    function sfrac(part, whole) {
      if (!whole) return '—';
      var a = Math.round(part), b = Math.round(whole);
      var g = sgcd(a, b) || 1;
      if (g > 1) { a = a / g; b = b / g; }
      return b === 1 ? String(a) : a + '/' + b;
    }
    
    /** Minimal escape for text that came out of the definition or a label. */
    function sesc(s) {
      return String(s).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
    }
    
    /**
     * A table from a header list and rows of cells. Cells are printed as they are
     * given, so a caller can pass a pre-formatted string.
     */
    function stable(head, rows, foot) {
      var html = '<table><thead><tr>';
      head.forEach(function (h) { html += '<th>' + h + '</th>'; });
      html += '</tr></thead><tbody>';
      rows.forEach(function (r) {
        html += '<tr>';
        r.forEach(function (c) { html += '<td>' + c + '</td>'; });
        html += '</tr>';
      });
      if (foot) {
        html += '<tr>';
        foot.forEach(function (c) { html += '<th>' + c + '</th>'; });
        html += '</tr>';
      }
      return html + '</tbody></table>';
    }
    
    /** Turn a list of [label, value] pairs into "A: 3, B: 4" style prose. */
    function slist(pairs) {
      return pairs.map(function (p) { return p[0] + ': ' + p[1]; }).join(', ');
    }
    
    /**
     * Tidy a value a page script published.
     *
     * The harvested scripts speak the reference site's front-end dialect: `==2==`
     * for a subscript, `**bold**`, `<br>` between lines, and often a trailing
     * comma or a dangling colon left where a second half of a sentence used to
     * follow. Our panel prints the string as plain text, so those markers would
     * land on screen as punctuation soup. This turns them into something readable
     * without changing the value itself.
     */
    function sclean(value) {
      var s = value === null || value === undefined ? '' : String(value);
      var sub = {'0': '₀', '1': '₁', '2': '₂', '3': '₃', '4': '₄',
                 '5': '₅', '6': '₆', '7': '₇', '8': '₈', '9': '₉'};
      s = s.replace(/==(\d+)==/g, function (all, d) {
        return d.split('').map(function (c) { return sub[c] || c; }).join('');
      });
      /* the same convention for superscripts: "^^+^^" is a charge, "^^2^^" an index */
      var sup = {'0': '⁰', '1': '¹', '2': '²', '3': '³', '4': '⁴',
                 '5': '⁵', '6': '⁶', '7': '⁷', '8': '⁸', '9': '⁹',
                 '+': '⁺', '-': '⁻'};
      s = s.replace(/\^\^([0-9+-]+)\^\^/g, function (all, d) {
        return d.split('').map(function (c) { return sup[c] || c; }).join('');
      });
      s = s.replace(/\*\*(.+?)\*\*/g, '$1');
      s = s.replace(/<br\s*\/?>/gi, ' ');
      s = s.replace(/<\/(p|div|li)>/gi, ' ');
      s = s.replace(/<[^>]+>/g, '');
      s = s.replace(/&nbsp;/g, ' ').replace(/&lt;/g, '<').replace(/&gt;/g, '>').replace(/&amp;/g, '&');
      /* invisible characters the reference used as "this line is blank": an Arabic
         letter mark, a zero-width space, a byte-order mark. They render as nothing
         and would otherwise keep an empty row looking filled. */
      s = s.replace(/[\u061C\u200B\u200C\u200D\uFEFF\u00AD]/g, '');
      s = s.replace(/\s+/g, ' ').trim();
      s = s.replace(/[,;:\-–—]\s*$/, '').trim();
      return s;
    }
    
    /**
     * Turn a drop-down option's id back into its label.
     *
     * Several harvested scripts publish `ctx.getRawInput("…")` of a select, which
     * is the option's uid (`z3nTqAbVhlMSz-B46c7Xk`) and not the words the visitor
     * picked. The uid is in the page markup as an option value or a radio value,
     * so the label is one lookup away.
     */
    function sdelabel(value) {
      if (typeof value !== 'string' || !/[A-Za-z0-9_-]{20,28}/.test(value)) { return value; }
      var one = function (id) {
        if (!/^[A-Za-z0-9_-]{20,28}$/.test(id)) { return id; }
        var el = document.querySelector('[value="' + id + '"]');
        if (!el) { return id; }
        if (el.tagName === 'OPTION') { return (el.textContent || '').trim() || id; }
        var lab = el.closest ? el.closest('label') : null;
        return lab ? ((lab.textContent || '').trim() || id) : id;
      };
      /* a published value can be several ids joined by commas ("Possibilities,
         MD4, NTLM"), so map each piece rather than the whole string */
      return value.split(/\s*,\s*/).map(one).join(', ');
    }
    
    /* periods per year for each frequency picker, read from the chosen label */
    var FREQ_WORDS = [
      { test: /year/i, per: 1 },
      { test: /semi/i, per: 2 },
      { test: /quarter/i, per: 4 },
      { test: /month/i, per: 12 },
      { test: /bi-?week/i, per: 26.08875 },
      { test: /week/i, per: 52.1775 },
      { test: /daily/i, per: 365.242 },
      { test: /continuous/i, per: 0 }
    ];
    
    function chosenLabel(name) {
      var sel = document.querySelector('select[data-var="' + name + '"]');
      if (sel && sel.selectedIndex >= 0) { return (sel.options[sel.selectedIndex].text || '').trim(); }
      var radios = document.querySelectorAll('input[type="radio"][name="' + name + '"]');
      for (var i = 0; i < radios.length; i++) {
        if (radios[i].checked) {
          var host = radios[i].closest('label') || radios[i].parentNode;
          return (host.innerText || '').trim();
        }
      }
      return '';
    }
    
    function perYear(name, fallback) {
      var text = chosenLabel(name);
      for (var i = 0; i < FREQ_WORDS.length; i++) {
        if (FREQ_WORDS[i].test.test(text)) { return FREQ_WORDS[i].per; }
      }
      return fallback;
    }
    
    /* the periodic rate that repays a balance of P with n payments of A */
    function solveLoanRate(P, A, n) {
      if (P <= 0 || A <= 0 || n <= 0) { return null; }
      /* the payment must at least cover the interest, or no rate exists */
      var lo = -0.999, hi = 1.0;
      var f = function (i) {
        if (Math.abs(i) < 1e-12) { return P - A * n; }
        return P - A * (1 - Math.pow(1 + i, -n)) / i;
      };
      var flo = f(lo), fhi = f(hi);
      if (flo * fhi > 0) { return null; }
      for (var k = 0; k < 200; k++) {
        var mid = (lo + hi) / 2;
        var fm = f(mid);
        if (Math.abs(fm) < 1e-10) { return mid; }
        if (flo * fm <= 0) { hi = mid; fhi = fm; } else { lo = mid; flo = fm; }
      }
      return (lo + hi) / 2;
    }
    
    function money(x) {
      return snum(x, 2).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    }
    
    /*
     * A hook only fires when every field it depends on is on the page, and half of
     * these fields are hidden by the other mode's choice — so the hook depends on
     * the two fields that are always there and reads the rest from the form.
     */
    function inputNum(name, fallback) {
      var el = document.querySelector('input[data-var="' + name + '"]');
      if (!el) { return fallback; }
      var value = Number(el.value);
      return el.value !== '' && isFinite(value) ? value : fallback;
    }
    
    omni.onResult(['payment_subject_VS', 'payment_term'], function (ctx, v) {
      var mode = /deposit/i.test(chosenLabel('payment_subject_VS')) ? 'deposit' : 'loan';
      var term = inputNum('payment_term', NaN);
      if (!isFinite(term) || term <= 0) {
        ctx.addUnmetCondition('Enter the term in years.');
        return;
      }
      if (term > 60) {
        ctx.addUnmetCondition('A term of ' + snum(term, 0) + ' years is longer than this page covers (60).');
        return;
      }
    
      if (mode === 'deposit') {
        var start = inputNum('initial_deposit', NaN);
        var end = inputNum('current_balance', NaN);
        if (!isFinite(start) || start <= 0) {
          ctx.addUnmetCondition('Enter the amount you started with.');
          return;
        }
        if (!isFinite(end) || end <= 0) {
          ctx.addUnmetCondition('Enter the balance you have now.');
          return;
        }
        var m = perYear('compound_frequency_VS', 1);
        if (m === 0) {
          /* continuous compounding: FV = P·e^(rt) */
          var rCont = Math.log(end / start) / term;
          ctx.exportValue('periodic_rate', sround(rCont * 100, 4));
          ctx.exportValue('nominal_rate', sround(rCont * 100, 4));
          ctx.exportValue('effective_rate', sround((Math.exp(rCont) - 1) * 100, 4));
          ctx.exportValue('total_interest', sround(end - start, 2));
          ctx.exportValue('total_payments', 0);
          ctx.exportValue('periods', Math.round(term));
          ctx.addHtml('<p><strong>A deposit that grew from ' + money(start) + ' to ' + money(end) + ' in '
            + snum(term, 2) + ' years earned a continuous rate of ' + snum(rCont * 100, 4) + ' % a year, '
            + 'which is ' + snum((Math.exp(rCont) - 1) * 100, 4) + ' % as an effective annual rate.</strong></p>');
          ctx.addHtml('<p class="calc-unmet">Continuous compounding is the limit of compounding more and more '
            + 'often, so it is the highest effective rate for a given nominal one. Interest of ' + money(end - start)
            + ' on ' + money(start) + ' over ' + snum(term, 2) + ' years.</p>');
          return;
        }
        var nPeriods = m * term;
        var i = Math.pow(end / start, 1 / nPeriods) - 1;
        var nominal = i * m * 100;
        var effective = (Math.pow(1 + i, m) - 1) * 100;
    
        ctx.exportValue('periodic_rate', sround(i * 100, 4));
        ctx.exportValue('nominal_rate', sround(nominal, 4));
        ctx.exportValue('effective_rate', sround(effective, 4));
        ctx.exportValue('total_interest', sround(end - start, 2));
        ctx.exportValue('total_payments', 0);
        ctx.exportValue('periods', Math.round(nPeriods));
    
        ctx.addHtml('<p><strong>The rate is ' + snum(nominal, 4) + ' % a year nominal — '
          + snum(effective, 4) + ' % effective, once the compounding is taken into account.</strong> '
          + money(end - start) + ' of interest was earned on ' + money(start) + ' over ' + snum(term, 2)
          + ' years.</p>');
    
        var rows = [
          ['Starting amount', money(start)],
          ['Balance now', money(end)],
          ['Term', snum(term, 2) + ' years'],
          ['Compounding', chosenLabel('compound_frequency_VS')],
          ['Periods', snum(nPeriods, 2)],
          ['Rate per period', snum(i * 100, 4) + ' %'],
          ['Nominal annual rate', snum(nominal, 4) + ' %'],
          ['Effective annual rate', snum(effective, 4) + ' %'],
          ['Interest earned', money(end - start)]
        ];
        ctx.addHtml(stable(['Item', 'Value'], rows));
    
        /* the same money at other compounding frequencies, so the gap is visible */
        var freqRows = [[1, 'Yearly'], [2, 'Semi-annually'], [4, 'Quarterly'], [12, 'Monthly'],
                        [365.242, 'Daily']].map(function (f) {
          var per = Math.pow(1 + i, m / f[0]) - 1;
          return [f[1], snum(per * f[0] * 100, 4) + ' %', snum((Math.pow(1 + per, f[0]) - 1) * 100, 4) + ' %'];
        });
        ctx.addHtml('<p>The same return expressed at other compounding frequencies:</p>');
        ctx.addHtml(stable(['Compounded', 'Nominal', 'Effective'], freqRows));
    
        ctx.addHtml('<p class="calc-unmet">The nominal rate is what a bank advertises and the effective rate is '
          + 'what your money actually does — 5 % nominal compounded monthly is 5.116 % effective. The formula '
          + 'above assumes the interest stayed in the account and nothing was added or withdrawn; any deposit '
          + 'or withdrawal in the middle changes the answer and needs a money-weighted calculation instead '
          + '(that is what an IRR does). Tax on the interest is not included.</p>');
        return;
      }
    
      /* ---- loan ------------------------------------------------------------- */
      var principal = inputNum('loan_amount', NaN);
      var payment = inputNum('periodic_payment', NaN);
      if (!isFinite(principal) || principal <= 0) {
        ctx.addUnmetCondition('Enter the amount borrowed.');
        return;
      }
      if (!isFinite(payment) || payment <= 0) {
        ctx.addUnmetCondition('Enter the payment you make each period.');
        return;
      }
      var prepaid = inputNum('fee_prepaid', 0);
      var loaned = inputNum('fee_loaned', 0);
      var per = perYear('payment_frequency_VS', 12);
      if (per === 0) { per = 12; }
      var n = Math.round(per * term);
      if (n < 1) {
        ctx.addUnmetCondition('That term is shorter than one payment period.');
        return;
      }
    
      /* the balance that has to be repaid is the loan plus any fees rolled into it */
      var balance = principal + loaned;
      var iLoan = solveLoanRate(balance, payment, n);
      if (iLoan === null) {
        var totalIfNoInterest = principal / n;
        ctx.addUnmetCondition('A payment of ' + money(payment) + ' does not repay ' + money(balance) + ' in '
          + n + ' payments at any positive rate — the payment would have to be at least about '
          + money(totalIfNoInterest) + ' a period even with no interest at all.');
        return;
      }
    
      var nominalLoan = iLoan * per * 100;
      var effectiveLoan = (Math.pow(1 + iLoan, per) - 1) * 100;
      var totalPaid = payment * n;
      var totalInterest = totalPaid - balance;
    
      /* the APR folds the prepaid fees into the rate: the money you actually received */
      var aprRate = solveLoanRate(principal - prepaid, payment, n);
      var apr = aprRate === null ? nominalLoan : aprRate * per * 100;
    
      ctx.exportValue('periodic_rate', sround(iLoan * 100, 4));
      ctx.exportValue('nominal_rate', sround(nominalLoan, 4));
      ctx.exportValue('effective_rate', sround(effectiveLoan, 4));
      ctx.exportValue('total_interest', sround(totalInterest, 2));
      ctx.exportValue('total_payments', sround(totalPaid, 2));
      ctx.exportValue('periods', n);
    
      ctx.addHtml('<p><strong>Paying ' + money(payment) + ' ' + chosenLabel('payment_frequency_VS').toLowerCase()
        + ' for ' + snum(term, 2) + ' years on ' + money(balance) + ' works out at a nominal '
        + snum(nominalLoan, 4) + ' % a year — ' + snum(effectiveLoan, 4) + ' % effective.</strong> You pay '
        + money(totalPaid) + ' in total, of which ' + money(totalInterest) + ' is interest.</p>');
    
      var rows = [
        ['Amount borrowed', money(principal)],
        ['Fees rolled into the loan', money(loaned)],
        ['Balance being repaid', money(balance)],
        ['Prepaid fees', money(prepaid)],
        ['Payment', money(payment) + ' ' + chosenLabel('payment_frequency_VS').toLowerCase()],
        ['Payments', String(n)],
        ['Rate per payment period', snum(iLoan * 100, 4) + ' %'],
        ['Nominal annual rate', snum(nominalLoan, 4) + ' %'],
        ['Effective annual rate', snum(effectiveLoan, 4) + ' %'],
        ['APR, with the prepaid fee counted', snum(apr, 4) + ' %'],
        ['Total paid', money(totalPaid)],
        ['Total interest', money(totalInterest)]
      ];
      ctx.addHtml(stable(['Item', 'Value'], rows));
    
      ctx.addHtml('<p>The APR is higher than the nominal rate whenever there are prepaid fees, because you '
        + 'received ' + money(principal - prepaid) + ' and are paying back as if you had received '
        + money(principal) + '. That is exactly what the APR is for: it is the number that lets you compare '
        + 'two offers with different fees.</p>');
    
      ctx.addHtml('<p class="calc-unmet">The rate is solved, not assumed: no closed formula gives the interest '
        + 'rate from a payment schedule, so the page bisects until the present value of the payments equals '
        + 'the balance. Two things to keep in mind. First, the answer assumes every payment is made on time and '
        + 'the rate never changes — a variable-rate loan drifts. Second, the effective rate here compounds the '
        + 'periodic rate a whole number of times a year, which is right for a mortgage or a car loan and '
        + 'slightly generous for daily payments. Arrangement fees paid in cash, insurance sold with the loan '
        + 'and early-repayment charges are not included unless you type them into the fee boxes.</p>');
    });
    TXT,
    'showIf' => [
        'loan_amount' => 'payment_subject_VS == 1',
        'periodic_payment' => 'payment_subject_VS == 1',
        'fee_prepaid' => 'payment_subject_VS == 1',
        'fee_loaned' => 'payment_subject_VS == 1',
        'payment_frequency_VS' => 'payment_subject_VS == 1',
        'initial_deposit' => 'payment_subject_VS == 2',
        'current_balance' => 'payment_subject_VS == 2',
        'compound_frequency_VS' => 'payment_subject_VS == 2',
    ],
    'article' => [
        'intro' => <<<'TXT'
        Interest rate turns I would like to calculate…, Loan amount and Current balance into Rate for one period (%) and Nominal annual rate — the headline rate (%). The arithmetic is the whole method: rate for one period (%) is worked out from i would like to calculate… by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Interest rate calculator works', 'html' => <<<'TXT'
            <p>The Interest rate calculator applies one relationship to 10 numbers and reports Rate for one period (%), Nominal annual rate — the headline rate (%) and Effective annual rate — the one to compare (%).</p><p>The result panel carries Rate for one period (%), Nominal annual rate — the headline rate (%), Effective annual rate — the one to compare (%) and Total interest over the term, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 10 boxes and the page has everything it needs.</p><ul><li><strong>I would like to calculate…</strong> — a plain number, no unit</li><li><strong>Loan amount</strong> — in USD</li><li><strong>Current balance</strong> — in USD</li><li><strong>Initial deposit</strong> — in USD</li><li><strong>Term</strong> — in years / months</li><li><strong>Interest capitalization frequency</strong> — a plain number, no unit. You can set here how often the interest is calculated and added to your balance. For your savings or deposit account, it is the compounding frequency.</li><li><strong>Payment frequency</strong> — a plain number, no unit</li><li><strong>Periodic payment</strong> — in USD. The installment that you are paying in each agreed period.</li><li><strong>Prepaid fees</strong> — in USD. Paid in advance before the beginning of the loan term – no interest is calculated on this fee but it still affects the APR.</li><li><strong>Loaned fees</strong> — in USD. Rolled into the loan, i.e. paid with the periodic installments – usually, banks calculate interest on this fee.</li></ul><p>The answers come back as Rate for one period (%), Nominal annual rate — the headline rate (%), Effective annual rate — the one to compare (%), Total interest over the term, Total paid over the term (loan only), Number of payments or compounding periods. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Term offers 9 units and opens on years / months, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Term is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Rate for one period (%), Nominal annual rate — the headline rate (%) and Effective annual rate — the one to compare (%) are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>I would like to calculate… left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If I would like to calculate… is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Loan amount left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Loan amount is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert I would like to calculate… to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Interest rate form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>I would like to calculate…</strong> takes a plain number with no unit attached. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — I would like to calculate… is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Loan amount</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Loan amount is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Current balance</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Current balance is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Initial deposit</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Initial deposit is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Term</strong> is a years / months quantity: the page opens it in yrsmos and converts anything else you pick before the formula runs. Fill it from a measurement rather than a memory — Term is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Interest capitalization frequency</strong> takes a plain number with no unit attached. You can set here how often the interest is calculated and added to your balance. For your savings or deposit account, it is the compounding frequency. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Interest capitalization frequency is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Payment frequency</strong> takes a plain number with no unit attached. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Payment frequency is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Periodic payment</strong> takes a plain number with no unit attached. The installment that you are paying in each agreed period. Fill it from a measurement rather than a memory — Periodic payment is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Prepaid fees</strong> takes a plain number with no unit attached. Paid in advance before the beginning of the loan term – no interest is calculated on this fee but it still affects the APR. Fill it from a measurement rather than a memory — Prepaid fees is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Loaned fees</strong> takes a plain number with no unit attached. Rolled into the loan, i.e. paid with the periodic installments – usually, banks calculate interest on this fee. Fill it from a measurement rather than a memory — Loaned fees is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Rate for one period (%)</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Nominal annual rate — the headline rate (%)</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Effective annual rate — the one to compare (%)</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Total interest over the term</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Total paid over the term (loan only)</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Number of payments or compounding periods</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>The calculation on this page is a procedure rather than one formula: it takes Interest rate, works through it, and the panel lists I would like to calculate…, Loan amount, Current balance and Initial deposit.</p><p>The processing runs locally: the text you enter stays in the page, the script reads it, and the results are printed beside it. Nothing about your input is stored after you leave.</p><p>Because the script works on exactly what it is given, the usual failure is not arithmetic but input: trailing spaces, a header line from a FASTA file, an ambiguous base in the middle of a sequence. Check that the box holds the characters you meant and nothing else.</p><p>What comes back is Rate for one period (%), Nominal annual rate — the headline rate (%), Effective annual rate — the one to compare (%) and Total interest over the term — the same input described several ways, which is why the panel lists them side by side rather than picking one.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Rate for one period (%) follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are years / months and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes I would like to calculate…, Loan amount and Current balance are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are I would like to calculate…, Loan amount and Current balance and the number you are missing is Rate for one period (%) and Nominal annual rate — the headline rate (%).</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/future-salary">Future salary Calculator</a>, <a href="/finance/annuity-future-value">Future value of annuity</a> and <a href="/finance/future-value">Future value</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Interest rate calculator work out?', 'a' => 'Rate for one period (%), Nominal annual rate — the headline rate (%), Effective annual rate — the one to compare (%) and Total interest over the term.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            I would like to calculate…, Loan amount (USD), Current balance (USD), Initial deposit (USD), Term (years / months). Fill i would like to calculate…, loan amount and current balance and leave Rate for one period (%) empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Rate for one period (%) is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The page needs every box filled: Rate for one period (%) is fixed as the value it works out, so there is nothing to solve for when an input is missing.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Rate for one period (%) keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/future-salary', 'name' => 'Future salary Calculator'],
            ['path' => '/finance/annuity-future-value', 'name' => 'Future value of annuity'],
            ['path' => '/finance/future-value', 'name' => 'Future value'],
        ],
        'authors' => [],
    ],
];
