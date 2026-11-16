<?php

/**
 * Time
 * /everyday-life/time
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Time',
    'meta' => ['title' => 'Time Calculator — Free, With Worked Examples', 'description' => 'Time turns i want to..., time 1 and − Time 2 into = Time difference and equals.... A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Time Calculator', 'updated' => '2026-10-05'],
    'raw' => [
        'vars' => [
            'conversionFactor' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'course_1' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'course_10' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'course_11' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'course_12' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'course_13' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'course_14' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'course_15' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'course_16' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'course_17' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'course_18' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'course_19' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'course_2' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'course_20' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'course_3' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'course_4' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'course_5' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'course_6' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'course_7' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'course_8' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'course_9' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'end_date' => ['type' => 'date', 'rnd' => null],
            'end_date_time' => ['type' => 'datetime', 'rnd' => null],
            'result_unit' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'V4zOjhZ6I1QPKBJau4ses', 'c' => null],
                ],
                'ds' => 'ukXv5ED9YgaDATKpZbv3q',
            ],
            'result_unit2' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'start_date' => ['type' => 'date', 'rnd' => null],
            'start_date_time' => ['type' => 'datetime', 'rnd' => null],
            'symbol' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'symbol2' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'symbol3' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'time1' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'time2' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'time_between' => [
                'type' => 'numerical',
                'rnd' => ['standard', '1'],
            ],
            'time_between_dates' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'time_denominator' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'time_difference' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'time_multiplicand' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'time_multiplier' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'time_numerator' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'time_product' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'time_quotient' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'type_of_calculation' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'oYY5cbi9INSKI42yMoLDy', 'c' => null],
                ],
                'ds' => 'zA9HmvYLfwkKB1XFR9NMr',
            ],
        ],
        'groups' => [
            [
                'uid' => 'FBLrH2bnbU2-FUnENGsHE',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'type_of_calculation',
                                    'vt' => 'valueSelect',
                                    'l' => 'I want to...',
                                    'ds' => 'zA9HmvYLfwkKB1XFR9NMr',
                                    'opts' => [
                                        ['oYY5cbi9INSKI42yMoLDy', ' add time', '0'],
                                        ['hEGUe3VkjXYMLCZKYUVYd', ' subtract time', '1'],
                                        ['qwoRHZz07mFBYq-wxvc1S', ' multiply time', '2'],
                                        ['K8NF6AMpGOyb0A4OdzECw', ' divide time', '3'],
                                        ['BuvxZVFfeGw9eDf568LHF', ' find time between dates', '4'],
                                        ['UNRFONmysy8hT_0HOE77C', '⏰ find time between dates and times', '5'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'fvyKm2goyjZrXstuRDjUs',
                'title' => 'Subtract time',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'time1',
                                    'vt' => 'numerical',
                                    'l' => 'Time 1',
                                    'us' => '19',
                                    'du' => 'hrsminsec',
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
                                    'n' => 'time2',
                                    'vt' => 'numerical',
                                    'l' => '− Time 2',
                                    'us' => '19',
                                    'du' => 'hrsminsec',
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
                                    'n' => 'time_difference',
                                    'vt' => 'numerical',
                                    'l' => '= Time difference',
                                    'us' => '19',
                                    'du' => 'hrsminsec',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'w7GgIgmnMF4w7Q6xgFb8f',
                'title' => 'Multiply time',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'time_multiplicand',
                                    'vt' => 'numerical',
                                    'l' => 'Time',
                                    'us' => '19',
                                    'du' => 'hrsminsec',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'time_multiplier', 'vt' => 'numerical', 'l' => 'Multiplied by...'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'time_product',
                                    'vt' => 'numerical',
                                    'l' => 'Equals...',
                                    'us' => '19',
                                    'du' => 'hrsminsec',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => '8S9Qsi4bwK1uqXQNaXUQb',
                'title' => 'Divide time',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'time_numerator',
                                    'vt' => 'numerical',
                                    'l' => 'Time',
                                    'us' => '19',
                                    'du' => 'hrsminsec',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'time_denominator', 'vt' => 'numerical', 'l' => 'Divided by...'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'time_quotient',
                                    'vt' => 'numerical',
                                    'l' => 'Equals...',
                                    'us' => '19',
                                    'du' => 'hrsminsec',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'ev5myYSXxMbC5gJi8ggwU',
                'title' => 'Find time between dates',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'start_date', 'vt' => 'date', 'l' => 'Start date'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'end_date', 'vt' => 'date', 'l' => 'End date'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'time_between_dates',
                                    'vt' => 'numerical',
                                    'l' => 'Time between dates',
                                    'us' => '19',
                                    'du' => 'yrsmosdays',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'QDfUxZUHvvB53poslPziE',
                'title' => 'Find time between two times and dates',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'start_date_time', 'vt' => 'datetime', 'l' => 'Start date with time'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'end_date_time', 'vt' => 'datetime', 'l' => 'End date with time'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'time_between',
                                    'vt' => 'numerical',
                                    'l' => 'Time between',
                                    'us' => '19',
                                    'du' => 'dayshrsmin',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'w1W39Bj5peOYDUxuC8_FC',
                'title' => 'Add time',
                'desc' => 'Enter up to 20 values (new rows will appear as you need them).',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'course_1',
                                    'vt' => 'numerical',
                                    'l' => 'Time 1',
                                    'us' => '19',
                                    'du' => 'hrsminsec',
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
                                    'n' => 'course_2',
                                    'vt' => 'numerical',
                                    'l' => '\\+ Time 2',
                                    'us' => '19',
                                    'du' => 'hrsminsec',
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
                                    'n' => 'course_3',
                                    'vt' => 'numerical',
                                    'l' => '\\+ Time 3',
                                    'us' => '19',
                                    'du' => 'hrsminsec',
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
                                    'n' => 'course_4',
                                    'vt' => 'numerical',
                                    'l' => '\\+ Time 4',
                                    'us' => '19',
                                    'du' => 'hrsminsec',
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
                                    'n' => 'course_5',
                                    'vt' => 'numerical',
                                    'l' => '\\+ Time 5',
                                    'us' => '19',
                                    'du' => 'hrsminsec',
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
                                    'n' => 'course_6',
                                    'vt' => 'numerical',
                                    'l' => '\\+ Time 6',
                                    'us' => '19',
                                    'du' => 'hrsminsec',
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
                                    'n' => 'course_7',
                                    'vt' => 'numerical',
                                    'l' => '\\+ Time 7',
                                    'us' => '19',
                                    'du' => 'hrsminsec',
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
                                    'n' => 'course_8',
                                    'vt' => 'numerical',
                                    'l' => '\\+ Time 8',
                                    'us' => '19',
                                    'du' => 'hrsminsec',
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
                                    'n' => 'course_9',
                                    'vt' => 'numerical',
                                    'l' => '\\+ Time 9',
                                    'us' => '19',
                                    'du' => 'hrsminsec',
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
                                    'n' => 'course_10',
                                    'vt' => 'numerical',
                                    'l' => '\\+ Time 10',
                                    'us' => '19',
                                    'du' => 'hrsminsec',
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
                                    'n' => 'course_11',
                                    'vt' => 'numerical',
                                    'l' => '\\+ Time 11',
                                    'us' => '19',
                                    'du' => 'hrsminsec',
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
                                    'n' => 'course_12',
                                    'vt' => 'numerical',
                                    'l' => '\\+ Time 12',
                                    'us' => '19',
                                    'du' => 'hrsminsec',
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
                                    'n' => 'course_13',
                                    'vt' => 'numerical',
                                    'l' => '\\+ Time 13',
                                    'us' => '19',
                                    'du' => 'hrsminsec',
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
                                    'n' => 'course_14',
                                    'vt' => 'numerical',
                                    'l' => '\\+ Time 14',
                                    'us' => '19',
                                    'du' => 'hrsminsec',
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
                                    'n' => 'course_15',
                                    'vt' => 'numerical',
                                    'l' => '\\+ Time 15',
                                    'us' => '19',
                                    'du' => 'hrsminsec',
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
                                    'n' => 'course_16',
                                    'vt' => 'numerical',
                                    'l' => '\\+ Time 16',
                                    'us' => '19',
                                    'du' => 'hrsminsec',
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
                                    'n' => 'course_17',
                                    'vt' => 'numerical',
                                    'l' => '\\+ Time 17',
                                    'us' => '19',
                                    'du' => 'hrsminsec',
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
                                    'n' => 'course_18',
                                    'vt' => 'numerical',
                                    'l' => '\\+ Time 18',
                                    'us' => '19',
                                    'du' => 'hrsminsec',
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
                                    'n' => 'course_19',
                                    'vt' => 'numerical',
                                    'l' => '\\+ Time 19',
                                    'us' => '19',
                                    'du' => 'hrsminsec',
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
                                    'n' => 'course_20',
                                    'vt' => 'numerical',
                                    'l' => '\\+ Time 20',
                                    'us' => '19',
                                    'du' => 'hrsminsec',
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
                                    'n' => 'result_unit',
                                    'vt' => 'valueSelect',
                                    'l' => 'Units of result',
                                    'ds' => 'ukXv5ED9YgaDATKpZbv3q',
                                    'opts' => [
                                        ['VtElyAwIIkQFCmAtqXNoO', 'milliseconds', '0'],
                                        ['KddGwHNF3zVNiyGV11bD9', 'seconds', '1'],
                                        ['8l_XiKWzcDWFUo3iGUHcm', 'minutes', '2'],
                                        ['RqAR4NCQk2lJcZncH7cnQ', 'hours', '3'],
                                        ['Yf9atoUrI3BFpuaHwGEcG', 'days', '4'],
                                        ['ZQkZuSLN1ubg-ZDPRCz29', 'weeks', '5'],
                                        ['XJmIPOKhfKPtaBiZKEHVv', 'months', '6'],
                                        ['2I9sBByfeNijOeaQGlcyH', 'years', '7'],
                                        ['3f1zjLUAEWXNvRlbHbHoz', 'minutes / seconds', '8'],
                                        ['xBFc3EhS5U-iYsP748OwY', 'hours / minutes', '9'],
                                        ['V4zOjhZ6I1QPKBJau4ses', 'hours / minutes / seconds', '10'],
                                        ['KYxRgWyTRTeerm8hv11ds', 'years / months', '11'],
                                        ['lwBFUbNAi_qkGQLFmte72', 'years / months / days', '12'],
                                        ['OVk_552EXE0zfGJoKTFav', 'weeks / days', '13'],
                                        ['EqmEZLcB1ILm_AFOB3kFe', 'days / hours', '14'],
                                        ['ZJzmq0O42d4nwr4-wE-po', 'days / hours / minutes', '15'],
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
                                    't' => 'x',
                                    'c' => [
                                        [null, '=&nbsp;'],
                                        [null, '{{add_time.value}}&nbsp;{{symbol.uiValue}}&nbsp;'],
                                        ['result_unit >= 8', '{{add_time2.value}}&nbsp;{{symbol2.uiValue}}&nbsp;'],
                                        ['result_unit == 10 or result_unit == 12 or result_unit == 15', '{{add_time3.value}}&nbsp;{{symbol3.uiValue}}'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => '3nyKGdnushJ2KryqS6fbK',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'symbol', 'vt' => 'dependent', 'l' => ''],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'symbol2', 'vt' => 'dependent', 'l' => ''],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'symbol3', 'vt' => 'dependent', 'l' => ''],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'conversionFactor', 'vt' => 'dependent', 'l' => ''],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'result_unit2', 'vt' => 'numerical', 'l' => 'Units of result'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'time1 - time2 = time_difference',
                'var' => [
                    [
                        'l' => 'time1',
                        'f' => 'time2 + time_difference',
                        'r' => ['time_difference', 'time2'],
                    ],
                    [
                        'l' => 'time_difference',
                        'f' => 'time1 - time2',
                        'r' => ['time1', 'time2'],
                    ],
                    [
                        'l' => 'time2',
                        'f' => 'time1 - time_difference',
                        'r' => ['time1', 'time_difference'],
                    ],
                ],
            ],
            [
                'formula' => 'time_multiplicand * time_multiplier = time_product',
                'var' => [
                    [
                        'l' => 'time_multiplier',
                        'f' => 'time_product/time_multiplicand',
                        'r' => ['time_product', 'time_multiplicand'],
                    ],
                    [
                        'l' => 'time_product',
                        'f' => 'time_multiplicand*time_multiplier',
                        'r' => ['time_multiplier', 'time_multiplicand'],
                    ],
                    [
                        'l' => 'time_multiplicand',
                        'f' => 'time_product/time_multiplier',
                        'r' => ['time_multiplier', 'time_product'],
                    ],
                ],
            ],
            [
                'formula' => 'time_numerator / time_denominator = time_quotient',
                'var' => [
                    [
                        'l' => 'time_denominator',
                        'f' => 'time_numerator/time_quotient',
                        'r' => ['time_numerator', 'time_quotient'],
                    ],
                    [
                        'l' => 'time_numerator',
                        'f' => 'time_denominator*time_quotient',
                        'r' => ['time_denominator', 'time_quotient'],
                    ],
                    [
                        'l' => 'time_quotient',
                        'f' => 'time_numerator/time_denominator',
                        'r' => ['time_denominator', 'time_numerator'],
                    ],
                ],
            ],
            [
                'formula' => 'end_date_time - start_date_time = time_between',
                'var' => [
                    [
                        'l' => 'end_date_time',
                        'f' => 'start_date_time + time_between',
                        'r' => ['time_between', 'start_date_time'],
                    ],
                    [
                        'l' => 'time_between',
                        'f' => 'end_date_time - start_date_time',
                        'r' => ['end_date_time', 'start_date_time'],
                    ],
                    [
                        'l' => 'start_date_time',
                        'f' => 'end_date_time - time_between',
                        'r' => ['end_date_time', 'time_between'],
                    ],
                ],
            ],
            [
                'formula' => 'time_between_dates = end_date - start_date',
                'var' => [
                    [
                        'l' => 'end_date',
                        'f' => 'start_date + time_between_dates',
                        'r' => ['start_date', 'time_between_dates'],
                    ],
                    [
                        'l' => 'start_date',
                        'f' => 'end_date - time_between_dates',
                        'r' => ['end_date', 'time_between_dates'],
                    ],
                    [
                        'l' => 'time_between_dates',
                        'f' => 'end_date - start_date',
                        'r' => ['end_date', 'start_date'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'zA9HmvYLfwkKB1XFR9NMr' => [
                'name' => 'mode',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'oYY5cbi9INSKI42yMoLDy', 'label' => ' add time', 'value' => '0'],
                    ['uid' => 'hEGUe3VkjXYMLCZKYUVYd', 'label' => ' subtract time', 'value' => '1'],
                    ['uid' => 'qwoRHZz07mFBYq-wxvc1S', 'label' => ' multiply time', 'value' => '2'],
                    ['uid' => 'K8NF6AMpGOyb0A4OdzECw', 'label' => ' divide time', 'value' => '3'],
                    ['uid' => 'BuvxZVFfeGw9eDf568LHF', 'label' => ' find time between dates', 'value' => '4'],
                    ['uid' => 'UNRFONmysy8hT_0HOE77C', 'label' => '⏰ find time between dates and times', 'value' => '5'],
                ],
            ],
            'ukXv5ED9YgaDATKpZbv3q' => [
                'name' => 'units',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'VtElyAwIIkQFCmAtqXNoO', 'label' => 'milliseconds', 'value' => '0'],
                    ['uid' => 'KddGwHNF3zVNiyGV11bD9', 'label' => 'seconds', 'value' => '1'],
                    ['uid' => '8l_XiKWzcDWFUo3iGUHcm', 'label' => 'minutes', 'value' => '2'],
                    ['uid' => 'RqAR4NCQk2lJcZncH7cnQ', 'label' => 'hours', 'value' => '3'],
                    ['uid' => 'Yf9atoUrI3BFpuaHwGEcG', 'label' => 'days', 'value' => '4'],
                    ['uid' => 'ZQkZuSLN1ubg-ZDPRCz29', 'label' => 'weeks', 'value' => '5'],
                    ['uid' => 'XJmIPOKhfKPtaBiZKEHVv', 'label' => 'months', 'value' => '6'],
                    ['uid' => '2I9sBByfeNijOeaQGlcyH', 'label' => 'years', 'value' => '7'],
                    ['uid' => '3f1zjLUAEWXNvRlbHbHoz', 'label' => 'minutes / seconds', 'value' => '8'],
                    ['uid' => 'xBFc3EhS5U-iYsP748OwY', 'label' => 'hours / minutes', 'value' => '9'],
                    ['uid' => 'V4zOjhZ6I1QPKBJau4ses', 'label' => 'hours / minutes / seconds', 'value' => '10'],
                    ['uid' => 'KYxRgWyTRTeerm8hv11ds', 'label' => 'years / months', 'value' => '11'],
                    ['uid' => 'lwBFUbNAi_qkGQLFmte72', 'label' => 'years / months / days', 'value' => '12'],
                    ['uid' => 'OVk_552EXE0zfGJoKTFav', 'label' => 'weeks / days', 'value' => '13'],
                    ['uid' => 'EqmEZLcB1ILm_AFOB3kFe', 'label' => 'days / hours', 'value' => '14'],
                    ['uid' => 'ZJzmq0O42d4nwr4-wE-po', 'label' => 'days / hours / minutes', 'value' => '15'],
                ],
            ],
        ],
        'js' => <<<'TXT'
        "use strict";omni.onResult([],function(ctx,_ref){var conversionFactor=_ref.conversionFactor,result_unit=_ref.result_unit,course_1=_ref.course_1,course_2=_ref.course_2,course_3=_ref.course_3,course_4=_ref.course_4,course_5=_ref.course_5,course_6=_ref.course_6,course_7=_ref.course_7,course_8=_ref.course_8,course_9=_ref.course_9,course_10=_ref.course_10,course_11=_ref.course_11,course_12=_ref.course_12,course_13=_ref.course_13,course_14=_ref.course_14,course_15=_ref.course_15,course_16=_ref.course_16,course_17=_ref.course_17,course_18=_ref.course_18,course_19=_ref.course_19,course_20=_ref.course_20;var a1=Number(course_1),a2=Number(course_2),a3=Number(course_3),a4=Number(course_4),a5=Number(course_5),a6=Number(course_6),a7=Number(course_7),a8=Number(course_8),a9=Number(course_9),a10=Number(course_10),a11=Number(course_11),a12=Number(course_12),a13=Number(course_13),a14=Number(course_14),a15=Number(course_15),a16=Number(course_16),a17=Number(course_17),a18=Number(course_18),a19=Number(course_19),a20=Number(course_20),seconds=mathjs.sum(a1,a2,a3,a4,a5,a6,a7,a8,a9,a10,a11,a12,a13,a14,a15,a16,a17,a18,a19,a20);var time;var uid=result_unit;if(uid<=7){time=mathjs.divide(seconds,conversionFactor);var timeRounded=omniRound(time,10000);ctx.exportValue("add_time",timeRounded.toLocaleString())}else{time=convertMixedTimeUnits(seconds,uid);ctx.exportValue("add_time",time[0].toLocaleString());ctx.exportValue("add_time2",time[1]);ctx.exportValue("add_time3",time[2])}});var UNIT_SIZE={seconds:1,minutes:60,hours:3600,days:86400,weeks:604800,months:2592000,years:31536000};var UNIT_CHAINS={8:["minutes","seconds"],9:["hours","minutes"],10:["hours","minutes","seconds"],11:["years","months"],12:["years","months","days"],13:["weeks","days"],14:["days","hours"],15:["days","hours","minutes"]};function decomposeTime(totalSeconds,chainOfUnits){var results=[];var leftover=totalSeconds;for(var i=0;i<chainOfUnits.length;i++){var unit=chainOfUnits[i];var size=UNIT_SIZE[unit];var count=void 0;if(i<chainOfUnits.length-1){count=Math.floor(leftover/size);leftover=leftover%size}else{count=Math.round(leftover/size);leftover=0}results.push(count)}return results}function convertMixedTimeUnits(timeInSeconds,uid){var isNegative=timeInSeconds<0;if(isNegative){timeInSeconds=-timeInSeconds}var chain=UNIT_CHAINS[uid];var result=decomposeTime(timeInSeconds,chain);if(isNegative&&result.length){result[0]=-result[0]}return result}function omniRound(value,roundingFactor){if(value===0){return 0}var precision=0;var roundedValue;var tolerance=1/roundingFactor;do{roundedValue=mathjs.round(value,precision);precision++}while(mathjs.abs(roundedValue-value)>tolerance);return roundedValue}//# sourceURL=customJs.js
        TXT,
    ],
    'article' => [
        'intro' => 'The Time calculator turns the − Time 2, the = Time difference and the time into <strong>time 1 (Subtract time)</strong>.',
        'sections' => [
            ['title' => 'How does the Time calculator work?', 'html' => <<<'TXT'
            <p>The Time calculator takes the values in the form, applies the relationship described below and reports <strong>time 1 (Subtract time)</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the units of result (Add time)); then you give the start date and the start date with time; then you type in the − Time 2, the = Time difference, the time (Multiply time) and the equals (Multiply time).</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 6 options, such as add time, subtract time and multiply time. </li><li>A measured quantity, entered by default in hours / minutes / seconds. The unit chip switches it to any of the 27 supported units.</li><li>A measured quantity, entered by default in hours / minutes / seconds. The unit chip switches it to any of the 27 supported units.</li><li>A measured quantity, entered by default in hours / minutes / seconds. The unit chip switches it to any of the 27 supported units.</li><li>A measured quantity, entered by default in hours / minutes / seconds. The unit chip switches it to any of the 27 supported units.</li><li>A measured quantity, entered by default in hours / minutes / seconds. The unit chip switches it to any of the 27 supported units.</li><li>A measured quantity, entered by default in hours / minutes / seconds. The unit chip switches it to any of the 27 supported units.</li><li>A calendar date. Use the picker; the answer is recalculated the moment the date changes, and the count is done date-to-date rather than by subtracting timestamps.</li><li>A measured quantity, entered by default in years / months / days. The unit chip switches it to any of the 27 supported units.</li><li>A date and a time of day. Use the picker; the answer is recalculated the moment the date changes, and the count is done date-to-date rather than by subtracting timestamps.</li><li>A measured quantity, entered by default in days / hours / minutes. The unit chip switches it to any of the 27 supported units.</li><li>A measured quantity, entered by default in hours / minutes / seconds. The unit chip switches it to any of the 27 supported units.</li><li>A measured quantity, entered by default in hours / minutes / seconds. The unit chip switches it to any of the 27 supported units.</li><li>A measured quantity, entered by default in hours / minutes / seconds. The unit chip switches it to any of the 27 supported units.</li><li>A measured quantity, entered by default in hours / minutes / seconds. The unit chip switches it to any of the 27 supported units.</li><li>A measured quantity, entered by default in hours / minutes / seconds. The unit chip switches it to any of the 27 supported units.</li><li>A measured quantity, entered by default in hours / minutes / seconds. The unit chip switches it to any of the 27 supported units.</li><li>A measured quantity, entered by default in hours / minutes / seconds. The unit chip switches it to any of the 27 supported units.</li><li>A measured quantity, entered by default in hours / minutes / seconds. The unit chip switches it to any of the 27 supported units.</li><li>A measured quantity, entered by default in hours / minutes / seconds. The unit chip switches it to any of the 27 supported units.</li><li>A measured quantity, entered by default in hours / minutes / seconds. The unit chip switches it to any of the 27 supported units.</li><li>A measured quantity, entered by default in hours / minutes / seconds. The unit chip switches it to any of the 27 supported units.</li><li>A measured quantity, entered by default in hours / minutes / seconds. The unit chip switches it to any of the 27 supported units.</li><li>A measured quantity, entered by default in hours / minutes / seconds. The unit chip switches it to any of the 27 supported units.</li></ul><p>The form has 33 fields in total. The ones not listed here work the same way: a label, a unit chip where the quantity has units, and a box that updates the results as soon as it holds a valid number.</p><p>2 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Time 1 (Subtract time)</strong></td><td>A measured quantity, 27 units available.</td><td>hours / minutes / seconds</td><td>Calculated</td></tr><tr><td><strong>− Time 2</strong></td><td>A measured quantity, 27 units available.</td><td>hours / minutes / seconds</td><td>You supply it</td></tr><tr><td><strong>= Time difference</strong></td><td>A measured quantity, 27 units available.</td><td>hours / minutes / seconds</td><td>You supply it</td></tr><tr><td><strong>Time (Multiply time)</strong></td><td>A measured quantity, 27 units available.</td><td>hours / minutes / seconds</td><td>You supply it</td></tr><tr><td><strong>Equals (Multiply time)</strong></td><td>A measured quantity, 27 units available.</td><td>hours / minutes / seconds</td><td>You supply it</td></tr><tr><td><strong>Time (Divide time)</strong></td><td>A measured quantity, 27 units available.</td><td>hours / minutes / seconds</td><td>You supply it</td></tr><tr><td><strong>Equals (Divide time)</strong></td><td>A measured quantity, 27 units available.</td><td>hours / minutes / seconds</td><td>You supply it</td></tr><tr><td><strong>Start date</strong></td><td>A calendar date.</td><td>date</td><td>You supply it</td></tr><tr><td><strong>End date</strong></td><td>A calendar date.</td><td>date</td><td>Calculated</td></tr><tr><td><strong>Time between dates</strong></td><td>A measured quantity, 27 units available.</td><td>years / months / days</td><td>You supply it</td></tr><tr><td><strong>Start date with time</strong></td><td>A calendar date with a time of day.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>End date with time</strong></td><td>A calendar date with a time of day.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Time between</strong></td><td>A measured quantity, 27 units available.</td><td>days / hours / minutes</td><td>You supply it</td></tr><tr><td><strong>Time 1 (Add time)</strong></td><td>A measured quantity, 27 units available.</td><td>hours / minutes / seconds</td><td>You supply it</td></tr><tr><td><strong>\+ Time 2</strong></td><td>A measured quantity, 27 units available.</td><td>hours / minutes / seconds</td><td>You supply it</td></tr><tr><td><strong>\+ Time 3</strong></td><td>A measured quantity, 27 units available.</td><td>hours / minutes / seconds</td><td>You supply it</td></tr><tr><td><strong>\+ Time 4</strong></td><td>A measured quantity, 27 units available.</td><td>hours / minutes / seconds</td><td>You supply it</td></tr><tr><td><strong>\+ Time 5</strong></td><td>A measured quantity, 27 units available.</td><td>hours / minutes / seconds</td><td>You supply it</td></tr><tr><td><strong>\+ Time 6</strong></td><td>A measured quantity, 27 units available.</td><td>hours / minutes / seconds</td><td>You supply it</td></tr><tr><td><strong>\+ Time 7</strong></td><td>A measured quantity, 27 units available.</td><td>hours / minutes / seconds</td><td>You supply it</td></tr><tr><td><strong>\+ Time 8</strong></td><td>A measured quantity, 27 units available.</td><td>hours / minutes / seconds</td><td>You supply it</td></tr><tr><td><strong>\+ Time 9</strong></td><td>A measured quantity, 27 units available.</td><td>hours / minutes / seconds</td><td>You supply it</td></tr><tr><td><strong>\+ Time 10</strong></td><td>A measured quantity, 27 units available.</td><td>hours / minutes / seconds</td><td>You supply it</td></tr><tr><td><strong>\+ Time 11</strong></td><td>A measured quantity, 27 units available.</td><td>hours / minutes / seconds</td><td>You supply it</td></tr></tbody></table><p>The table lists the first 24 of 35 fields; the rest follow the same pattern.</p>
            TXT],
            ['title' => 'The formula behind the Time calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Time 1</span><span class="formula-eq">=</span><span class="formula-rhs">− Time 2 + = Time difference</span></div><div class="formula-row"><span class="formula-lhs">Multiplied by</span><span class="formula-eq">=</span><span class="formula-rhs">equals ÷ time</span></div><div class="formula-row"><span class="formula-lhs">Divided by</span><span class="formula-eq">=</span><span class="formula-rhs">time ÷ equals</span></div><div class="formula-row"><span class="formula-lhs">End date with time</span><span class="formula-eq">=</span><span class="formula-rhs">start date with time + time between</span></div><div class="formula-row"><span class="formula-lhs">End date</span><span class="formula-eq">=</span><span class="formula-rhs">start date + time between dates</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What is a worked example?', 'html' => <<<'TXT'
            <p>Suppose <strong>I want to</strong> set to add time, <strong>− Time</strong> = 10 hrs, <strong>= Time difference</strong> = 10 hrs and <strong>Units of result</strong> set to hours / minutes / seconds. Working through the relationship above gives <strong>Time 1</strong> = 20 hrs.</p><p>The point of the example is the scale, not the particular digits: swap in your own figures and the same relationship produces your answer.</p><ol><li>Enter the values listed above, matching the units each box asks for.</li><li>Read off the result. Any field you leave empty is the one the calculator solves for.</li><li>Sanity-check the number against the relationship: <strong>Time 1</strong> = 20 hrs should be roughly the size you expected from <strong>I want to</strong> set to add time and <strong>− Time</strong> = 10 hrs.</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in hours / minutes / seconds, and convertible to any of the 27 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A date and a time of day.</li><li>A calendar date.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Time, opening in hours / minutes / seconds</li><li>Time, opening in hours / minutes / seconds</li><li>Time, opening in hours / minutes / seconds</li><li>Time, opening in hours / minutes / seconds</li><li>Time, opening in hours / minutes / seconds</li><li>Time, opening in hours / minutes / seconds</li><li>Time, opening in hours / minutes / seconds</li><li>Time, opening in years / months / days</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Time calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Turning a rough idea into a number you can act on</li><li>Testing how sensitive an answer is to one input</li><li>Checking a figure someone else quoted</li><li>Any time the same 3 figures keep coming back — the − Time 2, the = Time difference and the time — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Dates are compared date to date in your own time zone, so a daylight-saving change will not shift the count by a day.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/generator-wattage">Generator wattage</a>, <a href="/everyday-life/glitch-text">Glitch text</a> and <a href="/everyday-life/glove-size">Glove size</a>.</p>
            TXT],
            ['title' => 'Practical assumptions and checks', 'html' => <<<'TXT'
            <p>This page contains several time operations, so start by choosing the mode that matches the question: a difference between two times, a product or a quotient. Enter values in the units shown and read the corresponding result rather than assuming every row is a clock time. For example, a duration such as 90 minutes can be expressed as 1.5 hours, but that is not the same thing as a time of day.</p><p>For a clock difference that crosses midnight, use the overnight control if one is offered or state the dates explicitly. Multiplication and division are useful for scaling durations, but they do not account for time zones or calendar transitions. Check that operands refer to compatible units before interpreting the answer; the arithmetic can be correct even when the inputs describe different kinds of time.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Time calculator work out?', 'a' => 'It returns time 1 (Subtract time), derived from the − Time 2, the = Time difference and the time.'],
            ['q' => 'What do I need to enter to use the Time calculator?', 'a' => 'The form asks for the − Time 2, the = Time difference and the time, which is 33 fields in total.'],
            ['q' => 'Can I enter time 1 (Subtract time) in a different unit?', 'a' => 'Yes. Time 1 (Subtract time) opens in hours / minutes / seconds and the chip beside it offers 27 units.'],
            ['q' => 'What is a typical result?', 'a' => 'With the values the page starts from, the calculator reports Time 1 = 20 hrs.'],
        ],
        'related' => [
            ['path' => '/everyday-life/generator-wattage', 'name' => 'Generator wattage'],
            ['path' => '/everyday-life/glitch-text', 'name' => 'Glitch text'],
            ['path' => '/everyday-life/glove-size', 'name' => 'Glove size'],
        ],
    ],
];
