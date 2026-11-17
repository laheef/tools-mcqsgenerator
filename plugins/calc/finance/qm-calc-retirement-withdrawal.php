<?php

/**
 * Retirement withdrawal
 * /finance/retirement-withdrawal
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Retirement withdrawal',
    'meta' => ['title' => 'Retirement withdrawal: Formula, Steps & Results', 'description' => 'Retirement withdrawal works out withdrawal amount from i\'d like to know..., balance at the beginning of retirement and your age now. A worked example follows.', 'h1' => 'Retirement withdrawal Calculator', 'updated' => '2026-09-01'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Subject',
                            'label' => 'I\'d like to know...',
                            'type' => 'select',
                            'options' => ['how much can I withdraw?' => '1', 'how long will my money last?' => '2'],
                            'dataset' => 'mode',
                            'default' => 'how much can I withdraw?',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Basic settings',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Balance_at_the_beginning_of_retirement_InDep',
                            'label' => 'Balance at the beginning of retirement',
                            'type' => 'number',
                            'help' => 'Set the amount you expect to start your retirement with.',
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
                        [
                            'name' => 'StartDate',
                            'label' => 'Your age now',
                            'type' => 'number',
                            'suffix' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '30',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'EndDate',
                            'label' => 'Planned age to retire',
                            'type' => 'number',
                            'suffix' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '50',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PerPay',
                            'label' => 'Withdrawal amount',
                            'type' => 'number',
                            'help' => 'The amount you would like to withdraw during your retirement.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '400',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'years_in_retirement_t',
                            'label' => 'Planned years in retirement',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'interest_rate_r',
                            'label' => 'Annual interest rate',
                            'type' => 'number',
                            'help' => 'The average rate of return on your balance.',
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
                            'name' => 'Infl',
                            'label' => 'Inflation rate before you retire',
                            'type' => 'number',
                            'help' => 'The expected average inflation rate before retirement.',
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
                            'name' => 'Inflation_rate_after_you_retire_g',
                            'label' => 'Inflation rate after you retire',
                            'type' => 'number',
                            'help' => 'The expected average inflation rate during retirement.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Advanced settings',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Payment_frequency_q',
                            'label' => 'Payment frequency',
                            'type' => 'select',
                            'options' => [
                                'Yearly' => '1',
                                'Semi-annually' => '2',
                                'Quarterly' => '4',
                                'Monthly' => '12',
                                'Weekly' => '52',
                            ],
                            'dataset' => 'payfreq',
                            'control' => 'DROPDOWN',
                            'help' => 'Interval between regular withdrawals.',
                            'default' => 'Monthly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'CompFreq',
                            'label' => 'Compounding method',
                            'type' => 'select',
                            'options' => [
                                'Yearly' => '1',
                                'Semi-annually' => '2',
                                'Quarterly' => '3',
                                'Monthly' => '4',
                                'Weekly' => '5',
                                'Daily' => '6',
                                'Continuous' => '7',
                            ],
                            'dataset' => 'compounding method',
                            'control' => 'DROPDOWN',
                            'help' => 'The frequency that interest accumulates on your balance.',
                            'default' => 'Yearly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Timing_of_withdrawals_Type',
                            'label' => 'Timing of withdrawals',
                            'type' => 'select',
                            'options' => ['At the beginning of periods' => '1', 'At the end of periods' => '2'],
                            'dataset' => 'timing of withdrawals',
                            'control' => 'DROPDOWN',
                            'default' => 'At the beginning of periods',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'FinBal',
                            'label' => 'Balance at the end of retirement',
                            'type' => 'number',
                            'help' => 'Set an amount if you want to have some money left at the end of your retirement.',
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
            'title' => 'Results',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'withdrawal_amount',
                            'label' => 'Withdrawal amount',
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
                                ['when' => 'hasValue(withdrawal_amount)', 'text' => <<<'TXT'
                                You can withdraw {{withdrawal_amount.monetaryValue}} at the {{timing_name.uiValue}} of each {{freq_name.uiValue}} to deplete your expected balance by the end of your retirement.
                                TXT],
                                ['when' => 'Inflation_rate_after_you_retire_g > 0 and Infl == 0', 'text' => 'Your first withdrawal will be {{withdrawal_amount.monetaryValue}}, which should increase gradually to keep your withdrawals\' buying power stable.'],
                                ['when' => 'hasValue(withdrawal_amount) and Infl != 0', 'text' => <<<'TXT'
                                You can withdraw {{withdrawal_amount.monetaryValue}} ({{PerPay_pv.monetaryValue}} in today's money) at the {{timing_name.uiValue}} of each {{freq_name.uiValue}} to deplete your expected balance by the end of your retirement.
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
                                ['when' => null, 'text' => 'The balance at the beginning of retirement will last for {{yearDebt.formattedValue}} year(s) and {{monthDebt.formattedValue}} month(s).'],
                                ['when' => 'yearDebt == 0', 'text' => 'With such a high return rate, you can withdraw the set amount for your entire life.'],
                                ['when' => 'FinBal != 0', 'text' => 'You will reach the given final balance in {{yearDebt.formattedValue}} year(s) and {{monthDebt.formattedValue}} month(s).'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'hidden',
            'note' => '',
            'blocks' => [
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
                            'name' => 'RecFreq',
                            'label' => 'Payment frequency',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Timing',
                            'label' => 'Set term by...',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarTime',
                            'label' => 'Var time',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarRep',
                            'label' => 'Var rep',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarSub',
                            'label' => 'Var sub',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Periodic_growth_rate_g_p',
                            'label' => 'Periodic growth rate',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            The percentage growth rate of the periodic deposits of withdrawals. Note, that periodic and annual growth rates are linked together: if you set one, the other will be calculated according to annuity frequency. Available only at fixed length annuity.
                            TXT,
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
                        ['name' => 'first_day', 'label' => 'Schedule starts from...', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarType',
                            'label' => 'Var type',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'freq_name',
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
                            'name' => 'timing_name',
                            'label' => '',
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
                            'name' => 'PerPay_pv',
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
                            'name' => 'yearDebt',
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
                            'name' => 'monthDebt',
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
            'title' => 'Inflation_rate_after_you_retire_g + 1 = (1 + Periodic_growth_rate_g_p) ^ Payment_frequency_q',
            'results' => ['Periodic_growth_rate_g_p' => 'pow(Inflation_rate_after_you_retire_g + 1, 1/Payment_frequency_q) - 1', 'Inflation_rate_after_you_retire_g' => 'pow(Periodic_growth_rate_g_p + 1, Payment_frequency_q) - 1', 'Payment_frequency_q' => 'log(Inflation_rate_after_you_retire_g + 1)/log(Periodic_growth_rate_g_p + 1)'],
        ],
        [
            'title' => <<<'TXT'
            withdrawal_amount = main_calculation(Balance_at_the_beginning_of_retirement_InDep, FinBal, Infl, m, Payment_frequency_q, years_in_retirement_t, VarType, first_day, StartDate, EndDate, PerPay, Timing_of_withdrawals_Type, interest_rate_r, Inflation_rate_after_you_retire_g, Periodic_growth_rate_g_p, Subject)
            TXT,
            'results' => ['withdrawal_amount' => <<<'TXT'
            main_calculation(Balance_at_the_beginning_of_retirement_InDep, FinBal, Infl, m, Payment_frequency_q, years_in_retirement_t, VarType, first_day, StartDate, EndDate, PerPay, Timing_of_withdrawals_Type, interest_rate_r, Inflation_rate_after_you_retire_g, Periodic_growth_rate_g_p, Subject)
            TXT],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";var milisecondsInADay=24*60*60*1000;var PerPay_pv,periods,yearDebt,monthDebt;omni.define("main_calculation",function(Balance_at_the_beginning_of_retirement_InDep,FinBal,Infl,m,Payment_frequency_q,years_in_retirement_t,VarType,first_day,StartDate,EndDate,PerPay,Timing_of_withdrawals_Type,interest_rate_r,Inflation_rate_after_you_retire_g,Periodic_growth_rate_g_p,Subject){var yearsBefore=EndDate-StartDate;function getNumDays(startDate){var endDate=new Date(startDate);endDate.setFullYear(endDate.getFullYear()+yearsBefore);return(endDate-startDate)/milisecondsInADay}var daysBefore=getNumDays(first_day);first_day=first_day+daysBefore;periods=Payment_frequency_q*years_in_retirement_t;var eq_base;if(m===0){var continuous_r=mathjs.pow(mathjs.e,interest_rate_r)-1;m=1;eq_base=1+continuous_r/m}else{eq_base=1+interest_rate_r/m}var eq_power=m/Payment_frequency_q;var eq_p=mathjs.round(mathjs.pow(eq_base,eq_power)-1,10);Periodic_growth_rate_g_p=mathjs.pow(Inflation_rate_after_you_retire_g+1,1/Payment_frequency_q)-1;if(Subject===1){var PrincBal=Balance_at_the_beginning_of_retirement_InDep*mathjs.pow(1+eq_p,periods);var DepBal=FinBal-PrincBal;if(Inflation_rate_after_you_retire_g!==eq_p&&Payment_frequency_q!==1){PerPay=DepBal/((mathjs.pow(1+eq_p,periods)-mathjs.pow(1+Periodic_growth_rate_g_p,periods))*(1+eq_p*VarType)/(eq_p-Periodic_growth_rate_g_p))}else if(Inflation_rate_after_you_retire_g!==eq_p&&Payment_frequency_q===1){PerPay=DepBal/((mathjs.pow(1+eq_p,periods)-mathjs.pow(1+Inflation_rate_after_you_retire_g,periods))*(1+eq_p*VarType)/(eq_p-Inflation_rate_after_you_retire_g))}else if(Inflation_rate_after_you_retire_g===eq_p){PerPay=DepBal/(periods*mathjs.pow(1+eq_p,periods-1)*(1+eq_p*VarType))}FinBal=PrincBal+DepBal}if(Subject===2){Inflation_rate_after_you_retire_g=0;Periodic_growth_rate_g_p=0;PerPay=-PerPay;periods=mathjs.log((eq_p*(FinBal+PerPay*VarType)+PerPay)/(eq_p*Balance_at_the_beginning_of_retirement_InDep+PerPay*(1+eq_p*VarType)))/mathjs.log(eq_p+1);years_in_retirement_t=periods/Payment_frequency_q}PerPay_pv=-PerPay/mathjs.pow(1+Infl,yearsBefore);yearDebt=parseInt(Math.trunc(periods/12));monthDebt=parseInt(mathjs.ceil(periods-yearDebt*12));return-1*PerPay});omni.define("getPresentValue",function(PerPay){return PerPay_pv});omni.define("getYearDebt",function(PerPay){if(isNaN(yearDebt)){return 0}else{return yearDebt}});omni.define("getMonthDebt",function(PerPay){if(isNaN(monthDebt)){return 0}else{return monthDebt}});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Enter I'd like to know…, Balance at the beginning of retirement and Your age now into Retirement withdrawal and the answer comes back as Withdrawal amount and Periodic growth rate. It is a single relationship that reads withdrawal amount out of i'd like to know…, not a table of canned results keyed by them. Units for Withdrawal amount default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Retirement withdrawal calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Retirement withdrawal: it takes 12 numbers and reports Withdrawal amount and Periodic growth rate.</p><p>In the form&#039;s own words, Periodic growth rate = (Inflation rate after you retire + 1)^(1 ÷ Payment frequency) − 1.</p><p>What comes back is Withdrawal amount and Periodic growth rate — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 12 boxes, and nothing else.</p><ul><li><strong>I&#039;d like to know…</strong> — a plain number, no unit</li><li><strong>Balance at the beginning of retirement</strong> — in USD. Set the amount you expect to start your retirement with.</li><li><strong>Your age now</strong> — in yrs</li><li><strong>Planned age to retire</strong> — in yrs</li><li><strong>Withdrawal amount</strong> — in USD. The amount you would like to withdraw during your retirement.</li><li><strong>Planned years in retirement</strong> — in years</li><li><strong>Annual interest rate</strong> — in percent. The average rate of return on your balance.</li><li><strong>Inflation rate before you retire</strong> — in percent. The expected average inflation rate before retirement.</li><li><strong>Inflation rate after you retire</strong> — in percent. The expected average inflation rate during retirement.</li><li><strong>Payment frequency</strong> — a plain number, no unit. Interval between regular withdrawals.</li><li><strong>Timing of withdrawals</strong> — a plain number, no unit</li><li><strong>Balance at the end of retirement</strong> — in USD. Set an amount if you want to have some money left at the end of your retirement.</li></ul><p>The answers come back as Withdrawal amount in USD, Periodic growth rate. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — I&amp;#039;d like to know… = 1, Balance at the beginning of retirement = 100000 USD, Your age now = 30 yrs, Planned age to retire = 50 yrs, Withdrawal amount = 400 USD, Planned years in retirement = 20 yrs, Annual interest rate = 4 perc, Inflation rate before you retire = 9 perc, Compounding method = 1, Timing of withdrawals = 1 and Balance at the end of retirement = 10 USD — through the same formula and the panel reports <strong>Payment frequency</strong> = 12, <strong>Payment frequency</strong> = 1, <strong>Periodic growth rate</strong> = 0 and <strong>Inflation rate after you retire</strong> = 0 perc.</p><ul><li><strong>Payment frequency</strong> = 12</li><li><strong>Payment frequency</strong> = 1</li><li><strong>Periodic growth rate</strong> = 0</li><li><strong>Inflation rate after you retire</strong> = 0 perc</li></ul><p>That is <strong>Periodic growth rate</strong> = <code>(Inflation rate after you retire + 1)^(1 ÷ Payment frequency) − 1</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Payment frequency</strong> = 12, <strong>Payment frequency</strong> = 1, <strong>Periodic growth rate</strong> = 0 and <strong>Inflation rate after you retire</strong> = 0. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Planned years in retirement lists 5 options and opens on years. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Periodic growth rate</strong> = <code>(Inflation rate after you retire + 1)^(1 ÷ Payment frequency) − 1</code></li><li><strong>Inflation rate after you retire</strong> = <code>(Periodic growth rate + 1)^(Payment frequency) − 1</code></li><li><strong>Payment frequency</strong> = <code>ln(Inflation rate after you retire + 1) ÷ ln(Periodic growth rate + 1)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Periodic growth rate</strong> = <code>(Inflation rate after you retire + 1)^(1 ÷ Payment frequency) − 1</code> — the form to use when Inflation rate after you retire and Payment frequency are the values you have.</li><li><strong>Inflation rate after you retire</strong> = <code>(Periodic growth rate + 1)^(Payment frequency) − 1</code> — the form to use when Periodic growth rate and Payment frequency are the values you have.</li><li><strong>Payment frequency</strong> = <code>ln(Inflation rate after you retire + 1) ÷ ln(Periodic growth rate + 1)</code> — the form to use when Inflation rate after you retire and Periodic growth rate are the values you have.</li></ul><p>Any one of Periodic growth rate, Inflation rate after you retire and Payment frequency can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double I&#039;d like to know... from 1 to 2, leaving every other box alone. The panel moves from <strong>Payment frequency</strong> 12, <strong>Payment frequency</strong> 1, <strong>Periodic growth rate</strong> 0 and <strong>Inflation rate after you retire</strong> 0 perc to <strong>Payment frequency</strong> 12, <strong>Payment frequency</strong> 1, <strong>Periodic growth rate</strong> 0 and <strong>Inflation rate after you retire</strong> 0 perc.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Planned years in retirement, Annual interest rate and Inflation rate before you retire carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Withdrawal amount and Periodic growth rate are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>I&#039;d like to know… left as a guess.</strong> Anything typed into I&amp;#039;d like to know… is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Balance at the beginning of retirement left as a guess.</strong> Anything typed into Balance at the beginning of retirement is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert I&#039;d like to know... to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have I&#039;d like to know…, Balance at the beginning of retirement, Your age now and Planned age to retire ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with I&amp;#039;d like to know… — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Withdrawal amount in USD against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Withdrawal amount is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The chips cover years and percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It counts in whole days.</strong> The differences are counted in whole days, so an answer is a date or a number of days rather than an interval in hours. Expect a day&#039;s uncertainty if the event itself happened at an unknown time.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: I&#039;d like to know…, Balance at the beginning of retirement and Your age now measured, Withdrawal amount and Periodic growth rate wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/price-to-earnings">Price/earnings ratio</a>, <a href="/finance/private-savings">Private savings Calculator</a> and <a href="/finance/productivity">Productivity Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Retirement withdrawal is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Retirement withdrawal calculator work out?', 'a' => <<<'TXT'
            Withdrawal amount and Periodic growth rate, from Inflation rate after you retire and Payment frequency. The relationship is Periodic growth rate = (Inflation rate after you retire + 1)^(1 ÷ Payment frequency) − 1.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            I'd like to know…, Balance at the beginning of retirement (USD), Your age now (yrs), Planned age to retire (yrs), Withdrawal amount (USD). Fill i'd like to know…, balance at the beginning of retirement and your age now and leave Withdrawal amount empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Periodic growth rate, Inflation rate after you retire, Payment frequency and Withdrawal amount blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Payment frequency = 12, Payment frequency = 1, Periodic growth rate = 0 and Inflation rate after you retire = 0 perc. The figures come from I'd like to know... as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Withdrawal amount is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave I\'d like to know... blank and the page solves for it, reporting Withdrawal amount instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Withdrawal amount at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/price-to-earnings', 'name' => 'Price/earnings ratio'],
            ['path' => '/finance/private-savings', 'name' => 'Private savings Calculator'],
            ['path' => '/finance/productivity', 'name' => 'Productivity Calculator'],
        ],
        'authors' => [],
    ],
];
