<?php

/**
 * Remote vs. on-location workers (non-salary costs)
 * /finance/remote-vs-on-location-workers
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Remote vs. on-location workers (non-salary costs)',
    'meta' => ['title' => 'Remote vs. on-location workers (non-salary costs)', 'description' => 'Remote vs. on-location workers (non-salary costs) works out recurring expenses and total one-time expenses from period of comparison and number of employees.', 'h1' => 'Remote vs. on-location workers (non-salary costs) Calculator', 'updated' => '2026-09-21'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'periods',
                            'label' => 'Period of comparison',
                            'type' => 'number',
                            'help' => 'Set a time interval to compare with the annual cost.',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Remote work allowances per employee',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'numberOfEmployees',
                            'label' => 'Number of employees',
                            'type' => 'number',
                            'suffix' => 'person(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'OneTime',
                            'label' => 'One-time allowances',
                            'type' => 'number',
                            'help' => 'Add here items such as furniture allowance, for example.',
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
                            'name' => 'Stationary',
                            'label' => 'Stationary',
                            'type' => 'number',
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
                            'name' => 'Internet',
                            'label' => 'Internet',
                            'type' => 'number',
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
                            'name' => 'Miscellaneous',
                            'label' => 'Miscellaneous',
                            'type' => 'number',
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
                            'name' => 'add_cost',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Show additional cost items' => '1'],
                            'dataset' => 'addCost',
                            'control' => 'CHECKBOX',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'TechOffice',
                            'label' => 'Tech office',
                            'type' => 'number',
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
                            'name' => 'Cellphone',
                            'label' => 'Cellphone',
                            'type' => 'number',
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
                            'name' => 'Utilities',
                            'label' => 'Utilities',
                            'type' => 'number',
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
                            'name' => 'Learning',
                            'label' => 'Learning',
                            'type' => 'number',
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
                            'name' => 'Wellness',
                            'label' => 'Wellness',
                            'type' => 'number',
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
                            'name' => 'RecCost',
                            'label' => 'Recurring expenses',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'On-location work costs',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'numberOfEmployees_2',
                            'label' => 'Number of employees',
                            'type' => 'number',
                            'suffix' => 'persons',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'officeSpace',
                            'label' => 'Office space',
                            'type' => 'select',
                            'options' => ['Lease' => '1', 'Own' => '0'],
                            'dataset' => 'officeSpace',
                            'default' => 'Lease',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'OneTime_2',
                            'label' => 'Total one-time expenses',
                            'type' => 'number',
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
                            'name' => 'officeLease',
                            'label' => 'Office lease',
                            'type' => 'number',
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
                            'name' => 'Stationary_2',
                            'label' => 'Stationary',
                            'type' => 'number',
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
                            'name' => 'Internet_2',
                            'label' => 'Internet',
                            'type' => 'number',
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
                            'name' => 'Miscellaneous_2',
                            'label' => 'Miscellaneous',
                            'type' => 'number',
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
                            'name' => 'add_cost_2',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Show additional cost items' => '1'],
                            'dataset' => 'addCost',
                            'control' => 'CHECKBOX',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'furniture',
                            'label' => 'Furniture cost',
                            'type' => 'number',
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
                            'name' => 'software',
                            'label' => 'Software cost',
                            'type' => 'number',
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
                            'name' => 'hardware',
                            'label' => 'Hardware cost',
                            'type' => 'number',
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
                            'name' => 'Cellphone_2',
                            'label' => 'Cellphone',
                            'type' => 'number',
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
                            'name' => 'Utilities_2',
                            'label' => 'Utilities',
                            'type' => 'number',
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
                            'name' => 'learning',
                            'label' => 'Learning stipend',
                            'type' => 'number',
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
                            'name' => 'health',
                            'label' => 'Health',
                            'type' => 'number',
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
                            'name' => 'transportation',
                            'label' => 'Transportation',
                            'type' => 'number',
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
                            'name' => 'clothing',
                            'label' => 'Clothing',
                            'type' => 'number',
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
                            'name' => 'gym',
                            'label' => 'Gym',
                            'type' => 'number',
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
                            'name' => 'RecCost_2',
                            'label' => 'Recurring expenses',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
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
                            'name' => 'TotalCost',
                            'label' => 'Total expenses',
                            'type' => 'number',
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
                            'name' => 'TotalCost_2',
                            'label' => 'Total expenses',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'remote_pe_py',
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
                            'name' => 'remote_pe_pd',
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
                            'name' => 'location_pe_py',
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
                            'name' => 'location_pe_pd',
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
                            'name' => 'remote_py',
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
                            'name' => 'remote_pd',
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
                            'name' => 'location_py',
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
                            'name' => 'location_pd',
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
                            'name' => 'diff_pe_py',
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
                            'name' => 'diff_pe_pd',
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
                            'name' => 'diff_py',
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
                            'name' => 'diff_pd',
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
            'title' => 'RecCost = TechOffice + Cellphone + Stationary + Internet + Utilities + Learning + Wellness + Miscellaneous',
            'results' => [
                'Stationary' => '-Cellphone - Internet - Learning - Miscellaneous + RecCost - TechOffice - Utilities - Wellness',
                'Utilities' => '-Cellphone - Internet - Learning - Miscellaneous + RecCost - Stationary - TechOffice - Wellness',
                'Internet' => '-Cellphone - Learning - Miscellaneous + RecCost - Stationary - TechOffice - Utilities - Wellness',
                'Learning' => '-Cellphone - Internet - Miscellaneous + RecCost - Stationary - TechOffice - Utilities - Wellness',
                'TechOffice' => '-Cellphone - Internet - Learning - Miscellaneous + RecCost - Stationary - Utilities - Wellness',
                'Wellness' => '-Cellphone - Internet - Learning - Miscellaneous + RecCost - Stationary - TechOffice - Utilities',
                'Miscellaneous' => '-Cellphone - Internet - Learning + RecCost - Stationary - TechOffice - Utilities - Wellness',
                'Cellphone' => '-Internet - Learning - Miscellaneous + RecCost - Stationary - TechOffice - Utilities - Wellness',
                'RecCost' => 'Cellphone + Internet + Learning + Miscellaneous + Stationary + TechOffice + Utilities + Wellness',
            ],
        ],
        [
            'title' => 'TotalCost =  (RecCost * periods  + OneTime) * numberOfEmployees',
            'results' => [
                'OneTime' => '-RecCost*periods + TotalCost/numberOfEmployees',
                'TotalCost' => 'numberOfEmployees*(OneTime + RecCost*periods)',
                'RecCost' => '(-OneTime*numberOfEmployees + TotalCost)/(numberOfEmployees*periods)',
                'periods' => '(-OneTime*numberOfEmployees + TotalCost)/(RecCost*numberOfEmployees)',
                'numberOfEmployees' => 'TotalCost/(OneTime + RecCost*periods)',
            ],
        ],
        [
            'title' => 'OneTime_2 = furniture + hardware + software ',
            'results' => ['hardware' => 'OneTime_2 - furniture - software', 'OneTime_2' => 'furniture + hardware + software', 'furniture' => 'OneTime_2 - hardware - software', 'software' => 'OneTime_2 - furniture - hardware'],
        ],
        [
            'title' => 'RecCost_2 = Cellphone_2 +Internet_2  + Utilities_2 + Stationary_2+ officeLease + learning + transportation + health + gym + clothing + Miscellaneous_2 ',
            'results' => [
                'Cellphone_2' => '-Internet_2 - Miscellaneous_2 + RecCost_2 - Stationary_2 - Utilities_2 - clothing - gym - health - learning - officeLease - transportation',
                'learning' => '-Cellphone_2 - Internet_2 - Miscellaneous_2 + RecCost_2 - Stationary_2 - Utilities_2 - clothing - gym - health - officeLease - transportation',
                'transportation' => '-Cellphone_2 - Internet_2 - Miscellaneous_2 + RecCost_2 - Stationary_2 - Utilities_2 - clothing - gym - health - learning - officeLease',
                'Stationary_2' => '-Cellphone_2 - Internet_2 - Miscellaneous_2 + RecCost_2 - Utilities_2 - clothing - gym - health - learning - officeLease - transportation',
                'Miscellaneous_2' => '-Cellphone_2 - Internet_2 + RecCost_2 - Stationary_2 - Utilities_2 - clothing - gym - health - learning - officeLease - transportation',
                'gym' => '-Cellphone_2 - Internet_2 - Miscellaneous_2 + RecCost_2 - Stationary_2 - Utilities_2 - clothing - health - learning - officeLease - transportation',
                'clothing' => '-Cellphone_2 - Internet_2 - Miscellaneous_2 + RecCost_2 - Stationary_2 - Utilities_2 - gym - health - learning - officeLease - transportation',
                'RecCost_2' => 'Cellphone_2 + Internet_2 + Miscellaneous_2 + Stationary_2 + Utilities_2 + clothing + gym + health + learning + officeLease + transportation',
                'Utilities_2' => '-Cellphone_2 - Internet_2 - Miscellaneous_2 + RecCost_2 - Stationary_2 - clothing - gym - health - learning - officeLease - transportation',
                'officeLease' => '-Cellphone_2 - Internet_2 - Miscellaneous_2 + RecCost_2 - Stationary_2 - Utilities_2 - clothing - gym - health - learning - transportation',
                'Internet_2' => '-Cellphone_2 - Miscellaneous_2 + RecCost_2 - Stationary_2 - Utilities_2 - clothing - gym - health - learning - officeLease - transportation',
                'health' => '-Cellphone_2 - Internet_2 - Miscellaneous_2 + RecCost_2 - Stationary_2 - Utilities_2 - clothing - gym - learning - officeLease - transportation',
            ],
        ],
        [
            'title' => 'TotalCost_2 = RecCost_2 * periods + OneTime_2',
            'results' => ['RecCost_2' => '(-OneTime_2 + TotalCost_2)/periods', 'OneTime_2' => '-RecCost_2*periods + TotalCost_2', 'TotalCost_2' => 'OneTime_2 + RecCost_2*periods', 'periods' => '(-OneTime_2 + TotalCost_2)/RecCost_2'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Remote vs. on-location workers (non-salary costs) takes Tech office, Learning and Wellness and returns Period of comparison and Number of employees. Nothing is looked up on this page: period of comparison is computed from tech office and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Period of comparison is opened in years; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Remote vs. on-location workers (non-salary costs) calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Remote vs. on-location workers (non-salary costs): it takes 8 numbers and reports Period of comparison, Number of employees and One-time allowances.</p><p>The relationship it solves reads Recurring expenses = Cellphone + Internet + Learning + Miscellaneous + Stationary + Tech office + Utilities + Wellness.</p><p>The answers are Period of comparison, Number of employees, One-time allowances and Recurring expenses; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 8 boxes and the page has everything it needs.</p><ul><li><strong>Stationary</strong> — in USD</li><li><strong>Internet</strong> — in USD</li><li><strong>Miscellaneous</strong> — in USD</li><li><strong>Tech office</strong> — in USD</li><li><strong>Cellphone</strong> — in USD</li><li><strong>Utilities</strong> — in USD</li><li><strong>Learning</strong> — in USD</li><li><strong>Wellness</strong> — in USD</li></ul><p>The result boxes are Period of comparison in years, Number of employees in person(s), One-time allowances in USD, Recurring expenses in USD, Total one-time expenses in USD, Office lease in USD, Stationary in USD, Internet in USD, Miscellaneous in USD, Furniture cost in USD, Software cost in USD, Hardware cost in USD, Cellphone in USD, Utilities in USD, Learning stipend in USD, Health in USD, Transportation in USD, Clothing in USD, Gym in USD, Recurring expenses in USD, Total expenses in USD, Total expenses; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Period of comparison offers 5 units and opens on years, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Recurring expenses</strong> = <code>Cellphone + Internet + Learning + Miscellaneous + Stationary + Tech office + Utilities + Wellness</code></li><li><strong>Stationary</strong> = <code>− Cellphone − Internet − Learning − Miscellaneous + Recurring expenses − Tech office − Utilities − Wellness</code></li><li><strong>Utilities</strong> = <code>− Cellphone − Internet − Learning − Miscellaneous + Recurring expenses − Stationary − Tech office − Wellness</code></li><li><strong>Internet</strong> = <code>− Cellphone − Learning − Miscellaneous + Recurring expenses − Stationary − Tech office − Utilities − Wellness</code></li><li><strong>Learning</strong> = <code>− Cellphone − Internet − Miscellaneous + Recurring expenses − Stationary − Tech office − Utilities − Wellness</code></li><li><strong>Tech office</strong> = <code>− Cellphone − Internet − Learning − Miscellaneous + Recurring expenses − Stationary − Utilities − Wellness</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Recurring expenses</strong> = <code>Cellphone + Internet + Learning + Miscellaneous + Stationary + Tech office + Utilities + Wellness</code> — the form to use when Cellphone, Internet, Learning and Miscellaneous are the values you have.</li><li><strong>Stationary</strong> = <code>− Cellphone − Internet − Learning − Miscellaneous + Recurring expenses − Tech office − Utilities − Wellness</code> — the form to use when Cellphone, Internet, Learning and Miscellaneous are the values you have.</li><li><strong>Utilities</strong> = <code>− Cellphone − Internet − Learning − Miscellaneous + Recurring expenses − Stationary − Tech office − Wellness</code> — the form to use when Cellphone, Internet, Learning and Miscellaneous are the values you have.</li><li><strong>Internet</strong> = <code>− Cellphone − Learning − Miscellaneous + Recurring expenses − Stationary − Tech office − Utilities − Wellness</code> — the form to use when Cellphone, Learning, Miscellaneous and Recurring expenses are the values you have.</li><li><strong>Learning</strong> = <code>− Cellphone − Internet − Miscellaneous + Recurring expenses − Stationary − Tech office − Utilities − Wellness</code> — the form to use when Cellphone, Internet, Miscellaneous and Recurring expenses are the values you have.</li><li><strong>Tech office</strong> = <code>− Cellphone − Internet − Learning − Miscellaneous + Recurring expenses − Stationary − Utilities − Wellness</code> — the form to use when Cellphone, Internet, Learning and Miscellaneous are the values you have.</li><li><strong>Wellness</strong> = <code>− Cellphone − Internet − Learning − Miscellaneous + Recurring expenses − Stationary − Tech office − Utilities</code> — the form to use when Cellphone, Internet, Learning and Miscellaneous are the values you have.</li><li><strong>Miscellaneous</strong> = <code>− Cellphone − Internet − Learning + Recurring expenses − Stationary − Tech office − Utilities − Wellness</code> — the form to use when Cellphone, Internet, Learning and Recurring expenses are the values you have.</li></ul><p>Any one of Recurring expenses, Stationary and Utilities can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Period of comparison, Number of employees and One-time allowances are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Stationary left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Stationary is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Internet left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Internet is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Miscellaneous left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Miscellaneous is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Stationary is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Stationary</strong> takes a plain number with no unit attached. The page reads it when it works out Utilities, Internet and Learning. Have it to hand before you start: Stationary is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Internet</strong> takes a plain number with no unit attached. The page reads it when it works out Stationary, Utilities and Learning. Have it to hand before you start: Internet is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Miscellaneous</strong> takes a plain number with no unit attached. The page reads it when it works out Stationary, Utilities and Internet. Have it to hand before you start: Miscellaneous is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Tech office</strong> takes a plain number with no unit attached. The page reads it when it works out Stationary, Utilities and Internet. Have it to hand before you start: Tech office is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Cellphone</strong> takes a plain number with no unit attached. The page reads it when it works out Stationary, Utilities and Internet. Have it to hand before you start: Cellphone is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Utilities</strong> takes a plain number with no unit attached. The page reads it when it works out Stationary, Internet and Learning. Have it to hand before you start: Utilities is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Learning</strong> takes a plain number with no unit attached. The page reads it when it works out Stationary, Utilities and Internet. Have it to hand before you start: Learning is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Wellness</strong> takes a plain number with no unit attached. The page reads it when it works out Stationary, Utilities and Internet. Have it to hand before you start: Wellness is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Stationary, Internet, Miscellaneous and Tech office. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Stationary into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Period of comparison in yrs with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Period of comparison follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover years. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Stationary, Internet and Miscellaneous and the number you are missing is Period of comparison and Number of employees.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/post-judgment-interest">Post judgment interest Calculator</a>, <a href="/finance/post-office-monthly-income-scheme">Post Office Monthly Income Scheme</a> and <a href="/finance/powerball">Powerball</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Remote vs. on-location workers (non-salary costs) calculator work out?', 'a' => <<<'TXT'
            Period of comparison, Number of employees, One-time allowances and Recurring expenses, from Cellphone, Internet, Learning and Miscellaneous. The relationship is Recurring expenses = Cellphone + Internet + Learning + Miscellaneous + Stationary + Tech office + Utilities + Wellness.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Stationary (USD), Internet (USD), Miscellaneous (USD), Tech office (USD), Cellphone (USD). Enter stationary, internet and miscellaneous; Period of comparison is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Recurring expenses, Stationary, Utilities and Internet blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Period of comparison is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Stationary left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Period of comparison at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/post-judgment-interest', 'name' => 'Post judgment interest Calculator'],
            ['path' => '/finance/post-office-monthly-income-scheme', 'name' => 'Post Office Monthly Income Scheme'],
            ['path' => '/finance/powerball', 'name' => 'Powerball'],
        ],
        'authors' => [],
    ],
];
