<?php

/**
 * 529
 * /finance/529
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => '529',
    'meta' => ['title' => '529 Calculator — Free, With Worked Examples', 'description' => '529 works out years to first school year and years to make deposits and reports both. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => '529 Calculator', 'updated' => '2026-09-02'],
    'sections' => [
        [
            'title' => '529 plan details',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'childAge',
                            'label' => 'Current age',
                            'type' => 'number',
                            'suffix' => 'years',
                            'help' => 'Age of the 529 beneficiary at the beginning of the 529 savings plan.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'collegeAge',
                            'label' => 'Age at start of school',
                            'type' => 'number',
                            'suffix' => 'years',
                            'help' => 'Age of the 529 beneficiary when they begin school, e.g., college.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '18',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'investmentStartYears',
                            'label' => 'Years to first school year',
                            'type' => 'number',
                            'suffix' => 'years',
                            'help' => 'Number of years until first school year.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'investmentEndYears',
                            'label' => 'Years to make deposits',
                            'type' => 'number',
                            'suffix' => 'years',
                            'help' => 'Number of years until last deposit.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'numCollegeYears',
                            'label' => 'Number of school years',
                            'type' => 'select',
                            'options' => [
                                '0',
                                '1',
                                '2',
                                '3',
                                '4',
                                '5',
                                '6',
                                '7',
                                '8',
                                '9',
                                '10',
                                '11',
                                '12',
                            ],
                            'dataset' => 'year_DS',
                            'control' => 'DROPDOWN',
                            'help' => 'Number of years spent in school, e.g, college is usually 4 years.',
                            'default' => '4',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'currentCost',
                            'label' => 'Current annual cost',
                            'type' => 'number',
                            'help' => 'Annual cost of education as of today.',
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
                            'name' => 'inflation',
                            'label' => 'Cost inflation',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '4',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'currentSavings',
                            'label' => 'Initial investment',
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
                            'name' => 'annualInterest',
                            'label' => 'Annual investment return',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '8',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'custom_number_years',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Set custom number of years' => '1', '' => '0'],
                            'dataset' => 'number_year_DS',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'display_msg == 1', 'text' => <<<'TXT'
                                Your initial investment would be worth {{global.currencySymbol}}{{fvCurrentSavings.value}} by the time you begin making withdrawals for education expenses  That means, to cover the balance of {{global.currencySymbol}}{{balanceRequired.value}}, you only need to save {{global.currencySymbol}}{{paymentRequired.value}}  per month.
                                TXT],
                                ['when' => 'display_msg == 2', 'text' => <<<'TXT'
                                Your initial investment would be worth {{global.currencySymbol}}{{fvCurrentSavings.value}} by the time you begin making withdrawals for education expenses  You don’t need to make any monthly savings since it will cover the total cost of education 
                                TXT],
                            ],
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
                            'name' => 'totalCollegeCost',
                            'label' => 'Total cost',
                            'type' => 'number',
                            'help' => 'The total cost of the beneficiary\'s education, including the last year where a deposit is made.',
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
                            'name' => 'PaymentTotal',
                            'label' => 'Total monthly required contribution',
                            'type' => 'number',
                            'help' => 'Monthly contribution required to meet the total cost of education.',
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
                            'name' => 'annualRequiredContribution',
                            'label' => 'Annual required contribution',
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
                            'name' => 'taxBracket',
                            'label' => 'Tax bracket',
                            'type' => 'select',
                            'options' => [
                                '10' => '10',
                                '12' => '12',
                                '22' => '22',
                                '24' => '24',
                                '32' => '32',
                                '35' => '35',
                                '37' => '37',
                            ],
                            'dataset' => 'TaxBracket_DS',
                            'control' => 'DROPDOWN',
                            'suffix' => '%',
                            'default' => '10',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'show_chart',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Set tax bracket for comparison' => '1', '' => '0'],
                            'dataset' => 'bar_chart_DS',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
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
                            'name' => 'totalPayPeriods',
                            'label' => 'Total number of payments',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'interestPerPeriod',
                            'label' => 'Interest per period',
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
                            'name' => 'x',
                            'label' => 'X',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'y',
                            'label' => 'Y',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'compareChart',
                            'label' => 'Compare 529 with regular savings account?',
                            'type' => 'select',
                            'options' => ['Yes' => '1', 'No' => '0'],
                            'dataset' => 'CompareChart_DS',
                            'default' => 'Yes',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'display_msg',
                            'label' => 'Display msg',
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
            'title' => 'investmentStartYears = collegeAge - childAge',
            'results' => ['investmentStartYears' => '-childAge + collegeAge', 'collegeAge' => 'childAge + investmentStartYears', 'childAge' => 'collegeAge - investmentStartYears'],
        ],
        [
            'title' => 'investmentEndYears = investmentStartYears + numCollegeYears',
            'results' => ['investmentStartYears' => 'investmentEndYears - numCollegeYears', 'investmentEndYears' => 'investmentStartYears + numCollegeYears', 'numCollegeYears' => 'investmentEndYears - investmentStartYears'],
        ],
        [
            'title' => 'totalPayPeriods = investmentEndYears *12',
            'results' => ['investmentEndYears' => '(1/12)*totalPayPeriods', 'totalPayPeriods' => '12*investmentEndYears'],
        ],
        [
            'title' => 'interestPerPeriod = annualInterest / 12',
            'results' => ['interestPerPeriod' => '(1/12)*annualInterest', 'annualInterest' => '12*interestPerPeriod'],
        ],
        [
            'title' => 'totalCollegeCost = x - y',
            'results' => ['totalCollegeCost' => 'x - y', 'x' => 'totalCollegeCost + y', 'y' => '-totalCollegeCost + x'],
        ],
        [
            'title' => 'x = currentCost * ((1 + inflation)^investmentEndYears - 1) / inflation',
            'results' => ['x' => 'currentCost*(pow(inflation + 1, investmentEndYears) - 1)/inflation', 'currentCost' => 'inflation*x/(pow(inflation + 1, investmentEndYears) - 1)', 'investmentEndYears' => 'log((currentCost + inflation*x)/currentCost)/log(inflation + 1)'],
        ],
        [
            'title' => 'y = currentCost * ((1 + inflation)^investmentStartYears - 1) / inflation',
            'results' => ['investmentStartYears' => 'log((currentCost + inflation*y)/currentCost)/log(inflation + 1)', 'currentCost' => 'inflation*y/(pow(inflation + 1, investmentStartYears) - 1)', 'y' => 'currentCost*(pow(inflation + 1, investmentStartYears) - 1)/inflation'],
        ],
        [
            'title' => 'PaymentTotal = calcPayTotal(numCollegeYears, investmentStartYears, interestPerPeriod, totalCollegeCost, totalPayPeriods, currentSavings, currentCost, inflation)',
            'results' => ['PaymentTotal' => 'calcPayTotal(numCollegeYears, investmentStartYears, interestPerPeriod, totalCollegeCost, totalPayPeriods, currentSavings, currentCost, inflation)'],
        ],
        [
            'title' => 'annualRequiredContribution = one_way(bignumber(PaymentTotal)  * 12)',
            'results' => ['annualRequiredContribution' => '(12*calcPayTotal(numCollegeYears, investmentStartYears, interestPerPeriod, totalCollegeCost, totalPayPeriods, currentSavings, currentCost, inflation))'],
        ],
        [
            'title' => 'display_msg = check_msg_display(totalCollegeCost, currentSavings, PaymentTotal, interestPerPeriod, totalPayPeriods)',
            'results' => ['display_msg' => <<<'TXT'
            check_msg_display(totalCollegeCost, currentSavings, calcPayTotal(numCollegeYears, investmentStartYears, interestPerPeriod, totalCollegeCost, totalPayPeriods, currentSavings, currentCost, inflation), interestPerPeriod, totalPayPeriods)
            TXT],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";var paymentYearList=new Array(12);var a;var b;var c;var d;var e;var f;var g;var h;var p;var q;var r;var s;var costYear1;var costYear2;var costYear3;var costYear4;var costYear5;var costYear6;var costYear7;var costYear8;var costYear9;var costYear10;var costYear11;var costYear12;function updatePaymentValues(numCollegeYears,investmentStartYears,interestPerPeriod,totalPayPeriods,currentSavings,currentCost,inflation){a=(investmentStartYears+1)*12;b=(investmentStartYears+2)*12;c=(investmentStartYears+3)*12;d=(investmentStartYears+4)*12;e=(investmentStartYears+5)*12;f=(investmentStartYears+6)*12;g=(investmentStartYears+7)*12;h=(investmentStartYears+8)*12;p=(investmentStartYears+9)*12;q=(investmentStartYears+10)*12;r=(investmentStartYears+11)*12;s=(investmentStartYears+12)*12;costYear1=currentCost*Math.pow(1+inflation,investmentStartYears);costYear2=currentCost*Math.pow(1+inflation,a/12);costYear3=currentCost*Math.pow(1+inflation,b/12);costYear4=currentCost*Math.pow(1+inflation,c/12);costYear5=currentCost*Math.pow(1+inflation,d/12);costYear6=currentCost*Math.pow(1+inflation,e/12);costYear7=currentCost*Math.pow(1+inflation,f/12);costYear8=currentCost*Math.pow(1+inflation,g/12);costYear9=currentCost*Math.pow(1+inflation,h/12);costYear10=currentCost*Math.pow(1+inflation,p/12);costYear11=currentCost*Math.pow(1+inflation,q/12);costYear12=currentCost*Math.pow(1+inflation,r/12);paymentYearList[0]=(costYear1-currentSavings*Math.pow(1+interestPerPeriod,totalPayPeriods))/((Math.pow(1+interestPerPeriod,a)-1)/interestPerPeriod);paymentYearList[1]=(costYear2-currentSavings*Math.pow(1+interestPerPeriod,totalPayPeriods))/((Math.pow(1+interestPerPeriod,b)-1)/interestPerPeriod);paymentYearList[2]=(costYear3-currentSavings*Math.pow(1+interestPerPeriod,totalPayPeriods))/((Math.pow(1+interestPerPeriod,c)-1)/interestPerPeriod);paymentYearList[3]=(costYear4-currentSavings*Math.pow(1+interestPerPeriod,totalPayPeriods))/((Math.pow(1+interestPerPeriod,d)-1)/interestPerPeriod);paymentYearList[4]=(costYear5-currentSavings*Math.pow(1+interestPerPeriod,totalPayPeriods))/((Math.pow(1+interestPerPeriod,e)-1)/interestPerPeriod);paymentYearList[5]=(costYear6-currentSavings*Math.pow(1+interestPerPeriod,totalPayPeriods))/((Math.pow(1+interestPerPeriod,f)-1)/interestPerPeriod);paymentYearList[6]=(costYear7-currentSavings*Math.pow(1+interestPerPeriod,totalPayPeriods))/((Math.pow(1+interestPerPeriod,g)-1)/interestPerPeriod);paymentYearList[7]=(costYear8-currentSavings*Math.pow(1+interestPerPeriod,totalPayPeriods))/((Math.pow(1+interestPerPeriod,h)-1)/interestPerPeriod);paymentYearList[8]=(costYear9-currentSavings*Math.pow(1+interestPerPeriod,totalPayPeriods))/((Math.pow(1+interestPerPeriod,p)-1)/interestPerPeriod);paymentYearList[9]=(costYear10-currentSavings*Math.pow(1+interestPerPeriod,totalPayPeriods))/((Math.pow(1+interestPerPeriod,q)-1)/interestPerPeriod);paymentYearList[10]=(costYear11-currentSavings*Math.pow(1+interestPerPeriod,totalPayPeriods))/((Math.pow(1+interestPerPeriod,r)-1)/interestPerPeriod);paymentYearList[11]=(costYear12-currentSavings*Math.pow(1+interestPerPeriod,totalPayPeriods))/((Math.pow(1+interestPerPeriod,s)-1)/interestPerPeriod);for(var i=0;i<numCollegeYears;i++){if(paymentYearList[i]<0){paymentYearList[numCollegeYears-i-1]+=paymentYearList[i];paymentYearList[i]-=paymentYearList[i];if(paymentYearList[numCollegeYears-i-1]<0&&i){paymentYearList[numCollegeYears-1]+=paymentYearList[numCollegeYears-i-1];paymentYearList[numCollegeYears-i-1]-=paymentYearList[numCollegeYears-i-1]}}}}omni.onResult([],function(ctx,_ref){var totalCollegeCost=_ref.totalCollegeCost,currentSavings=_ref.currentSavings,PaymentTotal=_ref.PaymentTotal,interestPerPeriod=_ref.interestPerPeriod,totalPayPeriods=_ref.totalPayPeriods;var fvCurrentSavings;var balanceRequired;var paymentRequired;if(PaymentTotal<0){fvCurrentSavings=currentSavings*Math.pow(1+interestPerPeriod,totalPayPeriods);balanceRequired=totalCollegeCost-fvCurrentSavings;paymentRequired=balanceRequired/((Math.pow(1+interestPerPeriod,totalPayPeriods)-1)/interestPerPeriod);ctx.exportValue("fvCurrentSavings",formatCurrency(fvCurrentSavings));ctx.exportValue("balanceRequired",formatCurrency(balanceRequired));ctx.exportValue("paymentRequired",formatCurrency(paymentRequired))}else{ctx.exportValue("fvCurrentSavings","");ctx.exportValue("balanceRequired","");ctx.exportValue("paymentRequired","")}});omni.define("check_msg_display",function(totalCollegeCost,currentSavings,PaymentTotal,interestPerPeriod,totalPayPeriods){var check_msg=0;var fvCurrentSavings=currentSavings*Math.pow(1+interestPerPeriod,totalPayPeriods);var balanceRequired=totalCollegeCost-fvCurrentSavings;if(PaymentTotal<0){if(balanceRequired>0){check_msg=1}else{check_msg=2}}return check_msg});omni.define("calcPayTotal",function(numCollegeYears,investmentStartYears,interestPerPeriod,totalCollegeCost,totalPayPeriods,currentSavings,currentCost,inflation){updatePaymentValues(numCollegeYears,investmentStartYears,interestPerPeriod,totalPayPeriods,currentSavings,currentCost,inflation);switch(numCollegeYears){case 1:return calcTotal(paymentYearList[0]);case 2:return calcTotal(paymentYearList[0],paymentYearList[1]);case 3:return calcTotal(paymentYearList[0],paymentYearList[1],paymentYearList[2]);case 4:return calcTotal(paymentYearList[0],paymentYearList[1],paymentYearList[2],paymentYearList[3]);case 5:return calcTotal(paymentYearList[0],paymentYearList[1],paymentYearList[2],paymentYearList[3],paymentYearList[4]);case 6:return calcTotal(paymentYearList[0],paymentYearList[1],paymentYearList[2],paymentYearList[3],paymentYearList[4],paymentYearList[5]);case 7:return calcTotal(paymentYearList[0],paymentYearList[1],paymentYearList[2],paymentYearList[3],paymentYearList[4],paymentYearList[5],paymentYearList[6]);case 8:return calcTotal(paymentYearList[0],paymentYearList[1],paymentYearList[2],paymentYearList[3],paymentYearList[4],paymentYearList[5],paymentYearList[6],paymentYearList[7]);case 9:return calcTotal(paymentYearList[0],paymentYearList[1],paymentYearList[2],paymentYearList[3],paymentYearList[4],paymentYearList[5],paymentYearList[6],paymentYearList[7],paymentYearList[8]);case 10:return calcTotal(paymentYearList[0],paymentYearList[1],paymentYearList[2],paymentYearList[3],paymentYearList[4],paymentYearList[5],paymentYearList[6],paymentYearList[7],paymentYearList[8],paymentYearList[9]);case 11:return calcTotal(paymentYearList[0],paymentYearList[1],paymentYearList[2],paymentYearList[3],paymentYearList[4],paymentYearList[5],paymentYearList[6],paymentYearList[7],paymentYearList[8],paymentYearList[9],paymentYearList[10]);case 12:return calcTotal(paymentYearList[0],paymentYearList[1],paymentYearList[2],paymentYearList[3],paymentYearList[4],paymentYearList[5],paymentYearList[6],paymentYearList[7],paymentYearList[8],paymentYearList[9],paymentYearList[10],paymentYearList[11]);default:return calcTotal(paymentYearList[0],paymentYearList[1],paymentYearList[2],paymentYearList[3])}});function calcTotal(){var i;var sum=0;for(i=0;i<arguments.length;i++){sum+=arguments[i]}return sum}function formatCurrency(value){var number=parseFloat(value);return number.toLocaleString(navigator.language,{minimumFractionDigits:2,maximumFractionDigits:2})}//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        529 takes Current age and Age at start of school and returns Years to first school year and Years to make deposits. The arithmetic is the whole method: years to first school year is worked out from current age by one formula, applied once. Years to first school year comes back in years unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the 529 calculator works', 'html' => <<<'TXT'
            <p>529 answers one question from 2 numbers, and the answer is Years to first school year, Years to make deposits and Number of school years.</p><p>Written with the labels from the form, Years to first school year = − Current age + Age at start of school.</p><p>The result panel carries Years to first school year, Years to make deposits, Number of school years and Current annual cost, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Current age</strong> — in years. Age of the 529 beneficiary at the beginning of the 529 savings plan.</li><li><strong>Age at start of school</strong> — in years. Age of the 529 beneficiary when they begin school, e.g., college.</li></ul><p>What you get back is Years to first school year in years, Years to make deposits in years, Number of school years, Current annual cost in USD, Annual investment return in percent, Total cost in USD, Total monthly required contribution in USD, Annual required contribution in USD, Total number of payments, Interest per period, X, Y, Display msg, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Cost inflation = 4 perc, Initial investment = 4 USD, Custom number years = 0, Tax bracket = 10 % and Show chart = 0 — through the same formula and the panel reports <strong>Number of school years</strong> = 4 and <strong>Compare 529 with regular savings account?</strong> = 1.</p><ul><li><strong>Number of school years</strong> = 4</li><li><strong>Compare 529 with regular savings account?</strong> = 1</li></ul><p>The line behind those figures is <strong>Years to first school year</strong> = <code>− Current age + Age at start of school</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Number of school years</strong> = 4 and <strong>Compare 529 with regular savings account?</strong> = 1 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Annual investment return offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Years to first school year</strong> = <code>− Current age + Age at start of school</code></li><li><strong>Age at start of school</strong> = <code>Current age + Years to first school year</code></li><li><strong>Current age</strong> = <code>Age at start of school − Years to first school year</code></li><li><strong>Years to make deposits</strong> = <code>Years to first school year + Number of school years</code></li><li><strong>Number of school years</strong> = <code>Years to make deposits − Years to first school year</code></li><li><strong>Total number of payments</strong> = <code>12 × Years to make deposits</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Years to first school year</strong> = <code>− Current age + Age at start of school</code> — the form to use when Current age and Age at start of school are the values you have.</li><li><strong>Age at start of school</strong> = <code>Current age + Years to first school year</code> — the form to use when Current age and Years to first school year are the values you have.</li><li><strong>Current age</strong> = <code>Age at start of school − Years to first school year</code> — the form to use when Age at start of school and Years to first school year are the values you have.</li><li><strong>Years to make deposits</strong> = <code>Years to first school year + Number of school years</code> — the form to use when Years to first school year and Number of school years are the values you have.</li><li><strong>Years to first school year</strong> = <code>Years to make deposits − Number of school years</code> — the form to use when Years to make deposits and Number of school years are the values you have.</li><li><strong>Number of school years</strong> = <code>Years to make deposits − Years to first school year</code> — the form to use when Years to make deposits and Years to first school year are the values you have.</li><li><strong>Total number of payments</strong> = <code>12 × Years to make deposits</code> — the form to use when Years to make deposits are the values you have.</li><li><strong>Years to make deposits</strong> = <code>(1 ÷ 12) × Total number of payments</code> — the form to use when Total number of payments are the values you have.</li></ul><p>Any one of Years to first school year, Age at start of school and Current age can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Cost inflation, from 4 to 8 — and the answers go from <strong>Number of school years</strong> 4 and <strong>Compare 529 with regular savings account?</strong> 1 to <strong>Number of school years</strong> 4 and <strong>Compare 529 with regular savings account?</strong> 1.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Years to first school year, Years to make deposits and Number of school years are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Current age left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Current age is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Age at start of school left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Age at start of school is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Current age is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the 529 form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Current age</strong> is measured in years. Age of the 529 beneficiary at the beginning of the 529 savings plan. The page reads it when it works out Years to first school year and Age at start of school. Fill it from a measurement rather than a memory — Current age is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Age at start of school</strong> is measured in years. Age of the 529 beneficiary when they begin school, e.g., college. The page reads it when it works out Years to first school year and Current age. Fill it from a measurement rather than a memory — Age at start of school is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Current age and Age at start of school ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Current age — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Years to first school year in years against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Years to first school year is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Current age and Age at start of school and the number you are missing is Years to first school year and Years to make deposits.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/cap-rate">Cap rate Calculator</a>, <a href="/finance/capital-gains-tax-uk">Capital gains tax UK Calculator</a> and <a href="/finance/capital-gains-yield">Capital gains yield</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what 529 is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Current age and Age at start of school beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the 529 calculator work out?', 'a' => <<<'TXT'
            Years to first school year, Years to make deposits, Number of school years and Current annual cost, from Current age and Age at start of school. The relationship is Years to first school year = − Current age + Age at start of school.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Current age (years), Age at start of school (years). Enter current age and age at start of school; Years to first school year is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Years to first school year, Age at start of school, Current age and Years to make deposits blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Number of school years = 4 and Compare 529 with regular savings account? = 1. The figures come from Current age as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Years to first school year is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Current age blank and the page solves for it, reporting Years to first school year instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Years to first school year at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/cap-rate', 'name' => 'Cap rate Calculator'],
            ['path' => '/finance/capital-gains-tax-uk', 'name' => 'Capital gains tax UK Calculator'],
            ['path' => '/finance/capital-gains-yield', 'name' => 'Capital gains yield'],
        ],
        'authors' => [],
    ],
];
