<?php

/**
 * Ice cream
 * /food/ice-cream
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Ice cream',
    'meta' => ['title' => 'Ice cream Calculator: Formula, Steps & Examples', 'description' => 'Scale an ice-cream mixture from ingredient quantities or solve for a missing amount. Check units and follow the recipe or package directions.', 'h1' => 'Ice cream Calculator', 'updated' => '2026-08-04'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        Let science guide you in making high-quality ice cream at home ! Design and test your ice cream recipes  by choosing ingredients from a whole range of options . We will tell you if your ice cream will have that soft, creamy, and smooth texture  or not , as well as its calorie content.
                        TXT],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Milk',
            'note' => <<<'TXT'
            Milk is the major contributor to the ice  part of the ice cream . Milk solids control the ice crystal size, and milk protein  traps air during the churning of the mix.
            TXT,
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'milk',
                            'label' => 'Milk',
                            'type' => 'select',
                            'options' => [
                                'Milk, condensed, sweetened' => '26',
                                'Milk, evaporated, whole' => '27',
                                'Milk, low fat (1%)' => '30',
                                'Milk, reduced fat (2%)' => '31',
                                'Milk, fat free (skim)' => '32',
                                'Milk, whole (3.5%)' => '34',
                                'Milk, whole (3.25%)' => '36',
                                'Yogurt, Greek, whole milk' => '84',
                                'Yogurt, whole milk' => '85',
                                'Soy milk, unsweetened' => '80',
                                'Coconut milk, light' => '29',
                                'Coconut milk, full fat' => '101',
                                'Almond milk, sweetened' => '35',
                                'Almond milk, unsweetened' => '81',
                            ],
                            'dataset' => 'milk',
                            'control' => 'DROPDOWN',
                            'default' => 'Milk, whole (3.5%)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'volume_milk',
                            'label' => 'Quantity',
                            'type' => 'number',
                            'unit' => '122',
                            'unit_default' => 'uscups',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Cream',
            'note' => <<<'TXT'
            Cream traps and holds air  during the stirring and freezing of the mix, imparting the ice cream the proper density . The fat molecules provide a smooth texture  to the ice cream by coating the ice crystals.
            TXT,
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cream',
                            'label' => 'Cream',
                            'type' => 'select',
                            'options' => [
                                'Cream, heavy (40% fat) ' => '37',
                                'Cream, half and half ' => '28',
                                'Double cream' => '38',
                                'Cream, heavy' => '39',
                                'Cream, fluid, heavy whipping' => '40',
                                'Cream, light' => '41',
                                'Cream, fluid, light whipping ' => '42',
                                'Whipping cream' => '43',
                                'Coconut cream, sweetened' => '83',
                            ],
                            'dataset' => 'cream',
                            'control' => 'DROPDOWN',
                            'default' => 'Cream, heavy',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'volume_cream',
                            'label' => 'Quantity',
                            'type' => 'number',
                            'help' => 'If you\'re not using any cream, set the quantity at zero.',
                            'unit' => '122',
                            'unit_default' => 'uscups',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Sweetener',
            'note' => 'Sweeteners make your ice cream  softer by lowering the freezing point of water .',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sweetener',
                            'label' => 'Sweetener',
                            'type' => 'select',
                            'options' => [
                                'Fructose' => '44',
                                'Honey' => '45',
                                'Invert sugar' => '46',
                                'Sucrose' => '47',
                                'Sugar' => '48',
                                'Brown sugar' => '49',
                                'Maple sugar' => '50',
                            ],
                            'dataset' => 'sweetener',
                            'control' => 'DROPDOWN',
                            'default' => 'Sugar',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'quantity_sweetener',
                            'label' => 'Quantity',
                            'type' => 'number',
                            'help' => 'You can leave quantity at zero if you’re not using any sweetener.',
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
            ],
        ],
        [
            'title' => 'Flavor',
            'note' => 'Choose from a wide range of flavors  to enhance the taste of your ice cream.',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'flavoring',
                            'label' => 'Flavoring',
                            'type' => 'select',
                            'options' => [
                                'Cacao powder 11%' => '66',
                                'Cacao powder 21%' => '67',
                                'Chocolate 55%' => '68',
                                'Chocolate 60%' => '69',
                                'Chocolate 65%' => '70',
                                'Chocolate 70%' => '71',
                                'Milk Chocolate 40%' => '72',
                                'Vanilla extract' => '76',
                                'Vanilla pod 1g/pod' => '77',
                                'Strawberry, fresh' => '75',
                                'Cherry, fresh' => '73',
                                'Banana, ripe, fresh' => '92',
                            ],
                            'dataset' => 'flavor',
                            'control' => 'DROPDOWN',
                            'default' => 'Vanilla extract',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'quantity_flavoring',
                            'label' => 'Quantity',
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
            ],
        ],
        [
            'title' => 'Emulsifier',
            'note' => 'Emulsifiers enable the uniform distribution of fat in the ice cream . This helps stabilize the trapped air and provides a smooth ice cream .',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'emulsifier',
                            'label' => 'Emulsifier',
                            'type' => 'select',
                            'options' => ['Egg white, large' => '51', 'Egg whole, large' => '52', 'Egg yolk, large' => '53'],
                            'dataset' => 'emuls',
                            'control' => 'DROPDOWN',
                            'default' => 'Egg yolk, large',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'num_emuls',
                            'label' => 'Quantity (nos)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Stabilizer',
            'note' => 'Stabilizers add viscosity and control ice crystallization .',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'stabilizer',
                            'label' => 'Stabilizer',
                            'type' => 'select',
                            'options' => [
                                'Carboxymethyl Cellulose' => '54',
                                'Corn starch' => '55',
                                'Cremodan 500 Coldline' => '56',
                                'Gelatin' => '57',
                                'Guar gum' => '58',
                                'Carrageenan' => '59',
                                'Locust bean gum' => '62',
                                'Tapioca starch' => '64',
                                'Xanthan gum' => '65',
                            ],
                            'dataset' => 'stabilizer',
                            'control' => 'DROPDOWN',
                            'default' => 'Gelatin',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'quantity_stabilizer',
                            'label' => 'Quantity ',
                            'type' => 'number',
                            'help' => 'Use stabilizers in moderation, not exceeding 1-2 g per 1000 g of final mix.',
                            'unit' => '22',
                            'unit_default' => 'mg',
                            'rounding' => ['omni', '0.0001'],
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
            'title' => 'Additional ingredients',
            'note' => 'Give a twist to your favorite treat !',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'additional_ingredients',
                            'label' => 'Additional ingredients',
                            'type' => 'select',
                            'options' => [
                                'Milk powder, skim' => '33',
                                'Chocolate chips, unsweetened' => '82',
                                'Chocolate 70%, chunks' => '92',
                                'Cream cheese' => '85',
                                'Guinness beer' => '86',
                                'Pumpkin, canned' => '87',
                                'Whey protein powder' => '88',
                                'Butter, unsalted' => '89',
                                'Bread, white' => '90',
                                'Avocado, raw' => '91',
                            ],
                            'dataset' => 'additional',
                            'control' => 'DROPDOWN',
                            'default' => 'Pumpkin, canned',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'quantity_add_ing',
                            'label' => 'Quantity',
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
            ],
        ],
        [
            'title' => 'Result',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'final_icecream_quantity',
                            'label' => 'Quantity of ice cream mix',
                            'type' => 'number',
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
                            'type' => 'note',
                            'cases' => [
                                ['when' => <<<'TXT'
                                total_solids_percent>=40 and total_solids_percent<=60 and total_fat_percent>=15 and total_fat_percent<=26 and total_sugar_percent>=15 and total_sugar_percent<=26
                                TXT, 'text' => 'Your ice cream  recipe is perfect! '],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_solids_percent',
                            'label' => 'Total solids ',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'All the suspended, colloidal, and dissolved solids in water.',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'total_solids_percent<40', 'text' => <<<'TXT'
                                The total solid content of your ice cream mix is low. Ideally, it should be between 40% and 60% for high-quality ice cream . Your ice cream will be too icy  with large ice crystals , especially if you don't have an ice cream maker. Add some skimmed milk powder, cream, or stabilizer to it.
                                TXT],
                                ['when' => 'total_solids_percent>60', 'text' => <<<'TXT'
                                The total solid content of your ice cream mix is high. Ideally, it should be between 40% and 60% for high-quality ice cream . Your ice cream will have an unpleasant flavor . Add some milk or water  to it.
                                TXT],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_fat_percent',
                            'label' => 'Total fat ',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'total_fat_percent<10', 'text' => 'The fat content of your ice cream mix is low. Ideally, it should be between 15% and 26%. Your ice cream will be less creamy and smooth . Add some cream  to it.'],
                                ['when' => 'total_fat_percent<15 and total_fat_percent>=10', 'text' => <<<'TXT'
                                The fat content of your ice cream mix is low. Ideally, it should be between 15% and 26%. Your ice cream will be less creamy and smooth . Add some cream  or eggs  to it.
                                TXT],
                                ['when' => 'total_fat_percent>26', 'text' => <<<'TXT'
                                The fat content of your ice cream mix is too high. Ideally, it should be between 15% and 26%. Your ice cream will leave a greasy feel in your mouth . Reduce the cream and add some milk  to it.
                                TXT],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_sugar_percent',
                            'label' => 'Total sugar ',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'total_sugar_percent<15', 'text' => <<<'TXT'
                                The sugar content of your ice cream mix is low. Ideally, it should be between 15% and 26%. Your ice cream will be less sweet and hard . Add some sweetener to it .
                                TXT],
                                ['when' => 'total_sugar_percent>26', 'text' => <<<'TXT'
                                The sugar content of your ice cream mix is too high. Ideally, it should be between 15% and 26%. Your ice cream will be very sweet and mushy . Reduce the sweetener or add milk/cream  to it.
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
                                ['when' => 'percent_rdi < 10 and calorie_per_serving > 0', 'text' => <<<'TXT'
                                Nutrition facts: Your ice cream has {{calorie_per_serving.formattedValue}} calories per 100&nbsp;g serving , i.e., about {{percent_rdi.formattedValue}} % of your RDI . Enjoy your sweet treat  and burn the extra calories with your favorite activities ‍.
                                TXT],
                                ['when' => 'percent_rdi > 10', 'text' => <<<'TXT'
                                Nutrition facts: Your ice cream has {{calorie_per_serving.formattedValue}} calories per 100&nbsp;g serving , i.e., about {{percent_rdi.formattedValue}}% of your RDI . Enjoy your sweet treat in moderation .
                                TXT],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Source: U.S. Department of Agriculture'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Hidden',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'water_milk',
                            'label' => 'Water milk',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_sugars_milk',
                            'label' => 'Total sugars milk',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_solids_milk',
                            'label' => 'Total solids milk',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_fat_milk',
                            'label' => 'Total fat milk',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'salt_milk',
                            'label' => 'Salt milk',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'protein_milk',
                            'label' => 'Protein milk',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pod_milk',
                            'label' => 'Pod milk',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pac_milk',
                            'label' => 'Pac milk',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'other_solids_milk',
                            'label' => 'Other solids milk',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'msnf_milk',
                            'label' => 'Msnf milk',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'lactose_milk',
                            'label' => 'Lactose milk',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'density_milk',
                            'label' => 'Density milk',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cal_milk',
                            'label' => 'Cal milk',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'quantity_milk',
                            'label' => 'Quantity',
                            'type' => 'number',
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
                            'name' => 'water_cream',
                            'label' => 'Water cream',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_sugars_cream',
                            'label' => 'Total sugars cream',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_solids_cream',
                            'label' => 'Total solids cream',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_fat_cream',
                            'label' => 'Total fat cream',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'salt_cream',
                            'label' => 'Salt cream',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'protein_cream',
                            'label' => 'Protein cream',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pod_cream',
                            'label' => 'Pod cream',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pac_cream',
                            'label' => 'Pac cream',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'other_solids_cream',
                            'label' => 'Other solids cream',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'msnf_cream',
                            'label' => 'Msnf cream',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'lactose_cream',
                            'label' => 'Lactose cream',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'density_cream',
                            'label' => 'Density cream',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cal_cream',
                            'label' => 'Cal cream',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'quantity_cream',
                            'label' => 'Quantity',
                            'type' => 'number',
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
                            'name' => 'water_sugar',
                            'label' => 'Water sugar',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_sugar_sugar',
                            'label' => 'Total sugar sugar',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_solids_sugar',
                            'label' => 'Total solids sugar',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pod_sugar',
                            'label' => 'Pod sugar',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pac_sugar',
                            'label' => 'Pac sugar',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'other_solids_sugar',
                            'label' => 'Other solids sugar',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'percent_sugar',
                            'label' => 'Percent sugar',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'water_flav',
                            'label' => 'Water flav',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_fat_flav',
                            'label' => 'Total fat flav',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_sugars_flav',
                            'label' => 'Total sugars flav',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'lactose_flav',
                            'label' => 'Lactose flav',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'protein_flav',
                            'label' => 'Protein flav',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_solids_flav',
                            'label' => 'Total solids flav',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'other_solids_flav',
                            'label' => 'Other solids flav',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'msnf_flav',
                            'label' => 'Msnf flav',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pac_flav',
                            'label' => 'Pac flav',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pod_flav',
                            'label' => 'Pod flav',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hf_flav',
                            'label' => 'Hf flav',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'water_emuls',
                            'label' => 'Water emuls',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_solids_emuls',
                            'label' => 'Total solids emuls',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_fat_emuls',
                            'label' => 'Total fat emuls',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'protein_emuls',
                            'label' => 'Protein emuls',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'other_solids_emuls',
                            'label' => 'Other solids emuls',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'quantity_emulsifier',
                            'label' => 'Quantity ',
                            'type' => 'number',
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
                            'name' => 'mass_emuls',
                            'label' => 'Mass emuls',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_solids_stabilizer',
                            'label' => 'Total solids stabilizer',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'calorie_per_serving',
                            'label' => 'Calorie per serving (100 g)',
                            'type' => 'number',
                            'unit' => '44',
                            'unit_default' => 'cal',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_calorie',
                            'label' => 'Total calorie',
                            'type' => 'number',
                            'unit' => '44',
                            'unit_default' => 'cal',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_protein',
                            'label' => 'Total protein',
                            'type' => 'number',
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
                            'name' => 'total_sugar',
                            'label' => 'Total sugar ',
                            'type' => 'number',
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
                            'name' => 'total_fat',
                            'label' => 'Total fat',
                            'type' => 'number',
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
                            'name' => 'water_add',
                            'label' => 'Water add',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_fat_add',
                            'label' => 'Total fat add',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'salt_add',
                            'label' => 'Salt add',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_sugars_add',
                            'label' => 'Total sugars add',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'lactose_add',
                            'label' => 'Lactose add',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'protein_add',
                            'label' => 'Protein add',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_solids_add',
                            'label' => 'Total solids add',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'other_solids_add',
                            'label' => 'Other solids add',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'msnf_add',
                            'label' => 'Msnf add',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pac_add',
                            'label' => 'Pac add',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pod_add',
                            'label' => 'Pod add',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'percent_rdi',
                            'label' => 'Percent rdi',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_solid',
                            'label' => 'Total solid',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'quantity_milk=density_milk*volume_milk',
            'results' => ['density_milk' => 'quantity_milk/volume_milk', 'volume_milk' => 'quantity_milk/density_milk', 'quantity_milk' => 'density_milk*volume_milk'],
        ],
        [
            'title' => 'quantity_cream=density_cream*volume_cream',
            'results' => ['quantity_cream' => 'density_cream*volume_cream', 'volume_cream' => 'quantity_cream/density_cream', 'density_cream' => 'quantity_cream/volume_cream'],
        ],
        [
            'title' => 'quantity_emulsifier = mass_emuls*num_emuls/1000',
            'results' => ['quantity_emulsifier' => '(1/1000)*mass_emuls*num_emuls', 'num_emuls' => '1000*quantity_emulsifier/mass_emuls', 'mass_emuls' => '1000*quantity_emulsifier/num_emuls'],
        ],
        [
            'title' => <<<'TXT'
            total_solid=total_solids_add*0.01*quantity_add_ing+total_solids_milk*0.01*quantity_milk + total_solids_cream*0.01*quantity_cream + total_solids_sugar*0.01*quantity_sweetener + total_solids_flav*0.01*quantity_flavoring + total_solids_emuls*0.01*quantity_emulsifier + total_solids_stabilizer*0.01*quantity_stabilizer
            TXT,
            'results' => [
                'quantity_flavoring' => <<<'TXT'
                (-quantity_add_ing*total_solids_add - quantity_cream*total_solids_cream - quantity_emulsifier*total_solids_emuls - quantity_milk*total_solids_milk - quantity_stabilizer*total_solids_stabilizer - quantity_sweetener*total_solids_sugar + 100*total_solid)/total_solids_flav
                TXT,
                'quantity_sweetener' => <<<'TXT'
                (-quantity_add_ing*total_solids_add - quantity_cream*total_solids_cream - quantity_emulsifier*total_solids_emuls - quantity_flavoring*total_solids_flav - quantity_milk*total_solids_milk - quantity_stabilizer*total_solids_stabilizer + 100*total_solid)/total_solids_sugar
                TXT,
                'total_solids_add' => <<<'TXT'
                (-quantity_cream*total_solids_cream - quantity_emulsifier*total_solids_emuls - quantity_flavoring*total_solids_flav - quantity_milk*total_solids_milk - quantity_stabilizer*total_solids_stabilizer - quantity_sweetener*total_solids_sugar + 100*total_solid)/quantity_add_ing
                TXT,
                'quantity_stabilizer' => <<<'TXT'
                (-quantity_add_ing*total_solids_add - quantity_cream*total_solids_cream - quantity_emulsifier*total_solids_emuls - quantity_flavoring*total_solids_flav - quantity_milk*total_solids_milk - quantity_sweetener*total_solids_sugar + 100*total_solid)/total_solids_stabilizer
                TXT,
                'quantity_milk' => <<<'TXT'
                (-quantity_add_ing*total_solids_add - quantity_cream*total_solids_cream - quantity_emulsifier*total_solids_emuls - quantity_flavoring*total_solids_flav - quantity_stabilizer*total_solids_stabilizer - quantity_sweetener*total_solids_sugar + 100*total_solid)/total_solids_milk
                TXT,
                'total_solids_cream' => <<<'TXT'
                (-quantity_add_ing*total_solids_add - quantity_emulsifier*total_solids_emuls - quantity_flavoring*total_solids_flav - quantity_milk*total_solids_milk - quantity_stabilizer*total_solids_stabilizer - quantity_sweetener*total_solids_sugar + 100*total_solid)/quantity_cream
                TXT,
                'total_solids_flav' => <<<'TXT'
                (-quantity_add_ing*total_solids_add - quantity_cream*total_solids_cream - quantity_emulsifier*total_solids_emuls - quantity_milk*total_solids_milk - quantity_stabilizer*total_solids_stabilizer - quantity_sweetener*total_solids_sugar + 100*total_solid)/quantity_flavoring
                TXT,
                'total_solid' => <<<'TXT'
                (1/100)*quantity_add_ing*total_solids_add + (1/100)*quantity_cream*total_solids_cream + (1/100)*quantity_emulsifier*total_solids_emuls + (1/100)*quantity_flavoring*total_solids_flav + (1/100)*quantity_milk*total_solids_milk + (1/100)*quantity_stabilizer*total_solids_stabilizer + (1/100)*quantity_sweetener*total_solids_sugar
                TXT,
                'quantity_cream' => <<<'TXT'
                (-quantity_add_ing*total_solids_add - quantity_emulsifier*total_solids_emuls - quantity_flavoring*total_solids_flav - quantity_milk*total_solids_milk - quantity_stabilizer*total_solids_stabilizer - quantity_sweetener*total_solids_sugar + 100*total_solid)/total_solids_cream
                TXT,
                'total_solids_milk' => <<<'TXT'
                (-quantity_add_ing*total_solids_add - quantity_cream*total_solids_cream - quantity_emulsifier*total_solids_emuls - quantity_flavoring*total_solids_flav - quantity_stabilizer*total_solids_stabilizer - quantity_sweetener*total_solids_sugar + 100*total_solid)/quantity_milk
                TXT,
                'total_solids_stabilizer' => <<<'TXT'
                (-quantity_add_ing*total_solids_add - quantity_cream*total_solids_cream - quantity_emulsifier*total_solids_emuls - quantity_flavoring*total_solids_flav - quantity_milk*total_solids_milk - quantity_sweetener*total_solids_sugar + 100*total_solid)/quantity_stabilizer
                TXT,
                'total_solids_sugar' => <<<'TXT'
                (-quantity_add_ing*total_solids_add - quantity_cream*total_solids_cream - quantity_emulsifier*total_solids_emuls - quantity_flavoring*total_solids_flav - quantity_milk*total_solids_milk - quantity_stabilizer*total_solids_stabilizer + 100*total_solid)/quantity_sweetener
                TXT,
                'total_solids_emuls' => <<<'TXT'
                (-quantity_add_ing*total_solids_add - quantity_cream*total_solids_cream - quantity_flavoring*total_solids_flav - quantity_milk*total_solids_milk - quantity_stabilizer*total_solids_stabilizer - quantity_sweetener*total_solids_sugar + 100*total_solid)/quantity_emulsifier
                TXT,
                'quantity_emulsifier' => <<<'TXT'
                (-quantity_add_ing*total_solids_add - quantity_cream*total_solids_cream - quantity_flavoring*total_solids_flav - quantity_milk*total_solids_milk - quantity_stabilizer*total_solids_stabilizer - quantity_sweetener*total_solids_sugar + 100*total_solid)/total_solids_emuls
                TXT,
                'quantity_add_ing' => <<<'TXT'
                (-quantity_cream*total_solids_cream - quantity_emulsifier*total_solids_emuls - quantity_flavoring*total_solids_flav - quantity_milk*total_solids_milk - quantity_stabilizer*total_solids_stabilizer - quantity_sweetener*total_solids_sugar + 100*total_solid)/total_solids_add
                TXT,
            ],
        ],
        [
            'title' => 'final_icecream_quantity=quantity_add_ing+quantity_milk+quantity_cream+quantity_sweetener+quantity_flavoring+quantity_emulsifier+quantity_stabilizer',
            'results' => [
                'final_icecream_quantity' => 'quantity_add_ing + quantity_cream + quantity_emulsifier + quantity_flavoring + quantity_milk + quantity_stabilizer + quantity_sweetener',
                'quantity_flavoring' => 'final_icecream_quantity - quantity_add_ing - quantity_cream - quantity_emulsifier - quantity_milk - quantity_stabilizer - quantity_sweetener',
                'quantity_sweetener' => 'final_icecream_quantity - quantity_add_ing - quantity_cream - quantity_emulsifier - quantity_flavoring - quantity_milk - quantity_stabilizer',
                'quantity_stabilizer' => 'final_icecream_quantity - quantity_add_ing - quantity_cream - quantity_emulsifier - quantity_flavoring - quantity_milk - quantity_sweetener',
                'quantity_milk' => 'final_icecream_quantity - quantity_add_ing - quantity_cream - quantity_emulsifier - quantity_flavoring - quantity_stabilizer - quantity_sweetener',
                'quantity_cream' => 'final_icecream_quantity - quantity_add_ing - quantity_emulsifier - quantity_flavoring - quantity_milk - quantity_stabilizer - quantity_sweetener',
                'quantity_emulsifier' => 'final_icecream_quantity - quantity_add_ing - quantity_cream - quantity_flavoring - quantity_milk - quantity_stabilizer - quantity_sweetener',
                'quantity_add_ing' => 'final_icecream_quantity - quantity_cream - quantity_emulsifier - quantity_flavoring - quantity_milk - quantity_stabilizer - quantity_sweetener',
            ],
        ],
        [
            'title' => 'total_solids_percent=(total_solid/final_icecream_quantity)*100',
            'results' => ['final_icecream_quantity' => '100*total_solid/total_solids_percent', 'total_solid' => '(1/100)*final_icecream_quantity*total_solids_percent', 'total_solids_percent' => '100*total_solid/final_icecream_quantity'],
        ],
        [
            'title' => <<<'TXT'
            total_fat=total_fat_add*0.01*quantity_add_ing+total_fat_milk*0.01*quantity_milk + total_fat_cream*0.01*quantity_cream + total_fat_flav*0.01*quantity_flavoring + total_fat_emuls*0.01*quantity_emulsifier 
            TXT,
            'results' => [
                'total_fat_emuls' => <<<'TXT'
                (-quantity_add_ing*total_fat_add - quantity_cream*total_fat_cream - quantity_flavoring*total_fat_flav - quantity_milk*total_fat_milk + 100*total_fat)/quantity_emulsifier
                TXT,
                'quantity_flavoring' => <<<'TXT'
                (-quantity_add_ing*total_fat_add - quantity_cream*total_fat_cream - quantity_emulsifier*total_fat_emuls - quantity_milk*total_fat_milk + 100*total_fat)/total_fat_flav
                TXT,
                'total_fat_add' => <<<'TXT'
                (-quantity_cream*total_fat_cream - quantity_emulsifier*total_fat_emuls - quantity_flavoring*total_fat_flav - quantity_milk*total_fat_milk + 100*total_fat)/quantity_add_ing
                TXT,
                'total_fat_flav' => <<<'TXT'
                (-quantity_add_ing*total_fat_add - quantity_cream*total_fat_cream - quantity_emulsifier*total_fat_emuls - quantity_milk*total_fat_milk + 100*total_fat)/quantity_flavoring
                TXT,
                'quantity_milk' => <<<'TXT'
                (-quantity_add_ing*total_fat_add - quantity_cream*total_fat_cream - quantity_emulsifier*total_fat_emuls - quantity_flavoring*total_fat_flav + 100*total_fat)/total_fat_milk
                TXT,
                'total_fat' => <<<'TXT'
                (1/100)*quantity_add_ing*total_fat_add + (1/100)*quantity_cream*total_fat_cream + (1/100)*quantity_emulsifier*total_fat_emuls + (1/100)*quantity_flavoring*total_fat_flav + (1/100)*quantity_milk*total_fat_milk
                TXT,
                'total_fat_cream' => <<<'TXT'
                (-quantity_add_ing*total_fat_add - quantity_emulsifier*total_fat_emuls - quantity_flavoring*total_fat_flav - quantity_milk*total_fat_milk + 100*total_fat)/quantity_cream
                TXT,
                'total_fat_milk' => <<<'TXT'
                (-quantity_add_ing*total_fat_add - quantity_cream*total_fat_cream - quantity_emulsifier*total_fat_emuls - quantity_flavoring*total_fat_flav + 100*total_fat)/quantity_milk
                TXT,
                'quantity_cream' => <<<'TXT'
                (-quantity_add_ing*total_fat_add - quantity_emulsifier*total_fat_emuls - quantity_flavoring*total_fat_flav - quantity_milk*total_fat_milk + 100*total_fat)/total_fat_cream
                TXT,
                'quantity_emulsifier' => <<<'TXT'
                (-quantity_add_ing*total_fat_add - quantity_cream*total_fat_cream - quantity_flavoring*total_fat_flav - quantity_milk*total_fat_milk + 100*total_fat)/total_fat_emuls
                TXT,
                'quantity_add_ing' => <<<'TXT'
                (-quantity_cream*total_fat_cream - quantity_emulsifier*total_fat_emuls - quantity_flavoring*total_fat_flav - quantity_milk*total_fat_milk + 100*total_fat)/total_fat_add
                TXT,
            ],
        ],
        [
            'title' => 'total_fat_percent=(total_fat/final_icecream_quantity)*100',
            'results' => ['final_icecream_quantity' => '100*total_fat/total_fat_percent', 'total_fat_percent' => '100*total_fat/final_icecream_quantity', 'total_fat' => '(1/100)*final_icecream_quantity*total_fat_percent'],
        ],
        [
            'title' => <<<'TXT'
            total_sugar=total_sugars_add*0.01*quantity_add_ing+total_sugars_milk*0.01*quantity_milk + total_sugars_cream*0.01*quantity_cream + total_sugar_sugar*0.01*quantity_sweetener + total_sugars_flav*0.01*quantity_flavoring 
            TXT,
            'results' => [
                'total_sugars_milk' => <<<'TXT'
                (-quantity_add_ing*total_sugars_add - quantity_cream*total_sugars_cream - quantity_flavoring*total_sugars_flav - quantity_sweetener*total_sugar_sugar + 100*total_sugar)/quantity_milk
                TXT,
                'quantity_flavoring' => <<<'TXT'
                (-quantity_add_ing*total_sugars_add - quantity_cream*total_sugars_cream - quantity_milk*total_sugars_milk - quantity_sweetener*total_sugar_sugar + 100*total_sugar)/total_sugars_flav
                TXT,
                'quantity_sweetener' => <<<'TXT'
                (-quantity_add_ing*total_sugars_add - quantity_cream*total_sugars_cream - quantity_flavoring*total_sugars_flav - quantity_milk*total_sugars_milk + 100*total_sugar)/total_sugar_sugar
                TXT,
                'total_sugar_sugar' => <<<'TXT'
                (-quantity_add_ing*total_sugars_add - quantity_cream*total_sugars_cream - quantity_flavoring*total_sugars_flav - quantity_milk*total_sugars_milk + 100*total_sugar)/quantity_sweetener
                TXT,
                'total_sugars_cream' => <<<'TXT'
                (-quantity_add_ing*total_sugars_add - quantity_flavoring*total_sugars_flav - quantity_milk*total_sugars_milk - quantity_sweetener*total_sugar_sugar + 100*total_sugar)/quantity_cream
                TXT,
                'total_sugar' => <<<'TXT'
                (1/100)*quantity_add_ing*total_sugars_add + (1/100)*quantity_cream*total_sugars_cream + (1/100)*quantity_flavoring*total_sugars_flav + (1/100)*quantity_milk*total_sugars_milk + (1/100)*quantity_sweetener*total_sugar_sugar
                TXT,
                'quantity_milk' => <<<'TXT'
                (-quantity_add_ing*total_sugars_add - quantity_cream*total_sugars_cream - quantity_flavoring*total_sugars_flav - quantity_sweetener*total_sugar_sugar + 100*total_sugar)/total_sugars_milk
                TXT,
                'quantity_cream' => <<<'TXT'
                (-quantity_add_ing*total_sugars_add - quantity_flavoring*total_sugars_flav - quantity_milk*total_sugars_milk - quantity_sweetener*total_sugar_sugar + 100*total_sugar)/total_sugars_cream
                TXT,
                'total_sugars_add' => <<<'TXT'
                (-quantity_cream*total_sugars_cream - quantity_flavoring*total_sugars_flav - quantity_milk*total_sugars_milk - quantity_sweetener*total_sugar_sugar + 100*total_sugar)/quantity_add_ing
                TXT,
                'total_sugars_flav' => <<<'TXT'
                (-quantity_add_ing*total_sugars_add - quantity_cream*total_sugars_cream - quantity_milk*total_sugars_milk - quantity_sweetener*total_sugar_sugar + 100*total_sugar)/quantity_flavoring
                TXT,
                'quantity_add_ing' => <<<'TXT'
                (-quantity_cream*total_sugars_cream - quantity_flavoring*total_sugars_flav - quantity_milk*total_sugars_milk - quantity_sweetener*total_sugar_sugar + 100*total_sugar)/total_sugars_add
                TXT,
            ],
        ],
        [
            'title' => 'total_sugar_percent=(total_sugar/final_icecream_quantity)*100',
            'results' => ['final_icecream_quantity' => '100*total_sugar/total_sugar_percent', 'total_sugar' => '(1/100)*final_icecream_quantity*total_sugar_percent', 'total_sugar_percent' => '100*total_sugar/final_icecream_quantity'],
        ],
        [
            'title' => <<<'TXT'
            total_protein=protein_add*0.01*quantity_add_ing+protein_milk*0.01*quantity_milk + protein_cream*0.01*quantity_cream +protein_emuls*0.01*quantity_emulsifier + protein_flav*0.01*quantity_flavoring
            TXT,
            'results' => [
                'protein_flav' => <<<'TXT'
                (-protein_add*quantity_add_ing - protein_cream*quantity_cream - protein_emuls*quantity_emulsifier - protein_milk*quantity_milk + 100*total_protein)/quantity_flavoring
                TXT,
                'total_protein' => <<<'TXT'
                (1/100)*protein_add*quantity_add_ing + (1/100)*protein_cream*quantity_cream + (1/100)*protein_emuls*quantity_emulsifier + (1/100)*protein_flav*quantity_flavoring + (1/100)*protein_milk*quantity_milk
                TXT,
                'quantity_flavoring' => '(-protein_add*quantity_add_ing - protein_cream*quantity_cream - protein_emuls*quantity_emulsifier - protein_milk*quantity_milk + 100*total_protein)/protein_flav',
                'protein_emuls' => <<<'TXT'
                (-protein_add*quantity_add_ing - protein_cream*quantity_cream - protein_flav*quantity_flavoring - protein_milk*quantity_milk + 100*total_protein)/quantity_emulsifier
                TXT,
                'quantity_milk' => <<<'TXT'
                (-protein_add*quantity_add_ing - protein_cream*quantity_cream - protein_emuls*quantity_emulsifier - protein_flav*quantity_flavoring + 100*total_protein)/protein_milk
                TXT,
                'protein_add' => <<<'TXT'
                (-protein_cream*quantity_cream - protein_emuls*quantity_emulsifier - protein_flav*quantity_flavoring - protein_milk*quantity_milk + 100*total_protein)/quantity_add_ing
                TXT,
                'quantity_cream' => <<<'TXT'
                (-protein_add*quantity_add_ing - protein_emuls*quantity_emulsifier - protein_flav*quantity_flavoring - protein_milk*quantity_milk + 100*total_protein)/protein_cream
                TXT,
                'protein_cream' => <<<'TXT'
                (-protein_add*quantity_add_ing - protein_emuls*quantity_emulsifier - protein_flav*quantity_flavoring - protein_milk*quantity_milk + 100*total_protein)/quantity_cream
                TXT,
                'protein_milk' => <<<'TXT'
                (-protein_add*quantity_add_ing - protein_cream*quantity_cream - protein_emuls*quantity_emulsifier - protein_flav*quantity_flavoring + 100*total_protein)/quantity_milk
                TXT,
                'quantity_emulsifier' => '(-protein_add*quantity_add_ing - protein_cream*quantity_cream - protein_flav*quantity_flavoring - protein_milk*quantity_milk + 100*total_protein)/protein_emuls',
                'quantity_add_ing' => <<<'TXT'
                (-protein_cream*quantity_cream - protein_emuls*quantity_emulsifier - protein_flav*quantity_flavoring - protein_milk*quantity_milk + 100*total_protein)/protein_add
                TXT,
            ],
        ],
        [
            'title' => 'total_calorie=(total_fat*9+total_sugar*3.87+total_protein*4)*1000',
            'results' => ['total_protein' => '(1/4000)*total_calorie - 9/4*total_fat - 387/400*total_sugar', 'total_sugar' => '(1/3870)*total_calorie - 100/43*total_fat - 400/387*total_protein', 'total_calorie' => '9000*total_fat + 4000*total_protein + 3870*total_sugar', 'total_fat' => '(1/9000)*total_calorie - 4/9*total_protein - 43/100*total_sugar'],
        ],
        [
            'title' => 'calorie_per_serving = (total_calorie/final_icecream_quantity)*0.1',
            'results' => ['final_icecream_quantity' => '(1/10)*total_calorie/calorie_per_serving', 'calorie_per_serving' => '(1/10)*total_calorie/final_icecream_quantity', 'total_calorie' => '10*calorie_per_serving*final_icecream_quantity'],
        ],
        [
            'title' => 'percent_sugar=(quantity_sweetener/final_icecream_quantity)*100',
            'results' => ['final_icecream_quantity' => '100*quantity_sweetener/percent_sugar', 'percent_sugar' => '100*quantity_sweetener/final_icecream_quantity', 'quantity_sweetener' => '(1/100)*final_icecream_quantity*percent_sugar'],
        ],
        [
            'title' => 'percent_rdi=(calorie_per_serving/2000)*100',
            'results' => ['percent_rdi' => '(1/20)*calorie_per_serving', 'calorie_per_serving' => '20*percent_rdi'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Ice cream works in both directions, between quantity and quantity (nos). Quantity is opened in US customary cups (236.59 ml); the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Ice cream calculator works', 'html' => <<<'TXT'
            <p>The Ice cream calculator applies one relationship to 1 number and reports Quantity, Quantity and Quantity.</p><p>The relationship it solves reads Quantity = Density milk × Quantity.</p><p>The result panel carries Quantity, Quantity, Quantity and Quantity (nos), each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 1 box, and nothing else.</p><ul><li><strong>Quantity</strong> — in US customary cups (236.59 ml)</li></ul><p>The result boxes are Quantity in US customary cups (236.59 ml), Quantity in grams, Quantity in grams, Quantity (nos), Quantity in milligrams, Quantity in grams, Quantity of ice cream mix in grams, Total solids in %, Total fat in %, Total sugar in %, Total sugars milk, Total solids milk, Total fat milk, Protein milk, Density milk, Quantity, Total sugars cream, Total solids cream, Total fat cream, Protein cream, Density cream, Quantity, Total sugar sugar, Total solids sugar, Percent sugar, Total fat flav, Total sugars flav, Protein flav, Total solids flav, Total solids emuls, Total fat emuls, Protein emuls, Quantity, Mass emuls, Total solids stabilizer, Calorie per serving (100 g), Total calorie, Total protein, Total sugar, Total fat, Total fat add, Total sugars add, Protein add, Total solids add, Percent rdi, Total solid; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Quantity</strong> = <code>Density milk × Quantity</code></li><li><strong>Density milk</strong> = <code>Quantity ÷ Quantity</code></li><li><strong>Density cream</strong> = <code>Quantity ÷ Quantity</code></li><li><strong>Quantity (nos)</strong> = <code>1000 × Quantity ÷ Mass emuls</code></li><li><strong>Mass emuls</strong> = <code>1000 × Quantity ÷ Quantity (nos)</code></li><li><strong>Quantity of ice cream mix</strong> = <code>Quantity + Quantity + Quantity + Quantity + Quantity + Quantity + Quantity</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Quantity</strong> = <code>Density milk × Quantity</code> — the form to use when Density milk and Quantity are the values you have.</li><li><strong>Density milk</strong> = <code>Quantity ÷ Quantity</code> — the form to use when Quantity and Quantity are the values you have.</li><li><strong>Quantity</strong> = <code>Quantity ÷ Density milk</code> — the form to use when Quantity and Density milk are the values you have.</li><li><strong>Quantity</strong> = <code>Density cream × Quantity</code> — the form to use when Density cream and Quantity are the values you have.</li><li><strong>Quantity</strong> = <code>Quantity ÷ Density cream</code> — the form to use when Quantity and Density cream are the values you have.</li><li><strong>Density cream</strong> = <code>Quantity ÷ Quantity</code> — the form to use when Quantity and Quantity are the values you have.</li><li><strong>Quantity</strong> = <code>(1 ÷ 1000) × Mass emuls × Quantity (nos)</code> — the form to use when Mass emuls and Quantity (nos) are the values you have.</li><li><strong>Quantity (nos)</strong> = <code>1000 × Quantity ÷ Mass emuls</code> — the form to use when Quantity and Mass emuls are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Quantity, Density milk and Quantity can be the unknown.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Quantity carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Quantity, Quantity and Quantity are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Quantity left as a guess.</strong> Anything typed into Quantity is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Quantity and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Quantity</strong> is a us customary cups (236.59 ml) quantity: the page opens it in uscups and converts anything else you pick before the formula runs. The page reads it when it works out Density milk and Quantity. Check the field label and unit before calculating.</li></ul><p>None of the boxes has to be filled in a particular order. </p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Quantity. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Quantity into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Quantity in uscups with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Quantity is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover US customary cups (236.59 ml) and grams. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Quantity is what you already know and Quantity and Quantity is what you need — the reverse of that situation is what the rearranged form is for.</p><p>If the result seems unexpected, recheck the inputs and units before using it.</p><p>Related calculators: <a href="/food/chocolate">Chocolate</a>, <a href="/food/cake-serving">Cake serving</a> and <a href="/food/chilled-drink">Chilled drink</a>.</p>
            TXT],
            ['title' => 'Limits and data handling', 'html' => <<<'TXT'
            <p>This calculator applies the relationships and assumptions shown on the page to the values entered. It cannot verify ingredient labels, measurements, equipment or conditions that are not represented in the form. Check the selected units and consult recipe, product or safety instructions where they apply.</p>
            <p>The result is a calculation, not a measurement of the food or drink. Use a scale, thermometer or product label when the real-world quantity or safety status matters.</p>
            TXT],
            ['title' => 'Where this fits among the other calculators', 'html' => <<<'TXT'
            <p>Neighbouring pages resolve the parts of the same job that Ice cream leaves alone. Knowing which is which saves running the wrong one:</p><p>Worth opening next: <a href="/food/turkey-defrost">Turkey defrost time</a>, <a href="/food/turkey-size">Turkey size Calculator</a> and <a href="/food/turkey-thawing">Turkey thawing Calculator</a>. They follow the same pattern as this page (form, formula, worked example, answer), so a reader who understands one understands the others.</p><p>Using the page that already answers the question you have is better than adapting this one: the formula and the units will match what you expect, and the worked example will be about your case.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Ice cream is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Quantity beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. </p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Ice cream calculator work out?', 'a' => 'Quantity, Quantity, Quantity and Quantity (nos), from Density milk and Quantity. The relationship is Quantity = Density milk × Quantity.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Quantity (US customary cups (236.59 ml)). Fill quantity and leave Quantity empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Quantity, Density milk, Quantity and Quantity can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Quantity is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Quantity left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Quantity keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/food/chocolate', 'name' => 'Chocolate'],
            ['path' => '/food/cake-serving', 'name' => 'Cake serving'],
            ['path' => '/food/chilled-drink', 'name' => 'Chilled drink']
        ],
    ],
];
