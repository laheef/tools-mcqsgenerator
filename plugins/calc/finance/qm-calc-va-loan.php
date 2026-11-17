<?php

/**
 * VA loan
 * /finance/va-loan
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'VA loan',
    'meta' => ['title' => 'VA loan Calculator — Formula, Units & Example', 'description' => 'VA loan works out down payment percentage and loan amount and reports both. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'VA loan Calculator', 'updated' => '2026-09-14'],
    'sections' => [
        [
            'title' => 'VA loan specification',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'home_value',
                            'label' => 'Home value',
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
                            'name' => 'first_VA_loan_VS',
                            'label' => 'Is this your first VA loan?',
                            'type' => 'select',
                            'options' => ['No' => '0', 'Yes' => '1'],
                            'dataset' => 'first_VA_loan',
                            'default' => 'Yes',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'county_loan_limit',
                            'label' => 'County loan limit',
                            'type' => 'number',
                            'help' => 'County loan limits currently range from $548,250 to $822,375.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '548250',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'used_entitlement',
                            'label' => 'Used entitlement',
                            'type' => 'number',
                            'help' => 'How much of your entitlement did you use on your previous VA loan?',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'down_payment',
                            'label' => 'Down payment',
                            'type' => 'number',
                            'help' => 'If you make a down payment, you will pay less in funding fees.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'down_payment_percent',
                            'label' => 'Down payment percentage',
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
                            'name' => 'loan_amount',
                            'label' => 'Loan amount',
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
                            'name' => 'va_loan_term',
                            'label' => 'VA loan term',
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
                            'name' => 'annual_interest_rate',
                            'label' => 'Annual interest rate',
                            'type' => 'number',
                            'help' => 'VA loan rates typical range from 2.25% to 4%.',
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
                            'name' => 'exempted_funding_fee_VS',
                            'label' => 'Are you exempted from paying Funding fees?',
                            'type' => 'select',
                            'options' => ['No' => '0', 'Yes' => '1'],
                            'dataset' => 'exempted_funding_fee',
                            'help' => 'If you are not sure, read the Are you exempted from funding fees? section in the text.',
                            'default' => 'No',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'interest_rate_per_month',
                            'label' => 'Interest rate per month',
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
                            'name' => 'number_of_payments',
                            'label' => 'Number of payments',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
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
                            'name' => 'funding_fee',
                            'label' => 'Funding fee',
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
                            'name' => 'max_guaranty',
                            'label' => 'Maximum guaranty',
                            'type' => 'number',
                            'help' => 'Maximum guaranty the VA will offer for this loan based on your VA entitlement.',
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
                            'name' => 'max_guaranty_percent',
                            'label' => 'Maximum guaranty percentage',
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
                            'name' => 'required_down_payment',
                            'label' => 'Required down payment',
                            'type' => 'number',
                            'help' => 'If the VA is not offering the maximum 25% guaranty to your lender, you may be required to pay the difference to qualify for the loan.',
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
                            'name' => 'net_loan_cost',
                            'label' => 'Net loan cost',
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
                            'name' => 'total_loan_cost',
                            'label' => 'Total loan cost',
                            'type' => 'number',
                            'help' => 'Total estimated cost of originating and paying off the loan, taxes and insurance.',
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
                            'name' => 'net_monthly_payment',
                            'label' => 'Net monthly payment',
                            'type' => 'number',
                            'help' => 'Monthly principal and interest payment (PI).',
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
                            'name' => 'total_monthly_payment',
                            'label' => 'Total monthly payment',
                            'type' => 'number',
                            'help' => 'Estimated monthly payment with taxes and homeowner insurance costs (PITI).',
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
                        ['type' => 'note', 'text' => <<<'TXT'
                        Disclaimer: The VA loan calculator provide an estimate of the payment amount based on the data provided. The actual payment may differ depending on the lender, county taxes, and home insurance charge.
                        TXT],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'debt_to_income_qualification_VS',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Estimate your debt-to-income (DTI) ratio qualification' => '1', '' => '0'],
                            'dataset' => 'Debt_ratio_qualification_checkbox',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'DTI estimation',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'monthly_gross_income',
                            'label' => 'Monthly gross income',
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
                            'name' => 'monthly_debt',
                            'label' => 'Monthly debt',
                            'type' => 'number',
                            'help' => 'Estimated monthly expenses.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dti_ratio',
                            'label' => 'DTI ratio',
                            'type' => 'number',
                            'help' => 'Debt-to-income ratio that determines the percentage of income spent on paying off the loan.',
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
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'dti_ratio > 0.49', 'text' => ' Your DTI is extremely dangerous. You should consider purchasing a cheaper home.'],
                                ['when' => 'dti_ratio <= 0.49', 'text' => ' Your DTI is dangerous. You should consider reducing your expenses.'],
                                ['when' => 'dti_ratio <= 0.41', 'text' => ' Your DTI is satisfactory. You should qualify for this loan.'],
                                ['when' => 'dti_ratio <= 0.36', 'text' => ' Your DTI is good. You qualify for this loan.'],
                                ['when' => 'dti_ratio <= 0.2', 'text' => ' Your DTI is excellent. You easily qualify for this loan.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'loan_amount = home_value - down_payment',
            'results' => ['loan_amount' => '-down_payment + home_value', 'home_value' => 'down_payment + loan_amount', 'down_payment' => 'home_value - loan_amount'],
        ],
        [
            'title' => 'down_payment_percent = one_way(down_payment / home_value)',
            'results' => ['down_payment_percent' => '(down_payment/home_value)'],
        ],
        [
            'title' => 'funding_fee = checkFundingFee(first_VA_loan_VS, exempted_funding_fee_VS, down_payment_percent, loan_amount) ',
            'results' => ['funding_fee' => 'checkFundingFee(first_VA_loan_VS, exempted_funding_fee_VS, (down_payment/home_value), loan_amount)'],
        ],
        [
            'title' => 'max_guaranty = determineMaxGuaranty(first_VA_loan_VS, county_loan_limit, used_entitlement, loan_amount)',
            'results' => ['max_guaranty' => 'determineMaxGuaranty(first_VA_loan_VS, county_loan_limit, used_entitlement, loan_amount)'],
        ],
        [
            'title' => 'max_guaranty_percent = one_way(max_guaranty / loan_amount)',
            'results' => ['max_guaranty_percent' => '(determineMaxGuaranty(first_VA_loan_VS, county_loan_limit, used_entitlement, loan_amount)/loan_amount)'],
        ],
        [
            'title' => <<<'TXT'
            net_monthly_payment = loan_amount * interest_rate_per_month * ((1 + interest_rate_per_month) ^ number_of_payments) / ((1 + interest_rate_per_month) ^ (number_of_payments) - 1)
            TXT,
            'results' => ['net_monthly_payment' => 'interest_rate_per_month*loan_amount*pow(interest_rate_per_month + 1, number_of_payments)/(pow(interest_rate_per_month + 1, number_of_payments) - 1)', 'loan_amount' => 'net_monthly_payment/interest_rate_per_month - net_monthly_payment*pow(interest_rate_per_month + 1, -number_of_payments)/interest_rate_per_month', 'number_of_payments' => 'log(-net_monthly_payment/(interest_rate_per_month*loan_amount - net_monthly_payment))/log(interest_rate_per_month + 1)'],
        ],
        [
            'title' => 'total_monthly_payment = net_monthly_payment + (0.001 * loan_amount) + (0.00029 * loan_amount)',
            'results' => ['total_monthly_payment' => '(129/100000)*loan_amount + net_monthly_payment', 'net_monthly_payment' => '-129/100000*loan_amount + total_monthly_payment', 'loan_amount' => '-100000/129*net_monthly_payment + (100000/129)*total_monthly_payment'],
        ],
        [
            'title' => 'net_loan_cost = one_way((net_monthly_payment * number_of_payments) + funding_fee)',
            'results' => ['net_loan_cost' => '(net_monthly_payment*number_of_payments + checkFundingFee(first_VA_loan_VS, exempted_funding_fee_VS, (down_payment/home_value), loan_amount))'],
        ],
        [
            'title' => 'total_loan_cost = one_way((total_monthly_payment * number_of_payments) + funding_fee)',
            'results' => ['total_loan_cost' => '(number_of_payments*total_monthly_payment + checkFundingFee(first_VA_loan_VS, exempted_funding_fee_VS, (down_payment/home_value), loan_amount))'],
        ],
        [
            'title' => 'dti_ratio = (total_monthly_payment + monthly_debt) / monthly_gross_income',
            'results' => ['dti_ratio' => '(monthly_debt + total_monthly_payment)/monthly_gross_income', 'monthly_debt' => 'dti_ratio*monthly_gross_income - total_monthly_payment', 'total_monthly_payment' => 'dti_ratio*monthly_gross_income - monthly_debt', 'monthly_gross_income' => '(monthly_debt + total_monthly_payment)/dti_ratio'],
        ],
        [
            'title' => 'required_down_payment = one_way((0.25 * loan_amount) - max_guaranty)',
            'results' => ['required_down_payment' => '((1/4)*loan_amount - determineMaxGuaranty(first_VA_loan_VS, county_loan_limit, used_entitlement, loan_amount))'],
        ],
        [
            'title' => 'interest_rate_per_month = annual_interest_rate / 12',
            'results' => ['interest_rate_per_month' => '(1/12)*annual_interest_rate', 'annual_interest_rate' => '12*interest_rate_per_month'],
        ],
        [
            'title' => 'number_of_payments = va_loan_term * 12',
            'results' => ['va_loan_term' => '(1/12)*number_of_payments', 'number_of_payments' => '12*va_loan_term'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("determineMaxGuaranty",function(firstTime,countyLoanLimit,usedEntitlement,loan){var loanGuaranty=loan*0.25;var remainingEntitlement=countyLoanLimit*0.25-usedEntitlement;if(remainingEntitlement<0){remainingEntitlement=0}if(firstTime==0&&loan<countyLoanLimit&&loan>144000&&usedEntitlement>36000){return Math.min(remainingEntitlement,loanGuaranty)}else if(firstTime==0&&loan>countyLoanLimit&&loan>144000&&usedEntitlement>36000){return remainingEntitlement}else if(firstTime==0&&loan<=144000&&usedEntitlement<=36000){return 0}else{return loanGuaranty}});omni.define("checkFundingFee",function(firstTime,exemptedFundingFee,downPaymentPercent,loan){if(exemptedFundingFee==0){if(firstTime==0){if(downPaymentPercent>=0.05&&downPaymentPercent<=0.0999){return Math.round(0.0165*loan,2)}else if(downPaymentPercent>0.099&&downPaymentPercent<=1){return Math.round(0.014*loan,2)}else{return Math.round(0.036*loan,2)}}else{if(downPaymentPercent>=0.05&&downPaymentPercent<=0.0999){return Math.round(0.0165*loan,2)}else if(downPaymentPercent>0.0999&&downPaymentPercent<=1){return Math.round(0.014*loan,2)}else{return Math.round(0.023*loan,2)}}}else{return 0}});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        VA loan takes Home value and Down payment and returns Down payment percentage and Loan amount. There is no hidden constant here: change down payment percentage and home value moves with it. The main result, Down payment percentage, is reported in percent.
        TXT,
        'sections' => [
            ['title' => 'How the VA loan calculator works', 'html' => <<<'TXT'
            <p>VA loan answers one question from 2 numbers, and the answer is Down payment percentage, Loan amount and VA loan term.</p><p>Written with the labels from the form, Loan amount = − Down payment + Home value.</p><p>What comes back is Down payment percentage, Loan amount, VA loan term and Annual interest rate — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Home value</strong> — in USD</li><li><strong>Down payment</strong> — in USD. If you make a down payment, you will pay less in funding fees.</li></ul><p>The answers come back as Down payment percentage in percent, Loan amount in USD, VA loan term in years, Annual interest rate in percent, Interest rate per month in percent, Number of payments, Funding fee in USD, Maximum guaranty in USD, Maximum guaranty percentage in percent, Required down payment in USD, Net loan cost in USD, Total loan cost in USD, Net monthly payment in USD, Total monthly payment in USD, Monthly gross income in USD, Monthly debt in USD, DTI ratio in percent. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Down payment percentage offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Loan amount</strong> = <code>− Down payment + Home value</code></li><li><strong>Home value</strong> = <code>Down payment + Loan amount</code></li><li><strong>Down payment</strong> = <code>Home value − Loan amount</code></li><li><strong>Down payment percentage</strong> = <code>(Down payment ÷ Home value)</code></li><li><strong>Funding fee</strong> = <code>checkFundingFee(Is this your first VA loan?, Are you exempted from paying Funding fees?, (Down payment ÷ Home value), Loan amount)</code></li><li><strong>Maximum guaranty</strong> = <code>determineMaxGuaranty(Is this your first VA loan?, County loan limit, Used entitlement, Loan amount)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Loan amount</strong> = <code>− Down payment + Home value</code> — the form to use when Down payment and Home value are the values you have.</li><li><strong>Home value</strong> = <code>Down payment + Loan amount</code> — the form to use when Down payment and Loan amount are the values you have.</li><li><strong>Down payment</strong> = <code>Home value − Loan amount</code> — the form to use when Home value and Loan amount are the values you have.</li><li><strong>Down payment percentage</strong> = <code>(Down payment ÷ Home value)</code> — the form to use when Down payment and Home value are the values you have.</li><li><strong>Funding fee</strong> = <code>checkFundingFee(Is this your first VA loan?, Are you exempted from paying Funding fees?, (Down payment ÷ Home value), Loan amount)</code> — the form to use when Is this your first VA loan?, Are you exempted from paying Funding fees?, Down payment and Home value are the values you have.</li><li><strong>Maximum guaranty</strong> = <code>determineMaxGuaranty(Is this your first VA loan?, County loan limit, Used entitlement, Loan amount)</code> — the form to use when Is this your first VA loan?, County loan limit, Used entitlement and Loan amount are the values you have.</li><li><strong>Maximum guaranty percentage</strong> = <code>(determineMaxGuaranty(Is this your first VA loan?, County loan limit, Used entitlement, Loan amount) ÷ Loan amount)</code> — the form to use when Is this your first VA loan?, County loan limit, Used entitlement and Loan amount are the values you have.</li><li><strong>Net monthly payment</strong> = <code>Interest rate per month × Loan amount × (Interest rate per month + 1)^(Number of payments) ÷ ((Interest rate per month + 1)^(Number of payments) − 1)</code> — the form to use when Interest rate per month, Loan amount and Number of payments are the values you have.</li></ul><p>Any one of Loan amount, Home value and Down payment can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Down payment percentage, Loan amount and VA loan term are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Home value left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Home value is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Down payment left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Down payment is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Home value and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Home value</strong> takes a plain number with no unit attached. Change it and Loan amount, Down payment and Down payment percentage changes with it. Have it to hand before you start: Home value is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Down payment</strong> takes a plain number with no unit attached. If you make a down payment, you will pay less in funding fees. Change it and Loan amount, Home value and Down payment percentage changes with it. Have it to hand before you start: Down payment is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Home value and Down payment. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Home value into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Down payment percentage in perc with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Down payment percentage is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and years and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Home value and Down payment are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Home value and Down payment is what you already know and Down payment percentage and Loan amount is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/rental-property">Rental property</a>, <a href="/finance/reserve-ratio">Reserve ratio Calculator</a> and <a href="/finance/residual-income">Residual income</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the VA loan calculator work out?', 'a' => <<<'TXT'
            Down payment percentage, Loan amount, VA loan term and Annual interest rate, from Down payment and Home value. The relationship is Loan amount = − Down payment + Home value.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Home value (USD), Down payment (USD). Fill home value and down payment and leave Down payment percentage empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Loan amount, Home value, Down payment and Down payment percentage blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Down payment percentage is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Home value left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Down payment percentage keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/rental-property', 'name' => 'Rental property'],
            ['path' => '/finance/reserve-ratio', 'name' => 'Reserve ratio Calculator'],
            ['path' => '/finance/residual-income', 'name' => 'Residual income'],
        ],
        'authors' => [],
    ],
];
