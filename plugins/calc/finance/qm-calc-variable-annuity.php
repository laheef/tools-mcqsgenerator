<?php

/**
 * Variable annuity
 * /finance/variable-annuity
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Variable annuity',
    'meta' => ['title' => 'Variable annuity Calculator: Free, With Steps', 'description' => 'Variable annuity turns i\'d like to know..., aimed final balance and starting balance into length of annuity and opening balance. Every figure is computed.', 'h1' => 'Variable annuity Calculator', 'updated' => '2025-05-15'],
    'sections' => [
        [
            'title' => 'Annuity specifications',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Subject',
                            'label' => 'I\'d like to know...',
                            'type' => 'select',
                            'options' => [
                                'What should be my opening balance?' => '1',
                                'What will be my final balance?' => '2',
                                'How much should I contribute?' => '3',
                                'How long should I keep my annuity?' => '4',
                                'What is the required rate of return?' => '5',
                            ],
                            'dataset' => 'subject',
                            'control' => 'DROPDOWN',
                            'default' => 'What will be my final balance?',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Main specifications',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'annuity',
                            'label' => 'Annuity',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'FinBal',
                            'label' => 'Aimed final balance',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '100000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'InDep',
                            'label' => 'Starting balance',
                            'type' => 'number',
                            'help' => 'This will be the opening balance at the beginning of the annuity.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '10000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'AgeStart',
                            'label' => 'Current age',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '25',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'AgeEnd',
                            'label' => 'Withdrawal age',
                            'type' => 'number',
                            'help' => 'The expected age when you stop paying contribution and begin withdrawing from your annuity balance.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '60',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 't',
                            'label' => 'Length of annuity',
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
                            'name' => 'PerPay',
                            'label' => 'Contribution',
                            'type' => 'number',
                            'help' => 'The amount that goes to your annuity account.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '100',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PayFreq',
                            'label' => 'Annuity payment frequency',
                            'type' => 'select',
                            'options' => ['Yearly' => '1', 'Monthly' => '12'],
                            'dataset' => 'PayFreq',
                            'control' => 'DROPDOWN',
                            'default' => 'Monthly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Type',
                            'label' => 'Type of annuity',
                            'type' => 'select',
                            'options' => ['Ordinary annuity' => '0', 'Annuity due' => '1'],
                            'dataset' => 'Type',
                            'control' => 'DROPDOWN',
                            'help' => 'Ordinary annuity: end of periods; annuity due: beginning of periods.',
                            'default' => 'Annuity due',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'r',
                            'label' => 'Expected rate of return',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'CompFreq',
                            'label' => 'Compounding frequency',
                            'type' => 'select',
                            'options' => ['Yearly' => '1', 'Semi-annually' => '2', 'Quarterly' => '4', 'Monthly' => '12'],
                            'dataset' => 'CompFreq',
                            'control' => 'DROPDOWN',
                            'help' => 'The frequency with which interest is added to (capitalized on) the balance.',
                            'default' => 'Yearly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'g',
                            'label' => 'Annual growth rate',
                            'type' => 'number',
                            'help' => 'The percentage growth rate of your additional periodic contribution over a year.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Tax specification',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'TaxOpt',
                            'label' => 'Setting option',
                            'type' => 'select',
                            'options' => ['US federal income tax' => '1', 'Set manually' => '2'],
                            'dataset' => 'Tax',
                            'control' => 'DROPDOWN',
                            'default' => 'US federal income tax',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Stat',
                            'label' => 'Filing status',
                            'type' => 'select',
                            'options' => ['Single' => '1', 'Married filing jointly' => '2', 'Married filing separately' => '3', 'Heads of household' => '4'],
                            'dataset' => 'Stat',
                            'control' => 'DROPDOWN',
                            'default' => 'Single',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Income',
                            'label' => 'Annual income',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'IncGrowth',
                            'label' => 'Expected annual growth in income',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Tax',
                            'label' => 'Current tax rate',
                            'type' => 'number',
                            'help' => 'Expected tax rate till the end of annuity.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Infl',
                            'label' => 'Inflation rate',
                            'type' => 'number',
                            'help' => 'Inflation rate is used for tax bracket extrapolation.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
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
                                ['when' => 'textInfo == 1', 'text' => 'The rate of return cannot be estimated with the given setup.'],
                                ['when' => 'textInfo == 2', 'text' => 'The time length cannot be estimated with the given setup.'],
                                ['when' => 'textInfo == 3', 'text' => 'The length of withdrawal is infinite since the {{PayFreq.name}} interest-earning exceeds the withdrawal amount.'],
                                ['when' => 'textInfo == 4', 'text' => 'The final balance must exceed the initial deposit to estimate time length with deposits.'],
                                ['when' => 'textInfo == 5', 'text' => 'Your&nbsp;annuity balance&nbsp;will&nbsp;last&nbsp;for over&nbsp;100&nbsp;years.'],
                                ['when' => 'textInfo == 7 and typeInfo == 1 and annuityInfo == 1', 'text' => 'You can deposit {{depositOrWithdraw.monetaryValue}} at the end of each {{PayFreq.name}} to deplete your annuity entirely.'],
                                ['when' => 'textInfo == 7 and typeInfo == 1  and annuityInfo == 2', 'text' => 'You can withdraw {{depositOrWithdraw.monetaryValue}} at the end of each {{PayFreq.name}} to deplete your annuity entirely.'],
                                ['when' => 'textInfo == 7 and typeInfo == 2 and annuityInfo == 1', 'text' => 'You can deposit {{depositOrWithdraw.monetaryValue}} at the beginning of each {{PayFreq.name}} to deplete your annuity entirely.'],
                                ['when' => 'textInfo == 7 and typeInfo == 2 and annuityInfo == 2', 'text' => 'You can withdraw {{depositOrWithdraw.monetaryValue}} at the beginning of each {{PayFreq.name}} to deplete your annuity entirely.'],
                                ['when' => 'textInfo == 8 and typeInfo == 1 and annuityInfo == 1', 'text' => 'You should deposit {{depositOrWithdraw.monetaryValue}} at the end of each {{PayFreq.name}} to reach the final balance.'],
                                ['when' => 'textInfo == 8 and typeInfo == 1  and annuityInfo == 2', 'text' => 'You should withdraw {{depositOrWithdraw.monetaryValue}} at the end of each {{PayFreq.name}} to reach the final balance.'],
                                ['when' => 'textInfo == 8 and typeInfo == 2 and annuityInfo == 1', 'text' => 'You should deposit {{depositOrWithdraw.monetaryValue}} at the beginning of each {{PayFreq.name}} to reach the final balance.'],
                                ['when' => 'textInfo == 8 and typeInfo == 2 and annuityInfo == 2', 'text' => 'You should withdraw {{depositOrWithdraw.monetaryValue}} at the beginning of each {{PayFreq.name}} to reach the final balance.'],
                                ['when' => 'textInfo == 9 and annuityInfo == 1 and directionInfo == 1', 'text' => <<<'TXT'
                                You should deposit{{depositOrWithdraw.monetaryValue}}** initially and increase it gradually to reach the final balance. You can check all exact figures in the payment schedule below.
                                TXT],
                                ['when' => 'textInfo == 9 and annuityInfo == 1 and directionInfo == 2', 'text' => <<<'TXT'
                                You should deposit{{depositOrWithdraw.monetaryValue}}** initially and decrease it gradually to reach the final balance. You can check all exact figures in the payment schedule below.
                                TXT],
                                ['when' => 'textInfo == 9 and annuityInfo == 2 and directionInfo == 1', 'text' => <<<'TXT'
                                You should withdraw{{depositOrWithdraw.monetaryValue}}** initially and increase it gradually to reach the final balance. You can check all exact figures in the payment schedule below.
                                TXT],
                                ['when' => 'textInfo == 9 and annuityInfo == 2 and directionInfo == 2', 'text' => <<<'TXT'
                                You should withdraw{{depositOrWithdraw.monetaryValue}}** initially and decrease it gradually to reach the final balance. You can check all exact figures in the payment schedule below.
                                TXT],
                                ['when' => 'textInfo == 10 and dateInfo == 1', 'text' => 'Your annuity will last for {{yearDebt.formattedValue}} year from the first day of withdrawal.'],
                                ['when' => 'textInfo == 10 and dateInfo == 2', 'text' => 'Your annuity will last for {{yearDebt.formattedValue}} years from the first day of withdrawal.'],
                                ['when' => 'textInfo == 10 and dateInfo == 3', 'text' => 'Your annuity will last for {{monthDebt.formattedValue}} month from the first day of withdrawal.'],
                                ['when' => 'textInfo == 10 and dateInfo == 4', 'text' => 'Your annuity will last for {{monthDebt.formattedValue}} months from the first day of withdrawal.'],
                                ['when' => 'textInfo == 10 and dateInfo == 5', 'text' => 'Your annuity will last for {{yearDebt.formattedValue}} year and {{monthDebt.formattedValue}} month from the first day of withdrawal.'],
                                ['when' => 'textInfo == 10 and dateInfo == 6', 'text' => 'Your annuity will last for {{yearDebt.formattedValue}} years and {{monthDebt.formattedValue}} month from the first day of withdrawal.'],
                                ['when' => 'textInfo == 10 and dateInfo == 7', 'text' => 'Your annuity will last for {{yearDebt.formattedValue}} year and {{monthDebt.formattedValue}} months from the first day of withdrawal.'],
                                ['when' => 'textInfo == 10 and dateInfo == 8', 'text' => 'Your annuity will last for {{yearDebt.formattedValue}} years and {{monthDebt.formattedValue}} months from the first day of withdrawal.'],
                                ['when' => 'textInfo == 11 and annuityInfo == 1 and dateInfo == 1', 'text' => 'After depositing for {{yearDebt.formattedValue}} year, you will reach {{finalBalance.monetaryValue}}.'],
                                ['when' => 'textInfo == 11 and annuityInfo == 1 and dateInfo == 2', 'text' => 'After depositing for {{yearDebt.formattedValue}} years, you will reach {{finalBalance.monetaryValue}}.'],
                                ['when' => 'textInfo == 11 and annuityInfo == 1 and dateInfo == 3', 'text' => 'After depositing for {{monthDebt.formattedValue}} month, you will reach {{finalBalance.monetaryValue}}.'],
                                ['when' => 'textInfo == 11 and annuityInfo == 1 and dateInfo == 4', 'text' => 'After depositing for {{monthDebt.formattedValue}} months, you will reach {{finalBalance.monetaryValue}}.'],
                                ['when' => 'textInfo == 11 and annuityInfo == 1 and dateInfo == 5', 'text' => 'After depositing for {{yearDebt.formattedValue}} year and {{monthDebt.formattedValue}} month, you will reach {{finalBalance.monetaryValue}}.'],
                                ['when' => 'textInfo == 11 and annuityInfo == 1 and dateInfo == 6', 'text' => 'After depositing for {{yearDebt.formattedValue}} years and {{monthDebt.formattedValue}} month, you will reach {{finalBalance.monetaryValue}}.'],
                                ['when' => 'textInfo == 11 and annuityInfo == 1 and dateInfo == 7', 'text' => 'After depositing for {{yearDebt.formattedValue}} year and {{monthDebt.formattedValue}} months, you will reach {{finalBalance.monetaryValue}}.'],
                                ['when' => 'textInfo == 11 and annuityInfo == 1 and dateInfo == 8', 'text' => 'After depositing for {{yearDebt.formattedValue}} years and {{monthDebt.formattedValue}} months, you will reach {{finalBalance.monetaryValue}}.'],
                                ['when' => 'textInfo == 11 and annuityInfo == 2 and dateInfo == 1', 'text' => 'After withdrawing for {{yearDebt.formattedValue}} year, you will reach {{finalBalance.monetaryValue}}.'],
                                ['when' => 'textInfo == 11 and annuityInfo == 2 and dateInfo == 2', 'text' => 'After withdrawing for {{yearDebt.formattedValue}} years, you will reach {{finalBalance.monetaryValue}}.'],
                                ['when' => 'textInfo == 11 and annuityInfo == 2 and dateInfo == 3', 'text' => 'After withdrawing for {{monthDebt.formattedValue}} month, you will reach {{finalBalance.monetaryValue}}.'],
                                ['when' => 'textInfo == 11 and annuityInfo == 2 and dateInfo == 4', 'text' => 'After withdrawing for {{monthDebt.formattedValue}} months, you will reach {{finalBalance.monetaryValue}}.'],
                                ['when' => 'textInfo == 11 and annuityInfo == 2 and dateInfo == 5', 'text' => 'After withdrawing for {{yearDebt.formattedValue}} year and {{monthDebt.formattedValue}} month, you will reach {{finalBalance.monetaryValue}}.'],
                                ['when' => 'textInfo == 11 and annuityInfo == 2 and dateInfo == 6', 'text' => 'After withdrawing for {{yearDebt.formattedValue}} years and {{monthDebt.formattedValue}} month, you will reach {{finalBalance.monetaryValue}}.'],
                                ['when' => 'textInfo == 11 and annuityInfo == 2 and dateInfo == 7', 'text' => 'After withdrawing for {{yearDebt.formattedValue}} year and {{monthDebt.formattedValue}} months, you will reach {{finalBalance.monetaryValue}}.'],
                                ['when' => 'textInfo == 11 and annuityInfo == 2 and dateInfo == 8', 'text' => 'After withdrawing for {{yearDebt.formattedValue}} years and {{monthDebt.formattedValue}} months, you will reach {{finalBalance.monetaryValue}}.'],
                                ['when' => 'textInfo == 12', 'text' => 'The starting balance of your variable annuity should be {{OpeningBalance.monetaryValue}} to reach the given final balance.'],
                                ['when' => 'textInfo == 13', 'text' => <<<'TXT'
                                With the given parameters, your final balance would exceed your target — you may set a higher value for the aimed final balance or a lower periodic contribution.
                                TXT],
                                ['when' => 'textInfo == 14', 'text' => 'The final balance of your annuity is estimated to be {{FinalBalanceBeforeTax.monetaryValue}}.'],
                                ['when' => 'textInfo == 15', 'text' => 'The rate of return on your annuity must be at least {{rateOfReturn.formattedValue}}% to reach the given final balance.'],
                                ['when' => 'textInfo == 16', 'text' => 'The rate of return cannot be estimated with the given parameters.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Table variables (hidden)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'OpeningBalance',
                            'label' => 'Opening balance',
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
                            'name' => 'FinalBalanceBeforeTax',
                            'label' => 'Final balance before tax',
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
                            'name' => 'FinalBalanceTaxable',
                            'label' => 'Final balance taxable',
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
                            'name' => 'TotalReturn',
                            'label' => 'Total return',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PeriodsCount',
                            'label' => 'Periods count',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'AnnualContribution',
                            'label' => 'Annual contribution',
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
                            'name' => 'TotalContribution',
                            'label' => 'Total contribution',
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
            'title' => 'Conditional checks (hidden)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'q',
                            'label' => 'Annuity frequency',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'g_p',
                            'label' => 'Periodic growth rate',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            The percentage growth rate of the periodic deposits of withdrawals. Note that periodic and annual growth rates are linked together: the other will be calculated according to annuity frequency if you set one.
                            TXT,
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
                            'name' => 'rateOfReturn',
                            'label' => 'Rate of return',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'finalBalance',
                            'label' => 'Final balance',
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
                            'name' => 'monthDebt',
                            'label' => 'Month debt',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'yearDebt',
                            'label' => 'Year debt',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dateInfo',
                            'label' => 'Date info',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'annuityInfo',
                            'label' => 'Annuity info',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'directionInfo',
                            'label' => 'Direction info',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'textInfo',
                            'label' => 'Text info',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'typeInfo',
                            'label' => 'Type info',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Formulas',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'depositOrWithdraw',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'g + 1= (1 + g_p) ^ q',
            'results' => ['g_p' => 'pow(g + 1, 1/q) - 1', 'q' => 'log(g + 1)/log(g_p + 1)', 'g' => 'pow(g_p + 1, q) - 1'],
        ],
        [
            'title' => 't= AgeEnd - AgeStart',
            'results' => ['AgeEnd' => 'AgeStart + t', 'AgeStart' => 'AgeEnd - t', 't' => 'AgeEnd - AgeStart'],
        ],
        [
            'title' => 'annuity = getAnnuity(InDep, FinBal, Infl, CompFreq, PayFreq, t, Type, PerPay, r, g, Subject, Income, IncGrowth, Stat, Tax, TaxOpt)',
            'results' => ['annuity' => 'getAnnuity(InDep, FinBal, Infl, CompFreq, PayFreq, t, Type, PerPay, r, g, Subject, Income, IncGrowth, Stat, Tax, TaxOpt)'],
        ],
        [
            'title' => 'OpeningBalance = getOpeningBalance(annuity)',
            'results' => ['OpeningBalance' => 'getOpeningBalance(getAnnuity(InDep, FinBal, Infl, CompFreq, PayFreq, t, Type, PerPay, r, g, Subject, Income, IncGrowth, Stat, Tax, TaxOpt))'],
        ],
        [
            'title' => 'FinalBalanceBeforeTax = getFinalBalanceBeforeTax(annuity)',
            'results' => ['FinalBalanceBeforeTax' => 'getFinalBalanceBeforeTax(getAnnuity(InDep, FinBal, Infl, CompFreq, PayFreq, t, Type, PerPay, r, g, Subject, Income, IncGrowth, Stat, Tax, TaxOpt))'],
        ],
        [
            'title' => 'FinalBalanceTaxable = getFinalBalanceTaxable(annuity)',
            'results' => ['FinalBalanceTaxable' => 'getFinalBalanceTaxable(getAnnuity(InDep, FinBal, Infl, CompFreq, PayFreq, t, Type, PerPay, r, g, Subject, Income, IncGrowth, Stat, Tax, TaxOpt))'],
        ],
        [
            'title' => 'TotalReturn = getTotalReturn(annuity)',
            'results' => ['TotalReturn' => 'getTotalReturn(getAnnuity(InDep, FinBal, Infl, CompFreq, PayFreq, t, Type, PerPay, r, g, Subject, Income, IncGrowth, Stat, Tax, TaxOpt))'],
        ],
        [
            'title' => 'PeriodsCount = getPeriodsCount(annuity)',
            'results' => ['PeriodsCount' => 'getPeriodsCount(getAnnuity(InDep, FinBal, Infl, CompFreq, PayFreq, t, Type, PerPay, r, g, Subject, Income, IncGrowth, Stat, Tax, TaxOpt))'],
        ],
        [
            'title' => 'AnnualContribution = getAnnualContribution(annuity)',
            'results' => ['AnnualContribution' => 'getAnnualContribution(getAnnuity(InDep, FinBal, Infl, CompFreq, PayFreq, t, Type, PerPay, r, g, Subject, Income, IncGrowth, Stat, Tax, TaxOpt))'],
        ],
        [
            'title' => 'TotalContribution = getTotalContribution(annuity)',
            'results' => ['TotalContribution' => 'getTotalContribution(getAnnuity(InDep, FinBal, Infl, CompFreq, PayFreq, t, Type, PerPay, r, g, Subject, Income, IncGrowth, Stat, Tax, TaxOpt))'],
        ],
        [
            'title' => 'rateOfReturn = getRate(annuity)',
            'results' => ['rateOfReturn' => 'getRate(getAnnuity(InDep, FinBal, Infl, CompFreq, PayFreq, t, Type, PerPay, r, g, Subject, Income, IncGrowth, Stat, Tax, TaxOpt))'],
        ],
        [
            'title' => 'finalBalance = getFinalBalance(annuity)',
            'results' => ['finalBalance' => 'getFinalBalance(getAnnuity(InDep, FinBal, Infl, CompFreq, PayFreq, t, Type, PerPay, r, g, Subject, Income, IncGrowth, Stat, Tax, TaxOpt))'],
        ],
        [
            'title' => 'monthDebt = getMonthInfo(annuity)',
            'results' => ['monthDebt' => 'getMonthInfo(getAnnuity(InDep, FinBal, Infl, CompFreq, PayFreq, t, Type, PerPay, r, g, Subject, Income, IncGrowth, Stat, Tax, TaxOpt))'],
        ],
        [
            'title' => 'yearDebt = getYearInfo(annuity)',
            'results' => ['yearDebt' => 'getYearInfo(getAnnuity(InDep, FinBal, Infl, CompFreq, PayFreq, t, Type, PerPay, r, g, Subject, Income, IncGrowth, Stat, Tax, TaxOpt))'],
        ],
        [
            'title' => 'textInfo = getTextInfo(annuity)',
            'results' => ['textInfo' => 'getTextInfo(getAnnuity(InDep, FinBal, Infl, CompFreq, PayFreq, t, Type, PerPay, r, g, Subject, Income, IncGrowth, Stat, Tax, TaxOpt))'],
        ],
        [
            'title' => 'dateInfo = getDateInfo(annuity)',
            'results' => ['dateInfo' => 'getDateInfo(getAnnuity(InDep, FinBal, Infl, CompFreq, PayFreq, t, Type, PerPay, r, g, Subject, Income, IncGrowth, Stat, Tax, TaxOpt))'],
        ],
        [
            'title' => 'annuityInfo = getAnnuityInfo(annuity)',
            'results' => ['annuityInfo' => 'getAnnuityInfo(getAnnuity(InDep, FinBal, Infl, CompFreq, PayFreq, t, Type, PerPay, r, g, Subject, Income, IncGrowth, Stat, Tax, TaxOpt))'],
        ],
        [
            'title' => 'typeInfo = getTypeInfo(annuity)',
            'results' => ['typeInfo' => 'getTypeInfo(getAnnuity(InDep, FinBal, Infl, CompFreq, PayFreq, t, Type, PerPay, r, g, Subject, Income, IncGrowth, Stat, Tax, TaxOpt))'],
        ],
        [
            'title' => 'directionInfo = getDirectionInfo(annuity)',
            'results' => ['directionInfo' => 'getDirectionInfo(getAnnuity(InDep, FinBal, Infl, CompFreq, PayFreq, t, Type, PerPay, r, g, Subject, Income, IncGrowth, Stat, Tax, TaxOpt))'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";var dateInfo=0,yearDebt=0,monthDebt=0,FinBal=0,r=0,InDep=0,TotBal=0,TotBalTax=0,TotInt=0,FirstYearDep=0,TotCashFlow=0,periodsCount=0,textInfo=0,annuityInfo=0,directionInfo=0,typeInfo=0;omni.define("getAnnuity",function(_InDep,_FinBal,_Infl,_CompFreq,_PayFreq,_t,_Type,_PerPay,_r,_g,_Subject,_Income,_IncGrowth,_Stat,_Tax,_TaxOpt){InDep=Number(_InDep);FinBal=Number(_FinBal);var CompFreq=Number(_CompFreq);var PayFreq=Number(_PayFreq);var t=Number(_t);var Type=Number(_Type);var PerPay=Number(_PerPay);r=Number(_r);var g=Number(_g);var g_p=mathjs.pow(g+1,1/PayFreq)-1;var Subject=Number(_Subject);var Infl=Number(_Infl);var FlowType=1;var Inc=Number(_Income);var IncGrowth=Number(_IncGrowth);var Stat=Number(_Stat);var Tax=Number(_Tax);var TaxOpt=Number(_TaxOpt);PerPay=PerPay*FlowType;if(Subject>3){g_p=0}if(Subject==3){FlowType=1}var periods=PayFreq*t;if(r==0){r=1e-10}var eq_p=getPerEqRate(PayFreq,CompFreq,r);var DepBal=0;var FinPrincBal=0;if(Subject==1){DepBal=getBal(PerPay,periods,PayFreq,eq_p,g_p,g,Type);FinPrincBal=FinBal-DepBal;InDep=getPV(FinPrincBal,eq_p,periods)}if(Subject==2){DepBal=getBal(PerPay,periods,PayFreq,eq_p,g_p,g,Type);FinPrincBal=getFV(InDep,eq_p,periods);FinBal=FinPrincBal+DepBal}if(Subject==3){PerPay=getPerPay(InDep,FinBal,periods,PayFreq,eq_p,g_p,g,Type)}if(Subject==4){periods=getAnnuityPer(InDep,FinBal,PerPay,PayFreq,eq_p,Type)}if(Subject==5){r=getIntRate(InDep,FinBal,PerPay,periods,CompFreq,PayFreq,Type);eq_p=getPerEqRate(PayFreq,CompFreq,r/100);if(r==0){textInfo=1}}if(Subject==4&&periods==0){textInfo=2;if(InDep*eq_p>=mathjs.abs(PerPay)&&FlowType==-1){textInfo=3}if(InDep>FinBal&&FlowType==1){textInfo=4}}var periodsLoop=mathjs.floor(periods);if(Subject==4){periodsLoop=mathjs.floor(periods+1)}var yearChart2=0;var i;var iDep=0;var InBal=0;TotBal=InDep;var TotBalOpen=0;var TotIntPer=0;TotInt=0;var YearDep=0;var DepBalOpen=0;var InBalOpen=0;TotCashFlow=0;periodsCount=0;var TaxAm=0;var yearsCount=0;var InflComp=0;FirstYearDep=PerPay*PayFreq;var TotIntPerTax=0;var YearIntTax=0;TotBalTax=0;var TotBalOpenTax=0;var TaxAmInc=0;for(i=0;i<=periodsLoop;i++){if(i/PayFreq>100){textInfo=5}if(i>0){InBal=InDep*mathjs.pow(1+eq_p,i);InBalOpen=InDep*mathjs.pow(1+eq_p,i-1);DepBal=getBal(PerPay,i,PayFreq,eq_p,g_p,g,Type);DepBalOpen=getBal(PerPay,i-1,PayFreq,eq_p,g_p,g,Type);TotBal=InBal+DepBal;TotBalOpen=InBalOpen+DepBalOpen;iDep=PerPay*mathjs.pow(1+g_p,i-1);if(Type==1){TotIntPer=(TotBalOpen+iDep)*eq_p}else{TotIntPer=TotBalOpen*eq_p}if(i%PayFreq==1){YearIntTax=0;YearDep=0}YearDep+=iDep;TotInt+=TotIntPer;periodsCount=i;TotCashFlow+=iDep;if(i%PayFreq==0&&PayFreq==12){yearChart2=1}else{yearChart2=0}if(PayFreq==1){yearChart2=1}if(i==1){TotBalOpenTax=InDep}else{TotBalOpenTax=TotBalTax}if(Type==1){TotIntPerTax=(TotBalOpenTax+iDep)*eq_p}else{TotIntPerTax=TotBalOpenTax*eq_p}if(PayFreq==12){YearIntTax+=TotIntPerTax}if(PayFreq==1){YearIntTax=TotIntPerTax}if(yearChart2==1){yearsCount+=yearChart2;InflComp=mathjs.pow(1+Infl,yearsCount-1);if(TaxOpt==1){TaxAmInc=getTaxFed22(Inc,Stat,InflComp);TaxAm=getTaxFed22(Inc+YearIntTax,Stat,InflComp)-TaxAmInc}else{TaxAm=YearIntTax*Tax}}else{TaxAm=0}TotBalTax=TotBalOpenTax+iDep+TotIntPerTax-TaxAm;if(yearChart2==1&&yearsCount>1){Inc=Inc*(1+IncGrowth)}}if(i==12){FirstYearDep=YearDep}}if(Math.abs(TotBal)<0.0001){TotBal=0}annuityInfo=1;if(PerPay<0){annuityInfo=2}var months=periods/PayFreq*12;yearDebt=Math.trunc(months/12);monthDebt=mathjs.ceil(months-yearDebt*12);if(yearDebt===1&&monthDebt===0){dateInfo=1}if(yearDebt>1&&monthDebt===0){dateInfo=2}if(yearDebt===0&&monthDebt===1){dateInfo=3}if(yearDebt===0&&monthDebt>1){dateInfo=4}if(yearDebt===1&&monthDebt===1){dateInfo=5}if(yearDebt>1&&monthDebt===1){dateInfo=6}if(yearDebt===1&&monthDebt>1){dateInfo=7}if(yearDebt>1&&monthDebt>1){dateInfo=8}if(Subject==3){if(Type==0){typeInfo=1}else{typeInfo=2}if(g==0){if(FinBal==0){textInfo=7}else if(FinBal!==0){textInfo=8}}else{if(g>0){directionInfo=1}else{directionInfo=2}textInfo=9}}else if(Subject==4&&FinBal==0){textInfo=10}else if(Subject==4&&FinBal!==0&&periods!==0){textInfo=11}if(Subject==1){if(InDep>0){textInfo=12}if(InDep<0.01){textInfo=13}}if(Subject==2){textInfo=14}if(Subject==5){if(r>0.001){textInfo=15}}if(r<0.001){textInfo=16}return 1});function getPV(FinPrincBal,eq_p,periods){var InBal=FinPrincBal/mathjs.pow(1+eq_p,periods);return InBal}function getFV(InBal,eq_p,periods){var FinPrincBal=InBal*mathjs.pow(1+eq_p,periods);return FinPrincBal}function getBal(PerPay,periods,PayFreq,eq_p,g_p,g,Type){var DepBal;if(g_p!==eq_p&&PayFreq!==1){DepBal=PerPay*(mathjs.pow(1+eq_p,periods)-mathjs.pow(1+g_p,periods))*(1+eq_p*Type)/(eq_p-g_p)}else if(g!==eq_p&&PayFreq==1){DepBal=PerPay*(mathjs.pow(1+eq_p,periods)-mathjs.pow(1+g,periods))*(1+eq_p*Type)/(eq_p-g)}else if(g_p==eq_p){DepBal=PerPay*periods*mathjs.pow(1+eq_p,periods-1)*(1+eq_p*Type)}return DepBal}function getPerPay(InBal,FinBal,periods,PayFreq,eq_p,g_p,g,Type){var PerPay;var PrincBal=InBal*mathjs.pow(1+eq_p,periods);var DepBal=FinBal-PrincBal;if(g_p!==eq_p&&PayFreq!==1){PerPay=DepBal/((mathjs.pow(1+eq_p,periods)-mathjs.pow(1+g_p,periods))*(1+eq_p*Type)/(eq_p-g_p))}else if(g!==eq_p&&PayFreq==1){PerPay=DepBal/((mathjs.pow(1+eq_p,periods)-mathjs.pow(1+g,periods))*(1+eq_p*Type)/(eq_p-g))}else if(g_p==eq_p){PerPay=DepBal/(periods*mathjs.pow(1+eq_p,periods-1)*(1+eq_p*Type))}return PerPay}function getAnnuityPer(InBal,FinBal,PerPay,PayFreq,eq_p,Type){var periods;periods=mathjs.log((eq_p*(FinBal+PerPay*Type)+PerPay)/(eq_p*InBal+PerPay*(1+eq_p*Type)))/mathjs.log(eq_p+1);if(periods<0){periods=0}return periods}function getIntRate(InBal,FinBal,PerPay,periods,CompFreq,PayFreq,Type){var Max_iterations=500000;var Min_precision=1e-9;var ex=Math.exp(1);var APR_approx=0.1;var oldI;var newI=APR_approx;var iteration=0;do{oldI=newI;var dividend=InBal*mathjs.pow(newI+1,periods)+PerPay*(mathjs.pow(newI+1,periods)-1)*(1+newI*Type)/newI-FinBal;var divisor=InBal*periods*mathjs.pow(newI+1,periods-1)+((PerPay*periods*mathjs.pow(newI+1,periods-1)*(1+newI*Type)+PerPay*(mathjs.pow(newI+1,periods)-1))*newI-PerPay*(mathjs.pow(newI+1,periods)-1)*(1+newI*Type))/mathjs.pow(newI,2);newI=newI-dividend/divisor;++iteration}while(mathjs.abs(oldI-newI)>Min_precision&&iteration<=Max_iterations);var eq_p=newI;var oldR;var newR=eq_p;do{oldR=newR;if(CompFreq==0){var dividendR=mathjs.pow(ex,newR/PayFreq)-1-eq_p;var divisorR=mathjs.pow(ex,newR/PayFreq)/PayFreq;newR=newR-dividendR/divisorR}else{var dividendR2=mathjs.pow(1+newR/CompFreq,CompFreq/PayFreq)-1-eq_p;var divisorR2=mathjs.pow(1+newR/CompFreq,CompFreq/PayFreq-1)/PayFreq;newR=newR-dividendR2/divisorR2}++iteration}while(mathjs.abs(oldR-newR)>Min_precision&&iteration<=Max_iterations);var r=newR/PayFreq*PayFreq*100;return mathjs.abs(r)<0?0:r}function getPerEqRate(PayFreq,_CompFreq,r){var CompFreq=Number(_CompFreq);var ex=mathjs.exp(1);var base;if(CompFreq==0){var continuous_r=mathjs.pow(ex,r)-1;base=1+continuous_r}else{base=1+r/CompFreq}var power=CompFreq/PayFreq;var eq_p=mathjs.round(mathjs.pow(base,power)-1,10);return eq_p}function getTaxFed22(Inc,Stat,Infl){var Brack1;var Brack2;var Brack3;var Brack4;var Brack5;var Brack6;var TaxRate0=0.1;var TaxRate1=0.12;var TaxRate2=0.22;var TaxRate3=0.24;var TaxRate4=0.32;var TaxRate5=0.35;var TaxRate6=0.37;var UnmarBrack1=10275*Infl;var UnmarBrack2=41775*Infl;var UnmarBrack3=89075*Infl;var UnmarBrack4=170050*Infl;var UnmarBrack5=215950*Infl;var UnmarBrack6=539900*Infl;var MarJointBrack1=20550*Infl;var MarJointBrack2=83550*Infl;var MarJointBrack3=178150*Infl;var MarJointBrack4=340100*Infl;var MarJointBrack5=431900*Infl;var MarJointBrack6=647850*Infl;var MarSepBrack1=10275*Infl;var MarSepBrack2=41775*Infl;var MarSepBrack3=89075*Infl;var MarSepBrack4=170050*Infl;var MarSepBrack5=215950*Infl;var MarSepBrack6=323925*Infl;var HeadBrack1=14650*Infl;var HeadBrack2=55900*Infl;var HeadBrack3=89050*Infl;var HeadBrack4=170050*Infl;var HeadBrack5=215950*Infl;var HeadBrack6=539900*Infl;var TaxFed;if(Stat==1){Brack1=UnmarBrack1;Brack2=UnmarBrack2;Brack3=UnmarBrack3;Brack4=UnmarBrack4;Brack5=UnmarBrack5;Brack6=UnmarBrack6}if(Stat==2){Brack1=MarJointBrack1;Brack2=MarJointBrack2;Brack3=MarJointBrack3;Brack4=MarJointBrack4;Brack5=MarJointBrack5;Brack6=MarJointBrack6}if(Stat==3){Brack1=MarSepBrack1;Brack2=MarSepBrack2;Brack3=MarSepBrack3;Brack4=MarSepBrack4;Brack5=MarSepBrack5;Brack6=MarSepBrack6}if(Stat==4){Brack1=HeadBrack1;Brack2=HeadBrack2;Brack3=HeadBrack3;Brack4=HeadBrack4;Brack5=HeadBrack5;Brack6=HeadBrack6}var Tax1=Brack1*TaxRate0;var Tax2=(Brack2-Brack1)*TaxRate1+Tax1;var Tax3=(Brack3-Brack2)*TaxRate2+Tax2;var Tax4=(Brack4-Brack3)*TaxRate3+Tax3;var Tax5=(Brack5-Brack4)*TaxRate4+Tax4;var Tax6=(Brack6-Brack5)*TaxRate5+Tax5;if(Inc<=Brack1){TaxFed=Inc*TaxRate0}else if(Inc>Brack1&&Inc<=Brack2){TaxFed=Tax1+(Inc-Brack1)*TaxRate1}else if(Inc>Brack2&&Inc<=Brack3){TaxFed=Tax2+(Inc-Brack2)*TaxRate2}else if(Inc>Brack3&&Inc<=Brack4){TaxFed=Tax3+(Inc-Brack3)*TaxRate3}else if(Inc>Brack4&&Inc<=Brack5){TaxFed=Tax4+(Inc-Brack4)*TaxRate4}else if(Inc>Brack5&&Inc<=Brack6){TaxFed=Tax5+(Inc-Brack5)*TaxRate5}else if(Inc>Brack6){TaxFed=Tax6+(Inc-Brack6)*TaxRate6}return TaxFed}omni.define("getOpeningBalance",function(annuity){if(annuity){return InDep}});omni.define("getFinalBalanceBeforeTax",function(annuity){if(annuity){return TotBal}});omni.define("getFinalBalanceTaxable",function(annuity){if(annuity){return TotBalTax}});omni.define("getTotalReturn",function(annuity){if(annuity){return TotInt}});omni.define("getPeriodsCount",function(annuity){if(annuity){return periodsCount}});omni.define("getAnnualContribution",function(annuity){if(annuity){return Math.abs(FirstYearDep)}});omni.define("getTotalContribution",function(annuity){if(annuity){return Math.abs(TotCashFlow)}});omni.define("getRate",function(annuity){if(annuity){return r}});omni.define("getFinalBalance",function(annuity){if(annuity){return FinBal}});omni.define("getTextInfo",function(annuity){if(annuity){return textInfo}});omni.define("getMonthInfo",function(annuity){if(annuity){return monthDebt}});omni.define("getYearInfo",function(annuity){if(annuity){return yearDebt}});omni.define("getDateInfo",function(annuity){if(annuity){return dateInfo}});omni.define("getAnnuityInfo",function(annuity){if(annuity){return annuityInfo}});omni.define("getTypeInfo",function(annuity){if(annuity){return typeInfo}});omni.define("getDirectionInfo",function(annuity){if(annuity){return directionInfo}});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Enter Current age and Withdrawal age into Variable annuity and the answer comes back as Annuity and Length of annuity. Nothing is looked up on this page: annuity is computed from current age and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Variable annuity calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Variable annuity: it takes 2 numbers and reports Annuity, Length of annuity and Annual growth rate.</p><p>Written with the labels from the form, Periodic growth rate = (Annual growth rate + 1)^(1 ÷ Annuity frequency) − 1.</p><p>The result panel carries Annuity, Length of annuity, Annual growth rate and Opening balance, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Current age</strong> — a plain number, no unit</li><li><strong>Withdrawal age</strong> — a plain number, no unit. The expected age when you stop paying contribution and begin withdrawing from your annuity balance.</li></ul><p>The answers come back as Annuity, Length of annuity in years, Annual growth rate in percent, Opening balance in USD, Final balance before tax in USD, Final balance taxable in USD, Total return in USD, Periods count, Annual contribution in USD, Total contribution in USD, Annuity frequency, Periodic growth rate in percent, Rate of return, Final balance in USD, Month debt, Year debt, Date info, Annuity info, Direction info, Text info, Type info. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Length of annuity lists 5 options and opens on years. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Periodic growth rate</strong> = <code>(Annual growth rate + 1)^(1 ÷ Annuity frequency) − 1</code></li><li><strong>Annuity frequency</strong> = <code>ln(Annual growth rate + 1) ÷ ln(Periodic growth rate + 1)</code></li><li><strong>Annual growth rate</strong> = <code>(Periodic growth rate + 1)^(Annuity frequency) − 1</code></li><li><strong>Length of annuity</strong> = <code>Withdrawal age − Current age</code></li><li><strong>Withdrawal age</strong> = <code>Current age + Length of annuity</code></li><li><strong>Current age</strong> = <code>Withdrawal age − Length of annuity</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Periodic growth rate</strong> = <code>(Annual growth rate + 1)^(1 ÷ Annuity frequency) − 1</code> — the form to use when Annual growth rate and Annuity frequency are the values you have.</li><li><strong>Annuity frequency</strong> = <code>ln(Annual growth rate + 1) ÷ ln(Periodic growth rate + 1)</code> — the form to use when Annual growth rate and Periodic growth rate are the values you have.</li><li><strong>Annual growth rate</strong> = <code>(Periodic growth rate + 1)^(Annuity frequency) − 1</code> — the form to use when Periodic growth rate and Annuity frequency are the values you have.</li><li><strong>Length of annuity</strong> = <code>Withdrawal age − Current age</code> — the form to use when Withdrawal age and Current age are the values you have.</li><li><strong>Withdrawal age</strong> = <code>Current age + Length of annuity</code> — the form to use when Current age and Length of annuity are the values you have.</li><li><strong>Current age</strong> = <code>Withdrawal age − Length of annuity</code> — the form to use when Withdrawal age and Length of annuity are the values you have.</li></ul><p>Any one of Periodic growth rate, Annuity frequency and Annual growth rate can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Annuity, Length of annuity and Annual growth rate are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Current age left as a guess.</strong> Anything typed into Current age is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Withdrawal age left as a guess.</strong> Anything typed into Withdrawal age is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Current age is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Current age</strong> takes a plain number with no unit attached. It feeds Withdrawal age and Length of annuity. Have it to hand before you start: Current age is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Withdrawal age</strong> takes a plain number with no unit attached. The expected age when you stop paying contribution and begin withdrawing from your annuity balance. It feeds Current age and Length of annuity. Have it to hand before you start: Withdrawal age is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Current age and Withdrawal age. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Current age into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Annuity with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Annuity is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The unit tables here are years and percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Current age and Withdrawal age are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Current age and Withdrawal age measured, Annuity and Length of annuity wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/home-affordability">Home affordability</a>, <a href="/finance/home-improvement-loan">Home improvement loan Calculator</a> and <a href="/finance/home-value-us">Home value US Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Variable annuity is a number to act on, so the useful question is what to do with Annuity, Length of annuity (yrs) and Annual growth rate (perc) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Current age and Withdrawal age alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Variable annuity calculator work out?', 'a' => <<<'TXT'
            Annuity, Length of annuity, Annual growth rate and Opening balance, from Annual growth rate and Annuity frequency. The relationship is Periodic growth rate = (Annual growth rate + 1)^(1 ÷ Annuity frequency) − 1.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Current age, Withdrawal age. Enter current age and withdrawal age; Annuity is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Periodic growth rate, Annuity frequency, Annual growth rate and Length of annuity blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Annuity is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Current age left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Annuity keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/home-affordability', 'name' => 'Home affordability'],
            ['path' => '/finance/home-improvement-loan', 'name' => 'Home improvement loan Calculator'],
            ['path' => '/finance/home-value-us', 'name' => 'Home value US Calculator'],
        ],
        'authors' => [],
    ],
];
