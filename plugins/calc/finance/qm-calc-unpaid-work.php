<?php

/**
 * Unpaid work
 * /finance/unpaid-work
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Unpaid work',
    'meta' => ['title' => 'Unpaid work Calculator: Formula, Steps & Examples', 'description' => 'Unpaid work works out hourly wage and monthly salary from country and i work.... A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Unpaid work Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => 'My professional work',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'country',
                            'label' => 'Country',
                            'type' => 'select',
                            'options' => ['Australia' => '2236099148', 'Canada' => '1339506812', 'United Kingdom' => '2550140307', 'United States' => '1027987440'],
                            'dataset' => 'DATA',
                            'control' => 'DROPDOWN',
                            'default' => 'United States',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'timeWorked',
                            'label' => 'I work...',
                            'type' => 'number',
                            'suffix' => 'h per week',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'workMode',
                            'label' => 'I know my...',
                            'type' => 'select',
                            'options' => ['hourly wage' => '1', 'weekly salary' => '2', 'monthly salary' => '3'],
                            'default' => 'hourly wage',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'moneyMade',
                            'label' => 'Hourly wage',
                            'type' => 'number',
                            'suffix' => '$/h',
                            'help' => 'What is your hourly wage after tax? If you are currently unemployed, input the average wage you expect to earn.',
                            'rounding' => ['standard', '2'],
                            'default' => '23.33',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'moneyMadeUK',
                            'label' => 'Hourly wage',
                            'type' => 'number',
                            'suffix' => '£/h',
                            'help' => 'What is your hourly wage after tax? If you are currently unemployed, input the average wage you expect to earn.',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'monthlyWage',
                            'label' => 'Monthly salary',
                            'type' => 'number',
                            'suffix' => '$/month',
                            'help' => 'What is your monthly wage after tax? If you are currently unemployed, input the average wage you expect to earn.',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'monthlyWageUK',
                            'label' => 'Monthly salary',
                            'type' => 'number',
                            'suffix' => '£/month',
                            'help' => 'What is your monthly wage after tax? If you are currently unemployed, input the average wage you expect to earn.',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'weeklyWage',
                            'label' => 'Weekly salary',
                            'type' => 'number',
                            'suffix' => '$/week',
                            'help' => 'What is your weekly wage after tax? If you are currently unemployed, input the average wage you expect to earn.',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'weeklyWageUK',
                            'label' => 'Weekly salary',
                            'type' => 'number',
                            'suffix' => '£/week',
                            'help' => 'What is your weekly wage after tax? If you are currently unemployed, input the average wage you expect to earn.',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        You work over 40 hours per week professionally, which is more than a full-time job. Are you sure you can handle this commitment in the long-term? Make sure that you outsource your chores or share them with family members to lower the burden on yourself!
                        TXT],
                    ],
                ],
            ],
        ],
        [
            'title' => 'My unpaid work',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cooking',
                            'label' => ' Meal preparation',
                            'type' => 'number',
                            'help' => 'Meal planning, grocery shopping, preparing meals, and washing up after.',
                            'unit' => '19',
                            'unit_default' => 'wk',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cleaning',
                            'label' => ' Cleaning',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'wk',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'laundry',
                            'label' => ' Laundry',
                            'type' => 'number',
                            'help' => 'Washing, dry cleaning, and ironing.',
                            'unit' => '19',
                            'unit_default' => 'wk',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'childCare',
                            'label' => ' Child care',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'wk',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'schoolwork',
                            'label' => ' Schoolwork',
                            'type' => 'number',
                            'help' => 'Helping your kids with homework or projects.',
                            'unit' => '19',
                            'unit_default' => 'wk',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'adultCare',
                            'label' => '‍ Adult care',
                            'type' => 'number',
                            'help' => 'Taking care of elderly or disabled relatives.',
                            'unit' => '19',
                            'unit_default' => 'wk',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'petCare',
                            'label' => ' Pet care',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'wk',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'transport',
                            'label' => ' Transport',
                            'type' => 'number',
                            'help' => 'Driving your relatives to and fro.',
                            'unit' => '19',
                            'unit_default' => 'wk',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'repairs',
                            'label' => ' Repairs',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'wk',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gardening',
                            'label' => ' Gardening',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'wk',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Average cost of outsourcing',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cookingCost',
                            'label' => 'Meal preparation',
                            'type' => 'result',
                            'suffix' => '$/h',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cleaningCost',
                            'label' => 'Cleaning',
                            'type' => 'result',
                            'suffix' => '$/h',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'laundryCost',
                            'label' => 'Laundry',
                            'type' => 'result',
                            'suffix' => '$/h',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'childCareCost',
                            'label' => 'Child care',
                            'type' => 'result',
                            'suffix' => '$/h',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'schoolworkCost',
                            'label' => 'Schoolwork',
                            'type' => 'result',
                            'suffix' => '$/h',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'adultCarecost',
                            'label' => 'Adult care',
                            'type' => 'result',
                            'suffix' => '$/h',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'petCareCost',
                            'label' => 'Pet care',
                            'type' => 'result',
                            'suffix' => '$/h',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'transportCost',
                            'label' => 'Transport',
                            'type' => 'result',
                            'suffix' => '$/h',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'repairsCost',
                            'label' => 'Repairs',
                            'type' => 'result',
                            'suffix' => '$/h',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gardeningCost',
                            'label' => 'Gardening',
                            'type' => 'result',
                            'suffix' => '$/h',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cookingCostUK',
                            'label' => 'Meal preparation',
                            'type' => 'result',
                            'suffix' => '£/h',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cleaningCostUK',
                            'label' => 'Cleaning',
                            'type' => 'result',
                            'suffix' => '£/h',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'laundryCostUK',
                            'label' => 'Laundry',
                            'type' => 'result',
                            'suffix' => '£/h',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'childCareCostUK',
                            'label' => 'Child care',
                            'type' => 'result',
                            'suffix' => '£/h',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'schoolworkCostUK',
                            'label' => 'Schoolwork',
                            'type' => 'result',
                            'suffix' => '£/h',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'adultCarecostUK',
                            'label' => 'Adult care',
                            'type' => 'result',
                            'suffix' => '£/h',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'petCareCostUK',
                            'label' => 'Pet care',
                            'type' => 'result',
                            'suffix' => '£/h',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'transportCostUK',
                            'label' => 'Transport',
                            'type' => 'result',
                            'suffix' => '£/h',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'repairsCostUK',
                            'label' => 'Repairs',
                            'type' => 'result',
                            'suffix' => '£/h',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gardeningCostUK',
                            'label' => 'Gardening',
                            'type' => 'result',
                            'suffix' => '£/h',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Replacement cost of unpaid work',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'totalTime',
                            'label' => 'Time spent',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'wk',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'totalCost',
                            'label' => 'Value of unpaid work',
                            'type' => 'number',
                            'help' => 'This is how much you\'d have to pay external services providers to get all of your unpaid work done.',
                            'unit' => '19',
                            'unit_default' => 'wk',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'opportunityCost',
                            'label' => 'If I worked, I\'d make',
                            'type' => 'number',
                            'suffix' => '$/wk',
                            'help' => 'If you spent all of your unpaid time working at your job, this is how much money you\'d earn.',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'totalCostUK',
                            'label' => 'Value of unpaid work',
                            'type' => 'number',
                            'help' => 'This is how much you\'d have to pay external services providers to get all of your unpaid work done.',
                            'unit' => '19',
                            'unit_default' => 'wk',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'opportunityCostUK',
                            'label' => 'If I worked, I\'d make',
                            'type' => 'number',
                            'suffix' => '£/wk',
                            'help' => 'If you spent all of your unpaid time working at your job, this is how much money you\'d earn.',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'totalCost < opportunityCost', 'text' => <<<'TXT'
                                The value of your unpaid work is less than the amount you'd earn at your job over the same period of time.&nbsp; Try to either outsource some of this work to external service providers or share the responsibilities with your family — this way, you'll find more time for professional or personal development, and improve your family's finances!
                                TXT],
                                ['when' => 'totalCost == opportunityCost', 'text' => <<<'TXT'
                                The value your unpaid work is equal to the amount you'd earn at your job over the same period of time.&nbsp; Remember that if you outsource some of this work to external service providers or share the responsibilities with your family, you'll have a chance for professional or personal development!
                                TXT],
                                ['when' => 'totalCost >  opportunityCost', 'text' => <<<'TXT'
                                The value of your unpaid work is greater than the amount you'd earn at your job over the same period of time.&nbsp; While it might be better for your household finances to not outsource these tasks to external providers, consider sharing your chores with other family members for a chance to develop professionally or personally!
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
                                ['when' => 'totalCost < opportunityCost', 'text' => <<<'TXT'
                                The value of your unpaid work is less than the amount you'd earn at your job over the same period of time. Try to either outsource some of this work to external service providers or share the responsibilities with your family — this way, you'll lessen the burden on yourself and will be able to focus on professional or personal development!
                                TXT],
                                ['when' => 'totalCost == opportunityCost', 'text' => <<<'TXT'
                                The value of your unpaid work is equal to the amount you'd earn at your job over the same period of time. Remember that if you outsource some of this work to external service providers or share the responsibilities with your family, you'll lessen the burden on yourself and will be able to focus on professional or personal development!
                                TXT],
                                ['when' => 'totalCost > opportunityCost', 'text' => <<<'TXT'
                                The value of your unpaid work is greater than the amount you'd earn at your job over the same period of time. While it might be better for your household finances to not outsource these tasks to external providers, consider sharing your chores with other family members to lower the burden on yourself and focus on professional or personal development!
                                TXT],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'My opportunities',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tasksOutsourced',
                            'label' => 'I want to outsource',
                            'type' => 'number',
                            'help' => 'How many hours of your unpaid work are you willing to contract out to external services?',
                            'unit' => '19',
                            'unit_default' => 'wk',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tasksDelegated',
                            'label' => 'My family will share',
                            'type' => 'number',
                            'help' => 'How many hours of your unpaid work will be taken over by members of your household?',
                            'unit' => '19',
                            'unit_default' => 'wk',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
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
                                Hypothetical scenario: you ask family members to take over an additional {{tasksDelegated.formattedValue}} hours per week. You also start working at your job for {{tasksDelegated.formattedValue}} hours per week.
                                TXT],
                                ['when' => 'tasksOutsourced !=0', 'text' => <<<'TXT'
                                Hypothetical scenario: you outsource {{tasksOutsourced.formattedValue}} hours of housework per week to external paid services. You also start working at your job for {{tasksOutsourced.formattedValue}} hours per week.
                                TXT],
                                ['when' => 'tasksOutsourced != 0 and tasksDelegated != 0', 'text' => <<<'TXT'
                                Hypothetical scenario: you outsource {{tasksOutsourced.formattedValue}} hours of housework per week to external paid services and ask family members to take over an additional {{tasksDelegated.formattedValue}} hours per week. You also start working at your job for {{totalTask.formattedValue}} hours per week.
                                TXT],
                                ['when' => 'netProfit <= 0 and country != 2550140307', 'text' => <<<'TXT'
                                This scenario allows you to develop professionally, but at a financial cost. On top of what you'll earn, you will need to pay an additional ${{MINUSnetProfit.formattedValue}} a week to cover the costs of external services which substitute your unpaid work.&nbsp;
                                TXT],
                                ['when' => 'netProfit > 0 and  country != 2550140307', 'text' => <<<'TXT'
                                This scenario allows you to make money and develop professionally! After paying for external services which substitute your unpaid work, you'll keep approximately ${{netProfit.formattedValue}} a week in your pocket.&nbsp;
                                TXT],
                                ['when' => 'netProfit <= 0 and country == 2550140307', 'text' => <<<'TXT'
                                This scenario allows you to develop professionally, but at a financial cost. On top of what you'll earn, you will need to pay an additional £{{MINUSnetProfit.formattedValue}} a week to cover the costs of external services which substitute your unpaid work.&nbsp;
                                TXT],
                                ['when' => 'netProfit > 0 and country== 2550140307', 'text' => <<<'TXT'
                                This scenario allows you to make money and develop professionally! After paying for external services which substitute your unpaid work, you'll keep approximately £{{netProfit.formattedValue}} a week in your pocket.&nbsp;
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
                                Hypothetical scenario: you ask family members to take over an additional {{tasksDelegated.formattedValue}} hours per week. You also increase your hours worked from {{timeWorked.formattedValue}} to {{time_sum3.formattedValue}} hours per week.
                                TXT],
                                ['when' => 'tasksOutsourced !=0', 'text' => <<<'TXT'
                                Hypothetical scenario: you outsource {{tasksOutsourced.formattedValue}} hours of housework per week to external paid services. You also increase your hours worked from {{timeWorked.formattedValue}} to {{time_sum2.formattedValue}} hours per week.
                                TXT],
                                ['when' => 'tasksOutsourced != 0 and tasksDelegated != 0', 'text' => <<<'TXT'
                                Hypothetical scenario: you outsource {{tasksOutsourced.formattedValue}} hours of housework per week to external paid services and ask family members to take over an additional {{tasksDelegated.formattedValue}} hours per week. You also increase your hours worked from {{timeWorked.formattedValue}} to {{time_sum.formattedValue}} hours per week.
                                TXT],
                                ['when' => 'netProfit >0 and  country != 2550140307', 'text' => <<<'TXT'
                                This scenario allows you to make money and develop professionally! After paying external services to cover your unpaid work, you'll keep an additional ${{netProfit.formattedValue}} a week in your pocket.&nbsp;
                                TXT],
                                ['when' => 'netProfit >0 and  country == 2550140307', 'text' => <<<'TXT'
                                This scenario allows you to make money and develop professionally! After paying external services to cover your unpaid work, you'll keep an additional £{{netProfit.formattedValue}} a week in your pocket.&nbsp;
                                TXT],
                                ['when' => 'netProfit <=0 and  country != 2550140307', 'text' => <<<'TXT'
                                This scenario allows you to develop professionally, but at a financial cost. You will need to pay an additional ${{MINUSnetProfit.formattedValue}} a week to the external services that cover your unpaid work out of all of the extra money you'll make&nbsp;
                                TXT],
                                ['when' => 'netProfit <=0 and  country == 2550140307', 'text' => <<<'TXT'
                                This scenario allows you to develop professionally, but at a financial cost. You will need to pay an additional £{{MINUSnetProfit.formattedValue}} a week to the external services that cover your unpaid work out of all of the extra money you'll make&nbsp;
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
                                Hypothetical scenario: you ask family members to take over an additional {{tasksDelegated.formattedValue}} hours per week. You also increase your hours worked from {{timeWorked.formattedValue}} to 40 hours per week (a full-time job).
                                TXT],
                                ['when' => 'tasksOutsourced !=0', 'text' => <<<'TXT'
                                Hypothetical scenario: you outsource {{tasksOutsourced.formattedValue}} hours of housework per week to external paid services. You also increase your hours worked from {{timeWorked.formattedValue}} to 40 hours per week (a full-time job).
                                TXT],
                                ['when' => 'tasksOutsourced != 0 and tasksDelegated != 0', 'text' => <<<'TXT'
                                Hypothetical scenario: you outsource {{tasksOutsourced.formattedValue}} hours of housework per week to external paid services, and ask family members to take over an additional {{tasksDelegated.formattedValue}} hours per week. You also increase your hours worked from {{timeWorked.formattedValue}} to 40 hours per week (a full-time job).
                                TXT],
                                ['when' => 'netProfit2 > 0 and country != 2550140307', 'text' => <<<'TXT'
                                This scenario allows you to make money and develop professionally! After paying external services to cover your unpaid work, you'll keep an additional ${{netProfit.formattedValue}} a week in your pocket.&nbsp;
                                TXT],
                                ['when' => 'netProfit2 > 0 and country == 2550140307', 'text' => <<<'TXT'
                                This scenario allows you to make money and develop professionally! After paying external services to cover your unpaid work, you'll keep an additional £{{netProfit.formattedValue}} a week in your pocket.&nbsp;
                                TXT],
                                ['when' => 'netProfit2 <= 0 and country != 2550140307', 'text' => <<<'TXT'
                                This scenario allows you to develop professionally, but at a financial cost. You will need to pay an additional ${{MINUSnetProfit2.formattedValue}} a week to the external services that cover your unpaid work out of all of the extra money you'll make.&nbsp;
                                TXT],
                                ['when' => 'netProfit2 <= 0 and country == 2550140307', 'text' => <<<'TXT'
                                This scenario allows you to develop professionally, but at a financial cost. You will need to pay an additional £{{MINUSnetProfit2.formattedValue}} a week to the external services that cover your unpaid work out of all of the extra money you'll make.&nbsp;
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
                                Hypothetical scenario: you ask family members to take over an additional {{tasksDelegated.formattedValue}} hours per week. This scenario allows you to reduce the workload at home. You will earn {{totalTask.formattedValue}} hours of free time, which you can use to relax, exercise, or learn new skills! There are no additional financial costs associated with this scenario.&nbsp;
                                TXT],
                                ['when' => 'tasksOutsourced !=0 and  country != 2550140307', 'text' => <<<'TXT'
                                Hypothetical scenario: you outsource {{tasksOutsourced.formattedValue}} hours of housework per week to external paid services. This scenario allows you to reduce the workload at home but at a financial cost. You will earn {{totalTask.formattedValue}} hours of free time, which you can use to relax, exercise, or learn new skills! You will need to pay an additional ${{netCost.formattedValue}} a week 
                                TXT],
                                ['when' => 'tasksOutsourced != 0 and tasksDelegated != 0 and  country != 2550140307', 'text' => <<<'TXT'
                                Hypothetical scenario: you outsource {{tasksOutsourced.formattedValue}} hours of housework per week to external paid services and ask family members to take over an additional {{tasksDelegated.formattedValue}} hours per week. This scenario allows you to reduce the workload at home but at a financial cost. You will earn {{totalTask.formattedValue}} hours of free time, which you can use to relax, ex
                                TXT],
                                ['when' => 'tasksOutsourced !=0 and  country == 2550140307', 'text' => <<<'TXT'
                                Hypothetical scenario: you outsource {{tasksOutsourced.formattedValue}} hours of housework per week to external paid services. This scenario allows you to reduce the workload at home but at a financial cost. You will earn {{totalTask.formattedValue}} hours of free time, which you can use to relax, exercise, or learn new skills! You will need to pay an additional £{{netCost.formattedValue}} a week 
                                TXT],
                                ['when' => 'tasksOutsourced != 0 and tasksDelegated != 0 and  country == 2550140307', 'text' => <<<'TXT'
                                Hypothetical scenario: you outsource {{tasksOutsourced.formattedValue}} hours of housework per week to external paid services and ask family members to take over an additional {{tasksDelegated.formattedValue}} hours per week. This scenario allows you to reduce the workload at home but at a financial cost. You will earn {{totalTask.formattedValue}} hours of free time, which you can use to relax, ex
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
                            'name' => 'netCost',
                            'label' => 'Net cost',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'time_sum2',
                            'label' => 'Time sum2',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'avgCostOfHousework',
                            'label' => 'Avg cost of housework',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'time_sum',
                            'label' => 'Time sum',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'netProfit2',
                            'label' => 'Net profit2',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'totalTask',
                            'label' => 'Total task',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'netProfit',
                            'label' => 'Net profit',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'time_sum3',
                            'label' => 'Time sum3',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'MINUSnetProfit',
                            'label' => 'Minu snet profit',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'MINUSnetProfit2',
                            'label' => 'Minu snet profit2',
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
            'title' => <<<'TXT'
            totalCost = cleaning * cleaningCost + gardening* gardeningCost + repairs * repairsCost +  cooking * cookingCost + laundry * laundryCost + childCare * childCareCost + schoolwork * schoolworkCost + adultCare * adultCarecost + petCare * petCareCost+ transport * transportCost
            TXT,
            'results' => [
                'petCareCost' => <<<'TXT'
                (-adultCare*adultCarecost - childCare*childCareCost - cleaning*cleaningCost - cooking*cookingCost - gardening*gardeningCost - laundry*laundryCost - repairs*repairsCost - schoolwork*schoolworkCost + totalCost - transport*transportCost)/petCare
                TXT,
                'childCareCost' => <<<'TXT'
                (-adultCare*adultCarecost - cleaning*cleaningCost - cooking*cookingCost - gardening*gardeningCost - laundry*laundryCost - petCare*petCareCost - repairs*repairsCost - schoolwork*schoolworkCost + totalCost - transport*transportCost)/childCare
                TXT,
                'gardening' => <<<'TXT'
                (-adultCare*adultCarecost - childCare*childCareCost - cleaning*cleaningCost - cooking*cookingCost - laundry*laundryCost - petCare*petCareCost - repairs*repairsCost - schoolwork*schoolworkCost + totalCost - transport*transportCost)/gardeningCost
                TXT,
                'schoolwork' => <<<'TXT'
                (-adultCare*adultCarecost - childCare*childCareCost - cleaning*cleaningCost - cooking*cookingCost - gardening*gardeningCost - laundry*laundryCost - petCare*petCareCost - repairs*repairsCost + totalCost - transport*transportCost)/schoolworkCost
                TXT,
                'cooking' => <<<'TXT'
                (-adultCare*adultCarecost - childCare*childCareCost - cleaning*cleaningCost - gardening*gardeningCost - laundry*laundryCost - petCare*petCareCost - repairs*repairsCost - schoolwork*schoolworkCost + totalCost - transport*transportCost)/cookingCost
                TXT,
                'cleaningCost' => <<<'TXT'
                (-adultCare*adultCarecost - childCare*childCareCost - cooking*cookingCost - gardening*gardeningCost - laundry*laundryCost - petCare*petCareCost - repairs*repairsCost - schoolwork*schoolworkCost + totalCost - transport*transportCost)/cleaning
                TXT,
                'transport' => <<<'TXT'
                (-adultCare*adultCarecost - childCare*childCareCost - cleaning*cleaningCost - cooking*cookingCost - gardening*gardeningCost - laundry*laundryCost - petCare*petCareCost - repairs*repairsCost - schoolwork*schoolworkCost + totalCost)/transportCost
                TXT,
                'adultCarecost' => <<<'TXT'
                (-childCare*childCareCost - cleaning*cleaningCost - cooking*cookingCost - gardening*gardeningCost - laundry*laundryCost - petCare*petCareCost - repairs*repairsCost - schoolwork*schoolworkCost + totalCost - transport*transportCost)/adultCare
                TXT,
                'totalCost' => <<<'TXT'
                adultCare*adultCarecost + childCare*childCareCost + cleaning*cleaningCost + cooking*cookingCost + gardening*gardeningCost + laundry*laundryCost + petCare*petCareCost + repairs*repairsCost + schoolwork*schoolworkCost + transport*transportCost
                TXT,
                'childCare' => <<<'TXT'
                (-adultCare*adultCarecost - cleaning*cleaningCost - cooking*cookingCost - gardening*gardeningCost - laundry*laundryCost - petCare*petCareCost - repairs*repairsCost - schoolwork*schoolworkCost + totalCost - transport*transportCost)/childCareCost
                TXT,
                'repairs' => <<<'TXT'
                (-adultCare*adultCarecost - childCare*childCareCost - cleaning*cleaningCost - cooking*cookingCost - gardening*gardeningCost - laundry*laundryCost - petCare*petCareCost - schoolwork*schoolworkCost + totalCost - transport*transportCost)/repairsCost
                TXT,
                'laundryCost' => <<<'TXT'
                (-adultCare*adultCarecost - childCare*childCareCost - cleaning*cleaningCost - cooking*cookingCost - gardening*gardeningCost - petCare*petCareCost - repairs*repairsCost - schoolwork*schoolworkCost + totalCost - transport*transportCost)/laundry
                TXT,
                'petCare' => <<<'TXT'
                (-adultCare*adultCarecost - childCare*childCareCost - cleaning*cleaningCost - cooking*cookingCost - gardening*gardeningCost - laundry*laundryCost - repairs*repairsCost - schoolwork*schoolworkCost + totalCost - transport*transportCost)/petCareCost
                TXT,
                'laundry' => <<<'TXT'
                (-adultCare*adultCarecost - childCare*childCareCost - cleaning*cleaningCost - cooking*cookingCost - gardening*gardeningCost - petCare*petCareCost - repairs*repairsCost - schoolwork*schoolworkCost + totalCost - transport*transportCost)/laundryCost
                TXT,
                'schoolworkCost' => <<<'TXT'
                (-adultCare*adultCarecost - childCare*childCareCost - cleaning*cleaningCost - cooking*cookingCost - gardening*gardeningCost - laundry*laundryCost - petCare*petCareCost - repairs*repairsCost + totalCost - transport*transportCost)/schoolwork
                TXT,
                'cleaning' => <<<'TXT'
                (-adultCare*adultCarecost - childCare*childCareCost - cooking*cookingCost - gardening*gardeningCost - laundry*laundryCost - petCare*petCareCost - repairs*repairsCost - schoolwork*schoolworkCost + totalCost - transport*transportCost)/cleaningCost
                TXT,
                'repairsCost' => <<<'TXT'
                (-adultCare*adultCarecost - childCare*childCareCost - cleaning*cleaningCost - cooking*cookingCost - gardening*gardeningCost - laundry*laundryCost - petCare*petCareCost - schoolwork*schoolworkCost + totalCost - transport*transportCost)/repairs
                TXT,
                'cookingCost' => <<<'TXT'
                (-adultCare*adultCarecost - childCare*childCareCost - cleaning*cleaningCost - gardening*gardeningCost - laundry*laundryCost - petCare*petCareCost - repairs*repairsCost - schoolwork*schoolworkCost + totalCost - transport*transportCost)/cooking
                TXT,
                'gardeningCost' => <<<'TXT'
                (-adultCare*adultCarecost - childCare*childCareCost - cleaning*cleaningCost - cooking*cookingCost - laundry*laundryCost - petCare*petCareCost - repairs*repairsCost - schoolwork*schoolworkCost + totalCost - transport*transportCost)/gardening
                TXT,
                'adultCare' => <<<'TXT'
                (-childCare*childCareCost - cleaning*cleaningCost - cooking*cookingCost - gardening*gardeningCost - laundry*laundryCost - petCare*petCareCost - repairs*repairsCost - schoolwork*schoolworkCost + totalCost - transport*transportCost)/adultCarecost
                TXT,
                'transportCost' => <<<'TXT'
                (-adultCare*adultCarecost - childCare*childCareCost - cleaning*cleaningCost - cooking*cookingCost - gardening*gardeningCost - laundry*laundryCost - petCare*petCareCost - repairs*repairsCost - schoolwork*schoolworkCost + totalCost)/transport
                TXT,
            ],
        ],
        [
            'title' => 'totalTime = cleaning + gardening + repairs + cooking + laundry + childCare + schoolwork + adultCare + petCare + transport ',
            'results' => [
                'cooking' => '-adultCare - childCare - cleaning - gardening - laundry - petCare - repairs - schoolwork + totalTime - transport',
                'cleaning' => '-adultCare - childCare - cooking - gardening - laundry - petCare - repairs - schoolwork + totalTime - transport',
                'totalTime' => 'adultCare + childCare + cleaning + cooking + gardening + laundry + petCare + repairs + schoolwork + transport',
                'transport' => '-adultCare - childCare - cleaning - cooking - gardening - laundry - petCare - repairs - schoolwork + totalTime',
                'petCare' => '-adultCare - childCare - cleaning - cooking - gardening - laundry - repairs - schoolwork + totalTime - transport',
                'repairs' => '-adultCare - childCare - cleaning - cooking - gardening - laundry - petCare - schoolwork + totalTime - transport',
                'gardening' => '-adultCare - childCare - cleaning - cooking - laundry - petCare - repairs - schoolwork + totalTime - transport',
                'adultCare' => '-childCare - cleaning - cooking - gardening - laundry - petCare - repairs - schoolwork + totalTime - transport',
                'laundry' => '-adultCare - childCare - cleaning - cooking - gardening - petCare - repairs - schoolwork + totalTime - transport',
                'childCare' => '-adultCare - cleaning - cooking - gardening - laundry - petCare - repairs - schoolwork + totalTime - transport',
                'schoolwork' => '-adultCare - childCare - cleaning - cooking - gardening - laundry - petCare - repairs + totalTime - transport',
            ],
        ],
        [
            'title' => 'totalCostUK = totalCost ',
            'results' => ['totalCost' => 'totalCostUK', 'totalCostUK' => 'totalCost'],
        ],
        [
            'title' => 'cleaningCost = cleaningCostUK',
            'results' => ['cleaningCost' => 'cleaningCostUK', 'cleaningCostUK' => 'cleaningCost'],
        ],
        [
            'title' => 'gardeningCost = gardeningCostUK',
            'results' => ['gardeningCost' => 'gardeningCostUK', 'gardeningCostUK' => 'gardeningCost'],
        ],
        [
            'title' => 'repairsCost = repairsCostUK',
            'results' => ['repairsCost' => 'repairsCostUK', 'repairsCostUK' => 'repairsCost'],
        ],
        [
            'title' => 'cookingCost = cookingCostUK',
            'results' => ['cookingCost' => 'cookingCostUK', 'cookingCostUK' => 'cookingCost'],
        ],
        [
            'title' => 'laundryCost =laundryCostUK',
            'results' => ['laundryCost' => 'laundryCostUK', 'laundryCostUK' => 'laundryCost'],
        ],
        [
            'title' => 'childCareCost =childCareCostUK',
            'results' => ['childCareCost' => 'childCareCostUK', 'childCareCostUK' => 'childCareCost'],
        ],
        [
            'title' => 'schoolworkCost = schoolworkCostUK',
            'results' => ['schoolworkCost' => 'schoolworkCostUK', 'schoolworkCostUK' => 'schoolworkCost'],
        ],
        [
            'title' => 'adultCarecost = adultCarecostUK',
            'results' => ['adultCarecostUK' => 'adultCarecost', 'adultCarecost' => 'adultCarecostUK'],
        ],
        [
            'title' => 'petCareCost = petCareCostUK',
            'results' => ['petCareCost' => 'petCareCostUK', 'petCareCostUK' => 'petCareCost'],
        ],
        [
            'title' => 'transportCost = transportCostUK',
            'results' => ['transportCostUK' => 'transportCost', 'transportCost' => 'transportCostUK'],
        ],
        [
            'title' => 'moneyMade = moneyMadeUK',
            'results' => ['moneyMadeUK' => 'moneyMade', 'moneyMade' => 'moneyMadeUK'],
        ],
        [
            'title' => 'opportunityCost = moneyMade * totalTime',
            'results' => ['opportunityCost' => 'moneyMade*totalTime', 'totalTime' => 'opportunityCost/moneyMade', 'moneyMade' => 'opportunityCost/totalTime'],
        ],
        [
            'title' => 'opportunityCost = opportunityCostUK',
            'results' => ['opportunityCost' => 'opportunityCostUK', 'opportunityCostUK' => 'opportunityCost'],
        ],
        [
            'title' => 'monthlyWage = moneyMade * timeWorked * 30.4375/7',
            'results' => ['monthlyWage' => '(487/112)*moneyMade*timeWorked', 'timeWorked' => '(112/487)*monthlyWage/moneyMade', 'moneyMade' => '(112/487)*monthlyWage/timeWorked'],
        ],
        [
            'title' => 'monthlyWage = monthlyWageUK',
            'results' => ['monthlyWageUK' => 'monthlyWage', 'monthlyWage' => 'monthlyWageUK'],
        ],
        [
            'title' => 'weeklyWage = moneyMade * timeWorked',
            'results' => ['weeklyWage' => 'moneyMade*timeWorked', 'timeWorked' => 'weeklyWage/moneyMade', 'moneyMade' => 'weeklyWage/timeWorked'],
        ],
        [
            'title' => 'weeklyWage = weeklyWageUK',
            'results' => ['weeklyWageUK' => 'weeklyWage', 'weeklyWage' => 'weeklyWageUK'],
        ],
        [
            'title' => 'netProfit=((tasksOutsourced + tasksDelegated) * moneyMade - avgCostOfHousework * tasksOutsourced)',
            'results' => ['tasksDelegated' => '(-moneyMade*tasksOutsourced + netProfit + tasksOutsourced*((totalCost/totalTime)))/moneyMade', 'moneyMade' => '(netProfit + tasksOutsourced*((totalCost/totalTime)))/(tasksDelegated + tasksOutsourced)', 'tasksOutsourced' => '(-moneyMade*tasksDelegated + netProfit)/(moneyMade - ((totalCost/totalTime)))', 'netProfit' => 'moneyMade*tasksDelegated + moneyMade*tasksOutsourced - tasksOutsourced*((totalCost/totalTime))'],
        ],
        [
            'title' => 'netProfit2 = (moneyMade * (40 - timeWorked) - tasksOutsourced * avgCostOfHousework)',
            'results' => ['moneyMade' => '(-netProfit2 - tasksOutsourced*((totalCost/totalTime)))/(timeWorked - 40)', 'timeWorked' => '(40*moneyMade - netProfit2 - tasksOutsourced*((totalCost/totalTime)))/moneyMade', 'tasksOutsourced' => '(-moneyMade*timeWorked + 40*moneyMade - netProfit2)/((totalCost/totalTime))', 'netProfit2' => '-moneyMade*timeWorked + 40*moneyMade - tasksOutsourced*((totalCost/totalTime))'],
        ],
        [
            'title' => 'netCost = (tasksOutsourced * avgCostOfHousework)',
            'results' => ['netCost' => 'tasksOutsourced*((totalCost/totalTime))', 'tasksOutsourced' => 'netCost/((totalCost/totalTime))'],
        ],
        [
            'title' => 'time_sum=timeWorked+tasksOutsourced+tasksDelegated',
            'results' => ['time_sum' => 'tasksDelegated + tasksOutsourced + timeWorked', 'tasksDelegated' => '-tasksOutsourced - timeWorked + time_sum', 'timeWorked' => '-tasksDelegated - tasksOutsourced + time_sum', 'tasksOutsourced' => '-tasksDelegated - timeWorked + time_sum'],
        ],
        [
            'title' => 'time_sum2=timeWorked+tasksOutsourced',
            'results' => ['time_sum2' => 'tasksOutsourced + timeWorked', 'timeWorked' => '-tasksOutsourced + time_sum2', 'tasksOutsourced' => '-timeWorked + time_sum2'],
        ],
        [
            'title' => 'time_sum3=timeWorked+tasksDelegated',
            'results' => ['time_sum3' => 'tasksDelegated + timeWorked', 'tasksDelegated' => '-timeWorked + time_sum3', 'timeWorked' => '-tasksDelegated + time_sum3'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Unpaid work takes Country, I work… and I know my… and returns Meal preparation and Cleaning. The arithmetic is the whole method: meal preparation is worked out from country by one formula, applied once. Meal preparation comes back in $/h unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Unpaid work calculator works', 'html' => <<<'TXT'
            <p>Unpaid work answers one question from 36 numbers, and the answer is Meal preparation, Cleaning and Laundry.</p><p>What comes back is Meal preparation, Cleaning, Laundry and Child care — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 36 boxes and the page has everything it needs.</p><ul><li><strong>Country</strong> — a plain number, no unit</li><li><strong>I work…</strong> — in h per week</li><li><strong>I know my…</strong> — a plain number, no unit</li><li><strong>Hourly wage</strong> — in $/h. What is your hourly wage after tax? If you are currently unemployed, input the average wage you expect to earn.</li><li><strong>Hourly wage</strong> — in £/h. What is your hourly wage after tax? If you are currently unemployed, input the average wage you expect to earn.</li><li><strong>Monthly salary</strong> — in $/month. What is your monthly wage after tax? If you are currently unemployed, input the average wage you expect to earn.</li><li><strong>Monthly salary</strong> — in £/month. What is your monthly wage after tax? If you are currently unemployed, input the average wage you expect to earn.</li><li><strong>Weekly salary</strong> — in $/week. What is your weekly wage after tax? If you are currently unemployed, input the average wage you expect to earn.</li><li><strong>Weekly salary</strong> — in £/week. What is your weekly wage after tax? If you are currently unemployed, input the average wage you expect to earn.</li><li><strong>Meal preparation</strong> — in weeks. Meal planning, grocery shopping, preparing meals, and washing up after.</li><li><strong>Cleaning</strong> — in weeks</li><li><strong>Laundry</strong> — in weeks. Washing, dry cleaning, and ironing.</li><li><strong>Child care</strong> — in weeks</li><li><strong>Schoolwork</strong> — in weeks. Helping your kids with homework or projects.</li><li><strong>‍ Adult care</strong> — in weeks. Taking care of elderly or disabled relatives.</li><li><strong>Pet care</strong> — in weeks</li><li><strong>Transport</strong> — in weeks. Driving your relatives to and fro.</li><li><strong>Repairs</strong> — in weeks</li><li><strong>Gardening</strong> — in weeks</li><li><strong>Time spent</strong> — in weeks</li><li><strong>Value of unpaid work</strong> — in weeks. This is how much you&#039;d have to pay external services providers to get all of your unpaid work done.</li><li><strong>If I worked, I&#039;d make</strong> — in $/wk. If you spent all of your unpaid time working at your job, this is how much money you&#039;d earn.</li><li><strong>Value of unpaid work</strong> — in weeks. This is how much you&#039;d have to pay external services providers to get all of your unpaid work done.</li><li><strong>If I worked, I&#039;d make</strong> — in £/wk. If you spent all of your unpaid time working at your job, this is how much money you&#039;d earn.</li><li><strong>I want to outsource</strong> — in weeks. How many hours of your unpaid work are you willing to contract out to external services?</li><li><strong>My family will share</strong> — in weeks. How many hours of your unpaid work will be taken over by members of your household?</li><li><strong>Net cost</strong> — a plain number, no unit</li><li><strong>Time sum2</strong> — a plain number, no unit</li><li><strong>Avg cost of housework</strong> — a plain number, no unit</li><li><strong>Time sum</strong> — a plain number, no unit</li><li><strong>Net profit2</strong> — a plain number, no unit</li><li><strong>Total task</strong> — a plain number, no unit</li><li><strong>Net profit</strong> — a plain number, no unit</li><li><strong>Time sum3</strong> — a plain number, no unit</li><li><strong>Minu snet profit</strong> — a plain number, no unit</li><li><strong>Minu snet profit2</strong> — a plain number, no unit</li></ul><p>What you get back is Meal preparation in $/h, Cleaning in $/h, Laundry in $/h, Child care in $/h, Schoolwork in $/h, Adult care in $/h, Pet care in $/h, Transport in $/h, Repairs in $/h, Gardening in $/h, Meal preparation in £/h, Cleaning in £/h, Laundry in £/h, Child care in £/h, Schoolwork in £/h, Adult care in £/h, Pet care in £/h, Transport in £/h, Repairs in £/h, Gardening in £/h, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Meal preparation offers 5 units and opens on weeks, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Time spent</strong> = <code>‍ Adult care + Child care + Cleaning + Meal preparation + Gardening + Laundry + Pet care + Repairs + Schoolwork + Transport</code></li><li><strong>Meal preparation</strong> = <code>− ‍ Adult care − Child care − Cleaning − Gardening − Laundry − Pet care − Repairs − Schoolwork + Time spent − Transport</code></li><li><strong>Cleaning</strong> = <code>− ‍ Adult care − Child care − Meal preparation − Gardening − Laundry − Pet care − Repairs − Schoolwork + Time spent − Transport</code></li><li><strong>Transport</strong> = <code>− ‍ Adult care − Child care − Cleaning − Meal preparation − Gardening − Laundry − Pet care − Repairs − Schoolwork + Time spent</code></li><li><strong>Pet care</strong> = <code>− ‍ Adult care − Child care − Cleaning − Meal preparation − Gardening − Laundry − Repairs − Schoolwork + Time spent − Transport</code></li><li><strong>Repairs</strong> = <code>− ‍ Adult care − Child care − Cleaning − Meal preparation − Gardening − Laundry − Pet care − Schoolwork + Time spent − Transport</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Time spent</strong> = <code>‍ Adult care + Child care + Cleaning + Meal preparation + Gardening + Laundry + Pet care + Repairs + Schoolwork + Transport</code> — the form to use when ‍ Adult care, Child care, Cleaning and Meal preparation are the values you have.</li><li><strong>Meal preparation</strong> = <code>− ‍ Adult care − Child care − Cleaning − Gardening − Laundry − Pet care − Repairs − Schoolwork + Time spent − Transport</code> — the form to use when ‍ Adult care, Child care, Cleaning and Gardening are the values you have.</li><li><strong>Cleaning</strong> = <code>− ‍ Adult care − Child care − Meal preparation − Gardening − Laundry − Pet care − Repairs − Schoolwork + Time spent − Transport</code> — the form to use when ‍ Adult care, Child care, Meal preparation and Gardening are the values you have.</li><li><strong>Transport</strong> = <code>− ‍ Adult care − Child care − Cleaning − Meal preparation − Gardening − Laundry − Pet care − Repairs − Schoolwork + Time spent</code> — the form to use when ‍ Adult care, Child care, Cleaning and Meal preparation are the values you have.</li><li><strong>Pet care</strong> = <code>− ‍ Adult care − Child care − Cleaning − Meal preparation − Gardening − Laundry − Repairs − Schoolwork + Time spent − Transport</code> — the form to use when ‍ Adult care, Child care, Cleaning and Meal preparation are the values you have.</li><li><strong>Repairs</strong> = <code>− ‍ Adult care − Child care − Cleaning − Meal preparation − Gardening − Laundry − Pet care − Schoolwork + Time spent − Transport</code> — the form to use when ‍ Adult care, Child care, Cleaning and Meal preparation are the values you have.</li><li><strong>Gardening</strong> = <code>− ‍ Adult care − Child care − Cleaning − Meal preparation − Laundry − Pet care − Repairs − Schoolwork + Time spent − Transport</code> — the form to use when ‍ Adult care, Child care, Cleaning and Meal preparation are the values you have.</li><li><strong>‍ Adult care</strong> = <code>− Child care − Cleaning − Meal preparation − Gardening − Laundry − Pet care − Repairs − Schoolwork + Time spent − Transport</code> — the form to use when Child care, Cleaning, Meal preparation and Gardening are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Value of unpaid work, Pet care and Child care can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Meal preparation, Cleaning and Laundry is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Meal preparation, Cleaning and Laundry are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Country left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Country is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>I work… left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If I work… is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Country to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Country, I work…, I know my… and Hourly wage ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Country — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Meal preparation in $/h against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Meal preparation follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are weeks and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Country, I work… and I know my… are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Country, I work… and I know my… and the number you are missing is Meal preparation and Cleaning.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/fibonacci-retracement">Fibonacci retracement Calculator</a>, <a href="/finance/fica-tax">FICA tax Calculator</a> and <a href="/finance/fifo-for-inventories">FIFO for inventories</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Unpaid work calculator work out?', 'a' => 'Meal preparation, Cleaning, Laundry and Child care, from ‍ Adult care, Adult care, Child care and Child care.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Country, I work… (h per week), I know my…, Hourly wage ($/h), Hourly wage (£/h). Enter country, i work… and i know my…; Meal preparation is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Value of unpaid work, Pet care, Child care and Gardening can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Meal preparation is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Country blank and the page solves for it, reporting Meal preparation instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Meal preparation keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/fibonacci-retracement', 'name' => 'Fibonacci retracement Calculator'],
            ['path' => '/finance/fica-tax', 'name' => 'FICA tax Calculator'],
            ['path' => '/finance/fifo-for-inventories', 'name' => 'FIFO for inventories'],
        ],
        'authors' => [],
    ],
];
