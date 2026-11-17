<?php

/**
 * Debt consolidation
 * /finance/debt-consolidation
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Debt consolidation',
    'meta' => ['title' => 'Debt consolidation — Free Online Calculator', 'description' => 'Debt consolidation turns number of debts and type of payments into total debt and debt total. Every box can be solved for, not only the one in the title.', 'h1' => 'Debt consolidation Calculator', 'updated' => '2025-10-03'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'NumberDebts',
                            'label' => 'Number of debts',
                            'type' => 'select',
                            'options' => [
                                'Two' => '2',
                                'Three' => '3',
                                'Four' => '4',
                                'Five' => '5',
                                'Six' => '6',
                            ],
                            'dataset' => 'NumberDebts',
                            'control' => 'DROPDOWN',
                            'help' => 'Set the number of debts you would like to consolidate.',
                            'default' => 'Three',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PmtType',
                            'label' => 'Type of payments',
                            'type' => 'select',
                            'options' => ['All minimum' => '1', 'All fixed' => '2', 'Varied' => '3'],
                            'dataset' => 'PmtType',
                            'control' => 'DROPDOWN',
                            'help' => 'Monthly minimum payments means that you can increase your payments at any time. In contrast, when your payments are fixed, you cannot change the payment amount.',
                            'default' => 'All minimum',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarPmtType',
                            'label' => 'Varpmttype',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Debt #1',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Debt1',
                            'label' => 'Balance #1',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '4500',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'r1',
                            'label' => 'Interest rate #1',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '8.5',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Pmt1',
                            'label' => 'Payment #1',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '120',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 't1',
                            'label' => 'Payment type #1',
                            'type' => 'select',
                            'options' => ['Fixed' => '1', 'Minimum' => '2'],
                            'dataset' => 't1',
                            'default' => 'Fixed',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Debt #2',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Debt2',
                            'label' => 'Balance #2',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '12000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'r2',
                            'label' => 'Interest rate #2',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '4.2',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Pmt2',
                            'label' => 'Payment #2',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '150',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 't2',
                            'label' => 'Payment type #2',
                            'type' => 'select',
                            'options' => ['Fixed' => '1', 'Minimum' => '2'],
                            'dataset' => 't2',
                            'default' => 'Minimum',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Debt #3',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Debt3',
                            'label' => 'Balance #3',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '1200',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'r3',
                            'label' => 'Interest rate #3',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '17.5',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Pmt3',
                            'label' => 'Payment #3',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '50',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 't3',
                            'label' => 'Payment type #3',
                            'type' => 'select',
                            'options' => ['Fixed' => '1', 'Minimum' => '2'],
                            'dataset' => 't3',
                            'default' => 'Minimum',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Debt #4',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Debt4',
                            'label' => 'Balance #4',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '6000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'r4',
                            'label' => 'Interest rate #4',
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
                            'name' => 'Pmt4',
                            'label' => 'Payment #4',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '80',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 't4',
                            'label' => 'Payment type #4',
                            'type' => 'select',
                            'options' => ['Fixed' => '1', 'Minimum' => '2'],
                            'dataset' => 't4',
                            'default' => 'Minimum',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Debt #5',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Debt5',
                            'label' => 'Balance #5',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '3500',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'r5',
                            'label' => 'Interest rate #5',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '16',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Pmt5',
                            'label' => 'Payment #5',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '65',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 't5',
                            'label' => 'Payment type #5',
                            'type' => 'select',
                            'options' => ['Fixed' => '1', 'Minimum' => '2'],
                            'dataset' => 't5',
                            'default' => 'Minimum',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Debt #6',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Debt6',
                            'label' => 'Balance #6',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '500',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'r6',
                            'label' => 'Interest rate #6',
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
                            'name' => 'Pmt6',
                            'label' => 'Payment #6',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '50',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 't6',
                            'label' => 'Payment type #6',
                            'type' => 'select',
                            'options' => ['Fixed' => '1', 'Minimum' => '2'],
                            'dataset' => 't6',
                            'default' => 'Minimum',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Debt consolidation loan',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ConAmount',
                            'label' => 'Amount to be consolidated',
                            'type' => 'select',
                            'options' => ['Total debt amount' => '1', 'Other amount' => '2'],
                            'dataset' => 'ConAmount',
                            'default' => 'Total debt amount',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ConLoan',
                            'label' => 'Loan amount',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '18000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rCon',
                            'label' => 'Interest rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '7.2',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'first_day', 'label' => 'First due date', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ConTerm',
                            'label' => 'Loan term',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrsmos',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '84',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ConFeePre',
                            'label' => 'Prepaid fee',
                            'type' => 'number',
                            'help' => 'Here you can add any upfront financing fee that you need to pay before originating the loan.',
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
                            'name' => 'ConFee',
                            'label' => 'Loaned fee',
                            'type' => 'number',
                            'help' => 'Here you can set any financing fee that rolled into your loan.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '0',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Borrowing details',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => '_upfrontFeeFlag == 1', 'text' => 'You need to pay an upfront fee of {{global.currencySymbol}}{{upfrontFeeValue.formattedValue}} for taking the consolidation loan.'],
                                ['when' => '_upfrontFeeFlag == 2', 'text' => 'You need to pay an upfront fee of {{global.currencySymbol}}{{upfrontFeeValue.formattedValue}} to consolidate your debts.'],
                                ['when' => '_partialCoverageFlag == 1', 'text' => <<<'TXT'
                                As the consolidation loan only partially covers your debt, you need to finance {{global.currencySymbol}}{{partialCoverageValue.formattedValue}} in out of pocket expenses to consolidate your total debt.
                                TXT],
                                ['when' => '_partialCoverageFeeFlag == 1', 'text' => 'Besides, you need to pay an upfront fee of {{global.currencySymbol}}{{partialCoverageFeeValue.formattedValue}} for taking the consolidation loan.'],
                                ['when' => '_cashFlowFlag == 1', 'text' => <<<'TXT'
                                Since the consolidation loan exceeds your total debt amount, you would receive an upfront cash flow of {{global.currencySymbol}}{{cashFlowValue.formattedValue}} after making the transaction.
                                TXT],
                                ['when' => '_cashFlowFeeFlag == 1', 'text' => 'However, you need to pay an upfront fee of {{global.currencySymbol}}{{cashFlowFeeValue.formattedValue}} for taking the consolidation loan.'],
                                ['when' => '_aprComparisonFlag == 1', 'text' => <<<'TXT'
                                Since your consolidation loan's APR is higher than the estimated one for your total debts (APR of {{aprComparisonDebtAPR.formattedValue}}% vs. {{aprComparisonConAPR.formattedValue}}%), it's more expensive to consolidate your debts with the given loan from the perspective of cost of borrowing.
                                TXT],
                                ['when' => '_aprComparisonFlag == 2', 'text' => <<<'TXT'
                                Since your consolidation loan's APR is lower than the estimated one for your total debts (APR of {{aprComparisonDebtAPR.formattedValue}}% vs. {{aprComparisonConAPR.formattedValue}}%), it's cheaper to consolidate your debts with the given loan from the perspective of cost of borrowing.
                                TXT],
                                ['when' => '_aprComparisonFlag == 3', 'text' => <<<'TXT'
                                Since your total debt has about the same APR as the consolidation loan (both APRs are {{aprComparisonConAPR.formattedValue}}%), it doesn't make a significant financial difference to consolidate your debts with the given loan.
                                TXT],
                                ['when' => '_pmtComparisonFlag == 1', 'text' => 'Your monthly payments would be {{global.currencySymbol}}{{pmtComparisonDiff.formattedValue}} more if you consolidated your debts.'],
                                ['when' => '_pmtComparisonFlag == 2', 'text' => 'Your monthly payments would be {{global.currencySymbol}}{{pmtComparisonDiff.formattedValue}} less if you consolidated your debts.'],
                                ['when' => '_pmtComparisonFlag == 3', 'text' => 'Your monthly payments would be the same if you consolidated your debts.'],
                                ['when' => '_pmtComparisonFlag == 4', 'text' => 'Your monthly payments would be set to {{global.currencySymbol}}{{pmtComparisonValue.formattedValue}} if you consolidated your debts.'],
                                ['when' => '_termInterestFlag == 1', 'text' => <<<'TXT'
                                Besides, you would have {{termInterestTermDiff.formattedValue}} more time to repay your debt with the consolidation loan, but the charged interest would be {{global.currencySymbol}}{{termInterestIntDiff.formattedValue}} more.&nbsp;
                                TXT],
                                ['when' => '_termInterestFlag == 2', 'text' => <<<'TXT'
                                Besides, you would have {{termInterestTermDiff.formattedValue}} less time to repay your debt with the consolidation loan, and the charged interest would be {{global.currencySymbol}}{{termInterestIntDiff.formattedValue}} less.&nbsp;
                                TXT],
                                ['when' => '_termInterestFlag == 3', 'text' => <<<'TXT'
                                Besides, you would have {{termInterestTermDiff.formattedValue}} more time to repay your debt with the consolidation loan, but the charged interest would be {{global.currencySymbol}}{{termInterestIntDiff.formattedValue}} less.&nbsp;
                                TXT],
                                ['when' => '_termInterestFlag == 4', 'text' => <<<'TXT'
                                Besides, you would have {{termInterestTermDiff.formattedValue}} less time to repay your debt with the consolidation loan, and the charged interest would be {{global.currencySymbol}}{{termInterestIntDiff.formattedValue}} more.&nbsp;
                                TXT],
                                ['when' => '_termInterestFlag == 5', 'text' => <<<'TXT'
                                Besides, you would have the same time to repay your debt with the consolidation loan, but the charged interest would be {{global.currencySymbol}}{{termInterestIntDiff.formattedValue}} less.&nbsp;
                                TXT],
                                ['when' => '_termInterestFlag == 6', 'text' => <<<'TXT'
                                Besides, you would have the same time to repay your debt with the consolidation loan, but the charged interest would be {{global.currencySymbol}}{{termInterestIntDiff.formattedValue}} more.
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
                                ['when' => 'PmtType != 1', 'text' => 'If any of your debts require fixed payments, the APR is estimated by weighted average procedure.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Test values (Hidden)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'TotalDebt',
                            'label' => 'Total debt',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarDebt',
                            'label' => 'Vardebt',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarConAmount',
                            'label' => 'Varconamount',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Represent',
                            'label' => 'Display',
                            'type' => 'select',
                            'options' => ['Chart of balances' => '11', 'Table of payment schedule' => '12', 'Both' => '13'],
                            'dataset' => 'Represent',
                            'control' => 'DROPDOWN',
                            'default' => 'Chart of balances',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarRep',
                            'label' => 'Varrep',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'TabSel',
                            'label' => 'Show schedule for',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarTabSel',
                            'label' => 'Vartabsel',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarT1',
                            'label' => 'Vart1',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarT2',
                            'label' => 'Vart2',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarT3',
                            'label' => 'Vart3',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarT4',
                            'label' => 'Vart4',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarT5',
                            'label' => 'Vart5',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarT6',
                            'label' => 'Vart6',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Static Table Values (hidden)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'debtConsolidation',
                            'label' => 'Debt consolidation',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => '_DebtTotal',
                            'label' => 'Debt total',
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
                            'name' => '_DebtAPR',
                            'label' => 'Debt apr',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => '_IntPaid',
                            'label' => 'Int paid',
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
                            'name' => '_IntPaidCon',
                            'label' => 'Int paid con',
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
                            'name' => '_PmtMonthCon',
                            'label' => 'Pmt month con',
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
                            'name' => '_PmtMonthRes',
                            'label' => 'Pmt month res',
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
                            'name' => '_TermCon',
                            'label' => 'Term con',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrsmos',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => '_TermDebt',
                            'label' => 'Term debt',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrsmos',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => '_TotalPaid',
                            'label' => 'Total paid',
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
                            'name' => '_TotalPaidCon',
                            'label' => 'Total paid con',
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
                            'name' => '_conAPR',
                            'label' => 'Con apr',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => '_conLoan',
                            'label' => 'Con loan',
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
                            'name' => '_aprComparisonFlag',
                            'label' => 'Apr comparison flag',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => '_cashFlowFeeFlag',
                            'label' => 'Cash flow fee flag',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => '_cashFlowFlag',
                            'label' => 'Cash flow flag',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => '_partialCoverageFeeFlag',
                            'label' => 'Partial coverage fee flag',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => '_partialCoverageFlag',
                            'label' => 'Partial coverage flag',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => '_pmtComparisonFlag',
                            'label' => 'Pmt comparison flag',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => '_termInterestFlag',
                            'label' => 'Term interest flag',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => '_upfrontFeeFlag',
                            'label' => 'Upfront fee flag',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'TotalDebt = getTotalDebt(Debt1, Debt2, Debt3, Debt4, Debt5, Debt6, VarDebt)',
            'results' => ['TotalDebt' => 'getTotalDebt(Debt1, Debt2, Debt3, Debt4, Debt5, Debt6, VarDebt)'],
        ],
        [
            'title' => <<<'TXT'
            debtConsolidation = _CalculateDebtConsolidation(Debt1, Debt2, Debt3, Debt4, Debt5, Debt6, Pmt1, Pmt2, Pmt3, Pmt4, Pmt5, Pmt6, r1, r2, r3, r4, r5, r6, VarT1, VarT2, VarT3, VarT4, VarT5, VarT6, first_day, VarDebt, VarPmtType, VarConAmount, VarRep, ConLoan, ConFee, ConFeePre, rCon, ConTerm)
            TXT,
            'results' => ['debtConsolidation' => <<<'TXT'
            _CalculateDebtConsolidation(Debt1, Debt2, Debt3, Debt4, Debt5, Debt6, Pmt1, Pmt2, Pmt3, Pmt4, Pmt5, Pmt6, r1, r2, r3, r4, r5, r6, VarT1, VarT2, VarT3, VarT4, VarT5, VarT6, first_day, VarDebt, VarPmtType, VarConAmount, VarRep, ConLoan, ConFee, ConFeePre, rCon, ConTerm)
            TXT],
        ],
        [
            'title' => '_DebtTotal = getDebtTotal()',
            'results' => ['_DebtTotal' => 'getDebtTotal()'],
        ],
        [
            'title' => '_conLoan = getConLoan()',
            'results' => ['_conLoan' => 'getConLoan()'],
        ],
        [
            'title' => '_DebtAPR = getDebtAPR()',
            'results' => ['_DebtAPR' => 'getDebtAPR()'],
        ],
        [
            'title' => '_conAPR = getConAPR()',
            'results' => ['_conAPR' => 'getConAPR()'],
        ],
        [
            'title' => '_PmtMonthRes = getPmtMonthRes()',
            'results' => ['_PmtMonthRes' => 'getPmtMonthRes()'],
        ],
        [
            'title' => '_PmtMonthCon = getPmtMonthCon()',
            'results' => ['_PmtMonthCon' => 'getPmtMonthCon()'],
        ],
        [
            'title' => '_TermDebt = getTermDebt()',
            'results' => ['_TermDebt' => 'getTermDebt()'],
        ],
        [
            'title' => '_TermCon = getTermCon()',
            'results' => ['_TermCon' => 'getTermCon()'],
        ],
        [
            'title' => '_TotalPaid = getTotalPaid()',
            'results' => ['_TotalPaid' => 'getTotalPaid()'],
        ],
        [
            'title' => '_TotalPaidCon = getTotalPaidCon()',
            'results' => ['_TotalPaidCon' => 'getTotalPaidCon()'],
        ],
        [
            'title' => '_IntPaid = getIntPaid()',
            'results' => ['_IntPaid' => 'getIntPaid()'],
        ],
        [
            'title' => '_IntPaidCon = getIntPaidCon()',
            'results' => ['_IntPaidCon' => 'getIntPaidCon()'],
        ],
        [
            'title' => '_upfrontFeeFlag = getUpfrontFeeFlag()',
            'results' => ['_upfrontFeeFlag' => 'getUpfrontFeeFlag()'],
        ],
        [
            'title' => '_partialCoverageFlag = getPartialCoverageFlag()',
            'results' => ['_partialCoverageFlag' => 'getPartialCoverageFlag()'],
        ],
        [
            'title' => '_partialCoverageFeeFlag = getPartialCoverageFeeFlag()',
            'results' => ['_partialCoverageFeeFlag' => 'getPartialCoverageFeeFlag()'],
        ],
        [
            'title' => '_cashFlowFlag = getCashFlowFlag()',
            'results' => ['_cashFlowFlag' => 'getCashFlowFlag()'],
        ],
        [
            'title' => '_cashFlowFeeFlag = getCashFlowFeeFlag()',
            'results' => ['_cashFlowFeeFlag' => 'getCashFlowFeeFlag()'],
        ],
        [
            'title' => '_aprComparisonFlag = getAprComparisonFlag()',
            'results' => ['_aprComparisonFlag' => 'getAprComparisonFlag()'],
        ],
        [
            'title' => '_pmtComparisonFlag = getPmtComparisonFlag()',
            'results' => ['_pmtComparisonFlag' => 'getPmtComparisonFlag()'],
        ],
        [
            'title' => '_termInterestFlag = getTermInterestFlag()',
            'results' => ['_termInterestFlag' => 'getTermInterestFlag()'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("getTotalDebt",function(_Debt1,_Debt2,_Debt3,_Debt4,_Debt5,_Debt6,_VarDebt){var Debt1=Number(_Debt1);var Debt2=Number(_Debt2);var Debt3=Number(_Debt3);var Debt4=Number(_Debt4);var Debt5=Number(_Debt5);var Debt6=Number(_Debt6);var VarDebt=Number(_VarDebt);if(VarDebt===5){Debt6=0}if(VarDebt===4){Debt5=0;Debt6=0}if(VarDebt===3){Debt4=0;Debt5=0;Debt6=0}if(VarDebt===2){Debt3=0;Debt4=0;Debt5=0;Debt6=0}var TotalDebt=Debt1+Debt2+Debt3+Debt4+Debt5+Debt6;return TotalDebt});var milisecondsInADay=24*60*60*1000;var globalDebtTotal=0;var globalConLoan=0;var globalDebtAPR=0;var globalConAPR=0;var globalPmtMonth=0;var globalPmtMonthCon=0;var globalTotalPaid=0;var globalTotalPaidCon=0;var globalIntPaid=0;var globalIntPaidCon=0;var globalTermDebt=0;var globalTermCon=0;var globalPmtDiff=0;var globalUpfrontCashFlow=0;var globalOutOfPocketExpense=0;var globalDebtAPRLower=0;var globalDebtAPRHigher=0;var globalAPRsEqual=0;var globalPmtHigher=0;var globalPmtLower=0;var globalPmtEqual=0;var globalUpfrontFeeFlag=0;var globalPartialCoverageFlag=0;var globalPartialCoverageFeeFlag=0;var globalCashFlowFlag=0;var globalCashFlowFeeFlag=0;var globalAprComparisonFlag=0;var globalPmtComparisonFlag=0;var globalTermInterestFlag=0;var globalUpfrontFeeValue=0;var globalPartialCoverageValue=0;var globalPartialCoverageFeeValue=0;var globalCashFlowValue=0;var globalCashFlowFeeValue=0;var globalAprComparisonDebtAPR=0;var globalAprComparisonConAPR=0;var globalPmtComparisonDiff=0;var globalPmtComparisonValue=0;var globalTermInterestTermDiff="";var globalTermInterestIntDiff=0;omni.define("_CalculateDebtConsolidation",function(_Debt1,_Debt2,_Debt3,_Debt4,_Debt5,_Debt6,_Pmt1,_Pmt2,_Pmt3,_Pmt4,_Pmt5,_Pmt6,_r1,_r2,_r3,_r4,_r5,_r6,_VarT1,_VarT2,_VarT3,_VarT4,_VarT5,_VarT6,_first_day,_VarDebt,_VarPmtType,_VarConAmount,_VarRep,_ConLoan,_ConFee,_ConFeePre,_rCon,_ConTerm){var Debt1=Number(_Debt1)||0;var Debt2=Number(_Debt2)||0;var Debt3=Number(_Debt3)||0;var Debt4=Number(_Debt4)||0;var Debt5=Number(_Debt5)||0;var Debt6=Number(_Debt6)||0;var Pmt1=Number(_Pmt1)||0;var Pmt2=Number(_Pmt2)||0;var Pmt3=Number(_Pmt3)||0;var Pmt4=Number(_Pmt4)||0;var Pmt5=Number(_Pmt5)||0;var Pmt6=Number(_Pmt6)||0;var r1=Number(_r1)||0;var r2=Number(_r2)||0;var r3=Number(_r3)||0;var r4=Number(_r4)||0;var r5=Number(_r5)||0;var r6=Number(_r6)||0;var VarT1=Number(_VarT1)||1,VarT2=Number(_VarT2)||1,VarT3=Number(_VarT3)||1,VarT4=Number(_VarT4)||1,VarT5=Number(_VarT5)||1,VarT6=Number(_VarT6)||1;var first_day=Number(_first_day)||19261;var VarDebt=Number(_VarDebt)||3;var VarPmtType=Number(_VarPmtType)||1;var VarConAmount=Number(_VarConAmount)||1;var ConLoan=Number(_ConLoan)||0;var ConFee=Number(_ConFee)||0;var ConFeePre=Number(_ConFeePre)||0;var rCon=Number(_rCon)||0.072;var ConTerm=Number(_ConTerm)||84;var adjustedDebt3=Debt3,adjustedDebt4=Debt4,adjustedDebt5=Debt5,adjustedDebt6=Debt6;var adjustedPmt3=Pmt3,adjustedPmt4=Pmt4,adjustedPmt5=Pmt5,adjustedPmt6=Pmt6;var adjustedR3=r3,adjustedR4=r4,adjustedR5=r5,adjustedR6=r6;var adjustedDebt1=Debt1;var adjustedDebt2=Debt2;var adjustedPmt1=Pmt1;var adjustedPmt2=Pmt2;var adjustedR1=r1;var adjustedR2=r2;if(VarDebt===5){adjustedDebt6=0;adjustedPmt6=0;adjustedR6=0}if(VarDebt===4){adjustedDebt5=0;adjustedDebt6=0;adjustedPmt5=0;adjustedPmt6=0;adjustedR5=0;adjustedR6=0}if(VarDebt===3){adjustedDebt4=0;adjustedDebt5=0;adjustedDebt6=0;adjustedPmt4=0;adjustedPmt5=0;adjustedPmt6=0;adjustedR4=0;adjustedR5=0;adjustedR6=0}if(VarDebt===2){adjustedDebt3=0;adjustedDebt4=0;adjustedDebt5=0;adjustedDebt6=0;adjustedPmt3=0;adjustedPmt4=0;adjustedPmt5=0;adjustedPmt6=0;adjustedR3=0;adjustedR4=0;adjustedR5=0;adjustedR6=0}if(VarPmtType===1){VarT1=2;VarT2=2;VarT3=2;VarT4=2;VarT5=2;VarT6=2}if(VarPmtType===2){VarT1=1;VarT2=1;VarT3=1;VarT4=1;VarT5=1;VarT6=1}var debtTotal=adjustedDebt1+adjustedDebt2+adjustedDebt3+adjustedDebt4+adjustedDebt5+adjustedDebt6;if(VarConAmount===1){ConLoan=debtTotal}var periods=600;var q=12;var FirstDate=new Date(first_day*milisecondsInADay);var daysPassed=0;var daysInMonth,date,i,dd,mm;var pmtMonth=adjustedPmt1+adjustedPmt2+adjustedPmt3+adjustedPmt4+adjustedPmt5+adjustedPmt6;var princBal=debtTotal;var princBalOpen=0;var princMonth=0;var intMonth=0;var pmtModT=0;var pmtLast=0;var intPaid=0;var totalPaid=0;var debtPeriod=0;var int1=0;var int2=0;var int3=0;var int4=0;var int5=0;var int6=0;var bal1=adjustedDebt1;var bal2=adjustedDebt2;var bal3=adjustedDebt3;var bal4=adjustedDebt4;var bal5=adjustedDebt5;var bal6=adjustedDebt6;var balOpen1=0;var balOpen2=0;var balOpen3=0;var balOpen4=0;var balOpen5=0;var balOpen6=0;var princ1=0;var princ2=0;var princ3=0;var princ4=0;var princ5=0;var princ6=0;var pmtMod1=adjustedPmt1;var pmtMod2=adjustedPmt2;var pmtMod3=adjustedPmt3;var pmtMod4=adjustedPmt4;var pmtMod5=adjustedPmt5;var pmtMod6=adjustedPmt6;var pmtResT=0;var rHigst;var rAdj1=adjustedR1;var rAdj2=adjustedR2;var rAdj3=adjustedR3;var rAdj4=adjustedR4;var rAdj5=adjustedR5;var rAdj6=adjustedR6;var balOpenCon=0;var balCon=ConLoan+ConFee;var intCon=0;var princCon=0;var pmtModCon=0;var pmtMonthCon=0;var intPaidCon=0;var totalPaidCon=0;var monthlyRate=rCon/12;var numPayments=ConTerm;var factor=Math.pow(1+monthlyRate,numPayments);pmtMonthCon=balCon*monthlyRate*factor/(factor-1);var day,month,year;for(i=0;i<=periods;i++){date=new Date((first_day+daysPassed)*milisecondsInADay);day=FirstDate.getDate();month=date.getMonth();year=date.getFullYear();if(day<29&&month===0){daysInMonth=31}else if(day===29&&month===0){daysInMonth=30}else if(day===30&&month===0){daysInMonth=29}else if(day===31&&month===0){daysInMonth=28}else if(day<29&&month===1){daysInMonth=28}else if(day===29&&month===1){daysInMonth=29}else if(day===30&&month===1){daysInMonth=30}else if(day===31&&month===1){daysInMonth=31}else if(day<31&&month===2){daysInMonth=31}else if(day===31&&month===2){daysInMonth=30}else if(day<31&&month===3){daysInMonth=30}else if(day===31&&month===3){daysInMonth=31}else if(day<31&&month===4){daysInMonth=31}else if(day===31&&month===4){daysInMonth=30}else if(day<31&&month===5){daysInMonth=30}else if(day===31&&month===5){daysInMonth=31}else if(day<31&&month===6){daysInMonth=31}else if(day===31&&month===6){daysInMonth=31}else if(day<31&&month===7){daysInMonth=31}else if(day===31&&month===7){daysInMonth=30}else if(day<31&&month===8){daysInMonth=30}else if(day===31&&month===8){daysInMonth=31}else if(day<31&&month===9){daysInMonth=31}else if(day===31&&month===9){daysInMonth=30}else if(day<31&&month===10){daysInMonth=30}else if(day===31&&month===10){daysInMonth=31}else if(day<31&&month===11){daysInMonth=31}else if(day===31&&month===11){daysInMonth=31}if(year%4===0&&year%100!==0&&date.getMonth()===1||year%400===0&&month===1){daysInMonth=29}if(year%4===0&&year%100!==0&&month===0&&date.getDate()===30||year%400===0&&month===0&&date.getDate()===30){daysInMonth=30}if(year%4===0&&year%100!==0&&month===0&&date.getDate()===31||year%400===0&&month===0&&date.getDate()===31){daysInMonth=29}if(year%4===0&&year%100!==0&&month===0&&date.getDate()===29||year%400===0&&month===0&&date.getDate()===29){daysInMonth=31}if(date.getDate()===29&&date.getMonth()===1&&day>29){daysInMonth=30}if(date.getDate()===29&&date.getMonth()===1&&day>30){daysInMonth=31}if(date.getDate()===28&&date.getMonth()===1&&day>30){daysInMonth=31}if(i>0){daysPassed+=daysInMonth}dd=date.getDate();mm=date.getMonth()+1;if(dd<10){dd="0"+dd}if(mm<10){mm="0"+mm}balOpen1=bal1;balOpen2=bal2;balOpen3=bal3;balOpen4=bal4;balOpen5=bal5;balOpen6=bal6;princBalOpen=princBal;balOpenCon=balCon;if(i>0){int1=bal1*adjustedR1/q;int2=bal2*adjustedR2/q;int3=bal3*adjustedR3/q;int4=bal4*adjustedR4/q;int5=bal5*adjustedR5/q;int6=bal6*adjustedR6/q;intMonth=int1+int2+int3+int4+int5+int6;intCon=balOpenCon*rCon/q;if(balOpen1<pmtMod1){pmtMod1=balOpen1+int1}if(balOpen2<pmtMod2){pmtMod2=balOpen2+int2}if(balOpen3<pmtMod3){pmtMod3=balOpen3+int3}if(balOpen4<pmtMod4){pmtMod4=balOpen4+int4}if(balOpen5<pmtMod5){pmtMod5=balOpen5+int5}if(balOpen6<pmtMod6){pmtMod6=balOpen6+int6}if(princBalOpen!==0){pmtModT=pmtMod1+pmtMod2+pmtMod3+pmtMod4+pmtMod5+pmtMod6}if(balOpenCon<pmtModCon){pmtModCon=balOpenCon+intCon}else{pmtModCon=pmtMonthCon}pmtResT=pmtMonth-pmtModT;if(balOpen1<=pmtMod1||VarT1===1){rAdj1=0}if(balOpen2<=pmtMod2||VarT2===1){rAdj2=0}if(balOpen3<=pmtMod3||VarT3===1){rAdj3=0}if(balOpen4<=pmtMod4||VarT4===1){rAdj4=0}if(balOpen5<=pmtMod5||VarT5===1){rAdj5=0}if(balOpen6<=pmtMod6||VarT6===1){rAdj6=0}if(pmtResT>0){rHigst=Math.max(rAdj1,rAdj2,rAdj3,rAdj4,rAdj5,rAdj6);if(rHigst===rAdj1&&rHigst>0&&balOpen1>=pmtMod1+pmtResT){pmtMod1=pmtMod1+pmtResT}else if(rHigst===rAdj2&&rHigst>0&&balOpen2>=pmtMod2+pmtResT){pmtMod2=pmtMod2+pmtResT}else if(rHigst===rAdj3&&rHigst>0&&balOpen3>=pmtMod3+pmtResT){pmtMod3=pmtMod3+pmtResT}else if(rHigst===rAdj4&&rHigst>0&&balOpen4>=pmtMod4+pmtResT){pmtMod4=pmtMod4+pmtResT}else if(rHigst===rAdj5&&rHigst>0&&balOpen5>=pmtMod5+pmtResT){pmtMod5=pmtMod5+pmtResT}else if(rHigst===rAdj6&&rHigst>0&&balOpen6>=pmtMod6+pmtResT){pmtMod6=pmtMod6+pmtResT}}princ1=pmtMod1-int1;princ2=pmtMod2-int2;princ3=pmtMod3-int3;princ4=pmtMod4-int4;princ5=pmtMod5-int5;princ6=pmtMod6-int6;if(princBalOpen!==0){pmtModT=pmtMod1+pmtMod2+pmtMod3+pmtMod4+pmtMod5+pmtMod6}princMonth=pmtModT-intMonth;princCon=pmtMonthCon-intCon;bal1=bal1-princ1;bal2=bal2-princ2;bal3=bal3-princ3;bal4=bal4-princ4;bal5=bal5-princ5;bal6=bal6-princ6;princBal=princBal-princMonth;balCon=balCon-princCon}if(balOpen1<=0){balOpen1=0}if(balOpen2<=0){balOpen2=0}if(balOpen3<=0){balOpen3=0}if(balOpen4<=0){balOpen4=0}if(balOpen5<=0){balOpen5=0}if(balOpen6<=0){balOpen6=0}if(bal1<=0){bal1=0}if(bal2<=0){bal2=0}if(bal3<=0){bal3=0}if(bal4<=0){bal4=0}if(bal5<=0){bal5=0}if(bal6<=0){bal6=0}if(princ1<=0){princ1=0}if(princ2<=0){princ2=0}if(princ3<=0){princ3=0}if(princ4<=0){princ4=0}if(princ5<=0){princ5=0}if(princ6<=0){princ6=0}if(int1<=0){int1=0}if(int2<=0){int2=0}if(int3<=0){int3=0}if(int4<=0){int4=0}if(int5<=0){int5=0}if(int6<=0){int6=0}if(princBalOpen<=0){princBalOpen=0}if(princBal<=0){princBal=0}if(princMonth<=0){princMonth=0}if(intMonth<=0){intMonth=0}if(princBal<0.01){princMonth=princBalOpen}if(balOpenCon<=0){balOpenCon=0}if(balCon<=0){balCon=0}if(princCon<=0){princCon=0}if(intCon<=0){intCon=0}if(balCon<0.01){princCon=balOpenCon}intPaid+=intMonth;intPaidCon+=intCon;if(intMonth!==0){totalPaid+=pmtModT}if(intCon!==0){totalPaidCon+=pmtModCon}if(princBalOpen>0.0001&&princBal<0.0001){debtPeriod=i;pmtLast=pmtModT}}var MAX_ITERATIONS=5000;var MIN_PRECISION=1e-7;var debtAPR=0;var iteration=0;if(VarPmtType===1){var guess=(adjustedR1+adjustedR2+adjustedR3+adjustedR4+adjustedR5+adjustedR6)/VarDebt/12;var iOld;var iNew=guess;debtPeriod=debtPeriod-1+pmtLast/pmtMonth;do{iOld=iNew;var dividend=pmtMonth-pmtMonth*Math.pow(1+iNew,-debtPeriod)-iNew*debtTotal;var divisor=pmtMonth*debtPeriod*Math.pow(1+iNew,-debtPeriod-1)-debtTotal;iNew=iNew-dividend/divisor;++iteration}while(Math.abs(iOld-iNew)>MIN_PRECISION&&iteration<=MAX_ITERATIONS);debtAPR=iNew*q*100}else{var rWeight=(adjustedDebt1*adjustedR1+adjustedDebt2*adjustedR2+adjustedDebt3*adjustedR3+adjustedDebt4*adjustedR4+adjustedDebt5*adjustedR5+adjustedDebt6*adjustedR6)/debtTotal;debtAPR=rWeight*100}var conAPR=0;var guessCon=rCon/12;var iOldCon;var iNewCon=guessCon;var conPeriod=ConTerm;do{iOldCon=iNewCon;var dividendCon=pmtMonthCon-pmtMonthCon*Math.pow(1+iNewCon,-conPeriod)-iNewCon*(ConLoan-ConFeePre);var divisorCon=pmtMonthCon*conPeriod*Math.pow(1+iNewCon,-conPeriod-1)-(ConLoan-ConFeePre);iNewCon=iNewCon-dividendCon/divisorCon;++iteration}while(Math.abs(iOldCon-iNewCon)>MIN_PRECISION&&iteration<=MAX_ITERATIONS);conAPR=iNewCon*q*100;var yearDebt=parseInt(Math.trunc(debtPeriod/12));var monthDebt=parseInt(Math.ceil(debtPeriod-yearDebt*12));var yearCon=parseInt(Math.trunc(conPeriod/12));var monthCon=parseInt(Math.ceil(conPeriod-yearCon*12));var DiffPeriod=Math.abs(Math.ceil(debtPeriod)-Math.ceil(conPeriod));var intDiff=Math.abs(intPaid-intPaidCon);var pmtDiff=Math.abs(pmtMonthCon-pmtMonth);var yearDiff=parseInt(Math.trunc(DiffPeriod/12));var monthDiff=parseInt(Math.ceil(DiffPeriod-yearDiff*12));var termDiff="";if(yearDiff===1&&monthDiff===0){termDiff=yearDiff+" year"}if(yearDiff>1&&monthDiff===0){termDiff=yearDiff+" years"}if(yearDiff===0&&monthDiff===1){termDiff=monthDiff+" month"}if(yearDiff===0&&monthDiff>1){termDiff=monthDiff+" months"}if(yearDiff===1&&monthDiff===1){termDiff=yearDiff+" year and "+monthDiff+" month"}if(yearDiff>1&&monthDiff===1){termDiff=yearDiff+" years and "+monthDiff+" month"}if(yearDiff===1&&monthDiff>1){termDiff=yearDiff+" year and "+monthDiff+" months"}if(yearDiff>1&&monthDiff>1){termDiff=yearDiff+" years and "+monthDiff+" months"}if(yearDebt===1&&monthDebt===0){}if(yearDebt>1&&monthDebt===0){}if(yearDebt===0&&monthDebt===1){}if(yearDebt===0&&monthDebt>1){}if(yearDebt===1&&monthDebt===1){}if(yearDebt>1&&monthDebt===1){}if(yearDebt===1&&monthDebt>1){}if(yearDebt>1&&monthDebt>1){}if(yearCon===1&&monthCon===0){}if(yearCon>1&&monthCon===0){}if(yearCon===0&&monthCon===1){}if(yearCon===0&&monthCon>1){}if(yearCon===1&&monthCon===1){}if(yearCon>1&&monthCon===1){}if(yearCon===1&&monthCon>1){}if(yearCon>1&&monthCon>1){}if(yearDiff===1&&monthDiff===0){termDiff=yearDiff+" year"}if(yearDiff>1&&monthDiff===0){termDiff=yearDiff+" years"}if(yearDiff===0&&monthDiff===1){termDiff=monthDiff+" month"}if(yearDiff===0&&monthDiff>1){termDiff=monthDiff+" months"}if(yearDiff===1&&monthDiff===1){termDiff=yearDiff+" year and "+monthDiff+" month"}if(yearDiff>1&&monthDiff===1){termDiff=yearDiff+" years and "+monthDiff+" month"}if(yearDiff===1&&monthDiff>1){termDiff=yearDiff+" year and "+monthDiff+" months"}if(yearDiff>1&&monthDiff>1){termDiff=yearDiff+" years and "+monthDiff+" months"}globalDebtTotal=debtTotal;globalConLoan=ConLoan+ConFee;globalDebtAPR=Math.round(debtAPR*1000)/1000;globalConAPR=Math.round(conAPR*1000)/1000;globalPmtMonth=Math.round(pmtMonth*100)/100;globalPmtMonthCon=Math.round(pmtMonthCon*100)/100;globalTotalPaid=Math.round(totalPaid*100)/100;globalTotalPaidCon=Math.round((totalPaidCon+ConFee)*100)/100;globalIntPaid=Math.round(intPaid*100)/100;globalIntPaidCon=Math.round(intPaidCon*100)/100;globalTermDebt=Math.ceil(debtPeriod);globalTermCon=conPeriod;globalPmtDiff=Math.round(pmtDiff*100)/100;globalUpfrontCashFlow=ConLoan>debtTotal?Math.round((ConLoan-debtTotal)*100)/100:0;globalOutOfPocketExpense=ConLoan<debtTotal?Math.round((debtTotal-ConLoan)*100)/100:0;var roundedDebtAPR=Math.round(debtAPR*100)/100;var roundedConAPR=Math.round(conAPR*100)/100;globalDebtAPRLower=roundedDebtAPR<roundedConAPR?1:0;globalDebtAPRHigher=roundedDebtAPR>roundedConAPR?1:0;globalAPRsEqual=roundedDebtAPR===roundedConAPR?1:0;if(VarPmtType===1){globalPmtHigher=pmtMonthCon>pmtMonth?1:0;globalPmtLower=pmtMonthCon<pmtMonth?1:0;globalPmtEqual=pmtMonthCon===pmtMonth?1:0}else{globalPmtHigher=0;globalPmtLower=0;globalPmtEqual=0}if(VarConAmount===2&&ConLoan===debtTotal&&ConFeePre!==0){globalUpfrontFeeFlag=1;globalUpfrontFeeValue=ConFeePre}else if(VarConAmount===1&&ConFeePre>0){globalUpfrontFeeFlag=2;globalUpfrontFeeValue=ConFeePre}if(VarConAmount===2&&ConLoan<debtTotal){globalPartialCoverageFlag=1;globalPartialCoverageValue=globalOutOfPocketExpense;if(ConFeePre!==0){globalPartialCoverageFeeFlag=1;globalPartialCoverageFeeValue=ConFeePre}}if(VarConAmount===2&&ConLoan>debtTotal){globalCashFlowFlag=1;globalCashFlowValue=globalUpfrontCashFlow;if(ConFeePre!==0){globalCashFlowFeeFlag=1;globalCashFlowFeeValue=ConFeePre}}if(globalDebtAPRLower){var displayDebtAPR=Math.round(globalDebtAPR*100)/100;globalAprComparisonFlag=1;globalAprComparisonDebtAPR=displayDebtAPR;globalAprComparisonConAPR=globalConAPR}else if(globalDebtAPRHigher){var _displayDebtAPR=Math.round(globalDebtAPR*100)/100;globalAprComparisonFlag=2;globalAprComparisonDebtAPR=_displayDebtAPR;globalAprComparisonConAPR=globalConAPR}else if(globalAPRsEqual){globalAprComparisonFlag=3;globalAprComparisonConAPR=globalConAPR}if(globalPmtHigher&&VarPmtType===1){globalPmtComparisonFlag=1;globalPmtComparisonDiff=globalPmtDiff}else if(globalPmtLower&&VarPmtType===1){globalPmtComparisonFlag=2;globalPmtComparisonDiff=globalPmtDiff}else if(globalPmtEqual&&VarPmtType===1){globalPmtComparisonFlag=3}else if(VarPmtType!==1){globalPmtComparisonFlag=4;globalPmtComparisonValue=globalPmtMonthCon}if(Math.ceil(debtPeriod)<Math.ceil(conPeriod)&&intPaid<intPaidCon){globalTermInterestFlag=1;globalTermInterestTermDiff=termDiff;globalTermInterestIntDiff=Math.round(intDiff*100)/100}else if(Math.ceil(debtPeriod)>Math.ceil(conPeriod)&&intPaid>intPaidCon){globalTermInterestFlag=2;globalTermInterestTermDiff=termDiff;globalTermInterestIntDiff=Math.round(intDiff*100)/100}else if(Math.ceil(debtPeriod)<Math.ceil(conPeriod)&&intPaid>intPaidCon){globalTermInterestFlag=3;globalTermInterestTermDiff=termDiff;globalTermInterestIntDiff=Math.round(intDiff*100)/100}else if(Math.ceil(debtPeriod)>Math.ceil(conPeriod)&&intPaid<intPaidCon){globalTermInterestFlag=4;globalTermInterestTermDiff=termDiff;globalTermInterestIntDiff=Math.round(intDiff*100)/100}else if(Math.ceil(debtPeriod)===Math.ceil(conPeriod)&&intPaid>intPaidCon){globalTermInterestFlag=5;globalTermInterestIntDiff=Math.round(intDiff*100)/100}else if(Math.ceil(debtPeriod)===Math.ceil(conPeriod)&&intPaid<intPaidCon){globalTermInterestFlag=6;globalTermInterestIntDiff=Math.round(intDiff*100)/100}return 1});omni.onResult(["debtConsolidation"],function(ctx){ctx.exportValue("upfrontFeeValue",globalUpfrontFeeValue);ctx.exportValue("partialCoverageValue",globalPartialCoverageValue);ctx.exportValue("partialCoverageFeeValue",globalPartialCoverageFeeValue);ctx.exportValue("cashFlowValue",globalCashFlowValue);ctx.exportValue("cashFlowFeeValue",globalCashFlowFeeValue);ctx.exportValue("aprComparisonDebtAPR",globalAprComparisonDebtAPR);ctx.exportValue("aprComparisonConAPR",globalAprComparisonConAPR);ctx.exportValue("pmtComparisonDiff",globalPmtComparisonDiff);ctx.exportValue("pmtComparisonValue",globalPmtComparisonValue);ctx.exportValue("termInterestTermDiff",globalTermInterestTermDiff);ctx.exportValue("termInterestIntDiff",globalTermInterestIntDiff)});omni.define("getDebtTotal",function(){return globalDebtTotal});omni.define("getConLoan",function(){return globalConLoan});omni.define("getDebtAPR",function(){return globalDebtAPR});omni.define("getConAPR",function(){return globalConAPR});omni.define("getPmtMonthRes",function(){return globalPmtMonth});omni.define("getPmtMonthCon",function(){return globalPmtMonthCon});omni.define("getTermDebt",function(){return globalTermDebt});omni.define("getTermCon",function(){return globalTermCon});omni.define("getTotalPaid",function(){return globalTotalPaid});omni.define("getTotalPaidCon",function(){return globalTotalPaidCon});omni.define("getIntPaid",function(){return globalIntPaid});omni.define("getIntPaidCon",function(){return globalIntPaidCon});omni.define("getUpfrontFeeFlag",function(){return globalUpfrontFeeFlag});omni.define("getPartialCoverageFlag",function(){return globalPartialCoverageFlag});omni.define("getPartialCoverageFeeFlag",function(){return globalPartialCoverageFeeFlag});omni.define("getCashFlowFlag",function(){return globalCashFlowFlag});omni.define("getCashFlowFeeFlag",function(){return globalCashFlowFeeFlag});omni.define("getAprComparisonFlag",function(){return globalAprComparisonFlag});omni.define("getPmtComparisonFlag",function(){return globalPmtComparisonFlag});omni.define("getTermInterestFlag",function(){return globalTermInterestFlag});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Debt consolidation turns Number of debts, Type of payments and Balance #1 into Varpmttype and Vardebt. There is no hidden constant here: change varpmttype and number of debts moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Debt consolidation calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Debt consolidation: it takes 58 numbers and reports Varpmttype, Vardebt and Varconamount.</p><p>The relationship it solves reads Total debt = getTotalDebt(Balance #1, Balance #2, Balance #3, Balance #4, Balance #5, Balance #6, Vardebt).</p><p>The result panel carries Varpmttype, Vardebt, Varconamount and Varrep, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 58 boxes and the page has everything it needs.</p><ul><li><strong>Number of debts</strong> — a plain number, no unit. Set the number of debts you would like to consolidate.</li><li><strong>Type of payments</strong> — a plain number, no unit. Monthly minimum payments means that you can increase your payments at any time. In contrast, when your payments are fixed, you cannot change the payment amount.</li><li><strong>Balance #1</strong> — in USD</li><li><strong>Interest rate #1</strong> — in percent</li><li><strong>Payment #1</strong> — in USD</li><li><strong>Payment type #1</strong> — a plain number, no unit</li><li><strong>Balance #2</strong> — in USD</li><li><strong>Interest rate #2</strong> — in percent</li><li><strong>Payment #2</strong> — in USD</li><li><strong>Payment type #2</strong> — a plain number, no unit</li><li><strong>Balance #3</strong> — in USD</li><li><strong>Interest rate #3</strong> — in percent</li><li><strong>Payment #3</strong> — in USD</li><li><strong>Payment type #3</strong> — a plain number, no unit</li><li><strong>Balance #4</strong> — in USD</li><li><strong>Interest rate #4</strong> — in percent</li><li><strong>Payment #4</strong> — in USD</li><li><strong>Payment type #4</strong> — a plain number, no unit</li><li><strong>Balance #5</strong> — in USD</li><li><strong>Interest rate #5</strong> — in percent</li><li><strong>Payment #5</strong> — in USD</li><li><strong>Payment type #5</strong> — a plain number, no unit</li><li><strong>Balance #6</strong> — in USD</li><li><strong>Interest rate #6</strong> — in percent</li><li><strong>Payment #6</strong> — in USD</li><li><strong>Payment type #6</strong> — a plain number, no unit</li><li><strong>Amount to be consolidated</strong> — a plain number, no unit</li><li><strong>Loan amount</strong> — in USD</li><li><strong>Interest rate</strong> — in percent</li><li><strong>First due date</strong> — a plain number, no unit, entered as a date</li><li><strong>Loan term</strong> — in years / months</li><li><strong>Prepaid fee</strong> — in USD. Here you can add any upfront financing fee that you need to pay before originating the loan.</li><li><strong>Loaned fee</strong> — in USD. Here you can set any financing fee that rolled into your loan.</li><li><strong>Total debt</strong> — a plain number, no unit</li><li><strong>Display</strong> — a plain number, no unit</li><li><strong>Show schedule for</strong> — a plain number, no unit</li><li><strong>Vartabsel</strong> — a plain number, no unit</li><li><strong>Debt consolidation</strong> — a plain number, no unit</li><li><strong>Debt total</strong> — in USD</li><li><strong>Debt apr</strong> — a plain number, no unit</li><li><strong>Int paid</strong> — in USD</li><li><strong>Int paid con</strong> — in USD</li><li><strong>Pmt month con</strong> — in USD</li><li><strong>Pmt month res</strong> — in USD</li><li><strong>Term con</strong> — in years / months</li><li><strong>Term debt</strong> — in years / months</li><li><strong>Total paid</strong> — in USD</li><li><strong>Total paid con</strong> — in USD</li><li><strong>Con apr</strong> — a plain number, no unit</li><li><strong>Con loan</strong> — in USD</li><li><strong>Apr comparison flag</strong> — a plain number, no unit</li><li><strong>Cash flow fee flag</strong> — a plain number, no unit</li><li><strong>Cash flow flag</strong> — a plain number, no unit</li><li><strong>Partial coverage fee flag</strong> — a plain number, no unit</li><li><strong>Partial coverage flag</strong> — a plain number, no unit</li><li><strong>Pmt comparison flag</strong> — a plain number, no unit</li><li><strong>Term interest flag</strong> — a plain number, no unit</li><li><strong>Upfront fee flag</strong> — a plain number, no unit</li></ul><p>The answers come back as Varpmttype, Vardebt, Varconamount, Varrep, Vart1, Vart2, Vart3, Vart4, Vart5, Vart6. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Interest rate #1 offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Total debt</strong> = <code>getTotalDebt(Balance #1, Balance #2, Balance #3, Balance #4, Balance #5, Balance #6, Vardebt)</code></li><li><strong>Debt total</strong> = <code>getDebtTotal()</code></li><li><strong>Con loan</strong> = <code>getConLoan()</code></li><li><strong>Debt apr</strong> = <code>getDebtAPR()</code></li><li><strong>Con apr</strong> = <code>getConAPR()</code></li><li><strong>Pmt month res</strong> = <code>getPmtMonthRes()</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Total debt</strong> = <code>getTotalDebt(Balance #1, Balance #2, Balance #3, Balance #4, Balance #5, Balance #6, Vardebt)</code> — the form to use when Balance #1, Balance #2, Balance #3 and Balance #4 are the values you have.</li><li><strong>Debt total</strong> = <code>getDebtTotal()</code> — the form to use when the other values are known.</li><li><strong>Con loan</strong> = <code>getConLoan()</code> — the form to use when the other values are known.</li><li><strong>Debt apr</strong> = <code>getDebtAPR()</code> — the form to use when the other values are known.</li><li><strong>Con apr</strong> = <code>getConAPR()</code> — the form to use when the other values are known.</li><li><strong>Pmt month res</strong> = <code>getPmtMonthRes()</code> — the form to use when the other values are known.</li><li><strong>Pmt month con</strong> = <code>getPmtMonthCon()</code> — the form to use when the other values are known.</li><li><strong>Term debt</strong> = <code>getTermDebt()</code> — the form to use when the other values are known.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Total debt, Debt consolidation and Debt total can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Interest rate #1, Interest rate #2 and Interest rate #3 is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Varpmttype, Vardebt and Varconamount are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Number of debts left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Number of debts is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Type of payments left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Type of payments is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Number of debts to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Number of debts, Type of payments, Balance #1 and Interest rate #1 ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Number of debts — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Varpmttype against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Varpmttype follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and years / months and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It counts in whole days.</strong> Dates are compared as calendar days, not as moments: two dates that differ by a few hours on the same day give the same answer, and there is no time-of-day input to set.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Number of debts, Type of payments and Balance #1 are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Number of debts, Type of payments and Balance #1 is what you already know and Varpmttype and Vardebt is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/price-per-sqft">Price per square foot Calculator</a>, <a href="/finance/price-per-square-meter">Price per square meter Calculator</a> and <a href="/finance/price-to-book-ratio">Price to book ratio Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Debt consolidation is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Debt consolidation is a number to act on, so the useful question is what to do with Varpmttype, Vardebt and Varconamount once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Number of debts, Type of payments, Balance #1 and Interest rate #1 alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Debt consolidation calculator work out?', 'a' => <<<'TXT'
            Varpmttype, Vardebt, Varconamount and Varrep, from Balance #1, Balance #2, Balance #3 and Balance #4. The relationship is Total debt = getTotalDebt(Balance #1, Balance #2, Balance #3, Balance #4, Balance #5, Balance #6, Vardebt).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Number of debts, Type of payments, Balance #1 (USD), Interest rate #1 (percent), Payment #1 (USD). With number of debts, type of payments and balance #1 in place, Varpmttype can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Total debt, Debt consolidation, Debt total and Con loan can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Varpmttype is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Number of debts blank and the page solves for it, reporting Varpmttype instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Varpmttype keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/price-per-sqft', 'name' => 'Price per square foot Calculator'],
            ['path' => '/finance/price-per-square-meter', 'name' => 'Price per square meter Calculator'],
            ['path' => '/finance/price-to-book-ratio', 'name' => 'Price to book ratio Calculator'],
        ],
        'authors' => [],
    ],
];
