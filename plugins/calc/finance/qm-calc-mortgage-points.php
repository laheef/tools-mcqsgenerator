<?php

/**
 * Mortgage points
 * /finance/mortgage-points
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Mortgage points',
    'meta' => ['title' => 'Mortgage points — Formula, Steps & Examples', 'description' => 'Mortgage points works out cost of mortgage points from original loan amount. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Mortgage points Calculator', 'updated' => '2026-09-09'],
    'sections' => [
        [
            'title' => 'Mortgage setup',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'loanAmount',
                            'label' => 'Original loan amount',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '250000',
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
                            'defaults' => [
                                ['value' => '30', 'when' => null],
                                ['value' => '30', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'interestRateBase',
                            'label' => 'Initial interest rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '3.25',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'compoundFreq_VS',
                            'label' => 'Compounding frequency',
                            'type' => 'select',
                            'options' => ['Yearly' => '1', 'Semi-annually (Canada)' => '2', 'Quarterly' => '4', 'Monthly (UK & US)' => '12'],
                            'dataset' => 'Compounding frequency DS',
                            'control' => 'DROPDOWN',
                            'default' => 'Monthly (UK & US)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'firstDay', 'label' => 'Due date', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'additionalOptions_checkbox',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Set discount percentages and type of payments manually' => '1', '' => '0'],
                            'dataset' => 'Additional options DS',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Option I.',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mortgagePoints1',
                            'label' => 'Mortgage points',
                            'type' => 'number',
                            'help' => 'Set to zero if you would like to compare your mortgage without points.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'discountPercent1',
                            'label' => 'Discount percentage',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.25',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pointCost1',
                            'label' => 'Cost of mortgage points',
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
                            'name' => 'interestRate1',
                            'label' => 'New interest rate',
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
                            'name' => 'paymentType1',
                            'label' => 'Type of payment',
                            'type' => 'select',
                            'options' => ['Upfront' => '1', 'Rolled into the loan' => '2'],
                            'dataset' => 'Payment type DS',
                            'default' => 'Upfront',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Option II.',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mortgagePoints2',
                            'label' => 'Mortgage points',
                            'type' => 'number',
                            'help' => 'Set to zero if you would like to compare your mortgage without points.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '3',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'discountPercent2',
                            'label' => 'Discount percentage',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.25',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pointCost2',
                            'label' => 'Cost of mortgage points',
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
                            'name' => 'interestRate2',
                            'label' => 'New interest rate',
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
                            'name' => 'paymentType2',
                            'label' => 'Type of payment',
                            'type' => 'select',
                            'options' => ['Upfront' => '1', 'Rolled into the loan' => '2'],
                            'dataset' => 'Payment type DS',
                            'default' => 'Upfront',
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
                            'name' => 'differenceMortgageRate',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 3,
                    'place' => [0, 1, 2],
                    'fields' => [
                        [
                            'name' => 'loanAmount1',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'loanAmount2',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'differenceLoanAmnout',
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
                    'columns' => 3,
                    'place' => [0, 1, 2],
                    'fields' => [
                        [
                            'name' => 'monthlyPayment1',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'monthlyPayment2',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'differenceMonthlyPayment',
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
                    'columns' => 3,
                    'place' => [0, 1, 2],
                    'fields' => [
                        [
                            'name' => 'monthlySavings1',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'monthlySavings2',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'differenceMonthlySavings',
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
                    'columns' => 3,
                    'place' => [0, 1, 2],
                    'fields' => [
                        [
                            'name' => 'breakEven1',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '19',
                            'unit_default' => 'mos',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'breakEven2',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '19',
                            'unit_default' => 'mos',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'differenceBreakEven',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '19',
                            'unit_default' => 'mos',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 3,
                    'place' => [0, 1, 2],
                    'fields' => [
                        [
                            'name' => 'totalInterest1',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'totalInterest2',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'differenceTotalInterest',
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
                    'columns' => 3,
                    'place' => [0, 1, 2],
                    'fields' => [
                        [
                            'name' => 'totalPayments1',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'totalPayments2',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'differenceTotalPayments',
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
            'title' => 'interestRate1 = interestRateBase - mortgagePoints1*discountPercent1',
            'results' => ['interestRateBase' => 'discountPercent1*mortgagePoints1 + interestRate1', 'interestRate1' => '-discountPercent1*mortgagePoints1 + interestRateBase', 'mortgagePoints1' => '(-interestRate1 + interestRateBase)/discountPercent1', 'discountPercent1' => '(-interestRate1 + interestRateBase)/mortgagePoints1'],
        ],
        [
            'title' => 'pointCost1 = loanAmount * mortgagePoints1 * 0.01',
            'results' => ['mortgagePoints1' => '100*pointCost1/loanAmount', 'loanAmount' => '100*pointCost1/mortgagePoints1', 'pointCost1' => '(1/100)*loanAmount*mortgagePoints1'],
        ],
        [
            'title' => 'interestRate2 = interestRateBase - mortgagePoints2*discountPercent2',
            'results' => ['interestRateBase' => 'discountPercent2*mortgagePoints2 + interestRate2', 'discountPercent2' => '(-interestRate2 + interestRateBase)/mortgagePoints2', 'interestRate2' => '-discountPercent2*mortgagePoints2 + interestRateBase', 'mortgagePoints2' => '(-interestRate2 + interestRateBase)/discountPercent2'],
        ],
        [
            'title' => 'pointCost2 = loanAmount * mortgagePoints2 * 0.01',
            'results' => ['pointCost2' => '(1/100)*loanAmount*mortgagePoints2', 'mortgagePoints2' => '100*pointCost2/loanAmount', 'loanAmount' => '100*pointCost2/mortgagePoints2'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("getLoanAmount",function(_LoanAmount,_PointCost,_PointPmt){var loanAmount=Number(_LoanAmount);var pointCost=Number(_PointCost);var pointPmt=Number(_PointPmt);if(pointPmt===2){return loanAmount+pointCost}else{return loanAmount}});omni.define("getMonthlyPayment",function(_r,_t,_m,_LoanAmount,_PointCost,_PointPmt){var r=Number(_r);var t=Number(_t);var m=Number(_m);var LoanAmount=Number(_LoanAmount);var PointCost=Number(_PointCost);var VarPoint=Number(_PointPmt);var eq_p=getPerEqRate(12,m,r);if(VarPoint===2){LoanAmount=LoanAmount+PointCost}return getPmt(LoanAmount,t,12,eq_p)});omni.define("getMonthlySavings",function(_rBase,_r,_t,_m,_LoanAmount,_PointCost,_PointPmt){var rBase=Number(_rBase);var r=Number(_r);var t=Number(_t);var m=Number(_m);var LoanAmount=Number(_LoanAmount);var PointCost=Number(_PointCost);var VarPoint=Number(_PointPmt);var eq_pBase=getPerEqRate(12,m,rBase);var eq_p=getPerEqRate(12,m,r);var LoanAmountNew=LoanAmount;if(VarPoint===2){LoanAmountNew+=PointCost}var pmtBase=getPmt(LoanAmount,t,12,eq_pBase);var pmt=getPmt(LoanAmountNew,t,12,eq_p);return pmtBase-pmt});omni.define("getBreakEven",function(_rBase,_r,_t,_m,_LoanAmount,_PointCost,_PointPmt){var rBase=Number(_rBase);var r=Number(_r);var t=Number(_t);var m=Number(_m);var LoanAmount=Number(_LoanAmount);var PointCost=Number(_PointCost);var VarPoint1=Number(_PointPmt);var periods=12*t;var eq_pBase=getPerEqRate(12,m,rBase);var eq_p=getPerEqRate(12,m,r);var LoanAmount1=LoanAmount;if(VarPoint1===2){LoanAmount1=LoanAmount1+PointCost}var pmtBase=getPmt(LoanAmount,t,12,eq_pBase);var pmt1=getPmt(LoanAmount1,t,12,eq_p);var MondthlySave=pmtBase-pmt1;var BreakPointPer=mathjs.ceil(PointCost/MondthlySave);if(BreakPointPer<=periods){return BreakPointPer}else{return 0}});omni.define("getTotalnterest",function(_r,_t,_m,_LoanAmount,_first_day,_PointCost,_PointPmt){var r=Number(_r);var t=Number(_t);var m=Number(_m);var LoanAmount=Number(_LoanAmount);var first_day=Number(_first_day);var PointCost=Number(_PointCost);var VarPoint=Number(_PointPmt);var periods=12*t;var eq_p1=getPerEqRate(12,m,r);if(VarPoint===2){LoanAmount+=PointCost}var pmt1=getPmt(LoanAmount,t,12,eq_p1);var millisecondsInADay=24*60*60*1000;var daysInPeriod;var daysPassed=0;var rMonth1=eq_p1;var pmtMonth1=pmt1;var princBalOpen1;var princBal1=LoanAmount;var intPaid1=0;for(var i=0;i<=periods;i++){var date=new Date((first_day+daysPassed)*millisecondsInADay);if(i>0){daysInPeriod=getDaysInPeriod(first_day,date,12);daysPassed+=daysInPeriod;var intMonth1=princBal1*rMonth1;var princMonth1=pmtMonth1-intMonth1;princBal1=princBal1-princMonth1;princBalOpen1=princBal1+princMonth1;intPaid1+=intMonth1;if(princBal1<=0){princBal1=0}if(princBalOpen1<=0){princBalOpen1=0}if(princBalOpen1<=0){intMonth1=0}if(princMonth1<=0){princMonth1=0}if(intMonth1<=0){princMonth1=0}}}return intPaid1});function getPerEqRate(q,m,r){var base;var power;if(m===0){var continuous_r=mathjs.pow(Math.E,r)-1;base=1+continuous_r;power=1/q}else{base=1+r/m;power=m/q}return mathjs.round(mathjs.pow(base,power)-1,10)}function getPmt(LoanAmount,t,q,eq_p){var periods=t*q;return LoanAmount*eq_p*mathjs.pow(1+eq_p,periods)/(mathjs.pow(1+eq_p,periods)-1)}function getDaysInPeriod(FirstDay,date,q){var millisecondsInADay=24*60*60*1000;var firstDay=new Date(FirstDay*millisecondsInADay);var daysInMonth;var daysInPeriod;var DaysInYear;var DaysInNextYear;var day=firstDay.getDate();var month=date.getMonth();var year=date.getFullYear();if(day<29&&month===0){daysInMonth=31}else if(day===29&&month===0){daysInMonth=30}else if(day===30&&month===0){daysInMonth=29}else if(day===31&&month===0){daysInMonth=28}else if(day<29&&month===1){daysInMonth=28}else if(day===29&&month===1){daysInMonth=29}else if(day===30&&month===1){daysInMonth=30}else if(day===31&&month===1){daysInMonth=31}else if(day<31&&month===2){daysInMonth=31}else if(day===31&&month===2){daysInMonth=30}else if(day<31&&month===3){daysInMonth=30}else if(day===31&&month===3){daysInMonth=31}else if(day<31&&month===4){daysInMonth=31}else if(day===31&&month===4){daysInMonth=30}else if(day<31&&month===5){daysInMonth=30}else if(day===31&&month===5){daysInMonth=31}else if(day<31&&month===6){daysInMonth=31}else if(day===31&&month===6){daysInMonth=31}else if(day<31&&month===7){daysInMonth=31}else if(day===31&&month===7){daysInMonth=30}else if(day<31&&month===8){daysInMonth=30}else if(day===31&&month===8){daysInMonth=31}else if(day<31&&month===9){daysInMonth=31}else if(day===31&&month===9){daysInMonth=30}else if(day<31&&month===10){daysInMonth=30}else if(day===31&&month===10){daysInMonth=31}else if(day<31&&month===11){daysInMonth=31}else if(day===31&&month===11){daysInMonth=31}if(year%4===0&&year%100!==0&&date.getMonth()===1||year%400===0&&month===1){daysInMonth=29}if(year%4===0&&year%100!==0&&month===0&&date.getDate()===30||year%400===0&&month===0&&date.getDate()===30){daysInMonth=30}if(year%4===0&&year%100!==0&&month===0&&date.getDate()===31||year%400===0&&month===0&&date.getDate()===31){daysInMonth=29}if(year%4===0&&year%100!==0&&month===0&&date.getDate()===29||year%400===0&&month===0&&date.getDate()===29){daysInMonth=31}if(date.getDate()===29&&date.getMonth()===1&&day>29){daysInMonth=30}else if(date.getDate()===29&&date.getMonth()===1&&day>30){daysInMonth=31}else if(date.getDate()===28&&date.getMonth()===1&&day>30){daysInMonth=31}if(year%4===0&&year%100!==0||year%400===0){DaysInYear=366}else{DaysInYear=365}if((year+1)%4===0&&(year+1)%100!==0||(year+1)%400===0){DaysInNextYear=366}else{DaysInNextYear=365}if(q===1){daysInPeriod=DaysInYear}else if(q===12){daysInPeriod=daysInMonth}else if(q===26){daysInPeriod=14}else if(q===52){daysInPeriod=7}else if(q===365){daysInPeriod=1}else if(q===2){daysInPeriod=180}else if(q===4){day=date.getDate();if(day===31&&month===0&&DaysInYear===365){daysInPeriod=89}else if(day===31&&month===0&&DaysInYear===366){daysInPeriod=90}else if(day===31&&(month===4||month===9)){daysInPeriod=92}else if(month===0&&DaysInYear===366){daysInPeriod=91}else if(month===0&&DaysInYear===365){daysInPeriod=90}else if(day===28&&month===1&&DaysInYear===365){daysInPeriod=92}else if(day===28&&month===1&&DaysInYear===366){daysInPeriod=93}else if(day===29&&month===1){daysInPeriod=92}else if(month===1&&DaysInYear===366){daysInPeriod=90}else if(month===1&&DaysInYear===365){daysInPeriod=89}else if(day>=30&&month>=10&&DaysInNextYear===366){daysInPeriod=91}else if(day>=30&&month>=10&&DaysInNextYear===365){daysInPeriod=90}else if(month===11&&DaysInNextYear===366){daysInPeriod=92}else if(month===11&&DaysInNextYear===365){daysInPeriod=91}else if(day===31&&(month===2||month===7)){daysInPeriod=91}else if(day===30&&(month===3||month===8||month===5)){daysInPeriod=92}else if(month===2||month===4||month===6||month===7||month===9||month===10){daysInPeriod=92}else if(month===3||month===5||month===8){daysInPeriod=91}}return daysInPeriod}//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Mortgage points works out Original loan amount and Cost of mortgage points from Initial interest rate. Nothing is looked up on this page: original loan amount is computed from initial interest rate and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Original loan amount is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Mortgage points calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Mortgage points: it takes 3 numbers and reports Original loan amount, Cost of mortgage points and New interest rate.</p><p>In the form&#039;s own words, New interest rate = − Discount percentage × Mortgage points + Initial interest rate.</p><p>The result panel carries Original loan amount, Cost of mortgage points, New interest rate and Mortgage points, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Initial interest rate</strong> — in percent</li><li><strong>Mortgage points</strong> — a plain number, no unit. Set to zero if you would like to compare your mortgage without points.</li><li><strong>Discount percentage</strong> — in percent</li></ul><p>What you get back is Original loan amount in USD, Cost of mortgage points in USD, New interest rate in percent, Mortgage points, Discount percentage in percent, Cost of mortgage points in USD, New interest rate in percent, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on New interest rate lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>New interest rate</strong> = <code>− Discount percentage × Mortgage points + Initial interest rate</code></li><li><strong>Initial interest rate</strong> = <code>Discount percentage × Mortgage points + New interest rate</code></li><li><strong>Mortgage points</strong> = <code>( − New interest rate + Initial interest rate) ÷ Discount percentage</code></li><li><strong>Discount percentage</strong> = <code>( − New interest rate + Initial interest rate) ÷ Mortgage points</code></li><li><strong>Cost of mortgage points</strong> = <code>(1 ÷ 100) × Original loan amount × Mortgage points</code></li><li><strong>Original loan amount</strong> = <code>100 × Cost of mortgage points ÷ Mortgage points</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>New interest rate</strong> = <code>− Discount percentage × Mortgage points + Initial interest rate</code> — the form to use when Discount percentage, Mortgage points and Initial interest rate are the values you have.</li><li><strong>Initial interest rate</strong> = <code>Discount percentage × Mortgage points + New interest rate</code> — the form to use when Discount percentage, Mortgage points and New interest rate are the values you have.</li><li><strong>Mortgage points</strong> = <code>( − New interest rate + Initial interest rate) ÷ Discount percentage</code> — the form to use when New interest rate, Initial interest rate and Discount percentage are the values you have.</li><li><strong>Discount percentage</strong> = <code>( − New interest rate + Initial interest rate) ÷ Mortgage points</code> — the form to use when New interest rate, Initial interest rate and Mortgage points are the values you have.</li><li><strong>Cost of mortgage points</strong> = <code>(1 ÷ 100) × Original loan amount × Mortgage points</code> — the form to use when Original loan amount and Mortgage points are the values you have.</li><li><strong>Mortgage points</strong> = <code>100 × Cost of mortgage points ÷ Original loan amount</code> — the form to use when Cost of mortgage points and Original loan amount are the values you have.</li><li><strong>Original loan amount</strong> = <code>100 × Cost of mortgage points ÷ Mortgage points</code> — the form to use when Cost of mortgage points and Mortgage points are the values you have.</li><li><strong>New interest rate</strong> = <code>− Discount percentage × Mortgage points + Initial interest rate</code> — the form to use when Discount percentage, Mortgage points and Initial interest rate are the values you have.</li></ul><p>Any one of New interest rate, Initial interest rate and Mortgage points can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Initial interest rate and Discount percentage carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Original loan amount, Cost of mortgage points and New interest rate are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Initial interest rate left as a guess.</strong> Anything typed into Initial interest rate is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Mortgage points left as a guess.</strong> Anything typed into Mortgage points is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Initial interest rate and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Initial interest rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The page reads it when it works out New interest rate, Mortgage points and Discount percentage. Have it to hand before you start: Initial interest rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Mortgage points</strong> takes a plain number with no unit attached. Set to zero if you would like to compare your mortgage without points. The page reads it when it works out Initial interest rate, New interest rate and Discount percentage. Have it to hand before you start: Mortgage points is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Discount percentage</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The page reads it when it works out Initial interest rate, New interest rate and Mortgage points. Have it to hand before you start: Discount percentage is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 7 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Original loan amount</strong> is a plain number. It is worked out from Cost of mortgage points and Mortgage points. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Cost of mortgage points</strong> is a plain number. It is worked out from Original loan amount and Mortgage points. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>New interest rate</strong> is a percent figure. It is worked out from Discount percentage, Mortgage points and Initial interest rate. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Mortgage points</strong> is a plain number. It is worked out from New interest rate, Initial interest rate and Discount percentage. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Discount percentage</strong> is a percent figure. It is worked out from New interest rate, Initial interest rate and Mortgage points. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Cost of mortgage points</strong> is a plain number. It is worked out from Original loan amount and Mortgage points. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>New interest rate</strong> is a percent figure. It is worked out from Discount percentage, Mortgage points and Initial interest rate. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Original loan amount is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It counts in whole days.</strong> The differences are counted in whole days, so an answer is a date or a number of days rather than an interval in hours. Expect a day&#039;s uncertainty if the event itself happened at an unknown time.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Initial interest rate, Mortgage points and Discount percentage and the number you are missing is Original loan amount and Cost of mortgage points.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/return-on-capital-employed">Return on capital employed</a>, <a href="/finance/roe">Return on equity (ROE) Calculator</a> and <a href="/finance/roic">Return on invested capital (ROIC) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Mortgage points calculator work out?', 'a' => <<<'TXT'
            Original loan amount, Cost of mortgage points, New interest rate and Mortgage points, from Discount percentage, Mortgage points and Initial interest rate. The relationship is New interest rate = − Discount percentage × Mortgage points + Initial interest rate.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Initial interest rate (percent), Mortgage points, Discount percentage (percent). Fill initial interest rate, mortgage points and discount percentage and leave Original loan amount empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of New interest rate, Initial interest rate, Mortgage points and Discount percentage blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Original loan amount is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Initial interest rate left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Original loan amount keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/return-on-capital-employed', 'name' => 'Return on capital employed'],
            ['path' => '/finance/roe', 'name' => 'Return on equity (ROE) Calculator'],
            ['path' => '/finance/roic', 'name' => 'Return on invested capital (ROIC) Calculator'],
        ],
        'authors' => [],
    ],
];
