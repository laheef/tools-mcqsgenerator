<?php

/**
 * Deferred payment loan
 * /finance/deferred-payment-loan
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Deferred payment loan',
    'meta' => ['title' => 'Deferred payment loan: Formula, Steps & Results', 'description' => 'Deferred payment loan works out original monthly payment from estimation based on.... Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Deferred payment loan Calculator', 'updated' => '2026-09-30'],
    'sections' => [
        [
            'title' => 'Loan inputs',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Mode',
                            'label' => 'Estimation based on...',
                            'type' => 'select',
                            'options' => ['loan term' => '1', 'monthly payment' => '2'],
                            'dataset' => 'Mode',
                            'default' => 'loan term',
                        ],
                    ],
                ],
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
                            'min' => 2,
                            'default' => '100000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'first_day', 'label' => 'Date of balance', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Payment',
                            'label' => 'Monthly payment',
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
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => '(LoanAmount / Payment) < 2 and Mode == 2', 'text' => 'The monthly payment is too large compared to the loan amount.'],
                            ],
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
                            'help' => 'Annual rate of interest.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5',
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
                            'options' => [
                                'Annually' => '11',
                                'Semi-annually' => '12',
                                'Quarterly' => '13',
                                'Monthly' => '14',
                                'Daily' => '15',
                            ],
                            'dataset' => 'Compound freq',
                            'control' => 'DROPDOWN',
                            'help' => 'How often the interest is computed on the outstanding principle.',
                            'default' => 'Monthly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Pmt',
                            'label' => 'Original monthly payment',
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
                            'name' => 'Per',
                            'label' => 'Original loan term',
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
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'Per == -Infinity', 'text' => 'The estimated term is too short or long for displaying the result — please adjust the parameters.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Loan deferment',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'DefIntMode',
                            'label' => 'Interest treatment',
                            'type' => 'select',
                            'options' => ['Capitalized (added to principal)' => '1', 'Paid monthly during deferment' => '11', 'Paid in equal parts (accum. separately)' => '2', 'Interest-free' => '3'],
                            'dataset' => 'Defer interest mode',
                            'control' => 'DROPDOWN',
                            'default' => 'Capitalized (added to principal)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'DefType',
                            'label' => 'Repayment by...',
                            'type' => 'select',
                            'options' => ['increased payment - original term' => '1', 'increased payment - extended term' => '2', 'original payment - extended term' => '3'],
                            'dataset' => 'Defer type',
                            'control' => 'DROPDOWN',
                            'default' => 'increased payment - original term',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'DefFrom', 'label' => 'Deferment from', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'With the given dates, your loan will already be paid off at the beginning of deferment.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'DefPer',
                            'label' => 'Payments deferred for...',
                            'type' => 'number',
                            'suffix' => 'months',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'The number of deferment periods should be less than the loan term if you choose the "increased payments - original term" option.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Unfortunately, with the current setup, you won’t be able to repay your loan after the deferment period.'],
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
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'DefIntMode == 1', 'text' => <<<'TXT'
                                The loan balance is {{LoanAmount.monetaryValue}} at the beginning, which will become {{FinalLoanAmount.monetaryValue}} at the end of the deferment. The accumulated interest during the deferment is {{AccumulatedInterest.monetaryValue}}.
                                TXT],
                                ['when' => 'DefIntMode == 11', 'text' => <<<'TXT'
                                The loan balance is {{LoanAmount.monetaryValue}} at the beginning, and will remain the same at the end of the deferment. The monthly interest payment during the deferment is {{MonthlyInterest.monetaryValue}}.
                                TXT],
                                ['when' => 'DefIntMode == 2', 'text' => <<<'TXT'
                                The accumulated interest during deferment is {{AccumulatedInterest.monetaryValue}}, which is paid back after deferment ends by equal payments of {{EqualPayments.monetaryValue}}.
                                TXT],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => '[hidden]',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'DefInt',
                            'label' => '',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Fee',
                            'label' => 'Fee',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
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
                            'options' => ['Monthly' => '12.000000000000000', 'Bi-weekly' => '26.088750000000000', 'Weekly' => '52.177500000000000'],
                            'control' => 'DROPDOWN',
                            'default' => 'Monthly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarRep',
                            'label' => 'Varrep',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'represent',
                            'label' => 'Display',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'TableFreq',
                            'label' => 'Show',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarDef',
                            'label' => 'Var def',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarInt',
                            'label' => 'Var int',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarMode',
                            'label' => 'Var mode',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'payoffDateWithout', 'label' => 'Payoff date without', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'payoffDateWith', 'label' => 'Payoff date with', 'type' => 'date'],
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
                            'name' => 'FinalLoanAmount',
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
                            'name' => 'AccumulatedInterest',
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
                            'name' => 'MonthlyWithout',
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
                            'name' => 'MonthlyWith',
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
                            'name' => 'MonthlyDiff',
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
                            'name' => 'InterestWithout',
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
                            'name' => 'InterestWith',
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
                            'name' => 'InterestDiff',
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
                            'name' => 'MonthlyInterest',
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
                            'name' => 'EqualPayments',
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
                            'name' => 'TotalPmtWithout',
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
                            'name' => 'TotalPmtWith',
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
                            'name' => 'TotalPmtDiff',
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
                            'name' => 'numPaymentsWithout',
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
                            'name' => 'numPaymentsWith',
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
                            'name' => 'numPaymentsDiff',
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
                            'name' => 'TermYrsWithout',
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
                            'name' => 'TermMosWithout',
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
                            'name' => 'TermYrsWith',
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
                            'name' => 'TermMosWith',
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
                            'name' => 'TermYrsDiff',
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
                            'name' => 'TermMosDiff',
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
                            'name' => 'payoffDateDiff',
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
                            'name' => 'payoffDateYrsDiff',
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
                            'name' => 'payoffDateMosDiff',
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
                            'name' => 'periods',
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
                            'name' => 'PerAftDef',
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
            'title' => 'Pmt = returnPmt(LoanAmount, q, t, m, r, Fee)',
            'results' => ['Pmt' => 'returnPmt(LoanAmount, q, t, m, r, Fee)'],
        ],
        [
            'title' => 'Per = returnPer(LoanAmount, q, Payment, m, r, Fee)',
            'results' => ['Per' => 'returnPer(LoanAmount, q, Payment, m, r, Fee)'],
        ],
        [
            'title' => 'payoffDateWithout = getPayoffDateWithout(FinalLoanAmount)',
            'results' => ['payoffDateWithout' => 'getPayoffDateWithout(((calcFinalLoanAmt(Mode, LoanAmount, DefIntMode, first_day, DefFrom, DefPer, m, r, t, Payment, DefType))))'],
        ],
        [
            'title' => 'payoffDateWith = getPayoffDateWith(FinalLoanAmount)',
            'results' => ['payoffDateWith' => 'getPayoffDateWith(((calcFinalLoanAmt(Mode, LoanAmount, DefIntMode, first_day, DefFrom, DefPer, m, r, t, Payment, DefType))))'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";var Per,MonthlyWithout,MonthlyWith,InterestWithout,InterestWith,MonthlyInterest,EqualPayments,numPaymentsWith,numPaymentsWithout,payoffDateWithout,payoffDateWith,periods,PerAftDef;var milisecondsInADay=24*60*60*1000;omni.define("calcFinalLoanAmt",function(Mode,LoanAmount,DefIntMode,first_day,DefFrom,DefPer,m,r,t,Payment,DefType){var DefInt=0,DefIntEq=0,intPaidRef=0,intMonthRef=0,princBalOpenRef=0,princMonthRef=0,intPaid=0,intMonth=0,daysPassed=0,DefIntMonth=0;var pmt,pmtRef,pmtBefDef;var DefDateTill=getDateGapEnd(first_day,DefFrom,DefPer);periods=12*t;Per=periods;var LoopDate;var GapTillDef=getGapPeriods(first_day,first_day,DefFrom-1);var eq_p=getPerEqRate(12,m,r);if(Mode===1){pmt=getPmt(LoanAmount,periods,eq_p);pmtRef=pmt;pmtBefDef=pmt;Payment=0}else if(Mode===2){pmt=Payment;pmtRef=Payment;pmtBefDef=Payment;Per=getPer(LoanAmount,Payment,eq_p);periods=Per}var BalanceAtDef=LoanAmount*mathjs.pow(1+eq_p,GapTillDef)-pmtBefDef/eq_p*(mathjs.pow(1+eq_p,GapTillDef)-1);if(DefIntMode===1||DefIntMode===2){DefInt=BalanceAtDef*mathjs.pow(1+eq_p,DefPer)-BalanceAtDef}else{DefInt=0}if(DefType===1){PerAftDef=periods-GapTillDef-DefPer;pmt=getPmt(BalanceAtDef+DefInt,PerAftDef,eq_p)}if(DefType===2){PerAftDef=periods-GapTillDef;pmt=getPmt(BalanceAtDef+DefInt,PerAftDef,eq_p)}if(DefType===3){PerAftDef=getPer(BalanceAtDef+DefInt,pmt,eq_p)}if(DefType===3&&DefIntMode===2){PerAftDef=getNewPer(BalanceAtDef,eq_p,periods-GapTillDef,DefInt,pmt)}if(DefIntMode===2){DefIntEq=DefInt/PerAftDef}var periodsMonth=periods+DefPer+PerAftDef;var pmtMonth=pmt;var pmtMonthRef=pmtRef;var rMonth=eq_p;var princBalRef=LoanAmount,princBal=LoanAmount;var daysInPeriod,princMonth,princBalOpen;var DefDateFrom=formatDate(DefFrom);var iCurr=0,iRef=0,PerSumCurr=0,PerSumRef=0;for(var i=0;i<=periodsMonth;i++){var date=new Date((first_day+daysPassed)*milisecondsInADay);daysInPeriod=getDaysInPeriod(first_day,date,12);if(i>0){daysPassed+=daysInPeriod;var dd=date.getUTCDate();var mm=date.getUTCMonth()+1;var yyyy=date.getUTCFullYear();if(dd<10){dd="0"+dd}if(mm<10){mm="0"+mm}LoopDate=yyyy+""+mm+""+dd;intMonthRef=princBalRef*rMonth;princMonthRef=pmtMonthRef-intMonthRef;princBalRef=princBalRef-princMonthRef;princBalOpenRef=princBalRef+princMonthRef;if(LoopDate>=DefDateFrom&&LoopDate<=DefDateTill){if(DefIntMode!==3){intMonth=princBal*eq_p}else{intMonth=0}if(DefIntMode===1){DefIntMonth=princBal*eq_p}princMonth=0;princBal=princBal-princMonth+DefIntMonth;princBalOpen=princBal+princMonth-DefIntMonth}if(LoopDate>DefDateTill){intMonth=princBal*rMonth;if(DefType===3){princMonth=pmtMonth-intMonth-DefIntEq}else{princMonth=pmtMonth-intMonth}princBal=princBal-princMonth;princBalOpen=princBal+princMonth}if(LoopDate<DefDateFrom){intMonth=princBal*rMonth;princMonth=pmtBefDef-intMonth;princBal=princBal-princMonth;princBalOpen=princBal+princMonth}if(princBalOpen<=0){intMonth=0}if(princBalOpenRef<=0){intMonthRef=0}if(princBalOpenRef<=0){princBalOpenRef=0}if(princBalOpen>0.001&&princMonth>0.001){iCurr=1}else{iCurr=0}if(princBalOpenRef&&princMonthRef>0.001){iRef=1}else{iRef=0}if(princBalOpen>0.001&&princBal<=0.001){payoffDateWith=date}if(princBalOpenRef>0.001&&princBalRef<=0.001){payoffDateWithout=date}intPaid+=intMonth;intPaidRef+=intMonthRef;PerSumCurr+=iCurr;PerSumRef+=iRef}}var FinalLoanAmount=LoanAmount+DefInt;MonthlyInterest=BalanceAtDef*eq_p;EqualPayments=DefIntEq;if(DefType===2){DefInt=0}MonthlyWithout=pmtRef;MonthlyWith=pmt+DefIntEq;InterestWithout=intPaidRef;InterestWith=intPaid+DefInt;numPaymentsWithout=mathjs.ceil(PerSumRef);numPaymentsWith=mathjs.ceil(PerSumCurr);return FinalLoanAmount});omni.define("returnPmt",function(LoanAmount,q,t,m,r){var ex=Math.exp(1);var periods=q*t;var base;if(m===0){var continuous_r=mathjs.pow(ex,r)-1;m=1;base=1+continuous_r/m}else{base=1+r/m}var power=m/q;var eq=q*(mathjs.pow(base,power)-1);var eq_p=eq/q;return LoanAmount*eq_p*mathjs.pow(1+eq_p,periods)/(mathjs.pow(1+eq_p,periods)-1)});omni.define("returnPer",function(LoanAmount,q,Payment,m,r){var ex=Math.exp(1);var base;if(m===0){var continuous_r=mathjs.pow(ex,r)-1;m=1;base=1+continuous_r/m}else{base=1+r/m}var power=m/q;var eq=q*(mathjs.pow(base,power)-1);var eq_p=eq/q;var Per=mathjs.ceil(mathjs.log(Payment/(eq_p*-LoanAmount+Payment))/mathjs.log(eq_p+1));if(isNaN(Per)){return-Infinity}else{return mathjs.round(Per,0)}});omni.define("getMonthlyWithout",function(FinalLoanAmount){return MonthlyWithout});omni.define("getMonthlyWith",function(FinalLoanAmount){return MonthlyWith});omni.define("getInterestWithout",function(FinalLoanAmount){return InterestWithout});omni.define("getInterestWith",function(FinalLoanAmount){return InterestWith});omni.define("getMonthlyInterest",function(FinalLoanAmount){return MonthlyInterest});omni.define("getEqualPayments",function(FinalLoanAmount){return EqualPayments});omni.define("getNumPaymentsWithout",function(FinalLoanAmount){return numPaymentsWithout});omni.define("getNumPaymentsWith",function(FinalLoanAmount){return numPaymentsWith});omni.define("getPayoffDateWithout",function(FinalLoanAmount){return mathjs.round(payoffDateWithout.getTime()/milisecondsInADay)});omni.define("getPayoffDateWith",function(FinalLoanAmount){return mathjs.round(payoffDateWith.getTime()/milisecondsInADay)});omni.define("getPeriods",function(FinalLoanAmount){return periods});omni.define("getPerAftDef",function(FinalLoanAmount){return PerAftDef});function getGapPeriods(FirstDay,DateFrom,DateTill){var milisecondsInADay=24*60*60*1000;var date1=new Date(DateFrom*milisecondsInADay);var date2=new Date(DateTill*milisecondsInADay);var DayFirst=date1.getUTCDate();var DayLast=date2.getUTCDate();var DaysInFirstMonth=getDaysInMonth(date1);var DaysInLastMonth=getDaysInMonth(date2);var DateDue=formatDate(FirstDay);var DayDue=parseInt(DateDue.substring(6,8));var DateFrom2=formatDate(DateFrom);var DateTill2=formatDate(DateTill);var YearFrom=parseInt(DateFrom2.substring(0,4));var YearTill=parseInt(DateTill2.substring(0,4));var MonthFrom=parseInt(DateFrom2.substring(4,6));var MonthTill=parseInt(DateTill2.substring(4,6));var DayFrom=parseInt(DateFrom2.substring(6,8));var DayTill=parseInt(DateTill2.substring(6,8));var MonthCorr1=0;var MonthCorr2=0;var MonthCorr3=0;if(DayDue-DayFrom>=0){MonthCorr1=1}if(DayDue-DayTill>0){MonthCorr2=-1}if(DaysInFirstMonth===DayFirst&&DaysInLastMonth===DayLast&&DaysInFirstMonth!==DaysInLastMonth){MonthCorr3=1}return(YearTill-YearFrom)*12+(MonthTill-MonthFrom)+MonthCorr1+MonthCorr2+MonthCorr3}function getDaysInMonth(date){var month=date.getUTCMonth();var year=date.getUTCFullYear();var daysInMonth;if(month===0){daysInMonth=31}else if(month===1){daysInMonth=28}else if(month===2){daysInMonth=31}else if(month===3){daysInMonth=30}else if(month===4){daysInMonth=31}else if(month===5){daysInMonth=30}else if(month===6){daysInMonth=31}else if(month===7){daysInMonth=31}else if(month===8){daysInMonth=30}else if(month===9){daysInMonth=31}else if(month===10){daysInMonth=30}else if(month===11){daysInMonth=31}if(year%4===0&&year%100!==0&&month===1||year%400===0&&month===1){daysInMonth=29}return daysInMonth}function formatDate(date){date=new Date(date*24*60*60*1000);var Year=date.getUTCFullYear();var Month=date.getUTCMonth()+1;var Day=date.getUTCDate();if(Month<10){Month="0"+Month}if(Day<10){Day="0"+Day}return Year+""+Month+""+Day}function getPerEqRate(q,m,r){var ex=Math.exp(1);var base;if(m===0){var continuous_r=mathjs.pow(ex,r)-1;m=1;base=1+continuous_r/m}else{base=1+r/m}var power=m/q;return mathjs.round(mathjs.pow(base,power)-1,10)}function getPer(LoanAmount,Pmt,eq_p){var Per=mathjs.ceil(mathjs.log(Pmt/(eq_p*-LoanAmount+Pmt))/mathjs.log(eq_p+1));if(Per<=0||isNaN(Per)){Per=0}return Per}function getPmt(LoanAmount,periods,eq_p){return LoanAmount*eq_p*mathjs.pow(1+eq_p,periods)/(mathjs.pow(1+eq_p,periods)-1)}function getNewPer(LoanAmount,eq_p,periods,DefInt,pmt){var iteration=0;var MAX_ITERATIONS=5000000;var MIN_PRECISION=1e-10;var oldPer;var NewPer=periods;LoanAmount=LoanAmount/10000;DefInt=DefInt/10000;pmt=pmt/10000;do{oldPer=NewPer;var dividend=LoanAmount*eq_p*mathjs.pow(1+eq_p,NewPer)/(mathjs.pow(1+eq_p,NewPer)-1)+DefInt/NewPer-pmt;var divisor=-mathjs.pow(DefInt/NewPer,2)-LoanAmount*eq_p*mathjs.pow(1+eq_p,NewPer)*mathjs.log(eq_p+1)/mathjs.pow(mathjs.pow(1+eq_p,NewPer)-1,2);NewPer=NewPer-dividend/divisor;++iteration}while(Math.abs(oldPer-NewPer)>MIN_PRECISION&&iteration<=MAX_ITERATIONS);NewPer=mathjs.ceil(NewPer);return NewPer}function getDaysInPeriod(FirstDay,date,q){FirstDay=new Date(FirstDay*milisecondsInADay);var daysInMonth;var daysInPeriod;var DaysInYear;var DaysInNextYear;var day=FirstDay.getUTCDate();var month=date.getUTCMonth();var year=date.getUTCFullYear();if(day<29&&month===0){daysInMonth=31}else if(day===29&&month===0){daysInMonth=30}else if(day===30&&month===0){daysInMonth=29}else if(day===31&&month===0){daysInMonth=28}else if(day<29&&month===1){daysInMonth=28}else if(day===29&&month===1){daysInMonth=29}else if(day===30&&month===1){daysInMonth=30}else if(day===31&&month===1){daysInMonth=31}else if(day<31&&month===2){daysInMonth=31}else if(day===31&&month===2){daysInMonth=30}else if(day<31&&month===3){daysInMonth=30}else if(day===31&&month===3){daysInMonth=31}else if(day<31&&month===4){daysInMonth=31}else if(day===31&&month===4){daysInMonth=30}else if(day<31&&month===5){daysInMonth=30}else if(day===31&&month===5){daysInMonth=31}else if(day<31&&month===6){daysInMonth=31}else if(day===31&&month===6){daysInMonth=31}else if(day<31&&month===7){daysInMonth=31}else if(day===31&&month===7){daysInMonth=30}else if(day<31&&month===8){daysInMonth=30}else if(day===31&&month===8){daysInMonth=31}else if(day<31&&month===9){daysInMonth=31}else if(day===31&&month===9){daysInMonth=30}else if(day<31&&month===10){daysInMonth=30}else if(day===31&&month===10){daysInMonth=31}else if(day<31&&month===11){daysInMonth=31}else if(day===31&&month===11){daysInMonth=31}if(year%4===0&&year%100!==0&&month===1||year%400===0&&month===1){daysInMonth=29}if(year%4===0&&year%100!==0&&month===0&&date.getDate()===30||year%400===0&&month===0&&date.getDate()===30){daysInMonth=30}if(year%4===0&&year%100!==0&&month===0&&date.getDate()===31||year%400===0&&month===0&&date.getDate()===31){daysInMonth=29}if(year%4===0&&year%100!==0&&month===0&&date.getDate()===29||year%400===0&&month===0&&date.getDate()===29){daysInMonth=31}if(date.getDate()===29&&date.getMonth()===1&&day>29){daysInMonth=30}if(date.getDate()===29&&date.getMonth()===1&&day>30){daysInMonth=31}if(date.getDate()===28&&date.getMonth()===1&&day>30){daysInMonth=31}if(year%4===0&&year%100!==0||year%400===0){DaysInYear=366}else{DaysInYear=365}if((year+1)%4===0&&(year+1)%100!==0||(year+1)%400===0){DaysInNextYear=366}else{DaysInNextYear=365}if(q===1){daysInPeriod=DaysInYear}if(q===12){daysInPeriod=daysInMonth}if(q===26){daysInPeriod=14}if(q===52){daysInPeriod=7}if(q===365){daysInPeriod=1}if(q===4){day=date.getUTCDate();if(month===0&&DaysInYear===366){daysInPeriod=91}if(month===0&&DaysInYear===365){daysInPeriod=90}if(month===1&&DaysInYear===366){daysInPeriod=90}if(month===1&&DaysInYear===365){daysInPeriod=89}if(month===11&&DaysInNextYear===366){daysInPeriod=92}if(month===11&&DaysInNextYear===365){daysInPeriod=91}if(month===2||month===4||month===6||month===7||month===9||month===10){daysInPeriod=92}if(month===3||month===5||month===8){daysInPeriod=91}if(day===31&&(month===2||month===7)){daysInPeriod=91}if(day===30&&(month===3||month===8||month===5)){daysInPeriod=92}if(day===31&&month===0&&DaysInYear===365){daysInPeriod=89}if(day===31&&month===0&&DaysInYear===366){daysInPeriod=90}if(day===31&&(month===4||month===9)){daysInPeriod=92}if(day>=30&&month>=10&&DaysInNextYear===366){daysInPeriod=91}if(day>=30&&month>=10&&DaysInNextYear===365){daysInPeriod=90}if(day===28&&month===1&&DaysInYear===365){daysInPeriod=92}if(day===28&&month===1&&DaysInYear===366){daysInPeriod=93}if(day===29&&month===1){daysInPeriod=92}}if(q===2){daysInPeriod=180}return daysInPeriod}function getDateGapEnd(FirstDay,DateFrom,periodsGap){var DateEnd;var daysPassed=0;var MonthCorr=1;var date2=new Date(FirstDay*milisecondsInADay);var date1=new Date(DateFrom*milisecondsInADay);var DayFrom=date2.getUTCDate();var DayTill=date1.getUTCDate();if(DayFrom<DayTill){MonthCorr=2}for(var i=0;i<=periodsGap+10;i++){var date=new Date((DateFrom+daysPassed)*milisecondsInADay);var daysInPeriod=getDaysInPeriod(DateFrom,date,12);var Year=date.getUTCFullYear();var Month=date.getUTCMonth()+MonthCorr;var Day=date2.getUTCDate();if(Month<10){Month="0"+Month}if(Day<10){Day="0"+Day}var dateFormat=Year+""+Month+""+Day;if(i>0){daysPassed+=daysInPeriod;if(i===periodsGap){DateEnd=dateFormat}}}return DateEnd}//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Deferred payment loan works out M from Estimation based on…, Loan amount and Date of balance. It is a single relationship that reads m out of estimation based on…, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Deferred payment loan calculator works', 'html' => <<<'TXT'
            <p>Deferred payment loan answers one question from 24 numbers, and the answer is M.</p><p>In the form&#039;s own words, Original monthly payment = returnPmt(Loan amount, Payment frequency, Loan term, M, Interest rate, Fee).</p><p>The result panel carries M, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 24 boxes, and nothing else.</p><ul><li><strong>Estimation based on…</strong> — a plain number, no unit</li><li><strong>Loan amount</strong> — in USD</li><li><strong>Date of balance</strong> — a plain number, no unit, entered as a date</li><li><strong>Monthly payment</strong> — in USD</li><li><strong>Loan term</strong> — in years / months</li><li><strong>Interest rate</strong> — in percent. Annual rate of interest.</li><li><strong>Compounding frequency</strong> — a plain number, no unit. How often the interest is computed on the outstanding principle.</li><li><strong>Original monthly payment</strong> — in USD</li><li><strong>Original loan term</strong> — in years / months</li><li><strong>Interest treatment</strong> — a plain number, no unit</li><li><strong>Repayment by…</strong> — a plain number, no unit</li><li><strong>Deferment from</strong> — a plain number, no unit, entered as a date</li><li><strong>Payments deferred for…</strong> — in months</li><li><strong>Fee</strong> — a plain number, no unit</li><li><strong>Vartable</strong> — a plain number, no unit</li><li><strong>Payment frequency</strong> — a plain number, no unit</li><li><strong>Varrep</strong> — a plain number, no unit</li><li><strong>Display</strong> — a plain number, no unit</li><li><strong>Show</strong> — a plain number, no unit</li><li><strong>Var def</strong> — a plain number, no unit</li><li><strong>Var int</strong> — a plain number, no unit</li><li><strong>Var mode</strong> — a plain number, no unit</li><li><strong>Payoff date without</strong> — a plain number, no unit, entered as a date</li><li><strong>Payoff date with</strong> — a plain number, no unit, entered as a date</li></ul><p>What you get back is M, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Loan term lists 9 options and opens on years / months. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Original monthly payment</strong> = <code>returnPmt(Loan amount, Payment frequency, Loan term, M, Interest rate, Fee)</code></li><li><strong>Original loan term</strong> = <code>returnPer(Loan amount, Payment frequency, Monthly payment, M, Interest rate, Fee)</code></li><li><strong>Payoff date without</strong> = <code>getPayoffDateWithout(((calcFinalLoanAmt(Estimation based on..., Loan amount, Interest treatment, Date of balance, Deferment from, Payments deferred for..., M, Interest rate, Loan term, Monthly payment, Repayment by...))))</code></li><li><strong>Payoff date with</strong> = <code>getPayoffDateWith(((calcFinalLoanAmt(Estimation based on..., Loan amount, Interest treatment, Date of balance, Deferment from, Payments deferred for..., M, Interest rate, Loan term, Monthly payment, Repayment by...))))</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Original monthly payment</strong> = <code>returnPmt(Loan amount, Payment frequency, Loan term, M, Interest rate, Fee)</code> — the form to use when Loan amount, Payment frequency, Loan term and M are the values you have.</li><li><strong>Original loan term</strong> = <code>returnPer(Loan amount, Payment frequency, Monthly payment, M, Interest rate, Fee)</code> — the form to use when Loan amount, Payment frequency, Monthly payment and M are the values you have.</li><li><strong>Payoff date without</strong> = <code>getPayoffDateWithout(((calcFinalLoanAmt(Estimation based on..., Loan amount, Interest treatment, Date of balance, Deferment from, Payments deferred for..., M, Interest rate, Loan term, Monthly payment, Repayment by...))))</code> — the form to use when Estimation based on…, Loan amount, Interest treatment and Date of balance are the values you have.</li><li><strong>Payoff date with</strong> = <code>getPayoffDateWith(((calcFinalLoanAmt(Estimation based on..., Loan amount, Interest treatment, Date of balance, Deferment from, Payments deferred for..., M, Interest rate, Loan term, Monthly payment, Repayment by...))))</code> — the form to use when Estimation based on…, Loan amount, Interest treatment and Date of balance are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Original monthly payment, Original loan term and Payoff date without can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Loan term, Interest rate and Original loan term carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> M is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Estimation based on… left as a guess.</strong> Anything typed into Estimation based on… is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Loan amount left as a guess.</strong> Anything typed into Loan amount is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Estimation based on... to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Estimation based on…, Loan amount, Date of balance and Monthly payment ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Estimation based on… — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check M against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind M is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover years / months and percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It counts in whole days.</strong> The differences are counted in whole days, so an answer is a date or a number of days rather than an interval in hours. Expect a day&#039;s uncertainty if the event itself happened at an unknown time.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Estimation based on…, Loan amount and Date of balance and the number you are missing is M.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/annuity">Annuity Calculator</a>, <a href="/finance/annuity-payout">Annuity payout Calculator</a> and <a href="/finance/apc">APC Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Deferred payment loan is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Deferred payment loan is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Estimation based on…, Loan amount, Date of balance and Monthly payment beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Deferred payment loan calculator work out?', 'a' => <<<'TXT'
            M, from Loan amount, Payment frequency, Loan term and M. The relationship is Original monthly payment = returnPmt(Loan amount, Payment frequency, Loan term, M, Interest rate, Fee).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Estimation based on…, Loan amount (USD), Date of balance, Monthly payment (USD), Loan term (years / months). Enter estimation based on…, loan amount and date of balance; M is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Original monthly payment, Original loan term, Payoff date without and Payoff date with can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of M is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Estimation based on... blank and the page solves for it, reporting M instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. M keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/annuity', 'name' => 'Annuity Calculator'],
            ['path' => '/finance/annuity-payout', 'name' => 'Annuity payout Calculator'],
            ['path' => '/finance/apc', 'name' => 'APC Calculator'],
        ],
        'authors' => [],
    ],
];
