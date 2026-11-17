<?php

/**
 * UK take-home pay
 * /finance/uk-take-home-pay
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'UK take-home pay',
    'meta' => ['title' => 'UK take-home pay — Formula, Steps & Examples', 'description' => 'UK take-home pay turns location and tax year into total annual income. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'UK take-home pay Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'location',
                            'label' => 'Location',
                            'type' => 'select',
                            'options' => ['England' => '0', 'Scotland' => '1', 'Wales' => '2', 'Northern Ireland' => '3'],
                            'default' => 'England',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tax_year',
                            'label' => 'Tax year',
                            'type' => 'select',
                            'options' => ['2022 / 2023' => '0', '2021 / 2022' => '1'],
                            'default' => '2022 / 2023',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Total annual income',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'employment_income',
                            'label' => 'Employment income',
                            'type' => 'number',
                            'prefix' => '£',
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
                            'name' => 'self_employment_income',
                            'label' => 'Self-employment net income',
                            'type' => 'number',
                            'prefix' => '£',
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
                            'name' => 'rental_income',
                            'label' => 'Rental net income',
                            'type' => 'number',
                            'prefix' => '£',
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
                            'name' => 'total_income',
                            'label' => 'Total annual income',
                            'type' => 'number',
                            'prefix' => '£',
                            'readonly' => true,
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Student loan',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'student_loan_q',
                            'label' => 'Do you have student loans?',
                            'type' => 'select',
                            'options' => ['Yes' => '1', 'No' => '0'],
                            'dataset' => 'YesNo',
                            'default' => 'No',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'student_loan_debt',
                            'label' => 'Student loan debt',
                            'type' => 'number',
                            'prefix' => '£',
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
                            'name' => 'student_loan',
                            'label' => 'Student loan',
                            'type' => 'select',
                            'options' => ['Plan 1: Pre-2012' => '0', 'Plan 2: Post-2012' => '1', 'Plan 4: Scottish students (post-1998)' => '2'],
                            'default' => 'Plan 1: Pre-2012',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Marginal tax rates',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mar_tax',
                            'label' => 'Mar tax',
                            'type' => 'number',
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
                                ['when' => null, 'text' => <<<'TXT'
                                With a total annual income of £{{total_income.formattedValue}}, the total tax you have to pay after taking into account personal tax allowance of £{{pta.formattedValue}} are made up of: Income tax: £{{income_tax_0.formattedValue}} National insurance: £{{ni_0.formattedValue}}
                                TXT],
                                ['when' => 'employment_income > 0', 'text' => 'Tax and national insurance will be deducted by your employer.'],
                                ['when' => 'self_employment_income > 0 and rental_income > 0', 'text' => 'As you are self-employed and have rental income, you will need to pay an additional tax of £{{ni_se_0.formattedValue}}.'],
                                ['when' => 'self_employment_income > 0 and rental_income == 0', 'text' => 'As you are self-employed, you will need to pay an additional tax of £{{ni_se_0.formattedValue}}.'],
                                ['when' => 'self_employment_income == 0 and rental_income > 0', 'text' => 'As you have rental income, you will need to pay an additional tax of £{{ni_se_0.formattedValue}}.'],
                                ['when' => null, 'text' => <<<'TXT'
                                As a result, you are paying a total tax of £{{total_tax_paid_0.formattedValue}} and your take-home pay is £{{take_home_pay_0.formattedValue}} and your effective tax rate is {{eff_tax_rate_0.formattedValue}}%.
                                TXT],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => null, 'text' => <<<'TXT'
                                With a total annual income of £{{total_income.formattedValue}}, the total tax you have to pay after taking into account personal tax allowance of £{{pta.formattedValue}} are made up of: Income tax: £{{income_tax_1.formattedValue}} National insurance: £{{ni_1.formattedValue}}
                                TXT],
                                ['when' => 'employment_income > 0', 'text' => 'Tax and national insurance will be deducted by your employer.'],
                                ['when' => 'self_employment_income > 0 and rental_income > 0', 'text' => 'As you are self-employed and have rental income, you will need to pay an additional tax of £{{ni_se_1.formattedValue}}.'],
                                ['when' => 'self_employment_income > 0 and rental_income == 0', 'text' => 'As you are self-employed, you will need to pay an additional tax of £{{ni_se_1.formattedValue}}.'],
                                ['when' => 'self_employment_income == 0 and rental_income > 0', 'text' => 'As you have rental income, you will need to pay an additional tax of £{{ni_se_1.formattedValue}}.'],
                                ['when' => null, 'text' => <<<'TXT'
                                As a result, you are paying a total tax of £{{total_tax_paid_1.formattedValue}} and your take-home pay is £{{take_home_pay_1.formattedValue}} and your effective tax rate is {{eff_tax_rate_1.formattedValue}}%.
                                TXT],
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
                            'name' => 'pta',
                            'label' => 'Pta',
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
                            'name' => 'ni_0',
                            'label' => 'Ni 0',
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
                            'name' => 'ni_1',
                            'label' => 'Ni 1',
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
                            'name' => 'ni_se_0',
                            'label' => 'Ni se 0',
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
                            'name' => 'ni_se_1',
                            'label' => 'Ni se 1',
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
                            'name' => 'total_tax_paid_0',
                            'label' => 'Total tax paid 0',
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
                            'name' => 'total_tax_paid_1',
                            'label' => 'Total tax paid 1',
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
                            'name' => 'take_home_pay_0',
                            'label' => 'Take home pay 0',
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
                            'name' => 'take_home_pay_1',
                            'label' => 'Take home pay 1',
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
                            'name' => 'eff_tax_rate_0',
                            'label' => 'Eff tax rate 0',
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
                            'name' => 'eff_tax_rate_1',
                            'label' => 'Eff tax rate 1',
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
                            'name' => 'income_tax_0',
                            'label' => 'Income tax 0',
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
                            'name' => 'income_tax_1',
                            'label' => 'Income tax 1',
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
            'title' => 'total_income = employment_income + self_employment_income + rental_income ',
            'results' => ['total_income' => 'employment_income + rental_income + self_employment_income', 'rental_income' => '-employment_income - self_employment_income + total_income', 'employment_income' => '-rental_income - self_employment_income + total_income', 'self_employment_income' => '-employment_income - rental_income + total_income'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("get_pta",function(total_income){var pta=0;if(total_income<=100000){pta=12570}else if(total_income<=125000){pta=12570-(total_income-100000)/2}else{pta=0}return pta});omni.define("get_ni_0",function(employment_income,self_employment_income,rental_income){var se_rental_income=self_employment_income+rental_income;var ni_se_2_thres=6515;var ni_se_2_rate=163.8;var ni_se_4_thres=[12570,50270];var ni_se_4_rates=[0.1025,0.0325];var ni_em_thres=[11904,50270];var ni_em_rates=[0.1273,0.0273];var ni=0;var ni_em=0;var ni_se=0;var ni_se_2=0;var ni_se_4=0;if(se_rental_income>=ni_se_2_thres){ni_se_2=ni_se_2_rate}if(se_rental_income>0){if(se_rental_income<ni_se_4_thres[0]){ni_se_4=0}else if(se_rental_income<ni_se_4_thres[1]){ni_se_4=(se_rental_income-ni_se_4_thres[0])*ni_se_4_rates[0]}else{ni_se_4=(se_rental_income-ni_se_4_thres[1])*ni_se_4_rates[1]+(ni_se_4_thres[1]-ni_se_4_thres[0])*ni_se_4_rates[0]}}ni_se=ni_se_2+ni_se_4;if(employment_income>0){if(employment_income<ni_em_thres[0]){ni_em=0}else if(employment_income<ni_em_thres[1]){ni_em=(employment_income-ni_em_thres[0])*ni_em_rates[0]}else{ni_em=(employment_income-ni_em_thres[1])*ni_em_rates[1]+(ni_em_thres[1]-ni_em_thres[0])*ni_em_rates[0]}}ni=ni_em+ni_se;return ni});omni.define("get_ni_1",function(employment_income,self_employment_income,rental_income){var se_rental_income=self_employment_income+rental_income;var ni_se_2_thres=6725;var ni_se_2_rate=158.6;var ni_se_4_thres=[9568,50270];var ni_se_4_rates=[0.09,0.02];var ni_em_thres=[9564,50268];var ni_em_rates=[0.12,0.02];var ni=0;var ni_em=0;var ni_se=0;var ni_se_2=0;var ni_se_4=0;if(se_rental_income>=ni_se_2_thres){ni_se_2=ni_se_2_rate}if(se_rental_income>0){if(se_rental_income<ni_se_4_thres[0]){ni_se_4=0}else if(se_rental_income<ni_se_4_thres[1]){ni_se_4=(se_rental_income-ni_se_4_thres[0])*ni_se_4_rates[0]}else{ni_se_4=(se_rental_income-ni_se_4_thres[1])*ni_se_4_rates[1]+(ni_se_4_thres[1]-ni_se_4_thres[0])*ni_se_4_rates[0]}}ni_se=ni_se_2+ni_se_4;if(employment_income>0){if(employment_income<ni_em_thres[0]){ni_em=0}else if(employment_income<ni_em_thres[1]){ni_em=(employment_income-ni_em_thres[0])*ni_em_rates[0]}else{ni_em=(employment_income-ni_em_thres[1])*ni_em_rates[1]+(ni_em_thres[1]-ni_em_thres[0])*ni_em_rates[0]}}ni=ni_em+ni_se;return ni});omni.define("get_ni_se_0",function(employment_income,self_employment_income,rental_income){var se_rental_income=self_employment_income+rental_income;var ni_se_2_thres=6515;var ni_se_2_rate=163.8;var ni_se_4_thres=[12570,50270];var ni_se_4_rates=[0.1025,0.0325];var ni_em_thres=[11904,50270];var ni_em_rates=[0.1273,0.0273];var ni_em=0;var ni_se=0;var ni_se_2=0;var ni_se_4=0;if(se_rental_income>=ni_se_2_thres){ni_se_2=ni_se_2_rate}if(se_rental_income>0){if(se_rental_income<ni_se_4_thres[0]){ni_se_4=0}else if(se_rental_income<ni_se_4_thres[1]){ni_se_4=(se_rental_income-ni_se_4_thres[0])*ni_se_4_rates[0]}else{ni_se_4=(se_rental_income-ni_se_4_thres[1])*ni_se_4_rates[1]+(ni_se_4_thres[1]-ni_se_4_thres[0])*ni_se_4_rates[0]}}ni_se=ni_se_2+ni_se_4;if(employment_income>0){if(employment_income<ni_em_thres[0]){ni_em=0}else if(employment_income<ni_em_thres[1]){ni_em=(employment_income-ni_em_thres[0])*ni_em_rates[0]}else{ni_em=(employment_income-ni_em_thres[1])*ni_em_rates[1]+(ni_em_thres[1]-ni_em_thres[0])*ni_em_rates[0]}}return ni_se});omni.define("get_ni_se_1",function(employment_income,self_employment_income,rental_income){var se_rental_income=self_employment_income+rental_income;var ni_se_2_thres=6725;var ni_se_2_rate=158.6;var ni_se_4_thres=[9568,50270];var ni_se_4_rates=[0.09,0.02];var ni_em_thres=[9564,50268];var ni_em_rates=[0.12,0.02];var ni_em=0;var ni_se=0;var ni_se_2=0;var ni_se_4=0;if(se_rental_income>=ni_se_2_thres){ni_se_2=ni_se_2_rate}if(se_rental_income>0){if(se_rental_income<ni_se_4_thres[0]){ni_se_4=0}else if(se_rental_income<ni_se_4_thres[1]){ni_se_4=(se_rental_income-ni_se_4_thres[0])*ni_se_4_rates[0]}else{ni_se_4=(se_rental_income-ni_se_4_thres[1])*ni_se_4_rates[1]+(ni_se_4_thres[1]-ni_se_4_thres[0])*ni_se_4_rates[0]}}ni_se=ni_se_2+ni_se_4;if(employment_income>0){if(employment_income<ni_em_thres[0]){ni_em=0}else if(employment_income<ni_em_thres[1]){ni_em=(employment_income-ni_em_thres[0])*ni_em_rates[0]}else{ni_em=(employment_income-ni_em_thres[1])*ni_em_rates[1]+(ni_em_thres[1]-ni_em_thres[0])*ni_em_rates[0]}}return ni_se});omni.define("get_total_tax_0",function(location,employment_income,self_employment_income,rental_income,total_income,pta){var se_rental_income=self_employment_income+rental_income;var ni_se_2_thres=6515;var ni_se_2_rate=163.8;var ni_se_4_thres=[12570,50270];var ni_se_4_rates=[0.1025,0.0325];var ni_em_thres=[11904,50270];var ni_em_rates=[0.1273,0.0273];var tax_thres=[50270,150000];var tax_rates=[0.2,0.4,0.45];var sc_tax_thres=[14732,25688,43662,150000];var sc_tax_rates=[0.19,0.2,0.21,0.41,0.46];var ni=0;var ni_em=0;var ni_se=0;var ni_se_2=0;var ni_se_4=0;if(se_rental_income>=ni_se_2_thres){ni_se_2=ni_se_2_rate}if(se_rental_income>0){if(se_rental_income<ni_se_4_thres[0]){ni_se_4=0}else if(se_rental_income<ni_se_4_thres[1]){ni_se_4=(se_rental_income-ni_se_4_thres[0])*ni_se_4_rates[0]}else{ni_se_4=(se_rental_income-ni_se_4_thres[1])*ni_se_4_rates[1]+(ni_se_4_thres[1]-ni_se_4_thres[0])*ni_se_4_rates[0]}}ni_se=ni_se_2+ni_se_4;if(employment_income>0){if(employment_income<ni_em_thres[0]){ni_em=0}else if(employment_income<ni_em_thres[1]){ni_em=(employment_income-ni_em_thres[0])*ni_em_rates[0]}else{ni_em=(employment_income-ni_em_thres[1])*ni_em_rates[1]+(ni_em_thres[1]-ni_em_thres[0])*ni_em_rates[0]}}ni=ni_em+ni_se;var income_tax=0;if(location===1){if(total_income<pta){income_tax=0}else if(total_income<sc_tax_thres[0]){income_tax=(total_income-pta)*sc_tax_rates[0]}else if(total_income<sc_tax_thres[1]){income_tax=(sc_tax_thres[0]-pta)*sc_tax_rates[0]+(total_income-sc_tax_thres[0])*sc_tax_rates[1]}else if(total_income<sc_tax_thres[2]){income_tax=(sc_tax_thres[0]-pta)*sc_tax_rates[0]+(sc_tax_thres[1]-sc_tax_thres[0])*sc_tax_rates[1]+(total_income-sc_tax_thres[1])*sc_tax_rates[2]}else if(total_income<sc_tax_thres[3]){income_tax=(sc_tax_thres[0]-pta)*sc_tax_rates[0]+(sc_tax_thres[1]-sc_tax_thres[0])*sc_tax_rates[1]+(sc_tax_thres[2]-sc_tax_thres[1])*sc_tax_rates[2]+(total_income-sc_tax_thres[2])*sc_tax_rates[3]}else{income_tax=(sc_tax_thres[0]-pta)*sc_tax_rates[0]+(sc_tax_thres[1]-sc_tax_thres[0])*sc_tax_rates[1]+(sc_tax_thres[2]-sc_tax_thres[1])*sc_tax_rates[2]+(sc_tax_thres[3]-sc_tax_thres[2])*sc_tax_rates[3]+(total_income-sc_tax_thres[3])*sc_tax_rates[4]}}else{if(total_income<=pta){income_tax=0}else if(total_income<tax_thres[0]){income_tax=(total_income-pta)*tax_rates[0]}else if(total_income<tax_thres[1]){income_tax=(tax_thres[0]-pta)*tax_rates[0]+(total_income-tax_thres[0])*tax_rates[1]}else{income_tax=(tax_thres[0]-pta)*tax_rates[0]+(tax_thres[1]-tax_thres[0])*tax_rates[1]+(total_income-tax_thres[1])*tax_rates[2]}}var take_home_pay=total_income-ni-income_tax;var total_tax_paid=total_income-take_home_pay;return total_tax_paid});omni.define("get_take_home_pay_0",function(location,employment_income,self_employment_income,rental_income,total_income,pta){var se_rental_income=self_employment_income+rental_income;var ni_se_2_thres=6515;var ni_se_2_rate=163.8;var ni_se_4_thres=[12570,50270];var ni_se_4_rates=[0.1025,0.0325];var ni_em_thres=[11904,50270];var ni_em_rates=[0.1273,0.0273];var tax_thres=[50270,150000];var tax_rates=[0.2,0.4,0.45];var sc_tax_thres=[14732,25688,43662,150000];var sc_tax_rates=[0.19,0.2,0.21,0.41,0.46];var ni=0;var ni_em=0;var ni_se=0;var ni_se_2=0;var ni_se_4=0;if(se_rental_income>=ni_se_2_thres){ni_se_2=ni_se_2_rate}if(se_rental_income>0){if(se_rental_income<ni_se_4_thres[0]){ni_se_4=0}else if(se_rental_income<ni_se_4_thres[1]){ni_se_4=(se_rental_income-ni_se_4_thres[0])*ni_se_4_rates[0]}else{ni_se_4=(se_rental_income-ni_se_4_thres[1])*ni_se_4_rates[1]+(ni_se_4_thres[1]-ni_se_4_thres[0])*ni_se_4_rates[0]}}ni_se=ni_se_2+ni_se_4;if(employment_income>0){if(employment_income<ni_em_thres[0]){ni_em=0}else if(employment_income<ni_em_thres[1]){ni_em=(employment_income-ni_em_thres[0])*ni_em_rates[0]}else{ni_em=(employment_income-ni_em_thres[1])*ni_em_rates[1]+(ni_em_thres[1]-ni_em_thres[0])*ni_em_rates[0]}}ni=ni_em+ni_se;var income_tax=0;if(location===1){if(total_income<pta){income_tax=0}else if(total_income<sc_tax_thres[0]){income_tax=(total_income-pta)*sc_tax_rates[0]}else if(total_income<sc_tax_thres[1]){income_tax=(sc_tax_thres[0]-pta)*sc_tax_rates[0]+(total_income-sc_tax_thres[0])*sc_tax_rates[1]}else if(total_income<sc_tax_thres[2]){income_tax=(sc_tax_thres[0]-pta)*sc_tax_rates[0]+(sc_tax_thres[1]-sc_tax_thres[0])*sc_tax_rates[1]+(total_income-sc_tax_thres[1])*sc_tax_rates[2]}else if(total_income<sc_tax_thres[3]){income_tax=(sc_tax_thres[0]-pta)*sc_tax_rates[0]+(sc_tax_thres[1]-sc_tax_thres[0])*sc_tax_rates[1]+(sc_tax_thres[2]-sc_tax_thres[1])*sc_tax_rates[2]+(total_income-sc_tax_thres[2])*sc_tax_rates[3]}else{income_tax=(sc_tax_thres[0]-pta)*sc_tax_rates[0]+(sc_tax_thres[1]-sc_tax_thres[0])*sc_tax_rates[1]+(sc_tax_thres[2]-sc_tax_thres[1])*sc_tax_rates[2]+(sc_tax_thres[3]-sc_tax_thres[2])*sc_tax_rates[3]+(total_income-sc_tax_thres[3])*sc_tax_rates[4]}}else{if(total_income<=pta){income_tax=0}else if(total_income<tax_thres[0]){income_tax=(total_income-pta)*tax_rates[0]}else if(total_income<tax_thres[1]){income_tax=(tax_thres[0]-pta)*tax_rates[0]+(total_income-tax_thres[0])*tax_rates[1]}else{income_tax=(tax_thres[0]-pta)*tax_rates[0]+(tax_thres[1]-tax_thres[0])*tax_rates[1]+(total_income-tax_thres[1])*tax_rates[2]}}var take_home_pay=total_income-ni-income_tax;return take_home_pay});omni.define("get_income_tax_0",function(location,employment_income,self_employment_income,rental_income,total_income,pta){var se_rental_income=self_employment_income+rental_income;var ni_se_2_thres=6515;var ni_se_2_rate=163.8;var ni_se_4_thres=[12570,50270];var ni_se_4_rates=[0.1025,0.0325];var ni_em_thres=[11904,50270];var ni_em_rates=[0.1273,0.0273];var tax_thres=[50270,150000];var tax_rates=[0.2,0.4,0.45];var sc_tax_thres=[14732,25688,43662,150000];var sc_tax_rates=[0.19,0.2,0.21,0.41,0.46];var ni=0;var ni_em=0;var ni_se=0;var ni_se_2=0;var ni_se_4=0;if(se_rental_income>=ni_se_2_thres){ni_se_2=ni_se_2_rate}if(se_rental_income>0){if(se_rental_income<ni_se_4_thres[0]){ni_se_4=0}else if(se_rental_income<ni_se_4_thres[1]){ni_se_4=(se_rental_income-ni_se_4_thres[0])*ni_se_4_rates[0]}else{ni_se_4=(se_rental_income-ni_se_4_thres[1])*ni_se_4_rates[1]+(ni_se_4_thres[1]-ni_se_4_thres[0])*ni_se_4_rates[0]}}ni_se=ni_se_2+ni_se_4;if(employment_income>0){if(employment_income<ni_em_thres[0]){ni_em=0}else if(employment_income<ni_em_thres[1]){ni_em=(employment_income-ni_em_thres[0])*ni_em_rates[0]}else{ni_em=(employment_income-ni_em_thres[1])*ni_em_rates[1]+(ni_em_thres[1]-ni_em_thres[0])*ni_em_rates[0]}}ni=ni_em+ni_se;var income_tax=0;if(location===1){if(total_income<pta){income_tax=0}else if(total_income<sc_tax_thres[0]){income_tax=(total_income-pta)*sc_tax_rates[0]}else if(total_income<sc_tax_thres[1]){income_tax=(sc_tax_thres[0]-pta)*sc_tax_rates[0]+(total_income-sc_tax_thres[0])*sc_tax_rates[1]}else if(total_income<sc_tax_thres[2]){income_tax=(sc_tax_thres[0]-pta)*sc_tax_rates[0]+(sc_tax_thres[1]-sc_tax_thres[0])*sc_tax_rates[1]+(total_income-sc_tax_thres[1])*sc_tax_rates[2]}else if(total_income<sc_tax_thres[3]){income_tax=(sc_tax_thres[0]-pta)*sc_tax_rates[0]+(sc_tax_thres[1]-sc_tax_thres[0])*sc_tax_rates[1]+(sc_tax_thres[2]-sc_tax_thres[1])*sc_tax_rates[2]+(total_income-sc_tax_thres[2])*sc_tax_rates[3]}else{income_tax=(sc_tax_thres[0]-pta)*sc_tax_rates[0]+(sc_tax_thres[1]-sc_tax_thres[0])*sc_tax_rates[1]+(sc_tax_thres[2]-sc_tax_thres[1])*sc_tax_rates[2]+(sc_tax_thres[3]-sc_tax_thres[2])*sc_tax_rates[3]+(total_income-sc_tax_thres[3])*sc_tax_rates[4]}}else{if(total_income<=pta){income_tax=0}else if(total_income<tax_thres[0]){income_tax=(total_income-pta)*tax_rates[0]}else if(total_income<tax_thres[1]){income_tax=(tax_thres[0]-pta)*tax_rates[0]+(total_income-tax_thres[0])*tax_rates[1]}else{income_tax=(tax_thres[0]-pta)*tax_rates[0]+(tax_thres[1]-tax_thres[0])*tax_rates[1]+(total_income-tax_thres[1])*tax_rates[2]}}return income_tax});omni.define("get_total_tax_1",function(location,employment_income,self_employment_income,rental_income,total_income,pta){var se_rental_income=self_employment_income+rental_income;var ni_se_2_thres=6725;var ni_se_2_rate=158.6;var ni_se_4_thres=[9568,50270];var ni_se_4_rates=[0.09,0.02];var ni_em_thres=[9564,50268];var ni_em_rates=[0.12,0.02];var tax_thres=[50270,150000];var tax_rates=[0.2,0.4,0.45];var sc_tax_thres=[14667,25296,43662,150000];var sc_tax_rates=[0.19,0.2,0.21,0.41,0.46];var ni=0;var ni_em=0;var ni_se=0;var ni_se_2=0;var ni_se_4=0;if(se_rental_income>=ni_se_2_thres){ni_se_2=ni_se_2_rate}if(se_rental_income>0){if(se_rental_income<ni_se_4_thres[0]){ni_se_4=0}else if(se_rental_income<ni_se_4_thres[1]){ni_se_4=(se_rental_income-ni_se_4_thres[0])*ni_se_4_rates[0]}else{ni_se_4=(se_rental_income-ni_se_4_thres[1])*ni_se_4_rates[1]+(ni_se_4_thres[1]-ni_se_4_thres[0])*ni_se_4_rates[0]}}ni_se=ni_se_2+ni_se_4;if(employment_income>0){if(employment_income<ni_em_thres[0]){ni_em=0}else if(employment_income<ni_em_thres[1]){ni_em=(employment_income-ni_em_thres[0])*ni_em_rates[0]}else{ni_em=(employment_income-ni_em_thres[1])*ni_em_rates[1]+(ni_em_thres[1]-ni_em_thres[0])*ni_em_rates[0]}}ni=ni_em+ni_se;var income_tax=0;if(location===1){if(total_income<pta){income_tax=0}else if(total_income<sc_tax_thres[0]){income_tax=(total_income-pta)*sc_tax_rates[0]}else if(total_income<sc_tax_thres[1]){income_tax=(sc_tax_thres[0]-pta)*sc_tax_rates[0]+(total_income-sc_tax_thres[0])*sc_tax_rates[1]}else if(total_income<sc_tax_thres[2]){income_tax=(sc_tax_thres[0]-pta)*sc_tax_rates[0]+(sc_tax_thres[1]-sc_tax_thres[0])*sc_tax_rates[1]+(total_income-sc_tax_thres[1])*sc_tax_rates[2]}else if(total_income<sc_tax_thres[3]){income_tax=(sc_tax_thres[0]-pta)*sc_tax_rates[0]+(sc_tax_thres[1]-sc_tax_thres[0])*sc_tax_rates[1]+(sc_tax_thres[2]-sc_tax_thres[1])*sc_tax_rates[2]+(total_income-sc_tax_thres[2])*sc_tax_rates[3]}else{income_tax=(sc_tax_thres[0]-pta)*sc_tax_rates[0]+(sc_tax_thres[1]-sc_tax_thres[0])*sc_tax_rates[1]+(sc_tax_thres[2]-sc_tax_thres[1])*sc_tax_rates[2]+(sc_tax_thres[3]-sc_tax_thres[2])*sc_tax_rates[3]+(total_income-sc_tax_thres[3])*sc_tax_rates[4]}}else{if(total_income<=pta){income_tax=0}else if(total_income<tax_thres[0]){income_tax=(total_income-pta)*tax_rates[0]}else if(total_income<tax_thres[1]){income_tax=(tax_thres[0]-pta)*tax_rates[0]+(total_income-tax_thres[0])*tax_rates[1]}else{income_tax=(tax_thres[0]-pta)*tax_rates[0]+(tax_thres[1]-tax_thres[0])*tax_rates[1]+(total_income-tax_thres[1])*tax_rates[2]}}var take_home_pay=total_income-ni-income_tax;var total_tax_paid=total_income-take_home_pay;return total_tax_paid});omni.define("get_take_home_pay_1",function(location,employment_income,self_employment_income,rental_income,total_income,pta){var se_rental_income=self_employment_income+rental_income;var ni_se_2_thres=6725;var ni_se_2_rate=158.6;var ni_se_4_thres=[9568,50270];var ni_se_4_rates=[0.09,0.02];var ni_em_thres=[9564,50268];var ni_em_rates=[0.12,0.02];var tax_thres=[50270,150000];var tax_rates=[0.2,0.4,0.45];var sc_tax_thres=[14667,25296,43662,150000];var sc_tax_rates=[0.19,0.2,0.21,0.41,0.46];var ni=0;var ni_em=0;var ni_se=0;var ni_se_2=0;var ni_se_4=0;if(se_rental_income>=ni_se_2_thres){ni_se_2=ni_se_2_rate}if(se_rental_income>0){if(se_rental_income<ni_se_4_thres[0]){ni_se_4=0}else if(se_rental_income<ni_se_4_thres[1]){ni_se_4=(se_rental_income-ni_se_4_thres[0])*ni_se_4_rates[0]}else{ni_se_4=(se_rental_income-ni_se_4_thres[1])*ni_se_4_rates[1]+(ni_se_4_thres[1]-ni_se_4_thres[0])*ni_se_4_rates[0]}}ni_se=ni_se_2+ni_se_4;if(employment_income>0){if(employment_income<ni_em_thres[0]){ni_em=0}else if(employment_income<ni_em_thres[1]){ni_em=(employment_income-ni_em_thres[0])*ni_em_rates[0]}else{ni_em=(employment_income-ni_em_thres[1])*ni_em_rates[1]+(ni_em_thres[1]-ni_em_thres[0])*ni_em_rates[0]}}ni=ni_em+ni_se;var income_tax=0;if(location===1){if(total_income<pta){income_tax=0}else if(total_income<sc_tax_thres[0]){income_tax=(total_income-pta)*sc_tax_rates[0]}else if(total_income<sc_tax_thres[1]){income_tax=(sc_tax_thres[0]-pta)*sc_tax_rates[0]+(total_income-sc_tax_thres[0])*sc_tax_rates[1]}else if(total_income<sc_tax_thres[2]){income_tax=(sc_tax_thres[0]-pta)*sc_tax_rates[0]+(sc_tax_thres[1]-sc_tax_thres[0])*sc_tax_rates[1]+(total_income-sc_tax_thres[1])*sc_tax_rates[2]}else if(total_income<sc_tax_thres[3]){income_tax=(sc_tax_thres[0]-pta)*sc_tax_rates[0]+(sc_tax_thres[1]-sc_tax_thres[0])*sc_tax_rates[1]+(sc_tax_thres[2]-sc_tax_thres[1])*sc_tax_rates[2]+(total_income-sc_tax_thres[2])*sc_tax_rates[3]}else{income_tax=(sc_tax_thres[0]-pta)*sc_tax_rates[0]+(sc_tax_thres[1]-sc_tax_thres[0])*sc_tax_rates[1]+(sc_tax_thres[2]-sc_tax_thres[1])*sc_tax_rates[2]+(sc_tax_thres[3]-sc_tax_thres[2])*sc_tax_rates[3]+(total_income-sc_tax_thres[3])*sc_tax_rates[4]}}else{if(total_income<=pta){income_tax=0}else if(total_income<tax_thres[0]){income_tax=(total_income-pta)*tax_rates[0]}else if(total_income<tax_thres[1]){income_tax=(tax_thres[0]-pta)*tax_rates[0]+(total_income-tax_thres[0])*tax_rates[1]}else{income_tax=(tax_thres[0]-pta)*tax_rates[0]+(tax_thres[1]-tax_thres[0])*tax_rates[1]+(total_income-tax_thres[1])*tax_rates[2]}}var take_home_pay=total_income-ni-income_tax;return take_home_pay});omni.define("get_income_tax_1",function(location,employment_income,self_employment_income,rental_income,total_income,pta){var se_rental_income=self_employment_income+rental_income;var ni_se_2_thres=6725;var ni_se_2_rate=158.6;var ni_se_4_thres=[9568,50270];var ni_se_4_rates=[0.09,0.02];var ni_em_thres=[9564,50268];var ni_em_rates=[0.12,0.02];var tax_thres=[50270,150000];var tax_rates=[0.2,0.4,0.45];var sc_tax_thres=[14667,25296,43662,150000];var sc_tax_rates=[0.19,0.2,0.21,0.41,0.46];var ni=0;var ni_em=0;var ni_se=0;var ni_se_2=0;var ni_se_4=0;if(se_rental_income>=ni_se_2_thres){ni_se_2=ni_se_2_rate}if(se_rental_income>0){if(se_rental_income<ni_se_4_thres[0]){ni_se_4=0}else if(se_rental_income<ni_se_4_thres[1]){ni_se_4=(se_rental_income-ni_se_4_thres[0])*ni_se_4_rates[0]}else{ni_se_4=(se_rental_income-ni_se_4_thres[1])*ni_se_4_rates[1]+(ni_se_4_thres[1]-ni_se_4_thres[0])*ni_se_4_rates[0]}}ni_se=ni_se_2+ni_se_4;if(employment_income>0){if(employment_income<ni_em_thres[0]){ni_em=0}else if(employment_income<ni_em_thres[1]){ni_em=(employment_income-ni_em_thres[0])*ni_em_rates[0]}else{ni_em=(employment_income-ni_em_thres[1])*ni_em_rates[1]+(ni_em_thres[1]-ni_em_thres[0])*ni_em_rates[0]}}ni=ni_em+ni_se;var income_tax=0;if(location===1){if(total_income<pta){income_tax=0}else if(total_income<sc_tax_thres[0]){income_tax=(total_income-pta)*sc_tax_rates[0]}else if(total_income<sc_tax_thres[1]){income_tax=(sc_tax_thres[0]-pta)*sc_tax_rates[0]+(total_income-sc_tax_thres[0])*sc_tax_rates[1]}else if(total_income<sc_tax_thres[2]){income_tax=(sc_tax_thres[0]-pta)*sc_tax_rates[0]+(sc_tax_thres[1]-sc_tax_thres[0])*sc_tax_rates[1]+(total_income-sc_tax_thres[1])*sc_tax_rates[2]}else if(total_income<sc_tax_thres[3]){income_tax=(sc_tax_thres[0]-pta)*sc_tax_rates[0]+(sc_tax_thres[1]-sc_tax_thres[0])*sc_tax_rates[1]+(sc_tax_thres[2]-sc_tax_thres[1])*sc_tax_rates[2]+(total_income-sc_tax_thres[2])*sc_tax_rates[3]}else{income_tax=(sc_tax_thres[0]-pta)*sc_tax_rates[0]+(sc_tax_thres[1]-sc_tax_thres[0])*sc_tax_rates[1]+(sc_tax_thres[2]-sc_tax_thres[1])*sc_tax_rates[2]+(sc_tax_thres[3]-sc_tax_thres[2])*sc_tax_rates[3]+(total_income-sc_tax_thres[3])*sc_tax_rates[4]}}else{if(total_income<=pta){income_tax=0}else if(total_income<tax_thres[0]){income_tax=(total_income-pta)*tax_rates[0]}else if(total_income<tax_thres[1]){income_tax=(tax_thres[0]-pta)*tax_rates[0]+(total_income-tax_thres[0])*tax_rates[1]}else{income_tax=(tax_thres[0]-pta)*tax_rates[0]+(tax_thres[1]-tax_thres[0])*tax_rates[1]+(total_income-tax_thres[1])*tax_rates[2]}}return income_tax});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Enter Location, Tax year and Employment income into UK take-home pay and the answer comes back as Total annual income. Nothing is looked up on this page: total annual income is computed from location and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the UK take-home pay calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind UK take-home pay: it takes 22 numbers and reports Total annual income.</p><p>Written with the labels from the form, Total annual income = Employment income + Rental net income + Self-employment net income.</p><p>The answers are Total annual income; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 22 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Location</strong> — a plain number, no unit</li><li><strong>Tax year</strong> — a plain number, no unit</li><li><strong>Employment income</strong> — a plain number, no unit</li><li><strong>Self-employment net income</strong> — a plain number, no unit</li><li><strong>Rental net income</strong> — a plain number, no unit</li><li><strong>Do you have student loans?</strong> — a plain number, no unit</li><li><strong>Student loan debt</strong> — a plain number, no unit</li><li><strong>Student loan</strong> — a plain number, no unit</li><li><strong>Mar tax</strong> — a plain number, no unit</li><li><strong>Pta</strong> — a plain number, no unit</li><li><strong>Ni 0</strong> — a plain number, no unit</li><li><strong>Ni 1</strong> — a plain number, no unit</li><li><strong>Ni se 0</strong> — a plain number, no unit</li><li><strong>Ni se 1</strong> — a plain number, no unit</li><li><strong>Total tax paid 0</strong> — a plain number, no unit</li><li><strong>Total tax paid 1</strong> — a plain number, no unit</li><li><strong>Take home pay 0</strong> — a plain number, no unit</li><li><strong>Take home pay 1</strong> — a plain number, no unit</li><li><strong>Eff tax rate 0</strong> — in percent</li><li><strong>Eff tax rate 1</strong> — in percent</li><li><strong>Income tax 0</strong> — a plain number, no unit</li><li><strong>Income tax 1</strong> — a plain number, no unit</li></ul><p>The answer comes back as Total annual income. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Eff tax rate 0 lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Total annual income</strong> = <code>Employment income + Rental net income + Self-employment net income</code></li><li><strong>Rental net income</strong> = <code>− Employment income − Self-employment net income + Total annual income</code></li><li><strong>Employment income</strong> = <code>− Rental net income − Self-employment net income + Total annual income</code></li><li><strong>Self-employment net income</strong> = <code>− Employment income − Rental net income + Total annual income</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Total annual income</strong> = <code>Employment income + Rental net income + Self-employment net income</code> — the form to use when Employment income, Rental net income and Self-employment net income are the values you have.</li><li><strong>Rental net income</strong> = <code>− Employment income − Self-employment net income + Total annual income</code> — the form to use when Employment income, Self-employment net income and Total annual income are the values you have.</li><li><strong>Employment income</strong> = <code>− Rental net income − Self-employment net income + Total annual income</code> — the form to use when Rental net income, Self-employment net income and Total annual income are the values you have.</li><li><strong>Self-employment net income</strong> = <code>− Employment income − Rental net income + Total annual income</code> — the form to use when Employment income, Rental net income and Total annual income are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Total annual income, Rental net income and Employment income can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Eff tax rate 0 and Eff tax rate 1 carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Total annual income is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Location left as a guess.</strong> Anything typed into Location is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Tax year left as a guess.</strong> Anything typed into Tax year is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Location and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Location</strong> takes a plain number with no unit attached. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Location is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Tax year</strong> takes a plain number with no unit attached. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Tax year is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Employment income</strong> takes a plain number with no unit attached. It feeds Total annual income, Rental net income and Self-employment net income. Have it to hand before you start: Employment income is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Self-employment net income</strong> takes a plain number with no unit attached. It feeds Total annual income, Rental net income and Employment income. Have it to hand before you start: Self-employment net income is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Rental net income</strong> takes a plain number with no unit attached. It feeds Total annual income, Employment income and Self-employment net income. Have it to hand before you start: Rental net income is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Do you have student loans?</strong> takes a plain number with no unit attached. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Do you have student loans? is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Student loan debt</strong> takes a plain number with no unit attached. Have it to hand before you start: Student loan debt is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Student loan</strong> takes a plain number with no unit attached. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Student loan is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Mar tax</strong> takes a plain number with no unit attached. Have it to hand before you start: Mar tax is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Pta</strong> takes a plain number with no unit attached. Have it to hand before you start: Pta is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Ni 0</strong> takes a plain number with no unit attached. Have it to hand before you start: Ni 0 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Ni 1</strong> takes a plain number with no unit attached. Have it to hand before you start: Ni 1 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Ni se 0</strong> takes a plain number with no unit attached. Have it to hand before you start: Ni se 0 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Ni se 1</strong> takes a plain number with no unit attached. Have it to hand before you start: Ni se 1 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Total tax paid 0</strong> takes a plain number with no unit attached. Have it to hand before you start: Total tax paid 0 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Total tax paid 1</strong> takes a plain number with no unit attached. Have it to hand before you start: Total tax paid 1 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Take home pay 0</strong> takes a plain number with no unit attached. Have it to hand before you start: Take home pay 0 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Take home pay 1</strong> takes a plain number with no unit attached. Have it to hand before you start: Take home pay 1 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Eff tax rate 0</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Have it to hand before you start: Eff tax rate 0 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Eff tax rate 1</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Have it to hand before you start: Eff tax rate 1 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Income tax 0</strong> takes a plain number with no unit attached. Have it to hand before you start: Income tax 0 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Income tax 1</strong> takes a plain number with no unit attached. Have it to hand before you start: Income tax 1 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Total annual income</strong> is a plain number. The value follows from Employment income, Rental net income and Self-employment net income. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Total annual income is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Location, Tax year and Employment income measured, Total annual income wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/basis-point">Basis point Calculator</a>, <a href="/finance/beta-stock">Beta stock</a> and <a href="/finance/bi-weekly-mortgage-payment">Bi-weekly mortgage payment Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the UK take-home pay calculator work out?', 'a' => <<<'TXT'
            Total annual income, from Employment income, Rental net income and Self-employment net income. The relationship is Total annual income = Employment income + Rental net income + Self-employment net income.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Location, Tax year, Employment income, Self-employment net income, Rental net income. With location, tax year and employment income in place, Total annual income can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Total annual income, Rental net income, Employment income and Self-employment net income can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Total annual income is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Location left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Total annual income at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/basis-point', 'name' => 'Basis point Calculator'],
            ['path' => '/finance/beta-stock', 'name' => 'Beta stock'],
            ['path' => '/finance/bi-weekly-mortgage-payment', 'name' => 'Bi-weekly mortgage payment Calculator'],
        ],
        'authors' => [],
    ],
];
