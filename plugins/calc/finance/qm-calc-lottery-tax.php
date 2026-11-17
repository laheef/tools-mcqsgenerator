<?php

/**
 * Lottery tax
 * /finance/lottery-tax
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Lottery tax',
    'meta' => ['title' => 'Lottery tax Calculator — Formula, Units & Example', 'description' => 'Lottery tax takes annuity payout, lump sum payout percentage and tax treatment and returns lump sum payout and payout difference. The answer is shown in USD.', 'h1' => 'Lottery tax Calculator', 'updated' => '2026-07-13'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'annuityPayout',
                            'label' => 'Annuity payout',
                            'type' => 'number',
                            'help' => 'Typically this is the full lottery prize. If you want to change the annuity term, check the annuity setup below.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '100000000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cashRate',
                            'label' => 'Lump sum payout percentage',
                            'type' => 'number',
                            'help' => 'The gross lump-sum payout is about 50 percent of the full lottery prize.',
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
                            'name' => 'cashPayout',
                            'label' => 'Lump sum payout',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'taxMode',
                            'label' => 'Tax treatment',
                            'type' => 'select',
                            'options' => ['US taxes' => '1', 'Customized tax rate' => '2'],
                            'dataset' => 'TaxMode',
                            'defaults' => [
                                ['value' => 'US taxes', 'when' => null],
                                ['value' => 'Customized tax rate', 'when' => 'not(isUserFromCountry(\'US\'))'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'taxRate2',
                            'label' => 'Tax rate I.',
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
                        [
                            'name' => 'taxRate',
                            'label' => 'Tax rate II.',
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
                        [
                            'name' => 'filingStatus',
                            'label' => 'Federal filing status',
                            'type' => 'select',
                            'options' => ['Single' => '1', 'Married filing jointly' => '2', 'Married filing separately' => '3', 'Heads of household' => '4'],
                            'dataset' => 'FilingStatus',
                            'control' => 'DROPDOWN',
                            'help' => 'Set your filing status to determine the federal tax in the relevant tax brackets.',
                            'default' => 'Single',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'state',
                            'label' => 'Where do you live?',
                            'type' => 'select',
                            'options' => [
                                'Alabama' => '0',
                                'Alaska' => '0',
                                'Arizona' => '2.5',
                                'Arkansas' => '3.7',
                                'California' => '0',
                                'Colorado' => '4.4',
                                'Connecticut' => '6.99',
                                'Delaware' => '6.6',
                                'Florida' => '0',
                                'Georgia' => '4.99',
                                'Hawaii' => '0',
                                'Idaho' => '5.3',
                                'Illinois' => '4.95',
                                'Indiana' => '2.95',
                                'Iowa' => '3.8',
                                'Kansas' => '5.58',
                                'Kentucky' => '5',
                                'Louisiana' => '3.5',
                                'Maine' => '9.15',
                                'Maryland' => '9.5',
                                'Massachusetts' => '9',
                                'Michigan' => '4.25',
                                'Minnesota' => '9.85',
                                'Mississippi' => '4',
                                'Missouri' => '4.7',
                                'Montana' => '5.65',
                                'Nebraska' => '4.55',
                                'Nevada' => '0',
                                'New Hampshire' => '0',
                                'New Jersey' => '10.75',
                                'New Mexico' => '5.9',
                                'New York' => '10.9',
                                'North Carolina' => '3.99',
                                'North Dakota' => '2.9',
                                'Ohio' => '2.75',
                                'Oklahoma' => '4.5',
                                'Oregon' => '9.9',
                                'Pennsylvania' => '3.07',
                                'Rhode Island' => '5.99',
                                'South Carolina' => '6',
                                'South Dakota' => '0',
                                'Tennessee' => '0',
                                'Texas' => '0',
                                'Utah' => '0',
                                'Vermont' => '8.75',
                                'Virginia' => '5.75',
                                'Washington' => '0',
                                'West Virginia' => '4.82',
                                'Wisconsin' => '7.65',
                                'Wyoming' => '0',
                                'Washington, D.C.' => '10.75',
                            ],
                            'dataset' => 'StateTax',
                            'control' => 'DROPDOWN',
                            'help' => 'The state tax is determined according to your residence.',
                            'default' => 'Arizona',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'stateTax',
                            'label' => 'State tax rate',
                            'type' => 'result',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Annuity setup',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'years',
                            'label' => 'Annuity term',
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
                            'name' => 'growthRate',
                            'label' => 'Annual growth rate',
                            'type' => 'number',
                            'help' => 'Set the percentage annual increase in the annuity payout.',
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
                            'name' => 'returnRate',
                            'label' => 'Rate of return',
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
        [
            'title' => 'Results',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        *Currently, the gross lump sum payout percentage is approximated by {{cashRate.formattedValue}}%. You can change this value in the 2nd variable of the calculator.
                        TXT],
                    ],
                ],
            ],
        ],
        [
            'title' => 'ResultValues (Hidden)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'payoutDifference',
                            'label' => 'Payout difference',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'federalLumpSum_tax1',
                            'label' => 'Federal lump sum tax1',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'federalAnnuity_tax1',
                            'label' => 'Federal annuity tax1',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'federalDifference_tax1',
                            'label' => 'Federal difference tax1',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'stateLumpSum_tax2',
                            'label' => 'State lump sum tax2',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'stateAnnuity_tax2',
                            'label' => 'State annuity tax2',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'stateDifference_tax2',
                            'label' => 'State difference tax2',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'netLumpSum',
                            'label' => 'Net lump sum',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'netAnnuity',
                            'label' => 'Net annuity',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'netDifference',
                            'label' => 'Net difference',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'AnnuityScheduleValues (Hidden)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarMode',
                            'label' => 'Var mode',
                            'type' => 'result',
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
                        [
                            'name' => 'TableFreq',
                            'label' => 'Table freq',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarStat',
                            'label' => 'Var stat',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Subject',
                            'label' => 'Annuity payout option',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'StartDate',
                            'label' => 'Start date',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'EndDate',
                            'label' => 'End date',
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
                            'label' => 'Final balance',
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
                            'name' => 'PayFreq',
                            'label' => 'Payout frequency',
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
                            'label' => 'Compound frequency',
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
                            'label' => 'Inflation',
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
                            'name' => 'PerPay',
                            'label' => 'Periodic payment',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '8000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Timing',
                            'label' => 'Timing',
                            'type' => 'number',
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
                            'rounding' => ['omni', '0.0001'],
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
                            'name' => 'VarSub',
                            'label' => 'Var sub',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarTable',
                            'label' => 'Var table',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
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
                            'name' => 'm',
                            'label' => 'M',
                            'type' => 'number',
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
                            'name' => 'filingStatusValue',
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
                            'name' => 'stateTaxValue',
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
            'title' => 'cashPayout = annuityPayout * cashRate',
            'results' => ['annuityPayout' => 'cashPayout/cashRate', 'cashPayout' => 'annuityPayout*cashRate', 'cashRate' => 'cashPayout/annuityPayout'],
        ],
        [
            'title' => 'payoutDifference = getLotteryResultChart(annuityPayout, years, returnRate, growthRate, stateTax, filingStatus, taxMode, taxRate, taxRate2, cashPayout)',
            'results' => ['payoutDifference' => 'getLotteryResultChart(annuityPayout, years, returnRate, growthRate, stateTax, filingStatus, taxMode, taxRate, taxRate2, cashPayout)'],
        ],
        [
            'title' => 'federalLumpSum_tax1 = getFederalLumpSum_tax1(payoutDifference)',
            'results' => ['federalLumpSum_tax1' => 'getFederalLumpSum_tax1(getLotteryResultChart(annuityPayout, years, returnRate, growthRate, stateTax, filingStatus, taxMode, taxRate, taxRate2, cashPayout))'],
        ],
        [
            'title' => 'federalAnnuity_tax1 = getFederalAnnuity_tax1(payoutDifference)',
            'results' => ['federalAnnuity_tax1' => 'getFederalAnnuity_tax1(getLotteryResultChart(annuityPayout, years, returnRate, growthRate, stateTax, filingStatus, taxMode, taxRate, taxRate2, cashPayout))'],
        ],
        [
            'title' => 'federalDifference_tax1 = getFederalDifference_tax1(payoutDifference)',
            'results' => ['federalDifference_tax1' => 'getFederalDifference_tax1(getLotteryResultChart(annuityPayout, years, returnRate, growthRate, stateTax, filingStatus, taxMode, taxRate, taxRate2, cashPayout))'],
        ],
        [
            'title' => 'stateLumpSum_tax2 = getStateLumpSum_tax2(payoutDifference)',
            'results' => ['stateLumpSum_tax2' => 'getStateLumpSum_tax2(getLotteryResultChart(annuityPayout, years, returnRate, growthRate, stateTax, filingStatus, taxMode, taxRate, taxRate2, cashPayout))'],
        ],
        [
            'title' => 'stateAnnuity_tax2 = getStateAnnuity_tax2(payoutDifference)',
            'results' => ['stateAnnuity_tax2' => 'getStateAnnuity_tax2(getLotteryResultChart(annuityPayout, years, returnRate, growthRate, stateTax, filingStatus, taxMode, taxRate, taxRate2, cashPayout))'],
        ],
        [
            'title' => 'stateDifference_tax2 = getStateDifference_tax2(payoutDifference)',
            'results' => ['stateDifference_tax2' => 'getStateDifference_tax2(getLotteryResultChart(annuityPayout, years, returnRate, growthRate, stateTax, filingStatus, taxMode, taxRate, taxRate2, cashPayout))'],
        ],
        [
            'title' => 'netLumpSum = getNetLumpSum(payoutDifference)',
            'results' => ['netLumpSum' => 'getNetLumpSum(getLotteryResultChart(annuityPayout, years, returnRate, growthRate, stateTax, filingStatus, taxMode, taxRate, taxRate2, cashPayout))'],
        ],
        [
            'title' => 'netAnnuity = getNetAnnuity(payoutDifference)',
            'results' => ['netAnnuity' => 'getNetAnnuity(getLotteryResultChart(annuityPayout, years, returnRate, growthRate, stateTax, filingStatus, taxMode, taxRate, taxRate2, cashPayout))'],
        ],
        [
            'title' => 'netDifference = getNetDifference(payoutDifference)',
            'results' => ['netDifference' => 'getNetDifference(getLotteryResultChart(annuityPayout, years, returnRate, growthRate, stateTax, filingStatus, taxMode, taxRate, taxRate2, cashPayout))'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";"use strict";var VarSub=2;var VarTime=1;var VarType=0;var m=1;var q=1;var FinBal=0;var PerPay=8000;var g_p=0.05;var g=0.05;var TaxRate=0;var TaxRate2=0;var outTableResultValue=[];omni.define("getLotteryResultChart",function(annuityPayout,years,returnRate,growthRate,stateTax,filingStatus,taxMode,taxRate,taxRate2,cashPayout){var InDep=Number(annuityPayout);var t=Number(years);var r=Number(returnRate);g=Number(growthRate);var VarTax=Number(stateTax);var VarStat=Number(filingStatus);var VarMode=Number(taxMode);TaxRate=Number(taxRate);TaxRate2=Number(taxRate2);var Cash=Number(cashPayout);VarTax=VarTax/100;if(VarMode==2){VarTax=TaxRate}var GrossCash=Cash;var TaxFedCash;if(VarMode==1){TaxFedCash=getTaxFed(GrossCash,VarStat)}else{TaxFedCash=GrossCash*TaxRate2}if(TaxFedCash<0){TaxFedCash=0}var TaxStateCash=GrossCash*VarTax;var NetCash=GrossCash-(TaxFedCash+TaxStateCash);var periods=0;if(VarTime==1){periods=q*t}var eq_p=getPerEqRate(q,m,r);if(VarSub==2){PerPay=getPayOut(InDep,FinBal,periods,q,eq_p,g_p,g,VarType)}var k=12;var perChart=periods*k;var outMonth1=[];var outYear1=[];var yearChart=0;var i;var DepBal=0;var iDep=0;var InBal=0;var TotBal=0;var TotBalOpen=0;var TotIntMonth=0;var YearDep=0;var TotBalOpenYear=InDep;var YearInt=0;var DepBalOpen=0;var InBalOpen=0;var dep_pow=0;var dep_powOpen=0;var TotCashFlow=0;var TotReturn=0;var TotTaxFed=0;var TotTaxFed_24=0;var TotTaxState=0;var g_month=getMonthlyGrowthRate(g);var TaxAmFed_24=0;var TaxAmFed=0;var TaxAmState=0;var NetPayOut=0;for(i=0;i<=perChart;i++){if(i>0){dep_pow=i/12*q;if(q<=12){dep_powOpen=(i-k)/12*q}else{dep_powOpen=(i-1)/12*q}InBal=InDep*Math.pow(1+eq_p,dep_pow);InBalOpen=InDep*Math.pow(1+eq_p,dep_powOpen);DepBal=getBal(PerPay,dep_pow,q,eq_p,g_p,g,VarType);DepBalOpen=getBal(PerPay,dep_powOpen,q,eq_p,g_p,g,VarType);TotBal=InBal+DepBal;TotBalOpen=InBalOpen+DepBalOpen;if(i%k==0&&q<=12){iDep=PerPay*Math.pow(1+g_month,i-k);TotIntMonth=TotBal-TotBalOpen-iDep}if(i%k!==0&&q<=12){iDep=0;TotIntMonth=0}if(q>12){iDep=PerPay/k*Math.pow(1+g_month,i);TotIntMonth=TotBal-TotBalOpen-iDep}if(i%12==1){YearInt=0;YearDep=0}if(i%12==0){yearChart=1}else{yearChart=0}YearInt+=TotIntMonth;YearDep+=-iDep;if(VarMode==1){TaxAmFed_24=YearDep*0.24}else{TaxAmFed_24=0}if(VarMode==1){TaxAmFed=getTaxFed(YearDep,VarStat)-TaxAmFed_24}else if(VarMode==2){TaxAmFed=YearDep*TaxRate2}TotBalOpenYear=TotBal-YearDep-YearInt;if(i==12){TotBalOpenYear=InDep}TaxAmState=-iDep*VarTax;NetPayOut=-iDep-(TaxAmFed+TaxAmFed_24+TaxAmState);TotReturn+=TotIntMonth;TotCashFlow+=NetPayOut;TotTaxFed_24+=TaxAmFed_24;TotTaxFed+=TaxAmFed;TotTaxState+=TaxAmState;outMonth1.push([i,TotBalOpen,-iDep,TotIntMonth,TotBal,TotCashFlow,TotReturn]);if(yearChart==1){outYear1.push([i/12,Math.round(YearDep),Math.round(TaxAmFed+TaxAmFed_24),Math.round(TaxAmState),Math.round(NetPayOut)])}}}var outTableResult=[TaxFedCash,TotTaxFed_24+TotTaxFed,TotTaxFed_24+TotTaxFed-TaxFedCash,TaxStateCash,TotTaxState,TotTaxState-TaxStateCash,NetCash,TotCashFlow,TotCashFlow-NetCash];outTableResultValue=outTableResult;return InDep-GrossCash});omni.define("getFederalLumpSum_tax1",function(taxMode){if(taxMode){return Number(outTableResultValue[0])}});omni.define("getFederalAnnuity_tax1",function(taxMode){if(taxMode){return Number(outTableResultValue[1])}});omni.define("getFederalDifference_tax1",function(taxMode){if(taxMode){return Number(outTableResultValue[2])}});omni.define("getStateLumpSum_tax2",function(taxMode){if(taxMode){return Number(outTableResultValue[3])}});omni.define("getStateAnnuity_tax2",function(taxMode){if(taxMode){return Number(outTableResultValue[4])}});omni.define("getStateDifference_tax2",function(taxMode){if(taxMode){return Number(outTableResultValue[5])}});omni.define("getNetLumpSum",function(taxMode){if(taxMode){return Number(outTableResultValue[6])}});omni.define("getNetAnnuity",function(taxMode){if(taxMode){return Number(outTableResultValue[7])}});omni.define("getNetDifference",function(taxMode){if(taxMode){return Number(outTableResultValue[8])}});function getBal(PerPay,periods,q,eq_p,g_p,g,VarType){var DepBal;if(g_p!==eq_p&&q!==1){DepBal=PerPay*(Math.pow(1+eq_p,periods)-Math.pow(1+g_p,periods))*(1+eq_p*VarType)/(eq_p-g_p)}else if(g!==eq_p&&q==1){DepBal=PerPay*(Math.pow(1+eq_p,periods)-Math.pow(1+g,periods))*(1+eq_p*VarType)/(eq_p-g)}else if(g_p==eq_p){DepBal=PerPay*periods*Math.pow(1+eq_p,periods-1)*(1+eq_p*VarType)}return DepBal}function getPayOut(InDep,FinBal,periods,q,eq_p,g_p,g,VarType){var PerPay;var PrincBal=InDep*Math.pow(1+eq_p,periods);var DepBal=FinBal-PrincBal;if(g_p!==eq_p&&q!==1){PerPay=DepBal/((Math.pow(1+eq_p,periods)-Math.pow(1+g_p,periods))*(1+eq_p*VarType)/(eq_p-g_p))}else if(g!==eq_p&&q==1){PerPay=DepBal/((Math.pow(1+eq_p,periods)-Math.pow(1+g,periods))*(1+eq_p*VarType)/(eq_p-g))}else if(g_p==eq_p){PerPay=DepBal/(periods*Math.pow(1+eq_p,periods-1)*(1+eq_p*VarType))}return PerPay}function getPerEqRate(q,m_,r){var _m=m_;var ex=Math.exp(1);var base;if(_m==0){var continuous_r=mathjs.pow(ex,r)-1;_m=1;base=1+continuous_r/_m}else{base=1+r/_m}var power=_m/q;var eq_p=mathjs.round(mathjs.pow(base,power)-1,10);return eq_p}function getMonthlyGrowthRate(g){var Max_iterations=50000;var Min_precision=1e-10;var g_month=g/12;var oldG;var newG=g_month;var iteration=0;do{oldG=newG;var dividend_g=Math.pow(1+newG,12)-(g+1);var divisor_g=12*Math.pow(g+1,11);newG=newG-dividend_g/divisor_g;++iteration}while(Math.abs(oldG-newG)>Min_precision&&iteration<=Max_iterations);return newG}function getTaxFed(Inc,VarStat){var Brack1;var Brack2;var Brack3;var Brack4;var Brack5;var Brack6;var TaxRate0=0.1;var TaxRate1=0.12;var TaxRate2=0.22;var TaxRate3=0.24;var TaxRate4=0.32;var TaxRate5=0.35;var TaxRate6=0.37;var UnmarBrack1=12400;var UnmarBrack2=50400;var UnmarBrack3=105700;var UnmarBrack4=201775;var UnmarBrack5=256225;var UnmarBrack6=640600;var MarJointBrack1=24800;var MarJointBrack2=100800;var MarJointBrack3=211400;var MarJointBrack4=403500;var MarJointBrack5=512450;var MarJointBrack6=768700;var MarSepBrack1=12400;var MarSepBrack2=50400;var MarSepBrack3=105700;var MarSepBrack4=201775;var MarSepBrack5=256225;var MarSepBrack6=384350;var HeadBrack1=17700;var HeadBrack2=67450;var HeadBrack3=105700;var HeadBrack4=201775;var HeadBrack5=256200;var HeadBrack6=640600;var TaxFed;if(VarStat==1){Brack1=UnmarBrack1;Brack2=UnmarBrack2;Brack3=UnmarBrack3;Brack4=UnmarBrack4;Brack5=UnmarBrack5;Brack6=UnmarBrack6}if(VarStat==2){Brack1=MarJointBrack1;Brack2=MarJointBrack2;Brack3=MarJointBrack3;Brack4=MarJointBrack4;Brack5=MarJointBrack5;Brack6=MarJointBrack6}if(VarStat==3){Brack1=MarSepBrack1;Brack2=MarSepBrack2;Brack3=MarSepBrack3;Brack4=MarSepBrack4;Brack5=MarSepBrack5;Brack6=MarSepBrack6}if(VarStat==4){Brack1=HeadBrack1;Brack2=HeadBrack2;Brack3=HeadBrack3;Brack4=HeadBrack4;Brack5=HeadBrack5;Brack6=HeadBrack6}var Tax1=Brack1*TaxRate0;var Tax2=(Brack2-Brack1)*TaxRate1+Tax1;var Tax3=(Brack3-Brack2)*TaxRate2+Tax2;var Tax4=(Brack4-Brack3)*TaxRate3+Tax3;var Tax5=(Brack5-Brack4)*TaxRate4+Tax4;var Tax6=(Brack6-Brack5)*TaxRate5+Tax5;if(Inc<=Brack1){TaxFed=Inc*TaxRate0}else if(Inc>Brack1&&Inc<=Brack2){TaxFed=Tax1+(Inc-Brack1)*TaxRate1}else if(Inc>Brack2&&Inc<=Brack3){TaxFed=Tax2+(Inc-Brack2)*TaxRate2}else if(Inc>Brack3&&Inc<=Brack4){TaxFed=Tax3+(Inc-Brack3)*TaxRate3}else if(Inc>Brack4&&Inc<=Brack5){TaxFed=Tax4+(Inc-Brack4)*TaxRate4}else if(Inc>Brack5&&Inc<=Brack6){TaxFed=Tax5+(Inc-Brack5)*TaxRate5}else if(Inc>Brack6){TaxFed=Tax6+(Inc-Brack6)*TaxRate6}return TaxFed}//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Lottery tax takes Annuity payout, Lump sum payout percentage and Lump sum payout and returns State tax rate and Var mode. It is a single relationship that reads state tax rate out of annuity payout, not a table of canned results keyed by them. Units for State tax rate default to % and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Lottery tax calculator works', 'html' => <<<'TXT'
            <p>Lottery tax answers one question from 39 numbers, and the answer is State tax rate, Var mode and Var stat.</p><p>Written with the labels from the form, Lump sum payout = Annuity payout × Lump sum payout percentage.</p><p>What comes back is State tax rate, Var mode and Var stat — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 39 boxes and the page has everything it needs.</p><ul><li><strong>Annuity payout</strong> — in USD. Typically this is the full lottery prize. If you want to change the annuity term, check the annuity setup below.</li><li><strong>Lump sum payout percentage</strong> — in percent. The gross lump-sum payout is about 50 percent of the full lottery prize.</li><li><strong>Lump sum payout</strong> — in USD</li><li><strong>Tax treatment</strong> — a plain number, no unit</li><li><strong>Tax rate I</strong> — in percent</li><li><strong>Tax rate II</strong> — in percent</li><li><strong>Federal filing status</strong> — a plain number, no unit. Set your filing status to determine the federal tax in the relevant tax brackets.</li><li><strong>Where do you live?</strong> — a plain number, no unit. The state tax is determined according to your residence.</li><li><strong>Annuity term</strong> — in years</li><li><strong>Annual growth rate</strong> — in percent. Set the percentage annual increase in the annuity payout.</li><li><strong>Rate of return</strong> — in percent</li><li><strong>Payout difference</strong> — in USD</li><li><strong>Federal lump sum tax1</strong> — in USD</li><li><strong>Federal annuity tax1</strong> — in USD</li><li><strong>Federal difference tax1</strong> — in USD</li><li><strong>State lump sum tax2</strong> — in USD</li><li><strong>State annuity tax2</strong> — in USD</li><li><strong>State difference tax2</strong> — in USD</li><li><strong>Net lump sum</strong> — in USD</li><li><strong>Net annuity</strong> — in USD</li><li><strong>Net difference</strong> — in USD</li><li><strong>Var time</strong> — a plain number, no unit</li><li><strong>Display…</strong> — a plain number, no unit</li><li><strong>Table freq</strong> — a plain number, no unit</li><li><strong>Annuity payout option</strong> — a plain number, no unit</li><li><strong>Start date</strong> — a plain number, no unit</li><li><strong>End date</strong> — a plain number, no unit</li><li><strong>Final balance</strong> — a plain number, no unit</li><li><strong>Payout frequency</strong> — a plain number, no unit</li><li><strong>Compound frequency</strong> — a plain number, no unit</li><li><strong>Inflation</strong> — a plain number, no unit</li><li><strong>Periodic payment</strong> — in USD</li><li><strong>Timing</strong> — a plain number, no unit</li><li><strong>Type of annuity</strong> — a plain number, no unit</li><li><strong>Var rep</strong> — a plain number, no unit</li><li><strong>Var sub</strong> — a plain number, no unit</li><li><strong>Var table</strong> — a plain number, no unit</li><li><strong>Var type</strong> — a plain number, no unit</li><li><strong>M</strong> — a plain number, no unit</li></ul><p>The answers come back as State tax rate in %, Var mode, Var stat. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Lump sum payout percentage offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Lump sum payout</strong> = <code>Annuity payout × Lump sum payout percentage</code></li><li><strong>Annuity payout</strong> = <code>Lump sum payout ÷ Lump sum payout percentage</code></li><li><strong>Lump sum payout percentage</strong> = <code>Lump sum payout ÷ Annuity payout</code></li><li><strong>Payout difference</strong> = <code>getLotteryResultChart(Annuity payout, Annuity term, Rate of return, Annual growth rate, State tax rate, Federal filing status, Tax treatment, Tax rate II., Tax rate I., Lump sum payout)</code></li><li><strong>Federal lump sum tax1</strong> = <code>getFederalLumpSum_tax1(getLotteryResultChart(Annuity payout, Annuity term, Rate of return, Annual growth rate, State tax rate, Federal filing status, Tax treatment, Tax rate II., Tax rate I., Lump sum payout))</code></li><li><strong>Federal annuity tax1</strong> = <code>getFederalAnnuity_tax1(getLotteryResultChart(Annuity payout, Annuity term, Rate of return, Annual growth rate, State tax rate, Federal filing status, Tax treatment, Tax rate II., Tax rate I., Lump sum payout))</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Lump sum payout</strong> = <code>Annuity payout × Lump sum payout percentage</code> — the form to use when Annuity payout and Lump sum payout percentage are the values you have.</li><li><strong>Annuity payout</strong> = <code>Lump sum payout ÷ Lump sum payout percentage</code> — the form to use when Lump sum payout and Lump sum payout percentage are the values you have.</li><li><strong>Lump sum payout percentage</strong> = <code>Lump sum payout ÷ Annuity payout</code> — the form to use when Lump sum payout and Annuity payout are the values you have.</li><li><strong>Payout difference</strong> = <code>getLotteryResultChart(Annuity payout, Annuity term, Rate of return, Annual growth rate, State tax rate, Federal filing status, Tax treatment, Tax rate II., Tax rate I., Lump sum payout)</code> — the form to use when Annuity payout, Annuity term, Rate of return and Annual growth rate are the values you have.</li><li><strong>Federal lump sum tax1</strong> = <code>getFederalLumpSum_tax1(getLotteryResultChart(Annuity payout, Annuity term, Rate of return, Annual growth rate, State tax rate, Federal filing status, Tax treatment, Tax rate II., Tax rate I., Lump sum payout))</code> — the form to use when Annuity payout, Annuity term, Rate of return and Annual growth rate are the values you have.</li><li><strong>Federal annuity tax1</strong> = <code>getFederalAnnuity_tax1(getLotteryResultChart(Annuity payout, Annuity term, Rate of return, Annual growth rate, State tax rate, Federal filing status, Tax treatment, Tax rate II., Tax rate I., Lump sum payout))</code> — the form to use when Annuity payout, Annuity term, Rate of return and Annual growth rate are the values you have.</li><li><strong>Federal difference tax1</strong> = <code>getFederalDifference_tax1(getLotteryResultChart(Annuity payout, Annuity term, Rate of return, Annual growth rate, State tax rate, Federal filing status, Tax treatment, Tax rate II., Tax rate I., Lump sum payout))</code> — the form to use when Annuity payout, Annuity term, Rate of return and Annual growth rate are the values you have.</li><li><strong>State lump sum tax2</strong> = <code>getStateLumpSum_tax2(getLotteryResultChart(Annuity payout, Annuity term, Rate of return, Annual growth rate, State tax rate, Federal filing status, Tax treatment, Tax rate II., Tax rate I., Lump sum payout))</code> — the form to use when Annuity payout, Annuity term, Rate of return and Annual growth rate are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Lump sum payout, Annuity payout and Lump sum payout percentage can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Lump sum payout percentage, Tax rate I and Tax rate II is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with State tax rate, Var mode and Var stat are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Annuity payout left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Annuity payout is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Lump sum payout percentage left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Lump sum payout percentage is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Annuity payout and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Annuity payout, Lump sum payout percentage, Lump sum payout and Tax treatment. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Annuity payout into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare State tax rate in % with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> State tax rate follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and years and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Annuity payout, Lump sum payout percentage and Lump sum payout are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Annuity payout, Lump sum payout percentage and Lump sum payout measured, State tax rate and Var mode wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/margin-of-safety">Margin of safety Calculator</a>, <a href="/finance/margin-discount">Margin with discount Calculator</a> and <a href="/finance/marginal-cost">Marginal cost</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Lottery tax calculator work out?', 'a' => <<<'TXT'
            State tax rate, Var mode and Var stat, from Annuity payout and Lump sum payout percentage. The relationship is Lump sum payout = Annuity payout × Lump sum payout percentage.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Annuity payout (USD), Lump sum payout percentage (percent), Lump sum payout (USD), Tax treatment, Tax rate I (percent). Fill annuity payout, lump sum payout percentage and lump sum payout and leave State tax rate empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Lump sum payout, Annuity payout, Lump sum payout percentage and Payout difference can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            State tax rate is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Annuity payout left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. State tax rate keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/margin-of-safety', 'name' => 'Margin of safety Calculator'],
            ['path' => '/finance/margin-discount', 'name' => 'Margin with discount Calculator'],
            ['path' => '/finance/marginal-cost', 'name' => 'Marginal cost'],
        ],
        'authors' => [],
    ],
];
