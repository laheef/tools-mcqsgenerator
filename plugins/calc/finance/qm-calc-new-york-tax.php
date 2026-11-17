<?php

/**
 * New York tax
 * /finance/new-york-tax
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'New York tax',
    'meta' => ['title' => 'New York tax Calculator — Formula, Units & Example', 'description' => 'New York tax takes adjusted Gross Income (AGI), pay frequency and year of income and returns annual retirement contributions. Every figure is computed.', 'h1' => 'New York tax Calculator', 'updated' => '2025-04-18'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'income',
                            'label' => 'Adjusted Gross Income (AGI)',
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
                            'name' => 'payFreq',
                            'label' => 'Pay frequency',
                            'type' => 'select',
                            'options' => [
                                'Daily' => '260',
                                'Weekly' => '52',
                                'Bi-weekly' => '26',
                                'Semi-monthly' => '24',
                                'Monthly' => '12',
                            ],
                            'dataset' => 'pay_frequency',
                            'control' => 'DROPDOWN',
                            'help' => 'Set here the period in which you want to see your take-home pay.',
                            'default' => 'Weekly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'year',
                            'label' => 'Year of income',
                            'type' => 'select',
                            'options' => ['2022' => '2022', '2023' => '2023', '2024' => '2024', '2025' => '2025'],
                            'dataset' => 'years',
                            'control' => 'DROPDOWN',
                            'default' => '2025',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'stat',
                            'label' => 'What is your filling status?',
                            'type' => 'select',
                            'options' => ['Single' => '1', 'Married filing jointly' => '2', 'Married filing separately' => '3', 'Head of household' => '4'],
                            'dataset' => 'filing_status',
                            'control' => 'DROPDOWN',
                            'default' => 'Single',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'taxJur',
                            'label' => 'Are you a resident in NYC?',
                            'type' => 'select',
                            'options' => ['Yes' => '1', 'No' => '0'],
                            'dataset' => 'yesNo',
                            'help' => 'New Your City residents are obliged to pay local income tax after their income.',
                            'default' => 'Yes',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'varDep',
                            'label' => 'Number of add. dependent(s)',
                            'type' => 'number',
                            'suffix' => 'person(s)',
                            'help' => 'State here only the number of additional dependent(s) - don\'t state here yourself or your spouse.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'deduc',
                            'label' => 'Itemized deductions',
                            'type' => 'number',
                            'prefix' => '$',
                            'help' => <<<'TXT'
                            Set here the total of itemized deductions other than retirement contribution relevant to the federal income tax. If you don't set a deduction or it is less than the standard deduction, the standard deduction will be considered.
                            TXT,
                            'rounding' => ['standard', '2'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'postTax',
                            'label' => 'Post-tax deductions',
                            'type' => 'number',
                            'prefix' => '$',
                            'rounding' => ['standard', '2'],
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
                                ['when' => 'annual_tax > 0', 'text' => 'The estimated total annual tax is ${{annual_tax.formattedValue}}.'],
                                ['when' => 'fin_income_period > 0 and payFreq == 260', 'text' => 'The estimated daily take-home pay is ${{fin_income_period.formattedValue}}.'],
                                ['when' => 'fin_income_period > 0 and payFreq == 52', 'text' => 'The estimated weekly take-home pay is ${{fin_income_period.formattedValue}}.'],
                                ['when' => 'fin_income_period > 0 and payFreq == 26', 'text' => 'The estimated bi-weekly take-home pay is ${{fin_income_period.formattedValue}}.'],
                                ['when' => 'fin_income_period > 0 and payFreq == 24', 'text' => 'The estimated semi-monthly take-home pay is ${{fin_income_period.formattedValue}}.'],
                                ['when' => 'fin_income_period > 0 and payFreq == 12', 'text' => 'The estimated monthly take-home pay is ${{fin_income_period.formattedValue}}.'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        * Effective tax rate (percentage of gross income). ** A credit of ${{credit.formattedValue}} deducted from the tax amount. FICA covers Social Security (${{soc_sec.formattedValue}}) and Medicare tax (${{med_care.formattedValue}}). Local tax includes Employment Training Tax (ETT) and State Disability Insurance (SDI) of ${{local_tax.formattedValue}}.
                        TXT],
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
                            'name' => 'VarYear',
                            'label' => 'VarYear',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarPay',
                            'label' => 'VarPay',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'RetPerc',
                            'label' => 'Ret perc',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Ret',
                            'label' => 'Annual retirement contributions',
                            'type' => 'number',
                            'suffix' => '$',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fica',
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
                            'name' => 'income_tax',
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
                            'name' => 'annual_tax',
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
                            'name' => 'income_aft_tax',
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
                            'name' => 'fin_income',
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
                            'name' => 'fica_rate',
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
                            'name' => 'take_home_rate',
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
                            'name' => 'income_tax_rate',
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
                            'name' => 'local_tax',
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
                            'name' => 'state_tax_after_cred',
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
                            'name' => 'tax_fed',
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
                            'name' => 'tax_fed_rate',
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
                            'name' => 'local_tax_rate',
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
                            'name' => 'state_tax_after_cred_rate',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'soc_sec',
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
                            'name' => 'med_care',
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
                            'name' => 'credit',
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
                            'name' => 'stand_dep',
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
                            'name' => 'state_ex',
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
                            'name' => 'VarStatTable',
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
                            'name' => 'VarYearTable',
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
                            'name' => 'VarStateIDTable',
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
                            'name' => 'dep_ex',
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
                            'name' => 'per_ex',
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
                            'name' => 'IncomeState',
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
                            'name' => 'fin_income_period',
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
                            'name' => 'tax_fed_period',
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
                            'name' => 'income_period',
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
                            'name' => 'state_tax_after_cred_period',
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
                            'name' => 'local_tax_period',
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
                            'name' => 'income_tax_period',
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
                            'name' => 'fica_period',
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
                            'name' => 'final_deduc',
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
                            'name' => 'income_aft_deduc',
                            'label' => '',
                            'type' => 'presentation',
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
            'title' => 'Ret = RetPerc * income ',
            'results' => ['Ret' => 'RetPerc*income', 'income' => 'Ret/RetPerc', 'RetPerc' => 'Ret/income'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("getFinalDeduc",function(VarYear,VarStat,StateID,Deduc,Ret,Income){if(VarYear===2022){if(VarStat===1&&Deduc<12950){Deduc=12950}if(VarStat===2&&Deduc<25900){Deduc=25900}if(VarStat===3&&Deduc<12950){Deduc=12950}if(VarStat===4&&Deduc<19400){Deduc=19400}}if(VarYear===2023){if(VarStat===1&&Deduc<13850){Deduc=13850}if(VarStat===2&&Deduc<27700){Deduc=27700}if(VarStat===3&&Deduc<13850){Deduc=13850}if(VarStat===4&&Deduc<20800){Deduc=20800}}if(VarYear===2024){if(VarStat===1&&Deduc<14600){Deduc=14600}if(VarStat===2&&Deduc<29200){Deduc=29200}if(VarStat===3&&Deduc<14600){Deduc=14600}if(VarStat===4&&Deduc<21900){Deduc=21900}}if(VarYear===2025){if(VarStat===1&&Deduc<15000){Deduc=15000}if(VarStat===2&&Deduc<30000){Deduc=30000}if(VarStat===3&&Deduc<15000){Deduc=15000}if(VarStat===4&&Deduc<30000){Deduc=30000}}if(Income<Deduc+Ret){Deduc=Income}var StandDed=getStandDed(VarStat,StateID,VarYear);if(StandDed>=Deduc){return StandDed+Deduc}else{return Deduc}});omni.define("getIncomeTax",function(VarYear,Income,VarStat,StateID,VarDep){var TaxFed;if(VarYear===2022){TaxFed=getTaxFed22(Income,VarStat)}if(VarYear===2023){TaxFed=getTaxFed23(Income,VarStat)}if(VarYear===2024){TaxFed=getTaxFed24(Income,VarStat)}if(VarYear===2025){TaxFed=getTaxFed25(Income,VarStat)}if(TaxFed<0){TaxFed=0}var StandDed=0;var StandDedCredit=0;if(StateID!==44){StandDed=getStandDed(VarStat,StateID,VarYear)}else{StandDedCredit=getStandDed(VarStat,StateID,VarYear)}var DepEx=0;var DepExCredit=0;if(StateID!==3&&StateID!==4&&StateID!==5&&StateID!==8&&StateID!==15&&StateID!==19&&StateID!==27&&StateID!==37&&StateID!==44){DepEx=getDepEx(StateID,VarYear)*VarDep}else{DepExCredit=getDepEx(StateID,VarYear)*VarDep}var PerEx=0;var PerExCredit=0;if(StateID!==4&&StateID!==5&&StateID!==8&&StateID!==15&&StateID!==27&&StateID!==37){PerEx=getPerEx(VarYear,VarStat,StateID)}else{PerExCredit=getPerEx(VarYear,VarStat,StateID)}var Local=0;if(StateID===32){var SDI=0;if(VarYear===2021){SDI=Income*0.012;if(Income>128298){SDI=128298*0.012}}else if(VarYear===2022){SDI=Income*0.011;if(Income>145600){SDI=145600*0.011}}else if(VarYear===2023){SDI=Income*0.012;if(Income>153164){SDI=153164*0.009}}else if(VarYear===2024){SDI=Income*0.011}else if(VarYear===2025){SDI=Income*0.011}var ETT=Income*0.001;if(Income>7000){ETT=7000*0.001}Local=SDI+ETT}var IncomeState=Income-(StandDed+DepEx+PerEx);var StateTax=getStateTax(IncomeState,VarStat,StateID,VarYear);var StateTaxAftCred=StateTax-StandDedCredit-DepExCredit-PerExCredit;var TotIncTax=TaxFed+StateTaxAftCred+Local;return TotIncTax});omni.define("getDepEx",function(VarYear,Income,VarStat,StateID,VarDep){var DepEx=0;var DepExCredit=0;if(StateID!==3&&StateID!==4&&StateID!==5&&StateID!==8&&StateID!==15&&StateID!==19&&StateID!==27&&StateID!==37&&StateID!==44){DepEx=getDepEx(StateID,VarYear)*VarDep}else{DepExCredit=getDepEx(StateID,VarYear)*VarDep}return DepEx});omni.define("getPerEx",function(VarYear,Income,VarStat,StateID){var PerEx=0;var PerExCredit=0;if(StateID!==4&&StateID!==5&&StateID!==8&&StateID!==15&&StateID!==27&&StateID!==37){PerEx=getPerEx(VarYear,VarStat,StateID)}else{PerExCredit=getPerEx(VarYear,VarStat,StateID)}return PerEx});omni.define("getStandDeduc",function(VarYear,Income,VarStat,StateID,VarDep){var StandDed=0;var StandDedCredit=0;if(StateID!==44){StandDed=getStandDed(VarStat,StateID,VarYear)}else{StandDedCredit=getStandDed(VarStat,StateID,VarYear)}return StandDed});omni.define("getStateEx",function(VarYear,Income,VarStat,StateID,VarDep){var DepEx=0;var DepExCredit=0;if(StateID!==3&&StateID!==4&&StateID!==5&&StateID!==8&&StateID!==15&&StateID!==19&&StateID!==27&&StateID!==37&&StateID!==44){DepEx=getDepEx(StateID,VarYear)*VarDep}else{DepExCredit=getDepEx(StateID,VarYear)*VarDep}var PerEx=0;var PerExCredit=0;if(StateID!==4&&StateID!==5&&StateID!==8&&StateID!==15&&StateID!==27&&StateID!==37){PerEx=getPerEx(VarYear,VarStat,StateID)}else{PerExCredit=getPerEx(VarYear,VarStat,StateID)}var StateEx=PerEx+DepEx;return StateEx});omni.define("getTaxFed",function(VarYear,Income,VarStat){var TaxFed;if(VarYear===2022){TaxFed=getTaxFed22(Income,VarStat)}if(VarYear===2023){TaxFed=getTaxFed23(Income,VarStat)}if(VarYear===2024){TaxFed=getTaxFed24(Income,VarStat)}if(VarYear===2025){TaxFed=getTaxFed25(Income,VarStat)}if(TaxFed<0){TaxFed=0}return TaxFed});omni.define("getStateTaxAftCred",function(VarYear,Income,VarStat,StateID,VarDep){var TaxFed;if(VarYear===2022){TaxFed=getTaxFed22(Income,VarStat)}if(VarYear===2023){TaxFed=getTaxFed23(Income,VarStat)}if(VarYear===2024){TaxFed=getTaxFed24(Income,VarStat)}if(VarYear===2025){TaxFed=getTaxFed25(Income,VarStat)}if(TaxFed<0){TaxFed=0}var StandDed=0;var StandDedCredit=0;if(StateID!==44){StandDed=getStandDed(VarStat,StateID,VarYear)}else{StandDedCredit=getStandDed(VarStat,StateID,VarYear)}var DepEx=0;var DepExCredit=0;if(StateID!==3&&StateID!==4&&StateID!==5&&StateID!==8&&StateID!==15&&StateID!==19&&StateID!==27&&StateID!==37&&StateID!==44){DepEx=getDepEx(StateID,VarYear)*VarDep}else{DepExCredit=getDepEx(StateID,VarYear)*VarDep}var PerEx=0;var PerExCredit=0;if(StateID!==4&&StateID!==5&&StateID!==8&&StateID!==15&&StateID!==27&&StateID!==37){PerEx=getPerEx(VarYear,VarStat,StateID)}else{PerExCredit=getPerEx(VarYear,VarStat,StateID)}var IncomeState=Income-(StandDed+DepEx+PerEx);var StateTax=getStateTax(IncomeState,VarStat,StateID,VarYear);var StateTaxAftCred=StateTax-StandDedCredit-DepExCredit-PerExCredit;if(StateTaxAftCred<0){StateTaxAftCred=0}return StateTaxAftCred});omni.define("getLocal",function(VarYear,Income,VarStat,taxJur){var Local=0;if(taxJur===1){if(VarStat===2){if(Income<21600){Local=Income*0.03078}else if(Income>=21600&&Income<45000){Local=(Income-21600)*0.03762+665}else if(Income>=45000&&Income<90000){Local=(Income-45000)*0.03819+1545}else if(Income>=90000){Local=(Income-90000)*0.03876+3264}}if(VarStat===1||VarStat===3){if(Income<12000){Local=Income*0.03078}else if(Income>=12000&&Income<25000){Local=(Income-12000)*0.03762+369}else if(Income>=25000&&Income<50000){Local=(Income-25000)*0.03819+858}else if(Income>=50000){Local=(Income-50000)*0.03876+1813}}if(VarStat===4){if(Income<14400){Local=Income*0.03078}else if(Income>=14400&&Income<30000){Local=(Income-14400)*0.03762+443}else if(Income>=30000&&Income<60000){Local=(Income-30000)*0.03819+858}else if(Income>=60000){Local=(Income-60000)*0.03876+2176}}}else{Local=0}return Local});omni.define("getCredit",function(VarYear,Income,VarStat,StateID,VarDep){var TaxFed;if(VarYear===2022){TaxFed=getTaxFed22(Income,VarStat)}if(VarYear===2023){TaxFed=getTaxFed23(Income,VarStat)}if(VarYear===2024){TaxFed=getTaxFed24(Income,VarStat)}if(VarYear===2025){TaxFed=getTaxFed25(Income,VarStat)}if(TaxFed<0){TaxFed=0}var StandDed=0;var StandDedCredit=0;if(StateID!==44){StandDed=getStandDed(VarStat,StateID,VarYear)}else{StandDedCredit=getStandDed(VarStat,StateID,VarYear)}var DepEx=0;var DepExCredit=0;if(StateID!==3&&StateID!==4&&StateID!==5&&StateID!==8&&StateID!==15&&StateID!==19&&StateID!==27&&StateID!==37&&StateID!==44){DepEx=getDepEx(StateID,VarYear)*VarDep}else{DepExCredit=getDepEx(StateID,VarYear)*VarDep}var PerEx=0;var PerExCredit=0;if(StateID!==4&&StateID!==5&&StateID!==8&&StateID!==15&&StateID!==27&&StateID!==37){PerEx=getPerEx(VarYear,VarStat,StateID)}else{PerExCredit=getPerEx(VarYear,VarStat,StateID)}var Credit=StandDedCredit+DepExCredit+PerExCredit;return Credit});omni.define("getFica",function(VarYear,Income,VarStat){var SocSec=Income*0.062;if(VarYear===2022&&Income>147000){SocSec=147000*0.062}else if(VarYear===2023&&Income>160200){SocSec=160200*0.062}else if(VarYear===2024&&Income>168600){SocSec=168600*0.062}else if(VarYear===2025&&Income>168600){SocSec=168600*0.062}var MedCare=0;var MedLimit=200000;if(VarStat===2){MedLimit=250000}else if(VarStat===3){MedLimit=125000}if(Income<=MedLimit){MedCare=Income*0.0145}else{MedCare=MedLimit*0.0145+(Income-MedLimit)*0.0235}var Fica=SocSec+MedCare;return Fica});omni.define("getSocSec",function(VarYear,Income){var SocSec=Income*0.062;if(VarYear===2022&&Income>147000){SocSec=147000*0.062}else if(VarYear===2023&&Income>160200){SocSec=160200*0.062}else if(VarYear===2024&&Income>168600){SocSec=168600*0.062}else if(VarYear===2025&&Income>168600){SocSec=168600*0.062}return SocSec});omni.define("getMedCare",function(VarYear,Income,VarStat){var MedCare=0;var MedLimit=200000;if(VarStat===2){MedLimit=250000}else if(VarStat===3){MedLimit=125000}if(Income<=MedLimit){MedCare=Income*0.0145}else{MedCare=MedLimit*0.0145+(Income-MedLimit)*0.0235}return MedCare});function getTaxBracketFed(Bracket,VarStat,VarYear){var Brack1,Brack2,Brack3,Brack4,Brack5,Brack6;var UnmarBrack1,UnmarBrack2,UnmarBrack3,UnmarBrack4,UnmarBrack5,UnmarBrack6;var MarJointBrack1,MarJointBrack2,MarJointBrack3,MarJointBrack4,MarJointBrack5,MarJointBrack6;var MarSepBrack1,MarSepBrack2,MarSepBrack3,MarSepBrack4,MarSepBrack5,MarSepBrack6;var HeadBrack1,HeadBrack2,HeadBrack3,HeadBrack4,HeadBrack5,HeadBrack6;if(VarYear===2022){UnmarBrack1=10275;UnmarBrack2=41775;UnmarBrack3=89075;UnmarBrack4=170050;UnmarBrack5=215950;UnmarBrack6=539900;MarJointBrack1=20550;MarJointBrack2=83550;MarJointBrack3=178150;MarJointBrack4=340100;MarJointBrack5=431900;MarJointBrack6=647850;MarSepBrack1=10275;MarSepBrack2=41775;MarSepBrack3=89075;MarSepBrack4=170050;MarSepBrack5=215950;MarSepBrack6=323925;HeadBrack1=14650;HeadBrack2=55900;HeadBrack3=89050;HeadBrack4=170050;HeadBrack5=215950;HeadBrack6=539900}if(VarYear===2023){UnmarBrack1=11000;UnmarBrack2=44725;UnmarBrack3=95375;UnmarBrack4=182100;UnmarBrack5=231250;UnmarBrack6=578125;MarJointBrack1=22000;MarJointBrack2=89450;MarJointBrack3=190750;MarJointBrack4=364200;MarJointBrack5=462500;MarJointBrack6=693750;MarSepBrack1=11000;MarSepBrack2=44725;MarSepBrack3=95375;MarSepBrack4=182100;MarSepBrack5=231250;MarSepBrack6=346875;HeadBrack1=15700;HeadBrack2=59850;HeadBrack3=95350;HeadBrack4=182100;HeadBrack5=231250;HeadBrack6=578100}if(VarYear===2024){UnmarBrack1=11600;UnmarBrack2=47150;UnmarBrack3=100525;UnmarBrack4=191950;UnmarBrack5=243725;UnmarBrack6=609350;MarJointBrack1=23200;MarJointBrack2=94300;MarJointBrack3=201050;MarJointBrack4=383900;MarJointBrack5=487450;MarJointBrack6=731200;MarSepBrack1=11600;MarSepBrack2=47150;MarSepBrack3=100525;MarSepBrack4=191950;MarSepBrack5=243725;MarSepBrack6=365600;HeadBrack1=16550;HeadBrack2=63100;HeadBrack3=100500;HeadBrack4=191950;HeadBrack5=243700;HeadBrack6=609350}if(VarStat===1){Brack1=UnmarBrack1;Brack2=UnmarBrack2;Brack3=UnmarBrack3;Brack4=UnmarBrack4;Brack5=UnmarBrack5;Brack6=UnmarBrack6}if(VarStat===2){Brack1=MarJointBrack1;Brack2=MarJointBrack2;Brack3=MarJointBrack3;Brack4=MarJointBrack4;Brack5=MarJointBrack5;Brack6=MarJointBrack6}if(VarStat===3){Brack1=MarSepBrack1;Brack2=MarSepBrack2;Brack3=MarSepBrack3;Brack4=MarSepBrack4;Brack5=MarSepBrack5;Brack6=MarSepBrack6}if(VarStat===4){Brack1=HeadBrack1;Brack2=HeadBrack2;Brack3=HeadBrack3;Brack4=HeadBrack4;Brack5=HeadBrack5;Brack6=HeadBrack6}var Brack;if(Bracket===1){Brack=Brack1}else if(Bracket===2){Brack=Brack2}else if(Bracket===3){Brack=Brack3}else if(Bracket===4){Brack=Brack4}else if(Bracket===5){Brack=Brack5}else if(Bracket===6){Brack=Brack6}return Brack}function getTaxFed22(Inc,VarStat){var Brack1,Brack2,Brack3,Brack4,Brack5,Brack6;var TaxRate0=0.1;var TaxRate1=0.12;var TaxRate2=0.22;var TaxRate3=0.24;var TaxRate4=0.32;var TaxRate5=0.35;var TaxRate6=0.37;var UnmarBrack1=10275;var UnmarBrack2=41775;var UnmarBrack3=89075;var UnmarBrack4=170050;var UnmarBrack5=215950;var UnmarBrack6=539900;var MarJointBrack1=20550;var MarJointBrack2=83550;var MarJointBrack3=178150;var MarJointBrack4=340100;var MarJointBrack5=431900;var MarJointBrack6=647850;var MarSepBrack1=10275;var MarSepBrack2=41775;var MarSepBrack3=89075;var MarSepBrack4=170050;var MarSepBrack5=215950;var MarSepBrack6=323925;var HeadBrack1=14650;var HeadBrack2=55900;var HeadBrack3=89050;var HeadBrack4=170050;var HeadBrack5=215950;var HeadBrack6=539900;var TaxFed;if(VarStat===1){Brack1=UnmarBrack1;Brack2=UnmarBrack2;Brack3=UnmarBrack3;Brack4=UnmarBrack4;Brack5=UnmarBrack5;Brack6=UnmarBrack6}if(VarStat===2){Brack1=MarJointBrack1;Brack2=MarJointBrack2;Brack3=MarJointBrack3;Brack4=MarJointBrack4;Brack5=MarJointBrack5;Brack6=MarJointBrack6}if(VarStat===3){Brack1=MarSepBrack1;Brack2=MarSepBrack2;Brack3=MarSepBrack3;Brack4=MarSepBrack4;Brack5=MarSepBrack5;Brack6=MarSepBrack6}if(VarStat===4){Brack1=HeadBrack1;Brack2=HeadBrack2;Brack3=HeadBrack3;Brack4=HeadBrack4;Brack5=HeadBrack5;Brack6=HeadBrack6}var Tax1=Brack1*TaxRate0;var Tax2=(Brack2-Brack1)*TaxRate1+Tax1;var Tax3=(Brack3-Brack2)*TaxRate2+Tax2;var Tax4=(Brack4-Brack3)*TaxRate3+Tax3;var Tax5=(Brack5-Brack4)*TaxRate4+Tax4;var Tax6=(Brack6-Brack5)*TaxRate5+Tax5;if(Inc<=Brack1){TaxFed=Inc*TaxRate0}else if(Inc>Brack1&&Inc<=Brack2){TaxFed=Tax1+(Inc-Brack1)*TaxRate1}else if(Inc>Brack2&&Inc<=Brack3){TaxFed=Tax2+(Inc-Brack2)*TaxRate2}else if(Inc>Brack3&&Inc<=Brack4){TaxFed=Tax3+(Inc-Brack3)*TaxRate3}else if(Inc>Brack4&&Inc<=Brack5){TaxFed=Tax4+(Inc-Brack4)*TaxRate4}else if(Inc>Brack5&&Inc<=Brack6){TaxFed=Tax5+(Inc-Brack5)*TaxRate5}else if(Inc>Brack6){TaxFed=Tax6+(Inc-Brack6)*TaxRate6}return TaxFed}function getTaxFed23(Inc,VarStat){var Brack1,Brack2,Brack3,Brack4,Brack5,Brack6;var TaxRate0=0.1;var TaxRate1=0.12;var TaxRate2=0.22;var TaxRate3=0.24;var TaxRate4=0.32;var TaxRate5=0.35;var TaxRate6=0.37;var UnmarBrack1=11000;var UnmarBrack2=44725;var UnmarBrack3=95375;var UnmarBrack4=182100;var UnmarBrack5=231250;var UnmarBrack6=578125;var MarJointBrack1=22000;var MarJointBrack2=89450;var MarJointBrack3=190750;var MarJointBrack4=364200;var MarJointBrack5=462500;var MarJointBrack6=693750;var MarSepBrack1=11000;var MarSepBrack2=44725;var MarSepBrack3=95375;var MarSepBrack4=182100;var MarSepBrack5=231250;var MarSepBrack6=346875;var HeadBrack1=15700;var HeadBrack2=59850;var HeadBrack3=95350;var HeadBrack4=182100;var HeadBrack5=231250;var HeadBrack6=578100;var TaxFed;if(VarStat===1){Brack1=UnmarBrack1;Brack2=UnmarBrack2;Brack3=UnmarBrack3;Brack4=UnmarBrack4;Brack5=UnmarBrack5;Brack6=UnmarBrack6}if(VarStat===2){Brack1=MarJointBrack1;Brack2=MarJointBrack2;Brack3=MarJointBrack3;Brack4=MarJointBrack4;Brack5=MarJointBrack5;Brack6=MarJointBrack6}if(VarStat===3){Brack1=MarSepBrack1;Brack2=MarSepBrack2;Brack3=MarSepBrack3;Brack4=MarSepBrack4;Brack5=MarSepBrack5;Brack6=MarSepBrack6}if(VarStat===4){Brack1=HeadBrack1;Brack2=HeadBrack2;Brack3=HeadBrack3;Brack4=HeadBrack4;Brack5=HeadBrack5;Brack6=HeadBrack6}var Tax1=Brack1*TaxRate0;var Tax2=(Brack2-Brack1)*TaxRate1+Tax1;var Tax3=(Brack3-Brack2)*TaxRate2+Tax2;var Tax4=(Brack4-Brack3)*TaxRate3+Tax3;var Tax5=(Brack5-Brack4)*TaxRate4+Tax4;var Tax6=(Brack6-Brack5)*TaxRate5+Tax5;if(Inc<=Brack1){TaxFed=Inc*TaxRate0}else if(Inc>Brack1&&Inc<=Brack2){TaxFed=Tax1+(Inc-Brack1)*TaxRate1}else if(Inc>Brack2&&Inc<=Brack3){TaxFed=Tax2+(Inc-Brack2)*TaxRate2}else if(Inc>Brack3&&Inc<=Brack4){TaxFed=Tax3+(Inc-Brack3)*TaxRate3}else if(Inc>Brack4&&Inc<=Brack5){TaxFed=Tax4+(Inc-Brack4)*TaxRate4}else if(Inc>Brack5&&Inc<=Brack6){TaxFed=Tax5+(Inc-Brack5)*TaxRate5}else if(Inc>Brack6){TaxFed=Tax6+(Inc-Brack6)*TaxRate6}return TaxFed}function getTaxFed24(Inc,VarStat){var Brack1,Brack2,Brack3,Brack4,Brack5,Brack6;var TaxRate0=0.1;var TaxRate1=0.12;var TaxRate2=0.22;var TaxRate3=0.24;var TaxRate4=0.32;var TaxRate5=0.35;var TaxRate6=0.37;var UnmarBrack1=11600;var UnmarBrack2=47150;var UnmarBrack3=100525;var UnmarBrack4=191950;var UnmarBrack5=243725;var UnmarBrack6=609350;var MarJointBrack1=23200;var MarJointBrack2=94300;var MarJointBrack3=201050;var MarJointBrack4=383900;var MarJointBrack5=487450;var MarJointBrack6=731200;var MarSepBrack1=11600;var MarSepBrack2=47150;var MarSepBrack3=100525;var MarSepBrack4=191950;var MarSepBrack5=243725;var MarSepBrack6=365600;var HeadBrack1=16550;var HeadBrack2=63100;var HeadBrack3=100500;var HeadBrack4=191950;var HeadBrack5=243700;var HeadBrack6=609350;var TaxFed;if(VarStat===1){Brack1=UnmarBrack1;Brack2=UnmarBrack2;Brack3=UnmarBrack3;Brack4=UnmarBrack4;Brack5=UnmarBrack5;Brack6=UnmarBrack6}if(VarStat===2){Brack1=MarJointBrack1;Brack2=MarJointBrack2;Brack3=MarJointBrack3;Brack4=MarJointBrack4;Brack5=MarJointBrack5;Brack6=MarJointBrack6}if(VarStat===3){Brack1=MarSepBrack1;Brack2=MarSepBrack2;Brack3=MarSepBrack3;Brack4=MarSepBrack4;Brack5=MarSepBrack5;Brack6=MarSepBrack6}if(VarStat===4){Brack1=HeadBrack1;Brack2=HeadBrack2;Brack3=HeadBrack3;Brack4=HeadBrack4;Brack5=HeadBrack5;Brack6=HeadBrack6}var Tax1=Brack1*TaxRate0;var Tax2=(Brack2-Brack1)*TaxRate1+Tax1;var Tax3=(Brack3-Brack2)*TaxRate2+Tax2;var Tax4=(Brack4-Brack3)*TaxRate3+Tax3;var Tax5=(Brack5-Brack4)*TaxRate4+Tax4;var Tax6=(Brack6-Brack5)*TaxRate5+Tax5;if(Inc<=Brack1){TaxFed=Inc*TaxRate0}else if(Inc>Brack1&&Inc<=Brack2){TaxFed=Tax1+(Inc-Brack1)*TaxRate1}else if(Inc>Brack2&&Inc<=Brack3){TaxFed=Tax2+(Inc-Brack2)*TaxRate2}else if(Inc>Brack3&&Inc<=Brack4){TaxFed=Tax3+(Inc-Brack3)*TaxRate3}else if(Inc>Brack4&&Inc<=Brack5){TaxFed=Tax4+(Inc-Brack4)*TaxRate4}else if(Inc>Brack5&&Inc<=Brack6){TaxFed=Tax5+(Inc-Brack5)*TaxRate5}else if(Inc>Brack6){TaxFed=Tax6+(Inc-Brack6)*TaxRate6}return TaxFed}function getTaxFed25(Inc,VarStat){var Brack1,Brack2,Brack3,Brack4,Brack5,Brack6;var TaxRate0=0.1;var TaxRate1=0.12;var TaxRate2=0.22;var TaxRate3=0.24;var TaxRate4=0.32;var TaxRate5=0.35;var TaxRate6=0.37;var UnmarBrack1=11925;var UnmarBrack2=48475;var UnmarBrack3=103350;var UnmarBrack4=197300;var UnmarBrack5=250525;var UnmarBrack6=626350;var MarJointBrack1=23850;var MarJointBrack2=96950;var MarJointBrack3=206700;var MarJointBrack4=394600;var MarJointBrack5=501050;var MarJointBrack6=751600;var MarSepBrack1=11600;var MarSepBrack2=47150;var MarSepBrack3=100525;var MarSepBrack4=191950;var MarSepBrack5=243725;var MarSepBrack6=365600;var HeadBrack1=16550;var HeadBrack2=63100;var HeadBrack3=100500;var HeadBrack4=191950;var HeadBrack5=243700;var HeadBrack6=609350;var TaxFed;if(VarStat===1){Brack1=UnmarBrack1;Brack2=UnmarBrack2;Brack3=UnmarBrack3;Brack4=UnmarBrack4;Brack5=UnmarBrack5;Brack6=UnmarBrack6}if(VarStat===2){Brack1=MarJointBrack1;Brack2=MarJointBrack2;Brack3=MarJointBrack3;Brack4=MarJointBrack4;Brack5=MarJointBrack5;Brack6=MarJointBrack6}if(VarStat===3){Brack1=MarSepBrack1;Brack2=MarSepBrack2;Brack3=MarSepBrack3;Brack4=MarSepBrack4;Brack5=MarSepBrack5;Brack6=MarSepBrack6}if(VarStat===4){Brack1=HeadBrack1;Brack2=HeadBrack2;Brack3=HeadBrack3;Brack4=HeadBrack4;Brack5=HeadBrack5;Brack6=HeadBrack6}var Tax1=Brack1*TaxRate0;var Tax2=(Brack2-Brack1)*TaxRate1+Tax1;var Tax3=(Brack3-Brack2)*TaxRate2+Tax2;var Tax4=(Brack4-Brack3)*TaxRate3+Tax3;var Tax5=(Brack5-Brack4)*TaxRate4+Tax4;var Tax6=(Brack6-Brack5)*TaxRate5+Tax5;if(Inc<=Brack1){TaxFed=Inc*TaxRate0}else if(Inc>Brack1&&Inc<=Brack2){TaxFed=Tax1+(Inc-Brack1)*TaxRate1}else if(Inc>Brack2&&Inc<=Brack3){TaxFed=Tax2+(Inc-Brack2)*TaxRate2}else if(Inc>Brack3&&Inc<=Brack4){TaxFed=Tax3+(Inc-Brack3)*TaxRate3}else if(Inc>Brack4&&Inc<=Brack5){TaxFed=Tax4+(Inc-Brack4)*TaxRate4}else if(Inc>Brack5&&Inc<=Brack6){TaxFed=Tax5+(Inc-Brack5)*TaxRate5}else if(Inc>Brack6){TaxFed=Tax6+(Inc-Brack6)*TaxRate6}return TaxFed}function getTaxRate(StateID,Bracket,VarYear,VarStat){var TaxRate=0;if(VarYear===2023){if(Bracket===0){TaxRate=0.04}else if(Bracket===1){TaxRate=0.045}else if(Bracket===2){TaxRate=0.0525}else if(Bracket===3){TaxRate=0.055}else if(Bracket===4){TaxRate=0.06}else if(Bracket===5){TaxRate=0.0685}else if(Bracket===6){TaxRate=0.0965}else if(Bracket===7){TaxRate=0.103}else if(Bracket===8){TaxRate=0.109}}else if(VarYear===2024){if(Bracket===0){TaxRate=0.04}else if(Bracket===1){TaxRate=0.045}else if(Bracket===2){TaxRate=0.0525}else if(Bracket===3){TaxRate=0.055}else if(Bracket===4){TaxRate=0.06}else if(Bracket===5){TaxRate=0.0685}else if(Bracket===6){TaxRate=0.0965}else if(Bracket===7){TaxRate=0.103}else if(Bracket===8){TaxRate=0.109}}else if(VarYear===2022){if(Bracket===0){TaxRate=0.04}else if(Bracket===1){TaxRate=0.045}else if(Bracket===2){TaxRate=0.0525}else if(Bracket===3){TaxRate=0.0585}else if(Bracket===4){TaxRate=0.0625}else if(Bracket===5){TaxRate=0.0685}else if(Bracket===6){TaxRate=0.0965}else if(Bracket===7){TaxRate=0.103}else if(Bracket===8){TaxRate=0.109}}else if(VarYear===2025){if(Bracket===0){TaxRate=0.04}else if(Bracket===1){TaxRate=0.045}else if(Bracket===2){TaxRate=0.0525}else if(Bracket===3){TaxRate=0.055}else if(Bracket===4){TaxRate=0.06}else if(Bracket===5){TaxRate=0.0685}else if(Bracket===6){TaxRate=0.0965}else if(Bracket===7){TaxRate=0.103}else if(Bracket===8){TaxRate=0.109}}return TaxRate}function getTaxBracket(StateID,Status,Bracket,VarYear){var Brack=0;if(VarYear===2024){if(StateID===32){if(Bracket===1){if(Status===1){Brack=8500}if(Status===2){Brack=17150}}else if(Bracket===2){if(Status===1){Brack=11700}if(Status===2){Brack=23600}}else if(Bracket===3){if(Status===1){Brack=13900}if(Status===2){Brack=27900}}else if(Bracket===4){if(Status===1){Brack=80650}if(Status===2){Brack=161550}}else if(Bracket===5){if(Status===1){Brack=215400}if(Status===2){Brack=323200}}else if(Bracket===6){if(Status===1){Brack=1077550}if(Status===2){Brack=2155350}}else if(Bracket===7){if(Status===1){Brack=5000000}if(Status===2){Brack=5000000}}else if(Bracket===8){if(Status===1){Brack=25000000}if(Status===2){Brack=25000000}}}}else if(VarYear===2022){var VarStat=Status;if(StateID===32){if(Bracket===1){if(VarStat===1||VarStat===3){Brack=8500}if(VarStat===2||VarStat===4){Brack=17150}}else if(Bracket===2){if(VarStat===1||VarStat===3){Brack=11700}if(VarStat===2||VarStat===4){Brack=23600}}else if(Bracket===3){if(VarStat===1||VarStat===3){Brack=13900}if(VarStat===2||VarStat===4){Brack=27900}}else if(Bracket===4){if(VarStat===1||VarStat===3){Brack=80650}if(VarStat===2||VarStat===4){Brack=161550}}else if(Bracket===5){if(VarStat===1||VarStat===3){Brack=215400}if(VarStat===2||VarStat===4){Brack=323200}}else if(Bracket===6){if(VarStat===1||VarStat===3){Brack=1077550}if(VarStat===2||VarStat===4){Brack=2155350}}else if(Bracket===7){if(VarStat===1||VarStat===3){Brack=5000000}if(VarStat===2||VarStat===4){Brack=5000000}}else if(Bracket===8){if(VarStat===1||VarStat===3){Brack=25000000}if(VarStat===2||VarStat===4){Brack=25000000}}}}else if(VarYear===2023){if(StateID===32){if(Bracket===1){if(Status===1){Brack=8500}if(Status===2){Brack=17150}}else if(Bracket===2){if(Status===1){Brack=11700}if(Status===2){Brack=23600}}else if(Bracket===3){if(Status===1){Brack=13900}if(Status===2){Brack=27900}}else if(Bracket===4){if(Status===1){Brack=80650}if(Status===2){Brack=161550}}else if(Bracket===5){if(Status===1){Brack=215400}if(Status===2){Brack=323200}}else if(Bracket===6){if(Status===1){Brack=1077550}if(Status===2){Brack=2155350}}else if(Bracket===7){if(Status===1){Brack=5000000}if(Status===2){Brack=5000000}}}}else if(VarYear===2025){if(StateID===32){if(Bracket===1){if(Status===1){Brack=8500}if(Status===2){Brack=17150}}else if(Bracket===2){if(Status===1){Brack=11700}if(Status===2){Brack=23600}}else if(Bracket===3){if(Status===1){Brack=13900}if(Status===2){Brack=27900}}else if(Bracket===4){if(Status===1){Brack=80650}if(Status===2){Brack=161550}}else if(Bracket===5){if(Status===1){Brack=215400}if(Status===2){Brack=323200}}else if(Bracket===6){if(Status===1){Brack=1077550}if(Status===2){Brack=2155350}}else if(Bracket===7){if(Status===1){Brack=5000000}if(Status===2){Brack=5000000}}else if(Bracket===8){if(Status===1){Brack=25000000}if(Status===2){Brack=25000000}}}}return Brack}function getStateTax(Inc,VarStat,StateID,VarYear){var Brack1=getTaxBracket(StateID,VarStat,1,VarYear);var Brack2=getTaxBracket(StateID,VarStat,2,VarYear);var Brack3=getTaxBracket(StateID,VarStat,3,VarYear);var Brack4=getTaxBracket(StateID,VarStat,4,VarYear);var Brack5=getTaxBracket(StateID,VarStat,5,VarYear);var Brack6=getTaxBracket(StateID,VarStat,6,VarYear);var Brack7=getTaxBracket(StateID,VarStat,7,VarYear);var Brack8=getTaxBracket(StateID,VarStat,8,VarYear);var Brack9=getTaxBracket(StateID,VarStat,9,VarYear);var Brack10=getTaxBracket(StateID,VarStat,10,VarYear);var Brack11=getTaxBracket(StateID,VarStat,11,VarYear);var Brack12=getTaxBracket(StateID,VarStat,12,VarYear);var TaxRate0=getTaxRate(StateID,0,VarYear);var TaxRate1=getTaxRate(StateID,1,VarYear);var TaxRate2=getTaxRate(StateID,2,VarYear);var TaxRate3=getTaxRate(StateID,3,VarYear);var TaxRate4=getTaxRate(StateID,4,VarYear);var TaxRate5=getTaxRate(StateID,5,VarYear);var TaxRate6=getTaxRate(StateID,6,VarYear);var TaxRate7=getTaxRate(StateID,7,VarYear);var TaxRate8=getTaxRate(StateID,8,VarYear);var TaxRate9=getTaxRate(StateID,9,VarYear);var TaxRate10=getTaxRate(StateID,10,VarYear);var TaxRate11=getTaxRate(StateID,11,VarYear);var TaxRate12=getTaxRate(StateID,12,VarYear);var StateTax=0;var Tax1=Brack1*TaxRate0;var Tax2=(Brack2-Brack1)*TaxRate1+Tax1;var Tax3=(Brack3-Brack2)*TaxRate2+Tax2;var Tax4=(Brack4-Brack3)*TaxRate3+Tax3;var Tax5=(Brack5-Brack4)*TaxRate4+Tax4;var Tax6=(Brack6-Brack5)*TaxRate5+Tax5;var Tax7=(Brack7-Brack6)*TaxRate6+Tax6;var Tax8=(Brack8-Brack7)*TaxRate7+Tax7;var Tax9=(Brack9-Brack8)*TaxRate8+Tax8;var Tax10=(Brack10-Brack9)*TaxRate9+Tax9;var Tax11=(Brack11-Brack10)*TaxRate10+Tax10;var Tax12=(Brack12-Brack11)*TaxRate11+Tax11;if(Inc<=Brack1||Brack1===0){StateTax=Inc*TaxRate0}else if(Inc>Brack1&&(Inc<=Brack2||Brack2===0)){StateTax=Tax1+(Inc-Brack1)*TaxRate1}else if(Inc>Brack2&&(Inc<=Brack3||Brack3===0)){StateTax=Tax2+(Inc-Brack2)*TaxRate2}else if(Inc>Brack3&&(Inc<=Brack4||Brack4===0)){StateTax=Tax3+(Inc-Brack3)*TaxRate3}else if(Inc>Brack4&&(Inc<=Brack5||Brack5===0)){StateTax=Tax4+(Inc-Brack4)*TaxRate4}else if(Inc>Brack5&&(Inc<=Brack6||Brack6===0)){StateTax=Tax5+(Inc-Brack5)*TaxRate5}else if(Inc>Brack6&&(Inc<=Brack7||Brack7===0)){StateTax=Tax6+(Inc-Brack6)*TaxRate6}else if(Inc>Brack7&&(Inc<=Brack8||Brack8===0)){StateTax=Tax7+(Inc-Brack7)*TaxRate7}else if(Inc>Brack8&&(Inc<=Brack9||Brack9===0)){StateTax=Tax8+(Inc-Brack8)*TaxRate8}else if(Inc>Brack9&&(Inc<=Brack10||Brack10===0)){StateTax=Tax9+(Inc-Brack9)*TaxRate9}else if(Inc>Brack10&&(Inc<=Brack11||Brack11===0)){StateTax=Tax10+(Inc-Brack10)*TaxRate10}else if(Inc>Brack11&&(Inc<=Brack12||Brack12===0)){StateTax=Tax11+(Inc-Brack11)*TaxRate11}else if(Inc>Brack12||Brack12!==0){StateTax=Tax12+(Inc-Brack12)*TaxRate12}return StateTax}function getStandDed(VarStat,StateID,VarYear){var StandDed=0;if(VarYear===2024){if(StateID===32){if(VarStat===1||VarStat===3){StandDed=8000}if(VarStat===2||VarStat===4){StandDed=16050}}}else if(VarYear===2022){if(StateID===32){if(VarStat===1||VarStat===3){StandDed=8000}if(VarStat===2||VarStat===4){StandDed=16050}}}else if(VarYear===2023){if(StateID===32){if(VarStat===1||VarStat===3){StandDed=8000}if(VarStat===2||VarStat===4){StandDed=16050}}}else if(VarYear===2025){if(StateID===32){if(VarStat===1||VarStat===3){StandDed=8000}if(VarStat===2||VarStat===4){StandDed=16050}}}return StandDed}function getDepEx(StateID,VarYear){var DepEx=0;if(VarYear===2024){if(StateID===1){DepEx=1000}else if(StateID===3){DepEx=100}else if(StateID===4){DepEx=29}else if(StateID===5){DepEx=446}else if(StateID===8){DepEx=110}else if(StateID===10){DepEx=3000}else if(StateID===11){DepEx=1144}else if(StateID===13){DepEx=2775}else if(StateID===14){DepEx=1000}else if(StateID===15){DepEx=40}else if(StateID===16){DepEx=2250}else if(StateID===18){DepEx=1000}else if(StateID===19){DepEx=300}else if(StateID===20){DepEx=3200}else if(StateID===21){DepEx=1000}else if(StateID===22){DepEx=5600}else if(StateID===23){DepEx=5050}else if(StateID===24){DepEx=1500}else if(StateID===27){DepEx=157}else if(StateID===30){DepEx=1500}else if(StateID===31){DepEx=4000}else if(StateID===32){DepEx=1000}else if(StateID===35){DepEx=2500}else if(StateID===36){DepEx=1000}else if(StateID===37){DepEx=249}else if(StateID===39){DepEx=4950}else if(StateID===40){DepEx=4.6}else if(StateID===44){DepEx=1941}else if(StateID===45){DepEx=4850}else if(StateID===46){DepEx=930}else if(StateID===48){DepEx=2000}else if(StateID===49){DepEx=700}}else if(VarYear===2022){if(StateID===1){DepEx=1000}else if(StateID===10){DepEx=3000}else if(StateID===11){DepEx=1144}else if(StateID===13){DepEx=2375}else if(StateID===14){DepEx=1000}else if(StateID===16){DepEx=2250}else if(StateID===18){DepEx=1000}else if(StateID===20){DepEx=3200}else if(StateID===21){DepEx=1000}else if(StateID===22){DepEx=5000}else if(StateID===23){DepEx=4450}else if(StateID===24){DepEx=1500}else if(StateID===26){DepEx=2580}else if(StateID===30){DepEx=1500}else if(StateID===31){DepEx=4000}else if(StateID===32){DepEx=1000}else if(StateID===35){DepEx=2400}else if(StateID===36){DepEx=1000}else if(StateID===39){DepEx=4350}else if(StateID===40){DepEx=4300}else if(StateID===45){DepEx=4350}else if(StateID===46){DepEx=930}else if(StateID===48){DepEx=2000}else if(StateID===49){DepEx=700}else if(StateID===3){DepEx=100}else if(StateID===4){DepEx=29}else if(StateID===5){DepEx=400}else if(StateID===8){DepEx=110}else if(StateID===15){DepEx=40}else if(StateID===19){DepEx=300}else if(StateID===27){DepEx=146}else if(StateID===37){DepEx=219}else if(StateID===44){DepEx=1750}}else if(VarYear===2023){if(StateID===1){DepEx=1000}else if(StateID===3){DepEx=100}else if(StateID===4){DepEx=29}else if(StateID===5){DepEx=433}else if(StateID===8){DepEx=110}else if(StateID===10){DepEx=3000}else if(StateID===11){DepEx=1144}else if(StateID===13){DepEx=2425}else if(StateID===14){DepEx=1000}else if(StateID===15){DepEx=40}else if(StateID===16){DepEx=2250}else if(StateID===18){DepEx=1000}else if(StateID===19){DepEx=300}else if(StateID===20){DepEx=3200}else if(StateID===21){DepEx=1000}else if(StateID===22){DepEx=5400}else if(StateID===23){DepEx=4800}else if(StateID===24){DepEx=1500}else if(StateID===26){DepEx=2960}else if(StateID===27){DepEx=157}else if(StateID===30){DepEx=1500}else if(StateID===31){DepEx=4000}else if(StateID===32){DepEx=1000}else if(StateID===35){DepEx=2400}else if(StateID===36){DepEx=1000}else if(StateID===37){DepEx=236}else if(StateID===39){DepEx=4700}else if(StateID===40){DepEx=4.6}else if(StateID===44){DepEx=1.8}else if(StateID===45){DepEx=4500}else if(StateID===46){DepEx=930}else if(StateID===48){DepEx=2000}else if(StateID===49){DepEx=700}}else if(VarYear===2025){if(StateID===1){DepEx=1000}else if(StateID===3){DepEx=100}else if(StateID===4){DepEx=29}else if(StateID===5){DepEx=461}else if(StateID===8){DepEx=110}else if(StateID===10){DepEx=3000}else if(StateID===11){DepEx=1144}else if(StateID===13){DepEx=2775}else if(StateID===14){DepEx=1000}else if(StateID===15){DepEx=40}else if(StateID===16){DepEx=2250}else if(StateID===18){DepEx=1000}else if(StateID===19){DepEx=300}else if(StateID===20){DepEx=3200}else if(StateID===21){DepEx=1000}else if(StateID===22){DepEx=5600}else if(StateID===23){DepEx=5050}else if(StateID===24){DepEx=1500}else if(StateID===27){DepEx=157}else if(StateID===30){DepEx=1500}else if(StateID===31){DepEx=4000}else if(StateID===32){DepEx=1000}else if(StateID===35){DepEx=2500}else if(StateID===36){DepEx=1000}else if(StateID===37){DepEx=249}else if(StateID===39){DepEx=4950}else if(StateID===40){DepEx=4.6}else if(StateID===44){DepEx=1941}else if(StateID===45){DepEx=4850}else if(StateID===46){DepEx=930}else if(StateID===48){DepEx=2000}else if(StateID===49){DepEx=700}}return DepEx}function getPerEx(VarYear,VarStat,StateID){var PerEx=0;if(VarYear===2024){if(StateID===1){if(VarStat===1||VarStat===3){PerEx=1500}if(VarStat===2||VarStat===4){PerEx=3000}}else if(StateID===4){if(VarStat===1||VarStat===3){PerEx=29}if(VarStat===2||VarStat===4){PerEx=58}}else if(StateID===5){if(VarStat===1||VarStat===3){PerEx=144}if(VarStat===2||VarStat===4){PerEx=288}}}else if(VarYear===2022){if(StateID===1){if(VarStat===1||VarStat===3){PerEx=1500}if(VarStat===2||VarStat===4){PerEx=3000}}else if(StateID===4){if(VarStat===1||VarStat===3){PerEx=29}if(VarStat===2||VarStat===4){PerEx=58}}else if(StateID===5){if(VarStat===1||VarStat===3){PerEx=129}if(VarStat===2||VarStat===4){PerEx=258}}}else if(VarYear===2023){if(StateID===1){if(VarStat===1||VarStat===3){PerEx=1500}if(VarStat===2||VarStat===4){PerEx=3000}}else if(StateID===4){if(VarStat===1||VarStat===3){PerEx=29}if(VarStat===2||VarStat===4){PerEx=58}}else if(StateID===5){if(VarStat===1||VarStat===3){PerEx=140}if(VarStat===2||VarStat===4){PerEx=280}}}return PerEx}//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Enter Adjusted Gross Income (AGI), Pay frequency and Year of income into New York tax and the answer comes back as VarYear and VarPay. It is a single relationship that reads varYear out of adjusted Gross Income (AGI), not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the New York tax calculator works', 'html' => <<<'TXT'
            <p>The New York tax calculator applies one relationship to 10 numbers and reports VarYear and VarPay.</p><p>Written with the labels from the form, Annual retirement contributions = Ret perc × Adjusted Gross Income (AGI).</p><p>The answers are VarYear and VarPay; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 10 boxes and the page has everything it needs.</p><ul><li><strong>Adjusted Gross Income (AGI)</strong> — in annual</li><li><strong>Pay frequency</strong> — a plain number, no unit. Set here the period in which you want to see your take-home pay.</li><li><strong>Year of income</strong> — a plain number, no unit</li><li><strong>What is your filling status?</strong> — a plain number, no unit</li><li><strong>Are you a resident in NYC?</strong> — a plain number, no unit. New Your City residents are obliged to pay local income tax after their income.</li><li><strong>Number of add. dependent(s)</strong> — in person(s). State here only the number of additional dependent(s) - don&#039;t state here yourself or your spouse.</li><li><strong>Itemized deductions</strong> — a plain number, no unit. Set here the total of itemized deductions other than retirement contribution relevant to the federal income tax. If you don&#039;t set a deduction or it is less than the standard deduction, the standard deduction will be considered.</li><li><strong>Post-tax deductions</strong> — a plain number, no unit</li><li><strong>Ret perc</strong> — a plain number, no unit</li><li><strong>Annual retirement contributions</strong> — in $</li></ul><p>The answers come back as VarYear, VarPay. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Adjusted Gross Income (AGI) lists 4 options and opens on annual. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Annual retirement contributions</strong> = <code>Ret perc × Adjusted Gross Income (AGI)</code></li><li><strong>Adjusted Gross Income (AGI)</strong> = <code>Annual retirement contributions ÷ Ret perc</code></li><li><strong>Ret perc</strong> = <code>Annual retirement contributions ÷ Adjusted Gross Income (AGI)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Annual retirement contributions</strong> = <code>Ret perc × Adjusted Gross Income (AGI)</code> — the form to use when Ret perc and Adjusted Gross Income (AGI) are the values you have.</li><li><strong>Adjusted Gross Income (AGI)</strong> = <code>Annual retirement contributions ÷ Ret perc</code> — the form to use when Annual retirement contributions and Ret perc are the values you have.</li><li><strong>Ret perc</strong> = <code>Annual retirement contributions ÷ Adjusted Gross Income (AGI)</code> — the form to use when Annual retirement contributions and Adjusted Gross Income (AGI) are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Annual retirement contributions, Adjusted Gross Income (AGI) and Ret perc can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Adjusted Gross Income (AGI) carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> VarYear and VarPay are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Adjusted Gross Income (AGI) left as a guess.</strong> Anything typed into Adjusted Gross Income (AGI) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Pay frequency left as a guess.</strong> Anything typed into Pay frequency is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Adjusted Gross Income (AGI) and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the New York tax form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Adjusted Gross Income (AGI)</strong> is a annual quantity: the page opens it in annual and converts anything else you pick before the formula runs. The page reads it when it works out Annual retirement contributions and Ret perc. Fill it from a measurement rather than a memory — Adjusted Gross Income (AGI) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Pay frequency</strong> takes a plain number with no unit attached. Set here the period in which you want to see your take-home pay. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Pay frequency is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Year of income</strong> takes a plain number with no unit attached. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Year of income is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>What is your filling status?</strong> takes a plain number with no unit attached. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — What is your filling status? is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Are you a resident in NYC?</strong> takes a plain number with no unit attached. New Your City residents are obliged to pay local income tax after their income. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Are you a resident in NYC? is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Number of add. dependent(s)</strong> is measured in person(s). State here only the number of additional dependent(s) - don&#039;t state here yourself or your spouse. Fill it from a measurement rather than a memory — Number of add. dependent(s) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Itemized deductions</strong> takes a plain number with no unit attached. Set here the total of itemized deductions other than retirement contribution relevant to the federal income tax. If you don&#039;t set a deduction or it is less than the standard deduction, the standard deduction will be considered. Fill it from a measurement rather than a memory — Itemized deductions is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Post-tax deductions</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Post-tax deductions is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Ret perc</strong> takes a plain number with no unit attached. The page reads it when it works out Annual retirement contributions and Adjusted Gross Income (AGI). Fill it from a measurement rather than a memory — Ret perc is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Annual retirement contributions</strong> is measured in $. The page reads it when it works out Adjusted Gross Income (AGI) and Ret perc. Fill it from a measurement rather than a memory — Annual retirement contributions is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 2 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>VarYear</strong> is a plain number. The page computes it from the form as a whole rather than from one line of the formula. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>VarPay</strong> is a plain number. The page computes it from the form as a whole rather than from one line of the formula. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on New York tax actually offers.</p><ul><li><strong>annual</strong> — opens in <em>annual</em>, and the chip also carries /week, /hour and /month. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind VarYear is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover annual. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Adjusted Gross Income (AGI), Pay frequency and Year of income measured, VarYear and VarPay wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/optimal-price">Optimal price Calculator</a>, <a href="/finance/options-spread">Options spread</a> and <a href="/finance/overtime">Overtime Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the New York tax calculator work out?', 'a' => <<<'TXT'
            VarYear and VarPay, from Ret perc and Adjusted Gross Income (AGI). The relationship is Annual retirement contributions = Ret perc × Adjusted Gross Income (AGI).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Adjusted Gross Income (AGI) (annual), Pay frequency, Year of income, What is your filling status?, Are you a resident in NYC?. Fill adjusted Gross Income (AGI), pay frequency and year of income and leave VarYear empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Annual retirement contributions, Adjusted Gross Income (AGI) and Ret perc can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            VarYear is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Adjusted Gross Income (AGI) blank and the page solves for it, reporting VarYear instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to VarYear at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/optimal-price', 'name' => 'Optimal price Calculator'],
            ['path' => '/finance/options-spread', 'name' => 'Options spread'],
            ['path' => '/finance/overtime', 'name' => 'Overtime Calculator'],
        ],
        'authors' => [],
    ],
];
