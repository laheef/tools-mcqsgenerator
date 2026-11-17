<?php

/**
 * California tax
 * /finance/california-tax
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'California tax',
    'meta' => ['title' => 'California tax Calculator — Formula, Units & Example', 'description' => 'California tax takes adjusted Gross Income (AGI) and returns retirement contributions. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'California tax Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => 'Payroll taxes',
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
                            'rounding' => ['omni', '0.0001'],
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
                            'options' => ['2022' => '2022', '2023' => '2023', '2024' => '2024', '2025' => '2025'],
                            'dataset' => 'year',
                            'control' => 'DROPDOWN',
                            'default' => '2025',
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
                            'name' => 'VarDep',
                            'label' => 'Number of additional dependents',
                            'type' => 'number',
                            'suffix' => 'person(s)',
                            'help' => 'State here only the number of additional dependents — don\'t include yourself or your spouse.',
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
                            'prefix' => '$',
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
                            'prefix' => '$',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Property tax',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PropVal',
                            'label' => 'Assessed home value',
                            'type' => 'number',
                            'prefix' => '$',
                            'help' => 'Set here the assessed value of your property reduced by the applied exemption. In general, taxpayers can claim a $7,000 exemption on their owner-occupied homes.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PropTax',
                            'label' => 'Location',
                            'type' => 'select',
                            'options' => [
                                'Alameda County' => '0.0088',
                                'Alpine County' => '0.0083',
                                'Amador County' => '0.007',
                                'Butte County' => '0.0082',
                                'Calaveras County' => '0.0078',
                                'Colusa County' => '0.0069',
                                'Contra Costa County' => '0.0095',
                                'Del Norte County' => '0.0066',
                                'El Dorado County' => '0.0087',
                                'Fresno County' => '0.0093',
                                'Glenn County' => '0.0074',
                                'Humboldt County' => '0.0077',
                                'Imperial County' => '0.0097',
                                'Inyo County' => '0.0077',
                                'Kern County' => '0.0123',
                                'Kings County' => '0.0087',
                                'Lake County' => '0.0087',
                                'Lassen County' => '0.0075',
                                'Los Angeles County' => '0.0082',
                                'Madera County' => '0.0092',
                                'Marin County' => '0.0095',
                                'Mariposa County' => '0.0068',
                                'Mendocino County' => '0.0079',
                                'Merced County' => '0.0082',
                                'Modoc County' => '0.0084',
                                'Mono County' => '0.0069',
                                'Monterey County' => '0.008',
                                'Napa County' => '0.0081',
                                'Nevada County' => '0.0088',
                                'Orange County' => '0.0079',
                                'Placer County' => '0.0108',
                                'Plumas County' => '0.0072',
                                'Riverside County' => '0.0104',
                                'Sacramento County' => '0.0093',
                                'San Benito County' => '0.0096',
                                'San Bernardino County' => '0.009',
                                'San Diego County' => '0.0087',
                                'San Francisco County' => '0.0074',
                                'San Joaquin County' => '0.0098',
                                'San Luis Obispo County' => '0.008',
                                'San Mateo County' => '0.0073',
                                'Santa Barbara County' => '0.0075',
                                'Santa Clara County' => '0.0085',
                                'Santa Cruz County' => '0.0076',
                                'Shasta County' => '0.0085',
                                'Sierra County' => '0.0085',
                                'Siskiyou County' => '0.0073',
                                'Solano County' => '0.0093',
                                'Sonoma County' => '0.0078',
                                'Stanislaus County' => '0.0091',
                                'Sutter County' => '0.0091',
                                'Tehama County' => '0.0076',
                                'Trinity County' => '0.0058',
                                'Tulare County' => '0.0093',
                                'Tuolumne County' => '0.0072',
                                'Ventura County' => '0.0078',
                                'Yolo County' => '0.0093',
                                'Yuba County' => '0.01',
                            ],
                            'dataset' => 'county',
                            'control' => 'DROPDOWN',
                            'default' => 'Alameda County',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PropRate',
                            'label' => 'Applied property tax rate',
                            'type' => 'result',
                            'help' => 'The value reflects the average effective property tax rate levied in the selected county. You can update the tax rate if necessary.',
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
                                ['when' => 'prop_tax > 0', 'text' => 'The estimated annual property tax is ${{prop_tax.formattedValue}}.'],
                                ['when' => 'annual_tax > 0', 'text' => 'The estimated total annual tax is ${{annual_tax.formattedValue}}.'],
                                ['when' => 'fin_income_period > 0 and PayFreq == 260', 'text' => 'The estimated daily take-home pay is ${{fin_income_period.formattedValue}}.'],
                                ['when' => 'fin_income_period > 0 and PayFreq == 52', 'text' => 'The estimated weekly take-home pay is ${{fin_income_period.formattedValue}}.'],
                                ['when' => 'fin_income_period > 0 and PayFreq == 26', 'text' => 'The estimated bi-weekly take-home pay is ${{fin_income_period.formattedValue}}.'],
                                ['when' => 'fin_income_period > 0 and PayFreq == 24', 'text' => 'The estimated semi-monthly take-home pay is ${{fin_income_period.formattedValue}}.'],
                                ['when' => 'fin_income_period > 0 and PayFreq == 12', 'text' => 'The estimated monthly take-home pay is ${{fin_income_period.formattedValue}}.'],
                                ['when' => 'fin_income_period > 0 and PayFreq == 4', 'text' => 'The estimated quarterly take-home pay is ${{fin_income_period.formattedValue}}.'],
                                ['when' => 'fin_income_period > 0 and PayFreq == 2', 'text' => 'The estimated semi-annually take-home pay is ${{fin_income_period.formattedValue}}.'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Rep',
                            'label' => 'Display more details',
                            'type' => 'select',
                            'options' => ['summary table only' => '1', 'add state income tax brackets' => '3'],
                            'dataset' => 'table_options',
                            'default' => 'summary table only',
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
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'stand_dep > 0 and state_ex <= 0', 'text' => '* Your AGI is reduced by a standard deduction of ${{stand_dep.formattedValue}}.'],
                                ['when' => 'stand_dep <= 0 and state_ex > 0', 'text' => 'Your AGI is reduced by a personal exemption of ${{state_ex.formattedValue}}.'],
                                ['when' => 'stand_dep > 0 and state_ex > 0', 'text' => 'Your AGI is reduced by a standard deduction of ${{stand_dep.formattedValue}}, and a personal exemption of ${{state_ex.formattedValue}}.'],
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
                            'label' => 'Retirement contributions',
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
                            'name' => 'TaxState',
                            'label' => 'Where do you live?',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
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
                            'name' => 'prop_tax',
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
                            'min' => 2,
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
                            'min' => 2,
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
                            'min' => 2,
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
                            'min' => 2,
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
                            'min' => 2,
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
                            'min' => 2,
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
                            'rounding' => ['standard', '2'],
                            'min' => 2,
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
            'results' => ['Income' => 'Ret/RetPerc', 'RetPerc' => 'Ret/Income', 'Ret' => 'Income*RetPerc'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("getFinalDeduc",function(VarYear,VarStat,StateID,Deduc,Ret,Income){if(VarYear===2022){if(VarStat===1&&Deduc<12950){Deduc=12950}if(VarStat===2&&Deduc<25900){Deduc=25900}if(VarStat===3&&Deduc<12950){Deduc=12950}if(VarStat===4&&Deduc<19400){Deduc=19400}}if(VarYear===2023){if(VarStat===1&&Deduc<13850){Deduc=13850}if(VarStat===2&&Deduc<27700){Deduc=27700}if(VarStat===3&&Deduc<13850){Deduc=13850}if(VarStat===4&&Deduc<20800){Deduc=20800}}if(VarYear===2024){if(VarStat===1&&Deduc<14600){Deduc=14600}if(VarStat===2&&Deduc<29200){Deduc=29200}if(VarStat===3&&Deduc<14600){Deduc=14600}if(VarStat===4&&Deduc<21900){Deduc=21900}}if(VarYear===2025){if(VarStat===1&&Deduc<15000){Deduc=15000}if(VarStat===2&&Deduc<30000){Deduc=30000}if(VarStat===3&&Deduc<15000){Deduc=15000}if(VarStat===4&&Deduc<30000){Deduc=30000}}if(Income<Deduc+Ret){Deduc=Income}var StandDed=getStandDed(VarStat,StateID,VarYear);console.log(StandDed,Deduc);if(StandDed>=Deduc){return StandDed+Deduc}else{return Deduc}});omni.define("getIncomeTax",function(VarYear,Income,VarStat,StateID,VarDep){var TaxFed;if(VarYear===2022){TaxFed=getTaxFed22(Income,VarStat)}if(VarYear===2023){TaxFed=getTaxFed23(Income,VarStat)}if(VarYear===2024){TaxFed=getTaxFed24(Income,VarStat)}if(VarYear===2025){TaxFed=getTaxFed25(Income,VarStat)}if(TaxFed<0){TaxFed=0}var StandDed=0;var StandDedCredit=0;if(StateID!==44){StandDed=getStandDed(VarStat,StateID,VarYear)}else{StandDedCredit=getStandDed(VarStat,StateID,VarYear)}var DepEx=0;var DepExCredit=0;if(StateID!==3&&StateID!==4&&StateID!==5&&StateID!==8&&StateID!==15&&StateID!==19&&StateID!==27&&StateID!==37&&StateID!==44){DepEx=getDepEx(StateID,VarYear)*VarDep}else{DepExCredit=getDepEx(StateID,VarYear)*VarDep}var PerEx=0;var PerExCredit=0;if(StateID!==4&&StateID!==5&&StateID!==8&&StateID!==15&&StateID!==27&&StateID!==37){PerEx=getPerEx(VarYear,VarStat,StateID)}else{PerExCredit=getPerEx(VarYear,VarStat,StateID)}var Local=0;if(StateID===5){var SDI=0;if(VarYear===2021){SDI=Income*0.012;if(Income>128298){SDI=128298*0.012}}else if(VarYear===2022){SDI=Income*0.011;if(Income>145600){SDI=145600*0.011}}else if(VarYear===2023){SDI=Income*0.012;if(Income>153164){SDI=153164*0.009}}else if(VarYear===2024){SDI=Income*0.011}else if(VarYear===2025){SDI=Income*0.012}var ETT=Income*0.001;if(Income>7000){ETT=7000*0.001}Local=SDI+ETT}var IncomeState=Income-(StandDed+DepEx+PerEx);var StateTax=getStateTax(IncomeState,VarStat,StateID,VarYear);var StateTaxAftCred=StateTax-StandDedCredit-DepExCredit-PerExCredit;var TotIncTax=TaxFed+StateTaxAftCred+Local;return TotIncTax});omni.define("getDepEx",function(VarYear,Income,VarStat,StateID,VarDep){var DepEx=0;var DepExCredit=0;if(StateID!==3&&StateID!==4&&StateID!==5&&StateID!==8&&StateID!==15&&StateID!==19&&StateID!==27&&StateID!==37&&StateID!==44){DepEx=getDepEx(StateID,VarYear)*VarDep}else{DepExCredit=getDepEx(StateID,VarYear)*VarDep}return DepEx});omni.define("getPerEx",function(VarYear,Income,VarStat,StateID){var PerEx=0;var PerExCredit=0;if(StateID!==4&&StateID!==5&&StateID!==8&&StateID!==15&&StateID!==27&&StateID!==37){PerEx=getPerEx(VarYear,VarStat,StateID)}else{PerExCredit=getPerEx(VarYear,VarStat,StateID)}return PerEx});omni.define("getStandDeduc",function(VarYear,Income,VarStat,StateID,VarDep){var StandDed=0;var StandDedCredit=0;if(StateID!==44){StandDed=getStandDed(VarStat,StateID,VarYear)}else{StandDedCredit=getStandDed(VarStat,StateID,VarYear)}return StandDed});omni.define("getStateEx",function(VarYear,Income,VarStat,StateID,VarDep){var DepEx=0;var DepExCredit=0;if(StateID!==3&&StateID!==4&&StateID!==5&&StateID!==8&&StateID!==15&&StateID!==19&&StateID!==27&&StateID!==37&&StateID!==44){DepEx=getDepEx(StateID,VarYear)*VarDep}else{DepExCredit=getDepEx(StateID,VarYear)*VarDep}var PerEx=0;var PerExCredit=0;if(StateID!==4&&StateID!==5&&StateID!==8&&StateID!==15&&StateID!==27&&StateID!==37){PerEx=getPerEx(VarYear,VarStat,StateID)}else{PerExCredit=getPerEx(VarYear,VarStat,StateID)}var StateEx=PerEx+DepEx;return StateEx});omni.define("getTaxFed",function(VarYear,Income,VarStat){var TaxFed;if(VarYear===2022){TaxFed=getTaxFed22(Income,VarStat)}if(VarYear===2023){TaxFed=getTaxFed23(Income,VarStat)}if(VarYear===2024){TaxFed=getTaxFed24(Income,VarStat)}if(VarYear===2025){TaxFed=getTaxFed25(Income,VarStat)}if(TaxFed<0){TaxFed=0}return TaxFed});omni.define("getStateTaxAftCred",function(VarYear,Income,VarStat,StateID,VarDep){var TaxFed;if(VarYear===2022){TaxFed=getTaxFed22(Income,VarStat)}if(VarYear===2023){TaxFed=getTaxFed23(Income,VarStat)}if(VarYear===2024){TaxFed=getTaxFed24(Income,VarStat)}if(VarYear===2025){TaxFed=getTaxFed25(Income,VarStat)}if(TaxFed<0){TaxFed=0}var StandDed=0;var StandDedCredit=0;if(StateID!==44){StandDed=getStandDed(VarStat,StateID,VarYear)}else{StandDedCredit=getStandDed(VarStat,StateID,VarYear)}var DepEx=0;var DepExCredit=0;if(StateID!==3&&StateID!==4&&StateID!==5&&StateID!==8&&StateID!==15&&StateID!==19&&StateID!==27&&StateID!==37&&StateID!==44){DepEx=getDepEx(StateID,VarYear)*VarDep}else{DepExCredit=getDepEx(StateID,VarYear)*VarDep}var PerEx=0;var PerExCredit=0;if(StateID!==4&&StateID!==5&&StateID!==8&&StateID!==15&&StateID!==27&&StateID!==37){PerEx=getPerEx(VarYear,VarStat,StateID)}else{PerExCredit=getPerEx(VarYear,VarStat,StateID)}var IncomeState=Income-(StandDed+DepEx+PerEx);var StateTax=getStateTax(IncomeState,VarStat,StateID,VarYear);var StateTaxAftCred=StateTax-StandDedCredit-DepExCredit-PerExCredit;if(StateTaxAftCred<0){StateTaxAftCred=0}return StateTaxAftCred});omni.define("getLocal",function(VarYear,Income,VarStat,StateID){var Local=0;if(StateID===5){var SDI=0;if(VarYear===2021){SDI=Income*0.012;if(Income>128298){SDI=128298*0.012}}else if(VarYear===2022){SDI=Income*0.011;if(Income>145600){SDI=145600*0.011}}else if(VarYear===2023){SDI=Income*0.012;if(Income>153164){SDI=153164*0.009}}else if(VarYear===2024){SDI=Income*0.011}else if(VarYear===2025){SDI=Income*0.011}var ETT=Income*0.001;if(Income>7000){ETT=7000*0.001}Local=SDI+ETT}if(Local<0){Local=0}return Local});omni.define("getCredit",function(VarYear,Income,VarStat,StateID,VarDep){var TaxFed;if(VarYear===2022){TaxFed=getTaxFed22(Income,VarStat)}if(VarYear===2023){TaxFed=getTaxFed23(Income,VarStat)}if(VarYear===2024){TaxFed=getTaxFed24(Income,VarStat)}if(VarYear===2025){TaxFed=getTaxFed25(Income,VarStat)}if(TaxFed<0){TaxFed=0}var StandDed=0;var StandDedCredit=0;if(StateID!==44){StandDed=getStandDed(VarStat,StateID,VarYear)}else{StandDedCredit=getStandDed(VarStat,StateID,VarYear)}var DepEx=0;var DepExCredit=0;if(StateID!==3&&StateID!==4&&StateID!==5&&StateID!==8&&StateID!==15&&StateID!==19&&StateID!==27&&StateID!==37&&StateID!==44){DepEx=getDepEx(StateID,VarYear)*VarDep}else{DepExCredit=getDepEx(StateID,VarYear)*VarDep}var PerEx=0;var PerExCredit=0;if(StateID!==4&&StateID!==5&&StateID!==8&&StateID!==15&&StateID!==27&&StateID!==37){PerEx=getPerEx(VarYear,VarStat,StateID)}else{PerExCredit=getPerEx(VarYear,VarStat,StateID)}var Credit=StandDedCredit+DepExCredit+PerExCredit;return Credit});omni.define("getFica",function(VarYear,Income,VarStat){var SocSec=Income*0.062;if(VarYear===2022&&Income>147000){SocSec=147000*0.062}else if(VarYear===2023&&Income>160200){SocSec=160200*0.062}else if(VarYear===2024&&Income>168600){SocSec=168600*0.062}else if(VarYear===2025&&Income>168600){SocSec=168600*0.062}var MedCare=0;var MedLimit=200000;if(VarStat===2){MedLimit=250000}else if(VarStat===3){MedLimit=125000}if(Income<=MedLimit){MedCare=Income*0.0145}else{MedCare=MedLimit*0.0145+(Income-MedLimit)*0.0235}var Fica=SocSec+MedCare;return Fica});omni.define("getSocSec",function(VarYear,Income){var SocSec=Income*0.062;if(VarYear===2022&&Income>147000){SocSec=147000*0.062}else if(VarYear===2023&&Income>160200){SocSec=160200*0.062}else if(VarYear===2024&&Income>168600){SocSec=168600*0.062}else if(VarYear===2025&&Income>168600){SocSec=168600*0.062}return SocSec});omni.define("getMedCare",function(VarYear,Income,VarStat){var MedCare=0;var MedLimit=200000;if(VarStat===2){MedLimit=250000}else if(VarStat===3){MedLimit=125000}if(Income<=MedLimit){MedCare=Income*0.0145}else{MedCare=MedLimit*0.0145+(Income-MedLimit)*0.0235}return MedCare});function getTaxBracketFed(Bracket,VarStat,VarYear){var Brack1,Brack2,Brack3,Brack4,Brack5,Brack6;var UnmarBrack1,UnmarBrack2,UnmarBrack3,UnmarBrack4,UnmarBrack5,UnmarBrack6;var MarJointBrack1,MarJointBrack2,MarJointBrack3,MarJointBrack4,MarJointBrack5,MarJointBrack6;var MarSepBrack1,MarSepBrack2,MarSepBrack3,MarSepBrack4,MarSepBrack5,MarSepBrack6;var HeadBrack1,HeadBrack2,HeadBrack3,HeadBrack4,HeadBrack5,HeadBrack6;if(VarYear===2022){UnmarBrack1=10275;UnmarBrack2=41775;UnmarBrack3=89075;UnmarBrack4=170050;UnmarBrack5=215950;UnmarBrack6=539900;MarJointBrack1=20550;MarJointBrack2=83550;MarJointBrack3=178150;MarJointBrack4=340100;MarJointBrack5=431900;MarJointBrack6=647850;MarSepBrack1=10275;MarSepBrack2=41775;MarSepBrack3=89075;MarSepBrack4=170050;MarSepBrack5=215950;MarSepBrack6=323925;HeadBrack1=14650;HeadBrack2=55900;HeadBrack3=89050;HeadBrack4=170050;HeadBrack5=215950;HeadBrack6=539900}if(VarYear===2023){UnmarBrack1=11000;UnmarBrack2=44725;UnmarBrack3=95375;UnmarBrack4=182100;UnmarBrack5=231250;UnmarBrack6=578125;MarJointBrack1=22000;MarJointBrack2=89450;MarJointBrack3=190750;MarJointBrack4=364200;MarJointBrack5=462500;MarJointBrack6=693750;MarSepBrack1=11000;MarSepBrack2=44725;MarSepBrack3=95375;MarSepBrack4=182100;MarSepBrack5=231250;MarSepBrack6=346875;HeadBrack1=15700;HeadBrack2=59850;HeadBrack3=95350;HeadBrack4=182100;HeadBrack5=231250;HeadBrack6=578100}if(VarYear===2024){UnmarBrack1=11600;UnmarBrack2=47150;UnmarBrack3=100525;UnmarBrack4=191950;UnmarBrack5=243725;UnmarBrack6=609350;MarJointBrack1=23200;MarJointBrack2=94300;MarJointBrack3=201050;MarJointBrack4=383900;MarJointBrack5=487450;MarJointBrack6=731200;MarSepBrack1=11600;MarSepBrack2=47150;MarSepBrack3=100525;MarSepBrack4=191950;MarSepBrack5=243725;MarSepBrack6=365600;HeadBrack1=16550;HeadBrack2=63100;HeadBrack3=100500;HeadBrack4=191950;HeadBrack5=243700;HeadBrack6=609350}if(VarYear===2025){UnmarBrack1=11925;UnmarBrack2=48475;UnmarBrack3=103350;UnmarBrack4=197300;UnmarBrack5=250525;UnmarBrack6=626350;MarJointBrack1=23850;MarJointBrack2=96950;MarJointBrack3=206700;MarJointBrack4=394600;MarJointBrack5=501050;MarJointBrack6=751600;MarSepBrack1=11600;MarSepBrack2=47150;MarSepBrack3=100525;MarSepBrack4=191950;MarSepBrack5=243725;MarSepBrack6=365600;HeadBrack1=16550;HeadBrack2=63100;HeadBrack3=100500;HeadBrack4=191950;HeadBrack5=243700;HeadBrack6=609350}if(VarStat===1){Brack1=UnmarBrack1;Brack2=UnmarBrack2;Brack3=UnmarBrack3;Brack4=UnmarBrack4;Brack5=UnmarBrack5;Brack6=UnmarBrack6}if(VarStat===2){Brack1=MarJointBrack1;Brack2=MarJointBrack2;Brack3=MarJointBrack3;Brack4=MarJointBrack4;Brack5=MarJointBrack5;Brack6=MarJointBrack6}if(VarStat===3){Brack1=MarSepBrack1;Brack2=MarSepBrack2;Brack3=MarSepBrack3;Brack4=MarSepBrack4;Brack5=MarSepBrack5;Brack6=MarSepBrack6}if(VarStat===4){Brack1=HeadBrack1;Brack2=HeadBrack2;Brack3=HeadBrack3;Brack4=HeadBrack4;Brack5=HeadBrack5;Brack6=HeadBrack6}var Brack;if(Bracket===1){Brack=Brack1}else if(Bracket===2){Brack=Brack2}else if(Bracket===3){Brack=Brack3}else if(Bracket===4){Brack=Brack4}else if(Bracket===5){Brack=Brack5}else if(Bracket===6){Brack=Brack6}return Brack}function getTaxFed22(Inc,VarStat){var Brack1,Brack2,Brack3,Brack4,Brack5,Brack6;var TaxRate0=0.1;var TaxRate1=0.12;var TaxRate2=0.22;var TaxRate3=0.24;var TaxRate4=0.32;var TaxRate5=0.35;var TaxRate6=0.37;var UnmarBrack1=10275;var UnmarBrack2=41775;var UnmarBrack3=89075;var UnmarBrack4=170050;var UnmarBrack5=215950;var UnmarBrack6=539900;var MarJointBrack1=20550;var MarJointBrack2=83550;var MarJointBrack3=178150;var MarJointBrack4=340100;var MarJointBrack5=431900;var MarJointBrack6=647850;var MarSepBrack1=10275;var MarSepBrack2=41775;var MarSepBrack3=89075;var MarSepBrack4=170050;var MarSepBrack5=215950;var MarSepBrack6=323925;var HeadBrack1=14650;var HeadBrack2=55900;var HeadBrack3=89050;var HeadBrack4=170050;var HeadBrack5=215950;var HeadBrack6=539900;var TaxFed;if(VarStat===1){Brack1=UnmarBrack1;Brack2=UnmarBrack2;Brack3=UnmarBrack3;Brack4=UnmarBrack4;Brack5=UnmarBrack5;Brack6=UnmarBrack6}if(VarStat===2){Brack1=MarJointBrack1;Brack2=MarJointBrack2;Brack3=MarJointBrack3;Brack4=MarJointBrack4;Brack5=MarJointBrack5;Brack6=MarJointBrack6}if(VarStat===3){Brack1=MarSepBrack1;Brack2=MarSepBrack2;Brack3=MarSepBrack3;Brack4=MarSepBrack4;Brack5=MarSepBrack5;Brack6=MarSepBrack6}if(VarStat===4){Brack1=HeadBrack1;Brack2=HeadBrack2;Brack3=HeadBrack3;Brack4=HeadBrack4;Brack5=HeadBrack5;Brack6=HeadBrack6}var Tax1=Brack1*TaxRate0;var Tax2=(Brack2-Brack1)*TaxRate1+Tax1;var Tax3=(Brack3-Brack2)*TaxRate2+Tax2;var Tax4=(Brack4-Brack3)*TaxRate3+Tax3;var Tax5=(Brack5-Brack4)*TaxRate4+Tax4;var Tax6=(Brack6-Brack5)*TaxRate5+Tax5;if(Inc<=Brack1){TaxFed=Inc*TaxRate0}else if(Inc>Brack1&&Inc<=Brack2){TaxFed=Tax1+(Inc-Brack1)*TaxRate1}else if(Inc>Brack2&&Inc<=Brack3){TaxFed=Tax2+(Inc-Brack2)*TaxRate2}else if(Inc>Brack3&&Inc<=Brack4){TaxFed=Tax3+(Inc-Brack3)*TaxRate3}else if(Inc>Brack4&&Inc<=Brack5){TaxFed=Tax4+(Inc-Brack4)*TaxRate4}else if(Inc>Brack5&&Inc<=Brack6){TaxFed=Tax5+(Inc-Brack5)*TaxRate5}else if(Inc>Brack6){TaxFed=Tax6+(Inc-Brack6)*TaxRate6}return TaxFed}function getTaxFed23(Inc,VarStat){var Brack1,Brack2,Brack3,Brack4,Brack5,Brack6;var TaxRate0=0.1;var TaxRate1=0.12;var TaxRate2=0.22;var TaxRate3=0.24;var TaxRate4=0.32;var TaxRate5=0.35;var TaxRate6=0.37;var UnmarBrack1=11000;var UnmarBrack2=44725;var UnmarBrack3=95375;var UnmarBrack4=182100;var UnmarBrack5=231250;var UnmarBrack6=578125;var MarJointBrack1=22000;var MarJointBrack2=89450;var MarJointBrack3=190750;var MarJointBrack4=364200;var MarJointBrack5=462500;var MarJointBrack6=693750;var MarSepBrack1=11000;var MarSepBrack2=44725;var MarSepBrack3=95375;var MarSepBrack4=182100;var MarSepBrack5=231250;var MarSepBrack6=346875;var HeadBrack1=15700;var HeadBrack2=59850;var HeadBrack3=95350;var HeadBrack4=182100;var HeadBrack5=231250;var HeadBrack6=578100;var TaxFed;if(VarStat===1){Brack1=UnmarBrack1;Brack2=UnmarBrack2;Brack3=UnmarBrack3;Brack4=UnmarBrack4;Brack5=UnmarBrack5;Brack6=UnmarBrack6}if(VarStat===2){Brack1=MarJointBrack1;Brack2=MarJointBrack2;Brack3=MarJointBrack3;Brack4=MarJointBrack4;Brack5=MarJointBrack5;Brack6=MarJointBrack6}if(VarStat===3){Brack1=MarSepBrack1;Brack2=MarSepBrack2;Brack3=MarSepBrack3;Brack4=MarSepBrack4;Brack5=MarSepBrack5;Brack6=MarSepBrack6}if(VarStat===4){Brack1=HeadBrack1;Brack2=HeadBrack2;Brack3=HeadBrack3;Brack4=HeadBrack4;Brack5=HeadBrack5;Brack6=HeadBrack6}var Tax1=Brack1*TaxRate0;var Tax2=(Brack2-Brack1)*TaxRate1+Tax1;var Tax3=(Brack3-Brack2)*TaxRate2+Tax2;var Tax4=(Brack4-Brack3)*TaxRate3+Tax3;var Tax5=(Brack5-Brack4)*TaxRate4+Tax4;var Tax6=(Brack6-Brack5)*TaxRate5+Tax5;if(Inc<=Brack1){TaxFed=Inc*TaxRate0}else if(Inc>Brack1&&Inc<=Brack2){TaxFed=Tax1+(Inc-Brack1)*TaxRate1}else if(Inc>Brack2&&Inc<=Brack3){TaxFed=Tax2+(Inc-Brack2)*TaxRate2}else if(Inc>Brack3&&Inc<=Brack4){TaxFed=Tax3+(Inc-Brack3)*TaxRate3}else if(Inc>Brack4&&Inc<=Brack5){TaxFed=Tax4+(Inc-Brack4)*TaxRate4}else if(Inc>Brack5&&Inc<=Brack6){TaxFed=Tax5+(Inc-Brack5)*TaxRate5}else if(Inc>Brack6){TaxFed=Tax6+(Inc-Brack6)*TaxRate6}return TaxFed}function getTaxFed24(Inc,VarStat){var Brack1,Brack2,Brack3,Brack4,Brack5,Brack6;var TaxRate0=0.1;var TaxRate1=0.12;var TaxRate2=0.22;var TaxRate3=0.24;var TaxRate4=0.32;var TaxRate5=0.35;var TaxRate6=0.37;var UnmarBrack1=11600;var UnmarBrack2=47150;var UnmarBrack3=100525;var UnmarBrack4=191950;var UnmarBrack5=243725;var UnmarBrack6=609350;var MarJointBrack1=23200;var MarJointBrack2=94300;var MarJointBrack3=201050;var MarJointBrack4=383900;var MarJointBrack5=487450;var MarJointBrack6=731200;var MarSepBrack1=11600;var MarSepBrack2=47150;var MarSepBrack3=100525;var MarSepBrack4=191950;var MarSepBrack5=243725;var MarSepBrack6=365600;var HeadBrack1=16550;var HeadBrack2=63100;var HeadBrack3=100500;var HeadBrack4=191950;var HeadBrack5=243700;var HeadBrack6=609350;var TaxFed;if(VarStat===1){Brack1=UnmarBrack1;Brack2=UnmarBrack2;Brack3=UnmarBrack3;Brack4=UnmarBrack4;Brack5=UnmarBrack5;Brack6=UnmarBrack6}if(VarStat===2){Brack1=MarJointBrack1;Brack2=MarJointBrack2;Brack3=MarJointBrack3;Brack4=MarJointBrack4;Brack5=MarJointBrack5;Brack6=MarJointBrack6}if(VarStat===3){Brack1=MarSepBrack1;Brack2=MarSepBrack2;Brack3=MarSepBrack3;Brack4=MarSepBrack4;Brack5=MarSepBrack5;Brack6=MarSepBrack6}if(VarStat===4){Brack1=HeadBrack1;Brack2=HeadBrack2;Brack3=HeadBrack3;Brack4=HeadBrack4;Brack5=HeadBrack5;Brack6=HeadBrack6}var Tax1=Brack1*TaxRate0;var Tax2=(Brack2-Brack1)*TaxRate1+Tax1;var Tax3=(Brack3-Brack2)*TaxRate2+Tax2;var Tax4=(Brack4-Brack3)*TaxRate3+Tax3;var Tax5=(Brack5-Brack4)*TaxRate4+Tax4;var Tax6=(Brack6-Brack5)*TaxRate5+Tax5;if(Inc<=Brack1){TaxFed=Inc*TaxRate0}else if(Inc>Brack1&&Inc<=Brack2){TaxFed=Tax1+(Inc-Brack1)*TaxRate1}else if(Inc>Brack2&&Inc<=Brack3){TaxFed=Tax2+(Inc-Brack2)*TaxRate2}else if(Inc>Brack3&&Inc<=Brack4){TaxFed=Tax3+(Inc-Brack3)*TaxRate3}else if(Inc>Brack4&&Inc<=Brack5){TaxFed=Tax4+(Inc-Brack4)*TaxRate4}else if(Inc>Brack5&&Inc<=Brack6){TaxFed=Tax5+(Inc-Brack5)*TaxRate5}else if(Inc>Brack6){TaxFed=Tax6+(Inc-Brack6)*TaxRate6}return TaxFed}function getTaxFed25(Inc,VarStat){var Brack1,Brack2,Brack3,Brack4,Brack5,Brack6;var TaxRate0=0.1;var TaxRate1=0.12;var TaxRate2=0.22;var TaxRate3=0.24;var TaxRate4=0.32;var TaxRate5=0.35;var TaxRate6=0.37;var UnmarBrack1=11925;var UnmarBrack2=48475;var UnmarBrack3=103350;var UnmarBrack4=197300;var UnmarBrack5=250525;var UnmarBrack6=626350;var MarJointBrack1=23850;var MarJointBrack2=96950;var MarJointBrack3=206700;var MarJointBrack4=394600;var MarJointBrack5=501050;var MarJointBrack6=751600;var MarSepBrack1=11600;var MarSepBrack2=47150;var MarSepBrack3=100525;var MarSepBrack4=191950;var MarSepBrack5=243725;var MarSepBrack6=365600;var HeadBrack1=16550;var HeadBrack2=63100;var HeadBrack3=100500;var HeadBrack4=191950;var HeadBrack5=243700;var HeadBrack6=609350;var TaxFed;if(VarStat===1){Brack1=UnmarBrack1;Brack2=UnmarBrack2;Brack3=UnmarBrack3;Brack4=UnmarBrack4;Brack5=UnmarBrack5;Brack6=UnmarBrack6}if(VarStat===2){Brack1=MarJointBrack1;Brack2=MarJointBrack2;Brack3=MarJointBrack3;Brack4=MarJointBrack4;Brack5=MarJointBrack5;Brack6=MarJointBrack6}if(VarStat===3){Brack1=MarSepBrack1;Brack2=MarSepBrack2;Brack3=MarSepBrack3;Brack4=MarSepBrack4;Brack5=MarSepBrack5;Brack6=MarSepBrack6}if(VarStat===4){Brack1=HeadBrack1;Brack2=HeadBrack2;Brack3=HeadBrack3;Brack4=HeadBrack4;Brack5=HeadBrack5;Brack6=HeadBrack6}var Tax1=Brack1*TaxRate0;var Tax2=(Brack2-Brack1)*TaxRate1+Tax1;var Tax3=(Brack3-Brack2)*TaxRate2+Tax2;var Tax4=(Brack4-Brack3)*TaxRate3+Tax3;var Tax5=(Brack5-Brack4)*TaxRate4+Tax4;var Tax6=(Brack6-Brack5)*TaxRate5+Tax5;if(Inc<=Brack1){TaxFed=Inc*TaxRate0}else if(Inc>Brack1&&Inc<=Brack2){TaxFed=Tax1+(Inc-Brack1)*TaxRate1}else if(Inc>Brack2&&Inc<=Brack3){TaxFed=Tax2+(Inc-Brack2)*TaxRate2}else if(Inc>Brack3&&Inc<=Brack4){TaxFed=Tax3+(Inc-Brack3)*TaxRate3}else if(Inc>Brack4&&Inc<=Brack5){TaxFed=Tax4+(Inc-Brack4)*TaxRate4}else if(Inc>Brack5&&Inc<=Brack6){TaxFed=Tax5+(Inc-Brack5)*TaxRate5}else if(Inc>Brack6){TaxFed=Tax6+(Inc-Brack6)*TaxRate6}return TaxFed}function getTaxRate(StateID,Bracket,VarYear){var TaxRate=0;if(VarYear===2024){if(StateID===5){if(Bracket===0){TaxRate=0.01}else if(Bracket===1){TaxRate=0.02}else if(Bracket===2){TaxRate=0.04}else if(Bracket===3){TaxRate=0.06}else if(Bracket===4){TaxRate=0.08}else if(Bracket===5){TaxRate=0.093}else if(Bracket===6){TaxRate=0.103}else if(Bracket===7){TaxRate=0.113}else if(Bracket===8){TaxRate=0.123}else if(Bracket===9){TaxRate=0.133}}}else if(VarYear===2022){if(StateID===5){if(Bracket===0){TaxRate=0.01}else if(Bracket===1){TaxRate=0.02}else if(Bracket===2){TaxRate=0.04}else if(Bracket===3){TaxRate=0.06}else if(Bracket===4){TaxRate=0.08}else if(Bracket===5){TaxRate=0.093}else if(Bracket===6){TaxRate=0.103}else if(Bracket===7){TaxRate=0.113}else if(Bracket===8){TaxRate=0.123}else if(Bracket===9){TaxRate=0.133}}}else if(VarYear===2023){if(StateID===5){if(Bracket===0){TaxRate=0.01}else if(Bracket===1){TaxRate=0.02}else if(Bracket===2){TaxRate=0.04}else if(Bracket===3){TaxRate=0.06}else if(Bracket===4){TaxRate=0.08}else if(Bracket===5){TaxRate=0.093}else if(Bracket===6){TaxRate=0.103}else if(Bracket===7){TaxRate=0.113}else if(Bracket===8){TaxRate=0.123}else if(Bracket===9){TaxRate=0.133}}}else if(VarYear===2025){if(StateID===5){if(Bracket===0){TaxRate=0.01}else if(Bracket===1){TaxRate=0.02}else if(Bracket===2){TaxRate=0.04}else if(Bracket===3){TaxRate=0.06}else if(Bracket===4){TaxRate=0.08}else if(Bracket===5){TaxRate=0.093}else if(Bracket===6){TaxRate=0.103}else if(Bracket===7){TaxRate=0.113}else if(Bracket===8){TaxRate=0.123}else if(Bracket===9){TaxRate=0.133}}}return TaxRate}function getTaxBracket(StateID,Status,Bracket,VarYear){var Brack=0;if(VarYear===2024){if(StateID===5){if(Bracket===1){if(Status===1){Brack=10412}if(Status===2){Brack=20824}}else if(Bracket===2){if(Status===1){Brack=24684}if(Status===2){Brack=49368}}else if(Bracket===3){if(Status===1){Brack=38959}if(Status===2){Brack=77918}}else if(Bracket===4){if(Status===1){Brack=54081}if(Status===2){Brack=108162}}else if(Bracket===5){if(Status===1){Brack=68350}if(Status===2){Brack=136700}}else if(Bracket===6){if(Status===1){Brack=349137}if(Status===2){Brack=698274}}else if(Bracket===7){if(Status===1){Brack=418961}if(Status===2){Brack=837922}}else if(Bracket===8){if(Status===1){Brack=698271}if(Status===2){Brack=1000000}}else if(Bracket===9){if(Status===1){Brack=1000000}if(Status===2){Brack=1396542}}}}else if(VarYear===2022){var VarStat=Status;if(StateID===5){if(Bracket===1){if(VarStat===1||VarStat===3){Brack=9325}if(VarStat===2||VarStat===4){Brack=18650}}else if(Bracket===2){if(VarStat===1||VarStat===3){Brack=22107}if(VarStat===2||VarStat===4){Brack=44214}}else if(Bracket===3){if(VarStat===1||VarStat===3){Brack=34892}if(VarStat===2||VarStat===4){Brack=69784}}else if(Bracket===4){if(VarStat===1||VarStat===3){Brack=48435}if(VarStat===2||VarStat===4){Brack=96870}}else if(Bracket===5){if(VarStat===1||VarStat===3){Brack=61214}if(VarStat===2||VarStat===4){Brack=122428}}else if(Bracket===6){if(VarStat===1||VarStat===3){Brack=312686}if(VarStat===2||VarStat===4){Brack=625372}}else if(Bracket===7){if(VarStat===1||VarStat===3){Brack=375221}if(VarStat===2||VarStat===4){Brack=750442}}else if(Bracket===8){if(VarStat===1||VarStat===3){Brack=625369}if(VarStat===2||VarStat===4){Brack=1000000}}else if(Bracket===9){if(VarStat===1||VarStat===3){Brack=1000000}if(VarStat===2||VarStat===4){Brack=1250738}}}}else if(VarYear===2023){if(StateID===5){if(Bracket===1){if(Status===1){Brack=10099}if(Status===2){Brack=20198}}else if(Bracket===2){if(Status===1){Brack=23942}if(Status===2){Brack=47884}}else if(Bracket===3){if(Status===1){Brack=37788}if(Status===2){Brack=75576}}else if(Bracket===4){if(Status===1){Brack=52455}if(Status===2){Brack=104910}}else if(Bracket===5){if(Status===1){Brack=66295}if(Status===2){Brack=132590}}else if(Bracket===6){if(Status===1){Brack=338639}if(Status===2){Brack=677278}}else if(Bracket===7){if(Status===1){Brack=406364}if(Status===2){Brack=812728}}else if(Bracket===8){if(Status===1){Brack=677275}if(Status===2){Brack=1000000}}else if(Bracket===9){if(Status===1){Brack=1000000}if(Status===2){Brack=1354550}}}}else if(VarYear===2025){if(StateID===5){if(Bracket===1){if(Status===1){Brack=10756}if(Status===2){Brack=21512}}else if(Bracket===2){if(Status===1){Brack=25499}if(Status===2){Brack=50998}}else if(Bracket===3){if(Status===1){Brack=40245}if(Status===2){Brack=80490}}else if(Bracket===4){if(Status===1){Brack=55866}if(Status===2){Brack=111732}}else if(Bracket===5){if(Status===1){Brack=70606}if(Status===2){Brack=141732}}else if(Bracket===6){if(Status===1){Brack=360659}if(Status===2){Brack=721318}}else if(Bracket===7){if(Status===1){Brack=432787}if(Status===2){Brack=865574}}else if(Bracket===8){if(Status===1){Brack=721314}if(Status===2){Brack=1000000}}else if(Bracket===9){if(Status===1){Brack=1000000}if(Status===2){Brack=1442628}}}}return Brack}function getStateTax(Inc,VarStat,StateID,VarYear){var Brack1=getTaxBracket(StateID,VarStat,1,VarYear);var Brack2=getTaxBracket(StateID,VarStat,2,VarYear);var Brack3=getTaxBracket(StateID,VarStat,3,VarYear);var Brack4=getTaxBracket(StateID,VarStat,4,VarYear);var Brack5=getTaxBracket(StateID,VarStat,5,VarYear);var Brack6=getTaxBracket(StateID,VarStat,6,VarYear);var Brack7=getTaxBracket(StateID,VarStat,7,VarYear);var Brack8=getTaxBracket(StateID,VarStat,8,VarYear);var Brack9=getTaxBracket(StateID,VarStat,9,VarYear);var Brack10=getTaxBracket(StateID,VarStat,10,VarYear);var Brack11=getTaxBracket(StateID,VarStat,11,VarYear);var Brack12=getTaxBracket(StateID,VarStat,12,VarYear);var TaxRate0=getTaxRate(StateID,0,VarYear);var TaxRate1=getTaxRate(StateID,1,VarYear);var TaxRate2=getTaxRate(StateID,2,VarYear);var TaxRate3=getTaxRate(StateID,3,VarYear);var TaxRate4=getTaxRate(StateID,4,VarYear);var TaxRate5=getTaxRate(StateID,5,VarYear);var TaxRate6=getTaxRate(StateID,6,VarYear);var TaxRate7=getTaxRate(StateID,7,VarYear);var TaxRate8=getTaxRate(StateID,8,VarYear);var TaxRate9=getTaxRate(StateID,9,VarYear);var TaxRate10=getTaxRate(StateID,10,VarYear);var TaxRate11=getTaxRate(StateID,11,VarYear);var TaxRate12=getTaxRate(StateID,12,VarYear);var StateTax=0;var Tax1=Brack1*TaxRate0;var Tax2=(Brack2-Brack1)*TaxRate1+Tax1;var Tax3=(Brack3-Brack2)*TaxRate2+Tax2;var Tax4=(Brack4-Brack3)*TaxRate3+Tax3;var Tax5=(Brack5-Brack4)*TaxRate4+Tax4;var Tax6=(Brack6-Brack5)*TaxRate5+Tax5;var Tax7=(Brack7-Brack6)*TaxRate6+Tax6;var Tax8=(Brack8-Brack7)*TaxRate7+Tax7;var Tax9=(Brack9-Brack8)*TaxRate8+Tax8;var Tax10=(Brack10-Brack9)*TaxRate9+Tax9;var Tax11=(Brack11-Brack10)*TaxRate10+Tax10;var Tax12=(Brack12-Brack11)*TaxRate11+Tax11;if(Inc<=Brack1||Brack1===0){StateTax=Inc*TaxRate0}else if(Inc>Brack1&&(Inc<=Brack2||Brack2===0)){StateTax=Tax1+(Inc-Brack1)*TaxRate1}else if(Inc>Brack2&&(Inc<=Brack3||Brack3===0)){StateTax=Tax2+(Inc-Brack2)*TaxRate2}else if(Inc>Brack3&&(Inc<=Brack4||Brack4===0)){StateTax=Tax3+(Inc-Brack3)*TaxRate3}else if(Inc>Brack4&&(Inc<=Brack5||Brack5===0)){StateTax=Tax4+(Inc-Brack4)*TaxRate4}else if(Inc>Brack5&&(Inc<=Brack6||Brack6===0)){StateTax=Tax5+(Inc-Brack5)*TaxRate5}else if(Inc>Brack6&&(Inc<=Brack7||Brack7===0)){StateTax=Tax6+(Inc-Brack6)*TaxRate6}else if(Inc>Brack7&&(Inc<=Brack8||Brack8===0)){StateTax=Tax7+(Inc-Brack7)*TaxRate7}else if(Inc>Brack8&&(Inc<=Brack9||Brack9===0)){StateTax=Tax8+(Inc-Brack8)*TaxRate8}else if(Inc>Brack9&&(Inc<=Brack10||Brack10===0)){StateTax=Tax9+(Inc-Brack9)*TaxRate9}else if(Inc>Brack10&&(Inc<=Brack11||Brack11===0)){StateTax=Tax10+(Inc-Brack10)*TaxRate10}else if(Inc>Brack11&&(Inc<=Brack12||Brack12===0)){StateTax=Tax11+(Inc-Brack11)*TaxRate11}else if(Inc>Brack12||Brack12!==0){StateTax=Tax12+(Inc-Brack12)*TaxRate12}return StateTax}function getStandDed(VarStat,StateID,VarYear){var StandDed=0;if(VarYear===2024){if(StateID===5){if(VarStat===1||VarStat===3){StandDed=5363}if(VarStat===2||VarStat===4){StandDed=10726}}}else if(VarYear===2022){if(StateID===5){if(VarStat===1||VarStat===3){StandDed=4803}if(VarStat===2||VarStat===4){StandDed=9606}}}else if(VarYear===2023){if(StateID===5){if(VarStat===1||VarStat===3){StandDed=5202}if(VarStat===2||VarStat===4){StandDed=10404}}}else if(VarYear===2025){if(StateID===5){if(VarStat===1||VarStat===3){StandDed=5540}if(VarStat===2||VarStat===4){StandDed=11080}}}return StandDed}function getDepEx(StateID,VarYear){var DepEx=0;if(VarYear===2024){if(StateID===1){DepEx=1000}else if(StateID===3){DepEx=100}else if(StateID===4){DepEx=29}else if(StateID===5){DepEx=446}else if(StateID===8){DepEx=110}else if(StateID===10){DepEx=3000}else if(StateID===11){DepEx=1144}else if(StateID===13){DepEx=2775}else if(StateID===14){DepEx=1000}else if(StateID===15){DepEx=40}else if(StateID===16){DepEx=2250}else if(StateID===18){DepEx=1000}else if(StateID===19){DepEx=300}else if(StateID===20){DepEx=3200}else if(StateID===21){DepEx=1000}else if(StateID===22){DepEx=5600}else if(StateID===23){DepEx=5050}else if(StateID===24){DepEx=1500}else if(StateID===27){DepEx=157}else if(StateID===30){DepEx=1500}else if(StateID===31){DepEx=4000}else if(StateID===32){DepEx=1000}else if(StateID===35){DepEx=2500}else if(StateID===36){DepEx=1000}else if(StateID===37){DepEx=249}else if(StateID===39){DepEx=4950}else if(StateID===40){DepEx=4.6}else if(StateID===44){DepEx=1941}else if(StateID===45){DepEx=4850}else if(StateID===46){DepEx=930}else if(StateID===48){DepEx=2000}else if(StateID===49){DepEx=700}}else if(VarYear===2022){if(StateID===1){DepEx=1000}else if(StateID===10){DepEx=3000}else if(StateID===11){DepEx=1144}else if(StateID===13){DepEx=2375}else if(StateID===14){DepEx=1000}else if(StateID===16){DepEx=2250}else if(StateID===18){DepEx=1000}else if(StateID===20){DepEx=3200}else if(StateID===21){DepEx=1000}else if(StateID===22){DepEx=5000}else if(StateID===23){DepEx=4450}else if(StateID===24){DepEx=1500}else if(StateID===26){DepEx=2580}else if(StateID===30){DepEx=1500}else if(StateID===31){DepEx=4000}else if(StateID===32){DepEx=1000}else if(StateID===35){DepEx=2400}else if(StateID===36){DepEx=1000}else if(StateID===39){DepEx=4350}else if(StateID===40){DepEx=4300}else if(StateID===45){DepEx=4350}else if(StateID===46){DepEx=930}else if(StateID===48){DepEx=2000}else if(StateID===49){DepEx=700}else if(StateID===3){DepEx=100}else if(StateID===4){DepEx=29}else if(StateID===5){DepEx=400}else if(StateID===8){DepEx=110}else if(StateID===15){DepEx=40}else if(StateID===19){DepEx=300}else if(StateID===27){DepEx=146}else if(StateID===37){DepEx=219}else if(StateID===44){DepEx=1750}}else if(VarYear===2023){if(StateID===1){DepEx=1000}else if(StateID===3){DepEx=100}else if(StateID===4){DepEx=29}else if(StateID===5){DepEx=433}else if(StateID===8){DepEx=110}else if(StateID===10){DepEx=3000}else if(StateID===11){DepEx=1144}else if(StateID===13){DepEx=2425}else if(StateID===14){DepEx=1000}else if(StateID===15){DepEx=40}else if(StateID===16){DepEx=2250}else if(StateID===18){DepEx=1000}else if(StateID===19){DepEx=300}else if(StateID===20){DepEx=3200}else if(StateID===21){DepEx=1000}else if(StateID===22){DepEx=5400}else if(StateID===23){DepEx=4800}else if(StateID===24){DepEx=1500}else if(StateID===26){DepEx=2960}else if(StateID===27){DepEx=157}else if(StateID===30){DepEx=1500}else if(StateID===31){DepEx=4000}else if(StateID===32){DepEx=1000}else if(StateID===35){DepEx=2400}else if(StateID===36){DepEx=1000}else if(StateID===37){DepEx=236}else if(StateID===39){DepEx=4700}else if(StateID===40){DepEx=4.6}else if(StateID===44){DepEx=1.8}else if(StateID===45){DepEx=4500}else if(StateID===46){DepEx=930}else if(StateID===48){DepEx=2000}else if(StateID===49){DepEx=700}}else if(VarYear===2025){if(StateID===1){DepEx=1000}else if(StateID===3){DepEx=100}else if(StateID===4){DepEx=29}else if(StateID===5){DepEx=461}else if(StateID===8){DepEx=110}else if(StateID===10){DepEx=3000}else if(StateID===11){DepEx=1144}else if(StateID===13){DepEx=2775}else if(StateID===14){DepEx=1000}else if(StateID===15){DepEx=40}else if(StateID===16){DepEx=2250}else if(StateID===18){DepEx=1000}else if(StateID===19){DepEx=300}else if(StateID===20){DepEx=3200}else if(StateID===21){DepEx=1000}else if(StateID===22){DepEx=5600}else if(StateID===23){DepEx=5050}else if(StateID===24){DepEx=1500}else if(StateID===27){DepEx=157}else if(StateID===30){DepEx=1500}else if(StateID===31){DepEx=4000}else if(StateID===32){DepEx=1000}else if(StateID===35){DepEx=2500}else if(StateID===36){DepEx=1000}else if(StateID===37){DepEx=249}else if(StateID===39){DepEx=4950}else if(StateID===40){DepEx=4.6}else if(StateID===44){DepEx=1941}else if(StateID===45){DepEx=4850}else if(StateID===46){DepEx=930}else if(StateID===48){DepEx=2000}else if(StateID===49){DepEx=700}}return DepEx}function getPerEx(VarYear,VarStat,StateID){var PerEx=0;if(VarYear===2024){if(StateID===1){if(VarStat===1||VarStat===3){PerEx=1500}if(VarStat===2||VarStat===4){PerEx=3000}}else if(StateID===4){if(VarStat===1||VarStat===3){PerEx=29}if(VarStat===2||VarStat===4){PerEx=58}}else if(StateID===5){if(VarStat===1||VarStat===3){PerEx=144}if(VarStat===2||VarStat===4){PerEx=288}}}else if(VarYear===2022){if(StateID===1){if(VarStat===1||VarStat===3){PerEx=1500}if(VarStat===2||VarStat===4){PerEx=3000}}else if(StateID===4){if(VarStat===1||VarStat===3){PerEx=29}if(VarStat===2||VarStat===4){PerEx=58}}else if(StateID===5){if(VarStat===1||VarStat===3){PerEx=129}if(VarStat===2||VarStat===4){PerEx=258}}}else if(VarYear===2023){if(StateID===1){if(VarStat===1||VarStat===3){PerEx=1500}if(VarStat===2||VarStat===4){PerEx=3000}}else if(StateID===4){if(VarStat===1||VarStat===3){PerEx=29}if(VarStat===2||VarStat===4){PerEx=58}}else if(StateID===5){if(VarStat===1||VarStat===3){PerEx=140}if(VarStat===2||VarStat===4){PerEx=280}}}else if(VarYear===2025){if(StateID===1){if(VarStat===1||VarStat===3){PerEx=1500}if(VarStat===2||VarStat===4){PerEx=3000}}else if(StateID===4){if(VarStat===1||VarStat===3){PerEx=29}if(VarStat===2||VarStat===4){PerEx=58}}else if(StateID===5){if(VarStat===1||VarStat===3){PerEx=149}if(VarStat===2||VarStat===4){PerEx=298}}}return PerEx}//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Enter Adjusted Gross Income (AGI), Pay frequency and Year of income into California tax and the answer comes back as Applied property tax rate and Var year. Nothing is looked up on this page: applied property tax rate is computed from adjusted Gross Income (AGI) and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Applied property tax rate is opened in percent; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the California tax calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind California tax: it takes 14 numbers and reports Applied property tax rate, Var year and Var pay.</p><p>Written with the labels from the form, Retirement contributions = Adjusted Gross Income (AGI) × Retirement contributions.</p><p>The answers are Applied property tax rate, Var year and Var pay; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 14 boxes and the page has everything it needs.</p><ul><li><strong>Adjusted Gross Income (AGI)</strong> — in annual</li><li><strong>Pay frequency</strong> — a plain number, no unit. Set here the period in which you want to see your take-home pay.</li><li><strong>Year of income</strong> — a plain number, no unit</li><li><strong>What is your filling status?</strong> — a plain number, no unit</li><li><strong>Number of additional dependents</strong> — in person(s). State here only the number of additional dependents — don&#039;t include yourself or your spouse.</li><li><strong>Itemized deductions</strong> — a plain number, no unit. Set here the total of itemized deductions other than retirement contribution relevant to the federal income tax. If you don&#039;t set a deduction or it is less than the standard deduction, the standard deduction will be considered.</li><li><strong>Post-tax deductions</strong> — a plain number, no unit</li><li><strong>Assessed home value</strong> — a plain number, no unit. Set here the assessed value of your property reduced by the applied exemption. In general, taxpayers can claim a $7,000 exemption on their owner-occupied homes.</li><li><strong>Location</strong> — a plain number, no unit</li><li><strong>Display more details</strong> — a plain number, no unit</li><li><strong>Retirement contributions</strong> — in percent. In percentage of gross income.</li><li><strong>Retirement contributions</strong> — in $</li><li><strong>Var rep</strong> — a plain number, no unit</li><li><strong>Where do you live?</strong> — a plain number, no unit</li></ul><p>The result boxes are Applied property tax rate in percent, Var year, Var pay; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Applied property tax rate lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Retirement contributions</strong> = <code>Adjusted Gross Income (AGI) × Retirement contributions</code></li><li><strong>Adjusted Gross Income (AGI)</strong> = <code>Retirement contributions ÷ Retirement contributions</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Retirement contributions</strong> = <code>Adjusted Gross Income (AGI) × Retirement contributions</code> — the form to use when Adjusted Gross Income (AGI) and Retirement contributions are the values you have.</li><li><strong>Adjusted Gross Income (AGI)</strong> = <code>Retirement contributions ÷ Retirement contributions</code> — the form to use when Retirement contributions and Retirement contributions are the values you have.</li><li><strong>Retirement contributions</strong> = <code>Retirement contributions ÷ Adjusted Gross Income (AGI)</code> — the form to use when Retirement contributions and Adjusted Gross Income (AGI) are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Retirement contributions, Adjusted Gross Income (AGI) and Retirement contributions can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Adjusted Gross Income (AGI) and Retirement contributions carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Applied property tax rate, Var year and Var pay are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Adjusted Gross Income (AGI) left as a guess.</strong> Anything typed into Adjusted Gross Income (AGI) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Pay frequency left as a guess.</strong> Anything typed into Pay frequency is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Adjusted Gross Income (AGI) is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Adjusted Gross Income (AGI)</strong> is a annual quantity: the page opens it in annual and converts anything else you pick before the formula runs. The page reads it when it works out Retirement contributions and Retirement contributions. Have it to hand before you start: Adjusted Gross Income (AGI) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Pay frequency</strong> takes a plain number with no unit attached. Set here the period in which you want to see your take-home pay. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Pay frequency is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Year of income</strong> takes a plain number with no unit attached. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Year of income is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>What is your filling status?</strong> takes a plain number with no unit attached. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: What is your filling status? is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Number of additional dependents</strong> is measured in person(s). State here only the number of additional dependents — don&#039;t include yourself or your spouse. Have it to hand before you start: Number of additional dependents is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Itemized deductions</strong> takes a plain number with no unit attached. Set here the total of itemized deductions other than retirement contribution relevant to the federal income tax. If you don&#039;t set a deduction or it is less than the standard deduction, the standard deduction will be considered. Have it to hand before you start: Itemized deductions is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Post-tax deductions</strong> takes a plain number with no unit attached. Have it to hand before you start: Post-tax deductions is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Assessed home value</strong> takes a plain number with no unit attached. Set here the assessed value of your property reduced by the applied exemption. In general, taxpayers can claim a $7,000 exemption on their owner-occupied homes. Have it to hand before you start: Assessed home value is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Location</strong> takes a plain number with no unit attached. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Location is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Display more details</strong> takes a plain number with no unit attached. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Display more details is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Retirement contributions</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. In percentage of gross income. The page reads it when it works out Adjusted Gross Income (AGI) and Retirement contributions. Have it to hand before you start: Retirement contributions is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Retirement contributions</strong> is measured in $. The page reads it when it works out Adjusted Gross Income (AGI) and Retirement contributions. Have it to hand before you start: Retirement contributions is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Var rep</strong> takes a plain number with no unit attached. Have it to hand before you start: Var rep is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Where do you live?</strong> takes a plain number with no unit attached. Have it to hand before you start: Where do you live? is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Applied property tax rate is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover percent and annual. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Adjusted Gross Income (AGI), Pay frequency and Year of income is what you already know and Applied property tax rate and Var year is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/sip-india">Systematic investment plan Calculator</a>, <a href="/finance/tax-bracket">Tax bracket Calculator</a> and <a href="/finance/taxable-equivalent-yield">Taxable equivalent yield Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the California tax calculator work out?', 'a' => <<<'TXT'
            Applied property tax rate, Var year and Var pay, from Adjusted Gross Income (AGI) and Retirement contributions. The relationship is Retirement contributions = Adjusted Gross Income (AGI) × Retirement contributions.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Adjusted Gross Income (AGI) (annual), Pay frequency, Year of income, What is your filling status?, Number of additional dependents (person(s)). Fill adjusted Gross Income (AGI), pay frequency and year of income and leave Applied property tax rate empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Retirement contributions, Adjusted Gross Income (AGI) and Retirement contributions can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Applied property tax rate is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Adjusted Gross Income (AGI) left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Applied property tax rate keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/sip-india', 'name' => 'Systematic investment plan Calculator'],
            ['path' => '/finance/tax-bracket', 'name' => 'Tax bracket Calculator'],
            ['path' => '/finance/taxable-equivalent-yield', 'name' => 'Taxable equivalent yield Calculator'],
        ],
        'authors' => [],
    ],
];
