<?php

/**
 * Car refinance
 * /finance/car-refinance
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Car refinance',
    'meta' => ['title' => 'Car refinance Calculator — Formula & Results', 'description' => 'Car refinance works out return status and break even date and reports both. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Car refinance Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => 'Current loan',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Mode',
                            'label' => 'Estimation by...',
                            'type' => 'select',
                            'options' => ['remaining loan term' => '1', 'monthly payment' => '2'],
                            'dataset' => 'estimation by (VarMode)',
                            'default' => 'remaining loan term',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'LoanAmount',
                            'label' => 'Balance left on loan',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '32000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Payment',
                            'label' => 'Payment',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '600',
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
                            'name' => 't',
                            'label' => 'Remaining loan term',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '6',
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
                            'help' => 'Annual rate of interest.',
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
                            'name' => 'CompoundFreq_m',
                            'label' => 'Compounding frequency',
                            'type' => 'select',
                            'options' => ['Yearly' => '1', 'Semi-annually (Canada)' => '2', 'Quarterly' => '4', 'Monthly (UK & US)' => '12'],
                            'dataset' => 'comp freq',
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
                            'name' => 'advanced_1',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Set due date and compounding' => '1', '' => '0'],
                            'dataset' => 'advanced 1',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Loan refinancing',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'RefDate', 'label' => 'New loan\'s due date', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tRef',
                            'label' => 'New loan term',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rRef',
                            'label' => 'New interest rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '4.5',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'CompoundFreqRef_mRef',
                            'label' => 'Compounding frequency',
                            'type' => 'select',
                            'options' => ['Yearly' => '1', 'Semi-annually (Canada)' => '2', 'Quarterly' => '4', 'Monthly (UK & US)' => '12'],
                            'dataset' => 'comp freq',
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
                            'name' => 'CostPerc',
                            'label' => 'Origination fee',
                            'type' => 'number',
                            'help' => 'Upfront fee in percentage of the loan amount.',
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
                            'name' => 'Cost',
                            'label' => 'Costs of refinancing',
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
                            'name' => 'Cash',
                            'label' => 'Cash in / out',
                            'type' => 'number',
                            'help' => 'Give this option if you are about to have some cash out (positive sign) or cash in (negative sign).',
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
                            'name' => 'advanced_2',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Set fees and costs' => '1', '' => '0'],
                            'dataset' => 'advanced 2',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Refinance car loan summary',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'CostTotal > 0', 'text' => 'The cost of refinancing your current loan is {{CostTotal.monetaryValue}}.'],
                                ['when' => 'break_even_periods > 0', 'text' => <<<'TXT'
                                Your accumulated savings resulting from refinancing will exceed the costs of the new loan after {{break_even_yrs.value}}&nbsp;year(s) and {{break_even_mos.value}}&nbsp;month(s).&nbsp; It means that the break-even point will occur on the {{break_even_date.shortValue}}.&nbsp;
                                TXT],
                                ['when' => 'loan_term_new * 12 < break_even_periods', 'text' => 'The cost of the new loan will never be compensated.'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'The monthly payment is too high compared to the loan amount.'],
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
                        ['name' => 'break_even_date', 'label' => 'Break even date', 'type' => 'date'],
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
                            'name' => 'interest_diff',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'loan_amount_current',
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
                            'name' => 'loan_amount_new',
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
                            'name' => 'loan_amount_diff',
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
                            'name' => 'monthly_payment_current',
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
                            'name' => 'monthly_payment_new',
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
                            'name' => 'monthly_payment_diff',
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
                            'name' => 'loan_term_current',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'loan_term_new',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'loan_term_diff',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_interest_current',
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
                            'name' => 'total_interest_new',
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
                            'name' => 'total_payments_current',
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
                            'name' => 'CostTotal',
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
                            'name' => 'total_payments_new',
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
                            'name' => 'total_payments_diff',
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
                            'name' => 'break_even_periods',
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
                            'name' => 'break_even_yrs',
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
                            'name' => 'break_even_mos',
                            'label' => '',
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
            'title' => 'return_status = run_calculator(Mode, LoanAmount, Payment, first_day, t, r, CompoundFreq_m, RefDate, tRef, rRef, CompoundFreqRef_mRef, CostPerc, Cost, Cash)',
            'results' => ['return_status' => 'run_calculator(Mode, LoanAmount, Payment, first_day, t, r, CompoundFreq_m, RefDate, tRef, rRef, CompoundFreqRef_mRef, CostPerc, Cost, Cash)'],
        ],
        [
            'title' => 'break_even_date = get_break_even_date()',
            'results' => ['break_even_date' => 'get_break_even_date()'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";var q=12,ex=mathjs.e,millisecondsInADay=24*60*60*1000;var loan_amount_current,monthly_payment_current,monthly_payment_new,loan_term_current,loan_term_new,total_interest_current,total_interest_new,break_even_periods,break_even_date;omni.define("run_calculator",function(VarMode,LoanAmount,Payment,first_day,t,r,m,RefDate,tRef,rRef,mRef,CostPerc,Cost,Cash){var RefDateFrom=formatDate(first_day);var RefDateTill=formatDate(RefDate);var RefYearFrom=parseInt(RefDateFrom.substring(0,4));var RefYearTill=parseInt(RefDateTill.substring(0,4));var RefMonthFrom=parseInt(RefDateFrom.substring(4,6));var RefMonthTill=parseInt(RefDateTill.substring(4,6));var RefDayFrom=parseInt(RefDateFrom.substring(6,8));var RefDayTill=parseInt(RefDateTill.substring(6,8));var MonthCorr=0;if(RefDayTill-RefDayFrom<0){MonthCorr=-1}var RefGap=(RefYearTill-RefYearFrom)*12+(RefMonthTill-RefMonthFrom)+MonthCorr;var periods=q*t;var periodsRef=q*tRef;var Per,pmt;var base;if(m===0){var continuous_r=mathjs.pow(ex,r)-1;m=1;base=1+continuous_r/m}else{base=1+r/m}var power=m/q;var eq=q*(mathjs.pow(base,power)-1);var eq_p=eq/q;if(VarMode===1){pmt=LoanAmount*eq_p*mathjs.pow(1+eq_p,periods)/(mathjs.pow(1+eq_p,periods)-1);Payment=0;Per=periods}if(VarMode===2){pmt=Payment;Per=mathjs.ceil(mathjs.log(Payment/(eq_p*-LoanAmount+Payment))/mathjs.log(eq_p+1));periods=Per}var BalanceClose=LoanAmount*mathjs.pow(1+eq_p,RefGap)-pmt/eq_p*(mathjs.pow(1+eq_p,RefGap)-1);var LoanAmountRef=BalanceClose+Cash;var CostPoints=LoanAmountRef*CostPerc;var CostTotal=CostPoints+Cost;var baseRef;if(mRef===0){var continuous_rRef=mathjs.pow(ex,rRef)-1;mRef=1;baseRef=1+continuous_rRef/mRef}else{baseRef=1+rRef/mRef}var powerRef=mRef/q;var eqRef=q*(mathjs.pow(baseRef,powerRef)-1);var eq_pRef=eqRef/q;var pmtRef=LoanAmountRef*eq_pRef*mathjs.pow(1+eq_pRef,periodsRef)/(mathjs.pow(1+eq_pRef,periodsRef)-1);var periodsMonth;var periodsMonthCurr=periods-RefGap;var periodsMonthRef=periodsRef;if(periodsMonthCurr>periodsMonthRef){periodsMonth=periodsMonthCurr}else{periodsMonth=periodsRef}var rMonth=eq_p;var rMonthRef=eq_pRef;if(periodsMonth<0){return-1}var pmtMonth=pmt;var pmtMonthRef=pmtRef;var princBal=BalanceClose;var princBalRef=LoanAmountRef;var princBalOpen;var princMonth;var intMonth;var princPaid=0;var intPaid=0;var princBalOpenRef=0;var princMonthRef=0;var intMonthRef=0;var princPaidRef=0;var intPaidRef=0;var MondthlySave=pmtRef-pmt;var BreakPointPer=CostTotal/-MondthlySave;var BreakEven;var date,daysInMonth,daysPassed=0;for(var i=0;i<=periodsMonth;i++){date=new Date((RefDate+daysPassed)*millisecondsInADay);daysInMonth=getDaysInMonth(date);daysPassed=daysPassed+daysInMonth;if(i>0){intMonthRef=princBalRef*rMonthRef;princMonthRef=pmtMonthRef-intMonthRef;princBalRef=princBalRef-princMonthRef;princBalOpenRef=princBalRef+princMonthRef;intMonth=princBal*rMonth;princMonth=pmtMonth-intMonth;princBal=princBal-princMonth;princBalOpen=princBal+princMonth;if(princBalOpen<pmtMonth){princMonth=princBalOpen}if(princBalOpenRef<pmtMonthRef){princMonthRef=princBalOpenRef}intPaid+=intMonth;princPaid+=princMonth;intPaidRef+=intMonthRef;princPaidRef+=princMonthRef;if(princBal<=0){princBal=0}if(princBalOpen<=0){princBalOpen=0}if(princBalOpen<=0){intMonth=0}if(princMonth<=0){princMonth=0}if(intMonth<=0){princMonth=0}if(princBal<=0){princPaid=BalanceClose}if(princBalRef<=0){princBalRef=0}if(princBalOpenRef<=0){princBalOpenRef=0}if(princBalOpenRef<=0){intMonthRef=0}if(princMonthRef<=0){princMonthRef=0}if(intMonthRef<=0){princMonthRef=0}if(princBalRef<=0){princPaidRef=LoanAmountRef}}if(mathjs.ceil(BreakPointPer)===i){BreakEven=date}}loan_amount_current=BalanceClose;monthly_payment_current=pmt;monthly_payment_new=pmtRef;loan_term_current=(periods-RefGap)/12;loan_term_new=periodsRef/12;total_interest_current=intPaid;total_interest_new=intPaidRef;break_even_periods=BreakPointPer;break_even_date=BreakEven.getTime();return 1});omni.define("get_loan_amount_current",function(){return loan_amount_current});omni.define("get_monthly_payment_current",function(){return monthly_payment_current});omni.define("get_monthly_payment_new",function(){return monthly_payment_new});omni.define("get_loan_term_current",function(){return loan_term_current});omni.define("get_loan_term_new",function(){return loan_term_new});omni.define("get_total_interest_current",function(){return total_interest_current});omni.define("get_total_interest_new",function(){return total_interest_new});omni.define("get_break_even_date",function(){return break_even_date});function formatDate(date){date=new Date(date*24*60*60*1000);var Year=date.getUTCFullYear();var Month=date.getUTCMonth()+1;var Day=date.getUTCDate();if(Month<10){Month="0"+Month}if(Day<10){Day="0"+Day}return Year+""+Month+""+Day}function getDaysInMonth(date){var year=date.getFullYear();var month=date.getMonth();return new Date(year,month+1,0).getDate()}//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Car refinance turns Estimation by…, Balance left on loan and Payment into Return status and Break even date. There is no hidden constant here: change return status and estimation by… moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Car refinance calculator works', 'html' => <<<'TXT'
            <p>The Car refinance calculator applies one relationship to 14 numbers and reports Return status and Break even date.</p><p>The result panel carries Return status and Break even date, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 14 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Estimation by…</strong> — a plain number, no unit</li><li><strong>Balance left on loan</strong> — in USD</li><li><strong>Payment</strong> — in USD</li><li><strong>Due date</strong> — a plain number, no unit, entered as a date</li><li><strong>Remaining loan term</strong> — in years</li><li><strong>Interest rate</strong> — in percent. Annual rate of interest.</li><li><strong>Compounding frequency</strong> — a plain number, no unit. How often the interest is computed on the outstanding principle.</li><li><strong>New loan&#039;s due date</strong> — a plain number, no unit, entered as a date</li><li><strong>New loan term</strong> — in years</li><li><strong>New interest rate</strong> — in percent</li><li><strong>Compounding frequency</strong> — a plain number, no unit. How often the interest is computed on the outstanding principle.</li><li><strong>Origination fee</strong> — in percent. Upfront fee in percentage of the loan amount.</li><li><strong>Costs of refinancing</strong> — in USD</li><li><strong>Cash in / out</strong> — in USD. Give this option if you are about to have some cash out (positive sign) or cash in (negative sign).</li></ul><p>The answers come back as Return status, Break even date. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Remaining loan term offers 5 units and opens on years, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Break even date</strong> = <code>get_break_even_date()</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Break even date</strong> = <code>get_break_even_date()</code> — the form to use when the other values are known.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Return status and Break even date can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Remaining loan term, Interest rate and New loan term is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Return status and Break even date are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Estimation by… left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Estimation by… is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Balance left on loan left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Balance left on loan is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Estimation by... and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Estimation by…</strong> takes a plain number with no unit attached. The page reads it when it works out Return status. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Estimation by… is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Balance left on loan</strong> takes a plain number with no unit attached. The page reads it when it works out Return status. Have it to hand before you start: Balance left on loan is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Payment</strong> takes a plain number with no unit attached. The page reads it when it works out Return status. Have it to hand before you start: Payment is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Due date</strong> takes a plain number with no unit attached. The page reads it when it works out Return status. Have it to hand before you start: Due date is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Remaining loan term</strong> is a years quantity: the page opens it in yrs and converts anything else you pick before the formula runs. The page reads it when it works out Return status. Have it to hand before you start: Remaining loan term is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Interest rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Annual rate of interest. The page reads it when it works out Return status. Have it to hand before you start: Interest rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Compounding frequency</strong> takes a plain number with no unit attached. How often the interest is computed on the outstanding principle. The page reads it when it works out Return status. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Compounding frequency is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>New loan&#039;s due date</strong> takes a plain number with no unit attached. The page reads it when it works out Return status. Have it to hand before you start: New loan&#039;s due date is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>New loan term</strong> is a years quantity: the page opens it in yrs and converts anything else you pick before the formula runs. The page reads it when it works out Return status. Have it to hand before you start: New loan term is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>New interest rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The page reads it when it works out Return status. Have it to hand before you start: New interest rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Compounding frequency</strong> takes a plain number with no unit attached. How often the interest is computed on the outstanding principle. The page reads it when it works out Return status. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Compounding frequency is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Origination fee</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Upfront fee in percentage of the loan amount. The page reads it when it works out Return status. Have it to hand before you start: Origination fee is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Costs of refinancing</strong> takes a plain number with no unit attached. The page reads it when it works out Return status. Have it to hand before you start: Costs of refinancing is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Cash in / out</strong> takes a plain number with no unit attached. Give this option if you are about to have some cash out (positive sign) or cash in (negative sign). The page reads it when it works out Return status. Have it to hand before you start: Cash in / out is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 2 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Return status</strong> is a plain number. It is worked out from Estimation by…, Balance left on loan, Payment and Due date. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Break even date</strong> is a plain number. The page computes it from the form as a whole rather than from one line of the formula. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>years</strong> — opens in <em>yrs</em>, and the chip also carries days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Return status follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover years and percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It counts in whole days.</strong> The differences are counted in whole days, so an answer is a date or a number of days rather than an interval in hours. Expect a day&#039;s uncertainty if the event itself happened at an unknown time.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Estimation by…, Balance left on loan and Payment is what you already know and Return status and Break even date is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/lottery-tax">Lottery tax Calculator</a>, <a href="/finance/ltv">LTV (Loan to Value) Calculator</a> and <a href="/finance/lumpsum">Lumpsum (India)</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Car refinance calculator work out?', 'a' => 'Return status and Break even date, from Estimation by…, Balance left on loan, Payment and Due date.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Estimation by…, Balance left on loan (USD), Payment (USD), Due date, Remaining loan term (years). With estimation by…, balance left on loan and payment in place, Return status can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Return status and Break even date can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Return status is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Estimation by... left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Return status at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/lottery-tax', 'name' => 'Lottery tax Calculator'],
            ['path' => '/finance/ltv', 'name' => 'LTV (Loan to Value) Calculator'],
            ['path' => '/finance/lumpsum', 'name' => 'Lumpsum (India)'],
        ],
        'authors' => [],
    ],
];
