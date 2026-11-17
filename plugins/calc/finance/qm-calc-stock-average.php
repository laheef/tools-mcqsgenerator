<?php

/**
 * Stock average
 * /finance/stock-average
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Stock average',
    'meta' => ['title' => 'Stock average Calculator — Formula & Results', 'description' => 'Stock average solves for any one of current stock price (optional), 1st buy # and 1st buy price, given the rest. The formula is printed in the form\'s own words.', 'h1' => 'Stock average Calculator', 'updated' => '2026-09-18'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cp',
                            'label' => 'Current stock price (optional)',
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
        [
            'title' => 'Number of shares bought and their prices',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'q1',
                            'label' => '1st buy #',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'p1',
                            'label' => '1st buy price',
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
                            'name' => 'q2',
                            'label' => '2nd buy #',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'p2',
                            'label' => '2nd buy price',
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
                            'name' => 'q3',
                            'label' => '3rd buy #',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'p3',
                            'label' => '3rd buy price',
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
                            'name' => 'q4',
                            'label' => '4th buy #',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'p4',
                            'label' => '4th buy price',
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
                            'name' => 'q5',
                            'label' => '5th buy #',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'p5',
                            'label' => '5th buy price',
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
                            'name' => 'q6',
                            'label' => '6th buy #',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'p6',
                            'label' => '6th buy price',
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
                            'name' => 'q7',
                            'label' => '7th buy #',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'p7',
                            'label' => '7th buy price',
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
                            'name' => 'q8',
                            'label' => '8th buy #',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'p8',
                            'label' => '8th buy price',
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
                            'name' => 'q9',
                            'label' => '9th buy #',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'p9',
                            'label' => '9th buy price',
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
                            'name' => 'q10',
                            'label' => '10th buy #',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'p10',
                            'label' => '10th buy price',
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
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Enter at least the first two buys (number of shares and price).'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'prof_perc_2 >= 0 and hasValue(cp) and hasValue(q1) and hasValue(p1) and hasValue(q2) and hasValue(p2) and not(hasValue(p3) or hasValue(p3))', 'text' => <<<'TXT'
                                Your stock cost basis is {{cost_basis_2.monetaryValue}}, your stock profit is {{profit_2.monetaryValue}} and your profit percentage is {{prof_perc_2.formattedValue}}%.
                                TXT],
                                ['when' => 'prof_perc_2 < 0 and hasValue(cp) and hasValue(q1) and hasValue(p1) and hasValue(q2) and hasValue(p2) and not(hasValue(p3) or hasValue(p3))', 'text' => <<<'TXT'
                                Your stock cost basis is {{cost_basis_2.monetaryValue}}, your stock profit is {{profit_2.monetaryValue}} and your loss percentage is {{prof_perc_2.formattedValue}}%.
                                TXT],
                                ['when' => <<<'TXT'
                                prof_perc_3 >= 0 and hasValue(cp) and hasValue(q1) and hasValue(p1) and hasValue(q2) and hasValue(p2) and hasValue(q3) and hasValue(p3) and not(hasValue(p4) or hasValue(p4))
                                TXT, 'text' => <<<'TXT'
                                Your stock cost basis is {{cost_basis_3.monetaryValue}}, your stock profit is {{profit_3.monetaryValue}} and your profit percentage is {{prof_perc_3.formattedValue}}%.
                                TXT],
                                ['when' => <<<'TXT'
                                prof_perc_3 < 0 and hasValue(cp) and hasValue(q1) and hasValue(p1) and hasValue(q2) and hasValue(p2) and hasValue(q3) and hasValue(p3) and not(hasValue(p4) or hasValue(p4))
                                TXT, 'text' => <<<'TXT'
                                Your stock cost basis is {{cost_basis_3.monetaryValue}}, your stock profit is {{profit_3.monetaryValue}} and your loss percentage is {{prof_perc_3.formattedValue}}%.
                                TXT],
                                ['when' => <<<'TXT'
                                prof_perc_4 >= 0 and hasValue(cp) and hasValue(q1) and hasValue(p1) and hasValue(q2) and hasValue(p2) and hasValue(q3) and hasValue(p3) and hasValue(q4) and hasValue(p4) and not(hasValue(p5) or hasValue(p5))
                                TXT, 'text' => <<<'TXT'
                                Your stock cost basis is {{cost_basis_4.monetaryValue}}, your stock profit is {{profit_4.monetaryValue}} and your profit percentage is {{prof_perc_4.formattedValue}}%.
                                TXT],
                                ['when' => <<<'TXT'
                                prof_perc_4 < 0 and hasValue(cp) and hasValue(q1) and hasValue(p1) and hasValue(q2) and hasValue(p2) and hasValue(q3) and hasValue(p3) and hasValue(q4) and hasValue(p4) and not(hasValue(p5) or hasValue(p5))
                                TXT, 'text' => <<<'TXT'
                                Your stock cost basis is {{cost_basis_4.monetaryValue}}, your stock profit is {{profit_4.monetaryValue}} and your loss percentage is {{prof_perc_4.formattedValue}}%.
                                TXT],
                                ['when' => <<<'TXT'
                                prof_perc_5 >= 0 and hasValue(cp) and hasValue(q1) and hasValue(p1) and hasValue(q2) and hasValue(p2) and hasValue(q3) and hasValue(p3) and hasValue(q4) and hasValue(p4) and hasValue(q5) and hasValue(p5) and not(hasValue(p6) or hasValue(p6))
                                TXT, 'text' => <<<'TXT'
                                Your stock cost basis is {{cost_basis_5.monetaryValue}}, your stock profit is {{profit_5.monetaryValue}} and your profit percentage is {{prof_perc_5.formattedValue}}%.
                                TXT],
                                ['when' => <<<'TXT'
                                prof_perc_5 < 0 and hasValue(cp) and hasValue(q1) and hasValue(p1) and hasValue(q2) and hasValue(p2) and hasValue(q3) and hasValue(p3) and hasValue(q4) and hasValue(p4) and hasValue(q5) and hasValue(p5) and not(hasValue(p6) or hasValue(p6))
                                TXT, 'text' => <<<'TXT'
                                Your stock cost basis is {{cost_basis_5.monetaryValue}}, your stock profit is {{profit_5.monetaryValue}} and your loss percentage is {{prof_perc_5.formattedValue}}%.
                                TXT],
                                ['when' => <<<'TXT'
                                prof_perc_6 >= 0 and hasValue(cp) and hasValue(q1) and hasValue(p1) and hasValue(q2) and hasValue(p2) and hasValue(q3) and hasValue(p3) and hasValue(q4) and hasValue(p4) and hasValue(q5) and hasValue(p5) and hasValue(q6) and hasValue(p6) and not(hasValue(p7) or hasValue(p7))
                                TXT, 'text' => <<<'TXT'
                                Your stock cost basis is {{cost_basis_6.monetaryValue}}, your stock profit is {{profit_6.monetaryValue}} and your profit percentage is {{prof_perc_6.formattedValue}}%.
                                TXT],
                                ['when' => <<<'TXT'
                                prof_perc_6 < 0 and hasValue(cp) and hasValue(q1) and hasValue(p1) and hasValue(q2) and hasValue(p2) and hasValue(q3) and hasValue(p3) and hasValue(q4) and hasValue(p4) and hasValue(q5) and hasValue(p5) and hasValue(q6) and hasValue(p6) and not(hasValue(p7) or hasValue(p7))
                                TXT, 'text' => <<<'TXT'
                                Your stock cost basis is {{cost_basis_6.monetaryValue}}, your stock profit is {{profit_6.monetaryValue}} and your loss percentage is {{prof_perc_6.formattedValue}}%.
                                TXT],
                                ['when' => <<<'TXT'
                                prof_perc_7 >= 0 and hasValue(cp) and hasValue(q1) and hasValue(p1) and hasValue(q2) and hasValue(p2) and hasValue(q3) and hasValue(p3) and hasValue(q4) and hasValue(p4) and hasValue(q5) and hasValue(p5) and hasValue(q6) and hasValue(p6) and hasValue(q7) and hasValue(p7) and not(hasValue(p8) or hasValue(p8))
                                TXT, 'text' => <<<'TXT'
                                Your stock cost basis is {{cost_basis_7.monetaryValue}}, your stock profit is {{profit_7.monetaryValue}} and your profit percentage is {{prof_perc_7.formattedValue}}%.
                                TXT],
                                ['when' => <<<'TXT'
                                prof_perc_7 < 0 and hasValue(cp) and hasValue(q1) and hasValue(p1) and hasValue(q2) and hasValue(p2) and hasValue(q3) and hasValue(p3) and hasValue(q4) and hasValue(p4) and hasValue(q5) and hasValue(p5) and hasValue(q6) and hasValue(p6) and hasValue(q7) and hasValue(p7) and not(hasValue(p8) or hasValue(p8))
                                TXT, 'text' => <<<'TXT'
                                Your stock cost basis is {{cost_basis_7.monetaryValue}}, your stock profit is {{profit_7.monetaryValue}} and your loss percentage is {{prof_perc_7.formattedValue}}%.
                                TXT],
                                ['when' => <<<'TXT'
                                prof_perc_8 >= 0 and hasValue(cp) and hasValue(q1) and hasValue(p1) and hasValue(q2) and hasValue(p2) and hasValue(q3) and hasValue(p3) and hasValue(q4) and hasValue(p4) and hasValue(q5) and hasValue(p5) and hasValue(q6) and hasValue(p6) and hasValue(q7) and hasValue(p7) and hasValue(q8) and hasValue(p8) and not(hasValue(p9) or hasValue(p9))
                                TXT, 'text' => <<<'TXT'
                                Your stock cost basis is {{cost_basis_8.monetaryValue}}, your stock profit is {{profit_8.monetaryValue}} and your profit percentage is {{prof_perc_8.formattedValue}}%.
                                TXT],
                                ['when' => <<<'TXT'
                                prof_perc_8 < 0 and hasValue(cp) and hasValue(q1) and hasValue(p1) and hasValue(q2) and hasValue(p2) and hasValue(q3) and hasValue(p3) and hasValue(q4) and hasValue(p4) and hasValue(q5) and hasValue(p5) and hasValue(q6) and hasValue(p6) and hasValue(q7) and hasValue(p7) and hasValue(q8) and hasValue(p8) and not(hasValue(p9) or hasValue(p9))
                                TXT, 'text' => <<<'TXT'
                                Your stock cost basis is {{cost_basis_8.monetaryValue}}, your stock profit is {{profit_8.monetaryValue}} and your loss percentage is {{prof_perc_8.formattedValue}}%.
                                TXT],
                                ['when' => <<<'TXT'
                                prof_perc_9 >= 0 and hasValue(cp) and hasValue(q1) and hasValue(p1) and hasValue(q2) and hasValue(p2) and hasValue(q3) and hasValue(p3) and hasValue(q4) and hasValue(p4) and hasValue(q5) and hasValue(p5) and hasValue(q6) and hasValue(p6) and hasValue(q7) and hasValue(p7) and hasValue(q8) and hasValue(p8) and hasValue(q9) and hasValue(p9) and not(hasValue(p10) or hasValue(p10))
                                TXT, 'text' => <<<'TXT'
                                Your stock cost basis is {{cost_basis_9.monetaryValue}}, your stock profit is {{profit_9.monetaryValue}} and your profit percentage is {{prof_perc_9.formattedValue}}%.
                                TXT],
                                ['when' => <<<'TXT'
                                prof_perc_9 < 0 and hasValue(cp) and hasValue(q1) and hasValue(p1) and hasValue(q2) and hasValue(p2) and hasValue(q3) and hasValue(p3) and hasValue(q4) and hasValue(p4) and hasValue(q5) and hasValue(p5) and hasValue(q6) and hasValue(p6) and hasValue(q7) and hasValue(p7) and hasValue(q8) and hasValue(p8) and hasValue(q9) and hasValue(p9) and not(hasValue(p10) or hasValue(p10))
                                TXT, 'text' => <<<'TXT'
                                Your stock cost basis is {{cost_basis_9.monetaryValue}}, your stock profit is {{profit_9.monetaryValue}} and your loss percentage is {{prof_perc_9.formattedValue}}%.
                                TXT],
                                ['when' => <<<'TXT'
                                prof_perc_10 >= 0 and hasValue(cp) and hasValue(q1) and hasValue(p1) and hasValue(q2) and hasValue(p2) and hasValue(q3) and hasValue(p3) and hasValue(q4) and hasValue(p4) and hasValue(q5) and hasValue(p5) and hasValue(q6) and hasValue(p6) and hasValue(q7) and hasValue(p7) and hasValue(q8) and hasValue(p8) and hasValue(q9) and hasValue(p9) and hasValue(q10) and hasValue(p10)
                                TXT, 'text' => <<<'TXT'
                                Your stock cost basis is {{cost_basis_10.monetaryValue}}, your stock profit is {{profit_10.monetaryValue}} and your profit percentage is {{prof_perc_10.formattedValue}}%.
                                TXT],
                                ['when' => <<<'TXT'
                                prof_perc_10 < 0 and hasValue(cp) and hasValue(q1) and hasValue(p1) and hasValue(q2) and hasValue(p2) and hasValue(q3) and hasValue(p3) and hasValue(q4) and hasValue(p4) and hasValue(q5) and hasValue(p5) and hasValue(q6) and hasValue(p6) and hasValue(q7) and hasValue(p7) and hasValue(q8) and hasValue(p8) and hasValue(q9) and hasValue(p9) and hasValue(q10) and hasValue(p10)
                                TXT, 'text' => <<<'TXT'
                                Your stock cost basis is {{cost_basis_10.monetaryValue}}, your stock profit is {{profit_10.monetaryValue}} and your loss percentage is {{prof_perc_10.formattedValue}}%.
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
                                ['when' => 'hasValue(q1) and hasValue(p1) and hasValue(q2) and hasValue(p2) and not(hasValue(p3) or hasValue(p3))', 'text' => 'Your stock cost basis is {{cost_basis_2.monetaryValue}} and the total amount of shares you hold is {{sum2.formattedValue}}.&nbsp;'],
                                ['when' => 'hasValue(q1) and hasValue(p1) and hasValue(q2) and hasValue(p2) and hasValue(q3) and hasValue(p3) and not(hasValue(p4) or hasValue(p4))', 'text' => 'Your stock cost basis is {{cost_basis_3.monetaryValue}} and the total amount of shares you hold is {{sum3.formattedValue}}.&nbsp;'],
                                ['when' => <<<'TXT'
                                 hasValue(q1) and hasValue(p1) and hasValue(q2) and hasValue(p2) and hasValue(q3) and hasValue(p3) and hasValue(q4) and hasValue(p4) and not(hasValue(p5) or hasValue(p5))
                                TXT, 'text' => 'Your stock cost basis is {{cost_basis_4.monetaryValue}} and the total amount of shares you hold is {{sum4.formattedValue}}.&nbsp;'],
                                ['when' => <<<'TXT'
                                hasValue(q1) and hasValue(p1) and hasValue(q2) and hasValue(p2) and hasValue(q3) and hasValue(p3) and hasValue(q4) and hasValue(p4) and hasValue(q5) and hasValue(p5) and not(hasValue(p6) or hasValue(p6))
                                TXT, 'text' => 'Your stock cost basis is {{cost_basis_5.monetaryValue}} and the total amount of shares you hold is {{sum5.formattedValue}}.&nbsp;'],
                                ['when' => <<<'TXT'
                                hasValue(q1) and hasValue(p1) and hasValue(q2) and hasValue(p2) and hasValue(q3) and hasValue(p3) and hasValue(q4) and hasValue(p4) and hasValue(q5) and hasValue(p5) and hasValue(q6) and hasValue(p6) and not(hasValue(p7) or hasValue(p7))
                                TXT, 'text' => 'Your stock cost basis is {{cost_basis_6.monetaryValue}} and the total amount of shares you hold is {{sum6.formattedValue}}.&nbsp;'],
                                ['when' => <<<'TXT'
                                hasValue(q1) and hasValue(p1) and hasValue(q2) and hasValue(p2) and hasValue(q3) and hasValue(p3) and hasValue(q4) and hasValue(p4) and hasValue(q5) and hasValue(p5) and hasValue(q6) and hasValue(p6) and hasValue(q7) and hasValue(p7) and not(hasValue(p8) or hasValue(p8))
                                TXT, 'text' => 'Your stock cost basis is {{cost_basis_7.monetaryValue}} and the total amount of shares you hold is {{sum7.formattedValue}}.&nbsp;'],
                                ['when' => <<<'TXT'
                                hasValue(q1) and hasValue(p1) and hasValue(q2) and hasValue(p2) and hasValue(q3) and hasValue(p3) and hasValue(q4) and hasValue(p4) and hasValue(q5) and hasValue(p5) and hasValue(q6) and hasValue(p6) and hasValue(q7) and hasValue(p7) and hasValue(q8) and hasValue(p8) and not(hasValue(p9) or hasValue(p9))
                                TXT, 'text' => 'Your stock cost basis is {{cost_basis_8.monetaryValue}} and the total amount of shares you hold is {{sum8.formattedValue}}.&nbsp;'],
                                ['when' => <<<'TXT'
                                hasValue(q1) and hasValue(p1) and hasValue(q2) and hasValue(p2) and hasValue(q3) and hasValue(p3) and hasValue(q4) and hasValue(p4) and hasValue(q5) and hasValue(p5) and hasValue(q6) and hasValue(p6) and hasValue(q7) and hasValue(p7) and hasValue(q8) and hasValue(p8) and hasValue(q9) and hasValue(p9) and not(hasValue(p10) or hasValue(p10))
                                TXT, 'text' => 'Your stock cost basis is {{cost_basis_9.monetaryValue}} and the total amount of shares you hold is {{sum9.formattedValue}}.&nbsp;'],
                                ['when' => <<<'TXT'
                                hasValue(q1) and hasValue(p1) and hasValue(q2) and hasValue(p2) and hasValue(q3) and hasValue(p3) and hasValue(q4) and hasValue(p4) and hasValue(q5) and hasValue(p5) and hasValue(q6) and hasValue(p6) and hasValue(q7) and hasValue(p7) and hasValue(q8) and hasValue(p8) and hasValue(q9) and hasValue(p9) and hasValue(q10) and hasValue(p10)
                                TXT, 'text' => 'Your stock cost basis is {{cost_basis_10.monetaryValue}} and the total amount of shares you hold is {{sum10.formattedValue}}.&nbsp;'],
                                ['when' => '(hasValue(q1) and hasValue(p1)) and hasValue(p2) and hasValue(p2)', 'text' => '&nbsp; If you want to compute profit, enter the current stock price at the top of the calculator.'],
                            ],
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
                            'name' => 'cost_basis_1',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'cost_basis_2',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'cost_basis_3',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'cost_basis_4',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'cost_basis_5',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'cost_basis_6',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'cost_basis_7',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'cost_basis_8',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'cost_basis_9',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'cost_basis_10',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'profit_1',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'profit_2',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'profit_3',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'profit_4',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'profit_5',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'profit_6',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'profit_7',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'profit_8',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'profit_9',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'profit_10',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'prof_perc_1',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'prof_perc_2',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'prof_perc_3',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'prof_perc_4',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'prof_perc_5',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'prof_perc_6',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'prof_perc_7',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'prof_perc_8',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'prof_perc_9',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'prof_perc_10',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sum2',
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
                            'name' => 'sum3',
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
                            'name' => 'sum4',
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
                            'name' => 'sum5',
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
                            'name' => 'sum6',
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
                            'name' => 'sum7',
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
                            'name' => 'sum8',
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
                            'name' => 'sum9',
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
                            'name' => 'sum10',
                            'label' => '',
                            'type' => 'presentation',
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
                        [
                            'name' => 'total_shares',
                            'label' => 'Shares held',
                            'type' => 'result',
                            'rounding' => ['standard', '4'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_cost',
                            'label' => 'Total cost',
                            'type' => 'result',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'average_price',
                            'label' => 'Average price per share',
                            'type' => 'result',
                            'rounding' => ['standard', '4'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'position_value',
                            'label' => 'Value at the current price',
                            'type' => 'result',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'profit_loss',
                            'label' => 'Profit / loss',
                            'type' => 'result',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'profit_percent',
                            'label' => 'Profit / loss (%)',
                            'type' => 'result',
                            'suffix' => '%',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [],
    'js' => <<<'TXT'
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
    
    omni.onResult([], function (ctx, v) {
      var rows = [], shares = 0, cost = 0;
      for (var i = 1; i <= 10; i++) {
        var q = Number(v['q' + i]), p = Number(v['p' + i]);
        var hasQ = v['q' + i] !== undefined && v['q' + i] !== '';
        var hasP = v['p' + i] !== undefined && v['p' + i] !== '';
        if (!hasQ || !hasP || !isFinite(q) || !isFinite(p) || q <= 0) continue;
        rows.push({ n: i, q: q, p: p, spent: q * p });
        shares += q;
        cost += q * p;
      }
      if (!rows.length || shares <= 0) {
        ctx.addUnmetCondition('Enter the number of shares and the price paid, for at least one buy.');
        return;
      }
      var average = cost / shares;
      ctx.exportValue('total_shares', sround(shares, 4));
      ctx.exportValue('total_cost', sround(cost, 2));
      ctx.exportValue('average_price', sround(average, 4));
    
      var body = rows.map(function (r) {
        return ['Buy ' + r.n, snum(r.q, 4), snum(r.p, 4), snum(r.spent, 2)];
      });
      body.push(['Average', snum(shares, 4), snum(average, 4), snum(cost, 2)]);
      ctx.addHtml(stable(['Buy', 'Shares', 'Price', 'Spent'], body));
    
      var current = Number(v.cp);
      if (isFinite(current) && current > 0 && v.cp !== '') {
        var value = shares * current;
        var pl = value - cost;
        ctx.exportValue('position_value', sround(value, 2));
        ctx.exportValue('profit_loss', sround(pl, 2));
        ctx.exportValue('profit_percent', sround(pl / cost * 100, 2));
        ctx.addHtml('<p class="calc-unmet">At ' + snum(current, 4) + ' per share the position is worth '
          + snum(value, 2) + ', a ' + (pl >= 0 ? 'profit' : 'loss') + ' of ' + snum(Math.abs(pl), 2)
          + ' (' + snum(Math.abs(pl / cost * 100), 2) + ' %).</p>');
      } else {
        ctx.addHtml('<p class="calc-unmet">Average price paid: ' + snum(average, 4)
          + ' across ' + snum(shares, 4) + ' shares. Add a current price to see the profit or loss.</p>');
      }
    });
    TXT,
    'showIf' => [
        'q2' => 'hasValue(q1)',
        'p2' => 'hasValue(q1)',
        'q3' => 'hasValue(q2)',
        'p3' => 'hasValue(q2)',
        'q4' => 'hasValue(q3)',
        'p4' => 'hasValue(q3)',
        'q5' => 'hasValue(q4)',
        'p5' => 'hasValue(q4)',
        'q6' => 'hasValue(q5)',
        'p6' => 'hasValue(q5)',
        'q7' => 'hasValue(q6)',
        'p7' => 'hasValue(q6)',
        'q8' => 'hasValue(q7)',
        'p8' => 'hasValue(q7)',
        'q9' => 'hasValue(q8)',
        'p9' => 'hasValue(q8)',
        'q10' => 'hasValue(q9)',
        'p10' => 'hasValue(q9)',
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Current stock price (optional), 1st buy # and 1st buy price into Stock average and the answer comes back as Shares held and Total cost. There is no hidden constant here: change shares held and current stock price (optional) moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Stock average calculator works', 'html' => <<<'TXT'
            <p>Stock average answers one question from 21 numbers, and the answer is Shares held, Total cost and Average price per share.</p><p>The answers are Shares held, Total cost, Average price per share and Value at the current price; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 21 boxes, and nothing else.</p><ul><li><strong>Current stock price (optional)</strong> — in USD</li><li><strong>1st buy #</strong> — a plain number, no unit</li><li><strong>1st buy price</strong> — in USD</li><li><strong>2nd buy #</strong> — a plain number, no unit</li><li><strong>2nd buy price</strong> — in USD</li><li><strong>3rd buy #</strong> — a plain number, no unit</li><li><strong>3rd buy price</strong> — in USD</li><li><strong>4th buy #</strong> — a plain number, no unit</li><li><strong>4th buy price</strong> — in USD</li><li><strong>5th buy #</strong> — a plain number, no unit</li><li><strong>5th buy price</strong> — in USD</li><li><strong>6th buy #</strong> — a plain number, no unit</li><li><strong>6th buy price</strong> — in USD</li><li><strong>7th buy #</strong> — a plain number, no unit</li><li><strong>7th buy price</strong> — in USD</li><li><strong>8th buy #</strong> — a plain number, no unit</li><li><strong>8th buy price</strong> — in USD</li><li><strong>9th buy #</strong> — a plain number, no unit</li><li><strong>9th buy price</strong> — in USD</li><li><strong>10th buy #</strong> — a plain number, no unit</li><li><strong>10th buy price</strong> — in USD</li></ul><p>The result boxes are Shares held, Total cost, Average price per share, Value at the current price, Profit / loss, Profit / loss (%) in %; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>The unit chip on Prof perc 1 lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>'],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Shares held, Total cost and Average price per share are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Current stock price (optional) left as a guess.</strong> Anything typed into Current stock price (optional) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>1st buy # left as a guess.</strong> Anything typed into 1st buy # is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>1st buy price left as a guess.</strong> Anything typed into 1st buy price is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Current stock price (optional) and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Stock average form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Current stock price (optional)</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Current stock price (optional) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>1st buy #</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — 1st buy # is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>1st buy price</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — 1st buy price is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>2nd buy #</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — 2nd buy # is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>2nd buy price</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — 2nd buy price is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>3rd buy #</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — 3rd buy # is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>3rd buy price</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — 3rd buy price is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>4th buy #</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — 4th buy # is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>4th buy price</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — 4th buy price is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>5th buy #</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — 5th buy # is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>5th buy price</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — 5th buy price is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>6th buy #</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — 6th buy # is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>6th buy price</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — 6th buy price is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>7th buy #</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — 7th buy # is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>7th buy price</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — 7th buy price is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>8th buy #</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — 8th buy # is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>8th buy price</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — 8th buy price is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>9th buy #</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — 9th buy # is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>9th buy price</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — 9th buy price is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>10th buy #</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — 10th buy # is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>10th buy price</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — 10th buy price is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>The calculation on this page is a procedure rather than one formula: it takes Stock average, works through it, and the panel lists Current stock price (optional), 1st buy #, 1st buy price and 2nd buy #.</p><p>The processing runs locally: the text you enter stays in the page, the script reads it, and the results are printed beside it. Nothing about your input is stored after you leave.</p><p>Because the script works on exactly what it is given, the usual failure is not arithmetic but input: trailing spaces, a header line from a FASTA file, an ambiguous base in the middle of a sequence. Check that the box holds the characters you meant and nothing else.</p><p>What comes back is Shares held, Total cost, Average price per share and Value at the current price — the same input described several ways, which is why the panel lists them side by side rather than picking one.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Shares held is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Current stock price (optional), 1st buy # and 1st buy price measured, Shares held and Total cost wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/buying-power">Buying power Calculator</a>, <a href="/finance/cagr">CAGR Calculator</a> and <a href="/finance/california-overtime">California overtime</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Stock average calculator work out?', 'a' => 'Shares held, Total cost, Average price per share and Value at the current price.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Current stock price (optional) (USD), 1st buy #, 1st buy price (USD), 2nd buy #, 2nd buy price (USD). Enter current stock price (optional), 1st buy # and 1st buy price; Shares held is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Shares held is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The page needs every box filled: Shares held is fixed as the value it works out, so there is nothing to solve for when an input is missing.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Shares held at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/buying-power', 'name' => 'Buying power Calculator'],
            ['path' => '/finance/cagr', 'name' => 'CAGR Calculator'],
            ['path' => '/finance/california-overtime', 'name' => 'California overtime'],
        ],
        'authors' => [],
    ],
];
