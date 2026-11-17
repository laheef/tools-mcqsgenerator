<?php

/**
 * Pivot point
 * /finance/pivot-point
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Pivot point',
    'meta' => ['title' => 'Pivot point Calculator: Formula, Steps & Examples', 'description' => 'Pivot point works out resistance level 4 (R4) and Resistance level 3 (R3) and reports both. Results come back in USD, with any other unit a click away.', 'h1' => 'Pivot point Calculator', 'updated' => '2026-09-18'],
    'sections' => [
        [
            'title' => 'Pivot points calculation for trading',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'calcMethod',
                            'label' => 'Method',
                            'type' => 'select',
                            'options' => [
                                'Floor' => '0',
                                'Woodie' => '1',
                                'Camarilla' => '2',
                                'Fibonacci' => '3',
                                'DeMark\'s' => '4',
                            ],
                            'dataset' => 'method',
                            'default' => 'Floor',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'open_price',
                            'label' => 'Open price',
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
                            'name' => 'high',
                            'label' => 'High price',
                            'type' => 'number',
                            'help' => 'Previous trading session\'s highest price.',
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
                            'name' => 'low',
                            'label' => 'Low price',
                            'type' => 'number',
                            'help' => 'Previous trading session\'s lowest price.',
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
                            'name' => 'close',
                            'label' => 'Close price',
                            'type' => 'number',
                            'help' => 'Previous trading session\'s closing price.',
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
            'title' => 'Result',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'r4_c',
                            'label' => 'Resistance level 4 (R4)',
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
                            'name' => 'resistance_level_3',
                            'label' => 'Resistance level 3 (R3)',
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
                            'name' => 'r3_fib',
                            'label' => 'Resistance level 3 (R3)',
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
                            'name' => 'r3_c',
                            'label' => 'Resistance level 3 (R3)',
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
                            'name' => 'resistance_level_2',
                            'label' => 'Resistance level 2 (R2)',
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
                            'name' => 'r2_fib',
                            'label' => 'Resistance level 2 (R2)',
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
                            'name' => 'r2_c',
                            'label' => 'Resistance level 2 (R2)',
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
                            'name' => 'resistance_level_1',
                            'label' => 'Resistance level 1 (R1)',
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
                            'name' => 'r1_fib',
                            'label' => 'Resistance level 1 (R1)',
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
                            'name' => 'r1_c',
                            'label' => 'Resistance level 1 (R1)',
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
                            'name' => 'pivot_point',
                            'label' => 'Pivot point (PP)',
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
                            'name' => 'support_level_1',
                            'label' => 'Support level 1 (S1)',
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
                            'name' => 's1_fib',
                            'label' => 'Support level 1 (S1)',
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
                            'name' => 's1_c',
                            'label' => 'Support level 1 (S1)',
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
                            'name' => 'support_level_2',
                            'label' => 'Support level 2 (S2)',
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
                            'name' => 's2_fib',
                            'label' => 'Support level 2 (S2)',
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
                            'name' => 's2_c',
                            'label' => 'Support level 2 (S2)',
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
                            'name' => 'support_level_3',
                            'label' => 'Support level 3 (S3)',
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
                            'name' => 's3_fib',
                            'label' => 'Support level 3 (S3)',
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
                            'name' => 's3_c',
                            'label' => 'Support level 3 (S3)',
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
                            'name' => 's4_c',
                            'label' => 'Support level 4 (S4)',
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
                            'name' => 'r2_woodie',
                            'label' => 'Resistance level 2 (R2)',
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
                            'name' => 'r1_woodie',
                            'label' => 'Resistance level 1 (R1)',
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
                            'name' => 'pp_woodie',
                            'label' => 'Pivot point (PP)',
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
                            'name' => 's1_woodie',
                            'label' => 'Support level 1 (S1)',
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
                            'name' => 's2_woodie',
                            'label' => 'Support level 2 (S2)',
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
                            'name' => 'r1_demark',
                            'label' => 'Resistance level 1 (R1)',
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
                            'name' => 's1_demark',
                            'label' => 'Support level 1 (S1)',
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
    ],
    'formula' => [
        [
            'title' => 'pivot_point = (high + close + low) / 3 ',
            'results' => ['high' => '-close - low + 3*pivot_point', 'pivot_point' => '(1/3)*close + (1/3)*high + (1/3)*low', 'low' => '-close - high + 3*pivot_point', 'close' => '-high - low + 3*pivot_point'],
        ],
        [
            'title' => 'resistance_level_1 = 2 * pivot_point - low',
            'results' => ['resistance_level_1' => '-low + 2*pivot_point', 'low' => '2*pivot_point - resistance_level_1', 'pivot_point' => '(1/2)*low + (1/2)*resistance_level_1'],
        ],
        [
            'title' => 'resistance_level_2 = pivot_point + (resistance_level_1 - support_level_1)',
            'results' => ['resistance_level_2' => 'pivot_point + resistance_level_1 - support_level_1', 'resistance_level_1' => '-pivot_point + resistance_level_2 + support_level_1', 'pivot_point' => '-resistance_level_1 + resistance_level_2 + support_level_1', 'support_level_1' => 'pivot_point + resistance_level_1 - resistance_level_2'],
        ],
        [
            'title' => 'resistance_level_3 = high + 2 * (pivot_point - low)',
            'results' => ['high' => '2*low - 2*pivot_point + resistance_level_3', 'pivot_point' => '-1/2*high + low + (1/2)*resistance_level_3', 'low' => '(1/2)*high + pivot_point - 1/2*resistance_level_3', 'resistance_level_3' => 'high - 2*low + 2*pivot_point'],
        ],
        [
            'title' => 'support_level_1 = 2 * pivot_point - high',
            'results' => ['high' => '2*pivot_point - support_level_1', 'pivot_point' => '(1/2)*high + (1/2)*support_level_1', 'support_level_1' => '-high + 2*pivot_point'],
        ],
        [
            'title' => 'support_level_2 = pivot_point - (resistance_level_1 - support_level_1)',
            'results' => ['resistance_level_1' => 'pivot_point + support_level_1 - support_level_2', 'pivot_point' => 'resistance_level_1 - support_level_1 + support_level_2', 'support_level_1' => '-pivot_point + resistance_level_1 + support_level_2', 'support_level_2' => 'pivot_point - resistance_level_1 + support_level_1'],
        ],
        [
            'title' => 'support_level_3 = low - 2 * (high - pivot_point)',
            'results' => ['high' => '(1/2)*low + pivot_point - 1/2*support_level_3', 'pivot_point' => 'high - 1/2*low + (1/2)*support_level_3', 'low' => '2*high - 2*pivot_point + support_level_3', 'support_level_3' => '-2*high + low + 2*pivot_point'],
        ],
        [
            'title' => 'pp_woodie = (high + low + (2 * close)) / 4',
            'results' => ['high' => '-2*close - low + 4*pp_woodie', 'pp_woodie' => '(1/2)*close + (1/4)*high + (1/4)*low', 'low' => '-2*close - high + 4*pp_woodie', 'close' => '-1/2*high - 1/2*low + 2*pp_woodie'],
        ],
        [
            'title' => 'r1_woodie = (2 * pp_woodie) - low',
            'results' => ['low' => '2*pp_woodie - r1_woodie', 'r1_woodie' => '-low + 2*pp_woodie', 'pp_woodie' => '(1/2)*low + (1/2)*r1_woodie'],
        ],
        [
            'title' => 'r2_woodie = pp_woodie + high - low',
            'results' => ['high' => 'low - pp_woodie + r2_woodie', 'r2_woodie' => 'high - low + pp_woodie', 'low' => 'high + pp_woodie - r2_woodie', 'pp_woodie' => '-high + low + r2_woodie'],
        ],
        [
            'title' => 's1_woodie =  (2 * pp_woodie) - high',
            'results' => ['high' => '2*pp_woodie - s1_woodie', 'pp_woodie' => '(1/2)*high + (1/2)*s1_woodie', 's1_woodie' => '-high + 2*pp_woodie'],
        ],
        [
            'title' => 's2_woodie = pp_woodie - high + low',
            'results' => ['high' => 'low + pp_woodie - s2_woodie', 'low' => 'high - pp_woodie + s2_woodie', 's2_woodie' => '-high + low + pp_woodie', 'pp_woodie' => 'high - low + s2_woodie'],
        ],
        [
            'title' => 'r1_c = close + ((high - low) * 1.1/12)',
            'results' => ['high' => '-120/11*close + low + (120/11)*r1_c', 'r1_c' => 'close + (11/120)*high - 11/120*low', 'low' => '(120/11)*close + high - 120/11*r1_c', 'close' => '-11/120*high + (11/120)*low + r1_c'],
        ],
        [
            'title' => 'r2_c = close + ((high - low) * 1.1/6)',
            'results' => ['high' => '-60/11*close + low + (60/11)*r2_c', 'r2_c' => 'close + (11/60)*high - 11/60*low', 'low' => '(60/11)*close + high - 60/11*r2_c', 'close' => '-11/60*high + (11/60)*low + r2_c'],
        ],
        [
            'title' => 'r3_c = close + ((high - low) * 1.1/4)',
            'results' => ['high' => '-40/11*close + low + (40/11)*r3_c', 'r3_c' => 'close + (11/40)*high - 11/40*low', 'low' => '(40/11)*close + high - 40/11*r3_c', 'close' => '-11/40*high + (11/40)*low + r3_c'],
        ],
        [
            'title' => 'r4_c = close + ((high - low) * 1.1/2)',
            'results' => ['high' => '-20/11*close + low + (20/11)*r4_c', 'low' => '(20/11)*close + high - 20/11*r4_c', 'r4_c' => 'close + (11/20)*high - 11/20*low', 'close' => '-11/20*high + (11/20)*low + r4_c'],
        ],
        [
            'title' => 's1_c = close - ((high - low) * 1.1/12)',
            'results' => ['high' => '(120/11)*close + low - 120/11*s1_c', 's1_c' => 'close - 11/120*high + (11/120)*low', 'low' => '-120/11*close + high + (120/11)*s1_c', 'close' => '(11/120)*high - 11/120*low + s1_c'],
        ],
        [
            'title' => 's2_c = close - ((high - low) * 1.1/6)',
            'results' => ['high' => '(60/11)*close + low - 60/11*s2_c', 'low' => '-60/11*close + high + (60/11)*s2_c', 's2_c' => 'close - 11/60*high + (11/60)*low', 'close' => '(11/60)*high - 11/60*low + s2_c'],
        ],
        [
            'title' => 's3_c = close - ((high - low) * 1.1/4)',
            'results' => ['high' => '(40/11)*close + low - 40/11*s3_c', 'close' => '(11/40)*high - 11/40*low + s3_c', 'low' => '-40/11*close + high + (40/11)*s3_c', 's3_c' => 'close - 11/40*high + (11/40)*low'],
        ],
        [
            'title' => 's4_c = close - ((high - low) * 1.1/2)',
            'results' => ['high' => '(20/11)*close + low - 20/11*s4_c', 'close' => '(11/20)*high - 11/20*low + s4_c', 'low' => '-20/11*close + high + (20/11)*s4_c', 's4_c' => 'close - 11/20*high + (11/20)*low'],
        ],
        [
            'title' => 'r1_fib = pivot_point + ((high - low) * 0.382)',
            'results' => ['high' => 'low - 500/191*pivot_point + (500/191)*r1_fib', 'pivot_point' => '-191/500*high + (191/500)*low + r1_fib', 'low' => 'high + (500/191)*pivot_point - 500/191*r1_fib', 'r1_fib' => '(191/500)*high - 191/500*low + pivot_point'],
        ],
        [
            'title' => 'r2_fib = pivot_point + ((high - low) * 0.618)',
            'results' => ['high' => 'low - 500/309*pivot_point + (500/309)*r2_fib', 'pivot_point' => '-309/500*high + (309/500)*low + r2_fib', 'low' => 'high + (500/309)*pivot_point - 500/309*r2_fib', 'r2_fib' => '(309/500)*high - 309/500*low + pivot_point'],
        ],
        [
            'title' => 'r3_fib = pivot_point + ((high - low) * 1)',
            'results' => ['high' => 'low - pivot_point + r3_fib', 'pivot_point' => '-high + low + r3_fib', 'low' => 'high + pivot_point - r3_fib', 'r3_fib' => 'high - low + pivot_point'],
        ],
        [
            'title' => 's1_fib = pivot_point - ((high - low) * 0.382)',
            'results' => ['high' => 'low + (500/191)*pivot_point - 500/191*s1_fib', 'pivot_point' => '(191/500)*high - 191/500*low + s1_fib', 's1_fib' => '-191/500*high + (191/500)*low + pivot_point', 'low' => 'high - 500/191*pivot_point + (500/191)*s1_fib'],
        ],
        [
            'title' => 's2_fib = pivot_point - ((high - low) * 0.618)',
            'results' => ['high' => 'low + (500/309)*pivot_point - 500/309*s2_fib', 'pivot_point' => '(309/500)*high - 309/500*low + s2_fib', 's2_fib' => '-309/500*high + (309/500)*low + pivot_point', 'low' => 'high - 500/309*pivot_point + (500/309)*s2_fib'],
        ],
        [
            'title' => 's3_fib = pivot_point - ((high - low) * 1)',
            'results' => ['high' => 'low + pivot_point - s3_fib', 'pivot_point' => 'high - low + s3_fib', 's3_fib' => '-high + low + pivot_point', 'low' => 'high - pivot_point + s3_fib'],
        ],
        [
            'title' => 'r1_demark = demarkResistance(high, low, close, open_price)',
            'results' => ['r1_demark' => 'demarkResistance(high, low, close, open_price)'],
        ],
        [
            'title' => 's1_demark = demarkSupport(high, low, close, open_price) ',
            'results' => ['s1_demark' => 'demarkSupport(high, low, close, open_price)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("demarkResistance",function(high,low,close,open){var x;if(close<open){x=high+2*low+close}else if(close>open){x=2*high+low+close}else if(close===open){x=high+low+2*close}return x/2-low});omni.define("demarkSupport",function(high,low,close,open){var x;if(close<open){x=high+2*low+close}else if(close>open){x=2*high+low+close}else if(close===open){x=high+low+2*close}return x/2-high});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Pivot point takes High price, Low price and Close price and returns Resistance level 4 (R4) and Resistance level 3 (R3). The arithmetic is the whole method: resistance level 4 (R4) is worked out from high price by one formula, applied once. Resistance level 4 (R4) comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Pivot point calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Pivot point: it takes 3 numbers and reports Resistance level 4 (R4), Resistance level 3 (R3) and Resistance level 3 (R3).</p><p>In the form&#039;s own words, Pivot point (PP) = (1 ÷ 3) × Close price + (1 ÷ 3) × High price + (1 ÷ 3) × Low price.</p><p>The result panel carries Resistance level 4 (R4), Resistance level 3 (R3), Resistance level 3 (R3) and Resistance level 3 (R3), each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>High price</strong> — in USD. Previous trading session&#039;s highest price.</li><li><strong>Low price</strong> — in USD. Previous trading session&#039;s lowest price.</li><li><strong>Close price</strong> — in USD. Previous trading session&#039;s closing price.</li></ul><p>What you get back is Resistance level 4 (R4) in USD, Resistance level 3 (R3) in USD, Resistance level 3 (R3) in USD, Resistance level 3 (R3) in USD, Resistance level 2 (R2) in USD, Resistance level 2 (R2) in USD, Resistance level 2 (R2) in USD, Resistance level 1 (R1) in USD, Resistance level 1 (R1) in USD, Resistance level 1 (R1) in USD, Pivot point (PP) in USD, Support level 1 (S1) in USD, Support level 1 (S1) in USD, Support level 1 (S1) in USD, Support level 2 (S2) in USD, Support level 2 (S2) in USD, Support level 2 (S2) in USD, Support level 3 (S3) in USD, Support level 3 (S3) in USD, Support level 3 (S3) in USD, Support level 4 (S4) in USD, Resistance level 2 (R2) in USD, Resistance level 1 (R1) in USD, Pivot point (PP) in USD, Support level 1 (S1) in USD, Support level 2 (S2) in USD, Resistance level 1 (R1) in USD, Support level 1 (S1) in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: Resistance level 4 (R4) takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Pivot point (PP)</strong> = <code>(1 ÷ 3) × Close price + (1 ÷ 3) × High price + (1 ÷ 3) × Low price</code></li><li><strong>High price</strong> = <code>− Close price − Low price + 3 × Pivot point (PP)</code></li><li><strong>Low price</strong> = <code>− Close price − High price + 3 × Pivot point (PP)</code></li><li><strong>Close price</strong> = <code>− High price − Low price + 3 × Pivot point (PP)</code></li><li><strong>Resistance level 1 (R1)</strong> = <code>− Low price + 2 × Pivot point (PP)</code></li><li><strong>Resistance level 2 (R2)</strong> = <code>Pivot point (PP) + Resistance level 1 (R1) − Support level 1 (S1)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Pivot point (PP)</strong> = <code>(1 ÷ 3) × Close price + (1 ÷ 3) × High price + (1 ÷ 3) × Low price</code> — the form to use when Close price, High price and Low price are the values you have.</li><li><strong>High price</strong> = <code>− Close price − Low price + 3 × Pivot point (PP)</code> — the form to use when Close price, Low price and Pivot point (PP) are the values you have.</li><li><strong>Low price</strong> = <code>− Close price − High price + 3 × Pivot point (PP)</code> — the form to use when Close price, High price and Pivot point (PP) are the values you have.</li><li><strong>Close price</strong> = <code>− High price − Low price + 3 × Pivot point (PP)</code> — the form to use when High price, Low price and Pivot point (PP) are the values you have.</li><li><strong>Resistance level 1 (R1)</strong> = <code>− Low price + 2 × Pivot point (PP)</code> — the form to use when Low price and Pivot point (PP) are the values you have.</li><li><strong>Low price</strong> = <code>2 × Pivot point (PP) − Resistance level 1 (R1)</code> — the form to use when Pivot point (PP) and Resistance level 1 (R1) are the values you have.</li><li><strong>Pivot point (PP)</strong> = <code>(1 ÷ 2) × Low price + (1 ÷ 2) × Resistance level 1 (R1)</code> — the form to use when Low price and Resistance level 1 (R1) are the values you have.</li><li><strong>Resistance level 2 (R2)</strong> = <code>Pivot point (PP) + Resistance level 1 (R1) − Support level 1 (S1)</code> — the form to use when Pivot point (PP), Resistance level 1 (R1) and Support level 1 (S1) are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Pivot point (PP), High price and Low price can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Resistance level 4 (R4), Resistance level 3 (R3) and Resistance level 3 (R3) are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>High price left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If High price is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Low price left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Low price is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Close price left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Close price is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If High price is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Pivot point form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>High price</strong> takes a plain number with no unit attached. Previous trading session&#039;s highest price. Change it and Pivot point (PP), Low price and Close price changes with it. Fill it from a measurement rather than a memory — High price is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Low price</strong> takes a plain number with no unit attached. Previous trading session&#039;s lowest price. Change it and High price, Pivot point (PP) and Close price changes with it. Fill it from a measurement rather than a memory — Low price is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Close price</strong> takes a plain number with no unit attached. Previous trading session&#039;s closing price. Change it and High price, Pivot point (PP) and Low price changes with it. Fill it from a measurement rather than a memory — Close price is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have High price, Low price and Close price ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with High price — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Resistance level 4 (R4) in USD against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Resistance level 4 (R4) follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes High price, Low price and Close price are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are High price, Low price and Close price and the number you are missing is Resistance level 4 (R4) and Resistance level 3 (R3).</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/debt-to-capital">Debt-to-capital ratio Calculator</a>, <a href="/finance/defensive-interval-ratio">Defensive interval ratio Calculator</a> and <a href="/finance/deferred-annuity">Deferred annuity Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Pivot point is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Pivot point calculator work out?', 'a' => <<<'TXT'
            Resistance level 4 (R4), Resistance level 3 (R3), Resistance level 3 (R3) and Resistance level 3 (R3), from Close price, High price and Low price. The relationship is Pivot point (PP) = (1 ÷ 3) × Close price + (1 ÷ 3) × High price + (1 ÷ 3) × Low price.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            High price (USD), Low price (USD), Close price (USD). Enter high price, low price and close price; Resistance level 4 (R4) is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Pivot point (PP), High price, Low price and Close price can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Resistance level 4 (R4) is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave High price blank and the page solves for it, reporting Resistance level 4 (R4) instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Resistance level 4 (R4) at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/debt-to-capital', 'name' => 'Debt-to-capital ratio Calculator'],
            ['path' => '/finance/defensive-interval-ratio', 'name' => 'Defensive interval ratio Calculator'],
            ['path' => '/finance/deferred-annuity', 'name' => 'Deferred annuity Calculator'],
        ],
        'authors' => [],
    ],
];
