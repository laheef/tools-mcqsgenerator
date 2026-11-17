<?php

/**
 * Bi-weekly mortgage payment
 * /finance/bi-weekly-mortgage-payment
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Bi-weekly mortgage payment',
    'meta' => ['title' => 'Bi-weekly mortgage payment — Formula & Results', 'description' => 'Bi-weekly mortgage payment takes mortgage amount and returns mortgage points. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Bi-weekly mortgage payment Calculator', 'updated' => '2026-09-09'],
    'sections' => [
        [
            'title' => 'Mortgage #1',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'LoanAmount',
                            'label' => 'Mortgage amount',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '300000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 't',
                            'label' => 'Mortgage term',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
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
                            'default' => '6.5',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'CostPerc',
                            'label' => 'Mortgage points',
                            'type' => 'number',
                            'help' => 'Upfront payment percentage.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Cost',
                            'label' => 'Upfront fee',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '1000',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Bi-weekly mortgage inputs',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'LoanAmount2',
                            'label' => 'Mortgage amount',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '300000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PmtFreq2',
                            'label' => 'Payment frequency',
                            'type' => 'select',
                            'options' => ['Bi-weekly payments' => '2', 'Accelerated weekly' => '3'],
                            'dataset' => 'PmtFreq2',
                            'control' => 'DROPDOWN',
                            'default' => 'Bi-weekly payments',
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
                            'name' => 'PmtExtra',
                            'label' => 'Extra payment',
                            'type' => 'number',
                            'help' => 'Set here an additional bi-weekly principal payment.',
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
                            'name' => 'advanced',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Change points, fee or compounding' => '1', '' => '0'],
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
                            'name' => 'CompoundFreqRef',
                            'label' => 'Compounding frequency',
                            'type' => 'select',
                            'options' => ['Yearly' => '11', 'Semi-annually (Canada)' => '12', 'Quarterly' => '13', 'Monthly (UK & US)' => '14'],
                            'dataset' => 'CompoundFreq',
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
                            'options' => ['Yearly' => '11', 'Semi-annually (Canada)' => '12', 'Quarterly' => '13', 'Monthly (UK & US)' => '14'],
                            'dataset' => 'CompoundFreq',
                            'control' => 'DROPDOWN',
                            'help' => 'How often the interest is computed on the outstanding principle.',
                            'default' => 'Monthly (UK & US)',
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
                        [
                            'name' => 'PmtFreq',
                            'label' => 'Comparison with:',
                            'type' => 'select',
                            'options' => ['Monthly payments' => '1', 'Bi-monthly payments' => '2', 'Bi-weekly payments' => '3', 'Weekly payments' => '4'],
                            'dataset' => 'PmtFreq',
                            'control' => 'DROPDOWN',
                            'default' => 'Monthly payments',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Other',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarRep',
                            'label' => 'Varrep',
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
                            'label' => 'Display...',
                            'type' => 'select',
                            'options' => ['Chart of balances' => '11', 'Table of balances' => '21'],
                            'dataset' => 'represent',
                            'control' => 'DROPDOWN',
                            'default' => 'Chart of balances',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'first_day',
                            'label' => 'Due date',
                            'type' => 'date',
                            'help' => 'Please Don\'t Remove Me.',
                            'readonly' => true,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'TableFreq',
                            'label' => 'Show...',
                            'type' => 'select',
                            'options' => ['Periodic schedule' => '111', 'Annual schedule' => '112'],
                            'dataset' => 'TableFreq',
                            'control' => 'DROPDOWN',
                            'default' => 'Annual schedule',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'date_single', 'label' => 'Date single', 'type' => 'date'],
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
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mRef',
                            'label' => 'M ref',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarQ',
                            'label' => 'Var q',
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
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Cash',
                            'label' => 'Cash in / out',
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
                            'name' => 'q',
                            'label' => 'Q',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
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
            ],
        ],
        [
            'title' => 'Table values (hidden)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'biweeklyMortgage',
                            'label' => 'Biweekly mortgage',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'titleComp1',
                            'label' => 'Title comp1',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'titleComp2',
                            'label' => 'Title comp2',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'payment1',
                            'label' => 'Payment1',
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
                            'name' => 'payment2',
                            'label' => 'Payment2',
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
                            'name' => 'paymentDiffValue',
                            'label' => 'Payment diff value',
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
                            'name' => 'term1',
                            'label' => 'Term1',
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
                            'name' => 'term2',
                            'label' => 'Term2',
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
                            'name' => 'termDiff',
                            'label' => 'Term diff',
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
                        ['name' => 'payoffDate1', 'label' => 'Payoff date1', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'payoffDate2', 'label' => 'Payoff date2', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'payoffDiff',
                            'label' => 'Payoff diff',
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
                            'name' => 'totalInterest1',
                            'label' => 'Total interest1',
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
                            'name' => 'totalInterest2',
                            'label' => 'Total interest2',
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
                            'name' => 'interestDiff',
                            'label' => 'Interest diff',
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
                            'name' => 'paymentDiff',
                            'label' => 'Payment diff',
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
                            'name' => 'totalPayments1',
                            'label' => 'Total payments1',
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
                            'name' => 'totalPayments2',
                            'label' => 'Total payments2',
                            'type' => 'number',
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
            'title' => 'CostPerc2 = Cost2 / LoanAmount',
            'results' => ['LoanAmount' => 'Cost2/CostPerc2', 'Cost2' => 'CostPerc2*LoanAmount', 'CostPerc2' => 'Cost2/LoanAmount'],
        ],
        [
            'title' => <<<'TXT'
            biweeklyMortgage = calculateBiweeklyMortgageComparison(r, t, m, q, qRef, LoanAmount, LoanAmount2, VarTable, VarRep, first_day, tRef, rRef, CostPerc, CostPerc2, Cost, Cost2, Cash, mRef, VarQ, VarQ2, PmtExtra)
            TXT,
            'results' => ['biweeklyMortgage' => <<<'TXT'
            calculateBiweeklyMortgageComparison(r, t, m, q, qRef, LoanAmount, LoanAmount2, VarTable, VarRep, first_day, tRef, rRef, CostPerc, CostPerc2, Cost, Cost2, Cash, mRef, VarQ, VarQ2, PmtExtra)
            TXT],
        ],
        [
            'title' => 'titleComp1 = get_titleComp1()',
            'results' => ['titleComp1' => 'get_titleComp1()'],
        ],
        [
            'title' => 'titleComp2 = get_titleComp2()',
            'results' => ['titleComp2' => 'get_titleComp2()'],
        ],
        [
            'title' => 'payment1 = get_payment1()',
            'results' => ['payment1' => 'get_payment1()'],
        ],
        [
            'title' => 'payment2 = get_payment2()',
            'results' => ['payment2' => 'get_payment2()'],
        ],
        [
            'title' => 'paymentDiffValue = get_paymentDiffValue()',
            'results' => ['paymentDiffValue' => 'get_paymentDiffValue()'],
        ],
        [
            'title' => 'term1 = get_term1()',
            'results' => ['term1' => 'get_term1()'],
        ],
        [
            'title' => 'term2 = get_term2()',
            'results' => ['term2' => 'get_term2()'],
        ],
        [
            'title' => 'termDiff = get_termDiff()',
            'results' => ['termDiff' => 'get_termDiff()'],
        ],
        [
            'title' => 'payoffDate1 = get_payoffDate1()',
            'results' => ['payoffDate1' => 'get_payoffDate1()'],
        ],
        [
            'title' => 'payoffDate2 = get_payoffDate2()',
            'results' => ['payoffDate2' => 'get_payoffDate2()'],
        ],
        [
            'title' => 'payoffDiff = get_payoffDiff(payoffDate1, payoffDate2)',
            'results' => ['payoffDiff' => 'get_payoffDiff(get_payoffDate1(), get_payoffDate2())'],
        ],
        [
            'title' => 'totalInterest1 = get_totalInterest1()',
            'results' => ['totalInterest1' => 'get_totalInterest1()'],
        ],
        [
            'title' => 'totalInterest2 = get_totalInterest2()',
            'results' => ['totalInterest2' => 'get_totalInterest2()'],
        ],
        [
            'title' => 'interestDiff = get_interestDiff()',
            'results' => ['interestDiff' => 'get_interestDiff()'],
        ],
        [
            'title' => 'totalPayments1 = get_totalPayments1()',
            'results' => ['totalPayments1' => 'get_totalPayments1()'],
        ],
        [
            'title' => 'totalPayments2 = get_totalPayments2()',
            'results' => ['totalPayments2' => 'get_totalPayments2()'],
        ],
        [
            'title' => 'paymentDiff = get_paymentDiff()',
            'results' => ['paymentDiff' => 'get_paymentDiff()'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";var payment1=0;var payment2=0;var term1;var term2;var termDiff;var payoffDate1=0;var payoffDate2=0;var totalInterest1=0;var totalInterest2=0;var interestDiff=0;var totalPayments1=0;var totalPayments2=0;var paymentDiff=0;var titleComp1;var titleComp2;var paymentDiffValue=0;function getEqRatePer(InterestRate,CompoundFreq,PaymentFreq){var ex=Math.exp(1);var base;var compoundFreq=CompoundFreq;if(compoundFreq===0){var continuous_r=Math.pow(ex,InterestRate)-1;compoundFreq=1;base=1+continuous_r/compoundFreq}else{base=1+InterestRate/compoundFreq}var power=compoundFreq/PaymentFreq;var getEqRate=PaymentFreq*(Math.pow(base,power)-1);var EqRatePer=getEqRate/PaymentFreq;return EqRatePer}function getBal(LoanAmount,Pmt,eq_p,GapPer){var Balance=LoanAmount*Math.pow(1+eq_p,GapPer)-Pmt/eq_p*(Math.pow(1+eq_p,GapPer)-1);if(Balance<0){Balance=0}return Balance}function getPer(LoanAmount,Pmt,eq_p){var Per=Math.log(Pmt/(eq_p*-LoanAmount+Pmt))/Math.log(eq_p+1);if(Per>0){return Per}else{return 0}}function getDaysInPeriod(FirstDay,date,q){var milisecondsInADay=24*60*60*1000;var firstDay=new Date(FirstDay*milisecondsInADay);var DaysInMonth=30;var DaysInYear=365;var DaysInQrt=90;var DaysInHalf=182;var daysInPeriod;var day=firstDay.getDate();var month=date.getMonth();var year=date.getFullYear();if(q===2||q===4||q===12){if(day<29&&month===0){DaysInMonth=31;DaysInQrt=90;DaysInHalf=181}else if(day===29&&month===0){DaysInMonth=30;DaysInQrt=90;DaysInHalf=181}else if(day===30&&month===0){DaysInMonth=29;DaysInQrt=90;DaysInHalf=181}else if(day===31&&month===0){DaysInMonth=28;DaysInQrt=89;DaysInHalf=181}else if(day<29&&month===1){DaysInMonth=28;DaysInQrt=89;DaysInHalf=181}else if(day===29&&month===1){DaysInMonth=29;DaysInQrt=90;DaysInHalf=182}else if(day===30&&month===1){DaysInMonth=30;DaysInQrt=91;DaysInHalf=183}else if(day===31&&month===1){DaysInMonth=31;DaysInQrt=92;DaysInHalf=184}else if(day<31&&month===2){DaysInMonth=31;DaysInQrt=92;DaysInHalf=184}else if(day===31&&month===2){DaysInMonth=30;DaysInQrt=91;DaysInHalf=183}else if(day<31&&month===3){DaysInMonth=30;DaysInQrt=91;DaysInHalf=183}else if(day===31&&month===3){DaysInMonth=31;DaysInQrt=92;DaysInHalf=184}else if(day<31&&month===4){DaysInMonth=31;DaysInQrt=92;DaysInHalf=184}else if(day===31&&month===4){DaysInMonth=30;DaysInQrt=92;DaysInHalf=183}else if(day<31&&month===5){DaysInMonth=30;DaysInQrt=92;DaysInHalf=183}else if(day===31&&month===5){DaysInMonth=31;DaysInQrt=92;DaysInHalf=184}else if(day<31&&month===6){DaysInMonth=31;DaysInQrt=92;DaysInHalf=184}else if(day===31&&month===6){DaysInMonth=31;DaysInQrt=92;DaysInHalf=184}else if(day<29&&month===7){DaysInMonth=31;DaysInQrt=92;DaysInHalf=184}else if(day===29&&month===7){DaysInMonth=31;DaysInQrt=92;DaysInHalf=183}else if(day===30&&month===7){DaysInMonth=31;DaysInQrt=92;DaysInHalf=182}else if(day===31&&month===7){DaysInMonth=30;DaysInQrt=91;DaysInHalf=181}else if(day<31&&month===8){DaysInMonth=30;DaysInQrt=91;DaysInHalf=181}else if(day===31&&month===8){DaysInMonth=31;DaysInQrt=92;DaysInHalf=182}else if(day<31&&month===9){DaysInMonth=31;DaysInQrt=92;DaysInHalf=182}else if(day===31&&month===9){DaysInMonth=30;DaysInQrt=92;DaysInHalf=181}else if(day<29&&month===10){DaysInMonth=30;DaysInQrt=92;DaysInHalf=181}else if(day===29&&month===10){DaysInMonth=30;DaysInQrt=91;DaysInHalf=181}else if(day===30&&month===10){DaysInMonth=30;DaysInQrt=90;DaysInHalf=181}else if(day===31&&month===10){DaysInMonth=31;DaysInQrt=90;DaysInHalf=182}else if(day<31&&month===11){DaysInMonth=31;DaysInQrt=90;DaysInHalf=182}else if(day===31&&month===11){DaysInMonth=31;DaysInQrt=90;DaysInHalf=181}}if(q===12||q===4){if(year%4===0&&year%100!==0||year%400===0){if(month===0){if(day===29){DaysInMonth=31;DaysInQrt=91}else if(day===30){DaysInMonth=30;DaysInQrt=91}else if(day===31){DaysInMonth=29;DaysInQrt=90}}else if(month===1){if(day<30){DaysInMonth=29;DaysInQrt=90}else if(day===30){DaysInMonth=29;DaysInQrt=91}else if(day===31){DaysInMonth=29;DaysInQrt=92}}}if(date.getDate()===29&&month===1&&day===30){DaysInMonth=30}if(date.getDate()===29&&month===1&&day===31){DaysInMonth=31}if(date.getDate()===28&&month===1&&day>30){DaysInMonth=31}}if(q===4){if(year%4===0&&year%100!==0||year%400===0){if(month===0&&day<29){DaysInQrt=91}else if(month===10&&day===29){DaysInQrt=91}}if((year+1)%4===0&&(year+1)%100!==0||(year+1)%400===0){if(month===10){if(day===29){DaysInQrt=92}else if(day===30){DaysInQrt=91}else if(day===31){DaysInQrt=91}}else if(month===11){DaysInQrt=91}}}if(q===2){if(year%4===0&&year%100!==0||year%400===0){if(month===0){DaysInHalf=182}else if(month===1&&day<30){DaysInHalf=182}}if((year+1)%4===0&&(year+1)%100!==0||(year+1)%400===0){if(month===7){if(day<30){DaysInHalf=184}else if(day===30){DaysInHalf=183}else if(day===31){DaysInHalf=182}}else if(month===8){if(day<31){DaysInHalf=182}else if(day===31){DaysInHalf=183}}else if(month===9){if(day<31){DaysInHalf=183}else if(day===31){DaysInHalf=182}}else if(month===10){if(day<31){DaysInHalf=182}else if(day===31){DaysInHalf=183}}else if(month===11){if(day<31){DaysInHalf=183}else if(day===31){DaysInHalf=182}}}}if(q===1){if(year%4===0&&year%100!==0||year%400===0){DaysInYear=366}else{DaysInYear=365}}if(q===1){daysInPeriod=DaysInYear}else if(q===2){daysInPeriod=DaysInHalf}else if(q===4){daysInPeriod=DaysInQrt}else if(q===12){daysInPeriod=DaysInMonth}else if(q===24){daysInPeriod=14}else if(q===26){daysInPeriod=14}else if(q===52){daysInPeriod=7}else if(q===365){daysInPeriod=1}else{daysInPeriod=30}return daysInPeriod}omni.define("calculateBiweeklyMortgageComparison",function(_r,_t,_m,_q,_qRef,_LoanAmount,_LoanAmount2,_VarTable,_VarRep,_first_day,_tRef,_rRef,_CostPerc,_CostPerc2,_Cost,_Cost2,_Cash,_mRef,_VarQ,_VarQ2,_PmtExtra){var r=Number(_rRef);var t=Number(_tRef);var m=Number(_m);var q=Number(_q);var qRef=Number(_qRef);var LoanAmount=Number(_LoanAmount2);var LoanAmount2=Number(_LoanAmount2);var first_day=Number(_first_day);var tRef=Number(_tRef);var rRef=Number(_rRef);var mRef=Number(_mRef);var CostPerc=Number(_CostPerc2);var CostPerc2=Number(_CostPerc2);var Cost=Number(_Cost2);var Cost2=Number(_Cost2);var VarQ=Number(_VarQ);var VarQ2=Number(_VarQ2);var PmtExtra=Number(_PmtExtra);var milisecondsInADay=24*60*60*1000;var first_day_in_days=first_day/milisecondsInADay;var periodsMain=12*t;var periodsMainRef=12*tRef;var CostPoints=LoanAmount*CostPerc;var CostTotal=CostPoints+Cost;var eq_p_Main=getEqRatePer(r,m,12);var eq_p=getEqRatePer(r,m,q);var pmt=LoanAmount*eq_p_Main*Math.pow(1+eq_p_Main,periodsMain)/(Math.pow(1+eq_p_Main,periodsMain)-1)*12/VarQ;var CostPointsRef=LoanAmount2*CostPerc2;var CostTotalRef=CostPointsRef+Cost2;var eq_p_MainRef=getEqRatePer(rRef,mRef,12);var eq_pRef=getEqRatePer(rRef,mRef,qRef);var pmtRef=LoanAmount2*eq_p_MainRef*Math.pow(1+eq_p_MainRef,periodsMainRef)/(Math.pow(1+eq_p_MainRef,periodsMainRef)-1)*12/VarQ2;pmtRef=pmtRef+PmtExtra;var periodsChart=getPer(LoanAmount,pmt,eq_p);var periodsChartRef=getPer(LoanAmount2,pmtRef,eq_pRef);var periodsChartCeil=Math.ceil(Math.round(periodsChart,1));var periodsChartRefCeil=Math.ceil(Math.round(periodsChartRef,1));var intPaid=0;var intPaidRef=0;var princBal=LoanAmount;var princBalRef=LoanAmount2;for(var i=1;i<=periodsChartCeil;i++){var intMonth=princBal*eq_p;var princMonth=pmt-intMonth;princBal=princBal-princMonth;intPaid+=intMonth;if(princBal<=0){princBal=0;break}}for(var _i=1;_i<=periodsChartRefCeil;_i++){var intMonthRef=princBalRef*eq_pRef;var princMonthRef=pmtRef-intMonthRef;princBalRef=princBalRef-princMonthRef;intPaidRef+=intMonthRef;if(princBalRef<=0){princBalRef=0;break}}var perCurr=Math.ceil(periodsChartCeil/q*12);var perRef=Math.ceil(periodsChartRefCeil/qRef*12);var perDiff=Math.abs(perCurr-perRef);var TermCurr=perCurr;var TermRef=perRef;var TermDiff=perDiff;var pmtDiff=pmtRef*qRef-pmt*q;paymentDiffValue=pmtDiff;titleComp1="Monthly payments";if(q===24){titleComp1="Semi-monthly payments"}if(q===26){titleComp1="Bi-weekly payments"}if(q===52){titleComp1="Weekly payments"}titleComp2="Bi-weekly payments";if(PmtExtra>0){titleComp2="Bi-weekly with extra payments"}var payoffDate=null;var payoffDateRef=null;var parametersIdentical=q===qRef&&VarQ===VarQ2&&LoanAmount===LoanAmount2&&r===rRef&&t===tRef&&m===mRef&&PmtExtra===0;if(parametersIdentical){var periodsLoop=Math.round(periodsChartCeil)+10;var daysPassed=0;var k;if(q===1){k=12}else if(q===2){k=6}else if(q===4){k=3}else if(q===12){k=1}else if(q===24){k=12/24}else if(q===52){k=12/52}else if(q===26){k=12/26}else if(q===365){k=12/365}else{k=1}for(var _i2=0;_i2<=periodsLoop;_i2++){var date=new Date((first_day_in_days+daysPassed)*milisecondsInADay);var daysInPeriod=getDaysInPeriod(first_day_in_days,date,12);if(_i2>0){daysPassed+=daysInPeriod;var _princBal=getBal(LoanAmount,pmt,eq_p,_i2/k);var princBalOpen=getBal(LoanAmount,pmt,eq_p,(_i2-1)/k);if(_princBal<0.01&&princBalOpen>0){var dd=date.getDate();var mm=date.getMonth()+1;var yyyy=date.getFullYear();var mm2=getMonthName(mm);var unifiedPayoffDate="".concat(mm2," ").concat(dd<10?"0"+dd:dd,", ").concat(yyyy);payoffDate=unifiedPayoffDate;payoffDateRef=unifiedPayoffDate;break}}}}else{var periodsTable=Math.round(periodsChartRefCeil)+10;var daysPassedT=0;for(var iTable=0;iTable<=periodsTable;iTable++){var dateT=new Date((first_day_in_days+daysPassedT)*milisecondsInADay);var daysInPeriodT=getDaysInPeriod(first_day_in_days,dateT,qRef);if(VarQ2===24){daysInPeriodT=14}if(VarQ2===12){daysInPeriodT=getDaysInPeriod(first_day_in_days,dateT,12)}if(iTable>0){daysPassedT+=daysInPeriodT;var princBalT=getBal(LoanAmount2,pmtRef,eq_pRef,iTable);var princBalOpenT=getBal(LoanAmount2,pmtRef,eq_pRef,iTable-1);if(princBalT<0.01&&princBalOpenT>0){var _dd=dateT.getDate();var mmRef=dateT.getMonth()+1;var _yyyy=dateT.getFullYear();var _mm=getMonthName(mmRef);payoffDate="".concat(_mm," ").concat(_dd<10?"0"+_dd:_dd,", ").concat(_yyyy);break}}}var _periodsLoop=Math.round(periodsChartCeil)+10;var _daysPassed=0;var _k;if(q===1){_k=12}else if(q===2){_k=6}else if(q===4){_k=3}else if(q===12){_k=1}else if(q===24){_k=12/24}else if(q===52){_k=12/52}else if(q===26){_k=12/26}else if(q===365){_k=12/365}else{_k=1}for(var _i3=0;_i3<=_periodsLoop;_i3++){var _date=new Date((first_day_in_days+_daysPassed)*milisecondsInADay);var _daysInPeriod=getDaysInPeriod(first_day_in_days,_date,12);if(_i3>0){_daysPassed+=_daysInPeriod;var _princBal2=getBal(LoanAmount,pmt,eq_p,_i3/_k);var _princBalOpen=getBal(LoanAmount,pmt,eq_p,(_i3-1)/_k);if(_princBal2<0.01&&_princBalOpen>0){var _dd2=_date.getDate();var _mm2=_date.getMonth()+1;var _yyyy2=_date.getFullYear();var _mm3=getMonthName(_mm2);payoffDateRef="".concat(_mm3," ").concat(_dd2<10?"0"+_dd2:_dd2,", ").concat(_yyyy2);break}}}}function getMonthName(month){var monthNames={1:"Jan.",2:"Feb.",3:"Mar.",4:"Apr.",5:"May.",6:"Jun.",7:"Jul.",8:"Aug.",9:"Sept.",10:"Oct.",11:"Nov.",12:"Dec."};return monthNames[month]}var payoffDate1Milliseconds=payoffDateRef?new Date(payoffDateRef).getTime():0;var payoffDate2Milliseconds=payoffDate?new Date(payoffDate).getTime():0;payment1=pmt;payment2=pmtRef;term1=TermCurr;term2=TermRef;termDiff=TermDiff;payoffDate1=payoffDate1Milliseconds;payoffDate2=payoffDate2Milliseconds;totalInterest1=intPaid;totalInterest2=intPaidRef;interestDiff=intPaidRef-intPaid;totalPayments1=LoanAmount+intPaid+CostTotal;totalPayments2=LoanAmount2+intPaidRef+CostTotalRef;paymentDiff=totalPayments2-totalPayments1;return 1});omni.define("get_titleComp1",function(){return titleComp1});omni.define("get_titleComp2",function(){return titleComp2});omni.define("get_payment1",function(){return payment1});omni.define("get_payment2",function(){return payment2});omni.define("get_paymentDiffValue",function(){return paymentDiffValue});omni.define("get_term1",function(){return term1});omni.define("get_term2",function(){return term2});omni.define("get_termDiff",function(){return termDiff});omni.define("get_payoffDate1",function(){return payoffDate1});omni.define("get_payoffDate2",function(){return payoffDate2});omni.define("get_payoffDiff",function(){if(payoffDate1===0||payoffDate2===0){return 0}var date1=new Date(payoffDate1);var date2=new Date(payoffDate2);var diffMonths=(date1.getFullYear()-date2.getFullYear())*12+(date1.getMonth()-date2.getMonth());return Math.floor(Math.abs(diffMonths))});omni.define("get_totalInterest1",function(){return totalInterest1});omni.define("get_totalInterest2",function(){return totalInterest2});omni.define("get_interestDiff",function(){return interestDiff});omni.define("get_totalPayments1",function(){return totalPayments1});omni.define("get_totalPayments2",function(){return totalPayments2});omni.define("get_paymentDiff",function(){return paymentDiff});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Bi-weekly mortgage payment takes Mortgage amount, Mortgage term and Interest rate and returns Varrep and Due date. It is a single relationship that reads varrep out of mortgage amount, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Bi-weekly mortgage payment calculator works', 'html' => <<<'TXT'
            <p>The Bi-weekly mortgage payment calculator applies one relationship to 37 numbers and reports Varrep, Due date and M.</p><p>Written with the labels from the form, Mortgage points = Upfront fee ÷ Mortgage amount.</p><p>The result panel carries Varrep, Due date, M and Vartable, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 37 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Mortgage amount</strong> — in USD</li><li><strong>Mortgage term</strong> — in years</li><li><strong>Interest rate</strong> — in percent. Annual rate of interest.</li><li><strong>Mortgage points</strong> — in percent. Upfront payment percentage.</li><li><strong>Upfront fee</strong> — in USD</li><li><strong>Mortgage amount</strong> — in USD</li><li><strong>Payment frequency</strong> — a plain number, no unit</li><li><strong>Mortgage term</strong> — in years</li><li><strong>Interest rate</strong> — in percent</li><li><strong>Extra payment</strong> — in USD. Set here an additional bi-weekly principal payment.</li><li><strong>Compounding frequency</strong> — a plain number, no unit. How often the interest is computed on the outstanding principle.</li><li><strong>Mortgage points</strong> — in percent</li><li><strong>Upfront fee</strong> — in USD</li><li><strong>Compounding frequency</strong> — a plain number, no unit. How often the interest is computed on the outstanding principle.</li><li><strong>Comparison with</strong> — a plain number, no unit</li><li><strong>Display…</strong> — a plain number, no unit</li><li><strong>Show…</strong> — a plain number, no unit</li><li><strong>Date single</strong> — a plain number, no unit, entered as a date</li><li><strong>Cash in / out</strong> — in USD</li><li><strong>Biweekly mortgage</strong> — a plain number, no unit</li><li><strong>Title comp1</strong> — a plain number, no unit</li><li><strong>Title comp2</strong> — a plain number, no unit</li><li><strong>Payment1</strong> — in USD</li><li><strong>Payment2</strong> — in USD</li><li><strong>Payment diff value</strong> — in USD</li><li><strong>Term1</strong> — in years / months</li><li><strong>Term2</strong> — in years / months</li><li><strong>Term diff</strong> — in years / months</li><li><strong>Payoff date1</strong> — a plain number, no unit, entered as a date</li><li><strong>Payoff date2</strong> — a plain number, no unit, entered as a date</li><li><strong>Payoff diff</strong> — in years / months</li><li><strong>Total interest1</strong> — in USD</li><li><strong>Total interest2</strong> — in USD</li><li><strong>Interest diff</strong> — in USD</li><li><strong>Payment diff</strong> — in USD</li><li><strong>Total payments1</strong> — in USD</li><li><strong>Total payments2</strong> — in USD</li></ul><p>The answers come back as Varrep, Due date, M, Vartable, M ref, Var q, Var q2, Q, Q ref. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Mortgage term offers 5 units and opens on years, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Mortgage points</strong> = <code>Upfront fee ÷ Mortgage amount</code></li><li><strong>Mortgage amount</strong> = <code>Upfront fee ÷ Mortgage points</code></li><li><strong>Upfront fee</strong> = <code>Mortgage points × Mortgage amount</code></li><li><strong>Title comp1</strong> = <code>get_titleComp1()</code></li><li><strong>Title comp2</strong> = <code>get_titleComp2()</code></li><li><strong>Payment1</strong> = <code>get_payment1()</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Mortgage points</strong> = <code>Upfront fee ÷ Mortgage amount</code> — the form to use when Upfront fee and Mortgage amount are the values you have.</li><li><strong>Mortgage amount</strong> = <code>Upfront fee ÷ Mortgage points</code> — the form to use when Upfront fee and Mortgage points are the values you have.</li><li><strong>Upfront fee</strong> = <code>Mortgage points × Mortgage amount</code> — the form to use when Mortgage points and Mortgage amount are the values you have.</li><li><strong>Title comp1</strong> = <code>get_titleComp1()</code> — the form to use when the other values are known.</li><li><strong>Title comp2</strong> = <code>get_titleComp2()</code> — the form to use when the other values are known.</li><li><strong>Payment1</strong> = <code>get_payment1()</code> — the form to use when the other values are known.</li><li><strong>Payment2</strong> = <code>get_payment2()</code> — the form to use when the other values are known.</li><li><strong>Payment diff value</strong> = <code>get_paymentDiffValue()</code> — the form to use when the other values are known.</li></ul><p>Any one of Mortgage points, Mortgage amount and Upfront fee can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Mortgage term, Interest rate and Mortgage points is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Varrep, Due date and M are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Mortgage amount left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Mortgage amount is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Mortgage term left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Mortgage term is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Mortgage amount to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Mortgage amount, Mortgage term, Interest rate and Mortgage points ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Mortgage amount — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Varrep against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Varrep follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are years and percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It counts in whole days.</strong> Dates are compared as calendar days, not as moments: two dates that differ by a few hours on the same day give the same answer, and there is no time-of-day input to set.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Mortgage amount, Mortgage term and Interest rate are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Mortgage amount, Mortgage term and Interest rate and the number you are missing is Varrep and Due date.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/fixed-deposit">Fixed deposit Calculator</a>, <a href="/finance/florida-overtime">Florida overtime Calculator</a> and <a href="/finance/florida-sales-tax">Florida sales tax Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Bi-weekly mortgage payment is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Bi-weekly mortgage payment is a number to act on, so the useful question is what to do with Varrep, Due date and M once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Mortgage amount, Mortgage term, Interest rate and Mortgage points alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Bi-weekly mortgage payment calculator work out?', 'a' => 'Varrep, Due date, M and Vartable, from Upfront fee and Mortgage amount. The relationship is Mortgage points = Upfront fee ÷ Mortgage amount.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Mortgage amount (USD), Mortgage term (years), Interest rate (percent), Mortgage points (percent), Upfront fee (USD). Enter mortgage amount, mortgage term and interest rate; Varrep is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Mortgage points, Mortgage amount, Upfront fee and Biweekly mortgage blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Varrep is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Mortgage amount blank and the page solves for it, reporting Varrep instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Varrep keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/fixed-deposit', 'name' => 'Fixed deposit Calculator'],
            ['path' => '/finance/florida-overtime', 'name' => 'Florida overtime Calculator'],
            ['path' => '/finance/florida-sales-tax', 'name' => 'Florida sales tax Calculator'],
        ],
        'authors' => [],
    ],
];
