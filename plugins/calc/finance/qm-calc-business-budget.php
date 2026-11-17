<?php

/**
 * Business budget
 * /finance/business-budget
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Business budget',
    'meta' => ['title' => 'Business budget — Formula, Steps & Examples', 'description' => 'Business budget works out total operating income from income 1 and income 2. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Business budget Calculator', 'updated' => '2026-09-03'],
    'sections' => [
        [
            'title' => 'Operating income',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'income_1',
                            'label' => 'Income 1',
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
                            'name' => 'income_2',
                            'label' => 'Income 2',
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
                            'name' => 'income_3',
                            'label' => 'Income 3',
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
                            'name' => 'income_4',
                            'label' => 'Income 4',
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
                            'name' => 'operating_income',
                            'label' => 'Total operating income',
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
            'title' => 'Non-operating income',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'interest_income',
                            'label' => 'Interest income',
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
                            'name' => 'donations',
                            'label' => 'Donations',
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
                            'name' => 'gifts',
                            'label' => 'Gifts',
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
                            'name' => 'grants',
                            'label' => 'Grants',
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
                            'name' => 'other_income',
                            'label' => 'Other income',
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
                            'name' => 'non_operating_income',
                            'label' => 'Total non-operating income',
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
            'title' => 'One-time costs',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'purchase_price',
                            'label' => 'Purchase price',
                            'type' => 'number',
                            'help' => 'Only applicable if buying a business.',
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
                            'name' => 'licenses',
                            'label' => 'Licenses',
                            'type' => 'number',
                            'help' => 'Business licenses and permits.',
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
                            'label' => 'Hardware',
                            'type' => 'number',
                            'help' => 'Computers, printers etc.',
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
                            'label' => 'Software',
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
                            'name' => 'setup',
                            'label' => 'Setup and installation',
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
                            'name' => 'deposits',
                            'label' => 'Deposits',
                            'type' => 'number',
                            'help' => 'Rent, security and utilities deposits.',
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
                            'name' => 'legal_fees',
                            'label' => 'Legal fees',
                            'type' => 'number',
                            'help' => 'Legal and other professional fees.',
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
                            'name' => 'furniture',
                            'label' => 'Furniture',
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
                            'name' => 'decorating',
                            'label' => 'Decorating',
                            'type' => 'number',
                            'help' => 'Decorating your workspace (or remodelling).',
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
                            'name' => 'starting_inventory',
                            'label' => 'Starting inventory',
                            'type' => 'number',
                            'help' => 'Inventory, raw materials, tools etc.',
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
                            'name' => 'company_stationery',
                            'label' => 'Company stationery',
                            'type' => 'number',
                            'help' => 'Business cards, paper etc.',
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
                            'name' => 'advertising_promotion',
                            'label' => 'Advertising/promotion',
                            'type' => 'number',
                            'help' => 'Costs of opening advertisement.',
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
                            'name' => 'operating_cash',
                            'label' => 'Operating cash',
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
                            'name' => 'other_one_time_costs',
                            'label' => 'Other one-time costs',
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
                            'name' => 'one_time_costs',
                            'label' => 'Total one-time costs',
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
            'title' => 'Salaries',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'manager_salary',
                            'label' => 'Owner/manager salary',
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
                            'name' => 'salaries',
                            'label' => 'Salaries',
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
                            'name' => 'commissions',
                            'label' => 'Commissions',
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
                            'name' => 'benefits',
                            'label' => 'Benefits',
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
                            'name' => 'total_salaries',
                            'label' => 'Total salaries',
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
            'title' => 'Monthly expenses',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rent',
                            'label' => 'Rent',
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
                            'name' => 'taxes',
                            'label' => 'Taxes',
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
                            'name' => 'debts',
                            'label' => 'Debts',
                            'type' => 'number',
                            'help' => 'Debts and mortgages.',
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
                            'name' => 'advertising_marketing',
                            'label' => 'Advertising/marketing',
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
                            'name' => 'health_insurance',
                            'label' => 'Health insurance',
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
                            'name' => 'business_insurance',
                            'label' => 'Business insurance',
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
                            'name' => 'professional_fees',
                            'label' => 'Professional fees',
                            'type' => 'number',
                            'help' => 'Legal, consulting and auditing fees.',
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
                            'name' => 'franchise_fees',
                            'label' => 'Franchise fees',
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
                            'name' => 'inventory',
                            'label' => 'Inventory',
                            'type' => 'number',
                            'help' => 'Inventory, raw materials and parts.',
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
                            'name' => 'postage',
                            'label' => 'Postage/shipping',
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
                            'name' => 'leases',
                            'label' => 'Equipment leases',
                            'type' => 'number',
                            'help' => 'Including software licenses.',
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
                            'help' => 'Including car insurance, gas, tickets etc.',
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
                            'name' => 'travel',
                            'label' => 'Travel',
                            'type' => 'number',
                            'help' => 'Business travels.',
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
                            'name' => 'maintenance',
                            'label' => 'Maintenance/repairs',
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
                            'name' => 'utilities',
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
                            'name' => 'telephone',
                            'label' => 'Telephone',
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
                            'name' => 'internet',
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
                            'name' => 'website',
                            'label' => 'Website',
                            'type' => 'number',
                            'help' => 'Hosting and maintenance.',
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
                            'name' => 'subscriptions',
                            'label' => 'Subscriptions/dues',
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
                            'name' => 'office_supplies',
                            'label' => 'Office supplies',
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
                            'name' => 'entertainment',
                            'label' => 'Entertainment',
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
                            'name' => 'miscellaneous',
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
                            'name' => 'monthly_expenses',
                            'label' => 'Total monthly expenses',
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
            'title' => 'Summary',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'initial_investment',
                            'label' => 'Initial investment',
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
                            'name' => 'total_income',
                            'label' => 'Total income',
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
                            'name' => 'total_expenses',
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
                            'name' => 'budget',
                            'label' => 'Budget balance',
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
                            'name' => 'payback_period',
                            'label' => 'Payback period',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'mos',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'As your budget balance is not positive, you will have an infinite payback period, which means it will never get paid back.'],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'operating_income = income_1 + income_2 + income_3 + income_4',
            'results' => [
                'income_2' => '-income_1 - income_3 - income_4 + operating_income',
                'income_3' => '-income_1 - income_2 - income_4 + operating_income',
                'operating_income' => 'income_1 + income_2 + income_3 + income_4',
                'income_4' => '-income_1 - income_2 - income_3 + operating_income',
                'income_1' => '-income_2 - income_3 - income_4 + operating_income',
            ],
        ],
        [
            'title' => 'non_operating_income = interest_income  + gifts + donations + grants  + other_income',
            'results' => [
                'interest_income' => '-donations - gifts - grants + non_operating_income - other_income',
                'donations' => '-gifts - grants - interest_income + non_operating_income - other_income',
                'gifts' => '-donations - grants - interest_income + non_operating_income - other_income',
                'non_operating_income' => 'donations + gifts + grants + interest_income + other_income',
                'other_income' => '-donations - gifts - grants - interest_income + non_operating_income',
                'grants' => '-donations - gifts - interest_income + non_operating_income - other_income',
            ],
        ],
        [
            'title' => <<<'TXT'
            one_time_costs = purchase_price + furniture + hardware + software + setup + company_stationery + decorating  + starting_inventory + deposits + legal_fees + licenses + advertising_promotion + operating_cash + other_one_time_costs
            TXT,
            'results' => [
                'other_one_time_costs' => <<<'TXT'
                -advertising_promotion - company_stationery - decorating - deposits - furniture - hardware - legal_fees - licenses + one_time_costs - operating_cash - purchase_price - setup - software - starting_inventory
                TXT,
                'advertising_promotion' => <<<'TXT'
                -company_stationery - decorating - deposits - furniture - hardware - legal_fees - licenses + one_time_costs - operating_cash - other_one_time_costs - purchase_price - setup - software - starting_inventory
                TXT,
                'deposits' => <<<'TXT'
                -advertising_promotion - company_stationery - decorating - furniture - hardware - legal_fees - licenses + one_time_costs - operating_cash - other_one_time_costs - purchase_price - setup - software - starting_inventory
                TXT,
                'hardware' => <<<'TXT'
                -advertising_promotion - company_stationery - decorating - deposits - furniture - legal_fees - licenses + one_time_costs - operating_cash - other_one_time_costs - purchase_price - setup - software - starting_inventory
                TXT,
                'decorating' => <<<'TXT'
                -advertising_promotion - company_stationery - deposits - furniture - hardware - legal_fees - licenses + one_time_costs - operating_cash - other_one_time_costs - purchase_price - setup - software - starting_inventory
                TXT,
                'setup' => <<<'TXT'
                -advertising_promotion - company_stationery - decorating - deposits - furniture - hardware - legal_fees - licenses + one_time_costs - operating_cash - other_one_time_costs - purchase_price - software - starting_inventory
                TXT,
                'operating_cash' => <<<'TXT'
                -advertising_promotion - company_stationery - decorating - deposits - furniture - hardware - legal_fees - licenses + one_time_costs - other_one_time_costs - purchase_price - setup - software - starting_inventory
                TXT,
                'legal_fees' => <<<'TXT'
                -advertising_promotion - company_stationery - decorating - deposits - furniture - hardware - licenses + one_time_costs - operating_cash - other_one_time_costs - purchase_price - setup - software - starting_inventory
                TXT,
                'starting_inventory' => <<<'TXT'
                -advertising_promotion - company_stationery - decorating - deposits - furniture - hardware - legal_fees - licenses + one_time_costs - operating_cash - other_one_time_costs - purchase_price - setup - software
                TXT,
                'company_stationery' => <<<'TXT'
                -advertising_promotion - decorating - deposits - furniture - hardware - legal_fees - licenses + one_time_costs - operating_cash - other_one_time_costs - purchase_price - setup - software - starting_inventory
                TXT,
                'software' => <<<'TXT'
                -advertising_promotion - company_stationery - decorating - deposits - furniture - hardware - legal_fees - licenses + one_time_costs - operating_cash - other_one_time_costs - purchase_price - setup - starting_inventory
                TXT,
                'one_time_costs' => <<<'TXT'
                advertising_promotion + company_stationery + decorating + deposits + furniture + hardware + legal_fees + licenses + operating_cash + other_one_time_costs + purchase_price + setup + software + starting_inventory
                TXT,
                'furniture' => <<<'TXT'
                -advertising_promotion - company_stationery - decorating - deposits - hardware - legal_fees - licenses + one_time_costs - operating_cash - other_one_time_costs - purchase_price - setup - software - starting_inventory
                TXT,
                'licenses' => <<<'TXT'
                -advertising_promotion - company_stationery - decorating - deposits - furniture - hardware - legal_fees + one_time_costs - operating_cash - other_one_time_costs - purchase_price - setup - software - starting_inventory
                TXT,
                'purchase_price' => <<<'TXT'
                -advertising_promotion - company_stationery - decorating - deposits - furniture - hardware - legal_fees - licenses + one_time_costs - operating_cash - other_one_time_costs - setup - software - starting_inventory
                TXT,
            ],
        ],
        [
            'title' => 'total_salaries = manager_salary + salaries + commissions + benefits',
            'results' => [
                'commissions' => '-benefits - manager_salary - salaries + total_salaries',
                'manager_salary' => '-benefits - commissions - salaries + total_salaries',
                'benefits' => '-commissions - manager_salary - salaries + total_salaries',
                'total_salaries' => 'benefits + commissions + manager_salary + salaries',
                'salaries' => '-benefits - commissions - manager_salary + total_salaries',
            ],
        ],
        [
            'title' => <<<'TXT'
            monthly_expenses = taxes + rent + debts + leases + advertising_marketing + postage + office_supplies + telephone + utilities + internet + maintenance + website + business_insurance + health_insurance + inventory+ professional_fees + franchise_fees + travel + entertainment + subscriptions + transportation + miscellaneous
            TXT,
            'results' => [
                'advertising_marketing' => <<<'TXT'
                -business_insurance - debts - entertainment - franchise_fees - health_insurance - internet - inventory - leases - maintenance - miscellaneous + monthly_expenses - office_supplies - postage - professional_fees - rent - subscriptions - taxes - telephone - transportation - travel - utilities - website
                TXT,
                'monthly_expenses' => <<<'TXT'
                advertising_marketing + business_insurance + debts + entertainment + franchise_fees + health_insurance + internet + inventory + leases + maintenance + miscellaneous + office_supplies + postage + professional_fees + rent + subscriptions + taxes + telephone + transportation + travel + utilities + website
                TXT,
                'postage' => <<<'TXT'
                -advertising_marketing - business_insurance - debts - entertainment - franchise_fees - health_insurance - internet - inventory - leases - maintenance - miscellaneous + monthly_expenses - office_supplies - professional_fees - rent - subscriptions - taxes - telephone - transportation - travel - utilities - website
                TXT,
                'rent' => <<<'TXT'
                -advertising_marketing - business_insurance - debts - entertainment - franchise_fees - health_insurance - internet - inventory - leases - maintenance - miscellaneous + monthly_expenses - office_supplies - postage - professional_fees - subscriptions - taxes - telephone - transportation - travel - utilities - website
                TXT,
                'website' => <<<'TXT'
                -advertising_marketing - business_insurance - debts - entertainment - franchise_fees - health_insurance - internet - inventory - leases - maintenance - miscellaneous + monthly_expenses - office_supplies - postage - professional_fees - rent - subscriptions - taxes - telephone - transportation - travel - utilities
                TXT,
                'business_insurance' => <<<'TXT'
                -advertising_marketing - debts - entertainment - franchise_fees - health_insurance - internet - inventory - leases - maintenance - miscellaneous + monthly_expenses - office_supplies - postage - professional_fees - rent - subscriptions - taxes - telephone - transportation - travel - utilities - website
                TXT,
                'transportation' => <<<'TXT'
                -advertising_marketing - business_insurance - debts - entertainment - franchise_fees - health_insurance - internet - inventory - leases - maintenance - miscellaneous + monthly_expenses - office_supplies - postage - professional_fees - rent - subscriptions - taxes - telephone - travel - utilities - website
                TXT,
                'health_insurance' => <<<'TXT'
                -advertising_marketing - business_insurance - debts - entertainment - franchise_fees - internet - inventory - leases - maintenance - miscellaneous + monthly_expenses - office_supplies - postage - professional_fees - rent - subscriptions - taxes - telephone - transportation - travel - utilities - website
                TXT,
                'entertainment' => <<<'TXT'
                -advertising_marketing - business_insurance - debts - franchise_fees - health_insurance - internet - inventory - leases - maintenance - miscellaneous + monthly_expenses - office_supplies - postage - professional_fees - rent - subscriptions - taxes - telephone - transportation - travel - utilities - website
                TXT,
                'internet' => <<<'TXT'
                -advertising_marketing - business_insurance - debts - entertainment - franchise_fees - health_insurance - inventory - leases - maintenance - miscellaneous + monthly_expenses - office_supplies - postage - professional_fees - rent - subscriptions - taxes - telephone - transportation - travel - utilities - website
                TXT,
                'office_supplies' => <<<'TXT'
                -advertising_marketing - business_insurance - debts - entertainment - franchise_fees - health_insurance - internet - inventory - leases - maintenance - miscellaneous + monthly_expenses - postage - professional_fees - rent - subscriptions - taxes - telephone - transportation - travel - utilities - website
                TXT,
                'travel' => <<<'TXT'
                -advertising_marketing - business_insurance - debts - entertainment - franchise_fees - health_insurance - internet - inventory - leases - maintenance - miscellaneous + monthly_expenses - office_supplies - postage - professional_fees - rent - subscriptions - taxes - telephone - transportation - utilities - website
                TXT,
                'utilities' => <<<'TXT'
                -advertising_marketing - business_insurance - debts - entertainment - franchise_fees - health_insurance - internet - inventory - leases - maintenance - miscellaneous + monthly_expenses - office_supplies - postage - professional_fees - rent - subscriptions - taxes - telephone - transportation - travel - website
                TXT,
                'franchise_fees' => <<<'TXT'
                -advertising_marketing - business_insurance - debts - entertainment - health_insurance - internet - inventory - leases - maintenance - miscellaneous + monthly_expenses - office_supplies - postage - professional_fees - rent - subscriptions - taxes - telephone - transportation - travel - utilities - website
                TXT,
                'leases' => <<<'TXT'
                -advertising_marketing - business_insurance - debts - entertainment - franchise_fees - health_insurance - internet - inventory - maintenance - miscellaneous + monthly_expenses - office_supplies - postage - professional_fees - rent - subscriptions - taxes - telephone - transportation - travel - utilities - website
                TXT,
                'maintenance' => <<<'TXT'
                -advertising_marketing - business_insurance - debts - entertainment - franchise_fees - health_insurance - internet - inventory - leases - miscellaneous + monthly_expenses - office_supplies - postage - professional_fees - rent - subscriptions - taxes - telephone - transportation - travel - utilities - website
                TXT,
                'debts' => <<<'TXT'
                -advertising_marketing - business_insurance - entertainment - franchise_fees - health_insurance - internet - inventory - leases - maintenance - miscellaneous + monthly_expenses - office_supplies - postage - professional_fees - rent - subscriptions - taxes - telephone - transportation - travel - utilities - website
                TXT,
                'subscriptions' => <<<'TXT'
                -advertising_marketing - business_insurance - debts - entertainment - franchise_fees - health_insurance - internet - inventory - leases - maintenance - miscellaneous + monthly_expenses - office_supplies - postage - professional_fees - rent - taxes - telephone - transportation - travel - utilities - website
                TXT,
                'inventory' => <<<'TXT'
                -advertising_marketing - business_insurance - debts - entertainment - franchise_fees - health_insurance - internet - leases - maintenance - miscellaneous + monthly_expenses - office_supplies - postage - professional_fees - rent - subscriptions - taxes - telephone - transportation - travel - utilities - website
                TXT,
                'miscellaneous' => <<<'TXT'
                -advertising_marketing - business_insurance - debts - entertainment - franchise_fees - health_insurance - internet - inventory - leases - maintenance + monthly_expenses - office_supplies - postage - professional_fees - rent - subscriptions - taxes - telephone - transportation - travel - utilities - website
                TXT,
                'professional_fees' => <<<'TXT'
                -advertising_marketing - business_insurance - debts - entertainment - franchise_fees - health_insurance - internet - inventory - leases - maintenance - miscellaneous + monthly_expenses - office_supplies - postage - rent - subscriptions - taxes - telephone - transportation - travel - utilities - website
                TXT,
                'taxes' => <<<'TXT'
                -advertising_marketing - business_insurance - debts - entertainment - franchise_fees - health_insurance - internet - inventory - leases - maintenance - miscellaneous + monthly_expenses - office_supplies - postage - professional_fees - rent - subscriptions - telephone - transportation - travel - utilities - website
                TXT,
                'telephone' => <<<'TXT'
                -advertising_marketing - business_insurance - debts - entertainment - franchise_fees - health_insurance - internet - inventory - leases - maintenance - miscellaneous + monthly_expenses - office_supplies - postage - professional_fees - rent - subscriptions - taxes - transportation - travel - utilities - website
                TXT,
            ],
        ],
        [
            'title' => 'total_income = operating_income + non_operating_income ',
            'results' => ['operating_income' => '-non_operating_income + total_income', 'total_income' => 'non_operating_income + operating_income', 'non_operating_income' => '-operating_income + total_income'],
        ],
        [
            'title' => 'total_expenses = total_salaries + monthly_expenses',
            'results' => ['monthly_expenses' => 'total_expenses - total_salaries', 'total_expenses' => 'monthly_expenses + total_salaries', 'total_salaries' => '-monthly_expenses + total_expenses'],
        ],
        [
            'title' => 'budget = total_income - total_expenses ',
            'results' => ['budget' => '-total_expenses + total_income', 'total_income' => 'budget + total_expenses', 'total_expenses' => '-budget + total_income'],
        ],
        [
            'title' => 'initial_investment = one_time_costs',
            'results' => ['initial_investment' => 'one_time_costs', 'one_time_costs' => 'initial_investment'],
        ],
        [
            'title' => 'payback_period = PP(initial_investment, budget)',
            'results' => ['payback_period' => 'PP(initial_investment, budget)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("PP",function(initial_investment,budget){if(budget>0){return initial_investment/budget}else{return-Infinity}});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Enter Income 1, Income 2 and Income 3 into Business budget and the answer comes back as Total operating income and Interest income. Nothing is looked up on this page: total operating income is computed from income 1 and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Total operating income is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Business budget calculator works', 'html' => <<<'TXT'
            <p>The Business budget calculator applies one relationship to 4 numbers and reports Total operating income, Interest income and Donations.</p><p>In the form&#039;s own words, Total operating income = Income 1 + Income 2 + Income 3 + Income 4.</p><p>The result panel carries Total operating income, Interest income, Donations and Gifts, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>Income 1</strong> — in USD</li><li><strong>Income 2</strong> — in USD</li><li><strong>Income 3</strong> — in USD</li><li><strong>Income 4</strong> — in USD</li></ul><p>The result boxes are Total operating income in USD, Interest income in USD, Donations in USD, Gifts in USD, Grants in USD, Other income in USD, Total non-operating income in USD, Purchase price in USD, Licenses in USD, Hardware in USD, Software in USD, Setup and installation in USD, Deposits in USD, Legal fees in USD, Furniture in USD, Decorating in USD, Starting inventory in USD, Company stationery in USD, Advertising/promotion in USD, Operating cash in USD, Other one-time costs in USD, Total one-time costs in USD, Owner/manager salary in USD, Salaries in USD, Commissions in USD, Benefits in USD, Total salaries in USD, Rent in USD, Taxes in USD, Debts in USD, Advertising/marketing in USD, Health insurance in USD, Business insurance in USD, Professional fees in USD, Franchise fees in USD, Inventory in USD, Postage/shipping in USD, Equipment leases in USD, Transportation in USD, Travel in USD, Maintenance/repairs in USD, Utilities in USD, Telephone in USD, Internet in USD, Website in USD, Subscriptions/dues in USD, Office supplies in USD, Entertainment in USD, Miscellaneous in USD, Total monthly expenses in USD, Initial investment in USD, Total income in USD, Total expenses in USD, Budget balance in USD, Payback period in months; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Income 1 = 10 USD, Income 2 = 100 USD, Income 3 = 1000 USD, Income 4 = 10 USD, Interest income = 100 USD, Donations = 1000 USD, Gifts = 10 USD, Grants = 100 USD, Other income = 1000 USD, Total non-operating income = 10 USD, Purchase price = 100 USD, Licenses = 1000 USD, Hardware = 10 USD, Software = 100 USD, Setup and installation = 1000 USD, Deposits = 10 USD, Legal fees = 100 USD, Furniture = 1000 USD, Decorating = 10 USD, Starting inventory = 100 USD, Company stationery = 1000 USD, Advertising/promotion = 10 USD, Operating cash = 100 USD, Other one-time costs = 1000 USD, Total one-time costs = 10 USD, Owner/manager salary = 100 USD, Salaries = 1000 USD, Commissions = 10 USD, Benefits = 100 USD, Total salaries = 1000 USD, Rent = 10 USD, Taxes = 100 USD, Debts = 1000 USD, Advertising/marketing = 10 USD, Health insurance = 100 USD, Business insurance = 1000 USD, Professional fees = 10 USD, Franchise fees = 100 USD, Inventory = 1000 USD, Postage/shipping = 10 USD, Equipment leases = 100 USD, Transportation = 1000 USD, Travel = 10 USD, Maintenance/repairs = 100 USD, Utilities = 1000 USD, Telephone = 10 USD, Internet = 100 USD, Website = 1000 USD, Subscriptions/dues = 10 USD, Office supplies = 100 USD, Entertainment = 1000 USD, Miscellaneous = 10 USD, Total monthly expenses = 100 USD, Initial investment = 1000 USD, Total income = 10 USD, Total expenses = 100 USD, Budget balance = 1000 USD and Payback period = 10 mos; the answers are <strong>Total operating income</strong> = 1120 USD.</p><ul><li><strong>Total operating income</strong> = 1120 USD</li></ul><p>That is <strong>Total operating income</strong> = <code>Income 1 + Income 2 + Income 3 + Income 4</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Total operating income</strong> = 1120. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Payback period lists 5 options and opens on months. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Total operating income</strong> = <code>Income 1 + Income 2 + Income 3 + Income 4</code></li><li><strong>Income 2</strong> = <code>− Income 1 − Income 3 − Income 4 + Total operating income</code></li><li><strong>Income 3</strong> = <code>− Income 1 − Income 2 − Income 4 + Total operating income</code></li><li><strong>Income 4</strong> = <code>− Income 1 − Income 2 − Income 3 + Total operating income</code></li><li><strong>Income 1</strong> = <code>− Income 2 − Income 3 − Income 4 + Total operating income</code></li><li><strong>Total non-operating income</strong> = <code>Donations + Gifts + Grants + Interest income + Other income</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Total operating income</strong> = <code>Income 1 + Income 2 + Income 3 + Income 4</code> — the form to use when Income 1, Income 2, Income 3 and Income 4 are the values you have.</li><li><strong>Income 2</strong> = <code>− Income 1 − Income 3 − Income 4 + Total operating income</code> — the form to use when Income 1, Income 3, Income 4 and Total operating income are the values you have.</li><li><strong>Income 3</strong> = <code>− Income 1 − Income 2 − Income 4 + Total operating income</code> — the form to use when Income 1, Income 2, Income 4 and Total operating income are the values you have.</li><li><strong>Income 4</strong> = <code>− Income 1 − Income 2 − Income 3 + Total operating income</code> — the form to use when Income 1, Income 2, Income 3 and Total operating income are the values you have.</li><li><strong>Income 1</strong> = <code>− Income 2 − Income 3 − Income 4 + Total operating income</code> — the form to use when Income 2, Income 3, Income 4 and Total operating income are the values you have.</li><li><strong>Total non-operating income</strong> = <code>Donations + Gifts + Grants + Interest income + Other income</code> — the form to use when Donations, Gifts, Grants and Interest income are the values you have.</li><li><strong>Interest income</strong> = <code>− Donations − Gifts − Grants + Total non-operating income − Other income</code> — the form to use when Donations, Gifts, Grants and Total non-operating income are the values you have.</li><li><strong>Donations</strong> = <code>− Gifts − Grants − Interest income + Total non-operating income − Other income</code> — the form to use when Gifts, Grants, Interest income and Total non-operating income are the values you have.</li></ul><p>Any one of Total operating income, Income 2 and Income 3 can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Income 1, from 10 to 20 — and the answers go from <strong>Total operating income</strong> 1120 USD to <strong>Total operating income</strong> 1130 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Total operating income, Interest income and Donations are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Income 1 left as a guess.</strong> Anything typed into Income 1 is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Income 2 left as a guess.</strong> Anything typed into Income 2 is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Income 3 left as a guess.</strong> Anything typed into Income 3 is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Income 1 is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Business budget form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Income 1</strong> takes a plain number with no unit attached. It feeds Income 2, Income 3 and Total operating income. Fill it from a measurement rather than a memory — Income 1 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Income 2</strong> takes a plain number with no unit attached. It feeds Income 3, Total operating income and Income 4. Fill it from a measurement rather than a memory — Income 2 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Income 3</strong> takes a plain number with no unit attached. It feeds Income 2, Total operating income and Income 4. Fill it from a measurement rather than a memory — Income 3 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Income 4</strong> takes a plain number with no unit attached. It feeds Income 2, Income 3 and Total operating income. Fill it from a measurement rather than a memory — Income 4 is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Total operating income is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are months and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Income 1, Income 2 and Income 3 are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Income 1, Income 2 and Income 3 and the number you are missing is Total operating income and Interest income.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/saas-ltv">SaaS lifetime value Calculator</a>, <a href="/finance/sabbatical">Sabbatical Calculator</a> and <a href="/finance/safety-stock">Safety stock Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Business budget is a number to act on, so the useful question is what to do with Total operating income (USD), Interest income (USD) and Donations (USD) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Income 1, Income 2, Income 3 and Income 4 alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Business budget calculator work out?', 'a' => <<<'TXT'
            Total operating income, Interest income, Donations and Gifts, from Income 1, Income 2, Income 3 and Income 4. The relationship is Total operating income = Income 1 + Income 2 + Income 3 + Income 4.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Income 1 (USD), Income 2 (USD), Income 3 (USD), Income 4 (USD). With income 1, income 2 and income 3 in place, Total operating income can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Total operating income, Income 2, Income 3 and Income 4 blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Total operating income = 1120 USD. That comes from the page\'s own defaults, entered in Income 1; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Total operating income is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Income 1 blank and the page solves for it, reporting Total operating income instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Total operating income at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/saas-ltv', 'name' => 'SaaS lifetime value Calculator'],
            ['path' => '/finance/sabbatical', 'name' => 'Sabbatical Calculator'],
            ['path' => '/finance/safety-stock', 'name' => 'Safety stock Calculator'],
        ],
        'authors' => [],
    ],
];
