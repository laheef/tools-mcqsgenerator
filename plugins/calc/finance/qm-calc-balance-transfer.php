<?php

/**
 * Balance transfer
 * /finance/balance-transfer
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Balance transfer',
    'meta' => ['title' => 'Balance transfer Calculator: Free, With Steps', 'description' => 'Balance transfer turns proposed period of use and old rate into old credit card cost. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Balance transfer Calculator', 'updated' => '2024-09-24'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        If you are contemplating a balance transfer with a plan to pay off the card within the promotional period, choose promotional period. If, however, you will not complete your payments within the promotional period you should choose long-term use.
                        TXT],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'proposedPeriodOfUse',
                            'label' => 'Proposed period of use',
                            'type' => 'select',
                            'options' => ['Promotional period' => '0', 'Long-term use' => '1'],
                            'dataset' => 'proposedPeriodOfUse',
                            'help' => 'Period in which you plan to pay off the balance you wish to transfer.',
                            'default' => 'Promotional period',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Old card cost',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'oldRate',
                            'label' => 'Old rate',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mMonthlyPayment',
                            'label' => 'Monthly payment',
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
            'title' => 'New card cost',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'amountToTransfer',
                            'label' => 'Amount to transfer',
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
                            'name' => 'amountToTransfer1',
                            'label' => 'Amount to transfer',
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
                            'name' => 'transferFee',
                            'label' => 'Transfer fee',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'newRate',
                            'label' => 'Promotional rate',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'numberOfMonths',
                            'label' => 'Time required ',
                            'type' => 'number',
                            'suffix' => 'months',
                            'help' => 'Time frame in which you plan to pay off the card.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'initialRatePeriod',
                            'label' => 'Promotional period',
                            'type' => 'number',
                            'suffix' => 'months',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'initialRate',
                            'label' => 'Promotional rate',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'finalRate',
                            'label' => 'Final rate',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'The rate after promotional period.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Compare credit card costs',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'oldCreditCardCost',
                            'label' => 'Old credit card cost',
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
                            'name' => 'oldCreditCardCost1',
                            'label' => 'Old credit card cost',
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
                            'name' => 'newCreditCardCost1',
                            'label' => 'New credit card cost',
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
                            'name' => 'newCreditCardCost',
                            'label' => 'New credit card cost',
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
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'newCreditCardCost < oldCreditCardCost', 'text' => <<<'TXT'
                                This new rate will suit your pocket better and save you {{situation.formattedValue}} {{global.currencySymbol}}. This card is better while the rate lasts. To pay off your card in this time frame you will need to pay {{monthlyPayment.formattedValue}}&nbsp;{{global.currencySymbol}} per month.&nbsp;
                                TXT],
                                ['when' => 'newCreditCardCost > oldCreditCardCost', 'text' => <<<'TXT'
                                This is not a good deal. You will lose&nbsp; {{situation1.formattedValue}} {{global.currencySymbol}}. To pay off your card in this time frame you will need to pay {{monthlyPayment.formattedValue}}&nbsp;{{global.currencySymbol}} per month.&nbsp;
                                TXT],
                                ['when' => 'newCreditCardCost > 0 and (hasValue(newCreditCardCost) and hasValue(oldCreditCardCost) and (newCreditCardCost == oldCreditCardCost))', 'text' => 'This is more effort than it is worth. You will not profit from this deal.&nbsp;'],
                                ['when' => 'hasValue(time0) and ((newCreditCardCost < oldCreditCardCost) or (newCreditCardCost > oldCreditCardCost))', 'text' => 'If you continue paying at the old monthly rate it would take you {{time0.formattedValue}} months to pay off this balance.'],
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
                                ['when' => 'newCreditCardCost1 < oldCreditCardCost1', 'text' => <<<'TXT'
                                This new rate will suit your pocket better and save you {{situation2.formattedValue}}&nbsp;{{global.currencySymbol}} in the {{numberOfMonths.formattedValue}} month period. To pay off your card in this time frame you will need to pay {{monthlyPaymentLong.formattedValue}}&nbsp;{{global.currencySymbol}} per month.&nbsp;
                                TXT],
                                ['when' => 'newCreditCardCost1 > oldCreditCardCost1', 'text' => <<<'TXT'
                                This is not a good deal. You will lose {{situation3.formattedValue}}&nbsp;{{global.currencySymbol}} in the {{numberOfMonths.formattedValue}} month period. To pay off your card in this time frame you will need to pay {{monthlyPaymentLong.formattedValue}}&nbsp;{{global.currencySymbol}}&nbsp;per month.&nbsp;
                                TXT],
                                ['when' => 'newCreditCardCost1 > 0 and hasValue(newCreditCardCost1) and hasValue(oldCreditCardCost1) and newCreditCardCost1 == oldCreditCardCost1', 'text' => 'This is more effort than it is worth. You will not profit from this deal.&nbsp;'],
                                ['when' => 'hasValue(time1) and ((newCreditCardCost1 < oldCreditCardCost1) or (newCreditCardCost1 > oldCreditCardCost1))', 'text' => 'If you continue paying at the old monthly rate it would take you {{time1.formattedValue}}&nbsp;months to pay off this balance.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Always hidden variables',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'result',
                            'label' => 'Result',
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
                            'name' => 'situation',
                            'label' => 'Situation',
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
                            'name' => 'situation1',
                            'label' => 'Situation1',
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
                            'name' => 'situation2',
                            'label' => 'Situation2',
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
                            'name' => 'situation3',
                            'label' => 'Situation3',
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
                            'name' => 'monthlyPayment',
                            'label' => 'Monthly payment',
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
                            'name' => 'monthlyPaymentLong',
                            'label' => 'Monthly payment long',
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
                            'name' => 'monthlyTime',
                            'label' => 'Monthly time',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'monthlyTime1',
                            'label' => 'Monthly time1',
                            'type' => 'number',
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
                            'name' => 'time0',
                            'label' => 'Time0',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'time1',
                            'label' => 'Time1',
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
            'title' => 'newCreditCardCost =( amountToTransfer * transferFee/100) + (amountToTransfer * newRate/100) * (numberOfMonths/12)',
            'results' => [
                'newCreditCardCost' => '(1/1200)*amountToTransfer*(newRate*numberOfMonths + 12*transferFee)',
                'transferFee' => '-1/12*newRate*numberOfMonths + 100*newCreditCardCost/amountToTransfer',
                'amountToTransfer' => '1200*newCreditCardCost/(newRate*numberOfMonths + 12*transferFee)',
                'newRate' => '12*(-amountToTransfer*transferFee + 100*newCreditCardCost)/(amountToTransfer*numberOfMonths)',
                'numberOfMonths' => '12*(-amountToTransfer*transferFee + 100*newCreditCardCost)/(amountToTransfer*newRate)',
            ],
        ],
        [
            'title' => 'monthlyPayment = (amountToTransfer + newCreditCardCost)/numberOfMonths',
            'results' => ['newCreditCardCost' => '-amountToTransfer + monthlyPayment*numberOfMonths', 'numberOfMonths' => '(amountToTransfer + newCreditCardCost)/monthlyPayment', 'amountToTransfer' => 'monthlyPayment*numberOfMonths - newCreditCardCost', 'monthlyPayment' => '(amountToTransfer + newCreditCardCost)/numberOfMonths'],
        ],
        [
            'title' => 'oldCreditCardCost =  (amountToTransfer * oldRate/100) * (numberOfMonths/12)',
            'results' => ['oldRate' => '1200*oldCreditCardCost/(amountToTransfer*numberOfMonths)', 'numberOfMonths' => '1200*oldCreditCardCost/(amountToTransfer*oldRate)', 'amountToTransfer' => '1200*oldCreditCardCost/(numberOfMonths*oldRate)', 'oldCreditCardCost' => '(1/1200)*amountToTransfer*numberOfMonths*oldRate'],
        ],
        [
            'title' => 'situation = one_way(oldCreditCardCost - newCreditCardCost)',
            'results' => ['situation' => '(-newCreditCardCost + oldCreditCardCost)'],
        ],
        [
            'title' => 'situation1 = one_way(newCreditCardCost - oldCreditCardCost)',
            'results' => ['situation1' => '(newCreditCardCost - oldCreditCardCost)'],
        ],
        [
            'title' => 'situation2 = one_way(oldCreditCardCost1 - newCreditCardCost1)',
            'results' => ['situation2' => '(-newCreditCardCost1 + oldCreditCardCost1)'],
        ],
        [
            'title' => 'situation3 =  one_way(newCreditCardCost1 - oldCreditCardCost1)',
            'results' => ['situation3' => '(newCreditCardCost1 - oldCreditCardCost1)'],
        ],
        [
            'title' => <<<'TXT'
            newCreditCardCost1 = ((amountToTransfer1 * transferFee/100) + (amountToTransfer1 * initialRate/100 * (initialRatePeriod/12)) + (amountToTransfer1 * finalRate/100 * ((numberOfMonths - initialRatePeriod )/12)))
            TXT,
            'results' => [
                'transferFee' => '(1/12)*(amountToTransfer1*(finalRate*initialRatePeriod - finalRate*numberOfMonths - initialRate*initialRatePeriod) + 1200*newCreditCardCost1)/amountToTransfer1',
                'initialRatePeriod' => '(amountToTransfer1*finalRate*numberOfMonths + 12*amountToTransfer1*transferFee - 1200*newCreditCardCost1)/(amountToTransfer1*(finalRate - initialRate))',
                'finalRate' => <<<'TXT'
                (amountToTransfer1*initialRate*initialRatePeriod + 12*amountToTransfer1*transferFee - 1200*newCreditCardCost1)/(amountToTransfer1*(initialRatePeriod - numberOfMonths))
                TXT,
                'amountToTransfer1' => '1200*newCreditCardCost1/(-finalRate*initialRatePeriod + finalRate*numberOfMonths + initialRate*initialRatePeriod + 12*transferFee)',
                'initialRate' => 'finalRate - finalRate*numberOfMonths/initialRatePeriod - 12*transferFee/initialRatePeriod + 1200*newCreditCardCost1/(amountToTransfer1*initialRatePeriod)',
                'numberOfMonths' => 'initialRatePeriod - initialRate*initialRatePeriod/finalRate - 12*transferFee/finalRate + 1200*newCreditCardCost1/(amountToTransfer1*finalRate)',
                'newCreditCardCost1' => '(1/1200)*amountToTransfer1*(-finalRate*initialRatePeriod + finalRate*numberOfMonths + initialRate*initialRatePeriod + 12*transferFee)',
            ],
        ],
        [
            'title' => 'oldCreditCardCost1 =  (amountToTransfer1 * oldRate/100) * (numberOfMonths/12)',
            'results' => ['oldCreditCardCost1' => '(1/1200)*amountToTransfer1*numberOfMonths*oldRate', 'oldRate' => '1200*oldCreditCardCost1/(amountToTransfer1*numberOfMonths)', 'numberOfMonths' => '1200*oldCreditCardCost1/(amountToTransfer1*oldRate)', 'amountToTransfer1' => '1200*oldCreditCardCost1/(numberOfMonths*oldRate)'],
        ],
        [
            'title' => 'monthlyPaymentLong = (amountToTransfer1 + newCreditCardCost1)/numberOfMonths',
            'results' => ['monthlyPaymentLong' => '(amountToTransfer1 + newCreditCardCost1)/numberOfMonths', 'amountToTransfer1' => 'monthlyPaymentLong*numberOfMonths - newCreditCardCost1', 'numberOfMonths' => '(amountToTransfer1 + newCreditCardCost1)/monthlyPaymentLong', 'newCreditCardCost1' => '-amountToTransfer1 + monthlyPaymentLong*numberOfMonths'],
        ],
        [
            'title' => 'monthlyTime1 = (newCreditCardCost1+amountToTransfer1)/mMonthlyPayment',
            'results' => ['monthlyTime1' => '(amountToTransfer1 + newCreditCardCost1)/mMonthlyPayment', 'amountToTransfer1' => 'mMonthlyPayment*monthlyTime1 - newCreditCardCost1', 'mMonthlyPayment' => '(amountToTransfer1 + newCreditCardCost1)/monthlyTime1', 'newCreditCardCost1' => '-amountToTransfer1 + mMonthlyPayment*monthlyTime1'],
        ],
        [
            'title' => 'monthlyTime = (newCreditCardCost+amountToTransfer)/mMonthlyPayment',
            'results' => ['monthlyTime' => '(amountToTransfer + newCreditCardCost)/mMonthlyPayment', 'newCreditCardCost' => '-amountToTransfer + mMonthlyPayment*monthlyTime', 'mMonthlyPayment' => '(amountToTransfer + newCreditCardCost)/monthlyTime', 'amountToTransfer' => 'mMonthlyPayment*monthlyTime - newCreditCardCost'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Enter Transfer fee and Time required into Balance transfer and the answer comes back as Old rate and Monthly payment. There is no hidden constant here: change old rate and transfer fee moves with it. The main result, Old rate, is reported in %.
        TXT,
        'sections' => [
            ['title' => 'How the Balance transfer calculator works', 'html' => <<<'TXT'
            <p>The Balance transfer calculator applies one relationship to 4 numbers and reports Old rate, Monthly payment and Amount to transfer.</p><p>In the form&#039;s own words, New credit card cost = (1 ÷ 1200) × Amount to transfer × (Promotional rate × Time required + 12 × Transfer fee).</p><p>The result panel carries Old rate, Monthly payment, Amount to transfer and Promotional period, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>Amount to transfer</strong> — in USD</li><li><strong>Transfer fee</strong> — in %</li><li><strong>Promotional rate</strong> — in %</li><li><strong>Time required</strong> — in months. Time frame in which you plan to pay off the card.</li></ul><p>What you get back is Old rate in %, Monthly payment in USD, Amount to transfer in USD, Promotional period in months, Promotional rate in %, Final rate in %, Old credit card cost in USD, Old credit card cost in USD, New credit card cost in USD, New credit card cost in USD, Situation in USD, Situation1 in USD, Situation2 in USD, Situation3 in USD, Monthly payment in USD, Monthly payment long in USD, Monthly time, Monthly time1, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Old rate is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>New credit card cost</strong> = <code>(1 ÷ 1200) × Amount to transfer × (Promotional rate × Time required + 12 × Transfer fee)</code></li><li><strong>Transfer fee</strong> = <code>− 1 ÷ 12 × Promotional rate × Time required + 100 × New credit card cost ÷ Amount to transfer</code></li><li><strong>Amount to transfer</strong> = <code>1200 × New credit card cost ÷ (Promotional rate × Time required + 12 × Transfer fee)</code></li><li><strong>Promotional rate</strong> = <code>12 × ( − Amount to transfer × Transfer fee + 100 × New credit card cost) ÷ (Amount to transfer × Time required)</code></li><li><strong>Time required</strong> = <code>12 × ( − Amount to transfer × Transfer fee + 100 × New credit card cost) ÷ (Amount to transfer × Promotional rate)</code></li><li><strong>Monthly payment</strong> = <code>(Amount to transfer + New credit card cost) ÷ Time required</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>New credit card cost</strong> = <code>(1 ÷ 1200) × Amount to transfer × (Promotional rate × Time required + 12 × Transfer fee)</code> — the form to use when Amount to transfer, Promotional rate, Time required and Transfer fee are the values you have.</li><li><strong>Transfer fee</strong> = <code>− 1 ÷ 12 × Promotional rate × Time required + 100 × New credit card cost ÷ Amount to transfer</code> — the form to use when Promotional rate, Time required, New credit card cost and Amount to transfer are the values you have.</li><li><strong>Amount to transfer</strong> = <code>1200 × New credit card cost ÷ (Promotional rate × Time required + 12 × Transfer fee)</code> — the form to use when New credit card cost, Promotional rate, Time required and Transfer fee are the values you have.</li><li><strong>Promotional rate</strong> = <code>12 × ( − Amount to transfer × Transfer fee + 100 × New credit card cost) ÷ (Amount to transfer × Time required)</code> — the form to use when Amount to transfer, Transfer fee, New credit card cost and Time required are the values you have.</li><li><strong>Time required</strong> = <code>12 × ( − Amount to transfer × Transfer fee + 100 × New credit card cost) ÷ (Amount to transfer × Promotional rate)</code> — the form to use when Amount to transfer, Transfer fee, New credit card cost and Promotional rate are the values you have.</li><li><strong>Monthly payment</strong> = <code>(Amount to transfer + New credit card cost) ÷ Time required</code> — the form to use when Amount to transfer, New credit card cost and Time required are the values you have.</li><li><strong>New credit card cost</strong> = <code>− Amount to transfer + Monthly payment × Time required</code> — the form to use when Amount to transfer, Monthly payment and Time required are the values you have.</li><li><strong>Time required</strong> = <code>(Amount to transfer + New credit card cost) ÷ Monthly payment</code> — the form to use when Amount to transfer, New credit card cost and Monthly payment are the values you have.</li></ul><p>Any one of New credit card cost, Transfer fee and Amount to transfer can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Old rate, Monthly payment and Amount to transfer are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Amount to transfer left as a guess.</strong> Anything typed into Amount to transfer is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Transfer fee left as a guess.</strong> Anything typed into Transfer fee is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Promotional rate left as a guess.</strong> Anything typed into Promotional rate is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Amount to transfer is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Amount to transfer</strong> takes a plain number with no unit attached. It feeds New credit card cost, Transfer fee and Promotional rate. Have it to hand before you start: Amount to transfer is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Transfer fee</strong> is measured in %. It feeds New credit card cost, Amount to transfer and Promotional rate. Have it to hand before you start: Transfer fee is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Promotional rate</strong> is measured in %. It feeds New credit card cost, Transfer fee and Amount to transfer. Have it to hand before you start: Promotional rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Time required</strong> is measured in months. Time frame in which you plan to pay off the card. It feeds New credit card cost, Transfer fee and Amount to transfer. Have it to hand before you start: Time required is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Amount to transfer, Transfer fee, Promotional rate and Time required. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Amount to transfer into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Old rate in % with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Old rate is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Amount to transfer, Transfer fee and Promotional rate measured, Old rate and Monthly payment wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/interest-rate-parity">Interest rate parity</a>, <a href="/finance/interest-only-mortgage">Interest-only mortgage Calculator</a> and <a href="/finance/intrinsic-value">Intrinsic value Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Balance transfer calculator work out?', 'a' => <<<'TXT'
            Old rate, Monthly payment, Amount to transfer and Promotional period, from Amount to transfer, Promotional rate, Time required and Transfer fee. The relationship is New credit card cost = (1 ÷ 1200) × Amount to transfer × (Promotional rate × Time required + 12 × Transfer fee).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Amount to transfer (USD), Transfer fee (%), Promotional rate (%), Time required (months). Fill amount to transfer, transfer fee and promotional rate and leave Old rate empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of New credit card cost, Transfer fee, Amount to transfer and Promotional rate blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Old rate is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Amount to transfer left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Old rate keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/interest-rate-parity', 'name' => 'Interest rate parity'],
            ['path' => '/finance/interest-only-mortgage', 'name' => 'Interest-only mortgage Calculator'],
            ['path' => '/finance/intrinsic-value', 'name' => 'Intrinsic value Calculator'],
        ],
        'authors' => [],
    ],
];
