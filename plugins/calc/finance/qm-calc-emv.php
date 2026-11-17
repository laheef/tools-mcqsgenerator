<?php

/**
 * EMV (expected monetary value)
 * /finance/emv
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'EMV (expected monetary value)',
    'meta' => ['title' => 'EMV (expected monetary value) — Formula & Results', 'description' => 'EMV (expected monetary value) turns how many risks are you considering in your EMV calculation?, impact of occurrence and probability of occurrence into EMV.', 'h1' => 'EMV (expected monetary value) Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'num_risks',
                            'label' => 'How many risks are you considering in your EMV calculation?',
                            'type' => 'select',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                                '7' => '7',
                                '8' => '8',
                                '9' => '9',
                                '10' => '10',
                            ],
                            'dataset' => 'num_risks',
                            'control' => 'DROPDOWN',
                            'default' => '1',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Risk 1',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'impact1',
                            'label' => 'Impact of occurrence',
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
                            'name' => 'prob1',
                            'label' => 'Probability of occurrence',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Risk 2',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'impact2',
                            'label' => 'Impact of occurrence',
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
                            'name' => 'prob2',
                            'label' => 'Probability of occurrence',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Risk 3',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'impact3',
                            'label' => 'Impact of occurrence',
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
                            'name' => 'prob3',
                            'label' => 'Probability of occurrence',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Risk 4',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'impact4',
                            'label' => 'Impact of occurrence',
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
                            'name' => 'prob4',
                            'label' => 'Probability of occurrence',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Risk 5',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'impact5',
                            'label' => 'Impact of occurrence',
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
                            'name' => 'prob5',
                            'label' => 'Probability of occurrence',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Risk 6',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'impact6',
                            'label' => 'Impact of occurrence',
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
                            'name' => 'prob6',
                            'label' => 'Probability of occurrence',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Risk 7',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'impact7',
                            'label' => 'Impact of occurrence',
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
                            'name' => 'prob7',
                            'label' => 'Probability of occurrence',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Risk 8',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'impact8',
                            'label' => 'Impact of occurrence',
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
                            'name' => 'prob8',
                            'label' => 'Probability of occurrence',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Risk 9',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'impact9',
                            'label' => 'Impact of occurrence',
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
                            'name' => 'prob9',
                            'label' => 'Probability of occurrence',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Risk 10',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'impact10',
                            'label' => 'Impact of occurrence',
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
                            'name' => 'prob10',
                            'label' => 'Probability of occurrence',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Expected monetary value (EMV)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'emv_1',
                            'label' => 'EMV',
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
                            'name' => 'emv_2',
                            'label' => 'EMV',
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
                            'name' => 'emv_3',
                            'label' => 'EMV',
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
                            'name' => 'emv_4',
                            'label' => 'EMV',
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
                            'name' => 'emv_5',
                            'label' => 'EMV',
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
                            'name' => 'emv_6',
                            'label' => 'EMV',
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
                            'name' => 'emv_7',
                            'label' => 'EMV',
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
                            'name' => 'emv_8',
                            'label' => 'EMV',
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
                            'name' => 'emv_9',
                            'label' => 'EMV',
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
                            'name' => 'emv_10',
                            'label' => 'EMV',
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
            'title' => <<<'TXT'
            emv_10 = impact1 * prob1 + impact2 * prob2 + impact3 * prob3 + impact4 * prob4 + impact5 * prob5 + impact6 * prob6 + impact7 * prob7 + impact8 * prob8 + impact9 * prob9 + impact10 * prob10
            TXT,
            'results' => [
                'prob4' => <<<'TXT'
                (emv_10 - impact1*prob1 - impact10*prob10 - impact2*prob2 - impact3*prob3 - impact5*prob5 - impact6*prob6 - impact7*prob7 - impact8*prob8 - impact9*prob9)/impact4
                TXT,
                'prob9' => <<<'TXT'
                (emv_10 - impact1*prob1 - impact10*prob10 - impact2*prob2 - impact3*prob3 - impact4*prob4 - impact5*prob5 - impact6*prob6 - impact7*prob7 - impact8*prob8)/impact9
                TXT,
                'prob8' => <<<'TXT'
                (emv_10 - impact1*prob1 - impact10*prob10 - impact2*prob2 - impact3*prob3 - impact4*prob4 - impact5*prob5 - impact6*prob6 - impact7*prob7 - impact9*prob9)/impact8
                TXT,
                'impact9' => '(emv_10 - impact1*prob1 - impact10*prob10 - impact2*prob2 - impact3*prob3 - impact4*prob4 - impact5*prob5 - impact6*prob6 - impact7*prob7 - impact8*prob8)/prob9',
                'prob2' => <<<'TXT'
                (emv_10 - impact1*prob1 - impact10*prob10 - impact3*prob3 - impact4*prob4 - impact5*prob5 - impact6*prob6 - impact7*prob7 - impact8*prob8 - impact9*prob9)/impact2
                TXT,
                'impact8' => '(emv_10 - impact1*prob1 - impact10*prob10 - impact2*prob2 - impact3*prob3 - impact4*prob4 - impact5*prob5 - impact6*prob6 - impact7*prob7 - impact9*prob9)/prob8',
                'impact1' => '(emv_10 - impact10*prob10 - impact2*prob2 - impact3*prob3 - impact4*prob4 - impact5*prob5 - impact6*prob6 - impact7*prob7 - impact8*prob8 - impact9*prob9)/prob1',
                'prob3' => <<<'TXT'
                (emv_10 - impact1*prob1 - impact10*prob10 - impact2*prob2 - impact4*prob4 - impact5*prob5 - impact6*prob6 - impact7*prob7 - impact8*prob8 - impact9*prob9)/impact3
                TXT,
                'impact3' => '(emv_10 - impact1*prob1 - impact10*prob10 - impact2*prob2 - impact4*prob4 - impact5*prob5 - impact6*prob6 - impact7*prob7 - impact8*prob8 - impact9*prob9)/prob3',
                'impact2' => '(emv_10 - impact1*prob1 - impact10*prob10 - impact3*prob3 - impact4*prob4 - impact5*prob5 - impact6*prob6 - impact7*prob7 - impact8*prob8 - impact9*prob9)/prob2',
                'impact7' => '(emv_10 - impact1*prob1 - impact10*prob10 - impact2*prob2 - impact3*prob3 - impact4*prob4 - impact5*prob5 - impact6*prob6 - impact8*prob8 - impact9*prob9)/prob7',
                'prob7' => <<<'TXT'
                (emv_10 - impact1*prob1 - impact10*prob10 - impact2*prob2 - impact3*prob3 - impact4*prob4 - impact5*prob5 - impact6*prob6 - impact8*prob8 - impact9*prob9)/impact7
                TXT,
                'impact6' => '(emv_10 - impact1*prob1 - impact10*prob10 - impact2*prob2 - impact3*prob3 - impact4*prob4 - impact5*prob5 - impact7*prob7 - impact8*prob8 - impact9*prob9)/prob6',
                'impact5' => '(emv_10 - impact1*prob1 - impact10*prob10 - impact2*prob2 - impact3*prob3 - impact4*prob4 - impact6*prob6 - impact7*prob7 - impact8*prob8 - impact9*prob9)/prob5',
                'impact4' => '(emv_10 - impact1*prob1 - impact10*prob10 - impact2*prob2 - impact3*prob3 - impact5*prob5 - impact6*prob6 - impact7*prob7 - impact8*prob8 - impact9*prob9)/prob4',
                'impact10' => '(emv_10 - impact1*prob1 - impact2*prob2 - impact3*prob3 - impact4*prob4 - impact5*prob5 - impact6*prob6 - impact7*prob7 - impact8*prob8 - impact9*prob9)/prob10',
                'prob10' => <<<'TXT'
                (emv_10 - impact1*prob1 - impact2*prob2 - impact3*prob3 - impact4*prob4 - impact5*prob5 - impact6*prob6 - impact7*prob7 - impact8*prob8 - impact9*prob9)/impact10
                TXT,
                'prob5' => <<<'TXT'
                (emv_10 - impact1*prob1 - impact10*prob10 - impact2*prob2 - impact3*prob3 - impact4*prob4 - impact6*prob6 - impact7*prob7 - impact8*prob8 - impact9*prob9)/impact5
                TXT,
                'prob1' => <<<'TXT'
                (emv_10 - impact10*prob10 - impact2*prob2 - impact3*prob3 - impact4*prob4 - impact5*prob5 - impact6*prob6 - impact7*prob7 - impact8*prob8 - impact9*prob9)/impact1
                TXT,
                'emv_10' => 'impact1*prob1 + impact10*prob10 + impact2*prob2 + impact3*prob3 + impact4*prob4 + impact5*prob5 + impact6*prob6 + impact7*prob7 + impact8*prob8 + impact9*prob9',
                'prob6' => <<<'TXT'
                (emv_10 - impact1*prob1 - impact10*prob10 - impact2*prob2 - impact3*prob3 - impact4*prob4 - impact5*prob5 - impact7*prob7 - impact8*prob8 - impact9*prob9)/impact6
                TXT,
            ],
        ],
        [
            'title' => <<<'TXT'
            emv_9 = impact1 * prob1 + impact2 * prob2 + impact3 * prob3 + impact4 * prob4 + impact5 * prob5 + impact6 * prob6 + impact7 * prob7 + impact8 * prob8 + impact9 * prob9
            TXT,
            'results' => [
                'prob4' => '(emv_9 - impact1*prob1 - impact2*prob2 - impact3*prob3 - impact5*prob5 - impact6*prob6 - impact7*prob7 - impact8*prob8 - impact9*prob9)/impact4',
                'prob9' => '(emv_9 - impact1*prob1 - impact2*prob2 - impact3*prob3 - impact4*prob4 - impact5*prob5 - impact6*prob6 - impact7*prob7 - impact8*prob8)/impact9',
                'prob8' => '(emv_9 - impact1*prob1 - impact2*prob2 - impact3*prob3 - impact4*prob4 - impact5*prob5 - impact6*prob6 - impact7*prob7 - impact9*prob9)/impact8',
                'impact9' => '(emv_9 - impact1*prob1 - impact2*prob2 - impact3*prob3 - impact4*prob4 - impact5*prob5 - impact6*prob6 - impact7*prob7 - impact8*prob8)/prob9',
                'prob2' => '(emv_9 - impact1*prob1 - impact3*prob3 - impact4*prob4 - impact5*prob5 - impact6*prob6 - impact7*prob7 - impact8*prob8 - impact9*prob9)/impact2',
                'impact8' => '(emv_9 - impact1*prob1 - impact2*prob2 - impact3*prob3 - impact4*prob4 - impact5*prob5 - impact6*prob6 - impact7*prob7 - impact9*prob9)/prob8',
                'impact1' => '(emv_9 - impact2*prob2 - impact3*prob3 - impact4*prob4 - impact5*prob5 - impact6*prob6 - impact7*prob7 - impact8*prob8 - impact9*prob9)/prob1',
                'prob3' => '(emv_9 - impact1*prob1 - impact2*prob2 - impact4*prob4 - impact5*prob5 - impact6*prob6 - impact7*prob7 - impact8*prob8 - impact9*prob9)/impact3',
                'impact3' => '(emv_9 - impact1*prob1 - impact2*prob2 - impact4*prob4 - impact5*prob5 - impact6*prob6 - impact7*prob7 - impact8*prob8 - impact9*prob9)/prob3',
                'impact2' => '(emv_9 - impact1*prob1 - impact3*prob3 - impact4*prob4 - impact5*prob5 - impact6*prob6 - impact7*prob7 - impact8*prob8 - impact9*prob9)/prob2',
                'impact7' => '(emv_9 - impact1*prob1 - impact2*prob2 - impact3*prob3 - impact4*prob4 - impact5*prob5 - impact6*prob6 - impact8*prob8 - impact9*prob9)/prob7',
                'prob7' => '(emv_9 - impact1*prob1 - impact2*prob2 - impact3*prob3 - impact4*prob4 - impact5*prob5 - impact6*prob6 - impact8*prob8 - impact9*prob9)/impact7',
                'impact6' => '(emv_9 - impact1*prob1 - impact2*prob2 - impact3*prob3 - impact4*prob4 - impact5*prob5 - impact7*prob7 - impact8*prob8 - impact9*prob9)/prob6',
                'impact5' => '(emv_9 - impact1*prob1 - impact2*prob2 - impact3*prob3 - impact4*prob4 - impact6*prob6 - impact7*prob7 - impact8*prob8 - impact9*prob9)/prob5',
                'impact4' => '(emv_9 - impact1*prob1 - impact2*prob2 - impact3*prob3 - impact5*prob5 - impact6*prob6 - impact7*prob7 - impact8*prob8 - impact9*prob9)/prob4',
                'prob5' => '(emv_9 - impact1*prob1 - impact2*prob2 - impact3*prob3 - impact4*prob4 - impact6*prob6 - impact7*prob7 - impact8*prob8 - impact9*prob9)/impact5',
                'prob1' => '(emv_9 - impact2*prob2 - impact3*prob3 - impact4*prob4 - impact5*prob5 - impact6*prob6 - impact7*prob7 - impact8*prob8 - impact9*prob9)/impact1',
                'emv_9' => 'impact1*prob1 + impact2*prob2 + impact3*prob3 + impact4*prob4 + impact5*prob5 + impact6*prob6 + impact7*prob7 + impact8*prob8 + impact9*prob9',
                'prob6' => '(emv_9 - impact1*prob1 - impact2*prob2 - impact3*prob3 - impact4*prob4 - impact5*prob5 - impact7*prob7 - impact8*prob8 - impact9*prob9)/impact6',
            ],
        ],
        [
            'title' => 'emv_8 = impact1 * prob1 + impact2 * prob2 + impact3 * prob3 + impact4 * prob4 + impact5 * prob5 + impact6 * prob6 + impact7 * prob7 + impact8 * prob8',
            'results' => [
                'prob4' => '(emv_8 - impact1*prob1 - impact2*prob2 - impact3*prob3 - impact5*prob5 - impact6*prob6 - impact7*prob7 - impact8*prob8)/impact4',
                'impact6' => '(emv_8 - impact1*prob1 - impact2*prob2 - impact3*prob3 - impact4*prob4 - impact5*prob5 - impact7*prob7 - impact8*prob8)/prob6',
                'impact8' => '(emv_8 - impact1*prob1 - impact2*prob2 - impact3*prob3 - impact4*prob4 - impact5*prob5 - impact6*prob6 - impact7*prob7)/prob8',
                'impact5' => '(emv_8 - impact1*prob1 - impact2*prob2 - impact3*prob3 - impact4*prob4 - impact6*prob6 - impact7*prob7 - impact8*prob8)/prob5',
                'prob6' => '(emv_8 - impact1*prob1 - impact2*prob2 - impact3*prob3 - impact4*prob4 - impact5*prob5 - impact7*prob7 - impact8*prob8)/impact6',
                'impact4' => '(emv_8 - impact1*prob1 - impact2*prob2 - impact3*prob3 - impact5*prob5 - impact6*prob6 - impact7*prob7 - impact8*prob8)/prob4',
                'impact1' => '(emv_8 - impact2*prob2 - impact3*prob3 - impact4*prob4 - impact5*prob5 - impact6*prob6 - impact7*prob7 - impact8*prob8)/prob1',
                'emv_8' => 'impact1*prob1 + impact2*prob2 + impact3*prob3 + impact4*prob4 + impact5*prob5 + impact6*prob6 + impact7*prob7 + impact8*prob8',
                'prob3' => '(emv_8 - impact1*prob1 - impact2*prob2 - impact4*prob4 - impact5*prob5 - impact6*prob6 - impact7*prob7 - impact8*prob8)/impact3',
                'impact3' => '(emv_8 - impact1*prob1 - impact2*prob2 - impact4*prob4 - impact5*prob5 - impact6*prob6 - impact7*prob7 - impact8*prob8)/prob3',
                'prob5' => '(emv_8 - impact1*prob1 - impact2*prob2 - impact3*prob3 - impact4*prob4 - impact6*prob6 - impact7*prob7 - impact8*prob8)/impact5',
                'prob2' => '(emv_8 - impact1*prob1 - impact3*prob3 - impact4*prob4 - impact5*prob5 - impact6*prob6 - impact7*prob7 - impact8*prob8)/impact2',
                'impact2' => '(emv_8 - impact1*prob1 - impact3*prob3 - impact4*prob4 - impact5*prob5 - impact6*prob6 - impact7*prob7 - impact8*prob8)/prob2',
                'impact7' => '(emv_8 - impact1*prob1 - impact2*prob2 - impact3*prob3 - impact4*prob4 - impact5*prob5 - impact6*prob6 - impact8*prob8)/prob7',
                'prob7' => '(emv_8 - impact1*prob1 - impact2*prob2 - impact3*prob3 - impact4*prob4 - impact5*prob5 - impact6*prob6 - impact8*prob8)/impact7',
                'prob1' => '(emv_8 - impact2*prob2 - impact3*prob3 - impact4*prob4 - impact5*prob5 - impact6*prob6 - impact7*prob7 - impact8*prob8)/impact1',
                'prob8' => '(emv_8 - impact1*prob1 - impact2*prob2 - impact3*prob3 - impact4*prob4 - impact5*prob5 - impact6*prob6 - impact7*prob7)/impact8',
            ],
        ],
        [
            'title' => 'emv_7 = impact1 * prob1 + impact2 * prob2 + impact3 * prob3 + impact4 * prob4 + impact5 * prob5 + impact6 * prob6 + impact7 * prob7',
            'results' => [
                'prob4' => '(emv_7 - impact1*prob1 - impact2*prob2 - impact3*prob3 - impact5*prob5 - impact6*prob6 - impact7*prob7)/impact4',
                'impact6' => '(emv_7 - impact1*prob1 - impact2*prob2 - impact3*prob3 - impact4*prob4 - impact5*prob5 - impact7*prob7)/prob6',
                'impact5' => '(emv_7 - impact1*prob1 - impact2*prob2 - impact3*prob3 - impact4*prob4 - impact6*prob6 - impact7*prob7)/prob5',
                'prob6' => '(emv_7 - impact1*prob1 - impact2*prob2 - impact3*prob3 - impact4*prob4 - impact5*prob5 - impact7*prob7)/impact6',
                'impact4' => '(emv_7 - impact1*prob1 - impact2*prob2 - impact3*prob3 - impact5*prob5 - impact6*prob6 - impact7*prob7)/prob4',
                'impact1' => '(emv_7 - impact2*prob2 - impact3*prob3 - impact4*prob4 - impact5*prob5 - impact6*prob6 - impact7*prob7)/prob1',
                'prob3' => '(emv_7 - impact1*prob1 - impact2*prob2 - impact4*prob4 - impact5*prob5 - impact6*prob6 - impact7*prob7)/impact3',
                'impact3' => '(emv_7 - impact1*prob1 - impact2*prob2 - impact4*prob4 - impact5*prob5 - impact6*prob6 - impact7*prob7)/prob3',
                'prob5' => '(emv_7 - impact1*prob1 - impact2*prob2 - impact3*prob3 - impact4*prob4 - impact6*prob6 - impact7*prob7)/impact5',
                'prob2' => '(emv_7 - impact1*prob1 - impact3*prob3 - impact4*prob4 - impact5*prob5 - impact6*prob6 - impact7*prob7)/impact2',
                'impact2' => '(emv_7 - impact1*prob1 - impact3*prob3 - impact4*prob4 - impact5*prob5 - impact6*prob6 - impact7*prob7)/prob2',
                'impact7' => '(emv_7 - impact1*prob1 - impact2*prob2 - impact3*prob3 - impact4*prob4 - impact5*prob5 - impact6*prob6)/prob7',
                'prob7' => '(emv_7 - impact1*prob1 - impact2*prob2 - impact3*prob3 - impact4*prob4 - impact5*prob5 - impact6*prob6)/impact7',
                'prob1' => '(emv_7 - impact2*prob2 - impact3*prob3 - impact4*prob4 - impact5*prob5 - impact6*prob6 - impact7*prob7)/impact1',
                'emv_7' => 'impact1*prob1 + impact2*prob2 + impact3*prob3 + impact4*prob4 + impact5*prob5 + impact6*prob6 + impact7*prob7',
            ],
        ],
        [
            'title' => 'emv_6 = impact1 * prob1 + impact2 * prob2 + impact3 * prob3 + impact4 * prob4 + impact5 * prob5 + impact6 * prob6',
            'results' => [
                'prob4' => '(emv_6 - impact1*prob1 - impact2*prob2 - impact3*prob3 - impact5*prob5 - impact6*prob6)/impact4',
                'impact6' => '(emv_6 - impact1*prob1 - impact2*prob2 - impact3*prob3 - impact4*prob4 - impact5*prob5)/prob6',
                'impact5' => '(emv_6 - impact1*prob1 - impact2*prob2 - impact3*prob3 - impact4*prob4 - impact6*prob6)/prob5',
                'prob6' => '(emv_6 - impact1*prob1 - impact2*prob2 - impact3*prob3 - impact4*prob4 - impact5*prob5)/impact6',
                'impact4' => '(emv_6 - impact1*prob1 - impact2*prob2 - impact3*prob3 - impact5*prob5 - impact6*prob6)/prob4',
                'impact1' => '(emv_6 - impact2*prob2 - impact3*prob3 - impact4*prob4 - impact5*prob5 - impact6*prob6)/prob1',
                'prob3' => '(emv_6 - impact1*prob1 - impact2*prob2 - impact4*prob4 - impact5*prob5 - impact6*prob6)/impact3',
                'impact3' => '(emv_6 - impact1*prob1 - impact2*prob2 - impact4*prob4 - impact5*prob5 - impact6*prob6)/prob3',
                'emv_6' => 'impact1*prob1 + impact2*prob2 + impact3*prob3 + impact4*prob4 + impact5*prob5 + impact6*prob6',
                'prob5' => '(emv_6 - impact1*prob1 - impact2*prob2 - impact3*prob3 - impact4*prob4 - impact6*prob6)/impact5',
                'prob2' => '(emv_6 - impact1*prob1 - impact3*prob3 - impact4*prob4 - impact5*prob5 - impact6*prob6)/impact2',
                'impact2' => '(emv_6 - impact1*prob1 - impact3*prob3 - impact4*prob4 - impact5*prob5 - impact6*prob6)/prob2',
                'prob1' => '(emv_6 - impact2*prob2 - impact3*prob3 - impact4*prob4 - impact5*prob5 - impact6*prob6)/impact1',
            ],
        ],
        [
            'title' => 'emv_5 = impact1 * prob1 + impact2 * prob2 + impact3 * prob3 + impact4 * prob4 + impact5 * prob5',
            'results' => [
                'prob4' => '(emv_5 - impact1*prob1 - impact2*prob2 - impact3*prob3 - impact5*prob5)/impact4',
                'impact5' => '(emv_5 - impact1*prob1 - impact2*prob2 - impact3*prob3 - impact4*prob4)/prob5',
                'impact4' => '(emv_5 - impact1*prob1 - impact2*prob2 - impact3*prob3 - impact5*prob5)/prob4',
                'emv_5' => 'impact1*prob1 + impact2*prob2 + impact3*prob3 + impact4*prob4 + impact5*prob5',
                'impact1' => '(emv_5 - impact2*prob2 - impact3*prob3 - impact4*prob4 - impact5*prob5)/prob1',
                'prob3' => '(emv_5 - impact1*prob1 - impact2*prob2 - impact4*prob4 - impact5*prob5)/impact3',
                'impact3' => '(emv_5 - impact1*prob1 - impact2*prob2 - impact4*prob4 - impact5*prob5)/prob3',
                'prob5' => '(emv_5 - impact1*prob1 - impact2*prob2 - impact3*prob3 - impact4*prob4)/impact5',
                'prob2' => '(emv_5 - impact1*prob1 - impact3*prob3 - impact4*prob4 - impact5*prob5)/impact2',
                'impact2' => '(emv_5 - impact1*prob1 - impact3*prob3 - impact4*prob4 - impact5*prob5)/prob2',
                'prob1' => '(emv_5 - impact2*prob2 - impact3*prob3 - impact4*prob4 - impact5*prob5)/impact1',
            ],
        ],
        [
            'title' => 'emv_4 = impact1 * prob1 + impact2 * prob2 + impact3 * prob3 + impact4 * prob4',
            'results' => [
                'prob4' => '(emv_4 - impact1*prob1 - impact2*prob2 - impact3*prob3)/impact4',
                'impact4' => '(emv_4 - impact1*prob1 - impact2*prob2 - impact3*prob3)/prob4',
                'impact1' => '(emv_4 - impact2*prob2 - impact3*prob3 - impact4*prob4)/prob1',
                'prob3' => '(emv_4 - impact1*prob1 - impact2*prob2 - impact4*prob4)/impact3',
                'emv_4' => 'impact1*prob1 + impact2*prob2 + impact3*prob3 + impact4*prob4',
                'impact3' => '(emv_4 - impact1*prob1 - impact2*prob2 - impact4*prob4)/prob3',
                'prob2' => '(emv_4 - impact1*prob1 - impact3*prob3 - impact4*prob4)/impact2',
                'impact2' => '(emv_4 - impact1*prob1 - impact3*prob3 - impact4*prob4)/prob2',
                'prob1' => '(emv_4 - impact2*prob2 - impact3*prob3 - impact4*prob4)/impact1',
            ],
        ],
        [
            'title' => 'emv_3 = impact1 * prob1 + impact2 * prob2 + impact3 * prob3',
            'results' => [
                'emv_3' => 'impact1*prob1 + impact2*prob2 + impact3*prob3',
                'impact1' => '(emv_3 - impact2*prob2 - impact3*prob3)/prob1',
                'prob3' => '(emv_3 - impact1*prob1 - impact2*prob2)/impact3',
                'impact3' => '(emv_3 - impact1*prob1 - impact2*prob2)/prob3',
                'prob2' => '(emv_3 - impact1*prob1 - impact3*prob3)/impact2',
                'impact2' => '(emv_3 - impact1*prob1 - impact3*prob3)/prob2',
                'prob1' => '(emv_3 - impact2*prob2 - impact3*prob3)/impact1',
            ],
        ],
        [
            'title' => 'emv_2 = impact1 * prob1 + impact2 * prob2',
            'results' => [
                'impact1' => '(emv_2 - impact2*prob2)/prob1',
                'emv_2' => 'impact1*prob1 + impact2*prob2',
                'prob2' => '(emv_2 - impact1*prob1)/impact2',
                'impact2' => '(emv_2 - impact1*prob1)/prob2',
                'prob1' => '(emv_2 - impact2*prob2)/impact1',
            ],
        ],
        [
            'title' => 'emv_1 = impact1 * prob1 ',
            'results' => ['prob1' => 'emv_1/impact1', 'impact1' => 'emv_1/prob1', 'emv_1' => 'impact1*prob1'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        EMV (expected monetary value) takes Impact of occurrence, Probability of occurrence and Impact of occurrence and returns EMV and EMV. Nothing is looked up on this page: EMV is computed from impact of occurrence and the other boxes, so an unusual pair of values gives an honest answer rather than an error. EMV is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the EMV (expected monetary value) calculator works', 'html' => <<<'TXT'
            <p>EMV (expected monetary value) answers one question from 20 numbers, and the answer is EMV, EMV and EMV.</p><p>The result panel carries EMV, EMV, EMV and EMV, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 20 boxes and the page has everything it needs.</p><ul><li><strong>Impact of occurrence</strong> — in USD</li><li><strong>Probability of occurrence</strong> — in percent</li><li><strong>Impact of occurrence</strong> — in USD</li><li><strong>Probability of occurrence</strong> — in percent</li><li><strong>Impact of occurrence</strong> — in USD</li><li><strong>Probability of occurrence</strong> — in percent</li><li><strong>Impact of occurrence</strong> — in USD</li><li><strong>Probability of occurrence</strong> — in percent</li><li><strong>Impact of occurrence</strong> — in USD</li><li><strong>Probability of occurrence</strong> — in percent</li><li><strong>Impact of occurrence</strong> — in USD</li><li><strong>Probability of occurrence</strong> — in percent</li><li><strong>Impact of occurrence</strong> — in USD</li><li><strong>Probability of occurrence</strong> — in percent</li><li><strong>Impact of occurrence</strong> — in USD</li><li><strong>Probability of occurrence</strong> — in percent</li><li><strong>Impact of occurrence</strong> — in USD</li><li><strong>Probability of occurrence</strong> — in percent</li><li><strong>Impact of occurrence</strong> — in USD</li><li><strong>Probability of occurrence</strong> — in percent</li></ul><p>The answers come back as EMV in USD, EMV in USD, EMV in USD, EMV in USD, EMV in USD, EMV in USD, EMV in USD, EMV in USD, EMV in USD, EMV in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Probability of occurrence offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>EMV</strong> = <code>Impact of occurrence × Probability of occurrence + Impact of occurrence × Probability of occurrence + Impact of occurrence × Probability of occurrence + Impact of occurrence × Probability of occurrence</code></li><li><strong>Probability of occurrence</strong> = <code>(EMV − Impact of occurrence × Probability of occurrence − Impact of occurrence × Probability of occurrence − Impact of occurrence × Probability of occurrence) ÷ Impact of occurrence</code></li><li><strong>Impact of occurrence</strong> = <code>(EMV − Impact of occurrence × Probability of occurrence − Impact of occurrence × Probability of occurrence − Impact of occurrence × Probability of occurrence) ÷ Probability of occurrence</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>EMV</strong> = <code>Impact of occurrence × Probability of occurrence + Impact of occurrence × Probability of occurrence + Impact of occurrence × Probability of occurrence + Impact of occurrence × Probability of occurrence</code> — the form to use when Impact of occurrence, Probability of occurrence, Impact of occurrence and Probability of occurrence are the values you have.</li><li><strong>Probability of occurrence</strong> = <code>(EMV − Impact of occurrence × Probability of occurrence − Impact of occurrence × Probability of occurrence − Impact of occurrence × Probability of occurrence) ÷ Impact of occurrence</code> — the form to use when EMV, Impact of occurrence, Probability of occurrence and Impact of occurrence are the values you have.</li><li><strong>Impact of occurrence</strong> = <code>(EMV − Impact of occurrence × Probability of occurrence − Impact of occurrence × Probability of occurrence − Impact of occurrence × Probability of occurrence) ÷ Probability of occurrence</code> — the form to use when EMV, Impact of occurrence, Probability of occurrence and Impact of occurrence are the values you have.</li><li><strong>Impact of occurrence</strong> = <code>(EMV − Impact of occurrence × Probability of occurrence − Impact of occurrence × Probability of occurrence − Impact of occurrence × Probability of occurrence) ÷ Probability of occurrence</code> — the form to use when EMV, Impact of occurrence, Probability of occurrence and Impact of occurrence are the values you have.</li><li><strong>Probability of occurrence</strong> = <code>(EMV − Impact of occurrence × Probability of occurrence − Impact of occurrence × Probability of occurrence − Impact of occurrence × Probability of occurrence) ÷ Impact of occurrence</code> — the form to use when EMV, Impact of occurrence, Probability of occurrence and Impact of occurrence are the values you have.</li><li><strong>Impact of occurrence</strong> = <code>(EMV − Impact of occurrence × Probability of occurrence − Impact of occurrence × Probability of occurrence − Impact of occurrence × Probability of occurrence) ÷ Probability of occurrence</code> — the form to use when EMV, Impact of occurrence, Probability of occurrence and Impact of occurrence are the values you have.</li><li><strong>Probability of occurrence</strong> = <code>(EMV − Impact of occurrence × Probability of occurrence − Impact of occurrence × Probability of occurrence − Impact of occurrence × Probability of occurrence) ÷ Impact of occurrence</code> — the form to use when EMV, Impact of occurrence, Probability of occurrence and Impact of occurrence are the values you have.</li><li><strong>Impact of occurrence</strong> = <code>(EMV − Impact of occurrence × Probability of occurrence − Impact of occurrence × Probability of occurrence − Impact of occurrence × Probability of occurrence) ÷ Probability of occurrence</code> — the form to use when EMV, Impact of occurrence, Probability of occurrence and Impact of occurrence are the values you have.</li></ul><p>Any one of EMV, Probability of occurrence and Probability of occurrence can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Probability of occurrence, Probability of occurrence and Probability of occurrence is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with EMV, EMV and EMV are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Impact of occurrence left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Impact of occurrence is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Probability of occurrence left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Probability of occurrence is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Impact of occurrence to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Impact of occurrence, Probability of occurrence, Impact of occurrence and Probability of occurrence. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Impact of occurrence into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare EMV in USD with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> EMV follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Impact of occurrence, Probability of occurrence and Impact of occurrence are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Impact of occurrence, Probability of occurrence and Impact of occurrence measured, EMV and EMV wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/productivity">Productivity Calculator</a>, <a href="/finance/profit">Profit Calculator</a> and <a href="/finance/profitability-index">Profitability index Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the EMV (expected monetary value) calculator work out?', 'a' => 'EMV, EMV, EMV and EMV, from Impact of occurrence, Probability of occurrence, Impact of occurrence and Probability of occurrence.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Impact of occurrence (USD), Probability of occurrence (percent), Impact of occurrence (USD), Probability of occurrence (percent), Impact of occurrence (USD). Fill impact of occurrence, probability of occurrence and impact of occurrence and leave EMV empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of EMV, Probability of occurrence, Probability of occurrence and Probability of occurrence blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally EMV is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Impact of occurrence left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. EMV keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/productivity', 'name' => 'Productivity Calculator'],
            ['path' => '/finance/profit', 'name' => 'Profit Calculator'],
            ['path' => '/finance/profitability-index', 'name' => 'Profitability index Calculator'],
        ],
        'authors' => [],
    ],
];
