<?php

/**
 * Cake pricing
 * /food/cake-pricing
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cake pricing',
    'meta' => ['title' => 'Cake pricing Calculator — Formula, Units & Example', 'description' => 'Estimate cake ingredient costs and a selling price from ingredient amounts, prices and other expenses. Check units and follow the recipe or package directions.', 'h1' => 'Cake pricing Calculator', 'updated' => '2026-08-21'],
    'sections' => [
        [
            'title' => 'Select your ingredients',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'flour_yes_no',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Flour' => '1', '' => '0'],
                            'dataset' => 'flour_CB',
                            'control' => 'CHECKBOX',
                            'default' => 'Flour',
                        ],
                        [
                            'name' => 'sugar_yes_no',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Sugar' => '1', '' => '0'],
                            'dataset' => 'sugar_CB',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'milk_yes_no',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Milk' => '1', '' => '0'],
                            'dataset' => 'milk_CB',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                        [
                            'name' => 'eggs_yes_no',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Eggs' => '1', '' => '0'],
                            'dataset' => 'eggs_CB',
                            'control' => 'CHECKBOX',
                            'default' => 'Eggs',
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'oil_yes_no',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Cooking oil' => '1', '' => '0'],
                            'dataset' => 'oil_CB',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                        [
                            'name' => 'butter_yes_no',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Butter' => '1', '' => '0'],
                            'dataset' => 'butter_CB',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'yeast_yes_no',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Yeast' => '1', '' => '0'],
                            'dataset' => 'yeast_CB',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                        [
                            'name' => 'baking_powder_yes_no',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Baking powder' => '1', '' => '0'],
                            'dataset' => 'baking_powder_CB',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'cream_cheese_yes_no',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Cream chesse' => '1', '' => '0'],
                            'dataset' => 'cream_cheese_CB',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                        [
                            'name' => 'sour_cream_yes_no',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Sour cream' => '1', '' => '0'],
                            'dataset' => 'sour_cream_CB',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'cacao_yes_no',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Cacao' => '1', '' => '0'],
                            'dataset' => 'cacao_CB',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                        [
                            'name' => 'chocolate_yes_no',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Chocolate' => '1', '' => '0'],
                            'dataset' => 'chocolate_CB',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'vanilla_yes_no',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Vanilla' => '1', '' => '0'],
                            'dataset' => 'vanilla_CB',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                        [
                            'name' => 'fruit_yes_no',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Fresh fruit' => '1', '' => '0'],
                            'dataset' => 'fruit_CB',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'other_yes_no',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Other' => '1', '' => '0'],
                            'dataset' => 'other_CB',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => ' Customize a cake pricing tool  tailored to your ingredients and labor costs.'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Ingredients amount and price ',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'flour',
                            'label' => 'Flour',
                            'type' => 'number',
                            'unit' => '432',
                            'unit_default' => 'cup_flour',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'flour_price',
                            'label' => 'Flour price',
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
                            'name' => 'sugar',
                            'label' => 'Sugar',
                            'type' => 'number',
                            'unit' => '432',
                            'unit_default' => 'g',
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
                            'name' => 'sugar_price',
                            'label' => 'Sugar price',
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
                            'name' => 'milk',
                            'label' => 'Milk (cow, plant-based)',
                            'type' => 'number',
                            'unit' => '432',
                            'unit_default' => 'cup_milk',
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
                            'name' => 'milk_price',
                            'label' => 'Milk price',
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
                            'name' => 'eggs',
                            'label' => 'Eggs ',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'eggs_price',
                            'label' => 'Eggs price',
                            'type' => 'number',
                            'suffix' => '/egg',
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
                            'name' => 'oil',
                            'label' => 'Oil',
                            'type' => 'number',
                            'unit' => '432',
                            'unit_default' => 'cup_oil',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'oil_price',
                            'label' => 'Oil price',
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
                            'name' => 'butter',
                            'label' => 'Butter ',
                            'type' => 'number',
                            'suffix' => 'sticks',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'butter_price',
                            'label' => 'Butter price',
                            'type' => 'number',
                            'suffix' => '/stick',
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
                            'name' => 'yeast',
                            'label' => 'Yeast',
                            'type' => 'number',
                            'suffix' => 'tsps',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'yeast_price',
                            'label' => 'Yeast price',
                            'type' => 'number',
                            'suffix' => '/tsp',
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
                            'name' => 'baking_powder',
                            'label' => 'Baking powder',
                            'type' => 'number',
                            'suffix' => 'tsps',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'powder_price',
                            'label' => 'Powder price',
                            'type' => 'number',
                            'suffix' => '/tsp',
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
                            'name' => 'cream_cheese',
                            'label' => 'Cream cheese',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
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
                            'name' => 'cream_cheese_price',
                            'label' => 'Cream cheese price',
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
                            'name' => 'sour_cream',
                            'label' => 'Sour cream',
                            'type' => 'number',
                            'unit' => '432',
                            'unit_default' => 'cup_milk',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sour_cream_price',
                            'label' => 'Sour cream price',
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
                            'name' => 'cacao',
                            'label' => 'Cacao powder',
                            'type' => 'number',
                            'suffix' => 'tbsps',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cacao_price',
                            'label' => 'Cacao price',
                            'type' => 'number',
                            'suffix' => '/tbsp',
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
                            'name' => 'chocolate',
                            'label' => 'Chocolate',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'chocolate_price',
                            'label' => 'Chocolate price',
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
                            'name' => 'vanilla',
                            'label' => 'Vanilla (powder, paste, extract)',
                            'type' => 'number',
                            'suffix' => 'tsps',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'vanilla_price',
                            'label' => 'Vanilla price',
                            'type' => 'number',
                            'suffix' => '/tsp',
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
                            'name' => 'fruit',
                            'label' => 'Fresh fruit',
                            'type' => 'number',
                            'suffix' => 'cups',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fruit_price',
                            'label' => 'Fresh fruit price',
                            'type' => 'number',
                            'suffix' => '/cup',
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
                            'name' => 'other_price',
                            'label' => 'Price of the other ingredients',
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
                            'name' => 'total_ingredients_cost',
                            'label' => 'Total ingredients cost',
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
            'title' => 'Equipment, boxes &amp; electricity ',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'equipment',
                            'label' => 'Equipment (oven, pans etc.) rental ',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'boxes',
                            'label' => 'Number of boxes  ',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'pricebox',
                            'label' => 'Price per box  ',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'electricity_cost_unit',
                            'label' => 'Electricity cost per unit ',
                            'type' => 'number',
                            'help' => 'The average electricity rate in the US is 10.42 cents per kWh.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                        [
                            'name' => 'electricity_unit',
                            'label' => 'Units of electricity used ',
                            'type' => 'number',
                            'suffix' => 'kWh',
                            'help' => 'kWh - kilowatt-hour',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'other_supplies',
                            'label' => 'Other supplies',
                            'type' => 'number',
                            'help' => 'Add the cost of any other additional supplies.',
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
            'title' => 'Time ⏰',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hours',
                            'label' => 'I spent',
                            'type' => 'number',
                            'suffix' => 'hours',
                            'help' => 'You deserve be paid fairly for the time you spent baking. Add the hours you spent sampling, planning and cleaning-up!',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price_hrs',
                            'label' => 'Cost of one working hour',
                            'type' => 'number',
                            'help' => 'How much would you like to be paid for each hour spent on making this cake?',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Delivery ',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'miles',
                            'label' => 'Distance',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'km',
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
                            'name' => 'price_mls',
                            'label' => 'at',
                            'type' => 'number',
                            'help' => 'According to the Internal Revenue Service, the standard rate for driving a business vehicle is $0.56 per mile.',
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
            'title' => 'Total cost ',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'n_of_people',
                            'label' => 'Cake servings',
                            'type' => 'number',
                            'help' => 'How many people does the cake serve?',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_cost_cake',
                            'label' => 'Total cost of making the cake',
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
                            'name' => 'serving',
                            'label' => 'Price per serving',
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
            'title' => 'Always hidden variables',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'overhead',
                            'label' => '',
                            'type' => 'number',
                            'help' => 'Add the cost of electricity, ovens, etc. Remember about the fee to use the equipment!',
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
                            'name' => 'supplies',
                            'label' => 'Supplies',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'time',
                            'label' => 'Time',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'delivery',
                            'label' => 'Delivery',
                            'type' => 'number',
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
            total_ingredients_cost = baking_powder*powder_price + chocolate*chocolate_price + cacao*cacao_price + eggs*eggs_price + flour*flour_price + milk*milk_price + fruit*fruit_price + sugar*sugar_price + oil*oil_price + yeast*yeast_price + butter * butter_price + vanilla*vanilla_price + cream_cheese*cream_cheese_price + sour_cream*sour_cream_price + other_price
            TXT,
            'results' => [
                'chocolate' => <<<'TXT'
                (-baking_powder*powder_price - butter*butter_price - cacao*cacao_price - cream_cheese*cream_cheese_price - eggs*eggs_price - flour*flour_price - fruit*fruit_price - milk*milk_price - oil*oil_price - other_price - sour_cream*sour_cream_price - sugar*sugar_price + total_ingredients_cost - vanilla*vanilla_price - yeast*yeast_price)/chocolate_price
                TXT,
                'yeast' => <<<'TXT'
                (-baking_powder*powder_price - butter*butter_price - cacao*cacao_price - chocolate*chocolate_price - cream_cheese*cream_cheese_price - eggs*eggs_price - flour*flour_price - fruit*fruit_price - milk*milk_price - oil*oil_price - other_price - sour_cream*sour_cream_price - sugar*sugar_price + total_ingredients_cost - vanilla*vanilla_price)/yeast_price
                TXT,
                'vanilla_price' => <<<'TXT'
                (-baking_powder*powder_price - butter*butter_price - cacao*cacao_price - chocolate*chocolate_price - cream_cheese*cream_cheese_price - eggs*eggs_price - flour*flour_price - fruit*fruit_price - milk*milk_price - oil*oil_price - other_price - sour_cream*sour_cream_price - sugar*sugar_price + total_ingredients_cost - yeast*yeast_price)/vanilla
                TXT,
                'sugar' => <<<'TXT'
                (-baking_powder*powder_price - butter*butter_price - cacao*cacao_price - chocolate*chocolate_price - cream_cheese*cream_cheese_price - eggs*eggs_price - flour*flour_price - fruit*fruit_price - milk*milk_price - oil*oil_price - other_price - sour_cream*sour_cream_price + total_ingredients_cost - vanilla*vanilla_price - yeast*yeast_price)/sugar_price
                TXT,
                'fruit_price' => <<<'TXT'
                (-baking_powder*powder_price - butter*butter_price - cacao*cacao_price - chocolate*chocolate_price - cream_cheese*cream_cheese_price - eggs*eggs_price - flour*flour_price - milk*milk_price - oil*oil_price - other_price - sour_cream*sour_cream_price - sugar*sugar_price + total_ingredients_cost - vanilla*vanilla_price - yeast*yeast_price)/fruit
                TXT,
                'sugar_price' => <<<'TXT'
                (-baking_powder*powder_price - butter*butter_price - cacao*cacao_price - chocolate*chocolate_price - cream_cheese*cream_cheese_price - eggs*eggs_price - flour*flour_price - fruit*fruit_price - milk*milk_price - oil*oil_price - other_price - sour_cream*sour_cream_price + total_ingredients_cost - vanilla*vanilla_price - yeast*yeast_price)/sugar
                TXT,
                'fruit' => <<<'TXT'
                (-baking_powder*powder_price - butter*butter_price - cacao*cacao_price - chocolate*chocolate_price - cream_cheese*cream_cheese_price - eggs*eggs_price - flour*flour_price - milk*milk_price - oil*oil_price - other_price - sour_cream*sour_cream_price - sugar*sugar_price + total_ingredients_cost - vanilla*vanilla_price - yeast*yeast_price)/fruit_price
                TXT,
                'milk' => <<<'TXT'
                (-baking_powder*powder_price - butter*butter_price - cacao*cacao_price - chocolate*chocolate_price - cream_cheese*cream_cheese_price - eggs*eggs_price - flour*flour_price - fruit*fruit_price - oil*oil_price - other_price - sour_cream*sour_cream_price - sugar*sugar_price + total_ingredients_cost - vanilla*vanilla_price - yeast*yeast_price)/milk_price
                TXT,
                'eggs' => <<<'TXT'
                (-baking_powder*powder_price - butter*butter_price - cacao*cacao_price - chocolate*chocolate_price - cream_cheese*cream_cheese_price - flour*flour_price - fruit*fruit_price - milk*milk_price - oil*oil_price - other_price - sour_cream*sour_cream_price - sugar*sugar_price + total_ingredients_cost - vanilla*vanilla_price - yeast*yeast_price)/eggs_price
                TXT,
                'cream_cheese_price' => <<<'TXT'
                (-baking_powder*powder_price - butter*butter_price - cacao*cacao_price - chocolate*chocolate_price - eggs*eggs_price - flour*flour_price - fruit*fruit_price - milk*milk_price - oil*oil_price - other_price - sour_cream*sour_cream_price - sugar*sugar_price + total_ingredients_cost - vanilla*vanilla_price - yeast*yeast_price)/cream_cheese
                TXT,
                'other_price' => <<<'TXT'
                -baking_powder*powder_price - butter*butter_price - cacao*cacao_price - chocolate*chocolate_price - cream_cheese*cream_cheese_price - eggs*eggs_price - flour*flour_price - fruit*fruit_price - milk*milk_price - oil*oil_price - sour_cream*sour_cream_price - sugar*sugar_price + total_ingredients_cost - vanilla*vanilla_price - yeast*yeast_price
                TXT,
                'flour' => <<<'TXT'
                (-baking_powder*powder_price - butter*butter_price - cacao*cacao_price - chocolate*chocolate_price - cream_cheese*cream_cheese_price - eggs*eggs_price - fruit*fruit_price - milk*milk_price - oil*oil_price - other_price - sour_cream*sour_cream_price - sugar*sugar_price + total_ingredients_cost - vanilla*vanilla_price - yeast*yeast_price)/flour_price
                TXT,
                'chocolate_price' => <<<'TXT'
                (-baking_powder*powder_price - butter*butter_price - cacao*cacao_price - cream_cheese*cream_cheese_price - eggs*eggs_price - flour*flour_price - fruit*fruit_price - milk*milk_price - oil*oil_price - other_price - sour_cream*sour_cream_price - sugar*sugar_price + total_ingredients_cost - vanilla*vanilla_price - yeast*yeast_price)/chocolate
                TXT,
                'sour_cream_price' => <<<'TXT'
                (-baking_powder*powder_price - butter*butter_price - cacao*cacao_price - chocolate*chocolate_price - cream_cheese*cream_cheese_price - eggs*eggs_price - flour*flour_price - fruit*fruit_price - milk*milk_price - oil*oil_price - other_price - sugar*sugar_price + total_ingredients_cost - vanilla*vanilla_price - yeast*yeast_price)/sour_cream
                TXT,
                'total_ingredients_cost' => <<<'TXT'
                baking_powder*powder_price + butter*butter_price + cacao*cacao_price + chocolate*chocolate_price + cream_cheese*cream_cheese_price + eggs*eggs_price + flour*flour_price + fruit*fruit_price + milk*milk_price + oil*oil_price + other_price + sour_cream*sour_cream_price + sugar*sugar_price + vanilla*vanilla_price + yeast*yeast_price
                TXT,
                'oil' => <<<'TXT'
                (-baking_powder*powder_price - butter*butter_price - cacao*cacao_price - chocolate*chocolate_price - cream_cheese*cream_cheese_price - eggs*eggs_price - flour*flour_price - fruit*fruit_price - milk*milk_price - other_price - sour_cream*sour_cream_price - sugar*sugar_price + total_ingredients_cost - vanilla*vanilla_price - yeast*yeast_price)/oil_price
                TXT,
                'milk_price' => <<<'TXT'
                (-baking_powder*powder_price - butter*butter_price - cacao*cacao_price - chocolate*chocolate_price - cream_cheese*cream_cheese_price - eggs*eggs_price - flour*flour_price - fruit*fruit_price - oil*oil_price - other_price - sour_cream*sour_cream_price - sugar*sugar_price + total_ingredients_cost - vanilla*vanilla_price - yeast*yeast_price)/milk
                TXT,
                'flour_price' => <<<'TXT'
                (-baking_powder*powder_price - butter*butter_price - cacao*cacao_price - chocolate*chocolate_price - cream_cheese*cream_cheese_price - eggs*eggs_price - fruit*fruit_price - milk*milk_price - oil*oil_price - other_price - sour_cream*sour_cream_price - sugar*sugar_price + total_ingredients_cost - vanilla*vanilla_price - yeast*yeast_price)/flour
                TXT,
                'vanilla' => <<<'TXT'
                (-baking_powder*powder_price - butter*butter_price - cacao*cacao_price - chocolate*chocolate_price - cream_cheese*cream_cheese_price - eggs*eggs_price - flour*flour_price - fruit*fruit_price - milk*milk_price - oil*oil_price - other_price - sour_cream*sour_cream_price - sugar*sugar_price + total_ingredients_cost - yeast*yeast_price)/vanilla_price
                TXT,
                'sour_cream' => <<<'TXT'
                (-baking_powder*powder_price - butter*butter_price - cacao*cacao_price - chocolate*chocolate_price - cream_cheese*cream_cheese_price - eggs*eggs_price - flour*flour_price - fruit*fruit_price - milk*milk_price - oil*oil_price - other_price - sugar*sugar_price + total_ingredients_cost - vanilla*vanilla_price - yeast*yeast_price)/sour_cream_price
                TXT,
                'eggs_price' => <<<'TXT'
                (-baking_powder*powder_price - butter*butter_price - cacao*cacao_price - chocolate*chocolate_price - cream_cheese*cream_cheese_price - flour*flour_price - fruit*fruit_price - milk*milk_price - oil*oil_price - other_price - sour_cream*sour_cream_price - sugar*sugar_price + total_ingredients_cost - vanilla*vanilla_price - yeast*yeast_price)/eggs
                TXT,
                'cacao' => <<<'TXT'
                (-baking_powder*powder_price - butter*butter_price - chocolate*chocolate_price - cream_cheese*cream_cheese_price - eggs*eggs_price - flour*flour_price - fruit*fruit_price - milk*milk_price - oil*oil_price - other_price - sour_cream*sour_cream_price - sugar*sugar_price + total_ingredients_cost - vanilla*vanilla_price - yeast*yeast_price)/cacao_price
                TXT,
                'butter_price' => <<<'TXT'
                (-baking_powder*powder_price - cacao*cacao_price - chocolate*chocolate_price - cream_cheese*cream_cheese_price - eggs*eggs_price - flour*flour_price - fruit*fruit_price - milk*milk_price - oil*oil_price - other_price - sour_cream*sour_cream_price - sugar*sugar_price + total_ingredients_cost - vanilla*vanilla_price - yeast*yeast_price)/butter
                TXT,
                'cacao_price' => <<<'TXT'
                (-baking_powder*powder_price - butter*butter_price - chocolate*chocolate_price - cream_cheese*cream_cheese_price - eggs*eggs_price - flour*flour_price - fruit*fruit_price - milk*milk_price - oil*oil_price - other_price - sour_cream*sour_cream_price - sugar*sugar_price + total_ingredients_cost - vanilla*vanilla_price - yeast*yeast_price)/cacao
                TXT,
                'butter' => <<<'TXT'
                (-baking_powder*powder_price - cacao*cacao_price - chocolate*chocolate_price - cream_cheese*cream_cheese_price - eggs*eggs_price - flour*flour_price - fruit*fruit_price - milk*milk_price - oil*oil_price - other_price - sour_cream*sour_cream_price - sugar*sugar_price + total_ingredients_cost - vanilla*vanilla_price - yeast*yeast_price)/butter_price
                TXT,
                'yeast_price' => <<<'TXT'
                (-baking_powder*powder_price - butter*butter_price - cacao*cacao_price - chocolate*chocolate_price - cream_cheese*cream_cheese_price - eggs*eggs_price - flour*flour_price - fruit*fruit_price - milk*milk_price - oil*oil_price - other_price - sour_cream*sour_cream_price - sugar*sugar_price + total_ingredients_cost - vanilla*vanilla_price)/yeast
                TXT,
                'powder_price' => <<<'TXT'
                (-butter*butter_price - cacao*cacao_price - chocolate*chocolate_price - cream_cheese*cream_cheese_price - eggs*eggs_price - flour*flour_price - fruit*fruit_price - milk*milk_price - oil*oil_price - other_price - sour_cream*sour_cream_price - sugar*sugar_price + total_ingredients_cost - vanilla*vanilla_price - yeast*yeast_price)/baking_powder
                TXT,
                'cream_cheese' => <<<'TXT'
                (-baking_powder*powder_price - butter*butter_price - cacao*cacao_price - chocolate*chocolate_price - eggs*eggs_price - flour*flour_price - fruit*fruit_price - milk*milk_price - oil*oil_price - other_price - sour_cream*sour_cream_price - sugar*sugar_price + total_ingredients_cost - vanilla*vanilla_price - yeast*yeast_price)/cream_cheese_price
                TXT,
                'baking_powder' => <<<'TXT'
                (-butter*butter_price - cacao*cacao_price - chocolate*chocolate_price - cream_cheese*cream_cheese_price - eggs*eggs_price - flour*flour_price - fruit*fruit_price - milk*milk_price - oil*oil_price - other_price - sour_cream*sour_cream_price - sugar*sugar_price + total_ingredients_cost - vanilla*vanilla_price - yeast*yeast_price)/powder_price
                TXT,
                'oil_price' => <<<'TXT'
                (-baking_powder*powder_price - butter*butter_price - cacao*cacao_price - chocolate*chocolate_price - cream_cheese*cream_cheese_price - eggs*eggs_price - flour*flour_price - fruit*fruit_price - milk*milk_price - other_price - sour_cream*sour_cream_price - sugar*sugar_price + total_ingredients_cost - vanilla*vanilla_price - yeast*yeast_price)/oil
                TXT,
            ],
        ],
        [
            'title' => 'time = hours*price_hrs',
            'results' => ['price_hrs' => 'time/hours', 'time' => 'hours*price_hrs', 'hours' => 'time/price_hrs'],
        ],
        [
            'title' => 'delivery = miles*price_mls',
            'results' => ['delivery' => 'miles*price_mls', 'price_mls' => 'delivery/miles', 'miles' => 'delivery/price_mls'],
        ],
        [
            'title' => 'supplies = boxes*pricebox + other_supplies',
            'results' => ['boxes' => '(-other_supplies + supplies)/pricebox', 'pricebox' => '(-other_supplies + supplies)/boxes', 'supplies' => 'boxes*pricebox + other_supplies', 'other_supplies' => '-boxes*pricebox + supplies'],
        ],
        [
            'title' => 'overhead = equipment + electricity_cost_unit * electricity_unit',
            'results' => ['electricity_cost_unit' => '(-equipment + overhead)/electricity_unit', 'electricity_unit' => '(-equipment + overhead)/electricity_cost_unit', 'equipment' => '-electricity_cost_unit*electricity_unit + overhead', 'overhead' => 'electricity_cost_unit*electricity_unit + equipment'],
        ],
        [
            'title' => 'total_cost_cake = total_ingredients_cost + time + delivery + supplies + overhead',
            'results' => [
                'time' => '-delivery - overhead - supplies + total_cost_cake - total_ingredients_cost',
                'overhead' => '-delivery - supplies - time + total_cost_cake - total_ingredients_cost',
                'total_ingredients_cost' => '-delivery - overhead - supplies - time + total_cost_cake',
                'supplies' => '-delivery - overhead - time + total_cost_cake - total_ingredients_cost',
                'delivery' => '-overhead - supplies - time + total_cost_cake - total_ingredients_cost',
                'total_cost_cake' => 'delivery + overhead + supplies + time + total_ingredients_cost',
            ],
        ],
        [
            'title' => 'serving = total_cost_cake/n_of_people',
            'results' => ['serving' => 'total_cost_cake/n_of_people', 'n_of_people' => 'total_cost_cake/serving', 'total_cost_cake' => 'n_of_people*serving'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Cake pricing works out Total ingredients cost and Equipment (oven, pans etc.) rental from Flour, Flour price and Sugar. The arithmetic is the whole method: total ingredients cost is worked out from flour by one formula, applied once. Total ingredients cost comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Cake pricing calculator works', 'html' => <<<'TXT'
            <p>Cake pricing answers one question from 29 numbers, and the answer is Total ingredients cost, Equipment (oven, pans etc.) rental and Number of boxes.</p><p>The answers are Total ingredients cost, Equipment (oven, pans etc.) rental, Number of boxes and Price per box; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 29 boxes, and nothing else.</p><ul><li><strong>Flour</strong> — in cups of flour</li><li><strong>Flour price</strong> — in USD</li><li><strong>Sugar</strong> — in grams</li><li><strong>Sugar price</strong> — in USD</li><li><strong>Milk (cow, plant-based)</strong> — in cups</li><li><strong>Milk price</strong> — in USD</li><li><strong>Eggs</strong> — a plain number, no unit</li><li><strong>Eggs price</strong> — in /egg</li><li><strong>Oil</strong> — in cups of oil</li><li><strong>Oil price</strong> — in USD</li><li><strong>Butter</strong> — in sticks</li><li><strong>Butter price</strong> — in /stick</li><li><strong>Yeast</strong> — in tsps</li><li><strong>Yeast price</strong> — in /tsp</li><li><strong>Baking powder</strong> — in tsps</li><li><strong>Powder price</strong> — in /tsp</li><li><strong>Cream cheese</strong> — in grams</li><li><strong>Cream cheese price</strong> — in USD</li><li><strong>Sour cream</strong> — in cups</li><li><strong>Sour cream price</strong> — in USD</li><li><strong>Cacao powder</strong> — in tbsps</li><li><strong>Cacao price</strong> — in /tbsp</li><li><strong>Chocolate</strong> — in grams</li><li><strong>Chocolate price</strong> — in USD</li><li><strong>Vanilla (powder, paste, extract)</strong> — in tsps</li><li><strong>Vanilla price</strong> — in /tsp</li><li><strong>Fresh fruit</strong> — in cups</li><li><strong>Fresh fruit price</strong> — in /cup</li><li><strong>Price of the other ingredients</strong> — in USD</li></ul><p>What you get back is Total ingredients cost in USD, Equipment (oven, pans etc.) rental in USD, Number of boxes, Price per box in USD, Electricity cost per unit in USD, Units of electricity used in kWh, Other supplies in USD, I spent in hours, Cost of one working hour in USD, Distance in kilometers, at in USD, Cake servings, Total cost of making the cake in USD, Price per serving in USD, Supplies, Time, Delivery, Overhead in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Time</strong> = <code>I spent × Cost of one working hour</code></li><li><strong>Cost of one working hour</strong> = <code>Time ÷ I spent</code></li><li><strong>I spent</strong> = <code>Time ÷ Cost of one working hour</code></li><li><strong>Delivery</strong> = <code>Distance × at</code></li><li><strong>at</strong> = <code>Delivery ÷ Distance</code></li><li><strong>Distance</strong> = <code>Delivery ÷ at</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Time</strong> = <code>I spent × Cost of one working hour</code> — the form to use when I spent and Cost of one working hour are the values you have.</li><li><strong>Cost of one working hour</strong> = <code>Time ÷ I spent</code> — the form to use when Time and I spent are the values you have.</li><li><strong>I spent</strong> = <code>Time ÷ Cost of one working hour</code> — the form to use when Time and Cost of one working hour are the values you have.</li><li><strong>Delivery</strong> = <code>Distance × at</code> — the form to use when Distance and at are the values you have.</li><li><strong>at</strong> = <code>Delivery ÷ Distance</code> — the form to use when Delivery and Distance are the values you have.</li><li><strong>Distance</strong> = <code>Delivery ÷ at</code> — the form to use when Delivery and at are the values you have.</li><li><strong>Supplies</strong> = <code>Number of boxes × Price per box + Other supplies</code> — the form to use when Number of boxes, Price per box and Other supplies are the values you have.</li><li><strong>Number of boxes</strong> = <code>( − Other supplies + Supplies) ÷ Price per box</code> — the form to use when Other supplies, Supplies and Price per box are the values you have.</li></ul><p>Any one of Total ingredients cost, Chocolate and Yeast can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Flour, Sugar and Milk (cow, plant-based) carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Total ingredients cost, Equipment (oven, pans etc.) rental and Number of boxes are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Flour left as a guess.</strong> Anything typed into Flour is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Flour price left as a guess.</strong> Anything typed into Flour price is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Flour and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Flour, Flour price, Sugar and Sugar price ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Flour — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Total ingredients cost in USD against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. </p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Total ingredients cost is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover kilometers, cups of flour and grams. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Flour, Flour price and Sugar is what you already know and Total ingredients cost and Equipment (oven, pans etc.) rental is what you need — the reverse of that situation is what the rearranged form is for.</p><p>If the result seems unexpected, recheck the inputs and units before using it.</p><p>Related calculators: <a href="/food/cake-serving">Cake serving</a>, <a href="/food/cake-pans">Cake pan</a> and <a href="/food/chocolate">Chocolate</a>.</p>
            TXT],
            ['title' => 'Limits and data handling', 'html' => <<<'TXT'
            <p>This calculator applies the relationships and assumptions shown on the page to the values entered. It cannot verify ingredient labels, measurements, equipment or conditions that are not represented in the form. Check the selected units and consult recipe, product or safety instructions where they apply.</p>
            <p>The result is a calculation, not a measurement of the food or drink. Use a scale, thermometer or product label when the real-world quantity or safety status matters.</p>
            TXT],
            ['title' => 'Where this fits among the other calculators', 'html' => <<<'TXT'
            <p>A criterion for choosing between these pages: Cake pricing answers a different question from the one above, even where the two share a sentence of explanation.</p><p>The nearest are <a href="/food/pizza-party">Pizza party Calculator</a>, <a href="/food/pizza">Pizza size Calculator</a> and <a href="/food/popcorn">Popcorn Calculator</a>. Each takes its own inputs and reports its own answer, and none of them shares a stored value with this page — open two in separate tabs and they will not interfere.</p><p>If the value you need is not the one reported here but a step before or after it, one of those pages probably reports it directly rather than making you convert by hand.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Cake pricing is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Flour, Flour price, Sugar and Sugar price beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. </p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cake pricing calculator work out?', 'a' => 'Total ingredients cost, Equipment (oven, pans etc.) rental, Number of boxes and Price per box, from Baking powder, Powder price, Butter and Butter price.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Flour (cups of flour), Flour price (USD), Sugar (grams), Sugar price (USD), Milk (cow, plant-based) (cups). Enter flour, flour price and sugar; Total ingredients cost is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Total ingredients cost, Chocolate, Yeast and Vanilla price blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Total ingredients cost is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Flour blank and the page solves for it, reporting Total ingredients cost instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Total ingredients cost at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/food/cake-serving', 'name' => 'Cake serving'],
            ['path' => '/food/cake-pans', 'name' => 'Cake pan'],
            ['path' => '/food/chocolate', 'name' => 'Chocolate']
        ],
    ],
];
