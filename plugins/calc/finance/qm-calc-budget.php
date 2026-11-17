<?php

/**
 * Budget
 * /finance/budget
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Budget',
    'meta' => ['title' => 'Budget Calculator: Formula, Steps & Examples', 'description' => 'Budget turns salary, tax rate and pension / social security into taxes and income. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Budget Calculator', 'updated' => '2026-09-03'],
    'sections' => [
        [
            'title' => 'Income',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'salary',
                            'label' => 'Salary',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tax_rate',
                            'label' => 'Tax rate',
                            'type' => 'number',
                            'help' => 'Enter 0 for after-tax salary.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pension',
                            'label' => 'Pension / social security',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'monthly_other',
                            'label' => 'Other monthly income',
                            'type' => 'number',
                            'help' => 'Alimony, child suppor etc.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tax_return',
                            'label' => 'Tax return',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'annual_other',
                            'label' => 'Other annual income',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Savings',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'emergency_fund',
                            'label' => 'Emergency fund',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'investments',
                            'label' => 'Investments',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'retirement',
                            'label' => 'Retirement',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'other',
                            'label' => 'Other',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Monthly expenses',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'groceries',
                            'label' => 'Food',
                            'type' => 'number',
                            'help' => 'Groceries, dining out etc.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
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
                            'help' => 'Clothes, jewelery, boots etc.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'shelter',
                            'label' => 'Shelter',
                            'type' => 'number',
                            'help' => 'Rent, mortgages, tax etc.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'utilities',
                            'label' => 'Utilities',
                            'type' => 'number',
                            'help' => 'Electricity, gas, water, heating, cell phone, etc.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
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
                            'help' => 'Insurance, visits, medications, etc.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
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
                            'help' => 'Tickets, gas, parking, etc.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'loans_and_liabilities',
                            'label' => 'Loans and liabilities',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'home_maintenance',
                            'label' => 'Home maintenance',
                            'type' => 'number',
                            'help' => 'Repairs, furniture, etc.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'personal_care',
                            'label' => 'Child care',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'entertainment',
                            'label' => 'Entertainment',
                            'type' => 'number',
                            'help' => 'Hobbies, cinema, etc.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'other2',
                            'label' => 'Other',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Annual expenses',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tuition',
                            'label' => 'Tuition',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'car_insurance',
                            'label' => 'Car insurance',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'home_insurance',
                            'label' => 'Home insurance',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'travel_and_vacation',
                            'label' => 'Travel and vacation',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'taxes',
                            'label' => 'Taxes',
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
                            'name' => 'other3',
                            'label' => 'Other',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Summary',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'income',
                            'label' => 'Income',
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
                            'name' => 'savings',
                            'label' => 'Savings',
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
                            'name' => 'monthly_expenses',
                            'label' => 'Monthly expenses',
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
                            'name' => 'annual_expenses',
                            'label' => 'Annual expenses',
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
                            'name' => 'budget_balance',
                            'label' => 'Monthly budget balance',
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
                            'name' => 'annual_budget_balance',
                            'label' => 'Annual budget balance',
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
    ],
    'formula' => [
        [
            'title' => 'income = salary + monthly_other + pension + annual_other + tax_return',
            'results' => [
                'monthly_other' => '-annual_other + income - pension - salary - tax_return',
                'salary' => '-annual_other + income - monthly_other - pension - tax_return',
                'annual_other' => 'income - monthly_other - pension - salary - tax_return',
                'income' => 'annual_other + monthly_other + pension + salary + tax_return',
                'tax_return' => '-annual_other + income - monthly_other - pension - salary',
                'pension' => '-annual_other + income - monthly_other - salary - tax_return',
            ],
        ],
        [
            'title' => 'savings = emergency_fund + investments + retirement + other',
            'results' => [
                'other' => '-emergency_fund - investments - retirement + savings',
                'emergency_fund' => '-investments - other - retirement + savings',
                'investments' => '-emergency_fund - other - retirement + savings',
                'retirement' => '-emergency_fund - investments - other + savings',
                'savings' => 'emergency_fund + investments + other + retirement',
            ],
        ],
        [
            'title' => 'monthly_expenses = groceries+utilities+transportation+clothing+personal_care+entertainment+home_maintenance+loans_and_liabilities+shelter+health+other2',
            'results' => [
                'home_maintenance' => '-clothing - entertainment - groceries - health - loans_and_liabilities + monthly_expenses - other2 - personal_care - shelter - transportation - utilities',
                'loans_and_liabilities' => '-clothing - entertainment - groceries - health - home_maintenance + monthly_expenses - other2 - personal_care - shelter - transportation - utilities',
                'entertainment' => '-clothing - groceries - health - home_maintenance - loans_and_liabilities + monthly_expenses - other2 - personal_care - shelter - transportation - utilities',
                'clothing' => <<<'TXT'
                -entertainment - groceries - health - home_maintenance - loans_and_liabilities + monthly_expenses - other2 - personal_care - shelter - transportation - utilities
                TXT,
                'transportation' => '-clothing - entertainment - groceries - health - home_maintenance - loans_and_liabilities + monthly_expenses - other2 - personal_care - shelter - utilities',
                'shelter' => <<<'TXT'
                -clothing - entertainment - groceries - health - home_maintenance - loans_and_liabilities + monthly_expenses - other2 - personal_care - transportation - utilities
                TXT,
                'other2' => <<<'TXT'
                -clothing - entertainment - groceries - health - home_maintenance - loans_and_liabilities + monthly_expenses - personal_care - shelter - transportation - utilities
                TXT,
                'personal_care' => '-clothing - entertainment - groceries - health - home_maintenance - loans_and_liabilities + monthly_expenses - other2 - shelter - transportation - utilities',
                'utilities' => '-clothing - entertainment - groceries - health - home_maintenance - loans_and_liabilities + monthly_expenses - other2 - personal_care - shelter - transportation',
                'groceries' => '-clothing - entertainment - health - home_maintenance - loans_and_liabilities + monthly_expenses - other2 - personal_care - shelter - transportation - utilities',
                'monthly_expenses' => 'clothing + entertainment + groceries + health + home_maintenance + loans_and_liabilities + other2 + personal_care + shelter + transportation + utilities',
                'health' => <<<'TXT'
                -clothing - entertainment - groceries - home_maintenance - loans_and_liabilities + monthly_expenses - other2 - personal_care - shelter - transportation - utilities
                TXT,
            ],
        ],
        [
            'title' => 'annual_expenses = tuition + home_insurance + car_insurance + travel_and_vacation +taxes+ other3',
            'results' => [
                'other3' => 'annual_expenses - car_insurance - home_insurance - taxes - travel_and_vacation - tuition',
                'car_insurance' => 'annual_expenses - home_insurance - other3 - taxes - travel_and_vacation - tuition',
                'tuition' => 'annual_expenses - car_insurance - home_insurance - other3 - taxes - travel_and_vacation',
                'taxes' => 'annual_expenses - car_insurance - home_insurance - other3 - travel_and_vacation - tuition',
                'annual_expenses' => 'car_insurance + home_insurance + other3 + taxes + travel_and_vacation + tuition',
                'travel_and_vacation' => 'annual_expenses - car_insurance - home_insurance - other3 - taxes - tuition',
                'home_insurance' => 'annual_expenses - car_insurance - other3 - taxes - travel_and_vacation - tuition',
            ],
        ],
        [
            'title' => 'taxes = salary*tax_rate',
            'results' => ['salary' => 'taxes/tax_rate', 'taxes' => 'salary*tax_rate', 'tax_rate' => 'taxes/salary'],
        ],
        [
            'title' => 'budget_balance= income - savings - monthly_expenses - annual_expenses',
            'results' => [
                'budget_balance' => '-annual_expenses + income - monthly_expenses - savings',
                'annual_expenses' => '-budget_balance + income - monthly_expenses - savings',
                'income' => 'annual_expenses + budget_balance + monthly_expenses + savings',
                'monthly_expenses' => '-annual_expenses - budget_balance + income - savings',
                'savings' => '-annual_expenses - budget_balance + income - monthly_expenses',
            ],
        ],
        [
            'title' => 'annual_budget_balance = 12*budget_balance',
            'results' => ['annual_budget_balance' => '12*budget_balance', 'budget_balance' => '(1/12)*annual_budget_balance'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Salary, Pension / social security and Other monthly income into Budget and the answer comes back as Tax rate and Emergency fund. There is no hidden constant here: change tax rate and salary moves with it. The main result, Tax rate, is reported in percent.
        TXT,
        'sections' => [
            ['title' => 'How the Budget calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Budget: it takes 5 numbers and reports Tax rate, Emergency fund and Investments.</p><p>Written with the labels from the form, Income = Other annual income + Other monthly income + Pension / social security + Salary + Tax return.</p><p>The answers are Tax rate, Emergency fund, Investments and Retirement; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs.</p><ul><li><strong>Salary</strong> — in USD</li><li><strong>Pension / social security</strong> — in USD</li><li><strong>Other monthly income</strong> — in USD. Alimony, child suppor etc.</li><li><strong>Tax return</strong> — in USD</li><li><strong>Other annual income</strong> — in USD</li></ul><p>The result boxes are Tax rate in percent, Emergency fund in USD, Investments in USD, Retirement in USD, Other in USD, Food in USD, Clothing in USD, Shelter in USD, Utilities in USD, Health in USD, Transportation in USD, Loans and liabilities in USD, Home maintenance in USD, Child care in USD, Entertainment in USD, Other in USD, Tuition in USD, Car insurance in USD, Home insurance in USD, Travel and vacation in USD, Taxes in USD, Other in USD, Income in USD, Savings in USD, Monthly expenses in USD, Annual expenses in USD, Monthly budget balance in USD, Annual budget balance in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Salary = 10 USD, Tax rate = 100 perc, Pension / social security = 1000 USD, Other monthly income = 10 USD, Tax return = 100 USD, Other annual income = 1000 USD, Emergency fund = 10 USD, Investments = 100 USD, Retirement = 1000 USD, Other = 10 USD, Food = 100 USD, Clothing = 1000 USD, Shelter = 10 USD, Utilities = 100 USD, Health = 1000 USD, Transportation = 10 USD, Loans and liabilities = 100 USD, Home maintenance = 1000 USD, Child care = 10 USD, Entertainment = 100 USD, Other = 1000 USD, Tuition = 10 USD, Car insurance = 100 USD, Home insurance = 1000 USD, Travel and vacation = 10 USD, Taxes = 100 USD, Other = 1000 USD, Savings = 10 USD, Monthly expenses = 100 USD, Annual expenses = 1000 USD, Monthly budget balance = 10 USD and Annual budget balance = 100 USD gives <strong>Income</strong> = 2120 USD.</p><ul><li><strong>Income</strong> = 2120 USD</li></ul><p>That is <strong>Income</strong> = <code>Other annual income + Other monthly income + Pension / social security + Salary + Tax return</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Income</strong> = 2120. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Tax rate lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Income</strong> = <code>Other annual income + Other monthly income + Pension / social security + Salary + Tax return</code></li><li><strong>Other monthly income</strong> = <code>− Other annual income + Income − Pension / social security − Salary − Tax return</code></li><li><strong>Salary</strong> = <code>− Other annual income + Income − Other monthly income − Pension / social security − Tax return</code></li><li><strong>Other annual income</strong> = <code>Income − Other monthly income − Pension / social security − Salary − Tax return</code></li><li><strong>Tax return</strong> = <code>− Other annual income + Income − Other monthly income − Pension / social security − Salary</code></li><li><strong>Pension / social security</strong> = <code>− Other annual income + Income − Other monthly income − Salary − Tax return</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Income</strong> = <code>Other annual income + Other monthly income + Pension / social security + Salary + Tax return</code> — the form to use when Other annual income, Other monthly income, Pension / social security and Salary are the values you have.</li><li><strong>Other monthly income</strong> = <code>− Other annual income + Income − Pension / social security − Salary − Tax return</code> — the form to use when Other annual income, Income, Pension / social security and Salary are the values you have.</li><li><strong>Salary</strong> = <code>− Other annual income + Income − Other monthly income − Pension / social security − Tax return</code> — the form to use when Other annual income, Income, Other monthly income and Pension / social security are the values you have.</li><li><strong>Other annual income</strong> = <code>Income − Other monthly income − Pension / social security − Salary − Tax return</code> — the form to use when Income, Other monthly income, Pension / social security and Salary are the values you have.</li><li><strong>Tax return</strong> = <code>− Other annual income + Income − Other monthly income − Pension / social security − Salary</code> — the form to use when Other annual income, Income, Other monthly income and Pension / social security are the values you have.</li><li><strong>Pension / social security</strong> = <code>− Other annual income + Income − Other monthly income − Salary − Tax return</code> — the form to use when Other annual income, Income, Other monthly income and Salary are the values you have.</li><li><strong>Savings</strong> = <code>Emergency fund + Investments + Other + Retirement</code> — the form to use when Emergency fund, Investments, Other and Retirement are the values you have.</li><li><strong>Other</strong> = <code>− Emergency fund − Investments − Retirement + Savings</code> — the form to use when Emergency fund, Investments, Retirement and Savings are the values you have.</li></ul><p>Any one of Income, Other monthly income and Salary can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Salary from 10 to 20, leaving every other box alone. The panel moves from <strong>Income</strong> 2120 USD to <strong>Income</strong> 2130 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Tax rate, Emergency fund and Investments are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Salary left as a guess.</strong> Anything typed into Salary is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Pension / social security left as a guess.</strong> Anything typed into Pension / social security is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Other monthly income left as a guess.</strong> Anything typed into Other monthly income is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Salary and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Salary</strong> takes a plain number with no unit attached. Change it and Other monthly income, Other annual income and Income changes with it. Have it to hand before you start: Salary is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Pension / social security</strong> takes a plain number with no unit attached. Change it and Other monthly income, Salary and Other annual income changes with it. Have it to hand before you start: Pension / social security is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Other monthly income</strong> takes a plain number with no unit attached. Alimony, child suppor etc. Change it and Salary, Other annual income and Income changes with it. Have it to hand before you start: Other monthly income is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Tax return</strong> takes a plain number with no unit attached. Change it and Other monthly income, Salary and Other annual income changes with it. Have it to hand before you start: Tax return is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Other annual income</strong> takes a plain number with no unit attached. Change it and Other monthly income, Salary and Income changes with it. Have it to hand before you start: Other annual income is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Tax rate is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Salary, Pension / social security and Other monthly income and the number you are missing is Tax rate and Emergency fund.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/bradford-factor">Bradford factor Calculator</a>, <a href="/finance/break-even">Break even</a> and <a href="/finance/brexit">Brexit Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Budget is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Salary, Pension / social security, Other monthly income and Tax return beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Budget calculator work out?', 'a' => <<<'TXT'
            Tax rate, Emergency fund, Investments and Retirement, from Other annual income, Other monthly income, Pension / social security and Salary. The relationship is Income = Other annual income + Other monthly income + Pension / social security + Salary + Tax return.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Salary (USD), Pension / social security (USD), Other monthly income (USD), Tax return (USD), Other annual income (USD). With salary, pension / social security and other monthly income in place, Tax rate can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Income, Other monthly income, Salary and Other annual income blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Income = 2120 USD. Those are the defaults written into the form — move Salary and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Tax rate is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Salary left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Tax rate keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/bradford-factor', 'name' => 'Bradford factor Calculator'],
            ['path' => '/finance/break-even', 'name' => 'Break even'],
            ['path' => '/finance/brexit', 'name' => 'Brexit Calculator'],
        ],
        'authors' => [],
    ],
];
