<?php

/**
 * Beta stock
 * /finance/beta-stock
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Beta stock',
    'meta' => ['title' => 'Beta stock Calculator: Formula, Steps & Examples', 'description' => 'Beta stock works out 68th day Asset price and 68th day Benchmark and reports both. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Beta stock Calculator', 'updated' => '2026-09-26'],
    'sections' => [
        [
            'title' => 'Data',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p1',
                            'label' => '1st day Asset price',
                            'type' => 'number',
                            'help' => 'The oldest price of your stock in the period you want to check.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q1',
                            'label' => '1st day Benchmark price',
                            'type' => 'number',
                            'help' => 'The oldest price of your benchmark (e.g., SP500) in the period you want to check.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p2',
                            'label' => '2nd day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q2',
                            'label' => '2nd day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p3',
                            'label' => '3rd day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q3',
                            'label' => '3rd day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p4',
                            'label' => '4th day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q4',
                            'label' => '4th day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p5',
                            'label' => '5th day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q5',
                            'label' => '5th day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p6',
                            'label' => '6th day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q6',
                            'label' => '6th day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p7',
                            'label' => '7th day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q7',
                            'label' => '7th day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p8',
                            'label' => '8th day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q8',
                            'label' => '8th day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p9',
                            'label' => '9th day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q9',
                            'label' => '9th day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p10',
                            'label' => '10th day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q10',
                            'label' => '10th day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p11',
                            'label' => '11th day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q11',
                            'label' => '11th day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p12',
                            'label' => '12th day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q12',
                            'label' => '12th day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p13',
                            'label' => '13th day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q13',
                            'label' => '13th day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p14',
                            'label' => '14th day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q14',
                            'label' => '14th day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p15',
                            'label' => '15th day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q15',
                            'label' => '15th day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p16',
                            'label' => '16th day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q16',
                            'label' => '16th day Benchmark ',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p17',
                            'label' => '17th day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q17',
                            'label' => '17th day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p18',
                            'label' => '18th day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q18',
                            'label' => '18th day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p19',
                            'label' => '19th day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q19',
                            'label' => '19th day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p20',
                            'label' => '20th day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q20',
                            'label' => '20th day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p21',
                            'label' => '21st day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q21',
                            'label' => '21st day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p22',
                            'label' => '22nd day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q22',
                            'label' => '22nd day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p23',
                            'label' => '23rd day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q23',
                            'label' => '23rd day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p24',
                            'label' => '24th day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q24',
                            'label' => '24th day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p25',
                            'label' => '25th day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q25',
                            'label' => '25th day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p26',
                            'label' => '26th day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q26',
                            'label' => '26th day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p27',
                            'label' => '27th day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q27',
                            'label' => '27th day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p28',
                            'label' => '28th day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q28',
                            'label' => '28th day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p29',
                            'label' => '29th day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q29',
                            'label' => '29th day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p30',
                            'label' => '30th day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q30',
                            'label' => '30th day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p31',
                            'label' => '31st day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q31',
                            'label' => '31st day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p32',
                            'label' => '32nd day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q32',
                            'label' => '32nd day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p33',
                            'label' => '33rd day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q33',
                            'label' => '33rd day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p34',
                            'label' => '34th day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q34',
                            'label' => '34th day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p35',
                            'label' => '35th day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q35',
                            'label' => '35th day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p36',
                            'label' => '36th day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q36',
                            'label' => '36th day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p37',
                            'label' => '37th day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q37',
                            'label' => '37th day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p38',
                            'label' => '38th day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q38',
                            'label' => '38th day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p39',
                            'label' => '39th day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q39',
                            'label' => '39th day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p40',
                            'label' => '40th day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q40',
                            'label' => '40th day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p41',
                            'label' => '41st day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q41',
                            'label' => '41st day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p42',
                            'label' => '42nd day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q42',
                            'label' => '42nd day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p43',
                            'label' => '43rd day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q43',
                            'label' => '43rd day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p44',
                            'label' => '44th day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q44',
                            'label' => '44th day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p45',
                            'label' => '45th day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q45',
                            'label' => '45th day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p46',
                            'label' => '46th day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q46',
                            'label' => '46th day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p47',
                            'label' => '47th day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q47',
                            'label' => '47th day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p48',
                            'label' => '48th day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q48',
                            'label' => '48th day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p49',
                            'label' => '49th day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q49',
                            'label' => '49th day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p50',
                            'label' => '50th day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q50',
                            'label' => '50th day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p51',
                            'label' => '51st day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q51',
                            'label' => '51st day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p52',
                            'label' => '52nd day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q52',
                            'label' => '52nd day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p53',
                            'label' => '53rd day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q53',
                            'label' => '53rd day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p54',
                            'label' => '54th day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q54',
                            'label' => '54th day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p55',
                            'label' => '55th day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q55',
                            'label' => '55th day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p56',
                            'label' => '56th day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q56',
                            'label' => '56th day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p57',
                            'label' => '57th day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q57',
                            'label' => '57th day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p58',
                            'label' => '58th day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q58',
                            'label' => '58th day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p59',
                            'label' => '59th day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q59',
                            'label' => '59th day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p60',
                            'label' => '60th day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q60',
                            'label' => '60th day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p61',
                            'label' => '61st day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q61',
                            'label' => '61st day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p62',
                            'label' => '62nd day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q62',
                            'label' => '62nd day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p63',
                            'label' => '63rd day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q63',
                            'label' => '63rd day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p64',
                            'label' => '64th day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q64',
                            'label' => '64th day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p65',
                            'label' => '65th day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q65',
                            'label' => '65th day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p66',
                            'label' => '66th day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q66',
                            'label' => '66th day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p67',
                            'label' => '67th day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q67',
                            'label' => '67th day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p68',
                            'label' => '68th day Asset price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'readonly' => true,
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'q68',
                            'label' => '68th day Benchmark',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'readonly' => true,
                            'rounding' => ['standard', '2'],
                            'min' => 2,
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
                            'name' => 'show',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Graph the prices' => '1', '' => '0'],
                            'dataset' => 'show',
                            'control' => 'CHECKBOX',
                            'default' => '',
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
                            'name' => 'your_beta',
                            'label' => '',
                            'type' => 'select',
                            'options' => [
                                'Your Beta:' => '-77',
                                '**Input some data!**' => '-88',
                                'The calculator requires **at least four pairs** of asset and benchmark prices to operate.' => '-888',
                                'For the data prices you provided, Beta cannot be computed! ' => '-99',
                                'This is because the **market variance is zero.**' => '-999',
                                <<<'TXT'
**Your stock moves in opposite direction to the market.** That means if the market goes up, your stock is likely to go down in price. The opposite also applies. 
TXT => '1',
                                '**Your stock has zero correlation with the market.** Both stock and market benchmark prices move independently. ' => '2',
                                <<<'TXT'
**Your stock has a perfect correlation with the market.** That means if the market goes up, your stock is likely to go up too. Consequently, the opposite also applies. 
TXT => '3',
                                <<<'TXT'
**Your stock is less volatile than the market.** In a bull market, your asset will underperform the benchmark. In a bear market, your asset will be more defensive than the benchmark and produce lower losses. 
TXT => '4',
                                <<<'TXT'
**Your stock is more volatile than the market.** In a bull market, your asset will outperform the benchmark. In a bear market, your asset will perform worse than the benchmark. 
TXT => '5',
                            ],
                            'dataset' => 'string',
                            'control' => 'DROPDOWN',
                            'default' => 'Your Beta:',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'beta_1',
                            'label' => '',
                            'type' => 'select',
                            'options' => [
                                'Your Beta:' => '-77',
                                '**Input some data!**' => '-88',
                                'The calculator requires **at least four pairs** of asset and benchmark prices to operate.' => '-888',
                                'For the data prices you provided, Beta cannot be computed! ' => '-99',
                                'This is because the **market variance is zero.**' => '-999',
                                <<<'TXT'
**Your stock moves in opposite direction to the market.** That means if the market goes up, your stock is likely to go down in price. The opposite also applies. 
TXT => '1',
                                '**Your stock has zero correlation with the market.** Both stock and market benchmark prices move independently. ' => '2',
                                <<<'TXT'
**Your stock has a perfect correlation with the market.** That means if the market goes up, your stock is likely to go up too. Consequently, the opposite also applies. 
TXT => '3',
                                <<<'TXT'
**Your stock is less volatile than the market.** In a bull market, your asset will underperform the benchmark. In a bear market, your asset will be more defensive than the benchmark and produce lower losses. 
TXT => '4',
                                <<<'TXT'
**Your stock is more volatile than the market.** In a bull market, your asset will outperform the benchmark. In a bear market, your asset will perform worse than the benchmark. 
TXT => '5',
                            ],
                            'dataset' => 'string',
                            'control' => 'DROPDOWN',
                            'default' => <<<'TXT'
                            **Your stock has a perfect correlation with the market.** That means if the market goes up, your stock is likely to go up too. Consequently, the opposite also applies. 
                            TXT,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'y',
                            'label' => 'Y',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'beta_1plus',
                            'label' => '',
                            'type' => 'select',
                            'options' => [
                                'Your Beta:' => '-77',
                                '**Input some data!**' => '-88',
                                'The calculator requires **at least four pairs** of asset and benchmark prices to operate.' => '-888',
                                'For the data prices you provided, Beta cannot be computed! ' => '-99',
                                'This is because the **market variance is zero.**' => '-999',
                                <<<'TXT'
**Your stock moves in opposite direction to the market.** That means if the market goes up, your stock is likely to go down in price. The opposite also applies. 
TXT => '1',
                                '**Your stock has zero correlation with the market.** Both stock and market benchmark prices move independently. ' => '2',
                                <<<'TXT'
**Your stock has a perfect correlation with the market.** That means if the market goes up, your stock is likely to go up too. Consequently, the opposite also applies. 
TXT => '3',
                                <<<'TXT'
**Your stock is less volatile than the market.** In a bull market, your asset will underperform the benchmark. In a bear market, your asset will be more defensive than the benchmark and produce lower losses. 
TXT => '4',
                                <<<'TXT'
**Your stock is more volatile than the market.** In a bull market, your asset will outperform the benchmark. In a bear market, your asset will perform worse than the benchmark. 
TXT => '5',
                            ],
                            'dataset' => 'string',
                            'control' => 'DROPDOWN',
                            'default' => <<<'TXT'
                            **Your stock is more volatile than the market.** In a bull market, your asset will outperform the benchmark. In a bear market, your asset will perform worse than the benchmark. 
                            TXT,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'no_beta',
                            'label' => '',
                            'type' => 'select',
                            'options' => [
                                'Your Beta:' => '-77',
                                '**Input some data!**' => '-88',
                                'The calculator requires **at least four pairs** of asset and benchmark prices to operate.' => '-888',
                                'For the data prices you provided, Beta cannot be computed! ' => '-99',
                                'This is because the **market variance is zero.**' => '-999',
                                <<<'TXT'
**Your stock moves in opposite direction to the market.** That means if the market goes up, your stock is likely to go down in price. The opposite also applies. 
TXT => '1',
                                '**Your stock has zero correlation with the market.** Both stock and market benchmark prices move independently. ' => '2',
                                <<<'TXT'
**Your stock has a perfect correlation with the market.** That means if the market goes up, your stock is likely to go up too. Consequently, the opposite also applies. 
TXT => '3',
                                <<<'TXT'
**Your stock is less volatile than the market.** In a bull market, your asset will underperform the benchmark. In a bear market, your asset will be more defensive than the benchmark and produce lower losses. 
TXT => '4',
                                <<<'TXT'
**Your stock is more volatile than the market.** In a bull market, your asset will outperform the benchmark. In a bear market, your asset will perform worse than the benchmark. 
TXT => '5',
                            ],
                            'dataset' => 'string',
                            'control' => 'DROPDOWN',
                            'default' => 'For the data prices you provided, Beta cannot be computed! ',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'beta_01',
                            'label' => '',
                            'type' => 'select',
                            'options' => [
                                'Your Beta:' => '-77',
                                '**Input some data!**' => '-88',
                                'The calculator requires **at least four pairs** of asset and benchmark prices to operate.' => '-888',
                                'For the data prices you provided, Beta cannot be computed! ' => '-99',
                                'This is because the **market variance is zero.**' => '-999',
                                <<<'TXT'
**Your stock moves in opposite direction to the market.** That means if the market goes up, your stock is likely to go down in price. The opposite also applies. 
TXT => '1',
                                '**Your stock has zero correlation with the market.** Both stock and market benchmark prices move independently. ' => '2',
                                <<<'TXT'
**Your stock has a perfect correlation with the market.** That means if the market goes up, your stock is likely to go up too. Consequently, the opposite also applies. 
TXT => '3',
                                <<<'TXT'
**Your stock is less volatile than the market.** In a bull market, your asset will underperform the benchmark. In a bear market, your asset will be more defensive than the benchmark and produce lower losses. 
TXT => '4',
                                <<<'TXT'
**Your stock is more volatile than the market.** In a bull market, your asset will outperform the benchmark. In a bear market, your asset will perform worse than the benchmark. 
TXT => '5',
                            ],
                            'dataset' => 'string',
                            'control' => 'DROPDOWN',
                            'default' => <<<'TXT'
                            **Your stock is less volatile than the market.** In a bull market, your asset will underperform the benchmark. In a bear market, your asset will be more defensive than the benchmark and produce lower losses. 
                            TXT,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'beta_neg',
                            'label' => '',
                            'type' => 'select',
                            'options' => [
                                'Your Beta:' => '-77',
                                '**Input some data!**' => '-88',
                                'The calculator requires **at least four pairs** of asset and benchmark prices to operate.' => '-888',
                                'For the data prices you provided, Beta cannot be computed! ' => '-99',
                                'This is because the **market variance is zero.**' => '-999',
                                <<<'TXT'
**Your stock moves in opposite direction to the market.** That means if the market goes up, your stock is likely to go down in price. The opposite also applies. 
TXT => '1',
                                '**Your stock has zero correlation with the market.** Both stock and market benchmark prices move independently. ' => '2',
                                <<<'TXT'
**Your stock has a perfect correlation with the market.** That means if the market goes up, your stock is likely to go up too. Consequently, the opposite also applies. 
TXT => '3',
                                <<<'TXT'
**Your stock is less volatile than the market.** In a bull market, your asset will underperform the benchmark. In a bear market, your asset will be more defensive than the benchmark and produce lower losses. 
TXT => '4',
                                <<<'TXT'
**Your stock is more volatile than the market.** In a bull market, your asset will outperform the benchmark. In a bear market, your asset will perform worse than the benchmark. 
TXT => '5',
                            ],
                            'dataset' => 'string',
                            'control' => 'DROPDOWN',
                            'default' => <<<'TXT'
                            **Your stock moves in opposite direction to the market.** That means if the market goes up, your stock is likely to go down in price. The opposite also applies. 
                            TXT,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'no_data',
                            'label' => '',
                            'type' => 'select',
                            'options' => [
                                'Your Beta:' => '-77',
                                '**Input some data!**' => '-88',
                                'The calculator requires **at least four pairs** of asset and benchmark prices to operate.' => '-888',
                                'For the data prices you provided, Beta cannot be computed! ' => '-99',
                                'This is because the **market variance is zero.**' => '-999',
                                <<<'TXT'
**Your stock moves in opposite direction to the market.** That means if the market goes up, your stock is likely to go down in price. The opposite also applies. 
TXT => '1',
                                '**Your stock has zero correlation with the market.** Both stock and market benchmark prices move independently. ' => '2',
                                <<<'TXT'
**Your stock has a perfect correlation with the market.** That means if the market goes up, your stock is likely to go up too. Consequently, the opposite also applies. 
TXT => '3',
                                <<<'TXT'
**Your stock is less volatile than the market.** In a bull market, your asset will underperform the benchmark. In a bear market, your asset will be more defensive than the benchmark and produce lower losses. 
TXT => '4',
                                <<<'TXT'
**Your stock is more volatile than the market.** In a bull market, your asset will outperform the benchmark. In a bear market, your asset will perform worse than the benchmark. 
TXT => '5',
                            ],
                            'dataset' => 'string',
                            'control' => 'DROPDOWN',
                            'default' => 'The calculator requires **at least four pairs** of asset and benchmark prices to operate.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'beta_0',
                            'label' => '',
                            'type' => 'select',
                            'options' => [
                                'Your Beta:' => '-77',
                                '**Input some data!**' => '-88',
                                'The calculator requires **at least four pairs** of asset and benchmark prices to operate.' => '-888',
                                'For the data prices you provided, Beta cannot be computed! ' => '-99',
                                'This is because the **market variance is zero.**' => '-999',
                                <<<'TXT'
**Your stock moves in opposite direction to the market.** That means if the market goes up, your stock is likely to go down in price. The opposite also applies. 
TXT => '1',
                                '**Your stock has zero correlation with the market.** Both stock and market benchmark prices move independently. ' => '2',
                                <<<'TXT'
**Your stock has a perfect correlation with the market.** That means if the market goes up, your stock is likely to go up too. Consequently, the opposite also applies. 
TXT => '3',
                                <<<'TXT'
**Your stock is less volatile than the market.** In a bull market, your asset will underperform the benchmark. In a bear market, your asset will be more defensive than the benchmark and produce lower losses. 
TXT => '4',
                                <<<'TXT'
**Your stock is more volatile than the market.** In a bull market, your asset will outperform the benchmark. In a bear market, your asset will perform worse than the benchmark. 
TXT => '5',
                            ],
                            'dataset' => 'string',
                            'control' => 'DROPDOWN',
                            'default' => '**Your stock has zero correlation with the market.** Both stock and market benchmark prices move independently. ',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'input_data',
                            'label' => '',
                            'type' => 'select',
                            'options' => [
                                'Your Beta:' => '-77',
                                '**Input some data!**' => '-88',
                                'The calculator requires **at least four pairs** of asset and benchmark prices to operate.' => '-888',
                                'For the data prices you provided, Beta cannot be computed! ' => '-99',
                                'This is because the **market variance is zero.**' => '-999',
                                <<<'TXT'
**Your stock moves in opposite direction to the market.** That means if the market goes up, your stock is likely to go down in price. The opposite also applies. 
TXT => '1',
                                '**Your stock has zero correlation with the market.** Both stock and market benchmark prices move independently. ' => '2',
                                <<<'TXT'
**Your stock has a perfect correlation with the market.** That means if the market goes up, your stock is likely to go up too. Consequently, the opposite also applies. 
TXT => '3',
                                <<<'TXT'
**Your stock is less volatile than the market.** In a bull market, your asset will underperform the benchmark. In a bear market, your asset will be more defensive than the benchmark and produce lower losses. 
TXT => '4',
                                <<<'TXT'
**Your stock is more volatile than the market.** In a bull market, your asset will outperform the benchmark. In a bear market, your asset will perform worse than the benchmark. 
TXT => '5',
                            ],
                            'dataset' => 'string',
                            'control' => 'DROPDOWN',
                            'default' => '**Input some data!**',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'var_zero',
                            'label' => '',
                            'type' => 'select',
                            'options' => [
                                'Your Beta:' => '-77',
                                '**Input some data!**' => '-88',
                                'The calculator requires **at least four pairs** of asset and benchmark prices to operate.' => '-888',
                                'For the data prices you provided, Beta cannot be computed! ' => '-99',
                                'This is because the **market variance is zero.**' => '-999',
                                <<<'TXT'
**Your stock moves in opposite direction to the market.** That means if the market goes up, your stock is likely to go down in price. The opposite also applies. 
TXT => '1',
                                '**Your stock has zero correlation with the market.** Both stock and market benchmark prices move independently. ' => '2',
                                <<<'TXT'
**Your stock has a perfect correlation with the market.** That means if the market goes up, your stock is likely to go up too. Consequently, the opposite also applies. 
TXT => '3',
                                <<<'TXT'
**Your stock is less volatile than the market.** In a bull market, your asset will underperform the benchmark. In a bear market, your asset will be more defensive than the benchmark and produce lower losses. 
TXT => '4',
                                <<<'TXT'
**Your stock is more volatile than the market.** In a bull market, your asset will outperform the benchmark. In a bear market, your asset will perform worse than the benchmark. 
TXT => '5',
                            ],
                            'dataset' => 'string',
                            'control' => 'DROPDOWN',
                            'default' => 'This is because the **market variance is zero.**',
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
                        ['name' => 'beta', 'label' => 'Beta', 'type' => 'number', 'readonly' => true],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'text', 'label' => 'Text', 'type' => 'number', 'readonly' => true],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'q1+p1 = y',
            'results' => ['y' => 'p1 + q1', 'p1' => '-q1 + y', 'q1' => '-p1 + y'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.onResult([],function(ctx,_ref){var p1=_ref.p1,p2=_ref.p2,p3=_ref.p3,p4=_ref.p4,p5=_ref.p5,p6=_ref.p6,p7=_ref.p7,p8=_ref.p8,p9=_ref.p9,p10=_ref.p10,p11=_ref.p11,p12=_ref.p12,p13=_ref.p13,p14=_ref.p14,p15=_ref.p15,p16=_ref.p16,p17=_ref.p17,p18=_ref.p18,p19=_ref.p19,p20=_ref.p20,p21=_ref.p21,p22=_ref.p22,p23=_ref.p23,p24=_ref.p24,p25=_ref.p25,p26=_ref.p26,p27=_ref.p27,p28=_ref.p28,p29=_ref.p29,p30=_ref.p30,p31=_ref.p31,p32=_ref.p32,p33=_ref.p33,p34=_ref.p34,p35=_ref.p35,p36=_ref.p36,p37=_ref.p37,p38=_ref.p38,p39=_ref.p39,p40=_ref.p40,p41=_ref.p41,p42=_ref.p42,p43=_ref.p43,p44=_ref.p44,p45=_ref.p45,p46=_ref.p46,p47=_ref.p47,p48=_ref.p48,p49=_ref.p49,p50=_ref.p50,p51=_ref.p51,p52=_ref.p52,p53=_ref.p53,p54=_ref.p54,p55=_ref.p55,p56=_ref.p56,p57=_ref.p57,p58=_ref.p58,p59=_ref.p59,p60=_ref.p60,p61=_ref.p61,p62=_ref.p62,p63=_ref.p63,p64=_ref.p64,p65=_ref.p65,p66=_ref.p66,p67=_ref.p67,p68=_ref.p68,p69=_ref.p69,q1=_ref.q1,q2=_ref.q2,q3=_ref.q3,q4=_ref.q4,q5=_ref.q5,q6=_ref.q6,q7=_ref.q7,q8=_ref.q8,q9=_ref.q9,q10=_ref.q10,q11=_ref.q11,q12=_ref.q12,q13=_ref.q13,q14=_ref.q14,q15=_ref.q15,q16=_ref.q16,q17=_ref.q17,q18=_ref.q18,q19=_ref.q19,q20=_ref.q20,q21=_ref.q21,q22=_ref.q22,q23=_ref.q23,q24=_ref.q24,q25=_ref.q25,q26=_ref.q26,q27=_ref.q27,q28=_ref.q28,q29=_ref.q29,q30=_ref.q30,q31=_ref.q31,q32=_ref.q32,q33=_ref.q33,q34=_ref.q34,q35=_ref.q35,q36=_ref.q36,q37=_ref.q37,q38=_ref.q38,q39=_ref.q39,q40=_ref.q40,q41=_ref.q41,q42=_ref.q42,q43=_ref.q43,q44=_ref.q44,q45=_ref.q45,q46=_ref.q46,q47=_ref.q47,q48=_ref.q48,q49=_ref.q49,q50=_ref.q50,q51=_ref.q51,q52=_ref.q52,q53=_ref.q53,q54=_ref.q54,q55=_ref.q55,q56=_ref.q56,q57=_ref.q57,q58=_ref.q58,q59=_ref.q59,q60=_ref.q60,q61=_ref.q61,q62=_ref.q62,q63=_ref.q63,q64=_ref.q64,q65=_ref.q65,q66=_ref.q66,q67=_ref.q67,q68=_ref.q68,q69=_ref.q69;var pVar=[p1,p2,p3,p4,p5,p6,p7,p8,p9,p10,p11,p12,p13,p14,p15,p16,p17,p18,p19,p20,p21,p22,p23,p24,p25,p26,p27,p28,p29,p30,p31,p32,p33,p34,p35,p36,p37,p38,p39,p40,p41,p42,p43,p44,p45,p46,p47,p48,p49,p50,p51,p52,p53,p54,p55,p56,p57,p58,p59,p60,p61,p62,p63,p64,p65,p66,p67,p68,p69];var qVar=[q1,q2,q3,q4,q5,q6,q7,q8,q9,q10,q11,q12,q13,q14,q15,q16,q17,q18,q19,q20,q21,q22,q23,q24,q25,q26,q27,q28,q29,q30,q31,q32,q33,q34,q35,q36,q37,q38,q39,q40,q41,q42,q43,q44,q45,q46,q47,q48,q49,q50,q51,q52,q53,q54,q55,q56,q57,q58,q59,q60,q61,q62,q63,q64,q65,q66,q67,q68,q69];var pList=[];var qList=[];var beta;for(var i=0;i<50;i++){if(pVar[i]!==null&&qVar[i]!==null){pList.push(pVar[i]);qList.push(qVar[i])}}var percentchangeasset=getPercentageChange(pList);var percentchangemarket=getPercentageChange(qList);var average1=getAverage(percentchangeasset);var sumofsquares=0;var average2=getAverage(percentchangemarket);for(var _i=0;_i<percentchangemarket.length;_i++){sumofsquares+=mathjs.pow(percentchangemarket[_i]-average2,2)}var varianceMarket=sumofsquares/percentchangemarket.length;var covarianceAssetMarket=0;var sumofdeviationsmultiplied=0;if(percentchangemarket.length===percentchangeasset.length){for(var _i2=0;_i2<percentchangemarket.length;_i2++){sumofdeviationsmultiplied+=(percentchangeasset[_i2]-average1)*(percentchangemarket[_i2]-average2);covarianceAssetMarket=sumofdeviationsmultiplied/percentchangeasset.length}}var text="";var bbeta=covarianceAssetMarket/varianceMarket;if(pList.length<4||qList.length<4){beta=ctx.getRawInput("input_data");text=ctx.getRawInput("no_data")}else if(varianceMarket==0){beta=ctx.getRawInput("no_beta");text=ctx.getRawInput("var_zero")}else{beta=ctx.getRawInput("your_beta")+" **"+bbeta.toFixed(6)+"**";if(bbeta<0){text=ctx.getRawInput("beta_neg")}else if(bbeta>0&&bbeta<1){text=ctx.getRawInput("beta_01")}else if(bbeta==0){text=ctx.getRawInput("beta_0")}else if(bbeta==1){text=ctx.getRawInput("beta_1")}else if(bbeta>1){text=ctx.getRawInput("beta_1plus")}}ctx.exportValue("beta",beta);ctx.exportValue("text",text)});function getPercentageChange(array){var result=[];for(var i=0;i<array.length-1;i++){result.push((array[i+1]-array[i])/array[i])}return result}function getAverage(array){var result=0;for(var i=0;i<array.length;i++){result+=array[i]}result/=array.length;return result}//# sourceURL=customJs.js
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
        'beta',
        'text'
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
        Beta stock turns 1st day Asset price, 1st day Benchmark price and 2nd day Asset price into 68th day Asset price and 68th day Benchmark. Nothing is looked up on this page: 68th day Asset price is computed from 1st day Asset price and the other boxes, so an unusual pair of values gives an honest answer rather than an error. 68th day Asset price is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Beta stock calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Beta stock: it takes 135 numbers and reports 68th day Asset price, 68th day Benchmark and Beta.</p><p>Written with the labels from the form, Y = 1st day Asset price + 1st day Benchmark price.</p><p>The answers are 68th day Asset price, 68th day Benchmark, Beta and Text; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 135 boxes and the page has everything it needs.</p><ul><li><strong>1st day Asset price</strong> — in USD. The oldest price of your stock in the period you want to check.</li><li><strong>1st day Benchmark price</strong> — in USD. The oldest price of your benchmark (e.g., SP500) in the period you want to check.</li><li><strong>2nd day Asset price</strong> — in USD</li><li><strong>2nd day Benchmark</strong> — in USD</li><li><strong>3rd day Asset price</strong> — in USD</li><li><strong>3rd day Benchmark</strong> — in USD</li><li><strong>4th day Asset price</strong> — in USD</li><li><strong>4th day Benchmark</strong> — in USD</li><li><strong>5th day Asset price</strong> — in USD</li><li><strong>5th day Benchmark</strong> — in USD</li><li><strong>6th day Asset price</strong> — in USD</li><li><strong>6th day Benchmark</strong> — in USD</li><li><strong>7th day Asset price</strong> — in USD</li><li><strong>7th day Benchmark</strong> — in USD</li><li><strong>8th day Asset price</strong> — in USD</li><li><strong>8th day Benchmark</strong> — in USD</li><li><strong>9th day Asset price</strong> — in USD</li><li><strong>9th day Benchmark</strong> — in USD</li><li><strong>10th day Asset price</strong> — in USD</li><li><strong>10th day Benchmark</strong> — in USD</li><li><strong>11th day Asset price</strong> — in USD</li><li><strong>11th day Benchmark</strong> — in USD</li><li><strong>12th day Asset price</strong> — in USD</li><li><strong>12th day Benchmark</strong> — in USD</li><li><strong>13th day Asset price</strong> — in USD</li><li><strong>13th day Benchmark</strong> — in USD</li><li><strong>14th day Asset price</strong> — in USD</li><li><strong>14th day Benchmark</strong> — in USD</li><li><strong>15th day Asset price</strong> — in USD</li><li><strong>15th day Benchmark</strong> — in USD</li><li><strong>16th day Asset price</strong> — in USD</li><li><strong>16th day Benchmark</strong> — in USD</li><li><strong>17th day Asset price</strong> — in USD</li><li><strong>17th day Benchmark</strong> — in USD</li><li><strong>18th day Asset price</strong> — in USD</li><li><strong>18th day Benchmark</strong> — in USD</li><li><strong>19th day Asset price</strong> — in USD</li><li><strong>19th day Benchmark</strong> — in USD</li><li><strong>20th day Asset price</strong> — in USD</li><li><strong>20th day Benchmark</strong> — in USD</li><li><strong>21st day Asset price</strong> — in USD</li><li><strong>21st day Benchmark</strong> — in USD</li><li><strong>22nd day Asset price</strong> — in USD</li><li><strong>22nd day Benchmark</strong> — in USD</li><li><strong>23rd day Asset price</strong> — in USD</li><li><strong>23rd day Benchmark</strong> — in USD</li><li><strong>24th day Asset price</strong> — in USD</li><li><strong>24th day Benchmark</strong> — in USD</li><li><strong>25th day Asset price</strong> — in USD</li><li><strong>25th day Benchmark</strong> — in USD</li><li><strong>26th day Asset price</strong> — in USD</li><li><strong>26th day Benchmark</strong> — in USD</li><li><strong>27th day Asset price</strong> — in USD</li><li><strong>27th day Benchmark</strong> — in USD</li><li><strong>28th day Asset price</strong> — in USD</li><li><strong>28th day Benchmark</strong> — in USD</li><li><strong>29th day Asset price</strong> — in USD</li><li><strong>29th day Benchmark</strong> — in USD</li><li><strong>30th day Asset price</strong> — in USD</li><li><strong>30th day Benchmark</strong> — in USD</li><li><strong>31st day Asset price</strong> — in USD</li><li><strong>31st day Benchmark</strong> — in USD</li><li><strong>32nd day Asset price</strong> — in USD</li><li><strong>32nd day Benchmark</strong> — in USD</li><li><strong>33rd day Asset price</strong> — in USD</li><li><strong>33rd day Benchmark</strong> — in USD</li><li><strong>34th day Asset price</strong> — in USD</li><li><strong>34th day Benchmark</strong> — in USD</li><li><strong>35th day Asset price</strong> — in USD</li><li><strong>35th day Benchmark</strong> — in USD</li><li><strong>36th day Asset price</strong> — in USD</li><li><strong>36th day Benchmark</strong> — in USD</li><li><strong>37th day Asset price</strong> — in USD</li><li><strong>37th day Benchmark</strong> — in USD</li><li><strong>38th day Asset price</strong> — in USD</li><li><strong>38th day Benchmark</strong> — in USD</li><li><strong>39th day Asset price</strong> — in USD</li><li><strong>39th day Benchmark</strong> — in USD</li><li><strong>40th day Asset price</strong> — in USD</li><li><strong>40th day Benchmark</strong> — in USD</li><li><strong>41st day Asset price</strong> — in USD</li><li><strong>41st day Benchmark</strong> — in USD</li><li><strong>42nd day Asset price</strong> — in USD</li><li><strong>42nd day Benchmark</strong> — in USD</li><li><strong>43rd day Asset price</strong> — in USD</li><li><strong>43rd day Benchmark</strong> — in USD</li><li><strong>44th day Asset price</strong> — in USD</li><li><strong>44th day Benchmark</strong> — in USD</li><li><strong>45th day Asset price</strong> — in USD</li><li><strong>45th day Benchmark</strong> — in USD</li><li><strong>46th day Asset price</strong> — in USD</li><li><strong>46th day Benchmark</strong> — in USD</li><li><strong>47th day Asset price</strong> — in USD</li><li><strong>47th day Benchmark</strong> — in USD</li><li><strong>48th day Asset price</strong> — in USD</li><li><strong>48th day Benchmark</strong> — in USD</li><li><strong>49th day Asset price</strong> — in USD</li><li><strong>49th day Benchmark</strong> — in USD</li><li><strong>50th day Asset price</strong> — in USD</li><li><strong>50th day Benchmark</strong> — in USD</li><li><strong>51st day Asset price</strong> — in USD</li><li><strong>51st day Benchmark</strong> — in USD</li><li><strong>52nd day Asset price</strong> — in USD</li><li><strong>52nd day Benchmark</strong> — in USD</li><li><strong>53rd day Asset price</strong> — in USD</li><li><strong>53rd day Benchmark</strong> — in USD</li><li><strong>54th day Asset price</strong> — in USD</li><li><strong>54th day Benchmark</strong> — in USD</li><li><strong>55th day Asset price</strong> — in USD</li><li><strong>55th day Benchmark</strong> — in USD</li><li><strong>56th day Asset price</strong> — in USD</li><li><strong>56th day Benchmark</strong> — in USD</li><li><strong>57th day Asset price</strong> — in USD</li><li><strong>57th day Benchmark</strong> — in USD</li><li><strong>58th day Asset price</strong> — in USD</li><li><strong>58th day Benchmark</strong> — in USD</li><li><strong>59th day Asset price</strong> — in USD</li><li><strong>59th day Benchmark</strong> — in USD</li><li><strong>60th day Asset price</strong> — in USD</li><li><strong>60th day Benchmark</strong> — in USD</li><li><strong>61st day Asset price</strong> — in USD</li><li><strong>61st day Benchmark</strong> — in USD</li><li><strong>62nd day Asset price</strong> — in USD</li><li><strong>62nd day Benchmark</strong> — in USD</li><li><strong>63rd day Asset price</strong> — in USD</li><li><strong>63rd day Benchmark</strong> — in USD</li><li><strong>64th day Asset price</strong> — in USD</li><li><strong>64th day Benchmark</strong> — in USD</li><li><strong>65th day Asset price</strong> — in USD</li><li><strong>65th day Benchmark</strong> — in USD</li><li><strong>66th day Asset price</strong> — in USD</li><li><strong>66th day Benchmark</strong> — in USD</li><li><strong>67th day Asset price</strong> — in USD</li><li><strong>67th day Benchmark</strong> — in USD</li><li><strong>Y</strong> — a plain number, no unit</li></ul><p>The result boxes are 68th day Asset price in USD, 68th day Benchmark in USD, Beta, Text; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: 68th day Asset price takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Y</strong> = <code>1st day Asset price + 1st day Benchmark price</code></li><li><strong>1st day Asset price</strong> = <code>− 1st day Benchmark price + Y</code></li><li><strong>1st day Benchmark price</strong> = <code>− 1st day Asset price + Y</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Y</strong> = <code>1st day Asset price + 1st day Benchmark price</code> — the form to use when 1st day Asset price and 1st day Benchmark price are the values you have.</li><li><strong>1st day Asset price</strong> = <code>− 1st day Benchmark price + Y</code> — the form to use when 1st day Benchmark price and Y are the values you have.</li><li><strong>1st day Benchmark price</strong> = <code>− 1st day Asset price + Y</code> — the form to use when 1st day Asset price and Y are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Y, 1st day Asset price and 1st day Benchmark price can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with 68th day Asset price, 68th day Benchmark and Beta are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>1st day Asset price left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If 1st day Asset price is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>1st day Benchmark price left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If 1st day Benchmark price is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>2nd day Asset price left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If 2nd day Asset price is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in 1st day Asset price and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> 68th day Asset price follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are 1st day Asset price, 1st day Benchmark price and 2nd day Asset price and the number you are missing is 68th day Asset price and 68th day Benchmark.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/deferred-payment-loan">Deferred payment loan Calculator</a>, <a href="/finance/degree-of-operating-leverage">Degree of operating leverage Calculator</a> and <a href="/finance/depreciation">Depreciation Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Beta stock is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put 1st day Asset price, 1st day Benchmark price, 2nd day Asset price and 2nd day Benchmark beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Beta stock calculator work out?', 'a' => <<<'TXT'
            68th day Asset price, 68th day Benchmark, Beta and Text, from 1st day Asset price and 1st day Benchmark price. The relationship is Y = 1st day Asset price + 1st day Benchmark price.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            1st day Asset price (USD), 1st day Benchmark price (USD), 2nd day Asset price (USD), 2nd day Benchmark (USD), 3rd day Asset price (USD). Fill 1st day Asset price, 1st day Benchmark price and 2nd day Asset price and leave 68th day Asset price empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Y, 1st day Asset price and 1st day Benchmark price can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            68th day Asset price is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With 1st day Asset price left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. 68th day Asset price keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/deferred-payment-loan', 'name' => 'Deferred payment loan Calculator'],
            ['path' => '/finance/degree-of-operating-leverage', 'name' => 'Degree of operating leverage Calculator'],
            ['path' => '/finance/depreciation', 'name' => 'Depreciation Calculator'],
        ],
        'authors' => [],
    ],
];
