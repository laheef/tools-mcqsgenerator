<?php

/**
 * 403b
 * /finance/403b
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => '403b',
    'meta' => ['title' => '403b Calculator — Free, With Worked Examples', 'description' => '403b works out annual contribution and length of annuity from what would you like to know?, current salary ^^(required)^^ and contribution percentage.', 'h1' => '403b Calculator', 'updated' => '2026-09-01'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Subject',
                            'label' => 'What would you like to know?',
                            'type' => 'select',
                            'options' => [
                                'Initial 403(b) balance' => '1',
                                'Final 403(b) balance' => '2',
                                'Required annual salary' => '3',
                                'Contribution percentage' => '3.1',
                                'Age of retirement' => '4',
                                'Required rate of return' => '5',
                            ],
                            'dataset' => 'mode',
                            'control' => 'DROPDOWN',
                            'default' => 'Final 403(b) balance',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => '403(b) Employee savings plan',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Salary',
                            'label' => 'Current salary ^^(required)^^',
                            'type' => 'number',
                            'prefix' => '$',
                            'unit' => '341',
                            'unit_default' => 'annual',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ContPercEmployee',
                            'label' => 'Contribution percentage',
                            'type' => 'number',
                            'help' => 'The percentage of your salary transferred monthly to the 403b account.',
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
                            'name' => 'ContrEmployee',
                            'label' => 'Annual contribution',
                            'type' => 'number',
                            'prefix' => '$',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'AgeFrom',
                            'label' => 'Contribution starts at the age of',
                            'type' => 'number',
                            'suffix' => 'years old',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '22',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'AgeTo',
                            'label' => 'Planned age of retirement',
                            'type' => 'number',
                            'suffix' => 'years old',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '60',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'InDep',
                            'label' => 'Current 403(b) balance',
                            'type' => 'number',
                            'prefix' => '$',
                            'help' => 'The opening balance at the beginning of contributions.',
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
                            'name' => 'r',
                            'label' => 'Annual rate of return',
                            'type' => 'number',
                            'help' => 'The net rate of return - adjusted by management fees.&nbsp;',
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
                            'name' => 'FinBal',
                            'label' => 'Aimed final balance',
                            'type' => 'number',
                            'prefix' => '$',
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
                            'name' => 't',
                            'label' => 'Length of annuity',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'g',
                            'label' => 'Annual salary increase',
                            'type' => 'number',
                            'help' => 'The percentage growth rate of your salary over a year.',
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
                            The percentage growth rate of the periodic deposits of withdrawals. Note that periodic and annual growth rates are linked together: the other will be calculated according to annuity frequency if you set one.
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
            'title' => '403(b) Employer contribution',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ContPercEmployer',
                            'label' => 'Contribution percentage',
                            'type' => 'number',
                            'help' => 'The percentage of your salary transferred monthly to the 403b account from your employer.&nbsp;',
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
                            'name' => 'ContrEmployer',
                            'label' => 'Annual contribution',
                            'type' => 'number',
                            'prefix' => '$',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
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
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'Subject == 5 and rate_return_result == 0', 'text' => 'The rate of return cannot be estimated with the given setup.&nbsp;'],
                                ['when' => 'final_balance == Infinity', 'text' => 'Please update the parameters to reach a plausible result.'],
                            ],
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
                            'name' => 'PerPay',
                            'label' => 'Total annual contribution',
                            'type' => 'number',
                            'prefix' => '$',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'Subject == 1', 'text' => 'You need to have a balance of ${{opening_balance.formattedValue}} to reach the aimed final balance of your 403(b) retirement plan.'],
                                ['when' => 'Subject == 2', 'text' => 'The estimated final balance of your 403(b) retirement plan is ${{final_balance.formattedValue}}.'],
                                ['when' => 'Subject == 3', 'text' => 'Your annual salary must be at least ${{salary_result.formattedValue}} to reach the final balance.'],
                                ['when' => 'Subject == 3.1', 'text' => 'To reach the final balance, your contribution must be at least {{contrib_percent.formattedValue}}% of your salary.'],
                                ['when' => 'Subject == 4', 'text' => <<<'TXT'
                                You need to wait until you turn {{retire_age_result.value}} (which is {{t_yrs.value}} year(s) and {{t_mos.value}} month(s) from now) to reach the final balance of your 403(b) retirement plan.
                                TXT],
                                ['when' => 'Subject == 5', 'text' => 'To reach the final balance of your 403(b) retirement plan, you need a rate of return of {{rate_return_result.formattedValue}}%.'],
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
                            'name' => 'q',
                            'label' => 'Annuity frequency',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
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
                            'rounding' => ['standard', '2'],
                            'min' => 2,
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
                            'name' => 'opening_balance',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'monthly_contrib',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_contrib',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_return',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'num_contrib',
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
                            'name' => 'salary_result',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'contrib_percent',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'term_mos',
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
                            'name' => 'retire_age_result',
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
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rate_return_result',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'g + 1= (1 + g_p) ^ q',
            'results' => ['g_p' => 'pow(g + 1, 1/q) - 1', 'g' => 'pow(g_p + 1, q) - 1', 'q' => 'log(g + 1)/log(g_p + 1)'],
        ],
        [
            'title' => 'ContrEmployee = Salary * ContPercEmployee ',
            'results' => ['Salary' => 'ContrEmployee/ContPercEmployee', 'ContrEmployee' => 'ContPercEmployee*Salary', 'ContPercEmployee' => 'ContrEmployee/Salary'],
        ],
        [
            'title' => 'ContrEmployer = Salary * ContPercEmployer',
            'results' => ['ContPercEmployer' => 'ContrEmployer/Salary', 'ContrEmployer' => 'ContPercEmployer*Salary', 'Salary' => 'ContrEmployer/ContPercEmployer'],
        ],
        [
            'title' => 'PerPay = one_way(ContrEmployee + ContrEmployer)',
            'results' => ['PerPay' => '(ContrEmployee + ContrEmployer)'],
        ],
        [
            'title' => 't = AgeTo - AgeFrom',
            'results' => ['t' => '-AgeFrom + AgeTo', 'AgeTo' => 'AgeFrom + t', 'AgeFrom' => 'AgeTo - t'],
        ],
        [
            'title' => 'final_balance = run_calculations(Subject, Salary, ContPercEmployee, ContrEmployee, AgeFrom, InDep, r, FinBal, t, g, g_p, ContPercEmployer, PerPay)',
            'results' => ['final_balance' => 'run_calculations(Subject, Salary, ContPercEmployee, ContrEmployee, AgeFrom, InDep, r, FinBal, t, g, g_p, ContPercEmployer, (ContrEmployee + ContrEmployer))'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";var VarType=1,m=1,VarTime=1,VarFlow=1,q=12;var opening_balance,monthly_contrib,total_contrib,total_return,num_contrib,salary_result,contrib_percent,term_mos,rate_return_result;omni.define("run_calculations",function(Subject,Salary,ContPercEmployee,ContrEmployee,AgeFrom,InDep,r,FinBal,t,g,g_p,ContPercEmployer,PerPay){PerPay=PerPay/q;var periods=q*t;if(r===0){r=1e-10}var eq_p=getPerEqRate(q,m,r);var DepBal=0;var FinPrincBal=0;if(Subject===1){DepBal=getBal(PerPay,periods,q,eq_p,g_p,g,VarType);FinPrincBal=FinBal-DepBal;InDep=getPV(FinPrincBal,eq_p,periods)}if(Subject===2){DepBal=getBal(PerPay,periods,q,eq_p,g_p,g,VarType);FinPrincBal=getFV(InDep,eq_p,periods);FinBal=FinPrincBal+DepBal}if(Subject===3||Subject===3.1){PerPay=getPerPay(InDep,FinBal,periods,q,eq_p,g_p,g,VarType)}if(Subject===4){periods=getAnnuityPer(InDep,FinBal,PerPay,eq_p,VarType)}if(Subject===5){r=getIntRate(InDep,FinBal,PerPay,periods,m,q,VarType);eq_p=getPerEqRate(q,m,r/100);if(r===0){}}var periodsLoop=mathjs.floor(periods);if(Subject===4){periodsLoop=mathjs.floor(periods+1)}var TotCashFlow=0,iDep=0,TotInt=0,TotIntPer=0,TotBalOpen=0,InBalOpen=0,DepBalOpen=0,periodsCount=0;for(var i=0;i<=periodsLoop;i++){if(i/q>100){return Infinity}if(i>0){InBalOpen=InDep*mathjs.pow(1+eq_p,i-1);DepBalOpen=getBal(PerPay,i-1,q,eq_p,g_p,g,VarType);TotBalOpen=InBalOpen+DepBalOpen;iDep=PerPay*mathjs.pow(1+g_p,i-1);TotIntPer=(TotBalOpen+iDep)*eq_p;periodsCount=i;TotCashFlow+=iDep;TotInt+=TotIntPer}}var Salary2=PerPay/(ContPercEmployer+ContPercEmployee);var ContPercEmployer2=PerPay/(Salary/12);opening_balance=InDep;monthly_contrib=mathjs.abs(PerPay);total_contrib=TotCashFlow;total_return=TotInt;num_contrib=periodsCount;salary_result=mathjs.abs(Salary2*12);contrib_percent=ContPercEmployer2;term_mos=periods;rate_return_result=r;return FinBal});omni.define("get_opening_balance",function(){return opening_balance});omni.define("get_monthly_contrib",function(){return monthly_contrib});omni.define("get_total_contrib",function(){return total_contrib});omni.define("get_total_return",function(){return total_return});omni.define("get_num_contrib",function(){return num_contrib});omni.define("get_salary_result",function(){return salary_result});omni.define("get_contrib_percent",function(){return contrib_percent});omni.define("get_term_mos",function(){return term_mos});omni.define("get_rate_return_result",function(){return rate_return_result});function getBal(PerPay,periods,q,eq_p,g_p,g,VarType){var DepBal;if(g_p!==eq_p&&q!==1){DepBal=PerPay*(mathjs.pow(1+eq_p,periods)-mathjs.pow(1+g_p,periods))*(1+eq_p*VarType)/(eq_p-g_p)}else if(g!==eq_p&&q===1){DepBal=PerPay*(mathjs.pow(1+eq_p,periods)-mathjs.pow(1+g,periods))*(1+eq_p*VarType)/(eq_p-g)}else if(g_p===eq_p){DepBal=PerPay*periods*mathjs.pow(1+eq_p,periods-1)*(1+eq_p*VarType)}return DepBal}function getFV(InBal,eq_p,periods){var FinPrincBal=InBal*mathjs.pow(1+eq_p,periods);return FinPrincBal}function getPerEqRate(q,m,r){var ex=Math.exp(1);var base;if(m===0){var continuous_r=mathjs.pow(ex,r)-1;m=1;base=1+continuous_r/m}else{base=1+r/m}var power=m/q;var eq_p=mathjs.round(mathjs.pow(base,power)-1,10);return eq_p}function getPV(FinPrincBal,eq_p,periods){var InBal=FinPrincBal/mathjs.pow(1+eq_p,periods);return InBal}function getPerPay(InBal,FinBal,periods,q,eq_p,g_p,g,VarType){var PerPay;var PrincBal=InBal*mathjs.pow(1+eq_p,periods);var DepBal=FinBal-PrincBal;if(g_p!==eq_p&&q!==1){PerPay=DepBal/((mathjs.pow(1+eq_p,periods)-mathjs.pow(1+g_p,periods))*(1+eq_p*VarType)/(eq_p-g_p))}else if(g!==eq_p&&q===1){PerPay=DepBal/((mathjs.pow(1+eq_p,periods)-mathjs.pow(1+g,periods))*(1+eq_p*VarType)/(eq_p-g))}else if(g_p===eq_p){PerPay=DepBal/(periods*mathjs.pow(1+eq_p,periods-1)*(1+eq_p*VarType))}return PerPay}function getAnnuityPer(InBal,FinBal,PerPay,eq_p,VarType){var periods;periods=mathjs.log((eq_p*(FinBal+PerPay*VarType)+PerPay)/(eq_p*InBal+PerPay*(1+eq_p*VarType)))/mathjs.log(eq_p+1);if(periods<0){periods=0}return periods}function getIntRate(InBal,FinBal,PerPay,periods,m,q,VarType){var Max_iterations=500000;var Min_precision=1e-9;var ex=Math.exp(1);var APR_approx=0.1;var oldI;var newI=APR_approx;var iteration=0;do{oldI=newI;var dividend=InBal*mathjs.pow(newI+1,periods)+PerPay*(mathjs.pow(newI+1,periods)-1)*(1+newI*VarType)/newI-FinBal;var divisor=InBal*periods*mathjs.pow(newI+1,periods-1)+((PerPay*periods*mathjs.pow(newI+1,periods-1)*(1+newI*VarType)+PerPay*(mathjs.pow(newI+1,periods)-1))*newI-PerPay*(mathjs.pow(newI+1,periods)-1)*(1+newI*VarType))/mathjs.pow(newI,2);newI=newI-dividend/divisor;++iteration}while(mathjs.abs(oldI-newI)>Min_precision&&iteration<=Max_iterations);var eq_p=newI;var oldR;var newR=eq_p;do{oldR=newR;if(m===0){var dividendR=mathjs.pow(ex,newR/q)-1-eq_p;var divisorR=mathjs.pow(ex,newR/q)/q;newR=newR-dividendR/divisorR}else{var dividendR2=mathjs.pow(1+newR/m,m/q)-1-eq_p;var divisorR2=mathjs.pow(1+newR/m,m/q-1)/q;newR=newR-dividendR2/divisorR2}++iteration}while(mathjs.abs(oldR-newR)>Min_precision&&iteration<=Max_iterations);eq_p=newR/q;var r=eq_p*q*100;if(mathjs.abs(r)<0){r=0}return r}//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        403b turns Current salary ^^(required)^^ into Annual contribution and Contribution starts at the age of. It is a single relationship that reads annual contribution out of current salary ^^(required)^^, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the 403b calculator works', 'html' => <<<'TXT'
            <p>The 403b calculator applies one relationship to 2 numbers and reports Annual contribution, Contribution starts at the age of and Planned age of retirement.</p><p>In the form&#039;s own words, Periodic growth rate = (Annual salary increase + 1)^(1 ÷ Annuity frequency) − 1.</p><p>The result panel carries Annual contribution, Contribution starts at the age of, Planned age of retirement and Length of annuity, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Current salary ^^(required)^^</strong> — in annual</li><li><strong>Contribution percentage</strong> — in percent. The percentage of your salary transferred monthly to the 403b account.</li></ul><p>What you get back is Annual contribution, Contribution starts at the age of in years old, Planned age of retirement in years old, Length of annuity in years, Annual salary increase in percent, Periodic growth rate in percent, Contribution percentage in percent, Annual contribution, Total annual contribution, Annuity frequency, Final balance, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Length of annuity offers 5 units and opens on years, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Periodic growth rate</strong> = <code>(Annual salary increase + 1)^(1 ÷ Annuity frequency) − 1</code></li><li><strong>Annual salary increase</strong> = <code>(Periodic growth rate + 1)^(Annuity frequency) − 1</code></li><li><strong>Annuity frequency</strong> = <code>ln(Annual salary increase + 1) ÷ ln(Periodic growth rate + 1)</code></li><li><strong>Annual contribution</strong> = <code>Contribution percentage × Current salary ^^(required)^^</code></li><li><strong>Current salary ^^(required)^^</strong> = <code>Annual contribution ÷ Contribution percentage</code></li><li><strong>Contribution percentage</strong> = <code>Annual contribution ÷ Current salary ^^(required)^^</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Periodic growth rate</strong> = <code>(Annual salary increase + 1)^(1 ÷ Annuity frequency) − 1</code> — the form to use when Annual salary increase and Annuity frequency are the values you have.</li><li><strong>Annual salary increase</strong> = <code>(Periodic growth rate + 1)^(Annuity frequency) − 1</code> — the form to use when Periodic growth rate and Annuity frequency are the values you have.</li><li><strong>Annuity frequency</strong> = <code>ln(Annual salary increase + 1) ÷ ln(Periodic growth rate + 1)</code> — the form to use when Annual salary increase and Periodic growth rate are the values you have.</li><li><strong>Annual contribution</strong> = <code>Contribution percentage × Current salary ^^(required)^^</code> — the form to use when Contribution percentage and Current salary ^^(required)^^ are the values you have.</li><li><strong>Current salary ^^(required)^^</strong> = <code>Annual contribution ÷ Contribution percentage</code> — the form to use when Annual contribution and Contribution percentage are the values you have.</li><li><strong>Contribution percentage</strong> = <code>Annual contribution ÷ Current salary ^^(required)^^</code> — the form to use when Annual contribution and Current salary ^^(required)^^ are the values you have.</li><li><strong>Annual contribution</strong> = <code>Contribution percentage × Current salary ^^(required)^^</code> — the form to use when Contribution percentage and Current salary ^^(required)^^ are the values you have.</li><li><strong>Contribution percentage</strong> = <code>Annual contribution ÷ Current salary ^^(required)^^</code> — the form to use when Annual contribution and Current salary ^^(required)^^ are the values you have.</li></ul><p>Any one of Periodic growth rate, Annual salary increase and Annuity frequency can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Current salary ^^(required)^^ and Contribution percentage is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Annual contribution, Contribution starts at the age of and Planned age of retirement are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Current salary ^^(required)^^ left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Current salary ^^(required)^^ is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Contribution percentage left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Contribution percentage is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Current salary ^^(required)^^ is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the 403b form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Current salary ^^(required)^^</strong> is a annual quantity: the page opens it in annual and converts anything else you pick before the formula runs. The page reads it when it works out Annual contribution, Contribution percentage and Contribution percentage. Fill it from a measurement rather than a memory — Current salary ^^(required)^^ is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Contribution percentage</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The percentage of your salary transferred monthly to the 403b account. The page reads it when it works out Current salary ^^(required)^^, Annual contribution and Final balance. Fill it from a measurement rather than a memory — Contribution percentage is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Current salary ^^(required)^^ and Contribution percentage ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Current salary ^^(required)^^ — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Annual contribution against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Annual contribution is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The unit tables here are years, percent and annual and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Current salary ^^(required)^^ and Contribution percentage are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Current salary ^^(required)^^ and Contribution percentage measured, Annual contribution and Contribution starts at the age of wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/after-tax-cost-of-debt">After-tax cost of debt Calculator</a>, <a href="/finance/agi">AGI Calculator</a> and <a href="/finance/alabama-tax">Alabama tax Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>403b is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from 403b is a number to act on, so the useful question is what to do with Annual contribution, Contribution starts at the age of (years old) and Planned age of retirement (years old) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Current salary ^^(required)^^ and Contribution percentage alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the 403b calculator work out?', 'a' => <<<'TXT'
            Annual contribution, Contribution starts at the age of, Planned age of retirement and Length of annuity, from Annual salary increase and Annuity frequency. The relationship is Periodic growth rate = (Annual salary increase + 1)^(1 ÷ Annuity frequency) − 1.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Current salary ^^(required)^^ (annual), Contribution percentage (percent). With current salary ^^(required)^^ and contribution percentage in place, Annual contribution can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Periodic growth rate, Annual salary increase, Annuity frequency and Annual contribution blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Annual contribution is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave Current salary ^^(required)^^ blank and the page solves for it, reporting Annual contribution instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Annual contribution keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/after-tax-cost-of-debt', 'name' => 'After-tax cost of debt Calculator'],
            ['path' => '/finance/agi', 'name' => 'AGI Calculator'],
            ['path' => '/finance/alabama-tax', 'name' => 'Alabama tax Calculator'],
        ],
        'authors' => [],
    ],
];
