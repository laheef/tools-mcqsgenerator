<?php

/**
 * Powerball
 * /finance/powerball
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Powerball',
    'meta' => ['title' => 'Powerball Calculator: Formula, Steps & Examples', 'description' => 'Powerball takes how much did you win?, lump sum payout percentage and what is your filing status? and returns final payout on.... Any box can be the unknown.', 'h1' => 'Powerball Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'InDep',
                            'label' => 'How much did you win?',
                            'type' => 'number',
                            'prefix' => '$',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '100000000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'CashRate',
                            'label' => 'Lump sum payout percentage',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '52',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Stat',
                            'label' => 'What is your filing status?',
                            'type' => 'select',
                            'options' => ['Single' => '1', 'Married filing jointly' => '2', 'Married filing separately' => '3', 'Heads of household' => '4'],
                            'dataset' => 'DATA_Stat',
                            'control' => 'DROPDOWN',
                            'default' => 'Single',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'TaxState',
                            'label' => 'Where do you live?',
                            'type' => 'select',
                            'options' => [
                                'Alabama' => '0.00',
                                'Alaska' => '0.00',
                                'Arizona' => '0.025',
                                'Arkansas' => '0.037',
                                'California' => '0.00',
                                'Colorado' => '0.044',
                                'Connecticut' => '0.0699',
                                'Delaware' => '0.066',
                                'Florida' => '0.00',
                                'Georgia' => '0.0499',
                                'Hawaii' => '0.00',
                                'Idaho' => '0.053',
                                'Illinois' => '0.0495',
                                'Indiana' => '0.0295',
                                'Iowa' => '0.038',
                                'Kansas' => '0.0558',
                                'Kentucky' => '0.035',
                                'Louisiana' => '0.03',
                                'Maine' => '0.0915',
                                'Maryland' => '0.095',
                                'Massachusetts' => '0.09',
                                'Michigan' => '0.0425',
                                'Minnesota' => '0.0985',
                                'Mississippi' => '0.04',
                                'Missouri' => '0.047',
                                'Montana' => '0.0565',
                                'Nebraska' => '0.0455',
                                'Nevada' => '0.00',
                                'New Hampshire' => '0.00',
                                'New Jersey' => '0.1075',
                                'New Mexico' => '0.059',
                                'New York' => '0.109',
                                'North Carolina' => '0.0399',
                                'North Dakota' => '0.029',
                                'Ohio' => '0.0275',
                                'Oklahoma' => '0.045',
                                'Oregon' => '0.099',
                                'Pennsylvania' => '0.0307',
                                'Rhode Island' => '0.0599',
                                'South Carolina' => '0.06',
                                'South Dakota' => '0.00',
                                'Tennessee' => '0.00',
                                'Texas' => '0.00',
                                'Utah' => '0.00',
                                'Vermont' => '0.0875',
                                'Virginia' => '0.0575',
                                'Washington' => '0.00',
                                'West Virginia' => '0.0482',
                                'Wisconsin' => '0.0765',
                                'Wyoming' => '0.00',
                                'Washington, D.C.' => '0.1075',
                            ],
                            'dataset' => 'DATA_tax',
                            'control' => 'DROPDOWN',
                            'help' => 'If you are a foreigner, consider the state in US where your ticket was purchased.',
                            'default' => 'Arizona',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        You may need to scroll the tables horizontally to see all of the results. *&nbsp;Additional Federal Tax (up to 37%, tax amount based on filing status minus the withheld 24% Federal Tax). ** The gross payout for lump sum payment is approximated by {{CashRate.formattedValue}}% of the total lottery prize. This is the only valid payout for foreigners.
                        TXT],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Yearly annuity payouts',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Rep',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['chart of balances' => '1', 'table of payment schedule' => '2', 'show all' => '3'],
                            'dataset' => 'Display...',
                            'control' => 'DROPDOWN',
                            'default' => 'table of payment schedule',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'TableFreq',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['monthly schedule' => '1', 'yearly schedule' => '2'],
                            'dataset' => 'Show me...',
                            'control' => 'DROPDOWN',
                            'default' => 'yearly schedule',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PayFreq',
                            'label' => '',
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
                            'dataset' => 'payfreq',
                            'control' => 'DROPDOWN',
                            'default' => 'Yearly',
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
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'GrossCash',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                        [
                            'name' => 'Diff1',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 3,
                    'place' => [0, 1, 2],
                    'fields' => [
                        [
                            'name' => 'TaxFedCash_24',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                        [
                            'name' => 'TotTaxFed_24',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                        [
                            'name' => 'Diff2',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 3,
                    'place' => [0, 1, 2],
                    'fields' => [
                        [
                            'name' => 'TaxFedCash',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                        [
                            'name' => 'TotTaxFed',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                        [
                            'name' => 'Diff3',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 3,
                    'place' => [0, 1, 2],
                    'fields' => [
                        [
                            'name' => 'TaxStateCash',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                        [
                            'name' => 'TotTaxState',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                        [
                            'name' => 'Diff4',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 3,
                    'place' => [0, 1, 2],
                    'fields' => [
                        [
                            'name' => 'NetCash',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                        [
                            'name' => 'TotCashFlow',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                        [
                            'name' => 'Diff5',
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
                            'name' => 'Subject',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Fixed payment annuity' => '1', 'Fixed length annuity' => '2'],
                            'dataset' => 'Annuity payout option',
                            'control' => 'DROPDOWN',
                            'default' => 'Fixed length annuity',
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
                            'help' => 'The future value of the annuity.',
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
                            'name' => 'PerPay',
                            'label' => 'Annuity payout',
                            'type' => 'number',
                            'help' => 'How much money is being withdrawn at equal intervals?',
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
                            'name' => 'g',
                            'label' => 'Annual growth rate',
                            'type' => 'number',
                            'help' => 'The percentage growth rate of the annuity payouts over a year.',
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
                            'name' => 'g_p',
                            'label' => 'Periodic growth rate',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            The percentage growth rate in the periodic payout. Note, that the periodic and annual growth rates are linked together: if you set one, the other will be calculated according to the payout frequency.
                            TXT,
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
                            'name' => 'Type',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Ordinary annuity' => '0', 'Annuity due' => '1'],
                            'dataset' => 'Type of annuity',
                            'control' => 'DROPDOWN',
                            'help' => 'Ordinary annuity: end of periods; annuity due: beginning of periods.',
                            'default' => 'Ordinary annuity',
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
                            'default' => '30',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'r',
                            'label' => 'Annuity rate',
                            'type' => 'number',
                            'help' => 'Set here yearly revenue on your annuity.',
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
                            'label' => '',
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
                            'dataset' => 'Compounding method',
                            'control' => 'DROPDOWN',
                            'help' => 'The frequency with which interest is added to the balance.',
                            'default' => 'Yearly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Timing',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['length' => '1', 'dates' => '2'],
                            'dataset' => 'Set term by...',
                            'control' => 'DROPDOWN',
                            'default' => 'length',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'StartDate', 'label' => '', 'type' => 'date'],
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
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'g + 1 = (1 + g_p) ^ CompFreq',
            'results' => ['CompFreq' => 'log(g + 1)/log(g_p + 1)', 'g' => 'pow(g_p + 1, CompFreq) - 1', 'g_p' => 'pow(g + 1, 1/CompFreq) - 1'],
        ],
        [
            'title' => 'EndDate = StartDate + 1',
            'results' => ['EndDate' => 'StartDate + 1', 'StartDate' => 'EndDate - 1'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";var milisecondsInADay=24*60*60*1000;function onResult(InDep,FinBal,m,q,t,VarType,VarTable,VarTime,VarRep,StartDate,EndDate,PerPay,r,g,g_p,VarSub,VarTax,VarStat){var periods=0;var dayInTerm=mathjs.floor(EndDate-StartDate);if(VarTime===1){periods=q*t}if(VarTime===2){periods=Math.ceil(dayInTerm/q)}var eq_p=getPerEqRate(q,m,r);if(VarSub===1){periods=getAnnuityPer(InDep,FinBal,PerPay,q,eq_p,VarType)}if(VarSub===2){PerPay=getPayOut(InDep,FinBal,periods,q,eq_p,g_p,g,VarType)}var k;if(q===1){k=12}else if(q===2){k=6}else if(q===4){k=3}else if(q===12){k=1}else if(q===24){k=12/24}else if(q===52){k=12/52}else if(q===26){k=12/26}else if(q===365){k=12/365}var perChart=periods*k;var daysPassed=0;var daysInMonth;var date;var i;var iDep=0;var YearDep=0;var TotCashFlow=0;var TotTaxFed=0;var TotTaxFed_24=0;var TotTaxState=0;var g_month=getMonthlyGrowthRate(g);var TaxAmFed_24=0;var TaxAmFed=0;var TaxAmState=0;var NetPayOut=0;for(i=0;i<=perChart;i++){date=new Date((StartDate+daysPassed)*milisecondsInADay);daysInMonth=getDaysInMonth(StartDate,date);if(i>0){daysPassed+=daysInMonth;if(i%k===0&&q<=12){iDep=PerPay*mathjs.pow(1+g_month,i-k)}if(i%k!==0&&q<=12){iDep=0}if(q>12){iDep=PerPay/k*mathjs.pow(1+g_month,i)}if(i%12===1){YearDep=0}YearDep+=-iDep;TaxAmFed_24=YearDep*0.24;TaxAmFed=getTaxFed(YearDep,VarStat)-TaxAmFed_24;if(TaxAmFed<0){TaxAmFed=0}TaxAmState=-iDep*VarTax;NetPayOut=-iDep-(TaxAmFed+TaxAmFed_24+TaxAmState);TotCashFlow+=NetPayOut;TotTaxFed_24+=TaxAmFed_24;TotTaxFed+=TaxAmFed;TotTaxState+=TaxAmState}}return{TotTaxFed_24:TotTaxFed_24,TotTaxFed:TotTaxFed,TotTaxState:TotTaxState,TotCashFlow:TotCashFlow}}omni.define("getTaxFedCash",function(GrossCash,VarStat){return getTaxFed(GrossCash,VarStat)});omni.define("getTotTaxFed_24",function(InDep,FinBal,m,q,t,VarType,VarTable,VarTime,VarRep,StartDate,EndDate,PerPay,r,g,g_p,VarSub,VarTax,VarStat){var result=onResult(InDep,FinBal,m,q,t,VarType,VarTable,VarTime,VarRep,StartDate,EndDate,PerPay,r,g,g_p,VarSub,VarTax,VarStat);return result.TotTaxFed_24});omni.define("getTotTaxFed",function(InDep,FinBal,m,q,t,VarType,VarTable,VarTime,VarRep,StartDate,EndDate,PerPay,r,g,g_p,VarSub,VarTax,VarStat){var result=onResult(InDep,FinBal,m,q,t,VarType,VarTable,VarTime,VarRep,StartDate,EndDate,PerPay,r,g,g_p,VarSub,VarTax,VarStat);return result.TotTaxFed});omni.define("getTotTaxState",function(InDep,FinBal,m,q,t,VarType,VarTable,VarTime,VarRep,StartDate,EndDate,PerPay,r,g,g_p,VarSub,VarTax,VarStat){var result=onResult(InDep,FinBal,m,q,t,VarType,VarTable,VarTime,VarRep,StartDate,EndDate,PerPay,r,g,g_p,VarSub,VarTax,VarStat);return result.TotTaxState});omni.define("getTotCashFlow",function(InDep,FinBal,m,q,t,VarType,VarTable,VarTime,VarRep,StartDate,EndDate,PerPay,r,g,g_p,VarSub,VarTax,VarStat){var result=onResult(InDep,FinBal,m,q,t,VarType,VarTable,VarTime,VarRep,StartDate,EndDate,PerPay,r,g,g_p,VarSub,VarTax,VarStat);return result.TotCashFlow});function getPayOut(InDep,FinBal,periods,q,eq_p,g_p,g,VarType){var PerPay;var PrincBal=InDep*mathjs.pow(1+eq_p,periods);var DepBal=FinBal-PrincBal;if(g_p!==eq_p&&q!==1){PerPay=DepBal/((mathjs.pow(1+eq_p,periods)-mathjs.pow(1+g_p,periods))*(1+eq_p*VarType)/(eq_p-g_p))}else if(g!==eq_p&&q===1){PerPay=DepBal/((mathjs.pow(1+eq_p,periods)-mathjs.pow(1+g,periods))*(1+eq_p*VarType)/(eq_p-g))}else if(g_p===eq_p){PerPay=DepBal/(periods*mathjs.pow(1+eq_p,periods-1)*(1+eq_p*VarType))}return PerPay}function getAnnuityPer(InDep,FinBal,PerPay,q,eq_p,VarType){var periods;PerPay=-PerPay;periods=mathjs.log((eq_p*(FinBal+PerPay*VarType)+PerPay)/(eq_p*InDep+PerPay*(1+eq_p*VarType)))/mathjs.log(eq_p+1);if(periods>0){periods=periods}else{periods=0}return periods}function getPerEqRate(q,m,r){var ex=Math.exp(1);var base;if(m===0){var continuous_r=mathjs.pow(ex,r)-1;m=1;base=1+continuous_r/m}else{base=1+r/m}var power=m/q;var eq_p=mathjs.round(mathjs.pow(base,power)-1,10);return eq_p}function getMonthlyGrowthRate(g){var Max_iterations=50000;var Min_precision=1e-10;var g_month=g/12;var oldG;var newG=g_month;var iteration=0;do{oldG=newG;var dividend_g=mathjs.pow(1+newG,12)-(g+1);var divisor_g=12*mathjs.pow(g+1,11);newG=newG-dividend_g/divisor_g;++iteration}while(Math.abs(oldG-newG)>Min_precision&&iteration<=Max_iterations);return newG}function getDaysInMonth(StartDate,date){var FirstDate=new Date(StartDate*milisecondsInADay);var daysInMonth;var day=FirstDate.getDate();var month=date.getMonth();var year=date.getFullYear();if(day<29&&month===0){daysInMonth=31}else if(day===29&&month===0){daysInMonth=30}else if(day===30&&month===0){daysInMonth=29}else if(day===31&&month===0){daysInMonth=28}else if(day<29&&month===1){daysInMonth=28}else if(day===29&&month===1){daysInMonth=29}else if(day===30&&month===1){daysInMonth=30}else if(day===31&&month===1){daysInMonth=31}else if(day<31&&month===2){daysInMonth=31}else if(day===31&&month===2){daysInMonth=30}else if(day<31&&month===3){daysInMonth=30}else if(day===31&&month===3){daysInMonth=31}else if(day<31&&month===4){daysInMonth=31}else if(day===31&&month===4){daysInMonth=30}else if(day<31&&month===5){daysInMonth=30}else if(day===31&&month===5){daysInMonth=31}else if(day<31&&month===6){daysInMonth=31}else if(day===31&&month===6){daysInMonth=31}else if(day<31&&month===7){daysInMonth=31}else if(day===31&&month===7){daysInMonth=30}else if(day<31&&month===8){daysInMonth=30}else if(day===31&&month===8){daysInMonth=31}else if(day<31&&month===9){daysInMonth=31}else if(day===31&&month===9){daysInMonth=30}else if(day<31&&month===10){daysInMonth=30}else if(day===31&&month===10){daysInMonth=31}else if(day<31&&month===11){daysInMonth=31}else if(day===31&&month===11){daysInMonth=31}if(year%4===0&&year%100!==0&&month===1||year%400===0&&month===1){daysInMonth=29}if(year%4===0&&year%100!==0&&month===0&&day===30||year%400===0&&month===0&&day===30){daysInMonth=30}if(year%4===0&&year%100!==0&&month===0&&day===31||year%400===0&&month===0&&day===31){daysInMonth=29}if(year%4===0&&year%100!==0&&month===0&&day===29||year%400===0&&month===0&&day===29){daysInMonth=31}if(day===29&&month===1&&day>29){daysInMonth=30}if(day===29&&month===1&&day>30){daysInMonth=31}if(day===28&&month===1&&day>30){daysInMonth=31}return daysInMonth}function getTaxFed(Inc,VarStat){var Brack1;var Brack2;var Brack3;var Brack4;var Brack5;var Brack6;var TaxRate0=0.1;var TaxRate1=0.12;var TaxRate2=0.22;var TaxRate3=0.24;var TaxRate4=0.32;var TaxRate5=0.35;var TaxRate6=0.37;var UnmarBrack1=12400;var UnmarBrack2=50400;var UnmarBrack3=105700;var UnmarBrack4=201775;var UnmarBrack5=256225;var UnmarBrack6=640600;var MarJointBrack1=24800;var MarJointBrack2=100800;var MarJointBrack3=211400;var MarJointBrack4=403500;var MarJointBrack5=512450;var MarJointBrack6=768700;var MarSepBrack1=12400;var MarSepBrack2=50400;var MarSepBrack3=105700;var MarSepBrack4=201775;var MarSepBrack5=256225;var MarSepBrack6=384350;var HeadBrack1=17700;var HeadBrack2=67450;var HeadBrack3=105700;var HeadBrack4=201775;var HeadBrack5=256200;var HeadBrack6=640600;var TaxFed;if(VarStat===1){Brack1=UnmarBrack1;Brack2=UnmarBrack2;Brack3=UnmarBrack3;Brack4=UnmarBrack4;Brack5=UnmarBrack5;Brack6=UnmarBrack6}if(VarStat===2){Brack1=MarJointBrack1;Brack2=MarJointBrack2;Brack3=MarJointBrack3;Brack4=MarJointBrack4;Brack5=MarJointBrack5;Brack6=MarJointBrack6}if(VarStat===3){Brack1=MarSepBrack1;Brack2=MarSepBrack2;Brack3=MarSepBrack3;Brack4=MarSepBrack4;Brack5=MarSepBrack5;Brack6=MarSepBrack6}if(VarStat===4){Brack1=HeadBrack1;Brack2=HeadBrack2;Brack3=HeadBrack3;Brack4=HeadBrack4;Brack5=HeadBrack5;Brack6=HeadBrack6}var Tax1=Brack1*TaxRate0;var Tax2=(Brack2-Brack1)*TaxRate1+Tax1;var Tax3=(Brack3-Brack2)*TaxRate2+Tax2;var Tax4=(Brack4-Brack3)*TaxRate3+Tax3;var Tax5=(Brack5-Brack4)*TaxRate4+Tax4;var Tax6=(Brack6-Brack5)*TaxRate5+Tax5;if(Inc<=Brack1){TaxFed=Inc*TaxRate0}else if(Inc>Brack1&&Inc<=Brack2){TaxFed=Tax1+(Inc-Brack1)*TaxRate1}else if(Inc>Brack2&&Inc<=Brack3){TaxFed=Tax2+(Inc-Brack2)*TaxRate2}else if(Inc>Brack3&&Inc<=Brack4){TaxFed=Tax3+(Inc-Brack3)*TaxRate3}else if(Inc>Brack4&&Inc<=Brack5){TaxFed=Tax4+(Inc-Brack4)*TaxRate4}else if(Inc>Brack5&&Inc<=Brack6){TaxFed=Tax5+(Inc-Brack5)*TaxRate5}else if(Inc>Brack6){TaxFed=Tax6+(Inc-Brack6)*TaxRate6}return TaxFed}//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Powerball works out Annual growth rate and Periodic growth rate. Annual growth rate is opened in percent; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Powerball calculator works', 'html' => <<<'TXT'
            <p>The Powerball calculator applies one relationship to the value already on the page and reports Annual growth rate, Periodic growth rate and Final payout on….</p><p>In the form&#039;s own words, Comp Freq = ln(Annual growth rate + 1) ÷ ln(Periodic growth rate + 1).</p><p>The answers are Annual growth rate, Periodic growth rate, Final payout on… and Comp Freq; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — How much did you win? = 1.000e+8, Lump sum payout percentage = 52 perc, What is your filing status? = 1, Where do you live? = 0.025, Rep = 2, Table Freq = 2, Pay Freq = 1, Subject = 2, Final balance = 5 USD, Annuity payout = 1000 USD, Type = 0, Length of annuity = 30 yrs, Annuity rate = 8 perc, Timing = 1 and Inflation rate = 9 perc — through the same formula and the panel reports <strong>Comp Freq</strong> = 1.</p><ul><li><strong>Comp Freq</strong> = 1</li></ul><p>That is <strong>Comp Freq</strong> = <code>ln(Annual growth rate + 1) ÷ ln(Periodic growth rate + 1)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Comp Freq</strong> = 1. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Annual growth rate lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Comp Freq</strong> = <code>ln(Annual growth rate + 1) ÷ ln(Periodic growth rate + 1)</code></li><li><strong>Annual growth rate</strong> = <code>(Periodic growth rate + 1)^(Comp Freq) − 1</code></li><li><strong>Periodic growth rate</strong> = <code>(Annual growth rate + 1)^(1 ÷ Comp Freq) − 1</code></li><li><strong>Final payout on…</strong> = <code>Start Date + 1</code></li><li><strong>Start Date</strong> = <code>Final payout on... − 1</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Comp Freq</strong> = <code>ln(Annual growth rate + 1) ÷ ln(Periodic growth rate + 1)</code> — the form to use when Annual growth rate and Periodic growth rate are the values you have.</li><li><strong>Annual growth rate</strong> = <code>(Periodic growth rate + 1)^(Comp Freq) − 1</code> — the form to use when Periodic growth rate and Comp Freq are the values you have.</li><li><strong>Periodic growth rate</strong> = <code>(Annual growth rate + 1)^(1 ÷ Comp Freq) − 1</code> — the form to use when Annual growth rate and Comp Freq are the values you have.</li><li><strong>Final payout on…</strong> = <code>Start Date + 1</code> — the form to use when Start Date are the values you have.</li><li><strong>Start Date</strong> = <code>Final payout on... − 1</code> — the form to use when Final payout on… are the values you have.</li></ul><p>Any one of Comp Freq, Annual growth rate and Periodic growth rate can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — How much did you win?, from 1.000e+8 to 2.000e+8 — and the answers go from <strong>Comp Freq</strong> 1 to <strong>Comp Freq</strong> 1.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Annual growth rate, Periodic growth rate and Final payout on… are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If the measured values is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 5 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Annual growth rate</strong> is a percent figure. It is computed from Periodic growth rate and Comp Freq, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Periodic growth rate</strong> is a percent figure. It is computed from Annual growth rate and Comp Freq, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Final payout on…</strong> is a plain number. It is computed from Start Date, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Comp Freq</strong> is a plain number and the page's own defaults put it at 1. It is computed from Annual growth rate and Periodic growth rate, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Start Date</strong> is a plain number. It is computed from Final payout on…, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Powerball actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with the values — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Annual growth rate in perc against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Annual growth rate is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It counts in whole days.</strong> The differences are counted in whole days, so an answer is a date or a number of days rather than an interval in hours. Expect a day&#039;s uncertainty if the event itself happened at an unknown time.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/price-to-cash-flow-ratio">Price to cash flow ratio Calculator</a>, <a href="/finance/price-to-sales-ratio">Price to sales ratio Calculator</a> and <a href="/finance/price-to-earnings">Price/earnings ratio</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Powerball is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Powerball calculator work out?', 'a' => <<<'TXT'
            Annual growth rate, Periodic growth rate, Final payout on… and Comp Freq, from Annual growth rate and Periodic growth rate. The relationship is Comp Freq = ln(Annual growth rate + 1) ÷ ln(Periodic growth rate + 1).
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Comp Freq, Annual growth rate, Periodic growth rate and Final payout on… blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Comp Freq = 1. Those are the defaults written into the form — move the value already on the page and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Annual growth rate is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave the value already on the page blank and the page solves for it, reporting Annual growth rate instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Annual growth rate at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/price-to-cash-flow-ratio', 'name' => 'Price to cash flow ratio Calculator'],
            ['path' => '/finance/price-to-sales-ratio', 'name' => 'Price to sales ratio Calculator'],
            ['path' => '/finance/price-to-earnings', 'name' => 'Price/earnings ratio'],
        ],
        'authors' => [],
    ],
];
