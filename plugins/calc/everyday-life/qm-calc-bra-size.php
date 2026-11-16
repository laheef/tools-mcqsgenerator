<?php

/**
 * Bra size
 * /everyday-life/bra-size
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Bra size',
    'meta' => ['title' => 'Bra size Calculator: Formula, Steps & Examples', 'description' => 'Enter enter measurements in..., underbust and bust and Bra size returns difference and S-M-L. Every box can be solved for, not only the one in the title.', 'h1' => 'Bra size Calculator', 'updated' => '2026-06-05'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        Find your perfect fit in seconds. Just choose your units (cm or in), enter your underbust and bust measurements, and get your size instantly. The calculator supports US, UK, and EU sizing standards.
                        TXT],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Bust girth measurements',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'units_select',
                            'label' => 'Enter measurements in...',
                            'type' => 'select',
                            'options' => ['cm' => '0', 'in' => '1'],
                            'dataset' => 'unitsDS',
                            'defaults' => [
                                ['value' => 'cm', 'when' => null],
                                ['value' => 'in', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => 'bra_size/measuring-bust-for-bra-size.png'],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'underbust',
                            'label' => 'Underbust',
                            'type' => 'number',
                            'help' => 'Wrap the tape measure just under your bust — make sure it lays firmly on your skin.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'bust_measurement',
                            'label' => 'Bust',
                            'type' => 'number',
                            'help' => 'Measure loosely around the fullest part of your bust.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'difference',
                            'label' => 'Difference',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bra_size',
                            'label' => 'S-M-L',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Sizes',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => null, 'text' => 'US bra size:'],
                                ['when' => null, 'text' => '{{bra_size_US.formattedValue}}&nbsp;'],
                                ['when' => 'Cup_size_US == 1', 'text' => 'AA'],
                                ['when' => 'Cup_size_US == 2', 'text' => 'A'],
                                ['when' => 'Cup_size_US == 3', 'text' => 'B'],
                                ['when' => 'Cup_size_US == 4', 'text' => 'C'],
                                ['when' => 'Cup_size_US == 5', 'text' => 'D'],
                                ['when' => 'Cup_size_US == 6', 'text' => 'E or DD'],
                                ['when' => 'Cup_size_US == 7', 'text' => 'F or DDD'],
                                ['when' => 'Cup_size_US == 8', 'text' => 'G or DDDD'],
                                ['when' => 'Cup_size_US == 9', 'text' => 'H'],
                                ['when' => 'Cup_size_US == 10', 'text' => 'I'],
                                ['when' => 'Cup_size_US == 11', 'text' => 'J'],
                                ['when' => 'Cup_size_US == 12', 'text' => 'K'],
                                ['when' => 'Cup_size_US == 13', 'text' => 'L'],
                                ['when' => 'Cup_size_US == 14', 'text' => 'M'],
                                ['when' => 'Cup_size_US == 15', 'text' => 'N'],
                                ['when' => 'Cup_size_US == 16', 'text' => 'O'],
                                ['when' => 'Cup_size_US == 17', 'text' => 'P'],
                                ['when' => 'Cup_size_US == 18', 'text' => 'Q'],
                                ['when' => 'Cup_size_US == 19', 'text' => 'R'],
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
                                ['when' => null, 'text' => 'EU bra size:'],
                                ['when' => null, 'text' => '{{bra_size_EU.formattedValue}}&nbsp;'],
                                ['when' => 'Cup_size_EU == 1', 'text' => 'AA'],
                                ['when' => 'Cup_size_EU == 2', 'text' => 'A'],
                                ['when' => 'Cup_size_EU == 3', 'text' => 'B'],
                                ['when' => 'Cup_size_EU == 4', 'text' => 'C'],
                                ['when' => 'Cup_size_EU == 5', 'text' => 'D'],
                                ['when' => 'Cup_size_EU == 6', 'text' => 'E'],
                                ['when' => 'Cup_size_EU == 7', 'text' => 'F'],
                                ['when' => 'Cup_size_EU == 8', 'text' => 'G'],
                                ['when' => 'Cup_size_EU == 9', 'text' => 'H'],
                                ['when' => 'Cup_size_EU == 10', 'text' => 'I'],
                                ['when' => 'Cup_size_EU == 11', 'text' => 'J'],
                                ['when' => 'Cup_size_EU == 12', 'text' => 'K'],
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
                                ['when' => null, 'text' => 'UK bra size:'],
                                ['when' => null, 'text' => '{{bra_size_UK.formattedValue}}&nbsp;'],
                                ['when' => 'Cup_size_UK_AU == 1', 'text' => 'AA'],
                                ['when' => 'Cup_size_UK_AU == 2', 'text' => 'A'],
                                ['when' => 'Cup_size_UK_AU == 3', 'text' => 'B'],
                                ['when' => 'Cup_size_UK_AU == 4', 'text' => 'C'],
                                ['when' => 'Cup_size_UK_AU == 5', 'text' => 'D'],
                                ['when' => 'Cup_size_UK_AU == 6', 'text' => 'DD'],
                                ['when' => 'Cup_size_UK_AU == 7', 'text' => 'E'],
                                ['when' => 'Cup_size_UK_AU == 8', 'text' => 'F'],
                                ['when' => 'Cup_size_UK_AU == 9', 'text' => 'FF'],
                                ['when' => 'Cup_size_UK_AU == 10', 'text' => 'G'],
                                ['when' => 'Cup_size_UK_AU == 11', 'text' => 'GG'],
                                ['when' => 'Cup_size_UK_AU == 12', 'text' => 'H'],
                                ['when' => 'Cup_size_UK_AU == 13', 'text' => 'HH'],
                                ['when' => 'Cup_size_UK_AU == 14', 'text' => 'J'],
                                ['when' => 'Cup_size_UK_AU == 15', 'text' => 'JJ'],
                                ['when' => 'Cup_size_UK_AU == 16', 'text' => 'K'],
                                ['when' => 'Cup_size_UK_AU == 17', 'text' => 'KK'],
                                ['when' => 'Cup_size_UK_AU == 18', 'text' => 'L'],
                                ['when' => 'Cup_size_UK_AU == 19', 'text' => 'LL'],
                                ['when' => 'Cup_size_UK_AU == 20', 'text' => 'M'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'display_sister_size',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Display sister size charts' => '0', '' => '1'],
                            'dataset' => 'sister_sizesDS',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Sister sizes in the US chart'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Sister sizes in Europe chart'],
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
                            'name' => 'bra_size_US',
                            'label' => 'Bra size',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Cup_size_US',
                            'label' => 'Cup size',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bra_size_EU',
                            'label' => 'Bra size',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Cup_size_EU',
                            'label' => 'Cup size',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bra_size_UK',
                            'label' => 'Bra size',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Cup_size_UK_AU',
                            'label' => 'Cup size',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'underbust_m',
                            'label' => 'Underbust m',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bust_m',
                            'label' => 'Bust m',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
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
                            'name' => 'my_size',
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
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'my_size == 32 or my_size == 23 or my_size == 14', 'text' => 'The volume of your cup (one of your breasts) is 0.51 US pt (240&nbsp;cm³). The weight of your bust is 0.95&nbsp;lbs (0.43&nbsp;kg).'],
                                ['when' => 'my_size == 42 or my_size == 33 or my_size == 24 or my_size == 15', 'text' => 'The volume of your cup (one of your breasts) is 0.66&nbsp;US&nbsp;pt (310&nbsp;cm³). The weight of your bust is 1.2 lbs (0.56&nbsp;kg).'],
                                ['when' => 'my_size == 52 or my_size == 43 or my_size == 34 or my_size == 25 or my_size == 16', 'text' => 'The volume of your cup (one of your breasts) is 0.82 US pt (390&nbsp;cm³). The weight of your bust is 1.5&nbsp;lbs (0.7&nbsp;kg).'],
                                ['when' => 'my_size == 62 or my_size == 53 or my_size == 44 or my_size == 35 or my_size == 26 or my_size == 17', 'text' => 'The volume of your cup (one of your breasts) is 1.0 US pt (480 cm³). The weight of your bust is 1.9 lbs (0.86&nbsp;kg).'],
                                ['when' => 'my_size == 72 or my_size == 63 or my_size == 54 or my_size == 45 or my_size == 36 or my_size == 27 or my_size == 18', 'text' => 'The volume of your cup (one of your breasts) is 1.2 US pt (590&nbsp;cm³). The weight of your bust is 2.4 lbs (1.1&nbsp;kg).'],
                                ['when' => 'my_size == 82 or my_size == 73 or my_size == 64 or my_size == 55 or my_size == 46 or my_size == 37 or my_size == 28 or my_size == 19', 'text' => 'The volume of your cup (one of your breasts) is 1.5 US pt (710&nbsp;cm³). The weight of your bust is 2.9 lbs (1.3&nbsp;kg).'],
                                ['when' => 'my_size == 92 or my_size == 83 or my_size == 74 or my_size == 65 or my_size == 56 or my_size == 47 or my_size == 38 or my_size == 29 or my_size == 30', 'text' => 'The volume of your cup (one of your breasts) is 1.8 US pt (850 cm³). The weight of your bust is 3.3&nbsp;lbs (1.5&nbsp;kg).'],
                                ['when' => 'my_size == 93 or my_size == 84 or my_size == 75 or my_size == 66 or my_size == 57 or my_size == 48 or my_size == 39 or my_size == 40 or my_size == 21', 'text' => 'The volume of your cup (one of your breasts) is 2.1 US pt (1000 cm³). The weight of your bust is 4.0&nbsp;lbs (1.8 kg).'],
                                ['when' => 'my_size == 94 or my_size == 85 or my_size == 76 or my_size == 67 or my_size == 58 or my_size == 49 or my_size == 50 or my_size == 31 or my_size == 22', 'text' => 'The volume of your cup (one of your breasts) is 2.5 US pt (1180 cm³). The weight of your bust is 4.6&nbsp;lbs (2.1&nbsp;kg).'],
                                ['when' => <<<'TXT'
                                (my_size == 95 or my_size == 86 or my_size == 77 or my_size == 68 or my_size == 59 or my_size == 60 or my_size == 41 or my_size == 32 or my_size == 23) and Cup_size_US == 2
                                TXT, 'text' => 'The volume of your cup (one of your breasts) is 0.51 US pt (240 cm³). The weight of your bust is 0.95&nbsp;lbs (0.43&nbsp;kg).'],
                                ['when' => 'my_size == 95 or my_size == 86 or my_size == 77 or my_size == 68 or my_size == 59 or my_size == 60 or my_size == 41 or my_size == 32 or my_size == 23', 'text' => 'The volume of your cup (one of your breasts) is 2.9 US pt (1370 cm³). The weight of your bust is 5.5 lbs (2.5&nbsp;kg).'],
                                ['when' => <<<'TXT'
                                (my_size == 96 or my_size == 87 or my_size == 78 or my_size == 69 or my_size == 70 or my_size == 51 or my_size == 42 or my_size == 33 or my_size == 24) and Cup_size_US == 3
                                TXT, 'text' => 'The volume of your cup (one of your breasts) is 0.66 US pt (310 cm³). The weight of your bust is 1.2 lbs (0.56&nbsp;kg).'],
                                ['when' => 'my_size == 96 or my_size == 87 or my_size == 78 or my_size == 69 or my_size == 70 or my_size == 51 or my_size == 42 or my_size == 33 or my_size == 24', 'text' => 'The volume of your cup (one of your breasts) is 3.3 US pt (1580 cm³). The weight of your bust is 6.2 lbs (2.8&nbsp;kg).'],
                                ['when' => 'isIn(my_size, 97, 88, 79, 80, 61, 52, 43, 34, 25)', 'text' => 'The volume of your cup (one of your breasts) is 3.8 US pt (1810 cm³). The weight of your bust is 7.3 lbs (3.3&nbsp;kg).'],
                                ['when' => 'my_size == 98 or my_size == 89 or my_size == 90 or my_size == 71 or my_size == 62 or my_size == 53 or my_size == 44.001 or my_size == 35', 'text' => 'The volume of your cup (one of your breasts) is 4.4 US pt (2060 cm³). The weight of your bust is 8.2 lbs (3.7&nbsp;kg).'],
                                ['when' => '(my_size == 99 or my_size == 100 or my_size == 81 or my_size == 72 or my_size == 63 or my_size == 54 or my_size == 45) and Cup_size_US == 4', 'text' => 'The volume of your cup (one of your breasts) is 1.0 US pt (480 cm³). The weight of your bust is 1.9 lbs (0.86&nbsp;kg).'],
                                ['when' => 'my_size == 99 or my_size == 100 or my_size == 81 or my_size == 72 or my_size == 63 or my_size == 54 or my_size == 45', 'text' => 'The volume of your cup (one of your breasts) is 4.9 US pt (2340 cm³). The weight of your bust is 9.3 lbs (4.2 kg).'],
                                ['when' => '(my_size == 110 or my_size == 91 or my_size == 82 or my_size == 73 or my_size == 64 or my_size == 55) and Cup_size_US == 5', 'text' => 'The volume of your cup (one of your breasts) is 0.82 US pt (390 cm³). The weight of your bust is 1.5 lbs (0.7&nbsp;kg).'],
                                ['when' => 'my_size == 110 or my_size == 91 or my_size == 82 or my_size == 73 or my_size == 64 or my_size == 55', 'text' => 'The volume of your cup (one of your breasts) is 5.6 US pt (2640 cm³). The weight of your bust is 11 lbs (4.8&nbsp;kg).'],
                                ['when' => 'my_size == 101 or my_size == 92 or my_size == 83 or my_size == 74 or my_size == 65', 'text' => 'The volume of your cup (one of your breasts) is 6.3 US pt (3000 cm³). The weight of your bust is 12 lbs (5.3&nbsp;kg).'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'bra_size= get_category(underbust_m)',
            'results' => ['bra_size' => 'get_category(get_underbust_meter(underbust, units_select))'],
        ],
        [
            'title' => 'bra_size_US= get_category_US(underbust_m)',
            'results' => ['bra_size_US' => 'get_category_US(get_underbust_meter(underbust, units_select))'],
        ],
        [
            'title' => 'bra_size_EU= get_category_EU(underbust_m)',
            'results' => ['bra_size_EU' => 'get_category_EU(get_underbust_meter(underbust, units_select))'],
        ],
        [
            'title' => 'difference = one_way(bust_m - underbust_m)',
            'results' => ['difference' => '(get_bust_meter(bust_measurement, units_select) - get_underbust_meter(underbust, units_select))'],
        ],
        [
            'title' => 'Cup_size_US = get_category_cup_US(difference)',
            'results' => ['Cup_size_US' => 'get_category_cup_US((get_bust_meter(bust_measurement, units_select) - get_underbust_meter(underbust, units_select)))'],
        ],
        [
            'title' => 'Cup_size_UK_AU = get_category_cup_UK(difference)',
            'results' => ['Cup_size_UK_AU' => 'get_category_cup_UK((get_bust_meter(bust_measurement, units_select) - get_underbust_meter(underbust, units_select)))'],
        ],
        [
            'title' => 'Cup_size_EU = get_category_cup_EU(difference)',
            'results' => ['Cup_size_EU' => 'get_category_cup_EU((get_bust_meter(bust_measurement, units_select) - get_underbust_meter(underbust, units_select)))'],
        ],
        [
            'title' => 'bra_size_UK= get_category_US(underbust_m)',
            'results' => ['bra_size_UK' => 'get_category_US(get_underbust_meter(underbust, units_select))'],
        ],
        [
            'title' => 'underbust_m = get_underbust_meter(underbust, units_select)',
            'results' => ['underbust_m' => 'get_underbust_meter(underbust, units_select)'],
        ],
        [
            'title' => 'bust_m = get_bust_meter(bust_measurement, units_select)',
            'results' => ['bust_m' => 'get_bust_meter(bust_measurement, units_select)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("get_underbust_meter",function(underbust_input,units_select){var underbust_m;if(units_select==0){underbust_m=underbust_input/100}else if(units_select==1){underbust_m=underbust_input*2.54/100}return underbust_m});omni.define("get_bust_meter",function(bust_input,units_select){var bust_m;if(units_select==0){bust_m=bust_input/100}else if(units_select==1){bust_m=bust_input*2.54/100}return bust_m});omni.define("get_category",function(size){if(size<=0.7366){return 1}else if(size<=0.7874){return 2}else if(size<=0.7112){return 3}else if(size<=0.8382){return 4}else if(size<=0.889){return 5}else if(size<=0.9398){return 6}else if(size<=0.9906){return 7}else if(size<=1.0414){return 8}else if(size<=1.0922){return 9}else{return 10}});omni.define("get_category_US",function(size){if(size<=0.7366){return 28}else if(size<=0.7874){return 30}else if(size<=0.7112){return 32}else if(size<=0.8382){return 34}else if(size<=0.889){return 36}else if(size<=0.9398){return 38}else if(size<=0.9906){return 40}else if(size<=1.0414){return 42}else if(size<=1.0922){return 44}else{return 46}});omni.define("get_category_EU",function(size){if(size<=0.625){return 60}else if(size<=0.675){return 65}else if(size<=0.725){return 70}else if(size<=0.775){return 75}else if(size<=0.825){return 80}else if(size<=0.875){return 85}else if(size<=0.925){return 90}else if(size<=0.975){return 95}else if(size<=1.025){return 100}else{return 105}});omni.define("get_category_cup_UK",function(difference){if(difference<0.0254){return 1}else if(difference<0.0508){return 2}else if(difference<0.0762){return 3}else if(difference<0.1016){return 4}else if(difference<0.127){return 5}else if(difference<0.1524){return 6}else if(difference<0.1778){return 7}else if(difference<0.2032){return 8}else if(difference<0.2286){return 9}else if(difference<0.254){return 10}else if(difference<0.2794){return 11}else if(difference<0.3048){return 12}else if(difference<0.3302){return 13}else if(difference<0.3556){return 14}else if(difference<0.381){return 15}else if(difference<0.4064){return 16}else if(difference<0.4318){return 17}else if(difference<0.4572){return 18}else if(difference<0.4826){return 19}else{return 20}});omni.define("get_category_cup_US",function(difference){if(difference<0.0254){return 1}else if(difference<0.0508){return 2}else if(difference<0.0762){return 3}else if(difference<0.1016){return 4}else if(difference<0.127){return 5}else if(difference<0.1524){return 6}else if(difference<0.1778){return 7}else if(difference<0.2032){return 8}else if(difference<0.2286){return 9}else if(difference<0.254){return 10}else if(difference<0.2794){return 11}else if(difference<0.3048){return 12}else if(difference<0.3302){return 13}else if(difference<0.3556){return 14}else if(difference<0.381){return 15}else if(difference<0.4064){return 16}else if(difference<0.4318){return 17}else if(difference<0.4572){return 18}else{return 19}});omni.define("get_category_cup_EU",function(difference){if(difference<0.11){return 1}else if(difference<0.13){return 2}else if(difference<0.15){return 3}else if(difference<0.17){return 4}else if(difference<0.19){return 5}else if(difference<0.21){return 6}else if(difference<0.23){return 7}else if(difference<0.25){return 8}else if(difference<0.27){return 9}else if(difference<0.29){return 10}else if(difference<0.31){return 11}else{return 12}});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => '<strong>S-M-L</strong> is what the Bra size calculator works out, and it gets there from the underbust and the bust.',
        'sections' => [
            ['title' => 'How does the Bra size calculator work?', 'html' => <<<'TXT'
            <p>The Bra size calculator takes the values in the form, applies the relationship described below and reports <strong>S-M-L</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case; then you type in the underbust and the bust.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 2 options, such as cm and in. </li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li><li>A single on/off switch — tick it for &ldquo;Display sister size charts&rdquo;, leave it clear for the other case. It changes which relationship the calculator applies, not just a multiplier.</li></ul><p>2 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Underbust</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Bust</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Difference</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Bra size (Hidden variables)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Cup size (Hidden variables)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Bra size (Hidden variables)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Cup size (Hidden variables)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Bra size (Hidden variables)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Cup size (Hidden variables)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Underbust m</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Bust m</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Bra size calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">S-M-L</span><span class="formula-eq">=</span><span class="formula-rhs">((underbust, enter measurements in...))</span></div><div class="formula-row"><span class="formula-lhs">Bra size</span><span class="formula-eq">=</span><span class="formula-rhs">((underbust, enter measurements in...))</span></div><div class="formula-row"><span class="formula-lhs">Difference</span><span class="formula-eq">=</span><span class="formula-rhs">((bust, enter measurements in...) − (underbust, enter measurements in...))</span></div><div class="formula-row"><span class="formula-lhs">Cup size</span><span class="formula-eq">=</span><span class="formula-rhs">(((bust, enter measurements in...) − (underbust, enter measurements in...)))</span></div><div class="formula-row"><span class="formula-lhs">Underbust m</span><span class="formula-eq">=</span><span class="formula-rhs">(underbust, enter measurements in...)</span></div><div class="formula-row"><span class="formula-lhs">Bust m</span><span class="formula-eq">=</span><span class="formula-rhs">(bust, enter measurements in...)</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Bra size calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Testing how sensitive an answer is to one input</li><li>Turning a rough idea into a number you can act on</li><li>Checking a figure someone else quoted</li><li>Any time the same 2 figures keep coming back — the underbust and the bust — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Bra size calculator, these are the ones that matter:</p>
            <ul><li>The 2 drop-downs on this page offer a fixed list of cases. A value that is not on the list cannot be entered, and the nearest option is not always a good substitute.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/shoelace-length">Shoelace length</a>, <a href="/everyday-life/shower-cost">Shower cost</a> and <a href="/everyday-life/sidereal-time">Sidereal time</a>.</p>
            TXT],
            ['title' => 'Taking measurements and understanding the result', 'html' => <<<'TXT'
            <p>This calculator uses underbust and bust measurements to suggest a bra-size label in the selected unit and regional conventions. Take the underbust measurement around the ribcage where the band will sit, keeping the tape level and comfortably snug. Measure the bust around the fullest part without compressing tissue. Use the unit option that matches your tape; entering inches as though they were centimeters is a major scale error. If possible, measure more than once and record the original values before looking at the converted result.</p>
            <p>A size label is a starting point, not a universal fit guarantee. Brands and styles differ in band tension, cup shape, wire width, fabric stretch and grading. Two bras marked with the same size can feel quite different, and a calculator cannot inspect the garment or account for personal comfort. The best check is how the band, cups and straps feel in the actual design while standing and moving naturally.</p>
            <p>When trying a bra, check that the band sits level and feels secure on the loosest hook if the garment is new. The band provides much of the support, but it should not cause pain or restrict breathing. Look for gaping, overflow, wrinkling or wires that press uncomfortably; each can point to a different fit issue, though no single sign identifies the right adjustment for everyone. A professional fitter can help interpret measurements and compare neighboring sizes.</p>
            <p>Sister-size charts show nearby combinations of band and cup labels that can have a related cup volume, but they do not make the bras identical. Changing the band changes the circumference and support, and cup shape can vary by manufacturer. Use the calculator’s sister-size option as a way to explore alternatives, then try the garments. Do not choose a neighboring size just because its label appears numerically similar.</p>
            <p>Regional systems can use different band increments and cup-letter sequences. Confirm whether the result is US, UK, EU or another convention before shopping, and check the brand’s own chart. Some brands use different cup progressions or omit certain labels. A converted size may not correspond exactly to every manufacturer’s product range.</p>
            <p>Measurements can change over time and may vary with posture, clothing, cycle, pregnancy, weight changes or other ordinary factors. Treat a previous measurement as a reference rather than a permanent size. If measuring is uncomfortable or you have a health concern, consult an appropriate professional. The calculator is for garment sizing only; it does not assess health, body composition or medical needs.</p>
            <p>For a useful record, save the two measurements, units, selected regional system and the style of bra you tried. If the suggested size is uncomfortable, change one aspect at a time—band, cup or style—and use the fit of the garment as feedback. The number can narrow the search, but comfort and the specific bra’s construction determine the final choice.</p>
            TXT],
            ['title' => 'Use the result as a fitting starting point', 'html' => <<<'TXT'
            <p>If the suggested size does not feel right, recheck the tape position and unit before changing the size. A sloping or twisted tape can distort either measurement. For the underbust, keep the tape horizontal around the ribcage; for the bust, use a relaxed posture and avoid pulling the tape tight. If measurements vary between repeats, record the range and try nearby sizes rather than treating one reading as exact.</p><p>When comparing bras, keep the brand and style in view. A soft bralette, molded cup and underwire bra can fit differently even with identical labels. The calculator’s sister-size chart can point to alternatives, but the band and cup proportions still change. A trained fitter can help if you want a second opinion, while personal comfort remains the deciding factor.</p>
            TXT],
            ['title' => 'When to seek another fitting opinion', 'html' => <<<'TXT'
            <p>If measuring is difficult, repeated results differ substantially or a bra causes persistent discomfort, a professional fitting or medical advice may be more appropriate than further calculator adjustments. The page only maps measurements to sizing labels. It cannot diagnose pain, assess skin changes or recommend a garment for a medical condition.</p><p>When a bra feels wrong, consider the style as well as the number. Different strap placement, cup depth, wire shape and fabric stretch can affect comfort. The size output helps organize what to try next; it does not replace trying a well-constructed garment that suits your preferences.</p>
            TXT],
            ['title' => 'Compare the label with actual comfort', 'html' => <<<'TXT'
            <p>When trying the suggested size, move your arms and sit as well as standing. The band should remain in place without digging painfully, and the cups should feel secure without forcing a shape that is uncomfortable. If no nearby size works, try another style or brand rather than assuming the measurement must be wrong.</p>
            TXT],
            ['title' => 'Use the same measurement units throughout', 'html' => <<<'TXT'
            <p>Write down whether your tape is marked in inches or centimeters and select that unit before entering either measurement. Recheck the labels on both fields so the underbust and bust values are comparable. A unit mismatch can shift the suggested size enough to make every nearby option seem wrong.</p>
            TXT],
            ['title' => 'Recheck after a change in fit', 'html' => <<<'TXT'
            <p>If the result no longer matches bras that previously fit, retake the measurements rather than assuming the old label still applies. A different brand or style may also fit differently at the same nominal size. Use the new measurements as a fresh starting point and compare the garment’s actual comfort.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Which measurements should I enter?', 'a' => 'Measure your underbust and fullest bust, and choose the same measurement system for both. The calculator uses their difference along with the selected region to estimate a band and cup size.'],
            ['q' => 'Why can the calculator show different regional sizes?', 'a' => 'Bra-size conventions are not identical across the US, UK and EU. Use the result for the selected sizing system and compare it with the brand’s own chart.'],
            ['q' => 'Is the calculated size a guarantee of fit?', 'a' => 'No. It is a measurement-based starting estimate. Shape, style, fabric and brand pattern can affect fit, so try the garment or consult the retailer’s fit guidance.'],
        ],
        'related' => [
            ['path' => '/everyday-life/shoelace-length', 'name' => 'Shoelace length'],
            ['path' => '/everyday-life/shower-cost', 'name' => 'Shower cost'],
            ['path' => '/everyday-life/sidereal-time', 'name' => 'Sidereal time'],
        ],
    ],
];
