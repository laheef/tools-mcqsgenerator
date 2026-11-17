<?php

/**
 * Fibonacci retracement
 * /finance/fibonacci-retracement
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Fibonacci retracement',
    'meta' => ['title' => 'Fibonacci retracement: Formula, Steps & Results', 'description' => 'Fibonacci retracement turns trend direction and Type of Fibonacci levels into price difference and 0%. The formula is printed in the form\'s own words.', 'h1' => 'Fibonacci retracement Calculator', 'updated' => '2026-09-17'],
    'sections' => [
        [
            'title' => 'Trend and prices',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'trend',
                            'label' => 'Trend direction',
                            'type' => 'select',
                            'options' => ['Uptrend' => '0', 'Downtrend' => '1'],
                            'dataset' => 'trend',
                            'default' => 'Uptrend',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'retEx',
                            'label' => 'Type of Fibonacci levels',
                            'type' => 'select',
                            'options' => ['Retracement levels' => '0', 'Extension levels' => '1'],
                            'dataset' => 'retrecement or extension',
                            'default' => 'Retracement levels',
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'low',
                            'label' => 'Low price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'high',
                            'label' => 'High price',
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
                            'name' => 'rise_fall',
                            'label' => 'Price difference',
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
            'title' => 'Retracement levels',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ur_0',
                            'label' => '0%',
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
                            'name' => 'ur_1',
                            'label' => '23.6%',
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
                            'name' => 'ur_2',
                            'label' => '38.2%',
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
                            'name' => 'ur_3',
                            'label' => '50%',
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
                            'name' => 'ur_4',
                            'label' => '61.8%',
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
                            'name' => 'ur_5',
                            'label' => '76.4%',
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
                            'name' => 'ur_6',
                            'label' => '100%',
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
                            'name' => 'ur_7',
                            'label' => '138.2%',
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
                            'name' => 'dr_1',
                            'label' => '138.2%',
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
                            'name' => 'dr_2',
                            'label' => '100%',
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
                            'name' => 'dr_3',
                            'label' => '76.4%',
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
                            'name' => 'dr_4',
                            'label' => '61.8%',
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
                            'name' => 'dr_5',
                            'label' => '50%',
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
                            'name' => 'dr_6',
                            'label' => '38.2%',
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
                            'name' => 'dr_7',
                            'label' => '23.6%',
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
                            'name' => 'dr_0',
                            'label' => '0%',
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
            'title' => 'Extension levels',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ue_1',
                            'label' => '261.8%',
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
                            'name' => 'ue_2',
                            'label' => '200%',
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
                            'name' => 'ue_3',
                            'label' => '161.8%',
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
                            'name' => 'ue_4',
                            'label' => '138.2%',
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
                            'name' => 'ue_5',
                            'label' => '100%',
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
                            'name' => 'ue_6',
                            'label' => '61.8%',
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
                            'name' => 'de_1',
                            'label' => '61.8%',
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
                            'name' => 'de_2',
                            'label' => '100%',
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
                            'name' => 'de_3',
                            'label' => '138.2%',
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
                            'name' => 'de_4',
                            'label' => '161.8%',
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
                            'name' => 'de_5',
                            'label' => '200%',
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
                            'name' => 'de_6',
                            'label' => '261.8%',
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
            'title' => 'rise_fall = high - low',
            'results' => ['high' => 'low + rise_fall', 'rise_fall' => 'high - low', 'low' => 'high - rise_fall'],
        ],
        [
            'title' => 'ur_0 = high',
            'results' => ['ur_0' => 'high', 'high' => 'ur_0'],
        ],
        [
            'title' => 'ur_1 = high - rise_fall * 0.236',
            'results' => ['ur_1' => 'high - 59/250*rise_fall', 'high' => '(59/250)*rise_fall + ur_1', 'rise_fall' => '(250/59)*high - 250/59*ur_1'],
        ],
        [
            'title' => 'ur_2 = high - rise_fall * 0.382',
            'results' => ['high' => '(191/500)*rise_fall + ur_2', 'ur_2' => 'high - 191/500*rise_fall', 'rise_fall' => '(500/191)*high - 500/191*ur_2'],
        ],
        [
            'title' => 'ur_3 = high - rise_fall * 0.5',
            'results' => ['ur_3' => 'high - 1/2*rise_fall', 'high' => '(1/2)*rise_fall + ur_3', 'rise_fall' => '2*high - 2*ur_3'],
        ],
        [
            'title' => 'ur_4 = high - rise_fall * 0.618',
            'results' => ['rise_fall' => '(500/309)*high - 500/309*ur_4', 'high' => '(309/500)*rise_fall + ur_4', 'ur_4' => 'high - 309/500*rise_fall'],
        ],
        [
            'title' => 'ur_5 = high - rise_fall * 0.764',
            'results' => ['ur_5' => 'high - 191/250*rise_fall', 'high' => '(191/250)*rise_fall + ur_5', 'rise_fall' => '(250/191)*high - 250/191*ur_5'],
        ],
        [
            'title' => 'ur_6 = high - rise_fall',
            'results' => ['ur_6' => 'high - rise_fall', 'high' => 'rise_fall + ur_6', 'rise_fall' => 'high - ur_6'],
        ],
        [
            'title' => 'ur_7 = high - rise_fall * 1.382',
            'results' => ['ur_7' => 'high - 691/500*rise_fall', 'high' => '(691/500)*rise_fall + ur_7', 'rise_fall' => '(500/691)*high - 500/691*ur_7'],
        ],
        [
            'title' => 'ue_1 = high +  rise_fall * 2.618',
            'results' => ['ue_1' => 'high + (1309/500)*rise_fall', 'high' => '-1309/500*rise_fall + ue_1', 'rise_fall' => '-500/1309*high + (500/1309)*ue_1'],
        ],
        [
            'title' => 'ue_2 = high +  rise_fall * 2',
            'results' => ['high' => '-2*rise_fall + ue_2', 'rise_fall' => '-1/2*high + (1/2)*ue_2', 'ue_2' => 'high + 2*rise_fall'],
        ],
        [
            'title' => 'ue_3 = high +  rise_fall * 1.618',
            'results' => ['high' => '-809/500*rise_fall + ue_3', 'rise_fall' => '-500/809*high + (500/809)*ue_3', 'ue_3' => 'high + (809/500)*rise_fall'],
        ],
        [
            'title' => 'ue_4 = high +  rise_fall * 1.382',
            'results' => ['ue_4' => 'high + (691/500)*rise_fall', 'high' => '-691/500*rise_fall + ue_4', 'rise_fall' => '-500/691*high + (500/691)*ue_4'],
        ],
        [
            'title' => 'ue_5 = high +  rise_fall',
            'results' => ['ue_5' => 'high + rise_fall', 'high' => '-rise_fall + ue_5', 'rise_fall' => '-high + ue_5'],
        ],
        [
            'title' => 'ue_6 = high +  rise_fall * 0.618',
            'results' => ['high' => '-309/500*rise_fall + ue_6', 'rise_fall' => '-500/309*high + (500/309)*ue_6', 'ue_6' => 'high + (309/500)*rise_fall'],
        ],
        [
            'title' => 'dr_1 = low +  rise_fall * 1.382',
            'results' => ['dr_1' => 'low + (691/500)*rise_fall', 'rise_fall' => '(500/691)*dr_1 - 500/691*low', 'low' => 'dr_1 - 691/500*rise_fall'],
        ],
        [
            'title' => 'dr_2 = low +  rise_fall',
            'results' => ['dr_2' => 'low + rise_fall', 'rise_fall' => 'dr_2 - low', 'low' => 'dr_2 - rise_fall'],
        ],
        [
            'title' => 'dr_3 = low +  rise_fall * 0.764',
            'results' => ['rise_fall' => '(250/191)*dr_3 - 250/191*low', 'low' => 'dr_3 - 191/250*rise_fall', 'dr_3' => 'low + (191/250)*rise_fall'],
        ],
        [
            'title' => 'dr_4 = low +  rise_fall * 0.618',
            'results' => ['rise_fall' => '(500/309)*dr_4 - 500/309*low', 'low' => 'dr_4 - 309/500*rise_fall', 'dr_4' => 'low + (309/500)*rise_fall'],
        ],
        [
            'title' => 'dr_5 = low +  rise_fall * 0.5',
            'results' => ['dr_5' => 'low + (1/2)*rise_fall', 'rise_fall' => '2*dr_5 - 2*low', 'low' => 'dr_5 - 1/2*rise_fall'],
        ],
        [
            'title' => 'dr_6 = low +  rise_fall * 0.382',
            'results' => ['dr_6' => 'low + (191/500)*rise_fall', 'rise_fall' => '(500/191)*dr_6 - 500/191*low', 'low' => 'dr_6 - 191/500*rise_fall'],
        ],
        [
            'title' => 'dr_7 = low +  rise_fall * 0.236',
            'results' => ['dr_7' => 'low + (59/250)*rise_fall', 'rise_fall' => '(250/59)*dr_7 - 250/59*low', 'low' => 'dr_7 - 59/250*rise_fall'],
        ],
        [
            'title' => 'dr_0 = low',
            'results' => ['dr_0' => 'low', 'low' => 'dr_0'],
        ],
        [
            'title' => 'de_1 = low -  rise_fall * 0.618',
            'results' => ['de_1' => 'low - 309/500*rise_fall', 'rise_fall' => '-500/309*de_1 + (500/309)*low', 'low' => 'de_1 + (309/500)*rise_fall'],
        ],
        [
            'title' => 'de_2 = low - rise_fall',
            'results' => ['de_2' => 'low - rise_fall', 'rise_fall' => '-de_2 + low', 'low' => 'de_2 + rise_fall'],
        ],
        [
            'title' => 'de_3 = low -  rise_fall * 1.382',
            'results' => ['de_3' => 'low - 691/500*rise_fall', 'rise_fall' => '-500/691*de_3 + (500/691)*low', 'low' => 'de_3 + (691/500)*rise_fall'],
        ],
        [
            'title' => 'de_4 = low -  rise_fall * 1.618',
            'results' => ['de_4' => 'low - 809/500*rise_fall', 'rise_fall' => '-500/809*de_4 + (500/809)*low', 'low' => 'de_4 + (809/500)*rise_fall'],
        ],
        [
            'title' => 'de_5 = low -  rise_fall * 2',
            'results' => ['rise_fall' => '-1/2*de_5 + (1/2)*low', 'de_5' => 'low - 2*rise_fall', 'low' => 'de_5 + 2*rise_fall'],
        ],
        [
            'title' => 'de_6 = low -  rise_fall * 2.618',
            'results' => ['de_6' => 'low - 1309/500*rise_fall', 'rise_fall' => '-500/1309*de_6 + (500/1309)*low', 'low' => 'de_6 + (1309/500)*rise_fall'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Fibonacci retracement takes Low price and High price and returns Price difference and 0%. It is a single relationship that reads price difference out of low price, not a table of canned results keyed by them. Units for Price difference default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Fibonacci retracement calculator works', 'html' => <<<'TXT'
            <p>Fibonacci retracement answers one question from 2 numbers, and the answer is Price difference, 0% and 23.6%.</p><p>Written with the labels from the form, Price difference = High price − Low price.</p><p>What comes back is Price difference, 0%, 23.6% and 38.2% — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Low price</strong> — in USD</li><li><strong>High price</strong> — in USD</li></ul><p>The answers come back as Price difference in USD, 0% in USD, 23.6% in USD, 38.2% in USD, 50% in USD, 61.8% in USD, 76.4% in USD, 100% in USD, 138.2% in USD, 138.2% in USD, 100% in USD, 76.4% in USD, 61.8% in USD, 50% in USD, 38.2% in USD, 23.6% in USD, 0% in USD, 261.8% in USD, 200% in USD, 161.8% in USD, 138.2% in USD, 100% in USD, 61.8% in USD, 61.8% in USD, 100% in USD, 138.2% in USD, 161.8% in USD, 200% in USD, 261.8% in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: Price difference takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Price difference</strong> = <code>High price − Low price</code></li><li><strong>High price</strong> = <code>Low price + Price difference</code></li><li><strong>Low price</strong> = <code>High price − Price difference</code></li><li><strong>0%</strong> = <code>High price</code></li><li><strong>23.6%</strong> = <code>High price − 59 ÷ 250 × Price difference</code></li><li><strong>38.2%</strong> = <code>High price − 191 ÷ 500 × Price difference</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Price difference</strong> = <code>High price − Low price</code> — the form to use when High price and Low price are the values you have.</li><li><strong>High price</strong> = <code>Low price + Price difference</code> — the form to use when Low price and Price difference are the values you have.</li><li><strong>Low price</strong> = <code>High price − Price difference</code> — the form to use when High price and Price difference are the values you have.</li><li><strong>0%</strong> = <code>High price</code> — the form to use when High price are the values you have.</li><li><strong>High price</strong> = <code>0%</code> — the form to use when 0% are the values you have.</li><li><strong>23.6%</strong> = <code>High price − 59 ÷ 250 × Price difference</code> — the form to use when High price and Price difference are the values you have.</li><li><strong>High price</strong> = <code>(59 ÷ 250) × Price difference + 23.6%</code> — the form to use when Price difference and 23.6% are the values you have.</li><li><strong>Price difference</strong> = <code>(250 ÷ 59) × High price − 250 ÷ 59 × 23.6%</code> — the form to use when High price and 23.6% are the values you have.</li></ul><p>Any one of Price difference, High price and Low price can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Price difference, 0% and 23.6% are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Low price left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Low price is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>High price left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If High price is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Low price to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Fibonacci retracement form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Low price</strong> takes a plain number with no unit attached. The page reads it when it works out High price, Price difference and 138.2%. Fill it from a measurement rather than a memory — Low price is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>High price</strong> takes a plain number with no unit attached. The page reads it when it works out Price difference, Low price and 0%. Fill it from a measurement rather than a memory — High price is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Low price and High price ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Low price — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Price difference in USD against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Price difference follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Low price and High price are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Low price and High price and the number you are missing is Price difference and 0%.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/debt-avalanche">Debt avalanche Calculator</a>, <a href="/finance/debt">Debt Calculator</a> and <a href="/finance/debt-consolidation">Debt consolidation</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Fibonacci retracement is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
            ['title' => 'Where this fits among the other calculators', 'html' => <<<'TXT'
            <p>A criterion for choosing between these pages: Fibonacci retracement answers a different question from the one above, even where the two share a sentence of explanation.</p><p>The nearest are <a href="/finance/debt-avalanche">Debt avalanche Calculator</a>, <a href="/finance/debt">Debt Calculator</a> and <a href="/finance/debt-consolidation">Debt consolidation</a>. Each takes its own inputs and reports its own answer, and none of them shares a stored value with this page — open two in separate tabs and they will not interfere.</p><p>If the value you need is not the one reported here but a step before or after it, one of those pages probably reports it directly rather than making you convert by hand.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Fibonacci retracement is a number to act on, so the useful question is what to do with Price difference (USD), 0% (USD) and 23.6% (USD) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Low price and High price alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Fibonacci retracement calculator work out?', 'a' => 'Price difference, 0%, 23.6% and 38.2%, from High price and Low price. The relationship is Price difference = High price − Low price.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Low price (USD), High price (USD). With low price and high price in place, Price difference can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Price difference, High price, Low price and 0% blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Price difference is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Low price blank and the page solves for it, reporting Price difference instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Price difference keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/debt-avalanche', 'name' => 'Debt avalanche Calculator'],
            ['path' => '/finance/debt', 'name' => 'Debt Calculator'],
            ['path' => '/finance/debt-consolidation', 'name' => 'Debt consolidation'],
        ],
        'authors' => [],
    ],
];
