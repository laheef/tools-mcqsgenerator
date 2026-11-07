<?php

/**
 * Feed conversion ratio
 * /biology/fcr
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Feed conversion ratio',
    'meta' => ['title' => 'Feed conversion ratio Calculator: Units & Formula', 'description' => 'Enter total feed consumed, product type and initial animal(s) weight and Feed conversion ratio returns total weight gain by the animal(s) and FCR (meat).', 'h1' => 'Feed conversion ratio Calculator', 'updated' => '2026-08-06'],
    'raw' => [
        'vars' => [
            'cost_FeedPerWeight' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'economic_fcr' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'eggs_weight' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'expected_return' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'expected_return_NumEggs' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'expected_return_eggs' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'expected_return_milk' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'fcr_NumEggs' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'fcr_eggs' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'fcr_meat' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'fcr_milk' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'final_weight' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'milk_weight' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'numEggs' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'num_of_animals' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'productType' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'Jp7O3jMIJ78bQSGsF1nps', 'c' => null],
                ],
                'ds' => 'eVPx9GJVXKOOpj7B09myG',
            ],
            'starting_weight' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'technical_fcr' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'total_cost_feed' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'total_feed' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'total_feed_economic' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'total_feed_technical' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'total_product' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'total_weight_animal_slaughtered' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'total_weight_animals' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'total_weight_animals_byProducts' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'weight_bought' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'Ke8TuNLAM2rJZv8vvA-NC',
                'title' => 'Feed conversion ratio (FCR)',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'total_feed',
                                    'vt' => 'numerical',
                                    'l' => 'Total feed consumed',
                                    'us' => '22',
                                    'du' => 'kg',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'productType',
                                    'vt' => 'valueSelect',
                                    'l' => 'Product type',
                                    'h' => 'Select the product the animal is being raised for.',
                                    'ds' => 'eVPx9GJVXKOOpj7B09myG',
                                    'opts' => [
                                        ['Jp7O3jMIJ78bQSGsF1nps', 'Meat', '0'],
                                        ['4njmAJhGVDAgsez8dz8BR', 'Egg', '1'],
                                        ['UBuSrDJiMbQBMF2dGbLJA', 'Milk', '2'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'starting_weight',
                                    'vt' => 'numerical',
                                    'l' => 'Initial animal(s) weight',
                                    'us' => '22',
                                    'du' => 'kg',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'final_weight',
                                    'vt' => 'numerical',
                                    'l' => 'Final animal(s) weight',
                                    'us' => '22',
                                    'du' => 'kg',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'total_product',
                                    'vt' => 'numerical',
                                    'l' => 'Total weight gain by the animal(s)',
                                    'us' => '22',
                                    'du' => 'kg',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'milk_weight',
                                    'vt' => 'numerical',
                                    'l' => 'Weight of milk produced',
                                    'us' => '20',
                                    'du' => 'liters',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'eggs_weight',
                                    'vt' => 'numerical',
                                    'l' => 'Weight of eggs produced',
                                    'us' => '22',
                                    'du' => 'kg',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'numEggs', 'vt' => 'numerical', 'l' => 'Number of eggs produced'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'fcr_meat', 'vt' => 'numerical', 'l' => 'FCR (meat)'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'fcr_milk', 'vt' => 'numerical', 'l' => 'FCR (milk)'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'fcr_eggs', 'vt' => 'numerical', 'l' => 'FCR (eggs)'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'fcr_NumEggs', 'vt' => 'numerical', 'l' => 'FCR (per dozen eggs)'],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'U5eqrxtqHHumpGvV-Oi2D',
                'title' => 'Feed cost',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'weight_bought',
                                    'vt' => 'numerical',
                                    'l' => 'Weight of feed bought',
                                    'h' => 'Total weight of the feed purchased.',
                                    'us' => '22',
                                    'du' => 'kg',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'expected_return',
                                    'vt' => 'numerical',
                                    'l' => 'Expected return',
                                    'h' => 'The weight of meat produced.',
                                    'us' => '22',
                                    'du' => 'kg',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'expected_return_milk',
                                    'vt' => 'numerical',
                                    'l' => 'Expected return milk',
                                    'h' => 'The weight of milk produced.',
                                    'us' => '22',
                                    'du' => 'kg',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'expected_return_eggs',
                                    'vt' => 'numerical',
                                    'l' => 'Expected return (eggs\' weight)',
                                    'us' => '22',
                                    'du' => 'kg',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'expected_return_NumEggs', 'vt' => 'numerical', 'l' => 'Expected return (eggs\' number)'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'cost_FeedPerWeight',
                                    'vt' => 'numerical',
                                    'l' => 'Cost of feed per unit weight',
                                    'h' => 'Cost of purchasing a unit weight of the feed.',
                                    'us' => '22',
                                    'du' => 'kg',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'total_cost_feed',
                                    'vt' => 'numerical',
                                    'l' => 'Total cost of feed',
                                    'suf' => '$',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'ZNUEJkmVZLvk1kMHV4C6r',
                'title' => 'Economic FCR',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'total_feed_economic',
                                    'vt' => 'numerical',
                                    'l' => 'Total feed consumed',
                                    'us' => '22',
                                    'du' => 'kg',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'total_weight_animals',
                                    'vt' => 'numerical',
                                    'l' => 'Total weight of the live animals',
                                    'us' => '22',
                                    'du' => 'kg',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'total_weight_animals_byProducts',
                                    'vt' => 'numerical',
                                    'l' => 'Total weight of animal by-products',
                                    'h' => 'By-products include hide &amp; skin, feathers, blood, etc.',
                                    'us' => '22',
                                    'du' => 'kg',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'total_weight_animal_slaughtered',
                                    'vt' => 'numerical',
                                    'l' => 'Total weight of slaughtered animals',
                                    'us' => '22',
                                    'du' => 'kg',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'economic_fcr', 'vt' => 'numerical', 'l' => 'Economic FCR'],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'tz9C6ivq0eC4I3ZwXRPxh',
                'title' => 'Technical FCR',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'total_feed_technical',
                                    'vt' => 'numerical',
                                    'l' => 'Total feed consumed',
                                    'us' => '22',
                                    'du' => 'kg',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'num_of_animals',
                                    'vt' => 'numerical',
                                    'l' => 'Number of animals that left the farmhouse',
                                    'h' => 'Total number of animals that left the farm, including those lost to mortality.',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'technical_fcr', 'vt' => 'numerical', 'l' => 'Technical FCR'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'total_product = final_weight - starting_weight',
                'var' => [
                    [
                        'l' => 'starting_weight',
                        'f' => 'final_weight - total_product',
                        'r' => ['final_weight', 'total_product'],
                    ],
                    [
                        'l' => 'final_weight',
                        'f' => 'starting_weight + total_product',
                        'r' => ['starting_weight', 'total_product'],
                    ],
                    [
                        'l' => 'total_product',
                        'f' => 'final_weight - starting_weight',
                        'r' => ['starting_weight', 'final_weight'],
                    ],
                ],
            ],
            [
                'formula' => 'total_weight_animal_slaughtered = total_weight_animals - total_weight_animals_byProducts',
                'var' => [
                    [
                        'l' => 'total_weight_animals',
                        'f' => 'total_weight_animal_slaughtered + total_weight_animals_byProducts',
                        'r' => ['total_weight_animals_byProducts', 'total_weight_animal_slaughtered'],
                    ],
                    [
                        'l' => 'total_weight_animals_byProducts',
                        'f' => '-total_weight_animal_slaughtered + total_weight_animals',
                        'r' => ['total_weight_animals', 'total_weight_animal_slaughtered'],
                    ],
                    [
                        'l' => 'total_weight_animal_slaughtered',
                        'f' => 'total_weight_animals - total_weight_animals_byProducts',
                        'r' => ['total_weight_animals', 'total_weight_animals_byProducts'],
                    ],
                ],
            ],
            [
                'formula' => 'economic_fcr = total_feed_economic / total_weight_animal_slaughtered',
                'var' => [
                    [
                        'l' => 'total_feed_economic',
                        'f' => 'economic_fcr*total_weight_animal_slaughtered',
                        'r' => ['economic_fcr', 'total_weight_animal_slaughtered'],
                    ],
                    [
                        'l' => 'economic_fcr',
                        'f' => 'total_feed_economic/total_weight_animal_slaughtered',
                        'r' => ['total_feed_economic', 'total_weight_animal_slaughtered'],
                    ],
                    [
                        'l' => 'total_weight_animal_slaughtered',
                        'f' => 'total_feed_economic/economic_fcr',
                        'r' => ['total_feed_economic', 'economic_fcr'],
                    ],
                ],
            ],
            [
                'formula' => 'technical_fcr = total_feed_technical  / num_of_animals',
                'var' => [
                    [
                        'l' => 'technical_fcr',
                        'f' => 'total_feed_technical/num_of_animals',
                        'r' => ['num_of_animals', 'total_feed_technical'],
                    ],
                    [
                        'l' => 'num_of_animals',
                        'f' => 'total_feed_technical/technical_fcr',
                        'r' => ['technical_fcr', 'total_feed_technical'],
                    ],
                    [
                        'l' => 'total_feed_technical',
                        'f' => 'num_of_animals*technical_fcr',
                        'r' => ['technical_fcr', 'num_of_animals'],
                    ],
                ],
            ],
            [
                'formula' => 'fcr_meat = total_feed / total_product',
                'var' => [
                    [
                        'l' => 'total_product',
                        'f' => 'total_feed/fcr_meat',
                        'r' => ['total_feed', 'fcr_meat'],
                    ],
                    [
                        'l' => 'total_feed',
                        'f' => 'fcr_meat*total_product',
                        'r' => ['total_product', 'fcr_meat'],
                    ],
                    [
                        'l' => 'fcr_meat',
                        'f' => 'total_feed/total_product',
                        'r' => ['total_product', 'total_feed'],
                    ],
                ],
            ],
            [
                'formula' => 'fcr_milk = total_feed / milk_weight',
                'var' => [
                    [
                        'l' => 'total_feed',
                        'f' => 'fcr_milk*milk_weight',
                        'r' => ['fcr_milk', 'milk_weight'],
                    ],
                    [
                        'l' => 'fcr_milk',
                        'f' => 'total_feed/milk_weight',
                        'r' => ['total_feed', 'milk_weight'],
                    ],
                    [
                        'l' => 'milk_weight',
                        'f' => 'total_feed/fcr_milk',
                        'r' => ['total_feed', 'fcr_milk'],
                    ],
                ],
            ],
            [
                'formula' => 'fcr_NumEggs = (total_feed * 12) / numEggs',
                'var' => [
                    [
                        'l' => 'total_feed',
                        'f' => '(1/12)*fcr_NumEggs*numEggs',
                        'r' => ['fcr_NumEggs', 'numEggs'],
                    ],
                    [
                        'l' => 'fcr_NumEggs',
                        'f' => '12*total_feed/numEggs',
                        'r' => ['total_feed', 'numEggs'],
                    ],
                    [
                        'l' => 'numEggs',
                        'f' => '12*total_feed/fcr_NumEggs',
                        'r' => ['total_feed', 'fcr_NumEggs'],
                    ],
                ],
            ],
            [
                'formula' => 'fcr_eggs = total_feed / eggs_weight',
                'var' => [
                    [
                        'l' => 'eggs_weight',
                        'f' => 'total_feed/fcr_eggs',
                        'r' => ['total_feed', 'fcr_eggs'],
                    ],
                    [
                        'l' => 'total_feed',
                        'f' => 'eggs_weight*fcr_eggs',
                        'r' => ['eggs_weight', 'fcr_eggs'],
                    ],
                    [
                        'l' => 'fcr_eggs',
                        'f' => 'total_feed/eggs_weight',
                        'r' => ['eggs_weight', 'total_feed'],
                    ],
                ],
            ],
            [
                'formula' => 'total_cost_feed = cost_FeedPerWeight * weight_bought',
                'var' => [
                    [
                        'l' => 'cost_FeedPerWeight',
                        'f' => 'total_cost_feed/weight_bought',
                        'r' => ['weight_bought', 'total_cost_feed'],
                    ],
                    [
                        'l' => 'weight_bought',
                        'f' => 'total_cost_feed/cost_FeedPerWeight',
                        'r' => ['cost_FeedPerWeight', 'total_cost_feed'],
                    ],
                    [
                        'l' => 'total_cost_feed',
                        'f' => 'cost_FeedPerWeight*weight_bought',
                        'r' => ['cost_FeedPerWeight', 'weight_bought'],
                    ],
                ],
            ],
            [
                'formula' => 'expected_return = weight_bought / fcr_meat',
                'var' => [
                    [
                        'l' => 'expected_return',
                        'f' => 'weight_bought/fcr_meat',
                        'r' => ['weight_bought', 'fcr_meat'],
                    ],
                    [
                        'l' => 'weight_bought',
                        'f' => 'expected_return*fcr_meat',
                        'r' => ['expected_return', 'fcr_meat'],
                    ],
                    [
                        'l' => 'fcr_meat',
                        'f' => 'weight_bought/expected_return',
                        'r' => ['expected_return', 'weight_bought'],
                    ],
                ],
            ],
            [
                'formula' => 'expected_return_milk = weight_bought / fcr_milk',
                'var' => [
                    [
                        'l' => 'fcr_milk',
                        'f' => 'weight_bought/expected_return_milk',
                        'r' => ['weight_bought', 'expected_return_milk'],
                    ],
                    [
                        'l' => 'weight_bought',
                        'f' => 'expected_return_milk*fcr_milk',
                        'r' => ['fcr_milk', 'expected_return_milk'],
                    ],
                    [
                        'l' => 'expected_return_milk',
                        'f' => 'weight_bought/fcr_milk',
                        'r' => ['fcr_milk', 'weight_bought'],
                    ],
                ],
            ],
            [
                'formula' => 'expected_return_NumEggs = weight_bought * numEggs / total_feed',
                'var' => [
                    [
                        'l' => 'total_feed',
                        'f' => 'numEggs*weight_bought/expected_return_NumEggs',
                        'r' => ['weight_bought', 'expected_return_NumEggs', 'numEggs'],
                    ],
                    [
                        'l' => 'weight_bought',
                        'f' => 'expected_return_NumEggs*total_feed/numEggs',
                        'r' => ['total_feed', 'expected_return_NumEggs', 'numEggs'],
                    ],
                    [
                        'l' => 'expected_return_NumEggs',
                        'f' => 'numEggs*weight_bought/total_feed',
                        'r' => ['total_feed', 'weight_bought', 'numEggs'],
                    ],
                    [
                        'l' => 'numEggs',
                        'f' => 'expected_return_NumEggs*total_feed/weight_bought',
                        'r' => ['total_feed', 'weight_bought', 'expected_return_NumEggs'],
                    ],
                ],
            ],
            [
                'formula' => 'expected_return_eggs = weight_bought / fcr_eggs',
                'var' => [
                    [
                        'l' => 'expected_return_eggs',
                        'f' => 'weight_bought/fcr_eggs',
                        'r' => ['weight_bought', 'fcr_eggs'],
                    ],
                    [
                        'l' => 'weight_bought',
                        'f' => 'expected_return_eggs*fcr_eggs',
                        'r' => ['expected_return_eggs', 'fcr_eggs'],
                    ],
                    [
                        'l' => 'fcr_eggs',
                        'f' => 'weight_bought/expected_return_eggs',
                        'r' => ['expected_return_eggs', 'weight_bought'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'eVPx9GJVXKOOpj7B09myG' => [
                'name' => 'product_typeDS',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'Jp7O3jMIJ78bQSGsF1nps', 'label' => 'Meat', 'value' => '0'],
                    ['uid' => '4njmAJhGVDAgsez8dz8BR', 'label' => 'Egg', 'value' => '1'],
                    ['uid' => 'UBuSrDJiMbQBMF2dGbLJA', 'label' => 'Milk', 'value' => '2'],
                ],
            ],
        ],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        Feed conversion ratio takes Initial animal(s) weight and Final animal(s) weight and returns Total feed consumed and Total weight gain by the animal(s). There is no hidden constant here: change total feed consumed and initial animal(s) weight moves with it. The main result, Total feed consumed, is reported in kilograms.
        TXT,
        'sections' => [
            ['title' => 'How the Feed conversion ratio calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Feed conversion ratio: it takes 2 numbers and reports Total feed consumed, Total weight gain by the animal(s) and Weight of milk produced.</p><p>In the form&#039;s own words, Total weight gain by the animal(s) = Final animal(s) weight − Initial animal(s) weight.</p><p>The result panel carries Total feed consumed, Total weight gain by the animal(s), Weight of milk produced and Weight of eggs produced, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Initial animal(s) weight</strong> — in kilograms</li><li><strong>Final animal(s) weight</strong> — in kilograms</li></ul><p>The result boxes are Total feed consumed in kilograms, Total weight gain by the animal(s) in kilograms, Weight of milk produced in liters, Weight of eggs produced in kilograms, Number of eggs produced, FCR (meat), FCR (milk), FCR (eggs), FCR (per dozen eggs), Weight of feed bought in kilograms, Expected return in kilograms, Expected return milk in kilograms, Expected return (eggs&#039; weight) in kilograms, Expected return (eggs&#039; number), Cost of feed per unit weight in kilograms, Total cost of feed in $, Total feed consumed in kilograms, Total weight of the live animals in kilograms, Total weight of animal by-products in kilograms, Total weight of slaughtered animals in kilograms, Economic FCR, Total feed consumed in kilograms, Number of animals that left the farmhouse, Technical FCR; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Total feed consumed offers 7 units and opens on kilograms, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Total weight gain by the animal(s)</strong> = <code>Final animal(s) weight − Initial animal(s) weight</code></li><li><strong>Initial animal(s) weight</strong> = <code>Final animal(s) weight − Total weight gain by the animal(s)</code></li><li><strong>Final animal(s) weight</strong> = <code>Initial animal(s) weight + Total weight gain by the animal(s)</code></li><li><strong>Total weight of slaughtered animals</strong> = <code>Total weight of the live animals − Total weight of animal by-products</code></li><li><strong>Total weight of the live animals</strong> = <code>Total weight of slaughtered animals + Total weight of animal by-products</code></li><li><strong>Total weight of animal by-products</strong> = <code>− Total weight of slaughtered animals + Total weight of the live animals</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Total weight gain by the animal(s)</strong> = <code>Final animal(s) weight − Initial animal(s) weight</code> — the form to use when Initial animal(s) weight and Final animal(s) weight are the values you have.</li><li><strong>Initial animal(s) weight</strong> = <code>Final animal(s) weight − Total weight gain by the animal(s)</code> — the form to use when Final animal(s) weight and Total weight gain by the animal(s) are the values you have.</li><li><strong>Final animal(s) weight</strong> = <code>Initial animal(s) weight + Total weight gain by the animal(s)</code> — the form to use when Initial animal(s) weight and Total weight gain by the animal(s) are the values you have.</li><li><strong>Total weight of slaughtered animals</strong> = <code>Total weight of the live animals − Total weight of animal by-products</code> — the form to use when Total weight of the live animals and Total weight of animal by-products are the values you have.</li><li><strong>Total weight of the live animals</strong> = <code>Total weight of slaughtered animals + Total weight of animal by-products</code> — the form to use when Total weight of animal by-products and Total weight of slaughtered animals are the values you have.</li><li><strong>Total weight of animal by-products</strong> = <code>− Total weight of slaughtered animals + Total weight of the live animals</code> — the form to use when Total weight of the live animals and Total weight of slaughtered animals are the values you have.</li><li><strong>Economic FCR</strong> = <code>Total feed consumed ÷ Total weight of slaughtered animals</code> — the form to use when Total feed consumed and Total weight of slaughtered animals are the values you have.</li><li><strong>Total feed consumed</strong> = <code>Economic FCR × Total weight of slaughtered animals</code> — the form to use when Economic FCR and Total weight of slaughtered animals are the values you have.</li></ul><p>Any one of Total weight gain by the animal(s), Initial animal(s) weight and Final animal(s) weight can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Initial animal(s) weight and Final animal(s) weight is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Total feed consumed, Total weight gain by the animal(s) and Weight of milk produced are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Initial animal(s) weight left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Initial animal(s) weight is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Final animal(s) weight left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Final animal(s) weight is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Initial animal(s) weight is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Feed conversion ratio form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Initial animal(s) weight</strong> is a kilograms quantity: the page opens it in kg and converts anything else you pick before the formula runs. It feeds Final animal(s) weight and Total weight gain by the animal(s). Fill it from a measurement rather than a memory — Initial animal(s) weight is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Final animal(s) weight</strong> is a kilograms quantity: the page opens it in kg and converts anything else you pick before the formula runs. It feeds Initial animal(s) weight and Total weight gain by the animal(s). Fill it from a measurement rather than a memory — Final animal(s) weight is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Initial animal(s) weight and Final animal(s) weight ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Initial animal(s) weight — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Total feed consumed in kg against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Total feed consumed follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are kilograms and liters and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Initial animal(s) weight and Final animal(s) weight are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Initial animal(s) weight and Final animal(s) weight is what you already know and Total feed consumed and Total weight gain by the animal(s) is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/trihybrid-cross-punnett-square">Trihybrid cross Punnett square Calculator</a>, <a href="/biology/trypan-blue-cell-viability">Trypan Blue Cell Viability Calculator</a> and <a href="/biology/turtle-tank">Turtle tank Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Feed conversion ratio calculator work out?', 'a' => <<<'TXT'
            Total feed consumed, Total weight gain by the animal(s), Weight of milk produced and Weight of eggs produced, from Initial animal(s) weight and Final animal(s) weight. The relationship is Total weight gain by the animal(s) = Final animal(s) weight − Initial animal(s) weight.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Initial animal(s) weight (kilograms), Final animal(s) weight (kilograms). With initial animal(s) weight and final animal(s) weight in place, Total feed consumed can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Total weight gain by the animal(s), Initial animal(s) weight, Final animal(s) weight and Total weight of slaughtered animals blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Total feed consumed is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Initial animal(s) weight blank and the page solves for it, reporting Total feed consumed instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Total feed consumed at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/trihybrid-cross-punnett-square', 'name' => 'Trihybrid cross Punnett square Calculator'],
            ['path' => '/biology/trypan-blue-cell-viability', 'name' => 'Trypan Blue Cell Viability Calculator'],
            ['path' => '/biology/turtle-tank', 'name' => 'Turtle tank Calculator'],
        ],
        'authors' => [],
    ],
];
