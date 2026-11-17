<?php

/**
 * Lemonade stand
 * /finance/lemonade-stand
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Lemonade stand',
    'meta' => ['title' => 'Lemonade stand Calculator: Free, With Steps', 'description' => 'Lemonade stand takes do you have a target goal? and returns total cost of cups. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Lemonade stand Calculator', 'updated' => '2026-09-26'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        This calculator is designed to predict how much profit  (or loss ) you can make by setting up a lemonade stand. It helps you figure out how best to use your resources  and price your product 
                        TXT],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Target goal ',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'have_target',
                            'label' => 'Do you have a target goal?',
                            'type' => 'select',
                            'options' => ['No' => '0', 'Yes' => '1'],
                            'dataset' => 'Target',
                            'default' => 'No',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'target_profit',
                            'label' => 'Target goal',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.0001'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'How much lemonade do you want to sell? ',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'desired_servings',
                            'label' => 'I want to sell',
                            'type' => 'number',
                            'suffix' => 'servings',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'serving_size',
                            'label' => 'Size of serving cup',
                            'type' => 'select',
                            'options' => ['8 fl. oz. / 0.25 L' => '1', '12 fl. oz. / 0.37 L' => '1.5', '16 fl. oz. / 0.5 L' => '2', '20 fl. oz. / 0.6 L' => '2.5'],
                            'dataset' => 'Serving Size',
                            'control' => 'DROPDOWN',
                            'defaults' => [
                                ['value' => '8 fl. oz. / 0.25 L', 'when' => null],
                                ['value' => '8 fl. oz. / 0.25 L', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cups_cost',
                            'label' => 'Total cost of cups',
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
                            'name' => 'change_cup_cost',
                            'label' => 'Would you like to modify the cost of cups?',
                            'type' => 'select',
                            'options' => ['Yes' => '1', 'No' => '0'],
                            'dataset' => 'Change cup cost',
                            'default' => 'No',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'user_cup_cost',
                            'label' => 'Total cost of cups',
                            'type' => 'number',
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
            'title' => 'Permit requirement ',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        Depending on your location, setting up a lemonade stand and/or using fresh ingredients might require some permits  Here's a quick guide on permits in the USA. Since there's a lot of variation in permit costs based on where you live, it's best to contact your local municipality in order to get the necessary go-ahead 
                        TXT],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'permit',
                            'label' => 'Does your state require a permit?',
                            'type' => 'select',
                            'options' => ['Yes' => '1', 'No' => '0'],
                            'dataset' => 'Permit',
                            'default' => 'No',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'permit_cost',
                            'label' => 'Permit cost',
                            'type' => 'number',
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
            'title' => 'Ingredients cost ',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cost_type',
                            'label' => 'Do you already know the total cost?',
                            'type' => 'select',
                            'options' => ['Yes! ' => '1', 'No, I\'d like to choose a recipe' => '0'],
                            'dataset' => 'Receipt vs. Recipe',
                            'default' => 'Yes! ',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'receipt_cost',
                            'label' => 'Cost of ingredients',
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
                            'name' => 'receipt_total_cost_copy',
                            'label' => 'Total cost',
                            'type' => 'number',
                            'help' => 'Includes indirect costs, cost of cups, and permit costs.',
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
                            'name' => 'lemonade_type',
                            'label' => 'Recipe type',
                            'type' => 'select',
                            'options' => ['Freshly squeezed lemonade' => '1', 'Using lemonade concentrate' => '2', 'Using lemonade mix powder' => '3'],
                            'dataset' => 'Lemonade Type',
                            'default' => 'Freshly squeezed lemonade',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => null, 'text' => 'You will need:'],
                                ['when' => 'lemonade_type == 1', 'text' => <<<'TXT'
                                {{fresh_lemonjuice_qty_needed_cups.formattedValue}} cups ({{fresh_lemonjuice_qty_needed_l.formattedValue}} L) of lemon juice {{fresh_sugar_qty_needed_cups.formattedValue}} cups ({{fresh_sugar_qty_needed_kg.formattedValue}} kg) of sugar {{fresh_water_qty_needed_cups.formattedValue}} cups ({{fresh_water_qty_needed_l.formattedValue}} L) of water
                                TXT],
                                ['when' => 'lemonade_type == 2', 'text' => <<<'TXT'
                                {{concentrate_qty_needed_cups.formattedValue}} cups ({{concentrate_qty_needed_l.formattedValue}} L) of lemon concentrate {{conc_sugar_qty_needed_cups.formattedValue}} cups ({{conc_sugar_qty_needed_kg.formattedValue}} kg) of sugar {{conc_water_qty_needed_cups.formattedValue}} cups ({{conc_water_qty_needed_l.formattedValue}} L) of water
                                TXT],
                                ['when' => 'lemonade_type == 3 and mix_choice == 0', 'text' => <<<'TXT'
                                {{mix_qty_needed_oz.formattedValue}} oz. ({{mix_qty_needed_g.formattedValue}} g) of lemonade mix {{mix_water_qty_needed_cups.formattedValue}} cups ({{mix_water_qty_needed_l.formattedValue}} L) of water
                                TXT],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mix_choice',
                            'label' => 'Do you want to modify the ratio?',
                            'type' => 'select',
                            'options' => ['Yes' => '1', 'No' => '0'],
                            'dataset' => 'Mix Ratio',
                            'default' => 'No',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fresh_ingredients_cost_copy',
                            'label' => 'Total cost of ingredients',
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
                            'name' => 'conc_ingredients_cost_copy',
                            'label' => 'Total cost of ingredients',
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
                            'name' => 'mix_ingredients_cost_copy',
                            'label' => 'Total cost of ingredients',
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
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'lemonade_type == 1 or lemonade_type == 2', 'text' => 'Note: This is based on a standard recipe. If you use different ratios in your recipe, your cost might differ.'],
                                ['when' => 'lemonade_type == 3 and mix_choice == 0', 'text' => 'Note: This is based on a standard recipe.'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fresh_total_cost_copy',
                            'label' => 'Total cost',
                            'type' => 'number',
                            'help' => 'Includes indirect costs, cost of cups, and permit costs.',
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
                            'name' => 'conc_total_cost_copy',
                            'label' => 'Total cost',
                            'type' => 'number',
                            'help' => 'Includes indirect costs, cost of cups, and permit costs.',
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
                            'name' => 'mix_qty_needed_2',
                            'label' => 'Amount of mix needed',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'oz',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mix_water_qty_needed_2',
                            'label' => 'Amount of water needed',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'cups',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        {{mix_qty_needed_oz_2.formattedValue}} oz. ({{mix_qty_needed_g_2.formattedValue}} g) of lemonade mix {{mix_water_qty_needed_cups_2.formattedValue}} cups ({{mix_water_qty_needed_l_2.formattedValue}} L) of water
                        TXT],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mix_ingredients_cost_copy_2',
                            'label' => 'Total cost of ingredients',
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
                            'name' => 'mix_total_cost_copy',
                            'label' => 'Total cost',
                            'type' => 'number',
                            'help' => 'Includes indirect costs, cost of cups, and permit costs.',
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
                            'name' => 'mix_total_cost_2_copy',
                            'label' => 'Total cost',
                            'type' => 'number',
                            'help' => 'Includes indirect costs, cost of cups, and permit costs.',
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
            'title' => 'Standard prices',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'lemon_price',
                            'label' => 'Price of lemons',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.0001'],
                            'min' => 2,
                            'default' => '1.75',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sugar_price',
                            'label' => 'Price of sugar',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.0001'],
                            'min' => 2,
                            'default' => '0.5',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'water_price',
                            'label' => 'Price of water',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.0001'],
                            'min' => 2,
                            'default' => '1.2',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'concentrate_price',
                            'label' => 'Price of lemon concentrate',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.0001'],
                            'min' => 2,
                            'default' => '18',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mix_price',
                            'label' => 'Price of lemonade mix',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.0001'],
                            'min' => 2,
                            'default' => '7',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Other indirect costs',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'stand_cost',
                            'label' => 'Stand cost',
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
                            'name' => 'refrigeration_cost',
                            'label' => 'Refrigeration cost',
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
                            'name' => 'lighting_cost',
                            'label' => 'Lighting cost',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.0001'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'indirect_cost_copy',
                            'label' => 'Total indirect cost',
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
            'title' => 'Profit calculation ',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'receipt_cost_per_serving',
                            'label' => 'Cost per serving',
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
                            'name' => 'fresh_cost_per_serving',
                            'label' => 'Cost per serving',
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
                            'name' => 'conc_cost_per_serving',
                            'label' => 'Cost per serving',
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
                            'name' => 'mix_cost_per_serving',
                            'label' => 'Cost per serving',
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
                            'name' => 'mix_cost_per_serving_2',
                            'label' => 'Cost per serving',
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
                            'name' => 'target_profit_goal',
                            'label' => 'Your target goal is',
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
                            'name' => 'selling_price_per_serving',
                            'label' => 'I want to sell each serving for',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.0001'],
                            'min' => 2,
                            'default' => '1',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'receipt_profit_copy',
                            'label' => 'Total profit',
                            'type' => 'number',
                            'help' => 'Total profit is the total amount of sales minus the total cost incurred.',
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
                            'name' => 'fresh_profit_copy',
                            'label' => 'Total profit',
                            'type' => 'number',
                            'help' => 'Total profit is the total amount of sales minus the total cost incurred.',
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
                            'name' => 'conc_profit_copy',
                            'label' => 'Total profit',
                            'type' => 'number',
                            'help' => 'Total profit is the total amount of sales minus the total cost incurred.',
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
                            'name' => 'mix_profit_copy',
                            'label' => 'Total profit',
                            'type' => 'number',
                            'help' => 'Total profit is the total amount of sales minus the total cost incurred.',
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
                            'name' => 'mix_profit_2_copy',
                            'label' => 'Total profit',
                            'type' => 'number',
                            'help' => 'Total profit is the total amount of sales minus the total cost incurred.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'place' => [0, 0, 0, 0],
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'profit < -5 and -profit_percent <= 0.03', 'text' => <<<'TXT'
                                Oops! You seem to be heading towards a loss of {{op_profit.monetaryValue}}  but you have nearly broken even (you have made** {{dif_profit_percent.formattedValue}}% of your money back!**) Try to sell more lemonade to at least break even!
                                TXT],
                                ['when' => 'profit < -5 and -profit_percent > 0.03', 'text' => <<<'TXT'
                                Uh-oh! You seem to be heading towards a loss of {{op_profit.monetaryValue}}  which is only {{dif_profit_percent.formattedValue}}% of your money back! Try to sell more lemonade to at least break even!
                                TXT],
                                ['when' => '-5 <= profit < 0', 'text' => 'So close ! You\'ll be just {{op_profit.monetaryValue}} away from breaking even! Try to sell more lemonade to make your money back!'],
                                ['when' => '0 <= profit <= 5', 'text' => 'Dang! After all that hard work, you\'ll barely break even, with only {{profit.monetaryValue}} in your pocket!  Try to sell more lemonade to be swimming in cash!'],
                                ['when' => 'profit > 5 and profit_percent <= 0.35', 'text' => <<<'TXT'
                                Meh! You'll end up with a profit of {{profit.monetaryValue}} , but you can do better  since this profit is just {{profit_percent.monetaryValue}}% of your expenses! Try to sell more lemonade to earn better profit!
                                TXT],
                                ['when' => 'profit > 5 and 0.35 < profit_percent <= 0.55', 'text' => 'Yay! You\'ll end up with a nice profit of {{profit.monetaryValue}} , which is {{profit_percent.monetaryValue}}% of your expenses!'],
                                ['when' => 'profit > 5 and profit_percent > 0.55', 'text' => <<<'TXT'
                                Sweet! You'll end up with a splendid profit of {{profit.monetaryValue}} , which is {{profit_percent.monetaryValue}}% of your expenses! But, are you sure customers are willing to pay that high? If you're able to sell all your lemonade at this price, then you'll be rolling in dough in no time! 
                                TXT],
                            ],
                        ],
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'profit < -5 and -profit_percent <= 0.03', 'text' => <<<'TXT'
                                Oops! You seem to be heading towards a loss of {{op_profit.monetaryValue}}  but you have nearly broken even (you have made {{dif_profit_percent.formattedValue}}% of your money back!) Also, you're still {{difference_op.monetaryValue}} away from your target ! Try to sell more lemonade to reach your goal !
                                TXT],
                                ['when' => 'profit < -5', 'text' => <<<'TXT'
                                Uh-oh! You seem to be heading towards a loss of {{op_profit.monetaryValue}}  which is only {{dif_profit_percent.formattedValue}}% of your money back! Also, you're still {{difference_op.monetaryValue}} away from your target ! Try to sell more lemonade to reach your goal !
                                TXT],
                                ['when' => '-5 <= profit < 0 and difference < -5', 'text' => <<<'TXT'
                                So close ! You'll be just {{op_profit.monetaryValue}} away from breaking even! But you're still {{difference_op.monetaryValue}} away from your target!  Try to sell more lemonade to reach your goal 
                                TXT],
                                ['when' => '-5 <= profit < 0 and difference >= -5', 'text' => <<<'TXT'
                                So close ! You'll be just {{op_profit.monetaryValue}} away from breaking even! You'll barely manage to reach your target (just {{difference_op.monetaryValue}} to go!) You can do it ! A few more cups of lemonade should get you there!
                                TXT],
                                ['when' => '0 <= profit <= 5 and difference < -5', 'text' => <<<'TXT'
                                Dang! After all that hard work, you'll barely break even, with only {{profit.monetaryValue}} in your pocket ! But you're still {{difference_op.monetaryValue}} away from your target! Try to sell more lemonade to reach your goal !
                                TXT],
                                ['when' => '0 <= profit <= 5 and difference >= -5 and difference < 0', 'text' => <<<'TXT'
                                Dang! After all that hard work, you'll barely break even, with only {{profit.monetaryValue}} in your pocket ! You'll barely manage to reach your target (just {{difference_op.monetaryValue}} to go!) You can do it ! Just a few more cups of lemonade should get you there!
                                TXT],
                                ['when' => 'profit <= 5 and difference >= 0 and target_profit > 0', 'text' => <<<'TXT'
                                Dang! After all that hard work, you'll barely break even, with only {{profit.monetaryValue}} in your pocket ! But you'll hit your (modest) target comfortably. Meh, is it worth the effort?  Try to sell more lemonade to be more profitable!
                                TXT],
                                ['when' => 'profit > 5 and difference < -5', 'text' => <<<'TXT'
                                You'll end up with a nice profit of {{profit.monetaryValue}}, which is {{profit_percent.formattedValue}}% of your expenses! But, you're still {{difference_op.monetaryValue}} away from your target ! Try to sell more lemonade to reach your goal !
                                TXT],
                                ['when' => 'profit > 5 and difference >= -5 and difference < 0', 'text' => <<<'TXT'
                                You'll end up with a nice profit of {{profit.monetaryValue}} , which is {{profit_percent.formattedValue}}% of your expenses! You'll also barely manage to reach your target (just {{difference_op.monetaryValue}} to go!) You can do it ! A few more cups of lemonade should get you there!
                                TXT],
                                ['when' => 'profit > 5 and difference >= 0', 'text' => <<<'TXT'
                                Woohoo!  You'll end up with a nice profit of {{profit.monetaryValue}} , which is {{profit_percent.formattedValue}}% of your expenses! You'll also hit your target comfortably  if you can sell all that lemonade before it goes bad!
                                TXT],
                            ],
                        ],
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'price_level == -1', 'text' => 'You may want to consider selling each serving for {{selling_cup_price.monetaryValue}} to keep with the standard rates '],
                                ['when' => 'price_level == 1', 'text' => <<<'TXT'
                                Your price per serving seems a tad too expensive! You may want to consider selling each serving for {{selling_cup_price_diff.monetaryValue}} to get more customers! 
                                TXT],
                                ['when' => <<<'TXT'
                                price_level != 1 and price_level != -1 and profit <= 5 and cost_type == 1 and indirect_cost == 0 and permit_cost == 0 and (receipt_cost >= receipt_total_cost * 0.67) 
                                TXT, 'text' => 'You\'ve chosen an appropriate price per serving , but your rather high cost of ingredients for " + desired_servings + " lemonade(s) seems to be setting you back!'],
                                ['when' => 'price_level != 1 and price_level != -1 and profit <= 5 and indirect_cost == 0 and permit_cost == 0', 'text' => 'You seem to have chosen an appropriate price per serving! '],
                                ['when' => 'price_level != 1 and price_level != -1 and profit <= 5 and indirect_cost == 0 and permit_cost != 0', 'text' => 'You\'ve chosen an appropriate price per serving , but your overhead cost (such as your permit cost) seems to be setting you back!'],
                                ['when' => 'price_level != 1 and price_level != -1 and profit <= 5 and indirect_cost != 0', 'text' => 'You\'ve chosen an appropriate price per serving , but your indirect costs (such as your stand/refrigeration/lighting costs) seem to be setting you back!'],
                                ['when' => 'price_level != 1 and price_level != -1 and profit > 5', 'text' => 'You seem to have chosen an appropriate price per serving! '],
                            ],
                        ],
                        ['type' => 'image', 'url' => '/lemonade_stand/money_loss.gif'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Hidden variables - Don\'t translate',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'receipt_total_cost',
                            'label' => 'Total cost',
                            'type' => 'number',
                            'help' => 'Includes indirect costs which can be added in the advanced mode, cost of cups, and permit costs.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'place' => [
                        0,
                        0,
                        0,
                        0,
                        0,
                        0,
                        0,
                        0,
                        0,
                        0,
                        0,
                        0,
                        0,
                        0,
                        0,
                        0,
                    ],
                    'fields' => [
                        [
                            'name' => 'fresh_lemon_juice_qty_needed',
                            'label' => 'Fresh lemon juice qty needed',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'cups',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'fresh_sugar_qty_needed',
                            'label' => 'Fresh sugar qty needed',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'oz',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'fresh_water_qty_needed',
                            'label' => 'Fresh water qty needed',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'cups',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'fresh_ingredients_cost',
                            'label' => 'Total ingredients cost',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'fresh_total_cost',
                            'label' => 'Total cost',
                            'type' => 'number',
                            'help' => 'Includes indirect costs which can be added in the advanced mode, cost of cups, and permit costs.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'concentrate_qty_needed',
                            'label' => 'Concentrate qty needed',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'cups',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'conc_sugar_qty_needed',
                            'label' => 'Conc sugar qty needed',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'cups',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'conc_water_qty_needed',
                            'label' => 'Conc water qty needed',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'cups',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'conc_ingredients_cost',
                            'label' => 'Total ingredients cost',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.01'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'conc_total_cost',
                            'label' => 'Total cost',
                            'type' => 'number',
                            'help' => 'Includes indirect costs which can be added in the advanced mode, cost of cups, and permit costs.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'mix_qty_needed',
                            'label' => 'Amount of mix needed',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'oz',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'mix_water_qty_needed',
                            'label' => 'Amount of water needed',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'cups',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'mix_ingredients_cost',
                            'label' => 'Total ingredients cost',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'mix_ingredients_cost_2',
                            'label' => 'Mix ingredients cost 2',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'mix_total_cost',
                            'label' => 'Total cost',
                            'type' => 'number',
                            'help' => 'Includes indirect costs which can be added in the advanced mode, cost of cups, and permit costs.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'mix_total_cost_2',
                            'label' => 'Mix total cost 2',
                            'type' => 'number',
                            'help' => 'Includes indirect costs which can be added in the advanced mode, cost of cups, and permit costs.',
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
                            'name' => 'indirect_cost',
                            'label' => 'Total Indirect Cost',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.0001'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'place' => [
                        0,
                        0,
                        0,
                        0,
                        0,
                    ],
                    'fields' => [
                        [
                            'name' => 'receipt_profit',
                            'label' => 'Total profit',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'fresh_profit',
                            'label' => 'Total profit',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'conc_profit',
                            'label' => 'Total profit',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'mix_profit',
                            'label' => 'Total profit',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'mix_profit_2',
                            'label' => 'Mix profit 2',
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
                    'place' => [0, 0, 0, 0],
                    'fields' => [
                        [
                            'name' => 'profit',
                            'label' => 'Profit',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'op_profit',
                            'label' => 'Op profit',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'profit_percent',
                            'label' => 'Profit percent',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'dif_profit_percent',
                            'label' => 'Dif profit percent',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'place' => [0, 0],
                    'fields' => [
                        [
                            'name' => 'price_level',
                            'label' => 'Price level',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'cup_price_diff',
                            'label' => 'Cup price diff',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 3,
                    'place' => [
                        0,
                        0,
                        0,
                        0,
                        0,
                        0,
                        1,
                        1,
                        1,
                        1,
                        1,
                        1,
                        2,
                        2,
                        2,
                        2,
                    ],
                    'fields' => [
                        [
                            'name' => 'fresh_lemonjuice_qty_needed_cups',
                            'label' => 'Fresh lemonjuice qty needed cups',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                        [
                            'name' => 'fresh_lemonjuice_qty_needed_l',
                            'label' => 'Fresh lemonjuice qty needed l',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                        [
                            'name' => 'fresh_sugar_qty_needed_cups',
                            'label' => 'Fresh sugar qty needed cups',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                        [
                            'name' => 'fresh_sugar_qty_needed_kg',
                            'label' => 'Fresh sugar qty needed kg',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                        [
                            'name' => 'fresh_water_qty_needed_cups',
                            'label' => 'Fresh water qty needed cups',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                        [
                            'name' => 'fresh_water_qty_needed_l',
                            'label' => 'Fresh water qty needed l',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                        [
                            'name' => 'conc_sugar_qty_needed_cups',
                            'label' => 'Conc sugar qty needed cups',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                        [
                            'name' => 'conc_sugar_qty_needed_kg',
                            'label' => 'Conc sugar qty needed kg',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                        [
                            'name' => 'conc_water_qty_needed_cups',
                            'label' => 'Conc water qty needed cups',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                        [
                            'name' => 'conc_water_qty_needed_l',
                            'label' => 'Conc water qty needed l',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                        [
                            'name' => 'concentrate_qty_needed_cups',
                            'label' => 'Concentrate qty needed cups',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                        [
                            'name' => 'concentrate_qty_needed_l',
                            'label' => 'Concentrate qty needed l',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                        [
                            'name' => 'mix_qty_needed_g',
                            'label' => 'Mix qty needed g',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                        [
                            'name' => 'mix_qty_needed_oz',
                            'label' => 'Mix qty needed oz',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                        [
                            'name' => 'mix_water_qty_needed_cups',
                            'label' => 'Mix water qty needed cups',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                        [
                            'name' => 'mix_water_qty_needed_l',
                            'label' => 'Mix water qty needed l',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'place' => [0, 0, 0, 0],
                    'fields' => [
                        [
                            'name' => 'mix_qty_needed_g_2',
                            'label' => 'Mix qty needed g 2',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                        [
                            'name' => 'mix_qty_needed_oz_2',
                            'label' => 'Mix qty needed oz 2',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                        [
                            'name' => 'mix_water_qty_needed_cups_2',
                            'label' => 'Mix water qty needed cups 2',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                        [
                            'name' => 'mix_water_qty_needed_l_2',
                            'label' => 'Mix water qty needed l 2',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
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
                            'name' => 'difference',
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
                            'name' => 'selling_cup_price',
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
                            'name' => 'fresh_lemonjuice_qty',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fresh_sugar_qty',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fresh_water_qty',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fresh_servings_in_batch',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'concentrate_qty',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'conc_sugar_qty',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'conc_water_qty',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'conc_servings_in_batch',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mix_qty',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mix_water_qty',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mix_servings_in_batch',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'maxprice_fresh_large2',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'minprice_fresh_large2',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'maxprice_fresh_small2',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'minprice_fresh_small2',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'maxprice_mix_large2',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'minprice_mix_large2',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'maxprice_mix_small2',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'minprice_mix_small2',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'selling_cup_price_diff',
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
                            'name' => 'difference_op',
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
            'title' => 'indirect_cost = stand_cost + lighting_cost + refrigeration_cost',
            'results' => ['indirect_cost' => 'lighting_cost + refrigeration_cost + stand_cost', 'stand_cost' => 'indirect_cost - lighting_cost - refrigeration_cost', 'refrigeration_cost' => 'indirect_cost - lighting_cost - stand_cost', 'lighting_cost' => 'indirect_cost - refrigeration_cost - stand_cost'],
        ],
        [
            'title' => 'fresh_total_cost = fresh_ingredients_cost + indirect_cost + permit_cost + cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost)',
            'results' => ['fresh_total_cost' => 'fresh_ingredients_cost + indirect_cost + permit_cost + cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost)', 'fresh_ingredients_cost' => 'fresh_total_cost - indirect_cost - permit_cost - cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost)', 'permit_cost' => '-fresh_ingredients_cost + fresh_total_cost - indirect_cost - cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost)', 'indirect_cost' => '-fresh_ingredients_cost + fresh_total_cost - permit_cost - cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost)'],
        ],
        [
            'title' => 'fresh_lemon_juice_qty_needed = desired_servings * serving_size / 4',
            'results' => ['desired_servings' => '4*fresh_lemon_juice_qty_needed/serving_size', 'fresh_lemon_juice_qty_needed' => '(1/4)*desired_servings*serving_size', 'serving_size' => '4*fresh_lemon_juice_qty_needed/desired_servings'],
        ],
        [
            'title' => 'fresh_sugar_qty_needed = desired_servings * serving_size * 2',
            'results' => ['desired_servings' => '(1/2)*fresh_sugar_qty_needed/serving_size', 'fresh_sugar_qty_needed' => '2*desired_servings*serving_size', 'serving_size' => '(1/2)*fresh_sugar_qty_needed/desired_servings'],
        ],
        [
            'title' => 'fresh_water_qty_needed = desired_servings * serving_size',
            'results' => ['desired_servings' => 'fresh_water_qty_needed/serving_size', 'fresh_water_qty_needed' => 'desired_servings*serving_size', 'serving_size' => 'fresh_water_qty_needed/desired_servings'],
        ],
        [
            'title' => 'concentrate_qty_needed = desired_servings * serving_size / 8',
            'results' => ['desired_servings' => '8*concentrate_qty_needed/serving_size', 'concentrate_qty_needed' => '(1/8)*desired_servings*serving_size', 'serving_size' => '8*concentrate_qty_needed/desired_servings'],
        ],
        [
            'title' => 'conc_sugar_qty_needed = desired_servings * serving_size / 8',
            'results' => ['desired_servings' => '8*conc_sugar_qty_needed/serving_size', 'conc_sugar_qty_needed' => '(1/8)*desired_servings*serving_size', 'serving_size' => '8*conc_sugar_qty_needed/desired_servings'],
        ],
        [
            'title' => 'conc_water_qty_needed = desired_servings * serving_size * 13 / 16',
            'results' => ['serving_size' => '(16/13)*conc_water_qty_needed/desired_servings', 'desired_servings' => '(16/13)*conc_water_qty_needed/serving_size', 'conc_water_qty_needed' => '(13/16)*desired_servings*serving_size'],
        ],
        [
            'title' => 'fresh_ingredients_cost = fresh_lemon_juice_qty_needed * lemon_price + fresh_sugar_qty_needed * sugar_price + fresh_water_qty_needed * water_price',
            'results' => [
                'fresh_lemon_juice_qty_needed' => '(fresh_ingredients_cost - fresh_sugar_qty_needed*sugar_price - fresh_water_qty_needed*water_price)/lemon_price',
                'fresh_water_qty_needed' => '(fresh_ingredients_cost - fresh_lemon_juice_qty_needed*lemon_price - fresh_sugar_qty_needed*sugar_price)/water_price',
                'fresh_ingredients_cost' => 'fresh_lemon_juice_qty_needed*lemon_price + fresh_sugar_qty_needed*sugar_price + fresh_water_qty_needed*water_price',
                'water_price' => '(fresh_ingredients_cost - fresh_lemon_juice_qty_needed*lemon_price - fresh_sugar_qty_needed*sugar_price)/fresh_water_qty_needed',
                'sugar_price' => '(fresh_ingredients_cost - fresh_lemon_juice_qty_needed*lemon_price - fresh_water_qty_needed*water_price)/fresh_sugar_qty_needed',
                'lemon_price' => '(fresh_ingredients_cost - fresh_sugar_qty_needed*sugar_price - fresh_water_qty_needed*water_price)/fresh_lemon_juice_qty_needed',
                'fresh_sugar_qty_needed' => '(fresh_ingredients_cost - fresh_lemon_juice_qty_needed*lemon_price - fresh_water_qty_needed*water_price)/sugar_price',
            ],
        ],
        [
            'title' => 'conc_ingredients_cost = concentrate_qty_needed * concentrate_price + conc_sugar_qty_needed * sugar_price + conc_water_qty_needed * water_price',
            'results' => [
                'conc_sugar_qty_needed' => '(conc_ingredients_cost - conc_water_qty_needed*water_price - concentrate_price*concentrate_qty_needed)/sugar_price',
                'conc_water_qty_needed' => '(conc_ingredients_cost - conc_sugar_qty_needed*sugar_price - concentrate_price*concentrate_qty_needed)/water_price',
                'conc_ingredients_cost' => 'conc_sugar_qty_needed*sugar_price + conc_water_qty_needed*water_price + concentrate_price*concentrate_qty_needed',
                'sugar_price' => '(conc_ingredients_cost - conc_water_qty_needed*water_price - concentrate_price*concentrate_qty_needed)/conc_sugar_qty_needed',
                'water_price' => '(conc_ingredients_cost - conc_sugar_qty_needed*sugar_price - concentrate_price*concentrate_qty_needed)/conc_water_qty_needed',
                'concentrate_price' => '(conc_ingredients_cost - conc_sugar_qty_needed*sugar_price - conc_water_qty_needed*water_price)/concentrate_qty_needed',
                'concentrate_qty_needed' => '(conc_ingredients_cost - conc_sugar_qty_needed*sugar_price - conc_water_qty_needed*water_price)/concentrate_price',
            ],
        ],
        [
            'title' => 'mix_ingredients_cost = mix_qty_needed * mix_price + mix_water_qty_needed * water_price',
            'results' => [
                'mix_ingredients_cost' => 'mix_price*mix_qty_needed + mix_water_qty_needed*water_price',
                'mix_price' => '(mix_ingredients_cost - mix_water_qty_needed*water_price)/mix_qty_needed',
                'water_price' => '(mix_ingredients_cost - mix_price*mix_qty_needed)/mix_water_qty_needed',
                'mix_water_qty_needed' => '(mix_ingredients_cost - mix_price*mix_qty_needed)/water_price',
                'mix_qty_needed' => '(mix_ingredients_cost - mix_water_qty_needed*water_price)/mix_price',
            ],
        ],
        [
            'title' => 'mix_ingredients_cost_2 = mix_qty_needed_2 * mix_price + mix_water_qty_needed_2 * water_price',
            'results' => [
                'mix_ingredients_cost_2' => 'mix_price*mix_qty_needed_2 + mix_water_qty_needed_2*water_price',
                'mix_qty_needed_2' => '(mix_ingredients_cost_2 - mix_water_qty_needed_2*water_price)/mix_price',
                'mix_water_qty_needed_2' => '(mix_ingredients_cost_2 - mix_price*mix_qty_needed_2)/water_price',
                'mix_price' => '(mix_ingredients_cost_2 - mix_water_qty_needed_2*water_price)/mix_qty_needed_2',
                'water_price' => '(mix_ingredients_cost_2 - mix_price*mix_qty_needed_2)/mix_water_qty_needed_2',
            ],
        ],
        [
            'title' => 'conc_total_cost = conc_ingredients_cost + indirect_cost + permit_cost + cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost)',
            'results' => ['conc_total_cost' => 'conc_ingredients_cost + indirect_cost + permit_cost + cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost)', 'conc_ingredients_cost' => 'conc_total_cost - indirect_cost - permit_cost - cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost)', 'permit_cost' => '-conc_ingredients_cost + conc_total_cost - indirect_cost - cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost)', 'indirect_cost' => '-conc_ingredients_cost + conc_total_cost - permit_cost - cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost)'],
        ],
        [
            'title' => 'mix_total_cost = mix_ingredients_cost + indirect_cost + permit_cost + cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost)',
            'results' => ['mix_ingredients_cost' => '-indirect_cost + mix_total_cost - permit_cost - cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost)', 'permit_cost' => '-indirect_cost - mix_ingredients_cost + mix_total_cost - cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost)', 'mix_total_cost' => 'indirect_cost + mix_ingredients_cost + permit_cost + cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost)', 'indirect_cost' => '-mix_ingredients_cost + mix_total_cost - permit_cost - cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost)'],
        ],
        [
            'title' => 'mix_total_cost_2 = mix_ingredients_cost_2 + indirect_cost + permit_cost + cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost)',
            'results' => ['mix_ingredients_cost_2' => '-indirect_cost + mix_total_cost_2 - permit_cost - cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost)', 'mix_total_cost_2' => 'indirect_cost + mix_ingredients_cost_2 + permit_cost + cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost)', 'permit_cost' => '-indirect_cost - mix_ingredients_cost_2 + mix_total_cost_2 - cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost)', 'indirect_cost' => '-mix_ingredients_cost_2 + mix_total_cost_2 - permit_cost - cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost)'],
        ],
        [
            'title' => 'receipt_total_cost = receipt_cost + indirect_cost + permit_cost + cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost)',
            'results' => ['receipt_total_cost' => 'indirect_cost + permit_cost + receipt_cost + cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost)', 'receipt_cost' => '-indirect_cost - permit_cost + receipt_total_cost - cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost)', 'permit_cost' => '-indirect_cost - receipt_cost + receipt_total_cost - cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost)', 'indirect_cost' => '-permit_cost - receipt_cost + receipt_total_cost - cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost)'],
        ],
        [
            'title' => 'receipt_total_cost_copy = copy(receipt_total_cost)',
            'results' => ['receipt_total_cost_copy' => 'copy(receipt_total_cost)'],
        ],
        [
            'title' => 'fresh_total_cost_copy = copy(fresh_total_cost)',
            'results' => ['fresh_total_cost_copy' => 'copy(fresh_total_cost)'],
        ],
        [
            'title' => 'mix_total_cost_copy = copy(mix_total_cost)',
            'results' => ['mix_total_cost_copy' => 'copy(mix_total_cost)'],
        ],
        [
            'title' => 'mix_total_cost_2_copy = copy(mix_total_cost_2)',
            'results' => ['mix_total_cost_2_copy' => 'copy(mix_total_cost_2)'],
        ],
        [
            'title' => 'conc_total_cost_copy = copy(conc_total_cost)',
            'results' => ['conc_total_cost_copy' => 'copy(conc_total_cost)'],
        ],
        [
            'title' => <<<'TXT'
            receipt_profit = (selling_price_per_serving * desired_servings) - (receipt_cost + indirect_cost + permit_cost) - cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost)
            TXT,
            'results' => [
                'receipt_cost' => <<<'TXT'
                desired_servings*selling_price_per_serving - indirect_cost - permit_cost - receipt_profit - cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost)
                TXT,
                'selling_price_per_serving' => '(indirect_cost + permit_cost + receipt_cost + receipt_profit + cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost))/desired_servings',
                'receipt_profit' => <<<'TXT'
                desired_servings*selling_price_per_serving - indirect_cost - permit_cost - receipt_cost - cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost)
                TXT,
                'permit_cost' => <<<'TXT'
                desired_servings*selling_price_per_serving - indirect_cost - receipt_cost - receipt_profit - cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost)
                TXT,
                'indirect_cost' => <<<'TXT'
                desired_servings*selling_price_per_serving - permit_cost - receipt_cost - receipt_profit - cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost)
                TXT,
            ],
        ],
        [
            'title' => <<<'TXT'
            fresh_profit = selling_price_per_serving * desired_servings - (fresh_ingredients_cost + indirect_cost + permit_cost) - cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost)
            TXT,
            'results' => [
                'fresh_profit' => <<<'TXT'
                desired_servings*selling_price_per_serving - fresh_ingredients_cost - indirect_cost - permit_cost - cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost)
                TXT,
                'selling_price_per_serving' => <<<'TXT'
                (fresh_ingredients_cost + fresh_profit + indirect_cost + permit_cost + cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost))/desired_servings
                TXT,
                'fresh_ingredients_cost' => <<<'TXT'
                desired_servings*selling_price_per_serving - fresh_profit - indirect_cost - permit_cost - cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost)
                TXT,
                'permit_cost' => <<<'TXT'
                desired_servings*selling_price_per_serving - fresh_ingredients_cost - fresh_profit - indirect_cost - cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost)
                TXT,
                'indirect_cost' => <<<'TXT'
                desired_servings*selling_price_per_serving - fresh_ingredients_cost - fresh_profit - permit_cost - cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost)
                TXT,
            ],
        ],
        [
            'title' => <<<'TXT'
            conc_profit = selling_price_per_serving * desired_servings - (conc_ingredients_cost + indirect_cost + permit_cost) - cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost)
            TXT,
            'results' => [
                'selling_price_per_serving' => <<<'TXT'
                (conc_ingredients_cost + conc_profit + indirect_cost + permit_cost + cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost))/desired_servings
                TXT,
                'conc_ingredients_cost' => <<<'TXT'
                -conc_profit + desired_servings*selling_price_per_serving - indirect_cost - permit_cost - cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost)
                TXT,
                'permit_cost' => <<<'TXT'
                -conc_ingredients_cost - conc_profit + desired_servings*selling_price_per_serving - indirect_cost - cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost)
                TXT,
                'indirect_cost' => <<<'TXT'
                -conc_ingredients_cost - conc_profit + desired_servings*selling_price_per_serving - permit_cost - cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost)
                TXT,
                'conc_profit' => <<<'TXT'
                -conc_ingredients_cost + desired_servings*selling_price_per_serving - indirect_cost - permit_cost - cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost)
                TXT,
            ],
        ],
        [
            'title' => <<<'TXT'
            mix_profit = selling_price_per_serving * desired_servings - (mix_ingredients_cost + indirect_cost + permit_cost) - cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost)
            TXT,
            'results' => [
                'mix_ingredients_cost' => <<<'TXT'
                desired_servings*selling_price_per_serving - indirect_cost - mix_profit - permit_cost - cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost)
                TXT,
                'selling_price_per_serving' => <<<'TXT'
                (indirect_cost + mix_ingredients_cost + mix_profit + permit_cost + cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost))/desired_servings
                TXT,
                'mix_profit' => <<<'TXT'
                desired_servings*selling_price_per_serving - indirect_cost - mix_ingredients_cost - permit_cost - cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost)
                TXT,
                'permit_cost' => <<<'TXT'
                desired_servings*selling_price_per_serving - indirect_cost - mix_ingredients_cost - mix_profit - cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost)
                TXT,
                'indirect_cost' => <<<'TXT'
                desired_servings*selling_price_per_serving - mix_ingredients_cost - mix_profit - permit_cost - cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost)
                TXT,
            ],
        ],
        [
            'title' => <<<'TXT'
            mix_profit_2 = selling_price_per_serving * desired_servings - (mix_ingredients_cost_2 + indirect_cost + permit_cost) - cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost)
            TXT,
            'results' => [
                'mix_ingredients_cost_2' => <<<'TXT'
                desired_servings*selling_price_per_serving - indirect_cost - mix_profit_2 - permit_cost - cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost)
                TXT,
                'selling_price_per_serving' => <<<'TXT'
                (indirect_cost + mix_ingredients_cost_2 + mix_profit_2 + permit_cost + cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost))/desired_servings
                TXT,
                'permit_cost' => <<<'TXT'
                desired_servings*selling_price_per_serving - indirect_cost - mix_ingredients_cost_2 - mix_profit_2 - cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost)
                TXT,
                'indirect_cost' => <<<'TXT'
                desired_servings*selling_price_per_serving - mix_ingredients_cost_2 - mix_profit_2 - permit_cost - cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost)
                TXT,
                'mix_profit_2' => <<<'TXT'
                desired_servings*selling_price_per_serving - indirect_cost - mix_ingredients_cost_2 - permit_cost - cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost)
                TXT,
            ],
        ],
        [
            'title' => 'cups_cost = cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost)',
            'results' => ['cups_cost' => 'cost_of_cups(desired_servings, serving_size, change_cup_cost, user_cup_cost)'],
        ],
        [
            'title' => 'target_profit_goal = copy(target_profit)',
            'results' => ['target_profit_goal' => 'copy(target_profit)'],
        ],
        [
            'title' => 'receipt_profit_copy = copy(receipt_profit)',
            'results' => ['receipt_profit_copy' => 'copy(receipt_profit)'],
        ],
        [
            'title' => 'fresh_profit_copy = copy(fresh_profit)',
            'results' => ['fresh_profit_copy' => 'copy(fresh_profit)'],
        ],
        [
            'title' => 'conc_profit_copy = copy(conc_profit)',
            'results' => ['conc_profit_copy' => 'copy(conc_profit)'],
        ],
        [
            'title' => 'mix_profit_copy = copy(mix_profit)',
            'results' => ['mix_profit_copy' => 'copy(mix_profit)'],
        ],
        [
            'title' => 'mix_profit_2_copy = copy(mix_profit_2)',
            'results' => ['mix_profit_2_copy' => 'copy(mix_profit_2)'],
        ],
        [
            'title' => 'fresh_ingredients_cost_copy = copy(fresh_ingredients_cost)',
            'results' => ['fresh_ingredients_cost_copy' => 'copy(fresh_ingredients_cost)'],
        ],
        [
            'title' => 'conc_ingredients_cost_copy = copy(conc_ingredients_cost)',
            'results' => ['conc_ingredients_cost_copy' => 'copy(conc_ingredients_cost)'],
        ],
        [
            'title' => 'mix_ingredients_cost_copy = copy(mix_ingredients_cost)',
            'results' => ['mix_ingredients_cost_copy' => 'copy(mix_ingredients_cost)'],
        ],
        [
            'title' => 'mix_ingredients_cost_copy_2 = copy(mix_ingredients_cost_2)',
            'results' => ['mix_ingredients_cost_copy_2' => 'copy(mix_ingredients_cost_2)'],
        ],
        [
            'title' => 'indirect_cost_copy = copy(indirect_cost)',
            'results' => ['indirect_cost_copy' => 'copy(indirect_cost)'],
        ],
        [
            'title' => 'mix_qty_needed = desired_servings * serving_size / 2',
            'results' => ['desired_servings' => '2*mix_qty_needed/serving_size', 'mix_qty_needed' => '(1/2)*desired_servings*serving_size', 'serving_size' => '2*mix_qty_needed/desired_servings'],
        ],
        [
            'title' => 'mix_water_qty_needed = desired_servings * serving_size',
            'results' => ['desired_servings' => 'mix_water_qty_needed/serving_size', 'mix_water_qty_needed' => 'desired_servings*serving_size', 'serving_size' => 'mix_water_qty_needed/desired_servings'],
        ],
        [
            'title' => 'receipt_cost_per_serving = copy(receipt_total_cost / desired_servings)',
            'results' => ['receipt_cost_per_serving' => 'copy(receipt_total_cost/desired_servings)'],
        ],
        [
            'title' => 'fresh_cost_per_serving = copy(fresh_total_cost / desired_servings)',
            'results' => ['fresh_cost_per_serving' => 'copy(fresh_total_cost/desired_servings)'],
        ],
        [
            'title' => 'conc_cost_per_serving = copy(conc_total_cost / desired_servings)',
            'results' => ['conc_cost_per_serving' => 'copy(conc_total_cost/desired_servings)'],
        ],
        [
            'title' => 'mix_cost_per_serving = copy(mix_total_cost / desired_servings)',
            'results' => ['mix_cost_per_serving' => 'copy(mix_total_cost/desired_servings)'],
        ],
        [
            'title' => 'mix_cost_per_serving_2 = copy(mix_total_cost_2 / desired_servings)',
            'results' => ['mix_cost_per_serving_2' => 'copy(mix_total_cost_2/desired_servings)'],
        ],
        [
            'title' => <<<'TXT'
            profit = get_profit(cost_type, lemonade_type, mix_choice, receipt_profit, receipt_total_cost, fresh_profit, fresh_total_cost, conc_profit, conc_total_cost, mix_profit, mix_total_cost, mix_profit_2, mix_total_cost_2)
            TXT,
            'results' => ['profit' => <<<'TXT'
            get_profit(cost_type, lemonade_type, mix_choice, receipt_profit, receipt_total_cost, fresh_profit, fresh_total_cost, conc_profit, conc_total_cost, mix_profit, mix_total_cost, mix_profit_2, mix_total_cost_2)
            TXT],
        ],
        [
            'title' => 'op_profit = one_way(-profit)',
            'results' => ['op_profit' => <<<'TXT'
            (-get_profit(cost_type, lemonade_type, mix_choice, receipt_profit, receipt_total_cost, fresh_profit, fresh_total_cost, conc_profit, conc_total_cost, mix_profit, mix_total_cost, mix_profit_2, mix_total_cost_2))
            TXT],
        ],
        [
            'title' => <<<'TXT'
            profit_percent = get_profit_percent(cost_type, lemonade_type, mix_choice, receipt_profit, receipt_total_cost, fresh_profit, fresh_total_cost, conc_profit, conc_total_cost, mix_profit, mix_total_cost, mix_profit_2, mix_total_cost_2)
            TXT,
            'results' => ['profit_percent' => <<<'TXT'
            get_profit_percent(cost_type, lemonade_type, mix_choice, receipt_profit, receipt_total_cost, fresh_profit, fresh_total_cost, conc_profit, conc_total_cost, mix_profit, mix_total_cost, mix_profit_2, mix_total_cost_2)
            TXT],
        ],
        [
            'title' => 'dif_profit_percent = one_way(1 - (-profit_percent))',
            'results' => ['dif_profit_percent' => <<<'TXT'
            (get_profit_percent(cost_type, lemonade_type, mix_choice, receipt_profit, receipt_total_cost, fresh_profit, fresh_total_cost, conc_profit, conc_total_cost, mix_profit, mix_total_cost, mix_profit_2, mix_total_cost_2) + 1)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            price_level = get_price_level(cost_type, lemonade_type, serving_size, selling_price_per_serving, minprice_mix_small2, maxprice_mix_small2, minprice_mix_large2, maxprice_mix_large2, minprice_fresh_small2, maxprice_fresh_small2, minprice_fresh_large2, maxprice_fresh_large2)
            TXT,
            'results' => ['price_level' => 'get_price_level(cost_type, lemonade_type, serving_size, selling_price_per_serving, ((1/2)), ((1)), ((1)), ((3/2)), ((1)), ((3/2)), ((1)), ((2)))'],
        ],
        [
            'title' => <<<'TXT'
            cup_price_diff = get_cup_price_diff(cost_type, lemonade_type, serving_size, selling_price_per_serving, minprice_mix_small2, maxprice_mix_small2, minprice_mix_large2, maxprice_mix_large2, minprice_fresh_small2, maxprice_fresh_small2, minprice_fresh_large2, maxprice_fresh_large2)
            TXT,
            'results' => ['cup_price_diff' => 'get_cup_price_diff(cost_type, lemonade_type, serving_size, selling_price_per_serving, ((1/2)), ((1)), ((1)), ((3/2)), ((1)), ((3/2)), ((1)), ((2)))'],
        ],
        [
            'title' => 'fresh_lemonjuice_qty_needed_cups = one_way(desired_servings * serving_size * fresh_lemonjuice_qty / fresh_servings_in_batch)',
            'results' => ['fresh_lemonjuice_qty_needed_cups' => '(desired_servings*serving_size*((1))/((4)))'],
        ],
        [
            'title' => 'fresh_lemonjuice_qty_needed_l = one_way(desired_servings * serving_size * fresh_lemonjuice_qty * 0.24  / fresh_servings_in_batch)',
            'results' => ['fresh_lemonjuice_qty_needed_l' => '((6/25)*desired_servings*serving_size*((1))/((4)))'],
        ],
        [
            'title' => 'fresh_sugar_qty_needed_cups = one_way(desired_servings * serving_size * fresh_sugar_qty / fresh_servings_in_batch)',
            'results' => ['fresh_sugar_qty_needed_cups' => '(desired_servings*serving_size*((1))/((4)))'],
        ],
        [
            'title' => 'fresh_sugar_qty_needed_kg = one_way(desired_servings * serving_size * fresh_sugar_qty * 0.200 / fresh_servings_in_batch)',
            'results' => ['fresh_sugar_qty_needed_kg' => '((1/5)*desired_servings*serving_size*((1))/((4)))'],
        ],
        [
            'title' => 'fresh_water_qty_needed_cups = one_way(desired_servings * serving_size * fresh_water_qty / fresh_servings_in_batch)',
            'results' => ['fresh_water_qty_needed_cups' => '(desired_servings*serving_size)'],
        ],
        [
            'title' => 'fresh_water_qty_needed_l = one_way(desired_servings * serving_size * fresh_water_qty * 0.250 / fresh_servings_in_batch)',
            'results' => ['fresh_water_qty_needed_l' => '((1/4)*desired_servings*serving_size)'],
        ],
        [
            'title' => 'concentrate_qty_needed_cups = one_way(desired_servings * serving_size * concentrate_qty / conc_servings_in_batch)',
            'results' => ['concentrate_qty_needed_cups' => '(desired_servings*serving_size*((2))/((16)))'],
        ],
        [
            'title' => 'concentrate_qty_needed_l = one_way(desired_servings * serving_size * concentrate_qty * 0.240 / conc_servings_in_batch)',
            'results' => ['concentrate_qty_needed_l' => '((6/25)*desired_servings*serving_size*((2))/((16)))'],
        ],
        [
            'title' => 'conc_sugar_qty_needed_cups = one_way(desired_servings * serving_size * conc_sugar_qty / conc_servings_in_batch)',
            'results' => ['conc_sugar_qty_needed_cups' => '(desired_servings*serving_size*((2))/((16)))'],
        ],
        [
            'title' => 'conc_sugar_qty_needed_kg = one_way(desired_servings * serving_size * conc_sugar_qty * 0.200 / conc_servings_in_batch)',
            'results' => ['conc_sugar_qty_needed_kg' => '((1/5)*desired_servings*serving_size*((2))/((16)))'],
        ],
        [
            'title' => 'conc_water_qty_needed_cups = one_way(desired_servings * serving_size * conc_water_qty / conc_servings_in_batch)',
            'results' => ['conc_water_qty_needed_cups' => '(desired_servings*serving_size*((13))/((16)))'],
        ],
        [
            'title' => 'conc_water_qty_needed_l = one_way(desired_servings * serving_size * conc_water_qty * 0.250 / conc_servings_in_batch)',
            'results' => ['conc_water_qty_needed_l' => '((1/4)*desired_servings*serving_size*((13))/((16)))'],
        ],
        [
            'title' => 'mix_qty_needed_oz = one_way(desired_servings * serving_size * mix_qty / mix_servings_in_batch)',
            'results' => ['mix_qty_needed_oz' => '(desired_servings*serving_size*((1))/((2)))'],
        ],
        [
            'title' => 'mix_qty_needed_g = one_way(desired_servings * serving_size * mix_qty * 28.35 / mix_servings_in_batch)',
            'results' => ['mix_qty_needed_g' => '((567/20)*desired_servings*serving_size*((1))/((2)))'],
        ],
        [
            'title' => 'mix_water_qty_needed_cups = one_way(desired_servings * serving_size * mix_water_qty / mix_servings_in_batch)',
            'results' => ['mix_water_qty_needed_cups' => '(desired_servings*serving_size)'],
        ],
        [
            'title' => 'mix_water_qty_needed_l = one_way(desired_servings * serving_size * mix_water_qty * 0.250 / mix_servings_in_batch)',
            'results' => ['mix_water_qty_needed_l' => '((1/4)*desired_servings*serving_size)'],
        ],
        [
            'title' => 'mix_qty_needed_oz_2 = one_way(mix_qty_needed_2)',
            'results' => ['mix_qty_needed_oz_2' => '(mix_qty_needed_2)'],
        ],
        [
            'title' => 'mix_qty_needed_g_2 = one_way(mix_qty_needed_oz_2 * 28.35)',
            'results' => ['mix_qty_needed_g_2' => '((567/20)*(mix_qty_needed_2))'],
        ],
        [
            'title' => 'mix_water_qty_needed_cups_2 = one_way(mix_water_qty_needed_2)',
            'results' => ['mix_water_qty_needed_cups_2' => '(mix_water_qty_needed_2)'],
        ],
        [
            'title' => 'mix_water_qty_needed_l_2 = one_way(mix_water_qty_needed_cups_2 * 0.25)',
            'results' => ['mix_water_qty_needed_l_2' => '((1/4)*(mix_water_qty_needed_2))'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";function profit_pro_percent(cost_type,lemonade_type,mix_choice,receipt_profit,receipt_total_cost,fresh_profit,fresh_total_cost,conc_profit,conc_total_cost,mix_profit,mix_total_cost,mix_profit_2,mix_total_cost_2){var profit,profit_percent;if(cost_type===1){profit=parseFloat(receipt_profit).toFixed(2);profit_percent=mathjs.round(receipt_profit*100/receipt_total_cost)/100}else if(lemonade_type===1){profit=parseFloat(fresh_profit).toFixed(2);profit_percent=mathjs.round(fresh_profit*100/fresh_total_cost)/100}else if(lemonade_type===2){profit=parseFloat(conc_profit).toFixed(2);profit_percent=mathjs.round(conc_profit*100/conc_total_cost)/100}else if(mix_choice===0){profit=parseFloat(mix_profit).toFixed(2);profit_percent=mathjs.round(mix_profit*100/mix_total_cost)/100}else{profit=parseFloat(mix_profit_2).toFixed(2);profit_percent=mathjs.round(mix_profit_2*100/mix_total_cost_2)/100}return[profit,profit_percent]}omni.define("get_profit",function(cost_type,lemonade_type,mix_choice,receipt_profit,receipt_total_cost,fresh_profit,fresh_total_cost,conc_profit,conc_total_cost,mix_profit,mix_total_cost,mix_profit_2,mix_total_cost_2){return profit_pro_percent(cost_type,lemonade_type,mix_choice,receipt_profit,receipt_total_cost,fresh_profit,fresh_total_cost,conc_profit,conc_total_cost,mix_profit,mix_total_cost,mix_profit_2,mix_total_cost_2)[0]});omni.define("get_profit_percent",function(cost_type,lemonade_type,mix_choice,receipt_profit,receipt_total_cost,fresh_profit,fresh_total_cost,conc_profit,conc_total_cost,mix_profit,mix_total_cost,mix_profit_2,mix_total_cost_2){return profit_pro_percent(cost_type,lemonade_type,mix_choice,receipt_profit,receipt_total_cost,fresh_profit,fresh_total_cost,conc_profit,conc_total_cost,mix_profit,mix_total_cost,mix_profit_2,mix_total_cost_2)[1]});function cup_price_diff_level(cost_type,lemonade_type,serving_size,selling_price_per_serving,minprice_mix_small,maxprice_mix_small,minprice_mix_large,maxprice_mix_large,minprice_fresh_small,maxprice_fresh_small,minprice_fresh_large,maxprice_fresh_large){var cup_price_diff=0;var price_level=0;if(cost_type===0&&lemonade_type===3){if(serving_size<=1.5){if(selling_price_per_serving<minprice_mix_small){price_level=-1;cup_price_diff=mathjs.round(minprice_mix_small-selling_price_per_serving,2)}else if(selling_price_per_serving>maxprice_mix_small){price_level=1;cup_price_diff=mathjs.round(selling_price_per_serving-maxprice_mix_small,2)}else{price_level=0;cup_price_diff=0}}else{if(selling_price_per_serving<minprice_mix_large){price_level=-1;cup_price_diff=mathjs.round(minprice_mix_large-selling_price_per_serving,2)}else if(selling_price_per_serving>maxprice_mix_large){price_level=1;cup_price_diff=mathjs.round(selling_price_per_serving-maxprice_mix_large,2)}else{price_level=0;cup_price_diff=0}}}else{if(serving_size<=1.5){if(selling_price_per_serving<minprice_fresh_small){price_level=-1;cup_price_diff=mathjs.round(minprice_fresh_small-selling_price_per_serving,2)}else if(selling_price_per_serving>maxprice_fresh_small){price_level=1;cup_price_diff=mathjs.round(selling_price_per_serving-maxprice_fresh_small,2)}else{price_level=0;cup_price_diff=0}}else{if(selling_price_per_serving<minprice_fresh_large){price_level=-1;cup_price_diff=mathjs.round(minprice_fresh_large-selling_price_per_serving,2)}else if(selling_price_per_serving>maxprice_fresh_large){price_level=1;cup_price_diff=mathjs.round(selling_price_per_serving-maxprice_fresh_large,2)}else{price_level=0;cup_price_diff=0}}}return[price_level,cup_price_diff]}omni.define("get_cup_price_diff",function(cost_type,lemonade_type,serving_size,selling_price_per_serving,minprice_mix_small,maxprice_mix_small,minprice_mix_large,maxprice_mix_large,minprice_fresh_small,maxprice_fresh_small,minprice_fresh_large,maxprice_fresh_large){var cup_price_diff=cup_price_diff_level(cost_type,lemonade_type,serving_size,selling_price_per_serving,minprice_mix_small,maxprice_mix_small,minprice_mix_large,maxprice_mix_large,minprice_fresh_small,maxprice_fresh_small,minprice_fresh_large,maxprice_fresh_large)[1];return cup_price_diff});omni.define("get_price_level",function(cost_type,lemonade_type,serving_size,selling_price_per_serving,minprice_mix_small,maxprice_mix_small,minprice_mix_large,maxprice_mix_large,minprice_fresh_small,maxprice_fresh_small,minprice_fresh_large,maxprice_fresh_large){var price_level=cup_price_diff_level(cost_type,lemonade_type,serving_size,selling_price_per_serving,minprice_mix_small,maxprice_mix_small,minprice_mix_large,maxprice_mix_large,minprice_fresh_small,maxprice_fresh_small,minprice_fresh_large,maxprice_fresh_large)[0];return price_level});omni.define("copy",function(value_to_copy){return mathjs.round(mathjs.bignumber(value_to_copy),2)});omni.define("cost_of_cups",function(desired_servings,serving_size,change_cup_cost,user_cup_cost){var cup_cost=user_cup_cost!==undefined?user_cup_cost:0;if(change_cup_cost===1){return mathjs.round(mathjs.bignumber(cup_cost),2)}else{var size_8oz_cost=15/100;var size_12oz_cost=16/100;var size_16oz_cost=18/100;var size_20oz_cost=20/100;var cost;if(serving_size===1){cost=desired_servings*size_8oz_cost}else if(serving_size===1.5){cost=desired_servings*size_12oz_cost}else if(serving_size===2){cost=desired_servings*size_16oz_cost}else{cost=desired_servings*size_20oz_cost}return mathjs.round(mathjs.bignumber(cost),2)}});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Lemonade stand works out I want to sell and Size of serving cup from Stand cost, Refrigeration cost and Lighting cost. It is a single relationship that reads i want to sell out of stand cost, not a table of canned results keyed by them. Units for I want to sell default to servings and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Lemonade stand calculator works', 'html' => <<<'TXT'
            <p>The Lemonade stand calculator applies one relationship to 3 numbers and reports I want to sell, Size of serving cup and Total cost of cups.</p><p>In the form&#039;s own words, Total Indirect Cost = Lighting cost + Refrigeration cost + Stand cost.</p><p>The answers are I want to sell, Size of serving cup, Total cost of cups and Permit cost; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Stand cost</strong> — in USD</li><li><strong>Refrigeration cost</strong> — in USD</li><li><strong>Lighting cost</strong> — in USD</li></ul><p>What you get back is I want to sell in servings, Size of serving cup, Total cost of cups in USD, Permit cost in USD, Cost of ingredients in USD, Total cost in USD, Total cost of ingredients in USD, Total cost of ingredients in USD, Total cost of ingredients in USD, Total cost in USD, Total cost in USD, Amount of mix needed in ounces, Amount of water needed in US customary cups, Total cost of ingredients in USD, Total cost in USD, Total cost in USD, Price of lemons in USD, Price of sugar in USD, Price of water in USD, Price of lemon concentrate in USD, Price of lemonade mix in USD, Total indirect cost in USD, Cost per serving in USD, Cost per serving in USD, Cost per serving in USD, Cost per serving in USD, Cost per serving in USD, Your target goal is in USD, I want to sell each serving for in USD, Total profit in USD, Total profit in USD, Total profit in USD, Total profit in USD, Total profit in USD, Total cost, Fresh lemon juice qty needed, Fresh sugar qty needed, Fresh water qty needed, Total ingredients cost, Total cost, Concentrate qty needed, Conc sugar qty needed, Conc water qty needed, Total ingredients cost, Total cost, Amount of mix needed, Amount of water needed, Total ingredients cost, Mix ingredients cost 2, Total cost, Mix total cost 2, Total Indirect Cost, Total profit, Total profit, Total profit, Total profit, Mix profit 2, Profit, Op profit, Profit percent, Dif profit percent, Price level, Cup price diff, Fresh lemonjuice qty needed cups, Fresh lemonjuice qty needed l, Fresh sugar qty needed cups, Fresh sugar qty needed kg, Fresh water qty needed cups, Fresh water qty needed l, Conc sugar qty needed cups, Conc sugar qty needed kg, Conc water qty needed cups, Conc water qty needed l, Concentrate qty needed cups, Concentrate qty needed l, Mix qty needed g, Mix qty needed oz, Mix water qty needed cups, Mix water qty needed l, Mix qty needed g 2, Mix qty needed oz 2, Mix water qty needed cups 2, Mix water qty needed l 2, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Do you have a target goal? = 0, Target goal = 3 USD, Would you like to modify the cost of cups? = 0, Total cost of cups = 4 USD, Does your state require a permit? = 0, Do you already know the total cost? = 1, Recipe type = 1 and Do you want to modify the ratio? = 0; the answers are <strong>Size of serving cup</strong> = 1 and <strong>Your target goal is</strong> = 3 USD.</p><ul><li><strong>Size of serving cup</strong> = 1</li><li><strong>Your target goal is</strong> = 3 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Total Indirect Cost</strong> = <code>Lighting cost + Refrigeration cost + Stand cost</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Size of serving cup</strong> = 1 and <strong>Your target goal is</strong> = 3. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Amount of mix needed lists 5 options and opens on ounces. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Total Indirect Cost</strong> = <code>Lighting cost + Refrigeration cost + Stand cost</code></li><li><strong>Stand cost</strong> = <code>Total Indirect Cost − Lighting cost − Refrigeration cost</code></li><li><strong>Refrigeration cost</strong> = <code>Total Indirect Cost − Lighting cost − Stand cost</code></li><li><strong>Lighting cost</strong> = <code>Total Indirect Cost − Refrigeration cost − Stand cost</code></li><li><strong>Total cost</strong> = <code>Total ingredients cost + Total Indirect Cost + Permit cost + cost_of_cups(I want to sell, Size of serving cup, Would you like to modify the cost of cups?, Total cost of cups)</code></li><li><strong>Total ingredients cost</strong> = <code>Total cost − Total Indirect Cost − Permit cost − cost_of_cups(I want to sell, Size of serving cup, Would you like to modify the cost of cups?, Total cost of cups)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Total Indirect Cost</strong> = <code>Lighting cost + Refrigeration cost + Stand cost</code> — the form to use when Lighting cost, Refrigeration cost and Stand cost are the values you have.</li><li><strong>Stand cost</strong> = <code>Total Indirect Cost − Lighting cost − Refrigeration cost</code> — the form to use when Total Indirect Cost, Lighting cost and Refrigeration cost are the values you have.</li><li><strong>Refrigeration cost</strong> = <code>Total Indirect Cost − Lighting cost − Stand cost</code> — the form to use when Total Indirect Cost, Lighting cost and Stand cost are the values you have.</li><li><strong>Lighting cost</strong> = <code>Total Indirect Cost − Refrigeration cost − Stand cost</code> — the form to use when Total Indirect Cost, Refrigeration cost and Stand cost are the values you have.</li><li><strong>Total cost</strong> = <code>Total ingredients cost + Total Indirect Cost + Permit cost + cost_of_cups(I want to sell, Size of serving cup, Would you like to modify the cost of cups?, Total cost of cups)</code> — the form to use when Total ingredients cost, Total Indirect Cost, Permit cost and I want to sell are the values you have.</li><li><strong>Total ingredients cost</strong> = <code>Total cost − Total Indirect Cost − Permit cost − cost_of_cups(I want to sell, Size of serving cup, Would you like to modify the cost of cups?, Total cost of cups)</code> — the form to use when Total cost, Total Indirect Cost, Permit cost and I want to sell are the values you have.</li><li><strong>Permit cost</strong> = <code>− Total ingredients cost + Total cost − Total Indirect Cost − cost_of_cups(I want to sell, Size of serving cup, Would you like to modify the cost of cups?, Total cost of cups)</code> — the form to use when Total ingredients cost, Total cost, Total Indirect Cost and I want to sell are the values you have.</li><li><strong>Total Indirect Cost</strong> = <code>− Total ingredients cost + Total cost − Permit cost − cost_of_cups(I want to sell, Size of serving cup, Would you like to modify the cost of cups?, Total cost of cups)</code> — the form to use when Total ingredients cost, Total cost, Permit cost and I want to sell are the values you have.</li></ul><p>Any one of Total Indirect Cost, Stand cost and Refrigeration cost can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> I want to sell, Size of serving cup and Total cost of cups are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Stand cost left as a guess.</strong> Anything typed into Stand cost is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Refrigeration cost left as a guess.</strong> Anything typed into Refrigeration cost is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Lighting cost left as a guess.</strong> Anything typed into Lighting cost is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Stand cost is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Lemonade stand form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Stand cost</strong> takes a plain number with no unit attached. It feeds Total Indirect Cost, Refrigeration cost and Lighting cost. Fill it from a measurement rather than a memory — Stand cost is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Refrigeration cost</strong> takes a plain number with no unit attached. It feeds Total Indirect Cost, Stand cost and Lighting cost. Fill it from a measurement rather than a memory — Refrigeration cost is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Lighting cost</strong> takes a plain number with no unit attached. It feeds Total Indirect Cost, Stand cost and Refrigeration cost. Fill it from a measurement rather than a memory — Lighting cost is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind I want to sell is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover ounces and US customary cups. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Stand cost, Refrigeration cost and Lighting cost is what you already know and I want to sell and Size of serving cup is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/gst-qst">GST/QST Calculator</a>, <a href="/finance/hedge-ratio">Hedge ratio Calculator</a> and <a href="/finance/heloc">HELOC Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Lemonade stand calculator work out?', 'a' => <<<'TXT'
            I want to sell, Size of serving cup, Total cost of cups and Permit cost, from Lighting cost, Refrigeration cost and Stand cost. The relationship is Total Indirect Cost = Lighting cost + Refrigeration cost + Stand cost.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Stand cost (USD), Refrigeration cost (USD), Lighting cost (USD). With stand cost, refrigeration cost and lighting cost in place, I want to sell can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Total Indirect Cost, Stand cost, Refrigeration cost and Lighting cost blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Size of serving cup = 1 and Your target goal is = 3 USD. The figures come from Stand cost as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of I want to sell is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Stand cost blank and the page solves for it, reporting I want to sell instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to I want to sell at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/gst-qst', 'name' => 'GST/QST Calculator'],
            ['path' => '/finance/hedge-ratio', 'name' => 'Hedge ratio Calculator'],
            ['path' => '/finance/heloc', 'name' => 'HELOC Calculator'],
        ],
        'authors' => [],
    ],
];
