<?php

/**
 * Expected return
 * /finance/expected-return
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Expected return',
    'meta' => ['title' => 'Expected return — Formula, Steps & Examples', 'description' => 'Expected return reports error string, return a, return b and variance a. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Expected return Calculator', 'updated' => '2026-06-11'],
    'sections' => [
        [
            'title' => 'Enter the probability, Stock A return, and Stock B return for each scenario',
            'note' => 'New scenarios will appear automatically as you enter data.',
            'blocks' => [
                [
                    'columns' => 3,
                    'place' => [0, 1, 2],
                    'fields' => [
                        [
                            'name' => 'p1',
                            'label' => 'Prob. scn. 1',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                        [
                            'name' => 'A1',
                            'label' => 'Stock A',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'B1',
                            'label' => 'Stock B',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 3,
                    'place' => [0, 1, 2],
                    'fields' => [
                        [
                            'name' => 'p2',
                            'label' => 'Prob. scn. 2',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                        [
                            'name' => 'A2',
                            'label' => 'Stock A',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'B2',
                            'label' => 'Stock B',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 3,
                    'place' => [0, 1, 2],
                    'fields' => [
                        [
                            'name' => 'p3',
                            'label' => 'Prob. scn. 3',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                        [
                            'name' => 'A3',
                            'label' => 'Stock A',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'B3',
                            'label' => 'Stock B',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 3,
                    'place' => [0, 1, 2],
                    'fields' => [
                        [
                            'name' => 'p4',
                            'label' => 'Prob. scn. 4',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                        [
                            'name' => 'A4',
                            'label' => 'Stock A',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'B4',
                            'label' => 'Stock B',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 3,
                    'place' => [0, 1, 2],
                    'fields' => [
                        [
                            'name' => 'p5',
                            'label' => 'Prob. scn. 5',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                        [
                            'name' => 'A5',
                            'label' => 'Stock A',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'B5',
                            'label' => 'Stock B',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 3,
                    'place' => [0, 1, 2],
                    'fields' => [
                        [
                            'name' => 'p6',
                            'label' => 'Prob. scn. 6',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                        [
                            'name' => 'A6',
                            'label' => 'Stock A',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'B6',
                            'label' => 'Stock B',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 3,
                    'place' => [0, 1, 2],
                    'fields' => [
                        [
                            'name' => 'p7',
                            'label' => 'Prob. scn. 7',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                        [
                            'name' => 'A7',
                            'label' => 'Stock A',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'B7',
                            'label' => 'Stock B',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 3,
                    'place' => [0, 1, 2],
                    'fields' => [
                        [
                            'name' => 'p8',
                            'label' => 'Prob. scn. 8',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                        [
                            'name' => 'A8',
                            'label' => 'Stock A',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'B8',
                            'label' => 'Stock B',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 3,
                    'place' => [0, 1, 2],
                    'fields' => [
                        [
                            'name' => 'p9',
                            'label' => 'Prob. scn. 9',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                        [
                            'name' => 'A9',
                            'label' => 'Stock A',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'B9',
                            'label' => 'Stock B',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 3,
                    'place' => [0, 1, 2],
                    'fields' => [
                        [
                            'name' => 'p10',
                            'label' => 'Prob. scn. 10',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                        [
                            'name' => 'A10',
                            'label' => 'Stock A',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'B10',
                            'label' => 'Stock B',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 3,
                    'place' => [0, 1, 2],
                    'fields' => [
                        [
                            'name' => 'p11',
                            'label' => 'Prob. scn. 11',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                        [
                            'name' => 'A11',
                            'label' => 'Stock A',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'B11',
                            'label' => 'Stock B',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 3,
                    'place' => [0, 1, 2],
                    'fields' => [
                        [
                            'name' => 'p12',
                            'label' => 'Prob. scn. 12',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                        [
                            'name' => 'A12',
                            'label' => 'Stock A',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'B12',
                            'label' => 'Stock B',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 3,
                    'place' => [0, 1, 2],
                    'fields' => [
                        [
                            'name' => 'p13',
                            'label' => 'Prob. scn. 13',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                        [
                            'name' => 'A13',
                            'label' => 'Stock A',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'B13',
                            'label' => 'Stock B',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 3,
                    'place' => [0, 1, 2],
                    'fields' => [
                        [
                            'name' => 'p14',
                            'label' => 'Prob. scn. 14',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                        [
                            'name' => 'A14',
                            'label' => 'Stock A',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'B14',
                            'label' => 'Stock B',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 3,
                    'place' => [0, 1, 2],
                    'fields' => [
                        [
                            'name' => 'p15',
                            'label' => 'Prob. scn. 15',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                        [
                            'name' => 'A15',
                            'label' => 'Stock A',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'B15',
                            'label' => 'Stock B',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 3,
                    'place' => [0, 1, 2],
                    'fields' => [
                        [
                            'name' => 'p16',
                            'label' => 'Prob. scn. 16',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                        [
                            'name' => 'A16',
                            'label' => 'Stock A',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'B16',
                            'label' => 'Stock B',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 3,
                    'place' => [0, 1, 2],
                    'fields' => [
                        [
                            'name' => 'p17',
                            'label' => 'Prob. scn. 17',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                        [
                            'name' => 'A17',
                            'label' => 'Stock A',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'B17',
                            'label' => 'Stock B',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 3,
                    'place' => [0, 1, 2],
                    'fields' => [
                        [
                            'name' => 'p18',
                            'label' => 'Prob. scn. 18',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                        [
                            'name' => 'A18',
                            'label' => 'Stock A',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'B18',
                            'label' => 'Stock B',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 3,
                    'place' => [0, 1, 2],
                    'fields' => [
                        [
                            'name' => 'p19',
                            'label' => 'Prob. scn. 19',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                        [
                            'name' => 'A19',
                            'label' => 'Stock A',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'B19',
                            'label' => 'Stock B',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 3,
                    'place' => [0, 1, 2],
                    'fields' => [
                        [
                            'name' => 'p20',
                            'label' => 'Prob. scn. 20',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                        [
                            'name' => 'A20',
                            'label' => 'Stock A',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'B20',
                            'label' => 'Stock B',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 3,
                    'place' => [0, 1, 2],
                    'fields' => [
                        [
                            'name' => 'p21',
                            'label' => 'Prob. scn. 21',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                        [
                            'name' => 'A21',
                            'label' => 'Stock A (%)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'B21',
                            'label' => 'Stock B',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 3,
                    'place' => [0, 1, 2],
                    'fields' => [
                        [
                            'name' => 'p22',
                            'label' => 'Prob. scn. 22',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                        [
                            'name' => 'A22',
                            'label' => 'Stock A',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'B22',
                            'label' => 'Stock B',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 3,
                    'place' => [0, 1, 2],
                    'fields' => [
                        [
                            'name' => 'p23',
                            'label' => 'Prob. scn. 23',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                        [
                            'name' => 'A23',
                            'label' => 'Stock A',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'B23',
                            'label' => 'Stock B',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 3,
                    'place' => [0, 1, 2],
                    'fields' => [
                        [
                            'name' => 'p24',
                            'label' => 'Prob. scn. 24',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                        [
                            'name' => 'A24',
                            'label' => 'Stock A',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'B24',
                            'label' => 'Stock B',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 3,
                    'place' => [0, 1, 2],
                    'fields' => [
                        [
                            'name' => 'p25',
                            'label' => 'Prob. scn. 25',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                        [
                            'name' => 'A25',
                            'label' => 'Stock A',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'B25',
                            'label' => 'Stock B',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Results',
            'note' => '',
            'blocks' => [],
        ],
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'interpretation_1',
                            'label' => '',
                            'type' => 'select',
                            'options' => [
                                '**Stock A** offers a **higher expected return** than Stock B, but it is also **riskier** as its variance and standard deviation are greater.' => '1',
                                '**Stock A** offers a **higher expected return** than Stock B while also having **lower risk**, as its variance and standard deviation are smaller.' => '2',
                                '**Stock A** offers a **higher expected return** than Stock B while both investments have **the same level of risk.**' => '3',
                                '**Stock B** offers a **higher expected return** than Stock A while also having **lower risk**, as its variance and standard deviation are smaller.' => '4',
                                '**Stock B** offers a **higher expected return** than Stock A, but it is also **riskier** as its variance and standard deviation are greater.' => '5',
                                '**Stock B** offers a **higher expected return** than Stock A while both investments have **the same level of risk.**' => '6',
                                'Both stocks offer **the same expected return**, but **Stock A is riskier** because its variance and standard deviation are greater.' => '7',
                                'Both stocks offer **the same expected return**, but **Stock B is riskier** because its variance and standard deviation are greater.' => '8',
                                'Both stocks have **the same expected return** and **the same level of risk** based on their variance and standard deviation.' => '9',
                            ],
                            'dataset' => 'strings',
                            'control' => 'DROPDOWN',
                            'default' => '**Stock A** offers a **higher expected return** than Stock B, but it is also **riskier** as its variance and standard deviation are greater.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'interpretation_2',
                            'label' => '',
                            'type' => 'select',
                            'options' => [
                                '**Stock A** offers a **higher expected return** than Stock B, but it is also **riskier** as its variance and standard deviation are greater.' => '1',
                                '**Stock A** offers a **higher expected return** than Stock B while also having **lower risk**, as its variance and standard deviation are smaller.' => '2',
                                '**Stock A** offers a **higher expected return** than Stock B while both investments have **the same level of risk.**' => '3',
                                '**Stock B** offers a **higher expected return** than Stock A while also having **lower risk**, as its variance and standard deviation are smaller.' => '4',
                                '**Stock B** offers a **higher expected return** than Stock A, but it is also **riskier** as its variance and standard deviation are greater.' => '5',
                                '**Stock B** offers a **higher expected return** than Stock A while both investments have **the same level of risk.**' => '6',
                                'Both stocks offer **the same expected return**, but **Stock A is riskier** because its variance and standard deviation are greater.' => '7',
                                'Both stocks offer **the same expected return**, but **Stock B is riskier** because its variance and standard deviation are greater.' => '8',
                                'Both stocks have **the same expected return** and **the same level of risk** based on their variance and standard deviation.' => '9',
                            ],
                            'dataset' => 'strings',
                            'control' => 'DROPDOWN',
                            'default' => '**Stock A** offers a **higher expected return** than Stock B while also having **lower risk**, as its variance and standard deviation are smaller.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'interpretation_3',
                            'label' => '',
                            'type' => 'select',
                            'options' => [
                                '**Stock A** offers a **higher expected return** than Stock B, but it is also **riskier** as its variance and standard deviation are greater.' => '1',
                                '**Stock A** offers a **higher expected return** than Stock B while also having **lower risk**, as its variance and standard deviation are smaller.' => '2',
                                '**Stock A** offers a **higher expected return** than Stock B while both investments have **the same level of risk.**' => '3',
                                '**Stock B** offers a **higher expected return** than Stock A while also having **lower risk**, as its variance and standard deviation are smaller.' => '4',
                                '**Stock B** offers a **higher expected return** than Stock A, but it is also **riskier** as its variance and standard deviation are greater.' => '5',
                                '**Stock B** offers a **higher expected return** than Stock A while both investments have **the same level of risk.**' => '6',
                                'Both stocks offer **the same expected return**, but **Stock A is riskier** because its variance and standard deviation are greater.' => '7',
                                'Both stocks offer **the same expected return**, but **Stock B is riskier** because its variance and standard deviation are greater.' => '8',
                                'Both stocks have **the same expected return** and **the same level of risk** based on their variance and standard deviation.' => '9',
                            ],
                            'dataset' => 'strings',
                            'control' => 'DROPDOWN',
                            'default' => '**Stock A** offers a **higher expected return** than Stock B while both investments have **the same level of risk.**',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'interpretation_4',
                            'label' => '',
                            'type' => 'select',
                            'options' => [
                                '**Stock A** offers a **higher expected return** than Stock B, but it is also **riskier** as its variance and standard deviation are greater.' => '1',
                                '**Stock A** offers a **higher expected return** than Stock B while also having **lower risk**, as its variance and standard deviation are smaller.' => '2',
                                '**Stock A** offers a **higher expected return** than Stock B while both investments have **the same level of risk.**' => '3',
                                '**Stock B** offers a **higher expected return** than Stock A while also having **lower risk**, as its variance and standard deviation are smaller.' => '4',
                                '**Stock B** offers a **higher expected return** than Stock A, but it is also **riskier** as its variance and standard deviation are greater.' => '5',
                                '**Stock B** offers a **higher expected return** than Stock A while both investments have **the same level of risk.**' => '6',
                                'Both stocks offer **the same expected return**, but **Stock A is riskier** because its variance and standard deviation are greater.' => '7',
                                'Both stocks offer **the same expected return**, but **Stock B is riskier** because its variance and standard deviation are greater.' => '8',
                                'Both stocks have **the same expected return** and **the same level of risk** based on their variance and standard deviation.' => '9',
                            ],
                            'dataset' => 'strings',
                            'control' => 'DROPDOWN',
                            'default' => '**Stock B** offers a **higher expected return** than Stock A while also having **lower risk**, as its variance and standard deviation are smaller.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'interpretation_5',
                            'label' => '',
                            'type' => 'select',
                            'options' => [
                                '**Stock A** offers a **higher expected return** than Stock B, but it is also **riskier** as its variance and standard deviation are greater.' => '1',
                                '**Stock A** offers a **higher expected return** than Stock B while also having **lower risk**, as its variance and standard deviation are smaller.' => '2',
                                '**Stock A** offers a **higher expected return** than Stock B while both investments have **the same level of risk.**' => '3',
                                '**Stock B** offers a **higher expected return** than Stock A while also having **lower risk**, as its variance and standard deviation are smaller.' => '4',
                                '**Stock B** offers a **higher expected return** than Stock A, but it is also **riskier** as its variance and standard deviation are greater.' => '5',
                                '**Stock B** offers a **higher expected return** than Stock A while both investments have **the same level of risk.**' => '6',
                                'Both stocks offer **the same expected return**, but **Stock A is riskier** because its variance and standard deviation are greater.' => '7',
                                'Both stocks offer **the same expected return**, but **Stock B is riskier** because its variance and standard deviation are greater.' => '8',
                                'Both stocks have **the same expected return** and **the same level of risk** based on their variance and standard deviation.' => '9',
                            ],
                            'dataset' => 'strings',
                            'control' => 'DROPDOWN',
                            'default' => '**Stock B** offers a **higher expected return** than Stock A, but it is also **riskier** as its variance and standard deviation are greater.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'interpretation_6',
                            'label' => '',
                            'type' => 'select',
                            'options' => [
                                '**Stock A** offers a **higher expected return** than Stock B, but it is also **riskier** as its variance and standard deviation are greater.' => '1',
                                '**Stock A** offers a **higher expected return** than Stock B while also having **lower risk**, as its variance and standard deviation are smaller.' => '2',
                                '**Stock A** offers a **higher expected return** than Stock B while both investments have **the same level of risk.**' => '3',
                                '**Stock B** offers a **higher expected return** than Stock A while also having **lower risk**, as its variance and standard deviation are smaller.' => '4',
                                '**Stock B** offers a **higher expected return** than Stock A, but it is also **riskier** as its variance and standard deviation are greater.' => '5',
                                '**Stock B** offers a **higher expected return** than Stock A while both investments have **the same level of risk.**' => '6',
                                'Both stocks offer **the same expected return**, but **Stock A is riskier** because its variance and standard deviation are greater.' => '7',
                                'Both stocks offer **the same expected return**, but **Stock B is riskier** because its variance and standard deviation are greater.' => '8',
                                'Both stocks have **the same expected return** and **the same level of risk** based on their variance and standard deviation.' => '9',
                            ],
                            'dataset' => 'strings',
                            'control' => 'DROPDOWN',
                            'default' => '**Stock B** offers a **higher expected return** than Stock A while both investments have **the same level of risk.**',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'interpretation_7',
                            'label' => '',
                            'type' => 'select',
                            'options' => [
                                '**Stock A** offers a **higher expected return** than Stock B, but it is also **riskier** as its variance and standard deviation are greater.' => '1',
                                '**Stock A** offers a **higher expected return** than Stock B while also having **lower risk**, as its variance and standard deviation are smaller.' => '2',
                                '**Stock A** offers a **higher expected return** than Stock B while both investments have **the same level of risk.**' => '3',
                                '**Stock B** offers a **higher expected return** than Stock A while also having **lower risk**, as its variance and standard deviation are smaller.' => '4',
                                '**Stock B** offers a **higher expected return** than Stock A, but it is also **riskier** as its variance and standard deviation are greater.' => '5',
                                '**Stock B** offers a **higher expected return** than Stock A while both investments have **the same level of risk.**' => '6',
                                'Both stocks offer **the same expected return**, but **Stock A is riskier** because its variance and standard deviation are greater.' => '7',
                                'Both stocks offer **the same expected return**, but **Stock B is riskier** because its variance and standard deviation are greater.' => '8',
                                'Both stocks have **the same expected return** and **the same level of risk** based on their variance and standard deviation.' => '9',
                            ],
                            'dataset' => 'strings',
                            'control' => 'DROPDOWN',
                            'default' => 'Both stocks offer **the same expected return**, but **Stock A is riskier** because its variance and standard deviation are greater.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'interpretation_8',
                            'label' => '',
                            'type' => 'select',
                            'options' => [
                                '**Stock A** offers a **higher expected return** than Stock B, but it is also **riskier** as its variance and standard deviation are greater.' => '1',
                                '**Stock A** offers a **higher expected return** than Stock B while also having **lower risk**, as its variance and standard deviation are smaller.' => '2',
                                '**Stock A** offers a **higher expected return** than Stock B while both investments have **the same level of risk.**' => '3',
                                '**Stock B** offers a **higher expected return** than Stock A while also having **lower risk**, as its variance and standard deviation are smaller.' => '4',
                                '**Stock B** offers a **higher expected return** than Stock A, but it is also **riskier** as its variance and standard deviation are greater.' => '5',
                                '**Stock B** offers a **higher expected return** than Stock A while both investments have **the same level of risk.**' => '6',
                                'Both stocks offer **the same expected return**, but **Stock A is riskier** because its variance and standard deviation are greater.' => '7',
                                'Both stocks offer **the same expected return**, but **Stock B is riskier** because its variance and standard deviation are greater.' => '8',
                                'Both stocks have **the same expected return** and **the same level of risk** based on their variance and standard deviation.' => '9',
                            ],
                            'dataset' => 'strings',
                            'control' => 'DROPDOWN',
                            'default' => 'Both stocks offer **the same expected return**, but **Stock B is riskier** because its variance and standard deviation are greater.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'interpretation_9',
                            'label' => '',
                            'type' => 'select',
                            'options' => [
                                '**Stock A** offers a **higher expected return** than Stock B, but it is also **riskier** as its variance and standard deviation are greater.' => '1',
                                '**Stock A** offers a **higher expected return** than Stock B while also having **lower risk**, as its variance and standard deviation are smaller.' => '2',
                                '**Stock A** offers a **higher expected return** than Stock B while both investments have **the same level of risk.**' => '3',
                                '**Stock B** offers a **higher expected return** than Stock A while also having **lower risk**, as its variance and standard deviation are smaller.' => '4',
                                '**Stock B** offers a **higher expected return** than Stock A, but it is also **riskier** as its variance and standard deviation are greater.' => '5',
                                '**Stock B** offers a **higher expected return** than Stock A while both investments have **the same level of risk.**' => '6',
                                'Both stocks offer **the same expected return**, but **Stock A is riskier** because its variance and standard deviation are greater.' => '7',
                                'Both stocks offer **the same expected return**, but **Stock B is riskier** because its variance and standard deviation are greater.' => '8',
                                'Both stocks have **the same expected return** and **the same level of risk** based on their variance and standard deviation.' => '9',
                            ],
                            'dataset' => 'strings',
                            'control' => 'DROPDOWN',
                            'default' => 'Both stocks have **the same expected return** and **the same level of risk** based on their variance and standard deviation.',
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
                        ['name' => 'error_string', 'label' => 'Error string', 'type' => 'number', 'readonly' => true],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'returnA', 'label' => 'Return a', 'type' => 'number', 'readonly' => true],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'returnB', 'label' => 'Return b', 'type' => 'number', 'readonly' => true],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'varianceA', 'label' => 'Variance a', 'type' => 'number', 'readonly' => true],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'varianceB', 'label' => 'Variance b', 'type' => 'number', 'readonly' => true],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'sdA', 'label' => 'Sd a', 'type' => 'number', 'readonly' => true],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'sdB', 'label' => 'Sd b', 'type' => 'number', 'readonly' => true],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'interpretation_string', 'label' => 'Interpretation string', 'type' => 'number', 'readonly' => true],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [],
    'js' => <<<'TXT'
    "use strict";omni.onResult([],function(ctx,_ref){var p1=_ref.p1,p2=_ref.p2,p3=_ref.p3,p4=_ref.p4,p5=_ref.p5,p6=_ref.p6,p7=_ref.p7,p8=_ref.p8,p9=_ref.p9,p10=_ref.p10,p11=_ref.p11,p12=_ref.p12,p13=_ref.p13,p14=_ref.p14,p15=_ref.p15,p16=_ref.p16,p17=_ref.p17,p18=_ref.p18,p19=_ref.p19,p20=_ref.p20,p21=_ref.p21,p22=_ref.p22,p23=_ref.p23,p24=_ref.p24,p25=_ref.p25,A1=_ref.A1,A2=_ref.A2,A3=_ref.A3,A4=_ref.A4,A5=_ref.A5,A6=_ref.A6,A7=_ref.A7,A8=_ref.A8,A9=_ref.A9,A10=_ref.A10,A11=_ref.A11,A12=_ref.A12,A13=_ref.A13,A14=_ref.A14,A15=_ref.A15,A16=_ref.A16,A17=_ref.A17,A18=_ref.A18,A19=_ref.A19,A20=_ref.A20,A21=_ref.A21,A22=_ref.A22,A23=_ref.A23,A24=_ref.A24,A25=_ref.A25,B1=_ref.B1,B2=_ref.B2,B3=_ref.B3,B4=_ref.B4,B5=_ref.B5,B6=_ref.B6,B7=_ref.B7,B8=_ref.B8,B9=_ref.B9,B10=_ref.B10,B11=_ref.B11,B12=_ref.B12,B13=_ref.B13,B14=_ref.B14,B15=_ref.B15,B16=_ref.B16,B17=_ref.B17,B18=_ref.B18,B19=_ref.B19,B20=_ref.B20,B21=_ref.B21,B22=_ref.B22,B23=_ref.B23,B24=_ref.B24,B25=_ref.B25;var p=[p1,p2,p3,p4,p5,p6,p7,p8,p9,p10,p11,p12,p13,p14,p15,p16,p17,p18,p19,p20,p21,p22,p23,p24,p25];var A=[A1,A2,A3,A4,A5,A6,A7,A8,A9,A10,A11,A12,A13,A14,A15,A16,A17,A18,A19,A20,A21,A22,A23,A24,A25];var B=[B1,B2,B3,B4,B5,B6,B7,B8,B9,B10,B11,B12,B13,B14,B15,B16,B17,B18,B19,B20,B21,B22,B23,B24,B25];var probSum=0;for(var _i=0,_p=p;_i<_p.length;_i++){var prob=_p[_i];if(prob!==null){probSum+=prob}}if(Math.abs(probSum-100)>0.001){ctx.exportValue("error_string",ctx.getRawInput("error"));return}var expA=0;var expB=0;var varA=0;var varB=0;for(var i=0;i<p.length;i++){if(p[i]!==null&&A[i]!==null){expA+=p[i]/100*(A[i]/100)}if(p[i]!==null&&B[i]!==null){expB+=p[i]/100*(B[i]/100)}}for(var _i2=0;_i2<p.length;_i2++){if(p[_i2]!==null&&A[_i2]!==null){varA+=p[_i2]/100*Math.pow(A[_i2]/100-expA,2)}if(p[_i2]!==null&&B[_i2]!==null){varB+=p[_i2]/100*Math.pow(B[_i2]/100-expB,2)}}var sdA=Math.sqrt(varA);var sdB=Math.sqrt(varB);ctx.exportValue("returnA",mathjs.round(expA*100,4));ctx.exportValue("returnB",mathjs.round(expB*100,4));ctx.exportValue("varianceA",mathjs.round(varA,5));ctx.exportValue("varianceB",mathjs.round(varB,5));ctx.exportValue("sdA",mathjs.round(sdA*100,2));ctx.exportValue("sdB",mathjs.round(sdB*100,2));if(expA>expB&&sdA>sdB){ctx.exportValue("interpretation_string",ctx.getRawInput("interpretation_1"))}else if(expA>expB&&sdA<sdB){ctx.exportValue("interpretation_string",ctx.getRawInput("interpretation_2"))}else if(expA>expB&&sdA===sdB){ctx.exportValue("interpretation_string",ctx.getRawInput("interpretation_3"))}else if(expB>expA&&sdA>sdB){ctx.exportValue("interpretation_string",ctx.getRawInput("interpretation_4"))}else if(expB>expA&&sdB>sdA){ctx.exportValue("interpretation_string",ctx.getRawInput("interpretation_5"))}else if(expB>expA&&sdA===sdB){ctx.exportValue("interpretation_string",ctx.getRawInput("interpretation_6"))}else if(expA===expB&&sdA>sdB){ctx.exportValue("interpretation_string",ctx.getRawInput("interpretation_7"))}else if(expA===expB&&sdB>sdA){ctx.exportValue("interpretation_string",ctx.getRawInput("interpretation_8"))}else if(expA===expB&&sdA===sdB){ctx.exportValue("interpretation_string",ctx.getRawInput("interpretation_9"))}});//# sourceURL=customJs.js
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
        'error_string',
        'returnA',
        'returnB',
        'varianceA',
        'varianceB',
        'sdA',
        'sdB',
        'interpretation_string'
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
        Enter Prob. scn. 1, Stock A and Stock B into Expected return and the answer comes back as Error string and Return a. There is no hidden constant here: change error string and prob. scn. 1 moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Expected return calculator works', 'html' => <<<'TXT'
            <p>The Expected return calculator applies one relationship to 75 numbers and reports Error string, Return a and Return b.</p><p>What comes back is Error string, Return a, Return b and Variance a — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 75 boxes, and nothing else.</p><ul><li><strong>Prob. scn. 1</strong> — in %</li><li><strong>Stock A</strong> — in %</li><li><strong>Stock B</strong> — in %</li><li><strong>Prob. scn. 2</strong> — in %</li><li><strong>Stock A</strong> — in %</li><li><strong>Stock B</strong> — in %</li><li><strong>Prob. scn. 3</strong> — in %</li><li><strong>Stock A</strong> — in %</li><li><strong>Stock B</strong> — in %</li><li><strong>Prob. scn. 4</strong> — in %</li><li><strong>Stock A</strong> — in %</li><li><strong>Stock B</strong> — in %</li><li><strong>Prob. scn. 5</strong> — in %</li><li><strong>Stock A</strong> — in %</li><li><strong>Stock B</strong> — in %</li><li><strong>Prob. scn. 6</strong> — in %</li><li><strong>Stock A</strong> — in %</li><li><strong>Stock B</strong> — in %</li><li><strong>Prob. scn. 7</strong> — in %</li><li><strong>Stock A</strong> — in %</li><li><strong>Stock B</strong> — in %</li><li><strong>Prob. scn. 8</strong> — in %</li><li><strong>Stock A</strong> — in %</li><li><strong>Stock B</strong> — in %</li><li><strong>Prob. scn. 9</strong> — in %</li><li><strong>Stock A</strong> — in %</li><li><strong>Stock B</strong> — in %</li><li><strong>Prob. scn. 10</strong> — in %</li><li><strong>Stock A</strong> — in %</li><li><strong>Stock B</strong> — in %</li><li><strong>Prob. scn. 11</strong> — in %</li><li><strong>Stock A</strong> — in %</li><li><strong>Stock B</strong> — in %</li><li><strong>Prob. scn. 12</strong> — in %</li><li><strong>Stock A</strong> — in %</li><li><strong>Stock B</strong> — in %</li><li><strong>Prob. scn. 13</strong> — in %</li><li><strong>Stock A</strong> — in %</li><li><strong>Stock B</strong> — in %</li><li><strong>Prob. scn. 14</strong> — in %</li><li><strong>Stock A</strong> — in %</li><li><strong>Stock B</strong> — in %</li><li><strong>Prob. scn. 15</strong> — in %</li><li><strong>Stock A</strong> — in %</li><li><strong>Stock B</strong> — in %</li><li><strong>Prob. scn. 16</strong> — in %</li><li><strong>Stock A</strong> — in %</li><li><strong>Stock B</strong> — in %</li><li><strong>Prob. scn. 17</strong> — in %</li><li><strong>Stock A</strong> — in %</li><li><strong>Stock B</strong> — in %</li><li><strong>Prob. scn. 18</strong> — in %</li><li><strong>Stock A</strong> — in %</li><li><strong>Stock B</strong> — in %</li><li><strong>Prob. scn. 19</strong> — in %</li><li><strong>Stock A</strong> — in %</li><li><strong>Stock B</strong> — in %</li><li><strong>Prob. scn. 20</strong> — in %</li><li><strong>Stock A</strong> — in %</li><li><strong>Stock B</strong> — in %</li><li><strong>Prob. scn. 21</strong> — in %</li><li><strong>Stock A (%)</strong> — a plain number, no unit</li><li><strong>Stock B</strong> — in %</li><li><strong>Prob. scn. 22</strong> — in %</li><li><strong>Stock A</strong> — in %</li><li><strong>Stock B</strong> — in %</li><li><strong>Prob. scn. 23</strong> — in %</li><li><strong>Stock A</strong> — in %</li><li><strong>Stock B</strong> — in %</li><li><strong>Prob. scn. 24</strong> — in %</li><li><strong>Stock A</strong> — in %</li><li><strong>Stock B</strong> — in %</li><li><strong>Prob. scn. 25</strong> — in %</li><li><strong>Stock A</strong> — in %</li><li><strong>Stock B</strong> — in %</li></ul><p>The result boxes are Error string, Return a, Return b, Variance a, Variance b, Sd a, Sd b, Interpretation string; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Error string is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Error string, Return a and Return b are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Prob. scn. 1 left as a guess.</strong> Anything typed into Prob. scn. 1 is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Stock A left as a guess.</strong> Anything typed into Stock A is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Stock B left as a guess.</strong> Anything typed into Stock B is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Prob. scn. 1 to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>Expected return is not a single equation with a single answer. It reads Prob. scn. 1, Stock A, Stock B and Prob. scn. 2, applies the analysis the page is built around, and reports Error string, Return a, Return b and Variance a.</p><p>That work happens in your browser, on the text you paste, and nothing is sent anywhere to be analysed. Close the tab and the sequence is gone; there is no record of it on the server and no account attached to it.</p><p>What that means in practice is that the answer is only as good as the text you give it. A stray character, a line break in the wrong place or a lower-case where the format expects upper-case will change the result, and the page has no way to know which of those happened — it analyses exactly what it is handed.</p><p>The results to look at are Error string, Return a, Return b and Variance a. They are reported together because they describe the same input from different angles, and reading one without the others is how a plausible number gets mistaken for a good one.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Prob. scn. 1, Stock A, Stock B and Prob. scn. 2. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Prob. scn. 1 into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Error string with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Error string is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Prob. scn. 1, Stock A and Stock B are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Prob. scn. 1, Stock A and Stock B and the number you are missing is Error string and Return a.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/degree-of-operating-leverage">Degree of operating leverage Calculator</a>, <a href="/finance/depreciation">Depreciation Calculator</a> and <a href="/finance/direct-material-price-variance">Direct material price variance Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
            ['title' => 'Where this fits among the other calculators', 'html' => <<<'TXT'
            <p>Neighbouring pages resolve the parts of the same job that Expected return leaves alone. Knowing which is which saves running the wrong one:</p><p>Worth opening next: <a href="/finance/degree-of-operating-leverage">Degree of operating leverage Calculator</a>, <a href="/finance/depreciation">Depreciation Calculator</a> and <a href="/finance/direct-material-price-variance">Direct material price variance Calculator</a>. They follow the same pattern as this page (form, formula, worked example, answer), so a reader who understands one understands the others.</p><p>Using the page that already answers the question you have is better than adapting this one: the formula and the units will match what you expect, and the worked example will be about your case.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Expected return is a number to act on, so the useful question is what to do with Error string, Return a and Return b once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Prob. scn. 1, Stock A, Stock B and Prob. scn. 2 alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Expected return calculator work out?', 'a' => 'Error string, Return a, Return b and Variance a.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Prob. scn. 1 (%), Stock A (%), Stock B (%), Prob. scn. 2 (%), Stock A (%). Enter prob. scn. 1, stock A and stock B; Error string is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Error string is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            Every box has to have a number in it. What this page returns is Error string, so an empty input simply leaves the result blank rather than choosing a new unknown.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Error string keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/degree-of-operating-leverage', 'name' => 'Degree of operating leverage Calculator'],
            ['path' => '/finance/depreciation', 'name' => 'Depreciation Calculator'],
            ['path' => '/finance/direct-material-price-variance', 'name' => 'Direct material price variance Calculator'],
        ],
        'authors' => [],
    ],
];
