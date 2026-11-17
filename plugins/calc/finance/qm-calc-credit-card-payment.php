<?php

/**
 * Credit card payment
 * /finance/credit-card-payment
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Credit card payment',
    'meta' => ['title' => 'Credit card payment: Formula, Steps & Results', 'description' => 'Credit card payment turns monthly payment with..., credit card balance and due date into desired payoff date and payoff date. Every figure is computed.', 'h1' => 'Credit card payment Calculator', 'updated' => '2026-09-27'],
    'sections' => [
        [
            'title' => 'What are you looking for?',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Select1',
                            'label' => 'Monthly payment with...',
                            'type' => 'select',
                            'options' => ['specified payback term' => '1', 'specified payoff date' => '3', 'required minimum payments' => '2'],
                            'dataset' => 'mode',
                            'control' => 'DROPDOWN',
                            'default' => 'specified payback term',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Specifications',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'LoanAmount',
                            'label' => 'Credit card balance',
                            'type' => 'number',
                            'help' => 'The outstanding balance to be paid.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '1000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'first_day', 'label' => 'Due date', 'type' => 'date', 'help' => 'The closest date by which you need to pay your monthly payment.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'r',
                            'label' => 'Interest rate APR',
                            'type' => 'number',
                            'help' => 'Annual Percentage Rate.',
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
                        ['name' => 'date_payoff', 'label' => 'Desired payoff date', 'type' => 'date', 'help' => 'The desired date you wish to pay off the credit on.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 't',
                            'label' => 'Payback within',
                            'type' => 'number',
                            'help' => 'The desired payback term.',
                            'unit' => '19',
                            'unit_default' => 'yrsmos',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12.000000000000000',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Minimum payment &amp; compound&nbsp;settings',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PercType',
                            'label' => 'Minimum percentage type',
                            'type' => 'select',
                            'options' => ['Flat percentage' => '1', 'Percentage + interest' => '2'],
                            'dataset' => 'min percent type VarPerc',
                            'help' => 'The way the bank applies the minimum percentage to your statement balance to determine your minimum payment.',
                            'default' => 'Flat percentage',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PmtMin',
                            'label' => 'Minimum percentage',
                            'type' => 'number',
                            'help' => 'Note, that the minimum percentage applies when it is higher than the minimum payment amount.',
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
                            'help' => 'Note, that the minimum payment amount applies only when it is higher than the minimum percentage.',
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
                            'name' => 'CompoundFreq',
                            'label' => 'Compounding frequency',
                            'type' => 'select',
                            'options' => ['Yearly' => '1', 'Monthly' => '12', 'Daily (360)' => '360', 'Daily (365)' => '365'],
                            'dataset' => 'compound freq m',
                            'control' => 'DROPDOWN',
                            'help' => 'The frequency of interest capitalization on the outstanding principal balance.',
                            'default' => 'Daily (365)',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Monthly payment details',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'Select1 != 2', 'text' => 'Your monthly payment is {{monthly_payment.monetaryValue}}.&nbsp;'],
                                ['when' => 'Select1 == 2', 'text' => 'Check your minimum monthly payments in the table below.&nbsp;'],
                                ['when' => 'Select1 != 2 and (monthly_payment < PmtMin2 or monthly_payment < PmtMin * LoanAmount)', 'text' => <<<'TXT'
                                The monthly payment is lower than the minimum payment — see the adjusted payment schedule below. Note that you can set the appropriate parameters for minimum payments by opening the section above called Minimum payment &amp; compound settings.
                                TXT],
                                ['when' => null, 'text' => 'You will pay off your credit card in {{payoff_years.value}} year(s) and {{payoff_months.value}}&nbsp;month(s), on {{payoff_date.shortValue}}.'],
                                ['when' => 'payoff_years == 0 and payoff_months == 0', 'text' => <<<'TXT'
                                &nbsp; It'll take longer than 100 years to pay off your credit card. Try increasing the minimum payment parameters in the Minimum payment &amp; compound settings section of the calculator.
                                TXT],
                                ['when' => null, 'text' => 'The total payment amount is {{total_payment.monetaryValue}}, of which {{total_interest.monetaryValue}} is interest.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => '&nbsp;',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'payoff_date', 'label' => 'Payoff date', 'type' => 'date'],
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
                            'name' => 'monthly_payment',
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
                            'name' => 'payoff_years',
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
                            'name' => 'payoff_months',
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
                            'name' => 'total_interest',
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
            'title' => 'date_payoff = first_day + 2 * 365.25',
            'results' => ['first_day' => 'date_payoff - 1461/2', 'date_payoff' => 'first_day + 1461/2'],
        ],
        [
            'title' => 'payoff_date = get_payoff_date(monthly_payment) + 1',
            'results' => ['payoff_date' => 'get_payoff_date(((main_calculation(Select1, LoanAmount, first_day, r, date_payoff, t, PercType, PmtMin, PmtMin2, CompoundFreq)))) + 1'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";var q=12,milisecondsInADay=24*60*60*1000;var payoff_years,payoff_months,payoff_date,total_payment;omni.define("main_calculation",function(Select1,LoanAmount,first_day,r,date_payoff,t,PercType,PmtMin,PmtMin2,CompoundFreq){var pmt,days2;var m=CompoundFreq;var eq_p=mathjs.pow(1+r/m,m/q)-1;var first_day_dateMonthCounter=new Date(first_day*milisecondsInADay);var periods=q*t,monthNumber=-2,monthCount=-2,days_passedMonthCounter=0;var daydiffMonthCounter=getDaysInMonth(first_day_dateMonthCounter);var days=daydiffMonthCounter;var first_day2MonthCounter=first_day-daydiffMonthCounter;var monthApr=(date_payoff-first_day2MonthCounter)/30;for(var i=0;i<=monthApr+10;i++){var _date=new Date((first_day2MonthCounter+days_passedMonthCounter)*milisecondsInADay);var days_in_monthMonthCounter=getDaysInMonth(_date);days_passedMonthCounter+=days_in_monthMonthCounter;days=first_day2MonthCounter+days_passedMonthCounter;days2=days-days_in_monthMonthCounter;if(days2<=date_payoff){monthCount=1}else{monthCount=0}monthNumber+=monthCount}if(Select1===1){pmt=LoanAmount*eq_p*mathjs.pow(1+eq_p,periods)/(mathjs.pow(1+eq_p,periods)-1)}else if(Select1===2){pmt=PmtMin2;periods=1200}else if(Select1===3){periods=monthNumber+1;pmt=LoanAmount*eq_p*mathjs.pow(1+eq_p,periods)/(mathjs.pow(1+eq_p,periods)-1)}var daydiff=getDaysInMonth(new Date(first_day*milisecondsInADay));var date,payoff_flag=false;t=periods/q;var first_day2=first_day-daydiff;var days_passed=0,princBal=LoanAmount,princBalOpen,intMonth,princMonth,pmtMonth=pmt,intPaid=0,periodCount,periodCount2=0;var rMonth=eq_p,periodsMonthCount=Math.ceil(periods);for(var _i=0;_i<=periodsMonthCount;_i++){date=new Date((first_day2+days_passed)*milisecondsInADay);var days_in_month=getDaysInMonth(date);days_passed+=days_in_month;var minPmt=void 0;princBalOpen=princBal;if(_i>0){intMonth=princBal*rMonth;if(PercType===2){minPmt=princBal*PmtMin+intMonth}else{minPmt=princBal*PmtMin}if(minPmt<PmtMin2){minPmt=PmtMin2}pmtMonth=pmt;if(pmtMonth<minPmt){pmtMonth=minPmt}else{pmtMonth=pmt;if(pmtMonth<minPmt){pmtMonth=minPmt}else{pmtMonth=pmt}}princMonth=pmtMonth-intMonth;princBal=princBal-princMonth}if(_i===0){intMonth=0;princMonth=0}intPaid+=intMonth;if(princBal<=0){princBal=0}if(princBalOpen<=0){princBalOpen=0}if(princBalOpen<=0){intMonth=0}if(princMonth<=0){princMonth=0}if(intMonth<=0){princMonth=0}if(princBal<=0){if(payoff_flag===false){payoff_date=date.getTime()/milisecondsInADay;payoff_flag=true}}if(princBal<0.01&&princBalOpen!==0){periodCount=_i}else{periodCount=0}periodCount2+=periodCount}payoff_years=parseInt(Math.trunc(periodCount2/12));payoff_months=parseInt(periodCount2-payoff_years*12);total_payment=LoanAmount+intPaid;return pmt});function getDaysInMonth(date){var year=date.getFullYear();var month=date.getMonth();return new Date(year,month+1,0).getDate()}omni.define("get_payoff_years",function(monthly_payment){return payoff_years});omni.define("get_payoff_months",function(monthly_payment){return payoff_months});omni.define("get_payoff_date",function(monthly_payment){return payoff_date});omni.define("get_total_payment",function(monthly_payment){return total_payment});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Enter Due date into Credit card payment and the answer comes back as Desired payoff date and Payoff date. The arithmetic is the whole method: desired payoff date is worked out from due date by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Credit card payment calculator works', 'html' => <<<'TXT'
            <p>The Credit card payment calculator applies one relationship to 1 number and reports Desired payoff date and Payoff date.</p><p>The relationship it solves reads Desired payoff date = Due date + 1461 ÷ 2.</p><p>What comes back is Desired payoff date and Payoff date — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 1 box, and nothing else.</p><ul><li><strong>Due date</strong> — a plain number, no unit, entered as a date. The closest date by which you need to pay your monthly payment.</li></ul><p>The result boxes are Desired payoff date, Payoff date; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Monthly payment with… = 1, Credit card balance = 1000 USD, Interest rate APR = 18 perc, Payback within = 12 yrsmos, Minimum percentage type = 1, Minimum percentage = 3 perc, Minimum payment = 25 USD, Compounding frequency = 365 and Due date = Sun 1 March 2026 gives <strong>Desired payoff date</strong> = Tue 29 February 2028.</p><ul><li><strong>Desired payoff date</strong> = Tue 29 February 2028</li></ul><p>That is <strong>Desired payoff date</strong> = <code>Due date + 1461 ÷ 2</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Desired payoff date</strong> = Tue 29 February 2028. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Interest rate APR lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Desired payoff date</strong> = <code>Due date + 1461 ÷ 2</code></li><li><strong>Due date</strong> = <code>Desired payoff date − 1461 ÷ 2</code></li><li><strong>Payoff date</strong> = <code>get_payoff_date(((main_calculation(Monthly payment with..., Credit card balance, Due date, Interest rate APR, Desired payoff date, Payback within, Minimum percentage type, Minimum percentage, Minimum payment, Compounding frequency)))) + 1</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Desired payoff date</strong> = <code>Due date + 1461 ÷ 2</code> — the form to use when Due date are the values you have.</li><li><strong>Due date</strong> = <code>Desired payoff date − 1461 ÷ 2</code> — the form to use when Desired payoff date are the values you have.</li><li><strong>Payoff date</strong> = <code>get_payoff_date(((main_calculation(Monthly payment with..., Credit card balance, Due date, Interest rate APR, Desired payoff date, Payback within, Minimum percentage type, Minimum percentage, Minimum payment, Compounding frequency)))) + 1</code> — the form to use when Monthly payment with…, Credit card balance, Due date and Interest rate APR are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Desired payoff date, Due date and Payoff date can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Monthly payment with..., from 1 to 2 — and the answers go from <strong>Desired payoff date</strong> Tue 29 February 2028 to <strong>Desired payoff date</strong> Tue 29 February 2028.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Desired payoff date and Payoff date are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Due date left as a guess.</strong> Anything typed into Due date is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Due date is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Due date</strong> takes a plain number with no unit attached. The closest date by which you need to pay your monthly payment. It feeds Desired payoff date and Payoff date. Have it to hand before you start: Due date is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Desired payoff date</strong> is a plain number and the page's own defaults put it at Tue 29 February 2028. The value follows from Due date. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Payoff date</strong> is a plain number. The value follows from Monthly payment with…, Credit card balance, Due date and Interest rate APR. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Desired payoff date</th></tr></thead><tbody><tr><td><strong>Monthly payment with…</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Credit card balance</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Interest rate APR</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Payback within</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Minimum percentage type</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Minimum percentage</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Minimum payment</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Compounding frequency</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Due date</strong> +10%</td><td>+9.66%</td></tr></tbody></table><p>The steepest column belongs to Due date: ten per cent there moves an answer by about 9.7 per cent, which is why that is the number to measure twice. By contrast, Monthly payment with…, Credit card balance and Interest rate APR barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Monthly payment with… = 0.5, Credit card balance = 500 USD, Interest rate APR = 9 perc, Payback within = 6 yrsmos, Minimum percentage type = 0.5, Minimum percentage = 1.5 perc, Minimum payment = 12.5 USD, Compounding frequency = 183 and Due date = Fri 30 January 1998, the answer is <strong>Desired payoff date</strong> = Mon 31 January 2000.</li><li>With Monthly payment with… = 3, Credit card balance = 1000 USD, Interest rate APR = 18 perc, Payback within = 12 yrsmos, Minimum percentage type = 1, Minimum percentage = 3 perc, Minimum payment = 25 USD, Compounding frequency = 365 and Due date = Sun 1 March 2026, the answer is <strong>Desired payoff date</strong> = Tue 29 February 2028.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Due date. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Due date into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Desired payoff date with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Desired payoff date is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It counts in whole days.</strong> Dates are compared as calendar days, not as moments: two dates that differ by a few hours on the same day give the same answer, and there is no time-of-day input to set.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Due date are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Due date is what you already know and Desired payoff date and Payoff date is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/net-debt">Net debt Calculator</a>, <a href="/finance/net-effective-rent">Net effective rent Calculator</a> and <a href="/finance/net-income">Net income</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Credit card payment calculator work out?', 'a' => 'Desired payoff date and Payoff date, from Due date. The relationship is Desired payoff date = Due date + 1461 ÷ 2.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Due date. Fill due date and leave Desired payoff date empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Desired payoff date, Due date and Payoff date can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Desired payoff date = Tue 29 February 2028. Those are the defaults written into the form — move Due date and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Desired payoff date is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Due date left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Desired payoff date keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/net-debt', 'name' => 'Net debt Calculator'],
            ['path' => '/finance/net-effective-rent', 'name' => 'Net effective rent Calculator'],
            ['path' => '/finance/net-income', 'name' => 'Net income'],
        ],
        'authors' => [],
    ],
];
