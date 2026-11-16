<?php

/**
 * Back to school
 * /everyday-life/back-to-school
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Back to school',
    'meta' => ['title' => 'Back to school Calculator: Free, With Steps', 'description' => 'Back to school turns planned spending and clothing, accessories into total budget. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Back to school Calculator', 'updated' => '2026-08-28'],
    'sections' => [
        [
            'title' => 'Your budget ',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'budget_school',
                            'label' => 'Planned spending',
                            'type' => 'select',
                            'options' => ['Enter custom values' => '', '' => '240'],
                            'dataset' => 'averageSchoolData',
                            'control' => 'CHECKBOX',
                            'help' => 'By default, we’ve set an typical budget for each spending category. Tick “Enter custom value” to enter you own budget.',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'budget_manually_school',
                            'label' => 'Total budget',
                            'type' => 'number',
                            'help' => 'To enter your custom budget, select the checkbox above.',
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
                            'name' => 'budgetA_school',
                            'label' => 'Clothing, accessories',
                            'type' => 'result',
                            'help' => 'Items such as: shirts, jeans, uniforms, etc.',
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
                            'name' => 'budgetB_school',
                            'label' => 'Electronics',
                            'type' => 'result',
                            'help' => 'Items such as: laptops, phones, calculators, printers, etc.',
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
                            'name' => 'budgetC_school',
                            'label' => 'Shoes',
                            'type' => 'result',
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
                            'name' => 'budgetD_school',
                            'label' => 'Supplies',
                            'type' => 'result',
                            'help' => 'Items such as: notebooks, backpacks, pens, etc.',
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
                            'name' => 'budgetE_school',
                            'label' => 'Miscellaneous',
                            'type' => 'result',
                            'help' => 'Set aside some funds for unexpected purchases. We added 10%.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Items in the categories are only our suggestions and represent a range of possible items and not specific ones.'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Clothing and accessories ',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'You\'ve spent {{categoryA.monetaryValue}} out of {{budgetA_school.monetaryValue}}. Remaining: {{spentA_school.monetaryValue}}.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'You\'ve spent {{categoryA.monetaryValue}} out of {{budgetA_school.monetaryValue}}. Overspent: {{spentA_school.monetaryValue}}.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'itemA1',
                            'label' => 'Shirts',
                            'type' => 'number',
                            'help' => 'or jackets, hoodies, etc.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'itemA2',
                            'label' => 'Jeans',
                            'type' => 'number',
                            'help' => 'and other kinds of bottoms, such as gym shorts, etc.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'itemA3',
                            'label' => 'Underwear',
                            'type' => 'number',
                            'help' => 'socks, panites, etc.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'itemA4',
                            'label' => 'Other',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '0',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Electronics ',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'You\'ve spent {{categoryB.monetaryValue}} out of {{budgetB_school.monetaryValue}}. Remaining: {{spentB_school.monetaryValue}}.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'You\'ve spent {{categoryB.monetaryValue}} out of {{budgetB_school.monetaryValue}}. Overspent: {{spentB_school.monetaryValue}}.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'itemB1',
                            'label' => 'Laptop',
                            'type' => 'number',
                            'help' => 'or a tablet.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'itemB2',
                            'label' => 'Phone',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'itemB3',
                            'label' => 'Calculator',
                            'type' => 'number',
                            'help' => 'or some other gadgets.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'itemB4',
                            'label' => 'Printer',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'itemB5',
                            'label' => 'Other',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '0',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Shoes ',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'You\'ve spent {{categoryC.monetaryValue}} out of {{budgetC_school.monetaryValue}}. Remaining: {{spentC_school.monetaryValue}}.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'You\'ve spent {{categoryC.monetaryValue}} out of {{budgetC_school.monetaryValue}}. Overspent: {{spentC_school.monetaryValue}}.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'itemC1',
                            'label' => 'Daily shoes',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'itemC2',
                            'label' => 'Running shoes',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'itemC3',
                            'label' => 'PE shoes',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'itemC4',
                            'label' => 'Other',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '0',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Supplies ',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'You\'ve spent {{categoryD.monetaryValue}} out of {{budgetD_school.monetaryValue}}. Remaining: {{spentD_school.monetaryValue}}.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'You\'ve spent {{categoryD.monetaryValue}} out of {{budgetD_school.monetaryValue}}. Overspent: {{spentD_school.monetaryValue}}.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'itemD1',
                            'label' => 'Backpack',
                            'type' => 'number',
                            'help' => 'or a bag.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'itemD2',
                            'label' => 'Notebooks',
                            'type' => 'number',
                            'help' => 'or binders, paper.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'itemD3',
                            'label' => 'Writing utensils',
                            'type' => 'number',
                            'help' => 'or rulers, scissors, glue.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'itemD4',
                            'label' => 'Lunch box',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'itemD5',
                            'label' => 'Other',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '0',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Miscellaneous ',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'You\'ve spent {{categoryE.monetaryValue}} out of {{budgetE_school.monetaryValue}}. Remaining: {{spentE_school.monetaryValue}}.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'You\'ve spent {{categoryE.monetaryValue}} out of {{budgetE_school.monetaryValue}}. Overspent: {{spentE_school.monetaryValue}}.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'itemE1',
                            'label' => 'Miscellaneous items',
                            'type' => 'number',
                            'help' => 'Items our categories didn’t cover or last minute purchases. You can add together prices by entering them like this: 3.99+4.99+5.99.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '0',
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
                        ['type' => 'note', 'text' => 'Current spending: {{schoolSpend.monetaryValue}} out of {{budget_manually_school.monetaryValue}}.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Current spending: {{schoolSpend.monetaryValue}} out of {{budget_manually_school.monetaryValue}}.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'schoolAverageDown > 0 and schoolAverageDown < 25', 'text' => 'You\'ve spent {{schoolAverageDown.formattedValue}}% less than the average American ($700). You are a smart shopper. '],
                                ['when' => 'schoolAverageDown >= 25 and schoolAverageDown < 50', 'text' => 'You\'ve spent {{schoolAverageDown.formattedValue}}% less than the average American ($700). You are bound to save a lot of money this season. '],
                                ['when' => 'schoolAverageDown < 100 and schoolAverageDown >= 50', 'text' => '"You\'ve spent {{schoolAverageDown.formattedValue}}% less than the average American ($700). You probably did your shopping early. '],
                                ['when' => 'schoolAverageDown == 0', 'text' => <<<'TXT'
                                Your expenses match the average American back-to-school spendings ($700) - awesome! You shop for exactly what is needed and have a chance to save quite a lot this season.
                                TXT],
                                ['when' => 'schoolAverageUp > 0 and schoolAverageUp < 25', 'text' => 'You\'ve spent {{schoolAverageUp.formattedValue}}% more than the average American ($700). You should have everything you need. '],
                                ['when' => 'schoolAverageUp >= 25 and schoolAverageUp < 50', 'text' => <<<'TXT'
                                You've spent {{schoolAverageUp.formattedValue}}% more than the average American ($700). It is clear that you care about your child's comfort and you are ready to go a long way to make them happy.
                                TXT],
                                ['when' => 'schoolAverageUp >= 50', 'text' => 'You\'ve spent {{schoolAverageUp.formattedValue}}% more than the average American ($700). The ultimate back-to-school experience. No expenses spared! '],
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
                            'name' => 'categoryA',
                            'label' => 'Categorya',
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
                            'name' => 'categoryB',
                            'label' => 'Categoryb',
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
                            'name' => 'categoryC',
                            'label' => 'Categoryc',
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
                            'name' => 'categoryD',
                            'label' => 'Categoryd',
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
                            'name' => 'categoryE',
                            'label' => 'categorye',
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
                            'name' => 'schoolRemaining',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'spentA_school',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'spentB_school',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'spentC_school',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'spentD_school',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'spentE_school',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'schoolAverageUp',
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
                            'name' => 'schoolAverageDown',
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
                            'name' => 'schoolSpend',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'budget_manually_school = budgetA_school + budgetB_school + budgetC_school + budgetD_school + budgetE_school',
            'results' => [
                'budget_manually_school' => 'budgetA_school + budgetB_school + budgetC_school + budgetD_school + budgetE_school',
                'budgetC_school' => '-budgetA_school - budgetB_school - budgetD_school - budgetE_school + budget_manually_school',
                'budgetA_school' => '-budgetB_school - budgetC_school - budgetD_school - budgetE_school + budget_manually_school',
                'budgetE_school' => '-budgetA_school - budgetB_school - budgetC_school - budgetD_school + budget_manually_school',
                'budgetD_school' => '-budgetA_school - budgetB_school - budgetC_school - budgetE_school + budget_manually_school',
                'budgetB_school' => '-budgetA_school - budgetC_school - budgetD_school - budgetE_school + budget_manually_school',
            ],
        ],
        [
            'title' => 'categoryA = one_way(itemA1 + itemA2 + itemA3 + itemA4)',
            'results' => ['categoryA' => '(itemA1 + itemA2 + itemA3 + itemA4)'],
        ],
        [
            'title' => 'categoryB = one_way(itemB1 + itemB2 + itemB3 + itemB4 + itemB5)',
            'results' => ['categoryB' => '(itemB1 + itemB2 + itemB3 + itemB4 + itemB5)'],
        ],
        [
            'title' => 'categoryC = one_way(itemC1 + itemC2 + itemC3 + itemC4)',
            'results' => ['categoryC' => '(itemC1 + itemC2 + itemC3 + itemC4)'],
        ],
        [
            'title' => 'categoryD = one_way(itemD1 + itemD2 + itemD3 + itemD4 + itemD5)',
            'results' => ['categoryD' => '(itemD1 + itemD2 + itemD3 + itemD4 + itemD5)'],
        ],
        [
            'title' => 'categoryE = one_way(itemE1)',
            'results' => ['categoryE' => '(itemE1)'],
        ],
    ],
    'article' => [
        'intro' => 'The Back to school calculator turns the shirts, the jeans and more into <strong>total budget</strong>.',
        'sections' => [
            ['title' => 'How does the Back to school calculator work?', 'html' => <<<'TXT'
            <p>The Back to school calculator takes the values in the form, applies the relationship described below and reports <strong>total budget</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the planned spending); then you type in the shirts, the jeans, the underwear and the other (Clothing and accessories).</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>A single on/off switch — tick it for &ldquo;Enter custom values&rdquo;, leave it clear for the other case. It changes which relationship the calculator applies, not just a multiplier.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li></ul><p>One field on this form is a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Planned spending</strong></td><td>An on/off switch, ticked for enter custom values.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Total budget</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>Calculated</td></tr><tr><td><strong>Clothing, accessories</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>Calculated</td></tr><tr><td><strong>Electronics</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>Calculated</td></tr><tr><td><strong>Shoes</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>Calculated</td></tr><tr><td><strong>Supplies</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>Calculated</td></tr><tr><td><strong>Miscellaneous</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>Calculated</td></tr><tr><td><strong>Shirts</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Jeans</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Underwear</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Other (Clothing and accessories)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Laptop</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Phone</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Calculator</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Printer</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Other (Electronics)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Daily shoes</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Running shoes</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>PE shoes</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Other (Shoes)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Backpack</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Notebooks</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Writing utensils</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Lunch box</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr></tbody></table><p>The table lists the first 24 of 31 fields; the rest follow the same pattern.</p>
            TXT],
            ['title' => 'The formula behind the Back to school calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Total budget</span><span class="formula-eq">=</span><span class="formula-rhs">clothing, accessories + electronics + shoes + supplies + miscellaneous</span></div><div class="formula-row"><span class="formula-lhs">Categorya</span><span class="formula-eq">=</span><span class="formula-rhs">(shirts + jeans + underwear + other)</span></div><div class="formula-row"><span class="formula-lhs">Categoryb</span><span class="formula-eq">=</span><span class="formula-rhs">(laptop + phone + calculator + printer + other)</span></div><div class="formula-row"><span class="formula-lhs">Categoryc</span><span class="formula-eq">=</span><span class="formula-rhs">(daily shoes + running shoes + PE shoes + other)</span></div><div class="formula-row"><span class="formula-lhs">Categoryd</span><span class="formula-eq">=</span><span class="formula-rhs">(backpack + notebooks + writing utensils + lunch box + other)</span></div><div class="formula-row"><span class="formula-lhs">Categorye</span><span class="formula-eq">=</span><span class="formula-rhs">(miscellaneous items)</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Currency, opening in US Dollar</li><li>Currency, opening in US Dollar</li><li>Currency, opening in US Dollar</li><li>Currency, opening in US Dollar</li><li>Currency, opening in US Dollar</li><li>Currency, opening in US Dollar</li><li>Currency, opening in US Dollar</li><li>Currency, opening in US Dollar</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Back to school calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Testing how sensitive an answer is to one input</li><li>Turning a rough idea into a number you can act on</li><li>Checking a figure someone else quoted</li><li>Any time the same 4 figures keep coming back — the shirts, the jeans and the underwear — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/price-per-round">Price per round</a>, <a href="/everyday-life/price-per-square-inch">Price per square inch</a> and <a href="/everyday-life/price-per-unit">Price per unit</a>.</p>
            TXT],
            ['title' => 'A worked example with these formulas', 'html' => <<<'TXT'
            <p> Enter Planned spending = 240, Shirts = 3, Jeans = 4, Underwear = 5, Other = 6, Laptop = 7, Phone = 8, Calculator = 9, Printer = 10, Other = 2, Daily shoes = 3, Running shoes = 4, PE shoes = 5, Other = 6, Backpack = 7, Notebooks = 8, Writing utensils = 9, Lunch box = 10, Other = 2 and Miscellaneous items = 3. The calculator returns <strong>Total budget</strong> = 0, <strong>Categorya</strong> = 18, <strong>Categoryb</strong> = 36, <strong>Categoryc</strong> = 18, <strong>Categoryd</strong> = 36 and <strong>categorye</strong> = 3.</p><p>The relationship behind those numbers is <strong>Total budget</strong> = <code>budgetA_school + budgetB_school + budgetC_school + budgetD_school + budgetE_school</code>. </p>
            TXT],
            ['title' => 'Practical assumptions and checks', 'html' => <<<'TXT'
            <p>Use the listed categories as a checklist, not as a requirement to buy every item. Add the prices that apply to the student and leave out lines that are already covered, reused or supplied by the school. Check whether the form separates clothing, accessories, supplies or other costs so one purchase is not entered twice. The total is only as complete as the prices and categories you include.</p><p>Shopping costs vary by location, retailer, quality and whether items are new or reused. If the calculator supports multiple children or quantities, verify that shared items are not counted once per student by mistake. For a household budget, make a low/expected/high estimate and add a cushion for replacement items or fees not listed. This is a planning tool, not a price quote or recommendation about what a student needs.</p><p>Before spending, compare the result with the school’s current supply list and any uniform or technology requirements. Those requirements can change by grade and year, while the calculator’s entries are user-provided. Update the values as you receive actual prices rather than treating an earlier estimate as current.</p>
            TXT],
            ['title' => 'Detailed use notes', 'html' => <<<'TXT'
            <p>Make the estimate more useful by separating required purchases from optional upgrades. School lists, uniforms and technology requirements change by grade and by year, and the calculator cannot know which items a student already owns. Enter the quantity and price that actually apply, and avoid counting the same item in both a category subtotal and a separate miscellaneous line.</p><p>Prices should reflect the family’s likely shopping choices and local currency. Reused supplies, hand-me-down clothing and school-provided materials may reduce the budget; replacement items, fees and transport may increase it if they are outside the form. For planning, compare a minimum list with a realistic expected list and keep a modest contingency. Revisit the estimate when the school publishes its current requirements rather than relying on last year’s prices.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Back to school calculator work out?', 'a' => 'It returns total budget, derived from the shirts, the jeans and the underwear.'],
            ['q' => 'What do I need to enter to use the Back to school calculator?', 'a' => 'The form asks for the shirts, the jeans, the underwear and the other, which is 20 fields in total.'],
            ['q' => 'Can I enter total budget in a different unit?', 'a' => 'Yes. Total budget opens in US Dollar and the chip beside it offers 113 units.'],
            ['q' => 'What is a typical result?', 'a' => 'With the values the page starts from, the calculator reports Total budget = 0.'],
        ],
        'related' => [
            ['path' => '/everyday-life/price-per-round', 'name' => 'Price per round'],
            ['path' => '/everyday-life/price-per-square-inch', 'name' => 'Price per square inch'],
            ['path' => '/everyday-life/price-per-unit', 'name' => 'Price per unit'],
        ],
    ],
];
