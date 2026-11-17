<?php

/**
 * Credit card interest
 * /finance/credit-card-interest
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Credit card interest',
    'meta' => ['title' => 'Credit card interest Calculator: Free, With Steps', 'description' => 'Credit card interest turns current unpaid balance and Annual percentage rate (APR) into total interest. The formula is printed in the form\'s own words.', 'h1' => 'Credit card interest Calculator', 'updated' => '2026-09-27'],
    'sections' => [
        [
            'title' => 'Specifications',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'LoanAmount',
                            'label' => 'Current unpaid balance',
                            'type' => 'number',
                            'help' => 'The outstanding credit to be paid.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '2000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'r',
                            'label' => 'Annual percentage rate (APR)',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '18',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PmtBase',
                            'label' => 'Repayment by...',
                            'type' => 'select',
                            'options' => ['fixed payments' => '2', 'minimum payments' => '1'],
                            'dataset' => 'repayment mode',
                            'help' => 'Open the minimum payment settings section below to adjust the minimum payment parameters.',
                            'default' => 'fixed payments',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PmtGiven',
                            'label' => 'Monthly fix payment',
                            'type' => 'number',
                            'help' => 'Monthly fixed payment.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '100',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PmtExtra',
                            'label' => 'Monthly additional payment',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            The amount of money you add to the fixed monthly payment. With this option, you can check how additional money reduces your interest costs and changes your payment schedule.
                            TXT,
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
                            'name' => 'm',
                            'label' => 'M',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Minimum payment &amp; compounding settings',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PmtMin',
                            'label' => 'Minimum percentage',
                            'type' => 'number',
                            'help' => 'Note that the minimum percentage only applies when it is higher than the minimum payment amount.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '3',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PmtMin2',
                            'label' => 'Minimum payment',
                            'type' => 'number',
                            'help' => 'Note that the minimum payment amount only applies when it\'s higher than the minimum payment percentage.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '25',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PercType',
                            'label' => 'Minimum percentage type',
                            'type' => 'select',
                            'options' => ['Flat percentage' => '1', 'Percentage + interest' => '2'],
                            'dataset' => 'min percent type',
                            'help' => 'The way the bank applies the minimum percentage to your statement balance to determine your minimum payment.',
                            'default' => 'Flat percentage',
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
                            'options' => ['Yearly' => '1', 'Monthly' => '12', 'Daily (360)' => '360', 'Daily (365)' => '365'],
                            'dataset' => 'compound freq',
                            'control' => 'DROPDOWN',
                            'help' => 'The frequency of interest capitalization on the outstanding principal balance.',
                            'default' => 'Monthly',
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
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'PmtBase == 2 and PmtExtra > 0', 'text' => 'Original fixed payment ({{PmtGiven.monetaryValue}})'],
                                ['when' => 'PmtBase == 2', 'text' => <<<'TXT'
                                With a monthly payment of {{PmtGiven.monetaryValue}}, you would pay off the credit card in {{payoff_time_years.value}}&nbsp;year(s) and {{payoff_time_months.value}}&nbsp;month(s).
                                TXT],
                                ['when' => 'PmtBase == 2 and PmtGiven < initial_min_payment', 'text' => <<<'TXT'
                                The monthly payment is lower than the minimum payment percentage. — Some payments have been adjusted to comply with the minimum payment requirements. With a monthly payment staring at {{initial_min_payment.monetaryValue}}, you would pay off the credit card in {{payoff_time_years.value}}&nbsp;year(s) and {{payoff_time_months.value}}&nbsp;month(s).
                                TXT],
                                ['when' => 'PmtBase == 1', 'text' => <<<'TXT'
                                Minimum payments will start at {{initial_min_payment.monetaryValue}} per month. You would pay off the credit card in {{payoff_time_years.value}}&nbsp;year(s) and {{payoff_time_months.value}}&nbsp;month(s).
                                TXT],
                                ['when' => null, 'text' => 'The total amount paid is {{total_payment.monetaryValue}}, including interest of {{total_interest.monetaryValue}}.'],
                                ['when' => 'PmtBase == 2 and PmtExtra > 0', 'text' => 'With additional payment ({{PmtWithExtra.monetaryValue}})'],
                                ['when' => 'PmtBase == 2 and PmtExtra > 0 and 0 < payoff_time_months_extra_diff', 'text' => <<<'TXT'
                                With an additional payment, you would pay off the credit card in {{payoff_time_years_extra.value}}&nbsp;year(s) and {{payoff_time_months_extra.value}}&nbsp;month(s); thus, you accelerate the repayment by&nbsp;
                                TXT],
                                ['when' => 'PmtBase == 2 and PmtExtra > 0 and 0 < payoff_time_months_extra_diff < 12', 'text' => '{{payoff_time_months_extra_diff.value}} month(s).'],
                                ['when' => 'PmtBase == 2 and PmtExtra > 0 and payoff_time_months_extra_diff > 12', 'text' => '{{payoff_time_months_extra_diff_years.value}}&nbsp;year(s) and {{payoff_time_months_extra_diff_months.value}} month(s).'],
                                ['when' => 'PmtBase == 2 and PmtExtra > 0 and mod(payoff_time_months_extra_diff, 12) == 0 and 0 < payoff_time_months_extra_diff', 'text' => '{{payoff_time_months_extra_diff_years.value}}&nbsp;year(s).'],
                                ['when' => 'PmtBase == 2 and PmtExtra > 0', 'text' => <<<'TXT'
                                The total amount paid is {{total_payment_extra.monetaryValue}}, including interest of {{total_interest_extra.monetaryValue}}, so {{interest_saved.monetaryValue}} is saved in interest.
                                TXT],
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
                                ['when' => 'PmtExtra > 3 * PmtGiven', 'text' => 'For the sake of plausibility, the additional payment should not be more than triple the original fixed amount.&nbsp;'],
                                ['when' => 'payoff_time_total_months == 0', 'text' => <<<'TXT'
                                Given the current minimum payment settings, paying back your credit card will take over 50 years! Please double-check the settings in the Minimum payment &amp; compounding settings section of the calculator.
                                TXT],
                            ],
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
                            'name' => 'total_interest',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '4'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_payment',
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
                            'name' => 'payoff_time_years',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '4'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'payoff_time_months',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '4'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'initial_min_payment',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '4'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_interest_extra',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '4'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PmtWithExtra',
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
                            'name' => 'payoff_time_years_extra',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '4'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'payoff_time_months_extra',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '4'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'payoff_time_months_extra_diff',
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
                            'name' => 'payoff_time_months_extra_diff_years',
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
                            'name' => 'payoff_time_months_extra_diff_months',
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
                            'name' => 'total_payment_extra',
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
                            'name' => 'interest_saved',
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
                            'name' => 'payoff_time_total_months',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'total_interest',
                            'label' => 'Total interest',
                            'type' => 'result',
                            'rounding' => ['standard', '4'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'payoff_time_years',
                            'label' => 'Payoff time years',
                            'type' => 'result',
                            'rounding' => ['standard', '4'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'payoff_time_months',
                            'label' => 'Payoff time months',
                            'type' => 'result',
                            'rounding' => ['standard', '4'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'payoff_time_years_extra',
                            'label' => 'Payoff time years extra',
                            'type' => 'result',
                            'rounding' => ['standard', '4'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'payoff_time_months_extra',
                            'label' => 'Payoff time months extra',
                            'type' => 'result',
                            'rounding' => ['standard', '4'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'initial_min_payment',
                            'label' => 'Initial min payment',
                            'type' => 'result',
                            'rounding' => ['standard', '4'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_interest_extra',
                            'label' => 'Total interest extra',
                            'type' => 'result',
                            'rounding' => ['standard', '4'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'total_interest = get_total_interest(LoanAmount, r, PmtBase, PmtGiven, PmtExtra, PmtMin, PmtMin2, CompoundFreq, PercType)',
            'results' => ['total_interest' => 'get_total_interest(LoanAmount, r, PmtBase, PmtGiven, PmtExtra, PmtMin, PmtMin2, CompoundFreq, PercType)'],
        ],
        [
            'title' => 'payoff_time_years = get_payoff_time_years(total_interest)',
            'results' => ['payoff_time_years' => 'get_payoff_time_years(total_interest)'],
        ],
        [
            'title' => 'payoff_time_months = get_payoff_time_months(total_interest)',
            'results' => ['payoff_time_months' => 'get_payoff_time_months(total_interest)'],
        ],
        [
            'title' => 'payoff_time_years_extra = get_payoff_time_years_extra(total_interest)',
            'results' => ['payoff_time_years_extra' => 'get_payoff_time_years_extra(total_interest)'],
        ],
        [
            'title' => 'payoff_time_months_extra = get_payoff_time_months_extra(total_interest)',
            'results' => ['payoff_time_months_extra' => 'get_payoff_time_months_extra(total_interest)'],
        ],
        [
            'title' => 'initial_min_payment = get_initial_min_payment(total_interest)',
            'results' => ['initial_min_payment' => 'get_initial_min_payment(total_interest)'],
        ],
        [
            'title' => 'total_interest_extra = get_total_interest_extra(total_interest)',
            'results' => ['total_interest_extra' => 'get_total_interest_extra(total_interest)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";var payoff_time_years,payoff_time_months,initial_min_payment,total_interest_extra,payoff_time_years_extra,payoff_time_months_extra;omni.define("get_total_interest",function(LoanAmount,r,PmtBase,PmtGiven,PmtExtra,PmtMin,PmtMin2,CompoundFreq,PercType){var princBal=LoanAmount;var eq_p=mathjs.pow(1+r/CompoundFreq,CompoundFreq/12)-1;var rMonth=eq_p;var pmt,periodCount_extra;if(PmtBase===1){PmtExtra=0}if(PmtBase===1){pmt=PmtMin2}else{pmt=PmtGiven}var _run_simulation=run_simulation(princBal,pmt,rMonth,PmtBase,PmtMin,PmtMin2,PercType),intPaid=_run_simulation.intPaid,periodCount=_run_simulation.periodCount;if(PmtExtra!==0){pmt=pmt+PmtExtra;var extra_results=run_simulation(princBal,pmt,rMonth,PmtBase,PmtMin,PmtMin2,PercType);total_interest_extra=extra_results["intPaid"];periodCount_extra=extra_results["periodCount"]}if(PercType==2){initial_min_payment=LoanAmount*PmtMin+princBal*rMonth}else{initial_min_payment=LoanAmount*PmtMin}if(PmtMin2>initial_min_payment){initial_min_payment=PmtMin2}payoff_time_years=parseInt(Math.trunc(periodCount/12));payoff_time_months=parseInt(periodCount-payoff_time_years*12);if(isNaN(payoff_time_years)){payoff_time_years=0}if(isNaN(payoff_time_months)){payoff_time_months=0}payoff_time_years_extra=parseInt(Math.trunc(periodCount_extra/12));payoff_time_months_extra=parseInt(periodCount_extra-payoff_time_years_extra*12);if(isNaN(payoff_time_years_extra)){payoff_time_years_extra=0}if(isNaN(payoff_time_months_extra)){payoff_time_months_extra=0}return intPaid});function run_simulation(princBal,pmt,rMonth,PmtBase,PmtMin,PmtMin2,PercType){var intMonth,minPmt,princMonth,periodCount,pmtMonth=pmt,intPaid=0;for(var i=0;i<=600;i++){var princBalOpen=princBal;if(i>0){intMonth=princBal*rMonth;if(PercType===2){minPmt=princBal*PmtMin+intMonth}else{minPmt=princBal*PmtMin}if(minPmt<PmtMin2){minPmt=PmtMin2}if(PmtBase===1){pmtMonth=minPmt}else{pmtMonth=pmt;if(pmtMonth<minPmt){pmtMonth=minPmt}else{pmtMonth=pmt}}princMonth=pmtMonth-intMonth;princBal=princBal-princMonth}if(i===0){intMonth=0}intPaid+=intMonth;if(princBal<=0){princBal=0}if(princBalOpen<=0){princBalOpen=0}if(princBalOpen<=0){intMonth=0}if(princBal===0&&princBalOpen!==0){periodCount=i;break}}return{intPaid:intPaid,periodCount:periodCount}}omni.define("get_payoff_time_years",function(total_interest){return payoff_time_years});omni.define("get_payoff_time_months",function(total_interest){return payoff_time_months});omni.define("get_payoff_time_years_extra",function(total_interest){return payoff_time_years_extra});omni.define("get_payoff_time_months_extra",function(total_interest){return payoff_time_months_extra});omni.define("get_initial_min_payment",function(total_interest){return initial_min_payment});omni.define("get_total_interest_extra",function(total_interest){return total_interest_extra});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Credit card interest works out Total interest and Payoff time years from Current unpaid balance, Annual percentage rate (APR) and Repayment by…. The arithmetic is the whole method: total interest is worked out from current unpaid balance by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Credit card interest calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Credit card interest: it takes 10 numbers and reports Total interest, Payoff time years and Payoff time months.</p><p>The relationship it solves reads Total interest = get_total_interest(Current unpaid balance, Annual percentage rate (APR), Repayment by..., Monthly fix payment, Monthly additional payment, Minimum percentage, Minimum payment, Compounding frequency, Minimum percentage type).</p><p>The answers are Total interest, Payoff time years, Payoff time months and Initial min payment; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 10 boxes, and nothing else.</p><ul><li><strong>Current unpaid balance</strong> — in USD. The outstanding credit to be paid.</li><li><strong>Annual percentage rate (APR)</strong> — in percent</li><li><strong>Repayment by…</strong> — a plain number, no unit. Open the minimum payment settings section below to adjust the minimum payment parameters.</li><li><strong>Monthly fix payment</strong> — in USD. Monthly fixed payment.</li><li><strong>Monthly additional payment</strong> — in USD. The amount of money you add to the fixed monthly payment. With this option, you can check how additional money reduces your interest costs and changes your payment schedule.</li><li><strong>M</strong> — a plain number, no unit</li><li><strong>Minimum percentage</strong> — in percent. Note that the minimum percentage only applies when it is higher than the minimum payment amount.</li><li><strong>Minimum payment</strong> — in USD. Note that the minimum payment amount only applies when it&#039;s higher than the minimum payment percentage.</li><li><strong>Minimum percentage type</strong> — a plain number, no unit. The way the bank applies the minimum percentage to your statement balance to determine your minimum payment.</li><li><strong>Compounding frequency</strong> — a plain number, no unit. The frequency of interest capitalization on the outstanding principal balance.</li></ul><p>The result boxes are Total interest, Payoff time years, Payoff time months, Initial min payment, Total interest extra, Payoff time years extra, Payoff time months extra; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Annual percentage rate (APR) lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Total interest</strong> = <code>get_total_interest(Current unpaid balance, Annual percentage rate (APR), Repayment by..., Monthly fix payment, Monthly additional payment, Minimum percentage, Minimum payment, Compounding frequency, Minimum percentage type)</code></li><li><strong>Payoff time years</strong> = <code>get_payoff_time_years(Total interest)</code></li><li><strong>Payoff time months</strong> = <code>get_payoff_time_months(Total interest)</code></li><li><strong>Payoff time years extra</strong> = <code>get_payoff_time_years_extra(Total interest)</code></li><li><strong>Payoff time months extra</strong> = <code>get_payoff_time_months_extra(Total interest)</code></li><li><strong>Initial min payment</strong> = <code>get_initial_min_payment(Total interest)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Total interest</strong> = <code>get_total_interest(Current unpaid balance, Annual percentage rate (APR), Repayment by..., Monthly fix payment, Monthly additional payment, Minimum percentage, Minimum payment, Compounding frequency, Minimum percentage type)</code> — the form to use when Current unpaid balance, Annual percentage rate (APR), Repayment by… and Monthly fix payment are the values you have.</li><li><strong>Payoff time years</strong> = <code>get_payoff_time_years(Total interest)</code> — the form to use when Total interest are the values you have.</li><li><strong>Payoff time months</strong> = <code>get_payoff_time_months(Total interest)</code> — the form to use when Total interest are the values you have.</li><li><strong>Payoff time years extra</strong> = <code>get_payoff_time_years_extra(Total interest)</code> — the form to use when Total interest are the values you have.</li><li><strong>Payoff time months extra</strong> = <code>get_payoff_time_months_extra(Total interest)</code> — the form to use when Total interest are the values you have.</li><li><strong>Initial min payment</strong> = <code>get_initial_min_payment(Total interest)</code> — the form to use when Total interest are the values you have.</li><li><strong>Total interest extra</strong> = <code>get_total_interest_extra(Total interest)</code> — the form to use when Total interest are the values you have.</li></ul><p>Any one of Total interest, Payoff time years and Payoff time months can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Annual percentage rate (APR) and Minimum percentage carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Total interest, Payoff time years and Payoff time months are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Current unpaid balance left as a guess.</strong> Anything typed into Current unpaid balance is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Annual percentage rate (APR) left as a guess.</strong> Anything typed into Annual percentage rate (APR) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Current unpaid balance is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Current unpaid balance</strong> takes a plain number with no unit attached. The outstanding credit to be paid. It feeds Total interest. Have it to hand before you start: Current unpaid balance is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Annual percentage rate (APR)</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Total interest. Have it to hand before you start: Annual percentage rate (APR) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Repayment by…</strong> takes a plain number with no unit attached. Open the minimum payment settings section below to adjust the minimum payment parameters. It feeds Total interest. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Repayment by… is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Monthly fix payment</strong> takes a plain number with no unit attached. Monthly fixed payment. It feeds Total interest. Have it to hand before you start: Monthly fix payment is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Monthly additional payment</strong> takes a plain number with no unit attached. The amount of money you add to the fixed monthly payment. With this option, you can check how additional money reduces your interest costs and changes your payment schedule. It feeds Total interest. Have it to hand before you start: Monthly additional payment is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>M</strong> takes a plain number with no unit attached. Have it to hand before you start: M is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Minimum percentage</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Note that the minimum percentage only applies when it is higher than the minimum payment amount. It feeds Total interest. Have it to hand before you start: Minimum percentage is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Minimum payment</strong> takes a plain number with no unit attached. Note that the minimum payment amount only applies when it&#039;s higher than the minimum payment percentage. It feeds Total interest. Have it to hand before you start: Minimum payment is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Minimum percentage type</strong> takes a plain number with no unit attached. The way the bank applies the minimum percentage to your statement balance to determine your minimum payment. It feeds Total interest. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Minimum percentage type is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Compounding frequency</strong> takes a plain number with no unit attached. The frequency of interest capitalization on the outstanding principal balance. It feeds Total interest. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Compounding frequency is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Total interest is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Current unpaid balance, Annual percentage rate (APR) and Repayment by… measured, Total interest and Payoff time years wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/var">Value at risk (VaR)</a>, <a href="/finance/variable-annuity">Variable annuity Calculator</a> and <a href="/finance/vat">VAT Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Credit card interest calculator work out?', 'a' => <<<'TXT'
            Total interest, Payoff time years, Payoff time months and Initial min payment, from Current unpaid balance, Annual percentage rate (APR), Repayment by… and Monthly fix payment. The relationship is Total interest = get_total_interest(Current unpaid balance, Annual percentage rate (APR), Repayment by..., Monthly fix payment, Monthly additional payment, Minimum percentage, Minimum payment, Compounding frequency, Minimum percentage type).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Current unpaid balance (USD), Annual percentage rate (APR) (percent), Repayment by…, Monthly fix payment (USD), Monthly additional payment (USD). With current unpaid balance, annual percentage rate (APR) and repayment by… in place, Total interest can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Total interest, Payoff time years, Payoff time months and Payoff time years extra blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Total interest is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Current unpaid balance left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Total interest keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/var', 'name' => 'Value at risk (VaR)'],
            ['path' => '/finance/variable-annuity', 'name' => 'Variable annuity Calculator'],
            ['path' => '/finance/vat', 'name' => 'VAT Calculator'],
        ],
        'authors' => [],
    ],
];
