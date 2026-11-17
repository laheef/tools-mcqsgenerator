<?php

/**
 * Perfect pancake
 * /food/perfect-pancake
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Perfect pancake',
    'meta' => ['title' => 'Perfect pancake Calculator: Free, With Steps', 'description' => 'Scale pancake ingredients from the selected style and number of people to feed. Check units and follow the recipe or package directions.', 'h1' => 'Perfect pancake Calculator', 'updated' => '2026-08-04'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pancake_name',
                            'label' => 'Select a pancake type',
                            'type' => 'select',
                            'options' => [
                                'Pancake - Britain' => '0',
                                'Drop Scone - Scotland' => '1',
                                'Crêpe - France' => '2',
                                'Palacsinta - Hungary' => '3',
                                'Poffertjes - Netherlands' => '4',
                                'Æbleskiver - Scandinavia' => '5',
                                'Pikelet - Australia/New Zeland' => '6',
                                'Naleśnik - Poland' => '7',
                                'Blini - Russia' => '8',
                                'Lempeng Kelapa - Malaysia' => '9',
                                'Griddle Cake - USA' => '10',
                                'Ploye - Canada' => '11',
                                'Injera - Ethiopia' => '12',
                                'Beghrir - Morocco' => '13',
                                'Funkaso - Nigeria' => '14',
                            ],
                            'dataset' => 'recipe_country',
                            'control' => 'DROPDOWN',
                            'default' => 'Pancake - Britain',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'servings_number',
                            'label' => 'I want to feed',
                            'type' => 'number',
                            'suffix' => 'people',
                            'rounding' => ['standard', '1'],
                            'default' => '4',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Batter ingredients',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_flour_mass',
                            'label' => 'Flour',
                            'type' => 'number',
                            'unit' => '74',
                            'unit_default' => 'cups',
                            'readonly' => true,
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_buckwheat_flour',
                            'label' => 'Buckwheat flour',
                            'type' => 'number',
                            'unit' => '74',
                            'unit_default' => 'cups',
                            'readonly' => true,
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_semolina_flour',
                            'label' => 'Semolina flour',
                            'type' => 'number',
                            'unit' => '74',
                            'unit_default' => 'cups',
                            'readonly' => true,
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_millet_flour',
                            'label' => 'Millet flour',
                            'type' => 'number',
                            'unit' => '74',
                            'unit_default' => 'cups',
                            'readonly' => true,
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_milk_volume',
                            'label' => 'Milk',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'cups',
                            'readonly' => true,
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_grated_coconut',
                            'label' => 'Grated coconut',
                            'type' => 'number',
                            'unit' => '119',
                            'unit_default' => 'cups',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_water_volume',
                            'label' => 'Water',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'cups',
                            'readonly' => true,
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_carbonated_water',
                            'label' => 'Carbonated water',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'cups',
                            'readonly' => true,
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_buttermilk',
                            'label' => 'Buttermilk',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'cups',
                            'readonly' => true,
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_egg_weight',
                            'label' => 'Eggs',
                            'type' => 'number',
                            'suffix' => 'eggs',
                            'help' => 'Assuming medium egg with weight of 50 g.',
                            'readonly' => true,
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_sugar',
                            'label' => 'Sugar',
                            'type' => 'number',
                            'unit' => '118',
                            'unit_default' => 'teesp',
                            'readonly' => true,
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_baking_powder',
                            'label' => 'Baking powder',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'teesp',
                            'readonly' => true,
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_baking_soda',
                            'label' => 'Baking soda',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'teesp',
                            'readonly' => true,
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_tartar_cream',
                            'label' => 'Cream of tartar',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'teesp',
                            'readonly' => true,
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_butter',
                            'label' => 'Butter',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'tbsp',
                            'readonly' => true,
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_oil',
                            'label' => 'Oil',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'tbsp',
                            'readonly' => true,
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_yeast',
                            'label' => 'Yeast',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'tbsp',
                            'readonly' => true,
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_honey',
                            'label' => 'Honey',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'teesp',
                            'readonly' => true,
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
                                ['when' => 'pancake_name == 0', 'text' => <<<'TXT'
                                Pancake from Britain — Comfortingly light and fluffy traditional English pancakes. To prepare {{servings_number.formattedValue}} servings (about {{pancake_per_serving.formattedValue}} pancakes each), follow 5 easy steps: Step 1. Whisk {{total_flour_mass.formattedValue}}&nbsp;{{total_flour_mass.unit}} of flour, {{total_egg_weight.formattedValue}}&nbsp;eggs, {{total_milk_volume.formattedValue}}&nbsp
                                TXT],
                                ['when' => 'pancake_name == 1', 'text' => <<<'TXT'
                                Drop Scones from Scotland — Scottish Drop Scones are thicker than American Pancakes and nothing like the American definition of scones. Savored best with butter, jam, or golden syrup (Maple Syrup). To prepare {{servings_number.formattedValue}} servings (about {{pancake_per_serving.formattedValue}} pancakes each), follow 5 easy steps: Step 1. Whisk {{total_egg_weight.formattedValue}}&nbsp;eggs, {{t
                                TXT],
                                ['when' => 'pancake_name == 2', 'text' => <<<'TXT'
                                Crêpe from France — Soft, buttery, versatile, and maddeningly delicious thin-style pancakes all the way from France. To prepare {{servings_number.formattedValue}} servings (about {{pancake_per_serving.formattedValue}} pancakes each), follow 5 easy steps: Step 1. Sift together {{total_flour_mass.formattedValue}}&nbsp;{{total_flour_mass.unit}} of flour, {{total_sugar.formattedValue}}&nbsp;{{total_su
                                TXT],
                                ['when' => 'pancake_name == 3', 'text' => <<<'TXT'
                                Palacsinta from Hungary — Palacsintas are thin, delicate crêpes that can be made with a variety of fillings, both sweet and savory. Served best with raspberry jam and cocoa fillings. To prepare {{servings_number.formattedValue}} servings (about {{pancake_per_serving.formattedValue}} pancakes each), follow 5 easy steps: Step 1. Mix {{total_egg_weight.formattedValue}}&nbsp;eggs, {{total_flour_mass.f
                                TXT],
                                ['when' => 'pancake_name == 4', 'text' => <<<'TXT'
                                Poffertjes from the Netherlands — Tiny little Dutch pancakes made in a special pan; they are small and fluffy. Traditionally served with powdered sugar and hot melted butter. To prepare {{servings_number.formattedValue}} servings (about 10-12 pancakes each), follow 5 easy steps: Step 1. Add {{total_yeast.formattedValue}}&nbsp;{{total_yeast.unit}} of yeast to {{total_milk_volume.formattedValue}}&nb
                                TXT],
                                ['when' => 'pancake_name == 5', 'text' => <<<'TXT'
                                Æbleskiver from Scandinavia — Danish pancake balls, much closer to a donut, traditionally served with glogg during Advent season. To prepare {{servings_number.formattedValue}} servings (about {{pancake_per_serving.formattedValue}} pancakes each), follow 5 easy steps: Step 1. In a bowl, beat {{total_egg_weight.formattedValue}}&nbsp;egg whites until they can hold a stiff peak. Set aside. Step 2. Mix
                                TXT],
                                ['when' => 'pancake_name == 6', 'text' => <<<'TXT'
                                Pikelet from Australia/New Zealand — Small and thick Australian crumpet-like dessert best served with jam. To prepare {{servings_number.formattedValue}} servings (about {{pancake_per_serving.formattedValue}} pancakes each), follow 5 easy steps: Step 1. Whisk {{total_milk_volume.formattedValue}}&nbsp;{{total_milk_volume.unit}} of milk, {{total_egg_weight.formattedValue}}&nbsp;eggs, and {{total_butt
                                TXT],
                                ['when' => 'pancake_name == 7', 'text' => <<<'TXT'
                                Naleśnik from Poland — Thin pancakes sprinkled with powdered sugar or sauce. Usually served with filling: jam, cottage cheese, or even meat stuffing. To prepare {{servings_number.formattedValue}} servings (about {{pancake_per_serving.formattedValue}} pancakes each), follow 5 easy steps: Step 1. Mix {{total_flour_mass.formattedValue}}&nbsp;{{total_flour_mass.unit}} of flour, {{total_milk_volume.for
                                TXT],
                                ['when' => 'pancake_name == 8', 'text' => <<<'TXT'
                                Blini from Russia — Bite-sized thick pancakes traditionally savored with smoked salmon, creme fraiche, or even caviar. To prepare {{servings_number.formattedValue}} servings (about {{pancake_per_serving.formattedValue}} pancakes each), follow 5 easy steps: Step 1. Combine {{total_flour_mass.formattedValue}}&nbsp;{{total_flour_mass.unit}} of flour, {{total_salt.formattedValue}}&nbsp;{{total_salt.un
                                TXT],
                                ['when' => 'pancake_name == 9', 'text' => <<<'TXT'
                                Lempeng Kelapa from Malaysia — Thick aromatic pancake served on a banana leaf, traditionally eaten with spicy gravies and curries. To prepare {{servings_number.formattedValue}} servings (about 2-3 pancakes each), follow 5 easy steps: Step 1. Combine {{total_flour_mass.formattedValue}}&nbsp;{{total_flour_mass.unit}} of flour, {{total_grated_coconut.formattedValue}}&nbsp;{{total_grated_coconut.unit}
                                TXT],
                                ['when' => 'pancake_name == 10', 'text' => <<<'TXT'
                                Griddle Cake from the USA — Medium thick delicacy cakes toasted on a greased griddle, served hot with butter and syrup. To prepare {{servings_number.formattedValue}} servings (about {{pancake_per_serving.formattedValue}} pancakes each), follow 5 easy steps: Step 1. Sift {{total_flour_mass.formattedValue}}&nbsp;{{total_flour_mass.unit}} of flour, {{total_salt.formattedValue}}&nbsp;{{total_salt.unit
                                TXT],
                                ['when' => 'pancake_name == 11', 'text' => <<<'TXT'
                                Ploye from Canada — Thin pancakes made from buckwheat flour can be eaten with molasses, butter, sugar, and maple syrup. To prepare {{servings_number.formattedValue}} servings (about {{pancake_per_serving.formattedValue}} pancakes each), follow 3 easy steps: Step 1. Mix {{total_white_flour.formattedValue}}&nbsp;{{total_white_flour.unit}} of white flour, {{total_buckwheat_flour.formattedValue}}&nbsp
                                TXT],
                                ['when' => 'pancake_name == 12', 'text' => <<<'TXT'
                                Injera from Ethiopia — The staple bread of Ethiopia, traditionally prepared with millet flour. Served with spicy Ethiopian stew. To prepare {{servings_number.formattedValue}} servings (about {{pancake_per_serving.formattedValue}} pancakes each), follow 5 easy steps: Step 1. Dissolve {{total_yeast.formattedValue}}&nbsp;{{total_yeast.unit}} of yeast and {{total_honey.formattedValue}}&nbsp;{{total_ho
                                TXT],
                                ['when' => 'pancake_name == 13', 'text' => <<<'TXT'
                                Beghrir from Morocco — Tender, spongey, melt-in-mouth Morroccan Pancakes made from Semolina. To prepare {{servings_number.formattedValue}} servings (about {{pancake_per_serving.formattedValue}} pancakes each), follow 5 easy steps: Step 1. Add {{total_water_volume.formattedValue}}&nbsp;{{total_water_volume.unit}} of water, {{total_yeast.formattedValue}}&nbsp;{{total_yeast.unit}} of yeast, and {{tot
                                TXT],
                                ['when' => 'pancake_name == 14', 'text' => <<<'TXT'
                                Funkaso from Nigeria — Traditional Nigerian millet pancakes. To prepare {{servings_number.formattedValue}} servings (about {{pancake_per_serving.formattedValue}} pancakes each), follow 5 easy steps: Step 1. Sift {{total_millet_flour.formattedValue}}&nbsp;{{total_millet_flour.unit}} of millet flour into a bowl, gradually add {{total_water_volume.formattedValue}}&nbsp;{{total_water_volume.unit}} of 
                                TXT],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/pancakes/graph_britain.jpg'],
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
                            'name' => 'pancake_number',
                            'label' => 'Pancakes number',
                            'type' => 'number',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pancake_per_serving',
                            'label' => 'Pancake per serving',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_white_flour',
                            'label' => 'White flour',
                            'type' => 'number',
                            'unit' => '74',
                            'unit_default' => 'cups',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_coconut_milk',
                            'label' => 'Coconut milk',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'cups',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_bicarbonate_soda',
                            'label' => 'Bicarbonate of soda',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'teesp',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_salt',
                            'label' => 'Salt',
                            'type' => 'number',
                            'unit' => '101',
                            'unit_default' => 'pinch',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'flour_mass',
                            'label' => 'Flour',
                            'type' => 'result',
                            'unit' => '74',
                            'unit_default' => 'cups',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'milk_volume',
                            'label' => 'Milk',
                            'type' => 'result',
                            'unit' => '20',
                            'unit_default' => 'ml',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'water_volume',
                            'label' => 'Water',
                            'type' => 'result',
                            'unit' => '20',
                            'unit_default' => 'ml',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'egg',
                            'label' => 'Eggs',
                            'type' => 'result',
                            'help' => 'One medium egg weighs about 50 g (28 dr).',
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
                            'name' => 'baking_powder',
                            'label' => 'Baking powder',
                            'type' => 'result',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'butter',
                            'label' => 'Butter',
                            'type' => 'result',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'oil',
                            'label' => 'Oil',
                            'type' => 'result',
                            'unit' => '20',
                            'unit_default' => 'm3',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'salt',
                            'label' => 'Salt',
                            'type' => 'result',
                            'unit' => '101',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sugar',
                            'label' => 'Sugar',
                            'type' => 'result',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tartar_cream',
                            'label' => 'Tartar cream',
                            'type' => 'result',
                            'unit' => '20',
                            'unit_default' => 'm3',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'baking_soda',
                            'label' => 'Baking soda',
                            'type' => 'result',
                            'unit' => '20',
                            'unit_default' => 'tbsp',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'carbonated_water',
                            'label' => 'Carbonated water',
                            'type' => 'result',
                            'unit' => '20',
                            'unit_default' => 'm3',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'yeast',
                            'label' => 'Yeast',
                            'type' => 'result',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'buttermilk',
                            'label' => 'Buttermilk',
                            'type' => 'result',
                            'unit' => '20',
                            'unit_default' => 'ml',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'buckwheat_flour',
                            'label' => 'Buckwheat flour',
                            'type' => 'result',
                            'unit' => '74',
                            'unit_default' => 'cups',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'white_flour',
                            'label' => 'White flour',
                            'type' => 'result',
                            'unit' => '74',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'honey',
                            'label' => 'Honey',
                            'type' => 'result',
                            'unit' => '20',
                            'unit_default' => 'teesp',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'millet_flour',
                            'label' => 'Millet flour',
                            'type' => 'result',
                            'unit' => '74',
                            'unit_default' => 'cups',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'semolina_flour',
                            'label' => 'Semolina flour',
                            'type' => 'result',
                            'unit' => '74',
                            'unit_default' => 'cups',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bicarbonate_soda',
                            'label' => 'Bicarbonate soda',
                            'type' => 'result',
                            'unit' => '20',
                            'unit_default' => 'm3',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'coconut_milk',
                            'label' => 'Coconut milk',
                            'type' => 'result',
                            'unit' => '20',
                            'unit_default' => 'm3',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'grated_coconut',
                            'label' => 'Grated coconut',
                            'type' => 'result',
                            'unit' => '119',
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
            'title' => 'total_milk_volume = milk_volume * pancake_number',
            'results' => ['milk_volume' => 'total_milk_volume/pancake_number', 'total_milk_volume' => 'milk_volume*pancake_number', 'pancake_number' => 'total_milk_volume/milk_volume'],
        ],
        [
            'title' => 'total_water_volume = water_volume * pancake_number',
            'results' => ['total_water_volume' => 'pancake_number*water_volume', 'pancake_number' => 'total_water_volume/water_volume', 'water_volume' => 'total_water_volume/pancake_number'],
        ],
        [
            'title' => 'total_flour_mass = flour_mass * pancake_number',
            'results' => ['total_flour_mass' => 'flour_mass*pancake_number', 'pancake_number' => 'total_flour_mass/flour_mass', 'flour_mass' => 'total_flour_mass/pancake_number'],
        ],
        [
            'title' => 'total_egg_weight = egg * pancake_number / 50',
            'results' => ['egg' => '50*total_egg_weight/pancake_number', 'pancake_number' => '50*total_egg_weight/egg', 'total_egg_weight' => '(1/50)*egg*pancake_number'],
        ],
        [
            'title' => 'total_salt = salt * pancake_number',
            'results' => ['salt' => 'total_salt/pancake_number', 'pancake_number' => 'total_salt/salt', 'total_salt' => 'pancake_number*salt'],
        ],
        [
            'title' => 'total_oil = oil * pancake_number',
            'results' => ['oil' => 'total_oil/pancake_number', 'total_oil' => 'oil*pancake_number', 'pancake_number' => 'total_oil/oil'],
        ],
        [
            'title' => 'total_sugar = sugar * pancake_number',
            'results' => ['total_sugar' => 'pancake_number*sugar', 'pancake_number' => 'total_sugar/sugar', 'sugar' => 'total_sugar/pancake_number'],
        ],
        [
            'title' => 'total_baking_powder = baking_powder * pancake_number',
            'results' => ['pancake_number' => 'total_baking_powder/baking_powder', 'baking_powder' => 'total_baking_powder/pancake_number', 'total_baking_powder' => 'baking_powder*pancake_number'],
        ],
        [
            'title' => 'total_butter = butter * pancake_number',
            'results' => ['butter' => 'total_butter/pancake_number', 'total_butter' => 'butter*pancake_number', 'pancake_number' => 'total_butter/butter'],
        ],
        [
            'title' => 'total_tartar_cream = tartar_cream * pancake_number',
            'results' => ['total_tartar_cream' => 'pancake_number*tartar_cream', 'pancake_number' => 'total_tartar_cream/tartar_cream', 'tartar_cream' => 'total_tartar_cream/pancake_number'],
        ],
        [
            'title' => 'total_baking_soda = baking_soda * pancake_number',
            'results' => ['baking_soda' => 'total_baking_soda/pancake_number', 'total_baking_soda' => 'baking_soda*pancake_number', 'pancake_number' => 'total_baking_soda/baking_soda'],
        ],
        [
            'title' => 'total_carbonated_water = carbonated_water * pancake_number',
            'results' => ['pancake_number' => 'total_carbonated_water/carbonated_water', 'carbonated_water' => 'total_carbonated_water/pancake_number', 'total_carbonated_water' => 'carbonated_water*pancake_number'],
        ],
        [
            'title' => 'total_yeast = yeast * pancake_number',
            'results' => ['total_yeast' => 'pancake_number*yeast', 'pancake_number' => 'total_yeast/yeast', 'yeast' => 'total_yeast/pancake_number'],
        ],
        [
            'title' => 'total_buttermilk = buttermilk * pancake_number',
            'results' => ['total_buttermilk' => 'buttermilk*pancake_number', 'buttermilk' => 'total_buttermilk/pancake_number', 'pancake_number' => 'total_buttermilk/buttermilk'],
        ],
        [
            'title' => 'total_white_flour = white_flour * pancake_number',
            'results' => ['white_flour' => 'total_white_flour/pancake_number', 'total_white_flour' => 'pancake_number*white_flour', 'pancake_number' => 'total_white_flour/white_flour'],
        ],
        [
            'title' => 'total_buckwheat_flour = buckwheat_flour * pancake_number',
            'results' => ['total_buckwheat_flour' => 'buckwheat_flour*pancake_number', 'buckwheat_flour' => 'total_buckwheat_flour/pancake_number', 'pancake_number' => 'total_buckwheat_flour/buckwheat_flour'],
        ],
        [
            'title' => 'total_honey = honey * pancake_number',
            'results' => ['honey' => 'total_honey/pancake_number', 'total_honey' => 'honey*pancake_number', 'pancake_number' => 'total_honey/honey'],
        ],
        [
            'title' => 'total_millet_flour = millet_flour * pancake_number',
            'results' => ['total_millet_flour' => 'millet_flour*pancake_number', 'millet_flour' => 'total_millet_flour/pancake_number', 'pancake_number' => 'total_millet_flour/millet_flour'],
        ],
        [
            'title' => 'total_semolina_flour = semolina_flour * pancake_number',
            'results' => ['semolina_flour' => 'total_semolina_flour/pancake_number', 'pancake_number' => 'total_semolina_flour/semolina_flour', 'total_semolina_flour' => 'pancake_number*semolina_flour'],
        ],
        [
            'title' => 'total_grated_coconut = grated_coconut * pancake_number',
            'results' => ['total_grated_coconut' => 'grated_coconut*pancake_number', 'pancake_number' => 'total_grated_coconut/grated_coconut', 'grated_coconut' => 'total_grated_coconut/pancake_number'],
        ],
        [
            'title' => 'total_coconut_milk = coconut_milk * pancake_number',
            'results' => ['coconut_milk' => 'total_coconut_milk/pancake_number', 'pancake_number' => 'total_coconut_milk/coconut_milk', 'total_coconut_milk' => 'coconut_milk*pancake_number'],
        ],
        [
            'title' => 'total_bicarbonate_soda = bicarbonate_soda * pancake_number',
            'results' => ['total_bicarbonate_soda' => 'bicarbonate_soda*pancake_number', 'bicarbonate_soda' => 'total_bicarbonate_soda/pancake_number', 'pancake_number' => 'total_bicarbonate_soda/bicarbonate_soda'],
        ],
        [
            'title' => 'pancake_number = servings_number * pancake_per_serving',
            'results' => ['pancake_per_serving' => 'pancake_number/servings_number', 'servings_number' => 'pancake_number/pancake_per_serving', 'pancake_number' => 'pancake_per_serving*servings_number'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("get_salt_unit",function(total_salt){if(total_salt<1.5)return 0;else if(total_salt<2.5)return 1;else if(total_salt<16)return 2;else if(total_salt<24)return 3;else if(total_salt<40)return 4;else return 5});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Perfect pancake works out Flour and Buckwheat flour from Select a pancake type and I want to feed. Nothing is looked up on this page: flour is computed from select a pancake type and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Flour is opened in cups; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Perfect pancake calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Perfect pancake: it takes 2 numbers and reports Flour, Buckwheat flour and Semolina flour.</p><p>In the form&#039;s own words, Milk = Milk × Pancakes number.</p><p>The result panel carries Flour, Buckwheat flour, Semolina flour and Millet flour, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Select a pancake type</strong> — a plain number, no unit</li><li><strong>I want to feed</strong> — in people</li></ul><p>The result boxes are Flour in cups, Buckwheat flour in cups, Semolina flour in cups, Millet flour in cups, Milk in US customary cups, Grated coconut in US customary cups (236.59ml), Water in US customary cups, Carbonated water in US customary cups, Buttermilk in US customary cups, Eggs in eggs, Sugar in teaspoons (5 ml), Baking powder in teaspoons (5 mL), Baking soda in teaspoons (5 mL), Cream of tartar in teaspoons (5 mL), Butter in tablespoons (15 mL), Oil in tablespoons (15 mL), Yeast in tablespoons (15 mL), Honey in teaspoons (5 mL); they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Milk</strong> = <code>Milk × Pancakes number</code></li><li><strong>Pancakes number</strong> = <code>Milk ÷ Milk</code></li><li><strong>Water</strong> = <code>Pancakes number × Water</code></li><li><strong>Flour</strong> = <code>Flour × Pancakes number</code></li><li><strong>Eggs</strong> = <code>(1 ÷ 50) × Eggs × Pancakes number</code></li><li><strong>Salt</strong> = <code>Pancakes number × Salt</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Milk</strong> = <code>Milk × Pancakes number</code> — the form to use when Milk and Pancakes number are the values you have.</li><li><strong>Milk</strong> = <code>Milk ÷ Pancakes number</code> — the form to use when Milk and Pancakes number are the values you have.</li><li><strong>Pancakes number</strong> = <code>Milk ÷ Milk</code> — the form to use when Milk and Milk are the values you have.</li><li><strong>Water</strong> = <code>Pancakes number × Water</code> — the form to use when Pancakes number and Water are the values you have.</li><li><strong>Pancakes number</strong> = <code>Water ÷ Water</code> — the form to use when Water and Water are the values you have.</li><li><strong>Water</strong> = <code>Water ÷ Pancakes number</code> — the form to use when Water and Pancakes number are the values you have.</li><li><strong>Flour</strong> = <code>Flour × Pancakes number</code> — the form to use when Flour and Pancakes number are the values you have.</li><li><strong>Pancakes number</strong> = <code>Flour ÷ Flour</code> — the form to use when Flour and Flour are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Milk, Milk and Pancakes number can be the unknown.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Flour, Buckwheat flour and Semolina flour are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Select a pancake type left as a guess.</strong> Anything typed into Select a pancake type is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>I want to feed left as a guess.</strong> Anything typed into I want to feed is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Select a pancake type and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Select a pancake type</strong> takes a plain number with no unit attached. Check the field label and unit before calculating.</li><li><strong>I want to feed</strong> is measured in people. It feeds Pancake per serving and Pancakes number. Check the field label and unit before calculating.</li></ul><p>None of the boxes has to be filled in a particular order. </p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Select a pancake type and I want to feed. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Select a pancake type into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Flour in cups with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Flour is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are cups, US customary cups and US customary cups (236.59ml) and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Select a pancake type and I want to feed are measured, independent and in the unit the chip says. </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Select a pancake type and I want to feed and the number you are missing is Flour and Buckwheat flour.</p><p>If the result seems unexpected, recheck the inputs and units before using it.</p><p>Related calculators: <a href="/food/pancake-recipe">Pancake recipe</a>, <a href="/food/self-rising-flour">Self-rising flour</a> and <a href="/food/cake-pans">Cake pan</a>.</p>
            TXT],
            ['title' => 'Limits and data handling', 'html' => <<<'TXT'
            <p>This calculator applies the relationships and assumptions shown on the page to the values entered. It cannot verify ingredient labels, measurements, equipment or conditions that are not represented in the form. Check the selected units and consult recipe, product or safety instructions where they apply.</p>
            <p>The result is a calculation, not a measurement of the food or drink. Use a scale, thermometer or product label when the real-world quantity or safety status matters.</p>
            TXT],
            ['title' => 'Where this fits among the other calculators', 'html' => <<<'TXT'
            <p>Neighbouring pages resolve the parts of the same job that Perfect pancake leaves alone. Knowing which is which saves running the wrong one:</p><p>Worth opening next: <a href="/food/ice-cream">Ice cream Calculator</a>, <a href="/food/egg-boiling">Ideal egg boiling Calculator</a> and <a href="/food/mashed-potatoes">Mashed potatoes Calculator</a>. They follow the same pattern as this page (form, formula, worked example, answer), so a reader who understands one understands the others.</p><p>Using the page that already answers the question you have is better than adapting this one: the formula and the units will match what you expect, and the worked example will be about your case.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Perfect pancake is a number to act on, so the useful question is what to do with Flour (cups), Buckwheat flour (cups) and Semolina flour (cups) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> Write down Select a pancake type and I want to feed alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. </p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Perfect pancake calculator work out?', 'a' => 'Flour, Buckwheat flour, Semolina flour and Millet flour, from Milk and Pancakes number. The relationship is Milk = Milk × Pancakes number.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Select a pancake type, I want to feed (people). Fill select a pancake type and i want to feed and leave Flour empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Milk, Milk, Pancakes number and Water can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Flour is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Select a pancake type left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Flour keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/food/pancake-recipe', 'name' => 'Pancake recipe'],
            ['path' => '/food/self-rising-flour', 'name' => 'Self-rising flour'],
            ['path' => '/food/cake-pans', 'name' => 'Cake pan']
        ],
    ],
];
