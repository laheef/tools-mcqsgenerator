<?php

/**
 * Belt size
 * /everyday-life/belt-size
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Belt size',
    'meta' => ['title' => 'Belt size Calculator: Formula, Steps & Examples', 'description' => 'Belt size works out general numerical and general waist and reports both. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Belt size Calculator', 'updated' => '2026-08-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sex',
                            'label' => 'I am a...',
                            'type' => 'select',
                            'options' => ['woman ' => '0', 'man ' => '1'],
                            'dataset' => 'sex',
                            'default' => 'woman ',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'what_man',
                            'label' => 'I know my...',
                            'type' => 'select',
                            'options' => ['numerical belt size' => '0', 'general belt size' => '1', 'waist circumference' => '2', 'length of existing belt' => '3'],
                            'dataset' => 'whatMan',
                            'default' => 'numerical belt size',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'what_woman',
                            'label' => 'I know my...',
                            'type' => 'select',
                            'options' => [
                                'numerical belt size' => '0',
                                'general belt size' => '1',
                                'waist circumference' => '2',
                                'length of existing belt' => '3',
                                'dress/pants size' => '4',
                            ],
                            'dataset' => 'whatWoman',
                            'default' => 'numerical belt size',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'numerical',
                            'label' => 'and it\'s...',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'general',
                            'label' => 'which is...',
                            'type' => 'select',
                            'options' => [
                                'XS' => '0',
                                'S' => '1',
                                'M' => '2',
                                'L' => '3',
                                'XL' => '4',
                                '2XL' => '5',
                                '3XL' => '6',
                                '4XL' => '7',
                            ],
                            'dataset' => 'general',
                            'control' => 'DROPDOWN',
                            'default' => 'L',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'waist',
                            'label' => 'which is...',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'length',
                            'label' => 'and it\'s...',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dress',
                            'label' => 'which is...',
                            'type' => 'select',
                            'options' => [
                                '0-2' => '0',
                                '4-6' => '1',
                                '8-10' => '2',
                                '12' => '3',
                                '14-16' => '4',
                                '18-20' => '5',
                                '22-24' => '6',
                            ],
                            'dataset' => 'dress',
                            'control' => 'DROPDOWN',
                            'default' => '8-10',
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
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => '(what == 0 and general_numerical == 0) or (what == 2 and general_waist == 0) or (what == 3 and general_length == 0) or (what == 4 and general_dress == 0)', 'text' => 'General size: XS'],
                                ['when' => '(what == 0 and general_numerical == 1) or (what == 2 and general_waist == 1) or (what == 3 and general_length == 1) or (what == 4 and general_dress == 1)', 'text' => 'General size: S'],
                                ['when' => '(what == 0 and general_numerical == 2) or (what == 2 and general_waist == 2) or (what == 3 and general_length == 2) or (what == 4 and general_dress == 2)', 'text' => 'General size: M'],
                                ['when' => '(what == 0 and general_numerical == 3) or (what == 2 and general_waist == 3) or (what == 3 and general_length == 3) or (what == 4 and general_dress == 3)', 'text' => 'General size: L'],
                                ['when' => '(what == 0 and general_numerical == 4) or (what == 2 and general_waist == 4) or (what == 3 and general_length == 4) or (what == 4 and general_dress == 4)', 'text' => 'General size: XL'],
                                ['when' => '(what == 0 and general_numerical == 5) or (what == 2 and general_waist == 5) or (what == 3 and general_length == 5) or (what == 4 and general_dress == 5)', 'text' => 'General size: 2XL'],
                                ['when' => '(what == 0 and general_numerical == 6) or (what == 2 and general_waist == 6) or (what == 3 and general_length == 6) or (what == 4 and general_dress == 6)', 'text' => 'General size: 3XL'],
                                ['when' => '(what == 0 and general_numerical == 7) or (what == 2 and general_waist == 4) or (what == 3 and general_length == 4) or (what == 4 and general_dress == 7)', 'text' => 'General size: 4XL'],
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
                                ['when' => 'what == 4 and hasValue(numerical_dress)', 'text' => 'Numerical size: {{numerical_dress.formattedValue}}'],
                                ['when' => 'what == 3 and hasValue(numerical_length)', 'text' => 'Numerical size: {{numerical_length.formattedValue}}'],
                                ['when' => 'what == 2 and hasValue(numerical_waist)', 'text' => 'Numerical size: {{numerical_waist.formattedValue}}'],
                                ['when' => 'what == 1 and hasValue(numerical_general)', 'text' => 'Numerical size: {{numerical_general.formattedValue}}'],
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
                                ['when' => 'what == 0 and hasValue(numerical)', 'text' => <<<'TXT'
                                Waist circumference: {{waist_numerical_min.formattedValue}}-{{waist_numerical_max.formattedValue}}&nbsp;in ({{waist_numerical_min_cm.formattedValue}}-{{waist_numerical_max_cm.formattedValue}}&nbsp;cm)
                                TXT],
                                ['when' => 'what == 1 and hasValue(general)', 'text' => <<<'TXT'
                                Waist circumference: {{waist_general_min.formattedValue}}-{{waist_general_max.formattedValue}}&nbsp;in ({{waist_general_min_cm.formattedValue}}-{{waist_general_max_cm.formattedValue}}&nbsp;cm)
                                TXT],
                                ['when' => 'what == 3 and hasValue(length)', 'text' => <<<'TXT'
                                Waist circumference: {{waist_length_min.formattedValue}}-{{waist_length_max.formattedValue}}&nbsp;in ({{waist_length_min_cm.formattedValue}}-{{waist_length_max_cm.formattedValue}}&nbsp;cm)
                                TXT],
                                ['when' => 'what==4 and hasValue(dress)', 'text' => <<<'TXT'
                                Waist circumference: {{waist_dress_min.formattedValue}}-{{waist_dress_max.formattedValue}}&nbsp;in ({{waist_dress_min_cm.formattedValue}}-{{waist_dress_max_cm.formattedValue}}&nbsp;cm)
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
                                ['when' => 'what == 0 and hasValue(numerical)', 'text' => <<<'TXT'
                                Belt length: {{length_numerical_min.formattedValue}}-{{length_numerical_max.formattedValue}}&nbsp;in ({{length_numerical_min_cm.formattedValue}}-{{length_numerical_max_cm.formattedValue}}&nbsp;cm)
                                TXT],
                                ['when' => 'what == 1 and hasValue(general)', 'text' => <<<'TXT'
                                Belt length: {{length_general_min.formattedValue}}-{{length_general_max.formattedValue}}&nbsp;in ({{length_general_min_cm.formattedValue}}-{{length_general_max_cm.formattedValue}}&nbsp;cm)
                                TXT],
                                ['when' => 'what == 2 and hasValue(waist)', 'text' => <<<'TXT'
                                Belt length: {{length_waist_min.formattedValue}}-{{length_waist_max.formattedValue}}&nbsp;in ({{length_waist_min_cm.formattedValue}}-{{length_waist_max_cm.formattedValue}}&nbsp;cm)
                                TXT],
                                ['when' => 'what == 4 and hasValue(dress)', 'text' => <<<'TXT'
                                Belt length: {{length_dress_min.formattedValue}}-{{length_dress_max.formattedValue}}&nbsp;in ({{length_dress_min_cm.formattedValue}} -{{length_dress_max_cm.formattedValue}}&nbsp;cm)
                                TXT],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Here you\'ll see your results...'],
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
                            'name' => 'what',
                            'label' => '',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 4,
                    'place' => [0, 1, 2, 3],
                    'fields' => [
                        [
                            'name' => 'waist_numerical_min',
                            'label' => '',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'waist_numerical_max',
                            'label' => '',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'waist_numerical_max_cm',
                            'label' => '',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                        [
                            'name' => 'waist_numerical_min_cm',
                            'label' => '',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 4,
                    'place' => [0, 1, 2, 3],
                    'fields' => [
                        [
                            'name' => 'general_dress',
                            'label' => '',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'general_length',
                            'label' => '',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'general_numerical',
                            'label' => '',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'general_waist',
                            'label' => '',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 4,
                    'place' => [0, 1, 2, 3],
                    'fields' => [
                        [
                            'name' => 'numerical_dress',
                            'label' => '',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'numerical_general',
                            'label' => '',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'numerical_length',
                            'label' => '',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'numerical_waist',
                            'label' => '',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 4,
                    'place' => [0, 1, 2, 3],
                    'fields' => [
                        [
                            'name' => 'waist_dress_max',
                            'label' => '',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'waist_dress_max_cm',
                            'label' => '',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                        [
                            'name' => 'waist_dress_min',
                            'label' => '',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'waist_dress_min_cm',
                            'label' => '',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 4,
                    'place' => [0, 1, 2, 3],
                    'fields' => [
                        [
                            'name' => 'waist_general_max',
                            'label' => '',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'waist_general_max_cm',
                            'label' => '',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                        [
                            'name' => 'waist_general_min',
                            'label' => '',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'waist_general_min_cm',
                            'label' => '',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 4,
                    'place' => [0, 1, 2, 3],
                    'fields' => [
                        [
                            'name' => 'waist_length_max',
                            'label' => '',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'waist_length_max_cm',
                            'label' => '',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                        [
                            'name' => 'waist_length_min_cm',
                            'label' => '',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                        [
                            'name' => 'waist_length_min',
                            'label' => '',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 4,
                    'place' => [0, 1, 2, 3],
                    'fields' => [
                        [
                            'name' => 'length_dress_max',
                            'label' => '',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'length_dress_max_cm',
                            'label' => '',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                        [
                            'name' => 'length_dress_min',
                            'label' => '',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'length_dress_min_cm',
                            'label' => '',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 4,
                    'place' => [0, 1, 2, 3],
                    'fields' => [
                        [
                            'name' => 'length_general_max',
                            'label' => '',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'length_general_max_cm',
                            'label' => '',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                        [
                            'name' => 'length_general_min',
                            'label' => '',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'length_general_min_cm',
                            'label' => '',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 4,
                    'place' => [0, 1, 2, 3],
                    'fields' => [
                        [
                            'name' => 'length_numerical_max',
                            'label' => '',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'length_numerical_max_cm',
                            'label' => '',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                        [
                            'name' => 'length_numerical_min',
                            'label' => '',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'length_numerical_min_cm',
                            'label' => '',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 4,
                    'place' => [0, 1, 2, 3],
                    'fields' => [
                        [
                            'name' => 'length_waist_max',
                            'label' => '',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'length_waist_max_cm',
                            'label' => '',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                        [
                            'name' => 'length_waist_min',
                            'label' => '',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'length_waist_min_cm',
                            'label' => '',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'general_numerical = fx_belt(sex, what_man, what_woman, numerical, 3)',
            'results' => ['general_numerical' => 'fx_belt(sex, what_man, what_woman, numerical, 3)'],
        ],
        [
            'title' => 'general_waist = fx_belt(sex, what_man, what_woman, waist, 3)',
            'results' => ['general_waist' => 'fx_belt(sex, what_man, what_woman, waist, 3)'],
        ],
        [
            'title' => 'general_length = fx_belt(sex, what_man, what_woman, length, 3)',
            'results' => ['general_length' => 'fx_belt(sex, what_man, what_woman, length, 3)'],
        ],
        [
            'title' => 'general_dress = fx_belt(sex, what_man, what_woman, dress, 3)',
            'results' => ['general_dress' => 'fx_belt(sex, what_man, what_woman, dress, 3)'],
        ],
        [
            'title' => 'waist_numerical_max = fx_belt(sex, what_man, what_woman, numerical, 0)',
            'results' => ['waist_numerical_max' => 'fx_belt(sex, what_man, what_woman, numerical, 0)'],
        ],
        [
            'title' => 'waist_general_max = fx_belt(sex, what_man, what_woman, general, 0)',
            'results' => ['waist_general_max' => 'fx_belt(sex, what_man, what_woman, general, 0)'],
        ],
        [
            'title' => 'waist_dress_max = fx_belt(sex, what_man, what_woman, dress, 0)',
            'results' => ['waist_dress_max' => 'fx_belt(sex, what_man, what_woman, dress, 0)'],
        ],
        [
            'title' => 'waist_length_max = fx_belt(sex, what_man, what_woman, length, 0)',
            'results' => ['waist_length_max' => 'fx_belt(sex, what_man, what_woman, length, 0)'],
        ],
        [
            'title' => 'waist_numerical_min = if_else(sex>0, waist_numerical_max - 1.5, waist_numerical_max-2)',
            'results' => ['waist_numerical_min' => <<<'TXT'
            (((sex > 0) ? (
               fx_belt(sex, what_man, what_woman, numerical, 0) - 3/2
            )
            : (
               fx_belt(sex, what_man, what_woman, numerical, 0) - 2
            )))
            TXT],
        ],
        [
            'title' => 'waist_general_min = if_else(sex>0, waist_general_max - 1.5, waist_general_max-2)',
            'results' => ['waist_general_min' => <<<'TXT'
            (((sex > 0) ? (
               fx_belt(sex, what_man, what_woman, general, 0) - 3/2
            )
            : (
               fx_belt(sex, what_man, what_woman, general, 0) - 2
            )))
            TXT],
        ],
        [
            'title' => 'waist_dress_min = if_else(sex>0, waist_dress_max - 1.5, waist_dress_max-2)',
            'results' => ['waist_dress_min' => <<<'TXT'
            (((sex > 0) ? (
               fx_belt(sex, what_man, what_woman, dress, 0) - 3/2
            )
            : (
               fx_belt(sex, what_man, what_woman, dress, 0) - 2
            )))
            TXT],
        ],
        [
            'title' => 'waist_length_min = if_else(sex>0, waist_length_max - 1.5, waist_length_max-2)',
            'results' => ['waist_length_min' => <<<'TXT'
            (((sex > 0) ? (
               fx_belt(sex, what_man, what_woman, length, 0) - 3/2
            )
            : (
               fx_belt(sex, what_man, what_woman, length, 0) - 2
            )))
            TXT],
        ],
        [
            'title' => 'waist_numerical_max_cm = one_way(waist_numerical_max*2.54)',
            'results' => ['waist_numerical_max_cm' => '((127/50)*fx_belt(sex, what_man, what_woman, numerical, 0))'],
        ],
        [
            'title' => 'waist_general_max_cm = one_way(waist_general_max*2.54)',
            'results' => ['waist_general_max_cm' => '((127/50)*fx_belt(sex, what_man, what_woman, general, 0))'],
        ],
        [
            'title' => 'waist_dress_max_cm = one_way(waist_dress_max*2.54)',
            'results' => ['waist_dress_max_cm' => '((127/50)*fx_belt(sex, what_man, what_woman, dress, 0))'],
        ],
        [
            'title' => 'waist_length_max_cm = one_way(waist_length_max*2.54)',
            'results' => ['waist_length_max_cm' => '((127/50)*fx_belt(sex, what_man, what_woman, length, 0))'],
        ],
        [
            'title' => 'waist_numerical_min_cm = one_way(waist_numerical_min*2.54)',
            'results' => ['waist_numerical_min_cm' => <<<'TXT'
            ((127/50)*(((sex > 0) ? (
               fx_belt(sex, what_man, what_woman, numerical, 0) - 3/2
            )
            : (
               fx_belt(sex, what_man, what_woman, numerical, 0) - 2
            ))))
            TXT],
        ],
        [
            'title' => 'waist_general_min_cm = one_way(waist_general_min*2.54)',
            'results' => ['waist_general_min_cm' => <<<'TXT'
            ((127/50)*(((sex > 0) ? (
               fx_belt(sex, what_man, what_woman, general, 0) - 3/2
            )
            : (
               fx_belt(sex, what_man, what_woman, general, 0) - 2
            ))))
            TXT],
        ],
        [
            'title' => 'waist_dress_min_cm = one_way(waist_dress_min*2.54)',
            'results' => ['waist_dress_min_cm' => <<<'TXT'
            ((127/50)*(((sex > 0) ? (
               fx_belt(sex, what_man, what_woman, dress, 0) - 3/2
            )
            : (
               fx_belt(sex, what_man, what_woman, dress, 0) - 2
            ))))
            TXT],
        ],
        [
            'title' => 'waist_length_min_cm = one_way(waist_length_min*2.54)',
            'results' => ['waist_length_min_cm' => <<<'TXT'
            ((127/50)*(((sex > 0) ? (
               fx_belt(sex, what_man, what_woman, length, 0) - 3/2
            )
            : (
               fx_belt(sex, what_man, what_woman, length, 0) - 2
            ))))
            TXT],
        ],
        [
            'title' => 'numerical_general = fx_belt(sex, what_man, what_woman, general, 2)',
            'results' => ['numerical_general' => 'fx_belt(sex, what_man, what_woman, general, 2)'],
        ],
        [
            'title' => 'numerical_waist = fx_belt(sex, what_man, what_woman, waist, 2)',
            'results' => ['numerical_waist' => 'fx_belt(sex, what_man, what_woman, waist, 2)'],
        ],
        [
            'title' => 'numerical_length = fx_belt(sex, what_man, what_woman, length, 2)',
            'results' => ['numerical_length' => 'fx_belt(sex, what_man, what_woman, length, 2)'],
        ],
        [
            'title' => 'numerical_dress = fx_belt(sex, what_man, what_woman, dress, 2)',
            'results' => ['numerical_dress' => 'fx_belt(sex, what_man, what_woman, dress, 2)'],
        ],
        [
            'title' => 'length_numerical_max = fx_belt(sex, what_man, what_woman, numerical, 1)',
            'results' => ['length_numerical_max' => 'fx_belt(sex, what_man, what_woman, numerical, 1)'],
        ],
        [
            'title' => 'length_general_max = fx_belt(sex, what_man, what_woman, general, 1)',
            'results' => ['length_general_max' => 'fx_belt(sex, what_man, what_woman, general, 1)'],
        ],
        [
            'title' => 'length_waist_max = fx_belt(sex, what_man, what_woman, waist, 1)',
            'results' => ['length_waist_max' => 'fx_belt(sex, what_man, what_woman, waist, 1)'],
        ],
        [
            'title' => 'length_dress_max = fx_belt(sex, what_man, what_woman, dress, 1)',
            'results' => ['length_dress_max' => 'fx_belt(sex, what_man, what_woman, dress, 1)'],
        ],
        [
            'title' => 'length_numerical_min = one_way(length_numerical_max - 1)',
            'results' => ['length_numerical_min' => '(fx_belt(sex, what_man, what_woman, numerical, 1) - 1)'],
        ],
        [
            'title' => 'length_general_min = one_way(length_general_max - 1)',
            'results' => ['length_general_min' => '(fx_belt(sex, what_man, what_woman, general, 1) - 1)'],
        ],
        [
            'title' => 'length_waist_min = if_else(sex > 0, length_waist_max - 2, length_waist_max - 1)',
            'results' => ['length_waist_min' => <<<'TXT'
            (((sex > 0) ? (
               fx_belt(sex, what_man, what_woman, waist, 1) - 2
            )
            : (
               fx_belt(sex, what_man, what_woman, waist, 1) - 1
            )))
            TXT],
        ],
        [
            'title' => 'length_dress_min = one_way(length_dress_max - 1)',
            'results' => ['length_dress_min' => '(fx_belt(sex, what_man, what_woman, dress, 1) - 1)'],
        ],
        [
            'title' => 'length_numerical_max_cm = one_way(length_numerical_max * 2.54)',
            'results' => ['length_numerical_max_cm' => '((127/50)*fx_belt(sex, what_man, what_woman, numerical, 1))'],
        ],
        [
            'title' => 'length_general_max_cm = one_way(length_general_max * 2.54)',
            'results' => ['length_general_max_cm' => '((127/50)*fx_belt(sex, what_man, what_woman, general, 1))'],
        ],
        [
            'title' => 'length_waist_max_cm = one_way(length_waist_max * 2.54)',
            'results' => ['length_waist_max_cm' => '((127/50)*fx_belt(sex, what_man, what_woman, waist, 1))'],
        ],
        [
            'title' => 'length_dress_max_cm = one_way(length_dress_max * 2.54)',
            'results' => ['length_dress_max_cm' => '((127/50)*fx_belt(sex, what_man, what_woman, dress, 1))'],
        ],
        [
            'title' => 'length_numerical_min_cm = one_way(length_numerical_min * 2.54)',
            'results' => ['length_numerical_min_cm' => '((127/50)*(fx_belt(sex, what_man, what_woman, numerical, 1) - 1))'],
        ],
        [
            'title' => 'length_general_min_cm = one_way(length_general_min * 2.54)',
            'results' => ['length_general_min_cm' => '((127/50)*(fx_belt(sex, what_man, what_woman, general, 1) - 1))'],
        ],
        [
            'title' => 'length_waist_min_cm = one_way(length_waist_min * 2.54)',
            'results' => ['length_waist_min_cm' => <<<'TXT'
            ((127/50)*(((sex > 0) ? (
               fx_belt(sex, what_man, what_woman, waist, 1) - 2
            )
            : (
               fx_belt(sex, what_man, what_woman, waist, 1) - 1
            ))))
            TXT],
        ],
        [
            'title' => 'length_dress_min_cm = one_way(length_dress_min * 2.54)',
            'results' => ['length_dress_min_cm' => '((127/50)*(fx_belt(sex, what_man, what_woman, dress, 1) - 1))'],
        ],
        [
            'title' => 'what = input_type(sex, what_man, what_woman)',
            'results' => ['what' => 'input_type(sex, what_man, what_woman)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";var menDATA=[{"name":"XS","uid":"2692018625","values":{"general":0,"numerical":30,"waist":28,"length":30}},{"name":"S","uid":"2298469514","values":{"general":1,"numerical":32,"waist":30,"length":32}},{"name":"M","uid":"3801353389","values":{"general":2,"numerical":34,"waist":32,"length":34}},{"name":"M","uid":"3430657055","values":{"general":2,"numerical":36,"waist":34,"length":36}},{"name":"L","uid":"851966307","values":{"general":3,"numerical":38,"waist":36,"length":38}},{"name":"L","uid":"2489469724","values":{"general":3,"numerical":40,"waist":38,"length":40}},{"name":"XL","uid":"216787555","values":{"general":4,"numerical":42,"waist":40,"length":42}},{"name":"XL","uid":"2456911429","values":{"general":4,"numerical":44,"waist":42,"length":44}},{"name":"2XL","uid":"3908964182","values":{"general":5,"numerical":46,"waist":44,"length":46}},{"name":"3XL","uid":"2043300559","values":{"general":6,"numerical":48,"waist":46,"length":48}},{"name":"4XL","uid":"2688290500","values":{"general":7,"numerical":50,"waist":48,"length":50}}];var womenDATA=[{"name":"XS","uid":"3228796688","values":{"general":0,"numerical":28,"dress":0,"waist":26,"length":28}},{"name":"S","uid":"4049156899","values":{"general":1,"numerical":30,"dress":1,"waist":28,"length":30}},{"name":"M","uid":"3855911074","values":{"general":2,"numerical":32,"dress":2,"waist":30,"length":32}},{"name":"L","uid":"3290966494","values":{"general":3,"numerical":35,"dress":3,"waist":33,"length":35}},{"name":"XL","uid":"1755272174","values":{"general":4,"numerical":37,"dress":4,"waist":35,"length":37}},{"name":"2XL","uid":"751908932","values":{"general":5,"numerical":39,"dress":5,"waist":37,"length":39}},{"name":"3XL","uid":"2123927336","values":{"general":6,"numerical":42,"dress":6,"waist":39,"length":41}}];omni.define("input_type",function(sex,what_man,what_woman){if(sex==0){return what_woman}else{return what_man}});omni.define("fx_belt",function(sex,what_man,what_woman,input,return_val){var i=0;var temp=100;var doubletemp=100;var new_general,new_numerical,new_length,new_numerical2,new_waist2,new_length2;var new_waist=0;if(sex==1){for(i=0;i<menDATA.length;i++){if(what_man===0){if(input<=menDATA[i].values.numerical){temp=i;break}else if(!isNaN(input)){temp=menDATA.length-1}}else if(what_man==1){if(input===menDATA[i].values.general){temp=i;if(i+1<menDATA.length&&input===menDATA[i+1].values.general){doubletemp=i+1}break}else{temp=menDATA.length-1}}else if(what_man==2){if(input<=menDATA[i].values.waist){temp=i;break}else if(!isNaN(input)){temp=menDATA.length-1}}else{if(input<=menDATA[i].values.length){temp=i;break}else if(!isNaN(input)){temp=menDATA.length-1}}}}else{for(i=0;i<womenDATA.length;i++){if(what_woman===0){if(input<=womenDATA[i].values.numerical){temp=i;break}else if(!isNaN(input)){temp=womenDATA.length-1}}else if(what_woman==1){if(input===womenDATA[i].values.general){temp=i;break}else{temp=womenDATA.length-1}}else if(what_woman==4){if(input<=womenDATA[i].values.dress){temp=i;break}else if(!isNaN(input)){temp=womenDATA.length-1}}else if(what_woman==2){if(input<=womenDATA[i].values.waist){temp=i;break}else if(!isNaN(input)){temp=womenDATA.length-1}}else{if(input<=womenDATA[i].values.length){temp=i;break}else if(!isNaN(input)){temp=womenDATA.length-1}}}}if(temp!==100){if(sex==1){new_waist=Math.round(menDATA[temp].values.waist*1)/1;new_length=Math.round(menDATA[temp].values.length*1)/1;new_numerical=menDATA[temp].values.numerical;new_general=menDATA[temp].values.general;if(doubletemp!==100){new_waist2=Math.round(menDATA[doubletemp].values.waist*1)/1;new_length2=Math.round(menDATA[doubletemp].values.length*1)/1;new_numerical2=menDATA[doubletemp].values.numerical}}else{new_waist=Math.round(womenDATA[temp].values.waist*1)/1;new_length=Math.round(womenDATA[temp].values.length*1)/1;new_numerical=womenDATA[temp].values.numerical;new_general=womenDATA[temp].values.general}}switch(return_val){case 0:return sex==1&&doubletemp!=100?new_waist2:new_waist;case 1:return sex==1&&doubletemp!=100?new_length2:new_length;case 2:return sex==1&&doubletemp!=100?new_numerical2:new_numerical;case 3:return new_general}});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => 'The Belt size calculator takes the numbers you enter and reports the result immediately.',
        'sections' => [
            ['title' => 'How does the Belt size calculator work?', 'html' => <<<'TXT'
            <p>The Belt size calculator takes the values in the form, applies the relationships described below and reports every result it can derive from them.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the I know my (2)); then you type in the figures it asks for.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <table><caption>What you supply, field by field</caption><thead><tr><th>Field</th><th>Units and meaning</th></tr></thead><tbody><tr><td>I am a</td><td>pick the option that matches your case — 2 options, such as woman and man. </td></tr><tr><td>I know my</td><td>pick the option that matches your case — 4 options, such as numerical belt size, general belt size and waist circumference. </td></tr><tr><td>I know my (2)</td><td>pick the option that matches your case — 5 options, such as numerical belt size, general belt size and waist circumference. </td></tr><tr><td>And it's...</td><td>a plain number with no unit attached.</td></tr><tr><td>Which is</td><td>pick the option that matches your case — 8 options, such as XS, S and M. </td></tr><tr><td>Which is (2)</td><td>a measured quantity, entered by default in centimeters. </td></tr><tr><td>And it's... (2)</td><td>a measured quantity, entered by default in centimeters. </td></tr><tr><td>Which is (3)</td><td>pick the option that matches your case — 7 options, such as 0-2, 4-6 and 8-10. </td></tr></tbody></table><p>5 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'The formula behind the Belt size calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">General numerical</span><span class="formula-eq">=</span><span class="formula-rhs">(I am a, I know my, I know my, and it&#x27;s..., 3)</span></div><div class="formula-row"><span class="formula-lhs">General waist</span><span class="formula-eq">=</span><span class="formula-rhs">(I am a, I know my, I know my, which is, 3)</span></div><div class="formula-row"><span class="formula-lhs">General length</span><span class="formula-eq">=</span><span class="formula-rhs">(I am a, I know my, I know my, and it&#x27;s..., 3)</span></div><div class="formula-row"><span class="formula-lhs">General dress</span><span class="formula-eq">=</span><span class="formula-rhs">(I am a, I know my, I know my, which is, 3)</span></div><div class="formula-row"><span class="formula-lhs">Waist numerical max</span><span class="formula-eq">=</span><span class="formula-rhs">(I am a, I know my, I know my, and it&#x27;s..., 0)</span></div><div class="formula-row"><span class="formula-lhs">Waist general max</span><span class="formula-eq">=</span><span class="formula-rhs">(I am a, I know my, I know my, which is, 0)</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Belt size calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Turning a rough idea into a number you can act on</li><li>Testing how sensitive an answer is to one input</li><li>Checking a figure someone else quoted</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/recessed-lighting">Recessed lighting</a>, <a href="/everyday-life/retirement-countdown">Retirement countdown</a> and <a href="/everyday-life/reverse-text-generator">Reverse text generator</a>.</p>
            TXT],
            ['title' => 'Measuring for a belt-size estimate', 'html' => <<<'TXT'
            <p>The Belt size calculator uses the input method you select—such as a numerical belt label, waist measurement, general clothing size or dress size—to suggest a belt size or range. Choose the method that matches what you actually know. A waist measurement is not automatically the same as the labeled size of trousers, and a belt length may refer to the buckle-to-hole distance, total strap length or a manufacturer’s size convention. Read the field labels and the brand’s chart before comparing numbers.</p>
            <p>If measuring your waist, use the location where the belt will sit over the clothing you plan to wear. Keep a flexible tape level and comfortably snug without compressing the body. For a belt that fits well, measure from the buckle’s pin to the hole you use most often; this is often a more direct reference than measuring the entire belt end to end. Note the unit and whether the measurement includes a buckle or only the strap.</p>
            <p>Brand charts differ in how they label belts. Some use waist ranges, some use a center hole or buckle-to-hole measurement, and others map clothing sizes to a nominal belt size. The calculator’s result reflects its built-in chart and assumptions, not every maker’s pattern. If the manufacturer provides a product-specific guide, follow that guide and check whether the stated size is in inches, centimeters or a size label.</p>
            <p>The fit also depends on belt style, thickness, material, hole spacing and where you wear it. A belt over a coat needs a different usable circumference from one worn through trouser loops. Leather can stretch with use, while a rigid or elastic belt may fit differently. The calculator cannot predict these material or design differences, so use the result to narrow options and confirm the actual belt’s adjustment range.</p>
            <p>If you are between sizes, check the chart’s recommendation and how many holes are available on either side of the intended fit. Do not automatically choose the longest option if the tail will be awkward or the shortest if there is no room for adjustment. For gifts, a belt currently worn at the usual hole can be measured discreetly; be careful not to infer size from a trouser label alone.</p>
            <p>Use the output as a starting point for shopping, not as a judgment of body size. Clothing labels are not standardized, and measurements are sensitive to where and how they are taken. If comfort or fit is affected by a medical need, consult the relevant product guidance or a professional. Keep the raw measurement, method, unit and selected category with the result so it can be checked against the seller’s chart.</p>
            TXT],
            ['title' => 'Choosing a measurement method that matches the chart', 'html' => <<<'TXT'
            <p>If you know the size of a belt that fits, use the maker’s instructions to measure it. Buckle-to-middle-hole length is a common reference, but belt brands may define size differently, and some products measure from the buckle fold to a designated hole. Measuring the whole strap including the buckle can lead to the wrong comparison. Check the product page for a diagram and reproduce its method before entering the value.</p><p>If using waist measurement, decide where the belt will be worn. A belt through jeans sits at the waistband; a dress belt may sit higher, and a work belt worn over layers may need more circumference. Measure over the clothing relevant to the use, with the tape comfortably snug. The calculator’s chart cannot account for a thick coat or a specific loop arrangement unless you include that difference in your measurement.</p><p>Numerical, general, dress and waist labels are not interchangeable. A trouser size can include ease, vanity sizing or a brand-specific cut, while a belt measurement describes a different physical length. Use the input type that matches the information you have and confirm the resulting range with the belt maker. A size conversion is only as good as the source chart.</p><p>For an adjustable belt, inspect the available holes and total adjustment range. If a result is near an endpoint, the belt may not leave enough room for seasonal layers or personal adjustment. Consider the style and material too: a stretch belt, leather strap and utility belt can behave differently. The result narrows the options; checking the actual product details completes the selection.</p>
            TXT],
            ['title' => 'Check the selected style and adjustment range', 'html' => <<<'TXT'
            <p>Some belts are sold by waist circumference, others by a nominal clothing size, and some by the length from buckle to a particular hole. Select the matching input method and read the product diagram before ordering. If the belt has only a small range of holes, compare the predicted size with the full adjustment range rather than focusing on one label.</p><p>For a belt worn over clothing or equipment, measure over that layer. A standard waist measurement taken against the body may be too short for a belt intended to fit over a coat or tool pouch.</p>
            TXT],
            ['title' => 'Keep the measurement and chart together', 'html' => <<<'TXT'
            <p>Save the raw measurement, its unit, the method used and the chosen belt category with the result. If a retailer’s recommendation differs, those details make it possible to compare the same measurement with the maker’s chart instead of guessing which conversion was applied.</p>
            TXT],
            ['title' => 'Use the brand definition as the final check', 'html' => <<<'TXT'
            <p>If the belt maker defines its size by a particular hole or buckle point, use that definition even when it differs from the calculator’s general chart. A small difference in measuring method can move a result to the next label. Compare the stated adjustment range with the actual belt before choosing.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What do I need to enter to use the Belt size calculator?', 'a' => 'The form asks for a few values, which is 8 fields in total.'],
            ['q' => 'Can I enter which is (2) in a different unit?', 'a' => 'Yes. Which is (2) opens in centimeters and the chip beside it offers 34 units.'],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => 'There are several choices to make (5 in total), and each one selects a different case rather than scaling the result.'],
        ],
        'related' => [
            ['path' => '/everyday-life/recessed-lighting', 'name' => 'Recessed lighting'],
            ['path' => '/everyday-life/retirement-countdown', 'name' => 'Retirement countdown'],
            ['path' => '/everyday-life/reverse-text-generator', 'name' => 'Reverse text generator'],
        ],
    ],
];
