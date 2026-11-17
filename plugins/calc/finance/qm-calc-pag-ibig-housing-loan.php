<?php

/**
 * Pag IBIG housing loan
 * /finance/pag-ibig-housing-loan
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Pag IBIG housing loan',
    'meta' => ['title' => 'Pag IBIG housing loan Calculator: Free, With Steps', 'description' => 'Enter estimated value of property, loan amount and repayment period and Pag IBIG housing loan returns estimated equity and Loan-to-appraised value (LTV) ratio.', 'h1' => 'Pag IBIG housing loan Calculator', 'updated' => '2026-09-14'],
    'sections' => [
        [
            'title' => 'Loanable amount based on property value',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'propertyValue',
                            'label' => 'Estimated value of property',
                            'type' => 'number',
                            'prefix' => '₱',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'estimatedEquity',
                            'label' => 'Estimated equity',
                            'type' => 'number',
                            'prefix' => '₱',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'LTVratio',
                            'label' => 'Loan-to-appraised value (LTV) ratio',
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
                            'name' => 'loanableAmount',
                            'label' => 'Loanable amount',
                            'type' => 'number',
                            'prefix' => '₱',
                            'help' => 'Maximum amount you can borrow based on the estimated value of property.',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Loan and repayment details',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'loanAmount',
                            'label' => 'Loan amount',
                            'type' => 'number',
                            'prefix' => '₱',
                            'help' => 'Amount you decide to borrow. Also the loanable amount based on the gross annual or monthly income.',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        You can only borrow up to ₱10,000,000.00 from Pag-IBIG. You can inquire with local banks or other lending companies if you need to borrow the calculated loan amount.
                        TXT],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'repaymentPeriod',
                            'label' => 'Repayment period',
                            'type' => 'select',
                            'options' => [
                                '1 year' => '1',
                                '2 years' => '2',
                                '3 years' => '3',
                                '4 years' => '4',
                                '5 years' => '5',
                                '6 years' => '6',
                                '7 years' => '7',
                                '8 years' => '8',
                                '9 years' => '09',
                                '10 years' => '10',
                                '11 years' => '11',
                                '12 years' => '12',
                                '13 years' => '13',
                                '14 years' => '14',
                                '15 years' => '15',
                                '16 years' => '16',
                                '17 years' => '17',
                                '18 years' => '18',
                                '19 years' => '19',
                                '20 years' => '20',
                                '21 years' => '21',
                                '22 years' => '22',
                                '23 years' => '23',
                                '24 years' => '24',
                                '25 years' => '25',
                                '26 years' => '26',
                                '27 years' => '27',
                                '28 years' => '28',
                                '29 years' => '29',
                                '30 years' => '30',
                            ],
                            'dataset' => 'repayment period',
                            'control' => 'DROPDOWN',
                            'defaults' => [
                                ['value' => '30 years', 'when' => null],
                                ['value' => '30 years', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fixedPricingPeriod',
                            'label' => 'Fixed pricing period',
                            'type' => 'select',
                            'options' => [
                                '1 year (5.750%)' => '5.750',
                                '3 years (4.5%) - up to ₱4.9 million' => '4.5',
                                '3 years (5.750%) - up to ₱10 million' => '5.75000001',
                                '5 years (3%) - 4PH socialized housing' => '3',
                                '5 years (6.500%)' => '6.500',
                                '10 years (7.125%)' => '7.125',
                                '15 years (7.750%)' => '7.750',
                                '20 years (8.500%)' => '8.500',
                                '25 years (9.125%)' => '9.125',
                                '30 years (9.750%)' => '9.750',
                            ],
                            'dataset' => 'fixed pricing period 2023-2026',
                            'control' => 'DROPDOWN',
                            'default' => '30 years (9.750%)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'fixedPricingPeriod == 3 and (not(hasValue(propertyValue)) or propertyValue <= 950000)', 'text' => 'Learn more about the expanded 4PH program for first-time buyers of socialized housing.'],
                                ['when' => 'fixedPricingPeriod == 4.5 and (not(hasValue(loanAmount)) or loanAmount <= 4900000)', 'text' => 'For borrowers who do not fall under 4PH and loans up to ₱4.9 million. Learn more about the 2026 promo rates.'],
                                ['when' => 'fixedPricingPeriod == 5.75000001', 'text' => 'For borrowers who do not fall under 4PH and loans up to ₱10 million. Learn more about the 2026 promo rates.'],
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
                                ['when' => 'fixedPricingPeriod == 3 and propertyValue > 950000', 'text' => 'The property may not qualify for the expanded 4PH program. If it is a socialized condo unit, its value can be up to ₱1.8&nbsp;million. Learn more'],
                                ['when' => 'fixedPricingPeriod == 4.5 and loanAmount > 4900000', 'text' => 'The loan amount must be ₱4.9 million or less to qualify for the 4.5% promo rate. Learn more about the 2026 promo rates.'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'annualInterest',
                            'label' => 'Annual Interest',
                            'type' => 'number',
                            'prefix' => '₱',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'monthlyInterest',
                            'label' => '↳ Monthly interest',
                            'type' => 'number',
                            'prefix' => '₱',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'principalPayment',
                            'label' => 'Monthly principal payment',
                            'type' => 'number',
                            'prefix' => '₱',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'principalAndInterest',
                            'label' => 'Monthly principal and interest',
                            'type' => 'number',
                            'prefix' => '₱',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'monthlyInsurancePremium',
                            'label' => 'Monthly insurance premium',
                            'type' => 'number',
                            'prefix' => '₱',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'multiplierForInsurance',
                            'label' => 'Multiplier for insurance',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.000225',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'totalMonthlyAmortization',
                            'label' => 'Total monthly amortization',
                            'type' => 'number',
                            'prefix' => '₱',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'totalRepaymentAmount',
                            'label' => 'Total repayment amount',
                            'type' => 'number',
                            'prefix' => '₱',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Income details',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'grossAnnualIncome',
                            'label' => 'Gross annual income',
                            'type' => 'number',
                            'prefix' => '₱',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'grossMonthlyIncome',
                            'label' => 'Gross monthly income',
                            'type' => 'number',
                            'prefix' => '₱',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
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
                            'name' => 'oldAdvancedMode',
                            'label' => 'Show other calculated values?',
                            'type' => 'select',
                            'options' => ['No' => '0', 'Yes' => '1'],
                            'dataset' => 'yesNoOption',
                            'help' => 'Choosing "Yes" will display the estimated equity, LTV ratio, annual and monthly interests, monthly principal payment, and total repayment amount.',
                            'default' => 'No',
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'LTVratio = (1-ceil(floor((propertyValue)/2500000)/(propertyValue*1000)))*0.95+0.9*(ceil(floor((propertyValue)/2500000)/(propertyValue*1000)))',
            'results' => ['LTVratio' => '19/20 - 1/20*ceil((1/1000)*floor((1/2500000)*propertyValue)/propertyValue)'],
        ],
        [
            'title' => <<<'TXT'
            loanableAmount = propertyValue * ((1-ceil(floor((propertyValue)/2500000)/(propertyValue*1000)))*0.95+0.9*(ceil(floor((propertyValue)/2500000)/(propertyValue*1000))))
            TXT,
            'results' => ['loanableAmount' => '(1/20)*propertyValue*(19 - ceil((1/1000)*floor((1/2500000)*propertyValue)/propertyValue))'],
        ],
        [
            'title' => <<<'TXT'
            principalAndInterest = (loanAmount) * (fixedPricingPeriod/1200 * (1 + fixedPricingPeriod/1200)^(repaymentPeriod*12)) / ((1 + fixedPricingPeriod/1200)^(repaymentPeriod*12) - 1)
            TXT,
            'results' => ['loanAmount' => <<<'TXT'
            principalAndInterest*1200/fixedPricingPeriod*(1-pow(1+fixedPricingPeriod/1200, -12*repaymentPeriod))
            TXT, 'repaymentPeriod' => '-log(1-fixedPricingPeriod*loanAmount/(1200*principalAndInterest))/(12*log(1+fixedPricingPeriod/1200))', 'principalAndInterest' => <<<'TXT'
            loanAmount*(fixedPricingPeriod/1200)/(1-pow(1+fixedPricingPeriod/1200,-12*repaymentPeriod))
            TXT],
        ],
        [
            'title' => <<<'TXT'
            estimatedEquity = one_way(propertyValue - ( propertyValue * ((1-ceil(floor((propertyValue)/2500000)/(propertyValue*1000)))*0.95+0.9*(ceil(floor((propertyValue)/2500000)/(propertyValue*1000))))))
            TXT,
            'results' => ['estimatedEquity' => '((1/20)*propertyValue*(ceil((1/1000)*floor((1/2500000)*propertyValue)/propertyValue) + 1))'],
        ],
        [
            'title' => 'annualInterest = loanAmount * fixedPricingPeriod/100',
            'results' => ['annualInterest' => '(1/100)*fixedPricingPeriod*loanAmount', 'loanAmount' => '100*annualInterest/fixedPricingPeriod', 'fixedPricingPeriod' => '100*annualInterest/loanAmount'],
        ],
        [
            'title' => 'monthlyInterest = ((loanAmount) * fixedPricingPeriod/100)/12',
            'results' => ['loanAmount' => '1200*monthlyInterest/fixedPricingPeriod', 'fixedPricingPeriod' => '1200*monthlyInterest/loanAmount', 'monthlyInterest' => '(1/1200)*fixedPricingPeriod*loanAmount'],
        ],
        [
            'title' => 'monthlyInsurancePremium = loanAmount * multiplierForInsurance',
            'results' => ['loanAmount' => 'monthlyInsurancePremium/multiplierForInsurance', 'multiplierForInsurance' => 'monthlyInsurancePremium/loanAmount', 'monthlyInsurancePremium' => 'loanAmount*multiplierForInsurance'],
        ],
        [
            'title' => 'totalRepaymentAmount = totalMonthlyAmortization * 12 * repaymentPeriod',
            'results' => ['repaymentPeriod' => '(1/12)*totalRepaymentAmount/totalMonthlyAmortization', 'totalRepaymentAmount' => '12*repaymentPeriod*totalMonthlyAmortization', 'totalMonthlyAmortization' => '(1/12)*totalRepaymentAmount/repaymentPeriod'],
        ],
        [
            'title' => 'grossMonthlyIncome = principalAndInterest / 0.35',
            'results' => ['grossMonthlyIncome' => '(20/7)*principalAndInterest', 'principalAndInterest' => '(7/20)*grossMonthlyIncome'],
        ],
        [
            'title' => 'grossAnnualIncome = grossMonthlyIncome * 12',
            'results' => ['grossMonthlyIncome' => '(1/12)*grossAnnualIncome', 'grossAnnualIncome' => '12*grossMonthlyIncome'],
        ],
        [
            'title' => <<<'TXT'
            totalMonthlyAmortization = (loanAmount) * (fixedPricingPeriod/1200 * (1 + fixedPricingPeriod/1200)^(repaymentPeriod*12)) / ((1 + fixedPricingPeriod/1200)^(repaymentPeriod*12) - 1) + (loanAmount * multiplierForInsurance)
            TXT,
            'results' => ['loanAmount' => <<<'TXT'
            totalMonthlyAmortization*(1-pow(1+fixedPricingPeriod/1200,-12*repaymentPeriod))/(fixedPricingPeriod/1200+multiplierForInsurance*(1-pow(1+fixedPricingPeriod/1200,-12*repaymentPeriod)))
            TXT, 'repaymentPeriod' => <<<'TXT'
            -log(1-(fixedPricingPeriod/1200)/(totalMonthlyAmortization/loanAmount-multiplierForInsurance))/(12*log(1+fixedPricingPeriod/1200))
            TXT, 'totalMonthlyAmortization' => <<<'TXT'
            totalMonthlyAmortization/loanAmount-(fixedPricingPeriod/1200)/(1-pow(1+fixedPricingPeriod/1200,-12*repaymentPeriod))
            TXT, 'multiplierForInsurance' => <<<'TXT'
            totalMonthlyAmortization/loanAmount-(fixedPricingPeriod/1200)/(1-pow(1+fixedPricingPeriod/1200,-12*repaymentPeriod))
            TXT],
        ],
        [
            'title' => 'principalPayment = one_way(principalAndInterest - ((loanAmount) * fixedPricingPeriod/100)/12)',
            'results' => ['principalPayment' => '(-1/1200*fixedPricingPeriod*loanAmount + principalAndInterest)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Pag IBIG housing loan turns Estimated value of property into Estimated equity and Loan-to-appraised value (LTV) ratio. There is no hidden constant here: change estimated equity and estimated value of property moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Pag IBIG housing loan calculator works', 'html' => <<<'TXT'
            <p>Pag IBIG housing loan answers one question from 1 number, and the answer is Estimated equity, Loan-to-appraised value (LTV) ratio and Loanable amount.</p><p>Written with the labels from the form, Loan-to-appraised value (LTV) ratio = 19 ÷ 20 − 1 ÷ 20 × ceil((1 ÷ 1000) × floor((1 ÷ 2500000) × Estimated value of property) ÷ Estimated value of property).</p><p>What comes back is Estimated equity, Loan-to-appraised value (LTV) ratio, Loanable amount and Loan amount — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 1 box, and nothing else.</p><ul><li><strong>Estimated value of property</strong> — a plain number, no unit</li></ul><p>The result boxes are Estimated equity, Loan-to-appraised value (LTV) ratio in percent, Loanable amount, Loan amount, Repayment period, Fixed pricing period, Annual Interest, ↳ Monthly interest, Monthly principal payment, Monthly principal and interest, Monthly insurance premium, Multiplier for insurance, Total monthly amortization, Total repayment amount, Gross annual income, Gross monthly income; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Estimated value of property = 3 and Show other calculated values? = 0 gives <strong>Repayment period</strong> = 30, <strong>Fixed pricing period</strong> = 9.75, <strong>Loan-to-appraised value (LTV) ratio</strong> = 0.95 perc, <strong>Loanable amount</strong> = 2.85 and <strong>Estimated equity</strong> = 0.15.</p><ul><li><strong>Repayment period</strong> = 30</li><li><strong>Fixed pricing period</strong> = 9.75</li><li><strong>Loan-to-appraised value (LTV) ratio</strong> = 0.95 perc</li><li><strong>Loanable amount</strong> = 2.85</li><li><strong>Estimated equity</strong> = 0.15</li></ul><p>That is <strong>Loan-to-appraised value (LTV) ratio</strong> = <code>19 ÷ 20 − 1 ÷ 20 × ceil((1 ÷ 1000) × floor((1 ÷ 2500000) × Estimated value of property) ÷ Estimated value of property)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Repayment period</strong> = 30, <strong>Fixed pricing period</strong> = 9.75, <strong>Loan-to-appraised value (LTV) ratio</strong> = 0.95, <strong>Loanable amount</strong> = 2.85 and <strong>Estimated equity</strong> = 0.15 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Loan-to-appraised value (LTV) ratio offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Loan-to-appraised value (LTV) ratio</strong> = <code>19 ÷ 20 − 1 ÷ 20 × ceil((1 ÷ 1000) × floor((1 ÷ 2500000) × Estimated value of property) ÷ Estimated value of property)</code></li><li><strong>Loanable amount</strong> = <code>(1 ÷ 20) × Estimated value of property × (19 − ceil((1 ÷ 1000) × floor((1 ÷ 2500000) × Estimated value of property) ÷ Estimated value of property))</code></li><li><strong>Monthly principal and interest</strong> = <code>(1 ÷ 1200) × Fixed pricing period × Loan amount × (Fixed pricing period + 1200)^(12 × Repayment period) ÷ ( − (1200)^(12 × Repayment period) + (Fixed pricing period + 1200)^(12 × Repayment period))</code></li><li><strong>Repayment period</strong> = <code>− ln( − 1 ÷ 1200 × Fixed pricing period × Loan amount ÷ Monthly principal and interest + 1) ÷ (12 × ln(Fixed pricing period + 1200) − ln(8.916100448256e36))</code></li><li><strong>Estimated equity</strong> = <code>((1 ÷ 20) × Estimated value of property × (ceil((1 ÷ 1000) × floor((1 ÷ 2500000) × Estimated value of property) ÷ Estimated value of property) + 1))</code></li><li><strong>Annual Interest</strong> = <code>(1 ÷ 100) × Fixed pricing period × Loan amount</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Loan-to-appraised value (LTV) ratio</strong> = <code>19 ÷ 20 − 1 ÷ 20 × ceil((1 ÷ 1000) × floor((1 ÷ 2500000) × Estimated value of property) ÷ Estimated value of property)</code> — the form to use when Estimated value of property are the values you have.</li><li><strong>Loanable amount</strong> = <code>(1 ÷ 20) × Estimated value of property × (19 − ceil((1 ÷ 1000) × floor((1 ÷ 2500000) × Estimated value of property) ÷ Estimated value of property))</code> — the form to use when Estimated value of property are the values you have.</li><li><strong>Monthly principal and interest</strong> = <code>(1 ÷ 1200) × Fixed pricing period × Loan amount × (Fixed pricing period + 1200)^(12 × Repayment period) ÷ ( − (1200)^(12 × Repayment period) + (Fixed pricing period + 1200)^(12 × Repayment period))</code> — the form to use when Fixed pricing period, Loan amount and Repayment period are the values you have.</li><li><strong>Repayment period</strong> = <code>− ln( − 1 ÷ 1200 × Fixed pricing period × Loan amount ÷ Monthly principal and interest + 1) ÷ (12 × ln(Fixed pricing period + 1200) − ln(8.916100448256e36))</code> — the form to use when Fixed pricing period, Loan amount and Monthly principal and interest are the values you have.</li><li><strong>Estimated equity</strong> = <code>((1 ÷ 20) × Estimated value of property × (ceil((1 ÷ 1000) × floor((1 ÷ 2500000) × Estimated value of property) ÷ Estimated value of property) + 1))</code> — the form to use when Estimated value of property are the values you have.</li><li><strong>Annual Interest</strong> = <code>(1 ÷ 100) × Fixed pricing period × Loan amount</code> — the form to use when Fixed pricing period and Loan amount are the values you have.</li><li><strong>Loan amount</strong> = <code>100 × Annual Interest ÷ Fixed pricing period</code> — the form to use when Annual Interest and Fixed pricing period are the values you have.</li><li><strong>Fixed pricing period</strong> = <code>100 × Annual Interest ÷ Loan amount</code> — the form to use when Annual Interest and Loan amount are the values you have.</li></ul><p>Any one of Loan-to-appraised value (LTV) ratio, Loanable amount and Monthly principal and interest can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Estimated value of property from 3 to 6, leaving every other box alone. The panel moves from <strong>Repayment period</strong> 30, <strong>Fixed pricing period</strong> 9.75, <strong>Loan-to-appraised value (LTV) ratio</strong> 0.95 perc, <strong>Loanable amount</strong> 2.85 and <strong>Estimated equity</strong> 0.15 to <strong>Repayment period</strong> 30, <strong>Fixed pricing period</strong> 9.75, <strong>Loan-to-appraised value (LTV) ratio</strong> 0.95 perc, <strong>Loanable amount</strong> 5.7 and <strong>Estimated equity</strong> 0.3.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Estimated equity, Loan-to-appraised value (LTV) ratio and Loanable amount are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Estimated value of property left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Estimated value of property is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Estimated value of property is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Estimated value of property</strong> takes a plain number with no unit attached. It feeds Loan-to-appraised value (LTV) ratio, Loanable amount and Estimated equity. Have it to hand before you start: Estimated value of property is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Estimated value of property. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Estimated value of property into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Estimated equity with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Estimated equity is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Estimated value of property and the number you are missing is Estimated equity and Loan-to-appraised value (LTV) ratio.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/effective-duration">Effective duration</a>, <a href="/finance/effective-interest-rate">Effective interest rate Calculator</a> and <a href="/finance/emergency-fund">Emergency fund Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Pag IBIG housing loan calculator work out?', 'a' => <<<'TXT'
            Estimated equity, Loan-to-appraised value (LTV) ratio, Loanable amount and Loan amount, from Estimated value of property. The relationship is Loan-to-appraised value (LTV) ratio = 19 ÷ 20 − 1 ÷ 20 × ceil((1 ÷ 1000) × floor((1 ÷ 2500000) × Estimated value of property) ÷ Estimated value of property).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Estimated value of property. Fill estimated value of property and leave Estimated equity empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Loan-to-appraised value (LTV) ratio, Loanable amount, Monthly principal and interest and Loan amount blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Repayment period = 30, Fixed pricing period = 9.75, Loan-to-appraised value (LTV) ratio = 0.95 perc, Loanable amount = 2.85 and Estimated equity = 0.15. That comes from the page's own defaults, entered in Estimated value of property; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Estimated equity is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Estimated value of property left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Estimated equity keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/effective-duration', 'name' => 'Effective duration'],
            ['path' => '/finance/effective-interest-rate', 'name' => 'Effective interest rate Calculator'],
            ['path' => '/finance/emergency-fund', 'name' => 'Emergency fund Calculator'],
        ],
        'authors' => [],
    ],
];
