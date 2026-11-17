<?php

/**
 * Loan interest
 * /finance/loan-interest
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Loan interest',
    'meta' => ['title' => 'Loan interest Calculator — Formula, Units & Example', 'description' => 'Loan interest works out interest to be paid and total payment from loan balance and loan term. Results come back in USD, with any other unit a click away.', 'h1' => 'Loan interest Calculator', 'updated' => '2026-09-30'],
    'sections' => [
        [
            'title' => 'Loan details',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'LoanAmount',
                            'label' => 'Loan balance',
                            'type' => 'number',
                            'help' => 'It is the loan principal to be repaid.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '10000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'term_t',
                            'label' => 'Loan term',
                            'type' => 'number',
                            'help' => 'The length of time it takes to repay the principal.',
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
                            'name' => 'interest_rate_r',
                            'label' => 'Interest rate',
                            'type' => 'number',
                            'help' => 'Annual rate of interest.',
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
                            'name' => 'payment_frequency_q',
                            'label' => 'Payment frequency',
                            'type' => 'select',
                            'options' => [
                                'Yearly' => '1.000000000000000',
                                'Semi-annually' => '2.000000000000000',
                                'Quarterly' => '4.000000000000000',
                                'Monthly' => '12.000000000000000',
                                'Bi-weekly' => '26.088750000000000',
                                'Weekly' => '52.177500000000000',
                                'Daily' => '365.242000000000000',
                            ],
                            'control' => 'DROPDOWN',
                            'default' => 'Monthly',
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
                                'Yearly' => '11',
                                'Semi-annually' => '12',
                                'Quarterly' => '13',
                                'Monthly' => '14',
                                'Weekly' => '15',
                                'Daily' => '16',
                                'Continuous' => '17',
                            ],
                            'dataset' => 'Compound freq',
                            'control' => 'DROPDOWN',
                            'default' => 'Monthly',
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
                            'name' => 'interest',
                            'label' => 'Interest to be paid',
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
                            'name' => 'total_payment',
                            'label' => 'Total payment',
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
                            'name' => 'payment',
                            'label' => '{{payment_frequency_q.name}} payment',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Balances',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => null, 'text' => 'Yearly balances'],
                                ['when' => 'round(num_points / term_t) == 4', 'text' => 'Quarterly balances'],
                                ['when' => 'round(num_points / term_t) == 12', 'text' => 'Monthly balances'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'num_points',
                            'label' => 'Num points',
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
            'title' => 'interest = main_calc(interest_rate_r, term_t, m, payment_frequency_q, LoanAmount)',
            'results' => ['interest' => 'main_calc(interest_rate_r, term_t, m, payment_frequency_q, LoanAmount)'],
        ],
        [
            'title' => 'total_payment = get_total_payment(interest)',
            'results' => ['total_payment' => 'get_total_payment(main_calc(interest_rate_r, term_t, m, payment_frequency_q, LoanAmount))'],
        ],
        [
            'title' => 'payment = get_payment(interest)',
            'results' => ['payment' => 'get_payment(main_calc(interest_rate_r, term_t, m, payment_frequency_q, LoanAmount))'],
        ],
        [
            'title' => 'num_points = get_num_points(interest_rate_r, term_t, m, payment_frequency_q, LoanAmount, payment)',
            'results' => ['num_points' => 'get_num_points(interest_rate_r, term_t, m, payment_frequency_q, LoanAmount, get_payment(main_calc(interest_rate_r, term_t, m, payment_frequency_q, LoanAmount)))'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";var totalPmt,pmt;omni.define("main_calc",function(r,t,m,q,LoanAmount){var periods=q*t;var base;if(m===0){var continuous_r=mathjs.pow(mathjs.e,r)-1;m=1;base=1+continuous_r/m}else{base=1+r/m}var power=m/q;var eq=q*(mathjs.pow(base,power)-1);var eq_p=eq/q;pmt=LoanAmount*eq_p*mathjs.pow(1+eq_p,periods)/(mathjs.pow(1+eq_p,periods)-1);totalPmt=pmt*periods;var interestPmt=totalPmt-LoanAmount;return interestPmt});omni.define("get_total_payment",function(interest){return totalPmt});omni.define("get_payment",function(interest){return pmt});omni.define("get_num_points",function(r,t,m,q,LoanAmount,pmt){var xaxis=[];var k;if(q===1){k=12}else if(q===2){k=6}else if(q===4){k=3}else if(q===12){k=1}else if(q===52.1775){k=12/52.1775}else if(q===26.08875){k=12/26.08875}else if(q===365.242){k=12/365.242}var periodsMonth=t*12;var pmtM=pmt/k;var iteration=0;var MAX_ITERATIONS=5000;var MIN_PRECISION=1e-7;var oldI_eq_m;var newI_eq_m=0.05;do{oldI_eq_m=newI_eq_m;var dividend_m=pmtM*periodsMonth-pmtM*periodsMonth*Math.pow(1+newI_eq_m,-periodsMonth)-newI_eq_m*LoanAmount*periodsMonth;var divisor_m=pmtM*periodsMonth*periodsMonth*Math.pow(1+newI_eq_m,-periodsMonth-1)-periodsMonth*LoanAmount;newI_eq_m=newI_eq_m-dividend_m/divisor_m;++iteration}while(Math.abs(oldI_eq_m-newI_eq_m)>MIN_PRECISION&&iteration<=MAX_ITERATIONS);var eq_m=newI_eq_m*12;var rMonth;var baseM;if(m===0){var continuous_m=mathjs.pow(mathjs.e,12+eq_m)-1;m=12;baseM=1+continuous_m/1}else{baseM=(12+eq_m)/12}var powerM=12/m;rMonth=m*(mathjs.pow(baseM,powerM)-1);var eq_base_monthly;if(m===0){var continuous_r_monthly=mathjs.pow(mathjs.e,rMonth)-1;m=1;eq_base_monthly=1+continuous_r_monthly/m}else{eq_base_monthly=1+rMonth/m}var eq_power_monthly=m/12;rMonth=mathjs.pow(eq_base_monthly,eq_power_monthly)-1;var pointFractionChart=0;var pmtMonth=pmt/k;var princBal=LoanAmount+(pmtMonth-LoanAmount*rMonth)/(1+rMonth);var princBalOpen;var princMonth;var intMonth;var rowLabelChart;for(var i=0;i<=periodsMonth;i++){rowLabelChart=i;intMonth=princBal*rMonth;princMonth=pmtMonth-intMonth;princBal=princBal-princMonth;princBalOpen=princBal+princMonth;if(i===0){intMonth=0;princMonth=0}if(princBal<=0){princBal=0}if(princBalOpen<=0){princBalOpen=0}if(princBalOpen<=0){intMonth=0}if(princMonth<=0){princMonth=0}if(intMonth<=0){princMonth=0}if((pointFractionChart<i+1||i>periodsMonth-1)&&t<=4&&q>4){xaxis.push(rowLabelChart)}else if((pointFractionChart<i+1||i>periodsMonth-1)&&(t<10&&t>4&&q!==2&&q!==1||q===4&&t<10)){rowLabelChart=i%3===0?i/3:Math.trunc(t*12)%12;xaxis.push(rowLabelChart);rowLabelChart++;pointFractionChart+=3}else if((pointFractionChart<i+1||i>periodsMonth-1)&&(t>=10||q===1||q===2)){rowLabelChart=i%12===0?i/12:Math.trunc(t*12)%12;xaxis.push(rowLabelChart);rowLabelChart++;pointFractionChart+=12}}return xaxis.length-1});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Loan interest turns Loan balance, Loan term and Interest rate into M. It is a single relationship that reads m out of loan balance, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Loan interest calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Loan interest: it takes 9 numbers and reports M.</p><p>In the form&#039;s own words, Interest to be paid = main_calc(Interest rate, Loan term, M, Payment frequency, Loan balance).</p><p>The result panel carries M, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 9 boxes, and nothing else.</p><ul><li><strong>Loan balance</strong> — in USD. It is the loan principal to be repaid.</li><li><strong>Loan term</strong> — in years. The length of time it takes to repay the principal.</li><li><strong>Interest rate</strong> — in percent. Annual rate of interest.</li><li><strong>Payment frequency</strong> — a plain number, no unit</li><li><strong>Compounding frequency</strong> — a plain number, no unit</li><li><strong>Interest to be paid</strong> — in USD</li><li><strong>Total payment</strong> — in USD</li><li><strong>payment</strong> — in USD</li><li><strong>Num points</strong> — a plain number, no unit</li></ul><p>The result box is M. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Loan term offers 5 units and opens on years, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Interest to be paid</strong> = <code>main_calc(Interest rate, Loan term, M, Payment frequency, Loan balance)</code></li><li><strong>Total payment</strong> = <code>get_total_payment(main_calc(Interest rate, Loan term, M, Payment frequency, Loan balance))</code></li><li><strong>payment</strong> = <code>get_payment(main_calc(Interest rate, Loan term, M, Payment frequency, Loan balance))</code></li><li><strong>Num points</strong> = <code>get_num_points(Interest rate, Loan term, M, Payment frequency, Loan balance, get_payment(main_calc(Interest rate, Loan term, M, Payment frequency, Loan balance)))</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Interest to be paid</strong> = <code>main_calc(Interest rate, Loan term, M, Payment frequency, Loan balance)</code> — the form to use when Interest rate, Loan term, M and Payment frequency are the values you have.</li><li><strong>Total payment</strong> = <code>get_total_payment(main_calc(Interest rate, Loan term, M, Payment frequency, Loan balance))</code> — the form to use when Interest rate, Loan term, M and Payment frequency are the values you have.</li><li><strong>payment</strong> = <code>get_payment(main_calc(Interest rate, Loan term, M, Payment frequency, Loan balance))</code> — the form to use when Interest rate, Loan term, M and Payment frequency are the values you have.</li><li><strong>Num points</strong> = <code>get_num_points(Interest rate, Loan term, M, Payment frequency, Loan balance, get_payment(main_calc(Interest rate, Loan term, M, Payment frequency, Loan balance)))</code> — the form to use when Interest rate, Loan term, M and Payment frequency are the values you have.</li></ul><p>Any one of Interest to be paid, Total payment and payment can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Loan term and Interest rate is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with M is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Loan balance left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Loan balance is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Loan term left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Loan term is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Loan balance and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Loan balance</strong> takes a plain number with no unit attached. It is the loan principal to be repaid. It feeds Interest to be paid, Total payment and payment. Have it to hand before you start: Loan balance is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Loan term</strong> is a years quantity: the page opens it in yrs and converts anything else you pick before the formula runs. The length of time it takes to repay the principal. It feeds Interest to be paid, Total payment and payment. Have it to hand before you start: Loan term is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Interest rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Annual rate of interest. It feeds Interest to be paid, Total payment and payment. Have it to hand before you start: Interest rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Payment frequency</strong> takes a plain number with no unit attached. It feeds Interest to be paid, Total payment and payment. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Payment frequency is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Compounding frequency</strong> takes a plain number with no unit attached. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Compounding frequency is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Interest to be paid</strong> takes a plain number with no unit attached. Have it to hand before you start: Interest to be paid is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Total payment</strong> takes a plain number with no unit attached. Have it to hand before you start: Total payment is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>payment</strong> takes a plain number with no unit attached. Have it to hand before you start: payment is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Num points</strong> takes a plain number with no unit attached. Have it to hand before you start: Num points is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>M</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>years</strong> — opens in <em>yrs</em>, and the chip also carries days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> M follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are years and percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Loan balance, Loan term and Interest rate are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Loan balance, Loan term and Interest rate is what you already know and M is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/personal-loan">Personal loan</a>, <a href="/finance/phillips-curve">Phillips curve Calculator</a> and <a href="/finance/piti">PITI Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Loan interest calculator work out?', 'a' => <<<'TXT'
            M, from Interest rate, Loan term, M and Payment frequency. The relationship is Interest to be paid = main_calc(Interest rate, Loan term, M, Payment frequency, Loan balance).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Loan balance (USD), Loan term (years), Interest rate (percent), Payment frequency, Compounding frequency. Enter loan balance, loan term and interest rate; M is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Interest to be paid, Total payment, payment and Num points blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally M is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Loan balance left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to M at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/personal-loan', 'name' => 'Personal loan'],
            ['path' => '/finance/phillips-curve', 'name' => 'Phillips curve Calculator'],
            ['path' => '/finance/piti', 'name' => 'PITI Calculator'],
        ],
        'authors' => [],
    ],
];
