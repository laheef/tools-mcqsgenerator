<?php

/**
 * Thanksgiving Calories
 * /food/thanksgiving-calories
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Thanksgiving Calories',
    'meta' => ['title' => 'Thanksgiving Calories — Free Online Calculator', 'description' => 'Estimate calories and nutrients for a Thanksgiving meal from the selected foods and amounts. Check serving sizes and labels before relying on the estimate.', 'h1' => 'Thanksgiving Calories Calculator', 'updated' => '2026-07-28'],
    'sections' => [
        [
            'title' => 'How much have you eaten?',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cheeseball',
                            'label' => 'Cheeseball w/ nuts',
                            'type' => 'number',
                            'unit' => '122',
                            'unit_default' => 'tbsp',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cheeseball_c',
                            'label' => '... calories',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cheeseball_f',
                            'label' => '... fat',
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
                            'name' => 'crackers',
                            'label' => 'Crackers',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'crackers_c',
                            'label' => '... calories',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'crackers_f',
                            'label' => '... fat',
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
                            'name' => 'potato_chips',
                            'label' => 'Potato chips',
                            'type' => 'number',
                            'help' => 'One chip weighs 0.1 ounce.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'potato_chips_c',
                            'label' => '... calories',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'potato_chips_f',
                            'label' => '... fat',
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
                            'name' => 'onion_dip',
                            'label' => 'Onion dip',
                            'type' => 'number',
                            'unit' => '122',
                            'unit_default' => 'tbsp',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'onion_dip_c',
                            'label' => '... calories',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'onion_dip_f',
                            'label' => '... fat',
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
                            'name' => 'turkey',
                            'label' => 'Roasted turkey (no skin)',
                            'type' => 'number',
                            'help' => '1 slice is roughly 1 oz.',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '113.398', 'when' => null],
                                ['value' => '4', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'turkey_c',
                            'label' => '... calories',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'turkey_f',
                            'label' => '... fat',
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
                            'name' => 'cornbread',
                            'label' => 'Cornbread',
                            'type' => 'number',
                            'suffix' => 'square(s)',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cornbread_c',
                            'label' => '... calories',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cornbread_f',
                            'label' => '... fat',
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
                            'name' => 'bread_stuffing',
                            'label' => 'Bread stuffing',
                            'type' => 'number',
                            'unit' => '122',
                            'unit_default' => 'ukcups',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bread_stuffing_c',
                            'label' => '... calories',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bread_stuffing_f',
                            'label' => '... fat',
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
                            'name' => 'giblet_gravy',
                            'label' => 'Giblet gravy',
                            'type' => 'number',
                            'unit' => '122',
                            'unit_default' => 'ukcups',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.5',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'giblet_gravy_c',
                            'label' => '... calories',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'giblet_gravy_f',
                            'label' => '... fat',
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
                            'name' => 'sweet_potato',
                            'label' => 'Sweet potato casserole',
                            'type' => 'number',
                            'unit' => '122',
                            'unit_default' => 'ukcups',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sweet_potato_c',
                            'label' => '... calories',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sweet_potato_f',
                            'label' => '... fat',
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
                            'name' => 'green_bean',
                            'label' => 'Green bean casserole',
                            'type' => 'number',
                            'unit' => '122',
                            'unit_default' => 'ukcups',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'green_bean_c',
                            'label' => '... calories',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'green_bean_f',
                            'label' => '... fat',
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
                            'name' => 'cranberry_sauce',
                            'label' => 'Cranberry sauce',
                            'type' => 'number',
                            'unit' => '122',
                            'unit_default' => 'ukcups',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.5',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cranberry_sauce_c',
                            'label' => '... calories',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cranberry_sauce_f',
                            'label' => '... fat',
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
                            'name' => 'carrot_raisin_salad',
                            'label' => 'Carrot-raisin salad',
                            'type' => 'number',
                            'unit' => '122',
                            'unit_default' => 'ml',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'carrot_raisin_salad_c',
                            'label' => '... calories',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'carrot_raisin_salad_f',
                            'label' => '... fat',
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
                            'name' => 'tea',
                            'label' => 'Tea (sweet)',
                            'type' => 'number',
                            'unit' => '122',
                            'unit_default' => 'ukcups',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tea_c',
                            'label' => '... calories',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tea_f',
                            'label' => '... fat',
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
                            'name' => 'peacan_pie',
                            'label' => 'Pecan pie',
                            'type' => 'number',
                            'suffix' => ' of a 9" pie',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.125',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'peacan_pie_c',
                            'label' => '... calories',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'peacan_pie_f',
                            'label' => '... fat',
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
                            'name' => 'butter',
                            'label' => 'Butter',
                            'type' => 'number',
                            'unit' => '122',
                            'unit_default' => 'tbsp',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'butter_c',
                            'label' => '... calories',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'butter_f',
                            'label' => '... fat',
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
                            'name' => 'caloriesFatAdv',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Show the calories and fat content of each food item? ' => '1', '' => '0.2'],
                            'dataset' => 'caloriesFat',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'calories',
                            'label' => 'Calories',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fat',
                            'label' => 'Fat',
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
            'title' => 'Burning these calories...',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'your_weight',
                            'label' => 'Your weight',
                            'type' => 'number',
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
                            'name' => 'activity',
                            'label' => 'Activity',
                            'type' => 'select',
                            'options' => [
                                'aerobics' => '6.83',
                                'baseball, softball' => '5',
                                'basketball' => '8',
                                'biking' => '8',
                                'billiards' => '2.5',
                                'black friday shopping' => '2.3',
                                'boating' => '4.64',
                                'bowling' => '3',
                                'climbing, spelunking, caving' => '9.5',
                                'dancing' => '4.5',
                                'equestrian sports' => '5.33',
                                'fencing' => '6',
                                'fishing' => '4.5',
                                'football (american)' => '8',
                                'football (soccer)' => '7',
                                'golfing' => '3.75',
                                'gymnastics' => '4',
                                'hiking' => '6',
                                'hockey' => '8',
                                'ice skating' => '7',
                                'martial arts' => '10',
                                'racquet sports' => '8.5',
                                'rollerblading' => '6',
                                'rugby' => '10',
                                'running' => '7.5',
                                'sex' => '2.8',
                                'skiing, snowboarding' => '7',
                                'sleeping' => '1',
                                'using cardiovascular equipment' => '8',
                                'volleyball' => '5.5',
                                'walking' => '3.8',
                                'watching tv' => '1',
                                'water sports' => '5.22',
                                'weightlifting/strength training' => '3',
                                'wrestling' => '6',
                                'yoga' => '3',
                                'Enter custom MET value' => '',
                            ],
                            'control' => 'DROPDOWN',
                            'default' => 'sex',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'MET',
                            'label' => 'MET',
                            'type' => 'result',
                            'help' => 'Metabolic Equivalent of Task, how much energy you need to spend for every kilogram of your body weight',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'time',
                            'label' => 'Exercise time needed',
                            'type' => 'number',
                            'suffix' => 'hours',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'cheeseball_c = cheeseball * 123',
            'results' => ['cheeseball_c' => '123*cheeseball', 'cheeseball' => '(1/123)*cheeseball_c'],
        ],
        [
            'title' => 'cheeseball_f = cheeseball * 10',
            'results' => ['cheeseball' => '(1/10)*cheeseball_f', 'cheeseball_f' => '10*cheeseball'],
        ],
        [
            'title' => 'crackers_c = crackers * 17.7',
            'results' => ['crackers' => '(10/177)*crackers_c', 'crackers_c' => '(177/10)*crackers'],
        ],
        [
            'title' => 'crackers_f = crackers * 0.7',
            'results' => ['crackers_f' => '(7/10)*crackers', 'crackers' => '(10/7)*crackers_f'],
        ],
        [
            'title' => 'potato_chips_c = potato_chips * 15',
            'results' => ['potato_chips_c' => '15*potato_chips', 'potato_chips' => '(1/15)*potato_chips_c'],
        ],
        [
            'title' => 'potato_chips_f = potato_chips',
            'results' => ['potato_chips_f' => 'potato_chips', 'potato_chips' => 'potato_chips_f'],
        ],
        [
            'title' => 'onion_dip_c = onion_dip * 30',
            'results' => ['onion_dip' => '(1/30)*onion_dip_c', 'onion_dip_c' => '30*onion_dip'],
        ],
        [
            'title' => 'onion_dip_f = onion_dip * 2.5',
            'results' => ['onion_dip_f' => '(5/2)*onion_dip', 'onion_dip' => '(2/5)*onion_dip_f'],
        ],
        [
            'title' => 'turkey_c = turkey * 47.5',
            'results' => ['turkey_c' => '(95/2)*turkey', 'turkey' => '(2/95)*turkey_c'],
        ],
        [
            'title' => 'turkey_f = turkey * 1.5',
            'results' => ['turkey_f' => '(3/2)*turkey', 'turkey' => '(2/3)*turkey_f'],
        ],
        [
            'title' => 'cornbread_c = cornbread * 152',
            'results' => ['cornbread' => '(1/152)*cornbread_c', 'cornbread_c' => '152*cornbread'],
        ],
        [
            'title' => 'cornbread_f = cornbread * 5',
            'results' => ['cornbread' => '(1/5)*cornbread_f', 'cornbread_f' => '5*cornbread'],
        ],
        [
            'title' => 'bread_stuffing_c = bread_stuffing * 355',
            'results' => ['bread_stuffing_c' => '355*bread_stuffing', 'bread_stuffing' => '(1/355)*bread_stuffing_c'],
        ],
        [
            'title' => 'bread_stuffing_f = bread_stuffing * 17',
            'results' => ['bread_stuffing_f' => '17*bread_stuffing', 'bread_stuffing' => '(1/17)*bread_stuffing_f'],
        ],
        [
            'title' => 'giblet_gravy_c = giblet_gravy * 356',
            'results' => ['giblet_gravy' => '(1/356)*giblet_gravy_c', 'giblet_gravy_c' => '356*giblet_gravy'],
        ],
        [
            'title' => 'giblet_gravy_f = giblet_gravy * 26',
            'results' => ['giblet_gravy_f' => '26*giblet_gravy', 'giblet_gravy' => '(1/26)*giblet_gravy_f'],
        ],
        [
            'title' => 'sweet_potato_c = sweet_potato * 276',
            'results' => ['sweet_potato' => '(1/276)*sweet_potato_c', 'sweet_potato_c' => '276*sweet_potato'],
        ],
        [
            'title' => 'sweet_potato_f = sweet_potato * 6',
            'results' => ['sweet_potato' => '(1/6)*sweet_potato_f', 'sweet_potato_f' => '6*sweet_potato'],
        ],
        [
            'title' => 'green_bean_c = green_bean * 143',
            'results' => ['green_bean_c' => '143*green_bean', 'green_bean' => '(1/143)*green_bean_c'],
        ],
        [
            'title' => 'green_bean_f = green_bean * 8',
            'results' => ['green_bean' => '(1/8)*green_bean_f', 'green_bean_f' => '8*green_bean'],
        ],
        [
            'title' => 'cranberry_sauce_c = cranberry_sauce * 418',
            'results' => ['cranberry_sauce_c' => '418*cranberry_sauce', 'cranberry_sauce' => '(1/418)*cranberry_sauce_c'],
        ],
        [
            'title' => 'cranberry_sauce_f = one_way(cranberry_sauce * 0)',
            'results' => ['cranberry_sauce_f' => '(0)'],
        ],
        [
            'title' => 'carrot_raisin_salad_c = carrot_raisin_salad * 419',
            'results' => ['carrot_raisin_salad' => '(1/419)*carrot_raisin_salad_c', 'carrot_raisin_salad_c' => '419*carrot_raisin_salad'],
        ],
        [
            'title' => 'carrot_raisin_salad_f = carrot_raisin_salad * 30',
            'results' => ['carrot_raisin_salad' => '(1/30)*carrot_raisin_salad_f', 'carrot_raisin_salad_f' => '30*carrot_raisin_salad'],
        ],
        [
            'title' => 'tea_c = tea * 37',
            'results' => ['tea_c' => '37*tea', 'tea' => '(1/37)*tea_c'],
        ],
        [
            'title' => 'tea_f = one_way(tea * 0)',
            'results' => ['tea_f' => '(0)'],
        ],
        [
            'title' => 'peacan_pie_c = peacan_pie * 3648',
            'results' => ['peacan_pie' => '(1/3648)*peacan_pie_c', 'peacan_pie_c' => '3648*peacan_pie'],
        ],
        [
            'title' => 'peacan_pie_f = peacan_pie * 168',
            'results' => ['peacan_pie' => '(1/168)*peacan_pie_f', 'peacan_pie_f' => '168*peacan_pie'],
        ],
        [
            'title' => 'butter_c = butter * 102',
            'results' => ['butter_c' => '102*butter', 'butter' => '(1/102)*butter_c'],
        ],
        [
            'title' => 'butter_f = butter * 11',
            'results' => ['butter_f' => '11*butter', 'butter' => '(1/11)*butter_f'],
        ],
        [
            'title' => <<<'TXT'
            calories = one_way(cheeseball_c + crackers_c + potato_chips_c + onion_dip_c + turkey_c + cornbread_c + bread_stuffing_c + giblet_gravy_c + sweet_potato_c + green_bean_c + cranberry_sauce_c + carrot_raisin_salad_c + tea_c + peacan_pie_c + butter_c)
            TXT,
            'results' => ['calories' => <<<'TXT'
            (bread_stuffing_c + butter_c + carrot_raisin_salad_c + cheeseball_c + cornbread_c + crackers_c + cranberry_sauce_c + giblet_gravy_c + green_bean_c + onion_dip_c + peacan_pie_c + potato_chips_c + sweet_potato_c + tea_c + turkey_c)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            fat = one_way(cheeseball_f + crackers_f + potato_chips_f + onion_dip_f + turkey_f + cornbread_f + bread_stuffing_f + giblet_gravy_f + sweet_potato_f + green_bean_f + cranberry_sauce_f + carrot_raisin_salad_f + tea_f + peacan_pie_f + butter_f)
            TXT,
            'results' => ['fat' => <<<'TXT'
            (bread_stuffing_f + butter_f + carrot_raisin_salad_f + cheeseball_f + cornbread_f + crackers_f + giblet_gravy_f + green_bean_f + onion_dip_f + peacan_pie_f + potato_chips_f + sweet_potato_f + turkey_f + 2*(0))
            TXT],
        ],
        [
            'title' => 'time = one_way((calories / (MET * 3.5 * your_weight / 200)) / 60)',
            'results' => ['time' => <<<'TXT'
            ((20/21)*(bread_stuffing_c + butter_c + carrot_raisin_salad_c + cheeseball_c + cornbread_c + crackers_c + cranberry_sauce_c + giblet_gravy_c + green_bean_c + onion_dip_c + peacan_pie_c + potato_chips_c + sweet_potato_c + tea_c + turkey_c)/(MET*your_weight))
            TXT],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Thanksgiving Calories works out MET from Cheeseball w/ nuts,... calories and... fat. There is no hidden constant here: change MET and cheeseball w/ nuts moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Thanksgiving Calories calculator works', 'html' => <<<'TXT'
            <p>The Thanksgiving Calories calculator applies one relationship to 50 numbers and reports MET.</p><p>Written with the labels from the form,... calories = 123 × Cheeseball w/ nuts.</p><p>The answers are MET; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 50 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Cheeseball w/ nuts</strong> — in tablespoons (15 ml)</li><li><strong>... calories</strong> — a plain number, no unit</li><li><strong>... fat</strong> — in grams</li><li><strong>Crackers</strong> — a plain number, no unit</li><li><strong>... calories</strong> — a plain number, no unit</li><li><strong>... fat</strong> — in grams</li><li><strong>Potato chips</strong> — a plain number, no unit. One chip weighs 0.1 ounce.</li><li><strong>... calories</strong> — a plain number, no unit</li><li><strong>... fat</strong> — in grams</li><li><strong>Onion dip</strong> — in tablespoons (15 ml)</li><li><strong>... calories</strong> — a plain number, no unit</li><li><strong>... fat</strong> — in grams</li><li><strong>Roasted turkey (no skin)</strong> — in grams. 1 slice is roughly 1 oz.</li><li><strong>... calories</strong> — a plain number, no unit</li><li><strong>... fat</strong> — in grams</li><li><strong>Cornbread</strong> — in square(s)</li><li><strong>... calories</strong> — a plain number, no unit</li><li><strong>... fat</strong> — in grams</li><li><strong>Bread stuffing</strong> — in UK cups (250 ml)</li><li><strong>... calories</strong> — a plain number, no unit</li><li><strong>... fat</strong> — in grams</li><li><strong>Giblet gravy</strong> — in UK cups (250 ml)</li><li><strong>... calories</strong> — a plain number, no unit</li><li><strong>... fat</strong> — in grams</li><li><strong>Sweet potato casserole</strong> — in UK cups (250 ml)</li><li><strong>... calories</strong> — a plain number, no unit</li><li><strong>... fat</strong> — in grams</li><li><strong>Green bean casserole</strong> — in UK cups (250 ml)</li><li><strong>... calories</strong> — a plain number, no unit</li><li><strong>... fat</strong> — in grams</li><li><strong>Cranberry sauce</strong> — in UK cups (250 ml)</li><li><strong>... calories</strong> — a plain number, no unit</li><li><strong>... fat</strong> — in grams</li><li><strong>Carrot-raisin salad</strong> — in milliliters</li><li><strong>... calories</strong> — a plain number, no unit</li><li><strong>... fat</strong> — in grams</li><li><strong>Tea (sweet)</strong> — in UK cups (250 ml)</li><li><strong>... calories</strong> — a plain number, no unit</li><li><strong>... fat</strong> — in grams</li><li><strong>Pecan pie</strong> — in of a 9&quot; pie</li><li><strong>... calories</strong> — a plain number, no unit</li><li><strong>... fat</strong> — in grams</li><li><strong>Butter</strong> — in tablespoons (15 ml)</li><li><strong>... calories</strong> — a plain number, no unit</li><li><strong>... fat</strong> — in grams</li><li><strong>Calories</strong> — a plain number, no unit</li><li><strong>Fat</strong> — in grams</li><li><strong>Your weight</strong> — in kilograms</li><li><strong>Activity</strong> — a plain number, no unit</li><li><strong>Exercise time needed</strong> — in hours</li></ul><p>The result box is MET. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Calories Fat Adv = 0.2, Your weight = 3 kg and Activity = 2.8; the answers are <strong>... fat</strong> = 0 g and <strong>... fat</strong> = 0 g.</p><ul><li><strong>... fat</strong> = 0 g</li><li><strong>... fat</strong> = 0 g</li></ul><p>The line behind those figures is <strong>... calories</strong> = <code>123 × Cheeseball w/ nuts</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>... fat</strong> = 0 and <strong>... fat</strong> = 0. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Cheeseball w/ nuts lists 14 options and opens on tablespoons (15 ml). </p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>... calories</strong> = <code>123 × Cheeseball w/ nuts</code></li><li><strong>Cheeseball w/ nuts</strong> = <code>(1 ÷ 123) ×... calories</code></li><li><strong>... fat</strong> = <code>10 × Cheeseball w/ nuts</code></li><li><strong>Crackers</strong> = <code>(10 ÷ 177) ×... calories</code></li><li><strong>Potato chips</strong> = <code>(1 ÷ 15) ×... calories</code></li><li><strong>Onion dip</strong> = <code>(1 ÷ 30) ×... calories</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>... calories</strong> = <code>123 × Cheeseball w/ nuts</code> — the form to use when Cheeseball w/ nuts are the values you have.</li><li><strong>Cheeseball w/ nuts</strong> = <code>(1 ÷ 123) ×... calories</code> — the form to use when... calories are the values you have.</li><li><strong>... fat</strong> = <code>10 × Cheeseball w/ nuts</code> — the form to use when Cheeseball w/ nuts are the values you have.</li><li><strong>Cheeseball w/ nuts</strong> = <code>(1 ÷ 10) ×... fat</code> — the form to use when... fat are the values you have.</li><li><strong>... calories</strong> = <code>(177 ÷ 10) × Crackers</code> — the form to use when Crackers are the values you have.</li><li><strong>Crackers</strong> = <code>(10 ÷ 177) ×... calories</code> — the form to use when... calories are the values you have.</li><li><strong>... fat</strong> = <code>(7 ÷ 10) × Crackers</code> — the form to use when Crackers are the values you have.</li><li><strong>Crackers</strong> = <code>(10 ÷ 7) ×... fat</code> — the form to use when... fat are the values you have.</li></ul><p>Any one of... calories, Cheeseball w/ nuts and... fat can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Calories Fat Adv from 0.2 to 0.4, leaving every other box alone. The panel moves from <strong>... fat</strong> 0 g and <strong>... fat</strong> 0 g to <strong>... fat</strong> 0 g and <strong>... fat</strong> 0 g.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Cheeseball w/ nuts,... fat and... fat carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> MET is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Cheeseball w/ nuts left as a guess.</strong> Anything typed into Cheeseball w/ nuts is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>... calories left as a guess.</strong> Anything typed into... calories is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Cheeseball w/ nuts and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Cheeseball w/ nuts,... calories,... fat and Crackers ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Cheeseball w/ nuts — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check MET against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. </p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind MET is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover tablespoons (15 ml) and grams. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Cheeseball w/ nuts,... calories and... fat and the number you are missing is MET.</p><p>If the result seems unexpected, recheck the inputs and units before using it.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/food/chocolate">Chocolate Calculator</a>, <a href="/food/coffee-footprint">Coffee footprint Calculator</a> and <a href="/food/coffee-kick">Coffee kick</a>.</p>
            TXT],
            ['title' => 'Limits and data handling', 'html' => <<<'TXT'
            <p>This calculator applies the relationships and assumptions shown on the page to the values entered. It cannot verify ingredient labels, measurements, equipment or conditions that are not represented in the form. Check the selected units and consult recipe, product or safety instructions where they apply.</p>
            <p>The result is a calculation, not a measurement of the food or drink. Use a scale, thermometer or product label when the real-world quantity or safety status matters.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Thanksgiving Calories is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Cheeseball w/ nuts,... calories,... fat and Crackers beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. </p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Thanksgiving Calories calculator work out?', 'a' => 'MET, from Cheeseball w/ nuts. The relationship is... calories = 123 × Cheeseball w/ nuts.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Cheeseball w/ nuts (tablespoons (15 ml)),... calories,... fat (grams), Crackers,... calories. Fill cheeseball w/ nuts,... calories and... fat and leave MET empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of... calories, Cheeseball w/ nuts,... fat and... calories blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'Are the Thanksgiving Calories results exact?', 'a' => 'No. Nutrition and caffeine vary with brands, recipes, preparation and serving size. Use the product label for a closer estimate; this calculator is not individualized health advice.'],
            ['q' => 'How precise is the result?', 'a' => 'Internally MET is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Cheeseball w/ nuts blank and the page solves for it, reporting MET instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of MET keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/food/thanksgiving', 'name' => 'Thanksgiving'],
            ['path' => '/food/salad-calories', 'name' => 'Salad calories'],
            ['path' => '/food/donut', 'name' => 'Donut']
        ],
    ],
];
