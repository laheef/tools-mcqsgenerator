<?php

/**
 * Mortgage refinance
 * /finance/mortgage-refinance
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Mortgage refinance',
    'meta' => ['title' => 'Mortgage refinance: Formula, Steps & Results', 'description' => 'Mortgage refinance works out return status and break even date and reports both. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Mortgage refinance Calculator', 'updated' => '2026-09-09'],
    'sections' => [
        [
            'title' => 'Current mortgage',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'LoanAmount',
                            'label' => 'Original mortgage amount',
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
                        ['name' => 'first_day', 'label' => 'Due date', 'type' => 'date', 'default' => '1630540800000'],
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
                            'rounding' => ['standard', '1'],
                            'default' => '30',
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
                            'default' => '3.5',
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
                            'dataset' => 'Compound freq (m)',
                            'control' => 'DROPDOWN',
                            'help' => 'How often the interest is computed on the outstanding principle.',
                            'default' => 'Monthly (UK & US)',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Mortgage refinancing',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'RefDate', 'label' => 'New mortgage\'s due date', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tRef',
                            'label' => 'New loan\'s term',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '25',
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
                            'default' => '2.5',
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
                            'options' => ['Yearly' => '1', 'Semi-annually (Canada)' => '2', 'Quarterly' => '4', 'Monthly (UK & US)' => '12'],
                            'dataset' => 'Compound freq (m)',
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
                            'label' => 'Costs of refinancing',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '1500',
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
                            'help' => 'Fill in this field is you are about to pay some cash out (positive sign) or cash in (negative sign).',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '2500',
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
                            'type' => 'note',
                            'cases' => [
                                ['when' => null, 'text' => 'The cost of refinancing your current loan is {{cost_of_refinance.monetaryValue}}.&nbsp;'],
                                ['when' => 'break_even_point_months > 0', 'text' => <<<'TXT'
                                &nbsp; The accumulated savings due to refinancing will exceed the cost of the new loan after {{break_even_yrs.value}}&nbsp;year(s) and {{break_even_mos.value}}&nbsp;month(s). This means that the break-even point will occur on {{break_even_date.shortValue}}.
                                TXT],
                                ['when' => 'break_even_point_months == 0', 'text' => '&nbsp; The cost of the new loan will never be compensated.'],
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
                            'name' => 'mRef',
                            'label' => 'M ref',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
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
                            'name' => 'interest_rate_diff',
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
                            'name' => 'current_term_left',
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
                            'name' => 'term_diff',
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
                            'name' => 'principal_current',
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
                            'name' => 'principal_new',
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
                            'name' => 'cost_of_refinance',
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
                            'name' => 'break_even_point_months',
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
            'title' => 'return_status = run_calculator(LoanAmount, first_day, t, r, CompoundFreq, RefDate, tRef, rRef, CompoundFreqRef, CostPerc, Cost, Cash)',
            'results' => ['return_status' => 'run_calculator(LoanAmount, first_day, t, r, CompoundFreq, RefDate, tRef, rRef, CompoundFreqRef, CostPerc, Cost, Cash)'],
        ],
        [
            'title' => 'break_even_date = addMonths(RefDate, ceil(break_even_point_months))',
            'results' => ['break_even_date' => 'addMonths(RefDate, ceil(((get_break_even_point_months()))))'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";var q=12;var principal_current,monthly_payment_current,monthly_payment_new,total_interest_current,total_interest_new,break_even_point_months;omni.define("run_calculator",function(LoanAmount,first_day,t,r,m,RefDate,tRef,rRef,mRef,CostPerc,Cost,Cash){var base=1+r/m;var power=m/q;var eq=q*(mathjs.pow(base,power)-1);var eq_p=eq/q;var RefGap=mathjs.round((RefDate-first_day)/30.5);var periods=q*t;var periodsRef=q*tRef;var pmt=LoanAmount*eq_p*mathjs.pow(1+eq_p,periods)/(mathjs.pow(1+eq_p,periods)-1);var BalanceClose=LoanAmount*mathjs.pow(1+eq_p,RefGap)-pmt/eq_p*(mathjs.pow(1+eq_p,RefGap)-1);var LoanAmountRef=BalanceClose+Cash;var CostPoints=LoanAmountRef*CostPerc;var CostTotal=CostPoints+Cost;var baseRef=1+rRef/mRef;var powerRef=mRef/q;var eqRef=q*(mathjs.pow(baseRef,powerRef)-1);var eq_pRef=eqRef/q;var pmtRef=LoanAmountRef*eq_pRef*mathjs.pow(1+eq_pRef,periodsRef)/(mathjs.pow(1+eq_pRef,periodsRef)-1);var periodsMonth;var periodsMonthCurr=periods-RefGap;var periodsMonthRef=periodsRef;if(periodsMonthCurr>periodsMonthRef){periodsMonth=periodsMonthCurr}else{periodsMonth=periodsRef}var rMonth=eq_p;var rMonthRef=eq_pRef;var pmtMonth=pmt;var pmtMonthRef=pmtRef;var princBal=BalanceClose;var princBalRef=LoanAmountRef;var princBalOpen;var princMonth;var intMonth;var intPaid=0;var princBalOpenRef=0;var princMonthRef=0;var intMonthRef=0;var intPaidRef=0;var MondthlySave=pmtRef-pmt;var BreakPointPer=CostTotal/-MondthlySave;if(periodsRef<BreakPointPer){BreakPointPer=0}for(var i=0;i<=periodsMonth;i++){if(i>0){intMonthRef=princBalRef*rMonthRef;princMonthRef=pmtMonthRef-intMonthRef;princBalRef=princBalRef-princMonthRef;princBalOpenRef=princBalRef+princMonthRef;intMonth=princBal*rMonth;princMonth=pmtMonth-intMonth;princBal=princBal-princMonth;princBalOpen=princBal+princMonth;if(princBalOpen<pmtMonth){princMonth=princBalOpen}if(princBalOpenRef<pmtMonthRef){princMonthRef=princBalOpenRef}intPaid+=intMonth;intPaidRef+=intMonthRef;if(princBal<=0){princBal=0}if(princBalOpen<=0){princBalOpen=0}if(princBalOpen<=0){intMonth=0}if(princMonth<=0){princMonth=0}if(intMonth<=0){princMonth=0}if(princBalRef<=0){princBalRef=0}if(princBalOpenRef<=0){princBalOpenRef=0}if(princBalOpenRef<=0){intMonthRef=0}if(princMonthRef<=0){princMonthRef=0}if(intMonthRef<=0){princMonthRef=0}}}principal_current=BalanceClose;monthly_payment_current=pmt;monthly_payment_new=pmtRef;total_interest_current=intPaid;total_interest_new=intPaidRef;break_even_point_months=BreakPointPer;return 1});omni.define("get_principal_current",function(){return principal_current});omni.define("get_monthly_payment_current",function(){return monthly_payment_current});omni.define("get_monthly_payment_new",function(){return monthly_payment_new});omni.define("get_total_interest_current",function(){return total_interest_current});omni.define("get_total_interest_new",function(){return total_interest_new});omni.define("get_break_even_point_months",function(){return break_even_point_months});omni.define("addMonths",function(date_days,num_months){var millisecondsInADay=24*60*60*1000;var date=new Date(date_days*millisecondsInADay);date.setMonth(date.getMonth()+num_months);return date.getTime()/millisecondsInADay});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Enter Original mortgage amount, Due date and Mortgage term into Mortgage refinance and the answer comes back as Return status and Break even date. The arithmetic is the whole method: return status is worked out from original mortgage amount by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Mortgage refinance calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Mortgage refinance: it takes 12 numbers and reports Return status and Break even date.</p><p>Written with the labels from the form, Return status = run_calculator(Original mortgage amount, Due date, Mortgage term, Interest rate, Compounding frequency, New mortgage&#039;s due date, New loan&#039;s term, Interest rate, Compounding frequency, Mortgage points, Costs of refinancing, Cash in / out).</p><p>The answers are Return status and Break even date; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 12 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Original mortgage amount</strong> — in USD</li><li><strong>Due date</strong> — a plain number, no unit, entered as a date</li><li><strong>Mortgage term</strong> — in years</li><li><strong>Interest rate</strong> — in percent. Annual rate of interest.</li><li><strong>Compounding frequency</strong> — a plain number, no unit. How often the interest is computed on the outstanding principle.</li><li><strong>New mortgage&#039;s due date</strong> — a plain number, no unit, entered as a date</li><li><strong>New loan&#039;s term</strong> — in years</li><li><strong>Interest rate</strong> — in percent</li><li><strong>Compounding frequency</strong> — a plain number, no unit. How often the interest is computed on the outstanding principle.</li><li><strong>Mortgage points</strong> — in percent. Upfront payment percentage.</li><li><strong>Costs of refinancing</strong> — in USD</li><li><strong>Cash in / out</strong> — in USD. Fill in this field is you are about to pay some cash out (positive sign) or cash in (negative sign).</li></ul><p>The result boxes are Return status, Break even date; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>The unit chip on Mortgage term lists 5 options and opens on years. Moving it changes the conversion applied to that row, not the number stored behind it.</p>'],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Return status</strong> = <code>run_calculator(Original mortgage amount, Due date, Mortgage term, Interest rate, Compounding frequency, New mortgage&#039;s due date, New loan&#039;s term, Interest rate, Compounding frequency, Mortgage points, Costs of refinancing, Cash in / out)</code></li><li><strong>Break even date</strong> = <code>addMonths(New mortgage&#039;s due date, ceil(((get_break_even_point_months()))))</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Return status</strong> = <code>run_calculator(Original mortgage amount, Due date, Mortgage term, Interest rate, Compounding frequency, New mortgage&#039;s due date, New loan&#039;s term, Interest rate, Compounding frequency, Mortgage points, Costs of refinancing, Cash in / out)</code> — the form to use when Original mortgage amount, Due date, Mortgage term and Interest rate are the values you have.</li><li><strong>Break even date</strong> = <code>addMonths(New mortgage&#039;s due date, ceil(((get_break_even_point_months()))))</code> — the form to use when New mortgage&#039;s due date are the values you have.</li></ul><p>Any one of Return status and Break even date can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Mortgage term, Interest rate and New loan&#039;s term carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Return status and Break even date are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Original mortgage amount left as a guess.</strong> Anything typed into Original mortgage amount is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Due date left as a guess.</strong> Anything typed into Due date is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Original mortgage amount to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Original mortgage amount</strong> takes a plain number with no unit attached. Change it and Return status changes with it. Have it to hand before you start: Original mortgage amount is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Due date</strong> takes a plain number with no unit attached. Change it and Return status changes with it. Have it to hand before you start: Due date is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Mortgage term</strong> is a years quantity: the page opens it in yrs and converts anything else you pick before the formula runs. Change it and Return status changes with it. Have it to hand before you start: Mortgage term is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Interest rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Annual rate of interest. Change it and Return status changes with it. Have it to hand before you start: Interest rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Compounding frequency</strong> takes a plain number with no unit attached. How often the interest is computed on the outstanding principle. Change it and Return status changes with it. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Compounding frequency is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>New mortgage&#039;s due date</strong> takes a plain number with no unit attached. Change it and Return status and Break even date changes with it. Have it to hand before you start: New mortgage&#039;s due date is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>New loan&#039;s term</strong> is a years quantity: the page opens it in yrs and converts anything else you pick before the formula runs. Change it and Return status changes with it. Have it to hand before you start: New loan&#039;s term is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Interest rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Change it and Return status changes with it. Have it to hand before you start: Interest rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Compounding frequency</strong> takes a plain number with no unit attached. How often the interest is computed on the outstanding principle. Change it and Return status changes with it. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Compounding frequency is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Mortgage points</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Upfront payment percentage. Change it and Return status changes with it. Have it to hand before you start: Mortgage points is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Costs of refinancing</strong> takes a plain number with no unit attached. Change it and Return status changes with it. Have it to hand before you start: Costs of refinancing is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Cash in / out</strong> takes a plain number with no unit attached. Fill in this field is you are about to pay some cash out (positive sign) or cash in (negative sign). Change it and Return status changes with it. Have it to hand before you start: Cash in / out is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 2 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Return status</strong> is a plain number. The value follows from Original mortgage amount, Due date, Mortgage term and Interest rate. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Break even date</strong> is a plain number. The value follows from New mortgage's due date. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>years</strong> — opens in <em>yrs</em>, and the chip also carries days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Return status is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover years and percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It counts in whole days.</strong> The differences are counted in whole days, so an answer is a date or a number of days rather than an interval in hours. Expect a day&#039;s uncertainty if the event itself happened at an unknown time.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Original mortgage amount, Due date and Mortgage term and the number you are missing is Return status and Break even date.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/price-per-share">Price per share Calculator</a>, <a href="/finance/price-per-sqft">Price per square foot Calculator</a> and <a href="/finance/price-per-square-meter">Price per square meter Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Mortgage refinance calculator work out?', 'a' => <<<'TXT'
            Return status and Break even date, from Original mortgage amount, Due date, Mortgage term and Interest rate. The relationship is Return status = run_calculator(Original mortgage amount, Due date, Mortgage term, Interest rate, Compounding frequency, New mortgage's due date, New loan's term, Interest rate, Compounding frequency, Mortgage points, Costs of refinancing, Cash in / out).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Original mortgage amount (USD), Due date, Mortgage term (years), Interest rate (percent), Compounding frequency. Fill original mortgage amount, due date and mortgage term and leave Return status empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Return status and Break even date blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Return status is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Original mortgage amount left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Return status keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/price-per-share', 'name' => 'Price per share Calculator'],
            ['path' => '/finance/price-per-sqft', 'name' => 'Price per square foot Calculator'],
            ['path' => '/finance/price-per-square-meter', 'name' => 'Price per square meter Calculator'],
        ],
        'authors' => [],
    ],
];
