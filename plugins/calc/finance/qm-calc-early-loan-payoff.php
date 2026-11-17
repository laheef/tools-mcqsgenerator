<?php

/**
 * Early loan payoff
 * /finance/early-loan-payoff
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Early loan payoff',
    'meta' => ['title' => 'Early loan payoff Calculator: Free, With Steps', 'description' => 'Early loan payoff works out loan repayment from loan balance and loan term. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Early loan payoff Calculator', 'updated' => '2026-09-30'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'LoanAmount',
                            'label' => 'Loan balance',
                            'type' => 'number',
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
                            'name' => 'PmtType',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Use decreasing monthly payments' => '12', '' => '11'],
                            'dataset' => 'PmtType',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 't',
                            'label' => 'Loan term',
                            'type' => 'number',
                            'help' => 'The length of time over which you are obliged to pay off your loan.',
                            'unit' => '19',
                            'unit_default' => 'yrsmos',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '120',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'r',
                            'label' => 'Interest rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '7.5',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'CompoundFreq',
                            'label' => 'Compound frequency',
                            'type' => 'select',
                            'options' => ['Yearly' => '11', 'Semi-annually' => '12', 'Quarterly' => '13', 'Monthly' => '14'],
                            'dataset' => 'CompoundFreq',
                            'control' => 'DROPDOWN',
                            'default' => 'Monthly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'isBalloon',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Balloon payment' => '3', '' => '0'],
                            'dataset' => 'is balloon',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'BallonTime',
                            'label' => 'Balloon payment after',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '8',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PmtExtra',
                            'label' => 'Extra monthly payment',
                            'type' => 'number',
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
            'title' => 'Early loan payoff',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'a1 == 1 or a3 == 1', 'text' => <<<'TXT'
                                No extra payments Monthly repayment: {{getMonthlyRepayment.monetaryValue}} Total repayment amount: {{getTotalRepayment.monetaryValue}} Interest: {{getInterestPayment.monetaryValue}}
                                TXT],
                                ['when' => 'a5 ==1 or a6 == 1', 'text' => <<<'TXT'
                                Total repayment amount: {{getTotalRepayment.monetaryValue}} Total Interest: {{getInterestPayment.monetaryValue}}. Check the table below for information about each year’s repayment.
                                TXT],
                                ['when' => 'a7 == 1', 'text' => 'The loan term must be longer than the balloon payment period.'],
                                ['when' => 'a8 == 1', 'text' => <<<'TXT'
                                No balloon payment Monthly repayment: {{getMonthlyRepayment.monetaryValue}} Total repayment amount: {{getTotalRepayment.monetaryValue}} Interest: {{getInterestPayment.monetaryValue}} With balloon payment Monthly repayment: {{getMonthlyRepayment.monetaryValue}} How long: {{getPeriodsBallon.formattedValue}} months Balloon payment: {{getBalloonPayment.monetaryValue}} Total repayment amount: {{getTota
                                TXT],
                                ['when' => 'a11 == 1 and PmtType == 11', 'text' => <<<'TXT'
                                With extra payments Monthly repayment: {{getPmt.monetaryValue}} Loan term: {{getPayoffYears.formattedValue}} year(s), {{getPayoffMonths.formattedValue}} month(s) Shorter by: {{getShortenedYears.formattedValue}} year(s), {{getShortenedMonths.formattedValue}} month(s)
                                TXT],
                                ['when' => 'a11 == 1 and PmtType == 12', 'text' => <<<'TXT'
                                With extra payments Loan term: {{getPayoffYears.formattedValue}} year(s), {{getPayoffMonths.formattedValue}} month(s) Shorter by: {{getShortenedYears.formattedValue}} year(s), {{getShortenedMonths.formattedValue}} month(s)
                                TXT],
                                ['when' => 'a12 == 1 and PmtType == 11', 'text' => <<<'TXT'
                                With extra payments Monthly repayment: {{getPmt.monetaryValue}} Loan term: {{getPayoffMonths.formattedValue}} month(s) Shorter by: {{getShortenedMonths.formattedValue}} month(s)
                                TXT],
                                ['when' => 'a12 == 1 and PmtType == 12', 'text' => 'With extra payments Loan term: {{getPayoffMonths.formattedValue}} month(s) Shorter by: {{getShortenedMonths.formattedValue}} month(s)'],
                                ['when' => 'a13 == 1 and PmtType == 11', 'text' => <<<'TXT'
                                With extra payments Monthly repayment: {{getPmt.monetaryValue}} Loan term: {{getPayoffYears.formattedValue}} year(s), {{getPayoffMonths.formattedValue}} month(s) Shorter by: {{getShortenedMonths.formattedValue}} month(s)
                                TXT],
                                ['when' => 'a13 == 1 and PmtType == 12', 'text' => <<<'TXT'
                                With extra payments Loan term: {{getPayoffYears.formattedValue}} year(s), {{getPayoffMonths.formattedValue}} month(s) Shorter by: {{getShortenedMonths.formattedValue}} month(s)
                                TXT],
                                ['when' => 'a14 == 1 and PmtType == 11', 'text' => <<<'TXT'
                                With extra payments Monthly repayment: {{getPmt.monetaryValue}} Loan term: {{getPayoffYears.formattedValue}} year(s) Shorter by: {{getShortenedYears.formattedValue}} year(s), {{getShortenedMonths.formattedValue}} month(s)
                                TXT],
                                ['when' => 'a14 == 1 and PmtType == 12', 'text' => <<<'TXT'
                                With extra payments Loan term: {{getPayoffYears.formattedValue}} year(s) Shorter by: {{getShortenedYears.formattedValue}} year(s), {{getShortenedMonths.formattedValue}} month(s)
                                TXT],
                                ['when' => 'a15 == 1 and PmtType == 11', 'text' => <<<'TXT'
                                With extra payments Monthly repayment: {{getPmt.monetaryValue}} Loan term: {{getPayoffYears.formattedValue}} year(s), {{getPayoffMonths.formattedValue}} month(s) Shorter by: {{getShortenedYears.formattedValue}} year(s)
                                TXT],
                                ['when' => 'a15 == 1 and PmtType == 12', 'text' => <<<'TXT'
                                With extra payments Loan term: {{getPayoffYears.formattedValue}} year(s), {{getPayoffMonths.formattedValue}} month(s) Shorter by: {{getShortenedYears.formattedValue}} year(s)
                                TXT],
                                ['when' => 'a16 == 1 and PmtType == 11', 'text' => <<<'TXT'
                                With extra payments Monthly repayment: {{getPmt.monetaryValue}} Loan term: {{getPayoffMonths.formattedValue}} month(s) Shorter by: {{getShortenedMonths.formattedValue}} month(s)
                                TXT],
                                ['when' => 'a16 == 1 and PmtType == 12', 'text' => 'With extra payments Loan term: {{getPayoffMonths.formattedValue}} month(s) Shorter by: {{getShortenedMonths.formattedValue}} month(s)'],
                                ['when' => 'a17 == 1 and PmtType == 11', 'text' => <<<'TXT'
                                With extra payments Monthly repayment: {{getPmt.monetaryValue}} Loan term: {{getPayoffYears.formattedValue}} year(s) Shorter by: {{getShortenedYears.formattedValue}} year(s),
                                TXT],
                                ['when' => 'a17 == 1 and PmtType == 12', 'text' => 'With extra payments Loan term: {{getPayoffYears.formattedValue}} year(s) Shorter by: {{getShortenedYears.formattedValue}} year(s),'],
                                ['when' => 'a18 == 1', 'text' => <<<'TXT'
                                Total repayment amount: {{getTotalRepaymentExtra.monetaryValue}} Interest: {{getInterestPaymentExtra.monetaryValue}} You save: {{getTotalInterestSaved.monetaryValue}}
                                TXT],
                                ['when' => 'a19 == 1', 'text' => 'Total repayment amount: {{getTotalRepaymentExtra.monetaryValue}} Interest: {{getInterestPaymentExtra.monetaryValue}}'],
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
                            'name' => 'type',
                            'label' => 'Type',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'represent',
                            'label' => 'Display:',
                            'type' => 'select',
                            'options' => ['Line chart' => '1', 'Table' => '2', 'Graph and Table' => '3'],
                            'dataset' => 'represent',
                            'default' => 'Graph and Table',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'q',
                            'label' => 'Payment frequency',
                            'type' => 'select',
                            'options' => [
                                'quarterly' => '4',
                                'monthly' => '12',
                                'bi-weekly' => '26.08875',
                                'weekly' => '52.1775',
                                'annually' => '1',
                            ],
                            'control' => 'DROPDOWN',
                            'default' => 'monthly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'm',
                            'label' => 'M',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarTable',
                            'label' => 'Vartable',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'loanRepayment',
                            'label' => 'Loan repayment',
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
                            'name' => 'getMonthlyRepayment',
                            'label' => 'Get monthly repayment',
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
                            'name' => 'getBalloonPayment',
                            'label' => 'Get balloon payment',
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
                            'name' => 'getInterestPayment',
                            'label' => 'Get interest payment',
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
                            'name' => 'getMonthlyPrincipalPayment',
                            'label' => 'Get monthly principal payment',
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
                            'name' => 'getPayoffMonths',
                            'label' => 'Get payoff months',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'getPayoffYears',
                            'label' => 'Get payoff years',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'getPeriodsBallon',
                            'label' => 'Get periods ballon',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'getPmt',
                            'label' => 'Get pmt',
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
                            'name' => 'getShortenedMonths',
                            'label' => 'Get shortened months',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'getShortenedYears',
                            'label' => 'Get shortened years',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'getTotalInterestSaved',
                            'label' => 'Get total interest saved',
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
                            'name' => 'getTotalRepayment',
                            'label' => 'Get total repayment',
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
                            'name' => 'a1',
                            'label' => 'A1',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'a2',
                            'label' => 'A2',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'a3',
                            'label' => 'A3',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'a4',
                            'label' => 'A4',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'a5',
                            'label' => 'A5',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'a6',
                            'label' => 'A6',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'a7',
                            'label' => 'A7',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'a8',
                            'label' => 'A8',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'a9',
                            'label' => 'A9',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'a10',
                            'label' => 'A10',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'a11',
                            'label' => 'A11',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'a12',
                            'label' => 'A12',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'a13',
                            'label' => 'A13',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'a14',
                            'label' => 'A14',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'a15',
                            'label' => 'A15',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'a16',
                            'label' => 'A16',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'a17',
                            'label' => 'A17',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'a18',
                            'label' => 'A18',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'a19',
                            'label' => 'A19',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'getInterestPaymentExtra',
                            'label' => 'Get interest payment extra',
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
                            'name' => 'getTotalRepaymentExtra',
                            'label' => 'Get total repayment extra',
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
            'title' => 'loanRepayment = loanRepaymentCalc(r, t, m, q, type + isBalloon, LoanAmount, BallonTime, PmtExtra, VarTable)',
            'results' => ['loanRepayment' => 'loanRepaymentCalc(r, t, m, q, isBalloon + type, LoanAmount, BallonTime, PmtExtra, VarTable)'],
        ],
        [
            'title' => 'getMonthlyRepayment =monthlyRepayment()',
            'results' => ['getMonthlyRepayment' => 'monthlyRepayment()'],
        ],
        [
            'title' => 'getTotalRepayment= totalRepayment()',
            'results' => ['getTotalRepayment' => 'totalRepayment()'],
        ],
        [
            'title' => 'getInterestPayment=interestPayment()',
            'results' => ['getInterestPayment' => 'interestPayment()'],
        ],
        [
            'title' => 'getBalloonPayment=balloonPayment()',
            'results' => ['getBalloonPayment' => 'balloonPayment()'],
        ],
        [
            'title' => 'getTotalInterestSaved=totalInterestSaved()',
            'results' => ['getTotalInterestSaved' => 'totalInterestSaved()'],
        ],
        [
            'title' => 'getPayoffYears=payoffYears()',
            'results' => ['getPayoffYears' => 'payoffYears()'],
        ],
        [
            'title' => 'getPayoffMonths=payoffMonths()',
            'results' => ['getPayoffMonths' => 'payoffMonths()'],
        ],
        [
            'title' => 'getShortenedYears=shortenedYears()',
            'results' => ['getShortenedYears' => 'shortenedYears()'],
        ],
        [
            'title' => 'getShortenedMonths=shortenedMonths()',
            'results' => ['getShortenedMonths' => 'shortenedMonths()'],
        ],
        [
            'title' => 'getMonthlyPrincipalPayment=monthlyPrincipalPayment()',
            'results' => ['getMonthlyPrincipalPayment' => 'monthlyPrincipalPayment()'],
        ],
        [
            'title' => 'getPmt=pmt()',
            'results' => ['getPmt' => 'pmt()'],
        ],
        [
            'title' => 'getPeriodsBallon=periodsBallon()',
            'results' => ['getPeriodsBallon' => 'periodsBallon()'],
        ],
        [
            'title' => 'getTotalRepaymentExtra= totalRepaymentExtra2()',
            'results' => ['getTotalRepaymentExtra' => 'totalRepaymentExtra2()'],
        ],
        [
            'title' => 'getInterestPaymentExtra=interestPaymentExtra2()',
            'results' => ['getInterestPaymentExtra' => 'interestPaymentExtra2()'],
        ],
        [
            'title' => 'a1 = get_a1()',
            'results' => ['a1' => 'get_a1()'],
        ],
        [
            'title' => 'a2 = get_a2()',
            'results' => ['a2' => 'get_a2()'],
        ],
        [
            'title' => 'a3 = get_a3()',
            'results' => ['a3' => 'get_a3()'],
        ],
        [
            'title' => 'a4 = get_a4()',
            'results' => ['a4' => 'get_a4()'],
        ],
        [
            'title' => 'a5 = get_a5()',
            'results' => ['a5' => 'get_a5()'],
        ],
        [
            'title' => 'a6 = get_a6()',
            'results' => ['a6' => 'get_a6()'],
        ],
        [
            'title' => 'a7 = get_a7()',
            'results' => ['a7' => 'get_a7()'],
        ],
        [
            'title' => 'a8 = get_a8()',
            'results' => ['a8' => 'get_a8()'],
        ],
        [
            'title' => 'a9 = get_a9()',
            'results' => ['a9' => 'get_a9()'],
        ],
        [
            'title' => 'a10 = get_a10()',
            'results' => ['a10' => 'get_a10()'],
        ],
        [
            'title' => 'a11 = get_a11()',
            'results' => ['a11' => 'get_a11()'],
        ],
        [
            'title' => 'a12 = get_a12()',
            'results' => ['a12' => 'get_a12()'],
        ],
        [
            'title' => 'a13 = get_a13()',
            'results' => ['a13' => 'get_a13()'],
        ],
        [
            'title' => 'a14 = get_a14()',
            'results' => ['a14' => 'get_a14()'],
        ],
        [
            'title' => 'a15 = get_a15()',
            'results' => ['a15' => 'get_a15()'],
        ],
        [
            'title' => 'a16 = get_a16()',
            'results' => ['a16' => 'get_a16()'],
        ],
        [
            'title' => 'a17 = get_a17()',
            'results' => ['a17' => 'get_a17()'],
        ],
        [
            'title' => 'a18 = get_a18()',
            'results' => ['a18' => 'get_a18()'],
        ],
        [
            'title' => 'a19 = get_a19()',
            'results' => ['a19' => 'get_a19()'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";var monthlyRepayment1=0;var totalRepayment=0;var interestPayment=0;var balloonPayment=0;var totalInterestSaved=0;var payoffYears=0;var payoffMonths=0;var shortenedYears=0;var shortenedMonths=0;var monthlyPrincipalPayment=0;var pmt=0;var periodsBallon=0;var totalRepaymentExtra=0;var interestPaymentExtra=0;var a1=0,a2=0,a3=0,a4=0,a5=0;var a6=0,a7=0,a8=0,a9=0,a10=0;var a11=0,a12=0,a13=0,a14=0,a15=0;var a16=0,a17=0,a18=0,a19=0;omni.define("loanRepaymentCalc",function(_r,_t,_m,_q,_type,_LoanAmount,_BallonTime,_PmtExtra,_VarTable){var r=Number(_r);var t=Number(_t);var m=Number(_m);var q=Number(_q);var type=Number(_type);if(Number(_type)==15){type=12}var LoanAmount=Number(_LoanAmount);var BallonTime=Number(_BallonTime);var PmtExtra=Number(_PmtExtra);monthlyRepayment1=0;totalRepayment=0;interestPayment=0;balloonPayment=0;totalInterestSaved=0;payoffYears=0;payoffMonths=0;shortenedYears=0;shortenedMonths=0;monthlyPrincipalPayment=0;pmt=0;periodsBallon=0;totalRepaymentExtra=0;interestPaymentExtra=0;a1=0;a2=0;a3=0;a4=0;a5=0;a6=0;a7=0;a8=0;a9=0;a10=0;a11=0;a12=0;a13=0;a14=0;a15=0;a16=0;a17=0;a18=0;a19=0;var periods=q*t;var periodsBallon_local=q*BallonTime;periodsBallon=periodsBallon_local;var PmtCalc;var TotalPmt;var InterestPmt;var balance;var eq_p=mathjs.pow(1+r/m,m/q)-1;if(type===11){PmtCalc=LoanAmount*eq_p*mathjs.pow(1+eq_p,periods)/(mathjs.pow(1+eq_p,periods)-1);TotalPmt=PmtCalc*periods;InterestPmt=TotalPmt-LoanAmount;if(PmtExtra===0){a1=1;monthlyRepayment1=mathjs.round(PmtCalc,2);a2=1;totalRepayment=mathjs.round(TotalPmt,2);interestPayment=mathjs.round(InterestPmt,2)}else{a3=1;monthlyRepayment1=mathjs.round(PmtCalc,2);a4=1;totalRepayment=mathjs.round(TotalPmt,2);interestPayment=mathjs.round(InterestPmt,2)}}if(type===12){PmtCalc=LoanAmount/periods;var totalPmtEvenPrincipal=LoanAmount*(1+r/m*(periods+1)/2);var totalInterestPrincipal=totalPmtEvenPrincipal-LoanAmount;if(PmtExtra===0){a5=1;monthlyPrincipalPayment=mathjs.round(PmtCalc,2);totalRepayment=mathjs.round(totalPmtEvenPrincipal,2);interestPayment=mathjs.round(totalInterestPrincipal,2)}if(PmtExtra!==0){a6=1;monthlyPrincipalPayment=mathjs.round(PmtCalc+PmtExtra,2);totalRepayment=mathjs.round(totalPmtEvenPrincipal,2);interestPayment=mathjs.round(totalInterestPrincipal,2)}}if(type===14){PmtExtra=0;PmtCalc=LoanAmount*eq_p*mathjs.pow(1+eq_p,periods)/(mathjs.pow(1+eq_p,periods)-1);balance=LoanAmount*mathjs.pow(1+eq_p,periodsBallon-1)-PmtCalc/eq_p*(mathjs.pow(1+eq_p,periodsBallon-1)-1);TotalPmt=PmtCalc*periods;InterestPmt=TotalPmt-LoanAmount;totalRepayment=mathjs.round(TotalPmt,2);interestPayment=mathjs.round(TotalPmt-LoanAmount,2);InterestPmt=balance*eq_p;TotalPmt=PmtCalc*(periodsBallon-1)+balance+InterestPmt;if(periodsBallon>periods){a7=1}else{a8=1;monthlyRepayment1=mathjs.round(PmtCalc,2);balloonPayment=mathjs.round(balance*(1+eq_p),2);a9=1;totalRepaymentExtra=mathjs.round(TotalPmt,2);interestPaymentExtra=mathjs.round(TotalPmt-LoanAmount,2);totalInterestSaved=mathjs.round(totalRepayment-totalRepaymentExtra,2)}}var periodsMonth=t*12;if(type===14){PmtExtra=0}var pmt_local=PmtCalc+PmtExtra;pmt=pmt_local;var i;var intMonth;var princMonth;var princPaid=0;var intPaid=0;var princBalOpen;var princBalClose;var PowOpen;var PowClose;var periodCount;var periodCountExtra=0;for(i=0;i<=periodsMonth;i++){PowOpen=i-1;PowClose=i;princBalOpen=LoanAmount*mathjs.pow(1+eq_p,PowOpen)-pmt_local/eq_p*(mathjs.pow(1+eq_p,PowOpen)-1);princBalClose=LoanAmount*mathjs.pow(1+eq_p,PowClose)-pmt_local/eq_p*(mathjs.pow(1+eq_p,PowClose)-1);intMonth=princBalOpen*eq_p;princMonth=princBalOpen-princBalClose;if(princBalOpen<pmt_local){princMonth=princBalOpen;princBalClose=0}if(princBalOpen<=0){princBalOpen=0}if(princBalClose<1e-6){princBalClose=0}if(intMonth<=0){intMonth=0}if(princMonth<=0){princMonth=0}if(type===12){princPaid=pmt_local*(i-1);princBalOpen=LoanAmount-princPaid;princMonth=pmt_local;intMonth=princBalOpen*eq_p;princBalClose=princBalOpen-princMonth}if(intMonth<=0){princBalOpen=0}if(princBalClose<1e-6){princBalClose=0}if(intMonth<=0){intMonth=0}if(intMonth<=0){princMonth=0}if(intMonth<=0){princPaid=LoanAmount}if(princPaid<=0){princPaid=0}if(i===0){intMonth=0}if(princBalClose===0&&princBalOpen!==0){periodCount=i}else{periodCount=0}periodCountExtra+=periodCount;if(type===14&&princBalClose<balance){princMonth=balance;intMonth=balance*eq_p;princBalClose=0}if(princBalClose===LoanAmount){princMonth=0}if(princPaid===LoanAmount){intMonth=0}if(intMonth===0){princMonth=0}if(i>0){princPaid+=princMonth;intPaid+=intMonth}if(type===14){t=BallonTime}}var years=Math.trunc(periodCountExtra/12);var months=periodCountExtra-years*12;var years2=Math.trunc((periods-periodCountExtra)/12);var months2=periods-periodCountExtra-years2*12;payoffYears=years;payoffMonths=months;shortenedYears=years2;shortenedMonths=months2;if(type===12&&PmtExtra===0){a10=1;totalRepayment=mathjs.round(intPaid+princPaid,2);interestPayment=mathjs.round(intPaid,2)}if(PmtExtra!==0&&years!==0&&years2!==0&&months!==0&&months2!==0){a11=1}if(PmtExtra!==0&&years===0&&years2!==0&&months!==0&&months2!==0){a12=1}if(PmtExtra!==0&&years!==0&&years2===0&&months!==0&&months2!==0){a13=1}if(PmtExtra!==0&&years!==0&&years2!==0&&months===0&&months2!==0){a14=1}if(PmtExtra!==0&&years!==0&&years2!==0&&months!==0&&months2===0){a15=1}if(PmtExtra!==0&&years===0&&years2===0&&months!==0&&months2!==0){a16=1}if(PmtExtra!==0&&years!==0&&years2!==0&&months===0&&months2===0){a17=1}if(PmtExtra!==0&&type===11){a18=1;totalRepaymentExtra=mathjs.round(LoanAmount+intPaid,2);interestPaymentExtra=mathjs.round(intPaid,2);totalInterestSaved=mathjs.round(TotalPmt-(LoanAmount+intPaid),2)}if(PmtExtra!==0&&type===12){a19=1;totalRepaymentExtra=mathjs.round(LoanAmount+intPaid,2);interestPaymentExtra=mathjs.round(intPaid,2)}return 1});omni.define("monthlyRepayment",function(){return monthlyRepayment1});omni.define("totalRepayment",function(){return totalRepayment});omni.define("interestPayment",function(){return interestPayment});omni.define("balloonPayment",function(){return balloonPayment});omni.define("totalInterestSaved",function(){return totalInterestSaved});omni.define("payoffYears",function(){return payoffYears});omni.define("payoffMonths",function(){return payoffMonths});omni.define("shortenedYears",function(){return shortenedYears});omni.define("shortenedMonths",function(){return shortenedMonths});omni.define("monthlyPrincipalPayment",function(){return monthlyPrincipalPayment});omni.define("pmt",function(){return pmt});omni.define("periodsBallon",function(){return periodsBallon-1});omni.define("totalRepaymentExtra2",function(){return totalRepaymentExtra});omni.define("interestPaymentExtra2",function(){return interestPaymentExtra});omni.define("get_a1",function(){return a1});omni.define("get_a2",function(){return a2});omni.define("get_a3",function(){return a3});omni.define("get_a4",function(){return a4});omni.define("get_a5",function(){return a5});omni.define("get_a6",function(){return a6});omni.define("get_a7",function(){return a7});omni.define("get_a8",function(){return a8});omni.define("get_a9",function(){return a9});omni.define("get_a10",function(){return a10});omni.define("get_a11",function(){return a11});omni.define("get_a12",function(){return a12});omni.define("get_a13",function(){return a13});omni.define("get_a14",function(){return a14});omni.define("get_a15",function(){return a15});omni.define("get_a16",function(){return a16});omni.define("get_a17",function(){return a17});omni.define("get_a18",function(){return a18});omni.define("get_a19",function(){return a19});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Early loan payoff takes Loan balance, Loan term and Interest rate and returns Type and M. There is no hidden constant here: change type and loan balance moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Early loan payoff calculator works', 'html' => <<<'TXT'
            <p>Early loan payoff answers one question from 43 numbers, and the answer is Type and M.</p><p>In the form&#039;s own words, Loan repayment = loanRepaymentCalc(Interest rate, Loan term, M, Payment frequency, Is Balloon + Type, Loan balance, Balloon payment after, Extra monthly payment, Vartable).</p><p>The result panel carries Type and M, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 43 boxes and the page has everything it needs.</p><ul><li><strong>Loan balance</strong> — in USD</li><li><strong>Loan term</strong> — in years / months. The length of time over which you are obliged to pay off your loan.</li><li><strong>Interest rate</strong> — in percent</li><li><strong>Compound frequency</strong> — a plain number, no unit</li><li><strong>Balloon payment after</strong> — in years</li><li><strong>Extra monthly payment</strong> — in USD</li><li><strong>Display</strong> — a plain number, no unit</li><li><strong>Payment frequency</strong> — a plain number, no unit</li><li><strong>Vartable</strong> — a plain number, no unit</li><li><strong>Loan repayment</strong> — in USD</li><li><strong>Get monthly repayment</strong> — in USD</li><li><strong>Get balloon payment</strong> — in USD</li><li><strong>Get interest payment</strong> — in USD</li><li><strong>Get monthly principal payment</strong> — in USD</li><li><strong>Get payoff months</strong> — a plain number, no unit</li><li><strong>Get payoff years</strong> — a plain number, no unit</li><li><strong>Get periods ballon</strong> — a plain number, no unit</li><li><strong>Get pmt</strong> — in USD</li><li><strong>Get shortened months</strong> — a plain number, no unit</li><li><strong>Get shortened years</strong> — a plain number, no unit</li><li><strong>Get total interest saved</strong> — in USD</li><li><strong>Get total repayment</strong> — in USD</li><li><strong>A1</strong> — a plain number, no unit</li><li><strong>A2</strong> — a plain number, no unit</li><li><strong>A3</strong> — a plain number, no unit</li><li><strong>A4</strong> — a plain number, no unit</li><li><strong>A5</strong> — a plain number, no unit</li><li><strong>A6</strong> — a plain number, no unit</li><li><strong>A7</strong> — a plain number, no unit</li><li><strong>A8</strong> — a plain number, no unit</li><li><strong>A9</strong> — a plain number, no unit</li><li><strong>A10</strong> — a plain number, no unit</li><li><strong>A11</strong> — a plain number, no unit</li><li><strong>A12</strong> — a plain number, no unit</li><li><strong>A13</strong> — a plain number, no unit</li><li><strong>A14</strong> — a plain number, no unit</li><li><strong>A15</strong> — a plain number, no unit</li><li><strong>A16</strong> — a plain number, no unit</li><li><strong>A17</strong> — a plain number, no unit</li><li><strong>A18</strong> — a plain number, no unit</li><li><strong>A19</strong> — a plain number, no unit</li><li><strong>Get interest payment extra</strong> — in USD</li><li><strong>Get total repayment extra</strong> — in USD</li></ul><p>What you get back is Type, M, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Loan term offers 9 units and opens on years / months, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Loan repayment</strong> = <code>loanRepaymentCalc(Interest rate, Loan term, M, Payment frequency, Is Balloon + Type, Loan balance, Balloon payment after, Extra monthly payment, Vartable)</code></li><li><strong>Get monthly repayment</strong> = <code>monthlyRepayment()</code></li><li><strong>Get total repayment</strong> = <code>totalRepayment()</code></li><li><strong>Get interest payment</strong> = <code>interestPayment()</code></li><li><strong>Get balloon payment</strong> = <code>balloonPayment()</code></li><li><strong>Get total interest saved</strong> = <code>totalInterestSaved()</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Loan repayment</strong> = <code>loanRepaymentCalc(Interest rate, Loan term, M, Payment frequency, Is Balloon + Type, Loan balance, Balloon payment after, Extra monthly payment, Vartable)</code> — the form to use when Interest rate, Loan term, M and Payment frequency are the values you have.</li><li><strong>Get monthly repayment</strong> = <code>monthlyRepayment()</code> — the form to use when the other values are known.</li><li><strong>Get total repayment</strong> = <code>totalRepayment()</code> — the form to use when the other values are known.</li><li><strong>Get interest payment</strong> = <code>interestPayment()</code> — the form to use when the other values are known.</li><li><strong>Get balloon payment</strong> = <code>balloonPayment()</code> — the form to use when the other values are known.</li><li><strong>Get total interest saved</strong> = <code>totalInterestSaved()</code> — the form to use when the other values are known.</li><li><strong>Get payoff years</strong> = <code>payoffYears()</code> — the form to use when the other values are known.</li><li><strong>Get payoff months</strong> = <code>payoffMonths()</code> — the form to use when the other values are known.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Loan repayment, Get monthly repayment and Get total repayment can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Loan term, Interest rate and Balloon payment after is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Type and M are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Loan balance left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Loan balance is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Loan term left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Loan term is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Loan balance to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Loan balance, Loan term, Interest rate and Compound frequency ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Loan balance — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Type against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Type follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are years / months and percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Loan balance, Loan term and Interest rate are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Loan balance, Loan term and Interest rate measured, Type and M wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/sales">Sales</a>, <a href="/finance/savings-goal">Savings goal Calculator</a> and <a href="/finance/savings-interest-rate">Savings interest rate Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Early loan payoff is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Early loan payoff is a number to act on, so the useful question is what to do with Type and M once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Loan balance, Loan term, Interest rate and Compound frequency alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Early loan payoff calculator work out?', 'a' => <<<'TXT'
            Type and M, from Interest rate, Loan term, M and Payment frequency. The relationship is Loan repayment = loanRepaymentCalc(Interest rate, Loan term, M, Payment frequency, Is Balloon + Type, Loan balance, Balloon payment after, Extra monthly payment, Vartable).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Loan balance (USD), Loan term (years / months), Interest rate (percent), Compound frequency, Balloon payment after (years). Enter loan balance, loan term and interest rate; Type is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Loan repayment, Get monthly repayment, Get total repayment and Get interest payment can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Type is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Loan balance blank and the page solves for it, reporting Type instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Type at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/sales', 'name' => 'Sales'],
            ['path' => '/finance/savings-goal', 'name' => 'Savings goal Calculator'],
            ['path' => '/finance/savings-interest-rate', 'name' => 'Savings interest rate Calculator'],
        ],
        'authors' => [],
    ],
];
