<?php

/**
 * Annuity
 * /finance/annuity
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Annuity',
    'meta' => ['title' => 'Annuity Calculator — Formula, Units & Example', 'description' => 'Annuity turns subject of interest and direction of payment into return status. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Annuity Calculator', 'updated' => '2026-09-01'],
    'sections' => [
        [
            'title' => 'Annuity specifications',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Subject',
                            'label' => 'Subject of interest',
                            'type' => 'select',
                            'options' => [
                                'Initial deposit' => '1',
                                'Final balance' => '2',
                                'Annuity amount' => '3',
                                'Time length' => '4',
                                'Rate of return' => '5',
                            ],
                            'dataset' => 'subject',
                            'help' => <<<'TXT'
                            The initial balance is the present value (PV), the final balance refers to the future value (FV) of the annuity. Annuity amount is the periodic deposit or withdrawal.
                            TXT,
                            'default' => 'Final balance',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'FlowType',
                            'label' => 'Direction of payment',
                            'type' => 'select',
                            'options' => ['Deposit' => '1', 'Withdrawal' => '-1'],
                            'dataset' => 'flow',
                            'control' => 'DROPDOWN',
                            'default' => 'Deposit',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PayFreq',
                            'label' => 'Annuity payment frequency',
                            'type' => 'select',
                            'options' => [
                                'Yearly' => '1',
                                'Semi-annually' => '2',
                                'Quarterly' => '4',
                                'Monthly' => '12',
                                'Biweekly' => '26',
                                'Weekly' => '52',
                                'Daily' => '365',
                            ],
                            'dataset' => 'payment freq (q)',
                            'control' => 'DROPDOWN',
                            'default' => 'Monthly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Type',
                            'label' => 'Type of annuity',
                            'type' => 'select',
                            'options' => ['Ordinary annuity' => '0', 'Annuity due' => '1'],
                            'dataset' => 'type',
                            'control' => 'DROPDOWN',
                            'help' => 'Ordinary annuity: end of periods; annuity due: beginning of periods.',
                            'default' => 'Annuity due',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'CompFreq',
                            'label' => 'Compounding frequency',
                            'type' => 'select',
                            'options' => [
                                'Yearly' => '1',
                                'Semi-annually' => '2',
                                'Quarterly' => '4',
                                'Monthly' => '12',
                                'Biweekly' => '26.08875',
                                'Weekly' => '52.1775',
                                'Daily' => '365.242',
                                'Continuous' => '0',
                            ],
                            'dataset' => 'comp freq ',
                            'control' => 'DROPDOWN',
                            'help' => 'The frequency with which interest is added to (capitalized on) the balance.',
                            'default' => 'Monthly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'StartDate', 'label' => 'First period starts from...', 'type' => 'date'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Main specifications',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'InDep',
                            'label' => 'Initial deposit',
                            'type' => 'number',
                            'help' => 'The opening balance - The present value (FV) of the annuity.',
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
                            'name' => 'FinBal',
                            'label' => 'Final balance',
                            'type' => 'number',
                            'help' => 'The future value (FV) of the annuity.',
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
                            'name' => 'PerPay',
                            'label' => 'Annuity amount',
                            'type' => 'number',
                            'help' => 'Periodic payment (cash-flow) which is either deposit (contribution) or withdrawal (payout).',
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
                            'name' => 't',
                            'label' => 'Length of annuity',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '6',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'r',
                            'label' => 'Rate of return',
                            'type' => 'number',
                            'help' => 'Or annual interest rate.',
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
                            'name' => 'g',
                            'label' => 'Annual growth rate',
                            'type' => 'number',
                            'help' => 'The percentage growth rate of your additional periodic deposits or withdrawals over a year.',
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
            'title' => 'Results',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'Subject == 2', 'text' => 'The final balance (future value) of your annuity is {{final_balance_res.monetaryValue}}.'],
                                ['when' => 'Subject == 1', 'text' => 'The initial deposit (present value) of your annuity is {{opening_bal_res.monetaryValue}}.'],
                                ['when' => 'Subject == 3', 'text' => 'You can deposit {{monthly_inout.monetaryValue}} at the beginning of each {{PayFreq_name.uiValue}} to reach the final balance.'],
                                ['when' => 'Subject == 4 and FlowType == 1', 'text' => 'After depositing for {{time_yrs.value}} year(s) and {{time_mos.value}}&nbsp;months, you will reach {{FinBal.monetaryValue}}.'],
                                ['when' => 'Subject == 4 and FlowType == -1', 'text' => 'Your annuity will last for {{time_yrs.value}} year(s) and {{time_mos.value}}&nbsp;months from the first day of withdrawal.'],
                                ['when' => 'Subject == 5', 'text' => 'Your annuity\'s rate of return is {{rate_of_return_res.value}}%.'],
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
                                ['when' => 'return_status == -2', 'text' => 'The time length cannot be estimated with the given setup.'],
                                ['when' => 'return_status == -1', 'text' => 'The rate of return cannot be estimated with the given setup.'],
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
                            'name' => 'm',
                            'label' => 'M',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'return_status',
                            'label' => 'Return status',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'end_date', 'label' => 'End date', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PayFreq_name',
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
                            'name' => 'final_balance_res',
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
                            'name' => 'opening_bal_res',
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
                            'name' => 'monthly_inout',
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
                            'name' => 'total_inout',
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
                            'name' => 'total_return',
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
                            'name' => 'num_transactions',
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
                            'name' => 'time',
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
                            'name' => 'time_yrs',
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
                            'name' => 'time_mos',
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
                            'name' => 'rate_of_return_res',
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
            'results' => ['q' => 'log(g + 1)/log(g_p + 1)', 'g' => 'pow(g_p + 1, q) - 1', 'g_p' => 'pow(g + 1, 1/q) - 1'],
        ],
        [
            'title' => 'return_status = run_calculator(Subject, FlowType, InDep, FinBal, CompFreq, PayFreq, t, StartDate, PerPay, Type, r, g, g_p)',
            'results' => ['return_status' => 'run_calculator(Subject, FlowType, InDep, FinBal, CompFreq, PayFreq, t, StartDate, PerPay, Type, r, g, g_p)'],
        ],
        [
            'title' => 'end_date = get_end_date()',
            'results' => ['end_date' => 'get_end_date()'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";var milisecondsInADay=24*60*60*1000;var final_balance_res,opening_bal_res,monthly_inout,total_inout,total_return,num_transactions,end_date,rate_of_return_res;omni.define("run_calculator",function(VarSub,VarFlow,InDep,FinBal,m,q,t,StartDate,PerPay,VarType,r,g,g_p){PerPay=PerPay*VarFlow;if(VarSub>3){g_p=0}var periods=q*t;if(r===0){r=1e-10}var eq_p=getPerEqRate(q,m,r);var DepBal=0;var FinPrincBal=0;var TotCashFlow=0;if(VarSub===1){DepBal=getBal(PerPay,periods,q,eq_p,g_p,g,VarType);FinPrincBal=FinBal-DepBal;InDep=getPV(FinPrincBal,eq_p,periods)}if(VarSub===2){DepBal=getBal(PerPay,periods,q,eq_p,g_p,g,VarType);FinPrincBal=getFV(InDep,eq_p,periods);FinBal=FinPrincBal+DepBal}if(VarSub===3){PerPay=getPerPay(InDep,FinBal,periods,q,eq_p,g_p,g,VarType)}if(VarSub===4){periods=getAnnuityPer(InDep,FinBal,PerPay,eq_p,VarType);if(periods===0){return-2}}if(VarSub===5){r=getIntRate(InDep,FinBal,PerPay,periods,m,q,VarType);eq_p=getPerEqRate(q,m,r/100);if(r===0){return-1}else{rate_of_return_res=r}}var periodsCount=0,date,daysInPeriod,daysPassed=0,TotInt=0,TotIntPer=0,iDep=0,TotBalOpen=0,InBalOpen=0,DepBalOpen=0;var periodsLoop=mathjs.floor(periods);if(VarSub===4){periodsLoop=mathjs.floor(periods+1)}for(var i=0;i<=periodsLoop;i++){if(i/q>100){return-1}date=new Date((StartDate+daysPassed)*milisecondsInADay);daysInPeriod=getDaysInPeriod(date,q);if(i>0){daysPassed+=daysInPeriod;periodsCount=i;InBalOpen=InDep*mathjs.pow(1+eq_p,i-1);DepBalOpen=getBal(PerPay,i-1,q,eq_p,g_p,g,VarType);TotBalOpen=InBalOpen+DepBalOpen;iDep=PerPay*mathjs.pow(1+g_p,i-1);if(VarType===1){TotIntPer=(TotBalOpen+iDep)*eq_p}else{TotIntPer=TotBalOpen*eq_p}TotInt+=TotIntPer;TotCashFlow+=iDep}}final_balance_res=FinBal;opening_bal_res=InDep;monthly_inout=mathjs.abs(PerPay);total_inout=mathjs.abs(TotCashFlow);total_return=TotInt;num_transactions=periodsCount;end_date=date.getTime();return 1});omni.define("get_final_balance_res",function(){return final_balance_res});omni.define("get_opening_bal_res",function(){return opening_bal_res});omni.define("get_monthly_inout",function(){return monthly_inout});omni.define("get_total_inout",function(){return total_inout});omni.define("get_total_return",function(){return total_return});omni.define("get_num_transactions",function(){return num_transactions});omni.define("get_end_date",function(){return end_date});omni.define("get_rate_of_return_res",function(){return rate_of_return_res});function getPerEqRate(q,m,r){var ex=Math.exp(1);var base;if(m===0){var continuous_r=mathjs.pow(ex,r)-1;m=1;base=1+continuous_r/m}else{base=1+r/m}var power=m/q;var eq_p=mathjs.pow(base,power)-1;return eq_p}function getPerPay(InBal,FinBal,periods,q,eq_p,g_p,g,VarType){var PerPay;var PrincBal=InBal*mathjs.pow(1+eq_p,periods);var DepBal=FinBal-PrincBal;if(g_p!==eq_p&&q!==1){PerPay=DepBal/((mathjs.pow(1+eq_p,periods)-mathjs.pow(1+g_p,periods))*(1+eq_p*VarType)/(eq_p-g_p))}else if(g!==eq_p&&q===1){PerPay=DepBal/((mathjs.pow(1+eq_p,periods)-mathjs.pow(1+g,periods))*(1+eq_p*VarType)/(eq_p-g))}else if(g_p===eq_p){PerPay=DepBal/(periods*mathjs.pow(1+eq_p,periods-1)*(1+eq_p*VarType))}return PerPay}function getBal(PerPay,periods,q,eq_p,g_p,g,VarType){var DepBal;if(g_p!==eq_p&&q!==1){DepBal=PerPay*(mathjs.pow(1+eq_p,periods)-mathjs.pow(1+g_p,periods))*(1+eq_p*VarType)/(eq_p-g_p)}else if(g!==eq_p&&q===1){DepBal=PerPay*(mathjs.pow(1+eq_p,periods)-mathjs.pow(1+g,periods))*(1+eq_p*VarType)/(eq_p-g)}else if(g_p===eq_p){DepBal=PerPay*periods*mathjs.pow(1+eq_p,periods-1)*(1+eq_p*VarType)}return DepBal}function getPV(FinPrincBal,eq_p,periods){var InBal=FinPrincBal/mathjs.pow(1+eq_p,periods);return InBal}function getIntRate(InBal,FinBal,PerPay,periods,m,q,VarType){var Max_iterations=50000;var Min_precision=1e-9;var ex=Math.exp(1);var APR_approx=0.1;var oldI;var newI=APR_approx;var iteration=0;do{oldI=newI;var dividend=InBal*mathjs.pow(newI+1,periods)+PerPay*(mathjs.pow(newI+1,periods)-1)*(1+newI*VarType)/newI-FinBal;var divisor=InBal*periods*mathjs.pow(newI+1,periods-1)+((PerPay*periods*mathjs.pow(newI+1,periods-1)*(1+newI*VarType)+PerPay*(mathjs.pow(newI+1,periods)-1))*newI-PerPay*(mathjs.pow(newI+1,periods)-1)*(1+newI*VarType))/mathjs.pow(newI,2);newI=newI-dividend/divisor;++iteration}while(mathjs.abs(oldI-newI)>Min_precision&&iteration<=Max_iterations);var eq_p=newI;var oldR;var newR=eq_p;do{oldR=newR;if(m===0){var dividendR=mathjs.pow(ex,newR/q)-1-eq_p;var divisorR=mathjs.pow(ex,newR/q)/q;newR=newR-dividendR/divisorR}else{var dividendR2=mathjs.pow(1+newR/m,m/q)-1-eq_p;var divisorR2=mathjs.pow(1+newR/m,m/q-1)/q;newR=newR-dividendR2/divisorR2}++iteration}while(mathjs.abs(oldR-newR)>Min_precision&&iteration<=Max_iterations);eq_p=newR/q;var r=eq_p*q*100;if(!(mathjs.abs(r)>0)){r=0}return r}function getAnnuityPer(InBal,FinBal,PerPay,eq_p,VarType){var periods=mathjs.log((eq_p*(FinBal+PerPay*VarType)+PerPay)/(eq_p*InBal+PerPay*(1+eq_p*VarType)))/mathjs.log(eq_p+1);if(periods<0){periods=0}return periods}function getFV(InBal,eq_p,periods){var FinPrincBal=InBal*mathjs.pow(1+eq_p,periods);return FinPrincBal}function getDaysInPeriod(date,q){var daysInMonth;var daysInPeriod;var DaysInYear;var DaysInNextYear;var day=date.getUTCDate();var month=date.getUTCMonth();var year=date.getUTCFullYear();if(day<29&&month===0){daysInMonth=31}else if(day===29&&month===0){daysInMonth=30}else if(day===30&&month===0){daysInMonth=29}else if(day===31&&month===0){daysInMonth=28}else if(day<29&&month===1){daysInMonth=28}else if(day===29&&month===1){daysInMonth=29}else if(day===30&&month===1){daysInMonth=30}else if(day===31&&month===1){daysInMonth=31}else if(day<31&&month===2){daysInMonth=31}else if(day===31&&month===2){daysInMonth=30}else if(day<31&&month===3){daysInMonth=30}else if(day===31&&month===3){daysInMonth=31}else if(day<31&&month===4){daysInMonth=31}else if(day===31&&month===4){daysInMonth=30}else if(day<31&&month===5){daysInMonth=30}else if(day===31&&month===5){daysInMonth=31}else if(day<31&&month===6){daysInMonth=31}else if(day===31&&month===6){daysInMonth=31}else if(day<31&&month===7){daysInMonth=31}else if(day===31&&month===7){daysInMonth=30}else if(day<31&&month===8){daysInMonth=30}else if(day===31&&month===8){daysInMonth=31}else if(day<31&&month===9){daysInMonth=31}else if(day===31&&month===9){daysInMonth=30}else if(day<31&&month===10){daysInMonth=30}else if(day===31&&month===10){daysInMonth=31}else if(day<31&&month===11){daysInMonth=31}else if(day===31&&month===11){daysInMonth=31}if(year%4===0&&year%100!==0&&date.getMonth()===1||year%400===0&&month===1){daysInMonth=29}if(year%4===0&&year%100!==0&&month===0&&date.getDate()===30||year%400===0&&month===0&&date.getDate()===30){daysInMonth=30}if(year%4===0&&year%100!==0&&month===0&&date.getDate()===31||year%400===0&&month===0&&date.getDate()===31){daysInMonth=29}if(year%4===0&&year%100!==0&&month===0&&date.getDate()===29||year%400===0&&month===0&&date.getDate()===29){daysInMonth=31}if(date.getDate()===29&&date.getMonth()===1&&day>29){daysInMonth=30}if(date.getDate()===29&&date.getMonth()===1&&day>30){daysInMonth=31}if(date.getDate()===28&&date.getMonth()===1&&day>30){daysInMonth=31}if(year%4===0&&year%100!==0||year%400===0){DaysInYear=366}else{DaysInYear=365}if((year+1)%4===0&&(year+1)%100!==0||(year+1)%400===0){DaysInNextYear=366}else{DaysInNextYear=365}if(q===1){daysInPeriod=DaysInYear}if(q===2){daysInPeriod=DaysInYear/2}if(q===12){daysInPeriod=daysInMonth}if(q===26){daysInPeriod=14}if(q===52){daysInPeriod=7}if(q===365){daysInPeriod=1}if(q===4){if(month<=1&&DaysInYear===366){daysInPeriod=90}else if(month<=1&&DaysInYear===365){daysInPeriod=89}else if(month===11&&DaysInNextYear===366){daysInPeriod=92}else if(month===11&&DaysInNextYear===365){daysInPeriod=91}else if(month===2||month===4||month===6||month===7||month===9||month===10){daysInPeriod=92}else if(month===3||month===5||month===8){daysInPeriod=91}if(day===31&&(month===2||month===7)){daysInPeriod=91}if(day===30&&(month===3||month===8||month===5)){daysInPeriod=92}if(day===31&&month===0&&DaysInYear===365){daysInPeriod=89}if(day===31&&month===0&&DaysInYear===366){daysInPeriod=90}if(day===31&&(month===4||month===9)){daysInPeriod=92}if(day>=30&&month>=10&&DaysInNextYear===366){daysInPeriod=91}if(day>=30&&month>=10&&DaysInNextYear===365){daysInPeriod=90}if(day===28&&month===1&&DaysInYear===365){daysInPeriod=92}if(day===28&&month===1&&DaysInYear===366){daysInPeriod=93}if(day===29&&month===1){daysInPeriod=92}}return daysInPeriod}//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Annuity turns Subject of interest, Direction of payment and Annuity payment frequency into Annuity frequency and Pay Freq name. There is no hidden constant here: change annuity frequency and subject of interest moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Annuity calculator works', 'html' => <<<'TXT'
            <p>The Annuity calculator applies one relationship to 16 numbers and reports Annuity frequency and Pay Freq name.</p><p>The relationship it solves reads Annuity frequency = ln(Annual growth rate + 1) ÷ ln(Periodic growth rate + 1).</p><p>The answers are Annuity frequency and Pay Freq name; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 16 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Subject of interest</strong> — a plain number, no unit. The initial balance is the present value (PV), the final balance refers to the future value (FV) of the annuity. Annuity amount is the periodic deposit or withdrawal.</li><li><strong>Direction of payment</strong> — a plain number, no unit</li><li><strong>Annuity payment frequency</strong> — a plain number, no unit</li><li><strong>Type of annuity</strong> — a plain number, no unit. Ordinary annuity: end of periods; annuity due: beginning of periods.</li><li><strong>Compounding frequency</strong> — a plain number, no unit. The frequency with which interest is added to (capitalized on) the balance.</li><li><strong>First period starts from…</strong> — a plain number, no unit, entered as a date</li><li><strong>Initial deposit</strong> — in USD. The opening balance - The present value (FV) of the annuity.</li><li><strong>Final balance</strong> — in USD. The future value (FV) of the annuity.</li><li><strong>Annuity amount</strong> — in USD. Periodic payment (cash-flow) which is either deposit (contribution) or withdrawal (payout).</li><li><strong>Length of annuity</strong> — in years</li><li><strong>Rate of return</strong> — in percent. Or annual interest rate.</li><li><strong>Annual growth rate</strong> — in percent. The percentage growth rate of your additional periodic deposits or withdrawals over a year.</li><li><strong>Periodic growth rate</strong> — in percent. The percentage growth rate of the periodic deposits of withdrawals. Note that periodic and annual growth rates are linked together: the other will be calculated according to annuity frequency if you set one.</li><li><strong>M</strong> — a plain number, no unit</li><li><strong>Return status</strong> — a plain number, no unit</li><li><strong>End date</strong> — a plain number, no unit, entered as a date</li></ul><p>What you get back is Annuity frequency, Pay Freq name, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Length of annuity offers 5 units and opens on years, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Annuity frequency</strong> = <code>ln(Annual growth rate + 1) ÷ ln(Periodic growth rate + 1)</code></li><li><strong>Annual growth rate</strong> = <code>(Periodic growth rate + 1)^(Annuity frequency) − 1</code></li><li><strong>Periodic growth rate</strong> = <code>(Annual growth rate + 1)^(1 ÷ Annuity frequency) − 1</code></li><li><strong>End date</strong> = <code>get_end_date()</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Annuity frequency</strong> = <code>ln(Annual growth rate + 1) ÷ ln(Periodic growth rate + 1)</code> — the form to use when Annual growth rate and Periodic growth rate are the values you have.</li><li><strong>Annual growth rate</strong> = <code>(Periodic growth rate + 1)^(Annuity frequency) − 1</code> — the form to use when Periodic growth rate and Annuity frequency are the values you have.</li><li><strong>Periodic growth rate</strong> = <code>(Annual growth rate + 1)^(1 ÷ Annuity frequency) − 1</code> — the form to use when Annual growth rate and Annuity frequency are the values you have.</li><li><strong>End date</strong> = <code>get_end_date()</code> — the form to use when the other values are known.</li></ul><p>Any one of Annuity frequency, Annual growth rate and Periodic growth rate can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Length of annuity, Rate of return and Annual growth rate is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Annuity frequency and Pay Freq name are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Subject of interest left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Subject of interest is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Direction of payment left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Direction of payment is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Subject of interest is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Annuity form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Subject of interest</strong> takes a plain number with no unit attached. The initial balance is the present value (PV), the final balance refers to the future value (FV) of the annuity. Annuity amount is the periodic deposit or withdrawal. It feeds Return status. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Subject of interest is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Direction of payment</strong> takes a plain number with no unit attached. It feeds Return status. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Direction of payment is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Annuity payment frequency</strong> takes a plain number with no unit attached. It feeds Return status. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Annuity payment frequency is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Type of annuity</strong> takes a plain number with no unit attached. Ordinary annuity: end of periods; annuity due: beginning of periods. It feeds Return status. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Type of annuity is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Compounding frequency</strong> takes a plain number with no unit attached. The frequency with which interest is added to (capitalized on) the balance. It feeds Return status. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Compounding frequency is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>First period starts from…</strong> takes a plain number with no unit attached. It feeds Return status. Fill it from a measurement rather than a memory — First period starts from… is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Initial deposit</strong> takes a plain number with no unit attached. The opening balance - The present value (FV) of the annuity. It feeds Return status. Fill it from a measurement rather than a memory — Initial deposit is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Final balance</strong> takes a plain number with no unit attached. The future value (FV) of the annuity. It feeds Return status. Fill it from a measurement rather than a memory — Final balance is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Annuity amount</strong> takes a plain number with no unit attached. Periodic payment (cash-flow) which is either deposit (contribution) or withdrawal (payout). It feeds Return status. Fill it from a measurement rather than a memory — Annuity amount is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Length of annuity</strong> is a years quantity: the page opens it in yrs and converts anything else you pick before the formula runs. It feeds Return status. Fill it from a measurement rather than a memory — Length of annuity is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Rate of return</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Or annual interest rate. It feeds Return status. Fill it from a measurement rather than a memory — Rate of return is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Annual growth rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The percentage growth rate of your additional periodic deposits or withdrawals over a year. It feeds Annuity frequency, Periodic growth rate and Return status. Fill it from a measurement rather than a memory — Annual growth rate is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Periodic growth rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The percentage growth rate of the periodic deposits of withdrawals. Note that periodic and annual growth rates are linked together: the other will be calculated according to annuity frequency if you set one. It feeds Annuity frequency, Annual growth rate and Return status. Fill it from a measurement rather than a memory — Periodic growth rate is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>M</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — M is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Return status</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Return status is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>End date</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — End date is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Annuity frequency is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The chips cover years and percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It counts in whole days.</strong> The differences are counted in whole days, so an answer is a date or a number of days rather than an interval in hours. Expect a day&#039;s uncertainty if the event itself happened at an unknown time.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Subject of interest, Direction of payment and Annuity payment frequency measured, Annuity frequency and Pay Freq name wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/loan-repayment">Loan repayment Calculator</a>, <a href="/finance/long-term-care">Long term care</a> and <a href="/finance/lgd">Loss given default Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Annuity calculator work out?', 'a' => <<<'TXT'
            Annuity frequency and Pay Freq name, from Annual growth rate and Periodic growth rate. The relationship is Annuity frequency = ln(Annual growth rate + 1) ÷ ln(Periodic growth rate + 1).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Subject of interest, Direction of payment, Annuity payment frequency, Type of annuity, Compounding frequency. Fill subject of interest, direction of payment and annuity payment frequency and leave Annuity frequency empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Annuity frequency, Annual growth rate, Periodic growth rate and Return status blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Annuity frequency is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Subject of interest blank and the page solves for it, reporting Annuity frequency instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Annuity frequency keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/loan-repayment', 'name' => 'Loan repayment Calculator'],
            ['path' => '/finance/long-term-care', 'name' => 'Long term care'],
            ['path' => '/finance/lgd', 'name' => 'Loss given default Calculator'],
        ],
        'authors' => [],
    ],
];
