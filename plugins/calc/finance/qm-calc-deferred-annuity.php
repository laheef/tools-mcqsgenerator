<?php

/**
 * Deferred annuity
 * /finance/deferred-annuity
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Deferred annuity',
    'meta' => ['title' => 'Deferred annuity — Formula, Steps & Examples', 'description' => 'Deferred annuity works out end of deferral phase and last withdrawal and reports both. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Deferred annuity Calculator', 'updated' => '2026-09-01'],
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
                            'options' => ['how much I can withdraw' => '1', 'how long my annuity will last' => '2'],
                            'dataset' => 'mode options',
                            'control' => 'DROPDOWN',
                            'default' => 'how much I can withdraw',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'advanced_settings',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Show advanced settings' => '1', '' => '0'],
                            'dataset' => 'advanced settings',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Deferral (accumulation) phase',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Def',
                            'label' => 'I\'d like to defer...',
                            'type' => 'select',
                            'options' => ['until a given date' => '2', 'by a given period' => '1'],
                            'dataset' => 'defer options',
                            'control' => 'DROPDOWN',
                            'default' => 'until a given date',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tDef',
                            'label' => 'Deferral period',
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
                        ['name' => 'StartDate', 'label' => 'End of deferral phase', 'type' => 'date', 'help' => 'This date is considered as the first day of the payout phase.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'InDep',
                            'label' => 'Lump sum payment',
                            'type' => 'number',
                            'help' => 'This will be the opening balance at the beginning of the annuity accumulation phase.',
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
                            'name' => 'Deposit',
                            'label' => 'Monthly contribution',
                            'type' => 'number',
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
                            'name' => 'rDef',
                            'label' => 'Expected rate of return',
                            'type' => 'number',
                            'help' => 'The average interest rate or rate of return during the accumulation phase.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1.5',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Deferral settings',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'TypeDef',
                            'label' => 'Timing of contribution',
                            'type' => 'select',
                            'options' => ['Ordinary annuity (end of period)' => '2', 'Annuity due (beginning of period)' => '1'],
                            'dataset' => 'contribution timing',
                            'control' => 'DROPDOWN',
                            'default' => 'Ordinary annuity (end of period)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gDef',
                            'label' => 'Growth rate of contribution',
                            'type' => 'number',
                            'help' => 'The percentage growth rate of your contribution over a year.',
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
                            'name' => 'g_pDef',
                            'label' => 'Monthly growth rate',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            The percentage growth rate of the monthly contributions. Note, that periodic and annual growth rates are linked together: if you set one, the other will be calculated according to the annuity frequency. Available only for fixed length annuities.
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
            'title' => 'Payout phase (for withdrawals)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 't',
                            'label' => 'Length of withdrawals',
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
                            'name' => 'PerPay',
                            'label' => 'Withdrawal amount',
                            'type' => 'number',
                            'help' => 'The amount you\'re planning to withdraw monthly.',
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
                            'name' => 'q',
                            'label' => 'Withdrawal frequency',
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
                            'name' => 'r',
                            'label' => 'Expected rate of return',
                            'type' => 'number',
                            'help' => 'The average interest rate or rate of return during the payout phase.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1.5',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Payout phase settings',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Type',
                            'label' => 'Timing of withdrawals',
                            'type' => 'select',
                            'options' => ['Ordinary annuity (end of period)' => '2', 'Annuity due (beginning of period)' => '1'],
                            'dataset' => 'contribution timing',
                            'control' => 'DROPDOWN',
                            'default' => 'Ordinary annuity (end of period)',
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
                            'label' => 'Periodic growth rate',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            The percentage growth rate of your periodic withdrawals. Note, that periodic and annual growth rates are linked together: if you set one, the other will be calculated according to the annuity frequency. Available only for fixed length annuities.
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
                            'name' => 'CompFreq_m',
                            'label' => 'Compounding method',
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
                            'dataset' => 'compound freq',
                            'control' => 'DROPDOWN',
                            'help' => 'The frequency interest is added to your balance. Note, that it applies for the whole lifetime of the annuity.',
                            'default' => 'Monthly',
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
                                ['when' => 'Subject == 1 and Type == 2', 'text' => 'You can withdraw {{monthly_withdrawal.monetaryValue}} at the end of each month to deplete your annuity entirely.'],
                                ['when' => 'Subject == 1 and Type == 1', 'text' => 'You can withdraw {{monthly_withdrawal.monetaryValue}} at the beginning of each month to deplete your annuity entirely.'],
                                ['when' => 'Subject == 1 and g > 0', 'text' => 'You can withdraw {{monthly_withdrawal.monetaryValue}} initially and increase it gradually by {{g.formattedValue}} a year.'],
                                ['when' => 'Subject == 2', 'text' => 'Your annuity will last for {{last_for_years.value}}&nbsp;year(s) and {{last_for_months.value}}&nbsp;month(s) from the first day of withdrawal.'],
                                ['when' => 'num_withdrawals > 1200', 'text' => 'Your&nbsp;annuity balance&nbsp;will&nbsp;last&nbsp;for over&nbsp;100&nbsp;years!'],
                                ['when' => 'Subject == 2 and total_return == -1', 'text' => 'The length of withdrawal is infinite since the monthly interest earned exceeds the withdrawal amount.'],
                                ['when' => 'total_contrib == 0', 'text' => 'Nothing was put into the annuity, so you can\'t withdraw anything.'],
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
                        ['name' => 'first_day', 'label' => 'Schedule starts from...', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'qDef',
                            'label' => 'Q def',
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
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_contrib',
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
                            'name' => 'balance_1st_withdrawal',
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
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'g + 1 = (1 + g_p) ^ q',
            'results' => ['g' => 'pow(g_p + 1, q) - 1', 'g_p' => 'pow(g + 1, 1/q) - 1', 'q' => 'log(g + 1)/log(g_p + 1)'],
        ],
        [
            'title' => 'gDef + 1= (1 + g_pDef) ^ qDef',
            'results' => ['qDef' => 'log(gDef + 1)/log(g_pDef + 1)', 'g_pDef' => 'pow(gDef + 1, 1/qDef) - 1', 'gDef' => 'pow(g_pDef + 1, qDef) - 1'],
        ],
        [
            'title' => 'StartDate = first_day + 365.2425 * 15',
            'results' => ['StartDate' => 'first_day + 438291/80', 'first_day' => 'StartDate - 438291/80'],
        ],
        [
            'title' => 'last_withdrawal = get_last_withdrawal()',
            'results' => ['last_withdrawal' => 'get_last_withdrawal()'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";var qDef=12,milisecondsInADay=24*60*60*1000;var balance_1st_withdrawal,monthly_withdrawal,total_contrib,num_withdrawals,last_withdrawal,last_for_years,last_for_months;omni.define("main_calculation",function(Subject,Def,tDef,StartDate,InDep,Deposit,rDef,TypeDef,gDef,g_pDef,t,PerPay,q,r,Type,g,g_p,CompFreq_m,first_day){var TotIntBal2=0,iDep=0,InBal=InDep,DepPrincBal=0,InIntBal=0,DepBal=0,DepIntBal=0,TotPrincBal=InDep,TotIntBal=0,TotBal=0,TotPerInt=0,TotBalOpen=InDep,m=CompFreq_m,dep_pow=0,TotContr=0,MonthlyDep=0,TotDep=0,p=0,FinBal=0,daysPassed=0,periodsCount=0;var periods_chart,yearsBefore,daysInMonth,date,DepBalDef,LastDate,periods=q*t;var ex=mathjs.e;if(InDep+Deposit===0){return-1}if(Def===2){yearsBefore=(mathjs.floor(StartDate)-mathjs.floor(first_day))/365;if(yearsBefore<0.002){yearsBefore=0}}else{yearsBefore=tDef}var eq_base;var periodsDef=yearsBefore*qDef;if(m===0){var continuous_rDef=mathjs.pow(ex,rDef)-1;m=1;eq_base=1+continuous_rDef/m}else{eq_base=1+rDef/m}var eq_powerDef=m/qDef;var eq_pDef=mathjs.pow(eq_base,eq_powerDef)-1;if(m===0){var continuous_r=mathjs.pow(ex,r)-1;m=1;eq_base=1+continuous_r/m}else{eq_base=1+r/m}var eq_power=m/q;var eq_p=mathjs.pow(eq_base,eq_power)-1;var eq_base_monthly;if(m===0){var continuous_r_monthly=mathjs.pow(ex,r)-1;m=1;eq_base_monthly=1+continuous_r_monthly/m}else{eq_base_monthly=1+r/m}var eq_power_monthly=m/12;var r_monthly=mathjs.pow(eq_base_monthly,eq_power_monthly)-1;var InDepFV=InDep*mathjs.pow(1+eq_pDef,12*yearsBefore);if(g!==eq_pDef&&qDef!==1){DepBalDef=Deposit*(mathjs.pow(1+eq_pDef,periodsDef)-mathjs.pow(1+g_pDef,periodsDef))*(1+eq_pDef*TypeDef)/(eq_pDef-g_pDef)}else if(g!==eq_pDef&&qDef===1){DepBalDef=Deposit*(mathjs.pow(1+eq_pDef,periodsDef)-mathjs.pow(1+gDef,periodsDef))*(1+eq_pDef*TypeDef)/(eq_pDef-gDef)}else if(g===eq_pDef){DepBalDef=Deposit*periodsDef*mathjs.pow(1+eq_pDef,periodsDef-1)*(1+eq_pDef*TypeDef)}InDepFV=InDepFV+DepBalDef;if(Subject===1){var PrincBal=InDepFV*mathjs.pow(1+eq_p,periods);DepBal=FinBal-PrincBal;if(g!==eq_p&&q!==1){PerPay=DepBal/((mathjs.pow(1+eq_p,periods)-mathjs.pow(1+g_p,periods))*(1+eq_p*Type)/(eq_p-g_p))}else if(g!==eq_p&&q===1){PerPay=DepBal/((mathjs.pow(1+eq_p,periods)-mathjs.pow(1+g,periods))*(1+eq_p*Type)/(eq_p-g))}else if(g===eq_p){PerPay=DepBal/(periods*mathjs.pow(1+eq_p,periods-1)*(1+eq_p*Type))}FinBal=PrincBal+DepBal}if(Subject===2){g=0;g_p=0;PerPay=-PerPay;periods=mathjs.log((eq_p*(FinBal+PerPay*Type)+PerPay)/(eq_p*InDepFV+PerPay*(1+eq_p*Type)))/mathjs.log(eq_p+1);if(isNaN(periods)){return-1}t=periods/q}var monthsBefore=mathjs.floor(yearsBefore*qDef);var gap=mathjs.floor(StartDate)-mathjs.floor(first_day);if(Subject===1){periods_chart=t*12+monthsBefore}else{periods_chart=t*12+monthsBefore+10}MonthlyDep=PerPay;for(var i=0;i<=periods_chart;i++){if(i!==monthsBefore){gap=0}date=new Date((first_day+daysPassed+gap)*milisecondsInADay);daysInMonth=getDaysInMonth(date);if(i>0){daysInMonth=daysInMonth+gap;daysPassed+=daysInMonth;if(i<=monthsBefore){dep_pow=i/12*qDef;if(i===1){TotBalOpen=InBal}else{TotBalOpen=TotBal}if(i===1){iDep=Deposit}else{iDep=Deposit*mathjs.pow(1+g_pDef,dep_pow-1)}DepPrincBal+=iDep;InBal=InDep*mathjs.pow(1+eq_pDef,dep_pow);InIntBal=InBal-InDep;if(g!==eq_pDef&&qDef!==1){DepBal=Deposit*(mathjs.pow(1+eq_pDef,dep_pow)-mathjs.pow(1+g_pDef,dep_pow))*(1+eq_pDef*TypeDef)/(eq_pDef-g_pDef)}else if(gDef!==eq_pDef&&qDef===1){DepBal=Deposit*(mathjs.pow(1+eq_pDef,dep_pow)-mathjs.pow(1+gDef,dep_pow))*(1+eq_pDef*TypeDef)/(eq_pDef-gDef)}else if(gDef===eq_pDef){DepBal=Deposit*i*mathjs.pow(1+eq_pDef,dep_pow-1)*(1+eq_pDef*TypeDef)}DepIntBal=DepBal-DepPrincBal;TotPrincBal=InDep+DepPrincBal;TotIntBal=InIntBal+DepIntBal;TotBal=TotPrincBal+TotIntBal;TotPerInt=-(TotBalOpen-TotBal+iDep);if(i===monthsBefore){TotBal=InDepFV}}if(i===monthsBefore+1){TotContr=TotDep}if(i>monthsBefore){p+=1;dep_pow=p/12*q;if(i===monthsBefore+1){iDep=MonthlyDep}else{iDep=MonthlyDep*mathjs.pow(1+g_p,dep_pow-1)}DepPrincBal+=iDep;InBal=InDepFV*mathjs.pow(1+eq_p,dep_pow);InIntBal=InBal-InDep;if(i===monthsBefore+1){TotBalOpen=InDepFV}else{TotBalOpen=TotBal}if(g!==eq_p&&qDef!==1){DepBal=PerPay*(mathjs.pow(1+eq_p,dep_pow)-mathjs.pow(1+g_p,dep_pow))*(1+eq_p*Type)/(eq_p-g_p)}else if(g!==eq_p&&qDef===1){DepBal=PerPay*(mathjs.pow(1+eq_p,dep_pow)-mathjs.pow(1+g,dep_pow))*(1+eq_p*Type)/(eq_p-g)}else if(g===eq_p){DepBal=PerPay*i*mathjs.pow(1+eq_p,dep_pow-1)*(1+eq_p*Type)}DepIntBal=DepBal-DepPrincBal;TotPrincBal=InDep+DepPrincBal;TotIntBal=InIntBal+DepIntBal;TotBal=TotPrincBal+TotIntBal;if(i>=monthsBefore){TotPerInt=-(TotBalOpen-TotBal+iDep)}if(-iDep>TotBalOpen-FinBal&&Subject>1){TotBal=FinBal;TotPerInt=TotBalOpen*r_monthly;iDep=-TotBalOpen-TotPerInt+FinBal}}TotDep+=iDep;TotIntBal2+=TotPerInt}if(TotBalOpen<0.01+FinBal){TotIntBal2===0}if(i===0){TotBal=InDep}if(TotBalOpen>0.01+FinBal&&TotBal<0.01+FinBal){LastDate=date;periodsCount=p}}num_withdrawals=periodsCount;last_withdrawal=LastDate.getTime()/milisecondsInADay;total_contrib=TotContr;monthly_withdrawal=-PerPay;balance_1st_withdrawal=InDepFV;last_for_years=parseInt(Math.trunc(periods/12));last_for_months=parseInt(mathjs.ceil(periods-last_for_years*12));return TotIntBal2});omni.define("get_num_withdrawals",function(){return num_withdrawals});omni.define("get_last_withdrawal",function(){return last_withdrawal});omni.define("get_total_contrib",function(total_return){if(total_return===-1){return 0}else{return total_contrib}});omni.define("get_monthly_withdrawal",function(){return monthly_withdrawal});omni.define("get_balance_1st_withdrawal",function(){return balance_1st_withdrawal});omni.define("get_last_for_years",function(){return last_for_years});omni.define("get_last_for_months",function(){return last_for_months});function getDaysInMonth(date){var year=date.getFullYear();var month=date.getMonth();return new Date(year,month+1,0).getDate()}//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Enter Schedule starts from… into Deferred annuity and the answer comes back as End of deferral phase and Growth rate of contribution. The arithmetic is the whole method: end of deferral phase is worked out from schedule starts from… by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Deferred annuity calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Deferred annuity: it takes 1 number and reports End of deferral phase, Growth rate of contribution and Monthly growth rate.</p><p>Written with the labels from the form, Growth rate of withdrawals = (Periodic growth rate + 1)^(Withdrawal frequency) − 1.</p><p>The result panel carries End of deferral phase, Growth rate of contribution, Monthly growth rate and Withdrawal frequency, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 1 box, and nothing else.</p><ul><li><strong>Schedule starts from…</strong> — a plain number, no unit, entered as a date</li></ul><p>The result boxes are End of deferral phase, Growth rate of contribution in percent, Monthly growth rate in percent, Withdrawal frequency, Growth rate of withdrawals in percent, Periodic growth rate in percent, Q def, Last withdrawal; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, I&amp;#039;d like to know… = 1, Advanced settings = 0, I&amp;#039;d like to defer… = 2, Deferral period = 120 yrsmos, Lump sum payment = 20000 USD, Monthly contribution = 500 USD, Expected rate of return = 1.5 perc, Timing of contribution = 2, Length of withdrawals = 240 yrsmos, Withdrawal amount = 1000 USD, Expected rate of return = 1.5 perc, Timing of withdrawals = 2, Compounding method = 12, M = 10, Remaining balance = 2 USD and Schedule starts from… = Sun 1 March 2026; the answers are <strong>Withdrawal frequency</strong> = 12 and <strong>End of deferral phase</strong> = Thu 28 February 2041.</p><ul><li><strong>Withdrawal frequency</strong> = 12</li><li><strong>End of deferral phase</strong> = Thu 28 February 2041</li></ul><p>That is <strong>Growth rate of withdrawals</strong> = <code>(Periodic growth rate + 1)^(Withdrawal frequency) − 1</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Withdrawal frequency</strong> = 12 and <strong>End of deferral phase</strong> = Thu 28 February 2041. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Growth rate of contribution lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Growth rate of withdrawals</strong> = <code>(Periodic growth rate + 1)^(Withdrawal frequency) − 1</code></li><li><strong>Periodic growth rate</strong> = <code>(Growth rate of withdrawals + 1)^(1 ÷ Withdrawal frequency) − 1</code></li><li><strong>Withdrawal frequency</strong> = <code>ln(Growth rate of withdrawals + 1) ÷ ln(Periodic growth rate + 1)</code></li><li><strong>Q def</strong> = <code>ln(Growth rate of contribution + 1) ÷ ln(Monthly growth rate + 1)</code></li><li><strong>Monthly growth rate</strong> = <code>(Growth rate of contribution + 1)^(1 ÷ Q def) − 1</code></li><li><strong>Growth rate of contribution</strong> = <code>(Monthly growth rate + 1)^(Q def) − 1</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Growth rate of withdrawals</strong> = <code>(Periodic growth rate + 1)^(Withdrawal frequency) − 1</code> — the form to use when Periodic growth rate and Withdrawal frequency are the values you have.</li><li><strong>Periodic growth rate</strong> = <code>(Growth rate of withdrawals + 1)^(1 ÷ Withdrawal frequency) − 1</code> — the form to use when Growth rate of withdrawals and Withdrawal frequency are the values you have.</li><li><strong>Withdrawal frequency</strong> = <code>ln(Growth rate of withdrawals + 1) ÷ ln(Periodic growth rate + 1)</code> — the form to use when Growth rate of withdrawals and Periodic growth rate are the values you have.</li><li><strong>Q def</strong> = <code>ln(Growth rate of contribution + 1) ÷ ln(Monthly growth rate + 1)</code> — the form to use when Growth rate of contribution and Monthly growth rate are the values you have.</li><li><strong>Monthly growth rate</strong> = <code>(Growth rate of contribution + 1)^(1 ÷ Q def) − 1</code> — the form to use when Growth rate of contribution and Q def are the values you have.</li><li><strong>Growth rate of contribution</strong> = <code>(Monthly growth rate + 1)^(Q def) − 1</code> — the form to use when Monthly growth rate and Q def are the values you have.</li><li><strong>End of deferral phase</strong> = <code>Schedule starts from... + 438291 ÷ 80</code> — the form to use when Schedule starts from… are the values you have.</li><li><strong>Schedule starts from…</strong> = <code>End of deferral phase − 438291 ÷ 80</code> — the form to use when End of deferral phase are the values you have.</li></ul><p>Any one of Growth rate of withdrawals, Periodic growth rate and Withdrawal frequency can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — I&#039;d like to know..., from 1 to 2 — and the answers go from <strong>Withdrawal frequency</strong> 12 and <strong>End of deferral phase</strong> Thu 28 February 2041 to <strong>Withdrawal frequency</strong> 12 and <strong>End of deferral phase</strong> Thu 28 February 2041.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> End of deferral phase, Growth rate of contribution and Monthly growth rate are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Schedule starts from… left as a guess.</strong> Anything typed into Schedule starts from… is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Schedule starts from... is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Schedule starts from…</strong> takes a plain number with no unit attached. The page reads it when it works out End of deferral phase. Have it to hand before you start: Schedule starts from… is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>End of deferral phase</strong> is a plain number and the page's own defaults put it at Thu 28 February 2041. It is computed from Schedule starts from…, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Growth rate of contribution</strong> is a percent figure. It is computed from Monthly growth rate and Q def, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Monthly growth rate</strong> is a percent figure. It is computed from Growth rate of contribution and Q def, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Withdrawal frequency</strong> is a plain number and the page's own defaults put it at 12. It is computed from Growth rate of withdrawals and Periodic growth rate, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Growth rate of withdrawals</strong> is a percent figure. It is computed from Periodic growth rate and Withdrawal frequency, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Periodic growth rate</strong> is a percent figure. It is computed from Growth rate of withdrawals and Withdrawal frequency, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Q def</strong> is a plain number. It is computed from Growth rate of contribution and Monthly growth rate, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Last withdrawal</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind End of deferral phase is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It counts in whole days.</strong> Dates are compared as calendar days, not as moments: two dates that differ by a few hours on the same day give the same answer, and there is no time-of-day input to set.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Schedule starts from… are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Schedule starts from… and the number you are missing is End of deferral phase and Growth rate of contribution.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/billable-hours">Billable hours Calculator</a>, <a href="/finance/bitcoin-etf">Bitcoin ETF Calculator</a> and <a href="/finance/biweekly-mortgage">Biweekly mortgage</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Deferred annuity calculator work out?', 'a' => <<<'TXT'
            End of deferral phase, Growth rate of contribution, Monthly growth rate and Withdrawal frequency, from Periodic growth rate and Withdrawal frequency. The relationship is Growth rate of withdrawals = (Periodic growth rate + 1)^(Withdrawal frequency) − 1.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Schedule starts from…. With schedule starts from… in place, End of deferral phase can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Growth rate of withdrawals, Periodic growth rate, Withdrawal frequency and Q def blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Withdrawal frequency = 12 and End of deferral phase = Thu 28 February 2041. That comes from the page's own defaults, entered in Schedule starts from...; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of End of deferral phase is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Schedule starts from... left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to End of deferral phase at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/billable-hours', 'name' => 'Billable hours Calculator'],
            ['path' => '/finance/bitcoin-etf', 'name' => 'Bitcoin ETF Calculator'],
            ['path' => '/finance/biweekly-mortgage', 'name' => 'Biweekly mortgage'],
        ],
        'authors' => [],
    ],
];
