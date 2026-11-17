<?php

/**
 * ROI
 * /finance/roi
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'ROI',
    'meta' => ['title' => 'ROI Calculator — Free, With Worked Examples', 'description' => 'ROI turns investment period and initial invested amount into returned amount. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'ROI Calculator', 'updated' => '2026-09-27'],
    'sections' => [
        [
            'title' => 'Basic ROI',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'time_diff',
                            'label' => 'Investment period',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.001'],
                            'default' => '5',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'invested_amount',
                            'label' => 'Initial invested amount',
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
                            'name' => 'periodic_contribution_VS',
                            'label' => 'Periodic contribution',
                            'type' => 'select',
                            'options' => [
                                'None' => '-1',
                                'Weekly' => '52',
                                'Bi-weekly' => '26',
                                'Monthly' => '12',
                                'Semi-annually' => '2',
                                'Annually' => '1',
                            ],
                            'dataset' => 'periodic contribution',
                            'control' => 'DROPDOWN',
                            'default' => 'None',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'periodic_contribution',
                            'label' => 'Periodic contribution amount',
                            'type' => 'result',
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
                            'name' => 'rate_of_return',
                            'label' => 'Rate of return',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'returned_amount',
                            'label' => 'Returned amount',
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
                            'name' => 'ROI',
                            'label' => 'ROI',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'show_gain_CB',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Show total gain or loss' => '1', '' => '0'],
                            'dataset' => 'show gain',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gain',
                            'label' => 'Gain or loss',
                            'type' => 'number',
                            'help' => 'Gain if positive, loss if negative.',
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
                        ['type' => 'note', 'text' => 'Prompt your custom ROI calculator  for your site, blog, or portal.&nbsp;'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Annualized ROI',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mode_select',
                            'label' => 'I want to find...',
                            'type' => 'select',
                            'options' => ['Annualized ROI' => '0', 'Time needed' => '1'],
                            'dataset' => 'mode',
                            'default' => 'Annualized ROI',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'start_date', 'label' => 'Start date', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'end_date', 'label' => 'End date', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ROI_ann',
                            'label' => 'Annualized ROI',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ROI_ann2',
                            'label' => 'Annualized ROI',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'time_diff_result',
                            'label' => 'Time difference',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'second_investment',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Compare with another investment' => '1', '' => '0'],
                            'dataset' => 'second_investment',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Target annualized ROI must be in the same direction (gain or loss) as the ROI.'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Second investment',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'time_diff_NEW',
                            'label' => 'Time difference',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.001'],
                            'default' => '5',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'invested_amount_NEW',
                            'label' => 'Initial invested amount',
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
                            'name' => 'periodic_contribution_VS_NEW',
                            'label' => 'Periodic contribution',
                            'type' => 'select',
                            'options' => [
                                'None' => '-1',
                                'Weekly' => '52',
                                'Bi-weekly' => '26',
                                'Monthly' => '12',
                                'Semi-annually' => '2',
                                'Annually' => '1',
                            ],
                            'dataset' => 'periodic contribution',
                            'control' => 'DROPDOWN',
                            'default' => 'None',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'periodic_contribution_NEW',
                            'label' => 'Periodic contribution amount',
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
                            'name' => 'rate_of_return_NEW',
                            'label' => 'Rate of return',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'returned_amount_NEW',
                            'label' => 'Returned amount',
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
                            'name' => 'ROI_NEW',
                            'label' => 'ROI',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gain_NEW',
                            'label' => 'Gain or loss',
                            'type' => 'number',
                            'help' => 'Gain if positive, loss if negative.',
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
            'title' => 'Annualized ROI of 2nd investment',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mode2',
                            'label' => 'I want to find...',
                            'type' => 'select',
                            'options' => ['Annualized ROI' => '0', 'Time needed' => '1'],
                            'dataset' => 'mode',
                            'default' => 'Annualized ROI',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'start_date_NEW', 'label' => 'Start date', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'end_date_NEW', 'label' => 'End date', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ROI_ann_NEW',
                            'label' => 'Annualized ROI',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ROI_ann2_NEW',
                            'label' => 'Annualized ROI',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'time_diff_result_NEW',
                            'label' => 'Time difference',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Target annualized ROI must be in the same direction (gain or loss) as the ROI.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'mode_select == 0 and mode2 == 0 and ROI_ann > ROI_ann_NEW', 'text' => <<<'TXT'
                                The first investment looks better! Its annualized ROI is equal to {{ROI_ann_rounded.value}}% as compared to {{ROI_annNEW_rounded.value}}% of the second investment.
                                TXT],
                                ['when' => 'mode_select == 0 and mode2 == 0 and ROI_ann < ROI_ann_NEW', 'text' => <<<'TXT'
                                The second investment looks better! Its annualized ROI is equal to {{ROI_annNEW_rounded.value}}% as compared to {{ROI_ann_rounded.value}}% of the first investment.
                                TXT],
                                ['when' => 'mode_select == 1 and mode2 == 0 and ROI_ann2 > ROI_ann_NEW', 'text' => <<<'TXT'
                                The first investment looks better! Its annualized ROI is equal to {{ROI_ann2_rounded.value}}% as compared to {{ROI_annNEW_rounded.value}}% of the second investment.
                                TXT],
                                ['when' => 'mode_select == 1 and mode2 == 0 and ROI_ann2 < ROI_ann_NEW', 'text' => <<<'TXT'
                                The second investment looks better! Its annualized ROI is equal to {{ROI_annNEW_rounded.value}}% as compared to {{ROI_ann2_rounded.value}}% of the first investment.
                                TXT],
                                ['when' => 'mode_select == 0 and mode2 == 1 and ROI_ann > ROI_ann2_NEW', 'text' => <<<'TXT'
                                The first investment looks better! Its annualized ROI is equal to {{ROI_ann_rounded.value}}% as compared to {{ROI_ann2NEW_rounded.value}}% of the second investment.
                                TXT],
                                ['when' => 'mode_select == 0 and mode2 == 1 and ROI_ann < ROI_ann2_NEW', 'text' => <<<'TXT'
                                The second investment looks better! Its annualized ROI is equal to {{ROI_ann2NEW_rounded.value}}% as compared to {{ROI_ann_rounded.value}}% of the first investment.
                                TXT],
                                ['when' => 'mode_select == 1 and mode2 == 1 and ROI_ann2 > ROI_ann2_NEW', 'text' => <<<'TXT'
                                The first investment looks better! Its annualized ROI is equal to {{ROI_ann2_rounded.value}}% as compared to {{ROI_ann2NEW_rounded.value}}% of the second investment.
                                TXT],
                                ['when' => 'mode_select == 1 and mode2 == 1 and ROI_ann2 < ROI_ann2_NEW', 'text' => <<<'TXT'
                                The second investment looks better! Its annualized ROI is equal to {{ROI_ann2NEW_rounded.value}}% as compared to {{ROI_ann2_rounded.value}}% of the first investment.
                                TXT],
                                ['when' => '(ROI_ann == ROI_ann_NEW) or (ROI_ann == ROI_ann2_NEW) or (ROI_ann2 == ROI_ann_NEW) or (ROI_ann2 == ROI_ann2_NEW)', 'text' => 'The annualized ROI of both investments is exactly the same!'],
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
                            'name' => 'ROI_ann_rounded',
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
                            'name' => 'ROI_ann2_rounded',
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
                            'name' => 'ROI_annNEW_rounded',
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
                            'name' => 'ROI_ann2NEW_rounded',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => <<<'TXT'
            ROI = (returned_amount - invested_amount - periodic_contribution * periodic_contribution_VS * time_diff / 365.25) / (invested_amount + periodic_contribution * periodic_contribution_VS * time_diff / 365.25)
            TXT,
            'results' => [
                'ROI' => <<<'TXT'
                (-1461*invested_amount - 4*periodic_contribution*periodic_contribution_VS*time_diff + 1461*returned_amount)/(1461*invested_amount + 4*periodic_contribution*periodic_contribution_VS*time_diff)
                TXT,
                'invested_amount' => <<<'TXT'
                (1/1461)*(-4*ROI*periodic_contribution*periodic_contribution_VS*time_diff - 4*periodic_contribution*periodic_contribution_VS*time_diff + 1461*returned_amount)/(ROI + 1)
                TXT,
                'time_diff' => '(1461/4)*(-ROI*invested_amount - invested_amount + returned_amount)/(periodic_contribution*periodic_contribution_VS*(ROI + 1))',
                'periodic_contribution' => '(1461/4)*(-ROI*invested_amount - invested_amount + returned_amount)/(periodic_contribution_VS*time_diff*(ROI + 1))',
                'returned_amount' => <<<'TXT'
                ROI*invested_amount + (4/1461)*ROI*periodic_contribution*periodic_contribution_VS*time_diff + invested_amount + (4/1461)*periodic_contribution*periodic_contribution_VS*time_diff
                TXT,
                'periodic_contribution_VS' => '(1461/4)*(-ROI*invested_amount - invested_amount + returned_amount)/(periodic_contribution*time_diff*(ROI + 1))',
            ],
        ],
        [
            'title' => <<<'TXT'
            returned_amount = (1 + rate_of_return)^(time_diff / 365.25) * invested_amount + periodic_contribution * (((1 + rate_of_return / periodic_contribution_VS)^(time_diff / 365.25 * periodic_contribution_VS) - 1)/rate_of_return*periodic_contribution_VS)
            TXT,
            'results' => ['invested_amount' => <<<'TXT'
            pow(rate_of_return + 1, -4/1461*time_diff)*(periodic_contribution*periodic_contribution_VS*(1 - pow((periodic_contribution_VS + rate_of_return)/periodic_contribution_VS, (4/1461)*periodic_contribution_VS*time_diff)) + rate_of_return*returned_amount)/rate_of_return
            TXT, 'periodic_contribution' => <<<'TXT'
            rate_of_return*(-invested_amount*pow(rate_of_return + 1, (4/1461)*time_diff) + returned_amount)/(periodic_contribution_VS*(pow((periodic_contribution_VS + rate_of_return)/periodic_contribution_VS, (4/1461)*periodic_contribution_VS*time_diff) - 1))
            TXT, 'returned_amount' => <<<'TXT'
            (invested_amount*rate_of_return*pow(rate_of_return + 1, (4/1461)*time_diff) + periodic_contribution*periodic_contribution_VS*pow((periodic_contribution_VS + rate_of_return)/periodic_contribution_VS, (4/1461)*periodic_contribution_VS*time_diff) - periodic_contribution*periodic_contribution_VS)/rate_of_return
            TXT],
        ],
        [
            'title' => 'gain = returned_amount - invested_amount - periodic_contribution * periodic_contribution_VS * time_diff / 365.25',
            'results' => [
                'invested_amount' => '-gain - 4/1461*periodic_contribution*periodic_contribution_VS*time_diff + returned_amount',
                'gain' => '-invested_amount - 4/1461*periodic_contribution*periodic_contribution_VS*time_diff + returned_amount',
                'time_diff' => '(1461/4)*(-gain - invested_amount + returned_amount)/(periodic_contribution*periodic_contribution_VS)',
                'periodic_contribution' => '(1461/4)*(-gain - invested_amount + returned_amount)/(periodic_contribution_VS*time_diff)',
                'returned_amount' => 'gain + invested_amount + (4/1461)*periodic_contribution*periodic_contribution_VS*time_diff',
                'periodic_contribution_VS' => '(1461/4)*(-gain - invested_amount + returned_amount)/(periodic_contribution*time_diff)',
            ],
        ],
        [
            'title' => 'start_date + time_diff = end_date',
            'results' => ['end_date' => 'start_date + time_diff', 'time_diff' => 'end_date - start_date', 'start_date' => 'end_date - time_diff'],
        ],
        [
            'title' => 'ROI_ann = annualized (ROI, time_diff)',
            'results' => ['ROI_ann' => 'annualized(ROI, time_diff)'],
        ],
        [
            'title' => 'time_diff_result = timesearch (ROI, ROI_ann2)',
            'results' => ['time_diff_result' => 'timesearch(ROI, ROI_ann2)'],
        ],
        [
            'title' => <<<'TXT'
            ROI_NEW = (returned_amount_NEW - invested_amount_NEW - periodic_contribution_NEW * periodic_contribution_VS_NEW * time_diff_NEW / 365.25) / (invested_amount_NEW + periodic_contribution_NEW * periodic_contribution_VS_NEW * time_diff_NEW / 365.25)
            TXT,
            'results' => [
                'ROI_NEW' => <<<'TXT'
                (-1461*invested_amount_NEW - 4*periodic_contribution_NEW*periodic_contribution_VS_NEW*time_diff_NEW + 1461*returned_amount_NEW)/(1461*invested_amount_NEW + 4*periodic_contribution_NEW*periodic_contribution_VS_NEW*time_diff_NEW)
                TXT,
                'invested_amount_NEW' => <<<'TXT'
                (1/1461)*(-4*ROI_NEW*periodic_contribution_NEW*periodic_contribution_VS_NEW*time_diff_NEW - 4*periodic_contribution_NEW*periodic_contribution_VS_NEW*time_diff_NEW + 1461*returned_amount_NEW)/(ROI_NEW + 1)
                TXT,
                'periodic_contribution_NEW' => '(1461/4)*(-ROI_NEW*invested_amount_NEW - invested_amount_NEW + returned_amount_NEW)/(periodic_contribution_VS_NEW*time_diff_NEW*(ROI_NEW + 1))',
                'periodic_contribution_VS_NEW' => '(1461/4)*(-ROI_NEW*invested_amount_NEW - invested_amount_NEW + returned_amount_NEW)/(periodic_contribution_NEW*time_diff_NEW*(ROI_NEW + 1))',
                'time_diff_NEW' => '(1461/4)*(-ROI_NEW*invested_amount_NEW - invested_amount_NEW + returned_amount_NEW)/(periodic_contribution_NEW*periodic_contribution_VS_NEW*(ROI_NEW + 1))',
                'returned_amount_NEW' => <<<'TXT'
                ROI_NEW*invested_amount_NEW + (4/1461)*ROI_NEW*periodic_contribution_NEW*periodic_contribution_VS_NEW*time_diff_NEW + invested_amount_NEW + (4/1461)*periodic_contribution_NEW*periodic_contribution_VS_NEW*time_diff_NEW
                TXT,
            ],
        ],
        [
            'title' => 'gain_NEW = returned_amount_NEW - invested_amount_NEW - periodic_contribution_NEW * periodic_contribution_VS_NEW * time_diff_NEW / 365.25',
            'results' => [
                'gain_NEW' => '-invested_amount_NEW - 4/1461*periodic_contribution_NEW*periodic_contribution_VS_NEW*time_diff_NEW + returned_amount_NEW',
                'invested_amount_NEW' => '-gain_NEW - 4/1461*periodic_contribution_NEW*periodic_contribution_VS_NEW*time_diff_NEW + returned_amount_NEW',
                'periodic_contribution_NEW' => '(1461/4)*(-gain_NEW - invested_amount_NEW + returned_amount_NEW)/(periodic_contribution_VS_NEW*time_diff_NEW)',
                'periodic_contribution_VS_NEW' => '(1461/4)*(-gain_NEW - invested_amount_NEW + returned_amount_NEW)/(periodic_contribution_NEW*time_diff_NEW)',
                'time_diff_NEW' => '(1461/4)*(-gain_NEW - invested_amount_NEW + returned_amount_NEW)/(periodic_contribution_NEW*periodic_contribution_VS_NEW)',
                'returned_amount_NEW' => 'gain_NEW + invested_amount_NEW + (4/1461)*periodic_contribution_NEW*periodic_contribution_VS_NEW*time_diff_NEW',
            ],
        ],
        [
            'title' => <<<'TXT'
            returned_amount_NEW = (1 + rate_of_return_NEW)^(time_diff_NEW / 365.25) * invested_amount_NEW + periodic_contribution_NEW * (((1 + rate_of_return_NEW / periodic_contribution_VS_NEW)^(time_diff_NEW / 365.25 * periodic_contribution_VS_NEW) - 1)/rate_of_return_NEW*periodic_contribution_VS_NEW)
            TXT,
            'results' => ['invested_amount_NEW' => <<<'TXT'
            pow(rate_of_return_NEW + 1, -4/1461*time_diff_NEW)*(periodic_contribution_NEW*periodic_contribution_VS_NEW*(1 - pow((periodic_contribution_VS_NEW + rate_of_return_NEW)/periodic_contribution_VS_NEW, (4/1461)*periodic_contribution_VS_NEW*time_diff_NEW)) + rate_of_return_NEW*returned_amount_NEW)/rate_of_return_NEW
            TXT, 'periodic_contribution_NEW' => <<<'TXT'
            rate_of_return_NEW*(-invested_amount_NEW*pow(rate_of_return_NEW + 1, (4/1461)*time_diff_NEW) + returned_amount_NEW)/(periodic_contribution_VS_NEW*(pow((periodic_contribution_VS_NEW + rate_of_return_NEW)/periodic_contribution_VS_NEW, (4/1461)*periodic_contribution_VS_NEW*time_diff_NEW) - 1))
            TXT, 'returned_amount_NEW' => <<<'TXT'
            (invested_amount_NEW*rate_of_return_NEW*pow(rate_of_return_NEW + 1, (4/1461)*time_diff_NEW) + periodic_contribution_NEW*periodic_contribution_VS_NEW*pow((periodic_contribution_VS_NEW + rate_of_return_NEW)/periodic_contribution_VS_NEW, (4/1461)*periodic_contribution_VS_NEW*time_diff_NEW) - periodic_contribution_NEW*periodic_contribution_VS_NEW)/rate_of_return_NEW
            TXT],
        ],
        [
            'title' => 'start_date_NEW + time_diff_NEW = end_date_NEW',
            'results' => ['start_date_NEW' => 'end_date_NEW - time_diff_NEW', 'end_date_NEW' => 'start_date_NEW + time_diff_NEW', 'time_diff_NEW' => 'end_date_NEW - start_date_NEW'],
        ],
        [
            'title' => 'ROI_ann_NEW = annualized (ROI_NEW, time_diff_NEW)',
            'results' => ['ROI_ann_NEW' => 'annualized(ROI_NEW, time_diff_NEW)'],
        ],
        [
            'title' => 'time_diff_result_NEW = timesearch (ROI_NEW, ROI_ann2_NEW)',
            'results' => ['time_diff_result_NEW' => 'timesearch(ROI_NEW, ROI_ann2_NEW)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("annualized",function(ROI,time_diff){var c=Math.pow(1+ROI,1/(time_diff/365.25));return c-1});omni.define("timesearch",function(ROI,ROI_ann2){return Math.log(1+ROI)/Math.log(1+ROI_ann2)*365});omni.define("date_timesearch",function(time_diff_result,start_date){return start_date+time_diff_result});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        ROI turns Investment period, Initial invested amount and Periodic contribution into Periodic contribution amount. Nothing is looked up on this page: periodic contribution amount is computed from investment period and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Periodic contribution amount is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the ROI calculator works', 'html' => <<<'TXT'
            <p>ROI answers one question from 27 numbers, and the answer is Periodic contribution amount.</p><p>The answers are Periodic contribution amount; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 27 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Investment period</strong> — in years</li><li><strong>Initial invested amount</strong> — in USD</li><li><strong>Periodic contribution</strong> — a plain number, no unit</li><li><strong>Rate of return</strong> — in percent</li><li><strong>Returned amount</strong> — in USD</li><li><strong>ROI</strong> — in percent</li><li><strong>Gain or loss</strong> — in USD. Gain if positive, loss if negative.</li><li><strong>I want to find…</strong> — a plain number, no unit</li><li><strong>Start date</strong> — a plain number, no unit, entered as a date</li><li><strong>End date</strong> — a plain number, no unit, entered as a date</li><li><strong>Annualized ROI</strong> — in percent</li><li><strong>Annualized ROI</strong> — in percent</li><li><strong>Time difference</strong> — in years</li><li><strong>Time difference</strong> — in years</li><li><strong>Initial invested amount</strong> — in USD</li><li><strong>Periodic contribution</strong> — a plain number, no unit</li><li><strong>Periodic contribution amount</strong> — in USD</li><li><strong>Rate of return</strong> — in percent</li><li><strong>Returned amount</strong> — in USD</li><li><strong>ROI</strong> — in percent</li><li><strong>Gain or loss</strong> — in USD. Gain if positive, loss if negative.</li><li><strong>I want to find…</strong> — a plain number, no unit</li><li><strong>Start date</strong> — a plain number, no unit, entered as a date</li><li><strong>End date</strong> — a plain number, no unit, entered as a date</li><li><strong>Annualized ROI</strong> — in percent</li><li><strong>Annualized ROI</strong> — in percent</li><li><strong>Time difference</strong> — in years</li></ul><p>What you get back is Periodic contribution amount in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Rate of return = 3 perc, Show gain CB = 0, I want to find… = 0, Annualized ROI = 4 perc, Second investment = 0, Rate of return = 5 perc, I want to find… = 0, Annualized ROI = 6 perc, Start date = Sun 1 March 2026, End date = Sun 1 March 2026, Start date = Sun 1 March 2026 and End date = Sun 1 March 2026 gives <strong>Periodic contribution</strong> = -1, <strong>Periodic contribution</strong> = -1, <strong>Investment period</strong> = 0 yrs and <strong>Time difference</strong> = 0 yrs.</p><ul><li><strong>Periodic contribution</strong> = -1</li><li><strong>Periodic contribution</strong> = -1</li><li><strong>Investment period</strong> = 0 yrs</li><li><strong>Time difference</strong> = 0 yrs</li></ul>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Periodic contribution</strong> = -1, <strong>Periodic contribution</strong> = -1, <strong>Investment period</strong> = 0 and <strong>Time difference</strong> = 0 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Investment period offers 5 units and opens on years, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Initial invested amount</strong> = <code>(1 ÷ 1461) × ( − 4 × ROI × Periodic contribution amount × Periodic contribution × Investment period − 4 × Periodic contribution amount × Periodic contribution × Investment period + 1461 × Returned amount) ÷ (ROI + 1)</code></li><li><strong>Investment period</strong> = <code>(1461 ÷ 4) × ( − ROI × Initial invested amount − Initial invested amount + Returned amount) ÷ (Periodic contribution amount × Periodic contribution × (ROI + 1))</code></li><li><strong>Periodic contribution amount</strong> = <code>(1461 ÷ 4) × ( − ROI × Initial invested amount − Initial invested amount + Returned amount) ÷ (Periodic contribution × Investment period × (ROI + 1))</code></li><li><strong>Periodic contribution</strong> = <code>(1461 ÷ 4) × ( − ROI × Initial invested amount − Initial invested amount + Returned amount) ÷ (Periodic contribution amount × Investment period × (ROI + 1))</code></li><li><strong>Gain or loss</strong> = <code>− Initial invested amount − 4 ÷ 1461 × Periodic contribution amount × Periodic contribution × Investment period + Returned amount</code></li><li><strong>Returned amount</strong> = <code>Gain or loss + Initial invested amount + (4 ÷ 1461) × Periodic contribution amount × Periodic contribution × Investment period</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Initial invested amount</strong> = <code>(1 ÷ 1461) × ( − 4 × ROI × Periodic contribution amount × Periodic contribution × Investment period − 4 × Periodic contribution amount × Periodic contribution × Investment period + 1461 × Returned amount) ÷ (ROI + 1)</code> — the form to use when ROI, Periodic contribution amount, Periodic contribution and Investment period are the values you have.</li><li><strong>Investment period</strong> = <code>(1461 ÷ 4) × ( − ROI × Initial invested amount − Initial invested amount + Returned amount) ÷ (Periodic contribution amount × Periodic contribution × (ROI + 1))</code> — the form to use when ROI, Initial invested amount, Returned amount and Periodic contribution amount are the values you have.</li><li><strong>Periodic contribution amount</strong> = <code>(1461 ÷ 4) × ( − ROI × Initial invested amount − Initial invested amount + Returned amount) ÷ (Periodic contribution × Investment period × (ROI + 1))</code> — the form to use when ROI, Initial invested amount, Returned amount and Periodic contribution are the values you have.</li><li><strong>Periodic contribution</strong> = <code>(1461 ÷ 4) × ( − ROI × Initial invested amount − Initial invested amount + Returned amount) ÷ (Periodic contribution amount × Investment period × (ROI + 1))</code> — the form to use when ROI, Initial invested amount, Returned amount and Periodic contribution amount are the values you have.</li><li><strong>Gain or loss</strong> = <code>− Initial invested amount − 4 ÷ 1461 × Periodic contribution amount × Periodic contribution × Investment period + Returned amount</code> — the form to use when Initial invested amount, Periodic contribution amount, Periodic contribution and Investment period are the values you have.</li><li><strong>Initial invested amount</strong> = <code>− Gain or loss − 4 ÷ 1461 × Periodic contribution amount × Periodic contribution × Investment period + Returned amount</code> — the form to use when Gain or loss, Periodic contribution amount, Periodic contribution and Investment period are the values you have.</li><li><strong>Investment period</strong> = <code>(1461 ÷ 4) × ( − Gain or loss − Initial invested amount + Returned amount) ÷ (Periodic contribution amount × Periodic contribution)</code> — the form to use when Gain or loss, Initial invested amount, Returned amount and Periodic contribution amount are the values you have.</li><li><strong>Periodic contribution amount</strong> = <code>(1461 ÷ 4) × ( − Gain or loss − Initial invested amount + Returned amount) ÷ (Periodic contribution × Investment period)</code> — the form to use when Gain or loss, Initial invested amount, Returned amount and Periodic contribution are the values you have.</li></ul><p>Any one of ROI, Initial invested amount and Investment period can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Rate of return, from 3 to 6 — and the answers go from <strong>Periodic contribution</strong> -1, <strong>Periodic contribution</strong> -1, <strong>Investment period</strong> 0 yrs and <strong>Time difference</strong> 0 yrs to <strong>Periodic contribution</strong> -1, <strong>Periodic contribution</strong> -1, <strong>Investment period</strong> 0 yrs and <strong>Time difference</strong> 0 yrs.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Investment period, Rate of return and ROI is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Periodic contribution amount is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Investment period left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Investment period is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Initial invested amount left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Initial invested amount is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Investment period and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Investment period, Initial invested amount, Periodic contribution and Rate of return. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Investment period into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Periodic contribution amount in USD with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Periodic contribution amount is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The chips cover years and percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It counts in whole days.</strong> The differences are counted in whole days, so an answer is a date or a number of days rather than an interval in hours. Expect a day&#039;s uncertainty if the event itself happened at an unknown time.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Investment period, Initial invested amount and Periodic contribution and the number you are missing is Periodic contribution amount.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/bill-rate">Bill rate Calculator</a>, <a href="/finance/billable-hours">Billable hours Calculator</a> and <a href="/finance/bitcoin-etf">Bitcoin ETF Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what ROI is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Investment period, Initial invested amount, Periodic contribution and Rate of return beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the ROI calculator work out?', 'a' => 'Periodic contribution amount, from Initial invested amount, Periodic contribution amount, Periodic contribution and Investment period.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Investment period (years), Initial invested amount (USD), Periodic contribution, Rate of return (percent), Returned amount (USD). With investment period, initial invested amount and periodic contribution in place, Periodic contribution amount can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of ROI, Initial invested amount, Investment period and Periodic contribution amount blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Periodic contribution = -1, Periodic contribution = -1, Investment period = 0 yrs and Time difference = 0 yrs. The figures come from Investment period as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Periodic contribution amount is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Investment period left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Periodic contribution amount at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/bill-rate', 'name' => 'Bill rate Calculator'],
            ['path' => '/finance/billable-hours', 'name' => 'Billable hours Calculator'],
            ['path' => '/finance/bitcoin-etf', 'name' => 'Bitcoin ETF Calculator'],
        ],
        'authors' => [],
    ],
];
