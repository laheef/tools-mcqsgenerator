<?php

/**
 * BBQ party
 * /food/bbq-party
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'BBQ party',
    'meta' => ['title' => 'BBQ party Calculator — Formula, Units & Example', 'description' => 'Plan barbecue portions and a food budget from guest numbers, menu choices and spending limits. Use as a planning guide; adjust for your guests and menu.', 'h1' => 'BBQ party Calculator', 'updated' => '2026-07-30'],
    'sections' => [
        [
            'title' => 'About the BBQ',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'N_adult',
                            'label' => 'How many adults?',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'N_child',
                            'label' => 'How many kids?',
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
                            'name' => 'hunger_level',
                            'label' => 'How hungry are you?',
                            'type' => 'select',
                            'options' => ['If you insist...' => '500.000000000000000', 'We will eat, but not much' => '750.000000000000000', 'Bring the food!' => '1000.000000000000000', 'I will eat the food, and then the cutlery' => '1500.000000000000000'],
                            'dataset' => 'Hunger Level',
                            'control' => 'DROPDOWN',
                            'default' => 'We will eat, but not much',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'proportionBeef',
                            'label' => 'Want beef?',
                            'type' => 'select',
                            'options' => ['not really' => '0.000000000000000', 'maybe a bit' => '1.000000000000000', 'Yes, please' => '2.000000000000000', 'As much as possible!' => '3.000000000000000'],
                            'dataset' => 'Want this?',
                            'control' => 'DROPDOWN',
                            'default' => 'Yes, please',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'proportionPR',
                            'label' => 'Want pork?',
                            'type' => 'select',
                            'options' => ['not really' => '0.000000000000000', 'maybe a bit' => '1.000000000000000', 'Yes, please' => '2.000000000000000', 'As much as possible!' => '3.000000000000000'],
                            'dataset' => 'Want this?',
                            'control' => 'DROPDOWN',
                            'default' => 'Yes, please',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'proportionVeggies',
                            'label' => 'Want veggies?',
                            'type' => 'select',
                            'options' => ['not really' => '0.000000000000000', 'maybe a bit' => '1.000000000000000', 'Yes, please' => '2.000000000000000', 'As much as possible!' => '3.000000000000000'],
                            'dataset' => 'Want this?',
                            'control' => 'DROPDOWN',
                            'default' => 'Yes, please',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'proportionWings',
                            'label' => 'Want chicken?',
                            'type' => 'select',
                            'options' => ['not really' => '0.000000000000000', 'maybe a bit' => '1.000000000000000', 'Yes, please' => '2.000000000000000', 'As much as possible!' => '3.000000000000000'],
                            'dataset' => 'Want this?',
                            'control' => 'DROPDOWN',
                            'default' => 'Yes, please',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'proportionHD',
                            'label' => 'Want sausages?',
                            'type' => 'select',
                            'options' => ['not really' => '0.000000000000000', 'maybe a bit' => '1.000000000000000', 'Yes, please' => '2.000000000000000', 'As much as possible!' => '3.000000000000000'],
                            'dataset' => 'Want this?',
                            'control' => 'DROPDOWN',
                            'default' => 'Yes, please',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'totalProp',
                            'label' => 'Totalprop',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'budget',
                            'label' => 'Total Budget',
                            'type' => 'number',
                            'suffix' => '$',
                            'help' => 'Prices might vary depending on your choices',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.01'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'place' => [0, 0, 0],
                    'fields' => [
                        [
                            'name' => 'beefKcal',
                            'label' => 'Beefkcal',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '2500', 'when' => null],
                                ['value' => '2500', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                        [
                            'name' => 'veggiesKcal',
                            'label' => 'Veggieskcal',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '650', 'when' => null],
                                ['value' => '650', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                        [
                            'name' => 'PRKcal',
                            'label' => 'Prkcal',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '3100', 'when' => null],
                                ['value' => '3100', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'wingsKcal',
                            'label' => 'Wingskcal',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '2030', 'when' => null],
                                ['value' => '2030', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'HDkcal',
                            'label' => 'Hdkcal',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '1750', 'when' => null],
                                ['value' => '1750', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'budgetBeef',
                            'label' => 'Budgetbeef',
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
                            'name' => 'budgetChicken',
                            'label' => 'Budgetchicken',
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
                            'name' => 'budgetPork',
                            'label' => 'Budgetpork',
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
                            'name' => 'budgetSausages',
                            'label' => 'Budgetsausages',
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
                            'name' => 'budgetVeggies',
                            'label' => 'Budgetveggies',
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
            'title' => 'Prices',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price_Beef',
                            'label' => 'Beef price',
                            'type' => 'number',
                            'prefix' => '$',
                            'unit' => '127',
                            'unit_default' => 'lb',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '10', 'when' => null],
                                ['value' => '10', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price_PR',
                            'label' => 'Pork price',
                            'type' => 'number',
                            'prefix' => '$',
                            'unit' => '128',
                            'unit_default' => 'lb',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '8',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price_Veggies',
                            'label' => 'Veggies price',
                            'type' => 'number',
                            'prefix' => '$',
                            'unit' => '22',
                            'unit_default' => 'lb',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '2.8', 'when' => null],
                                ['value' => '2.8', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price_Wings',
                            'label' => 'Wings price',
                            'type' => 'number',
                            'prefix' => '$',
                            'unit' => '129',
                            'unit_default' => 'lb',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '3',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price_HD',
                            'label' => 'Sausages price',
                            'type' => 'number',
                            'prefix' => '$',
                            'unit' => '131',
                            'unit_default' => 'hotdogBun',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '1',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'So you will need…',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'place' => [0, 0, 0],
                    'fields' => [
                        [
                            'name' => 'beef',
                            'label' => 'Beef',
                            'type' => 'number',
                            'unit' => '127',
                            'unit_default' => 'burgerbun',
                            'readonly' => true,
                            'rounding' => ['omni', '0.1'],
                        ],
                        ['type' => 'image', 'url' => 'BBQ/beef2.jpg'],
                        ['type' => 'note', 'text' => ' Beef budget: ${{budgetBeefMin.formattedValue}} - ${{budgetBeefMax.formattedValue}}'],
                    ],
                ],
                [
                    'columns' => 1,
                    'place' => [0, 0, 0],
                    'fields' => [
                        [
                            'name' => 'veggies',
                            'label' => 'Veggies',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'lb',
                            'readonly' => true,
                            'rounding' => ['omni', '0.1'],
                        ],
                        ['type' => 'image', 'url' => 'BBQ/veggies2.jpg'],
                        ['type' => 'note', 'text' => ' Veggies budget: ${{budgetVeggiesMin.formattedValue}} - ${{budgetVeggiesMax.formattedValue}}'],
                    ],
                ],
                [
                    'columns' => 1,
                    'place' => [0, 0, 0],
                    'fields' => [
                        [
                            'name' => 'porkRibs',
                            'label' => 'Pork',
                            'type' => 'number',
                            'unit' => '128',
                            'unit_default' => 'chopBone',
                            'readonly' => true,
                            'rounding' => ['omni', '0.1'],
                        ],
                        ['type' => 'image', 'url' => 'BBQ/pork2.jpg'],
                        ['type' => 'note', 'text' => ' Pork budget: ${{budgetPorkMin.formattedValue}} - ${{budgetPorkMax.formattedValue}}'],
                    ],
                ],
                [
                    'columns' => 1,
                    'place' => [0, 0, 0],
                    'fields' => [
                        [
                            'name' => 'wings',
                            'label' => 'Chicken',
                            'type' => 'number',
                            'unit' => '129',
                            'unit_default' => 'wings',
                            'readonly' => true,
                            'rounding' => ['omni', '0.1'],
                        ],
                        ['type' => 'image', 'url' => 'BBQ/chickun.jpg'],
                        ['type' => 'note', 'text' => ' Chicken budget: ${{budgetChickenMin.formattedValue}} - ${{budgetChickenMax.formattedValue}}'],
                    ],
                ],
                [
                    'columns' => 1,
                    'place' => [0, 0, 0],
                    'fields' => [
                        [
                            'name' => 'hotdog',
                            'label' => 'Sausages',
                            'type' => 'number',
                            'unit' => '131',
                            'unit_default' => 'hotdogBun',
                            'readonly' => true,
                            'rounding' => ['omni', '0.1'],
                        ],
                        ['type' => 'image', 'url' => 'BBQ/sausages3.jpg'],
                        ['type' => 'note', 'text' => ' Sausages budget: ${{budgetSausagesMin.formattedValue}} - ${{budgetSausagesMax.formattedValue}}'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_food_energy',
                            'label' => 'Total food energy',
                            'type' => 'number',
                            'unit' => '44',
                            'unit_default' => 'kcal',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => ' Estimated total budget: ${{budgetMin.formattedValue}} - ${{budgetMax.formattedValue}}'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Budget ranges',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'budgetBeefMin',
                            'label' => 'Budget beef min',
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
                            'name' => 'budgetBeefMax',
                            'label' => 'Budget beef max',
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
                            'name' => 'budgetPorkMax',
                            'label' => 'Budget pork max',
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
                            'name' => 'budgetPorkMin',
                            'label' => 'Budget pork min',
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
                            'name' => 'budgetChickenMax',
                            'label' => 'Budget chicken max',
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
                            'name' => 'budgetChickenMin',
                            'label' => 'Budget chicken min',
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
                            'name' => 'budgetMax',
                            'label' => 'Budget max',
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
                            'name' => 'budgetMin',
                            'label' => 'Budget min',
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
                            'name' => 'budgetSausagesMax',
                            'label' => 'Budget sausages max',
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
                            'name' => 'budgetSausagesMin',
                            'label' => 'Budget sausages min',
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
                            'name' => 'budgetVeggiesMax',
                            'label' => 'Budget veggies max',
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
                            'name' => 'budgetVeggiesMin',
                            'label' => 'Budget veggies min',
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
            'title' => 'total_food_energy = hunger_level * (N_adult + N_child * 0.5)',
            'results' => ['N_adult' => '-1/2*N_child + total_food_energy/hunger_level', 'hunger_level' => '2*total_food_energy/(2*N_adult + N_child)', 'N_child' => '-2*N_adult + 2*total_food_energy/hunger_level', 'total_food_energy' => '(1/2)*hunger_level*(2*N_adult + N_child)'],
        ],
        [
            'title' => 'budget = budgetBeef + budgetPork + budgetChicken + budgetVeggies + budgetSausages',
            'results' => [
                'budgetVeggies' => 'budget - budgetBeef - budgetChicken - budgetPork - budgetSausages',
                'budget' => 'budgetBeef + budgetChicken + budgetPork + budgetSausages + budgetVeggies',
                'budgetBeef' => 'budget - budgetChicken - budgetPork - budgetSausages - budgetVeggies',
                'budgetSausages' => 'budget - budgetBeef - budgetChicken - budgetPork - budgetVeggies',
                'budgetPork' => 'budget - budgetBeef - budgetChicken - budgetSausages - budgetVeggies',
                'budgetChicken' => 'budget - budgetBeef - budgetPork - budgetSausages - budgetVeggies',
            ],
        ],
        [
            'title' => 'beef = (proportionBeef/totalProp * total_food_energy) / beefKcal',
            'results' => [
                'totalProp' => 'proportionBeef*total_food_energy/(beef*beefKcal)',
                'proportionBeef' => 'beef*beefKcal*totalProp/total_food_energy',
                'total_food_energy' => 'beef*beefKcal*totalProp/proportionBeef',
                'beef' => 'proportionBeef*total_food_energy/(beefKcal*totalProp)',
                'beefKcal' => 'proportionBeef*total_food_energy/(beef*totalProp)',
            ],
        ],
        [
            'title' => 'porkRibs = (proportionPR/totalProp * total_food_energy) / PRKcal',
            'results' => [
                'totalProp' => 'proportionPR*total_food_energy/(PRKcal*porkRibs)',
                'total_food_energy' => 'PRKcal*porkRibs*totalProp/proportionPR',
                'porkRibs' => 'proportionPR*total_food_energy/(PRKcal*totalProp)',
                'proportionPR' => 'PRKcal*porkRibs*totalProp/total_food_energy',
                'PRKcal' => 'proportionPR*total_food_energy/(porkRibs*totalProp)',
            ],
        ],
        [
            'title' => 'veggies = (proportionVeggies/totalProp * total_food_energy) / veggiesKcal',
            'results' => [
                'totalProp' => 'proportionVeggies*total_food_energy/(veggies*veggiesKcal)',
                'veggies' => 'proportionVeggies*total_food_energy/(totalProp*veggiesKcal)',
                'total_food_energy' => 'totalProp*veggies*veggiesKcal/proportionVeggies',
                'proportionVeggies' => 'totalProp*veggies*veggiesKcal/total_food_energy',
                'veggiesKcal' => 'proportionVeggies*total_food_energy/(totalProp*veggies)',
            ],
        ],
        [
            'title' => 'wings = (proportionWings/totalProp * total_food_energy) / wingsKcal',
            'results' => [
                'totalProp' => 'proportionWings*total_food_energy/(wings*wingsKcal)',
                'total_food_energy' => 'totalProp*wings*wingsKcal/proportionWings',
                'wingsKcal' => 'proportionWings*total_food_energy/(totalProp*wings)',
                'wings' => 'proportionWings*total_food_energy/(totalProp*wingsKcal)',
                'proportionWings' => 'totalProp*wings*wingsKcal/total_food_energy',
            ],
        ],
        [
            'title' => 'totalProp = proportionWings + proportionVeggies + proportionPR + proportionBeef + proportionHD',
            'results' => [
                'totalProp' => 'proportionBeef + proportionHD + proportionPR + proportionVeggies + proportionWings',
                'proportionHD' => '-proportionBeef - proportionPR - proportionVeggies - proportionWings + totalProp',
                'proportionBeef' => '-proportionHD - proportionPR - proportionVeggies - proportionWings + totalProp',
                'proportionPR' => '-proportionBeef - proportionHD - proportionVeggies - proportionWings + totalProp',
                'proportionVeggies' => '-proportionBeef - proportionHD - proportionPR - proportionWings + totalProp',
                'proportionWings' => '-proportionBeef - proportionHD - proportionPR - proportionVeggies + totalProp',
            ],
        ],
        [
            'title' => 'hotdog = (proportionHD/totalProp * total_food_energy) / HDkcal',
            'results' => [
                'totalProp' => 'proportionHD*total_food_energy/(HDkcal*hotdog)',
                'proportionHD' => 'HDkcal*hotdog*totalProp/total_food_energy',
                'HDkcal' => 'proportionHD*total_food_energy/(hotdog*totalProp)',
                'total_food_energy' => 'HDkcal*hotdog*totalProp/proportionHD',
                'hotdog' => 'proportionHD*total_food_energy/(HDkcal*totalProp)',
            ],
        ],
        [
            'title' => 'budgetBeef = beef * price_Beef',
            'results' => ['beef' => 'budgetBeef/price_Beef', 'price_Beef' => 'budgetBeef/beef', 'budgetBeef' => 'beef*price_Beef'],
        ],
        [
            'title' => 'budgetPork = porkRibs * price_PR',
            'results' => ['budgetPork' => 'porkRibs*price_PR', 'price_PR' => 'budgetPork/porkRibs', 'porkRibs' => 'budgetPork/price_PR'],
        ],
        [
            'title' => 'budgetChicken = wings * price_Wings',
            'results' => ['price_Wings' => 'budgetChicken/wings', 'wings' => 'budgetChicken/price_Wings', 'budgetChicken' => 'price_Wings*wings'],
        ],
        [
            'title' => 'budgetVeggies = veggies * price_Veggies',
            'results' => ['price_Veggies' => 'budgetVeggies/veggies', 'veggies' => 'budgetVeggies/price_Veggies', 'budgetVeggies' => 'price_Veggies*veggies'],
        ],
        [
            'title' => 'budgetSausages = hotdog * price_HD',
            'results' => ['budgetSausages' => 'hotdog*price_HD', 'hotdog' => 'budgetSausages/price_HD', 'price_HD' => 'budgetSausages/hotdog'],
        ],
        [
            'title' => 'budgetBeefMin = 0.8 * budgetBeef',
            'results' => ['budgetBeefMin' => '(4/5)*budgetBeef', 'budgetBeef' => '(5/4)*budgetBeefMin'],
        ],
        [
            'title' => 'budgetBeefMax = 1.2 * budgetBeef',
            'results' => ['budgetBeefMax' => '(6/5)*budgetBeef', 'budgetBeef' => '(5/6)*budgetBeefMax'],
        ],
        [
            'title' => 'budgetPorkMin = 0.8 * budgetPork',
            'results' => ['budgetPork' => '(5/4)*budgetPorkMin', 'budgetPorkMin' => '(4/5)*budgetPork'],
        ],
        [
            'title' => 'budgetPorkMax = 1.2 * budgetPork',
            'results' => ['budgetPork' => '(5/6)*budgetPorkMax', 'budgetPorkMax' => '(6/5)*budgetPork'],
        ],
        [
            'title' => 'budgetVeggiesMin = 0.8 * budgetVeggies',
            'results' => ['budgetVeggiesMin' => '(4/5)*budgetVeggies', 'budgetVeggies' => '(5/4)*budgetVeggiesMin'],
        ],
        [
            'title' => 'budgetVeggiesMax = 1.2 * budgetVeggies',
            'results' => ['budgetVeggiesMax' => '(6/5)*budgetVeggies', 'budgetVeggies' => '(5/6)*budgetVeggiesMax'],
        ],
        [
            'title' => 'budgetChickenMin = 0.8 * budgetChicken ',
            'results' => ['budgetChickenMin' => '(4/5)*budgetChicken', 'budgetChicken' => '(5/4)*budgetChickenMin'],
        ],
        [
            'title' => 'budgetChickenMax = 1.2 * budgetChicken',
            'results' => ['budgetChickenMax' => '(6/5)*budgetChicken', 'budgetChicken' => '(5/6)*budgetChickenMax'],
        ],
        [
            'title' => 'budgetSausagesMin = 0.8 * budgetSausages',
            'results' => ['budgetSausages' => '(5/4)*budgetSausagesMin', 'budgetSausagesMin' => '(4/5)*budgetSausages'],
        ],
        [
            'title' => 'budgetSausagesMax = 1.2 * budgetSausages',
            'results' => ['budgetSausages' => '(5/6)*budgetSausagesMax', 'budgetSausagesMax' => '(6/5)*budgetSausages'],
        ],
        [
            'title' => 'budgetMin = 0.8 * budget',
            'results' => ['budget' => '(5/4)*budgetMin', 'budgetMin' => '(4/5)*budget'],
        ],
        [
            'title' => 'budgetMax = 1.2 * budget',
            'results' => ['budget' => '(5/6)*budgetMax', 'budgetMax' => '(6/5)*budget'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        BBQ party takes How many adults?, How many kids? and How hungry are you? and returns Beef and Veggies. The arithmetic is the whole method: beef is worked out from how many adults? by one formula, applied once. Beef comes back in burgers (patty + bun) unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the BBQ party calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind BBQ party: it takes 37 numbers and reports Beef, Veggies and Pork.</p><p>The relationship it solves reads Total food energy = (1 ÷ 2) × How hungry are you? × (2 × How many adults? + How many kids?).</p><p>The answers are Beef, Veggies, Pork and Chicken; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 37 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>How many adults?</strong> — a plain number, no unit</li><li><strong>How many kids?</strong> — a plain number, no unit</li><li><strong>How hungry are you?</strong> — a plain number, no unit</li><li><strong>Want beef?</strong> — a plain number, no unit</li><li><strong>Want pork?</strong> — a plain number, no unit</li><li><strong>Want veggies?</strong> — a plain number, no unit</li><li><strong>Want chicken?</strong> — a plain number, no unit</li><li><strong>Want sausages?</strong> — a plain number, no unit</li><li><strong>Totalprop</strong> — a plain number, no unit</li><li><strong>Total Budget</strong> — in $. Prices might vary depending on your choices</li><li><strong>Beefkcal</strong> — in kilograms</li><li><strong>Veggieskcal</strong> — in kilograms</li><li><strong>Prkcal</strong> — in kilograms</li><li><strong>Wingskcal</strong> — in kilograms</li><li><strong>Hdkcal</strong> — in kilograms</li><li><strong>Budgetbeef</strong> — in USD</li><li><strong>Budgetchicken</strong> — in USD</li><li><strong>Budgetpork</strong> — in USD</li><li><strong>Budgetsausages</strong> — in USD</li><li><strong>Budgetveggies</strong> — in USD</li><li><strong>Beef price</strong> — in pounds of beef</li><li><strong>Pork price</strong> — in pounds</li><li><strong>Veggies price</strong> — in pounds</li><li><strong>Wings price</strong> — in pounds</li><li><strong>Sausages price</strong> — in hot dogs (w/ bun)</li><li><strong>Budget beef min</strong> — in USD</li><li><strong>Budget beef max</strong> — in USD</li><li><strong>Budget pork max</strong> — in USD</li><li><strong>Budget pork min</strong> — in USD</li><li><strong>Budget chicken max</strong> — in USD</li><li><strong>Budget chicken min</strong> — in USD</li><li><strong>Budget max</strong> — in USD</li><li><strong>Budget min</strong> — in USD</li><li><strong>Budget sausages max</strong> — in USD</li><li><strong>Budget sausages min</strong> — in USD</li><li><strong>Budget veggies max</strong> — in USD</li><li><strong>Budget veggies min</strong> — in USD</li></ul><p>What you get back is Beef in burgers (patty + bun), Veggies in pounds, Pork in pork chops (with bone), Chicken in wings, Sausages in hot dogs (w/ bun), Total food energy in kilocalories, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, How many adults? = 10, How many kids? = 100, How hungry are you? = 750, Want beef? = 2, Want pork? = 2, Want veggies? = 2, Want chicken? = 2, Want sausages? = 2, Totalprop = 1000, Total Budget = 10 $, Beefkcal = 2500 kg, Veggieskcal = 650 kg, Prkcal = 3100 kg, Wingskcal = 2030 kg, Hdkcal = 1750 kg, Budgetbeef = 10 USD, Budgetchicken = 100 USD, Budgetpork = 1000 USD, Budgetsausages = 10 USD, Beef price = 10 lb, Pork price = 8 lb, Veggies price = 2.8 lb, Wings price = 3 lb, Sausages price = 1 hotdogBun, Budget beef min = 10 USD, Budget beef max = 100 USD, Budget pork max = 1000 USD, Budget pork min = 10 USD, Budget chicken max = 100 USD, Budget chicken min = 1000 USD, Budget max = 10 USD, Budget min = 100 USD, Budget sausages max = 1000 USD, Budget sausages min = 10 USD, Budget veggies max = 100 USD and Budget veggies min = 1000 USD; the answers are <strong>Total food energy</strong> = 45000 kcal, <strong>Budgetveggies</strong> = -1110 USD, <strong>Beef</strong> = 0.036 burgerbun, <strong>Pork</strong> = 0.029 chopBone, <strong>Veggies</strong> = 0.1385 lb, <strong>Chicken</strong> = 0.0443 wings and <strong>Sausages</strong> = 0.0514 hotdogBun.</p><ul><li><strong>Total food energy</strong> = 45000 kcal</li><li><strong>Budgetveggies</strong> = -1110 USD</li><li><strong>Beef</strong> = 0.036 burgerbun</li><li><strong>Pork</strong> = 0.029 chopBone</li><li><strong>Veggies</strong> = 0.1385 lb</li><li><strong>Chicken</strong> = 0.0443 wings</li><li><strong>Sausages</strong> = 0.0514 hotdogBun</li></ul><p>That is <strong>Total food energy</strong> = <code>(1 ÷ 2) × How hungry are you? × (2 × How many adults? + How many kids?)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Total food energy</strong> = 45000, <strong>Budgetveggies</strong> = -1110, <strong>Beef</strong> = 0.036, <strong>Pork</strong> = 0.029, <strong>Veggies</strong> = 0.1385, <strong>Chicken</strong> = 0.0443 and <strong>Sausages</strong> = 0.0514 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Beef offers 10 units and opens on burgers (patty + bun), so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Total food energy</strong> = <code>(1 ÷ 2) × How hungry are you? × (2 × How many adults? + How many kids?)</code></li><li><strong>How many adults?</strong> = <code>− 1 ÷ 2 × How many kids? + Total food energy ÷ How hungry are you?</code></li><li><strong>How hungry are you?</strong> = <code>2 × Total food energy ÷ (2 × How many adults? + How many kids?)</code></li><li><strong>How many kids?</strong> = <code>− 2 × How many adults? + 2 × Total food energy ÷ How hungry are you?</code></li><li><strong>Total Budget</strong> = <code>Budgetbeef + Budgetchicken + Budgetpork + Budgetsausages + Budgetveggies</code></li><li><strong>Budgetveggies</strong> = <code>Total Budget − Budgetbeef − Budgetchicken − Budgetpork − Budgetsausages</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Total food energy</strong> = <code>(1 ÷ 2) × How hungry are you? × (2 × How many adults? + How many kids?)</code> — the form to use when How hungry are you?, How many adults? and How many kids? are the values you have.</li><li><strong>How many adults?</strong> = <code>− 1 ÷ 2 × How many kids? + Total food energy ÷ How hungry are you?</code> — the form to use when How many kids?, Total food energy and How hungry are you? are the values you have.</li><li><strong>How hungry are you?</strong> = <code>2 × Total food energy ÷ (2 × How many adults? + How many kids?)</code> — the form to use when Total food energy, How many adults? and How many kids? are the values you have.</li><li><strong>How many kids?</strong> = <code>− 2 × How many adults? + 2 × Total food energy ÷ How hungry are you?</code> — the form to use when How many adults?, Total food energy and How hungry are you? are the values you have.</li><li><strong>Total Budget</strong> = <code>Budgetbeef + Budgetchicken + Budgetpork + Budgetsausages + Budgetveggies</code> — the form to use when Budgetbeef, Budgetchicken, Budgetpork and Budgetsausages are the values you have.</li><li><strong>Budgetveggies</strong> = <code>Total Budget − Budgetbeef − Budgetchicken − Budgetpork − Budgetsausages</code> — the form to use when Total Budget, Budgetbeef, Budgetchicken and Budgetpork are the values you have.</li><li><strong>Budgetbeef</strong> = <code>Total Budget − Budgetchicken − Budgetpork − Budgetsausages − Budgetveggies</code> — the form to use when Total Budget, Budgetchicken, Budgetpork and Budgetsausages are the values you have.</li><li><strong>Budgetsausages</strong> = <code>Total Budget − Budgetbeef − Budgetchicken − Budgetpork − Budgetveggies</code> — the form to use when Total Budget, Budgetbeef, Budgetchicken and Budgetpork are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Total food energy, How many adults? and How hungry are you? can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — How many adults?, from 10 to 20 — and the answers go from <strong>Total food energy</strong> 45000 kcal, <strong>Budgetveggies</strong> -1110 USD, <strong>Beef</strong> 0.036 burgerbun, <strong>Pork</strong> 0.029 chopBone, <strong>Veggies</strong> 0.1385 lb, <strong>Chicken</strong> 0.0443 wings and <strong>Sausages</strong> 0.0514 hotdogBun to <strong>Total food energy</strong> 52500 kcal, <strong>Budgetveggies</strong> -1110 USD, <strong>Beef</strong> 0.042 burgerbun, <strong>Pork</strong> 0.0339 chopBone, <strong>Veggies</strong> 0.1615 lb, <strong>Chicken</strong> 0.0517 wings and <strong>Sausages</strong> 0.06 hotdogBun.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Beefkcal, Veggieskcal and Prkcal is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Beef, Veggies and Pork are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>How many adults? left as a guess.</strong> If How many adults? is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>How many kids? left as a guess.</strong> If How many kids? is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Convert How many adults? to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have How many adults?, How many kids?, How hungry are you? and Want beef? ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with How many adults? — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Beef in burgerbun against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. </p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Beef follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover burgers (patty + bun), pounds and pork chops (with bone). A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are How many adults?, How many kids? and How hungry are you? and the number you are missing is Beef and Veggies.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related calculators: <a href="/food/bbq-grill-size">BBQ grill size</a>, <a href="/food/taco-bar">Taco bar</a> and <a href="/food/party-drink">Party drink</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what BBQ party is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put How many adults?, How many kids?, How hungry are you? and Want beef? beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. </p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the BBQ party calculator work out?', 'a' => <<<'TXT'
            Beef, Veggies, Pork and Chicken, from How hungry are you?, How many adults? and How many kids?. The relationship is Total food energy = (1 ÷ 2) × How hungry are you? × (2 × How many adults? + How many kids?).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            How many adults?, How many kids?, How hungry are you?, Want beef?, Want pork?. With how many adults?, how many kids? and how hungry are you? in place, Beef can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Total food energy, How many adults?, How hungry are you? and How many kids? can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'Are the BBQ party results exact?', 'a' => 'No. It estimates from the guest count and selections shown; appetite, menu, portions and serving style vary. Use the result as a planning starting point and adjust for your event.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Beef is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave How many adults? blank and the page solves for it, reporting Beef instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Beef keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/food/bbq-grill-size', 'name' => 'BBQ grill size'],
            ['path' => '/food/taco-bar', 'name' => 'Taco bar'],
            ['path' => '/food/party-drink', 'name' => 'Party drink']
        ],
    ],
];
