<?php

/**
 * Salad calories
 * /food/salad-calories
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Salad calories',
    'meta' => ['title' => 'Salad calories Calculator: Free, With Steps', 'description' => 'Estimate salad calories and nutrients from ingredient amounts and portions. Check serving sizes and labels before relying on the estimate.', 'h1' => 'Salad calories Calculator', 'updated' => '2026-08-17'],
    'sections' => [
        [
            'title' => 'Lettuce',
            'note' => 'Choose what leafy greens to include in your salad.',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'lettuce1',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Kale' => '1', '' => '0'],
                            'dataset' => 'kale_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'kale_qty',
                            'label' => 'Quantity of kale',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'lettuce2',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Romaine' => '1', '' => '0'],
                            'dataset' => 'romaine_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'romaine_qty',
                            'label' => 'Quantity of romaine lettuce',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'lettuce3',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Spinach' => '1', '' => '0'],
                            'dataset' => 'spinach_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'spinach_qty',
                            'label' => 'Quantity of spinach',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'lettuce4',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Spring mix' => '1', '' => '0'],
                            'dataset' => 'spring_mix_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'spring_mix_qty',
                            'label' => 'Quantity of spring mix lettuce',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'lettuce5',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Iceberg' => '1', '' => '0'],
                            'dataset' => 'iceberg_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'iceberg_qty',
                            'label' => 'Quantity of iceberg lettuce',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Choppings',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'include_veg',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Include vegatables' => '1', '' => '0'],
                            'dataset' => 'veg',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'include_nuts',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Include nuts or seeds' => '1', '' => '0'],
                            'dataset' => 'nuts',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'include_dairy',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Include cheese or eggs' => '1', '' => '0'],
                            'dataset' => 'dairy',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'include_fruit',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Include fruit' => '1', '' => '0'],
                            'dataset' => 'fruit',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'other',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Include other choppings' => '1', '' => '0'],
                            'dataset' => 'other',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'artichoke_check',
                            'label' => 'Vegetables',
                            'type' => 'select',
                            'options' => ['Artichoke hearts' => '1', '' => '0'],
                            'dataset' => 'artichoke_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'artichoke_qty',
                            'label' => 'Quantity of artichokes',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'avocados_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Avocados' => '1', '' => '0'],
                            'dataset' => 'avocados_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'avocados_qty',
                            'label' => 'Quantity of avocados',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bell_peppers_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Bell peppers' => '1', '' => '0'],
                            'dataset' => 'bell_peppers_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bell_peppers_qty',
                            'label' => 'Quantity of bell peppers',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'black_beans_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Black beans' => '1', '' => '0'],
                            'dataset' => 'black_beans',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'black_beans_qty',
                            'label' => 'Quantity of black beans',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'black_olives_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Black olives' => '1', '' => '0'],
                            'dataset' => 'black_olives_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'black_olives_qty',
                            'label' => 'Quantity of black olives',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'broccoli_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Broccoli' => '1', '' => '0'],
                            'dataset' => 'broccoli_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'broccoli_qty',
                            'label' => 'Quantity of broccoli',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'beets_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Beets' => '1', '' => '0'],
                            'dataset' => 'beets_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'beets_qty',
                            'label' => 'Quantity of beets',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'brussels_sprouts_roasted_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Brussels sprouts (roasted)' => '1', '' => '0'],
                            'dataset' => 'brussels_sprouts_roasted_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'brussels_sprouts_roasted_qty',
                            'label' => 'Quantity of roasted brussels sprouts',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'butternut_squash_roasted_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Butternut squash (roasted)' => '1', '' => '0'],
                            'dataset' => 'butternut_squash_rosted_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'butternut_squash_roasted_qty',
                            'label' => 'Quantity of roasted butternut squash',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'carrots_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Carrots' => '1', '' => '0'],
                            'dataset' => 'carrots_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'carrots_qty',
                            'label' => 'Quantity of carrots',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cauliflower_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Cauliflower' => '1', '' => '0'],
                            'dataset' => 'cauliflower_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cauliflower_qty',
                            'label' => 'Quantity of cauliflower',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'celery_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Celery' => '1', '' => '0'],
                            'dataset' => 'celery_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'celery_qty',
                            'label' => 'Quantity of celery',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'chickpeas_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Chickpeas' => '1', '' => '0'],
                            'dataset' => 'chickpeas_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'chickpeas_qty',
                            'label' => 'Quantity of chickpeas',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'corn_roasted_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Corn (roasted)' => '1', '' => '0'],
                            'dataset' => 'corn_roasted_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'corn_roasted_qty',
                            'label' => 'Quantity of roasted corn',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cucumbers_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Cucumbers' => '1', '' => '0'],
                            'dataset' => 'cucumbers_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cucumbers_qty',
                            'label' => 'Quantity of cucumber',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hearts_palm_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Hearts of palm' => '1', '' => '0'],
                            'dataset' => 'hearts_palm_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hearts_palm_qty',
                            'label' => 'Quantity of hearts of palm',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'jalapenos_roasted_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Jalapenos (roasted)' => '1', '' => '0'],
                            'dataset' => 'jalapenos_roasted_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'jalapenos_roasted_qty',
                            'label' => 'Quantity of roasted jalapeños',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'jicama_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Jicama' => '1', '' => '0'],
                            'dataset' => 'jicama_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'jicama_qty',
                            'label' => 'Quantity of jicama',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'kalamata_olives_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Kalamata olives' => '1', '' => '0'],
                            'dataset' => 'kalamata_olives_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'kalamata_olives_qty',
                            'label' => 'Quantity of kalamata olives',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'kidney_beans_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Kidney beans' => '1', '' => '0'],
                            'dataset' => 'kidney_beans_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'kidney_beans_qty',
                            'label' => 'Quantity of kidney beans',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mushrooms_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Mushrooms' => '1', '' => '0'],
                            'dataset' => 'mushrooms_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mushrooms_qty',
                            'label' => 'Quantity of mushrooms',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'peas_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Peas' => '1', '' => '0'],
                            'dataset' => 'peas_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'peas_qty',
                            'label' => 'Quantity of peas',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pepperoncini_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Pepperoncini' => '1', '' => '0'],
                            'dataset' => 'pepperoncini_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pepperoncini_qty',
                            'label' => 'Quantity of pepperoncini',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'radishes_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Radishes' => '1', '' => '0'],
                            'dataset' => 'radishes_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'radishes_qty',
                            'label' => 'Quantity of radishes',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'red_onions_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Red onions' => '1', '' => '0'],
                            'dataset' => 'red_onions_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'red_onions_qty',
                            'label' => 'Quantity of red onions',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'red_peppers_roasted_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Red peppers (roasted)' => '1', '' => '0'],
                            'dataset' => 'red_peppers_roasted_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'red_peppers_roasted_qty',
                            'label' => 'Quantity of roasted red peppers',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'snap_peas_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Snap peas' => '1', '' => '0'],
                            'dataset' => 'snap_peas_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'snap_peas_qty',
                            'label' => 'Quantity of snap peas',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sprouts_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Sprouts' => '1', '' => '0'],
                            'dataset' => 'sprouts_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sprouts_qty',
                            'label' => 'Quantity of sprouts',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sun_dried_tomatoes_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Sun-dried tomatoes' => '1', '' => '0'],
                            'dataset' => 'sun_dried_tomatoes_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sun_dried_tomatoes_qty',
                            'label' => 'Quantity of sun dried tomatoes',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tomatoes_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Tomatoes' => '1', '' => '0'],
                            'dataset' => 'tomatoes_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tomatoes_qty',
                            'label' => 'Quantity of tomatoes',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'almonds_check',
                            'label' => 'Nuts and seeds',
                            'type' => 'select',
                            'options' => ['Almonds' => '1', '' => '0'],
                            'dataset' => 'almonds_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'almonds_qty',
                            'label' => 'Quantity of almonds',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pine_nuts_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Pine nuts' => '1', '' => '0'],
                            'dataset' => 'pine_nuts_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pine_nuts_qty',
                            'label' => 'Quantity of pine nuts',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sunflower_seeds_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Sunflower seeds' => '1', '' => '0'],
                            'dataset' => 'sunflower_seeds_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sunflower_seeds_qty',
                            'label' => 'Quantity of sunflower seeds',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'caramelized_walnuts_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Caramelized walnuts' => '1', '' => '0'],
                            'dataset' => 'caramelized_walnuts_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'caramelized_walnuts_qty',
                            'label' => 'Quantity of caramelized walnuts',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'blue_cheese_check',
                            'label' => 'Cheese and eggs',
                            'type' => 'select',
                            'options' => ['Blue cheese crumbles' => '1', '' => '0'],
                            'dataset' => 'blue_cheese_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'blue_cheese_qty',
                            'label' => 'Quantity of blue cheese',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cheddar_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Cheddar' => '1', '' => '0'],
                            'dataset' => 'cheddar_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cheddar_qty',
                            'label' => 'Quantity of cheddar cheese',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cotija_cheese_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Cotija cheese' => '1', '' => '0'],
                            'dataset' => 'cotija_cheese_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cotija_cheese_qty',
                            'label' => 'Quantity of cotija cheese',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'feta_cheese_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Feta cheese' => '1', '' => '0'],
                            'dataset' => 'feta_cheese_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'feta_cheese_qty',
                            'label' => 'Quantity of feta cheese',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'goat_cheese_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Goat cheese' => '1', '' => '0'],
                            'dataset' => 'goat_cheese_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'goat_cheese_qty',
                            'label' => 'Quantity of goat cheese',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pepper_jack_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Pepper jack' => '1', '' => '0'],
                            'dataset' => 'pepper_jack_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pepper_jack_qty',
                            'label' => 'Quantity of pepper jack cheese',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'provolone_cheese_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Provolone cheese' => '1', '' => '0'],
                            'dataset' => 'provolone_cheese_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'provolone_cheese_qty',
                            'label' => 'Quantity of provolone cheese',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'shaved_parmesan_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Shaved parmesan' => '1', '' => '0'],
                            'dataset' => 'shaved_parmesan_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'shaved_parmesan_qty',
                            'label' => 'Quantity of shaved parmesan',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'eggs_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Hard-boiled eggs' => '1', '' => '0'],
                            'dataset' => 'eggs_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'eggs_qty',
                            'label' => 'Quantity of hard-boiled eggs',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'apples_check',
                            'label' => 'Fruit',
                            'type' => 'select',
                            'options' => ['Apples' => '1', '' => '0'],
                            'dataset' => 'apple_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'apples_qty',
                            'label' => 'Quantity of apples',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dried_cranberries_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Dried cranberries' => '1', '' => '0'],
                            'dataset' => 'dried_cranberries_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dried_cranberries_qty',
                            'label' => 'Quantity of dried cranberries',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'grapes_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Grapes' => '1', '' => '0'],
                            'dataset' => 'grapes_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'grapes_qty',
                            'label' => 'Quantity of grapes',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mandarin_oranges_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Mandarin oranges' => '1', '' => '0'],
                            'dataset' => 'mandarin_oranges_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mandarin_oranges_qty',
                            'label' => 'Quantity of mandarin oranges',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mangos_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Mangos' => '1', '' => '0'],
                            'dataset' => 'mangos_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mangos_qty',
                            'label' => 'Quantity of mangos',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'strawberries_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Strawberries' => '1', '' => '0'],
                            'dataset' => 'strawberries_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'strawberries_qty',
                            'label' => 'Quantity of strawberries',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'anchovies_check',
                            'label' => 'Other choppings',
                            'type' => 'select',
                            'options' => ['Anchovies' => '1', '' => '0'],
                            'dataset' => 'anchovies_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'anchovies_qty',
                            'label' => 'Quantity of anchovies',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bacon_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Bacon' => '1', '' => '0'],
                            'dataset' => 'bacon_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bacon_qty',
                            'label' => 'Quantity of bacon',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'chinese_noodles_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Chinese noodles' => '1', '' => '0'],
                            'dataset' => 'chinese_noodles_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'chinese_noodles_qty',
                            'label' => 'Quantity of Chinese noodles',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'couscous_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Couscous' => '1', '' => '0'],
                            'dataset' => 'couscous_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'couscous_qty',
                            'label' => 'Quantity of couscous',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'croutons_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Croutons' => '1', '' => '0'],
                            'dataset' => 'croutons_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'croutons_qty',
                            'label' => 'Quantity of croutons',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'quinoa_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Quinoa' => '1', '' => '0'],
                            'dataset' => 'quinoa_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'quinoa_qty',
                            'label' => 'Quantity of quinoa',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tortilla_strips_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Tortilla strips' => '1', '' => '0'],
                            'dataset' => 'tortilla_strips_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tortilla_strips_qty',
                            'label' => 'Quantity of tortilla strips',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Proteins',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'include_meat',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Include meat' => '1', '' => '0'],
                            'dataset' => 'meat',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'include_fish',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Include fish' => '1', '' => '0'],
                            'dataset' => 'fish',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tofu_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Baked tofu' => '1', '' => '0'],
                            'dataset' => 'tofu_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tofu_qty',
                            'label' => 'Quantity of tofu',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'grilled_chicken_check',
                            'label' => 'Meat',
                            'type' => 'select',
                            'options' => ['Grilled chicken' => '1', '' => '0'],
                            'dataset' => 'grilled_chicken_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'grilled_chicken_qty',
                            'label' => 'Quantity of grilled chicken',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'chicken_salad_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Chicken salad' => '1', '' => '0'],
                            'dataset' => 'chicken_salad_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'chicken_salad_qty',
                            'label' => 'Quantity of chicken salad',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sonoran_blackened_chicken_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Sonoran blackened chicken' => '1', '' => '0'],
                            'dataset' => 'sonoran_blackened_chicken_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sonoran_blackened_chicken_qty',
                            'label' => 'Quantity of sonoran blackened chicken',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ham_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Ham' => '1', '' => '0'],
                            'dataset' => 'ham_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ham_qty',
                            'label' => 'Quantity of ham',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'turkey_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Turkey' => '1', '' => '0'],
                            'dataset' => 'turkey_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'turkey_qty',
                            'label' => 'Quantity of turkey',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'salami_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Genoa salami' => '1', '' => '0'],
                            'dataset' => 'salami_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'salami_qty',
                            'label' => 'Quantity of salami',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'salmon_check',
                            'label' => 'Fish',
                            'type' => 'select',
                            'options' => ['Oven-baked salmon' => '1', '' => '0'],
                            'dataset' => 'salmon_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'salmon_qty',
                            'label' => 'Quantity of salmon',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'shrimp_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Garlic-herb shrimp' => '1', '' => '0'],
                            'dataset' => 'shrimp_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'shrimp_qty',
                            'label' => 'Quantity of shrimp',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tuna_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Albacore tuna' => '1', '' => '0'],
                            'dataset' => 'tuna_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tuna_qty',
                            'label' => 'Quantity of tuna',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tuna_salad_check',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Albacore tuna salad' => '1', '' => '0'],
                            'dataset' => 'tuna_salad_vs',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tuna_salad_qty',
                            'label' => 'Quantity of tuna salad',
                            'type' => 'result',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Dressings',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dressings',
                            'label' => 'Choose a dressing',
                            'type' => 'select',
                            'options' => [
                                'None' => '0',
                                'Apple cider vinaigrette' => '1',
                                'Balsamic vinaigrette' => '2',
                                'BBQ ranch' => '3',
                                'Classic Caesar' => '4',
                                'Fat-free Caesar' => '5',
                                'Ranch' => '6',
                                'Reduced-calorie ranch' => '7',
                                'Salsa ranch' => '8',
                                'Oil and vinegar' => '9',
                                'Reduced-calorie olive oil vinaigrette' => '10',
                                'Thousand island' => '11',
                            ],
                            'dataset' => 'dressings',
                            'control' => 'DROPDOWN',
                            'default' => 'None',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dressings_qty',
                            'label' => 'Quantity of dressing',
                            'type' => 'number',
                            'suffix' => 'serving(s)',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'hidden',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'calories',
                            'label' => 'Calories',
                            'type' => 'number',
                            'unit' => '44',
                            'unit_default' => 'kcal',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dressing_calories',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dressings_protein',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dressings_fat',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dressings_cholesterol',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dressings_sodium',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dressings_fiber',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dressings_sugars',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dressings_carbs',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Results',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'total_fat', 'label' => 'Total fat', 'type' => 'number', 'readonly' => true],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'total_cholesterol', 'label' => 'Total cholesterol', 'type' => 'number', 'readonly' => true],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'total_sodium', 'label' => 'Total sodium', 'type' => 'number', 'readonly' => true],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'total_carbs', 'label' => 'Total carbs', 'type' => 'number', 'readonly' => true],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'total_fiber', 'label' => 'Total fiber', 'type' => 'number', 'readonly' => true],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'total_sugars', 'label' => 'Total sugars', 'type' => 'number', 'readonly' => true],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'total_protein', 'label' => 'Total protein', 'type' => 'number', 'readonly' => true],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => <<<'TXT'
            calories = one_way(getCalories(kale_qty, romaine_qty, spinach_qty, spring_mix_qty, iceberg_qty, anchovies_qty, broccoli_qty, carrots_qty, grapes_qty, eggs_qty, kidney_beans_qty, mangos_qty, blue_cheese_qty, almonds_qty, artichoke_qty, apples_qty, avocados_qty, chickpeas_qty, bacon_qty, beets_qty, bell_peppers_qty, black_beans_qty, black_olives_qty, butternut_squash_roasted_qty, brussels_sprouts_roasted_qty, cauliflower_qty, celery_qty, chinese_noodles_qty, corn_roasted_qty, croutons_qty, cucumbers_qty, dried_cranberries_qty, hearts_palm_qty, jalapenos_roasted_qty, jicama_qty, kalamata_olives_qty, mandarin_oranges_qty, mushrooms_qty, peas_qty, pepperoncini_qty, radishes_qty, red_onions_qty, red_peppers_roasted_qty, snap_peas_qty, sprouts_qty, sun_dried_tomatoes_qty, strawberries_qty, tomatoes_qty, tortilla_strips_qty, couscous_qty, quinoa_qty, cheddar_qty, cotija_cheese_qty, feta_cheese_qty, goat_cheese_qty, pepper_jack_qty, provolone_cheese_qty, shaved_parmesan_qty, caramelized_walnuts_qty, pine_nuts_qty, sunflower_seeds_qty, shrimp_qty, sonoran_blackened_chicken_qty, chicken_salad_qty, grilled_chicken_qty, turkey_qty, ham_qty, salami_qty, salmon_qty, tofu_qty, tuna_qty, tuna_salad_qty) + dressing_calories * dressings_qty)
            TXT,
            'results' => ['calories' => <<<'TXT'
            (dressing_calories*dressings_qty + getCalories(kale_qty, romaine_qty, spinach_qty, spring_mix_qty, iceberg_qty, anchovies_qty, broccoli_qty, carrots_qty, grapes_qty, eggs_qty, kidney_beans_qty, mangos_qty, blue_cheese_qty, almonds_qty, artichoke_qty, apples_qty, avocados_qty, chickpeas_qty, bacon_qty, beets_qty, bell_peppers_qty, black_beans_qty, black_olives_qty, butternut_squash_roasted_qty, brussels_sprouts_roasted_qty, cauliflower_qty, celery_qty, chinese_noodles_qty, corn_roasted_qty, croutons_qty, cucumbers_qty, dried_cranberries_qty, hearts_palm_qty, jalapenos_roasted_qty, jicama_qty, kalamata_olives_qty, mandarin_oranges_qty, mushrooms_qty, peas_qty, pepperoncini_qty, radishes_qty, red_onions_qty, red_peppers_roasted_qty, snap_peas_qty, sprouts_qty, sun_dried_tomatoes_qty, strawberries_qty, tomatoes_qty, tortilla_strips_qty, couscous_qty, quinoa_qty, cheddar_qty, cotija_cheese_qty, feta_cheese_qty, goat_cheese_qty, pepper_jack_qty, provolone_cheese_qty, shaved_parmesan_qty, caramelized_walnuts_qty, pine_nuts_qty, sunflower_seeds_qty, shrimp_qty, sonoran_blackened_chicken_qty, chicken_salad_qty, grilled_chicken_qty, turkey_qty, ham_qty, salami_qty, salmon_qty, tofu_qty, tuna_qty, tuna_salad_qty))
            TXT],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";var ingredients_dict={"anchovies":{calorie:"30",fat:"2",cholesterol:"15",sodium:"1010",carbohydrates:"0",fiber:"0",sugars:"0",protein:"3"},"apples":{calorie:"32.5",fat:"0.1",cholesterol:"0",sodium:"0.5",carbohydrates:"8.65",fiber:"1.5",sugars:"1.5",protein:"6.5"},"artichoke-hearts":{calorie:"40",fat:"0",cholesterol:"0",sodium:"227",carbohydrates:"4",fiber:"3",sugars:"3",protein:"2"},"avocado":{calorie:"55",fat:"5",cholesterol:"0",sodium:"0",carbohydrates:"3",fiber:"3",sugars:"0",protein:"1"},"chickpeas":{calorie:"5",fat:"0.5",cholesterol:"0",sodium:"250",carbohydrates:"7",fiber:"3",sugars:"0",protein:"4"},"bacon":{calorie:"125",fat:"11.25",cholesterol:"18.75",sodium:"425",carbohydrates:"0",fiber:"0",sugars:"0",protein:"6.25"},"beets":{calorie:"20",fat:"0",cholesterol:"0",sodium:"125",carbohydrates:"4",fiber:"1",sugars:"3",protein:"1"},"bell-peppers":{calorie:"11",fat:"1",cholesterol:"0",sodium:"2",carbohydrates:"2.5",fiber:"1",sugars:"1.5",protein:"0.5"},"black-beans":{calorie:"100",fat:"0.5",cholesterol:"0",sodium:"400",carbohydrates:"19",fiber:"4",sugars:"1",protein:"6"},"black-olives":{calorie:"30",fat:"2.5",cholesterol:"0",sodium:"100",carbohydrates:"1",fiber:"0",sugars:"0",protein:"0"},"broccoli":{calorie:"6.5",fat:"0",cholesterol:"0",sodium:"16",carbohydrates:"0.8",fiber:"1",sugars:"1",protein:"0"},"butternut-squash-roasted":{calorie:"79.2",fat:"1.7",cholesterol:"0",sodium:"96",carbohydrates:"16.4",fiber:"2.8",sugars:"3.1",protein:"1.4"},"brussels-sprouts-roasted":{calorie:"54.3",fat:"2",cholesterol:"0",sodium:"22",carbohydrates:"7.9",fiber:"3.3",sugars:"1.9",protein:"3"},"carrots":{calorie:"25",fat:"0",cholesterol:"0",sodium:"42",carbohydrates:"6",fiber:"1.5",sugars:"3",protein:"0.5"},"cauliflower":{calorie:"12.5",fat:"0",cholesterol:"0",sodium:"15",carbohydrates:"2.5",fiber:"1.5",sugars:"1",protein:"1"},"celery":{calorie:"8",fat:"0",cholesterol:"0",sodium:"40.5",carbohydrates:"1.5",fiber:"1",sugars:"1",protein:"0.5"},"chinese-noodles":{calorie:"119.5",fat:"6.9",cholesterol:"0",sodium:"99",carbohydrates:"12.95",fiber:"0.9",sugars:"0.05",protein:"1"},"corn-roasted":{calorie:"37.3",fat:"0.4",cholesterol:"0",sodium:"0",carbohydrates:"8.2",fiber:"1.1",sugars:"6.8",protein:"1.1"},"croutons":{calorie:"71",fat:"0.79",cholesterol:"0.31",sodium:"148",carbohydrates:"14",fiber:"0",sugars:"0.15",protein:"2"},"cucumber":{calorie:"8",fat:"0.1",cholesterol:"0",sodium:"1",carbohydrates:"1.9",fiber:"0.3",sugars:"0.9",protein:"0.3"},"dried-cranberries":{calorie:"105",fat:"0.4",cholesterol:"0",sodium:"0",carbohydrates:"26",fiber:"1.6",sugars:"23",protein:"0"},"grapes":{calorie:"26",fat:"0",cholesterol:"0",sodium:"1",carbohydrates:"7",fiber:"1",sugars:"6",protein:"1"},"hard-boiled-egg":{calorie:"52.75",fat:"3.6",cholesterol:"144.25",sodium:"42.25",carbohydrates:"0.38",fiber:"0",sugars:"0.38",protein:"4.28"},"hearts-of-palm":{calorie:"12.5",fat:"0.25",cholesterol:"0",sodium:"225",carbohydrates:"2",fiber:"1",sugars:"0",protein:"1"},"jalapeno-roasted":{calorie:"11",fat:"0.6",cholesterol:"0",sodium:"0.75",carbohydrates:"3.9",fiber:"1.9",sugars:"2.3",protein:"0.9"},"jicama":{calorie:"23",fat:"0",cholesterol:"0",sodium:"2",carbohydrates:"5",fiber:"3",sugars:"0",protein:"0"},"kalamata-olives":{calorie:"40",fat:"3.5",cholesterol:"0",sodium:"230",carbohydrates:"2",fiber:"0",sugars:"0",protein:"0"},"kidney-beans":{calorie:"32",fat:"0",cholesterol:"0",sodium:"187",carbohydrates:"6",fiber:"2.5",sugars:"0.7",protein:"2.5"},"mandarin-oranges":{calorie:"35",fat:"0",cholesterol:"0",sodium:"5",carbohydrates:"8.5",fiber:"0.5",sugars:"7",protein:"0.5"},"mango":{calorie:"27",fat:"0",cholesterol:"0",sodium:"8",carbohydrates:"10",fiber:"1",sugars:"9",protein:"4"},"mushrooms":{calorie:"26.5",fat:"0",cholesterol:"0",sodium:"20",carbohydrates:"4",fiber:"1.5",sugars:"0",protein:"4"},"peas":{calorie:"27",fat:"0",cholesterol:"0",sodium:"76",carbohydrates:"4.5",fiber:"1.5",sugars:"1.5",protein:"2"},"pepperoncini":{calorie:"4",fat:"0",cholesterol:"0",sodium:"304",carbohydrates:"1",fiber:"1",sugars:"0",protein:"0"},"radishes":{calorie:"7",fat:"0",cholesterol:"0",sodium:"37",carbohydrates:"2",fiber:"1",sugars:"1",protein:"0"},"red-onion":{calorie:"16",fat:"0.05",cholesterol:"0",sodium:"1.5",carbohydrates:"3.7",fiber:"0.67",sugars:"1.7",protein:"0.45"},"rstd-red-peppers":{calorie:"12.5",fat:"0",cholesterol:"0",sodium:"155",carbohydrates:"2.5",fiber:"0.5",sugars:"2",protein:"0.5"},"snap-peas":{calorie:"9",fat:"0",cholesterol:"0",sodium:"0",carbohydrates:"1.5",fiber:"0.5",sugars:"0.8",protein:"0.6"},"sprouts":{calorie:"2.5",fat:"0",cholesterol:"0",sodium:"0",carbohydrates:"0.5",fiber:"0",sugars:"0",protein:"0.5"},"sun-dried-tomatoes":{calorie:"38",fat:"0",cholesterol:"0",sodium:"26",carbohydrates:"9",fiber:"2.5",sugars:"5",protein:"2.5"},"strawberries":{calorie:"18",fat:"0.2",cholesterol:"0",sodium:"0.7",carbohydrates:"4.25",fiber:"1.1",sugars:"2.5",protein:"0.4"},"tomatoes":{calorie:"17.5",fat:"0.25",cholesterol:"0",sodium:"0.25",carbohydrates:"3.5",fiber:"1",sugars:"2",protein:"0.5"},"tortilla-strips":{calorie:"130",fat:"6.2",cholesterol:"0",sodium:"115",carbohydrates:"18",fiber:"1.2",sugars:"0.25",protein:"2"},"couscous":{calorie:"8",fat:"1",cholesterol:"0",sodium:"5",carbohydrates:"38",fiber:"5",sugars:"0",protein:"2"},"quinoa":{calorie:"80",fat:"1",cholesterol:"0",sodium:"10",carbohydrates:"15",fiber:"1.5",sugars:"0.5",protein:"3"},"blue-cheese-crumbles":{calorie:"110",fat:"8",cholesterol:"20",sodium:"390.25",carbohydrates:"1",fiber:"0",sugars:"0",protein:"6"},"cheddar":{calorie:"115",fat:"12",cholesterol:"33",sodium:"186",carbohydrates:"0",fiber:"0",sugars:"0",protein:"8"},"cotija-cheese":{calorie:"100",fat:"9",cholesterol:"30",sodium:"440",carbohydrates:"0.5",fiber:"0",sugars:"0",protein:"7"},"feta-cheese":{calorie:"96",fat:"10.24",cholesterol:"8",sodium:"560",carbohydrates:"1",fiber:"0",sugars:"0",protein:"8"},"goat-cheese":{calorie:"80",fat:"6",cholesterol:"25",sodium:"80",carbohydrates:"3",fiber:"0",sugars:"1",protein:"5"},"pepper-jack":{calorie:"110",fat:"9",cholesterol:"30",sodium:"170",carbohydrates:"1",fiber:"0",sugars:"0",protein:"7"},"provolone-cheese":{calorie:"100",fat:"8",cholesterol:"25",sodium:"250",carbohydrates:"1",fiber:"0",sugars:"0",protein:"7"},"shaved-parmesan":{calorie:"52.5",fat:"3.5",cholesterol:"10",sodium:"221.5",carbohydrates:"0.5",fiber:"0",sugars:"0",protein:"4.75"},"almonds":{calorie:"60",fat:"5",cholesterol:"0",sodium:"0",carbohydrates:"1.5",fiber:"0.8",sugars:"0.8",protein:"2"},"caramelized-walnuts":{calorie:"191.6",cholesterol:"3",sodium:"0",fat:"17.1",carbohydrates:"8.55",fiber:"0",sugars:"6.4",protein:"4"},"pine-nuts":{calorie:"45",fat:"4",cholesterol:"0",sodium:"5",carbohydrates:"1",fiber:"1",sugars:"0.5",protein:"1"},"sunflower-seeds":{calorie:"85",fat:"11",cholesterol:"0",sodium:"52.5",carbohydrates:"3",fiber:"1.5",sugars:"0.5",protein:"2.5"},"garlic-herb-shrimp":{calorie:"71.3",fat:"4.2",cholesterol:"68",sodium:"314.7",carbohydrates:"0",fiber:"0.33",sugars:"0",protein:"8"},"sonoran-blackened-chicken":{calorie:"185",fat:"7.2",cholesterol:"88",sodium:"264",carbohydrates:"0",fiber:"0",sugars:"0",protein:"28.8"},"grilled-chicken":{calorie:"185",fat:"7.2",cholesterol:"88",sodium:"164",carbohydrates:"0",fiber:"0",sugars:"0",protein:"28.8"},"turkey":{calorie:"75",fat:"0.63",cholesterol:"25",sodium:"425",carbohydrates:"0",fiber:"0",sugars:"0",protein:"15"},"ham":{calorie:"75",fat:"1.25",cholesterol:"37.5",sodium:"725",carbohydrates:"2.5",fiber:"0",sugars:"2.5",protein:"12.5"},"genoa-salami":{calorie:"237.5",cholesterol:"62.5",sodium:"1150",fat:"18.75",carbohydrates:"1.25",fiber:"0",sugars:"0",protein:"15"},"oven-baked-salmon":{calorie:"140",fat:"15",cholesterol:"60",sodium:"65",carbohydrates:"0",fiber:"0",sugars:"0",protein:"23"},"baked-tofu":{calorie:"73.3",fat:"3.5",cholesterol:"0",sodium:"341.7",carbohydrates:"2.33",fiber:"0",sugars:"0",protein:"15"},"albacore-tuna":{calorie:"120",fat:"0",cholesterol:"80",sodium:"110",carbohydrates:"0",fiber:"0",sugars:"0",protein:"12.5"},"albacore-tuna-salad":{calorie:"254",fat:"18",cholesterol:"64",sodium:"214",carbohydrates:"1.5",fiber:"0.6",sugars:"1",protein:"15"},"chicken-salad":{calorie:"301",fat:"13.5",cholesterol:"96.5",sodium:"319",carbohydrates:"0.25",fiber:"0.13",sugars:"0.06",protein:"23"},"kale":{calorie:"50",fat:"0.91",cholesterol:"0",sodium:"38",carbohydrates:"8.98",fiber:"3.66",sugars:"2.28",protein:"4.24"},"romaine":{calorie:"20",fat:"0",cholesterol:"0",sodium:"53",carbohydrates:"4",fiber:"1.3",sugars:"0",protein:"0"},"spring-mix":{calorie:"18.75",fat:"0",cholesterol:"0",sodium:"50",carbohydrates:"3.75",fiber:"2.6",sugars:"1.25",protein:"1.25"},"spinach":{calorie:"23.3",fat:"0",cholesterol:"0",sodium:"76",carbohydrates:"3.5",fiber:"2",sugars:"0",protein:"2.3"},"iceberg":{calorie:"20",fat:"0.25",cholesterol:"0",sodium:"15",carbohydrates:"4",fiber:"1.75",sugars:"2.75",protein:"1.25"}};var ingredient_list=["kale","romaine","spinach","spring-mix","iceberg","anchovies","broccoli","carrots","grapes","hard-boiled-egg","kidney-beans","mango","blue-cheese-crumbles","almonds","artichoke-hearts","apples","avocado","chickpeas","bacon","beets","bell-peppers","black-beans","black-olives","butternut-squash-roasted","brussels-sprouts-roasted","cauliflower","celery","chinese-noodles","corn-roasted","croutons","cucumber","dried-cranberries","hearts-of-palm","jalapeno-roasted","jicama","kalamata-olives","mandarin-oranges","mushrooms","peas","pepperoncini","radishes","red-onion","rstd-red-peppers","snap-peas","sprouts","sun-dried-tomatoes","strawberries","tomatoes","tortilla-strips","couscous","quinoa","cheddar","cotija-cheese","feta-cheese","goat-cheese","pepper-jack","provolone-cheese","shaved-parmesan","caramelized-walnuts","pine-nuts","sunflower-seeds","garlic-herb-shrimp","sonoran-blackened-chicken","chicken-salad","grilled-chicken","turkey","ham","genoa-salami","oven-baked-salmon","baked-tofu","albacore-tuna","albacore-tuna-salad"];omni.define("getCalories",function(){var total_calories=0;for(var i=0;i<arguments.length;i++){total_calories+=Number(ingredients_dict[ingredient_list[i]].calorie)*(i<0||arguments.length<=i?undefined:arguments[i])}return total_calories});omni.onResult(["almonds_qty","anchovies_qty","apples_qty","artichoke_qty","avocados_qty","bacon_qty","beets_qty","bell_peppers_qty","black_beans_qty","black_olives_qty","blue_cheese_qty","broccoli_qty","brussels_sprouts_roasted_qty","butternut_squash_roasted_qty","caramelized_walnuts_qty","carrots_qty","cauliflower_qty","celery_qty","cheddar_qty","chicken_salad_qty","chickpeas_qty","chinese_noodles_qty","corn_roasted_qty","cotija_cheese_qty","couscous_qty","croutons_qty","cucumbers_qty","dressing_calories","dressings_protein","dressings_qty","dried_cranberries_qty","eggs_qty","feta_cheese_qty","goat_cheese_qty","grapes_qty","grilled_chicken_qty","ham_qty","hearts_palm_qty","iceberg_qty","jalapenos_roasted_qty","jicama_qty","kalamata_olives_qty","kale_qty","kidney_beans_qty","mandarin_oranges_qty","mangos_qty","mushrooms_qty","peas_qty","pepper_jack_qty","pepperoncini_qty","pine_nuts_qty","provolone_cheese_qty","quinoa_qty","radishes_qty","red_onions_qty","red_peppers_roasted_qty","romaine_qty","salami_qty","salmon_qty","shaved_parmesan_qty","shrimp_qty","snap_peas_qty","sonoran_blackened_chicken_qty","spinach_qty","spring_mix_qty","sprouts_qty","strawberries_qty","sun_dried_tomatoes_qty","sunflower_seeds_qty","tofu_qty","tomatoes_qty","tortilla_strips_qty","tuna_qty","tuna_salad_qty","turkey_qty"],function(ctx,values){var almonds_qty=values.almonds_qty,anchovies_qty=values.anchovies_qty,apples_qty=values.apples_qty,artichoke_qty=values.artichoke_qty,avocados_qty=values.avocados_qty,bacon_qty=values.bacon_qty,beets_qty=values.beets_qty,bell_peppers_qty=values.bell_peppers_qty,black_beans_qty=values.black_beans_qty,black_olives_qty=values.black_olives_qty,blue_cheese_qty=values.blue_cheese_qty,broccoli_qty=values.broccoli_qty,brussels_sprouts_roasted_qty=values.brussels_sprouts_roasted_qty,butternut_squash_roasted_qty=values.butternut_squash_roasted_qty,caramelized_walnuts_qty=values.caramelized_walnuts_qty,carrots_qty=values.carrots_qty,cauliflower_qty=values.cauliflower_qty,celery_qty=values.celery_qty,cheddar_qty=values.cheddar_qty,chicken_salad_qty=values.chicken_salad_qty,chickpeas_qty=values.chickpeas_qty,chinese_noodles_qty=values.chinese_noodles_qty,corn_roasted_qty=values.corn_roasted_qty,cotija_cheese_qty=values.cotija_cheese_qty,couscous_qty=values.couscous_qty,croutons_qty=values.croutons_qty,cucumbers_qty=values.cucumbers_qty,dressings_fat=values.dressings_fat,dressings_protein=values.dressings_protein,dressings_cholesterol=values.dressings_cholesterol,dressings_sodium=values.dressings_sodium,dressings_carbs=values.dressings_carbs,dressings_fiber=values.dressings_fiber,dressings_sugars=values.dressings_sugars,dressings_qty=values.dressings_qty,dried_cranberries_qty=values.dried_cranberries_qty,eggs_qty=values.eggs_qty,feta_cheese_qty=values.feta_cheese_qty,goat_cheese_qty=values.goat_cheese_qty,grapes_qty=values.grapes_qty,grilled_chicken_qty=values.grilled_chicken_qty,ham_qty=values.ham_qty,hearts_palm_qty=values.hearts_palm_qty,iceberg_qty=values.iceberg_qty,jalapenos_roasted_qty=values.jalapenos_roasted_qty,jicama_qty=values.jicama_qty,kalamata_olives_qty=values.kalamata_olives_qty,kale_qty=values.kale_qty,kidney_beans_qty=values.kidney_beans_qty,mandarin_oranges_qty=values.mandarin_oranges_qty,mangos_qty=values.mangos_qty,mushrooms_qty=values.mushrooms_qty,peas_qty=values.peas_qty,pepper_jack_qty=values.pepper_jack_qty,pepperoncini_qty=values.pepperoncini_qty,pine_nuts_qty=values.pine_nuts_qty,provolone_cheese_qty=values.provolone_cheese_qty,quinoa_qty=values.quinoa_qty,radishes_qty=values.radishes_qty,red_onions_qty=values.red_onions_qty,red_peppers_roasted_qty=values.red_peppers_roasted_qty,romaine_qty=values.romaine_qty,salami_qty=values.salami_qty,salmon_qty=values.salmon_qty,shaved_parmesan_qty=values.shaved_parmesan_qty,shrimp_qty=values.shrimp_qty,snap_peas_qty=values.snap_peas_qty,sonoran_blackened_chicken_qty=values.sonoran_blackened_chicken_qty,spinach_qty=values.spinach_qty,spring_mix_qty=values.spring_mix_qty,sprouts_qty=values.sprouts_qty,strawberries_qty=values.strawberries_qty,sun_dried_tomatoes_qty=values.sun_dried_tomatoes_qty,sunflower_seeds_qty=values.sunflower_seeds_qty,tofu_qty=values.tofu_qty,tomatoes_qty=values.tomatoes_qty,tortilla_strips_qty=values.tortilla_strips_qty,tuna_qty=values.tuna_qty,tuna_salad_qty=values.tuna_salad_qty,turkey_qty=values.turkey_qty;var qty_list=[kale_qty,romaine_qty,spinach_qty,spring_mix_qty,iceberg_qty,anchovies_qty,broccoli_qty,carrots_qty,grapes_qty,eggs_qty,kidney_beans_qty,mangos_qty,blue_cheese_qty,almonds_qty,artichoke_qty,apples_qty,avocados_qty,chickpeas_qty,bacon_qty,beets_qty,bell_peppers_qty,black_beans_qty,black_olives_qty,butternut_squash_roasted_qty,brussels_sprouts_roasted_qty,cauliflower_qty,celery_qty,chinese_noodles_qty,corn_roasted_qty,croutons_qty,cucumbers_qty,dried_cranberries_qty,hearts_palm_qty,jalapenos_roasted_qty,jicama_qty,kalamata_olives_qty,mandarin_oranges_qty,mushrooms_qty,peas_qty,pepperoncini_qty,radishes_qty,red_onions_qty,red_peppers_roasted_qty,snap_peas_qty,sprouts_qty,sun_dried_tomatoes_qty,strawberries_qty,tomatoes_qty,tortilla_strips_qty,couscous_qty,quinoa_qty,cheddar_qty,cotija_cheese_qty,feta_cheese_qty,goat_cheese_qty,pepper_jack_qty,provolone_cheese_qty,shaved_parmesan_qty,caramelized_walnuts_qty,pine_nuts_qty,sunflower_seeds_qty,shrimp_qty,sonoran_blackened_chicken_qty,chicken_salad_qty,grilled_chicken_qty,turkey_qty,ham_qty,salami_qty,salmon_qty,tofu_qty,tuna_qty,tuna_salad_qty];var total_fat=0,total_cholesterol=0,total_sodium=0,total_carbs=0,total_fiber=0,total_sugars=0,total_protein=0;for(var i=0;i<ingredient_list.length;i++){total_fat+=Number(ingredients_dict[ingredient_list[i]].fat)*qty_list[i];total_cholesterol+=Number(ingredients_dict[ingredient_list[i]].cholesterol)*qty_list[i];total_sodium+=Number(ingredients_dict[ingredient_list[i]].sodium)*qty_list[i];total_carbs+=Number(ingredients_dict[ingredient_list[i]].carbohydrates)*qty_list[i];total_fiber+=Number(ingredients_dict[ingredient_list[i]].fiber)*qty_list[i];total_sugars+=Number(ingredients_dict[ingredient_list[i]].sugars)*qty_list[i];total_protein+=Number(ingredients_dict[ingredient_list[i]].protein)*qty_list[i]}total_fat+=dressings_fat*dressings_qty;total_cholesterol+=dressings_cholesterol*dressings_qty;total_sodium+=dressings_sodium*dressings_qty;total_carbs+=dressings_carbs*dressings_qty;total_fiber+=dressings_fiber*dressings_qty;total_sugars+=dressings_sugars*dressings_qty;total_protein+=dressings_protein*dressings_qty;ctx.exportValue("total_fat",mathjs.round(total_fat,1));ctx.exportValue("total_cholesterol",mathjs.round(total_cholesterol,1));ctx.exportValue("total_sodium",mathjs.round(total_sodium,1));ctx.exportValue("total_carbs",mathjs.round(total_carbs,1));ctx.exportValue("total_fiber",mathjs.round(total_fiber,1));ctx.exportValue("total_sugars",mathjs.round(total_sugars,1));ctx.exportValue("total_protein",mathjs.round(total_protein,1));return});//# sourceURL=customJs.js
    /*
     * Shared helpers for the hand-written repairs in data/calc/supplement/.
     *
     * Every supplement script is evaluated in its own closed scope, so anything the
     * repairs have in common has to travel with each one. Supplement::apply()
     * prepends this file to every page script it merges.
     */
    
    /**
     * The numbers in one free-text box: "1, 2, 3", "1 2 3", "1;2;3" or one per line.
     *
     * A statistics page that asked for fifty separate boxes now asks for one, and
     * the visitor types a list the way they would in a spreadsheet cell. Anything
     * that is not a number is ignored rather than turned into NaN — a stray comma
     * or an accidental letter must not poison the whole set.
     */
    function snumlist(text) {
      if (typeof text !== 'string' || text.trim() === '') return [];
      var out = [];
      text.split(/[\s,;]+/).forEach(function (piece) {
        if (piece === '') return;
        var n = Number(piece.replace(/(\d),(?=\d{3}\b)/g, '$1'));
        if (isFinite(n)) out.push(n);
      });
      return out;
    }
    
    /** Median of an already sorted array of numbers. */
    function smedian(sorted) {
      var n = sorted.length;
      if (!n) return NaN;
      var mid = Math.floor(n / 2);
      return n % 2 ? sorted[mid] : (sorted[mid - 1] + sorted[mid]) / 2;
    }
    
    /** The numbers a visitor actually typed, in field order, skipping blanks. */
    function snumbers(values, pattern, limit) {
      var out = [];
      for (var i = 1; i <= limit; i++) {
        var key = pattern.replace('%d', i);
        var raw = values[key];
        if (raw === undefined || raw === null || raw === '') continue;
        var n = Number(raw);
        if (!isFinite(n)) continue;
        out.push({ key: key, n: n });
      }
      return out;
    }
    
    /** A plain number, no trailing zeros, at most `d` decimals. */
    function snum(n, d) {
      if (!isFinite(n)) return '—';
      var v = Number(n.toFixed(d === undefined ? 4 : d));
      return String(v);
    }
    
    /** Round to `d` decimals but keep it a number. */
    function sround(n, d) {
      var f = Math.pow(10, d === undefined ? 2 : d);
      return Math.round(n * f) / f;
    }
    
    /** Greatest common divisor of two whole numbers. */
    function sgcd(x, y) {
      x = Math.abs(Math.round(x));
      y = Math.abs(Math.round(y));
      return y === 0 ? x : sgcd(y, x % y);
    }
    
    /** "10" / "1/3" — a fraction reduced to lowest terms. */
    function sfrac(part, whole) {
      if (!whole) return '—';
      var a = Math.round(part), b = Math.round(whole);
      var g = sgcd(a, b) || 1;
      if (g > 1) { a = a / g; b = b / g; }
      return b === 1 ? String(a) : a + '/' + b;
    }
    
    /** Minimal escape for text that came out of the definition or a label. */
    function sesc(s) {
      return String(s).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
    }
    
    /**
     * A table from a header list and rows of cells. Cells are printed as they are
     * given, so a caller can pass a pre-formatted string.
     */
    function stable(head, rows, foot) {
      var html = '<table><thead><tr>';
      head.forEach(function (h) { html += '<th>' + h + '</th>'; });
      html += '</tr></thead><tbody>';
      rows.forEach(function (r) {
        html += '<tr>';
        r.forEach(function (c) { html += '<td>' + c + '</td>'; });
        html += '</tr>';
      });
      if (foot) {
        html += '<tr>';
        foot.forEach(function (c) { html += '<th>' + c + '</th>'; });
        html += '</tr>';
      }
      return html + '</tbody></table>';
    }
    
    /** Turn a list of [label, value] pairs into "A: 3, B: 4" style prose. */
    function slist(pairs) {
      return pairs.map(function (p) { return p[0] + ': ' + p[1]; }).join(', ');
    }
    
    /**
     * Tidy a value a page script published.
     *
     * The harvested scripts speak the reference site's front-end dialect: `==2==`
     * for a subscript, `**bold**`, `<br>` between lines, and often a trailing
     * comma or a dangling colon left where a second half of a sentence used to
     * follow. Our panel prints the string as plain text, so those markers would
     * land on screen as punctuation soup. This turns them into something readable
     * without changing the value itself.
     */
    function sclean(value) {
      var s = value === null || value === undefined ? '' : String(value);
      var sub = {'0': '₀', '1': '₁', '2': '₂', '3': '₃', '4': '₄',
                 '5': '₅', '6': '₆', '7': '₇', '8': '₈', '9': '₉'};
      s = s.replace(/==(\d+)==/g, function (all, d) {
        return d.split('').map(function (c) { return sub[c] || c; }).join('');
      });
      /* the same convention for superscripts: "^^+^^" is a charge, "^^2^^" an index */
      var sup = {'0': '⁰', '1': '¹', '2': '²', '3': '³', '4': '⁴',
                 '5': '⁵', '6': '⁶', '7': '⁷', '8': '⁸', '9': '⁹',
                 '+': '⁺', '-': '⁻'};
      s = s.replace(/\^\^([0-9+-]+)\^\^/g, function (all, d) {
        return d.split('').map(function (c) { return sup[c] || c; }).join('');
      });
      s = s.replace(/\*\*(.+?)\*\*/g, '$1');
      s = s.replace(/<br\s*\/?>/gi, ' ');
      s = s.replace(/<\/(p|div|li)>/gi, ' ');
      s = s.replace(/<[^>]+>/g, '');
      s = s.replace(/&nbsp;/g, ' ').replace(/&lt;/g, '<').replace(/&gt;/g, '>').replace(/&amp;/g, '&');
      /* invisible characters the reference used as "this line is blank": an Arabic
         letter mark, a zero-width space, a byte-order mark. They render as nothing
         and would otherwise keep an empty row looking filled. */
      s = s.replace(/[\u061C\u200B\u200C\u200D\uFEFF\u00AD]/g, '');
      s = s.replace(/\s+/g, ' ').trim();
      s = s.replace(/[,;:\-–—]\s*$/, '').trim();
      return s;
    }
    
    /**
     * Turn a drop-down option's id back into its label.
     *
     * Several harvested scripts publish `ctx.getRawInput("…")` of a select, which
     * is the option's uid (`z3nTqAbVhlMSz-B46c7Xk`) and not the words the visitor
     * picked. The uid is in the page markup as an option value or a radio value,
     * so the label is one lookup away.
     */
    function sdelabel(value) {
      if (typeof value !== 'string' || !/[A-Za-z0-9_-]{20,28}/.test(value)) { return value; }
      var one = function (id) {
        if (!/^[A-Za-z0-9_-]{20,28}$/.test(id)) { return id; }
        var el = document.querySelector('[value="' + id + '"]');
        if (!el) { return id; }
        if (el.tagName === 'OPTION') { return (el.textContent || '').trim() || id; }
        var lab = el.closest ? el.closest('label') : null;
        return lab ? ((lab.textContent || '').trim() || id) : id;
      };
      /* a published value can be several ids joined by commas ("Possibilities,
         MD4, NTLM"), so map each piece rather than the whole string */
      return value.split(/\s*,\s*/).map(one).join(', ');
    }
    
    /* The page hook has already run by the time this one does, so the values
       below are its results: tidy the reference site's markup out of them
       before they reach the panel. */
    omni.onResult([], function (ctx, values) {
      var rows = [
        'total_fat',
        'total_cholesterol',
        'total_sodium',
        'total_carbs',
        'total_fiber',
        'total_sugars',
        'total_protein'
      ];
      rows.forEach(function (name) {
        var v = values[name];
        if (typeof v !== 'string' || v.trim() === '') { return; }
        var text = sclean(sdelabel(v));
        ctx.exportValue(name, text === '' ? null : text);
      });
    });
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Salad calories works out Quantity of kale and Quantity of romaine lettuce from Vegetables, Nuts and seeds and Cheese and eggs. The arithmetic is the whole method: quantity of kale is worked out from vegetables by one formula, applied once. Quantity of kale comes back in serving(s) unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Salad calories calculator works', 'html' => <<<'TXT'
            <p>Salad calories answers one question from 9 numbers, and the answer is Quantity of kale, Quantity of romaine lettuce and Quantity of spinach.</p><p>What comes back is Quantity of kale, Quantity of romaine lettuce, Quantity of spinach and Quantity of spring mix lettuce — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 9 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Vegetables</strong> — a plain number, no unit</li><li><strong>Nuts and seeds</strong> — a plain number, no unit</li><li><strong>Cheese and eggs</strong> — a plain number, no unit</li><li><strong>Fruit</strong> — a plain number, no unit</li><li><strong>Other choppings</strong> — a plain number, no unit</li><li><strong>Meat</strong> — a plain number, no unit</li><li><strong>Fish</strong> — a plain number, no unit</li><li><strong>Choose a dressing</strong> — a plain number, no unit</li><li><strong>Quantity of dressing</strong> — in serving(s)</li></ul><p>The result boxes are Quantity of kale in serving(s), Quantity of romaine lettuce in serving(s), Quantity of spinach in serving(s), Quantity of spring mix lettuce in serving(s), Quantity of iceberg lettuce in serving(s), Quantity of artichokes in serving(s), Quantity of avocados in serving(s), Quantity of bell peppers in serving(s), Quantity of black beans in serving(s), Quantity of black olives in serving(s), Quantity of broccoli in serving(s), Quantity of beets in serving(s), Quantity of roasted brussels sprouts in serving(s), Quantity of roasted butternut squash in serving(s), Quantity of carrots in serving(s), Quantity of cauliflower in serving(s), Quantity of celery in serving(s), Quantity of chickpeas in serving(s), Quantity of roasted corn in serving(s), Quantity of cucumber in serving(s), Quantity of hearts of palm in serving(s), Quantity of roasted jalapeños in serving(s), Quantity of jicama in serving(s), Quantity of kalamata olives in serving(s), Quantity of kidney beans in serving(s), Quantity of mushrooms in serving(s), Quantity of peas in serving(s), Quantity of pepperoncini in serving(s), Quantity of radishes in serving(s), Quantity of red onions in serving(s), Quantity of roasted red peppers in serving(s), Quantity of snap peas in serving(s), Quantity of sprouts in serving(s), Quantity of sun dried tomatoes in serving(s), Quantity of tomatoes in serving(s), Quantity of almonds in serving(s), Quantity of pine nuts in serving(s), Quantity of sunflower seeds in serving(s), Quantity of caramelized walnuts in serving(s), Quantity of blue cheese in serving(s), Quantity of cheddar cheese in serving(s), Quantity of cotija cheese in serving(s), Quantity of feta cheese in serving(s), Quantity of goat cheese in serving(s), Quantity of pepper jack cheese in serving(s), Quantity of provolone cheese in serving(s), Quantity of shaved parmesan in serving(s), Quantity of hard-boiled eggs in serving(s), Quantity of apples in serving(s), Quantity of dried cranberries in serving(s), Quantity of grapes in serving(s), Quantity of mandarin oranges in serving(s), Quantity of mangos in serving(s), Quantity of strawberries in serving(s), Quantity of anchovies in serving(s), Quantity of bacon in serving(s), Quantity of Chinese noodles in serving(s), Quantity of couscous in serving(s), Quantity of croutons in serving(s), Quantity of quinoa in serving(s), Quantity of tortilla strips in serving(s), Quantity of tofu in serving(s), Quantity of grilled chicken in serving(s), Quantity of chicken salad in serving(s), Quantity of sonoran blackened chicken in serving(s), Quantity of ham in serving(s), Quantity of turkey in serving(s), Quantity of salami in serving(s), Quantity of salmon in serving(s), Quantity of shrimp in serving(s), Quantity of tuna in serving(s), Quantity of tuna salad in serving(s), Total fat, Total cholesterol, Total sodium, Total carbs, Total fiber, Total sugars, Total protein; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Quantity of kale is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => '<p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Quantity of kale, Quantity of romaine lettuce and Quantity of spinach are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Vegetables left as a guess.</strong> Anything typed into Vegetables is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Nuts and seeds left as a guess.</strong> Anything typed into Nuts and seeds is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Cheese and eggs left as a guess.</strong> Anything typed into Cheese and eggs is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Vegetables and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Vegetables</strong> takes a plain number with no unit attached. Check the field label and unit before calculating.</li><li><strong>Nuts and seeds</strong> takes a plain number with no unit attached. Check the field label and unit before calculating.</li><li><strong>Cheese and eggs</strong> takes a plain number with no unit attached. Check the field label and unit before calculating.</li><li><strong>Fruit</strong> takes a plain number with no unit attached. Check the field label and unit before calculating.</li><li><strong>Other choppings</strong> takes a plain number with no unit attached. Check the field label and unit before calculating.</li><li><strong>Meat</strong> takes a plain number with no unit attached. Check the field label and unit before calculating.</li><li><strong>Fish</strong> takes a plain number with no unit attached. Check the field label and unit before calculating.</li><li><strong>Choose a dressing</strong> takes a plain number with no unit attached. Check the field label and unit before calculating.</li><li><strong>Quantity of dressing</strong> is measured in serving(s). It feeds Calories. Check the field label and unit before calculating.</li></ul><p>None of the boxes has to be filled in a particular order. </p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Quantity of kale is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Vegetables, Nuts and seeds and Cheese and eggs is what you already know and Quantity of kale and Quantity of romaine lettuce is what you need — the reverse of that situation is what the rearranged form is for.</p><p>If the result seems unexpected, recheck the inputs and units before using it.</p><p>Related calculators: <a href="/food/thanksgiving-calories">Thanksgiving Calories</a>, <a href="/food/thanksgiving">Thanksgiving</a> and <a href="/food/donut">Donut</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Salad calories calculator work out?', 'a' => <<<'TXT'
            Quantity of kale, Quantity of romaine lettuce, Quantity of spinach and Quantity of spring mix lettuce, from Dressing calories, Quantity of dressing, Quantity of kale and Quantity of romaine lettuce.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Vegetables, Nuts and seeds, Cheese and eggs, Fruit, Other choppings. Fill vegetables, nuts and seeds and cheese and eggs and leave Quantity of kale empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Quantity of kale is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            Every box has to have a number in it. What this page returns is Quantity of kale, so an empty input simply leaves the result blank rather than choosing a new unknown.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Quantity of kale keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/food/thanksgiving-calories', 'name' => 'Thanksgiving Calories'],
            ['path' => '/food/thanksgiving', 'name' => 'Thanksgiving'],
            ['path' => '/food/donut', 'name' => 'Donut']
        ],
    ],
];
