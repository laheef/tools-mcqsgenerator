<?php

/**
 * Continuous compound interest
 * /finance/continuous-compound
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Continuous compound interest',
    'meta' => ['title' => 'Continuous compound interest — Formula & Results', 'description' => 'Continuous compound interest takes initial balance and returns final balance. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Continuous compound interest Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'InitialDep',
                            'label' => 'Initial balance',
                            'type' => 'number',
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
                            'name' => 'interest_rate',
                            'label' => 'Interest rate',
                            'type' => 'number',
                            'help' => 'Yearly nominal interest rate.',
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
                            'label' => 'Term',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrsmos',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '240',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Additional deposits',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PeriodicDep',
                            'label' => 'How much?',
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
                            'name' => 'q',
                            'label' => 'How often?',
                            'type' => 'select',
                            'options' => [
                                'Yearly' => '1',
                                'Semi-annually' => '2',
                                'Quarterly' => '4',
                                'Monthly' => '12',
                                'Bi-weekly (26/Yr)' => '26',
                                'Weekly (52/Yr)' => '52',
                                'Daily (365/Yr)' => '365',
                                'Never' => '1000',
                            ],
                            'dataset' => 'Payment frequency',
                            'control' => 'DROPDOWN',
                            'help' => 'Here you can set the regularity of the additional deposits.',
                            'default' => 'Never',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'type',
                            'label' => 'When?',
                            'type' => 'select',
                            'options' => ['End of period' => '0', 'Beginning of period' => '1'],
                            'dataset' => 'Type of Deposit',
                            'control' => 'DROPDOWN',
                            'default' => 'Beginning of period',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'annual_growth_g',
                            'label' => 'Annual growth rate',
                            'type' => 'number',
                            'help' => 'The percentage growth rate of your additional periodic deposits over a year.',
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
                            'name' => 'periodic_growth_g_p',
                            'label' => 'Periodic growth rate',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            The percentage growth rate of your periodic contributions. Note that periodic and annual growth rates are linked together: if you set one, the other will be calculated according to the regularity of your additional deposit.
                            TXT,
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
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
                                ['when' => 'InitialDep <= 0 and PeriodicDep <= 0', 'text' => 'Either the initial balance or the additional deposit must be a positive value.'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'final_balance',
                            'label' => 'Final balance',
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
                            'name' => 'compoud_interest',
                            'label' => 'Compoud interest',
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
                            'name' => 'total_deposit',
                            'label' => 'Total deposit',
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
                            'name' => 'interest_deposit',
                            'label' => 'Interest on deposit',
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
                            'name' => 'interest_initial',
                            'label' => 'Interest on initial balance',
                            'type' => 'number',
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
            'title' => 'Hidden variables',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'TableFreq',
                            'label' => 'Table schedule',
                            'type' => 'select',
                            'options' => ['monthly' => '111', 'yearly' => '112'],
                            'dataset' => 'Table frequency',
                            'control' => 'DROPDOWN',
                            'default' => 'monthly',
                        ],
                        [
                            'name' => 'select1',
                            'label' => 'Select1',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PrincipalBal',
                            'label' => 'Principalbal',
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
                            'name' => 'DepositBal',
                            'label' => 'Depositbal',
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
                            'name' => 'compound_frequency',
                            'label' => 'Compounding frequency',
                            'type' => 'select',
                            'options' => [
                                'yearly (1/Yr)' => '21',
                                'semi-annually (2/Yr)' => '22',
                                'quarterly (4/Yr)' => '23',
                                'bi-monthly (6/Yr)' => '24',
                                'monthly (12/Yr)' => '25',
                                'bi-weekly (average)' => '26',
                                'bi-weekly (26/Yr)' => '27',
                                'weekly (average)' => '28',
                                'weekly (52/Yr)' => '29',
                                'daily (average)' => '30',
                                'daily (360/Yr)' => '31',
                                'daily (365/Yr)' => '32',
                                'continuous' => '33',
                            ],
                            'dataset' => 'Compound frequency',
                            'control' => 'DROPDOWN',
                            'help' => 'You can set here how often the interest is added to your principal balance.',
                            'default' => 'continuous',
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
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'subject',
                            'label' => 'I would like to know..',
                            'type' => 'select',
                            'options' => ['interest amount' => '1138535033', 'interest rate' => '3471940414'],
                            'dataset' => 'Subject1',
                            'control' => 'DROPDOWN',
                            'default' => 'interest amount',
                        ],
                        [
                            'name' => 'var1',
                            'label' => 'Var1',
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
                            'name' => 'subject2',
                            'label' => 'Known rate',
                            'type' => 'select',
                            'options' => ['Interest rate' => '1', 'APY' => '2'],
                            'dataset' => 'Subject2',
                            'control' => 'DROPDOWN',
                            'default' => 'Interest rate',
                        ],
                        [
                            'name' => 'var2',
                            'label' => 'Var2',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'FinalBal',
                            'label' => 'Desired savings',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '20000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'FinalBal_adj',
                            'label' => 'Desired savings',
                            'type' => 'number',
                            'help' => 'The future value (FV) of your savings. Note that it will be your desired inflation-adjusted balance in case you set the annual inflation rate.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '20000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'apy',
                            'label' => 'Apy',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1.95',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'infl',
                            'label' => 'Infl',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'annual_growth_g + 1 = (1 + periodic_growth_g_p) ^ q',
            'results' => ['q' => 'log(annual_growth_g + 1)/log(periodic_growth_g_p + 1)', 'periodic_growth_g_p' => 'pow(annual_growth_g + 1, 1/q) - 1', 'annual_growth_g' => 'pow(periodic_growth_g_p + 1, q) - 1'],
        ],
        [
            'title' => <<<'TXT'
            final_balance = get_results(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, term, interest_rate, apy, select1, m, q, var1, var2, annual_growth_g, type, periodic_growth_g_p, ct1, infl, 0)
            TXT,
            'results' => ['final_balance' => <<<'TXT'
            get_results(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, term, interest_rate, apy, select1, m, q, var1, var2, annual_growth_g, type, periodic_growth_g_p, ct1, infl, 0)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            compoud_interest = get_results(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, term, interest_rate, apy, select1, m, q, var1, var2, annual_growth_g, type, periodic_growth_g_p, ct1, infl, 1)
            TXT,
            'results' => ['compoud_interest' => <<<'TXT'
            get_results(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, term, interest_rate, apy, select1, m, q, var1, var2, annual_growth_g, type, periodic_growth_g_p, ct1, infl, 1)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            total_deposit = get_results(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, term, interest_rate, apy, select1, m, q, var1, var2, annual_growth_g, type, periodic_growth_g_p, ct1, infl, 2)
            TXT,
            'results' => ['total_deposit' => <<<'TXT'
            get_results(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, term, interest_rate, apy, select1, m, q, var1, var2, annual_growth_g, type, periodic_growth_g_p, ct1, infl, 2)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            interest_deposit = get_results(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, term, interest_rate, apy, select1, m, q, var1, var2, annual_growth_g, type, periodic_growth_g_p, ct1, infl, 3)
            TXT,
            'results' => ['interest_deposit' => <<<'TXT'
            get_results(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, term, interest_rate, apy, select1, m, q, var1, var2, annual_growth_g, type, periodic_growth_g_p, ct1, infl, 3)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            interest_initial = get_results(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, term, interest_rate, apy, select1, m, q, var1, var2, annual_growth_g, type, periodic_growth_g_p, ct1, infl, 4)
            TXT,
            'results' => ['interest_initial' => <<<'TXT'
            get_results(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, term, interest_rate, apy, select1, m, q, var1, var2, annual_growth_g, type, periodic_growth_g_p, ct1, infl, 4)
            TXT],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("get_results",function(PrincipalBal,DepositBal,InitialDep,PeriodicDep,FinalBal,FinalBal_adj,t,r,apy,select1,m,q,var1,var2,g,type,g_p,ct1,infl,index){var MAX_ITERATIONS=5000;var MIN_PRECISION=1e-7;var ex=mathjs.E;var eq_p_var5;var rYearPer=Math.pow(1+r/1,1/q)-1;var guess=apy;var apy2;var eq_p2;var Final_real;var days=0;var months=0;var MonthlyPrincInt=0;var MonthlyPrincIntBal=0;if(m===0){apy2=mathjs.pow(ex,r)-1}else{apy2=mathjs.pow(1+r/m,m)-1}var old_r;var new_r=guess;var iteration_r=0;do{old_r=new_r;if(ct1===0){var dividend_r=Math.pow(ex,new_r)-1-apy;var divisor_r=Math.pow(ex,new_r);new_r=new_r-dividend_r/divisor_r}else{var dividend_r2=Math.pow(1+new_r/m,m)-1-apy;var divisor_r2=Math.pow(1+new_r/m,m-1);new_r=new_r-dividend_r2/divisor_r2}++iteration_r}while(Math.abs(old_r-new_r)>MIN_PRECISION&&iteration_r<=MAX_ITERATIONS);if(var2===2){r=new_r}var eq_base;if(m===0){var continuous_r=mathjs.pow(ex,r)-1;m=1;eq_base=1+continuous_r/m}else{eq_base=1+r/m}var eq_power=m/q;var eq_p=Math.pow(eq_base,eq_power)-1;var eq=eq_p*q;var periods=q*t;if(var1===1){if(q===1000){PeriodicDep=0}PrincipalBal=InitialDep*Math.pow(1+eq_p,periods);if(g!==eq_p&&q!==1){DepositBal=PeriodicDep*(Math.pow(1+eq_p,periods)-Math.pow(1+g_p,periods))*(1+eq_p*type)/(eq_p-g_p)}else if(g!==eq_p&&q===1){DepositBal=PeriodicDep*(Math.pow(1+eq_p,periods)-Math.pow(1+g,periods))*(1+eq_p*type)/(eq_p-g)}else if(g===eq_p){DepositBal=PeriodicDep*periods*Math.pow(1+eq_p,periods-1)*(1+eq_p*type)}FinalBal=PrincipalBal+DepositBal;Final_real=FinalBal/mathjs.pow(1+infl,t)}else if(var1===2){if(q===1000){PeriodicDep=0}if(g!==eq_p&&q!==1){DepositBal=PeriodicDep*(Math.pow(1+eq_p,periods)-Math.pow(1+g_p,periods))*(1+eq_p*type)/(eq_p-g_p)}else if(g!==eq_p&&q===1){DepositBal=PeriodicDep*(Math.pow(1+eq_p,periods)-Math.pow(1+g,periods))*(1+eq_p*type)/(eq_p-g)}else if(g===eq_p){DepositBal=PeriodicDep*periods*Math.pow(1+eq_p,periods-1)*(1+eq_p*type)}FinalBal=FinalBal_adj*mathjs.pow(1+infl,t);PrincipalBal=FinalBal-DepositBal;InitialDep=PrincipalBal/Math.pow(1+eq_p,periods)}else if(var1===3){FinalBal=FinalBal_adj*mathjs.pow(1+infl,t);PrincipalBal=InitialDep*Math.pow(1+eq_p,periods);DepositBal=FinalBal-PrincipalBal;if(g!==eq_p&&q!==1){PeriodicDep=DepositBal/((Math.pow(1+eq_p,periods)-Math.pow(1+g_p,periods))*(1+eq_p*type)/(eq_p-g_p))}else if(g!==eq_p&&q===1){PeriodicDep=DepositBal/((Math.pow(1+eq_p,periods)-Math.pow(1+g,periods))*(1+eq_p*type)/(eq_p-g))}else if(g===eq_p){PeriodicDep=DepositBal/(periods*Math.pow(1+eq_p,periods-1)*(1+eq_p*type))}}else if(var1===4){g=0;infl=0;if(q===1000){PeriodicDep=0}if(InitialDep>0||PeriodicDep>0){FinalBal=FinalBal_adj*mathjs.pow(1+infl,t);DepositBal=FinalBal-PrincipalBal;periods=Math.log((eq_p*(FinalBal+PeriodicDep*type)+PeriodicDep)/(eq_p*InitialDep+PeriodicDep*(1+eq_p*type)))/Math.log(eq_p+1);t=periods/q}var _months=(t-Math.trunc(t))*12;var _days=(_months-Math.trunc(_months))*365.242/12}else if(var1===5){g=0;if(q===1000){PeriodicDep=0}FinalBal=FinalBal_adj*mathjs.pow(1+infl,t);var oldI;var newI=eq_p;var iteration=0;do{oldI=newI;var dividend=InitialDep*Math.pow(newI+1,periods)+PeriodicDep*(Math.pow(newI+1,periods)-1)*(1+newI*type)/newI-FinalBal;var divisor=InitialDep*periods*Math.pow(newI+1,periods-1)+((PeriodicDep*periods*Math.pow(newI+1,periods-1)*(1+newI*type)+PeriodicDep*(Math.pow(newI+1,periods)-1))*newI-PeriodicDep*(Math.pow(newI+1,periods)-1)*(1+newI*type))/Math.pow(newI,2);newI=newI-dividend/divisor;++iteration}while(Math.abs(oldI-newI)>MIN_PRECISION&&iteration<=MAX_ITERATIONS);eq_p=newI;eq_p_var5=newI;var oldR;var newR=eq_p;var iterationR=0;do{oldR=newR;if(ct1===0){var dividendR=Math.pow(ex,newR/q)-1-eq_p;var divisorR=Math.pow(ex,newR/q)/q;newR=newR-dividendR/divisorR}else{var dividendR2=Math.pow(1+newR/m,m/q)-1-eq_p;var divisorR2=Math.pow(1+newR/m,m/q-1)/q;newR=newR-dividendR2/divisorR2}++iterationR}while(Math.abs(oldR-newR)>MIN_PRECISION&&iterationR<=MAX_ITERATIONS);eq_p2=newR;eq_p=eq_p2;if(ct1===0){apy2=mathjs.pow(ex,eq_p2)-1}else{apy2=mathjs.pow(1+eq_p2/m,m)-1}}var k;if(q===1){k=12}else if(q===2){k=6}else if(q===4){k=3}else if(q===12){k=1}else if(q===52){k=12/52}else if(q===26){k=12/26}else if(q===365){k=12/365}var MonthlyDep=PeriodicDep/k;if(var1===5){r=eq_p}var eq_base_monthly;if(ct1===0){var continuous_r_monthly=mathjs.pow(ex,r)-1;m=1;eq_base_monthly=1+continuous_r_monthly/m}else{eq_base_monthly=1+r/m}var eq_power_monthly=m/12;var r_monthly=mathjs.pow(eq_base_monthly,eq_power_monthly)-1;var MonthlyDep2;var periodsMonth=t*12;var i;var InitialBal=InitialDep/(r_monthly+1);var InitialBalYear=InitialDep/(rYearPer+1);var InitialBal_lag=0;var DepBal;var DepBalYear;var DepBal_lag;var DepBal_lag2;var DepBalPrinc=0;var DepBalPrinc_lag=0;var DepBalPrinc_lag2=0;var YearlyDep;var YearlyDepBal;var YearlyDepInt;var YearlyPrincInt;var BalanceTotal=0;var BalanceTotalYear=0;var BalanceIntTotal=0;var dep_pow;var dep_pow_lag;var dep_pow_lag2;if(periods>24){select1=2}if(var1===5){eq_p=eq_p_var5}if(var1===4){periodsMonth=periodsMonth+1}else{periodsMonth=periodsMonth}for(i=0;i<=periodsMonth;i++){dep_pow=i/12*q;dep_pow_lag=(i-12)/12*q;dep_pow_lag2=(i-1)/12*q;if(i>12&&i%12!==0){dep_pow_lag=(i-i%12)/12*q}if(q===1000){MonthlyDep=0}if(i>0){MonthlyPrincInt=InitialBal*r_monthly}InitialBal=InitialDep*Math.pow(1+eq_p,dep_pow);InitialBalYear=InitialDep*Math.pow(1+rYearPer,dep_pow);MonthlyPrincIntBal=InitialBal-InitialDep;InitialBal_lag=InitialDep*Math.pow(1+eq_p,dep_pow_lag);if(i<12){InitialBal_lag=InitialDep}if((var1>3||g===0)&&i>1){DepBalPrinc_lag2+=MonthlyDep}if((var1>3||g===0)&&i>0){DepBalPrinc+=MonthlyDep}if((var1>3||g===0)&&i>12){DepBalPrinc_lag+=MonthlyDep}if(var1>3&&g===0){DepBal=PeriodicDep*(Math.pow(1+eq_p,dep_pow)-1)*(1+eq_p*type)/eq_p;DepBal_lag=PeriodicDep*(Math.pow(1+eq_p,dep_pow_lag)-1)*(1+eq_p*type)/eq_p;DepBal_lag2=PeriodicDep*(Math.pow(1+eq_p,dep_pow_lag2)-1)*(1+eq_p*type)/eq_p}if(g!==eq_p&&q!==1&&var1<=3){DepBal=PeriodicDep*(Math.pow(1+eq_p,dep_pow)-Math.pow(1+g_p,dep_pow))*(1+eq_p*type)/(eq_p-g_p);DepBalYear=PeriodicDep*(Math.pow(1+rYearPer,dep_pow)-Math.pow(1+g_p,dep_pow))*(1+rYearPer*type)/(rYearPer-g_p);DepBal_lag=PeriodicDep*(Math.pow(1+eq_p,dep_pow_lag)-Math.pow(1+g_p,dep_pow_lag))*(1+eq_p*type)/(eq_p-g_p);DepBal_lag2=PeriodicDep*(Math.pow(1+eq_p,dep_pow_lag2)-Math.pow(1+g_p,dep_pow_lag2))*(1+eq_p*type)/(eq_p-g_p)}if(g!==eq_p&&q!==1&&var1<=3&&g!==0){DepBalPrinc=PeriodicDep*(Math.pow(1+0,dep_pow)-Math.pow(1+g_p,dep_pow))*(1+0*type)/(0-g_p);DepBalPrinc_lag=PeriodicDep*(Math.pow(1+0,dep_pow_lag)-Math.pow(1+g_p,dep_pow_lag))*(1+0*type)/(0-g_p);DepBalPrinc_lag2=PeriodicDep*(Math.pow(1+0,dep_pow_lag2)-Math.pow(1+g_p,dep_pow_lag2))*(1+0*type)/(0-g_p)}else if(g!==eq_p&&q===1&&var1<=3){DepBal=PeriodicDep*(Math.pow(1+eq_p,dep_pow)-Math.pow(1+g,dep_pow))*(1+eq_p*type)/(eq_p-g);DepBalYear=PeriodicDep*(Math.pow(1+rYearPer,dep_pow)-Math.pow(1+g,dep_pow))*(1+rYearPer*type)/(rYearPer-g);DepBal_lag=PeriodicDep*(Math.pow(1+eq_p,dep_pow_lag)-Math.pow(1+g_p,dep_pow_lag))*(1+eq_p*type)/(eq_p-g_p);DepBal_lag2=PeriodicDep*(Math.pow(1+eq_p,dep_pow_lag2)-Math.pow(1+g_p,dep_pow_lag2))*(1+eq_p*type)/(eq_p-g_p)}else if(g!==eq_p&&q===1&&var1<=3&&g!==0){DepBalPrinc=PeriodicDep*(Math.pow(1+0,dep_pow)-Math.pow(1+g,dep_pow))*(1+0*type)/(0-g);DepBalPrinc_lag=PeriodicDep*(Math.pow(1+0,dep_pow_lag)-Math.pow(1+g_p,dep_pow_lag))*(1+0*type)/(0-g_p);DepBalPrinc_lag2=PeriodicDep*(Math.pow(1+0,dep_pow_lag2)-Math.pow(1+g_p,dep_pow_lag2))*(1+0*type)/(0-g_p)}else if(g===eq_p&&var1<4){DepBal=PeriodicDep*dep_pow*Math.pow(1+eq_p,dep_pow-1)*(1+eq_p*type);DepBalYear=PeriodicDep*dep_pow*Math.pow(1+rYearPer,dep_pow-1)*(1+rYearPer*type);DepBal_lag=PeriodicDep*dep_pow_lag*Math.pow(1+eq_p,dep_pow_lag-1)*(1+eq_p*type);DepBal_lag2=PeriodicDep*dep_pow_lag2*Math.pow(1+eq_p,dep_pow_lag2-1)*(1+eq_p*type)}else if(g===eq_p&&var1<4&&g!==0){DepBalPrinc=PeriodicDep*(Math.pow(1+0,dep_pow)-Math.pow(1+g_p,dep_pow))*(1+0*type)/(0-g_p);DepBalPrinc_lag=PeriodicDep*(Math.pow(1+0,dep_pow_lag)-Math.pow(1+g_p,dep_pow_lag))*(1+0*type)/(0-g_p);DepBalPrinc_lag2=PeriodicDep*(Math.pow(1+0,dep_pow_lag2)-Math.pow(1+g_p,dep_pow_lag2))*(1+0*type)/(0-g_p)}YearlyPrincInt=InitialBal-InitialBal_lag;YearlyDep=DepBalPrinc-DepBalPrinc_lag;MonthlyDep2=DepBalPrinc-DepBalPrinc_lag2;YearlyDepBal=DepBal-DepBal_lag;if(i>12&&i%12!==0&&g===0){YearlyDep=YearlyDep*(i%12)/12}YearlyDepInt=YearlyDepBal-YearlyDep;BalanceTotal=InitialBal+DepBal;BalanceTotalYear=InitialBalYear+DepBalYear;BalanceIntTotal=BalanceTotal-DepBalPrinc-InitialDep;if(days!==0&&DepBalPrinc+InitialDep>=FinalBal&&var1===4){YearlyDep=MonthlyDep*months;DepBal=FinalBal-InitialDep;YearlyDepBal=DepBal-DepBal_lag;YearlyDepInt=YearlyDepBal-YearlyDep;MonthlyDep2=MonthlyDep*(days/(365/12)/k);DepBalPrinc=DepBalPrinc-MonthlyDep+MonthlyDep2;BalanceTotal=FinalBal;BalanceIntTotal=FinalBal-(DepBalPrinc+InitialDep)}}var intDeposit=DepBal-DepBalPrinc;var intInitial=InitialBal-InitialDep;var results=[FinalBal,BalanceIntTotal,DepBalPrinc,intDeposit,intInitial];return results[index]});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Continuous compound interest works out Final balance and Compoud interest from Initial balance, Interest rate and Term. The arithmetic is the whole method: final balance is worked out from initial balance by one formula, applied once. Final balance comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Continuous compound interest calculator works', 'html' => <<<'TXT'
            <p>Continuous compound interest answers one question from 8 numbers, and the answer is Final balance, Compoud interest and Total deposit.</p><p>Written with the labels from the form, How often? = ln(Annual growth rate + 1) ÷ ln(Periodic growth rate + 1).</p><p>The answers are Final balance, Compoud interest, Total deposit and Interest on deposit; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 8 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Initial balance</strong> — in USD</li><li><strong>Interest rate</strong> — in percent. Yearly nominal interest rate.</li><li><strong>Term</strong> — in years / months</li><li><strong>How much?</strong> — in USD</li><li><strong>How often?</strong> — a plain number, no unit. Here you can set the regularity of the additional deposits.</li><li><strong>When?</strong> — a plain number, no unit</li><li><strong>Annual growth rate</strong> — in percent. The percentage growth rate of your additional periodic deposits over a year.</li><li><strong>Periodic growth rate</strong> — in percent. The percentage growth rate of your periodic contributions. Note that periodic and annual growth rates are linked together: if you set one, the other will be calculated according to the regularity of your additional deposit.</li></ul><p>The result boxes are Final balance in USD, Compoud interest in USD, Total deposit in USD, Interest on deposit in USD, Interest on initial balance in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Initial balance = 1000 USD, Interest rate = 4 perc, Term = 240 yrsmos, How much? = 6 USD and When? = 1 gives <strong>How often?</strong> = 1000, <strong>Table schedule</strong> = 111, <strong>Principalbal</strong> = 0, <strong>Depositbal</strong> = 0, <strong>Compounding frequency</strong> = 33, <strong>I would like to know…</strong> = 1.139e+9, <strong>Known rate</strong> = 1, <strong>Desired savings</strong> = 20000, <strong>Desired savings</strong> = 20000, <strong>Apy</strong> = 0.0195 and <strong>Infl</strong> = 0.</p><ul><li><strong>How often?</strong> = 1000</li><li><strong>Table schedule</strong> = 111</li><li><strong>Principalbal</strong> = 0</li><li><strong>Depositbal</strong> = 0</li><li><strong>Compounding frequency</strong> = 33</li><li><strong>I would like to know…</strong> = 1.139e+9</li><li><strong>Known rate</strong> = 1</li><li><strong>Desired savings</strong> = 20000</li><li><strong>Desired savings</strong> = 20000</li><li><strong>Apy</strong> = 0.0195</li><li><strong>Infl</strong> = 0</li></ul><p>The line behind those figures is <strong>How often?</strong> = <code>ln(Annual growth rate + 1) ÷ ln(Periodic growth rate + 1)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>How often?</strong> = 1000, <strong>Table schedule</strong> = 111, <strong>Principalbal</strong> = 0, <strong>Depositbal</strong> = 0, <strong>Compounding frequency</strong> = 33, <strong>I would like to know..</strong> = 1.139e+9, <strong>Known rate</strong> = 1, <strong>Desired savings</strong> = 20000, <strong>Desired savings</strong> = 20000, <strong>Apy</strong> = 0.0195 and <strong>Infl</strong> = 0. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Interest rate lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>How often?</strong> = <code>ln(Annual growth rate + 1) ÷ ln(Periodic growth rate + 1)</code></li><li><strong>Periodic growth rate</strong> = <code>(Annual growth rate + 1)^(1 ÷ How often?) − 1</code></li><li><strong>Annual growth rate</strong> = <code>(Periodic growth rate + 1)^(How often?) − 1</code></li><li><strong>Final balance</strong> = <code>get_results(Principalbal, Depositbal, Initial balance, How much?, Desired savings, Desired savings, Term, Interest rate, Apy, Select1, M, How often?, Var1, Var2, Annual growth rate, When?, Periodic growth rate, Ct1, Infl, 0)</code></li><li><strong>Compoud interest</strong> = <code>get_results(Principalbal, Depositbal, Initial balance, How much?, Desired savings, Desired savings, Term, Interest rate, Apy, Select1, M, How often?, Var1, Var2, Annual growth rate, When?, Periodic growth rate, Ct1, Infl, 1)</code></li><li><strong>Total deposit</strong> = <code>get_results(Principalbal, Depositbal, Initial balance, How much?, Desired savings, Desired savings, Term, Interest rate, Apy, Select1, M, How often?, Var1, Var2, Annual growth rate, When?, Periodic growth rate, Ct1, Infl, 2)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>How often?</strong> = <code>ln(Annual growth rate + 1) ÷ ln(Periodic growth rate + 1)</code> — the form to use when Annual growth rate and Periodic growth rate are the values you have.</li><li><strong>Periodic growth rate</strong> = <code>(Annual growth rate + 1)^(1 ÷ How often?) − 1</code> — the form to use when Annual growth rate and How often? are the values you have.</li><li><strong>Annual growth rate</strong> = <code>(Periodic growth rate + 1)^(How often?) − 1</code> — the form to use when Periodic growth rate and How often? are the values you have.</li><li><strong>Final balance</strong> = <code>get_results(Principalbal, Depositbal, Initial balance, How much?, Desired savings, Desired savings, Term, Interest rate, Apy, Select1, M, How often?, Var1, Var2, Annual growth rate, When?, Periodic growth rate, Ct1, Infl, 0)</code> — the form to use when Principalbal, Depositbal, Initial balance and How much? are the values you have.</li><li><strong>Compoud interest</strong> = <code>get_results(Principalbal, Depositbal, Initial balance, How much?, Desired savings, Desired savings, Term, Interest rate, Apy, Select1, M, How often?, Var1, Var2, Annual growth rate, When?, Periodic growth rate, Ct1, Infl, 1)</code> — the form to use when Principalbal, Depositbal, Initial balance and How much? are the values you have.</li><li><strong>Total deposit</strong> = <code>get_results(Principalbal, Depositbal, Initial balance, How much?, Desired savings, Desired savings, Term, Interest rate, Apy, Select1, M, How often?, Var1, Var2, Annual growth rate, When?, Periodic growth rate, Ct1, Infl, 2)</code> — the form to use when Principalbal, Depositbal, Initial balance and How much? are the values you have.</li><li><strong>Interest on deposit</strong> = <code>get_results(Principalbal, Depositbal, Initial balance, How much?, Desired savings, Desired savings, Term, Interest rate, Apy, Select1, M, How often?, Var1, Var2, Annual growth rate, When?, Periodic growth rate, Ct1, Infl, 3)</code> — the form to use when Principalbal, Depositbal, Initial balance and How much? are the values you have.</li><li><strong>Interest on initial balance</strong> = <code>get_results(Principalbal, Depositbal, Initial balance, How much?, Desired savings, Desired savings, Term, Interest rate, Apy, Select1, M, How often?, Var1, Var2, Annual growth rate, When?, Periodic growth rate, Ct1, Infl, 4)</code> — the form to use when Principalbal, Depositbal, Initial balance and How much? are the values you have.</li></ul><p>Any one of How often?, Periodic growth rate and Annual growth rate can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Initial balance, from 1000 to 2000 — and the answers go from <strong>How often?</strong> 1000, <strong>Table schedule</strong> 111, <strong>Principalbal</strong> 0, <strong>Depositbal</strong> 0, <strong>Compounding frequency</strong> 33, <strong>I would like to know..</strong> 1.139e+9, <strong>Known rate</strong> 1, <strong>Desired savings</strong> 20000, <strong>Desired savings</strong> 20000, <strong>Apy</strong> 0.0195 and <strong>Infl</strong> 0 to <strong>How often?</strong> 1000, <strong>Table schedule</strong> 111, <strong>Principalbal</strong> 0, <strong>Depositbal</strong> 0, <strong>Compounding frequency</strong> 33, <strong>I would like to know..</strong> 1.139e+9, <strong>Known rate</strong> 1, <strong>Desired savings</strong> 20000, <strong>Desired savings</strong> 20000, <strong>Apy</strong> 0.0195 and <strong>Infl</strong> 0.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Interest rate, Term and Annual growth rate carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Final balance, Compoud interest and Total deposit are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Initial balance left as a guess.</strong> Anything typed into Initial balance is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Interest rate left as a guess.</strong> Anything typed into Interest rate is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Initial balance is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Continuous compound interest form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Initial balance</strong> takes a plain number with no unit attached. It feeds Final balance, Compoud interest and Total deposit. Fill it from a measurement rather than a memory — Initial balance is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Interest rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Yearly nominal interest rate. It feeds Final balance, Compoud interest and Total deposit. Fill it from a measurement rather than a memory — Interest rate is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Term</strong> is a years / months quantity: the page opens it in yrsmos and converts anything else you pick before the formula runs. It feeds Final balance, Compoud interest and Total deposit. Fill it from a measurement rather than a memory — Term is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>How much?</strong> takes a plain number with no unit attached. It feeds Final balance, Compoud interest and Total deposit. Fill it from a measurement rather than a memory — How much? is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>How often?</strong> takes a plain number with no unit attached. Here you can set the regularity of the additional deposits. It feeds Periodic growth rate, Annual growth rate and Final balance. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — How often? is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>When?</strong> takes a plain number with no unit attached. It feeds Final balance, Compoud interest and Total deposit. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — When? is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Annual growth rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The percentage growth rate of your additional periodic deposits over a year. It feeds How often?, Periodic growth rate and Final balance. Fill it from a measurement rather than a memory — Annual growth rate is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Periodic growth rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The percentage growth rate of your periodic contributions. Note that periodic and annual growth rates are linked together: if you set one, the other will be calculated according to the regularity of your additional deposit. It feeds How often?, Annual growth rate and Final balance. Fill it from a measurement rather than a memory — Periodic growth rate is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Final balance is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The chips cover percent and years / months. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Initial balance, Interest rate and Term is what you already know and Final balance and Compoud interest is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/nps">Net promoter score Calculator</a>, <a href="/finance/net-to-gross">Net to gross Calculator</a> and <a href="/finance/net-worth">Net worth Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Continuous compound interest calculator work out?', 'a' => <<<'TXT'
            Final balance, Compoud interest, Total deposit and Interest on deposit, from Annual growth rate and Periodic growth rate. The relationship is How often? = ln(Annual growth rate + 1) ÷ ln(Periodic growth rate + 1).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Initial balance (USD), Interest rate (percent), Term (years / months), How much? (USD), How often?. Enter initial balance, interest rate and term; Final balance is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of How often?, Periodic growth rate, Annual growth rate and Final balance blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            How often? = 1000, Table schedule = 111, Principalbal = 0, Depositbal = 0, Compounding frequency = 33, I would like to know… = 1.139e+9, Known rate = 1, Desired savings = 20000, Desired savings = 20000, Apy = 0.0195 and Infl = 0. Those are the defaults written into the form — move Initial balance and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Final balance is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Initial balance blank and the page solves for it, reporting Final balance instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Final balance keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/nps', 'name' => 'Net promoter score Calculator'],
            ['path' => '/finance/net-to-gross', 'name' => 'Net to gross Calculator'],
            ['path' => '/finance/net-worth', 'name' => 'Net worth Calculator'],
        ],
        'authors' => [],
    ],
];
