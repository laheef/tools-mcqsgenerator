<?php

/**
 * Mortgage acceleration
 * /finance/mortgage-acceleration
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Mortgage acceleration',
    'meta' => ['title' => 'Mortgage acceleration Calculator: Free, With Steps', 'description' => 'Mortgage acceleration turns loan amount and type of acceleration into return status. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Mortgage acceleration Calculator', 'updated' => '2026-09-09'],
    'sections' => [
        [
            'title' => 'Mortgage inputs',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'LoanAmount2',
                            'label' => 'Loan amount',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '300000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PmtFreq2',
                            'label' => 'Type of acceleration',
                            'type' => 'select',
                            'options' => ['Monthly with overpayment' => '1', 'Accelerated bi-weekly' => '2', 'Accelerated weekly' => '3'],
                            'dataset' => 'acceleration type',
                            'control' => 'DROPDOWN',
                            'default' => 'Accelerated bi-weekly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tRef',
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
                            'name' => 'rRef',
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
                            'name' => 'advanced',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Adjust fees & compounding' => '1', '' => '0'],
                            'dataset' => 'advanced',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'CostPerc2',
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
                            'name' => 'Cost2',
                            'label' => 'Upfront fee',
                            'type' => 'number',
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
                            'name' => 'CompoundFreq',
                            'label' => 'Compounding frequency',
                            'type' => 'select',
                            'options' => ['Yearly' => '1', 'Semi-annually (Canada)' => '2', 'Quarterly' => '4', 'Monthly (UK & US)' => '12'],
                            'dataset' => 'compound freq (mRef)',
                            'control' => 'DROPDOWN',
                            'help' => 'How often the interest is computed on the outstanding principle.',
                            'default' => 'Monthly (UK & US)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'first_day', 'label' => 'Due date', 'type' => 'date'],
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
                            'min' => 2,
                            'default' => '0',
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
                            'name' => 'qRef',
                            'label' => 'Q ref',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarQ2',
                            'label' => 'Var q2',
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
                            'name' => 'return_status',
                            'label' => 'Return status',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'payoff_accel', 'label' => 'Payoff accel', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'payoff_wo', 'label' => 'Payoff wo', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'term_wo_yrs',
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
                            'name' => 'term_wo_mos',
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
                            'name' => 'accel_unit',
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
                            'name' => 'payment_wo',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'payment_accel',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'payment_diff',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'term_accel',
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
                            'name' => 'term_accel_yrs',
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
                            'name' => 'term_accel_mos',
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
                            'name' => 'term_diff_yrs',
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
                            'name' => 'term_diff_mos',
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
                            'name' => 'total_interest_wo',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'total_interest_accel',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'total_interest_diff',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'total_payment_wo',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'total_payment_accel',
                            'label' => '',
                            'type' => 'presentation',
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
            'title' => 'return_status = run_calculator(LoanAmount2, PmtFreq2, tRef, rRef, CompoundFreq, first_day, PmtExtra, VarQ2, qRef)',
            'results' => ['return_status' => 'run_calculator(LoanAmount2, PmtFreq2, tRef, rRef, CompoundFreq, first_day, PmtExtra, VarQ2, qRef)'],
        ],
        [
            'title' => 'payoff_wo = get_payoff_wo()',
            'results' => ['payoff_wo' => 'get_payoff_wo()'],
        ],
        [
            'title' => 'payoff_accel = get_payoff_accel()',
            'results' => ['payoff_accel' => 'get_payoff_accel()'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";var q=12;var VarQ=12;var milisecondsInADay=24*60*60*1000;var payment_wo,payment_accel,term_accel,payoff_wo,payoff_accel,total_interest_wo,total_interest_accel;omni.define("run_calculator",function(LoanAmount2,PmtFreq2,tRef,rRef,CompoundFreq,first_day,PmtExtra,VarQ2,qRef){var LoanAmount=LoanAmount2;var r=rRef;var t=tRef;var m=CompoundFreq;var mRef=CompoundFreq;var periodsMain=12*t;var periodsMainRef=12*tRef;var periods=q*t;var eq_p_Main=getEqRatePer(r,m,12);var eq_p=getEqRatePer(r,m,q);var pmt=LoanAmount*eq_p_Main*mathjs.pow(1+eq_p_Main,periodsMain)/(mathjs.pow(1+eq_p_Main,periodsMain)-1)*12/VarQ;var eq_p_MainRef=getEqRatePer(rRef,mRef,12);var eq_pRef=getEqRatePer(rRef,mRef,qRef);var pmtRef=LoanAmount2*eq_p_MainRef*mathjs.pow(1+eq_p_MainRef,periodsMainRef)/(mathjs.pow(1+eq_p_MainRef,periodsMainRef)-1)*12/VarQ2+PmtExtra;var periodsChart=getPer(LoanAmount,pmt,eq_p);var periodsChartRef=getPer(LoanAmount2,pmtRef,eq_pRef);var TotInt=periodsChart*pmt-LoanAmount;var TotIntRef=periodsChartRef*pmtRef-LoanAmount2;var perRef=mathjs.ceil(periodsChartRef/qRef*12);var date,daysPassed=0;var periodsLoop=periods;for(var i=0;i<=periodsLoop;i++){date=new Date((first_day+daysPassed)*milisecondsInADay);var daysInMonth=getDaysInMonth(date);if(i>0){daysPassed+=daysInMonth}}var periodsTable=tRef*qRef;var dateT,daysPassedT=0,princBalT=LoanAmount2,princBalOpenT=0,gapT=7,payoffDate;for(var iTable=0;iTable<=periodsTable;iTable++){dateT=new Date((first_day+daysPassedT)*milisecondsInADay);if(VarQ2===24){gapT=14}if(VarQ2===12){gapT=getDaysInMonth(dateT)}if(iTable>0){daysPassedT+=gapT;princBalT=getBal(LoanAmount2,pmtRef,eq_pRef,iTable)-PmtExtra;princBalOpenT=getBal(LoanAmount2,pmtRef,eq_pRef,iTable-1);if(iTable>1){princBalOpenT=princBalOpenT-PmtExtra}if(princBalT<0){princBalT=0}if(princBalOpenT<0.01){princBalOpenT=0}if(princBalT<0.01&&princBalOpenT>0){payoffDate=dateT}}}payment_wo=pmt;payment_accel=pmtRef;term_accel=perRef;payoff_wo=date.getTime();payoff_accel=payoffDate.getTime();total_interest_wo=TotInt;total_interest_accel=TotIntRef;return 1});omni.define("get_payment_accel",function(){return payment_accel});omni.define("get_payment_wo",function(){return payment_wo});omni.define("get_term_accel",function(){return term_accel});omni.define("get_payoff_wo",function(){return payoff_wo});omni.define("get_payoff_accel",function(){return payoff_accel});omni.define("get_total_interest_wo",function(){return total_interest_wo});omni.define("get_total_interest_accel",function(){return total_interest_accel});function getEqRatePer(InterestRate,CompoundFreq,PaymentFreq){var ex=Math.exp(1);var base;if(CompoundFreq===0){var continuous_r=mathjs.pow(ex,InterestRate)-1;CompoundFreq=1;base=1+continuous_r/CompoundFreq}else{base=1+InterestRate/CompoundFreq}var power=CompoundFreq/PaymentFreq;var getEqRate=PaymentFreq*(mathjs.pow(base,power)-1);var EqRatePer=getEqRate/PaymentFreq;return EqRatePer}function getPer(LoanAmount,Pmt,eq_p){var Per=mathjs.log(Pmt/(eq_p*-LoanAmount+Pmt))/mathjs.log(eq_p+1);if(Per<0){Per=0}return Per}function getDaysInMonth(date){var year=date.getFullYear();var month=date.getMonth();return new Date(year,month+1,0).getDate()}function getBal(LoanAmount,Pmt,eq_p,GapPer){var Balance=LoanAmount*mathjs.pow(1+eq_p,GapPer)-Pmt/eq_p*(mathjs.pow(1+eq_p,GapPer)-1);if(Balance<0){Balance=0}return Balance}//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Enter Loan amount, Type of acceleration and Mortgage term into Mortgage acceleration and the answer comes back as Q ref and Var q2. There is no hidden constant here: change q ref and loan amount moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Mortgage acceleration calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Mortgage acceleration: it takes 12 numbers and reports Q ref, Var q2 and Accel unit.</p><p>In the form&#039;s own words, Return status = run_calculator(Loan amount, Type of acceleration, Mortgage term, Interest rate, Compounding frequency, Due date, Extra payment, Var q2, Q ref).</p><p>What comes back is Q ref, Var q2 and Accel unit — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 12 boxes, and nothing else.</p><ul><li><strong>Loan amount</strong> — in USD</li><li><strong>Type of acceleration</strong> — a plain number, no unit</li><li><strong>Mortgage term</strong> — in years</li><li><strong>Interest rate</strong> — in percent</li><li><strong>Mortgage points</strong> — in percent</li><li><strong>Upfront fee</strong> — in USD</li><li><strong>Compounding frequency</strong> — a plain number, no unit. How often the interest is computed on the outstanding principle.</li><li><strong>Due date</strong> — a plain number, no unit, entered as a date</li><li><strong>Extra payment</strong> — in USD</li><li><strong>Return status</strong> — a plain number, no unit</li><li><strong>Payoff accel</strong> — a plain number, no unit, entered as a date</li><li><strong>Payoff wo</strong> — a plain number, no unit, entered as a date</li></ul><p>The answers come back as Q ref, Var q2, Accel unit. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>The unit chip on Mortgage term lists 5 options and opens on years. Moving it changes the conversion applied to that row, not the number stored behind it.</p>'],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Return status</strong> = <code>run_calculator(Loan amount, Type of acceleration, Mortgage term, Interest rate, Compounding frequency, Due date, Extra payment, Var q2, Q ref)</code></li><li><strong>Payoff wo</strong> = <code>get_payoff_wo()</code></li><li><strong>Payoff accel</strong> = <code>get_payoff_accel()</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Return status</strong> = <code>run_calculator(Loan amount, Type of acceleration, Mortgage term, Interest rate, Compounding frequency, Due date, Extra payment, Var q2, Q ref)</code> — the form to use when Loan amount, Type of acceleration, Mortgage term and Interest rate are the values you have.</li><li><strong>Payoff wo</strong> = <code>get_payoff_wo()</code> — the form to use when the other values are known.</li><li><strong>Payoff accel</strong> = <code>get_payoff_accel()</code> — the form to use when the other values are known.</li></ul><p>Any one of Return status, Payoff wo and Payoff accel can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Mortgage term, Interest rate and Mortgage points carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Q ref, Var q2 and Accel unit are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Loan amount left as a guess.</strong> Anything typed into Loan amount is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Type of acceleration left as a guess.</strong> Anything typed into Type of acceleration is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Loan amount is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Loan amount</strong> takes a plain number with no unit attached. It feeds Return status. Have it to hand before you start: Loan amount is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Type of acceleration</strong> takes a plain number with no unit attached. It feeds Return status. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Type of acceleration is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Mortgage term</strong> is a years quantity: the page opens it in yrs and converts anything else you pick before the formula runs. It feeds Return status. Have it to hand before you start: Mortgage term is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Interest rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Return status. Have it to hand before you start: Interest rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Mortgage points</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Have it to hand before you start: Mortgage points is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Upfront fee</strong> takes a plain number with no unit attached. Have it to hand before you start: Upfront fee is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Compounding frequency</strong> takes a plain number with no unit attached. How often the interest is computed on the outstanding principle. It feeds Return status. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Compounding frequency is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Due date</strong> takes a plain number with no unit attached. It feeds Return status. Have it to hand before you start: Due date is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Extra payment</strong> takes a plain number with no unit attached. It feeds Return status. Have it to hand before you start: Extra payment is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Return status</strong> takes a plain number with no unit attached. Have it to hand before you start: Return status is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Payoff accel</strong> takes a plain number with no unit attached. Have it to hand before you start: Payoff accel is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Payoff wo</strong> takes a plain number with no unit attached. Have it to hand before you start: Payoff wo is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Q ref</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Var q2</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Accel unit</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>years</strong> — opens in <em>yrs</em>, and the chip also carries days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Q ref is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are years and percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It counts in whole days.</strong> Dates are compared as calendar days, not as moments: two dates that differ by a few hours on the same day give the same answer, and there is no time-of-day input to set.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Loan amount, Type of acceleration and Mortgage term are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Loan amount, Type of acceleration and Mortgage term is what you already know and Q ref and Var q2 is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/cross-exchange-rate">Cross exchange rate Calculator</a>, <a href="/finance/cross-price-elasticity">Cross price elasticity</a> and <a href="/finance/ctr">CTR Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Mortgage acceleration calculator work out?', 'a' => <<<'TXT'
            Q ref, Var q2 and Accel unit, from Loan amount, Type of acceleration, Mortgage term and Interest rate. The relationship is Return status = run_calculator(Loan amount, Type of acceleration, Mortgage term, Interest rate, Compounding frequency, Due date, Extra payment, Var q2, Q ref).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Loan amount (USD), Type of acceleration, Mortgage term (years), Interest rate (percent), Mortgage points (percent). Fill loan amount, type of acceleration and mortgage term and leave Q ref empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Return status, Payoff wo and Payoff accel blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Q ref is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Loan amount left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Q ref keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/cross-exchange-rate', 'name' => 'Cross exchange rate Calculator'],
            ['path' => '/finance/cross-price-elasticity', 'name' => 'Cross price elasticity'],
            ['path' => '/finance/ctr', 'name' => 'CTR Calculator'],
        ],
        'authors' => [],
    ],
];
