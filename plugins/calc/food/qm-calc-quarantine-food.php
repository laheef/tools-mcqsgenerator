<?php

/**
 * Quarantine food
 * /food/quarantine-food
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Quarantine food',
    'meta' => ['title' => 'Quarantine food — Formula, Steps & Examples', 'description' => 'Estimate food quantities from household size and the selected foods for a planning period. Use as a planning guide; adjust for your guests and menu.', 'h1' => 'Quarantine food Calculator', 'updated' => '2026-08-26'],
    'sections' => [
        [
            'title' => 'Household members',
            'note' => 'Treat children aged 10+ as adults.',
            'blocks' => [
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'women',
                            'label' => 'Women',
                            'type' => 'number',
                            'help' => 'How many women are in your household?',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'men',
                            'label' => 'Men',
                            'type' => 'number',
                            'help' => 'How many men are in your household?',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'girls',
                            'label' => 'Girls',
                            'type' => 'number',
                            'help' => 'Aged 10 or younger.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                        [
                            'name' => 'boys',
                            'label' => 'Boys',
                            'type' => 'number',
                            'help' => 'Aged 10 or younger.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'days',
                            'label' => 'Quarantine time',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '14',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Fruit and vegetables',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'apples',
                            'label' => ' Apples',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['standard', '1'],
                        ],
                        [
                            'name' => 'onions',
                            'label' => ' Onions',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'carrots',
                            'label' => ' Carrots',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['standard', '1'],
                        ],
                        [
                            'name' => 'peppers',
                            'label' => ' Bell peppers',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'potatoes',
                            'label' => ' Potatoes',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['standard', '1'],
                        ],
                        ['type' => 'note', 'text' => '&nbsp;'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Perishable foods',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'eggs',
                            'label' => ' Eggs',
                            'type' => 'number',
                            'help' => 'If you are experiencing an egg shortage, you can exchange them for a different protein source, e.g. tofu, legumes, lean meat or low-fat cheese.',
                            'rounding' => ['standard', '0'],
                        ],
                        [
                            'name' => 'bread',
                            'label' => ' Bread',
                            'type' => 'number',
                            'suffix' => 'loaves',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'butter',
                            'label' => ' Butter',
                            'type' => 'number',
                            'suffix' => 'blocks',
                            'help' => '250 g blocks oof butter.',
                            'rounding' => ['standard', '1'],
                        ],
                        [
                            'name' => 'cheese',
                            'label' => ' Cheese',
                            'type' => 'number',
                            'suffix' => 'blocks',
                            'help' => '400 g blocks of cheese.',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'butterUS',
                            'label' => ' Butter',
                            'type' => 'number',
                            'suffix' => 'sticks',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'cheeseUS',
                            'label' => ' Cheese',
                            'type' => 'number',
                            'suffix' => 'blocks',
                            'help' => '1 lb blocks',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'milk',
                            'label' => ' Milk',
                            'type' => 'number',
                            'suffix' => 'liters',
                            'rounding' => ['standard', '1'],
                        ],
                        [
                            'name' => 'meatTrays',
                            'label' => ' Minced meat',
                            'type' => 'number',
                            'suffix' => 'trays',
                            'help' => '500 g trays of minced meat.',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'milkUS',
                            'label' => ' Milk',
                            'type' => 'number',
                            'suffix' => 'cartons',
                            'help' => '1 carton = 0.5 gallon',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'meatTraysUS',
                            'label' => ' Minced meat',
                            'type' => 'number',
                            'suffix' => 'trays',
                            'help' => '1 lb trays of minced meat.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Non-perishable foods',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'crispbread',
                            'label' => ' Crispbread',
                            'type' => 'number',
                            'suffix' => 'packs',
                            'help' => '200 g packs of crispbread.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'oats',
                            'label' => ' Oats',
                            'type' => 'number',
                            'suffix' => 'packs',
                            'help' => '1 kg packs of oats.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'crispbreadUS',
                            'label' => 'Crispbread',
                            'type' => 'number',
                            'suffix' => 'packs',
                            'help' => '1 pack = 7 oz',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'oatsUS',
                            'label' => ' Oats',
                            'type' => 'number',
                            'suffix' => 'packs',
                            'help' => '24 oz packs of oats.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'pasta',
                            'label' => ' Pasta',
                            'type' => 'number',
                            'suffix' => 'packs',
                            'help' => '500 g packs of pasta.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'rice',
                            'label' => ' Rice',
                            'type' => 'number',
                            'suffix' => 'packs',
                            'help' => '400 g packs of pasta.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'pastaUS',
                            'label' => ' Pasta',
                            'type' => 'number',
                            'suffix' => 'packs',
                            'help' => '1 lb packs of pasta.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'riceUS',
                            'label' => ' Rice',
                            'type' => 'number',
                            'suffix' => 'bags',
                            'help' => '2 lb bags of rice.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'lentils',
                            'label' => ' Lentils',
                            'type' => 'number',
                            'suffix' => 'packs',
                            'help' => '500 g packs of lentils.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'cocoa',
                            'label' => ' Cocoa',
                            'type' => 'number',
                            'suffix' => 'packs',
                            'help' => '200 g packs of cocoa.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'lentilsUS',
                            'label' => ' Lentils',
                            'type' => 'number',
                            'suffix' => 'packs',
                            'help' => '16 oz packs of lentils.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'cocoaUS',
                            'label' => ' Cocoa',
                            'type' => 'number',
                            'suffix' => 'packs',
                            'help' => '8 oz packs of cocoa.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'almonds',
                            'label' => ' Almonds',
                            'type' => 'number',
                            'suffix' => 'packs',
                            'help' => '200 g packs of almonds.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'pickles',
                            'label' => ' Pickles',
                            'type' => 'number',
                            'suffix' => 'pickles',
                            'help' => '360 g jars of pickles.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'almodsUS',
                            'label' => ' Almonds',
                            'type' => 'number',
                            'suffix' => 'packs',
                            'help' => '14 oz packs of almonds.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'picklesUS',
                            'label' => ' Pickles',
                            'type' => 'number',
                            'suffix' => 'jars',
                            'help' => '26 fl oz jars of pickles.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'honey',
                            'label' => ' Honey',
                            'type' => 'number',
                            'suffix' => 'jars',
                            'help' => '500 g jars of honey.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'mayo',
                            'label' => ' Mayo ',
                            'type' => 'number',
                            'suffix' => 'jars',
                            'help' => '400 g jars of mayo.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'honeyUS',
                            'label' => ' Honey',
                            'type' => 'number',
                            'suffix' => 'bottles',
                            'help' => '16 oz bottles of honey.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'mayoUS',
                            'label' => ' Mayo',
                            'type' => 'number',
                            'suffix' => 'jars',
                            'help' => '15 oz jars of mayo.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'oil',
                            'label' => 'Oil',
                            'type' => 'number',
                            'suffix' => 'bottles',
                            'help' => '500 ml bottles of oil.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        ['type' => 'note', 'text' => '&nbsp;'],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'oilUS',
                            'label' => 'Oil',
                            'type' => 'number',
                            'suffix' => 'bottles',
                            'help' => '16 fl oz bottles of oil.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        ['type' => 'note', 'text' => '&nbsp;'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Canned or frozen foods',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'frozenVeggies',
                            'label' => ' Frozen vegetables',
                            'type' => 'number',
                            'suffix' => 'packs',
                            'help' => '500 g packs of frozen veggies.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'sweetcorn',
                            'label' => ' Sweetcorn',
                            'type' => 'number',
                            'suffix' => 'cans',
                            'help' => '320 g cans of sweetcorn.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'frozenVeggiesUS',
                            'label' => ' Frozen vegetables',
                            'type' => 'number',
                            'suffix' => 'packs',
                            'help' => '20 oz packs of frozen veggies.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'sweetcornUS',
                            'label' => ' Sweetcorn',
                            'type' => 'number',
                            'suffix' => 'cans',
                            'help' => '15 oz cans of sweetcorn.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'tuna',
                            'label' => ' Tuna',
                            'type' => 'number',
                            'suffix' => 'cans',
                            'help' => '150 g cans of tuna.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'chickpeas',
                            'label' => ' Chickpeas',
                            'type' => 'number',
                            'suffix' => 'cans',
                            'help' => '400 g cans of chickpeas.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'tunaUS',
                            'label' => ' Tuna',
                            'type' => 'number',
                            'suffix' => 'cans',
                            'help' => '5 oz cans of tuna.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'chickpeasUS',
                            'label' => 'Chickpeas',
                            'type' => 'number',
                            'suffix' => 'cans',
                            'help' => '15 oz cans of chickpeas.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'tomatoes',
                            'label' => ' Tomatoes',
                            'type' => 'number',
                            'suffix' => 'cans',
                            'help' => '400 g cans of tomatoes.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        ['type' => 'note', 'text' => '&nbsp;'],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'tomatoesUS',
                            'label' => ' Tomatoes',
                            'type' => 'number',
                            'suffix' => 'cans',
                            'help' => '14.5 oz cans of tomatoes.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        ['type' => 'note', 'text' => '&nbsp;'],
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
                        ['type' => 'note', 'text' => <<<'TXT'
                        What to do with all this food? Make sure to check out the meal plan we created for you!  Feel free to modify this shopping list — for example, use substitutes if you can't consume certain products.
                        TXT],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'meatTrays = get_meatTrays(men, boys, days, women, girls) ',
            'results' => ['meatTrays' => 'get_meatTrays(men, boys, days, women, girls)'],
        ],
        [
            'title' => 'eggs = get_eggs(men, boys, days, women, girls) ',
            'results' => ['eggs' => 'get_eggs(men, boys, days, women, girls)'],
        ],
        [
            'title' => 'butter = get_butter(men, boys, days, women, girls) ',
            'results' => ['butter' => 'get_butter(men, boys, days, women, girls)'],
        ],
        [
            'title' => 'milk =  get_milk(men, boys, days, women, girls) ',
            'results' => ['milk' => 'get_milk(men, boys, days, women, girls)'],
        ],
        [
            'title' => 'cheese = get_cheese(men, boys, days, women, girls) ',
            'results' => ['cheese' => 'get_cheese(men, boys, days, women, girls)'],
        ],
        [
            'title' => 'bread =  get_bread(men, boys, days, women, girls) ',
            'results' => ['bread' => 'get_bread(men, boys, days, women, girls)'],
        ],
        [
            'title' => 'apples = get_apples(men, boys, days, women, girls) ',
            'results' => ['apples' => 'get_apples(men, boys, days, women, girls)'],
        ],
        [
            'title' => 'onions = get_onions(men, boys, days, women, girls) ',
            'results' => ['onions' => 'get_onions(men, boys, days, women, girls)'],
        ],
        [
            'title' => 'carrots = get_carrots(men, boys, days, women, girls) ',
            'results' => ['carrots' => 'get_carrots(men, boys, days, women, girls)'],
        ],
        [
            'title' => 'peppers = get_peppers(men, boys, days, women, girls) ',
            'results' => ['peppers' => 'get_peppers(men, boys, days, women, girls)'],
        ],
        [
            'title' => 'potatoes = get_potatoes(men, boys, days, women, girls) ',
            'results' => ['potatoes' => 'get_potatoes(men, boys, days, women, girls)'],
        ],
        [
            'title' => 'frozenVeggies = get_frozenVeggies(men, boys, days, women, girls) ',
            'results' => ['frozenVeggies' => 'get_frozenVeggies(men, boys, days, women, girls)'],
        ],
        [
            'title' => 'crispbread = get_crispbread(men, boys, days, women, girls) ',
            'results' => ['crispbread' => 'get_crispbread(men, boys, days, women, girls)'],
        ],
        [
            'title' => 'pasta = get_pasta(men, boys, days, women, girls) ',
            'results' => ['pasta' => 'get_pasta(men, boys, days, women, girls)'],
        ],
        [
            'title' => 'oats = get_oats(men, boys, days, women, girls) ',
            'results' => ['oats' => 'get_oats(men, boys, days, women, girls)'],
        ],
        [
            'title' => 'rice = get_rice(men, boys, days, women, girls) ',
            'results' => ['rice' => 'get_rice(men, boys, days, women, girls)'],
        ],
        [
            'title' => 'lentils = get_lentils(men, boys, days, women, girls) ',
            'results' => ['lentils' => 'get_lentils(men, boys, days, women, girls)'],
        ],
        [
            'title' => 'pickles = get_pickles(men, boys, days, women, girls) ',
            'results' => ['pickles' => 'get_pickles(men, boys, days, women, girls)'],
        ],
        [
            'title' => 'oil = get_oil(men, boys, days, women, girls) ',
            'results' => ['oil' => 'get_oil(men, boys, days, women, girls)'],
        ],
        [
            'title' => 'cocoa = get_cocoa(men, boys, days, women, girls) ',
            'results' => ['cocoa' => 'get_cocoa(men, boys, days, women, girls)'],
        ],
        [
            'title' => 'mayo = get_mayo(men, boys, days, women, girls) ',
            'results' => ['mayo' => 'get_mayo(men, boys, days, women, girls)'],
        ],
        [
            'title' => 'honey = get_honey(men, boys, days, women, girls) ',
            'results' => ['honey' => 'get_honey(men, boys, days, women, girls)'],
        ],
        [
            'title' => 'almonds = get_almonds(men, boys, days, women, girls) ',
            'results' => ['almonds' => 'get_almonds(men, boys, days, women, girls)'],
        ],
        [
            'title' => 'chickpeas = get_chickpeas(men, boys, days, women, girls) ',
            'results' => ['chickpeas' => 'get_chickpeas(men, boys, days, women, girls)'],
        ],
        [
            'title' => 'tomatoes = get_tomatoes(men, boys, days, women, girls) ',
            'results' => ['tomatoes' => 'get_tomatoes(men, boys, days, women, girls)'],
        ],
        [
            'title' => 'sweetcorn = get_sweetcorn(men, boys, days, women, girls) ',
            'results' => ['sweetcorn' => 'get_sweetcorn(men, boys, days, women, girls)'],
        ],
        [
            'title' => 'tuna = get_tuna(men, boys, days, women, girls) ',
            'results' => ['tuna' => 'get_tuna(men, boys, days, women, girls)'],
        ],
        [
            'title' => 'butterUS =  get_butter_US(men, boys, days, women, girls)',
            'results' => ['butterUS' => 'get_butter_US(men, boys, days, women, girls)'],
        ],
        [
            'title' => 'cheeseUS = get_cheese_US(men, boys, days, women, girls)',
            'results' => ['cheeseUS' => 'get_cheese_US(men, boys, days, women, girls)'],
        ],
        [
            'title' => 'milkUS =  get_milk_US(men, boys, days, women, girls)',
            'results' => ['milkUS' => 'get_milk_US(men, boys, days, women, girls)'],
        ],
        [
            'title' => 'meatTraysUS = get_meatTrays_US(men, boys, days, women, girls)',
            'results' => ['meatTraysUS' => 'get_meatTrays_US(men, boys, days, women, girls)'],
        ],
        [
            'title' => 'crispbreadUS = get_cripsbread_US(men, boys, days, women, girls)',
            'results' => ['crispbreadUS' => 'get_cripsbread_US(men, boys, days, women, girls)'],
        ],
        [
            'title' => 'oatsUS = get_oats_US(men, boys, days, women, girls)',
            'results' => ['oatsUS' => 'get_oats_US(men, boys, days, women, girls)'],
        ],
        [
            'title' => 'pastaUS = get_pasta_US(men, boys, days, women, girls)',
            'results' => ['pastaUS' => 'get_pasta_US(men, boys, days, women, girls)'],
        ],
        [
            'title' => 'riceUS = get_rice_US(men, boys, days, women, girls)',
            'results' => ['riceUS' => 'get_rice_US(men, boys, days, women, girls)'],
        ],
        [
            'title' => 'lentilsUS = get_lentils_US(men, boys, days, women, girls)',
            'results' => ['lentilsUS' => 'get_lentils_US(men, boys, days, women, girls)'],
        ],
        [
            'title' => 'cocoaUS = get_cocoa_US(men, boys, days, women, girls)',
            'results' => ['cocoaUS' => 'get_cocoa_US(men, boys, days, women, girls)'],
        ],
        [
            'title' => 'almodsUS = get_almonds_US(men, boys, days, women, girls)',
            'results' => ['almodsUS' => 'get_almonds_US(men, boys, days, women, girls)'],
        ],
        [
            'title' => 'picklesUS = get_pickles_US(men, boys, days, women, girls)',
            'results' => ['picklesUS' => 'get_pickles_US(men, boys, days, women, girls)'],
        ],
        [
            'title' => 'honeyUS = get_honey_US(men, boys, days, women, girls)',
            'results' => ['honeyUS' => 'get_honey_US(men, boys, days, women, girls)'],
        ],
        [
            'title' => 'mayoUS = get_mayo_US(men, boys, days, women, girls)',
            'results' => ['mayoUS' => 'get_mayo_US(men, boys, days, women, girls)'],
        ],
        [
            'title' => 'oilUS = get_oil_US(men, boys, days, women, girls)',
            'results' => ['oilUS' => 'get_oil_US(men, boys, days, women, girls)'],
        ],
        [
            'title' => 'frozenVeggiesUS = get_frozen_veggies_US(men, boys, days, women, girls)',
            'results' => ['frozenVeggiesUS' => 'get_frozen_veggies_US(men, boys, days, women, girls)'],
        ],
        [
            'title' => 'sweetcornUS = get_sweetcorn_US(men, boys, days, women, girls)',
            'results' => ['sweetcornUS' => 'get_sweetcorn_US(men, boys, days, women, girls)'],
        ],
        [
            'title' => 'tunaUS = get_tuna_US(men, boys, days, women, girls)',
            'results' => ['tunaUS' => 'get_tuna_US(men, boys, days, women, girls)'],
        ],
        [
            'title' => 'chickpeasUS = get_chickpeas_US(men, boys, days, women, girls)',
            'results' => ['chickpeasUS' => 'get_chickpeas_US(men, boys, days, women, girls)'],
        ],
        [
            'title' => 'tomatoesUS = get_tomatoes_US(men, boys, days, women, girls)',
            'results' => ['tomatoesUS' => 'get_tomatoes_US(men, boys, days, women, girls)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("get_meatTrays",function(men,boys,days,women,girls){var meatTrays=Math.ceil(((men+0.5*boys)*days*250+(women+0.5*girls)*days*230)/500/4);return meatTrays});omni.define("get_eggs",function(men,boys,days,women,girls){var eggs=Math.ceil(((men+0.5*boys)*days*360+(women+0.5*girls)*days*270)/60/4);return eggs});omni.define("get_butter",function(men,boys,days,women,girls){var butter=Math.ceil(((men+0.5*boys)*days*25+(women+0.5*girls)*days*20)/250/4);return butter});omni.define("get_milk",function(men,boys,days,women,girls){var milk=Math.ceil(((men+0.5*boys)*days*850+(women+0.5*girls)*days*800)/1000/4);return milk});omni.define("get_cheese",function(men,boys,days,women,girls){var cheese=Math.ceil(((men+0.5*boys)*days*80+(women+0.5*girls)*days*80)/400/4);return cheese});omni.define("get_bread",function(men,boys,days,women,girls){var bread=Math.ceil(((men+0.5*boys)*days*385+(women+0.5*girls)*days*280)/800/4);return bread});omni.define("get_apples",function(men,boys,days,women,girls){var apples=((men+0.5*boys)*days*510+(women+0.5*girls)*days*510)/1000/4;return apples});omni.define("get_onions",function(men,boys,days,women,girls){var onions=((men+0.5*boys)*days*84+(women+0.5*girls)*days*66)/1000/4;return onions});omni.define("get_carrots",function(men,boys,days,women,girls){var carrots=((men+0.5*boys)*days*210+(women+0.5*girls)*days*192)/1000/4;return carrots});omni.define("get_peppers",function(men,boys,days,women,girls){var peppers=((men+0.5*boys)*days*280+(women+0.5*girls)*days*280)/1000/4;return peppers});omni.define("get_potatoes",function(men,boys,days,women,girls){var potatoes=((men+0.5*boys)*days*56+(women+0.5*girls)*days*45)/1000/4;return potatoes});omni.define("get_frozenVeggies",function(men,boys,days,women,girls){var frozenVeggies=Math.ceil(((men+0.5*boys)*days*500+(women+0.5*girls)*days*500)/500/4);return frozenVeggies});omni.define("get_crispbread",function(men,boys,days,women,girls){var cripsbread=Math.ceil(((men+0.5*boys)*days*42+(women+0.5*girls)*days*42)/200/4);return cripsbread});omni.define("get_pasta",function(men,boys,days,women,girls){var pasta=Math.ceil(((men+0.5*boys)*days*200+(women+0.5*girls)*days*200)/500/4);return pasta});omni.define("get_oats",function(men,boys,days,women,girls){var oats=Math.ceil(((men+0.5*boys)*days*210+(women+0.5*girls)*days*170)/1000/4);return oats});omni.define("get_rice",function(men,boys,days,women,girls){var rice=Math.ceil(((men+0.5*boys)*days*370+(women+0.5*girls)*days*280)/400/4);return rice});omni.define("get_lentils",function(men,boys,days,women,girls){var lentils=Math.ceil(((men+0.5*boys)*days*90+(women+0.5*girls)*days*68)/500/4);return lentils});omni.define("get_pickles",function(men,boys,days,women,girls){var pickles=Math.ceil(((men+0.5*boys)*days*264+(women+0.5*girls)*days*264)/360/4);return pickles});omni.define("get_oil",function(men,boys,days,women,girls){var oil=Math.ceil(((men+0.5*boys)*days*42.5+(women+0.5*girls)*days*35.5)/500/4);return oil});omni.define("get_cocoa",function(men,boys,days,women,girls){var cocoa=Math.ceil(((men+0.5*boys)*days*20+(women+0.5*girls)*days*20)/200/4);return cocoa});omni.define("get_mayo",function(men,boys,days,women,girls){var mayo=Math.ceil(((men+0.5*boys)*days*35+(women+0.5*girls)*days*35)/400/4);return mayo});omni.define("get_honey",function(men,boys,days,women,girls){var honey=Math.ceil(((men+0.5*boys)*days*50+(women+0.5*girls)*days*40)/500/4);return honey});omni.define("get_almonds",function(men,boys,days,women,girls){var almonds=Math.ceil(((men+0.5*boys)*days*70+(women+0.5*girls)*days*60)/200/4);return almonds});omni.define("get_chickpeas",function(men,boys,days,women,girls){var chickpeas=Math.ceil(((men+0.5*boys)*days*200+(women+0.5*girls)*days*170)/240/4);return chickpeas});omni.define("get_tomatoes",function(men,boys,days,women,girls){var tomatoes=Math.ceil(((men+0.5*boys)*days*500+(women+0.5*girls)*days*400)/400/4);return tomatoes});omni.define("get_sweetcorn",function(men,boys,days,women,girls){var sweetcorn=Math.ceil(((men+0.5*boys)*days*70+(women+0.5*girls)*days*70)/260/4);return sweetcorn});omni.define("get_tuna",function(men,boys,days,women,girls){var tuna=Math.ceil(((men+0.5*boys)*days*70+(women+0.5*girls)*days*70)/100/4);return tuna});omni.define("get_butter_US",function(men,boys,days,women,girls){var butter_US=Math.ceil(((men+0.5*boys)*days*25+(women+0.5*girls)*days*20)/113/4);return butter_US});omni.define("get_cheese_US",function(men,boys,days,women,girls){var cheese_US=Math.ceil(((men+0.5*boys)*days*80+(women+0.5*girls)*days*80)/454/4);return cheese_US});omni.define("get_milk_US",function(men,boys,days,women,girls){var milk_US=Math.ceil(((men+0.5*boys)*days*850+(women+0.5*girls)*days*800)/1890/4);return milk_US});omni.define("get_meatTrays_US",function(men,boys,days,women,girls){var meatTrays_US=Math.ceil(((men+0.5*boys)*days*250+(women+0.5*girls)*days*230)/454/4);return meatTrays_US});omni.define("get_cripsbread_US",function(men,boys,days,women,girls){var cripsbread_US=Math.ceil(((men+0.5*boys)*days*42+(women+0.5*girls)*days*42)/198/4);return cripsbread_US});omni.define("get_oats_US",function(men,boys,days,women,girls){var oats_US=Math.ceil(((men+0.5*boys)*days*210+(women+0.5*girls)*days*170)/680/4);return oats_US});omni.define("get_pasta_US",function(men,boys,days,women,girls){var pasta_US=Math.ceil(((men+0.5*boys)*days*200+(women+0.5*girls)*days*200)/454/4);return pasta_US});omni.define("get_rice_US",function(men,boys,days,women,girls){var rice_US=Math.ceil(((men+0.5*boys)*days*370+(women+0.5*girls)*days*280)/908/4);return rice_US});omni.define("get_lentils_US",function(men,boys,days,women,girls){var lentils_US=Math.ceil(((men+0.5*boys)*days*90+(women+0.5*girls)*days*68)/454/4);return lentils_US});omni.define("get_cocoa_US",function(men,boys,days,women,girls){var cocoa_US=Math.ceil(((men+0.5*boys)*days*20+(women+0.5*girls)*days*20)/227/4);return cocoa_US});omni.define("get_almonds_US",function(men,boys,days,women,girls){var almonds_US=Math.ceil(((men+0.5*boys)*days*70+(women+0.5*girls)*days*60)/397/4);return almonds_US});omni.define("get_pickles_US",function(men,boys,days,women,girls){var pickles_US=Math.ceil(((men+0.5*boys)*days*264+(women+0.5*girls)*days*264)/369/4);return pickles_US});omni.define("get_honey_US",function(men,boys,days,women,girls){var honey_US=Math.ceil(((men+0.5*boys)*days*50+(women+0.5*girls)*days*40)/454/4);return honey_US});omni.define("get_mayo_US",function(men,boys,days,women,girls){var mayo_US=Math.ceil(((men+0.5*boys)*days*35+(women+0.5*girls)*days*35)/425/4);return mayo_US});omni.define("get_oil_US",function(men,boys,days,women,girls){var oil_US=Math.ceil(((men+0.5*boys)*days*42.5+(women+0.5*girls)*days*35.5)/435/4);return oil_US});omni.define("get_frozen_veggies_US",function(men,boys,days,women,girls){var frozen_veggies_US=Math.ceil(((men+0.5*boys)*days*500+(women+0.5*girls)*days*500)/567/4);return frozen_veggies_US});omni.define("get_sweetcorn_US",function(men,boys,days,women,girls){var honey_US=Math.ceil(((men+0.5*boys)*days*70+(women+0.5*girls)*days*70)/425/4);return honey_US});omni.define("get_tuna_US",function(men,boys,days,women,girls){var honey_US=Math.ceil(((men+0.5*boys)*days*70+(women+0.5*girls)*days*70)/106/4);return honey_US});omni.define("get_chickpeas_US",function(men,boys,days,women,girls){var chickpeas_US=Math.ceil(((men+0.5*boys)*days*200+(women+0.5*girls)*days*170)/255/4);return chickpeas_US});omni.define("get_tomatoes_US",function(men,boys,days,women,girls){var tomatoes_US=Math.ceil(((men+0.5*boys)*days*500+(women+0.5*girls)*days*400)/411/4);return tomatoes_US});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Quarantine food takes Women, Men and Girls and returns Apples and Onions. Nothing is looked up on this page: apples is computed from women and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Apples is opened in kilograms; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Quarantine food calculator works', 'html' => <<<'TXT'
            <p>The Quarantine food calculator applies one relationship to 5 numbers and reports Apples, Onions and Carrots.</p><p>The relationship it solves reads Minced meat = get_meatTrays(Men, Boys, Quarantine time, Women, Girls).</p><p>What comes back is Apples, Onions, Carrots and Bell peppers — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 5 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Women</strong> — a plain number, no unit. How many women are in your household?</li><li><strong>Men</strong> — a plain number, no unit. How many men are in your household?</li><li><strong>Girls</strong> — a plain number, no unit. Aged 10 or younger.</li><li><strong>Boys</strong> — a plain number, no unit. Aged 10 or younger.</li><li><strong>Quarantine time</strong> — in days</li></ul><p>The result boxes are Apples in kilograms, Onions in kilograms, Carrots in kilograms, Bell peppers in kilograms, Potatoes in kilograms, Eggs, Bread in loaves, Butter in blocks, Cheese in blocks, Butter in sticks, Cheese in blocks, Milk in liters, Minced meat in trays, Milk in cartons, Minced meat in trays, Crispbread in packs, Oats in packs, Crispbread in packs, Oats in packs, Pasta in packs, Rice in packs, Pasta in packs, Rice in bags, Lentils in packs, Cocoa in packs, Lentils in packs, Cocoa in packs, Almonds in packs, Pickles in pickles, Almonds in packs, Pickles in jars, Honey in jars, Mayo in jars, Honey in bottles, Mayo in jars, Oil in bottles, Oil in bottles, Frozen vegetables in packs, Sweetcorn in cans, Frozen vegetables in packs, Sweetcorn in cans, Tuna in cans, Chickpeas in cans, Tuna in cans, Chickpeas in cans, Tomatoes in cans, Tomatoes in cans; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Apples offers 7 units and opens on kilograms, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Minced meat</strong> = <code>get_meatTrays(Men, Boys, Quarantine time, Women, Girls)</code></li><li><strong>Eggs</strong> = <code>get_eggs(Men, Boys, Quarantine time, Women, Girls)</code></li><li><strong>Butter</strong> = <code>get_butter(Men, Boys, Quarantine time, Women, Girls)</code></li><li><strong>Milk</strong> = <code>get_milk(Men, Boys, Quarantine time, Women, Girls)</code></li><li><strong>Cheese</strong> = <code>get_cheese(Men, Boys, Quarantine time, Women, Girls)</code></li><li><strong>Bread</strong> = <code>get_bread(Men, Boys, Quarantine time, Women, Girls)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Minced meat</strong> = <code>get_meatTrays(Men, Boys, Quarantine time, Women, Girls)</code> — the form to use when Men, Boys, Quarantine time and Women are the values you have.</li><li><strong>Eggs</strong> = <code>get_eggs(Men, Boys, Quarantine time, Women, Girls)</code> — the form to use when Men, Boys, Quarantine time and Women are the values you have.</li><li><strong>Butter</strong> = <code>get_butter(Men, Boys, Quarantine time, Women, Girls)</code> — the form to use when Men, Boys, Quarantine time and Women are the values you have.</li><li><strong>Milk</strong> = <code>get_milk(Men, Boys, Quarantine time, Women, Girls)</code> — the form to use when Men, Boys, Quarantine time and Women are the values you have.</li><li><strong>Cheese</strong> = <code>get_cheese(Men, Boys, Quarantine time, Women, Girls)</code> — the form to use when Men, Boys, Quarantine time and Women are the values you have.</li><li><strong>Bread</strong> = <code>get_bread(Men, Boys, Quarantine time, Women, Girls)</code> — the form to use when Men, Boys, Quarantine time and Women are the values you have.</li><li><strong>Apples</strong> = <code>get_apples(Men, Boys, Quarantine time, Women, Girls)</code> — the form to use when Men, Boys, Quarantine time and Women are the values you have.</li><li><strong>Onions</strong> = <code>get_onions(Men, Boys, Quarantine time, Women, Girls)</code> — the form to use when Men, Boys, Quarantine time and Women are the values you have.</li></ul><p>Any one of Minced meat, Eggs and Butter can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Quarantine time is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Apples, Onions and Carrots are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Women left as a guess.</strong> If Women is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Men left as a guess.</strong> If Men is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> If Women is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Quarantine food form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Women</strong> takes a plain number with no unit attached. How many women are in your household?. The page reads it when it works out Minced meat, Eggs and Butter. Fill it from a measurement rather than a memory — Women is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Men</strong> takes a plain number with no unit attached. How many men are in your household?. The page reads it when it works out Minced meat, Eggs and Butter. Fill it from a measurement rather than a memory — Men is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Girls</strong> takes a plain number with no unit attached. Aged 10 or younger. The page reads it when it works out Minced meat, Eggs and Butter. Fill it from a measurement rather than a memory — Girls is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Boys</strong> takes a plain number with no unit attached. Aged 10 or younger. The page reads it when it works out Minced meat, Eggs and Butter. Fill it from a measurement rather than a memory — Boys is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Quarantine time</strong> is a days quantity: the page opens it in days and converts anything else you pick before the formula runs. The page reads it when it works out Minced meat, Eggs and Butter. Fill it from a measurement rather than a memory — Quarantine time is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. </p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Women, Men, Girls and Boys ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Women — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Apples in kg against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. </p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Apples follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are kilograms and days and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Women, Men and Girls are measured, independent and in the unit the chip says. </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Women, Men and Girls measured, Apples and Onions wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/food/wedding-alcohol">Wedding alcohol Calculator</a>, <a href="/food/yeast-converter">Yeast converter Calculator</a> and <a href="/food/alcohol-by-volume">ABV Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Quarantine food calculator work out?', 'a' => <<<'TXT'
            Apples, Onions, Carrots and Bell peppers, from Men, Boys, Quarantine time and Women. The relationship is Minced meat = get_meatTrays(Men, Boys, Quarantine time, Women, Girls).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Women, Men, Girls, Boys, Quarantine time (days). Enter women, men and girls; Apples is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Minced meat, Eggs, Butter and Milk blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => 'Internally Apples is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Women blank and the page solves for it, reporting Apples instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Apples keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/food/bbq-party', 'name' => 'BBQ party'],
            ['path' => '/food/how-much-ham-per-person', 'name' => 'How much ham per person'],
            ['path' => '/food/turkey-size', 'name' => 'Turkey size']
        ],
    ],
];
