<?php

/**
 * Savings withdrawal
 * /finance/savings-withdrawal
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Savings withdrawal',
    'meta' => ['title' => 'Savings withdrawal — Free Online Calculator', 'description' => 'Savings withdrawal takes i\'d like to know..., balance of your savings and first withdrawal on and returns last withdrawal date. A worked example follows.', 'h1' => 'Savings withdrawal Calculator', 'updated' => '2026-09-02'],
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
                            'options' => ['how long will my money last?' => '2', 'how much can I withdraw?' => '1', 'how much will remain?' => '3'],
                            'dataset' => 'modes',
                            'control' => 'DROPDOWN',
                            'default' => 'how long will my money last?',
                        ],
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
                            'label' => 'Balance of your savings',
                            'type' => 'number',
                            'help' => 'The current balance of your savings.',
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
                        ['name' => 'StartDate', 'label' => 'First withdrawal on', 'type' => 'date', 'help' => 'If you choose a future date, your current balance stated above will increase according to the average interest rate.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 't',
                            'label' => 'Period of withdrawals',
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
                            'name' => 'PerPay',
                            'label' => 'Withdrawal amount',
                            'type' => 'number',
                            'help' => 'The amount you are planning to withdraw monthly.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '500',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'r',
                            'label' => 'Annual interest rate',
                            'type' => 'number',
                            'help' => 'The average interest rate or APY on your savings.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Advanced settings',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'CompFreq',
                            'label' => 'Compounding method',
                            'type' => 'select',
                            'options' => [
                                'Yearly' => '1',
                                'Semi-annually' => '2',
                                'Quarterly' => '3',
                                'Monthly' => '4',
                                'Weekly' => '5',
                                'Daily' => '6',
                                'Continuous' => '7',
                            ],
                            'dataset' => 'Compounding',
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
                            'label' => 'Timing of withdrawals',
                            'type' => 'select',
                            'options' => ['At the end of the month' => '0', 'At the beginning of the month' => '1'],
                            'dataset' => 'timing of withdrawals',
                            'control' => 'DROPDOWN',
                            'default' => 'At the end of the month',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'g',
                            'label' => 'Growth rate of withdrawals',
                            'type' => 'number',
                            'help' => 'The percentage growth rate of your withdrawals over a year.',
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
                            'label' => 'Monthly growth rate',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            The percentage growth rate of the monthly withdrawals. Note, that periodic and annual growth rates are linked together: if you set one, the other will be calculated according to annuity frequency. Available only at fixed length annuity.
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
                            'name' => 'FinBal',
                            'label' => 'Remaining balance',
                            'type' => 'number',
                            'help' => 'Set an amount if you want to have some money left at the end of the withdrawal period.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
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
                                ['when' => 'Subject == 2', 'text' => 'Your savings will last for {{last_for_years.value}} year(s) and {{last_for_months.value}}&nbsp;month(s) from the first day of withdrawal.'],
                                ['when' => 'Subject == 2 and bal_last_withdrawal > 0', 'text' => 'After withdrawing for {{last_for_years.value}} year(s) and {{last_for_months.value}}&nbsp;month(s), you will have {{bal_last_withdrawal.monetaryValue}}.'],
                                ['when' => 'Subject == 2 and isNaN(last_for_years)', 'text' => 'The length of withdrawal is infinite since the monthly interest earned exceeds the withdrawal amount.'],
                                ['when' => 'Subject == 1 and Type == 0', 'text' => 'You can withdraw {{withdrawal_amount.monetaryValue}} at the end of each month to deplete your savings entirely.'],
                                ['when' => 'Subject == 1 and Type == 1', 'text' => 'You can withdraw {{withdrawal_amount.monetaryValue}} at the beginning of each month to deplete your savings entirely.'],
                                ['when' => 'Subject == 3', 'text' => 'You will have {{remaining_amount.monetaryValue}} after the set length of withdrawals.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => '[hidden]',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'last_withdrawal_date', 'label' => '', 'type' => 'date'],
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
                            'name' => 'EndDate',
                            'label' => 'Planned age to retire',
                            'type' => 'number',
                            'suffix' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '50',
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
                            'name' => 'VarTime',
                            'label' => 'Var time',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Infl',
                            'label' => 'Inflation rate before you retire',
                            'type' => 'number',
                            'help' => 'The expected average inflation rate before retirement.',
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
                            'name' => 'VarRep',
                            'label' => 'Var rep',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'RecFreq',
                            'label' => 'Payment frequency',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarType',
                            'label' => 'Var type',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'q',
                            'label' => 'Payment frequency',
                            'type' => 'select',
                            'options' => [
                                'Yearly' => '1',
                                'Semi-annually' => '2',
                                'Quarterly' => '4',
                                'Monthly' => '12',
                                'Weekly' => '52',
                            ],
                            'dataset' => 'payfreq',
                            'control' => 'DROPDOWN',
                            'help' => 'Interval between the regular withdrawals.',
                            'default' => 'Monthly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Rep',
                            'label' => 'Display...',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'first_day', 'label' => 'Schedule starts from...', 'type' => 'date'],
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
                            'name' => 'last_for_years',
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
                            'name' => 'num_withdrawals',
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
                            'name' => 'monthly_withdrawal',
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
                            'name' => 'interest_earned',
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
                            'name' => 'last_withdrawal',
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
                            'name' => 'bal_first_withdrawal',
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
                            'name' => 'bal_last_withdrawal',
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
                            'name' => 'withdrawal_amount',
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
                            'name' => 'remaining_amount',
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
            'results' => ['g' => 'pow(g_p + 1, q) - 1', 'q' => 'log(g + 1)/log(g_p + 1)', 'g_p' => 'pow(g + 1, 1/q) - 1'],
        ],
        [
            'title' => 'last_withdrawal_date = last_withdrawal',
            'results' => ['last_withdrawal_date' => '((get_last_withdrawal_date()))'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";var monthDebt,periods,monthly_withdrawal,total_withdrawal,interest_earned,last_withdrawal_date,bal_first_withdrawal,bal_last_withdrawal;var q=12,ex=mathjs.E,milisecondsInADay=24*60*60*1000;omni.define("calculate_how_long",function(InDep,StartDate,PerPay,r,Type,FinBal,m,Subject){if(Subject!=2){return}var first_day=Math.floor(new Date().getTime()/milisecondsInADay);var yearsBefore=(mathjs.floor(StartDate)-mathjs.floor(first_day.toString()))/365;var eq_base;if(m===0){var continuous_r=mathjs.pow(ex,r)-1;m=1;eq_base=1+continuous_r/m}else{eq_base=1+r/m}var eq_power=m/q;var eq_p=mathjs.pow(eq_base,eq_power)-1;var InDepFV=InDep*mathjs.pow(1+eq_p,q*yearsBefore);bal_first_withdrawal=InDepFV;var g=0,g_p=0;PerPay=-PerPay;periods=mathjs.ceil(mathjs.log((eq_p*(FinBal+PerPay*Type)+PerPay)/(eq_p*InDepFV+PerPay*(1+eq_p*Type)))/mathjs.log(eq_p+1));var t=periods/q;var yearDebt=parseInt(Math.trunc(periods/12));monthDebt=parseInt(mathjs.ceil(periods-yearDebt*12));if(monthDebt===12){yearDebt+=1;monthDebt=0}monthly_withdrawal=-PerPay;var sim_results=savings_withdrawal_simulator(t,first_day,StartDate,yearsBefore,Type,InDep,InDepFV,g,g_p,PerPay,Subject,m,r,eq_p,FinBal);interest_earned=sim_results[0];last_withdrawal_date=sim_results[1];total_withdrawal=sim_results[2];bal_last_withdrawal=FinBal;return yearDebt});omni.define("calculate_how_much",function(InDep,StartDate,t,r,Type,FinBal,m,g,g_p,Subject){if(Subject!=1){return}var first_day=Math.floor(new Date().getTime()/milisecondsInADay);var yearsBefore=(mathjs.floor(StartDate)-mathjs.floor(first_day.toString()))/365;periods=q*t;var eq_base;if(m===0){var continuous_r=mathjs.pow(ex,r)-1;m=1;eq_base=1+continuous_r/m}else{eq_base=1+r/m}var eq_power=m/q;var eq_p=mathjs.pow(eq_base,eq_power)-1;var InDepFV=InDep*mathjs.pow(1+eq_p,q*yearsBefore);var PrincBal=InDepFV*mathjs.pow(1+eq_p,periods);bal_first_withdrawal=InDepFV;var DepBal=FinBal-PrincBal;var PerPay;if(g!==eq_p&&q!==1){PerPay=DepBal/((mathjs.pow(1+eq_p,periods)-mathjs.pow(1+g_p,periods))*(1+eq_p*Type)/(eq_p-g_p))}else if(g!==eq_p&&q===1){PerPay=DepBal/((mathjs.pow(1+eq_p,periods)-mathjs.pow(1+g,periods))*(1+eq_p*Type)/(eq_p-g))}else if(g===eq_p){PerPay=DepBal/(periods*mathjs.pow(1+eq_p,periods-1)*(1+eq_p*Type))}FinBal=PrincBal+DepBal;monthly_withdrawal=-PerPay;var sim_results=savings_withdrawal_simulator(t,first_day,StartDate,yearsBefore,Type,InDep,InDepFV,g,g_p,PerPay,Subject,m,r,eq_p,FinBal);interest_earned=sim_results[0];last_withdrawal_date=sim_results[1];total_withdrawal=sim_results[2];bal_last_withdrawal=FinBal;return-PerPay});omni.define("calculate_how_much_remain",function(InDep,StartDate,t,PerPay,r,Type,m,g,g_p,Subject){if(Subject!=3){return}var first_day=Math.floor(new Date().getTime()/milisecondsInADay);var yearsBefore=(mathjs.floor(StartDate)-mathjs.floor(first_day.toString()))/365;periods=q*t;PerPay=-PerPay;var DepBal;var eq_base;if(m===0){var continuous_r=mathjs.pow(ex,r)-1;m=1;eq_base=1+continuous_r/m}else{eq_base=1+r/m}var eq_power=m/q;var eq_p=mathjs.pow(eq_base,eq_power)-1;var InDepFV=InDep*mathjs.pow(1+eq_p,q*yearsBefore);var PrincBal=InDepFV*mathjs.pow(1+eq_p,periods);if(g!==eq_p&&q!==1){DepBal=PerPay*(mathjs.pow(1+eq_p,periods)-mathjs.pow(1+g_p,periods))*(1+eq_p*Type)/(eq_p-g_p)}else if(g!==eq_p&&q===1){DepBal=PerPay*(mathjs.pow(1+eq_p,periods)-mathjs.pow(1+g,periods))*(1+eq_p*Type)/(eq_p-g)}else if(g===eq_p){DepBal=PerPay*periods*mathjs.pow(1+eq_p,periods-1)*(1+eq_p*Type)}var FinBal=DepBal+PrincBal;if(FinBal<0){FinBal=0}var sim_results=savings_withdrawal_simulator(t,first_day,StartDate,yearsBefore,Type,InDep,InDepFV,g,g_p,PerPay,Subject,m,r,eq_p,FinBal);interest_earned=sim_results[0];last_withdrawal_date=sim_results[1];total_withdrawal=sim_results[2];bal_last_withdrawal=FinBal;return FinBal});function savings_withdrawal_simulator(t,first_day,StartDate,yearsBefore,Type,InDep,InDepFV,g,g_p,PerPay,Subject,m,r,eq_p,FinBal){var TotIntBal2=0;var StartDate2=new Date(StartDate*milisecondsInADay);var first_day2=new Date(first_day*milisecondsInADay);var gap=StartDate2.getUTCDate()-first_day2.getUTCDate();var monthsBefore=mathjs.floor(yearsBefore*12);var total_periods=t*12+monthsBefore;var daysPassed=0;var p=0;var TotBalOpen=InDep;var TotBal=0;var TotPerInt=0;var dep_pow=0;var DepPrincBal=0;var DepBal=0;var DepIntBal=0;var InBal=InDep;var InIntBal=0;var iDep=0;var TotPrincBal=InDep;var TotIntBal=0;var daysInMonth;var FirstDate=new Date(first_day*milisecondsInADay);var MonthlyDep=0;var LastDate;var date;var eq_base_monthly;if(m===0){var continuous_r_monthly=mathjs.pow(ex,r)-1;m=1;eq_base_monthly=1+continuous_r_monthly/m}else{eq_base_monthly=1+r/m}var eq_power_monthly=m/12;var r_monthly=mathjs.pow(eq_base_monthly,eq_power_monthly)-1;for(var i=0;i<=total_periods;i++){if(i!==monthsBefore){gap=0}date=new Date((first_day+daysPassed+gap)*milisecondsInADay);if(FirstDate.getUTCDate()<29&&date.getUTCMonth()===0){daysInMonth=31}else if(FirstDate.getUTCDate()===29&&date.getUTCMonth()===0){daysInMonth=30}else if(FirstDate.getUTCDate()===30&&date.getUTCMonth()===0){daysInMonth=29}else if(FirstDate.getUTCDate()===31&&date.getUTCMonth()===0){daysInMonth=28}else if(FirstDate.getUTCDate()<29&&date.getUTCMonth()===1){daysInMonth=28}else if(FirstDate.getUTCDate()===29&&date.getUTCMonth()===1){daysInMonth=29}else if(FirstDate.getUTCDate()===30&&date.getUTCMonth()===1){daysInMonth=30}else if(FirstDate.getUTCDate()===31&&date.getUTCMonth()===1){daysInMonth=31}else if(FirstDate.getUTCDate()<31&&date.getUTCMonth()===2){daysInMonth=31}else if(FirstDate.getUTCDate()===31&&date.getUTCMonth()===2){daysInMonth=30}else if(FirstDate.getUTCDate()<31&&date.getUTCMonth()===3){daysInMonth=30}else if(FirstDate.getUTCDate()===31&&date.getUTCMonth()===3){daysInMonth=31}else if(FirstDate.getUTCDate()<31&&date.getUTCMonth()===4){daysInMonth=31}else if(FirstDate.getUTCDate()===31&&date.getUTCMonth()===4){daysInMonth=30}else if(FirstDate.getUTCDate()<31&&date.getUTCMonth()===5){daysInMonth=30}else if(FirstDate.getUTCDate()===31&&date.getUTCMonth()===5){daysInMonth=31}else if(FirstDate.getUTCDate()<31&&date.getUTCMonth()===6){daysInMonth=31}else if(FirstDate.getUTCDate()===31&&date.getUTCMonth()===6){daysInMonth=31}else if(FirstDate.getUTCDate()<31&&date.getUTCMonth()===7){daysInMonth=31}else if(FirstDate.getUTCDate()===31&&date.getUTCMonth()===7){daysInMonth=30}else if(FirstDate.getUTCDate()<31&&date.getUTCMonth()===8){daysInMonth=30}else if(FirstDate.getUTCDate()===31&&date.getUTCMonth()===8){daysInMonth=31}else if(FirstDate.getUTCDate()<31&&date.getUTCMonth()===9){daysInMonth=31}else if(FirstDate.getUTCDate()===31&&date.getUTCMonth()===9){daysInMonth=30}else if(FirstDate.getUTCDate()<31&&date.getUTCMonth()===10){daysInMonth=30}else if(FirstDate.getUTCDate()===31&&date.getUTCMonth()===10){daysInMonth=31}else if(FirstDate.getUTCDate()<31&&date.getUTCMonth()===11){daysInMonth=31}else if(FirstDate.getUTCDate()===31&&date.getUTCMonth()===11){daysInMonth=31}var year=date.getUTCFullYear();if(q===12&&year%4===0&&year/100%4!==0&&date.getUTCMonth()===1||q===12&&(year+1900)/400%4===0&&date.getUTCMonth()===1){daysInMonth=29}if(q===12&&year%4===0&&year/100%4!==0&&date.getUTCMonth()===0&&date.getUTCDate()===30||q===12&&(year+1900)/400%4===0&&date.getUTCMonth()===0&&date.getUTCDate()===30){daysInMonth=30}if(q===12&&year%4===0&&year/100%4!==0&&date.getUTCMonth()===0&&date.getUTCDate()===31||q===12&&(year+1900)/400%4===0&&date.getUTCMonth()===0&&date.getUTCDate()===31){daysInMonth=29}if(q===12&&year%4===0&&year/100%4!==0&&date.getUTCMonth()===0&&date.getUTCDate()===29||q===12&&(year+1900)/400%4===0&&date.getUTCMonth()===0&&date.getUTCDate()===29){daysInMonth=31}if(q===12&&date.getUTCDate()===29&&date.getUTCMonth()===1&&FirstDate.getUTCDate()>29){daysInMonth=30}if(q===12&&date.getUTCDate()===29&&date.getUTCMonth()===1&&FirstDate.getUTCDate()>30){daysInMonth=31}if(q===12&&date.getUTCDate()===28&&date.getUTCMonth()===1&&FirstDate.getUTCDate()>30){daysInMonth=31}if(i>0){daysInMonth=daysInMonth+gap;daysPassed+=daysInMonth;if(i<=monthsBefore){if(i===1){TotBalOpen=InBal}else{TotBalOpen=TotBal}TotPerInt=TotBalOpen*eq_p;if(i>0){TotBal=TotBalOpen+TotPerInt}if(i===monthsBefore){TotBal=InDepFV}}else{p+=1;dep_pow=p/12*q;if(i===monthsBefore+1){iDep=MonthlyDep}else{iDep=MonthlyDep*mathjs.pow(1+g_p,dep_pow)}DepPrincBal+=iDep;InBal=InDepFV*mathjs.pow(1+eq_p,dep_pow);InIntBal=InBal-InDep;if(i===monthsBefore+1){TotBalOpen=InDepFV}else{TotBalOpen=TotBal}if(g!==eq_p&&q!==1){DepBal=PerPay*(mathjs.pow(1+eq_p,dep_pow)-mathjs.pow(1+g_p,dep_pow))*(1+eq_p*Type)/(eq_p-g_p)}else if(g!==eq_p&&q===1){DepBal=PerPay*(mathjs.pow(1+eq_p,dep_pow)-mathjs.pow(1+g,dep_pow))*(1+eq_p*Type)/(eq_p-g)}else if(g===eq_p){DepBal=PerPay*i*mathjs.pow(1+eq_p,dep_pow-1)*(1+eq_p*Type)}DepIntBal=DepBal-DepPrincBal;TotPrincBal=InDep+DepPrincBal;TotIntBal=InIntBal+DepIntBal;TotBal=TotPrincBal+TotIntBal;if(i>=monthsBefore){TotPerInt=TotBalOpen*eq_p}if(-iDep>TotBalOpen-FinBal&&Subject>1){TotBal=FinBal;TotPerInt=TotBalOpen*r_monthly;iDep=-TotBalOpen-TotPerInt+FinBal}if(i%12===daysInMonth){iDep=0}if(q===daysInMonth){iDep=0}}TotIntBal2+=TotPerInt}if(TotBalOpen<0.001+FinBal){TotIntBal2=0}if(i===0){TotBal=InDep}LastDate=mathjs.floor(date.getTime()/milisecondsInADay)}return[TotIntBal2,LastDate,InDep+TotIntBal2]}omni.define("get_how_long_months",function(last_for_years){return monthDebt});omni.define("get_num_withdrawals",function(){return periods});omni.define("get_monthly_withdrawal",function(){return monthly_withdrawal});omni.define("get_total_withdrawal",function(){return total_withdrawal});omni.define("get_interest_earned",function(){return interest_earned});omni.define("get_last_withdrawal_date",function(){return last_withdrawal_date});omni.define("get_bal_first_withdrawal",function(){return bal_first_withdrawal});omni.define("get_bal_last_withdrawal",function(){return bal_last_withdrawal});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Savings withdrawal works out M from I'd like to know…, Balance of your savings and First withdrawal on. Nothing is looked up on this page: m is computed from i'd like to know… and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Savings withdrawal calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Savings withdrawal: it takes 21 numbers and reports M.</p><p>In the form&#039;s own words, Growth rate of withdrawals = (Monthly growth rate + 1)^(Payment frequency) − 1.</p><p>The result panel carries M, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 21 boxes, and nothing else.</p><ul><li><strong>I&#039;d like to know…</strong> — a plain number, no unit</li><li><strong>Balance of your savings</strong> — in USD. The current balance of your savings.</li><li><strong>First withdrawal on</strong> — a plain number, no unit, entered as a date. If you choose a future date, your current balance stated above will increase according to the average interest rate.</li><li><strong>Period of withdrawals</strong> — in years / months</li><li><strong>Withdrawal amount</strong> — in USD. The amount you are planning to withdraw monthly.</li><li><strong>Annual interest rate</strong> — in percent. The average interest rate or APY on your savings.</li><li><strong>Compounding method</strong> — a plain number, no unit</li><li><strong>Timing of withdrawals</strong> — a plain number, no unit</li><li><strong>Growth rate of withdrawals</strong> — in percent. The percentage growth rate of your withdrawals over a year.</li><li><strong>Monthly growth rate</strong> — in percent. The percentage growth rate of the monthly withdrawals. Note, that periodic and annual growth rates are linked together: if you set one, the other will be calculated according to annuity frequency. Available only at fixed length annuity.</li><li><strong>Remaining balance</strong> — in USD. Set an amount if you want to have some money left at the end of the withdrawal period.</li><li><strong>Planned age to retire</strong> — in yrs</li><li><strong>Set term by…</strong> — a plain number, no unit</li><li><strong>Var time</strong> — a plain number, no unit</li><li><strong>Inflation rate before you retire</strong> — in percent. The expected average inflation rate before retirement.</li><li><strong>Var rep</strong> — a plain number, no unit</li><li><strong>Payment frequency</strong> — a plain number, no unit</li><li><strong>Var type</strong> — a plain number, no unit</li><li><strong>Payment frequency</strong> — a plain number, no unit. Interval between the regular withdrawals.</li><li><strong>Display…</strong> — a plain number, no unit</li><li><strong>Schedule starts from…</strong> — a plain number, no unit, entered as a date</li></ul><p>The result box is M. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, I&amp;#039;d like to know… = 2, Balance of your savings = 100000 USD, Period of withdrawals = 120 yrsmos, Withdrawal amount = 500 USD, Annual interest rate = 2 perc, Compounding method = 4, Timing of withdrawals = 0, Remaining balance = 7 USD, Planned age to retire = 50 yrs, Set term by… = 9, Var time = 10, Inflation rate before you retire = 2 perc, Var rep = 3, Payment frequency = 1, Var type = 5, Display… = 6, First withdrawal on = Sun 1 March 2026, Last withdrawal date = Sun 1 March 2026 and Schedule starts from… = Sun 1 March 2026 gives <strong>Payment frequency</strong> = 12.</p><ul><li><strong>Payment frequency</strong> = 12</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Growth rate of withdrawals</strong> = <code>(Monthly growth rate + 1)^(Payment frequency) − 1</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Payment frequency</strong> = 12. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Period of withdrawals lists 9 options and opens on years / months. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Growth rate of withdrawals</strong> = <code>(Monthly growth rate + 1)^(Payment frequency) − 1</code></li><li><strong>Payment frequency</strong> = <code>ln(Growth rate of withdrawals + 1) ÷ ln(Monthly growth rate + 1)</code></li><li><strong>Monthly growth rate</strong> = <code>(Growth rate of withdrawals + 1)^(1 ÷ Payment frequency) − 1</code></li><li><strong>Last withdrawal date</strong> = <code>((get_last_withdrawal_date()))</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Growth rate of withdrawals</strong> = <code>(Monthly growth rate + 1)^(Payment frequency) − 1</code> — the form to use when Monthly growth rate and Payment frequency are the values you have.</li><li><strong>Payment frequency</strong> = <code>ln(Growth rate of withdrawals + 1) ÷ ln(Monthly growth rate + 1)</code> — the form to use when Growth rate of withdrawals and Monthly growth rate are the values you have.</li><li><strong>Monthly growth rate</strong> = <code>(Growth rate of withdrawals + 1)^(1 ÷ Payment frequency) − 1</code> — the form to use when Growth rate of withdrawals and Payment frequency are the values you have.</li><li><strong>Last withdrawal date</strong> = <code>((get_last_withdrawal_date()))</code> — the form to use when the other values are known.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Growth rate of withdrawals, Payment frequency and Monthly growth rate can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — I&#039;d like to know..., from 2 to 4 — and the answers go from <strong>Payment frequency</strong> 12 to <strong>Payment frequency</strong> 12.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Period of withdrawals, Annual interest rate and Growth rate of withdrawals carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> M is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>I&#039;d like to know… left as a guess.</strong> Anything typed into I&amp;#039;d like to know… is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Balance of your savings left as a guess.</strong> Anything typed into Balance of your savings is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert I&#039;d like to know... to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have I&#039;d like to know…, Balance of your savings, First withdrawal on and Period of withdrawals ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with I&amp;#039;d like to know… — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check M against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind M is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The chips cover years / months and percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It counts in whole days.</strong> The differences are counted in whole days, so an answer is a date or a number of days rather than an interval in hours. Expect a day&#039;s uncertainty if the event itself happened at an unknown time.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: I&#039;d like to know…, Balance of your savings and First withdrawal on measured, M wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/real-gdp">Real GDP Calculator</a>, <a href="/finance/real-interest-rate">Real interest rate Calculator</a> and <a href="/finance/real-rate-of-return">Real rate of return Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Savings withdrawal is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Savings withdrawal calculator work out?', 'a' => 'M, from Monthly growth rate and Payment frequency. The relationship is Growth rate of withdrawals = (Monthly growth rate + 1)^(Payment frequency) − 1.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            I'd like to know…, Balance of your savings (USD), First withdrawal on, Period of withdrawals (years / months), Withdrawal amount (USD). With i'd like to know…, balance of your savings and first withdrawal on in place, M can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Growth rate of withdrawals, Payment frequency, Monthly growth rate and Last withdrawal date can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Payment frequency = 12. The figures come from I\'d like to know... as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            M is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave I\'d like to know... blank and the page solves for it, reporting M instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of M keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/real-gdp', 'name' => 'Real GDP Calculator'],
            ['path' => '/finance/real-interest-rate', 'name' => 'Real interest rate Calculator'],
            ['path' => '/finance/real-rate-of-return', 'name' => 'Real rate of return Calculator'],
        ],
        'authors' => [],
    ],
];
