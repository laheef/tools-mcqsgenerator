<?php

/**
 * Debt
 * /finance/debt
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Debt',
    'meta' => ['title' => 'Debt Calculator — Free, With Worked Examples', 'description' => 'Debt turns number of debts, balance #1 and interest rate #1 into total debt and monthly payment. Every box can be solved for, not only the one in the title.', 'h1' => 'Debt Calculator', 'updated' => '2026-09-27'],
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
                            'dataset' => 'debts',
                            'control' => 'DROPDOWN',
                            'default' => 'Two',
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
                            'min' => 2,
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
                            'default' => '6.2',
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
                            'min' => 2,
                            'default' => '120',
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
                            'min' => 2,
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
                            'default' => '18.2',
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
                            'min' => 2,
                            'default' => '220',
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
                            'min' => 2,
                            'default' => '2200',
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
                            'default' => '3.2',
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
                            'min' => 2,
                            'default' => '200',
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
                            'min' => 2,
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
                            'min' => 2,
                            'default' => '80',
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
                            'min' => 2,
                            'default' => '65',
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
                            'min' => 2,
                            'default' => '50',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Consolidation loan',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rCon',
                            'label' => 'Interest rate',
                            'type' => 'number',
                            'help' => 'Relevant only if you would like to consider loan consolidation as well.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '9.5',
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
                            'help' => 'You can add an upfront financing fee or closing fee for any of your current debts that you need to pay before originating the loan.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '200',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Debt summary',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'TotalDebt',
                            'label' => 'Total debt',
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
                            'name' => 'TotalPmt',
                            'label' => 'Monthly payment',
                            'type' => 'number',
                            'help' => 'Note, that if you keep paying the required minimum, your monthly payments will gradually decrease as you pay off your debt.',
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
                        ['type' => 'note', 'text' => 'The monthly payments need to be larger, or the interest rate of the consolidation loan needs to be smaller, to make the calculator work.'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Table data',
            'note' => 'to be hidden',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'debtAPR',
                            'label' => 'Debt apr',
                            'type' => 'number',
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
                            'name' => 'minInterest',
                            'label' => 'Min interest',
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
                            'name' => 'minPayoffAfter',
                            'label' => 'Min payoff after',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'mos',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'snowballAPR',
                            'label' => 'Snowball apr',
                            'type' => 'number',
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
                            'name' => 'snowballInterest',
                            'label' => 'Snowball interest',
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
                            'name' => 'snowballPayoffAfter',
                            'label' => 'Snowball payoff after',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'mos',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'avalancheAPR',
                            'label' => 'Avalanche apr',
                            'type' => 'number',
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
                            'name' => 'avalancheInterest',
                            'label' => 'Avalanche interest',
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
                            'name' => 'avalanchePayoffAfter',
                            'label' => 'Avalanche payoff after',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'mos',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'consolidationAPR',
                            'label' => 'Consolidation apr',
                            'type' => 'number',
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
                            'name' => 'consolidationInterest',
                            'label' => 'Consolidation interest',
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
                            'name' => 'consolidationPayoffAfter',
                            'label' => 'Consolidation payoff after',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'mos',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Hidden variables',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PmtType',
                            'label' => 'Type of payments',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            The monthly minimum payment means that you can increase your payments at any time. In contrast, when your payments are fixed, you cannot change the payment amount.
                            TXT,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarPmtType',
                            'label' => 'Varpmttype',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 't1',
                            'label' => 'Payment type #1',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 't2',
                            'label' => 'Payment type #2',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 't3',
                            'label' => 'Payment type #3',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 't4',
                            'label' => 'Payment type #4',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 't5',
                            'label' => 'Payment type #5',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 't6',
                            'label' => 'Payment type #6',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ConAmount',
                            'label' => 'Amount to be consolidated',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
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
                            'min' => 2,
                            'default' => '18000.000000000000000',
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
                            'name' => 'ConTerm',
                            'label' => 'Loan term',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrsmos',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '84.000000000000000',
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
                            'help' => 'Here you can set any financing fee that\'s been rolled into your loan.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'TotalDebt = getTotalDebt(Debt1, Debt2, Debt3, Debt4, Debt5, Debt6, NumberDebts)',
            'results' => ['TotalDebt' => 'getTotalDebt(Debt1, Debt2, Debt3, Debt4, Debt5, Debt6, NumberDebts)'],
        ],
        [
            'title' => 'TotalPmt = getTotalPmt(Pmt1, Pmt2, Pmt3, Pmt4, Pmt5, Pmt6, NumberDebts)',
            'results' => ['TotalPmt' => 'getTotalPmt(Pmt1, Pmt2, Pmt3, Pmt4, Pmt5, Pmt6, NumberDebts)'],
        ],
        [
            'title' => 'debtAPR = getDebtAPR(NumberDebts, Debt1, r1, Pmt1, Debt2, r2, Pmt2, Debt3, r3, Pmt3, Debt4, r4, Pmt4, Debt5, r5, Pmt5, Debt6, r6, Pmt6, rCon, ConFeePre)',
            'results' => ['debtAPR' => 'getDebtAPR(NumberDebts, Debt1, r1, Pmt1, Debt2, r2, Pmt2, Debt3, r3, Pmt3, Debt4, r4, Pmt4, Debt5, r5, Pmt5, Debt6, r6, Pmt6, rCon, ConFeePre)'],
        ],
        [
            'title' => 'minInterest = getMinInterest(debtAPR)',
            'results' => ['minInterest' => 'getMinInterest(getDebtAPR(NumberDebts, Debt1, r1, Pmt1, Debt2, r2, Pmt2, Debt3, r3, Pmt3, Debt4, r4, Pmt4, Debt5, r5, Pmt5, Debt6, r6, Pmt6, rCon, ConFeePre))'],
        ],
        [
            'title' => 'minPayoffAfter = getMinPayoffAfter(debtAPR)',
            'results' => ['minPayoffAfter' => <<<'TXT'
            getMinPayoffAfter(getDebtAPR(NumberDebts, Debt1, r1, Pmt1, Debt2, r2, Pmt2, Debt3, r3, Pmt3, Debt4, r4, Pmt4, Debt5, r5, Pmt5, Debt6, r6, Pmt6, rCon, ConFeePre))
            TXT],
        ],
        [
            'title' => 'snowballAPR = getSnowballAPR(debtAPR)',
            'results' => ['snowballAPR' => 'getSnowballAPR(getDebtAPR(NumberDebts, Debt1, r1, Pmt1, Debt2, r2, Pmt2, Debt3, r3, Pmt3, Debt4, r4, Pmt4, Debt5, r5, Pmt5, Debt6, r6, Pmt6, rCon, ConFeePre))'],
        ],
        [
            'title' => 'snowballInterest = getSnowballInterest(debtAPR)',
            'results' => ['snowballInterest' => <<<'TXT'
            getSnowballInterest(getDebtAPR(NumberDebts, Debt1, r1, Pmt1, Debt2, r2, Pmt2, Debt3, r3, Pmt3, Debt4, r4, Pmt4, Debt5, r5, Pmt5, Debt6, r6, Pmt6, rCon, ConFeePre))
            TXT],
        ],
        [
            'title' => 'snowballPayoffAfter = getSnowballPayoffAfter(debtAPR) ',
            'results' => ['snowballPayoffAfter' => <<<'TXT'
            getSnowballPayoffAfter(getDebtAPR(NumberDebts, Debt1, r1, Pmt1, Debt2, r2, Pmt2, Debt3, r3, Pmt3, Debt4, r4, Pmt4, Debt5, r5, Pmt5, Debt6, r6, Pmt6, rCon, ConFeePre))
            TXT],
        ],
        [
            'title' => 'avalancheAPR = getAvalancheAPR(debtAPR)',
            'results' => ['avalancheAPR' => 'getAvalancheAPR(getDebtAPR(NumberDebts, Debt1, r1, Pmt1, Debt2, r2, Pmt2, Debt3, r3, Pmt3, Debt4, r4, Pmt4, Debt5, r5, Pmt5, Debt6, r6, Pmt6, rCon, ConFeePre))'],
        ],
        [
            'title' => 'avalancheInterest = getAvalancheInterest(debtAPR) ',
            'results' => ['avalancheInterest' => <<<'TXT'
            getAvalancheInterest(getDebtAPR(NumberDebts, Debt1, r1, Pmt1, Debt2, r2, Pmt2, Debt3, r3, Pmt3, Debt4, r4, Pmt4, Debt5, r5, Pmt5, Debt6, r6, Pmt6, rCon, ConFeePre))
            TXT],
        ],
        [
            'title' => 'avalanchePayoffAfter = getAvalanchePayoffAfter(debtAPR) ',
            'results' => ['avalanchePayoffAfter' => <<<'TXT'
            getAvalanchePayoffAfter(getDebtAPR(NumberDebts, Debt1, r1, Pmt1, Debt2, r2, Pmt2, Debt3, r3, Pmt3, Debt4, r4, Pmt4, Debt5, r5, Pmt5, Debt6, r6, Pmt6, rCon, ConFeePre))
            TXT],
        ],
        [
            'title' => 'consolidationAPR = getConsolidationAPR(debtAPR)',
            'results' => ['consolidationAPR' => <<<'TXT'
            getConsolidationAPR(getDebtAPR(NumberDebts, Debt1, r1, Pmt1, Debt2, r2, Pmt2, Debt3, r3, Pmt3, Debt4, r4, Pmt4, Debt5, r5, Pmt5, Debt6, r6, Pmt6, rCon, ConFeePre))
            TXT],
        ],
        [
            'title' => 'consolidationInterest = getConsolidationInterest(debtAPR)',
            'results' => ['consolidationInterest' => <<<'TXT'
            getConsolidationInterest(getDebtAPR(NumberDebts, Debt1, r1, Pmt1, Debt2, r2, Pmt2, Debt3, r3, Pmt3, Debt4, r4, Pmt4, Debt5, r5, Pmt5, Debt6, r6, Pmt6, rCon, ConFeePre))
            TXT],
        ],
        [
            'title' => 'consolidationPayoffAfter = getConsolidationPayoffAfter(debtAPR)',
            'results' => ['consolidationPayoffAfter' => <<<'TXT'
            getConsolidationPayoffAfter(getDebtAPR(NumberDebts, Debt1, r1, Pmt1, Debt2, r2, Pmt2, Debt3, r3, Pmt3, Debt4, r4, Pmt4, Debt5, r5, Pmt5, Debt6, r6, Pmt6, rCon, ConFeePre))
            TXT],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("getTotalDebt",function(_Debt1,_Debt2,_Debt3,_Debt4,_Debt5,_Debt6,_VarDebt){var Debt1=Number(_Debt1);var Debt2=Number(_Debt2);var Debt3=Number(_Debt3);var Debt4=Number(_Debt4);var Debt5=Number(_Debt5);var Debt6=Number(_Debt6);var VarDebt=Number(_VarDebt);if(VarDebt===5){Debt6=0}if(VarDebt===4){Debt5=0;Debt6=0}if(VarDebt===3){Debt4=0;Debt5=0;Debt6=0}if(VarDebt===2){Debt3=0;Debt4=0;Debt5=0;Debt6=0}if(VarDebt===1){Debt3=0;Debt4=0;Debt5=0;Debt6=0;Debt2=0}var TotalDebt=Debt1+Debt2+Debt3+Debt4+Debt5+Debt6;return TotalDebt});omni.define("getTotalPmt",function(_Pmt1,_Pmt2,_Pmt3,_Pmt4,_Pmt5,_Pmt6,_VarDebt){var Pmt1=Number(_Pmt1);var Pmt2=Number(_Pmt2);var Pmt3=Number(_Pmt3);var Pmt4=Number(_Pmt4);var Pmt5=Number(_Pmt5);var Pmt6=Number(_Pmt6);var VarDebt=Number(_VarDebt);if(VarDebt===5){Pmt6=0}if(VarDebt===4){Pmt5=0;Pmt6=0}if(VarDebt===3){Pmt4=0;Pmt5=0;Pmt6=0}if(VarDebt===2){Pmt3=0;Pmt4=0;Pmt5=0;Pmt6=0}var TotalPmt=Pmt1+Pmt2+Pmt3+Pmt4+Pmt5+Pmt6;return TotalPmt});var debtAPR=0,snowAPR=0,avaAPR=0,conAPR=0,intPaid=0,intPaidSnow=0,intPaidAva=0,intPaidCon=0,debtPeriod=0,snowPeriod=0,avaPeriod=0,conPeriod=0;omni.define("getDebtAPR",function(_numberDebts,_debt1,_r1,_pmt1,_debt2,_r2,_pmt2,_debt3,_r3,_pmt3,_debt4,_r4,_pmt4,_debt5,_r5,_pmt5,_debt6,_r6,_pmt6,_rCon,_ConFeePre){var ConFeePre=Number(_ConFeePre);var rCon=_rCon;var VarT1=2;var VarT2=2;var VarT3=2;var VarT4=2;var VarT5=2;var VarT6=2;var numberDebts=Number(_numberDebts);var debt1=Number(_debt1);var debt2=Number(_debt2);var debt3=Number(_debt3);var debt4=Number(_debt4);var debt5=Number(_debt5);var debt6=Number(_debt6);if(numberDebts===5){debt6=0}if(numberDebts===4){debt5=0;debt6=0}if(numberDebts===3){debt4=0;debt5=0;debt6=0}if(numberDebts===2){debt3=0;debt4=0;debt5=0;debt6=0}if(numberDebts===1){debt3=0;debt4=0;debt5=0;debt6=0;debt2=0}var debtTotal=debt1+debt2+debt3+debt4+debt5+debt6;var ConLoan=debtTotal;var pmt1=Number(_pmt1);var pmt2=Number(_pmt2);var pmt3=Number(_pmt3);var pmt4=Number(_pmt4);var pmt5=Number(_pmt5);var pmt6=Number(_pmt6);if(numberDebts==5){pmt6=0}if(numberDebts==4){pmt5=0;pmt6=0}if(numberDebts==3){pmt4=0;pmt5=0;pmt6=0}if(numberDebts==2){pmt3=0;pmt4=0;pmt5=0;pmt6=0}if(numberDebts==1){pmt2=0;pmt3=0;pmt4=0;pmt5=0;pmt6=0}var pmtTotal=pmt1+pmt2+pmt3+pmt4+pmt5+pmt6;var r1=Number(_r1);var r2=Number(_r2);var r3=Number(_r3);var r4=Number(_r4);var r5=Number(_r5);var r6=Number(_r6);if(numberDebts==5){r6=0}else if(numberDebts==4){r5=0;r6=0}else if(numberDebts==3){r4=0;r5=0;r6=0}else if(numberDebts==2){r3=0;r4=0;r5=0;r6=0}else if(numberDebts==1){r2=0;r3=0;r4=0;r5=0;r6=0}var totalInterest=r1+r2+r3+r4+r5+r6;var VarDebt=Number(_numberDebts);var Debt1=Number(_debt1);var Debt2=Number(_debt2);var Debt3=Number(_debt3);var Debt4=Number(_debt4);var Debt5=Number(_debt5);var Debt6=Number(_debt6);var Pmt1=Number(_pmt1);var Pmt2=Number(_pmt2);var Pmt3=Number(_pmt3);var Pmt4=Number(_pmt4);var Pmt5=Number(_pmt5);var Pmt6=Number(_pmt6);if(VarDebt===5){Debt6=0;Pmt6=0;r6=0}if(VarDebt===4){Debt5=0;Debt6=0;Pmt5=0;Pmt6=0;r5=0;r6=0}if(VarDebt===3){Debt4=0;Debt5=0;Debt6=0;Pmt4=0;Pmt5=0;Pmt6=0;r4=0;r5=0;r6=0}if(VarDebt===2){Debt3=0;Debt4=0;Debt5=0;Debt6=0;Pmt3=0;Pmt4=0;Pmt5=0;Pmt6=0;r3=0;r4=0;r5=0;r6=0}var periods=600;var q=12;var int1=0,int2=0,int3=0,int4=0,int5=0,int6=0;var intSnow1=0,intSnow2=0,intSnow3=0,intSnow4=0,intSnow5=0,intSnow6=0;var intAva1=0,intAva2=0,intAva3=0,intAva4=0,intAva5=0,intAva6=0;var bal1=Debt1,bal2=Debt2,bal3=Debt3,bal4=Debt4,bal5=Debt5,bal6=Debt6;var balSnow1=Debt1,balSnow2=Debt2,balSnow3=Debt3,balSnow4=Debt4,balSnow5=Debt5,balSnow6=Debt6;var balAva1=Debt1,balAva2=Debt2,balAva3=Debt3,balAva4=Debt4,balAva5=Debt5,balAva6=Debt6;var balOpen1=0,balOpen2=0,balOpen3=0,balOpen4=0,balOpen5=0,balOpen6=0;var balOpenSnow1=0,balOpenSnow2=0,balOpenSnow3=0,balOpenSnow4=0,balOpenSnow5=0,balOpenSnow6=0;var balOpenAva1=0,balOpenAva2=0,balOpenAva3=0,balOpenAva4=0,balOpenAva5=0,balOpenAva6=0;var princ1=0,princ2=0,princ3=0,princ4=0,princ5=0,princ6=0;var princSnow1=0,princSnow2=0,princSnow3=0,princSnow4=0,princSnow5=0,princSnow6=0;var princAva1=0,princAva2=0,princAva3=0,princAva4=0,princAva5=0,princAva6=0;var pmtMod1=Pmt1,pmtMod2=Pmt2,pmtMod3=Pmt3,pmtMod4=Pmt4,pmtMod5=Pmt5,pmtMod6=Pmt6;var pmtModSnow1=Pmt1,pmtModSnow2=Pmt2,pmtModSnow3=Pmt3,pmtModSnow4=Pmt4,pmtModSnow5=Pmt5,pmtModSnow6=Pmt6;var pmtModAva1=Pmt1,pmtModAva2=Pmt2,pmtModAva3=Pmt3,pmtModAva4=Pmt4,pmtModAva5=Pmt5,pmtModAva6=Pmt6;var pmtResSnowT=0;var balLowstSnow;var balHigstSnow;var balAdjSnow1=balSnow1,balAdjSnow2=balSnow2,balAdjSnow3=balSnow3;var balAdjSnow4=balSnow4,balAdjSnow5=balSnow5,balAdjSnow6=balSnow6;var pmtResAvaT=0;var rHigstAva;var rAdjAva1=r1,rAdjAva2=r2,rAdjAva3=r3;var rAdjAva4=r4,rAdjAva5=r5,rAdjAva6=r6;var princBal=debtTotal;var balCon=debtTotal;var balSnow=debtTotal;var balAva=debtTotal;var princBalOpen=0;var balOpenCon=0;var balOpenSnow=0;var balOpenAva=0;var princMonth=0;var princCon=0;var princSnow=0;var princAva=0;var intMonth=0;var intCon=0;var intSnow=0;var intAva=0;var pmtModT=0;var pmtModCon=0;var pmtModSnow=0;var pmtModAva=0;intPaid=0;intPaidCon=0;intPaidSnow=0;intPaidAva=0;debtPeriod=0;snowPeriod=0;avaPeriod=0;conPeriod=0;var pmtMonth=pmtTotal;var pmtMonthCon=pmtTotal;var pmtMonthSnow=pmtTotal;var pmtMonthAva=pmtTotal;var pmtLast=0;var pmtLastSnow=0;var pmtLastAva=0;var pmtLastCon=0;for(var i=0;i<=periods;i++){balOpen1=bal1;balOpen2=bal2;balOpen3=bal3;balOpen4=bal4;balOpen5=bal5;balOpen6=bal6;balOpenSnow1=balSnow1;balOpenSnow2=balSnow2;balOpenSnow3=balSnow3;balOpenSnow4=balSnow4;balOpenSnow5=balSnow5;balOpenSnow6=balSnow6;balOpenAva1=balAva1;balOpenAva2=balAva2;balOpenAva3=balAva3;balOpenAva4=balAva4;balOpenAva5=balAva5;balOpenAva6=balAva6;princBalOpen=princBal;balOpenCon=balCon;balOpenSnow=balSnow;balOpenAva=balAva;if(i>0){int1=bal1*r1/q;int2=bal2*r2/q;int3=bal3*r3/q;int4=bal4*r4/q;int5=bal5*r5/q;int6=bal6*r6/q;intSnow1=balSnow1*r1/q;intSnow2=balSnow2*r2/q;intSnow3=balSnow3*r3/q;intSnow4=balSnow4*r4/q;intSnow5=balSnow5*r5/q;intSnow6=balSnow6*r6/q;intAva1=balAva1*r1/q;intAva2=balAva2*r2/q;intAva3=balAva3*r3/q;intAva4=balAva4*r4/q;intAva5=balAva5*r5/q;intAva6=balAva6*r6/q;intMonth=int1+int2+int3+int4+int5+int6;intSnow=intSnow1+intSnow2+intSnow3+intSnow4+intSnow5+intSnow6;intAva=intAva1+intAva2+intAva3+intAva4+intAva5+intAva6;intCon=balOpenCon*rCon/q;if(balOpen1<pmtMod1){pmtMod1=balOpen1+int1}if(balOpen2<pmtMod2){pmtMod2=balOpen2+int2}if(balOpen3<pmtMod3){pmtMod3=balOpen3+int3}if(balOpen4<pmtMod4){pmtMod4=balOpen4+int4}if(balOpen5<pmtMod5){pmtMod5=balOpen5+int5}if(balOpen6<pmtMod6){pmtMod6=balOpen6+int6}if(balOpenSnow1<pmtModSnow1){pmtModSnow1=balOpenSnow1+intSnow1}if(balOpenSnow2<pmtModSnow2){pmtModSnow2=balOpenSnow2+intSnow2}if(balOpenSnow3<pmtModSnow3){pmtModSnow3=balOpenSnow3+intSnow3}if(balOpenSnow4<pmtModSnow4){pmtModSnow4=balOpenSnow4+intSnow4}if(balOpenSnow5<pmtModSnow5){pmtModSnow5=balOpenSnow5+intSnow5}if(balOpenSnow6<pmtModSnow6){pmtModSnow6=balOpenSnow6+intSnow6}if(balOpenAva1<pmtModAva1){pmtModAva1=balOpenAva1+intAva1}if(balOpenAva2<pmtModAva2){pmtModAva2=balOpenAva2+intAva2}if(balOpenAva3<pmtModAva3){pmtModAva3=balOpenAva3+intAva3}if(balOpenAva4<pmtModAva4){pmtModAva4=balOpenAva4+intAva4}if(balOpenAva5<pmtModAva5){pmtModAva5=balOpenAva5+intAva5}if(balOpenAva6<pmtModAva6){pmtModAva6=balOpenAva6+intAva6}pmtModT=princBalOpen!==0?pmtMod1+pmtMod2+pmtMod3+pmtMod4+pmtMod5+pmtMod6:pmtModT;pmtModSnow=balOpenSnow!==0?pmtModSnow1+pmtModSnow2+pmtModSnow3+pmtModSnow4+pmtModSnow5+pmtModSnow6:pmtModSnow;pmtModAva=balOpenAva!==0?pmtModAva1+pmtModAva2+pmtModAva3+pmtModAva4+pmtModAva5+pmtModAva6:pmtModAva;pmtModCon=balOpenCon<pmtMonthCon?balOpenCon+intCon:pmtMonthCon;pmtResAvaT=pmtMonthAva-pmtModAva;rAdjAva1=balOpenAva1<=pmtModAva1||VarT1===1?0:r1;rAdjAva2=balOpenAva2<=pmtModAva2||VarT2===1?0:r2;rAdjAva3=balOpenAva3<=pmtModAva3||VarT3===1?0:r3;rAdjAva4=balOpenAva4<=pmtModAva4||VarT4===1?0:r4;rAdjAva5=balOpenAva5<=pmtModAva5||VarT5===1?0:r5;rAdjAva6=balOpenAva6<=pmtModAva6||VarT6===1?0:r6;if(pmtResAvaT>0.001){rHigstAva=Math.max(rAdjAva1,rAdjAva2,rAdjAva3,rAdjAva4,rAdjAva5,rAdjAva6);if(rHigstAva===rAdjAva1&&rHigstAva>0&&balOpenAva1>=pmtModAva1+pmtResAvaT){pmtModAva1+=pmtResAvaT}else if(rHigstAva===rAdjAva2&&rHigstAva>0&&balOpenAva2>=pmtModAva2+pmtResAvaT){pmtModAva2+=pmtResAvaT}else if(rHigstAva===rAdjAva3&&rHigstAva>0&&balOpenAva3>=pmtModAva3+pmtResAvaT){pmtModAva3+=pmtResAvaT}else if(rHigstAva===rAdjAva4&&rHigstAva>0&&balOpenAva4>=pmtModAva4+pmtResAvaT){pmtModAva4+=pmtResAvaT}else if(rHigstAva===rAdjAva5&&rHigstAva>0&&balOpenAva5>=pmtModAva5+pmtResAvaT){pmtModAva5+=pmtResAvaT}else if(rHigstAva===rAdjAva6&&rHigstAva>0&&balOpenAva6>=pmtModAva6+pmtResAvaT){pmtModAva6+=pmtResAvaT}}pmtResSnowT=pmtMonthSnow-pmtModSnow;balAdjSnow1=balSnow1;balAdjSnow2=balSnow2;balAdjSnow3=balSnow3;balAdjSnow4=balSnow4;balAdjSnow5=balSnow5;balAdjSnow6=balSnow6;balHigstSnow=Math.max(balSnow1,balSnow2,balSnow3,balSnow4,balSnow5,balSnow6,1);balAdjSnow1=balOpenSnow1<=pmtModSnow1||VarT1===1?balHigstSnow+1:balAdjSnow1;balAdjSnow2=balOpenSnow2<=pmtModSnow2||VarT2===1?balHigstSnow+1:balAdjSnow2;balAdjSnow3=balOpenSnow3<=pmtModSnow3||VarT3===1?balHigstSnow+1:balAdjSnow3;balAdjSnow4=balOpenSnow4<=pmtModSnow4||VarT4===1?balHigstSnow+1:balAdjSnow4;balAdjSnow5=balOpenSnow5<=pmtModSnow5||VarT5===1?balHigstSnow+1:balAdjSnow5;balAdjSnow6=balOpenSnow6<=pmtModSnow6||VarT6===1?balHigstSnow+1:balAdjSnow6;if(pmtResSnowT>0.001){balLowstSnow=Math.min(balAdjSnow1||Infinity,balAdjSnow2||Infinity,balAdjSnow3||Infinity,balAdjSnow4||Infinity,balAdjSnow5||Infinity,balAdjSnow6||Infinity);if(balLowstSnow===balAdjSnow1&&balLowstSnow>0&&balLowstSnow<Infinity&&balOpenSnow1>=pmtModSnow1+pmtResSnowT){pmtModSnow1+=pmtResSnowT}else if(balLowstSnow===balAdjSnow2&&balLowstSnow>0&&balLowstSnow<Infinity&&balOpenSnow2>=pmtModSnow2+pmtResSnowT){pmtModSnow2+=pmtResSnowT}else if(balLowstSnow===balAdjSnow3&&balLowstSnow>0&&balLowstSnow<Infinity&&balOpenSnow3>=pmtModSnow3+pmtResSnowT){pmtModSnow3+=pmtResSnowT}else if(balLowstSnow===balAdjSnow4&&balLowstSnow>0&&balLowstSnow<Infinity&&balOpenSnow4>=pmtModSnow4+pmtResSnowT){pmtModSnow4+=pmtResSnowT}else if(balLowstSnow===balAdjSnow5&&balLowstSnow>0&&balLowstSnow<Infinity&&balOpenSnow5>=pmtModSnow5+pmtResSnowT){pmtModSnow5+=pmtResSnowT}else if(balLowstSnow===balAdjSnow6&&balLowstSnow>0&&balLowstSnow<Infinity&&balOpenSnow6>=pmtModSnow6+pmtResSnowT){pmtModSnow6+=pmtResSnowT}}princ1=pmtMod1-int1;princ2=pmtMod2-int2;princ3=pmtMod3-int3;princ4=pmtMod4-int4;princ5=pmtMod5-int5;princ6=pmtMod6-int6;princSnow1=pmtModSnow1-intSnow1;princSnow2=pmtModSnow2-intSnow2;princSnow3=pmtModSnow3-intSnow3;princSnow4=pmtModSnow4-intSnow4;princSnow5=pmtModSnow5-intSnow5;princSnow6=pmtModSnow6-intSnow6;princAva1=pmtModAva1-intAva1;princAva2=pmtModAva2-intAva2;princAva3=pmtModAva3-intAva3;princAva4=pmtModAva4-intAva4;princAva5=pmtModAva5-intAva5;princAva6=pmtModAva6-intAva6;pmtModT=princBalOpen!==0?pmtMod1+pmtMod2+pmtMod3+pmtMod4+pmtMod5+pmtMod6:pmtModT;pmtModSnow=balOpenSnow!==0?pmtModSnow1+pmtModSnow2+pmtModSnow3+pmtModSnow4+pmtModSnow5+pmtModSnow6:pmtModSnow;pmtModAva=balOpenAva!==0?pmtModAva1+pmtModAva2+pmtModAva3+pmtModAva4+pmtModAva5+pmtModAva6:pmtModAva;princMonth=pmtModT-intMonth;princSnow=pmtModSnow-intSnow;princAva=pmtModAva-intAva;princCon=pmtModCon-intCon;bal1-=princ1;bal2-=princ2;bal3-=princ3;bal4-=princ4;bal5-=princ5;bal6-=princ6;balSnow1-=princSnow1;balSnow2-=princSnow2;balSnow3-=princSnow3;balSnow4-=princSnow4;balSnow5-=princSnow5;balSnow6-=princSnow6;balAva1-=princAva1;balAva2-=princAva2;balAva3-=princAva3;balAva4-=princAva4;balAva5-=princAva5;balAva6-=princAva6;princBal-=princMonth;balSnow-=princSnow;balAva-=princAva;balCon-=princCon}if(bal1<=0.001){bal1=0;int1=0;princ1=0;pmtMod1=0}if(bal2<=0.001){bal2=0;int2=0;princ2=0;pmtMod2=0}if(bal3<=0.001){bal3=0;int3=0;princ3=0;pmtMod3=0}if(bal4<=0.001){bal4=0;int4=0;princ4=0;pmtMod4=0}if(bal5<=0.001){bal5=0;int5=0;princ5=0;pmtMod5=0}if(bal6<=0.001){bal6=0;int6=0;princ6=0;pmtMod6=0}if(balSnow1<=0.001){balSnow1=0;intSnow1=0;princSnow1=0;pmtModSnow1=0;rAdjAva1=0;balAdjSnow1=Infinity}if(balSnow2<=0.001){balSnow2=0;intSnow2=0;princSnow2=0;pmtModSnow2=0;rAdjAva2=0;balAdjSnow2=Infinity}if(balSnow3<=0.001){balSnow3=0;intSnow3=0;princSnow3=0;pmtModSnow3=0;rAdjAva3=0;balAdjSnow3=Infinity}if(balSnow4<=0.001){balSnow4=0;intSnow4=0;princSnow4=0;pmtModSnow4=0;rAdjAva4=0;balAdjSnow4=Infinity}if(balSnow5<=0.001){balSnow5=0;intSnow5=0;princSnow5=0;pmtModSnow5=0;rAdjAva5=0;balAdjSnow5=Infinity}if(balSnow6<=0.001){balSnow6=0;intSnow6=0;princSnow6=0;pmtModSnow6=0;rAdjAva6=0;balAdjSnow6=Infinity}if(balAva1<=0.001){balAva1=0;intAva1=0;princAva1=0;pmtModAva1=0;rAdjAva1=0;balAdjSnow1=Infinity}if(balAva2<=0.001){balAva2=0;intAva2=0;princAva2=0;pmtModAva2=0;rAdjAva2=0;balAdjSnow2=Infinity}if(balAva3<=0.001){balAva3=0;intAva3=0;princAva3=0;pmtModAva3=0;rAdjAva3=0;balAdjSnow3=Infinity}if(balAva4<=0.001){balAva4=0;intAva4=0;princAva4=0;pmtModAva4=0;rAdjAva4=0;balAdjSnow4=Infinity}if(balAva5<=0.001){balAva5=0;intAva5=0;princAva5=0;pmtModAva5=0;rAdjAva5=0;balAdjSnow5=Infinity}if(balAva6<=0.001){balAva6=0;intAva6=0;princAva6=0;pmtModAva6=0;rAdjAva6=0;balAdjSnow6=Infinity}if(princBal<=0.001){princBal=0;princMonth=0;intMonth=0}if(balSnow<=0.001){balSnow=0;princSnow=0;intSnow=0}if(balAva<=0.001){balAva=0;princAva=0;intAva=0}if(balCon<=0.001){balCon=0;princCon=0;intCon=0}if(i>0){intPaid+=intMonth>0?intMonth:0;intPaidSnow+=intSnow>0?intSnow:0;intPaidAva+=intAva>0?intAva:0;intPaidCon+=intCon>0?intCon:0}if(princBalOpen>0.001&&princBal<0.001&&debtPeriod===0){debtPeriod=i;pmtLast=pmtModT}if(balOpenSnow>0.001&&balSnow<0.001&&snowPeriod===0){snowPeriod=i;pmtLastSnow=pmtModSnow}if(balOpenAva>0.001&&balAva<0.001&&avaPeriod===0){avaPeriod=i;pmtLastAva=pmtModAva}if(balOpenCon>0.001&&balCon<0.001&&conPeriod===0){conPeriod=i;pmtLastCon=pmtModCon}if(princBal<0.001&&balSnow<0.001&&balAva<0.001&&balCon<0.001&&i>0){break}}var iteration=0;var MAX_ITERATIONS=5000;var MIN_PRECISION=1e-9;debtAPR=0;snowAPR=0;avaAPR=0;conAPR=0;if(debtTotal>0){var rWeight=(Debt1*r1+Debt2*r2+Debt3*r3+Debt4*r4+Debt5*r5+Debt6*r6)/debtTotal;debtAPR=rWeight*100}else{debtAPR=0}var effectiveSnowPeriod=snowPeriod;if(snowPeriod>0&&pmtMonthSnow>0&&pmtLastSnow>0&&pmtLastSnow<pmtMonthSnow){effectiveSnowPeriod=snowPeriod-1+pmtLastSnow/pmtMonthSnow}if(effectiveSnowPeriod>0&&debtTotal>0&&pmtMonthSnow>0){var guessSnow=debtAPR/100/q;var iOldSnow;var iNewSnow=guessSnow>0?guessSnow:0.01/q;iteration=0;do{iOldSnow=iNewSnow;var powSnow=Math.pow(1+iOldSnow,-effectiveSnowPeriod);var dividendSnow=pmtMonthSnow-pmtMonthSnow*powSnow-iOldSnow*debtTotal;var divisorSnow=pmtMonthSnow*effectiveSnowPeriod*Math.pow(1+iOldSnow,-effectiveSnowPeriod-1)-debtTotal;if(Math.abs(divisorSnow)<MIN_PRECISION){break}iNewSnow=iOldSnow-dividendSnow/divisorSnow;if(iNewSnow<0)iNewSnow=MIN_PRECISION/q;if(iNewSnow>1)iNewSnow=1;iteration++;if(iteration>MAX_ITERATIONS){snowAPR=-1;break}}while(Math.abs(iOldSnow-iNewSnow)>MIN_PRECISION);if(snowAPR!==-1)snowAPR=iNewSnow*q*100}else{snowAPR=debtAPR;if(debtTotal===0)snowAPR=0}var effectiveAvaPeriod=avaPeriod;if(avaPeriod>0&&pmtMonthAva>0&&pmtLastAva>0&&pmtLastAva<pmtMonthAva){effectiveAvaPeriod=avaPeriod-1+pmtLastAva/pmtMonthAva}if(effectiveAvaPeriod>0&&debtTotal>0&&pmtMonthAva>0){var guessAva=debtAPR/100/q;var iOldAva;var iNewAva=guessAva>0?guessAva:0.01/q;iteration=0;do{iOldAva=iNewAva;var powAva=Math.pow(1+iOldAva,-effectiveAvaPeriod);var dividendAva=pmtMonthAva-pmtMonthAva*powAva-iOldAva*debtTotal;var divisorAva=pmtMonthAva*effectiveAvaPeriod*Math.pow(1+iOldAva,-effectiveAvaPeriod-1)-debtTotal;if(Math.abs(divisorAva)<MIN_PRECISION){break}iNewAva=iOldAva-dividendAva/divisorAva;if(iNewAva<0){iNewAva=MIN_PRECISION/q}if(iNewAva>1){iNewAva=1}iteration++;if(iteration>MAX_ITERATIONS){avaAPR=-1;break}}while(Math.abs(iOldAva-iNewAva)>MIN_PRECISION);if(avaAPR!==-1){avaAPR=iNewAva*q*100}}else{avaAPR=debtAPR;if(debtTotal===0)avaAPR=0}var effectiveConPeriod=conPeriod;if(conPeriod>0&&pmtMonthCon>0&&pmtLastCon>0&&pmtLastCon<pmtMonthCon){effectiveConPeriod=conPeriod-1+pmtLastCon/pmtMonthCon}var effectiveConLoan=ConLoan-ConFeePre;if(effectiveConPeriod>0&&effectiveConLoan>0&&pmtMonthCon>0){var guessCon=rCon/q;var iOldCon;var iNewCon=guessCon>0?guessCon:0.01/q;iteration=0;do{iOldCon=iNewCon;var powCon=Math.pow(1+iOldCon,-effectiveConPeriod);var dividendCon=pmtMonthCon-pmtMonthCon*powCon-iOldCon*effectiveConLoan;var divisorCon=pmtMonthCon*effectiveConPeriod*Math.pow(1+iOldCon,-effectiveConPeriod-1)-effectiveConLoan;if(Math.abs(divisorCon)<MIN_PRECISION){break}iNewCon=iOldCon-dividendCon/divisorCon;if(iNewCon<0){iNewCon=MIN_PRECISION/q}if(iNewCon>1){iNewCon=1}iteration++;if(iteration>MAX_ITERATIONS){conAPR=-1;break}}while(Math.abs(iOldCon-iNewCon)>MIN_PRECISION);if(conAPR!==-1){conAPR=iNewCon*q*100}}else{conAPR=-1;if(effectiveConLoan>0&&pmtMonthCon===0){conAPR=rCon*100}if(effectiveConLoan<=0){conAPR=0}}return debtAPR});omni.define("getMinInterest",function(debtAPR){if(debtAPR){return intPaid}});omni.define("getMinPayoffAfter",function(debtAPR){if(debtAPR){return Math.ceil(debtPeriod)}});omni.define("getSnowballAPR",function(debtAPR){if(debtAPR){return snowAPR}});omni.define("getSnowballInterest",function(debtAPR){if(debtAPR){return intPaidSnow}});omni.define("getSnowballPayoffAfter",function(debtAPR){if(debtAPR){return Math.ceil(snowPeriod)}});omni.define("getAvalancheAPR",function(debtAPR){if(debtAPR){return avaAPR}});omni.define("getAvalancheInterest",function(debtAPR){if(debtAPR){return intPaidAva}});omni.define("getAvalanchePayoffAfter",function(debtAPR){if(debtAPR){return Math.ceil(avaPeriod)}});omni.define("getConsolidationAPR",function(debtAPR){if(debtAPR){return conAPR}});omni.define("getConsolidationInterest",function(debtAPR){if(debtAPR){return intPaidCon}});omni.define("getConsolidationPayoffAfter",function(debtAPR){if(debtAPR){return Math.ceil(conPeriod)}});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Enter Number of debts, Balance #1 and Balance #2 into Debt and the answer comes back as Total debt and Monthly payment. Nothing is looked up on this page: total debt is computed from number of debts and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Total debt is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Debt calculator works', 'html' => <<<'TXT'
            <p>The Debt calculator applies one relationship to 7 numbers and reports Total debt, Monthly payment and Debt apr.</p><p>In the form&#039;s own words, Total debt = getTotalDebt(Balance #1, Balance #2, Balance #3, Balance #4, Balance #5, Balance #6, Number of debts).</p><p>The answers are Total debt, Monthly payment, Debt apr and Min interest; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 7 boxes, and nothing else.</p><ul><li><strong>Number of debts</strong> — a plain number, no unit</li><li><strong>Balance #1</strong> — in USD</li><li><strong>Balance #2</strong> — in USD</li><li><strong>Balance #3</strong> — in USD</li><li><strong>Balance #4</strong> — in USD</li><li><strong>Balance #5</strong> — in USD</li><li><strong>Balance #6</strong> — in USD</li></ul><p>The result boxes are Total debt in USD, Monthly payment in USD, Debt apr in percent, Min interest in USD, Min payoff after in months, Snowball apr in percent, Snowball interest in USD, Snowball payoff after in months, Avalanche apr in percent, Avalanche interest in USD, Avalanche payoff after in months, Consolidation apr in percent, Consolidation interest in USD, Consolidation payoff after in months; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Number of debts = 2, Balance #1 = 4500 USD, Interest rate #1 = 6.2 perc, Payment #1 = 120 USD, Balance #2 = 12000 USD, Interest rate #2 = 18.2 perc, Payment #2 = 220 USD, Balance #3 = 2200 USD, Interest rate #3 = 3.2 perc, Payment #3 = 200 USD, Balance #4 = 6000 USD, Interest rate #4 = 10 perc, Payment #4 = 80 USD, Balance #5 = 3500 USD, Interest rate #5 = 16 perc, Payment #5 = 65 USD, Balance #6 = 500 USD, Interest rate #6 = 10 perc, Payment #6 = 50 USD, Interest rate = 9.5 perc and Prepaid fee = 200 USD; the answers are <strong>Loan amount</strong> = 18000, <strong>Loan term</strong> = 84 and <strong>Loaned fee</strong> = 0.</p><ul><li><strong>Loan amount</strong> = 18000</li><li><strong>Loan term</strong> = 84</li><li><strong>Loaned fee</strong> = 0</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Total debt</strong> = <code>getTotalDebt(Balance #1, Balance #2, Balance #3, Balance #4, Balance #5, Balance #6, Number of debts)</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Loan amount</strong> = 18000, <strong>Loan term</strong> = 84 and <strong>Loaned fee</strong> = 0. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Debt apr lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Total debt</strong> = <code>getTotalDebt(Balance #1, Balance #2, Balance #3, Balance #4, Balance #5, Balance #6, Number of debts)</code></li><li><strong>Monthly payment</strong> = <code>getTotalPmt(Payment #1, Payment #2, Payment #3, Payment #4, Payment #5, Payment #6, Number of debts)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Total debt</strong> = <code>getTotalDebt(Balance #1, Balance #2, Balance #3, Balance #4, Balance #5, Balance #6, Number of debts)</code> — the form to use when Balance #1, Balance #2, Balance #3 and Balance #4 are the values you have.</li><li><strong>Monthly payment</strong> = <code>getTotalPmt(Payment #1, Payment #2, Payment #3, Payment #4, Payment #5, Payment #6, Number of debts)</code> — the form to use when Payment #1, Payment #2, Payment #3 and Payment #4 are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Total debt, Monthly payment and Debt apr can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Number of debts, from 2 to 4 — and the answers go from <strong>Loan amount</strong> 18000, <strong>Loan term</strong> 84 and <strong>Loaned fee</strong> 0 to <strong>Loan amount</strong> 18000, <strong>Loan term</strong> 84 and <strong>Loaned fee</strong> 0.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Total debt, Monthly payment and Debt apr are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Number of debts left as a guess.</strong> Anything typed into Number of debts is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Balance #1 left as a guess.</strong> Anything typed into Balance #1 is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Balance #2 left as a guess.</strong> Anything typed into Balance #2 is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Number of debts and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Debt form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Number of debts</strong> takes a plain number with no unit attached. Change it and Total debt, Monthly payment and Debt apr changes with it. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Number of debts is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Balance #1</strong> takes a plain number with no unit attached. Change it and Total debt, Debt apr and Min interest changes with it. Fill it from a measurement rather than a memory — Balance #1 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Balance #2</strong> takes a plain number with no unit attached. Change it and Total debt, Debt apr and Min interest changes with it. Fill it from a measurement rather than a memory — Balance #2 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Balance #3</strong> takes a plain number with no unit attached. Change it and Total debt, Debt apr and Min interest changes with it. Fill it from a measurement rather than a memory — Balance #3 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Balance #4</strong> takes a plain number with no unit attached. Change it and Total debt, Debt apr and Min interest changes with it. Fill it from a measurement rather than a memory — Balance #4 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Balance #5</strong> takes a plain number with no unit attached. Change it and Total debt, Debt apr and Min interest changes with it. Fill it from a measurement rather than a memory — Balance #5 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Balance #6</strong> takes a plain number with no unit attached. Change it and Total debt, Debt apr and Min interest changes with it. Fill it from a measurement rather than a memory — Balance #6 is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Number of debts, Balance #1, Balance #2 and Balance #3 ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Number of debts — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Total debt in USD against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Total debt is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover percent and months. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Number of debts, Balance #1 and Balance #2 measured, Total debt and Monthly payment wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/consumer-surplus">Consumer surplus</a>, <a href="/finance/continuous-compound">Continuous compound interest Calculator</a> and <a href="/finance/contribution-margin">Contribution margin</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Debt is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Number of debts, Balance #1, Balance #2 and Balance #3 beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Debt calculator work out?', 'a' => <<<'TXT'
            Total debt, Monthly payment, Debt apr and Min interest, from Balance #1, Balance #2, Balance #3 and Balance #4. The relationship is Total debt = getTotalDebt(Balance #1, Balance #2, Balance #3, Balance #4, Balance #5, Balance #6, Number of debts).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Number of debts, Balance #1 (USD), Balance #2 (USD), Balance #3 (USD), Balance #4 (USD). With number of debts, balance #1 and balance #2 in place, Total debt can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Total debt, Monthly payment, Debt apr and Min interest can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Loan amount = 18000, Loan term = 84 and Loaned fee = 0. That comes from the page's own defaults, entered in Number of debts; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Total debt is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Number of debts blank and the page solves for it, reporting Total debt instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Total debt at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/consumer-surplus', 'name' => 'Consumer surplus'],
            ['path' => '/finance/continuous-compound', 'name' => 'Continuous compound interest Calculator'],
            ['path' => '/finance/contribution-margin', 'name' => 'Contribution margin'],
        ],
        'authors' => [],
    ],
];
