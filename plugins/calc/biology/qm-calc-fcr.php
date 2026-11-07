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
    'meta' => ['title' => 'Feed conversion ratio — Free Online Calculator', 'description' => 'Give the Feed conversion ratio calculator the final animal(s) weight, the weight of milk produced, number of eggs produced and the FCR and it returns…', 'h1' => 'Feed conversion ratio Calculator', 'updated' => '2026-08-06'],
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
        Give the Feed conversion ratio calculator the final animal(s) weight, the weight of milk produced, number of eggs produced and the FCR and it returns <strong>initial animal(s) weight</strong>.
        TXT,
        'sections' => [
            ['title' => 'How does the Feed conversion ratio calculator work?', 'html' => <<<'TXT'
            <p>The Feed conversion ratio calculator takes the values in the form, applies the relationship described below and reports <strong>initial animal(s) weight</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the product type); then you type in the final animal(s) weight, the weight of milk produced, number of eggs produced and the FCR (meat).</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 3 options, such as meat, egg and milk. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>A measured quantity, entered by default in liters. The unit chip switches it to any of the 40 supported units.</li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li><li>A number, expressed in $.</li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li></ul><p>One field on this form is a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Total feed consumed (Feed conversion ratio (FCR))</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>Calculated</td></tr><tr><td><strong>Product type</strong></td><td>One of 3 options, such as meat, egg and milk.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Initial animal(s) weight</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>Calculated</td></tr><tr><td><strong>Final animal(s) weight</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>You supply it</td></tr><tr><td><strong>Total weight gain by the animal(s)</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>Calculated</td></tr><tr><td><strong>Weight of milk produced</strong></td><td>A measured quantity, 40 units available.</td><td>liters</td><td>You supply it</td></tr><tr><td><strong>Weight of eggs produced</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>Calculated</td></tr><tr><td><strong>Number of eggs produced</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>FCR (meat)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>FCR (milk)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>FCR (eggs)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>FCR (per dozen eggs)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Weight of feed bought</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>Calculated</td></tr><tr><td><strong>Expected return</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>Calculated</td></tr><tr><td><strong>Expected return milk</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>You supply it</td></tr><tr><td><strong>Expected return (eggs' weight)</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>Calculated</td></tr><tr><td><strong>Expected return (eggs' number)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Cost of feed per unit weight</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>Calculated</td></tr><tr><td><strong>Total cost of feed</strong></td><td>A number stated in $.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Total feed consumed (Economic FCR)</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>Calculated</td></tr><tr><td><strong>Total weight of the live animals</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>Calculated</td></tr><tr><td><strong>Total weight of animal by-products</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>You supply it</td></tr><tr><td><strong>Total weight of slaughtered animals</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>You supply it</td></tr><tr><td><strong>Economic FCR</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr></tbody></table><p>The table lists the first 24 of 27 fields; the rest follow the same pattern.</p>
            TXT],
            ['title' => 'The formula behind the Feed conversion ratio calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Initial animal(s) weight</span><span class="formula-eq">=</span><span class="formula-rhs">final animal(s) weight − total weight gain by the animal(s)</span></div><div class="formula-row"><span class="formula-lhs">Total weight of the live animals</span><span class="formula-eq">=</span><span class="formula-rhs">total weight of slaughtered animals + total weight of animal by-products</span></div><div class="formula-row"><span class="formula-lhs">Total feed consumed</span><span class="formula-eq">=</span><span class="formula-rhs">economic FCR × total weight of slaughtered animals</span></div><div class="formula-row"><span class="formula-lhs">Technical FCR</span><span class="formula-eq">=</span><span class="formula-rhs">total feed consumed ÷ number of animals that left the farmhouse</span></div><div class="formula-row"><span class="formula-lhs">Total weight gain by the animal(s)</span><span class="formula-eq">=</span><span class="formula-rhs">total feed consumed ÷ FCR (meat)</span></div><div class="formula-row"><span class="formula-lhs">Total feed consumed</span><span class="formula-eq">=</span><span class="formula-rhs">FCR (milk) × weight of milk produced</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Mass, opening in kilograms</li><li>Mass, opening in kilograms</li><li>Mass, opening in kilograms</li><li>Mass, opening in kilograms</li><li>Volume, opening in liters</li><li>Mass, opening in kilograms</li><li>Mass, opening in kilograms</li><li>Mass, opening in kilograms</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Feed conversion ratio calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Supporting a lesson, a lecture or a field note</li><li>Putting a biological quantity into a scale you can picture</li><li>Comparing two organisms, populations or processes</li><li>Any time the same 4 figures keep coming back — the final animal(s) weight, the weight of milk produced and number of eggs produced — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li><li>Round only at the end. </li><li>Write the answer down with its unit. </li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/fertilizer">Fertilizer</a>, <a href="/biology/fish-oil-dosage-for-cats">Fish oil dosage for cats</a> and <a href="/biology/gdu">GDU (growing degree units)</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Feed conversion ratio calculator work out?', 'a' => <<<'TXT'
            It returns initial animal(s) weight, derived from the final animal(s) weight, the weight of milk produced and number of eggs produced. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Feed conversion ratio calculator?', 'a' => <<<'TXT'
            The form asks for the final animal(s) weight, the weight of milk produced, number of eggs produced and the FCR, which is 14 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter total feed consumed (Feed conversion ratio (FCR)) in a different unit?', 'a' => <<<'TXT'
            Yes. Total feed consumed (Feed conversion ratio (FCR)) opens in kilograms and the chip beside it offers 29 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There is one choice to make (1 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'Is the Feed conversion ratio calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/fertilizer', 'name' => 'Fertilizer'],
            ['path' => '/biology/fish-oil-dosage-for-cats', 'name' => 'Fish oil dosage for cats'],
            ['path' => '/biology/gdu', 'name' => 'GDU (growing degree units)'],
        ],
    ],
];
