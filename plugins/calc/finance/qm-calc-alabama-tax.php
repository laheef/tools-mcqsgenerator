<?php

/**
 * Alabama tax
 * /finance/alabama-tax
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Alabama tax',
    'meta' => ['title' => 'Alabama tax Calculator — Formula, Units & Example', 'description' => 'Enter Adjusted Gross Income (AGI), pay frequency and year of income and Alabama tax returns annual retirement contributions. A worked example follows.', 'h1' => 'Alabama tax Calculator', 'updated' => '2026-07-13'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Income',
                            'label' => 'Adjusted Gross Income (AGI)',
                            'type' => 'number',
                            'prefix' => '$',
                            'unit' => '341',
                            'unit_default' => 'annual',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PayFreq',
                            'label' => 'Pay frequency',
                            'type' => 'select',
                            'options' => [
                                'Daily' => '260',
                                'Weekly' => '52',
                                'Bi-weekly' => '26',
                                'Semi-monthly' => '24',
                                'Monthly' => '12',
                            ],
                            'dataset' => 'pay_freq',
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
                            'name' => 'Year',
                            'label' => 'Year of income',
                            'type' => 'select',
                            'options' => [
                                '2022' => '2022',
                                '2023' => '2023',
                                '2024' => '2024',
                                '2025' => '2025',
                                '2026' => '2026',
                            ],
                            'dataset' => 'year',
                            'control' => 'DROPDOWN',
                            'default' => '2026',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Stat',
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
                            'name' => 'TaxJur',
                            'label' => 'Tax jurisdiction',
                            'type' => 'select',
                            'options' => ['Bessemer' => '0.01', 'Birmingham' => '0.01', 'Gadsden' => '0.02', 'Macon County' => '0.01'],
                            'dataset' => 'tax_jur',
                            'help' => 'The county which levies the local tax on your income.',
                            'default' => 'Bessemer',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarDep',
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
                            'name' => 'Deduc',
                            'label' => 'Itemized deductions',
                            'type' => 'number',
                            'suffix' => '$',
                            'help' => <<<'TXT'
                            Set here the total of itemized deductions other than retirement contribution relevant to the federal income tax. If you don't set a deduction or it is less than the standard deduction, the standard deduction will be considered.
                            TXT,
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PostTax',
                            'label' => 'Post-tax deductions',
                            'type' => 'number',
                            'suffix' => '$',
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
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'annual_tax > 0', 'text' => 'The estimated total annual tax is ${{annual_tax.formattedValue}}.'],
                                ['when' => 'fin_income_period > 0 and PayFreq == 260', 'text' => 'The estimated daily take-home pay is ${{fin_income_period.formattedValue}}.'],
                                ['when' => 'fin_income_period > 0 and PayFreq == 52', 'text' => 'The estimated weekly take-home pay is ${{fin_income_period.formattedValue}}.'],
                                ['when' => 'fin_income_period > 0 and PayFreq == 26', 'text' => 'The estimated bi-weekly take-home pay is ${{fin_income_period.formattedValue}}.'],
                                ['when' => 'fin_income_period > 0 and PayFreq == 24', 'text' => 'The estimated semi-monthly take-home pay is ${{fin_income_period.formattedValue}}.'],
                                ['when' => 'fin_income_period > 0 and PayFreq == 12', 'text' => 'The estimated monthly take-home pay is ${{fin_income_period.formattedValue}}.'],
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
                            'name' => 'RetPerc',
                            'label' => 'Retirement contributions',
                            'type' => 'number',
                            'help' => 'In percentage of gross income.',
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
                            'name' => 'StateID',
                            'label' => 'State id',
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
                            'name' => 'VarYear',
                            'label' => 'Var year',
                            'type' => 'result',
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
                            'name' => 'VarLoc',
                            'label' => 'Var loc',
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
                            'label' => 'Var pay',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
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
                            'min' => 2,
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
                            'rounding' => ['standard', '0'],
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
                            'rounding' => ['standard', '2'],
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
            'title' => 'Ret = RetPerc * Income',
            'results' => ['RetPerc' => 'Ret/Income', 'Income' => 'Ret/RetPerc', 'Ret' => 'Income*RetPerc'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";"use strict";omni.define("getFinalDeduc",function(VarYear,VarStat,StateID,Deduc,Ret,Income){if(VarYear===2022){if(VarStat===1&&Deduc<12950){Deduc=12950}if(VarStat===2&&Deduc<25900){Deduc=25900}if(VarStat===3&&Deduc<12950){Deduc=12950}if(VarStat===4&&Deduc<19400){Deduc=19400}}if(VarYear===2023){if(VarStat===1&&Deduc<13850){Deduc=13850}if(VarStat===2&&Deduc<27700){Deduc=27700}if(VarStat===3&&Deduc<13850){Deduc=13850}if(VarStat===4&&Deduc<20800){Deduc=20800}}if(VarYear===2024){if(VarStat===1&&Deduc<14600){Deduc=14600}if(VarStat===2&&Deduc<29200){Deduc=29200}if(VarStat===3&&Deduc<14600){Deduc=14600}if(VarStat===4&&Deduc<21900){Deduc=21900}}if(VarYear===2025){if(VarStat===1&&Deduc<15750){Deduc=15750}if(VarStat===2&&Deduc<31500){Deduc=31500}if(VarStat===3&&Deduc<15750){Deduc=15750}if(VarStat===4&&Deduc<23625){Deduc=23625}}if(VarYear===2026){if(VarStat===1&&Deduc<16100){Deduc=16100}if(VarStat===2&&Deduc<32200){Deduc=32200}if(VarStat===3&&Deduc<16100){Deduc=16100}if(VarStat===4&&Deduc<24150){Deduc=24150}}if(Income<Deduc+Ret){Deduc=Income}var StandDed=getStandDed(VarStat,StateID,VarYear);if(StandDed>=Deduc){return StandDed+Deduc}else{return Deduc}});omni.define("getIncomeTax",function(VarYear,Income,VarStat,StateID,VarDep){var TaxFed;if(VarYear===2022){TaxFed=getTaxFed22(Income,VarStat)}if(VarYear===2023){TaxFed=getTaxFed23(Income,VarStat)}if(VarYear===2024){TaxFed=getTaxFed24(Income,VarStat)}if(VarYear===2025){TaxFed=getTaxFed25(Income,VarStat)}if(VarYear===2026){TaxFed=getTaxFed26(Income,VarStat)}if(TaxFed<0){TaxFed=0}var StandDed=0;var StandDedCredit=0;if(StateID!==44){StandDed=getStandDed(VarStat,StateID,VarYear)}else{StandDedCredit=getStandDed(VarStat,StateID,VarYear)}var DepEx=0;var DepExCredit=0;if(StateID!==3&&StateID!==4&&StateID!==5&&StateID!==8&&StateID!==15&&StateID!==19&&StateID!==27&&StateID!==37&&StateID!==44){DepEx=getDepEx(StateID,VarYear)*VarDep}else{DepExCredit=getDepEx(StateID,VarYear)*VarDep}var PerEx=0;var PerExCredit=0;if(StateID!==4&&StateID!==5&&StateID!==8&&StateID!==15&&StateID!==27&&StateID!==37){PerEx=getPerEx(VarYear,VarStat,StateID)}else{PerExCredit=getPerEx(VarYear,VarStat,StateID)}var Local=0;if(StateID===5){var SDI=0;if(VarYear===2021){SDI=Income*0.012;if(Income>128298){SDI=128298*0.012}}else if(VarYear===2022){SDI=Income*0.011;if(Income>145600){SDI=145600*0.011}}else if(VarYear===2023){SDI=Income*0.012;if(Income>153164){SDI=153164*0.009}}else if(VarYear===2024){SDI=Income*0.011}var ETT=Income*0.001;if(Income>7000){ETT=7000*0.001}Local=SDI+ETT}var IncomeState=Income-(StandDed+DepEx+PerEx);var StateTax=getStateTax(IncomeState,VarStat,StateID,VarYear);var StateTaxAftCred=StateTax-StandDedCredit-DepExCredit-PerExCredit;var TotIncTax=TaxFed+StateTaxAftCred+Local;return TotIncTax});omni.define("getDepEx",function(VarYear,Income,VarStat,StateID,VarDep){var DepEx=0;var DepExCredit=0;if(StateID!==3&&StateID!==4&&StateID!==5&&StateID!==8&&StateID!==15&&StateID!==19&&StateID!==27&&StateID!==37&&StateID!==44){DepEx=getDepEx(StateID,VarYear)*VarDep}else{DepExCredit=getDepEx(StateID,VarYear)*VarDep}return DepEx});omni.define("getPerEx",function(VarYear,Income,VarStat,StateID){var PerEx=0;if(VarYear===2024){if(StateID===1){if(VarStat===1||VarStat===3){PerEx=1500}if(VarStat===2||VarStat===4){PerEx=3000}}}else if(VarYear===2022){if(StateID===1){if(VarStat===1||VarStat===3){PerEx=1500}if(VarStat===2||VarStat===4){PerEx=3000}}}else if(VarYear===2023){if(StateID===1){if(VarStat===1||VarStat===3){PerEx=1500}if(VarStat===2||VarStat===4){PerEx=3000}}}return PerEx});omni.define("getStandDeduc",function(VarYear,Income,VarStat,StateID,VarDep){var StandDed=0;var StandDedCredit=0;if(StateID!==44){StandDed=getStandDed(VarStat,StateID,VarYear)}else{StandDedCredit=getStandDed(VarStat,StateID,VarYear)}return StandDed});omni.define("getStateEx",function(VarYear,Income,VarStat,StateID,VarDep){var DepEx=0;var DepExCredit=0;if(StateID!==3&&StateID!==4&&StateID!==5&&StateID!==8&&StateID!==15&&StateID!==19&&StateID!==27&&StateID!==37&&StateID!==44){DepEx=getDepEx(StateID,VarYear)*VarDep}else{DepExCredit=getDepEx(StateID,VarYear)*VarDep}var PerEx=0;var PerExCredit=0;if(StateID!==4&&StateID!==5&&StateID!==8&&StateID!==15&&StateID!==27&&StateID!==37){PerEx=getPerEx(VarYear,VarStat,StateID)}else{PerExCredit=getPerEx(VarYear,VarStat,StateID)}var StateEx=PerEx+DepEx;return StateEx});omni.define("getTaxFed",function(VarYear,Income,VarStat){var TaxFed;if(VarYear===2022){TaxFed=getTaxFed22(Income,VarStat)}if(VarYear===2023){TaxFed=getTaxFed23(Income,VarStat)}if(VarYear===2024){TaxFed=getTaxFed24(Income,VarStat)}if(VarYear===2025){TaxFed=getTaxFed25(Income,VarStat)}if(VarYear===2026){TaxFed=getTaxFed26(Income,VarStat)}if(TaxFed<0){TaxFed=0}return TaxFed});omni.define("getStateTaxAftCred",function(VarYear,Income,VarStat,StateID,VarDep){var TaxFed;if(VarYear===2022){TaxFed=getTaxFed22(Income,VarStat)}if(VarYear===2023){TaxFed=getTaxFed23(Income,VarStat)}if(VarYear===2024){TaxFed=getTaxFed24(Income,VarStat)}if(TaxFed<0){TaxFed=0}var StandDed=0;var StandDedCredit=0;if(StateID!==44){StandDed=getStandDed(VarStat,StateID,VarYear)}else{StandDedCredit=getStandDed(VarStat,StateID,VarYear)}var DepEx=0;var DepExCredit=0;if(StateID!==3&&StateID!==4&&StateID!==5&&StateID!==8&&StateID!==15&&StateID!==19&&StateID!==27&&StateID!==37&&StateID!==44){DepEx=getDepEx(StateID,VarYear)*VarDep}else{DepExCredit=getDepEx(StateID,VarYear)*VarDep}var PerEx=0;var PerExCredit=0;if(StateID!==4&&StateID!==5&&StateID!==8&&StateID!==15&&StateID!==27&&StateID!==37){PerEx=getPerEx(VarYear,VarStat,StateID)}else{PerExCredit=getPerEx(VarYear,VarStat,StateID)}if(VarStat===1||VarStat===3||VarStat===4){if(Income>23500){StandDed=StandDed-25*mathjs.floor((Income-23500)/500)}if(StandDed<2000){StandDed=2000}}if(VarStat===2){if(Income>23500){StandDed=StandDed-175*mathjs.floor((Income-23500)/500)}if(StandDed<2000){StandDed=4000}}if(Income>20000&&Income<=100000){DepEx=500*VarDep}if(Income>100000){DepEx=300*VarDep}var IncomeState=Income-(StandDed+DepEx+PerEx);var StateTax=getStateTax(IncomeState,VarStat,StateID,VarYear);var StateTaxAftCred=StateTax-StandDedCredit-DepExCredit-PerExCredit;if(StateTaxAftCred<0){StateTaxAftCred=0}return StateTaxAftCred});omni.define("getLocal",function(Income,VarLoc){return Income*VarLoc});omni.define("getCredit",function(VarYear,Income,VarStat,StateID,VarDep){var TaxFed;if(VarYear===2022){TaxFed=getTaxFed22(Income,VarStat)}if(VarYear===2023){TaxFed=getTaxFed23(Income,VarStat)}if(VarYear===2024){TaxFed=getTaxFed24(Income,VarStat)}if(VarYear===2025){TaxFed=getTaxFed25(Income,VarStat)}if(VarYear===2026){TaxFed=getTaxFed26(Income,VarStat)}if(TaxFed<0){TaxFed=0}var StandDed=0;var StandDedCredit=0;if(StateID!==44){StandDedCredit=getStandDed(VarStat,StateID,VarYear)}else{StandDedCredit=getStandDed(VarStat,StateID,VarYear)}var DepEx=0;var DepExCredit=0;if(StateID!==3&&StateID!==4&&StateID!==5&&StateID!==8&&StateID!==15&&StateID!==19&&StateID!==27&&StateID!==37&&StateID!==44){DepExCredit=getDepEx(StateID,VarYear)*VarDep}else{DepExCredit=getDepEx(StateID,VarYear)*VarDep}var PerEx=0;var PerExCredit=0;if(StateID!==4&&StateID!==5&&StateID!==8&&StateID!==15&&StateID!==27&&StateID!==37){PerExCredit=getPerEx(VarYear,VarStat,StateID)}else{PerExCredit=getPerEx(VarYear,VarStat,StateID)}var Credit=StandDedCredit+DepExCredit+PerExCredit;return Credit});omni.define("getFica",function(VarYear,Income,VarStat){var SocSec=Income*0.062;if(VarYear===2022&&Income>147000){SocSec=147000*0.062}else if(VarYear===2023&&Income>160200){SocSec=160200*0.062}else if(VarYear===2024&&Income>168600){SocSec=168600*0.062}else if(VarYear===2025&&Income>176100){SocSec=176100*0.062}else if(VarYear===2026&&Income>184500){SocSec=184500*0.062}var MedCare=0;var MedLimit=200000;if(VarStat===2){MedLimit=250000}else if(VarStat===3){MedLimit=125000}if(Income<=MedLimit){MedCare=Income*0.0145}else{MedCare=MedLimit*0.0145+(Income-MedLimit)*0.0235}var Fica=SocSec+MedCare;return Fica});omni.define("getSocSec",function(VarYear,Income){var SocSec=Income*0.062;if(VarYear===2022&&Income>147000){SocSec=147000*0.062}else if(VarYear===2023&&Income>160200){SocSec=160200*0.062}else if(VarYear===2024&&Income>168600){SocSec=168600*0.062}else if(VarYear===2025&&Income>176100){SocSec=176100*0.062}else if(VarYear===2026&&Income>184500){SocSec=184500*0.062}return SocSec});omni.define("getMedCare",function(VarYear,Income,VarStat){var MedCare=0;var MedLimit=200000;if(VarStat===2){MedLimit=250000}else if(VarStat===3){MedLimit=125000}if(Income<=MedLimit){MedCare=Income*0.0145}else{MedCare=MedLimit*0.0145+(Income-MedLimit)*0.0235}return MedCare});function getTaxBracketFed(Bracket,VarStat,VarYear){var Brack1,Brack2,Brack3,Brack4,Brack5,Brack6;var UnmarBrack1,UnmarBrack2,UnmarBrack3,UnmarBrack4,UnmarBrack5,UnmarBrack6;var MarJointBrack1,MarJointBrack2,MarJointBrack3,MarJointBrack4,MarJointBrack5,MarJointBrack6;var MarSepBrack1,MarSepBrack2,MarSepBrack3,MarSepBrack4,MarSepBrack5,MarSepBrack6;var HeadBrack1,HeadBrack2,HeadBrack3,HeadBrack4,HeadBrack5,HeadBrack6;if(VarYear===2022){UnmarBrack1=10275;UnmarBrack2=41775;UnmarBrack3=89075;UnmarBrack4=170050;UnmarBrack5=215950;UnmarBrack6=539900;MarJointBrack1=20550;MarJointBrack2=83550;MarJointBrack3=178150;MarJointBrack4=340100;MarJointBrack5=431900;MarJointBrack6=647850;MarSepBrack1=10275;MarSepBrack2=41775;MarSepBrack3=89075;MarSepBrack4=170050;MarSepBrack5=215950;MarSepBrack6=323925;HeadBrack1=14650;HeadBrack2=55900;HeadBrack3=89050;HeadBrack4=170050;HeadBrack5=215950;HeadBrack6=539900}if(VarYear===2023){UnmarBrack1=11000;UnmarBrack2=44725;UnmarBrack3=95375;UnmarBrack4=182100;UnmarBrack5=231250;UnmarBrack6=578125;MarJointBrack1=22000;MarJointBrack2=89450;MarJointBrack3=190750;MarJointBrack4=364200;MarJointBrack5=462500;MarJointBrack6=693750;MarSepBrack1=11000;MarSepBrack2=44725;MarSepBrack3=95375;MarSepBrack4=182100;MarSepBrack5=231250;MarSepBrack6=346875;HeadBrack1=15700;HeadBrack2=59850;HeadBrack3=95350;HeadBrack4=182100;HeadBrack5=231250;HeadBrack6=578100}if(VarYear===2024){UnmarBrack1=11600;UnmarBrack2=47150;UnmarBrack3=100525;UnmarBrack4=191950;UnmarBrack5=243725;UnmarBrack6=609350;MarJointBrack1=23200;MarJointBrack2=94300;MarJointBrack3=201050;MarJointBrack4=383900;MarJointBrack5=487450;MarJointBrack6=731200;MarSepBrack1=11600;MarSepBrack2=47150;MarSepBrack3=100525;MarSepBrack4=191950;MarSepBrack5=243725;MarSepBrack6=365600;HeadBrack1=16550;HeadBrack2=63100;HeadBrack3=100500;HeadBrack4=191950;HeadBrack5=243700;HeadBrack6=609350}if(VarStat===1){Brack1=UnmarBrack1;Brack2=UnmarBrack2;Brack3=UnmarBrack3;Brack4=UnmarBrack4;Brack5=UnmarBrack5;Brack6=UnmarBrack6}if(VarStat===2){Brack1=MarJointBrack1;Brack2=MarJointBrack2;Brack3=MarJointBrack3;Brack4=MarJointBrack4;Brack5=MarJointBrack5;Brack6=MarJointBrack6}if(VarStat===3){Brack1=MarSepBrack1;Brack2=MarSepBrack2;Brack3=MarSepBrack3;Brack4=MarSepBrack4;Brack5=MarSepBrack5;Brack6=MarSepBrack6}if(VarStat===4){Brack1=HeadBrack1;Brack2=HeadBrack2;Brack3=HeadBrack3;Brack4=HeadBrack4;Brack5=HeadBrack5;Brack6=HeadBrack6}var Brack;if(Bracket===1){Brack=Brack1}else if(Bracket===2){Brack=Brack2}else if(Bracket===3){Brack=Brack3}else if(Bracket===4){Brack=Brack4}else if(Bracket===5){Brack=Brack5}else if(Bracket===6){Brack=Brack6}return Brack}function getTaxFed23(Inc,VarStat){var Brack1;var Brack2;var Brack3;var Brack4;var Brack5;var Brack6;var TaxRate0=0.1;var TaxRate1=0.12;var TaxRate2=0.22;var TaxRate3=0.24;var TaxRate4=0.32;var TaxRate5=0.35;var TaxRate6=0.37;var UnmarBrack1=11000;var UnmarBrack2=44725;var UnmarBrack3=95375;var UnmarBrack4=182100;var UnmarBrack5=231250;var UnmarBrack6=578125;var MarJointBrack1=22000;var MarJointBrack2=89450;var MarJointBrack3=190750;var MarJointBrack4=364200;var MarJointBrack5=462500;var MarJointBrack6=693750;var MarSepBrack1=11000;var MarSepBrack2=44725;var MarSepBrack3=95375;var MarSepBrack4=182100;var MarSepBrack5=231250;var MarSepBrack6=346875;var HeadBrack1=15700;var HeadBrack2=59850;var HeadBrack3=95350;var HeadBrack4=182100;var HeadBrack5=231250;var HeadBrack6=578100;var TaxFed;if(VarStat===1){Brack1=UnmarBrack1;Brack2=UnmarBrack2;Brack3=UnmarBrack3;Brack4=UnmarBrack4;Brack5=UnmarBrack5;Brack6=UnmarBrack6}if(VarStat===2){Brack1=MarJointBrack1;Brack2=MarJointBrack2;Brack3=MarJointBrack3;Brack4=MarJointBrack4;Brack5=MarJointBrack5;Brack6=MarJointBrack6}if(VarStat===3){Brack1=MarSepBrack1;Brack2=MarSepBrack2;Brack3=MarSepBrack3;Brack4=MarSepBrack4;Brack5=MarSepBrack5;Brack6=MarSepBrack6}if(VarStat===4){Brack1=HeadBrack1;Brack2=HeadBrack2;Brack3=HeadBrack3;Brack4=HeadBrack4;Brack5=HeadBrack5;Brack6=HeadBrack6}var Tax1=Brack1*TaxRate0;var Tax2=(Brack2-Brack1)*TaxRate1+Tax1;var Tax3=(Brack3-Brack2)*TaxRate2+Tax2;var Tax4=(Brack4-Brack3)*TaxRate3+Tax3;var Tax5=(Brack5-Brack4)*TaxRate4+Tax4;var Tax6=(Brack6-Brack5)*TaxRate5+Tax5;if(Inc<=Brack1){TaxFed=Inc*TaxRate0}else if(Inc>Brack1&&Inc<=Brack2){TaxFed=Tax1+(Inc-Brack1)*TaxRate1}else if(Inc>Brack2&&Inc<=Brack3){TaxFed=Tax2+(Inc-Brack2)*TaxRate2}else if(Inc>Brack3&&Inc<=Brack4){TaxFed=Tax3+(Inc-Brack3)*TaxRate3}else if(Inc>Brack4&&Inc<=Brack5){TaxFed=Tax4+(Inc-Brack4)*TaxRate4}else if(Inc>Brack5&&Inc<=Brack6){TaxFed=Tax5+(Inc-Brack5)*TaxRate5}else if(Inc>Brack6){TaxFed=Tax6+(Inc-Brack6)*TaxRate6}return TaxFed}function getTaxFed22(Inc,VarStat){var Brack1;var Brack2;var Brack3;var Brack4;var Brack5;var Brack6;var TaxRate0=0.1;var TaxRate1=0.12;var TaxRate2=0.22;var TaxRate3=0.24;var TaxRate4=0.32;var TaxRate5=0.35;var TaxRate6=0.37;var UnmarBrack1=10275;var UnmarBrack2=41775;var UnmarBrack3=89075;var UnmarBrack4=170050;var UnmarBrack5=215950;var UnmarBrack6=539900;var MarJointBrack1=20550;var MarJointBrack2=83550;var MarJointBrack3=178150;var MarJointBrack4=340100;var MarJointBrack5=431900;var MarJointBrack6=647850;var MarSepBrack1=10275;var MarSepBrack2=41775;var MarSepBrack3=89075;var MarSepBrack4=170050;var MarSepBrack5=215950;var MarSepBrack6=323925;var HeadBrack1=14650;var HeadBrack2=55900;var HeadBrack3=89050;var HeadBrack4=170050;var HeadBrack5=215950;var HeadBrack6=539900;var TaxFed;if(VarStat===1){Brack1=UnmarBrack1;Brack2=UnmarBrack2;Brack3=UnmarBrack3;Brack4=UnmarBrack4;Brack5=UnmarBrack5;Brack6=UnmarBrack6}if(VarStat===2){Brack1=MarJointBrack1;Brack2=MarJointBrack2;Brack3=MarJointBrack3;Brack4=MarJointBrack4;Brack5=MarJointBrack5;Brack6=MarJointBrack6}if(VarStat===3){Brack1=MarSepBrack1;Brack2=MarSepBrack2;Brack3=MarSepBrack3;Brack4=MarSepBrack4;Brack5=MarSepBrack5;Brack6=MarSepBrack6}if(VarStat===4){Brack1=HeadBrack1;Brack2=HeadBrack2;Brack3=HeadBrack3;Brack4=HeadBrack4;Brack5=HeadBrack5;Brack6=HeadBrack6}var Tax1=Brack1*TaxRate0;var Tax2=(Brack2-Brack1)*TaxRate1+Tax1;var Tax3=(Brack3-Brack2)*TaxRate2+Tax2;var Tax4=(Brack4-Brack3)*TaxRate3+Tax3;var Tax5=(Brack5-Brack4)*TaxRate4+Tax4;var Tax6=(Brack6-Brack5)*TaxRate5+Tax5;if(Inc<=Brack1){TaxFed=Inc*TaxRate0}else if(Inc>Brack1&&Inc<=Brack2){TaxFed=Tax1+(Inc-Brack1)*TaxRate1}else if(Inc>Brack2&&Inc<=Brack3){TaxFed=Tax2+(Inc-Brack2)*TaxRate2}else if(Inc>Brack3&&Inc<=Brack4){TaxFed=Tax3+(Inc-Brack3)*TaxRate3}else if(Inc>Brack4&&Inc<=Brack5){TaxFed=Tax4+(Inc-Brack4)*TaxRate4}else if(Inc>Brack5&&Inc<=Brack6){TaxFed=Tax5+(Inc-Brack5)*TaxRate5}else if(Inc>Brack6){TaxFed=Tax6+(Inc-Brack6)*TaxRate6}return TaxFed}function getTaxFed24(Inc,VarStat){var Brack1;var Brack2;var Brack3;var Brack4;var Brack5;var Brack6;var TaxRate0=0.1;var TaxRate1=0.12;var TaxRate2=0.22;var TaxRate3=0.24;var TaxRate4=0.32;var TaxRate5=0.35;var TaxRate6=0.37;var UnmarBrack1=11600;var UnmarBrack2=47150;var UnmarBrack3=100525;var UnmarBrack4=191950;var UnmarBrack5=243725;var UnmarBrack6=609350;var MarJointBrack1=23200;var MarJointBrack2=94300;var MarJointBrack3=201050;var MarJointBrack4=383900;var MarJointBrack5=487450;var MarJointBrack6=731200;var MarSepBrack1=11600;var MarSepBrack2=47150;var MarSepBrack3=100525;var MarSepBrack4=191950;var MarSepBrack5=243725;var MarSepBrack6=365600;var HeadBrack1=16550;var HeadBrack2=63100;var HeadBrack3=100500;var HeadBrack4=191950;var HeadBrack5=243700;var HeadBrack6=609350;var TaxFed;if(VarStat===1){Brack1=UnmarBrack1;Brack2=UnmarBrack2;Brack3=UnmarBrack3;Brack4=UnmarBrack4;Brack5=UnmarBrack5;Brack6=UnmarBrack6}if(VarStat===2){Brack1=MarJointBrack1;Brack2=MarJointBrack2;Brack3=MarJointBrack3;Brack4=MarJointBrack4;Brack5=MarJointBrack5;Brack6=MarJointBrack6}if(VarStat===3){Brack1=MarSepBrack1;Brack2=MarSepBrack2;Brack3=MarSepBrack3;Brack4=MarSepBrack4;Brack5=MarSepBrack5;Brack6=MarSepBrack6}if(VarStat===4){Brack1=HeadBrack1;Brack2=HeadBrack2;Brack3=HeadBrack3;Brack4=HeadBrack4;Brack5=HeadBrack5;Brack6=HeadBrack6}var Tax1=Brack1*TaxRate0;var Tax2=(Brack2-Brack1)*TaxRate1+Tax1;var Tax3=(Brack3-Brack2)*TaxRate2+Tax2;var Tax4=(Brack4-Brack3)*TaxRate3+Tax3;var Tax5=(Brack5-Brack4)*TaxRate4+Tax4;var Tax6=(Brack6-Brack5)*TaxRate5+Tax5;if(Inc<=Brack1){TaxFed=Inc*TaxRate0}else if(Inc>Brack1&&Inc<=Brack2){TaxFed=Tax1+(Inc-Brack1)*TaxRate1}else if(Inc>Brack2&&Inc<=Brack3){TaxFed=Tax2+(Inc-Brack2)*TaxRate2}else if(Inc>Brack3&&Inc<=Brack4){TaxFed=Tax3+(Inc-Brack3)*TaxRate3}else if(Inc>Brack4&&Inc<=Brack5){TaxFed=Tax4+(Inc-Brack4)*TaxRate4}else if(Inc>Brack5&&Inc<=Brack6){TaxFed=Tax5+(Inc-Brack5)*TaxRate5}else if(Inc>Brack6){TaxFed=Tax6+(Inc-Brack6)*TaxRate6}return TaxFed}function getTaxFed25(Inc,VarStat){var Brack1;var Brack2;var Brack3;var Brack4;var Brack5;var Brack6;var TaxRate0=0.1;var TaxRate1=0.12;var TaxRate2=0.22;var TaxRate3=0.24;var TaxRate4=0.32;var TaxRate5=0.35;var TaxRate6=0.37;var UnmarBrack1=11925;var UnmarBrack2=48475;var UnmarBrack3=103350;var UnmarBrack4=197300;var UnmarBrack5=250525;var UnmarBrack6=626350;var MarJointBrack1=23850;var MarJointBrack2=96950;var MarJointBrack3=206700;var MarJointBrack4=394600;var MarJointBrack5=501050;var MarJointBrack6=751600;var MarSepBrack1=11925;var MarSepBrack2=48475;var MarSepBrack3=103350;var MarSepBrack4=197300;var MarSepBrack5=250525;var MarSepBrack6=375800;var HeadBrack1=17000;var HeadBrack2=64850;var HeadBrack3=103350;var HeadBrack4=197300;var HeadBrack5=250500;var HeadBrack6=626350;var TaxFed;if(VarStat===1){Brack1=UnmarBrack1;Brack2=UnmarBrack2;Brack3=UnmarBrack3;Brack4=UnmarBrack4;Brack5=UnmarBrack5;Brack6=UnmarBrack6}if(VarStat===2){Brack1=MarJointBrack1;Brack2=MarJointBrack2;Brack3=MarJointBrack3;Brack4=MarJointBrack4;Brack5=MarJointBrack5;Brack6=MarJointBrack6}if(VarStat===3){Brack1=MarSepBrack1;Brack2=MarSepBrack2;Brack3=MarSepBrack3;Brack4=MarSepBrack4;Brack5=MarSepBrack5;Brack6=MarSepBrack6}if(VarStat===4){Brack1=HeadBrack1;Brack2=HeadBrack2;Brack3=HeadBrack3;Brack4=HeadBrack4;Brack5=HeadBrack5;Brack6=HeadBrack6}var Tax1=Brack1*TaxRate0;var Tax2=(Brack2-Brack1)*TaxRate1+Tax1;var Tax3=(Brack3-Brack2)*TaxRate2+Tax2;var Tax4=(Brack4-Brack3)*TaxRate3+Tax3;var Tax5=(Brack5-Brack4)*TaxRate4+Tax4;var Tax6=(Brack6-Brack5)*TaxRate5+Tax5;if(Inc<=Brack1){TaxFed=Inc*TaxRate0}else if(Inc>Brack1&&Inc<=Brack2){TaxFed=Tax1+(Inc-Brack1)*TaxRate1}else if(Inc>Brack2&&Inc<=Brack3){TaxFed=Tax2+(Inc-Brack2)*TaxRate2}else if(Inc>Brack3&&Inc<=Brack4){TaxFed=Tax3+(Inc-Brack3)*TaxRate3}else if(Inc>Brack4&&Inc<=Brack5){TaxFed=Tax4+(Inc-Brack4)*TaxRate4}else if(Inc>Brack5&&Inc<=Brack6){TaxFed=Tax5+(Inc-Brack5)*TaxRate5}else if(Inc>Brack6){TaxFed=Tax6+(Inc-Brack6)*TaxRate6}return TaxFed}function getTaxFed26(Inc,VarStat){var Brack1;var Brack2;var Brack3;var Brack4;var Brack5;var Brack6;var TaxRate0=0.1;var TaxRate1=0.12;var TaxRate2=0.22;var TaxRate3=0.24;var TaxRate4=0.32;var TaxRate5=0.35;var TaxRate6=0.37;var UnmarBrack1=12400;var UnmarBrack2=50400;var UnmarBrack3=105700;var UnmarBrack4=201775;var UnmarBrack5=256225;var UnmarBrack6=640600;var MarJointBrack1=24800;var MarJointBrack2=100800;var MarJointBrack3=211400;var MarJointBrack4=403550;var MarJointBrack5=512450;var MarJointBrack6=768700;var MarSepBrack1=12400;var MarSepBrack2=50400;var MarSepBrack3=105700;var MarSepBrack4=201775;var MarSepBrack5=256225;var MarSepBrack6=384350;var HeadBrack1=17700;var HeadBrack2=67450;var HeadBrack3=105700;var HeadBrack4=201775;var HeadBrack5=256200;var HeadBrack6=640600;var TaxFed;if(VarStat===1){Brack1=UnmarBrack1;Brack2=UnmarBrack2;Brack3=UnmarBrack3;Brack4=UnmarBrack4;Brack5=UnmarBrack5;Brack6=UnmarBrack6}if(VarStat===2){Brack1=MarJointBrack1;Brack2=MarJointBrack2;Brack3=MarJointBrack3;Brack4=MarJointBrack4;Brack5=MarJointBrack5;Brack6=MarJointBrack6}if(VarStat===3){Brack1=MarSepBrack1;Brack2=MarSepBrack2;Brack3=MarSepBrack3;Brack4=MarSepBrack4;Brack5=MarSepBrack5;Brack6=MarSepBrack6}if(VarStat===4){Brack1=HeadBrack1;Brack2=HeadBrack2;Brack3=HeadBrack3;Brack4=HeadBrack4;Brack5=HeadBrack5;Brack6=HeadBrack6}var Tax1=Brack1*TaxRate0;var Tax2=(Brack2-Brack1)*TaxRate1+Tax1;var Tax3=(Brack3-Brack2)*TaxRate2+Tax2;var Tax4=(Brack4-Brack3)*TaxRate3+Tax3;var Tax5=(Brack5-Brack4)*TaxRate4+Tax4;var Tax6=(Brack6-Brack5)*TaxRate5+Tax5;if(Inc<=Brack1){TaxFed=Inc*TaxRate0}else if(Inc>Brack1&&Inc<=Brack2){TaxFed=Tax1+(Inc-Brack1)*TaxRate1}else if(Inc>Brack2&&Inc<=Brack3){TaxFed=Tax2+(Inc-Brack2)*TaxRate2}else if(Inc>Brack3&&Inc<=Brack4){TaxFed=Tax3+(Inc-Brack3)*TaxRate3}else if(Inc>Brack4&&Inc<=Brack5){TaxFed=Tax4+(Inc-Brack4)*TaxRate4}else if(Inc>Brack5&&Inc<=Brack6){TaxFed=Tax5+(Inc-Brack5)*TaxRate5}else if(Inc>Brack6){TaxFed=Tax6+(Inc-Brack6)*TaxRate6}return TaxFed}function getTaxRate(StateID,Bracket,VarYear,VarStat){var TaxRate=0;if(VarYear===2024){if(StateID===1){if(Bracket===0){TaxRate=0.02}else if(Bracket===1){TaxRate=0.04}else if(Bracket===2){TaxRate=0.05}}}else if(VarYear===2022){if(StateID===1){if(Bracket===0){TaxRate=0.02}else if(Bracket===1){TaxRate=0.04}else if(Bracket===2){TaxRate=0.05}}}else if(VarYear===2025){if(StateID===1){if(Bracket===0){TaxRate=0.02}else if(Bracket===1){TaxRate=0.04}else if(Bracket===2){TaxRate=0.05}}}else if(VarYear===2026){if(StateID===1){if(Bracket===0){TaxRate=0.02}else if(Bracket===1){TaxRate=0.04}else if(Bracket===2){TaxRate=0.05}}}if(VarYear===2023){if(StateID===1){if(Bracket===0){TaxRate=0.02}else if(Bracket===1){TaxRate=0.04}else if(Bracket===2){TaxRate=0.05}}}return TaxRate}function getTaxBracket(StateID,Status,Bracket,VarYear){var Brack=0;if(VarYear===2024){if(StateID===1){if(Bracket===1){if(Status===1){Brack=500}if(Status===2){Brack=1000}}else if(Bracket===2){if(Status===1){Brack=3000}if(Status===2){Brack=6000}}}}else if(VarYear===2022){if(StateID===1){if(Bracket===1){if(Status===1){Brack=500}if(Status===2){Brack=1000}}else if(Bracket===2){if(Status===1){Brack=3000}if(Status===2){Brack=6000}}}}else if(VarYear===2023){if(StateID===1){if(Bracket===1){if(Status===1){Brack=500}if(Status===2){Brack=1000}}else if(Bracket===2){if(Status===1){Brack=3000}if(Status===2){Brack=6000}}}}else if(VarYear===2025){if(StateID===1){if(Bracket===1){if(Status===1){Brack=500}if(Status===2){Brack=1000}}else if(Bracket===2){if(Status===1){Brack=3000}if(Status===2){Brack=6000}}}}else if(VarYear===2026){if(StateID===1){if(Bracket===1){if(Status===1){Brack=500}if(Status===2){Brack=1000}}else if(Bracket===2){if(Status===1){Brack=3000}if(Status===2){Brack=6000}}}}return Brack}function getStateTax(Inc,VarStat,StateID,VarYear){var Brack1=getTaxBracket(StateID,VarStat,1,VarYear);var Brack2=getTaxBracket(StateID,VarStat,2,VarYear);var Brack3=getTaxBracket(StateID,VarStat,3,VarYear);var Brack4=getTaxBracket(StateID,VarStat,4,VarYear);var Brack5=getTaxBracket(StateID,VarStat,5,VarYear);var Brack6=getTaxBracket(StateID,VarStat,6,VarYear);var Brack7=getTaxBracket(StateID,VarStat,7,VarYear);var Brack8=getTaxBracket(StateID,VarStat,8,VarYear);var Brack9=getTaxBracket(StateID,VarStat,9,VarYear);var Brack10=getTaxBracket(StateID,VarStat,10,VarYear);var Brack11=getTaxBracket(StateID,VarStat,11,VarYear);var Brack12=getTaxBracket(StateID,VarStat,12,VarYear);var TaxRate0=getTaxRate(StateID,0,VarYear);var TaxRate1=getTaxRate(StateID,1,VarYear);var TaxRate2=getTaxRate(StateID,2,VarYear);var TaxRate3=getTaxRate(StateID,3,VarYear);var TaxRate4=getTaxRate(StateID,4,VarYear);var TaxRate5=getTaxRate(StateID,5,VarYear);var TaxRate6=getTaxRate(StateID,6,VarYear);var TaxRate7=getTaxRate(StateID,7,VarYear);var TaxRate8=getTaxRate(StateID,8,VarYear);var TaxRate9=getTaxRate(StateID,9,VarYear);var TaxRate10=getTaxRate(StateID,10,VarYear);var TaxRate11=getTaxRate(StateID,11,VarYear);var TaxRate12=getTaxRate(StateID,12,VarYear);var StateTax=0;var Tax1=Brack1*TaxRate0;var Tax2=(Brack2-Brack1)*TaxRate1+Tax1;var Tax3=(Brack3-Brack2)*TaxRate2+Tax2;var Tax4=(Brack4-Brack3)*TaxRate3+Tax3;var Tax5=(Brack5-Brack4)*TaxRate4+Tax4;var Tax6=(Brack6-Brack5)*TaxRate5+Tax5;var Tax7=(Brack7-Brack6)*TaxRate6+Tax6;var Tax8=(Brack8-Brack7)*TaxRate7+Tax7;var Tax9=(Brack9-Brack8)*TaxRate8+Tax8;var Tax10=(Brack10-Brack9)*TaxRate9+Tax9;var Tax11=(Brack11-Brack10)*TaxRate10+Tax10;var Tax12=(Brack12-Brack11)*TaxRate11+Tax11;if(Inc<=Brack1||Brack1===0){StateTax=Inc*TaxRate0}else if(Inc>Brack1&&(Inc<=Brack2||Brack2===0)){StateTax=Tax1+(Inc-Brack1)*TaxRate1}else if(Inc>Brack2&&(Inc<=Brack3||Brack3===0)){StateTax=Tax2+(Inc-Brack2)*TaxRate2}else if(Inc>Brack3&&(Inc<=Brack4||Brack4===0)){StateTax=Tax3+(Inc-Brack3)*TaxRate3}else if(Inc>Brack4&&(Inc<=Brack5||Brack5===0)){StateTax=Tax4+(Inc-Brack4)*TaxRate4}else if(Inc>Brack5&&(Inc<=Brack6||Brack6===0)){StateTax=Tax5+(Inc-Brack5)*TaxRate5}else if(Inc>Brack6&&(Inc<=Brack7||Brack7===0)){StateTax=Tax6+(Inc-Brack6)*TaxRate6}else if(Inc>Brack7&&(Inc<=Brack8||Brack8===0)){StateTax=Tax7+(Inc-Brack7)*TaxRate7}else if(Inc>Brack8&&(Inc<=Brack9||Brack9===0)){StateTax=Tax8+(Inc-Brack8)*TaxRate8}else if(Inc>Brack9&&(Inc<=Brack10||Brack10===0)){StateTax=Tax9+(Inc-Brack9)*TaxRate9}else if(Inc>Brack10&&(Inc<=Brack11||Brack11===0)){StateTax=Tax10+(Inc-Brack10)*TaxRate10}else if(Inc>Brack11&&(Inc<=Brack12||Brack12===0)){StateTax=Tax11+(Inc-Brack11)*TaxRate11}else if(Inc>Brack12||Brack12!==0){StateTax=Tax12+(Inc-Brack12)*TaxRate12}return StateTax}function getStandDed(VarStat,StateID,VarYear){var StandDed=0;if(VarYear===2024){if(StateID===1){if(VarStat===1||VarStat===3){StandDed=3000}if(VarStat===2||VarStat===4){StandDed=8500}}}else if(VarYear===2022){if(StateID===1){if(VarStat===1||VarStat===3){StandDed=2500}if(VarStat===2||VarStat===4){StandDed=7500}}}else if(VarYear===2023){if(StateID===1){if(VarStat===1||VarStat===3){StandDed=3000}if(VarStat===2||VarStat===4){StandDed=8500}}}else if(VarYear===2025){if(StateID===1){if(VarStat===1||VarStat===3){StandDed=3000}if(VarStat===2||VarStat===4){StandDed=8500}}}else if(VarYear===2026){if(StateID===1){if(VarStat===1||VarStat===3){StandDed=3000}if(VarStat===2||VarStat===4){StandDed=8500}}}return StandDed}function getDepEx(StateID,VarYear){var DepEx=0;if(VarYear===2024){if(StateID===1){DepEx=1000}else if(StateID===3){DepEx=100}else if(StateID===4){DepEx=29}else if(StateID===5){DepEx=446}else if(StateID===8){DepEx=110}else if(StateID===10){DepEx=3000}else if(StateID===11){DepEx=1144}else if(StateID===13){DepEx=2775}else if(StateID===14){DepEx=1000}else if(StateID===15){DepEx=40}else if(StateID===16){DepEx=2250}else if(StateID===18){DepEx=1000}else if(StateID===19){DepEx=300}else if(StateID===20){DepEx=3200}else if(StateID===21){DepEx=1000}else if(StateID===22){DepEx=5600}else if(StateID===23){DepEx=5050}else if(StateID===24){DepEx=1500}else if(StateID===27){DepEx=157}else if(StateID===30){DepEx=1500}else if(StateID===31){DepEx=4000}else if(StateID===32){DepEx=1000}else if(StateID===35){DepEx=2500}else if(StateID===36){DepEx=1000}else if(StateID===37){DepEx=249}else if(StateID===39){DepEx=4950}else if(StateID===40){DepEx=4.6}else if(StateID===44){DepEx=1941}else if(StateID===45){DepEx=4850}else if(StateID===46){DepEx=930}else if(StateID===48){DepEx=2000}else if(StateID===49){DepEx=700}}else if(VarYear===2022){if(StateID===1){DepEx=1000}else if(StateID===10){DepEx=3000}else if(StateID===11){DepEx=1144}else if(StateID===13){DepEx=2375}else if(StateID===14){DepEx=1000}else if(StateID===16){DepEx=2250}else if(StateID===18){DepEx=1000}else if(StateID===20){DepEx=3200}else if(StateID===21){DepEx=1000}else if(StateID===22){DepEx=5000}else if(StateID===23){DepEx=4450}else if(StateID===24){DepEx=1500}else if(StateID===26){DepEx=2580}else if(StateID===30){DepEx=1500}else if(StateID===31){DepEx=4000}else if(StateID===32){DepEx=1000}else if(StateID===35){DepEx=2400}else if(StateID===36){DepEx=1000}else if(StateID===39){DepEx=4350}else if(StateID===40){DepEx=4300}else if(StateID===45){DepEx=4350}else if(StateID===46){DepEx=930}else if(StateID===48){DepEx=2000}else if(StateID===49){DepEx=700}else if(StateID===3){DepEx=100}else if(StateID===4){DepEx=29}else if(StateID===5){DepEx=400}else if(StateID===8){DepEx=110}else if(StateID===15){DepEx=40}else if(StateID===19){DepEx=300}else if(StateID===27){DepEx=146}else if(StateID===37){DepEx=219}else if(StateID===44){DepEx=1750}}else if(VarYear===2023){if(StateID===1){DepEx=1000}else if(StateID===3){DepEx=100}else if(StateID===4){DepEx=29}else if(StateID===5){DepEx=433}else if(StateID===8){DepEx=110}else if(StateID===10){DepEx=3000}else if(StateID===11){DepEx=1144}else if(StateID===13){DepEx=2425}else if(StateID===14){DepEx=1000}else if(StateID===15){DepEx=40}else if(StateID===16){DepEx=2250}else if(StateID===18){DepEx=1000}else if(StateID===19){DepEx=300}else if(StateID===20){DepEx=3200}else if(StateID===21){DepEx=1000}else if(StateID===22){DepEx=5400}else if(StateID===23){DepEx=4800}else if(StateID===24){DepEx=1500}else if(StateID===26){DepEx=2960}else if(StateID===27){DepEx=157}else if(StateID===30){DepEx=1500}else if(StateID===31){DepEx=4000}else if(StateID===32){DepEx=1000}else if(StateID===35){DepEx=2400}else if(StateID===36){DepEx=1000}else if(StateID===37){DepEx=236}else if(StateID===39){DepEx=4700}else if(StateID===40){DepEx=4.6}else if(StateID===44){DepEx=1.8}else if(StateID===45){DepEx=4500}else if(StateID===46){DepEx=930}else if(StateID===48){DepEx=2000}else if(StateID===49){DepEx=700}}else if(VarYear===2025){if(StateID===1){DepEx=1000}else if(StateID===10){DepEx=3000}else if(StateID===11){DepEx=1144}else if(StateID===13){DepEx=2375}else if(StateID===14){DepEx=1000}else if(StateID===16){DepEx=2250}else if(StateID===18){DepEx=1000}else if(StateID===20){DepEx=3200}else if(StateID===21){DepEx=1000}else if(StateID===22){DepEx=5000}else if(StateID===23){DepEx=4450}else if(StateID===24){DepEx=1500}else if(StateID===26){DepEx=2580}else if(StateID===30){DepEx=1500}else if(StateID===31){DepEx=4000}else if(StateID===32){DepEx=1000}else if(StateID===35){DepEx=2400}else if(StateID===36){DepEx=1000}else if(StateID===39){DepEx=4350}else if(StateID===40){DepEx=4300}else if(StateID===45){DepEx=4350}else if(StateID===46){DepEx=930}else if(StateID===48){DepEx=2000}else if(StateID===49){DepEx=700}else if(StateID===3){DepEx=100}else if(StateID===4){DepEx=29}else if(StateID===5){DepEx=400}else if(StateID===8){DepEx=110}else if(StateID===15){DepEx=40}else if(StateID===19){DepEx=300}else if(StateID===27){DepEx=146}else if(StateID===37){DepEx=219}else if(StateID===44){DepEx=1750}}else if(VarYear===2026){if(StateID===1){DepEx=1000}else if(StateID===10){DepEx=3000}else if(StateID===11){DepEx=1144}else if(StateID===13){DepEx=2375}else if(StateID===14){DepEx=1000}else if(StateID===16){DepEx=2250}else if(StateID===18){DepEx=1000}else if(StateID===20){DepEx=3200}else if(StateID===21){DepEx=1000}else if(StateID===22){DepEx=5000}else if(StateID===23){DepEx=4450}else if(StateID===24){DepEx=1500}else if(StateID===26){DepEx=2580}else if(StateID===30){DepEx=1500}else if(StateID===31){DepEx=4000}else if(StateID===32){DepEx=1000}else if(StateID===35){DepEx=2400}else if(StateID===36){DepEx=1000}else if(StateID===39){DepEx=4350}else if(StateID===40){DepEx=4300}else if(StateID===45){DepEx=4350}else if(StateID===46){DepEx=930}else if(StateID===48){DepEx=2000}else if(StateID===49){DepEx=700}else if(StateID===3){DepEx=100}else if(StateID===4){DepEx=29}else if(StateID===5){DepEx=400}else if(StateID===8){DepEx=110}else if(StateID===15){DepEx=40}else if(StateID===19){DepEx=300}else if(StateID===27){DepEx=146}else if(StateID===37){DepEx=219}else if(StateID===44){DepEx=1750}}return DepEx}function getPerEx(VarYear,VarStat,StateID){var PerEx=0;if(VarYear===2024){if(StateID===1){if(VarStat===1||VarStat===3){PerEx=1500}if(VarStat===2||VarStat===4){PerEx=3000}}else if(StateID===4){if(VarStat===1||VarStat===3){PerEx=29}if(VarStat===2||VarStat===4){PerEx=58}}else if(StateID===5){if(VarStat===1||VarStat===3){PerEx=144}if(VarStat===2||VarStat===4){PerEx=288}}}else if(VarYear===2022){if(StateID===1){if(VarStat===1||VarStat===3){PerEx=1500}if(VarStat===2||VarStat===4){PerEx=3000}}else if(StateID===4){if(VarStat===1||VarStat===3){PerEx=29}if(VarStat===2||VarStat===4){PerEx=58}}else if(StateID===5){if(VarStat===1||VarStat===3){PerEx=129}if(VarStat===2||VarStat===4){PerEx=258}}}else if(VarYear===2023){if(StateID===1){if(VarStat===1||VarStat===3){PerEx=1500}if(VarStat===2||VarStat===4){PerEx=3000}}else if(StateID===4){if(VarStat===1||VarStat===3){PerEx=29}if(VarStat===2||VarStat===4){PerEx=58}}else if(StateID===5){if(VarStat===1||VarStat===3){PerEx=140}if(VarStat===2||VarStat===4){PerEx=280}}}else if(VarYear===2025){if(StateID===1){if(VarStat===1||VarStat===3){PerEx=1500}if(VarStat===2||VarStat===4){PerEx=3000}}else if(StateID===4){if(VarStat===1||VarStat===3){PerEx=29}if(VarStat===2||VarStat===4){PerEx=58}}else if(StateID===5){if(VarStat===1||VarStat===3){PerEx=129}if(VarStat===2||VarStat===4){PerEx=258}}}else if(VarYear===2026){if(StateID===1){if(VarStat===1||VarStat===3){PerEx=1500}if(VarStat===2||VarStat===4){PerEx=3000}}else if(StateID===4){if(VarStat===1||VarStat===3){PerEx=29}if(VarStat===2||VarStat===4){PerEx=58}}else if(StateID===5){if(VarStat===1||VarStat===3){PerEx=129}if(VarStat===2||VarStat===4){PerEx=258}}}return PerEx}//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Enter Adjusted Gross Income (AGI), Pay frequency and Year of income into Alabama tax and the answer comes back as Var year and Var stat. It is a single relationship that reads var year out of adjusted Gross Income (AGI), not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Alabama tax calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Alabama tax: it takes 11 numbers and reports Var year, Var stat and Var loc.</p><p>Written with the labels from the form, Annual retirement contributions = Adjusted Gross Income (AGI) × Retirement contributions.</p><p>What comes back is Var year, Var stat, Var loc and Var pay — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 11 boxes and the page has everything it needs.</p><ul><li><strong>Adjusted Gross Income (AGI)</strong> — in annual</li><li><strong>Pay frequency</strong> — a plain number, no unit. Set here the period in which you want to see your take-home pay.</li><li><strong>Year of income</strong> — a plain number, no unit</li><li><strong>What is your filling status?</strong> — a plain number, no unit</li><li><strong>Tax jurisdiction</strong> — a plain number, no unit. The county which levies the local tax on your income.</li><li><strong>Number of add. dependent(s)</strong> — in person(s). State here only the number of additional dependent(s) - don&#039;t state here yourself or your spouse.</li><li><strong>Itemized deductions</strong> — in $. Set here the total of itemized deductions other than retirement contribution relevant to the federal income tax. If you don&#039;t set a deduction or it is less than the standard deduction, the standard deduction will be considered.</li><li><strong>Post-tax deductions</strong> — in $</li><li><strong>Retirement contributions</strong> — in percent. In percentage of gross income.</li><li><strong>Annual retirement contributions</strong> — in $</li><li><strong>State id</strong> — a plain number, no unit</li></ul><p>The answers come back as Var year, Var stat, Var loc, Var pay. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Adjusted Gross Income (AGI) lists 4 options and opens on annual. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Annual retirement contributions</strong> = <code>Adjusted Gross Income (AGI) × Retirement contributions</code></li><li><strong>Retirement contributions</strong> = <code>Annual retirement contributions ÷ Adjusted Gross Income (AGI)</code></li><li><strong>Adjusted Gross Income (AGI)</strong> = <code>Annual retirement contributions ÷ Retirement contributions</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Annual retirement contributions</strong> = <code>Adjusted Gross Income (AGI) × Retirement contributions</code> — the form to use when Adjusted Gross Income (AGI) and Retirement contributions are the values you have.</li><li><strong>Retirement contributions</strong> = <code>Annual retirement contributions ÷ Adjusted Gross Income (AGI)</code> — the form to use when Annual retirement contributions and Adjusted Gross Income (AGI) are the values you have.</li><li><strong>Adjusted Gross Income (AGI)</strong> = <code>Annual retirement contributions ÷ Retirement contributions</code> — the form to use when Annual retirement contributions and Retirement contributions are the values you have.</li></ul><p>Any one of Annual retirement contributions, Retirement contributions and Adjusted Gross Income (AGI) can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Adjusted Gross Income (AGI) and Retirement contributions carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Var year, Var stat and Var loc are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Adjusted Gross Income (AGI) left as a guess.</strong> Anything typed into Adjusted Gross Income (AGI) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Pay frequency left as a guess.</strong> Anything typed into Pay frequency is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Adjusted Gross Income (AGI) is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Adjusted Gross Income (AGI)</strong> is a annual quantity: the page opens it in annual and converts anything else you pick before the formula runs. Change it and Retirement contributions and Annual retirement contributions changes with it. Have it to hand before you start: Adjusted Gross Income (AGI) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Pay frequency</strong> takes a plain number with no unit attached. Set here the period in which you want to see your take-home pay. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Pay frequency is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Year of income</strong> takes a plain number with no unit attached. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Year of income is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>What is your filling status?</strong> takes a plain number with no unit attached. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: What is your filling status? is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Tax jurisdiction</strong> takes a plain number with no unit attached. The county which levies the local tax on your income. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Tax jurisdiction is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Number of add. dependent(s)</strong> is measured in person(s). State here only the number of additional dependent(s) - don&#039;t state here yourself or your spouse. Have it to hand before you start: Number of add. dependent(s) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Itemized deductions</strong> is measured in $. Set here the total of itemized deductions other than retirement contribution relevant to the federal income tax. If you don&#039;t set a deduction or it is less than the standard deduction, the standard deduction will be considered. Have it to hand before you start: Itemized deductions is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Post-tax deductions</strong> is measured in $. Have it to hand before you start: Post-tax deductions is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Retirement contributions</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. In percentage of gross income. Change it and Adjusted Gross Income (AGI) and Annual retirement contributions changes with it. Have it to hand before you start: Retirement contributions is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Annual retirement contributions</strong> is measured in $. Change it and Retirement contributions and Adjusted Gross Income (AGI) changes with it. Have it to hand before you start: Annual retirement contributions is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>State id</strong> takes a plain number with no unit attached. Have it to hand before you start: State id is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Var year</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Var stat</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Var loc</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Var pay</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>annual</strong> — opens in <em>annual</em>, and the chip also carries /week, /hour and /month. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Var year is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are annual and percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Adjusted Gross Income (AGI), Pay frequency and Year of income are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Adjusted Gross Income (AGI), Pay frequency and Year of income measured, Var year and Var stat wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/28-36-rule">28/36 Rule Calculator</a>, <a href="/finance/3d-printer-buy-vs-outsource">3D printer - buy vs outsource Calculator</a> and <a href="/finance/3x-rent">3x rent Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Alabama tax calculator work out?', 'a' => <<<'TXT'
            Var year, Var stat, Var loc and Var pay, from Adjusted Gross Income (AGI) and Retirement contributions. The relationship is Annual retirement contributions = Adjusted Gross Income (AGI) × Retirement contributions.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Adjusted Gross Income (AGI) (annual), Pay frequency, Year of income, What is your filling status?, Tax jurisdiction. With adjusted Gross Income (AGI), pay frequency and year of income in place, Var year can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Annual retirement contributions, Retirement contributions and Adjusted Gross Income (AGI) blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Var year is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Adjusted Gross Income (AGI) left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Var year keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/28-36-rule', 'name' => '28/36 Rule Calculator'],
            ['path' => '/finance/3d-printer-buy-vs-outsource', 'name' => '3D printer - buy vs outsource Calculator'],
            ['path' => '/finance/3x-rent', 'name' => '3x rent Calculator'],
        ],
        'authors' => [],
    ],
];
