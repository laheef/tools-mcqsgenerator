<?php

/**
 * Lumpsum (India)
 * /finance/lumpsum
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Lumpsum (India)',
    'meta' => ['title' => 'Lumpsum (India) — Formula, Steps & Examples', 'description' => 'Lumpsum (India) works out return status from i\'d like to know the.... The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Lumpsum (India) Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => 'Lumpsum inputs',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Subject',
                            'label' => 'I\'d like to know the...',
                            'type' => 'select',
                            'options' => ['initial lumpsum' => '1', 'final balance' => '2', 'required period' => '4', 'required rate of return' => '5'],
                            'dataset' => 'mode',
                            'control' => 'DROPDOWN',
                            'default' => 'initial lumpsum',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'InDep',
                            'label' => 'Initial lumpsum',
                            'type' => 'number',
                            'help' => 'The present value of your investment.',
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
                            'name' => 'FinBal',
                            'label' => 'Your goal',
                            'type' => 'number',
                            'help' => 'In today\'s purchasing power.',
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
                            'name' => 'r',
                            'label' => 'Expected rate of return',
                            'type' => 'number',
                            'help' => 'Annual nominal interest rate.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
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
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'StartDate', 'label' => 'Start date', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Infl',
                            'label' => 'Inflation rate',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            The annual rate of inflation. Note, that you can set a negative value if you expect a fall in the general price level during the set interval, representing deflationary pressures.
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
                            'dataset' => 'compound freq',
                            'control' => 'DROPDOWN',
                            'help' => 'The frequency interest is added to the principal balance of your savings, or, in other words, how often the earned return or interest is reinvested.&nbsp;',
                            'default' => 'Monthly',
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
                                ['when' => 't_res == 0', 'text' => 'The time length cannot be estimated with the given setup.&nbsp;'],
                                ['when' => 'return_status == -1', 'text' => 'The maximum length for the computation is 100 years.'],
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
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'Subject == 1', 'text' => 'You must invest {{inital_lumpsum_res.monetaryValue}} initially to reach the desired balance.'],
                                ['when' => 'Subject == 2 and Infl == 0', 'text' => 'The final balance of your investment will be {{final_balance_res.monetaryValue}} at the end of the term.'],
                                ['when' => 'Subject == 2 and Infl != 0', 'text' => <<<'TXT'
                                The final balance of your investment will be {{final_balance_res.monetaryValue}} at the end of the term, which will have the purchasing power of {{final_balance_infl_res.monetaryValue}} after adjusting for inflation.
                                TXT],
                                ['when' => 'Subject == 4', 'text' => 'You must wait {{t_res_yrs.value}} year(s) and {{t_res_mos.value}}&nbsp;month(s) to reach the desired final balance.'],
                                ['when' => 'Subject == 5', 'text' => 'Your investment\'s required rate of return is at least {{rate_of_return_res.value}}% to reach the desired balance.'],
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
                        ['name' => 'Today', 'label' => 'Today', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'g',
                            'label' => 'Annual growth rate',
                            'type' => 'number',
                            'help' => 'The percentage growth rate of your additional periodic contribution over a year.',
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
                        ['name' => 'EndDate', 'label' => 'Date to reach your goal', 'type' => 'date', 'help' => 'Note, that if the number of periods between the day you start saving and the date of your goal is fractional, the number of periods is rounded up.'],
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
                            The percentage growth rate of your periodic contributions. Note, that periodic and annual growth rates are linked together: if you set one, the other will be calculated according to the regularity of your additional deposit.
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
                            'name' => 'q',
                            'label' => 'How often?',
                            'type' => 'select',
                            'options' => [
                                'Yearly' => '1',
                                'Semi-annually' => '2',
                                'Quarterly' => '4',
                                'Monthly' => '12',
                                'Weekly' => '52',
                                'Daily' => '365',
                            ],
                            'dataset' => 'payfreq',
                            'control' => 'DROPDOWN',
                            'help' => 'The frequency of your contributions.',
                            'default' => 'Monthly',
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
                            'name' => 'inital_lumpsum_res',
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
                            'name' => 't_res',
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
                            'name' => 't_res_yrs',
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
                            'name' => 't_res_mos',
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
                            'name' => 'final_balance_infl_res',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'g + 1 = (1 + g_p) ^ q',
            'results' => ['g_p' => 'pow(g + 1, 1/q) - 1', 'q' => 'log(g + 1)/log(g_p + 1)', 'g' => 'pow(g_p + 1, q) - 1'],
        ],
        [
            'title' => 'return_status = run_calculator(Subject, InDep, FinBal, CompFreq, t, StartDate, Infl, r, Today)',
            'results' => ['return_status' => 'run_calculator(Subject, InDep, FinBal, CompFreq, t, StartDate, Infl, r, Today)'],
        ],
        [
            'title' => 'end_date = get_end_date()',
            'results' => ['end_date' => 'get_end_date()'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";var q=12,g=0,g_p=0,PerPay=0,VarType=0;var milisecondsInADay=24*60*60*1000;var final_balance_res,final_balance_infl_res,inital_lumpsum_res,end_date,total_return,t_res,rate_of_return_res;omni.define("run_calculator",function(VarSub,InDep,FinBal,m,t,StartDate,Infl,r,Today){var periods=q*t;if(r===0){r=1e-10}var eq_p=getPerEqRate(q,m,r);var DepBal=0;var FinPrincBal=0;var FinBalAdj;var tAdd=(StartDate-Today)/365.25;if(Infl!==0&&VarSub!==2){FinBal=FinBal*mathjs.pow(1+Infl,t+tAdd)}if(VarSub===1){DepBal=getBal(PerPay,periods,q,eq_p,g_p,g,VarType);FinPrincBal=FinBal-DepBal;InDep=getPV(FinPrincBal,eq_p,periods)}if(VarSub===2){DepBal=getBal(PerPay,periods,q,eq_p,g_p,g,VarType);FinPrincBal=getFV(InDep,eq_p,periods);FinBal=FinPrincBal+DepBal;if(Infl!==0){FinBalAdj=FinBal/mathjs.pow(1+Infl,t+tAdd);final_balance_infl_res=FinBalAdj}}if(VarSub===4){periods=getAnnuityPer(InDep,FinBal,PerPay,eq_p,VarType)}if(VarSub===5){r=getIntRate(InDep,FinBal,PerPay,periods,m,q,VarType);eq_p=getPerEqRate(q,m,r/100);rate_of_return_res=r}var date,daysInPeriod,daysPassed=0,TotInt=0,TotIntPer=0,iDep=0,TotBalOpen=0,InBalOpen=0,DepBalOpen=0;var periodsLoop=mathjs.floor(periods);if(VarSub===4){periodsLoop=mathjs.floor(periods+1)}for(var i=0;i<=periodsLoop;i++){if(i/q>100){return-1}date=new Date((StartDate+daysPassed)*milisecondsInADay);daysInPeriod=getDaysInPeriod(date,q);if(i>0){daysPassed+=daysInPeriod;InBalOpen=InDep*mathjs.pow(1+eq_p,i-1);DepBalOpen=getBal(PerPay,i-1,q,eq_p,g_p,g,VarType);TotBalOpen=InBalOpen+DepBalOpen;iDep=PerPay*mathjs.pow(1+g_p,i-1);if(VarType===1){TotIntPer=(TotBalOpen+iDep)*eq_p}else{TotIntPer=TotBalOpen*eq_p}TotInt+=TotIntPer}}inital_lumpsum_res=InDep;final_balance_res=FinBal;if(Infl!==0&&VarSub===2){final_balance_infl_res=FinBalAdj}else{final_balance_infl_res=FinBal}end_date=addDays(date,daysInPeriod).getTime();total_return=TotInt;t_res=periods/q*12;return 1});omni.define("get_final_balance_res",function(){return final_balance_res});omni.define("get_final_balance_infl_res",function(){return final_balance_infl_res});omni.define("get_inital_lumpsum_res",function(){return inital_lumpsum_res});omni.define("get_end_date",function(){return end_date});omni.define("get_total_return",function(){return total_return});omni.define("get_t_res",function(){return t_res});omni.define("get_rate_of_return_res",function(){return rate_of_return_res});function getBal(PerPay,periods,q,eq_p,g_p,g,VarType){var DepBal;if(g_p!==eq_p&&q!==1){DepBal=PerPay*(mathjs.pow(1+eq_p,periods)-mathjs.pow(1+g_p,periods))*(1+eq_p*VarType)/(eq_p-g_p)}else if(g!==eq_p&&q===1){DepBal=PerPay*(mathjs.pow(1+eq_p,periods)-mathjs.pow(1+g,periods))*(1+eq_p*VarType)/(eq_p-g)}else if(g_p===eq_p){DepBal=PerPay*periods*mathjs.pow(1+eq_p,periods-1)*(1+eq_p*VarType)}return DepBal}function getFV(InBal,eq_p,periods){var FinPrincBal=InBal*mathjs.pow(1+eq_p,periods);return FinPrincBal}function getPerEqRate(q,m,r){var ex=Math.exp(1);var base;if(m===0){var continuous_r=mathjs.pow(ex,r)-1;m=1;base=1+continuous_r/m}else{base=1+r/m}var power=m/q;var eq_p=mathjs.pow(base,power)-1;return eq_p}function getDaysInPeriod(date,q){var daysInMonth;var daysInPeriod;var DaysInYear;var DaysInNextYear;var day=date.getUTCDate();var month=date.getUTCMonth();var year=date.getUTCFullYear();if(day<29&&month===0){daysInMonth=31}else if(day===29&&month===0){daysInMonth=30}else if(day===30&&month===0){daysInMonth=29}else if(day===31&&month===0){daysInMonth=28}else if(day<29&&month===1){daysInMonth=28}else if(day===29&&month===1){daysInMonth=29}else if(day===30&&month===1){daysInMonth=30}else if(day===31&&month===1){daysInMonth=31}else if(day<31&&month===2){daysInMonth=31}else if(day===31&&month===2){daysInMonth=30}else if(day<31&&month===3){daysInMonth=30}else if(day===31&&month===3){daysInMonth=31}else if(day<31&&month===4){daysInMonth=31}else if(day===31&&month===4){daysInMonth=30}else if(day<31&&month===5){daysInMonth=30}else if(day===31&&month===5){daysInMonth=31}else if(day<31&&month===6){daysInMonth=31}else if(day===31&&month===6){daysInMonth=31}else if(day<31&&month===7){daysInMonth=31}else if(day===31&&month===7){daysInMonth=30}else if(day<31&&month===8){daysInMonth=30}else if(day===31&&month===8){daysInMonth=31}else if(day<31&&month===9){daysInMonth=31}else if(day===31&&month===9){daysInMonth=30}else if(day<31&&month===10){daysInMonth=30}else if(day===31&&month===10){daysInMonth=31}else if(day<31&&month===11){daysInMonth=31}else if(day===31&&month===11){daysInMonth=31}if(year%4===0&&year%100!==0&&date.getMonth()===1||year%400===0&&month===1){daysInMonth=29}if(year%4===0&&year%100!==0&&month===0&&date.getDate()===30||year%400===0&&month===0&&date.getDate()===30){daysInMonth=30}if(year%4===0&&year%100!==0&&month===0&&date.getDate()===31||year%400===0&&month===0&&date.getDate()===31){daysInMonth=29}if(year%4===0&&year%100!==0&&month===0&&date.getDate()===29||year%400===0&&month===0&&date.getDate()===29){daysInMonth=31}if(date.getDate()===29&&date.getMonth()===1&&day>29){daysInMonth=30}if(date.getDate()===29&&date.getMonth()===1&&day>30){daysInMonth=31}if(date.getDate()===28&&date.getMonth()===1&&day>30){daysInMonth=31}if(year%4===0&&year%100!==0||year%400===0){DaysInYear=366}else{DaysInYear=365}if((year+1)%4===0&&(year+1)%100!==0||(year+1)%400===0){DaysInNextYear=366}else{DaysInNextYear=365}if(q===1){daysInPeriod=DaysInYear}if(q===2){daysInPeriod=DaysInYear/2}if(q===12){daysInPeriod=daysInMonth}if(q===26){daysInPeriod=14}if(q===52){daysInPeriod=7}if(q===365){daysInPeriod=1}if(q===4){if(month<=1&&DaysInYear===366){daysInPeriod=90}else if(month<=1&&DaysInYear===365){daysInPeriod=89}else if(month===11&&DaysInNextYear===366){daysInPeriod=92}else if(month===11&&DaysInNextYear===365){daysInPeriod=91}else if(month===2||month===4||month===6||month===7||month===9||month===10){daysInPeriod=92}else if(month===3||month===5||month===8){daysInPeriod=91}if(day===31&&(month===2||month===7)){daysInPeriod=91}if(day===30&&(month===3||month===8||month===5)){daysInPeriod=92}if(day===31&&month===0&&DaysInYear===365){daysInPeriod=89}if(day===31&&month===0&&DaysInYear===366){daysInPeriod=90}if(day===31&&(month===4||month===9)){daysInPeriod=92}if(day>=30&&month>=10&&DaysInNextYear===366){daysInPeriod=91}if(day>=30&&month>=10&&DaysInNextYear===365){daysInPeriod=90}if(day===28&&month===1&&DaysInYear===365){daysInPeriod=92}if(day===28&&month===1&&DaysInYear===366){daysInPeriod=93}if(day===29&&month===1){daysInPeriod=92}}return daysInPeriod}function addDays(date,days){var newDate=new Date(date);newDate.setDate(newDate.getDate()+days);return newDate}function getAnnuityPer(InBal,FinBal,PerPay,eq_p,VarType){var periods=mathjs.log((eq_p*(FinBal+PerPay*VarType)+PerPay)/(eq_p*InBal+PerPay*(1+eq_p*VarType)))/mathjs.log(eq_p+1);if(periods<0){periods=0}return periods}function getIntRate(InBal,FinBal,PerPay,periods,m,q,VarType){var Max_iterations=50000;var Min_precision=1e-9;var ex=Math.exp(1);var APR_approx=0.1;var oldI;var newI=APR_approx;var iteration=0;do{oldI=newI;var dividend=InBal*mathjs.pow(newI+1,periods)+PerPay*(mathjs.pow(newI+1,periods)-1)*(1+newI*VarType)/newI-FinBal;var divisor=InBal*periods*mathjs.pow(newI+1,periods-1)+((PerPay*periods*mathjs.pow(newI+1,periods-1)*(1+newI*VarType)+PerPay*(mathjs.pow(newI+1,periods)-1))*newI-PerPay*(mathjs.pow(newI+1,periods)-1)*(1+newI*VarType))/mathjs.pow(newI,2);newI=newI-dividend/divisor;++iteration}while(mathjs.abs(oldI-newI)>Min_precision&&iteration<=Max_iterations);var eq_p=newI;var oldR;var newR=eq_p;do{oldR=newR;if(m===0){var dividendR=mathjs.pow(ex,newR/q)-1-eq_p;var divisorR=mathjs.pow(ex,newR/q)/q;newR=newR-dividendR/divisorR}else{var dividendR2=mathjs.pow(1+newR/m,m/q)-1-eq_p;var divisorR2=mathjs.pow(1+newR/m,m/q-1)/q;newR=newR-dividendR2/divisorR2}++iteration}while(mathjs.abs(oldR-newR)>Min_precision&&iteration<=Max_iterations);eq_p=newR/q;var r=eq_p*q*100;return r}function getPV(FinPrincBal,eq_p,periods){var InBal=FinPrincBal/mathjs.pow(1+eq_p,periods);return InBal}//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Enter I'd like to know the…, Initial lumpsum and Your goal into Lumpsum (India) and the answer comes back as Annual growth rate and Periodic growth rate. Nothing is looked up on this page: annual growth rate is computed from i'd like to know the… and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Annual growth rate is opened in percent; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Lumpsum (India) calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Lumpsum (India): it takes 9 numbers and reports Annual growth rate, Periodic growth rate and How often?.</p><p>The relationship it solves reads Periodic growth rate = (Annual growth rate + 1)^(1 ÷ How often?) − 1.</p><p>The answers are Annual growth rate, Periodic growth rate, How often? and Return status; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 9 boxes, and nothing else.</p><ul><li><strong>I&#039;d like to know the…</strong> — a plain number, no unit</li><li><strong>Initial lumpsum</strong> — in USD. The present value of your investment.</li><li><strong>Your goal</strong> — in USD. In today&#039;s purchasing power.</li><li><strong>Expected rate of return</strong> — in percent. Annual nominal interest rate.</li><li><strong>Term</strong> — in years</li><li><strong>Start date</strong> — a plain number, no unit, entered as a date</li><li><strong>Inflation rate</strong> — in percent. The annual rate of inflation. Note, that you can set a negative value if you expect a fall in the general price level during the set interval, representing deflationary pressures.</li><li><strong>Compounding frequency</strong> — a plain number, no unit. The frequency interest is added to the principal balance of your savings, or, in other words, how often the earned return or interest is reinvested.&amp;nbsp;</li><li><strong>Today</strong> — a plain number, no unit, entered as a date</li></ul><p>The result boxes are Annual growth rate in percent, Periodic growth rate in percent, How often?, Return status, End date; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — I&amp;#039;d like to know the… = 1, Initial lumpsum = 1000 USD, Your goal = 100000 USD, Expected rate of return = 10 perc, Term = 10 yrs, Inflation rate = 7 perc, Compounding frequency = 12, Start date = Sun 1 March 2026, Today = Sun 1 March 2026 and Date to reach your goal = Sun 1 March 2026 — through the same formula and the panel reports <strong>How often?</strong> = 12.</p><ul><li><strong>How often?</strong> = 12</li></ul><p>The line behind those figures is <strong>Periodic growth rate</strong> = <code>(Annual growth rate + 1)^(1 ÷ How often?) − 1</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>How often?</strong> = 12. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Annual growth rate lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Periodic growth rate</strong> = <code>(Annual growth rate + 1)^(1 ÷ How often?) − 1</code></li><li><strong>How often?</strong> = <code>ln(Annual growth rate + 1) ÷ ln(Periodic growth rate + 1)</code></li><li><strong>Annual growth rate</strong> = <code>(Periodic growth rate + 1)^(How often?) − 1</code></li><li><strong>Return status</strong> = <code>run_calculator(I&#039;d like to know the..., Initial lumpsum, Your goal, Compounding frequency, Term, Start date, Inflation rate, Expected rate of return, Today)</code></li><li><strong>End date</strong> = <code>get_end_date()</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Periodic growth rate</strong> = <code>(Annual growth rate + 1)^(1 ÷ How often?) − 1</code> — the form to use when Annual growth rate and How often? are the values you have.</li><li><strong>How often?</strong> = <code>ln(Annual growth rate + 1) ÷ ln(Periodic growth rate + 1)</code> — the form to use when Annual growth rate and Periodic growth rate are the values you have.</li><li><strong>Annual growth rate</strong> = <code>(Periodic growth rate + 1)^(How often?) − 1</code> — the form to use when Periodic growth rate and How often? are the values you have.</li><li><strong>Return status</strong> = <code>run_calculator(I&#039;d like to know the..., Initial lumpsum, Your goal, Compounding frequency, Term, Start date, Inflation rate, Expected rate of return, Today)</code> — the form to use when I&#039;d like to know the…, Initial lumpsum, Your goal and Compounding frequency are the values you have.</li><li><strong>End date</strong> = <code>get_end_date()</code> — the form to use when the other values are known.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Periodic growth rate, How often? and Annual growth rate can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — I&#039;d like to know the..., from 1 to 2 — and the answers go from <strong>How often?</strong> 12 to <strong>How often?</strong> 12.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Expected rate of return, Term and Inflation rate carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Annual growth rate, Periodic growth rate and How often? are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>I&#039;d like to know the… left as a guess.</strong> Anything typed into I&amp;#039;d like to know the… is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Initial lumpsum left as a guess.</strong> Anything typed into Initial lumpsum is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If I&#039;d like to know the... is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Lumpsum (India) form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>I&#039;d like to know the…</strong> takes a plain number with no unit attached. The page reads it when it works out Return status. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — I&#039;d like to know the… is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Initial lumpsum</strong> takes a plain number with no unit attached. The present value of your investment. The page reads it when it works out Return status. Fill it from a measurement rather than a memory — Initial lumpsum is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Your goal</strong> takes a plain number with no unit attached. In today&#039;s purchasing power. The page reads it when it works out Return status. Fill it from a measurement rather than a memory — Your goal is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Expected rate of return</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Annual nominal interest rate. The page reads it when it works out Return status. Fill it from a measurement rather than a memory — Expected rate of return is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Term</strong> is a years quantity: the page opens it in yrs and converts anything else you pick before the formula runs. The page reads it when it works out Return status. Fill it from a measurement rather than a memory — Term is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Start date</strong> takes a plain number with no unit attached. The page reads it when it works out Return status. Fill it from a measurement rather than a memory — Start date is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Inflation rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The annual rate of inflation. Note, that you can set a negative value if you expect a fall in the general price level during the set interval, representing deflationary pressures. The page reads it when it works out Return status. Fill it from a measurement rather than a memory — Inflation rate is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Compounding frequency</strong> takes a plain number with no unit attached. The frequency interest is added to the principal balance of your savings, or, in other words, how often the earned return or interest is reinvested.&amp;nbsp;. The page reads it when it works out Return status. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Compounding frequency is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Today</strong> takes a plain number with no unit attached. The page reads it when it works out Return status. Fill it from a measurement rather than a memory — Today is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Annual growth rate is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and years and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It counts in whole days.</strong> Dates are compared as calendar days, not as moments: two dates that differ by a few hours on the same day give the same answer, and there is no time-of-day input to set.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes I&#039;d like to know the…, Initial lumpsum and Your goal are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when I&#039;d like to know the…, Initial lumpsum and Your goal is what you already know and Annual growth rate and Periodic growth rate is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/debt-to-asset">Debt to asset ratio Calculator</a>, <a href="/finance/debt-to-equity">Debt to equity Calculator</a> and <a href="/finance/dti">Debt to income ratio</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Lumpsum (India) calculator work out?', 'a' => <<<'TXT'
            Annual growth rate, Periodic growth rate, How often? and Return status, from Annual growth rate and How often?. The relationship is Periodic growth rate = (Annual growth rate + 1)^(1 ÷ How often?) − 1.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            I'd like to know the…, Initial lumpsum (USD), Your goal (USD), Expected rate of return (percent), Term (years). Fill i'd like to know the…, initial lumpsum and your goal and leave Annual growth rate empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Periodic growth rate, How often?, Annual growth rate and Return status can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'How often? = 12. Those are the defaults written into the form — move I\'d like to know the... and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Annual growth rate is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave I\'d like to know the... blank and the page solves for it, reporting Annual growth rate instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Annual growth rate keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/debt-to-asset', 'name' => 'Debt to asset ratio Calculator'],
            ['path' => '/finance/debt-to-equity', 'name' => 'Debt to equity Calculator'],
            ['path' => '/finance/dti', 'name' => 'Debt to income ratio'],
        ],
        'authors' => [],
    ],
];
