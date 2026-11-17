<?php

/**
 * Chocolate
 * /food/chocolate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Chocolate',
    'meta' => ['title' => 'Chocolate Calculator: Formula, Steps & Examples', 'description' => 'Calculate chocolate quantity, piece weight or total weight from the values you know. Check serving sizes and labels before relying on the estimate.', 'h1' => 'Chocolate Calculator', 'updated' => '2026-08-04'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'type',
                            'label' => 'Chocolate type',
                            'type' => 'select',
                            'options' => ['Dark (50%-70% cacao)' => '0', 'Milk' => '1', 'White' => '2'],
                            'dataset' => 'Type',
                            'default' => 'Dark (50%-70% cacao)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bar_size',
                            'label' => 'Bar size',
                            'type' => 'select',
                            'options' => [
                                'Standard EU (3.5 oz) (100 g)' => '1',
                                'Row of standard EU (20 g)' => '2',
                                'Square of standard EU(~6.7 g)' => '3',
                                '1 ounce (28 g)' => '4',
                                'US 6.8 oz (192 g)' => '5',
                                'US 4.25 oz (120 g)' => '6',
                                'US 3 oz (85g)' => '7',
                                'US 1.5 oz (42.5 g)' => '8',
                                'Cup chips (170 g)' => '9',
                                'Enter a custom chocolate bar weight' => '0',
                            ],
                            'dataset' => 'Weight',
                            'control' => 'DROPDOWN',
                            'help' => 'Select the last dropdown option to enter a custom chocolate bar weight.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bar_weight',
                            'label' => 'Bar weight',
                            'type' => 'result',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'quantity',
                            'label' => 'Quantity',
                            'type' => 'number',
                            'suffix' => 'piece(s)',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'chocolate_weight',
                            'label' => 'Total weight',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Hidden variables',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'column2_calories',
                            'label' => 'Column2 calories',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'column2_totalCarbo',
                            'label' => 'Column2 total carbo',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'column2_sugars',
                            'label' => 'Column2 sugars',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'column2_dietaryFiber',
                            'label' => 'Column2 dietary fiber',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'column2_totalFat',
                            'label' => 'Column2 total fat',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'column2_saturatedFat',
                            'label' => 'Column2 saturated fat',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'column2_protein',
                            'label' => 'Column2 protein',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'column2_cholesterol',
                            'label' => 'Column2 cholesterol',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'column2_riboflavin',
                            'label' => 'Column2 riboflavin',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'column2_vitaminB12',
                            'label' => 'Column2 vitamin b12',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'column2_vitaminK',
                            'label' => 'Column2 vitamin k',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'column2_calcium',
                            'label' => 'Column2 calcium',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'column2_iron',
                            'label' => 'Column2 iron',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'column2_magnesium',
                            'label' => 'Column2 magnesium',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'column2_phosphorus',
                            'label' => 'Column2 phosphorus',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'column2_potassium',
                            'label' => 'Column2 potassium',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'column2_sodium',
                            'label' => 'Column2 sodium',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'column2_zinc',
                            'label' => 'Column2 zinc',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'column2_copper',
                            'label' => 'Column2 copper',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'column2_manganese',
                            'label' => 'Column2 manganese',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'column2_selenium',
                            'label' => 'Column2 selenium',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'column3_percentCalories',
                            'label' => 'Column3 percent calories',
                            'type' => 'number',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'column3_percentTotalCarb',
                            'label' => 'Column3 percent total carb',
                            'type' => 'number',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'column3_percentDietaryFiber',
                            'label' => 'Column3 percent dietary fiber',
                            'type' => 'number',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'column3_percentTotalFat',
                            'label' => 'Column3 percent total fat',
                            'type' => 'number',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'column3_percentSaturatedFat',
                            'label' => 'Column3 percent saturated fat',
                            'type' => 'number',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'column3_percentCholesterol',
                            'label' => 'Column3 percent cholesterol',
                            'type' => 'number',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'column3_percentRiboflavin',
                            'label' => 'Column3 percent riboflavin',
                            'type' => 'number',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'column3_percentVitaminB12',
                            'label' => 'Column3 percent vitamin b12',
                            'type' => 'number',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'column3_percentVitaminK',
                            'label' => 'Column3 percent vitamin k',
                            'type' => 'number',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'column3_percentCalcium',
                            'label' => 'Column3 percent calcium',
                            'type' => 'number',
                            'rounding' => ['standard', '1'],
                            'min' => 1,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'column3_percentIron',
                            'label' => 'Column3 percent iron',
                            'type' => 'number',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'column3_percentMagnesium',
                            'label' => 'Column3 percent magnesium',
                            'type' => 'number',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'column3_percentPhosphorus',
                            'label' => 'Column3 percent phosphorus',
                            'type' => 'number',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'column3_percentPotassium',
                            'label' => 'Column3 percent potassium',
                            'type' => 'number',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'column3_percentSodium',
                            'label' => 'Column3 percent sodium',
                            'type' => 'number',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'column3_percentZinc',
                            'label' => 'Column3 percent zinc',
                            'type' => 'number',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'column3_percentCopper',
                            'label' => 'Column3 percent copper',
                            'type' => 'number',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'column3_percentManganese',
                            'label' => 'Column3 percent manganese',
                            'type' => 'number',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'column3_percentSelenium',
                            'label' => 'Column3 percent selenium',
                            'type' => 'number',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'percentCalories',
                            'label' => 'Percent calories',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'percentTotalCarb',
                            'label' => 'Percent total carb',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'percentDietaryFiber',
                            'label' => 'Percent dietary fiber',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'percentTotalFat',
                            'label' => 'Percent total fat',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'percentSaturatedFat',
                            'label' => 'Percent saturated fat',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'percentCholesterol',
                            'label' => 'Percent cholesterol',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'percentRiboflavin',
                            'label' => 'Percent riboflavin',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'percentVitaminB12',
                            'label' => 'Percent vitamin b12',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'percentVitaminK',
                            'label' => 'Percent vitamin k',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'percentCalcium',
                            'label' => 'Percent calcium',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'percentIron',
                            'label' => 'Percent iron',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'percentMagnesium',
                            'label' => 'Percent magnesium',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'percentPhosphorus',
                            'label' => 'Percent phosphorus',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'percentPotassium',
                            'label' => 'Percent potassium',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'percentSodium',
                            'label' => 'Percent sodium',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'percentZinc',
                            'label' => 'Percent zinc',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'percentCopper',
                            'label' => 'Percent copper',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'percentManganese',
                            'label' => 'Percent manganese',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'percentSelenium',
                            'label' => 'Percent selenium',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'calories',
                            'label' => 'Calories',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'totalCarbo',
                            'label' => 'Total carbo',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sugars',
                            'label' => 'Sugars',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dietaryFiber',
                            'label' => 'Dietary fiber',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'totalFat',
                            'label' => 'Total fat',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'saturatedFat',
                            'label' => 'Saturated fat',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'protein',
                            'label' => 'Protein',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cholesterol',
                            'label' => 'Cholesterol',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'riboflavin',
                            'label' => 'Riboflavin',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'vitaminB12',
                            'label' => 'Vitamin b12',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'vitaminK',
                            'label' => 'Vitamin k',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'calcium',
                            'label' => 'Calcium',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'iron',
                            'label' => 'Iron',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'magnesium',
                            'label' => 'Magnesium',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'phosphorus',
                            'label' => 'Phosphorus',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'potassium',
                            'label' => 'Potassium',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sodium',
                            'label' => 'Sodium',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'zinc',
                            'label' => 'Zinc',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'copper',
                            'label' => 'Copper',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'manganese',
                            'label' => 'Manganese',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'selenium',
                            'label' => 'Selenium',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'chocolate_weight = bar_weight*quantity',
            'results' => ['bar_weight' => 'chocolate_weight/quantity', 'quantity' => 'chocolate_weight/bar_weight', 'chocolate_weight' => 'bar_weight*quantity'],
        ],
        [
            'title' => 'column2_calories = chocolate_weight * calories / 100',
            'results' => ['column2_calories' => '(1/100)*calories*chocolate_weight', 'chocolate_weight' => '100*column2_calories/calories', 'calories' => '100*column2_calories/chocolate_weight'],
        ],
        [
            'title' => 'column2_totalCarbo = chocolate_weight * totalCarbo / 100',
            'results' => ['column2_totalCarbo' => '(1/100)*chocolate_weight*totalCarbo', 'chocolate_weight' => '100*column2_totalCarbo/totalCarbo', 'totalCarbo' => '100*column2_totalCarbo/chocolate_weight'],
        ],
        [
            'title' => 'column2_sugars = chocolate_weight * sugars / 100',
            'results' => ['sugars' => '100*column2_sugars/chocolate_weight', 'column2_sugars' => '(1/100)*chocolate_weight*sugars', 'chocolate_weight' => '100*column2_sugars/sugars'],
        ],
        [
            'title' => 'column2_dietaryFiber = chocolate_weight * dietaryFiber / 10000',
            'results' => ['column2_dietaryFiber' => '(1/10000)*chocolate_weight*dietaryFiber', 'chocolate_weight' => '10000*column2_dietaryFiber/dietaryFiber', 'dietaryFiber' => '10000*column2_dietaryFiber/chocolate_weight'],
        ],
        [
            'title' => 'column2_totalFat = chocolate_weight * totalFat / 100',
            'results' => ['column2_totalFat' => '(1/100)*chocolate_weight*totalFat', 'totalFat' => '100*column2_totalFat/chocolate_weight', 'chocolate_weight' => '100*column2_totalFat/totalFat'],
        ],
        [
            'title' => 'column2_saturatedFat = chocolate_weight * saturatedFat / 100',
            'results' => ['saturatedFat' => '100*column2_saturatedFat/chocolate_weight', 'column2_saturatedFat' => '(1/100)*chocolate_weight*saturatedFat', 'chocolate_weight' => '100*column2_saturatedFat/saturatedFat'],
        ],
        [
            'title' => 'column2_protein = chocolate_weight * protein / 100',
            'results' => ['protein' => '100*column2_protein/chocolate_weight', 'column2_protein' => '(1/100)*chocolate_weight*protein', 'chocolate_weight' => '100*column2_protein/protein'],
        ],
        [
            'title' => 'column2_cholesterol = chocolate_weight * cholesterol / 100',
            'results' => ['chocolate_weight' => '100*column2_cholesterol/cholesterol', 'cholesterol' => '100*column2_cholesterol/chocolate_weight', 'column2_cholesterol' => '(1/100)*chocolate_weight*cholesterol'],
        ],
        [
            'title' => 'column3_percentCalories = chocolate_weight * percentCalories / 10',
            'results' => ['percentCalories' => '10*column3_percentCalories/chocolate_weight', 'chocolate_weight' => '10*column3_percentCalories/percentCalories', 'column3_percentCalories' => '(1/10)*chocolate_weight*percentCalories'],
        ],
        [
            'title' => 'column3_percentTotalCarb = chocolate_weight * percentTotalCarb / 10',
            'results' => ['percentTotalCarb' => '10*column3_percentTotalCarb/chocolate_weight', 'chocolate_weight' => '10*column3_percentTotalCarb/percentTotalCarb', 'column3_percentTotalCarb' => '(1/10)*chocolate_weight*percentTotalCarb'],
        ],
        [
            'title' => 'column3_percentDietaryFiber = chocolate_weight * percentDietaryFiber / 10',
            'results' => ['percentDietaryFiber' => '10*column3_percentDietaryFiber/chocolate_weight', 'chocolate_weight' => '10*column3_percentDietaryFiber/percentDietaryFiber', 'column3_percentDietaryFiber' => '(1/10)*chocolate_weight*percentDietaryFiber'],
        ],
        [
            'title' => 'column3_percentTotalFat = chocolate_weight * percentTotalFat / 10',
            'results' => ['column3_percentTotalFat' => '(1/10)*chocolate_weight*percentTotalFat', 'chocolate_weight' => '10*column3_percentTotalFat/percentTotalFat', 'percentTotalFat' => '10*column3_percentTotalFat/chocolate_weight'],
        ],
        [
            'title' => 'column3_percentSaturatedFat = chocolate_weight * percentSaturatedFat / 10',
            'results' => ['column3_percentSaturatedFat' => '(1/10)*chocolate_weight*percentSaturatedFat', 'chocolate_weight' => '10*column3_percentSaturatedFat/percentSaturatedFat', 'percentSaturatedFat' => '10*column3_percentSaturatedFat/chocolate_weight'],
        ],
        [
            'title' => 'column3_percentCholesterol = chocolate_weight * percentCholesterol / 10',
            'results' => ['percentCholesterol' => '10*column3_percentCholesterol/chocolate_weight', 'chocolate_weight' => '10*column3_percentCholesterol/percentCholesterol', 'column3_percentCholesterol' => '(1/10)*chocolate_weight*percentCholesterol'],
        ],
        [
            'title' => 'column2_riboflavin = chocolate_weight * riboflavin / 100',
            'results' => ['riboflavin' => '100*column2_riboflavin/chocolate_weight', 'column2_riboflavin' => '(1/100)*chocolate_weight*riboflavin', 'chocolate_weight' => '100*column2_riboflavin/riboflavin'],
        ],
        [
            'title' => 'column2_vitaminB12 = chocolate_weight * vitaminB12 / 100',
            'results' => ['vitaminB12' => '100*column2_vitaminB12/chocolate_weight', 'column2_vitaminB12' => '(1/100)*chocolate_weight*vitaminB12', 'chocolate_weight' => '100*column2_vitaminB12/vitaminB12'],
        ],
        [
            'title' => 'column2_vitaminK = chocolate_weight * vitaminK / 100',
            'results' => ['column2_vitaminK' => '(1/100)*chocolate_weight*vitaminK', 'vitaminK' => '100*column2_vitaminK/chocolate_weight', 'chocolate_weight' => '100*column2_vitaminK/vitaminK'],
        ],
        [
            'title' => 'column2_calcium = chocolate_weight * calcium / 100',
            'results' => ['column2_calcium' => '(1/100)*calcium*chocolate_weight', 'calcium' => '100*column2_calcium/chocolate_weight', 'chocolate_weight' => '100*column2_calcium/calcium'],
        ],
        [
            'title' => 'column2_iron = chocolate_weight * iron / 100',
            'results' => ['iron' => '100*column2_iron/chocolate_weight', 'column2_iron' => '(1/100)*chocolate_weight*iron', 'chocolate_weight' => '100*column2_iron/iron'],
        ],
        [
            'title' => 'column2_magnesium = chocolate_weight * magnesium / 100',
            'results' => ['magnesium' => '100*column2_magnesium/chocolate_weight', 'column2_magnesium' => '(1/100)*chocolate_weight*magnesium', 'chocolate_weight' => '100*column2_magnesium/magnesium'],
        ],
        [
            'title' => 'column2_phosphorus = chocolate_weight * phosphorus / 100',
            'results' => ['column2_phosphorus' => '(1/100)*chocolate_weight*phosphorus', 'chocolate_weight' => '100*column2_phosphorus/phosphorus', 'phosphorus' => '100*column2_phosphorus/chocolate_weight'],
        ],
        [
            'title' => 'column2_potassium = chocolate_weight * potassium / 100',
            'results' => ['potassium' => '100*column2_potassium/chocolate_weight', 'chocolate_weight' => '100*column2_potassium/potassium', 'column2_potassium' => '(1/100)*chocolate_weight*potassium'],
        ],
        [
            'title' => 'column2_sodium = chocolate_weight * sodium / 100',
            'results' => ['sodium' => '100*column2_sodium/chocolate_weight', 'chocolate_weight' => '100*column2_sodium/sodium', 'column2_sodium' => '(1/100)*chocolate_weight*sodium'],
        ],
        [
            'title' => 'column2_zinc = chocolate_weight * zinc / 100',
            'results' => ['column2_zinc' => '(1/100)*chocolate_weight*zinc', 'zinc' => '100*column2_zinc/chocolate_weight', 'chocolate_weight' => '100*column2_zinc/zinc'],
        ],
        [
            'title' => 'column2_copper = chocolate_weight * copper / 100',
            'results' => ['copper' => '100*column2_copper/chocolate_weight', 'column2_copper' => '(1/100)*chocolate_weight*copper', 'chocolate_weight' => '100*column2_copper/copper'],
        ],
        [
            'title' => 'column2_manganese = chocolate_weight * manganese / 100',
            'results' => ['manganese' => '100*column2_manganese/chocolate_weight', 'column2_manganese' => '(1/100)*chocolate_weight*manganese', 'chocolate_weight' => '100*column2_manganese/manganese'],
        ],
        [
            'title' => 'column2_selenium = chocolate_weight * selenium / 100',
            'results' => ['selenium' => '100*column2_selenium/chocolate_weight', 'chocolate_weight' => '100*column2_selenium/selenium', 'column2_selenium' => '(1/100)*chocolate_weight*selenium'],
        ],
        [
            'title' => 'column3_percentRiboflavin = chocolate_weight * percentRiboflavin / 10',
            'results' => ['percentRiboflavin' => '10*column3_percentRiboflavin/chocolate_weight', 'column3_percentRiboflavin' => '(1/10)*chocolate_weight*percentRiboflavin', 'chocolate_weight' => '10*column3_percentRiboflavin/percentRiboflavin'],
        ],
        [
            'title' => 'column3_percentVitaminB12 = chocolate_weight * percentVitaminB12 / 10',
            'results' => ['percentVitaminB12' => '10*column3_percentVitaminB12/chocolate_weight', 'column3_percentVitaminB12' => '(1/10)*chocolate_weight*percentVitaminB12', 'chocolate_weight' => '10*column3_percentVitaminB12/percentVitaminB12'],
        ],
        [
            'title' => 'column3_percentVitaminK = chocolate_weight * percentVitaminK / 10',
            'results' => ['column3_percentVitaminK' => '(1/10)*chocolate_weight*percentVitaminK', 'percentVitaminK' => '10*column3_percentVitaminK/chocolate_weight', 'chocolate_weight' => '10*column3_percentVitaminK/percentVitaminK'],
        ],
        [
            'title' => 'column3_percentCalcium = chocolate_weight * percentCalcium / 10',
            'results' => ['column3_percentCalcium' => '(1/10)*chocolate_weight*percentCalcium', 'percentCalcium' => '10*column3_percentCalcium/chocolate_weight', 'chocolate_weight' => '10*column3_percentCalcium/percentCalcium'],
        ],
        [
            'title' => 'column3_percentIron = chocolate_weight * percentIron / 10',
            'results' => ['percentIron' => '10*column3_percentIron/chocolate_weight', 'column3_percentIron' => '(1/10)*chocolate_weight*percentIron', 'chocolate_weight' => '10*column3_percentIron/percentIron'],
        ],
        [
            'title' => 'column3_percentMagnesium = chocolate_weight * percentMagnesium / 10',
            'results' => ['column3_percentMagnesium' => '(1/10)*chocolate_weight*percentMagnesium', 'chocolate_weight' => '10*column3_percentMagnesium/percentMagnesium', 'percentMagnesium' => '10*column3_percentMagnesium/chocolate_weight'],
        ],
        [
            'title' => 'column3_percentPhosphorus = chocolate_weight * percentPhosphorus / 10',
            'results' => ['column3_percentPhosphorus' => '(1/10)*chocolate_weight*percentPhosphorus', 'percentPhosphorus' => '10*column3_percentPhosphorus/chocolate_weight', 'chocolate_weight' => '10*column3_percentPhosphorus/percentPhosphorus'],
        ],
        [
            'title' => 'column3_percentPotassium = chocolate_weight * percentPotassium / 10',
            'results' => ['percentPotassium' => '10*column3_percentPotassium/chocolate_weight', 'column3_percentPotassium' => '(1/10)*chocolate_weight*percentPotassium', 'chocolate_weight' => '10*column3_percentPotassium/percentPotassium'],
        ],
        [
            'title' => 'column3_percentSodium = chocolate_weight * percentSodium / 10',
            'results' => ['percentSodium' => '10*column3_percentSodium/chocolate_weight', 'column3_percentSodium' => '(1/10)*chocolate_weight*percentSodium', 'chocolate_weight' => '10*column3_percentSodium/percentSodium'],
        ],
        [
            'title' => 'column3_percentZinc = chocolate_weight * percentZinc / 10',
            'results' => ['percentZinc' => '10*column3_percentZinc/chocolate_weight', 'chocolate_weight' => '10*column3_percentZinc/percentZinc', 'column3_percentZinc' => '(1/10)*chocolate_weight*percentZinc'],
        ],
        [
            'title' => 'column3_percentCopper = chocolate_weight * percentCopper / 10',
            'results' => ['column3_percentCopper' => '(1/10)*chocolate_weight*percentCopper', 'chocolate_weight' => '10*column3_percentCopper/percentCopper', 'percentCopper' => '10*column3_percentCopper/chocolate_weight'],
        ],
        [
            'title' => 'column3_percentManganese = chocolate_weight * percentManganese / 10',
            'results' => ['percentManganese' => '10*column3_percentManganese/chocolate_weight', 'column3_percentManganese' => '(1/10)*chocolate_weight*percentManganese', 'chocolate_weight' => '10*column3_percentManganese/percentManganese'],
        ],
        [
            'title' => 'column3_percentSelenium = chocolate_weight * percentSelenium / 10',
            'results' => ['percentSelenium' => '10*column3_percentSelenium/chocolate_weight', 'chocolate_weight' => '10*column3_percentSelenium/percentSelenium', 'column3_percentSelenium' => '(1/10)*chocolate_weight*percentSelenium'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Chocolate takes Chocolate type, Bar size and Quantity and returns Bar weight. There is no hidden constant here: change bar weight and chocolate type moves with it. The main result, Bar weight, is reported in grams.
        TXT,
        'sections' => [
            ['title' => 'How the Chocolate calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Chocolate: it takes 4 numbers and reports Bar weight.</p><p>Written with the labels from the form, Total weight = Bar weight × Quantity.</p><p>The answers are Bar weight; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>Chocolate type</strong> — a plain number, no unit</li><li><strong>Bar size</strong> — a plain number, no unit. Select the last dropdown option to enter a custom chocolate bar weight.</li><li><strong>Quantity</strong> — in piece(s)</li><li><strong>Total weight</strong> — in grams</li></ul><p>The answer comes back as Bar weight in grams. </p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Bar weight offers 6 units and opens on grams, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Total weight</strong> = <code>Bar weight × Quantity</code></li><li><strong>Bar weight</strong> = <code>Total weight ÷ Quantity</code></li><li><strong>Quantity</strong> = <code>Total weight ÷ Bar weight</code></li><li><strong>Column2 calories</strong> = <code>(1 ÷ 100) × Calories × Total weight</code></li><li><strong>Calories</strong> = <code>100 × Column2 calories ÷ Total weight</code></li><li><strong>Column2 total carbo</strong> = <code>(1 ÷ 100) × Total weight × Total carbo</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Total weight</strong> = <code>Bar weight × Quantity</code> — the form to use when Bar weight and Quantity are the values you have.</li><li><strong>Bar weight</strong> = <code>Total weight ÷ Quantity</code> — the form to use when Total weight and Quantity are the values you have.</li><li><strong>Quantity</strong> = <code>Total weight ÷ Bar weight</code> — the form to use when Total weight and Bar weight are the values you have.</li><li><strong>Column2 calories</strong> = <code>(1 ÷ 100) × Calories × Total weight</code> — the form to use when Calories and Total weight are the values you have.</li><li><strong>Total weight</strong> = <code>100 × Column2 calories ÷ Calories</code> — the form to use when Column2 calories and Calories are the values you have.</li><li><strong>Calories</strong> = <code>100 × Column2 calories ÷ Total weight</code> — the form to use when Column2 calories and Total weight are the values you have.</li><li><strong>Column2 total carbo</strong> = <code>(1 ÷ 100) × Total weight × Total carbo</code> — the form to use when Total weight and Total carbo are the values you have.</li><li><strong>Total weight</strong> = <code>100 × Column2 total carbo ÷ Total carbo</code> — the form to use when Column2 total carbo and Total carbo are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Total weight, Bar weight and Quantity can be the unknown.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Total weight is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Bar weight is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Chocolate type left as a guess.</strong> If Chocolate type is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Bar size left as a guess.</strong> If Bar size is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Convert Chocolate type to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Chocolate type</strong> takes a plain number with no unit attached. Check the field label and unit before calculating.</li><li><strong>Bar size</strong> takes a plain number with no unit attached. Select the last dropdown option to enter a custom chocolate bar weight. Check the field label and unit before calculating.</li><li><strong>Quantity</strong> is measured in piece(s). Change it and Bar weight and Total weight changes with it. Check the field label and unit before calculating.</li><li><strong>Total weight</strong> is a grams quantity: the page opens it in g and converts anything else you pick before the formula runs. Change it and Bar weight, Quantity and Column2 calories changes with it. Check the field label and unit before calculating.</li></ul><p>None of the boxes has to be filled in a particular order. </p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p> Read them in this order:</p><ul><li><strong>Bar weight</strong> is a grams figure. It is computed from Total weight and Quantity, so it changes the moment any of them does. </li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p> The tables, with the unit each box opens in:</p><ul><li><strong>grams</strong> — opens in <em>g</em>, and the chip also carries g, mg, lb, oz and st. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. </p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Chocolate type, Bar size, Quantity and Total weight. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Chocolate type into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Bar weight in g with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Bar weight follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are grams and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Chocolate type, Bar size and Quantity are measured, independent and in the unit the chip says. </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Chocolate type, Bar size and Quantity and the number you are missing is Bar weight.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related calculators: <a href="/food/cake-pricing">Cake pricing</a>, <a href="/food/ice-cream">Ice cream</a> and <a href="/food/perfect-pancake">Perfect pancake</a>.</p>
            TXT],
            ['title' => 'Limits and data handling', 'html' => <<<'TXT'
            <p>This calculator applies the relationships and assumptions shown on the page to the values entered. It cannot verify ingredient labels, measurements, equipment or conditions that are not represented in the form. Check the selected units and consult recipe, product or safety instructions where they apply.</p>
            <p>The result is a calculation, not a measurement of the food or drink. Use a scale, thermometer or product label when the real-world quantity or safety status matters.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Chocolate calculator work out?', 'a' => 'Bar weight, from Bar weight and Quantity. The relationship is Total weight = Bar weight × Quantity.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Chocolate type, Bar size, Quantity (piece(s)), Total weight (grams). With chocolate type, bar size and quantity in place, Bar weight can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Total weight, Bar weight, Quantity and Column2 calories can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Bar weight is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Chocolate type left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Bar weight at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/food/cake-pricing', 'name' => 'Cake pricing'],
            ['path' => '/food/ice-cream', 'name' => 'Ice cream'],
            ['path' => '/food/perfect-pancake', 'name' => 'Perfect pancake']
        ],
    ],
];
