<?php

/**
 * Biweekly mortgage
 * /finance/biweekly-mortgage
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Biweekly mortgage',
    'meta' => ['title' => 'Biweekly mortgage: Formula, Steps & Results', 'description' => 'Enter loan amount, mortgage term and interest rate and Biweekly mortgage returns payment and Payment Bi. The formula is printed in the form\'s own words.', 'h1' => 'Biweekly mortgage Calculator', 'updated' => '2026-09-09'],
    'sections' => [
        [
            'title' => 'Mortgage details',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'LoanAmount',
                            'label' => 'Loan amount',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '150000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'term',
                            'label' => 'Mortgage term',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '30',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'interest_rate',
                            'label' => 'Interest rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '6',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Compound frequency, fees and extra payment',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'CompoundFreq',
                            'label' => 'Compounding frequency',
                            'type' => 'select',
                            'options' => ['Yearly' => '1', 'Semi-annually (Canada)' => '2', 'Quarterly' => '4', 'Monthly (UK & US)' => '12'],
                            'dataset' => 'CompoundFrequency',
                            'control' => 'DROPDOWN',
                            'help' => 'How often the interest is computed on the outstanding principle.',
                            'default' => 'Monthly (UK & US)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mortgagePoints',
                            'label' => 'Mortgage points',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'upfrontFee',
                            'label' => 'Upfront fee',
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
                            'name' => 'PmtExtra',
                            'label' => 'Extra payment',
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
            'title' => 'Payment summary',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        Without acceleration Monthly payment: {{payment.monetaryValue}} Term: {{term.withUnits}} Total interest: {{interestTotal.monetaryValue}} Total payment: {{totalPayment.monetaryValue}} Bi-weekly payments Bi-weekly payment: {{paymentBi.monetaryValue}} Term: {{termBi.withUnits}} Total interest: {{interestTotalBi.monetaryValue}} Total payment: {{totalPaymentBi.monetaryValue}} Difference Payment: {{paym
                        TXT],
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
                            'name' => 'payment',
                            'label' => 'Payment',
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
                            'name' => 'paymentBi',
                            'label' => 'Payment bi',
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
                            'name' => 'paymentDi',
                            'label' => 'Payment di',
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
                            'name' => 'termBi',
                            'label' => 'Term bi',
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
                            'name' => 'termDi',
                            'label' => 'Term di',
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
                            'name' => 'interestTotal',
                            'label' => 'Interest total',
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
                            'name' => 'interestTotalBi',
                            'label' => 'Interest total bi',
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
                            'name' => 'interestTotalDi',
                            'label' => 'Interest total di',
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
                            'name' => 'totalPayment',
                            'label' => 'Total payment',
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
                            'name' => 'totalPaymentBi',
                            'label' => 'Total payment bi',
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
                            'name' => 'totalPaymentDi',
                            'label' => 'Total payment di',
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
                            'name' => 'mortgagePay',
                            'label' => 'Mortgage pay',
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
            'title' => 'payment = paymentA(LoanAmount, term, interest_rate, CompoundFreq, PmtExtra)',
            'results' => ['payment' => 'paymentA(LoanAmount, term, interest_rate, CompoundFreq, PmtExtra)'],
        ],
        [
            'title' => 'paymentBi = paymentB(payment)',
            'results' => ['paymentBi' => 'paymentB(paymentA(LoanAmount, term, interest_rate, CompoundFreq, PmtExtra))'],
        ],
        [
            'title' => 'paymentDi = paymentD(paymentBi)',
            'results' => ['paymentDi' => 'paymentD(paymentB(paymentA(LoanAmount, term, interest_rate, CompoundFreq, PmtExtra)))'],
        ],
        [
            'title' => 'termBi = termB(term)',
            'results' => ['termBi' => 'termB(term)'],
        ],
        [
            'title' => 'termDi = termD(termBi)',
            'results' => ['termDi' => 'termD(termB(term))'],
        ],
        [
            'title' => 'interestTotal = interestA(LoanAmount)',
            'results' => ['interestTotal' => 'interestA(LoanAmount)'],
        ],
        [
            'title' => 'interestTotalBi = interestB(LoanAmount)',
            'results' => ['interestTotalBi' => 'interestB(LoanAmount)'],
        ],
        [
            'title' => 'interestTotalDi = interestD(interestTotal , interestTotalBi)',
            'results' => ['interestTotalDi' => 'interestD(interestA(LoanAmount), interestB(LoanAmount))'],
        ],
        [
            'title' => 'mortgagePay = LoanAmount * mortgagePoints',
            'results' => ['mortgagePoints' => 'mortgagePay/LoanAmount', 'LoanAmount' => 'mortgagePay/mortgagePoints', 'mortgagePay' => 'LoanAmount*mortgagePoints'],
        ],
        [
            'title' => 'totalPayment = totalPay(interestTotal, LoanAmount, mortgagePay, upfrontFee)',
            'results' => ['totalPayment' => 'totalPay(interestA(LoanAmount), LoanAmount, mortgagePay, upfrontFee)'],
        ],
        [
            'title' => 'totalPaymentBi = totalPayB(interestTotalBi, LoanAmount, mortgagePay, upfrontFee)',
            'results' => ['totalPaymentBi' => 'totalPayB(interestB(LoanAmount), LoanAmount, mortgagePay, upfrontFee)'],
        ],
        [
            'title' => 'totalPaymentDi = totalPayD(totalPayment, totalPaymentBi)',
            'results' => ['totalPaymentDi' => 'totalPayD(totalPay(interestA(LoanAmount), LoanAmount, mortgagePay, upfrontFee), totalPayB(interestB(LoanAmount), LoanAmount, mortgagePay, upfrontFee))'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";var _LoanAmount,r,t,pmtA,pmtB,pmtD,eq_p_Main,eq_p_Second,trmB,trmD,totalTermA,totalTermB;omni.define("paymentA",function(loanAmount,term,interest_rate,compoundFreq,PmtExtra){r=Number(interest_rate);var m=Number(compoundFreq);t=Number(term);_LoanAmount=Number(loanAmount);eq_p_Main=getEqRatePer(r,m,12);eq_p_Second=getEqRatePer(r,m,26);var monthlyTerm=12*t;pmtA=_LoanAmount*eq_p_Main*Math.pow(1+eq_p_Main,monthlyTerm)/(Math.pow(1+eq_p_Main,monthlyTerm)-1)+PmtExtra;pmtB=_LoanAmount*eq_p_Main*Math.pow(1+eq_p_Main,monthlyTerm)/(Math.pow(1+eq_p_Main,monthlyTerm)-1)*0.5+PmtExtra;pmtD=pmtB*26/12-pmtA;return pmtA});omni.define("paymentB",function(payment){if(Number(payment)>0){return pmtB}else{return 0}});omni.define("paymentD",function(paymentBi){if(Number(paymentBi)>0){return pmtD}else{return 0}});omni.define("termB",function(term){if(Number(term)>0){totalTermA=getPer(_LoanAmount,pmtA,eq_p_Main);totalTermB=getPer(_LoanAmount,pmtB,eq_p_Second);totalTermB=Math.ceil(totalTermB);trmB=Math.ceil(totalTermB/26*12);return trmB}else{return 0}});omni.define("termD",function(trmB){if(trmB>0){trmD=t*12-trmB;return trmD}else{return 0}});function getEqRatePer(interestRate,m,paymentFreq){var _CompoundFreq=Number(m);var ex=Math.exp(1);var base;if(_CompoundFreq==0){var continuous_r=Math.pow(ex,interestRate)-1;_CompoundFreq=1;base=1+continuous_r/_CompoundFreq}else{base=1+interestRate/_CompoundFreq}var power=_CompoundFreq/paymentFreq;var getEqRate=paymentFreq*(Math.pow(base,power)-1);var EqRatePer=getEqRate/paymentFreq;return EqRatePer}function getPer(_LoanAmount,pmtA,eq_p){var termCalc=Math.log(pmtA/(eq_p*-_LoanAmount+pmtA))/Math.log(eq_p+1);if(termCalc<=0){termCalc=0}return mathjs.round(termCalc)}omni.define("interestA",function(_LoanAmount){var effective_monthly_rate=eq_p_Main;var intPaid=0;var balance=Number(_LoanAmount);for(var i=0;i<totalTermA;i++){var monthly_interest=balance*effective_monthly_rate;intPaid+=monthly_interest;var principal_payment=pmtA-monthly_interest;balance-=principal_payment}return intPaid});omni.define("interestB",function(_LoanAmount){var effective_biweekly_rate=eq_p_Second;var intPaid=0;var balance=Number(_LoanAmount);for(var i=0;i<totalTermB;i++){var biweekly_interest=balance*effective_biweekly_rate;intPaid+=biweekly_interest;var principal_payment=pmtB-biweekly_interest;balance-=principal_payment}return intPaid});omni.define("interestD",function(interestTotal,interestTotalBi){if(interestTotal&&interestTotalBi){var interestD=interestTotalBi-interestTotal;return interestD}else{return 0}});omni.define("totalPay",function(interestTotal,loanAmount,mortgagePay,upfrontFee){if(interestTotal){return interestTotal+loanAmount+mortgagePay+upfrontFee}else{return 0}});omni.define("totalPayB",function(interestTotalBi,loanAmount,mortgagePay,upfrontFee){if(interestTotalBi){return interestTotalBi+loanAmount+mortgagePay+upfrontFee}else{return 0}});omni.define("totalPayD",function(totalPayment,totalPaymentBi){if(totalPayment&&totalPaymentBi){var totalPaymentDi=totalPaymentBi-totalPayment;return totalPaymentDi}else{return 0}});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Enter Loan amount, Mortgage term and Interest rate into Biweekly mortgage and the answer comes back as Mortgage points and Payment. Nothing is looked up on this page: mortgage points is computed from loan amount and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Mortgage points is opened in percent; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Biweekly mortgage calculator works', 'html' => <<<'TXT'
            <p>The Biweekly mortgage calculator applies one relationship to 5 numbers and reports Mortgage points, Payment and Payment bi.</p><p>Written with the labels from the form, Payment = paymentA(Loan amount, Mortgage term, Interest rate, Compounding frequency, Extra payment).</p><p>What comes back is Mortgage points, Payment, Payment bi and Payment di — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 5 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Loan amount</strong> — in USD</li><li><strong>Mortgage term</strong> — in years</li><li><strong>Interest rate</strong> — in percent</li><li><strong>Compounding frequency</strong> — a plain number, no unit. How often the interest is computed on the outstanding principle.</li><li><strong>Extra payment</strong> — in USD</li></ul><p>The result boxes are Mortgage points in percent, Payment, Payment bi, Payment di, Term bi, Term di, Interest total, Interest total bi, Interest total di, Total payment, Total payment bi, Total payment di, Mortgage pay; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Mortgage points lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Payment</strong> = <code>paymentA(Loan amount, Mortgage term, Interest rate, Compounding frequency, Extra payment)</code></li><li><strong>Payment bi</strong> = <code>paymentB(paymentA(Loan amount, Mortgage term, Interest rate, Compounding frequency, Extra payment))</code></li><li><strong>Payment di</strong> = <code>paymentD(paymentB(paymentA(Loan amount, Mortgage term, Interest rate, Compounding frequency, Extra payment)))</code></li><li><strong>Term bi</strong> = <code>termB(Mortgage term)</code></li><li><strong>Term di</strong> = <code>termD(termB(Mortgage term))</code></li><li><strong>Interest total</strong> = <code>interestA(Loan amount)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Payment</strong> = <code>paymentA(Loan amount, Mortgage term, Interest rate, Compounding frequency, Extra payment)</code> — the form to use when Loan amount, Mortgage term, Interest rate and Compounding frequency are the values you have.</li><li><strong>Payment bi</strong> = <code>paymentB(paymentA(Loan amount, Mortgage term, Interest rate, Compounding frequency, Extra payment))</code> — the form to use when Loan amount, Mortgage term, Interest rate and Compounding frequency are the values you have.</li><li><strong>Payment di</strong> = <code>paymentD(paymentB(paymentA(Loan amount, Mortgage term, Interest rate, Compounding frequency, Extra payment)))</code> — the form to use when Loan amount, Mortgage term, Interest rate and Compounding frequency are the values you have.</li><li><strong>Term bi</strong> = <code>termB(Mortgage term)</code> — the form to use when Mortgage term are the values you have.</li><li><strong>Term di</strong> = <code>termD(termB(Mortgage term))</code> — the form to use when Mortgage term are the values you have.</li><li><strong>Interest total</strong> = <code>interestA(Loan amount)</code> — the form to use when Loan amount are the values you have.</li><li><strong>Interest total bi</strong> = <code>interestB(Loan amount)</code> — the form to use when Loan amount are the values you have.</li><li><strong>Interest total di</strong> = <code>interestD(interestA(Loan amount), interestB(Loan amount))</code> — the form to use when Loan amount are the values you have.</li></ul><p>Any one of Payment, Payment bi and Payment di can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Mortgage term and Interest rate carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Mortgage points, Payment and Payment bi are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Loan amount left as a guess.</strong> Anything typed into Loan amount is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Mortgage term left as a guess.</strong> Anything typed into Mortgage term is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Loan amount is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Loan amount</strong> takes a plain number with no unit attached. The page reads it when it works out Payment, Payment bi and Payment di. Have it to hand before you start: Loan amount is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Mortgage term</strong> is a years quantity: the page opens it in yrs and converts anything else you pick before the formula runs. The page reads it when it works out Payment, Payment bi and Payment di. Have it to hand before you start: Mortgage term is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Interest rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The page reads it when it works out Payment, Payment bi and Payment di. Have it to hand before you start: Interest rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Compounding frequency</strong> takes a plain number with no unit attached. How often the interest is computed on the outstanding principle. The page reads it when it works out Payment, Payment bi and Payment di. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Compounding frequency is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Extra payment</strong> takes a plain number with no unit attached. The page reads it when it works out Payment, Payment bi and Payment di. Have it to hand before you start: Extra payment is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Loan amount, Mortgage term, Interest rate and Compounding frequency. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Loan amount into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Mortgage points in perc with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Mortgage points is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and years and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Loan amount, Mortgage term and Interest rate are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Loan amount, Mortgage term and Interest rate measured, Mortgage points and Payment wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/labor-force-participation-rate">Labor force participation rate Calculator</a>, <a href="/finance/land-loan-payment">Land loan</a> and <a href="/finance/lease-mileage">Lease mileage Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Biweekly mortgage is a number to act on, so the useful question is what to do with Mortgage points (perc), Payment and Payment bi once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Loan amount, Mortgage term, Interest rate and Compounding frequency alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Biweekly mortgage calculator work out?', 'a' => <<<'TXT'
            Mortgage points, Payment, Payment bi and Payment di, from Loan amount, Mortgage term, Interest rate and Compounding frequency. The relationship is Payment = paymentA(Loan amount, Mortgage term, Interest rate, Compounding frequency, Extra payment).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Loan amount (USD), Mortgage term (years), Interest rate (percent), Compounding frequency, Extra payment (USD). Fill loan amount, mortgage term and interest rate and leave Mortgage points empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Payment, Payment bi, Payment di and Term bi blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Mortgage points is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Loan amount left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Mortgage points keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/labor-force-participation-rate', 'name' => 'Labor force participation rate Calculator'],
            ['path' => '/finance/land-loan-payment', 'name' => 'Land loan'],
            ['path' => '/finance/lease-mileage', 'name' => 'Lease mileage Calculator'],
        ],
        'authors' => [],
    ],
];
