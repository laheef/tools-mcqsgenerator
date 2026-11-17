<?php

/**
 * Portfolio beta
 * /finance/portfolio-beta
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Portfolio beta',
    'meta' => ['title' => 'Portfolio beta Calculator — Formula, Units & Example', 'description' => 'Portfolio beta works out print1 from 1^^st^^ stock beta and 1^^st^^ weight. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Portfolio beta Calculator', 'updated' => '2025-09-01'],
    'sections' => [
        [
            'title' => 'Stock weight in your portfolio and its respective beta',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p1',
                            'label' => '1^^st^^ stock beta',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'q1',
                            'label' => '1^^st^^ weight',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p2',
                            'label' => '2^^nd^^ stock beta',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'q2',
                            'label' => '2^^nd^^ weight',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p3',
                            'label' => '3^^rd^^ stock beta',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'q3',
                            'label' => '3^^rd^^ weight',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p4',
                            'label' => '4^^th^^ stock beta',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'q4',
                            'label' => '4^^th^^ weight',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p5',
                            'label' => '5^^th^^ stock beta',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'q5',
                            'label' => '5^^th^^ weight',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p6',
                            'label' => '6^^th^^ stock beta',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'q6',
                            'label' => '6^^th^^ weight',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p7',
                            'label' => '7^^th^^ stock beta',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'q7',
                            'label' => '7^^th^^ weight',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p8',
                            'label' => '8^^th^^ stock beta',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'q8',
                            'label' => '8^^th^^ weight',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p9',
                            'label' => '9^^th^^ stock beta',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'q9',
                            'label' => '9^^th^^ weight',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'p10',
                            'label' => '10^^th^^ stock beta',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'q10',
                            'label' => '10^^th^^ weight',
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
            'title' => '',
            'note' => '',
            'blocks' => [],
        ],
        [
            'title' => 'hidden',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'w_less_1',
                            'label' => 'Intro',
                            'type' => 'select',
                            'options' => [
                                'Weights have to sum up to 100%!' => '1',
                                'Your current portfolio allocation:' => '2',
                                'You have more than 100% of asset allocation. Check again your data!' => '3',
                                'The beta of your portfolio is' => '4',
                                'Your portfolio is' => '5',
                                'more volatile than the market.' => '6',
                                'less volatile than the market.' => '7',
                                'Your portfolio has a perfect correlation with the market.' => '8',
                                ' If the market goes up, your portfolio is likely to go up too. The opposite also applies.' => '9',
                                'Your portfolio has zero correlation with the market.' => '10',
                                'Both portfolio and market benchmark prices move independantly.' => '11',
                                'Your portfolio moves in the opposite direction to the market. If the market goes up, your portfolio is likely to go down in price. The opposite also applies.' => '12',
                                'In a bull market, your asset will outperform the benchmark. In a bear market, your asset will perform worst than the benchmark.' => '14',
                                'In a bull market, your asset will underperform the benchmark. In a bear market, your asset will be more defensive than the benchmark and produce lower losses.' => '15',
                                'Enter at least 2 assets percentage allocation and their respective beta.' => '16',
                                'We need more data!' => '17',
                            ],
                            'dataset' => 'string',
                            'control' => 'DROPDOWN',
                            'default' => 'Weights have to sum up to 100%!',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'w_more_1',
                            'label' => '',
                            'type' => 'select',
                            'options' => [
                                'Weights have to sum up to 100%!' => '1',
                                'Your current portfolio allocation:' => '2',
                                'You have more than 100% of asset allocation. Check again your data!' => '3',
                                'The beta of your portfolio is' => '4',
                                'Your portfolio is' => '5',
                                'more volatile than the market.' => '6',
                                'less volatile than the market.' => '7',
                                'Your portfolio has a perfect correlation with the market.' => '8',
                                ' If the market goes up, your portfolio is likely to go up too. The opposite also applies.' => '9',
                                'Your portfolio has zero correlation with the market.' => '10',
                                'Both portfolio and market benchmark prices move independantly.' => '11',
                                'Your portfolio moves in the opposite direction to the market. If the market goes up, your portfolio is likely to go down in price. The opposite also applies.' => '12',
                                'In a bull market, your asset will outperform the benchmark. In a bear market, your asset will perform worst than the benchmark.' => '14',
                                'In a bull market, your asset will underperform the benchmark. In a bear market, your asset will be more defensive than the benchmark and produce lower losses.' => '15',
                                'Enter at least 2 assets percentage allocation and their respective beta.' => '16',
                                'We need more data!' => '17',
                            ],
                            'dataset' => 'string',
                            'control' => 'DROPDOWN',
                            'default' => 'You have more than 100% of asset allocation. Check again your data!',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'w_is',
                            'label' => '',
                            'type' => 'select',
                            'options' => [
                                'Weights have to sum up to 100%!' => '1',
                                'Your current portfolio allocation:' => '2',
                                'You have more than 100% of asset allocation. Check again your data!' => '3',
                                'The beta of your portfolio is' => '4',
                                'Your portfolio is' => '5',
                                'more volatile than the market.' => '6',
                                'less volatile than the market.' => '7',
                                'Your portfolio has a perfect correlation with the market.' => '8',
                                ' If the market goes up, your portfolio is likely to go up too. The opposite also applies.' => '9',
                                'Your portfolio has zero correlation with the market.' => '10',
                                'Both portfolio and market benchmark prices move independantly.' => '11',
                                'Your portfolio moves in the opposite direction to the market. If the market goes up, your portfolio is likely to go down in price. The opposite also applies.' => '12',
                                'In a bull market, your asset will outperform the benchmark. In a bear market, your asset will perform worst than the benchmark.' => '14',
                                'In a bull market, your asset will underperform the benchmark. In a bear market, your asset will be more defensive than the benchmark and produce lower losses.' => '15',
                                'Enter at least 2 assets percentage allocation and their respective beta.' => '16',
                                'We need more data!' => '17',
                            ],
                            'dataset' => 'string',
                            'control' => 'DROPDOWN',
                            'default' => 'Your current portfolio allocation:',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'beta_is',
                            'label' => '',
                            'type' => 'select',
                            'options' => [
                                'Weights have to sum up to 100%!' => '1',
                                'Your current portfolio allocation:' => '2',
                                'You have more than 100% of asset allocation. Check again your data!' => '3',
                                'The beta of your portfolio is' => '4',
                                'Your portfolio is' => '5',
                                'more volatile than the market.' => '6',
                                'less volatile than the market.' => '7',
                                'Your portfolio has a perfect correlation with the market.' => '8',
                                ' If the market goes up, your portfolio is likely to go up too. The opposite also applies.' => '9',
                                'Your portfolio has zero correlation with the market.' => '10',
                                'Both portfolio and market benchmark prices move independantly.' => '11',
                                'Your portfolio moves in the opposite direction to the market. If the market goes up, your portfolio is likely to go down in price. The opposite also applies.' => '12',
                                'In a bull market, your asset will outperform the benchmark. In a bear market, your asset will perform worst than the benchmark.' => '14',
                                'In a bull market, your asset will underperform the benchmark. In a bear market, your asset will be more defensive than the benchmark and produce lower losses.' => '15',
                                'Enter at least 2 assets percentage allocation and their respective beta.' => '16',
                                'We need more data!' => '17',
                            ],
                            'dataset' => 'string',
                            'control' => 'DROPDOWN',
                            'default' => 'The beta of your portfolio is',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'portfolio_is',
                            'label' => '',
                            'type' => 'select',
                            'options' => [
                                'Weights have to sum up to 100%!' => '1',
                                'Your current portfolio allocation:' => '2',
                                'You have more than 100% of asset allocation. Check again your data!' => '3',
                                'The beta of your portfolio is' => '4',
                                'Your portfolio is' => '5',
                                'more volatile than the market.' => '6',
                                'less volatile than the market.' => '7',
                                'Your portfolio has a perfect correlation with the market.' => '8',
                                ' If the market goes up, your portfolio is likely to go up too. The opposite also applies.' => '9',
                                'Your portfolio has zero correlation with the market.' => '10',
                                'Both portfolio and market benchmark prices move independantly.' => '11',
                                'Your portfolio moves in the opposite direction to the market. If the market goes up, your portfolio is likely to go down in price. The opposite also applies.' => '12',
                                'In a bull market, your asset will outperform the benchmark. In a bear market, your asset will perform worst than the benchmark.' => '14',
                                'In a bull market, your asset will underperform the benchmark. In a bear market, your asset will be more defensive than the benchmark and produce lower losses.' => '15',
                                'Enter at least 2 assets percentage allocation and their respective beta.' => '16',
                                'We need more data!' => '17',
                            ],
                            'dataset' => 'string',
                            'control' => 'DROPDOWN',
                            'default' => 'Your portfolio is',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'more_vol',
                            'label' => '',
                            'type' => 'select',
                            'options' => [
                                'Weights have to sum up to 100%!' => '1',
                                'Your current portfolio allocation:' => '2',
                                'You have more than 100% of asset allocation. Check again your data!' => '3',
                                'The beta of your portfolio is' => '4',
                                'Your portfolio is' => '5',
                                'more volatile than the market.' => '6',
                                'less volatile than the market.' => '7',
                                'Your portfolio has a perfect correlation with the market.' => '8',
                                ' If the market goes up, your portfolio is likely to go up too. The opposite also applies.' => '9',
                                'Your portfolio has zero correlation with the market.' => '10',
                                'Both portfolio and market benchmark prices move independantly.' => '11',
                                'Your portfolio moves in the opposite direction to the market. If the market goes up, your portfolio is likely to go down in price. The opposite also applies.' => '12',
                                'In a bull market, your asset will outperform the benchmark. In a bear market, your asset will perform worst than the benchmark.' => '14',
                                'In a bull market, your asset will underperform the benchmark. In a bear market, your asset will be more defensive than the benchmark and produce lower losses.' => '15',
                                'Enter at least 2 assets percentage allocation and their respective beta.' => '16',
                                'We need more data!' => '17',
                            ],
                            'dataset' => 'string',
                            'control' => 'DROPDOWN',
                            'default' => 'more volatile than the market.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'less_vol',
                            'label' => '',
                            'type' => 'select',
                            'options' => [
                                'Weights have to sum up to 100%!' => '1',
                                'Your current portfolio allocation:' => '2',
                                'You have more than 100% of asset allocation. Check again your data!' => '3',
                                'The beta of your portfolio is' => '4',
                                'Your portfolio is' => '5',
                                'more volatile than the market.' => '6',
                                'less volatile than the market.' => '7',
                                'Your portfolio has a perfect correlation with the market.' => '8',
                                ' If the market goes up, your portfolio is likely to go up too. The opposite also applies.' => '9',
                                'Your portfolio has zero correlation with the market.' => '10',
                                'Both portfolio and market benchmark prices move independantly.' => '11',
                                'Your portfolio moves in the opposite direction to the market. If the market goes up, your portfolio is likely to go down in price. The opposite also applies.' => '12',
                                'In a bull market, your asset will outperform the benchmark. In a bear market, your asset will perform worst than the benchmark.' => '14',
                                'In a bull market, your asset will underperform the benchmark. In a bear market, your asset will be more defensive than the benchmark and produce lower losses.' => '15',
                                'Enter at least 2 assets percentage allocation and their respective beta.' => '16',
                                'We need more data!' => '17',
                            ],
                            'dataset' => 'string',
                            'control' => 'DROPDOWN',
                            'default' => 'less volatile than the market.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'corr_perfect',
                            'label' => '',
                            'type' => 'select',
                            'options' => [
                                'Weights have to sum up to 100%!' => '1',
                                'Your current portfolio allocation:' => '2',
                                'You have more than 100% of asset allocation. Check again your data!' => '3',
                                'The beta of your portfolio is' => '4',
                                'Your portfolio is' => '5',
                                'more volatile than the market.' => '6',
                                'less volatile than the market.' => '7',
                                'Your portfolio has a perfect correlation with the market.' => '8',
                                ' If the market goes up, your portfolio is likely to go up too. The opposite also applies.' => '9',
                                'Your portfolio has zero correlation with the market.' => '10',
                                'Both portfolio and market benchmark prices move independantly.' => '11',
                                'Your portfolio moves in the opposite direction to the market. If the market goes up, your portfolio is likely to go down in price. The opposite also applies.' => '12',
                                'In a bull market, your asset will outperform the benchmark. In a bear market, your asset will perform worst than the benchmark.' => '14',
                                'In a bull market, your asset will underperform the benchmark. In a bear market, your asset will be more defensive than the benchmark and produce lower losses.' => '15',
                                'Enter at least 2 assets percentage allocation and their respective beta.' => '16',
                                'We need more data!' => '17',
                            ],
                            'dataset' => 'string',
                            'control' => 'DROPDOWN',
                            'default' => 'Your portfolio has a perfect correlation with the market.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'corr_zero',
                            'label' => '',
                            'type' => 'select',
                            'options' => [
                                'Weights have to sum up to 100%!' => '1',
                                'Your current portfolio allocation:' => '2',
                                'You have more than 100% of asset allocation. Check again your data!' => '3',
                                'The beta of your portfolio is' => '4',
                                'Your portfolio is' => '5',
                                'more volatile than the market.' => '6',
                                'less volatile than the market.' => '7',
                                'Your portfolio has a perfect correlation with the market.' => '8',
                                ' If the market goes up, your portfolio is likely to go up too. The opposite also applies.' => '9',
                                'Your portfolio has zero correlation with the market.' => '10',
                                'Both portfolio and market benchmark prices move independantly.' => '11',
                                'Your portfolio moves in the opposite direction to the market. If the market goes up, your portfolio is likely to go down in price. The opposite also applies.' => '12',
                                'In a bull market, your asset will outperform the benchmark. In a bear market, your asset will perform worst than the benchmark.' => '14',
                                'In a bull market, your asset will underperform the benchmark. In a bear market, your asset will be more defensive than the benchmark and produce lower losses.' => '15',
                                'Enter at least 2 assets percentage allocation and their respective beta.' => '16',
                                'We need more data!' => '17',
                            ],
                            'dataset' => 'string',
                            'control' => 'DROPDOWN',
                            'default' => 'Your portfolio has zero correlation with the market.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'indep',
                            'label' => '',
                            'type' => 'select',
                            'options' => [
                                'Weights have to sum up to 100%!' => '1',
                                'Your current portfolio allocation:' => '2',
                                'You have more than 100% of asset allocation. Check again your data!' => '3',
                                'The beta of your portfolio is' => '4',
                                'Your portfolio is' => '5',
                                'more volatile than the market.' => '6',
                                'less volatile than the market.' => '7',
                                'Your portfolio has a perfect correlation with the market.' => '8',
                                ' If the market goes up, your portfolio is likely to go up too. The opposite also applies.' => '9',
                                'Your portfolio has zero correlation with the market.' => '10',
                                'Both portfolio and market benchmark prices move independantly.' => '11',
                                'Your portfolio moves in the opposite direction to the market. If the market goes up, your portfolio is likely to go down in price. The opposite also applies.' => '12',
                                'In a bull market, your asset will outperform the benchmark. In a bear market, your asset will perform worst than the benchmark.' => '14',
                                'In a bull market, your asset will underperform the benchmark. In a bear market, your asset will be more defensive than the benchmark and produce lower losses.' => '15',
                                'Enter at least 2 assets percentage allocation and their respective beta.' => '16',
                                'We need more data!' => '17',
                            ],
                            'dataset' => 'string',
                            'control' => 'DROPDOWN',
                            'default' => 'Both portfolio and market benchmark prices move independantly.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'up_up',
                            'label' => '',
                            'type' => 'select',
                            'options' => [
                                'Weights have to sum up to 100%!' => '1',
                                'Your current portfolio allocation:' => '2',
                                'You have more than 100% of asset allocation. Check again your data!' => '3',
                                'The beta of your portfolio is' => '4',
                                'Your portfolio is' => '5',
                                'more volatile than the market.' => '6',
                                'less volatile than the market.' => '7',
                                'Your portfolio has a perfect correlation with the market.' => '8',
                                ' If the market goes up, your portfolio is likely to go up too. The opposite also applies.' => '9',
                                'Your portfolio has zero correlation with the market.' => '10',
                                'Both portfolio and market benchmark prices move independantly.' => '11',
                                'Your portfolio moves in the opposite direction to the market. If the market goes up, your portfolio is likely to go down in price. The opposite also applies.' => '12',
                                'In a bull market, your asset will outperform the benchmark. In a bear market, your asset will perform worst than the benchmark.' => '14',
                                'In a bull market, your asset will underperform the benchmark. In a bear market, your asset will be more defensive than the benchmark and produce lower losses.' => '15',
                                'Enter at least 2 assets percentage allocation and their respective beta.' => '16',
                                'We need more data!' => '17',
                            ],
                            'dataset' => 'string',
                            'control' => 'DROPDOWN',
                            'default' => ' If the market goes up, your portfolio is likely to go up too. The opposite also applies.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'opposite',
                            'label' => '',
                            'type' => 'select',
                            'options' => [
                                'Weights have to sum up to 100%!' => '1',
                                'Your current portfolio allocation:' => '2',
                                'You have more than 100% of asset allocation. Check again your data!' => '3',
                                'The beta of your portfolio is' => '4',
                                'Your portfolio is' => '5',
                                'more volatile than the market.' => '6',
                                'less volatile than the market.' => '7',
                                'Your portfolio has a perfect correlation with the market.' => '8',
                                ' If the market goes up, your portfolio is likely to go up too. The opposite also applies.' => '9',
                                'Your portfolio has zero correlation with the market.' => '10',
                                'Both portfolio and market benchmark prices move independantly.' => '11',
                                'Your portfolio moves in the opposite direction to the market. If the market goes up, your portfolio is likely to go down in price. The opposite also applies.' => '12',
                                'In a bull market, your asset will outperform the benchmark. In a bear market, your asset will perform worst than the benchmark.' => '14',
                                'In a bull market, your asset will underperform the benchmark. In a bear market, your asset will be more defensive than the benchmark and produce lower losses.' => '15',
                                'Enter at least 2 assets percentage allocation and their respective beta.' => '16',
                                'We need more data!' => '17',
                            ],
                            'dataset' => 'string',
                            'control' => 'DROPDOWN',
                            'default' => 'Your portfolio moves in the opposite direction to the market. If the market goes up, your portfolio is likely to go down in price. The opposite also applies.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bull_out',
                            'label' => '',
                            'type' => 'select',
                            'options' => [
                                'Weights have to sum up to 100%!' => '1',
                                'Your current portfolio allocation:' => '2',
                                'You have more than 100% of asset allocation. Check again your data!' => '3',
                                'The beta of your portfolio is' => '4',
                                'Your portfolio is' => '5',
                                'more volatile than the market.' => '6',
                                'less volatile than the market.' => '7',
                                'Your portfolio has a perfect correlation with the market.' => '8',
                                ' If the market goes up, your portfolio is likely to go up too. The opposite also applies.' => '9',
                                'Your portfolio has zero correlation with the market.' => '10',
                                'Both portfolio and market benchmark prices move independantly.' => '11',
                                'Your portfolio moves in the opposite direction to the market. If the market goes up, your portfolio is likely to go down in price. The opposite also applies.' => '12',
                                'In a bull market, your asset will outperform the benchmark. In a bear market, your asset will perform worst than the benchmark.' => '14',
                                'In a bull market, your asset will underperform the benchmark. In a bear market, your asset will be more defensive than the benchmark and produce lower losses.' => '15',
                                'Enter at least 2 assets percentage allocation and their respective beta.' => '16',
                                'We need more data!' => '17',
                            ],
                            'dataset' => 'string',
                            'control' => 'DROPDOWN',
                            'default' => 'In a bull market, your asset will outperform the benchmark. In a bear market, your asset will perform worst than the benchmark.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bull_under',
                            'label' => '',
                            'type' => 'select',
                            'options' => [
                                'Weights have to sum up to 100%!' => '1',
                                'Your current portfolio allocation:' => '2',
                                'You have more than 100% of asset allocation. Check again your data!' => '3',
                                'The beta of your portfolio is' => '4',
                                'Your portfolio is' => '5',
                                'more volatile than the market.' => '6',
                                'less volatile than the market.' => '7',
                                'Your portfolio has a perfect correlation with the market.' => '8',
                                ' If the market goes up, your portfolio is likely to go up too. The opposite also applies.' => '9',
                                'Your portfolio has zero correlation with the market.' => '10',
                                'Both portfolio and market benchmark prices move independantly.' => '11',
                                'Your portfolio moves in the opposite direction to the market. If the market goes up, your portfolio is likely to go down in price. The opposite also applies.' => '12',
                                'In a bull market, your asset will outperform the benchmark. In a bear market, your asset will perform worst than the benchmark.' => '14',
                                'In a bull market, your asset will underperform the benchmark. In a bear market, your asset will be more defensive than the benchmark and produce lower losses.' => '15',
                                'Enter at least 2 assets percentage allocation and their respective beta.' => '16',
                                'We need more data!' => '17',
                            ],
                            'dataset' => 'string',
                            'control' => 'DROPDOWN',
                            'default' => 'In a bull market, your asset will underperform the benchmark. In a bear market, your asset will be more defensive than the benchmark and produce lower losses.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'more_data',
                            'label' => '',
                            'type' => 'select',
                            'options' => [
                                'Weights have to sum up to 100%!' => '1',
                                'Your current portfolio allocation:' => '2',
                                'You have more than 100% of asset allocation. Check again your data!' => '3',
                                'The beta of your portfolio is' => '4',
                                'Your portfolio is' => '5',
                                'more volatile than the market.' => '6',
                                'less volatile than the market.' => '7',
                                'Your portfolio has a perfect correlation with the market.' => '8',
                                ' If the market goes up, your portfolio is likely to go up too. The opposite also applies.' => '9',
                                'Your portfolio has zero correlation with the market.' => '10',
                                'Both portfolio and market benchmark prices move independantly.' => '11',
                                'Your portfolio moves in the opposite direction to the market. If the market goes up, your portfolio is likely to go down in price. The opposite also applies.' => '12',
                                'In a bull market, your asset will outperform the benchmark. In a bear market, your asset will perform worst than the benchmark.' => '14',
                                'In a bull market, your asset will underperform the benchmark. In a bear market, your asset will be more defensive than the benchmark and produce lower losses.' => '15',
                                'Enter at least 2 assets percentage allocation and their respective beta.' => '16',
                                'We need more data!' => '17',
                            ],
                            'dataset' => 'string',
                            'control' => 'DROPDOWN',
                            'default' => 'We need more data!',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'enter_2',
                            'label' => '',
                            'type' => 'select',
                            'options' => [
                                'Weights have to sum up to 100%!' => '1',
                                'Your current portfolio allocation:' => '2',
                                'You have more than 100% of asset allocation. Check again your data!' => '3',
                                'The beta of your portfolio is' => '4',
                                'Your portfolio is' => '5',
                                'more volatile than the market.' => '6',
                                'less volatile than the market.' => '7',
                                'Your portfolio has a perfect correlation with the market.' => '8',
                                ' If the market goes up, your portfolio is likely to go up too. The opposite also applies.' => '9',
                                'Your portfolio has zero correlation with the market.' => '10',
                                'Both portfolio and market benchmark prices move independantly.' => '11',
                                'Your portfolio moves in the opposite direction to the market. If the market goes up, your portfolio is likely to go down in price. The opposite also applies.' => '12',
                                'In a bull market, your asset will outperform the benchmark. In a bear market, your asset will perform worst than the benchmark.' => '14',
                                'In a bull market, your asset will underperform the benchmark. In a bear market, your asset will be more defensive than the benchmark and produce lower losses.' => '15',
                                'Enter at least 2 assets percentage allocation and their respective beta.' => '16',
                                'We need more data!' => '17',
                            ],
                            'dataset' => 'string',
                            'control' => 'DROPDOWN',
                            'default' => 'Enter at least 2 assets percentage allocation and their respective beta.',
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
                        ['name' => 'print1', 'label' => 'Print1', 'type' => 'number', 'readonly' => true],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'print2', 'label' => 'Print2', 'type' => 'number', 'readonly' => true],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [],
    'js' => <<<'TXT'
    "use strict";omni.onResult([],function(ctx,_ref){var p1=_ref.p1,p2=_ref.p2,p3=_ref.p3,p4=_ref.p4,p5=_ref.p5,p6=_ref.p6,p7=_ref.p7,p8=_ref.p8,p9=_ref.p9,p10=_ref.p10,q1=_ref.q1,q2=_ref.q2,q3=_ref.q3,q4=_ref.q4,q5=_ref.q5,q6=_ref.q6,q7=_ref.q7,q8=_ref.q8,q9=_ref.q9,q10=_ref.q10;var pList=[p1,p2,p3,p4,p5,p6,p7,p8,p9,p10];var qList=[q1,q2,q3,q4,q5,q6,q7,q8,q9,q10];var total_score=0;var total_weights=0;var length=0;for(var i=0;i<pList.length;i++){if(pList[i]!==null&&qList[i]!==null){total_score=total_score+pList[i]*qList[i];total_weights=total_weights+qList[i];length=length+1}}var beta=total_score;var Sq=total_weights;var w_print=mathjs.round(mathjs.abs((beta-1)*100),2);var b_print=mathjs.round(beta,3);var Sq_print=mathjs.round(Sq*100,2);if(Sq==1&&pList.length>=2&&qList.length>=2&&isNaN(beta)==0){ctx.exportValue("print1","**"+ctx.getRawInput("beta_is")+" "+b_print+".**");if(beta>1){ctx.exportValue("print2","* "+ctx.getRawInput("portfolio_is")+" **"+w_print+"% "+ctx.getRawInput("more_vol")+"**  \n * "+ctx.getRawInput("bull_out"))}else if(beta<1&&beta>0){ctx.exportValue("print2","* "+ctx.getRawInput("portfolio_is")+" **"+w_print+"% "+ctx.getRawInput("less_vol")+"**  \n * "+ctx.getRawInput("bull_under"))}else if(beta==1){ctx.exportValue("print2",ctx.getRawInput("corr_perfect")+ctx.getRawInput("up_up"))}else if(beta==0){ctx.exportValue("print2",ctx.getRawInput("corr_zero")+ctx.getRawInput("indep"))}else if(beta<0){ctx.exportValue("print2",ctx.getRawInput("opposite"))}}else if(length<2){ctx.exportValue("print1",ctx.getRawInput("more_data"));ctx.exportValue("print2",ctx.getRawInput("enter_2"))}else if(Sq<1){ctx.exportValue("print1",ctx.getRawInput("w_less_1"));ctx.exportValue("print2",ctx.getRawInput("w_is")+" **"+Sq_print+"%**")}else if(Sq>1){ctx.exportValue("print1",ctx.getRawInput("w_more_1"));ctx.exportValue("print2",ctx.getRawInput("w_is")+" **"+Sq_print+"%**")}});//# sourceURL=customJs.js
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
        'print1',
        'print2'
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
        Portfolio beta works out Print1 and Print2 from 1^^st^^ stock beta, 1^^st^^ weight and 2^^nd^^ stock beta. Nothing is looked up on this page: print1 is computed from 1^^st^^ stock beta and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Portfolio beta calculator works', 'html' => <<<'TXT'
            <p>Portfolio beta answers one question from 20 numbers, and the answer is Print1 and Print2.</p><p>The answers are Print1 and Print2; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 20 boxes and the page has everything it needs.</p><ul><li><strong>1^^st^^ stock beta</strong> — a plain number, no unit</li><li><strong>1^^st^^ weight</strong> — in percent</li><li><strong>2^^nd^^ stock beta</strong> — a plain number, no unit</li><li><strong>2^^nd^^ weight</strong> — in percent</li><li><strong>3^^rd^^ stock beta</strong> — a plain number, no unit</li><li><strong>3^^rd^^ weight</strong> — in percent</li><li><strong>4^^th^^ stock beta</strong> — a plain number, no unit</li><li><strong>4^^th^^ weight</strong> — in percent</li><li><strong>5^^th^^ stock beta</strong> — a plain number, no unit</li><li><strong>5^^th^^ weight</strong> — in percent</li><li><strong>6^^th^^ stock beta</strong> — a plain number, no unit</li><li><strong>6^^th^^ weight</strong> — in percent</li><li><strong>7^^th^^ stock beta</strong> — a plain number, no unit</li><li><strong>7^^th^^ weight</strong> — in percent</li><li><strong>8^^th^^ stock beta</strong> — a plain number, no unit</li><li><strong>8^^th^^ weight</strong> — in percent</li><li><strong>9^^th^^ stock beta</strong> — a plain number, no unit</li><li><strong>9^^th^^ weight</strong> — in percent</li><li><strong>10^^th^^ stock beta</strong> — a plain number, no unit</li><li><strong>10^^th^^ weight</strong> — in percent</li></ul><p>What you get back is Print1, Print2, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — 1^^st^^ stock beta = 3, 1^^st^^ weight = 4 perc, 2^^nd^^ stock beta = 5, 2^^nd^^ weight = 6 perc, 3^^rd^^ stock beta = 7, 3^^rd^^ weight = 8 perc, 4^^th^^ stock beta = 9, 4^^th^^ weight = 10 perc, 5^^th^^ stock beta = 2, 5^^th^^ weight = 3 perc, 6^^th^^ stock beta = 4, 6^^th^^ weight = 5 perc, 7^^th^^ stock beta = 6, 7^^th^^ weight = 7 perc, 8^^th^^ stock beta = 8, 8^^th^^ weight = 9 perc, 9^^th^^ stock beta = 10, 9^^th^^ weight = 2 perc, 10^^th^^ stock beta = 3 and 10^^th^^ weight = 4 perc — through the same formula and the panel reports <strong>Intro</strong> = 1, <strong>W more 1</strong> = 3, <strong>W is</strong> = 2, <strong>Beta is</strong> = 4, <strong>Portfolio is</strong> = 5, <strong>More vol</strong> = 6, <strong>Less vol</strong> = 7, <strong>Corr perfect</strong> = 8, <strong>Corr zero</strong> = 10, <strong>Indep</strong> = 11, <strong>Up up</strong> = 9, <strong>Opposite</strong> = 12, <strong>Bull out</strong> = 14, <strong>Bull under</strong> = 15, <strong>More data</strong> = 17 and <strong>Enter 2</strong> = 16.</p><ul><li><strong>Intro</strong> = 1</li><li><strong>W more 1</strong> = 3</li><li><strong>W is</strong> = 2</li><li><strong>Beta is</strong> = 4</li><li><strong>Portfolio is</strong> = 5</li><li><strong>More vol</strong> = 6</li><li><strong>Less vol</strong> = 7</li><li><strong>Corr perfect</strong> = 8</li><li><strong>Corr zero</strong> = 10</li><li><strong>Indep</strong> = 11</li><li><strong>Up up</strong> = 9</li><li><strong>Opposite</strong> = 12</li><li><strong>Bull out</strong> = 14</li><li><strong>Bull under</strong> = 15</li><li><strong>More data</strong> = 17</li><li><strong>Enter 2</strong> = 16</li></ul>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Intro</strong> = 1, <strong>W more 1</strong> = 3, <strong>W is</strong> = 2, <strong>Beta is</strong> = 4, <strong>Portfolio is</strong> = 5, <strong>More vol</strong> = 6, <strong>Less vol</strong> = 7, <strong>Corr perfect</strong> = 8, <strong>Corr zero</strong> = 10, <strong>Indep</strong> = 11, <strong>Up up</strong> = 9, <strong>Opposite</strong> = 12, <strong>Bull out</strong> = 14, <strong>Bull under</strong> = 15, <strong>More data</strong> = 17 and <strong>Enter 2</strong> = 16. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on 1^^st^^ weight lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — 1^^st^^ stock beta, from 3 to 6 — and the answers go from <strong>Intro</strong> 1, <strong>W more 1</strong> 3, <strong>W is</strong> 2, <strong>Beta is</strong> 4, <strong>Portfolio is</strong> 5, <strong>More vol</strong> 6, <strong>Less vol</strong> 7, <strong>Corr perfect</strong> 8, <strong>Corr zero</strong> 10, <strong>Indep</strong> 11, <strong>Up up</strong> 9, <strong>Opposite</strong> 12, <strong>Bull out</strong> 14, <strong>Bull under</strong> 15, <strong>More data</strong> 17 and <strong>Enter 2</strong> 16 to <strong>Intro</strong> 1, <strong>W more 1</strong> 3, <strong>W is</strong> 2, <strong>Beta is</strong> 4, <strong>Portfolio is</strong> 5, <strong>More vol</strong> 6, <strong>Less vol</strong> 7, <strong>Corr perfect</strong> 8, <strong>Corr zero</strong> 10, <strong>Indep</strong> 11, <strong>Up up</strong> 9, <strong>Opposite</strong> 12, <strong>Bull out</strong> 14, <strong>Bull under</strong> 15, <strong>More data</strong> 17 and <strong>Enter 2</strong> 16.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> 1^^st^^ weight, 2^^nd^^ weight and 3^^rd^^ weight carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Print1 and Print2 are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>1^^st^^ stock beta left as a guess.</strong> Anything typed into 1^^st^^ stock beta is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>1^^st^^ weight left as a guess.</strong> Anything typed into 1^^st^^ weight is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in 1^^st^^ stock beta and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Portfolio beta form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>1^^st^^ stock beta</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — 1^^st^^ stock beta is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>1^^st^^ weight</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Fill it from a measurement rather than a memory — 1^^st^^ weight is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>2^^nd^^ stock beta</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — 2^^nd^^ stock beta is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>2^^nd^^ weight</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Fill it from a measurement rather than a memory — 2^^nd^^ weight is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>3^^rd^^ stock beta</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — 3^^rd^^ stock beta is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>3^^rd^^ weight</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Fill it from a measurement rather than a memory — 3^^rd^^ weight is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>4^^th^^ stock beta</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — 4^^th^^ stock beta is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>4^^th^^ weight</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Fill it from a measurement rather than a memory — 4^^th^^ weight is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>5^^th^^ stock beta</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — 5^^th^^ stock beta is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>5^^th^^ weight</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Fill it from a measurement rather than a memory — 5^^th^^ weight is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>6^^th^^ stock beta</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — 6^^th^^ stock beta is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>6^^th^^ weight</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Fill it from a measurement rather than a memory — 6^^th^^ weight is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>7^^th^^ stock beta</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — 7^^th^^ stock beta is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>7^^th^^ weight</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Fill it from a measurement rather than a memory — 7^^th^^ weight is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>8^^th^^ stock beta</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — 8^^th^^ stock beta is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>8^^th^^ weight</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Fill it from a measurement rather than a memory — 8^^th^^ weight is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>9^^th^^ stock beta</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — 9^^th^^ stock beta is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>9^^th^^ weight</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Fill it from a measurement rather than a memory — 9^^th^^ weight is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>10^^th^^ stock beta</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — 10^^th^^ stock beta is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>10^^th^^ weight</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Fill it from a measurement rather than a memory — 10^^th^^ weight is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>The calculation on this page is a procedure rather than one formula: it takes Portfolio beta, works through it, and the panel lists 1^^st^^ stock beta, 1^^st^^ weight, 2^^nd^^ stock beta and 2^^nd^^ weight.</p><p>The processing runs locally: the text you enter stays in the page, the script reads it, and the results are printed beside it. Nothing about your input is stored after you leave.</p><p>Because the script works on exactly what it is given, the usual failure is not arithmetic but input: trailing spaces, a header line from a FASTA file, an ambiguous base in the middle of a sequence. Check that the box holds the characters you meant and nothing else.</p><p>What comes back is Print1 and Print2 — the same input described several ways, which is why the panel lists them side by side rather than picking one.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Print1 is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes 1^^st^^ stock beta, 1^^st^^ weight and 2^^nd^^ stock beta are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when 1^^st^^ stock beta, 1^^st^^ weight and 2^^nd^^ stock beta is what you already know and Print1 and Print2 is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/billable-hours">Billable hours Calculator</a>, <a href="/finance/bitcoin-etf">Bitcoin ETF Calculator</a> and <a href="/finance/biweekly-mortgage">Biweekly mortgage</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Portfolio beta calculator work out?', 'a' => 'Print1 and Print2.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            1^^st^^ stock beta, 1^^st^^ weight (percent), 2^^nd^^ stock beta, 2^^nd^^ weight (percent), 3^^rd^^ stock beta. With 1^^st^^ stock beta, 1^^st^^ weight and 2^^nd^^ stock beta in place, Print1 can stay blank and the page will work it out.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Intro = 1, W more 1 = 3, W is = 2, Beta is = 4, Portfolio is = 5, More vol = 6, Less vol = 7, Corr perfect = 8, Corr zero = 10, Indep = 11, Up up = 9, Opposite = 12, Bull out = 14, Bull under = 15, More data = 17 and Enter 2 = 16. That comes from the page's own defaults, entered in 1^^st^^ stock beta; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Print1 is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The page needs every box filled: Print1 is fixed as the value it works out, so there is nothing to solve for when an input is missing.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Print1 keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/billable-hours', 'name' => 'Billable hours Calculator'],
            ['path' => '/finance/bitcoin-etf', 'name' => 'Bitcoin ETF Calculator'],
            ['path' => '/finance/biweekly-mortgage', 'name' => 'Biweekly mortgage'],
        ],
        'authors' => [],
    ],
];
