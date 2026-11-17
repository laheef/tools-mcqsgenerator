<?php

/**
 * Compound growth
 * /finance/compound-growth
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Compound growth',
    'meta' => ['title' => 'Compound growth Calculator — Formula, Units & Example', 'description' => 'Compound growth reports final balance, final balance in today\'s money, total paid in (initial + deposits) and interest earned. Every figure is computed.', 'h1' => 'Compound growth Calculator', 'updated' => '2026-09-27'],
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
                            'label' => 'Initial deposit',
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
                            'name' => 't',
                            'label' => 'Term',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrsmos',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '240',
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
                                'Yearly (1/Yr)' => '21',
                                'Semi-annually (2/Yr)' => '22',
                                'Quarterly (4/Yr)' => '23',
                                'Bi-monthly (6/Yr)' => '24',
                                'Monthly (12/Yr)' => '25',
                                'Bi-weekly (average)' => '26',
                                'Bi-weekly (26/Yr)' => '27',
                                'Weekly (average)' => '28',
                                'Weekly (52/Yr)' => '29',
                                'Daily (average)' => '30',
                                'Daily (360/Yr)' => '31',
                                'Daily (365/Yr)' => '32',
                                'Continuous' => '33',
                            ],
                            'dataset' => 'compound_frequency',
                            'control' => 'DROPDOWN',
                            'help' => 'Here you can set how often the interest is added to your principal balance.',
                            'default' => 'Monthly (12/Yr)',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Additional contribution',
            'note' => '',
            'blocks' => [
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
                            'default' => 'Monthly',
                        ],
                    ],
                ],
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
                            'default' => '50',
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
                            'options' => ['End of period' => '0.000000000000000', 'Beginning of period' => '1.000000000000000'],
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
                            'name' => 'g',
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
                            'name' => 'g_p',
                            'label' => 'Periodic growth rate',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            The percentage growth rate of your periodic contributions. Note, that periodic and annual growth rates are linked together; if you set one, the other will be calculated according to the regularity of your additional deposit.
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
            ],
        ],
        [
            'title' => 'Hidden variables',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'chart',
                            'label' => 'Chart',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'TableFreq',
                            'label' => 'Table schedule',
                            'type' => 'select',
                            'options' => ['Monthly' => '111', 'Yearly' => '112'],
                            'dataset' => 'TableFreq',
                            'control' => 'DROPDOWN',
                            'default' => 'Monthly',
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
                            'options' => [
                                'Line chart' => '11',
                                'Bar graph' => '12',
                                'Pie chart' => '11',
                                'Table' => '13',
                                'Charts and table' => '14',
                            ],
                            'dataset' => 'chart_selection',
                            'control' => 'DROPDOWN',
                            'default' => 'Bar graph',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'var1',
                            'label' => 'Var1',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
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
                            'name' => 'ct3',
                            'label' => 'Ct3',
                            'type' => 'result',
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
                            'name' => 'first_day',
                            'label' => 'First day',
                            'type' => 'number',
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
                            'name' => 'subject2',
                            'label' => 'Known rate',
                            'type' => 'select',
                            'options' => ['Interest rate' => '1', 'APY' => '2'],
                            'dataset' => 'subject2',
                            'control' => 'DROPDOWN',
                            'default' => 'Interest rate',
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
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'subject',
                            'label' => 'I would like to know..',
                            'type' => 'select',
                            'options' => ['Interest amount' => '1', 'Interest rate' => '5'],
                            'dataset' => 'subject',
                            'control' => 'DROPDOWN',
                            'default' => 'Interest amount',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'message_disp',
                            'label' => 'Message numb',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'FinalBal_r',
                            'label' => 'Final bal r',
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
                            'name' => 'InitialDep_r',
                            'label' => 'Initial dep r',
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
                            'name' => 'PeriodicDep_r',
                            'label' => 'Periodic dep rc',
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
                            'name' => 'BalanceIntTotal',
                            'label' => 'Balance int total',
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
            'title' => 'Results',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'final_balance',
                            'label' => 'Final balance',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'real_balance',
                            'label' => 'Final balance in today\'s money',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_deposited',
                            'label' => 'Total paid in (initial + deposits)',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'interest_earned',
                            'label' => 'Interest earned',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'periods',
                            'label' => 'Number of compounding periods',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'effective_rate',
                            'label' => 'Effective annual rate, %',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['standard', '4'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'g + 1 = (1 + g_p) ^ q',
            'results' => ['q' => 'log(g + 1)/log(g_p + 1)', 'g_p' => 'pow(g + 1, 1/q) - 1', 'g' => 'pow(g_p + 1, q) - 1'],
        ],
        [
            'title' => <<<'TXT'
            chart = get_values(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, t, r, apy, select1, m, q,  var1, var2, g, type, g_p, ct1, ct2, ct3, infl, 0)
            TXT,
            'results' => ['chart' => <<<'TXT'
            get_values(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, t, r, apy, select1, m, q, var1, var2, g, type, g_p, ct1, ct2, ct3, infl, 0)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            PeriodicDep_r = get_values(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, t, r, apy, select1, m, q,  var1, var2, g, type, g_p, ct1, ct2, ct3, infl, 1)
            TXT,
            'results' => ['PeriodicDep_r' => <<<'TXT'
            get_values(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, t, r, apy, select1, m, q, var1, var2, g, type, g_p, ct1, ct2, ct3, infl, 1)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            message_disp = get_values(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, t, r, apy, select1, m, q,  var1, var2, g, type, g_p, ct1, ct2, ct3, infl, 2)
            TXT,
            'results' => ['message_disp' => <<<'TXT'
            get_values(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, t, r, apy, select1, m, q, var1, var2, g, type, g_p, ct1, ct2, ct3, infl, 2)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            FinalBal_r = get_values(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, t, r, apy, select1, m, q,  var1, var2, g, type, g_p, ct1, ct2, ct3, infl, 3)
            TXT,
            'results' => ['FinalBal_r' => <<<'TXT'
            get_values(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, t, r, apy, select1, m, q, var1, var2, g, type, g_p, ct1, ct2, ct3, infl, 3)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            InitialDep_r = get_values(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, t, r, apy, select1, m, q,  var1, var2, g, type, g_p, ct1, ct2, ct3, infl, 4)
            TXT,
            'results' => ['InitialDep_r' => <<<'TXT'
            get_values(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, t, r, apy, select1, m, q, var1, var2, g, type, g_p, ct1, ct2, ct3, infl, 4)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            BalanceIntTotal = get_values(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, t, r, apy, select1, m, q,  var1, var2, g, type, g_p, ct1, ct2, ct3, infl, 8)
            TXT,
            'results' => ['BalanceIntTotal' => <<<'TXT'
            get_values(PrincipalBal, DepositBal, InitialDep, PeriodicDep, FinalBal, FinalBal_adj, t, r, apy, select1, m, q, var1, var2, g, type, g_p, ct1, ct2, ct3, infl, 8)
            TXT],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";var MIN_PRECISION=1e-7;var MAX_ITERATIONS=5000;omni.onResult(["InitialDep","r","t"],function(ctx,_ref){var PrincipalBal=_ref.PrincipalBal,DepositBal=_ref.DepositBal,InitialDep=_ref.InitialDep,PeriodicDep=_ref.PeriodicDep,FinalBal=_ref.FinalBal,FinalBal_adj=_ref.FinalBal_adj,t=_ref.t,r=_ref.r,apy=_ref.apy,m=_ref.m,q=_ref.q,var1=_ref.var1,var2=_ref.var2,g=_ref.g,type=_ref.type,g_p=_ref.g_p,ct1=_ref.ct1,infl=_ref.infl;if(!t){return}var eq_p_var5;var rYearPer=Math.pow(1+r/1,1/q)-1;var chart;var apy2;var ex=mathjs.e;var guess=apy;var Final_real;if(m===0){apy2=mathjs.pow(ex,r)-1}else{apy2=mathjs.pow(1+r/m,m)-1}var eq_p2;var old_r;var new_r=guess;var iteration_r=0;do{old_r=new_r;if(ct1===0){var dividend_r=Math.pow(ex,new_r)-1-apy;var divisor_r=Math.pow(ex,new_r);new_r=new_r-dividend_r/divisor_r}else{var dividend_r2=Math.pow(1+new_r/m,m)-1-apy;var divisor_r2=Math.pow(1+new_r/m,m-1);new_r=new_r-dividend_r2/divisor_r2}++iteration_r}while(Math.abs(old_r-new_r)>MIN_PRECISION&&iteration_r<=MAX_ITERATIONS);if(var2===2){r=new_r}var eq_base;if(m===0){var continuous_r=mathjs.pow(ex,r)-1;m=1;eq_base=1+continuous_r/m}else{eq_base=1+r/m}var eq_power=m/q;var eq_p=Math.pow(eq_base,eq_power)-1;var eq=eq_p*q;function numberWithCommas(x){return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g,",")}var periods=q*t;if(var1===1){if(q===1000){PeriodicDep=0}PrincipalBal=InitialDep*Math.pow(1+eq_p,periods);if(g!==eq_p&&q!==1){DepositBal=PeriodicDep*(Math.pow(1+eq_p,periods)-Math.pow(1+g_p,periods))*(1+eq_p*type)/(eq_p-g_p)}else if(g!==eq_p&&q===1){DepositBal=PeriodicDep*(Math.pow(1+eq_p,periods)-Math.pow(1+g,periods))*(1+eq_p*type)/(eq_p-g)}else if(g===eq_p){DepositBal=PeriodicDep*periods*Math.pow(1+eq_p,periods-1)*(1+eq_p*type)}FinalBal=PrincipalBal+DepositBal;Final_real=FinalBal/mathjs.pow(1+infl,t);if((InitialDep>0||PeriodicDep>0)&&infl===0){chart=1}else if((InitialDep>0||PeriodicDep>0)&&infl>0){chart=1}else{chart=0}}else if(var1===2){if(q===1000){PeriodicDep=0}if(g!==eq_p&&q!==1){DepositBal=PeriodicDep*(Math.pow(1+eq_p,periods)-Math.pow(1+g_p,periods))*(1+eq_p*type)/(eq_p-g_p)}else if(g!==eq_p&&q===1){DepositBal=PeriodicDep*(Math.pow(1+eq_p,periods)-Math.pow(1+g,periods))*(1+eq_p*type)/(eq_p-g)}else if(g===eq_p){DepositBal=PeriodicDep*periods*Math.pow(1+eq_p,periods-1)*(1+eq_p*type)}FinalBal=FinalBal_adj*mathjs.pow(1+infl,t);PrincipalBal=FinalBal-DepositBal;InitialDep=PrincipalBal/Math.pow(1+eq_p,periods);if(FinalBal===0){chart=0}else if(InitialDep>=0&&infl===0){chart=1}else if(InitialDep>=0&&infl>0){chart=1}else{chart=0}}else if(var1===3){FinalBal=FinalBal_adj*mathjs.pow(1+infl,t);PrincipalBal=InitialDep*Math.pow(1+eq_p,periods);DepositBal=FinalBal-PrincipalBal;if(g!==eq_p&&q!==1){PeriodicDep=DepositBal/((Math.pow(1+eq_p,periods)-Math.pow(1+g_p,periods))*(1+eq_p*type)/(eq_p-g_p))}else if(g!==eq_p&&q===1){PeriodicDep=DepositBal/((Math.pow(1+eq_p,periods)-Math.pow(1+g,periods))*(1+eq_p*type)/(eq_p-g))}else if(g===eq_p){PeriodicDep=DepositBal/(periods*Math.pow(1+eq_p,periods-1)*(1+eq_p*type))}if(PeriodicDep>0&&infl===0&&q!==1000){chart=1}else if(PeriodicDep>0&&infl>0&&q!==1000){chart=1}else if(q===1000){chart=0}else{chart=0}}else if(var1===4){g=0;infl=0;var months;var days;if(q===1000){PeriodicDep=0}if(InitialDep>0||PeriodicDep>0){FinalBal=FinalBal_adj*mathjs.pow(1+infl,t);DepositBal=FinalBal-PrincipalBal;periods=Math.log((eq_p*(FinalBal+PeriodicDep*type)+PeriodicDep)/(eq_p*InitialDep+PeriodicDep*(1+eq_p*type)))/Math.log(eq_p+1);t=periods/q}months=(t-Math.trunc(t))*12;days=(months-Math.trunc(months))*365.242/12;if(InitialDep+PeriodicDep<=0){chart=0}else if(InitialDep>=FinalBal){chart=0}else if(Math.trunc(t)===0&&Math.trunc(months)!==0&&Math.trunc(days)!==0){chart=1}else if(Math.trunc(months)===0&&Math.trunc(days)!==0&&Math.trunc(t)!==0){chart=1}else if(Math.trunc(days)===0&&Math.trunc(months)!==0&&Math.trunc(t)!==0){chart=1}else if(Math.trunc(t)===0&&Math.trunc(months)===0&&Math.trunc(days)!==0){chart=1}else if(Math.trunc(t)===0&&Math.trunc(days)===0&&Math.trunc(months)!==0){chart=1}else if(Math.trunc(days)===0&&Math.trunc(months)===0&&Math.trunc(t)!==0){chart=1}else if(Math.trunc(days)!==0&&Math.trunc(months)!==0&&Math.trunc(t)!==0){chart=1}else if(Math.trunc(days)===0&&Math.trunc(months)===0&&Math.trunc(t)===0){chart=0}}else if(var1===5){g=0;if(q===1000){PeriodicDep=0}FinalBal=FinalBal_adj*mathjs.pow(1+infl,t);var oldI;var newI=eq_p;var iteration=0;do{oldI=newI;var dividend=InitialDep*Math.pow(newI+1,periods)+PeriodicDep*(Math.pow(newI+1,periods)-1)*(1+newI*type)/newI-FinalBal;var divisor=InitialDep*periods*Math.pow(newI+1,periods-1)+((PeriodicDep*periods*Math.pow(newI+1,periods-1)*(1+newI*type)+PeriodicDep*(Math.pow(newI+1,periods)-1))*newI-PeriodicDep*(Math.pow(newI+1,periods)-1)*(1+newI*type))/Math.pow(newI,2);newI=newI-dividend/divisor;++iteration}while(Math.abs(oldI-newI)>MIN_PRECISION&&iteration<=MAX_ITERATIONS);eq_p=newI;eq_p_var5=newI;var oldR;var newR=eq_p;var iterationR=0;do{oldR=newR;if(ct1===0){var dividendR=Math.pow(ex,newR/q)-1-eq_p;var divisorR=Math.pow(ex,newR/q)/q;newR=newR-dividendR/divisorR}else{var dividendR2=Math.pow(1+newR/m,m/q)-1-eq_p;var divisorR2=Math.pow(1+newR/m,m/q-1)/q;newR=newR-dividendR2/divisorR2}++iterationR}while(Math.abs(oldR-newR)>MIN_PRECISION&&iterationR<=MAX_ITERATIONS);eq_p2=newR;eq_p=eq_p2;if(ct1===0){apy2=mathjs.pow(ex,eq_p2)-1}else{apy2=mathjs.pow(1+eq_p2/m,m)-1}if(InitialDep+PeriodicDep<=0){chart=0}else if(eq_p2<=0||isNaN(eq_p2)){chart=0}else{chart=1}}var k;if(q===1){k=12}else if(q===2){k=6}else if(q===4){k=3}else if(q===12){k=1}else if(q===52){k=12/52}else if(q===26){k=12/26}else if(q===365){k=12/365}var MonthlyDep=PeriodicDep/k;if(var1===5){r=eq_p}var eq_base_monthly;if(ct1===0){var continuous_r_monthly=mathjs.pow(ex,r)-1;m=1;eq_base_monthly=1+continuous_r_monthly/m}else{eq_base_monthly=1+r/m}var eq_power_monthly=m/12;var r_monthly=mathjs.pow(eq_base_monthly,eq_power_monthly)-1;var MonthlyDep2;var periodsMonth=t*12;var out=[];var outChart=[];var outTable1=[];var outTable2=[];var outTable1monthly=[];var outTable2monthly=[];var i;var rowLabelTableMonth;var rowLabelTableYear;var rowLabelChartMonth;var rowLabelChartQuarter;var rowLabelChartYear;var MonthlyPrincInt=0;var MonthlyDepInt=0;var MonthlyPrincIntBal=0;var MonthlyPrincIntBal_lag=0;var InitialBal=InitialDep/(r_monthly+1);var InitialBalYear=InitialDep/(rYearPer+1);var InitialBal_lag=0;var DepBal;var DepBalYear;var DepBal_lag;var DepBal_lag2;var DepBalPrinc=0;var DepBalPrinc_lag=0;var DepBalPrinc_lag2=0;var YearlyDep;var YearlyDepBal;var YearlyDepInt;var YearlyPrincInt;var YearlyTotalInt;var BalanceTotal=0;var BalanceTotalYear=0;var BalanceIntTotal=0;var BalanceIntTotalYear=0;var BalanceIntTotal_lag=0;var DepTotal=0;var dep_pow;var dep_pow_lag;var dep_pow_lag2;var pointFractionTable=0;var pointFractionChart=12;var pointFractionChart2=12;if(var1===5){eq_p=eq_p_var5}if(var1===4){periodsMonth=periodsMonth+1}else{periodsMonth=periodsMonth}for(i=0;i<=periodsMonth;i++){rowLabelTableMonth=i;rowLabelTableYear=i;rowLabelChartMonth=i;rowLabelChartQuarter=i;rowLabelChartYear=i;dep_pow=i/12*q;dep_pow_lag=(i-12)/12*q;dep_pow_lag2=(i-1)/12*q;if(i>12&&i%12!==0){dep_pow_lag=(i-i%12)/12*q}if(q===1000){MonthlyDep=0}if(i>0){MonthlyPrincInt=InitialBal*r_monthly}InitialBal=InitialDep*Math.pow(1+eq_p,dep_pow);InitialBalYear=InitialDep*Math.pow(1+rYearPer,dep_pow);MonthlyPrincIntBal=InitialBal-InitialDep;InitialBal_lag=InitialDep*Math.pow(1+eq_p,dep_pow_lag);if(i<12){InitialBal_lag=InitialDep}if((var1>3||g===0)&&i>1){DepBalPrinc_lag2+=MonthlyDep}if((var1>3||g===0)&&i>0){DepBalPrinc+=MonthlyDep}if((var1>3||g===0)&&i>12){DepBalPrinc_lag+=MonthlyDep}if(var1>3&&g===0){DepBal=PeriodicDep*(Math.pow(1+eq_p,dep_pow)-1)*(1+eq_p*type)/eq_p;DepBal_lag=PeriodicDep*(Math.pow(1+eq_p,dep_pow_lag)-1)*(1+eq_p*type)/eq_p;DepBal_lag2=PeriodicDep*(Math.pow(1+eq_p,dep_pow_lag2)-1)*(1+eq_p*type)/eq_p}if(g!==eq_p&&q!==1&&var1<=3){DepBal=PeriodicDep*(Math.pow(1+eq_p,dep_pow)-Math.pow(1+g_p,dep_pow))*(1+eq_p*type)/(eq_p-g_p);DepBalYear=PeriodicDep*(Math.pow(1+rYearPer,dep_pow)-Math.pow(1+g_p,dep_pow))*(1+rYearPer*type)/(rYearPer-g_p);DepBal_lag=PeriodicDep*(Math.pow(1+eq_p,dep_pow_lag)-Math.pow(1+g_p,dep_pow_lag))*(1+eq_p*type)/(eq_p-g_p);DepBal_lag2=PeriodicDep*(Math.pow(1+eq_p,dep_pow_lag2)-Math.pow(1+g_p,dep_pow_lag2))*(1+eq_p*type)/(eq_p-g_p)}if(g!==eq_p&&q!==1&&var1<=3&&g!==0){DepBalPrinc=PeriodicDep*(Math.pow(1+0,dep_pow)-Math.pow(1+g_p,dep_pow))*(1+0*type)/(0-g_p);DepBalPrinc_lag=PeriodicDep*(Math.pow(1+0,dep_pow_lag)-Math.pow(1+g_p,dep_pow_lag))*(1+0*type)/(0-g_p);DepBalPrinc_lag2=PeriodicDep*(Math.pow(1+0,dep_pow_lag2)-Math.pow(1+g_p,dep_pow_lag2))*(1+0*type)/(0-g_p)}else if(g!==eq_p&&q===1&&var1<=3){DepBal=PeriodicDep*(Math.pow(1+eq_p,dep_pow)-Math.pow(1+g,dep_pow))*(1+eq_p*type)/(eq_p-g);DepBalYear=PeriodicDep*(Math.pow(1+rYearPer,dep_pow)-Math.pow(1+g,dep_pow))*(1+rYearPer*type)/(rYearPer-g);DepBal_lag=PeriodicDep*(Math.pow(1+eq_p,dep_pow_lag)-Math.pow(1+g_p,dep_pow_lag))*(1+eq_p*type)/(eq_p-g_p);DepBal_lag2=PeriodicDep*(Math.pow(1+eq_p,dep_pow_lag2)-Math.pow(1+g_p,dep_pow_lag2))*(1+eq_p*type)/(eq_p-g_p)}else if(g!==eq_p&&q===1&&var1<=3&&g!==0){DepBalPrinc=PeriodicDep*(Math.pow(1+0,dep_pow)-Math.pow(1+g,dep_pow))*(1+0*type)/(0-g);DepBalPrinc_lag=PeriodicDep*(Math.pow(1+0,dep_pow_lag)-Math.pow(1+g_p,dep_pow_lag))*(1+0*type)/(0-g_p);DepBalPrinc_lag2=PeriodicDep*(Math.pow(1+0,dep_pow_lag2)-Math.pow(1+g_p,dep_pow_lag2))*(1+0*type)/(0-g_p)}else if(g===eq_p&&var1<4){DepBal=PeriodicDep*dep_pow*Math.pow(1+eq_p,dep_pow-1)*(1+eq_p*type);DepBalYear=PeriodicDep*dep_pow*Math.pow(1+rYearPer,dep_pow-1)*(1+rYearPer*type);DepBal_lag=PeriodicDep*dep_pow_lag*Math.pow(1+eq_p,dep_pow_lag-1)*(1+eq_p*type);DepBal_lag2=PeriodicDep*dep_pow_lag2*Math.pow(1+eq_p,dep_pow_lag2-1)*(1+eq_p*type)}else if(g===eq_p&&var1<4&&g!==0){DepBalPrinc=PeriodicDep*(Math.pow(1+0,dep_pow)-Math.pow(1+g_p,dep_pow))*(1+0*type)/(0-g_p);DepBalPrinc_lag=PeriodicDep*(Math.pow(1+0,dep_pow_lag)-Math.pow(1+g_p,dep_pow_lag))*(1+0*type)/(0-g_p);DepBalPrinc_lag2=PeriodicDep*(Math.pow(1+0,dep_pow_lag2)-Math.pow(1+g_p,dep_pow_lag2))*(1+0*type)/(0-g_p)}if(i<12){DepBal_lag=0;DepBalPrinc_lag=0}YearlyPrincInt=InitialBal-InitialBal_lag;YearlyDep=DepBalPrinc-DepBalPrinc_lag;MonthlyDep2=DepBalPrinc-DepBalPrinc_lag2;if(i===0){MonthlyDep2=0;DepBal_lag2=0}MonthlyDepInt=DepBal-DepBal_lag2-MonthlyDep2;YearlyDepBal=DepBal-DepBal_lag;if(i>12&&i%12!==0&&g===0){YearlyDep=YearlyDep*(i%12)/12}YearlyDepInt=YearlyDepBal-YearlyDep;YearlyTotalInt=YearlyPrincInt+YearlyDepInt;BalanceTotal=InitialBal+DepBal;BalanceTotalYear=InitialBalYear+DepBalYear;BalanceIntTotal=BalanceTotal-DepBalPrinc-InitialDep;BalanceIntTotalYear=BalanceTotalYear-DepBalPrinc-InitialDep}ctx.exportValue("finalBal",formatCurrency(FinalBal));ctx.exportValue("balanceIntTotal_exp",formatCurrency(BalanceIntTotal));ctx.exportValue("final_real",formatCurrency(Final_real));ctx.exportValue("initial_dep",formatCurrency(InitialDep));ctx.exportValue("dep_bal_princ",formatCurrency(DepBalPrinc));ctx.exportValue("total_dep",formatCurrency(DepBalPrinc+InitialDep));ctx.exportValue("initial_cg",formatCurrency(InitialBal-InitialDep));ctx.exportValue("dep_cg",formatCurrency(DepBal-DepBalPrinc));ctx.exportValue("initial_final_bal",formatCurrency(InitialBal));ctx.exportValue("dep_final_bal",formatCurrency(DepBal))});omni.define("get_values",function(PrincipalBal,DepositBal,InitialDep,PeriodicDep,FinalBal,FinalBal_adj,t,r,apy,select1,m,q,var1,var2,g,type,g_p,ct1,ct2,ct3,infl,index){var MIN_PRECISION=1e-7;var MAX_ITERATIONS=5000;var ex=2.718281828459045;var Final_real;var months;var eq_p_var5;var eq_p2;var continuous_r;var chart=0;var eq_base;if(m===0){continuous_r=mathjs.pow(ex,r)-1;m=1;eq_base=1+continuous_r/m}else{eq_base=1+r/m}var rYearPer=Math.pow(1+r/1,1/q)-1;var days;var apy2;if(m===0){apy2=mathjs.pow(ex,r)-1}else{apy2=mathjs.pow(1+r/m,m)-1}if(m===0){continuous_r=mathjs.pow(ex,r)-1;m=1;eq_base=1+continuous_r/m}else{eq_base=1+r/m}var eq_power=m/q;var eq_p=Math.pow(eq_base,eq_power)-1;var periods=q*t;var message_numb;if(var1===1){if(q===1000){PeriodicDep=0}PrincipalBal=InitialDep*Math.pow(1+eq_p,periods);if(g!==eq_p&&q!==1){DepositBal=PeriodicDep*(Math.pow(1+eq_p,periods)-Math.pow(1+g_p,periods))*(1+eq_p*type)/(eq_p-g_p)}else if(g!==eq_p&&q===1){DepositBal=PeriodicDep*(Math.pow(1+eq_p,periods)-Math.pow(1+g,periods))*(1+eq_p*type)/(eq_p-g)}else if(g===eq_p){DepositBal=PeriodicDep*periods*Math.pow(1+eq_p,periods-1)*(1+eq_p*type)}FinalBal=PrincipalBal+DepositBal;Final_real=FinalBal/mathjs.pow(1+infl,t);if((InitialDep>0||PeriodicDep>0)&&infl===0){chart=1;message_numb=1}else if((InitialDep>0||PeriodicDep>0)&&infl>0){chart=1;message_numb=2}else{chart=0;message_numb=3}}else if(var1===2){if(q===1000){PeriodicDep=0}if(g!==eq_p&&q!==1){DepositBal=PeriodicDep*(Math.pow(1+eq_p,periods)-Math.pow(1+g_p,periods))*(1+eq_p*type)/(eq_p-g_p)}else if(g!==eq_p&&q===1){DepositBal=PeriodicDep*(Math.pow(1+eq_p,periods)-Math.pow(1+g,periods))*(1+eq_p*type)/(eq_p-g)}else if(g===eq_p){DepositBal=PeriodicDep*periods*Math.pow(1+eq_p,periods-1)*(1+eq_p*type)}FinalBal=FinalBal_adj*mathjs.pow(1+infl,t);PrincipalBal=FinalBal-DepositBal;InitialDep=PrincipalBal/Math.pow(1+eq_p,periods);if(FinalBal===0){chart=0;message_numb=4}else if(InitialDep>=0&&infl===0){chart=1;message_numb=5}else if(InitialDep>=0&&infl>0){chart=1;message_numb=6}else{chart=0;message_numb=7}}else if(var1===3){FinalBal=FinalBal_adj*mathjs.pow(1+infl,t);PrincipalBal=InitialDep*Math.pow(1+eq_p,periods);DepositBal=FinalBal-PrincipalBal;if(g!==eq_p&&q!==1){PeriodicDep=DepositBal/((Math.pow(1+eq_p,periods)-Math.pow(1+g_p,periods))*(1+eq_p*type)/(eq_p-g_p))}else if(g!==eq_p&&q===1){PeriodicDep=DepositBal/((Math.pow(1+eq_p,periods)-Math.pow(1+g,periods))*(1+eq_p*type)/(eq_p-g))}else if(g===eq_p){PeriodicDep=DepositBal/(periods*Math.pow(1+eq_p,periods-1)*(1+eq_p*type))}if(PeriodicDep>0&&infl===0&&q!==1000){chart=1;message_numb=8}else if(PeriodicDep>0&&infl>0&&q!==1000){chart=1;message_numb=9}else if(q===1000){chart=0;message_numb=10}else{chart=0;message_numb=11}}else if(var1===4){g=0;infl=0;if(q===1000){PeriodicDep=0}if(InitialDep>0||PeriodicDep>0){FinalBal=FinalBal_adj*mathjs.pow(1+infl,t);DepositBal=FinalBal-PrincipalBal;periods=Math.log((eq_p*(FinalBal+PeriodicDep*type)+PeriodicDep)/(eq_p*InitialDep+PeriodicDep*(1+eq_p*type)))/Math.log(eq_p+1);t=periods/q}months=(t-Math.trunc(t))*12;days=(months-Math.trunc(months))*365.242/12;if(InitialDep+PeriodicDep<=0){chart=0;message_numb=12}else if(InitialDep>=FinalBal){chart=0;message_numb=13}else if(Math.trunc(t)===0&&Math.trunc(months)!==0&&Math.trunc(days)!==0){chart=1;message_numb=14}else if(Math.trunc(months)===0&&Math.trunc(days)!==0&&Math.trunc(t)!==0){chart=1;message_numb=15}else if(Math.trunc(days)===0&&Math.trunc(months)!==0&&Math.trunc(t)!==0){chart=1;message_numb=16}else if(Math.trunc(t)===0&&Math.trunc(months)===0&&Math.trunc(days)!==0){chart=1;message_numb=17}else if(Math.trunc(t)===0&&Math.trunc(days)===0&&Math.trunc(months)!==0){chart=1;message_numb=18}else if(Math.trunc(days)===0&&Math.trunc(months)===0&&Math.trunc(t)!==0){chart=1;message_numb=19}else if(Math.trunc(days)!==0&&Math.trunc(months)!==0&&Math.trunc(t)!==0){chart=1;message_numb=20}else if(Math.trunc(days)===0&&Math.trunc(months)===0&&Math.trunc(t)===0){chart=0;message_numb=21}}else if(var1===5){g=0;if(q===1000){PeriodicDep=0}FinalBal=FinalBal_adj*mathjs.pow(1+infl,t);var oldI;var newI=eq_p;var iteration=0;do{oldI=newI;var dividend=InitialDep*Math.pow(newI+1,periods)+PeriodicDep*(Math.pow(newI+1,periods)-1)*(1+newI*type)/newI-FinalBal;var divisor=InitialDep*periods*Math.pow(newI+1,periods-1)+((PeriodicDep*periods*Math.pow(newI+1,periods-1)*(1+newI*type)+PeriodicDep*(Math.pow(newI+1,periods)-1))*newI-PeriodicDep*(Math.pow(newI+1,periods)-1)*(1+newI*type))/Math.pow(newI,2);newI=newI-dividend/divisor;++iteration}while(Math.abs(oldI-newI)>MIN_PRECISION&&iteration<=MAX_ITERATIONS);eq_p=newI;eq_p_var5=newI;var oldR;var newR=eq_p;var iterationR=0;do{oldR=newR;if(ct1===0){var dividendR=Math.pow(ex,newR/q)-1-eq_p;var divisorR=Math.pow(ex,newR/q)/q;newR=newR-dividendR/divisorR}else{var dividendR2=Math.pow(1+newR/m,m/q)-1-eq_p;var divisorR2=Math.pow(1+newR/m,m/q-1)/q;newR=newR-dividendR2/divisorR2}++iterationR}while(Math.abs(oldR-newR)>MIN_PRECISION&&iterationR<=MAX_ITERATIONS);eq_p2=newR;eq_p=eq_p2;if(ct1===0){apy2=mathjs.pow(ex,eq_p2)-1}else{apy2=mathjs.pow(1+eq_p2/m,m)-1}if(InitialDep+PeriodicDep<=0){chart=0;message_numb=22}else if(eq_p2<=0||isNaN(eq_p2)){chart=0;message_numb=23}else{chart=1;message_numb=24}}var k;if(q===1){k=12}else if(q===2){k=6}else if(q===4){k=3}else if(q===12){k=1}else if(q===52){k=12/52}else if(q===26){k=12/26}else if(q===365){k=12/365}var MonthlyDep=PeriodicDep/k;if(var1===5){r=eq_p}var eq_base_monthly;if(ct1===0){var continuous_r_monthly=mathjs.pow(ex,r)-1;m=1;eq_base_monthly=1+continuous_r_monthly/m}else{eq_base_monthly=1+r/m}var eq_power_monthly=m/12;var r_monthly=mathjs.pow(eq_base_monthly,eq_power_monthly)-1;var MonthlyDep2;var periodsMonth=t*12;var monthlyTimeSeries=[];var monthlyYearlyGrowth=[];var monthlyAdditionalGrowth=[];var monthlyTotalGrowth=[];var annualTimeSeries=[];var annualYearlyGrowth=[];var annualAdditionalGrowth=[];var annualTotalGrowth=[];var i;var MonthlyPrincInt=0;var MonthlyDepInt=0;var MonthlyPrincIntBal=0;var InitialBal=InitialDep/(r_monthly+1);var InitialBalYear=InitialDep/(rYearPer+1);var InitialBal_lag=0;var DepBal;var DepBalYear;var DepBal_lag;var DepBal_lag2;var DepBalPrinc=0;var DepBalPrinc_lag=0;var DepBalPrinc_lag2=0;var YearlyDep;var YearlyDepBal;var YearlyDepInt;var YearlyPrincInt;var YearlyTotalInt;var BalanceTotal=0;var BalanceTotalYear=0;var BalanceIntTotal=0;var BalanceIntTotalYear=0;var dep_pow;var dep_pow_lag;var dep_pow_lag2;var pointFractionTable=0;var pointFractionChart=12;var pointFractionChart2=12;if(var1===5){eq_p=eq_p_var5}if(var1===4){periodsMonth=periodsMonth+1}else{periodsMonth=periodsMonth}for(i=1;i<=periodsMonth;i++){dep_pow=i/12*q;dep_pow_lag=(i-12)/12*q;dep_pow_lag2=(i-1)/12*q;if(i>12&&i%12!==0){dep_pow_lag=(i-i%12)/12*q}if(q===1000){MonthlyDep=0}if(i>0){MonthlyPrincInt=InitialBal*r_monthly}InitialBal=InitialDep*Math.pow(1+eq_p,dep_pow);InitialBalYear=InitialDep*Math.pow(1+rYearPer,dep_pow);MonthlyPrincIntBal=InitialBal-InitialDep;InitialBal_lag=InitialDep*Math.pow(1+eq_p,dep_pow_lag);if(i<12){InitialBal_lag=InitialDep}if((var1>3||g===0)&&i>1){DepBalPrinc_lag2+=MonthlyDep}if((var1>3||g===0)&&i>0){DepBalPrinc+=MonthlyDep}if((var1>3||g===0)&&i>12){DepBalPrinc_lag+=MonthlyDep}if(var1>3&&g===0){DepBal=PeriodicDep*(Math.pow(1+eq_p,dep_pow)-1)*(1+eq_p*type)/eq_p;DepBal_lag=PeriodicDep*(Math.pow(1+eq_p,dep_pow_lag)-1)*(1+eq_p*type)/eq_p;DepBal_lag2=PeriodicDep*(Math.pow(1+eq_p,dep_pow_lag2)-1)*(1+eq_p*type)/eq_p}if(g!==eq_p&&q!==1&&var1<=3){DepBal=PeriodicDep*(Math.pow(1+eq_p,dep_pow)-Math.pow(1+g_p,dep_pow))*(1+eq_p*type)/(eq_p-g_p);DepBalYear=PeriodicDep*(Math.pow(1+rYearPer,dep_pow)-Math.pow(1+g_p,dep_pow))*(1+rYearPer*type)/(rYearPer-g_p);DepBal_lag=PeriodicDep*(Math.pow(1+eq_p,dep_pow_lag)-Math.pow(1+g_p,dep_pow_lag))*(1+eq_p*type)/(eq_p-g_p);DepBal_lag2=PeriodicDep*(Math.pow(1+eq_p,dep_pow_lag2)-Math.pow(1+g_p,dep_pow_lag2))*(1+eq_p*type)/(eq_p-g_p)}if(g!==eq_p&&q!==1&&var1<=3&&g!==0){DepBalPrinc=PeriodicDep*(Math.pow(1+0,dep_pow)-Math.pow(1+g_p,dep_pow))*(1+0*type)/(0-g_p);DepBalPrinc_lag=PeriodicDep*(Math.pow(1+0,dep_pow_lag)-Math.pow(1+g_p,dep_pow_lag))*(1+0*type)/(0-g_p);DepBalPrinc_lag2=PeriodicDep*(Math.pow(1+0,dep_pow_lag2)-Math.pow(1+g_p,dep_pow_lag2))*(1+0*type)/(0-g_p)}else if(g!==eq_p&&q===1&&var1<=3){DepBal=PeriodicDep*(Math.pow(1+eq_p,dep_pow)-Math.pow(1+g,dep_pow))*(1+eq_p*type)/(eq_p-g);DepBalYear=PeriodicDep*(Math.pow(1+rYearPer,dep_pow)-Math.pow(1+g,dep_pow))*(1+rYearPer*type)/(rYearPer-g);DepBal_lag=PeriodicDep*(Math.pow(1+eq_p,dep_pow_lag)-Math.pow(1+g_p,dep_pow_lag))*(1+eq_p*type)/(eq_p-g_p);DepBal_lag2=PeriodicDep*(Math.pow(1+eq_p,dep_pow_lag2)-Math.pow(1+g_p,dep_pow_lag2))*(1+eq_p*type)/(eq_p-g_p)}else if(g!==eq_p&&q===1&&var1<=3&&g!==0){DepBalPrinc=PeriodicDep*(Math.pow(1+0,dep_pow)-Math.pow(1+g,dep_pow))*(1+0*type)/(0-g);DepBalPrinc_lag=PeriodicDep*(Math.pow(1+0,dep_pow_lag)-Math.pow(1+g_p,dep_pow_lag))*(1+0*type)/(0-g_p);DepBalPrinc_lag2=PeriodicDep*(Math.pow(1+0,dep_pow_lag2)-Math.pow(1+g_p,dep_pow_lag2))*(1+0*type)/(0-g_p)}else if(g===eq_p&&var1<4){DepBal=PeriodicDep*dep_pow*Math.pow(1+eq_p,dep_pow-1)*(1+eq_p*type);DepBalYear=PeriodicDep*dep_pow*Math.pow(1+rYearPer,dep_pow-1)*(1+rYearPer*type);DepBal_lag=PeriodicDep*dep_pow_lag*Math.pow(1+eq_p,dep_pow_lag-1)*(1+eq_p*type);DepBal_lag2=PeriodicDep*dep_pow_lag2*Math.pow(1+eq_p,dep_pow_lag2-1)*(1+eq_p*type)}else if(g===eq_p&&var1<4&&g!==0){DepBalPrinc=PeriodicDep*(Math.pow(1+0,dep_pow)-Math.pow(1+g_p,dep_pow))*(1+0*type)/(0-g_p);DepBalPrinc_lag=PeriodicDep*(Math.pow(1+0,dep_pow_lag)-Math.pow(1+g_p,dep_pow_lag))*(1+0*type)/(0-g_p);DepBalPrinc_lag2=PeriodicDep*(Math.pow(1+0,dep_pow_lag2)-Math.pow(1+g_p,dep_pow_lag2))*(1+0*type)/(0-g_p)}if(i<12){DepBal_lag=0;DepBalPrinc_lag=0}YearlyPrincInt=InitialBal-InitialBal_lag;YearlyDep=DepBalPrinc-DepBalPrinc_lag;MonthlyDep2=DepBalPrinc-DepBalPrinc_lag2;if(i===0){MonthlyDep2=0;DepBal_lag2=0}MonthlyDepInt=DepBal-DepBal_lag2-MonthlyDep2;YearlyDepBal=DepBal-DepBal_lag;if(i>12&&i%12!==0&&g===0){YearlyDep=YearlyDep*(i%12)/12}YearlyDepInt=YearlyDepBal-YearlyDep;YearlyTotalInt=YearlyPrincInt+YearlyDepInt;BalanceTotal=InitialBal+DepBal;BalanceTotalYear=InitialBalYear+DepBalYear;BalanceIntTotal=BalanceTotal-DepBalPrinc-InitialDep;BalanceIntTotalYear=BalanceTotalYear-DepBalPrinc-InitialDep;if(days!==0&&DepBalPrinc+InitialDep>=FinalBal&&var1===4){YearlyDep=MonthlyDep*months;DepBal=FinalBal-InitialDep;YearlyDepBal=DepBal-DepBal_lag;YearlyDepInt=YearlyDepBal-YearlyDep;MonthlyDep2=MonthlyDep*(days/(365/12)/k);DepBalPrinc=DepBalPrinc-MonthlyDep+MonthlyDep2;BalanceTotal=FinalBal;BalanceIntTotal=FinalBal-(DepBalPrinc+InitialDep)}}var results=[chart,PeriodicDep,message_numb,FinalBal,InitialDep,Math.trunc(t),Math.trunc(months),Math.trunc(days),BalanceIntTotal];return results[index]});function formatCurrency(value){var number=parseFloat(value);return number.toLocaleString(navigator.language,{minimumFractionDigits:2,maximumFractionDigits:2})}//# sourceURL=customJs.js
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
    
    /* The compound-frequency list is coded 21…33; the deposit list carries the
       number of deposits a year directly. */
    var CG_COMPOUNDS = { 21: 1, 22: 2, 23: 4, 24: 6, 25: 12, 26: 26.0893, 27: 26,
                         28: 52.1786, 29: 52, 30: 365.25, 31: 360, 32: 365, 33: 0 };
    
    omni.onResult(['InitialDep', 'r', 't'], function (ctx, values) {
      var P = Number(values.InitialDep || 0);
      var rate = Number(values.r || 0) / 100;
      var years = Number(values.t || 0);
      var PMT = Number(values.PeriodicDep || 0);
      var growth = Number(values.g || 0) / 100;
      var infl = Number(values.infl || 0) / 100;
      var when = Number(values.type || 0);            /* 0 end, 1 beginning */
      var code = Number(values.compound_frequency || 0);
      var q = Number(values.q || 0);
    
      var clear = function () {
        ['final_balance', 'real_balance', 'total_deposited', 'interest_earned',
         'periods', 'effective_rate'].forEach(function (n) { ctx.exportValue(n, null); });
      };
    
      if (!code) {
        clear();
        ctx.addUnmetCondition('Choose a compound frequency — yearly, monthly, daily or continuous.');
        return;
      }
      if (!q) {
        clear();
        ctx.addUnmetCondition('Choose how often you add to the balance ("Never" if you do not).');
        return;
      }
      if (!(years > 0)) {
        clear();
        ctx.addUnmetCondition('Enter a term in years — the balance is compounded over that time.');
        return;
      }
      if (q === 1000) { PMT = 0; }                    /* "Never": no deposits at all */
    
      var m = CG_COMPOUNDS[code];
      var continuous = code === 33 || m === 0;
      var i, effective;
      if (q === 1000) {
        /* no deposit schedule: compound and report over the whole term */
        q = m || 1;
      }
      if (continuous) {
        i = Math.exp(rate / q) - 1;
        effective = Math.exp(rate) - 1;
      } else {
        i = Math.pow(1 + rate / m, m / q) - 1;
        effective = Math.pow(1 + rate / m, m) - 1;
      }
      var n = Math.round(q * years);
      if (n < 1) {
        clear();
        ctx.addUnmetCondition('That term is shorter than one compounding period.');
        return;
      }
    
      var factor = Math.pow(1 + i, n);
      var principalPart = P * factor;
      var depositPart;
      var gp = q === 1000 || q === 0 ? 0 : growth / q;
      if (PMT === 0) {
        depositPart = 0;
      } else if (Math.abs(growth - (i * q)) < 1e-12 || Math.abs(gp - i) < 1e-12) {
        depositPart = PMT * n * Math.pow(1 + i, n - 1) * (1 + i * when);
      } else {
        depositPart = PMT * (factor - Math.pow(1 + gp, n)) / (i - gp) * (1 + i * when);
      }
      var total = principalPart + depositPart;
      var paidIn = P + PMT * n;
      var real = total / Math.pow(1 + infl, years);
    
      ctx.exportValue('final_balance', sround(total, 2));
      ctx.exportValue('real_balance', sround(real, 2));
      ctx.exportValue('total_deposited', sround(paidIn, 2));
      ctx.exportValue('interest_earned', sround(total - paidIn, 2));
      ctx.exportValue('periods', n);
      ctx.exportValue('effective_rate', sround(effective * 100, 4));
    
      ctx.addHtml('<p><strong>The balance reaches ' + snum(total, 2) + '</strong> after ' + snum(years, 4)
        + ' years — ' + snum(paidIn, 2) + ' paid in and ' + snum(total - paidIn, 2) + ' of interest.</p>');
      ctx.addHtml(stable(['Item', 'Value'], [
        ['Initial balance', snum(P, 2)],
        ['Deposit each period', snum(PMT, 2)],
        ['Periods', String(n)],
        ['Rate per period, %', snum(i * 100, 6)],
        ['Growth of the balance alone', snum(principalPart, 2)],
        ['Growth of the deposits', snum(depositPart, 2)],
        ['Final balance', snum(total, 2)],
        ['Total paid in', snum(paidIn, 2)],
        ['Interest earned', snum(total - paidIn, 2)],
        ['In today\'s money at ' + snum(infl * 100, 2) + '% inflation', snum(real, 2)],
        ['Effective annual rate, %', snum(effective * 100, 4)]
      ]));
      ctx.addHtml('<p class="calc-note">Compound growth multiplies the balance by the per-period rate once for '
        + 'each period, so the last period earns on the interest of every period before it — which is why the '
        + 'balance is not simply the rate times the years. A deposit made at the beginning of a period earns for '
        + 'that whole period, one made at the end earns for none of it; the choice is the "When" field. Deposit '
        + 'growth compounds the deposit itself, and inflation is divided out at the end to give the figure in '
        + 'today\'s money. Continuous compounding uses e^(r/q) per period rather than (1+r/m)^(m/q), and both give '
        + 'the same effective annual rate in the limit.</p>');
    });
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Enter Initial deposit, Interest rate and Term into Compound growth and the answer comes back as Final balance and Final balance in today's money. The arithmetic is the whole method: final balance is worked out from initial deposit by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Compound growth calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Compound growth: it takes 11 numbers and reports Final balance, Final balance in today&#039;s money and Total paid in (initial + deposits).</p><p>The relationship it solves reads How often? = ln(Annual growth rate + 1) ÷ ln(Periodic growth rate + 1).</p><p>The result panel carries Final balance, Final balance in today&#039;s money, Total paid in (initial + deposits) and Interest earned, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 11 boxes and the page has everything it needs.</p><ul><li><strong>Initial deposit</strong> — in USD</li><li><strong>Interest rate</strong> — in percent. Annual rate of interest.</li><li><strong>Term</strong> — in years / months</li><li><strong>Compounding frequency</strong> — a plain number, no unit. Here you can set how often the interest is added to your principal balance.</li><li><strong>How often?</strong> — a plain number, no unit. Here you can set the regularity of the additional deposits.</li><li><strong>How much?</strong> — in USD</li><li><strong>When?</strong> — a plain number, no unit</li><li><strong>Annual growth rate</strong> — in percent. The percentage growth rate of your additional periodic deposits over a year.</li><li><strong>Periodic growth rate</strong> — in percent. The percentage growth rate of your periodic contributions. Note, that periodic and annual growth rates are linked together; if you set one, the other will be calculated according to the regularity of your additional deposit.</li><li><strong>Desired savings</strong> — in USD. The future value (FV) of your savings. Note that it will be your desired inflation-adjusted balance in case you set the annual inflation rate.</li><li><strong>Apy</strong> — in percent</li></ul><p>The answers come back as Final balance, Final balance in today&#039;s money, Total paid in (initial + deposits), Interest earned, Number of compounding periods, Effective annual rate, %. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Initial deposit = 1000 USD, Interest rate = 8 perc, Term = 240 yrsmos, Compounding frequency = 25, How much? = 50 USD, When? = 1, Desired savings = 20000 USD and Apy = 1.95 perc; the answers are <strong>How often?</strong> = 12, <strong>Table schedule</strong> = 111, <strong>Display</strong> = 12, <strong>Depositbal</strong> = 0, <strong>Principalbal</strong> = 0, <strong>Desired savings</strong> = 20000, <strong>Known rate</strong> = 1, <strong>Infl</strong> = 0 and <strong>I would like to know…</strong> = 1.</p><ul><li><strong>How often?</strong> = 12</li><li><strong>Table schedule</strong> = 111</li><li><strong>Display</strong> = 12</li><li><strong>Depositbal</strong> = 0</li><li><strong>Principalbal</strong> = 0</li><li><strong>Desired savings</strong> = 20000</li><li><strong>Known rate</strong> = 1</li><li><strong>Infl</strong> = 0</li><li><strong>I would like to know…</strong> = 1</li></ul><p>That is <strong>How often?</strong> = <code>ln(Annual growth rate + 1) ÷ ln(Periodic growth rate + 1)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>How often?</strong> = 12, <strong>Table schedule</strong> = 111, <strong>Display</strong> = 12, <strong>Depositbal</strong> = 0, <strong>Principalbal</strong> = 0, <strong>Desired savings</strong> = 20000, <strong>Known rate</strong> = 1, <strong>Infl</strong> = 0 and <strong>I would like to know..</strong> = 1. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Interest rate lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>How often?</strong> = <code>ln(Annual growth rate + 1) ÷ ln(Periodic growth rate + 1)</code></li><li><strong>Periodic growth rate</strong> = <code>(Annual growth rate + 1)^(1 ÷ How often?) − 1</code></li><li><strong>Annual growth rate</strong> = <code>(Periodic growth rate + 1)^(How often?) − 1</code></li><li><strong>Chart</strong> = <code>get_values(Principalbal, Depositbal, Initial deposit, How much?, Desired savings, Desired savings, Term, Interest rate, Apy, Select1, M, How often?, Var1, Var2, Annual growth rate, When?, Periodic growth rate, Ct1, Ct2, Ct3, Infl, 0)</code></li><li><strong>Periodic dep rc</strong> = <code>get_values(Principalbal, Depositbal, Initial deposit, How much?, Desired savings, Desired savings, Term, Interest rate, Apy, Select1, M, How often?, Var1, Var2, Annual growth rate, When?, Periodic growth rate, Ct1, Ct2, Ct3, Infl, 1)</code></li><li><strong>Message numb</strong> = <code>get_values(Principalbal, Depositbal, Initial deposit, How much?, Desired savings, Desired savings, Term, Interest rate, Apy, Select1, M, How often?, Var1, Var2, Annual growth rate, When?, Periodic growth rate, Ct1, Ct2, Ct3, Infl, 2)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>How often?</strong> = <code>ln(Annual growth rate + 1) ÷ ln(Periodic growth rate + 1)</code> — the form to use when Annual growth rate and Periodic growth rate are the values you have.</li><li><strong>Periodic growth rate</strong> = <code>(Annual growth rate + 1)^(1 ÷ How often?) − 1</code> — the form to use when Annual growth rate and How often? are the values you have.</li><li><strong>Annual growth rate</strong> = <code>(Periodic growth rate + 1)^(How often?) − 1</code> — the form to use when Periodic growth rate and How often? are the values you have.</li><li><strong>Chart</strong> = <code>get_values(Principalbal, Depositbal, Initial deposit, How much?, Desired savings, Desired savings, Term, Interest rate, Apy, Select1, M, How often?, Var1, Var2, Annual growth rate, When?, Periodic growth rate, Ct1, Ct2, Ct3, Infl, 0)</code> — the form to use when Principalbal, Depositbal, Initial deposit and How much? are the values you have.</li><li><strong>Periodic dep rc</strong> = <code>get_values(Principalbal, Depositbal, Initial deposit, How much?, Desired savings, Desired savings, Term, Interest rate, Apy, Select1, M, How often?, Var1, Var2, Annual growth rate, When?, Periodic growth rate, Ct1, Ct2, Ct3, Infl, 1)</code> — the form to use when Principalbal, Depositbal, Initial deposit and How much? are the values you have.</li><li><strong>Message numb</strong> = <code>get_values(Principalbal, Depositbal, Initial deposit, How much?, Desired savings, Desired savings, Term, Interest rate, Apy, Select1, M, How often?, Var1, Var2, Annual growth rate, When?, Periodic growth rate, Ct1, Ct2, Ct3, Infl, 2)</code> — the form to use when Principalbal, Depositbal, Initial deposit and How much? are the values you have.</li><li><strong>Final bal r</strong> = <code>get_values(Principalbal, Depositbal, Initial deposit, How much?, Desired savings, Desired savings, Term, Interest rate, Apy, Select1, M, How often?, Var1, Var2, Annual growth rate, When?, Periodic growth rate, Ct1, Ct2, Ct3, Infl, 3)</code> — the form to use when Principalbal, Depositbal, Initial deposit and How much? are the values you have.</li><li><strong>Initial dep r</strong> = <code>get_values(Principalbal, Depositbal, Initial deposit, How much?, Desired savings, Desired savings, Term, Interest rate, Apy, Select1, M, How often?, Var1, Var2, Annual growth rate, When?, Periodic growth rate, Ct1, Ct2, Ct3, Infl, 4)</code> — the form to use when Principalbal, Depositbal, Initial deposit and How much? are the values you have.</li></ul><p>Any one of How often?, Periodic growth rate and Annual growth rate can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Initial deposit, from 1000 to 2000 — and the answers go from <strong>How often?</strong> 12, <strong>Table schedule</strong> 111, <strong>Display</strong> 12, <strong>Depositbal</strong> 0, <strong>Principalbal</strong> 0, <strong>Desired savings</strong> 20000, <strong>Known rate</strong> 1, <strong>Infl</strong> 0 and <strong>I would like to know..</strong> 1 to <strong>How often?</strong> 12, <strong>Table schedule</strong> 111, <strong>Display</strong> 12, <strong>Depositbal</strong> 0, <strong>Principalbal</strong> 0, <strong>Desired savings</strong> 20000, <strong>Known rate</strong> 1, <strong>Infl</strong> 0 and <strong>I would like to know..</strong> 1.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Interest rate, Term and Annual growth rate carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Final balance, Final balance in today&#039;s money and Total paid in (initial + deposits) are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Initial deposit left as a guess.</strong> Anything typed into Initial deposit is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Interest rate left as a guess.</strong> Anything typed into Interest rate is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Initial deposit is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Initial deposit, Interest rate, Term and Compounding frequency. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Initial deposit into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Final balance with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Final balance is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The chips cover percent and years / months. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Initial deposit, Interest rate and Term and the number you are missing is Final balance and Final balance in today&#039;s money.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/fisher-effect">Fisher effect Calculator</a>, <a href="/finance/fisher-equation">Fisher equation Calculator</a> and <a href="/finance/fixed-asset-turnover">Fixed asset turnover</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Compound growth calculator work out?', 'a' => <<<'TXT'
            Final balance, Final balance in today's money, Total paid in (initial + deposits) and Interest earned, from Annual growth rate and Periodic growth rate. The relationship is How often? = ln(Annual growth rate + 1) ÷ ln(Periodic growth rate + 1).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Initial deposit (USD), Interest rate (percent), Term (years / months), Compounding frequency, How often?. Enter initial deposit, interest rate and term; Final balance is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of How often?, Periodic growth rate, Annual growth rate and Chart blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            How often? = 12, Table schedule = 111, Display = 12, Depositbal = 0, Principalbal = 0, Desired savings = 20000, Known rate = 1, Infl = 0 and I would like to know… = 1. That comes from the page's own defaults, entered in Initial deposit; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Final balance is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Initial deposit left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Final balance at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/fisher-effect', 'name' => 'Fisher effect Calculator'],
            ['path' => '/finance/fisher-equation', 'name' => 'Fisher equation Calculator'],
            ['path' => '/finance/fixed-asset-turnover', 'name' => 'Fixed asset turnover'],
        ],
        'authors' => [],
    ],
];
