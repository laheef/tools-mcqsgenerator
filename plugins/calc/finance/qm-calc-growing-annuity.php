<?php

/**
 * Growing annuity
 * /finance/growing-annuity
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Growing annuity',
    'meta' => ['title' => 'Growing annuity — Formula, Steps & Examples', 'description' => 'Growing annuity works out return status from i\'d like to know the.... The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Growing annuity Calculator', 'updated' => '2026-09-30'],
    'sections' => [
        [
            'title' => 'Growing annuity configuration',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Subject',
                            'label' => 'I\'d like to know the...',
                            'type' => 'select',
                            'options' => ['initial deposit (PV)' => '1', 'final balance (FV)' => '2', 'annuity amount (cash flows)' => '3'],
                            'dataset' => 'DATA7',
                            'help' => <<<'TXT'
                            The initial balance is the present value (PV), the final balance refers to the future value (FV) of the annuity. Annuity amount is the periodic deposit or withdrawal.
                            TXT,
                            'default' => 'final balance (FV)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'FlowType',
                            'label' => 'Direction of cash flows',
                            'type' => 'select',
                            'options' => ['Payment (deposit)' => '1', 'Receipt (withdrawal)' => '-1'],
                            'dataset' => 'DATA5',
                            'default' => 'Payment (deposit)',
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
                            'dataset' => 'DATA4',
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
                            'dataset' => 'DATA2',
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
                                'Biweekly' => '26',
                                'Weekly' => '52',
                                'Daily' => '365',
                                'Continuous' => '0',
                            ],
                            'dataset' => 'DATA3',
                            'control' => 'DROPDOWN',
                            'help' => 'The frequency with which interest is added to (capitalized on) the balance.',
                            'default' => 'Monthly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'StartDate', 'label' => 'First period starts from...', 'type' => 'date', 'help' => 'The frequency with which interest is added to (capitalized on) the balance.'],
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
                            'help' => 'The opening balance - the present value (FV) of the annuity.',
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
                            'help' => 'The periodic payment (cash-flow), which is either a deposit (contribution) or a withdrawal (payout).',
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
                            'help' => 'The periodic payment (cash-flow), which is either a deposit (contribution) or a withdrawal (payout).',
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
                            'default' => '3',
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
                            The percentage growth rate of the periodic deposits or withdrawals. Note, that periodic and annual growth rates are linked together: the other will be calculated according to annuity frequency (if you set one).
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
                                ['when' => 'Subject == 1', 'text' => 'The initial deposit (present value) of your annuity is {{opening_bal_res.monetaryValue}}.'],
                                ['when' => 'Subject == 2', 'text' => 'The final balance (future value) of your annuity is {{final_balance_res.monetaryValue}}.'],
                                ['when' => 'Subject == 3', 'text' => 'You can deposit {{monthly_inout.monetaryValue}} at the beginning of each {{PayFreq_name.uiValue}} to reach the final balance.'],
                                ['when' => 'Subject == 3 and g > 0', 'text' => 'You can deposit {{monthly_inout.monetaryValue}} initially and increase it gradually to reach the final balance.'],
                                ['when' => 'Subject == 3 and g < 0', 'text' => 'You can deposit {{monthly_inout.monetaryValue}} initially and decrease it gradually to reach the final balance.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'hidden',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'EndDate', 'label' => 'Final payout on...', 'type' => 'date', 'help' => 'The periodic payment (cash-flow), which is either a deposit (contribution) or a withdrawal (payout).'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'q',
                            'label' => 'Annuity frequency',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
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
                            'help' => 'Or annual interest rate.',
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
                            'name' => 'm',
                            'label' => 'M',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
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
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'g + 1= (1 + g_p) ^ q',
            'results' => ['g_p' => 'pow(g + 1, 1/q) - 1', 'q' => 'log(g + 1)/log(g_p + 1)', 'g' => 'pow(g_p + 1, q) - 1'],
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
    "use strict";var milisecondsInADay=24*60*60*1000;var final_balance_res,opening_bal_res,monthly_inout,total_inout,total_return,num_transactions,end_date,rate_of_return_res;omni.define("run_calculator",function(VarSub,VarFlow,InDep,FinBal,m,q,t,StartDate,PerPay,VarType,r,g,g_p){PerPay=PerPay*VarFlow;var periods=q*t;if(r===0){r=1e-10}var eq_p=getPerEqRate(q,m,r);var DepBal=0;var FinPrincBal=0;var TotCashFlow=0;if(VarSub===1){DepBal=getBal(PerPay,periods,q,eq_p,g_p,g,VarType);FinPrincBal=FinBal-DepBal;InDep=getPV(FinPrincBal,eq_p,periods)}if(VarSub===2){DepBal=getBal(PerPay,periods,q,eq_p,g_p,g,VarType);FinPrincBal=getFV(InDep,eq_p,periods);FinBal=FinPrincBal+DepBal}if(VarSub===3){PerPay=getPerPay(InDep,FinBal,periods,q,eq_p,g_p,g,VarType)}var periodsCount=0,date,daysInPeriod,daysPassed=0,TotInt=0,TotIntPer=0,iDep=0,TotBalOpen=0,InBalOpen=0,DepBalOpen=0;var periodsLoop=mathjs.floor(periods);for(var i=0;i<=periodsLoop;i++){date=new Date((StartDate+daysPassed)*milisecondsInADay);daysInPeriod=getDaysInPeriod(date,q);if(i>0){daysPassed+=daysInPeriod;periodsCount=i;InBalOpen=InDep*mathjs.pow(1+eq_p,i-1);DepBalOpen=getBal(PerPay,i-1,q,eq_p,g_p,g,VarType);TotBalOpen=InBalOpen+DepBalOpen;iDep=PerPay*mathjs.pow(1+g_p,i-1);if(VarType===1){TotIntPer=(TotBalOpen+iDep)*eq_p}else{TotIntPer=TotBalOpen*eq_p}TotInt+=TotIntPer;TotCashFlow+=iDep}}final_balance_res=FinBal;opening_bal_res=InDep;monthly_inout=mathjs.abs(PerPay);total_inout=mathjs.abs(TotCashFlow);total_return=TotInt;num_transactions=periodsCount;end_date=date.getTime();return 1});omni.define("get_final_balance_res",function(){return final_balance_res});omni.define("get_opening_bal_res",function(){return opening_bal_res});omni.define("get_monthly_inout",function(){return monthly_inout});omni.define("get_total_inout",function(){return total_inout});omni.define("get_total_return",function(){return total_return});omni.define("get_num_transactions",function(){return num_transactions});omni.define("get_end_date",function(){return end_date});omni.define("get_rate_of_return_res",function(){return rate_of_return_res});function getPerEqRate(q,m,r){var ex=Math.exp(1);var base;if(m===0){var continuous_r=mathjs.pow(ex,r)-1;m=1;base=1+continuous_r/m}else{base=1+r/m}var power=m/q;var eq_p=mathjs.pow(base,power)-1;return eq_p}function getPerPay(InBal,FinBal,periods,q,eq_p,g_p,g,VarType){var PerPay;var PrincBal=InBal*mathjs.pow(1+eq_p,periods);var DepBal=FinBal-PrincBal;if(g_p!==eq_p&&q!==1){PerPay=DepBal/((mathjs.pow(1+eq_p,periods)-mathjs.pow(1+g_p,periods))*(1+eq_p*VarType)/(eq_p-g_p))}else if(g!==eq_p&&q===1){PerPay=DepBal/((mathjs.pow(1+eq_p,periods)-mathjs.pow(1+g,periods))*(1+eq_p*VarType)/(eq_p-g))}else if(g_p===eq_p){PerPay=DepBal/(periods*mathjs.pow(1+eq_p,periods-1)*(1+eq_p*VarType))}return PerPay}function getBal(PerPay,periods,q,eq_p,g_p,g,VarType){var DepBal;if(g_p!==eq_p&&q!==1){DepBal=PerPay*(mathjs.pow(1+eq_p,periods)-mathjs.pow(1+g_p,periods))*(1+eq_p*VarType)/(eq_p-g_p)}else if(g!==eq_p&&q===1){DepBal=PerPay*(mathjs.pow(1+eq_p,periods)-mathjs.pow(1+g,periods))*(1+eq_p*VarType)/(eq_p-g)}else if(g_p===eq_p){DepBal=PerPay*periods*mathjs.pow(1+eq_p,periods-1)*(1+eq_p*VarType)}return DepBal}function getPV(FinPrincBal,eq_p,periods){var InBal=FinPrincBal/mathjs.pow(1+eq_p,periods);return InBal}function getFV(InBal,eq_p,periods){var FinPrincBal=InBal*mathjs.pow(1+eq_p,periods);return FinPrincBal}function getDaysInPeriod(date,q){var daysInMonth;var daysInPeriod;var DaysInYear;var DaysInNextYear;var day=date.getUTCDate();var month=date.getUTCMonth();var year=date.getUTCFullYear();if(day<29&&month===0){daysInMonth=31}else if(day===29&&month===0){daysInMonth=30}else if(day===30&&month===0){daysInMonth=29}else if(day===31&&month===0){daysInMonth=28}else if(day<29&&month===1){daysInMonth=28}else if(day===29&&month===1){daysInMonth=29}else if(day===30&&month===1){daysInMonth=30}else if(day===31&&month===1){daysInMonth=31}else if(day<31&&month===2){daysInMonth=31}else if(day===31&&month===2){daysInMonth=30}else if(day<31&&month===3){daysInMonth=30}else if(day===31&&month===3){daysInMonth=31}else if(day<31&&month===4){daysInMonth=31}else if(day===31&&month===4){daysInMonth=30}else if(day<31&&month===5){daysInMonth=30}else if(day===31&&month===5){daysInMonth=31}else if(day<31&&month===6){daysInMonth=31}else if(day===31&&month===6){daysInMonth=31}else if(day<31&&month===7){daysInMonth=31}else if(day===31&&month===7){daysInMonth=30}else if(day<31&&month===8){daysInMonth=30}else if(day===31&&month===8){daysInMonth=31}else if(day<31&&month===9){daysInMonth=31}else if(day===31&&month===9){daysInMonth=30}else if(day<31&&month===10){daysInMonth=30}else if(day===31&&month===10){daysInMonth=31}else if(day<31&&month===11){daysInMonth=31}else if(day===31&&month===11){daysInMonth=31}if(year%4===0&&year%100!==0&&date.getMonth()===1||year%400===0&&month===1){daysInMonth=29}if(year%4===0&&year%100!==0&&month===0&&date.getDate()===30||year%400===0&&month===0&&date.getDate()===30){daysInMonth=30}if(year%4===0&&year%100!==0&&month===0&&date.getDate()===31||year%400===0&&month===0&&date.getDate()===31){daysInMonth=29}if(year%4===0&&year%100!==0&&month===0&&date.getDate()===29||year%400===0&&month===0&&date.getDate()===29){daysInMonth=31}if(date.getDate()===29&&date.getMonth()===1&&day>29){daysInMonth=30}if(date.getDate()===29&&date.getMonth()===1&&day>30){daysInMonth=31}if(date.getDate()===28&&date.getMonth()===1&&day>30){daysInMonth=31}if(year%4===0&&year%100!==0||year%400===0){DaysInYear=366}else{DaysInYear=365}if((year+1)%4===0&&(year+1)%100!==0||(year+1)%400===0){DaysInNextYear=366}else{DaysInNextYear=365}if(q===1){daysInPeriod=DaysInYear}if(q===2){daysInPeriod=DaysInYear/2}if(q===12){daysInPeriod=daysInMonth}if(q===26){daysInPeriod=14}if(q===52){daysInPeriod=7}if(q===365){daysInPeriod=1}if(q===4){if(month<=1&&DaysInYear===366){daysInPeriod=90}else if(month<=1&&DaysInYear===365){daysInPeriod=89}else if(month===11&&DaysInNextYear===366){daysInPeriod=92}else if(month===11&&DaysInNextYear===365){daysInPeriod=91}else if(month===2||month===4||month===6||month===7||month===9||month===10){daysInPeriod=92}else if(month===3||month===5||month===8){daysInPeriod=91}if(day===31&&(month===2||month===7)){daysInPeriod=91}if(day===30&&(month===3||month===8||month===5)){daysInPeriod=92}if(day===31&&month===0&&DaysInYear===365){daysInPeriod=89}if(day===31&&month===0&&DaysInYear===366){daysInPeriod=90}if(day===31&&(month===4||month===9)){daysInPeriod=92}if(day>=30&&month>=10&&DaysInNextYear===366){daysInPeriod=91}if(day>=30&&month>=10&&DaysInNextYear===365){daysInPeriod=90}if(day===28&&month===1&&DaysInYear===365){daysInPeriod=92}if(day===28&&month===1&&DaysInYear===366){daysInPeriod=93}if(day===29&&month===1){daysInPeriod=92}}return daysInPeriod}//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Growing annuity works out Annuity frequency and End date from I'd like to know the…, Direction of cash flows and Annuity payment frequency. Nothing is looked up on this page: annuity frequency is computed from i'd like to know the… and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Growing annuity calculator works', 'html' => <<<'TXT'
            <p>The Growing annuity calculator applies one relationship to 13 numbers and reports Annuity frequency, End date and Return status.</p><p>Written with the labels from the form, Periodic growth rate = (Annual growth rate + 1)^(1 ÷ Annuity frequency) − 1.</p><p>What comes back is Annuity frequency, End date and Return status — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 13 boxes and the page has everything it needs.</p><ul><li><strong>I&#039;d like to know the…</strong> — a plain number, no unit. The initial balance is the present value (PV), the final balance refers to the future value (FV) of the annuity. Annuity amount is the periodic deposit or withdrawal.</li><li><strong>Direction of cash flows</strong> — a plain number, no unit</li><li><strong>Annuity payment frequency</strong> — a plain number, no unit</li><li><strong>Type of annuity</strong> — a plain number, no unit. Ordinary annuity: end of periods; annuity due: beginning of periods.</li><li><strong>Compounding frequency</strong> — a plain number, no unit. The frequency with which interest is added to (capitalized on) the balance.</li><li><strong>First period starts from…</strong> — a plain number, no unit, entered as a date. The frequency with which interest is added to (capitalized on) the balance.</li><li><strong>Initial deposit</strong> — in USD. The opening balance - the present value (FV) of the annuity.</li><li><strong>Final balance</strong> — in USD. The future value (FV) of the annuity.</li><li><strong>Annuity amount</strong> — in USD. The periodic payment (cash-flow), which is either a deposit (contribution) or a withdrawal (payout).</li><li><strong>Length of annuity</strong> — in years. The periodic payment (cash-flow), which is either a deposit (contribution) or a withdrawal (payout).</li><li><strong>Rate of return</strong> — in percent. Or annual interest rate.</li><li><strong>Annual growth rate</strong> — in percent. The percentage growth rate of your additional periodic deposits or withdrawals over a year.</li><li><strong>Periodic growth rate</strong> — in percent. The percentage growth rate of the periodic deposits or withdrawals. Note, that periodic and annual growth rates are linked together: the other will be calculated according to annuity frequency (if you set one).</li></ul><p>The result boxes are Annuity frequency, End date, Return status; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, I&amp;#039;d like to know the… = 2, Direction of cash flows = 1, Annuity payment frequency = 12, Type of annuity = 1, Compounding frequency = 12, Initial deposit = 3 USD, Final balance = 100000 USD, Annuity amount = 1000 USD, Length of annuity = 6 yrs, Rate of return = 5 perc and First period starts from… = Sun 1 March 2026 gives <strong>Inflation rate</strong> = 0 and <strong>M</strong> = 12.</p><ul><li><strong>Inflation rate</strong> = 0</li><li><strong>M</strong> = 12</li></ul><p>The line behind those figures is <strong>Periodic growth rate</strong> = <code>(Annual growth rate + 1)^(1 ÷ Annuity frequency) − 1</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Inflation rate</strong> = 0 and <strong>M</strong> = 12. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Length of annuity lists 5 options and opens on years. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Periodic growth rate</strong> = <code>(Annual growth rate + 1)^(1 ÷ Annuity frequency) − 1</code></li><li><strong>Annuity frequency</strong> = <code>ln(Annual growth rate + 1) ÷ ln(Periodic growth rate + 1)</code></li><li><strong>Annual growth rate</strong> = <code>(Periodic growth rate + 1)^(Annuity frequency) − 1</code></li><li><strong>End date</strong> = <code>get_end_date()</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Periodic growth rate</strong> = <code>(Annual growth rate + 1)^(1 ÷ Annuity frequency) − 1</code> — the form to use when Annual growth rate and Annuity frequency are the values you have.</li><li><strong>Annuity frequency</strong> = <code>ln(Annual growth rate + 1) ÷ ln(Periodic growth rate + 1)</code> — the form to use when Annual growth rate and Periodic growth rate are the values you have.</li><li><strong>Annual growth rate</strong> = <code>(Periodic growth rate + 1)^(Annuity frequency) − 1</code> — the form to use when Periodic growth rate and Annuity frequency are the values you have.</li><li><strong>End date</strong> = <code>get_end_date()</code> — the form to use when the other values are known.</li></ul><p>Any one of Periodic growth rate, Annuity frequency and Annual growth rate can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — I&#039;d like to know the..., from 2 to 4 — and the answers go from <strong>Inflation rate</strong> 0 and <strong>M</strong> 12 to <strong>Inflation rate</strong> 0 and <strong>M</strong> 12.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Length of annuity, Rate of return and Annual growth rate carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Annuity frequency, End date and Return status are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>I&#039;d like to know the… left as a guess.</strong> Anything typed into I&amp;#039;d like to know the… is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Direction of cash flows left as a guess.</strong> Anything typed into Direction of cash flows is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in I&#039;d like to know the... and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need I&#039;d like to know the…, Direction of cash flows, Annuity payment frequency and Type of annuity. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type I&amp;#039;d like to know the… into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Annuity frequency with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Annuity frequency is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The chips cover years and percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It counts in whole days.</strong> The differences are counted in whole days, so an answer is a date or a number of days rather than an interval in hours. Expect a day&#039;s uncertainty if the event itself happened at an unknown time.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: I&#039;d like to know the…, Direction of cash flows and Annuity payment frequency measured, Annuity frequency and End date wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/economic-injury-disaster-loan">Economic Injury Disaster Loan Emergency Advance … Calculator</a>, <a href="/finance/eoq">Economic order quantity (EOQ) Calculator</a> and <a href="/finance/economic-profit">Economic profit Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Growing annuity calculator work out?', 'a' => <<<'TXT'
            Annuity frequency, End date and Return status, from Annual growth rate and Annuity frequency. The relationship is Periodic growth rate = (Annual growth rate + 1)^(1 ÷ Annuity frequency) − 1.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            I'd like to know the…, Direction of cash flows, Annuity payment frequency, Type of annuity, Compounding frequency. With i'd like to know the…, direction of cash flows and annuity payment frequency in place, Annuity frequency can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Periodic growth rate, Annuity frequency, Annual growth rate and Return status blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Inflation rate = 0 and M = 12. Those are the defaults written into the form — move I\'d like to know the... and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Annuity frequency is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With I'd like to know the... left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Annuity frequency keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/economic-injury-disaster-loan', 'name' => 'Economic Injury Disaster Loan Emergency Advance … Calculator'],
            ['path' => '/finance/eoq', 'name' => 'Economic order quantity (EOQ) Calculator'],
            ['path' => '/finance/economic-profit', 'name' => 'Economic profit Calculator'],
        ],
        'authors' => [],
    ],
];
