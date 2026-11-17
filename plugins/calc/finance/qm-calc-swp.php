<?php

/**
 * SWP (India)
 * /finance/swp
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'SWP (India)',
    'meta' => ['title' => 'SWP (India) Calculator — Formula, Units & Example', 'description' => 'SWP (India) turns i\'d like to know..., Your SWP investment and how much? into return status and last withdrawal. The formula is printed in the form\'s own words.', 'h1' => 'SWP (India) Calculator', 'updated' => '2026-09-08'],
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
                            'label' => 'I\'d like to know...',
                            'type' => 'select',
                            'options' => [
                                'what should be my initial investment?' => '1',
                                'how much can I withdraw?' => '3',
                                'how long will my SWP last?' => '4',
                                'what will be my final balance?' => '2',
                                'what rate of return do I need?' => '5',
                            ],
                            'dataset' => 'Subject',
                            'default' => 'what should be my initial investment?',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'InDep',
                            'label' => 'Your SWP investment',
                            'type' => 'number',
                            'help' => 'The opening balance of your SWP.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '100000',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Systematic withdrawal specification',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PerPay',
                            'label' => 'How much?',
                            'type' => 'number',
                            'help' => 'Periodic withdrawal.',
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
                            'name' => 'PayFreq_q',
                            'label' => 'How often?',
                            'type' => 'select',
                            'options' => ['Yearly' => '1', 'Semi-annually' => '2', 'Quarterly' => '4', 'Monthly' => '12'],
                            'dataset' => 'q',
                            'control' => 'DROPDOWN',
                            'default' => 'Monthly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 't',
                            'label' => 'How long?',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'r',
                            'label' => 'What rate of return do you expect?',
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
                            'label' => 'Inflation rate',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            If you set an inflation rate, your periodic withdrawal will be adjusted by inflation over the term (the option is not available when estimating the length of withdrawal or approximating the required rate of return).
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
                        ['name' => 'StartDate', 'label' => 'First withdrawal on...', 'type' => 'date'],
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
                                ['when' => 'Subject == 1', 'text' => 'You should have an SWP investment of {{initial_balance.monetaryValue}} to be able to make the specified withdrawals.'],
                                ['when' => 'Subject == 3 and g == 0', 'text' => 'You can withdraw {{withdrawal.monetaryValue}} at the beginning of each {{how_often.uiValue}} to deplete your SWP entirely.'],
                                ['when' => 'Subject == 3 and g > 0', 'text' => 'You can withdraw {{withdrawal.monetaryValue}} initially and increase it gradually to reach the final balance.'],
                                ['when' => 'Subject == 3 and g < 0', 'text' => 'You can withdraw {{withdrawal.monetaryValue}} initially and decrease it gradually to reach the final balance.'],
                                ['when' => 'Subject == 3 and return_status == -4', 'text' => 'We can\'t proceed with the computation with the the given setup.'],
                                ['when' => 'Subject == 4 and hasValue(last_for_months)', 'text' => 'Your SWP will last for {{last_for_yrs.value}}&nbsp;years and {{last_for_mos.value}}&nbsp;months.'],
                                ['when' => 'Subject == 4 and return_status == -1', 'text' => <<<'TXT'
                                The time length cannot be estimated with the given setup. The length of withdrawal is infinite since the quarterly interest-earning exceeds the withdrawal amount.
                                TXT],
                                ['when' => 'Subject == 2 and final_balance > 0', 'text' => 'The final balance of your SWP will be {{final_balance.monetaryValue}}.'],
                                ['when' => 'Subject == 2 and final_balance == 0', 'text' => 'You will deplete your SWP entirely in {{last_for_yrs.value}}&nbsp;years and {{last_for_mos.value}}&nbsp;months.'],
                                ['when' => 'Subject == 5 and return_status == 1', 'text' => 'To make the specified withdrawals, your SWP\'s rate of return should be at least {{rate_of_return.formattedValue}}%.'],
                                ['when' => 'Subject == 5 and return_status == -2', 'text' => 'The rate of return cannot be estimated with the given setup.'],
                                ['when' => 'Subject == 5 and return_status == -3', 'text' => 'You can withdraw the given amount periodically without receiving any return on your investment.'],
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
                            'name' => 'FlowType',
                            'label' => 'Direction of payment',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'g_p',
                            'label' => 'Growth rate of periodic withdrawal',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            The percentage growth rate of the periodic withdrawals. Note that periodic and annual growth rates are linked together: the other will be calculated according to withdrawal frequency if you set one.
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
                            'name' => 'CompFreq',
                            'label' => 'Compounding frequency',
                            'type' => 'number',
                            'help' => 'The frequency with which interest is added to (capitalized on) the balance.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Type',
                            'label' => 'Type of annuity',
                            'type' => 'number',
                            'help' => 'Ordinary annuity: end of periods; annuity due: beginning of periods.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Timing',
                            'label' => 'Set term by...',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'FinBal',
                            'label' => 'What will be my final balance?',
                            'type' => 'number',
                            'help' => 'The future value (FV) of the annuity.',
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
                            'name' => 'Infl',
                            'label' => 'Inflation rate',
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
                        ['name' => 'EndDate', 'label' => 'Final payout on...', 'type' => 'date'],
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
                        ['name' => 'last_withdrawal', 'label' => 'Last withdrawal', 'type' => 'date'],
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
                            'name' => 'initial_balance',
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
                            'name' => 'final_balance',
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
                            'name' => 'withdrawal',
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
                            'name' => 'how_often',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'last_for_months',
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
                            'name' => 'last_for_yrs',
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
                            'name' => 'last_for_mos',
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
                            'name' => 'rate_of_return',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_withdrawal',
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
                            'name' => 'num_withdrawals',
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
            'title' => 'g + 1= (1 + g_p) ^ PayFreq_q',
            'results' => ['g' => 'pow(g_p + 1, PayFreq_q) - 1', 'PayFreq_q' => 'log(g + 1)/log(g_p + 1)', 'g_p' => 'pow(g + 1, 1/PayFreq_q) - 1'],
        ],
        [
            'title' => 'return_status = run_calculator(Subject, InDep, PerPay, PayFreq_q, t, r, g, g_p, StartDate)',
            'results' => ['return_status' => 'run_calculator(Subject, InDep, PerPay, PayFreq_q, t, r, g, g_p, StartDate)'],
        ],
        [
            'title' => 'last_withdrawal = get_last_withdrawal()',
            'results' => ['last_withdrawal' => 'get_last_withdrawal()'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";var m=12,VarType=1,millisecondsInADay=24*60*60*1000;var initial_balance,final_balance,withdrawal,last_for_months,rate_of_return,total_withdrawal,total_return,num_withdrawals,last_withdrawal;omni.define("run_calculator",function(VarSub,InDep,PerPay,q,t,r,g,g_p,StartDate){var periods=q*t;if(r===0){r=1e-10}var eq_p=getPerEqRate(q,m,r);var DepBal=0;var FinPrincBal=0;var FinBal=0;PerPay=-PerPay;if(VarSub===1){DepBal=getBal(PerPay,periods,q,eq_p,g_p,g,VarType);FinPrincBal=FinBal-DepBal;InDep=getPV(FinPrincBal,eq_p,periods)}if(VarSub===2){DepBal=getBal(PerPay,periods,q,eq_p,g_p,g,VarType);FinPrincBal=getFV(InDep,eq_p,periods);FinBal=FinPrincBal+DepBal;if(FinBal<0){FinBal=0;periods=getAnnuityPer(InDep,FinBal,PerPay,q,eq_p,VarType)}}if(VarSub===3){PerPay=-getPerPay(InDep,FinBal,periods,q,eq_p,g_p,g,VarType);if(PerPay<0.01){return-4}}if(VarSub===4){periods=getAnnuityPer(InDep,FinBal,PerPay,eq_p,VarType);if(isNaN(periods)){return-1}}if(VarSub===5){r=getIntRate(InDep,FinBal,PerPay,periods,m,q,VarType);eq_p=getPerEqRate(q,m,r/100);if(r===0){return-2}if(r<0){return-3}}var iDep=0,TotCashFlow=0,InBalOpen=0,DepBalOpen=0,TotIntPer=0,TotBalOpen=0,TotInt=0,periodsCount=0,date,daysPassed=0,daysInPeriod;var periodsLoop=mathjs.floor(periods);if(VarSub===4||VarSub===2&&FinBal===0){periodsLoop=mathjs.floor(periods+1)}for(var i=0;i<=periodsLoop;i++){date=new Date((StartDate+daysPassed)*millisecondsInADay);daysInPeriod=getDaysInPeriod(date,q);if(i>0){daysPassed+=daysInPeriod;InBalOpen=InDep*mathjs.pow(1+eq_p,i-1);DepBalOpen=getBal(PerPay,i-1,q,eq_p,g_p,g,VarType);TotBalOpen=InBalOpen+DepBalOpen;iDep=PerPay*mathjs.pow(1+g_p,i-1);TotIntPer=(TotBalOpen+iDep)*eq_p;TotInt+=TotIntPer;periodsCount=i;TotCashFlow+=iDep}}initial_balance=InDep;final_balance=FinBal;withdrawal=mathjs.abs(PerPay);last_for_months=periods/q*12;rate_of_return=r;total_withdrawal=mathjs.abs(TotCashFlow);total_return=TotInt;num_withdrawals=periodsCount;last_withdrawal=date.getTime();return 1});omni.define("get_initial_balance",function(){return initial_balance});omni.define("get_final_balance",function(){return final_balance});omni.define("get_withdrawal",function(){return withdrawal});omni.define("get_last_for_months",function(){return last_for_months});omni.define("get_rate_of_return",function(){return rate_of_return});omni.define("get_total_withdrawal",function(){return total_withdrawal});omni.define("get_total_return",function(){return total_return});omni.define("get_num_withdrawals",function(){return num_withdrawals});omni.define("get_last_withdrawal",function(){return last_withdrawal});function getPerEqRate(q,m,r){var ex=Math.exp(1);var base;if(m===0){var continuous_r=mathjs.pow(ex,r)-1;m=1;base=1+continuous_r/m}else{base=1+r/m}var power=m/q;var eq_p=mathjs.round(mathjs.pow(base,power)-1,10);return eq_p}function getPV(FinPrincBal,eq_p,periods){var InBal=FinPrincBal/mathjs.pow(1+eq_p,periods);return InBal}function getBal(PerPay,periods,q,eq_p,g_p,g,VarType){var DepBal;if(g_p!==eq_p&&q!==1){DepBal=PerPay*(mathjs.pow(1+eq_p,periods)-mathjs.pow(1+g_p,periods))*(1+eq_p*VarType)/(eq_p-g_p)}else if(g!==eq_p&&q===1){DepBal=PerPay*(mathjs.pow(1+eq_p,periods)-mathjs.pow(1+g,periods))*(1+eq_p*VarType)/(eq_p-g)}else if(g_p===eq_p){DepBal=PerPay*periods*mathjs.pow(1+eq_p,periods-1)*(1+eq_p*VarType)}return DepBal}function getAnnuityPer(InBal,FinBal,PerPay,eq_p,VarType){var periods=mathjs.log((eq_p*(FinBal+PerPay*VarType)+PerPay)/(eq_p*InBal+PerPay*(1+eq_p*VarType)))/mathjs.log(eq_p+1);if(periods<0){periods=0}return periods}function getFV(InBal,eq_p,periods){var FinPrincBal=InBal*mathjs.pow(1+eq_p,periods);return FinPrincBal}function getPerPay(InBal,FinBal,periods,q,eq_p,g_p,g,VarType){var PerPay;var PrincBal=InBal*mathjs.pow(1+eq_p,periods);var DepBal=FinBal-PrincBal;if(g_p!==eq_p&&q!==1){PerPay=DepBal/((mathjs.pow(1+eq_p,periods)-mathjs.pow(1+g_p,periods))*(1+eq_p*VarType)/(eq_p-g_p))}else if(g!==eq_p&&q===1){PerPay=DepBal/((mathjs.pow(1+eq_p,periods)-mathjs.pow(1+g,periods))*(1+eq_p*VarType)/(eq_p-g))}else if(g_p===eq_p){PerPay=DepBal/(periods*mathjs.pow(1+eq_p,periods-1)*(1+eq_p*VarType))}return PerPay}function getIntRate(InBal,FinBal,PerPay,periods,m,q,VarType){var Max_iterations=50000;var Min_precision=1e-9;var ex=Math.exp(1);var APR_approx=0.1;var oldI;var newI=APR_approx;var iteration=0;do{oldI=newI;var dividend=InBal*mathjs.pow(newI+1,periods)+PerPay*(mathjs.pow(newI+1,periods)-1)*(1+newI*VarType)/newI-FinBal;var divisor=InBal*periods*mathjs.pow(newI+1,periods-1)+((PerPay*periods*mathjs.pow(newI+1,periods-1)*(1+newI*VarType)+PerPay*(mathjs.pow(newI+1,periods)-1))*newI-PerPay*(mathjs.pow(newI+1,periods)-1)*(1+newI*VarType))/mathjs.pow(newI,2);newI=newI-dividend/divisor;++iteration}while(mathjs.abs(oldI-newI)>Min_precision&&iteration<=Max_iterations);var eq_p=newI;var oldR;var newR=eq_p;do{oldR=newR;if(m===0){var dividendR=mathjs.pow(ex,newR/q)-1-eq_p;var divisorR=mathjs.pow(ex,newR/q)/q;newR=newR-dividendR/divisorR}else{var dividendR2=mathjs.pow(1+newR/m,m/q)-1-eq_p;var divisorR2=mathjs.pow(1+newR/m,m/q-1)/q;newR=newR-dividendR2/divisorR2}++iteration}while(mathjs.abs(oldR-newR)>Min_precision&&iteration<=Max_iterations);eq_p=newR/q;var r=eq_p*q*100;if(!(mathjs.abs(r)>0)){r=0}return r}function getDaysInPeriod(date,q){var daysInMonth;var daysInPeriod;var DaysInYear;var DaysInNextYear;var day=date.getUTCDate();var month=date.getUTCMonth();var year=date.getUTCFullYear();if(day<29&&month===0){daysInMonth=31}else if(day===29&&month===0){daysInMonth=30}else if(day===30&&month===0){daysInMonth=29}else if(day===31&&month===0){daysInMonth=28}else if(day<29&&month===1){daysInMonth=28}else if(day===29&&month===1){daysInMonth=29}else if(day===30&&month===1){daysInMonth=30}else if(day===31&&month===1){daysInMonth=31}else if(day<31&&month===2){daysInMonth=31}else if(day===31&&month===2){daysInMonth=30}else if(day<31&&month===3){daysInMonth=30}else if(day===31&&month===3){daysInMonth=31}else if(day<31&&month===4){daysInMonth=31}else if(day===31&&month===4){daysInMonth=30}else if(day<31&&month===5){daysInMonth=30}else if(day===31&&month===5){daysInMonth=31}else if(day<31&&month===6){daysInMonth=31}else if(day===31&&month===6){daysInMonth=31}else if(day<31&&month===7){daysInMonth=31}else if(day===31&&month===7){daysInMonth=30}else if(day<31&&month===8){daysInMonth=30}else if(day===31&&month===8){daysInMonth=31}else if(day<31&&month===9){daysInMonth=31}else if(day===31&&month===9){daysInMonth=30}else if(day<31&&month===10){daysInMonth=30}else if(day===31&&month===10){daysInMonth=31}else if(day<31&&month===11){daysInMonth=31}else if(day===31&&month===11){daysInMonth=31}if(year%4===0&&year%100!==0&&date.getMonth()===1||year%400===0&&month===1){daysInMonth=29}if(year%4===0&&year%100!==0&&month===0&&date.getDate()===30||year%400===0&&month===0&&date.getDate()===30){daysInMonth=30}if(year%4===0&&year%100!==0&&month===0&&date.getDate()===31||year%400===0&&month===0&&date.getDate()===31){daysInMonth=29}if(year%4===0&&year%100!==0&&month===0&&date.getDate()===29||year%400===0&&month===0&&date.getDate()===29){daysInMonth=31}if(date.getDate()===29&&date.getMonth()===1&&day>29){daysInMonth=30}if(date.getDate()===29&&date.getMonth()===1&&day>30){daysInMonth=31}if(date.getDate()===28&&date.getMonth()===1&&day>30){daysInMonth=31}if(year%4===0&&year%100!==0||year%400===0){DaysInYear=366}else{DaysInYear=365}if((year+1)%4===0&&(year+1)%100!==0||(year+1)%400===0){DaysInNextYear=366}else{DaysInNextYear=365}if(q===1){daysInPeriod=DaysInYear}if(q===2){daysInPeriod=DaysInYear/2}if(q===12){daysInPeriod=daysInMonth}if(q===26){daysInPeriod=14}if(q===52){daysInPeriod=7}if(q===365){daysInPeriod=1}if(q===4){if(month<=1&&DaysInYear===366){daysInPeriod=90}else if(month<=1&&DaysInYear===365){daysInPeriod=89}else if(month===11&&DaysInNextYear===366){daysInPeriod=92}else if(month===11&&DaysInNextYear===365){daysInPeriod=91}else if(month===2||month===4||month===6||month===7||month===9||month===10){daysInPeriod=92}else if(month===3||month===5||month===8){daysInPeriod=91}if(day===31&&(month===2||month===7)){daysInPeriod=91}if(day===30&&(month===3||month===8||month===5)){daysInPeriod=92}if(day===31&&month===0&&DaysInYear===365){daysInPeriod=89}if(day===31&&month===0&&DaysInYear===366){daysInPeriod=90}if(day===31&&(month===4||month===9)){daysInPeriod=92}if(day>=30&&month>=10&&DaysInNextYear===366){daysInPeriod=91}if(day>=30&&month>=10&&DaysInNextYear===365){daysInPeriod=90}if(day===28&&month===1&&DaysInYear===365){daysInPeriod=92}if(day===28&&month===1&&DaysInYear===366){daysInPeriod=93}if(day===29&&month===1){daysInPeriod=92}}return daysInPeriod}//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        SWP (India) turns I'd like to know…, Your SWP investment and How much? into How often. There is no hidden constant here: change how often and i'd like to know… moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the SWP (India) calculator works', 'html' => <<<'TXT'
            <p>The SWP (India) calculator applies one relationship to 19 numbers and reports How often.</p><p>Written with the labels from the form, Inflation rate = (Growth rate of periodic withdrawal + 1)^(How often?) − 1.</p><p>The answers are How often; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 19 boxes and the page has everything it needs.</p><ul><li><strong>I&#039;d like to know…</strong> — a plain number, no unit</li><li><strong>Your SWP investment</strong> — in USD. The opening balance of your SWP.</li><li><strong>How much?</strong> — in USD. Periodic withdrawal.</li><li><strong>How often?</strong> — a plain number, no unit</li><li><strong>How long?</strong> — in years</li><li><strong>What rate of return do you expect?</strong> — in percent. Or annual interest rate.</li><li><strong>Inflation rate</strong> — in percent. If you set an inflation rate, your periodic withdrawal will be adjusted by inflation over the term (the option is not available when estimating the length of withdrawal or approximating the required rate of return).</li><li><strong>First withdrawal on…</strong> — a plain number, no unit, entered as a date</li><li><strong>Direction of payment</strong> — a plain number, no unit</li><li><strong>Growth rate of periodic withdrawal</strong> — in percent. The percentage growth rate of the periodic withdrawals. Note that periodic and annual growth rates are linked together: the other will be calculated according to withdrawal frequency if you set one.</li><li><strong>M</strong> — a plain number, no unit</li><li><strong>Compounding frequency</strong> — a plain number, no unit. The frequency with which interest is added to (capitalized on) the balance.</li><li><strong>Type of annuity</strong> — a plain number, no unit. Ordinary annuity: end of periods; annuity due: beginning of periods.</li><li><strong>Set term by…</strong> — a plain number, no unit</li><li><strong>What will be my final balance?</strong> — in USD. The future value (FV) of the annuity.</li><li><strong>Inflation rate</strong> — in percent</li><li><strong>Final payout on…</strong> — a plain number, no unit, entered as a date</li><li><strong>Return status</strong> — a plain number, no unit</li><li><strong>Last withdrawal</strong> — a plain number, no unit, entered as a date</li></ul><p>What you get back is How often, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, I&amp;#039;d like to know… = 1, Your SWP investment = 100000 USD, How much? = 1000 USD, How long? = 10 yrs, What rate of return do you expect? = 5 perc, Direction of payment = 7, M = 8, Compounding frequency = 9, Type of annuity = 10, Set term by… = 2, What will be my final balance? = 3 USD, Inflation rate = 4 perc, First withdrawal on… = Sun 1 March 2026, Final payout on… = Sun 1 March 2026 and Last withdrawal = Sun 1 March 2026 gives <strong>How often?</strong> = 12.</p><ul><li><strong>How often?</strong> = 12</li></ul><p>The line behind those figures is <strong>Inflation rate</strong> = <code>(Growth rate of periodic withdrawal + 1)^(How often?) − 1</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>How often?</strong> = 12 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: How long? offers 5 units and opens on years, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Inflation rate</strong> = <code>(Growth rate of periodic withdrawal + 1)^(How often?) − 1</code></li><li><strong>How often?</strong> = <code>ln(Inflation rate + 1) ÷ ln(Growth rate of periodic withdrawal + 1)</code></li><li><strong>Growth rate of periodic withdrawal</strong> = <code>(Inflation rate + 1)^(1 ÷ How often?) − 1</code></li><li><strong>Return status</strong> = <code>run_calculator(I&#039;d like to know..., Your SWP investment, How much?, How often?, How long?, What rate of return do you expect?, Inflation rate, Growth rate of periodic withdrawal, First withdrawal on...)</code></li><li><strong>Last withdrawal</strong> = <code>get_last_withdrawal()</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Inflation rate</strong> = <code>(Growth rate of periodic withdrawal + 1)^(How often?) − 1</code> — the form to use when Growth rate of periodic withdrawal and How often? are the values you have.</li><li><strong>How often?</strong> = <code>ln(Inflation rate + 1) ÷ ln(Growth rate of periodic withdrawal + 1)</code> — the form to use when Inflation rate and Growth rate of periodic withdrawal are the values you have.</li><li><strong>Growth rate of periodic withdrawal</strong> = <code>(Inflation rate + 1)^(1 ÷ How often?) − 1</code> — the form to use when Inflation rate and How often? are the values you have.</li><li><strong>Return status</strong> = <code>run_calculator(I&#039;d like to know..., Your SWP investment, How much?, How often?, How long?, What rate of return do you expect?, Inflation rate, Growth rate of periodic withdrawal, First withdrawal on...)</code> — the form to use when I&#039;d like to know…, Your SWP investment, How much? and How often? are the values you have.</li><li><strong>Last withdrawal</strong> = <code>get_last_withdrawal()</code> — the form to use when the other values are known.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Inflation rate, How often? and Growth rate of periodic withdrawal can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double I&#039;d like to know... from 1 to 2, leaving every other box alone. The panel moves from <strong>How often?</strong> 12 to <strong>How often?</strong> 12.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside How long?, What rate of return do you expect? and Inflation rate is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with How often is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>I&#039;d like to know… left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If I&amp;#039;d like to know… is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Your SWP investment left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Your SWP investment is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If I&#039;d like to know... is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have I&#039;d like to know…, Your SWP investment, How much? and How often? ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with I&amp;#039;d like to know… — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check How often against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> How often is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The chips cover years and percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It counts in whole days.</strong> The differences are counted in whole days, so an answer is a date or a number of days rather than an interval in hours. Expect a day&#039;s uncertainty if the event itself happened at an unknown time.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: I&#039;d like to know…, Your SWP investment and How much? measured, How often wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/mortgage">Mortgage Calculator</a>, <a href="/finance/mortgage-interest">Mortgage interest</a> and <a href="/finance/mortgage-payoff">Mortgage payoff Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>SWP (India) is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the SWP (India) calculator work out?', 'a' => <<<'TXT'
            How often, from Growth rate of periodic withdrawal and How often?. The relationship is Inflation rate = (Growth rate of periodic withdrawal + 1)^(How often?) − 1.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            I'd like to know…, Your SWP investment (USD), How much? (USD), How often?, How long? (years). With i'd like to know…, your SWP investment and how much? in place, How often can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Inflation rate, How often?, Growth rate of periodic withdrawal and Return status can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'How often? = 12. That comes from the page\'s own defaults, entered in I\'d like to know...; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of How often is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave I\'d like to know... blank and the page solves for it, reporting How often instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to How often at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/mortgage', 'name' => 'Mortgage Calculator'],
            ['path' => '/finance/mortgage-interest', 'name' => 'Mortgage interest'],
            ['path' => '/finance/mortgage-payoff', 'name' => 'Mortgage payoff Calculator'],
        ],
        'authors' => [],
    ],
];
