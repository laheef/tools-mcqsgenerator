<?php

/**
 * Debt payoff
 * /finance/debt-payoff
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Debt payoff',
    'meta' => ['title' => 'Debt payoff Calculator: Formula, Steps & Examples', 'description' => 'Debt payoff works out total debt and total current monthly payment and reports both. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Debt payoff Calculator', 'updated' => '2025-10-04'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'numberDebts',
                            'label' => 'Number of debts',
                            'type' => 'select',
                            'options' => [
                                'Two' => '2',
                                'Three' => '3',
                                'Four' => '4',
                                'Five' => '5',
                                'Six' => '6',
                            ],
                            'dataset' => 'NumberOfDebts',
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
                            'name' => 'debt1',
                            'label' => 'Balance #1',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '1500',
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
                            'default' => '2.5',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pmt1',
                            'label' => 'Payment #1',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
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
                            'name' => 'debt2',
                            'label' => 'Balance #2',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '4000',
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
                            'default' => '6.2',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pmt2',
                            'label' => 'Payment #2',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '150',
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
                            'name' => 'debt3',
                            'label' => 'Balance #3',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '8000',
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
                            'name' => 'pmt3',
                            'label' => 'Payment #3',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '250',
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
                            'name' => 'debt4',
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
                            'name' => 'pmt4',
                            'label' => 'Payment #4',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
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
                            'name' => 'debt5',
                            'label' => 'Balance #5',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
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
                            'name' => 'pmt5',
                            'label' => 'Payment #5',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
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
                            'name' => 'debt6',
                            'label' => 'Balance #6',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
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
                            'name' => 'pmt6',
                            'label' => 'Payment #6',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '50',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Repayment specification',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'myAim',
                            'label' => 'My aim',
                            'type' => 'select',
                            'options' => [
                                'Pay the minimum amount monthly.' => '1',
                                'Reduce the number of debts - snowball.' => '2',
                                'Pay the least interest - avalanche.' => '3',
                                'Consolidate with a new monthly payment.' => '4',
                                'Consolidate with a new payoff term.' => '5',
                            ],
                            'dataset' => 'myAim',
                            'control' => 'DROPDOWN',
                            'default' => 'Reduce the number of debts - snowball.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'totalDebt',
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
                            'name' => 'totalPmt',
                            'label' => 'Total current monthly payment',
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
                            'name' => 'irNewLoan',
                            'label' => 'Interest rate of the new loan',
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
                        [
                            'name' => 'loanTerm',
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
                            'name' => 'newPayment',
                            'label' => 'New payment',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '200',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'prepaidFee',
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
                            'name' => 'pmtExtra',
                            'label' => 'I can increase the monthly payment by...',
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
                            'name' => 'totalPmt2',
                            'label' => 'New monthly payment',
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
                        ['type' => 'note', 'text' => 'You can\'t pay off your balance within a reasonable time with the given setup, or you set implausible values in the specification.'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Payoff summary',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'compare',
                            'label' => 'Compare results with...',
                            'type' => 'select',
                            'options' => ['Minimum payment' => '1', 'Snowball repayment' => '2', 'Avalanche repayment' => '3'],
                            'dataset' => 'compareResults',
                            'default' => 'Minimum payment',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'myAim == 4', 'text' => '*Consolidation - new payment.'],
                                ['when' => ' myAim == 5', 'text' => '*Consolidation - new payoff term.'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => '*We estimate APR using weighted average procedure. **The total monthly payment gradually decreases as the debts are being paid off.'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Table values (Hidden)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'repayCheck',
                            'label' => 'Repayment Info check',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'totalInterest',
                            'label' => 'Total interest',
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
                            'name' => 'apr1',
                            'label' => 'Apr1',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'apr2',
                            'label' => 'Apr2',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'monthlyPayment1',
                            'label' => 'Monthly payment1',
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
                            'name' => 'monthlyPayment2',
                            'label' => 'Monthly payment2',
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
                            'name' => 'debtPeriod1',
                            'label' => 'Debt period1',
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
                            'name' => 'debtPeriod2',
                            'label' => 'Debt period2',
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
                            'name' => 'totalPaid1',
                            'label' => 'Total paid1',
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
                            'name' => 'totalPaid2',
                            'label' => 'Total paid2',
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
                            'name' => 'intPaid1',
                            'label' => 'Int paid1',
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
                            'name' => 'intPaid2',
                            'label' => 'Int paid2',
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
                            'name' => 'tableHeading1',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tableHeading2',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
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
                            'name' => 'aprRes',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'monthlyPmtRes',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'debtPeriodRes',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'totalPaidRes',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'intPaidRes',
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
            'title' => <<<'TXT'
            apr1 = getAPR1(numberDebts, debt1, r1, pmt1, debt2, r2, pmt2, debt3, r3, pmt3, debt4, r4, pmt4, debt5, r5, pmt5, debt6, r6, pmt6, myAim, irNewLoan, loanTerm, newPayment, prepaidFee, pmtExtra, compare)
            TXT,
            'results' => ['apr1' => <<<'TXT'
            getAPR1(numberDebts, debt1, r1, pmt1, debt2, r2, pmt2, debt3, r3, pmt3, debt4, r4, pmt4, debt5, r5, pmt5, debt6, r6, pmt6, myAim, irNewLoan, loanTerm, newPayment, prepaidFee, pmtExtra, compare)
            TXT],
        ],
        [
            'title' => 'apr2 = getAPR2(apr1)',
            'results' => ['apr2' => <<<'TXT'
            getAPR2(getAPR1(numberDebts, debt1, r1, pmt1, debt2, r2, pmt2, debt3, r3, pmt3, debt4, r4, pmt4, debt5, r5, pmt5, debt6, r6, pmt6, myAim, irNewLoan, loanTerm, newPayment, prepaidFee, pmtExtra, compare))
            TXT],
        ],
        [
            'title' => 'totalDebt = getTotalDebt(apr1)',
            'results' => ['totalDebt' => <<<'TXT'
            getTotalDebt(getAPR1(numberDebts, debt1, r1, pmt1, debt2, r2, pmt2, debt3, r3, pmt3, debt4, r4, pmt4, debt5, r5, pmt5, debt6, r6, pmt6, myAim, irNewLoan, loanTerm, newPayment, prepaidFee, pmtExtra, compare))
            TXT],
        ],
        [
            'title' => 'totalPmt = getTotalPmt(apr1)',
            'results' => ['totalPmt' => <<<'TXT'
            getTotalPmt(getAPR1(numberDebts, debt1, r1, pmt1, debt2, r2, pmt2, debt3, r3, pmt3, debt4, r4, pmt4, debt5, r5, pmt5, debt6, r6, pmt6, myAim, irNewLoan, loanTerm, newPayment, prepaidFee, pmtExtra, compare))
            TXT],
        ],
        [
            'title' => 'totalPmt2 = getTotalPmt2(apr1)',
            'results' => ['totalPmt2' => <<<'TXT'
            getTotalPmt2(getAPR1(numberDebts, debt1, r1, pmt1, debt2, r2, pmt2, debt3, r3, pmt3, debt4, r4, pmt4, debt5, r5, pmt5, debt6, r6, pmt6, myAim, irNewLoan, loanTerm, newPayment, prepaidFee, pmtExtra, compare))
            TXT],
        ],
        [
            'title' => 'totalInterest = getTotalInterest(apr1)',
            'results' => ['totalInterest' => <<<'TXT'
            getTotalInterest(getAPR1(numberDebts, debt1, r1, pmt1, debt2, r2, pmt2, debt3, r3, pmt3, debt4, r4, pmt4, debt5, r5, pmt5, debt6, r6, pmt6, myAim, irNewLoan, loanTerm, newPayment, prepaidFee, pmtExtra, compare))
            TXT],
        ],
        [
            'title' => 'repayCheck = getRepaymentInfo(apr1)',
            'results' => ['repayCheck' => <<<'TXT'
            getRepaymentInfo(getAPR1(numberDebts, debt1, r1, pmt1, debt2, r2, pmt2, debt3, r3, pmt3, debt4, r4, pmt4, debt5, r5, pmt5, debt6, r6, pmt6, myAim, irNewLoan, loanTerm, newPayment, prepaidFee, pmtExtra, compare))
            TXT],
        ],
        [
            'title' => 'monthlyPayment1 = getPmtMonth1(apr1)',
            'results' => ['monthlyPayment1' => <<<'TXT'
            getPmtMonth1(getAPR1(numberDebts, debt1, r1, pmt1, debt2, r2, pmt2, debt3, r3, pmt3, debt4, r4, pmt4, debt5, r5, pmt5, debt6, r6, pmt6, myAim, irNewLoan, loanTerm, newPayment, prepaidFee, pmtExtra, compare))
            TXT],
        ],
        [
            'title' => 'monthlyPayment2 = getPmtMonth2(apr1)',
            'results' => ['monthlyPayment2' => <<<'TXT'
            getPmtMonth2(getAPR1(numberDebts, debt1, r1, pmt1, debt2, r2, pmt2, debt3, r3, pmt3, debt4, r4, pmt4, debt5, r5, pmt5, debt6, r6, pmt6, myAim, irNewLoan, loanTerm, newPayment, prepaidFee, pmtExtra, compare))
            TXT],
        ],
        [
            'title' => 'debtPeriod1 = getDebtPeriod1(apr1)',
            'results' => ['debtPeriod1' => <<<'TXT'
            getDebtPeriod1(getAPR1(numberDebts, debt1, r1, pmt1, debt2, r2, pmt2, debt3, r3, pmt3, debt4, r4, pmt4, debt5, r5, pmt5, debt6, r6, pmt6, myAim, irNewLoan, loanTerm, newPayment, prepaidFee, pmtExtra, compare))
            TXT],
        ],
        [
            'title' => 'debtPeriod2 = getDebtPeriod2(apr1)',
            'results' => ['debtPeriod2' => <<<'TXT'
            getDebtPeriod2(getAPR1(numberDebts, debt1, r1, pmt1, debt2, r2, pmt2, debt3, r3, pmt3, debt4, r4, pmt4, debt5, r5, pmt5, debt6, r6, pmt6, myAim, irNewLoan, loanTerm, newPayment, prepaidFee, pmtExtra, compare))
            TXT],
        ],
        [
            'title' => 'totalPaid1 = getTotalPaid1(apr1)',
            'results' => ['totalPaid1' => <<<'TXT'
            getTotalPaid1(getAPR1(numberDebts, debt1, r1, pmt1, debt2, r2, pmt2, debt3, r3, pmt3, debt4, r4, pmt4, debt5, r5, pmt5, debt6, r6, pmt6, myAim, irNewLoan, loanTerm, newPayment, prepaidFee, pmtExtra, compare))
            TXT],
        ],
        [
            'title' => 'totalPaid2 = getTotalPaid2(apr1)',
            'results' => ['totalPaid2' => <<<'TXT'
            getTotalPaid2(getAPR1(numberDebts, debt1, r1, pmt1, debt2, r2, pmt2, debt3, r3, pmt3, debt4, r4, pmt4, debt5, r5, pmt5, debt6, r6, pmt6, myAim, irNewLoan, loanTerm, newPayment, prepaidFee, pmtExtra, compare))
            TXT],
        ],
        [
            'title' => 'intPaid1 = getIntPaid1(apr1)',
            'results' => ['intPaid1' => <<<'TXT'
            getIntPaid1(getAPR1(numberDebts, debt1, r1, pmt1, debt2, r2, pmt2, debt3, r3, pmt3, debt4, r4, pmt4, debt5, r5, pmt5, debt6, r6, pmt6, myAim, irNewLoan, loanTerm, newPayment, prepaidFee, pmtExtra, compare))
            TXT],
        ],
        [
            'title' => 'intPaid2 = getIntPaid2(apr1)',
            'results' => ['intPaid2' => <<<'TXT'
            getIntPaid2(getAPR1(numberDebts, debt1, r1, pmt1, debt2, r2, pmt2, debt3, r3, pmt3, debt4, r4, pmt4, debt5, r5, pmt5, debt6, r6, pmt6, myAim, irNewLoan, loanTerm, newPayment, prepaidFee, pmtExtra, compare))
            TXT],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";var APR2=0,totalDebt=0,totalPmt=0,totalPmt2=0,totalInterest=0,repaymentInfo=0,pmtMonth1=0,pmtMonth2=0,debtPeriod1=0,debtPeriod2=0,totalPaid1=0,totalPaid2=0,intPaid1=0,intPaid2=0;omni.define("getAPR1",function(_numberDebts,_debt1,_r1,_pmt1,_debt2,_r2,_pmt2,_debt3,_r3,_pmt3,_debt4,_r4,_pmt4,_debt5,_r5,_pmt5,_debt6,_r6,_pmt6,_myAim,_irNewLoan,_loanTerm,_newPayment,_prepaidFee,_pmtExtra,_compare){var debt1=Number(_debt1);var r1=Number(_r1);var pmt1=Number(_pmt1);var debt2=Number(_debt2);var r2=Number(_r2);var pmt2=Number(_pmt2);var debt3=Number(_debt3);var r3=Number(_r3);var pmt3=Number(_pmt3);var debt4=Number(_debt4);var r4=Number(_r4);var pmt4=Number(_pmt4);var debt5=Number(_debt5);var r5=Number(_r5);var pmt5=Number(_pmt5);var debt6=Number(_debt6);var r6=Number(_r6);var pmt6=Number(_pmt6);var myAim=Number(_myAim);var irNewLoan=Number(_irNewLoan);var loanTerm=Number(_loanTerm);var newPayment=Number(_newPayment);var prepaidFee=Number(_prepaidFee);var pmtExtra=Number(_pmtExtra);var compare=Number(_compare);var VarT1=2;var VarT2=2;var VarT3=2;var VarT4=2;var VarT5=2;var VarT6=2;var numberDebts=Number(_numberDebts);debt1=Number(_debt1);debt2=Number(_debt2);debt3=Number(_debt3);debt4=Number(_debt4);debt5=Number(_debt5);debt6=Number(_debt6);if(numberDebts===5){debt6=0}if(numberDebts===4){debt5=0;debt6=0}if(numberDebts===3){debt4=0;debt5=0;debt6=0}if(numberDebts===2){debt3=0;debt4=0;debt5=0;debt6=0}if(numberDebts===1){debt3=0;debt4=0;debt5=0;debt6=0;debt2=0}totalDebt=debt1+debt2+debt3+debt4+debt5+debt6;pmt1=Number(_pmt1);pmt2=Number(_pmt2);pmt3=Number(_pmt3);pmt4=Number(_pmt4);pmt5=Number(_pmt5);pmt6=Number(_pmt6);if(numberDebts==5){pmt6=0}if(numberDebts==4){pmt5=0;pmt6=0}if(numberDebts==3){pmt4=0;pmt5=0;pmt6=0}if(numberDebts==2){pmt3=0;pmt4=0;pmt5=0;pmt6=0}if(numberDebts==1){pmt2=0;pmt3=0;pmt4=0;pmt5=0;pmt6=0}totalPmt=pmt1+pmt2+pmt3+pmt4+pmt5+pmt6;totalPmt2=totalPmt+pmtExtra;r1=Number(_r1);r2=Number(_r2);r3=Number(_r3);r4=Number(_r4);r5=Number(_r5);r6=Number(_r6);if(numberDebts==5){r6=0}else if(numberDebts==4){r5=0;r6=0}else if(numberDebts==3){r4=0;r5=0;r6=0}else if(numberDebts==2){r3=0;r4=0;r5=0;r6=0}else if(numberDebts==1){r2=0;r3=0;r4=0;r5=0;r6=0}totalInterest=r1+r2+r3+r4+r5+r6;var periods=600;var q=12;var i;var intYear=0;var princYear=0;var intYeairNewLoan=0;var princYeairNewLoan=0;var intYearSnow=0;var princYearSnow=0;var intYearAva=0;var princYearAva=0;var int1=0;var int2=0;var int3=0;var int4=0;var int5=0;var int6=0;var intSnow1=0;var intSnow2=0;var intSnow3=0;var intSnow4=0;var intSnow5=0;var intSnow6=0;var intAva1=0;var intAva2=0;var intAva3=0;var intAva4=0;var intAva5=0;var intAva6=0;var bal1=debt1;var bal2=debt2;var bal3=debt3;var bal4=debt4;var bal5=debt5;var bal6=debt6;var balSnow1=debt1;var balSnow2=debt2;var balSnow3=debt3;var balSnow4=debt4;var balSnow5=debt5;var balSnow6=debt6;var balAva1=debt1;var balAva2=debt2;var balAva3=debt3;var balAva4=debt4;var balAva5=debt5;var balAva6=debt6;var balOpen1=0;var balOpen2=0;var balOpen3=0;var balOpen4=0;var balOpen5=0;var balOpen6=0;var balOpenSnow1=0;var balOpenSnow2=0;var balOpenSnow3=0;var balOpenSnow4=0;var balOpenSnow5=0;var balOpenSnow6=0;var balOpenAva1=0;var balOpenAva2=0;var balOpenAva3=0;var balOpenAva4=0;var balOpenAva5=0;var balOpenAva6=0;var princ1=0;var princ2=0;var princ3=0;var princ4=0;var princ5=0;var princ6=0;var princSnow1=0;var princSnow2=0;var princSnow3=0;var princSnow4=0;var princSnow5=0;var princSnow6=0;var princAva1=0;var princAva2=0;var princAva3=0;var princAva4=0;var princAva5=0;var princAva6=0;var pmtMod1=pmt1;var pmtMod2=pmt2;var pmtMod3=pmt3;var pmtMod4=pmt4;var pmtMod5=pmt5;var pmtMod6=pmt6;var pmtModSnow1=pmt1;var pmtModSnow2=pmt2;var pmtModSnow3=pmt3;var pmtModSnow4=pmt4;var pmtModSnow5=pmt5;var pmtModSnow6=pmt6;var pmtModAva1=pmt1;var pmtModAva2=pmt2;var pmtModAva3=pmt3;var pmtModAva4=pmt4;var pmtModAva5=pmt5;var pmtModAva6=pmt6;var pmtResSnowT=0;var balLowstSnow;var balHigstSnow;var balAdjSnow1=balSnow1;var balAdjSnow2=balSnow2;var balAdjSnow3=balSnow3;var balAdjSnow4=balSnow4;var balAdjSnow5=balSnow5;var balAdjSnow6=balSnow6;var pmtResAvaT=0;var rHigstAva;var rAdjAva1=r1;var rAdjAva2=r2;var rAdjAva3=r3;var rAdjAva4=r4;var rAdjAva5=r5;var rAdjAva6=r6;var princBal=totalDebt;var balCon=totalDebt;var balSnow=totalDebt;var balAva=totalDebt;var princBalOpen=0;var balOpenCon=0;var balOpenSnow=0;var balOpenAva=0;var princMonth=0;var princCon=0;var princSnow=0;var princAva=0;var intMonth=0;var intCon=0;var intSnow=0;var intAva=0;var pmtModT=0;var pmtModCon=0;var pmtModSnow=0;var pmtModAva=0;var princPaid=0;var princPaidCon=0;var princPaidSnow=0;var princPaidAva=0;var intPaid=0;var intPaidCon=0;var intPaidSnow=0;var intPaidAva=0;var totalPaid=0;var totalPaidCon=0;var totalPaidSnow=0;var totalPaidAva=0;var pmtMonthCon=0;var pmtMonthSnow=totalPmt;var pmtMonthAva=totalPmt;var debtPeriod=0;var snowPeriod=0;var avaPeriod=0;var conPeriod=0;var pmtLast=0;var pmtLastSnow=0;var pmtLastAva=0;var pmtLastCon=0;if(myAim!=5){pmtMonthCon=newPayment}else{pmtMonthCon=balCon*irNewLoan/12*Math.pow(1+irNewLoan/12,loanTerm)/(Math.pow(1+irNewLoan/12,loanTerm)-1)}for(i=0;i<=periods;i++){balOpen1=bal1;balOpen2=bal2;balOpen3=bal3;balOpen4=bal4;balOpen5=bal5;balOpen6=bal6;balOpenSnow1=balSnow1;balOpenSnow2=balSnow2;balOpenSnow3=balSnow3;balOpenSnow4=balSnow4;balOpenSnow5=balSnow5;balOpenSnow6=balSnow6;balOpenAva1=balAva1;balOpenAva2=balAva2;balOpenAva3=balAva3;balOpenAva4=balAva4;balOpenAva5=balAva5;balOpenAva6=balAva6;princBalOpen=princBal;balOpenCon=balCon;balOpenSnow=balSnow;balOpenAva=balAva;if(i>0){int1=bal1*r1/q;int2=bal2*r2/q;int3=bal3*r3/q;int4=bal4*r4/q;int5=bal5*r5/q;int6=bal6*r6/q;intSnow1=balSnow1*r1/q;intSnow2=balSnow2*r2/q;intSnow3=balSnow3*r3/q;intSnow4=balSnow4*r4/q;intSnow5=balSnow5*r5/q;intSnow6=balSnow6*r6/q;intAva1=balAva1*r1/q;intAva2=balAva2*r2/q;intAva3=balAva3*r3/q;intAva4=balAva4*r4/q;intAva5=balAva5*r5/q;intAva6=balAva6*r6/q;intMonth=int1+int2+int3+int4+int5+int6;intSnow=intSnow1+intSnow2+intSnow3+intSnow4+intSnow5+intSnow6;intAva=intAva1+intAva2+intAva3+intAva4+intAva5+intAva6;intCon=balOpenCon*irNewLoan/q;if(balOpen1<pmtMod1){pmtMod1=balOpen1+int1}if(balOpen2<pmtMod2){pmtMod2=balOpen2+int2}if(balOpen3<pmtMod3){pmtMod3=balOpen3+int3}if(balOpen4<pmtMod4){pmtMod4=balOpen4+int4}if(balOpen5<pmtMod5){pmtMod5=balOpen5+int5}if(balOpen6<pmtMod6){pmtMod6=balOpen6+int6}if(balOpenSnow1<pmtModSnow1){pmtModSnow1=balOpenSnow1+intSnow1}if(balOpenSnow2<pmtModSnow2){pmtModSnow2=balOpenSnow2+intSnow2}if(balOpenSnow3<pmtModSnow3){pmtModSnow3=balOpenSnow3+intSnow3}if(balOpenSnow4<pmtModSnow4){pmtModSnow4=balOpenSnow4+intSnow4}if(balOpenSnow5<pmtModSnow5){pmtModSnow5=balOpenSnow5+intSnow5}if(balOpenSnow6<pmtModSnow6){pmtModSnow6=balOpenSnow6+intSnow6}if(balOpenAva1<pmtModAva1){pmtModAva1=balOpenAva1+intAva1}if(balOpenAva2<pmtModAva2){pmtModAva2=balOpenAva2+intAva2}if(balOpenAva3<pmtModAva3){pmtModAva3=balOpenAva3+intAva3}if(balOpenAva4<pmtModAva4){pmtModAva4=balOpenAva4+intAva4}if(balOpenAva5<pmtModAva5){pmtModAva5=balOpenAva5+intAva5}if(balOpenAva6<pmtModAva6){pmtModAva6=balOpenAva6+intAva6}if(princBalOpen!=0){pmtModT=pmtMod1+pmtMod2+pmtMod3+pmtMod4+pmtMod5+pmtMod6}if(balOpenSnow!=0){pmtModSnow=pmtModSnow1+pmtModSnow2+pmtModSnow3+pmtModSnow4+pmtModSnow5+pmtModSnow6}if(balOpenAva!=0){pmtModAva=pmtModAva1+pmtModAva2+pmtModAva3+pmtModAva4+pmtModAva5+pmtModAva6}if(balOpenCon<pmtModCon){pmtModCon=balOpenCon+intCon}else{pmtModCon=pmtMonthCon}pmtResAvaT=pmtMonthAva+pmtExtra-pmtModAva;if(balOpenAva1<=pmtModAva1||VarT1==1){rAdjAva1=0}if(balOpenAva2<=pmtModAva2||VarT2==1){rAdjAva2=0}if(balOpenAva3<=pmtModAva3||VarT3==1){rAdjAva3=0}if(balOpenAva4<=pmtModAva4||VarT4==1){rAdjAva4=0}if(balOpenAva5<=pmtModAva5||VarT5==1){rAdjAva5=0}if(balOpenAva6<=pmtModAva6||VarT6==1){rAdjAva6=0}if(pmtResAvaT>0){rHigstAva=Math.max(rAdjAva1,rAdjAva2,rAdjAva3,rAdjAva4,rAdjAva5,rAdjAva6);if(rHigstAva==rAdjAva1&&rHigstAva>0&&balOpenAva1>=pmtModAva1+pmtResAvaT){pmtModAva1=pmtModAva1+pmtResAvaT}else if(rHigstAva==rAdjAva2&&rHigstAva>0&&balOpenAva2>=pmtModAva2+pmtResAvaT){pmtModAva2=pmtModAva2+pmtResAvaT}else if(rHigstAva==rAdjAva3&&rHigstAva>0&&balOpenAva3>=pmtModAva3+pmtResAvaT){pmtModAva3=pmtModAva3+pmtResAvaT}else if(rHigstAva==rAdjAva4&&rHigstAva>0&&balOpenAva4>=pmtModAva4+pmtResAvaT){pmtModAva4=pmtModAva4+pmtResAvaT}else if(rHigstAva==rAdjAva5&&rHigstAva>0&&balOpenAva5>=pmtModAva5+pmtResAvaT){pmtModAva5=pmtModAva5+pmtResAvaT}else if(rHigstAva==rAdjAva6&&rHigstAva>0&&balOpenAva6>=pmtModAva6+pmtResAvaT){pmtModAva6=pmtModAva6+pmtResAvaT}}pmtResSnowT=pmtMonthSnow+pmtExtra-pmtModSnow;balAdjSnow1=balSnow1;balAdjSnow2=balSnow2;balAdjSnow3=balSnow3;balAdjSnow4=balSnow4;balAdjSnow5=balSnow5;balAdjSnow6=balSnow6;balHigstSnow=Math.max(balSnow1,balSnow2,balSnow3,balSnow4,balSnow5,balSnow6);if(balOpenSnow1<=pmtModSnow1||VarT1==1){balAdjSnow1=balHigstSnow}if(balOpenSnow2<=pmtModSnow2||VarT1==1){balAdjSnow2=balHigstSnow}if(balOpenSnow3<=pmtModSnow3||VarT1==1){balAdjSnow3=balHigstSnow}if(balOpenSnow4<=pmtModSnow4||VarT1==1){balAdjSnow4=balHigstSnow}if(balOpenSnow5<=pmtModSnow5||VarT1==1){balAdjSnow5=balHigstSnow}if(balOpenSnow6<=pmtModSnow6||VarT1==1){balAdjSnow6=balHigstSnow}if(pmtResSnowT>0){balLowstSnow=Math.min(balAdjSnow1,balAdjSnow2,balAdjSnow3,balAdjSnow4,balAdjSnow5,balAdjSnow6);if(balLowstSnow==balSnow1&&balLowstSnow>0&&balOpen1>=pmtModSnow1+pmtResSnowT&&VarT1==2){pmtModSnow1=pmtModSnow1+pmtResSnowT}else if(balLowstSnow==balSnow2&&balLowstSnow>0&&balOpenSnow2>=pmtModSnow2+pmtResSnowT&&VarT2==2){pmtModSnow2=pmtModSnow2+pmtResSnowT}else if(balLowstSnow==balSnow3&&balLowstSnow>0&&balOpenSnow3>=pmtModSnow3+pmtResSnowT&&VarT3==2){pmtModSnow3=pmtModSnow3+pmtResSnowT}else if(balLowstSnow==balSnow4&&balLowstSnow>0&&balOpenSnow4>=pmtModSnow4+pmtResSnowT&&VarT4==2){pmtModSnow4=pmtModSnow4+pmtResSnowT}else if(balLowstSnow==balSnow5&&balLowstSnow>0&&balOpenSnow5>=pmtModSnow5+pmtResSnowT&&VarT5==2){pmtModSnow5=pmtModSnow5+pmtResSnowT}else if(balLowstSnow==balSnow6&&balLowstSnow>0&&balOpenSnow6>=pmtModSnow6+pmtResSnowT&&VarT6==2){pmtModSnow6=pmtModSnow6+pmtResSnowT}}princ1=pmtMod1-int1;princ2=pmtMod2-int2;princ3=pmtMod3-int3;princ4=pmtMod4-int4;princ5=pmtMod5-int5;princ6=pmtMod6-int6;princSnow1=pmtModSnow1-intSnow1;princSnow2=pmtModSnow2-intSnow2;princSnow3=pmtModSnow3-intSnow3;princSnow4=pmtModSnow4-intSnow4;princSnow5=pmtModSnow5-intSnow5;princSnow6=pmtModSnow6-intSnow6;princAva1=pmtModAva1-intAva1;princAva2=pmtModAva2-intAva2;princAva3=pmtModAva3-intAva3;princAva4=pmtModAva4-intAva4;princAva5=pmtModAva5-intAva5;princAva6=pmtModAva6-intAva6;if(princBalOpen!=0){pmtModT=pmtMod1+pmtMod2+pmtMod3+pmtMod4+pmtMod5+pmtMod6}if(balOpenSnow!=0){pmtModSnow=pmtModSnow1+pmtModSnow2+pmtModSnow3+pmtModSnow4+pmtModSnow5+pmtModSnow6}if(balOpenAva!=0){pmtModAva=pmtModAva1+pmtModAva2+pmtModAva3+pmtModAva4+pmtModAva5+pmtModAva6}princMonth=pmtModT-intMonth;princSnow=pmtModSnow-intSnow;princAva=pmtModAva-intAva;if(myAim!=5){pmtMonthCon=newPayment}princCon=pmtMonthCon-intCon;bal1=bal1-princ1;bal2=bal2-princ2;bal3=bal3-princ3;bal4=bal4-princ4;bal5=bal5-princ5;bal6=bal6-princ6;balSnow1=balSnow1-princSnow1;balSnow2=balSnow2-princSnow2;balSnow3=balSnow3-princSnow3;balSnow4=balSnow4-princSnow4;balSnow5=balSnow5-princSnow5;balSnow6=balSnow6-princSnow6;balAva1=balAva1-princAva1;balAva2=balAva2-princAva2;balAva3=balAva3-princAva3;balAva4=balAva4-princAva4;balAva5=balAva5-princAva5;balAva6=balAva6-princAva6;princBal=princBal-princMonth;balSnow=balSnow-princSnow;balAva=balAva-princAva;balCon=balCon-princCon}if(balOpen1<=0){balOpen1=0}if(balOpen2<=0){balOpen2=0}if(balOpen3<=0){balOpen3=0}if(balOpen4<=0){balOpen4=0}if(balOpen5<=0){balOpen5=0}if(balOpen6<=0){balOpen6=0}if(bal1<=0){bal1=0}if(bal2<=0){bal2=0}if(bal3<=0){bal3=0}if(bal4<=0){bal4=0}if(bal5<=0){bal5=0}if(bal6<=0){bal6=0}if(princ1<=0){princ1=0}if(princ2<=0){princ2=0}if(princ3<=0){princ3=0}if(princ4<=0){princ4=0}if(princ5<=0){princ5=0}if(princ6<=0){princ6=0}if(int1<=0){int1=0}if(int2<=0){int2=0}if(int3<=0){int3=0}if(int4<=0){int4=0}if(int5<=0){int5=0}if(int6<=0){int6=0}if(balOpenSnow1<=0){balOpenSnow1=0}if(balOpenSnow2<=0){balOpenSnow2=0}if(balOpenSnow3<=0){balOpenSnow3=0}if(balOpenSnow4<=0){balOpenSnow4=0}if(balOpenSnow5<=0){balOpenSnow5=0}if(balOpenSnow6<=0){balOpenSnow6=0}if(balSnow1<=0){balSnow1=0}if(balSnow2<=0){balSnow2=0}if(balSnow3<=0){balSnow3=0}if(balSnow4<=0){balSnow4=0}if(balSnow5<=0){balSnow5=0}if(balSnow6<=0){balSnow6=0}if(princSnow1<=0){princSnow1=0}if(princSnow2<=0){princSnow2=0}if(princSnow3<=0){princSnow3=0}if(princSnow4<=0){princSnow4=0}if(princSnow5<=0){princSnow5=0}if(princSnow6<=0){princSnow6=0}if(intSnow1<=0){intSnow1=0}if(intSnow2<=0){intSnow2=0}if(intSnow3<=0){intSnow3=0}if(intSnow4<=0){intSnow4=0}if(intSnow5<=0){intSnow5=0}if(intSnow6<=0){intSnow6=0}if(balOpenAva1<=0){balOpenAva1=0}if(balOpenAva2<=0){balOpenAva2=0}if(balOpenAva3<=0){balOpenAva3=0}if(balOpenAva4<=0){balOpenAva4=0}if(balOpenAva5<=0){balOpenAva5=0}if(balOpenAva6<=0){balOpenAva6=0}if(balAva1<=0){balAva1=0}if(balAva2<=0){balAva2=0}if(balAva3<=0){balAva3=0}if(balAva4<=0){balAva4=0}if(balAva5<=0){balAva5=0}if(balAva6<=0){balAva6=0}if(princAva1<=0){princAva1=0}if(princAva2<=0){princAva2=0}if(princAva3<=0){princAva3=0}if(princAva4<=0){princAva4=0}if(princAva5<=0){princAva5=0}if(princAva6<=0){princAva6=0}if(intAva1<=0){intAva1=0}if(intAva2<=0){intAva2=0}if(intAva3<=0){intAva3=0}if(intAva4<=0){intAva4=0}if(intAva5<=0){intAva5=0}if(intAva6<=0){intAva6=0}if(princBalOpen<=0){princBalOpen=0}if(princBal<=0){princBal=0}if(princMonth<=0){princMonth=0}if(intMonth<=0){intMonth=0}if(princBal<0.01){princMonth=princBalOpen}if(princBal<=0){princPaid=princBal}if(balOpenCon<=0){balOpenCon=0}if(balCon<=0){balCon=0}if(princCon<=0){princCon=0}if(intCon<=0){intCon=0}if(balCon<0.01){princCon=balOpenCon}if(balCon<=0){princPaidCon=balCon}if(balOpenSnow<=0){balOpenSnow=0}if(balSnow<=0){balSnow=0}if(princSnow<=0){princSnow=0}if(intSnow<=0){intSnow=0}if(balSnow<0.01){princSnow=balOpenSnow}if(balSnow<=0){princPaidSnow=balSnow}if(balOpenAva<=0){balOpenAva=0}if(balAva<=0){balAva=0}if(princAva<=0){princAva=0}if(intAva<=0){intAva=0}if(balAva<0.01){princAva=balOpenAva}if(balAva<=0){princPaidAva=balAva}if(i%12==1){intYear=0;princYear=0;intYearSnow=0;princYearSnow=0;intYearAva=0;princYearAva=0;intYeairNewLoan=0;princYeairNewLoan=0}intYear+=intMonth;princYear+=princMonth;intYearSnow+=intSnow;princYearSnow+=princSnow;intYearAva+=intAva;princYearAva+=princAva;intYeairNewLoan+=intCon;princYeairNewLoan+=princCon;intPaid+=intMonth;princPaid+=princMonth;intPaidSnow+=intSnow;princPaidSnow+=princSnow;intPaidAva+=intAva;princPaidAva+=princAva;intPaidCon+=intCon;princPaidCon+=princCon;if(intMonth!=0){totalPaid+=pmtModT}else{totalPaid=totalPaid}if(intSnow!=0){totalPaidSnow+=pmtModSnow}else{totalPaidSnow=totalPaidSnow}if(intAva!=0){totalPaidAva+=pmtModAva}else{totalPaidAva=totalPaidAva}if(intCon!=0){totalPaidCon+=pmtModCon}else{totalPaidCon=totalPaidCon}if(princBalOpen>0.0001&&princBal<0.0001){debtPeriod=i;pmtLast=pmtModT}else{debtPeriod=debtPeriod;pmtLast=pmtLast}if(balOpenSnow>0.0001&&balSnow<0.0001){snowPeriod=i;pmtLastSnow=pmtModSnow}else{snowPeriod=snowPeriod;pmtLastSnow=pmtLastSnow}if(balOpenAva>0.0001&&balAva<0.0001){avaPeriod=i;pmtLastAva=pmtModAva}else{avaPeriod=avaPeriod;pmtLastAva=pmtLastAva}if(balOpenCon>0.0001&&balCon<0.0001){conPeriod=i;pmtLastCon=pmtModCon}else{conPeriod=conPeriod;pmtLastCon=pmtLastCon}}var iteration=0;var MAX_ITERATIONS=5000;var MIN_PRECISION=1e-7;var debtAPR=0;var snowAPR=0;var avaAPR=0;var conAPR=0;var guess=(r1+r2+r3+r4+r5+r6)/numberDebts/12;var iOld;var iNew=guess;snowPeriod=snowPeriod-1+pmtLastSnow/pmtMonthSnow;do{iOld=iNew;var dividendSnow=totalPmt2-totalPmt2*Math.pow(1+iNew,-snowPeriod)-iNew*totalDebt;var divisorSnow=totalPmt2*snowPeriod*Math.pow(1+iNew,-snowPeriod-1)-totalDebt;iNew=iNew-dividendSnow/divisorSnow;++iteration}while(Math.abs(iOld-iNew)>MIN_PRECISION&&iteration<=MAX_ITERATIONS);snowAPR=iNew*q*100;avaPeriod=avaPeriod-1+pmtLastAva/pmtMonthAva;do{iOld=iNew;var dividendAva=totalPmt2-totalPmt2*Math.pow(1+iNew,-avaPeriod)-iNew*totalDebt;var divisorAva=totalPmt2*avaPeriod*Math.pow(1+iNew,-avaPeriod-1)-totalDebt;iNew=iNew-dividendAva/divisorAva;++iteration}while(Math.abs(iOld-iNew)>MIN_PRECISION&&iteration<=MAX_ITERATIONS);avaAPR=iNew*q*100;var rWeight=(debt1*r1+debt2*r2+debt3*r3+debt4*r4+debt5*r5+debt6*r6)/totalDebt;debtAPR=8*100*rWeight/(8*100)*100;var guessCon=irNewLoan/12;var iOldCon;var iNewCon=guessCon;var pmt=0;if(myAim==5){conPeriod=loanTerm;pmt=pmtMonthCon}else{conPeriod=conPeriod-1+pmtLastCon/pmtMonthCon;pmt=pmtMonthCon}do{iOldCon=iNewCon;var dividendCon=pmt-pmt*Math.pow(1+iNewCon,-conPeriod)-iNewCon*(totalDebt-prepaidFee);var divisoirNewLoan=pmt*conPeriod*Math.pow(1+iNewCon,-conPeriod-1)-(totalDebt-prepaidFee);iNewCon=iNewCon-dividendCon/divisoirNewLoan;++iteration}while(Math.abs(iOldCon-iNewCon)>MIN_PRECISION&&iteration<=MAX_ITERATIONS);conAPR=iNewCon*q*100;var APR1=0;if(compare==1){APR1=debtAPR;debtPeriod1=debtPeriod;pmtMonth1=totalPmt2-pmtExtra;totalPaid1=totalPaid;intPaid1=intPaid}else if(compare==2){APR1=snowAPR;debtPeriod1=snowPeriod;pmtMonth1=totalPmt2;totalPaid1=totalPaidSnow;intPaid1=intPaidSnow}else if(compare==3){APR1=avaAPR;debtPeriod1=avaPeriod;pmtMonth1=totalPmt2;totalPaid1=totalPaidAva;intPaid1=intPaidAva}if(myAim==1){APR2=debtAPR;debtPeriod2=debtPeriod;pmtMonth2=totalPmt2-pmtExtra;totalPaid2=totalPaid;intPaid2=intPaid}else if(myAim==2){APR2=snowAPR;debtPeriod2=snowPeriod;pmtMonth2=totalPmt2;totalPaid2=totalPaidSnow;intPaid2=intPaidSnow}else if(myAim==3){APR2=avaAPR;debtPeriod2=avaPeriod;pmtMonth2=totalPmt2;totalPaid2=totalPaidAva;intPaid2=intPaidAva}else if(myAim==4){APR2=conAPR;debtPeriod2=conPeriod;pmtMonth2=pmtMonthCon;totalPaid2=totalPaidCon+prepaidFee;intPaid2=intPaidCon}else if(myAim==5){APR2=conAPR;debtPeriod2=conPeriod;pmtMonth2=pmtMonthCon;totalPaid2=totalPaidCon+prepaidFee;intPaid2=intPaidCon}if(conAPR<=0||snowAPR<=0||avaAPR<=0){repaymentInfo=1}else{repaymentInfo=0}return APR1});omni.define("getAPR2",function(apr1){if(apr1){return APR2}});omni.define("getTotalDebt",function(apr1){if(apr1){return totalDebt}});omni.define("getTotalPmt",function(apr1){if(apr1){return totalPmt}});omni.define("getTotalPmt2",function(apr1){if(apr1){return totalPmt2}});omni.define("getTotalInterest",function(apr1){if(apr1){return totalInterest}});omni.define("getRepaymentInfo",function(apr1){if(apr1){return repaymentInfo}});omni.define("getPmtMonth1",function(apr1){if(apr1){return pmtMonth1}});omni.define("getPmtMonth2",function(apr1){if(apr1){return pmtMonth2}});omni.define("getDebtPeriod1",function(apr1){if(apr1){return Math.ceil(debtPeriod1)}});omni.define("getDebtPeriod2",function(apr1){if(apr1){return Math.ceil(debtPeriod2)}});omni.define("getTotalPaid1",function(apr1){if(apr1){return totalPaid1}});omni.define("getTotalPaid2",function(apr1){if(apr1){return totalPaid2}});omni.define("getIntPaid1",function(apr1){if(apr1){return intPaid1}});omni.define("getIntPaid2",function(apr1){if(apr1){return intPaid2}});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Debt payoff takes Number of debts, Balance #1 and Interest rate #1 and returns Table Heading 1 and Table Heading 2. It is a single relationship that reads table Heading 1 out of number of debts, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Debt payoff calculator works', 'html' => <<<'TXT'
            <p>The Debt payoff calculator applies one relationship to 41 numbers and reports Table Heading 1 and Table Heading 2.</p><p>The answers are Table Heading 1 and Table Heading 2; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 41 boxes, and nothing else.</p><ul><li><strong>Number of debts</strong> — a plain number, no unit</li><li><strong>Balance #1</strong> — in USD</li><li><strong>Interest rate #1</strong> — in percent</li><li><strong>Payment #1</strong> — in USD</li><li><strong>Balance #2</strong> — in USD</li><li><strong>Interest rate #2</strong> — in percent</li><li><strong>Payment #2</strong> — in USD</li><li><strong>Balance #3</strong> — in USD</li><li><strong>Interest rate #3</strong> — in percent</li><li><strong>Payment #3</strong> — in USD</li><li><strong>Balance #4</strong> — in USD</li><li><strong>Interest rate #4</strong> — in percent</li><li><strong>Payment #4</strong> — in USD</li><li><strong>Balance #5</strong> — in USD</li><li><strong>Interest rate #5</strong> — in percent</li><li><strong>Payment #5</strong> — in USD</li><li><strong>Balance #6</strong> — in USD</li><li><strong>Interest rate #6</strong> — in percent</li><li><strong>Payment #6</strong> — in USD</li><li><strong>My aim</strong> — a plain number, no unit</li><li><strong>Total debt</strong> — a plain number, no unit</li><li><strong>Total current monthly payment</strong> — in USD</li><li><strong>Interest rate of the new loan</strong> — in percent</li><li><strong>Loan term</strong> — in years / months</li><li><strong>New payment</strong> — a plain number, no unit</li><li><strong>Prepaid fee</strong> — in USD. Here you can add any upfront financing fee that you need to pay before originating the loan.</li><li><strong>I can increase the monthly payment by…</strong> — in USD</li><li><strong>New monthly payment</strong> — in USD</li><li><strong>Compare results with…</strong> — a plain number, no unit</li><li><strong>Repayment Info check</strong> — a plain number, no unit</li><li><strong>Total interest</strong> — in percent</li><li><strong>Apr1</strong> — a plain number, no unit</li><li><strong>Apr2</strong> — a plain number, no unit</li><li><strong>Monthly payment1</strong> — in USD</li><li><strong>Monthly payment2</strong> — in USD</li><li><strong>Debt period1</strong> — in months</li><li><strong>Debt period2</strong> — in months</li><li><strong>Total paid1</strong> — in USD</li><li><strong>Total paid2</strong> — in USD</li><li><strong>Int paid1</strong> — in USD</li><li><strong>Int paid2</strong> — in USD</li></ul><p>What you get back is Table Heading 1, Table Heading 2, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Interest rate #1 offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Apr1, Apr2 and Total debt can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Interest rate #1, Interest rate #2 and Interest rate #3 is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Table Heading 1 and Table Heading 2 are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Number of debts left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Number of debts is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Balance #1 left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Balance #1 is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Number of debts to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Number of debts, Balance #1, Interest rate #1 and Payment #1. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Number of debts into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Table Heading 1 with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Table Heading 1 follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and years / months and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Number of debts, Balance #1 and Interest rate #1 are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Number of debts, Balance #1 and Interest rate #1 is what you already know and Table Heading 1 and Table Heading 2 is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/long-term-care">Long term care</a>, <a href="/finance/lgd">Loss given default Calculator</a> and <a href="/finance/loss-ratio">Loss ratio Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
            ['title' => 'Where this fits among the other calculators', 'html' => <<<'TXT'
            <p>Neighbouring pages resolve the parts of the same job that Debt payoff leaves alone. Knowing which is which saves running the wrong one:</p><p>Worth opening next: <a href="/finance/long-term-care">Long term care</a>, <a href="/finance/lgd">Loss given default Calculator</a> and <a href="/finance/loss-ratio">Loss ratio Calculator</a>. They follow the same pattern as this page (form, formula, worked example, answer), so a reader who understands one understands the others.</p><p>Using the page that already answers the question you have is better than adapting this one: the formula and the units will match what you expect, and the worked example will be about your case.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Debt payoff is a number to act on, so the useful question is what to do with Table Heading 1 and Table Heading 2 once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Number of debts, Balance #1, Interest rate #1 and Payment #1 alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Debt payoff calculator work out?', 'a' => 'Table Heading 1 and Table Heading 2, from Number of debts, Balance #1, Interest rate #1 and Payment #1.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Number of debts, Balance #1 (USD), Interest rate #1 (percent), Payment #1 (USD), Balance #2 (USD). With number of debts, balance #1 and interest rate #1 in place, Table Heading 1 can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Apr1, Apr2, Total debt and Total current monthly payment can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Table Heading 1 is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Number of debts left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Table Heading 1 keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/long-term-care', 'name' => 'Long term care'],
            ['path' => '/finance/lgd', 'name' => 'Loss given default Calculator'],
            ['path' => '/finance/loss-ratio', 'name' => 'Loss ratio Calculator'],
        ],
        'authors' => [],
    ],
];
